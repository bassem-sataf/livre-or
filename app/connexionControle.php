<?php

class connexionControle extends Log {

    private $login;
    private $password;

    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;

    }

    public function connexionUser() {

        if($this->champsVides()==false){
            echo "Tout les champs doivent être remplis.";
            exit(); 
        }
        
        else{
        $this->getUser($this->login, $this->password);
        header('location:index.php');
        }
    }

    private function champsVides() {
        $result =""; 
        if(empty($this->login) || empty($this->password)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
    
}