<?php
session_start(); // Секогаш прво на почетокот

require_once __DIR__ . '/../../core/Database.php'; // Точна патека

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
    $id = $_POST['id'] ?? null;
    $body = $_POST['body'] ?? '';

    if (!$id) {
        $_SESSION['error'] = "Не е пронајдено ID на белешката.";
        header('Location: /notes');
        exit;
    }

    // Update query
    $sql = "UPDATE notes SET body = :body WHERE id = :id";
    $stmt = $db->connection->prepare($sql);
    $stmt->bindParam(':body', $body);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        // Додај flash message
        $_SESSION['success'] = "Белешката е успешно ажурирана.";
        header('Location: /notes');
        exit;
    } else {
        $_SESSION['error'] = "Грешка при ажурирање на белешката.";
        header('Location: /notes');
        exit;
    }
} else {
    $_SESSION['error'] = "Неправилно барање.";
    header('Location: /notes');
    exit;
}










