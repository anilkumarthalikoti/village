<?php
    session_start();
	 
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        //session is set
		 
    } else if(!isset($_SESSION['logged_in']) || (isset($_SESION['logged_in']) && $_SESSION['logged_in'] == 0)){
        //session is not set
 
		
		echo "index.php";
		
		
    }
	 
?>