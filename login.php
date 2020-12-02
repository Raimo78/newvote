<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>

<nav class="w3-sidebar w3-bar-block w3-card" id="mySidebar">
<div class="w3-container w3-theme-d2">
  <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large">X</span>
  <br>
  <div class="w3-padding w3-center">
    <img class="w3-circle" src="banner.webp" alt="app" style="width:20%">
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

<?php

    require('db.php');
    session_start();
    
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);   
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            
            header("Location: votepoll.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>

<style>

body {
    background-image:url("register.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}

form {

   background-color: yellow;
   border: none;
   color: blue;
   font-size: 1em;
   padding: 10px 50px;
   text-transform: uppercase;
   font-weight: normal;
}

</style>

    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register.php">New Registration</a></p>
  </form>

<?php
    }
?>

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
</div>

</body>
</html>