<?php 
    session_start();
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
        $_SESSION['pseudo'] = $_POST['pseudo'];
        var_dump($_SESSION['pseudo']);
        header('Location: page2.php');
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
    <form action="" method="post">
        <input type="text" name="pseudo" placeholder="pseudo">
        <input type="submit" value="valider">
    </form>
    <a href="page2.php">page2</a>
    <a href="page3.php">page3</a>
</body>
</html>
