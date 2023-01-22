<?php
session_start();
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Method: *");
require __DIR__ . '/../patternrouter.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

$router = new PatternRouter();
$router->route($uri);