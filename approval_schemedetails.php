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
        <th colspan="2">District Approval</th>
        <th colspan="2">DC Bill</th>
        <th colspan="2">Payment</th>
        
      </tr></thead>
<tbody>
     
      <tr>
        <td class="pro_0">Total applications</td><td class="pro_1" > <a href="#"> <span id="scheme_filling_val">0</span></a></td>
        
        <td class="pro_0">Applications available for
Pre-Inspection</td><td class="pro_1" > <a href="#"><span id="preinspection">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
             <td class="pro_0">Rejected</td>
             <td class="pro_1" > <a href="#"><span id="scheme_reject">0</span></a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"><span id="preinspection_rejected">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
     
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_0">Pending application </td>
          <td class="pro_1" > <a href="#"><span id="pendding">0</span></a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"><span id="preinspection_pending">0</span></a></td>
   
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_0">Yet to forward RSK </td>
          <td class="pro_1"><a href="#"><span id="yettoapproval">0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"><span  >0</span></a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
      
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
     
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
      </tr>
      <tr>
        <td class="pro_0">Forward to rsk </td>  
       <td class="pro_1"> <a href="#"><span id="forwardtorsk">0</span></a> </td>
     
        <td class="pro_0">&nbsp;</td> 
        <td class="pro_1"> <a href="#"><span id="preinspection_completed">0</span></a> </td>
         
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a> </td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
   
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
       
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
      </tr>
      <tr>
         <td class="pro_0">Pending files at RSK </td> 
         <td class="pro_1"> <a href="#"><span id="forwardedtorsk">0</span></a> </td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"><span id="preinspection_ddh">0</span></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
      </tr>
	  
	  
	  <tr>
         <td class="pro_0">Received from RSK </td> 
         <td class="pro_1"> <a href="#"><span id="recivedfrom_rsk">0</span></a> </td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"><span id="preinspection_ddh">0</span></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
 
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
    
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#">0</a></td>
        
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
  
        <td class="pro_0">&nbsp;</td><td class="pro_1" > <a href="#"></a></td>
      </tr>
	  </tbody>
    </table>
	 
 