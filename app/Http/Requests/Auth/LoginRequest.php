<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
            'g-recaptcha-response' => ['required'],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'g-recaptcha-response.required' => 'Silakan verifikasi bahwa Anda bukan robot.',
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        // Verify Google reCAPTCHA v2
        try {
            $recaptchaResponse = $this->input('g-recaptcha-response');
            $response = \Illuminate\Support\Facades\Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $recaptchaResponse,
                'remoteip' => $this->ip(),
            ]);

            if (! $response->json('success')) {
                throw ValidationException::withMessages([
                    'g-recaptcha-response' => 'Verifikasi reCAPTCHA gagal, silakan coba lagi.',
                ]);
            }
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            \Log::error('reCAPTCHA verification error: ' . $e->getMessage());
            // Allow login to proceed if reCAPTCHA service is down
        }

        $user = User::where('email', $this->email)->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'email' => 'Email tidak terdaftar.',
            ]);
        }

        if (! Hash::check($this->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => 'Password yang Anda masukkan salah.',
            ]);
        }

        // Hanya user dengan role 'user' yang boleh login di PMB
        if (! $user->hasRole('user')) {
            throw ValidationException::withMessages([
                'email' => 'Akun ini tidak memiliki akses ke sistem PMB.',
            ]);
        }

        // gunakan Auth::login(), bukan auth()->login()
        Auth::login($user, $this->boolean('remember'));

        RateLimiter::clear($this->throttleKey());
    }


    /**
     * Ensure the login request is not rate limited.
     *
     * @throws ValidationException
     */
    public function ensureIsNotRateLimited(): void
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    /**
     * Get the rate limiting throttle key for the request.
     */
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')) . '|' . $this->ip());
    }
}
