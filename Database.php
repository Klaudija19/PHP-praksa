<?php
class Database
{
    public $connection;
    public $statement;

    public function __construct($config, $username = 'root', $password = '')
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("❌ Database connection failed: " . $e->getMessage());
        }
    }

    public function query($query, $params = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);
        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }

    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (! $result) {
            abort();
        }

        return $result;
    }

    public function fetchAll()
    {
        return $this->statement->fetchAll();
    }
}

