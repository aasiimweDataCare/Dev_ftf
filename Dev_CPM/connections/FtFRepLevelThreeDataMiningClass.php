<?php
class FtFRepLevelThreeDataMining{
 var $LevelThreeSubIndicatorID;
 var $Query;
 
 	

 
							function FtFRepLevelThreeDataMining($LevelThreeSubIndicatorID)
							{
							$this->IndicatorID;
							}
							//MiningIndicator15($LevelThreeSubIndicatorID=15,$opening_year,$closure_year,$resultValue)
							
							function l3MiningIndicator($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
							 
							switch($LevelThreeSubIndicatorID){
							case 1: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 2: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 3: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 4: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 5: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 6: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 7: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 8: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 9: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 10: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 11: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 12: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 13: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 14: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 15: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 16: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 17: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 18: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 19: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 20: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 21: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 22: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 23: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 24: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 25: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandBeansCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 26: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 27: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 28: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 29: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 30: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 31: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 32: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 33: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 34: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 35: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 36: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 37: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 38: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 39: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 40: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 41: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 42: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 43: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 44: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 45: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 46: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 47: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 48: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 49: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 50: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandCoffeeCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 51: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 52: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 53: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 54: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 55: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 56: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 57: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 58: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 59: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 60: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 61: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 62: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 63: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 64: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 65: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 66: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 67: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 68: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 69: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 70: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 71: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 72: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 73: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 74: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							case 75: 
							$x=FtFRepLevelThreeDataMining::grossMarginPerUnitOfLandMaizeCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue);
							return $x;
							break;
							
							
							default:
							break;

								}/* End of Switch  statement */

}/* End of l3MiningIndicator method */

//start of dissagregated functionality
//Start:1 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Male] 
function grossMarginPerUnitOfLandBeansHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:1 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Male] 

//Start:2 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Female] 
function grossMarginPerUnitOfLandBeansHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:2 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Female] 

//Start:3 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Joint] 
function grossMarginPerUnitOfLandBeansHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:3 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Joint] 

//Start:4 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Association-applied] 
function grossMarginPerUnitOfLandBeansHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:4 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>Association-applied] 

//Start:5 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>DNA] 
function grossMarginPerUnitOfLandBeansHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:5 Gross margin per unit of land, kilogram, or animal of[Beans>>Hectares planted...>>DNA] 

//Start:6 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Male] ...
function grossMarginPerUnitOfLandBeansTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 6 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 6=6
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(6);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:6 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Male] ...

//Start:7 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Female] ...
function grossMarginPerUnitOfLandBeansTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 7 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 7=7
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(7);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:7 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Female] ...

//Start:8 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Joint] ...
function grossMarginPerUnitOfLandBeansTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 8 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 8=8
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(6);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:8 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Joint] ...

//Start:9 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Association-applied] ...
function grossMarginPerUnitOfLandBeansTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 9 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 9=9
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(9);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:9 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>Association-applied] ...

//Start:10 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>DNA] ...
function grossMarginPerUnitOfLandBeansTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Beans(TP)--------------------------- */
	$x="SELECT 10 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_harvested`)), 0 ) ) AS TotProdBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 10=10
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdBeansYr1=$result['TotProdBeansYr1'];
		$TotProdBeansYr2=$result['TotProdBeansYr2'];
		$TotProdBeansYr3=$result['TotProdBeansYr3'];
		$TotProdBeansYr4=$result['TotProdBeansYr4'];
		$TotProdBeansYr5=$result['TotProdBeansYr5'];
		$TotProdBeansYr6=$result['TotProdBeansYr6'];



	$st=ExtrapolationFactor(10);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:10 Gross margin per unit of land, kilogram, or animal of[Beans>>Total Production>>DNA] ...

//Start:11 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Male] ...
function grossMarginPerUnitOfLandBeansVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 11 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 11=11
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(11);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:11 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Male] ...

//Start:12 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Female] ...
function grossMarginPerUnitOfLandBeansVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 12 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 12=12
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(12);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:12 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Female] ...

