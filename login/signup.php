<!DOCTYPE html>
<html lang="en">
<head>
    
<meta charset="utf-8">
    
<title>Sign Up to Logic Room</title>
    
<link rel="stylesheet" href="css/normalize.css">
    
<link rel="stylesheet" href="css/contact-form.css">

</head>

<body>
    
<section>
        
<h1>Logic Room</h1>
        
<form class="c-form" action="signupchk.php" method="get">
            
<h2>Sign Up</h2>
            
            
<label for="name">Name</label>
            
<input type="text" id="name" name="name" maxlength="100" placeholder="First Name Last Name" required>
		
<label for="user">User Name</label>
            
<input type="text" id="username" name="username" maxlength="100" placeholder="Unique User Name" required>
            
            
<label for="email">Email</label>
            
<input type="email" id="email" name="email" maxlength="100" placeholder="email@email.com" required>

<label for="email">Recovery - Email</label>
            
<input type="text" id="remail" name="remail" maxlength="100" placeholder="recoveryemail@email.com" required>
            
<label for="password">Password</label>
            
<input type=Password minlength="8" maxlength="16" id="password" name="password"placeholder="password" required>
            
            
<label for="confirmpassword">Confirm Password</label>
            
<input type=Password minlength="8" maxlength="16" id="cpassword" name="cpassword" placeholder="Confirm Password">

<label for="Captcha">I'm Not Robot
<?
session_start();
$captcha_code=substr(md5(microtime()),0,5);
$t=-1;
$im=imagecreatefromjpeg("../captcha/123.jpg");
$font_file='../captcha/BRADHITC.ttf';
$black=imagecolorallocate($im,3,0,0);
for($i=0;$i<5;$i++)
{
	$s=$captcha_code[$i];
	imagefttext($im,rand(15,25),pow($t,$i) *rand(0,20),(20*($i+1))+5,25,$black,$font_file,$s);
}
imagepng($im,'../login/test'.image_type_to_extension(IMAGETYPE_PNG));
$_SESSION["captcha_code"]=$captcha_code;
echo "<br /><img src=test.png /><br />";
//echo "<form action=captchacheck.php>";
//echo "<table border=0>";
?>
</label>
<label for="captcha">Enter Captcha
<input type=text name=captcha_code  placeholder="Captcha Code">
<!--//echo	"<tr><td><input type=submit /></td></tr>";
//echo "</table>";-->
</label>
            
            
<label><input type="checkbox" checked="checked">I Agree to User Terms and Conditions</label>
            
            
<div class="c-form-controls">
                
<button type="submit">Sign Up Now</button>
                           
</div>
        
</form>
    
</section>

</body>

</html>