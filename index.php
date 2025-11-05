<?php
require 'Database.php';

$config = [
    'host' => '127.0.0.1',
    'port' => 3306,
    'dbname' => 'myapp',
    'charset' => 'utf8mb4',
    'user' => 'root',
    'pass' => ''
];

$db = new Database($config);

// Еден пост со id = 1
$id = 1;
$post = $db->query("SELECT * FROM posts WHERE id = $id")->fetch();

// Сите users од app_users
$users = $db->query("SELECT * FROM app_users")->fetchAll();

// Прикажи резултати
echo "<h2>Post with ID = 1</h2>";
echo "<pre>";
print_r($post);
echo "</pre>";

echo "<h2>All Users</h2>";
echo "<pre>";
print_r($users);
echo "</pre>";


