 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$query="";
$count="";
 
?>
 
 <table class="excel90 form" id="status_board">
 <thead><tr style="background-color:#099; color:#FFF; text-align:center"><th>Applications</th><th>Pre-Inspection</th><th>WorkOrder</th><th>Post-inspection</th><th>Taluka Approval</th><th>Sanxtion Order</th><th>District Approval</th><th>DC Bill</th><th>Payment</th></tr></thead>
 <tbody>
 <tr>
 <td><ul>
   <li> <div> Total application <a href="#"> <span id="scheme_filling_val">0</span></a></div>  </li>
   <li> <div>Pending <a href="#"><span id="pendding">0</span></a></div></li>
   <li> <div>Rejected <a href="#"><span id="scheme_reject">0</span></a></div> </li>
   <li> <div>Yet to forward for pre-inspection <a href="#"><span id="yettoapproval">0</span></a></div></li><li> <div>Forward to RSK for pre-inspection <a href="#"><span id="forwardtorsk">0</span></a></div> </li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div>Applications available for 
   Pre-Inspection <a href="#"><span id="preinspection">0</span></a></div>
 </li><li> <div> Pending <a href="#"><span id="preinspection_pending">0</span></a></div>
 </li><li> <div> Rejected  <a href="#"><span id="preinspection_rejected">0</span></a></div>
 </li><li> <div> Inspection done <a href="#"><span id="preinspection_completed">0</span></a> </div>
 </li><li> <div> Forward to TA <a href="#"><span id="forward_preinspection">0</span></a> </div>
 </li><li> <div> Received from RSK <a href="#"><span id="recivedfrom_rsk">0</span></a></div>
 </li><li> <div>Yet to forward to DDH Office for Work Order<a href="#"><span id="yettoforward_ddh">0</span></a></div>
 </li><li> <div>Forward to DDH Office for Work Order</div>
 </li></ul></td>
 <td><ul><li> <div>Application for work-order</div>
 </li><li> <div>Pending </div>
 </li><li> <div>Rejected </div>
 </li><li> <div>Issued</div>
 </li><li> <div>Forward to TA</div>
 </li><li> <div>Received from DDH </div>
 </li><li> <div>Yet to forward to RSK  for Post-Inspection </div>
 </li><li> <div>Forwarded to RSK for Post-Inspection</div>
 </li></ul></td>
 <td><ul><li> <div>Application for work-order</div>
 </li><li> <div>Pending</div>
 </li><li> <div>Rejected</div>
 </li><li> <div>Inspection Done </div>
 </li><li> <div>Forward to TA for taluka approval </div>
 </li><li> <div>Received from RSK</div>
 </li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 <td><ul><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li><li> <div></div></li></ul></td>
 
 </tr>
 </tbody>
 </table>
 
<table    class="excel90 form grid hide" style="margin:5px; ">
 <thead> <tr style="background-color:#099; color:#FFF; text-align:center"  >
	  <th colspan="2">Applications</th>
        <th colspan="2">Pre-Inspection</th>
        <th colspan="2">Work Order</th>
        <th colspan="2">Post-Inspection</th>
        <th colspan="2">Taluk Approval</th>
		<th colspan="2">Sanction Order</th>
        <th colspan="2">District Approval</th>
        <th colspan="2">DC Bill</th>
        <th colspan="2">Payment</th>
        
      </tr></thead>
<tbody>
     
      <tr>
        <td class="pro_0">Total applications</td><td class="pro_1" > <a href="#"> <span id="scheme_filling_val">0</span></a></td>
        
        <td class="pro_0">Applications available for
