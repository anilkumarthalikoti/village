<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style>
/* proposal */
.propals_t
{background-color:#FF0; font-family:Arial, Helvetica, sans-serif; font-size:12px; line-height:20px; padding:10px; text-align:center;}
.propals_c
{background-color:#fff; font-family:Arial, Helvetica, sans-serif; font-size:11px; line-height:20px; padding:2px; text-align:center;}
/* end proposal */
</style>

<SCRIPT LANGUAGE="JavaScript">
<!-- 	
<!-- Begin
function CheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = true ;
}

function UnCheckAll(chk)
{
for (i = 0; i < chk.length; i++)
	chk[i].checked = false ;
}
//  End -->
</script>
</head>

<body>
<form name="myform" action="checkboxes.asp" method="post">
<table width="1500" border="1" bordercolor="#CCCCCC" cellspacing="0" cellpadding="0" style="border:1px solid #CCC;">
    <tr>
      <td colspan="14" style="padding:10px;" align="left"><input type="button" name="Check_All" value="Mark All"
onClick="CheckAll(document.myform.check_list)">&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" name="Un_CheckAll" value="Unmark All"
onClick="UnCheckAll(document.myform.check_list)">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</td>
    </tr>
      <tr>
        <td class="propals_t">Select</td>
		<td class="propals_t">Reg. No</td>
		<td class="propals_t">Date of Reg.</td>
		<td class="propals_t">Full Name</td>
		<td class="propals_t">Village Nmae</td>
		<td class="propals_t">Caste</td>
		<td class="propals_t">Land Survey No.</td>
		<td class="propals_t">Land Area</td>
		<td class="propals_t">Farmer Type</td>
		<td class="propals_t">Sector</td>
		<td class="propals_t">Crop</td>
		<td class="propals_t">Drip Installed Land Area</td>
		<td class="propals_t">Pre-Inspection</td>
		<td class="propals_t">Action</td>
      </tr>
      <tr>
        <td  align="center" valign="middle"><input type="checkbox" name="check_list" value="1"></td>
		<td class="propals_c">F0001</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 1</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Done</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="2"></td>
		<td class="propals_c">F0002</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 2</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Done</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="3"></td>
		<td class="propals_c">F0003</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 3</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Done</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="4"></td>
		<td class="propals_c">F0004</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 4</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Forwarded</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="5"></td>
		<td class="propals_c">F0005</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 5</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Forwarded</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="6"></td>
		<td class="propals_c">F0006</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 6</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Forwarded</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="7"></td>
		<td class="propals_c">F0007</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 7</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
       <tr>
         <td class="propals_c"><input type="checkbox" name="check_list" value="8"></td>
		<td class="propals_c">F0008</td>
		<td class="propals_c"></td>
		<td class="propals_c">Name 8</td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c"></td>
		<td class="propals_c">Yet to Forward
</td>
		<td class="propals_c"></td>
      </tr>
  </table>
</form>
</body>
</html>    