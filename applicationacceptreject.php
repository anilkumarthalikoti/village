<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application accept reject</title>
<?php 
  require "interceptor.php";
 require "server/app_connector.php";
 $user=$_SESSION["logged_in"];
 $conn=$database;
 
 if(!($user["designation"]=="ALL" || $user["designation"]=="TA")){
 // header('Location: '."accessdenied.php");
//		 die();
 }
 
 
?>
<script type="text/javascript" src="js/approval.js"></script>
</head>

<body>
<?php  if($_GET["status"]==1){
    ?>
<div class="title">Application accept/reject</div>
<?php
}
    ?>
    <?php  if($_GET["status"]==2){
    ?>
<div class="title">Cover letter generation</div>
<?php
}
    ?>
<div class="viewport">
<form name="application">
<input type="hidden" name="application" value="application"/>
<div style="position:absolute; bottom:50px; top:0;" class="excel">
<table class="grid excel" id="applications">
<thead>
<tr>
<th>Reg.No</th>
<th>Name</th>
<th>Relation name</th>
<th>Village name</th>
<th>Hobli name</th>
<th>Cast</th>
<th>Survay no.</th>
<th>Land area</th>
<th>Farmer type</th>
<th>Sector</th>
<th>Crop-1</th>
<th>Crop-2</th>
<th>Crop-3</th>
<th>Total land area</th>
<th>Filled by</th>
<th>Filled Date</th>
<?php  if(($user["designation"]=="ALL" || $user["designation"]=="TA")){
    ?>
<th><input type="checkbox" onclick="" /></th>
 <?php } ?>
</tr>

</thead>
<tbody>
<?php 
$query="select sf.id, sf.regid, f.firstname,f.fathername,'-' village,'-' hobli,c.castname,
(select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno,
  (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector,(select cropname from cropitems where id= sf.item1 ) crop1
,(select cropname from cropitems where id= sf.item2 ) crop2
,(select cropname from cropitems where id= sf.item3 ) crop3,(coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)) totalappland,(select login_id from app_login where id= sf.regby ) regby,regdate
from farmerdetails f, schemefilling sf,casts c where sf.regid= f.id and f.usercast= c.id and sf.status=".$_GET["status"]." and sf.schemeid=".$_GET["schemeid"]."";
if(!empty($_GET["subschemeid"])){
$query.="  and sf.subschemeid=".$_POST["subschemeid"]."";
}
$query.=" order by sf.regdate ";
 
$result=$conn->query($query);
foreach($result as $row){
?>
<tr>
<td><?php print $row["id"];?></td>
<td><?php print $row["firstname"];?></td>
<td><?php print $row["fathername"];?></td>
<td><?php print $row["village"];?></td>
<td><?php print $row["hobli"];?></td>
<td><?php print $row["castname"];?></td>
<td><?php print $row["survayno"];?></td>
<td><?php print $row["ftype"]?></td>
<td><?php if($row["ftype"]<=5){print "SMALL";}else{
print "BIG FRAMER";
}?></td>

<td><?php print $row["sector"]?></td>
<td><?php print $row["crop1"]?></td>
<td><?php print $row["crop2"]?></td>
<td><?php print $row["crop3"]?></td>
<td><?php print $row["totalappland"]?></td>
<td><?php print $row["regby"]?></td>
<td><?php print $row["regdate"]?></td>
<?php  if(($user["designation"]=="ALL" || $user["designation"]=="TA")){
    ?>
<td><input type="checkbox" name="schemefillingid[]" value='<?php print $row["schemefillingid"];?>' /></td>
  <?php } ?>
</tr>

<?php
}
?>
</tbody>


</table>
</div>
<input type="hidden" name='statusto' value=""/>
</form>
<?php 
if($_GET["status"]==1){
?>
<div  style="height:50px;  position:absolute; bottom:0;" class="excel"><input type="button" value="Accept" onclick="approvaljs.savenewapplication('2');"/><input type="button" value="Reject" onclick="approvaljs.savenewapplication('-1');"/></div>
<?php }

if($_GET["status"]==2){
?>
<div  style="height:50px;  position:absolute; bottom:0;" class="excel"><input type="button" value="Generate cover letter"/></div>
<?php
 }

?>
</div>
</body>
</html>
