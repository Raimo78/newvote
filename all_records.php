<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
  <meta charset="UTF-8">
  <meta name="description" content="Free">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="Raimo Jämsén">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

<h2>Polls Details</h2>

<table border="2">
  <tr>
    <td>id</td>
    <td>title</td>
    <td>question</td>
    <td>Edit</td>
  </tr>

<?php

include "dbcon.php";

header('Content-type: text/html; charset=utf-8');

$records = mysqli_query($db,"select * from polls"); 

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['title']; ?></td>
    <td><?php echo $data['question']; ?></td>    
    <td><a href="editandupdate.php?id=<?php echo $data['id']; ?>">Edit</a></td>
  </tr>	
<?php
}
?>
</table>

<style>

.center {
  text-align: center;
  color: blue;
  font-size: 40px;
}

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
<p>Tervetuloa!</p>
<p>By Raimo Jämsén Data2019C</p>
</div>

</body>
</html>