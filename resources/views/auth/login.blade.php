<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" />

            <div class="relative">
                <x-text-input id="password" class="block mt-1 w-full pr-10" type="password" name="password" required
                    autocomplete="current-password" />

                <button type="button" onclick="togglePasswordVisibility()"
                    class="absolute inset-y-0 right-0 px-3 flex items-center text-gray-500 text-sm">
                    {{-- icon mata (show) --}}
                    <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg>

                    {{-- icon mata dicoret (hide) --}}
                    <svg id="icon-eye-off" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8"
                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a10.05 10.05 0 012.293-3.95M9.88 9.88A3 3 0 0114.12 14.12M6.1 6.1L4 4m16 16L4 4" />
                    </svg>
                </button>
            </div>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <script>
            function togglePasswordVisibility() {
                const input = document.getElementById('password');
                const eye = document.getElementById('icon-eye');
                const eyeOff = document.getElementById('icon-eye-off');

                if (input.type === 'password') {
                    input.type = 'text';
                    eye.classList.add('hidden');
                    eyeOff.classList.remove('hidden');
                } else {
                    input.type = 'password';
                    eye.classList.remove('hidden');
                    eyeOff.classList.add('hidden');
                }
            }
        </script>



        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
