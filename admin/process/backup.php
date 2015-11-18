<?php

session_start();

require_once('../../classes/security.php');

if(!isset( $_SESSION[ 'login' ] )) {
	// admin not online
	header("Location: http://localhost/Appstrike/admin/login.php");
	die();
}

// this file is for high mode, soo 
$security = new Security();
if ($security -> mode == 'low') {

	// redirect to low mode backup
	header("Location: http://localhost/Appstrike/admin/lowMode_backup.php");
	die();

}

?>

<?php
$filename='backup_'.date('G_a_m_d_y');
shell_exec("zip -r ../uploads/".$filename.".zip ../../../Appstrike ");
header("Location: http://localhost/Appstrike/admin/uploads/".$filename.'.zip');
die();
?>