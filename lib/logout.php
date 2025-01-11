<?php   
session_start(); //to ensure you are using same session
unset($_SESSION["login_user"]);  
    session_destroy(); 
	$_SESSION['login_user'] = "";
header("location:../index.php"); //to redirect back to "index.php" after logging out
exit();
?>