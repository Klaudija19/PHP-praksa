<?php

function basePath($path)
{
    // Normalize path separators for Windows compatibility
    if (!defined('BASE_PATH')) {
        define('BASE_PATH', str_replace('\\', '/', __DIR__ . '/..'));
    }
    $base = str_replace('\\', '/', BASE_PATH);
    $path = str_replace('\\', '/', $path);
    return $base . '/' . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require basePath("views/{$path}");
}

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function urlIs($value) {
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort($code = \core\Response::NOT_FOUND) {
    http_response_code($code);
    
    if ($code === \core\Response::FORBIDDEN) {
        require basePath('views/403.php');
    } else {
        require basePath('views/404.php');
    }
    
    die();
}

function authorize($condition, $status = \core\Response::FORBIDDEN) {
    if (! $condition){
        abort($status);
    }
}

