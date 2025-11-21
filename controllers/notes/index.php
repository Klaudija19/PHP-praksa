<?php

use core\App;
use core\Database;

// Start session if not started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Get logged user
if (!isset($_SESSION['user']['id'])) {
    header("Location: /login");
    exit;
}

$db = App::resolve(Database::class);

$notes = $db->query(
    "SELECT * FROM notes WHERE user_id = :uid ORDER BY id DESC",
    ['uid' => $_SESSION['user']['id']]
)->get();

view("notes/index", [
    'heading' => 'Your Notes',
    'notes' => $notes
]);


