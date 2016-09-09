<?php

 
class DataMining{
 var $IndicatorID;
 var $Query;
 
 	

 
							function DataMining($IndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($IndicatorID=15,$opening_year,$closure_year,$resultValue)
							function MiningIndicator15($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							switch($IndicatorID){
							case 12:
							$x=DataMining::NumFarmersBenefitingFromActivityInterventions($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							
														
							case 13:
							$x=DataMining::grossMarginPerUnitOfLand($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							
							case 14:
							$x=DataMining::valueOfIncrementalSales($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;	
							
							
							case 15:
							$x=DataMining::shortTermAgriculturalFoodsecurityTraining($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							
							case 16:
							$x=DataMining::appliedTechnologiesManagementPractice($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							case 17:
							$x=DataMining::numFarmersFoodsecurityPrivateEnterprises($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							case 18:
							$x="SELECT 18 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS notrainedYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS notrainedYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS notrainedYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS notrainedYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS notrainedYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS notrainedYr6
								FROM `tbl_farmers` as `f`
								where 18=18
								and `f`.`groupName` <> ''
								and `f`.`groupName` <>'No Group'
								and `f`.`display`='Yes'";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								case 19:
								$x=DataMining::numPrivateEnterprisesAppleiedTechnology($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								case 20: 
								$x=DataMining::hectaresTechnologiesManagementPractice($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								case 21:
								$x="SELECT 21 as indicator_id,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr1,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr2,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr3,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr4,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr5,
									sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and laboursavingtech<>'', 1, 0 ) ) AS notrainedYr6
									FROM `tbl_laboursavingtech` where 21=21";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								
								case 22:
								$x=DataMining::inputSales($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 23:
								$x=DataMining::PositiveBenefictsFromInputs($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 24:
								$x=DataMining::PurchasingInputFromVAs($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 25:
								$x="SELECT 25 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and mediaAwarenessMessage<>'', 1, 0 ) ) AS notrainedYr6
								FROM `tbl_mediaprograms` where 25=25";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								case 26:
								$x="SELECT 26 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', num_youthAttachedTotalNew+num_youthAttachedTotalOld, 0 ) ) AS notrainedYr6
								FROM `tbl_youthapprentice` where 26=26";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								//--------------------------Rural Households---------------------------------
								case 27:
								$x=DataMining::ruralHouseholdsBenefiting($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								//-----#28------NUMBER OF jOBS ATTRIBUTED TO FTF IMPLEMENTATTION----------------
								case 28:
								$x=DataMining::jobsAttributedToFtFImplementation($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								//END OF ------#28------NUMBER OF jOBS ATTRIBUTED TO FTF IMPLEMENTATION------------
								
								case 29:
								//-----------Value of Agricultural and Rural Loans---------------------------------
								$x=DataMining::ValueofAgriculturalRuralLoans($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								//-----------MSMEs---------------------------------
								case 30:
								$x="SELECT 30 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and nameMSME <>'', 1,0 ) ) AS notrainedYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and nameMSME <>'', 1, 0 ) ) AS notrainedYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and nameMSME <>'', 1, 0 ) ) AS notrainedYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and nameMSME <>'', 1, 0 ) ) AS notrainedYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and nameMSME <>'', 1, 0 ) ) AS notrainedYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and nameMSME <>'', 1, 0 ) ) AS notrainedYr6
								FROM `tbl_bankloans` where 30=30";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								
								//-----------PRIVATE AND  Public Partneships---------------------------------
								case 31:
								//-----------Value of Agricultural and Rural Loans---------------------------------
								$x=DataMining::privatePublicPartnerships($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								//-----------VALUE of Private Sector investment-------
								case 32:
								$x=DataMining::PrivateSectorInvestment($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 33:
								$x=DataMining::VolumeofExportsTradersExports($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 34:
								$x=DataMining::EpaymentsMade($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								//--------------------BUSINESS DEVELOPMENT SERVICES -------------------------
								case 35:
								$x="SELECT 35 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and valueChain <>'', (actorServedFemale + actorServedMale), 0 ) ) AS notrainedYr6
								FROM `tbl_businessdev` where 35=35";
							
							 	$query=@Execute($x) or die(http("DM-0135"));
								$result=FetchRecords($query);
								return $result[$resultValue];
								break;
								
								case 36:
								$x=DataMining::reductionInpostHarvestLosses($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 37:
								$x=DataMining::StorageCapacity($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 38:
								$x=DataMining::AccesstoProductiveER($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								break;
								
								case 39:
								$x="SELECT 39 as indicator_id,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,0)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr1,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,1)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr2,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,2)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr3,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,3)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr4,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,4)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr5,
								sum( if( `financialYear` = '".TheFinancialYear($opening_year,$closure_year,5)."' and display <>'No', (actualValue), 0 ) ) AS notrainedYr6
								FROM `tbl_indicatortwentyeight` where 39=39";

								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								return $result[$resultValue];
								
								break;

								case 40:
								$x=DataMining::RiskReducingPractices($IndicatorID,$opening_year,$closure_year,$resultValue);
								return $x;
								
								break;
								
								default:
								break;
								
								}	
							}
							

/**************************************************************************************************************
******** Calculations of indicators whose datasources come from more than one CPM data collection form*********

***************************************************************************************************************/	

/* Number of farmers benefiting directly from Activity interventions */
function NumFarmersBenefitingFromActivityInterventions($IndicatorID,$opening_year,$closure_year,$resultValue=""){

								//-----------------Form6 promoted models from which farmers accessed inputs--------------------------------
								$x="SELECT 12 as indicator_id,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum( if( f.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM `tbl_farmers` as f where 12=12 and f.display='Yes'";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);

								$famersYr1=$result['numFarmersFrm7Yr1'];
								$famersYr2=$result['numFarmersFrm7Yr2'];
								$famersYr3=$result['numFarmersFrm7Yr3'];
								$famersYr4=$result['numFarmersFrm7Yr4'];
								$famersYr5=$result['numFarmersFrm7Yr5'];
								$famersYr6=$result['numFarmersFrm7Yr6'];
								
								
								$result['notrainedYr1']=$result['numFarmersFrm7Yr1'];
								$result['notrainedYr2']=$result['numFarmersFrm7Yr1']+$result['numFarmersFrm7Yr2'];
								$result['notrainedYr3']=$result['numFarmersFrm7Yr1']+$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3'];
								$result['notrainedYr4']=$result['numFarmersFrm7Yr1']+$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4'];
								$result['notrainedYr5']=$result['numFarmersFrm7Yr1']+$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5'];
								$result['notrainedYr6']=$result['numFarmersFrm7Yr1']+$result['numFarmersFrm7Yr2']+$result['numFarmersFrm7Yr3']+$result['numFarmersFrm7Yr4']+$result['numFarmersFrm7Yr5']+$result['numFarmersFrm7Yr6'];
								return $result[$resultValue];
							}
	

//--------Gross margin per unit of land, kilogram, or animal of selected product (crop/animal/fisheries selection varies by country)----
function grossMarginPerUnitOfLand($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 13 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`) + (`b`.`beans_harvested`)  + (`c`.`coffee_harvested`) ), 0 ) ) AS TotProdYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 13=13
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
							$x="SELECT 13 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (((`m`.`maize_sold`)*(`m`.`maize_sold_price`)) + ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)) + ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`))), 0 ) ) AS VolSalesYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 13=13
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
							$x="SELECT 13 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`) + (`b`.`beans_sold`) + (`c`.`coffee_sold`)), 0 ) ) AS VolSoldYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 13=13
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
							$x="SELECT 13 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`) + (`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`) + (`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 13=13
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
							$x="SELECT 13 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_acreage`) + (`b`.`beans_acreage`) + (`c`.`coffee_acreage`)), 0 ) ) AS unitProductionYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 13=13
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
								
								$result['notrainedYr1'] = $GrossMarginPerUnitOfLandYr1;
								$result['notrainedYr2'] = $GrossMarginPerUnitOfLandYr2;
								$result['notrainedYr3'] = $GrossMarginPerUnitOfLandYr3;
								$result['notrainedYr4'] = $GrossMarginPerUnitOfLandYr4;
								$result['notrainedYr5'] = $GrossMarginPerUnitOfLandYr5;
								$result['notrainedYr6'] = $GrossMarginPerUnitOfLandYr6;
								return $result[$resultValue];
							}

//Value of incremental sales (collected at farm- level) attributed to FTF implementation
function valueOfIncrementalSales($IndicatorID,$opening_year,$closure_year,$resultValue=""){

							//--------From 6 Maize---------------------------
							$x="SELECT 14 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS incrementalSalesMaizeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesMaizeYr1=$result['incrementalSalesMaizeYr1'];
								$incrementalSalesMaizeYr2=$result['incrementalSalesMaizeYr2'];
								$incrementalSalesMaizeYr3=$result['incrementalSalesMaizeYr3'];
								$incrementalSalesMaizeYr4=$result['incrementalSalesMaizeYr4'];
								$incrementalSalesMaizeYr5=$result['incrementalSalesMaizeYr5'];
								$incrementalSalesMaizeYr6=$result['incrementalSalesMaizeYr6'];
								
							//=====================Form 6 Beans==============
							$x2="SELECT 14 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`beans_sold`)*(`m`.`beans_sold_price`)), 0 ) ) AS incrementalSalesBeansYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$incrementalSalesBeansYr1=$result['incrementalSalesBeansYr1'];
								$incrementalSalesBeansYr2=$result['incrementalSalesBeansYr2'];
								$incrementalSalesBeansYr3=$result['incrementalSalesBeansYr3'];
								$incrementalSalesBeansYr4=$result['incrementalSalesBeansYr4'];
								$incrementalSalesBeansYr5=$result['incrementalSalesBeansYr5'];
								$incrementalSalesBeansYr6=$result['incrementalSalesBeansYr6'];
								
							//=====================Form 6 Coffee==============
							$x3="SELECT 14 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`coffee_sold`)*(`m`.`coffee_sold_price`)), 0 ) ) AS incrementalSalesCoffeeYr6
								FROM `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 14=14
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
								$query=@Execute($st) or die(http("Activity DataMining-462"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								$result['notrainedYr1']=($extrapolationFactorYr1*convertShillingsToDollars($incrementalSalesMaizeYr1+$incrementalSalesBeansYr1+$incrementalSalesCoffeeYr1));
								$result['notrainedYr2']=($extrapolationFactorYr2*convertShillingsToDollars($incrementalSalesMaizeYr2+$incrementalSalesBeansYr2+$incrementalSalesCoffeeYr2));
								$result['notrainedYr3']=($extrapolationFactorYr3*convertShillingsToDollars($incrementalSalesMaizeYr3+$incrementalSalesBeansYr3+$incrementalSalesCoffeeYr3));
								$result['notrainedYr4']=($extrapolationFactorYr4*convertShillingsToDollars($incrementalSalesMaizeYr4+$incrementalSalesBeansYr4+$incrementalSalesCoffeeYr4));
								$result['notrainedYr5']=($extrapolationFactorYr5*convertShillingsToDollars($incrementalSalesMaizeYr5+$incrementalSalesBeansYr5+$incrementalSalesCoffeeYr5));
								$result['notrainedYr6']=($extrapolationFactorYr6*convertShillingsToDollars($incrementalSalesMaizeYr6+$incrementalSalesBeansYr6+$incrementalSalesCoffeeYr6));
								return $result[$resultValue];
							}
							
//--------Number of Individuals who have received U.S. government supported short-term agricultural sector productivity or food security training----
function shortTermAgriculturalFoodsecurityTraining($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 1---------------------------
							$x="SELECT 15 as indicator_id,
								sum( if( t.trainingDate between ('2012-10-01') and ('2013-09-30'), 1, 0 ) ) AS notrainedFrm1Yr1,
								sum( if( t.trainingDate between ('2013-10-01') and ('2014-09-30'), 1, 0 ) ) AS notrainedFrm1Yr2,
								sum( if( t.trainingDate between ('2014-10-01') and ('2015-09-30'), 1, 0 ) ) AS notrainedFrm1Yr3,
								sum( if( t.trainingDate between ('2015-10-01') and ('2016-09-30'), 1, 0 ) ) AS notrainedFrm1Yr4,
								sum( if( t.trainingDate between ('2016-10-01') and ('2017-09-30'), 1, 0 ) ) AS notrainedFrm1Yr5,
								sum( if( t.trainingDate between ('2017-10-01') and ('2018-09-30'), 1, 0 ) ) AS notrainedFrm1Yr6
								FROM `tbl_participants` p
								JOIN tbl_training t ON ( t.tbl_trainingId = p.`trainingId` )
								where 15=15
								and p.display='Yes'";
								$query=@Execute($x) or die(http("DM-409"));
								$result=FetchRecords($query);
								$notrainedFrm1Yr1=$result['notrainedits Frm1Yr1'];
								$notrainedFrm1Yr2=$result['notrainedFrm1Yr2'];
								$notrainedFrm1Yr3=$result['notrainedFrm1Yr3'];
								$notrainedFrm1Yr4=$result['notrainedFrm1Yr4'];
								$notrainedFrm1Yr5=$result['notrainedFrm1Yr5'];
								$notrainedFrm1Yr6=$result['notrainedFrm1Yr6'];
								
								//=====================form Learning Site (form 8)==============
								$x2="SELECT 15 as indicator_id,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr1,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr2,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr3,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr4,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr5,
								sum( if( `d`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `d`.`numTotalPlotA` + `d`.`numTotalPlotB` + `d`.`numTotalPlotC` + `d`.`numTotalPlotD`, 0 ) ) AS notrainedDemoYr6
								FROM `tbl_demo_book_details` as `d`
								JOIN `tbl_demo_records_book` as `dr` ON ( `dr`.`demoId` = `d`.`demoId` )
								where 15=15";
								$query=@Execute($x2) or die(http("DM-429"));
								$result=FetchRecords($query);
								$notrainedDemoYr1=$result['notrainedDemoYr1'];
								$notrainedDemoYr2=$result['notrainedDemoYr2'];
								$notrainedDemoYr3=$result['notrainedDemoYr3'];
								$notrainedDemoYr4=$result['notrainedDemoYr4'];
								$notrainedDemoYr5=$result['notrainedDemoYr5'];
								$notrainedDemoYr6=$result['notrainedDemoYr6'];
								
								
								$result['notrainedYr1']=$notrainedDemoYr1+$notrainedFrm1Yr1;
								$result['notrainedYr2']=$notrainedDemoYr2+$notrainedFrm1Yr2;
								$result['notrainedYr3']=$notrainedDemoYr3+$notrainedFrm1Yr3;
								$result['notrainedYr4']=$notrainedDemoYr4+$notrainedFrm1Yr4;
								$result['notrainedYr5']=$notrainedDemoYr5+$notrainedFrm1Yr5;
								$result['notrainedYr6']=$notrainedDemoYr6+$notrainedFrm1Yr6;
								return $result[$resultValue];
							}
//Number of food security private enterprises (for profit), producer orgs, water user associations, women’s groups, trade and business associations, and community-based organizations receiving U.S. government assistance.							
function numFarmersFoodsecurityPrivateEnterprises($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2---------------------------
							$x="SELECT 17 as indicator_id,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `ta`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `ta`
								where 17=17";
								$query=@Execute($x) or die(http("DM-446"));
								$result=FetchRecords($query);
								$numFarmersFrm2Yr1=$result['numFarmersFrm2Yr1'];
								$numFarmersFrm2Yr2=$result['numFarmersFrm2Yr2'];
								$numFarmersFrm2Yr3=$result['numFarmersFrm2Yr3'];
								$numFarmersFrm2Yr4=$result['numFarmersFrm2Yr4'];
								$numFarmersFrm2Yr5=$result['numFarmersFrm2Yr5'];
								$numFarmersFrm2Yr6=$result['numFarmersFrm2Yr6'];
								
								//=====================form7==============
								$x2="SELECT 17 as indicator_id,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numFarmersFrm7Yr1,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numFarmersFrm7Yr2,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numFarmersFrm7Yr3,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numFarmersFrm7Yr4,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numFarmersFrm7Yr5,
								sum(if(RIGHT(v.reportingPeriod,4) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numFarmersFrm7Yr6
								FROM tbl_villageagent_groups as `v`
								where 17=17
								and `v`.`groupName`<>''
								and `v`.`groupName` <>'No Group'";
								$query=@Execute($x2) or die(http("DM-467"));
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
//Number of farmers and others who have applied new technologies or management practices as a result of U.S. government assistance							
function appliedTechnologiesManagementPractice($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 16 as indicator_id,
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
								where 16=16
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$num1FarmersFrm6Yr1=$result['numFarmersFrm6Yr1'];
								$num1FarmersFrm6Yr2=$result['numFarmersFrm6Yr2'];
								$num1FarmersFrm6Yr3=$result['numFarmersFrm6Yr3'];
								$num1FarmersFrm6Yr4=$result['numFarmersFrm6Yr4'];
								$num1FarmersFrm6Yr5=$result['numFarmersFrm6Yr5'];
								$num1FarmersFrm6Yr6=$result['numFarmersFrm6Yr6'];


								$st=ExtrapolationFactor(16);
								$query=@Execute($st) or die(http("ActivityDataMining-710"));
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
								$x2="SELECT 16 as indicator_id,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and (nameOfImprovedTech <> '' or nameOfImprovedTech  is not null or techAdoptedInReportingPeriod <> '' or techAdoptedInReportingPeriod  is not null or techContinuedFromPast<>'' or techContinuedFromPast is not null), 1, 0 ) ) AS numFarmersFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 16=16";
								$query=@Execute($x2) or die(http("DM-467"));
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
//Number  of private enterprises (for profit), producer orgs, water user associations, women’s groups, trade and business associations, and community-based organizations that applied new technologies or management practices as a result of U.S. government assistance							
function numPrivateEnterprisesAppleiedTechnology($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From6 and form7---------------------------
							$x="SELECT 19 as indicator_id,
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
								where 19=19
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numFarmers1Frm6Yr1=$result['numFarmersFrm6Yr1'];
								$numFarmers1Frm6Yr2=$result['numFarmersFrm6Yr2'];
								$numFarmers1Frm6Yr3=$result['numFarmersFrm6Yr3'];
								$numFarmers1Frm6Yr4=$result['numFarmersFrm6Yr4'];
								$numFarmers1Frm6Yr5=$result['numFarmersFrm6Yr5'];
								$numFarmers1Frm6Yr6=$result['numFarmersFrm6Yr6'];

								$st=ExtrapolationFactor(19);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];

								$numFarmersFrm6Yr1=$numFarmers1Frm6Yr1*$extrapolationFactorYr1;
								$numFarmersFrm6Yr2=$numFarmers1Frm6Yr2*$extrapolationFactorYr2;
								$numFarmersFrm6Yr3=$numFarmers1Frm6Yr3*$extrapolationFactorYr3;
								$numFarmersFrm6Yr4=$numFarmers1Frm6Yr4*$extrapolationFactorYr4;
								$numFarmersFrm6Yr5=$numFarmers1Frm6Yr5*$extrapolationFactorYr5;
								$numFarmersFrm6Yr6=$numFarmers1Frm6Yr6*$extrapolationFactorYr6;
								
								//=====================form2 techadoption==============
								$x2="SELECT 19 as indicator_id,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && (nameOfImprovedTech <> '' || nameOfImprovedTech is not null || techAdoptedInReportingPeriod <> '' || techAdoptedInReportingPeriod is not null || techContinuedFromPast<>'' || techContinuedFromPast is not null), 1, 0 ) ) AS numEnterprisesFrm2Yr6
								FROM `tbl_techadoption` as `t`
								where 19=19";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$numEnterprisesFrm2Yr1=$result['numEnterprisesFrm2Yr1'];
								$numEnterprisesFrm2Yr2=$result['numEnterprisesFrm2Yr2'];
								$numEnterprisesFrm2Yr3=$result['numEnterprisesFrm2Yr3'];
								$numEnterprisesFrm2Yr4=$result['numEnterprisesFrm2Yr4'];
								$numEnterprisesFrm2Yr5=$result['numEnterprisesFrm2Yr5'];
								$numEnterprisesFrm2Yr6=$result['numEnterprisesFrm2Yr6'];
								
								
								
								
								$result['notrainedYr1']=$numEnterprisesFrm2Yr1+$numFarmersFrm6Yr1;
								$result['notrainedYr2']=$numEnterprisesFrm2Yr2+$numFarmersFrm6Yr2;
								$result['notrainedYr3']=$numEnterprisesFrm2Yr3+$numFarmersFrm6Yr3;
								$result['notrainedYr4']=$numEnterprisesFrm2Yr4+$numFarmersFrm6Yr4;
								$result['notrainedYr5']=$numEnterprisesFrm2Yr5+$numFarmersFrm6Yr5;
								$result['notrainedYr6']=$numEnterprisesFrm2Yr6+$numFarmersFrm6Yr6;
								return $result[$resultValue];
							}
//Number of hectares under improved technologies or management practices as a result of U.S. government assistance
function hectaresTechnologiesManagementPractice($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6---------------------------
							$x="SELECT 20 as indicator_id,
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
								where 20=20";
								$query=@Execute($x2) or die(http("DM-649"));
								$result=FetchRecords($query);
								$numAcresFrm8Yr1=$result['numAcresFrm8Yr1'];
								$numAcresFrm8Yr2=$result['numAcresFrm8Yr2'];
								$numAcresFrm8Yr3=$result['numAcresFrm8Yr3'];
								$numAcresFrm8Yr4=$result['numAcresFrm8Yr4'];
								$numAcresFrm8Yr5=$result['numAcresFrm8Yr5'];
								$numAcresFrm8Yr6=$result['numAcresFrm8Yr6'];
								
								
								$result['notrainedYr1']=convertAcresToHectares($numAcresFrm8Yr1+$numAcresFrm6Yr1);
								$result['notrainedYr2']=convertAcresToHectares($numAcresFrm8Yr2+$numAcresFrm6Yr2);
								$result['notrainedYr3']=convertAcresToHectares($numAcresFrm8Yr3+$numAcresFrm6Yr3);
								$result['notrainedYr4']=convertAcresToHectares($numAcresFrm8Yr4+$numAcresFrm6Yr4);
								$result['notrainedYr5']=convertAcresToHectares($numAcresFrm8Yr5+$numAcresFrm6Yr5);
								$result['notrainedYr6']=convertAcresToHectares($numAcresFrm8Yr6+$numAcresFrm6Yr6);
								return $result[$resultValue];
							}
//Number of rural households benefiting directly from U.S. government interventions-Output
function ruralHouseholdsBenefiting($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 7 NULL---------------------------
							
								
								//=====================Household NOT NULL==============
								$x2="SELECT 27 as indicator_id,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numNotNullHHYr1,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' , 1, 0 ) ) AS numNotNullHHYr2,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' , 1, 0 ) ) AS numNotNullHHYr3,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' , 1, 0 ) ) AS numNotNullHHYr4,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' , 1, 0 ) ) AS numNotNullHHYr5,
								sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' , 1, 0 ) ) AS numNotNullHHYr6
								FROM (SELECT distinct(hhName) as hhName, year,display
  										FROM `tbl_farmers`
  										) as `f`  
								where 27=27
								and `f`.`display`='Yes'";
								$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$result['notrainedYr1']=$result['numNotNullHHYr1'];
								$result['notrainedYr2']=$result['numNotNullHHYr1']+$result['numNotNullHHYr2'];
								$result['notrainedYr3']=$result['numNotNullHHYr1']+$result['numNotNullHHYr2']+$result['numNotNullHHYr3'];
								$result['notrainedYr4']=$result['numNotNullHHYr1']+$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4'];
								$result['notrainedYr5']=$result['numNotNullHHYr1']+$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5'];
								$result['notrainedYr6']=$result['numNotNullHHYr1']+$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5']+$result['numNotNullHHYr6'];
								
							return $result[$resultValue];
							}
//Number of jobs attributed to FTF implementation							
function jobsAttributedToFtFImplementation($IndicatorID,$opening_year,$closure_year,$resultValue){
	
			//Enterprise and Tech Adoption
			$x1="SELECT 28 as indicator_id,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `tj`.`nameOfJobHolder` <>'' and `tj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobs1Yr6
								FROM `tbl_techadoption` as `t` 
								join `tbl_tech_adoption_jobHolder` as `tj` 
								on `tj`.`techAdoption_id`=`t`.`tbl_techadoptionId`
								where 28=28";
							
							 	$query=@Execute($x1) or die(http(__line__));
								$rTechAdoption=FetchRecords($query);
								$jobYr1=$rTechAdoption['noJobs1Yr1'];
								$jobYr2=$rTechAdoption['noJobs1Yr2'];
								$jobYr3=$rTechAdoption['noJobs1Yr3'];
								$jobYr4=$rTechAdoption['noJobs1Yr4'];
								$jobYr5=$rTechAdoption['noJobs1Yr5'];
								$jobYr6=$rTechAdoption['noJobs1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 28 as indicator_id,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `sj`.`nameOfJobHolder` <>'' and `sj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_laboursavingtech` as `s`
								join `tbl_labourSavingTech_jobHolder` as `sj` 
								on `sj`.`labour_saving_tech_id`=`s`.`tbl_laboursavingtechId`
								where 28=28";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$rJobsLabourSaving=@FetchRecords($query);
								$job2Yr1=$rJobsLabourSaving['noJobsYr1'];
								$job2Yr2=$rJobsLabourSaving['noJobsYr2'];
								$job2Yr3=$rJobsLabourSaving['noJobsYr3'];
								$job2Yr4=$rJobsLabourSaving['noJobsYr4'];
								$job2Yr5=$rJobsLabourSaving['noJobsYr5'];
								$job2Yr6=$rJobsLabourSaving['noJobsYr6'];
								
			//Media Programs
			$x3="SELECT 28 as indicator_id,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `m`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `mj`.`nameOfJobHolder` <>'' and `mj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_mediaprograms` as `m`
								join `tbl_mediaProgram_jobHolder` as `mj` 
								on `mj`.`media_program_id`=`m`.`tbl_mediaprogramsId`
								where 28=28";
							
							 	$query=@Execute($x3) or die(http(__line__));
								$rJobsMediaPrograms=@FetchRecords($query);
								$job3Yr1=$rJobsMediaPrograms['noJobsYr1'];
								$job3Yr2=$rJobsMediaPrograms['noJobsYr2'];
								$job3Yr3=$rJobsMediaPrograms['noJobsYr3'];
								$job3Yr4=$rJobsMediaPrograms['noJobsYr4'];
								$job3Yr5=$rJobsMediaPrograms['noJobsYr5'];
								$job3Yr6=$rJobsMediaPrograms['noJobsYr6'];
								
			//Youth Apprentice
			$x4="SELECT 28 as indicator_id,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `y`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `yj`.`nameOfJobHolder` <>'' and `yj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_youthapprentice` as `y`
								join `tbl_apprenticeship_jobHolder` as `yj` 
								on `yj`.`apprenticeship_id`=`y`.`tbl_youthapprenticeId`
								where 28=28";
							
							 	$query=@Execute($x4) or die(http(__line__));
								$rYouthApprentice=@FetchRecords($query);
								$job4Yr1=$rYouthApprentice['noJobsYr1'];
								$job4Yr2=$rYouthApprentice['noJobsYr2'];
								$job4Yr3=$rYouthApprentice['noJobsYr3'];
								$job4Yr4=$rYouthApprentice['noJobsYr4'];
								$job4Yr5=$rYouthApprentice['noJobsYr5'];
								$job4Yr6=$rYouthApprentice['noJobsYr6'];				
	
	
			//Public private partnership
			$x5="SELECT 28 as indicator_id,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_public_private_partnership` as `p` 
								join `tbl_partnership_jobHolder` as `pj` 
								on `pj`.`partnership_id`=`p`.`tbl_partnershipId`
								where 28=28";
							
							 	$query=@Execute($x5) or die(http(__line__));
								$rPrivatePublic=FetchRecords($query);
								$job5Yr1=$rPrivatePublic['noJobsYr1'];
								$job5Yr2=$rPrivatePublic['noJobsYr2'];
								$job5Yr3=$rPrivatePublic['noJobsYr3'];
								$job5Yr4=$rPrivatePublic['noJobsYr4'];
								$job5Yr5=$rPrivatePublic['noJobsYr5'];
								$job5Yr6=$rPrivatePublic['noJobsYr6'];
			
			
			
			//Bank Loans
			$x6="SELECT 28 as indicator_id,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `b`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bj`.`nameOfJobHolder` <>'' and `bj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_bankloans` as `b`
								join `tbl_bank_loans_jobHolder` as `bj` 
								on `bj`.`bankLoan_id`=`b`.`tbl_bankLoanId`
								where 28=28";
							
							 	$query=@Execute($x6) or die(http(__line__));
								$rBankLoans=FetchRecords($query);
								$job6Yr1=$rBankLoans['noJobsYr1'];
								$job6Yr2=$rBankLoans['noJobsYr2'];
								$job6Yr3=$rBankLoans['noJobsYr3'];
								$job6Yr4=$rBankLoans['noJobsYr4'];
								$job6Yr5=$rBankLoans['noJobsYr5'];
								$job6Yr6=$rBankLoans['noJobsYr6'];
								
			//BDS
			$x7="SELECT 28 as indicator_id,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `bds`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `bdsj`.`nameOfJobHolder` <>'' and `bdsj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_businessdev` as `bds`
								join `tbl_bds_jobHolder` as `bdsj` 
								on `bdsj`.`bds_id`=`bds`.`tbl_businessdevId`
								where 28=28";
							
							 	$query=@Execute($x7) or die(http(__line__));
								$rBDS=FetchRecords($query);
								$job7Yr1=$rBDS['noJobsYr1'];
								$job7Yr2=$rBDS['noJobsYr2'];
								$job7Yr3=$rBDS['noJobsYr3'];
								$job7Yr4=$rBDS['noJobsYr4'];
								$job7Yr5=$rBDS['noJobsYr5'];
								$job7Yr6=$rBDS['noJobsYr6'];
								
			//Input Sales
			$x8="SELECT 28 as indicator_id,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `ij`.`nameOfJobHolder` <>'' and `ij`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 28=28";
							
							 	$query=@Execute($x8) or die(http(__line__));
								$rInputSales=FetchRecords($query);
								$job8Yr1=$rInputSales['noJobsYr1'];
								$job8Yr2=$rInputSales['noJobsYr2'];
								$job8Yr3=$rInputSales['noJobsYr3'];
								$job8Yr4=$rInputSales['noJobsYr4'];
								$job8Yr5=$rInputSales['noJobsYr5'];
								$job8Yr6=$rInputSales['noJobsYr6'];
			
			//PHH
			$x9="SELECT 28 as indicator_id,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and `pj`.`nameOfJobHolder` <>'' and `pj`.`nameOfJobHolder` not like '-%', 1, 0 ) ) AS noJobsYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 28=28";
							
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
//Number of public-private partnerships formed as a result of FTF assistance 
function privatePublicPartnerships($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 Public Private Partnerships---------------------------
							$x="SELECT 31 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS partnershipFrm2Yr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS partnershipFrm2Yr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS partnershipFrm2Yr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS partnershipFrm2Yr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS partnershipFrm2Yr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS partnershipFrm2Yr6
								FROM `tbl_public_private_partnership` where 31=31";
								$query=@Execute($x) or die(http("DM-766"));
								$result=FetchRecords($query);
								$partnershipFrm2Yr1=$result['partnershipFrm2Yr1'];
								$partnershipFrm2Yr2=$result['partnershipFrm2Yr2'];
								$partnershipFrm2Yr3=$result['partnershipFrm2Yr3'];
								$partnershipFrm2Yr4=$result['partnershipFrm2Yr4'];
								$partnershipFrm2Yr5=$result['partnershipFrm2Yr5'];
								$partnershipFrm2Yr6=$result['partnershipFrm2Yr6'];
								
								//=====================form 2 Enterprise Technology Adoption==============
								$x2="SELECT 31 as indicator_id,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS techAdoptionFrm2Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS techAdoptionFrm2Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS techAdoptionFrm2Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS techAdoptionFrm2Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS techAdoptionFrm2Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS techAdoptionFrm2Yr6
								FROM `tbl_techadoption` as `t`  
								where 31=31";
								$query=@Execute($x2) or die(http("DM-785"));
								$result=FetchRecords($query);
								$techAdoptionFrm2Yr1=$result['techAdoptionFrm2Yr1'];
								$techAdoptionFrm2Yr2=$result['techAdoptionFrm2Yr2'];
								$techAdoptionFrm2Yr3=$result['techAdoptionFrm2Yr3'];
								$techAdoptionFrm2Yr4=$result['techAdoptionFrm2Yr4'];
								$techAdoptionFrm2Yr5=$result['techAdoptionFrm2Yr5'];
								$techAdoptionFrm2Yr6=$result['techAdoptionFrm2Yr6'];
								
								
								$result['notrainedYr1']=$techAdoptionFrm2Yr1+$partnershipFrm2Yr1;
								$result['notrainedYr2']=$techAdoptionFrm2Yr2+$partnershipFrm2Yr2;
								$result['notrainedYr3']=$techAdoptionFrm2Yr3+$partnershipFrm2Yr3;
								$result['notrainedYr4']=$techAdoptionFrm2Yr4+$partnershipFrm2Yr4;
								$result['notrainedYr5']=$techAdoptionFrm2Yr5+$partnershipFrm2Yr5;
								$result['notrainedYr6']=$techAdoptionFrm2Yr6+$partnershipFrm2Yr6;
								return $result[$resultValue];
							}
//Value of new private sector investment in the agriculture sector or food chain leveraged by FTF implementation  
function PrivateSectorInvestment($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							
			//Enterprise and Tech Adoption
			$x1="SELECT 32 as indicator_id,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr1,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr2,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr3,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr4,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr5,
								sum( if( `t`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `t`.`amountInvestedInTechAdoption`, 0 ) ) AS amountInvested1Yr6
								FROM `tbl_techadoption` as `t`
								where 32=32";
							
							 	$query=@Execute($x1) or die(http("DM-1022"));
								$rTechAdoption=FetchRecords($query);
								$amountYr1=$rTechAdoption['amountInvested1Yr1'];
								$amountYr2=$rTechAdoption['amountInvested1Yr2'];
								$amountYr3=$rTechAdoption['amountInvested1Yr3'];
								$amountYr4=$rTechAdoption['amountInvested1Yr4'];
								$amountYr5=$rTechAdoption['amountInvested1Yr5'];
								$amountYr6=$rTechAdoption['amountInvested1Yr6'];
								
			//Labour Saving Technology
			$x2="SELECT 32 as indicator_id,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr1,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr2,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr3,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr4,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr5,
								sum( if( `s`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `s`.`amountInvestedOnTechInvestment`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_laboursavingtech` as `s`
								where 32=32";
							
							 	$query=@Execute($x2) or die(http("DM-1042"));
								$rJobsLabourSaving=@FetchRecords($query);
								$amount2Yr1=$rJobsLabourSaving['amountInvestedYr1'];
								$amount2Yr2=$rJobsLabourSaving['amountInvestedYr2'];
								$amount2Yr3=$rJobsLabourSaving['amountInvestedYr3'];
								$amount2Yr4=$rJobsLabourSaving['amountInvestedYr4'];
								$amount2Yr5=$rJobsLabourSaving['amountInvestedYr5'];
								$amount2Yr6=$rJobsLabourSaving['amountInvestedYr6'];
								
			//Public private partnership
			$x3="SELECT 32 as indicator_id,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr1,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr2,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr3,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr4,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr5,
								sum( if( `p`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `p`.`valuePartner`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_public_private_partnership` as `p`
								where 32=32";
							
							 	$query=@Execute($x3) or die(http("DM-1062"));
								$rPrivatePublic=FetchRecords($query);
								$amount3Yr1=$rPrivatePublic['amountInvestedYr1'];
								$amount3Yr2=$rPrivatePublic['amountInvestedYr2'];
								$amount3Yr3=$rPrivatePublic['amountInvestedYr3'];
								$amount3Yr4=$rPrivatePublic['amountInvestedYr4'];
								$amount3Yr5=$rPrivatePublic['amountInvestedYr5'];
								$amount3Yr6=$rPrivatePublic['amountInvestedYr6'];
			//Input Sales
			$x4="SELECT 32 as indicator_id,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr1,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr2,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr3,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr4,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr5,
								sum( if( `ij`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `ij`.`amountInvestedInSettingUpInputSalesBusiness`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_input_sales` as `i`
								join `tbl_input_sales_meta_data` as `ij` 
								on `ij`.`input_sales_id`=`i`.`id`
								where 32=32";
							
							 	$query=@Execute($x4) or die(http("DM-1083"));
								$rInputSales=FetchRecords($query);
								$amount4Yr1=$rInputSales['amountInvestedYr1'];
								$amount4Yr2=$rInputSales['amountInvestedYr2'];
								$amount4Yr3=$rInputSales['amountInvestedYr3'];
								$amount4Yr4=$rInputSales['amountInvestedYr4'];
								$amount4Yr5=$rInputSales['amountInvestedYr5'];
								$amount4Yr6=$rInputSales['amountInvestedYr6'];
								
			//PHH
			$x5="SELECT 32 as indicator_id,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`amountInvestedInRefurbishing`, 0 ) ) AS amountInvestedYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 32=32";
							
							 	$query=@Execute($x5) or die(http("DM-1105"));
								$rPHH=FetchRecords($query);
								$amount5Yr1=$rPHH['amountInvestedYr1'];
								$amount5Yr2=$rPHH['amountInvestedYr2'];
								$amount5Yr3=$rPHH['amountInvestedYr3'];
								$amount5Yr4=$rPHH['amountInvestedYr4'];
								$amount5Yr5=$rPHH['amountInvestedYr5'];
								$amount5Yr6=$rPHH['amountInvestedYr6'];
								
								//Summimg all the Amounts invested across the different form2's for each of the years
								
								$result['notrainedYr1']=convertShillingsToDollars($amountYr1+$amount2Yr1+$amount3Yr1+$amount4Yr1+$amount5Yr1);
								$result['notrainedYr2']=convertShillingsToDollars($amountYr2+$amount2Yr2+$amount3Yr2+$amount4Yr2+$amount5Yr2);
								$result['notrainedYr3']=convertShillingsToDollars($amountYr3+$amount2Yr3+$amount3Yr3+$amount4Yr3+$amount5Yr3);
								$result['notrainedYr4']=convertShillingsToDollars($amountYr4+$amount2Yr4+$amount3Yr4+$amount4Yr4+$amount5Yr4);
								$result['notrainedYr5']=convertShillingsToDollars($amountYr5+$amount2Yr5+$amount3Yr5+$amount4Yr5+$amount5Yr5);
								$result['notrainedYr6']=convertShillingsToDollars($amountYr6+$amount2Yr6+$amount3Yr6+$amount4Yr6+$amount5Yr6);
																
								return $result[$resultValue];
							}

//--------traders and exporters----
//Volume of exports by Activity assisted traders and exporters
function VolumeofExportsTradersExports($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//---------------------------Form 3 volumes---------------------------
							$x="SELECT 33 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr6
								FROM `tbl_form3_exporters` where 33=33";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$VolumeofExportYr1=$result['VolumeofExportYr1'];
								$VolumeofExportYr2=$result['VolumeofExportYr2'];
								$VolumeofExportYr3=$result['VolumeofExportYr3'];
								$VolumeofExportYr4=$result['VolumeofExportYr4'];
								$VolumeofExportYr5=$result['VolumeofExportYr5'];
								$VolumeofExportYr6=$result['VolumeofExportYr6'];
								
								//=====================form 4 volumes==============
								$x2="SELECT 33 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', volMaizeEx+volCoffeeEx+volBeansEx,0 ) ) AS VolumeofExportYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', volMaizeEx+volCoffeeEx+volBeansEx, 0 ) ) AS VolumeofExportYr6
								FROM `tbl_form4_traders` where 33=33";
							
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
//-----------Number of e-payments completed by value chain actors as a result of the activity’s promotion of USAID’s Better than Cash Initiative-----------------------
//--------traders and exporters----
function EpaymentsMade($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------Form 4---------------------------
							$x="SELECT 34 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeYr6
								FROM `tbl_form4_traders` where 34=34";
							
							 	$query=@Execute($x) or die(http("DM-1189"));
								$result=FetchRecords($query);
								$epayMadeYr1=$result['epayMadeYr1'];
								$epayMadeYr2=$result['epayMadeYr2'];
								$epayMadeYr3=$result['epayMadeYr3'];
								$epayMadeYr4=$result['epayMadeYr4'];
								$epayMadeYr5=$result['epayMadeYr5'];
								$epayMadeYr6=$result['epayMadeYr6'];
								
								//=====================form 3==============
								$x2="SELECT 34 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', (epayMade+epayRecieved), 0 ) ) AS epayMadeExportersYr6
								FROM `tbl_form3_exporters` where 34=34";
							
							 	$query=@Execute($x2) or die(http("DM-1208"));
								$result=FetchRecords($query);
								$epayMadeExportersYr1=$result['epayMadeExportersYr1'];
								$epayMadeExportersYr2=$result['epayMadeExportersYr2'];
								$epayMadeExportersYr3=$result['epayMadeExportersYr3'];
								$epayMadeExportersYr4=$result['epayMadeExportersYr4'];
								$epayMadeExportersYr5=$result['epayMadeExportersYr5'];
								$epayMadeExportersYr6=$result['epayMadeExportersYr6'];
								
								
								
								$result['notrainedYr1']=$epayMadeExportersYr1+$epayMadeYr1;
								$result['notrainedYr2']=$epayMadeExportersYr2+$epayMadeYr2;
								$result['notrainedYr3']=$epayMadeExportersYr3+$epayMadeYr3;
								$result['notrainedYr4']=$epayMadeExportersYr4+$epayMadeYr4;
								$result['notrainedYr5']=$epayMadeExportersYr5+$epayMadeYr5;
								$result['notrainedYr6']=$epayMadeExportersYr6+$epayMadeYr6;
								return $result[$resultValue];
							}
//Reduction in post-harvest losses by activity-assisted smallholders
function reductionInpostHarvestLosses ($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6 Qn 30---------------------------
							$x="SELECT 36 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvest_loss` + `m`.`maize_harvest_loss` + `c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6Yr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`m`.`fk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								where 36=36
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
								$x2="SELECT 36 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvested` + `m`.`maize_harvested` + `c`.`coffee_harvested`), 0 ) ) AS totProductionYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`m`.`fk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								where 36=36
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
								$st=ExtrapolationFactor(36);
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

function StorageCapacity($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------PHH---------------------------
							$x="SELECT 37 as indicator_id,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr1,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr2,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr3,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr4,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr5,
								sum( if( `pj`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', `pj`.`sizeOfStoreRefurbished`, 0 ) ) AS storageTraderYr6
								FROM `tbl_phh` as `p`
								join `tbl_phh_meta_data` as `pj` 
								on `pj`.`phh_id`=`p`.`id`
								where 37=37";
							
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
							
//-------- Percentage of female participants in U.S. government-assisted programs designed to increase access to productive economic resources----
function AccesstoProductiveER($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//---------------------------Form1 Totals--------------------------
							$x="SELECT 38 as indicator_id,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numTrainedYr1,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numTrainedYr2,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numTrainedYr3,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numTrainedYr4,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numTrainedYr5,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numTrainedYr6
								FROM `tbl_training` as `t`
								join `tbl_participants` as `p` 
								on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
								where 38=38";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$numTotTrainedYr1=$result['numTrainedYr1'];
								$numTotTrainedYr2=$result['numTrainedYr2'];
								$numTotTrainedYr3=$result['numTrainedYr3'];
								$numTotTrainedYr4=$result['numTrainedYr4'];
								$numTotTrainedYr5=$result['numTrainedYr5'];
								$numTotTrainedYr6=$result['numTrainedYr6'];
								
								//=====================Form 1 Females Trained==============
								$x2="SELECT 38 as indicator_id,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr1,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr2,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr3,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr4,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr5,
								sum( if( substr( `t`.`trainingDate`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && `p`.`sex`='Female', 1, 0 ) ) AS numFemaleTrainedYr6
								FROM `tbl_training` as `t`
								join `tbl_participants` as `p` 
								on (`p`.`trainingId` = `t`.`tbl_trainingId`) 
								where 38=38";
							
							 	$query=@Execute($x2) or die(http("DM-1236"));
								$result=FetchRecords($query);
								$numFemaleTrainedYr1=$result['numFemaleTrainedYr1'];
								$numFemaleTrainedYr2=$result['numFemaleTrainedYr2'];
								$numFemaleTrainedYr3=$result['numFemaleTrainedYr3'];
								$numFemaleTrainedYr4=$result['numFemaleTrainedYr4'];
								$numFemaleTrainedYr5=$result['numFemaleTrainedYr5'];
								$numFemaleTrainedYr6=$result['numFemaleTrainedYr6'];
								
								
								
								$result['notrainedYr1']=convertToPercentages($numFemaleTrainedYr1,$numTotTrainedYr1);
								$result['notrainedYr2']=convertToPercentages($numFemaleTrainedYr2,$numTotTrainedYr2);
								$result['notrainedYr3']=convertToPercentages($numFemaleTrainedYr3,$numTotTrainedYr3);
								$result['notrainedYr4']=convertToPercentages($numFemaleTrainedYr4,$numTotTrainedYr4);
								$result['notrainedYr5']=convertToPercentages($numFemaleTrainedYr5,$numTotTrainedYr5);
								$result['notrainedYr6']=convertToPercentages($numFemaleTrainedYr6,$numTotTrainedYr6);
								
								return $result[$resultValue];
							}
//----------Number of stakeholders implementing risk-reducing practices/actions to improve resilience to climate change as a result of USG assistance ---------------------
function RiskReducingPractices($IndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------From 6 Qn 3 and 4---------------------------
								$x="SELECT 40 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 40=40
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(40);
								$query=@Execute($st) or die(http("DM-1683"));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['notrainedYr1']= ($riskReducingPracticeYr1*$extrapolationFactorYr1);
								$result['notrainedYr2']= ($riskReducingPracticeYr2*$extrapolationFactorYr2);
								$result['notrainedYr3']= ($riskReducingPracticeYr3*$extrapolationFactorYr3);
								$result['notrainedYr4']= ($riskReducingPracticeYr4*$extrapolationFactorYr4);
								$result['notrainedYr5']= ($riskReducingPracticeYr5*$extrapolationFactorYr5);
								$result['notrainedYr6']= ($riskReducingPracticeYr6*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
//Value of Agricultural and Rural Loans							
function ValueofAgriculturalRuralLoans($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 2 bank loans---------------------------
							$x="SELECT 29 as indicator_id,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,0)."', amountLoanAccessed, 0 ) ) AS loanYr1,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,1)."', amountLoanAccessed, 0 ) ) AS loanYr2,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,2)."', amountLoanAccessed, 0 ) ) AS loanYr3,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,3)."', amountLoanAccessed, 0 ) ) AS loanYr4,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,4)."', amountLoanAccessed, 0 ) ) AS loanYr5,
								sum( if( `year` = '".TheFinancialYear($opening_year,$closure_year,5)."', amountLoanAccessed, 0 ) ) AS loanYr6
								FROM `tbl_bankloans` where 29=29";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$loanYr1=$result['loanYr1'];
								$loanYr2=$result['loanYr2'];
								$loanYr3=$result['loanYr3'];
								$loanYr4=$result['loanYr4'];
								$loanYr5=$result['loanYr5'];
								$loanYr6=$result['loanYr6'];
								
								//=====================form 6 survey Loan Accessed==============
								$x2="SELECT 29 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', `q`.`loan_accessed`, 0 ) ) AS loanForm6Yr6
								from `tbl_frm6particulars` as `p` 
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 29=29
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$loanForm6Yr1=$result['loanForm6Yr1'];
								$loanForm6Yr2=$result['loanForm6Yr2'];
								$loanForm6Yr3=$result['loanForm6Yr3'];
								$loanForm6Yr4=$result['loanForm6Yr4'];
								$loanForm6Yr5=$result['loanForm6Yr5'];
								$loanForm6Yr6=$result['loanForm6Yr6'];
								
								//Include incremental factor...
								$st=ExtrapolationFactor(29);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['notrainedYr1']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr1*$loanForm6Yr1));
								$result['notrainedYr2']=convertShillingsToDollars($loanYr1+($extrapolationFactorYr2*$loanForm6Yr2));
								$result['notrainedYr3']=convertShillingsToDollars($loanYr3+($extrapolationFactorYr3*$loanForm6Yr3));
								$result['notrainedYr4']=convertShillingsToDollars($loanYr4+($extrapolationFactorYr4*$loanForm6Yr4));
								$result['notrainedYr5']=convertShillingsToDollars($loanYr5+($extrapolationFactorYr5*$loanForm6Yr5));
								$result['notrainedYr6']=convertShillingsToDollars($loanYr6+($extrapolationFactorYr6*$loanForm6Yr6));
								return $result[$resultValue];
							}
							
//Input sales
function inputSales($IndicatorID,$opening_year,$closure_year,$resultValue=""){
								//-----------------input sales--------------------------------
								$x="SELECT 22 as indicator_id,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr1,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr2,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr3,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr4,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr5,
									sum( if( `im`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr6
									FROM `tbl_input_sales_meta_data` as `im`
									join `tbl_input_sales` as `i` 
									on (`im`.`input_sales_id`= `i`.`id`)
									where 22=22";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$inputSalesYr1=$result['inputSalesYr1'];
								$inputSalesYr2=$result['inputSalesYr2'];
								$inputSalesYr3=$result['inputSalesYr3'];
								$inputSalesYr4=$result['inputSalesYr4'];
								$inputSalesYr5=$result['inputSalesYr5'];
								$inputSalesYr6=$result['inputSalesYr6'];
								
								$result['notrainedYr1']=convertShillingsToDollars($inputSalesYr1);
								$result['notrainedYr2']=convertShillingsToDollars($inputSalesYr2);
								$result['notrainedYr3']=convertShillingsToDollars($inputSalesYr3);
								$result['notrainedYr4']=convertShillingsToDollars($inputSalesYr4);
								$result['notrainedYr5']=convertShillingsToDollars($inputSalesYr5);
								$result['notrainedYr6']=convertShillingsToDollars($inputSalesYr6);
								return $result[$resultValue];
							}

//---------------Percentage of farmers acknowledging positive benefits from the accessed inputs	
function PositiveBenefictsFromInputs($IndicatorID,$opening_year,$closure_year,$resultValue=""){
								//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
								$x="SELECT 23 as indicator_id,
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

								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`m`.`fk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								where 23=23
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
							$x4="SELECT 23 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 23=23
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
								$st=ExtrapolationFactor(23);
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
//---------------Percentage of farmers purchasing inputs from village agents and other promoted models--------------
function PurchasingInputFromVAs($IndicatorID,$opening_year,$closure_year,$resultValue=""){

								//-----------------Form6 promoted models from which farmers accessed inputs--------------------------------
								$x="SELECT 24 as indicator_id,
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

								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`m`.`fk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								where 24=24
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
								$x4="SELECT 24 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`b`.`fk_patid`)
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`c`.`fk_patid`)
								where 24=24
								and `p`.`interview_date` not between ('2013-01-01') and ('2015-03-31')";
								$query=@Execute($x4) or die(http(__line__));
								$result=FetchRecords($query);
								$TotNumFarmersSurveyedYr1=$result['TotNumFarmersSurveyedYr1'];
								$TotNumFarmersSurveyedYr2=$result['TotNumFarmersSurveyedYr2'];
								$TotNumFarmersSurveyedYr3=$result['TotNumFarmersSurveyedYr3'];
								$TotNumFarmersSurveyedYr4=$result['TotNumFarmersSurveyedYr4'];
								$TotNumFarmersSurveyedYr5=$result['TotNumFarmersSurveyedYr5'];
								$TotNumFarmersSurveyedYr6=$result['TotNumFarmersSurveyedYr6'];
								

								//Adding the Extrapolationfactor
								$st=ExtrapolationFactor(24);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];


								$result['notrainedYr1']=convertToPercentages(($purchasingInputsYr1*$extrapolationFactorYr1),($TotNumFarmersSurveyedYr1*$extrapolationFactorYr1));
								$result['notrainedYr2']=convertToPercentages(($purchasingInputsYr2*$extrapolationFactorYr2),($TotNumFarmersSurveyedYr2*$extrapolationFactorYr2));
								$result['notrainedYr3']=convertToPercentages(($purchasingInputsYr3*$extrapolationFactorYr3),($TotNumFarmersSurveyedYr3*$extrapolationFactorYr3));
								$result['notrainedYr4']=convertToPercentages(($purchasingInputsYr4*$extrapolationFactorYr4),($TotNumFarmersSurveyedYr4*$extrapolationFactorYr4));
								$result['notrainedYr5']=convertToPercentages(($purchasingInputsYr5*$extrapolationFactorYr5),($TotNumFarmersSurveyedYr5*$extrapolationFactorYr5));
								$result['notrainedYr6']=convertToPercentages(($purchasingInputsYr6*$extrapolationFactorYr6),($TotNumFarmersSurveyedYr6*$extrapolationFactorYr6));
								return $result[$resultValue];
							}
							
								
				//------------------------Setup DataMining----------------
		
				//------------------------End of Setup DataMining----------------

				
								
								  
//---------------------------END OF UPDATE-----------------------------------
//end of class DataMining();

} 

//}


?>