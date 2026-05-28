<?php 

namespace App\Controllers;

use App\Repositories\UserRepository;

class UserController{
    private UserRepository $userRepo;

    public function __construct($userRepo){
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        echo("index");
    }

    public function login()
    {
        include __DIR__ .  "/../../view/login.php";

    }

    public function register()
    {
        include __DIR__ .  "/../../view/register.php";

    }

    public function dasboard()
    {
        include __DIR__ .  "/../../view/dashboard.php";

    }
}
?>