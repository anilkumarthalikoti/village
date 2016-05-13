<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post-inspection</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
 $user=$_SESSION["logged_in"];
$conn=$database;
$preallocated="0";
$item1=-1;
$item2=-1;
$item3=-1;
$area1=0;
$area2=0;
$area3=0;
$sapcing1=0;
$spacing2=0;
$spacing3=0;
$sapcing4=0;
$spacing5=0;
$spacing6=0;
$plants1=0;
$plants2=0;
$plants3=0;

$filling_id= $_POST["filling_id"];
$query="select sum(coalesce(area1,0))+sum(coalesce(area2,0))+sum(coalesce(area3,0)) preallocated from postinspection_mstr where filling_id in(select id from schemefilling where (regid,schemeid) = (select regid,schemeid from schemefilling where id=".$filling_id."))";
$result=$conn->query($query);
foreach($result as $row){
$preallocated=$row["preallocated"];
}
$query="select s.item1,s.item2,s.item3,p.croparea1,p.croparea2,p.croparea3,p.spacing1,p.spacing2,p.spacing3,p.spacing4,p.spacing5,p.spacing6 from schemefilling s,preinspection p where p.filling_id=s.id and s.id=".$filling_id."";
$result=$conn->query($query);
foreach($result as $row){
$item1=$row["item1"];
$item2=$row["item2"];
$item3=$row["item3"];
$area1=$row["croparea1"];
$area2=$row["croparea2"];
$area3=$row["croparea3"];
$spacing1=$row["spacing1"];
$spacing2=$row["spacing2"];
$spacing3=$row["spacing3"];
$spacing4=$row["spacing4"];
$spacing5=$row["spacing5"];
$spacing6=$row["spacing6"];

}

 ?>
 <link href="css/pivot.css" type="text/css" rel="stylesheet"/>
 <script type="text/javascript" src="js/pivot.js"></script>
  <script type="text/javascript">
  
  function setspacing(spacing,name){
  var key="select[name='"+name+"'] option";
  var key1="select[name='"+name+"']";
  $(key).each(function(){
			var min=$(this).attr("startfrom");
			var max=$(this).attr("endsat");
			if(spacing>= min && spacing<= max){
			$(key1).val($(this).val());
			}
  
  
  
  
  });
  }
  
  
  
  $(document).ready(function(){
  $("[crop1='crop1']").hide();
    $("[crop2='crop2']").hide();
 	  $("[crop3='crop3']").hide();
  if(<?php print $item1?>!="-1"){
    $("[crop1='crop1']").show();
	$("select[name='crop1'] ").val("<?php print $item1;?>");
	setspacing("<?php print $spacing1;?>","aspacing1");
  }
    if(<?php print $item2?>!="-1"){
      $("[crop2='crop2']").show();
	 $("select[name='crop2'] ").val("<?php print $item2;?>");
	 setspacing("<?php print $spacing2;?>","aspacing2");
  }
    if(<?php print $item3?>!="-1"){
      $("[crop3='crop3']").show();
	 $("select[name='crop3'] ").val("<?php print $item3;?>");
	 setspacing("<?php print $spacing3;?>","aspacing3");
  }
  //
  //div_mater
  //mat_list
  
   
  });
  
  </script>
 <script type='text/javascript' src="js/postinspection.js"></script>
</head>

<body>
<div class="title">Post-inspection</div>
<div class="viewport">
<table> <tr><td>
<form name="post_inspection" >
<input type="hidden" name="filling_id" value="<?php print $filling_id;?>"/>
<input type="hidden" name="inspected_by" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
  <table class="form excel">
   
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td>  
 <td class="label small">Post-inspection date</td><td class="tiny">:</td><td><input type="text" placeholder="dd/MM/yyyy" name="inspected_date" class="datepicker" id="inspectiondate"/>  </td> </tr>
<tr   ><td></td>
<td >Crop Name </td>
<td >Drip installed area  </td>
<td  colspan="2">Spacing </td>
 <td>Plants Total </td>
</tr>
<tr crop1="crop1">
<td>Crop -1 </td>
<td><select name="crop1" class="tiny1"  >
<option value="-1">Select-Crop</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>

