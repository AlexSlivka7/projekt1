<?php

require_once __DIR__."/../vendor/autoload.php";

session_start();

use App\Core\Database;
use App\Repositories\UserRepository;

$db = new Database();

$pdo = $db->spojenie();

var_dump($pdo);

$userRepo = new UserRepository($pdo);
?>