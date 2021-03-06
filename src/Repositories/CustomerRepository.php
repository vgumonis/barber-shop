<?php

namespace App\Repositories;

use App\Models\CustomerModel as CustomerModel;

class CustomerRepository extends BaseDBRepository
{

    public function create(CustomerModel $customer)
    {
        $query = $this->pdo->prepare(
            "Insert into customer (first_name, last_name, times_visited) values (:name, :lastName, 0)"
        );

        $query->execute([':name' => $customer->getFirstName(), ':lastName' => $customer->getLastName()]);

        $customer->setId($this->pdo->lastInsertId());

        return $customer;
    }


    public function findByName(CustomerModel $customer)
    {
        $query = $this->pdo->prepare(
            "Select * from customer where first_name = :name and last_name = :lastName"
        );
        $query->bindParam(':name', $customer->getFirstName());
        $query->bindParam(':lastName', $customer->getLastName());
        $query->execute();

        $result = $query->fetchAll();

        if (count($result) == 0) {
            return null;
        }

        $customer = new CustomerModel();

        return $customer->fromArray($result[0]);
    }
}
