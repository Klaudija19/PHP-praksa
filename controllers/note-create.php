<?php

$config = require('config.php');
$db = new Database($config['database']);

$heading = 'Create Note';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = trim($_POST['body']);

    // Проверка дали е празна
    if (empty($body)) {
        $errors['body'] = 'A body is required';
    }
    // Проверка дали е подолга од 1000 карактери
    elseif (strlen($body) > 1000) {
        $errors['body'] = 'The body can not be more than 1,000 characters';
    }
    else {
        // Додавање во базата ако е валидно
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $body,
            'user_id' => 1
        ]);

        // Redirect кон notes страница после успешно додавање
        header('Location: notes.php');
        exit;
    }
}

require 'views/note-create.view.php';

