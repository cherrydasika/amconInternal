<?php
/*
Redirect the page based on the user input. On successful connection log the details. 
*/
require('../classes/user.class.php');

if(!isset($_POST['login-submit']))
{
	header("Location: ../login.php");
	exit();
}

$userid = $_POST['uname'];
$pwd = $_POST['pwd'];
$userArr;

if(empty($userid) || empty($pwd)){
	header("Location: ../login.php?error=empty");
	exit();
}
else{

    $userArr = $user->getUser($userid);	
	$pwdCheck = password_verify($pwd, $userArr[0]["password"]);
	if($pwdCheck==false){
		header("Location: ../login.php?error=invalid");
		exit();
	}
	else if($pwdCheck==true){
		session_start();
		$_SESSION['userId']=$userArr[0]["idusers"];
		header("Location: ../index.php?login=success");
		exit();

	}
	else{
		header("Location: ../login.php?error=invalidlogin");
		exit();
	}



}



?>