</select></td>
 
 <td ><input type="text" name="area1" class="tiny" value="<?php print $area1;?>"/></td>
 <td> 
<input type="text" name="spacing1" class="tiny" value="<?php print $spacing1;?>" placeholder="ROW SPACING"/>X<input type="text" name="spacing4" class="tiny" value="<?php print $spacing4;?>" placeholder="PLANT SPACING"/>

</td><td><select name="aspacing1" class="fit hide" disabled="disabled"  style="width:100px;"   >
<option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>

</select></td><td><input type="text" name="pspacing1" class="tiny"    /></td>
</tr>
<tr  crop2="crop2">
<td>Crop-2</td>
<td>


<select name="crop2" class="tiny1"  >
 <option value="-1">Select-Crop</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select>
</td>
 
 <td ><input type="text" name="area2" class="tiny" value="<?php print $area2;?>"/></td>
 <td>
<input type="text" name="spacing2" class="tiny" value="<?php print $spacing2;?>" placeholder="ROW SPACING"/>X<input type="text" name="spacing5" class="tiny" value="<?php print $spacing5;?>" placeholder="PLANT SPACING"/>
 
 
 
 </td><td><select name="aspacing2" class="fit hide" disabled="disabled"    style="width:100px;"  >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing2" class="tiny"   /></td>
</tr>
<tr crop3="crop3">
<td>Crop-3</td>
<td ><select name="crop3" class="tiny1"  >
 <option value="-1">Select-Crop</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
<td ><input type="text" name="area3" class="tiny" value="<?php print $area3;?>"/></td>
 <td ><input type="text" name="spacing3" class="tiny" value="<?php print $spacing3;?>" placeholder="ROW SPACING"/>X<input type="text" name="spacing6" class="tiny" value="<?php print $spacing6;?>" placeholder="PLANT SPACING"/> </td><td><select name="aspacing3" class="fit hide" disabled="disabled"   style="width:100px;"   >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing3" class="tiny"    /></td>
</tr>
 
 <tr><td>Pre-allocated</td><td>:<input type="text" name="preallocated" disabled="disabled" value="<?php print $preallocated;?>"/></td><td>Current Applicable</td><td>:</td><td></td><td></td></tr>
 
  <tr><td colspan="6">
 
  
  
  </td></tr>
  
  </table>
</form>
  </td> 
</tr></table>
<div id="div_mater" style='background:#ffffff'>
  
  <table class=" xlarge margin" border="1px" id="mat_list" style='background:#ffffff'>
  <thead><tr><th>S.no</th><th>Name</th><th>Unit</th><th>Type</th><th>Qty</th><th>Remarks</th></tr></thead>
  <tbody>
  <?php 
  $query="select  id,itemname,standard_measure,units,itemorder from cropitemsprice order by itemorder";
  $result=$conn->query($query);
  $lastorder=-1;
$lastitem="";
$tr="";
$rowheight=1;
$master=array();
$itemname=array();
$dtl=array();
foreach($result as $row){ 
if(!isset($master[$row["itemorder"]])){
$master[$row["itemorder"]]=array();
$itemname[$row["itemorder"]]=$row["itemname"];
}
$master[$row["itemorder"]][]=array($row["id"],$row["units"],$row["standard_measure"]);
  }
  
  foreach ($master as $name => $values) {
  $rowheight=count($values);
   echo "<tr><td rowspan='$rowheight'>$name</td><td rowspan='$rowheight'>$itemname[$name]</td>";
   $i=0;
   foreach ($values as $val1) {
   if($i==1){
   echo"<tr>";
   }
   $id=-1;
   
   foreach($val1 as $val){
   if($id==-1){
   $id=$val;
   }else{
      echo "<td>$val</td>";
	  }
	  }
	   echo"<td><input type='text' mid='$id' class='tiny'/></td>";
	  if($i==0){
	  echo "<td rowspan='$rowheight' style='border:1px solid #000000' ><textarea ></textarea></td>";
	  $i=1;
	  }
	  echo "</tr>";
   }
  

   }
  ?>
  
  </tbody>
  <tfoot><tr><td colspan="6"><input type='button' value='Save' onclick='postinspection.savePostInspection();' /></td></tr></tfoot>
  </table>
 
  </div>
  
  
</div>
</body>
</html>
