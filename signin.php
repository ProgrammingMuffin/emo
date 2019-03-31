<!DOCTYPE html>
<html>
<head>
	<link href="stylesheets/signup.css" type="text/CSS" rel="stylesheet" />
	<link href="stylesheets/signin.css" type="text/CSS" rel="stylesheet" />
	<meta name="viewport" content="width=device-width" >
</head>
<body>
	<div class="logoarea" >
		<br>
		<img src="images/logo.png" alt="logo" class="logo" >
</div>
<div class="greymask" >
<form class="maincontainer" action="loginauth.php" method="post" >
	<div class="tagline" >Welcome Back!</div>
	<div class="error_pool" >Username or Password is wrong</div>
	<div class="formwindow" >
		<input type="text" name="regname" placeholder="Enter username" >
		<input type="password" name="regpass" placeholder="Enter password" >
		<div class="buttoncontainer" >
			<input type="submit" value="Sign In" >
			<a href="index.php" ><div class="button" >Back</div></a>
		</div>
	</div>
</form>
</div>
</body>
</html>
