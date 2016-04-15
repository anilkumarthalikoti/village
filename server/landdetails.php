<?php 
session_start();
require "app_connector.php";
$conn=$database;
if(!empty($_POST)){
$params=array();
 
foreach ($_POST as $key => $value){
 
   
       $params[$key]=$value;
    
}
 
$conn->insert("landdetails",$params);

}else{
$totalland=0;
$user=$_SESSION["logged_in"];
$id=$user["id"];
$farmertype="SMALL";
$query="select d.id landid, d.landsono landno, concat(s.state_name,'/',s.state_name_k) state_name,d.totalland, (select 'Y' from actionmapping am where am.hobliid=v.hobliid and am.regid=".$id.") checkbox from landdetails d, states s, farmerdetails f, village v where f.id= d.regid and v.villageid= d.villageid and d.villageid= s.id and f.id=".$_GET["regid"];
$result=$conn->query($query);
$result_print="";
foreach($result as $row){
$totalland=$totalland+$row["totalland"];
if($row["checkbox"]=="Y"){
$result_print.="<tr><td>".$row["landno"]."</td><td>".$row["state_name"]."</td><td>".$row["totalland"]."</td><td><input type='checkbox' name='landsurvayno[]' landvalue='".$row["totalland"]."' onclick='schemefilling.enableArea();' value='".$row["landid"]."'/></td></tr>";
}else{
$result_print.="<tr><td>".$row["landno"]."</td><td>".$row["state_name"]."</td><td>".$row["totalland"]."</td><td></td></tr>";
}
}
if($totalland>=5){
$farmertype="BIG FARMER";
}
$result_print.=" <tr class='gray' style='background:#CCCCCC'  ><td> </td><td>Total Land</td><td>".$totalland."</td><td></td></tr>";
$result_print.="<tr class='gray' style='background:#CCCCCC'><td> </td><td>Farmer type</td><td>".$farmertype."</td><td></td></tr> ";
echo  $result_print;
}
?>