//Start:13 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Joint] ...
function grossMarginPerUnitOfLandBeansVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 13 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 13=13
		and `f`.`farmersSex` ='Joint'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(13);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:13 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Joint] ...

//Start:14 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandBeansVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 14 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 14=14
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(14);
	$query=@Execute($st) or die(http("FtFRepLOne-163"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:14 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>Association-applied] ...

//Start:15 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>DNA] ...
function grossMarginPerUnitOfLandBeansVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) BEANS--------------------------- */
	$x="SELECT 15 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)*(`b`.`beans_sold_price`)), 0 ) ) AS VolSalesBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 15=15
		and `f`.`farmersSex` like 'Male%'
		and `f`.`farmersSex` like 'Female%'
		and `f`.`farmersSex` like 'Joint%'
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesBeansYr1=convertShillingsToDollars($result['VolSalesBeansYr1']);
		$VolSalesBeansYr2=convertShillingsToDollars($result['VolSalesBeansYr2']);
		$VolSalesBeansYr3=convertShillingsToDollars($result['VolSalesBeansYr3']);
		$VolSalesBeansYr4=convertShillingsToDollars($result['VolSalesBeansYr4']);
		$VolSalesBeansYr5=convertShillingsToDollars($result['VolSalesBeansYr5']);
		$VolSalesBeansYr6=convertShillingsToDollars($result['VolSalesBeansYr6']);



	$st=ExtrapolationFactor(15);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:15 Gross margin per unit of land, kilogram, or animal of[Beans>>Value of Sales>>DNA] ...

//Start:16 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Male] ...
function grossMarginPerUnitOfLandBeansQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 16 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 16=16
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(16);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:16 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Male] ...

//Start:17 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Female] ...
function grossMarginPerUnitOfLandBeansQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 17 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 17=17
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(17);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:17 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Female] ...

//Start:18 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Joint] ...
function grossMarginPerUnitOfLandBeansQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 18 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 18=18
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http("FtFRepLThree-185"));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(18);
	$query=@Execute($st) or die(http("FtFRepLThree-183"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:18 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Joint] ...

//Start:19 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandBeansQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 19 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 19=19
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(19);
	$query=@Execute($st) or die(http("FtFRepLThree-193"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:19 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>Association-applied] ...

//Start:20 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>DNA] ...
function grossMarginPerUnitOfLandBeansQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 20 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_sold`)), 0 ) ) AS VolSoldBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 20=20
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldBeansYr1=$result['VolSoldBeansYr1'];
		$VolSoldBeansYr2=$result['VolSoldBeansYr2'];
		$VolSoldBeansYr3=$result['VolSoldBeansYr3'];
		$VolSoldBeansYr4=$result['VolSoldBeansYr4'];
		$VolSoldBeansYr5=$result['VolSoldBeansYr5'];
		$VolSoldBeansYr6=$result['VolSoldBeansYr6'];



	$st=ExtrapolationFactor(20);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:20 Gross margin per unit of land, kilogram, or animal of[Beans>>Quantity of Sales>>DNA] ...

//Start:21 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Male] ...
function grossMarginPerUnitOfLandBeansCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 21 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 21=21
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(21);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:21 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Male] ...

//Start:22 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Female] ...
function grossMarginPerUnitOfLandBeansCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 22 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 22=22
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(22);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:22 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Female] ...

//Start:23 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Joint] ...
function grossMarginPerUnitOfLandBeansCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 23 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 23=23
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(23);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:23 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Joint] ...

//Start:24 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Association-applied] ...
function grossMarginPerUnitOfLandBeansCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 24 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 24=24
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(24);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:24 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>Association-applied] ...

//Start:25 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>DNA] ...
function grossMarginPerUnitOfLandBeansCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 25 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`b`.`beans_improved_cost`) + (`b`.`beans_fertilizer_cost`) + (`b`.`beans_chemical_cost`) + (`b`.`beans_cost_ict`) + (`b`.`beans_machinery_cost`)), 0 ) ) AS inputCostBeansYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_beans` as `b` on (`b`.`fk_patid`=`p`.`pk_patid`)
		where 25=25
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostBeansYr1=convertShillingsToDollars($result['inputCostBeansYr1']);
		$inputCostBeansYr2=convertShillingsToDollars($result['inputCostBeansYr2']);
		$inputCostBeansYr3=convertShillingsToDollars($result['inputCostBeansYr3']);
		$inputCostBeansYr4=convertShillingsToDollars($result['inputCostBeansYr4']);
		$inputCostBeansYr5=convertShillingsToDollars($result['inputCostBeansYr5']);
		$inputCostBeansYr6=convertShillingsToDollars($result['inputCostBeansYr6']);
	
	$st=ExtrapolationFactor(25);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostBeansYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostBeansYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostBeansYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostBeansYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostBeansYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostBeansYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:25 Gross margin per unit of land, kilogram, or animal of[Beans>>Purchased input costs>>DNA] ...

//Start:26 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Male] 
function grossMarginPerUnitOfLandCoffeeHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:26 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Male] 

//Start:27 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Female] 
function grossMarginPerUnitOfLandCoffeeHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:27 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Female] 

