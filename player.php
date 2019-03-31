<!DOCTYPE html>
<html>
<head>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jplayer/2.9.2/add-on/jplayer.playlist.min.js" type="text/javascript" ></script> !-->
	<link href="stylesheets/player.css" type="text/CSS" rel="stylesheet" />
</head>
<body>
	<div id="grey_mask" ></div>
	<nav class="topbar_container" >
		<nav class="topbar" >
			<button id="sense" class="button" style="position: relative" >Sense Emotion</button>
			<a href="" ><div class="button" >Random Song</div></a>
		</nav>
	</nav>
	<div id="sense_window" >
		<div class="title" >Choose Method</div>
		<div class="left_container" >
			<div class="label" >Select Mood</div>
			<div class="emoji_list" >
				<img src="images/happy.png" class="button" >
				<img src="images/sad.png" class="button" >
				<img src="images/angry.png" class="button" >
				<img src="images/bored.png" class="button" >
			</div>
		</div>
		<div class="right_container">
			<div class="label" >Scan From Camera</div>
			<div class="button" >Scan</div>
		</div>
	</div>
	<div class="maincontainer" >
		<div class="leftcontainer" >
			<div class="player" >
				<marquee class="song_title" scrolldelay="40" truespeed=true >Playing: The Chainsmokers - Everybody hates me</marquee>
				<img class="visualizer" src="images/scene3.jpg" >
				<audio controls src="music/1.mp3" class="controls" >Your browser doesn't allow this feature</audio>
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
		var grey_mask = document.getElementById("grey_mask");
		
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
		
	</script>
	
</body>
</html>
