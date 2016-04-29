<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<?php 
 require "interceptor.php";
 require "server/app_connector.php";
 $user=$_SESSION["logged_in"];
 $conn=$database;
 $district="";
 $taluka="";
 $hobli="";
 $village="";
 $survayno="";
 $name="";
 $crop="";
 $totalarea="";
  $relation="";
 
 $query1="select (select s.state_name_k from states s where s.id=v.districtid) di,";
 $query1.=" (select s.state_name_k from states s where s.id=v.talukaid) ta,";
  $query1.=" (select s.state_name_k from states s where s.id=v.hobliid) ho,";
   $query1.=" (select s.state_name_k from states s where s.id=v.villageid) vi ";
   
 $query1.=" from village v, schemefilling_land sf, landdetails ld where sf.fillingid=".$_GET["fillingid"]." and sf.landdetailsid= ld.id and v.villageid=ld.villageid";
 
$result= $conn->query($query1);
 foreach($result as $row){
 $district=$row["di"];
  $taluka=$row["ta"];
   $hobli=$row["ho"];
    $village=$row["vi"];
	 
 }
$query="select sf.id schemefillingid, sf.regid, f.firstname_k,f.lastname_k,f.fathername,( select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and villageid= s.id) village,(select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and hobliid= s.id) hobli,c.castname,
(select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno,
  (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector,(select cropname_k from cropitems where id= sf.item1 ) crop1
,(select cropname_k from cropitems where id= sf.item2 ) crop2
,(select cropname_k from cropitems where id= sf.item3 ) crop3,(coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)) totalland,(select login_id from app_login where id= sf.regby ) regby,regdate,sf.item1,sf.item2,sf.item3
from farmerdetails f, schemefilling sf,casts c  where sf.regid= f.id and f.usercast= c.id and sf.id= ".$_GET["fillingid"]."";
$result =$conn->query($query);
foreach($result as $row){
$survayno=$row["survayno"];
$name=$row["firstname_k"]." ".$row["lastname_k"];
$crop=$row["crop1"].",".$row["crop1"].",".$row["crop3"];
$totalarea=$row["totalland"];
}

$postinspectiondate="";
$result=$conn->select("postinspection_mstr",array("inspected_date"),array("filling_id"=>$_GET["fillingid"]));
foreach($result as $row){
$postinspectiondate=date('d-m-Y',strtotime($row["inspected_date"]));
}

?>
<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript">

var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

function createDoc(){ 
 alert('23');
var doc = new jsPDF();
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
}


</script>
<style type="text/css">
.bl{
min-width:150px;
}
</style>
</head>

<body>
 

<div id="content">
<table align="center" class="reportmargin"><tr><td align="center">
<strong> <u>
 ೨೦೧೫-೧೬ನೇ ಸಾಲಿನ ಸೂಕ್ಫ್ಮ ನೀರಾವರಿ ಮಾರ್ಗಸೂಚಿ ಅನುಬಂಧ - ೧೪ ನಮೂನೆ-೧೦ </u><br/>
 
ಸ್ಥಳ ಪರಿಶೀಲನಾ ವರದಿ (ಕಾರ್ಯದೇಶ ನಂತರ)</strong></td></tr>
<tr><td>
<strong><?php print $district; ?></strong> ಜಿಲ್ಲೆ,  <strong><?php print $taluka; ?> </strong>ತಾಲ್ಲೂಕು <strong><u><span class="bl"><?php print $hobli; ?></span></u></strong> ಹೋಬಳಿ <strong><u><span class="bl"><?php print $village; ?></span></u> </strong>ಗ್ರಾಮದ <strong><u><?php print $survayno; ?></u></strong> ಸರ್ವೇ ನಂಬರಿನಲ್ಲಿ   ಶ್ರೀ / ಶ್ರೀಮತಿ <strong><u><?php print $name; ?></u></strong> ಬಿನ್/ಕೋ _______________ ರವರು<strong><u><?php print $crop; ?></u></strong>ಬೆಳೆಗೆ <strong> <u><?php print $totalarea; ?> hactor</u> </strong> ವಿಸ್ತೀರ್ಣದಲ್ಲಿ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಅಳವಡಿಸಿದ್ದು, ಸದರಿ ತಾರಿಕಿಗೆ ದಿನಾಂಕ :<strong><u><?php print $postinspectiondate; ?></u></strong>ರಂದು ಬೇಟಿ ನೀಡಿ ಸ್ಥಳ ಪರಿಶೀಲನೆ  ನಡೆಸಲಾಗಿದೆ.<br /><br />
ಸ್ಥಳ ಪರಿಶೀಲನೆ ವಿವರ ಈ ಮುಂದಿನ ತಿದ್ದು, ಈ ಮುಂದಿನ ಎಲ್ಲಾ ವಿವರಗಳನ್ನು ಈ ಮೂಲಕ ದೃಡೀಕರಿಸಿದೆ. <br />
೧. ಬೆಳೆ __________________________ ೨. ಅಂತರ __________ ೩. ಗಿಡಗಳ ಸ್ಂಖ್ಯೆ ________________ <br />
೪. ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕ ಅಳವಡಿಸಿದ ವಿಸ್ತೀರ್ಣ ____________ ಹೆಕ್ಟೇರ <br />
೫. ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕವನ್ನು ________________ ಕ್ಂಪನಿಯ _________________ ಡೀಲರವರು BIS ಹಾಗೂ ಅಗತ್ಯ ಗುಣಮಟ್ಟದ ಪರಿಕರಗಳನ್ನು ಬಳಸಿ ಅಲವಡಿಸಿರುತ್ತರೆ. <br />
೬. ತಾಲೂಕಿನಲ್ಲಿ ಅಳವಡಿಸಿರುವ  ಪರಿಕರಗಳ ವಿವರ. <br />
(ಅ) ಲ್ಯಾಟರಲಗಳ ನಡುವಿನ ಅಂತರ ______________ ಮೀಟರ್. <br />
(ಆ) ಹನಿಕೆಗಳ ನಡುವಿನ ಅಂತರ ______________ ಮೀಟರ್ <br />
(ಇ) ಅಳವಡಿಸಿದ ಹನಿಕೆಯ ವಿಧ ______________________ (Dripper, Inline, Micro Sprinkler etc.)<br />


೭. ತಾಲೂಕಿನಲ್ಲಿ ಅಳವಡಿಸಿರುವ ಪರಿಕರಗಳ ಪರಿಮಾಣವು ವಿನ್ಯಾಸ ಮತ್ತು ಬಿಲ್ ನಲ್ಲಿ ನಮೂದಿಸಿರುವ ಪ್ರಮಾಣದ ತೆ ಇರುತ್ತದೆ / ವ್ಯತ್ಯಾಸವನ್ನು ಷರಾದಲ್ಲಿ ನಮೂದಿಸಿದೆ. <br />
೮. ಕಾರ್ಯಾದೇಶ ನೀಡುವ ಮುನ್ನ ಸ್ಥಳ ಪರಿಶೀಲನೆ ಮಾಡಿದ ಸ್ಥಳದಲ್ಲಿ ಯೋ ಸೂಕ್ಷಮ್ ನಿರಾವರಿ ಘಟಕವನ್ನು ಅಳವಡಿಸಲಾಗಿದೆ. (GPS Co-ordinates ನಂತೆ ಪರಿಶೀಲಿಸುವುದು) <br />
೯. ಅಳವಡಿಸಿರುವ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕವು ಸಮರ್ಪಕವಾಗಿ ಕಾರ್ಯ ನಿರ್ವಹಿಸುತ್ತಿದೆ. <br /><br />

ದೃಡೀಕರಿಸಿದೆ. <br />

ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು <br />
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.)<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />

 
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅದಿಕಾರಿ, <br />
____________ಹೋಬಳಿಯ ರೈತ ಸಂರ್ಕಕೇಂದ್ರ,<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />

