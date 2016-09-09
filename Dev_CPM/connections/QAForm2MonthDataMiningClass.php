<?php

 
class Form2MonthDataMining{
 var $IndicatorDisagg;
 var $Query;
 
 	

 
							function Form2MonthDataMining($IndicatorDisagg)
							{
							$this->IndicatorDisagg;
							}
							//MiningDisagg($IndicatorDisagg=15,$opening_year,$closure_year,$resultValue)
							function MiningDisagg($IndicatorDisagg,$year,$reportingMonth,$traderId,$reportingPeriod,$resultValue=""){
							switch($IndicatorDisagg){
							case "ValueChain":
							/* the underlying assumption is within any given reporting period only have a single record from the same trader on tech adoption */
							$x="SELECT 1 as IndicatorVal,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth1,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth2,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth3,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth4,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth5,
								 if( t.`year` = ".$year." and DATE_FORMAT(t.reportingMonth,'%m') = ".$reportingMonth." and t.businessTraderName = ".$traderId." and t.reportingPeriod = '".$reportingPeriod."', t.`valueChain`, null) AS valMonth6
								FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName=".$traderId." and t.reportingMonth<>'NULL'";
							
							 	$query=@Execute($x) or die(http("QAForm2DM-0028"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 13:
							$x=Form2MonthDataMining::grossMarginPerUnitOfLand($IndicatorDisagg,$opening_year,$closure_year,$resultValue);
								return $x;
							break;
							

								
								default:
								break;
								
								}
									
							 					
							}
							

/**************************************************************************************************************
******** Calculations of indicators whose datasources come from more than one CPM data collection form*********
***************************************************************************************************************/	


//--------Gross margin per unit of land, kilogram, or animal of selected product (crop/animal/fisheries selection varies by country)----
function grossMarginPerUnitOfLand($IndicatorDisagg,$opening_year,$closure_year,$resultValue=""){
	

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
								where 13=13";
								$query=@Execute($x) or die(http("iDissagQAForm2DM-45"));
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
								where 13=13";
								$query=@Execute($x) or die(http("iDissagQAForm2DM-65"));
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
								where 13=13";
								$query=@Execute($x) or die(http("iDissagQAForm2DM-85"));
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
								where 13=13";
								$query=@Execute($x) or die(http("iDissagQAForm2DM-105"));
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
								where 13=13";
								$query=@Execute($x) or die(http("iDissagQAForm2DM-105"));
								$result=FetchRecords($query);
								$unitProductionYr1=convertAcresToHectares($result['unitProductionYr1']);
								$unitProductionYr2=convertAcresToHectares($result['unitProductionYr2']);
								$unitProductionYr3=convertAcresToHectares($result['unitProductionYr3']);
								$unitProductionYr4=convertAcresToHectares($result['unitProductionYr4']);
								$unitProductionYr5=convertAcresToHectares($result['unitProductionYr5']);
								$unitProductionYr6=convertAcresToHectares($result['unitProductionYr6']);
								
								/* Calculating Gross Margin Per Unit of land  based on the following formula:
								(((TP*(VS/QS))-IC)/UP)	 */	
								$GrossMarginPerUnitOfLandYr1=GrossMarginPerUnitOfLand($TotProdYr1,$VolSalesYr1,$VolSoldYr1,$inputCostYr1,$unitProductionYr1);
								$GrossMarginPerUnitOfLandYr2=GrossMarginPerUnitOfLand($TotProdYr2,$VolSalesYr2,$VolSoldYr2,$inputCostYr2,$unitProductionYr2);
								$GrossMarginPerUnitOfLandYr3=GrossMarginPerUnitOfLand($TotProdYr3,$VolSalesYr3,$VolSoldYr3,$inputCostYr3,$unitProductionYr3);	
								$GrossMarginPerUnitOfLandYr4=GrossMarginPerUnitOfLand($TotProdYr4,$VolSalesYr4,$VolSoldYr4,$inputCostYr4,$unitProductionYr4);	
								$GrossMarginPerUnitOfLandYr5=GrossMarginPerUnitOfLand($TotProdYr5,$VolSalesYr5,$VolSoldYr5,$inputCostYr5,$unitProductionYr5);	
								$GrossMarginPerUnitOfLandYr6=GrossMarginPerUnitOfLand($TotProdYr6,$VolSalesYr6,$VolSoldYr6,$inputCostYr6,$unitProductionYr6);	
								
								$result['notrainedYr1'] = $GrossMarginPerUnitOfLandYr1;
								$result['notrainedYr2'] = $GrossMarginPerUnitOfLandYr2;
								$result['notrainedYr3'] = $GrossMarginPerUnitOfLandYr3;
								$result['notrainedYr4'] = $GrossMarginPerUnitOfLandYr4;
								$result['notrainedYr5'] = $GrossMarginPerUnitOfLandYr5;
								$result['notrainedYr6'] = $GrossMarginPerUnitOfLandYr6;
								return $result[$resultValue];
							}

							
				//------------------------Setup Form2MonthDataMining----------------
		
				//------------------------End of Setup Form2MonthDataMining----------------

				
								
								  
//---------------------------END OF UPDATE-----------------------------------
//end of class Form2MonthDataMining();

} 

//}


?>