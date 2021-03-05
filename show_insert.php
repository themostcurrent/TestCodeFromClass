<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./show/show.php');

$show = new show();
$show->setShowName($row["showName"]);
$show->setRating($row["showRating"]);
$show->setAnalysis($row["showAnalysis"]);
$show->createShow(); 

header("Location: dashboard.php");
?>