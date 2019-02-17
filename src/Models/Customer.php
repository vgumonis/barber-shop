<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 20.55
 */

namespace App\Models;


class Customer
{

    private $id;
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
    public function setId($id): void
    {
        $this->id = $id;
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
    public function setFirstName($firstName): void
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
    public function setLastName($lastName): void
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
    public function setTimesVisited($timesVisited): void
    {
        $this->timesVisited = $timesVisited;
    }

    public function fromArray(array $array) : Customer
    {
        $this->setId($array['id']);
        $this->setFirstName($array['first_name']);
        $this->setLastName($array['last_name']);
        $this->setTimesVisited($array['times_visited']);

        return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'first_name' => $this->getFirstName(),
            'last_name' => $this->getLastName(),
            'times_visited' => $this->getTimesVisited(),
        ];
    }
}