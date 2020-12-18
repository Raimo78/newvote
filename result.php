<?php
include 'functions.php';
header('Content-type: text/html; charset=utf-8');
$pdo = pdo_connect_mysql();

if (isset($_GET['id'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);
   
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($poll) {
        
        $stmt = $pdo->prepare('SELECT * FROM poll_answers WHERE poll_id = ? ORDER BY votes DESC');
        $stmt->execute([$_GET['id']]);
        
        $poll_answers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $total_votes = 0;
        foreach ($poll_answers as $poll_answer) {
            
            $total_votes += $poll_answer['votes'];
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

<svg id="animated" viewbox="0 0 100 100">
  	<circle cx="50" cy="50" r="45" fill="#FDB900"/>
  	<path fill="none" stroke-linecap="round" stroke-width="5" stroke="#fff"
        stroke-dasharray="251.2,0"
        d="M50 10
           a 40 40 0 0 1 0 80
           a 40 40 0 0 1 0 -80">
<animate attributeName="stroke-dasharray" from="0,251.2" to="251.2,0" dur="5s"/>           
</path>
<text id="count" x="50" y="50" text-anchor="middle" dy="7" font-size="20">100%</text>
</svg>

<script>

var count = $(('#count'));
$({ Counter: 0 }).animate({ Counter: count.text() }, {
  duration: 5000,
  easing: 'linear',
  step: function () {
    count.text(Math.ceil(this.Counter)+ "%");
  }
});

</script>

<h2>Äänestyksen tulokset olkaa hyvä!</h2>
<img src="jpg/results.jpg" alt="Trulli" width="500" height="333">
</head>

<style>

* {box-sizing: border-box;}

body {
    background-image:url("banner.webp");
    background-repeat: no-repeat;
    background-size: 100% 100%;
}
html {
    height: 100%
}

body{text-align:center;font-family: 'Open Sans', sans-serif;}
svg{width:25%;}

.header {
  overflow: hidden;
  background-color:blue;
  padding: 20px 10px;
}

.header a {
  float: left;
  color: black;
  text-align: center;
  padding: 10px;
  text-decoration: none;
  font-size: 18px; 
  line-height: 25px;
  border-radius: 4px;
}

.header a.logo {
  font-size: 25px;
  font-weight: bold;
}

.header a:hover {
  background-color: blue;
  color: black;
}

.header a.active {
  background-color: dodgerblue;
  color: white;
}

.header-right {
  float: right;
}

@media screen and (max-width: 450px) {
  .header a {
    float: none;
    display: block;
    text-align: left;
  }
  
  .header-right {
    float: none;
  }
}
</style>

<div class="content poll-result">
	<h2><?=$poll['title']?></h2>
	<p><?=$poll['question']?></p>
    <div class="wrapper">
        <?php foreach ($poll_answers as $poll_answer): ?>
        <div class="poll-question">
            <p><?=$poll_answer['title']?> <span>(<?=$poll_answer['votes']?> Votes)</span></p>
            <div class="result-bar" style= "width:<?=@round(($poll_answer['votes']/$total_votes)*100)?>%">
         <?=@round(($poll_answer['votes']/$total_votes)*100)?>%
       </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php

$query = "SELECT SUM(`poll_answers`) AS `ORDER BY` FROM `poll_answers`"; 

echo "Total $total_votes" . number_format($row['total_votes'], 2, ',')."<br>";

?>

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
  <iframe src="audiovote/results.mp3" allow="autoplay" id="audio/mp3"></iframe>
  <p>By Raimo Jämsén Data2019C</p>
</div>

<?php

$refreshvalue = 30;
echo '<meta http-equiv="refresh" content="' . $refreshvalue . '; url=\'mypollvote.php\'"/>';

?>