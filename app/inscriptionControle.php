<?php

class inscriptionControle extends Insc {

    private $login;
    private $password;
    private $passwordRep;

    public function __construct($login, $password, $passwordRep)
    {
        $this->login = $login;
        $this->password = $password;
        $this->passwordRep = $passwordRep;
    }


    public function inscriptionUser() {

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
        $this->setUser($this->login,  $this->password);
        header('location:./connexion.php');
        }
    }

    private function champsVides() {
        $result =""; 
        if(empty($this->login) || empty($this->password) || empty($this->passwordRep)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    
    private function passwordMatch() {
        $result =""; 
        if($this->password !== $this->passwordRep){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    private function loginExistant() {
        $result =""; 
        if(!$this->checkUser($this->login)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}