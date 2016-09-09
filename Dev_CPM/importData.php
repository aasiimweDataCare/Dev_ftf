<?php
//Pick Ugandan time
date_default_timezone_set("Etc/GMT-3");
// specify connection info
$connect = mysql_connect('localhost','root','cpmmisV1')or die(mysql_error());
$msg_at_readtime='none';
if (!$connect)
{
$msg_at_readtime=mysql_error();
}
$cid =mysql_select_db('db_cpma',$connect); //specify db name

define('CSV_PATH','/srv/www/data/'); // specify CSV file path


$today=date('Y-m-d');
$timestamp=date('Y-m-d h:i:s');
$csv_file = CSV_PATH . "".$today.".csv"; // Name of  CSV file to be read should be the current date
if (!file_exists($csv_file))
{
$msg_at_readtime='No file exists for reading';
}

$csvfile = fopen($csv_file, 'r');
$theData = fgets($csvfile);
//Determining the FK's for child tables
@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`pk_patId`) as pk_patId  FROM `tbl_frm6particulars`";
$Qcheck=@mysql_query($stmnt_check) or die(mysql_error());

if (!$Qcheck)
		{
			$msg_at_readtime=mysql_error();
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


$i = 0;
$i=0;
while (!feof($csvfile))
{ 
$csv_data[] = fgets($csvfile, 1024);
$csv_array = explode(",", $csv_data[0]);
$csv_array = explode(",", $csv_data[$i]); 
$table1='tbl_frm6particulars';
$table2='tbl_frm6gqnsandgps';
$table3='tbl_frm6production_maize';
$table4='tbl_frm6production_beans';
$table5='tbl_frm6production_coffee';
$insert_csv = array();
//$insert_csv['farmer_id'] = $csv_array[0];
   
//=======values for $table1==================
$insert_csv['farmer_code'] = $csv_array[1];
$insert_csv['interview_date'] = $csv_array[2];
$insert_csv['respondent'] = $csv_array[3];
$insert_csv['farmer_crop_maize'] = $csv_array[4];
$insert_csv['farmer_crop_beans'] = $csv_array[5];
$insert_csv['farmer_crop_coffee'] = $csv_array[6];
//======= end of values for $table1==================
   
   
//=======values for $table2==================
$insert_csv['loan_access'] = $csv_array[7];
$insert_csv['loan_accessed'] = $csv_array[8];
$insert_csv['implemented_mgt_climate'] = $csv_array[9];
$insert_csv['implemented_mgt_climate_action'] = $csv_array[10];
$insert_csv['implemented_mgt_climate_action_other'] = $csv_array[11];
$insert_csv['gps'] = $csv_array[12];
$insert_csv['compiled_by'] = $csv_array[13];
$insert_csv['va'] = $csv_array[14];
$insert_csv['telephone'] = $csv_array[15];
//======= end of values for $table2==================
   
//=======values for $table3==========================
$insert_csv['maize_acreage'] = $csv_array[16];
$insert_csv['maize_mapped'] = $csv_array[17];
$insert_csv['maize_improved_seeds'] = $csv_array[18];
$insert_csv['maize_improved_acreage'] = $csv_array[19];
$insert_csv['maize_improved_acreage_mapped'] = $csv_array[20];
$insert_csv['maize_improved_cost'] = $csv_array[21];
$insert_csv['maize_seed_supplier'] = $csv_array[22];
$insert_csv['maize_seed_supplier_other'] = $csv_array[23];
$insert_csv['maize_benefits'] = $csv_array[24];
$insert_csv['maize_benefits_other'] = $csv_array[25];
$insert_csv['maize_fetilizer_use'] = $csv_array[26];
$insert_csv['maize_acreage_fertilizer'] = $csv_array[27];
$insert_csv['maize_fertilizer_cost'] = $csv_array[28];
$insert_csv['maize_fertilizer_supplier'] = $csv_array[29];
$insert_csv['maize_fertilizer_supplier_other'] = $csv_array[30];
$insert_csv['maize_fertilizer_benefits'] = $csv_array[31];
$insert_csv['maize_fertilizer_benefits_other'] = $csv_array[32];
$insert_csv['maize_chemical_use'] = $csv_array[33];
$insert_csv['maize_chemical_acreage'] = $csv_array[34]; 
$insert_csv['maize_chemical_acreage_mapped'] = $csv_array[35];
$insert_csv['maize_chemical_cost'] = $csv_array[36];
$insert_csv['maize_chemical_supplier'] = $csv_array[37];
$insert_csv['maize_chemical_supplier_other'] = $csv_array[38];
$insert_csv['maize_chemical_benefits'] = $csv_array[39];
$insert_csv['maize_chemical_benefits_other'] = $csv_array[40]; 
$insert_csv['maize_mgt_practices'] = $csv_array[41];
$insert_csv['maize_mgt_practices_acreage'] = $csv_array[42];
$insert_csv['maize_mgt_practices_acreage_mapped'] = $csv_array[43];
$insert_csv['maize_cost_ict'] = $csv_array[44]; 
$insert_csv['maize_ ict_supplier'] = $csv_array[45];
$insert_csv['maize_ ict_supplier_other'] = $csv_array[46];
$insert_csv['maize_mgt_benefits'] = $csv_array[47];
$insert_csv['maize_mgt_benefits_other'] = $csv_array[48];
$insert_csv['maize_machinery_use'] = $csv_array[49];
$insert_csv['maize_machinery_acreage'] = $csv_array[50];
$insert_csv['maize_machinery_acreage_mapped'] = $csv_array[51];
$insert_csv['maize_ machinery_cost'] = $csv_array[52];
$insert_csv['maize_ machinery_supplier'] = $csv_array[53];
$insert_csv['maize_ machinery_supplier_other'] = $csv_array[54];
$insert_csv['maize_ machinery_benefits'] = $csv_array[55];
$insert_csv['maize_ machinery_benefits_other'] = $csv_array[56];
$insert_csv['maize_harvested'] = $csv_array[57];
$insert_csv['maize_sold'] = $csv_array[58];
$insert_csv['maize_sold_price'] = $csv_array[59];
$insert_csv['maize_harvest_loss'] = $csv_array[60];

//======= end of values for $table3==================

//=======values for $table4==========================
$insert_csv['beans_acreage'] = $csv_array[61];
$insert_csv['beans_mapped'] = $csv_array[62];
$insert_csv['beans_improved_seeds'] = $csv_array[63];
$insert_csv['beans_improved_acreage'] = $csv_array[64];
$insert_csv['beans_improved_acreage_mapped'] = $csv_array[65];
$insert_csv['beans_improved_cost'] = $csv_array[66];
$insert_csv['beans_seed_supplier'] = $csv_array[67];
$insert_csv['beans_seed_supplier_other'] = $csv_array[68];
$insert_csv['beans_benefits'] = $csv_array[69];
$insert_csv['beans_benefits_other'] = $csv_array[70];
$insert_csv['beans_fetilizer_use'] = $csv_array[71];
$insert_csv['beans_acreage_fertilizer'] = $csv_array[72];
$insert_csv['beans_fertilizer_cost'] = $csv_array[73];
$insert_csv['beans_fertilizer_supplier'] = $csv_array[74];
$insert_csv['beans_fertilizer_supplier_other'] = $csv_array[75];
$insert_csv['beans_fertilizer_benefits'] = $csv_array[76];
$insert_csv['beans_fertilizer_benefits_other'] = $csv_array[77];
$insert_csv['beans_chemical_use'] = $csv_array[78];
$insert_csv['beans_chemical_acreage'] = $csv_array[79]; 
$insert_csv['beans_chemical_acreage_mapped'] = $csv_array[80];
$insert_csv['beans_chemical_cost'] = $csv_array[81];
$insert_csv['beans_chemical_supplier'] = $csv_array[82];
$insert_csv['beans_chemical_supplier_other'] = $csv_array[83];
$insert_csv['beans_chemical_benefits'] = $csv_array[84];
$insert_csv['beans_chemical_benefits_other'] = $csv_array[85]; 
$insert_csv['beans_mgt_practices'] = $csv_array[86];
$insert_csv['beans_mgt_practices_acreage'] = $csv_array[87];
$insert_csv['beans_mgt_practices_acreage_mapped'] = $csv_array[88];
$insert_csv['beans_cost_ict'] = $csv_array[89];
 $insert_csv['beans_ ict_supplier'] = $csv_array[90];
$insert_csv['beans_ ict_supplier_other'] = $csv_array[91];
$insert_csv['beans_mgt_benefits'] = $csv_array[92];
$insert_csv['beans_mgt_benefits_other'] = $csv_array[93];
$insert_csv['beans_machinery_use'] = $csv_array[94];
$insert_csv['beans_machinery_acreage'] = $csv_array[95];
$insert_csv['beans_machinery_acreage_mapped'] = $csv_array[96];
$insert_csv['beans_ machinery_cost'] = $csv_array[97];
$insert_csv['beans_ machinery_supplier'] = $csv_array[98];
$insert_csv['beans_ machinery_supplier_other'] = $csv_array[99];
$insert_csv['beans_ machinery_benefits'] = $csv_array[100];
$insert_csv['beans_ machinery_benefits_other'] = $csv_array[101];
$insert_csv['beans_harvested'] = $csv_array[102];
$insert_csv['beans_sold'] = $csv_array[103];
$insert_csv['beans_sold_price'] = $csv_array[104];
$insert_csv['beans_harvest_loss'] = $csv_array[105];

//======= end of values for $table4==================

//=======values for $table5==========================
$insert_csv['coffee_acreage'] = $csv_array[106];
$insert_csv['coffee_mapped'] = $csv_array[107];
$insert_csv['coffee_improved_seeds'] = $csv_array[108];
$insert_csv['coffee_improved_acreage'] = $csv_array[109];
$insert_csv['coffee_improved_acreage_mapped'] = $csv_array[110];
$insert_csv['coffee_improved_cost'] = $csv_array[111];
$insert_csv['coffee_seed_supplier'] = $csv_array[112];
$insert_csv['coffee_seed_supplier_other'] = $csv_array[113];
$insert_csv['coffee_benefits'] = $csv_array[114];
$insert_csv['coffee_benefits_other'] = $csv_array[115];
$insert_csv['coffee_fetilizer_use'] = $csv_array[116];
$insert_csv['coffee_acreage_fertilizer'] = $csv_array[117];
$insert_csv['coffee_fertilizer_cost'] = $csv_array[118];
$insert_csv['coffee_fertilizer_supplier'] = $csv_array[119];
$insert_csv['coffee_fertilizer_supplier_other'] = $csv_array[120];
$insert_csv['coffee_fertilizer_benefits'] = $csv_array[121];
$insert_csv['coffee_fertilizer_benefits_other'] = $csv_array[122];
$insert_csv['coffee_chemical_use'] = $csv_array[123];
$insert_csv['coffee_chemical_acreage'] = $csv_array[124]; 
$insert_csv['coffee_chemical_acreage_mapped'] = $csv_array[125];
$insert_csv['coffee_chemical_cost'] = $csv_array[126];
$insert_csv['coffee_chemical_supplier'] = $csv_array[127];
$insert_csv['coffee_chemical_supplier_other'] = $csv_array[128];
$insert_csv['coffee_chemical_benefits'] = $csv_array[129];
$insert_csv['coffee_chemical_benefits_other'] = $csv_array[130]; 
$insert_csv['coffee_mgt_practices'] = $csv_array[131];
$insert_csv['coffee_mgt_practices_acreage'] = $csv_array[132];
$insert_csv['coffee_mgt_practices_acreage_mapped'] = $csv_array[133];
$insert_csv['coffee_cost_ict'] = $csv_array[134];
$insert_csv['coffee_ ict_supplier'] = $csv_array[135];
$insert_csv['coffee_ ict_supplier_other'] = $csv_array[136];
$insert_csv['coffee_mgt_benefits'] = $csv_array[137];
$insert_csv['coffee_mgt_benefits_other'] = $csv_array[138];
$insert_csv['coffee_machinery_use'] = $csv_array[139];
$insert_csv['coffee_machinery_acreage'] = $csv_array[140];
$insert_csv['coffee_machinery_acreage_mapped'] = $csv_array[141];
$insert_csv['coffee_ machinery_cost'] = $csv_array[142];
$insert_csv['coffee_ machinery_supplier'] = $csv_array[143];
$insert_csv['coffee_ machinery_supplier_other'] = $csv_array[144];
$insert_csv['coffee_ machinery_benefits'] = $csv_array[145];
$insert_csv['coffee_ machinery_benefits_other'] = $csv_array[146];
$insert_csv['coffee_harvested'] = $csv_array[147];
$insert_csv['coffee_sold'] = $csv_array[148];
$insert_csv['coffee_sold_price'] = $csv_array[149];
$insert_csv['coffee_harvest_loss'] = $csv_array[150];

//======= end of values for $table5==================

//==============insert values into $table1===================
$stable1= "INSERT INTO ".$table1."(`farmer_code`,`interview_date`,`respondent`,
`farmer_crop_maize`,`farmer_crop_beans`,`farmer_crop_coffee`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$insert_csv['farmer_code']."','".$insert_csv['interview_date']."','".$insert_csv['respondent']."',
'".$insert_csv['farmer_crop_maize']."','".$insert_csv['farmer_crop_beans']."','".$insert_csv['farmer_crop_coffee']."',
'".$msg_at_readtime."','".$timestamp."')";
$a=mysql_query($stable1, $connect ) or die(mysql_error());

//============== end of insert values into $table1===================

//==============insert values into $table2===================
$stable2= "INSERT INTO ".$table2."(`fk_patId`, `farmer_code`, `loan_access`,
`loan_accessed`, `implemented_mgt_climate`, `implemented_mgt_climate_action`,
`implemented_mgt_climate_action_other`, `gps`, `compiled_by`,
`va`, `telephone`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$fk_patId."','".$insert_csv['farmer_code']."','".$insert_csv['loan_access']."','".$insert_csv['loan_accessed']."',
'".$insert_csv['implemented_mgt_climate']."','".$insert_csv['implemented_mgt_climate_action']."','".$insert_csv['implemented_mgt_climate_action_other']."',
'".$insert_csv['gps']."', '".$insert_csv['compiled_by']."','".$insert_csv['va']."', '".$insert_csv['telephone']."',
'".$msg_at_readtime."','".$timestamp."')";
$b=mysql_query($stable2, $connect )or die(mysql_error());

