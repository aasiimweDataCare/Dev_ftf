<?php

define('CSV_PATH','C:/wamp/www/dcData/'); // specify CSV file path
$filename="form71";
$csv_file = CSV_PATH . "".$filename.".csv"; // Name of  CSV file to be read should be the current date
if (!file_exists($csv_file))
{
echo'No file exists for reading';
exit;
}

	$file = fopen($csv_file, 'r');
	$header_read = false;
	//The values and their Keys are irrelavant later on
	$index_mapping = array(
							
							'tbl_farmersId' => 0, 
							'tbl_tradersId' => 1, 
							'tbl_villageAgentId' => 2, 
							'tbl_villageagent_groupsId' => 3, 
							'reportingPeriod' => 4, 
							'groupName' => 5, 
							'farmersDistrict' => 6, 
							'farmersSubcounty' => 7, 
							'farmersName' => 8, 
							'memberDstart' => 9, 
							'memberStatus' => 10, 
							'farmersDob' => 11, 
							'farmersVillage' => 12, 
							'farmersSex' => 13,
							'farmersTel' => 14, 
							'hhName' => 15, 
							'hhDob' => 16, 
							'hhSex' => 17, 
							'hhHeadDStart' => 18, 
							'hhArea' => 19, 
							'hsComposition' => 20, 
							'farmers_e_pay' => 21, 
							'display' => 22, 
							'submittedBy' => 23, 
							'updatedBy' => 24, 
							'year'=> 25
							
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
		
		$index_mapping['tbl_farmersId'] = array_search('tbl_farmersId', $header);
		$index_mapping['tbl_tradersId'] = array_search('tbl_tradersId', $header);
		$index_mapping['tbl_villageAgentId'] = array_search('tbl_villageAgentId', $header);
		$index_mapping['tbl_villageagent_groupsId'] = array_search('tbl_villageagent_groupsId', $header);
		$index_mapping['reportingPeriod'] = array_search('reportingPeriod', $header);
		$index_mapping['groupName'] = array_search('groupName', $header);
		$index_mapping['farmersDistrict'] = array_search('farmersDistrict', $header);
		$index_mapping['farmersSubcounty'] = array_search('farmersSubcounty', $header);
		$index_mapping['farmersName'] = array_search('farmersName', $header);
		$index_mapping['memberDstart'] = array_search('memberDstart', $header);
		$index_mapping['memberStatus'] = array_search('memberStatus', $header);
		$index_mapping['farmersDob'] = array_search('farmersDob', $header);
		$index_mapping['farmersVillage'] = array_search('farmersVillage', $header);
		$index_mapping['farmersSex'] = array_search('farmersSex', $header);
		$index_mapping['farmersTel'] = array_search('farmersTel', $header);
		$index_mapping['hhName'] = array_search('hhName', $header);
		$index_mapping['hhDob'] = array_search('hhDob', $header);
		$index_mapping['hhSex'] = array_search('hhSex', $header);
		$index_mapping['hhHeadDStart'] = array_search('hhHeadDStart', $header);
		$index_mapping['hhArea'] = array_search('hhArea', $header);
		$index_mapping['hsComposition'] = array_search('hsComposition', $header);
		$index_mapping['farmers_e_pay'] = array_search('farmers_e_pay', $header);
		$index_mapping['display'] = array_search('display', $header);
		$index_mapping['submittedBy'] = array_search('submittedBy', $header);
		$index_mapping['updatedBy'] = array_search('updatedBy', $header);
		$index_mapping['year'] = array_search('year', $header);
		
		
		
		
		
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
		
		
		$connect = mysql_connect('localhost','root','')or die(mysql_error());

		if (!$connect)
		{
		$msg_at_readtime=mysql_error();
		}
		$cid =mysql_select_db('db_cpma_test',$connect); //specify db name

		@mysql_query("SET AUTOCOMMIT=FALSE");
		@mysql_query("BEGIN TRANSACTION");

		$stmnt_check="SELECT MAX(`tbl_farmersId`) as tbl_farmersId  FROM `tbl_farmers`";
		$Qcheck=@mysql_query($stmnt_check) or die(mysql_error());

		if (!$Qcheck)
				{
					$msg_at_readtime=mysql_error();
				}

		$y=1;
		if(@mysql_num_rows($Qcheck)>0){
				$Rcheck=mysql_fetch_array($Qcheck);
				$lastPatId=$Rcheck['tbl_farmersId'];
				$nextPatId=($lastPatId+$y);
				$tbl_farmersId=$nextPatId;  
			} else{
				$initialPatId=$y;
				$tbl_farmersId=$initialPatId;  
			}
			
		$table1='tbl_farmers';
		
		//sanitize the data aka validation before insert
		
		//$tbl_farmersId=((($record[$index_mapping['tbl_farmersId']])!='' or !(empty($record[$index_mapping['tbl_farmersId']])))?$record[$index_mapping['tbl_farmersId']]:null);
		$tbl_tradersId=((($record[$index_mapping['tbl_tradersId']])!='' or !(empty($record[$index_mapping['tbl_tradersId']])))?$record[$index_mapping['tbl_tradersId']]:null);
		$tbl_villageAgentId=((($record[$index_mapping['tbl_villageAgentId']])!='' or !(empty($record[$index_mapping['tbl_villageAgentId']])))?$record[$index_mapping['tbl_villageAgentId']]:null);
		$tbl_villageagent_groupsId=((($record[$index_mapping['tbl_villageagent_groupsId']])!='' or !(empty($record[$index_mapping['tbl_villageagent_groupsId']])))?$record[$index_mapping['tbl_villageagent_groupsId']]:null);
		$reportingPeriod=((($record[$index_mapping['reportingPeriod']])!='' or !(empty($record[$index_mapping['reportingPeriod']])))?$record[$index_mapping['reportingPeriod']]:null);
		$groupName=((($record[$index_mapping['groupName']])!='' or !(empty($record[$index_mapping['groupName']])))?$record[$index_mapping['groupName']]:null);
		$farmersDistrict=((($record[$index_mapping['farmersDistrict']])!='' or !(empty($record[$index_mapping['farmersDistrict']])))?$record[$index_mapping['farmersDistrict']]:null);
		$farmersSubcounty=((($record[$index_mapping['farmersSubcounty']])!='' or !(empty($record[$index_mapping['farmersSubcounty']])))?$record[$index_mapping['farmersSubcounty']]:null);
		$farmersName=((($record[$index_mapping['farmersName']])!='' or !(empty($record[$index_mapping['farmersName']])))?$record[$index_mapping['farmersName']]:null);
		$memberDstart=((($record[$index_mapping['memberDstart']])!='' or !(empty($record[$index_mapping['memberDstart']])))?$record[$index_mapping['memberDstart']]:null);
		$memberStatus=((($record[$index_mapping['memberStatus']])!='' or !(empty($record[$index_mapping['memberStatus']])))?$record[$index_mapping['memberStatus']]:null);
		$farmersDob=((($record[$index_mapping['farmersDob']])!='' or !(empty($record[$index_mapping['farmersDob']])))?$record[$index_mapping['farmersDob']]:null);
		$farmersVillage=((($record[$index_mapping['farmersVillage']])!='' or !(empty($record[$index_mapping['farmersVillage']])))?$record[$index_mapping['farmersVillage']]:null);
		$farmersSex=((($record[$index_mapping['farmersSex']])!='' or !(empty($record[$index_mapping['farmersSex']])))?$record[$index_mapping['farmersSex']]:null);
		$farmersTel=((($record[$index_mapping['farmersTel']])!='' or !(empty($record[$index_mapping['farmersTel']])))?$record[$index_mapping['farmersTel']]:null);
		$hhName=((($record[$index_mapping['hhName']])!='' or !(empty($record[$index_mapping['hhName']])))?$record[$index_mapping['hhName']]:null);
		$hhDob=((($record[$index_mapping['hhDob']])!='' or !(empty($record[$index_mapping['hhDob']])))?$record[$index_mapping['hhDob']]:null);
		$hhSex=((($record[$index_mapping['hhSex']])!='' or !(empty($record[$index_mapping['hhSex']])))?$record[$index_mapping['hhSex']]:null);
		$hhHeadDStart=((($record[$index_mapping['hhHeadDStart']])!='' or !(empty($record[$index_mapping['hhHeadDStart']])))?$record[$index_mapping['hhHeadDStart']]:null);
		$hhArea=((($record[$index_mapping['hhArea']])!='' or !(empty($record[$index_mapping['hhArea']])))?$record[$index_mapping['hhArea']]:null);
		$hsComposition=((($record[$index_mapping['hsComposition']])!='' or !(empty($record[$index_mapping['hsComposition']])))?$record[$index_mapping['hsComposition']]:null);
		$farmers_e_pay=((($record[$index_mapping['farmers_e_pay']])!='' or !(empty($record[$index_mapping['farmers_e_pay']])))?$record[$index_mapping['farmers_e_pay']]:null);
		$display=((($record[$index_mapping['display']])!='' or !(empty($record[$index_mapping['display']])))?$record[$index_mapping['display']]:'Yes');
		$submittedBy=((($record[$index_mapping['submittedBy']])!='' or !(empty($record[$index_mapping['submittedBy']])))?$record[$index_mapping['submittedBy']]:'aasiimwe');
		$updatedBy=((($record[$index_mapping['updatedBy']])!='' or !(empty($record[$index_mapping['updatedBy']])))?$record[$index_mapping['updatedBy']]:null);
		$year=((($record[$index_mapping['year']])!='' or !(empty($record[$index_mapping['year']])))?$record[$index_mapping['year']]:'2015');  
		  
		  //test the farmer code existance
		  if ($tbl_farmersId<>'' or $tbl_farmersId<>null) {
		//==============insert values into $table1==========================
		$stable1= "INSERT INTO ".$table1." (`tbl_farmersId`, `tbl_tradersId`, `tbl_villageAgentId`,
		`tbl_villageagent_groupsId`, `reportingPeriod`, `groupName`,
		`farmersDistrict`, `farmersSubcounty`, `farmersName`,
		`memberDstart`, `memberStatus`, `farmersDob`,
		`farmersVillage`, `farmersSex`, `farmersTel`, 
		`hhName`, `hhDob`, `hhSex`,
		`hhHeadDStart`, `hhArea`, `hsComposition`,
		`farmers_e_pay`, `display`, `submittedBy`, 
		`updatedBy`, `year`) 
		VALUES
		('".$tbl_farmersId."', '".$tbl_tradersId."', '".$tbl_villageAgentId."',
		'".$tbl_villageagent_groupsId."', '".$reportingPeriod."', '".$groupName."',
		'".$farmersDistrict."', '".$farmersSubcounty."', '".$farmersName."',
		'".$memberDstart."', '".$memberStatus."', '".$farmersDob."',
		'".$farmersVillage."', '".$farmersSex."', '".$farmersTel."', 
		'".$hhName."', '".$hhDob."', '".$hhSex."',
		'".$hhHeadDStart."', '".$hhArea."', '".$hsComposition."',
		'".$farmers_e_pay."', '".$display."', '".$submittedBy."', 
		'".$updatedBy."', '".$year."')";
		$a=mysql_query(fixtags($stable1), $connect ) or die(mysql_error());
		//============== end of insert values into $table1===================

		
		
		}else{
			
			//insert into the form6 survey error log table
		}
		
		@mysql_query("COMMIT");
		@mysql_query("SET AUTOCOMMIT=TRUE");
		
		
		echo fixtags($stable1); 
		
		echo "<br/>File data successfully imported to database!!";
		mysql_close($connect);  // closing connection
		 
	}
?>