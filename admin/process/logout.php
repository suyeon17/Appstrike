<?php
	session_start();
	unset($_SESSION['user_session']);
	session_destroy();
	header("Location: http://localhost/Appstrike/index.php?type=success&msg=Goodbye, Admin :) !");
	die();
?>
