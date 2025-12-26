<?php
$configDir = __DIR__ . '/config';
$config = [];

foreach (glob($configDir . '/*.json') as $file) {
    $json = file_get_contents($file);
    $data = json_decode($json, true);
    if ($data !== null) {
        // rekurzívan merge-eljük a fájlokat
        $config = array_replace_recursive($config, $data);
    }
}

header('Content-Type: application/json');
echo json_encode($config, JSON_PRETTY_PRINT);
