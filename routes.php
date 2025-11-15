<?php

use core\Router;

$router = new Router();

// GET routes
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/contact', 'controllers/contact.php');

// POST routes
$router->post('/notes/create', 'controllers/notes/create.php');

// DELETE routes
$router->delete('/notes', 'controllers/notes/destroy.php');

return $router;
