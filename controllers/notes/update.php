<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$id = $params['id'];
$body = trim($_POST['body'] ?? '');

$note = $db->query(
    "SELECT * FROM notes WHERE id = :id",
    ['id' => $id]
)->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['id']);

$errors = [];

if ($body === '') {
    $errors['body'] = "Note body is required.";
}

if (!empty($errors)) {
    view("notes/edit", [
        'heading' => 'Edit Note',
        'note' => $note,
        'errors' => $errors
    ]);
    return;
}

$db->query(
    "UPDATE notes SET body = :body WHERE id = :id",
    [
        'body' => $body,
        'id' => $id
    ]
);

header("Location: /notes");
exit;













