<?php
/* Thjs class gets all the information about the buyers and any specific buyer. This also includes the pagination requests */
include 'dbh.class.php';

class Buyer extends Dbh{

    public function getLatestIDInsert(){
        
        $sql="SELECT Buyerid FROM `InvoiceDetails` order by `RecordDateTime` desc limit 1";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $records=$stmt->fetch();
            if(count($records)>0){
                return $records;
            };
        }catch(PDOException $exception){
            //return $exception->getMessage();
            return false;
            exit();
        }  
       
    }

    public function insertNewBuyer($r){
        $arr_rev = array_reverse($r);
        $sql="INSERT INTO InvoiceDetails VALUES (NULL,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$r[0],$r[1],$r[2],$r[3],$r[4],$r[5],$r[6],$r[7],$r[8],$r[9],$arr_rev[3],$arr_rev[4],$arr_rev[5],$arr_rev[2],$arr_rev[1],$arr_rev[0]]);
        }catch(PDOException $exception){
            //return $exception->getMessage();
            return false;
            exit();
        }  
        return true;  
    }

    public function insertNewBuyerItems($r){
        $arr_rev = array_reverse($r);
        $sql="INSERT INTO InvoiceItemList VALUES (?,?,?,?)";
        try{
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$r[0],$r[1],$r[2],$r[3]]);
        }catch(PDOException $exception){
            //return $exception->getMessage();
            return false;
            exit();
        }  
        return true;  
    }


    public function getAllBuyers($startRow, $resultsPerPage){
        $sql="SELECT Buyerid, Buyer, DATE(RecordDateTime), TIME(RecordDateTime) FROM InvoiceDetails 
        ORDER BY DATE(RecordDateTime) desc, TIME(RecordDateTime) desc 
        LIMIT :startRow, :resultsPerPage"; 
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->bindParam(':startRow',$startRow, PDO::PARAM_INT);
            $stmt->bindParam(':resultsPerPage',$resultsPerPage, PDO::PARAM_INT);           
            $stmt->execute();
        }catch(PDOException $exception){
            return $exception->getMessage();
            //return false;
            exit();
        } 
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        };
    }

    public function getAllBuyerDetails($buyerId){
        $sql="SELECT * FROM InvoiceDetails WHERE Buyerid = ?";
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$buyerId]);
            $records=$stmt->fetchAll();
            if(count($records)>0){
                return $records;
            };
        }catch(PDOException $exception){
            return $exception->getMessage();
            exit();
        } 
    }

    public function getAllBuyerItems($buyerId){
        $sql="SELECT * FROM InvoiceItemList WHERE Buyerid = ?";
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$buyerId]);
            $records=$stmt->fetchAll();
            if(count($records)>0){
                return $records;
            };
        }catch(PDOException $exception){
            return $exception->getMessage();
            exit();
        } 
    }

    public function getAllBuyerInfo($buyerId){
        $sql="SELECT * FROM InvoiceDetails WHERE Buyerid = ?";
        try{
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$buyerId]);
            $records=$stmt->fetchAll();
            if(count($records)>0){
                return $records;
            };
        }catch(PDOException $exception){
            return $exception->getMessage();
            exit();
        } 
    }

    public function insertMoreRecords($r, $rowcount){
        $finalVal = (3*$rowcount)+10-3;
        for($i=10;$i<=$finalVal;$i+=3)
        {		   
            $i1 = $i + 1;
            $i2 = $i1 + 1;
            $sql = "INSERT INTO InvoiceItems VALUES(LAST_INSERT_ID(),?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$r[$i],$r[$i1],$r[$i2]]);
            $records=$stmt->fetchAll();
            if(count($records)>0){
                return $records;
            };
            
        }		
    }

    public function deleteRecord($id){
        $sql = "DELETE FROM InvoiceItems WHERE BuyerId ='".$id."'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }
    }

    public function totalRecords(){
        $sql = "SELECT Buyerid, Buyer,RecordDate,RecordTime FROM Invoices ORDER BY RecordDate desc, Buyerid desc";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return count($records);
        }
    }

    public function getRecordsPages($StartRow,$PageSize){
        $sql="select * from (select Buyerid, Buyer,RecordDate,RecordTime from Invoices ORDER BY RecordDate desc, Buyerid desc) as T LIMIT ".$StartRow .",".$PageSize."";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$StartRow,$PageSize]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }
    }

    public function getSelectedRecord($id){
        $sql = "SELECT * FROM Invoices where Buyerid =?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }
        else{
            return false;
        }
    }

    public function getSelectedMoreDetails($id){
        $sql = "SELECT * FROM InvoiceItems where Buyerid = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $records=$stmt->fetchAll();
        if(count($records)>0){
            return $records;
        }
        else{
            return false;
        }
    }


}

$buyer = new Buyer();