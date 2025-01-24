<?php session_start();
	
	$check = $_SESSION['login_user'];
	$user_id = $_SESSION['login_user'];
	if(!isset($check)) {
	    header("Location:../index.php");
	}

?>