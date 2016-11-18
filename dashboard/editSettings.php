<?
include_once("../includeme.php");
if(isset($_SESSION['username']))
{
	$username=$_SESSION['username'];
	$table="client_mast";
	$result=mysql_query("select * from $table where username='$username'");
	$row = mysql_fetch_row($result);
	if(isset($_POST['edname'])) 
	{
		$edname=$_POST['edname'];
		$query="update $table set name='$edname',username='$row[1]',password='$row[2]',email='$row[3]',semail='$row[4]',remail='$row[5]' where username='$username'";
	}
	else if(isset($_POST['username']))
	{
		$eduser=$_POST['username'];
		$query="update $table set name='$row[0]',username='$eduser',password='$row[2]',email='$row[3]',semail='$row[4]',remail='$row[5]' where username='$username'";
		$_SESSION['username']=$eduser;
		$_SESSION['name']=$eduser;
	}
	else if(isset($_POST['pass']))
	{
		$edpass=$_POST['pass'];
		$query="update $table set name='$row[0]',username='$row[1]',password='$edpass',email='$row[3]',semail='$row[4]',remail='$row[5]' where username='$username'";
	}
	else if(isset($_POST['upsemails']))
	{
		$upsemail=$_POST['upsemails'];
		$query="update $table set name='$row[0]',username='$row[1]',password='$row[2]',email='$row[3]',semail='$upsemail',remail='$row[5]' where username='$username'";
	}
	else if(isset($_POST['remail']))
	{
		$remail=$_POST['remail'];
		$query="update $table set name='$row[0]',username='$row[1]',password='$row[2]',email='$row[3]',semail='$row[4]',remail='$remail' where username='$username'";
	}
	$result=mysql_query($query);
	if($result==true)
	{
		$_SESSION['success']="Settings Updated...";
	}
	else
	{
		$_SESSION['success']="Settings are not Updated...";
	}
	header("location:settings.php");
}

?>