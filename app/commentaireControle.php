<?php

class commentaireControle extends comm {

    private $commentaire;
    private $id_utilisateur;
    private $dateac;

    public function __construct($commentaire, $id_utilisateur, $dateac)
    {
        $this->commentaire = $commentaire;
        $this->id_utilisateur =$id_utilisateur;
        $this->dateac =$dateac;
    }

    public function commentaireUser() {

        if($this->champsVides()==false)
        {
            echo "Tout les champs doivent être remplis.";
            exit(); 
        }
        
        else
        {
        $this->setComm($this->commentaire, $this->id_utilisateur, $this->dateac);
        echo "Merci de votre participation votre commentaire a été ajouté.";
        }

    }

    private function champsVides() {
        $result =""; 
        if(empty($this->commentaire)){
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

}