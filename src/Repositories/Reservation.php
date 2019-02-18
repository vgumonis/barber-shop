<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 21.37
 */

namespace App\Repositories;


use App\Models\CustomerReservation;
use App\Models\Reservation as ReservationModel;
use App\Models\ReservationStatus;

class Reservation extends BaseDBRepository
{

    public function create(ReservationModel $reservation)
    {
        $query = $this->pdo->prepare(
            "Insert into reservation (user_id, datetime, status, code) values (:user_id, :dateTime, :status, :code)"
        );

        $reservation->setCode(rand(1000, 9999));

        $query->execute([
            ':user_id' => $reservation->getUserId(),
            ':dateTime' => $reservation->getDateTime(),
            ':status' => ReservationStatus::RESERVATION_STATUS_ACTIVE,
            ':code' => $reservation->getCode()
        ]);

        $reservation->setId($this->pdo->lastInsertId());

        return $reservation;
    }

    public function findActiveReservationByCustomerId($id)
    {
        $query = $this->pdo->prepare(
            "Select * from barber.reservation where user_id = :userId and status = :status"
        );

        $query->execute(['userId' => $id, ':status' => ReservationStatus::RESERVATION_STATUS_ACTIVE]);

        $result = $query->fetchAll();

        if (count($result) == 0) {
            return null;
        }

        $reservation = new ReservationModel();

        return $reservation->fromArray($result[0]);

    }

    public function findActiveReservationByCode($code)
    {
        $query = $this->pdo->prepare(
            "Select * from barber.reservation where code = :code and status = :status"
        );

        $query->execute(['code' => $code, ':status' => ReservationStatus::RESERVATION_STATUS_ACTIVE]);

        $result = $query->fetchAll();

        if (count($result) == 0) {
            return null;
        }

        $reservation = new ReservationModel();

        return $reservation->fromArray($result[0]);
    }

    public function getAllReservations()
    {
        $query = $this->pdo->prepare(
            "Select reservation.*,
                           customer.id as customer_id,
                           customer.first_name,
                           customer.last_name,
                           customer.times_visited
                      from barber.reservation
                      inner join barber.customer on reservation.user_id = customer.id"
        );

        $query->execute();
        $results = $query->fetchAll();

        if (count($results) == 0) {
            return null;
        }

        $customerReservation = new CustomerReservation();

        return $customerReservation->fromMultipleArrays($results);

    }
}