<?php 
    session_start();
    var_dump($_SESSION['pseudo']);
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
    <p>Bonjour <?= $_SESSION['pseudo'] ?></p>
    <a href="page3.php">page3</a>
</body>
</html>

