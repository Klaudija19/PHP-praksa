<?php

use core\Container;
use core\App;

// Define BASE_PATH only if not defined
if (!defined('BASE_PATH')) {
    $basePath = realpath(__DIR__ . '/../');
    define('BASE_PATH', $basePath ? $basePath : dirname(__DIR__));
}

// Load helper functions
require_once BASE_PATH . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'functions.php';

// Autoload classes
spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = basePath("{$class}.php");

    if (file_exists($file)) {
        require_once $file;
    }
});

// Initialize Container
$container = new Container();

// Load config
$config = require basePath('config.php');

// Bind Database with correct config
$container->bind('core\Database', function () use ($config) {
    return new \core\Database($config['database']);
});

// Set container to App
App::setContainer($container);


