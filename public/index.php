<?php

require_once __DIR__."/../vendor/autoload.php";

session_start();

use App\Core\Database;
use App\Repositories\UserRepository;
use App\Models\User;
use App\Core\Router;
use App\Controllers\UserController;


$db = new Database();

$pdo = $db->spojenie();
$userRepo =new UserRepository($pdo);
$userController = new UserController($userRepo);

$router = new Router();
$router->add("/",$userController,"index");
$router->add("/login",$userController,"login");
$router->add("/register",$userController,"register");
$router->add("/dashboard",$userController,"dashboard");



$router->resolve();


?>