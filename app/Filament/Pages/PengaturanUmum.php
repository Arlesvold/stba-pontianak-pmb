<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PengaturanUmum extends Page
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan';

    protected static ?string $navigationLabel = 'Pengaturan Umum';

    protected static ?string $title = 'Pengaturan Umum';

    protected static ?int $navigationSort = 10;

    protected string $view = 'filament.pages.pengaturan-umum';

    public ?array $data = [];

    public function mount(): void
    {
        $keys = ['wa_admin', 'hero_badge_label', 'hero_tahun_akademik', 'hero_title', 'hero_subtitle', 'hero_image', 'cta_title', 'cta_subtitle', 'cta_image', 'login_image'];
        $settings = Setting::whereIn('key', $keys)->pluck('value', 'key');

        $this->form->fill([
            'wa_admin'            => $settings->get('wa_admin', ''),
            'hero_badge_label'    => $settings->get('hero_badge_label', ''),
            'hero_tahun_akademik' => $settings->get('hero_tahun_akademik', ''),
            'hero_title'          => $settings->get('hero_title', ''),
            'hero_subtitle'       => $settings->get('hero_subtitle', ''),
            'hero_image'          => $settings->get('hero_image') ?: null,
            'cta_title'           => $settings->get('cta_title', ''),
            'cta_subtitle'        => $settings->get('cta_subtitle', ''),
            'cta_image'           => $settings->get('cta_image') ?: null,
            'login_image'         => $settings->get('login_image') ?: null,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->statePath('data')
            ->components([
                Section::make('WhatsApp Admin PMB')
                    ->description('Nomor ini digunakan pada tombol "Hubungi via WhatsApp" di halaman status pendaftaran mahasiswa.')
                    ->schema([
                        TextInput::make('wa_admin')
                            ->label('Nomor WhatsApp Admin')
                            ->placeholder('Contoh: 6281234567890')
                            ->helperText('Format internasional tanpa tanda +. Contoh: 6281234567890')
                            ->required()
                            ->maxLength(20),
                    ]),

                Section::make('Konten Hero Homepage')
                    ->description('Gambar latar dan teks yang tampil di bagian paling atas halaman beranda.')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('hero_image')
                            ->label('Gambar Latar Hero')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->helperText('Format WebP atau JPG disarankan. Jika kosong, gambar default digunakan.')
                            ->columnSpanFull(),

                        TextInput::make('hero_badge_label')
                            ->label('Teks Badge')
                            ->placeholder('Penerimaan Mahasiswa Baru')
                            ->maxLength(100),

                        TextInput::make('hero_tahun_akademik')
                            ->label('Tahun Akademik')
                            ->placeholder('2025/2026')
                            ->maxLength(20),

                        TextInput::make('hero_title')
                            ->label('Judul Hero')
                            ->placeholder('Wujudkan Masa Depan Anda Bersama STBA Pontianak')
                            ->maxLength(255)
                            ->columnSpanFull(),

                        Textarea::make('hero_subtitle')
                            ->label('Subtitle Hero')
                            ->placeholder('Bergabunglah dengan kampus bahasa yang modern...')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Gambar Halaman Login')
                    ->description('Gambar yang tampil di panel kanan halaman login PMB.')
                    ->schema([
                        FileUpload::make('login_image')
                            ->label('Gambar Login')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->helperText('Format WebP atau JPG disarankan. Jika kosong, gambar default digunakan.')
                            ->columnSpanFull(),
                    ]),

                Section::make('Konten CTA Pendaftaran')
                    ->description('Gambar latar dan teks pada banner ajakan mendaftar di tengah halaman beranda.')
                    ->schema([
                        FileUpload::make('cta_image')
                            ->label('Gambar Latar CTA')
                            ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('settings')
                            ->visibility('public')
                            ->helperText('Format WebP atau JPG disarankan. Jika kosong, gambar default digunakan.')
                            ->columnSpanFull(),

                        TextInput::make('cta_title')
                            ->label('Judul CTA')
                            ->placeholder('Ayo Mulai Mendaftar')
                            ->maxLength(255),

                        Textarea::make('cta_subtitle')
                            ->label('Subtitle CTA')
                            ->placeholder('Mari wujudkan masa depan gemilang Anda bersama kami di STBA Pontianak.')
                            ->rows(2),
                    ]),
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();

        // wa_admin: strip non-digits
        $waAdmin = preg_replace('/\D/', '', $data['wa_admin'] ?? '');
        Setting::updateOrCreate(['key' => 'wa_admin'], ['value' => $waAdmin]);

        // hero & cta text settings
        $textKeys = ['hero_badge_label', 'hero_tahun_akademik', 'hero_title', 'hero_subtitle', 'cta_title', 'cta_subtitle'];
        foreach ($textKeys as $key) {
            Setting::updateOrCreate(['key' => $key], ['value' => $data[$key] ?? '']);
        }

        // image settings — only update if a new file was uploaded (non-empty)
        foreach (['hero_image', 'cta_image', 'login_image'] as $key) {
            if (!empty($data[$key])) {
                Setting::updateOrCreate(['key' => $key], ['value' => $data[$key]]);
            }
        }

        cache()->forget('login_image');

        cache()->forget('wa_admin');
        cache()->forget('hero_settings');

        Notification::make()
            ->title('Pengaturan berhasil disimpan.')
            ->success()
            ->send();
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->action('save'),
        ];
    }
}
