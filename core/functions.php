<?php

// Normalize base directory path
function basePath($path = '')
{
    $basePath = rtrim(BASE_PATH, '/\\' . DIRECTORY_SEPARATOR);
    $path = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, ltrim($path, '/\\'));
    return $basePath . DIRECTORY_SEPARATOR . $path;
}

// Compatibility alias (ако кодот користи base_path())
function base_path($path = '')
{
    return basePath($path);
}

// Render a view from /views
function view($path, $attributes = [])
{
    extract($attributes); // Makes array keys available as variables

    // Remove .view.php extension if already present
    $path = preg_replace('/\.view\.php$/', '', $path);
    
    // Remove .php extension if present
    $path = preg_replace('/\.php$/', '', $path);
    
    $filePath = basePath("views/{$path}.view.php");

    if (!file_exists($filePath)) {
        error_log("View not found: {$filePath}");
        abort(404);
    }

    require $filePath;
}

// Redirect helper
function redirect($path)
{
    header("Location: {$path}");
    exit;
}

// Abort helper
function abort($code = 404)
{
    http_response_code($code);

    $file = basePath("views/{$code}.php");

    if (file_exists($file)) {
        require $file;
    } else {
        echo "<h1>Error {$code}</h1>";
    }

    exit;
}

// Authorization helper
function authorize($condition, $status = 403)
{
    if (!$condition) {
        abort($status);
    }
}

