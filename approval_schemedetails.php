 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
 
$conn=$database;
$query="";
$count="";
 
?>
 
 
 
<table    class="grid excel">
 
<tbody>
      <tr>
        <td colspan="2" class="pro">Applications</td>
        <td colspan="2" class="pro">Pre-Inspection</td>
        <td colspan="2" class="pro">Work Order</td>
        <td colspan="2" class="pro">Post-Inspection</td>
        <td colspan="2" class="pro">Taluk Approval</td>
        <td colspan="2" class="pro">District Approval</td>
        <td colspan="2" class="pro">DC Bill</td>
        <td colspan="2" class="pro">Payment</td>
        
      </tr>
      <tr>
        <td class="pro_0" align="left" width="125px">Total Applications</td>
        <td class="pro_1" > <span id="scheme_filling_val">0</span></td>
        <td class="pro_0" align="left" width="140px">Applications available for<br />
          Pre-Inspection</td>
        <td class="pro_1"><a href="#"><span id="preinspection">0</span></a></td>
        <td class="pro_0" align="left" width="125px">Applications  available<br /> for
          Work Order</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left" width="140px">Applications  available for<br />
          Post-Inspection</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" width="140px">Applications  available for<br />
          Taluk Approval</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" width="140px">Applications  available for<br />
          District Approval</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" width="140px">Applications  available for<br />
          DC Bill</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" width="125px">Applications available <br />for Payment</td>
        <td class="pro_1"><a href="#">0</a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#"><span id="scheme_reject">0</span></a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#"><span id="preinspection_rejected">0</span></a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Rejected</td>
        <td class="pro_1"><a href="#">0</a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left">Yet to Forward for<br />
Pre-Inspection</td>
        <td class="pro_1"><a href="#"><span id="pendding">0</span></a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#"><span id="preinspection_pending">0</span></a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Pending</td>
        <td class="pro_1"><a href="#">0</a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left">Forwarded to RSK <br />
for Pre-Inspection</td>
        <td class="pro_1"><a href="#"><span id="rsk">0</span></a></td>
        <td class="pro_0" align="left">Inspection Done</td>
        <td class="pro_1"><a href="#"><span id="preinspection_completed">0</span></a></td>
        <td class="pro_0" align="left">Issued</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Inspection Done</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Approved</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Approved</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left">Received from RSK</td>
        <td class="pro_1"><a href="#"><span id="preinspection_rsk_received">0</span></a></td>
        <td class="pro_0" align="left">Received from DDH Office</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Received from RSK</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Yet to Forward </td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Received from DDH Office</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left">Yet to forward to DDH<br /> Office for Work Order</td>
        <td class="pro_1"><a href="#"><span id="preinspection_ddh">0</span></a></td>
        <td class="pro_0" align="left">Yet to forward to RSK <br />for Post-Inspection</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left">Forwarded to DDH Office for District Approval</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left">Yet to forward to <br />AS for DC Bill</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left">Forwarded to DDH <br />Office for Work Order</td>
        <td class="pro_1"><a href="#"><span id="preinspection_ddh_forward">0</span></a></td>
        <td class="pro_0" align="left">Forwarded to RSK <br />for Post-Inspection</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left">&nbsp;</td>
        <td class="pro_1">&nbsp;</td>
        <td class="pro_0" align="left">Forwarded to AS <br>for DC Bill</td>
        <td class="pro_1"><a href="#">0</a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
        <td class="pro_0" align="left"></td>
        <td class="pro_1"><a href="#"></a></td>
      </tr>
      <tr>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"><span id="application_total">0</span></a></td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"> <span id="preinspection_total">0</span></a></td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
        <td class="pro_0" align="left">Cumulative Total</td>
        <td class="pro_1"><a href="#"></a>0</td>
      </tr>
	  </tbody>
    </table>
 
