<?php
require('connections/lib_aBi.php');
 if
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



/* @mkdir("Database_backups");
echo $copyFile=copy($backup_File,"Database_backups/".$backup_File);
if($copyFile)echo"successful";
else echo"Error---"; */
//$select="select backup_id  as backup_id from tbl_databasebackuplog where file_name='".$backup_File."' ";
//echo($select);
 //$row=mysql_fetch_array(mysql_query($select))or die(mysql_error());
 //$_FILES['img_file']['name']="c:/$backupFile.sql";
/* if($_FILES['img_file']['name']!= NULL){
			$img_name = preg_replace("/.+\./", "backup_".$row['backup_id'].".", $_FILES['img_file']['name']);
			@mkdir("Database_backups");
			
			if(!move_uploaded_file($_FILES['img_file']['tmp_name'], "Database_backups/".$img_name))
				echo"Could not upload logo!";
			else{
		 $update="update tbl_databasebackuplog set file_name='".$img_name."' where backup_id='".$row['backup_id']."'";
				$query=mysql_query($update)or die(mysql_error());
				if($query){
				echo"aBi Database Backup ".$img_name." uploaded!";
				//mysql_query("delete from tbl_safari where booking_id='".$_SESSION['booking_id']."' && safari_type='' ");
				//echo "<meta http-equiv=Refresh content=3;url='narratives.php?linkvar=View Narrative&&action=Narratives'>";}
}
			
}

	} */		
	

 ?>
