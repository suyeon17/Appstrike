<?php

require_once('../../backend/pdo.php');

session_start();

if(isset($_SESSION['login'])) {
	// admin online
	header("Location: http://localhost/Newspaper_management/admin/panel.php");
	die();
}

// connect 
$database = new Database();

// connected, proceed
if (isset($_POST['login']) && isset($_POST['password'])){
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
 		header('location: http://localhost/Newspaper_management/admin/panel.php');
 		exit;
	}
	else { 
		// not admin, redirect to login
		header("Location: http://localhost/Newspaper_management/admin/login.php");
		die();
	}
	
} else {
	// missing field or both missing from form
	echo 'missing field or both missing from form';
}

?>