<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
else
{
	$userlogic=$_SESSION['username'];
	$rs=mysql_query("select * from client_mast where username='$userlogic'");
	$row = mysql_fetch_row($rs);
	$result=mysql_query("select pname from projects where owner='$row[3]'");
}
$_SESSION['page']="Projects";
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
			<ol class="breadcrumb">
		        <li><a href="projects.php">Manage Projects</a></li>
			</ol>
			<blockquote>Projects Settings</blockquote>

			<table border=2 align="center" bordercolor=green width=300>
			<tr height=30><td align=center><font size="3">Available Projects</font></td></tr><tr height=20></tr>
			<?
				for($i=0;$i<mysql_num_rows($result);$i++) {
					$row=mysql_fetch_assoc($result) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
					foreach($row as $key=>$value)  {
			?>
				<tr height=30><td align="center"><?echo "<a href=editprojectss.php?v=".$value.">$value</a>";?>
				</td></tr>
				<?}}?>
			</table>
	
	</div>
	</div>
	<?
	include("closingFile.php");
	?>
	<?
	include("jslinkFiles.php");
	?>
	</body>
</html>