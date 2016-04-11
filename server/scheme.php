<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
 $item_name=trim(strtoupper($_POST["item_name"]));
 $parent_id=$_POST["parent_id"];
 $conn->insert("schemes",array("name"=>$item_name,"parent_id"=>$parent_id));
 
 }
if(!empty($_GET['getschemes'])){

$result=$conn->select("schemes" ,array("id","name"),array("parent_id"=>$_GET["parent_id"]));
$jsontext= "[";
foreach($result as $row){
$jsontext .= '{"'.$row["id"].'":"'.$row["name"].'"},';
}

$jsontext = substr_replace($jsontext, '', -1);
 $jsontext .= "]";
print $jsontext;

} 
if(!empty($_GET['searchregistration'])){
 
$searchfor=array();
 
 $searchfor[$_GET['searchin']]=$_GET['searchregistration'];
 $query="";
 $query.="select a.id regid, concat(a.firstname,' ',a.lastname,'/',a.firstname_k,' ',a.lastname_k) firstname_text,";
$query.="concat(a.fathername,'/',a.fathername_k) fathername_text,a.houseno houseno_text ";
$query.=",(select concat(s.state_name ,'/', s.state_name_k) from states s where id= a.village) village_text";

$query.=",(select concat(s.state_name ,'/', s.state_name_k) from states s where id= a.landvillage) village_text_l";
$query.="   from farmerdetails a";
 
$query.= " where  ".$_GET['searchin']."='".$_GET['searchregistration']."' limit 1";
 
$result=$conn->query($query);
$jsontext= "[";
foreach($result as $row){

foreach( $row as $key=>$value){
$jsontext .= '{"'.$key.'":"'.$value.'"},';
}
}
$jsontext = substr_replace($jsontext, '', -1);
 $jsontext .= "]";
print $jsontext;


}

 


?>