<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.17
 * Time: 21.05
 */

namespace App\Models;


class Reservation
{

    private $id;
    private $userId;
    private $dateTime;
    private $status;
    private $code;


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


    public function fromArray(array $array): Reservation
    {
        $this->setId($array['id']);
        $this->setUserId($array['user_id']);
        $this->setDateTime($array['datetime']);
        $this->setStatus($array['status']);
        $this->setCode($array['code']);

        return $this;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'user_id' => $this->getUserId(),
            'datetime' => $this->getDateTime(),
            'status' => $this->getStatus(),
            'code' => $this->getCode(),
        ];
    }


}
