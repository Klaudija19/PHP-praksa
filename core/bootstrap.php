<?php

// Define base path constant (normalize path separators for Windows compatibility)
define('BASE_PATH', str_replace('\\', '/', __DIR__ . '/..'));

// Load helper functions first
require __DIR__ . '/functions.php';

// Autoload classes with namespace support
spl_autoload_register(function ($class) {
    // Convert namespace separators to directory separators
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = basePath("{$class}.php");
    if (file_exists($file)) {
        require $file;
    }
});

