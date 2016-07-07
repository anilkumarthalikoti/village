<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
$params=array();
if(isset($_POST['id'])){
 if($_POST['id']=='-1'){
foreach ($_POST as $key => $value){
 
   if($key=="dob"){
   $value=date("Y-m-d", strtotime($value) );
   }
       $params[$key]=$value;
    
}
 
$conn->insert("farmerdetails",$params);
 echo "Farmer details saved";
 
   }else{
       
       foreach ($_POST as $key => $value){
 
   if($key=="dob"){
   $value=date("Y-m-d", strtotime($value) );
   }
       $params[$key]=$value;
    
}
 
$conn->update("farmerdetails",$params,array('id'=>$_POST['id']));
 echo "Farmer details updated";
 
   }
}

   }
?>