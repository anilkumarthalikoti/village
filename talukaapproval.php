<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Taluka-Approval</title>
 <style type="text/css">
 #mat_list tbody tr td:last{
  #background-color:#FCF7D8;
 }
.fielddata{
background-color:#990000;
}
.dealerdata{
background-color:#990000;
}
 </style>
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
$spacing1=0;
$spacing2=0;
$spacing3=0;
$spacing4=0;
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
$farmerland=0;
$village="";
$hobli="";
$taluka="";
$district="";
$consti="";
$landsurvaynos="";

$query="select sum(coalesce(area1,0))+sum(coalesce(area2,0))+sum(coalesce(area3,0)) preallocated from postinspection_mstr where filling_id in(select id from schemefilling where (regid,schemeid) = (select regid,schemeid from schemefilling where id=".$filling_id."))";
$result=$conn->query($query);
foreach($result as $row){
$preallocated=$row["preallocated"];
}
$query="select user.login_id,(select sum(totalland) from landdetails where regid=f.id) farmerland,pm.inspected_date,f.firstname,f.firstname_k,f.fathername,f.fathername_k,c.castname,c.castname_k,";
$query.=" s.uniquecode ,f.gender, s.item1,s.item2,s.item3,p.croparea1,p.croparea2,p.croparea3,";
$query.=" p.spacing1,p.spacing2,p.spacing3,p.spacing4,p.spacing5,p.spacing6 ,prj.name sectorname ";
 
$query.=" from schemefilling s,preinspection p,postinspection_mstr pm, farmerdetails f,casts c,schemes prj,app_login user";
$query.=" where ";
$query.="  prj.id=s.subschemeid and c.id= f.usercast and f.id=s.regid and user.id= pm.inspected_by ";
$query.=" and pm.filling_id= p.filling_id and p.filling_id=s.id and s.id=".$filling_id."";
  
$result=$conn->query($query);

foreach($result as $row){
$farmerland=$row["farmerland"];
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
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
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
	var spacing=Math.round10("<?php print $spacing1;?>",-1);
	spacing=spacing.toFixed(2);
	var selectedspacing=$("select[name='aspacing1'] option:selected").val();
	var maxamtkey="#price tr[spacingid='"+selectedspacing+"'][spacingarea='"+spacing+"']:last";
 
	var maxamt=$(maxamtkey).attr("amount");
	$("#maxamount_a1").val(maxamt);
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
   
 });
 
  </script>
 <script type='text/javascript' src="js/talukaapproval.js"></script>
 <style type="text/css">
 
 input[type='text']{
 
 border-radius: 0px;
 height:30px;
 }
 
 .mrgn-left	{
	  margin-left:30px;
  }
  
  .mrgn-right	{
	  margin-right:30px;
  } 
 
   
  .bill-bg-light	{
	background-color:#ECF3FF;
  }
  .bill-bg-dark	{
	background-color:#E1E8FF;
  }
  
  .field-bg-light	{
	background-color:#F1FDE8;
  }
  .field-bg-dark	{
	background-color:#E3FAD3;
  }
  .amnt-consi	{
	  background-color:#FCF7D8;
  }
  .txt-bold	{
	  font-weight:bold;
  }
  .txt-undrln	{
	  text-decoration:underline;
  }
  #div_mater table td{
  border:1px solid #cccccc;
  }
 </style>
 
</head>

<body>
<div class="title">Calculation sheet</div>
<div class="viewport">
 
<form name="post_inspection" >
<input type="hidden" name="filling_id" value="<?php print $filling_id;?>"/>
<input type="hidden" name="inspected_by" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
 
 <div style="width:90%">
 <div>
      <div class="modal-body">
        <br>
 <table class="table table-bordered table-condensed">
   
