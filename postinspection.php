<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post-inspection</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
 $user=$_SESSION["logged_in"];
$conn=$database;
$preallocated="0";

 ?>
  
 <script type='text/javascript' src="js/postinspection.js"></script>
</head>

<body>
<div class="title">Post-inspection</div>
<div class="viewport">
<table> <tr><td>
<form name="post_inspection" >
<input type="hidden" name="filling_id" value="<?php print $_POST["filling_id"]?>"/>
<input type="hidden" name="inspected_by" value="<?php print $user["id"]?>"/>
<input type="hidden" name="material_save"/>
  <table class="form large">
   
<tr  ><td>Logged user</td><td>:</td><td><strong><?php print $user["login_id"]?></strong></td>  
 <td class="label small">Post-inspection date</td><td class="tiny">:</td><td><input type="text" placeholder="dd/MM/yyyy" name="inspected_date" class="datepicker" id="inspectiondate"/>  </td> </tr>
<tr class="labelh"><td></td><td>Crop-1</td><td>Crop-2</td><td>Crop-3</td><td></td><td></td></tr>
<tr>
<td>Crop </td>
<td><select name="crop1" class="tiny1"  >
<option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>

</select></td>
 
 <td><select name="crop2" class="tiny1"  >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td>
 <td><select name="crop3" class="tiny1" >
 <option value="-1">Select</option>
<?php 
$result=$conn->select("cropitems",array("id","cropname"));
foreach($result as $row){
echo "<option value='".$row["id"]."'>".$row["cropname"]."</option>";
}
?>
</select></td><td></td><td></td>
</tr>
<tr>
<td>Area in hector </td>
<td><input type="text" name="area1" class="tiny"/></td>
 <td><input type="text" name="area2" class="tiny"/></td>
 <td><input type="text" name="area3" class="tiny"/> </td><td></td><td></td>
</tr>
<tr>
<td>Spacing </td>
<td><input type="text" name="spacing1" class="tiny"/></td>
 <td><input type="text" name="spacing2" class="tiny"/></td>
 <td> <input type="text" name="spacing3" class="tiny"/></td><td></td><td></td>
</tr> 
 <tr><td>Pre-allocated</td><td>:</td><td><input type="text" name="preallocated" disabled="disabled" value="<?php print $preallocated;?>"/></td><td>Current Applicable</td><td>:</td><td></td></tr>
 <tr><td>Material</td><td>:</td><td colspan="4"><select name="material" onchange="postinspection.updatePrice();">
 <?php 
 $result =$conn->select("cropitemsprice",array("id","itemname","itemprice","units"));
 foreach($result as $row){
 print "<option value='".$row["id"]."' price='".$row["itemprice"]."' units='".$row["units"]."'>".$row["itemname"]."</option>";
 }
 ?>
 
 </select></td> </tr>
  <tr><td>Dealer Price/Qty</td><td>:</td><td><input name='dAmount' type='text' class='tiny1'/></td><td>Qty</td><td>:</td><td><input name='dQty' type='text' class='tiny1'/></td></tr>
  <tr><td>GGRC Price/Qty</td><td>:</td><td><input name='gAmount' disabled="disabled" type='text' class='tiny1'/></td><td>Qty</td><td>:</td><td><input name='gQty' type='text' class='tiny1'/></td></tr>
  <tr><td colspan="6"> <input type='button' value='Add' onclick='postinspection.addMaterial();' /><input type='button' value='Save' onclick='postinspection.savePostInspection();' /></td></tr>
 
  </table></form>
  </td><td valign="top">
 <table class="form_grid xlarge margin" id="material_list">
 <thead>
 <tr><th>Material</th><th>Dealer qty</th><th>Price/qty</th><th>Total Price</th><th>Inspected qty</th><th>GGRC Price/qty</th><th>Total Price</th></tr>
 </thead>
 <tbody>
 
 </tbody>
 <tfoot> 
 <tr><td></td><td></td><td>Dealer Bill Amount</td><td id="dAmt">0.00</td><td></td><td>Inspection Amount</td><td id="gAmt">0.00</td></tr>
  <tr><td></td><td></td><td>Vat @ 5.5</td><td id="vdAmt">0.00</td><td></td><td>Inspection Amount</td><td id="gdAmt">0.00</td></tr>
 </tfoot>
 </table></td></tr></table>
</div>
</body>
</html>
