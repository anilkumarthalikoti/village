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
  
  $("#div_mater").pivot($("#mat_list"), 
        { 
            rows: ["NAME","UNIT","TYPE","QTY","GGRC PRICE","FIELD TOTAL","DEALER QTY","DEALER AMT",,"DEALER TOTAL","AMOUNT"] 
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
<ul id="tabs">

      <li><a id="tab1">Post inspection details </a></li>
	   <li><a id="tab2">Calculation sheet</a></li>
	    <li class="hide"><a id="tab3">Subcd</a></li>
      
	     
       

</ul>
 <div class="container" id="tab1C">
  <table class="xlarge form">
   
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td>  
 <td class="label small">Taluka approval date</td><td class="tiny">:</td><td><input type="text" placeholder="dd/MM/yyyy" name="inspected_date" class="datepicker" id="inspectiondate"/>  </td> </tr>
 <tr>
 <td class="labelh right">Name</td>
 <td class="labelhx">:<?php print $name?></td>
 <td class="labelh right">Gender</td>
 <td class="labelhx">:<?php print $gender?></td>
 <td class="labelh right">Cast</td>
  <td class="labelh right">:<?php print $cast?></td>
 </tr>
  <tr>
   <td class="labelh">Sector</td>
 <td class="labelhx">:<?php print $sector?></td>
 <td class="labelh">Unicode</td>
 <td class="labelhx">:<?php print $uniquecode?></td>

 <td class="labelh"></td>
 <td class="labelh">&nbsp;</td>
 </tr>
  <tr>
 <td class="labelh">Inspected by</td>
 <td class="labelhx">:<?php print $inspected_by?></td>
  <td class="labelh">Inspection date</td>
 <td class="labelhx">:<?php print $inspected_date?></td>
 <td class="labelh">&nbsp;</td>

 <td class="labelh">&nbsp;</td>
 </tr>
<tr class="labelh"><td></td>
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
</table></div>
<div class="container" id="tab2C">
<table class="excel90 margin form">


  <tr><td >
  <div  >
  <div id="div_mater">
  <!--Calculation sheet-->
  </div>
  
  
  </div>
  </td><td valign="top">
  <table style="width:400px;" border="1"> <tr><td >Transportation</td><td><input type="text" id="transportationchargers"/></td></tr>
  <tr>
  <td >Install Charges</td><td><input type="text" id="installchargers"/></td> </tr>
  
  <tr><td >Total amount(Material)</td><td id="materialAmt" ></td></tr>
  <tr><td >Vat@5.5%</td><td id="vatAmt"></td> </tr>
  <tr><td >Total amount(Material)+Vat@5.5%+Other charges</td><td id="totalBillAmt"></td> </tr>
   <tr><td colspan="2">  <input type='button' value='Calculate' onclick="talukaapproval.calculateSheet()"  /></td></tr>
  
  </table></td></tr>


</table>

 </div>
</form>
 
</div>


<table class="form_grid xlarge margin hide" id="mat_list">
  <thead><tr>
    <th>NAME</th>
    <th>UNIT</th>
    <th>TYPE</th>
    <th>QTY</th>
    <th>GGRC PRICE</th>
    <th>FIELD TOTAL</th>
	<th>DEALER QTY</th>
	<th>DEALER AMT</th>
	<th>DEALER TOTAL </th>
		<th>AMOUNT</th>
  </tr></thead>
  <tbody>
  <?php 
  $query="select itemname,units,standard_measure,coalesce(ggrcqty,0) ggrcqty, itemprice from cropitemsprice cip LEFT JOIN postinspection_dtl pid  ON(  cip.id= pid.item_id  and pid.filling_id=  ".$_POST["filling_id"]." )  ";
$result=$conn->query($query);
$sno=1;
foreach($result as $row){
$tr="<tr> <td>param_1</td><td>param_2</td><td>param_3</td><td>param_4</td><td>param_5</td><td>param_6</td><td></td><td></td><td></td><td></td></tr>";
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


</body>
</html>
