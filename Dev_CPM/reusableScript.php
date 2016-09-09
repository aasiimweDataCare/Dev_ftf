<?php
date_default_timezone_set("Etc/GMT-3");
global $connect;
$connect = mysqli_connect("localhost", "root", "cpmmisV1", "db_cpmadummy");
//@mysql_select_db('db_cpmadummy',$connect);
//$connect = mysql_connect('localhost','root','craiwrut')or die(mysql_error());

$today=date('Y-m-d');
$yesterday=date('Y-m-d',strtotime("-1 days"));
//$timestamp=date('Y-m-d h:i:s');
define('CSV_PATH','/srv/www/dcData/'); // specify CSV file path
//define('CSV_PATH','C:/wamp/www/trial/'); // specify CSV file path

function logUserAction($connect,$action, $description, $user, $oldValue, $newValue, $table, $id)
    {

        $stmnt = "INSERT INTO `db_cpmadummy`.`tbl_form6_survey_errorlog`(`username`, `action`, `description`,
      `valueBeforeAction`, `valueAfterAction`, `affectedTable`, `affectedTableId`)
        VALUES ('" . $user . "','" . $action . "','" . $description . "','" . $oldValue . "','" . $newValue . "','" . $table . "','" . $id . "')";

        $query = mysqli_query($connect,$stmnt) or mysqli_error($connect);

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
                logUserAction($connect,$action,$description,$user,$oldValue,$newValue,$table,$id);
			


exit;
}
/* ini_set('auto_detect_line_endings',TRUE); */

	$file = fopen($csv_file, "r");
	$header_read = false;
	//The values and their Keys are irrelavant later on
	//readfile($csv_file);
	$index_mapping = array(
							'pk_patId' => 0, 
							'farmer_code' => 1,
							'interview_date' => 2,
							'Name_Resp' => 3,
							'farmer_crop_maize' => 4,
							'farmer_crop_beans' => 5,
							'farmer_crop_coffee' => 6,
							'farmer_crop_maize_crop' => 7,
							'maize_other_crop' => 8,
							'maize_other_crop_other' => 9,
							'maize_acreage' => 10,
							'maize_acreage_mapped' => 11,
							'maize_equipment_openingland' => 12,//
							'maize_seed_variety' => 13,//
							'maize_improvedseeds_notuse' => 14,//
							'maize_improvedseeds_notuse_other' => 15,//
							'maize_improvedseeds_benefits' => 16,//
							'maize_improvedseeds_benefits_other' => 17,//
							'maize_improvedseed_supplier' => 18,//
							'maize_improvedseed_supplier_other' => 19,//
							'maize_improvedseed_properusage'=> 20,//
							'maize_acreage_improvedseeds'=> 21,
							'maize_equipment_planting'=> 22,
							'maize_equipment_planting_other'=>23,
							'maize_whoplanted'=>24,
							'maize_whoplanted_Other'=>25,
							'maize_fertilizer_use'=>26,
							'maize_fertlizer_notuse'=>27,
							'maize_fertlizer_notuse_other'=>28,
							'maize_fertilizer_benefits'=>29,
							'maize_fertilizer_benefits_other'=>30,
							'maize_fertilizer_supplier'=>31,
							'maize_fertilizer_supplier_other'=>32,
							'maize_fertilizer_properusage'=>33,
							'maize_ferilizer_whosupplied'=>34,
							'maize_ferilizer_whosupplied_other'=>35,
							'maize_acreage_fertilizers'=>36,
							'maize_chemical_use'=>37,
							'maize_chemical_use_other'=>38,
							'maize_chemical_notuse'=>39,
							'maize_chemical_notuse_other'=>40,
							'maize_chemicals_benefits'=>41,
							'maize_chemicals_benefits_other'=>42,
							'maize_chemicals_supplier'=>43,
							'maize_chemicals_supplier_other'=>44,
							'maize_chemicals_properusage'=>45,
							'maize_chemical_whoapplied'=>46,
							'maize_chemical_whoapplied_other'=>47,
							'maize_acreage_chemicals'=>48,
							'maize_detect_counterfeit'=>49,
							'maize_opinion'=>50,
							'maize_counterfeit_improvedseeds'=>51,
							'maize_counterfeit_herbicides'=>52,
							'maize_counterfeit_pesticides'=>53,
							'maize_counterfeit_Fungicides'=>54,
							'maize_counterfeit_Fertilizers'=>55,
							'maize_avoid_counterfeits'=>56,
							'maize_avoid_counterfeits_other'=>57,
							'maize_dry_harvested'=>58,
							'maize_dry_harvested_other'=>59,
							'maize_shell_use'=>60,
							'maize_shell_use_other'=>61,
							'maize_storage'=>62,
							'maize_storage_other'=>63,
							'maize_cost_production'=>64,
							'maize_cost_production_machinery'=>65,
							'maize_cost_production_improvedseed'=>66,
							'maize_cost_production_fertilizers'=>67,
							'maize_cost_production_chemicals'=>68,
							'maize_cost_production_storage'=>69,
							'maize_cost_production_transportation'=>70,
							'maize_cost_production_labour'=>71,
							'maize_cost_production_other'=>72,
							'maize_harvested'=>73,
							'maize_sold'=>74,
							'maize_sold_lastperiod'=>75,
							'maize_common_price'=>76,
							'maize_lost'=>77,
							'maize_aware_standard'=>78,
							'farmer_crop_beans_crop' => 79,//
							'beans_other_crop' => 80,//
							'beans_other_crop_other' => 81,//
							'beans_acreage' => 82,
							'beans_acreage_mapped' => 83,
							'beans_equipment_openingland' => 84,//
							'beans_seed_variety' => 85,//
							'beans_improvedseeds_notuse' => 86,//
							'beans_improvedseeds_notuse_other' => 87,//
							'beans_improvedseeds_benefits' => 88,//
							'beans_improvedseeds_benefits_other' => 89,//
							'beans_improvedseed_supplier' => 90,//
							'beans_improvedseed_supplier_other' => 91,//
							'beans_improvedseed_properusage'=> 92,//
							'beans_acreage_improvedseeds'=> 93,
							'beans_equipment_planting'=> 94,
							'beans_equipment_planting_other'=>95,
							'beans_whoplanted'=>96,
							'beans_whoplanted_Other'=>97,
							'beans_fertilizer_use'=>98,
							'beans_fertlizer_notuse'=>99,
							'beans_fertlizer_notuse_other'=>100,
							'beans_fertilizer_benefits'=>101,
							'beans_fertilizer_benefits_other'=>102,
							'beans_fertilizer_supplier'=>103,
							'beans_fertilizer_supplier_other'=>104,
							'beans_fertilizer_properusage'=>105,
							'beans_ferilizer_whosupplied'=>106,
							'beans_ferilizer_whosupplied_other'=>107,
							'beans_acreage_fertilizers'=>108,
							'beans_chemical_use'=>109,
							'beans_chemical_use_other'=>110,
							'beans_chemical_notuse'=>111,
							'beans_chemical_notuse_other'=>112,
							'beans_chemicals_benefits'=>113,
							'beans_chemicals_benefits_other'=>114,
							'beans_chemicals_supplier'=>115,
							'beans_chemicals_supplier_other'=>116,
							'beans_chemicals_properusage'=>117,
							'beans_chemical_whoapplied'=>118,
							'beans_chemical_whoapplied_other'=>119,
							'beans_acreage_chemicals'=>120,
							'beans_detect_counterfeit'=>121,
							'beans_opinion'=>122,
							'beans_counterfeit_improvedseeds'=>123,
							'beans_counterfeit_herbicides'=>124,
							'beans_counterfeit_pesticides'=>125,
							'beans_counterfeit_Fungicides'=>126,
							'beans_counterfeit_Fertilizers'=>127,
							'beans_avoid_counterfeits'=>128,
							'beans_avoid_counterfeits_other'=>129,
							'beans_dry_harvested'=>130,
							'beans_dry_harvested_other'=>131,
							'beans_shell_use'=>132,
							'beans_shell_use_other'=>133,
							'beans_storage'=>134,
							'beans_storage_other'=>135,
							'beans_cost_production'=>136,
							'beans_cost_production_machinery'=>137,
							'beans_cost_production_improvedseed'=>138,
							'beans_cost_production_fertilizers'=>139,
							'beans_cost_production_chemicals'=>140,
							'beans_cost_production_storage'=>141,
							'beans_cost_production_transportation'=>142,
							'beans_cost_production_labour'=>143,
							'beans_cost_production_other'=>144,
							'beans_harvested'=>145,
							'beans_sold'=>146,
							'beans_sold_lastperiod'=>147,
							'beans_common_price'=>148,
							'beans_lost'=>149,
							'beans_aware_standard'=>150,
							'farmer_crop_coffee_newtrees'=>151,
							'farmer_crop_coffee_crop' => 152,//
							'coffee_other_crop' => 153,//
							'coffee_other_crop_other' => 154,//
							'coffee_acreage' => 155,
							'coffee_acreage_mapped' => 156,
							'coffee_equipment_openingland' => 157,//
							'coffee_tree_variety' => 158,//
							'coffee_improvedtrees_notuse' => 159,//
							'coffee_improvedtrees_notuse_other' => 160,//
							'coffee_improvedtrees_benefits' => 161,//
							'coffee_improvedtrees_benefits_other' => 162,//
							'coffee_improvedtrees_supplier' => 163,//
							'coffee_improvedtrees_supplier_other' => 164,//
							'coffee_improvedtrees_properusage'=> 165,//
							'coffee_acreage_improvedtrees'=> 166,
							'coffee_acreage_improvedtrees_mapped'=> 167,	
							'coffee_equipment_planting'=> 168,
							'coffee_equipment_planting_other'=>169,
							'coffee_whoplanted'=>170,
							'coffee_whoplanted_Other'=>171,
							'coffee_fertilizer_use'=>172,
							'coffee_fertlizer_notuse'=>173,
							'coffee_fertlizer_notuse_other'=>174,
							'coffee_fertilizer_benefits'=>175,
							'coffee_fertilizer_benefits_other'=>176,
							'coffee_fertilizer_supplier'=>177,
							'coffee_fertilizer_supplier_other'=>178,
							'coffee_fertilizer_properusage'=>179,
							'coffee_ferilizer_whosupplied'=>180,
							'coffee_ferilizer_whosupplied_other'=>181,
							'coffee_acreage_fertilizers'=>182,
							'coffee_chemical_use'=>183,
							'coffee_chemical_notuse'=>184,
							'coffee_chemical_notuse_other'=>185,
							'coffee_chemicals_benefits'=>186,
							'coffee_chemicals_benefits_other'=>187,
							'coffee_chemicals_supplier'=>188,
							'coffee_chemicals_supplier_other'=>189,
							'coffee_chemicals_properusage'=>190,
							'coffee_chemical_whoapplied'=>191,
							'coffee_chemical_whoapplied_other'=>192,
							'coffee_acreage_chemicals'=>193,
							'coffee_detect_counterfeit'=>194,
							'coffee_opinion'=>195,
							'coffee_counterfeit_improvedtrees'=>196,
							'coffee_counterfeit_herbicides'=>197,
							'coffee_counterfeit_pesticides'=>198,
							'coffee_counterfeit_Fungicides'=>199,
							'coffee_counterfeit_Fertilizers'=>200,
							'coffee_avoid_counterfeits'=>201,
							'coffee_avoid_counterfeits_other'=>202,
							'coffee_dry_harvested'=>203,
							'coffee_dry_harvested_other'=>204,
							'coffee_storage'=>205,
							'coffee_storage_other'=>206,
							'coffee_cost_production'=>207,
							'coffee_cost_production_machinery'=>208,
							'coffee_cost_production_improvedseed'=>209,
							'coffee_cost_production_fertilizers'=>210,
							'coffee_cost_production_chemicals'=>211,
							'coffee_cost_production_storage'=>212,
							'coffee_cost_production_transportation'=>213,
							'coffee_cost_production_labour'=>214,
							'coffee_cost_production_other'=>215,
							'coffee_harvested'=>216,
							'coffee_sold'=>217,
							'coffee_sold_lastperiod'=>218,
							'coffee_common_price'=>219,
							'coffee_lost'=>220,
							'coffee_aware_standard'=>221,
							'loan_access' => 222,
							'loan_accessed' => 223, 
							'climate_change_impact'=>224,
							'implemented_mgt_climate' => 225,
							'implemented_mgt_climate_action' => 226, 
							'implemented_mgt_climate_action_other' => 227,
							'protection_counterfeit'=> 228,
							'protection_counterfeit_other'=> 229,
							'hotline_counterfeit'=> 230,
							'hotline_evercalled'=> 231,
							'receive_information_method'=> 232,
							'receive_information_method_other'=> 233,
							'farming_decisions'=> 234,
							'farm_assets'=> 235,
							'money_spent'=> 236,
							'training_events'=> 237,
							'member_organisation'=> 238,
							'GPSLatitude'=> 239,
							'GPSLongitude'=> 240,
							'GPSAltitude'=> 241,
							'GPSAccuracy'=> 242,
							'X_axis'=> 243,
							'Y_axis'=> 244,
							'server_entry_time' =>245
							);
