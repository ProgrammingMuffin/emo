<?php

if($_COOKIE["logged"] == 1)
{
	header("Location: player.php");
}

session_start();

?>

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
	<?php
	
	if(isset($_SESSION["signup_errors"]))
	{
		echo $_SESSION["signup_errors"];
	}
	
	?>
	</div>
	<div class="formwindow" >
		<input type="text" name="regname" placeholder="Enter username" required>
		<input type="password" name="regpass" placeholder="Enter password" required>
		<input type="password" name="confpass" placeholder="Confirm password" required>
		<input type="text" name="regmail" placeholder="Enter email ID" required>
		<input type="number" name="phone" placeholder="Enter phone number" required>
		<div class="buttoncontainer" >
			<input type="submit" value="Sign Up" >
			<a href="index.php" ><div class="button" >Back</div></a>
		</div>
	</div>
</div>
</form>
</body>
</html>
