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
 <script type="text/javascript">
 $(document).ready(function(){
 $("tr td[class='dash']").each(function(){
 var index=$(this).index();
 var key1="td:eq("+(index-3)+") a";
  var key2="td:eq("+(index-2)+") a";
   var key3="td:eq("+(index-1)+") a";
 var t1=Number($(this).parent().find(key1).html())+Number($(this).parent().find(key2).html())+Number($(this).parent().find(key3).html());
 $(this).find("a").html(t1);
 });
 
 $("tr[class='total'] td").each(function(){
 var column=$(this).index();
 
 var key="tr[class='schemes']";
 var total=0;
 
 $(key).each(function(){
 var td="td:eq('"+column+"') a";
 console.log(column+":"+$(this).find(td).html());
 total=total+Number($(this).find(td).html());
 });
 
 
 $(this).html(total);
 
 });
 
 
 });
 </script>
</head>
<body>
<div class="title">Home</div>
<div class="viewport">
<br/><br/>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" id="hometargets">
 
    <tr>
      <td align="center" valign="top"><table width="100%" border="1" cellspacing="0" cellpadding="0" style="border:1px solid #666">
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
		foreach($result as $row){
		?>
        <tr class="schemes">
          <td class="dash_a"><?php echo $row["name"]; ?></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">75</a></td>
          <td class="dash_c"><a href="#">25</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash_c"><a href="#">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
        </tr>
       <?php
	   
	    } 
		?>
        <tr class="total">
          <td class="dash">Total</td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
          <td class="dash"><a href="#" style="color:#FFF">100</a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </table>
</div>
</body>
</html>