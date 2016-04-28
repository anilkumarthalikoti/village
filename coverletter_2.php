<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cover Letter</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
 $user=$_SESSION["logged_in"];
$conn=$database;

 ?>
  
 
 
 
</head>

<body>
<div class="title">Cover Letter's</div>
<div class="viewport2">
 
<span   name="report" id="report"  >
<?php 
$reportDate=date("d-m-Y",time());
?>
<div >
 <table class="reportmargin">
 <tr><td align="center">
 <img src="/images/reportheader.PNG"/><br/>
ತೋಟಗಾರಿಕೆ ಇಲಾಖೆ<br/>
(ಜಿಲ್ಲಾ ಪಂಚಾಯತ್) ವಿಜಯಪುರ
<hr />
</td>
<tr><td align="center"><div style="float:left">ಕ್ರ.ಸಂ.: ಹಿಸತೋನಿ (ಜಿ.ಪಂ.)/ವಿ/ತಾಸ/	</div>	/2016-17 			<div style="float:right">ದಿನಾಂಕ: <span  style="border-bottom:1px dotted #333333;"><?php  print $reportDate; ?></span></div></td></tr>
<tr><td align="left">
ಗೆ,<br/>
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅಧಿಕಾರಿ,<br/>
ರೈ.ಸಂ. ಕೇಂದ್ರ ತಿಕೋಟಾ<br/>
</td></tr>
<tr><td >
<p style="margin-left:40px;">
ವಿಷಯ : <span style="padding-left:20px">ಪ್ರಧಾನ ಮಂತ್ರಿ ಕೃಷಿ ಸಿಂಚಾಯಿ ಯೋಜನೆಯಡಿ 2016-17 ನೇ ಸಾಲಿನಲ್ಲಿ ಸೂಕ್ಷ್ಮ ಹನಿ ನೀರಾವರಿ 
           ಅಳವಡಿಸಿಲು  ಅರ್ಜಿ ಸಲ್ಲಿಸಿರುವ ಈ ಕೆಳಕಾಣಿಸಿದ ರೈತರ ತಾಕುಗಳ ಸ್ಥಳ ಪರಿಶೀಲನೆ ಮಾಡಿ,  ಸ್ಥಳ 
        ಪರಿಶೀಲನಾ ವರದಿ [ಕಾರ್ಯಾದೇಶ ನೀಡುವ ಮುನ್ನ (ನಮೂನೆ-3)]  ಸಲ್ಲಿಸುವ ಕುರಿತು. </span>
</p>
<p>
            ಮೇಲಿನ ವಿಷಯಕ್ಕೆ ಸಂಭಂದಿಸಿದಂತೆ ಪ್ರಧಾನ ಮಂತ್ರಿ ಕೃಷಿ ಸಿಂಚಾಯಿ ಯೋಜನೆಯಡಿ 2016-17 ನೇ ಸಾಲಿನಲ್ಲಿ ಸೂಕ್ಷ್ಮ ಹನಿ ನೀರಾವರಿ ಅಳವಡಿಸಿಲು ಅರ್ಜಿ ಸಲ್ಲಿಸಿರುವ ಈ ಕೆಳಕಾಣಿಸಿದ ರೈತರ ತಾಕುಗಳ ಸ್ಥಳ ಪರಿಶೀಲನೆ ಮಾಡಿ,   ಸ್ಥಳ ಪರಿಶೀಲನಾ ವರದಿಯನ್ನು [ಕಾರ್ಯಾದೇಶ ನೀಡುವ ಮುನ್ನ (ನಮೂನೆ-3)] ನಿಗದಿತ ನಮೂನೆಯಲ್ಲಿ ಭರ್ತಿ ಮಾಡಿ  ಸಲ್ಲಿಸಲು ಈ ಮೂಲಕ ಸೂಚಿಸಿದೆ.
</p>
</td></tr>
<tr><td details="reportdetails" class="margin"  align="center">
<table  class="excel90 grid">
<thead><th>File-id</th><th>Name</th><th>Survay no</th><th>Crop</th><th>Total area</th><th>Reg-date</th></thead>
<tbody>
<?php
 $schemefillingid = $_POST["schemefillingid"];
    foreach($schemefillingid as $fileid) {
      
 $query="select f.id fileid,f.firstname_k,s.id fileid ,s.regdate,(select group_concat(landsono ) from landdetails where id in(select landdetailsid from schemefilling_land where fillingid=".$fileid." )) survayno,concat(coalesce((select cropname_k from cropitems where id= s.item1),''),',',coalesce((select cropname_k from cropitems where id= s.item2),''),',',coalesce((select cropname_k from cropitems where id= s.item3),''))  crops, s.regdate regdate,TRUNCATE((coalesce(s.area1,0)+coalesce(s.area2,0)+coalesce(s.area3,0)),2) totalappland  from schemefilling s , farmerdetails f where s.regid= f.id and s.id=".$fileid.""; 
   
$result =$conn->query($query);
foreach($result as $letter){
?>
<tr style="background:#FFFFFF">
<td><?php print $letter["fileid"];?></td>
 <td><?php print $letter["firstname_k"];?></td>
 <td><?php print $letter["survayno"];?></td>
 <td><?php print $letter["crops"];?></td>
 <td><?php print $letter["totalappland"];?></td>
 <td><?php print  $letter["regdate"] ;?></td>
 


</tr>

<?php }} ?>
</tbody>
</table>
</td></tr>					
<tr><td align="left">					

ಲಗತ್ತು:  10 ಕಡತಗಳು 
</td></tr>
<tr><td align="right">
     ತಮ್ಮ ವಿಶ್ವಾಸಿ 

<br/>

ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು<br/>
        (ಜಿಲ್ಲಾ ಪಂಚಾಯತ್) ವಿಜಯಪುರ

</td></tr>

<tr><td align="left">


ಇಂದ,<br/>
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅಧಿಕಾರಿ,<br/>
ರೈ.ಸಂ. ಕೇಂದ್ರ ತಿಕೋಟಾ.  
</td></tr> </table>
</span>
 
 
 
</div>
</body>
</html>
