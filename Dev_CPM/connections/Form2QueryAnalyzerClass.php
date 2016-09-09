<?php
//require_once('lib_sunrise.php');
 
class Form2QueryAnalyzer{
 var $query;
 var $role;
 
 	
function Form2QueryAnalyzer($query)
							{
							$this->query;
							}

	
function f2QA_EntTechQuery_ValueChain($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', SUBSTRING(`t`.`valueChain`, 3, 10), null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_bizType($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`typeOfBusiness`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_Location($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`businessLocation`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_Duration($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`durationWithActivity`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_MgtPractice($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`nameOfImprovedTech`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_MgtPracticeAdopted($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techAdoptedInReportingPeriod`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_MgtPracticePast($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`techContinuedFromPast`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_AmountInvested($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";	
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', `t`.`amountInvestedInTechAdoption`, null) AS valMonth6
			FROM `tbl_techadoption` as t where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_NameJobHolder($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`nameOfJobHolder`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_Sex($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`sexOfJobHolder`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_DateEngagement($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', DATE_FORMAT(tj.`dateOfEngagement`,'%Y-%m-%d'), null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}

function f2QA_EntTechQuery_TimeSpentOnJob($year,$traderId,$reportingPeriod){
	switch($reportingPeriod){
			case "Apr - Sep":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 4 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 5 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 6 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 7 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 8 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 9 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			case "Oct - Mar":
			$x="SELECT 1 as IndicatorVal,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 10 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth1,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 11 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth2,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 12 and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth3,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 1  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth4,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 2  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth5,
			 if( t.`year` = '".$year."' and DATE_FORMAT(t.reportingMonth,'%m') = 3  and t.businessTraderName = '".$traderId."' and t.reportingPeriod = '".$reportingPeriod."', tj.`timeSpentOnJob`, null) AS valMonth6
			FROM `tbl_techadoption` as t join  `tbl_tech_adoption_jobHolder` tj
			on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`) where 1=1 and t.businessTraderName='".$traderId."' and t.reportingMonth<>'NULL'";
			break;
			
			default:
			break;
		
	}

return $x;	
}



} //end of class Form2QueryAnalyzer();


?>