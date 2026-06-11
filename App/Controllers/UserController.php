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
        include __DIR__ .  "/../../view/home.php";
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $username = trim($_POST["username"] ?? ""); // ?? skontroluje ci Post existuje a nie je null a ak neexistuje prida null a nevypise error
            $password = trim($_POST["password"] ?? "");
            
            $user = $this->userRepo->findByUsername($username);

            if (!$user || !$user->passwordVerify($password)) {
                $_SESSION["flash_error"] = "Nespravne meno alebo heslo";

                header("Location:/projekt1/public/login");
                exit();
            }

            $_SESSION["user_id"] = $user->getId();
            $_SESSION["username"] = $user->getUsername();
            $_SESSION["role"] = $user->getRole();

            if ($user->getRole() === "admin") {
                header("Location:/projekt1/public/admin");
            }
            else{
                header("Location:/projekt1/public/dashboard");
            }
            exit();

        }
        include __DIR__ .  "/../../view/login.php";

    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $username = trim($_POST["username"] ?? ""); 
            $password = trim($_POST["password"] ?? "");

            if($this->userRepo->findByUsername($username)){
                $_SESSION["flash_error"] = "Uzivatelske meno uz existuje";
                header("Location:/projekt1/public/register");
                exit();
            }

            if(mb_strlen($username) < 3 || mb_strlen($password)){
                $_SESSION["flash_error"] = "Uzivatelske meno musi mat aspon 3 znaky a heslo 6 znakov";
                header("Location:/projekt1/public/register");
                exit();
            }
            $newUser = new User($username,$password);

            if($this->userRepo->save($newUser)){
                $_SESSION["flash_succes"] = "Registracia prebehla uspesne";
                header("Location:/projekt1/public/register");
                exit();

            }
        }



        include __DIR__ .  "/../../view/register.php";

    }
    public function logout():void{
        session_destroy();
        header("Location:projekt1/public/");
        exit();
    }


}
?>