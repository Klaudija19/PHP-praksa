<?php

use core\Database;
use core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database']);

$errors = [];

$body = trim($_POST['body']);
$validator = new Validator();

if ($validator->string($body) || !$body) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
} elseif (strlen($body) > 1000) {
    $errors['body'] = 'A body of no more than 1,000 characters is required';
}

if (empty($errors)) {
    // Insert the note into the database
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $body,
        'user_id' => 1
    ]);

    // Redirect to the notes list
    header('Location: /notes');
    exit;
}

// If validation fails, return the form view with errors
$heading = 'Create Note';
view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => $errors
]);

