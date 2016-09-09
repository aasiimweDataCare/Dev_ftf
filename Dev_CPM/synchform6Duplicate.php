<?php


define('CSV_PATH','/srv/www/htdocs/grameenDataBackup/'); // specify CSV file path
//define('CSV_PATH','C:/wamp/www/Dev_CPM/grameenDataBackUp/'); // specify CSV file path
//define('CSV_PATH','C:/form6ToBeProcessed/'); // specify CSV file path
$filename="2015-10-22 01_00_01";
$csv_file = CSV_PATH . "".$filename.".csv"; // Name of  CSV file to be read should be the current date
if (!file_exists($csv_file))
{
$msg_at_readtime='No file exists for reading';
exit;
}

	$file = fopen($csv_file, 'r');
	$header_read = false;
	//The values and their Keys are irrelavant later on
	$index_mapping = array(
							'pk_patId' => 0, 
							'farmer_code' => 1,
							'interview_date' => 2,
							'respondent' => 3,
							'farmer_crop_maize' => 4,
							'farmer_crop_beans' => 5,
							'farmer_crop_coffee' => 6,
							'maize_acreage' => 7,
							'maize_acreage_mapped' => 8,
							'maize_improved_seeds' => 9,
							'maize_improved_acreage' => 10,
							'maize_improved_acreage_mapped' => 11,
							'maize_improved_cost' => 12, 
							'maize_seed_supplier' => 13, 
							'maize_seed_supplier_other' => 14,
							'maize_benefits' => 15, 
							'maize_benefits_other' => 16,
							'maize_fetilizer_use' => 17,
							'maize_acreage_fertilizer' => 18, 
							'maize_fertilizer_cost' => 19, 
							'maize_fertilizer_supplier' => 20, 
							'maize_fertilizer_supplier_other' => 21,
							'maize_fertilizer_benefits' => 22, 
							'maize_fertilizer_benefits_other' => 23,
							'maize_chemical_use' => 24,
							'maize_chemical_acreage' => 25, 
							'maize_chemical_acreage_mapped' => 26,
							'maize_chemical_cost' => 27, 
							'maize_chemical_supplier' => 28, 
							'maize_chemical_supplier_other' => 29,
							'maize_chemical_benefits' => 30, 
							'maize_chemical_benefits_other' => 31,
							'maize_mgt_practices' => 32,
							'maize_mgt_practices_acreage' => 33, 
							'maize_mgt_practices_acreage_mapped' => 34,
							'maize_cost_ict' => 35, 
							'maize_ict_supplier' => 36, 
							'maize_ict_supplier_other' => 37,
							'maize_mgt_benefits' => 38, 
							'maize_mgt_benefits_other' => 39,
							'maize_machinery_use' => 40,
							'maize_machinery_acreage' => 41, 
							'maize_machinery_acreage_mapped' => 42,
							'maize_machinery_cost' => 43, 
							'maize_machinery_supplier' => 44, 
							'maize_machinery_supplier_other' => 45,
							'maize_machinery_benefits' => 46, 
							'maize_machinery_benefits_other' => 47,
							'maize_harvested' => 48, 
							'maize_sold' => 49, 
							'maize_sold_price' => 50, 
							'maize_harvest_loss' => 51, 
							'beans_acreage' => 52, 
							'beans_acreage_mapped' => 53,
							'beans_improved_seeds' => 54,
							'beans_improved_acreage' => 55, 
							'beans_improved_acreage_mapped' => 56,
							'beans_improved_cost' => 57, 
							'beans_seed_supplier' => 58, 
							'beans_seed_supplier_other' => 59,
							'beans_benefits' => 60, 
							'beans_benefits_other' => 61,
							'beans_fetilizer_use' => 62,
							'beans_acreage_fertilizer' => 63, 
							'beans_fertilizer_cost' => 64, 
							'beans_fertilizer_supplier' => 65, 
							'beans_fertilizer_supplier_other' => 66,
							'beans_fertilizer_benefits' => 67, 
							'beans_fertilizer_benefits_other' => 68,
							'beans_chemical_use' => 69,
							'beans_chemical_acreage' => 70, 
							'beans_chemical_acreage_mapped' => 71,
							'beans_chemical_cost' => 72, 
							'beans_chemical_supplier' => 73, 
							'beans_chemical_supplier_other' => 74,
							'beans_chemical_benefits' => 75, 
							'beans_chemical_benefits_other' => 76,
							'beans_mgt_practices' => 77,
							'beans_mgt_practices_acreage' => 78, 
							'beans_mgt_practices_acreage_mapped' => 79,
							'beans_cost_ict' => 80, 
							'beans_ict_supplier' => 81, 
							'beans_ict_supplier_other' => 82,
							'beans_mgt_benefits' => 83, 
							'beans_mgt_benefits_other' => 84,
							'beans_machinery_use' => 85,
							'beans_machinery_acreage' => 86, 
							'beans_machinery_acreage_mapped' => 87,
							'beans_machinery_cost' => 88, 
							'beans_machinery_supplier' => 89, 
							'beans_machinery_supplier_other' => 90,
							'beans_machinery_benefits' => 91, 
							'beans_machinery_benefits_other' => 92,
							'beans_harvested' => 93, 
							'beans_sold' => 94, 
							'beans_sold_price' => 95, 
							'beans_harvest_lost' => 96, 
							'coffee_acreage' => 97, 
							'coffee_acreage_mapped' => 98,
							'coffee_improved_seeds' => 99,
							'coffee_improved_acreage' => 100, 
							'coffee_improved_acreage_mapped' => 101,
							'coffee_improved_cost' => 102, 
							'coffee_seed_supplier' => 103, 
							'coffee_seed_supplier_other' => 104,
							'coffee_benefits' => 105, 
							'coffee_benefits_other' => 106,
							'coffee_fetilizer_use' => 107,
							'coffee_acreage_fertilizer' => 108, 
							'coffee_fertilizer_cost' => 109, 
							'coffee_fertilizer_supplier' => 110, 
							'coffee_fertilizer_supplier_other' => 111,
							'coffee_fertilizer_benefits' => 112, 
							'coffee_fertilizer_benefits_other' => 113,
							'coffee_chemical_use' => 114,
							'coffee_chemical_acreage' => 115, 
							'coffee_chemical_acreage_mapped' => 116,
							'coffee_chemical_cost' => 117, 
							'coffee_chemical_supplier' => 118, 
							'coffee_chemical_supplier_other' => 119,
							'coffee_chemical_benefits' => 120,
							'coffee_chemical_benefits_other' => 121,
							'coffee_mgt_practices' => 122,
							'coffee_mgt_practices_acreage' => 123, 
							'coffee_mgt_practices_acreage_mapped' => 124,
							'coffee_cost_ict' => 125, 
							'coffee_ict_supplier' => 126, 
							'coffee_ict_supplier_other' => 127,
							'coffee_mgt_benefits' => 128, 
							'coffee_mgt_benefits_other' => 129,
							'coffee_machinery_use' => 130,
							'coffee_machinery_acreage' => 131, 
							'coffee_machinery_acreage_mapped' => 132,
							'coffee_machinery_cost' => 133, 
							'coffee_machinery_supplier' => 134, 
							'coffee_machinery_supplier_other' => 135,
							'coffee_machinery_benefits' => 136, 
							'coffee_machinery_benefits_other' => 137,
							'coffee_harvested' => 138, 
							'coffee_sold' => 139, 
							'coffee_sold_price' => 140, 
							'coffee_harvest_lost' => 141, 
							'loan_access' => 142,
							'loan_accessed' => 143, 
							'implemented_mgt_climate' => 144,
							'implemented_mgt_climate_action' => 145, 
							'implemented_mgt_climate_action_other' => 146,
							'gps' => 147, 
							'compiled_by' => 148, 
							'va' => 149, 
							'telephone' => 150
							
							);
	while (($line = fgetcsv($file)) !== FALSE) {
	  if(!$header_read) {
			determin_indexes($line);
			$header_read = true;
	  }
	  else {
			process_data_record($line);
	  }
	}
	
	fclose($file);

	
	function determin_indexes($header) {
		global $index_mapping;
		
		
		$index_mapping['farmer_code'] = array_search('farmer_code', $header);
		$index_mapping['maize_chemical_cost'] = array_search('maize_chemical_cost', $header);
		}
	
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
	 
	 
	function process_data_record($record) {
		global $index_mapping;
		date_default_timezone_set("Etc/GMT-3");
		$connect = mysql_connect('localhost','root','cpmmisV1')or die(mysql_error());
		//$connect = mysql_connect('localhost','root','craiwrut')or die(mysql_error());

		if (!$connect)
		{
		$msg_at_readtime=mysql_error();
		}
		
		$cid =mysql_select_db('db_cpma',$connect); 
		@mysql_query("SET AUTOCOMMIT=FALSE");
		@mysql_query("BEGIN TRANSACTION");

		//sanitize the data aka validation before insert
		
		  $farmer_code=((($record[$index_mapping['farmer_code']])!='' or !(empty($record[$index_mapping['farmer_code']])))?$record[$index_mapping['farmer_code']]:null); 
		  $maize_chemical_cost=((($record[$index_mapping['maize_chemical_cost']])!='' or !(empty($record[$index_mapping['maize_chemical_cost']])))?$record[$index_mapping['maize_chemical_cost']]:null);   
		  
		  
		 //test the farmer code existance
		
		 
		  if (is_numeric($farmer_code)) {
		
		//==============insert values into $table5===================
		$stable3= "update `tbl_frm6particulars` as `p`
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`m`.`fk_patid`)
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
		set
		`m`.`maize_chemical_cost` = '".floatval(trim($maize_chemical_cost))."'
		where `p`.`farmer_code`='".trim($farmer_code)."' 
		and `p`.`farmer_code` = `m`.`farmer_code`
		and `m`.`farmer_code` = `b`.`farmer_code`
		and `b`.`farmer_code` = `c`.`farmer_code`";
		
		$e=mysql_query(fixtags($stable3), $connect )or die(mysql_error());
		//============== end of insert values into $table5===================
		
		}else{
			$msg_at_readtime.="Incorrect Farmer Code ";
			echo"<br/>Failed to perform operation because of ".$msg_at_readtime;
		}
		
		@mysql_query("COMMIT");
		@mysql_query("SET AUTOCOMMIT=TRUE");
		print_r('<br/>');
		echo "<br/>".fixtags($stable3); 
		 
		 echo "<br/>File data successfully imported to database!!";
		mysql_close($connect);  // closing connection
		 
	}
?>