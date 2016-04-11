<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
$params=array();
 
foreach ($_POST as $key => $value){
 
   if($key=="dob"){
   $value=date("Y-m-d", strtotime($value) );
   }
       $params[$key]=$value;
    
}
 
$conn->insert("farmerdetails",$params);

}
?>