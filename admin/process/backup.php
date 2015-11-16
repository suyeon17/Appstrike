<?php
session_start();
if(!isset($_SESSION['login'])) {
	// admin not online
	header("Location: http://localhost/Newspaper_management/admin/login.php");
	die();
}
?>

<?php
$filename='database_backup_'.date('G_a_m_d_y').'.sql';
$result= exec('mysqldump busni --password= --user=root --single-transaction >../uploads/'.$filename,$output);
header("Location: http://localhost/Newspaper_management/admin/uploads/".$filename);
die();
?>