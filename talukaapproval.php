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
$sapcing4=0;
$spacing5=0;
$spacing6=0;
$plants1=0;
$plants2=0;
$plants3=0;
$name="";
$gender="";
$cast="";
$sector="";
$uniquecode="";
$inspected_by="";
$inspected_date="";
$filling_id= $_POST["filling_id"];
$query="select sum(coalesce(area1,0))+sum(coalesce(area2,0))+sum(coalesce(area3,0)) preallocated from postinspection_mstr where filling_id in(select id from schemefilling where (regid,schemeid) = (select regid,schemeid from schemefilling where id=".$filling_id."))";
$result=$conn->query($query);
foreach($result as $row){
$preallocated=$row["preallocated"];
}
$query="select user.login_id,pm.inspected_date,f.firstname,f.firstname_k,f.fathername,f.fathername_k,c.castname,c.castname_k,";
$query.=" s.uniquecode ,f.gender, s.item1,s.item2,s.item3,p.croparea1,p.croparea2,p.croparea3,";
$query.=" p.spacing1,p.spacing2,p.spacing3,p.spacing4,p.spacing5,p.spacing6 ,prj.name sectorname ";
 
$query.=" from schemefilling s,preinspection p,postinspection_mstr pm, farmerdetails f,casts c,schemes prj,app_login user";
$query.=" where ";
$query.="  prj.id=s.subschemeid and c.id= f.usercast and f.id=s.regid and user.id= pm.inspected_by ";
$query.=" and pm.filling_id= p.filling_id and p.filling_id=s.id and s.id=".$filling_id."";
echo $query;
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
$name=$row["firstname"]."/".$row["firstname_k"];
$cast=$row["castname"]."/".$row["castname_k"];
$uniquecode=$row["uniquecode"];
$genders=array();
$genders["M"]="MALE";
$genders["F"]="FEMALE";
$gender=$genders[$row["gender"]];
$sector=$row["sectorname"];
$inspected_by=$row["login_id"];
$inpsected_date=$row["inspected_date"];
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
  /*
  $("#div_mater").pivot($("#mat_list"), 
        { 
            rows: ["ORDER","NAME","UNIT","TYPE","QTY","GGRC PRICE","FIELD TOTAL","DEALER QTY","DEALER AMT",,"DEALER TOTAL","Amount considered whichever is less"] 
        });
		
		$("[class='pvtRowLabel']").css("height","16px");
							  $("[class='pvtVal']").css("padding","5px");
							  $("[class='pvtAxisLabel']").css("height","16px");
							   $("[class='pvtColLabel']").css("height","16px");
						 
							   $("[class='pvtColLabel']").css("background-color","#FFFFFF");
							     $("[class='pvtVal']").css("background-color","#FFFFFF");
							  $("[class='pvtAxisLabel']").css("background-color","#FFFFFF");
							  var i=1;
							  
				$("#div_mater table   td").each(function(){
				var mid="#mat_list tr:eq("+i+")";
				i++;
				mid=$(mid).attr("inputid");
				var amtid=$(this).prev().closest("th").prev().closest("th");
				$(amtid).html("0");
			 $(amtid).css("background","#FCF7D8");
				$(amtid).prev().closest("th").html("0");
				$(amtid).prev().closest("th").prev().closest("th") .html("<input dlamt='dlamt' type='text'  mid='"+mid+"'  class='tiny' />");
					$(amtid).prev().closest("th").prev().closest("th").prev().closest("th") .html("<input type='text'  mid='"+mid+"' dlqty='dlqty' class='tiny' />");
				}); 
 var aid=$("#div_mater table   td").prev().closest("th").prev().closest("th");
   $(aid).prev().closest("th").prev().closest("th").prev().closest("th").css("background","#ECF3FF");
      $(aid).prev().closest("th").prev().closest("th").css("background","#ECF3FF");
	  $(aid).prev().closest("th").css("background","#ECF3FF");
    $(aid).prev().closest("th").prev().closest("th").prev().closest("th").prev().closest("th").css("background","#FFEEEE");
 */ 
 });
 
  </script>
 <script type='text/javascript' src="js/talukaapproval.js"></script>
 <style type="text/css">
 
 </style>
 
</head>

<body>
<div class="title">Taluka approval calculation sheet</div>
<div class="viewport">
 
<form name="post_inspection" >
<input type="hidden" name="filling_id" value="<?php print $filling_id;?>"/>
<input type="hidden" name="inspected_by" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
 
 
  <table class="excel90 form">
   
<tr  ><td width="231" class="labelhhr">Logged user</td>
<td width="221">: <?php print $user["login_id"]?> </td>

 <td width="296" class="labelhhr">Taluka approval date</td>
 <td width="100" class="tiny">: <input type="text" placeholder="dd/MM/yyyy" name="inspected_date" class="datepicker" id="inspectiondate"/>  </td> 
 <td width="144"></td>  
 <td width="144"></td>  
 </tr>
 <tr>
 <td class="labelhhr"> Name of Farmer</td>
 <td class="labelhhrx">:<?php print $name?></td>
 <td class="labelhhr right">Gender</td>
 <td class="labelhhrx">:<?php print $gender?></td>
 <td class="labelhhr right">Cast</td>
  <td class="labelhhr right">:<?php print $cast?></td>
 </tr>
  <tr>
   <td class="labelhhr">Unicode</td>
 <td class="labelhhrx">:<?php print $uniquecode?></td>
   <td class="labelhhr">Sector</td>
 <td class="labelhhrx">:<?php print $sector?></td>


 <td class="labelhhr"></td>
 <td class="labelhhr">&nbsp;</td>
 </tr>
  <tr>
 <td class="labelhhr">Village</td>
 <td class="labelhhrx">:<?php print $inspected_by?></td>
  <td class="labelhhr">Hobli</td>
 <td class="labelhhrx">:<?php print $inspected_date?></td>
 <td class="labelhhr">Taluka</td>

 <td class="labelhhr">:<?php print $inspected_date?></td>
 </tr>
 <tr>
 <td class="labelhhr">Constituency</td>
 <td class="labelhhrx">:<?php print $inspected_by?></td>
  <td class="labelhhr">District</td>
 <td class="labelhhrx">:<?php print $inspected_date?></td>
 <td class="labelhhr">Taluka</td>

 <td class="labelhhr">:<?php print $inspected_date?></td>
 </tr>
  <tr>
 <td class="labelhhr">Inspected by</td>
 <td class="labelhhrx">:<?php print $inspected_by?></td>
  <td class="labelhhr">Inspection date</td>
 <td class="labelhhrx">:<?php print $inspected_date?></td>
 <td class="labelhhr">&nbsp;</td>

 <td class="labelhhr">&nbsp;</td>
 </tr>
