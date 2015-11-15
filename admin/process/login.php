<?php
session_start();
if(isset($_SESSION['login'])) {
	// admin online
	header("Location: http://localhost/Newspaper_management/admin/panel.php");
	die();
}

// try to connect to the database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=busni', 'root', '19911991');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

// connected, proceed
if (isset($_POST['login']) && isset($_POST['password'])){
	$login = trim($_POST['login']);
	$password = trim($_POST['password']);
	
	$query=$pdo->prepare("SELECT * FROM Users WHERE login=:login AND password=:password LIMIT 1");
	$query->bindValue(':login', $login);
	$query->bindValue(':password', md5($password));
	$query->execute();
	$result = $query->fetch();
	
	if ($query->rowCount() > 0){
		//this is admin
		$_SESSION['login'] = $result['login'];
 		header('location: http://localhost/Newspaper_management/admin/panel.php');
 		exit;
	} else {
		// not admin, redirect to login
		header("Location: http://localhost/Newspaper_management/admin/login.php");
		die();
	}

} else {
	// missing field or both missing from form
	echo 'missing field or both missing from form';
}

// unset object after making love with it
$pdo = null;

?>