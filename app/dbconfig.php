<?php
if($_SERVER['HTTP_HOST'] != "localhost"){
    $type = "mysql";
    $servername = "mysql";
    $username = "id20144095_monjet";
    $password = "cmA(y@U_^qW9nA)-";
    $database = "id20144095_webdevdatabase";
}
else{
    $type = "mysql";
    $servername = "mysql";
    $username = "root";
    $password = "secret123";
    $database = "developmentdb";
}

?>