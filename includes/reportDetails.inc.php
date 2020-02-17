<?php
require '../classes/report.class.php';
if(!$_SERVER['REQUEST_METHOD'] === 'POST'){
    header('Location: login.php');
    exit();
}

$functionType = $_POST['functionType'];
if($functionType==1)
{    
    $month = $_POST['month'];
    $year = $_POST['year'];
    $getSalaries = $report->getSalaries($month, $year);
    if($getSalaries!= false){
        echo json_encode($getSalaries);

    }
}
