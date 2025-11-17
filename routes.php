<?php

use core\Router;

$router = new Router();

// GET routes
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note/{id}', 'controllers/notes/show.php');
$router->get('/note/edit/{id}', 'controllers/notes/edit.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/contact', 'controllers/contact.php');

// Registration GET route
$router->get('/registration/create', 'controllers/registration/create.php');

// POST routes
$router->post('/notes', 'controllers/notes/store.php');
$router->post('/update', 'controllers/notes/update.php');
$router->post('/notes/delete', 'controllers/notes/delete.php');

// Registration POST route
$router->post('/registration/create', 'controllers/registration/create.php');

// PATCH routes
$router->patch('/note/{id}', 'controllers/notes/update.php');

// DELETE routes
$router->delete('/note/{id}', 'controllers/notes/destroy.php');

return $router;

