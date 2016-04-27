 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$query="";
$count="";
 
?>
 
 <div id="status_board">
 <!--
 <thead><tr style="background-color:#099; color:#FFF; text-align:center"><th>Applications</th><th>Pre-Inspection</th><th>WorkOrder</th><th>Post-inspection</th><th>Taluka Approval</th><th>Sanxtion Order</th><th>District Approval</th><th>DC Bill</th><th>Payment</th></tr></thead>-->
 <ul>
 <h1>Applications</h1>
   <li> <div><div> Total application </div><a href="#"> <span id="scheme_filling_val">0</span></a></div>  </li>
   <li> <div><div>Pending </div><a href="#"><span id="pendding">0</span></a></div></li>
   <li> <div><div>Rejected </div><a href="#"><span id="scheme_reject">0</span></a></div> </li>
   <li> <div><div>Yet to forward for pre-inspection </div><a href="#"><span id="yettoapproval">0</span></a></div></li>
   <li> <div><div>Forward to RSK for pre-inspection </div><a href="#"><span id="forwardtorsk">0</span></a></div> </li>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
   </ul> 
   
   
   
   <ul>
 <h1>Pre-inspection</h1>
 <li> <div><div>Applications available for 
   Pre-Inspection </div><a href="#"><span id="preinspection">0</span></a></div>
 </li><li> <div><div> Pending </div><a href="#"><span id="preinspection_pending">0</span></a></div>
 </li><li> <div><div> Rejected  </div><a href="#"><span id="preinspection_rejected">0</span></a></div>
 </li><li> <div><div> Inspection done </div><a href="#"><span id="preinspection_completed">0</span></a> </div>
 </li><li> <div><div> Forward to TA </div><a href="#"><span id="forward_preinspection">0</span></a> </div>
 </li><li> <div><div> Received from RSK </div><a href="#"><span id="recivedfrom_rsk">0</span></a></div>
 </li><li> <div><div>Yet to forward to DDH Office for Work Order</div><a href="#"><span id="yettoforward_ddh">0</span></a></div>
 </li><li> <div><div>Forward to DDH Office for Work Order </div><a href="#"><span id="forwardto_ddh">0</span></a></div>
 </li></ul> 
 
 
 
 <ul>
 <h1>Work-order</h1>
 <li> <div><div>Application for work-order</div><a href="#"><span id="workorder">0</span></a></div>
 </li><li> <div><div>Pending</div><a href="#"><span id="workorder_pending">0</span></a> </div>
 </li><li> <div><div>Rejected </div><a href="#"> <span id="workorder_rejected">0</span></a></div>
 </li><li> <div><div>Issued </div><a href="#"><span id="workorder_completed">0</span></a></div>
 </li><li> <div><div>Forward to TA</div><a href="#"><span id="workorder_forward">0</span></a></div>
 </li><li> <div><div>Received from DDH </div><a href="#"><span id="recivedfrom_ddh">0</span></a></div>
 </li><li> <div><div>Yet to forward to RSK  for Post-Inspection  </div><a href="#"><span id="yettoforward_rsk_wo">0</span></a></div>
 </li><li> <div><div>Forwarded to RSK for Post-Inspection </div><a href="#"><span id="forwardto_rsk_wo">0</span></a></div>
 </li></ul> 
 
 
 <ul>
 <h1>Post-inspection</h1>
 <li> <div><div>Application for work-order </div><a href="#"><span id="postinspection">0</span></a></div>
 </li><li> <div><div>Pending </div><a href="#"><span id="postinspection_pending">0</span></a></div>
 </li><li> <div><div>Rejected</div><a href="#"><span id="postinsepection_rejected">0</span></a></div>
 </li><li> <div><div>Inspection Done </div><a href="#"><span id="postinspection_completed">0</span></a></div>
 </li><li> <div><div>Forward to TA for taluka approval </div>
 </li><li> <div><div>Received from RSK</div>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
 
 </ul> 
 <ul>
 <h1>Taluka Approval</h1>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	 
 </ul>
 <ul>
 <h1>Sanction Order</h1>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	 
 </ul>
 <ul>
 <h1>District Approval</h1>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	 
 </ul>
 <ul>
 <h1>Dc Bills</h1>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	 
 </ul>
  <ul>
 <h1>Payments</h1>
   <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	  <li> <div><div></div><a href="#"><span></span></a></div> </li>
	<li> <div><div></div><a href="#"><span></span></a></div> </li>
	 
 </ul>
 
</div>
 
