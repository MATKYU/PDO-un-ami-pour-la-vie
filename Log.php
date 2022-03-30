<?php 

require 'connec.php';

$pdo = new PDO(DSN, USER, PASS);

$statement = $pdo->query("SELECT * FROM friend");
$friends = $statement->fetchAll();

foreach ($friends as $friend) {
    echo $friend['firstname'];
    echo $friend['lastname'] . '<br>';
}
