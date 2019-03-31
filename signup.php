<!DOCTYPE html>
<html>
<body>
<head>
<link href="stylesheets/signup.css" type="text/CSS" rel="stylesheet" />
<meta name="viewport" content="width=device-width" >
</head>
<div class="logoarea" >
		<br>
		<img src="images/logo.png" alt="logo" class="logo" >
</div>
<div class="greymask" >
<form class="maincontainer" action="createacc.php" method="post" >
	<div class="tagline" >Let Your Emotions Control The Music</div>
	<div class="error_pool" >
	Password and Confirm Password doesn't match.
	</div>
	<div class="formwindow" >
		<input type="text" name="regname" placeholder="Enter username" >
		<input type="password" name="regpass" placeholder="Enter password" >
		<input type="password" name="confpass" placeholder="Confirm password" >
		<input type="text" name="regmail" placeholder="Enter email ID" >
		<input type="number" name="phone" placeholder="Enter phone number" >
		<div class="buttoncontainer" >
			<input type="submit" value="Sign Up" >
			<a href="index.php" ><div class="button" >Back</div></a>
		</div>
	</div>
</div>
</form>
</body>
</html>
