<?php

namespace App\Filament\Resources\Stafs\Tables;

use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Actions\BulkActionGroup;

class StafsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('foto')
                    ->label('Foto')
                    ->getStateUsing(function ($record) {
                        $path = $record->foto;

                        // Bangun URL penuh ke storage
                        return asset('storage/' . ltrim($path, '/'));
                    })
                    ->square()
                    ->height(56),

                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('posisi')
                    ->label('Posisi')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('display_order')
                    ->label('Urutan')
                    ->sortable(),

                ToggleColumn::make('status_aktif')
                    ->label('Aktif'),
            ])
            ->defaultSort('display_order')   // urut dari order kecil ke besar
            ->recordUrl(null)
            ->recordActions([
                Actions\EditAction::make(),
                Actions\DeleteAction::make(),
            ])
            // di configure():
            ->bulkActions([
                BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
