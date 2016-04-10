<?php
    session_start();
	 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        //session is set
		 if($_SERVER['PHP_SELF']=="/index.php"){
		 header('Location: '."home.php");
		 die();
		 }
    } else if(!isset($_SESSION['logged_in']) || (isset($_SESION['logged_in']) && $_SESSION['logged_in'] == 0)){
        //session is not set
		if($_SERVER['PHP_SELF']!="/index.php"){
 		header('Location: '."index.php");
die();
}
    }
	 
?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/pramukhindic.js" type="text/javascript"></script>
<script src="js/pramukhime.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
