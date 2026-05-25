<?php

$dir = new RecursiveDirectoryIterator(__DIR__ . '/../app/Filament/Resources');
$iterator = new RecursiveIteratorIterator($dir);

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        $content = file_get_contents($path);
        
        $newContent = str_replace(
            'protected static ?string $navigationGroup =', 
            'protected static string|\UnitEnum|null $navigationGroup =', 
            $content
        );
        
        if ($newContent !== $content) {
            file_put_contents($path, $newContent);
            echo "Fixed type in: " . $file->getFilename() . "\n";
        }
    }
}
