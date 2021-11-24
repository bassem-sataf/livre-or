<?php

session_start();

require("./elements/bdd.php");

if(isset($_POST['login']) && isset($_POST['password'])){
  

    $login = $_POST['login'];
    $password = $_POST['password'];
            
    $sql = "SELECT * FROM utilisateurs WHERE login = '$login' AND password = '$password' ";
    $request = mysqli_query( $bdd, $sql);
    $count = mysqli_num_rows($request);

        if($count==1){
            $_SESSION['login']= $login;
        }
        else{
            $message = "Le mot de passe ou login est incorrect.";
        }
}
if(isset($_SESSION['login'])){
    $login_session = $_SESSION['login'];
    
    header("location:./index.php");
    
}
else{

?>
 <html>
     <head>
        <link rel="stylesheet" href="./">
     </head>
     <body>
        <div class="global">
            <a id="accueil" href="./index.php">Retour à l'accueil</a>
            <div class="form-conn">
                <h2>Veuillez vous connecter</h2>
            <form class="form-conn" action="" method="post">
                <label for="login">login :</label>
                <input name="login" id="login" type="text" required="" />
                <label for="password">password :</label>
                <input name="password" id="password" type="password" required=""/>
                <p id="mess">
                <?php
                    if(isset($count)){
                        if($count==1){
                        } else {
                            echo $message;
                        }
                    }
                ?>
                </p>
                <button type="submit" value="send" name="send">Valider</button>
            </form>
                <h3>Vous n'avez pas de compte ? <a href="./inscription.php">inscrivez-vous</a></h3>
            </div>
            <div class="background">
                <img src="./assets/bg" alt="">
            </div>
        </div>
    </body>
</html>

<?php   }

