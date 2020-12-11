<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppoll";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE polls SET title='desc' WHERE id=49";

$stmt = $conn->prepare($sql);

$stmt->execute();

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?> 