//============== end of insert values into $table2===================


//==============insert values into $table3===================
$stable3= "INSERT INTO ".$table3."(`fk_patId`, `farmer_code`,
`maize_acreage`, `maize_mapped`,
`maize_improved_seeds`, `maize_improved_acreage`,
`maize_improved_acreage_mapped`, `maize_improved_cost`,
`maize_seed_supplier`, `maize_seed_supplier_other`,
`maize_benefits`, `maize_benefits_other`,
`maize_fetilizer_use`, `maize_acreage_fertilizer`,
`maize_fertilizer_cost`, `maize_fertilizer_supplier`,
`maize_fertilizer_supplier_other`, `maize_fertilizer_benefits`,
`maize_fertilizer_benefits_other`, `maize_chemical_use`,
`maize_chemical_acreage`, `maize_chemical_acreage_mapped`,
`maize_chemical_cost`, `maize_chemical_supplier`,
`maize_chemical_supplier_other`, `maize_chemical_benefits`,
`maize_chemical_benefits_other`, `maize_mgt_practices`,
`maize_mgt_practices_acreage`, `maize_mgt_practices_acreage_mapped`,
`maize_cost_ict`, `maize_ ict_supplier`,
`maize_ ict_supplier_other`, `maize_mgt_benefits`,
`maize_mgt_benefits_other`, `maize_machinery_use`,
`maize_machinery_acreage`, `maize_machinery_acreage_mapped`,
`maize_ machinery_cost`, `maize_ machinery_supplier`,
`maize_ machinery_supplier_other`, `maize_ machinery_benefits`,
`maize_ machinery_benefits_other`, `maize_harvested`,
`maize_sold`, `maize_sold_price`,
`maize_harvest_loss`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$fk_patId."','".$insert_csv['farmer_code']."',
'".$insert_csv['maize_acreage']."', '".$insert_csv['maize_mapped']."',
'".$insert_csv['maize_improved_seeds']."', '".$insert_csv['maize_improved_acreage']."',
'".$insert_csv['maize_improved_acreage_mapped']."', '".$insert_csv['maize_improved_cost']."',
'".$insert_csv['maize_seed_supplier']."', '".$insert_csv['maize_seed_supplier_other']."',
'".$insert_csv['maize_benefits']."', '".$insert_csv['maize_benefits_other']."',
'".$insert_csv['maize_fetilizer_use']."', '".$insert_csv['maize_acreage_fertilizer']."',
'".$insert_csv['maize_fertilizer_cost']."', '".$insert_csv['maize_fertilizer_supplier']."',
'".$insert_csv['maize_fertilizer_supplier_other']."', '".$insert_csv['maize_fertilizer_benefits']."',
'".$insert_csv['maize_fertilizer_benefits_other']."', '".$insert_csv['maize_chemical_use']."',
'".$insert_csv['maize_chemical_acreage']."', '".$insert_csv['maize_chemical_acreage_mapped']."',
'".$insert_csv['maize_chemical_cost']."', '".$insert_csv['maize_chemical_supplier']."',
'".$insert_csv['maize_chemical_supplier_other']."', '".$insert_csv['maize_chemical_benefits']."',
'".$insert_csv['maize_chemical_benefits_other']."', '".$insert_csv['maize_mgt_practices']."',
'".$insert_csv['maize_mgt_practices_acreage']."', '".$insert_csv['maize_mgt_practices_acreage_mapped']."',
'".$insert_csv['maize_cost_ict']."', '".$insert_csv['maize_ ict_supplier']."',
'".$insert_csv['maize_ ict_supplier_other']."', '".$insert_csv['maize_mgt_benefits']."',
'".$insert_csv['maize_mgt_benefits_other']."', '".$insert_csv['maize_machinery_use']."',
'".$insert_csv['maize_machinery_acreage']."', '".$insert_csv['maize_machinery_acreage_mapped']."',
'".$insert_csv['maize_ machinery_cost']."', '".$insert_csv['maize_ machinery_supplier']."',
'".$insert_csv['maize_ machinery_supplier_other']."', '".$insert_csv['maize_ machinery_benefits']."',
'".$insert_csv['maize_ machinery_benefits_other']."', '".$insert_csv['maize_harvested']."',
'".$insert_csv['maize_sold']."', '".$insert_csv['maize_sold_price']."',
'".$insert_csv['maize_harvest_loss']."',
'".$msg_at_readtime."','".$timestamp."')";
$c=mysql_query($stable3, $connect );
//============== end of insert values into $table3===================

