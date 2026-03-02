<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KontakResource\Pages\CreateKontak;
use App\Filament\Resources\KontakResource\Pages\EditKontak;
use App\Filament\Resources\KontakResource\Pages\ListKontaks;
use App\Models\Kontak;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class KontakResource extends Resource
{
    protected static ?string $model = Kontak::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-phone';

    protected static ?string $navigationLabel = 'Kontak';

    protected static ?string $modelLabel = 'Kontak';

    protected static ?string $pluralModelLabel = 'Kontak';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('nama')
                ->label('Nama Lengkap')
                ->required()
                ->maxLength(255)
                ->placeholder('Contoh: Drs. Andi Pratama'),

            TextInput::make('tugas')
                ->label('Tugas / Jabatan')
                ->required()
                ->maxLength(255)
                ->placeholder('Contoh: Koordinator Penerimaan Mahasiswa Baru')
                ->helperText('Ketik tugas atau jabatan secara lengkap.'),

            TextInput::make('nomor_hp')
                ->label('Nomor HP / WhatsApp')
                ->required()
                ->maxLength(20)
                ->placeholder('Contoh: 0812-3456-7890'),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->maxLength(255)
                ->placeholder('Contoh: andi.pmb@stbapontianak.ac.id'),

            TextInput::make('hari_layanan')
                ->label('Hari Layanan')
                ->maxLength(255)
                ->placeholder('Contoh: Senin–Jumat')
                ->helperText('Masukkan rentang hari layanan.'),

            TextInput::make('jam_layanan')
                ->label('Jam Layanan (WIB)')
                ->maxLength(255)
                ->placeholder('Contoh: 08.00–15.00 WIB')
                ->helperText('Masukkan jam layanan dalam WIB.'),

            Toggle::make('aktif')
                ->label('Aktif')
                ->default(true)
                ->helperText('Nonaktifkan untuk menyembunyikan dari halaman kontak.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tugas')
                    ->label('Tugas')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('nomor_hp')
                    ->label('No. HP'),

                TextColumn::make('email')
                    ->label('Email'),

                TextColumn::make('hari_layanan')
                    ->label('Hari Layanan'),

                TextColumn::make('jam_layanan')
                    ->label('Jam Layanan'),

                ToggleColumn::make('aktif')
                    ->label('Aktif')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListKontaks::route('/'),
            'create' => CreateKontak::route('/create'),
            'edit'   => EditKontak::route('/{record}/edit'),
        ];
    }
}
