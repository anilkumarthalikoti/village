<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
$params=array();
$params["regid"]=$_POST["regid"];
$params["schemeid"]=$_POST["scheme_select"];
$params["subschemeid"]=$_POST["subscheme_select"];
$params["component"]=$_POST["component_select"];
$params["item1"]=$_POST["component_1"];
$params["item2"]=$_POST["component_2"];
$params["item3"]=$_POST["component_3"];
$params["item4"]=$_POST["component_4"];
$params["regby"]=$_SESSION["logged_in"];
$params["regdate"]=date("Y-m-d h:i:sa");
$conn->insert("schemefilling",$params);

}

?>