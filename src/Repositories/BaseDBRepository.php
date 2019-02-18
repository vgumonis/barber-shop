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

//    protected $config = [
//        'host' => '127.0.0.1',
//        'db' => 'barber',
//        'user' => 'root',
//        'password' => 'elpaso'
//    ];

    protected $config;

    public function __construct()
    {
        $this->setConfig();
        $pdoConnection = new DBConnection($this->config);
        $this->pdo = $pdoConnection->getConnection();
    }


    public function getPdo()
    {
        return $this->pdo;
    }

    private function setConfig()
    {
        $dbconfig = json_decode(file_get_contents(__DIR__."/../../dbConfig.json"), true);

        $this->config = [
            'host' => $dbconfig['host'],
            'db' => $dbconfig['db'],
            'user' => $dbconfig['user'],
            'password' => $dbconfig['password']
        ];
    }
}
