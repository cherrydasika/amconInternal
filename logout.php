<?php
	session_start();    
    if(isset($_SESSION)) 
    { 
        session_destroy(); 
    } 
    header('Location: http://localhost:8085/amcon/login.php');
    exit();

?>