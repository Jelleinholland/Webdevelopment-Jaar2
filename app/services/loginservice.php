<?php
require __DIR__ . '/../repositories/loginrepository.php';

class Loginservice {

    public function AttemptToLogin($Username) {
        $repository = new Loginrepository();
        return $repository->AttemptToLogin($Username);
    }
    public function getOne($Username){
        $repository = new Loginrepository();
        return $repository->getOne($Username);
    }
}