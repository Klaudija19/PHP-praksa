<?php
class Database
{
    public $connection;

    public function __construct($config, $username = 'root', $password = '')
    {
        // Создавање на DSN за MySQL
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        // Креирање на PDO конекција со опции
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        $this->connection = new PDO($dsn, $username, $password, $options);
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();
        return $statement;
    }
}

