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
<p style="text-align:justify">೨೦೧೫-೧೬ನೇ ಸಾಲಿನ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಮಾರ್ಗಸೂಚಿಯ ಅನುಬಂಧ್  - ೦೮ ನಮೂನೆ - ೦೩<br />
ಸ್ಥಳ ಪರಿಶೀಲನಾ ವರದಿ (ಕಾರ್ಯಾದೇಶ ನೀಡುವ ಮುನ್ನ)<br />
ಶ್ರೀ /ಶ್ರೀಮತಿ ______________________________ ಬಿನ್ /ಕೊ ____________________ ರವರು ______________ ಗ್ರಾಮದ _______________________ ಸರ್ವೇ ನ್ಂ. ______________________ ಬೆಳೆಗೆ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಪದ್ಧತಿಯನ್ನು ಅಳವಾಡಿಸಳು ನೋಂದಣಿ ಅರ್ಜಿ ಸಂಖ್ಯೆ _________________ ಸಲ್ಲಿಸಿರುತ್ತಾರೆ.  ಆನಲಯನ್ ಸಂಖ್ಯೆ ______________ ಆಗಿರುತ್ತದೆ. <br /><br />
ಮೇಲ್ಕಾಣಿಸಿದ ಇವರ ಜಮೀನಿಗೆ ದಿನಾಂಕ : ________________ ರಂದು ಬೇಟಿ ನೀಡಿ ಸ್ಥಳ ಪರಿಶೀಲಿಸಿರುತ್ತೆನೆ. ಇವರ ಸರ್ವೇ ನಂ. ______________ ಜಮೀನಿನಲ್ಲಿ _________________ ಬೆಳೆಯನ್ನು ಬೆಳೆಯಲಾಗಿರುತ್ತದೆ / ಬೆಳೆಯಲು ಉದ್ದೇಶಿರುತ್ತಾರೆ. ಹಾಲಿ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಅಳವಡಿಸಲು. ಉದ್ದೇಶಿರುವ ತಾಕಿನಲ್ಲಿ ಹನಿ ನೀರಾವರಿ ಅಳವಡಿಸಿರುವುದಿಲ್ಲ / ಅಳವಡಿಸಿರುತ್ತಾರೆ. (* ಸಂಬಂದಿಸಿರುವುದನ್ನು ಹೊಡೆದು ಹಾಕಿ.) ಇವರ ಜಮೀನಿನಲ್ಲಿ ಬಾವಿ / ಕೋಳವೆ ಬಾವಿ ___________ ನೀರಿನ ಮೂಲ ಹೊಂದಿದ್ದು. ______________________________ ಕಂಪನಿಯ _______________________ ಡೀಲರ್ ರವರು ನೀಡಿರುವ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿಯಾ ವಿನ್ಯಸವು ತಾಂತ್ರಿಕವಾಗಿ ಸರಿ ಇರುತ್ತದೆ. ವಿನ್ಯಾಸದಂತೆ ________________  ಹೆಕ್ಟೇರ ಬೆಳೆಗೆ ಸೂಕ್ಷ್ಮ್ ನೀರಾವರಿ ಪದ್ಧತಿ ಅಳವಡಿಸಲು ಶಿಪಾರಸ್ಸು ಮಾಡಲಾಗಿದೆ. *ಸೂಕ್ಷ್ಮ್ ನೀರಾವರಿ ಪದ್ಧತಿ ಅಳವಡಿಕೆ ವಿನ್ಯಾಸವು ಸಮರ್ಪಕವಾಗಿಲ್ಲದೆ ಇರುವುದರಿಂದ ವಿನ್ಯಾಸವನ್ನು ಮಾರ್ಪಡಿಸಲು ತಿಳಿಸಬಹುದಗಿದೆ. (*ಸಂಬಂದಿಸದನ್ನು ಹೊಡೆದುಹಾಕಿ)<br /><br />
ಮುಂದುವರೆದು, ಸದರಿ ರೈತರ ಕೂಟುಂಬ ಈಗಾಗಲ್ಲೆ ____________ ವಿಸ್ತೀರ್ಣಾಕ್ಕೆ _______________ ವರ್ಷದಲ್ಲಿ ಸಹಾಯಧನ ಪದೆದಿರುತ್ತಾರೆ. ಅದರಿಂದ ಸದರಿ ಅರ್ಜಿಗೆ ಸಂಬಂದಿಸಿದಂತೆ ______________ ಹೆಕ್ಟ್ ರ  ವಿಸ್ತಿರ್ಣಕ್ಕೆ ___________ ವರ್ಷದಲ್ಲಿ ಸಹಾಯಧನ ಪದೆದಿರುತ್ತರೆ. ಆದ್ದರಿಂದ ಸದರಿ ಅರ್ಜಿಗೆ ಸಂಬಂದಿಸಿದಂತೆ ___________ ಹೆಕ್ಟ್ ರ  ವಿಸ್ತಿರ್ಣಕ್ಕೆ ಮಾತ್ರ ಸಹಾಯಧನಕ್ಕೆ ಪರಿಗಣಿಸಲಗಿದೆ. <br /><br />

ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅದಿಕಾರಿ, <br />
____________ಹೋಬಳಿಯ ರೈತ ಸಂರ್ಕಕೇಂದ್ರ,<br />
_____________ತಾಲ್ಲೂಕು,___________ಜಿಲ್ಲೆ <br /><br /><br />

