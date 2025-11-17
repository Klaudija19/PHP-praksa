<?php
session_start(); // секогаш прво на почетокот


use core\App;

$db = App::resolve('core\Database');

$heading = 'Edit Note';
$currentUserId = 1;

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Fetch the note by ID
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

// Authorize the current user
authorize($note['user_id'] === $currentUserId);

// Pass the note data to the edit view
view('notes/edit.view.php', [
    'heading' => $heading,
    'note' => $note,
    'errors' => $errors ?? []
]);







