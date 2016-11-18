<?
include_once("../includeme.php");
if(isset($_POST['newProj'])) {
	$projname=$_POST['newProj'];
	$target =$_SESSION['dir']."$projname";
	if(!file_Exists($target)) {
		echo $target;
		mkdir($target);
		$_SESSION['success']="yes";
		$preresult=mysql_query("select * from client_mast where username='".$_SESSION['username']."'");
		$row = mysql_fetch_row($preresult);
		echo "<br />";
		print_r($row);
		echo "<br />$row[3]<br />";
		echo "<br />"."insert into projects (private,pname,owner) values ('No','".$projname."','".$row[3]."')"."<br />";
		$result=mysql_query("insert into projects (private,pname,owner) values ('No','".$projname."','".$row[3]."')") or die("mysql_error=".mysql_error()."error No.".mysql_errno());

	}
	else {
			$_SESSION['success']="No";
	}
	header("location:./");
}
if(isset($_POST['addfile']))
{
	$filename=$_POST['addfile'];
	$target=getcwd();
	$dire=$_SESSION['dir'];
	echo $target."<br />".$filename;
	$file=$dire.$_GET['edit']."\\".$filename;
	if(!file_exists($file)) {
		$fp = fopen($file, 'w');
		fclose($fp);
	}
	else{
		echo "File Already Exists...";
	}
	$edit=$_GET['edit'];
	$_SESSION['success']="File Created Successfully...";
	header("location:editProject.php?edit=$edit");
}
?>