(ವಿನ್ಯಸ ಸರಿಪಡಿಸಿ ನೀದಿದ್ದಲ್ಲಿ)<br />
ದಿನಾಂಕ __________ ರಂದು ವಿನ್ಯಾಸ  ಸರಿಪಡಿಸಿ ಸಲ್ಲಿಸಿದ್ದು ಸದರಿ ಅರ್ಜಿದಾರ ಜಮೀನಿನಲ್ಲಿ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಅಳವಡಿಸಲು ಶಿಫಾರಸು ಮಾಡಲಾಗಿದೆ. <br /><br />


ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅದಿಕಾರಿ, <br />
____________ಹೋಬಳಿಯ ರೈತ ಸಂರ್ಕಕೇಂದ್ರ,<br />
_____________ತಾಲ್ಲೂಕು,___________ಜಿಲ್ಲೆ <br /><br />

ದೃಡೀಕರಣ <br /><br />

ಸದರಿ ರೈತರ ಅರ್ಜಿಯನ್ನು ಪರಿಷೀಲಿಸಿದೆ. ಇದೆ ಜಮೀನಿನಲ್ಲಿ ಈ ಹಿಂದೆ ಸಹಾಯಧನ ಪಡೆಯಲಾಗಿರುವುದಿಲ್ಲ. ಇಲಾಖೆಗೆ ಮಾರ್ಗ ಸೂಚಿಯಂತೆ ಸದರಿ ರೈತರಿಗೆ _____________ ಗ್ರಾಮದ _________________ ಸರ್ವೇ ನಂಬರಿನ ____________ ವಿಸ್ತೀರ್ಣದ _______________ ಬೆಳೆಗೆ ಹನಿ ನೀರಾವರಿ ಪದ್ಧತಿ ಅಳವಡಿಸಲು ಪರಿಗಣಿಸಬಹುದು ಎಂದು ದೃಡೀಕರಿಸಿದೆ. <br />
ಮುಂದುವರೆದು, ಸದರಿ ರೈತರ ಕುಟುಂಬ ಈಗಾಗಲೇ ___________ ವಿಸ್ತೀರ್ಣಕ್ಕೆ __________ ವರ್ಷದಲ್ಲಿ ಸಹಾಯಧನ ಪದೆದಿರುತ್ತಾರೆ. ಅದ್ದರಿಂದ ಸದರಿ ಅರ್ಜಿಗೆ ಸಂಬಂದಿಸಿದಂತೆ ______________ ಹೆಕ್ಟರ ವಿಸ್ತೀರ್ಣಕ್ಕೆ ಮಾತ್ರ ಸಹಾಯಧನಕ್ಕೆ ಪರಿಗಣಿಸಬಹುದಾಗಿದೆ. ಆದ್ದರಿಂದ್ ಕಾರ್ಯಾದಸಿ ನೀಡಲು ಶಿಪರಸು ಮಾಡಿದೆ. <br /><br />

ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು /<br />
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.)<br />
_____________ತಾಲ್ಲೂಕು,___________ಜಿಲ್ಲೆ <br />


</p>
</div>


</body>
</html>