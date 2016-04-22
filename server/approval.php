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

     $village="select id from landdetails where villageid in (select villageid from village v,actionmapping am where  v.hobliid =am.hobliid and am.regid=".$user["id"].")";
 
 $statusQuery="select count(*) app,'A'  status from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// All files
 $statusQuery.=" union select count(*),'1' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=1 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// pending at ta
  $statusQuery.=" union select count(*),'-1' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-1 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// rejected at ta
  $statusQuery.=" union select count(*),'2' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=2 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// yet to forward/covering letter
$statusQuery.=" union select count(*),'4' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// Forward to rsk
$statusQuery.=" union select count(*),'5' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// total forward application
$statusQuery.=" union select count(*),'5P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'5R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-4  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
      
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
