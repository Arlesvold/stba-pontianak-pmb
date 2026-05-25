<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RegistrationResource\Pages;
use App\Models\Registration;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use Filament\Support\Enums\FontWeight;
use Filament\Support\Enums\TextSize;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

class RegistrationResource extends Resource
{
    protected static ?string $model = Registration::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static string|\UnitEnum|null $navigationGroup = 'Sistem PMB';

    protected static ?string $navigationLabel = 'Data Pendaftar';

    protected static ?string $modelLabel = 'Pendaftaran';

    protected static ?string $pluralModelLabel = 'Pendaftaran';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Section::make('Perbarui Status & Catatan')
                ->description('Ubah status pendaftaran dan berikan catatan untuk pendaftar.')
                ->icon('heroicon-o-pencil-square')
                ->schema([
                    Select::make('status')
                        ->label('Status Pendaftaran')
                        ->options([
                            'pending'  => 'Pending',
                            'proses'   => 'Dalam Proses',
                            'selesai'  => 'Selesai',
                        ])
                        ->required()
                        ->native(false),

                    Textarea::make('feedback')
                        ->label('Catatan / Feedback untuk Pendaftar')
                        ->placeholder('Berikan catatan atau instruksi untuk pendaftar...')
                        ->rows(5)
                        ->columnSpanFull(),
                ])
                ->columns(1),
        ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->columns(3)
            ->components([

                // ── Sidebar kiri (1 kolom) ──────────────────────────
                Section::make()
                    ->columnSpan(1)
                    ->schema([
                        ImageEntry::make('foto_path')
                            ->hiddenLabel()
                            ->disk('public')
                            ->height(200)
                            ->extraImgAttributes([
                                'class' => 'rounded-xl object-cover shadow mx-auto',
                                'style' => 'display:block; max-width:150px; aspect-ratio:3/4;',
                            ]),

                        TextEntry::make('nama_lengkap')
                            ->hiddenLabel()
                            ->size(TextSize::Large)
                            ->weight(FontWeight::Bold),

                        TextEntry::make('status')
                            ->hiddenLabel()
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'pending' => 'warning',
                                'proses'  => 'info',
                                'selesai' => 'success',
                                default   => 'gray',
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'pending' => 'Pending',
                                'proses'  => 'Dalam Proses',
                                'selesai' => 'Selesai',
                                default   => $state,
                            }),

                        TextEntry::make('email')
                            ->label('Email')
                            ->icon('heroicon-m-envelope')
                            ->copyable(),

                        TextEntry::make('no_hp')
                            ->label('No. HP')
                            ->icon('heroicon-m-phone'),

                        TextEntry::make('created_at')
                            ->label('Tanggal Daftar')
                            ->date('d F Y')
                            ->icon('heroicon-m-calendar-days'),

                        TextEntry::make('feedback')
                            ->label('Catatan Admin')
                            ->placeholder('Belum ada catatan.')
                            ->color('gray'),
                    ]),

                // ── Konten utama (2 kolom) ──────────────────────────
                Section::make()
                    ->columnSpan(2)
                    ->schema([
                        Tabs::make()
                            ->tabs([

                                Tab::make('Biodata Diri')
                                    ->icon('heroicon-m-user')
                                    ->schema([
                                        TextEntry::make('nik')
                                            ->label('NIK'),
                                        TextEntry::make('tanggal_lahir')
                                            ->label('Tanggal Lahir')
                                            ->date('d F Y'),
                                        TextEntry::make('jenis_kelamin')
                                            ->label('Jenis Kelamin')
                                            ->formatStateUsing(fn (?string $state): string => match ($state) {
                                                'L'     => 'Laki-laki',
                                                'P'     => 'Perempuan',
                                                default => '-',
                                            }),
                                        TextEntry::make('alamat')
                                            ->label('Alamat')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),

                                Tab::make('Data Akademik')
                                    ->icon('heroicon-m-academic-cap')
                                    ->schema([
                                        TextEntry::make('program_studi')
                                            ->label('Program Studi Pilihan'),
                                        TextEntry::make('sistem_kuliah')
                                            ->label('Sistem Kuliah'),
                                        TextEntry::make('sekolah_asal')
                                            ->label('Sekolah Asal'),
                                        TextEntry::make('jurusan_sekolah')
                                            ->label('Jurusan Sekolah'),
                                        TextEntry::make('tahun_lulus')
                                            ->label('Tahun Lulus'),
                                    ])
                                    ->columns(2),

                                Tab::make('Berkas Dokumen')
                                    ->icon('heroicon-m-document-text')
                                    ->schema([
                                        TextEntry::make('ijazah_path')
                                            ->label('Ijazah / Rapor')
                                            ->badge()
                                            ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat Dokumen' : 'Belum diupload')
                                            ->color(fn (?string $state): string => $state ? 'primary' : 'danger')
                                            ->icon(fn (?string $state): string => $state ? 'heroicon-m-document-arrow-down' : 'heroicon-m-x-circle')
                                            ->url(fn (Registration $record): ?string => $record->ijazah_path ? Storage::url($record->ijazah_path) : null)
                                            ->openUrlInNewTab(),

                                        TextEntry::make('kk_path')
                                            ->label('Kartu Keluarga (KK)')
                                            ->badge()
                                            ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat Dokumen' : 'Belum diupload')
                                            ->color(fn (?string $state): string => $state ? 'primary' : 'danger')
                                            ->icon(fn (?string $state): string => $state ? 'heroicon-m-document-arrow-down' : 'heroicon-m-x-circle')
                                            ->url(fn (Registration $record): ?string => $record->kk_path ? Storage::url($record->kk_path) : null)
                                            ->openUrlInNewTab(),

                                        TextEntry::make('transkrip_path')
                                            ->label('Transkrip Nilai')
                                            ->badge()
                                            ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat Dokumen' : 'Belum diupload')
                                            ->color(fn (?string $state): string => $state ? 'primary' : 'danger')
                                            ->icon(fn (?string $state): string => $state ? 'heroicon-m-document-arrow-down' : 'heroicon-m-x-circle')
                                            ->url(fn (Registration $record): ?string => $record->transkrip_path ? Storage::url($record->transkrip_path) : null)
                                            ->openUrlInNewTab(),

                                        TextEntry::make('foto_path')
                                            ->label('Pas Foto')
                                            ->badge()
                                            ->formatStateUsing(fn (?string $state): string => $state ? 'Lihat Foto' : 'Belum diupload')
                                            ->color(fn (?string $state): string => $state ? 'success' : 'danger')
                                            ->icon(fn (?string $state): string => $state ? 'heroicon-m-photo' : 'heroicon-m-x-circle')
                                            ->url(fn (Registration $record): ?string => $record->foto_path ? Storage::url($record->foto_path) : null)
                                            ->openUrlInNewTab(),
                                    ])
                                    ->columns(2),
                            ]),
                    ]),
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
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'proses'  => 'info',
                        'selesai' => 'success',
                        default   => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Pending',
                        'proses'  => 'Proses',
                        'selesai' => 'Selesai',
                        default   => $state,
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
                        'proses'  => 'Dalam Proses',
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegistrations::route('/'),
            'edit'  => Pages\EditRegistration::route('/{record}/edit'),
            'view'  => Pages\ViewRegistration::route('/{record}'),
        ];
    }
}
