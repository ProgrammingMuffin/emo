<?php

include "utility.php";

?>

<!DOCTYPE html>
<html>
<head>
	<title>Account Successfully Created</title>
	<link href="stylesheets/meganote.css" rel="stylesheet" type="text/CSS" />
</head>
<body>
	<div id="note" >
		Account Successfully Created!<br>
		Redirecting in 3 seconds...
	</div>
	<script type="text/javascript" >
		
		setInterval(function(){
			window.location = "signin.php";
		}, 3000);
		
	</script>
	</body>
</html>
