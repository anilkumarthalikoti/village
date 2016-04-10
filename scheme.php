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
<script type="text/javascript" src="js/scheme.js"></script>

</head>

<body>
 
<div class="title">Scheme Details</div>
<div class="viewport">
  <ul id="tabs">

      <li><a id="tab1">Scheme</a></li>
	   <li><a id="tab2">Sub-Schema</a></li>
      <li><a id="tab3">Component</a></li>
	   <li><a id="tab4">Sub component-1</a></li>
	      <li><a id="tab5">Sub component-2</a></li>
		     <li><a id="tab6">Sub component-3</a></li>
			    <li><a id="tab7">Sub component-4</a></li>
	     
       

</ul>
<div class="container" id="tab1C">
<form name="addScheme">
<input type="hidden" name="saveType" value="scheme"/>
<input type="hidden" name="parent_id" value="0"/>
<table class="margin-left margin-top">
<tr><td class="label">Schema name</td>
<td>:</td><td><input type="text" name="item_name" placeholder="Enter schema" /> <input type="button" value="Save" onclick="scheme.saveData('addScheme');"/></td>
</tr>
<tr><td colspan="3">
<table class="grid small">
<thead><th colspan="2">Schemes</th></thead>
<tbody>
<?php 
$query="select * from schemes where parent_id=0";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['name']."</td></tr>";
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
 
<table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="parent_id">
<option value="-1">Select</option>

<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
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
 

</tbody>
</table>

</td></tr>
</table>

</form>



</div>
<div class="container" id="tab3C">
<form name="component">
<input type="hidden" name="saveType" value="component"/>
 

<table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_selected" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="parent_id" id="sub_scheme_select">
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
<form name="subcomponent_1">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>

<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select component</td><td>:</td><td><select name="parent_id" ><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Enter sub component-1</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="button" value="Save" onclick="scheme.saveData('subcomponent_1')" /></td></tr>

<tr><td colspan="3">

<table class="grid">
<thead>
<tr>
  <th colspan="4">Sub Components-2</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>
 
</div>
 
<div class="container" id="tab5C">
<form name="subcomponent_2">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>

<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select component</td><td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr><td class="label">Select sub component-1</td><td>:</td><td><select name="parent_id" id="component_select"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Enter sub component-2</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="hidden" name="parent_id"   value="4"/><input type="button" value="Save" onclick="scheme.saveData('subcomponent_2')" /></td></tr>

<tr><td colspan="3">

<table class="grid">
<thead>
<tr>
  <th colspan="4">Sub Components-1</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>
 
</div>
 <div class="container" id="tab6C">
<form name="subcomponent_3">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updatecomponent()">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select component</td><td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr><td class="label">Select sub component-1</td><td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)" ><OPTION value="-1">Select</OPTION></select></td></tr>
<tr><td class="label">Select sub component-2</td><td>:</td><td><select name="parent_id" id="component_select"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Enter sub component-3</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="hidden" name="parent_id"   value="5"/><input type="button" value="Save" onclick="scheme.saveData('subcomponent_3')" /></td></tr>

<tr><td colspan="3">

<table class="grid">
<thead>
<tr>
  <th colspan="4">Sub Components-3</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>
 
</div>
 <div class="container" id="tab7C">
<form name="subcomponent_4">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="margin-left margin-top">
<tr><td class="label">Select scheme</td><td>:</td><td>
<select name="scheme_select" id="scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>

<?php 
$result =$conn->select("schemes",array("id","name"),array("parent_id"=>0));
foreach($result as $row)
echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select Sub scheme</td><td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select component</td><td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Select sub component-1 </td>
  <td>:</td>
<td>
<select name="subscheme_select" id="sub_scheme_select2" onchange="scheme.updateview(this)">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Select sub component-2</td>
  <td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)"><OPTION value="-1">Select</OPTION></select></td></tr>
  <tr>
  <td class="label">Select sub component-3</td>
  <td>:</td><td><select name="parent_id" id="component_select" onchange="scheme.updateview(this)"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Enter sub component-4</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="hidden" name="parent_id"   value="3"/><input type="button" value="Save" onclick="scheme.saveData('subcomponent_4')" /></td></tr>

<tr><td colspan="3">

<table class="grid">
<thead>
<tr>
  <th colspan="4">Sub Components-4</th>
</tr>
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