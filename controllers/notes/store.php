<?php

use core\App;

$db = App::resolve('core\Database');
$validator = App::resolve('core\Validator');

$errors = [];

$body = trim($_POST['body']);

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


