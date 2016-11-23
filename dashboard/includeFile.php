<head>
  <meta charset="utf-8">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
<?
include("csslinkFiles.php");
?>
<style>
	body{
		font-family: 'Poppins', sans-serif !important;
	}
	.navbar-inverse{
		background-color: #3f729b !important;
    		border-color: #3f729b !important;
		color:white !important;
		box-shadow:0 2px 4px 0 rgba(0,0,0,0.15),0 2px 10px 0 rgba(0,0,0,0.12)!important;
	}
  .showbox {
    float: right;
    margin: -15em -4em;
    width: 150px;
    height: 60px;
    border: 2px solid #1FCDFF;
    background-color: #fff;
    line-height: 60px;
    text-align: left;
    -webkit-transition: 1s ease-out;
    -moz-transition: 1s ease-out;
    -o-transition: 1s ease-out;
    transition: 1s ease-out;
  }
  .showbox.slideright:hover {
    -webkit-transform: translate(0,3em);
    -moz-transform: translate(3em,0);
    -o-transform: translate(3em,0);
    -ms-transform: translate(3em,0);
    transform: translate(-30px);
  }
</style>
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>
		<? 
include_once("../includeme.php");
	$preresult=mysql_query("select * from client_mast where username='".$_SESSION['username']."'");
	$row = mysql_fetch_row($preresult);
				if(isset($_SESSION['page']) & isset($_SESSION['name'])) 
					echo $_SESSION['page']." - ".$_SESSION['name']; 
					$target_dir =getcwd()."\\UserProjects\\".$row[3]."\\";
					$_SESSION['dir']=$target_dir;
		?>
		</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
	<a href="../"><div class="showbox slideright" style="position:fixed;right:-3px;top:330px;z-index:10000;"><h4 align="left" style="margin-top:20px;margin-left:20px">Home</h4></div></a>
    <div class="page-wrapper">
      <div class="navbar-collapse collapse sidebar">
        <ul class="sidebar-menu">
          <li>
            <form class="navbar-form" method="POST" action="../search.php">
              <input type="text" class="form-control" name="searchbox" placeholder="Search...">
              <span class="btn btn-default">Go</span>
            </form>
          </li>
         <?
		 if(isset($_SESSION['page']) & $_SESSION['page']=="Dashboard"){?>
			<li class="active">
			<?	}	else{?>
			<li>
			<? }?>
		 <a href="./"><i class="fa fa-home"></i>Dashboard</a></li>
		  <?
			if(isset($_SESSION['page']) & $_SESSION['page']=="Projects"){?>
					<li class="active">
			<?	}	else{?>
			<li>
			<? }?>
		 <a href="projects.php"><i class="fa fa-database"></i> Projects Settings </a></li>
		  <?
			if(isset($_SESSION['page']) & $_SESSION['page']=="Profile"){?>
					<li class="active">
			<?	}	else{?>
			<li>
			<? }?>
		  <a href="./profile.php"><i class="fa fa-cubes"></i>&nbsp;Profile</a></li>
          <?
			if(isset($_SESSION['page']) & $_SESSION['page']=="Settings"){?>
					<li class="active">
			<?	}	else{?>
			<li>
			<? }?>
		  <a href="./settings.php"><i class="fa fa-cog"></i>Settings</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>Sign Out</a></li>
        </ul>
		</div>
  </div>







<!--		Sign Out Confirmation		-->
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
	  <!--		Sign Out Confirmation Over		-->
<?
include("jslinkFiles.php");
?>
