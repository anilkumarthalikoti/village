<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>

<script src="js/approval.js" type="text/javascript"></script>
 
 
</head>

<body >
<?php 
session_start();
require "server/app_connector.php";
$conn=$database;
 
?>
<div class="title"><span>Proposal</span></div>
<div class="viewport">
<ul id="tabs">
             <li><a id="tab1">Details</a></li>
           <li><a id="tab2">Action</a></li>
           
         </ul>
             <div class="container" id="tab1C">
<table>
<tr>
<td>Scheme</td><td>:</td><td><select name="scheme_select" id="scheme_select" onchange="approvaljs.updatesubscheme('subscheme_select','scheme_select')">
<option value="-1">Select</option>
<?php 
$result =$conn->select("items",array("item_id","item_name"),array("item_type"=>0));
foreach($result as $row)
echo "<option value='".$row["item_id"]."'>".$row["item_name"]."</option>";
?>
</select></td>
<td>Sub Scheme</td><td>:</td><td><select name="subscheme_select" id="subscheme_select" onchange="approvaljs.updatecomponent()"><option value="-1">Select</option></select></td>
<td>Component</td><td>:</td><td><select name="component_select" id="component_select" onchange="approvaljs.updatecrops()"><option value="-1">Select</option></select></td>
<td colspan="3"><input type="button" value="Show all" onclick="approvaljs.updateschemadetails('ALL');" /></td>
</tr>
<tr>
<td>Crop-1</td><td>:</td><td><select name="component_1" id="component_1"><option value="-1">Select</option></select></td>
<td>Crop-2</td><td>:</td><td><select name="component_2" id="component_2"><option value="-1">Select</option></select></td>
<td>Crop-3</td><td>:</td><td><select name="component_3" id="component_3"><option value="-1">Select</option></select></td>
<td>Crop-4</td><td>:</td><td><select name="component_4" id="component_4"><option value="-1">Select</option></select></td>
</tr>
<tr><td colspan="3">
<div >

</div>
</td></tr>
</table>
 </div>
 
 
 
  <div class="container" id="tab1C">
<table>
<tr>
<td>Scheme</td><td>:</td><td><select name="scheme_select" id="scheme_select"></select></td>
<td>Sub Scheme</td><td>:</td><td><select name="subscheme_select" id="subscheme_select"></select></td>
<td>Component</td><td>:</td><td><select name="component_select" id="component_select"></select></td>
<td colspan="3"></td>
</tr>
<tr>
<td>Crop-1</td><td>:</td><td><select name="component_1" id="component_1"></select></td>
<td>Crop-2</td><td>:</td><td><select name="component_2" id="component_2"></select></td>
<td>Crop-3</td><td>:</td><td><select name="component_3" id="component_3"></select></td>
<td>Crop-4</td><td>:</td><td><select name="component_4" id="component_4"></select></td>
</tr>

</table>
 </div>
 
 
 
 
 
 
</div>
</body>
</html>