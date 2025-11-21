<?php

use core\Router;

$router = new Router();

// ==========================
// PUBLIC ROUTES
// ==========================
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

// Authentication routes (guest only)
$router->get('/login', 'controllers/registration/login.php', ['guest']);
$router->post('/login', 'controllers/registration/login.php', ['guest']);
$router->get('/registration/create', 'controllers/registration/create.php', ['guest']);
$router->post('/registration/create', 'controllers/registration/create.php', ['guest']);
$router->get('/logout', 'controllers/registration/logout.php', ['auth']);
$router->post('/logout', 'controllers/registration/logout.php', ['auth']);

// ==========================
// NOTES (AUTH REQUIRED)
// ==========================
$router->get('/notes', 'controllers/notes/index.php', ['auth']);
$router->get('/note/{id}', 'controllers/notes/show.php', ['auth']);
$router->get('/note/edit/{id}', 'controllers/notes/edit.php', ['auth']);
$router->get('/notes/create', 'controllers/notes/create.php', ['auth']);

// CRUD operations
$router->post('/notes', 'controllers/notes/store.php', ['auth']);
$router->post('/notes/delete', 'controllers/notes/delete.php', ['auth']);
$router->patch('/note/{id}', 'controllers/notes/update.php', ['auth']);
$router->delete('/note/{id}', 'controllers/notes/destroy.php', ['auth']);

// Return the router instance
return $router;



