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
 <input type="hidden" id="selectTab" value="<?php echo $_REQUEST["viewtab"]?>"/>
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
<table class="form margin-left margin-top">
<tr><td class="label">Schema name</td>
<td>:</td><td><input type="text" name="item_name" placeholder="Enter schema" /> <input type="button" value="Save" onclick="scheme.saveData('addScheme');"/></td>
</tr>
 
</table>
<table class="grid xlarge margin">
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
</form>


</div>




<div class="container" id="tab2C">
<form name="subScheme">
<input type="hidden" name="saveType" value="sub_scheme"/>
 
<table class="form margin-left margin-top">
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
<tr><td class="label">Select Action flow</td><td>:</td><td><input type="checkbox" name="actions[]" value="A"/>Action<input type="checkbox" name="actions[]" value="P"/>Pre-inspection<input type="checkbox" name="actions[]" value="I"/>Post-inspection<input type="checkbox" name="actions[]" value="W"/>Work-order<input type="checkbox" name="actions[]" value="D"/>DC</td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onclick="scheme.saveData('subScheme')" /></td></tr>
 </table>
<table class="grid xlarge margin">
<thead>
<tr><th colspan="3">Sub schema</th></tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th></tr>

</thead>
<tbody>
 <?php 
 $query="select s1.name scheme, s2.name  subscheme from   schemes s1, schemes s2  where s1.id = s2.parent_id   and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>
</form>



</div>
<div class="container" id="tab3C">
<form name="component">
<input type="hidden" name="saveType" value="component"/>
 

<table class="form margin-left margin-top">
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
 
</table>
<table class="grid xlarge margin">
<thead>
<tr><th colspan="4">Components</th></tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th></tr>

</thead>
<tbody>
 <?php 
 $query="select s1.name scheme, s2.name  subscheme, s3.name component from   schemes s1, schemes s2, schemes s3  where s1.id = s2.parent_id  and s3.parent_id=s2.id  and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td><td>".$row["component"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>

</form>

</div>
<div class="container" id="tab4C">
<form name="subcomponent_1">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="form margin-left margin-top">
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
<tr><td class="label">Project mode</td><td>:</td><td><select name="project_mode" ><OPTION value="-1">Non-project based</OPTION>
<OPTION value="1">Project based</OPTION>
</select></td></tr>
<tr>
  <td class="label">Enter sub component-1</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="button" value="Save" onclick="scheme.saveData('subcomponent_1')" /></td></tr>

<tr><td colspan="3">

<table class="grid xlarge margin">
<thead>
<tr>
  <th colspan="5">Sub Components-1</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th><th>Sub Component-1</th></tr>

</thead>
<tbody>
  <?php 
 $query="select s1.name scheme, s2.name  subscheme, s3.name component,s4.name suc1 from   schemes s1, schemes s2, schemes s3, schemes s4  where s1.id = s2.parent_id  and s3.parent_id=s2.id and s4.parent_id= s3.id  and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td><td>".$row["component"]."</td><td>".$row["suc1"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>

</td></tr>
</table>


</form>
 
</div>
 
<div class="container" id="tab5C">
<form name="subcomponent_2">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="form margin-left margin-top">
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
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /> <input type="button" value="Save" onclick="scheme.saveData('subcomponent_2')" /></td></tr>

 </table>
<table class="grid xlarge margin">
<thead>
<tr>
  <th colspan="6">Sub Components-2</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th><th>Sc-1</th><th>Sc-2</th></tr>

</thead>
<tbody>
 <?php 
 $query="select s1.name scheme, s2.name  subscheme, s3.name component,s4.name suc1,s5.name suc2 from   schemes s1, schemes s2, schemes s3, schemes s4,schemes s5  where s1.id = s2.parent_id  and s3.parent_id=s2.id and s4.parent_id= s3.id and s5.parent_id= s4.id  and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td><td>".$row["component"]."</td><td>".$row["suc1"]."</td><td>".$row["suc2"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>

</form>
 
</div>
 <div class="container" id="tab6C">
<form name="subcomponent_3">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="form margin-left margin-top">
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
<tr><td class="label">Select sub component-1</td><td>:</td><td><select name="component_select" id="component_select" onchange="scheme.updateview(this)" ><OPTION value="-1">Select</OPTION></select></td></tr>
<tr><td class="label">Select sub component-2</td><td>:</td><td><select name="parent_id" id="component_select"><OPTION value="-1">Select</OPTION></select></td></tr>
<tr>
  <td class="label">Enter sub component-3</td>
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /> <input type="button" value="Save" onclick="scheme.saveData('subcomponent_3')" /></td></tr>

 
</table>
<table class="grid xlarge margin">
<thead>
<tr>
  <th colspan="7">Sub Components-3</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th><th>Sc-1</th><th>Sc-2</th><th>Sc-3</th></tr>

</thead>
<tbody>
 <?php 
 $query="select s1.name scheme, s2.name  subscheme, s3.name component,s4.name suc1,s5.name suc2 , s6.name suc3 from   schemes s1, schemes s2, schemes s3, schemes s4,schemes s5,schemes s6  where s1.id = s2.parent_id  and s3.parent_id=s2.id and s4.parent_id= s3.id and s5.parent_id= s4.id and s6.parent_id=s5.id and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td><td>".$row["component"]."</td><td>".$row["suc1"]."</td><td>".$row["suc2"]."</td><td>".$row["suc3"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>

</form>
 
</div>
 <div class="container" id="tab7C">
<form name="subcomponent_4">
<input type="hidden" name="saveType" value="subcomponent"/>
 <table class="form margin-left margin-top">
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
  <td>:</td><td><input type="text" name="item_name" placeholder="Enter sub component-1" /><input type="button" value="Save" onclick="scheme.saveData('subcomponent_4')" /></td></tr>

 
</table>
<table class="grid xlarge margin">
<thead>
<tr>
  <th colspan="8">Sub Components-4</th>
</tr>
<tr><th >&nbsp;</th><th >Schema</th><th >Sub schema</th><th>Component</th><th>Sc-1</th><th>Sc-2</th><th>Sc-3</th><th>Sc-4</th></tr>

</thead>
<tbody>
 <?php 
 $query="select s1.name scheme, s2.name  subscheme, s3.name component,s4.name suc1,s5.name suc2 , s6.name suc3, s7.name suc4 from   schemes s1, schemes s2, schemes s3, schemes s4,schemes s5,schemes s6,schemes s7  where s1.id = s2.parent_id  and s3.parent_id=s2.id and s4.parent_id= s3.id and s5.parent_id= s4.id and s6.parent_id=s5.id and s7.parent_id= s6.id and s1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["scheme"]."</td><td>".$row["subscheme"]."</td><td>".$row["component"]."</td><td>".$row["suc1"]."</td><td>".$row["suc2"]."</td><td>".$row["suc3"]."</td><td>".$row["suc4"]."</td></tr>";
 $i++;
 }
 
 ?>

</tbody>
</table>

</form>
 
</div>
 
</div>
</body>
</html>