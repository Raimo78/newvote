<?php include('db.php') ?>

<!DOCTYPE html>
<html>

<head>
<title>Registration system</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="register.css">

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

<body>

<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a class="active" href="mypollvote.php">Home</a>
    <a class="contact" href="contactme.html">Contact</a>
    <a class="about" href="aboutme.html">About</a>
  </div>
</div>

<div style="padding-left:20px">
  <h1>Please Register as a user</h1>
</div>
</head>

<style>

body {
    background-image:url("register.webp");
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

  <div class="header">
  	<h2>Sign Up</h2>
  </div>

  <form method="post" action="register.php">
  <?php include('error.php'); ?>
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" placeholder="User Name" required="required">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" placeholder="Email" required="required">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password" required="required" placeholder="Password">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="confirm_password" placeholder="Confirm Password" required="required">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="registerNewUser">Register</button>
  	</div>
  	<div>
  		Already have an account?
			<a class="right" href="login.php">Login</a>
			<a href="changelogin.php"><i class="fas fa-user"></i>Change Password</a>
      		<a href="forgotpw.php"><i class="fas fa-user"></i>Forgot Password</a>
  	</div>
  </form>

<style>

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
<iframe src="audiovote/register.mp3" allow="autoplay" id="audio/mp3"></iframe>
</div>

</body>
</html>