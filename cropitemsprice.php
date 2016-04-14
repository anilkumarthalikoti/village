<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add items</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){
if($_POST["id"]!="-1")
{
$conn->update("cropitemsprice",array("item_price"=>$_POST["itemprice"]),array("id"=>$_POST["id"]));
}else{
$conn->insert("cropitemsprice",array("itemname"=>trim(strtoupper($_POST["itemname"])), "itemprice"=>$_POST["itemprice"],"units"=>$_POST["units"]));
}
header('Location: '."cropitemsprice.php");
die();
}
 ?>
 <script type="text/javascript">
 $(document).ready(function(){
 $("#existing tbody tr").click(function(){
 $("#itemname").attr("disabled","disabled");
 $("#units").attr("disabled","disabled");
 $("#id").val($(this).attr("id"));
 $("#itemname").val($(this).find("td:eq(1)").html());
 $("#itemprice").val($(this).find("td:eq(3)").html());
 $("#units").val($(this).find("td:eq(2)").html());
 });
 });
 
 </script>
</head>

<body>
<div class="title">Item details</div>
<div class="viewport">
<form name"crop" onsubmit="cropitemsprice.php" method="post">
<input type="hidden" name="id" value="-1"/>
 <table class="form margin xlarge">
 <tr><td>Item name</td><td>:</td><td><input type="text" name="itemname" id="itemname" placeholder="Item name"/></td></tr>
 <tr><td>Item Price</td><td>:</td><td> <input type="text"   name="itemprice" id="itemprice"/></td></tr>
 <tr><td>Units</td><td>:</td><td> <select name="units" id="units">
 <option value="-1">Select</option>
 <option value="No's">No's</option>
 <option value="Meters">Meters</option>
 </select></td></tr>
 <tr><td colspan="3"><input type="button" class="button" value="Clear" onclick="location.reload(); "/><input type="submit" class="button" value="Save"/></td></tr>
 
 </table>
 <table class="grid margin xlarge" id="existing">
 <thead><tr><th></th><th>Item name</th><th> Units</th><th>Price</th></tr></thead>
 <tbody>
 <?php 
 
 $result=$conn->select("cropitemsprice",array("id","itemname","units","itemprice"));
 $i=1;
 foreach($result as $row){
 echo "<tr id='".$row["id"]."'><td>".$i."</td><td>".$row["itemname"]."</td><td>".$row["units"]."</td><td>".$row["itemprice"]."</td></tr>";
 }
 ?>
 </tbody>
 </table> 
 </form>
 
</div>
</body>
</html>
