<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "testdbshows.mysql.database.azure.com";
$username = "Joey@testdbshows";
$password = "Metobe3!";
//$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
//$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
//$dbname = "testdb";
$dbname = "user_table";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>