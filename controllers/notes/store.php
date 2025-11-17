<?php
session_start(); // секогаш прво на почетокот

use core\App;

$db = App::resolve('core\Database');
$validator = App::resolve('core\Validator');

$errors = [];

$body = trim($_POST['body'] ?? '');

// Валидација
if ($validator->string($body) || !$body) {
    $errors['body'] = 'Поле за белешка до 1,000 карактери е задолжително.';
} elseif (strlen($body) > 1000) {
    $errors['body'] = 'Поле за белешка до 1,000 карактери е задолжително.';
}

if (empty($errors)) {
    // Insert белешка во базата
    $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
        'body' => $body,
        'user_id' => 1
    ]);

    // Додај flash message
    $_SESSION['success'] = "Белешката е успешно додадена.";

    // Redirect кон листата на белешки
    header('Location: /notes');
    exit;
}

// Ако валидацијата не успее, прикажи create view со errors
$heading = 'Create Note';
view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => $errors
]);


