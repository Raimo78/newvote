<?php
session_start();
$id = $_SESSION["id"];
$con = mysqli_connect('localhost','root','','phppoll') or die('Unable To connect');
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT *from users WHERE name='" . $id . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query($con,"UPDATE student set password='" . $_POST["newPassword"] . "' WHERE name='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Password Change</title>
<meta charset="UTF-8">
<meta name="description" content="Free Web">
<meta name="keywords" content="HTML,CSS,XML,JavaScript">
<meta name="author" content="Raimo Jämsén">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<style>

body {
    background-image:url("question.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}

</style>

<body>

<h3 align="center">CHANGE PASSWORD</h3>
<div><?php if(isset($message)) { echo $message; } ?></div>

<form method="post" action="" align="center">
Current Password:<br>
<input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
<br>
New Password:<br>
<input type="password" name="newPassword"><span id="newPassword" class="required"></span>
<br>
Confirm Password:<br>
<input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
<br><br>
<input type="submit">
</form>
<br>=
<br>

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