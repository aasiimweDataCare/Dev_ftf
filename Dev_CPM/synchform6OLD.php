<?php
//Pick Ugandan time
date_default_timezone_set("Etc/GMT-3");
$connect = mysql_connect('localhost','root','cpmmisV1')or die(mysql_error());
@mysql_select_db('db_cpma',$connect);
//$connect = mysql_connect('localhost','root','craiwrut')or die(mysql_error());
$today=date('Y-m-d');
$yesterday=date('Y-m-d',strtotime("-1 days"));
$timestamp=date('Y-m-d h:i:s');
define('CSV_PATH','/srv/www/dcData/'); // specify CSV file path
//define('CSV_PATH','C:/wamp/www/trial/'); // specify CSV file path

function logUserAction($action, $description, $user, $oldValue, $newValue, $table, $id)
    {

        $stmnt = "INSERT INTO `db_cpma`.`tbl_form6_survey_errorlog`(`username`, `action`, `description`,
      `valueBeforeAction`, `valueAfterAction`, `affectedTable`, `affectedTableId`)
        VALUES ('" . $user . "','" . $action . "','" . $description . "','" . $oldValue . "','" . $newValue . "','" . $table . "','" . $id . "')";

        $query = mysql_query($stmnt) or die;

        return $query;
    }


