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
session_start();
require "server/app_connector.php";
$con = $database;
 
?>
<form method="POST" action="" name="form1">
<div class="viewport">
 <div class="title"><span>Schema filling</span></div>


 
 <ul id="tabs">

      <li><a id="tab1">Registration Details</a></li>
      <li><a id="tab2">Schema Details</a></li>
       

</ul>
<div class="container" id="tab1C">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
      
       
      <tr>
        <td width="19%" class="tbody"> Name  :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">Father/Husband Name  :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
      <tr>
        <td colspan="2" align="center" style="background-color:#CCC">Residentioan Address</td>
        <td colspan="2" align="center" style="background-color:#CCC">Land Details</td>
        </tr>
      <tr>
        <td width="19%" class="tbody">House No.:</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">Survey No.:</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody"> Village/City Name:</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">Village :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Hobali</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">Hobali :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Taluk :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">Taluk :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">District :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        <td width="20%" class="tbody">District :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name"  />
          </td>
        </tr>
		</table>

</div>
<div class="container" id="tab2C">
<table>

<tr>
        <td width="19%" class="tbody" style="padding-bottom:5px; padding-top:5px">Financial Year :</td>
        <td width="30%" style="background-color:#ccc; padding:5px; height:20px" align="center">(Current Finanical Year)</td>
        <td width="20%" class="tbody" style="padding-bottom:5px; padding-top:5px">Date :</td>
        <td width="31%" style="background-color:#ccc; padding:5px; height:20px" align="center">(System Date)</td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Scheme :</td>
        <td width="30%"><select name="scheme_select"    id="scheme_select" onchange="schemefilling.updatesubscheme('subscheme_select','scheme_select')"   >
          <option>Select</option>
          <?php
		  $datas=$con->query("select * from items where item_type=0");
		  foreach($data as $datas){
		 
		  echo "<option value='".$data["item_id"]."'>".$data["item_name"]."</option>";
		   
		  }
		  ?>
          
          </select>
          </td>
        <td width="20%" class="tbody">&nbsp;</td>
        <td width="31%">&nbsp;</td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Sub-schema :</td>
        <td colspan="3" align="left"><select name="subscheme_select" id='subscheme_select' onchange="schemefilling.updatecomponent();"><option>Select</option>
         
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="tbody">Component
          </td>
        <td colspan="3" align="left"><select name="component_select"><option>Select</option>
          
          
          </select></td>
        </tr>
      <tr>
        <td class="tbody">Sub Component-1/Item/Crop   :</td>
        <td colspan="3" align="left"><select name="component_1"><option>Select</option>
          
          </select></td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Sub Component-2/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="component_1"><option>Select</option>
          
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="tbody">Sub Component-3/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="component_4"><option>Select</option>
          
          
          </select></td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Sub Component-4/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="component_5"><option>Select</option>
          
          
          </select></td>
        </tr>
     
      </table></td>
  </tr>
  <tr>
    <td style="border-top:1px solid #000; border-bottom:0px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center"> 
        <input type="submit" name="button2" id="button2" value="Submit">
       
        <input type="submit" name="Reset" id="Reset" value="Reset">
       
     </td>
  </tr>
   
</table>





</div>
 
</div>
</form>
 
</body>
</html>