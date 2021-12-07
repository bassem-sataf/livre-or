<?php

class livre extends database {

    public function getInf() {
        
        $stmt = $this->connect()->prepare('SELECT * FROM commentaires inner join utilisateurs WHERE utilisateurs.id = commentaires.id_utilisateur ORDER BY `commentaires`.`date` DESC');
        
        if(!$stmt->execute()){
            $stmt = null;
            exit();
        }
        else{
        $user = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $user;
        }
    }

}
