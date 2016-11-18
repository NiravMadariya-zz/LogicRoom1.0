<?
session_start();
$delFile=$_GET['del'];
echo $delFile;
if(file_Exists(getcwd()."\\UserProjects\\".$_SESSION['username']."\\$delFile")) 
{
	unlink($_SESSION['dir'].$delFile);
	header("location:./");
}
?>