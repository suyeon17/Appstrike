<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Appstrike/admin/login.php");
	die();
}
?>

<?php
$filename='backup_'.date('G_a_m_d_y');
// $result= exec('mysqldump app --password=19911991 --user=root --single-transaction >../uploads/'.$filename,$output);
shell_exec("zip -r ../uploads/".$filename.".zip ../../../Appstrike ");
header("Location: http://localhost/Appstrike/admin/uploads/".$filename.'.zip');
die();
?>