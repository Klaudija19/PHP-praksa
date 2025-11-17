<?php
session_start();

require_once __DIR__ . '/../../core/Database.php';
use core\Database;

$config = [
    'host' => '127.0.0.1',
    'dbname' => 'myapps',
    'charset' => 'utf8mb4'
];

$db = new Database($config);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Валидација
    if (!$name) {
        $errors['name'] = 'Name is required';
    }
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Valid email is required';
    }
    if (!$password || strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }

    // Проверка дали email постои
    $db->query("SELECT * FROM app_users WHERE email = :email", ['email' => $email]);
    $existingUser = $db->find();

    if ($existingUser) {
        $errors['email'] = 'Email is already registered';
    }

    if (empty($errors)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Внесување во базата
        $db->query("INSERT INTO app_users (name, email, password) VALUES (:name, :email, :password)", [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ]);

        $_SESSION['success'] = "User successfully registered!";
        header('Location: /registration/create');
        exit;
    }
}

// Приказ на view
view('registration/create.view.php', ['errors' => $errors]);

