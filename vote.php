<?php
include 'functions.php';

$pdo = pdo_connect_mysql();

if (isset($_GET['id'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($poll) {
        
        $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ?');
        $stmt->execute([$_GET['id']]);
       
        $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
       
        if (isset($_POST['poll_answer'])) {
            
            $stmt = $pdo->prepare('UPDATE poll_answers SET votes = votes + 1 WHERE id = ?');
            $stmt->execute([$_POST['poll_answer']]);
          
            header ('Location: result.php?id=' . $_GET['id']);
            exit;
        }
    } else {
        die ('Poll with that ID does not exist.');
    }
} else {
    die ('No poll ID specified.');
}
?>

<head>

<meta charset="utf-8">
<title>New Vote System App</title>
<link href="newvotes.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

</head>

<style>

body {
    background-image:url("banner.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}

html {
    height: 100%
}

</style>

<div class="content poll-vote">
	<h2><?=$poll['title']?></h2>
	<p><?=$poll['desc']?></p>
    <form action="vote.php?id=<?=$_GET['id']?>" method="post">
        <?php for ($i = 0; $i < count($poll_answers); $i++): ?>
        <label>
            <input type="radio" name="poll_answer" value="<?=$poll_answers[$i]['id']?>"<?=$i == 0 ? ' checked' : ''?>>
            <?=$poll_answers[$i]['title']?>
        </label>
        <?php endfor; ?>
        <div>
            <input type="submit" value="Vote">
            <a href="result.php?id=<?=$poll['id']?>">View Result</a>
        </div>
    </form>
</div>