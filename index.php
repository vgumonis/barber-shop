<?php

require 'vendor/autoload.php';

$reservationController = new \App\Controllers\ReservationController();
$complainController = new \App\Controllers\ComplainController();

//print_r(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

switch (parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) {
    case '/barber-shop/customer/reservation' :
        $reservationController->loadCustomerReservationView();
        break;
    case '/customer/reservation/create' :
        $reservationController->addReservationByCustomer($_POST);
        break;
    case '/customer/reservation/existing' :
        $reservationController->getExistingCustomersReservations($_POST);
        break;
    case '/customer/reservation/cancel' :
        $reservationController->cancelReservation($_POST);
        break;
    case '/barber/reservation' :
        $reservationController->loadReservationsListView();
        break;
    case '/barber/reservation/change-status' :
        $reservationController->changeStatus($_POST);
        break;
    case   '/barber/reservation/get-by-date':
        $reservationController->getReservationsByDay($_GET);
        break;
    case '/barber/reservation/create' :
        $reservationController->addReservationByBarber($_POST);
        break;
    case  '/barber/reservation/search-by-name' :
        $reservationController->getExistingCustomersReservations($_POST);
        break;
    case '/barber/reservation/get-by-loyalty':
        $reservationController->finReservationsByLoyalty();
        break;
    case '/barber/complain-form':
        $complainController->getForm();
        break;
    case '/barber/complain/create' :
        $complainController->createComplain($_POST);
        break;
    default :
        include('public/404.html');
        break;
}