<?php
require '../classes/buyer.class.php';
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Location: login.php');
    exit();
}
$functionType = $_POST['functionType'];
if($functionType==1){
    $pageNumber =$_POST['buyerId'];  //Morphed as pageNumber
    $resultsPerPage = 10;
    $startRow = ($pageNumber *  $resultsPerPage) - $resultsPerPage;
    $buyersList = $buyer->getAllBuyers($startRow, $resultsPerPage);
    echo json_encode($buyersList);
}
else if ($functionType==2){
    $buyerId = $_POST['buyerId'];
    $buyersList = $buyer->getAllBuyerItems($buyerId);
    echo json_encode($buyersList);
    

}
else if ($functionType==3){
    $buyerId = $_POST['buyerId'];
    $buyersList = $buyer->getAllBuyerInfo($buyerId);
    echo json_encode($buyersList);
    

}

else if ($functionType==4){
    $buyerId = $_POST['buyerId'];
    $buyersList = $buyer->getAllBuyerDetails($buyerId);
    echo json_encode($buyersList);
    

}