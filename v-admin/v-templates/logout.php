<?php
	session_start();
	//unset the session
	unset($_SESSION['admin']);
	header("Location: ../index.php");
?>