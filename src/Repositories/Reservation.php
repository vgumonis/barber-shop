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

    public function updateStatus($id, $status)
    {
        if ($status === ReservationStatus::RESERVATION_STATUS_FINISHED) {
            $this->pdo->beginTransaction();

            try {
                $query = $this->pdo->prepare("UPDATE reservation SET status = :status  WHERE id = :id");
                $query->execute(['status' => $status, 'id' => $id]);

                $query = $this->pdo->prepare("SELECT user_id FROM reservation WHERE id = :id");
                $query->execute(['id' => $id]);
                $result = $query->fetch();

                $query = $this->pdo->prepare("UPDATE customer SET times_visited = times_visited + 1 WHERE id = :id");
                $query->execute(['id' => $result['user_id']]);

            } catch (\Throwable $e) {
                $this->pdo->rollBack();
            }
            $this->pdo->commit();

        } else {
            $query = $this->pdo->prepare("UPDATE reservation SET status = :status WHERE id = :id");
            $query->execute(['status' => $status, 'id' => $id]);
        }
    }

    public function getReservationsByDate($day)
    {

        $query = $this->pdo->prepare("Select reservation.*,
                           customer.id as customer_id,
                           customer.first_name,
                           customer.last_name,
                           customer.times_visited
                      from barber.reservation
                      inner join barber.customer on reservation.user_id = customer.id WHERE cast(datetime as Date) = :date "
        );

        switch ($day) {
            case 'today':
                $date = date("Y-m-d");
                break;
            case 'tomorrow':
                $date = date("Y-m-d", strtotime("+1 day"));
                break;
            default:
                $date = $day;
        }

        $query->execute([':date' => $date]);
        $results = $query->fetchAll();

        if (count($results) == 0) {
            return null;
        }

        $customerReservation = new CustomerReservation();
        return $customerReservation->fromMultipleArrays($results);
    }

    public function findReservationsByName($firstName, $lastName)
    {
        $query = $this->pdo->prepare("Select reservation.*,
                           customer.id as customer_id,
                           customer.first_name,
                           customer.last_name,
                           customer.times_visited
                      from barber.reservation
                      inner join barber.customer on reservation.user_id = customer.id WHERE  first_name = :firstName and last_name = :lastName"
        );

        $query->execute([':firstName' => $firstName, ':lastName' => $lastName]);
        $results = $query->fetchAll();

        if (count($results) == 0) {
            return null;
        }

        $customerReservation = new CustomerReservation();
        return $customerReservation->fromMultipleArrays($results);
    }

    public function findReservationsByLoyalty()
    {
        $query = $this->pdo->prepare("Select reservation.*,
                           customer.id as customer_id,
                           customer.first_name,
                           customer.last_name,
                           customer.times_visited
                      from barber.reservation
                      inner join barber.customer on reservation.user_id = customer.id ORDER BY times_visited DESC"
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
