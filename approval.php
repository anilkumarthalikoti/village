<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
 <?php
require "interceptor.php";
require "server/app_connector.php";
$conn = $database;
$user=$_SESSION["logged_in"];
?>

<script src="js/approval.js" type="text/javascript"></script>
 
 
</head>

<body >

<form name="actions">
<div class="title"><span>Proposal</span></div>
<div class="viewport">
<ul id="tabs" style="margin:0;">
             <li><a id="tab1">Proposal Status</a></li>
           <li><a id="tab2">Proposal Action</a></li>
           
         </ul>
             <div class="container" id="tab1C" style="margin:0">
			  

<table class="form excel90"  style="margin:0; padding:0"  >
<tr>
<td>Scheme</td><td>:</td><td><select name="scheme_select" id="scheme_select" tabid="1" onchange="approvaljs.updateview(this); approvaljs.updateschemadetails();">
<option value="-1">Select</option>
<?php
$result = $conn->select("schemes", array("id", "name"), array("parent_id" => 0));
foreach ($result as $row)
    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
?>
</select></td>
<td>Sub Scheme</td><td>:</td><td><select name="subscheme_select" tabid="2" id="subscheme_select" onchange="approvaljs.updateview(this); "><option value="-1">Select</option></select></td>
<td>Component</td><td>:</td><td><select name="component_select" tabid="3" id="component_select" onchange="approvaljs.updateview(this); "><option value="-1">Select</option></select></td>
<td colspan="3"><input type="button" value="Show all"    /></td>
</tr>
<tr class="hide">
<td>Crop-1</td><td>:</td><td><select name="component_1" tabid="4" id="component_1"  ><option value="-1">Select</option></select></td>
<td>Crop-2</td><td>:</td><td><select name="component_2" tabid="5" id="component_2"><option value="-1">Select</option></select></td>
<td>Crop-3</td><td>:</td><td><select name="component_3" tabid="6" id="component_3"><option value="-1">Select</option></select></td>
<td>Crop-4</td><td>:</td><td><select name="component_4" tabid="7" id="component_4"><option value="-1">Select</option></select></td>
</tr>
<tr><td colspan="12" style="border:0px; margin:0; padding:0;">
<div id="details_schema" style="zoom:97%"  >
 
</div>
</td></tr>
</table>
 </div>
 
 
 
  <div class="container" id="tab2C">
  <table class="excel90 form"  >
  <tr>
<td>Scheme</td><td>:</td><td><select name="scheme_select1" id="scheme_select1" tabid="1" onchange="approvaljs.updateview(this); approvaljs.updateschemadetails();">
<option value="-1">Select</option>
<?php
$result = $conn->select("schemes", array("id", "name"), array("parent_id" => 0));
foreach ($result as $row)
    echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
?>
</select></td>
<td>Sub Scheme</td><td>:</td><td><select name="subscheme_select1" tabid="2" id="subscheme_select1" onchange="approvaljs.updateview(this); "><option value="-1">Select</option></select></td>
<td>Component</td><td>:</td><td><select name="component_select1" tabid="3" id="component_select1" onchange="approvaljs.updateview(this); "><option value="-1">Select</option></select></td>
<td colspan="3"><input type="button" value="Show all"    /></td>
</tr>
<tr class="hide">
<td>Crop-1</td><td>:</td><td><select name="component_11" tabid="4" id="component_11"  ><option value="-1">Select</option></select></td>
<td>Crop-2</td><td>:</td><td><select name="component_21" tabid="5" id="component_21"><option value="-1">Select</option></select></td>
<td>Crop-3</td><td>:</td><td><select name="component_31" tabid="6" id="component_31"><option value="-1">Select</option></select></td>
<td>Crop-4</td><td>:</td><td><select name="component_41" tabid="7" id="component_41"><option value="-1">Select</option></select></td>
</tr>
  <tr><td >Status</td><td>:</td>
  <td colspan="10">
  <select name="_application" onchange="approvaljs.search_action()">
   <option >--Select--</option>
  <option value="1">New applictions</option>
  <option value="-1">TA  reject</option>
  <option value="2">Yet to forward RSK</option>
  <option value="4">Forwarded to RSK</option>
  <option value="5">Pending Preinpection</option>
  <option value="6">Forwarded to TA </option>
 
  
  </select>
  
   
  
  From:<input type="text" name="startdate" class="datepicker" id="date1"  /> To: <input type="text" id="date2" class="datepicker" name="enddate"  />
  </td></tr> 
<tr class="hide">
<td>State</td><td>:</td><td><select name="state_selected" id="state_selected" onchange="approvaljs.updatedistrict('actions')">
<option value="-1">Select</option>
<?php
$result = $conn->select("states", array(
    "id",
    "state_name",
    "state_name_k"), array("item_type" => 0));
foreach ($result as $row)
    echo "<option   value='" . $row["id"] . "'>" . $row["state_name"] . "/" . $row["state_name_k"] .
        "</option>";
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

<tr><td colspan="12" style="border:0px;">
<div id="actions" >
 
</div>
</td></tr>
</table>
 </div>
 
 
 
 
 
</div>
</form>
</body>
</html>