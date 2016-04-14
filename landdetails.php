<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Land Details</title>
<style type="text/css">
#existing tr td:last-child ,#existing tr th:last-child {
display:none;
}
</style>
<?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>
 <script type="text/javascript" src="js/landdetails.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
 
 landdetailsjs.searchRegistration();
 });
 </script>
</head>

<body>
<div class="title">Land Details</div>
<div class="viewport">
<table class="xlarge"><tr><td>
<table class="form xlarge margin hide">
 <tr><td><input  type="text" id="search" class="search" placeholder="Search" value="<?php echo $_REQUEST["regid"]; ?>"  />
             <select name="select" id="searchin">
               <option value="id" selected="selected">Reg.No</option>
               <option value="rationcard">Ration card no</option>
               <option value="aadhar">Adhar</option>
			    <option value="voter">Voter</option>
             </select><input type="button" value="Search" onclick="landdetailsjs.searchRegistration()"/></td></tr>
</table>
<form method="POST"  name="form1" onsubmit="return false;">
<table class="form xlarge">
<tr><td class="label medium"> First name</td><td>:</td><td><input   type="text"  id="firstname_text" placeholder="First Name"/><input type="hidden" id="regid" name="regid"/></td> </tr>
<tr> <td class="label">Father/Husband Name  </td><td>:</td><td ><input   type="text"  id="fathername_text" placeholder="Father/Husband name"  /></td></tr>
<tr><td class="label">House No</td><td>:</td><td><input id="houseno_text" type="text" placeholder="House no"></input></td></tr>
<tr><td class="label">Village</td><td>:</td><td><input id="village_text" type="text" placeholder="Village/City name"/></td></tr>
 						  
							  
							  <tr><td class="label">Select village</td><td>:</td>
							    <td><select name="villageid"  search="search" autofocus="autofocus" autocorrect="off" autocomplete="off"   >
                                  <option>Select</option>
                                  <?php 
			   $user=$_SESSION["logged_in"];
			   $query="select s.id, concat(s.state_name,'/',s.state_name_k,'(', ";
			   $query.="  (select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.talukaid)";
			  $query.=" ,')') vname from village v ,states s where s.id= v.villageid and v.hobliid in (select am.hobliid from actionmapping am where am.hobliid=v.hobliid and am.regid=".$user["id"].")";
			   $result=$conn->query($query);
			   echo $query;
			   foreach($result as $row){
			   echo "<option value='".$row["id"]."'>".$row["vname"]."</option>";
			   }
			   ?>
                                </select></td>
							  </tr>
<tr><td class="label">Land survay no</td><td>:</td><td><input type="text" name="landsono"/></td></tr>
<tr><td class="label">Address</td><td>:</td><td><input type="text" name="address"/></td></tr>
<tr><td class="label">Pin code</td><td>:</td><td><input type="text" name="pincode"/></td></tr>
<tr>
  <td class="label">Land area in hectr </td>
  <td>:</td><td><input type="text" name="totalland"/><input type="button" class="button" value="Add" onclick="landdetailsjs.saveData();"/></td></tr>
</table>
</form>
</td><td valign="top"><table class="grid margin large" id="existing">
							  <thead>
							  <tr><th>Land survay no</th><th>Village</th><th>Total Land</th><th></th></tr>
							  </thead>
							  <tbody>
							  </tbody>
							  </table></td></table>
</div>
</body>
</html>
