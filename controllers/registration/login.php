<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Fetch user from DB
    $user = $db->query(
        "SELECT * FROM app_users WHERE email = :email",
        ['email' => $email]
    )->find();

    if (!$user) {
        $errors['email'] = "User not found! Please register first.";
    } else {
        // Check if user has a password set
        if (empty($user['password'])) {
            $errors['email'] = "This account doesn't have a password set. Please register to set your password.";
            $errors['password'] = "Or use the 'Register' button to create a password for this account.";
        } elseif (!password_verify($password, $user['password'])) {
            $errors['password'] = "Incorrect password!";
        }
    }

    if (empty($errors)) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email']
        ];

        header("Location: /notes");
        exit;
    }
}

require basePath("views/registration/login.view.php");




