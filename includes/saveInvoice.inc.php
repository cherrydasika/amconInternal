<?php
require '../classes/buyer.class.php';
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Location: login.php');
    exit();
}
$functionType = $_POST['functionType'];
if($functionType==1){
   $arrInvoiceDetail = json_decode($_POST['arrList']);
   $selectedBuyer = $buyer->insertNewBuyer($arrInvoiceDetail);
   if($selectedBuyer!=false){
        //Get the latest id inserted
        $latestID = $buyer->getLatestIDInsert();        
        echo $latestID["Buyerid"];
   }
}
else if($functionType==2){
    $arrInvoiceList = json_decode($_POST['arrList']);
    $selectedBuyer = $buyer->insertNewBuyerItems($arrInvoiceList);
    if($selectedBuyer!=false){
        echo "Success";
    }
}


