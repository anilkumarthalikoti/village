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
<script type="text/javascript">
$(document).ready(function(){
 $( "#preinspection" ).dialog({
      autoOpen: false,
	  width:'70%',
	  position: { my: "center", at: "top" },
	  maxWidth:'600px',
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "blind",
        duration: 1000
      }
    });
	<?php
	if($_GET["status"]=="1"){
	?>
	$("table#applications tbody tr").click(function(){
	
	 
	$( "#preinspection" ).dialog( "open" );
	});
	<?php
	 }
	?>
});
 
</script>
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
	 <?php  if($_GET["status"]==4){
    ?>
<div class="title">Forward to RSK</div>
<?php
}
    ?>
<div class="viewport">
<form name="application" method="post">
<input type="hidden" name="application" value="application"/>
<div style="position:absolute; bottom:50px; top:0;" class="excel">
<table class="grid excel" id="applications">
<thead>
<tr><th colspan="17" align="right"><input type="text" name="search" placeholder="Search " class="search"/></th></tr>
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
$status=$_GET["status"];
if($status=="4"){
$status=2;
}
$query="select sf.id schemefillingid, sf.regid, f.firstname,f.fathername,( select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and villageid= s.id) village,(select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and hobliid= s.id) hobli,c.castname,
(select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno,
  (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector,(select cropname from cropitems where id= sf.item1 ) crop1
,(select cropname from cropitems where id= sf.item2 ) crop2
,(select cropname from cropitems where id= sf.item3 ) crop3,(coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)) totalappland,(select login_id from app_login where id= sf.regby ) regby,regdate
from farmerdetails f, schemefilling sf,casts c  where sf.regid= f.id and f.usercast= c.id and sf.status=".$status." and sf.schemeid=".$_GET["schemeid"]."";
if(!empty($_GET["subschemeid"])){
$query.="  and sf.subschemeid=".$_POST["subschemeid"]."";
}
$query.=" order by sf.regdate ";
 
$result=$conn->query($query);
foreach($result as $row){
?>
<tr  >
<td><?php print $row["schemefillingid"];?></td>
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
<div  style="height:50px;  position:absolute; bottom:0;" class="excel"><input type="button" value="Generate cover letter" onclick="approvaljs.generatecoverletter();"/></div>
<?php
 }
if($_GET["status"]==4){
?>
<div  style="height:50px;  position:absolute; bottom:0;" class="excel"><input type="button" value="Forward to rsk" onclick="approvaljs.savenewapplication('4');"/></div>
<?php
 }

?></div>
<div id="preinspection" title="Pre inspection details" class="xlarge">
<table class="form   margin">
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>
<tr>
<td>Select crop 1</td><td>:</td><td><select name="crop1" class="tiny1">
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>

</select></td>
<td>Area in hector 1</td><td>:</td><td><input type="text" name="croparea1" class="tiny"/></td>
<td>Area of spacing 1</td><td>:</td><td><select name="area of spacing" class="tiny1">
<?php 
$result=$conn->select("spacing",array("id","spacing"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["spacing"]."</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Select crop 2</td><td>:</td><td><select name="crop1" class="tiny1">
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
<td>Area in hector 2</td><td>:</td><td><input type="text" name="croparea2" class="tiny"/></td>
<td>Area of spacing 2</td><td>:</td><td><select name="area of spacing" class="tiny1">
<?php 
$result=$conn->select("spacing",array("id","spacing"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["spacing"]."</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Select crop 3</td><td>:</td><td><select name="crop1" class="tiny1">
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
<td>Area in hector 3</td><td>:</td><td><input type="text" name="croparea3" class="tiny"/></td>
<td>Area of spacing 3</td><td>:</td><td><select name="area of spacing" class="tiny1">
<?php 
$result=$conn->select("spacing",array("id","spacing"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["spacing"]."</option>";
}
?>
</select></td>
</tr>
</table>

</div>
</body>
</html>
