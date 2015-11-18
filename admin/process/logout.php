<?php
	session_start();
	unset($_SESSION[ 'login' ]);
	header("Location: http://localhost/Appstrike/index.php?type=success&msg=Goodbye, Admin :) !");
	die();
?>
