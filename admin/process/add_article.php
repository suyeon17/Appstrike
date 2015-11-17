<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
}

// try to connect to the database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=app', 'root', '');
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
	
	$article_id = $pdo->lastInsertId();

	// upload file 
	if(isset($_FILES['file']) && $_FILES['file']['size'] != 0){
		$target_path  = "../uploads/".basename($_FILES['file']['name']);
		$path = "/Newspaper_management/admin/uploads/".basename($_FILES['file']['name']);
		if(!move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
			// cant move the file !
			header("Location: http://localhost/Newspaper_management/index.php");
			die();
		}
		else {
			// Yes!
			$query=$pdo->prepare("INSERT INTO Files (path, article_id) VALUES (:path, :article_id)");
			$query->bindValue(':path', $path);
			$query->bindValue(':article_id', $article_id);
			$query->execute();
	
			header("Location: http://localhost/Newspaper_management/press.php?id={$article_id}");
			die();
		}
	} else {
		// No file !
		header("Location: http://localhost/Newspaper_management/press.php?id={$article_id}");
		die();
	}

} else {
	//some field is missing!
	header("Location: http://localhost/Newspaper_management/admin/add.php");
	die();
}

?>