$filename=$yesterday;
//$filename="2015-09-18";
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
                logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			


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
							'telephone' => 150,
							'server_entry_time' => 151
							
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
		
		$index_mapping['pk_patId'] = array_search('pk_patId', $header);
		$index_mapping['farmer_code'] = array_search('farmer_code', $header);
		$index_mapping['interview_date'] = array_search('interview_date', $header);
		$index_mapping['respondent'] = array_search('respondent', $header);
		$index_mapping['farmer_crop_maize'] = array_search('farmer_crop_maize', $header);
		$index_mapping['farmer_crop_beans'] = array_search('farmer_crop_beans', $header);
		$index_mapping['farmer_crop_coffee'] = array_search('farmer_crop_coffee', $header);
		$index_mapping['maize_acreage'] = array_search('maize_acreage', $header);
		$index_mapping['maize_acreage_mapped'] = array_search('maize_acreage_mapped', $header);
		$index_mapping['maize_improved_seeds'] = array_search('maize_improved_seeds', $header);
		$index_mapping['maize_improved_acreage'] = array_search('maize_improved_acreage', $header);
		$index_mapping['maize_improved_acreage_mapped'] = array_search('maize_improved_acreage_mapped', $header);
		$index_mapping['maize_improved_cost'] = array_search('maize_improved_cost', $header);
		$index_mapping['maize_seed_supplier'] = array_search('maize_seed_supplier', $header);
		$index_mapping['maize_seed_supplier_other'] = array_search('maize_seed_supplier_other', $header);
		$index_mapping['maize_benefits'] = array_search('maize_benefits', $header);
		$index_mapping['maize_benefits_other'] = array_search('maize_benefits_other', $header);
		$index_mapping['maize_fetilizer_use'] = array_search('maize_fetilizer_use', $header);
		$index_mapping['maize_acreage_fertilizer'] = array_search('maize_acreage_fertilizer', $header);
		$index_mapping['maize_fertilizer_cost'] = array_search('maize_fertilizer_cost', $header);
		$index_mapping['maize_fertilizer_supplier'] = array_search('maize_fertilizer_supplier', $header);
		$index_mapping['maize_fertilizer_supplier_other'] = array_search('maize_fertilizer_supplier_other', $header);
		$index_mapping['maize_fertilizer_benefits'] = array_search('maize_fertilizer_benefits', $header);
		$index_mapping['maize_fertilizer_benefits_other'] = array_search('maize_fertilizer_benefits_other', $header);
		$index_mapping['maize_chemical_use'] = array_search('maize_chemical_use', $header);
		$index_mapping['maize_chemical_acreage'] = array_search('maize_chemical_acreage', $header);
		$index_mapping['maize_chemical_acreage_mapped'] = array_search('maize_chemical_acreage_mapped', $header);
		$index_mapping['maize_chemical_cost'] = array_search('maize_chemical_cost', $header);
		$index_mapping['maize_chemical_supplier'] = array_search('maize_chemical_supplier', $header);
		$index_mapping['maize_chemical_supplier_other'] = array_search('maize_chemical_supplier_other', $header);
		$index_mapping['maize_chemical_benefits'] = array_search('maize_chemical_benefits', $header);
		$index_mapping['maize_chemical_benefits_other'] = array_search('maize_chemical_benefits_other', $header);
		$index_mapping['maize_mgt_practices'] = array_search('maize_mgt_practices', $header);
		$index_mapping['maize_mgt_practices_acreage'] = array_search('maize_mgt_practices_acreage', $header); 
		$index_mapping['maize_mgt_practices_acreage_mapped'] = array_search('maize_mgt_practices_acreage_mapped', $header);
		$index_mapping['maize_cost_ict'] = array_search('maize_cost_ict', $header);
		$index_mapping['maize_ict_supplier'] = array_search('maize_ict_supplier', $header);
		$index_mapping['maize_ict_supplier_other'] = array_search('maize_ict_supplier_other', $header);
		$index_mapping['maize_mgt_benefits'] = array_search('maize_mgt_benefits', $header);
		$index_mapping['maize_mgt_benefits_other'] = array_search('maize_mgt_benefits_other', $header);
		$index_mapping['maize_machinery_use'] = array_search('maize_machinery_use', $header);
		$index_mapping['maize_machinery_acreage'] = array_search('maize_machinery_acreage', $header);
		$index_mapping['maize_machinery_acreage_mapped'] = array_search('maize_machinery_acreage_mapped', $header);
		$index_mapping['maize_machinery_cost'] = array_search('maize_machinery_cost', $header);
		$index_mapping['maize_machinery_supplier'] = array_search('maize_machinery_supplier', $header);
		$index_mapping['maize_machinery_supplier_other'] = array_search('maize_machinery_supplier_other', $header);
		$index_mapping['maize_machinery_benefits'] = array_search('maize_machinery_benefits', $header);
		$index_mapping['maize_machinery_benefits_other'] = array_search('maize_machinery_benefits_other', $header);
		$index_mapping['maize_harvested'] = array_search('maize_harvested', $header);
		$index_mapping['maize_sold'] = array_search('maize_sold', $header);
		$index_mapping['maize_sold_price'] = array_search('maize_sold_price', $header);
		$index_mapping['maize_harvest_loss'] = array_search('maize_harvest_loss', $header);
		$index_mapping['beans_acreage'] = array_search('beans_acreage', $header);
		$index_mapping['beans_acreage_mapped'] = array_search('beans_acreage_mapped', $header);
		$index_mapping['beans_improved_seeds'] = array_search('beans_improved_seeds', $header);
		$index_mapping['beans_improved_acreage'] = array_search('beans_improved_acreage', $header);
		$index_mapping['beans_improved_acreage_mapped'] = array_search('beans_improved_acreage_mapped', $header);
		$index_mapping['beans_improved_cost'] = array_search('beans_improved_cost', $header);
		$index_mapping['beans_seed_supplier'] = array_search('beans_seed_supplier', $header);
		$index_mapping['beans_seed_supplier_other'] = array_search('beans_seed_supplier_other', $header);
		$index_mapping['beans_benefits'] = array_search('beans_benefits', $header);
		$index_mapping['beans_benefits_other'] = array_search('beans_benefits_other', $header);
		$index_mapping['beans_fetilizer_use'] = array_search('beans_fetilizer_use', $header);
		$index_mapping['beans_acreage_fertilizer'] = array_search('beans_acreage_fertilizer', $header);
		$index_mapping['beans_fertilizer_cost'] = array_search('beans_fertilizer_cost', $header);
		$index_mapping['beans_fertilizer_supplier'] = array_search('beans_fertilizer_supplier', $header);
		$index_mapping['beans_fertilizer_supplier_other'] = array_search('beans_fertilizer_supplier_other', $header);
		$index_mapping['beans_fertilizer_benefits'] = array_search('beans_fertilizer_benefits', $header);
		$index_mapping['beans_fertilizer_benefits_other'] = array_search('beans_fertilizer_benefits_other', $header);
		$index_mapping['beans_chemical_use'] = array_search('beans_chemical_use', $header);
		$index_mapping['beans_chemical_acreage'] = array_search('beans_chemical_acreage', $header);
		$index_mapping['beans_chemical_acreage_mapped'] = array_search('beans_chemical_acreage_mapped', $header);
		$index_mapping['beans_chemical_cost'] = array_search('beans_chemical_cost', $header); 
		$index_mapping['beans_chemical_supplier'] = array_search('beans_chemical_supplier', $header);
		$index_mapping['beans_chemical_supplier_other'] = array_search('beans_chemical_supplier_other', $header);
		$index_mapping['beans_chemical_benefits'] = array_search('beans_chemical_benefits', $header);
		$index_mapping['beans_chemical_benefits_other'] = array_search('beans_chemical_benefits_other', $header);
		$index_mapping['beans_mgt_practices'] = array_search('beans_mgt_practices', $header);
		$index_mapping['beans_mgt_practices_acreage'] = array_search('beans_mgt_practices_acreage', $header); 
		$index_mapping['beans_mgt_practices_acreage_mapped'] = array_search('beans_mgt_practices_acreage_mapped', $header);
		$index_mapping['beans_cost_ict'] = array_search('beans_cost_ict', $header); 
		$index_mapping['beans_ict_supplier'] = array_search('beans_ict_supplier', $header);
		$index_mapping['beans_ict_supplier_other'] = array_search('beans_ict_supplier_other', $header);
		$index_mapping['beans_mgt_benefits'] = array_search('beans_mgt_benefits', $header);
		$index_mapping['beans_mgt_benefits_other'] = array_search('beans_mgt_benefits_other', $header);
		$index_mapping['beans_machinery_use'] = array_search('beans_machinery_use', $header);
		$index_mapping['beans_machinery_acreage'] = array_search('beans_machinery_acreage', $header); 
		$index_mapping['beans_machinery_acreage_mapped'] = array_search('beans_machinery_acreage_mapped', $header);
		$index_mapping['beans_machinery_cost'] = array_search('beans_machinery_cost', $header); 
		$index_mapping['beans_machinery_supplier'] = array_search('beans_machinery_supplier', $header);
		$index_mapping['beans_machinery_supplier_other'] = array_search('beans_machinery_supplier_other', $header);
		$index_mapping['beans_machinery_benefits'] = array_search('beans_machinery_benefits', $header);
		$index_mapping['beans_machinery_benefits_other'] = array_search('beans_machinery_benefits_other', $header);
		$index_mapping['beans_harvested'] = array_search('beans_harvested', $header); 
		$index_mapping['beans_sold'] = array_search('beans_sold', $header);
		$index_mapping['beans_sold_price'] = array_search('beans_sold_price', $header);
		$index_mapping['beans_harvest_lost'] = array_search('beans_harvest_lost', $header);
		$index_mapping['coffee_acreage'] = array_search('coffee_acreage', $header);
		$index_mapping['coffee_acreage_mapped'] = array_search('coffee_acreage_mapped', $header);
		$index_mapping['coffee_improved_seeds'] = array_search('coffee_improved_seeds', $header);
		$index_mapping['coffee_improved_acreage'] = array_search('coffee_improved_acreage', $header);
		$index_mapping['coffee_improved_acreage_mapped'] = array_search('coffee_improved_acreage_mapped', $header);
		$index_mapping['coffee_improved_cost'] = array_search('coffee_improved_cost', $header);
		$index_mapping['coffee_seed_supplier'] = array_search('coffee_seed_supplier', $header);
		$index_mapping['coffee_seed_supplier_other'] = array_search('coffee_seed_supplier_other', $header);
		$index_mapping['coffee_benefits'] = array_search('coffee_benefits', $header);
		$index_mapping['coffee_benefits_other'] = array_search('coffee_benefits_other', $header);
		$index_mapping['coffee_fetilizer_use'] = array_search('coffee_fetilizer_use', $header);
		$index_mapping['coffee_acreage_fertilizer'] = array_search('coffee_acreage_fertilizer', $header);
		$index_mapping['coffee_fertilizer_cost'] = array_search('coffee_fertilizer_cost', $header);
		$index_mapping['coffee_fertilizer_supplier'] = array_search('coffee_fertilizer_supplier', $header);
		$index_mapping['coffee_fertilizer_supplier_other'] = array_search('coffee_fertilizer_supplier_other', $header);
		$index_mapping['coffee_fertilizer_benefits'] = array_search('coffee_fertilizer_benefits', $header);
		$index_mapping['coffee_fertilizer_benefits_other'] = array_search('coffee_fertilizer_benefits_other', $header);
		$index_mapping['coffee_chemical_use'] = array_search('coffee_chemical_use', $header);
		$index_mapping['coffee_chemical_acreage'] = array_search('coffee_chemical_acreage', $header);
		$index_mapping['coffee_chemical_acreage_mapped'] = array_search('coffee_chemical_acreage_mapped', $header);
		$index_mapping['coffee_chemical_cost'] = array_search('coffee_chemical_cost', $header); 
		$index_mapping['coffee_chemical_supplier'] = array_search('coffee_chemical_supplier', $header);
		$index_mapping['coffee_chemical_supplier_other'] = array_search('coffee_chemical_supplier_other', $header);
		$index_mapping['coffee_chemical_benefits'] = array_search('coffee_chemical_benefits', $header);
		$index_mapping['coffee_chemical_benefits_other'] = array_search('coffee_chemical_benefits_other', $header);
		$index_mapping['coffee_mgt_practices'] = array_search('coffee_mgt_practices', $header);
		$index_mapping['coffee_mgt_practices_acreage'] = array_search('coffee_mgt_practices_acreage', $header);
		$index_mapping['coffee_mgt_practices_acreage_mapped'] = array_search('coffee_mgt_practices_acreage_mapped', $header);
		$index_mapping['coffee_cost_ict'] = array_search('coffee_cost_ict', $header);
		$index_mapping['coffee_ict_supplier'] = array_search('coffee_ict_supplier', $header);
		$index_mapping['coffee_ict_supplier_other'] = array_search('coffee_ict_supplier_other', $header);
		$index_mapping['coffee_mgt_benefits'] = array_search('coffee_mgt_benefits', $header); 
		$index_mapping['coffee_mgt_benefits_other'] = array_search('coffee_mgt_benefits_other', $header);
		$index_mapping['coffee_machinery_use'] = array_search('coffee_machinery_use', $header);
		$index_mapping['coffee_machinery_acreage'] = array_search('coffee_machinery_acreage', $header);
		$index_mapping['coffee_machinery_acreage_mapped'] = array_search('coffee_machinery_acreage_mapped', $header);
		$index_mapping['coffee_machinery_cost'] = array_search('coffee_machinery_cost', $header);
		$index_mapping['coffee_machinery_supplier'] = array_search('coffee_machinery_supplier', $header);
		$index_mapping['coffee_machinery_supplier_other'] = array_search('coffee_machinery_supplier_other', $header);
		$index_mapping['coffee_machinery_benefits'] = array_search('coffee_machinery_benefits', $header);
		$index_mapping['coffee_machinery_benefits_other'] = array_search('coffee_machinery_benefits_other', $header);
		$index_mapping['coffee_harvested'] = array_search('coffee_harvested', $header);
		$index_mapping['coffee_sold'] = array_search('coffee_sold', $header);
		$index_mapping['coffee_sold_price'] = array_search('coffee_sold_price', $header);
		$index_mapping['coffee_harvest_lost'] = array_search('coffee_harvest_lost', $header);
		$index_mapping['loan_access'] = array_search('loan_access', $header);
		$index_mapping['loan_accessed'] = array_search('loan_accessed', $header);
		$index_mapping['implemented_mgt_climate'] = array_search('implemented_mgt_climate', $header);
		$index_mapping['implemented_mgt_climate_action'] = array_search('implemented_mgt_climate_action', $header); 
		$index_mapping['implemented_mgt_climate_action_other'] = array_search('implemented_mgt_climate_action_other', $header);
		$index_mapping['gps'] = array_search('gps', $header);
		$index_mapping['compiled_by'] = array_search('compiled_by', $header);
		$index_mapping['va'] = array_search('va', $header);
		$index_mapping['telephone'] = array_search('telephone', $header);
		$index_mapping['server_entry_time'] = array_search('server_entry_time', $header);
		
		
		
		
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
		
		//Pick Ugandan time
		date_default_timezone_set("Etc/GMT-3");
		// specify connection info
		$connect = mysql_connect('localhost','root','cpmmisV1')or die(mysql_error());
		//$connect = mysql_connect('localhost','root','craiwrut')or die(mysql_error());

		if (!$connect)
		{
		$msg_at_readtime=mysql_error();
		
			$action = $msg_at_readtime;
				$description="Failure in Connecting to the MIS database";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table='all Form6 survey Tables';
                $id='';
                logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			
		
		}
		$cid =mysql_select_db('db_cpma',$connect); //specify db name

		
		$msg_at_readtime='none';
		$today=date('Y-m-d');
		$yesterday=date('Y-m-d',strtotime("-1 days"));
		$timestamp=date('Y-m-d h:i:s');
		//Determining the FK's for child tables
		@mysql_query("SET AUTOCOMMIT=FALSE");
		@mysql_query("BEGIN TRANSACTION");

		$stmnt_check="SELECT MAX(`pk_patId`) as pk_patId  FROM `tbl_frm6particulars`";
		$Qcheck=@mysql_query($stmnt_check) or die(mysql_error());

		if (!$Qcheck)
				{
					$msg_at_readtime=mysql_error();
					$action = $msg_at_readtime;
					$description="A connectivity issue to the table: tbl_frm6particulars";
					$user="DataCare";
					$oldValue='';
					$newValue='';
					$table='all Form6 survey Tables';
					$id='';
					logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			
					
				}

		$y=1;
		if(@mysql_num_rows($Qcheck)>0){
				$Rcheck=mysql_fetch_array($Qcheck);
				$lastPatId=$Rcheck['pk_patId'];
				$nextPatId=($lastPatId+$y);
				$fk_patId=$nextPatId;  
			} else{
				$initialPatId=$y;
				$fk_patId=$initialPatId;  
			}
			
		$table1='tbl_frm6particulars';
		$table2='tbl_frm6gqnsandgps';
		$table3='tbl_frm6production_maize';
		$table4='tbl_frm6production_beans';
		$table5='tbl_frm6production_coffee';
		
		//sanitize the data aka validation before insert
		
		  $pk_patId=((($record[$index_mapping['pk_patId']])!='' or !(empty($record[$index_mapping['pk_patId']])))?$record[$index_mapping['pk_patId']]:null); 
		  
		  $farmer_code=((($record[$index_mapping['farmer_code']])!='' or !(empty($record[$index_mapping['farmer_code']])))?$record[$index_mapping['farmer_code']]:null); 
		  $interview_date=((($record[$index_mapping['interview_date']])!='' or  !(empty($record[$index_mapping['interview_date']])))?$record[$index_mapping['interview_date']]:$today); 
		  $respondent=((($record[$index_mapping['respondent']])!='' or !(empty($record[$index_mapping['respondent']])))?$record[$index_mapping['respondent']]:null); 
		  $farmer_crop_maize=((($record[$index_mapping['farmer_crop_maize']])!='' or !(empty($record[$index_mapping['farmer_crop_maize']])))?$record[$index_mapping['farmer_crop_maize']]:null); 
		  $farmer_crop_beans=((($record[$index_mapping['farmer_crop_beans']])!='' or !(empty($record[$index_mapping['farmer_crop_beans']])))?$record[$index_mapping['farmer_crop_beans']]:null); 
		  $farmer_crop_coffee=((($record[$index_mapping['farmer_crop_coffee']])!='' or !(empty($record[$index_mapping['farmer_crop_coffee']])))?$record[$index_mapping['farmer_crop_coffee']]:null); 
		  $maize_acreage=((($record[$index_mapping['maize_acreage']])!='' or !(empty($record[$index_mapping['maize_acreage']])))?$record[$index_mapping['maize_acreage']]:null);   
		  $maize_acreage_mapped=((($record[$index_mapping['maize_acreage_mapped']])!='' or !(empty($record[$index_mapping['maize_acreage_mapped']])))?$record[$index_mapping['maize_acreage_mapped']]:null); 
		  $maize_improved_seeds=((($record[$index_mapping['maize_improved_seeds']])!='' or !(empty($record[$index_mapping['maize_improved_seeds']])))?$record[$index_mapping['maize_improved_seeds']]:null); 
		  $maize_improved_acreage=((($record[$index_mapping['maize_improved_acreage']])!='' or !(empty($record[$index_mapping['maize_improved_acreage']])))?$record[$index_mapping['maize_improved_acreage']]:null);   
		  $maize_improved_acreage_mapped=((($record[$index_mapping['maize_improved_acreage_mapped']])!='' or !(empty($record[$index_mapping['maize_improved_acreage_mapped']])))?$record[$index_mapping['maize_improved_acreage_mapped']]:null); 
		  $maize_improved_cost=((($record[$index_mapping['maize_improved_cost']])!='' or !(empty($record[$index_mapping['maize_improved_cost']])))?$record[$index_mapping['maize_improved_cost']]:null);   
		  $maize_seed_supplier=((($record[$index_mapping['maize_seed_supplier']])!='' or !(empty($record[$index_mapping['maize_seed_supplier']])))?$record[$index_mapping['maize_seed_supplier']]:null);   
		  $maize_seed_supplier_other=((($record[$index_mapping['maize_seed_supplier_other']])!='' or !(empty($record[$index_mapping['maize_seed_supplier_other']])))?$record[$index_mapping['maize_seed_supplier_other']]:null);  
		  $maize_seed_supplier_other=($maize_seed_supplier_other==$pk_patId)?false:true;
		  
		  $maize_benefits=((($record[$index_mapping['maize_benefits']])!='' or !(empty($record[$index_mapping['maize_benefits']])))?$record[$index_mapping['maize_benefits']]:null);   
		  $maize_benefits_other=((($record[$index_mapping['maize_benefits_other']])!='' or !(empty($record[$index_mapping['maize_benefits_other']])))?$record[$index_mapping['maize_benefits_other']]:null);  
		  $maize_fetilizer_use=((($record[$index_mapping['maize_fetilizer_use']])!='' or !(empty($record[$index_mapping['maize_fetilizer_use']])))?$record[$index_mapping['maize_fetilizer_use']]:null); 
		  $maize_fetilizer_use=($maize_fetilizer_use==$pk_patId)?false:true;
		  
		  $maize_acreage_fertilizer=((($record[$index_mapping['maize_acreage_fertilizer']])!='' or !(empty($record[$index_mapping['maize_acreage_fertilizer']])))?$record[$index_mapping['maize_acreage_fertilizer']]:null);   
		  $maize_fertilizer_cost=((($record[$index_mapping['maize_fertilizer_cost']])!='' or !(empty($record[$index_mapping['maize_fertilizer_cost']])))?$record[$index_mapping['maize_fertilizer_cost']]:null);   
		  $maize_fertilizer_supplier=((($record[$index_mapping['maize_fertilizer_supplier']])!='' or !(empty($record[$index_mapping['maize_fertilizer_supplier']])))?$record[$index_mapping['maize_fertilizer_supplier']]:null);   
		  $maize_fertilizer_supplier_other=((($record[$index_mapping['maize_fertilizer_supplier_other']])!='' or !(empty($record[$index_mapping['maize_fertilizer_supplier_other']])))?$record[$index_mapping['maize_fertilizer_supplier_other']]:null);  
		  $maize_fertilizer_supplier_other=($maize_fertilizer_supplier_other==$pk_patId)?false:true;
		  
		  $maize_fertilizer_benefits=((($record[$index_mapping['maize_fertilizer_benefits']])!='' or !(empty($record[$index_mapping['maize_fertilizer_benefits']])))?$record[$index_mapping['maize_fertilizer_benefits']]:null);   
		  $maize_fertilizer_benefits_other=((($record[$index_mapping['maize_fertilizer_benefits_other']])!='' or !(empty($record[$index_mapping['maize_fertilizer_benefits_other']])))?$record[$index_mapping['maize_fertilizer_benefits_other']]:null);  
		  $maize_chemical_use=((($record[$index_mapping['maize_chemical_use']])!='' or !(empty($record[$index_mapping['maize_chemical_use']])))?$record[$index_mapping['maize_chemical_use']]:null); 
		  $maize_chemical_acreage=((($record[$index_mapping['maize_chemical_acreage']])!='' or !(empty($record[$index_mapping['maize_chemical_acreage']])))?$record[$index_mapping['maize_chemical_acreage']]:null);   
		  $maize_chemical_acreage_mapped=((($record[$index_mapping['maize_chemical_acreage_mapped']])!='' or !(empty($record[$index_mapping['maize_chemical_acreage_mapped']])))?$record[$index_mapping['maize_chemical_acreage_mapped']]:null); 
		  $maize_chemical_cost=((($record[$index_mapping['maize_chemical_cost']])!='' or !(empty($record[$index_mapping['maize_chemical_cost']])))?$record[$index_mapping['maize_chemical_cost']]:null); 
		  $maize_chemical_cost=($maize_chemical_cost==$pk_patId)?false:true;
		  
		  $maize_chemical_supplier=((($record[$index_mapping['maize_chemical_supplier']])!='' or !(empty($record[$index_mapping['maize_chemical_supplier']])))?$record[$index_mapping['maize_chemical_supplier']]:null);   
		  $maize_chemical_supplier_other=((($record[$index_mapping['maize_chemical_supplier_other']])!='' or !(empty($record[$index_mapping['maize_chemical_supplier_other']])))?$record[$index_mapping['maize_chemical_supplier_other']]:null);  
		  $maize_chemical_supplier_other=($maize_chemical_supplier_other==$pk_patId)?false:true;
		  
		  $maize_chemical_benefits=((($record[$index_mapping['maize_chemical_benefits']])!='' or !(empty($record[$index_mapping['maize_chemical_benefits']])))?$record[$index_mapping['maize_chemical_benefits']]:null);   
		  $maize_chemical_benefits_other=((($record[$index_mapping['maize_chemical_benefits_other']])!='' or !(empty($record[$index_mapping['maize_chemical_benefits_other']])))?$record[$index_mapping['maize_chemical_benefits_other']]:null);  
		  $maize_mgt_practices=((($record[$index_mapping['maize_mgt_practices']])!='' or !(empty($record[$index_mapping['maize_mgt_practices']])))?$record[$index_mapping['maize_mgt_practices']]:null); 
		  $maize_mgt_practices_acreage=((($record[$index_mapping['maize_mgt_practices_acreage']])!='' or !(empty($record[$index_mapping['maize_mgt_practices_acreage']])))?$record[$index_mapping['maize_mgt_practices_acreage']]:null);   
		  $maize_mgt_practices_acreage_mapped=((($record[$index_mapping['maize_mgt_practices_acreage_mapped']])!='' or !(empty($record[$index_mapping['maize_mgt_practices_acreage_mapped']])))?$record[$index_mapping['maize_mgt_practices_acreage_mapped']]:null); 
		  $maize_cost_ict=((($record[$index_mapping['maize_cost_ict']])!='' or !(empty($record[$index_mapping['maize_cost_ict']])))?$record[$index_mapping['maize_cost_ict']]:null);   
		  $maize_ict_supplier=((($record[$index_mapping['maize_ict_supplier']])!='' or !(empty($record[$index_mapping['maize_ict_supplier']])))?$record[$index_mapping['maize_ict_supplier']]:null);   
		  $maize_ict_supplier_other=((($record[$index_mapping['maize_ict_supplier_other']])!='' or !(empty($record[$index_mapping['maize_ict_supplier_other']])))?$record[$index_mapping['maize_ict_supplier_other']]:null);  
		  $maize_ict_supplier_other=($maize_ict_supplier_other==$pk_patId)?false:true;
		  
		  $maize_mgt_benefits=((($record[$index_mapping['maize_mgt_benefits']])!='' or !(empty($record[$index_mapping['maize_mgt_benefits']])))?$record[$index_mapping['maize_mgt_benefits']]:null);   
		  $maize_mgt_benefits_other=((($record[$index_mapping['maize_mgt_benefits_other']])!='' or !(empty($record[$index_mapping['maize_mgt_benefits_other']])))?$record[$index_mapping['maize_mgt_benefits_other']]:null);  
		  $maize_machinery_use=((($record[$index_mapping['maize_machinery_use']])!='' or !(empty($record[$index_mapping['maize_machinery_use']])))?$record[$index_mapping['maize_machinery_use']]:null); 
		  $maize_machinery_acreage=((($record[$index_mapping['maize_machinery_acreage']])!='' or !(empty($record[$index_mapping['maize_machinery_acreage']])))?$record[$index_mapping['maize_machinery_acreage']]:null);   
		  $maize_machinery_acreage_mapped=((($record[$index_mapping['maize_machinery_acreage_mapped']])!='' or !(empty($record[$index_mapping['maize_machinery_acreage_mapped']])))?$record[$index_mapping['maize_machinery_acreage_mapped']]:null); 
		  $maize_machinery_cost=((($record[$index_mapping['maize_machinery_cost']])!='' or !(empty($record[$index_mapping['maize_machinery_cost']])))?$record[$index_mapping['maize_machinery_cost']]:null);   
		  $maize_machinery_supplier=((($record[$index_mapping['maize_machinery_supplier']])!='' or !(empty($record[$index_mapping['maize_machinery_supplier']])))?$record[$index_mapping['maize_machinery_supplier']]:null);   
		  $maize_machinery_supplier_other=((($record[$index_mapping['maize_machinery_supplier_other']])!='' or !(empty($record[$index_mapping['maize_machinery_supplier_other']])))?$record[$index_mapping['maize_machinery_supplier_other']]:null);  
		  $maize_machinery_supplier_other=($maize_machinery_supplier_other==$pk_patId)?false:true;
		  
		  $maize_machinery_benefits=((($record[$index_mapping['maize_machinery_benefits']])!='' or !(empty($record[$index_mapping['maize_machinery_benefits']])))?$record[$index_mapping['maize_machinery_benefits']]:null);   
		  $maize_machinery_benefits_other=((($record[$index_mapping['maize_machinery_benefits_other']])!='' or !(empty($record[$index_mapping['maize_machinery_benefits_other']])))?$record[$index_mapping['maize_machinery_benefits_other']]:null);  
		  $maize_harvested=((($record[$index_mapping['maize_harvested']])!='' or !(empty($record[$index_mapping['maize_harvested']])))?$record[$index_mapping['maize_harvested']]:null);   
		  $maize_sold=((($record[$index_mapping['maize_sold']])!='' or !(empty($record[$index_mapping['maize_sold']])))?$record[$index_mapping['maize_sold']]:null);   
		  $maize_sold_price=((($record[$index_mapping['maize_sold_price']])!='' or !(empty($record[$index_mapping['maize_sold_price']])))?$record[$index_mapping['maize_sold_price']]:null);   
		  $maize_harvest_loss=((($record[$index_mapping['maize_harvest_loss']])!='' or !(empty($record[$index_mapping['maize_harvest_loss']])))?$record[$index_mapping['maize_harvest_loss']]:null);   
		  $beans_acreage=((($record[$index_mapping['beans_acreage']])!='' or !(empty($record[$index_mapping['beans_acreage']])))?$record[$index_mapping['beans_acreage']]:null);   
		  $beans_acreage_mapped=((($record[$index_mapping['beans_acreage_mapped']])!='' or !(empty($record[$index_mapping['beans_acreage_mapped']])))?$record[$index_mapping['beans_acreage_mapped']]:null); 
		  $beans_improved_seeds=((($record[$index_mapping['beans_improved_seeds']])!='' or !(empty($record[$index_mapping['beans_improved_seeds']])))?$record[$index_mapping['beans_improved_seeds']]:null); 
		  $beans_improved_acreage=((($record[$index_mapping['beans_improved_acreage']])!='' or !(empty($record[$index_mapping['beans_improved_acreage']])))?$record[$index_mapping['beans_improved_acreage']]:null);   
		  $beans_improved_acreage_mapped=((($record[$index_mapping['beans_improved_acreage_mapped']])!='' or !(empty($record[$index_mapping['beans_improved_acreage_mapped']])))?$record[$index_mapping['beans_improved_acreage_mapped']]:null); 
		  $beans_improved_cost=((($record[$index_mapping['beans_improved_cost']])!='' or !(empty($record[$index_mapping['beans_improved_cost']])))?$record[$index_mapping['beans_improved_cost']]:null);   
		  $beans_seed_supplier=((($record[$index_mapping['beans_seed_supplier']])!='' or !(empty($record[$index_mapping['beans_seed_supplier']])))?$record[$index_mapping['beans_seed_supplier']]:null);   
		  $beans_seed_supplier_other=((($record[$index_mapping['beans_seed_supplier_other']])!='' or !(empty($record[$index_mapping['beans_seed_supplier_other']])))?$record[$index_mapping['beans_seed_supplier_other']]:null);  
		  $beans_seed_supplier_other=($beans_seed_supplier_other==$pk_patId)?false:true;
		  
		  $beans_benefits=((($record[$index_mapping['beans_benefits']])!='' or !(empty($record[$index_mapping['beans_benefits']])))?$record[$index_mapping['beans_benefits']]:null);   
		  $beans_benefits_other=((($record[$index_mapping['beans_benefits_other']])!='' or !(empty($record[$index_mapping['beans_benefits_other']])))?$record[$index_mapping['beans_benefits_other']]:null);  
		  $beans_fetilizer_use=((($record[$index_mapping['beans_fetilizer_use']])!='' or !(empty($record[$index_mapping['beans_fetilizer_use']])))?$record[$index_mapping['beans_fetilizer_use']]:null); 
		  $beans_fetilizer_use=($beans_fetilizer_use==$pk_patId)?false:true;
		  
		  $beans_acreage_fertilizer=((($record[$index_mapping['beans_acreage_fertilizer']])!='' or !(empty($record[$index_mapping['beans_acreage_fertilizer']])))?$record[$index_mapping['beans_acreage_fertilizer']]:null);   
		  $beans_fertilizer_cost=((($record[$index_mapping['beans_fertilizer_cost']])!='' or !(empty($record[$index_mapping['beans_fertilizer_cost']])))?$record[$index_mapping['beans_fertilizer_cost']]:null);   
		  $beans_fertilizer_supplier=((($record[$index_mapping['beans_fertilizer_supplier']])!='' or !(empty($record[$index_mapping['beans_fertilizer_supplier']])))?$record[$index_mapping['beans_fertilizer_supplier']]:null);   
		  $beans_fertilizer_supplier_other=((($record[$index_mapping['beans_fertilizer_supplier_other']])!='' or !(empty($record[$index_mapping['beans_fertilizer_supplier_other']])))?$record[$index_mapping['beans_fertilizer_supplier_other']]:null);  
		  $beans_fertilizer_supplier_other=($beans_fertilizer_supplier_other==$pk_patId)?false:true;
		  
		  $beans_fertilizer_benefits=((($record[$index_mapping['beans_fertilizer_benefits']])!='' or !(empty($record[$index_mapping['beans_fertilizer_benefits']])))?$record[$index_mapping['beans_fertilizer_benefits']]:null);   
		  $beans_fertilizer_benefits_other=((($record[$index_mapping['beans_fertilizer_benefits_other']])!='' or !(empty($record[$index_mapping['beans_fertilizer_benefits_other']])))?$record[$index_mapping['beans_fertilizer_benefits_other']]:null);  
		  $beans_chemical_use=((($record[$index_mapping['beans_chemical_use']])!='' or !(empty($record[$index_mapping['beans_chemical_use']])))?$record[$index_mapping['beans_chemical_use']]:null); 
		  $beans_chemical_acreage=((($record[$index_mapping['beans_chemical_acreage']])!='' or !(empty($record[$index_mapping['beans_chemical_acreage']])))?$record[$index_mapping['beans_chemical_acreage']]:null);   
		  $beans_chemical_acreage_mapped=((($record[$index_mapping['beans_chemical_acreage_mapped']])!='' or !(empty($record[$index_mapping['beans_chemical_acreage_mapped']])))?$record[$index_mapping['beans_chemical_acreage_mapped']]:null); 
		  $beans_chemical_cost=((($record[$index_mapping['beans_chemical_cost']])!='' or !(empty($record[$index_mapping['beans_chemical_cost']])))?$record[$index_mapping['beans_chemical_cost']]:null);   
		  $beans_chemical_cost=($beans_chemical_cost==$pk_patId)?false:true;
		  
		  $beans_chemical_supplier=((($record[$index_mapping['beans_chemical_supplier']])!='' or !(empty($record[$index_mapping['beans_chemical_supplier']])))?$record[$index_mapping['beans_chemical_supplier']]:null);   
		  $beans_chemical_supplier_other=((($record[$index_mapping['beans_chemical_supplier_other']])!='' or !(empty($record[$index_mapping['beans_chemical_supplier_other']])))?$record[$index_mapping['beans_chemical_supplier_other']]:null);  
		  $beans_chemical_supplier_other=($beans_chemical_supplier_other==$pk_patId)?false:true;
		  
		  $beans_chemical_benefits=((($record[$index_mapping['beans_chemical_benefits']])!='' or !(empty($record[$index_mapping['beans_chemical_benefits']])))?$record[$index_mapping['beans_chemical_benefits']]:null);   
		  $beans_chemical_benefits_other=((($record[$index_mapping['beans_chemical_benefits_other']])!='' or !(empty($record[$index_mapping['beans_chemical_benefits_other']])))?$record[$index_mapping['beans_chemical_benefits_other']]:null);  
		  $beans_mgt_practices=((($record[$index_mapping['beans_mgt_practices']])!='' or !(empty($record[$index_mapping['beans_mgt_practices']])))?$record[$index_mapping['beans_mgt_practices']]:null); 
		  $beans_mgt_practices_acreage=((($record[$index_mapping['beans_mgt_practices_acreage']])!='' or !(empty($record[$index_mapping['beans_mgt_practices_acreage']])))?$record[$index_mapping['beans_mgt_practices_acreage']]:null);   
		  $beans_mgt_practices_acreage_mapped=((($record[$index_mapping['beans_mgt_practices_acreage_mapped']])!='' or !(empty($record[$index_mapping['beans_mgt_practices_acreage_mapped']])))?$record[$index_mapping['beans_mgt_practices_acreage_mapped']]:null); 
		  $beans_cost_ict=((($record[$index_mapping['beans_cost_ict']])!='' or !(empty($record[$index_mapping['beans_cost_ict']])))?$record[$index_mapping['beans_cost_ict']]:null);   
		  $beans_ict_supplier=((($record[$index_mapping['beans_ict_supplier']])!='' or !(empty($record[$index_mapping['beans_ict_supplier']])))?$record[$index_mapping['beans_ict_supplier']]:null);   
		  $beans_ict_supplier_other=((($record[$index_mapping['beans_ict_supplier_other']])!='' or !(empty($record[$index_mapping['beans_ict_supplier_other']])))?$record[$index_mapping['beans_ict_supplier_other']]:null);  
		  $beans_ict_supplier_other=($beans_ict_supplier_other==$pk_patId)?false:true;
		  
		  $beans_mgt_benefits=((($record[$index_mapping['beans_mgt_benefits']])!='' or !(empty($record[$index_mapping['beans_mgt_benefits']])))?$record[$index_mapping['beans_mgt_benefits']]:null);   
		  $beans_mgt_benefits_other=((($record[$index_mapping['beans_mgt_benefits_other']])!='' or !(empty($record[$index_mapping['beans_mgt_benefits_other']])))?$record[$index_mapping['beans_mgt_benefits_other']]:null);  
		  $beans_machinery_use=((($record[$index_mapping['beans_machinery_use']])!='' or !(empty($record[$index_mapping['beans_machinery_use']])))?$record[$index_mapping['beans_machinery_use']]:null); 
		  $beans_machinery_acreage=((($record[$index_mapping['beans_machinery_acreage']])!='' or !(empty($record[$index_mapping['beans_machinery_acreage']])))?$record[$index_mapping['beans_machinery_acreage']]:null);   
		  $beans_machinery_acreage_mapped=((($record[$index_mapping['beans_machinery_acreage_mapped']])!='' or !(empty($record[$index_mapping['beans_machinery_acreage_mapped']])))?$record[$index_mapping['beans_machinery_acreage_mapped']]:null); 
		  $beans_machinery_cost=((($record[$index_mapping['beans_machinery_cost']])!='' or !(empty($record[$index_mapping['beans_machinery_cost']])))?$record[$index_mapping['beans_machinery_cost']]:null);   
		  $beans_machinery_supplier=((($record[$index_mapping['beans_machinery_supplier']])!='' or !(empty($record[$index_mapping['beans_machinery_supplier']])))?$record[$index_mapping['beans_machinery_supplier']]:null);   
		  $beans_machinery_supplier_other=((($record[$index_mapping['beans_machinery_supplier_other']])!='' or !(empty($record[$index_mapping['beans_machinery_supplier_other']])))?$record[$index_mapping['beans_machinery_supplier_other']]:null);  
		  $beans_machinery_supplier_other=($beans_machinery_supplier_other==$pk_patId)?false:true;
		  
		  $beans_machinery_benefits=((($record[$index_mapping['beans_machinery_benefits']])!='' or !(empty($record[$index_mapping['beans_machinery_benefits']])))?$record[$index_mapping['beans_machinery_benefits']]:null);   
		  $beans_machinery_benefits_other=((($record[$index_mapping['beans_machinery_benefits_other']])!='' or !(empty($record[$index_mapping['beans_machinery_benefits_other']])))?$record[$index_mapping['beans_machinery_benefits_other']]:null);  
		  $beans_harvested=((($record[$index_mapping['beans_harvested']])!='' or !(empty($record[$index_mapping['beans_harvested']])))?$record[$index_mapping['beans_harvested']]:null);   
		  $beans_sold=((($record[$index_mapping['beans_sold']])!='' or !(empty($record[$index_mapping['beans_sold']])))?$record[$index_mapping['beans_sold']]:null);   
		  $beans_sold_price=((($record[$index_mapping['beans_sold_price']])!='' or !(empty($record[$index_mapping['beans_sold_price']])))?$record[$index_mapping['beans_sold_price']]:null);   
		  $beans_harvest_lost=((($record[$index_mapping['beans_harvest_lost']])!='' or !(empty($record[$index_mapping['beans_harvest_lost']])))?$record[$index_mapping['beans_harvest_lost']]:null);   
		  $coffee_acreage=((($record[$index_mapping['coffee_acreage']])!='' or !(empty($record[$index_mapping['coffee_acreage']])))?$record[$index_mapping['coffee_acreage']]:null);   
		  $coffee_acreage_mapped=((($record[$index_mapping['coffee_acreage_mapped']])!='' or !(empty($record[$index_mapping['coffee_acreage_mapped']])))?$record[$index_mapping['coffee_acreage_mapped']]:null); 
		  $coffee_improved_seeds=((($record[$index_mapping['coffee_improved_seeds']])!='' or !(empty($record[$index_mapping['coffee_improved_seeds']])))?$record[$index_mapping['coffee_improved_seeds']]:null); 
		  $coffee_improved_acreage=((($record[$index_mapping['coffee_improved_acreage']])!='' or !(empty($record[$index_mapping['coffee_improved_acreage']])))?$record[$index_mapping['coffee_improved_acreage']]:null);   
		  $coffee_improved_acreage_mapped=((($record[$index_mapping['coffee_improved_acreage_mapped']])!='' or !(empty($record[$index_mapping['coffee_improved_acreage_mapped']])))?$record[$index_mapping['coffee_improved_acreage_mapped']]:null); 
		  $coffee_improved_cost=((($record[$index_mapping['coffee_improved_cost']])!='' or !(empty($record[$index_mapping['coffee_improved_cost']])))?$record[$index_mapping['coffee_improved_cost']]:null);   
		  $coffee_seed_supplier=((($record[$index_mapping['coffee_seed_supplier']])!='' or !(empty($record[$index_mapping['coffee_seed_supplier']])))?$record[$index_mapping['coffee_seed_supplier']]:null);   
		  $coffee_seed_supplier_other=((($record[$index_mapping['coffee_seed_supplier_other']])!='' or !(empty($record[$index_mapping['coffee_seed_supplier_other']])))?$record[$index_mapping['coffee_seed_supplier_other']]:null);  
		  $coffee_seed_supplier_other=($coffee_seed_supplier_other==$pk_patId)?false:true;
		  
		  $coffee_benefits=((($record[$index_mapping['coffee_benefits']])!='' or !(empty($record[$index_mapping['coffee_benefits']])))?$record[$index_mapping['coffee_benefits']]:null);   
		  $coffee_benefits_other=((($record[$index_mapping['coffee_benefits_other']])!='' or !(empty($record[$index_mapping['coffee_benefits_other']])))?$record[$index_mapping['coffee_benefits_other']]:null);  
		  $coffee_fetilizer_use=((($record[$index_mapping['coffee_fetilizer_use']])!='' or !(empty($record[$index_mapping['coffee_fetilizer_use']])))?$record[$index_mapping['coffee_fetilizer_use']]:null); 
		  $coffee_fetilizer_use=($coffee_fetilizer_use==$pk_patId)?false:true;
		  
		  $coffee_acreage_fertilizer=((($record[$index_mapping['coffee_acreage_fertilizer']])!='' or !(empty($record[$index_mapping['coffee_acreage_fertilizer']])))?$record[$index_mapping['coffee_acreage_fertilizer']]:null);   
		  $coffee_fertilizer_cost=((($record[$index_mapping['coffee_fertilizer_cost']])!='' or !(empty($record[$index_mapping['coffee_fertilizer_cost']])))?$record[$index_mapping['coffee_fertilizer_cost']]:null);   
		  $coffee_fertilizer_supplier=((($record[$index_mapping['coffee_fertilizer_supplier']])!='' or !(empty($record[$index_mapping['coffee_fertilizer_supplier']])))?$record[$index_mapping['coffee_fertilizer_supplier']]:null);   
		  $coffee_fertilizer_supplier_other=((($record[$index_mapping['coffee_fertilizer_supplier_other']])!='' or !(empty($record[$index_mapping['coffee_fertilizer_supplier_other']])))?$record[$index_mapping['coffee_fertilizer_supplier_other']]:null);  
		  $coffee_fertilizer_supplier_other=($coffee_fertilizer_supplier_other==$pk_patId)?false:true;
		  
		  $coffee_fertilizer_benefits=((($record[$index_mapping['coffee_fertilizer_benefits']])!='' or !(empty($record[$index_mapping['coffee_fertilizer_benefits']])))?$record[$index_mapping['coffee_fertilizer_benefits']]:null);   
		  $coffee_fertilizer_benefits_other=((($record[$index_mapping['coffee_fertilizer_benefits_other']])!='' or !(empty($record[$index_mapping['coffee_fertilizer_benefits_other']])))?$record[$index_mapping['coffee_fertilizer_benefits_other']]:null);  
		  $coffee_chemical_use=((($record[$index_mapping['coffee_chemical_use']])!='' or !(empty($record[$index_mapping['coffee_chemical_use']])))?$record[$index_mapping['coffee_chemical_use']]:null); 
		  $coffee_chemical_acreage=((($record[$index_mapping['coffee_chemical_acreage']])!='' or !(empty($record[$index_mapping['coffee_chemical_acreage']])))?$record[$index_mapping['coffee_chemical_acreage']]:null);   
		  $coffee_chemical_acreage_mapped=((($record[$index_mapping['coffee_chemical_acreage_mapped']])!='' or !(empty($record[$index_mapping['coffee_chemical_acreage_mapped']])))?$record[$index_mapping['coffee_chemical_acreage_mapped']]:null); 
		  $coffee_chemical_cost=((($record[$index_mapping['coffee_chemical_cost']])!='' or !(empty($record[$index_mapping['coffee_chemical_cost']])))?$record[$index_mapping['coffee_chemical_cost']]:null);   
		  $coffee_chemical_cost=($coffee_chemical_cost==$pk_patId)?false:true;
		  
		  $coffee_chemical_supplier=((($record[$index_mapping['coffee_chemical_supplier']])!='' or !(empty($record[$index_mapping['coffee_chemical_supplier']])))?$record[$index_mapping['coffee_chemical_supplier']]:null);   
		  $coffee_chemical_supplier_other=((($record[$index_mapping['coffee_chemical_supplier_other']])!='' or !(empty($record[$index_mapping['coffee_chemical_supplier_other']])))?$record[$index_mapping['coffee_chemical_supplier_other']]:null);  
		  $coffee_chemical_supplier_other=($coffee_chemical_supplier_other==$pk_patId)?false:true;
		  
		  $coffee_chemical_benefits=((($record[$index_mapping['coffee_chemical_benefits']])!='' or !(empty($record[$index_mapping['coffee_chemical_benefits']])))?$record[$index_mapping['coffee_chemical_benefits']]:null);   
		  $coffee_chemical_benefits_other=((($record[$index_mapping['coffee_chemical_benefits_other']])!='' or !(empty($record[$index_mapping['coffee_chemical_benefits_other']])))?$record[$index_mapping['coffee_chemical_benefits_other']]:null);  
		  $coffee_mgt_practices=((($record[$index_mapping['coffee_mgt_practices']])!='' or !(empty($record[$index_mapping['coffee_mgt_practices']])))?$record[$index_mapping['coffee_mgt_practices']]:null); 
		  $coffee_mgt_practices_acreage=((($record[$index_mapping['coffee_mgt_practices_acreage']])!='' or !(empty($record[$index_mapping['coffee_mgt_practices_acreage']])))?$record[$index_mapping['coffee_mgt_practices_acreage']]:null);   
		  $coffee_mgt_practices_acreage_mapped=((($record[$index_mapping['coffee_mgt_practices_acreage_mapped']])!='' or !(empty($record[$index_mapping['coffee_mgt_practices_acreage_mapped']])))?$record[$index_mapping['coffee_mgt_practices_acreage_mapped']]:null); 
		  $coffee_cost_ict=((($record[$index_mapping['coffee_cost_ict']])!='' or !(empty($record[$index_mapping['coffee_cost_ict']])))?$record[$index_mapping['coffee_cost_ict']]:null);   
		  $coffee_ict_supplier=((($record[$index_mapping['coffee_ict_supplier']])!='' or !(empty($record[$index_mapping['coffee_ict_supplier']])))?$record[$index_mapping['coffee_ict_supplier']]:null);   
		  $coffee_ict_supplier_other=((($record[$index_mapping['coffee_ict_supplier_other']])!='' or !(empty($record[$index_mapping['coffee_ict_supplier_other']])))?$record[$index_mapping['coffee_ict_supplier_other']]:null);  
		  $coffee_ict_supplier_other=($coffee_ict_supplier_other==$pk_patId)?false:true;
		  
		  $coffee_mgt_benefits=((($record[$index_mapping['coffee_mgt_benefits']])!='' or !(empty($record[$index_mapping['coffee_mgt_benefits']])))?$record[$index_mapping['coffee_mgt_benefits']]:null);   
		  $coffee_mgt_benefits_other=((($record[$index_mapping['coffee_mgt_benefits_other']])!='' or !(empty($record[$index_mapping['coffee_mgt_benefits_other']])))?$record[$index_mapping['coffee_mgt_benefits_other']]:null);  
		  $coffee_machinery_use=((($record[$index_mapping['coffee_machinery_use']])!='' or !(empty($record[$index_mapping['coffee_machinery_use']])))?$record[$index_mapping['coffee_machinery_use']]:null); 
		  $coffee_machinery_acreage=((($record[$index_mapping['coffee_machinery_acreage']])!='' or !(empty($record[$index_mapping['coffee_machinery_acreage']])))?$record[$index_mapping['coffee_machinery_acreage']]:null);   
		  $coffee_machinery_acreage_mapped=((($record[$index_mapping['coffee_machinery_acreage_mapped']])!='' or !(empty($record[$index_mapping['coffee_machinery_acreage_mapped']])))?$record[$index_mapping['coffee_machinery_acreage_mapped']]:null); 
		  $coffee_machinery_cost=((($record[$index_mapping['coffee_machinery_cost']])!='' or !(empty($record[$index_mapping['coffee_machinery_cost']])))?$record[$index_mapping['coffee_machinery_cost']]:null);   
		  $coffee_machinery_supplier=((($record[$index_mapping['coffee_machinery_supplier']])!='' or !(empty($record[$index_mapping['coffee_machinery_supplier']])))?$record[$index_mapping['coffee_machinery_supplier']]:null);   
		  $coffee_machinery_supplier_other=((($record[$index_mapping['coffee_machinery_supplier_other']])!='' or !(empty($record[$index_mapping['coffee_machinery_supplier_other']])))?$record[$index_mapping['coffee_machinery_supplier_other']]:null);  
		  $coffee_machinery_supplier_other=($coffee_machinery_supplier_other==$pk_patId)?false:true;
		  
		  $coffee_machinery_benefits=((($record[$index_mapping['coffee_machinery_benefits']])!='' or !(empty($record[$index_mapping['coffee_machinery_benefits']])))?$record[$index_mapping['coffee_machinery_benefits']]:null);   
		  $coffee_machinery_benefits_other=((($record[$index_mapping['coffee_machinery_benefits_other']])!='' or !(empty($record[$index_mapping['coffee_machinery_benefits_other']])))?$record[$index_mapping['coffee_machinery_benefits_other']]:null);  
		  $coffee_harvested=((($record[$index_mapping['coffee_harvested']])!='' or !(empty($record[$index_mapping['coffee_harvested']])))?$record[$index_mapping['coffee_harvested']]:null);   
		  $coffee_sold=((($record[$index_mapping['coffee_sold']])!='' or !(empty($record[$index_mapping['coffee_sold']])))?$record[$index_mapping['coffee_sold']]:null);   
		  $coffee_sold_price=((($record[$index_mapping['coffee_sold_price']])!='' or !(empty($record[$index_mapping['coffee_sold_price']])))?$record[$index_mapping['coffee_sold_price']]:null);   
		  $coffee_harvest_lost=((($record[$index_mapping['coffee_harvest_lost']])!='' or !(empty($record[$index_mapping['coffee_harvest_lost']])))?$record[$index_mapping['coffee_harvest_lost']]:null);   
		  $loan_access=((($record[$index_mapping['loan_access']])!='' or !(empty($record[$index_mapping['loan_access']])))?$record[$index_mapping['loan_access']]:null); 
		  $loan_access=($loan_access==$pk_patId)?false:true;
		  
		  $loan_accessed=((($record[$index_mapping['loan_accessed']])!='' or !(empty($record[$index_mapping['loan_accessed']])))?$record[$index_mapping['loan_accessed']]:null);   
		  $implemented_mgt_climate=((($record[$index_mapping['implemented_mgt_climate']])!='' or !(empty($record[$index_mapping['implemented_mgt_climate']])))?$record[$index_mapping['implemented_mgt_climate']]:null); 
		  $implemented_mgt_climate_action=((($record[$index_mapping['implemented_mgt_climate_action']])!='' or !(empty($record[$index_mapping['implemented_mgt_climate_action']])))?$record[$index_mapping['implemented_mgt_climate_action']]:null);   
		  $implemented_mgt_climate_action_other=((($record[$index_mapping['implemented_mgt_climate_action_other']])!='' or !(empty($record[$index_mapping['implemented_mgt_climate_action_other']])))?$record[$index_mapping['implemented_mgt_climate_action_other']]:null);  
		  $gps=((($record[$index_mapping['gps']])!='' or !(empty($record[$index_mapping['gps']])))?$record[$index_mapping['gps']]:null);   
		  $compiled_by=((($record[$index_mapping['compiled_by']])!='' or !(empty($record[$index_mapping['compiled_by']])))?$record[$index_mapping['compiled_by']]:null);   
		  $va=((($record[$index_mapping['va']])!='' or !(empty($record[$index_mapping['va']])))?$record[$index_mapping['va']]:null);   
		  $va=($va==$pk_patId)?false:true;
		  
		  $telephone=((($record[$index_mapping['telephone']])!='' or !(empty($record[$index_mapping['telephone']])))?$record[$index_mapping['telephone']]:null);   
		  $server_entry_timeUnsanitized=((($record[$index_mapping['server_entry_time']])!='' or  !(empty($record[$index_mapping['server_entry_time']])))?$record[$index_mapping['server_entry_time']]:$today);
		  
		  
		  //modified date of interview to catch wrong interview date submissions
		  $server_entry_time=substr($server_entry_timeUnsanitized, 0, -9);
			//$server_entry_time = $server_entry_timeUnsanitized;
		    $_SESSION['farmer_code'] = $farmer_code;
		  
		  //test the farmer code existance
		  if (is_numeric($farmer_code)) {
		//==============insert values into $table1==========================
		$stable1= "INSERT INTO ".$table1." (`farmer_code`,`interview_date`,`respondent`,`farmer_crop_maize`,`farmer_crop_beans`,`farmer_crop_coffee`,`msg_at_readtime`,`readtime`) 
		VALUES ('".$farmer_code."','".$server_entry_time."','".$respondent."',
		'".trim($farmer_crop_maize)."','".trim($farmer_crop_beans)."','".trim($farmer_crop_coffee)."',
		'".$msg_at_readtime."','".$timestamp."')";
				
				$description="Error on saving Excel CSV record Value";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table=$stable1;
                $id='';
		
		$a=mysql_query(fixtags($stable1), $connect )or die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
		//============== end of insert values into $table1===================

		//==============insert values into $table2===================
		$stable2= "INSERT INTO ".$table2." (`fk_patId`,`farmer_code`,`loan_access`,`loan_accessed`,`implemented_mgt_climate`,`implemented_mgt_climate_action`,`implemented_mgt_climate_action_other`,`gps`,`compiled_by`,`va`,`telephone`,`msg_at_readtime`,`readtime`) 
		VALUES
		 ('".$fk_patId."','".$farmer_code."','".trim($loan_access)."','".floatval(trim($loan_accessed))."','".trim($implemented_mgt_climate)."','".$implemented_mgt_climate_action."','".$implemented_mgt_climate_action_other."','".$gps."','".$compiled_by."','".$va."','".$telephone."','".$msg_at_readtime."','".$timestamp."')";
		
				$description="Error on saving Excel CSV record Value";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table=$stable2;
                $id='';
		
		$b=mysql_query(fixtags($stable2), $connect )or die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
		//============== end of insert values into $table2===================
		
		//==============insert values into $table3===================
		$stable3= "INSERT INTO ".$table3." (
		`fk_patId`,`farmer_code`,
		`maize_acreage`,`maize_mapped`,
		`maize_improved_seeds`,`maize_improved_acreage`,
		`maize_improved_acreage_mapped`,`maize_improved_cost`,
		`maize_seed_supplier`,`maize_seed_supplier_other`,
		`maize_benefits`,`maize_benefits_other`,
		`maize_fetilizer_use`,`maize_acreage_fertilizer`,
		`maize_fertilizer_cost`,`maize_fertilizer_supplier`,
		`maize_fertilizer_supplier_other`,`maize_fertilizer_benefits`,
		`maize_fertilizer_benefits_other`,`maize_chemical_use`,
		`maize_chemical_acreage`,`maize_chemical_acreage_mapped`,
		`maize_chemical_cost`,`maize_chemical_supplier`,
		`maize_chemical_supplier_other`,`maize_chemical_benefits`,
		`maize_chemical_benefits_other`,`maize_mgt_practices`,
		`maize_mgt_practices_acreage`,`maize_mgt_practices_acreage_mapped`,
		`maize_cost_ict`,`maize_ict_supplier`,
		`maize_ict_supplier_other`,`maize_mgt_benefits`,
		`maize_mgt_benefits_other`,`maize_machinery_use`,
		`maize_machinery_acreage`,`maize_machinery_acreage_mapped`,
		`maize_machinery_cost`,`maize_machinery_supplier`,
		`maize_machinery_supplier_other`,`maize_machinery_benefits`,
		`maize_machinery_benefits_other`,`maize_harvested`,
		`maize_sold`,`maize_sold_price`,
		`maize_harvest_loss`,`msg_at_readtime`,
		`readtime`) 
		VALUES ('".$fk_patId."','".trim($farmer_code)."',
		'".floatval(trim($maize_acreage))."','".floatval(trim($maize_acreage_mappped))."',
		'".floatval(trim($maize_improved_seeds))."','".floatval(trim($maize_improved_acreage))."',
		'".floatval(trim($maize_improved_acreage_mapped))."','".floatval(trim($maize_improved_cost))."',
		'".$maize_seed_supplier."','".$maize_seed_supplier_other."',
		'".$maize_benefits."','".$maize_benefits_other."',
		'".trim($maize_fetilizer_use)."','".floatval(trim($maize_acreage_fertilizer))."',
		'".floatval(trim($maize_fertilizer_cost))."','".$maize_fertilizer_supplier."',
		'".$maize_fertilizer_supplier_other."','".$maize_fertilizer_benefits."',
		'".$maize_fertilizer_benefit_other."','".floatval(trim($maize_chemical_use))."',
		'".floatval(trim($maize_chemical_acreage))."','".floatval(trim($maize_chemical_acreage_mapped))."',
		'".floatval(trim($maize_chemical_cost))."','".$maize_chemical_supplier."',
		'".$maize_chemical_supplier_other."','".$maize_chemical_benefits."',
		'".$maize_chemical_benefits_other."','".floatval(trim($maize_mgt_practices))."',
		'".floatval(trim($maize_mgt_practices_acreage))."','".floatval(trim($maize_mgt_practices_acreage_mapped))."',
		'".floatval(trim($maize_cost_ict))."','".$maize_ict_supplier."',
		'".$maize_ict_supplier_other."','".$maize_mgt_benefits."',
		'".$maize_mgt_benefits_other."','".floatval(trim($maize_machinery_use))."',
		'".floatval(trim($maize_machinery_acreage))."','".floatval(trim($maize_machinery_acreage_mapped))."',
		'".floatval(trim($maize_machinery_cost))."','".$maize_machinery_supplier."',
		'".$maize_machinery_supplier_other."','".$maize_machinery_benefits."',
		'".$maize_machinery_benefits_other."','".floatval(trim($maize_harvested))."',
		'".floatval(trim($maize_sold))."','".floatval(trim($maize_sold_price))."',
		'".floatval(trim($maize_harvest_loss))."','".$msg_at_readtime."',
		'".$timestamp."')";
				$description="Error on saving Excel CSV record Value";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table=$stable3;
                $id='';
		
		$c=mysql_query(fixtags($stable3), $connect )or die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
		
		//============== end of insert values into $table3===================
		

		//==============insert values into $table4===================
		$stable4= "INSERT INTO ".$table4." (
		`fk_patId`,`farmer_code`,
		`beans_acreage`,`beans_mapped`,
		`beans_improved_seeds`,`beans_improved_acreage`,
		`beans_improved_acreage_mapped`,`beans_improved_cost`,
		`beans_seed_supplier`,`beans_seed_supplier_other`,
		`beans_benefits`,`beans_benefits_other`,
		`beans_fetilizer_use`,`beans_acreage_fertilizer`,
		`beans_fertilizer_cost`,`beans_fertilizer_supplier`,
		`beans_fertilizer_supplier_other`,`beans_fertilizer_benefits`,
		`beans_fertilizer_benefits_other`,`beans_chemical_use`,
		`beans_chemical_acreage`,`beans_chemical_acreage_mapped`,
		`beans_chemical_cost`,`beans_chemical_supplier`,
		`beans_chemical_supplier_other`,`beans_chemical_benefits`,
		`beans_chemical_benefits_other`,`beans_mgt_practices`,
		`beans_mgt_practices_acreage`,`beans_mgt_practices_acreage_mapped`,
		`beans_cost_ict`,`beans_ict_supplier`,
		`beans_ict_supplier_other`,`beans_mgt_benefits`,
		`beans_mgt_benefits_other`,`beans_machinery_use`,
		`beans_machinery_acreage`,`beans_machinery_acreage_mapped`,
		`beans_machinery_cost`,`beans_machinery_supplier`,
		`beans_machinery_supplier_other`,`beans_machinery_benefits`,
		`beans_machinery_benefits_other`,`beans_harvested`,
		`beans_sold`,`beans_sold_price`,
		`beans_harvest_loss`,`msg_at_readtime`,
		`readtime`) 
		VALUES ('".$fk_patId."','".trim($farmer_code)."',
		'".floatval(trim($beans_acreage))."','".floatval(trim($beans_acreage_mappped))."',
		'".floatval(trim($beans_improved_seeds))."','".floatval(trim($beans_improved_acreage))."',
		'".floatval(trim($beans_improved_acreage_mapped))."','".floatval(trim($beans_improved_cost))."',
		'".$beans_seed_supplier."','".$beans_seed_supplier_other."',
		'".$beans_benefits."','".$beans_benefits_other."',
		'".trim($beans_fetilizer_use)."','".floatval(trim($beans_acreage_fertilizer))."',
		'".floatval(trim($beans_fertilizer_cost))."','".$beans_fertilizer_supplier."',
		'".$beans_fertilizer_supplier_other."','".$beans_fertilizer_benefits."',
		'".$beans_fertilizer_benefit_other."','".floatval(trim($beans_chemical_use))."',
		'".floatval(trim($beans_chemical_acreage))."','".floatval(trim($beans_chemical_acreage_mapped))."',
		'".floatval(trim($beans_chemical_cost))."','".$beans_chemical_supplier."',
		'".$beans_chemical_supplier_other."','".$beans_chemical_benefits."',
		'".$beans_chemical_benefits_other."','".floatval(trim($beans_mgt_practices))."',
		'".floatval(trim($beans_mgt_practices_acreage))."','".floatval(trim($beans_mgt_practices_acreage_mapped))."',
		'".floatval(trim($beans_cost_ict))."','".$beans_ict_supplier."',
		'".$beans_ict_supplier_other."','".$beans_mgt_benefits."',
		'".$beans_mgt_benefits_other."','".floatval(trim($beans_machinery_use))."',
		'".floatval(trim($beans_machinery_acreage))."','".floatval(trim($beans_machinery_acreage_mapped))."',
		'".floatval(trim($beans_machinery_cost))."','".$beans_machinery_supplier."',
		'".$beans_machinery_supplier_other."','".$beans_machinery_benefits."',
		'".$beans_machinery_benefits_other."','".floatval(trim($beans_harvested))."',
		'".floatval(trim($beans_sold))."','".floatval(trim($beans_sold_price))."',
		'".floatval(trim($beans_harvest_lost))."','".$msg_at_readtime."',
		'".$timestamp."')";
				$description="Error on saving Excel CSV record Value";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table=$stable4;
                $id='';
		
		$d=mysql_query(fixtags($stable4), $connect )or die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
		
		//============== end of insert values into $table4===================
		
		//==============insert values into $table5===================
		$stable5= "INSERT INTO ".$table5." (
		`fk_patId`,`farmer_code`,
		`coffee_acreage`,`coffee_mapped`,
		`coffee_improved_seeds`,`coffee_improved_acreage`,
		`coffee_improved_acreage_mapped`,`coffee_improved_cost`,
		`coffee_seed_supplier`,`coffee_seed_supplier_other`,
		`coffee_benefits`,`coffee_benefits_other`,
		`coffee_fetilizer_use`,`coffee_acreage_fertilizer`,
		`coffee_fertilizer_cost`,`coffee_fertilizer_supplier`,
		`coffee_fertilizer_supplier_other`,`coffee_fertilizer_benefits`,
		`coffee_fertilizer_benefits_other`,`coffee_chemical_use`,
		`coffee_chemical_acreage`,`coffee_chemical_acreage_mapped`,
		`coffee_chemical_cost`,`coffee_chemical_supplier`,
		`coffee_chemical_supplier_other`,`coffee_chemical_benefits`,
		`coffee_chemical_benefits_other`,`coffee_mgt_practices`,
		`coffee_mgt_practices_acreage`,`coffee_mgt_practices_acreage_mapped`,
		`coffee_cost_ict`,`coffee_ict_supplier`,
		`coffee_ict_supplier_other`,`coffee_mgt_benefits`,
		`coffee_mgt_benefits_other`,`coffee_machinery_use`,
		`coffee_machinery_acreage`,`coffee_machinery_acreage_mapped`,
		`coffee_machinery_cost`,`coffee_machinery_supplier`,
		`coffee_machinery_supplier_other`,`coffee_machinery_benefits`,
		`coffee_machinery_benefits_other`,`coffee_harvested`,
		`coffee_sold`,`coffee_sold_price`,
		`coffee_harvest_loss`,`msg_at_readtime`,
		`readtime`) 
		VALUES ('".$fk_patId."','".trim($farmer_code)."',
		'".floatval(trim($coffee_acreage))."','".floatval(trim($coffee_acreage_mappped))."',
		'".floatval(trim($coffee_improved_seeds))."','".floatval(trim($coffee_improved_acreage))."',
		'".floatval(trim($coffee_improved_acreage_mapped))."','".floatval(trim($coffee_improved_cost))."',
		'".$coffee_seed_supplier."','".$coffee_seed_supplier_other."',
		'".$coffee_benefits."','".$coffee_benefits_other."',
		'".trim($coffee_fetilizer_use)."','".floatval(trim($coffee_acreage_fertilizer))."',
		'".floatval(trim($coffee_fertilizer_cost))."','".$coffee_fertilizer_supplier."',
		'".$coffee_fertilizer_supplier_other."','".$coffee_fertilizer_benefits."',
		'".$coffee_fertilizer_benefit_other."','".floatval(trim($coffee_chemical_use))."',
		'".floatval(trim($coffee_chemical_acreage))."','".floatval(trim($coffee_chemical_acreage_mapped))."',
		'".floatval(trim($coffee_chemical_cost))."','".$coffee_chemical_supplier."',
		'".$coffee_chemical_supplier_other."','".$coffee_chemical_benefits."',
		'".$coffee_chemical_benefits_other."','".floatval(trim($coffee_mgt_practices))."',
		'".floatval(trim($coffee_mgt_practices_acreage))."','".floatval(trim($coffee_mgt_practices_acreage_mapped))."',
		'".floatval(trim($coffee_cost_ict))."','".$coffee_ict_supplier."',
		'".$coffee_ict_supplier_other."','".$coffee_mgt_benefits."',
		'".$coffee_mgt_benefits_other."','".floatval(trim($coffee_machinery_use))."',
		'".floatval(trim($coffee_machinery_acreage))."','".floatval(trim($coffee_machinery_acreage_mapped))."',
		'".floatval(trim($coffee_machinery_cost))."','".$coffee_machinery_supplier."',
		'".$coffee_machinery_supplier_other."','".$coffee_machinery_benefits."',
		'".$coffee_machinery_benefits_other."','".floatval(trim($coffee_harvested))."',
		'".floatval(trim($coffee_sold))."','".floatval(trim($coffee_sold_price))."',
		'".floatval(trim($coffee_harvest_lost))."','".$msg_at_readtime."',
		'".$timestamp."')";
		
				$description="Error on saving Excel CSV record Value";
                $user="DataCare";
                $oldValue='';
                $newValue='';
                $table=$stable5;
                $id='';
		
		$e=mysql_query(fixtags($stable5), $connect )or die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
		
		//============== end of insert values into $table5===================
		
		}else{
			
			//insert into the form6 survey error log table
			
				$action = "Could not Save Form6 Survey Data because of Incorrect farmer Code:(".$_SESSION['farmer_code'].")";
                $description="Error on Saving because of Incorrect Farmer Code";
                $user=$compiled_by;
                $oldValue='';
                $newValue='';
                $table='all Form6 survey Tables';
                $id='';
                logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			
		}
		
		@mysql_query("COMMIT");
		@mysql_query("SET AUTOCOMMIT=TRUE");
		$csv_file='/srv/www/dcData/'.$yesterday.'.csv';
		//$csv_file='C:/wamp/www/data/'.$today.'.csv';
		//transfer the file after copying
		$from=$csv_file;
		$newFilename=date('Y-m-d h_i_s');
		$to='/srv/www/htdocs/grameenDataBackup/'.$newFilename.'.csv';
		//$to='C:/wamp/www/trial/grameenDataBackup'.$newFilename.'.csv';
		copy($from, $to);
		/* echo $to;
		print_r('<br/>');
		echo fixtags($stable1)."<br/>"; 
		echo $server_entry_time."<br/>"; */
		 
		 
		if (file_exists($csv_file)) {
		unlink($csv_file);
		}   
		echo "File data successfully imported to database!!";
		mysql_close($connect);  // closing connection
		 
	}
?>