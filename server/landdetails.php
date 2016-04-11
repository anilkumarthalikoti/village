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
$query="select d.landsono landno, concat(s.state_name,'/',s.state_name_k) state_name,d.totalland from landdetails d, states s, farmerdetails f where f.id= d.regid and d.villageid= s.id and f.id=".$_GET["regid"];
$result=$conn->query($query);
$result_print="";
foreach($result as $row){
$result_print.="<tr><td>".$row["landno"]."</td><td>".$row["state_name"]."</td><td>".$row["totalland"]."</td></tr>";

}
echo  $result_print;
}
?>