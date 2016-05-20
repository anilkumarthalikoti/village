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
<script src="js/rolemapping.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
createDialog("rolemapping");
$("#tbl_users tbody tr").click(function(){
 
mapping.setUser(this);

});
});
</script>
</head>
<body>

<div class="title">Permission manager</div>
<div class="viewport">
<form name="rolemapping_data" onsubmit="return false;">

   <table class="form margin-left  xlarge"  filter='Y' id="tbl_users">
   <thead>
   <tr>
   <th style="width:10px;"></th><th>User</th><th>Designation</th>
   </tr>
   </thead>
   <tbody>
   <!--
   <tr><td>Enter user id</td><td>:</td><td><input type="text" name="userid" id="userid" onkeypress="mapping.validateuser(event)"/></td></tr>
   -->
   <?php 
   $query="select * from app_login";
   $result=$conn->query($query);
   foreach($result as $row){
   echo "<tr userid='".$row['id']."' ><td></td><td>".$row['login_id']."</td><td>".$row['designation']."</td></tr>";
   }
   ?>
   </tbody>
   </table>
   <div id="rolemapping">
   <input type="hidden" name="methodcall" value="validate_user"/>
<input type="hidden" name="userregid" />
   <table>
   <tr><td><select name="selected_role[]" id="role_select" multiple="multiple" style="height:200px;">
   <?php
 $result=  $conn->select("role_mstr",array("role_id","role_name"));
   foreach($result as $row){
   echo "<option value='".$row["role_id"]."'>".$row["role_name"]."</option>";
   }
   ?>
   
   </select>
   </td></tr>
   <tr><td><input type="button" class="button_login" value="Save" onclick="mapping.savedata()"/></td></tr>
   </table>
   
   </div>
 
   </form>
</div>
</body>
</html>