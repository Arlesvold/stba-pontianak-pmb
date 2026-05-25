<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Actions\Action;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class Integrasi extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationLabel = 'Integrasi';

    protected static ?string $title = 'Integrasi API';

    protected static ?int $navigationSort = 98;

    protected string $view = 'filament.pages.integrasi';

    public ?array $data = [];

    public static function canAccess(): bool
    {
        return Auth::user()?->hasRole('Super Admin') ?? false;
    }

    public function mount(): void
    {
        $this->form->fill([
            'fonnte_api_token' => Setting::get('FONNTE_API_TOKEN'),
            'recaptcha_site_key' => Setting::get('RECAPTCHA_SITE_KEY'),
            'recaptcha_secret_key' => Setting::get('RECAPTCHA_SECRET_KEY'),
        ]);
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Section::make('Fonnte WhatsApp API')
                    ->description('Token API untuk mengirim notifikasi WhatsApp melalui Fonnte.')
                    ->schema([
                        TextInput::make('fonnte_api_token')
                            ->label('Fonnte API Token')
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->hintAction(
                                Action::make('testToken')
                                    ->label('Tes Koneksi')
                                    ->icon('heroicon-m-check-badge')
                                    ->color('primary')
                                    ->action(function ($state) {
                                        if (empty($state)) {
                                            Notification::make()
                                                ->title('Token masih kosong!')
                                                ->warning()
                                                ->send();
                                            return;
                                        }

                                        try {
                                            $response = Http::withHeaders([
                                                'Authorization' => $state
                                            ])->post('https://api.fonnte.com/device');

                                            if ($response->successful() && $response->json('status') === true) {
                                                Notification::make()
                                                    ->title('Koneksi Berhasil!')
                                                    ->body('Token Fonnte valid. Device: ' . ($response->json('device') ?? 'Aktif'))
                                                    ->success()
                                                    ->send();
                                            } else {
                                                Notification::make()
                                                    ->title('Koneksi Gagal')
                                                    ->body($response->json('reason') ?? 'Token Fonnte tidak valid atau device belum scan barcode.')
                                                    ->danger()
                                                    ->send();
                                            }
                                        } catch (\Exception $e) {
                                            Notification::make()
                                                ->title('Error Koneksi')
                                                ->body($e->getMessage())
                                                ->danger()
                                                ->send();
                                        }
                                    })
                            ),
                    ]),

                Section::make('Google reCAPTCHA v2')
                    ->description('Kunci reCAPTCHA untuk proteksi form login dan registrasi.')
                    ->schema([
                        TextInput::make('recaptcha_site_key')
                            ->label('Site Key')
                            ->maxLength(255),
                        TextInput::make('recaptcha_secret_key')
                            ->label('Secret Key')
                            ->password()
                            ->revealable()
                            ->maxLength(255)
                            ->helperText('Pastikan Site Key dan Secret Key berasal dari pasangan yang sama di Google reCAPTCHA Console.'),
                    ]),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            Setting::set('FONNTE_API_TOKEN', $data['fonnte_api_token'] ?? null);
            Setting::set('RECAPTCHA_SITE_KEY', $data['recaptcha_site_key'] ?? null);
            Setting::set('RECAPTCHA_SECRET_KEY', $data['recaptcha_secret_key'] ?? null);

            Notification::make()
                ->title('Pengaturan berhasil disimpan')
                ->success()
                ->send();
        } catch (\Exception $e) {
            Log::error('Failed to save integration settings: ' . $e->getMessage());

            Notification::make()
                ->title('Gagal menyimpan pengaturan')
                ->body('Terjadi kesalahan saat menyimpan. Silakan coba lagi.')
                ->danger()
                ->send();
        }
    }
}
