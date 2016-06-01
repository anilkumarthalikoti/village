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
  $company="";
  $dealer="";
  $spacing="";
  $plantspacing="";
 
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
$query="select sf.id schemefillingid, sf.regid, f.firstname_k,f.lastname_k,f.fathername,( select state_name from village ,states s where villageid in ";
$query.=" (select ld.villageid from schemefilling_land, landdetails ld where sf.id= fillingid and ld.id= landdetailsid) and villageid= s.id) village, ";
$query.=" (select state_name from village ,states s where villageid in (select ld.villageid from schemefilling_land, landdetails ld where ";
$query.=" sf.id= fillingid and ld.id= landdetailsid) and hobliid= s.id) hobli,c.castname,";
$query.=" (select group_concat(l.landsono separator ', ') from schemefilling_land sfl,landdetails l where fillingid=sf.id and l.id= sfl.landdetailsid) survayno,";
$query.="   (select sum(l.totalland) from landdetails l where l.regid=sf.regid  ) ftype,(select s.name from schemes s where s.id= sf.subschemeid) sector,";// sub scheme
$query.=" (select cropname_k from cropitems where id= pm.crop1 ) crop1 "; 
$query.=" ,(select cropname_k from cropitems where id= pm.crop2) crop2 ";
$query.=" ,(select cropname_k from cropitems where id= pm.crop3 ) crop3 ";
$query.=" ,(coalesce(sf.area1,0)+coalesce(sf.area2,0)+coalesce(sf.area3,0)) totalland ";
$query.=" ,(select dc1.name_k from dealers_company dc1 where dc1.id= dc.parent_id) company_name ,dc.name_k dealer_name "; // Dealer & company name
//$query.=" ,(select dc1.name_k from dealers_company dc1 where dc1.id= dc.parent_id) company_name ,dc.name_k dealer_name "; // plant spacing
$query.=" ,(select login_id from app_login where id= sf.regby ) regby,regdate,sf.item1,sf.item2,sf.item3";
$query.=" from farmerdetails f, schemefilling sf,postinspection_mstr pm, dealers_company dc,preinspection pi,casts c ";
$query.="   where  dc.id= pi.dealer and pm.filling_id= sf.id and pi.filling_id= pm.filling_id and  sf.regid= f.id and f.usercast= c.id and sf.id= ".$_GET["fillingid"]."";
$result =$conn->query($query);
foreach($result as $row){
$survayno=$row["survayno"];
$name=$row["firstname_k"]." ".$row["lastname_k"];
$crop=$row["crop1"].",".$row["crop2"].",".$row["crop3"];
 $crop=str_replace(",,","",$crop);
$totalarea=$row["totalland"];
$dealer=$row["dealer_name"];
$company=$row["company_name"];
}

$postinspectiondate="";
$result=$conn->select("postinspection_mstr",array("inspected_date","spacing1","spacing2","spacing3","pspacing1","pspacing2","pspacing3","area1","area2","area3"),array("filling_id"=>$_GET["fillingid"]));
foreach($result as $row){
$postinspectiondate=date('d-m-Y',strtotime($row["inspected_date"]));
$spacing=$row["spacing1"].",".$row["spacing2"].",".$row["spacing3"];
 $spacing=str_replace(",,","",$spacing);
$plantspacing=$row["pspacing1"].",".$row["pspacing2"].",".$row["pspacing3"];
$plantspacing=str_replace(",,","",$plantspacing);
}

?>
 <link href="css/pivot.css" type="text/css" rel="stylesheet"/>
 <script type="text/javascript" src="js/pivot.js"></script>
<script type="text/javascript" src="js/jspdf.js"></script>
<script type="text/javascript">
 $(document).ready(function(){
 
 
   $("#mat_data").pivot($("#mdata"), 
        { 
            rows: ["Particulars","Unit","Type","Qty"] 
        });
		 
		$("[class='pvtRowLabel']").css("height","16px");
							  $("[class='pvtVal']").css("padding","5px");
							  $("[class='pvtAxisLabel']").css("height","16px");
							   $("[class='pvtColLabel']").css("height","16px");
						 
							   $("[class='pvtColLabel']").css("background-color","#FFFFFF");
							     $("[class='pvtVal']").css("background-color","#FFFFFF");
							  $("[class='pvtAxisLabel']").css("background-color","#FFFFFF");
							   
			 
 
 });
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
೧. ಬೆಳೆ <u><strong><?php print $crop; ?></strong></u> ೨. ಅಂತರ <u><strong><?php print $spacing; ?></strong></u> ೩. ಗಿಡಗಳ ಸ್ಂಖ್ಯೆ <u><strong><?php print $plantspacing; ?></strong></u> <br />
೪. ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕ ಅಳವಡಿಸಿದ ವಿಸ್ತೀರ್ಣ ____________ ಹೆಕ್ಟೇರ <br />
೫. ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕವನ್ನು <u><strong><?php print $company; ?></strong></u> ಕ್ಂಪನಿಯ <u><strong><?php print $dealer; ?></strong></u> ಡೀಲರವರು BIS ಹಾಗೂ ಅಗತ್ಯ ಗುಣಮಟ್ಟದ ಪರಿಕರಗಳನ್ನು ಬಳಸಿ ಅಲವಡಿಸಿರುತ್ತರೆ. <br />
೬. ತಾಲೂಕಿನಲ್ಲಿ ಅಳವಡಿಸಿರುವ  ಪರಿಕರಗಳ ವಿವರ. <br />
(ಅ) ಲ್ಯಾಟರಲಗಳ ನಡುವಿನ ಅಂತರ ______________ ಮೀಟರ್. <br />
(ಆ) ಹನಿಕೆಗಳ ನಡುವಿನ ಅಂತರ ______________ ಮೀಟರ್ <br />
(ಇ) ಅಳವಡಿಸಿದ ಹನಿಕೆಯ ವಿಧ ______________________ (Dripper, Inline, Micro Sprinkler etc.)<br />
<div id="mat_data"></div>

