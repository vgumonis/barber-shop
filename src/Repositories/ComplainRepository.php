<?php

namespace App\Repositories;

use App\Models\ComplainModel;

class ComplainRepository extends BaseDBRepository
{
    public function create(ComplainModel $complain)
    {
        $query = $this->pdo->prepare("Insert into barber.complain (complaint, solution, date) values (:complaint, :solution , NOW())");
        $query->execute([
            ':complaint' => $complain->getComplaint(),
            ':solution' => $complain->getSolution(),
        ]);
    }
}

