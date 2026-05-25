<?php

namespace App\Filament\Pages;

use App\Models\Setting;
use Filament\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
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
        $this->data['wa_admin'] = cache()->remember('wa_admin', 3600, function () {
            return Setting::where('key', 'wa_admin')->value('value') ?? '';
        });
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
            ]);
    }

    public function save(): void
    {
        $data = $this->form->getState();
        $waAdmin = preg_replace('/\D/', '', $data['wa_admin'] ?? '');

        Setting::updateOrCreate(
            ['key' => 'wa_admin'],
            ['value' => $waAdmin]
        );

        cache()->forget('wa_admin');

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
