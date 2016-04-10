<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
 <script src="js/scheme_filling.js" type="text/javascript"></script>
</head>

<body>
 <?php 
  require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
 ?>
 <div class="title"><span>Schema filling</span></div>
<div class="viewport">

 
<form method="POST"  name="form1" onsubmit="return false;">
 

<table width="100%" border="0"  cellspacing="0" cellpadding="0">
      <tr><td><input  type="text" id="search" class="search" placeholder="Search"  />
             <select name="select" id="searchin">
               <option value="id">Reg.No</option>
               <option value="rationcard">Ration card no</option>
               <option value="aadhar">Adhar</option>
			    <option value="voter">Voter</option>
             </select><input type="button" value="Search" onclick="schemefilling.searchRegistration()"/></td></tr>
       <tr><td>
	   <table>
      <tr>
        <td  class="label" > Name </td><td>:</td><td ><input   type="text"  id="firstname_text" placeholder="First Name"/><input type="hidden" id="regid" name="regid"/></td>
		  
        <td calss="label">Father/Husband Name  </td><td>:</td><td ><input   type="text"  id="fathername_text" placeholder="Father/Husband name"  /></td>
        </tr>
		<tr><td colspan="6">
		
		<table width="100%" border="0" class="headerSchemeFiling">
	<thead><tr><th class="medium"></th><th></th><th class="medium">Residential Address</th><th>Land details</th><th>Scheme Details</th></tr></thead>
		<tbody>
		<tr><td class="label">House no/Survay no</td><td>:</td><td><input id="houseno_text" type="text" placeholder="House no"></input></td><td><input type="text" id="survayno_text" placeholder="Survay no"/></td><td rowspan="6" valign="top">
		
		
		
		
<table>
 
 
      <tr>
        <td class="label">Scheme :</td>
        <td ><select name="scheme_select"    id="scheme_select" onchange="schemefilling.updatesubscheme('subscheme_select','scheme_select')"   >
          <option>Select</option>
          <?php
		  $datas=$conn->query("select * from items where item_type=0");
		  foreach($datas as $data){
		 
		  echo "<option value='".$data["item_id"]."'>".$data["item_name"]."</option>";
		   
		  }
		  ?>
          
          </select>
          </td>
         
        </tr>
      <tr>
        <td class="label">Sub-schema :</td>
        <td  align="left"><select name="subscheme_select" id='subscheme_select' onchange="schemefilling.updatecomponent();"><option>Select</option>
         
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="label">Component
          </td>
        <td  align="left"><select name="component_select" id="component_select" onchange="schemefilling.updatecrops();"><option>Select</option>
          
          
          </select></td>
        </tr>
      <tr>
        <td class="label">Sub Component-1/Item/Crop   :</td>
        <td   align="left"><select name="component_1" crop="crop"><option>Select</option>
          
          </select></td>
        </tr>
      <tr>
        <td class="label">Sub Component-2/Item/Crop  :</td>
        <td  align="left"><select name="component_2" crop="crop"><option>Select</option>
          
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="label">Sub Component-3/Item/Crop  :</td>
        <td   align="left"><select name="component_3" crop="crop"><option>Select</option>
          
          
          </select></td>
        </tr>
      <tr>
        <td class="label">Sub Component-4/Item/Crop  :</td>
        <td   align="left"><select name="component_4" crop="crop"><option>Select</option>
          
          
          </select></td>
        </tr>
     
      </table>
		
		
		
		</td></tr>
		<tr><td class="label">District</td><td>:</td><td><input type="text" id="district_text" placeholder="District"/></td><td><input type="text" placeholder="District" id="district_text_l"/></td></tr>
		<tr><td class="label">Taluka</td><td>:</td><td><input type="text" id="taluk_text" placeholder="Taluka"/></td><td><input type="text" placeholder="Taluka"  id="taluk_text_l"/></td></tr>
		
		<tr><td class="label">Hobli</td><td>:</td><td><input type="text" id="hobli_text" placeholder="Hobli"/></td><td><input type="text" placeholder="Hobli" id="hobli_text_l"/></td></tr>
		<tr><td class="label">Village/City name</td><td>:</td><td><input id="village_text" type="text" placeholder="Village/City name"/></td><td><input type="text" placeholder="Village/City name" id="village_text_l"/></td></tr>
		<tr><td class="label" colspan="4"></td></tr>
		</tbody>
		</table>
 
  </tr>
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