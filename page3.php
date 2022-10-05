<?php 
    session_start();
    if(!empty($_SESSION['pseudo'])){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php var_dump($_POST, $_SESSION['pseudo']); ?>
    <a href="deconnect.php">Déconnexion</a>
</body>
</html>
    <?php 
    }else{
        header('Location: index.php');
    }
    ?>