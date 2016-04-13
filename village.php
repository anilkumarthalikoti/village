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
<script type="text/javascript" src="js/village.js"></script>
 
</head>

<body>
 
<div class="title">Location Details</div>
<div class="viewport">
<span></span>
  <ul id="tabs">

      <li><a id="tab1">State</a></li>
	   <li><a id="tab2">District</a></li>
      <li><a id="tab3">Taluka</a></li>
	  <li><a id="tab4">Constituency</a></li>
	   <li><a id="tab5">Hobli</a></li>
	  	    <li><a id="tab6">Panchayat</a></li>
		<li><a id="tab7">Village</a></li>
	     
       

</ul>
<div class="container" id="tab1C">
<form name="addState">
<input type="hidden" name="saveType" value="state"/>
<input type="hidden" name="item_type" value="0"/>
<table class="form margin-left margin-top">
<tr><td class="label">State</td>
<td>:</td><td><input type="text" name="state_name" placeholder="Enter state" /> <input type="text" alt="ka" name="state_name_ka" id="s1"/><input type="button" value="Save" onClick="states.saveData('addState');"/></td>
</tr>
 
</table>
<table class="grid xlarge margin" grid='addState'>
<thead><th colspan="3">State</th></thead>
<tbody>
<?php 
$query="select * from states where item_type=0";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>
</form>


</div>




<div class="container" id="tab2C">
<form name="district">
<input type="hidden" name="saveType" value="district"/>
<input type="hidden" name="item_type" value="1"/>
<table class=" form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Enter district</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter district" /><input type="text" name="state_name_ka" placeholder="Enter district" alt="ka" id="s2" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('district')" /></td></tr>
 
</table>
<table class="grid xlarge margin" grid='district'>
<thead>
<tr><th colspan="3">Districts</th></tr>


</thead>
<tbody>
<?php 
$query="select * from states where item_type=1";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?> 

</tbody>
</table>
</form>



</div>
<div class="container" id="tab3C">
<form name="taluka">
<input type="hidden" name="saveType" value="taluka"/>
<input type="hidden" name="item_type" value="2"/>


<table class=" form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updateview('taluka','state_selected','district','district_selected')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr>
  <td class="label">Select district</td>
  <td>:</td>
<td>
<select name="district_selected" id="district_selected">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter taluka</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter taluka" /><input id="s3" type="text" name="state_name_ka" placeholder="Enter taluka" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('taluka')" /></td></tr>
 
</table>
<table class="grid margin xlarge" grid='taluka'>
<thead>
<tr><th colspan="4">Taluka</th></tr>
 
</thead>
<tbody>
 
<?php 
$query="select * from states where item_type=2";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>

</form>

</div>
<div class="container" id="tab4C">
<form name="constituency">
<input type="hidden" name="saveType" value="constituency"/>
<input type="hidden" name="item_type" value="3"/>


