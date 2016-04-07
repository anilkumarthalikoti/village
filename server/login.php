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
 if($_POST["methodcall"]=="validate_user"){

$result=$database->select("app_login",array("id"),array("login_id"=>strtoupper($_POST["userid"])));
$id="";
foreach($result as $row){
$id=$row["id"];
}
 
echo $id;
}
if($_POST["methodcall"]=="save_action_mapping"){
$hoblis=$_POST["hobli"];
$id=$_POST["userregid"];
$database->delete("actionmapping",array("regid"=>$id));
 foreach($hoblis as $hobli){
  $database->insert("actionmapping",array("regid"=>$id,"hobliid"=>$hobli));
 }
}
?>
