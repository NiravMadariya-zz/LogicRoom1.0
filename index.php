<?
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logic Room - For Developers</title>

	<style>
	@media screen and (max-width: 500px) {
  div.slogan{
      padding-top: 50px;
	  padding-right:2px;
  }
  h2.slogan{
		font-size:12px;
  }
}
	</style>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

	<!-- circle Menu -->
	<link rel="stylesheet" href="css/circle-menu.min.css">

    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/animate.css" rel="stylesheet" />
    <!-- Squad theme CSS -->
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
                    <h1>Logic Room</h1>
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#intro">Home</a></li>

		 <li class="dropdown">
<?
if(isset($_SESSION['username'])) {
?>
		 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
<?
	echo $_SESSION['username']."<b class='caret'></b></a>"; ?>
	<ul class="dropdown-menu">
            <li><a href="./dashboard/profile.php">Profile</a></li>
			<li><a href="dashboard.php">DashBoard</a></li>
			<li><a href="./dashboard/settings.php">Settings</a></li>
            <li><a href="./login/logoff.php">Sign Out</a></li>
          </ul>
	<?
}
else{
	?>
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">LOGIN<b class='caret'></b></a>
	<ul class="dropdown-menu">
            <li><a href="./login/">Client</a></li>
			<li><a href="./admin/">Admin</a></li>
          </ul>
<!--	<a href="./login/">Login</a>-->
	<?
}
	?>
          
        </li>
<!--	<li><a href="login/">Login</a></li>-->
        
	<li><a href="#service">Service</a></li>
	<li><a href="#contact">Contact</a></li>
	<li><a href="about.php">About</a></li>
       <!--<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Our Websites <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">A</a></li>
            <li><a href="#">B</a></li>
            <li><a href="#">C</a></li>

            <li><a href="#">D</a></li>

          </ul>
        </li>-->
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
			<div class="special" align="center"><form action="Search.php" method="POST" align="right"><br /><font color="white" class="special">Search for Projects : &nbsp;</font><table align=right><tr><td><input type="text" name="searchbox" /><td align=center width=70><input type="submit" value="Search"/><td width=90></tr></table></form></div>
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
		  <a href="http:\\www.facebook.com/NiravPatel1450" class="c-circle-nav__link" target="blank">
			<center><img src="img/Facebook.png" /></center>
		  </a>
		</li>
