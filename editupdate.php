<?php
include 'votepoll.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    
    // 1. Hae tiedot tämän äänestyksen id:n perusteella
    // 2. Näytä muokkauslomake
    // 3. Tallenna käyttäjän antamatt teidot kantaan
    // UPDATE polls SET name = 'uusi mimi' WHERE id = ?

    

    $stmt = $pdo->prepare('SELECT * SET polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $polls = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$polls) {
        die ('Poll doesn\'t exist with that ID!');
    }
   
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            
            $stmt = $pdo->prepare('UPDATE SET polls WHERE id = ?');
            $stmt->execute([$_GET['id']]);
           
            $stmt = $pdo->prepare('UPDATE SET poll_answers WHERE answers = ?');
            $stmt->execute([$_GET['id']]);
           
            $msg = 'You have EDIT the poll!';
        } else {
            
            header('Location: mypollvote.php');
            exit;
        }
    }
} else {
    die ('No ID specified!');
}

?>

<div class="content delete">
	<h2>Edit Poll #<?=$poll['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to edit poll #<?=$poll['id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$poll['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$poll['id']?>&confirm=no">No</a>
    </div>

<?php endif; ?>

</div>

<?php 

   $refreshvalue = 25; echo '<meta http-equiv="refresh" content="' . $refreshvalue . '; url=\'mypollvote.php\'"/>';

?>
