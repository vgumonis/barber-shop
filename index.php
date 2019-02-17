<?php

require 'vendor/autoload.php';

$reservationController = new \App\Controllers\Reservation();

switch ($_SERVER['REQUEST_URI']) {
    case '/customer/reservation' :
        include ('public/customer/reservation.html');
        break;
    case '/customer/reservation/create' :
        $reservationController->addReservation($_POST);
        break;
    default :
        include ('public/404.html');
        break;
}