//Start:28 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Joint] 
function grossMarginPerUnitOfLandCoffeeHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:28 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Joint] 

//Start:29 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Association-applied] 
function grossMarginPerUnitOfLandCoffeeHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:29 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>Association-applied] 

//Start:30 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>DNA] 
function grossMarginPerUnitOfLandCoffeeHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:30 Gross margin per unit of land, kilogram, or animal of[Coffee>>Hectares planted...>>DNA] 

//Start:31 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Male] ...
function grossMarginPerUnitOfLandCoffeeTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 31 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 31=31
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(31);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:31 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Male] ...

//Start:32 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Female] ...
function grossMarginPerUnitOfLandCoffeeTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 32 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 32=32
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(32);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:32 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Female] ...

//Start:33 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Joint] ...
function grossMarginPerUnitOfLandCoffeeTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 33 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 33=33
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(33);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:33 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Joint] ...

//Start:34 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Association-applied] ...
function grossMarginPerUnitOfLandCoffeeTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 34 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 34=34
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(34);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:34 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>Association-applied] ...

//Start:35 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>DNA] ...
function grossMarginPerUnitOfLandCoffeeTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Coffee(TP)--------------------------- */
	$x="SELECT 35 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_harvested`)), 0 ) ) AS TotProdCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 35=35
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdCoffeeYr1=$result['TotProdCoffeeYr1'];
		$TotProdCoffeeYr2=$result['TotProdCoffeeYr2'];
		$TotProdCoffeeYr3=$result['TotProdCoffeeYr3'];
		$TotProdCoffeeYr4=$result['TotProdCoffeeYr4'];
		$TotProdCoffeeYr5=$result['TotProdCoffeeYr5'];
		$TotProdCoffeeYr6=$result['TotProdCoffeeYr6'];



	$st=ExtrapolationFactor(35);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:35 Gross margin per unit of land, kilogram, or animal of[Coffee>>Total Production>>DNA] ...

//Start:36 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Male] ...
function grossMarginPerUnitOfLandCoffeeVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) COFFEE--------------------------- */
	$x="SELECT 36 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 36=36
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(36);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:36 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Male] ...

//Start:37 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Female] ...
function grossMarginPerUnitOfLandCoffeeVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) COFFEE--------------------------- */
	$x="SELECT 37 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 37=37
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(37);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:37 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Female] ...

//Start:38 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Joint] ...
function grossMarginPerUnitOfLandCoffeeVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) COFFEE--------------------------- */
	$x="SELECT 38 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 38=38
		and `f`.`farmersSex` ='Joint'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(38);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:38 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Joint] ...

