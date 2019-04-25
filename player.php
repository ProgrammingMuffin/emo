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
			<div class="label" >Scan From Camera</div>
			<canvas id="canvas" width="640" height="480"></canvas>
			<img id="photo" width="320px" height="320px" >
			<form action="imageprocess.php" method="post" enctype="multipart/form-data" >
				<video id="video" width="640" height="480" autoplay></video>
				<!--<input type="file" name="userimage" class="file_button" accept="image/*;capture=camera" value="Scan">-->
				<!--<input type="submit" value="upload" style="float: right; margin-right: 25px;">-->
			</form>
			<button id="snap">Snap Photo</button>
		</div>
	</div>
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

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 640, 480);
});

      /*var video;
      var webcamStream;

      function startWebcam() {
        if (navigator.getUserMedia) {
           navigator.getUserMedia (

              // constraints
              {
                 video: true,
                 audio: false
              },

              // successCallback
              function(localMediaStream) {
                  video = document.querySelector('video');
                 video.src = window.URL.createObjectURL(localMediaStream);
                 webcamStream = localMediaStream;
              },

              // errorCallback
              function(err) {
                 console.log("The following error occured: " + err);
              }
           );
        } else {
           console.log("getUserMedia not supported");
        }  
      }

      function stopWebcam() {
          webcamStream.stop();
      }
      //---------------------
      // TAKE A SNAPSHOT CODE
      //---------------------
      var canvas, ctx;

      function init() {
        // Get the canvas and obtain a context for
        // drawing in it
        canvas = document.getElementById("myCanvas");
        ctx = canvas.getContext('2d');
      }

      function snapshot() {
         // Draws current image from the video element into the canvas
        ctx.drawImage(video, 0,0, canvas.width, canvas.height);
      }*/


		/*(function() {
  // The width and height of the captured photo. We will set the
  // width to the value defined here, but the height will be
  // calculated based on the aspect ratio of the input stream.

  var width = 320;    // We will scale the photo width to this
  var height = 0;     // This will be computed based on the input stream

  // |streaming| indicates whether or not we're currently streaming
  // video from the camera. Obviously, we start at false.

  var streaming = false;

  // The various HTML elements we need to configure or control. These
  // will be set by the startup() function.

  var video = null;
  var canvas = null;
  var photo = null;
  var startbutton = null;

  function startup() {
    video = document.getElementById('video');
    canvas = document.getElementById('canvas');
    photo = document.getElementById('photo');
    startbutton = document.getElementById('startbutton');

    navigator.mediaDevices.getUserMedia({video: true, audio: false})
    .then(function(stream) {
      video.srcObject = stream;
      video.play();
    })
    .catch(function(err) {
      console.log("An error occurred: " + err);
    });

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
      
        // Firefox currently has a bug where the height can't be read from
        // the video, so we will make assumptions if this happens.
      
        if (isNaN(height)) {
          height = width / (4/3);
        }
      
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    startbutton.addEventListener('click', function(ev){
      takepicture();
      ev.preventDefault();
    }, false);
    
    clearphoto();
  }

  // Fill the photo with an indication that none has been
  // captured.

  function clearphoto() {
    var context = canvas.getContext('2d');
    context.fillStyle = "#AAA";
    context.fillRect(0, 0, canvas.width, canvas.height);

    var data = canvas.toDataURL('image/png');
    photo.setAttribute('src', data);
  }
  
  // Capture a photo by fetching the current contents of the video
  // and drawing it into a canvas, then converting that to a PNG
  // format data URL. By drawing it on an offscreen canvas and then
  // drawing that to the screen, we can change its size and/or apply
  // other changes before drawing it.

  function takepicture() {
    var context = canvas.getContext('2d');
    if (width && height) {
      canvas.width = width;
      canvas.height = height;
      context.drawImage(video, 0, 0, width, height);
    
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);

    } else {
      clearphoto();
    }
  }

  // Set up our event listener to run the startup process
  // once loading is complete.
  window.addEventListener('load', startup, false);
})();*/
		
		/*for(;;)
		{
			setInterval(function()
			{
				
			}, 5000);
		}*/
		
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
