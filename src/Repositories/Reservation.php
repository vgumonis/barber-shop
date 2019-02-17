<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 21.37
 */

namespace App\Repositories;


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
}