//Start:39 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandCoffeeVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) COFFEE--------------------------- */
	$x="SELECT 39 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 39=39
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(39);
	$query=@Execute($st) or die(http("FtFRepLOne-413"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:39 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>Association-applied] ...

//Start:40 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>DNA] ...
function grossMarginPerUnitOfLandCoffeeVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) COFFEE--------------------------- */
	$x="SELECT 40 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)*(`c`.`coffee_sold_price`)), 0 ) ) AS VolSalesCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 40=40
		and `f`.`farmersSex` like 'Male%'
		and `f`.`farmersSex` like 'Female%'
		and `f`.`farmersSex` like 'Joint%'
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesCoffeeYr1=convertShillingsToDollars($result['VolSalesCoffeeYr1']);
		$VolSalesCoffeeYr2=convertShillingsToDollars($result['VolSalesCoffeeYr2']);
		$VolSalesCoffeeYr3=convertShillingsToDollars($result['VolSalesCoffeeYr3']);
		$VolSalesCoffeeYr4=convertShillingsToDollars($result['VolSalesCoffeeYr4']);
		$VolSalesCoffeeYr5=convertShillingsToDollars($result['VolSalesCoffeeYr5']);
		$VolSalesCoffeeYr6=convertShillingsToDollars($result['VolSalesCoffeeYr6']);



	$st=ExtrapolationFactor(40);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:40 Gross margin per unit of land, kilogram, or animal of[Coffee>>Value of Sales>>DNA] ...

//Start:41 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Male] ...
function grossMarginPerUnitOfLandCoffeeQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 41 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 41=41
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(41);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:41 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Male] ...

//Start:42 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Female] ...
function grossMarginPerUnitOfLandCoffeeQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 42 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 42=42
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(42);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:42 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Female] ...

//Start:43 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Joint] ...
function grossMarginPerUnitOfLandCoffeeQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 43 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 43=43
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(43);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:43 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Joint] ...

//Start:44 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandCoffeeQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 44 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 44=44
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(44);
	$query=@Execute($st) or die(http("FtFRepLThree-443"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:44 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>Association-applied] ...

//Start:45 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>DNA] ...
function grossMarginPerUnitOfLandCoffeeQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 45 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_sold`)), 0 ) ) AS VolSoldCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 45=45
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldCoffeeYr1=$result['VolSoldCoffeeYr1'];
		$VolSoldCoffeeYr2=$result['VolSoldCoffeeYr2'];
		$VolSoldCoffeeYr3=$result['VolSoldCoffeeYr3'];
		$VolSoldCoffeeYr4=$result['VolSoldCoffeeYr4'];
		$VolSoldCoffeeYr5=$result['VolSoldCoffeeYr5'];
		$VolSoldCoffeeYr6=$result['VolSoldCoffeeYr6'];



	$st=ExtrapolationFactor(45);
	$query=@Execute($st) or die(http("FtFRepLThree-453"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:45 Gross margin per unit of land, kilogram, or animal of[Coffee>>Quantity of Sales>>DNA] ...

//Start:46 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Male] ...
function grossMarginPerUnitOfLandCoffeeCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 46 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 46=46
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(46);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:46 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Male] ...

//Start:47 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Female] ...
function grossMarginPerUnitOfLandCoffeeCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 47 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 47=47
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(47);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:47 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Female] ...

//Start:48 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Joint] ...
function grossMarginPerUnitOfLandCoffeeCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 48 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 48=48
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(48);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:48 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Joint] ...

//Start:49 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Association-applied] ...
function grossMarginPerUnitOfLandCoffeeCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 49 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 49=49
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(49);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:49 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>Association-applied] ...

//Start:50 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>DNA] ...
function grossMarginPerUnitOfLandCoffeeCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 50 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`c`.`coffee_improved_cost`) + (`c`.`coffee_fertilizer_cost`) + (`c`.`coffee_chemical_cost`) + (`c`.`coffee_cost_ict`) + (`c`.`coffee_machinery_cost`)), 0 ) ) AS inputCostCoffeeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patid`=`p`.`pk_patid`)
		where 50=50
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostCoffeeYr1=convertShillingsToDollars($result['inputCostCoffeeYr1']);
		$inputCostCoffeeYr2=convertShillingsToDollars($result['inputCostCoffeeYr2']);
		$inputCostCoffeeYr3=convertShillingsToDollars($result['inputCostCoffeeYr3']);
		$inputCostCoffeeYr4=convertShillingsToDollars($result['inputCostCoffeeYr4']);
		$inputCostCoffeeYr5=convertShillingsToDollars($result['inputCostCoffeeYr5']);
		$inputCostCoffeeYr6=convertShillingsToDollars($result['inputCostCoffeeYr6']);
	
	$st=ExtrapolationFactor(50);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostCoffeeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostCoffeeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostCoffeeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostCoffeeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostCoffeeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostCoffeeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:50 Gross margin per unit of land, kilogram, or animal of[Coffee>>Purchased input costs>>DNA] ...

