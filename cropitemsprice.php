<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Drip matrial</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;

if(!empty($_POST)){
 
if($_POST["itemid"]=="-1")
{
 
$conn->insert("cropitemsprice",array("itemname"=>trim(strtoupper($_POST["itemname"])),"standard_measure"=>trim(strtoupper($_POST["standard_measure"])),"itemprice"=>$_POST["itemprice"],"units"=>$_POST["units"],"itemorder"=>$_POST["itemorder"]));

}else{
echo $_POST["itemid"];
 
$conn->update("cropitemsprice",array("itemprice"=>$_POST["itemprice"]),array("id"=>$_POST["itemid"]));
}
 
}
 ?>
 <script type="text/javascript" src="js/itemdetails.js"></script>
 <script type="text/javascript">
  function addUser(){
 $("#formdialog").dialog("open");
 }
 $(document).ready(function(){
 $("div.dataTables_filter").append('<a href="#" onclick="addUser()"><img src="images/addnew.png"  style="float:left;  "/></a>');
 createDialogSmall("formdialog") ;
 });
 </script>
</head>

<body>
<div class="title">Drip material </div>
<div class="viewport">
<form name"formcrop"  >
<div id="formdialog" title="Material Price">
 <table class="form margin xlarge">
 <tr><td>Grouping Id</td><td>:</td><td> <input type="text"   name="itemorder" id="itemorder"/></td></tr>
 <tr><td>Item name</td><td>:</td><td><input type="text" name="itemname" id="itemname" placeholder="Item name"/><input type="hidden" name="mat_id" id="mat_id" value="-1"/></td></tr>
 <tr><td>Item Price</td><td>:</td><td> <input type="text"   name="itemprice" id="itemprice"/></td></tr>
 <tr><td>Standard measure</td><td>:</td><td> <input type="text"   name="standard_measure" id="standard_measure"/></td></tr>
 <tr><td>Units</td><td>:</td><td> <select name="units" id="units">
 <option value="-1">Select</option>
 <option value="No's">No's</option>
 <option value="Meter">Meter</option>
 </select></td></tr>
 <tr><td>Is Deductable</td><td>:</td><td><select name="isdeduct" id="isdeduct">
 <option value="N">NO</option>
 <option value="Y">YES</option>
 </select></td></tr>
 <tr><td colspan="3"><input type="button" class="button" value="Clear" onclick="location.reload(); "/><input type="button" class="button" value="Save"  onclick="itemtrn.saveupdate();" /></td></tr>
 
 </table>
 </div>
 <div class="xlarge margin">
 <table class="grid" id="existing" filter='Y'>
 <thead><tr><th class="tablehd">Slno.</th><th>Item name</th><th>Standard Measure</th><th>Group Id</th><th>Is deductable</th><th> Units</th><th>Price</th></tr></thead>
 <tbody>
 <?php 
 $query="select id,itemname,standard_measure,itemorder,isdeduct,units,itemprice from cropitemsprice order by itemorder";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr id='".$row["id"]."'><td>".$i."</td><td>".$row["itemname"]."</td><td>".$row["standard_measure"]."</td><td>".$row["itemorder"]."</td><td>".$row["isdeduct"]."</td><td>".$row["units"]."</td><td>".$row["itemprice"]."</td></tr>";
$i++;
 }
 ?>
 </tbody>
 </table> 
 </div>
 </form>
 
</div>
</body>
</html>
