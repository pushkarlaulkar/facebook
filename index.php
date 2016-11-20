<!DOCTYPE html>
<html>
	<head>
		<!--<meta http-equiv="refresh" content="5; URL=/intern.html">-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Internship</title>
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Quicksand:300,700" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-1.2.6.pack.js"></script>
		<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
	</head>
	<body>
		<p>Pucho Web Development Internship</p>
		<input id="facebook" value = "Sign in with Facebook" onclick = "login()" readonly>
		<div class='slider'>
			<div class='slide1'></div>
			<div class='slide2'></div>
			<div class='slide3'></div>
		</div>
		<hr>
		<div id = "formpost">
			<aside class="q-question">
				<form method = "post" action = "" onsubmit = "return false;">
				<textarea id = "texta" font-weight="200" name = "parea" cols="30" rows="7" autofocus></textarea>
				<input name = "postbutton" type = "submit" id = "post" value = "POST" onclick = "done()">
				<input name = "dbname" type = "text" id = "user" readonly>
				</form>
			</aside>
			<!--<button id = "post" type = "submit" class="clickr" name = "postbutton">Post</button>-->
			<button id = "cancel" class="clickr" onclick = "reset()">Cancel</button>
		</div>
		<hr>
		<center>
			<h2>Posts</h2>
			<div id = "ani"></div>
		</center>
		<script>
			window.fbAsyncInit = function() {
				FB.init({
				appId      : '793557890783685',
				xfbml      : true,
				version    : 'v2.6'
				});
				FB.getLoginStatus(function(response) {
					if(response.status === 'connected'){
						document.getElementById('facebook').style.visibility = 'hidden';
						document.getElementById('post').disabled = false;
						document.getElementById('cancel').disabled = false;
						document.getElementById('texta').disabled = false;
						FB.api('/me', function(response) {
							document.getElementById('user').value = response.name;
							var name = response.name;
							alert($("#user").val());
							$.post("loadrecords.php", {
								name1: name,
								}, function(data) {
								$("#ani").prepend(data);
							});
						});
					}
						else{
							document.getElementById('post').disabled = true;
							document.getElementById('cancel').disabled = true;
							document.getElementById('texta').disabled = true;
						}
				});
			};
			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "//connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
			
			function login(){
				FB.login(function(response){
					FB.getLoginStatus(function(response) {
						if(response.status === 'connected'){
							document.getElementById('post').disabled = false;
							document.getElementById('cancel').disabled = false;
							document.getElementById('texta').disabled = false;
							document.getElementById('facebook').style.visibility = 'hidden';
							document.getElementById('texta').focus();
							FB.api('/me', function(response) {
								document.getElementById('user').value = response.name;
								var name = response.name;
								alert($("#user").val());
								$.post("loadrecords.php", {
									name1: name,
									}, function(data) {
									$("#ani").prepend(data);
								});
							});
						}
					});	
				});
			}
			function done(){
				var name = $("#user").val();
				var msg = $("#texta").val();
				if (msg == '')	alert("Write Something dude!!");
				else {
					$("#ani").prepend(msg + "<hr>");
					$.post("insertintotable.php", {
					name1: name,
					msg1: msg
					}, function(data) {
					alert(data);
					});
				}
				document.getElementById('texta').value = "";
				document.getElementById('texta').focus();
			}
			function reset(){
				document.getElementById('texta').value = "";
				document.getElementById('texta').focus();
			}
		</script>
	</body>
</html>

