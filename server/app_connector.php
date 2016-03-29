<?php
require "dbcontroller.php";
$database = new medoo(array('database_type' => 'mysql',	'database_name' => 'village',	'server' => 'localhost',	'username' => 'village',	'password' => 'village',	'charset' => 'utf8','port' => 3306,	'prefix' => '','option' => array(PDO::ATTR_CASE => PDO::CASE_NATURAL)));
?>