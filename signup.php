<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/ssheet.css" type="text/css" rel="stylesheet" />

<script src="login.js"></script>

</head>

<body class="main">
<div id="container">

<div id="header"><img src="images/logo.png" width="300" height="60" style="margin:10px;" /></div>

<div id="mainContentLogin" align="center"><?php include("signup_body.php")?>
	<!-- end #mainContent --></div>

<div id="footer"><?php include("i_fotter.php")?></div>
<!-- end #container --></div>

</div>
</body>
</html>