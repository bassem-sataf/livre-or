<?php

class profilControle extends Prof {

    private $newlogin;
    private $newpassword;
    private $passwordRep;
    private $id;

    public function __construct($newlogin, $newpassword, $passwordRep, $id)
    {
        $this->newlogin = $newlogin;
        $this->newpassword = $newpassword;
        $this->passwordRep = $passwordRep;
        $this->id = $id;
    }


    public function newLogs() {

        if($this->champsVides()==false){
            echo "Tout les champs doivent être remplis.";
            exit(); 
        }

        if($this->loginExistant()==false){
            echo "Ce login existe déjà";  
            exit(); 
        }
                                                
        if($this->passwordMatch()==false){
            echo "Les mots de passes ne sont pas identiques";
            exit(); 
        }

        else{
            $this->setNewLogs($this->newlogin,  $this->newpassword, $this->id);
            echo "Vos données ont bien étaients modifiées";
            header("refresh:2");
            $_SESSION['login'] = $this->newlogin; 
            exit();
        }

    }

    private function champsVides() {
        $result =""; 
        if(empty($this->newlogin) || empty($this->newpassword) || empty($this->passwordRep)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    
    private function passwordMatch() {
        $result =""; 
        if($this->newpassword !== $this->passwordRep){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function loginExistant() {
        $result =""; 
        if(!$this->checkLogin($this->newlogin)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}