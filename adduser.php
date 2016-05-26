<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>User Creation</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){
$default="123";
$isactive='Y';
$isAdmin='N';
$conn->insert("app_login",array("login_id"=>strtoupper($_POST["login_id"]),"login_password"=>strtoupper($_POST["login_id"]),"isactive"=>$isactive,"isadmin"=>$isAdmin,"designation"=>$_POST["designation"]));
header('Location: '."adduser.php");
die();
}
 ?>
 <script type="text/javascript">
 function validate(){
 validation.validate();
 
 if($("[class='error']").length>0){
 return false;
 }
 
 return true;
 
 }
 </script>
</head>

<body>
<div class="title">User Creation</div>
<div class="viewport">
<form name="userform" method="post" action="adduser.php" onSubmit="return validate()">
<table class="form xlarge">
<tr><td>Enter user name</td><td>:</td><td><input rules="required," placeholder="Login Id" name="login_id" type="text" /></td></tr>
<tr><td>User Designation</td><td>:</td><td><select name="designation" rules="required,">
<option value="-1">Select</option>
<option value="TA">TA</option>
<option value="TA-SADH">TA-SADH</option>
<option value="AS-SADH">AS-SADH</option>
</select></td></tr>
<tr><td colspan="3" align="right"><input type="submit" class="login_button" value="Save" /></td></tr>
 
</table>
</form>
 
<table class="grid xlarge margin"   >
<thead><tr><th>Login id</th><th>IS ACTIVE</th><th>IS ADMIN</th><th>Designation</th></tr></thead>
<tbody>
<?php 
$result=$conn->select("app_login",array("id","login_id","isactive","isadmin","designation"));
foreach($result as $row){
echo "<tr><td>".$row["login_id"]."</td><td>".$row["isactive"]."</td><td>".$row["isadmin"]."</td><td>".$row["designation"]."</td></tr>";
}

?>
</tbody>
</table>
 
</div>
</body>
</html>
