<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Farmer</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;

 ?>
 <script type="text/javascript" src="js/farmer.js"></script>
</head>

<body>
<div class="title">Farmer details</div>
<div class="viewport">
<form name"farmer" onsubmit="return false">
<table class="excel90" >
<tr><td> <a href="farmer_reg.php"><img src="images/addnew.png"/></a></td><td></td><td style="width:550px;"> </td></tr>
			 <tr>
			 <td colspan="4" valign="top">
			 <div style="height:400px; overflow:auto">
 <div style="height:360px; overflow:auto">
 
<table class="excel90 margin"  filter='Y'  cellpadding="0" cellspacing="0">
<thead><th>Benficary Id</th><th>Name</th><th>Relation name</th><th>Village name</th><th>Total land</th><th>Land Register</th><th>Scheme Register</th></thead>
<tbody>
<?php 
 
$query="select f.id,f.firstname name,f.fathername fname,s.state_name,(select sum(totalland) from landdetails where regid=f.id)tland from farmerdetails f,states s where f.village = s.id";
if(!empty($_REQUEST["searchin"])){
$query.=" and f.".$_REQUEST["searchin"]." like '".$_REQUEST["searchval"]."%' ";
}
 $query.=" limit 10";
 
$result=$conn->query($query);
foreach($result as $row){

echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["fname"]."</td><td>".$row["state_name"]."</td><td>".$row["tland"]."</td><td><a href='landdetails.php?regid=".$row["id"]."'>Land details</a></td><td><a href='scheme_filling.php?regid=".$row["id"]."'>Schemes</a></td></tr>";
}
 ?>
</tbody>
</table>
 </div>
<div style="height:40px;"></div>
			 </div>
			 </td>
			 </tr>
</table>
</form>
 

 
</div>
</body>
</html>
