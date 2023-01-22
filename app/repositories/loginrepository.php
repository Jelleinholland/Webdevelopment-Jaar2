<?php
require __DIR__ . '/repository.php';

class LoginRepository extends Repository{
//getting one user from data base to validate the login
function AttemptToLogin($Username){
    try{
        if (!empty($Username)){
            $sqlquery = "SELECT Username,Password FROM User WHERE Username=:Username";
            $stament = $this->connection->prepare($sqlquery);
    
            $stament->bindParam(':Username', $Username);
    
            $stament->execute();
            return $stament->fetchAll();
        }
    }
    catch (PDOException $e){
        echo $e;
    }
}
//Get one user for accesing the data of the loggedin user
public function getOne($username){
    try {
        $stmt = $this->connection->prepare("SELECT * FROM User WHERE Username =:username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetchAll();

        return $user;
        

    } catch (PDOException $e)
    {
        echo $e;
    }
}

}