//==============insert values into $table4===========================
$stable4= "INSERT INTO ".$table4."(`fk_patId`, `farmer_code`,
`beans_acreage`, `beans_mapped`,
`beans_improved_seeds`, `beans_improved_acreage`,
`beans_improved_acreage_mapped`, `beans_improved_cost`,
`beans_seed_supplier`, `beans_seed_supplier_other`,
`beans_benefits`, `beans_benefits_other`,
`beans_fetilizer_use`, `beans_acreage_fertilizer`,
`beans_fertilizer_cost`, `beans_fertilizer_supplier`,
`beans_fertilizer_supplier_other`, `beans_fertilizer_benefits`,
`beans_fertilizer_benefits_other`, `beans_chemical_use`,
`beans_chemical_acreage`, `beans_chemical_acreage_mapped`,
`beans_chemical_cost`, `beans_chemical_supplier`,
`beans_chemical_supplier_other`, `beans_chemical_benefits`,
`beans_chemical_benefits_other`, `beans_mgt_practices`,
`beans_mgt_practices_acreage`, `beans_mgt_practices_acreage_mapped`,
`beans_cost_ict`, `beans_ ict_supplier`,
`beans_ ict_supplier_other`, `beans_mgt_benefits`,
`beans_mgt_benefits_other`, `beans_machinery_use`,
`beans_machinery_acreage`, `beans_machinery_acreage_mapped`,
`beans_ machinery_cost`, `beans_ machinery_supplier`,
`beans_ machinery_supplier_other`, `beans_ machinery_benefits`,
`beans_ machinery_benefits_other`, `beans_harvested`,
`beans_sold`, `beans_sold_price`,
`beans_harvest_loss`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$fk_patId."','".$insert_csv['farmer_code']."',
'".$insert_csv['beans_acreage']."', '".$insert_csv['beans_mapped']."',
'".$insert_csv['beans_improved_seeds']."', '".$insert_csv['beans_improved_acreage']."',
'".$insert_csv['beans_improved_acreage_mapped']."', '".$insert_csv['beans_improved_cost']."',
'".$insert_csv['beans_seed_supplier']."', '".$insert_csv['beans_seed_supplier_other']."',
'".$insert_csv['beans_benefits']."', '".$insert_csv['beans_benefits_other']."',
'".$insert_csv['beans_fetilizer_use']."', '".$insert_csv['beans_acreage_fertilizer']."',
'".$insert_csv['beans_fertilizer_cost']."', '".$insert_csv['beans_fertilizer_supplier']."',
'".$insert_csv['beans_fertilizer_supplier_other']."', '".$insert_csv['beans_fertilizer_benefits']."',
'".$insert_csv['beans_fertilizer_benefits_other']."', '".$insert_csv['beans_chemical_use']."',
'".$insert_csv['beans_chemical_acreage']."', '".$insert_csv['beans_chemical_acreage_mapped']."',
'".$insert_csv['beans_chemical_cost']."', '".$insert_csv['beans_chemical_supplier']."',
'".$insert_csv['beans_chemical_supplier_other']."', '".$insert_csv['beans_chemical_benefits']."',
'".$insert_csv['beans_chemical_benefits_other']."', '".$insert_csv['beans_mgt_practices']."',
'".$insert_csv['beans_mgt_practices_acreage']."', '".$insert_csv['beans_mgt_practices_acreage_mapped']."',
'".$insert_csv['beans_cost_ict']."', '".$insert_csv['beans_ ict_supplier']."',
'".$insert_csv['beans_ ict_supplier_other']."', '".$insert_csv['beans_mgt_benefits']."',
'".$insert_csv['beans_mgt_benefits_other']."', '".$insert_csv['beans_machinery_use']."',
'".$insert_csv['beans_machinery_acreage']."', '".$insert_csv['beans_machinery_acreage_mapped']."',
'".$insert_csv['beans_ machinery_cost']."', '".$insert_csv['beans_ machinery_supplier']."',
'".$insert_csv['beans_ machinery_supplier_other']."', '".$insert_csv['beans_ machinery_benefits']."',
'".$insert_csv['beans_ machinery_benefits_other']."', '".$insert_csv['beans_harvested']."',
'".$insert_csv['beans_sold']."', '".$insert_csv['beans_sold_price']."',
'".$insert_csv['beans_harvest_loss']."',
'".$msg_at_readtime."','".$timestamp."')";
$d=mysql_query($stable4, $connect )or die(mysql_error());
//============== end of insert values into $table4===================

