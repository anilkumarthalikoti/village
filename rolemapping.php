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
</head>

<body >
  <div class="title"><span>Permission Mapping</span></div>
<div class="viewport">

  <table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:1px solid #CCC" align="center" bgcolor="#FFFFFF">
    <tr>
      <td width="100%" align="center"><table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:0px solid #CCC" align="center" bgcolor="#FFFFFF">
        <tr>
          <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td valign="top" align="center" width="20%" style="padding:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td>CURRENT PASSWORD <span style="color:#F00">*</span><br />
                            <input name="text" type="text" id="username" placeholder="Enter Current Password" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
                </tr>
                <tr>
                  <td style="height:10px;"></td>
                </tr>
                <tr>
                  <td>NEW PASSWORD <span style="color:#F00">*</span><br />
                            <input name="text2" type="text" id="username" placeholder="Enter New Password" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
                </tr>
                <tr>
                  <td style="height:10px;"></td>
                </tr>
                <tr>
                  <td>CONFIRM NEW PASSWORD <span style="color:#F00">*</span><br />
                            <input name="text2" type="text" id="username" placeholder="Enter Confirm new Password" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
                </tr>
              </table></td>
              <td valign="top" align="center" width="50%" style="padding:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="border-left:1px solid #CCC; padding-left:10px;">
                <tr>
                  <td style="background-color:#69F; color:#FFF; font-family:Arial, Helvetica, sans-serif; font-size:14px; font-weight:bold;" align="center">Password Criteria </td>
                </tr>
                <tr>
                  <td style="font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#333; line-height:30px; padding:10px;"> Does not contain illegal characters <br />
                    Is at least 10 characters long <br />
                    Is sufficiently different from previous password <br />
                    Contains at least 3 of these 4 character types:<br />
                    • Uppercase alpha characters (A, B, ... Z)<br />
                    • Lowercase alpha characters (a, b, ... z)<br />
                    • Numbers (1, 2, 3, 4, 5, 6, 7, 8, 9, 0)<br />
                    • Non-alphanumeric ASCII characters ( !@#$%^&*.:;~'` "*/\+?-,_|=()[]{}<> ) <br />
                    New passwords match</td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                </tr>
              </table></td>
            </tr>
          </table></td>
        </tr>
        <tr>
          <td style="border-top:1px solid #ccc; border-bottom:0px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">&nbsp;</td>
        </tr>
        <tr>
          <td style="border-top:0px solid #000; border-bottom:0px solid #000; font-size:18px; font-weight:bold; padding:0px;" align="center"><form name="form4" method="post" action="">
            <label>
              <input type="submit" name="button2" id="button2" value="Save" />
              </label>
            <label> </label>
            <label>
              <input type="submit" name="button2" id="button2" value="Cancel" />
              </label>
            <label>
              <input type="submit" name="Reset" id="Reset" value="Reset" />
              </label>
          </form></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
</body>
</html>