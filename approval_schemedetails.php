 <?php
 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$user=$_SESSION["logged_in"];
$query="";
$count="";
 
?>
 
 <div id="status_board">
 <!--
 <thead><tr style="background-color:#099; color:#FFF; text-align:center"><th>Applications</th><th>Pre-Inspection</th><th>WorkOrder</th><th>Post-inspection</th><th>Taluka Approval</th><th>Sanxtion Order</th><th>District Approval</th><th>DC Bill</th><th>Payment</th></tr></thead>-->
 <ul>
 <h1>Applications</h1>
   <li> <div> Total application  <a href="#"> <span id="scheme_filling_val">0</span></a></div>  </li>
   <li> <div>Pending  <a href="#"><span id="pendding">0</span></a></div></li>
   <li> <div>Rejected  <a href="#"><span id="scheme_reject">0</span></a></div> </li>
   <li> <div>Yet to forward for pre-inspection  <a href="#"><span id="yettoapproval">0</span></a></div></li>
   <li> <div>Forward to RSK for pre-inspection  <a href="#"><span id="forwardtorsk">0</span></a></div> </li>
   <li> <div> <a href="#"><span></span></a></div> </li>
	<li> <div> <a href="#"><span></span></a></div> </li>
	<li> <div> <a href="#"><span></span></a></div> </li>
   </ul> 
   
   
   
   <ul>
 <h1>Pre-inspection</h1>
 <li> <div>Applications available for 
   Pre-Inspection  <a href="#"><span id="preinspection">0</span></a></div>
 </li><li> <div> Pending  <a href="#"><span id="preinspection_pending">0</span></a></div>
 </li><li> <div> Rejected   <a href="#"><span id="preinspection_rejected">0</span></a></div>
 </li><li> <div> Inspection done  <a href="#"><span id="preinspection_completed">0</span></a> </div>
 </li><li> <div> Forward to TA  <a href="#"><span id="forward_preinspection">0</span></a> </div>
 </li><li> <div> Received from RSK  <a href="#"><span id="recivedfrom_rsk">0</span></a></div>
 </li><li> <div>Yet to forward to DDH Office for Work Order <a href="#"><span id="yettoforward_ddh">0</span></a></div>
 </li><li> <div>Forward to DDH Office for Work Order  <a href="#"><span id="forwardto_ddh">0</span></a></div>
 </li></ul> 
 
 
 
 <ul>
 <h1>Work-order</h1>
 <li> <div>Application for work-order <a href="#"><span id="workorder">0</span></a></div>
 </li><li> <div>Pending <a href="#"><span id="workorder_pending">0</span></a> </div>
 </li><li> <div>Rejected  <a href="#"> <span id="workorder_rejected">0</span></a></div>
 </li><li> <div>Issued  <a href="#"><span id="workorder_completed">0</span></a></div>
 </li><li> <div>Forward to TA <a href="#"><span id="workorder_forward">0</span></a></div>
 </li><li> <div>Received from DDH  <a href="#"><span id="recivedfrom_ddh">0</span></a></div>
 </li><li> <div>Yet to forward to RSK  for Post-Inspection   <a href="#"><span id="yettoforward_rsk_wo">0</span></a></div>
 </li><li> <div>Forwarded to RSK for Post-Inspection  <a href="#"><span id="forwardto_rsk_wo">0</span></a></div>
 </li></ul> 
 
 
 <ul>
 <h1>Post-inspection</h1>
 <li> <div>Application for post-inspection <a href="#"><span id="postinspection">0</span></a></div>
 </li><li> <div>Pending  <a href="#"><span id="postinspection_pending">0</span></a></div>
 </li><li> <div>Rejected <a href="#"><span id="postinsepection_rejected">0</span></a></div>
 </li><li> <div>Inspection Done  <a href="#"><span id="postinspection_completed">0</span></a></div>
 </li><li> <div>Forward to TA for taluka approval<a href="#"><span id="postinspection_forward">0</span></a> </div>
 </li><li> <div>Received from RSK<a href="#"><span id="postinspection_received">0</span></a></div></li>
   <li> <div> Yet to forward for taluka approval<a href="#"><span id="postinspection_ta_approval_yet">0</span></a></div> </li>
	<li> <div>Forward for taluka approval <a href="#">  <span id="postinspection_ta_approval">0</span> </a></div> </li>
 
 </ul> 
 <ul>
 <h1>Taluka Approval</h1>
   <li> <div>Application for taluka approval <a href="#"><span id="taluka_approval">0</span></a></div> 
   </li>
	<li> <div>Pending <a href="#"><span id="taluka_approval_pending">0</span></a></div> 
	</li>
	<li><div>Rejected <a href="#"><span id="p">0</span></a></div></li>
	  <li><div>Approved <a href="#"><span id="talukaapproval_done">0</span></a></div></li>
	  <li> <div>Yet to forward to DDH  <a href="#"><span id="p">0</span></a></div>
	  </li>
	<li><div>Forward to DDH   <a href="#"><span id="p">0</span></a></div></li> 
	  <li> <div>Application for sanaction order <a href="#"><span id="applicationfor_sanctionorder">0</span></a></div> </li>
	<li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	 
 </ul>
 <ul>
 <h1>Sanction Order</h1>
   <li> <div>Application for post-inspection <a href="#"><span id="sanctionorder_applications">0</span></a></div> </li>
	<li> <div>Pending <a href="#"><span id="sanctionorder_applications_pending">0</span></a></div> 
	</li>
	<li><div>Rejected <a href="#"><span id="p">0</span></a></div></li>
	  <li><div>Approved <a href="#"><span id="sanctionorder_applications_approved">0</span></a></div></li>
	  <li> <div>Yet to forward to DDH  <a href="#"><span id="p">0</span></a></div>
	  </li>
	<li><div>Forward to DDH <a href="#"><span  id="sanctionorder_applications_approved_forward">0</span></a></div></li>
	  <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	 
 </ul>
