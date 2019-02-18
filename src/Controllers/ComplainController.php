<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.18
 * Time: 12.08
 */

namespace App\Controllers;

use App\Repositories\ComplainRepository;
use App\Models\ComplainModel;


class ComplainController extends BaseController
{
    private $complainRepository;

    public function __construct()
    {
        $this->complainRepository = new ComplainRepository();
    }

    public function getForm()
    {
        $this->view('public/barber/complain-form.php');
    }

    public function createComplain(array $params)
    {
        $complain = new ComplainModel();
        $complain->fromArray($params);
        $this->complainRepository->create($complain);
    }

}