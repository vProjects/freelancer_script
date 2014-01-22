<?php
	session_start();
	unset($_SESSION['user']);
	session_destroy();
	//redirect page to login page
	header("Location: ../index.php");
?>