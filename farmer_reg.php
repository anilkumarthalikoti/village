<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script src="/js/common.js" type="text/javascript"></script>
<script src="/js/kannada.js" type="text/javascript"></script>
 <script src="js/farmer_reg.js" type="text/javascript"></script>
 
 
</head>

<body>
 
 <form method="POST" action="" name="form1">
<div class="viewport">
 <div class="title"><span>Registration</span></div>


 <table   width="100%" cellpadding="0" cellspacing="0"  >
 <tr><td align="right" style="border-bottom:1px solid #CCCCCC;"><input type="text" placeholder="Search" class="search"></input><select><option>Reg.No</option><option>Name</option><option>Ration card no</option><option>Adhar</option></select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td></tr>
 <tr><td  valign="top" style="padding:0; margin:0;">
 <ul id="tabs">

      <li><a id="tab1">Farmer/Beneficiary Details</a></li>
	   <li><a id="tab2">Account Details</a></li>
      <li><a id="tab3">Address Details</a></li>
	   <li><a id="tab4">Loan Details</a></li>
	    <li><a id="tab5">Bank Details</a></li>
		<li><a id="tab6">Documents to upload</a></li>
       

</ul>
<div class="container" id="tab1C">

 <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>First Name  :</td>
        <td><input name="fname" type="text" id="username" placeholder="Enter First Name"  onBlur="fnameVal(fname);"required/>					
          <input name="fname1" alt="ka" type="text" id="username" placeholder="Enter First Name Unicode"  /><span class="error">*</span> </td>
          </tr>
           
          <tr>
            <td >Father/Husbend Name  :</td>
        <td ><input name="fhname" type="text" id="username" placeholder="Enter Father/Husbend Name Name" onBlur="fhnameVal(fhname);" required/> 
          <input name="text" type="text" id="username" placeholder="Enter Father/Husbend Name Unicode" alt="ka" /><span class="error">*</span> </td>
          </tr>
        
          <tr>
            <td >Last Name  :</td>
        <td  ><input name="lname" type="text" id="username" placeholder="Enter last Name Name"  onblur="lnameVal(lname);" required/> 
          <input name="text" type="text" id="username" placeholder="Enter last Name Unicode" alt="ka" /><span class="error">*</span> </td>
          </tr>
          <tr>
            <td >Gender :</td>
        <td ><select name="gender"  type="text"  id="gender_id" width="190px"   onBlur="validate_gender();" />
		<option>Select</option>
        <option>Male</option>
        <option>Female</option>
                <option>Other</option>

      </select><input name="gender1" type="text" id="username" placeholder="Unicode"  /><span class="error">* </span>
	  </td>
          </tr>
          <tr>
             <td >Cast :</td>
        <td ><select name="cast"  type="text"  id="cast_id" width="190px"  onblur="validate_cast();">
		
		<option>Select</option>
        <option>Others</option>

        <option>General</option>
                <option>OBC</option>
                                <option>Minority</option>
                                                <option>SC</option>

      </select><input name="cast1" type="text" id="username" placeholder="Unicode" alt="ka"  /><span class="error">* </span></td>
          </tr>
           
          <tr>
            <td  >Age in years :</td>
        <td ><input name="age" type="text" id="username" placeholder="Enter age in years"  /></td>
          </tr>
            
          <tr>
            <td  >Qualification :</td>
        <td ><input name="qualification" type="text" id="username" placeholder="Enter Qualification" />
          <input name="text" type="text" id="username" placeholder="Enter last Name Unicode" alt="ka" /></td>
          </tr>
          <tr>
            <td  class="tbody">Physically Challanged :</td>
            <td  ><input type="radio" value="No" name="physicalchalanged" checked="checked" />No<input type="radio" value="Yes" name="physicalchalanged" />Yes </td>
          </tr>
         
        </table>


