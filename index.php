<?php

require 'vendor/autoload.php';

$reservationController = new \App\Controllers\Reservation();
$complainController = new \App\Controllers\ComplainController();

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

    case '/customer/reservation/cancel' :
        $reservationController->cancelReservation($_POST);
        break;
    case '/barber/reservations' :
        $reservationController->loadReservationsListView();
        break;
    case '/barber/complain-form?':
        $complainController->getForm();
        break;
    case '/barber/complain/create' :
        $complainController->createComplain($_POST);
        break;
    default :
        include ('public/404.html');
        break;
}