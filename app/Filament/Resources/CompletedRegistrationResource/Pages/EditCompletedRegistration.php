<?php

namespace App\Filament\Resources\CompletedRegistrationResource\Pages;

use App\Filament\Resources\CompletedRegistrationResource;
use App\Mail\PmbCompletedMail;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Mail;

class EditCompletedRegistration extends EditRecord
{
    protected static string $resource = CompletedRegistrationResource::class;

    protected ?string $oldStatus = null;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function beforeSave(): void
    {
        $this->oldStatus = $this->record->status;
    }

    protected function afterSave(): void
    {
        if ($this->oldStatus !== 'selesai' && $this->record->status === 'selesai') {
            if ($this->record->email) {
                Mail::to($this->record->email)->send(new PmbCompletedMail($this->record));
            }
        }
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
