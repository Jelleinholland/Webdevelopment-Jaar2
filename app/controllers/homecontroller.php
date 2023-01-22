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
        $user = $this->loginservice->getOne($_SESSION['username']);

        foreach($user as $users){
          echo  $user->id;
        }
        $_SESSION['idUser'] = array_column($user, 'User_ID');
        //var_dump($_SESSION['idUser']);
        //var_dump($user[0]);
        //echo $user->Username;
    }
}