//readfile($csv_file);
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
	/* ini_set('auto_detect_line_endings',FALSE); */


	
	function determin_indexes($header) {
		global $index_mapping;

		
		$index_mapping['pk_patId'] = array_search('pk_patId', $header); 
		$index_mapping['interview_date'] = array_search('interview_date', $header);	
		$index_mapping['farmer_code'] = array_search('farmer_code', $header);	
		$index_mapping['Name_Resp'] = array_search('Name_Resp', $header);	
		$index_mapping['farmer_crop_maize'] = array_search('farmer_crop_maize', $header);	
		$index_mapping['farmer_crop_beans'] = array_search('farmer_crop_beans', $header);	
		$index_mapping['farmer_crop_coffee'] = array_search('farmer_crop_coffee', $header);	
		$index_mapping['farmer_crop_maize_crop'] = array_search('farmer_crop_maize_crop', $header);	
		$index_mapping['maize_other_crop'] = array_search('maize_other_crop', $header);	
		$index_mapping['maize_other_crop_other'] = array_search('maize_other_crop_other', $header);	
		$index_mapping['maize_acreage'] = array_search('maize_acreage', $header);	
		$index_mapping['maize_acreage_mapped'] = array_search('maize_acreage_mapped', $header);	
		$index_mapping['maize_equipment_openingland'] = array_search('maize_equipment_openingland', $header);	
		$index_mapping['maize_seed_variety'] = array_search('maize_seed_variety', $header);	
		$index_mapping['maize_improvedseeds_notuse'] = array_search('maize_improvedseeds_notuse', $header);	
		$index_mapping['maize_improvedseeds_notuse_other'] = array_search('maize_improvedseeds_notuse_other', $header);	
		$index_mapping['maize_improvedseeds_benefits'] = array_search('maize_improvedseeds_benefits', $header);	
		$index_mapping['maize_improvedseeds_benefits_other'] = array_search('maize_improvedseeds_benefits_other', $header);
		$index_mapping['maize_improvedseed_supplier'] = array_search('maize_improvedseed_supplier', $header);	
		$index_mapping['maize_improvedseed_supplier_other'] = array_search('maize_improvedseed_supplier_other', $header);	
		$index_mapping['maize_improvedseed_properusage'] = array_search('maize_improvedseed_properusage', $header);	
		$index_mapping['maize_acreage_improvedseeds'] = array_search('maize_acreage_improvedseeds', $header);	
		$index_mapping['maize_equipment_planting'] = array_search('maize_equipment_planting', $header);	
		$index_mapping['maize_equipment_planting_other'] = array_search('maize_equipment_planting_other', $header);	
		$index_mapping['maize_whoplanted'] = array_search('maize_whoplanted', $header);	
		$index_mapping['maize_whoplanted_Other'] = array_search('maize_whoplanted_Other', $header);	
		$index_mapping['maize_fertilizer_use'] = array_search('maize_fertilizer_use', $header);	
		$index_mapping['maize_fertlizer_notuse'] = array_search('maize_fertlizer_notuse', $header);	
		$index_mapping['maize_fertlizer_notuse_other'] = array_search('maize_fertlizer_notuse_other', $header);	
		$index_mapping['maize_fertilizer_benefits'] = array_search('maize_fertilizer_benefits', $header);	
		$index_mapping['maize_fertilizer_benefits_other'] = array_search('maize_fertilizer_benefits_other', $header);	
		$index_mapping['maize_fertilizer_supplier'] = array_search('maize_fertilizer_supplier', $header);	
		$index_mapping['maize_fertilizer_supplier_other'] = array_search('maize_fertilizer_supplier_other', $header);	
		$index_mapping['maize_fertilizer_properusage'] = array_search('maize_fertilizer_properusage', $header);	
		$index_mapping['maize_ferilizer_whosupplied'] = array_search('maize_ferilizer_whosupplied', $header);	
		$index_mapping['maize_ferilizer_whosupplied_other'] = array_search('maize_ferilizer_whosupplied_other', $header);	
		$index_mapping['maize_acreage_fertilizers'] = array_search('maize_acreage_fertilizers', $header);	
		$index_mapping['maize_chemical_use'] = array_search('maize_chemical_use', $header);	
		$index_mapping['maize_chemical_use_other'] = array_search('maize_chemical_use_other', $header);	
		$index_mapping['maize_chemical_notuse'] = array_search('maize_chemical_notuse', $header);	
		$index_mapping['maize_chemical_notuse_other'] = array_search('maize_chemical_notuse_other', $header);	
		$index_mapping['maize_chemicals_benefits'] = array_search('maize_chemicals_benefits', $header);	
		$index_mapping['maize_chemicals_benefits_other'] = array_search('maize_chemicals_benefits_other', $header);	
		$index_mapping['maize_chemicals_supplier'] = array_search('maize_chemicals_supplier', $header);	
		$index_mapping['maize_chemicals_supplier_other'] = array_search('maize_chemicals_supplier_other', $header);	
		$index_mapping['maize_chemicals_properusage'] = array_search('maize_chemicals_properusage', $header);	
		$index_mapping['maize_chemical_whoapplied'] = array_search('maize_chemical_whoapplied', $header);	
		$index_mapping['maize_chemical_whoapplied_other'] = array_search('maize_chemical_whoapplied_other', $header);	
		$index_mapping['maize_acreage_chemicals'] = array_search('maize_acreage_chemicals', $header);
		$index_mapping['maize_detect_counterfeit'] = array_search('maize_detect_counterfeit', $header);	
		$index_mapping['maize_opinion'] = array_search('maize_opinion', $header);	
		$index_mapping['maize_counterfeit_improvedseeds'] = array_search('maize_counterfeit_improvedseeds', $header);	
		$index_mapping['maize_counterfeit_herbicides'] = array_search('maize_counterfeit_herbicides', $header);	
		$index_mapping['maize_counterfeit_pesticides'] = array_search('maize_counterfeit_pesticides', $header);	
		$index_mapping['maize_counterfeit_Fungicides'] = array_search('maize_counterfeit_Fungicides', $header);	
		$index_mapping['maize_counterfeit_Fertilizers'] = array_search('maize_counterfeit_Fertilizers', $header);	
		$index_mapping['maize_avoid_counterfeits'] = array_search('maize_avoid_counterfeits', $header);	
		$index_mapping['maize_avoid_counterfeits_other'] = array_search('maize_avoid_counterfeits_other', $header);	
		$index_mapping['maize_dry_harvested'] = array_search('maize_dry_harvested', $header);
		$index_mapping['maize_dry_harvested_other'] = array_search('maize_dry_harvested_other', $header);	
		$index_mapping['maize_shell_use'] = array_search('maize_shell_use', $header);	
		$index_mapping['maize_shell_use_other'] = array_search('maize_shell_use_other', $header);	
		$index_mapping['maize_storage'] = array_search('maize_storage', $header);	
		$index_mapping['maize_storage_other'] = array_search('maize_storage_other', $header);	
		$index_mapping['maize_cost_production'] = array_search('maize_cost_production', $header);	
		$index_mapping['maize_cost_production_machinery'] = array_search('maize_cost_production_machinery', $header);	
		$index_mapping['maize_cost_production_improvedseed'] = array_search('maize_cost_production_improvedseed', $header);	
		$index_mapping['maize_cost_production_fertilizers'] = array_search('maize_cost_production_fertilizers', $header);	
		$index_mapping['maize_cost_production_chemicals'] = array_search('maize_cost_production_chemicals', $header);	
		$index_mapping['maize_cost_production_storage'] = array_search('maize_cost_production_storage', $header);	
		$index_mapping['maize_cost_production_transportation'] = array_search('maize_cost_production_transportation', $header);	
		$index_mapping['maize_cost_production_labour'] = array_search('maize_cost_production_labour', $header);	
		$index_mapping['maize_cost_production_other'] = array_search('maize_cost_production_other', $header);	
		$index_mapping['maize_harvested'] = array_search('maize_harvested', $header);	
		$index_mapping['maize_sold'] = array_search('maize_sold', $header);	
		$index_mapping['maize_sold_lastperiod'] = array_search('maize_sold_lastperiod', $header);	
		$index_mapping['maize_common_price'] = array_search('maize_common_price', $header);	
		$index_mapping['maize_lost'] = array_search('maize_lost', $header);	
		$index_mapping['maize_aware_standard'] = array_search('maize_aware_standard', $header);
		$index_mapping['farmer_crop_beans_crop'] = array_search('farmer_crop_beans_crop', $header);	
		$index_mapping['beans_other_crop'] = array_search('beans_other_crop', $header);	
		$index_mapping['beans_other_crop_other'] = array_search('beans_other_crop_other', $header);	
		$index_mapping['beans_acreage'] = array_search('beans_acreage', $header);	
		$index_mapping['beans_acreage_mapped'] = array_search('beans_acreage_mapped', $header);	
		$index_mapping['beans_equipment_openingland'] = array_search('beans_equipment_openingland', $header);	
		$index_mapping['beans_seed_variety'] = array_search('beans_seed_variety', $header);	
		$index_mapping['beans_improvedseeds_notuse'] = array_search('beans_improvedseeds_notuse', $header);	
		$index_mapping['beans_improvedseeds_notuse_other'] = array_search('beans_improvedseeds_notuse_other', $header);	
		$index_mapping['beans_improvedseeds_benefits'] = array_search('beans_improvedseeds_benefits', $header);	
		$index_mapping['beans_improvedseeds_benefits_other'] = array_search('beans_improvedseeds_benefits_other', $header);	
		$index_mapping['beans_improvedseed_supplier'] = array_search('beans_improvedseed_supplier', $header);	
		$index_mapping['beans_improvedseed_supplier_other'] = array_search('beans_improvedseed_supplier_other', $header);	
		$index_mapping['beans_improvedseed_properusage'] = array_search('beans_improvedseed_properusage', $header);	
		$index_mapping['beans_acreage_improvedseeds'] = array_search('beans_acreage_improvedseeds', $header);	
		$index_mapping['beans_equipment_planting'] = array_search('beans_equipment_planting', $header);	
		$index_mapping['beans_equipment_planting_other'] = array_search('beans_equipment_planting_other', $header);	
		$index_mapping['beans_whoplanted'] = array_search('beans_whoplanted', $header);	
		$index_mapping['beans_whoplanted_Other'] = array_search('beans_whoplanted_Other', $header);	
		$index_mapping['beans_fertilizer_use'] = array_search('beans_fertilizer_use', $header);	
		$index_mapping['beans_fertlizer_notuse'] = array_search('beans_fertlizer_notuse', $header);	
		$index_mapping['beans_fertlizer_notuse_other'] = array_search('beans_fertlizer_notuse_other', $header);	
		$index_mapping['beans_fertilizer_benefits'] = array_search('beans_fertilizer_benefits', $header);	
		$index_mapping['beans_fertilizer_benefits_other'] = array_search('beans_fertilizer_benefits_other', $header);	
		$index_mapping['beans_fertilizer_supplier'] = array_search('beans_fertilizer_supplier', $header);	
		$index_mapping['beans_fertilizer_supplier_other'] = array_search('beans_fertilizer_supplier_other', $header);	
		$index_mapping['beans_fertilizer_properusage'] = array_search('beans_fertilizer_properusage', $header);	
		$index_mapping['beans_ferilizer_whosupplied'] = array_search('beans_ferilizer_whosupplied', $header);	
		$index_mapping['beans_ferilizer_whosupplied_other'] = array_search('beans_ferilizer_whosupplied_other', $header);	
		$index_mapping['beans_acreage_fertilizers'] = array_search('beans_acreage_fertilizers', $header);
		$index_mapping['beans_chemical_use'] = array_search('beans_chemical_use', $header);	
		$index_mapping['beans_chemical_use_other'] = array_search('beans_chemical_use_other', $header);	
		$index_mapping['beans_chemical_notuse'] = array_search('beans_chemical_notuse', $header);	
		$index_mapping['beans_chemical_notuse_other'] = array_search('beans_chemical_notuse_other', $header);	
		$index_mapping['beans_chemicals_benefits'] = array_search('beans_chemicals_benefits', $header);	
		$index_mapping['beans_chemicals_benefits_other'] = array_search('beans_chemicals_benefits_other', $header);	
		$index_mapping['beans_chemicals_supplier'] = array_search('beans_chemicals_supplier', $header);	
		$index_mapping['beans_chemicals_supplier_other'] = array_search('beans_chemicals_supplier_other', $header);	
		$index_mapping['beans_chemicals_properusage'] = array_search('beans_chemicals_properusage', $header);	
		$index_mapping['beans_chemical_whoapplied'] = array_search('beans_chemical_whoapplied', $header);
		$index_mapping['beans_chemical_whoapplied_other'] = array_search('beans_chemical_whoapplied_other', $header);	
		$index_mapping['beans_acreage_chemicals'] = array_search('beans_acreage_chemicals', $header);	
		$index_mapping['beans_detect_counterfeit'] = array_search('beans_detect_counterfeit', $header);	
		$index_mapping['beans_opinion'] = array_search('beans_opinion', $header);	
		$index_mapping['beans_counterfeit_improvedseeds'] = array_search('beans_counterfeit_improvedseeds', $header);	
		$index_mapping['beans_counterfeit_herbicides'] = array_search('beans_counterfeit_herbicides', $header);	
		$index_mapping['beans_counterfeit_pesticides'] = array_search('beans_counterfeit_pesticides', $header);	
		$index_mapping['beans_counterfeit_Fungicides'] = array_search('beans_counterfeit_Fungicides', $header);	
		$index_mapping['beans_counterfeit_Fertilizers'] = array_search('beans_counterfeit_Fertilizers', $header);	
		$index_mapping['beans_avoid_counterfeits'] = array_search('beans_avoid_counterfeits', $header);	
		$index_mapping['beans_avoid_counterfeits_other'] = array_search('beans_avoid_counterfeits_other', $header);	
		$index_mapping['beans_dry_harvested'] = array_search('beans_dry_harvested', $header);	
		$index_mapping['beans_dry_harvested_other'] = array_search('beans_dry_harvested_other', $header);	
		$index_mapping['beans_shell_use'] = array_search('beans_shell_use', $header);	
		$index_mapping['beans_shell_use_other'] = array_search('beans_shell_use_other', $header);	
		$index_mapping['beans_storage'] = array_search('beans_storage', $header);	
		$index_mapping['beans_storage_other'] = array_search('beans_storage_other', $header);	
		$index_mapping['beans_cost_production'] = array_search('beans_cost_production', $header);	
		$index_mapping['beans_cost_production_machinery'] = array_search('beans_cost_production_machinery', $header);	
		$index_mapping['beans_cost_production_improvedseed'] = array_search('beans_cost_production_improvedseed', $header);
		$index_mapping['beans_cost_production_fertilizers'] = array_search('beans_cost_production_fertilizers', $header);	
		$index_mapping['beans_cost_production_chemicals'] = array_search('beans_cost_production_chemicals', $header);	
		$index_mapping['beans_cost_production_storage'] = array_search('beans_cost_production_storage', $header);	
		$index_mapping['beans_cost_production_transportation'] = array_search('beans_cost_production_transportation', $header);	
		$index_mapping['beans_cost_production_labour'] = array_search('beans_cost_production_labour', $header);	
		$index_mapping['beans_cost_production_other'] = array_search('beans_cost_production_other', $header);	
		$index_mapping['beans_harvested'] = array_search('beans_harvested', $header);	
		$index_mapping['beans_sold'] = array_search('beans_sold', $header);	
		$index_mapping['beans_sold_lastperiod'] = array_search('beans_sold_lastperiod', $header);	
		$index_mapping['beans_common_price'] = array_search('beans_common_price', $header);
		$index_mapping['beans_lost'] = array_search('beans_lost', $header);	
		$index_mapping['beans_aware_standard'] = array_search('beans_aware_standard', $header);	
		$index_mapping['farmer_crop_coffee_newtrees'] = array_search('farmer_crop_coffee_newtrees', $header);	
		$index_mapping['farmer_crop_coffee_crop'] = array_search('farmer_crop_coffee_crop', $header);	
		$index_mapping['coffee_other_crop'] = array_search('coffee_other_crop', $header);	
		$index_mapping['coffee_other_crop_other'] = array_search('coffee_other_crop_other', $header);	
		$index_mapping['coffee_acreage'] = array_search('coffee_acreage', $header);	
		$index_mapping['coffee_acreage_mapped'] = array_search('coffee_acreage_mapped', $header);	
		$index_mapping['coffee_equipment_openingland'] = array_search('coffee_equipment_openingland', $header);	
		$index_mapping['coffee_tree_variety'] = array_search('coffee_tree_variety', $header);
		$index_mapping['coffee_improvedtrees_notuse'] = array_search('coffee_improvedtrees_notuse', $header);	
		$index_mapping['coffee_improvedtrees_notuse_other'] = array_search('coffee_improvedtrees_notuse_other', $header);	
		$index_mapping['coffee_improvedtrees_benefits'] = array_search('coffee_improvedtrees_benefits', $header);	
		$index_mapping['coffee_improvedtrees_benefits_other'] = array_search('coffee_improvedtrees_benefits_other', $header);	
		$index_mapping['coffee_improvedtrees_supplier'] = array_search('coffee_improvedtrees_supplier', $header);	
		$index_mapping['coffee_improvedtrees_supplier_other'] = array_search('coffee_improvedtrees_supplier_other', $header);	
		$index_mapping['coffee_improvedtrees_properusage'] = array_search('coffee_improvedtrees_properusage', $header);	
		$index_mapping['coffee_acreage_improvedtrees'] = array_search('coffee_acreage_improvedtrees', $header);	
		$index_mapping['coffee_acreage_improvedtrees_mapped'] = array_search('coffee_acreage_improvedtrees_mapped', $header);	
		$index_mapping['coffee_equipment_planting'] = array_search('coffee_equipment_planting', $header);
		$index_mapping['coffee_equipment_planting_other'] = array_search('coffee_equipment_planting_other', $header);	
		$index_mapping['coffee_whoplanted'] = array_search('coffee_whoplanted', $header);	
		$index_mapping['coffee_whoplanted_Other'] = array_search('coffee_whoplanted_Other', $header);	
		$index_mapping['coffee_fertilizer_use'] = array_search('coffee_fertilizer_use', $header);	
		$index_mapping['coffee_fertlizer_notuse'] = array_search('coffee_fertlizer_notuse', $header);	
		$index_mapping['coffee_fertlizer_notuse_other'] = array_search('coffee_fertlizer_notuse_other', $header);	
		$index_mapping['coffee_fertilizer_benefits'] = array_search('coffee_fertilizer_benefits', $header);	
		$index_mapping['coffee_fertilizer_benefits_other'] = array_search('coffee_fertilizer_benefits_other', $header);	
		$index_mapping['coffee_fertilizer_supplier'] = array_search('coffee_fertilizer_supplier', $header);	
		$index_mapping['coffee_fertilizer_supplier_other'] = array_search('coffee_fertilizer_supplier_other', $header);	
		$index_mapping['coffee_fertilizer_properusage'] = array_search('coffee_fertilizer_properusage', $header);	
		$index_mapping['coffee_ferilizer_whosupplied'] = array_search('coffee_ferilizer_whosupplied', $header);	
		$index_mapping['coffee_ferilizer_whosupplied_other'] = array_search('coffee_ferilizer_whosupplied_other', $header);	
		$index_mapping['coffee_acreage_fertilizers'] = array_search('coffee_acreage_fertilizers', $header);	
		$index_mapping['coffee_chemical_use'] = array_search('coffee_chemical_use', $header);	
		$index_mapping['coffee_chemical_notuse'] = array_search('coffee_chemical_notuse', $header);	
		$index_mapping['coffee_chemical_notuse_other'] = array_search('coffee_chemical_notuse_other', $header);	
		$index_mapping['coffee_chemicals_benefits'] = array_search('coffee_chemicals_benefits', $header);	
		$index_mapping['coffee_chemicals_benefits_other'] = array_search('coffee_chemicals_benefits_other', $header);	
		$index_mapping['coffee_chemicals_supplier'] = array_search('coffee_chemicals_supplier', $header);
		$index_mapping['coffee_chemicals_supplier_other'] = array_search('coffee_chemicals_supplier_other', $header);	
		$index_mapping['coffee_chemicals_properusage'] = array_search('coffee_chemicals_properusage', $header);	
		$index_mapping['coffee_chemical_whoapplied'] = array_search('coffee_chemical_whoapplied', $header);	
		$index_mapping['coffee_chemical_whoapplied_other'] = array_search('coffee_chemical_whoapplied_other', $header);	
		$index_mapping['coffee_acreage_chemicals'] = array_search('coffee_acreage_chemicals', $header);	
		$index_mapping['coffee_detect_counterfeit'] = array_search('coffee_detect_counterfeit', $header);	
		$index_mapping['coffee_opinion'] = array_search('coffee_opinion', $header);	
		$index_mapping['coffee_counterfeit_improvedtrees'] = array_search('coffee_counterfeit_improvedtrees', $header);	
		$index_mapping['coffee_counterfeit_herbicides'] = array_search('coffee_counterfeit_herbicides', $header);	
		$index_mapping['coffee_counterfeit_pesticides'] = array_search('coffee_counterfeit_pesticides', $header);
		$index_mapping['coffee_counterfeit_Fungicides'] = array_search('coffee_counterfeit_Fungicides', $header);	
		$index_mapping['coffee_counterfeit_Fertilizers'] = array_search('coffee_counterfeit_Fertilizers', $header);	
		$index_mapping['coffee_avoid_counterfeits'] = array_search('coffee_avoid_counterfeits', $header);	
		$index_mapping['coffee_avoid_counterfeits_other'] = array_search('coffee_avoid_counterfeits_other', $header);	
		$index_mapping['coffee_dry_harvested'] = array_search('coffee_dry_harvested', $header);	
		$index_mapping['coffee_dry_harvested_other'] = array_search('coffee_dry_harvested_other', $header);	
		$index_mapping['coffee_storage'] = array_search('coffee_storage', $header);	
		$index_mapping['coffee_storage_other'] = array_search('coffee_storage_other', $header);	
		$index_mapping['coffee_cost_production'] = array_search('coffee_cost_production', $header);	
		$index_mapping['coffee_cost_production_machinery'] = array_search('coffee_cost_production_machinery', $header);
		$index_mapping['coffee_cost_production_improvedseed'] = array_search('coffee_cost_production_improvedseed', $header);	
		$index_mapping['coffee_cost_production_fertilizers'] = array_search('coffee_cost_production_fertilizers', $header);	
		$index_mapping['coffee_cost_production_chemicals'] = array_search('coffee_cost_production_chemicals', $header);	
		$index_mapping['coffee_cost_production_storage'] = array_search('coffee_cost_production_storage', $header);	
		$index_mapping['coffee_cost_production_transportation'] = array_search('coffee_cost_production_transportation', $header);	
		$index_mapping['coffee_cost_production_labour'] = array_search('coffee_cost_production_labour', $header);	
		$index_mapping['coffee_cost_production_other'] = array_search('coffee_cost_production_other', $header);	
		$index_mapping['coffee_harvested'] = array_search('coffee_harvested', $header);	
		$index_mapping['coffee_sold'] = array_search('coffee_sold', $header);	
		$index_mapping['coffee_sold_lastperiod'] = array_search('coffee_sold_lastperiod', $header);	
		$index_mapping['coffee_common_price'] = array_search('coffee_common_price', $header);	
		$index_mapping['coffee_lost'] = array_search('coffee_lost', $header);	
		$index_mapping['coffee_aware_standard'] = array_search('coffee_aware_standard', $header);	
		$index_mapping['loan_access'] = array_search('loan_access', $header);	
		$index_mapping['loan_accessed'] = array_search('loan_accessed', $header);	
		$index_mapping['climate_change_impact'] = array_search('climate_change_impact', $header);	
		$index_mapping['implemented_mgt_climate'] = array_search('implemented_mgt_climate', $header);	
		$index_mapping['implemented_mgt_climate_action'] = array_search('implemented_mgt_climate_action', $header);	
		$index_mapping['implemented_mgt_climate_action_other'] = array_search('implemented_mgt_climate_action_other', $header);
		$index_mapping['protection_counterfeit'] = array_search('protection_counterfeit', $header);	
		$index_mapping['protection_counterfeit_other'] = array_search('protection_counterfeit_other', $header);	
		$index_mapping['hotline_counterfeit'] = array_search('hotline_counterfeit', $header);	
		$index_mapping['hotline_evercalled'] = array_search('hotline_evercalled', $header);	
		$index_mapping['receive_information_method'] = array_search('receive_information_method', $header);	
		$index_mapping['receive_information_method_other'] = array_search('receive_information_method_other', $header);	
		$index_mapping['farming_decisions'] = array_search('farming_decisions', $header);	
		$index_mapping['farm_assets'] = array_search('farm_assets', $header);	
		$index_mapping['money_spent'] = array_search('money_spent', $header);	
		$index_mapping['training_events'] = array_search('training_events', $header);	
		$index_mapping['member_organisation'] = array_search('member_organisation', $header);	
		$index_mapping['GPSLatitude'] = array_search('GPSLatitude', $header);	
		$index_mapping['GPSLongitude'] = array_search('GPSLongitude', $header);	
		$index_mapping['GPSAltitude'] = array_search('GPSAltitude', $header);	
		$index_mapping['GPSAccuracy'] = array_search('GPSAccuracy', $header);	
		$index_mapping['X_axis'] = array_search('X_axis', $header);	
		$index_mapping['Y_axis'] = array_search('Y_axis', $header);
		
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
	
	 
	function process_data_record($record) {
		global $index_mapping;

		//Pick Ugandan time
		date_default_timezone_set("Etc/GMT-3");
		$connect = mysqli_connect("localhost",  "root", "cpmmisV1", "db_cpmadummy");

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
                logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
			
		
		}
		

		
		$msg_at_readtime='none';
		$today=date('Y-m-d');
		$yesterday=date('Y-m-d',strtotime("-1 days"));
		$timestamp=date('Y-m-d h:i:s');
		@mysqli_autocommit($connect,FALSE);

		$stmnt_check="SELECT MAX(`pk_patId`) as pk_patId  FROM `tbl_frm6particulars`";
		$Qcheck=@mysqli_query($connect,$stmnt_check) or die (mysqli_error($connect));


		if (!$Qcheck)
				{
					$msg_at_readtime=mysqli_error($connect);
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
		if(@mysqli_num_rows($Qcheck)>0){
				$Rcheck=mysqli_fetch_array($Qcheck);
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
 
			$pk_patId=($record[$index_mapping['pk_patId']]); 	 
			$interview_date=dateConversion(removeWhiteSpaces(($record[$index_mapping['interview_date']])));
			$interview_date=((($interview_date)!=='' or  !(empty($interview_date)))? $interview_date :$today);	
			$farmer_code=($record[$index_mapping['farmer_code']]); 	
			$Name_Resp=($record[$index_mapping['Name_Resp']]); 	
			$farmer_crop_maize=($record[$index_mapping['farmer_crop_maize']]); 	
			$farmer_crop_beans=($record[$index_mapping['farmer_crop_beans']]); 	
			$farmer_crop_coffee=($record[$index_mapping['farmer_crop_coffee']]); 	
			$farmer_crop_maize_crop=($record[$index_mapping['farmer_crop_maize_crop']]); 	
			$maize_other_crop=($record[$index_mapping['maize_other_crop']]); 	
			$maize_other_crop_other=($record[$index_mapping['maize_other_crop_other']]); 
			$maize_acreage=($record[$index_mapping['maize_acreage']]); 	
			$maize_acreage_mapped=($record[$index_mapping['maize_acreage_mapped']]); 	
			$maize_equipment_openingland=($record[$index_mapping['maize_equipment_openingland']]); 	
			$maize_seed_variety=($record[$index_mapping['maize_seed_variety']]); 	
			$maize_improvedseeds_notuse=($record[$index_mapping['maize_improvedseeds_notuse']]); 	
			$maize_improvedseeds_notuse_other=($record[$index_mapping['maize_improvedseeds_notuse_other']]); 	
			$maize_improvedseeds_benefits=($record[$index_mapping['maize_improvedseeds_benefits']]); 	
			$maize_improvedseeds_benefits_other=($record[$index_mapping['maize_improvedseeds_benefits_other']]); 	
			$maize_improvedseed_supplier=($record[$index_mapping['maize_improvedseed_supplier']]); 
			$maize_improvedseed_supplier_other=($record[$index_mapping['maize_improvedseed_supplier_other']]); 	
			$maize_improvedseed_properusage=($record[$index_mapping['maize_improvedseed_properusage']]); 	
			$maize_acreage_improvedseeds=($record[$index_mapping['maize_acreage_improvedseeds']]); 	
			$maize_equipment_planting=($record[$index_mapping['maize_equipment_planting']]); 	
			$maize_equipment_planting_other=($record[$index_mapping['maize_equipment_planting_other']]); 	
			$maize_whoplanted=($record[$index_mapping['maize_whoplanted']]); 	
			$maize_whoplanted_Other=($record[$index_mapping['maize_whoplanted_Other']]); 	
			$maize_fertilizer_use=($record[$index_mapping['maize_fertilizer_use']]); 	
			$maize_fertlizer_notuse=($record[$index_mapping['maize_fertlizer_notuse']]); 	
			$maize_fertlizer_notuse_other=($record[$index_mapping['maize_fertlizer_notuse_other']]); 	
			$maize_fertilizer_benefits=($record[$index_mapping['maize_fertilizer_benefits']]); 	
			$maize_fertilizer_benefits_other=($record[$index_mapping['maize_fertilizer_benefits_other']]); 	
			$maize_fertilizer_supplier=($record[$index_mapping['maize_fertilizer_supplier']]); 	
			$maize_fertilizer_supplier_other=($record[$index_mapping['maize_fertilizer_supplier_other']]); 	
			$maize_fertilizer_properusage=($record[$index_mapping['maize_fertilizer_properusage']]); 	
			$maize_ferilizer_whosupplied=($record[$index_mapping['maize_ferilizer_whosupplied']]); 	
			$maize_ferilizer_whosupplied_other=($record[$index_mapping['maize_ferilizer_whosupplied_other']]); 	
			$maize_acreage_fertilizers=($record[$index_mapping['maize_acreage_fertilizers']]); 	
			$maize_chemical_use=($record[$index_mapping['maize_chemical_use']]); 	
			$maize_chemical_use_other=($record[$index_mapping['maize_chemical_use_other']]); 	
			$maize_chemical_notuse=($record[$index_mapping['maize_chemical_notuse']]); 	
			$maize_chemical_notuse_other=($record[$index_mapping['maize_chemical_notuse_other']]); 	
			$maize_chemicals_benefits=($record[$index_mapping['maize_chemicals_benefits']]); 	
			$maize_chemicals_benefits_other=($record[$index_mapping['maize_chemicals_benefits_other']]); 	
			$maize_chemicals_supplier=($record[$index_mapping['maize_chemicals_supplier']]); 	
			$maize_chemicals_supplier_other=($record[$index_mapping['maize_chemicals_supplier_other']]); 	
			$maize_chemicals_properusage=($record[$index_mapping['maize_chemicals_properusage']]); 	
			$maize_chemical_whoapplied=($record[$index_mapping['maize_chemical_whoapplied']]); 	
			$maize_chemical_whoapplied_other=($record[$index_mapping['maize_chemical_whoapplied_other']]); 
			$maize_acreage_chemicals=($record[$index_mapping['maize_acreage_chemicals']]); 	
			$maize_detect_counterfeit=($record[$index_mapping['maize_detect_counterfeit']]); 	
			$maize_opinion=($record[$index_mapping['maize_opinion']]); 	
			$maize_counterfeit_improvedseeds=($record[$index_mapping['maize_counterfeit_improvedseeds']]); 	
			$maize_counterfeit_herbicides=($record[$index_mapping['maize_counterfeit_herbicides']]); 	
			$maize_counterfeit_pesticides=($record[$index_mapping['maize_counterfeit_pesticides']]); 	
			$maize_counterfeit_Fungicides=($record[$index_mapping['maize_counterfeit_Fungicides']]); 	
			$maize_counterfeit_Fertilizers=($record[$index_mapping['maize_counterfeit_Fertilizers']]); 	
			$maize_avoid_counterfeits=($record[$index_mapping['maize_avoid_counterfeits']]); 	
			$maize_avoid_counterfeits_other=($record[$index_mapping['maize_avoid_counterfeits_other']]); 	
			$maize_dry_harvested=($record[$index_mapping['maize_dry_harvested']]); 	
			$maize_dry_harvested_other=($record[$index_mapping['maize_dry_harvested_other']]); 	
			$maize_shell_use=($record[$index_mapping['maize_shell_use']]); 	
			$maize_shell_use_other=($record[$index_mapping['maize_shell_use_other']]); 	
			$maize_storage=($record[$index_mapping['maize_storage']]); 	
			$maize_storage_other=($record[$index_mapping['maize_storage_other']]); 	
			$maize_cost_production=($record[$index_mapping['maize_cost_production']]); 	
			$maize_cost_production_machinery=($record[$index_mapping['maize_cost_production_machinery']]); 	
			$maize_cost_production_improvedseed=($record[$index_mapping['maize_cost_production_improvedseed']]); 	
			$maize_cost_production_fertilizers=($record[$index_mapping['maize_cost_production_fertilizers']]); 	
			$maize_cost_production_chemicals=($record[$index_mapping['maize_cost_production_chemicals']]); 	
			$maize_cost_production_storage=($record[$index_mapping['maize_cost_production_storage']]); 	
			$maize_cost_production_transportation=($record[$index_mapping['maize_cost_production_transportation']]); 	
			$maize_cost_production_labour=($record[$index_mapping['maize_cost_production_labour']]); 	
			$maize_cost_production_other=($record[$index_mapping['maize_cost_production_other']]); 	
			$maize_harvested=($record[$index_mapping['maize_harvested']]); 	
			$maize_sold=($record[$index_mapping['maize_sold']]); 	
			$maize_sold_lastperiod=($record[$index_mapping['maize_sold_lastperiod']]); 	
			$maize_common_price=($record[$index_mapping['maize_common_price']]); 	
			$maize_lost=($record[$index_mapping['maize_lost']]); 	
			$maize_aware_standard=($record[$index_mapping['maize_aware_standard']]); 
			$farmer_crop_beans_crop=($record[$index_mapping['farmer_crop_beans_crop']]); 	
			$beans_other_crop=($record[$index_mapping['beans_other_crop']]); 	
			$beans_other_crop_other=($record[$index_mapping['beans_other_crop_other']]); 	
			$beans_acreage=($record[$index_mapping['beans_acreage']]); 	
			$beans_acreage_mapped=($record[$index_mapping['beans_acreage_mapped']]); 	
			$beans_equipment_openingland=($record[$index_mapping['beans_equipment_openingland']]); 
			$beans_seed_variety=($record[$index_mapping['beans_seed_variety']]); 	
			$beans_improvedseeds_notuse=($record[$index_mapping['beans_improvedseeds_notuse']]); 	
			$beans_improvedseeds_notuse_other=($record[$index_mapping['beans_improvedseeds_notuse_other']]); 	
			$beans_improvedseeds_benefits=($record[$index_mapping['beans_improvedseeds_benefits']]); 	
			$beans_improvedseeds_benefits_other=($record[$index_mapping['beans_improvedseeds_benefits_other']]); 	
			$beans_improvedseed_supplier=($record[$index_mapping['beans_improvedseed_supplier']]); 	
			$beans_improvedseed_supplier_other=($record[$index_mapping['beans_improvedseed_supplier_other']]); 	
			$beans_improvedseed_properusage=($record[$index_mapping['beans_improvedseed_properusage']]); 	
			$beans_acreage_improvedseeds=($record[$index_mapping['beans_acreage_improvedseeds']]); 	
			$beans_equipment_planting=($record[$index_mapping['beans_equipment_planting']]); 	
			$beans_equipment_planting_other=($record[$index_mapping['beans_equipment_planting_other']]); 	
			$beans_whoplanted=($record[$index_mapping['beans_whoplanted']]); 	
			$beans_whoplanted_Other=($record[$index_mapping['beans_whoplanted_Other']]); 	
			$beans_fertilizer_use=($record[$index_mapping['beans_fertilizer_use']]); 	
			$beans_fertlizer_notuse=($record[$index_mapping['beans_fertlizer_notuse']]); 	
			$beans_fertlizer_notuse_other=($record[$index_mapping['beans_fertlizer_notuse_other']]); 	
			$beans_fertilizer_benefits=($record[$index_mapping['beans_fertilizer_benefits']]); 	
			$beans_fertilizer_benefits_other=($record[$index_mapping['beans_fertilizer_benefits_other']]); 	
			$beans_fertilizer_supplier=($record[$index_mapping['beans_fertilizer_supplier']]); 	
			$beans_fertilizer_supplier_other=($record[$index_mapping['beans_fertilizer_supplier_other']]); 	
			$beans_fertilizer_properusage=($record[$index_mapping['beans_fertilizer_properusage']]); 	
			$beans_ferilizer_whosupplied=($record[$index_mapping['beans_ferilizer_whosupplied']]); 	
			$beans_ferilizer_whosupplied_other=($record[$index_mapping['beans_ferilizer_whosupplied_other']]); 	
			$beans_acreage_fertilizers=($record[$index_mapping['beans_acreage_fertilizers']]); 
			$beans_chemical_use=($record[$index_mapping['beans_chemical_use']]); 	
			$beans_chemical_use_other=($record[$index_mapping['beans_chemical_use_other']]); 	
			$beans_chemical_notuse=($record[$index_mapping['beans_chemical_notuse']]); 	
			$beans_chemical_notuse_other=($record[$index_mapping['beans_chemical_notuse_other']]); 	
			$beans_chemicals_benefits=($record[$index_mapping['beans_chemicals_benefits']]); 	
			$beans_chemicals_benefits_other=($record[$index_mapping['beans_chemicals_benefits_other']]); 	
			$beans_chemicals_supplier=($record[$index_mapping['beans_chemicals_supplier']]); 	
			$beans_chemicals_supplier_other=($record[$index_mapping['beans_chemicals_supplier_other']]); 	
			$beans_chemicals_properusage=($record[$index_mapping['beans_chemicals_properusage']]); 	
			$beans_chemical_whoapplied=($record[$index_mapping['beans_chemical_whoapplied']]); 	
			$beans_chemical_whoapplied_other=($record[$index_mapping['beans_chemical_whoapplied_other']]); 	
			$beans_acreage_chemicals=($record[$index_mapping['beans_acreage_chemicals']]); 	
			$beans_detect_counterfeit=($record[$index_mapping['beans_detect_counterfeit']]); 	
			$beans_opinion=($record[$index_mapping['beans_opinion']]); 	
			$beans_counterfeit_improvedseeds=($record[$index_mapping['beans_counterfeit_improvedseeds']]); 	
			$beans_counterfeit_herbicides=($record[$index_mapping['beans_counterfeit_herbicides']]); 	
			$beans_counterfeit_pesticides=($record[$index_mapping['beans_counterfeit_pesticides']]); 	
			$beans_counterfeit_Fungicides=($record[$index_mapping['beans_counterfeit_Fungicides']]); 	
			$beans_counterfeit_Fertilizers=($record[$index_mapping['beans_counterfeit_Fertilizers']]); 	
			$beans_avoid_counterfeits=($record[$index_mapping['beans_avoid_counterfeits']]); 	
			$beans_avoid_counterfeits_other=($record[$index_mapping['beans_avoid_counterfeits_other']]); 	
			$beans_dry_harvested=($record[$index_mapping['beans_dry_harvested']]); 	
			$beans_dry_harvested_other=($record[$index_mapping['beans_dry_harvested_other']]); 	
			$beans_shell_use=($record[$index_mapping['beans_shell_use']]); 	
			$beans_shell_use_other=($record[$index_mapping['beans_shell_use_other']]); 	
			$beans_storage=($record[$index_mapping['beans_storage']]); 	
			$beans_storage_other=($record[$index_mapping['beans_storage_other']]); 
			$beans_cost_production=($record[$index_mapping['beans_cost_production']]); 	
			$beans_cost_production_machinery=($record[$index_mapping['beans_cost_production_machinery']]); 	
			$beans_cost_production_improvedseed=($record[$index_mapping['beans_cost_production_improvedseed']]); 	
			$beans_cost_production_fertilizers=($record[$index_mapping['beans_cost_production_fertilizers']]); 	
			$beans_cost_production_chemicals=($record[$index_mapping['beans_cost_production_chemicals']]); 	
			$beans_cost_production_storage=($record[$index_mapping['beans_cost_production_storage']]); 	
			$beans_cost_production_transportation=($record[$index_mapping['beans_cost_production_transportation']]); 	
			$beans_cost_production_labour=($record[$index_mapping['beans_cost_production_labour']]); 	
			$beans_cost_production_other=($record[$index_mapping['beans_cost_production_other']]); 	
			$beans_harvested=($record[$index_mapping['beans_harvested']]); 	
			$beans_sold=($record[$index_mapping['beans_sold']]); 	
			$beans_sold_lastperiod=($record[$index_mapping['beans_sold_lastperiod']]); 	
			$beans_common_price=($record[$index_mapping['beans_common_price']]); 	
			$beans_lost=($record[$index_mapping['beans_lost']]); 	
			$beans_aware_standard=($record[$index_mapping['beans_aware_standard']]); 	
			$farmer_crop_coffee_newtrees=($record[$index_mapping['farmer_crop_coffee_newtrees']]); 	
			$farmer_crop_coffee_crop=($record[$index_mapping['farmer_crop_coffee_crop']]); 	
			$coffee_other_crop=($record[$index_mapping['coffee_other_crop']]); 
			$coffee_other_crop_other=($record[$index_mapping['coffee_other_crop_other']]); 	
			$coffee_acreage=($record[$index_mapping['coffee_acreage']]); 	
			$coffee_acreage_mapped=($record[$index_mapping['coffee_acreage_mapped']]); 	
			$coffee_equipment_openingland=($record[$index_mapping['coffee_equipment_openingland']]); 	
			$coffee_tree_variety=($record[$index_mapping['coffee_tree_variety']]); 	
			$coffee_improvedtrees_notuse=($record[$index_mapping['coffee_improvedtrees_notuse']]); 	
			$coffee_improvedtrees_notuse_other=($record[$index_mapping['coffee_improvedtrees_notuse_other']]); 	
			$coffee_improvedtrees_benefits=($record[$index_mapping['coffee_improvedtrees_benefits']]); 	
			$coffee_improvedtrees_benefits_other=($record[$index_mapping['coffee_improvedtrees_benefits_other']]); 	
			$coffee_improvedtrees_supplier=($record[$index_mapping['coffee_improvedtrees_supplier']]); 	
			$coffee_improvedtrees_supplier_other=($record[$index_mapping['coffee_improvedtrees_supplier_other']]); 	
			$coffee_improvedtrees_properusage=($record[$index_mapping['coffee_improvedtrees_properusage']]); 	
			$coffee_acreage_improvedtrees=($record[$index_mapping['coffee_acreage_improvedtrees']]); 	
			$coffee_acreage_improvedtrees_mapped=($record[$index_mapping['coffee_acreage_improvedtrees_mapped']]); 	
			$coffee_equipment_planting=($record[$index_mapping['coffee_equipment_planting']]); 	
			$coffee_equipment_planting_other=($record[$index_mapping['coffee_equipment_planting_other']]); 	
			$coffee_whoplanted=($record[$index_mapping['coffee_whoplanted']]); 	
			$coffee_whoplanted_Other=($record[$index_mapping['coffee_whoplanted_Other']]); 
			$coffee_fertilizer_use=($record[$index_mapping['coffee_fertilizer_use']]); 	
			$coffee_fertlizer_notuse=($record[$index_mapping['coffee_fertlizer_notuse']]); 	
			$coffee_fertlizer_notuse_other=($record[$index_mapping['coffee_fertlizer_notuse_other']]); 	
			$coffee_fertilizer_benefits=($record[$index_mapping['coffee_fertilizer_benefits']]); 	
			$coffee_fertilizer_benefits_other=($record[$index_mapping['coffee_fertilizer_benefits_other']]); 	
			$coffee_fertilizer_supplier=($record[$index_mapping['coffee_fertilizer_supplier']]); 	
			$coffee_fertilizer_supplier_other=($record[$index_mapping['coffee_fertilizer_supplier_other']]); 	
			$coffee_fertilizer_properusage=($record[$index_mapping['coffee_fertilizer_properusage']]); 	
			$coffee_ferilizer_whosupplied=($record[$index_mapping['coffee_ferilizer_whosupplied']]); 	
			$coffee_ferilizer_whosupplied_other=($record[$index_mapping['coffee_ferilizer_whosupplied_other']]); 	
			$coffee_acreage_fertilizers=($record[$index_mapping['coffee_acreage_fertilizers']]); 	
			$coffee_chemical_use=($record[$index_mapping['coffee_chemical_use']]); 	
			$coffee_chemical_notuse=($record[$index_mapping['coffee_chemical_notuse']]); 	
			$coffee_chemical_notuse_other=($record[$index_mapping['coffee_chemical_notuse_other']]); 	
			$coffee_chemicals_benefits=($record[$index_mapping['coffee_chemicals_benefits']]); 	
			$coffee_chemicals_benefits_other=($record[$index_mapping['coffee_chemicals_benefits_other']]); 	
			$coffee_chemicals_supplier=($record[$index_mapping['coffee_chemicals_supplier']]); 	
			$coffee_chemicals_supplier_other=($record[$index_mapping['coffee_chemicals_supplier_other']]); 	
			$coffee_chemicals_properusage=($record[$index_mapping['coffee_chemicals_properusage']]); 	
			$coffee_chemical_whoapplied=($record[$index_mapping['coffee_chemical_whoapplied']]); 	
			$coffee_chemical_whoapplied_other=($record[$index_mapping['coffee_chemical_whoapplied_other']]); 	
			$coffee_acreage_chemicals=($record[$index_mapping['coffee_acreage_chemicals']]); 	
			$coffee_detect_counterfeit=($record[$index_mapping['coffee_detect_counterfeit']]); 	
			$coffee_opinion=($record[$index_mapping['coffee_opinion']]); 	
			$coffee_counterfeit_improvedtrees=($record[$index_mapping['coffee_counterfeit_improvedtrees']]); 	
			$coffee_counterfeit_herbicides=($record[$index_mapping['coffee_counterfeit_herbicides']]); 	
			$coffee_counterfeit_pesticides=($record[$index_mapping['coffee_counterfeit_pesticides']]); 	
			$coffee_counterfeit_Fungicides=($record[$index_mapping['coffee_counterfeit_Fungicides']]); 	
			$coffee_counterfeit_Fertilizers=($record[$index_mapping['coffee_counterfeit_Fertilizers']]); 	
			$coffee_avoid_counterfeits=($record[$index_mapping['coffee_avoid_counterfeits']]); 	
			$coffee_avoid_counterfeits_other=($record[$index_mapping['coffee_avoid_counterfeits_other']]); 	
			$coffee_dry_harvested=($record[$index_mapping['coffee_dry_harvested']]); 	
			$coffee_dry_harvested_other=($record[$index_mapping['coffee_dry_harvested_other']]); 	
			$coffee_storage=($record[$index_mapping['coffee_storage']]); 	
			$coffee_storage_other=($record[$index_mapping['coffee_storage_other']]); 	
			$coffee_cost_production=($record[$index_mapping['coffee_cost_production']]); 	
			$coffee_cost_production_machinery=($record[$index_mapping['coffee_cost_production_machinery']]); 	
			$coffee_cost_production_improvedseed=($record[$index_mapping['coffee_cost_production_improvedseed']]); 	
			$coffee_cost_production_fertilizers=($record[$index_mapping['coffee_cost_production_fertilizers']]); 	
			$coffee_cost_production_chemicals=($record[$index_mapping['coffee_cost_production_chemicals']]); 	
			$coffee_cost_production_storage=($record[$index_mapping['coffee_cost_production_storage']]); 	
			$coffee_cost_production_transportation=($record[$index_mapping['coffee_cost_production_transportation']]); 	
			$coffee_cost_production_labour=($record[$index_mapping['coffee_cost_production_labour']]); 	
			$coffee_cost_production_other=($record[$index_mapping['coffee_cost_production_other']]); 	
			$coffee_harvested=($record[$index_mapping['coffee_harvested']]); 	
			$coffee_sold=($record[$index_mapping['coffee_sold']]); 	
			$coffee_sold_lastperiod=($record[$index_mapping['coffee_sold_lastperiod']]); 	
			$coffee_common_price=($record[$index_mapping['coffee_common_price']]); 	
			$coffee_lost=($record[$index_mapping['coffee_lost']]); 	
			$coffee_aware_standard=($record[$index_mapping['coffee_aware_standard']]); 	
			$loan_access=($record[$index_mapping['loan_access']]); 	
			$loan_accessed=($record[$index_mapping['loan_accessed']]); 	
			$climate_change_impact=($record[$index_mapping['climate_change_impact']]); 	
			$implemented_mgt_climate=($record[$index_mapping['implemented_mgt_climate']]); 	
			$implemented_mgt_climate_action=($record[$index_mapping['implemented_mgt_climate_action']]); 	
			$implemented_mgt_climate_action_other=($record[$index_mapping['implemented_mgt_climate_action_other']]); 	
			$protection_counterfeit=($record[$index_mapping['protection_counterfeit']]); 	
			$protection_counterfeit_other=($record[$index_mapping['protection_counterfeit_other']]); 	
			$hotline_counterfeit=($record[$index_mapping['hotline_counterfeit']]); 	
			$hotline_evercalled=($record[$index_mapping['hotline_evercalled']]); 	
			$receive_information_method=($record[$index_mapping['receive_information_method']]); 	
			$receive_information_method_other=($record[$index_mapping['receive_information_method_other']]); 	
			$farming_decisions=($record[$index_mapping['farming_decisions']]); 	
			$farm_assets=($record[$index_mapping['farm_assets']]); 	
			$money_spent=($record[$index_mapping['money_spent']]); 	
			$training_events=($record[$index_mapping['training_events']]); 	
			$member_organisation=($record[$index_mapping['member_organisation']]); 	
			$GPSLatitude=($record[$index_mapping['GPSLatitude']]); 	
			$GPSLongitude=($record[$index_mapping['GPSLongitude']]); 	
			$GPSAltitude=($record[$index_mapping['GPSAltitude']]); 	
			$GPSAccuracy=($record[$index_mapping['GPSAccuracy']]); 	
			$X_axis=($record[$index_mapping['X_axis']]); 	
			$Y_axis=($record[$index_mapping['Y_axis']]); ;
		  

		  
		  //start clean-up and validation:
		  
			$pk_patId=converStringToInt(removeWhiteSpaces($pk_patId));
			$farmer_code=converStringToInt(removeWhiteSpaces($farmer_code));
			$interview_date=dateConversion(removeWhiteSpaces($interview_date));
			$Name_Resp=removeWhiteSpaces($Name_Resp);
			$farmer_crop_maize=converStringToInt(removeWhiteSpaces($farmer_crop_maize));
			$farmer_crop_beans=converStringToInt(removeWhiteSpaces($farmer_crop_beans));
			$farmer_crop_coffee=converStringToInt(removeWhiteSpaces($farmer_crop_coffee));
			$farmer_crop_maize_crop=converStringToInt(removeWhiteSpaces($farmer_crop_maize_crop));
			$maize_other_crop;
			$maize_other_crop_other =  converStringToMysqlInsertSafe($connect,$maize_other_crop_other);
			$maize_acreage=converStringToFloat(removeWhiteSpaces($maize_acreage));
			$maize_acreage_mapped=converStringToInt(removeWhiteSpaces($maize_acreage_mapped));
			$maize_equipment_openingland;
			$maize_seed_variety=converStringToInt(removeWhiteSpaces($maize_seed_variety));
			$maize_improvedseeds_notuse;
			$maize_improvedseeds_notuse_other =  converStringToMysqlInsertSafe($connect,$maize_improvedseeds_notuse_other);
			$maize_improvedseeds_benefits;
			$maize_improvedseeds_benefits_other =  converStringToMysqlInsertSafe($connect,$maize_improvedseeds_benefits_other);
			$maize_improvedseed_supplier=converStringToInt(removeWhiteSpaces($maize_improvedseed_supplier));
			$maize_improvedseed_supplier_other =  converStringToMysqlInsertSafe($connect,$maize_improvedseed_supplier_other);
			$maize_improvedseed_properusage=converStringToInt(removeWhiteSpaces($maize_improvedseed_properusage));
			$maize_acreage_improvedseeds=converStringToFloat(removeWhiteSpaces($maize_acreage_improvedseeds));
			$maize_equipment_planting=converStringToInt(removeWhiteSpaces($maize_equipment_planting));
			$maize_equipment_planting_other =  converStringToMysqlInsertSafe($connect,$maize_equipment_planting_other);
			$maize_whoplanted;
			$maize_whoplanted_Other =  converStringToMysqlInsertSafe($connect,$maize_whoplanted_Other);
			$maize_fertilizer_use=converStringToInt(removeWhiteSpaces($maize_fertilizer_use));
			$maize_fertlizer_notuse;
			$maize_fertlizer_notuse_other =  converStringToMysqlInsertSafe($connect,$maize_fertlizer_notuse_other);
			$maize_fertilizer_benefits;
			$maize_fertilizer_benefits_other =  converStringToMysqlInsertSafe($connect,$maize_fertilizer_benefits_other);
			$maize_fertilizer_supplier;
			$maize_fertilizer_supplier_other =  converStringToMysqlInsertSafe($connect,$maize_fertilizer_supplier_other);
			$maize_fertilizer_properusage=converStringToInt(removeWhiteSpaces($maize_fertilizer_properusage));
			$maize_ferilizer_whosupplied;
			$maize_ferilizer_whosupplied_other =  converStringToMysqlInsertSafe($connect,$maize_ferilizer_whosupplied_other);
			$maize_acreage_fertilizers=converStringToFloat(removeWhiteSpaces($maize_acreage_fertilizers));
			$maize_chemical_use=converStringToInt(removeWhiteSpaces($maize_chemical_use));
			$maize_chemical_use_other =  converStringToMysqlInsertSafe($connect,$maize_chemical_use_other);
			$maize_chemical_notuse;
			$maize_chemical_notuse_other =  converStringToMysqlInsertSafe($connect,$maize_chemical_notuse_other);
			$maize_chemicals_benefits;
			$maize_chemicals_benefits_other =  converStringToMysqlInsertSafe($connect,$maize_chemicals_benefits_other);
			$maize_chemicals_supplier=converStringToInt(removeWhiteSpaces($maize_chemicals_supplier));
			$maize_chemicals_supplier_other =  converStringToMysqlInsertSafe($connect,$maize_chemicals_supplier_other);
			$maize_chemicals_properusage=converStringToInt(removeWhiteSpaces($maize_chemicals_properusage));
			$maize_chemical_whoapplied=converStringToInt(removeWhiteSpaces($maize_chemical_whoapplied));
			$maize_chemical_whoapplied_other =  converStringToMysqlInsertSafe($connect,$maize_chemical_whoapplied_other);
			$maize_acreage_chemicals=converStringToFloat(removeWhiteSpaces($maize_acreage_chemicals));
			$maize_detect_counterfeit=converStringToInt(removeWhiteSpaces($maize_detect_counterfeit));
			$maize_opinion=converStringToInt(removeWhiteSpaces($maize_opinion));
			$maize_counterfeit_improvedseeds=converStringToInt(removeWhiteSpaces($maize_counterfeit_improvedseeds));
			$maize_counterfeit_herbicides=converStringToInt(removeWhiteSpaces($maize_counterfeit_herbicides));
			$maize_counterfeit_pesticides=converStringToInt(removeWhiteSpaces($maize_counterfeit_pesticides));
			$maize_counterfeit_Fungicides=converStringToInt(removeWhiteSpaces($maize_counterfeit_Fungicides));
			$maize_counterfeit_Fertilizer=converStringToInt(removeWhiteSpaces($maize_counterfeit_Fertilizers));
			$maize_avoid_counterfeits;
			$maize_avoid_counterfeits_other =  converStringToMysqlInsertSafe($connect,$maize_avoid_counterfeits_other);
			$maize_dry_harvested;
			$maize_dry_harvested_other =  converStringToMysqlInsertSafe($connect,$maize_dry_harvested_other);
			$maize_shell_use=converStringToInt(removeWhiteSpaces($maize_shell_use));
			$maize_shell_use_other =  converStringToMysqlInsertSafe($connect,$maize_shell_use_other);
			$maize_storage=converStringToInt(removeWhiteSpaces($maize_storage));
			$maize_storage_other =  converStringToMysqlInsertSafe($connect,$maize_storage_other);
			$maize_cost_production=converStringToInt(removeWhiteSpaces($maize_cost_production));
			$maize_cost_production_machinery=converStringToInt(removeWhiteSpaces($maize_cost_production_machinery));
			$maize_cost_production_improvedseed=converStringToInt(removeWhiteSpaces($maize_cost_production_improvedseed));
			$maize_cost_production_fertilizers=converStringToInt(removeWhiteSpaces($maize_cost_production_fertilizers));
			$maize_cost_production_chemicals=converStringToInt(removeWhiteSpaces($maize_cost_production_chemicals));
			$maize_cost_production_storage=converStringToInt(removeWhiteSpaces($maize_cost_production_storage));
			$maize_cost_production_transportation=converStringToInt(removeWhiteSpaces($maize_cost_production_transportation));
			$maize_cost_production_labour=converStringToInt(removeWhiteSpaces($maize_cost_production_labour));
			$maize_cost_production_other=converStringToInt(removeWhiteSpaces($maize_cost_production_other));
			$maize_harvested=converStringToInt(removeWhiteSpaces($maize_harvested));
			$maize_sold=converStringToInt(removeWhiteSpaces($maize_sold));
			$maize_sold_lastperiod=converStringToInt(removeWhiteSpaces($maize_sold_lastperiod));
			$maize_common_price=converStringToInt(removeWhiteSpaces($maize_common_price));
			$maize_harvest_loss=converStringToInt(removeWhiteSpaces($maize_lost));
			$maize_aware_standard=converStringToInt(removeWhiteSpaces($maize_aware_standard));
			$farmer_crop_beans_crop=converStringToInt(removeWhiteSpaces($farmer_crop_beans_crop));
			$beans_other_crop;
			$beans_other_crop_other =  converStringToMysqlInsertSafe($connect,$beans_other_crop_other);
			$beans_acreage=converStringToFloat(removeWhiteSpaces($beans_acreage));
			$beans_acreage_mapped=converStringToInt(removeWhiteSpaces($beans_acreage_mapped));
			$beans_equipment_openingland;
			$beans_seed_variety=converStringToInt(removeWhiteSpaces($beans_seed_variety));
			$beans_improvedseeds_notuse;
			$beans_improvedseeds_notuse_other =  converStringToMysqlInsertSafe($connect,$beans_improvedseeds_notuse_other);
			$beans_improvedseeds_benefits;
			$beans_improvedseeds_benefits_other =  converStringToMysqlInsertSafe($connect,$beans_improvedseeds_benefits_other);
			$beans_improvedseed_supplier=converStringToInt(removeWhiteSpaces($beans_improvedseed_supplier));
			$beans_improvedseed_supplier_other =  converStringToMysqlInsertSafe($connect,$beans_improvedseed_supplier_other);
			$beans_improvedseed_properusage=converStringToInt(removeWhiteSpaces($beans_improvedseed_properusage));
			$beans_acreage_improvedseeds=converStringToFloat(removeWhiteSpaces($beans_acreage_improvedseeds));
			$beans_equipment_planting=converStringToInt(removeWhiteSpaces($beans_equipment_planting));
			$beans_equipment_planting_other =  converStringToMysqlInsertSafe($connect,$beans_equipment_planting_other);
			$beans_whoplanted;
			$beans_whoplanted_Other =  converStringToMysqlInsertSafe($connect,$beans_whoplanted_Other);
			$beans_fertilizer_use=converStringToInt(removeWhiteSpaces($beans_fertilizer_use));
			$beans_fertlizer_notuse;
			$beans_fertlizer_notuse_other =  converStringToMysqlInsertSafe($connect,$beans_fertlizer_notuse_other);
			$beans_fertilizer_benefits;
			$beans_chemicals_supplier_other =  converStringToMysqlInsertSafe($connect,$beans_chemicals_supplier_other);
			$beans_fertilizer_benefits_other =  converStringToMysqlInsertSafe($connect,$beans_fertilizer_benefits_other);
			$beans_fertilizer_supplier;
			$beans_fertilizer_supplier_other =  converStringToMysqlInsertSafe($connect,$beans_fertilizer_supplier_other);
			$beans_fertilizer_properusage=converStringToInt(removeWhiteSpaces($beans_fertilizer_properusage));
			$beans_ferilizer_whosupplied;
			$beans_ferilizer_whosupplied_other =  converStringToMysqlInsertSafe($connect,$beans_ferilizer_whosupplied_other);
			$beans_acreage_fertilizers=converStringToFloat(removeWhiteSpaces($beans_acreage_fertilizers));
			$beans_chemical_use=converStringToInt(removeWhiteSpaces($beans_chemical_use));
			$beans_chemical_use_other =  converStringToMysqlInsertSafe($connect,$beans_chemical_use_other);
			$beans_chemical_notuse;
			$beans_chemical_notuse_other =  converStringToMysqlInsertSafe($connect,$beans_chemical_notuse_other);
			$beans_chemicals_benefits;
			$beans_chemicals_benefits_other =  converStringToMysqlInsertSafe($connect,$beans_chemicals_benefits_other);
			$beans_chemicals_supplier=converStringToInt(removeWhiteSpaces($beans_chemicals_supplier));
			$beans_chemicals_supplier_other =  converStringToMysqlInsertSafe($connect,$beans_chemicals_supplier_other);
			$beans_chemicals_properusage=converStringToInt(removeWhiteSpaces($beans_chemicals_properusage));
			$beans_chemical_whoapplied=converStringToInt(removeWhiteSpaces($beans_chemical_whoapplied));
			$beans_chemical_whoapplied_other =  converStringToMysqlInsertSafe($connect,$beans_chemical_whoapplied_other);
			$beans_acreage_chemicals=converStringToFloat(removeWhiteSpaces($beans_acreage_chemicals));
			$beans_detect_counterfeit=converStringToInt(removeWhiteSpaces($beans_detect_counterfeit));
			$beans_opinion=converStringToInt(removeWhiteSpaces($beans_opinion));
			$beans_counterfeit_improvedseeds=converStringToInt(removeWhiteSpaces($beans_counterfeit_improvedseeds));
			$beans_counterfeit_herbicides=converStringToInt(removeWhiteSpaces($beans_counterfeit_herbicides));
			$beans_counterfeit_pesticides=converStringToInt(removeWhiteSpaces($beans_counterfeit_pesticides));
			$beans_counterfeit_Fungicides=converStringToInt(removeWhiteSpaces($beans_counterfeit_Fungicides));
			$beans_counterfeit_Fertilizers=converStringToInt(removeWhiteSpaces($beans_counterfeit_Fertilizers));
			$beans_avoid_counterfeits;
			$beans_avoid_counterfeits_other =  converStringToMysqlInsertSafe($connect,$beans_avoid_counterfeits_other);
			$beans_dry_harvested;
			$beans_dry_harvested_other =  converStringToMysqlInsertSafe($connect,$beans_dry_harvested_other);
			$beans_shell_use=converStringToInt(removeWhiteSpaces($beans_shell_use));
			$beans_shell_use_other =  converStringToMysqlInsertSafe($connect,$beans_shell_use_other);
			$beans_storage=converStringToInt(removeWhiteSpaces($beans_storage));
			$beans_storage_other =  converStringToMysqlInsertSafe($connect,$beans_storage_other);
			$beans_cost_production=converStringToInt(removeWhiteSpaces($beans_cost_production));
			$beans_cost_production_machinery=converStringToInt(removeWhiteSpaces($beans_cost_production_machinery));
			$beans_cost_production_improvedseed=converStringToInt(removeWhiteSpaces($beans_cost_production_improvedseed));
			$beans_cost_production_fertilizers=converStringToInt(removeWhiteSpaces($beans_cost_production_fertilizers));
			$beans_cost_production_chemicals=converStringToInt(removeWhiteSpaces($beans_cost_production_chemicals));
			$beans_cost_production_storage=converStringToInt(removeWhiteSpaces($beans_cost_production_storage));
			$beans_cost_production_transportation=converStringToInt(removeWhiteSpaces($beans_cost_production_transportation));
			$beans_cost_production_labour=converStringToInt(removeWhiteSpaces($beans_cost_production_labour));
			$beans_cost_production_other=converStringToInt(removeWhiteSpaces($beans_cost_production_other));
			$beans_harvested=converStringToInt(removeWhiteSpaces($beans_harvested));
			$beans_sold=converStringToInt(removeWhiteSpaces($beans_sold));
			$beans_sold_lastperiod=converStringToInt(removeWhiteSpaces($beans_sold_lastperiod));
			$beans_common_price=converStringToInt(removeWhiteSpaces($beans_common_price));
			$beans_lost=converStringToInt(removeWhiteSpaces($beans_lost));
			$beans_aware_standard=converStringToInt(removeWhiteSpaces($beans_aware_standard));
			$farmer_crop_coffee_crop=converStringToInt(removeWhiteSpaces($farmer_crop_coffee_crop));
			$coffee_other_crop;
			$coffee_other_crop_other =  converStringToMysqlInsertSafe($connect,$coffee_other_crop_other);
			$coffee_acreage=converStringToFloat(removeWhiteSpaces($coffee_acreage));
			$coffee_acreage_mapped=converStringToInt(removeWhiteSpaces($coffee_acreage_mapped));
			$coffee_equipment_openingland;
			$coffee_tree_variety=converStringToInt(removeWhiteSpaces($coffee_tree_variety));
			$coffee_improvedtrees_notuse;
			$coffee_improvedtrees_notuse_other =  converStringToMysqlInsertSafe($connect,$coffee_improvedtrees_notuse_other);
			$coffee_improvedtrees_benefits;
			$coffee_improvedtrees_benefits_other =  converStringToMysqlInsertSafe($connect,$coffee_improvedtrees_benefits_other);
			$coffee_improvedtrees_supplier=converStringToInt(removeWhiteSpaces($coffee_improvedtrees_supplier));
			$coffee_improvedtrees_supplier_other =  converStringToMysqlInsertSafe($connect,$coffee_improvedtrees_supplier_other);
			$coffee_improvedtrees_properusage=converStringToInt(removeWhiteSpaces($coffee_improvedtrees_properusage));
			$coffee_acreage_improvedtrees=converStringToFloat(removeWhiteSpaces($coffee_acreage_improvedtrees));
			$coffee_equipment_planting=converStringToInt(removeWhiteSpaces($coffee_equipment_planting));
			$coffee_equipment_planting_other =  converStringToMysqlInsertSafe($connect,$coffee_equipment_planting_other);
			$coffee_whoplanted;
			$coffee_whoplanted_Other =  converStringToMysqlInsertSafe($connect,$coffee_whoplanted_Other);
			$coffee_fertilizer_use=converStringToInt(removeWhiteSpaces($coffee_fertilizer_use));
			$coffee_fertlizer_notuse;
			$coffee_fertlizer_notuse_other =  converStringToMysqlInsertSafe($connect,$coffee_fertlizer_notuse_other);
			$coffee_fertilizer_benefits;
			$coffee_fertilizer_benefits_other =  converStringToMysqlInsertSafe($connect,$coffee_fertilizer_benefits_other);
			$coffee_fertilizer_supplier;
			$coffee_fertilizer_supplier_other =  converStringToMysqlInsertSafe($connect,$coffee_fertilizer_supplier_other);
			$coffee_fertilizer_properusage=converStringToInt(removeWhiteSpaces($coffee_fertilizer_properusage));
			$coffee_ferilizer_whosupplied;
			$coffee_ferilizer_whosupplied_other =  converStringToMysqlInsertSafe($connect,$coffee_ferilizer_whosupplied_other);
			$coffee_acreage_fertilizers=converStringToFloat(removeWhiteSpaces($coffee_acreage_fertilizers));
			$coffee_chemical_use=converStringToInt(removeWhiteSpaces($coffee_chemical_use));
			$coffee_chemical_notuse;
			$coffee_chemical_notuse_other =  converStringToMysqlInsertSafe($connect,$coffee_chemical_notuse_other);
			$coffee_chemicals_benefits;
			$coffee_chemicals_benefits_other =  converStringToMysqlInsertSafe($connect,$coffee_chemicals_benefits_other);
			$coffee_chemicals_supplier=converStringToInt(removeWhiteSpaces($coffee_chemicals_supplier));
			$coffee_chemicals_supplier_other =  converStringToMysqlInsertSafe($connect,$coffee_chemicals_supplier_other);
			$coffee_chemicals_properusage=converStringToInt(removeWhiteSpaces($coffee_chemicals_properusage));
			$coffee_chemical_whoapplied=converStringToInt(removeWhiteSpaces($coffee_chemical_whoapplied));
			$coffee_chemical_whoapplied_other =  converStringToMysqlInsertSafe($connect,$coffee_chemical_whoapplied_other);
			$coffee_acreage_chemicals=converStringToFloat(removeWhiteSpaces($coffee_acreage_chemicals));
			$coffee_detect_counterfeit=converStringToInt(removeWhiteSpaces($coffee_detect_counterfeit));
			$coffee_opinion=converStringToInt(removeWhiteSpaces($coffee_opinion));
			$coffee_counterfeit_improvedtrees=converStringToInt(removeWhiteSpaces($coffee_counterfeit_improvedtrees));
			$coffee_counterfeit_herbicides=converStringToInt(removeWhiteSpaces($coffee_counterfeit_herbicides));
			$coffee_counterfeit_pesticides=converStringToInt(removeWhiteSpaces($coffee_counterfeit_pesticides));
			$coffee_counterfeit_Fungicides=converStringToInt(removeWhiteSpaces($coffee_counterfeit_Fungicides));
			$coffee_counterfeit_Fertilizers=converStringToInt(removeWhiteSpaces($coffee_counterfeit_Fertilizers));
			$coffee_avoid_counterfeits=converStringToInt(removeWhiteSpaces($coffee_avoid_counterfeits));
			$coffee_avoid_counterfeits_other =  converStringToMysqlInsertSafe($connect,$coffee_avoid_counterfeits_other);
			$coffee_dry_harvested;
			$coffee_dry_harvested_other =  converStringToMysqlInsertSafe($connect,$coffee_dry_harvested_other);
			$coffee_storage=converStringToInt(removeWhiteSpaces($coffee_storage));
			$coffee_storage_other =  converStringToMysqlInsertSafe($connect,$coffee_storage_other);
			$coffee_cost_production=converStringToInt(removeWhiteSpaces($coffee_cost_production));
			$coffee_cost_production_machinery=converStringToInt(removeWhiteSpaces($coffee_cost_production_machinery));
			$coffee_cost_production_improvedseed=converStringToInt(removeWhiteSpaces($coffee_cost_production_improvedseed));
			$coffee_cost_production_fertilizers=converStringToInt(removeWhiteSpaces($coffee_cost_production_fertilizers));
			$coffee_cost_production_chemicals=converStringToInt(removeWhiteSpaces($coffee_cost_production_chemicals));
			$coffee_cost_production_storage=converStringToInt(removeWhiteSpaces($coffee_cost_production_storage));
			$coffee_cost_production_transportation=converStringToInt(removeWhiteSpaces($coffee_cost_production_transportation));
			$coffee_cost_production_labour=converStringToInt(removeWhiteSpaces($coffee_cost_production_labour));
			$coffee_cost_production_other=converStringToInt(removeWhiteSpaces($coffee_cost_production_other));
			$coffee_harvested=converStringToInt(removeWhiteSpaces($coffee_harvested));
			$coffee_sold=converStringToInt(removeWhiteSpaces($coffee_sold));
			$coffee_sold_lastperiod=converStringToInt(removeWhiteSpaces($coffee_sold_lastperiod));
			$coffee_common_price=converStringToInt(removeWhiteSpaces($coffee_common_price));
			$coffee_lost=converStringToInt(removeWhiteSpaces($coffee_lost));
			$coffee_aware_standard=converStringToInt(removeWhiteSpaces($coffee_aware_standard));
			$loan_access=converStringToInt(removeWhiteSpaces($loan_access));
			$loan_accessed=converStringToInt(removeWhiteSpaces($loan_accessed));
			$climate_change_impact=converStringToInt(removeWhiteSpaces($climate_change_impact));
			$implemented_mgt_climate=converStringToInt(removeWhiteSpaces($implemented_mgt_climate));
			$implemented_mgt_climate_action;
			$implemented_mgt_climate_action_other =  converStringToMysqlInsertSafe($connect,$implemented_mgt_climate_action_other);
			$protection_counterfeit;
			$protection_counterfeit_other =  converStringToMysqlInsertSafe($connect,$protection_counterfeit_other);
			$hotline_counterfeit=converStringToInt(removeWhiteSpaces($hotline_counterfeit));
			$hotline_evercalled=converStringToInt(removeWhiteSpaces($hotline_evercalled));
			$receive_information_method;
			$receive_information_method_other =  converStringToMysqlInsertSafe($connect,$receive_information_method_other);
			$farming_decisions=converStringToInt(removeWhiteSpaces($farming_decisions));
			$farm_assets=converStringToInt(removeWhiteSpaces($farm_assets));
			$money_spent=converStringToInt(removeWhiteSpaces($money_spent));
			$training_events=converStringToInt(removeWhiteSpaces($training_events));
			$member_organisation=converStringToInt(removeWhiteSpaces($member_organisation));
			

			//end clean-up and validation
		  
			
		  
		  //test the farmer code existance
			if (is_numeric($farmer_code)) {
		  	   // echo $server_entry_timeUnsanitized;
				
				$msg_at_readtime=(!empty($msg_at_readtime) or ($msg_at_readtime!==''))?$msg_at_readtime:'none';
				
				
				
					//==============insert values into $table1==========================
						$stable1= "INSERT INTO ".$table1." (`pk_patId`,`farmer_code`,`interview_date`,`respondent`,`farmer_crop_maize`,`farmer_crop_beans`,`farmer_crop_coffee`,`msg_at_readtime`,`readtime`) 
						VALUES ('".$fk_patId."','".$farmer_code."','".$interview_date."','".$Name_Resp."',
						'".trim($farmer_crop_maize)."','".trim($farmer_crop_beans)."','".trim($farmer_crop_coffee)."',
						'".$msg_at_readtime."','".$timestamp."')";
								
								$description="Error on saving Excel CSV record Value";
								$user="DataCare";
								$oldValue='';
								$newValue='';
								$table=$stable1;
								$id='';
						
						$a=mysqli_query($connect, $stable1) or die (mysqli_error($connect));
					
					//============== end of insert values into $table1===================or die (mysqli_error($connect))

						//==============insert values into $table2===================
						$stable2= "INSERT INTO ".$table2." (`fk_patId`,`farmer_code`,`loan_access`,`loan_accessed`,`climate_change_impact`,`implemented_mgt_climate`,`implemented_mgt_climate_action`
				,`implemented_mgt_climate_action_other`,`protection_counterfeit`,`protection_counterfeit_other`,`hotline_counterfeit`,
				`hotline_evercalled`,`receive_information_method`,`receive_information_method_other`,`farming_decisions`,
				`farm_assets`,`money_spent`,`training_events`,`member_organisation`,`GPSLatitude`,`GPSLongitude`,`GPSAltitude`,
				`GPSAccuracy`,`X_axis`,`Y_axis`,`readtime`) 
						VALUES
						 ('".$fk_patId."','".$farmer_code."','".trim($loan_access)."','".floatval(trim($loan_accessed))."','".$climate_change_impact."','
				".trim($implemented_mgt_climate)."','".$implemented_mgt_climate_action."','".$implemented_mgt_climate_action_other."',
				'".$protection_counterfeit."','".$protection_counterfeit_other."','".$hotline_counterfeit."','".$hotline_evercalled."',
				'".$receive_information_method."','".$receive_information_method_other."','".$farming_decisions."','".$farm_assets."','".$money_spent."',
				'".$training_events."','".$member_organisation."','".floatval(trim($GPSLatitude))."','".floatval(trim($GPSLongitude))."','".floatval(trim($GPSAltitude))."','".floatval(trim($GPSAccuracy))."',
				'".floatval(trim($X_axis))."','".floatval(trim($Y_axis))."','".$timestamp."')";
						
								$description="Error on saving Excel CSV record Value";
								$user="DataCare";
								$oldValue='';
								$newValue='';
								$table=$stable2;
								$id='';
						
						$b=mysqli_query($connect, $stable2) or die(mysqli_error($connect));//die(logUserAction(mysql_error(),$description,$user,$oldValue,$newValue,$table,$id));
						//============== end of insert values into $table2===================
						
					//==============insert values into $table3===================
						$stable3= "INSERT INTO ".$table3." (
						`fk_patId`,
						`farmer_code`,
						`farmer_crop_maize_crop`,
						`maize_other_crop`,
						`maize_other_crop_other`,
						`maize_acreage`,
						`maize_mapped`,
						`maize_equipment_openingland`,
						`maize_seed_variety`,
						`maize_improvedseeds_notuse`,
						`maize_improvedseeds_notuse_other`,
						`maize_improvedseeds_benefits`,
						`maize_improvedseeds_benefits_other`,
						`maize_improvedseed_supplier` ,
						`maize_improvedseed_supplier_other`,
						`maize_improvedseed_properusage`,
						`maize_acreage_improvedseeds`,
						`maize_equipment_planting`,
						`maize_equipment_planting_other`,
						`maize_whoplanted`,
						`maize_whoplanted_Other`,
						`maize_fertilizer_use`,
						`maize_fertlizer_notuse`,
						`maize_fertlizer_notuse_other`,
						`maize_fertilizer_benefits`,
						`maize_fertilizer_benefits_other`,
						`maize_fertilizer_supplier`,
						`maize_fertilizer_supplier_other`,
						`maize_fertilizer_properusage`,
						`maize_ferilizer_whosupplied`,
						`maize_ferilizer_whosupplied_other`,
						`maize_acreage_fertilizer`,
						`maize_chemical_use`,
						`maize_chemical_use_other`,
						`maize_chemical_notuse`,
						`maize_chemical_notuse_other`,
						`maize_chemical_benefits`,
						`maize_chemical_benefits_other`,
						`maize_chemical_supplier`,
						`maize_chemical_supplier_other`,
						`maize_chemicals_properusage`,
						`maize_chemical_whoapplied`,
						`maize_chemical_whoapplied_other`,
						`maize_acreage_chemicals`,
						`maize_detect_counterfeit`,
						`maize_opinion`,
						`maize_counterfeit_improvedseeds`,
						`maize_counterfeit_herbicides`,
						`maize_counterfeit_pesticides`,
						`maize_counterfeit_Fungicides`,
						`maize_counterfeit_Fertilizers`,
						`maize_avoid_counterfeits`,
						`maize_avoid_counterfeits_other`,
						`maize_dry_harvested`,
						`maize_dry_harvested_other`,
						`maize_shell_use`,
						`maize_shell_use_other`,
						`maize_storage`,
						`maize_storage_other`,
						`maize_cost_production`,
						`maize_cost_production_machinery`,
						`maize_cost_production_improvedseed`,
						`maize_cost_production_fertilizers`,
						`maize_cost_production_chemicals`,
						`maize_cost_production_storage`,
						`maize_cost_production_transportation`,
						`maize_cost_production_labour`,
						`maize_cost_production_other`,
						`maize_harvested`,
						`maize_sold`,
						`maize_sold_lastperiod`,
						`maize_sold_price`,
						`maize_harvest_loss`,
						`maize_aware_standard`) 
						VALUES ('".$fk_patId."','".trim($farmer_code)."',
						'".$farmer_crop_maize_crop."',
						'".$maize_other_crop."',
						'".$maize_other_crop_other."',
						'".$maize_acreage."',
						'".$maize_acreage_mapped."',
						'".$maize_equipment_openingland."',
						'".$maize_seed_variety."',
						'".$maize_improvedseeds_notuse."',
						'".$maize_improvedseeds_notuse_other."',
						'".$maize_improvedseeds_benefits."',
						'".$maize_improvedseeds_benefits_other."',
						'".$maize_improvedseed_supplier."',
						'".$maize_improvedseed_supplier_other."',
						'".$maize_improvedseed_properusage."',
						'".$maize_acreage_improvedseeds."',
						'".$maize_equipment_planting."',
						'".$maize_equipment_planting_other."',
						'".$maize_whoplanted."',
						'".$maize_whoplanted_Other."',
						'".$maize_fertilizer_use."',
						'".$maize_fertlizer_notuse."',
						'".$maize_fertlizer_notuse_other."',
						'".$maize_fertilizer_benefits."',
						'".$maize_fertilizer_benefits_other."',
						'".$maize_fertilizer_supplier."',
						'".$maize_fertilizer_supplier_other."',
						'".$maize_fertilizer_properusage."',
						'".$maize_ferilizer_whosupplied."',
						'".$maize_ferilizer_whosupplied_other."',
						'".$maize_acreage_fertilizers."',
						'".$maize_chemical_use."',
						'".$maize_chemical_use_other."',
						'".$maize_chemical_notuse."',
						'".$maize_chemical_notuse_other."',
						'".$maize_chemicals_benefits."',
						'".$maize_chemicals_benefits_other."',
						'".$maize_chemicals_supplier."',
						'".$maize_chemicals_supplier_other."',
						'".$maize_chemicals_properusage."',
						'".$maize_chemical_whoapplied."',
						'".$maize_chemical_whoapplied_other."',
						'".$maize_acreage_chemicals."',
						'".$maize_detect_counterfeit."',
						'".$maize_opinion."',
						'".$maize_counterfeit_improvedseeds."',
						'".$maize_counterfeit_herbicides."',
						'".$maize_counterfeit_pesticides."',
						'".$maize_counterfeit_Fungicides."',
						'".$maize_counterfeit_Fertilizers."',
						'".$maize_avoid_counterfeits."',
						'".$maize_avoid_counterfeits_other."',
						'".$maize_dry_harvested."',
						'".$maize_dry_harvested_other."',
						'".$maize_shell_use."',
						'".$maize_shell_use_other."',
						'".$maize_storage."',
						'".$maize_storage_other."',
						'".$maize_cost_production."',
						'".$maize_cost_production_machinery."',
						'".$maize_cost_production_improvedseed."',
						'".$maize_cost_production_fertilizers."',
						'".$maize_cost_production_chemicals."',
						'".$maize_cost_production_storage."',
						'".$maize_cost_production_transportation."',
						'".$maize_cost_production_labour."',
						'".$maize_cost_production_other."',
						'".$maize_harvested."',
						'".$maize_sold."',
						'".$maize_sold_lastperiod."',
						'".$maize_common_price."',
						'".$maize_harvest_loss."',
						'".$maize_aware_standard ."')";
								$description="Error on saving Excel CSV record Value";
								$user="DataCare";
								$oldValue='';
								$newValue='';
								$table=$stable3;
								$id='';
						
						$c=mysqli_query($connect, $stable3) or (mysqli_error($connect));
						
					//============== end of insert values into $table3===================
						

					//==============insert values into $table4===================
						$stable4= "INSERT INTO ".$table4." (
						`fk_patId`,`farmer_code`,
						`farmer_crop_beans_crop`,
						`beans_other_crop`,
						`beans_other_crop_other`,
						`beans_acreage`,
						`beans_mapped`,
						`beans_equipment_openingland`,
						`beans_seed_variety`,
						`beans_improvedseeds_notuse`,
						`beans_improvedseeds_notuse_other`,
						`beans_improvedseeds_benefits`,
						`beans_improvedseeds_benefits_other`,
						`beans_improvedseed_supplier` ,
						`beans_improvedseed_supplier_other`,
						`beans_improvedseed_properusage`,
						`beans_acreage_improvedseeds`,
						`beans_equipment_planting`,
						`beans_equipment_planting_other`,
						`beans_whoplanted`,
						`beans_whoplanted_Other`,
						`beans_fertilizer_use`,
						`beans_fertlizer_notuse`,
						`beans_fertlizer_notuse_other`,
						`beans_fertilizer_benefits`,
						`beans_fertilizer_benefits_other`,
						`beans_fertilizer_supplier`,
						`beans_fertilizer_supplier_other`,
						`beans_fertilizer_properusage`,
						`beans_ferilizer_whosupplied`,
						`beans_ferilizer_whosupplied_other`,
						`beans_acreage_fertilizer`,
						`beans_chemical_use`,
						`beans_chemical_use_other`,
						`beans_chemical_notuse`,
						`beans_chemical_notuse_other`,
						`beans_chemical_benefits`,
						`beans_chemical_benefits_other`,
						`beans_chemical_supplier`,
						`beans_chemical_supplier_other`,
						`beans_chemicals_properusage`,
						`beans_chemical_whoapplied`,
						`beans_chemical_whoapplied_other`,
						`beans_acreage_chemicals`,
						`beans_detect_counterfeit`,
						`beans_opinion`,
						`beans_counterfeit_improvedseeds`,
						`beans_counterfeit_herbicides`,
						`beans_counterfeit_pesticides`,
						`beans_counterfeit_Fungicides`,
						`beans_counterfeit_Fertilizers`,
						`beans_avoid_counterfeits`,
						`beans_avoid_counterfeits_other`,
						`beans_dry_harvested`,
						`beans_dry_harvested_other`,
						`beans_shell_use`,
						`beans_shell_use_other`,
						`beans_storage`,
						`beans_storage_other`,
						`beans_cost_production`,
						`beans_cost_production_machinery`,
						`beans_cost_production_improvedseed`,
						`beans_cost_production_fertilizers`,
						`beans_cost_production_chemicals`,
						`beans_cost_production_storage`,
						`beans_cost_production_transportation`,
						`beans_cost_production_labour`,
						`beans_cost_production_other`,
						`beans_harvested`,
						`beans_sold`,
						`beans_sold_lastperiod`,
						`beans_sold_price`,
						`beans_harvest_loss`,
						`beans_aware_standard`
						)  
						VALUES ('".$fk_patId."','".trim($farmer_code)."',
						'".$farmer_crop_beans_crop."',
						'".$beans_other_crop."',
						'".$beans_other_crop_other."',
						'".$beans_acreage."',
						'".$beans_acreage_mapped."',
						'".$beans_equipment_openingland."',
						'".$beans_seed_variety."',
						'".$beans_improvedseeds_notuse."',
						'".$beans_improvedseeds_notuse_other."',
						'".$beans_improvedseeds_benefits."',
						'".$beans_improvedseeds_benefits_other."',
						'".$beans_improvedseed_supplier."',
						'".$beans_improvedseed_supplier_other."',
						'".$beans_improvedseed_properusage."',
						'".$beans_acreage_improvedseeds."',
						'".$beans_equipment_planting."',
						'".$beans_equipment_planting_other."',
						'".$beans_whoplanted."',
						'".$beans_whoplanted_Other."',
						'".$beans_fertilizer_use."',
						'".$beans_fertlizer_notuse."',
						'".$beans_fertlizer_notuse_other."',
						'".$beans_fertilizer_benefits."',
						'".$beans_fertilizer_benefits_other."',
						'".$beans_fertilizer_supplier."',
						'".$beans_fertilizer_supplier_other."',
						'".$beans_fertilizer_properusage."',
						'".$beans_ferilizer_whosupplied."',
						'".$beans_ferilizer_whosupplied_other."',
						'".$beans_acreage_fertilizers."',
						'".$beans_chemical_use."',
						'".$beans_chemical_use_other."',
						'".$beans_chemical_notuse."',
						'".$beans_chemical_notuse_other."',
						'".$beans_chemicals_benefits."',
						'".$beans_chemicals_benefits_other."',
						'".$beans_chemicals_supplier."',
						'".$beans_chemicals_supplier_other."',
						'".$beans_chemicals_properusage."',
						'".$beans_chemical_whoapplied."',
						'".$beans_chemical_whoapplied_other."',
						'".$beans_acreage_chemicals."',
						'".$beans_detect_counterfeit."',
						'".$beans_opinion."',
						'".$beans_counterfeit_improvedseeds."',
						'".$beans_counterfeit_herbicides."',
						'".$beans_counterfeit_pesticides."',
						'".$beans_counterfeit_Fungicides."',
						'".$beans_counterfeit_Fertilizers."',
						'".$beans_avoid_counterfeits."',
						'".$beans_avoid_counterfeits_other."',
						'".$beans_dry_harvested."',
						'".$beans_dry_harvested_other."',
						'".$beans_shell_use."',
						'".$beans_shell_use_other."',
						'".$beans_storage."',
						'".$beans_storage_other."',
						'".$beans_cost_production."',
						'".$beans_cost_production_machinery."',
						'".$beans_cost_production_improvedseed."',
						'".$beans_cost_production_fertilizers."',
						'".$beans_cost_production_chemicals."',
						'".$beans_cost_production_storage."',
						'".$beans_cost_production_transportation."',
						'".$beans_cost_production_labour."',
						'".$beans_cost_production_other."',
						'".$beans_harvested."',
						'".$beans_sold."',
						'".$beans_sold_lastperiod."',
						'".$beans_common_price."',
						'".$beans_lost."',
				'".$beans_aware_standard ."')";
								$description="Error on saving Excel CSV record Value";
								$user="DataCare";
								$oldValue='';
								$newValue='';
								$table=$stable4;
								$id='';
						
						$d=mysqli_query($connect, $stable4) or die (mysqli_error($connect));
						
					//============== end of insert values into $table4===================
						
					//==============insert values into $table5===================
						$stable5= "INSERT INTO ".$table5." (
						`fk_patId`,`farmer_code`,
						`farmer_crop_coffee_crop`,
						`coffee_other_crop`,
						`coffee_other_crop_other`,
						`coffee_acreage`,
						`coffee_mapped`,
						`coffee_equipment_openingland`,
						`coffee_tree_variety`,
						`coffee_improvedtrees_notuse`,
						`coffee_improvedtrees_notuse_other`,
						`coffee_improvedtrees_benefits`,
						`coffee_improvedtrees_benefits_other`,
						`coffee_improvedtrees_supplier` ,
						`coffee_improvedtrees_supplier_other`,
						`coffee_improvedtrees_properusage`,
						`coffee_acreage_improvedtrees`,
						`coffee_equipment_planting`,
						`coffee_equipment_planting_other`,
						`coffee_whoplanted`,
						`coffee_whoplanted_Other`,
						`coffee_fertilizer_use`,
						`coffee_fertlizer_notuse`,
						`coffee_fertlizer_notuse_other`,
						`coffee_fertilizer_benefits`,
						`coffee_fertilizer_benefits_other`,
						`coffee_fertilizer_supplier`,
						`coffee_fertilizer_supplier_other`,
						`coffee_fertilizer_properusage`,
						`coffee_ferilizer_whosupplied`,
						`coffee_ferilizer_whosupplied_other`,
						`coffee_acreage_fertilizer`,
						`coffee_chemical_use`,
						`coffee_chemical_notuse`,
						`coffee_chemical_notuse_other`,
						`coffee_chemical_benefits`,
						`coffee_chemical_benefits_other`,
						`coffee_chemical_supplier`,
						`coffee_chemical_supplier_other`,
						`coffee_chemicals_properusage`,
						`coffee_chemical_whoapplied`,
						`coffee_chemical_whoapplied_other`,
						`coffee_acreage_chemicals`,
						`coffee_detect_counterfeit`,
						`coffee_opinion`,
						`coffee_counterfeit_improvedtrees`,
						`coffee_counterfeit_herbicides`,
						`coffee_counterfeit_pesticides`,
						`coffee_counterfeit_Fungicides`,
						`coffee_counterfeit_Fertilizers`,
						`coffee_avoid_counterfeits`,
						`coffee_avoid_counterfeits_other`,
						`coffee_dry_harvested`,
						`coffee_dry_harvested_other`,
						`coffee_storage`,
						`coffee_storage_other`,
						`coffee_cost_production`,
						`coffee_cost_production_machinery`,
						`coffee_cost_production_improvedseed`,
						`coffee_cost_production_fertilizers`,
						`coffee_cost_production_chemicals`,
						`coffee_cost_production_storage`,
						`coffee_cost_production_transportation`,
						`coffee_cost_production_labour`,
						`coffee_cost_production_other`,
						`coffee_harvested`,
						`coffee_sold`,
						`coffee_sold_lastperiod`,
						`coffee_sold_price`,
						`coffee_harvest_loss`,
						`coffee_aware_standard`) 
						VALUES ('".$fk_patId."','".trim($farmer_code)."',
						'".$farmer_crop_coffee_crop."',
							'".$coffee_other_crop."',
							'".$coffee_other_crop_other."',
							'".$coffee_acreage."',
							'".$coffee_acreage_mapped."',
							'".$coffee_equipment_openingland."',
							'".$coffee_tree_variety."',
							'".$coffee_improvedtrees_notuse."',
							'".$coffee_improvedtrees_notuse_other."',
							'".$coffee_improvedtrees_benefits."',
							'".$coffee_improvedtrees_benefits_other."',
							'".$coffee_improvedtrees_supplier."',
							'".$coffee_improvedtrees_supplier_other."',
							'".$coffee_improvedtrees_properusage."',
							'".$coffee_acreage_improvedtrees."',
							'".$coffee_equipment_planting."',
							'".$coffee_equipment_planting_other."',
							'".$coffee_whoplanted."',
							'".$coffee_whoplanted_Other."',
							'".$coffee_fertilizer_use."',
							'".$coffee_fertlizer_notuse."',
							'".$coffee_fertlizer_notuse_other."',
							'".$coffee_fertilizer_benefits."',
							'".$coffee_fertilizer_benefits_other."',
							'".$coffee_fertilizer_supplier."',
							'".$coffee_fertilizer_supplier_other."',
							'".$coffee_fertilizer_properusage."',
							'".$coffee_ferilizer_whosupplied."',
							'".$coffee_ferilizer_whosupplied_other."',
							'".$coffee_acreage_fertilizers."',
							'".$coffee_chemical_use."',
							'".$coffee_chemical_notuse."',
							'".$coffee_chemical_notuse_other."',
							'".$coffee_chemicals_benefits."',
							'".$coffee_chemicals_benefits_other."',
							'".$coffee_chemicals_supplier."',
							'".$coffee_chemicals_supplier_other."',
							'".$coffee_chemicals_properusage."',
							'".$coffee_chemical_whoapplied."',
							'".$coffee_chemical_whoapplied_other."',
							'".$coffee_acreage_chemicals."',
							'".$coffee_detect_counterfeit."',
							'".$coffee_opinion."',
							'".$coffee_counterfeit_improvedtrees."',
							'".$coffee_counterfeit_herbicides."',
							'".$coffee_counterfeit_pesticides."',
							'".$coffee_counterfeit_Fungicides."',
							'".$coffee_counterfeit_Fertilizers."',
							'".$coffee_avoid_counterfeits."',
							'".$coffee_avoid_counterfeits_other."',
							'".$coffee_dry_harvested."',
							'".$coffee_dry_harvested_other."',
							'".$coffee_storage."',
							'".$coffee_storage_other."',
							'".$coffee_cost_production."',
							'".$coffee_cost_production_machinery."',
							'".$coffee_cost_production_improvedseed."',
							'".$coffee_cost_production_fertilizers."',
							'".$coffee_cost_production_chemicals."',
							'".$coffee_cost_production_storage."',
							'".$coffee_cost_production_transportation."',
							'".$coffee_cost_production_labour."',
							'".$coffee_cost_production_other."',
							'".$coffee_harvested."',
							'".$coffee_sold."',
							'".$coffee_sold_lastperiod."',
							'".$coffee_common_price."',
							'".$coffee_lost."',
							'".$coffee_aware_standard ."')";
						
								$description="Error on saving Excel CSV record Value";
								$user="DataCare";
								$oldValue='';
								$newValue='';
								$table=$stable5;
								$id='';
						
						$e=mysqli_query($connect, $stable5) or die (mysqli_error($connect));
						
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
               // echo $action;
			
		}
		
		// Commit transaction
		@mysqli_commit($connect);
	}	
		
		$csv_file='/srv/www/dcData/'.$yesterday.'.csv';
		//transfer the file after copying
		$from=$csv_file;
		$newFilename=date('Y-m-d h_i_s');
		//$to='/srv/www/htdocs/Old_Sys/ShorelineDataBackup/'.$newFilename.'.csv';
		$to='/srv/www/htdocs/demo/Dev_CPM/ShorelineDataBackupDemo/'.$newFilename.'.csv';
		copy($from, $to);
		// echo fixtags($stable1)."<br/>";
		// echo fixtags($stable2)."<br/>";
		// echo fixtags($stable3)."<br/>";
		// echo fixtags($stable4)."<br/>";
		// echo fixtags($stable5)."<br/>";
		 
		 
		if (file_exists($csv_file)) {
		unlink($csv_file);
		}   
		echo "File data successfully imported to database!!";
		mysqli_close($connect);  // closing connection

	
		 
	
?>


