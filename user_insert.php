<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./user/user.php');

$user = new user();
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["first_name"]);
$user->setLastName($_POST["last_name"]);
$user->setPassword($_POST["password"]);
$user->createUser(); 

header("Location: login.html");
?>