</div>
 <div class="container" id="tab2C">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">  <tr>
        <td>Aadhar No.: <input name="adhar" type="text" id="username" placeholder="0000 0000 0000" maxlength="12"   onBlur="adharnumber(document.form1.adhar)"required/><span class="error">* </span></td>
  </tr>
  
  <tr>
        <td>EPIC No.: <input name="voter" type="text" id="username" placeholder="Enter Voter Id Card No."  onblur="validate_voter(document.form1.voter)" required/><span class="error">* </span> </td> 
  </tr>
    
  <tr>
    <td>Ration Card No.: 
      <input name="ration" type="text" id="username" placeholder="Enter Ration Card No."  /></td>
  </tr>
  <tr>
    <td>Ration Card Type.:  <select name="select3"  type="text"  id="textfield1" width="190px"  >

        <option>APL</option>

        <option>BPL</option>

      </select></td>
  </tr>
  
  <tr>
    <td>PAN Card No.: <input name="pan" type="text" id="username" placeholder="Enter PAN Card No." maxlength="10"   onBlur="ValidatePAN(pan);" required/><span class="error">* </span>
	</td>
  </tr>
   
  <tr>
    <td>KISAN Card No.: <input name="kisan" type="text" id="username" placeholder="Enter KISAN Card No."  /></td>
  </tr>
  
  <tr>
    <td>Income Per Annum :      <input name="income" type="text" id="username" placeholder="Enter Income."  /></td>
  </tr>
   
  <tr>
    <td>Email ID : <input name="email" type="text" id="username" placeholder="Enter Email ID"  /></td>
  </tr>
  
