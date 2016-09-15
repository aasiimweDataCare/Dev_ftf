<?php
date_default_timezone_set("Etc/GMT-3");
global $connect;
$connect = mysqli_connect("localhost", "root", "craiwrut", "db_cpma");
$filename='farmers';
$today=date('Y-m-d');
define('CSV_PATH','E:/wamp64/www/Dev_ftf/Dev_CPM/'); 


$csv_file = CSV_PATH . "".$filename.".csv"; 

ini_set('auto_detect_line_endings',TRUE); 

	$file = fopen($csv_file, "r");
	$header_read = false;
	
	$index_mapping = array(
							'frameno' => 0, 
							'tbl_farmersid' => 1,
							'tbl_tradersid' => 2,
							'tbl_villageagentid' => 3,
							
							);
/* readfile($csv_file); */
$i=0;

while (($line = fgetcsv($file)) !== FALSE) {		
		
	  if(!$header_read) {
			determin_indexes($line);
			$header_read = true;
	  }
	  else {


			$stable1.= process_data_record($line,$i);

			
			
	  }
	 
$i++;
	}
	echo $stable1;
	 //$a=mysqli_query($connect, $stable1) or die (mysqli_error($connect)); 
	
	fclose($file);
	
	function determin_indexes($header) {
		global $index_mapping;

		
		$index_mapping['frameno'] = array_search('frameno', $header); 
		$index_mapping['tbl_farmersid'] = array_search('tbl_farmersid', $header);	
		$index_mapping['tbl_tradersid'] = array_search('tbl_tradersid', $header);	
		$index_mapping['tbl_villageagentid'] = array_search('tbl_villageagentid', $header);	
		
		
	}
	
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
	 
function process_data_record($record,$i) {
	global $index_mapping;
	
	date_default_timezone_set("Etc/GMT-3");
	$connect = mysqli_connect("localhost",  "root", "admin", "db_cpma");

	if (!$connect)
	{
	$msg_at_readtime='Error in connectivity';			
	
	}



$msg_at_readtime='none';
$today=date('Y-m-d');
$yesterday=date('Y-m-d',strtotime("-1 days"));
$timestamp=date('Y-m-d h:i:s');
@mysqli_autocommit($connect,FALSE);
		
$table1='tbl_farmers';
$tbl_farmersid=($record[$index_mapping['tbl_farmersid']]); 	 
$tbl_tradersid=($record[$index_mapping['tbl_tradersid']]); 	
$tbl_villageagentid=($record[$index_mapping['tbl_villageagentid']]); 	

//clean id's
$tbl_farmersId=converStringToInt(removeWhiteSpaces($tbl_farmersid));
$tbl_tradersid=converStringToInt(removeWhiteSpaces($tbl_tradersid));
$tbl_villageagentid=converStringToInt(removeWhiteSpaces($tbl_villageagentid));


if (is_numeric($tbl_farmersId)) {			

	$stable1= " update `tbl_farmers` 
	set `tbl_villageAgentId`='".$tbl_villageagentid."' 
	where `tbl_farmersId` ='".$tbl_farmersId."';<br/>";					
}
return $stable1;
}	

	
?>


