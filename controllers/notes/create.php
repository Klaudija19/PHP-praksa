<?php

$heading = 'Create Note';
$errors = $errors ?? [];

view('notes/create.view.php', [
    'heading' => $heading,
    'errors' => $errors
]);





