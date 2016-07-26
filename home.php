<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
 <?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;

 ?>
 <style type="text/css">
 .dash a,.dash_c a{
 text-decoration:none;
 width:100px;
 
 }
 </style>
  
</head>
<body>
<div class="title">Home</div>
<div class="viewport">
<br/><br/>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="hometargets" class="grid excel">
 
    <tr>
      <td align="center" valign="top"><table width="100%"  cellspacing="0" cellpadding="0" style="border:1px solid #666">
        <tr>
          <td rowspan="3" class="dash">Scheme</td>
          <td colspan="8" class="dash" align="center">Annual Target</td>
          <td colspan="4" class="dash" align="center">Budget Release</td>
          <td colspan="8" class="dash" align="center">Achievement</td>
          <td colspan="8" class="dash" align="center">Balance</td>
        </tr>
        <tr>
          <td colspan="4" class="dash">Physical</td>
          <td colspan="4" class="dash">Financial</td>
          <td colspan="4" class="dash">Financial</td>
          <td colspan="4" class="dash">Physical</td>
          <td colspan="4" class="dash">Financial</td>
          <td colspan="4" class="dash">Physical</td>
          <td colspan="4" class="dash">Financial</td>
        </tr>
        <tr>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
          <td class="dash_a">Gen</td>
          <td class="dash_a">SC</td>
          <td class="dash_a">ST</td>
          <td class="dash_a">Total</td>
        </tr>
		<?php 
		$query="select * from schemes where parent_id=0";
		$result =$conn->query($query);
		$totals=array();
		for($i=0;$i<28;$i++){
		$totals[$i]=0;
		}
		foreach($result as $row){
		$current=array();
		for($i=0,$k=0;$i<28;$i++,$k++){
		if($k<3){
		$current[$i]=mt_rand ( 50 , 100 );
		
		}else{
		$k=-1;
		$current[$i]=$current[$i-1]+$current[$i-2]+$current[$i-3];
		}
		$totals[$i]=$totals[$i]+$current[$i];
		}
		?>
        <tr class="schemes">
          <td class="dash_a"><?php echo $row["name"]; ?></td>
		  <?php
		  for($i=0,$k=0;$i<28;$i++,$k++){
		  if($k<3){
		  ?>
          <td class="dash_c"><a href="#"><?php echo $current[$i]?></a></td>
		  <?php
		  }else{
		  $k=-1;
		  ?>
       
          <td class="dash"><a href="#" style="color:#FFF"><?php echo $current[$i] ?></a></td>
		  <?php 
		  }
		  }
		  ?>
          
        </tr>
       <?php
	   
	     }
		
		?>
        <tr class="total">
          <td class="dash"><a href="#">Total</a></td>
		  <?php
		  for($i=0,$k=0;$i<28;$i++){
		  ?>
          <td class="dash"><a href="#" style="color:#FFF"><?php echo $totals[$i]?></a></td>
           <?php }?>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td><marquee direction="left" behavior="scroll" scrollamount="2" width="100%" onmouseover="this.stop()" onmouseout="this.start()" style="color:#06F">Welcome to Office Suite. </marquee></td>
    </tr>
  </table>
</div>
</body>
</html>