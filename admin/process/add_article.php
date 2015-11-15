<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
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
if (isset($_POST['title']) && isset($_POST['body'])){
	$title = trim($_POST['title']);
	$body = trim($_POST['body']);

	$query=$pdo->prepare("INSERT INTO Articles (title, text, login, date) VALUES (:title, :body, :login, NOW())");
	$query->bindValue(':title', $title);
	$query->bindValue(':body', $body);
	$query->bindValue(':login', $_SESSION['login']);
	$query->execute();

	header("Location: http://localhost/Newspaper_management/index.php");
	die();

} else {
	//some field is missing!
	header("Location: http://localhost/Newspaper_management/admin/add.php");
	die();
}

?>