<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SettingResource\Pages\CreateSetting;
use App\Filament\Resources\SettingResource\Pages\EditSetting;
use App\Filament\Resources\SettingResource\Pages\ListSettings;
use App\Models\Marquee;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Notifications\Notification;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class SettingResource extends Resource
{
    protected static ?string $model = Marquee::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-megaphone';

    protected static ?string $navigationLabel = 'Marquee Pengumuman';

    protected static ?string $pluralModelLabel = 'Marquee Pengumuman';

    protected static ?string $modelLabel = 'Marquee';

    public static function canAccess(): bool
    {
        return Auth::user()?->hasRole('Super Admin') ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Textarea::make('text')
                ->label('Teks Marquee')
                ->rows(3)
                ->required()
                ->columnSpanFull()
                ->helperText('Teks ini akan tampil berjalan di bagian atas beranda STBA.'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('text')
                    ->label('Teks Marquee')
                    ->limit(80)
                    ->wrap(),

                ToggleColumn::make('is_active')
                    ->label('Aktif')
                    ->afterStateUpdated(function (Marquee $record, bool $state): void {
                        if ($state) {
                            $previousActive = Marquee::where('id', '!=', $record->id)
                                ->where('is_active', true)
                                ->exists();

                            Marquee::where('id', '!=', $record->id)
                                ->update(['is_active' => false]);

                            if ($previousActive) {
                                Notification::make()
                                    ->title('Marquee lain dinonaktifkan')
                                    ->body('Hanya satu marquee yang dapat ditampilkan. Marquee sebelumnya telah dinonaktifkan secara otomatis.')
                                    ->warning()
                                    ->send();
                            }
                        }
                        Cache::forget('active_marquee');
                    }),

                TextColumn::make('created_at')
                    ->label('Dibuat pada')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->after(function () {
                        Cache::forget('active_marquee');
                    }),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->after(function () {
                            Cache::forget('active_marquee');
                        }),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => ListSettings::route('/'),
            'create' => CreateSetting::route('/create'),
            'edit'   => EditSetting::route('/{record}/edit'),
        ];
    }
}
