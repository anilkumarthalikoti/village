<?php
    session_start();
	 $role="";
	 $user="";
    if(isset($_SESSION['logged_in'])) {
        //session is set
		$userdata=$_SESSION["logged_in"];
		
		$role=$userdata["designation"];
		$user=$userdata["login_id"];
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
<script src="js/validation.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/datatable/jquery.dataTables.js" type="text/javascript"></script>
 <script src="js/pramukhindic.js" type="text/javascript"></script>
<script src="js/pramukhime.js" type="text/javascript"></script>
 
<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
  <link href="css/montserrat.css" rel="stylesheet" type="text/css">
  <link href="css/lato.css" rel="stylesheet" type="text/css">
 
 <style type="text/css">
 .dataTables_filter{
 background:#CCCCCC;
 width:100%;
 height:45px;
 max-height:45px;
 margin-top:0;
 padding:0;
 vertical-align:middel;
   -webkit-border-radius: 15px 15px 0px 0px;
		-moz-border-radius:  15px 15px 0px 0px;
		border-radius:  10px 10px 0px 0px; 
		padding:10px;
		padding-bottom:5px;
	 
 }
 
 .dataTables_filter input{
  margin:0;
 padding:0;
 }
 .ui-widget-overlay.custom-overlay
{
    background-color: black;
    background-image: none;
    opacity: 0.9;
    z-index: 1040;    
}
 </style>
  
<script type="text/javascript">
$(document).ready(function(){
    
    
    $(".account").click(function()
{
var X=$(this).attr('id');
if(X==1)
{
$(".submenu").hide();
$(this).attr('id', '0');
}
else
{
$(".submenu").show();
$(this).attr('id', '1');
}

});

//Mouse click on sub menu
$(".submenu").mouseup(function()
{
return false
});

//Mouse click on my account link
$(".account").mouseup(function()
{
return false
});


//Document Click
$(document).mouseup(function()
{
$(".submenu").hide();
$(".account").attr('id', '');
});
    
    
    
    
    
 
 $("#cloudoffice_role").html("<?php print $role ?>");
  $("#userdetails").html("<?php print $user ?>");
// $("table[filter='Y']").addClass("form_grid");
$("table[filter='Y']").DataTable({
    "sDom": 'Rfrtlip'  
 
 });
 $("table[role='grid']").css("border","0");
  
 
$("input[type='search']").addClass("search");
 
});
</script>

<?php 

if(isset($_SESSION['logged_in'])) {
    ?>
 
<!-- User profile-->

 <div class="dropdown">
    <a class="account"  > <span class="btn btn-success" id="cloudoffice_role"></span><span class="btn btn-primary">Welcome !<span id="userdetails"></span></span></a>

<div class="submenu">
<ul class="root">
<li ><a href="home.php" >Dashboard</a></li>
<li ><a href="#Profile" >Profile</a></li>
<li ><a href="#settings">Settings</a></li>
<li ><a href="#feedback">Send Feedback</a></li>
<li ><a href="logout.php">Logout</a></li>
</ul>
</div>

</div>
<?php
}
?>
 