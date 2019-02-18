<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 20.18
 */

namespace App\Controllers;

use App\Models\Customer;
use App\Models\Reservation as ReservationModel;
use App\Models\ReservationStatus;
use App\Repositories\Customer as CustomerRepository;
use App\Repositories\Reservation as ReservationRepository;

class Reservation extends BaseController
{
    private $reservationRepository;
    private $customerRepository;

    public function __construct()
    {
        $this->reservationRepository = new ReservationRepository();
        $this->customerRepository = new CustomerRepository();
    }

    public function addReservation(array $params)
    {
        $customer = new Customer();
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

    public function getExistingCustomersReservations(array $params)
    {
        $this->findActiveReservationByCode($params['code']);
    }

    public function loadCustomerReservationView()
    {
        if(isset($_COOKIE['reservation-cookie'])) {
            $this->findActiveReservationByCode($_COOKIE['reservation-cookie']);
            return;
        }

        $this->view('public/customer/reservation.php');
    }

    public function loadReservationsListView()
    {
        $reservations = $this->reservationRepository->getAllReservations();
        $this->view('public/barber/reservations-list.php', ['reservations' => $reservations]);
    }

    public function cancelReservation(array $params)
    {
        $this->reservationRepository->updateStatus($params['id'], ReservationStatus::RESERVATION_STATUS_CANCELED);
        $this->cancelReservationCookie();
        $this->view('public/customer/reservation.php', ['message' => 'Reservation canceled']);
    }

    private function cancelReservationCookie()
    {
        setcookie ("reservation-cookie", "", time()-3600);
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



}