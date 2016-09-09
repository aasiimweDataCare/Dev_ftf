<?php
class umemsDataMiningLevelOne{
	var $LevelTwoSubIndicatorID;
	var $Query;

function umemsDataMiningLevelOne($LevelTwoSubIndicatorID){
		$this->LevelTwoSubIndicatorID;
	}
							
	function umemsMiningIndicatorLevelOne($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
	 
		switch($LevelTwoSubIndicatorID){
			
			
			case 1: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsGenderMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 2: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsGenderFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 3: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsCommodityMaize($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 4: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsCommodityBeans($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 5: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsCommodityCoffee($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 6: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsYouth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 7: 
			$x=umemsDataMiningLevelOne::PositiveBenefitsFromInputsUmemsAdults($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 8: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 9: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 10: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsMaize($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 11: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsBeans($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 12: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsCoffee($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 13: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsYouth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 14: 
			$x=umemsDataMiningLevelOne::PurchasingInputFromVAsUmemsAdults($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 15: 
			$x=umemsDataMiningLevelOne::newHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 16: 
			$x=umemsDataMiningLevelOne::continuingHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			case 17: 
			$x=umemsDataMiningLevelOne::DNAHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue);
			return $x;
			break;
			
			
			
			
			default:
			break;
		}/* End of Switch  statement */

	}/* End of umemsDataMiningLevelOne method */

		
		function PositiveBenefitsFromInputsUmemsGenderMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 1 as LevelOneSubIndicatorID,
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
					where 1=1
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Male'
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
				$x4="SELECT 1 as LevelOneSubIndicatorID,
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
					where 1=1
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Male'
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
				$st=ExtrapolationFactor(1);
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
		function PositiveBenefitsFromInputsUmemsGenderFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 2 as LevelOneSubIndicatorID,
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
					where 2=2
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Female'
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
				$x4="SELECT 2 as LevelOneSubIndicatorID,
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
					where 2 = 2
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Female'
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
				$st=ExtrapolationFactor(2);
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
		function PositiveBenefitsFromInputsUmemsCommodityMaize($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 3 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`m`.`maize_fertilizer_benefits`<>'' && `m`.`maize_fertilizer_benefits` not like '%4%' ) ||
					(`m`.`maize_benefits` <>'' && `m`.`maize_benefits` not like '%4%' ) ||
					(`m`.`maize_chemical_benefits` <>'' && `m`.`maize_chemical_benefits` not like '%4%' ) ||
					(`m`.`maize_mgt_benefits` <>'' && `m`.`maize_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId` = `p`.`pk_patId`)
					where 3=3
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
				$x4="SELECT 3 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
					where 3=3
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
				$st=ExtrapolationFactor(3);
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
		function PositiveBenefitsFromInputsUmemsCommodityBeans($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 4 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`b`.`beans_fertilizer_benefits`<>'' && `b`.`beans_fertilizer_benefits` not like '%4%' ) ||
					(`b`.`beans_benefits` <>'' && `b`.`beans_benefits` not like '%4%' ) ||
					(`b`.`beans_chemical_benefits` <>'' && `b`.`beans_chemical_benefits` not like '%4%' ) ||
					(`b`.`beans_mgt_benefits` <>'' && `b`.`beans_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					where 4=4
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
				$x4="SELECT 4 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId`=`p`.`pk_patId`)
					where 4=4
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
				$st=ExtrapolationFactor(4);
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
		function PositiveBenefitsFromInputsUmemsCommodityCoffee($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 5 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr5,


					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."'
					and (
					(`c`.`coffee_fertilizer_benefits`<>'' && `c`.`coffee_fertilizer_benefits` not like '%4%' ) ||
					(`c`.`coffee_benefits` <>'' && `c`.`coffee_benefits` not like '%4%' ) ||
					(`c`.`coffee_chemical_benefits` <>'' && `c`.`coffee_chemical_benefits` not like '%4%' ) ||
					(`c`.`coffee_mgt_benefits` <>'' && `c`.`coffee_mgt_benefits` not like '%4%' ) ), 1, 0 ) ) AS PositiveBenefitYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 5=5
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
				$x4="SELECT 5 as LevelOneSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`) 
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId`=`p`.`pk_patId`)
					where 5 = 5
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
				$st=ExtrapolationFactor(5);
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
		function PositiveBenefitsFromInputsUmemsYouth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 6 as LevelTwoSubIndicatorID,
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
					where 6=6
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) between 18 and 35
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
				$x4="SELECT 6 as LevelTwoSubIndicatorID,
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
					where 6=6
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) between 18 and 35
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
				$st=ExtrapolationFactor(6);
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
		function PositiveBenefitsFromInputsUmemsAdults($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 7 as LevelTwoSubIndicatorID,
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
					where 7=7
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) > 35
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
				$x4="SELECT 7 as LevelTwoSubIndicatorID,
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
					where 7=7
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) > 35
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
				$st=ExtrapolationFactor(7);
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
		function PurchasingInputFromVAsUmemsMale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 8 as LevelTwoSubIndicatorID,
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
					where 8 = 8
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Male'
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
				$x4="SELECT 8 as LevelTwoSubIndicatorID,
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
					where 8=8
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Male'
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
				$st=ExtrapolationFactor(8);
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
		function PurchasingInputFromVAsUmemsFemale($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 9 as LevelTwoSubIndicatorID,
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
					where 9 = 9
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Female'
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
				$x4="SELECT 9 as LevelTwoSubIndicatorID,
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
					where 9=9
					and `f`.`farmersSex` is not null
					and `f`.`farmersSex` like '%Female'
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
				$st=ExtrapolationFactor(9);
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
		function PurchasingInputFromVAsUmemsMaize($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 10 as LevelTwoSubIndicatorID,
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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr1,

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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr2,

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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr3,

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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr4,

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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr5,

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
					(`m`.`maize_machinery_supplier` <>'' && `m`.`maize_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId` = `p`.`pk_patId`)
					where 10 = 10
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
				$x4="SELECT 10 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId` = `p`.`pk_patId`)
					where 10 = 10
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
				$st=ExtrapolationFactor(10);
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
		function PurchasingInputFromVAsUmemsBeans($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 11 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' and
					(
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
					(`b`.`beans_machinery_supplier` <>'' && `b`.`beans_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					where 11 = 11
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
				$x4="SELECT 11 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_beans` as `b` on (`b`.`fk_patId` = `p`.`pk_patId`)
					where 11 = 11
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
				$st=ExtrapolationFactor(11);
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
		function PurchasingInputFromVAsUmemsCoffee($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 12 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr1,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr2,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr3,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr4,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr5,

					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' and
					(
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
					(`c`.`coffee_machinery_supplier` <>'' && `c`.`coffee_machinery_supplier` like '%4%' ) ), 1, 0 ) ) AS purchasingInputsYr6

					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 12 = 12
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
				$x4="SELECT 12 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 12 = 12
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
				$st=ExtrapolationFactor(12);
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
		function PurchasingInputFromVAsUmemsYouth($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 13 as LevelTwoSubIndicatorID,
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
					where 13 = 13
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) between 18 and 35
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
				$x4="SELECT 13 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 13 = 13
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) between 18 and 35
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
				$st=ExtrapolationFactor(13);
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
		function PurchasingInputFromVAsUmemsAdults($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//-----------------Countin a single benefit across all the value chain per farmer--------------------------------
				$x="SELECT 14 as LevelTwoSubIndicatorID,
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
					where 14 = 14
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) > 35
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
				$x4="SELECT 14 as LevelTwoSubIndicatorID,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr1,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr2,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr3,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr4,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr5,
					sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS TotNumFarmersSurveyedYr6
					from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
					join `tbl_frm6production_coffee` as `c` on (`c`.`fk_patId` = `p`.`pk_patId`)
					where 14 = 14
					and `f`.`farmersDob` is not null
					and (DATEDIFF(CURRENT_DATE, STR_TO_DATE(`f`.`farmersDob`, '%Y-%m-%d'))/365) > 35
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
				$st=ExtrapolationFactor(14);
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
		function newHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 15 as LevelTwoSubIndicatorID,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
					FROM `tbl_farmers` as `f`  
					where 15=15";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$result['notrainedYr1']=$result['numNotNullHHYr1'];
				$result['notrainedYr2']=$result['numNotNullHHYr2'];
				$result['notrainedYr3']=$result['numNotNullHHYr3'];
				$result['notrainedYr4']=$result['numNotNullHHYr4'];
				$result['notrainedYr5']=$result['numNotNullHHYr5'];
				$result['notrainedYr6']=$result['numNotNullHHYr6'];
				
			return $result[$resultValue];
		}
		function continuingHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 16 as LevelTwoSubIndicatorID,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr1,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr2,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr3,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr4,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr5,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' && `f`.`hhName`<>'', 1, 0 ) ) AS numNotNullHHYr6
					FROM `tbl_farmers` as `f`  
					where 16=16";
				$query=@Execute($x4) or die(http(__line__));
				$result=FetchRecords($query);
				$result['notrainedYr1']=$result['numNotNullHHYr1'];
				$result['notrainedYr2']=$result['numNotNullHHYr2'];
				$result['notrainedYr3']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3'];
				$result['notrainedYr4']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4'];
				$result['notrainedYr5']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5'];
				$result['notrainedYr6']=$result['numNotNullHHYr2']+$result['numNotNullHHYr3']+$result['numNotNullHHYr4']+$result['numNotNullHHYr5']+$result['numNotNullHHYr6'];
								
			return $result[$resultValue];
		}
		function DNAHouseholds($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
			//--------Total Number of Farmers Surveyed---------------------------
				$x4="SELECT 17 as LevelTwoSubIndicatorID,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."', 1, 0 ) ) AS numNotNullHHYr1,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."', 1, 0 ) ) AS numNotNullHHYr2,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."', 1, 0 ) ) AS numNotNullHHYr3,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."', 1, 0 ) ) AS numNotNullHHYr4,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."', 1, 0 ) ) AS numNotNullHHYr5,
					sum( if( `f`.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."', 1, 0 ) ) AS numNotNullHHYr6
					FROM `tbl_farmers` as `f` join tbl_villageagent_groups as `v`
					on(`v`.`tbl_villageagent_groupsId`=`f`.`tbl_villageagent_groupsId`)	
					where 17=17
					&& `v`.`groupName`<>''
					&& `v`.`groupStatus` not like 'N%'
					&& `v`.`groupStatus` not like 'O%'";
				$query=@Execute($x4) or die(http(__line__));
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