<tr  ><td   class="txt-bold">Logged user:</td>
<td  ><input type='text' class='form-control input-sm readonly' style="width:150px" value="<?php print $user["login_id"]?>"/> </td>

 <td  class="txt-bold" >Taluka approval date:</td>
 <td    ><input type="text" placeholder="dd/MM/yyyy" name="inspected_date " class="datepicker" style="width:120px" id="inspectiondate"/>  </td> 
 
 </tr>
 </table>
 
 <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">1) Name of Farmer:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $name?>" class="form-control input-sm"></td>
            <td class="txt-bold">2) Gender:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $gender?>" class="form-control input-sm"></td>
            <td class="txt-bold">3) Caste:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $cast?>" class="form-control input-sm"></td>
          </tr>
        </table>
    <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">4) Unique Code:</td>
            <td class="txt-bold"><input disabled type="number" value="<?php print $uniquecode?>" class="form-control input-sm"></td>
            <td class="txt-bold">5) PMKSY/CHD:</td>
            <td class="txt-bold"><input disabled type="text"  value="<?php print $sector?>" class="form-control input-sm"></td>
          </tr>
 	 </table>
   <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">6) Village:</td>
            <td class="txt-bold"><input disabled type="text"  value="<?php print $village?>"class="form-control input-sm"></td>
            <td class="txt-bold">7) Hobali:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $hobli?>" class="form-control input-sm"></td>
            <td class="txt-bold">8) Taluk:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $taluka?>" class="form-control input-sm"></td>
            <td class="txt-bold">9) Constituency:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $consti?>" class="form-control input-sm"></td>
            <td class="txt-bold">10) District:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $district?>" class="form-control input-sm"></td>
          </tr>
  </table>
 
     <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">11) Land Survey No.:</td>
            <td class="txt-bold"><input disabled type="text" value="<?php print $landsurvaynos?>" class="form-control input-sm"></td>
            <td class="txt-bold">12) Total Land holding area of farmer (hector):</td>
            <td class="txt-bold"><input disabled type="number" value="<?php print $farmerland?>" class="form-control input-sm"></td>
          </tr>
  </table>
 
         <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold bg-danger">13) Area for which subsidy availed in previous years (hector):</td>
            <td class="txt-bold bg-danger"><input type="text" class="form-control input-sm" id="preallocatedtemp" placeholder="Must enter this field"></td>
            <td class="txt-bold">14) Remaining area (hector):</td>
            <td class="txt-bold"><input disabled type="text" class="form-control input-sm"></td>
          </tr>
  </table>
 
     <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold bg-danger">15) Deduct:</td>
            <td class="txt-bold bg-danger" width="90px"><select class="form-control" id="isdeduct">
            	<option value="N">No</option>
                <option value="Y">Yes</option>
                </select>
            </td>
             
            <td class="txt-bold">Total Amount:</td>
            <td class="txt-bold"><input disabled type="number" class="form-control input-sm" id="deducationAmtView"></td>            
          </tr>
 		</table>
    <table class="table table-bordered table-condensed">
          <tr>
            <td width="15%" class="txt-bold bg-danger">16) Reason for deduction:</td>
            <td class="txt-bold bg-danger"><input type="text" class="form-control input-sm"></td>
          </tr>
 		</table>
		
		 <table class="table table-bordered table-condensed">
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
 
 
 
 </td><td><select name="aspacing2" class="fit readonly"    style="width:100px;"  >
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
 <input type="text" name="spacing6" class="tiny" value="<?php print $spacing6;?>"/> </td><td><select name="aspacing3" class="fit readonly"   style="width:100px;"   >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>
</select></td><td><input type="text" name="pspacing3" class="tiny"  value="<?php print $plants3;?>" /></td>
</tr>
 </table>
    
        <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">28) Field Inspected Officer Name and Designation:</td>
            <td class="txt-bold"><input disabled value="<?php print $inspected_by?>" type="text" class="form-control input-sm"></td>
            <td class="txt-bold">29) Date of Inspection:</td>
            <td class="txt-bold"><input disabled   value="<?php print $inspected_date?>" class="form-control input-sm"></td>            
          </tr>
	 	</table>
 
 
   </div>
    </div>

 </div>
 
  <div id="div_mater" class="margin"  >
   
 
  
  
