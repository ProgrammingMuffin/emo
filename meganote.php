<?php

include "utility.php";

if($_COOKIE["logged"] == 0)
{
	header("Location: signin.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Let\'s leave this empty for now</title>
	<link href="stylesheets/meganote.css" rel="stylesheet" type="text/CSS" />
</head>
<body>
	<div id="note" >
		Successfully logged in!<br>
		Redirecting in 3 seconds...
	</div>
	<script type="text/javascript" >
		
		setInterval(function(){
			window.location = "player.php";
		}, 3000);
		
	</script>
	</body>
</html>
