<?php

require_once('../../backend/pdo.php');

session_start();

if(isset($_SESSION['login'])) {
	// admin online
	header("Location: http://localhost/Appstrike/admin/panel.php");
	die();
}

// connect 
$database = new Database();

// connected, proceed
if (isset($_POST['login']) && isset($_POST['password'])){
	
	// check if inputs are empty
	if (strlen(trim($_POST['login'])) == 0 || strlen(trim($_POST['password'])) == 0) {
		// not admin, redirect to login
		header("Location: http://localhost/Appstrike/admin/login.php?type=danger&msg=You Left Something Empty !");
		die();
	}

	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	
	// get admin
	$database -> query('SELECT * FROM Users WHERE login=:login AND password=:password LIMIT 1');
	$database -> bind(':login', $login);
	$database -> bind(':password', md5($password));
	$database -> execute();
	if ( $database -> rowCount() > 0 ) { 
		//this is admin
		$admin = $database -> single();
		$_SESSION['login'] = $admin['login'];
 		header('location: http://localhost/Appstrike/admin/panel.php?type=success&msg=Welcome, Admin ! :)');
 		exit;
	}
	else { 
		// not admin, redirect to login
		header("Location: http://localhost/Appstrike/admin/login.php?type=danger&msg=your input is wrong");
		die();
	}
	
} else {
	// not admin, redirect to login
	header("Location: http://localhost/Appstrike/admin/login.php?type=danger&msg=your input is wrong");
	die();
}

?>