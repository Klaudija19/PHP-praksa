<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (strlen($password) < 4) {
        $errors['password'] = "Password must be at least 4 characters.";
    }

    // Check if email exists
    $user = $db->query(
        "SELECT * FROM app_users WHERE email = :email",
        ['email' => $email]
    )->find();

    // If no errors → create or update account
    if (empty($errors)) {
        if ($user) {
            // User exists but may not have password - update it
            if (empty($user['password'])) {
                // Update existing user with password
                $db->query(
                    "UPDATE app_users SET password = :password WHERE email = :email",
                    [
                        'email' => $email,
                        'password' => password_hash($password, PASSWORD_DEFAULT)
                    ]
                );
            } else {
                // User already has password
                $errors['email'] = "This email is already registered. Please login instead.";
            }
        } else {
            // Create new user
            $db->query(
                "INSERT INTO app_users (email, password) VALUES (:email, :password)",
                [
                    'email' => $email,
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ]
            );
        }

        // Redirect only if no errors
        if (empty($errors)) {
            header("Location: /login");
            exit;
        }
    }
}

// VIEW
require basePath("views/registration/create.view.php");



