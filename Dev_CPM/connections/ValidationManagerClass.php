<?php
//require_once('lib_sunrise.php');

class ValidationManager
{
    var $query;
    var $role;


    function ValidationManager($query)
    {
        $this->query;
    }


	function form1Duplicates($myQuery){
		$st="SELECT 
			`p`.`tbl_participantId`,
			`p`.`name`,
			`p`.`age`,
			`p`.`sex`,
			`p`.`status`, 
			`p`.`village`, 
			`p`.`typeOfIndividual`,
			`p`.`telephone`
			FROM (`tbl_participants` as `p`, `tbl_training` as `t` )
			INNER JOIN ( SELECT `name`,
			`age`,
			`sex`,
			`status`, 
			`village`, 
			`typeOfIndividual`,
			`telephone`,
			COUNT(*)
			FROM `tbl_participants` 
			where `display` = 'Yes'
			GROUP BY `name`,
			`age`,
			`sex`,
			`status`, 
			`village`, 
			`typeOfIndividual`,
			`telephone`
			
			HAVING COUNT(*) > 1) temp
			ON  temp.`name` = `p`.`name`
			AND temp.`age` = `p`.`age`
			AND temp.`sex` = `p`.`sex` 
			AND temp.`status` = `p`.`status` 
			AND temp.`village` = `p`.`village`
			AND temp.`typeOfIndividual` = `p`.`typeOfIndividual`
			AND temp.`telephone` = `p`.`telephone`

			where `p`.`trainingId`=`t`.`tbl_trainingId`
			and  `t`.`trainingDate` >= '2015-10-01'
			and  `p`.`display` = 'Yes'
			ORDER BY 
			`name`,
			`age`,
			`sex`,
			`status`, 
			`village`, 
			`typeOfIndividual`,
			`telephone` DESC limit 0,500";
			
		return 	$st;
	}
	function form6Duplicates($myQuery){
		$st="select
				`p`.`pk_patId`,
				case 
				  when `f`.`tbl_farmersId` <> `p`.`farmer_code`  then 'Not Available' 
				  else `f`.`farmersName`
				end as `nameOfFarmer`,
				`p`.`farmer_code`, 
				`p`.`interview_date`,
				`p`.`respondent`, 
				`p`.`farmer_crop_maize`, 
				`p`.`farmer_crop_beans`,
				`p`.`farmer_crop_coffee`, 
				`g`.`loan_access`, 
				`g`.`loan_accessed`,
				`g`.`implemented_mgt_climate`, 
				`g`.`implemented_mgt_climate_action`,
				`g`.`implemented_mgt_climate_action_other`,
				`g`.`gps`, 
				`g`.`compiled_by`, 
				`g`.`va`, 
				`g`.`telephone`,
				`p`.`readtime`  
				 from `tbl_frm6particulars` as `p`
				join `tbl_frm6gqnsandgps` as `g` on ( `g`.`fk_patid` = `p`.`pk_patId` )
				join `tbl_farmers` as `f` on ( `f`.`tbl_farmersId` = `g`.`farmer_code`  )
				INNER JOIN ( SELECT 
				`p_temp`.`farmer_code`, 
				`p_temp`.`interview_date`,
				`p_temp`.`respondent`, 
				`p_temp`.`farmer_crop_maize`, 
				`p_temp`.`farmer_crop_beans`,
				`p_temp`.`farmer_crop_coffee`, 
				`g_temp`.`loan_access`, 
				`g_temp`.`loan_accessed`,
				`g_temp`.`implemented_mgt_climate`, 
				`g_temp`.`implemented_mgt_climate_action`,
				`g_temp`.`implemented_mgt_climate_action_other`,
				`g_temp`.`gps`, 
				`g_temp`.`compiled_by`, 
				`g_temp`.`va`, 
				`g_temp`.`telephone`,
				`p_temp`.`readtime`,
				COUNT(*)
				FROM `tbl_frm6particulars` as `p_temp`
				join `tbl_frm6gqnsandgps` as `g_temp` on ( `g_temp`.`fk_patid` = `p_temp`.`pk_patId` ) 
				GROUP BY 
				`p_temp`.`farmer_code`, 
				`p_temp`.`interview_date`,
				`p_temp`.`respondent`, 
				`p_temp`.`farmer_crop_maize`, 
				`p_temp`.`farmer_crop_beans`,
				`p_temp`.`farmer_crop_coffee`, 
				`g_temp`.`loan_access`, 
				`g_temp`.`loan_accessed`,
				`g_temp`.`implemented_mgt_climate`, 
				`g_temp`.`implemented_mgt_climate_action`,
				`g_temp`.`implemented_mgt_climate_action_other`,
				`g_temp`.`gps`, 
				`g_temp`.`compiled_by`, 
				`g_temp`.`va`, 
				`g_temp`.`telephone`, 
				`p_temp`.`readtime`
				HAVING COUNT(*) > 1) temp
				ON `temp`.`farmer_code` = `p`.`farmer_code` 
				AND `temp`.`interview_date` = `p`.`interview_date`
				AND `temp`.`respondent` = `p`.`respondent` 
				AND `temp`.`farmer_crop_maize` = `p`.`farmer_crop_maize` 
				AND `temp`.`farmer_crop_beans` = `p`.`farmer_crop_beans`
				AND `temp`.`farmer_crop_coffee` = `p`.`farmer_crop_coffee` 
				AND `temp`.`loan_access` = `g`.`loan_access` 
				AND `temp`.`loan_accessed` = `g`.`loan_accessed`
				AND `temp`.`implemented_mgt_climate` = `g`.`implemented_mgt_climate` 
				AND `temp`.`implemented_mgt_climate_action` = `g`.`implemented_mgt_climate_action`
				AND `temp`.`implemented_mgt_climate_action_other` = `g`.`implemented_mgt_climate_action_other`
				AND `temp`.`gps` = `g`.`gps` 
				AND `temp`.`compiled_by` = `g`.`compiled_by` 
				AND `temp`.`va` = `g`.`va` 
				AND `temp`.`telephone` = `g`.`telephone` 
				AND `temp`.`readtime` = `p`.`readtime`
				where `p`.`display`='Yes'
				ORDER BY 
				`p`.`farmer_code`, 
				`p`.`interview_date`,
				`p`.`respondent`, 
				`p`.`farmer_crop_maize`, 
				`p`.`farmer_crop_beans`,
				`p`.`farmer_crop_coffee`,
				`g`.`loan_access`, 
				`g`.`loan_accessed`,
				`g`.`implemented_mgt_climate`, 
				`g`.`implemented_mgt_climate_action`,
				`g`.`implemented_mgt_climate_action_other`,
				`g`.`gps`, 
				`g`.`compiled_by`, 
				`g`.`va`, 
				`g`.`telephone`,
				`p`.`readtime`
				";
			
		return 	$st;
	}
	function form7Duplicates($myQuery){
		$st="SELECT `f`.`tbl_farmersId`,
			`f`.`farmersName`, 
			`f`.`memberDstart`,
			`f`.`farmersVillage`,
			`f`.`farmersSex`,
			`f`.`farmersTel`, 
			`f`.`hhName`, 
			`f`.`hhDob`,
			`f`.`hhSex`,
			`f`.`hhHeadDStart`,
			`t`.`traderName`,
			concat(' ', `t`.`traderCode`) as`traderCode`,
			`v`.`vAgentName`, 
			concat(' ', `v`.`vAgentCode`) as`vAgentCode`
			FROM (`tbl_traders` as `t`,`tbl_villageagents` as `v`,`tbl_farmers` as `f` )
			INNER JOIN ( SELECT
			`farmersName`, 
			`memberDstart`,
			`farmersVillage`,
			`farmersSex`,
			`farmersTel`, 
			`hhName`, 
			`hhDob`,
			`hhSex`,
			`hhHeadDStart`,
			COUNT(*)
			FROM `tbl_farmers` 
			GROUP BY `farmersName`, 
			`memberDstart`,
			`farmersVillage`,
			`farmersSex`,
			`farmersTel`, 
			`hhName`, 
			`hhDob`,
			`hhSex`,
			`hhHeadDStart`
			HAVING COUNT(*) > 1) temp
			ON temp.`farmersName` = `f`.`farmersName`
			AND temp.`memberDstart` = `f`.`memberDstart`
			AND temp.`farmersVillage` = `f`.`farmersVillage`
			AND temp.`farmersSex` = `f`.`farmersSex`
			AND temp.`farmersTel` = `f`.`farmersTel` 
			AND temp.`hhName` = `f`.`hhName` 
			AND temp.`hhDob` = `f`.`hhDob`
			AND temp.`hhSex` = `f`.`hhSex`
			AND temp.`hhHeadDStart` = `f`.`hhHeadDStart`
			where `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
			and  `v`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
			and `f`.`display` = 'Yes'
			ORDER BY 
			`farmersName`, 
			`memberDstart`,
			`farmersVillage`,
			`farmersSex`,
			`farmersTel`, 
			`hhName`, 
			`hhDob`,
			`hhSex`,
			`hhHeadDStart` limit 0,500";
			
		return 	$st;
	}
	function form3Duplicates($myQuery){
		$st="select 
				`x`.`tbl_form3_exportersId`,
				`t`.`exporterName`,
				`x`.`tbl_exporterId`,
				`x`.`reportingPeriod`, 
				`x`.`exTradersSupplyChain`,
				`x`.`exUnionSupplyChain`,
				`x`.`volMaizePurchased`, 
				`x`.`volCoffeePurchased`, 
				`x`.`volBeansPurchased`, 
				`x`.`volMaizeEx`, 
				`x`.`volCoffeeEx`,
				`x`.`volBeansEx`, 
				`x`.`epayRecieved`,
				`x`.`epayMade`,
				`x`.`storageCapNew`, 
				`x`.`storageCapImproved`, 
				`x`.`CompiledBy`,
				`x`.`ReviewedBy`,
				`x`.`SubmittedBy`, 
				`x`.`DateSubmission`, 
				`x`.`updatedby`, 
				`x`.`year`,
				`x`.`dateCompiled`,
				`x`.`personInterviewed`, 
				`x`.`telephoneInterviewed`, 
				`x`.`titleCompiledBy`,
				`x`.`titleOfPersonInterviewed`,
				`x`.`display` 
				FROM (`tbl_exporters` as `t`, `tbl_form3_exporters` as `x` )
				INNER JOIN ( SELECT 
				`tbl_exporterId`,
				`reportingPeriod`,
				`CompiledBy`, 
				`ReviewedBy`,
				`SubmittedBy`, 
				`DateSubmission`, 
				`updatedby`, 
				`year`,
				`dateCompiled`,
				`personInterviewed`, 
				`telephoneInterviewed`, 
				`titleCompiledBy`,
				`titleOfPersonInterviewed`,
				`display`,
				COUNT(*)
				FROM `tbl_form3_exporters` 
				GROUP BY 
				`tbl_exporterId`,
				`reportingPeriod`,
				`CompiledBy`, 
				`ReviewedBy`,
				`SubmittedBy`, 
				`DateSubmission`, 
				`updatedby`, 
				`year`,
				`dateCompiled`,
				`personInterviewed`, 
				`telephoneInterviewed`, 
				`titleCompiledBy`,
				`titleOfPersonInterviewed`,
				`display`
				HAVING COUNT(*) > 1) temp
				ON temp.`tbl_exporterId` = `x`.`tbl_exporterId`
				AND temp.`reportingPeriod` = `x`.`reportingPeriod`
				AND temp.`CompiledBy` = `x`.`CompiledBy` 
				AND temp.`ReviewedBy` = `x`.`ReviewedBy`
				AND temp.`SubmittedBy` = `x`.`SubmittedBy` 
				AND temp.`DateSubmission` = `x`.`DateSubmission` 
				AND temp.`updatedby` = `x`.`updatedby` 
				AND temp.`year` = `x`.`year`
				AND temp.`dateCompiled` = `x`.`dateCompiled`
				AND temp.`personInterviewed` = `x`.`personInterviewed` 
				AND temp.`telephoneInterviewed` = `x`.`telephoneInterviewed` 
				AND temp.`titleCompiledBy` = `x`.`titleCompiledBy`
				AND temp.`titleOfPersonInterviewed` = `x`.`titleOfPersonInterviewed`
				AND temp.`display` = `x`.`display`
				where `x`.`display`='Yes'
				and `x`.`tbl_exporterId` = `t`.`tbl_exportersId`
				ORDER BY 
				`tbl_exporterId`,
				`reportingPeriod`,
				`CompiledBy`, 
				`ReviewedBy`,
				`SubmittedBy`, 
				`DateSubmission`, 
				`updatedby`, 
				`year`,
				`dateCompiled`,
				`personInterviewed`, 
				`telephoneInterviewed`, 
				`titleCompiledBy`,
				`titleOfPersonInterviewed`,
				`display`";
			
		return 	$st;
	}
	function form4Duplicates($myQuery){
		$st="SELECT 
            `y`.`tbl_form4_tradersId`,
			`t`.`traderName`,
			`y`.`tbl_traderId`,
			`y`.`year`,
			`y`.`reportingPeriod`, 
			`y`.`vaSupplyChain`, 
			`y`.`numCbo`,
			`y`.`volMaizePurchased`,
			`y`.`volCoffeePurchased`, 
			`y`.`volBeansPurchased`, 
			`y`.`volMaizeEx`,
			`y`.`volCoffeeEx`,
			`y`.`volBeansEx`, 
			`y`.`epayRecieved`, 
			`y`.`epayMade`,
			`y`.`storageCapNew`,
			`y`.`storageCapImproved`,
			`y`.`CompiledBy`, 
			`y`.`personInterviewed`, 
			`y`.`telephoneInterviewed`,
			`y`.`titleCompiledBy`, 
			`y`.`titleOfPersonInterviewed`,
			`y`.`display` 
			FROM (`tbl_traders` as `t`, `tbl_form4_traders` as `y`)
			INNER JOIN ( SELECT 
			`tbl_traderId`,
			`year`,
			`reportingPeriod`, 
			`vaSupplyChain`, 
			`numCbo`,
			`volMaizePurchased`,
			`volCoffeePurchased`, 
			`volBeansPurchased`, 
			`volMaizeEx`,
			`volCoffeeEx`,
			`volBeansEx`, 
			`epayRecieved`, 
			`epayMade`,
			`storageCapNew`,
			`storageCapImproved`,
			`CompiledBy`, 
			`personInterviewed`, 
			`telephoneInterviewed`,
			`titleCompiledBy`, 
			`titleOfPersonInterviewed`,
			`display`,
			COUNT(*)
			FROM `tbl_form4_traders`
            GROUP BY 
			`tbl_traderId`,
			`year`,
			`reportingPeriod`, 
			`vaSupplyChain`, 
			`numCbo`,
			`volMaizePurchased`,
			`volCoffeePurchased`, 
			`volBeansPurchased`, 
			`volMaizeEx`,
			`volCoffeeEx`,
			`volBeansEx`, 
			`epayRecieved`, 
			`epayMade`,
			`storageCapNew`,
			`storageCapImproved`,
			`CompiledBy`, 
			`personInterviewed`, 
			`telephoneInterviewed`,
			`titleCompiledBy`, 
			`titleOfPersonInterviewed`,
			`display`
			HAVING COUNT(*) > 1) temp
			ON temp.`tbl_traderId` = `y`.`tbl_traderId`
			AND temp.`year` = `y`.`year`
			AND temp.`reportingPeriod` = `y`.`reportingPeriod` 
			AND temp.`vaSupplyChain` = `y`.`vaSupplyChain`
			AND temp.`numCbo` = `y`.`numCbo` 
			AND temp.`volMaizePurchased` = `y`.`volMaizePurchased` 
			AND temp.`volCoffeePurchased` = `y`.`volCoffeePurchased` 
			AND temp.`volBeansPurchased` = `y`.`volBeansPurchased`
			AND temp.`volMaizeEx` = `y`.`volMaizeEx`
			AND temp.`volCoffeeEx` = `y`.`volCoffeeEx` 
			AND temp.`volBeansEx` = `y`.`volBeansEx` 
			AND temp.`epayRecieved` = `y`.`epayRecieved`
			AND temp.`epayMade` = `y`.`epayMade`
			AND temp.`storageCapNew` = `y`.`storageCapNew` 
			AND temp.`storageCapImproved` = `y`.`storageCapImproved` 
			AND temp.`CompiledBy` = `y`.`CompiledBy` 
			AND temp.`personInterviewed` = `y`.`personInterviewed`
			AND temp.`telephoneInterviewed` = `y`.`telephoneInterviewed`
			AND temp.`titleCompiledBy` = `y`.`titleCompiledBy` 
			AND temp.`titleOfPersonInterviewed` = `y`.`titleOfPersonInterviewed` 
			AND temp.`display` = `y`.`display`
			where `y`.`display`='Yes'
			and `y`.`tbl_traderId` = `t`.`tbl_tradersId`
			ORDER BY 
			`tbl_traderId`,
			`year`,
			`reportingPeriod`, 
			`vaSupplyChain`, 
			`numCbo`,
			`volMaizePurchased`,
			`volCoffeePurchased`, 
			`volBeansPurchased`, 
			`volMaizeEx`,
			`volCoffeeEx`,
			`volBeansEx`, 
			`epayRecieved`, 
			`epayMade`,
			`storageCapNew`,
			`storageCapImproved`,
			`CompiledBy`, 
			`personInterviewed`, 
			`telephoneInterviewed`,
			`titleCompiledBy`, 
			`titleOfPersonInterviewed`,
			`display`";
			
		return 	$st;
	}
	function sumform1Partials($value){
		//conditions for a suspected partial record form1
		$stCond="select sum(
									case 
										when `p`.`age` <= 0 then 1
										when CHAR_LENGTH(`p`.`name`) <= 2 then 1 
										when `p`.`sex` = '' then 1 
										when `p`.`status` = '' then 1
									end) as `partialRecords`
									from `tbl_participants` as `p`";
									
						$qCond= @Execute($stCond) or die(http(__line__));	
						$rCond = @FetchRecords($qCond);
						$result = $rCond['partialRecords'];			
						
		return $result;
	}
	function sumform6Partials($value){
		
						$stCond = "select sum(
									case 
									  when `p`.`farmer_code` < 860 then 1 
									  when `p`.`interview_date` <= '2013-10-01' then 1 
									  when `p`.`farmer_crop_maize` = '' and `p`.`farmer_crop_beans` = '' and `p`.`farmer_crop_coffee` = '' then 1
									end) as `partialRecords`
									from `tbl_frm6particulars` as `p`
									where `p`.`display` = 'Yes'";
						
						$qCond = @Execute($stCond) or die(http(__line__));	
						$rCond = @FetchRecords($qCond);
						$result = $rCond['partialRecords'];
						
						
		return $result;
	}
	function sumform7Partials($value){
		
		$stCond = "select sum(
					case
						when `f`.`reportingPeriod` like 'Closed%' then 1 
						when `f`.`reportingPeriod` = '' then 1 
						when `f`.`farmersSex` = '' then 1 
					end) as `partialRecords`
					from `tbl_farmers` as `f`
					where `f`.`display` = 'Yes'";
		
		$qCond = @Execute($stCond) or die(http(__line__));	
		$rCond = @FetchRecords($qCond);
		$result = $rCond['partialRecords'];
						
		return $result;
	}
	function sumform3Partials($value){
		
		$stCond = "select sum(
					case
						when `x`.`tbl_exporterId` = '' || `x`.`tbl_exporterId` is null then 1 
						when `x`.`reportingPeriod` like 'Closed%' then 1 
						when `x`.`reportingPeriod` = '' then 1 
						when `x`.`CompiledBy` = '' || `x`.`CompiledBy` is null then 1 
						when `x`.`DateSubmission` = '' || `x`.`DateSubmission` is null then 1 
					end) as `partialRecords`
					from `tbl_form3_exporters` as `x`
					where `x`.`display`='Yes'";
		
		$qCond = @Execute($stCond) or die(http(__line__));	
		$rCond = @FetchRecords($qCond);
		$result = $rCond['partialRecords'];
						
		return $result;
	}
	function sumform4Partials($value){
		
		$stCond = "select sum(
					case
						when `x`.`tbl_traderId` = '' || `x`.`tbl_traderId` is null then 1 
						when `x`.`reportingPeriod` like 'Closed%' then 1 
						when `x`.`reportingPeriod` = '' then 1 
						when `x`.`CompiledBy` = '' || `x`.`CompiledBy` is null then 1 
						when `x`.`DateSubmission` = '' || `x`.`DateSubmission` is null then 1 
					end) as `partialRecords`
					from `tbl_form4_traders` as `x`
					where `x`.`display`='Yes'";
		
		$qCond = @Execute($stCond) or die(http(__line__));	
		$rCond = @FetchRecords($qCond);
		$result = $rCond['partialRecords'];
						
		return $result;
	}
	function filter_dataForm($myForm){
		$dForms=array('form1','form2','form3','form4','form6','form7');
		$q = 0; 
		foreach ($dForms as $form) {
		$selected=($myForm==$form)?"selected":"";
		$data.="<option value=\"".$form."\"".$selected.">".$form."</option>";
		$q++;
		} 
	
		return 	$data;
	}
	function filter_form2_dataForm($myForm){
		$dForms=array('Enterprise Technology Adoption form',
		'Labour Saving Technology form',
		'Media Programs form',
		'Youth Apprenticeship form',
		'Business Development Services form',
		'Bank Loans form',
		'Input Sales form',
		'PHH form',
		'Public Private Partnership form');
		$q = 0; 
		foreach ($dForms as $form) {
		$selected=($myForm==$form)?"selected":"";
		$data.="<option value=\"".$form."\"".$selected.">".$form."</option>";
		$q++;
		} 
	
		return 	$data;
	}
	function filter_rPeriod($rPeriod){
		$periods=array('Oct 2013 - Mar 2014','Apr 2014 - Sep 2014','Oct 2014 - Mar 2015','Apr 2015 - Sep 2015','Oct 2015 - Mar 2016');
		$q = 0; 
		foreach ($periods as $period) {
		$selected=($rPeriod==$period)?"selected":"";
		$data.="<option value=\"".$period."\"".$selected.">".$period."</option>";
		$q++;
		} 
	
		return 	$data;
	}
	function queryRecordsCount($stmnt){
		$query = @Execute($stmnt) or die(http(__line__));	
		$num_rows = mysql_num_rows($query);
		return 	$num_rows;
	}
	function form1TotSubmissions($myQuery){
		$stTot = "SELECT count(*) as totRecordSubmissions FROM `tbl_participants` where `display`='Yes'";
				$query = @Execute($stTot) or die(http(__line__));	
				$row = @FetchRecords($query);
				$result = $row['totRecordSubmissions']; 
			
		return 	$result;
	}
	function form6TotSubmissions($myQuery){
		$stTot = "SELECT count(*) as totRecordSubmissions FROM `tbl_frm6particulars` where `display`='Yes'";
				$query = @Execute($stTot) or die(http(__line__));	
				$row = @FetchRecords($query);
				$result = $row['totRecordSubmissions']; 
			
		return 	$result;
	}
	function form7TotSubmissions($myQuery){
		$stTot = "SELECT count(*) as totRecordSubmissions FROM `tbl_farmers` where `display`='Yes'";
				$query = @Execute($stTot) or die(http(__line__));	
				$row = @FetchRecords($query);
				$result = $row['totRecordSubmissions']; 
			
		return 	$result;
	}
	function form3TotSubmissions($myQuery){
		$stTot = "SELECT count(*) as totRecordSubmissions FROM `tbl_form3_exporters` where `display`='Yes'";
				$query = @Execute($stTot) or die(http(__line__));	
				$row = @FetchRecords($query);
				$result = $row['totRecordSubmissions']; 
			
		return 	$result;
	}
	function form4TotSubmissions($myQuery){
		$stTot = "SELECT count(*) as totRecordSubmissions FROM `tbl_form4_traders` where `display`='Yes'";
				$query = @Execute($stTot) or die(http(__line__));	
				$row = @FetchRecords($query);
				$result = $row['totRecordSubmissions']; 
			
		return 	$result;
	}


}//end of class ValidationManager();


?>