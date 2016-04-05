<?php 
session_start();
require "app_connector.php";
$conn=$database;
 
 if(!empty($_POST)){
 
 $state_name=postVal("state_name");
 $state_name_k=postVal("state_name_ka");
$item_type=postVal("item_type");
$id=$conn->insert("states",array("state_name"=>$state_name,"state_name_k"=>$state_name_k,"item_type"=>$item_type));	
 $result=$conn->select("states",array("id"),array("AND"=>array("state_name"=>$state_name,"item_type"=>$item_type)));
 foreach($result as $row){
 $id=$row["id"];
 }
 $saveType=$_POST["saveType"];
 $state_selected=postVal("state_selected");
 $district_selected=postVal("district_selected");
 $taluka_selected=postVal("taluka_selected");
 $hobli_selected=postVal("hobli_selected");
 $village_selected=postVal("village_selected");
 $panchaitay_selected=postVal("panchaitay_selected");
 
 switch($saveType){
 case "district":
 
 $conn->insert("district",array("stateid"=>$state_selected,"districtid"=>$id));
 break;
 
 case "taluka":
 $conn->insert("taluka",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$id));
 break;
 case "hobli":
 $conn->insert("hobli",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>$id));
 break;
 case "village":
$conn->insert("village",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>village_selected,"villageid"=>$id));
 break;
  case "panchaitay":
$conn->insert("panchaitay",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>village_selected,"villageid"=>$village_selected,"panchaitayid"=>$id));
 break;
 
 }
 
 
 
 
 
 
 
 }else{
  
 $responseFor=$_GET["responsefor"];
 $state_selected=getVal("state_selected");
 $district_selected=getVal("district_selected");
 $taluka_selected=getVal("taluka_selected");
 $hobli_selected=getVal("hobli_selected");
 $village_selected=getVal("village_selected");
 $panchaitay_selected=getVal("panchaitay_selected");
 
$query="";
 switch($responseFor){
 case "district":
 
 $query="select s.* from district d,states s where s.item_type=1 and d.districtid= s.id and  d.stateid=".$state_selected."";
  
 break;
 case "taluka":
 
 $query="select s.* from taluka d,states s where d.talukaid= s.id and  d.districtid=".$district_selected."";
  
 break;
 
 case "hobli":
 
 $query="select s.* from hobli d,states s where d.hobliid= s.id and  d.talukaid=".$taluka_selected."";
 break;
 
 case "village":
 $query="select s.* from village d,states s where d.villageid= s.id and  d.hobliid=".$hobli_selected."";
 break;
 
 case "panchaitay":
 $query="select s.* from panchayati d,states s where d.panchayatiid= s.id and  d.villageid=".$village_selected."";
 break;
 
 }
  $jsontext="[";
  //$conn->debug();
  
 $result=$conn->query($query);
  foreach($result as $row){
$jsontext .= '{"id":"'.$row["id"].'", "state_name":"'. $row["state_name"] . '", "state_name_k":"'.$row["state_name_k"].'"},';
  } 
$jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
$jsontext .= "]";
 print $jsontext;
}
 
 function postVal($paramname){
 if(!empty($_POST[$paramname])){
 return trim(strtoupper($_POST[$paramname]));
 }
 return NULL;
 }
 
 function getVal($paramname){
 if(!empty($_GET[$paramname])){
 return trim(strtoupper($_GET[$paramname]));
 }
 return NULL;
 }
 
 
 
?>