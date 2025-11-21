<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

// земи го ID од POST
$id = $_POST['id'] ?? null;

if (!$id) {
    die("❌ Missing note ID.");
}

// земи body од формата
$body = $_POST['body'] ?? '';

// апдејт на белешката
$db->query(
    "UPDATE notes SET body = :body WHERE id = :id",
    [
        'body' => $body,
        'id'   => $id
    ]
);

// пренасочување назад кон листата на белешки
header("Location: /notes");
exit;