<tr class="labelhhr"><td></td>
<td >Crop Name </td>
<td >Area in hector </td>
<td  colspan="2">Row spacing </td>
 <td>Plants Total </td>
</tr>
<tr crop1="crop1">
<td>Crop -1 </td>
<td><select name="crop1"   class="tiny1 readonly"  >
<option value="-1">Select-Crop</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>

</select></td>
 
 <td ><input type="text" name="area1" class="tiny readonly"   value="<?php print $area1;?>"/></td>
 <td> 
<input type="text" name="spacing1" class="tiny readonly"   value="<?php print $spacing1;?>"/>X
<input type="text" name="spacing4" class="tiny readonly"   value="<?php print $spacing4;?>"/>

</td><td><select name="aspacing1" class="fit readonly"    style="width:100px;"   >
<option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>

</select></td><td><input type="text" name="pspacing1" class="tiny readonly"    value="<?php print $plants1;?>"/></td>
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
 <input type="text" name="spacing2" class="tiny" value="<?php print $spacing2;?>"/> X
  <input type="text" name="spacing5" class="tiny" value="<?php print $spacing5;?>"/>
 
 
 
 </td><td><select name="aspacing2" class="fit" disabled="disabled"    style="width:100px;"  >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing2" class="tiny"  value="<?php print $plants2;?>" /></td>
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
 <td ><input type="text" name="spacing3" class="tiny" value="<?php print $spacing3;?>"/>X
 <input type="text" name="spacing6" class="tiny" value="<?php print $spacing6;?>"/> </td><td><select name="aspacing3" class="fit" disabled="disabled"   style="width:100px;"   >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing3" class="tiny"  value="<?php print $plants3;?>" /></td>
</tr>
 
 <tr><td>Pre-allocated</td><td>:<input type="text" name="preallocated" disabled="disabled" value="<?php print $preallocated;?>"/></td><td>Current Applicable</td><td>:</td><td></td><td></td></tr>
<tr><td colspan="6">
 
  
  <div id="div_mater"  >
   
 
  
  
<table class="form_grid excel90 margin " id="mat_list">
  <thead>
  <tr style="border-bottom:1px solid #FFFFFF;">
  <th>&nbsp;</th>
  <th></th>
  <th></th>
  <th></th>
  <th colspan="3"  style="border-bottom:1px solid #FFFFFF;" >AS PER FIELD </th>
  <th colspan="3"  style="border-bottom:1px solid #FFFFFF;">AS PER BILL </th>
  <th rowspan="2" >Amount considered whichever is less</th>
  </tr>
  <tr>
  
  <th>S.no</th>
    <th>NAME</th>
    <th>UNIT</th>
    <th>TYPE</th>
    <th>QTY</th>
    <th>GGRC PRICE</th>
    <th>FIELD TOTAL</th>
	<th>DEALER QTY</th>
	<th>DEALER AMT</th>
	<th>DEALER TOTAL </th>
		</tr></thead>
  <tbody>
  <?php 
  $query="select  cip.id,itemorder,itemname,units,standard_measure,coalesce(ggrcqty,0) ggrcqty, itemprice from cropitemsprice cip LEFT JOIN postinspection_dtl pid  ON(  cip.id= pid.item_id  and pid.filling_id=  ".$_POST["filling_id"]." )  order by cip.itemorder";
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
$master[$row["itemorder"]][]=array($row["id"],$row["units"],$row["standard_measure"],$row["ggrcqty"],$row["itemprice"],$row["ggrcqty"]*$row["itemprice"]);
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
	   echo"<td><input type='text' mid='$id' dqty='dqty' class='tiny'/></td><td><input type='text' mid='$id' dqty='damt' class='tiny'/></td><td> </td><td></td>";
	  if($i==0){
	  
	  $i=1;
	  }
	  echo "</tr>";
   }
  

   }
  ?>
  </tbody>
  </table>
 </div>
   </td></tr>
   
  <tr>
  <td >Install Charges</td><td colspan="5"><input type="text" id="installchargers"/></td> </tr>
  
  <tr><td >Total amount(Material)</td><td id="materialAmt" colspan="5"></td></tr>
  <tr><td >Vat@5.5%</td><td id="vatAmt" colspan="5"></td> </tr>
  <tr><td >Total amount(Material)+Vat@5.5%+Other charges</td><td id="totalBillAmt" colspan="5"></td> </tr>
   <tr><td colspan="6">  <input type='button' value='Calculate' onclick="talukaapproval.calculateSheet()"  /></td></tr>
  
  </table> 
 
</form>
 
</div>



</body>
</html>
