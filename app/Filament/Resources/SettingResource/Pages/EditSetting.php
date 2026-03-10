<?php

namespace App\Filament\Resources\SettingResource\Pages;

use Filament\Actions\DeleteAction;
use App\Filament\Resources\SettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Cache;

class EditSetting extends EditRecord
{
    protected static string $resource = SettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make()
                ->after(fn () => Cache::forget('marquee_text')),
        ];
    }

    protected function afterSave(): void
    {
        Cache::forget('marquee_text');
    }
}
