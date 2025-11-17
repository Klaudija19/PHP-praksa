<?php
session_start(); // секогаш прво на почетокот

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

// Обработка на POST барање
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if (!$id) {
        $_SESSION['error'] = "Не е пронајдено ID на белешката.";
        header('Location: /notes');
        exit;
    }

    // Delete query
    $sql = "DELETE FROM notes WHERE id = :id";
    $stmt = $db->connection->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Белешката е успешно избришана.";
        header('Location: /notes');
        exit;
    } else {
        $_SESSION['error'] = "Грешка при бришење на белешката.";
        header('Location: /notes');
        exit;
    }
} else {
    $_SESSION['error'] = "Неправилно барање.";
    header('Location: /notes');
    exit;
}
