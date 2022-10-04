<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sécurité</title>
</head>
<body>
    <?php include('Connect.php'); ?>
    <table>
        <form action="" method="post">
            <tr>
                <td><input type="text" name="pseudo" placeholder="pseudo"></td>
            </tr>
            <tr>
                <td><input type="password" name="password" placeholder="mot de passe"></td>
            </tr>
            <tr><td><input type="submit" name="submit"></td></tr>
        </form>
    </table>
    <?php
         if(isset($_POST['submit'])){
            if(isset($_POST['pseudo']) && isset($_POST['password'])){
                $pseudo = utf8_decode($_POST['pseudo']);
                $password = $_POST['password'];

                $reponse = $cnx->query('select * from user where pseudo = "'.$pseudo.'" and password = "'.$password.'"');
                $results = $reponse->fetchall(PDO::FETCH_OBJ);

                var_dump($results, $pseudo, $password);
            }
         }
    ?>
</body>
</html>