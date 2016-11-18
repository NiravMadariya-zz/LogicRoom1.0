<?
include_once("includeme.php");
$userlogic=$_SESSION['username'];
$filename=$userlogic.".jpg";
//header ('content-type: image/jpeg');
list($width,$height)=getimagesize($filename);
$percent=0.3;
$newheight=$height*$percent;
$newwidth=$width*$percent;
$thumb=imagecreatetruecolor($newwidth,$newheight);
$source=imagecreatefromjpeg($filename);
imagecopyresized($thumb,$source,0,0,0,0,$newwidth,$newheight,$width,$height);
imagejpeg($thumb);
?>