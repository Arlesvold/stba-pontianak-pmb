<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->after(fn() => Cache::forget('active_marquee')),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('active_marquee');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
