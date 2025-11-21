<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

// земи го ID од URL (route param)
$id = $_GET['id'] ?? null; // или ако твојот Router праќа $params['id'], користи:
#$id = $params['id'] ?? null;

if (!$id) {
    die("❌ Missing note ID.");
}

// fetch белешката од базата
$note = $db->query("SELECT * FROM notes WHERE id = :id", ['id' => $id])->fetch();

if (!$note) {
    die("❌ Note not found.");
}

// прикажи view
view('notes/show.view.php', [
    'note' => $note
]);

