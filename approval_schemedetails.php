 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$query="";
$count="";
 
?>
 
 
 
<table    class="grid excel">
 <thead> <tr>
	  <th></th>
        <th>TA</th>
        <th>Pre-Inspection</th>
        <th>Work Order</th>
        <th>Post-Inspection</th>
        <th>Taluk Approval</th>
        <th>District Approval</th>
        <th>DC Bill</th>
        <th>Payment</th>
        
      </tr></thead>
<tbody>
     
      <tr>
          <td class="pro_1"> Total Application</td>
        <td class="pro_1" > <a href="#"> <span id="scheme_filling_val">0</span></a></td>
        
        <td class="pro_1"><a href="#"><span id="preinspection">0</span></a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
       
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
         
        <td class="pro_1"><a href="#">0</a></td>
         
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
	 
      </tr>
      <tr>
             <td class="pro_1"> Rejected </td>
             <td class="pro_1"><a href="#"><span id="scheme_reject">0</span></a></td>
      
        <td class="pro_1"><a href="#"><span id="preinspection_rejected">0</span></a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
       
        <td class="pro_1"><a href="#">0</a></td>
     
        <td class="pro_1"><a href="#">0</a></td>
    
        <td class="pro_1"><a href="#">0</a></td>
       
        <td class="pro_1"><a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_1"> Pending </td>
          <td class="pro_1"><a href="#"  ><span id="pendding">0</span></a></td>
       
        <td class="pro_1"><a href="#"><span id="preinspection_pending">0</span></a></td>
   
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
      
        <td class="pro_1"><a href="#">0</a></td>
      
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
      </tr>
      <tr>
          <td class="pro_1"> Yet to forward </td>
          <td class="pro_1">(RSK)<a href="#"><span id="yettoapproval">0</span></a></td>
        
        <td class="pro_1"><a href="#"><span id="preinspection_completed">0</span></a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
      
        <td class="pro_1"><a href="#">0</a></td>
         
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#"></a></td>
     
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
         <td class="pro_1"> Forward to </td>
         <td class="pro_1">(RSK)<a href="#"><span id="forwardtorsk">0</span></a> </td>
     
         <td class="pro_1"><a href="#"><span id="preinspection_rsk_received">0</span></a> </td>
         
        <td class="pro_1"><a href="#">0</a> </td>
        
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#">0</a></td>
 
        <td class="pro_1"><a href="#">0</a></td>
   
        <td class="pro_1"><a href="#"></a></td>
       
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
          <td class="pro_1">Pending files at </td>
          <td class="pro_1">(RSK)<a href="#"><span id="forwardedtorsk">0</span></a> </td>
  
        <td class="pro_1"><a href="#"><span id="preinspection_ddh">0</span></a></td>
 
        <td class="pro_1"><a href="#">0</a></td>
    
        <td class="pro_1"><a href="#"></a></td>
 
        <td class="pro_1"><a href="#">0</a></td>
    
        <td class="pro_1"><a href="#">0</a></td>
        
        <td class="pro_1"><a href="#"></a></td>
  
        <td class="pro_1"><a href="#"></a></td>
      </tr>
    
       
	  </tbody>
    </table>
 
