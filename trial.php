<?php

$date_submission='2016-04-1';
$reporting_period='Oct 2015 - Mar 2016';
$table='tbl_laboursavingtech';
$name_column_submission_date='DateSubmission';
$name_column_rep_period='reportingPeriod';
$name_column_year='year';




function cleanUpDateSubmissionValues($date_submission,$reporting_period,$table,$name_column_submission_date,$name_column_rep_period,$name_column_year){
	
	$reporting_period_month_two=trim(substr($reporting_period,11,3));
	$reporting_period_month_one=trim((substr($reporting_period,0,3)));
	$year_values=''.trim(substr($reporting_period,-4)).'';
	$reporting_period_values=''.$reporting_period_month_one.' - '.$reporting_period_month_two.'';
	$expected_start_date=''.((trim(substr($reporting_period,-4)))-1).'-10-01';
	$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';


	switch(true){
		case((strtotime($date_submission) <= strtotime($expected_end_date))  and (strtotime($date_submission) >= strtotime($expected_start_date))):
			$queryStatement='';
		break;

		case((strtotime($date_submission) > strtotime($expected_end_date))):
		$queryStatement="update `".$table."` 
		set `".$name_column_submission_date."` = '".$expected_end_date."'
		where `".$name_column_rep_period."` = '".$reporting_period_values."'
		and	`".$name_column_year."` in (".$year_values.") ";
		break;

		default:
		break;
	}
	
	return 	$queryStatement;
}


	


echo cleanUpDateSubmissionValues($date_submission,$reporting_period,$table,$name_column_submission_date,$name_column_rep_period,$name_column_year);
