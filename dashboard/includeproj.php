<?
$csvfile="";
if(isset($_SESSION['dir']))
{
	$csvfile=$_SESSION['dir']."projects.csv";
}
if(file_exists($csvfile)) {
	$fp = fopen($csvfile, 'r');
	$proarray=fgetcsv($fp,',');
	$pros="";
	$fpro="";
	foreach($proarray as $key=>$value) {
		$fpro.=$value.",";
	}
	$pros=$fpro;
	if(!empty($fp)) {
		while (($data = fgets($fp, 10240)) !== false) {
			$pros.=$data.",";
		}
		$arpros=explode(",",$pros);
		$_SESSION['arpros']=$arpros;
		$i=1;
		$totprojs=1;
		$p=0;
		echo "<tr height=20></tr><tr height=35><td colspan='4' align=center><font size='4'>Other Projects</font><td></tr>";
		while(!empty($arpros[$i])) {
			echo "<tr height=35><td align=center width=50>$totprojs</td><td width=200 align=center>".$arpros[$i]."</td><td width=70 align=center><a href=oproeditpro.php?edit=$arpros[$i]&p=$p>Edit</a>";
			echo "</td><td width=170 align=center><a href=download.php?pro=".$arpros[$i]."&p=f>Download as ZIP</a><td></tr>";
			$totprojs=$totprojs+1;
			$i=$i+3;
			$p=$p+1;
		}
		echo "<tr height=10></tr>";
		echo "<tr height=35> <td colspan=4 align=center>".$totprojs;
		if($totprojs==1)
		{
				echo " Project";
		}else{
				echo " Projects";
		}
		echo "<td></tr>";
		echo "<tr height=35></tr>";
	}
}
?>