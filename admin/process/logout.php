<?php
	session_start();
	unset($_SESSION['user_session']);
	session_destroy();
	header("Location: http://localhost/Newspaper_management/index.php");
	die();
?>
