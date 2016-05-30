<!DOCTYPE html>
<html lang="en">
<head>
<title>DC Bill</title>
<meta charset="utf-8">
<?php 
 require "interceptor.php";
 require "server/app_connector.php";
$conn=$database;
$files=$_POST['schemefillingid'];
$query="select sch.name schemename,s.filling_id, c.id castid,c.castname_k castnamek , c.castcode ,fd.fathername_k ,s.sanctionamt, s.installment_1,s.installment_2 from sanctionorder s ,schemefilling sf, farmerdetails fd,casts c,schemes sch where  sch.id= sf.subschemeid and sf.id= s.filling_id and c.id= fd.usercast and fd.id= sf.regid and s.filling_id in (".implode(',', $files).")"; 
 
$conditions=array(
"[<>]sanctionorder"=>array("schemefilling.id","sanctionorder.filling_id"),
"[<>]farmerdetails"=>array("schemefilling.regid","farmerdetails.id"),
"[<>]casts"=>array("farmerdetails.usercast","casts.id"));
$outercondition=array();
$outercondition["schemefilling.id"]=$files;
 
$result=$conn->query($query);
$castwise=array();
foreach($result as $row)
 {
 if(!isset($castwise[$row["castid"]])){
 $castwise[$row["castid"]]=$row;
 }
 }
 
?>
<link href="css/dc_bill.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php 

foreach($castwise as $cast){

?>
<table width="1000px">
  <tr>
    <td class="h5 text-center">ಕರ್ನಾಟಕ ಸರ್ಕಾರ</td>
  </tr>
  <tr>
    <td class="h7 text-center">ಖಜಾನೆಯಲ್ಲಿ ಸಂದಾಯವಾಗುವ ಸಾದಿಲ್ವಾರು ಬಿಲ್ಲು</td>
  </tr>
  <tr>
    <td class="h5 text-center">ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.) ವಿಜಯಪುರ ರ 2015-16 ನೇ ಸಾಲಿನ ಸಾದಿಲ್ವಾರು ವೆಚ್ಚದ ಸವಿವರ ಬಿಲ್ಲು.<br>
		ಬಿಲ್ ಸಂಖ್ಯೆ : 01/2015-16 ಸಾದಿಲ್ವಾರು ವೆಚ್ಚದ ಸವಿವರ ಬಿಲ್. ಜಿಲ್ಲೆ/ಉಪ ಖಜಾನೆ : ವಿಜಯಪುರ </td>
  </tr>
</table>
<table width="1000px">
  <tr>
<td width="300px" class="text-center">ಲೆಕ್ಕ ಶೀರ್ಷಿಕೆ<br>
<table width="100%" class="no-border">
          <tr>
            <td>2</td>
            <td>4</td>
            <td>0</td>
            <td>1</td>
            <td width="40%" class="no-border"></td>
          </tr>
          <tr>
            <td>0</td>
            <td>0</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
            <td class="no-border"><strong><?php print $cast["schemename"]?></strong></td>
          </tr>
          <tr>
            <td>1</td>
            <td>0</td>
            <td>8</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
          </tr>
          <tr>
            <td>2</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
            <td class="no-border"></td>
            <td class="no-border"><strong><?php print $cast["castnamek"]?></strong></td>
          </tr>
          <tr>
            <td>3</td>
            <td>0</td>
            <td class="no-border"></td>
            <td class="no-border"></td>
            <td class="no-border"></td>
          </tr>
        </table>

    </td>
