<?
include_once("../includeme.php");
$table="admin_mast";
if(isset($_GET['username']) && isset($_GET['password'])){
	$username=$_GET['username'];
	$password=$_GET['password'];
	$query="select * from $table where username='$username' and password='$password'";
	//$query="select * from $table where username='$username' and password='$password'";
	$rs=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
	if(mysql_num_rows($rs)>0) {
		session_start();
		$_SESSION['query']=$query;
		$_SESSION['username']=$username;
		header("location:adminPanel.php");
	}
	else {
		header("location:adminPanel.php");
	}
}
else {
	header("location:adminPanel.php");
}
?>