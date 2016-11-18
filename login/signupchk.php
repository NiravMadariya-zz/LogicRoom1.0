<?
include_once("../includeme.php");
if($_GET['captcha_code'] == $_SESSION['captcha_code'])
{
	unset($_SESSION['captcha_code']);
	$table="client_mast";
	if(isset($_GET['username'])) 
	{
		$email=$_GET['email'];
		$name=$_GET['name'];
		$username=$_GET['username'];
		$password=$_GET['password'];
		$remail=$_GET['remail'];
		$query="insert into $table (name,username,password,email,remail) values ('$name','$username','$password','$email','$remail')";
			$rs=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
		if(mysql_num_rows($rs)>0) {
					$_SESSION['username']=$username;
		}
		header("location:../dashboard.php");
	}
	else
	{
		header("location:./signup.php");
	}
}
else
{
	header("location:./signup.php");
}
?>