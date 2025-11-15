<?php

use core\App;

$db = App::resolve('core\Database');

$heading = "Notes Dashboard";
$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->get();

view('notes/index.view.php', [
    'heading' => $heading,
    'notes' => $notes
]);
