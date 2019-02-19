<?php

namespace App\Core;

use PDO;
use PDOException;

class DBConnection
{
    private $pdo;

    private $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }

    public function getConnection()
    {
        if (!is_null($this->pdo)) {
            return $this->pdo;
        }

        $host = $this->config['host'];
        $db = $this->config['db'];
        $user = $this->config['user'];
        $pass = $this->config['password'];

        $dsn = "mysql:host=$host;dbname=$db";

        try {
            $this->pdo =  new PDO($dsn, $user, $pass);
            return $this->pdo;
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
