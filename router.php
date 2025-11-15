<?php

function routeToController($path, $routes) {
    if (isset($routes[$path])) {
        require __DIR__ . '/' . $routes[$path];
    } else {
        http_response_code(404);
        require __DIR__ . '/views/404.php';
    }
}

$routes = require __DIR__ . '/routes.php';

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
routeToController($requestPath, $routes);
