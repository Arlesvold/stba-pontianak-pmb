<?php

namespace App\Filament\Resources\KontakResource\Pages;

use App\Filament\Resources\KontakResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListKontaks extends ListRecords
{
    protected static string $resource = KontakResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
