<?php

namespace App\Filament\Resources\Stafs\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;

class StafForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([
            FileUpload::make('foto')
                ->label('Foto Staf')
                ->image()
                ->disk('public')           // storage/app/public
                ->directory('staf')        // storage/app/public/staf
                ->imagePreviewHeight(150)
                ->preserveFilenames()
                ->required(),

            TextInput::make('nama')
                ->label('Nama Staf / Dosen')
                ->required()
                ->maxLength(255),

            TextInput::make('posisi')
                ->label('Posisi / Jabatan')
                ->helperText('Contoh: Dosen Tetap, Ketua Prodi Sastra Inggris, dll.')
                ->maxLength(255),

            TextInput::make('display_order')
                ->label('Urutan Tampil')
                ->numeric()
                ->default(1)
                ->helperText('Semakin kecil angkanya, semakin di atas urutannya.'),

            Toggle::make('status_aktif')
                ->label('Aktif ditampilkan di web?')
                ->default(true),
        ]);
    }
}
