<?php

include("login.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>My Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="register.css" rel="stylesheet" type="text/css">
    <link href="dashboard.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>