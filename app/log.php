<?php

class Log extends database {

    protected function getUser($login, $password) {
        
        $stmt = $this->connect()->prepare("SELECT * FROM `utilisateurs` WHERE `login` = '$login' AND `password` = '$password' ");

        if(!$stmt->execute(array($login, $password ))){
            $stmt = null;
            exit();
        }

        elseif($stmt->rowCount() == 0){
            
            $stmt = null;
            echo "Identifiant ou mot de passe incorrect";
            exit();
        }

        elseif($stmt->rowCount() > 0 ){
        session_start();
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);    
        
        $_SESSION['id'] = $user['0']['id'];
        $_SESSION['login'] = $user['0']['login'];

        }

        $stmt = null;
    }
}