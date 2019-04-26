<?php

if(!isset($_SESSION["logged"]) || $_SESSION["logged"] == 0)
{
	//header("Location: signin.php");
}

/*$image_name = $_FILES["userimage"]["tmp_name"];
$actual_name = basename($_FILES["userimage"]["name"]);
echo "image name: " . $image_name . "<br>";
echo "actual name: " . $actual_name . "<br>";
move_uploaded_file($image_name, "faces/$actual_name");*/

//$command = escapeshellcmd('facifier/src/facifier.py');
//$output = shell_exec($command);

$command = escapeshellcmd("python facifier/src/facifier.py");

$output = shell_exec($command);

echo $output;

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