<?php

use core\Router;

// Always use basePath(), NOT base_path()
$router = require basePath('routes.php');

// Parse request URI (removes query params)
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Determine HTTP method (support for PUT/DELETE via _method field)
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($requestPath, $method);


