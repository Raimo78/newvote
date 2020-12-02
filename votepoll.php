<?php
include 'functions.php';

$pdo = pdo_connect_mysql();

$stmt = $pdo->query('SELECT p.*, GROUP_CONCAT(pa.title ORDER BY pa.id) AS answers FROM polls p LEFT JOIN poll_answers pa ON pa.poll_id = p.id GROUP BY p.id');
$polls = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<head>

<meta charset="UTF-8">
<link href="newvotes.css" rel="stylesheet" type="text/css">

</head>

<style>

body {
    background-image:url("banner.webp");
    background-repeat: repeat;
    background-size: 100% 100%;
}

html {
    height: 100%
}

h2.headertekst {
  text-align: center;
  font-size: 50px;
}

</style>

<html>
<body>

<div class="content home">
    <h2 class="headertekst">Kysymykset</h2>
    <img src="poll.webp" alt="poll" width="70" height="70">
	<p>Tervetuloa hakemistosivulle, voit tarkastella alla olevaa luetteloa kyselyistä. Voit äänestää kysymyksiä, lisäksi voit poistaa kysymyksiä.</p>
	<a href="create.php" class="create-poll">Luo uusi kysymys</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Otsikko</td>
				<td>Vastaukset</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($polls as $poll): ?>
            <tr>
                <td><?=$poll['id']?></td>
                <td><?=$poll['title']?></td>
				<td><?=$poll['answers']?></td>
                <td class="actions">
					<a href="vote.php?id=<?=$poll['id']?>" class="view" title="View Poll"><i class="fas fa-eye fa-xs"></i></a>
                    <a href="deletepoll.php?id=<?=$poll['id']?>" class="trash" title="Delete Poll"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>

.footer {
   position: left;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: blue;
   color: white;
   text-align: center;
}

</style>

<div class="footer">
  <p>By Raimo Jämsén Data2019C 1.12.2020</p>
</div>

</body>
</html>