<?php

namespace App\Repositories;


use PDO;
use PDOException;
use App\Models\User;

class UserRepository
{
    private PDO $db;

    public function __construct(PDO $pdo){

    $this->db = $pdo;
    }
};

?>