//==============insert values into $table5===========================
$stable5= "INSERT INTO ".$table5."(`fk_patId`, `farmer_code`,
`coffee_acreage`, `coffee_mapped`,
`coffee_improved_seeds`, `coffee_improved_acreage`,
`coffee_improved_acreage_mapped`, `coffee_improved_cost`,
`coffee_seed_supplier`, `coffee_seed_supplier_other`,
`coffee_benefits`, `coffee_benefits_other`,
`coffee_fetilizer_use`, `coffee_acreage_fertilizer`,
`coffee_fertilizer_cost`, `coffee_fertilizer_supplier`,
`coffee_fertilizer_supplier_other`, `coffee_fertilizer_benefits`,
`coffee_fertilizer_benefits_other`, `coffee_chemical_use`,
`coffee_chemical_acreage`, `coffee_chemical_acreage_mapped`,
`coffee_chemical_cost`, `coffee_chemical_supplier`,
`coffee_chemical_supplier_other`, `coffee_chemical_benefits`,
`coffee_chemical_benefits_other`, `coffee_mgt_practices`,
`coffee_mgt_practices_acreage`, `coffee_mgt_practices_acreage_mapped`,
`coffee_cost_ict`, `coffee_ ict_supplier`,
`coffee_ ict_supplier_other`, `coffee_mgt_benefits`,
`coffee_mgt_benefits_other`, `coffee_machinery_use`,
`coffee_machinery_acreage`, `coffee_machinery_acreage_mapped`,
`coffee_ machinery_cost`, `coffee_ machinery_supplier`,
`coffee_ machinery_supplier_other`, `coffee_ machinery_benefits`,
`coffee_ machinery_benefits_other`, `coffee_harvested`,
`coffee_sold`, `coffee_sold_price`,
`coffee_harvest_loss`,
`msg_at_readtime`,`readtime`) 
VALUES ('".$fk_patId."','".$insert_csv['farmer_code']."',
'".$insert_csv['coffee_acreage']."', '".$insert_csv['coffee_mapped']."',
'".$insert_csv['coffee_improved_seeds']."', '".$insert_csv['coffee_improved_acreage']."',
'".$insert_csv['coffee_improved_acreage_mapped']."', '".$insert_csv['coffee_improved_cost']."',
'".$insert_csv['coffee_seed_supplier']."', '".$insert_csv['coffee_seed_supplier_other']."',
'".$insert_csv['coffee_benefits']."', '".$insert_csv['coffee_benefits_other']."',
'".$insert_csv['coffee_fetilizer_use']."', '".$insert_csv['coffee_acreage_fertilizer']."',
'".$insert_csv['coffee_fertilizer_cost']."', '".$insert_csv['coffee_fertilizer_supplier']."',
'".$insert_csv['coffee_fertilizer_supplier_other']."', '".$insert_csv['coffee_fertilizer_benefits']."',
'".$insert_csv['coffee_fertilizer_benefits_other']."', '".$insert_csv['coffee_chemical_use']."',
'".$insert_csv['coffee_chemical_acreage']."', '".$insert_csv['coffee_chemical_acreage_mapped']."',
'".$insert_csv['coffee_chemical_cost']."', '".$insert_csv['coffee_chemical_supplier']."',
'".$insert_csv['coffee_chemical_supplier_other']."', '".$insert_csv['coffee_chemical_benefits']."',
'".$insert_csv['coffee_chemical_benefits_other']."', '".$insert_csv['coffee_mgt_practices']."',
'".$insert_csv['coffee_mgt_practices_acreage']."', '".$insert_csv['coffee_mgt_practices_acreage_mapped']."',
'".$insert_csv['coffee_cost_ict']."', '".$insert_csv['coffee_ ict_supplier']."',
'".$insert_csv['coffee_ ict_supplier_other']."', '".$insert_csv['coffee_mgt_benefits']."',
'".$insert_csv['coffee_mgt_benefits_other']."', '".$insert_csv['coffee_machinery_use']."',
'".$insert_csv['coffee_machinery_acreage']."', '".$insert_csv['coffee_machinery_acreage_mapped']."',
'".$insert_csv['coffee_ machinery_cost']."', '".$insert_csv['coffee_ machinery_supplier']."',
'".$insert_csv['coffee_ machinery_supplier_other']."', '".$insert_csv['coffee_ machinery_benefits']."',
'".$insert_csv['coffee_ machinery_benefits_other']."', '".$insert_csv['coffee_harvested']."',
'".$insert_csv['coffee_sold']."', '".$insert_csv['coffee_sold_price']."',
'".$insert_csv['coffee_harvest_loss']."',
'".$msg_at_readtime."','".$timestamp."')";
$e=mysql_query($stable5, $connect )or die(mysql_error());
//============== end of insert values into $table5===================
 
 
   
   $i++;
 } 

@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
//transfer the file after copying
copy('/srv/www/data/'.$today.'.csv', 'grameenDataBackup/'.$today.'.csv');
fclose($csvfile);

//Delete the parent file

if (file_exists($csv_file)) {

unlink($csv_file);
}
//echo "File data successfully imported to database!!";
mysql_close($connect); // closing connection
?>