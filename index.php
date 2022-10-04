<?php 
    session_start();
    include('Connect.php');
    
    if(isset($_POST['submit'])){ 
        
        if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
            $_SESSION['pseudo'] = htmlentities($_POST['pseudo']);
            
            $reponse = $cnx->query('select * from user where pseudo = "'.htmlentities($_POST['pseudo']).'"');
            $results = $reponse->fetch(PDO::FETCH_OBJ);

            if($results != false){
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
        <input type="submit" name="submit" value="valider">
    </form>
    <a href="page2.php">page2</a>
    <a href="page3.php">page3</a>
</body>
</html>
