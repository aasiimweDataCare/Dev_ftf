<?php
//require_once('lib_sunrise.php');
 
class IndDissagDataMining{
 var $IndicatorID;
 var $Query;
 
 	

 
							function IndDissagDataMining($IndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($IndicatorID=15,$opening_year,$closure_year,$resultValue)
							
							function dissagMiningIndicator($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							 
							switch($IndicatorID){
							case 2.1: 
							$x=IndDissagDataMining::grossMarginPerUnitOfLandBeans($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2.2: 
							$x=IndDissagDataMining::grossMarginPerUnitOfLandCoffee($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2.3: 
							$x=IndDissagDataMining::grossMarginPerUnitOfLandMaize($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.1: 
							$x=IndDissagDataMining::reductionInpostHarvestLossesBeans($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.2: 
							$x=IndDissagDataMining::reductionInpostHarvestLossesCoffee($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.3: 
							$x=IndDissagDataMining::reductionInpostHarvestLossesMaize($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

								}/* End of Switch  statement */

}/* End of dissagMiningIndicator method */

//start of dissagregated functionality
//--------Gross margin per unit of land, kilogram, or animal of selected product (crop/animal/fisheries selection varies by country)----
function grossMarginPerUnitOfLandBeans($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Beans(TP)--------------------------- */
							$x="SELECT 2.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2.1=2.1
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
							$x="SELECT 2.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2.1=2.1
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
							$x="SELECT 2.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2.1=2.1
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
							$x="SELECT 2.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2.1=2.1
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
							$x="SELECT 2.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_acreage`)), 0 ) ) AS unitProductionBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 2.1=2.1
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

							$st=ExtrapolationFactor(2.1);
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

								$result['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedBeansYr1;
								$result['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedBeansYr2;
								$result['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedBeansYr3;
								$result['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedBeansYr4;
								$result['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedBeansYr5;
								$result['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedBeansYr6;
								return $result[$resultValue];
							}
function grossMarginPerUnitOfLandCoffee($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Coffee(TP)--------------------------- */
							$x="SELECT 2.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2.2=2.2
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
							$x="SELECT 2.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2.2=2.2
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
							$x="SELECT 2.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2.2=2.2
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
							$x="SELECT 2.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2.2=2.2
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
							$x="SELECT 2.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_acreage`)), 0 ) ) AS unitProductionCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 2.2=2.2
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

								$st=ExtrapolationFactor(2.2);
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
								
								$result['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr1;
								$result['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr2;
								$result['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr3;
								$result['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr4;
								$result['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr5;
								$result['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedCoffeeYr6;
								return $result[$resultValue];
							}
function grossMarginPerUnitOfLandMaize($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Form 6 Total Production Maize(TP)--------------------------- */
							$x="SELECT 2.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 2.3=2.3
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
							$x="SELECT 2.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 2.3=2.3
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
							$x="SELECT 2.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 2.3=2.3
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
							$x="SELECT 2.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 2.3=2.3
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
							$x="SELECT 2.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_acreage`)), 0 ) ) AS unitProductionMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 2.3=2.3
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

								$st=ExtrapolationFactor(2.3);
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
								
								$result['notrainedYr1'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr1;
								$result['notrainedYr2'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr2;
								$result['notrainedYr3'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr3;
								$result['notrainedYr4'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr4;
								$result['notrainedYr5'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr5;
								$result['notrainedYr6'] = $GrossMarginPerUnitOfLandRecomputedMaizeYr6;
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesBeans ($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6 Qn 30---------------------------
							$x="SELECT 25.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvest_loss`), 0 ) ) AS lossForm6BeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 25.1=25.1
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$lossForm6BeansYr1=$result['lossForm6BeansYr1'];
								$lossForm6BeansYr2=$result['lossForm6BeansYr2'];
								$lossForm6BeansYr3=$result['lossForm6BeansYr3'];
								$lossForm6BeansYr4=$result['lossForm6BeansYr4'];
								$lossForm6BeansYr5=$result['lossForm6BeansYr5'];
								$lossForm6BeansYr6=$result['lossForm6BeansYr6'];
								
								//=====================Total production form 6 Qn 27==============
								$x2="SELECT 25.1 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`b`.`beans_harvested`), 0 ) ) AS totProductionBeansYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
								where 25.1=25.1
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$totProductionBeansYr1=$result['totProductionBeansYr1'];
								$totProductionBeansYr2=$result['totProductionBeansYr2'];
								$totProductionBeansYr3=$result['totProductionBeansYr3'];
								$totProductionBeansYr4=$result['totProductionBeansYr4'];
								$totProductionBeansYr5=$result['totProductionBeansYr5'];
								$totProductionBeansYr6=$result['totProductionBeansYr6'];

								$st=ExtrapolationFactor(25.1);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['notrainedYr1']= (($lossForm6BeansYr1 / $totProductionBeansYr1)*$extrapolationFactorYr1);
								$result['notrainedYr2']= (($lossForm6BeansYr2 / $totProductionBeansYr2)*$extrapolationFactorYr2);
								$result['notrainedYr3']= (($lossForm6BeansYr3 / $totProductionBeansYr3)*$extrapolationFactorYr3);
								$result['notrainedYr4']= (($lossForm6BeansYr4 / $totProductionBeansYr4)*$extrapolationFactorYr4);
								$result['notrainedYr5']= (($lossForm6BeansYr5 / $totProductionBeansYr5)*$extrapolationFactorYr5);
								$result['notrainedYr6']= (($lossForm6BeansYr6 / $totProductionBeansYr6)*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesCoffee ($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6 Qn 30---------------------------
							$x="SELECT 25.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`c`.`coffee_harvest_loss`), 0 ) ) AS lossForm6CoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 25.2=25.2
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$lossForm6CoffeeYr1=$result['lossForm6CoffeeYr1'];
								$lossForm6CoffeeYr2=$result['lossForm6CoffeeYr2'];
								$lossForm6CoffeeYr3=$result['lossForm6CoffeeYr3'];
								$lossForm6CoffeeYr4=$result['lossForm6CoffeeYr4'];
								$lossForm6CoffeeYr5=$result['lossForm6CoffeeYr5'];
								$lossForm6CoffeeYr6=$result['lossForm6CoffeeYr6'];
								
								//=====================Total production form 6 Qn 27==============
								$x2="SELECT 25.2 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`c`.`coffee_harvested`), 0 ) ) AS totProductionCoffeeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
								where 25.2=25.2
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$totProductionCoffeeYr1=$result['totProductionCoffeeYr1'];
								$totProductionCoffeeYr2=$result['totProductionCoffeeYr2'];
								$totProductionCoffeeYr3=$result['totProductionCoffeeYr3'];
								$totProductionCoffeeYr4=$result['totProductionCoffeeYr4'];
								$totProductionCoffeeYr5=$result['totProductionCoffeeYr5'];
								$totProductionCoffeeYr6=$result['totProductionCoffeeYr6'];

								$st=ExtrapolationFactor(25.2);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								
								
								$result['notrainedYr1']= (($lossForm6CoffeeYr1 / $totProductionCoffeeYr1)*$extrapolationFactorYr1);
								$result['notrainedYr2']= (($lossForm6CoffeeYr2 / $totProductionCoffeeYr2)*$extrapolationFactorYr2);
								$result['notrainedYr3']= (($lossForm6CoffeeYr3 / $totProductionCoffeeYr3)*$extrapolationFactorYr3);
								$result['notrainedYr4']= (($lossForm6CoffeeYr4 / $totProductionCoffeeYr4)*$extrapolationFactorYr4);
								$result['notrainedYr5']= (($lossForm6CoffeeYr5 / $totProductionCoffeeYr5)*$extrapolationFactorYr5);
								$result['notrainedYr6']= (($lossForm6CoffeeYr6 / $totProductionCoffeeYr6)*$extrapolationFactorYr6);
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesMaize ($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							//--------From 6 Qn 30---------------------------
							$x="SELECT 25.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`m`.`maize_harvest_loss`), 0 ) ) AS lossForm6MaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 25.3=25.3
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$lossForm6MaizeYr1=$result['lossForm6MaizeYr1'];
								$lossForm6MaizeYr2=$result['lossForm6MaizeYr2'];
								$lossForm6MaizeYr3=$result['lossForm6MaizeYr3'];
								$lossForm6MaizeYr4=$result['lossForm6MaizeYr4'];
								$lossForm6MaizeYr5=$result['lossForm6MaizeYr5'];
								$lossForm6MaizeYr6=$result['lossForm6MaizeYr6'];
								
								//=====================Total production form 6 Qn 27==============
								$x2="SELECT 25.3 as indicator_id,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', (`m`.`maize_harvested`), 0 ) ) AS totProductionMaizeYr6
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
								where 25.3=25.3
								and `p`.`interview_date` <= ('2015-10-31')";
							
							 	$query=@Execute($x2) or die(http(__line__));
								$result=FetchRecords($query);
								$totProductionMaizeYr1=$result['totProductionMaizeYr1'];
								$totProductionMaizeYr2=$result['totProductionMaizeYr2'];
								$totProductionMaizeYr3=$result['totProductionMaizeYr3'];
								$totProductionMaizeYr4=$result['totProductionMaizeYr4'];
								$totProductionMaizeYr5=$result['totProductionMaizeYr5'];
								$totProductionMaizeYr6=$result['totProductionMaizeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(25.3);
								$query=@Execute($st) or die(http(__line__));
								$result=FetchRecords($query);
								$extrapolationFactorYr1=$result['exFactorYr1'];
								$extrapolationFactorYr2=$result['exFactorYr2'];
								$extrapolationFactorYr3=$result['exFactorYr3'];
								$extrapolationFactorYr4=$result['exFactorYr4'];
								$extrapolationFactorYr5=$result['exFactorYr5'];
								$extrapolationFactorYr6=$result['exFactorYr6'];
								
								$result['notrainedYr1']= (($lossForm6MaizeYr1 / $totProductionMaizeYr1)*$extrapolationFactorYr1);
								$result['notrainedYr2']= (($lossForm6MaizeYr2 / $totProductionMaizeYr2)*$extrapolationFactorYr2);
								$result['notrainedYr3']= (($lossForm6MaizeYr3 / $totProductionMaizeYr3)*$extrapolationFactorYr3);
								$result['notrainedYr4']= (($lossForm6MaizeYr4 / $totProductionMaizeYr4)*$extrapolationFactorYr4);
								$result['notrainedYr5']= (($lossForm6MaizeYr5 / $totProductionMaizeYr5)*$extrapolationFactorYr5);
								$result['notrainedYr6']= (($lossForm6MaizeYr6 / $totProductionMaizeYr6)*$extrapolationFactorYr6);
								return $result[$resultValue];
							}



//End of dissagregated functionality							
							
}/* end of IndDissagDataMining Class */

?>