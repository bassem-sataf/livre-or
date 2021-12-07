<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./elements/style4.css">
    <title>livre-or</title>
</head>
<body>
    <a id="accueil" href="./index.php">Retour à l'accueil</a>
    <h1>Bienvenue sur l'accueil du LIVRE D'OR</h1>
        <?php if(isset($_SESSION['id']))
        {
        echo'<a id="comm" href="./commentaire.php">Donner nous vous aussi votre <br> AVIS</a>';
        } 
        ?>
        <div class="img1">
            <img src="./assets/parfumf.jpg" height="250" alt="#">
        </div>
<?php

      
        require "./app/database.php";
        require "./app/livre.php";
        

        $mur = new livre();
        $result = $mur->getInf();
        
        foreach($result as $value){
             $commentaire = $value['commentaire'];
             $login = $value['login'];
             $date = $value['date'];
             $strdate = strtotime($date); 
             $newdate = date("d-m-Y", $strdate );
             
             $message = " <span class='mess'> Message posté le $newdate par $login </span>: <br> $commentaire <br> ";
             echo "<p>$message</p>";
        }

?>


</body>
</html>

        
    