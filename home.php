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
<link href="css/home_sheet.css" type="text/css" rel="stylesheet" />
<script src="login.js"></script>
</head>
<body class="main">
<div id="container">
<div id="header1"><?php include("menu.php")?></div>
<div id="mainContentLogin" align="left"><?php include("home_body.php")?>
	<!-- end #mainContent --></div>

<div id="footer" align="left"><?php include("i_fotter.php")?></div>
<!-- end #container --></div>

</div>
</body>
</html>