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


    public function fromArray(array $array) : Reservation
    {
        $this->setId($array['id']);
        $this->setUserId($array['user_id']);
        $this->setDateTime($array['datetime']);
        $this->setStatus($array['status']);
        $this->setCode($array['code']);

        return $this;
    }

    public function toArray() : array
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