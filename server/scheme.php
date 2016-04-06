<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
 $item_name=trim(strtoupper($_POST["item_name"]));
$item_type=trim($_POST["item_type"]);
$scheme_select=NULL;
$subscheme_select=NULL;
$component_select=NULL;
if(!empty($_POST["scheme_select"])){
$scheme_select=trim($_POST["scheme_select"]);
}
if(!empty($_POST["subscheme_select"])){
$subscheme_select=trim($_POST["subscheme_select"]);
} 
if(!empty($_POST["component_select"])){
$component_select=trim($_POST["component_select"]);
}
$saveType="NAN";
if(!empty($_POST["saveType"])){
$saveType=$_POST["saveType"];
}
echo $item_type;
$id=$conn->insert("items",array("item_name"=>$item_name, "item_type"=>$item_type ));
 
 if($scheme_select!=NULL){
 if($id!=0){
 //New process
 $mapid=-1;
 switch($saveType){
 case "sub_scheme":
$mapid=$conn->insert("subschemes",array("schemeid"=>$scheme_select,"subschemeid"=>$id));
 break;
 case "component";
$mapid=$conn->insert("component",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_select,"component"=>$id));

break; 

case "subcomponent";
$mapid=$conn->insert("subcomponent",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_select,"component"=>$component_select,"subcomponent"=>$id));

break; 
 }
 if($mapid==0){
 $conn->delete("items",array("item_id"=>$id));
 }
}else{
 //add only mapping
 $result1=$conn->select("items",array("item_id"), array("AND"=> array("item_name"=>$item_name,"item_type"=>$item_type)));
  $id=NULL;
 foreach(  $result1   as $row){
 $id= $row["item_id"];
 } 
 switch($saveType){
 case "sub_scheme":
  $mapid=$conn->insert("subschemes",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_id));
 break;
 case "component";
$mapid=$conn->insert("component",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_select,"component"=>$id));

break; 

case "subcomponent";
$mapid=$conn->insert("subcomponent",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_select,"component"=>$component_select,"subcomponent"=>$id));
break; 
 }
 
  
 
}
}
}

if((!empty($_GET["scheme_select"]))&& (empty($_GET["subscheme_select"]))){

$query="select b.item_id,b.item_name  from subschemes a, items b where a.subschemeid= b.item_id and a.schemeid=".$_GET["scheme_select"];
 
$result=$conn->query($query);
$jsontext= "[";
foreach($result as $row){
$jsontext .= '{"item_id":"'.$row["item_id"].'", "item_name":"'. $row["item_name"] . '"},';
}
$jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
$jsontext .= "]";
print $jsontext;
}

if((!(empty($_GET["subscheme_select"])) && (!empty($_GET["scheme_select"]) && (empty($_GET["component_select"]))))){

$query="select b.item_id,b.item_name  from component a, items b where b.item_id=a.component and a.subschemeid= ".$_GET["subscheme_select"]." and a.schemeid=".$_GET["scheme_select"];
 
$result=$conn->query($query);
$jsontext= "[";
foreach($result as $row){
$jsontext .= '{"item_id":"'.$row["item_id"].'", "item_name":"'. $row["item_name"] . '"},';
}
$jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
$jsontext .= "]";
print $jsontext;
}

if((!(empty($_GET["subscheme_select"])) && (!empty($_GET["scheme_select"])) && (!empty($_GET["component_select"])))){

$query="select b.item_id,b.item_name,b.item_type  from subcomponent a, items b where b.item_id=a.subcomponent and a.subschemeid= ".$_GET["subscheme_select"]." and a.schemeid=".$_GET["scheme_select"]." and a.component=".$_GET["component_select"] ;
 
$result=$conn->query($query);
$jsontext= "[";
foreach($result as $row){
$jsontext .= '{"item_id":"'.$row["item_id"].'", "item_name":"'. $row["item_name"] . '","item_type":"'.$row['item_type'].'"},';
}
$jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
$jsontext .= "]";
print $jsontext;
}

if(!empty($_GET['searchregistration'])){
 
$searchfor=array();
 
 $searchfor[$_GET['searchin']]=$_GET['searchregistration'];
  $query="select a.*,(select state_name||'/'||state_name_k from states where id=userstate) state from farmerdetails a where  ".$searchfor[$_GET['searchin']]."='".$_GET['searchregistration']."'";

$result=$conn->query($query);
$jsontext= "[{";
foreach($result as $row){
foreach($row as $key=>$value){
$jsontext .= '"'.$key.'":"'.$value.'", ';
}
}
$jsontext .= '"END_RESULT":"END_RESULT"}]';
 
print $jsontext;


}

 


?>