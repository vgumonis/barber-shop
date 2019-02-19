<?php

namespace App\Controllers;

use App\Repositories\ComplainRepository;
use App\Models\ComplainModel;
use App\Repositories\ReservationRepository;


class ComplainController extends BaseController
{
    private $complainRepository;
    private $reservationRepository;

    public function __construct()
    {
        $this->complainRepository = new ComplainRepository();
        $this->reservationRepository = new ReservationRepository();
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
        $this->loadAllReservationsListView("Complain submitted successfully");
    }

    private function loadAllReservationsListView($message)
    {
        $reservations = $this->reservationRepository->getAllReservations();
        $this->view('public/barber/reservations-list.php', ['reservations' => $reservations, 'message' => $message]);
    }
}
