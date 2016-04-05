<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
$params=array();
 
foreach ($_POST as $key => $value){
 
   
       $params[$key]=$value;
    
}
//$conn->debug();
$conn->insert("farmerdetails",$params);
}
?>