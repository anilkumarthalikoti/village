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
 $page=0;
 $pagesc=0;
 if(!($user["designation"]=="ALL" || $user["designation"]=="TA")){
 // header('Location: '."accessdenied.php");
//		 die();
 }
 if(!empty($_GET["page"])){
 $page=$_GET["page"];
 }
 
?>
<script type="text/javascript" src="js/approval.js"></script>
<script type="text/javascript">
function openReject(rejecttype,fid){
$("#fid").val(fid);
$("#rejectAt").val(rejecttype);

$( "#reject" ).dialog( "open" );
}
$(document).ready(function(){
 createDialog("reject") ;
 createDialog("preinspection");
 createDialog("workorder");
  createDialog("postinspection");
	<?php
	if($_GET["status"]=="5"){
	?>
	$("table#applications tbody tr td:not(.skip)").click(function(){
	
	 $("select[name='crop1']").val($(this).parent().attr("crop1"));
	 	 $("select[name='crop2']").val($(this).parent().attr("crop2"));
		 	 $("select[name='crop3']").val($(this).parent().attr("crop3"));
			  if($("select[name='crop1'] option:selected").val()=="-1"){
			 $("input[name='croparea1']").val(0);
			 $("input[name='croparea1']").attr("disabled",true);
			  $("input[name='spacing1']").val(0);
			 $("input[name='spacing1']").attr("disabled",true);
			 }
		 
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
			 $("form[name='preinspection_form'] input[name='filling_id']").val($(this).parent().attr("filling_id"));
	$( "#preinspection" ).dialog( "open" );
	});
	<?php
	 }
	?>
	
	
	
	<!-- POST INSPECTION-->
	
	<?php
	if($_GET["status"]=="11"){
	?>
	$("table#applications tbody tr td:not(.skip)").click(function(){ 
	//Post-inspection
	  $("form[name='postinspection_form'] input[name='filling_id']").val($(this).parent().attr("filling_id"));
	  $("form[name='postinspection_form']").submit();
	});
	<?php
	 }
	?>
	
	
	
	
	
	
	
	
	<?php
	if($_GET["status"]=="7"){
	?>
	$("table#applications tbody tr").click(function(){
	 $("input[id='w_fid']").val($(this).attr("filling_id"));
	//$( "#workorder" ).dialog( "open" );
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
 
 function createDialog(id){
 var key="#"+id;
$(key).dialog({
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
 }
</script>
</head>

<body>
<?php  
$canreject="N";
if($_GET["status"]==1 ||$_GET["status"]==5||$_GET["status"]==8){
$canreject="Y";
}
$titles=array();
$titles["1"]="Application accept/reject";
$titles["2"]="Cover letter generation";
$titles["4"]="Forward to RSK";
$titles["5"]="Pending pre-inspection";
$titles["6"]="Pending for work-order";
$titles["6A"]="Received from RSK";
$titles["6B"]="Yet to forward to DDH";
$titles["6C"]="Forward to DDH";
$titles["7"]="Work-orders";
$titles["8"]="Forward to RSK for post-inspection";
 $titles["9"]="Received from RSK for post-inspection";
  $titles["9A"]="Cover Letter for Post-inspection ";
   $titles["9B"]="Forward to RSK for post-inspection ";
   $titles["10"]="Post-Inspection";
   $titles["11"]="Post-Inspection Pending";
    $titles["12"]="Post-Inspection Forward";
	 $titles["13A"]="Post-Inspection TO Taluka Approval Cover letter";
	 $titles["13B"]="Forward TO Taluka Approval";
    ?>
<div class="title"><?php print $titles[$_GET["status"]]?></div>
 
<div class="viewport">
 <table class="excel" style="width:96%">
 <tr>
 <tr><td>
 
 <form name="application" method="post">
<input type="hidden" name="application" value="application"/>
<div    style="max-height:420px; min-height:420px;">
<table class="excel90 margin" id="applications" filter='Y'>
<thead>
 <tr>
 <?php
 $select="Y" ;
  if($select=="Y"){
 ?>
 <th   ><input type="checkbox" onclick="" /></th>
 <?php } ?>
 <?php 
 if($_GET["status"]==7 || $_GET["status"]==8){
 ?>
 <th>Work order Issued</th>
 <?php  if($_GET["status"]==8) {?>
  <th>Approved by</th>
 <?php }?>
 <?php
 }
 ?>
<th>Reg.No</th>
<th>Name</th>
<th>Relation</th>
<th>Village</th>
<th>Hobli</th>
<th>Cast</th>
<th>Survay no.</th>
<th>Land area</th>
<th>Farmer type</th>
<th>Sector</th>
<th>Crop-1</th>
<th>Crop-2</th>
<th>Crop-3</th>
<th>Total land area</th>
<th>Forwarded by</th>
<th>Forwarded Date</th>
<?php  
if(($user["designation"]=="ALL" || $user["designation"]=="TA") && $canreject=="Y" ){
    ?>
<th>&nbsp;</th>	
 
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
if($status=="6"){
$status=5;
}
if($status=="6A" || $status=="6B" || $status=="6C"){
$status=6;
}
if($status=="9A" || $status=="9B"  ){
$status=9;
}
if($status=="13A" || $status=="13B"  ){
$status=13;
}
 $village="select id from landdetails where villageid in (select villageid from village v,actionmapping am where  v.hobliid =am.hobliid and am.regid=".$user["id"].")";
$query="select sf.id schemefillingid, sf.regid, f.firstname,f.fathername,";
$query.=" ( select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid)";
 $query.=" and villageid= s.id) village,(select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid ";$query.=" and ld.id= landdetailsid) and hobliid= s.id) hobli,c.castname, ";
$query.=" (select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno, ";
$query.="  (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector, ";
$query.="(select cropname from cropitems where id= sf.item1 ) crop1 ,(select cropname from cropitems where id= sf.item2 ) crop2 ,(select cropname from cropitems where id= sf.item3 ) crop3, ";
$query.="TRUNCATE((coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)),2) totalappland, ";
$query.="(select login_id from app_login where id= sf.regby ) regby,regdate,sf.item1,sf.item2,sf.item3,  ";
$query.=" (select  concat(approved_date,'#',(select login_id from app_login where id= approved_by) )   from workorder_approval wap  where wap.filling_id=sf.id)  wkapp ";
$query.="  from farmerdetails f, schemefilling sf,casts c where sf.regid= f.id and f.usercast= c.id and sf.status=".$status." and sf.schemeid=".$_GET["schemeid"]."";
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
$wkapp=explode("#",$row["wkapp"]);
?>
<tr 
filling_id="<?php print $row["schemefillingid"];?>" 
crop1="<?php print $row["item1"];?>" 
crop2="<?php print $row["item2"];?>" 
crop3="<?php print $row["item3"];?>"
 cn1="<?php print  $crop1 ;?>" 
 cn2="<?php print  $crop2 ;?>"
  cn3="<?php print  $crop3 ;?>" >
<?php  
  if($select=="Y"){
    ?>
	<td align="center"  ><input type="checkbox" name="schemefillingid[]" value='<?php print $row["schemefillingid"];?>' /></td>
  <?php } ?>
   <?php 
 if($_GET["status"]==7){
 ?>
 <td><input type="text" class="datepicker" name="wi_<?php print  $row["schemefillingid"]; ?>"/></td>
 <?php
 }
 ?>
  <?php 
 if($_GET["status"]==8){
 ?>
 <td> <?php print $wkapp[0]; ?> </td>
  <td> <?php print $wkapp[1]; ?> </td>
 <?php
 }
 ?>

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
<?php  if(($user["designation"]=="ALL" || $user["designation"]=="TA")  && $canreject=="Y"){
    ?>
	<td class="skip" style="width:18px">
	<?php if($_GET["status"]==1){?><span class="close"  onclick="openReject('-1','<?php print $row["schemefillingid"];?>')"></span> <?php }?>
	<?php if($_GET["status"]==5){?><span class="close" onclick="openReject('-4','<?php print $row["schemefillingid"];?>')"></span> <?php }?>
	<?php if($_GET["status"]==8){?><span class="close" onclick="openReject('-7','<?php print $row["schemefillingid"];?>')"></span> <?php }?>
	</td>
 
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
 
 
 <tr><td>
 
<?php 
$inputs="";
switch($_GET["status"]){

case "1":
$inputs="<input type='button' value='Accept' onclick=\"approvaljs.savenewapplication('2');\"/>";
break;
case "2":
$inputs="<input type='button' value='Generate cover letter' onclick=\"approvaljs.generatecoverletter('2');\"/>";
break;
case "4":
$inputs="<input type='button' value='Forward to RSK' onclick=\"approvaljs.savenewapplication('4');\"/>";
break;
case "6":
$inputs="<input type='button' value='Generate covering letter' onclick=\"approvaljs.generatecoverletter('3');\"/><input type='button' value='Forward to TA' onclick=\"approvaljs.savenewapplication('6');\"/>";
break;
case "6B":
$inputs="<input type='button' value='Generate covering letter' onclick=\"approvaljs.generatecoverletter('4');\"/>";
break;
case "6C":
$inputs="<input type='button' value='Forward to DDH' onclick=\"approvaljs.savenewapplication('7');\"/>";
break;
case "7":
$inputs="<input type='button' value='Save' onclick=\"approvaljs.savenewapplication('8');\"/>";
break;
case "8":
$inputs="<input type='button' value='Generate covering letter' onclick=\"approvaljs.generatecoverletter('5');\"/><input type='button' value='Forward to TA' onclick=\"approvaljs.savenewapplication('9');\"/>";
break;
case "9A":
$inputs="<input type='button' value='Cover Letter' onclick=\"approvaljs.generatecoverletter('6');\"/>";
break;
case "9B":
$inputs="<input type='button' value='Forward to RSk for post-inspection' onclick=\"approvaljs.savenewapplication('11');\"/>";
break;
case "12":
$inputs="<input type='button' value='Forward to RSk for taluka approval' onclick=\"approvaljs.savenewapplication('13');\"/>";
break;
case "13A":
$inputs="<input type='button' value='Cover letter' onclick=\"approvaljs.generatecoverletter('7');\"/>";
break;
case "13B":
$inputs="<input type='button' value='Forward for Taluka Approval' onclick=\"approvaljs.savenewapplication('14');\"/>";
break;
}
 
 ?>
<div  style="height:50px; " class="excel">
<?php print $inputs;?>
</div>
 
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
<tr><td>Source of irrigation</td><td>:</td><td><select name="irrigation">
<option value="1">Well</option>
<option value="2">Kolva</option>
</select></td><td></td></tr>
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
<div id="reject" class="xlarge" title="Reson for rejecttion">
<form name="rejectApplication">
<table cellpadding="form xlarge margin">

<tr><td>Remarks</td><td>:</td><td><input type="text" name="reject_remarks" />
<input type="hidden" name="statusto" id="rejectAt" value=""/>
<input type="hidden" name="schemefillingid[]" id="fid" value=""/>
</td></tr>
<tr><td colspan="3"><input type="button" onclick="approvaljs.rejectApplication();" value="Reject"/></td></tr>
</table>

</form>
</div>
<div id="workorder" class="xlarge" title="Work order details">
<form name="workorderApplication">
<table cellpadding="form xlarge margin">

<tr><td>Work order no</td><td>:</td><td><input type="text" name="workorder_no" />
<input type="hidden" name="statusto" id="w_st" value="8"/>
<input type="hidden" name="application" value="application"/>
<input type="hidden" name="schemefillingid[]" id="w_fid" value=""/>
</td></tr>

<tr><td>Work order issue date</td><td>:</td><td><input type="text" name="issue_date" class="datepicker" id="wissuedate" />
</td></tr>
<tr><td colspan="3"><input type="button" onclick="approvaljs.workorder();" value="Save"/></td></tr>
</table>

</form>
</div>



<!-- postinspection-->

<div id="postinspection" title="Post inspection details" class="xlarge">
<form name="postinspection_form" target="_self" action="postinspection.php" method="post">
<input name="filling_id" type="hidden"/>
 
</form>



</div>

 

</div>

</body>
</html>
