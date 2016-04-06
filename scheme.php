<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="js/scheme.js"></script>

</head>

<body>
<?php 
session_start();
require "server/app_connector.php";
$conn=$database;
 
?>
<div class="title">Scheme Details</div>
<div class="viewport">
  <ul id="tabs">

      <li><a id="tab1">Scheme</a></li>
	   <li><a id="tab2">Sub-Schema</a></li>
      <li><a id="tab3">Component</a></li>
	   <li><a id="tab4">Items</a></li>
	     
       

</ul>
<div class="container" id="tab1C">
<form name="addScheme">
<input type="hidden" name="saveType" value="scheme"/>
<input type="hidden" name="item_type" value="0"/>
<table class="margin-left margin-top">
<tr><td class="label">Schema name</td>
<td>:</td><td><input type="text" name="item_name" placeholder="Enter schema" /> <input type="button" value="Save" onclick="scheme.saveData('addScheme');"/></td>
</tr>
<tr><td colspan="3">
<table class="grid small">
<thead><th colspan="2">Schemes</th></thead>
<tbody>
<?php 
$query="select * from items where item_type=0";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['item_name']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>


</td></tr>
</table>

</form>


</div>




<div class="container" id="tab2C">
<form name="subScheme">
<input type="hidden" name="saveType" value="sub_scheme"/>
<input type="hidden" name="item_type" value="1"/>
<table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select">
<option value="-1">Select</option>

<?php 
$result =$conn->select("items",array("item_id","item_name"),array("item_type"=>0));
foreach($result as $row)
echo "<option value='".$row["item_id"]."'>".$row["item_name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Enter sub scheme</td><td>:</td><td><input type="text" name="item_name" placeholder="Enter sub-schema" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onclick="scheme.saveData('subScheme')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="3">Sub schema</th></tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th></tr>

</thead>
<tbody>
<?php 
$query="select a.item_id,a.item_name,(select b.item_name from items b where b.item_id=m.subschemeid ) subitem from items a ,subschemes m where m.schemeid= a.item_id and a.item_type=0";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr scheme='".$row['item_id']."'><td>".$rowid."</td><td>".$row['item_name']."</td><td>".$row['subitem']."</td></tr>";
$rowid++;
}
?>

</tbody>
</table>

</td></tr>
</table>

</form>



</div>
<div class="container" id="tab3C">
<form name="component">
<input type="hidden" name="saveType" value="component"/>
<input type="hidden" name="item_type" value="2"/>


<table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_selected" onchange="scheme.updatesubscheme('sub_scheme_select','scheme_selected')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("items",array("item_id","item_name"),array("item_type"=>0));
foreach($result as $row)
echo "<option value='".$row["item_id"]."'>".$row["item_name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter component</td><td>:</td><td><input type="text" name="item_name" placeholder="Enter Component" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onclick="scheme.saveData('component')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Components</th></tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>

</div>
<div class="container" id="tab4C">
<form name="subcomponent">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_select2" onchange="scheme.updatesubscheme('sub_scheme_select2','scheme_select2')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("items",array("item_id","item_name"),array("item_type"=>0));
foreach($result as $row)
echo "<option value='".$row["item_id"]."'>".$row["item_name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updatecomponent()">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select component</td><td>:</td><td><select name="component_select" id="component_select"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr><td class="label">Enter component</td><td>:</td><td><input type="text" name="item_name" placeholder="Enter Item" /></td></tr>
<tr><td class="label">Select item type</td><td>:</td><td>

<input type="radio" name="item_type" checked="checked" value="3"/>Item-1
<input type="radio" name="item_type"   value="4"/>Item-2
<input type="radio" name="item_type"   value="5"/>Item-3
<input type="radio" name="item_type"  value="6"/>Item-4

</td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onclick="scheme.saveData('subcomponent')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Components</th></tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>
 
</div>
 

</div>
</body>
</html>