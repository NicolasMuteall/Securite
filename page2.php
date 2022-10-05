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
            <a href="page3.php">Déconnexion</a>

        <?php }else {
            
            echo "C'est qui ?";
        }
        ?>
</body>
</html>

