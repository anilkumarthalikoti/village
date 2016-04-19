<?php
session_start();
require "app_connector.php";
$conn = $database;
if(!empty($_POST["save"])){


if($_POST["save"]=="installation"){
$conn->insert("spacing_installdetails",array("spacingid"=>$_POST["spacing"],"spacing_area"=>$_POST["haval"],"amount"=>$_POST["amount"]));
}
if($_POST["save"]=="subcd"){
$conn->insert("spacing_subcd",array("spacingid"=>$_POST["spacing"],"spacing_area"=>$_POST["haval"],"amount"=>$_POST["amount"],"percentage"=>$_POST["percentage"]));
}

}

?>
