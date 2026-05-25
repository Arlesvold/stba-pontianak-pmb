<?php

$files = [
    __DIR__ . '/../app/Filament/Resources/RegistrationResource.php',
    __DIR__ . '/../app/Filament/Resources/CompletedRegistrationResource.php'
];

$formChunk = <<<PHP
                    Placeholder::make('kk_path')
                        ->label('Kartu Keluarga (KK)')
                        ->content(function (?Registration \$record): HtmlString {
                            if (\$record?->kk_path) {
                                \$url = Storage::url(\$record->kk_path);
                                return new HtmlString('<a href="' . \$url . '" target="_blank" class="text-primary-600 underline">Lihat Dokumen</a>');
                            }
                            return new HtmlString('<span class="text-danger-600">Belum diupload</span>');
                        }),

                    Placeholder::make('transkrip_path')
                        ->label('Transkrip Nilai')
                        ->content(function (?Registration \$record): HtmlString {
                            if (\$record?->transkrip_path) {
                                \$url = Storage::url(\$record->transkrip_path);
                                return new HtmlString('<a href="' . \$url . '" target="_blank" class="text-primary-600 underline">Lihat Dokumen</a>');
                            }
                            return new HtmlString('<span class="text-danger-600">Belum diupload</span>');
                        }),

PHP;

$infolistChunk = <<<PHP
                        TextEntry::make('kk_path')
                            ->label('Kartu Keluarga (KK)')
                            ->formatStateUsing(fn() => 'Lihat Dokumen')
                            ->url(fn(Registration \$record) => \$record->kk_path ? Storage::url(\$record->kk_path) : '#')
                            ->openUrlInNewTab()
                            ->visible(fn(Registration \$record) => (bool) \$record->kk_path)
                            ->columnSpan(1),

                        TextEntry::make('transkrip_path')
                            ->label('Transkrip Nilai')
                            ->formatStateUsing(fn() => 'Lihat Dokumen')
                            ->url(fn(Registration \$record) => \$record->transkrip_path ? Storage::url(\$record->transkrip_path) : '#')
                            ->openUrlInNewTab()
                            ->visible(fn(Registration \$record) => (bool) \$record->transkrip_path)
                            ->columnSpan(1),

PHP;

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    
    $content = file_get_contents($file);
    
    // Insert into Form schema
    $targetForm = "                    Placeholder::make('foto_path')";
    $content = str_replace($targetForm, $formChunk . $targetForm, $content);
    
    // Insert into Infolist schema
    $targetInfolist = "                    ])
                    ->columns(2),

                Section::make('Status Pendaftaran')";
    $content = str_replace($targetInfolist, $infolistChunk . $targetInfolist, $content);
    
    file_put_contents($file, $content);
    echo "Updated " . basename($file) . "\n";
}
