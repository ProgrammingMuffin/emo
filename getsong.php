<?php

include "server_vars.php";
include "utility.php";

session_start();

$path = "music/";

$mysqli = new mysqli($HOST, $USERNAME, $PASSWORD, $DBNAME_CORE);

if($mysqli->connect_errno)
{
	echo "Error connecting to mysql";
}
else
{
	echo "MySQL successfully connected";
}

$emotion = $_GET["emotion"];
$counter = ""; //stands for counter emotion

switch($emotion)
{
	case "happy": 
	case "sad": $counter = "happy";
						 break;
	case "angry": $counter = "calm";
							 break;
	case "bored": $counter = "motivational";
							 break;
	default: $counter = "happy";
}

echo "The emotion used here is: " . $emotion . "<br>"; //these statements are for debugging purposes only.
echo "The counter emotion is: " . $counter . "<br>";

$i=0;

if($q1 = $mysqli->prepare("SELECT title, reference FROM musicstore WHERE emotion=?"))
{
	$q1->bind_param("s", $counter);
	$q1->execute();
	$q1->bind_result($title, $reference);
	$q1->store_result();
	$count = $q1->num_rows;
	$limit = rand(1, $count);
	while($q1->fetch() && $i < $limit)
	{
		$_SESSION["song_title"] = $title;
		$_SESSION["song_ref"] = $path . $reference;
		$i++;
	}
}
else
{
	echo "MySQL error: " . $mysqli->error;
}

echo "Song about to be played is: " . $_SESSION["song_title"] . "<br>";
echo "Song location: " . $_SESSION["song_ref"] . "<br>";

header("Location: player.php");

?>
