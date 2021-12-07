<?php

class comm extends database {

    protected function setComm($commentaire, $id_utilisateur, $dateac) {
        
        $stmt = $this->connect()->prepare('INSERT INTO `commentaires`( `commentaire`, `id_utilisateur`, `date`) VALUES (?, ?, ? )');

        if(!$stmt->execute(array($commentaire, $id_utilisateur, $dateac))){
            $stmt = null;
            exit();
        }

        $stmt = null;
    }
}