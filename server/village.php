<?php 
session_start();
require "app_connector.php";
$conn=$database;
 
 if(!empty($_POST)){
 
 $state_name=postVal("state_name");
 $state_name_k=$_POST["state_name_ka"];
$item_type=$_POST["item_type"];
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
 $constituency_selected=postVal("constituency_selected");
  $panchaitay_selected=postVal("panchaitay_selected");
 $village_selected=postVal("village_selected");
 

 
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
 case "constituency":
$conn->insert("constituency",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>$hobli_selected,"constituencyid"=>$id));
 break;
  case "panchaitay":
$conn->insert("panchayati",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>$hobli_selected,"constituencyid"=>$constituency_selected,"panchayatiid"=>$id));
 break;
 
  case "village":
$conn->insert("panchayati",array("stateid"=>$state_selected,"districtid"=>$district_selected,"talukaid"=>$taluka_selected,"hobliid"=>$hobli_selected,"constituencyid"=>$constituency_selected,"panchayatiid"=>$panchaitay_selected,"village_id"=>$id));
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
  $constituency_selected=getVal("constituency_selected");
 $regid=$_SESSION["logged_in"];
 $restrict=getVal("restrict");
 
 $aval="(select * from hobli where hobliid in(select hobliid from actionmapping where regid=".$regid["id"].")) res ";
$query="";
 switch($responseFor){
 case "district":
 
 $query="select s.* from district d,states s where s.item_type=1 and d.districtid= s.id and  d.stateid=".$state_selected."";
 if($restrict=="1"){
 $query= "select s.* from district d,states s,".$aval." where res.districtid=s.id and s.item_type=1 and d.districtid= s.id and  d.stateid=".$state_selected ;
 } 
 break;
 case "taluka":
 
 $query="select s.* from taluka d,states s where d.talukaid= s.id and  d.districtid=".$district_selected."";
   if($restrict=="1"){
 $query="select s.* from taluka d,states s,".$aval." where res.talukaid=s.id and d.talukaid= s.id and  d.districtid=".$district_selected."";
 } 
 break;
 
 case "hobli":
  
 $query="select s.* from hobli d,states s where d.hobliid= s.id and  d.talukaid=".$taluka_selected."";
  if($restrict=="1"){
  $query="select s.* from hobli d,states s,".$aval." where res.hobliid=s.id and d.hobliid= s.id and  d.talukaid=".$taluka_selected."";
 }
 break;
 case "constituency":
  $query="select s.* from constituency d,states s where d.constituencyid= s.id and  d.hobliid=".$hobli_selected."";
 break;
 
  case "panchaitay":
 
 $query="select s.* from panchayati d,states s where d.panchayatiid= s.id and  d.constituencyid=".$constituency_selected."";
 break;
 case "village":
 $query="select s.* from village d,states s where d.villageid= s.id and  d.panchaitay=".$panchaitay_selected."";
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