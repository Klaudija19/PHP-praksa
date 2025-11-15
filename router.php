<?php

use core\Router;

// Get the router instance from routes.php
$router = require basePath('routes.php');

// Get the request URI
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Handle method override for DELETE, PATCH, PUT (since HTML forms only support GET and POST)
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($requestPath, $method);
