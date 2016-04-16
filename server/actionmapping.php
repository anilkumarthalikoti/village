<?php 
session_start();
require "app_connector.php";
$conn=$database;
$user=$_SESSION["logged_in"];
 
?>
