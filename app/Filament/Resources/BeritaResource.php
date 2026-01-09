<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages\CreateBerita;
use App\Filament\Resources\BeritaResource\Pages\EditBerita;
use App\Filament\Resources\BeritaResource\Pages\ListBeritas;
use App\Models\Berita;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationLabel = 'Berita Kampus';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('judul')
                ->label('Judul')
                ->required()
                ->maxLength(255)
                ->live(onBlur: true)
                ->afterStateUpdated(function ($state, callable $set) {
                    $set('slug', Str::slug($state));
                }),

            TextInput::make('slug')
                ->required()
                ->maxLength(255)
                ->helperText('Otomatis dari judul, bisa diubah jika perlu.'),

            DatePicker::make('tanggal')
                ->label('Tanggal')
                ->required(),

            FileUpload::make('gambar')
                ->label('Gambar (WebP disarankan)')
                ->image()
                ->directory('berita')
                ->imagePreviewHeight(150)
                ->hint('Gunakan gambar .webp agar loading cepat.')
                ->preserveFilenames(),

            RichEditor::make('isi')
                ->label('Isi Berita')
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('gambar')
                    ->label('Gambar')
                    ->square()
                    ->height(48),

                TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tanggal', 'desc')
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
            'index'  => ListBeritas::route('/'),
            'create' => CreateBerita::route('/create'),
            'edit'   => EditBerita::route('/{record}/edit'),
        ];
    }
}
