<?php 
    session_start();
    include('Connect.php');
    
    //Connexion

    if(isset($_POST['submit'])){ 
        
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
            $_SESSION['pseudo'] = htmlentities($_POST['pseudo']);
            
            $reponse = $cnx->prepare('select * from user where pseudo = "'.htmlentities($_POST['pseudo']).'" and password = "'.htmlentities($_POST['mdp']).'"');
            $reponse -> bindvalue('pseudo', $_POST['pseudo']);
            $reponse -> bindvalue('password', $_POST['mdp']);
            $reponse -> execute();
            $results = $reponse->fetch(PDO::FETCH_OBJ);

            if($results != false){
                header('Location: page2.php');
            }else{
                /*header('Location: index.php')*/;
            }
            
        }
    }

    //Inscription

    if(isset($_POST['submit2'])){ 
        
        if(!empty($_POST['pseudo2']) && !empty($_POST['mdp2'])){
            $_SESSION['pseudo'] = htmlentities($_POST['pseudo2']);
            
            $q = $cnx->prepare('INSERT INTO user (pseudo, password) VALUES ("'.htmlentities($_POST['pseudo2']).'", "'.htmlentities($_POST['mdp2']).'")');
            $q -> bindvalue('pseudo', htmlentities($_POST['pseudo2']));
            $q -> bindvalue('password', htmlentities($_POST['mdp2']));
            $res = $q -> execute();

            if($res){
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
