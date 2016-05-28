<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sanction-Approval</title>
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
	var area=Math.round10("<?php print $area1;?>",-1);
	area=area.toFixed(2);
	$("[name='area1']").val(area);
	var selectedspacing=$("select[name='aspacing1'] option:selected").val();
	var maxamtkey="#price tr[spacingid='"+selectedspacing+"'][spacingarea='"+area+"']";
 
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
   $("input[damt]").blur(function(){
   talukaapproval.calculateSheet();
   });
   $("input[dqty]").blur(function(){
   talukaapproval.calculateSheet();
   });
   
 });
 
  </script>
 <script type='text/javascript' src="js/sanctionorder.js"></script>
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
 
<form name="talukaapproval_form" >
<input type="hidden" form-field='Y' name="filling_id" value="<?php print $filling_id;?>"/>
<input type="hidden" name="approvedby" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
<input type="hidden" name="approvedamount"/>
 
 <div style="width:90%">
 <div>
      <div class="modal-body">
        <br>
 <table class="table table-bordered table-condensed">
   
<tr  ><td   class="txt-bold">Logged user:</td>
<td  ><input type='text' class='form-control input-sm readonly' style="width:150px" value="<?php print $user["login_id"]?>"/> </td>

 <td  class="txt-bold" >Sanction approval date:</td>
 <td    ><input type="text" placeholder="dd/MM/yyyy" name="approveddate" class="datepicker" style="width:120px" id="approveddate"/>  </td> 
 
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
 
  		<table class="table table-bordered table-condensed">
          <tr>            
            <td class="txt-bold">26) Company:</td>
            <td class="txt-bold">
            	<select disabled class="form-control input-sm">
                	<option>Jain Irrigation Pvt Ltd.</option>
	            </select>
            </td>
            <td class="txt-bold">27) Dealer:</td>
            <td class="txt-bold">
            	<select disabled class="form-control input-sm">
                	<option>Mahalakshmi Enterprises</option>
	            </select>
            </td>
          </tr>
	 	</table>
        
        <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">25) Drip Installed Date:</td>
            <td class="txt-bold"><input disabled type="date" class="form-control input-sm"></td>
            <td class="txt-bold bg-danger">26) Bill No.:</td>
            <td class="txt-bold bg-danger"><input type="text" form-field='Y' name="billno" class="form-control input-sm"></td>
            <td class="txt-bold bg-danger">27) Bill Amount</td>
            <td class="txt-bold bg-danger"><input form-field='Y' type="text" name="billamount" class="form-control input-sm"></td>
          </tr>
	 	</table>
        
  <table class="table table-bordered table-condensed">
          <tr>
            <td class="txt-bold">25) Sanction Order No.:</td>
            <td class="txt-bold"><input disabled type="number" class="form-control input-sm"></td>
            <td class="txt-bold">26) Sanctioned Date.:</td>
            <td class="txt-bold"><input disabled type="date" class="form-control input-sm"></td>
            <td class="txt-bold">27) Taluk Approved Amount:</td>
            <td class="txt-bold"><input disabled type="number" class="form-control input-sm"></td>
            <td class="txt-bold bg-danger">27) Sanctioned Amount:</td>
            <td class="txt-bold bg-danger"><input form-field='Y' name="sanctionamt" type="number" class="form-control input-sm"></td>
          </tr>
	 	</table>
        
    <table class="table table-bordered table-condensed">
      <tr>
        <td class="txt-bold bg-danger">25) 1st Installment at %:</td>
        <td width="60px" class="txt-bold bg-danger"><input form-field='Y' type="text" name="installment_1" value="85" class="form-control input-sm"></td>
        <td class="txt-bold">26) Amount:</td>
        <td class="txt-bold"><input disabled type="number" class="form-control input-sm"></td>
        <td class="txt-bold">27) 2nd Installment at %:</td>
        <td width="60px" class="txt-bold bg-danger"><input type="text" form-field='Y' name="installment_2" value="15" class="form-control input-sm"></td>
        <td class="txt-bold bg-danger">27) Amount:</td>
        <td class="txt-bold"><input disabled type="number" class="form-control input-sm"></td>
        <td class="txt-bold">27) Total Amount:</td>
        <td class="txt-bold"><input disabled type="number" class="form-control input-sm"></td>
      </tr>
    </table>
    
    <table class="table table-bordered table-condensed bg-danger">
      <tr>
        <td width="130px" class="txt-bold">25) Reference-1:</td>        
        <td class="txt-bold"><input form-field='Y' name="ref_1" type="text" class="form-control input-sm"></td>
      </tr>
      <tr>
        <td class="txt-bold">25) Reference-2:</td>        
        <td class="txt-bold"><input form-field='Y' name="ref_2" type="text" class="form-control input-sm"></td>
      </tr>
      <tr>
        <td class="txt-bold">25) Reference-3:</td>        
        <td class="txt-bold"><input form-field='Y' name="ref_3" type="text" class="form-control input-sm"></td>
      </tr>
      <tr>
        <td class="txt-bold">25) Reference-4:</td>        
        <td class="txt-bold"><input form-field='Y' name="ref_4" type="text" class="form-control input-sm"></td>
      </tr>
    </table>
   <input type="button" value="Save" onclick="sanctionorder.sanctiondetails()"/>
 </div>
    
 
</form>
 
</div>
 
</div>


</body>
</html>
