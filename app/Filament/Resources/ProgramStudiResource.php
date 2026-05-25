<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramStudiResource\Pages\EditProgramStudi;
use App\Filament\Resources\ProgramStudiResource\Pages\ListProgramStudis;
use App\Models\ProgramStudi;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class ProgramStudiResource extends Resource
{
    protected static ?string $model = ProgramStudi::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string|\UnitEnum|null $navigationGroup = 'Website Profile';

    protected static ?string $navigationLabel = 'Program Studi';

    protected static ?int $navigationSort = 3;

    protected static ?string $modelLabel = 'Program Studi';

    protected static ?string $pluralModelLabel = 'Program Studi';

    public static function canAccess(): bool
    {
        return Auth::user()?->hasRole('admin') ?? false;
    }

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Informasi Dasar')
                ->columns(3)
                ->schema([
                    TextInput::make('kode')
                        ->label('Kode')
                        ->placeholder('d3 atau s1')
                        ->required()
                        ->maxLength(10),

                    TextInput::make('nama')
                        ->label('Nama Program Studi')
                        ->placeholder('Diploma (D3) Bahasa Inggris')
                        ->required()
                        ->maxLength(255)
                        ->columnSpan(2),

                    TextInput::make('jenjang')
                        ->label('Jenjang')
                        ->placeholder('D3 atau S1')
                        ->required()
                        ->maxLength(10),
                ]),

            Section::make('Deskripsi & Visi')
                ->schema([
                    Textarea::make('deskripsi')
                        ->label('Deskripsi Singkat')
                        ->placeholder('Paragraf pengantar program studi...')
                        ->rows(3),

                    Textarea::make('visi')
                        ->label('Visi')
                        ->rows(3),
                ]),

            Section::make('Misi')
                ->schema([
                    Repeater::make('misi')
                        ->label('')
                        ->schema([
                            TextInput::make('item')
                                ->label('Butir Misi')
                                ->required(),
                        ])
                        ->addActionLabel('Tambah Butir Misi')
                        ->reorderable()
                        ->collapsible()
                        ->defaultItems(0),
                ]),

            Section::make('Tujuan')
                ->schema([
                    Repeater::make('tujuan')
                        ->label('')
                        ->schema([
                            TextInput::make('item')
                                ->label('Butir Tujuan')
                                ->required(),
                        ])
                        ->addActionLabel('Tambah Butir Tujuan')
                        ->reorderable()
                        ->collapsible()
                        ->defaultItems(0),
                ]),

            Section::make('Peminatan Studi')
                ->schema([
                    Repeater::make('peminatan')
                        ->label('')
                        ->schema([
                            TextInput::make('icon')
                                ->label('Bootstrap Icon')
                                ->placeholder('bi-briefcase')
                                ->helperText('Nama class Bootstrap Icons, contoh: bi-briefcase, bi-book, bi-translate'),

                            TextInput::make('judul')
                                ->label('Judul Peminatan')
                                ->required(),

                            Textarea::make('deskripsi')
                                ->label('Deskripsi')
                                ->rows(2),
                        ])
                        ->columns(3)
                        ->addActionLabel('Tambah Peminatan')
                        ->reorderable()
                        ->collapsible()
                        ->defaultItems(0),
                ]),

            Section::make('Kurikulum')
                ->schema([
                    Textarea::make('kurikulum')
                        ->label('Deskripsi Kurikulum')
                        ->rows(3),

                    TextInput::make('kurikulum_pdf_url')
                        ->label('URL / Path PDF Kurikulum')
                        ->placeholder('https://... atau /storage/dokumen/kurikulum-d3.pdf')
                        ->maxLength(500),
                ]),

            Section::make('Karir Lulusan')
                ->schema([
                    Textarea::make('karir_deskripsi')
                        ->label('Paragraf Pengantar')
                        ->rows(2),

                    Repeater::make('karir_list')
                        ->label('Daftar Karir')
                        ->schema([
                            TextInput::make('item')
                                ->label('Karir')
                                ->required(),
                        ])
                        ->addActionLabel('Tambah Karir')
                        ->reorderable()
                        ->collapsible()
                        ->defaultItems(0),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('jenjang')
                    ->label('Jenjang')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('nama')
                    ->label('Nama Program Studi')
                    ->searchable(),

                TextColumn::make('kode')
                    ->label('Kode')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->actions([
                EditAction::make(),
            ])
            ->paginated(false);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListProgramStudis::route('/'),
            'edit'  => EditProgramStudi::route('/{record}/edit'),
        ];
    }
}