ಈ  ಅರ್ಜಿದಾರರ ತಾಕನ್ನು ನಾನು ಖುದ್ದಾಗಿ ________________ ದಿನಂಕದಂದು ಪರಿಷೀಲಿಸಿದ್ದು, ಎಲ್ಲಾ ಅಂಶಗಳು  ಸರಿಯಾಗಿರುತ್ತವೆ ಎಂದು ದೃಡೀಕರಿಸಿದೆ (ಹೆಚ್ಚಿನ ವಿವರ ಇದ್ದಲ್ಲಿ  ಪ್ರತ್ಯೇಕ ವರದಿ ಲಗತ್ತಿಸುವುದು)<br />

ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು /<br />
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.)<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />

ಈ  ಅರ್ಜಿದಾರರ ತಾಕನ್ನು ನಾನು ಖುದ್ದಾಗಿ ________________ ದಿನಂಕದಂದು ಪರಿಷೀಲಿಸಿದ್ದು, ಎಲ್ಲಾ ಅಂಶಗಳು  ಸರಿಯಾಗಿರುತ್ತವೆ ಎಂದು ದೃಡೀಕರಿಸಿದೆ (ಹೆಚ್ಚಿನ ವಿವರ ಇದ್ದಲ್ಲಿ  ಪ್ರತ್ಯೇಕ ವರದಿ ಲಗತ್ತಿಸುವುದು)<br />

ತೋಟಗಾರಿಕೆ ಉಪ ನಿರ್ದೇಶಕರು /<br />
(ಜಿ.ಪಂ.) ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br />

</p></td></tr></table>
</div>


</body>
</html>