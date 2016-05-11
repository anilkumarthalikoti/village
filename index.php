<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<?php
   require "interceptor.php";
 ?>
 
<script src="js/login.js" type="text/javascript"></script>

</head>

<body bgcolor="#EEEEEE">
 

<div class="content1">
<form id="form_id" method="post" name="login_form">
<input type="hidden" name="methodcall" value="validate_login"/>
<table style="width:100% " >
<tr><td style="height:120px;" align="center"> </td></tr>
<tr align="center"><td>
 <div class="login"   > 
<table   border="0"  width="100%" cellpadding="5px" style="line-height:25px;" >

<tr><td style="border-bottom:1px solid #CCCCCC; height:35px;"><h3>LOGIN FORM</h3></td></tr>
  <tr><td><input name="username" type="text" id="username" placeholder="USER ID" class="large" style="height:48px; margin:10px; padding-left:48px; background:url(images/user.png) no-repeat;"/></td></tr>
  
  <tr><td ><input name="password" type="password" id="password" placeholder="PASSWORD" class="large" style="height:48px; margin:10px; padding-left:48px; background:url(images/pwd.png) no-repeat;" onkeypress="login.checklogin(event)" /></td></tr>
  
 
<tr><td style=" height:45px; background:#CCCCCC" >  <a href="signup.php"><input type="button" value="Sign up" style="height:40px; float:none; width:180px; padding:0; margin:0"/></a>
								  	<input style="height:40px; float:none; width:180px; padding:0; margin:0" type="button" class="button_login" value=" Login " id="submit" onClick="login.validate()"  />   </td></tr>	
</table>

</div>
 </td>
  </tr>
  </table> 

</form>
 
</div>
 
 
</body>
</html>