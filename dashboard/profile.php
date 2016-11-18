<?
include_once("../includeme.php");
if(!isset($_SESSION['username']))
{
	header("location:../login/");
}
$_SESSION['page']="Profile";
?>
<!DOCTYPE html>
<head><title>Profile | LogicRoom.in</title>
<?include("csslinkFiles.php");?>
</head>
<?include("includeFile.php");?>
<div class="content-wrapper">
        <div class="content">
		<ol class="breadcrumb">
	        <li><a href="profile.php">Profile</a></li>
		</ol>
		<h1>Profile</h1>
<?
	if(!isset($_SESSION['username'])) {
		header("location:./");
	}?>
<section id="about" class="home-section text-center">
	<div class="heading-about">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-3 col-md-3" style="border-radius:100%;" align="center">
					<div class="wow bounceInUp" data-wow-delay="0.5s">
					    <div class="team boxed-grey">
		                    <div class="inner">
								<div class="avatar">
									<? $imgname="./ProPics/".$_SESSION['username'].".png";?>
									<img src="<?echo $imgname;?>" alt="Profile Picture" class="img-responsive img-circle" style="height:200px;width:200px;margin-bottom:30px;" />
									<h4><?echo $_SESSION['name'];?></h4>
								</div>
		                    </div>
		                </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
</div>
<?include("closingFile.php");
include("jslinkFiles.php");?>
</body>
</html>