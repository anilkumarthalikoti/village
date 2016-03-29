<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<script src="js/login.js" type="text/javascript"></script>

</head>

<body>
 

<div class="header"><img src="images/logo.png" width="300" height="60"  /></div>

<div class="content">
<form id="form_id" method="post" name="myform">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
  <tr>
    <td align="center" valign="top">&nbsp;</td>
    <td width="450px" >
<div class="transbox" style="padding:15px; margin-top:15px; ">
<div class="title">Login</div>
    <table width="100%" border="0" cellspacing="5" cellpadding="0"  >

  <tr><td><input name="text" type="text" id="username" placeholder="Email Address"  /></td></tr>
  
  <tr><td ><input name="password" type="password" id="password" placeholder="Password"  /></td></tr>
  <tr><td>
  		<table width="100%;" cellspacing="0" cellpadding="0">
 				 <tr>
    					<td  >
								<input name="remember_me" type="checkbox" value="" />Remember Me 
       				  </td><td align="right" width="150px">		<input type="button_login" value=" Login " id="submit" onClick="validate()" />   
              			</td>
    </tr>
    <tr><td colspan="2">Don't have an account?  <a href="signup.php" style="color:#FF0000">Sign up</a> </td></tr>
    <tr>
    <td  colspan="2" class="note" style="padding;0px; font-size:10px; color:#CC0" >FOR AUTHORIZED USERS ONLY</td>
  </tr>
  </table></td></tr>
</table>
</div>
</td>
  </tr>
</table>

</form>
</div>


<div class="fotter"><?php include("i_fotter.php")?></div>
 
</body>
</html>