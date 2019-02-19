<?php

namespace App\Controllers;

use App\Repositories\ComplainRepository;
use App\Models\ComplainModel;
use App\Controllers\ReservationController;


class ComplainController extends BaseController
{
    private $complainRepository;

    private $reservationController;

    public function __construct()
    {
        $this->complainRepository = new ComplainRepository();
        $this->reservationController = new ReservationController();
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