<style>
	@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700);
	.slider {
		width: 1200px;
		height: 500px;
		position: relative;
	}
	.slide1,.slide2,.slide3,.slide4,.slide5 {
		position: absolute;
		width: 100%;
		height: 100%;
	}
	.slide1 {
		background: url(http://i0.wp.com/www.techicy.com/wp-content/uploads/2015/01/indian-flag-photos-hd-wallpapers-download-free.jpg)no-repeat;
		background-size: cover;
		animation:fade 85s infinite;
		-webkit-animation:fade 35s infinite;
	} 
	.slide2 {
		background: url(http://www.hdwallpapers.in/walls/taj_mahal_hd_4k_5k-wide.jpg)no-repeat;
		background-size: cover;
		animation:fade2 85s infinite;
		-webkit-animation:fade2 35s infinite;
	}
	.slide3 {
		background: url(http://wallpapercave.com/wp/jskDo41.jpg)no-repeat;
		background-size: cover;
		animation:fade3 85s infinite;
		-webkit-animation:fade3 35s infinite;
	}
	@keyframes fade{
		0%   {opacity:1}
		33.333% { opacity: 0}
		66.666% { opacity: 0}
		100% { opacity: 1}
	}
	@keyframes fade2{
		0%   {opacity:0}
		33.333% { opacity: 1}
		66.666% { opacity: 0 }
		100% { opacity: 0}
	}
	@keyframes fade3{
		0%   {opacity:0}
		33.333% { opacity: 0}
		66.666% { opacity: 1}
		100% { opacity: 0}
	}
	p{
		font-family: 'Quicksand', sans-serif;
		z-index : 999;
		position : absolute;
		margin-left : 730px;
		margin-top : 20px;
		font-size : 4em;
		color : yellow;
	}
	#facebook{
		z-index : 999;
		position : absolute;
		margin-left : 850px;
		margin-top : 300px;
		padding-right: 45px;
		text-align : center;
		height: 35px;
		border: none;
		background-size: 35px 35px;
		background-position: right center;
		background-repeat: no-repeat;
		border-radius: 4px;
		color: white;
		font-family:"Merriweather Sans", sans-serif;
		font-size: 16px;
		width: 205px;
		border-bottom: 2px solid transparent;
		border-left: 1px solid transparent;
		border-right: 1px solid transparent;
		box-shadow: 0 4px 2px -2px gray;
		text-shadow: rgba(0, 0, 0, .5) -1px -1px 0;
		border-color: #2d5073;
		background-color: #3b5998;
		background-image: url(http://icons.iconarchive.com/icons/danleech/simple/512/facebook-icon.png);
		cursor : pointer;
	}
	#formpost {
		font-family: 'Source Sans Pro', sans-serif;
		background: #313131;
		background-image: url(http://subtlepatterns.com/patterns/debut_dark.png);
		height : 300px;
	}
	.q-question {
		box-sizing: border-box;
		background: fadeout(teal, 20%);
		text-align: center;
		padding-bottom: 2.5em;
		box-shadow: 0px 1px 10px fadeout(black, 50%);
		border-bottom: .25em solid darken(teal, 10%);
		padding: 0 1em 1em;

		form {
			textarea {
			background: transparent;
			border: 1px solid darken(teal, 6.5%);
			border-radius: .25em;
			width: 55%;
			padding: .5em;
			outline: none;
			font-size: 1.25em;
			color:darken(white, 20%); 
			font-family: inherit;
			font-size: inherit;
			font-weight: 200;
			box-shadow:5px 5px 0px darken(teal, 5.5%);
			box-sizing: border-box;

			@media(max-width: 50em){ width: 100%;}
			}  
		}
	}
	.clickr, #post {
		position : relative;
		top :10px;
		border: 1px solid fadeout(tomato, 75%);
		padding: 1em 2em;
		background: transparent;
		color: #eaeaea;
		text-transform: uppercase;
		border-radius: .75em;
		text-align: center;
		display: block;
		width: 200px;
		margin: auto auto;
		margin-top: 2em;
		outline: none;
		cursor : pointer;
		&:hover {
			border: 1px solid fadeout(tomato, 60%);
		}
		&:active{
			background: fadeout(black, 90%);
			outline: none;
		}
	}
	textarea{
		position :relative;
		top :10px;
		border-radius :5px;
	}
	#user{
		text-align : center;
		position : absolute;
		margin-left : -550px;
		margin-top : -187px;
		font-size :1.5em;
		background : fadeout(teal, 20%);
		border-style : hidden; 
	}
	center{
		background: #313131;
		color :white;
	}
</style>
