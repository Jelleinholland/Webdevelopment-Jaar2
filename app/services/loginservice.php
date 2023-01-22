<?php
require __DIR__ . '/../repositories/loginrepository.php';

class Loginservice {
    //get user from database for validation
    public function AttemptToLogin($Username) {
        $repository = new Loginrepository();
        return $repository->AttemptToLogin($Username);
    }
    //get one user from the database
    public function getOne($Username){
        $repository = new Loginrepository();
        return $repository->getOne($Username);
    }
}