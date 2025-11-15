<?php

use core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 1;

// Handle POST request for deletion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
    
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
}

// Handle GET request for displaying the note
$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);
