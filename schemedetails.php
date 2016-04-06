<?php 
session_start();
require "app_connector.php";
$conn=$database;
$query="";
$count="";
switch($_GET['fetchtype']){
case 'ALL':
$query='select s.*,f.* from schemefilling s, farmerdetails f where s.id= f.id';
break;


}
?>
