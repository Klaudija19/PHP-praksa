<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$id = $params['id'];

$note = $db->query(
    "SELECT * FROM notes WHERE id = :id",
    ['id' => $id]
)->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['id']);

view("notes/show", [
    'heading' => 'Note',
    'note' => $note
]);