<td width="400px" class="no-border" >
    	<table width="100%" class="no-border">
      <tr>
        <td class="no-border">
        <table width="100%" class="text-center no-border" >
          <tr>
            <td colspan="4" class="no-border"><strong>ಖಜಾನೆ ಕೋಡ್</strong></td>
            <td class="no-border"></td>
            <td colspan="4" class="no-border"><strong>ಡ್ರಾ.ಅ.ಕೋ.</strong></td>
            </tr>
          <tr>
            <td>2</td>
            <td>8</td>
            <td>0</td>
            <td>0</td>
            <td class="no-border">ZO</td>
            <td>8</td>
            <td>0</td>
            <td>3</td>
            <td>5</td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td class="no-border">
        	<table width="100%" class="text-center no-border" >
          <tr>
            <td colspan="11" class="no-border"><strong>ಲೆಕ್ಕ ಶೀರ್ಷಿಕೆ ಕೋಡ್</strong></td>            
            </tr>
          <tr>
            <td>0</td>
            <td>0</td>
            <td class="no-border">&nbsp;</td>
            <td>1</td>
            <td>0</td>
            <td>8</td>
            <td class="no-border">&nbsp;</td>
            <td>2</td>
            <td class="no-border">&nbsp;</td>
            <td>3</td>
            <td>0</td>
          </tr>
        </table>

        </td>
      </tr>
      <tr>
        <td class="no-border">
        <br>
        	<table width="100%" class="no-border text-center">
              <tr>
                <td width="30%">ಪುರಸ್ಕೃತ</td>
                <td width="20%">(V)</td>
                <td width="30%">ಯೋಜನೆಯೇತರ</td>
                <td width="20%">&times;</td>
              </tr>
              <tr>
                <td>ಪ್ರಬೃತ</td>
                <td>(C)</td>
                <td>ಯೋಜನೆ</td>
                <td>&radic;</td>
              </tr>
            </table>

        </td>
      </tr>
         
    </table>
    </td>
    <td>
    	<table width="100%" class="no-border">
          <tr>
            <td colspan="2">ಖಜಾನೆ ಉಪಯೋಗಕ್ಕೆ</td>
          </tr>
          <tr>
            <td width="70%" >ಸಿ.ಟಿ.ಎಸ್. ಸಂದಾಯದ ಮೂಲ:</td>
            <td width="30%" class="text-center">5</td>
          </tr>
          <tr>
            <td colspan="2">ದಿನಾಂಕ:</td>
          </tr>
          <tr>
            <td colspan="2">ಒಚರ್ ಸಂಖ್ಯೆ:</td>
          </tr>
        </table>

    </td>
  </tr>  
</table>
<table width="1000">
  <tr>
    <td width="300" class="text-center h2">ಸಂದಾಯಗಳ ವಿವರ</td>
    <td width="200" class="text-center h2">ಮೊಬಲಗು ರೂ.</td>
    <td width="300" class="text-center h2">ಕಡಿತಗಳು</td>
    <td width="200" class="text-center h2">ಮೊಬಲಗು ರೂ.</td>
  </tr>
  <tr>
    <td>ಮಂಜೂರಿ</td>
    <td>&nbsp;</td>
    <td>ಇ.ಜೆ.ಐ.ಎಸ್.</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ಇತರೇ ವೆಚ್ಚ</td>
    <td>&nbsp;</td>
    <td>ವೃತ್ತಿ ತೆರಿಗೆ</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>ಬಾಡಿಗೆ, ದರ ಮತ್ತು ತೆರಿಗೆ</td>
    <td>&nbsp;</td>
    <td>ಆದಾಯ ತೆರಿಗೆ</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="no-border"><table width="100%" class="no-border text-center">
      <tr>
        <?php
          for($i=0;$i<strlen($cast["castcode"]);$i++){		 
		 ?>
        <td width="20%"><?php print  substr( $cast["castcode"], $i, 1 )?></td>
        <?php
		} ?>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td class="no-border"><table width="100%" class="no-border">
      <tr>
        <td class="text-right">123456.00</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td rowspan="3">
    	<table width="100%" class="no-border text-center">
      <tr>
        <td width="40%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
        <td width="20%">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </td>
    <td rowspan="3">
    	<table width="100%" class="no-border">
      <tr>
        <td class="text-right">&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
  <tr>
    <td class="text-right">ಒಟ್ಟು</td>
    <td class="text-right">123456.00</td>
  </tr>
  <tr>
    <td class="text-right">(-) ಕಡಿತಗಳು</td>
    <td class="text-right">0.00</td>
  </tr>
  <tr>
    <td class="text-right">ನಿವ್ವಳ ಮೊತ್ತ</td>
    <td class="text-right">123456.00</td>
    <td class="text-center">ಒಟ್ಟು ಕಡಿತಗಳು</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="text-center">ಉಪ ಓಚರುಗಳ ಸಂಖ್ಯೆ ದಿನಾಂಕ</td>
    <td class="text-center" colspan="2">ವಿಶೇಷ ಮಂಜೂರಾತಿಯ ಅಗತ್ಯವಿರುವ ಎಲ್ಲಾ ವೆಚ್ಚಗಳ ವಿವರಣೆ, ಪ್ರಾಧಿಕಾರದ ಸಂಖ್ಯೆ ಮತ್ತು ದಿನಾಂಕ</td>
    <td class="text-center">ಮೊಬಲಗು ರೂ.</td>
  </tr>
