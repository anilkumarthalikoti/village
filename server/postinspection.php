<?php

session_start();
require "app_connector.php";
$conn=$database;
$user=$_SESSION["logged_in"];
if(!empty($_POST)){
$params=array();
$material_list=array();
$skip=array("preallocated","material","dAmount","dQty","gAmount","gQty","skip_qty");
foreach ($_POST as $key => $value){
if(!(in_array($key, $skip))){
if($key!="material_save"){
if($key=="inspection_date"){
$value=DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}
if(strlen($value)!=0){
echo $key.":".$value;
$params[$key]=$value;
}
}else{
$material_list=explode("#",$value);
}
}



}
 
$conn->insert("postinspection_mstr",$params);
$conn->update("schemefilling",array("status"=>12),array("id"=>$_POST["filling_id"]));
$dtlkey=array("filling_id","item_id","ggrcqty");
for($i=0;$i<sizeof($material_list)-1;){
$dtl=array();
$dtl[$dtlkey[0]]=$_POST["filling_id"];
 
for($j=1;$j<3;$j++){
 
$dtl[$dtlkey[$j]]=$material_list[$i];
 
$i++;
}
 
$conn->insert("postinspection_dtl",$dtl);
}





}




 ?>