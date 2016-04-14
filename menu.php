<table id="access_roles"  style="display:none;">
<?php 
session_start();
require "server/app_connector.php";
$user=$_SESSION["logged_in"];
$query="select linkid from page_links where linkid not in(select distinct d.page_link_id from user_roles u,role_mstr m, role_dtl d where u.login_id='".$user["login_id"]."' and u.is_active='Y' and u.role_id= m.role_id and m.role_id= d.role_id)";
$link=$database->query($query)->fetchAll();
foreach($link as $links){
 echo "<tr><td>".$links['linkid']."</td></tr>";
}
?>
</table>
 

<div class="AJXCSSMenubcCTJAC"><!-- AJXFILE:steel-blue.css -->
 <div class="ajxmw1">
  <div class="ajxmw2">

<ul>
 <li><a href="home.php"><b>&nbsp;&nbsp;Home&nbsp;</b></a></li>
 <li><a class="ajxsub" href="#"><b>Admin</b></a>
  <ul>
  	<li link_id="4"><a href="adduser.php"><b>Add user</b></a></li>
	   <li link_id="7"><a href="rolecreation.php"><b>Role Creation </b></a></li>
       <li link_id="8"><a href="rolemapping.php"><b>Role Mapping </b></a></li>
   <li link_id="1"><a href="village.php"><b>Add Village</b></a></li>
    <li link_id="6"><a href="actionmapping.php"><b>Village privilage </b></a></li>
   	  <li link_id="12"><a href="addcrop.php"><b>Add Crop(s)</b></a></li>
	   <li link_id="18"><a href="cropitemsprice.php"><b>Add Crop Items</b></a></li>
	   <li link_id="17"><a href="adddealer.php"><b>Add Company/Dealer</b></a></li>
   <li link_id="2"><a href="scheme.php"><b>Add Scheme</b></a></li>
    <li link_id="3"><a href="cast.php"><b>Add Cast</b></a></li>


      <li link_id="5"><a href="password.php"><b>Reset Password</b></a></li>
	 
	

  </ul>
 </li>
 
 
 
 <li><a class="ajxsub" href="#"><b>Farmer </b></a>
  <ul>
   <li link_id="9"><a href="farmer.php"><b>Farmer</b></a></li>
   <!--
   <li link_id="10"><a href="landdetails.php"><b>Land details</b></a></li>
            <li link_id="11"><a href="scheme_filling.php"><b>Scheme Filing</b></a></li>
      <li link_id="12"><a href="#"><b>Existing</b></a></li>

            <li link_id="13"><a href="#"><b>Search</b></a></li>-->
  </ul>
 </li>
 
 
 <li><a class="ajxsub" href="#"><b>Officer</b></a>
  <ul>
   <li link_id='14'><a href="approval.php"><b>Proposal</b></a>
    
   </li>
   
      <li link_id="15"><a href="#"><b>Track Records</b></a></li>
         <li link_id="16"><a href="#"><b>Beneficiary</b></a></li>
  </ul>
 </li>


 
  
  
 <li><a class="ajxsub" href="#"><b>Reports</b></a>
  <ul>
  <!--
   <li link_id="17"><a href="#"><b>Proposal</b></a></li>
      <li link_id="18"><a href="#"><b>Track Records</b></a></li>
	  -->
   </ul>
 </li>
 
 <li><a class="ajxsub" href="logout.php"><b>Logout</b></a></li>
</ul>
  </div>
 </div>
 </div>
<script type="text/javascript">
$(document).ready(function(){

$("table[id='access_roles'] tr td").each(function(){
var link=$(this).html();
var rid="li[link_id='"+link+"']";
$(rid).remove();

});
$("table[id='access_roles']").remove();
 
 
});
</script>