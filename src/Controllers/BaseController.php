<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 20.47
 */

namespace App\Controllers;


class BaseController
{

    protected function view(string $file, array $params = [])
    {
        include ($file);
    }

}
