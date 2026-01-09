<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages\CreateSetting;
use App\Filament\Resources\SettingResource\Pages\EditSetting;
use App\Filament\Resources\SettingResource\Pages\ListSettings;
use App\Models\Setting;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SettingResource extends Resource
{
    protected static ?string $model = Setting::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Marquee Pengumuman';

    protected static ?string $pluralModelLabel = 'Marquee Pengumuman';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('value')
                ->label('Teks Marquee')
                ->rows(3)
                ->required()
                ->helperText('Teks ini akan tampil berjalan di bagian atas beranda STBA.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('value')
                    ->label('Teks Marquee')
                    ->limit(80),

                TextColumn::make('updated_at')
                    ->label('Diubah pada')
                    ->dateTime()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([]); // tidak perlu bulk delete
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit'   => EditSetting::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->where('key', 'marquee_text');
    }
}
