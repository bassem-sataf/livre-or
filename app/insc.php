<?php

class Insc extends database {

    protected function setUser($login, $password) {
        
        $stmt = $this->connect()->prepare('INSERT INTO `utilisateurs`( `login`, `password`) VALUES (?, ? );');
        if(!$stmt->execute(array($login, $password))){
            $stmt = null;
            exit();
        }
        
        $stmt = null;
    }

    protected function checkUser($login){
        $stmt = $this->connect()->prepare("SELECT `login` FROM utilisateurs WHERE login = ? ");

        if(!$stmt->execute(array($login))){
            $stmt = null;
            exit();
        }

        $resultCheck = "";

        if($stmt->rowCount() > 0){
            $resultCheck = false;   
        }
        else{
            $resultCheck = true;
        }

        return $resultCheck;
    
    }

}