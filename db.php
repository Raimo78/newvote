<?php
$server="localhost";
$username="root";
$password="";
$database_name="phppoll";
$errors = array();
$con = mysqli_connect($server, $username, $password, $database_name);
if($con){
    if (isset($_POST['registerNewUser'])) {
        
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
        
        if (empty($username)) {
        array_push($errors, "Username is required");
        }
        if (empty($email)) {
        array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
            }
        if ($password != $confirm_password) {
            array_push($errors, "Failed to Match");
        }
            
        $get_all = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $get_all);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
        if ($user['username'] === $username) {
            array_push($errors, "Username is already existed");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email is already existed");
        }
        }

        if (count($errors) == 0) {
            $pwd = md5($password);

            $register = "INSERT INTO users (username, email, password)
                    VALUES('$username', '$email', '$pwd')";
            mysqli_query($con, $register);
            header('Location: login.php');
        }
    }

} ?>