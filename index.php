<?php

// Start
require 'connec.php';

$pdo = new PDO(DSN, USER, PASS);


// // Step 1
// $query = "SELECT * FROM friend";
// $statement = $pdo->query($query);
// $friends = $statement->fetchAll();


// Step 3
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);

    $query = 'INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)';
    $statement = $pdo->prepare($query);

    $statement->bindValue(':firstname', $firstname, \PDO::PARAM_STR);
    $statement->bindValue(':lastname', $lastname, \PDO::PARAM_STR);

    $statement->execute();

    $friends = $statement->fetchAll();
    var_dump($_POST);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form method="POST" novalidate>
        <label for="firstname">Firstname</label>
        <input type="text" id="firstname" name="firstname" required>

        <label for="lastname">Lastname</label>
        <input type="text" id="lastname" name="lastname" required>

        <button>Ajouter</button>
    </form>

</body>

</html>