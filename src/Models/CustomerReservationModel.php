<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.18
 * Time: 01.55
 */

namespace App\Models;


class CustomerReservationModel
{
    private $id;
    private $userId;
    private $dateTime;
    private $status;
    private $code;

    private $customerId;
    private $firstName;
    private $lastName;
    private $timesVisited;


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }


    public function getDateTime()
    {
        return $this->dateTime;
    }

    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }


    public function getStatus()
    {
        return $this->status;
    }


    public function setStatus($status)
    {
        $this->status = $status;
    }


    public function getCode()
    {
        return $this->code;
    }


    public function setCode($code)
    {
        $this->code = $code;
    }


    public function getCustomerId()
    {
        return $this->customerId;
    }


    public function setCustomerId($id)
    {
        $this->customerId = $id;
    }


    public function getFirstName()
    {
        return $this->firstName;
    }


    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }


    public function getLastName()
    {
        return $this->lastName;
    }


    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }


    public function getTimesVisited()
    {
        return $this->timesVisited;
    }


    public function setTimesVisited($timesVisited)
    {
        $this->timesVisited = $timesVisited;
    }

    public function fromArray(array $array) : CustomerReservationModel
    {
        $this->setId($array['id']);
        $this->setUserId($array['user_id']);
        $this->setDateTime($array['datetime']);
        $this->setStatus($array['status']);
        $this->setCode($array['code']);

        $this->setCustomerId($array['customer_id']);
        $this->setFirstName($array['first_name']);
        $this->setLastName($array['last_name']);
        $this->setTimesVisited($array['times_visited']);

        return $this;
    }

    public function fromMultipleArrays(array $array) : array
    {
        $customersReservations = [];
        foreach ($array as $row) {
            $customerReservation = new CustomerReservationModel();
            $customersReservations[] = $customerReservation->fromArray($row);
        }

        return $customersReservations;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'datetime' => $this->getDateTime(),
            'status' => $this->getStatus(),
            'code' => $this->getCode(),
            'customer_id' => $this->getId(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'times_visited' => $this->getTimesVisited(),
        ];
    }
}
