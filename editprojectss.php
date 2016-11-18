<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
else
{
	$user=$_SESSION['username'];
	if(isset($_GET['v'])){$v=$_GET['v'];
	$prodetres=mysql_query("select * from projects where pname='$v'");
	$prodetails = mysql_fetch_row($prodetres);
}
$_SESSION['page']="Manage Projects";
?>
	<!DOCTYPE html>
	<head><title>Manage Projects | LogicRoom.in</title>
	<?
	include("csslinkFiles.php");
	?>
	</head>
	<?
	include("includeFile.php");
	?>
	<div class="content-wrapper">
	        <div class="content">
			<?$v=$_GET['v'];?>
			<ol class="breadcrumb">
		        <li><a href="projects.php">Projects Settings</a></li>
				<li><a href="editprojectss.php?v=<?echo $v;?>"><?echo $v;?></a></li>
			</ol>
			<blockquote>Project Settings</blockquote>
<?			$pname=$owner=$Manager=$admin=$p="";
			if($prodetails[0]=="No")$p="Yes";
			else $p="No";
			if($prodetails[0]=="No")$private="Private";
			else $private="Public";
			$pname=$prodetails[1];
			$owner=$prodetails[2];
			$Manager=$prodetails[3];
			$managers=explode(",",$Manager);
			$coun1=count($managers);
			$admin=$prodetails[4];
			$admini=explode(",",$admin);
			$coun=count($admini);
			?>

			<table border=5 bordercolor=green>
				<tr height=40><td align=center width=175><font size="4">Private Project : </th><td align=center width=250><?echo $prodetails[0];?></td><td align=center width=180><?
				if(isset($_GET['p'])) {
						$upp=$_GET['p'];
						$upQue=mysql_query("update projects set private='$p',pname='$pname',owner='$owner',Manager='$Manager',Admin='$admin' where pname='$pname' and owner='$owner'");
				}
				else
				{
					echo "<a href=editprojectss.php?v=$v&p=$p>Make This Project $private</a>";
				}?></td></tr><tr height=40></tr>
				<tr height=40><td align=center><font size="4">Project Name : </td><td align=center colspan=2><?echo $pname;?>
				</tr><tr height=40></tr>
				<tr height=40><td rowspan="<?echo $coun;?>" align=center><font size="4">Admin : 
				<?
				$in=0;
				while(!empty($admini[$in])) {
					echo "<td align=center colspan=2>".$admini[$in]."</td></tr><tr height=40>";
					$in=$in+1;
				}
				?><td colspan=3 align=center><font size="3"><a href="add.php?va=adm&pro=<?echo $_GET['v'];?>">Add an Administrator</a></td><tr height=40>
				</tr>

				<tr height=40><td rowspan="<?echo $coun1;?>" align=center><font size="4">Managers : 
				<?
				$in=0;
				while(!empty($managers[$in])) {
					echo "<td align=center colspan=2>".$managers[$in]."</td></tr><tr height=40>";
					$in=$in+1;
				}
				?><td colspan=3 align=center><font size="3"><a href="add.php?va=man&pro=<?echo $_GET['v'];?>">Add a Manager</a></td><tr height=40>
				</tr>
<?}?>
			</table>
	</div>
	</div>
	<?
	include("closingFile.php");
	include("jslinkFiles.php");
	?>
	</body>
</html>
<?