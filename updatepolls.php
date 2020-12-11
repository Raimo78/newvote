<?php
$host="localhost"; 
$username="root";
$password=""; 
$db_name="phppoll";  
$tbl_name="polls"; 

mysqli_connect("localhost","root","") 
mysql_select_db("phppoll")or die("cannot select DB");

$id=$_GET['id'];

$sql="SELECT * FROM $polls WHERE id='$id'";
$result=mysql_query($sql);

$rows=mysql_fetch_array($result);
?>
<table width="400" border="0" cellspacing="1" cellpadding="0">
<tr>
<form name="form1" method="post" action="update_ac.php">
<td>
<table width="100%" border="0" cellspacing="1" cellpadding="0">
<tr>
<td>&nbsp;</td>
<td colspan="3"><strong>Update data in mysql</strong> </td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
<td align="center">&nbsp;</td>
</tr>
<tr>
<td align="center">&nbsp;</td>
<td align="center"><strong>id</strong></td>
<td align="center"><strong>title</strong></td>
<td align="center"><strong>desc</strong></td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="center"><input name="id" type="text" id="id" value="<? echo $rows['id']; ?>"></td>
<td align="center"><input name="title" type="text" id="title" value="<? echo $rows['title']; ?>" size="15"></td>
<td><input name="desc" type="text" id="desc" value="<? echo $rows['desc']; ?>" size="15"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td><input name="id" type="hidden" id="id" value="<? echo $rows['id']; ?>"></td>
<td align="center"><input type="submit" name="Submit" value="Submit"></td>
<td>&nbsp;</td>
</tr>
</table>
</td>
</form>
</tr>
</table>

<?php

mysql_close();

?>