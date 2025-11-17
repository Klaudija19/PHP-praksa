<?php
session_start(); // секогаш прво на почетокот


use core\App;

$db = App::resolve('core\Database');

$currentUserId = 1;

// Get id from URL parameters
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

// Get the note to verify ownership
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

// Check authorization before deletion
authorize($note['user_id'] === $currentUserId);

// Delete the note
$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $id
]);

// Redirect after successful deletion
header('Location: /notes');
exit;


