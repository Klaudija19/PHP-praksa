<?php
require_once __DIR__ . '/../../Validator.php';

$config = require __DIR__ . '/../../config.php';
$db = new Database($config['database']);

$heading = 'Create Note';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = trim($_POST['body']);
    $validator = new Validator();

    if ($validator->string($body) || !$body) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    } elseif (strlen($body) > 1000) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    }

    if (empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $body,
            'user_id' => 1
        ]);

        header('Location: /notes'); // router патеката за листа на белешки
        exit;
    }
}

require_once __DIR__ . '/../../views/notes/create.view.php';





