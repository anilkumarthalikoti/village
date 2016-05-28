<?php

session_start();
require "app_connector.php";
$conn=$database;
$user=$_SESSION["logged_in"];
if(!empty($_POST)){
	$conn->update("schemefilling",array("status"=>18),array("id"=>$_POST["filling_id"]));
$params=array();
 
foreach ($_POST as $key => $value){
 
if(strlen($value)!=0){
echo $key.":".$value;
$params[$key]=$value;
 
}

 }

$params["approvedby"]=$user["id"];
$params["approveddate"]=date("Y-m-d");

$conn->insert("sanctionorder",$params);
}
 
 

 
 
 




 




 ?>