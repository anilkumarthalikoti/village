<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>

<script src="js/approval.js" type="text/javascript"></script>
 
 
</head>

<body >

<form name="actions">
<div class="title"><span>Proposal</span></div>
<div class="viewport">
<ul id="tabs">
             <li><a id="tab1">Proposal Status</a></li>
           <li><a id="tab2">Proposal Action</a></li>
           
         </ul>
             <div class="container" id="tab1C">
			  

<table class="excel">
<tr>
<td>Scheme</td><td>:</td><td><select name="scheme_select" id="scheme_select" onchange="approvaljs.updatesubscheme('subscheme_select','scheme_select'); approvaljs.updateschemadetails('SCHEME')">
<option value="-1">Select</option>
<?php 
$result =$conn->select("items",array("item_id","item_name"),array("item_type"=>0));
foreach($result as $row)
echo "<option value='".$row["item_id"]."'>".$row["item_name"]."</option>";
?>
</select></td>
<td>Sub Scheme</td><td>:</td><td><select name="subscheme_select" id="subscheme_select" onchange="approvaljs.updatecomponent(); approvaljs.updateschemadetails('SUBSCHEME')"><option value="-1">Select</option></select></td>
<td>Component</td><td>:</td><td><select name="component_select" id="component_select" onchange="approvaljs.updatecrops(); approvaljs.updateschemadetails('COMPNENT')"><option value="-1">Select</option></select></td>
<td colspan="3"><input type="button" value="Show all" onclick="approvaljs.updateschemadetails('ALL');" /></td>
</tr>
<tr>
<td>Crop-1</td><td>:</td><td><select name="component_1" id="component_1"><option value="-1">Select</option></select></td>
<td>Crop-2</td><td>:</td><td><select name="component_2" id="component_2"><option value="-1">Select</option></select></td>
<td>Crop-3</td><td>:</td><td><select name="component_3" id="component_3"><option value="-1">Select</option></select></td>
<td>Crop-4</td><td>:</td><td><select name="component_4" id="component_4"><option value="-1">Select</option></select></td>
</tr>
<tr><td colspan="12">
<div id="details_schema" >
 
</div>
</td></tr>
</table>
 </div>
 
 
 
  <div class="container" id="tab2C">
  <table class="excel"><tr><td>Select</td><td>:</td><td>
  <select name="action" id="actionselect" onchange="approvaljs.search_application()" >
<option value="P">New Application</option>
<option value="I">Pre-inspection</option>
<option value="W">Work order</option>
<option value="R">Rejected</option>
</select></td><td></td></tr></table>
<table class="excel">
<tr class="hide">
<td>State</td><td>:</td><td><select name="state_selected" id="state_selected" onchange="approvaljs.updatedistrict('actions')">
<option value="-1">Select</option>
<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td>
<td>District</td><td>:</td><td><select name="district_selected" id="district_selected" onchange="approvaljs.updatetaluka('actions')">
<option value="-1">Select</option>
</select></td>
<td>Taluka</td><td>:</td><td><select name="taluka_selected" id="taluka_selected" onchange="approvaljs.updatehobli('actions')">
<option value="-1">Select</option>
</select></td>
 
</tr>
<tr  class="hide">
<td>Hobli</td><td>:</td><td><select name="hobli_selected" id="hobli_selected" onchange="approvaljs.updatevillage('actions')">
<option value="-1">Select</option>
</select></td>
<td>Village</td><td>:</td><td><select name="village_selected" id="village_selected" onchange="approvaljs.updatepanchayat('actions')">
<option value="-1">Select</option>
</select></td>
<td>Panchayat</td><td>:</td><td><select name="panchayat_selected" id="panchayat_selected">
<option value="-1">Select</option>
</select></td>
 
</tr>

<tr><td colspan="9">
<div id="actions" >
 
</div>
</td></tr>
</table>
 </div>
 
 
 
 
 
</div>
</form>
</body>
</html>