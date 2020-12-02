 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phppoll";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "DELETE FROM polls WHERE id>=1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38";

  $conn->exec($sql);
  echo "Record deleted successfully!";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;

include 'votepoll.php';
?> 