<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
	$user=$_SESSION['username'];
	$proname=$_GET['pro'];
	$result=mysql_query("select * from projects where pname='$proname'");
	$edproset = mysql_fetch_row($result);
	$s="";if($_GET['va']=="man"){$s="Manager";}else{$s="Admin";}
	$_SESSION['page']="Add $s";?>
<!DOCTYPE html>
<head><title>Add <?echo $s;?> | LogicRoom.in</title>
<?
include("csslinkFiles.php");
?>
</head>
<?
include("includeFile.php");
?>

<div class="content-wrapper">
        <div class="content">
		<ol class="breadcrumb">
		    <li><a href="projects.php">Projects Settings</a></li>
			<li><a href="editprojectss.php?v=<?echo $_GET['pro'];?>"><?echo $_GET['pro'];?></a></li>
	        <li><a href="">Add <?echo $s;?></a></li>
		</ol>
		<blockquote>Add <?echo $s;?></blockquote>

<?			$v="";
			if(isset($_GET['v'])){$v=$_GET['v'];}
			$pname=$owner=$Manager=$admin=$p="";
			if($edproset[0]=="No")$p="Yes";
			else $p="No";
			if($edproset[0]=="No")$private="Private";
			else $private="Public";
			$pname=$edproset[1];
			$owner=$edproset[2];
			$Manager=$edproset[3];
			$managers=explode(",",$Manager);
			$coun1=count($managers);
			$admin=$edproset[4];
			$admini=explode(",",$admin);
			$coun=count($admini);
			?>
			<form action="addPri.php?pro=<?echo $_GET['pro'];?>" method="POST">
			<table border=5 bordercolor=green>
				<tr height=40><td align=center width=175><font size="4">Project Name : </td><td align=center colspan=2><?echo $pname;?></td></tr><tr height=40></tr>
				<?if($s=="Admin") {?>
				<tr height=40><td rowspan="<?if(isset($_GET['add'])){echo $coun+1;}else{echo $coun;}?>" align=center><font size="4">Admin : 
				<?
				$in=0;
				while(!empty($admini[$in])) {
					echo "<td align=center width=300>".$admini[$in]."</td>";?><td align=center width=150><a href="">Remove Admin</a></td></tr><tr height=40><?
					$in=$in+1;
					}?>
					<?if(isset($_GET['add'])){echo "<td align=center><input type=text name='addadmin' /></td><td align=center><input type=submit value='Add' /></td>";}else {?><td colspan=3 align=center><font size="3"><a href="add.php?va=adm&pro=<?echo $_GET['pro'];?>&add=y">Add an Administrator</a></td>
				<?}?><tr height=40>
				</tr>
				<?} else {?>
				<tr height=40><td rowspan="<?if(isset($_GET['add'])){echo $coun1+1;}else{echo $coun1;}?>" align=center><font size="4">Managers : 
				<?
				$in=0;
 				while(!empty($managers[$in])) {
					echo "<td align=center width=300>".$managers[$in]."</td>";?><td align=center width=150><a href="">Remove Manager</a></td></tr><tr height=40><?
					$in=$in+1;
				}
				?><?if(isset($_GET['add'])){echo "<td align=center><input type=text name='addman' /></td><td align=center><input type=submit value='Add' /></td>";}else {?><td colspan=3 align=center><font size="3"><a href="add.php?va=man&pro=<?echo $_GET['pro'];?>&add=y">Add a Manager</a></td><?}?><tr height=40>
				</tr>
				<?}?>
			</table>
		</form>
</div>
</div>
<?
include("closingFile.php");
include("jslinkFiles.php");
?>
</body>
</html>