<?php

class database {

    protected function connect() {  
        try{
        $db_user = 'root';
        $db_pass = '';
        $dbh = new PDO ('mysql:host=localhost;dbname=livreor', $db_user, $db_pass);
        return $dbh;
        }
        catch(PDOException $e) {
            print "Error!:" . $e->getMessage() . "<br>";
            die();
        }
    }

} 
