<?php
//require_once('lib_sunrise.php');

class IndDissagTargets{
 var $IndicatorID;
 var $Query;
 
 	

 
							function IndDissagTargets($IndicatorID)
							{
							$this->IndicatorID;
							}
							
							function dissagTargetsIndicator($IndicatorID,$opening_year,$closure_year,$resultValue=""){
							 
							switch($IndicatorID){
							case 2.1: 
							$x=IndDissagTargets::grossMarginPerUnitOfLandBeansTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2.2: 
							$x=IndDissagTargets::grossMarginPerUnitOfLandCoffeeTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2.3: 
							$x=IndDissagTargets::grossMarginPerUnitOfLandMaizeTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.1: 
							$x=IndDissagTargets::reductionInpostHarvestLossesBeansTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.2: 
							$x=IndDissagTargets::reductionInpostHarvestLossesCoffeeTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25.3: 
							$x=IndDissagTargets::reductionInpostHarvestLossesMaizeTargets($IndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;

								}/* End of Switch  statement */

}/* End of dissagTargetsIndicator method */

//start of dissagregated functionality
//--------Targets Gross margin per unit of land, kilogram, or animal of selected product (crop/animal/fisheries selection varies by country)----
function grossMarginPerUnitOfLandBeansTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets Gross Margin Beans(TP)--------------------------- */
							$x="SELECT 2.1 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 2.1=2.1 
								and `wb`.`indicator_id`='13'
								and `wb`.`sub_indicatorId`='1'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tBeansYr1=$result['fy1'];
								$tBeansYr2=$result['fy2'];
								$tBeansYr3=$result['fy3'];
								$tBeansYr4=$result['fy4'];
								$tBeansYr5=$result['fy5'];
								$tBeansYr6=$result['fy6'];
							
								
								$result['fy1'] = $tBeansYr1;
								$result['fy2'] = $tBeansYr2;
								$result['fy3'] = $tBeansYr3;
								$result['fy4'] = $tBeansYr4;
								$result['fy5'] = $tBeansYr5;
								$result['fy6'] = $tBeansYr6;
								return $result[$resultValue];
							}
function grossMarginPerUnitOfLandCoffeeTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets Gross Margin Coffee(TP)--------------------------- */
							$x="SELECT 2.2 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 2.2=2.2 
								and `wb`.`indicator_id`='13'
								and `wb`.`sub_indicatorId`='2'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tCoffeeYr1=$result['fy1'];
								$tCoffeeYr2=$result['fy2'];
								$tCoffeeYr3=$result['fy3'];
								$tCoffeeYr4=$result['fy4'];
								$tCoffeeYr5=$result['fy5'];
								$tCoffeeYr6=$result['fy6'];
							
								
								$result['fy1'] = $tCoffeeYr1;
								$result['fy2'] = $tCoffeeYr2;
								$result['fy3'] = $tCoffeeYr3;
								$result['fy4'] = $tCoffeeYr4;
								$result['fy5'] = $tCoffeeYr5;
								$result['fy6'] = $tCoffeeYr6;
								return $result[$resultValue];
							}
function grossMarginPerUnitOfLandMaizeTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets Gross Margin Maize(TP)--------------------------- */
							$x="SELECT 2.3 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 2.3 = 2.3 
								and `wb`.`indicator_id`='13'
								and `wb`.`sub_indicatorId`='3'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tMaizeYr1=$result['fy1'];
								$tMaizeYr2=$result['fy2'];
								$tMaizeYr3=$result['fy3'];
								$tMaizeYr4=$result['fy4'];
								$tMaizeYr5=$result['fy5'];
								$tMaizeYr6=$result['fy6'];
							
								
								$result['fy1'] = $tMaizeYr1;
								$result['fy2'] = $tMaizeYr2;
								$result['fy3'] = $tMaizeYr3;
								$result['fy4'] = $tMaizeYr4;
								$result['fy5'] = $tMaizeYr5;
								$result['fy6'] = $tMaizeYr6;
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesBeansTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets reductionInpostHarvestLoss Beans(TP)--------------------------- */
							$x="SELECT 25.1 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 25.1=25.1 
								and `wb`.`indicator_id`='36'
								and `wb`.`sub_indicatorId`='47'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tBeansYr1=$result['fy1'];
								$tBeansYr2=$result['fy2'];
								$tBeansYr3=$result['fy3'];
								$tBeansYr4=$result['fy4'];
								$tBeansYr5=$result['fy5'];
								$tBeansYr6=$result['fy6'];
							
								
								$result['fy1'] = $tBeansYr1;
								$result['fy2'] = $tBeansYr2;
								$result['fy3'] = $tBeansYr3;
								$result['fy4'] = $tBeansYr4;
								$result['fy5'] = $tBeansYr5;
								$result['fy6'] = $tBeansYr6;
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesCoffeeTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets reductionInpostHarvestLoss Coffee(TP)--------------------------- */
							$x="SELECT 25.2 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 25.2=25.2 
								and `wb`.`indicator_id`='36'
								and `wb`.`sub_indicatorId`='48'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tCoffeeYr1=$result['fy1'];
								$tCoffeeYr2=$result['fy2'];
								$tCoffeeYr3=$result['fy3'];
								$tCoffeeYr4=$result['fy4'];
								$tCoffeeYr5=$result['fy5'];
								$tCoffeeYr6=$result['fy6'];
							
								
								$result['fy1'] = $tCoffeeYr1;
								$result['fy2'] = $tCoffeeYr2;
								$result['fy3'] = $tCoffeeYr3;
								$result['fy4'] = $tCoffeeYr4;
								$result['fy5'] = $tCoffeeYr5;
								$result['fy6'] = $tCoffeeYr6;
								return $result[$resultValue];
							}
function reductionInpostHarvestLossesMaizeTargets($IndicatorID,$opening_year,$closure_year,$resultValue=""){
	

							/* --------Targets reductionInpostHarvestLoss Maize(TP)--------------------------- */
							$x="SELECT 25.3 as indicator_id,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,0)."',`wb`.`Target`,'-')) as fy1,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,1)."',`wb`.`Target`,'-')) as fy2,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,2)."',`wb`.`Target`,'-')) as fy3,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,3)."',`wb`.`Target`,'-')) as fy4,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,4)."',`wb`.`Target`,'-')) as fy5,
								max(if(`wb`.`curr_year`='".TheFinancialYear($opening_year,$closure_year,5)."',`wb`.`Target`,'-')) as fy6
								from `tbl_workplan_sub` as `wb` 
								where 25.3=25.3 
								and `wb`.`indicator_id`='36'
								and `wb`.`sub_indicatorId`='49'
								order by `wb`.`indicator_id` asc";
								$query=@Execute($x) or die(http(__line__));
								$result=FetchRecords($query);
								$tMaizeYr1=$result['fy1'];
								$tMaizeYr2=$result['fy2'];
								$tMaizeYr3=$result['fy3'];
								$tMaizeYr4=$result['fy4'];
								$tMaizeYr5=$result['fy5'];
								$tMaizeYr6=$result['fy6'];
							
								
								$result['fy1'] = $tMaizeYr1;
								$result['fy2'] = $tMaizeYr2;
								$result['fy3'] = $tMaizeYr3;
								$result['fy4'] = $tMaizeYr4;
								$result['fy5'] = $tMaizeYr5;
								$result['fy6'] = $tMaizeYr6;
								return $result[$resultValue];
							}



//End of dissagregated functionality							
							
}/* end of IndDissagTargets Class */

?>