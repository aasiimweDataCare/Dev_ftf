<?php


$reporting_period='Oct 2015 - Mar 2016';
$date_submission='2016-04-1';
$table='tbl_laboursavingtech';
$name_column_submission_date='DateSubmission';
$name_column_rep_period='reportingPeriod';
$name_column_year='year';


$year_values=''.((trim(substr($reporting_period,-4)))-1).','.trim(substr($reporting_period,-4)).'';
$reporting_period_values='Oct - Mar';
$expected_start_date=''.((trim(substr($reporting_period,-4)))-1).'-10-01';
$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';



	
switch(true){
	case((strtotime($date_submission) <= strtotime($expected_end_date))  and (strtotime($date_submission) >= strtotime($expected_start_date))):
	$to_do="Don't fire Query";
	$sClean='';
	break;
	
	case((strtotime($date_submission) > strtotime($expected_end_date))):
	$to_do="Fire Query";
	$sClean="update `".$table."` 
	set `".$name_column_submission_date."` = '".$expected_end_date."'
	where `".$name_column_rep_period."` = '".$reporting_period_values."'
    and	`".$name_column_year."` in (".$year_values.") ";
	break;
	
	default:
	break;
}

//echo $to_do.'<br/>'.$sClean;
echo trim(substr($reporting_period,-4));