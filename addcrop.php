<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add crop</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){

$conn->insert("cropitems",array("cropname"=>trim(strtoupper($_POST["cropname"])), "cropname_k"=>$_POST["cropname_k"]));
header('Location: '."addcrop.php");
die();
}
 ?>
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
<div class="title">Add crop details</div>
<div class="viewport">

<div id="formdialog">
<form name"crop" onsubmit="addcrop.php" method="post">
 <table class="form" style="margin:0; padding:0" >
 <tr><td>Crop name</td><td>:</td><td><input type="text" name="cropname" id="cropname" placeholder="Crop name"/> <input type="text" alt="ka" name="cropname_k" id="cropname_k"/></td></tr>
 <tr><td colspan="3"><input type="submit" class="button" value="Save"/></td></tr>
 
 </table>
  </form>
 </div>
 <div class="margin xlarge">
 <table class="grid " filter='Y'>
 <thead><tr><th class="tablehd">Slno.</th><th>Crop name</th><th> Crop name(K)</th></tr></thead>
 <tbody>
 <?php 
 
 $result=$conn->select("cropitems",array("cropname","cropname_k"));
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["cropname"]."</td><td>".$row["cropname_k"]."</td></tr>";
 $i++;
 }
 ?>
 </tbody>
 </table> 
 </div>

 
</div>
</body>
</html>
