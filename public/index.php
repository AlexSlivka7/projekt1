<?php

require_once __DIR__."/../vendor/autoload.php";

session_start();

use App\Core\Database;
use App\Repositories\UserRepository;
use App\Models\User;

$db = new Database();

$pdo = $db->spojenie();
$userRepo =new UserRepository($pdo);
/*
$user = $userRepo->findByUsername("Majo");
var_dump($user);
*/
$user = new User("Fero","Fero","admin",false);

$userRepo->save($user);

if($user = $userRepo->findByUsername("Fero")){
    $user->setUsername("Stano");
    $userRepo->update($user);
}


// //var_dump($pdo);

// $user = new User("Miro","Miro","user",false);
// //var_dump($user);

// $user->SetUsername("Alexandra");
// var_dump($user);

?>