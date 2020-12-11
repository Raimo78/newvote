 <?php
if (!isset($_GET['id'])){
  die('Ei voi poistaa');
}
 $id = $_GET['id'];

include 'votepoll.php';
?> 

<div class="content delete">
	<h2>Delete Poll #<?=$poll['id']?></h2>
    
	<p>Are you sure you want to delete poll #<?php echo $id; ?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?php echo $id ?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?php echo $id ?>&confirm=no">No</a>
    </div>

</div>

<?php
  echo 'You\'ll be redirected in about 15 secs. If not, click <a href="votepoll.php">here</a>.';
?> 