<?php

$resources = [
    'BeritaResource.php' => 'Website Profile',
    'AgendaResource.php' => 'Website Profile',
    'EventResource.php' => 'Website Profile',
    'KontakResource.php' => 'Website Profile',
    'SettingResource.php' => 'Pengaturan',
    'Stafs/StafResource.php' => 'Akademik',
    'Dokumens/DokumenResource.php' => 'Website Profile',
];

foreach ($resources as $file => $group) {
    $path = __DIR__ . '/../app/Filament/Resources/' . $file;
    if (!file_exists($path)) {
        echo "Not found: $file\n";
        continue;
    }
    
    $content = file_get_contents($path);
    
    // Check if navigationGroup already exists
    if (strpos($content, '$navigationGroup') !== false) {
        echo "Already has group: $file\n";
        continue;
    }
    
    // Find navigationIcon to insert after it
    $pattern = '/(protected static (string\|\\\\BackedEnum\|null|\?string) \$navigationIcon\s*=\s*[^;]+;)/';
    $replacement = "$1\n\n    protected static ?string \$navigationGroup = '$group';";
    
    $newContent = preg_replace($pattern, $replacement, $content);
    if ($newContent !== $content) {
        file_put_contents($path, $newContent);
        echo "Updated: $file\n";
    } else {
        echo "Failed to match for: $file\n";
    }
}
