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
     $conn-debug();
    
      
        $conn->insert("preinspection",array(  "fillingid"=>$_POST["filling_id"], "area1"=>$_POST["croparea1"], "area2"=>$_POST["croparea2"], "area3"=>$_POST["croparea3"], "spacing1"=>$_POST["spacing1"], "spacing2"=>$_POST["spacing2"], "spacing3"=>$_POST["spacing3"], "inspectedby"=>$_POST["inspectedby"], "dealerid"=>$_POST["dealer"], "quatation_amt"=>$_POST["quatationamt"])); 
    

}

    if ((!empty($_POST["get"])&& $_POST["get"] == "schemes")) {

       $statusQuery="select count(*) app, 'A' status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=".$user["id"]." and sf.schemeid=".$_POST["schemeid"]."  union select count(*), sf.status from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v, states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid and am.regid=".$user["id"]." and sf.schemeid=".$_POST["schemeid"]." group by sf.status ";
 
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