</table>
 
 
 
 
 
 </div>
 
 
 
 <div class="container" id="tab3C">
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td >State  :</td>
        <td ><select name="state"  type="text"  id="state_id" width="190px" onblur="validate_state();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="state1" type="text" id="username" placeholder="Unicode" /><span class="error">* </span></td>
        <td >House No :</td>
        <td><input name="house" type="text" id="username" placeholder="Enter House No." /></td>
        </tr>
      <tr>
        <td >District  :</td>
        <td ><select name="dist"  type="text"  id="dist_id" width="190px"  onBlur="validate_dist();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="district" type="text" id="username" placeholder="Unicode" alt="ka" /><span class="error">* </span></td>
        <td >Street  :</td>
        <td><input name="street" type="text" id="username" placeholder="Enter Street"  /></td>
      </tr>
      <tr>
        <td >Taluk   :</td>
        <td ><select name="taluk"  type="text"  id="taluk_id" width="190px"  onBlur="validate_taluk();">
         
			<option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="taluk1" type="text" id="username" placeholder="Unicode" /><span class="error">* </span></td>
        <td >Location   :</td>
        <td><input name="location" type="text" id="username" placeholder="Enter Street"  /></td>
      </tr>
      <tr>
        <td >Hobli   :</td>
        <td ><select name="hobli"  type="text"  id="hobli_id" width="190px"  onBlur="validate_hobli();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="hobli1" type="text" id="username" placeholder="Unicode" alt="ka" /><span class="error">* </span></td>
        <td >Land Mark   :</td>
        <td><input name="landmark" type="text" id="username" placeholder="Enter Street"  /></td>
      </tr>
      <tr>
        <td >Village  :</td>
        <td ><select name="village"  type="text"  id="village_id" width="190px"  onBlur="validate_village();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="village1" type="text" id="username" placeholder="Unicode" /><span class="error">* </span></td>
        <td >Pin Code   :</td>
        <td><input name="pincode" type="text" id="username" placeholder="Enter Street"  onblur="validate_pincode(document.form1.pincode)" required/><span class="error">* </span></td>
      </tr>
      <tr>
        <td >District  :</td>
        <td ><select name="select3"  type="text"  id="textfield1" width="190px" >
          
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" alt="ka" /></td>
        <td >Street  :</td>
        <td><input name="street" type="text" id="username" placeholder="Enter Street"  /></td>
      </tr>
      <tr>
        <td >Panchayat  :</td>
        <td ><select name="panchayat"  type="text"  id="panchyat_id" width="190px"  onBlur="validate_panchyat();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="panchayat1" type="text" id="username" placeholder="Unicode" /><span class="error">* </span></td>
        <td >Landline Phone No  :</td>
        <td><input name="landno" type="text" id="username" placeholder="Enter Landline Phone No"  /></td>
      </tr>
      <tr>
        <td >Constituency  :</td>
        <td ><select name="constituency"  type="text"  id="textfield1" width="190px" >
          
		   <option>Select</option>
          <option>Iteam 1</option>
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="text" type="text" id="username" placeholder="Unicode" /></td>
        <td >Mobile No  :</td>
        <td><input name="mobileno" type="text" id="username" placeholder="Enter Mobile No" maxlength="10"  onblur="phonenumber(document.form1.mobileno)"/><span class="error">* </span></td>
      </tr>
    </table>
 
 
 
 
 
 
 
 </div>
 <div class="container" id="tab4C">
 
 
 
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td >State  :</td>
        <td ><select name="astate"  type="text"  id="textfield1" width="190px" >
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="astate1" type="text" id="username" placeholder="Unicode" /></td>
        <td >Village  :</td>
        <td><select name="avillage"  type="text"  id="textfield1" width="190px" >
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="avillage1" type="text" id="username" placeholder="Unicode" /></td>
        </tr>
      <tr>
        <td >District  :</td>
        <td ><select name="adist"  type="text"  id="textfield1" width="190px" >
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="adist1" type="text" id="username" placeholder="Unicode" /></td>
        <td >District  :</td>
        <td><select name="select3"  type="text"  id="textfield1" width="190px" >
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="text" type="text" id="username" placeholder="Unicode" /></td>
      </tr>
      <tr>
        <td >Taluk   :</td>
        <td ><select name="ataluk"  type="text"  id="textfield1" width="190px" >
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="ataluk1" type="text" id="username" placeholder="Unicode" /></td>
        <td >Panchayat  :</td>
        <td><select name="apanchayat"  type="text"  id="textfield1" width="190px" >
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="apanchayat1" type="text" id="username" placeholder="Unicode" /></td>
      </tr>
      <tr>
        <td >Hobli   :</td>
        <td ><select name="ahobli"  type="text"  id="textfield1" width="190px" >
          
          <option>Select</option>
		  <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
        </select><input name="ahobli1" type="text" id="username" placeholder="Unicode" /></td>
        <td >Constituency  :</td>
        <td><select name="aconstituency"  type="text"  id="textfield1" width="190px" >
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="aconstituency1" type="text" id="username" placeholder="Unicode" /></td>
      </tr>
       
    </table>
 
 
 
 
 
 
 
 </div>
 <div class="container" id="tab5C">
 <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td >Name of Bank  :</td>
        <td width="35%"><select name="bank"  type="text"  id="bank_id" width="190px" onblur="validate_bname();">
          
		  <option>Select</option>
          <option>Axis Bank</option>
          
          <option>Bank of India</option>
          <option>Bank of Baroda</option>
          <option>ICICI</option>
          
        </select><input name="bank1" type="text" id="username" placeholder="Unicode" /><span class="error">* </span></td>
        <td width="17%" class="tbody">Branch IFSC Code   :</td>
        <td><input name="bifsc" type="text" id="username" placeholder="Enter IFSC code " onblur="validate_bankifsc(document.form1.bifsc)"/><span class="error">* </span></td>
        </tr>
      <tr>
        <td >Branch Name   :</td>
        <td width="35%"><select name="branch_name"  type="text"  id="branch_id" width="190px"  onBlur="validate_Branch();">
          
		  <option>Select</option>
          <option>Iteam 1</option>
          
          <option>Iteam 2</option>
          <option>Iteam 3</option>
          <option>Iteam 4</option>
          
          </select><input name="bn" type="text" id="username" placeholder="Unicode"  /><span class="error">*</span></td>
        <td width="17%" class="tbody">Account No :</td>
        <td><input name="account" type="text" id="username" placeholder="Enter Account No."  onblur="account_no(document.form1.account)"/><span class="error">* </span></td>
      </tr>
    </table>
 
 </div>
  <div class="container" id="tab6C">
  <table cellspacing="5" id="fileupload">
  <tr>
  		<td>
  			<input type="button" value="Applicant photo"/>
  		</td>
		<td>
  			<input type="button" value="Adhar photo"/>
  		</td>
		<td>
  			<input type="button" value="Ration card"/>
  		</td>
		<td>
  			<input type="button" value="Voter"/>
  		</td>
		<td>
  			<input type="button" value="Pan"/>
  		</td>
		<td>
  			<input type="button" value="Chakibandi"/>
  		</td>
		<td>
  			<input type="button" value="Kisan"/>
  		</td>
		<td>
  			<input type="button" value="Income"/>
  		</td>
		<td>
  			<input type="button" value="Cast certificate"/>
  		</td>
		
		<td>
  			<input type="button" value="Bank passbook"/>
  		</td>
		
		</tr>
		<tr>
		
  		<td>
  		 
  		</td>
		<td>
  			 
  		</td>
		<td>
  			 
  		</td>
		<td>
  			 
  		</td>
		<td>
  			 
  		</td>
		<td>
  			 
  		</td>
		<td>
  			 
  		</td>
		<td height="350">&nbsp;
  			
  		</td>
		<td  >
  			 
  		</td>
		<td >&nbsp;
  			
  		</td>
		
		</tr>
  </table></div>
  <div style="float:right;"><span style="margin-right:20px;"><input type="button" class="button_login" value="Save"/></span></div>
 </td></tr>
 
 </table>
</div>
</form>
 
 
 
</body>
</html>