<?php

require 'vendor/autoload.php';

$reservationController = new \App\Controllers\Reservation();

switch ($_SERVER['REQUEST_URI']) {
    case '/customer/reservation' :
        $reservationController->loadCustomerReservationView();
        break;
    case '/customer/reservation/create' :
        $reservationController->addReservation($_POST);
        break;
    case '/customer/reservation/existing' :
        $reservationController->getExistingCustomersReservations($_POST);
        break;
    case '/barber/reservations' :
        $reservationController->loadReservationsListView();
        break;
    default :
        include ('public/404.html');
        break;
}