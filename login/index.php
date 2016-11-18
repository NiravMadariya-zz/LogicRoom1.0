<?
session_start();
if(isset($_SESSION['username'])) 
{
	header("location:../");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Sign In</title>
    
<link rel="stylesheet" href="css/normalize.css">
    
<link rel="stylesheet" href="css/contact-form.css">
</head>
<body>
    
<section>
        
<h1>Logic Room</h1>
        
<form class="c-form" action="login_check.php" method="get">
            
<h2>Sign In</h2>
            
            
<label for="username">User Name</label>
            
<input type="text" name="username" maxlength="100" placeholder="user name" required>
            
            
<label for="password">Password</label>
            
<input type=Password maxlength="16" name="password" placeholder="password" required>
            
            
<div class="c-form-controls">
                
<button type="submit">Sign In</button>
<br /><br />               
<label>Not A Member?  <a href="./signup.php">Sign Up Here</a></label>


</div>
        
</form>
    
</section>
</body>
</html>