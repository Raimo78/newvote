<?php
include 'votepoll.php';
$pdo = pdo_connect_mysql();
$msg = '';

if (isset($_GET['id'])) {
    
    $stmt = $pdo->prepare('SELECT * FROM polls WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $poll = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$poll) {
        die ('Poll doesn\'t exist with that ID!');
    }
   
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            
            $stmt = $pdo->prepare('DELETE FROM polls WHERE id = ?');
            $stmt->execute([$_GET['id']]);
           
            $stmt = $pdo->prepare('DELETE FROM poll_answers WHERE poll_id = ?');
            $stmt->execute([$_GET['id']]);
           
            $msg = 'You have deleted the poll!';
        } else {
            
            header('Location: votepoll.php');
            exit;
        }
    }
} else {
    die ('No ID specified!');
}
?>