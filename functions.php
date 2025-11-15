<?php

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

function abort($code = Response::NOT_FOUND) {
    http_response_code($code);
    
    if ($code === Response::FORBIDDEN) {
        require __DIR__ . '/views/403.php';
    } else {
        require __DIR__ . '/views/404.php';
    }
    
    die();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (! $condition){
        abort($status);
    }
}
