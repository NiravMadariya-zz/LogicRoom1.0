<?
session_start();
if(!isset($_SESSION['username'])) {
	header("location:./login/");				}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Profile - Logic Room</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<!-- Preloader -->
<!--	<div id="preloader">
	  <div id="load"></div>
	</div>-->

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <!--<a class="alink" href="./">
                    <h3>Logic Room</h3>
                </a>-->
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
	  
<!--        <li class="active"><a href="./">Home</a></li>-->
		 <li class="dropdown">
					 <? if(isset($_SESSION['username'])) { ?>
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?	echo $_SESSION['username']."<b class='caret'></b></a>"; } else { ?>
	<a href="./login/">Login</a>					<?}?>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
			<li><a href="dashboard.php">DashBoard</a></li>
            <li><a href="./login/logoff.php">Sign Out</a></li>
          </ul>
        </li>
<!--	<li><a href="login/">Login</a></li>
	<li><a href="./index.php#service">Service</a></li>
	<li><a href="./index.php#contact">Contact</a></li>
	<li><a href="about.php">About</a></li>-->
  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>








<!--<html>
<body>
<form action="" method="get">
<br />
Profile Picture:<br /><br /><input type=file name=image>Upload  Your  Photograph
</form>
</body>
</html>-->






<!--<!DOCTYPE html>
<html lang="en">-->
<head>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="Magnetic is a stunning responsive HTML5/CSS3 photography/portfolio website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">


    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">

	<!----												------->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<header>
		<div class="logo">
<!--			<a href="./" class="navbar-brand"  hidden=true><!--class="alink"><img src="img/logo.png" title="Magnetic" alt="Magnetic"/>--><!--Logic Room</a>-->
			<a class="alink" href="./">
                    <h3>Logic Room</h3>
                </a>
			<a href="#" class="alink" hidden=true>Logic Room</a>
		</div><!-- end logo -->
		<div id="menu_icon"></div>
		<nav>
			<ul>
				<li><a href="./" class="selected">Home</a></li>
				<li><a href="./about.php">About</a></li>
				<li><a href="./#service">Services</a></li>
				<!--<li><a href="#">Journal</a></li>-->
				<li><a href="./#contact">Contact Us</a></li>
			</ul>
		</nav><!-- end navigation menu -->

		<div class="footer clearfix">
			<ul class="social clearfix">
				<li><a href="#" class="fb" data-title="Facebook"></a></li>
				<li><a href="#" class="google" data-title="Google +"></a></li>
				<li><a href="#" class="twitter" data-title="Twitter"></a></li>
				<!--<li><a href="#" class="behance" data-title="Behance"></a></li>
				
				<li><a href="#" class="dribble" data-title="Dribble"></a></li>
				<li><a href="#" class="rss" data-title="RSS"></a></li>-->
			</ul><!-- end social -->

			<div class="rights">
				<p>Copyright © 2015
				 <a href="./">logicRoom.in</a></p>
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->

	 <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>