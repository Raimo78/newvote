<!DOCTYPE html>
<html>
<head>
<title></title>
<link href="newvotes.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Edit Polls</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click On Menu</p>
<?php
$connection = mysql_connect("localhost", "root", "", "phppoll"
$db = mysql_select_db("polls", $connection);
if (isset($_GET['submit'])) {
$id = $_GET['did'];
$name = $_GET['dtitle'];
$email = $_GET['desc'];
$query = mysql_query("update polls set
employee_name='$name', employee_email='$email', employee_contact='$mobile',
employee_address='$address' where employee_id='$id'", $connection);
}
$query = mysql_query("select * from employee", $connection);
while ($row = mysql_fetch_array($query)) {
echo "<b><a href='updatephp.php?update={$row['employee_id']}'>{$row['employee_name']}</a></b>";
echo "<br />";
}
?>
</div>

<?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysql_query("select * from polls where polls_id=$update", $connection);
while ($row1 = mysql_fetch_array($query1)) {
echo "<form action='form' method='get'>";
echo "<h2>Muokkaa</h2>";
echo "<hr/>";
echo"<input class='input' type='hidden' name='polls_id' value='{$row1['polls_id']}' />";
echo "<br />";
echo "<label>" . "Title:" . "</label>" . "<br />";
echo"<input class='input' type='text' title='dname' value='{$row1['polls_title']}' />";
echo "<br />";
echo "<label>" . "Desc:" . "</label>" . "<br />";
echo"<input class='input' type='text' name='ddesc' value='{$row1['polls_desc']}' />";
echo "<br />";
echo "<input class='submit' type='submit' name='submit' value='update' />";
echo "</form>";
}
}

if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfuly......!!</span></div>';
}
?>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
</div><?php
mysql_close($connection);
?>
</body>
</html>