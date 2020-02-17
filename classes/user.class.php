<?php
/* Thjs class gets all the information about the buyers and any specific buyer. This also includes the pagination requests */
include 'dbh.class.php';

class User extends Dbh{

    public function getUser($user){
    
        $sql="select * from users where username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$user]);
        $records = $stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }
        
    
    }
}

$user = new User();