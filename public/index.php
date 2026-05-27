<?php

require_once __DIR__."/../vendor/autoload.php";

session_start();

use App\Core\Database;
use App\Repositories\UserRepository;
use App\Models\User;


$db = new Database();

$pdo = $db->spojenie();
$userRepo =new UserRepository($pdo);

//  $user = new User("Jano","Jano","user",false);
//  $userRepo->save($user);

// $user = $userRepo->findByUsername("Stano");

// if($user){

//     $user->setUsername("Peter");

//     $userRepo->update($user);

//     echo "Používateľ bol upravený";
// }
// else{
//     echo "Používateľ neexistuje";
// }

$users = $userRepo->findAll();

include __DIR__."/../view/home.php";

// var_dump($user2);

// $userRepo->delete(7);


?>