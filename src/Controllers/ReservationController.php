<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ReservationModel;
use App\Models\ReservationStatusModel;
use App\Repositories\CustomerRepository;
use App\Repositories\ReservationRepository;

class ReservationController extends BaseController
{
    private $reservationRepository;
    private $customerRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
        $this->customerRepository = new CustomerRepository();
    }

    public function addReservationByCustomer(array $params)
    {
        $customer = new CustomerModel();
        $customer->fromArray($params);

        $reservation = new ReservationModel();
        $reservation->fromArray($params);

        $existing = $this->customerRepository->findByName($customer);

        if ($existing == null) {
            $existing = $this->customerRepository->create($customer);
        } else {
            $activeReservation = $this->reservationRepository->findActiveReservationByCustomerId($existing->getId());
            if ($activeReservation !== null) {
                $this->view('public/customer/reservation.php', [
                    'message' => 'You already have a reservation' // show date and code
                ]);

                return;
            }
        }

        $reservation->setUserId($existing->getId());

        $newReservation = $this->reservationRepository->create($reservation);

        $this->addSuccessReservationCookie($newReservation);

        $this->view('public/customer/reservation-success.php', [
            'reservation' => $newReservation->toArray(),
            'message' => 'You successfully registered!!!!'
        ]);
    }


    public function addReservationByBarber(array $params)
    {
        $customer = new CustomerModel();
        $customer->fromArray($params);

        $reservation = new ReservationModel();
        $reservation->fromArray($params);

        $existing = $this->customerRepository->findByName($customer);

        if ($existing == null) {
            $existing = $this->customerRepository->create($customer);
        } else {
            $activeReservation = $this->reservationRepository->findActiveReservationByCustomerId($existing->getId());
            if ($activeReservation !== null) {

                $this->loadReservationsListView("Client already has a reservation on " . $activeReservation->getDateTime());
                return;
            }
        }
        $reservation->setUserId($existing->getId());
        $newReservation = $this->reservationRepository->create($reservation);

//        $this->view('public/barber/reservation-list.php', [
//            'reservation' => $newReservation->toArray(),
//            'message' => 'ReservationController successfully added!'
//        ]);
        $this->loadReservationsListView('ReservationController successfully added!');

    }

    public function getExistingCustomersReservations(array $params)
    {
        if (isset($params['code'])) {
            $this->findActiveReservationByCode($params['code']);
        } else {
            $this->findReservationsByName($params['first_name'], $params['last_name']);
        }
    }

    public function loadCustomerReservationView()
    {
        if (isset($_COOKIE['reservation-cookie'])) {
            $this->findActiveReservationByCode($_COOKIE['reservation-cookie']);
            return;
        }

        $this->view('public/customer/reservation.php');
    }

    public function loadReservationsListView($message = null)
    {
        $reservations = $this->reservationRepository->getAllReservations();
        $this->view('public/barber/reservations-list.php', ['reservations' => $reservations, 'message' => $message]);
    }

    public function cancelReservation(array $params)
    {
        $this->reservationRepository->updateStatus($params['id'], ReservationStatusModel::RESERVATION_STATUS_CANCELED);
        $this->cancelReservationCookie();
        $this->view('public/customer/reservation.php', ['message' => 'ReservationController canceled']);
    }

    public function changeStatus(array $params)
    {
        $this->reservationRepository->updateStatus($params['id'], $params['status']);
        $this->loadReservationsListView("ReservationController status updated!");

    }

    public function getReservationsByDay(array $params)
    {
        $reservations = $this->reservationRepository->getReservationsByDate($params['date']);
        $this->view('public/barber/reservations-list.php',
            ['reservations' => $reservations, 'message' => "Reservations found for " . $params['date']]);
    }

    public function finReservationsByLoyalty()
    {

        $reservations = $this->reservationRepository->findReservationsByLoyalty();
        $this->view('public/barber/reservations-list.php',
            ['reservations' => $reservations, 'message' => "Sorted by loyalty"]);
    }

    private function cancelReservationCookie()
    {
        setcookie("reservation-cookie", "", time() - 3600);
    }

    private function addSuccessReservationCookie(ReservationModel $reservation)
    {
        setcookie("reservation-cookie", $reservation->getCode(), time() + 3600);
    }

    private function findActiveReservationByCode(string $code)
    {
        $activeReservation = $this->reservationRepository->findActiveReservationByCode($code);

        if ($activeReservation !== null) {
            $this->view('public/customer/reservation-success.php', [
                'reservation' => $activeReservation->toArray()
            ]);
            return;
        }
        $this->view('public/customer/reservation.php', ['message' => 'No reservation found']);
    }

    private function findReservationsByName($firstName, $lastName)
    {
        $reservations = $this->reservationRepository->findReservationsByName($firstName, $lastName);
        $this->view('public/barber/reservations-list.php',
            ['reservations' => $reservations, 'message' => "Reservations found for " . $firstName . " " . $lastName]);
    }
}

