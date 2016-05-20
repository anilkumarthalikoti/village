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
 <script src="js/rolecreation.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
createDialog("link_dtl");

});

</script>
</head>

<body >
 <?php 

 $msg="";
 
if(!empty( $_POST ) )
{
//Add new role
if($_POST["method_call"]=="newrole"){
if(strlen(trim($_POST["role_name"]))!=0){
$role_name=strtoupper(trim($_POST["role_name"]));

$conn->insert("role_mstr",array("role_name"=>$role_name));
  $msg="New Role Created";
}
}
//Update role dtls
if($_POST["method_call"]=="update_role_dtl"){
 $role_id=$_POST["role_id_selected"];
 $dtl_role=$_POST["linkid"];
 foreach($dtl_role as $link){
 
 $conn->insert("role_dtl",array("role_id"=>$role_id,"page_link_id"=>$link));
 
 }
 $msg="Updated role permission";
}
}
?>
<div class="title"><span>Permission Creation</span></div> 
<div class="viewport">
<div class="msg"><?php print $msg?></div>

  <table class="form margin-left margin-top xlarge"  border="0" cellspacing="0" cellpadding="0">
    
    <tr>
<td  ><form id="newRole" action="rolecreation.php" method="post">New Role:<input type="text" name="role_name" id="role_name"/>
<input type="hidden" name="method_call" value="newrole" />
<input type="button" onClick="rolecreate.createRole()" value="Add Role" class="button_login"/> &nbsp;</form></td>
    </tr>
      <tr><td>
	  <div>
	  <table width="100%">
	 <tr><td width="350" valign="top" >
	 
	 <table width="100%" class="grid margin xlarge"   id="role_mstr">
	 <thead>
	  <tr><th width="50"></th><th>Permission</th> </tr>
	  </thead>
	  <tbody>
	  <?php
	 $result=$conn->select("role_mstr",array("role_id","role_name"));
	 $i=1;
	 foreach($result as $role){
	 echo "<tr onclick='rolecreate.setRole(this.id)' role_id='".$role['role_id']."' id='".$role['role_id']."'><td>".$i."</td><td>".$role['role_name']."</td></tr>";
	 $i++;
	 }
	 ?>
	  </tbody>
	 </table></td>
	 <td  valign="top">
 
	 
	
 </td></tr></table></div>
	 </td></tr>
  </table>
  <div style="height:auto; max-height:300px;    max-width:400px; overflow:auto; min-width:400px;"   id="link_dtl">
	 <form name="role_dtl">
	 <input type="hidden" name="role_id_selected" id="role_id_selected"/>
	 <input type="hidden" name="method_call" value="update_role_dtl"/>
	 <table width="100%" class="grid" style="margin:0;">
	 <thead>
	 <tr><th width="80"></th><th>Link name</th><th width="50"><input type="checkbox" id="checkAll" onClick="rolecreate.checkAll();" />All</th></tr>
	 </thead>
	 <tbody>
	 <?php
	 $data=$conn->select("page_links",array("linkname","linkid"));
	 $i=1;
	 foreach($data as $link){
	 echo "<tr><td>".$i."</td><td>".$link['linkname']."</td><td><input type='checkbox' name='linkid[]' value='".$link['linkid']."'/></td></tr>";
	 $i++;
	 }
	 ?>
	 </tbody>
	 </table>
	  <div style="height:40px; max-width:450px; "><input type="button" class="button_login" value="Save" onClick="rolecreate.updateRole();" style="float:right; margin-right:0;"/> &nbsp;</div>
	 </form>
	 </div>
 </div>
</body>
</html>