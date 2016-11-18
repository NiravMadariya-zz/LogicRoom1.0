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
<? include("csslinkFiles.php"); ?>
</head>
<? include("includeFile.php"); ?>
<div class="content-wrapper">
        <div class="content">
		<ol class="breadcrumb">
	        <li><a href="./">Dashboard</a></li>
			<li><a href="editProject.php?edit=<?if(isset($_GET['pro'])){echo $_GET['pro'];}?>">Edit Project</a></li>
			<li><a href="<?echo "editFile.php?edit=".$_GET['edit']."&pro=".$_GET['pro'];?>">Edit File</a></li>
		</ol>
			<h2><?if(isset($_GET['pro'])){echo $_GET['pro']." ";}?><b class='caret'></b><?if(isset($_GET['edit'])){echo " ".$_GET['edit'];}?></h2><br />


	<?
		$file=$_SESSION['dir'].$_GET['pro']."\\".$_GET['edit'];
//		echo $file;
		$fileopen=fopen($file,"r");
		echo "<h4>Edit File : ".$_GET['edit']."</h4><br />";
	?>
<form action="<?echo "editFile.php?edit=".$_GET['edit']."&pro=".$_GET['pro'];?>" method='post'>
	<?
		if(isset($_POST['editedfile']))
		{
			if(!empty($fileopen))
			{
				fclose($fileopen); 
			}
			$fileopen=fopen($file,"w");
			file_put_contents($file,$_POST['editedfile']);
			fclose($fileopen);
			?><textarea style="margin: 0px; height: 400px; width: 925px;"><?echo $_POST['editedfile']?></textarea><br />
		<?}
		else
		{
			?><textarea name="editedfile" style="margin: 0px; height: 400px; width: 925px;"><?while(($buffer=fgets($fileopen))!==false){echo $buffer;}?></textarea><br />
		<?}
?>
	<input type="submit" value="Save" /><!--onsubmit-->
	
	<br /><br />
</form>
</div>
</div>
<? include("closingFile.php");
include("jslinkFiles.php"); ?>
</body>
</html>