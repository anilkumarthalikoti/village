<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<script language="javascript">
function phonenumber(inputtxt)  
{  
  var phoneno = /^\d{10}$/;  
  if(inputtxt.value.match(phoneno))  
  {  
      return true;  
  }  
  else  
  {  
     alert("Not a valid Phone Number");  
	 document.form1.mobileno.focus();  
     return false;  
  }  
}  

function ValidateEmail(inputText)  
{  
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(inputText.value.match(mailformat))  
{  
return true;  
}  
else  
{  
alert("You have entered an invalid email address!");  
document.form1.email.focus();  
return false;  
}  
}  

function fnameVal(fname){
                var letters = /^[A-Za-z .,]+$/;
                if(fname.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter First Name");  
	 document.form1.fname.focus();  
     return false;  
  }  
}
  
function lnameVal(lname){
                var letters = /^[A-Za-z .,]+$/;
                if(lname.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Last Name");  
	 document.form1.lname.focus();  
     return false;  
  }  
}
    </script>
	
</head>
<body>
<form method="post" name="form1" action=""  >
<table width="75%" border="0" cellspacing="0" cellpadding="0" style=" border:1px solid #CCC" bgcolor="#FFFFFF" align="center">
  <tr>
    <td bgcolor="#339933" style="color:#FFF; padding:10px; font-weight:bold; font-family:Arial, Helvetica, sans-serif" align="center">Signup Form</td>
  </tr>
  <tr>
    <td class="body" valign="middle"><table width="100%" border="0" cellspacing="0" cellpadding="0">
	 <p><span class="error">* Required field</span></p></td></tr>
      <tr>
        <td width="15%">First Name :</td>
        <td width="85%"><input name="fname" type="text" id="username" placeholder="In English" style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;" onblur="fnameVal(fname);"required/>
		<span class="error">*</span><br/>
          <input name="fname1" type="text" id="username" placeholder="In Kannada Unicode" style="height:15px; width:35%; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		  </td>	  
        </tr>
		<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td >Last  Name :</td>
        <td><input name="lname" type="text" id="username" placeholder="In English" style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;" onblur="lnameVal(lname);"required/>
		<span class="error">*</span><br />
          <input name="lname1" type="text" id="username" placeholder="In Kannada Unicode" style="height:15px; width:35%; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		  </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Designation :</td>
        <td><input name="desigination" type="text" id="username" placeholder="In English" style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<br />
          <input name="desigination1" type="text" id="username" placeholder="In Kannada Unicode" style="height:15px; width:35%; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		 </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Department :</td>
        <td><input name="department" type="text" id="username" placeholder="In English" style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		<br />
          <input name="department1" type="text" id="username" placeholder="In Kannada Unicode" style="height:15px; width:35%; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/>
		  </td>
        </tr>
		<tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Email ID :</td>
        <td><input name="email" type="text" id="username" placeholder="Enter Valid Email ID" style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;" onblur="ValidateEmail(email);" required/>
		<span class="error">*</span><br />
          </td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        </tr>
      <tr>
        <td>Mobile Number :</td>
        <td><input name="mobileno" type="text" id="username" placeholder=" Enter Valid Mobile Number" maxlength="10"style="height:15px; width:35%; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="phonenumber(document.form1.mobileno)"/>
		<span class="error">*</span><br />
          </td>
		   
        </tr>      
		
         <tr><td><input type="submit" name="submit" value="Submit"></td> 
      </tr>     
  </table>
  </form>
  </body>
  </html>
 <?php
 if (  !empty( $_POST ) )
{
            
			$mysqli = mysqli_connect( 'localhost', 'root', '1234', 'farmer' );
            // Check our connection
		if ( $mysqli->connect_error ) 
		{
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
		}
		
		
  
		// Insert our data
		
		 $sql = "INSERT INTO signup  VALUES ( '{$mysqli->real_escape_string($_POST['fname'])}', '{$mysqli->real_escape_string($_POST['lname'])}','{$mysqli->real_escape_string($_POST['desigination'])}','{$mysqli->real_escape_string($_POST['department'])}','{$mysqli->real_escape_string($_POST['email'])}','{$mysqli->real_escape_string($_POST['mobileno'])}'   )";
		$insert = $mysqli->query($sql);
		
		if($insert)
		{				
			echo "<script type='text/javascript'>\n";
			 echo 'location.href="thank_u.php"';
			echo "</script>";
		}
		else
		{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
		
		 	$mysqli->close();
		 	
}
?>
