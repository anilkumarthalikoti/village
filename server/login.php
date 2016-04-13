<?php
session_start();
require "app_connector.php";

if($_POST["methodcall"]=="validate_login"){

$datas=$database->query("select * from app_login where login_id='".$_POST["username"]."' limit 1")->fetchAll();
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
 }}
 if($_POST["methodcall"]=="save_role_mapping"){
$roleid=$_POST["roleid"];
$id=$_POST["userregid"];
$result=$database->select("app_login",array("login_id"),array("id"=>$id));
foreach($result as $row){
$id=$row["login_id"];
}
$database->delete("user_roles",array("regid"=>$id));
 foreach($roleid as $role){
 $active="Y";
  $database->insert("user_roles",array("login_id"=>$id,"role_id"=>$role,"is_active"=>$active));
 }
 }
?>
