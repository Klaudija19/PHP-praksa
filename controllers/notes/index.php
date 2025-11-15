<?php
// Пример белешки
$notes = [
    ['id' => 1, 'body' => 'Ideas for next vacation'],
    ['id' => 2, 'body' => 'Next art project search'],
    ['id' => 3, 'body' => 'Work reminders'],
];

// За POST форма (додавање нова белешка)
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $body = trim($_POST['body'] ?? '');
    if (!$body) {
        $errors['body'] = 'A body of no more than 1,000 characters is required';
    } else {
        $notes[] = ['id' => count($notes) + 1, 'body' => $body];
    }
}

// Heading за banner.php
$heading = "Notes Dashboard";

// Вчитување на view
require_once __DIR__ . '/../../views/notes/index.view.php';
