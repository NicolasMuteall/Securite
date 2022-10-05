<?php 
    session_start();
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
    <?php
        if(!empty($_SESSION['pseudo'])){ 
    ?>
            <p>Bonjour <?= $_SESSION['pseudo'] ?></p>
            <form action="page3.php" method="post">
                <input type="text" name="nom" placeholder="nom"><br>
                <input type="text" name="age" placeholder="age"><br>
                <input type="submit" name="submit">
            </form>
            <a href="deconnect.php">Déconnexion</a>

        <?php }else {
            
            header('Location: index.php');
        }
        ?>
</body>
</html>

