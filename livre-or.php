<?php
session_start();

?><link rel="stylesheet" href="./elements/style4.css">
         <a id="accueil" href="./index.php">Retour à l'accueil</a>
        <h1>Bienvenue sur l'accueil du LIVRE D'OR</h1>
        <a id="comm" href="./commentaire.php">Donner nous vous aussi votre <br> AVIS</a>
        <div class="img1">
            <img src="./assets/parfumf.jpg" height="250" alt="#">
        </div>
        <div class="global">

<?php

require("./elements/bdd.php");

if(isset($_SESSION['login'])){

    $sql = mysqli_query($bdd, "SELECT `commentaire`, `id_utilisateur`, `date` FROM `commentaires` ORDER BY `date` DESC ");
    $request = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    foreach($request as $value){
        $id = $value['id_utilisateur'];
        $commentaire = $value['commentaire'];
        $date = $value['date'];
        
        $sql_two = mysqli_query($bdd, "SELECT `login` FROM `utilisateurs` WHERE `id` = '$id'");
        
        $request_two = mysqli_fetch_all($sql_two, MYSQLI_ASSOC);
        foreach($request_two as $value_two){
            $login = $value_two['login'];
            $message = " <span class='mess'> Message posté le $date par $login </span>: <br> $commentaire <br> ";
            echo "<p>$message</p>";
        }
    }
}
else{
    header("location:./connexion.php");
}