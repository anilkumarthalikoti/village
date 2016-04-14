<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Company/Dealer</title>
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
if(!empty($_POST)){

$conn->insert("dealers_company",array("name"=>trim(strtoupper($_POST["name"])), "name_k"=>$_POST["name_k"],"parent_id"=>$_POST["parent_id"]));
header('Location: '."adddealer.php?tabview=".$_POST["tabview"]);
die();
}
 ?>
 <script type="text/javascript">
 $(document).ready(function(){
 <?php 
 if(!empty($_REQUEST["tabview"])){
 echo "$('#".$_REQUEST["tabview"]."').click()";
 }
 ?>
  
 });
 </script>
</head>

<body>
<div class="title">Company/Dealer details </div>
<div class="viewport">
<ul id="tabs">

      <li><a id="tab1">Company</a></li>
	   <li><a id="tab2">Dealer</a></li>
     
       

</ul>
<div class="container" id="tab1C">
<form name"company" onsubmit="adddealer.php" method="post">
<input type="hidden" name="tabview" value="tab1"/>
<input type="hidden" name="parent_id" value="0"/>
 <table class="form margin xlarge">
 <tr>
   <td>Company name</td>
   <td>:</td><td><input type="text" name="name" id="name" placeholder="Company name"/> <input type="text" alt="ka" name="name_k" id="name_k"/></td></tr>
 <tr><td colspan="3"><input type="submit" value="Save"/></td></tr>
 
 </table>
 <table class="grid margin xlarge">
 <thead><tr><th></th>
 <th>Company   name</th>
 <th> Company name(K)</th>
 </tr>
 </thead>
 <tbody>
 <?php 
 $result=$conn->select("dealers_company",array("name","name_k"),array("parent_id"=>0));
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["name"]."</td><td>".$row["name_k"]."</td></tr>";
 }
 ?>
 </tbody>
 </table> 
 </form>
 </div>
 <div class="container" id="tab2C">
 <form name"delear" onsubmit="adddealer.php" method="post">
 <input type="hidden" name="tabview" value="tab2"/>
 <table class="form margin xlarge">
 <tr>
   <td>Dealer name</td>
   <td>:</td><td>
   <select name="parent_id">
   <option value="-1">--Select--</option>
   <?php
   $result=$conn->select("dealers_company",array("id","name","name_k"),array("parent_id"=>0));
   foreach($result as $row){
   echo "<option value='".$row["id"]."'>".$row["name"]."</option>";
   }
    ?>
   </select>
   </td></tr>
  <tr>
   <td>Company name</td>
   <td>:</td><td><input type="text" name="name" id="name_d" placeholder="Dealer name"/> <input type="text" alt="ka" name="name_k" id="name_k_d"/></td></tr>
 <tr><td colspan="3"><input type="submit" value="Save"/></td></tr>
 
 </table>
 <table class="grid margin xlarge">
 <thead><tr><th></th>
  <th>Company name</th>
 <th> Company name(K)</th>
 <th>Delear name</th>
 <th> Delear name(K)</th>
 </tr>
 </thead>
 <tbody>
 <?php 
 $query="select d1.name orgname, d1.name_k orgname_k,d2.name, d2.name_k from dealers_company d1, dealers_company d2 where d2.parent_id=d1.id and d1.parent_id=0";
 $result=$conn->query($query);
 $i=1;
 foreach($result as $row){
 echo "<tr><td>".$i."</td><td>".$row["orgname"]."</td><td>".$row["orgname_k"]."</td><td>".$row["name"]."</td><td>".$row["name_k"]."</td></tr>";
$i++;
 }
 ?>
 </tbody>
 </table> 
 </form>
 </div>
</div>
</body>
</html>
