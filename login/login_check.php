<?
include_once("../includeme.php");
if(isset($_GET['username']) && isset($_GET['password'])){
	$username=$_GET['username'];
	$password=$_GET['password'];
	//$query="select * from $table where username='$username' and password='".MD5($password)."'";
	$query="select * from client_mast where username='$username' and password='$password'";
	$rs=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
	if(mysql_num_rows($rs)>0) {
		session_start();
		$result=mysql_query("select * from client_mast where username='$username'");
		$row = mysql_fetch_row($result);
		$_SESSION['name']=$row[0];
		$_SESSION['username']=$username;
		$mkuserdir=getcwd()."/../dashboard/UserProjects/".$row[3];
		echo $mkuserdir;
		$_SESSION['dir']=$mkuserdir;
		$_SESSION['prodir']="/../dashboard/UserProjects/".$row[3];
		mkdir($mkuserdir);
		header("location:./page2.php");
	}
	else {
		header("location:./");
	}
}
else {
	header("location:./");
}
?>