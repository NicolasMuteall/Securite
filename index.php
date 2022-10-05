<?php 
    session_start();
    include('Connect.php');
    
    //Connexion

    if(isset($_POST['submit'])){ 
        
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
            $_SESSION['pseudo'] = htmlentities($_POST['pseudo']);
            $password = $_POST['mdp'];
            
            $reponse = $cnx->prepare('select * from user where pseudo = "'.htmlentities($_POST['pseudo']).'"');
            $reponse -> bindvalue('pseudo', $_POST['pseudo']);
            $reponse -> execute();
            $results = $reponse->fetch(PDO::FETCH_ASSOC);
            var_dump($results);

            if($results){
                $passwordHash = $results['password'];
                if(password_verify($password, $passwordHash)){
                    echo 'connexion reussie';
                    header('Location: page2.php');
                }else{
                    echo 'identifiants invalide';
                }
            }else{
                echo 'identifiants invalide';
                /*header('Location: index.php')*/;
            }
            
        }
    }

    //Inscription

    if(isset($_POST['submit2'])){ 
        
        if(!empty($_POST['pseudo2']) && !empty($_POST['mdp2'])){
            $_SESSION['pseudo'] = htmlentities($_POST['pseudo2']);
            $password2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);

            var_dump($_POST['mdp2'], $password2);
            
            $q = $cnx->prepare('INSERT INTO user (pseudo, password) VALUES ("'.htmlentities($_POST['pseudo2']).'", "'.$password2.'")');
            $q -> bindvalue('pseudo', htmlentities($_POST['pseudo2']));
            $q -> bindvalue('password', $password2);
            $res = $q -> execute();

            if($res){
                echo "Inscription réussie.";
                header('Location: page2.php');
            }else{
                /*header('Location: index.php')*/;
            }
            
        }
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
        <input type="text" name="pseudo" placeholder="pseudo" value="<?php if(isset($_POST['pseudo'])){ echo $_POST['pseudo']; } ?>">
        <input type="text" name="mdp" placeholder="mot de passe" value="<?php if(isset($_POST['mdp'])){ echo $_POST['mdp']; } ?>">
        <input type="submit" name="submit" value="connexion">
    </form>
    <hr>
    <form action="" method="post">
        <input type="text" name="pseudo2" placeholder="pseudo" value="<?php if(isset($_POST['pseudo2'])){ echo $_POST['pseudo2']; } ?>">
        <input type="text" name="mdp2" placeholder="mot de passe" value="<?php if(isset($_POST['mdp2'])){ echo $_POST['mdp2']; } ?>">
        <input type="submit" name="submit2" value="inscription">
    </form>
    <a href="page2.php">page2</a>
    <a href="page3.php">déconnexion</a>
</body>
</html>
