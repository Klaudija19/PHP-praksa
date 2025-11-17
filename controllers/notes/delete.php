<?php
require_once __DIR__ . '/../../core/Database.php';

use core\Database;

// Конфигурација на базата
$config = [
    'host' => '127.0.0.1',
    'dbname' => 'myapps',
    'charset' => 'utf8mb4'
];

// Креирање на Database инстанца
$db = new Database($config);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM notes WHERE id = :id";
    $stmt = $db->connection->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: /notes');
        exit;
    } else {
        echo "Грешка при бришење на белешката.";
    }
} else {
    echo "Неправилно барање.";
}
