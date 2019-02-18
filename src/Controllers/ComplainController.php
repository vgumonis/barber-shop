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
use App\Controllers\Reservation;


class ComplainController extends BaseController
{
    private $complainRepository;

    private $reservationController;

    public function __construct()
    {
        $this->complainRepository = new ComplainRepository();
        $this->reservationController = new Reservation();
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
        $this->reservationController->loadReservationsListView("Complain submitted successfully");
    }

}
