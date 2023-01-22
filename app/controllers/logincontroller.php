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
        $wachtwoord = "secret123";
        
        //echo password_hash($wachtwoord, PASSWORD_DEFAULT);
    }

    public function login()
    {
        if(isset($_POST['login'])){
            $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

            $Username = htmlspecialchars($_POST['Username']);
            $Password = htmlspecialchars($_POST['Password']);
            //$amountrows = $this->loginservice->AttemptToLogin($Username, $Password);

            $data = $this->loginservice->AttemptToLogin($Username);
            
            if (password_verify($Password, $data[0][1])) {
                $_SESSION['isloggedin'] = "True";
                $_SESSION['username'] = $Username;
                //$this->setPermission($this->authService->getRole($userName));
                header('Location: /');
            } else { // give error
                header('location: /login?error=failed-to-login');
            }
        
            // if($amountrows > 0){
            //         header('Location: /');
            //         $_SESSION['username'] = $Username;
            //         $_SESSION['isloggedin'] = "True";
            // }
            // else { 
            //     header('location: /login?error=failed-to-login');
            // }
        }
    }
    public function loguit(){
        session_unset();
        session_destroy();
        $_SESSION = array();
        header('Location: /');
    }
}
