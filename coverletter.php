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
 <script type="text/javascript" src="/js/jspdf.js"></script>
 
 
 
</head>

<body>
<div class="title">Cover Letter's</div>
<div class="viewport">
<input type="button" value="PDF"  />
<div   name="report" id="report"  style="  height:500px; overflow:auto">
<?php 
 $schemefillingid = $_POST["schemefillingid"];
    foreach($schemefillingid as $fileid) {
      
 $query="select f.id,f.firstname_k,s.id fileid ,s.regdate,(select group_concat(landsono ) from landdetails where id in(select landdetailsid from schemefilling_land where fillingid=".$fileid." )) survayno, concat((select cropname from cropitems where id= s.item1),''||(select cropname from cropitems where id= s.item2),''||(select cropname from cropitems where id= s.item3)) crops, s.regdate regdate  from schemefilling s , farmerdetails f where s.regid= f.id and s.id=".$fileid.""; 
       
$result =$conn->query($query);
foreach($result as $letter){
?>
<div id="<?php echo $fileid; ?>">
Pleas make a inspection of Mr/Mrs <u><?php echo $letter["firstname_k"]; ?></u> with the farmer registration id<u> <?php echo $letter["id"]; ?></u>holding the scheme filling id <u><?php echo $letter["fileid"] ?></u> registerd on <?php echo $letter["regdate"] ?> with the land survayno <u> <?php echo $letter["survayno"] ?></u> for the crop's
<u><?php echo $letter["crops"] ?></u>
</div>
<?php
}
}
?>
</div>
 
</div>
</body>
</html>
