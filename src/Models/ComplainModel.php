<?php
/**
 * Created by PhpStorm.
 * User: vilius
 * Date: 19.2.18
 * Time: 12.08
 */

namespace App\Models;


class ComplainModel
{
    private $id;
    private $complaint;
    private $solution;
    private $date;

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
    public function getComplaint()
    {
        return $this->complaint;
    }

    /**
     * @param mixed $complain
     */
    public function setComplaint($complaint)
    {
        $this->complaint = $complaint;
    }

    /**
     * @return mixed
     */
    public function getSolution()
    {
        return $this->solution;
    }

    /**
     * @param mixed $solution
     */
    public function setSolution($solution)
    {
        $this->solution = $solution;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function fromArray(array $array) : ComplainModel
    {
        $this->setId($array['id']);
        $this->setComplaint($array['complaint']);
        $this->setSolution($array['solution']);
        $this->setDate($array['date']);

        return $this;
    }

    public function toArray() : array
    {
        return [
            'id' => $this->getId(),
            'complaint' => $this->getComplaint(),
            'solution' => $this->getSolution(),
            'date' => $this->getDate(),
        ];
    }


}