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
<div class="viewport">
  <form method="POST" action="scheme.php"   name="form1" id="schema_details">
    <?php
session_start();
require "server/app_connector.php";
$titles = array("Schema", "Sub-schema", "Component","Item-1/Crop-1","Item-2/Crop-2","Item-3/Crop-3","Item-4/Crop-4");
$con =$database;
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
 ?>
 
 <?php
 $con->query("insert into items (item_name,item_type) values('".$_POST["item_name"]."',".$_POST["item_type"].")");
 
 }
?>
    <div class="title"><span>Adding Scheme</span></div>
   <form method="POST" action="" name="form1">
 
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
       <tr><td>Select type</td><td>:</td><td><select name="item_type">
	   <option>Select</option>
<?php 
$k=0;
while($k<=6){
echo "<option value='".$k."'>".$titles[$k]."</option>";
$k++;
}
?>	   
 
	   </select></td></tr>
	   <tr><td>Enter value</td><td>:</td><td><input type="text" name="item_name"/><input type="button" class="button_login" value="Save" onclick="schema.saveData();"/></td></tr>
	   <tr><td colspan="3">
	   <table width="100%">
	   <tr>
	   
	   <?php 
	    $k=0;
		
	   while($k<= 6) {
	   
	   ?>
	   <td valign="top">
	   <table class="grid" width="150" >
	   <thead><tr><th colspan="2"><?php echo $titles[$k] ?></th></tr></thead>
	   <tbody>
	   <?php 
	  
	   $i=1;
	   $datas=$con->query("select * from items where item_type=".$k);
	   foreach($datas as $data){
	   echo "<tr><td>".$i."</td><td>".$data["item_name"]."</td></tr>";
	   }
	   $k++;
	   ?>
	   </tbody>
	   </table>
	   </td> 
	   <?php
	   }
	   ?>
	    
	    
	  
	   </tr>
	   
	   </table>
	   
	   </td></tr>
      </table></form>
</div>
</body>
</html>