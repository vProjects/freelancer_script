<?php
	session_start();
	unset($_SESSION['user']);
	unset($_SESSION['user_id']);
	session_destroy();
	//redirect page to login page
	header("Location: ../index.php");
?>