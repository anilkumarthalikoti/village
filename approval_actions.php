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
  <?php 
  $query="select s.id, concat('F000',s.id) regid, DATE_FORMAT(s.regdate,'%d/%m/%Y') regdate, concat(f.firstname,' ',f.lastname ,'/',f.firstname_k,' ',f.lastname_k) name, (select concat(st.state_name,'/', st.state_name_k )  from states st where id= f.village and item_type=4) village,'-'usercast,'-' farmertype,'-' lsurvay,'-' la,'-' sector ,'-' crop,'-' dripare, case when s.status='P' then 'New-Pending' when s.status='R' then 'Rejected' when s.status='I' then 'Yet-pre inspection'  else 'Done' end    from schemefilling s, farmerdetails f where f.id= s.regid and f.hobli in (select hobliid from actionmapping where regid='".$id["id"]."') and s.id ";
  if($status!="R"){
   $query.=" not in (select s.schemefillingid from schemerejection s) ";
   }else{
    $query.=" in (select s.schemefillingid from schemerejection s) ";
   }
   $query.=" and s.status='".$status."'";
  $result=$conn->query($query);
  foreach($result as $row){
   $i=0;
   $regid=-1;
  foreach($row as $value){
  if($i%2==0){
  if($i==0){
   echo "<tr schemefilling='".$value."'>";
   $regid=$value;
  }else{
  echo "<td>".$value."</td>";
  }
  }
  $i++;
  }
  echo "<td><input type='checkbox' selectall='selectall' name='selectedactions[]' value='".$regid."'/></td></tr>";
  }
  ?>
  
    </table>
 </div>
 <table class="excel"><tr><td align="right"><input type="button" value="Accept"/> <input type="button" value="Reject"/></td></tr></table>
