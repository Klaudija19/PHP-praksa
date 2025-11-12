<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Note';

// Земи го ID од URL, ако не постои - постави 1
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// Земи ја белешката со соодветното ID
$note = $db->query('SELECT * FROM notes WHERE id = :id',
    ['id' => $id
    ])->fetch();

if(! $note) {
    abort();
}

if($note['user_id'] !== 1) {
    abort(403);
}
require __DIR__ . '/../views/note.view.php';
