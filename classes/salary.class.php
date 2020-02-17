<?php

include 'dbh.class.php';

class Salary extends Dbh{

    public function getAllSalaries(){
        $sql="SELECT * FROM Salary order by Personid asc ";
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute();
            $records=$stmt->fetchAll();
            if(count($records)>0){
                return $records;
            };
        }catch(PDOException $exception){
            return $exception->getMessage();
            exit();
        } 
    }

    public function addNewSalary($name, $bank, $branch, $ifsc, $account, $salary){
        //Check if account already exists
        $sql="SELECT * FROM Salary where Account = ?";
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$account]);
            if($stmt->num_rows>0)
            {
                echo false;
            }
            else
            {
                $sql1="INSERT INTO Salary VALUES (NULL,?,?,?,?,?,?)";
                try{
                    $stmt1 = $this->connect()->prepare($sql1);
                    $stmt1->execute([$name, $bank, $branch, $ifsc, $account, $salary]);
                }catch(PDOException $exception){                    
                    return false;
                    exit();
                }
                return true; 
                
            }
        }catch(PDOException $exception){
            return $exception->getMessage();
            exit();
        } 
    }
}

$salary = new Salary();