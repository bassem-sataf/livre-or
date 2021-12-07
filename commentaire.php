
<link rel="stylesheet" href="./elements/style5.css">
<a id="link1" href='./livre-or.php'>Livre d'or</a>
<a id="link2" href='index.php'>Accueil</a>
<h1>Ecrivez votre avis sur notre nouveau parfum LUIZA içi</h1>
    
<form method="post">
    <label for="commentaire">commentaire :</label>
    <textarea name="commentaire" cols="30" rows="7"></textarea>
    <button type="submit" name="submit">Envoyer</button>
</form>
    
<img id="img1" src="./assets/parfum.jpg" height="200" alt="#">
<img id="img2" src="./assets/parfumf.jpg" height="200" alt="#">
<h4>

<?php

session_start();


if (isset($_SESSION['id'])){

    if(isset($_POST['submit'])){
        $dateac = date("Y/m/d H:i:s");
        $commentaire = $_POST['commentaire'];
        $id_utilisateur = $_SESSION['id'];

        require "./app/database.php";
        require "./app/comm.php";
        require "./app/commentaireControle.php";

        $newcomment = new commentaireControle($commentaire, $id_utilisateur, $dateac);
        $newcomment->commentaireUser();
        
    }
}  
else{
    header('location:./index.php');
} 

?>
</h4>