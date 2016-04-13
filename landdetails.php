<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Land Details</title>
<?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>
 <script type="text/javascript" src="js/landdetails.js"></script>
</head>

<body>
<div class="title">Land Details</div>
<div class="viewport">

<table class="form xlarge margin">
 <tr><td><input  type="text" id="search" class="search" placeholder="Search"  />
             <select name="select" id="searchin">
               <option value="id">Reg.No</option>
               <option value="rationcard">Ration card no</option>
               <option value="aadhar">Adhar</option>
			    <option value="voter">Voter</option>
             </select><input type="button" value="Search" onclick="landdetailsjs.searchRegistration()"/></td></tr>
</table>
<form method="POST"  name="form1" onsubmit="return false;">
<table class="form xlarge">
<tr><td class="label medium"> First name</td><td>:</td><td><input   type="text"  id="firstname_text" placeholder="First Name"/><input type="hidden" id="regid" name="regid"/></td><td class="large" rowspan="10" style="border:1px solid #666666; background-color:#FFFFFF;" valign="top">
							  
							  <table class="grid large" id="existing">
							  <thead>
							  <tr><th>Land survay no</th><th>Village</th><th>Total Land</th></tr>
							  </thead>
							  <tbody>
							  
							  </tbody>
							  </table>
							  
							  </td></tr>
<tr> <td class="label">Father/Husband Name  </td><td>:</td><td ><input   type="text"  id="fathername_text" placeholder="Father/Husband name"  /></td></tr>
<tr><td class="label">House No</td><td>:</td><td><input id="houseno_text" type="text" placeholder="House no"></input></td></tr>
<tr><td class="label">Village</td><td>:</td><td><input id="village_text" type="text" placeholder="Village/City name"/></td></tr>
 						  
							  
							  <tr><td class="label">Select village</td><td>:</td><td><select name="villageid"    >
                       <option>Select</option>
    <?php 
			   $user=$_SESSION["logged_in"];
			   $query="select s.id, concat(s.state_name,'/',s.state_name_k,'      (',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.stateid)";
			  
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.districtid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.talukaid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.constituencyid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.panchayatiid)";
			    $query.=" ,'') vname from village v ,states s where s.id= v.villageid and v.hobliid in (select am.hobliid from actionmapping am where am.hobliid=v.hobliid and am.regid=".$user["id"].")";
			   $result=$conn->query($query);
			   echo $query;
			   foreach($result as $row){
			   echo "<option value='".$row["id"]."'>".$row["vname"]."</option>";
			   }
			   ?>
			   
			                  </select></td></tr>
<tr><td class="label">Land survay no</td><td>:</td><td><input type="text" name="landsono"/></td></tr>
<tr><td class="label">Address</td><td>:</td><td><input type="text" name="address"/></td></tr>
<tr><td class="label">Pin code</td><td>:</td><td><input type="text" name="pincode"/></td></tr>
<tr><td class="label">Total land</td><td>:</td><td><input type="text" name="totalland"/><input type="button" class="button" value="Add" onclick="landdetailsjs.saveData();"/></td></tr>
 

</table>
</form>
</div>
</body>
</html>
