<?
session_start();
session_unset();
setcookie(session_name(),'',time()-10000);
session_destroy();
header("location:./");
?>