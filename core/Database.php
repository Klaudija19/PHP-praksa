<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    public $connection;

    public function __construct(array $config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        try {
            $this->connection = new PDO($dsn, $config['user'], $config['pass'], [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        
        // Return a wrapper object with helper methods
        return new class($stmt) {
            private $stmt;
            
            public function __construct($stmt) {
                $this->stmt = $stmt;
            }
            
            public function get() {
                return $this->stmt->fetchAll();
            }
            
            public function find() {
                return $this->stmt->fetch();
            }
            
            public function findOrFail() {
                $result = $this->stmt->fetch();
                if (!$result) {
                    abort(404);
                }
                return $result;
            }
            
            public function fetch() {
                return $this->stmt->fetch();
            }
            
            public function fetchAll() {
                return $this->stmt->fetchAll();
            }
            
            // Allow other PDOStatement methods to be called
            public function __call($name, $arguments) {
                return call_user_func_array([$this->stmt, $name], $arguments);
            }
        };
    }
}