<table class="sheet excel90" id="mat_list">
  <thead>
  <tr style="border-bottom:1px solid #FFFFFF;">
  <th>&nbsp;</th>
  <th></th>
  <th></th>
  <th></th>
  <th colspan="3"  style="border-bottom:1px solid #CCCCCC;" align="center" >AS PER FIELD </th>
  <th colspan="3"  style="border-bottom:1px solid #CCCCCC;" align="center">AS PER BILL </th>
  <th rowspan="2"   >Amount considered whichever is less</th>
  <th rowspan="2">Less Amount</th>
  </tr>
  <tr>
  
  <th >S.no</th>
    <th >NAME</th>
    <th >UNIT</th>
    <th >TYPE</th>
    <th>QTY</th>
    <th >GGRC PRICE</th>
    <th >FIELD TOTAL</th>
	<th  >DEALER QTY</th>
	<th  >DEALER AMT</th>
	<th  >DEALER TOTAL </th>
		</tr></thead>
  <tbody>
  <?php 
  $query="select  cip.id,itemorder,itemname,units,standard_measure,coalesce(ggrcqty,0) ggrcqty, itemprice,isdeduct,isvat from cropitemsprice cip LEFT JOIN postinspection_dtl pid  ON(  cip.id= pid.item_id  and pid.filling_id=  ".$_POST["filling_id"]." ) where  isvat='Y'  order by cip.itemorder";
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
$master[$row["itemorder"]][]=array($row["id"],$row["units"],$row["standard_measure"],$row["ggrcqty"],$row["itemprice"],$row["ggrcqty"]*$row["itemprice"],$row["isdeduct"],$row["isvat"]);
  }
  
  foreach ($master as $name => $values) {
  $rowheight=count($values);
   echo "<tr><td rowspan='$rowheight'>$name</td><td rowspan='$rowheight' style='width:250px;'>$itemname[$name]</td>";
   $i=0;
   foreach ($values as $val1) {
   if($i==1){
   echo"<tr>";
   }
   $id=-1;
   $col=0;
   $isdeduct='N';
   $isvat='Y';
   foreach($val1 as $val){
   if($id==-1){
   $id=$val;
   }else{
   $print=true;
   if($col==6){
   $isdeduct=$val;
   $print=false;
   }
   if($col==7){
   $print=false;
   $isvat=$val;
   }
   if($print){
   $class="";
   if($col==3 || $col==4){
   $class="field-bg-light";
   }
   if($col==5 ){
   $class="field-bg-dark";
   }
    
      echo "<td class='$class'>$val</td>";
	  }
	  }
	  $col++;
	  }
	   echo"<td class='bill-bg-light'><input type='text' mid='$id' isdeduct='$isdeduct' isvat='$isvat' dqty='dqty' class='tiny'/></td><td class='bill-bg-light'><input type='text' mid='$id' isdeduct='$isdeduct' isvat='$isvat' damt='damt' class='tiny'/></td><td class='bill-bg-dark'> </td><td class='amnt-consi'></td><td class='amnt-consi'></td>";
	  if($i==0){
	  
	  $i=1;
	  }
	  echo "</tr>";
   }
  

   }
  ?>
  </tbody>
  <tfoot>
  <tr>
             <td bgcolor="#FCE9FE" class="text-center">a</td>
             <td colspan="3" bgcolor="#FCE9FE"><strong>Total Amount (1 to 15)</strong></td>
             <td bgcolor="#FCE9FE">&nbsp;</td>
             <td bgcolor="#FCE9FE">&nbsp;</td>
             <td bgcolor="#FCE9FE"><input disabled type="text" id="fieldtotal" ></td>
             <td bgcolor="#FCE9FE">&nbsp;</td>
             <td bgcolor="#FCE9FE">&nbsp;</td>
             <td bgcolor="#FCE9FE"><input disabled type="text" id="dealertotal" ></td>
             <td bgcolor="#FCE9FE"><input disabled type="text" id="materialAmt" ></td>
			 <td class="txt-bold bg-danger" id="tdlessamt"></td>
           </tr>
           <tr>
             <td bgcolor="#E8E8E8" class="text-center">b</td>
             <td colspan="3" bgcolor="#E8E8E8"><strong>Vat at 5.5%</strong></td>
             <td bgcolor="#E8E8E8">&nbsp;</td>
             <td bgcolor="#E8E8E8">&nbsp;</td>
             <td bgcolor="#E8E8E8"><input disabled type="text" id="fieldVat" ></td>
             <td bgcolor="#E8E8E8">&nbsp;</td>
             <td bgcolor="#E8E8E8">&nbsp;</td>
             <td bgcolor="#E8E8E8"><input disabled type="text" id="dealerVat" ></td>
             <td bgcolor="#E8E8E8"><input disabled type="text" id="totalVatAmt" ></td>
		     <td class="txt-bold bg-danger" id="tdlessamt90"></td>
           </tr>
           <tr>
             <td bgcolor="#E1FFFF" class="text-center">I</td>
             <td colspan="3" bgcolor="#E1FFFF"><strong>Total (a+b)</strong></td>
             <td bgcolor="#E1FFFF">&nbsp;</td>
             <td bgcolor="#E1FFFF">&nbsp;</td>
             <td bgcolor="#E1FFFF"><input disabled type="text" id="totalFieldVat" ></td>
             <td bgcolor="#E1FFFF">&nbsp;</td>
             <td bgcolor="#E1FFFF">&nbsp;</td>
             <td bgcolor="#E1FFFF"><input disabled type="text" id="dealerTotalVat" ></td>
             <td bgcolor="#E1FFFF"><input disabled type="text" id="totalBillAmt" ></td>
		     <td class="txt-bold bg-danger" ></td>
           </tr>
		    <?php 
  $query="select  cip.id,itemorder,itemname,units,standard_measure,coalesce(ggrcqty,0) ggrcqty, itemprice,isdeduct,isvat from cropitemsprice cip LEFT JOIN postinspection_dtl pid  ON(  cip.id= pid.item_id  and pid.filling_id=  ".$_POST["filling_id"]." ) where  isvat='N'  order by cip.itemorder";
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
$master[$row["itemorder"]][]=array($row["id"],$row["units"],$row["standard_measure"],$row["ggrcqty"],$row["itemprice"],$row["ggrcqty"]*$row["itemprice"],$row["isdeduct"],$row["isvat"]);
  
  }
  
  foreach ($master as $name => $values) {
  $rowheight=count($values);
   echo "<tr><td rowspan='$rowheight'>$name</td><td rowspan='$rowheight' style='width:250px;'>$itemname[$name]</td>";
   $i=0;
   foreach ($values as $val1) {
   if($i==1){
   echo"<tr>";
   }
   $id=-1;
   $col=0;
   $isdeduct='N';
   $isvat='Y';
   foreach($val1 as $val){
  
   if($id==-1){
   $id=$val;
   }else{
   $print =true;
   if($col==6){
   $isdeduct=$val;
     $print =false;
   }
   if($col==7){
   $isvat=$val;
     $print =false;
   }
   if($print){
      
   $class="";
   if($col==3 || $col==4){
   $class="field-bg-light";
   }
   if($col==5 ){
   $class="field-bg-dark";
   }
    
      echo "<td class='$class'>$val</td>";
	  }
	  }
	   $col++;
	  }
	   echo"<td class='bill-bg-light'><input type='text' mid='$id' isdeduct='$isdeduct' isvat='$isvat' dqty='dqty' class='tiny'/></td><td class='bill-bg-light'><input type='text' mid='$id' isdeduct='$isdeduct' isvat='$isvat' damt='damt' class='tiny'/></td><td class='bill-bg-dark'> </td><td class='amnt-consi'></td><td class='amnt-consi'></td>";
	  if($i==0){
	  
	  $i=1;
	  }
	  echo "</tr>";
   }
  

   }
  ?>
           <tr>
             <td bgcolor="#FCFADA" class="text-center">&nbsp;</td>
             <td colspan="3" bgcolor="#FCFADA"><strong>Grand Total (I+II+III)</strong></td>
             <td bgcolor="#FCFADA">&nbsp;</td>
             <td bgcolor="#FCFADA">&nbsp;</td>
             <td bgcolor="#FCFADA"><input disabled type="text" ></td>
             <td bgcolor="#FCFADA">&nbsp;</td>
             <td bgcolor="#FCFADA">&nbsp;</td>
             <td bgcolor="#FCFADA"><input disabled type="text" ></td>
             <td bgcolor="#FCFADA"><input disabled type="text" ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">&nbsp;</td>
             <td colspan="4"><strong>Maximum Cost of Installation as per guidlines</strong></td>
             <td colspan="2" class="text-center"><strong>Spacing</strong></td>
             <td colspan="3" class="text-center"><select name="aspacing1" class="fit readonly"    style="width:100px;"   >
