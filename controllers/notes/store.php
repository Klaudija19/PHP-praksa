<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$body = trim($_POST['body']);

$errors = [];

if ($body === '') {
    $errors['body'] = "Note body is required.";
}

if (!empty($errors)) {
    view("notes/create", [
        'heading' => 'Create Note',
        'errors' => $errors,
        'body' => $body
    ]);
    return;
}

$db->query(
    "INSERT INTO notes (body, user_id) VALUES (:body, :user_id)",
    [
        'body' => $body,
        'user_id' => $_SESSION['user']['id']
    ]
);

header("Location: /notes");
exit;




