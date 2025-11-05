<?php

require 'functions.php';
require 'Database.php';

$config = require('config.php');

$db = new Database($config ['database']);

// Пребарувај ја табелата posts
$posts = $db->query("SELECT * FROM posts")->fetchAll();

// Прикажи ја содржината на табелата
echo '<pre>';
print_r($posts);
echo '</pre>';


