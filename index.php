<?php

$file_name = $_FILES['cam']['name'];
$file_tmpname = $_FILES['cam']['tmp_name'];
$file_size = $_FILES['cam']['size'];

echo "file name: " . $file_name . "<br>";
echo "file temporary name: " . $file_tmpname . "<br>";
echo "file size: " . $file_size . "<br>";

echo '<img src="' . $file_tmpname . '" >';

?>

<html>
<body>
<h1>Front camera unit testing</h1>
<form enctype="multipart/form-data" action="index.php" method="post" >
<input type="file" name="cam" accept="images/*" capture="user" >
<input type="submit" value="scan" >
</form>
</body>
</html>
