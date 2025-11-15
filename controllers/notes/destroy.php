<?php

use core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$currentUserId = 1;

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

