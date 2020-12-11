<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (!empty($_POST)) {
    
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $desc = isset($_POST['desc']) ? $_POST['desc'] : '';
   
    $stmt = $pdo->prepare('UPDATE FROM polls VALUES (NULL, ?, ?)');
    $stmt->execute([$title, $desc]);
   
    $poll_id = $pdo->lastInsertId();
   
    $answers = isset($_POST['answers']) ? explode(PHP_EOL, $_POST['answers']) : '';
    foreach ($answers as $answer) {
        
        if (empty($answer)) continue;
        
        $stmt = $pdo->prepare('UPDATE FROM poll_answers VALUES (NULL, ?, ?, 0)');
        $stmt->execute([$poll_id, $answer]);
    }
   
    $msg = 'Muokattu onnistuneesti!';
}

?>

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

<head>

<meta charset="UTF-8">
<link href="newvotes.css" rel="stylesheet" type="text/css">

</head> 

<div class="content update">
	<h2>Muokkaa kysymystäsi</h2>
    <form action="create.php" method="post">
        <label for="title">Otsikko</label>
        <input type="text" name="title" id="title">
        <label for="desc">Kysymys</label>
        <input type="text" name="desc" id="desc">
        <label for="answers">Vastaukset (riviä kohden)</label>
        <textarea name="answers" id="answers"></textarea>
        <input type="submit" value="Luo kysymyksesi">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>

<?php
  header( "refresh:70;url=votepoll.php" );
  echo 'You\'ll be redirected in about 70 secs. If not, click <a href="votepoll.php">here</a>.';
?> 