<?php

namespace App\Controllers;


class BaseController
{

    protected function view(string $file, array $params = [])
    {
        include ($file);
    }

}
