<?php
include_once 'db.php';
if(count($_phppoll)>0) {
mysqli_query($conn,"UPDATE polls set pollsid='" . $_POST['pollsid'] . "', title='" . $_POST['title'] . "', desc='" . $_POST['desc'] .  "' WHERE pollsid='" . $_POST['pollsid'] . "'");
$message = "Record Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM polls WHERE pollsid='" . $_GET['pollsid'] . "'");
$row= mysqli_fetch_array($result);

?>

<html>
<head>
<title>Update Polls Data</title>
</head>

<body>

<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="votepoll.php">Polls List</a>
</div>
Polls ID: <br>
<input type="hidden" name="pollsid" class="txtField" value="<?php echo $row['pollsid']; ?>">
<input type="text" name="pollsid"  value="<?php echo $row['pollsid']; ?>">
<br>
Title: <br>
<input type="text" name="title" class="txtField" value="<?php echo $row['title']; ?>">
<br>
Desc :<br>
<input type="text" name="desc" class="txtField" value="<?php echo $row['desc']; ?>">
<br>
<input type="submit" name="submit" value="Submit" class="buttom">

</form>

</body>
</html>