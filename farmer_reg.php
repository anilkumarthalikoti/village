<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/ssheet.css" type="text/css" rel="stylesheet" />
<link href="css/home_sheet.css" type="text/css" rel="stylesheet" />
<script src="login.js"></script>
<style>
.inv {
    display: none;
}
    </style>

</head>

<body class="main">
<div id="container">

<div id="header1">
  <?php include("menu.php")?>
</div>


<div id="mainContentLogin" align="center">
  <?php include("farmer_reg_body.php")?>
  <!-- end #mainContent -->
</div>


<div id="footer"><?php include("i_fotter.php")?></div>
<!-- end #container --></div>

</div>
<script>
            document
                .getElementById('target')
                .addEventListener('change', function () {
                    'use strict';
                    var vis = document.querySelector('.vis'),   
                        target = document.getElementById(this.value);
                    if (vis !== null) {
                        vis.className = 'inv';
                    }
                    if (target !== null ) {
                        target.className = 'vis';
                    }
            });
        </script>
</body>
</html>