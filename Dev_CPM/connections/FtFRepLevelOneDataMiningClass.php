<?php
//require_once('lib_sunrise.php');
 
class FtFRepLevelOneDataMining{
 var $SubIndicatorID;
 var $Query;
 
 	

 
							function FtFRepLevelOneDataMining($SubIndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($SubIndicatorID=15,$opening_year,$closure_year,$resultValue)
							
							function l1MiningIndicator($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							 
							switch($SubIndicatorID){
							case 1: 
							$x=FtFRepLevelOneDataMining::grossMarginPerUnitOfLandBeans($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2: 
							$x=FtFRepLevelOneDataMining::grossMarginPerUnitOfLandCoffee($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 3: 
							$x=FtFRepLevelOneDataMining::grossMarginPerUnitOfLandMaize($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 4:
							$x=FtFRepLevelOneDataMining::jobsAttributedToFtFImplementationLocation($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 5:
							$x=FtFRepLevelOneDataMining::jobsAttributedToFtFImplementationNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 6:
							$x=FtFRepLevelOneDataMining::jobsAttributedToFtFImplementationSexJobHolder($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 7:
							$x=FtFRepLevelOneDataMining::numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganization($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 8:
							$x=FtFRepLevelOneDataMining::numFarmersFoodsecurityPrivateEnterprisesNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 9:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsAgriculturalProduction($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 10:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsAgriculturalPH($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 11:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsNutrition($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 12:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsMultiFocus($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 13:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsOther($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 14:
							$x=FtFRepLevelOneDataMining::privatePublicPartnershipsDNA($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 15:
							$x=FtFRepLevelOneDataMining::ruralHouseholdsBenefitingNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 16:
							$x=FtFRepLevelOneDataMining::ruralHouseholdsBenefitingGHT($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 17:
							$x=FtFRepLevelOneDataMining::hectaresTechnologiesManagementPracticeTech($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 18:
							$x=FtFRepLevelOneDataMining::hectaresTechnologiesManagementPracticeSex($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 19:
							$x=FtFRepLevelOneDataMining::valueOfIncrementalSalesTABs($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 20:
							$x=FtFRepLevelOneDataMining::valueOfIncrementalSalesTBs($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 24:
							$x=FtFRepLevelOneDataMining::valueOfIncrementalSalesBeans($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25:
							$x=FtFRepLevelOneDataMining::valueOfIncrementalSalesCoffee($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 26:
							$x=FtFRepLevelOneDataMining::valueOfIncrementalSalesMaize($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 27:
							$x=FtFRepLevelOneDataMining::ValueofAgriculturalRuralLoansTypeLR($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 28:
							$x=FtFRepLevelOneDataMining::ValueofAgriculturalRuralLoansSex($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 29:
							$x="SELECT 29 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS actualYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS actualYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS actualYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS actualYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS actualYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS actualYr6
								FROM `tbl_bankloans` 
								where 29=29
								and `numberOfFullTimeEmployees` is not null
								and `numberOfFullTimeEmployees` <>''";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;

							case 30:
							$x="SELECT 30 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1, 0 ) ) AS actualYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS actualYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS actualYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS actualYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS actualYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS actualYr6
								FROM `tbl_bankloans` 
								where 30=30
								and `recipientSex` is not null
								and `recipientSex` not like '-%'
								and `recipientSex` <>''";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;	
							
							case 31:
								$x="SELECT 31 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS actualYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS actualYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS actualYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS actualYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS actualYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS actualYr6
								FROM `tbl_villageagent_groups` as `v` join  `tbl_farmers` as `f`
								on (`f`.`tbl_villageagent_groupsId` = `v`.`tbl_villageagent_groupsId`)
								where 31=31
								and `f`.`groupName` <> ''
								and `f`.`groupName` <> 'No Group'
								and `v`.`groupType` <> ''
								and `v`.`groupType` is not null
								and `f`.`display`='Yes'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 32:
								$x="SELECT 32 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS actualYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS actualYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS actualYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS actualYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS actualYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS actualYr6
								FROM `tbl_farmers` as `f`
								where 32=32
								and `f`.`groupName` <> ''
								and `f`.`groupName` <> 'No Group'
								and `f`.`farmersSex` <> ''
								and `f`.`farmersSex` is not null
								and `f`.`display`='Yes'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 33:
							$x=FtFRepLevelOneDataMining::RiskReducingPracticesType($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 34:
							$x=FtFRepLevelOneDataMining::RiskReducingPracticesSex($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 35:
							$x="SELECT 35 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr6
								FROM `tbl_businessdev` 
								where 35=35
								and numOfEmployee <>''
								and numOfEmployee is not null";

							$query=@Execute($x) or die(http(__line__));
							$result=FetchRecords($query);
							return $result[$resultValue];
							break;
							
							case 36:
							$x="SELECT 36 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr6
								FROM `tbl_businessdev` 
								where 36=36
								and sexOfMSME <>''
								and sexOfMSME is not null";

							$query=@Execute($x) or die(http(__line__));
							$result=FetchRecords($query);
							return $result[$resultValue];
							break;
							
							case 37:
							$x=FtFRepLevelOneDataMining::numPrivateEnterprisesAppleiedTechnologyType($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 38:
							$x=FtFRepLevelOneDataMining::numPrivateEnterprisesAppleiedTechnologyNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 39:
							$x=FtFRepLevelOneDataMining::appliedTechnologiesManagementPracticeFarmers($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 40:
							$x=FtFRepLevelOneDataMining::appliedTechnologiesManagementPracticeOthers($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 41:
							$x=FtFRepLevelOneDataMining::shortTermAgriculturalFoodsecurityTrainingType($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 42:
							$x=FtFRepLevelOneDataMining::shortTermAgriculturalFoodsecurityTrainingSex($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 43:
							$x=FtFRepLevelOneDataMining::StorageCapacityDry($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 44:
							$x=FtFRepLevelOneDataMining::StorageCapacityCold($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 45:
							$x=FtFRepLevelOneDataMining::StorageCapacityDNA($SubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 46:
							$x="SELECT 46 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS actualYr6
								FROM `tbl_businessdev` 
								where 46=46
								and typeOfActorServiced <>''
								and typeOfActorServiced is not null";

							$query=@Execute($x) or die(http(__line__));
							$result=FetchRecords($query);
							return $result[$resultValue];
							break;
							
							}/* End of Switch  statement */

}/* End of l1MiningIndicator method */

################################################## Disaggregates Methods level One #################################################################


//Start:1 Gross margin per unit of land, kilogram, or animal of[Beans] ...
function grossMarginPerUnitOfLandBeans($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Beans(TP)--------------------------- */
							$x="SELECT 1 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdBeansYr1=$result['TotProdBeansYr1'];
								$TotProdBeansYr2=$result['TotProdBeansYr2'];
								$TotProdBeansYr3=$result['TotProdBeansYr3'];
								$TotProdBeansYr4=$result['TotProdBeansYr4'];
								$TotProdBeansYr5=$result['TotProdBeansYr5'];
								$TotProdBeansYr6=$result['TotProdBeansYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 1 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
								$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
								$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
								$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
								$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
								$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 1 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
								$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
								$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
								$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
								$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
								$VolSoldBeansYr6=$result['VolSoldBeansYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 1 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
								$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
								$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
								$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
								$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
								$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 1 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 1=1
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionBeansYr1=convertAcresToHectares($result['unitProductionBeansYr1']);
								$unitProductionBeansYr2=convertAcresToHectares($result['unitProductionBeansYr2']);
								$unitProductionBeansYr3=convertAcresToHectares($result['unitProductionBeansYr3']);
								$unitProductionBeansYr4=convertAcresToHectares($result['unitProductionBeansYr4']);
								$unitProductionBeansYr5=convertAcresToHectares($result['unitProductionBeansYr5']);
								$unitProductionBeansYr6=convertAcresToHectares($result['unitProductionBeansYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

							$st=ExtrapolationFactor(1);
							$query=@Execute($st) or die(http(__line__));
							$result=FetchRecords($query);
							$extrapolationFactorYr1=$result['exFactorYr1'];
							$extrapolationFactorYr2=$result['exFactorYr2'];
							$extrapolationFactorYr3=$result['exFactorYr3'];
							$extrapolationFactorYr4=$result['exFactorYr4'];
							$extrapolationFactorYr5=$result['exFactorYr5'];
							$extrapolationFactorYr6=$result['exFactorYr6'];






								$GrossMarginPerUnitOfLandRecomputedBeansYr1=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr1,$VolSalesBeansYr1,$VolSoldBeansYr1,$inputCostBeansYr1,$unitProductionBeansYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedBeansYr2=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr2,$VolSalesBeansYr2,$VolSoldBeansYr2,$inputCostBeansYr2,$unitProductionBeansYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedBeansYr3=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr3,$VolSalesBeansYr3,$VolSoldBeansYr3,$inputCostBeansYr3,$unitProductionBeansYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedBeansYr4=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr4,$VolSalesBeansYr4,$VolSoldBeansYr4,$inputCostBeansYr4,$unitProductionBeansYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedBeansYr5=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr5,$VolSalesBeansYr5,$VolSoldBeansYr5,$inputCostBeansYr5,$unitProductionBeansYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedBeansYr6=GrossMarginPerUnitOfLandRecomputed($TotProdBeansYr6,$VolSalesBeansYr6,$VolSoldBeansYr6,$inputCostBeansYr6,$unitProductionBeansYr6,$extrapolationFactorYr6);

								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
								return $result[$resultValue];
							}
//End:1 Gross margin per unit of land, kilogram, or animal of[Beans] ...

//Start:2 Gross margin per unit of land, kilogram, or animal of[Beans] ...
function grossMarginPerUnitOfLandCoffee($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Coffee(TP)--------------------------- */
							$x="SELECT 2 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
								$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
								$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
								$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
								$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
								$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 2 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
								$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
								$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
								$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
								$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
								$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 2 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
								$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
								$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
								$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
								$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
								$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 2 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
								$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
								$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
								$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
								$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
								$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 2 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2=2
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionCoffeeYr1=convertAcresToHectares($result['unitProductionCoffeeYr1']);
								$unitProductionCoffeeYr2=convertAcresToHectares($result['unitProductionCoffeeYr2']);
								$unitProductionCoffeeYr3=convertAcresToHectares($result['unitProductionCoffeeYr3']);
								$unitProductionCoffeeYr4=convertAcresToHectares($result['unitProductionCoffeeYr4']);
								$unitProductionCoffeeYr5=convertAcresToHectares($result['unitProductionCoffeeYr5']);
								$unitProductionCoffeeYr6=convertAcresToHectares($result['unitProductionCoffeeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (BEANS) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

								$st=ExtrapolationFactor(2);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								$GrossMarginPerUnitOfLandRecomputedCoffeeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr1,$VolSalesCoffeeYr1,$VolSoldCoffeeYr1,$inputCostCoffeeYr1,$unitProductionCoffeeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr2,$VolSalesCoffeeYr2,$VolSoldCoffeeYr2,$inputCostCoffeeYr2,$unitProductionCoffeeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr3,$VolSalesCoffeeYr3,$VolSoldCoffeeYr3,$inputCostCoffeeYr3,$unitProductionCoffeeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr4,$VolSalesCoffeeYr4,$VolSoldCoffeeYr4,$inputCostCoffeeYr4,$unitProductionCoffeeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr5,$VolSalesCoffeeYr5,$VolSoldCoffeeYr5,$inputCostCoffeeYr5,$unitProductionCoffeeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedCoffeeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdCoffeeYr6,$VolSalesCoffeeYr6,$VolSoldCoffeeYr6,$inputCostCoffeeYr6,$unitProductionCoffeeYr6,$extrapolationFactorYr6);
								
								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
								return $result[$resultValue];
							}
//End:2 Gross margin per unit of land, kilogram, or animal of[Beans] ...

//Start:3 Gross margin per unit of land, kilogram, or animal of[Beans] ...
function grossMarginPerUnitOfLandMaize($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 3 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
								$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
								$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
								$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
								$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
								$TotProdMaizeYr6=$result['TotProdMaizeYr6'];
								
							/* --------Form 6 Value of sales(VS)--------------------------- */
							$x="SELECT 3 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
								$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
								$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
								$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
								$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
								$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);
								
							/* --------Form 6 Volume sold(QS)--------------------------- */
							$x="SELECT 3 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
								$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
								$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
								$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
								$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
								$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];
								
							/* --------Form 6 Input Cost(IC)--------------------------- */
							$x="SELECT 3 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
								$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
								$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
								$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
								$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
								$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
								
							/* --------Form 6 Unit of Production/Area(UP)--------------------------- */
							$x="SELECT 3 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 3=3
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$unitProductionMaizeYr1=convertAcresToHectares($result['unitProductionMaizeYr1']);
								$unitProductionMaizeYr2=convertAcresToHectares($result['unitProductionMaizeYr2']);
								$unitProductionMaizeYr3=convertAcresToHectares($result['unitProductionMaizeYr3']);
								$unitProductionMaizeYr4=convertAcresToHectares($result['unitProductionMaizeYr4']);
								$unitProductionMaizeYr5=convertAcresToHectares($result['unitProductionMaizeYr5']);
								$unitProductionMaizeYr6=convertAcresToHectares($result['unitProductionMaizeYr6']);
								
								/* Calculating Gross Margin Per Unit of land (MAIZE) based on the following formula:
								(((TP*(VS/QS))-IC)/UP)*Extrapolation Factor	 */

								$st=ExtrapolationFactor(3);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								$GrossMarginPerUnitOfLandRecomputedMaizeYr1=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr1,$VolSalesMaizeYr1,$VolSoldMaizeYr1,$inputCostMaizeYr1,$unitProductionMaizeYr1,$extrapolationFactorYr1);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr2=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr2,$VolSalesMaizeYr2,$VolSoldMaizeYr2,$inputCostMaizeYr2,$unitProductionMaizeYr2,$extrapolationFactorYr2);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr3=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr3,$VolSalesMaizeYr3,$VolSoldMaizeYr3,$inputCostMaizeYr3,$unitProductionMaizeYr3,$extrapolationFactorYr3);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr4=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr4,$VolSalesMaizeYr4,$VolSoldMaizeYr4,$inputCostMaizeYr4,$unitProductionMaizeYr4,$extrapolationFactorYr4);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr5=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr5,$VolSalesMaizeYr5,$VolSoldMaizeYr5,$inputCostMaizeYr5,$unitProductionMaizeYr5,$extrapolationFactorYr5);
								$GrossMarginPerUnitOfLandRecomputedMaizeYr6=GrossMarginPerUnitOfLandRecomputed($TotProdMaizeYr6,$VolSalesMaizeYr6,$VolSoldMaizeYr6,$inputCostMaizeYr6,$unitProductionMaizeYr6,$extrapolationFactorYr6);
								
								$result['actualYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
								$result['actualYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
								$result['actualYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
								$result['actualYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
								$result['actualYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
								$result['actualYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
								return $result[$resultValue];
							}
//End:3 Gross margin per unit of land, kilogram, or animal of[Beans] ...

//Start:4  Number of jobs attributed to FTF implementation[Location]
function jobsAttributedToFtFImplementationLocation($SubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 4 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`businessLocation`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 4=4";
							
							 	$query=@Execute($x1) or die(http(__line__));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:4 Number of jobs attributed to FTF implementation[Location]

//Start:5  Number of jobs attributed to FTF implementation[New/Continuing]
function jobsAttributedToFtFImplementationNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 5 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 5=5";
							
							 	$query=@Execute($x1) or die(http(__line__));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1;
								$result['actualYr2']=$jobYr2;
								$result['actualYr3']=$jobYr3;
								$result['actualYr4']=$jobYr4;
								$result['actualYr5']=$jobYr5;
								$result['actualYr6']=$jobYr6;
																
								return $result[$resultValue];
}
//End:5 Number of jobs attributed to FTF implementation[New/Continuing]

//Start:6  Number of jobs attributed to FTF implementation[Sex of job-holder]
function jobsAttributedToFtFImplementationSexJobHolder($SubIndicatorID,$opening_year,$closure_year,$resultValue){
//Enterprise and Tech Adoption
			$x1="SELECT 6 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `tj`.`sexOfJobHolder`<>'' and `tj`.`sexOfJobHolder` not like '-%' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 6=6";
							
							 	$query=@Execute($x1) or die(http(__line__));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 6 as sub_indicatorId,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `sj`.`sexOfJobHolder`<>'' and `sj`.`sexOfJobHolder` not like '-%'  and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_laboursavingtech` as `s`
								join `tbl_labourSavingTech_jobHolder` as `sj` 
								on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
								where 6=6";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$rJobsLabourSaving=@FetchRecords($query);
								$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
								$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
								$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
								$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
								$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
								$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
								
			//Media Programs
			$x3="SELECT 6 as sub_indicatorId,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `mj`.`sexOfJobHolder`<>'' and `mj`.`sexOfJobHolder` not like '-%' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_mediaprograms` as `m`
								join `tbl_mediaProgram_jobHolder` as `mj` 
								on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
								where 6=6";
							
							 	$query=@Execute($x3) or die(http(__line__));
								$rJobsMediaPrograms=@FetchRecords($query);
								$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
								$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
								$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
								$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
								$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
								$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
								
			//Youth Apprentice
			$x4="SELECT 6 as sub_indicatorId,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `yj`.`sexOfJobHolder`<>'' and `yj`.`sexOfJobHolder` not like '-%' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_youthapprentice` as `y`
								join `tbl_apprenticeship_jobHolder` as `yj` 
								on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
								where 6=6";
							
							 	$query=@Execute($x4) or die(http(__line__));
								$rYouthApprentice=@FetchRecords($query);
								$job4Yr1=$rYouthApprentice['noJobsYr1'];
								$job4Yr2=$rYouthApprentice['noJobsYr2'];
								$job4Yr3=$rYouthApprentice['noJobsYr3'];
								$job4Yr4=$rYouthApprentice['noJobsYr4'];
								$job4Yr5=$rYouthApprentice['noJobsYr5'];
								$job4Yr6=$rYouthApprentice['noJobsYr6'];				
	
	
			//Public private partnership
			$x5="SELECT 6 as sub_indicatorId,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_public_private_partnership` as `p` 
								join `tbl_partnership_jobHolder` as `pj` 
								on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
								where 6=6";
							
							 	$query=@Execute($x5) or die(http(__line__));
								$rPrivatePublic=FetchRecords($query);
								$job5Yr1=$rPrivatePublic['noJobsYr1'];
								$job5Yr2=$rPrivatePublic['noJobsYr2'];
								$job5Yr3=$rPrivatePublic['noJobsYr3'];
								$job5Yr4=$rPrivatePublic['noJobsYr4'];
								$job5Yr5=$rPrivatePublic['noJobsYr5'];
								$job5Yr6=$rPrivatePublic['noJobsYr6'];
			
			
			
			//Bank Loans
			$x6="SELECT 6 as sub_indicatorId,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bj`.`sexOfJobHolder`<>'' and `bj`.`sexOfJobHolder` not like '-%' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_bankloans` as `b`
								join `tbl_bank_loans_jobHolder` as `bj` 
								on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
								where 6=6";
							
							 	$query=@Execute($x6) or die(http(__line__));
								$rBankLoans=FetchRecords($query);
								$job6Yr1=$rBankLoans['noJobsYr1'];
								$job6Yr2=$rBankLoans['noJobsYr2'];
								$job6Yr3=$rBankLoans['noJobsYr3'];
								$job6Yr4=$rBankLoans['noJobsYr4'];
								$job6Yr5=$rBankLoans['noJobsYr5'];
								$job6Yr6=$rBankLoans['noJobsYr6'];
								
			//BDS
			$x7="SELECT 6 as sub_indicatorId,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bdsj`.`sexOfJobHolder`<>'' and `bdsj`.`sexOfJobHolder` not like '-%' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_businessdev` as `bds`
								join `tbl_bds_jobHolder` as `bdsj` 
								on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
								where 6=6";
							
							 	$query=@Execute($x7) or die(http(__line__));
								$rBDS=FetchRecords($query);
								$job7Yr1=$rBDS['noJobsYr1'];
								$job7Yr2=$rBDS['noJobsYr2'];
								$job7Yr3=$rBDS['noJobsYr3'];
								$job7Yr4=$rBDS['noJobsYr4'];
								$job7Yr5=$rBDS['noJobsYr5'];
								$job7Yr6=$rBDS['noJobsYr6'];
								
			//Input Sales
			$x8="SELECT 6 as sub_indicatorId,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ij`.`sexOfJobHolder`<>'' and `ij`.`sexOfJobHolder` not like '-%' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 6=6";
							
							 	$query=@Execute($x8) or die(http(__line__));
								$rInputSales=FetchRecords($query);
								$job8Yr1=$rInputSales['noJobsYr1'];
								$job8Yr2=$rInputSales['noJobsYr2'];
								$job8Yr3=$rInputSales['noJobsYr3'];
								$job8Yr4=$rInputSales['noJobsYr4'];
								$job8Yr5=$rInputSales['noJobsYr5'];
								$job8Yr6=$rInputSales['noJobsYr6'];
			
			//PHH
			$x9="SELECT 6 as sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`sexOfJobHolder`<>'' and `pj`.`sexOfJobHolder` not like '-%' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 6=6";
							
							 	$query=@Execute($x9) or die(http(__line__));
								$rPHH=FetchRecords($query);
								$job9Yr1=$rPHH['noJobsYr1'];
								$job9Yr2=$rPHH['noJobsYr2'];
								$job9Yr3=$rPHH['noJobsYr3'];
								$job9Yr4=$rPHH['noJobsYr4'];
								$job9Yr5=$rPHH['noJobsYr5'];
								$job9Yr6=$rPHH['noJobsYr6'];
								
								//Summimg all the Jobs across the different form2's for each of the years
								
								$result['actualYr1']=$jobYr1+$job2Yr1+$job3Yr1+$job4Yr1+$job5Yr1+$job6Yr1+$job7Yr1+$job8Yr1+$job9Yr1;
								$result['actualYr2']=$jobYr2+$job2Yr2+$job3Yr2+$job4Yr2+$job5Yr2+$job6Yr2+$job7Yr2+$job8Yr2+$job9Yr2;
								$result['actualYr3']=$jobYr3+$job2Yr3+$job3Yr3+$job4Yr3+$job5Yr3+$job6Yr3+$job7Yr3+$job8Yr3+$job9Yr3;
								$result['actualYr4']=$jobYr4+$job2Yr4+$job3Yr4+$job4Yr4+$job5Yr4+$job6Yr4+$job7Yr4+$job8Yr4+$job9Yr4;
								$result['actualYr5']=$jobYr5+$job2Yr5+$job3Yr5+$job4Yr5+$job5Yr5+$job6Yr5+$job7Yr5+$job8Yr5+$job9Yr5;
								$result['actualYr6']=$jobYr6+$job2Yr6+$job3Yr6+$job4Yr6+$job5Yr6+$job6Yr6+$job7Yr6+$job8Yr6+$job9Yr6;
																
								return $result[$resultValue];
}
//End:6 Number of jobs attributed to FTF implementation[Sex of job-holder]

//Start:7 Number of food security private enterprises (for profit)...[Type of organization]
function numFarmersFoodsecurityPrivateEnterprisesTypeOfOrganization($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 7 as sub_indicatorId,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ta`.`typeOfBusiness`<>'' and `ta`.`typeOfBusiness` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 7=7";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 7 as sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupType`<>'' and `v`.`groupType` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 17=17
								and `v`.`groupName`<>''";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:7 Number of food security private enterprises (for profit)...[Type of organization]

//Start:8 Number of food security private enterprises (for profit)...[New/Continuing]
function numFarmersFoodsecurityPrivateEnterprisesNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 8 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `t`.`durationWithActivity`<>'' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 8=8";
								$query=@Execute($x) or die(http("FtFRepLOne-16"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 8 as sub_indicatorId,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."' and `v`.`groupStatus`<>'' and `v`.`groupStatus` is not null, 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 8=8
								and `v`.`groupName`<>''";
								$query=@Execute($x2) or die(http("FtFRepLOne-467"));
								$result=FetchRecords($query);
								$numFarmersFrm7Yr1=$result['numFarmersFrm7Yr1'];
								$numFarmersFrm7Yr2=$result['numFarmersFrm7Yr2'];
								$numFarmersFrm7Yr3=$result['numFarmersFrm7Yr3'];
								$numFarmersFrm7Yr4=$result['numFarmersFrm7Yr4'];
								$numFarmersFrm7Yr5=$result['numFarmersFrm7Yr5'];
								$numFarmersFrm7Yr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm7Yr1+$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm7Yr2+$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm7Yr3+$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm7Yr4+$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm7Yr5+$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm7Yr6+$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:8 Number of food security private enterprises (for profit)...[New/Continuing]

//Start:9 Number of public private partnerships formed...[Agricultural production]
function privatePublicPartnershipsAgriculturalProduction($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 9 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus like 'Agricultural production%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 9=9";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:9	Number of public private partnerships formed...[Agricultural production]

//Start:10 Number of public private partnerships formed...[Agricultural post harvest transformation]
function privatePublicPartnershipsAgriculturalPH($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 10 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus like 'Agricultural PH transformation%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 10=10";
								$query=@Execute($x) or die(http("DM-940"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:10	Number of public private partnerships formed...[Agricultural post harvest transformation]

//Start:11 Number of public private partnerships formed...[Nutrition]
//*******This is not available in the current partnership focus options captured as of 09/09/2015*****
function privatePublicPartnershipsNutrition($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 11 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus like 'Nutrition%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 11=11";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:11	Number of public private partnerships formed...[Nutrition]

//Start:12 Number of public private partnerships formed...[Multi-focus]
function privatePublicPartnershipsMultiFocus($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 12 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus like 'Multi-focus%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 12=12";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:12	Number of public private partnerships formed...[Multi-focus]

//Start:13 Number of public private partnerships formed...[Other]
function privatePublicPartnershipsOther($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 13 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 13=13";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:13	Number of public private partnerships formed...[Other]

//Start:14 Number of public private partnerships formed...[Disaggregates Not Available]
function privatePublicPartnershipsDNA($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 14 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and partnershipFocus not like 'Agricultural production%' and partnershipFocus not like 'Agricultural PH transformation%' and partnershipFocus not like 'Nutrition%' and partnershipFocus not like 'Multi-focus%' and partnershipFocus not like 'Others%', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 14=14";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								
								
								
								$result['actualYr1']=$partnershipFrm2Yr1;
								$result['actualYr2']=$partnershipFrm2Yr2;
								$result['actualYr3']=$partnershipFrm2Yr3;
								$result['actualYr4']=$partnershipFrm2Yr4;
								$result['actualYr5']=$partnershipFrm2Yr5;
								$result['actualYr6']=$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//End:14	Number of public private partnerships formed...[Disaggregates Not Available]

//Start:15 Number of rural households benefiting directly...[New/Continuing]
function ruralHouseholdsBenefitingNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 15 as sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'' && `v`.`groupStatus`<>'' && `v`.`groupStatus` is not null, 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` join tbl_villageagent_groups as `v`
								on(`v`.`tbl_villageagent_groupsId`=`f`.`tbl_villageagent_groupsId`)	
								where 15=15
								and `v`.`groupName`<>''
								and `f`.`display`='Yes'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:15 Number of rural households benefiting directly...[New/Continuing]

//Start:16 Number of rural households benefiting directly...[Gendered Household Type]
function ruralHouseholdsBenefitingGHT($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 16 as sub_indicatorId,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'' && `f`.`hsComposition`<>'' && `f`.`hsComposition` is not null, 1, 0 ) ) AS numNotNullHHYr6
								FROM `tbl_farmers` as `f` 
								where 16=16
								and `f`.`display`='Yes'";
								$query=@Execute($x2) or die(http("DM-662"));
								$result=FetchRecords($query);
								$numNotNullHHYr1=$result['numNotNullHHYr1'];
								$numNotNullHHYr2=$result['numNotNullHHYr2'];
								$numNotNullHHYr3=$result['numNotNullHHYr3'];
								$numNotNullHHYr4=$result['numNotNullHHYr4'];
								$numNotNullHHYr5=$result['numNotNullHHYr5'];
								$numNotNullHHYr6=$result['numNotNullHHYr6'];
								
								
								$result['actualYr1']=$numNotNullHHYr1;
								$result['actualYr2']=$numNotNullHHYr2;
								$result['actualYr3']=$numNotNullHHYr3;
								$result['actualYr4']=$numNotNullHHYr4;
								$result['actualYr5']=$numNotNullHHYr5;
								$result['actualYr6']=$numNotNullHHYr6;
								return $result[$resultValue];
							}
//End:16 Number of rural households benefiting directly...[Gendered Household Type]


//Start:17 	Number of hectares under improved technologies or...[Technology type]
function hectaresTechnologiesManagementPracticeTech($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 17 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 17=17
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(20);
								$query=@Execute($st) or die(http("ActivityDataMinning-936"));
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
								$x2="SELECT 17 as sub_indicatorId,
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
								where 17=17";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:17 	Number of hectares under improved technologies or...[Technology type]

//Start:18 	Number of hectares under improved technologies or...[Sex]
function hectaresTechnologiesManagementPracticeSex($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 18 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' ))), 0 )
								) AS numAcresFrm6Yr1,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' ))), 0 )
								) AS numAcresFrm6Yr2,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' ))), 0 )
								) AS numAcresFrm6Yr3,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' ))), 0 )
								) AS numAcresFrm6Yr4,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' ))), 0 )
								) AS numAcresFrm6Yr5,

								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."',
								(((select max(`m`.`maize_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`m`.`maize_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								)||
								((select max(`b`.`beans_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`b`.`beans_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' )
								) ||
								((select max(`c`.`coffee_improved_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_chemical_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_mgt_practices_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ) +
								(select max(`c`.`coffee_machinery_acreage`) from `tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`) where substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' ))), 0 )
								) AS numAcresFrm6Yr6

								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 18=18 
								and `f`.`farmersSex`<>'' 
								and `f`.`farmersSex` is not null
								and `p`.`interview_date` <= ('2015-10-31')
								and `f`.`display`='Yes'";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numAcres1Frm6Yr1=$result['numAcresFrm6Yr1'];
								$numAcres1Frm6Yr2=$result['numAcresFrm6Yr2'];
								$numAcres1Frm6Yr3=$result['numAcresFrm6Yr3'];
								$numAcres1Frm6Yr4=$result['numAcresFrm6Yr4'];
								$numAcres1Frm6Yr5=$result['numAcresFrm6Yr5'];
								$numAcres1Frm6Yr6=$result['numAcresFrm6Yr6'];

								$st=ExtrapolationFactor(20);
								$query=@Execute($st) or die(http("ActivityDataMinning-936"));
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
								$x2="SELECT 18 as sub_indicatorId,
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
								and `dr`.`farmerGender`<>'' 
								and `dr`.`farmerGender` is not null";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['actualYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['actualYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['actualYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['actualYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['actualYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['actualYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//End:18	Number of hectares under improved technologies or...[Sex]

//Start:19 	Value of incremental sales (collected at farm level)...[Total Adjusted Baseline Sales]
function valueOfIncrementalSalesTABs($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){

							//--------From 6 Maize---------------------------
							$x="SELECT 19 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 19=19
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
								$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
								$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
								$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
								$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
								$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];
								
							//=====================Form 6 Beans==============
							$x2="SELECT 19 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 19=19
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
								$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
								$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
								$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
								$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
								$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
								
							//=====================Form 6 Coffee==============
							$x3="SELECT 19 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 19=19
								and `p`.`interview_date` <= ('2015-10-31')";
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
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								$result['actualYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesMaizeYr1+$incrementalSalesBeansYr1+$incrementalSalesCoffeeYr1));
								$result['actualYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesMaizeYr2+$incrementalSalesBeansYr2+$incrementalSalesCoffeeYr2));
								$result['actualYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesMaizeYr3+$incrementalSalesBeansYr3+$incrementalSalesCoffeeYr3));
								$result['actualYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesMaizeYr4+$incrementalSalesBeansYr4+$incrementalSalesCoffeeYr4));
								$result['actualYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesMaizeYr5+$incrementalSalesBeansYr5+$incrementalSalesCoffeeYr5));
								$result['actualYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesMaizeYr6+$incrementalSalesBeansYr6+$incrementalSalesCoffeeYr6));
								return $result[$resultValue];
							}
//End:19	Value of incremental sales (collected at farm level)...[Total Adjusted Baseline Sales]

//Start:20 	Value of incremental sales (collected at farm level)...[Total Baseline sales]
function valueOfIncrementalSalesTBs($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){

							//--------From 6 Maize---------------------------
							$x="SELECT 20 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 20=20
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
								$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
								$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
								$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
								$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
								$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];
								
							//=====================Form 6 Beans==============
							$x2="SELECT 20 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 20=20
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
								$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
								$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
								$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
								$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
								$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
								
							//=====================Form 6 Coffee==============
							$x3="SELECT 20 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 20=20
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x3) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesCoffeeYr1=$result['incrementalSalesCoffeeYr1'];
								$incrementalSalesCoffeeYr2=$result['incrementalSalesCoffeeYr2'];
								$incrementalSalesCoffeeYr3=$result['incrementalSalesCoffeeYr3'];
								$incrementalSalesCoffeeYr4=$result['incrementalSalesCoffeeYr4'];
								$incrementalSalesCoffeeYr5=$result['incrementalSalesCoffeeYr5'];
								$incrementalSalesCoffeeYr6=$result['incrementalSalesCoffeeYr6'];

								
								$result['actualYr1']=(convertShillingsToDollars($incrementalSalesMaizeYr1+$incrementalSalesBeansYr1+$incrementalSalesCoffeeYr1));
								$result['actualYr2']=(convertShillingsToDollars($incrementalSalesMaizeYr2+$incrementalSalesBeansYr2+$incrementalSalesCoffeeYr2));
								$result['actualYr3']=(convertShillingsToDollars($incrementalSalesMaizeYr3+$incrementalSalesBeansYr3+$incrementalSalesCoffeeYr3));
								$result['actualYr4']=(convertShillingsToDollars($incrementalSalesMaizeYr4+$incrementalSalesBeansYr4+$incrementalSalesCoffeeYr4));
								$result['actualYr5']=(convertShillingsToDollars($incrementalSalesMaizeYr5+$incrementalSalesBeansYr5+$incrementalSalesCoffeeYr5));
								$result['actualYr6']=(convertShillingsToDollars($incrementalSalesMaizeYr6+$incrementalSalesBeansYr6+$incrementalSalesCoffeeYr6));
								return $result[$resultValue];
							}
//End:20	Value of incremental sales (collected at farm level)...[Total Baseline sales]

//Start:24 	Value of incremental sales (collected at farm level)...[Total Baseline sales]
function valueOfIncrementalSalesBeans($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){

							
								
							//=====================Form 6 Beans==============
							$x2="SELECT 24 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 24=24
								and `p`.`interview_date` <= ('2015-10-31')";
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
								
						
								
								$result['actualYr1']=(convertShillingsToDollars($extrapolationFactorYr1 * $incrementalSalesBeansYr1));
								$result['actualYr2']=(convertShillingsToDollars($extrapolationFactorYr2 * $incrementalSalesBeansYr2));
								$result['actualYr3']=(convertShillingsToDollars($extrapolationFactorYr3 * $incrementalSalesBeansYr3));
								$result['actualYr4']=(convertShillingsToDollars($extrapolationFactorYr4 * $incrementalSalesBeansYr4));
								$result['actualYr5']=(convertShillingsToDollars($extrapolationFactorYr5 * $incrementalSalesBeansYr5));
								$result['actualYr6']=(convertShillingsToDollars($extrapolationFactorYr6 * $incrementalSalesBeansYr6));
								return $result[$resultValue];
							}
//End:24	Value of incremental sales (collected at farm level)...[Total Baseline sales]

//Start:25 	Value of incremental sales (collected at farm level)...[Total Baseline sales]
function valueOfIncrementalSalesCoffee($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//=====================Form 6 Coffee==============
		$x2="SELECT 25 as sub_indicatorId,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
			FROM `tbl_frm6particulars` as `p`
			join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
			where 25=25
			and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
		$result=FetchRecords($query);
		$incrementalSalesCoffeeYr1=$result['incrementalSalesCoffeeYr1'];
		$incrementalSalesCoffeeYr2=$result['incrementalSalesCoffeeYr2'];
		$incrementalSalesCoffeeYr3=$result['incrementalSalesCoffeeYr3'];
		$incrementalSalesCoffeeYr4=$result['incrementalSalesCoffeeYr4'];
		$incrementalSalesCoffeeYr5=$result['incrementalSalesCoffeeYr5'];
		$incrementalSalesCoffeeYr6=$result['incrementalSalesCoffeeYr6'];
		
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
		

		
		$result['actualYr1']=(convertShillingsToDollars($extrapolationFactorYr1 * $incrementalSalesCoffeeYr1));
		$result['actualYr2']=(convertShillingsToDollars($extrapolationFactorYr2 * $incrementalSalesCoffeeYr2));
		$result['actualYr3']=(convertShillingsToDollars($extrapolationFactorYr3 * $incrementalSalesCoffeeYr3));
		$result['actualYr4']=(convertShillingsToDollars($extrapolationFactorYr4 * $incrementalSalesCoffeeYr4));
		$result['actualYr5']=(convertShillingsToDollars($extrapolationFactorYr5 * $incrementalSalesCoffeeYr5));
		$result['actualYr6']=(convertShillingsToDollars($extrapolationFactorYr6 * $incrementalSalesCoffeeYr6));
	return $result[$resultValue];
}
//End:25	Value of incremental sales (collected at farm level)...[Total Baseline sales]

//Start:26 	Value of incremental sales (collected at farm level)...[Total Baseline sales]
function valueOfIncrementalSalesMaize($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	//=====================Form 6 Maize==============
		$x2="SELECT 26 as sub_indicatorId,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
			sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
			FROM `tbl_frm6particulars` as `p`
			join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
			where 26=26
			and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x2) or die(http(__line__));
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
		

		
		$result['actualYr1']=(convertShillingsToDollars($extrapolationFactorYr1 * $incrementalSalesMaizeYr1));
		$result['actualYr2']=(convertShillingsToDollars($extrapolationFactorYr2 * $incrementalSalesMaizeYr2));
		$result['actualYr3']=(convertShillingsToDollars($extrapolationFactorYr3 * $incrementalSalesMaizeYr3));
		$result['actualYr4']=(convertShillingsToDollars($extrapolationFactorYr4 * $incrementalSalesMaizeYr4));
		$result['actualYr5']=(convertShillingsToDollars($extrapolationFactorYr5 * $incrementalSalesMaizeYr5));
		$result['actualYr6']=(convertShillingsToDollars($extrapolationFactorYr6 * $incrementalSalesMaizeYr6));
	return $result[$resultValue];
}
//End:26	Value of incremental sales (collected at farm level)...[Total Baseline sales]

//Start:27 	Value of Agricultural and Rural Loans[Type of loan recipient]
function ValueofAgriculturalRuralLoansTypeLR($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 27 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 27=27
								and `typeOfLoanRecepient` is not null
								and `typeOfLoanRecepient` <>''";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1);
								$result['actualYr2']=convertShillingsToDollars($loanYr1);
								$result['actualYr3']=convertShillingsToDollars($loanYr3);
								$result['actualYr4']=convertShillingsToDollars($loanYr4);
								$result['actualYr5']=convertShillingsToDollars($loanYr5);
								$result['actualYr6']=convertShillingsToDollars($loanYr6);
								return $result[$resultValue];
							}
//End:27 Value of Agricultural and Rural Loans[Type of loan recipient]

//Start:28 	Value of Agricultural and Rural Loans[Sex of recipient]
function ValueofAgriculturalRuralLoansSex($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 28 as sub_indicatorId,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 28=28
								and `recipientSex` is not null
								and `recipientSex` <>''";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 28 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 28=28
								and `f`.`farmersSex` is not null
								and `f`.`farmersSex` <>''
								and `p`.`interview_date` <= ('2015-10-31')
								and `f`.`display`='Yes'";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								
								//Include incremental factor...
								$st=ExtrapolationFactor(27);
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['actualYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['actualYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['actualYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['actualYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['actualYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
//End:28 Value of Agricultural and Rural Loans[Sex of recipient]


//Start:33 	Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice]
function RiskReducingPracticesType($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 33 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 33=33
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(33);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:33 Number of stakeholders implementing risk-reducing...[Type of Risk reducing practice]

//Start:34 	Number of stakeholders implementing risk-reducing...[Sex]
function RiskReducingPracticesSex($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 34 as sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 34=34
								and `f`.`farmersSex`<>'' 
								and `f`.`farmersSex` is not null
								and `p`.`interview_date` <= ('2015-10-31')
								and `f`.`display`='Yes'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(33);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['actualYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['actualYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['actualYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['actualYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['actualYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['actualYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//End:34 Number of stakeholders implementing risk-reducing...[Sex]

//Start:37 Number of private enterprises (for profit), producer orgs,...[Type of organization]
function numPrivateEnterprisesAppleiedTechnologyType($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 37 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast  is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 37=37
								and `t`.`typeOfBusiness`<>''
								and `t`.`typeOfBusiness`is not null";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:37 Number of private enterprises (for profit), producer orgs,...[Type of organization]

//Start:38 Number of private enterprises (for profit), producer orgs,...[New/Continuing]
function numPrivateEnterprisesAppleiedTechnologyNOC($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//=====================form2 techadoption==============
								$x2="SELECT 38 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 38=38
								and `t`.`durationWithActivity` <> ''
								and `t`.`durationWithActivity` is not null";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								$result['actualYr1']=$numEnterprisesFrm2Yr1;
								$result['actualYr2']=$numEnterprisesFrm2Yr2;
								$result['actualYr3']=$numEnterprisesFrm2Yr3;
								$result['actualYr4']=$numEnterprisesFrm2Yr4;
								$result['actualYr5']=$numEnterprisesFrm2Yr5;
								$result['actualYr6']=$numEnterprisesFrm2Yr6;
								return $result[$resultValue];
							}
//End:38 Number of private enterprises (for profit), producer orgs,...[New/Continuing]

//Start:39 Number of farmers and others who have applied new technologies ...[Producers]
function appliedTechnologiesManagementPracticeFarmers($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 39 as sub_indicatorId,
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
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 39=39
								and `p`.`interview_date` <= ('2015-10-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$num1FarmersFrm6Yr1=$result['numFarmersFrm6Yr1'];
								$num1FarmersFrm6Yr2=$result['numFarmersFrm6Yr2'];
								$num1FarmersFrm6Yr3=$result['numFarmersFrm6Yr3'];
								$num1FarmersFrm6Yr4=$result['numFarmersFrm6Yr4'];
								$num1FarmersFrm6Yr5=$result['numFarmersFrm6Yr5'];
								$num1FarmersFrm6Yr6=$result['numFarmersFrm6Yr6'];


								$st=ExtrapolationFactor(39);
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
								
								$result['actualYr1']=$numFarmersFrm6Yr1;
								$result['actualYr2']=$numFarmersFrm6Yr2;
								$result['actualYr3']=$numFarmersFrm6Yr3;
								$result['actualYr4']=$numFarmersFrm6Yr4;
								$result['actualYr5']=$numFarmersFrm6Yr5;
								$result['actualYr6']=$numFarmersFrm6Yr6;
								return $result[$resultValue];
							}
//End:39 Number of farmers and others who have applied new technologies ...[Producers]

//Start:40 Number of farmers and others who have applied new technologies ...[Others]
function appliedTechnologiesManagementPracticeOthers($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							
								//=====================form2==============
								$x2="SELECT 40 as sub_indicatorId,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 40=40";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								
								$result['actualYr1']=$numFarmersFrm2Yr1;
								$result['actualYr2']=$numFarmersFrm2Yr2;
								$result['actualYr3']=$numFarmersFrm2Yr3;
								$result['actualYr4']=$numFarmersFrm2Yr4;
								$result['actualYr5']=$numFarmersFrm2Yr5;
								$result['actualYr6']=$numFarmersFrm2Yr6;
								return $result[$resultValue];
							}
//End:40 Number of farmers and others who have applied new technologies ...[Others]

//Start:41 	Number of Individuals who have received ...[Type of individual]
function shortTermAgriculturalFoodsecurityTrainingType($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 1---------------------------
							$x="SELECT 41 as sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 41=41
								and `p`.`typeOfIndividual`<>''
								and `p`.`typeOfIndividual` is not null";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								$result['actualYr1']=$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedFrm1Yr6;
								return $result[$resultValue];
							}
//End:41 Number of Individuals who have received ...[Type of individual]

//Start:42 	Number of Individuals who have received ...[Sex]
function shortTermAgriculturalFoodsecurityTrainingSex($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 1---------------------------
							$x="SELECT 42 as sub_indicatorId,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 42=42
								and `p`.`sex`<>''
								and `p`.`sex` is not null";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedFrm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								//=====================form Learning Site (form 8)==============
								$x2="SELECT 42 as sub_indicatorId,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr1,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr2,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr3,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr4,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr5,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr6
								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 42=42
								and `dr`.`farmerGender`<>''
								and `dr`.`farmerGender` is not null";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$notrainedDemoYr1=$result['notrainedDemoYr1'];
								$notrainedDemoYr2=$result['notrainedDemoYr2'];
								$notrainedDemoYr3=$result['notrainedDemoYr3'];
								$notrainedDemoYr4=$result['notrainedDemoYr4'];
								$notrainedDemoYr5=$result['notrainedDemoYr5'];
								$notrainedDemoYr6=$result['notrainedDemoYr6'];
								
								
								$result['actualYr1']=$notrainedDemoYr1+$notrainedFrm1Yr1;
								$result['actualYr2']=$notrainedDemoYr2+$notrainedFrm1Yr2;
								$result['actualYr3']=$notrainedDemoYr3+$notrainedFrm1Yr3;
								$result['actualYr4']=$notrainedDemoYr4+$notrainedFrm1Yr4;
								$result['actualYr5']=$notrainedDemoYr5+$notrainedFrm1Yr5;
								$result['actualYr6']=$notrainedDemoYr6+$notrainedFrm1Yr6;
								return $result[$resultValue];
							}
//End:42 Number of Individuals who have received ...[Sex]

//Start:43 	Total increase in installed storage capacity ...[Dry storage]
function StorageCapacityDry($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------PHH---------------------------
							$x="SELECT 43 as sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 43=43
								and `pj`.`storageTypeForDryGoods` <> ''
								and `pj`.`storageTypeForDryGoods` is not null
								and `pj`.`storageTypeForDryGoods` not like '-%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$storageTraderYr1=$result['storageTraderYr1'];
								$storageTraderYr2=$result['storageTraderYr2'];
								$storageTraderYr3=$result['storageTraderYr3'];
								$storageTraderYr4=$result['storageTraderYr4'];
								$storageTraderYr5=$result['storageTraderYr5'];
								$storageTraderYr6=$result['storageTraderYr6'];
								
								$result['actualYr1']=$storageTraderYr1;
								$result['actualYr2']=$storageTraderYr2;
								$result['actualYr3']=$storageTraderYr3;
								$result['actualYr4']=$storageTraderYr4;
								$result['actualYr5']=$storageTraderYr5;
								$result['actualYr6']=$storageTraderYr6;
								return $result[$resultValue];
							}
//End:43 Total increase in installed storage capacity...[Dry storage]

//Start:44 	Total increase in installed storage capacity ...[Cold storage]
function StorageCapacityCold($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------PHH---------------------------
							$x="SELECT 44 as sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 44=44
								and `pj`.`storageTypeForColdChain` <> ''
								and `pj`.`storageTypeForColdChain` is not null
								and `pj`.`storageTypeForColdChain` not like '-%'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$storageTraderYr1=$result['storageTraderYr1'];
								$storageTraderYr2=$result['storageTraderYr2'];
								$storageTraderYr3=$result['storageTraderYr3'];
								$storageTraderYr4=$result['storageTraderYr4'];
								$storageTraderYr5=$result['storageTraderYr5'];
								$storageTraderYr6=$result['storageTraderYr6'];
								
								$result['actualYr1']=$storageTraderYr1;
								$result['actualYr2']=$storageTraderYr2;
								$result['actualYr3']=$storageTraderYr3;
								$result['actualYr4']=$storageTraderYr4;
								$result['actualYr5']=$storageTraderYr5;
								$result['actualYr6']=$storageTraderYr6;
								return $result[$resultValue];
							}
//End:44Total increase in installed storage capacity ...[Cold storage]

//Start:45 Total increase in installed storage capacity...[Disaggregates Not Available]
function StorageCapacityDNA($SubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------PHH---------------------------
							$x="SELECT 45 as sub_indicatorId,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`storageTypeForColdChain` like '-%' and `pj`.`storageTypeForDryGoods` like '-%', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 45=45";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$storageTraderYr1=$result['storageTraderYr1'];
								$storageTraderYr2=$result['storageTraderYr2'];
								$storageTraderYr3=$result['storageTraderYr3'];
								$storageTraderYr4=$result['storageTraderYr4'];
								$storageTraderYr5=$result['storageTraderYr5'];
								$storageTraderYr6=$result['storageTraderYr6'];
								
								$result['actualYr1']=$storageTraderYr1;
								$result['actualYr2']=$storageTraderYr2;
								$result['actualYr3']=$storageTraderYr3;
								$result['actualYr4']=$storageTraderYr4;
								$result['actualYr5']=$storageTraderYr5;
								$result['actualYr6']=$storageTraderYr6;
								return $result[$resultValue];
							}
//End:45 Total increase in installed storage capacity ...[Disaggregates Not Available]


//End of dissagregated functionality							
							
}/* end of FtFRepLevelOneDataMining Class */

?>