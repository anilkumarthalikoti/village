<?php

session_start();
require "app_connector.php";
$conn=$database;
$user=$_SESSION["logged_in"];
if(!empty($_POST)){
$params=array();
$material_list=array();
$include=array("preallocated","material_save","filling_id","isdeductable","reasonfor_deduction","approveddate","approvedamount","approvedby");
foreach ($_POST as $key => $value){
if(in_array($key, $include)){
if($key!="material_save"){
 
if($key=="approveddate"){
 
 
  
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
 
$conn->insert("talukaapproval_mstr",$params);
$conn->update("schemefilling",array("status"=>15),array("id"=>$_POST["filling_id"]));
$dtlkey=array("filling_id","item_id","ggrcqty","ggrcamt","dealeramt","dealerqty");
echo sizeof($material_list);
echo "==================================";
for($i=0;$i<sizeof($material_list)-1;){
echo $i;
$dtl=array();
$dtl[$dtlkey[0]]=$_POST["filling_id"];
for($j=1;$j<6;$j++){
 
$dtl[$dtlkey[$j]]=$material_list[$i];
 
$i++;
}
 
$conn->insert("talukaapproval_dtl",$dtl);
}





}




 ?>