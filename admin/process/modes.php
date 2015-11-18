<?php

session_start();

require_once('../../classes/security.php');

if (isset( $_POST[ 'level' ] )) {
	
	$security = new Security();

	if ( $_POST [ 'level' ] == 'low') {

		// set security cookie to low level
		$security -> set_low_mode();

		//and redirect to index 
		header("Location: http://localhost/Appstrike/index.php");
		die();

	} else if ( $_POST [ 'level' ] == 'high') {

		// set security cookie to high level
		$security -> set_high_mode();

		//and redirect to index 
		header("Location: http://localhost/Appstrike/index.php");
		die();

	} else {

		// $_POST value does not interest us, redirect !
		header("Location: http://localhost/Appstrike/index.php");
		die();

	}

} else {

	// no $_POST variable, redirect to index 
	header("Location: http://localhost/Appstrike/index.php");
	die();
}

?>
