<!DOCTYPE html>
<html>

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>New Vote System App</title>
<link href="newvotes.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>

<style>

body {
    background-image:url("banner.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}

</style>

<body>

<nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
<div class="w3-container w3-theme-d2">
  <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
  <br>
  <div class="w3-padding w3-center">
    <img class="w3-circle" src="banner.webp" alt="app" style="width:40%">
  </div>
</div>
<a class="w3-bar-item w3-button" href="mypollvote.php">Home</a>
<a class="w3-bar-item w3-button" href="register.php">Register</a>
<a class="w3-bar-item w3-button" href="login.php">Login</a>
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
			
      <a href="login.php"><i class="fas fa-poll-h"></i>Polls</a>
			<a href="register.php"><i class="fas fa-user"></i>Register</a>
			<a href="login.php"><i class="fas fa-user"></i>Login</a>
      <a href="logout.php"><i class="fas fa-user"></i>Logout</a>
    	</div>

    </nav>

</body>
</html>

<?php

include 'functions.php';
$pdo = pdo_connect_mysql();
?>

<h1 class="center">Welcome/Tervetuloa!</h1>
<p class="center">Hei ystävät! Tervetuloa omalle sivulleni luomaan kysymyksiä ja äänestyksiä.</p> 

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
  <p>By Raimo Jämsén Data2019C</p>
</div>