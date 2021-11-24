<?php

session_start();
if (empty($_SESSION['login']))
{
    header("location:./connexion.php");
}
else{
    $user = $_SESSION['login'];

    require("./elements/bdd.php");

    if(isset($_POST['login'])){
        $txtlogin = $_POST['login'];
        $txtpassword = $_POST['password'];
        $txtconf_password = $_POST['conf_password'];
        if($txtpassword==$txtconf_password){
        
        $requete = "UPDATE utilisateurs SET login='$txtlogin', password='$txtpassword' WHERE login = '$user'";
        mysqli_query($bdd,$requete);}
        else{
            $message = "Les mots de passes ne sont pas identiques";
        }
    }
        
    ?>         
                <link rel="stylesheet" href="./elements/style6.css">     
                
                <h1>Modifier vos données personnelles </h1>
                <a id="accueil" href="./index.php">Retour à l'accueil</a>
                <div class="formulaire">
                <form method="post">
                <label for="login">login :</label>
                <input name="login" id="login" type="text" required="" />
                <label for="password">password :</label>
                <input name="password" id="password" type="password" required=""/>
                <label for="conf_password">confirm password :</label>
                <input name="conf_password" id="conf_password" type="password" required=""/>
                <p> 
                    <?php if(isset($message)){
                    echo $message;
                    }?>
                </p>
                <button type="submit" value="send" name="send">Valider</button>
                </form>
                </div>
<?php ;} ?>