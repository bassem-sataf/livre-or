<?php

require("./elements/bdd.php");

if(isset($_POST['login'])){
$txtlogin = $_POST['login'];
$txtpassword = $_POST['password'];
$txtconf_password = $_POST['conf_password'];

$sql_log = mysqli_query($bdd, "SELECT login FROM utilisateurs WHERE login = '$txtlogin'");    
    
    if($txtpassword==$txtconf_password){
        if(mysqli_num_rows($sql_log) > 0){
              
            $messagelog = "Ce login existe déjà";
        }
        else{
            $sql = mysqli_query($bdd, "INSERT INTO `utilisateurs` (`login`, `password`) VALUES ('$txtlogin','$txtpassword')"); 
            header("location:./connexion.php");
        }
    }
    else{
        $messagepassword ="les mots de passes ne sont pas identiques.";
    }

}
?>

<link rel="stylesheet" href="./elements/style3.css">


<div class="global">
    <a id="accueil" href="./index.php">Retour à l'accueil</a>
    <div class="form-insc">
        <h2>Veuillez vous inscrire</h2>
        <form class="form-insc" method="post">
            <label for="login">login :</label>
            <input name="login" id="login" type="text" required="" />
            <label for="password">password :</label>
            <input name="password" id="password" type="password" required=""/>
            <label for="conf_password">confirm password :</label>
            <input name="conf_password" id="conf_password" type="password" required=""/>
            <p>
            <?php if(isset($messagepassword)){
                    echo $messagepassword;
                }
                if(isset($messagelog)){
                    echo $messagelog;
                }   
            ?>
            </p>
            <button type="submit" value="send" name="send">Valider</button>
        </form>
        <h3>Vous avez déjà un compte ? <a href="./connexion.php">connectez-vous</a></h3>
    </div>
</div>