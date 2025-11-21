<?php
/**
 * Тест скрипт за проверка на функционалност
 * 
 * Кога користиш PHP вграден сервер (php -S localhost:8888):
 * Отвори: http://localhost:8888/test_functionality.php
 * 
 * Кога користиш XAMPP Apache:
 * Отвори: http://localhost/websites/demo/test_functionality.php
 */

session_start();

// Database connection check
require __DIR__ . '/core/bootstrap.php';
use core\Database;
use core\App;

echo "<h1>🔍 Проверка на функционалност</h1>";
echo "<style>
    body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }
    .success { background: #d4edda; color: #155724; padding: 10px; margin: 10px 0; border-radius: 5px; }
    .error { background: #f8d7da; color: #721c24; padding: 10px; margin: 10px 0; border-radius: 5px; }
    .info { background: #d1ecf1; color: #0c5460; padding: 10px; margin: 10px 0; border-radius: 5px; }
    .section { background: white; padding: 15px; margin: 10px 0; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
</style>";

// 1. Проверка на конекција со база
echo "<div class='section'>";
echo "<h2>1. Проверка на база податоци</h2>";
try {
    $db = App::resolve(Database::class);
    echo "<div class='success'>✅ Конекција со базата успешна!</div>";
    
    // Проверка дали постои app_users табела
    $tables = $db->query("SHOW TABLES LIKE 'app_users'")->fetchAll();
    if (count($tables) > 0) {
        echo "<div class='success'>✅ Табелата 'app_users' постои</div>";
        
        // Проверка за password колона
        $columns = $db->query("SHOW COLUMNS FROM app_users LIKE 'password'")->fetchAll();
        if (count($columns) > 0) {
            echo "<div class='success'>✅ Колоната 'password' постои во app_users</div>";
        } else {
            echo "<div class='error'>❌ Колоната 'password' НЕ постои во app_users. Изврши го: demo/sqldatabase/add_password_column.sql</div>";
        }
    } else {
        echo "<div class='error'>❌ Табелата 'app_users' не постои. Изврши го: demo/sqldatabase/myapp.sql</div>";
    }
    
    // Проверка за notes табела
    $notesTable = $db->query("SHOW TABLES LIKE 'notes'")->fetchAll();
    if (count($notesTable) > 0) {
        echo "<div class='success'>✅ Табелата 'notes' постои</div>";
        
        // Број на белешки
        $notesCount = $db->query("SELECT COUNT(*) as count FROM notes")->find();
        echo "<div class='info'>ℹ️ Вкупно белешки во базата: " . $notesCount['count'] . "</div>";
    } else {
        echo "<div class='error'>❌ Табелата 'notes' не постои</div>";
    }
    
} catch (Exception $e) {
    echo "<div class='error'>❌ Грешка: " . $e->getMessage() . "</div>";
}
echo "</div>";

// 2. Проверка на конфигурација
echo "<div class='section'>";
echo "<h2>2. Проверка на конфигурација</h2>";
$config = require __DIR__ . '/config.php';
echo "<div class='info'>";
echo "База: " . $config['database']['dbname'] . "<br>";
echo "Host: " . $config['database']['host'] . "<br>";
echo "User: " . $config['database']['user'] . "<br>";
echo "</div>";
echo "</div>";

// 3. Проверка на session
echo "<div class='section'>";
echo "<h2>3. Проверка на Session</h2>";
if (session_status() === PHP_SESSION_ACTIVE) {
    echo "<div class='success'>✅ Session е активен</div>";
    if (isset($_SESSION['user'])) {
        echo "<div class='info'>ℹ️ Најавен корисник: " . htmlspecialchars($_SESSION['user']['email'] ?? 'N/A') . "</div>";
    } else {
        echo "<div class='info'>ℹ️ Нема најавен корисник (ова е нормално ако не си најавен)</div>";
    }
} else {
    echo "<div class='error'>❌ Session не е активен</div>";
}
echo "</div>";

// 4. Проверка на датотеки
echo "<div class='section'>";
echo "<h2>4. Проверка на важни датотеки</h2>";
$importantFiles = [
    'core/Database.php',
    'controllers/registration/create.php',
    'controllers/registration/login.php',
    'controllers/notes/index.php',
    'views/registration/create.view.php',
    'views/registration/login.view.php',
    'views/notes/index.view.php',
    'routes.php'
];

foreach ($importantFiles as $file) {
    $path = __DIR__ . '/' . $file;
    if (file_exists($path)) {
        echo "<div class='success'>✅ $file</div>";
    } else {
        echo "<div class='error'>❌ $file (не постои)</div>";
    }
}
echo "</div>";

// 5. Упатства за тестирање
echo "<div class='section'>";
echo "<h2>5. 📋 Упатства за тестирање</h2>";

// Детектирај кој порт се користи
$port = $_SERVER['SERVER_PORT'] ?? 8888;
$baseUrl = "http://localhost:{$port}";

echo "<div class='info'>ℹ️ Сервер порт: <strong>{$port}</strong></div>";
echo "<ol style='line-height: 1.8;'>";
echo "<li><strong>Регистрација:</strong> Оди на <a href='{$baseUrl}/' target='_blank'>{$baseUrl}/</a> и кликни на 'Register'</li>";
echo "<li><strong>Најава:</strong> Откако ќе се регистрираш, оди на <a href='{$baseUrl}/login' target='_blank'>{$baseUrl}/login</a> и најави се</li>";
echo "<li><strong>Белешки:</strong> Откако ќе се најавиш, кликни на 'Notes' за да ги видиш твоите белешки</li>";
echo "<li><strong>Креирај белешка:</strong> Во Notes страницата, кликни 'Create New Note'</li>";
echo "</ol>";
echo "</div>";

// 6. Тест корисници (ако постојат)
echo "<div class='section'>";
echo "<h2>6. Тест корисници во базата</h2>";
try {
    $users = $db->query("SELECT id, email, name FROM app_users LIMIT 5")->get();
    if (count($users) > 0) {
        echo "<table border='1' cellpadding='10' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>ID</th><th>Email</th><th>Name</th></tr>";
        foreach ($users as $user) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($user['id']) . "</td>";
            echo "<td>" . htmlspecialchars($user['email']) . "</td>";
            echo "<td>" . htmlspecialchars($user['name'] ?? 'N/A') . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<div class='info'>ℹ️ Нема корисници во базата. Регистрирај нов корисник!</div>";
    }
} catch (Exception $e) {
    echo "<div class='error'>❌ Грешка при читање на корисници: " . $e->getMessage() . "</div>";
}
echo "</div>";

echo "<hr>";
$port = $_SERVER['SERVER_PORT'] ?? 8888;
$baseUrl = "http://localhost:{$port}";
echo "<p><strong>✅ Ако сите проверки се успешни, оди на <a href='{$baseUrl}/' target='_blank'>{$baseUrl}/</a> и започни со тестирање!</strong></p>";
?>

