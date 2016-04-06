<html>
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
 <script src="js/rolecreation.js" type="text/javascript"></script>

</head>

<body >
<?php
session_start();
require "server/app_connector.php";
$con=$database;
$query_links="select * from page_links";
$query_roles="select * from role_mstr";
if(!empty( $_POST ) )
{
//Add new role
if($_POST["method_call"]=="newrole"){
if(strlen(trim($_POST["role_name"]))!=0){
$role_name=strtoupper(trim($_POST["role_name"]));
$query1="insert into role_mstr(ROLE_NAME) values('".$role_name."')";
 
$con->query($query1);
 var_dump($con->error());
}
}
//Update role dtls
if($_POST["method_call"]=="update_role_dtl"){
 $role_id=$_POST["role_id_selected"];
 $dtl_role=$_POST["linkid"];
 foreach($dtl_role as $link){
$query1="insert into role_dtl(ROLE_ID,PAGE_LINK_ID) values(".$role_id.",".$link.")";
 
$con->query($query1);
 }
 
}
}
?>
<div class="title"><span>Permission Creation</span></div> 
<div class="viewport">


  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
    
    <tr>
<td  ><form id="newRole" action="rolecreation.php" method="post">New Role:<input type="text" name="role_name" id="role_name"/>
<input type="hidden" name="method_call" value="newrole" />
<input type="button" onClick="rolecreate.createRole()" value="Add Role" class="button_login"/></form></td>
    </tr>
      <tr><td>
	  <div>
	  <table width="100%">
	 <tr><td width="350" valign="top" >
	 
	 <table width="100%" class="grid" style="margin-left:20px;" id="role_mstr">
	 <thead>
	  <tr><th width="50"></th><th>Permission</th> </tr>
	  </thead>
	  <tbody>
	  <?php
	 $data=$con->query($query_roles)->fetchAll();
	 $i=1;
	 foreach($data as $role){
	 echo "<tr onclick='rolecreate.setRole(this.id)' role_id='".$role['role_id']."' id='".$role['role_id']."'><td>".$i."</td><td>".$role['ROLE_NAME']."</td></tr>";
	 $i++;
	 }
	 ?>
	  </tbody>
	 </table></td>
	 <td  valign="top">
 
	 <div style="height:auto; max-height:300px; margin-left:40px;  max-width:400px; overflow:auto;">
	 <form name="role_dtl">
	 <input type="hidden" name="role_id_selected" id="role_id_selected"/>
	 <input type="hidden" name="method_call" value="update_role_dtl"/>
	 <table width="100%" class="grid" style="margin:0;">
	 <thead>
	 <tr><th width="80"></th><th>Link name</th><th width="50"><input type="checkbox" id="checkAll" onClick="rolecreate.checkAll();" />All</th></tr>
	 </thead>
	 <tbody>
	 <?php
	 $data=$con->query($query_links)->fetchAll();
	 $i=1;
	 foreach($data as $link){
	 echo "<tr><td>".$i."</td><td>".$link['linkname']."</td><td><input type='checkbox' name='linkid[]' value='".$link['linkid']."'/></td></tr>";
	 $i++;
	 }
	 ?>
	 </tbody>
	 </table>
	 </form>
	 </div>
	 <div style="height:40px; max-width:450px; "><input type="button" class="button_login" value="Save" onClick="rolecreate.updateRole();" style="float:right; margin-right:0;"/></div>
 </td></tr></table></div>
	 </td></tr>
  </table>
 </div>
</body>
</html>