<?php

if(isset($_COOKIE["logged"]))
{
	if($_COOKIE["logged"] != 1)
	{
		header("Location: signin.php");
	}
}
else
{
	header("Location: signin.php");
}

?>

<!DOCTYPE html>
<html>
<body>
<div>Hello world!</div>
</body>
</html>
