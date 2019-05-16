<?php

session_start();

if($_COOKIE["logged"] != 1)
{
	$_SESSION["signin_errors"] = "Sign in to continue<br>";
	header("Location: signin.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/add-on/jplayer.playlist.min.js" type="text/javascript" ></script> 
	<script src="libraries/requireJS/require.js" type="text/javascript" ></script>
	<script src="libraries/id3/src/id3.js" type="text/javascript" ></script> !-->
	<link href="stylesheets/player.css" type="text/CSS" rel="stylesheet" />
</head>
<body onload="init()" >
	<div id="grey_mask" ></div>
	<nav class="topbar_container" >
		<nav class="topbar" >
			<a href="logout.php" ><div id="logout" class="left_button" >logout</div></a>
			<button id="sense" class="button" style="position: relative" >Sense Emotion</button>
			<button id="random" class="button" >Random Song</button>
		</nav>
	</nav>
	<div id="sense_window" >
		<div class="title" >Choose Method</div>
		<div class="left_container" >
			<div class="label" >Select Mood</div>
			<div class="emoji_list" >
				<input type="image" name="happy" id="happy" src="images/happy.png" class="button" value="happy" >
				<input type="image" name="sad" id="sad" src="images/sad.png" class="button" >
				<input type="image" name="angry" id="angry" src="images/angry.png" class="button" >
				<input type="image" name="bored" id="bored" src="images/bored.png" class="button" >
			</div>
		</div>
		<div class="right_container">
			<div class="label" ><button id="scan_btn" >Scan From Camera</button></div>
			<form action="imageprocess.php" method="post" enctype="multipart/form-data" >
				<!--<input type="file" name="userimage" class="file_button" accept="image/*;capture=camera" value="Scan">-->
				<!--<input type="submit" value="upload" style="float: right; margin-right: 25px;">-->
			</form>
		</div>
	</div>
	<div class="cam" id="cam" >
		<canvas id="canvas" width="640" height="480"></canvas>
		<video id="video" width="640" height="480" autoplay></video>
		<button id="snap">Snap Photo</button>
		<button id="process" >Process</button>
	</div>
			<!--<img id="photo" width="320px" height="320px" >-->
	<div class="maincontainer" >
		<div class="leftcontainer" >
			<div class="player" >
				<marquee class="song_title" scrolldelay="40" truespeed=true >
					<?php
						
						if(isset($_SESSION["song_title"]))
						{
							$song_title = $_SESSION["song_title"];
							echo "Now Playing: " . $song_title;
						}
					
					?>
				</marquee>
				<img id="visualizer" class="visualizer" src="images/scene3.jpg" >
				<audio id="music" controls autoplay src=
				<?php
				
				if(isset($_SESSION["song_ref"]))
				{
					$song_ref = $_SESSION["song_ref"];
					echo '"' . $song_ref . '"';
				}
				
				?> 
				class="controls" >Your browser doesn't allow this feature</audio>
			</div>
		</div>
		<div class="rightcontainer" >
			<div class="mostplayed" >
				<div class="title" >Most Played Songs</div>
				<p class="warning" >This feature is coming soon.</p>
			</div>
		</div>
	</div>
	
	<script type="text/javascript" >
		
		var sense_button = document.getElementById("sense");
		var random_button = document.getElementById("random");
		var grey_mask = document.getElementById("grey_mask");
		var happy_btn = document.getElementById("happy");
		var sad_btn = document.getElementById("sad");
		var angry_btn = document.getElementById("angry");
		var bored_btn = document.getElementById("bored");
		var music = document.getElementById("music");
		var scan_btn = document.getElementById("scan_btn");


		var visualizer = document.getElementById("visualizer");
		var scene_path = "images/scene";

		//--------------------
      // GET USER MEDIA CODE
      //--------------------
          navigator.getUserMedia = ( navigator.getUserMedia ||
                             navigator.webkitGetUserMedia ||
                             navigator.mozGetUserMedia ||
                             navigator.msGetUserMedia);

          var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}

var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');
var cam = document.getElementById("cam");
var process_btn = document.getElementById('process');
var dataURL;

scan_btn.onclick = function()
{
	closeWindow("sense_window");
	closeWindow("grey_mask");
	cam.style.display = "block";
	process_btn.style.display = "none";
}

process_btn.onclick = function()
{
	cam.style.display = "none";
	window.location = "imageprocess.php";
}

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
	video.style.display = "none";
	canvas.style.display = "block";

	dataURL = canvas.toDataURL();

	$.ajax({
  type: "POST",
  url: "saver.php",
  data: { 
     imgBase64: dataURL
  }
}).done(function(o) {
	process_btn.style.display = "block";
  // If you want the file to be visible in the browser 
  // - please modify the callback in javascript. All you
  // need is to return the url to the file, you just saved 
  // and than put the image in your browser.
});
});


		
		function getRandomInt(max) {
			return Math.floor(Math.random() * Math.floor(max));
		}
		
		
		function displayWindow(element_id)
		{
			var element = document.getElementById(element_id);
			if(element.style.display == "block")
			{
				element.style.display = "none";
			}
			else
			{
				element.style.display = "block";
			}
		}
		
		function closeWindow(element_id)
		{
			var element = document.getElementById(element_id);
			if(element.style.display == "block")
			{
				element.style.display = "none";
			}
		}
		
		sense_button.onclick = function()
		{
			displayWindow("grey_mask");
			displayWindow("sense_window");
		}
		
		grey_mask.onclick = function()
		{
			closeWindow("sense_window");
			closeWindow("grey_mask");
		}
		
		happy_btn.onclick = function()
		{
			window.location = "getsong.php?emotion=happy";
		}
		
		sad_btn.onclick = function()
		{
			window.location = "getsong.php?emotion=sad";
		}
		
		angry_btn.onclick = function()
		{
			window.location = "getsong.php?emotion=angry";
		}
		
		bored_btn.onclick = function()
		{
			window.location = "getsong.php?emotion=bored";
		}
		
		random_button.onclick = function()
		{
			var emos = ["happy", "sad", "angry", "bored"];
			window.location = "getsong.php?emotion=" + emos[getRandomInt(3)];
		}
		
	</script>
	
</body>
</html>
