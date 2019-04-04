<?php

if($_COOKIE["logged"] == 1)
{
	header("Location: player.php");
}

session_start();

?>

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
	<div class="error_pool" >
		<?php
		
		if(isset($_SESSION["signin_errors"]))
		{
			echo $_SESSION["signin_errors"];
		}
		
		?>
	</div>
	<div class="formwindow" >
		<input type="text" name="regname" placeholder="Enter username" required>
		<input type="password" name="regpass" placeholder="Enter password" required>
		<div class="buttoncontainer" >
			<input type="submit" value="Sign In" >
			<a href="index.php" ><div class="button" >Back</div></a>
		</div>
	</div>
</form>
</div>
</body>
</html>