<option value="-1">Select</option>
<?php 
$result=$conn->select("spacing",array("id","spacing","startfrom","endsat"));
foreach($result as $row){
echo "<option value='".$row["id"]."' startfrom=".$row["startfrom"]." endsat=".$row["endsat"].">".$row["spacing"]."</option>";
}
?>

</select></td>
             <td><input disabled type="text" id="maxamount_a1"></td>
			 <td></td>
           </tr>
           <tr>
             <td bgcolor="#F8DAA3" class="text-center">&nbsp;</td>
             <td colspan="9" bgcolor="#F8DAA3"><strong>Amount considered for subsidy (whichever is less) (round down)</strong></td>
             <td bgcolor="#F8DAA3"><input disabled type="text" ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">A</td>
             <td colspan="9">Total land holding  of farmer (in hector)</td>
             <td><input disabled type="text" id="totalLandHolding" value="<?php echo $farmerland?>" ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">B</td>
             <td colspan="9">Total area for which sibsidy claimed in previous years (in hector)</td>
             <td><input disabled type="text" id="preAllocatedLand" ></td>
			 
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">C</td>
             <td colspan="9">Drip installed area in present year (in hector)</td>
             <td><input disabled type="text" id="presentLand" ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">D</td>

             <td colspan="9">Area considered at 90% subsidy (up to 2 hector)</td>
             <td><input disabled type="text" id="land90" ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">E</td>
             <td colspan="9">Subsidy amount at 90% as per guidlines</td>
             <td><input disabled type="text" id='land90subsidy' ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">F</td>
             <td colspan="9">Area considered at 50% subsidy (more than 2 hector and up to 5 hector)</td>
             <td><input disabled type="text" id='land50' ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">G</td>
             <td colspan="9">Subsidy amount at 50% as per guidlines</td>
             <td><input disabled type="text" id='land50subsidy' ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">H</td>
             <td colspan="9" bgcolor="#B5FF6A">Total (E+G)</td>
             <td bgcolor="#B5FF6A"><input disabled type="text" id='totalSubsidy' ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">I</td>
             <td>Less if any</td>
             <td colspan="8"><input disabled type="text"  placeholder="reason for less"></td>
             <td><input disabled type="text" id='lessAmount' ></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">J</td>
             <td colspan="9" bgcolor="#B5FF6A">Amount recommended for Subsidy (H-I)</td>
             <td bgcolor="#B5FF6A"><input disabled type="text" id='avalibleSubsidy'></td>
			 <td></td>
           </tr>
           <tr>
             <td class="text-center">K</td>
             <td>Amount in words</td>
             <td colspan="10"><input disabled type="text" id='amountinwords' ></td>
            </tr>       
  <tr><td colspan="12"> <input type='button' value='Calculate' onclick="talukaapproval.calculateSheet()"  /></td></tr>
  </tfoot>
  </table>
 </div>
    
 
</form>
 
</div>
<div CLASS="hide">
<table id="price">
<?php 
$query="SELECT s.spacing, s.id, si.spacing_area, si.amount FROM  spacing_installdetails si, spacing s WHERE s.id = si.spacingid ORDER BY s.id, si.amount";
$result  =$conn->query($query);
foreach($result as $row){
echo "<tr spacingid='".$row['id']."' spacingarea='".$row['spacing_area']."' amount='".$row['amount']."'   ><td>".$row['id']."</td><td>".$row['spacing']."</td><td>".$row['spacing_area']."</td><td>".$row['amount']."</td></tr>";
}
?>
</table>

</div>


</body>
</html>
