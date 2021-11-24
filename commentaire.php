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
        var_dump($requete);
    }

    ?>
    <form method="post">
    <label for="commentaire">commentaire :</label>
    <input name="commentaire" type="text" required=""/>
    <input type="submit" name="submit">
    </form>

  <?php   
}
else{
        echo '<center><b>Vous devez vous connecter pour acceder à la page réseaux</center><br />';
}

