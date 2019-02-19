<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 20.55
 */

namespace App\Models;


class CustomerModel
{
    private $id;
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

    public function fromArray(array $array) : CustomerModel
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