<table class=" form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updateview('constituency','state_selected','district','district_selected')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr>
  <td class="label">Select district</td>
  <td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updateview('constituency','district_selected','taluka','taluka_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select taluka</td><td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected">
<option value="-1">Select</option>
 
</select></td></tr>

<tr>
  <td class="label">Enter constituency </td>
  <td>:</td><td><input type="text" name="state_name" placeholder="Enter constituency" /><input type="text" name="state_name_ka" placeholder="Enter constituency" alt="ka" id="s4" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('constituency')" /></td></tr>
 
</table>

<table class="grid margin xlarge" grid="constituency">
<thead>
<tr>
  <th colspan="4"><span class="label">Constituency</span></th>
</tr>
 
</thead>
<tbody>
 
<?php 
$query="select * from states where item_type=3";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>
</form>

</div>
 




<div class="container" id="tab5C">
<form name="hobli">
<input type="hidden" name="saveType" value="hobli"/>
<input type="hidden" name="item_type" value="4"/>


<table class="form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updateview('hobli','state_selected','district','district_selected')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr>
  <td class="label">Select district</td>
  <td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updateview('hobli','district_selected','taluka','taluka_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Select taluka</td>
  <td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected" onChange="states.updateview('hobli','taluka_selected','constituency','constituency_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select constituency</td>
<td>:</td>
<td>
<select name="constituency_selected" id="constituency_selected">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Enter hobli </td>
  <td>:</td><td><input type="text" name="state_name" placeholder="Enter hobli" /><input type="text" name="state_name_ka" placeholder="Enter hobli" alt="ka" id="s5" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('hobli')" /></td></tr>
 
</table>
<table class="grid margin xlarge" grid="hobli">
<thead>
<tr>
  <th colspan="4">Hobli</th>
</tr>
 

</thead>
<tbody>
 
<?php 
$query="select * from states where item_type=4";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>

</form>

</div>
 


<div class="container" id="tab6C">
<form name="panchaitay">
<input type="hidden" name="saveType" value="panchaitay"/>
<input type="hidden" name="item_type" value="5"/>


<table class=" form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updateview('panchaitay','state_selected','district','district_selected');">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updateview('panchaitay','district_selected','taluka','taluka_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select Taluka</td><td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected" onChange="states.updateview('panchaitay','taluka_selected','constituency','constituency_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select constituency</td>
<td>:</td>
<td>
<select name="constituency_selected" id="constituency_selected" onChange="states.updateview('panchaitay','constituency_selected','hobli','hobli_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Select hobli </td>
  <td>:</td>
<td>
<select name="hobli_selected" id="hobli_selected" >
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter panchaitay</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter panchaitay" /><input type="text" name="state_name_ka" placeholder="Enter panchaitay" alt="ka" id="s6" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('panchaitay')" /></td></tr>
<tr><td colspan="3">



</td></tr>
</table>

<table class="grid margin xlarge" grid="panchaitay">
<thead>
<tr><th colspan="3">Panchayat</th></tr>
 
</thead>
<tbody>
 
<?php 
$query="select * from states where item_type=5";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>
</form>

</div>
 


<div class="container" id="tab7C">
<form name="village">
<input type="hidden" name="saveType" value="village"/>
<input type="hidden" name="item_type" value="6"/>


<table class="form margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updateview('village','state_selected','district','district_selected');">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr>
  <td class="label">Select district</td>
  <td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updateview('village','district_selected','taluka','taluka_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Select taluka</td>
  <td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected" onChange="states.updateview('village','taluka_selected','constituency','constituency_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select constituency</td>
<td>:</td>
<td>
<select name="constituency_selected" id="constituency_selected" onChange="states.updateview('village','constituency_selected','hobli','hobli_selected');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr>
  <td class="label">Select hobli </td>
  <td>:</td>
<td>
<select name="hobli_selected" id="hobli_selected" onChange="states.updateview('village','hobli_selected','panchaitay','panchaitay_selected');">
<option value="-1">Select</option>
 
</select></td></tr>

<tr>
  <td class="label">Select panchayat </td>
  <td>:</td>
<td>
<select name="panchaitay_selected" id="panchaitay_selected" >
<option value="-1">Select</option>
 
</select></td></tr>

<tr><td class="label">Enter village</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter village" /><input type="text" name="state_name_ka" placeholder="Enter village" alt="ka" id="s7" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('village')" /></td></tr>
<tr><td colspan="3">



</td></tr>
</table>

<table class="grid margin xlarge" grid="village">
<thead>
<tr><th colspan="3">Village</th></tr>
 
</thead>
<tbody>
 
<?php 
$query="select * from states where item_type=6";
$result=$conn->query($query);
$rowid=0;
foreach($result as $row){
echo "<tr><td>".$rowid."</td><td>".$row['state_name']."</td><td>".$row['state_name_k']."</td></tr>";
$rowid++;
}
?>
</tbody>
</table>
</form>

</div>
 




</div>
</body>
</html>