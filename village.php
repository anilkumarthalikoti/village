<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
 
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
 
<script src="js/default.js" type="text/javascript"></script>
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
function stateVal(state)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(state.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter State Name in character only");  
	 document.form1.state.focus();  
     return false;  
  }  
}
function distVal(dist)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(dist.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter District Name in character only");  
	 document.form1.dist.focus();  
     return false;  
  }  
}
function talukVal(taluk)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(taluk.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Taluk Name in character only");  
	 document.form1.taluk.focus();  
     return false;  
  }  
}
function hobliVal(hobli)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(hobli.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Hobli Name in character only");  
	 document.form1.hobli.focus();  
     return false;  
  }  
}
function consVal(cons)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(cons.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Constituency Name in character only");  
	 document.form1.cons.focus();  
     return false;  
  }  
}
function panchayatVal(panchayat)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(panchayat.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Panchayat Name in character only");  
	 document.form1.panchayat.focus();  
     return false;  
  }  
}
function villageVal(village)    
{
                var letters = /^[A-Za-z .,]+$/;
                if(village.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Village Name in character only");  
	 document.form1.village.focus();  
     return false;  
  }  
}
</script>
</head>

<body>
<div class="viewport">



<div class="title"><span>Adding City</span></div>

<table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
       
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">State  :</td>
        <td width="66%" align="left"><select name="select3"  type="text"  id="textfield1" style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
		
          <option>Select</option>
          <option>Karnataka&nbsp;ಕನಾ೵ಟಕ</option>
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          <?php 
		   $squery = "SELECT * FROM state";
			$sresult = $mysqli->query($squery);
			$i=0;
			while($rows=$sresult->fetch_assoc())
			{
				$state1[$i]=$rows['state'];
				$i++;
				$total_elmt=count($state1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $state1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$state=$_POST['state'];
				$ssql = "INSERT INTO state VALUES('$state')";
				$sinsert = $mysqli->query($ssql);
				$squery = "SELECT * FROM state where state='$sinsert'";
				$sresult = $mysqli->query($squery);
				
			}
			?>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="state" type="text" placeholder="Add State"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="stateVal(state);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onClick="stateVal(state);"/> </label></td>
	   </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">District  :</td>
          <td width="66%" align="left"><select id="modSelect" name="text"  type="text"   style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
		  <option>Select</option>
          <option >Bijapur&nbsp;ವಿಜಯಪೂರ</option>
          <option>Bagalkot</option>
          <option>Bangalore</option>
          <option>Belgaum</option>
		  <option>Bellary</option>
           <?php 
		   $query = "SELECT * FROM dist";
			$result = $mysqli->query($query);
			$i=0;
			while($rows=$result->fetch_assoc())
			{
				$dist1[$i]=$rows['dist'];
				$i++;
				$total_elmt=count($dist1);}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $dist1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$dist=$_POST['dist'];
				$sql = "INSERT INTO dist VALUES('$dist')";
				$insert = $mysqli->query($sql);
				$query2 = "SELECT * FROM dist where dist='$insert'";
				$result2 = $mysqli->query($query2);
			}
			?>   
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="dist" type="text" placeholder="Add District"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="distVal(dist);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onClick="distVal(dist);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">Taluk   :</td>
                <td width="66%" align="left"><select name="select3"  type="text"  id="textfield1" style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          <option>Select</option>
          <option>Bijapur</option>
          <option>Indi</option>
          <option>Sindagi</option>
          <option>Mudebihal</option>
          <option>B.Bagewadi</option>
		<?php 
		   $tquery = "SELECT * FROM taluk";
			$tresult = $mysqli->query($tquery);
			$i=0;
			while($rows=$tresult->fetch_assoc())
			{
				$taluk1[$i]=$rows['taluk'];
				$i++;
				$total_elmt=count($taluk1);
			}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $taluk1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$taluk=$_POST['taluk'];
				$tsql = "INSERT INTO taluk VALUES('$taluk')";
				$tinsert = $mysqli->query($tsql);
				$tquery = "SELECT * FROM taluk where taluk='$tinsert'";
				$tresult = $mysqli->query($tquery);	
			}
			?>
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
        <input name="taluk" type="text" placeholder="Add Taluk"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="talukVal(taluk);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add"onclick="talukVal(taluk);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">Hobli   :</td>
               <td width="66%" align="left"><select name="select3"  type="text"  id="textfield1" style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          <?php 
		   $hquery = "SELECT * FROM hobli";
			$hresult = $mysqli->query($hquery);
			$i=0;
			while($rows=$hresult->fetch_assoc())
			{
				$hobli1[$i]=$rows['hobli'];
				$i++;
				$total_elmt=count($hobli1);
			}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $hobli1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$hobli=$_POST['hobli'];
				$hsql = "INSERT INTO hobli VALUES('$hobli')";
				$hinsert = $mysqli->query($hsql);
				$hquery = "SELECT * FROM hobli where hobli='$hinsert'";
				$hresult = $mysqli->query($hquery);
				
			}
			?>
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
        <input name="hobli" type="text" placeholder="Add Hobli"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="hobliVal(hobli);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add"onclick="hobliVal(hobli);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">Constituency  :</td>
                <td width="66%" align="left"><select name="select3"  type="text"  id="textfield1" style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Iteam 1</option>
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          <?php 
		   $cquery = "SELECT * FROM cons";
			$cresult = $mysqli->query($cquery);
			$i=0;
			while($rows=$cresult->fetch_assoc())
			{
				$cons1[$i]=$rows['cons'];
				$i++;
				$total_elmt=count($cons1);
			}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $cons1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$cons=$_POST['cons'];
				$csql = "INSERT INTO cons VALUES('$cons')";
				$cinsert = $mysqli->query($csql);
				$cquery = "SELECT * FROM cons where cons='$cinsert'";
				$cresult = $mysqli->query($cquery);
				
			}
			?>
          </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		  <input name="cons" type="text" placeholder="Add constituency"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="consVal(cons);"/></td>
		  <td width="14%"><label><input name="submit" type="submit" value="Add" onClick="consVal(cons);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">Panchayat  :</td>
                <td width="66%" align="left"><select name="select3"  type="text"  id="textfield1" style=" width:200px; padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          <?php 
		   $pquery = "SELECT * FROM panchayat";
			$presult = $mysqli->query($pquery);
			$i=0;
			while($rows=$presult->fetch_assoc())
			{
				$panchayat1[$i]=$rows['panchayat'];
				$i++;
				$total_elmt=count($panchayat1);
			}
				for($j=0;$j<$total_elmt;$j++)
				{
					?><option><?php 
					echo $panchayat1[$j];
					?></option><?php
				}
			if(isset($_POST['submit']))
			{
				$panchayat=$_POST['panchayat'];
				$psql = "INSERT INTO panchayat VALUES('$panchayat')";
				$pinsert = $mysqli->query($psql);
				$pquery = "SELECT * FROM panchayat where panchayat='$pinsert'";
				$presult = $mysqli->query($pquery);
				
			}
			?>
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<input name="panchayat" type="text" placeholder="Add Panchayat"style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="panchayatVal(panchayat);"/></td>
		<td width="14%"><label><input name="submit" type="submit" value="Add" onClick="panchayatVal(panchayat);"/> </label></td>
      </tr>
      <tr>
        <td width="2%" class="tbody">&nbsp;</td>
        <td width="18%" class="tbody">Village  :</td>
        <td width="55%" align="left"><input name="village" type="text" id="username" placeholder="Add City" style="height:15px; width:200px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="villageVal(village);"/> 
		<input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
         <td width="14%"><label><input name="submit" type="submit" value="Add" onClick="villageVal(village);"/> </label></td>
		 <?php
		 if(isset($_POST['submit']))
			{
				$village=$_POST['village'];
				$vsql = "INSERT INTO village VALUES('$village')";
				$vinsert = $mysqli->query($vsql);
				
			}
			?>
      </tr>
      <tr>
        <td class="tbody">&nbsp;</td>
        <td class="tbody">&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      </table>





</div> 
 </body>
</html>