<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Office_App</title>
<link href="css/style.css" type="text/css" rel="stylesheet" />
<link href="css/menu.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/default.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script src="js/kannada.js" type="text/javascript"></script>
 <script src="js/farmer_reg.js" type="text/javascript"></script>
 
 
</head>

<body>
 

   <div class="viewport">
     <div class="title" >Application Enrolment Form</div>
     <div class="sub1_title" >Select Applicant Type
         <select name="applicationType" id="applicationType"   onchange="farmer.changeview();"  >
         
         <option value="0">Select</option>
         <option value="1">Individual</option>
         <option value="2">Cooperative Society</option></select>
     </div>
	  <form method="POST" action="" name="form1">
    <div id="viewframer" class="hide">
	
	
	 <div class="sub2_title" ><u>F</u>armer/Beneficiary Details</div>
     <table   width="100%" cellpadding="0" cellspacing="0"  >
       <tr>
         <td align="right" style="border-bottom:1px solid #CCCCCC;"><input name="text" type="text" class="search" placeholder="Search" />
             <select name="select">
               <option>Reg.No</option>
               <option>Name</option>
               <option>Ration card no</option>
               <option>Adhar</option>
             </select>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
       </tr>
       <tr>
         <td  valign="top" style="padding:0; margin:0;"><ul id="tabs">
             <li><a id="tab1"><u>F</u>armer/Beneficiary Details</a></li>
           <li><a id="tab2"><u>A</u>ccount Details</a></li>
           <li><a id="tab3">A<u>d</u>dress Details</a></li>
           <li><a id="tab4"><u>L</u>oan Details</a></li>
           <li><a id="tab5"><u>B</u>ank Details</a></li>
           <li><a id="tab6">D<u>o</u>cuments to upload</a></li>
         </ul>
             <div class="container" id="tab1C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="f_text">First Name  :</td>
                   <td class="f_text"><input name="firstname" type="text" id="firstname" placeholder="Enter First Name"  onblur="fnameVal(fname);"required/>
                       <input name="firstname_k" alt="ka" type="text" id="firstname_k" placeholder="Enter First Name Unicode"  />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="f_text">Father/Husbend Name  :</td>
                   <td class="f_text"><input name="fathername" type="text" id="fathername" placeholder="Enter Father/Husbend Name Name" onblur="fhnameVal(fhname);" required/>
                       <input name="fathername_k" type="text" id="fathername_k" placeholder="Enter Father/Husbend Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="f_text">Last Name  :</td>
                   <td class="f_text"><input name="lastname" type="text" id="lastname" placeholder="Enter last Name Name"  />
                       <input name="lastname_k" type="text" id="lastname_k" placeholder="Enter last Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="f_text">Gender :</td>
                   <td class="f_text"><input type="radio" name="gender" value="MALE" />Male/ಗಂಡು<input type="radio" name="gender" value="FEMALE" />Female/ಹೆಣ್ಣು

                     <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="f_text">Cast :</td>
                   <td class="f_text"><select name="cast"  type="text"  id="cast_id"   onblur="validate_cast();">
                       <option>Select</option>
                       <option>Others</option>
                       <option>General</option>
                       <option>OBC</option>
                       <option>Minority</option>
                       <option>SC</option>
                     </select>
                       <input name="cast1" type="text" id="username" placeholder="Unicode" alt="ka"  />
                     <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="f_text">Age in years :</td>
                   <td class="f_text"><input name="dob" type="text" id="dob" placeholder="Enter age in years"  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Qualification :</td>
                   <td class="f_text"><input name="qualification" type="text" id="qualification" placeholder="Enter Qualification" />
                       <input name="qualification_k" type="text" id="qualification_k" placeholder="Enter last Name Unicode" alt="ka" /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Physically Challanged :</td>
                   <td class="f_text"><input type="radio" value="No" name="physicalchalanged" checked="checked" />
                     No
                       <input type="radio" value="Yes" name="physicalchalanged" />
                     Yes </td>
                 </tr>
               </table>
             </div>
           <div class="container" id="tab2C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="f_text">Aadhar No.:</td>
                   <td class="f_text"><input name="aadhar" type="text" id="aadhar" placeholder="0000 0000 0000" maxlength="14"  />
                       <span class="error">* </span></td>
                   <td class="f_text">EPIC No.: </td>
                   <td class="f_text"><input name="voter" type="text" id="voter" placeholder="Enter Voter Id Card No."  onblur="validate_voter(document.form1.voter)" required/>
                       <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="f_text">Ration Card No.: </td>
                   <td class="f_text"><input name="rationcard" type="text" id="rationcard" placeholder="Enter Ration Card No."  /></td>
                   <td class="f_text">PAN Card No.:</td>
                   <td class="f_text"><input name="pancard" type="text" id="pancard" placeholder="Enter PAN Card No." maxlength="10"   onblur="ValidatePAN(pan);" required/>
                       <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="f_text">Ration Card Type.: </td>
                   <td class="f_text"><select name="rationcardtype"  type="text"  id="rationcardtype"   >
                       <option>APL</option>
                       <option>BPL</option>
                   </select></td>
                   <td class="f_text">KISAN Card No.:</td>
                   <td class="f_text"><input name="kishancard" type="text" id="kishancard" placeholder="Enter KISAN Card No."  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Income Per Annum :</td>
                   <td class="f_text"><input name="income" type="text" id="income" placeholder="Enter Income."  /></td>
                   <td class="f_text">Email ID : </td>
                   <td class="f_text"><input name="mailid" type="text" id="mailid" placeholder="Enter Email ID"  /></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab3C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="f_text">State  :</td>
                   <td class="f_text"><select name="state"  type="text"  id="state"  onblur="validate_state();">
                       <option value="-1">Select</option>
                       <option value="1">Karnataka</option>
                        
                     </select>
                       <input name="state_k" type="text" id="state_k" placeholder="Unicode" />
                     <span class="error">* </span></td>
                   <td class="f_text">House No :</td>
                   <td class="f_text"><input name="houseno" type="text" id="houseno" placeholder="Enter House No." /></td>
                 </tr>
                 <tr>
                   <td class="f_text">District  :</td>
                   <td class="f_text"><select name="district"   id="district"   onblur="validate_dist();">
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="district" type="text" id="username" placeholder="Unicode" alt="ka" />
                     <span class="error">* </span></td>
                   <td class="f_text">Street  :</td>
                   <td class="f_text"><input name="street" type="text" id="street" placeholder="Enter Street"  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Taluk   :</td>
                   <td class="f_text"><select name="taluk"  type="text"  id="taluk_id"   onblur="validate_taluk();">
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="taluk_k" type="text" id="taluk_k" placeholder="Taluk" />
                     <span class="error">* </span></td>
                   <td class="f_text">Location   :</td>
                   <td class="f_text"><input name="location" type="text" id="username" placeholder="Enter Street"  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Hobli   :</td>
                   <td class="f_text"><select name="hobli"  type="text"  id="hobli"   onblur="validate_hobli();">
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="hobli_k" type="text" id="hobli_k" placeholder="Hobli" alt="ka" />
                     <span class="error">* </span></td>
                   <td class="f_text">Land Mark   :</td>
                   <td class="f_text"><input name="landmark" type="text" id="landmark" placeholder="Enter Street"  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Village  :</td>
                   <td class="f_text"><select name="village"  type="text"  id="village"   >
                       <option>Select</option>
                     <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="village_k" type="text" id="username" placeholder="Village" />
                     <span class="error">* </span></td>
                   <td class="f_text">Pin Code   :</td>
                   <td class="f_text"><input name="pincode" type="text" id="pincode" placeholder="Pincode"    />
                       <span class="error">* </span></td>
                 </tr>
                  
                 <tr>
                   <td class="f_text">Panchayat  :</td>
                   <td class="f_text"><select name="panchayat"  type="text"  id="panchyat_id"   onblur="validate_panchyat();">
                       <option>Select</option>
                        <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="panchayat_k" type="text" id="panchayat_k" placeholder="Unicode" />
                     <span class="error">* </span></td>
                   <td class="f_text">Landline Phone No  :</td>
                   <td class="f_text"><input name="landlineno" type="text" id="landlineno" placeholder="Enter Landline Phone No"  /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Constituency  :</td>
                   <td class="f_text"><select name="constituency"  type="text"  id="textfield1"  >
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="text" type="text" id="username" placeholder="Unicode" /></td>
                   <td class="f_text">Mobile No  :</td>
                   <td class="f_text"><input name="mobileno" type="text" id="mobileno" placeholder="Enter Mobile No" maxlength="10"  />
                       <span class="error">* </span></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab4C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="f_text">State  :</td>
                   <td class="f_text"><select name="landstate"     id="landstate"  >
                       <option>Select</option>
                      <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landstate_k" type="text" id="landstate_k" placeholder="Unicode" /></td>
                   <td class="f_text">Village  :</td>
                   <td class="f_text"><select name="landvillage"  type="text"  id="landvillage"  >
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landvillage_k" type="text" id="landvillage_k" placeholder="Unicode" /></td>
                 </tr>
                 <tr>
                   <td class="f_text">District  :</td>
                   <td class="f_text"><select name="landdistrict"     id="landdistrict"  >
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landdistrict_k" type="text" id="landdistrict" placeholder="Unicode" /></td>
                   <td class="f_text">Panchayat  :</td>
                   <td class="f_text">
				   <select name="landpanchayat"    id="landpanchayat"  >
                       <option>Select</option>
                       <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landpanchayat_k" type="text" id="landpanchayat_k" placeholder="Unicode" /></td>
                 </tr>
                 <tr>
                   <td class="f_text">Taluk   :</td>
                   <td class="f_text">
				   <select name="landtaluk_k"  id="landtaluk_k"  >
                       <option>Select</option>
                   <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="ataluk1" type="text" id="username" placeholder="Unicode" /></td>
                   <td class="f_text">Hobli  :</td>
                   <td class="f_text"><select name="landhobli"  id="landhobli"  >
                       <option>Select</option>
                     <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landhobli_k" type="text" id="landhobli_k" placeholder="Unicode" /></td>
                 </tr>
                 <tr>
                   
                   <td class="f_text" colspan="3">Constituency  :</td>
                   <td class="f_text"><select name="landconstituency"  type=  id="landconstituency"  >
                       <option>Select</option>
                      <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="landconstituency_k"   placeholder="Unicode" /></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab5C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="f_text">Name of Bank  :</td>
                   <td width="35%" class="f_text"><select name="bank"     id="bank"   >
                       <option>Select</option>
                       <option value="1">Axis Bank</option>
                       <option value="2">Bank of India</option>
                       <option value="3">Bank of Baroda</option>
                       <option value="4">ICICI</option>
                     </select>
                       <input name="bank_k" type="text" id="bank_k" placeholder="Unicode" />
                     <span class="error">* </span></td>
                   <td width="17%" class="f_text">Branch IFSC Code   :</td>
                   <td class="f_text"><input name="ifsc" type="text" id="ifcs" placeholder="Enter IFSC code "  />
                       <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="f_text">Branch Name   :</td>
                   <td width="35%" class="f_text"><select name="branch"  type="text"  id="branch"   onblur="validate_Branch();">
                       <option>Select</option>
                      <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input name="bn" type="text" id="username" placeholder="Unicode"  />
                     <span class="error">*</span></td>
                   <td width="17%" class="f_text">Account No :</td>
                   <td><input name="accountno" type="text" id="accountno" placeholder="Enter Account No."   />
                       <span class="error">* </span></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab6C">
               <table cellspacing="5" id="fileupload">
                 <tr>
                   <td><input name="button" type="button" value="Applicant photo"/>
                   </td>
                   <td><input name="button" type="button" value="Adhar photo"/>
                   </td>
                   <td><input name="button" type="button" value="Ration card"/>
                   </td>
                   <td><input name="button" type="button" value="Voter"/>
                   </td>
                   <td><input name="button" type="button" value="Pan"/>
                   </td>
                   <td><input name="button" type="button" value="Chakibandi"/>
                   </td>
                   <td><input name="button" type="button" value="Kisan"/>
                   </td>
                   <td><input name="button" type="button" value="Income"/>
                   </td>
                   <td><input name="button" type="button" value="Cast certificate"/>
                   </td>
                   <td><input name="button" type="button" value="Bank passbook"/>
                   </td>
                 </tr>
                 <tr>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td></td>
                   <td height="350">&nbsp;</td>
                   <td  ></td>
                   <td >&nbsp;</td>
                 </tr>
               </table>
           </div>
           <div style="float:right;"><span style="margin-right:20px;">
             <input name="button" type="button" class="button_login" value="Save" onclick="farmer.saveData()"/>
           </span></div></td>
       </tr>
     </table>
	
	
	
	</div>
	</form>
   </div>
 
 
 
 
</body>
</html>