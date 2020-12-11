<?php

include "dbcon.php"; 

header('Content-type: text/html; charset=utf-8');

$id = $_GET['id']; 

$qry = mysqli_query($db,"select * from polls where id='$id'"); 

$data = mysqli_fetch_array($qry); 

if(isset($_POST['update'])) 
{
    $id = $_POST['id'];
    $title = $_POST['title'];
    $question = $_POST['question'];
	
    $edit = mysqli_query($db,"update polls set title='$title', question='$question' where id=$id");
    
    if($edit)
    {
        mysqli_close($db); 
        header("location:votepoll.php"); 
        exit;
    }
       	
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Polls Details</title>
<meta charset="UTF-8">
  <meta name="description" content="Free">
  <meta name="keywords" content="HTML, CSS, JavaScript">
  <meta name="author" content="Raimo Jämsén">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="dashboard.css">
</head>

<body>

<h3>Update Polls Data</h3>

<form method="POST">
  <input type="text" name="id" value="<?php echo $data['id'] ?>" placeholder="Enter id" Required>
  <input type="text" name="title" value="<?php echo $data['title'] ?>" placeholder="Enter title" Required>
  <input type="text" name="question" value="<?php echo $data['question'] ?>" placeholder="Enter question" Required>
  <input type="submit" name="update" value="Update">
</form>

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

<?php

$refreshvalue = 45;
echo '<meta http-equiv="refresh" content="' . $refreshvalue . '; url=\'mypollvote.php\'"/>';

?>