//Start:51 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Male] 
function grossMarginPerUnitOfLandMaizeHaMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:51 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Male] 

//Start:52 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Female] 
function grossMarginPerUnitOfLandMaizeHaFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:52 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Female] 

//Start:53 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Joint] 
function grossMarginPerUnitOfLandMaizeHaJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:53 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Joint] 

//Start:54 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Association-applied] 
function grossMarginPerUnitOfLandMaizeHaAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:54 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>Association-applied] 

//Start:55 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>DNA] 
function grossMarginPerUnitOfLandMaizeHaDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
/* Data source Not clear */	
		$result['actualYr1'] = '';
		$result['actualYr2'] = '';
		$result['actualYr3'] = '';
		$result['actualYr4'] = '';
		$result['actualYr5'] = '';
		$result['actualYr6'] = '';
	return $result[$resultValue];
}
//End:55 Gross margin per unit of land, kilogram, or animal of[Maize>>Hectares planted...>>DNA] 

//Start:56 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Male] ...
function grossMarginPerUnitOfLandMaizeTPMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 56 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 56=56
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(56);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:56 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Male] ...

//Start:57 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Female] ...
function grossMarginPerUnitOfLandMaizeTPFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 57 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 57=57
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(57);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:57 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Female] ...

//Start:58 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Joint] ...
function grossMarginPerUnitOfLandMaizeTPJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 58 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 58=58
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(58);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:58 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Joint] ...

//Start:59 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Association-applied] ...
function grossMarginPerUnitOfLandMaizeTPAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 59 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 59=59
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(59);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:59 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>Association-applied] ...

//Start:60 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>DNA] ...
function grossMarginPerUnitOfLandMaizeTPDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Total Production Maize(TP)--------------------------- */
	$x="SELECT 60 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_harvested`)), 0 ) ) AS TotProdMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 60=60
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
	
	$query=@Execute($x) or die(http(__line__));
	$result=FetchRecords($query);
	
		$TotProdMaizeYr1=$result['TotProdMaizeYr1'];
		$TotProdMaizeYr2=$result['TotProdMaizeYr2'];
		$TotProdMaizeYr3=$result['TotProdMaizeYr3'];
		$TotProdMaizeYr4=$result['TotProdMaizeYr4'];
		$TotProdMaizeYr5=$result['TotProdMaizeYr5'];
		$TotProdMaizeYr6=$result['TotProdMaizeYr6'];



	$st=ExtrapolationFactor(60);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = convertKiloToTonnes($TotProdMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = convertKiloToTonnes($TotProdMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = convertKiloToTonnes($TotProdMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = convertKiloToTonnes($TotProdMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = convertKiloToTonnes($TotProdMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = convertKiloToTonnes($TotProdMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:60 Gross margin per unit of land, kilogram, or animal of[Maize>>Total Production>>DNA] ...

//Start:61 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Male] ...
function grossMarginPerUnitOfLandMaizeVSMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) MAIZE--------------------------- */
	$x="SELECT 61 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 61=61
		and `f`.`farmersSex` ='Male'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(61);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:61 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Male] ...

//Start:62 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Female] ...
function grossMarginPerUnitOfLandMaizeVSFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) MAIZE--------------------------- */
	$x="SELECT 62 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 62=62
		and `f`.`farmersSex` ='Female'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(62);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:62 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Female] ...

//Start:63 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Joint] ...
function grossMarginPerUnitOfLandMaizeVSJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) MAIZE--------------------------- */
	$x="SELECT 63 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 63=63
		and `f`.`farmersSex` ='Joint'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(63);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:63 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Joint] ...

