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

<body>
 
<div style="padding:10px; border-bottom:15px solid #069"><img src="images/logo.png" width="300" height="60" /></div>
<div class="content1">
<form id="form_id" method="post" name="login_form">
<input type="hidden" name="methodcall" value="validate_login"/>
<table style="width:100% " >
<tr><td style="height:200px;" align="center"> </td></tr>
<tr align="center"><td>
 <div class="login"  style="border:2px solid #efefef; box-shadow: 15px 15px 5px #666;"  > 
<table   border="0"  width="100%" cellpadding="5px" style="line-height:25px;" >

<tr><td style="border-bottom:1px solid #CCCCCC; height:35px; color:#960"><h3>LOGIN FORM</h3></td></tr>
  <tr><td><input rules="required," name="username" type="text" id="username" placeholder="ACCESS ID" class="large" style="height:48px; margin:10px;  font-size:20px;  padding-left:48px; background:url(images/user.png) no-repeat;"/></td></tr>
  
  <tr><td ><input rules="required," name="password" type="password" id="password" placeholder="PASSWORD" class="large" style="height:48px; font-size:20px;  margin:10px; padding-left:48px; background:url(images/pwd.png) no-repeat;" onkeypress="login.checklogin(event)" /></td></tr>
  
 
<tr><td style=" height:45px;  ;" >  <a href="signup.php"><input type="button" value="Sign up" style="height:40px; float:none; font-size:20px;  width:180px; padding:0; margin:0"/></a>
								  	<input style="height:40px; float:none; width:180px;  font-size:20px; padding:0; margin:0" type="button" class="button_login" value=" Login " id="submit" onClick="login.validate()"  />   </td></tr>	
</table>

</div>
 </td>
  </tr>
  </table> 

</form>
 
</div>
<div style="color:#FFF; text-align:center; padding:10PX; background-color:#69C; position:fixed; bottom:0PX; width:100%">@2016 All rights reserved</div> 
 
</body>
</html>