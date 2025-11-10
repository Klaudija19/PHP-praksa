<?php
require 'Database.php';

// Конфигурација за база
$config = [
    'host' => '127.0.0.1',
    'port' => 3306,
    'dbname' => 'myapps',
    'charset' => 'utf8mb4',
    'user' => 'root',
    'pass' => ''
];

// Креирање на Database инстанца
$db = new Database($config);

// Земаме сите постови од табелата posts
$posts = $db->query("SELECT id, title FROM posts")->fetchAll();

// Прикажување на постовите
echo "<h2>Blog Posts</h2>";
if (!empty($posts)) {
    echo "<ul>";
    foreach ($posts as $post) {
        echo "<li><strong>ID:</strong> " . $post['id'] . " - <strong>Title:</strong> " . $post['title'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "Нема податоци во табелата.";
}
?>
