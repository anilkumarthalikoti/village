<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<script language="javascript">
function validate_cooprative(cooprative)    //cooprative name validation
{
                var letters = /^[A-Za-z .,]+$/;
                if(cooprative.value.match(letters))
                        {
                         return true;
                        }
						else  
  {  
     alert("Enter Cooprative Society Name");  
	 document.form1.cooprative.focus();  
     return false;  
  }  
}
function validate_authorised(authorised)    //authorised name validation
{
                var letters = /^[A-Za-z .,]+$/;
                if(authorised.value.match(letters))
                        {
                         return true;
                        }
  else					  
  {  
     alert("Enter authorised Person Name");  
	 document.form1.authorised.focus();  
     return false;  
  }  
}
function validate_gender() //Gender validation
{
var dropdown = document.getElementById('gender_id');
if(dropdown.selectedIndex==0){
alert("Please select Gender");
dropdown.focus();
return false; 
}else{
return true;
}
}

function validate_cast() //cast validtion
{
var dropdown = document.getElementById('cast_id');
if(dropdown.selectedIndex==0){
alert("Please select cast");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_society() //Society Registration No validation
{
var empt = document.forms["form1"]["society"].value;
if (empt == "")
{
alert("Please Enter society number");
document.form1.society.focus();
return false;
}
else 
{
return true; 
}
}
function validate_tinno() //Tin number validation
{
var empt = document.forms["form1"]["tinno"].value;
if (empt == "")
{
alert("Please Enter Tin number");
document.form1.tinno.focus();
return false;
}
else 
{
return true; 
}
}
 function validate_state() //state validation
{
var dropdown = document.getElementById('state_id');
if(dropdown.selectedIndex==0){
alert("Please select state");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_dist() //District validation
{
var dropdown = document.getElementById('dist_id');
if(dropdown.selectedIndex==0){
alert("Please select District");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_taluk() //Taluk validation
{
var dropdown = document.getElementById('taluk_id');
if(dropdown.selectedIndex==0){
alert("Please select Taluk");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_hobli() //Hobli validation
{
var dropdown = document.getElementById('hobli_id');
if(dropdown.selectedIndex==0){
alert("Please select Hobli");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_village() //Village validation
{
var dropdown = document.getElementById('village_id');
if(dropdown.selectedIndex==0){
alert("Please select Village");
dropdown.focus();
return false; 
}else{
return true;
}
}
function validate_panchyat() //Panchyat validation
{
var dropdown = document.getElementById('panchyat_id');
if(dropdown.selectedIndex==0){
alert("Please select Panchyat");
dropdown.focus();
return false; 
}else{
return true;
}
}
  function validate_pincode(inputtxt) //pincode validation
      {
      var numbers = /^[0-9]+$/;
      if(inputtxt.value.match(numbers))
      {
      
      return true;
      }
      else
      {
      alert('Please Enter pincode');
      document.form1.pincode.focus();
      return false;
      }
      }
function phonenumber(inputtxt)  //Mobile number validation
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

function validate_lands() //Land survey validation
{
var empt = document.forms["form1"]["landser"].value;
if (empt == "")
{
alert("Please Enter Land servey number");
document.form1.landser.focus();
return false;
}
else 
{
return true; 
}
}
	 
function arc(inputtxt)   //Land arc validation
   {  
      var numbers = /^[-+]?[0-9]+$/;  
      if(inputtxt.value.match(numbers))  
      {  
      return true;  
      }  
      else  
      {  
      alert('Enter the Total Area in Acre');  
      document.form1.taa.focus();  
      return false;  
      }  
   } 

function hec(inputtxt)  //Land Hector validation
   {  
      var numbers = /^[-+]?[0-9]+$/;  
      if(inputtxt.value.match(numbers))  
      {  
      return true;  
      }  
      else  
      {  
      alert('Enter the Total Area in Hector');  
      document.form1.tah.focus();  
      return false;  
      }  
   } 

function account_no(inputtxt)   //Bank account validation
   {  
      var numbers = /^[-+]?[0-9]+$/;  
      if(inputtxt.value.match(numbers))  
      {  
      return true;  
      }  
      else  
      {  
      alert('Enter the Account Number');  
      document.form1.account.focus();  
      return false;  
      }  
   } 


function validate_bname() //Bank name validation
{
var dropdown = document.getElementById('bank_id');
if(dropdown.selectedIndex==0){
alert("Please select Bank");
dropdown.focus();
return false; 
}else{
age_group_info.innerHTML="";
return true;
}
}

function validate_Branch() //Bank branch validation
{
var dropdown = document.getElementById('branch_id');
if(dropdown.selectedIndex==0){
alert("Please select Bank Branch");
dropdown.focus();
return false; 
}else{
age_group_info.innerHTML="";
return true;
}
}

function validate_bankifsc(inputtxt) //Bank ifsc validation
{ 
var letters = /^[0-9a-zA-Z]+$/;
if(inputtxt.value.match(letters))
{
return true;
}
else
{
alert('Invalid Ifsc code');
document.form1.bifsc.focus();
return false;
}
}
</script>
<script language="javascript" type="text/javascript">
function click_address(form) 
{
	if(form["chk"].checked) 
	{
		 form["astate"].value = form["state"].value;
		 form["adist"].value = form["dist"].value;
		 form["ataluk"].value = form["taluk"].value;
		 form["ahobli"].value = form["hobli"].value;
		 form["avillage"].value = form["village"].value;
		 form["apanchayat"].value = form["panchayat"].value;
		 form["aconstituency"].value = form["constituency"].value;
		 
	}
}
</script>
</body>
<body >
<form method="post" name="form1" action=""  >
<table width="100%" border="0" cellspacing="0" cellpadding="0" style=" border:0px solid #CCC" align="center" bgcolor="#FFFFFF">
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="56%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="15%" class="tbody">Cooprative Society Name  :</td>
        <td width="41%"><input name="cooprative" type="text" id="username" placeholder="Society Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;" onBlur="validate_cooprative(cooprative);"required/><span class="error">* </span><br />
          <input name="cooprative1" lang="ka" type="text" id="username" charset="utf-8" onKeyDown="toggleKBMode(event)" onKeyPress="javascript:convertThis(event)" placeholder="Enter in kannada Unicode" style="height:15px; width:300px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
          </tr>
          <tr>
            <td colspan="2" style="height:10px;"></td>
            </tr>
          <tr>
            <td width="15%" class="tbody">Authorised Persone Name  :</td>
        <td width="41%"><input name="authorised" type="text" id="username" placeholder="Enter Authorised person Name" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_authorised(authorised);"required/><span class="error">* </span><br />
          <input name="authorised1" type="text" id="username" lang="ka" placeholder="Enter Authorised person Name Unicode" style="height:15px; width:300px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
          </tr>
          <tr>
            <td colspan="2" style="height:10px;"></td>
            </tr>
          <tr>
            <td colspan="2" class="tbody">Applicant Social Status  : <select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">

		<option>Select</option>
        <option>Individual</option>

        <option>Cooperative Society</option>

        <option>Others</option>


      </select></td>
        </tr>
          <tr>
            <td width="15%" class="tbody">Gender :</td>
        <td width="41%"><select name="gender"  type="text"  id="gender_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;"onblur="validate_gender();">
		
		<option>Select</option>
        <option>Male</option>

        <option>Female</option>
                <option>Other</option>

      </select><input lang="ka" name="gender1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
          </tr>
          <tr>
             <td width="15%" class="tbody">Cast :</td>
        <td width="41%"><select name="cast"  type="text"  id="cast_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;"onblur="validate_cast();">

		<option>Select</option>
        <option>Others</option>

        <option>General</option>
                <option>OBC</option>
                                <option>Minority</option>
                                                <option>SC</option>

      </select><input name="cast1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
          </tr>
           <tr>
            <td colspan="2" style="height:10px;"></td>
            </tr>
          <tr>
            <td width="15%" class="tbody">Age in years :</td>
        <td width="41%"><input name="age" type="text" id="username" placeholder="Enter age in years" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
          </tr>
            <tr>
            <td colspan="2" style="height:5px;"></td>
            </tr>
          <tr>
            <td width="15%" class="tbody">Qualification :</td>
        <td width="41%"><input name="qualification" type="text" id="username" placeholder="Enter Qualification" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><br />
          <input name="text" type="text" id="username" placeholder="Enter last Name Unicode" style="height:15px; width:300px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
          </tr>
          <tr>
            <td width="15%" class="tbody">Physically Challanged :</td>
            <td width="41%"><input name="physically" type="text" id="username" placeholder="Enter Qualification" style="height:15px; width:300px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><br />
              <input name="physically1" type="text" id="username" placeholder="Enter last Name Unicode" style="height:15px; width:300px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
        </table></td>
        <td width="44%" valign="top" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
        <td class="tmenu" align="right" style="padding-right:10px;">Society Registration No.: 
          <input name="society" type="text" id="username" placeholder="0000 0000 0000" style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_society(document.form1.society)"/><span class="error">* </span></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="height:50px;">&nbsp;</td>
  </tr>
  <tr>
        <td class="tmenu" align="right" style="padding-right:10px;">TIN No.: 
          <input name="tinno" type="text" id="username" placeholder="Enter TIN No." style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_tinno(document.form1.tinno)"/><span class="error">* </span></td>
  </tr>
   <tr>
    <td class="tmenu" align="right" style="height:50px;"></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">Ration Card No.: 
      <input name="rationno" type="text" id="username" placeholder="Enter Ration Card No." style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">Ration Card Type.:  <select name="rationcard"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">

		<option>Select</option>
        <option>APL</option>

        <option>BPL</option>

      </select></td>
  </tr>
  <tr>
    <td>&nbsp;</td>

  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">PAN Card No.: <input name="pan" type="text" id="username" placeholder="Enter PAN Card No." maxlength="12"style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
  </tr>
    <tr>
    <td class="tmenu" align="right" style="height:45px;"></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">KISAN Card No.: <input name="kisan" type="text" id="username" placeholder="Enter KISAN Card No." style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">Income Per Annum :      <input name="income" type="text" id="username" placeholder="Enter Income." style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="height:40px;"></td>
  </tr>
  <tr>
    <td class="tmenu" align="right" style="padding-right:10px;">Email ID : <input name="email" type="text" id="username" placeholder="Enter Email ID" style="height:15px; width:150px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
      </tr>
    </table></td></tr>
  <tr>
    <td style="border-top:1px solid #000; border-bottom:1px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">Address Details</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" class="tbody">State  :</td>
        <td width="32%"><select name="state"  type="text"  id="state_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;"onblur="validate_state();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="state1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">House No :</td>
        <td width="34%"><input name="house" type="text" id="username" placeholder="Enter House No." style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        </tr>
      <tr>
        <td width="14%" class="tbody">District  :</td>
        <td width="32%"><select name="dist"  type="text"  id="dist_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;" onBlur="validate_dist();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="district" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">Street  :</td>
        <td width="34%"><input name="street" type="text" id="username" placeholder="Enter Street" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Taluk   :</td>
        <td width="32%"><select name="taluk"  type="text"  id="taluk_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;" onBlur="validate_taluk();">
         
			<option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="taluk1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">Location   :</td>
        <td width="34%"><input name="location" type="text" id="username" placeholder="Enter Location" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Hobli   :</td>
        <td width="32%"><select name="hobli"  type="text"  id="hobli_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;" onBlur="validate_hobli();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="hobli1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">Land Mark   :</td>
        <td width="34%"><input name="landmark" type="text" id="username" placeholder="Enter Land Mark" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Village  :</td>
        <td width="32%"><select name="village"  type="text"  id="village_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;" onBlur="validate_village();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="village1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">Pin Code   :</td>
        <td width="34%"><input name="pincode" type="text" id="username" placeholder="Enter Pincode" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_pincode(document.form1.pincode)" required/><span class="error">* </span></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">District  :</td>
        <td width="32%"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">Street  :</td>
        <td width="34%"><input name="street" type="text" id="username" placeholder="Enter Street" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Panchayat  :</td>
        <td width="32%"><select name="panchayat"  type="text"  id="panchyat_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;" onBlur="validate_panchyat();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="panchayat1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="20%" class="tbody">Landline Phone No  :</td>
        <td width="34%"><input name="landno" type="text" id="username" placeholder="Enter Landline Phone No" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Constituency  :</td>
        <td width="32%"><select name="constituency"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">Mobile No  :</td>
        <td width="34%"><input name="mobileno" type="text" id="username" placeholder="Enter Mobile No" maxlength="10" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="phonenumber(document.form1.mobileno)"/><span class="error">* </span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td style="border-top:1px solid #000; border-bottom:1px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">Land Details</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>
      <label>
        <input type="checkbox" name="click" id="chk" onClick="click_address(this.form)">Check Here if land Address is same as above address
      </label>
   
    </td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" class="tbody">State  :</td>
        <td width="32%"><select name="astate"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="astate1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">Village  :</td>
        <td width="34%"><select name="avillage"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="avillage1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        </tr>
      <tr>
        <td width="14%" class="tbody">District  :</td>
        <td width="32%"><select name="adist"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="adist1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">District  :</td>
        <td width="34%"><select name="select3"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Taluk   :</td>
        <td width="32%"><select name="ataluk"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="ataluk1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">Panchayat  :</td>
        <td width="34%"><select name="apanchayat"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="apanchayat1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
      <tr>
        <td width="14%" class="tbody">Hobli   :</td>
        <td width="32%"><select name="ahobli"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="ahobli1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td width="20%" class="tbody">Constituency  :</td>
        <td width="34%"><select name="aconstituency"  type="text"  id="textfield1" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="aconstituency1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
      </tr>
        <tr>
        <td  class="tbody">&nbsp;</td>
        <td >&nbsp;</td>
        <td  class="tbody">&nbsp;</td>
        <td >&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15%"  class="tbody">Land Servey No.:</td>
        <td width="29%" ><input name="landser" type="text" id="username" placeholder="Enter Qualification" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_lands(document.form1.landser)"/><span class="error">* </span><br />
          <input name="text" type="lands1" id="username" placeholder="Enter last Name Unicode" style="height:15px; width:200px; color:#333; border:1px solid #333; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>

        <td width="20%"  class="tbody" valign="top" style="padding:0px; height:25px	">Total Area in Acre :</td>
        <td width="36%" valign="top" style="height:25px	"><input name="taa" type="text" id="username" placeholder="Enter Acre" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="arc(document.form1.taa)"required/><span class="error">* </span><br /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td  class="tbody" valign="top" style="padding:0px">Total Area in Hector :</td>
        <td valign="top"><input name="tah" type="text" id="username" placeholder="Enter Hector" style="height:15px; width:200px; color:#333; border:1px solid #000; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="hec(document.form1.tah)"required/><span class="error">* </span><br /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td style="border-top:1px solid #000; border-bottom:1px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">Bank Details</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" class="tbody">Name of Bank  :</td>
        <td width="35%"><select name="bank"  type="text"  id="bank_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;"onblur="validate_bname();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="bank1" type="text" id="username" placeholder="Unicode" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="17%" class="tbody">Branch IFSC Code   :</td>
        <td width="34%"><input name="bifsc" type="text" id="username" placeholder="Enter IFSC code " style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="validate_bankifsc(document.form1.bifsc)"/><span class="error">* </span></td>
        </tr>
      <tr>
        <td width="14%" class="tbody">Branch Name   :</td>
        <td width="35%"><select name="branch_name"  type="text"  id="branch_id" width="190px" style=" padding-left:10px; border:1px solid #ddd; -webkit-border-radius: 5px;	-moz-border-radius: 5px; border-radius: 10px; height:25px;"onblur="validate_Branch();">
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="branch_name1" type="text" id="username" placeholder="Unicode" style="height:15px; width:150px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/><span class="error">* </span></td>
        <td width="17%" class="tbody">Account No :</td>
        <td width="34%"><input name="account" type="text" id="username" placeholder="Enter Account No." style="height:15px; width:150px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"onblur="account_no(document.form1.account)"/><span class="error">* </span></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td style="border-top:1px solid #000; border-bottom:1px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">Document to Upload</td>
  </tr>
  <tr>
    <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%">&nbsp;</td>
        <td width="25%">&nbsp;</td>
        <td width="16%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="2%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="17%">&nbsp;</td>
        <td width="7%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Applicant Photo :</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
        <td>Aadhar Card</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" style="height:5px"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>RTC :</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
        <td>EPIC (Voter ID)</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" style="height:5px"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Chakbandi :</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
        <td>Ration Card</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
     <tr>
        <td colspan="9" style="height:5px"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Khata Utar :</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
        <td>PAN Card</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" style="height:5px"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Cast Certificate (SC/ST)</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
        <td>Kissan Card</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
          </label>
        </form></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td colspan="9" style="height:5px"></td>
        </tr>
      <tr>
        <td>&nbsp;</td>
        <td>Income Certificate</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
            </label>
          </form></td>
        <td>&nbsp;</td>
        <td>Bank Pass Book</td>
        <td><input name="text" type="text" id="username" placeholder="" style="height:15px; width:100px; color:#333; border:1px solid #ddd; font-family:Arial, Helvetica, sans-serif; font-size:13px;"/></td>
        <td><form name="form3" method="post" action="">
          <label>
            <input type="submit" name="button" id="button" value="Brows">
            </label>
          </form></td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
     <td style="border-top:1px solid #000; border-bottom:0px solid #000; font-size:18px; font-weight:bold; padding:5px;" align="center">
       <label>
         <input type="submit" name="button2" id="button2" value="Submit">
       </label>
       <label>
         <input type="reset" name="Reset" id="Reset" value="Reset">
       </label>
	   <?php
if(isset($_POST["submit"]))
{
            
			$mysqli = mysqli_connect( 'localhost', 'root', '1234', 'farmer' );
            // Check our connection
		if ( $mysqli->connect_error ) 
		{
			die( 'Connect Error: ' . $mysqli->connect_errno . ': ' . $mysqli->connect_error );
		}
		
		
		// Insert our data
		
		  $sql = "INSERT INTO farmer  VALUES ( '{$mysqli->real_escape_string($_POST['fname'])}',
			 '{$mysqli->real_escape_string($_POST['fhname'])}',
			 '{$mysqli->real_escape_string($_POST['lname'])}',
			 '{$mysqli->real_escape_string($_POST['gender'])}',
			 '{$mysqli->real_escape_string($_POST['cast'])}',
			 '{$mysqli->real_escape_string($_POST['adhar'])}',
			 '{$mysqli->real_escape_string($_POST['voter'])}',
			'{$mysqli->real_escape_string($_POST['pan'])}',
			'{$mysqli->real_escape_string($_POST['state'])}' ,
			'{$mysqli->real_escape_string($_POST['dist'])}', 
			'{$mysqli->real_escape_string($_POST['taluk'])}', 
			'{$mysqli->real_escape_string($_POST['hobli'])}', 
			'{$mysqli->real_escape_string($_POST['village'])}', 
			'{$mysqli->real_escape_string($_POST['pincode'])}', 
			'{$mysqli->real_escape_string($_POST['panchayat'])}', 
			'{$mysqli->real_escape_string($_POST['mobileno'])}', 
			'{$mysqli->real_escape_string($_POST['land'])}', 
			'{$mysqli->real_escape_string($_POST['taa'])}', 
			'{$mysqli->real_escape_string($_POST['tah'])}',
			'{$mysqli->real_escape_string($_POST['bank'])}', 
			'{$mysqli->real_escape_string($_POST['bifsc'])}', 
			'{$mysqli->real_escape_string($_POST['branch_name'])}', 
			'{$mysqli->real_escape_string($_POST['account'])}' )";  
			 
		$insert = $mysqli->query($sql);
		
		if($insert)
		{				
			echo "<script type='text/javascript'>\n";
			echo "alert(' Succesflly Stored');\n";
			echo "</script>";
		}
		else
		{
			die("Error: {$mysqli->errno} : {$mysqli->error}");
		}
		
		 	$mysqli->close();
		 	
}
?>
     </form>
	 
	 </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
	</body>
</html>