//Start:64 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandMaizeVSAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) MAIZE--------------------------- */
	$x="SELECT 64 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 64=64
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(64);
	$query=@Execute($st) or die(http("FtFRepLOne-663"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:64 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>Association-applied] ...

//Start:65 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>DNA] ...
function grossMarginPerUnitOfLandMaizeVSDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Value of sales(VS) MAIZE--------------------------- */
	$x="SELECT 65 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)*(`m`.`maize_sold_price`)), 0 ) ) AS VolSalesMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 65=65
		and `f`.`farmersSex` like 'Male%'
		and `f`.`farmersSex` like 'Female%'
		and `f`.`farmersSex` like 'Joint%'
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSalesMaizeYr1=convertShillingsToDollars($result['VolSalesMaizeYr1']);
		$VolSalesMaizeYr2=convertShillingsToDollars($result['VolSalesMaizeYr2']);
		$VolSalesMaizeYr3=convertShillingsToDollars($result['VolSalesMaizeYr3']);
		$VolSalesMaizeYr4=convertShillingsToDollars($result['VolSalesMaizeYr4']);
		$VolSalesMaizeYr5=convertShillingsToDollars($result['VolSalesMaizeYr5']);
		$VolSalesMaizeYr6=convertShillingsToDollars($result['VolSalesMaizeYr6']);



	$st=ExtrapolationFactor(65);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSalesMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSalesMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSalesMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSalesMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSalesMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSalesMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:65 Gross margin per unit of land, kilogram, or animal of[Maize>>Value of Sales>>DNA] ...

//Start:66 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Male] ...
function grossMarginPerUnitOfLandMaizeQTYMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 66 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 66=66
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(66);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:66 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Male] ...

