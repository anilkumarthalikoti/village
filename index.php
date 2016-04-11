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
 
<div class="loginbg"><table width="100%"><tr><td align="center"><img src="/images/loginbg.png" style="margin-left:270px;"/></td></tr></table></div>
<div class="content1">
<table style="width:100%">
<tr><td style="height:120px;">&nbsp;</td></tr>
<tr align="center"><td >
<form id="form_id" method="post" name="login_form">
<input type="hidden" name="methodcall" value="validate_login"/>
<table  class="login_dialog"   border="0" cellspacing="0" cellpadding="0" >
  <tr>
   
    <td class="login_dialog" align="center" valign="top" >
 
<div class="dialogTitle">LOGIN FORM</div>
    <table width="100%" border="0"   style="line-height:15px;   border:0px; padding:0; margin:0; background-color:#FFFFFF" cellpadding="0"  >

  <tr><td><input name="username" type="text" id="username" placeholder="USER ID" class="large align_right"/></td></tr>
  
  <tr><td ><input name="password" type="password" id="password" placeholder="PASSWORD" class="large align_right"  onkeypress="login.checklogin(event)" /></td></tr>
  <tr><td>
  		<table width="100%;" cellspacing="0" cellpadding="0">
 	
				 <tr>
    					<td  >
								 </td><td align="right" width="150px">		<input type="button" class="button_login" value=" Login " id="submit" onClick="login.validate()"  />   
              			</td>
    </tr>
	 
    </table></td></tr>
</table>
<div class="dialogBottom"><span id="errorMsg"></span></div>
 </td>
  </tr>
</table>
</form>
</td></tr>
</div>
 
 
</body>
</html>