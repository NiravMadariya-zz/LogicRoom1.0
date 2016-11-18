<?
include_once("../includeme.php");
if(!isset($_SESSION['username'])){header("location:../login/");}$_SESSION['page']="Edit Project";?>
<!DOCTYPE html><head><title>Edit Project | LogicRoom.in</title>
<?include("csslinkFiles.php");?></head><?include("includeFile.php");?><div class="content-wrapper"><div class="content">
<?
if(isset($_GET['edit']))
{
	if(isset($_SESSION['arpros']))
	{
		?>
		<ol class="breadcrumb">
	        <li><a href="./">Dashboard</a></li>
			<li><a href="<?echo "oproeditpro.php?edit=".$_GET['edit']."&p=".$_GET['p']; ?>">Edit Project</a></li>
		</ol>
		<blockquote><font size="4">Edit Project</font></blockquote>
		<?
		$edit=$_GET['edit'];
		$arpros=$_SESSION['arpros'];
		$uns=count($arpros);
		$dire="";
		$_SESSION['direc']=getcwd()."\\UserProjects\\";
		unset($arpros[$uns-1]);
		if(isset($_GET['p'])){$p=$_GET['p'];}else if(isset($_POST['p'])){$p=$_POST['p'];}
		$_SESSION['p']=$p;
		$_SESSION['opro']=$edit;
		echo "<table border=3 align=left bordercolor=green><tr>";
		$j=$p*3;
		echo "<td align=center><font size='4'>Owner</td><td align=center><font size='4'>Project Name</td><td align=center><font size='4'>Your Post</td></font></tr><tr height=1></tr><tr>";
		for($i=$j;$i<($j+3);$i++)
		{
				echo "<td width=200 align=center>".$arpros[$i]."</td>";
		}
		echo "</tr></table><br /><br /><br /><br /><br />";
	}
}

if(isset($_GET['edit']))
{
	$pro=$_GET['edit'];
	if(isset($_SESSION['arpros']))
	{
		$arpros=$_SESSION['arpros'];
		for($i=0;$i<count($arpros);$i++)
		{
			if($p*3==$i-1)
			{
				if($arpros[$i]==$pro)
				{
					$getemail=$arpros[$p*3];
					$preresult=mysql_query("select * from client_mast where username='$getemail'");
					$oproget = mysql_fetch_row($preresult);
					$direc=$_SESSION['direc'].($oproget[3])."\\".$arpros[$i];
					$_SESSION['oprodir']=$direc;
					$files=scandir($direc);
					if(!empty($files)) {
						echo "<table border=2 bordercolor=orange><tr height=30><td align=center><font size='4'>";
						echo "Available Files in This Projects : </font></td></tr><tr><td>";
						echo " <table border=1 bordercolor=white>";
						foreach($files as $key=>$value) {
							if($value!=".")
								{
								if($value!="..")
								{
								if($value!="comments.csv")
									{
										echo "<tr height=30><td width=300>".$value."&nbsp;&nbsp;&nbsp;";
										echo "</td><td width=55 align=center><a href=oproeditpro.php?editf=$value>Edit</a></td>";
										echo "</td><td width=55 align=center><a href=odelFile.php?del=$value>Delete</a></td></tr>";
									}
								}
							}
						}
						echo "</table>";
					}
					else
					{
						echo "There is No File in This Project...";
					}
				}
				echo "</table>";
			}
		}
			$direc=$_SESSION['oprodir'];
			$csvfile=$direc."\\comments.csv";
			if(file_exists($csvfile))
			{
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
				}
				$arcomments=explode(",",$comments);
				$i=0;
				?>
				<div class="row">
					<div class="col-md-6">
						<div class="templatemo-alerts">
						  <div class="col-md-12">
							<table>
							<?
							while(!empty($arcomments[$i])) {
								?><tr><td width=410><div class="alert alert-success alert-dismissible" role="alert"><?
								echo $arcomments[$i];
								?></div></td><?
								?><td><div class="alert alert-warning alert-dismissible" role="alert"><?
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
							?>
							</table>
							<?
							fclose($fp);
						?>
						</div>  
					</div>            
				  </div>              
				</div>
				<? 
				}
			}
				if(isset($_POST['comments']))
				{
					$content=$_POST['comments'];
					$cap=substr(microtime(),11,21);
					$arpros=$_SESSION['arpros'];
					$direc=$_SESSION['direc'].($arpros[$p*3])."\\".$arpros[$p*3+1]."\\";
					$csvfile=$direc."comments.csv";
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
						<tr><td width=420>Make Comments on This Project:</td></tr>
						<tr><td><input type=text name="comments"  style="margin: 0px; height:35px; width: 400px;" /></td><td width=100 align=left><input type=submit value="Comment" /></td></tr><tr height=10></tr>
					</table>
				</form><?
}
	if(isset($_GET['editf']))
	{
		$editf=$_GET['editf'];
	?>
	<ol class="breadcrumb">
	        <li><a href="./">Dashboard</a></li>
			<li><a href="<? echo "oproeditpro.php?edit=".$_SESSION['opro']."&p=".$_SESSION['p'];?>">Edit Project</a></li>
			<li><a href="oproeditpro.php?editf=<?echo $_GET['editf'];?>">Edit File</a></li>
	</ol>

		<?
	if(isset($_SESSION['oprodir']))
	{
		?><blockquote><font size="4">Edit File</font></blockquote><?
		$dire=$_SESSION['oprodir'];
		$fileed=$dire."\\".$editf;
		$fileopen=fopen($fileed,"r");
		echo "<h4>Edit File : ".$editf."</h4><br />";
			?>
			<form action="<?echo "oproeditpro.php?editf=".$_GET['editf'];?>" method='post'>
			<?
				if(isset($_POST['editedfile']))
				{
					if(!empty($fileopen))
					{
						fclose($fileopen);
					}
					$fileopen=fopen($fileed,"w");
					file_put_contents($fileed,$_POST['editedfile']);
					fclose($fileopen);
					?><textarea style="margin: 0px; height: 400px; width: 925px;"><?echo $_POST['editedfile']?></textarea><br />
			<?}
				else
				{
					?><textarea name="editedfile" style="margin: 0px; height: 400px; width: 925px;"><?while(($buffer=fgets($fileopen))!==false){echo $buffer;}?></textarea><br />
			<?}
					?>
			<input type="submit" value="Save" /><!--onsubmit-->
			<br /><br /></form>
			<?
			if(!empty($fileopen))
			{
				fclose($fileopen);
			}
	}
}
?>
</div>
</div>
<?
include("closingFile.php");
include("jslinkFiles.php");
?>
</body>
</html>