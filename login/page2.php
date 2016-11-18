<?
session_start();
$name=$_SESSION['username'];
$rest = substr($name,0,1);
$img=imagecreate(200,200);
$randomColor=rand(0,180);
$randomColor1=rand(0,180);
$randomColor2=rand(0,180);
$black=imagecolorallocate($img,$randomColor2,$randomColor1,$randomColor);
imagerectangle($img,0,0,199,199,$black);
$font_file='./BRADHITC.ttf';
$colorrand=imagecolorallocate($img,0,0,0);
$rest = strtoupper($rest);
imagefttext($img,150, 0, 10, 130, $colorrand, $font_file, $rest);
$mkuserdir=getcwd()."/../dashboard/ProPics/"."/";
$imgname=$mkuserdir.$name;
if(!file_exists($imgname.".png")) {
imagepng($img,$imgname.image_type_to_extension(IMAGETYPE_PNG)); }
header("location:../");
?>