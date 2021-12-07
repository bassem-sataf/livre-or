<?php

class prof extends database {

    public function getLogin($id) {
        
        $stmt = $this->connect()->prepare("SELECT login FROM utilisateurs WHERE id = '$id'");
        
        if(!$stmt->execute()){
            $stmt = null;
            exit();
        }
        else{
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
        }
        
    }

    public function setNewLogs($newlogin, $newpassword, $id) {

        $stmt = $this->connect()->prepare("UPDATE `utilisateurs` SET `login`= ? ,`password`= ?  WHERE `id`= ? ");
        if(!$stmt->execute(array($newlogin, $newpassword, $id))){
            $stmt = null;
            exit();
        }
        else{
            ($stmt->execute(array($newlogin, $newpassword, $id)));
            $_SESSION['login']= $newlogin;
            }
        
        $stmt = null;

    }

    public function checkLogin($newlogin) {

        $stmt = $this->connect()->prepare("SELECT `login` FROM utilisateurs WHERE login = ? ");

        if(!$stmt->execute(array($newlogin))){
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
