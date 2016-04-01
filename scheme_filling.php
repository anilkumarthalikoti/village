<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
 
</head>

<body>
  <?php
session_start();
require "server/app_connector.php";
$mysqli = $database;
 
?>
<form method="POST" action="" name="form1">
<div class="viewport">
 <div class="title"><span>Schema filling</span></div>


 <table   width="100%" cellpadding="0" cellspacing="0">
 <tr><td align="right" style="border-bottom:1px solid #CCCCCC;"><input type="text" placeholder="Search" class="search"></input><select><option>Reg.No</option><option>Name</option><option>Ration card no</option><option>Adhar</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
 <tr><td>
 <ul id="tabs">

      <li><a id="tab1">Registration Details</a></li>
      <li><a id="tab2">Schema Details</a></li>
       

</ul>
<div class="container" id="tab1C">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td class="tbody">&nbsp;</td>
        <td>&nbsp;</td>
        <td class="tbody">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td width="19%" class="tbody"> Name  :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">Father/Husband Name  :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        </tr>
      <tr>
        <td colspan="2" align="center" style="background-color:#CCC">Residentioan Address</td>
        <td colspan="2" align="center" style="background-color:#CCC">Land Details</td>
        </tr>
      <tr>
        <td width="19%" class="tbody">House No.:</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">Survey No.:</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody"> Village/City Name:</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">Village :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Hobali</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">Hobali :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Taluk :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">Taluk :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        </tr>
      <tr>
        <td width="19%" class="tbody">District :</td>
        <td width="30%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
          </td>
        <td width="20%" class="tbody">District :</td>
        <td width="31%"><input name="text" type="text" id="username" placeholder="Enter First Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
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
        <td width="30%"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          <option>Select</option>
          <option>CHD</option>
          <option>MIS/PMKSY</option>
          <option>NHM/MIDH</option>
          <option>RKVY
            </option>
          
          </select>
          </td>
        <td width="20%" class="tbody">&nbsp;</td>
        <td width="31%">&nbsp;</td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Component :</td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:300px">
          <option>Select</option>
          <option>B1. Production of planting material</option>
          <option>B10. Technology Dissemination through demonstration/ front line demonstration - (FLD)</option>
          <option>B11.  Human Resource Development (HRD)</option>
          <option>B11.  Human Resource Development (HRD)</option>
          <option>B2. Establishment of New Gardens (Area Expansion)</option>
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="tbody">Sub Scheme
          </td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1" style="padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:350px">
          <option>Select</option>
          <option>A. RESEARCH AND DEVELOPMENT</option>
          <option>B. PLANTATION INFRASTRUCTURE DEVELOPMENT</option>
          <option>B. PLANTATION INFRASTRUCTURE DEVELOPMENT</option>
          <option>C. Integrated Post Harvest Management (PHM)</option>
          <option>C. Integrated Post Harvest Management (PHM)</option>
          <option>D. Establishment of Marketing Infrastructure for horticultural produce in Govt./Private/ Co operative sector</option>
          <option>D. Establishment of Marketing Infrastructure for horticultural produce in Govt./Private/ Co operative sector</option>
          <option>E. Special Interventions</option>
          <option>E. Special Interventions</option>
          <option>F. Centre of Excellence for Horticulture</option>
          <option>G. Mission Management</option>
          <option>G. Mission Management</option>
          <option>H. Publicity & Propoganda</option>
          <option>H. Publicity & Propoganda</option>
          <option>I. Institutional Strengthening, hire/purchase of vehicles, hardware/software.</option>
          <option style="text-align:justify;">J. Flexi Fund-(This fund will be utilised to need based components which are covered under the MIDH programmes by KSHMA with SLEC approval)</option>
          </select></td>
        </tr>
      <tr>
        <td class="tbody">Sub Component-1/Item/Crop   :</td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:350px">
          
          <option>Select</option>
          <option>I. Fruits</option>
          <option>II. Vegetable (For maximum area of 2 ha per beneficiary)</option>
          <option>III. Flowers (For a maximum of 2 ha per beneficiary)
            </option>
          <option>III. Flowers (For a maximum of 2 ha per beneficiary)</option>
          <option>IV. Spices ( For a maximum area of 4 ha per beneficiary)</option>
          <option>IV. Spices ( For a maximum area of 4 ha per beneficiary)</option>
          <option>V. Aromatic Plants (For a maximum area of 4 ha per beneficiary)</option>
          <option>V. Aromatic Plants (For a maximum area of 4 ha per beneficiary)</option>
          <option>VI. Plantation crops (For a maximum area of 4 ha per beneficiary)</option>
          <option>VI. Plantation crops (For a maximum area of 4 ha per beneficiary)</option>
          <option>VII. 1st Year Maintenance of Fruits Perennials (60:20:20)</option>
          <option>VII. 1st Year Maintenance of Fruits Perennials (60:20:20)</option>
          <option>VIII. 2nd Year Maintenance of Fruits Perennials (60:20:20)</option>
          <option>VIII. 2nd Year Maintenance of Fruits Perennials (60:20:20)</option>
          <option>IX. 1st Year Maintenance of Non-Perennials (75:25)</option>
          <option>IX. 1st Year Maintenance of Non-Perennials (75:25)</option>
          <option>X. 1st Year Maintenance of Plantation Crops (60:20:20)</option>
          <option>X. 1st Year Maintenance of Plantation Crops (60:20:20)</option>          
          <option>XI. 2nd Year Maintenance of Plantation Crops (Rs.0.04 lks/ha)</option>
          <option class="z">XI. 2nd Year Maintenance of Plantation Crops (Rs.0.04 lks/ha)</option>          

          <option>XI. Mushrooms</option>
          <option>XI. Mushrooms</option>
          </select></td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Sub Component-2/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1"  style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
          <option>i) Grape</option>
          <option>i) Grape</option>
          <option>ii) Banana (sucker)</option>
          <option>ii) Banana (sucker)</option>
          <option>iii) Banana (TC)</option>
          <option>iii) Banana (TC)</option>
          <option>iv ) Pineapple (sucker)</option>
          <option>iv ) Pineapple (sucker)</option>
          <option>v) Pineapple (TC)</option>
          <option>v) Pineapple (TC)</option>
          <option>vi) Papaya</option>
          <option>vi) Papaya</option>
          <option>vii) Normal and High density planting - Mango</option>
          <option>vii) Normal and High density planting - Mango</option>
          <option>viii) Normal and High density planting - Pomegranate</option>
          <option>viii) Normal and High density planting - Pomegranate</option>
          <option>ix) Normal and High density planting - Sapota</option>
          <option>ix) Normal and High density planting - Sapota</option>
          <option>x) Normal and High density planting - Lime/Lemon</option>
          <option>x) Normal and High density planting - Lime/Lemon</option>
          <option>xi) Normal and High density planting - </option>
          <option>xi) Normal and High density planting - Mandarine</option>
          <option>xii) Normal and High density planting - Sweet Orange</option>
          <option>xii) Normal and High density planting - Sweet Orange</option>
          <option>xiii) Normal and High density planting - </option>
          <option>xiii) Normal and High density planting - Fig</option>
          <option>xiv) Normal and High density planting - Guava</option>
          <option>xiv) Normal and High density planting - Guava</option>
          
          </select>
          </td>
        </tr>
      <tr>
        <td class="tbody">Sub Component-3/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:">
          
          <option>Select</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>b) Without integration</option>
          <option>b) Without integration</option>
          
          
          </select></td>
        </tr>
      <tr>
        <td width="19%" class="tbody">Sub Component-4/Item/Crop  :</td>
        <td colspan="3" align="left"><select name="select3"  type="text"  id="textfield1" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:550px ">
          
          <option>Select</option>
          
          <option>4 m X 4 m (625 plants) (Rs. 0.4368 lakh/Ha)</option>
          <option>3 m X 3 m (1111 plants) (Rs. 0.5184 lakh/Ha)</option>
          <option>3 m X 3 m (1111 plants) (Rs. 0.5184 lakh/Ha)</option>
          <option>1.8 m X 1.8 m (3086 plants) (Rs. 0.8544 lakh/Ha)</option>
          
          </select></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td style="border-top:1px solid #000; border-bottom:0px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center"><form name="form4" method="post" action="">
      <label>
        <input type="submit" name="button2" id="button2" value="Submit">
        </label>
      <label>
        <input type="submit" name="Reset" id="Reset" value="Reset">
        </label>
      </form></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>





</div>
 
 
 </td></tr>
 </table>
</div>
</form>
 
</body>
</html>