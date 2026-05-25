<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Resources\SettingResource;
use App\Models\Marquee;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Cache;

class CreateSetting extends CreateRecord
{
    protected static string $resource = SettingResource::class;

    protected function afterCreate(): void
    {
        // Auto-activate newly created marquee and deactivate all others
        Marquee::where('id', '!=', $this->record->id)->update(['is_active' => false]);
        $this->record->update(['is_active' => true]);
        Cache::forget('active_marquee');
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
