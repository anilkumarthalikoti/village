<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script src="js/kannada.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery.hotkeys.js"></script>
<script type="text/javascript" src="js/village.js"></script>
<script type="text/javascript">

	
	$(document).ready(function(){
 $("input[name='state_name_ka']").each(function(){
					$(this).attr("charset","utf-8");	   
						   
						   
						   $(this).keydown(function(e){
															
														toggleKBMode(e)	;
															});
						   
						   
						      $(this).keypress(function(e){
															
														convertThis(e);
															});
						   
						   
														 });
 
 
 });
</script>
</head>

<body>
<?php 
session_start();
require "server/app_connector.php";
$conn=$database;
 
?>
<div class="viewport">
  <ul id="tabs">

      <li><a id="tab1">State</a></li>
	   <li><a id="tab2">District</a></li>
      <li><a id="tab3">Taluka</a></li>
	   <li><a id="tab4">Hobli</a></li>
	   <li><a id="tab5">Village</a></li>
	    <li><a id="tab6">Panchayati</a></li>
		
	     
       

</ul>
<div class="container" id="tab1C">
<form name="addState">
<input type="hidden" name="saveType" value="state"/>
<input type="hidden" name="item_type" value="0"/>
<table class="margin-left margin-top">
<tr><td class="label">State</td>
<td>:</td><td><input type="text" name="state_name" placeholder="Enter state" /> <input type="text" alt="ka" name="state_name_ka"/><input type="button" value="Save" onClick="states.saveData('addState');"/></td>
</tr>
<tr><td colspan="3">
<table class="grid small">
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


</td></tr>
</table>

</form>


</div>




<div class="container" id="tab2C">
<form name="district">
<input type="hidden" name="saveType" value="district"/>
<input type="hidden" name="item_type" value="1"/>
<table class="margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Enter district</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter district" /><input type="text" name="state_name_ka" placeholder="Enter district" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('district')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="3">Districts</th></tr>
 

</thead>
<tbody>
<?php 
 
?>

</tbody>
</table>

</td></tr>
</table>

</form>



</div>
<div class="container" id="tab3C">
<form name="taluka">
<input type="hidden" name="saveType" value="taluka"/>
<input type="hidden" name="item_type" value="2"/>


<table class="margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updatedistrict('taluka')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="district_selected" id="district_selected">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter taluka</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter taluka" /><input type="text" name="state_name_ka" placeholder="Enter taluka" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('taluka')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Taluka</th></tr>
 
</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>

</div>
<div class="container" id="tab4C">
<form name="hobli">
<input type="hidden" name="saveType" value="hobli"/>
<input type="hidden" name="item_type" value="3"/>


<table class="margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updatedistrict('hobli')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updatetaluka('hobli');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected">
<option value="-1">Select</option>
 
</select></td></tr>

<tr><td class="label">Enter hobli</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter hobli" /><input type="text" name="state_name_ka" placeholder="Enter hobli" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('hobli')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Hobli</th></tr>
 
</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>

</div>
 




<div class="container" id="tab5C">
<form name="village">
<input type="hidden" name="saveType" value="village"/>
<input type="hidden" name="item_type" value="4"/>


<table class="margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updatedistrict('village')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updatetaluka('village');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select Taluka</td><td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected" onChange="states.updatehobli('village')">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select hobli</td><td>:</td>
<td>
<select name="hobli_selected" id="hobli_selected">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter village</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter village" /><input type="text" name="state_name_ka" placeholder="Enter hobli" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('village')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Village</th></tr>
 
</thead>
<tbody>
 

</tbody>
</table>

</td></tr>
</table>


</form>

</div>
 


<div class="container" id="tab6C">
<form name="panchaitay">
<input type="hidden" name="saveType" value="panchaitay"/>
<input type="hidden" name="item_type" value="5"/>


<table class="margin-left margin-top">
<tr><td class="label">Select state</td><td>:</td><td>
<select name="state_selected" id="state_selected" onChange="states.updatedistrict('panchaitay')">
<option value="-1">Select</option>

<?php 
$result =$conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>0));
foreach($result as $row)
echo "<option   value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
?>
</select></td></tr>
<tr><td class="label">Select District</td><td>:</td>
<td>
<select name="district_selected" id="district_selected" onChange="states.updatetaluka('panchaitay');">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select Taluka</td><td>:</td>
<td>
<select name="taluka_selected" id="taluka_selected" onChange="states.updatehobli('panchaitay')">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select hobli</td><td>:</td>
<td>
<select name="hobli_selected" id="hobli_selected" onChange="states.updatevillage('panchaitay')">
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Select village</td><td>:</td>
<td>
<select name="village_selected" id="village_selected" >
<option value="-1">Select</option>
 
</select></td></tr>
<tr><td class="label">Enter panchaitay</td><td>:</td><td><input type="text" name="state_name" placeholder="Enter panchaitay" /><input type="text" name="state_name_ka" placeholder="Enter panchaitay" alt="ka" /></td></tr>
<tr><td colspan="3"> <input type="button" value="Save" onClick="states.saveData('panchaitay')" /></td></tr>
<tr><td colspan="3">

<table class="grid">
<thead>
<tr><th colspan="4">Village</th></tr>
 
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