</table>
<table width="1000" class="text-center">
  <tr>
    <td colspan="8">2015-16 ನೇ ಸಾಲಿನ ಪ್ರಧಾನ ಮಂತ್ರಿ ಕೃಷಿ ಸಿಂಚಾಯಿ ಯೋಜನೆಯಡಿ ಹನಿ ನಿರಾವರಿ ಅಳವಡಿಸಿದ ಈ ಕೆಳಕಂಡ ರೈತರಿಗೆ ಪ್ರತಿಶತ 90/50 ಸಹಾಯಧನವನ್ನು ತೋಟಗಾರಿಕೆ ಉಪ ನಿರ್ದೇಶಕರು, (ಜಿಲ್ಲಾ ಪಂಚಯಾತ್) ವಿಜಯಪುರ ರವರ ಮಂಜೂರಾತಿ ಆದೇಶ ಸಂಖ್ಯೆ: ತೋಉನಿ/ಜಿ.ಪಂ./ವಿ/ತಾ.ಸ.-2/ಹನಿ/ಮಂ.ಅ./1, 2, 3, 4, 5 /2015-16 ದಿನಾಂಕ: 01/07/2016 ರ ಪ್ರಕಾರ ಮಂಜೂರಾಗಿದ್ದು, ಪರಿಸ್ಕೃತ ಸರ್ಕಾರದ ಆದೇಶದನುಸಾರ ಮಂಜೂರಾದ ಸಹಾಯಧನದ ಶೇ. 85% ರಷ್ಟು ಸಹಾಯಧನವನ್ನು ರೈತರ ಒಪ್ಪಿಗೆ ಮೇರೆಗೆ ಸಂಬಂಧಿಸಿದ ಹನಿ ನಿರಾವರಿ ವಿತರಕರಾದ Mahalakshmi Enterprises, Kanamadi ಇವರ Jain Irrigation Pvt. Ltd. ಕಂಪನಿಗೆ ಅರ್.ಟಿ.ಜಿ.ಎಸ್. ಮೂಲಕ ಸಹಾಯಧನ ಪಾವತಿಸಲು ತೆಗೆಯಲಾಗಿದೆ.</td>
  </tr>
  <tr>
    <td width="30px">ಕ್ರ.ಸಂ.</td>
    <td width="400px">ಫಲಾನುಭವಿಗಳ ಹೆಸರು</td>
    <td width="110px">ಗ್ರಾಮ</td>
    <td width="110px">ಬೆಳೆ</td>
    <td width="100px">ಸರ್ವೇ ನಂ.</td>
    <td width="50px">ವಿಸ್ತೀರ್ಣ</td>
    <td width="100px">ಮಂಜೂರು ನೀಡಿದ ಸಹಾಯಧನ</td>
    <td width="100px">ಪಾವತಿಗೆ ಪರಿಗಣಿಸಿದ ಶೇ. 85% ಸಹಾಯಧನ</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>ಈ ಅಂಕಣಗಳನ್ನು ಉಪಯೋಗಿಸಿದಾಗ ತಪ್ಪದೆ ಆಬ್ಜೆಕ್ಟಿವ್ ಲೆಕ್ಕ ಶೀರ್ಷಿಕೆ ಕೋಡ್ ಉಪಯೋಗಿಸಿ. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ಪು.ತಿ.ನೋ.</p>
<?php }

?>
</body>
</html>