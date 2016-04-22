<?php
session_start();
require "app_connector.php";
$conn = $database;
$user = $_SESSION["logged_in"];

if (!empty($_POST["application"])) {
    $schemefillingid = $_POST["schemefillingid"];
    foreach ($schemefillingid as $fileid) {
      
        $conn->update("schemefilling", array("status" => $_POST["statusto"]), array("id" =>
                $fileid));
    }

}

if (!empty($_POST["pre-inspection"])) {
 $params=array();
 
foreach ($_POST as $key => $value){
if($key!="pre-inspection" && $key!="organization"){
$params[$key]=$value;
}
 if($key=="inspectiondate"){
   $value=date("Y-m-d", strtotime($value) );
   }
}
 
      
        $conn->insert("preinspection",$params ); 
    

}

    if ((!empty($_POST["get"])&& $_POST["get"] == "schemes")) {

       $statusQuery="select count(*) app, 'A' status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=".$user["id"]." and sf.schemeid=".$_POST["schemeid"]."  union select count(*), sf.status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=".$user["id"]." and sf.schemeid=".$_POST["schemeid"]." group by sf.status ";
 
 $statusQuery="select count(*) app,'A'  status from schemefilling where schemeid=".$_POST["schemeid"];// All files
 $statusQuery.=" union select count(*),'1' from schemefilling where schemeid=".$_POST["schemeid"]." and status=1";// pending at ta
  $statusQuery.=" union select count(*),'-1' from schemefilling where schemeid=".$_POST["schemeid"]." and status=-1";// rejected at ta
  $statusQuery.=" union select count(*),'2' from schemefilling where schemeid=".$_POST["schemeid"]." and status=2";// yet to forward/covering letter
$statusQuery.=" union select count(*),'4' from schemefilling where schemeid=".$_POST["schemeid"]." and status=4";// Forward to rsk
$statusQuery.=" union select count(*),'5' from schemefilling where schemeid=".$_POST["schemeid"]." and status>=4";// total forward application
$statusQuery.=" union select count(*),'5P' from schemefilling where schemeid=".$_POST["schemeid"]." and status=4";
$statusQuery.=" union select count(*),'5R' from schemefilling where schemeid=".$_POST["schemeid"]." and status=-4";
       
	    $result = $conn->query($statusQuery);
        $jsontext = "[";
        foreach ($result as $row) {
            $jsontext .= '{"' . $row["status"] . '":"' . $row["app"] . '"},';
        }
        $jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
        $jsontext .= "]";
        print $jsontext;
    }
	
	
	
	
    if ((!empty($_POST["get"])&& $_POST["get"] == "subschemes")) {
        $statusQuery = "select count(*) app, 'A' status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=" .
            $user["id"] . " and sf.schemeid=" . $_POST["schemeid"] . " and sf.subschemeid=" .
            $_POST["subschemeid"] .
            " group by sf.status union select count(*), sf.status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=" .
            $user["id"] . " and sf.schemeid=" . $_POST["schemeid"] . " and sf.subschemeid=" .
            $_POST["subschemeid"] . "  group by sf.status ";
        $result = $conn->query($statusQuery);
        $jsontext = "[";
        foreach ($result as $row) {
            $jsontext .= '{' . $row["status"] . ':"' . $row["app"] . '"},';
        }
        $jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
        $jsontext .= "]";
        print $jsontext;
    }



?>
