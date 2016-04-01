<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
 
</head>

<body >
<div class="viewport">

 
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center">Proposal Status</td>
  </tr>  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center"><iframe frameborder="0" src="status_dash.php" scrolling="yes" width="100%" height="330px"></iframe></td>
  </tr>  
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td align="left" valign="top" style="padding-left:10px; padding-bottom:0px;">Select level for forward/action
    <select name="select3"  type="text"  id="target" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          <option>Select Action </option>
          <option value="content_1">Accept/Reject</option>
          <option value="content_2">Pre-Inspection</option>
          <option value="content_3">Work Order</option>
          <option value="content_4">Pos-Inspection</option>
          <option value="content_5">Taluk Approval</option>
          <option value="content_6">District Approval</option>
          <option value="content_7">DC Bill</option>         
          </select>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          <input type="submit" name="button2" id="button2" value="Show">
          </td>
  </tr>
   
  <tr>
    <td><div id="content_1" class="inv" style="height:60px"><form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Accept">
  <input type="submit" name="button2" id="button2" value="Reject">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
 
  </table>


</form></div>
<div id="content_2" class="inv" style="height:60px"> <form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
<div id="content_3" class="inv" style="height:60px"> <form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
<div id="content_4" class="inv" style="height:60px"> <form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
<div id="content_5" class="inv" style="height:60px"><form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
<div id="content_6" class="inv" style="height:60px"> <form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
<div id="content_7" class="inv" style="height:60px"> <form name="myform" action="checkboxes.asp" method="post">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="left" valign="top" class="head" >Select Hobali  &nbsp;&nbsp;&nbsp;
      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
        <option>All</option>
        <option>K.Vijayapura</option>
        <option>Nagathan</option>
        <option>Babaleshwar</option>
        <option>Tikota</option>
        <option>Mamadapur</option>
        </select></td>
    <td align="left" valign="top" class="head" >Select Sector
  &nbsp;&nbsp;&nbsp;    <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>Select</option>
    <option>CHD</option>
    <option>MIS/PMKSY</option>
    <option>NHM/MIDH</option>
    <option>RKVY</option>
    </select></td>
    <td align="left" valign="top" class="head" >Select Cast 
  &nbsp;&nbsp;&nbsp;      <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
    <option>All</option>
    <option>General</option>
    <option>SC</option>
    <option>ST</option>
    </select></td>
    <td width="45%" align="right" valign="middle" style="padding-left:10px; padding-top:2px; padding-right:10px;"><input type="submit" name="button2" id="button2" value="Forward">
  <input type="submit" name="button2" id="button2" value="Covering Letter">
    <input type="submit" name="button2" id="button2" value="Export">
  <input type="submit" name="button2" id="button2" value="Save and Exit"></td>
  </tr>
  </table>


</form></div>
</td>
  </tr>
  <tr>
    <td><iframe frameborder="0" src="database.php" scrolling="yes" width="100%" height="400px"></iframe></td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center">&nbsp;</td>
  </tr>
  <tr>
    <td style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold; text-align:center">&nbsp;</td>
  </tr>

  </table>

</div>
 
</body>
</html>