<?php
session_start();
require "app_connector.php";

if($_POST["methodcall"]=="validate_login"){

$datas=$database->query("select * from app_login")->fetchAll();
$result="";
 $data=$datas[0];
if($data["login_password"]==$_POST["password"]){
$result= "valid_login";
$_SESSION["logged_in"]=$data;
}
echo $result;
}
 
?>
