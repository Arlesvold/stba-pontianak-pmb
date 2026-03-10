<?php

namespace App\Filament\Resources\Stafs\Pages;

use App\Filament\Resources\Stafs\StafResource;
use Filament\Resources\Pages\CreateRecord;

class CreateStaf extends CreateRecord
{
    protected static string $resource = StafResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
