<?php
require '../classes/buyer.class.php';
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Location: login.php');
    exit();
}
$buyerId = $_POST['buyerId'];
$selectedBuyer = $buyer->getSelectedRecord($buyerId);
if($selectedBuyer!= false){
    $selectedBuyerMore = $buyer->getSelectedMoreDetails($buyerId);
    var_dump($selectedBuyerMore);

}
