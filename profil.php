
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./elements/style6.css">
    <title>Profil</title>
</head>
<body>
    <h1>Modifier vos données personnelles </h1>
        <a id="accueil" href="./index.php">Retour à l'accueil</a>
        <div class="formulaire">
            <form class="form-insc" method="post">

<?php
session_start();

if(isset($_SESSION['id']))
{
    $id = $_SESSION['id'];

    require "./app/database.php";
    require "./app/prof.php";

    $prof = new prof();
    $result = $prof->getLogin($id);
        
    foreach($result as $value)
    {
        $login = $value['login'];

        echo '<label for="login">login :</label>';
        echo "<input name='login' value=$login type='text' />";
        echo '<label for="newpassword">New password :</label>';
        echo '<input name="newpassword" type="password" />';
        echo '<label for="passwordRep">confirm New password :</label>';
        echo '<input name="passwordRep" type="password" />';
        echo '<button type="submit" name="submit">Valider</button>';


        if(isset($_POST['submit']))
        {
            $newlogin = $_POST['login']  ;
            $newpassword = $_POST['newpassword'];
            $passwordRep = $_POST['passwordRep'];

            require "./app/profilControle.php";
            
            $newLogs = new profilControle($newlogin, $newpassword, $passwordRep, $id); 
            $newLogs->newLogs();
        }
    }
}

?>

                        
            </form>
        </div>
</body>
</html>


