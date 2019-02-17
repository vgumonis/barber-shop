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
        }

        $reservation->setUserId($existing->getId());

        $newReservation = $this->reservationRepository->create($reservation);

        $this->view('public/customer/reservation-success.php', [
            'customer' => $customer->toArray(),
            'reservation' => $newReservation->toArray()
        ]);
    }
}