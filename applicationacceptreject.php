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
	  width:'auto',
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
	if($_GET["status"]=="5"){
	?>
	$("table#applications tbody tr").click(function(){
	
	 $("select[name='crop1']").val($(this).attr("crop1"));
	 	 $("select[name='crop2']").val($(this).attr("crop2"));
		 	 $("select[name='crop3']").val($(this).attr("crop3"));
			  if($("select[name='crop1'] option:selected").val()=="-1"){
			 $("input[name='croparea1']").val(0);
			 $("input[name='croparea1']").attr("disabled",true);
			  $("input[name='spacing1']").val(0);
			 $("input[name='spacing1']").attr("disabled",true);
			 }
			 alert
			 if($("select[name='crop2'] option:selected").val()=="-1"){
			 $("input[name='croparea2']").val(0);
			 $("input[name='croparea2']").attr("disabled",true);
			  $("input[name='spacing2']").val(0);
			 $("input[name='spacing2']").attr("disabled",true);
			 }
			 
			  if($("select[name='crop3'] option:selected").val()=="-1"){
			 $("input[name='croparea3']").val(0);
			 $("input[name='croparea3']").attr("disabled",true);
			  $("input[name='spacing3']").val(0);
			 $("input[name='spacing3']").attr("disabled",true);
			 }
			 $("input[name='filling_id']").val($(this).attr("filling_id"));
	$( "#preinspection" ).dialog( "open" );
	});
	<?php
	 }
	?>
});
 function updatedealers(){
 $("select[name='dealer'] option").addClass("hide");
 $("select[name='dealer'] ").val("-1");
 var selected=$("select[name='organization'] option:selected").val();
 var view="select[name='dealer']  [parent_id='"+selected+"']";
 $("select[name='dealer']  [parent_id='-1']").removeClass("hide");
 $(view).removeClass("hide");
 }
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
		 <?php  if($_GET["status"]==5){
		 
    ?>
<div class="title">Pending pre-inspection</div>
<?php
}
    ?>
<div class="viewport">
 <table class="form excel" style="width:96%">
 <tr>
 <tr><td>
 
 <form name="application" method="post">
<input type="hidden" name="application" value="application"/>
<div   class="excel" style="max-height:420px; min-height:420px;">
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
if($status=="5"){
$status=4;
}
  $village="select id from landdetails where villageid in (select villageid from village v,actionmapping am where  v.hobliid =am.hobliid and am.regid=".$user["id"].")";
$query="select sf.id schemefillingid, sf.regid, f.firstname,f.fathername,( select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and villageid= s.id) village,(select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and hobliid= s.id) hobli,c.castname,
(select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno,
  (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector,(select cropname from cropitems where id= sf.item1 ) crop1
,(select cropname from cropitems where id= sf.item2 ) crop2
,(select cropname from cropitems where id= sf.item3 ) crop3,(coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)) totalappland,(select login_id from app_login where id= sf.regby ) regby,regdate,sf.item1,sf.item2,sf.item3
from farmerdetails f, schemefilling sf,casts c  where sf.regid= f.id and f.usercast= c.id and sf.status=".$status." and sf.schemeid=".$_GET["schemeid"]."";
if(!empty($_GET["subschemeid"])){
$query.="  and sf.subschemeid=".$_POST["subschemeid"]."";
}
if($_GET["status"]==5){

}
$query.=" order by sf.regdate ";
 
$result=$conn->query($query);
foreach($result as $row){
$crop1= $row["crop1"];
$crop2= $row["crop2"];
$crop3= $row["crop3"];
?>
<tr filling_id="<?php print $row["schemefillingid"];?>" crop1="<?php print $row["item1"];?>" crop2="<?php print $row["item2"];?>" crop3="<?php print $row["item3"];?>" cn1="<?php print  crop1 ;?>" cn2="<?php print  crop2 ;?>" cn3="<?php print  crop3 ;?>" >
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
<td><?php print  $crop1; ?></td>
<td><?php print  $crop2 ;?></td>
<td><?php print  $crop3 ;?></td>
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
 </td></tr>
 
 </tr>
 <tr><td>
 
<?php 
if($_GET["status"]==1){
?>
<div  style="height:50px; " class="excel"><input type="button" value="Accept" onclick="approvaljs.savenewapplication('2');"/><input type="button" value="Reject" onclick="approvaljs.savenewapplication('-1');"/></div>
<?php }

if($_GET["status"]==2){
?>
<div  style="height:50px;  " class="excel"><input type="button" value="Generate cover letter" onclick="approvaljs.generatecoverletter();"/></div>
<?php
 }
if($_GET["status"]==4){
?>
<div  style="height:50px;   " class="excel"><input type="button" value="Forward to rsk" onclick="approvaljs.savenewapplication('4');"/></div>
<?php
 }

?>
 
 </td></tr>
 </table>

</div>
<div id="preinspection" title="Pre inspection details" class="xlarge">
<form name="preinspection_form">
<input name="filling_id" type="hidden"/>
<input name="pre-inspection" type="hidden" value="preinspection"/>
<input name="inspectedby" value="<?php print $user["id"];?>" type="hidden"/>
<table class="form" style="margin:0px;">
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td><td></td>  </tr>
<tr  ><td>Pre-inspection date</td><td>:</td><td><input type="text" placeholder="dd/MM/yyyy" name="inspectiondate" class="datepicker" id="inspectiondate"/></td><td></td>  </tr>
<tr class="hide"><td colspan="4"></td></tr>
<tr class="labelh"><td></td><td>Crop-1</td><td>Crop-2</td><td>Crop-3</td></tr>
<tr>
<td>Crop </td>
<td><select name="crop1" class="tiny1" disabled="disabled">
<option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>

</select></td>
 
 <td><select name="crop2" class="tiny1" disabled="disabled">
 <option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
 <td><select name="crop3" class="tiny1" disabled="disabled">
 <option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
</tr>
<tr>
<td>Area in hector </td>
<td><input type="text" name="croparea1" class="tiny"/></td>
 <td><input type="text" name="croparea2" class="tiny"/></td>
 <td><input type="text" name="croparea3" class="tiny"/> </td>
</tr>
<tr>
<td>Spacing </td>
<td><input type="text" name="spacing1" class="tiny"/></td>
 <td><input type="text" name="spacing2" class="tiny"/></td>
 <td> <input type="text" name="spacing3" class="tiny"/></td>
</tr>
<tr><td colspan="4" align="center" style="font-weight:bold">Dealer</td></tr>
<tr>
<td>Company/Organization :</td>
<td><select name="organization" onchange="updatedealers()">
<option value="-1">--Select--</option>
<?php 
$result=$conn->select("dealers_company",array("id","name"),array("parent_id"=>0));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
}
?>
</select> </td>
 <td >Dealer:</td>
 <td> <select name="dealer">
 <option parent_id='-1' value="-1">--Select--</option>
<?php 
$result=$conn->select("dealers_company",array("id","name","parent_id"),array("parent_id[!]"=>0));
foreach($result as $row){
echo "<option class='hide'  parent_id='".$row["parent_id"]."' value='".$row["id"]."'>".$row["name"]."</option>";
}
?>
 </select></td>
</tr>
<tr><td>Quatation amt</td><td>:</td><td><input type="text" name="quatationamt" class="tiny"/></td><td></td></tr>
<tr><td colspan="4"><input type="button" value="Preview"/><input type="button" value="Save & print" onclick="approvaljs.saveandprint();"/></td></tr>
</table>
</form>
</div>
</body>
</html>
