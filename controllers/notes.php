<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'My Notes';

// Прво правиме query()
$statement = $db->query('SELECT * FROM notes WHERE user_id = 1');

// Потоа ги земаме сите резултати
$notes = $statement->fetchAll();

require __DIR__ . '/../views/notes.view.php';
