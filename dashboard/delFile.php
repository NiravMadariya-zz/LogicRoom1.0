<?
include_once("../includeme.php");
$delFile=$_GET['del'];
$pro=$_GET['pro'];
		$preresult=mysql_query("select * from client_mast where username='".$_SESSION['username']."'");
		$row = mysql_fetch_row($preresult);
$unlinkFile=getcwd()."\\UserProjects\\".$row[3]."\\".$pro."\\".$delFile;
if(file_Exists($unlinkFile)) 
{
	unlink($unlinkFile);
	header("location:./editProject.php?edit=$pro");
}

?>