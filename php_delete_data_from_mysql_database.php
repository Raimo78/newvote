<?php

if(isset($_POST['delete']))
{
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "phppoll";
    
    $id = $_POST['id'];
    
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    $query = "DELETE FROM `users` WHERE `id` = $id";
    
    $result = mysqli_query($connect, $query);
    
    if($result)
    {
        echo 'Data Deleted';
    }else{
        echo 'Data Not Deleted';
    }
    mysqli_close($connect);
}

header("Location: votepoll.php");

?>