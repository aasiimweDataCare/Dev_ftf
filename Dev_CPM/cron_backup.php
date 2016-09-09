<?php
session_start();
require('connections/lib_aBi.php');
database_backup($_GET['linkvar'],$_GET['action']);
function database_backup($linkvar,$action){
 

$today = date("Y-m-d-H-i");
/* header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$backupFile.sql"); */


$dbname="db_abi_v1";
$dbuser='root';
$dbpass='craiwrut';

$backupFile = $dbname._. date("Y-m-d-H-i-s");
//$command = "C:/wamp/bin/mysql/mysql5.0.45/bin/mysqldump -u $user -p$dbpass $dbname> c:/$backupFile";
//$backup=system($command);

$command=@system("C:/wamp/bin/mysql/mysql5.0.45/bin/mysqldump -uroot -pcraiwrut db_abi_v1>c:/wamp/www/june2011/aBi_20062011/Database_backups/$backupFile.sql");
$backup_File=$backupFile.'.sql';
$sel="INSERT INTO tbl_databasebackuplog(file_name) values('".$backup_File."')";
mysql_query($sel)or die("abi_error code 0017 because ".mysql_error());

echo "<meta http-equiv=Refresh content=3;url='home.php'>";

 }

	

 ?>
