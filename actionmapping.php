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
<script src="js/actionmapping.js" type="text/javascript"></script>

</head>
<body>

<div class="title">Action Mapping</div>
<div class="viewport">
<form name="actionmapping" onsubmit="return false;">
<input type="hidden" name="methodcall" value="validate_user"/>
<input type="hidden" name="userregid" />
   <table>
   <tr><td>Enter user id</td><td>:</td><td><input type="text" name="userid" id="userid" onkeypress="mapping.validateuser(event)"/></td></tr>
   <tr id="hobli" class="hide"><td valign="top">Select hobli</td><td valign="top">:</td><td>
   <table>
   <tr><td><select name="hobli[]" id="hobli_select" multiple="multiple" style="height:200px;">
   <?php
 $result=  $conn->select("states",array("id","state_name","state_name_k"),array("item_type"=>4));
   foreach($result as $row){
   echo "<option value='".$row["id"]."'>".$row["state_name"]."/".$row["state_name_k"]."</option>";
   }
   ?>
   
   </select>
   </td></tr>
   <tr><td><input type="button" class="button_login" value="Save" onclick="mapping.savedata()"/></td></tr>
   </table>
   </td></tr>
   </table>
</div>
</body>
</html>