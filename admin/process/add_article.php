<?php

session_start();

require_once('../../classes/pdo.php');
require_once('../../classes/security.php');

if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Appstrike/admin/login.php");
	die();
}

// connect 
$database = new Database();

// get security object
$security = new Security();

// connected, proceed
if (isset($_POST['title']) && isset($_POST['body'])){
	
	$title = trim($_POST['title']);
	$body = trim($_POST['body']);

	// check if inputs are empty
	if (strlen(trim($_POST['title'])) == 0 || strlen(trim($_POST['body'])) == 0) {
		// not admin, redirect to login
		header("Location: http://localhost/Appstrike/admin/add.php?type=danger&msg=You Left Something Empty !");
		die();
	}

	// add article
	$database -> query('INSERT INTO Articles (title, text, login, date) VALUES (:title, :body, :login, NOW())');
	$database -> bind(':title', $title);
	$database -> bind(':body', $body);
	$database -> bind(':login', $_SESSION['login']);
	$database -> execute();
	$article_id = $database -> lastInsertId();

	// upload file, high mode -
	if ($security -> mode == 'high') {
		if(isset($_FILES['file']) && $_FILES['file']['size'] != 0){
		// Where are we going to be writing to?
		$target_path  = "/var/www/html/Appstrike/admin/uploads/".basename($_FILES['file']['name']);
		$path = "/Appstrike/admin/uploads/".basename($_FILES['file']['name']);
			
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
					header("Location: http://localhost/Appstrike/admin/add.php?type=danger&msg=We could not move your uploaded file , check your permissions !");
					die();
				} else {
					// Yes!
					$database -> query('INSERT INTO Files (path, article_id) VALUES (:path, :article_id)');
					$database -> bind(':path', $path);
					$database -> bind(':article_id', $article_id);
					$database -> execute();
					
					header("Location: http://localhost/Appstrike/press.php?id={$article_id}&type=success&msg=New Article !");
					die();
				}
			} else {
					// Invalid file
					header("Location: http://localhost/Appstrike/press.php?id={$article_id}&type=danger&msg=Article Added successfully but the uploaded file does not meet our requirements !");
					die();
				}
			} else {
				// no file
				header("Location: http://localhost/Appstrike/press.php?id={$article_id}&type=success&msg=New Article !");
				die();
			}
		} else {


			// low mode
			if(isset($_FILES['file']) && $_FILES['file']['size'] != 0){
				$target_path  = "../uploads/".basename($_FILES['file']['name']);
				$path = "/Appstrike/admin/uploads/".basename($_FILES['file']['name']);
				if(!move_uploaded_file($_FILES['file']['tmp_name'], $target_path)){
					// cant move the file !
					header("Location: http://localhost/Appstrike/admin/add.php?type=danger&msg=We could not move your uploaded file , check your permissions !");
					die();
				}
				else {
					// Yes!
					$database -> query('INSERT INTO Files (path, article_id) VALUES (:path, :article_id)');
					$database -> bind(':path', $path);
					$database -> bind(':article_id', $article_id);
					$database -> execute();
					
					header("Location: http://localhost/Appstrike/press.php?id={$article_id}&type=success&msg=New Article !");
					die();
				}
			} else {
				// No file !
				header("Location: http://localhost/Appstrike/press.php?id={$article_id}");
				die();
			}
		}

} else {
	//some field is missing!
	header("Location: http://localhost/Appstrike/admin/add.php?type=danger&msg=You Left Something Empty !");
	die();
}

?>