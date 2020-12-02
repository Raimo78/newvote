<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppoll";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "DELETE FROM users WHERE userid='" . $_GET["userid"] . "'";

    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "
" . $e->getMessage();
    }

$conn = null;

?>