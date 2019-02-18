<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.18
 * Time: 01.55
 */

namespace App\Models;


class CustomerReservation
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param mixed $dateTime
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $id
     */
    public function setCustomerId($id)
    {
        $this->customerId = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getTimesVisited()
    {
        return $this->timesVisited;
    }

    /**
     * @param mixed $timesVisited
     */
    public function setTimesVisited($timesVisited)
    {
        $this->timesVisited = $timesVisited;
    }

    public function fromArray(array $array) : CustomerReservation
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
            $customerReservation = new CustomerReservation();
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