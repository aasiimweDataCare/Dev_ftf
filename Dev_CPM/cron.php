<?php
session_start();
require('connections/lib_connect.php');
$today = date("Y-m-d-H-i");

$dbname="db_cpma";
$dbuser='root';
$dbpass='cpmmisV1';

$backupFile = $dbname."_". date("Y-m-d-H-i");



$dbname="db_cpma";
$dbuser='cpm_root';
$dbpass='cpmmisV2';
$backupFile = $dbname."_.". date("Y-m-d-H-i-s");
$command = "C:/wamp/bin/mysql/mysql5.6.17/bin/mysqldump -u root -p craiwrut db_cpma c:/wamp/www/Dev_cpm/$backupFile";
$backup=@system($command);

$backup_File=$backupFile.'.sql';
$sel="INSERT INTO tbl_databasebackuplog(file_name) values('".$backup_File."')";
@mysql_query($sel)or die("<meta http-equiv=Refresh content=3;url='setup.php?linkvar=Database%20Backup%20Log&&action=System%20Setup'>");

echo "<meta http-equiv=Refresh content=3;url='setup.php?linkvar=Database%20Backup%20Log&&action=System%20Setup'>";



	

 ?>
