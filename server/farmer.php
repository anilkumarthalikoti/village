<?php 
session_start();
require "app_connector.php";
$conn=$database;
$params=array();
$data="";
 if(!empty($_POST)){
 foreach($_POST as $key=>$value){
 if(!($key=="text" || $key=="select") )
 $params[$key]=$value;
  
 }
 
 
 $conn->insert("farmerdetails",$params);
 }
?>