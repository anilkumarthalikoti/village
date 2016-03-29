<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">
document.onmousedown=disableclick;
status="Right Click Disabled";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;    
   }
}
function subschemeVal(subscheme)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(subscheme.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter SubScheme Name in character only");  
	 document.form1.subscheme.focus();  
     return false;  
  }  
}
function componentVal(component)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(component.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Component Name in character only");  
	 document.form1.component.focus();  
     return false;  
  }  
}
function item1Val(item1)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item1.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item1 Name in character only");  
	 document.form1.item1.focus();  
     return false;  
  }  
}
function item2Val(item2)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item2.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item2 Name in character only");  
	 document.form1.item2.focus();  
     return false;  
  }  
}
function item3Val(item3)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item3.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item3 Name in character only");  
	 document.form1.item3.focus();  
     return false;  
  }  
}
function item4Val(item4)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(item4.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Item4 Name in character only");  
	 document.form1.item4.focus();  
     return false;  
  }  
}
function unitVal(unit)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(unit.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Unit Name in character only");  
	 document.form1.unit.focus();  
     return false;  
  }  
}
</script>
</head>
<body>
<form method="POST" action="" name="form1">
<?php
$mysqli = mysqli_connect("localhost", "root", "1234", "farmer");
if (!$mysqli) 
{
    echo "Error: Unable to connect to MySQL.";
    exit;
}
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
      <tr>
        <td colspan="4" class="tbody" style="background-color:#099; color:#FFF; font-size:16px; padding:10px; text-align:center">Adding Scheme</td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Scheme  :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          <option>Select</option>
          <option>CHD</option>
          <option>MIS/PMKSY</option>
          <option>NHM/MIDH</option>
          <option>RKVY
</option>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="7%">&nbsp;</td>
        </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Sub Scheme :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px; width:100px">
		
          
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
<?php 
		   $squery = "SELECT * FROM subscheme";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$subscheme1[$i]=$rows['subscheme'];
				$i++;
				$total_elmt=count($subscheme1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $subscheme1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$subscheme=$_POST['subscheme'];
				$ssql = "INSERT INTO subscheme VALUES('$subscheme')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM subscheme where subscheme='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:300px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
        <input name="subscheme" type="text" placeholder="Add Sub-Scheme"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="subschemeVal(subscheme);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="subschemeVal(subscheme);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Component   :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          <option>Select</option>
          <option>B1. Production of planting material</option>
          <option>B10. Technology Dissemination through demonstration/ front line demonstration - (FLD)</option>
          <option>B11.  Human Resource Development (HRD)</option>
          <option>B11.  Human Resource Development (HRD)</option>
          <option>B2. Establishment of New Gardens (Area Expansion)</option>
<?php 
		   $squery = "SELECT * FROM component";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$component1[$i]=$rows['component'];
				$i++;
				$total_elmt=count($component1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $component1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$component=$_POST['component'];
				$ssql = "INSERT INTO component VALUES('$component')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM component where component='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
        <input name="component" type="text" placeholder="Add Component"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="componentVal(component);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="componentVal(component);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Sub Component-1/Item/Crop   :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
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
		  <?php 
		   $squery = "SELECT * FROM item1";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$i1[$i]=$rows['item1'];
				$i++;
				$total_elmt=count($i1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $i1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$item1=$_POST['item1'];
				$ssql = "INSERT INTO item1 VALUES('$item1')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM item1 where item1='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="item1" type="text" placeholder="Add Sub Item1"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="item1Val(item1);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="item1Val(item1);"/> </label></td>
		</tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Sub Component-2/Item/Crop  :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1"  style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
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
		  <?php 
		   $squery = "SELECT * FROM item2";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$i2[$i]=$rows['item2'];
				$i++;
				$total_elmt=count($i2);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $i2[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$item2=$_POST['item2'];
				$ssql = "INSERT INTO item2 VALUES('$item2')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM item2 where item2='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    

          </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		  <input name="item2" type="text" placeholder="Add Sub Item2"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="item2Val(item2);"/></td>
		  <td width="14%"><label><input name="submit" type="submit" value="Add" onclick="item2Val(item2);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Sub Component-3/Item/Crop  :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>a) Integrated package with drip irrigation and trellis.</option>
		  <option>a) Integrated package with drip irrigation and trellis.</option>
          <option>b) Without integration</option>
          <option>b) Without integration</option>
<?php 
		   $squery = "SELECT * FROM item3";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$i3[$i]=$rows['item3'];
				$i++;
				$total_elmt=count($i3);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $i3[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$item3=$_POST['item3'];
				$ssql = "INSERT INTO item3 VALUES('$item3')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM item3 where item3='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="item3" type="text" placeholder="Add Sub Item3"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="item3Val(item3);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="item3Val(item3);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Sub Component-4/Item/Crop  :</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
          
          <option>4 m X 4 m (625 plants) (Rs. 0.4368 lakh/Ha)</option>
          <option>3 m X 3 m (1111 plants) (Rs. 0.5184 lakh/Ha)</option>
			<option>3 m X 3 m (1111 plants) (Rs. 0.5184 lakh/Ha)</option>
          <option>1.8 m X 1.8 m (3086 plants) (Rs. 0.8544 lakh/Ha)</option>
          <?php 
		   $squery = "SELECT * FROM item4";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$i4[$i]=$rows['item4'];
				$i++;
				$total_elmt=count($i4);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $i4[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$item4=$_POST['item4'];
				$ssql = "INSERT INTO item4 VALUES('$item4')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM item4 where item4='$sinsert'";
				$sresult = $mysqli->query($squery);
				
				
			}
			?>    
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="item4" type="text" placeholder="Add Sub Item4"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="item4Val(item4);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="item4Val(item4);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="20%" class="tbody">Unit</td>
        <td width="71%" align="left"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
          <option>Hector</option>
          <option>Nos.</option>
          <option>Iteam 4</option>
          <?php 
		   $squery = "SELECT * FROM unit";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$unit1[$i]=$rows['unit'];
				$i++;
				$total_elmt=count($unit1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $unit1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$unit=$_POST['unit'];
				$ssql = "INSERT INTO unit VALUES('$unit')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM unit where unit='$sinsert'";
				$sresult = $mysqli->query($squery);
				mysqli_close($mysqli);
				
			}
			?>    
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="unit" type="text" placeholder="Add Unit"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="unitVal(unit);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onclick="unitVal(unit);"/> </label></td>
      </tr>
      <tr>
        <td colspan="4" class="tbody">&nbsp;</td>
      </tr>
      </table>
</form>
	  </body>
	  </html>