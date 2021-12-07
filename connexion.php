<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./elements/style2.css">
    <title>Connexion</title>
</head>
<body>

    <div class="global">
    <a id="accueil" href="./index.php">Retour à l'accueil</a>
        <div class="form-conn">
            <h2>Veuillez vous connecter</h2>
            <form class="form-conn" method="post">
                <label for="login">login :</label>
                <input name="login" type="text" />
                <label for="password">password :</label>
                <input name="password" type="password" />
                <button type="submit" name="submit">Valider</button>
            </form>
            <h3>Vous n'avez pas de compte ? <a href="./inscription.php">inscrivez-vous</a></h3>
            <p id="mess">
    <?php

    if(isset($_POST['submit'])){

        $login = $_POST['login']  ;
        $password = $_POST['password'];

        require "./app/database.php";
        require "./app/log.php";
        require "./app/connexionControle.php";

        $connexion = new connexionControle($login, $password);

        $connexion->connexionUser();    


    }
    ?>
            </p>
        </div>
    </div>
</body>
</html>