Pre-Inspection</td><td class="pro_1" > <a href="#"><span id="preinspection">0</span></a></td>
        
        <td class="pro_0">Application for work-order</td><td class="pro_1" > <a href="#"><span id="workorder">0</span></a></td>
       
        <td class="pro_0">Application for work-order</td>
        <td class="pro_1" > <a href="#"><span id="postinspection">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
             <td class="pro_0">Pending </td>
             <td class="pro_1" > <a href="#"><span id="pendding">0</span></a></td>
      
        <td class="pro_0">Pending</td>
        <td class="pro_1" > <a href="#"><span id="preinspection_pending">0</span></a></td>
        
        <td class="pro_0"> Pending </td>
        <td class="pro_1" > <a href="#"><span id="workorder_pending">0</span></a></td>
        
        <td class="pro_0">Pending</td>
        <td class="pro_1" > <a href="#"><span id="postinspection_pending">0</span></a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
     
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_0">Rejected</td>
          <td class="pro_1" > <a href="#"><span id="scheme_reject">0</span></a></td>
       
        <td class="pro_0">Rejected</td>
        <td class="pro_1" > <a href="#"><span id="preinspection_rejected">0</span></a></td>
   
        <td class="pro_0">Rejected </td>
        <td class="pro_1" > <a href="#"> <span id="workorder_rejected">0</span></a> </td>
        
        <td class="pro_0">Rejected</td>
        <td class="pro_1" > <a href="#"><span id="postinsepection_rejected">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_0">Yet to forward for pre-inspection</td>
          <td class="pro_1"><a href="#"><span id="yettoapproval">0</span></a></td>
        
        <td class="pro_0">Inspection done </td>
        <td class="pro_1" ><a href="#"><span id="preinspection_completed">0</span></a></td>
        
        <td class="pro_0">Issued</td>
        <td class="pro_1" > <a href="#"><span id="workorder_completed">0</span></a> </td>
      
        <td class="pro_0">Inspection Done </td>
        <td class="pro_1" > <a href="#"><span id="postinspection_completed">0</span></a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
     
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
        <td class="pro_0">Forward to RSK for pre-inspection </td>  
        <td class="pro_1"> <a href="#"><span id="forwardtorsk">0</span></a> </td>
     
        <td class="pro_0">Forward to TA </td> 
        <td class="pro_1"> <a href="#"><span id="forward_preinspection">0</span></a> </td>
         
        <td class="pro_0">Forward to TA </td>
        <td class="pro_1" ><a href="#"><span id="workorder_forward">0</span></a>  </td>
        
        <td class="pro_0">Forward to TA for taluka approval </td>
        <td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
   
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
         <td class="pro_0">&nbsp;</td> 
         <td class="pro_1"> <a href="#"></a> </td>
  
        <td class="pro_0">Received from RSK</td>
        <td class="pro_1" ><a href="#"><span id="recivedfrom_rsk">0</span></a> </td>
 
        <td class="pro_0">Received from DDH </td>
        <td class="pro_1" ><a href="#"><span id="recivedfrom_ddh">0</span></a>  </td>
    
        <td class="pro_0">Received from RSK </td>
        <td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
	  
	  
	  <tr>
         <td class="pro_0">&nbsp;</td> 
         <td class="pro_1"> <a href="#"></a> </td>
  
        <td class="pro_0">Yet to forward to DDH Office for Work Order</td>
        <td class="pro_1" ><a href="#"><span id="yettoforward_ddh">0</span></a>   </td>
 
        <td class="pro_0">Yet to forward to RSK  for Post-Inspection </td><td class="pro_1" > <a href="#"><span id="yettoforward_rsk_wo">0</span></a> </td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
	  <tr>
         <td class="pro_0">&nbsp;</td> 
         <td class="pro_1"> <a href="#"></a> </td>
  
         <td class="pro_0">Forward to DDH Office for Work Order</td>
         <td class="pro_1" ><a href="#"><span id="forwardto_ddh">0</span></a>  </td>
 
        <td class="pro_0">Forwarded to RSK for Post-Inspection</td>
        <td class="pro_1" > <a href="#"><span id="forwardto_rsk_wo">0</span></a> </td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
  </tbody>
</table>
	 
 