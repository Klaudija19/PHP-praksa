<?php

// Define base path constant (normalize path separators for Windows compatibility)
define('BASE_PATH', str_replace('\\', '/', __DIR__ . '/..'));

// Load helper functions first
require __DIR__ . '/functions.php';

// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    $file = basePath("core/{$class}.php");
    if (file_exists($file)) {
        require $file;
    }
});

