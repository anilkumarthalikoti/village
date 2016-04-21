<?php 
session_start();
require "server/app_connector.php";
$conn=$database;
 $id=$_SESSION["logged_in"];
 $status="P";
 if(!empty($_POST["status"])){
 $status=$_POST["status"];
 }
?>
 <script type="text/javascript">
 function updateselect(){
if( $("#checkall").is(":checked")){
 $("input[selectall='selectall']").prop("checked","checked");
 }else{
  $("input[selectall='selectall']").removeAttr("checked");
 }
 }
 
 </script>
<div style="height:300px; overflow:auto; max-height:400px;">
<table    class="grid excel">
  <thead><tr><th>Reg.No</th><th>Date of Reg.</th><th>Full Name</th><th>Village</th><th>Cast</th><th>Land survey no</th><th>Land area</th> <th>Farmer type</th><th>Sector</th><th>Crop</th><th>Drip Installed area</th>
  <th>Status</th>
  <th><input type="checkbox" id="checkall" onclick="updateselect();"/>All</th></tr></thead>
  <tbody>
  
  </tbody>
  
    </table>
 </div>
 <table class="excel"><tr><td align="right"><input type="button" value="Accept"/> <input type="button" value="Reject"/></td></tr></table>
