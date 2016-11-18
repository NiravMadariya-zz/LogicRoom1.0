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
			<li><a href="editProject.php?edit=<?if(isset($_GET['edit'])){echo $_GET['edit'];}?>">Edit Project</a></li>
		</ol>
			<h2><?if(isset($_GET['edit'])){echo $_GET['edit'];}?></h2><br />		
			<form action="create.php?edit=<?echo $_GET['edit'];?>" method="post">
			<label>Add New File to This Project : </label>
			<input type=text name="addfile" placeholder="Add a New File" />&nbsp;&nbsp;&nbsp;
			<input type=submit  value="Add" /> <?if(isset($_SESSION['success'])){echo $_SESSION['success'];unset($_SESSION['success']);}?><br /><br />
			</form>
<?
$edit=$_GET['edit'];
$dir=$_SESSION['dir'].$edit;
$files=scandir($dir);
$tabavail=false;
foreach($files as $key=>$value) {
	if($value!=".")
	{
		if($value!="..")
		{
			if($value!="comments.csv")
			{
				$tabavail=true;
			}
		}
	}
}
if($tabavail==true){
if(!empty($files)) {
echo "<table border=2 bordercolor=orange><tr height=30><th align=center>";
echo "Available Files in This Projects : </th></tr><tr><td>";
echo " <table border=1 bordercolor=white>";
foreach($files as $key=>$value) {
	if($value!=".")
	{
		if($value!="..")
		{
			if($value!="comments.csv")
			{
				echo "<tr height=30><td width=300>".$value."&nbsp;&nbsp;&nbsp;";
				echo "</td><td width=55 align=center><a href=editFile.php?edit=$value&pro=$edit>Edit</a></td>";
				echo "</td><td width=55 align=center><a href=delFile.php?del=$value&pro=$edit>Delete</a></td></tr>";
			}
		}
	}
}
}
}
else
{
	echo "There is No File in This Project...";
}
?>
</table></table><br />
<?
echo "<h3><Strong>Comments</Strong></h3>";
$csvfile=$_SESSION['dir'].$_GET['edit']."\\comments.csv";
if(file_exists($csvfile)) {
	$fp = fopen($csvfile, 'r');
	$commentsarray=fgetcsv($fp,',');
	$comments="";
	$fcom="";
	foreach($commentsarray as $key=>$value)
	{
		$fcom.=$value.",";
	}
	$comments=$fcom;
	if(!empty($fp)){
		while (($data = fgets($fp, 10240)) !== false) {
			$comments.=$data.",";
		}
		$arcomments=explode(",",$comments);
		$i=0;
		?>
		<div class="row">
            <div class="col-md-6">
              <div class="templatemo-alerts">
                <div class="row">
                  <div class="col-md-12">
				  <table>
		<?
		while(!empty($arcomments[$i])) {
				?><tr><td width=410><div class="alert alert-success alert-dismissible" role="alert"><?
				echo $arcomments[$i];
				?></div></td><?
				?><td><div class="alert alert-warning alert-dismissible" role="alert"><!--<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>--><?
				if(strlen($arcomments[$i+1])>=10)
				{
					$subtime=substr($arcomments[$i+1],0,10);
				}
				else
				{
					$subtime=$arcomments[$i+1];
				}
		$time=localtime($subtime,true);
		$time['tm_hour']=$time['tm_hour']+3;
		if($time['tm_min']<=29)
			$time['tm_min']=$time['tm_min']+30;
		else
		{
			$time['tm_min']=$time['tm_min']-30;
			$time['tm_hour']=$time['tm_hour']+1;
		}
		$pm=false;
		if($time['tm_hour']<=9)
		{
			echo "0";
		}
		if($time['tm_hour']>12)
		{
			$pm=true;
			echo ($time['tm_hour']-12);
		}
		else
		{
			echo $time['tm_hour'];
		}
		$cmhour=$time['tm_hour'];
		$cmmin=$time['tm_min'];
		if($cmmin<=9)
		{
			$cmmin="0".$time['tm_min'];
		}
		echo ":".$cmmin." ";
		if($pm==true)
			echo "PM ";
		else
			echo "AM ";
		echo $time['tm_mday']." ".gmdate("M",time()).". ".($time['tm_year']+1900);
		?></div></td></tr><?
			$i=$i+2;
	}
?></table><?
		fclose($fp);
?></div>  
                </div>            
              </div>              
            </div><? }}?>
			<?
	if(isset($_POST['comments']))
	{
		$content=$_POST['comments'];
		$cap=substr(microtime(),11,21);
		$csvfile=$_SESSION['dir'].$_GET['edit']."\\comments.csv";
		$conte =  array (
    array($content,$cap));
		$fp = fopen($csvfile, 'a');
		foreach ($conte as $fields) {
		    fputcsv($fp, $fields);
		}
		if($fp!=null)
		{
			fclose($fp);
		}
	}
?>
<form action="" method=POST>
<table border=0>
<tr><td>Make Comments on This Project:</td></tr>
<tr><td><input type=text name="comments"  style="margin: 0px; height:35px; width: 400px;" /></td></tr>
<tr height=35><td align=right><input type=submit value="Comment" /></td></tr>
</table></form>
</div></div><?include("closingFile.php");?><?include("jslinkFiles.php");?></body></html>