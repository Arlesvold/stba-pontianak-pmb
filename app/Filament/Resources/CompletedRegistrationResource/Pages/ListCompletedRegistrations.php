<?php

namespace App\Filament\Resources\CompletedRegistrationResource\Pages;

use App\Filament\Resources\CompletedRegistrationResource;
use Filament\Resources\Pages\ListRecords;

class ListCompletedRegistrations extends ListRecords
{
    protected static string $resource = CompletedRegistrationResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
