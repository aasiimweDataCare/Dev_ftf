<?php
//---------------PERCENTAGE OF FARMERS ACKNOWLEDGING POSTIVE BENEFITS FROM ACCESSED INPUTS		
function PositiveBenefictsFromInputsByGenderMale($IndicatorID,$opening_year,$closure_year,$resultValue=""){

$x="SELECT 12.1 as indicator_id,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr1,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr2,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr3,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr4,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr5,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='M', 1,0 ) ) AS hsPositiveBenefitYr6

FROM `tbl_household_summary_data` i join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`) where 12.1=12.1";
$query=@Execute($x) or die(http("DM-0120"));
$result=FetchRecords($query);
$TotalhsPositiveBenefitYr1=$result['hsPositiveBenefitYr1'];
$TotalhsPositiveBenefitYr2=$result['hsPositiveBenefitYr2'];
$TotalhsPositiveBenefitYr3=$result['hsPositiveBenefitYr3'];
$TotalhsPositiveBenefitYr4=$result['hsPositiveBenefitYr4'];
$TotalhsPositiveBenefitYr5=$result['hsPositiveBenefitYr5'];
$TotalhsPositiveBenefitYr6=$result['hsPositiveBenefitYr6'];


$x2="SELECT 12.1 as indicator_id,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr1,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr2,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr3,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr4,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr5,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='M' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr6

FROM `tbl_household_summary_data` i join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`) where 12.1=12.1";


$query=@Execute($x2) or die(http("DM-0120"));
$result=FetchRecords($query);
$hsPositiveBenefitYr1=$result['hsPositiveBenefitYr1'];
$hsPositiveBenefitYr2=$result['hsPositiveBenefitYr2'];
$hsPositiveBenefitYr3=$result['hsPositiveBenefitYr3'];
$hsPositiveBenefitYr4=$result['hsPositiveBenefitYr4'];
$hsPositiveBenefitYr5=$result['hsPositiveBenefitYr5'];
$hsPositiveBenefitYr6=$result['hsPositiveBenefitYr6'];

//SUMMING UP THE FARFMERS WHO USE IMPROVED PRACTICES



$result['notrainedYr1']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr1,$hsPositiveBenefitYr1);
$result['notrainedYr2']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr2,$hsPositiveBenefitYr2);
$result['notrainedYr3']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr3,$hsPositiveBenefitYr3);
$result['notrainedYr4']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr4,$hsPositiveBenefitYr4);
$result['notrainedYr5']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr5,$hsPositiveBenefitYr5);
$result['notrainedYr6']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr6,$hsPositiveBenefitYr6);
return $result[$resultValue];
}



//=====================Female==================================

function PositiveBenefictsFromInputsByGenderFemale($IndicatorID,$opening_year,$closure_year,$resultValue=""){

$x="SELECT 12.1 as indicator_id,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr1,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,1)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr2,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,2)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr3,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,3)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr4,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,4)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr5,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,5)."' and m.`hsNameMember`<>'' and m.`hsSexMember`='F', 1,0 ) ) AS hsPositiveBenefitYr6

FROM `tbl_household_summary_data` i join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`) where 12.1=12.1";
$query=@Execute($x) or die(http("DM-0120"));
$result=FetchRecords($query);
$TotalhsPositiveBenefitYr1=$result['hsPositiveBenefitYr1'];
$TotalhsPositiveBenefitYr2=$result['hsPositiveBenefitYr2'];
$TotalhsPositiveBenefitYr3=$result['hsPositiveBenefitYr3'];
$TotalhsPositiveBenefitYr4=$result['hsPositiveBenefitYr4'];
$TotalhsPositiveBenefitYr5=$result['hsPositiveBenefitYr5'];
$TotalhsPositiveBenefitYr6=$result['hsPositiveBenefitYr6'];


$x2="SELECT 12.1 as indicator_id,
sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr1,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr2,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr3,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr4,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr5,

sum( if( i.`year` = '".TheFinancialYear($opening_year,$closure_year,0)."'and m.`hsNameMember`<>'' and m.`hsSexMember`='F' and (i.`goodYields`='Yes'
|| i.`reducedCosts`='Yes'|| i.`labourSaving`='Yes'|| i.`betterQuality`='Yes'|| i.`diseaseResistance`='Yes'
|| i.`earlyMaturity`='Yes'), 1,0 ) ) AS hsPositiveBenefitYr6

FROM `tbl_household_summary_data` i join  tbl_household_members m on(i.`houseHoldId`=m.`houseHoldId`) where 12.1=12.1";


$query=@Execute($x2) or die(http("DM-0120"));
$result=FetchRecords($query);
$hsPositiveBenefitYr1=$result['hsPositiveBenefitYr1'];
$hsPositiveBenefitYr2=$result['hsPositiveBenefitYr2'];
$hsPositiveBenefitYr3=$result['hsPositiveBenefitYr3'];
$hsPositiveBenefitYr4=$result['hsPositiveBenefitYr4'];
$hsPositiveBenefitYr5=$result['hsPositiveBenefitYr5'];
$hsPositiveBenefitYr6=$result['hsPositiveBenefitYr6'];

//SUMMING UP THE FARFMERS WHO USE IMPROVED PRACTICES



$result['notrainedYr1']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr1,$hsPositiveBenefitYr1);
$result['notrainedYr2']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr2,$hsPositiveBenefitYr2);
$result['notrainedYr3']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr3,$hsPositiveBenefitYr3);
$result['notrainedYr4']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr4,$hsPositiveBenefitYr4);
$result['notrainedYr5']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr5,$hsPositiveBenefitYr5);
$result['notrainedYr6']=QueryManager::calc_Percentage($TotalhsPositiveBenefitYr6,$hsPositiveBenefitYr6);
return $result[$resultValue];
}