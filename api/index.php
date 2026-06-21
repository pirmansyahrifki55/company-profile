<?php

// Ensure required writable directories exist in /tmp (Vercel read-only filesystem)
$dirs = [
    '/tmp',
    '/tmp/storage',
    '/tmp/storage/app',
    '/tmp/storage/app/public',
    '/tmp/storage/framework',
    '/tmp/storage/framework/cache',
    '/tmp/storage/framework/cache/data',
    '/tmp/storage/framework/sessions',
    '/tmp/storage/framework/views',
    '/tmp/storage/logs',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0775, true);
    }
}

// Override storage path to /tmp/storage
putenv('LARAVEL_STORAGE_PATH=/tmp/storage');

// Forward request to Laravel's public/index.php
require __DIR__ . '/../public/index.php';
