 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$query="";
$count="";
 
?>
 
 
 
<table    class="excel90 form grid" style="margin:5px; ">
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
        
        <td class="pro_0">Rejected by DDH</td><td class="pro_1" > <a href="#"><span id="workorder_rejected">0</span></a></td>
        
        <td class="pro_0">Rejected by RSK </td>
        <td class="pro_1" > <a href="#"><span id="postinsepection_rejected">0</span></a></td>
       
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
   
        <td class="pro_0">Pending Applications at DDH</td><td class="pro_1" > <a href="#"><span id="workorder_pending">0</span></a></td>
        
        <td class="pro_0">Pending applications</td>
        <td class="pro_1" > <a href="#"><span id="postinspection_pending">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_0">Yet to forward for pre-inspection</td>
          <td class="pro_1"><a href="#"><span id="yettoapproval">0</span></a></td>
        
        <td class="pro_0">Pre-inspection done </td>
        <td class="pro_1" ><a href="#"><span id="preinspection_completed">0</span></a></td>
        
        <td class="pro_0">Submitted to TA for post-inspection </td>
        <td class="pro_1" > <a href="#"><span id="workorder_completed">0</span></a></a></td>
      
        <td class="pro_0">Submitted to TA for taluka approval </td>
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
     
        <td class="pro_0">Received from RSK</td> 
        <td class="pro_1"> <a href="#"><span id="recivedfrom_rsk">0</span></a> </td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
   
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
         <td class="pro_0">Pending files at RSK </td> 
         <td class="pro_1"> <a href="#"><span id="forwardedtorsk">0</span></a> </td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > </td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
    
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
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
	  <tr>
         <td class="pro_0">Received from DDH for Post-inspecction</td> 
         <td class="pro_1"> <a href="#"><span id="recivedfrom_ddh">0</span></a> </td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" >  </td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
		 <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
	  </tbody>
    </table>
	 
 