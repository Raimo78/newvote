<?php

include('db.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))

{

$id = $_GET['id'];

$result = mysql_query("DELETE FROM polls WHERE id=$id")

or die(mysql_error());

header("Location: votepoll.php");

}

else

{

header("Location: votepoll.php");

}

?>