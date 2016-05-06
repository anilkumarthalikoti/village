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
				
				if( $_POST["statusto"]==7){
				$fdate=date("Y-m-d",time());
				 
				$conn->insert("workorder",array("filling_id"=>$fileid,"forward_by"=>$user["id"],"forwarddate"=>$fdate));
				}
				if( $_POST["statusto"]==8){
				$fkey="wi_".$fileid;
				$fdate=date("Y-m-d",strtotime($_POST[$fkey]));
				 
				$conn->insert("workorder_approval",array("filling_id"=>$fileid,"approved_by"=>$user["id"],"approved_date"=>$fdate,"workorderno"=>$_POST["workorder_no"]));
				}
				
				if( $_POST["statusto"]==9){
				$fdate=date();
				$conn->insert("postinspection",array("filling_id"=>$fileid,"forward_by"=>$user["id"],"forwarddate"=>$fdate));
				}
				
				if( $_POST["statusto"]==11){
				$fdate=date();
				//$conn->insert("postinspection",array("filling_id"=>$fileid,"forward_by"=>$user["id"],"forwarddate"=>$fdate));
				}
				
    }

}

if (!empty($_POST["reject_remarks"])) {
    $schemefillingid = $_POST["schemefillingid"];
	
    foreach ($schemefillingid as $fileid) {
      
        $conn->update("schemefilling", array("status" => $_POST["statusto"]), array("id" =>
                $fileid));
		$conn->insert("schemerejection",array("remarks"=>$_POST["reject_remarks"],"schemefillingid"=>$fileid,"rejected_by"=>$user["id"],"rejectiondate"=>date("Y-m-d"),"rejected_at"=>$_POST["statusto"]));		
    }

}
if (!empty($_POST["pre-inspection"])) {
 $params=array();
 
foreach ($_POST as $key => $value){
if($key!="pre-inspection" && $key!="organization"){
if($key=="inspectiondate"){
   $value=date("Y-m-d", strtotime($value) );
   echo $value;
   }
$params[$key]=$value;
}
 
}
 
      
        $conn->insert("preinspection",$params ); 
    $conn->update("schemefilling",array("status"=>5),array("id"=>$_POST["filling_id"]));

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
$statusQuery.=" union select count(*),'5C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=5 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'5R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-4  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'6' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=6 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// total forward application

$statusQuery.=" union select count(*),'6C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=7 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=7 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// WORKORDER
$statusQuery.=" union select count(*),'7P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=7 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=8 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-7  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'9' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=9 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// FORWARD TO POST INSPECTION
$statusQuery.=" union select count(*),'9P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=9 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'9C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=10 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'9R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-9  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'10' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=11 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION Start
$statusQuery.=" union select count(*),'10P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=11 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'10C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=12 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'10R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-11  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'13' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=13 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION FORWARDED
$statusQuery.=" union select count(*),'14' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=14 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION FORWARDED
$statusQuery.=" union select count(*),'14P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=14 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION FORWARDED
$statusQuery.=" union select count(*),'14C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=15 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION FORWARDED
$statusQuery.=" union select count(*),'14R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-14 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// POST INSPECTION FORWARDED
        
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
       $village="select id from landdetails where villageid in (select villageid from village v,actionmapping am where  v.hobliid =am.hobliid and am.regid=".$user["id"].")";
 
 $statusQuery="select count(*) app,'A'  status from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// All files
 $statusQuery.=" union select count(*),'1' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=1 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// pending at ta
  $statusQuery.=" union select count(*),'-1' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-1 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// rejected at ta
  $statusQuery.=" union select count(*),'2' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=2 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// yet to forward/covering letter
$statusQuery.=" union select count(*),'4' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// Forward to rsk
$statusQuery.=" union select count(*),'5' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// total forward application
$statusQuery.=" union select count(*),'5P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=4 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'5C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=5 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'5R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-4  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status>=7 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";// total forward application
$statusQuery.=" union select count(*),'7P' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=7 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7C' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=8 and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
$statusQuery.=" union select count(*),'7R' from schemefilling sf,schemefilling_land sfl where sf.schemeid=".$_POST["schemeid"]." and sf.status=-7  and sfl.fillingid= sf.id and sfl.landdetailsid in (".$village.")";
      
	    $result = $conn->query($statusQuery);
        $jsontext = "[";
        foreach ($result as $row) {
            $jsontext .= '{"' . $row["status"] . '":"' . $row["app"] . '"},';
        }
        $jsontext = substr_replace($jsontext, '', -1); // to get rid of extra comma
        $jsontext .= "]";
        print $jsontext;
    }



?>
