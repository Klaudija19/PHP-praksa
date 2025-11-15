<?php

$config = require __DIR__ . '/../../config.php';
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

// Земи го ID од URL, ако не постои - постави 1
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

// Земи ја белешката со соодветното ID
$note = $db->query('SELECT * FROM notes WHERE id = :id',
    ['id' => $id
    ])->findOrFail();
authorize($note['user_id'] === $currentUserId);

require __DIR__ . '/../../views/notes/show.view.php';
