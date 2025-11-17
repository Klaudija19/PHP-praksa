<?php
session_start(); // секогаш прво на почетокот


use core\App;

$db = App::resolve('core\Database');

$heading = 'Note';
$currentUserId = 1;

$id = isset($_GET['id']) ? (int) $_GET['id'] : 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $id
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

view('notes/show.view.php', [
    'heading' => $heading,
    'note' => $note
]);
