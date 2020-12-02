 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppoll";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?> 