<?
include_once("./includeme.php");
$searchres="";
if(isset($_POST['searchbox']))
{
	$searchPhrase=$_POST['searchbox'];
	$searchresult=mysql_query("select * from projects where pname='$searchPhrase' and private='No'");
	$searchres = mysql_fetch_row($searchresult);
}
$_SESSION['page']="Search";
 ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Search | LogicRoom.in</title>
  <meta name="keywords" content="LogicRoom, Inc." />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="searchReq/css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
	<style>
		body{
			font-family: 'Poppins', sans-serif !important;
		}
	</style>
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation" style="background-color: #3f729b !important;">
      <div class="navbar-header">
        <div class="logo"><?if(isset($_SESSION['name'])){echo "<h1>Search Project - ".$_SESSION['name']."</h1>";}else{echo "<h1>Search Project</h1>";}?></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="page-wrapper">
      <div class="navbar-collapse collapse sidebar">
        <ul class="sidebar-menu">
          <li>
            <form class="navbar-form" method="POST">
              <input type="text" class="form-control" name="searchbox" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
          <li style="background-color: #3f729b !important;"><a href="./search.php"><i class="fa fa-search"></i>Search</a></li>
		  <?if(isset($_SESSION['username'])){?>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
		  <?}?>
        </ul>
      </div><!--/.navbar-collapse -->
      <div class="content-wrapper">
        <div class="content">
          <ol class="breadcrumb">
            <li><a href="./">Home</a></li>
          </ol>
			<blockquote><font size="4">Search</font></blockquote>
<?
if($searchres==null && isset($_POST['searchbox']))
{
	echo "<h4 align=center>No Results Found.</h4>";		
	unset($_POST['searchbox']);
}
if(isset($_POST['searchbox']))
{
	echo "<table border=3 bordercolor=meganta align=center>";
		echo "<tr height=40><td width=200 align=center><font size=4>Project Name<td width=200 align=center><font size=4>Project Owner<td width=200 align=center><font size=4>Download</font></tr><tr height=10>";
		echo "<tr height=40><td width=200 align=center>$searchres[1]<td width=200 align=center>".$searchres[2];?><td width=200 align=center><a href="./dashboard/download.php?pro=<?echo $searchres[1];?>">Download</a></tr><?
	echo "</table>";
}
else
{?>
	<form action="" method="POST">
		<table border=3 bordercolor=meganta align=center>
			<tr height=40><td width=200 align=center><font size=4>Search for Project : <td width=200 align=center><input type=text name="searchbox" /></tr>
			<tr height=40><td width=200 align=center colspan=2><input type=submit value="Search" /></tr>
		</table>
	</form>
	<?
}
?>
</div>
</div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="./login/logoff.php" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer" style=" position:absolute; bottom:0pc; width:100%; padding:12px 0 12px 0 !important;">
        <div class="copyright">
          <p>Copyright &copy; 2015 - 2016 LogicRoom, Inc.</p>
        </div>
      </footer>
    </div>
	<script src="searchReq/js/jquery.min.js"></script>
    <script src="searchReq/js/bootstrap.min.js"></script>
    <script src="searchReq/js/script.js"></script>
</body>
</html>
