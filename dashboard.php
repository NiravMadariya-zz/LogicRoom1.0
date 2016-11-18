<html>
<head><title>Dashboard - LogicRoom</title></head>
<body>
<?
session_start();
if(isset($_SESSION['username'])) {
echo $_SESSION['username'];
header("location:./dashboard/");
}else{
	header("location:./login/");
}?>
</body>
</html>