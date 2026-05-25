<?php

namespace App\Filament\Resources\RegistrationResource\Pages;

use App\Filament\Resources\RegistrationResource;
use Filament\Actions;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;

class ViewRegistration extends ViewRecord
{
    protected static string $resource = RegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('tindak_lanjut')
                ->label('Tindak Lanjut')
                ->icon('heroicon-o-check-circle')
                ->color('success')
                ->modalHeading('Perbarui Status Pendaftaran')
                ->modalDescription('Ubah status dan berikan catatan untuk pendaftar.')
                ->modalWidth('lg')
                ->form([
                    Select::make('status')
                        ->label('Status Pendaftaran')
                        ->options([
                            'pending' => 'Pending',
                            'proses'  => 'Dalam Proses',
                            'selesai' => 'Selesai',
                        ])
                        ->required()
                        ->native(false)
                        ->default(fn () => $this->record->status),

                    Textarea::make('feedback')
                        ->label('Catatan untuk Pendaftar')
                        ->placeholder('Berikan catatan atau instruksi untuk pendaftar...')
                        ->rows(4)
                        ->default(fn () => $this->record->feedback),
                ])
                ->action(function (array $data): void {
                    $this->record->update([
                        'status'   => $data['status'],
                        'feedback' => $data['feedback'] ?? null,
                    ]);

                    Notification::make()
                        ->title('Status berhasil diperbarui!')
                        ->success()
                        ->send();

                    $this->refreshFormData(['status', 'feedback']);
                }),

            Actions\EditAction::make()
                ->label('Edit')
                ->icon('heroicon-o-pencil-square'),

            Actions\DeleteAction::make()
                ->label('Hapus'),
        ];
    }
}
