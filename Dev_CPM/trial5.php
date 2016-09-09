<?php


//Start:160 	Number of stakeholders implementing risk-reducing...[Sex>>DNA]
function RiskReducingPracticesSexDNA($LevelTwoSubIndicatorID,$opening_year,$closure_year,$resultValue=""){
								//--------Form 6 Qn 3 and 4---------------------------
								$x="SELECT 160 as level_two_sub_indicatorId,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,0)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr1,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,1)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr2,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,2)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr3,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,3)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr4,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,4)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr5,
								sum( if( substr( `p`.`interview_date`, 1, 4 ) = '".TheFinancialYear($opening_year,$closure_year,5)."' && (`q`.`implemented_mgt_climate` like '%1%'||`q`.`implemented_mgt_climate_action`<>''), 1, 0 ) ) AS riskReducingPracticeYr6
								from `tbl_farmers` as `f`  join `tbl_frm6particulars` as `p` on (`p`.`farmer_code`=`f`.`tbl_farmersId`)
								join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patid`=`p`.`pk_patid`)
								where 160=160
								and `f`.`farmersSex` not like 'M%'
								and `f`.`farmersSex` not like 'F%'";
							
							 	$query=@Execute($x) or die(http("DM-0120"));
								$result=FetchRecords($query);
								$riskReducingPracticeYr1=$result['riskReducingPracticeYr1'];
								$riskReducingPracticeYr2=$result['riskReducingPracticeYr2'];
								$riskReducingPracticeYr3=$result['riskReducingPracticeYr3'];
								$riskReducingPracticeYr4=$result['riskReducingPracticeYr4'];
								$riskReducingPracticeYr5=$result['riskReducingPracticeYr5'];
								$riskReducingPracticeYr6=$result['riskReducingPracticeYr6'];

								//Adding the extrapolation Factor

								$st=ExtrapolationFactor(160);
								$query=@Execute($st) or die(http("DM-1683"));
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
//End:160 Number of stakeholders implementing risk-reducing...[Sex>>DNA]
