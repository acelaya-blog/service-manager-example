<?php
return [
    'proxies_dir' => __DIR__ . '/../var/proxies',
    'entities_dirs' => [__DIR__ . '/../src/Entity'],
    'connection' => [
        'driver' => 'pdo_sqlite',
        'path' => __DIR__ . '/../var/database.db'
    ]
];
