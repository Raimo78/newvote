<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Vote System App</title>
<link href="newvotes.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

<script>
function setCookie(cname,cvalue,exdays) {
  var d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  var expires = "expires=" + d.toGMTString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function checkCookie() {
  var user=getCookie("yourname");
  if (user != "") {
    alert("Welcome again " + user);
  } else {
     user = prompt("Please enter your name:","");
     if (user != "" && user != null) {
       setCookie("yourname", user, 30);
     }
  }
}
</script>

<body onload="checkCookie()"></body>

<style>

* {box-sizing: border-box;}

body { 
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.header {
  overflow: hidden;
  background-color: blue;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 12px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: #ddd;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

.header img {
  float: left;
  width: 100px;
  height: 100px;
  background: #555;
}

.header h1 {
  position: relative;
  top: 18px;
  left: 10px;
}

@media screen and (max-width: 500px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>
</head>

<body>

<div class="header">
  <a href="jpg/vote.jpg" class="logo">My New Vote App</a>
  <img src="img/vote.jpg" alt="logo" />
  <div class="header-right">
    <a class="active" href="mypollvote.php">Home</a>
    <a class="contact" href="contactme.html">Contact</a>
    <a class="about" href="aboutme.html">About</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Please Register as a user</h1>
</div>

<style>

body {
    background-image:url("banner.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}

.fullwidth {
    position: relative;
    width: 100%;
 }
.bg-left {
    background: blue; 
    left: 0;
    top: 0;
    bottom: 0;
    position: absolute;
    width: 50%;
}
.bg-right {
    right: 0;
    top: 0;
    bottom: 0;
    background: red; 
    position: absolute;
    width: 50%;
}

</style>

<body>

<div class="fullwidth">
    <div class="bg-left"></div>
    <div class="bg-right"></div>    

    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                My Vote System App
            </div>
            <div class="col-xs-6">
                Insert right side content here...
            </div>
        </div>
    </div>
</div>

<nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
<div class="w3-container w3-theme-d2">
  <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
  <br>
  <div class="w3-padding w3-center">
    <img class="w3-circle" src="banner.webp" alt="app" style="width:40%">
  </div>
</div>
<a class="w3-bar-item w3-button" href="mypollvote.php">Home</a>
<a class="w3-bar-item w3-button" href="contactme.html">Contact</a>
<a class="w3-bar-item w3-button" href="aboutme.html">About</a>
<a class="w3-bar-item w3-button" href="register.php">Register</a>
<a class="w3-bar-item w3-button" href="login.php">Login</a>
<a class="w3-bar-item w3-button" href="adminlogin.php">AdminLogin</a>
</nav>

<header class="w3-bar w3-card w3-theme">
  <button class="w3-bar-item w3-button w3-xxxlarge w3-hover-theme" onclick="openSidebar()">&#9776;</button>
  <h1 class="w3-bar-item">Activities</h1>
</header>

<script>
closeSidebar();
function openSidebar() {
  document.getElementById("mySidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

    <nav class="navtop">

    	<div>

    	<h2>My Voting System Demo</h2><p>This is free to develop, please!</p>
      
      <a href="freecreatepolls.php"><i class='fas fa-poll-h' style='font-size:48px;color:red'></i>Freely create a question</a>
      <a href="register.php"><i class="fas fa-poll-h"></i>Free Polls</a>
      <a href="login.php"><i class="fas fa-poll-h"></i>Polls</a>
			<a href="register.php"><i class="fas fa-user"></i>Register</a>
			<a href="login.php"><i class="fas fa-user"></i>Login</a>
      <a href="logout.php"><i class="fas fa-user"></i>Logout</a>
      <a href="dashboard.php"><i class="fas fa-user"></i>Adminlogin</a>
    	</div>

    </nav>

</body>
</html>

<?php

include 'functions.php';
$pdo = pdo_connect_mysql();
?>

<h1 class="center">Tervetuloa!Welcome!</h1>
<p class="center">Hei minun ystävät! Tervetuloa omalle sivulleni luomaan kysymyksiä ja äänestyksiä.</p>
<p class="center">Hello my friends! Welcome to my page to create questions and polls.</p> 

<style>

.center {
  text-align: center;
  color: blue;
  font-size: 40px;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: blue;
   color: white;
   text-align: center;
}

</style>

<div class="footer">
<p>Tervetuloa!</p>

<iframe src="audiovote/voteaudio.mp3" allow="autoplay" id="audio/mp3"></iframe>
  <p>By Raimo Jämsén Data2019C</p>
</div>