<?php
class umemsDataMining{
	var $LevelOneSubIndicatorID;
	var $Query;

function umemsDataMining($LevelOneSubIndicatorID){
		$this->LevelOneSubIndicatorID;
	}
							
	function umemsMiningIndicator($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	 
		switch($LevelOneSubIndicatorID){
			case 1: 
			$x=umemsDataMining::grossMarginPerUnitOfLandUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 2: 
			$x=umemsDataMining::grossMarginPerUnitOfLandUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 3: 
			$x=umemsDataMining::valueOfIncrementalSalesUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 4: 
			$x=umemsDataMining::valueOfIncrementalSalesUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 5: 
			$x=umemsDataMining::valueOfIncrementalSalesUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 6: 
			$x=umemsDataMining::appliedTechnologiesManagementPracticeUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 7: 
			$x=umemsDataMining::appliedTechnologiesManagementPracticeUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 8: 
			$x=umemsDataMining::numFarmersFoodsecurityPrivateEnterprisesUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 9: 
			$x=umemsDataMining::numFarmersFoodsecurityPrivateEnterprisesUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 10: 
			$x=umemsDataMining::numProducerOrgsUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 11: 
			$x=umemsDataMining::numProducerOrgsUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 12: 
			$x=umemsDataMining::numFarmersUmemsPE($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 13: 
			$x=umemsDataMining::numFarmersUmemsPO($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 14: 
			$x=umemsDataMining::numFarmersUmemsWA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 15: 
			$x=umemsDataMining::numFarmersUmemsTBA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 16: 
			$x=umemsDataMining::numFarmersUmemsCBO($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 17: 
			$x=umemsDataMining::numFarmersUmemsWG($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 18: 
			$x=umemsDataMining::hectaresTechnologiesManagementPracticeUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 19: 
			$x=umemsDataMining::hectaresTechnologiesManagementPracticeUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 20: 
			$x=umemsDataMining::hectaresTechnologiesManagementPracticeUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 21: 
			$x=umemsDataMining::laborSavingTechUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 22: 
			$x=umemsDataMining::laborSavingTechUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 23: 
			$x=umemsDataMining::laborSavingTechUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 24: 
			$x=umemsDataMining::PositiveBenefitsFromInputsUmemsGender($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 25: 
			$x=umemsDataMining::PositiveBenefitsFromInputsUmemsCommodity($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 26: 
			$x=umemsDataMining::PositiveBenefitsFromInputsUmemsAgeGroup($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 27: 
			$x=umemsDataMining::PurchasingInputFromVAsUmemsGender($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 28: 
			$x=umemsDataMining::PurchasingInputFromVAsUmemsCommodity($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 29: 
			$x=umemsDataMining::PurchasingInputFromVAsUmemsAgeGroup($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 30: 
			$x=umemsDataMining::YouthApprenticeshipsUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 31: 
			$x=umemsDataMining::YouthApprenticeshipsUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 32: 
			$x=umemsDataMining::ruralHouseholdsBenefitingUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 33: 
			$x=umemsDataMining::ruralHouseholdsBenefitingUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 34: 
			$x=umemsDataMining::jobsAttributedToFtFImplementationUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 35: 
			$x=umemsDataMining::jobsAttributedToFtFImplementationUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 36: 
			$x=umemsDataMining::ValueofAgriculturalRuralLoansUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 37: 
			$x=umemsDataMining::ValueofAgriculturalRuralLoansUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 38: 
			$x=umemsDataMining::ValueofAgriculturalRuralLoansUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 39: 
			$x=umemsDataMining::ValueofAgriculturalRuralLoansUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 40: 
			$x=umemsDataMining::ValueofAgriculturalRuralLoansUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 41: 
			$x=umemsDataMining::SMEsRecievingAssistanceToLoansUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 42: 
			$x=umemsDataMining::SMEsRecievingAssistanceToLoansUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 43: 
			$x=umemsDataMining::SMEsRecievingAssistanceToLoansUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 44: 
			$x=umemsDataMining::SMEsRecievingAssistanceToLoansUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 45: 
			$x=umemsDataMining::SMEsRecievingAssistanceToLoansUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 46: 
			$x=umemsDataMining::VolumeofExportsTradersExportsUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 47: 
			$x=umemsDataMining::VolumeofExportsTradersExportsUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 48: 
			$x=umemsDataMining::VolumeofExportsTradersExportsUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			
			case 49: 
			$x=umemsDataMining::NumMSMEsIncludingFarmersBDSUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 50: 
			$x=umemsDataMining::NumMSMEsIncludingFarmersBDSUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 51: 
			$x=umemsDataMining::NumMSMEsIncludingFarmersBDSUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 52: 
			$x=umemsDataMining::NumMSMEsIncludingFarmersBDSUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 53: 
			$x=umemsDataMining::NumMSMEsIncludingFarmersBDSUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 54: 
			$x=umemsDataMining::reductionInpostHarvestLossesUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 55: 
			$x=umemsDataMining::reductionInpostHarvestLossesUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 56: 
			$x=umemsDataMining::reductionInpostHarvestLossesUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 57: 
			$x=umemsDataMining::StorageCapacityUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 58: 
			$x=umemsDataMining::StorageCapacityUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 59: 
			$x=umemsDataMining::StorageCapacityUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 60: 
			$x=umemsDataMining::AccesstoProductiveERUmemsYouth($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 61: 
			$x=umemsDataMining::AccesstoProductiveERUmemsAdult($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 69: 
			$x=umemsDataMining::numFarmersCountNew($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 70: 
			$x=umemsDataMining::numFarmersCountOld($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 71: 
			$x=umemsDataMining::numFarmersCountMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 72: 
			$x=umemsDataMining::numFarmersCountFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 73: 
			$x=umemsDataMining::newOrContinuingHouseholds($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			
			
			
			
			
			
			

			default:
			break;
		}/* End of Switch  statement */

	}/* End of l3MiningIndicator method */

		
		function grossMarginPerUnitOfLandUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			/* --------Form 6 Total Production (TP)--------------------------- */
				$x="SELECT 1 as level_three_sub_indicatorId,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 1=1
					and `f`.`farmersSex` ='Male'
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$TotProdYr1=$result['TotProdYr1'];
					$TotProdYr2=$result['TotProdYr2'];
					$TotProdYr3=$result['TotProdYr3'];
					$TotProdYr4=$result['TotProdYr4'];
					$TotProdYr5=$result['TotProdYr5'];
					$TotProdYr6=$result['TotProdYr6'];
					
				/* --------Form 6 Value of sales(VS)--------------------------- */
				$x="SELECT 1 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 1=1
					and `f`.`farmersSex` ='Male'
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$VolSalesYr1=convertShillingsToDollars($result['VolSalesYr1']);
					$VolSalesYr2=convertShillingsToDollars($result['VolSalesYr2']);
					$VolSalesYr3=convertShillingsToDollars($result['VolSalesYr3']);
					$VolSalesYr4=convertShillingsToDollars($result['VolSalesYr4']);
					$VolSalesYr5=convertShillingsToDollars($result['VolSalesYr5']);
					$VolSalesYr6=convertShillingsToDollars($result['VolSalesYr6']);
					
				/* --------Form 6 Volume sold(QS)--------------------------- */
				$x="SELECT 1 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 1=1
					and `f`.`farmersSex` ='Male'
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$VolSoldYr1=$result['VolSoldYr1'];
					$VolSoldYr2=$result['VolSoldYr2'];
					$VolSoldYr3=$result['VolSoldYr3'];
					$VolSoldYr4=$result['VolSoldYr4'];
					$VolSoldYr5=$result['VolSoldYr5'];
					$VolSoldYr6=$result['VolSoldYr6'];
					
				/* --------Form 6 Input Cost(IC)--------------------------- */
				$x="SELECT 1 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 1=1
					and `f`.`farmersSex` ='Male'
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$inputCostYr1=convertShillingsToDollars($result['inputCostYr1']);
					$inputCostYr2=convertShillingsToDollars($result['inputCostYr2']);
					$inputCostYr3=convertShillingsToDollars($result['inputCostYr3']);
					$inputCostYr4=convertShillingsToDollars($result['inputCostYr4']);
					$inputCostYr5=convertShillingsToDollars($result['inputCostYr5']);
					$inputCostYr6=convertShillingsToDollars($result['inputCostYr6']);
					
				/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
				$x="SELECT 1 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 1=1
					and `f`.`farmersSex` ='Male'
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$unitProductionYr1=convertAcresToHectares($result['unitProductionYr1']);
					$unitProductionYr2=convertAcresToHectares($result['unitProductionYr2']);
					$unitProductionYr3=convertAcresToHectares($result['unitProductionYr3']);
					$unitProductionYr4=convertAcresToHectares($result['unitProductionYr4']);
					$unitProductionYr5=convertAcresToHectares($result['unitProductionYr5']);
					$unitProductionYr6=convertAcresToHectares($result['unitProductionYr6']);
					
					/* Calculating Gross Margin Per Unit of land  based on the following formula:
					(((TP*(VS/QS))-IC)/UP)*ExtrapolationFactor	 */

					$st=ExtrapolationFactor(2.1);
					$query=@Execute($st) or die(http("ActivityDataMiningClass-372"));
					$result=FetchRecords($query);
					$extrapolationFactorYr1=$result['exFactorYr1'];
					$extrapolationFactorYr2=$result['exFactorYr2'];
					$extrapolationFactorYr3=$result['exFactorYr3'];
					$extrapolationFactorYr4=$result['exFactorYr4'];
					$extrapolationFactorYr5=$result['exFactorYr5'];
					$extrapolationFactorYr6=$result['exFactorYr6'];

					$GrossMarginPerUnitOfLandYr1=GrossMarginPerUnitOfLandRecomputed($TotProdYr1,$VolSalesYr1,$VolSoldYr1,$inputCostYr1,$unitProductionYr1,$extrapolationFactorYr1);
					$GrossMarginPerUnitOfLandYr2=GrossMarginPerUnitOfLandRecomputed($TotProdYr2,$VolSalesYr2,$VolSoldYr2,$inputCostYr2,$unitProductionYr2,$extrapolationFactorYr2);
					$GrossMarginPerUnitOfLandYr3=GrossMarginPerUnitOfLandRecomputed($TotProdYr3,$VolSalesYr3,$VolSoldYr3,$inputCostYr3,$unitProductionYr3,$extrapolationFactorYr3);
					$GrossMarginPerUnitOfLandYr4=GrossMarginPerUnitOfLandRecomputed($TotProdYr4,$VolSalesYr4,$VolSoldYr4,$inputCostYr4,$unitProductionYr4,$extrapolationFactorYr4);
					$GrossMarginPerUnitOfLandYr5=GrossMarginPerUnitOfLandRecomputed($TotProdYr5,$VolSalesYr5,$VolSoldYr5,$inputCostYr5,$unitProductionYr5,$extrapolationFactorYr5);
					$GrossMarginPerUnitOfLandYr6=GrossMarginPerUnitOfLandRecomputed($TotProdYr6,$VolSalesYr6,$VolSoldYr6,$inputCostYr6,$unitProductionYr6,$extrapolationFactorYr6);
					
					//sanitise the gross margin
					
					$GrossMarginPerUnitOfLandYr1 = ($GrossMarginPerUnitOfLandYr1 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr1)* -1):$GrossMarginPerUnitOfLandYr1;
					$GrossMarginPerUnitOfLandYr2 = ($GrossMarginPerUnitOfLandYr2 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr2)* -1):$GrossMarginPerUnitOfLandYr2;
					$GrossMarginPerUnitOfLandYr3 = ($GrossMarginPerUnitOfLandYr3 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr3)* -1):$GrossMarginPerUnitOfLandYr3;
					$GrossMarginPerUnitOfLandYr4 = ($GrossMarginPerUnitOfLandYr4 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr4)* -1):$GrossMarginPerUnitOfLandYr4;
					$GrossMarginPerUnitOfLandYr5 = ($GrossMarginPerUnitOfLandYr5 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr5)* -1):$GrossMarginPerUnitOfLandYr5;
					$GrossMarginPerUnitOfLandYr6 = ($GrossMarginPerUnitOfLandYr6 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr5)* -1):$GrossMarginPerUnitOfLandYr5;
					
					
					$result['notrainedYr1'] = $GrossMarginPerUnitOfLandYr1;
					$result['notrainedYr2'] = $GrossMarginPerUnitOfLandYr2;
					$result['notrainedYr3'] = $GrossMarginPerUnitOfLandYr3;
					$result['notrainedYr4'] = $GrossMarginPerUnitOfLandYr4;
					$result['notrainedYr5'] = $GrossMarginPerUnitOfLandYr5;
					$result['notrainedYr6'] = $GrossMarginPerUnitOfLandYr6;
					return $result[$resultValue];
			}          
		function grossMarginPerUnitOfLandUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			/* --------Form 6 Total Production (TP)--------------------------- */
			$x="SELECT 2 as level_three_sub_indicatorId,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 2=2
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$TotProdYr1=$result['TotProdYr1'];
				$TotProdYr2=$result['TotProdYr2'];
				$TotProdYr3=$result['TotProdYr3'];
				$TotProdYr4=$result['TotProdYr4'];
				$TotProdYr5=$result['TotProdYr5'];
				$TotProdYr6=$result['TotProdYr6'];
				
			/* --------Form 6 Value of sales(VS)--------------------------- */
			$x="SELECT 1 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 1=1
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$VolSalesYr1=convertShillingsToDollars($result['VolSalesYr1']);
				$VolSalesYr2=convertShillingsToDollars($result['VolSalesYr2']);
				$VolSalesYr3=convertShillingsToDollars($result['VolSalesYr3']);
				$VolSalesYr4=convertShillingsToDollars($result['VolSalesYr4']);
				$VolSalesYr5=convertShillingsToDollars($result['VolSalesYr5']);
				$VolSalesYr6=convertShillingsToDollars($result['VolSalesYr6']);
				
			/* --------Form 6 Volume sold(QS)--------------------------- */
			$x="SELECT 1 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 1=1
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$VolSoldYr1=$result['VolSoldYr1'];
				$VolSoldYr2=$result['VolSoldYr2'];
				$VolSoldYr3=$result['VolSoldYr3'];
				$VolSoldYr4=$result['VolSoldYr4'];
				$VolSoldYr5=$result['VolSoldYr5'];
				$VolSoldYr6=$result['VolSoldYr6'];
				
			/* --------Form 6 Input Cost(IC)--------------------------- */
			$x="SELECT 1 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 1=1
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$inputCostYr1=convertShillingsToDollars($result['inputCostYr1']);
				$inputCostYr2=convertShillingsToDollars($result['inputCostYr2']);
				$inputCostYr3=convertShillingsToDollars($result['inputCostYr3']);
				$inputCostYr4=convertShillingsToDollars($result['inputCostYr4']);
				$inputCostYr5=convertShillingsToDollars($result['inputCostYr5']);
				$inputCostYr6=convertShillingsToDollars($result['inputCostYr6']);
				
			/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
			$x="SELECT 1 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 1=1
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$unitProductionYr1=convertAcresToHectares($result['unitProductionYr1']);
				$unitProductionYr2=convertAcresToHectares($result['unitProductionYr2']);
				$unitProductionYr3=convertAcresToHectares($result['unitProductionYr3']);
				$unitProductionYr4=convertAcresToHectares($result['unitProductionYr4']);
				$unitProductionYr5=convertAcresToHectares($result['unitProductionYr5']);
				$unitProductionYr6=convertAcresToHectares($result['unitProductionYr6']);
				
				/* Calculating Gross Margin Per Unit of land  based on the following formula:
				(((TP*(VS/QS))-IC)/UP)*ExtrapolationFactor	 */

				$st=ExtrapolationFactor(2.1);
				$query=@Execute($st) or die(http("ActivityDataMiningClass-372"));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				$GrossMarginPerUnitOfLandYr1=GrossMarginPerUnitOfLandRecomputed($TotProdYr1,$VolSalesYr1,$VolSoldYr1,$inputCostYr1,$unitProductionYr1,$extrapolationFactorYr1);
				$GrossMarginPerUnitOfLandYr2=GrossMarginPerUnitOfLandRecomputed($TotProdYr2,$VolSalesYr2,$VolSoldYr2,$inputCostYr2,$unitProductionYr2,$extrapolationFactorYr2);
				$GrossMarginPerUnitOfLandYr3=GrossMarginPerUnitOfLandRecomputed($TotProdYr3,$VolSalesYr3,$VolSoldYr3,$inputCostYr3,$unitProductionYr3,$extrapolationFactorYr3);
				$GrossMarginPerUnitOfLandYr4=GrossMarginPerUnitOfLandRecomputed($TotProdYr4,$VolSalesYr4,$VolSoldYr4,$inputCostYr4,$unitProductionYr4,$extrapolationFactorYr4);
				$GrossMarginPerUnitOfLandYr5=GrossMarginPerUnitOfLandRecomputed($TotProdYr5,$VolSalesYr5,$VolSoldYr5,$inputCostYr5,$unitProductionYr5,$extrapolationFactorYr5);
				$GrossMarginPerUnitOfLandYr6=GrossMarginPerUnitOfLandRecomputed($TotProdYr6,$VolSalesYr6,$VolSoldYr6,$inputCostYr6,$unitProductionYr6,$extrapolationFactorYr6);
				
				
				$GrossMarginPerUnitOfLandYr1 = ($GrossMarginPerUnitOfLandYr1 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr1)* -1):$GrossMarginPerUnitOfLandYr1;
				$GrossMarginPerUnitOfLandYr2 = ($GrossMarginPerUnitOfLandYr2 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr2)* -1):$GrossMarginPerUnitOfLandYr2;
				$GrossMarginPerUnitOfLandYr3 = ($GrossMarginPerUnitOfLandYr3 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr3)* -1):$GrossMarginPerUnitOfLandYr3;
				$GrossMarginPerUnitOfLandYr4 = ($GrossMarginPerUnitOfLandYr4 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr4)* -1):$GrossMarginPerUnitOfLandYr4;
				$GrossMarginPerUnitOfLandYr5 = ($GrossMarginPerUnitOfLandYr5 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr5)* -1):$GrossMarginPerUnitOfLandYr5;
				$GrossMarginPerUnitOfLandYr6 = ($GrossMarginPerUnitOfLandYr6 <= -0.00000000000000000000000001)?(($GrossMarginPerUnitOfLandYr5)* -1):$GrossMarginPerUnitOfLandYr5;
			
				$result['notrainedYr1'] = $GrossMarginPerUnitOfLandYr1;
				$result['notrainedYr2'] = $GrossMarginPerUnitOfLandYr2;
				$result['notrainedYr3'] = $GrossMarginPerUnitOfLandYr3;
				$result['notrainedYr4'] = $GrossMarginPerUnitOfLandYr4;
				$result['notrainedYr5'] = $GrossMarginPerUnitOfLandYr5;
				$result['notrainedYr6'] = $GrossMarginPerUnitOfLandYr6;
				return $result[$resultValue];
		}
		function valueOfIncrementalSalesUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6 Maize---------------------------
			$x="SELECT 3 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
				FROM `tbl_frm6particulars` as `p`
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
				where 3=3
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
				$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
				$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
				$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
				$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
				$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];

				//Include incremental factor...
				$st=ExtrapolationFactor(14);
				$query=@Execute($st) or die(http("Activity DataMining-462"));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				$result['notrainedYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesMaizeYr1));
				$result['notrainedYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesMaizeYr2));
				$result['notrainedYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesMaizeYr3));
				$result['notrainedYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesMaizeYr4));
				$result['notrainedYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesMaizeYr5));
				$result['notrainedYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesMaizeYr6));
				
			return $result[$resultValue];
		}
		function valueOfIncrementalSalesUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//=====================Form 6 Beans==============
			$x2="SELECT 4 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
				FROM `tbl_frm6particulars` as `p`
				join `tbl_frm6production_beans` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
				where 4=4
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
				$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
				$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
				$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
				$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
				$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
				
				//Include incremental factor...
				$st=ExtrapolationFactor(14);
				$query=@Execute($st) or die(http("Activity DataMining-462"));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				$result['notrainedYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesBeansYr1));
				$result['notrainedYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesBeansYr2));
				$result['notrainedYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesBeansYr3));
				$result['notrainedYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesBeansYr4));
				$result['notrainedYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesBeansYr5));
				$result['notrainedYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesBeansYr6));
				
			return $result[$resultValue];
		}
		function valueOfIncrementalSalesUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//=====================Form 6 Coffee==============
			$x3="SELECT 5 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
				FROM `tbl_frm6particulars` as `p`
				join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
				where 5=5
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x3) or die(http(__line__));
				$result=FetchRecords($query);
				$incrementalSalesCoffeeYr1=$result['incrementalSalesCoffeeYr1'];
				$incrementalSalesCoffeeYr2=$result['incrementalSalesCoffeeYr2'];
				$incrementalSalesCoffeeYr3=$result['incrementalSalesCoffeeYr3'];
				$incrementalSalesCoffeeYr4=$result['incrementalSalesCoffeeYr4'];
				$incrementalSalesCoffeeYr5=$result['incrementalSalesCoffeeYr5'];
				$incrementalSalesCoffeeYr6=$result['incrementalSalesCoffeeYr6'];
				
				//Include incremental factor...
				$st=ExtrapolationFactor(14);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				$result['notrainedYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesCoffeeYr1));
				$result['notrainedYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesCoffeeYr2));
				$result['notrainedYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesCoffeeYr3));
				$result['notrainedYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesCoffeeYr4));
				$result['notrainedYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesCoffeeYr5));
				$result['notrainedYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesCoffeeYr6));
				
			return $result[$resultValue];
		}
		function appliedTechnologiesManagementPracticeUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6---------------------------
			$x="SELECT 6 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' 
				and  (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 6=6
				and `f`.`farmersSex` = 'Male'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$num1FarmersFrm6Yr1=$result['numFarmersFrm6Yr1'];
				$num1FarmersFrm6Yr2=$result['numFarmersFrm6Yr2'];
				$num1FarmersFrm6Yr3=$result['numFarmersFrm6Yr3'];
				$num1FarmersFrm6Yr4=$result['numFarmersFrm6Yr4'];
				$num1FarmersFrm6Yr5=$result['numFarmersFrm6Yr5'];
				$num1FarmersFrm6Yr6=$result['numFarmersFrm6Yr6'];


				$st=ExtrapolationFactor(6);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				//Applying extrapolation factor
				$numFarmersFrm6Yr1=($extrapolationFactorYr1*$num1FarmersFrm6Yr1);
				$numFarmersFrm6Yr2=($extrapolationFactorYr2*$num1FarmersFrm6Yr2);
				$numFarmersFrm6Yr3=($extrapolationFactorYr3*$num1FarmersFrm6Yr3);
				$numFarmersFrm6Yr4=($extrapolationFactorYr4*$num1FarmersFrm6Yr4);
				$numFarmersFrm6Yr5=($extrapolationFactorYr5*$num1FarmersFrm6Yr5);
				$numFarmersFrm6Yr6=($extrapolationFactorYr6*$num1FarmersFrm6Yr6);
				
				//=====================form2==============
				$x2="SELECT 6 as indicator_id,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr1,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr2,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr3,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr4,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr5,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr6
				FROM `tbl_techadoption` as `t`
				join tbl_traders as tr  on (`tr`.`tbl_tradersId` = `t`.`businessTraderName`)
				where 6=6
				and `tr`.`traderSex` = 'Male'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
				$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
				$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
				$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
				$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
				$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm2Yr1+$numFarmersFrm6Yr1;
				$result['notrainedYr2']=$numFarmersFrm2Yr2+$numFarmersFrm6Yr2;
				$result['notrainedYr3']=$numFarmersFrm2Yr3+$numFarmersFrm6Yr3;
				$result['notrainedYr4']=$numFarmersFrm2Yr4+$numFarmersFrm6Yr4;
				$result['notrainedYr5']=$numFarmersFrm2Yr5+$numFarmersFrm6Yr5;
				$result['notrainedYr6']=$numFarmersFrm2Yr6+$numFarmersFrm6Yr6;
			return $result[$resultValue];
		}
		function appliedTechnologiesManagementPracticeUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6---------------------------
			$x="SELECT 7 as indicator_id,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' 
				and  (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr1,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr2,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr3,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr4,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr5,
				sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' 
				and (
				`m`.`maize_improved_seeds` ='1' or 
				`m`.`maize_fetilizer_use` = '1' or
				`m`.`maize_chemical_use` = '1' or
				`m`.`maize_mgt_practices` = '1' or
				`m`.`maize_machinery_use` = '1' or
				`b`.`beans_improved_seeds` ='1' or 
				`b`.`beans_fetilizer_use` = '1' or
				`b`.`beans_chemical_use` = '1' or
				`b`.`beans_mgt_practices` = '1' or
				`b`.`beans_machinery_use` = '1' or
				`c`.`coffee_improved_seeds` ='1' or 
				`c`.`coffee_fetilizer_use` = '1' or
				`c`.`coffee_chemical_use` = '1' or
				`c`.`coffee_mgt_practices` = '1' or
				`c`.`coffee_machinery_use` = '1' 
				), 1, 0 ) ) AS numFarmersFrm6Yr6
				from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
				join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
				join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
				join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
				where 7=7
				and `f`.`farmersSex` = 'Female'
				and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$num1FarmersFrm6Yr1=$result['numFarmersFrm6Yr1'];
				$num1FarmersFrm6Yr2=$result['numFarmersFrm6Yr2'];
				$num1FarmersFrm6Yr3=$result['numFarmersFrm6Yr3'];
				$num1FarmersFrm6Yr4=$result['numFarmersFrm6Yr4'];
				$num1FarmersFrm6Yr5=$result['numFarmersFrm6Yr5'];
				$num1FarmersFrm6Yr6=$result['numFarmersFrm6Yr6'];


				$st=ExtrapolationFactor(6);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				//Applying extrapolation factor
				$numFarmersFrm6Yr1=($extrapolationFactorYr1*$num1FarmersFrm6Yr1);
				$numFarmersFrm6Yr2=($extrapolationFactorYr2*$num1FarmersFrm6Yr2);
				$numFarmersFrm6Yr3=($extrapolationFactorYr3*$num1FarmersFrm6Yr3);
				$numFarmersFrm6Yr4=($extrapolationFactorYr4*$num1FarmersFrm6Yr4);
				$numFarmersFrm6Yr5=($extrapolationFactorYr5*$num1FarmersFrm6Yr5);
				$numFarmersFrm6Yr6=($extrapolationFactorYr6*$num1FarmersFrm6Yr6);
				
				//=====================form2==============
				$x2="SELECT 7 as indicator_id,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr1,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr2,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr3,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr4,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr5,
				sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr6
				FROM `tbl_techadoption` as `t`
				join tbl_traders as tr  on (`tr`.`tbl_tradersId` = `t`.`businessTraderName`)
				where 7=7
				and `tr`.`traderSex` = 'Female'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
				$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
				$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
				$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
				$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
				$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm2Yr1+$numFarmersFrm6Yr1;
				$result['notrainedYr2']=$numFarmersFrm2Yr2+$numFarmersFrm6Yr2;
				$result['notrainedYr3']=$numFarmersFrm2Yr3+$numFarmersFrm6Yr3;
				$result['notrainedYr4']=$numFarmersFrm2Yr4+$numFarmersFrm6Yr4;
				$result['notrainedYr5']=$numFarmersFrm2Yr5+$numFarmersFrm6Yr5;
				$result['notrainedYr6']=$numFarmersFrm2Yr6+$numFarmersFrm6Yr6;
			return $result[$resultValue];
		}
		function numFarmersFoodsecurityPrivateEnterprisesUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
			$x="SELECT 8 as indicator_id,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm2Yr1,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm2Yr2,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm2Yr3,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm2Yr4,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm2Yr5,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm2Yr6
				FROM `tbl_techadoption` as `ta`
				join tbl_traders as tr  on (`tr`.`tbl_tradersId` = `ta`.`businessTraderName`)
				where 8=8
				and `tr`.`traderSex` = 'Male'";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
				$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
				$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
				$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
				$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
				$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
				
				//=====================form7==============
				$x2="SELECT 8 as indicator_id,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
				FROM tbl_villageagent_groups as `v`
				where 8=8
				and `v`.`groupName`<>''
				and `v`.`groupName` <>'No Group'
				and `v`.`numMembersMale` > `v`.`numMembersFemale`";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
				$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
				$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
				$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
				$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
				$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function numFarmersFoodsecurityPrivateEnterprisesUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
			$x="SELECT 9 as indicator_id,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm2Yr1,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm2Yr2,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm2Yr3,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm2Yr4,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm2Yr5,
				sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm2Yr6
				FROM `tbl_techadoption` as `ta`
				join tbl_traders as tr  on (`tr`.`tbl_tradersId` = `ta`.`businessTraderName`)
				where 9=9
				and `tr`.`traderSex` = 'Female'";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
				$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
				$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
				$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
				$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
				$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
				
				//=====================form7==============
				$x2="SELECT 9 as indicator_id,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
				FROM tbl_villageagent_groups as `v`
				where 9=9
				and `v`.`groupName`<>''
				and `v`.`groupName` <>'No Group'
				and `v`.`numMembersFemale` > `v`.`numMembersMale`";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
				$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
				$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
				$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
				$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
				$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function numProducerOrgsUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//=====================form7==============
				$x2="SELECT 10 as indicator_id,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
				FROM tbl_villageagent_groups as `v`
				where 10 = 10
				and `v`.`groupName`<>''
				and `v`.`groupName` <>'No Group'
				and `v`.`numMembersMale` > `v`.`numMembersFemale`";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
				$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
				$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
				$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
				$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
				$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6;
			return $result[$resultValue];
		}
		function numProducerOrgsUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//=====================form7==============
				$x2="SELECT 11 as indicator_id,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
				FROM tbl_villageagent_groups as `v`
				where 11 = 11
				and `v`.`groupName`<>''
				and `v`.`groupName` <>'No Group'
				and `v`.`numMembersFemale` > `v`.`numMembersMale`";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
				$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
				$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
				$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
				$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
				$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6;
			return $result[$resultValue];
		}
		function numFarmersUmemsPE($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 12 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 12 = 12
					and ta.`typeOfBusiness` like '%Private enterprises%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
			//=====================form7==============
				$x2="SELECT 12 as level_two_sub_indicatorId,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
				sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
				FROM tbl_villageagent_groups as `v`
				where 12=12
				and `v`.`groupName`<>''
				and `v`.`groupType` like '%Private enterprises%'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
				$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
				$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
				$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
				$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
				$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		} 
		function numFarmersUmemsPO($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 13 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 13 = 13
					and ta.`typeOfBusiness` like 'producer orgs/groups%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
					//=====================form7==============
					$x2="SELECT 13 as level_two_sub_indicatorId,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
					FROM tbl_villageagent_groups as `v`
					where 13 = 13
					and `v`.`groupName`<>''
					and `v`.`groupType` like 'producer orgs/groups%'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
					$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
					$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
					$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
					$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
					$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
					$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
				return $result[$resultValue];
			}
		function numFarmersUmemsWA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 14 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 14 = 14
					and ta.`typeOfBusiness` like 'Water users associations%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
			//=====================form7==============
				$x2="SELECT 14 as level_two_sub_indicatorId,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
					FROM tbl_villageagent_groups as `v`
					where 14 = 14
					and `v`.`groupName`<>''
					and `v`.`groupType` like 'Water users associations%'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function numFarmersUmemsTBA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 15 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 15 = 15
					and ta.`typeOfBusiness` like 'trade and business associations%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
				//=====================form7==============
					$x2="SELECT 15 as level_two_sub_indicatorId,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
						sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
						FROM tbl_villageagent_groups as `v`
						where 15 = 15
						and `v`.`groupName`<>''
						and `v`.`groupType` like 'trade and business associations%'";
						$query=@Execute($x2) or die(http(__line__));
						$result=FetchRecords($query);
						$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
						$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
						$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
						$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
						$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
						$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function numFarmersUmemsCBO($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 16 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 16 = 16
					and ta.`typeOfBusiness` like 'community-based organizations%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
			//=====================form7==============
				$x2="SELECT 16 as level_two_sub_indicatorId,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
					FROM tbl_villageagent_groups as `v`
					where 16=16
					and `v`.`groupName`<>''
					and `v`.`groupType` like 'community-based organizations%'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function numFarmersUmemsWG($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2---------------------------
				$x="SELECT 17 as level_two_sub_indicatorId,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
					sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
					FROM `tbl_techadoption` as `ta`
					where 17 = 17
					and ta.`typeOfBusiness` like 'women\'s groups%'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
					$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
					$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
					$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
					$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
					$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
					
			//=====================form7==============
				$x2="SELECT 17 as level_two_sub_indicatorId,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
					sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
					FROM tbl_villageagent_groups as `v`
					where 17 = 17
					and `v`.`groupName`<>''
					and `v`.`groupType` like 'women\'s groups%'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
				
				
				$result['notrainedYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
				$result['notrainedYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
				$result['notrainedYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
				$result['notrainedYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
				$result['notrainedYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
				$result['notrainedYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
			return $result[$resultValue];
		}
		function hectaresTechnologiesManagementPracticeUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6---------------------------
				$x="SELECT 18 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					)), 0 )) AS numAcresFrm6Yr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					)), 0 )) AS numAcresFrm6Yr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					)), 0 )) AS numAcresFrm6Yr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					)), 0 )) AS numAcresFrm6Yr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					)), 0 )) AS numAcresFrm6Yr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					)), 0 )) AS numAcresFrm6Yr6
					from `tbl_frm6particulars` as `p`
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId` = `p`.`pk_patId`)
					where 18=18
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
					$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
					$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
					$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
					$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
					$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

					$st=ExtrapolationFactor(18);
					$query=@Execute($st) or die(http(__line__));
					$result=FetchRecords($query);
					$extrapolationFactorYr1=$result['exFactorYr1'];
					$extrapolationFactorYr2=$result['exFactorYr2'];
					$extrapolationFactorYr3=$result['exFactorYr3'];
					$extrapolationFactorYr4=$result['exFactorYr4'];
					$extrapolationFactorYr5=$result['exFactorYr5'];
					$extrapolationFactorYr6=$result['exFactorYr6'];

			//applying the extrapolation factor
				$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
				$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
				$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
				$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
				$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
				$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
					
			//=====================form 8(demo book)==============
				$x2="SELECT 18 as indicator_id,
					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					), 0 ) ) AS numAcresFrm8Yr1,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					), 0 ) ) AS numAcresFrm8Yr2,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					), 0 ) ) AS numAcresFrm8Yr3,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					), 0 ) ) AS numAcresFrm8Yr4,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					), 0 ) ) AS numAcresFrm8Yr5,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					), 0 ) ) AS numAcresFrm8Yr6

					FROM `tbl_demo_book_details` as `d`
					JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
					where 18=18
					and `dr` .`farmerCrop` = 'Maize'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
				$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
				$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
				$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
				$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
				$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
				
				
				$result['notrainedYr1']=((convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1))/(1000000));
				$result['notrainedYr2']=((convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2))/(1000000));
				$result['notrainedYr3']=((convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3))/(1000000));
				$result['notrainedYr4']=((convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4))/(1000000));
				$result['notrainedYr5']=((convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5))/(1000000));
				$result['notrainedYr6']=((convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6))/(1000000));
			return $result[$resultValue];
		}
		function hectaresTechnologiesManagementPracticeUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6---------------------------
				$x="SELECT 19 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					)), 0 )) AS numAcresFrm6Yr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					)), 0 )) AS numAcresFrm6Yr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					)), 0 )) AS numAcresFrm6Yr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					)), 0 )) AS numAcresFrm6Yr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					)), 0 )) AS numAcresFrm6Yr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					)), 0 )) AS numAcresFrm6Yr6

					from `tbl_frm6particulars` as `p`
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					where 19=19
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
					$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
					$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
					$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
					$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
					$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

					$st=ExtrapolationFactor(19);
					$query=@Execute($st) or die(http(__line__));
					$result=FetchRecords($query);
					$extrapolationFactorYr1=$result['exFactorYr1'];
					$extrapolationFactorYr2=$result['exFactorYr2'];
					$extrapolationFactorYr3=$result['exFactorYr3'];
					$extrapolationFactorYr4=$result['exFactorYr4'];
					$extrapolationFactorYr5=$result['exFactorYr5'];
					$extrapolationFactorYr6=$result['exFactorYr6'];

			//applying the extrapolation factor
				$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
				$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
				$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
				$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
				$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
				$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
					
			//=====================form 8(demo book)==============
				$x2="SELECT 19 as indicator_id,
					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					), 0 ) ) AS numAcresFrm8Yr1,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					), 0 ) ) AS numAcresFrm8Yr2,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					), 0 ) ) AS numAcresFrm8Yr3,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					), 0 ) ) AS numAcresFrm8Yr4,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					), 0 ) ) AS numAcresFrm8Yr5,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					), 0 ) ) AS numAcresFrm8Yr6

					FROM `tbl_demo_book_details` as `d`
					JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
					where 19=19
					and `dr` .`farmerCrop` = 'Beans'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
				$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
				$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
				$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
				$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
				$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
				
				
				$result['notrainedYr1']=((convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1))/(1000000));
				$result['notrainedYr2']=((convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2))/(1000000));
				$result['notrainedYr3']=((convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3))/(1000000));
				$result['notrainedYr4']=((convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4))/(1000000));
				$result['notrainedYr5']=((convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5))/(1000000));
				$result['notrainedYr6']=((convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6))/(1000000));
			return $result[$resultValue];
		}
		function hectaresTechnologiesManagementPracticeUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6---------------------------
				$x="SELECT 20 as indicator_id,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					)), 0 )) AS numAcresFrm6Yr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					)), 0 )) AS numAcresFrm6Yr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					)), 0 )) AS numAcresFrm6Yr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					)), 0 )) AS numAcresFrm6Yr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					)), 0 )) AS numAcresFrm6Yr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					)), 0 )) AS numAcresFrm6Yr6

					from `tbl_frm6particulars` as `p`
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 20=20
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
					$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
					$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
					$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
					$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
					$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

					$st=ExtrapolationFactor(20);
					$query=@Execute($st) or die(http(__line__));
					$result=FetchRecords($query);
					$extrapolationFactorYr1=$result['exFactorYr1'];
					$extrapolationFactorYr2=$result['exFactorYr2'];
					$extrapolationFactorYr3=$result['exFactorYr3'];
					$extrapolationFactorYr4=$result['exFactorYr4'];
					$extrapolationFactorYr5=$result['exFactorYr5'];
					$extrapolationFactorYr6=$result['exFactorYr6'];

			//applying the extrapolation factor
				$numAcresFrm6Yr1=($numAcres1Frm6Yr1*$extrapolationFactorYr1);
				$numAcresFrm6Yr2=($numAcres1Frm6Yr2*$extrapolationFactorYr2);
				$numAcresFrm6Yr3=($numAcres1Frm6Yr3*$extrapolationFactorYr3);
				$numAcresFrm6Yr4=($numAcres1Frm6Yr4*$extrapolationFactorYr4);
				$numAcresFrm6Yr5=($numAcres1Frm6Yr5*$extrapolationFactorYr5);
				$numAcresFrm6Yr6=($numAcres1Frm6Yr6*$extrapolationFactorYr6);
					
			//=====================form 8(demo book)==============
				$x2="SELECT 20 as indicator_id,
					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' )
					), 0 ) ) AS numAcresFrm8Yr1,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' )
					), 0 ) ) AS numAcresFrm8Yr2,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' )
					), 0 ) ) AS numAcresFrm8Yr3,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' )
					), 0 ) ) AS numAcresFrm8Yr4,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' )
					), 0 ) ) AS numAcresFrm8Yr5,

					sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."',
					(
					(select max(`d`.`sizePlotA`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotB`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotC`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
					(select max(`d`.`sizePlotD`) FROM `tbl_demo_book_details` as `d` JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` ) where `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' )
					), 0 ) ) AS numAcresFrm8Yr6

					FROM `tbl_demo_book_details` as `d`
					JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
					where 20=20
					and `dr` .`farmerCrop` = 'Coffee'";
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
				$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
				$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
				$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
				$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
				$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
				
				
				$result['notrainedYr1']=((convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1))/(1000000));
				$result['notrainedYr2']=((convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2))/(1000000));
				$result['notrainedYr3']=((convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3))/(1000000));
				$result['notrainedYr4']=((convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4))/(1000000));
				$result['notrainedYr5']=((convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5))/(1000000));
				$result['notrainedYr6']=((convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6))/(1000000));
			return $result[$resultValue];
		}
		function laborSavingTechUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2: Labor saving Technologies ---------------------------
				$x="SELECT 21 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr6
					FROM `tbl_laboursavingtech` 
					where 21=21
					and valueChain like '%Maize'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$laborUmemsYr1=$result['laborUmemsYr1'];
					$laborUmemsYr2=$result['laborUmemsYr2'];
					$laborUmemsYr3=$result['laborUmemsYr3'];
					$laborUmemsYr4=$result['laborUmemsYr4'];
					$laborUmemsYr5=$result['laborUmemsYr5'];
					$laborUmemsYr6=$result['laborUmemsYr6'];
				
				
				$result['notrainedYr1'] = $laborUmemsYr1;
				$result['notrainedYr2'] = $laborUmemsYr2;
				$result['notrainedYr3'] = $laborUmemsYr3;
				$result['notrainedYr4'] = $laborUmemsYr4;
				$result['notrainedYr5'] = $laborUmemsYr5;
				$result['notrainedYr6'] = $laborUmemsYr6;
			return $result[$resultValue];
		}
		function laborSavingTechUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2: Labor saving Technologies ---------------------------
				$x="SELECT 22 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr6
					FROM `tbl_laboursavingtech` 
					where 22=22
					and valueChain like '%Beans'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$laborUmemsYr1=$result['laborUmemsYr1'];
					$laborUmemsYr2=$result['laborUmemsYr2'];
					$laborUmemsYr3=$result['laborUmemsYr3'];
					$laborUmemsYr4=$result['laborUmemsYr4'];
					$laborUmemsYr5=$result['laborUmemsYr5'];
					$laborUmemsYr6=$result['laborUmemsYr6'];
				
				
				$result['notrainedYr1'] = $laborUmemsYr1;
				$result['notrainedYr2'] = $laborUmemsYr2;
				$result['notrainedYr3'] = $laborUmemsYr3;
				$result['notrainedYr4'] = $laborUmemsYr4;
				$result['notrainedYr5'] = $laborUmemsYr5;
				$result['notrainedYr6'] = $laborUmemsYr6;
			return $result[$resultValue];
		}
		function laborSavingTechUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2: Labor saving Technologies ---------------------------
				$x="SELECT 23 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and laboursavingtech<>'', 1, 0 ) ) AS laborUmemsYr6
					FROM `tbl_laboursavingtech` 
					where 23=23
					and valueChain like '%Coffee'";
					$query=@Execute($x) or die(http(__line__));
					$result=FetchRecords($query);
					$laborUmemsYr1=$result['laborUmemsYr1'];
					$laborUmemsYr2=$result['laborUmemsYr2'];
					$laborUmemsYr3=$result['laborUmemsYr3'];
					$laborUmemsYr4=$result['laborUmemsYr4'];
					$laborUmemsYr5=$result['laborUmemsYr5'];
					$laborUmemsYr6=$result['laborUmemsYr6'];
				
				
				$result['notrainedYr1'] = $laborUmemsYr1;
				$result['notrainedYr2'] = $laborUmemsYr2;
				$result['notrainedYr3'] = $laborUmemsYr3;
				$result['notrainedYr4'] = $laborUmemsYr4;
				$result['notrainedYr5'] = $laborUmemsYr5;
				$result['notrainedYr6'] = $laborUmemsYr6;
			return $result[$resultValue];
		}
		function PositiveBenefitsFromInputsUmemsGender($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 24 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 24=24
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$PositiveBenefitYr1=$result['PositiveBenefitYr1'];
				$PositiveBenefitYr2=$result['PositiveBenefitYr2'];
				$PositiveBenefitYr3=$result['PositiveBenefitYr3'];
				$PositiveBenefitYr4=$result['PositiveBenefitYr4'];
				$PositiveBenefitYr5=$result['PositiveBenefitYr5'];
				$PositiveBenefitYr6=$result['PositiveBenefitYr6'];

			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 24 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 24=24
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(24);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($PositiveBenefitYr1*$extrapolationFactorYr1),$TotNumFarmersSurveyedYr1);
				$result['notrainedYr2']=convertToPercentages(($PositiveBenefitYr2*$extrapolationFactorYr2),$TotNumFarmersSurveyedYr2);
				$result['notrainedYr3']=convertToPercentages(($PositiveBenefitYr3*$extrapolationFactorYr3),$TotNumFarmersSurveyedYr3);
				$result['notrainedYr4']=convertToPercentages(($PositiveBenefitYr4*$extrapolationFactorYr4),$TotNumFarmersSurveyedYr4);
				$result['notrainedYr5']=convertToPercentages(($PositiveBenefitYr5*$extrapolationFactorYr5),$TotNumFarmersSurveyedYr5);
				$result['notrainedYr6']=convertToPercentages(($PositiveBenefitYr6*$extrapolationFactorYr6),$TotNumFarmersSurveyedYr6);
			return $result[$resultValue];
		}
		function PositiveBenefitsFromInputsUmemsCommodity($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 25 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 25=25
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$PositiveBenefitYr1=$result['PositiveBenefitYr1'];
				$PositiveBenefitYr2=$result['PositiveBenefitYr2'];
				$PositiveBenefitYr3=$result['PositiveBenefitYr3'];
				$PositiveBenefitYr4=$result['PositiveBenefitYr4'];
				$PositiveBenefitYr5=$result['PositiveBenefitYr5'];
				$PositiveBenefitYr6=$result['PositiveBenefitYr6'];

			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 25 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 25=25
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(25);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($PositiveBenefitYr1*$extrapolationFactorYr1),$TotNumFarmersSurveyedYr1);
				$result['notrainedYr2']=convertToPercentages(($PositiveBenefitYr2*$extrapolationFactorYr2),$TotNumFarmersSurveyedYr2);
				$result['notrainedYr3']=convertToPercentages(($PositiveBenefitYr3*$extrapolationFactorYr3),$TotNumFarmersSurveyedYr3);
				$result['notrainedYr4']=convertToPercentages(($PositiveBenefitYr4*$extrapolationFactorYr4),$TotNumFarmersSurveyedYr4);
				$result['notrainedYr5']=convertToPercentages(($PositiveBenefitYr5*$extrapolationFactorYr5),$TotNumFarmersSurveyedYr5);
				$result['notrainedYr6']=convertToPercentages(($PositiveBenefitYr6*$extrapolationFactorYr6),$TotNumFarmersSurveyedYr6);
			return $result[$resultValue];
		}
		function PositiveBenefitsFromInputsUmemsAgeGroup($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 26 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ||

					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ||

					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' )

					), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 26=26
					and `f`.`farmersDob` is not null
					and `f`.`farmersDob` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$PositiveBenefitYr1=$result['PositiveBenefitYr1'];
				$PositiveBenefitYr2=$result['PositiveBenefitYr2'];
				$PositiveBenefitYr3=$result['PositiveBenefitYr3'];
				$PositiveBenefitYr4=$result['PositiveBenefitYr4'];
				$PositiveBenefitYr5=$result['PositiveBenefitYr5'];
				$PositiveBenefitYr6=$result['PositiveBenefitYr6'];

			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 26 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 26=26
					and `f`.`farmersDob` is not null
					and `f`.`farmersDob` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(26);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($PositiveBenefitYr1*$extrapolationFactorYr1),$TotNumFarmersSurveyedYr1);
				$result['notrainedYr2']=convertToPercentages(($PositiveBenefitYr2*$extrapolationFactorYr2),$TotNumFarmersSurveyedYr2);
				$result['notrainedYr3']=convertToPercentages(($PositiveBenefitYr3*$extrapolationFactorYr3),$TotNumFarmersSurveyedYr3);
				$result['notrainedYr4']=convertToPercentages(($PositiveBenefitYr4*$extrapolationFactorYr4),$TotNumFarmersSurveyedYr4);
				$result['notrainedYr5']=convertToPercentages(($PositiveBenefitYr5*$extrapolationFactorYr5),$TotNumFarmersSurveyedYr5);
				$result['notrainedYr6']=convertToPercentages(($PositiveBenefitYr6*$extrapolationFactorYr6),$TotNumFarmersSurveyedYr6);
			return $result[$resultValue];
		}
		function PurchasingInputFromVAsUmemsGender($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 27 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 27 = 27
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$purchasingInputsYr1=$result['purchasingInputsYr1'];
				$purchasingInputsYr2=$result['purchasingInputsYr2'];
				$purchasingInputsYr3=$result['purchasingInputsYr3'];
				$purchasingInputsYr4=$result['purchasingInputsYr4'];
				$purchasingInputsYr5=$result['purchasingInputsYr5'];
				$purchasingInputsYr6=$result['purchasingInputsYr6'];
				
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 27 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 27=27
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(27);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($purchasingInputsYr1 * $extrapolationFactorYr1), ($TotNumFarmersSurveyedYr1 * $extrapolationFactorYr1));
				$result['notrainedYr2']=convertToPercentages(($purchasingInputsYr2 * $extrapolationFactorYr2), ($TotNumFarmersSurveyedYr2 * $extrapolationFactorYr2));
				$result['notrainedYr3']=convertToPercentages(($purchasingInputsYr3 * $extrapolationFactorYr3), ($TotNumFarmersSurveyedYr3 * $extrapolationFactorYr3));
				$result['notrainedYr4']=convertToPercentages(($purchasingInputsYr4 * $extrapolationFactorYr4), ($TotNumFarmersSurveyedYr4 * $extrapolationFactorYr4));
				$result['notrainedYr5']=convertToPercentages(($purchasingInputsYr5 * $extrapolationFactorYr5), ($TotNumFarmersSurveyedYr5 * $extrapolationFactorYr5));
				$result['notrainedYr6']=convertToPercentages(($purchasingInputsYr6 * $extrapolationFactorYr6), ($TotNumFarmersSurveyedYr6 * $extrapolationFactorYr6));
			return $result[$resultValue];
		}
		function PurchasingInputFromVAsUmemsCommodity($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 28 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 28 = 28
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$purchasingInputsYr1=$result['purchasingInputsYr1'];
				$purchasingInputsYr2=$result['purchasingInputsYr2'];
				$purchasingInputsYr3=$result['purchasingInputsYr3'];
				$purchasingInputsYr4=$result['purchasingInputsYr4'];
				$purchasingInputsYr5=$result['purchasingInputsYr5'];
				$purchasingInputsYr6=$result['purchasingInputsYr6'];
				
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 28 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 28=28
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(28);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($purchasingInputsYr1 * $extrapolationFactorYr1), ($TotNumFarmersSurveyedYr1 * $extrapolationFactorYr1));
				$result['notrainedYr2']=convertToPercentages(($purchasingInputsYr2 * $extrapolationFactorYr2), ($TotNumFarmersSurveyedYr2 * $extrapolationFactorYr2));
				$result['notrainedYr3']=convertToPercentages(($purchasingInputsYr3 * $extrapolationFactorYr3), ($TotNumFarmersSurveyedYr3 * $extrapolationFactorYr3));
				$result['notrainedYr4']=convertToPercentages(($purchasingInputsYr4 * $extrapolationFactorYr4), ($TotNumFarmersSurveyedYr4 * $extrapolationFactorYr4));
				$result['notrainedYr5']=convertToPercentages(($purchasingInputsYr5 * $extrapolationFactorYr5), ($TotNumFarmersSurveyedYr5 * $extrapolationFactorYr5));
				$result['notrainedYr6']=convertToPercentages(($purchasingInputsYr6 * $extrapolationFactorYr6), ($TotNumFarmersSurveyedYr6 * $extrapolationFactorYr6));
			return $result[$resultValue];
		}
		function PurchasingInputFromVAsUmemsAgeGroup($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 28 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' and
					(
					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%1%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%1%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%1%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%1%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%1%' ) ||


					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%2%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%2%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%2%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%2%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%2%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%3%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%3%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%3%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%3%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%3%' ) ||

					(`m`.`maize_seed_supplier`<>'' && `m`.`maize_seed_supplier` like '%4%' ) ||
					(`m`.`maize_fertilizer_supplier` <>'' && `m`.`maize_fertilizer_supplier` like '%4%' ) ||
					(`m`.`maize_chemical_supplier` <>'' && `m`.`maize_chemical_supplier` like '%4%' ) ||
					(`m`.`maize_ict_supplier` <>'' && `m`.`maize_ict_supplier` like '%4%' ) ||
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%1%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%1%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%1%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%1%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%1%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%2%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%2%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%2%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%2%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%2%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%3%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%3%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%3%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%3%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%3%' ) ||

					(`b`.`beans_seed_supplier`<>'' && `b`.`beans_seed_supplier` like '%4%' ) ||
					(`b`.`beans_fertilizer_supplier` <>'' && `b`.`beans_fertilizer_supplier` like '%4%' ) ||
					(`b`.`beans_chemical_supplier` <>'' && `b`.`beans_chemical_supplier` like '%4%' ) ||
					(`b`.`beans_ict_supplier` <>'' && `b`.`beans_ict_supplier` like '%4%' ) ||
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%1%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%1%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%1%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%1%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%1%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%2%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%2%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%2%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%2%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%2%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%3%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%3%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%3%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%3%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%3%' ) ||

					(`c`.`coffee_seed_supplier`<>'' && `c`.`coffee_seed_supplier` like '%4%' ) ||
					(`c`.`coffee_fertilizer_supplier` <>'' && `c`.`coffee_fertilizer_supplier` like '%4%' ) ||
					(`c`.`coffee_chemical_supplier` <>'' && `c`.`coffee_chemical_supplier` like '%4%' ) ||
					(`c`.`coffee_ict_supplier` <>'' && `c`.`coffee_ict_supplier` like '%4%' ) ||
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' )


					), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 28 = 28
					and `f`.`farmersDob` is not null
					and `f`.`farmersDob` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$purchasingInputsYr1=$result['purchasingInputsYr1'];
				$purchasingInputsYr2=$result['purchasingInputsYr2'];
				$purchasingInputsYr3=$result['purchasingInputsYr3'];
				$purchasingInputsYr4=$result['purchasingInputsYr4'];
				$purchasingInputsYr5=$result['purchasingInputsYr5'];
				$purchasingInputsYr6=$result['purchasingInputsYr6'];
				
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 28 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`b`.`fk_patId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`c`.`fk_patId`)
					where 28=28
					and `f`.`farmersDob` is not null
					and `f`.`farmersDob` <> ''
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
				$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
				$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
				$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
				$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
				$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
				

			//Factor in the extrapolation factor
				$st=ExtrapolationFactor(28);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];
				
				$result['notrainedYr1']=convertToPercentages(($purchasingInputsYr1 * $extrapolationFactorYr1), ($TotNumFarmersSurveyedYr1 * $extrapolationFactorYr1));
				$result['notrainedYr2']=convertToPercentages(($purchasingInputsYr2 * $extrapolationFactorYr2), ($TotNumFarmersSurveyedYr2 * $extrapolationFactorYr2));
				$result['notrainedYr3']=convertToPercentages(($purchasingInputsYr3 * $extrapolationFactorYr3), ($TotNumFarmersSurveyedYr3 * $extrapolationFactorYr3));
				$result['notrainedYr4']=convertToPercentages(($purchasingInputsYr4 * $extrapolationFactorYr4), ($TotNumFarmersSurveyedYr4 * $extrapolationFactorYr4));
				$result['notrainedYr5']=convertToPercentages(($purchasingInputsYr5 * $extrapolationFactorYr5), ($TotNumFarmersSurveyedYr5 * $extrapolationFactorYr5));
				$result['notrainedYr6']=convertToPercentages(($purchasingInputsYr6 * $extrapolationFactorYr6), ($TotNumFarmersSurveyedYr6 * $extrapolationFactorYr6));
			return $result[$resultValue];
		}
		function YouthApprenticeshipsUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2 Youth Apprenticiships---------------------------
				$x4="select 30 as LevelOneSubIndicatorID,
					sum( if( `year` = 2013, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr1,
					sum( if( `year` = 2014, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr2,
					sum( if( `year` = 2015, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr3,
					sum( if( `year` = 2016, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr4,
					sum( if( `year` = 2017, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr5,
					sum( if( `year` = 2018, num_youthAttachedMaleNew + num_youthAttachedMaleOld, 0 ) ) AS youthTrainedYr6
					from `tbl_youthapprentice` 
					where 30 = 30
					and num_youthAttachedMaleNew is not null
					and num_youthAttachedMaleOld is not null";
					
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$num_youthAttachedYr1 = $result['youthTrainedYr1'];
				$num_youthAttachedYr2 = $result['youthTrainedYr2'];
				$num_youthAttachedYr3 = $result['youthTrainedYr3'];
				$num_youthAttachedYr4 = $result['youthTrainedYr4'];
				$num_youthAttachedYr5 = $result['youthTrainedYr5'];
				$num_youthAttachedYr6 = $result['youthTrainedYr6'];
				
				$result['notrainedYr1'] = $num_youthAttachedYr1;
				$result['notrainedYr2'] = $num_youthAttachedYr2;
				$result['notrainedYr3'] = $num_youthAttachedYr3;
				$result['notrainedYr4'] = $num_youthAttachedYr4;
				$result['notrainedYr5'] = $num_youthAttachedYr5;
				$result['notrainedYr6'] = $num_youthAttachedYr6;
			return $result[$resultValue];
		}
		function YouthApprenticeshipsUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2 Youth Apprenticiships---------------------------
				$x4="select 31 as LevelOneSubIndicatorID,
					sum( if( `year` = 2013, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr1,
					sum( if( `year` = 2014, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr2,
					sum( if( `year` = 2015, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr3,
					sum( if( `year` = 2016, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr4,
					sum( if( `year` = 2017, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr5,
					sum( if( `year` = 2018, num_youthAttachedFemaleNew + num_youthAttachedFemaleOld, 0 ) ) AS youthTrainedYr6
					from `tbl_youthapprentice` 
					where 31 = 31
					and num_youthAttachedFemaleNew is not null
					and num_youthAttachedFemaleOld is not null";
					
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$num_youthAttachedYr1 = $result['youthTrainedYr1'];
				$num_youthAttachedYr2 = $result['youthTrainedYr2'];
				$num_youthAttachedYr3 = $result['youthTrainedYr3'];
				$num_youthAttachedYr4 = $result['youthTrainedYr4'];
				$num_youthAttachedYr5 = $result['youthTrainedYr5'];
				$num_youthAttachedYr6 = $result['youthTrainedYr6'];
				
				$result['notrainedYr1'] = $num_youthAttachedYr1;
				$result['notrainedYr2'] = $num_youthAttachedYr2;
				$result['notrainedYr3'] = $num_youthAttachedYr3;
				$result['notrainedYr4'] = $num_youthAttachedYr4;
				$result['notrainedYr5'] = $num_youthAttachedYr5;
				$result['notrainedYr6'] = $num_youthAttachedYr6;
			return $result[$resultValue];
		}
		function ruralHouseholdsBenefitingUmemsMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Total Number of Farmers Surveyed---------------------------
				$x="SELECT 32 as LevelOneSubIndicatorID,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr1,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr2,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr3,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr4,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr5,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr6
					from `tbl_farmers` as `f`  
					where 32=32
					and `f`.`hhSex` = 'M'";
					
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);	
				
				
				$numNotNullHHYr1=$result['numNotNullHHYr1'];
				$numNotNullHHYr2=$result['numNotNullHHYr2'];
				$numNotNullHHYr3=$result['numNotNullHHYr3'];
				$numNotNullHHYr4=$result['numNotNullHHYr4'];
				$numNotNullHHYr5=$result['numNotNullHHYr5'];
				$numNotNullHHYr6=$result['numNotNullHHYr6'];
				
				
				$result['notrainedYr1']=$numNotNullHHYr1;
				$result['notrainedYr2']=$numNotNullHHYr2;
				$result['notrainedYr3']=$numNotNullHHYr3;
				$result['notrainedYr4']=$numNotNullHHYr4;
				$result['notrainedYr5']=$numNotNullHHYr5;
				$result['notrainedYr6']=$numNotNullHHYr6;
			return $result[$resultValue];
		}
		function ruralHouseholdsBenefitingUmemsFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Total Number of Farmers Surveyed---------------------------
				$x="SELECT 33 as LevelOneSubIndicatorID,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr1,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr2,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr3,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr4,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr5,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName` is not null, 1, 0 ) ) AS numNotNullHHYr6
					from `tbl_farmers` as `f`  
					where 33=33
					and `f`.`hhSex` = 'F'";
					
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);	
					
				$numNotNullHHYr1=$result['numNotNullHHYr1'];
				$numNotNullHHYr2=$result['numNotNullHHYr2'];
				$numNotNullHHYr3=$result['numNotNullHHYr3'];
				$numNotNullHHYr4=$result['numNotNullHHYr4'];
				$numNotNullHHYr5=$result['numNotNullHHYr5'];
				$numNotNullHHYr6=$result['numNotNullHHYr6'];
				
				
				$result['notrainedYr1']=$numNotNullHHYr1;
				$result['notrainedYr2']=$numNotNullHHYr2;
				$result['notrainedYr3']=$numNotNullHHYr3;
				$result['notrainedYr4']=$numNotNullHHYr4;
				$result['notrainedYr5']=$numNotNullHHYr5;
				$result['notrainedYr6']=$numNotNullHHYr6;
			return $result[$resultValue];
		}
		function jobsAttributedToFtFImplementationUmemsMale($IndicatorID,$opening_year,$closure_year,$resultValue){
			//Enterprise and Tech Adoption
				$x1="SELECT 34 as indicator_id,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
					FROM `tbl_techadoption` as `t` 
					join `tbl_tech_adoption_jobHolder` as `tj` 
					on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
					where 34 = 34
					and `tj`.`sexOfJobHolder` = 'M'";
				
					$query=@Execute($x1) or die(http(__line__));
					$rTechAdoption=FetchRecords($query);
					$jobYr1=$rTechAdoption['noJobs1Yr1'];
					$jobYr2=$rTechAdoption['noJobs1Yr2'];
					$jobYr3=$rTechAdoption['noJobs1Yr3'];
					$jobYr4=$rTechAdoption['noJobs1Yr4'];
					$jobYr5=$rTechAdoption['noJobs1Yr5'];
					$jobYr6=$rTechAdoption['noJobs1Yr6'];
									
			//Labour Saving Technology
				$x2="SELECT 34 as indicator_id,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_laboursavingtech` as `s`
					join `tbl_labourSavingTech_jobHolder` as `sj` 
					on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
					where 34 = 34
					and `sj`.`sexOfJobHolder` = 'M'";
								
				$query=@Execute($x2) or die(http(__line__));
				$rJobsLabourSaving=@FetchRecords($query);
				$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
				$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
				$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
				$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
				$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
				$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
									
			//Media Programs
				$x3="SELECT 34 as indicator_id,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_mediaprograms` as `m`
					join `tbl_mediaProgram_jobHolder` as `mj` 
					on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
					where 34 = 34
					and `mj`.`sexOfJobHolder` = 'M'";
				
					$query=@Execute($x3) or die(http(__line__));
					$rJobsMediaPrograms=@FetchRecords($query);
					$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
					$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
					$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
					$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
					$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
					$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
									
			//Youth Apprentice
				$x4="SELECT 34 as indicator_id,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_youthapprentice` as `y`
					join `tbl_apprenticeship_jobHolder` as `yj` 
					on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
					where 34 = 34
					and `yj`.`sexOfJobHolder` = 'M'";
				
					$query=@Execute($x4) or die(http(__line__));
					$rYouthApprentice=@FetchRecords($query);
					$job4Yr1=$rYouthApprentice['noJobsYr1'];
					$job4Yr2=$rYouthApprentice['noJobsYr2'];
					$job4Yr3=$rYouthApprentice['noJobsYr3'];
					$job4Yr4=$rYouthApprentice['noJobsYr4'];
					$job4Yr5=$rYouthApprentice['noJobsYr5'];
					$job4Yr6=$rYouthApprentice['noJobsYr6'];				
		
		
			//Public private partnership
				$x5="SELECT 34 as indicator_id,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_public_private_partnership` as `p` 
					join `tbl_partnership_jobHolder` as `pj` 
					on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
					where 34 = 34
					and `pj`.`sexOfJobHolder` = 'M'";
				
				$query=@Execute($x5) or die(http(__line__));
				$rPrivatePublic=FetchRecords($query);
				$job5Yr1=$rPrivatePublic['noJobsYr1'];
				$job5Yr2=$rPrivatePublic['noJobsYr2'];
				$job5Yr3=$rPrivatePublic['noJobsYr3'];
				$job5Yr4=$rPrivatePublic['noJobsYr4'];
				$job5Yr5=$rPrivatePublic['noJobsYr5'];
				$job5Yr6=$rPrivatePublic['noJobsYr6'];
				
				
				
			//Bank Loans
				$x6="SELECT 34 as indicator_id,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_bankloans` as `b`
					join `tbl_bank_loans_jobHolder` as `bj` 
					on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
					where 34 = 34
					and `bj`.`sexOfJobHolder` = 'M'";
				
				$query=@Execute($x6) or die(http(__line__));
				$rBankLoans=FetchRecords($query);
				$job6Yr1=$rBankLoans['noJobsYr1'];
				$job6Yr2=$rBankLoans['noJobsYr2'];
				$job6Yr3=$rBankLoans['noJobsYr3'];
				$job6Yr4=$rBankLoans['noJobsYr4'];
				$job6Yr5=$rBankLoans['noJobsYr5'];
				$job6Yr6=$rBankLoans['noJobsYr6'];
									
			//BDS
				$x7="SELECT 34 as indicator_id,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_businessdev` as `bds`
					join `tbl_bds_jobHolder` as `bdsj` 
					on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
					where 34 = 34
					and `bdsj`.`sexOfJobHolder` = 'M'";
								
				$query=@Execute($x7) or die(http(__line__));
				$rBDS=FetchRecords($query);
				$job7Yr1=$rBDS['noJobsYr1'];
				$job7Yr2=$rBDS['noJobsYr2'];
				$job7Yr3=$rBDS['noJobsYr3'];
				$job7Yr4=$rBDS['noJobsYr4'];
				$job7Yr5=$rBDS['noJobsYr5'];
				$job7Yr6=$rBDS['noJobsYr6'];
									
			//Input Sales
				$x8="SELECT 34 as indicator_id,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_input_sales` as `i`
					join `tbl_input_sales_meta_data` as `ij` 
					on `ij`.`input_sales_id`=`i`.`id`
					where 34 = 34
					and `ij`.`sexOfJobHolder` = 'M'";
								
				$query=@Execute($x8) or die(http(__line__));
				$rInputSales=FetchRecords($query);
				$job8Yr1=$rInputSales['noJobsYr1'];
				$job8Yr2=$rInputSales['noJobsYr2'];
				$job8Yr3=$rInputSales['noJobsYr3'];
				$job8Yr4=$rInputSales['noJobsYr4'];
				$job8Yr5=$rInputSales['noJobsYr5'];
				$job8Yr6=$rInputSales['noJobsYr6'];
				
			//PHH
				$x9="SELECT 34 as indicator_id,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_phh` as `p`
					join `tbl_phh_meta_data` as `pj` 
					on `pj`.`phh_id`=`p`.`id`
					where 34 = 34
					and `pj`.`sexOfJobHolder` = 'M'";
								
				$query=@Execute($x9) or die(http(__line__));
				$rPHH=FetchRecords($query);
				$job9Yr1=$rPHH['noJobsYr1'];
				$job9Yr2=$rPHH['noJobsYr2'];
				$job9Yr3=$rPHH['noJobsYr3'];
				$job9Yr4=$rPHH['noJobsYr4'];
				$job9Yr5=$rPHH['noJobsYr5'];
				$job9Yr6=$rPHH['noJobsYr6'];
									
			//Summimg all the Jobs across the different form2's for each of the years
									
				$result['notrainedYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
				$result['notrainedYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
				$result['notrainedYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
				$result['notrainedYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
				$result['notrainedYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
				$result['notrainedYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
												
			return $result[$resultValue];
		}
		function jobsAttributedToFtFImplementationUmemsFemale($IndicatorID,$opening_year,$closure_year,$resultValue){
			//Enterprise and Tech Adoption
				$x1="SELECT 35 as indicator_id,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
					sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
					FROM `tbl_techadoption` as `t` 
					join `tbl_tech_adoption_jobHolder` as `tj` 
					on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
					where 35 = 35
					and `tj`.`sexOfJobHolder` = 'F'";
				
					$query=@Execute($x1) or die(http(__line__));
					$rTechAdoption=FetchRecords($query);
					$jobYr1=$rTechAdoption['noJobs1Yr1'];
					$jobYr2=$rTechAdoption['noJobs1Yr2'];
					$jobYr3=$rTechAdoption['noJobs1Yr3'];
					$jobYr4=$rTechAdoption['noJobs1Yr4'];
					$jobYr5=$rTechAdoption['noJobs1Yr5'];
					$jobYr6=$rTechAdoption['noJobs1Yr6'];
									
			//Labour Saving Technology
				$x2="SELECT 35 as indicator_id,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_laboursavingtech` as `s`
					join `tbl_labourSavingTech_jobHolder` as `sj` 
					on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
					where 35 = 35
					and `sj`.`sexOfJobHolder` = 'F'";
								
				$query=@Execute($x2) or die(http(__line__));
				$rJobsLabourSaving=@FetchRecords($query);
				$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
				$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
				$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
				$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
				$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
				$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
									
			//Media Programs
				$x3="SELECT 35 as indicator_id,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_mediaprograms` as `m`
					join `tbl_mediaProgram_jobHolder` as `mj` 
					on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
					where 35 = 35
					and `mj`.`sexOfJobHolder` = 'F'";
				
					$query=@Execute($x3) or die(http(__line__));
					$rJobsMediaPrograms=@FetchRecords($query);
					$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
					$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
					$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
					$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
					$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
					$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
									
			//Youth Apprentice
				$x4="SELECT 35 as indicator_id,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_youthapprentice` as `y`
					join `tbl_apprenticeship_jobHolder` as `yj` 
					on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
					where 35 = 35
					and `yj`.`sexOfJobHolder` = 'F'";
				
					$query=@Execute($x4) or die(http(__line__));
					$rYouthApprentice=@FetchRecords($query);
					$job4Yr1=$rYouthApprentice['noJobsYr1'];
					$job4Yr2=$rYouthApprentice['noJobsYr2'];
					$job4Yr3=$rYouthApprentice['noJobsYr3'];
					$job4Yr4=$rYouthApprentice['noJobsYr4'];
					$job4Yr5=$rYouthApprentice['noJobsYr5'];
					$job4Yr6=$rYouthApprentice['noJobsYr6'];				
		
		
			//Public private partnership
				$x5="SELECT 35 as indicator_id,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_public_private_partnership` as `p` 
					join `tbl_partnership_jobHolder` as `pj` 
					on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
					where 35 = 35
					and `pj`.`sexOfJobHolder` = 'F'";
				
				$query=@Execute($x5) or die(http(__line__));
				$rPrivatePublic=FetchRecords($query);
				$job5Yr1=$rPrivatePublic['noJobsYr1'];
				$job5Yr2=$rPrivatePublic['noJobsYr2'];
				$job5Yr3=$rPrivatePublic['noJobsYr3'];
				$job5Yr4=$rPrivatePublic['noJobsYr4'];
				$job5Yr5=$rPrivatePublic['noJobsYr5'];
				$job5Yr6=$rPrivatePublic['noJobsYr6'];
				
				
				
			//Bank Loans
				$x6="SELECT 35 as indicator_id,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_bankloans` as `b`
					join `tbl_bank_loans_jobHolder` as `bj` 
					on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
					where 35 = 35
					and `bj`.`sexOfJobHolder` = 'F'";
				
				$query=@Execute($x6) or die(http(__line__));
				$rBankLoans=FetchRecords($query);
				$job6Yr1=$rBankLoans['noJobsYr1'];
				$job6Yr2=$rBankLoans['noJobsYr2'];
				$job6Yr3=$rBankLoans['noJobsYr3'];
				$job6Yr4=$rBankLoans['noJobsYr4'];
				$job6Yr5=$rBankLoans['noJobsYr5'];
				$job6Yr6=$rBankLoans['noJobsYr6'];
									
			//BDS
				$x7="SELECT 35 as indicator_id,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_businessdev` as `bds`
					join `tbl_bds_jobHolder` as `bdsj` 
					on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
					where 35 = 35
					and `bdsj`.`sexOfJobHolder` = 'F'";
								
				$query=@Execute($x7) or die(http(__line__));
				$rBDS=FetchRecords($query);
				$job7Yr1=$rBDS['noJobsYr1'];
				$job7Yr2=$rBDS['noJobsYr2'];
				$job7Yr3=$rBDS['noJobsYr3'];
				$job7Yr4=$rBDS['noJobsYr4'];
				$job7Yr5=$rBDS['noJobsYr5'];
				$job7Yr6=$rBDS['noJobsYr6'];
									
			//Input Sales
				$x8="SELECT 35 as indicator_id,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_input_sales` as `i`
					join `tbl_input_sales_meta_data` as `ij` 
					on `ij`.`input_sales_id`=`i`.`id`
					where 35 = 35
					and `ij`.`sexOfJobHolder` = 'F'";
								
				$query=@Execute($x8) or die(http(__line__));
				$rInputSales=FetchRecords($query);
				$job8Yr1=$rInputSales['noJobsYr1'];
				$job8Yr2=$rInputSales['noJobsYr2'];
				$job8Yr3=$rInputSales['noJobsYr3'];
				$job8Yr4=$rInputSales['noJobsYr4'];
				$job8Yr5=$rInputSales['noJobsYr5'];
				$job8Yr6=$rInputSales['noJobsYr6'];
				
			//PHH
				$x9="SELECT 35 as indicator_id,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
					FROM `tbl_phh` as `p`
					join `tbl_phh_meta_data` as `pj` 
					on `pj`.`phh_id`=`p`.`id`
					where 35 = 35
					and `pj`.`sexOfJobHolder` = 'F'";
								
				$query=@Execute($x9) or die(http(__line__));
				$rPHH=FetchRecords($query);
				$job9Yr1=$rPHH['noJobsYr1'];
				$job9Yr2=$rPHH['noJobsYr2'];
				$job9Yr3=$rPHH['noJobsYr3'];
				$job9Yr4=$rPHH['noJobsYr4'];
				$job9Yr5=$rPHH['noJobsYr5'];
				$job9Yr6=$rPHH['noJobsYr6'];
									
			//Summimg all the Jobs across the different form2's for each of the years
									
				$result['notrainedYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
				$result['notrainedYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
				$result['notrainedYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
				$result['notrainedYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
				$result['notrainedYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
				$result['notrainedYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
												
			return $result[$resultValue];
		}
		function ValueofAgriculturalRuralLoansUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 36 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
					FROM `tbl_bankloans` where 36=36
					and `typeOfLoanRecepient` like 'Farmer%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanYr1'];
				$loanYr2=$result['loanYr2'];
				$loanYr3=$result['loanYr3'];
				$loanYr4=$result['loanYr4'];
				$loanYr5=$result['loanYr5'];
				$loanYr6=$result['loanYr6'];
				
				$result['notrainedYr1']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr2']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr3']=convertShillingsToDollars($loanYr3);
				$result['notrainedYr4']=convertShillingsToDollars($loanYr4);
				$result['notrainedYr5']=convertShillingsToDollars($loanYr5);
				$result['notrainedYr6']=convertShillingsToDollars($loanYr6);
			return $result[$resultValue];
		}
		function ValueofAgriculturalRuralLoansUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 37 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
					from `tbl_bankloans` where 37=37
					and `typeOfLoanRecepient` like 'Processors%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanYr1'];
				$loanYr2=$result['loanYr2'];
				$loanYr3=$result['loanYr3'];
				$loanYr4=$result['loanYr4'];
				$loanYr5=$result['loanYr5'];
				$loanYr6=$result['loanYr6'];
				
				$result['notrainedYr1']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr2']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr3']=convertShillingsToDollars($loanYr3);
				$result['notrainedYr4']=convertShillingsToDollars($loanYr4);
				$result['notrainedYr5']=convertShillingsToDollars($loanYr5);
				$result['notrainedYr6']=convertShillingsToDollars($loanYr6);
			return $result[$resultValue];
		}
		function ValueofAgriculturalRuralLoansUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 38 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
					from `tbl_bankloans` where 38=38
					and `typeOfLoanRecepient` like 'Exporter%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanYr1'];
				$loanYr2=$result['loanYr2'];
				$loanYr3=$result['loanYr3'];
				$loanYr4=$result['loanYr4'];
				$loanYr5=$result['loanYr5'];
				$loanYr6=$result['loanYr6'];
				
				$result['notrainedYr1']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr2']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr3']=convertShillingsToDollars($loanYr3);
				$result['notrainedYr4']=convertShillingsToDollars($loanYr4);
				$result['notrainedYr5']=convertShillingsToDollars($loanYr5);
				$result['notrainedYr6']=convertShillingsToDollars($loanYr6);
			return $result[$resultValue];
		}
		function ValueofAgriculturalRuralLoansUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 39 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
					from `tbl_bankloans` where 39=39
					and `typeOfLoanRecepient` like 'Local trader%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanYr1'];
				$loanYr2=$result['loanYr2'];
				$loanYr3=$result['loanYr3'];
				$loanYr4=$result['loanYr4'];
				$loanYr5=$result['loanYr5'];
				$loanYr6=$result['loanYr6'];
				
				$result['notrainedYr1']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr2']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr3']=convertShillingsToDollars($loanYr3);
				$result['notrainedYr4']=convertShillingsToDollars($loanYr4);
				$result['notrainedYr5']=convertShillingsToDollars($loanYr5);
				$result['notrainedYr6']=convertShillingsToDollars($loanYr6);
			return $result[$resultValue];
		}
		function ValueofAgriculturalRuralLoansUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 40 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
					from `tbl_bankloans` where 40=40
					and `typeOfLoanRecepient` like 'Village Agents%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanYr1'];
				$loanYr2=$result['loanYr2'];
				$loanYr3=$result['loanYr3'];
				$loanYr4=$result['loanYr4'];
				$loanYr5=$result['loanYr5'];
				$loanYr6=$result['loanYr6'];
				
				$result['notrainedYr1']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr2']=convertShillingsToDollars($loanYr1);
				$result['notrainedYr3']=convertShillingsToDollars($loanYr3);
				$result['notrainedYr4']=convertShillingsToDollars($loanYr4);
				$result['notrainedYr5']=convertShillingsToDollars($loanYr5);
				$result['notrainedYr6']=convertShillingsToDollars($loanYr6);
			return $result[$resultValue];
		}
		function SMEsRecievingAssistanceToLoansUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 41 as LevelOneSubIndicatorID,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr6
					from `tbl_bankloans` as `b` 
					where 41=41
					and `b`.`typeOfLoanRecepient` like 'Farmer%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanAssistanceYr1'];
				$loanYr2=$result['loanAssistanceYr2'];
				$loanYr3=$result['loanAssistanceYr3'];
				$loanYr4=$result['loanAssistanceYr4'];
				$loanYr5=$result['loanAssistanceYr5'];
				$loanYr6=$result['loanAssistanceYr6'];
				
				$result['notrainedYr1']=($loanYr1);
				$result['notrainedYr2']=($loanYr2);
				$result['notrainedYr3']=($loanYr3);
				$result['notrainedYr4']=($loanYr4);
				$result['notrainedYr5']=($loanYr5);
				$result['notrainedYr6']=($loanYr6);
			return $result[$resultValue];
		}
		function SMEsRecievingAssistanceToLoansUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 42 as LevelOneSubIndicatorID,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr6
					from `tbl_bankloans` as `b` 
					where 42=42
					and `b`.`typeOfLoanRecepient` like 'Processors%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanAssistanceYr1'];
				$loanYr2=$result['loanAssistanceYr2'];
				$loanYr3=$result['loanAssistanceYr3'];
				$loanYr4=$result['loanAssistanceYr4'];
				$loanYr5=$result['loanAssistanceYr5'];
				$loanYr6=$result['loanAssistanceYr6'];
				
				$result['notrainedYr1']=($loanYr1);
				$result['notrainedYr2']=($loanYr2);
				$result['notrainedYr3']=($loanYr3);
				$result['notrainedYr4']=($loanYr4);
				$result['notrainedYr5']=($loanYr5);
				$result['notrainedYr6']=($loanYr6);
			return $result[$resultValue];
		}
		function SMEsRecievingAssistanceToLoansUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 43 as LevelOneSubIndicatorID,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr6
					from `tbl_bankloans` as `b` 
					where 43=43
					and `b`.`typeOfLoanRecepient` like 'Exporter%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanAssistanceYr1'];
				$loanYr2=$result['loanAssistanceYr2'];
				$loanYr3=$result['loanAssistanceYr3'];
				$loanYr4=$result['loanAssistanceYr4'];
				$loanYr5=$result['loanAssistanceYr5'];
				$loanYr6=$result['loanAssistanceYr6'];
				
				$result['notrainedYr1']=($loanYr1);
				$result['notrainedYr2']=($loanYr2);
				$result['notrainedYr3']=($loanYr3);
				$result['notrainedYr4']=($loanYr4);
				$result['notrainedYr5']=($loanYr5);
				$result['notrainedYr6']=($loanYr6);
			return $result[$resultValue];
		}
		function SMEsRecievingAssistanceToLoansUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 44 as LevelOneSubIndicatorID,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr6
					from `tbl_bankloans` as `b` 
					where 44=44
					and `b`.`typeOfLoanRecepient` like 'Local trader%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanAssistanceYr1'];
				$loanYr2=$result['loanAssistanceYr2'];
				$loanYr3=$result['loanAssistanceYr3'];
				$loanYr4=$result['loanAssistanceYr4'];
				$loanYr5=$result['loanAssistanceYr5'];
				$loanYr6=$result['loanAssistanceYr6'];
				
				$result['notrainedYr1']=($loanYr1);
				$result['notrainedYr2']=($loanYr2);
				$result['notrainedYr3']=($loanYr3);
				$result['notrainedYr4']=($loanYr4);
				$result['notrainedYr5']=($loanYr5);
				$result['notrainedYr6']=($loanYr6);
			return $result[$resultValue];
		}
		function SMEsRecievingAssistanceToLoansUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 45 as LevelOneSubIndicatorID,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr1,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr2,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr3,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr4,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr5,
					sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `b`.`nameMSME` <>'', 1, 0 ) ) AS loanAssistanceYr6
					from `tbl_bankloans` as `b` 
					where 45=45
					and `b`.`typeOfLoanRecepient` like 'Village Agents%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$loanYr1=$result['loanAssistanceYr1'];
				$loanYr2=$result['loanAssistanceYr2'];
				$loanYr3=$result['loanAssistanceYr3'];
				$loanYr4=$result['loanAssistanceYr4'];
				$loanYr5=$result['loanAssistanceYr5'];
				$loanYr6=$result['loanAssistanceYr6'];
				
				$result['notrainedYr1']=($loanYr1);
				$result['notrainedYr2']=($loanYr2);
				$result['notrainedYr3']=($loanYr3);
				$result['notrainedYr4']=($loanYr4);
				$result['notrainedYr5']=($loanYr5);
				$result['notrainedYr6']=($loanYr6);
			return $result[$resultValue];
		}
		function VolumeofExportsTradersExportsUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------form3_exporters---------------------------
				$x="SELECT 46 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volMaizeEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volMaizeEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volMaizeEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volMaizeEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volMaizeEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volMaizeEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form3_exporters` 
					where 46=46";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$VolumeofExportYr1=$result['VolumeofExportYr1'];
				$VolumeofExportYr2=$result['VolumeofExportYr2'];
				$VolumeofExportYr3=$result['VolumeofExportYr3'];
				$VolumeofExportYr4=$result['VolumeofExportYr4'];
				$VolumeofExportYr5=$result['VolumeofExportYr5'];
				$VolumeofExportYr6=$result['VolumeofExportYr6'];
				
			//=====================form 4 volumes==============
				$x2="SELECT 46 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volMaizeEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volMaizeEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volMaizeEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volMaizeEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volMaizeEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volMaizeEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form4_traders` 
					where 46=46";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$tradersYr1=$result['VolumeofExportYr1'];
				$tradersYr2=$result['VolumeofExportYr2'];
				$tradersYr3=$result['VolumeofExportYr3'];
				$tradersYr4=$result['VolumeofExportYr4'];
				$tradersYr5=$result['VolumeofExportYr5'];
				$tradersYr6=$result['VolumeofExportYr6'];
				
				
				$result['notrainedYr1']=convertKiloToTonnes($VolumeofExportYr1+$tradersYr1);
				$result['notrainedYr2']=convertKiloToTonnes($VolumeofExportYr2+$tradersYr2);
				$result['notrainedYr3']=convertKiloToTonnes($VolumeofExportYr3+$tradersYr3);
				$result['notrainedYr4']=convertKiloToTonnes($VolumeofExportYr4+$tradersYr4);
				$result['notrainedYr5']=convertKiloToTonnes($VolumeofExportYr5+$tradersYr5);
				$result['notrainedYr6']=convertKiloToTonnes($VolumeofExportYr6+$tradersYr6);
			return $result[$resultValue];
		}
		function VolumeofExportsTradersExportsUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------form3_exporters---------------------------
				$x="SELECT 47  as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volBeansEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volBeansEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volBeansEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volBeansEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volBeansEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volBeansEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form3_exporters` 
					where 47=47";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$VolumeofExportYr1=$result['VolumeofExportYr1'];
				$VolumeofExportYr2=$result['VolumeofExportYr2'];
				$VolumeofExportYr3=$result['VolumeofExportYr3'];
				$VolumeofExportYr4=$result['VolumeofExportYr4'];
				$VolumeofExportYr5=$result['VolumeofExportYr5'];
				$VolumeofExportYr6=$result['VolumeofExportYr6'];
				
			//=====================form 4 volumes==============
				$x2="SELECT 47 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volBeansEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volBeansEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volBeansEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volBeansEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volBeansEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volBeansEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form4_traders` 
					where 47=47";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$tradersYr1=$result['VolumeofExportYr1'];
				$tradersYr2=$result['VolumeofExportYr2'];
				$tradersYr3=$result['VolumeofExportYr3'];
				$tradersYr4=$result['VolumeofExportYr4'];
				$tradersYr5=$result['VolumeofExportYr5'];
				$tradersYr6=$result['VolumeofExportYr6'];
				
				
				$result['notrainedYr1']=convertKiloToTonnes($VolumeofExportYr1+$tradersYr1);
				$result['notrainedYr2']=convertKiloToTonnes($VolumeofExportYr2+$tradersYr2);
				$result['notrainedYr3']=convertKiloToTonnes($VolumeofExportYr3+$tradersYr3);
				$result['notrainedYr4']=convertKiloToTonnes($VolumeofExportYr4+$tradersYr4);
				$result['notrainedYr5']=convertKiloToTonnes($VolumeofExportYr5+$tradersYr5);
				$result['notrainedYr6']=convertKiloToTonnes($VolumeofExportYr6+$tradersYr6);
			return $result[$resultValue];
		}
		function VolumeofExportsTradersExportsUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------form3_exporters---------------------------
				$x="SELECT 48  as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form3_exporters` 
					where 48=48";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$VolumeofExportYr1=$result['VolumeofExportYr1'];
				$VolumeofExportYr2=$result['VolumeofExportYr2'];
				$VolumeofExportYr3=$result['VolumeofExportYr3'];
				$VolumeofExportYr4=$result['VolumeofExportYr4'];
				$VolumeofExportYr5=$result['VolumeofExportYr5'];
				$VolumeofExportYr6=$result['VolumeofExportYr6'];
				
			//=====================form 4 volumes==============
				$x2="SELECT 48 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volCoffeeEx, 0 ) ) AS VolumeofExportYr6
					FROM `tbl_form4_traders` 
					where 48=48";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$tradersYr1=$result['VolumeofExportYr1'];
				$tradersYr2=$result['VolumeofExportYr2'];
				$tradersYr3=$result['VolumeofExportYr3'];
				$tradersYr4=$result['VolumeofExportYr4'];
				$tradersYr5=$result['VolumeofExportYr5'];
				$tradersYr6=$result['VolumeofExportYr6'];
				
				
				$result['notrainedYr1']=convertKiloToTonnes($VolumeofExportYr1+$tradersYr1);
				$result['notrainedYr2']=convertKiloToTonnes($VolumeofExportYr2+$tradersYr2);
				$result['notrainedYr3']=convertKiloToTonnes($VolumeofExportYr3+$tradersYr3);
				$result['notrainedYr4']=convertKiloToTonnes($VolumeofExportYr4+$tradersYr4);
				$result['notrainedYr5']=convertKiloToTonnes($VolumeofExportYr5+$tradersYr5);
				$result['notrainedYr6']=convertKiloToTonnes($VolumeofExportYr6+$tradersYr6);
			return $result[$resultValue];
		}
		function NumMSMEsIncludingFarmersBDSUmemsFarmers($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 49 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
					FROM `tbl_businessdev`  
					where 49=49
					and typeOfActorServiced like 'Farmer%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numYr1=$result['numYr1'];
				$numYr2=$result['numYr2'];
				$numYr3=$result['numYr3'];
				$numYr4=$result['numYr4'];
				$numYr5=$result['numYr5'];
				$numYr6=$result['numYr6'];
				
				$result['notrainedYr1'] = $numYr1;
				$result['notrainedYr2'] = $numYr2;
				$result['notrainedYr3'] = $numYr3;
				$result['notrainedYr4'] = $numYr4;
				$result['notrainedYr5'] = $numYr5;
				$result['notrainedYr6'] = $numYr6;
			return $result[$resultValue];
		}
		function NumMSMEsIncludingFarmersBDSUmemsProcessors($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 50 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
					FROM `tbl_businessdev`  
					where 50=50
					and typeOfActorServiced like 'Processors%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numYr1=$result['numYr1'];
				$numYr2=$result['numYr2'];
				$numYr3=$result['numYr3'];
				$numYr4=$result['numYr4'];
				$numYr5=$result['numYr5'];
				$numYr6=$result['numYr6'];
				
				$result['notrainedYr1'] = $numYr1;
				$result['notrainedYr2'] = $numYr2;
				$result['notrainedYr3'] = $numYr3;
				$result['notrainedYr4'] = $numYr4;
				$result['notrainedYr5'] = $numYr5;
				$result['notrainedYr6'] = $numYr6;
			return $result[$resultValue];
		}
		function NumMSMEsIncludingFarmersBDSUmemsExporter($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 51 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
					FROM `tbl_businessdev`  
					where 51=51
					and typeOfActorServiced like 'Exporter%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numYr1=$result['numYr1'];
				$numYr2=$result['numYr2'];
				$numYr3=$result['numYr3'];
				$numYr4=$result['numYr4'];
				$numYr5=$result['numYr5'];
				$numYr6=$result['numYr6'];
				
				$result['notrainedYr1'] = $numYr1;
				$result['notrainedYr2'] = $numYr2;
				$result['notrainedYr3'] = $numYr3;
				$result['notrainedYr4'] = $numYr4;
				$result['notrainedYr5'] = $numYr5;
				$result['notrainedYr6'] = $numYr6;
			return $result[$resultValue];
		}
		function NumMSMEsIncludingFarmersBDSUmemsTrader($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 52 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
					FROM `tbl_businessdev`  
					where 52=52
					and typeOfActorServiced like 'Local trader%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numYr1=$result['numYr1'];
				$numYr2=$result['numYr2'];
				$numYr3=$result['numYr3'];
				$numYr4=$result['numYr4'];
				$numYr5=$result['numYr5'];
				$numYr6=$result['numYr6'];
				
				$result['notrainedYr1'] = $numYr1;
				$result['notrainedYr2'] = $numYr2;
				$result['notrainedYr3'] = $numYr3;
				$result['notrainedYr4'] = $numYr4;
				$result['notrainedYr5'] = $numYr5;
				$result['notrainedYr6'] = $numYr6;
			return $result[$resultValue];
		}
		function NumMSMEsIncludingFarmersBDSUmemsVA($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 2 bank loans---------------------------
				$x="SELECT 53 as LevelOneSubIndicatorID,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr1,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr2,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr3,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr4,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr5,
					sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedMale + actorServedFemale), 0 ) ) AS numYr6
					FROM `tbl_businessdev` 
					where 53=53
					and typeOfActorServiced like 'Village Agents%'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numYr1=$result['numYr1'];
				$numYr2=$result['numYr2'];
				$numYr3=$result['numYr3'];
				$numYr4=$result['numYr4'];
				$numYr5=$result['numYr5'];
				$numYr6=$result['numYr6'];
				
				$result['notrainedYr1'] = $numYr1;
				$result['notrainedYr2'] = $numYr2;
				$result['notrainedYr3'] = $numYr3;
				$result['notrainedYr4'] = $numYr4;
				$result['notrainedYr5'] = $numYr5;
				$result['notrainedYr6'] = $numYr6;
			return $result[$resultValue];
		}
		function reductionInpostHarvestLossesUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6 Survey---------------------------
				$x="SELECT 54 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6Yr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`) 
					where 54 = 54
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$lossForm6Yr1=$result['lossForm6Yr1'];
				$lossForm6Yr2=$result['lossForm6Yr2'];
				$lossForm6Yr3=$result['lossForm6Yr3'];
				$lossForm6Yr4=$result['lossForm6Yr4'];
				$lossForm6Yr5=$result['lossForm6Yr5'];
				$lossForm6Yr6=$result['lossForm6Yr6'];
				
			//=====================Total production form 6 Qn 27==============
				$x2="SELECT 54 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionYr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
					where 54 = 54
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$totProductionYr1=$result['totProductionYr1'];
				$totProductionYr2=$result['totProductionYr2'];
				$totProductionYr3=$result['totProductionYr3'];
				$totProductionYr4=$result['totProductionYr4'];
				$totProductionYr5=$result['totProductionYr5'];
				$totProductionYr6=$result['totProductionYr6'];

				//factor in the extrapolation factor
				$st=ExtrapolationFactor(54);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				
				
				
				$result['notrainedYr1']= (($lossForm6Yr1 / $totProductionYr1)*$extrapolationFactorYr1);
				$result['notrainedYr2']= (($lossForm6Yr2 / $totProductionYr2)*$extrapolationFactorYr2);
				$result['notrainedYr3']= (($lossForm6Yr3 / $totProductionYr3)*$extrapolationFactorYr3);
				$result['notrainedYr4']= (($lossForm6Yr4 / $totProductionYr4)*$extrapolationFactorYr4);
				$result['notrainedYr5']= (($lossForm6Yr5 / $totProductionYr5)*$extrapolationFactorYr5);
				$result['notrainedYr6']= (($lossForm6Yr6 / $totProductionYr6)*$extrapolationFactorYr6);
			return $result[$resultValue];
		}
		function reductionInpostHarvestLossesUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6 Survey---------------------------
				$x="SELECT 55 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6Yr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId`=`p`.`pk_patId`) 
					where 55 = 55
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$lossForm6Yr1=$result['lossForm6Yr1'];
				$lossForm6Yr2=$result['lossForm6Yr2'];
				$lossForm6Yr3=$result['lossForm6Yr3'];
				$lossForm6Yr4=$result['lossForm6Yr4'];
				$lossForm6Yr5=$result['lossForm6Yr5'];
				$lossForm6Yr6=$result['lossForm6Yr6'];
				
			//=====================Total production form 6 Qn 27==============
				$x2="SELECT 55 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionYr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId`=`p`.`pk_patId`)
					where 55 = 55
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$totProductionYr1=$result['totProductionYr1'];
				$totProductionYr2=$result['totProductionYr2'];
				$totProductionYr3=$result['totProductionYr3'];
				$totProductionYr4=$result['totProductionYr4'];
				$totProductionYr5=$result['totProductionYr5'];
				$totProductionYr6=$result['totProductionYr6'];

				//factor in the extrapolation factor
				$st=ExtrapolationFactor(55);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				
				
				
				$result['notrainedYr1']= (($lossForm6Yr1 / $totProductionYr1)*$extrapolationFactorYr1);
				$result['notrainedYr2']= (($lossForm6Yr2 / $totProductionYr2)*$extrapolationFactorYr2);
				$result['notrainedYr3']= (($lossForm6Yr3 / $totProductionYr3)*$extrapolationFactorYr3);
				$result['notrainedYr4']= (($lossForm6Yr4 / $totProductionYr4)*$extrapolationFactorYr4);
				$result['notrainedYr5']= (($lossForm6Yr5 / $totProductionYr5)*$extrapolationFactorYr5);
				$result['notrainedYr6']= (($lossForm6Yr6 / $totProductionYr6)*$extrapolationFactorYr6);
			return $result[$resultValue];
		}
		function reductionInpostHarvestLossesUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------From 6 Survey---------------------------
				$x="SELECT 56 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`) 
					where 56 = 56
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$lossForm6Yr1=$result['lossForm6Yr1'];
				$lossForm6Yr2=$result['lossForm6Yr2'];
				$lossForm6Yr3=$result['lossForm6Yr3'];
				$lossForm6Yr4=$result['lossForm6Yr4'];
				$lossForm6Yr5=$result['lossForm6Yr5'];
				$lossForm6Yr6=$result['lossForm6Yr6'];
				
			//=====================Total production form 6 Qn 27==============
				$x2="SELECT 56 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionYr6
					from `tbl_frm6particulars` as `p` 
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`)
					where 56 = 56
					and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$totProductionYr1=$result['totProductionYr1'];
				$totProductionYr2=$result['totProductionYr2'];
				$totProductionYr3=$result['totProductionYr3'];
				$totProductionYr4=$result['totProductionYr4'];
				$totProductionYr5=$result['totProductionYr5'];
				$totProductionYr6=$result['totProductionYr6'];

				//factor in the extrapolation factor
				$st=ExtrapolationFactor(56);
				$query=@Execute($st) or die(http(__line__));
				$result=FetchRecords($query);
				$extrapolationFactorYr1=$result['exFactorYr1'];
				$extrapolationFactorYr2=$result['exFactorYr2'];
				$extrapolationFactorYr3=$result['exFactorYr3'];
				$extrapolationFactorYr4=$result['exFactorYr4'];
				$extrapolationFactorYr5=$result['exFactorYr5'];
				$extrapolationFactorYr6=$result['exFactorYr6'];

				
				
				
				$result['notrainedYr1']= (($lossForm6Yr1 / $totProductionYr1)*$extrapolationFactorYr1);
				$result['notrainedYr2']= (($lossForm6Yr2 / $totProductionYr2)*$extrapolationFactorYr2);
				$result['notrainedYr3']= (($lossForm6Yr3 / $totProductionYr3)*$extrapolationFactorYr3);
				$result['notrainedYr4']= (($lossForm6Yr4 / $totProductionYr4)*$extrapolationFactorYr4);
				$result['notrainedYr5']= (($lossForm6Yr5 / $totProductionYr5)*$extrapolationFactorYr5);
				$result['notrainedYr6']= (($lossForm6Yr6 / $totProductionYr6)*$extrapolationFactorYr6);
			return $result[$resultValue];
		}
		function StorageCapacityUmemsMaize($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2 PHH---------------------------
				$x="select 57 as LevelOneSubIndicatorID,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
					from `tbl_phh` as `p`
					join `tbl_phh_meta_data` as `pj` 
					on `pj`.`phh_id`=`p`.`id`
					where 57 = 57
					and `pj`.`valueChain` like '%Maize'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$storageTraderYr1=$result['storageTraderYr1'];
				$storageTraderYr2=$result['storageTraderYr2'];
				$storageTraderYr3=$result['storageTraderYr3'];
				$storageTraderYr4=$result['storageTraderYr4'];
				$storageTraderYr5=$result['storageTraderYr5'];
				$storageTraderYr6=$result['storageTraderYr6'];
				
				$result['notrainedYr1']=$storageTraderYr1;
				$result['notrainedYr2']=$storageTraderYr2;
				$result['notrainedYr3']=$storageTraderYr3;
				$result['notrainedYr4']=$storageTraderYr4;
				$result['notrainedYr5']=$storageTraderYr5;
				$result['notrainedYr6']=$storageTraderYr6;
				
			return $result[$resultValue];
		}
		function StorageCapacityUmemsBeans($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2 PHH---------------------------
				$x="select 58 as LevelOneSubIndicatorID,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
					from `tbl_phh` as `p`
					join `tbl_phh_meta_data` as `pj` 
					on `pj`.`phh_id`=`p`.`id`
					where 58 = 58
					and `pj`.`valueChain` like '%Beans'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$storageTraderYr1=$result['storageTraderYr1'];
				$storageTraderYr2=$result['storageTraderYr2'];
				$storageTraderYr3=$result['storageTraderYr3'];
				$storageTraderYr4=$result['storageTraderYr4'];
				$storageTraderYr5=$result['storageTraderYr5'];
				$storageTraderYr6=$result['storageTraderYr6'];
				
				$result['notrainedYr1']=$storageTraderYr1;
				$result['notrainedYr2']=$storageTraderYr2;
				$result['notrainedYr3']=$storageTraderYr3;
				$result['notrainedYr4']=$storageTraderYr4;
				$result['notrainedYr5']=$storageTraderYr5;
				$result['notrainedYr6']=$storageTraderYr6;
				
			return $result[$resultValue];
		}
		function StorageCapacityUmemsCoffee($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form2 PHH---------------------------
				$x="select 59 as LevelOneSubIndicatorID,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
					sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
					from `tbl_phh` as `p`
					join `tbl_phh_meta_data` as `pj` 
					on `pj`.`phh_id`=`p`.`id`
					where 59 = 59
					and `pj`.`valueChain` like '%Coffee'";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$storageTraderYr1=$result['storageTraderYr1'];
				$storageTraderYr2=$result['storageTraderYr2'];
				$storageTraderYr3=$result['storageTraderYr3'];
				$storageTraderYr4=$result['storageTraderYr4'];
				$storageTraderYr5=$result['storageTraderYr5'];
				$storageTraderYr6=$result['storageTraderYr6'];
				
				$result['notrainedYr1']=$storageTraderYr1;
				$result['notrainedYr2']=$storageTraderYr2;
				$result['notrainedYr3']=$storageTraderYr3;
				$result['notrainedYr4']=$storageTraderYr4;
				$result['notrainedYr5']=$storageTraderYr5;
				$result['notrainedYr6']=$storageTraderYr6;
				
			return $result[$resultValue];
		}
		function AccesstoProductiveERUmemsYouth($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form 1 Females Trained---------------------------
				$x="select 60 as LevelOneSubIndicatorID,
					sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
					sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
					sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
					sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
					sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
					sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
					from `tbl_training` as `t`
					join `tbl_participants` as `p` 
					on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
					where 60 = 60
					and `p`.`age` between 18 and 35";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numTotTrainedYr1=$result['numTrainedYr1'];
				$numTotTrainedYr2=$result['numTrainedYr2'];
				$numTotTrainedYr3=$result['numTrainedYr3'];
				$numTotTrainedYr4=$result['numTrainedYr4'];
				$numTotTrainedYr5=$result['numTrainedYr5'];
				$numTotTrainedYr6=$result['numTrainedYr6'];
				
			//=====================Form 1 Females Trained==============
				$x2="SELECT 60 as LevelOneSubIndicatorID,
				sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
				sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
				sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
				sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
				sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
				sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
				FROM `tbl_training` as `t`
				join `tbl_participants` as `p` 
				on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
				where 60 = 60
				and `p`.`age` between 18 and 35
				&& `p`.`sex`='Female'";
				
				
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFemaleTrainedYr1=$result['notrainedFrm1Yr1'];
				$numFemaleTrainedYr2=$result['notrainedFrm1Yr2'];
				$numFemaleTrainedYr3=$result['notrainedFrm1Yr3'];
				$numFemaleTrainedYr4=$result['notrainedFrm1Yr4'];
				$numFemaleTrainedYr5=$result['notrainedFrm1Yr5'];
				$numFemaleTrainedYr6=$result['notrainedFrm1Yr6'];
				
				$result['notrainedYr1']=convertToPercentages($numFemaleTrainedYr1,$numTotTrainedYr1);
				$result['notrainedYr2']=convertToPercentages($numFemaleTrainedYr2,$numTotTrainedYr2);
				$result['notrainedYr3']=convertToPercentages($numFemaleTrainedYr3,$numTotTrainedYr3);
				$result['notrainedYr4']=convertToPercentages($numFemaleTrainedYr4,$numTotTrainedYr4);
				$result['notrainedYr5']=convertToPercentages($numFemaleTrainedYr5,$numTotTrainedYr5);
				$result['notrainedYr6']=convertToPercentages($numFemaleTrainedYr6,$numTotTrainedYr6);
				
			return $result[$resultValue];
		}
		function AccesstoProductiveERUmemsAdult($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Form 1 Females Trained---------------------------
				$x="select 61 as LevelOneSubIndicatorID,
					sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
					sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
					sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
					sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
					sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
					sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
					from `tbl_training` as `t`
					join `tbl_participants` as `p` 
					on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
					where 61 = 61
					and `p`.`age` >= 35";
				
				$query=@Execute($x) or die(http(__line__));
				$result=FetchRecords($query);
				$numTotTrainedYr1=$result['notrainedFrm1Yr1'];
				$numTotTrainedYr2=$result['notrainedFrm1Yr2'];
				$numTotTrainedYr3=$result['notrainedFrm1Yr3'];
				$numTotTrainedYr4=$result['notrainedFrm1Yr4'];
				$numTotTrainedYr5=$result['notrainedFrm1Yr5'];
				$numTotTrainedYr6=$result['notrainedFrm1Yr6'];
				
			//=====================Form 1 Females Trained==============
				$x2="SELECT 61 as LevelOneSubIndicatorID,
				sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
				sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
				sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
				sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
				sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
				sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
				FROM `tbl_training` as `t`
				join `tbl_participants` as `p` 
				on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
				where 61 = 61
				&& `p`.`sex`='Female'
				and `p`.`age` >= 35";
			
				$query=@Execute($x2) or die(http(__line__));
				$result=FetchRecords($query);
				$numFemaleTrainedYr1=$result['notrainedFrm1Yr1'];
				$numFemaleTrainedYr2=$result['notrainedFrm1Yr2'];
				$numFemaleTrainedYr3=$result['notrainedFrm1Yr3'];
				$numFemaleTrainedYr4=$result['notrainedFrm1Yr4'];
				$numFemaleTrainedYr5=$result['notrainedFrm1Yr5'];
				$numFemaleTrainedYr6=$result['notrainedFrm1Yr6'];
				
				$result['notrainedYr1']=convertToPercentages($numFemaleTrainedYr1,$numTotTrainedYr1);
				$result['notrainedYr2']=convertToPercentages($numFemaleTrainedYr2,$numTotTrainedYr2);
				$result['notrainedYr3']=convertToPercentages($numFemaleTrainedYr3,$numTotTrainedYr3);
				$result['notrainedYr4']=convertToPercentages($numFemaleTrainedYr4,$numTotTrainedYr4);
				$result['notrainedYr5']=convertToPercentages($numFemaleTrainedYr5,$numTotTrainedYr5);
				$result['notrainedYr6']=convertToPercentages($numFemaleTrainedYr6,$numTotTrainedYr6);
				
			return $result[$resultValue];
		}

		
		function numFarmersCountNew($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			
					
					//=====================form7==============
					$x2="SELECT 69 as LevelOneSubIndicatorID,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr1,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr2,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr3,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr4,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr5,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr6
						FROM `tbl_farmers` as f 
						where 69=69 
						and f.display='Yes'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
					
					//farmer counts taking into consideration New and Old
					
					/* $yr1=numFarmersFrm7Yr1;
					$yr2=numFarmersFrm7Yr2 + yr1;
					$yr3=numFarmersFrm7Yr3 + yr2;
					$yr4=numFarmersFrm7Yr4 + yr3;
					$yr5=numFarmersFrm7Yr5 + yr4;
					$yr6=numFarmersFrm7Yr6 + yr5;
					 */
					$result['notrainedYr1']=$numFarmersFrm7Yr1;
					$result['notrainedYr2']=$numFarmersFrm7Yr2;
					$result['notrainedYr3']=$numFarmersFrm7Yr3;
					$result['notrainedYr4']=$numFarmersFrm7Yr4;
					$result['notrainedYr5']=$numFarmersFrm7Yr5;
					$result['notrainedYr6']=$numFarmersFrm7Yr6;
				return $result[$resultValue];
			}
		
		function numFarmersCountOld($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			
					
					//=====================form7==============
					$x2="SELECT 70 as LevelOneSubIndicatorID,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr1,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr2,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr3,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr4,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr5,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr6
						FROM `tbl_farmers` as f where 70=70 and f.display='Yes'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
					$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
					$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
					$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
					$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
					$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
					
					
					$result['notrainedYr1']=$numFarmersFrm7Yr1;
					$result['notrainedYr2']=$numFarmersFrm7Yr1;
					$result['notrainedYr3']=$numFarmersFrm7Yr2;
					$result['notrainedYr4']=$numFarmersFrm7Yr3 + $numFarmersFrm7Yr2;
					$result['notrainedYr5']=$numFarmersFrm7Yr4 + $numFarmersFrm7Yr3;
					$result['notrainedYr6']=$numFarmersFrm7Yr5 + $numFarmersFrm7Yr4;
				return $result[$resultValue];
			}
		
		function numFarmersCountMale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			
					
					//=====================form7==============
					$x2="SELECT 71 as LevelOneSubIndicatorID,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr1,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr2,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr3,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr4,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr5,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr6
						FROM `tbl_farmers` as f where 71=71 
						and `f`.`farmersSex`  like 'Male%'
						and f.display='Yes'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					
					$result['notrainedYr1']=$result['numFarmersFrm7Yr1'];
					$result['notrainedYr2']=$result['numFarmersFrm7Yr2'];
					$result['notrainedYr3']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3'];
					$result['notrainedYr4']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4'];
					$result['notrainedYr5']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5'];
					$result['notrainedYr6']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5']+$result['numFarmersFrm7Yr6'];
					
				return $result[$resultValue];
			}
		
		function numFarmersCountFemale($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			
					
					//=====================form7==============
					$x2="SELECT 72 as LevelOneSubIndicatorID,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr1,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr2,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr3,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr4,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr5,
						sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and f.farmersName <>'', 1, 0 ) ) AS numFarmersFrm7Yr6
						FROM `tbl_farmers` as f where 72=72 
						and `f`.`farmersSex`  like 'Female%'
						and f.display='Yes'";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					
					$result['notrainedYr1']=$result['numFarmersFrm7Yr1'];
					$result['notrainedYr2']=$result['numFarmersFrm7Yr2'];
					$result['notrainedYr3']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3'];
					$result['notrainedYr4']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4'];
					$result['notrainedYr5']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5'];
					$result['notrainedYr6']=$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5']+$result['numFarmersFrm7Yr6'];
					
				return $result[$resultValue];
			}
		
		function newOrContinuingHouseholds($LevelOneSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			
					
					//=====================form7==============
					$x2="SELECT 73 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f`  
								where 73=73";
					$query=@Execute($x2) or die(http(__line__));
					$result=FetchRecords($query);
					
					$result['notrainedYr1']=$result['numNotNullHHYr1'];
					$result['notrainedYr2']=$result['numNotNullHHYr2'];
					$result['notrainedYr3']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3'];
					$result['notrainedYr4']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4'];
					$result['notrainedYr5']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5'];
					$result['notrainedYr6']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5']+$result['numNotNullHHYr6'];
					
				return $result[$resultValue];
			}


		
}

?>