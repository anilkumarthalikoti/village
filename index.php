<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
 
<script src="js/login.js" type="text/javascript"></script>
<?php
    session_start();

 if(isset($_SESSION['logged_in'])) {
 ?>
<script type="text/javascript">
window.location="/home.php";
</script> 
 <?php
 }
 ?>
</head>

<body>
 

<div class="content">
<form id="form_id" method="post" name="login_form">
<input type="hidden" name="methodcall" value="validate_login"/>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
   
    <td class="login_dialog" align="center" valign="middle" height="100%">
<div class="transbox login_dialog margin_small" >
<div class="dialogTitle">Login</div>
    <table width="100%" border="0" cellspacing="5" style="line-height:35px;" cellpadding="0"  >

  <tr><td><input name="username" type="text" id="username" placeholder="Email Address" class="large align_right"/></td></tr>
  
  <tr><td ><input name="password" type="password" id="password" placeholder="Password" class="large align_right"  /></td></tr>
  <tr><td>
  		<table width="100%;" cellspacing="0" cellpadding="0">
 	<tr><td colspan="2" id="errorMsg"></td></tr>
				 <tr>
    					<td  >
								<input name="remember_me" type="checkbox" value="" />Remember Me       				  </td><td align="right" width="150px">		<input type="button" class="button_login" value=" Login " id="submit" onClick="login.validate()"  />   
              			</td>
    </tr>
    <tr><td colspan="2" class="align_center">Don't have an account?  <a href="signup.php" style="color:#FF0000">Sign up</a> </td></tr>
    
  </table></td></tr>
</table>
<div class="dialogBottom"></div>
</div></td>
  </tr>
</table>
</form>
</div>
 
 
</body>
</html>