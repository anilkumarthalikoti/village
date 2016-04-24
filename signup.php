<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/ssheet.css" type="text/css" rel="stylesheet" />
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<link href="css/jquery-ui.css" type="text/css" rel="stylesheet" />
<link href="css/ui.jqgrid.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery-ui.js" type="text/javascript"></script>
<script src="js/pramukhindic.js" type="text/javascript"></script>
<script src="js/pramukhime.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js/autocomplete.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script type="text/javascript" src="js/signup.js"></script>
</head>

<body  >

<div class="title">Sign up</div>
<div class="viewport1"> 
 <form method="post" name="form1" action="signup.php"  >
<table class="form xlarge margin">
 
      <tr>
        <td width="194" class="label"  >First Name </td>
        <td width="7">:</td>
        <td width="250" ><input name="fname"   type="text1"  class="medium"  id="username" placeholder="In English"  onBlur="fnameVal(fname);"  />	 </td>
		<td ><input name="username_k"   type="text1"  id="un_k" class="medium"   placeholder="In Kannada Unicode" alt="ka" />
		  </td>	  
    </tr>
		 
      <tr>
        <td class="label" >Last  Name </td><td>:</td>
        <td ><input name="lname"   type="text1"  class="medium"  id="username" placeholder="In English"  onBlur="lnameVal(lname);" />	</td><td>
          <input name="lname1"   type="text1"  class="medium"  id='ln_k' placeholder="In Kannada Unicode" alt="ka" />
		  </td>
        </tr>
      <tr>
        <td class="label">Designation </td><td>:</td>
        <td><input name="desigination"   type="text1"  class="medium"  id="username" placeholder="In English" /> </td><td>
          <input    type="text1"  class="medium" id="di_k"  placeholder="In Kannada Unicode" alt="ka" />
		 </td>
        </tr>
      <tr>
        <td class="label">Department </td><td>:</td>
        <td><input name="department"   type="text1"  class="medium"  id="username" placeholder="In English" />		</td><td>
          <input name="department1"   type="text1"  class="medium"  id="dp_k"  placeholder="In Kannada Unicode" alt="ka" />
		  </td>
        </tr>
      <tr>
        <td class="label">Email ID </td><td>:</td>
        <td><input name="email"   type="text1"  class="medium"  id="username" placeholder="Enter Valid Email ID"  onBlur="ValidateEmail(email);" required/>		</td><td>
          </td>
        </tr>
      <tr>
        <td class="label">Mobile Number </td><td>:</td>
        <td><input name="mobileno"   type="text1"  class="medium"  id="username" placeholder=" Enter Valid Mobile Number" maxlength="10"onblur="phonenumber(document.form1.mobileno)"/>		</td><td>
          </td>
        </tr>      
		
         <tr><td colspan="4"><input type="submit" name="submit" value="Submit"></td> 
      </tr>     
  </table>
  </form>
  </div>
</body>
  </html>
  