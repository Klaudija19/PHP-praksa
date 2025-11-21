<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

// земи го ID-то од URL
$id = $_GET['id'] ?? null;

if (!$id) {
    die("❌ Missing note ID.");
}

// fetch белешката од базата
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $id])->fetch();

if (!$note) {
    die("❌ Note not found.");
}

// прати ја белешката во view
view('notes/edit.view.php', [
    'note' => $note
]);














