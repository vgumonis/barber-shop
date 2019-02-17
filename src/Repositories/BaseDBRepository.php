<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 21.27
 */

namespace App\Repositories;

use App\Core\DBConnection;

class BaseDBRepository
{

    protected $pdo;

    protected $config = [
        'host' => '127.0.0.1',
        'db' => 'barber',
        'user' => 'root',
        'password' => 'elpaso'
    ];

    public function __construct()
    {
        $pdoConnection = new DBConnection($this->config);
        $this->pdo = $pdoConnection->getConnection();
    }


    public function getPdo()
    {
        return $this->pdo;
    }
}