<?
include_once("../includeme.php");
if(isset($_GET['pro']))
{
	$pname=$_GET['pro'];
	if(isset($_GET['p']))
	{
		$result=mysql_query("select * from projects where pname='$pname'");
	}
	else
	{
		$result=mysql_query("select * from projects where pname='$pname' and private='No'");
	}
	$row = mysql_fetch_row($result);
	$filename='./UserProjects/ZipFiles/'.$pname.".zip";
	if(file_exists($filename))
	{
		unlink($filename);
	}
	$downdir=".\\UserProjects\\".$row[2]."\\".$row[1];
	$files=scandir($downdir);
	$zip = new ZipArchive;
	$res = $zip->open($filename, ZipArchive::CREATE);
	if ($res === TRUE) {
		for($i=0;$i<count($files);$i++)
		{
			if($files[$i]!=".")
			{
				if($files[$i]!="..")
				{					
					if($files[$i]!="comments.csv")
					{
						$openfilenm=$downdir."\\".$files[$i];
						$fileopen=fopen($openfilenm,"r");
						$s="";
						while(($buffer=fgets($fileopen))!==false){
							$s.=$buffer;
						}
						$zip->addFromString($files[$i],$s);
					}
				}
			}
		}	
	}
	$zip->close();
	$headerloc="location:".$filename;
	header($headerloc);
}
else {
	header("location:../");
}
?>