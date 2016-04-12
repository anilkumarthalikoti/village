<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>
 <script src="js/scheme_filling.js" type="text/javascript"></script>
</head>

<body>

 <div class="title"><span>Schema filling</span></div>
<div class="viewport">

 
<form method="POST"  name="form1" onsubmit="return false;">
 

<table class="form xlarge margin">
      <tr><td><input  type="text" id="search" class="search" placeholder="Search"  />
             <select name="select" id="searchin">
               <option value="id">Reg.No</option>
               <option value="rationcard">Ration card no</option>
               <option value="aadhar">Adhar</option>
			    <option value="voter">Voter</option>
             </select><input type="button" value="Search" onclick="schemefilling.searchRegistration()"/></td></tr>
       <tr><td>
	   <table  >
      <tr>
        <td  class="label" > Name </td><td>:</td><td ><input   type="text"  id="firstname_text" placeholder="First Name"/><input type="hidden" id="regid" name="regid"/></td>
		  
        <td class="label">Father/Husband Name  </td><td>:</td><td ><input   type="text"  id="fathername_text" placeholder="Father/Husband name"  /></td>
        </tr>
		<tr><td>House No</td><td>:</td><td><input id="houseno_text" type="text" placeholder="House no"></input></td><td>Village</td><td>:</td><td><input id="village_text" type="text" placeholder="Village/City name"/></td></tr>
		<tr><td>Survay no</td><td>:</td><td><input type="text" id="survayno_text" placeholder="Survay no"/></td><td>Village</td><td>:</td><td><input type="text" placeholder="Village/City name" id="village_text_l"/></td></tr>
	 <tr><td>Scheme</td><td>:</td><td><select name="scheme_select"  tab='0'   id="scheme_select" onchange="schemefilling.updateview(this)"   >
          <option>Select</option>
          <?php
		  $datas=$conn->query("select * from schemes where parent_id=0");
		  foreach($datas as $data){
		 
		  echo "<option value='".$data["id"]."'>".$data["name"]."</option>";
		   
		  }
		  ?>
          
          </select></td><td>Sub scheme</td><td>:</td><td><select name="subscheme_select" tab='1' id='subscheme_select' next='component' onchange="schemefilling.updateview(this);"><option>Select</option>
         
          
          </select></td></tr>
	  <tr><td>Component</td><td>:</td><td><select name="component_select" tab='2' id="component_select" onchange="schemefilling.updateview(this);"><option>Select</option>
          
          
          </select></td><td>Sub-component-1</td><td>:</td><td><select name="component_1"  tab='3' id="component_1" onchange="schemefilling.updateview(this);"><option>Select</option>
          
          </select></td></tr>
	   <tr><td>Sub-component-2</td><td>:</td><td><select name="component_2" tab='4' id="component_2" onchange="schemefilling.updateview(this);"><option>Select</option>
          
          
          </select></td><td>Sub-component-3</td><td>:</td><td><select name="component_3" tab='5'  id="component_3" onchange="schemefilling.updateview(this);"><option>Select</option>
          
          
          </select></td></tr>
	    <tr><td>Sub-component-4</td><td>:</td><td><select name="component_4"  id="component_4" tab='6' onchange="schemefilling.updateview(this);"><option>Select</option>
          
          
          </select></td><td></td><td>:</td><td></td></tr>
	<tr><td colspan="6" valign="top">
	<div style="height:150px; overflow:auto" class="excel">
	<table id="landdetails" class="grid excel">
	<thead><tr></tr><th>Survay no</th><th>Total land</th><th></th></thead>
	<tbody></tbody>
	</table>
	</div>
	</td></tr>
  <tr>
    <td  colspan="6" align="right"> 
        <input type="button" class="button" id="button2" value="Save" onclick="schemefilling.saveData();">
       
        <input type="button" class="button" name="Reset" id="Reset" value="Reset">
       
     </td>
  </tr>
   
</table>
 




 </form>
</div>

 
</body>
</html>