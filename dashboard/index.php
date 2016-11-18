<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
$_SESSION['page']="Dashboard";
?>
<!DOCTYPE html>
<head><title>Dashboard | LogicRoom.in</title>
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
	        <li><a href="./">Dashboard</a></li>
		</ol>
		<blockquote><font size="4">Dashboard</font></blockquote>
		<form action="create.php" method="POST">
<h4>Create a new Project Here. </h4>

Name of Project : <input type=text name="newProj" placeholder="Type Project Name Here..."/>&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value="Create"/>
<?if(isset($_SESSION['success'])){if($_SESSION['success']=="yes"){echo "Created Successfully...";}else{echo "File Already Exists...";}}
	unset($_SESSION['success']);	?>
<br /><br />

</form>
<h3 align="center">Available Projects : </h3><br />
<?	if(isset($_SESSION['username'])) {
		$proNo=0;
		$i=0;
		$filedel[]="";
		$preresult=mysql_query("select * from client_mast where username='".$_SESSION['username']."'");
		$row = mysql_fetch_row($preresult);
		if(file_Exists(getcwd()."\\UserProjects\\".$row[3])) {
		$target_dir =getcwd()."\\UserProjects\\".$row[3]."\\";
//		$_SESSION['dir']=$target_dir;
		$files1 = scandir($target_dir);
		
		if(count($files1)>=3) {
				$proNo = 1;
?>

<table border="3" align="center" bordercolor="purple">
	<tr height="40"><td colspan="4" align="center"><font size="4">Your Own Projects : </font><td></tr>
		<?
		
			if($files1!=null) {
				foreach($files1 as $key=>$value) {
					if($value!=".")
					{
						if($value!="..")
						{
							if($value!="projects.csv")
							{
									$filedel[$i]=$value;
			
									echo "<tr height=35><td width=50 align=center>";
									echo $proNo."</td><td width=200 align=center>".$value."<br />";
									echo "</td><td width=70 align=center><a href=editProject.php?edit=$value>Edit</a>";
									echo "</td><td width=150 align=center><a href=download.php?pro=$value&p=f>Download as ZIP</a><td>";
			//						echo "<td width=40><a href=delProject.php?del=".$value.">Delete</a></td></tr>";//".unlink($target_dir.$value)."
									$proNo=$proNo+1;
									$i=$i+1;
								}
							}
						}
					}
				}		
			$proNo=$proNo-1;
			}
			else
			{
				$prono=0;
				echo "<h4 align=center>No Projects Here.</h4>";
			}
		}
	}
	if($proNo>0) {
		echo "<tr height=10></tr><tr height=40><td colspan=4 align=center>".$proNo;
		if($proNo==1)
		{
				echo " Project";
		}else{
				echo " Projects";
		}
	}
	echo "<td></tr>";
	include("includeproj.php");echo "</table>";
	?>
</table>
</div></div><?include("closingFile.php");include("jslinkFiles.php");?>
</body>
</html>