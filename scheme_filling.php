<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>
 <script src="js/scheme_filling.js" type="text/javascript"></script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script type="text/javascript">
 <script type="text/javascript" src="js/landdetails.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
 
 schemefilling.searchRegistration()
 });
 </script>
 
</head>

<body>

 <div class="title"><span>Schema filling</span></div>
<div class="viewport">

 
<form method="POST"  name="form1" onsubmit="return false;">
 
<table><tr><td> 
<table class="form xlarge margin">
      <tr class="hide"><td><input  type="text" id="search" class="search" placeholder="Search" onkeypress="schemefilling.search(event)" value="<?php echo $_REQUEST["regid"]; ?>"  />
             <select name="select" id="searchin">
               <option value="id" selected="selected">Reg.No</option>
               <option value="rationcard">Ration card no</option>
               <option value="aadhar">Adhar</option>
			    <option value="voter">Voter</option>
             </select><input type="button" value="Search" onclick="schemefilling.searchRegistration()"/></td></tr>
			 
       <tr><td>
	   <table>
      <tr>
        <td  class="label" > Name </td><td>:</td><td ><input   type="text"  id="firstname_text" placeholder="First Name"/><input type="hidden" id="regid" name="regid"/></td>
		  
        <td class="label">Father/Husband Name  </td><td>:</td><td ><input   type="text"  id="fathername_text" placeholder="Father/Husband name"  /></td>
        </tr>
		<tr><td class="label">House No</td><td>:</td><td><input id="houseno_text" type="text" placeholder="House no"></input></td><td class="label">Village</td><td>:</td><td><input id="village_text" type="text" placeholder="Village/City name"/></td></tr>
		 
	 <tr><td class="label">Scheme</td><td>:</td><td><select name="scheme_select"  tab='0'   id="scheme_select" onchange="schemefilling.updateview(this)"   >
          <option>Select</option>
          <?php
		  $datas=$conn->query("select * from schemes where parent_id=0");
		  foreach($datas as $data){
		 
		  echo "<option value='".$data["id"]."'>".$data["name"]."</option>";
		   
		  }
		  ?>
          
          </select></td><td class="label">Sub scheme</td><td>:</td><td><select name="subscheme_select" tab='1' id='subscheme_select' next='component' onchange="schemefilling.updateview(this); schemefilling.viewEntries();"><option>Select</option>
         
          
          </select></td></tr>
		  <tr><td colspan="6" class="hide" id="componentbased">
		  <table>
	  <tr><td class="label">Component</td><td>:</td><td><select name="component_select" tab='2' id="component_select" onchange="schemefilling.updateview(this);"><option value="-1">Select</option>
          
          
          </select></td><td>Sub-component-1</td><td>:</td><td><select name="component_1"  tab='3' id="component_1" onchange="schemefilling.updateview(this);"><option value="-1">Select</option>
          
          </select></td></tr>
	   <tr><td>Sub-component-2</td><td>:</td><td><select name="component_2" tab='4' id="component_2" onchange="schemefilling.updateview(this);"><option value="-1">Select</option>
          
          
          </select></td><td>Sub-component-3</td><td>:</td><td><select name="component_3" tab='5'  id="component_3" onchange="schemefilling.updateview(this);"><option value="-1">Select</option>
          
          
          </select></td></tr>
	    <tr><td>Sub-component-4</td><td>:</td><td><select name="component_4"  id="component_4" tab='6' onchange="schemefilling.updateview(this);"><option value="-1">Select</option>
          
          
          </select></td><td></td><td>:</td><td></td></tr>
		  </table></td></tr>
		  
		  
		  <tr><td colspan="6" class="hide" id="cropbase">
		  <table>
	  <tr>
	    <td class="label">Crop-1</td>
	    <td>:</td>
	    <td><select name="component_select" >
	      <option value="-1">Select</option>
		   <?php 
		  $result=$conn->select("cropitems",array("id","cropname","cropname_k"));
		  foreach($result as $row){
		  echo "<option value='".$row["id"]."'>".$row["cropname"]."/".$row["cropname_k"]."</option>";
		  }
		  ?>
        </select>	    </td>
	    <td>Crop-2</td><td>:</td><td><select name="component_1"    id="component_1" >
		<option value="-1">Select</option>
         <?php 
		  foreach($result as $row){
		  echo "<option value='".$row["id"]."'>".$row["cropname"]."/".$row["cropname_k"]."</option>";
		  }
		 ?>
          </select></td> <td>Crop-3</td><td>:</td><td><select name="component_2"   id="component_2"  ><option value="-1">Select</option>
          
            <?php 
		  foreach($result as $row){
		  echo "<option value='".$row["id"]."'>".$row["cropname"]."/".$row["cropname_k"]."</option>";
		  }
		 ?>
          </select></td> </tr>
	    
		  </table></td></tr>
 
  <tr>
    <td  colspan="6" align="right"> 
        <input type="button" class="button" id="button2" value="Save" onclick="schemefilling.saveData();">
       
        <input type="button" class="button" name="Reset" id="Reset" value="Reset">
       
     </td>
  </tr>
   
</table>
 
</td> </tr></table>



<td valign="top">
<div style="height:150px; overflow:auto" >
	<table id="landdetails" class="grid xlarge">
	<thead><tr></tr><th width="150">Survay no</th><th>Village</th> <th>Total land(hect)</th><th></th></thead>
	<tbody></tbody>
	</table>
	</div>
	<td></tr></table>



 </form>
 
</div>

 
</body>
</html>