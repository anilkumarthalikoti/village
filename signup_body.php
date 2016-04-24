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

