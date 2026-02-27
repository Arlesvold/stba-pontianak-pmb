<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationResource\Pages;
use App\Models\Registration;
use Filament\Forms\Components\Placeholder;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationLabel = 'Pendaftaran PMB';

    protected static ?string $modelLabel = 'Pendaftaran';

    protected static ?string $pluralModelLabel = 'Pendaftaran';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Ubah Status & Feedback')
                ->description('Ubah status pendaftaran dan berikan feedback kepada pendaftar.')
                ->schema([
                    Select::make('status')
                        ->label('Status Pendaftaran')
                        ->options([
                            'pending' => 'Pending',
                            'proses' => 'Dalam Proses',
                            'selesai' => 'Selesai',
                        ])
                        ->required()
                        ->native(false),

                    Textarea::make('feedback')
                        ->label('Feedback untuk Pendaftar')
                        ->placeholder('Berikan catatan atau feedback untuk pendaftar...')
                        ->rows(4)
                        ->columnSpanFull(),
                ])
                ->columns(1)
                ->collapsible(),

            Section::make('Data Pribadi')
                ->schema([
                    Placeholder::make('nama_lengkap')
                        ->label('Nama Lengkap')
                        ->content(fn(?Registration $record): string => $record?->nama_lengkap ?? '-'),

                    Placeholder::make('nik')
                        ->label('NIK')
                        ->content(fn(?Registration $record): string => $record?->nik ?? '-'),

                    Placeholder::make('tanggal_lahir')
                        ->label('Tanggal Lahir')
                        ->content(fn(?Registration $record): string => $record?->tanggal_lahir?->format('d F Y') ?? '-'),

                    Placeholder::make('jenis_kelamin')
                        ->label('Jenis Kelamin')
                        ->content(fn(?Registration $record): string => $record?->jenis_kelamin === 'L' ? 'Laki-laki' : ($record?->jenis_kelamin === 'P' ? 'Perempuan' : '-')),

                    Placeholder::make('email')
                        ->label('Email')
                        ->content(fn(?Registration $record): string => $record?->email ?? '-'),

                    Placeholder::make('no_hp')
                        ->label('No. HP')
                        ->content(fn(?Registration $record): string => $record?->no_hp ?? '-'),

                    Placeholder::make('alamat')
                        ->label('Alamat')
                        ->content(fn(?Registration $record): string => $record?->alamat ?? '-')
                        ->columnSpanFull(),
                ])
                ->columns(2)
                ->collapsible(),

            Section::make('Data Akademik')
                ->schema([
                    Placeholder::make('program_studi')
                        ->label('Program Studi')
                        ->content(fn(?Registration $record): string => $record?->program_studi ?? '-'),

                    Placeholder::make('sistem_kuliah')
                        ->label('Sistem Kuliah')
                        ->content(fn(?Registration $record): string => $record?->sistem_kuliah ?? '-'),

                    Placeholder::make('sekolah_asal')
                        ->label('Sekolah Asal')
                        ->content(fn(?Registration $record): string => $record?->sekolah_asal ?? '-'),

                    Placeholder::make('jurusan_sekolah')
                        ->label('Jurusan Sekolah')
                        ->content(fn(?Registration $record): string => $record?->jurusan_sekolah ?? '-'),

                    Placeholder::make('tahun_lulus')
                        ->label('Tahun Lulus')
                        ->content(fn(?Registration $record): string => $record?->tahun_lulus ?? '-'),
                ])
                ->columns(2)
                ->collapsible(),

            Section::make('Dokumen')
                ->schema([
                    Placeholder::make('ijazah_path')
                        ->label('Ijazah / Rapor')
                        ->content(function (?Registration $record): HtmlString {
                            if ($record?->ijazah_path) {
                                $url = Storage::url($record->ijazah_path);
                                return new HtmlString('<a href="' . $url . '" target="_blank" class="text-primary-600 underline">Lihat Dokumen</a>');
                            }
                            return new HtmlString('<span class="text-danger-600">Belum diupload</span>');
                        }),

                    Placeholder::make('foto_path')
                        ->label('Pas Foto')
                        ->content(function (?Registration $record): HtmlString {
                            if ($record?->foto_path) {
                                $url = Storage::url($record->foto_path);
                                return new HtmlString('<a href="' . $url . '" target="_blank" class="text-primary-600 underline">Lihat Foto</a>');
                            }
                            return new HtmlString('<span class="text-danger-600">Belum diupload</span>');
                        }),
                ])
                ->columns(2)
                ->collapsible(),

            Section::make('Informasi Sistem')
                ->schema([
                    Placeholder::make('created_at')
                        ->label('Tanggal Daftar')
                        ->content(fn(?Registration $record): string => $record?->created_at?->format('d F Y H:i') ?? '-'),

                    Placeholder::make('updated_at')
                        ->label('Terakhir Diupdate')
                        ->content(fn(?Registration $record): string => $record?->updated_at?->format('d F Y H:i') ?? '-'),
                ])
                ->columns(2)
                ->collapsed(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->label('Nama')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->label('Email')
                    ->searchable(),

                TextColumn::make('no_hp')
                    ->label('No. HP')
                    ->searchable(),

                TextColumn::make('program_studi')
                    ->label('Prodi')
                    ->sortable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'proses' => 'info',
                        'selesai' => 'success',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'proses' => 'Proses',
                        'selesai' => 'Selesai',
                        default => $state,
                    }),

                TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->date('d M Y')
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'proses' => 'Dalam Proses',
                        'selesai' => 'Selesai',
                    ]),

                SelectFilter::make('program_studi')
                    ->label('Program Studi')
                    ->options(
                        Registration::query()
                            ->distinct()
                            ->pluck('program_studi', 'program_studi')
                            ->toArray()
                    ),
            ])
            ->recordActions([
                ViewAction::make(),
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

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Data Pribadi')
                    ->schema([
                        TextEntry::make('nama_lengkap')->label('Nama Lengkap'),
                        TextEntry::make('nik')->label('NIK'),
                        TextEntry::make('tanggal_lahir')->label('Tanggal Lahir')->date('d F Y'),
                        TextEntry::make('jenis_kelamin')->label('Jenis Kelamin')
                            ->formatStateUsing(fn(string $state): string => $state === 'L' ? 'Laki-laki' : 'Perempuan'),
                        TextEntry::make('email')->label('Email'),
                        TextEntry::make('no_hp')->label('No. HP'),
                        TextEntry::make('alamat')->label('Alamat')->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Data Akademik')
                    ->schema([
                        TextEntry::make('program_studi')->label('Program Studi'),
                        TextEntry::make('sistem_kuliah')->label('Sistem Kuliah'),
                        TextEntry::make('sekolah_asal')->label('Sekolah Asal'),
                        TextEntry::make('jurusan_sekolah')->label('Jurusan Sekolah'),
                        TextEntry::make('tahun_lulus')->label('Tahun Lulus'),
                    ])
                    ->columns(2),

                Section::make('Dokumen & Foto')
                    ->schema([
                        ImageEntry::make('foto_path')
                            ->label('Pas Foto')
                            ->disk('public')
                            ->imageHeight(250)
                            ->imageWidth(200)
                            ->extraImgAttributes([
                                'class' => 'object-cover rounded-lg border border-gray-200',
                                'style' => 'max-width:200px; max-height:250px;',
                            ])
                            ->columnSpan(1),

                        TextEntry::make('ijazah_path')
                            ->label('Ijazah / Rapor')
                            ->formatStateUsing(fn() => 'Lihat Dokumen')
                            ->url(fn(Registration $record) => $record->ijazah_path ? Storage::url($record->ijazah_path) : '#')
                            ->openUrlInNewTab()
                            ->visible(fn(Registration $record) => (bool) $record->ijazah_path)
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Section::make('Status Pendaftaran')
                    ->schema([
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                'pending' => 'warning',
                                'proses' => 'info',
                                'selesai' => 'success',
                                default => 'gray',
                            }),
                        TextEntry::make('feedback')->label('Feedback Admin'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'edit' => Pages\EditRegistration::route('/{record}/edit'),
            'view' => Pages\ViewRegistration::route('/{record}'),
        ];
    }
}
