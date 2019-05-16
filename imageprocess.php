<?php

include "link.php"; 

if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == 0)
{
	//header("Location: signin.php");
}

$cmd = "main.exe";
chdir("facifier/src");
$output = array();
exec("$cmd", $output);

echo implode("<br>", $output)

/*$command = escapeshellcmd("python facifier/src/facifier.py"); //image storage in front end (javascript)

$output = shell_exec($command);

echo $output; */

/*sleep(3);

$ln = getlink($output);

header("Location: $ln");
*/
?>

<html>
<head>
	<link href="process.css" type="text/CSS" rel="stylesheet" >
	<title>Processing Facial Features</title>
</head>
<body>
	<h1>Processing...</h1>
	<img id="processarea" class="face" src=
	<?php 

	//echo '"' . "faces/$actual_name" . '"';

	?>
	>

<script>


var processarea = document.getElementById("processarea");
processarea.width = processarea.width / 2;
processarea.height = processarea.height / 2;

</script>

</body>
</html>