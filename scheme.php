<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/scheme.js"></script>
</head>

<body>
<?php 
session_start();
require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){
 $item_name=trim(strtoupper($_POST["item_name"]));
$item_type=trim($_POST["item_type"]);
$scheme_select=NULL;
if(!empty($_POST["scheme_select"])){
$scheme_select=trim($_POST["scheme_select"]);
}
 


$id=$conn->insert("items",array("item_name"=>$item_name, "item_type"=>$item_type ));
 if($scheme_select!=NULL){
 if($id!=0){
 
$mapid=$conn->insert("item_mapping",array("schemeid"=>$scheme_select,"subschemeid"=>$id));
 
 if($mapid==0){
 $conn->delete("items",array("item_id"=>$id));
 }
}else{
 
 $result1=$conn->select("items",array("item_id"), array("AND"=> array("item_name"=>$item_name,"item_type"=>$item_type)));
 
 $subscheme_id=NULL;
 foreach(  $result1   as $row){
 $subscheme_id= $row["item_id"];
 } 
 
  
  $mapid=$conn->insert("item_mapping",array("schemeid"=>$scheme_select,"subschemeid"=>$subscheme_id));
 
}
}
}
?>
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
$query="select a.item_id,a.item_name,(select b.item_name from items b where b.item_id=m.subschemeid ) subitem from items a ,item_mapping m where m.schemeid= a.item_id and a.item_type=0";
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




</form>

</div>
<div class="container" id="tab4C">
<form name="item">
<input type="hidden" name="saveType" value="item"/>
 
</form>
</div>
 

</div>
</body>
</html>