<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taluka-Approval</title>
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



$filling_id= $_POST["filling_id"];
$query="select sum(coalesce(area1,0))+sum(coalesce(area2,0))+sum(coalesce(area3,0)) preallocated from postinspection_mstr where filling_id in(select id from schemefilling where (regid,schemeid) = (select regid,schemeid from schemefilling where id=".$filling_id."))";
$result=$conn->query($query);
foreach($result as $row){
$preallocated=$row["preallocated"];
}
$query="select s.item1,s.item2,s.item3,p.croparea1,p.croparea2,p.croparea3,p.spacing1,p.spacing2,p.spacing3 from schemefilling s,preinspection p where p.filling_id=s.id and s.id=".$filling_id."";
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
  
  $("#div_mater").pivot($("#mat_list"), 
        { 
            rows: ["Name","Unit","Type","Qty","ItemPrice","Total"] 
        });
		
		$("[class='pvtRowLabel']").css("height","16px");
							  $("[class='pvtVal']").css("padding","5px");
							  $("[class='pvtAxisLabel']").css("height","16px");
							   $("[class='pvtColLabel']").css("height","16px");
						 
							   $("[class='pvtColLabel']").css("background-color","#FFFFFF");
							     $("[class='pvtVal']").css("background-color","#FFFFFF");
							  $("[class='pvtAxisLabel']").css("background-color","#FFFFFF");
							  var i=1;
							  /*
				$("#div_mater table   td").each(function(){
				var mid="#mat_list tr:eq("+i+")";
				i++;
				mid=$(mid).attr("inputid");
				$(this).prev().closest("th").html("<input type='text'  mid='"+mid+"'  class='tiny'/>");
				});*/
  });
  
  </script>
 <script type='text/javascript' src="js/postinspection.js"></script>
 <style type="text/css">
 
 </style>
 
</head>

<body>
<div class="title">Taluka approval calculation sheet</div>
<div class="viewport">
<table> <tr><td>
<form name="post_inspection" >
<input type="hidden" name="filling_id" value="<?php print $filling_id;?>"/>
<input type="hidden" name="inspected_by" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
  <table class="form excel">
   
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td>  
 <td class="label small">Taluka approval date</td><td class="tiny">:</td><td><input type="text" placeholder="dd/MM/yyyy" name="inspected_date" class="datepicker" id="inspectiondate"/>  </td> </tr>
<tr class="labelh"><td></td>
<td >Crop Name </td>
<td >Area in hector </td>
<td  colspan="2">Row spacing </td>
 <td>Plant Distance </td>
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
<input type="text" name="spacing1" class="tiny" value="<?php print $spacing1;?>"/>

</td><td><select name="aspacing1" class="fit" disabled="disabled"  style="width:100px;"   >
<option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>

</select></td><td><input type="text" name="pspacing1" class="tiny"  /></td>
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
 <input type="text" name="spacing2" class="tiny" value="<?php print $spacing2;?>"/>
 
 
 
 </td><td><select name="aspacing2" class="fit" disabled="disabled"    style="width:100px;"  >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing2" class="tiny" /></td>
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
 <td ><input type="text" name="spacing3" class="tiny" value="<?php print $spacing3;?>"/> </td><td><select name="aspacing3" class="fit" disabled="disabled"   style="width:100px;"   >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing3" class="tiny" /></td>
</tr>
 
 <tr><td>Pre-allocated</td><td>:<input type="text" name="preallocated" disabled="disabled" value="<?php print $preallocated;?>"/></td><td>Current Applicable</td><td>:</td><td></td><td></td></tr>
 <tr class="hide"><td>Material</td><td>:</td><td colspan="4"><select name="material" onchange="postinspection.updatePrice();">
 
 <?php 
 $result =$conn->select("cropitemsprice",array("id","itemname","itemprice","units"));
 foreach($result as $row){
 print "<option value='".$row["id"]."' price='".$row["itemprice"]."' units='".$row["units"]."'>".$row["itemname"]."</option>";
 }
 ?>
 
 </select></td> </tr>
  <tr  class="hide"><td>Dealer Price/Qty</td><td>:</td><td><input name='dAmount' type='text' class='tiny1'/></td><td>Qty</td><td>:</td><td><input name='dQty' type='text' class='tiny1'/></td></tr>
  <tr  class="hide"><td>GGRC Price/Qty</td><td>:</td><td><input name='gAmount' disabled="disabled" type='text' class='tiny1'/></td><td>Qty</td><td>:</td><td><input name='gQty' type='text' class='tiny1'/></td></tr>
  <tr><td colspan="6">
  <div style="height:280px; overflow:auto">
  <div id="div_mater"></div>
  <table class="form_grid xlarge margin hide" id="mat_list">
  <thead><tr><th>Name</th><th>Unit</th><th>Type</th><th>Qty</th><th>ItemPrice</th><th>Total</th></tr></thead>
  <tbody>
  <?php 
  $query="select itemname,units,standard_measure,coalesce(ggrcqty,0) ggrcqty, itemprice from cropitemsprice cip , postinspection_dtl pid  where  cip.id= pid.item_id  and pid.filling_id=  ".$_POST["filling_id"]." and pid.item_id!=0  ";
$result=$conn->query($query);
$sno=1;
foreach($result as $row){
$tr="<tr> <td>param_1</td><td>param_2</td><td>param_3</td><td>param_4</td><td>param_5</td><td>param_6</td></tr>";
  $tr=str_replace("param_1",$row["itemname"],$tr);
  $tr=str_replace("param_2",$row["units"],$tr);
  $tr=str_replace("param_3",$row["standard_measure"],$tr);
  $tr=str_replace("param_4",$row["ggrcqty"],$tr);
  $tr=str_replace("param_5",$row["itemprice"],$tr);
 $tr=str_replace("param_6",$row["itemprice"]*$row["ggrcqty"],$tr);
echo $tr;
  }
  ?>
  
  </tbody>
  </table>
  
  </div>
  </td></tr>
  <tr><td colspan="6">  <input type='button' value='Save'  /></td></tr>
  </table>
</form>
  </td><td valign="top" class="hide">
 <table class="form_grid xlarge margin" id="material_list">
 <thead>
 <tr><th>Material</th><th>Dealer qty</th><th>Price/qty</th><th>Total Price</th><th>Inspected qty</th><th>GGRC Price/qty</th><th>Total Price</th></tr>
 </thead>
 <tbody>
 
 </tbody>
 <tfoot> 
 <tr><td></td><td></td><td>Dealer Bill Amount</td><td id="dAmt">0.00</td><td></td><td>Inspection Amount</td><td id="gAmt">0.00</td></tr>
  <tr><td></td><td></td><td>Vat @ 5.5</td><td id="vdAmt">0.00</td><td></td><td>Inspection Amount</td><td id="gdAmt">0.00</td></tr>
 </tfoot>
 </table></td></tr></table>
</div>
</body>
</html>