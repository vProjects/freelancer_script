<?php
	session_start();
	//delete the cookie value
	setcookie("user_login","",time() - 3600,'/');
	unset($_SESSION['user']);
	unset($_SESSION['user_id']);
	session_destroy();
	
	//redirect page to login page
	header("Location: ../index.php");
?>