<?php

use core\Router;

$router = new Router();

// GET routes
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note/{id}', 'controllers/notes/show.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/contact', 'controllers/contact.php');

// POST routes
$router->post('/notes', 'controllers/notes/store.php');

// DELETE routes
$router->delete('/note/{id}', 'controllers/notes/destroy.php');

return $router;