<ul>
 <h1>District Approval</h1>
   <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Pending <a href="#"><span id="p">0</span></a></div> 
	</li>
	<li><div>Rejected <a href="#"><span id="p">0</span></a></div></li>
	  <li><div>Approved <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Yet to forward to DDH  <a href="#"><span id="p">0</span></a></div>
	  </li>
	<li><div>Forward to DDH <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	 
 </ul>
 <ul>
 <h1>DC Bills</h1>
   <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Pending <a href="#"><span id="p">0</span></a></div> 
	</li>
	<li><div>Rejected <a href="#"><span id="p">0</span></a></div></li>
	  <li><div>Approved <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Yet to forward to DDH  <a href="#"><span id="p">0</span></a></div>
	  </li>
	<li><div>Forward to DDH for sanaction order <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	 
 </ul>
  <ul>
 <h1>Payments</h1>
   <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Pending <a href="#"><span id="p">0</span></a></div> 
	</li>
	<li><div>Rejected <a href="#"><span id="p">0</span></a></div></li>
	  <li><div>Approved <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Yet to forward to DDH  <a href="#"><span id="p">0</span></a></div>
	  </li>
	<li><div>Forward to DDH for sanaction order <a href="#"><span id="p">0</span></a></div></li>
	  <li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	<li> <div>Application for post-inspection <a href="#"><span id="p">0</span></a></div> </li>
	 
 </ul>
 
</div>
 <script type="text/javascript">
 $(document).ready(function(){
 var desig="<?php print $user["designation"]?>";
 if(desig!="ALL"){
 $("li").addClass("remove");
  
 var key="li[role='"+desig+"']";
 
 $(key).removeClass("remove");
 $("li[class='remove'] a").click(function(){
 
 return false;
 });
 }
 });
 
 </script>
