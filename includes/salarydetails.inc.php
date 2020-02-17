<?php
require '../classes/salary.class.php';
if(!$_SERVER['REQUEST_METHOD'] === 'POST')
{
    header('Location: login.php');
    exit();
}

$functionType = $_POST['functionType'];
if($functionType==1)
{
    $selectedBuyer = $salary->getAllSalaries();
    echo json_encode($selectedBuyer);   
}
else if($functionType==2)
{
    $name = $_POST['name']; 
    $bank = $_POST['bank'];
    $branch = $_POST['branch']; 
    $ifsc = $_POST['ifsc']; 
    $account = $_POST['account'];
    $salary = $_POST['salary'];
    $selectedBuyer = $salary->addNewSalary($name, $bank, $branch, $ifsc, $account, $salary);
    echo json_encode($selectedBuyer);
}
