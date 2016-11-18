<?
session_start();
include_once("../includeme.php");
$table="admin_mast";
if(isset($_SESSION['username']))
{
	?>
	<!DOCTYPE html>
	<head>
  <meta charset="utf-8">
  <title>Admin Panel | LogicRoom.in</title>
  <meta name="keywords" content="logicroom.in" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/main.css">
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><?if(isset($_SESSION['username'])){echo "<h1>Admin Panel - ".$_SESSION['username']."</h1>";}else{echo "<h1>Search Project</h1>";}?></div>
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
          <li class="active"><a href="./adminPanel.php"><i class="fa fa-home"></i>Admin Panel</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="content-wrapper">
        <div class="content">
          <ol class="breadcrumb">
            <li><a href="./">Home</a></li>
          </ol>
		  <blockquote><font size="4">Admin Panel</font></blockquote>




<?
	$query="select username from client_mast";
	$rs=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
	if(mysql_num_rows($rs)>0)
	{
		echo "<table border=4 bordercolor=purple align=center>";
		$j=0;
		$i=mysql_num_rows($rs);
		if($i>=4)
		{
			echo "<tr height=35><td align=center width=250 colspan=4><font size=4>Users</font></td></tr><tr height=10></tr>";
		}
		else
		{
			echo "<tr height=35><td align=center width=250 colspan=$i><font size=4>Users</font></td></tr><tr height=10></tr>";
		}
		echo "<tr height=35>";
		while($j<$i)
		{
			echo "<td align=center width=150>".mysql_result($rs,$j)."</td>";
			if($i>=4)
			{
				if($j==3)
				{
					echo "</tr><tr>";
				}
			}
			$j=$j+1;
		}
		echo "</table>";
	}
	echo "<table border=0><tr height=50><td width=20></td></tr></table>";
	$query="select * from projects";
	$rs=mysql_query($query) or die("mysql_error=".mysql_error()."error No.".mysql_errno());
	if(mysql_num_rows($rs)>0)
	{
		echo "<table border=4 bordercolor=purple align=center>";
		$j=0;
		$i=mysql_num_rows($rs);
		echo "<tr height=35><td align=center width=250 colspan=5><font size=4>Projects</font></td></tr><tr height=10></tr>";
		echo "<tr height=35><td align=center width=250><font size=4>Private Project<td align=center width=250><font size=4>Project Name<td align=center width=250><font size=4>Project Owner<td align=center width=250><font size=4>Project Managers<td align=center width=250><font size=4>Project Admins</tr><tr height=10></tr>";
		while($j<$i)
		{
			echo "<tr height=35><td align=center width=150>".mysql_result($rs,$j,0)."</td>";
			echo "<td align=center width=150>".mysql_result($rs,$j,1)."</td>";
			echo "<td align=center width=150>".mysql_result($rs,$j,2)."</td>";
			echo "<td align=center width=150>".mysql_result($rs,$j,3)."</td>";
			echo "<td align=center width=150>".mysql_result($rs,$j,4)."</td></tr>";
			$j=$j+1;
		}
		echo "</table>";
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
              <a href="../login/logoff.php" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer">
        <div class="copyright">
          <p>Copyright &copy; 2015 LogicRoom.in</p>
        </div>
      </footer>
    </div>
	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?}
else {
	header("location:../login/");
}
?>