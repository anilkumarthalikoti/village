<?php

session_start();
require "app_connector.php";
$conn=$database;
$user=$_SESSION["logged_in"];
if(!empty($_POST)){
$params=array();
$material_list=array();
$skip=array("preallocated","material","dAmount","dQty","gAmount","gQty");
foreach ($_POST as $key => $value){
if(!(in_array($key, $skip))){
if($key!="material_save"){
if($key=="inspection_date"){
$value=date("Y-m-d",strtotime($value));
}
if(strlen($value)!=0){

$params[$key]=$value;
}
}else{
$material_list=explode(",",$value);
}
}



}

$conn->insert("postinspection_mstr",$params);
$conn->update("schemefilling",array("status"=>12),array("id"=>$_POST["filling_id"]));
$dtlkey=array("filling_id","item_id","dealeramt","dealerqty","ggrcamt","ggrcqty");
for($i=0;$i<sizeof($material_list);$i=$i+5){
$dtl=array();
$dtl[$dtlkey[0]]=$_POST["filling_id"];
$k=1;
for($j=$i;$j<$i+5;$j++){
echo $dtlkey[$k].":".$material_list[$j]."|";
$dtl[$dtlkey[$k]]=$material_list[$j];
$k++;
}
 
$conn->insert("postinspection_dtl",$dtl);
}





}




 ?>