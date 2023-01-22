<?php
require __DIR__ . '/../services/loginservice.php';

class LoginController
{
    private $loginservice;

    function __construct()
    {
        $this->loginservice = new Loginservice();
    }

    public function index()
    {
        require __DIR__ . '/../views/login/index.php';
    }
    public function login()
    {
        //sanitize the variables
        if(isset($_POST['login'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $Username = htmlspecialchars($_POST['Username']);
            $Password = htmlspecialchars($_POST['Password']);

            //Validate the login attempt
            $data = $this->loginservice->AttemptToLogin($Username);
            //if the password is correct the variables are assinged
            if (password_verify($Password, $data[0][1])) {
                $_SESSION['isloggedin'] = "True";
                $_SESSION['username'] = $Username;
                header('Location: /');
            } else { // give error
                header('location: /login?error=failed-to-login');
            }
        }
    }
    //unset and destroy the sessions
    public function loguit(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        header('Location: /');
    }
}
