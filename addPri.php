<?
include_once("../includeme.php");
if(isset($_POST['addman']))
{
	$addman=$_POST['addman'];
	$user=$_SESSION['username'];
	$preresult=mysql_query("select email from client_mast") or die("mysql_error=".mysql_error()."error No.".mysql_errno());;
	$avail=false;
	while($prerow=mysql_fetch_array($preresult, MYSQL_NUM)){
		if($prerow[0]==$addman) {
			$avail=true;
			break;
		}
	}
	$i=0;
	if($avail==true) {
		if(!empty($_POST['addman'])) {
			$adduser=$_POST['addman'];
			$dir=getcwd()."\\UserProjects\\".$adduser;
			$csvdir=$dir."\\projects.csv";
			$scan=scandir($dir);
			$conte =  array (
						    array($_SESSION['username'],$_GET['pro'],"Manager"));
			$fp = fopen($csvdir, 'a');
			foreach ($conte as $fields) {
			    fputcsv($fp, $fields);
			}
			if($fp!=null)
			{
				fclose($fp);
			}
			$pname=$_GET['pro'];
			$prers=mysql_query("select * from projects where pname='$pname'");
			$rowrs=mysql_fetch_row($prers);
			$row3=$rowrs[3];
			if($row3=="")
			{
				if(isset($_POST['addman']))
				{
					$s=$_POST['addman'];
				}
			}
			else
			{
				$s=explode(",",$row3);
				$index=count($s);
				if(isset($_POST['addman'])){
					$s[$index]=$_POST['addman'];
				}
			}
			if(count($s)==1)
			{
				$Up=$s;
			}
			else
			{
				$Up=implode(",",$s);
			}

			$query="update projects set private='$rowrs[0]',pname='$rowrs[1]',owner='$rowrs[2]',Manager='$Up',Admin='$rowrs[4]' where pname='$pname'";
			echo $query;
			$rsupdate=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
			print_r($rsupdate);
		}
		header("location:./add.php?va=man&pro=$pname");
	}
	else
	{
		echo "Enter an Email Address of Friend Who Uses Our Web Service...";
	}
}
if(isset($_POST['addadmin']))
{
	$addadmin=$_POST['addadmin'];
	$user=$_SESSION['username'];
	$preresult=mysql_query("select email from client_mast") or die("mysql_error=".mysql_error()."error No.".mysql_errno());;
	$avail=false;
	while($prerow=mysql_fetch_array($preresult, MYSQL_NUM)){
		if($prerow[0]==$addadmin) {
			$avail=true;
			break;
		}
	}
	$i=0;
	if($avail==true) {
		if(!empty($_POST['addadmin'])) {
			$adduser=$_POST['addadmin'];
			$dir=getcwd()."\\UserProjects\\".$adduser;
			$csvdir=$dir."\\projects.csv";
			$scan=scandir($dir);
			$conte =  array (
						    array($_SESSION['username'],$_GET['pro'],"Admin"));
			$fp = fopen($csvdir, 'a');
			foreach ($conte as $fields) {
			    fputcsv($fp, $fields);
			}
			if($fp!=null)
			{
				fclose($fp);
			}
			$pname=$_GET['pro'];
			$prers=mysql_query("select * from projects where pname='$pname'");
			$rowrs=mysql_fetch_row($prers);
			$row4=$rowrs[4];
			if($row4=="")
			{
				if(isset($_POST['addadmin']))
				{
					$s=$_POST['addadmin'];
				}
			}
			else
			{
				$s=explode(",",$row4);
				$index=count($s);
				if(isset($_POST['addadmin']))
				{
					$s[$index]=$_POST['addadmin'];
				}
			}
			if(count($s)==1)
			{
				$Up=$s;
			}
			else
			{
				$Up=implode(",",$s);
			}
			$query="update projects set private='$rowrs[0]',pname='$rowrs[1]',owner='$rowrs[2]',Manager='$rowrs[3]',Admin='$Up' where pname='$pname'";
			$rsupdate=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
		}
		header("location:./add.php?va=adm&pro=$pname");
	}
	else
	{
		echo "Enter an Email Address of Friend Who Uses Our Web Service...";
	}	
}/*	$host="ap-cdbr-azure-east-c.cloudapp.net";
	$user="b83fe7dede650c";
	$pass="4ea46f74";
	$db="logicRoomDB1";
	$con=mysql_connect($host,$user,$pass) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
	mysql_select_db($db) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
*/
?>