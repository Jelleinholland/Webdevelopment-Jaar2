<?php
require __DIR__ . '/../services/loginservice.php';
class HomeController
{
    private $loginservice;

    function __construct()
    {
        $this->loginservice = new Loginservice();
    }

    public function index()
    {
        require __DIR__ . '/../views/home/index.php';
        //when the user is logged in the id of the user is stored in a session variable
        $user = $this->loginservice->getOne($_SESSION['username']);
        $_SESSION['idUser'] = array_column($user, 'User_ID');
    }
}
