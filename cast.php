<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Casts</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){
$conn->insert("casts",array("castname"=>strtoupper($_POST["castname"]),"castname_k"=>$_POST["castname_k"],"castcode"=>$_POST["castcode"]));
header('Location: '."cast.php");
die();
}
 ?>
</head>

<body>
<div class="title">Casts</div>
<div class="viewport">
<form name="castform" method="post" action="cast.php">
<table class="form xlarge">
<tr><td>Enter cast name</td><td>:</td><td><input name="castname" type="text" /><input type="text" name="castname_k" alt="ka" id="castname_k"/></td></tr>
<tr><td>Cast Code</td><td>:</td><td><input name="castcode" type="text" /></td></tr>
<tr><td colspan="3" align="right"><input type="submit" class="login_button" value="Save" /></td></tr>
 
</table>
</form>
 
<table class="grid medium" style="margin:25px;" >
<thead><tr><th>Cast</th><th>Cast kannada</th><th>Cast Code</th></tr></thead>
<tbody>
<?php 
$result=$conn->select("casts",array("castname","castname_k","castcode"));
foreach($result as $row){
echo "<tr><td>".$row["castname"]."</td><td>".$row["castname_k"]."</td><td>".$row["castcode"]."</td></tr>";
}

?>
</tbody>
</table>
 
</div>
</body>
</html>
