<?php

require '../classes/buyer.class.php';

$total_rows = $buyer->totalRecords();		
$PageSize = 10;	
$noofpages = ceil($total_rows/$PageSize); 		
echo $noofpages;