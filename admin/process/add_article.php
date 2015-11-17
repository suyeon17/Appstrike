<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
}

// try to connect to the database
try {
    $pdo = new PDO('mysql:host=localhost;dbname=app', 'root', '19911991');
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
	// Where are we going to be writing to?
	$target_path  = "/var/www/html/Newspaper_management/admin/uploads/".basename($_FILES['file']['name']);
	$path = "/Newspaper_management/admin/uploads/".basename($_FILES['file']['name']);
		
	// File information
	$uploaded_name = $_FILES[ 'file' ][ 'name' ];
	$uploaded_ext  = substr( $uploaded_name, strrpos( $uploaded_name, '.' ) + 1);
	$uploaded_size = $_FILES[ 'file' ][ 'size' ];
	$uploaded_tmp  = $_FILES[ 'file' ][ 'tmp_name' ];

	// Is it an image?
	if( ( strtolower( $uploaded_ext ) == "jpg" || strtolower( $uploaded_ext ) == "jpeg" || strtolower( $uploaded_ext ) == "png" ) &&
		( $uploaded_size < 100000 ) &&
		getimagesize( $uploaded_tmp ) ) {
			// Can we move the file to the upload folder?
			if( !move_uploaded_file( $uploaded_tmp, $target_path ) ) {
				// No
				header("Location: http://localhost/Newspaper_management/admin/add.php");
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
		}
		else {
				// Invalid file
				header("Location: http://localhost/Newspaper_management/admin/add.php");
				die();
			}
		} else {
			// no file
			header("Location: http://localhost/Newspaper_management/press.php?id={$article_id}");
			die();
		}

} else {
	//some field is missing!
	header("Location: http://localhost/Newspaper_management/admin/add.php");
	die();
}

?>