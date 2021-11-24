<?php
session_start();

require("./elements/bdd.php");

if(isset($_SESSION['login'])){
    $sql = mysqli_query($bdd, "SELECT `id_utilisateur`, `commentaire`, `date` FROM `commentaires`");
    $request = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    foreach($request as $value){
        $id = $value['id_utilisateur'];
        $commentaire = $value['commentaire'];
        $date = $value['date'];
        
        $sql_two = mysqli_query($bdd, "SELECT `login` FROM `utilisateurs` WHERE `id` = '$id'");
        
        $request_two = mysqli_fetch_all($sql_two, MYSQLI_ASSOC);
        foreach($request_two as $value_two){
            $login = $value_two['login'];
            echo "posté le $date par $login : $commentaire <br> ";
        }
    }
}
else{
    header("location:./connexion.php");
}