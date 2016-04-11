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
 <script src="js/farmer_reg.js" type="text/javascript"></script>
 

</head>

<body>

<div class="title" >Application Enrolment Form</div>
   <div class="viewport">
     
     <div class="sub1_title" ><table><tr><td>Select Applicant Type
         <select name="applicationType" id="applicationType"   onchange="farmer.changeview();"  >
         
         <option value="0">Select</option>
         <option value="1">Individual</option>
         <option value="2">Cooperative Society</option></select>
		 </td><td align="right"><table align="right"> <tr>
         <td ><input  type="text" class="search" placeholder="Search" />
             <select name="select">
               <option>Reg.No</option>
               <option>Name</option>
               <option>Ration card no</option>
               <option>Adhar</option>
             </select>
          </td>
       </tr></table></td></tr></table>
     </div>
	  <form method="POST" action="" name="form1" enctype="multipart/form-data">
    <div id="viewframer" class="hide-1">
	
	

     <table   width="100%" cellpadding="0" cellspacing="0"  >
      
       <tr>
         <td  valign="top" style="padding:0; margin:0;"><ul id="tabs">
             <li><a id="tab1"><u>F</u>armer/Beneficiary Details</a></li>
           <li><a id="tab2"><u>A</u>ccount Details</a></li>
           <li><a id="tab3">A<u>d</u>dress Details</a></li>
           <li><a id="tab4"><u>L</u>and Details</a></li>
           <li><a id="tab5"><u>B</u>ank Details</a></li>
           <li><a id="tab6">D<u>o</u>cuments to upload</a></li>
         </ul>
             <div class="container" id="tab1C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">First Name  :</td>
                   <td class="label"><input name="firstname" type="text" id="firstname" placeholder="Enter First Name"  />
                       <input name="firstname_k" alt="ka" type="text" id="firstname_k" placeholder="Enter First Name Unicode"  />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Father/Husbend Name  :</td>
                   <td class="label"><input name="fathername" type="text" id="fathername" placeholder="Enter Father/Husbend Name Name" onblur="fhnameVal(fhname);" required/>
                       <input name="fathername_k" type="text" id="fathername_k" placeholder="Enter Father/Husbend Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Last Name  :</td>
                   <td class="label"><input name="lastname" type="text" id="lastname" placeholder="Enter last Name Name"  />
                       <input name="lastname_k" type="text" id="lastname_k" placeholder="Enter last Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Gender :</td>
                   <td class="label"><input type="radio" name="gender" value="M" />Male/ಗಂಡು<input type="radio" name="gender" value="F" />Female/ಹೆಣ್ಣು

                     <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="label">Cast :</td>
                   <td class="label"><select name="usercast"  type="text"  id="usercast"   >
                       <option>Select</option>
                       <option value="1">Others</option>
                       <option value="2">General</option>
                       <option value="3">OBC</option>
                       <option value="4">Minority</option>
                       <option value="5">SC</option>
                     </select>
                       <input name="usercast_k" type="text" id="usercast_k" placeholder="Unicode" alt="ka"  />
                     <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="label">Date of birth :</td>
                   <td class="label"><input name="dob" type="text" id="dob" placeholder="DD/MM/YYYY"  /></td>
                 </tr>
                 <tr>
                   <td class="label">Qualification :</td>
                   <td class="label"><input name="qualification" type="text" id="qualification" placeholder="Enter Qualification" />
                       <input name="qualification_k" type="text" id="qualification_k" placeholder="Enter last Name Unicode" alt="ka" /></td>
                 </tr>
                 <tr>
                   <td class="label">Physically Challanged :</td>
                   <td class="label"><input type="radio" value="N" name="physicallychallanged" checked="checked" />
                     No
                       <input type="radio" value="Y" name="physicallychallanged" />
                     Yes </td>
                 </tr>
               </table>
             </div>
           <div class="container" id="tab2C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">Aadhar No.:</td>
                   <td class="label"><input name="aadhar" type="text" id="aadhar" placeholder="0000 0000 0000" maxlength="14"  />
                       <span class="error">* </span></td>
                   <td class="label">EPIC No.: </td>
                   <td class="label"><input name="voter" type="text" id="voter" placeholder="Enter Voter Id Card No."  />
                       <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="label">Ration Card No.: </td>
                   <td class="label"><input name="rationcard" type="text" id="rationcard" placeholder="Enter Ration Card No."  /></td>
                   <td class="label">PAN Card No.:</td>
                   <td class="label"><input name="pancard" type="text" id="pancard" placeholder="Enter PAN Card No." maxlength="10"    />
                       <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="label">Ration Card Type.: </td>
                   <td class="label"><select name="rationcardtype"  type="text"  id="rationcardtype"   >
                       <option>APL</option>
                       <option>BPL</option>
                   </select></td>
                   <td class="label">KISAN Card No.:</td>
                   <td class="label"><input name="kishancard" type="text" id="kishancard" placeholder="Enter KISAN Card No."  /></td>
                 </tr>
                 <tr>
                   <td class="label">Income Per Annum :</td>
                   <td class="label"><input name="income" type="text" id="income" placeholder="Enter Income."  /></td>
                   <td class="label">Email ID : </td>
                   <td class="label"><input name="mailid" type="text" id="mailid" placeholder="Enter Email ID"  /></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab3C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			   <td  class="label">Select village</td><td>:</td>
			   <td  colspan="3"  ><select name="village" class="excel">
			   <option value="-1">Select</option>
			   
			   <?php 
			   
			   $query="select s.id, concat(s.state_name,'/',s.state_name_k,'      (',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.stateid)";
			  
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.districtid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.talukaid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.constituencyid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.panchayatiid)";
			    $query.=" ,'') vname from village v ,states s where s.id= v.villageid";
			   $result=$conn->query($query);
			   echo $query;
			   foreach($result as $row){
			   echo "<option value='".$row["id"]."'>".$row["vname"]."</option>";
			   }
			   ?>
			   
			   
			   </select>			   </td>
			   </tr>
                 <tr>
                   
                   <td class="label">House No</td><td>:</td>
                   <td class="label"><input name="houseno" type="text" id="houseno" placeholder="Enter House No." /></td>
				    <td class="label">Street</td><td>:</td>
                   <td class="label"><input name="street" type="text" id="street" placeholder="Enter Street"  /></td>
                 </tr>
                 <tr>
                    
                  
                 </tr>
                 <tr>
                   
                   <td class="label">Location </td><td>:</td>
                   <td class="label"><input name="location" type="text"   placeholder="Enter Street"  /></td>
				      <td class="label">Land Mark</td><td>:</td>
                   <td class="label"><input name="landmark" type="text" id="landmark" placeholder="Enter Street"  /></td>
                 </tr>
                 
                 <tr>
                    
                   <td class="label">Pin Code</td><td>:</td>
                   <td class="label"><input name="pincode" type="text" id="pincode" placeholder="Pincode"    /></td>
				    <td class="label">Landline Phone No</td><td>:</td>
                   <td class="label"><input name="landlineno" type="text" id="landlineno" placeholder="Enter Landline Phone No"  /></td>
                 </tr>
                  
               
                 <tr>
                 
                   <td class="label">Mobile No</td><td>:</td>
                   <td class="label" colspan="3"><input name="mobileno" type="text" id="mobileno" placeholder="Enter Mobile No" maxlength="10"  />
                       </td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab4C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">Select village  :</td>
                   <td class="label"><select name="landvillage"    >
                       <option>Select</option>
    <?php 
			   $user=$_SESSION["logged_in"];
			   $query="select s.id, concat(s.state_name,'/',s.state_name_k,'      (',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.stateid)";
			  
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.districtid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.talukaid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.constituencyid)";
			   $query.=",'->',(select concat(s1.state_name,'/',s.state_name_k) from states s1 where s1.id=v.panchayatiid)";
			    $query.=" ,'') vname from village v ,states s where s.id= v.villageid and v.hobliid in (select am.hobliid from actionmapping am where am.hobliid=v.hobliid and am.regid=".$user["id"].")";
			   $result=$conn->query($query);
			   echo $query;
			   foreach($result as $row){
			   echo "<option value='".$row["id"]."'>".$row["vname"]."</option>";
			   }
			   ?>
			   
			                  </select>
                   
                    
                 </tr>
                 
               </table>
           </div>
           <div class="container" id="tab5C">
               <table width="100%" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">Name of Bank  :</td>
                   <td width="35%" class="label"><select name="bank"     id="bank"   >
                       <option>Select</option>
                       <option value="1">Axis Bank</option>
                       <option value="2">Bank of India</option>
                       <option value="3">Bank of Baroda</option>
                       <option value="4">ICICI</option>
                     </select>
                       <input   type="text" id="bank_k" placeholder="Unicode" />
                     <span class="error">* </span></td>
                   <td width="17%" class="label">Branch IFSC Code   :</td>
                   <td class="label"><input name="ifsc" type="text" id="ifcs" placeholder="Enter IFSC code "  />
                       <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="label">Branch Name   :</td>
                   <td width="35%" class="label"><select name="branch"  type="text"  id="branch"   onblur="validate_Branch();">
                       <option>Select</option>
                      <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select>
                       <input   type="text" id="branch_k" placeholder="Unicode"  />
                     <span class="error">*</span></td>
                   <td width="17%" class="label">Account No :</td>
                   <td><input name="accountno" type="text" id="accountno" placeholder="Enter Account No."   />
                       <span class="error">* </span></td>
                 </tr>
               </table>
           </div>
           <div class="container" id="tab6C">
               <table cellspacing="5" id="fileupload">
                 <tr>
                   <td><input name="button" type="button" value="Applicant photo"/> <input type="file" class="hide" name="applicationphoto" id="applicationphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Adhar photo"/><input type="file" class="hide" name="adharphoto" id="adharphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Ration card"/><input type="file" class="hide" name="rationcardphoto" id="rationcardphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Voter"/><input type="file" class="hide" name="voterphoto" id="voterphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Pan"/><input type="file" class="hide" name="pancardphoto" id="pancardphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Chakibandi"/><input type="file" class="hide" name="chakibandiphoto" id="chakibandiphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Kisan"/><input type="file" class="hide" name="kisanphoto" id="kisanphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Income"/><input type="file" class="hide" name="incomephoto" id="incomephoto"/>
                   </td>
                   <td><input name="button" type="button" value="Cast certificate"/><input type="file" class="hide" name="castphoto" id="castphoto"/>
                   </td>
                   <td><input name="button" type="button" value="Bank passbook"/><input type="file" class="hide" name="passbookphoto" id="passbookphoto"/>
                   </td>
                 </tr>
                 <tr id="imgview">
                   <td id="0"></td>
                   <td id="1"></td>
                   <td id="2"></td>
                   <td id="3"></td>
                   <td id="4"></td>
                   <td id="5"></td>
                   <td id="6"></td>
                   <td height="350" id="7">&nbsp;</td>
                   <td  id="8" ></td>
                   <td id="9">&nbsp;</td>
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