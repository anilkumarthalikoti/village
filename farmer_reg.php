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
         <td > 
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
          
           <li><a id="tab5"><u>B</u>ank Details</a></li>
           <li><a id="tab6">D<u>o</u>cuments to upload</a></li>
         </ul>
             <div class="container" id="tab1C">
               <table class="form xlarge" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">First Name </td><td>:</td>
                   <td class="label"><input name="firstname" type="text" id="firstname" placeholder="Enter First Name"  />
                       <input name="firstname_k" alt="ka" type="text" id="firstname_k" placeholder="Enter First Name Unicode"  />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Father/Husbend Name  </td><td>:</td>
                   <td class="label"><input name="fathername" type="text" id="fathername" placeholder="Enter Father/Husbend Name Name" onblur="fhnameVal(fhname);" required/>
                       <input name="fathername_k" type="text" id="fathername_k" placeholder="Enter Father/Husbend Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Last Name </td><td> :</td>
                   <td class="label"><input name="lastname" type="text" id="lastname" placeholder="Enter last Name Name"  />
                       <input name="lastname_k" type="text" id="lastname_k" placeholder="Enter last Name Unicode" alt="ka" />
                     <span class="error">*</span> </td>
                 </tr>
                 <tr>
                   <td class="label">Gender </td><td>:</td>
                   <td class="label"><input type="radio" name="gender" value="M" />Male/ಗಂಡು<input type="radio" name="gender" value="F" />Female/ಹೆಣ್ಣು

                     <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="label">Cast </td><td>:</td>
                   <td class="label"><select name="usercast"  type="text"  id="usercast"   >
                       <option value="-1">Select</option>
                       <?php 
					   $result=$conn->select("casts",array("id","castname","castname_k"));
					   foreach($result as $row){
					   echo "<option value='".$row["id"]."'>".$row["castname"]."/".$row["castname_k"]."</option>";
					   }
					   ?>
                     </select>
                      
                     <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="label">Date of birth </td><td>:</td>
                   <td class="label"><input name="dob" type="text" id="dob" class="datepicker" placeholder="DD/MM/YYYY"  /></td>
                 </tr>
                 <tr>
                   <td class="label">Qualification </td><td>:</td>
                   <td class="label"><input name="qualification" type="text" id="qualification" placeholder="Enter Qualification" />
                       <input name="qualification_k" type="text" id="qualification_k" placeholder="Enter last Name Unicode" alt="ka" /></td>
                 </tr>
                 <tr>
                   <td class="label">Physically Challanged </td><td>:</td>
                   <td class="label"><input type="radio" value="N" name="physicallychallanged" checked="checked" />
                     No
                       <input type="radio" value="Y" name="physicallychallanged" />
                     Yes <input type="button" value="NEXT>>" onclick="$('#tab2').click()"/></td>
                 </tr>
				 
               </table>
             </div>
           <div class="container" id="tab2C">
               <table  class="form xlarge" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">Aadhar No</td><td>:</td>
                   <td class="label"><input name="aadhar" rules="required,numberspace,length_8" type="text" id="aadhar" defaultplaceholder="0000 0000 0000" maxlength="14"  />
                       <span class="error">* </span></td>
                   <td class="label">EPIC No</td><td>: </td>
                   <td class="label"><input name="voter" type="text" id="voter" placeholder="Enter Voter Id Card No."  />
                       <span class="error">* </span> </td>
                 </tr>
                 <tr>
                   <td class="label">Ration Card No </td><td>: </td>
                   <td class="label"><input name="rationcard" type="text" id="rationcard" placeholder="Enter Ration Card No."  /></td>
                   <td class="label">PAN Card No</td><td>:</td>
                   <td class="label"><input name="pancard" type="text" id="pancard" placeholder="Enter PAN Card No." maxlength="10"    />
                       <span class="error">* </span></td>
                 </tr>
                 <tr>
                   <td class="label">Ration Card Type</td><td>: </td>
                   <td class="label"><select name="rationcardtype"  type="text"  id="rationcardtype"   >
                       <option>APL</option>
                       <option>BPL</option>
                   </select></td>
                   <td class="label">KISAN Card No</td><td>:</td>
                   <td class="label"><input name="kishancard" type="text" id="kishancard" placeholder="Enter KISAN Card No."  /></td>
                 </tr>
                 <tr>
                   <td class="label">Income Per Annum </td><td>:</td>
                   <td class="label"><input name="income" type="text" id="income" placeholder="Enter Income."  /></td>
                   <td class="label">Email ID </td><td>: </td>
                   <td class="label"><input rules="required,email" name="mailid" type="text" id="mailid" placeholder="Enter Email ID"  /></td>
                 </tr>
				 <tr><td colspan="6"><input type="button" value="NEXT>>" onclick="$('#tab3').click()"/><input type="button" value="<< Previous" onclick="$('#tab1').click()"/></td></tr>
               </table>
           </div>
           <div class="container" id="tab3C">
               <table class="xlarge form" border="0" cellspacing="0" cellpadding="0">
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
			   
			   
			   </select>			   </td><td></td>
			   </tr>
                 <tr>
                   
                   <td class="label">House No</td><td>:</td>
                   <td class="label"><input name="houseno" type="text" id="houseno" placeholder="Enter House No." /></td>
				    <td class="label">Street</td><td>:</td>
                   <td class="label"><input name="street" type="text" id="street" placeholder="Enter Street"  /></td>
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
                   <td class="label" colspan="4"><input name="mobileno" type="text" id="mobileno" placeholder="Enter Mobile No" maxlength="10"  />
                     <input type="button" value="NEXT>>" onclick="$('#tab5').click()"/><input type="button" value="<< Previous" onclick="$('#tab2').click()"/>  </td>
                 </tr>
               </table>
           </div>
          
           <div class="container" id="tab5C">
               <table class="form xlarge" border="0" cellspacing="0" cellpadding="0">
                 <tr>
                   <td class="label">Name of Bank  </td><td>:</td>
                   <td   class="label"><select name="bank"     id="bank"   >
                       <option>Select</option>
                       <option value="1">Axis Bank</option>
                       <option value="2">Bank of India</option>
                       <option value="3">Bank of Baroda</option>
                       <option value="4">ICICI</option>
                     </select>
					 </td>
                      <td> <input   type="text" id="bank_k" placeholder="Unicode" />
                     </td>
                   <td  class="label">Branch IFSC Code   </td><td>:</td>
                   <td class="label"><input name="ifsc" type="text" id="ifcs" placeholder="Enter IFSC code "  />
                        </td>
                 </tr>
                 <tr>
                   <td class="label">Branch Name   </td><td>:</td>
                   <td   class="label"><select name="branch"  type="text"  id="branch"   onblur="validate_Branch();">
                       <option>Select</option>
                      <option value="1">Iteam 1</option>
                       <option value="2">Iteam 2</option>
                       <option value="3">Iteam 3</option>
                       <option value="4">Iteam 4</option>
                     </select></td>
					 <td>
                       <input   type="text" id="branch_k" placeholder="Unicode"  />
                     <span class="error">*</span></td>
                   <td   class="label">Account No </td><td>:</td>
                   <td><input name="accountno" type="text" id="accountno" placeholder="Enter Account No."   />
                       <span class="error">* </span></td>
                 </tr>
				 <tr><td colspan="8"> 
                     <input type="button" value="NEXT>>" onclick="$('#tab6').click()"/><input type="button" value="<< Previous" onclick="$('#tab3').click()"/> </td></tr>
               </table>
           </div>
           <div class="container" id="tab6C">
               <table cellspacing="5" id="fileupload" class="form excel margin">
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
				 <tr height="20"><td colspan="11"> <input name="button" type="button" class="button_login" value="Save" onclick="farmer.saveData()"/>
				 <input type="button" value="<< Previous" onclick="$('#tab5').click()"/>
				 </td></tr>
               </table>
           </div>
            </td>
       </tr>
     </table>
	
	
	
	</div>
	</form>
   </div>
 
 
 
 
</body>
</html>