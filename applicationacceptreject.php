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
  header('Location: '."accessdenied.php");
		 die();
 }
 
 
?>
<script type="text/javascript" src="js/approval.js"></script>
</head>

<body>
<div class="title">Application accept/reject</div>
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
<th><input type="checkbox" onclick="" /></th>
 
</tr>

</thead>
<tbody>
<?php 
$query="select sf.id schemefillingid,f.id,f.firstname,f.fathername,s.state_name,(select s1.state_name from states s1 where s1.id=v.hobliid) hobli,c.castname, group_concat(distinct l.landsono separator ', ') survayno,(select sum(totalland) from landdetails ld where ld.regid= l.regid ) ftype,(select ss.name from schemes ss where ss.id= sf.subschemeid ) sector,(select ci.cropname from cropitems ci where ci.id=sf.item1)area_1,(select ci.cropname from cropitems ci where ci.id=sf.item2)area_2,(select ci.cropname from cropitems ci where ci.id=sf.item3)area_3 from schemefilling_land sfl,farmerdetails f, schemefilling sf  ,landdetails l, village v,casts c ,states s,actionmapping am where   sfl.landdetailsid= l.id and l.villageid = s.id and sf.id= sfl.fillingid and v.villageid= l.villageid and v.hobliid= am.hobliid and f.id= sf.regid  and  c.id=f.usercast and am.regid=".$user["id"]." and sf.schemeid=".$_GET["schemeid"]." and sf.status=".$_GET["status"]."";
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
<td><?php print $row["state_name"];?></td>
<td><?php print $row["hobli"];?></td>
<td><?php print $row["castname"];?></td>
<td><?php print $row["survayno"];?></td>
<td><?php print $row["ftype"]?></td>
<td><?php if($row["ftype"]<=5){print "SMALL";}else{
print "BIG FRAMER";
}?></td>

<td><?php print $row["sector"]?></td>
<td><?php print $row["area_1"]?></td>
<td><?php print $row["area_2"]?></td>
<td><?php print $row["area_3"]?></td>
<td><?php print $row["sector"]?></td>
<td><?php print $row["sector"]?></td>
<td><?php print $row["sector"]?></td>
<td><input type="checkbox" name="schemefillingid[]" value='<?php print $row["schemefillingid"];?>' /></td>
 
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
