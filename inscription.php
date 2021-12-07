<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./elements/style3.css">
    <title>Inscription</title>
</head>
<body>
    <div class="global">
        <a id="accueil" href="./index.php">Retour à l'accueil</a>
        <div class="form-insc">
            <h2>Veuillez vous inscrire</h2>
            <form class="form-insc" method="post">
                        <label for="login">login :</label>
                        <input name="login" type="text" />
                        <label for="password">password :</label>
                        <input name="password" type="password" />
                        <label for="passwordRep">confirm password :</label>
                        <input name="passwordRep" type="password" />
                        <button type="submit" name="submit">Valider</button>
            </form> 
            <h3>Vous avez déjà un compte ? <a href="./connexion.php">connectez-vous</a></h3>
            <p id="mess">


<?php

if(isset($_POST['submit'])){

    $login = $_POST['login']  ;
    $password = $_POST['password'];
    $passwordRep = $_POST['passwordRep'];

    require "./app/database.php";
    require "./app/insc.php";
    require "./app/inscriptionControle.php";

    $inscription = new inscriptionControle($login, $password, $passwordRep);
    $inscription->inscriptionUser();       
}
?>

            </p>
        </div>
    </div>
</body>
</html>

