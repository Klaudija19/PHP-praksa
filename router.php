<?php

function routeToController($path, $routes) {
    if (isset($routes[$path])) {
        require basePath($routes[$path]);
    } else {
        http_response_code(404);
        require basePath('views/404.php');
    }
}

$routes = require basePath('routes.php');

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
routeToController($requestPath, $routes);
