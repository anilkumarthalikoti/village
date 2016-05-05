<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Spacing & installation details</title>
<link href="css/pivot.css" type="text/css" rel="stylesheet"/>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){

$conn->insert("spacing",array("spacing"=>$_POST["spacing"],"startfrom"=>$_POST["startfrom"],"endsat"=>$_POST["endsat"]));
header('Location: '."addspacing.php");
die();
}

?>
<script type="text/javascript" src="js/addspacing.js"></script>
<script type="text/javascript" src="js/pivot.js"></script>
</head>

<body>
<?php 
$tab=1;
if(!empty($_REQUEST["tab"])){
$tab=$_REQUEST["tab"];
}
?>
<input type="hidden" id="tabSelect" value="<?php print $tab;?>"/>
<div class="title">Spacing & installation</div>
<div class="viewport">
<ul id="tabs">

      <li><a id="tab1">Spacing details </a></li>
	   <li><a id="tab2">Intallation details</a></li>
	    <li class="hide"><a id="tab3">Subcd</a></li>
      
	     
       

</ul>



<div class="container" id="tab1C">
<form name="spacing" method="post" action="addspacing.php">
<table class="form margin xlarge">
<tr><td class="label">Enter spacing name</td><td>:</td><td><input type="text" name="spacing" placeholder="Spacing name"/></td></tr>
<tr><td class="label">Range Between</td><td>:</td><td><input type="text" name="startfrom" placeholder="From"/>-<input type="text" name="endsat" placeholder="To"/></td></tr>
 
<tr><td colspan="3"><input type="submit" value="Save"/></td></tr>
</table>
<table class="grid margin large">
<thead>
<tr>
<th>Spacing name</th><th>Range</th>
</tr>
</thead>
<tbody>
<?php 
$result=$conn->select("spacing",array("spacing","startfrom","endsat"));
foreach($result as $row){
echo "<tr><td>".$row["spacing"]."</td><td>".$row["startfrom"]."-".$row["endsat"]."</td></tr>";
}
?>

</tbody>
</table>
</form>



</div>


<div class="container" id="tab2C">
<form name="installation">
<input type="hidden" name="save" value="installation"/>
<table class="form margin xlarge">
<tr><td>Select spacing</td><td>:</td><td><select name="spacing">
<option value="-1">--Select--</option>
<?php 
$result=$conn->select("spacing",array("id","spacing"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["spacing"]."</option>";
}
?>
</select></td></tr>
<tr><td>Enter area in (ha)</td><td>:</td><td><input type="text" name="haval"/></td></tr>
<tr><td>Amount</td><td>:</td><td><input type="text" name="amount"/></td></tr>
 
<tr><td colspan="3"><input type="button" value="Save" onclick="install.installdetails();"/></td></tr>
</table>
<div id="p_table_install" class="margin pivot xlarge grid" align="center"  style="height:280px; overflow:auto" ></div>
<table class="grid margin xlarge hide" id="installation_tbl" >
<thead><tr><th>Area spacing</th><th>Spacing area</th><th>Amount</th></tr></thead>
<tbody>
<?php 
$query="select s.spacing,si.spacing_area,si.amount from spacing s,spacing_installdetails si where s.id= si.spacingid";
$result=$conn->query($query);
foreach($result as $row )
{
echo "<tr><td>".$row["spacing"]."</td><td>".$row["spacing_area"]."</td><td>".$row["amount"]."</td></tr>";
}
?>

</tbody>
</table>
</form>
</div>



<div class="container hide" id="tab3C">
<form name="subcd">
<input type="hidden" name="save" value="subcd"/>
<table class="form margin xlarge">
<tr><td>Select spacing</td><td>:</td><td><select name="spacing">
<option value="-1">--Select--</option>
<?php 
$result=$conn->select("spacing",array("id","spacing"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["spacing"]."</option>";
}
?>
</select></td></tr>
<tr><td>Enter area in (ha)</td><td>:</td><td><input type="text" name="haval"/></td></tr>
<tr><td>Amount</td><td>:</td><td><input type="text" name="amount"/></td></tr>
 <tr><td>Percentage</td><td>:</td><td><input type="text" name="percentage"/></td></tr>
<tr><td colspan="3"><input type="button" value="Save" onclick="install.subcd();"/></td></tr>
</table>
<table class="grid margin xlarge">
<thead><tr><th>Area spacing</th><th>Spacing area</th><th>Amount</th><th>Percentage</th></tr></thead>
<tbody>
<?php 
$query="select s.spacing,si.spacing_area,si.amount,si.percentage from spacing s,spacing_subcd si where s.id= si.spacingid";
$result=$conn->query($query);
foreach($result as $row )
{
echo "<tr><td>".$row["spacing"]."</td><td>".$row["spacing_area"]."</td><td>".$row["amount"]."</td><td>".$row["percentage"]."</td></tr>";
}
?>

</tbody>
</table>
</form>
</div>
</div>
</body>
</html>