<!--		<li class="c-circle-nav__item">
		  <a href="#" class="c-circle-nav__link">
			<center><img src="img/Pinterest.png" /></center>
		  </a>
		</li>-->
		<li class="c-circle-nav__item">
		  <a href="https://twitter.com/Nirav_Madariya" class="c-circle-nav__link" target="blank">
			<center><img src="img/Twitter.png" /></center>
		  </a>
		</li>
		<li class="c-circle-nav__item">
		  <a href="http:\\plus.google.com/+NiravPatel1450" class="c-circle-nav__link" target="blank">
			<center><img src="img/Google.png" /></center>
		  </a>
		</li>
	  </ul>
	</div>
	<?$_SESSION['dir']=getcwd();?>
	<!-- circle-nav -->
	<!-- Section: intro -->
    <section id="intro" class="intro">
		<div class="slogan">
			<h2 class="slogan">LOGIC Room</h2>
			<h4>INSPIRING DEVELOPERS TO REKINDLE PASSION</h4>
		</div>
		<div class="page-scroll">
			<a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
		</div>
    </section>
	<!-- /Section: intro -->
	<!-- Section: about 
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
            <div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.4s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Nirav Madariya</h5>
 <!--                       <p class="subtitle"></p>
                        <div class="avatar"><img src="img/team/1.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			Add Developer Details Here
			<div class="col-xs-6 col-sm-3 col-md-3">
				<div class="wow bounceInUp" data-wow-delay="0.5s">
                <div class="team boxed-grey">
                    <div class="inner">
						<h5>Maura Daniels</h5>
                        <p class="subtitle">Ruby on Rails</p>
                        <div class="avatar"><img src="img/team/2.jpg" alt="" class="img-responsive img-circle" /></div>
                    </div>
                </div>
				</div>
            </div>
			        </div>		
		</div>
	</section>
	 /Section: about -->
	<!-- Section: services -->
    <section id="service" class="home-section text-center bg-gray">
		<div class="heading-about">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.5s">
					<div class="section-heading">
					<h2>Our Services</h2>
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
            <div class="col-sm-3 col-md-3">
				<div class="wow fadeInLeft" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-1.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Online Projects</h5>
						<p>We are Allowing our Users to Create or Edit Projects Online.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-2.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Virtual Room</h5>
						<p>This is Virtual Room for Developers Who are far from Each Other.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-4.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Cloud Computing</h5>
						<p>We are providing Cloud Computing Services for You and Your Projects.</p>
					</div>
                </div>
				</div>
            </div>
			<div class="col-sm-3 col-md-3">
				<div class="wow fadeInRight" data-wow-delay="0.2s">
                <div class="service-box">
					<div class="service-icon">
						<img src="img/icons/service-icon-3.png" alt="" />
					</div>
					<div class="service-desc">
						<h5>Other Offers</h5>
						<p>FAQ and Developer Communications</p>
					</div>
                </div>
				</div>
            </div>
        </div>		
		</div>
	</section>
	<!-- /Section: services -->
	

	

	<!-- Section: contact -->
    <section id="contact" class="home-section text-center">
		<div class="heading-contact">
			<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					<div class="wow bounceInDown" data-wow-delay="0.4s">
					<div class="section-heading">
					<h2>Get in touch</h2>
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
	<iframe src="https://logicchat.firebaseapp.com/" height="310" width="420px" frameborder="0" style="border-radius:10px;float:left;border:0;" ></iframe><br />
        <!--<div class="col-lg-8">
            <div class="boxed-grey">
                <form id="contact-form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
<!--                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
							<input type="text" class="form-control" id="subject" placeholder="Subject" required="required" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-skin pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
		<div class="col-lg-4">
			<div class="widget-contact">
				<h5>Contact Details</h5>
				<address>
				  <!--<strong>##### #### ##### ####</strong><br>
				  ########,<br>
				  #################,<br>
				  ############# - ######<br>-->
				  <b><font size=3>Nirav Madariya</font>,</b><br />
				  Microsoft Student Partner,<br />
				  Windows 10 and Windows phone Developer<br />
  				  <abbr title="Phone">Call:</abbr> +91 7405643427
				</address>
				<address><br />
				  <strong><font size=3>Email</font></strong><br><br />
				  <h5><a href="mailto:niravpatel1450@gmail.com">niravpatel1450@gmail.com</a>
				  <br /><a href="mailto:nirav.madariya@studentpartner.com">nirav.madariya@studentpartner.com</a><br />
				</address>	
<!--				<address>
                        </ul>	
				</address>-->
    </div>	
		</div>
	</section>
	<!-- /Section: contact -->
	<footer>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="wow shake" data-wow-delay="0.4s">
					<div class="page-scroll marginbot-30">
						<a href="#intro" id="totop" class="btn btn-circle1">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
					</div>
					</div>
					<p>&copy;Copyright 2015 - 2016 LogicRoom.in, All rights reserved.</p>
				</div>
			</div>	
		</div>
	</footer>
    <!-- Core JavaScript Files -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>	
	<script src="js/jquery.scrollTo.js"></script>
	<script src="js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
<script src="js/jquery-1.11.3.min.js"></script>
<!-- Bootstrap Core JavaScript 
<script src="js/bootstrap.min12.js"></script>-->
<!-- Custom Theme JavaScript -->
<script src="js/agency.js"></script>
<!-- Plugin JavaScript -->
<script src="js/jquery.easing.min.js"></script>
<script src="js/classie.js"></script>
<script src="js/cbpAnimatedHeader.js"></script>
<script src="js/circleMenu.min.js"></script>
</body>
</html>