<?php

namespace simple_mvc_framework\src\Illuminate\Core;
use PDO;

class Model
{
    protected $connection;
    protected $pdo;
    protected $tableName;

    function __construct()
    {
        $this->connection = new DbConnector();
        $this->pdo = $this->connection->connect();
    }

    public function insert($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->tableName} (query_string) VALUES ('{$data}')");
        $stmt->execute();
    }

    public function all()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->tableName}");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}