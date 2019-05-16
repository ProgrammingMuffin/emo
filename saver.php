<?php

$img = $_POST['imgBase64'];
/*$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
//saving
$fileName = 'face.png';
file_put_contents($fileName, $fileData);*/

$data = $img;//'data:image/png;base64,AAAFBfj42Pj4';

// $file = fopen("hi.txt", "r");
// $data = fread($file, filesize("hi.txt"));
// fclose($file);

$data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $data));
file_put_contents('face/face.png', $data);

?>