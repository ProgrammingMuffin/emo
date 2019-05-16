<?php

$emo = array("happy", "sad", "angry", "bored");

$rn = random_int(0, 3);

function getlink($output)
{
	$link = "getsong.php?emotion=" . $emo[$rn];
	return $link;
}

?>