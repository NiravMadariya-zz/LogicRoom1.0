<? session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About us - Logic Room</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/circle-menu.min.css">
	<!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
	<link href="color/default.css" rel="stylesheet">
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
<!-- Preloader -->
	<div id="preloader">
	  <div id="load"></div>
	</div>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./">
                    <h1 text="blue">Logic Room</h1>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li><a href="./">Home</a></li>
		 <li class="dropdown"><? if(isset($_SESSION['username'])) { ?>
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?	echo $_SESSION['username']."<b class='caret'></b></a>"; } else { ?>
	<a href="./login/">Login</a><?}?>
          <ul class="dropdown-menu">
            <li><a href="profile.php">Profile</a></li>
			<li><a href="dashboard.php">DashBoard</a></li>
            <li><a href="./login/logoff.php">Sign Out</a></li>
          </ul>
        </li>
<!--	<li><a href="login/">Login</a></li>-->
	<li><a href="./index.php#service">Service</a></li>
	<li><a href="./index.php#contact">Contact</a></li>
<!--	<li class="active"><a href="about.php">About</a></li>-->
  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


<div id="c-circle-nav" class="c-circle-nav">
	  <button id="c-circle-nav__toggle" class="c-circle-nav__toggle">
		<span>Toggle</span>
	  </button>
	  <ul class="c-circle-nav__items">
		<li class="c-circle-nav__item">
		  <a href="./" class="c-circle-nav__link">
			<center><img src="img/House.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http:\\www.facebook.com/NiravPatel1450" class="c-circle-nav__link">
			<center><img src="img/Facebook.png" /></center>
		  </a>
		</li>
<!--		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
			<center><img src="img/Pinterest.png" /></center>
		  </a>
		</li>-->
		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
			<center><img src="img/Twitter.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http:\\plus.google.com/+NiravPatel1450" class="c-circle-nav__link">
			<center><img src="img/Google.png" /></center>
		  </a>
		</li>
	  </ul>
	</div>
	<!-- circle-nav -->
	<!-- Section: about -->
    <section id="about" class="home-section text-center">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>About us</h2>
					<i class="fa fa-2x fa-angle-down"></i>
					</div>
					</div>
				</div>
			</div>
			</div>
		</div>
		<div class="container">
		<div class="row">
			<div class="col-lg-2 col-lg-offset-5">
				<hr class="marginbot-50">
			</div>
		</div>
        <div class="row">
		<!-- Nirav Madariya -->
            <div class="col-xs-6 col-sm-3 col-md-3" style="border-radius:100%;" align="center">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Nirav Madariya</h5>
 <!--                       <p class="subtitle"></p>-->
                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />

			<hr>
			</div>
			<div>
				<p>
					Welcome to Logic Room.in<br />
					-----<br />
					We Provides Service to Create Projects With Team <br />and Team Members can Edit or Delete Projects Online.<br />
					-----<br />
					This is Virtual Room for Developers Who are far from Each Other.<br />
					-----<br />
					We provides Cloud Computing Services for You and Your Projects.<br />
				</p>
				</div>
			        </div>		
		</div>
	</section>
	<!-- /Section: about -->
	<!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
<script src="js/circleMenu.min.js"></script>
	<!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
	</body>
</html>