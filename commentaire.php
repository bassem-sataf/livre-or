<?php

session_start();
$login = $_SESSION['login'];

if (isset($_SESSION['login'])){

    require("./elements/bdd.php");
    
    if(isset($_POST['commentaire'])){
        $date = date("Y/m/d H:i:s");
        $commentaire = $_POST['commentaire'];
        

        $request = mysqli_query( $bdd, "SELECT `id` FROM `utilisateurs` WHERE `login` = '$login'");
        $user = mysqli_fetch_all($request);
        
        foreach($user as $value){
            $id = $value['0'];
        }
    
        $requete = "INSERT INTO `commentaires` (`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire', '$id', '$date')";
        $sql = mysqli_query($bdd, $requete );
        $message = "Merci de votre participation votre commentaire a été ajouté.";
    }

    ?>
    <link rel="stylesheet" href="./elements/style5.css">
        
        <a id="link1" href='./livre-or.php'>Livre d'or</a>
        <a id="link2" href='index.php'>Accueil</a>
    
    <h1>Ecrivez votre avis sur notre nouveau parfum LUIZA içi</h1>
    
    <form method="post">
        <label for="commentaire">commentaire :</label>
        <textarea name="commentaire" cols="30" rows="7"></textarea>
            <h4>
                <?php if(isset($message)){
                    echo $message;   
                }   ?>
            </h4>
        <button type="submit" name="submit">Envoyer</button>
    </form>
    
    <img id="img1" src="./assets/parfum.jpg" height="200" alt="#">
    <img id="img2" src="./assets/parfumf.jpg" height="200" alt="#">
    
  <?php   
}
else{
        header("location:connexion.php");
}

