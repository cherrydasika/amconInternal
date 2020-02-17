<?php

include 'dbh.class.php';

class Report extends Dbh{

    

    public function getSalaries($month, $year){
        $sql="SELECT left(Buyer,10) as Excerpt, AmountBeforeTax, TotalAmount, RecordDateTime from InvoiceDetails 
        where month(RecordDateTime) = :month and
        year(RecordDateTime) = :year
        order by RecordDateTime";
       
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->bindParam(':month',$month, PDO::PARAM_INT);
            $stmt->bindParam(':year',$year, PDO::PARAM_INT);           
            $stmt->execute();
        }catch(PDOException $exception){
            return $exception->getMessage();
            //return false;
            exit();
        } 
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }else{
            return false;
        }
    }

}

$report =  new Report();



