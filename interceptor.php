<?php
    session_start();
	 $role="";
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1) {
        //session is set
		$userdata=$_SESSION["logged_in"];
		
		$role=$userdata["designation"];
		 if($_SERVER['PHP_SELF']=="/index.php"){
		 header('Location: '."home.php");
		 die();
		 }
    } else if(!isset($_SESSION['logged_in']) || (isset($_SESION['logged_in']) && $_SESSION['logged_in'] == 0)){
        //session is not set
		if(!endsWith($_SERVER['PHP_SELF'],"/index.php")){
 		header('Location: '."index.php");
die();
}
    }
	function startsWith($haystack, $needle) {
    // search backwards starting from haystack length characters from the end
    return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
}

function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
} 
?>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />
<link href="css/jquery.dataTables.css" type="text/css" rel="stylesheet"/>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/datatable/jquery.dataTables.js" type="text/javascript"></script>
 <script src="js/pramukhindic.js" type="text/javascript"></script>
<script src="js/pramukhime.js" type="text/javascript"></script>
 
<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/montserrat.css" rel="stylesheet" type="text/css">
  <link href="lato.css" rel="stylesheet" type="text/css">
 
  <script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
 
 $("span#cloudoffice_role").html("<?php print $role ?>");
 $("table[filter='Y']").addClass("form_grid");
$("table[filter='Y']").DataTable({
    "sDom": 'Rfrtlip'  
 
 });
 
 $("#office_desig").val("<?php print $role?>");
$("input[type='search']").addClass("search");
 
});
</script>