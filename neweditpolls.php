<?php

error_reporting(E_ALL ^ E_NOTICE);
ini_set("display_errors", 1);

require ('db.php');

if($id = isset($_GET['polls']))
{
$query = "SELECT `prodID`, `product`, `prod_descr`, `image`, `price` FROM product WHERE `prodID`='{$_GET['prodID']}'";
$r = mysqli_query($dbc, $query);

$showHeader = true;
echo "<div id='right'>";

while($row = mysqli_fetch_array($r))
{
if($showHeader)
{
        
echo "<h1>" . "<span>" . "# " . "</span>" . $row['product'] .  "<span>" . " #" . "</span>" . "</h1>";

echo "<div id='item'>"; 

echo "<div class='item_left'>";

echo "<p>";
echo $row['prod_descr'];
echo "</p>";

echo "<p>";
echo "&pound" . $row['price'];
echo "</p>";

echo "</div>";

echo "<div class='item_right'>";

$showHeader = false;


echo "<br />";
echo "You may also like....";
echo $row['product'];

echo "</div>";

}
}

?>

<p>

<input type="hidden" name="item_name" value="<?php echo $row['product']; ?>">
<input type="hidden" name="item_number" value="<?php echo $row['prodID']; ?>">
<input type="hidden" name="amount" value="<?php echo $row['price'] ?>" />

</form>
</p>

<?php

echo "</div>"; 

echo "</div>";

}

?>