<?php
date_default_timezone_set("Etc/GMT-3");
global $connect;
$connect = mysqli_connect("localhost", "root", "admin", "db_cpma");

//$connect = mysqli_connect('localhost','root','cpmmisV1','db_cpmadummy');//or die(mysql_error());
//@mysql_select_db('db_cpmadummy',$connect);

$today=date('Y-m-d');
$yesterday=date('Y-m-d',strtotime("-1 days"));
//$timestamp=date('Y-m-d h:i:s');
//define('CSV_PATH','/srv/www/dcData/'); // specify CSV file path
define('CSV_PATH','/Library/WebServer/Documents/CPMA/Dev_CPM/new_folder/'); // specify CSV file path

function logUserAction($connect,$action, $description, $user, $oldValue, $newValue, $table, $id)
    {

        $stmnt = "INSERT INTO `db_cpma`.`tbl_form6_survey_errorlog`(`username`, `action`, `description`,
      `valueBeforeAction`, `valueAfterAction`, `affectedTable`, `affectedTableId`)
        VALUES ('" . $user . "','" . $action . "','" . $description . "','" . $oldValue . "','" . $newValue . "','" . $table . "','" . $id . "')";

        $query = mysqli_query($connect,$stmnt) or mysqli_error($connect);

        return $query;
    }


$filename='test';
//$filename=$yesterday;
$csv_file = CSV_PATH . "".$filename.".csv"; // Name of  CSV file to be read should be the current date

if (!file_exists($csv_file))
{
$msg_at_readtime='No file exists for reading';

				$action = $msg_at_readtime;
				$description="No file was supllied for reading";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table='all Form6 survey Tables';
                $id='';
              //  logUserAction($connect,$action,$description,$user,$oldValue,$newValue,$table,$id);
                echo $csv_file ;
			


exit;
}
 ini_set('auto_detect_line_endings',TRUE); 

	$file = fopen($csv_file, "r");
	$header_read = true;
	$header;
	//The values and their Keys are irrelavant later on
	//readfile($csv_file);
	
//readfile($csv_file);
	$y =1;
while (($line = fgetcsv($file)) !== FALSE) {	

	
		
	  if($header_read) {
			//determin_indexes($line);
			$header_read = false;
			//echo $line[0];
			$header = $line;
			process_data_record($line,$header,$y);
			break;
	  }
	  else {

			//process_data_record($line,$header,$y);
	  //	echo $line;
			
	  }
	  $y=$y+1;
	 

	}
	
	fclose($file);
	/* ini_set('auto_detect_line_endings',FALSE); */

	
	//Function to help in display of the SQL queries
	 function fixtags($text){
	$text = htmlspecialchars($text);
	$text = preg_replace("/=/", "=\"\"", $text);
	$text = preg_replace("/&quot;/", "&quot;\"", $text);
	$tags = "/&lt;(\/|)(\w*)(\ |)(\w*)([\\\=]*)(?|(\")\"&quot;\"|)(?|(.*)?&quot;(\")|)([\ ]?)(\/|)&gt;/i";
	$replacement = "<$1$2$3$4$5$6$7$8$9$10>";
	$text = preg_replace($tags, $replacement, $text);
	$text = preg_replace("/=\"\"/", "=", $text);
	return $text;
	}
	 
	 
	function removeWhiteSpaces($string){
					$newString=preg_replace('/\s+/', '', $string);
				return $newString;
				
	}

	function converStringToInt($string){
			$newString = intval($string);
		return $newString;
		
	}

	function converStringToFloat($string){
			$newString = floatval($string);
			$finalValue=number_format($newString, 12, '.', '');
		return $finalValue;
		
	}
	
	

	function converStringToMysqlInsertSafe($link,$string){
			$newString = htmlspecialchars(addslashes($string));
			$finalString=mysqli_real_escape_string($link, $newString);
		return $finalString;
		
	}

	function dateConversion($dateString){
		$newDate = @date('Y-m-d', @strtotime($dateString));
		return $newDate;
	}
	
	 
	function process_data_record($record,$header,$y) {


		//Pick Ugandan time
		date_default_timezone_set("Etc/GMT-3");
		$connect = mysqli_connect("localhost",  "root", "admin", "db_cpma");
		//$connect = mysqli_connect('localhost','root','cpmmisV1','db_cpmadummy');

		if (!$connect)
		{
		$msg_at_readtime='Error in connectivity';
		
			$action = $msg_at_readtime;
				$description="Failure in Connecting to the MIS database";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table='all Form6 survey Tables';
                $id='';

                echo $action;
               // logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			
		
		}
		

		
		$msg_at_readtime='none';
		$today=date('Y-m-d');
		$yesterday=date('Y-m-d',strtotime("-1 days"));
		$timestamp=date('Y-m-d h:i:s');
		$fk_attribute = $y;

		

			
		$table1='tbl_form6_survey_data';
		$table2='tbl_form6_survey_mapping';
		$table3='tbl_form6_maize';
		$table4='tbl_form6_beans';
		$table5='tbl_form6_coffee';
		$table6='tbl_form6_survey_questions';
		
		
		//==============insert values into $table1==========================
			
			

$stable1= "INSERT INTO ".$table2." (
`question`,`answer`,`display`
)VALUES";
for($i=0;$i<sizeof($header);$i++){
	if($i== (sizeof($header)-1)){
		$stable1.="('".$header[$i]."',
'ans_".($i+1)."','yes')";

	}else{
		$stable1.="('".$header[$i]."',
'ans_".($i+1)."','yes'),";

	}

}

	//echo $stable1;
$a=mysqli_query($connect, $stable1) or die (mysqli_error($connect));
			

	//	}
					
					//============== end of insert values into $table1===================or die (mysqli_error($connect))

				
		  
		
		
		/*}else{
			
			//insert into the form6 survey error log table
			
				$action = "Could not Save Form6 Survey Data because of Incorrect farmer Code:(".$_SESSION['farmer_code'].")";
                $description="Error on Saving because of Incorrect Farmer Code";
                $user=$compiled_by;
                $oldValue='';
                $newValue='';
                $table='all Form6 survey Tables';
                $id='';
              // logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                echo $action;
			
		}*/
		
		// Commit transaction
		//@mysqli_commit($connect);
	}	
		
		// $csv_file='/srv/www/dcData/'.$yesterday.'.csv';
		// //transfer the file after copying
		// $from=$csv_file;
		// $newFilename=date('Y-m-d h_i_s');
		// //$to='/srv/www/htdocs/Old_Sys/ShorelineDataBackup/'.$newFilename.'.csv';
		// $to='/srv/www/htdocs/demo/Dev_CPM/ShorelineDataBackupDemo/'.$newFilename.'.csv';
		// copy($from, $to);
		// echo fixtags($stable1)."<br/>";
		// echo fixtags($stable2)."<br/>";
		// echo fixtags($stable3)."<br/>";
		// echo fixtags($stable4)."<br/>";
		// echo fixtags($stable5)."<br/>";
		 
		 
		// if (file_exists($csv_file)) {
		// unlink($csv_file);
		// }   
		echo "File data successfully imported to database!!";
		mysqli_close($connect);  // closing connection

	
		 
	
?>