<div>
೭. ತಾಲೂಕಿನಲ್ಲಿ ಅಳವಡಿಸಿರುವ ಪರಿಕರಗಳ ಪರಿಮಾಣವು ವಿನ್ಯಾಸ ಮತ್ತು ಬಿಲ್ ನಲ್ಲಿ ನಮೂದಿಸಿರುವ ಪ್ರಮಾಣದ ತೆ ಇರುತ್ತದೆ / ವ್ಯತ್ಯಾಸವನ್ನು ಷರಾದಲ್ಲಿ ನಮೂದಿಸಿದೆ. <br />
೮. ಕಾರ್ಯಾದೇಶ ನೀಡುವ ಮುನ್ನ ಸ್ಥಳ ಪರಿಶೀಲನೆ ಮಾಡಿದ ಸ್ಥಳದಲ್ಲಿ ಯೋ ಸೂಕ್ಷಮ್ ನಿರಾವರಿ ಘಟಕವನ್ನು ಅಳವಡಿಸಲಾಗಿದೆ. (GPS Co-ordinates ನಂತೆ ಪರಿಶೀಲಿಸುವುದು) <br />
೯. ಅಳವಡಿಸಿರುವ ಸೂಕ್ಷ್ಮ ನೀರಾವರಿ ಘಟಕವು ಸಮರ್ಪಕವಾಗಿ ಕಾರ್ಯ ನಿರ್ವಹಿಸುತ್ತಿದೆ. <br /><br />

ದೃಡೀಕರಿಸಿದೆ. <br />
 <table style="width:100%"><tr><td align="left">
ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು <br />
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.)<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />
</td><td align="right">
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ಅದಿಕಾರಿ, <br />
____________ಹೋಬಳಿಯ ರೈತ ಸಂರ್ಕಕೇಂದ್ರ,<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />
 </td></tr></table>
ಈ  ಅರ್ಜಿದಾರರ ತಾಕನ್ನು ನಾನು ಖುದ್ದಾಗಿ ________________ ದಿನಂಕದಂದು ಪರಿಷೀಲಿಸಿದ್ದು, ಎಲ್ಲಾ ಅಂಶಗಳು  ಸರಿಯಾಗಿರುತ್ತವೆ ಎಂದು ದೃಡೀಕರಿಸಿದೆ (ಹೆಚ್ಚಿನ ವಿವರ ಇದ್ದಲ್ಲಿ  ಪ್ರತ್ಯೇಕ ವರದಿ ಲಗತ್ತಿಸುವುದು)<br />

ಹಿರಿಯ ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು /<br />
ಸಹಾಯಕ ತೋಟಗಾರಿಕೆ ನಿರ್ದೇಶಕರು (ಜಿ.ಪಂ.)<br />
ವಿಜಯಪುರ ತಾಲ್ಲೂಕು, ವಿಜಯಪುರ ಜಿಲ್ಲೆ <br /><br />

ಈ  ಅರ್ಜಿದಾರರ ತಾಕನ್ನು ನಾನು ಖುದ್ದಾಗಿ ________________ ದಿನಂಕದಂದು ಪರಿಷೀಲಿಸಿದ್ದು, ಎಲ್ಲಾ ಅಂಶಗಳು  ಸರಿಯಾಗಿರುತ್ತವೆ ಎಂದು ದೃಡೀಕರಿಸಿದೆ (ಹೆಚ್ಚಿನ ವಿವರ ಇದ್ದಲ್ಲಿ  ಪ್ರತ್ಯೇಕ ವರದಿ ಲಗತ್ತಿಸುವುದು)<br />

ತೋಟಗಾರಿಕೆ ಉಪ ನಿರ್ದೇಶಕರು /<br><div>

<div class="hide">
<table id="mdata">
<thead>
<tr> <th style="color:#000">Particulars</th><th>Unit</th><th>Type</th><th>Qty</th></tr>
</thead>
<tbody>
<?php 
$query="select itemname,units,standard_measure,ggrcqty from cropitemsprice cip left join postinspection_dtl pid on (cip.id= pid.item_id  and pid.filling_id=  ".$_GET["fillingid"]." and pid.item_id!=0 ) ";
$result=$conn->query($query);
$sno=1;
foreach($result as $row){
$tr="<tr> <td>param_1</td><td>param_2</td><td>param_3</td><td>param_4</td></tr>";
  $tr=str_replace("param_1",$row["itemname"],$tr);
  $tr=str_replace("param_2",$row["units"],$tr);
  $tr=str_replace("param_3",$row["standard_measure"],$tr);
  $tr=str_replace("param_4",$row["ggrcqty"],$tr);
 
echo $tr;
}
?>
</tbody>
</div>

</div></body></html>