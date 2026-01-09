<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages\CreateAgenda;
use App\Filament\Resources\AgendaResource\Pages\EditAgenda;
use App\Filament\Resources\AgendaResource\Pages\ListAgendas;
use App\Models\Agenda;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationLabel = 'Agenda Penting';

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('judul')
                ->label('Judul Agenda'),

            DatePicker::make('tanggal_mulai')
                ->label('Tanggal Mulai')
                ->required(),

            DatePicker::make('tanggal_selesai')
                ->label('Tanggal Selesai')
                ->helperText('Boleh dikosongkan jika hanya satu hari.'),

            Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(3)
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul')
                    ->limit(40)
                    ->searchable(),

                TextColumn::make('tanggal_mulai')
                    ->label('Mulai')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_selesai')
                    ->label('Selesai')
                    ->date()
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Dibuat')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('tanggal_mulai', 'asc')
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
            'index'  => ListAgendas::route('/'),
            'create' => CreateAgenda::route('/create'),
            'edit'   => EditAgenda::route('/{record}/edit'),
        ];
    }
}
