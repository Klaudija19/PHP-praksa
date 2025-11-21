<?php

use core\App;
use core\Database;

$db = App::resolve(Database::class);

$id = $_POST['id'];

$note = $db->query(
    "SELECT * FROM notes WHERE id = :id",
    ['id' => $id]
)->findOrFail();

authorize($note['user_id'] === $_SESSION['user']['id']);

$db->query("DELETE FROM notes WHERE id = :id", ['id' => $id]);

header("Location: /notes");
exit;

