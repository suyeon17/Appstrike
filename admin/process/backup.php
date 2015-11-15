<?php
$filename='database_backup_'.date('G_a_m_d_y').'.sql';
$result=exec('mysqldump busni --password=19911991 --user=root --single-transaction >../uploads/'.$filename,$output);
header("Location: http://localhost/Newspaper_management/admin/uploads/".$filename);
die();
?>