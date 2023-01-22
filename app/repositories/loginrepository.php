<?php
require __DIR__ . '/repository.php';

class LoginRepository extends Repository{

//echo "<h1>Loginpage!</h1>";
function AttemptToLogin($Username){
    try{
        if (!empty($Username)){
            $sqlquery = "SELECT Username,Password FROM User WHERE Username=:Username";
            $stament = $this->connection->prepare($sqlquery);
    
            $stament->bindParam(':Username', $Username);
            //$stament->bindParam(':Password', $Password);
    
            $stament->execute();

            //$rowCount = $stament->fetchColumn();
            
            
            return $stament->fetchAll();
        
            //return $rowCount;
    
            //var_dump($Username);
        }
    }
    catch (PDOException $e){
        echo $e;
    }
}
public function getOne($username){
    try {
        $stmt = $this->connection->prepare("SELECT * FROM User WHERE Username =:username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        //$stmt->setFetchMode(PDO::FETCH_CLASS, 'user');
        $user = $stmt->fetchAll();

        return $user;
        

    } catch (PDOException $e)
    {
        echo $e;
    }
}

}