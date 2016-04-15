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
$params["component1"]=$_POST["component_1"];
$params["component2"]=$_POST["component_2"];
$params["component3"]=$_POST["component_3"];
$params["component4"]=$_POST["component_4"];
$params["item1"]=$_POST["item1"];
$params["item2"]=$_POST["item2"];
$params["item3"]=$_POST["item3"];
 $params["area1"]=$_POST["area1"];
$params["area2"]=$_POST["area2"];
$params["area3"]=$_POST["area3"];
$params["regby"]=$_SESSION["logged_in"];
$params["regdate"]=date("Y-m-d h:i:sa");
$query="select finyear from financialyear where current_date between startfrom and endson";
$result=$conn->query($query); 
foreach($result as $row){
$finyear=$row["finyear"];
}
$params["finacyear"]=$finyear;
$conn->insert("schemefilling",$params);

}

?>