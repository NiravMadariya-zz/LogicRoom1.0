<?
session_start();
$host="ap-cdbr-azure-east-c.cloudapp.net";
$user="bb86e439a9ccf2";
$pass="5e27edb8";
$db="logicroomdb";
$con=mysql_connect($host,$user,$pass) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
mysql_select_db($db) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
?>