//Start:67 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Female] ...
function grossMarginPerUnitOfLandMaizeQTYFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 67 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 67=67
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(67);
	$query=@Execute($st) or die(http("FtFRepLThree-673"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:67 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Female] ...

//Start:68 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Joint] ...
function grossMarginPerUnitOfLandMaizeQTYJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 68 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 68=68
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(68);
	$query=@Execute($st) or die(http("FtFRepLThree-708"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:68 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Joint] ...

//Start:69 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Association-applied] ...
function grossMarginPerUnitOfLandMaizeQTYAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 69 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 69=69
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(69);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:69 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>Association-applied] ...

//Start:70 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>DNA] ...
function grossMarginPerUnitOfLandMaizeQTYDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Volume sold(QS)--------------------------- */
	$x="SELECT 70 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_sold`)), 0 ) ) AS VolSoldMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 70=70
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$VolSoldMaizeYr1=$result['VolSoldMaizeYr1'];
		$VolSoldMaizeYr2=$result['VolSoldMaizeYr2'];
		$VolSoldMaizeYr3=$result['VolSoldMaizeYr3'];
		$VolSoldMaizeYr4=$result['VolSoldMaizeYr4'];
		$VolSoldMaizeYr5=$result['VolSoldMaizeYr5'];
		$VolSoldMaizeYr6=$result['VolSoldMaizeYr6'];



	$st=ExtrapolationFactor(70);
	$query=@Execute($st) or die(http("FtFRepLThree-703"));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($VolSoldMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($VolSoldMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($VolSoldMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($VolSoldMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($VolSoldMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($VolSoldMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:70 Gross margin per unit of land, kilogram, or animal of[Maize>>Quantity of Sales>>DNA] ...

//Start:71 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Male] ...
function grossMarginPerUnitOfLandMaizeCOSTMale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 71 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 71=71
		and `f`.`farmersSex` like 'Male%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(71);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:71 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Male] ...

//Start:72 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Female] ...
function grossMarginPerUnitOfLandMaizeCOSTFemale($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 72 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 72=72
		and `f`.`farmersSex` like 'Female%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(72);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:72 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Female] ...

//Start:73 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Joint] ...
function grossMarginPerUnitOfLandMaizeCOSTJoint($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 73 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 73=73
		and `f`.`farmersSex` like 'Joint%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(73);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:73 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Joint] ...

//Start:74 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Association-applied] ...
function grossMarginPerUnitOfLandMaizeCOSTAA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 74 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 74=74
		and `f`.`farmersSex` like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(74);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:74 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>Association-applied] ...

//Start:75 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>DNA] ...
function grossMarginPerUnitOfLandMaizeCOSTDNA($LevelThreeSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	/* --------Form 6 Input Cost(IC)--------------------------- */
	$x="SELECT 75 as level_three_sub_indicatorId,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr1,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr2,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr3,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr4,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr5,
		sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', ((`m`.`maize_improved_cost`) + (`m`.`maize_fertilizer_cost`) + (`m`.`maize_chemical_cost`) + (`m`.`maize_cost_ict`) + (`m`.`maize_machinery_cost`)), 0 ) ) AS inputCostMaizeYr6
		from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
		join `tbl_frm6production_maize` as `m` on (`m`.`fk_patid`=`p`.`pk_patid`)
		where 75=75
		and `f`.`farmersSex` not like 'Male%'
		and `f`.`farmersSex` not like 'Female%'
		and `f`.`farmersSex` not like 'Joint%'
		and `f`.`farmersSex` not like 'Association-applied%'
		and `p`.`interview_date` not between ('2013-01-01') and ('2015-09-01')
								and `p`.`interview_date` <= ('2015-10-31')";
		
		$query=@Execute($x) or die(http(__line__));
		$result=FetchRecords($query);
		$inputCostMaizeYr1=convertShillingsToDollars($result['inputCostMaizeYr1']);
		$inputCostMaizeYr2=convertShillingsToDollars($result['inputCostMaizeYr2']);
		$inputCostMaizeYr3=convertShillingsToDollars($result['inputCostMaizeYr3']);
		$inputCostMaizeYr4=convertShillingsToDollars($result['inputCostMaizeYr4']);
		$inputCostMaizeYr5=convertShillingsToDollars($result['inputCostMaizeYr5']);
		$inputCostMaizeYr6=convertShillingsToDollars($result['inputCostMaizeYr6']);
	
	$st=ExtrapolationFactor(75);
	$query=@Execute($st) or die(http(__line__));
	$result=FetchRecords($query);
		$extrapolationFactorYr1=$result['exFactorYr1'];
		$extrapolationFactorYr2=$result['exFactorYr2'];
		$extrapolationFactorYr3=$result['exFactorYr3'];
		$extrapolationFactorYr4=$result['exFactorYr4'];
		$extrapolationFactorYr5=$result['exFactorYr5'];
		$extrapolationFactorYr6=$result['exFactorYr6'];

		$result['actualYr1'] = ($inputCostMaizeYr1 * $extrapolationFactorYr1 );
		$result['actualYr2'] = ($inputCostMaizeYr2 * $extrapolationFactorYr2 );
		$result['actualYr3'] = ($inputCostMaizeYr3 * $extrapolationFactorYr3 );
		$result['actualYr4'] = ($inputCostMaizeYr4 * $extrapolationFactorYr4 );
		$result['actualYr5'] = ($inputCostMaizeYr5 * $extrapolationFactorYr5 );
		$result['actualYr6'] = ($inputCostMaizeYr6 * $extrapolationFactorYr6 );
	return $result[$resultValue];
}
//End:75 Gross margin per unit of land, kilogram, or animal of[Maize>>Purchased input costs>>DNA] ...



//End of dissagregated functionality							
							
}/* end of FtFRepLevelThreeDataMining Class */

?>