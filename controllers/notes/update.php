<?php
require_once __DIR__ . '/../../core/Database.php'; // точна патека

use core\Database;

// Конфигурација за базата
$config = [
    'host' => '127.0.0.1',
    'dbname' => 'myapps',
    'charset' => 'utf8mb4'
];

// Креирање на инстанца на Database
$db = new Database($config);

// Обработка на POST барање
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $body = $_POST['body'];

    // Update query
    $sql = "UPDATE notes SET body = :body WHERE id = :id";
    $stmt = $db->connection->prepare($sql); // користиме ->connection од класата
    $stmt->bindParam(':body', $body);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        header('Location: /notes');
        exit;
    } else {
        echo "Грешка при ажурирање на белешката.";
    }
} else {
    echo "Неправилно барање.";
}









