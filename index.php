<?php

require 'functions.php';
require 'Database.php';

$config = [
    'host' => 'localhost',
    'port' => 3307,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4',
];


$db = new Database($config);

$posts = $db-> query("select * from posts")->fetchAll();


dd($posts);
