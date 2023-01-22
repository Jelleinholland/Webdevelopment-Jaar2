<?php
error_reporting(0);
session_start();
// function checkLoggedin(){
//   if (isset($_SESSION['login'])) {
//     return true;
//   }else {
//     return false;
//   }
// }
// session_start();
//    unset($_SESSION["username"]);
//    unset($_SESSION["password"]);
   
//    echo 'You have cleaned session';
//    header('Refresh: 2; URL = login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php-Website Jelle Koomen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="/../CSS/Stylsheet.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-primary mb-4">
    <div class="container">
      <a class="navbar-brand" href="/">PHP Website</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/article">Articles</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/article/addingarticle">Add-Articles</a>
          </li>
         
          <?php
              if(isset($_SESSION['username']))
              {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="/adminarticle">Admin-Articles</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="/order">Orders</a>
              </li>
              <li class="nav-item">
              <a class="nav-link"></a>
              </li> 
              <li class="nav-item">
              <a class="nav-link"></a>
              </li> 
              <li id="login" class="nav-item">
                <p class="nav-link">Logged in as <?php echo $_SESSION['username']?></p>
              </li>
              <li class="nav-item">
              <a class="nav-link"></a>
              </li> 
              <li class="nav-item">
              <a class="nav-link"></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login/loguit">Uitloggen</a>
              </li>   
          <?php
            }
            else{
              ?>
                <li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
                </li>
          <?php
            }
          ?>
        </ul>     
      </div>
    </div>
</nav>