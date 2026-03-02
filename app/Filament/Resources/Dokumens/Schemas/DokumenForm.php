<?php

namespace App\Filament\Resources\Dokumens\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\ViewField;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class DokumenForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('judul')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('file')
                    ->required()
                    ->disk('public')
                    ->directory('dokumen')
                    ->visibility('public')
                    ->acceptedFileTypes([
                        'application/pdf',
                        'application/msword',
                        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                        'application/vnd.ms-excel',
                        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                    ])
                    ->maxSize(20480)
                    ->downloadable()
                    ->openable()
                    ->live()
                    ->afterStateUpdated(function ($state, $livewire) {
                        // Filament v4: $state bisa berupa array atau object atau string
                        $fileState = is_array($state) ? (array_values($state)[0] ?? null) : $state;

                        if (empty($fileState)) {
                            $livewire->dispatch('dokumen-preview-updated', url: '', ext: '', name: '');
                            return;
                        }

                        try {
                            // === CASE 1: TemporaryUploadedFile object (CREATE page) ===
                            if ($fileState instanceof TemporaryUploadedFile) {
                                $extension = strtolower($fileState->getClientOriginalExtension());
                                $filename = $fileState->getClientOriginalName();

                                // Bersihkan preview lama
                                if (Storage::disk('public')->exists('dokumen-preview')) {
                                    $oldFiles = Storage::disk('public')->files('dokumen-preview');
                                    foreach ($oldFiles as $old) {
                                        Storage::disk('public')->delete($old);
                                    }
                                }

                                // Salin file ke public disk agar browser bisa akses
                                $previewPath = 'dokumen-preview/' . uniqid('prev_') . '.' . $extension;
                                Storage::disk('public')->put(
                                    $previewPath,
                                    file_get_contents($fileState->getRealPath())
                                );

                                $livewire->dispatch(
                                    'dokumen-preview-updated',
                                    url: asset('storage/' . $previewPath) . '?t=' . time(),
                                    ext: $extension,
                                    name: $filename,
                                );
                                return;
                            }

                            // === CASE 2: String path ===
                            if (is_string($fileState)) {
                                // Coba sebagai Livewire temp file
                                if (str_contains($fileState, 'livewire-tmp')) {
                                    try {
                                        $tempFile = TemporaryUploadedFile::createFromLivewire($fileState);
                                        $extension = strtolower($tempFile->getClientOriginalExtension());
                                        $filename = $tempFile->getClientOriginalName();

                                        $previewPath = 'dokumen-preview/' . uniqid('prev_') . '.' . $extension;
                                        Storage::disk('public')->put(
                                            $previewPath,
                                            file_get_contents($tempFile->getRealPath())
                                        );

                                        $livewire->dispatch(
                                            'dokumen-preview-updated',
                                            url: asset('storage/' . $previewPath) . '?t=' . time(),
                                            ext: $extension,
                                            name: $filename,
                                        );
                                        return;
                                    } catch (\Throwable $innerEx) {
                                        Log::warning('Livewire temp file preview failed', [
                                            'message' => $innerEx->getMessage(),
                                        ]);
                                    }
                                }

                                // Saved file path (EDIT page)
                                $livewire->dispatch(
                                    'dokumen-preview-updated',
                                    url: asset('storage/' . $fileState),
                                    ext: strtolower(pathinfo($fileState, PATHINFO_EXTENSION)),
                                    name: basename($fileState),
                                );
                                return;
                            }

                            // Tipe lain yang tidak diketahui
                            $livewire->dispatch('dokumen-preview-updated', url: '', ext: '', name: '');
                        } catch (\Throwable $e) {
                            Log::error('DokumenForm preview error', [
                                'message' => $e->getMessage(),
                                'state_type' => gettype($fileState),
                            ]);
                            $livewire->dispatch('dokumen-preview-updated', url: '', ext: '', name: '');
                        }
                    })
                    ->columnSpanFull(),

                ViewField::make('preview_dokumen')
                    ->label('Preview Dokumen')
                    ->view('filament.forms.components.dokumen-preview')
                    ->dehydrated(false)
                    ->columnSpanFull(),

                Textarea::make('deskripsi')
                    ->columnSpanFull(),
            ]);
    }
}
