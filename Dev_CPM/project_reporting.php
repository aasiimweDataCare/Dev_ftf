<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',true);
global $sem_annual;

//================================FORM2=================
$xajax->register(XAJAX_FUNCTION,'view_form2');
$xajax->register(XAJAX_FUNCTION,'new_form2');
$xajax->register(XAJAX_FUNCTION,'save_form2');

$xajax->register(XAJAX_FUNCTION,'view_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'addRecord');
$xajax->register(XAJAX_FUNCTION,'new_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'calc_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'save_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'delete_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'edit_enterpriseTechAdoption');
$xajax->register(XAJAX_FUNCTION,'update_enterpriseTechAdoption');

$xajax->register(XAJAX_FUNCTION,'view_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'new_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'calc_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'save_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'delete_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'edit_labourSavingTech');
$xajax->register(XAJAX_FUNCTION,'update_labourSavingTech');

$xajax->register(XAJAX_FUNCTION,'view_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'new_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'calc_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'save_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'delete_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'edit_mediaPrograms');
$xajax->register(XAJAX_FUNCTION,'update_mediaPrograms');

$xajax->register(XAJAX_FUNCTION,'view_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'new_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'calc_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'save_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'delete_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'edit_youthApprentice');
$xajax->register(XAJAX_FUNCTION,'update_youthApprentice');


$xajax->register(XAJAX_FUNCTION,'view_bds');
$xajax->register(XAJAX_FUNCTION,'new_bds');
$xajax->register(XAJAX_FUNCTION,'calc_bds');
$xajax->register(XAJAX_FUNCTION,'save_bds');
$xajax->register(XAJAX_FUNCTION,'delete_bds');
$xajax->register(XAJAX_FUNCTION,'edit_bds');
$xajax->register(XAJAX_FUNCTION,'update_bds');

$xajax->register(XAJAX_FUNCTION,'view_bankLoans');
$xajax->register(XAJAX_FUNCTION,'new_bankLoans');
$xajax->register(XAJAX_FUNCTION,'calc_bankLoans');
$xajax->register(XAJAX_FUNCTION,'save_bankLoans');
$xajax->register(XAJAX_FUNCTION,'delete_bankLoans');
$xajax->register(XAJAX_FUNCTION,'edit_bankLoans');
$xajax->register(XAJAX_FUNCTION,'update_bankLoans');

//inputSales
$xajax->register(XAJAX_FUNCTION,'view_inputSales');
$xajax->register(XAJAX_FUNCTION,'new_inputSales');
$xajax->register(XAJAX_FUNCTION,'calc_inputSales');
$xajax->register(XAJAX_FUNCTION,'save_inputSales');
$xajax->register(XAJAX_FUNCTION,'delete_inputSales');
$xajax->register(XAJAX_FUNCTION,'edit_inputSales');
$xajax->register(XAJAX_FUNCTION,'update_inputSales');

//phh
$xajax->register(XAJAX_FUNCTION,'view_phh');
$xajax->register(XAJAX_FUNCTION,'new_phh');
$xajax->register(XAJAX_FUNCTION,'calc_phh');
$xajax->register(XAJAX_FUNCTION,'save_phh');
$xajax->register(XAJAX_FUNCTION,'delete_phh');
$xajax->register(XAJAX_FUNCTION,'edit_phh');
$xajax->register(XAJAX_FUNCTION,'update_phh');



$xajax->register(XAJAX_FUNCTION,'view_partnerships');
$xajax->register(XAJAX_FUNCTION,'new_partnerships');
$xajax->register(XAJAX_FUNCTION,'calc_partnerships');
$xajax->register(XAJAX_FUNCTION,'save_partnerships');
$xajax->register(XAJAX_FUNCTION,'delete_partnerships');
$xajax->register(XAJAX_FUNCTION,'edit_partnerships');
$xajax->register(XAJAX_FUNCTION,'update_partnerships');







//================================FORM3=================
$xajax->register(XAJAX_FUNCTION,'view_form3');
$xajax->register(XAJAX_FUNCTION,'view_frm3ExDisaggregation');
$xajax->register(XAJAX_FUNCTION,'new_form3');
$xajax->register(XAJAX_FUNCTION,'save_form3');
$xajax->register(XAJAX_FUNCTION,'delete_exporters_form3');
$xajax->register(XAJAX_FUNCTION,'edit_exporters_form3');
$xajax->register(XAJAX_FUNCTION,'update_exporters_form3');
$xajax->register(XAJAX_FUNCTION,'close_form3');

//================================FORM4=================
$xajax->register(XAJAX_FUNCTION,'view_form4');
$xajax->register(XAJAX_FUNCTION,'view_frm4ExDisaggregation');
$xajax->register(XAJAX_FUNCTION,'new_form4');
$xajax->register(XAJAX_FUNCTION,'save_form4');
$xajax->register(XAJAX_FUNCTION,'delete_traders_form4');
$xajax->register(XAJAX_FUNCTION,'edit_traders_form4');
$xajax->register(XAJAX_FUNCTION,'update_traders_form4');
$xajax->register(XAJAX_FUNCTION,'close_form4');


//================================FORM5=================
$xajax->register(XAJAX_FUNCTION,'view_form5');
$xajax->register(XAJAX_FUNCTION,'new_form5');
$xajax->register(XAJAX_FUNCTION,'save_form5');
$xajax->register(XAJAX_FUNCTION,'delete_form5');
$xajax->register(XAJAX_FUNCTION,'edit_form5');
$xajax->register(XAJAX_FUNCTION,'update_form5');
$xajax->register(XAJAX_FUNCTION,'calc_form5');
$xajax->register(XAJAX_FUNCTION,'calc_vaform5');




#***************************************************************
$xajax->register(XAJAX_FUNCTION,'view_qualitativeReporting');//report log
//$xajax->register(XAJAX_FUNCTION,'viewQualiatativeTSOEntered');
$xajax->register(XAJAX_FUNCTION,'new_qualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'save_QualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'geecordId');
$xajax->register(XAJAX_FUNCTION,'edit_TSOqualitativeReporting2');
$xajax->register(XAJAX_FUNCTION,'view_NarrativequalitativeReport');
#----------------#the-----------------------------------------
$xajax->register(XAJAX_FUNCTION,'new_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'view_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'save_TSOQuantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'edit_TSOqualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'edit_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'update_QualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'update_TSOQuantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'delete_QualiatativeTSOEntered');
$xajax->register(XAJAX_FUNCTION,'delete_TSOAnnualResults');
$xajax->register(XAJAX_FUNCTION,'TSO_Details');
$xajax->register(XAJAX_FUNCTION,'ResultLead_Details');
$xajax->register(XAJAX_FUNCTION,'Staff_Details');
#----------------------------child status index-===========

#--------------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_publications');
$xajax->register(XAJAX_FUNCTION,'new_publications');
$xajax->register(XAJAX_FUNCTION,'save_publications');
$xajax->register(XAJAX_FUNCTION,'edit_publication');
$xajax->register(XAJAX_FUNCTION,'update_publication');
$xajax->register(XAJAX_FUNCTION,'save_training');
//------------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_TrainingParticipants');
$xajax->register(XAJAX_FUNCTION,'new_TrainingParticipants');
$xajax->register(XAJAX_FUNCTION,'save_TrainingParticipants');
$xajax->register(XAJAX_FUNCTION,'edit_TrainingParticipants');
$xajax->register(XAJAX_FUNCTION,'update_TrainingParticipants');

//-------------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'ViewCFTechnicalTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'new_CFTechnicalTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'edit_CFTechnicalTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'update_TechnicalTraining');
$xajax->register(XAJAX_FUNCTION,'delete_TechnicalTraining');
//----------Other Tranings-------------------------------------
$xajax->register(XAJAX_FUNCTION,'ViewOtherTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'new_OtherTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'edit_OtherTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'update_OtherTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'delete_OtherTechnicalTraining');


//---------------ADOPTION RATES---------------------------------
$xajax->register(XAJAX_FUNCTION,'ViewAdoptionRates');
$xajax->register(XAJAX_FUNCTION,'new_AdoptionRates');
$xajax->register(XAJAX_FUNCTION,'edit_AdoptionRates');
$xajax->register(XAJAX_FUNCTION,'update_AdoptionRates');
$xajax->register(XAJAX_FUNCTION,'delete_CarpAdoptionRates');


//----------Feield Days----------------------------------------
$xajax->register(XAJAX_FUNCTION,'ViewFieldDaysandDemonstrations');
$xajax->register(XAJAX_FUNCTION,'edit_FieldDaysandDemonstrations');
$xajax->register(XAJAX_FUNCTION,'new_FieldDaysandDemonstrations');
$xajax->register(XAJAX_FUNCTION,'update_FieldDaysandDemonstrations');
$xajax->register(XAJAX_FUNCTION,'delete_CarpFieldDaysandDemonstrations');


$xajax->register(XAJAX_FUNCTION,'edit_training');
$xajax->register(XAJAX_FUNCTION,'edit_TechnicalTraining');
$xajax->register(XAJAX_FUNCTION,'update_training');
$xajax->register(XAJAX_FUNCTION,'calc_training');
$xajax->register(XAJAX_FUNCTION,'save_training');

//-----------------------sta=================
$xajax->register(XAJAX_FUNCTION,'edit_staffReporting');
$xajax->register(XAJAX_FUNCTION,'Update_staffReporting');

$xajax->register(XAJAX_FUNCTION,'new_staffReporting');
$xajax->register(XAJAX_FUNCTION,'save_staffReporting');
$xajax->register(XAJAX_FUNCTION,'delete_staffReporting');
;


#--------view_resultLeadReportingData-------------

$xajax->register(XAJAX_FUNCTION,'view_FarmersProductionRecordsReportLog');
$xajax->register(XAJAX_FUNCTION,'view_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'new_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'save_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'update_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'edit_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'getRecordIdFarmersRecord');
$xajax->register(XAJAX_FUNCTION,'calc_trainingSemiAnnual');

			//xajax_ViewCFTechnicalTrainingActivities('','','');
			//xajax_CFTechnicalTrainingActivities('','','');


function get_Stringorg($getString){
$str="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}


#************************************************
#************************************************
require_once('save.php');
require_once('edit.php');
require_once('delete.php');


function view_form2($quarter,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$data="<form action=\"".$PHP_SELF."\" name='form2' id='form2' method='post'>
<table  width='920px' height='400px'  border='0' cellspacing='1' cellpadding='1'>

<tr>
<th><center><font size=''>&nbsp;&nbsp;Commodity Production and Marketing Activity Form2: Subforms</font> </center>
   </th>
</tr>

<tr>
	<td>
		<div  class='fond'>
		<div  style='cursor:pointer; font-size:18px; font-weight:bold;'>
			<a onclick=\"loadingIconFormTwo('go_to_enterpriseTechAdoption');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#8CD6DE; '>
					<span style='color: #011F63; font-size: 250%;'>Enterprise Technology Adoption form</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormTwo('go_to_labourSavingTech');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#f8b334; vertical-align: middle;'>
					<span style='color: #011F63; font-size: 250%;'>Labour Saving Technology form</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormTwo('go_to_mediaPrograms');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#97bf0d; vertical-align: middle;'>
					<span style='color: #011F63; font-size: 250%;'>Media Programs form</span>
				</div>
			</a>
		</div>


		<div style='cursor:pointer; font-size:12px; font-weight:bold;'>
			<a onclick=\"loadingIconFormTwo('go_to_youthApprentice');return false;\">		
				<div align='center' class='style_prevu_kit' style='background-color:#f8b334;'>
					<span style='color: #011F63; font-size: 250%;'>Youth Apprenticeship form</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormTwo('go_to_bds');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#8CD6DE;'>
					<span style='color: #011F63; font-size: 250%;'>Business Development Services form</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormTwo('go_to_bankLoans');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#f8b334;'>
					<span style='color: #011F63; font-size: 250%;'>Bank Loans form</span>
				</div>
			</a>
		</div>


		<div style='cursor:pointer; font-size:12px; font-weight:bold;'>
		<a onclick=\"loadingIconFormTwo('go_to_inputSales');return false;\">
			<div align='center' class='style_prevu_kit' style='background-color:#97bf0d;'>
				
					<span style='color: #011F63; font-size: 250%;'>Input Sales form</span>
				
			</div>
		</a>
		<a onclick=\"loadingIconFormTwo('go_to_phh');return false;\">
			<div align='center' class='style_prevu_kit' style='background-color:#f8b334;'>
				
					<span style='color: #011F63; font-size: 250%;'>PHH form</span>
				
			</div>
		</a>
		<a onclick=\"loadingIconFormTwo('go_to_partnerships');return false;\">
			<div align='center' class='style_prevu_kit' style='background-color:#8CD6DE;'>
			
				<span style='color: #011F63; font-size: 250%;'>Public Private Partnership form</span>
			
			</div>
		</a>
		</div>
	</td>
</tr>";


$data.="<tr class='green'>
<td><i>Please, click on the form that you wish to access</i></td>
</tr>"; 

$data.="</table>";
	
	

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}

function view_enterpriseTechAdoption($region,$reporting_period,$cpma_year,$trName,$trCode,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['trName']=$trName;
$_SESSION['trCode']=$trCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$trName=($_SESSION['trName']<>''?$_SESSION['trName']:$trName);
$trCode=($_SESSION['trCode']<>''?$_SESSION['trCode']:$trCode);




$data="<form action='".$_SERVER['PHP_SELF']."' name='enterpriseTechAdoptionEdit' id='enterpriseTechAdoptionEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".enterpriseTechnologyAdoptionFilter();

$data.="<tr class='evenrow'>
	<th colspan='17'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Enterprise Technology Adoption
	</th>
</tr>";



//===================data to be displayed=====================
$data.="<tr >
 <td rowspan='2' class='first-cell-header'>#.</td>
 <td rowspan='2' class='largest-cell-header'>Name of Business</td>
 <td rowspan='2' >Value Chain</td>
 <td rowspan='2' >Trader Code</td>
 <td rowspan='2' >Reporting Period</td>
 <td rowspan='2' >Type of Business</td>
 <td rowspan='2' >Location</td>
 <td rowspan='2' >Duration with the Activity</td>
 <td rowspan='2' >Organisation level technologies and management practices</td>
 <td rowspan='2' >Technical innovations</td>
 <td rowspan='2' >Land based technologies</td>
 <td rowspan='2' >Amount invested in Technology adoption (UGX)</td>
 <td colspan='4' >Jobs Created</td>
 <td rowspan='2' class='largest-cell-header'>Action</td>
  </tr>
  <tr >
 <td  >Name of Job holder</td>
 <td >Sex</td>
 <td >Date of engagement</td>
 <td >Time spent on job (Months)</td>
  </tr>
  </thead>
  <tbody>";
  
  
  switch($cpma_year){
			case'CPMA Year One':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
			and `t`.`year` in (2012,2013)";
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
			and `t`.`year` in (2013,2014)";
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `t`.`year` in (2014,2015)";
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `t`.`year` in (2015,2016)";
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `t`.`year` in (2016,2017)";
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `t`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch($reporting_period){
			case'Oct 2012 - Mar 2013':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
			and `t`.`year` in (2012,2013)
			";
			break;
			
			case'Apr 2013 - Sep 2013':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `t`.`year` in (2013)
			";
			break;
			
			case'Oct 2013 - Mar 2014':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `t`.`year` in (2013,2014)
			";
			break;
			
			case'Apr 2014 - Sep 2014':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `t`.`year` in (2014)
			";
			break;
			
			case'Oct 2014 - Mar 2015':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `t`.`year` in (2014,2015)
			";
			break;
			
			case'Apr 2015 - Sep 2015':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `t`.`year` in (2015)
			";
			break;
			
			case'Oct 2015 - Mar 2016':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `t`.`year` in (2015,2016)
			";
			break;
			
			case'Apr 2016 - Sep 2016':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `t`.`year` in (2016)
			";
			break;
			
			case'Oct 2016 - Mar 2017':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `t`.`year` in (2016,2017)
			";
			break;
			
			case'Apr 2017 - Sep 2017':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `t`.`year` in (2017)
			";
			break;
			
			case'Oct 2017 - Mar 2018':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `t`.`year` in (2017,2018)
			";
			break;
			
			case'Apr 2018 - Sep 2018':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `t`.`year` in (2018)
			";
			break;
			
			
			break;
			
			default:
			break;
		}
  
$query_string="SELECT 
t.*,
case
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2012-10-01') and ('2013-03-31') 
	and `t`.`year` in (2012,2013) 
	then 'Oct 2012 - Mar 2013'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2013-04-01') and ('2013-09-30') 
	and `t`.`year` in (2013) 
	then 'Apr 2013 - Sep 2013'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2013-10-01') and ('2014-03-31') 
	and `t`.`year` in (2013,2014) 
	then 'Oct 2013 - Mar 2014'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2014-04-01') and ('2014-09-30') 
	and `t`.`year` in (2014) 
	then 'Apr 2014 - Sep 2014'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2014-10-01') and ('2015-03-31') 
	and `t`.`year` in (2014,2015) 
	then 'Oct 2014 - Mar 2015'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2015-04-01') and ('2015-09-30') 
	and `t`.`year` in (2015) 
	then 'Apr 2015 - Sep 2015'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2015-10-01') and ('2016-03-31') 
	and `t`.`year` in (2015,2016) 
	then 'Oct 2015 - Mar 2016'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2016-04-01') and ('2016-09-30') 
	and `t`.`year` in (2016) 
	then 'Apr 2016 - Sep 2016'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2016-10-01') and ('2017-03-31') 
	and `t`.`year` in (2016,2017) 
	then 'Oct 2016 - Mar 2017'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2017-04-01') and ('2017-09-30') 
	and `t`.`year` in (2017) 
	then 'Apr 2017 - Sep 2017'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2017-10-01') and ('2018-03-31') 
	and `t`.`year` in (2017,2018) 
	then 'Oct 2017 - Mar 2018'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2018-04-01') and ('2018-09-30') 
	and `t`.`year` in (2017) 
	then 'Apr 2018 - Sep 2018'
	
else `t`.`reportingPeriod`
end 
as  `reportingPeriod_cleaned`,
x.`tbl_tradersId`,
x.traderCode,
x.`traderName`,
`v`.* 
from `tbl_techadoption` t,
`tbl_traders` x, 
tbl_mainvaluechain as `v`
where `t`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')
and x.`tbl_tradersId`=t.`businessTraderName`";
$reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode;
					
$query_string.=" order by t.`tbl_techadoptionId` DESC";

/* $obj->alert($query_string); */

  
	$n=1;
	//$query_=mysql_query($query_string)or die(mysql_error());
	
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_tech_adoption_jobHolder` WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
	  
			$data.="<tr>";
			$data.="<td ".$row_span.">".$n.".</td>";
			$data.="<td ".$row_span.">".$row_parent['traderName']."</td>";
			$data.="<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>"; 
			$data.="<td ".$row_span.">&nbsp;".$row_parent['traderCode']."</td>";
			
			$data.="<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>";			
			$data.="<td ".$row_span.">".$row_parent['typeOfBusiness']."</td>";
			$data.="<td ".$row_span.">".$row_parent['businessLocation']."</td>";
			$data.="<td ".$row_span.">".$row_parent['durationWithOldActivity']."</td>";
			$data.="<td ".$row_span.">".$row_parent['nameOfImprovedTech']."</td>";
			$data.="<td ".$row_span.">".$row_parent['techAdoptedInReportingPeriod']."</td>";
			$data.="<td ".$row_span.">".$row_parent['techContinuedFromPast']."</td>";
			$data.="<td ".$row_span." align='right'>".(number_format($row_parent['amountInvestedInTechAdoption']))."</td>";
			
			//return first row of child records
			$s_first_child = mysql_query("SELECT * FROM `tbl_tech_adoption_jobHolder` 
			WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']." limit 0,1")or die(mysql_error());
			$first_child_row = mysql_fetch_array($s_first_child );
			$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
			<td>".$first_child_row['sexOfJobHolder']."</td>";
			$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
			$data.="<td>".$dateOfEngagement."</td>
			<td>".$first_child_row['timeSpentOnJob']."</td>";
			
			//end of parent record row
					$data.="<td  ".$col_span." ".$row_span." >
						<input type='button' class='formButton2' title='Edit'
							onclick=\"xajax_edit_enterpriseTechAdoption(".$row_parent['tbl_techadoptionId'].");return false;\" value='edit' /> |
						<input type='button' value='Delete' class='red'
							onclick=\"ConfirmDelete(xajax.getFormValues('enterpriseTechAdoptionEdit'),'Delete_enterpriseTechAdoption');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_tech_adoption_jobHolder` 
					WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='16'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_enterpriseTechAdoption('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_enterpriseTechAdoption('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_enterpriseTechAdoption('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_enterpriseTechAdoption('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_enterpriseTechAdoption('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_enterpriseTechAdoption--------------------------------------------------------
function new_enterpriseTechAdoption($addField){
$obj = new xajaxResponse();

$n=1;
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$QueryManager=new QueryManager('');

if($addField==''OR $addField==0){
    $addField=15;
}

//$obj->alert($addField);

$data="<form action=\"".$PHP_SELF."\" name='enterpriseTechAdoption' id='enterpriseTechAdoption' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table width='100%' id='tech' border='0' cellpadding='2' cellspacing='2'>
  <tr class='evenrow3' height='31'>
    <th colspan='15'>
      <div align='center'>
        Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Enterprise Technology Adoption
      </div>
    </th>
  </tr>";


  $data.="<tr class='evenrow3'>";
    $data.="<td colspan='7'>Value Chain/Tech Area";
 	$data.="<select name='valueChainEnterpriseTechAdoption' id='valueChainEnterpriseTechAdoption' style='width:200px;'>
          <option value=''>-select-</option>";
		 $data.=$QueryManager->valueChainFilter($program_id,$project_id);
		  $data.="</select>";
                  $data.="</td>";

$data.="
  </tr>

  <tr class='evenrow' height='32'>
    <th rowspan='3' height='103'>S/No.</th>

    <th rowspan='3'>Name of BUSINESS (Trader,Exporter,Processor,Input dealer),Trade and business association or CBOs</th>

    <th rowspan='3'>Location (Urban/ Rural)</th>

    <th rowspan='3'>Duration with the Activity</th>

    <th rowspan='3'>Name of improved technology or management practice exposed to</th>

    <th rowspan='3'>Name of NEW improved technology or management practice adopted within the reporting period</th>

    <th rowspan='3'>Name of technology or management practices continued with from past reporting periods</th>

    <th rowspan='3'>Amount invested in Technology adoption (UGX)</th>

    <th colspan='6'>Jobs Created</th>
    <th rowspan='3'>action</th>
</tr>

  <tr class='evenrow' height='34'>
    <th colspan='2' height='34'>Female</th>

    <th colspan='2'>Male</th>

    <th colspan='2'>Total</th>
   </tr>

  <tr>
    <th>N</th>

    <th>O</th>

    <th>N</th>

    <th>O</th>

    <th>N</th>

    <th>O</th>
   </tr>";
 
$data.="
<tbody id='theBody'>
<tr class='evenrow' height='60'>
    <td align='right' height='60'>1</td>
    <input name='loopkey[]' id='loopkey' value='1' type='hidden'>
    <td>";
   // $data.="<textarea name='businessTraderName[]' id='businessTraderName1' cols='50' rows='3'></textarea>";
    $data.="<select name='businessTraderName[]' id='businessTraderName1'>
    <option value=''>-select-</option>";
    $data.=$QueryManager->filterTrader($trCode);
    $data.="</select>";
    $data.="</td>

    <td><select name='businessLocation[]' id='businessLocation1' style='width:80px;'>
      <option value=''>-select-</option>
      <option value='Urban'>Urban</option>
      <option value='Rural'>Rural</option>
      </select>
      </td>
      
      <td>
      <select name='durationWithActivity[]' id='durationWithActivity1'>
        <option value=''>-select-</option>
        <option value='New'>New</option>
        <option value='Old'>Old</option>
        </select>
        </td>
        
        <td><textarea name='nameOfImprovedTech[]' id='nameOfImprovedTech1' style='width:100px;'></textarea></td>

    <td><textarea name='techAdoptedInReportingPeriod[]' id='techAdoptedInReportingPeriod1' style='width:100px;'></textarea></td>

    <td><textarea name='techContinuedFromPast[]' id='techContinuedFromPast1' style='width:100px;'>      </textarea></td>

    <td><input name='amountInvestedInTechAdoption[]' id='amountInvestedInTechAdoption1' onkeypress=\"return numbersonly(event, false)\" style='width:100px;' type='text'></td>
    
    <td><input name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
                                                                                                                                    
    <td><input name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedMaleNew[]' id='jobsCreatedMaleNew1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly='readonly' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly='readonly' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
  <td></td></tr>	 			
   			</tbody>
   		</table>	
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>
                
<table style='display:none' >";

   
    $data.="<tbody id=\"template-div\">
    <tr class='evenrow' height='60'>";
    
    $data.="<td align='right' height='60'></td>
    <input name='loopkey[]' id='loopkey' value='1' type='hidden'>
    <td>";
   // $data.="<textarea name='businessTraderName[]' id='businessTraderName1' cols='50' rows='3'></textarea>";
    $data.="<select name='businessTraderName[]' id='businessTraderName1'>
    <option value=''>-select-</option>";
    $data.=$QueryManager->filterTrader($trCode);
    $data.="</select>";
    $data.="</td>

    <td><select name='businessLocation[]' id='businessLocation' style='width:80px;'>
      <option value=''>-select-</option>
      <option value='Urban'>Urban</option>
      <option value='Rural'>Rural</option>
      </select>
      </td>
      <td><select name='durationWithActivity[]' id='durationWithActivity1'>
        <option value=''>-select-</option>
        <option value='New'>New</option>
        <option value='Old'>Old</option>
        </select>
        </td>
        <td><textarea name='nameOfImprovedTech[]' id='nameOfImprovedTech' style='width:100px;'></textarea></td>

    <td><textarea name='techAdoptedInReportingPeriod[]' id='techAdoptedInReportingPeriod' style='width:100px;'></textarea></td>

    <td><textarea name='techContinuedFromPast[]' id='techContinuedFromPast' style='width:100px;'>      </textarea></td>

    <td><input name='amountInvestedInTechAdoption[]' id='amountInvestedInTechAdoption' onkeypress=\"return numbersonly(event, false)\" style='width:100px;' type='text'></td>
    
    <td><input name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
                                                                                                                                    
    <td><input name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedMaleNew[]' id='jobsCreatedMaleNew1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly='readonly' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
    <td><input name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly='readonly' onkeyup=\"xajax_calc_enterpriseTechAdoption(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
  
  <td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" />
        
  </td>
                    </tr>
                    
</tbody>";

$data.="</table>";
  $data.="</td>";
$data.="</tr>";

$data.="<tr class='evenrow'>
  <td colspan='22'>
  <tr class='evenrow'>
    <td colspan=''>Compiled by :</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:280px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=''>Reviewed by :</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:280px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=''>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:280px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=''>Date of Submission :</td>
    <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.enterpriseTechAdoption.DateSubmission);return false;\" hidefocus=''>
    <input name='DateSubmission' type='text'  size='50' value='' id='DateSubmission' readonly='readonly'/>
    <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    </td>
  </tr>
  </td>
  </tr>";
  
  $data.="<tr class='evenrow3'>
  <td colspan='22'>
  <table width='100%' border='0' cellpadding='2' cellspacing='2'>
  <tr class='evenrow'>
            <td colspan='22' align='right'>
                <div align='right'>
                    <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_enterpriseTechAdoption(xajax.getFormValues('enterpriseTechAdoption')); return false;\" />
                </div>
            </td>
            </tr>
            </table>
            </td>
        </tr>";
  
$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function new_enterpriseTechAdoption--------------------------------------------------------
function calc_enterpriseTechAdoption($jobsCreatedFemaleNew1,
                                     $jobsCreatedFemaleOld1,
                                     $jobsCreatedMaleNew1,
                                     $jobsCreatedMaleOld1,
                                     $jobsCreatedTotalNew1,
                                     $jobsCreatedTotalOld1,
                                     $jobsCreatedFemaleNew2,
                                     $jobsCreatedFemaleOld2,
                                     $jobsCreatedMaleNew2,
                                     $jobsCreatedMaleOld2,
                                     $jobsCreatedTotalNew2,
                                     $jobsCreatedTotalOld2
                                     ){
$obj= new xajaxResponse();

$jobsCreatedTotalNew=0;
$jobsCreatedTotalNew=(($jobsCreatedFemaleNew1)+($jobsCreatedMaleNew1));
$obj->assign($jobsCreatedTotalNew1,"value",$jobsCreatedTotalNew);

$jobsCreatedTotalOld=0;
$jobsCreatedTotalOld=($jobsCreatedFemaleOld1+$jobsCreatedMaleOld1);

$obj->assign($jobsCreatedTotalOld1,"value",$jobsCreatedTotalOld);


return $obj;
}
function save_enterpriseTechAdoption($formValues){
$obj = new xajaxResponse();


    $valueChain=$formValues['valueChainEnterpriseTechAdoption'];
    $reportingPeriod=$_SESSION['quarter'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['DateSubmission'];
 
 

for($x=0;$x<count($formValues['loopkey']);$x++){

$businessTraderName=$formValues['businessTraderName'][$x];
 $businessLocation=$formValues['businessLocation'][$x];
 $durationWithActivity=$formValues['durationWithActivity'][$x];
 $nameOfImprovedTech=$formValues['nameOfImprovedTech'][$x];
 $techAdoptedInReportingPeriod=$formValues['techAdoptedInReportingPeriod'][$x];
 $techContinuedFromPast=$formValues['techContinuedFromPast'][$x];
 
 
 $amountInvestedInTechAdoption=$formValues['amountInvestedInTechAdoption'][$x];
 if($amountInvestedInTechAdoption=='' or $amountInvestedInTechAdoption==null){
  $amountInvestedInTechAdoption=0;  
}
 
 
 $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}

 
 
 
 //code assisting in enforcing strictly one week's worth of reporting--------------------------------------------

$Today=date('Y-m-d');
$DateSubmissionDay=date('l',strtotime($DateSubmission));
$dateCompared=$DateSubmission;
//$endDate=date('Y-m-d', strtotime('-7 days'));
//$obj->alert($userName);
//$activeQuarter=$_SESSION['quarter'];
$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


/*elseif (($dateCompared<$endDate)AND (!(($_SESSION['GroupCode']=='SystemAdministrator')) )){
    
    $obj->alert("You can only report for the last seven days.");
    return $obj;*/
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future .");
    return $obj;
}
 
 if($businessTraderName<>''){
 
 $stmnt="INSERT INTO `tbl_techadoption`(`valueChain`,`reportingPeriod`,`businessTraderName`,
                               `businessLocation`, `durationWithActivity`, `nameOfImprovedTech`,
                               `techAdoptedInReportingPeriod`, `techContinuedFromPast`,
                               `amountInvestedInTechAdoption`, `jobsCreatedFemaleNew`,
                               `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`,
                               `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
                               `jobsCreatedTotalOld`, `CompiledBy`,
                               `ReviewedBy`, `SubmittedBy`,
                               `DateSubmission`)
VALUES
('".$valueChain."','".$activeQuarter."','".$businessTraderName."',
 '".$businessLocation."','".$durationWithActivity."','".$nameOfImprovedTech."',
 '".$techAdoptedInReportingPeriod."','".$techContinuedFromPast."',
 '".$amountInvestedInTechAdoption."','".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."','".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."','".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."','".$CompiledBy."',
 '".$ReviewedBy."','".$SubmittedBy."',
 '".$DateSubmission."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die("CPMA Error-code 610 because ".http(__line__));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_enterpriseTechAdoption','','','','');
return $obj;
}
function view_labourSavingTech($reporting_period,$cpma_year,$valueChain,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);


$data="
<form action=\"".$_SERVER['PHP_SELF']."\" name='labourSavingTech' id='labourSavingTech' method='post'>
";
$data.="
	<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".labourSavingTechFilter();
$data.="
			<tr>
				<th colspan='12'>
				Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Labour Saving Technology
				</th>
			</tr>
		";			

						//===================data to be displayed=====================
		$data.="
			<tr>
				<th rowspan='2' class='first-cell-header'>#</th>
				<th rowspan='2' >Name of Labour Saving technology</th>
				<th rowspan='2' class='small-cell-header'>Value Chain</th>
				<th rowspan='2' >Reporting Period</th>
				<th rowspan='2' >Labour saving concept</th>
				<th rowspan='2' >Person/Partner responsible for promoting adoption</th>
				<th rowspan='2' class='small-cell-header'>Amount invested in Technology adoption (UGX)</th>
				<th colspan='4' class='small-cell-header'>Jobs Created</th>
				<th rowspan='2' class='largest-cell-header'>Action</th>
			</tr>
			<tr>
				<th >Name of Job holder</th>
				<th class='small-cell-header'>Sex</th>
				<th >Date of engagement</th>
				<th class='small-cell-header'>Time spent on job (Months)</th>
			</tr>
	</thead>
	<tbody>
		";
  
	$table='tbl_laboursavingtech';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_laboursavingtechId';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}



	


  
  
	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Apr - Sep') 
			and `l`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `l`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `l`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `l`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `l`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `l`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `l`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `l`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `l`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `l`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `l`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `l`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `l`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `l`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `l`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `l`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `l`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `l`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `l`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `l`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `l`.*,
		case
		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `l`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `l`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `l`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `l`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `l`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `l`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `l`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `l`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `l`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `l`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `l`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `l`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
		`v`.*
		from `tbl_laboursavingtech` as `l`, 
		tbl_mainvaluechain as `v`
		where `l`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%') ";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
		$query_string.=$reporting_period.$cpma_year.$valueChain;
		$query_string.=" order by `l`.`tbl_laboursavingtechId` desc";
		
		

	$n=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
	while($row_parent=mysql_fetch_array($new_query)){
		
		//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_labourSavingTech_jobHolder` WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				
		$data.="<tr>
					<td ".$row_span.">".$n.".</td>
					<td ".$row_span.">".$row_parent['labourSavingTech']."</td>
					<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>
					<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>
					<td ".$row_span.">".$row_parent['labourSavingConcept']."</td>
					<td ".$row_span.">".$row_parent['personResponsible']."</td>
					<td ".$row_span." align='right'>".number_format(($row_parent['amountInvestedOnTechInvestment']),2)."</td>";
					
				
				
				//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_labourSavingTech('".$row_parent['tbl_laboursavingtechId']."');return false;\" value='edit' /> |
						<input type='button' class='disabled' disabled='disabled' value='Delete'
							onclick=\"ConfirmDelete('".$row_parent['tbl_laboursavingtechId']."','Delete_labourSavingTech');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='11'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_labourSavingTech('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_labourSavingTech('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_labourSavingTech('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_labourSavingTech('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_labourSavingTech('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_labourSavingTech--------------------------------------------------------
function new_labourSavingTech($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();
$n=1;
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

if($addField==''OR $addField==0){
    $addField=15;
}

//$obj->alert('form 4 action');


$data="<form action=\"".$PHP_SELF."\" name='labourSavingTech' id='labourSavingTech' method='post'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2' id='report'>";


$data.="
<tr class='evenrow3' height='33'>
    <th colspan='10' height='33'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Labour Saving Technology</div></th>
  </tr>
  <tr class='evenrow3'>
    <td class='thfoot' colspan='3'>Value Chain/Tech Area :
      <select name='techArea' id='techArea' style='width:200px;'>";
      $data.=QueryManager::valueChainFilter($program_id,$project_id);
      $data.="</select>";
      $data.="</td>";
    $data.="</tr>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="
<table width='100%' border='0' cellspacing='2' cellpadding='2'>
<tr class='evenrow' height='26'>
    <th rowspan='3'>#</th>
    <th rowspan='3'>Name of Labour Saving technology</th>
    <th rowspan='3'>Labour saving concept</th>
    <th rowspan='3'>Person/Partner responsible for promoting adoption</th>
    <th colspan='6'>Jobs Created</th>
    <th rowspan='7'>Action</th>
</tr>
  <tr class='evenrow' height='26'>
    <th colspan='2' height='26'>Female</th>
    <th colspan='2'>Male</th>
    <th colspan='2'>Total</th>
   </tr>
  <tr class='evenrow' height='26'>
    <th height='26'>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
  </tr>";
 
  
  
  
  $data.="
  <tbody id='theBody'>
  <tr class='evenrow' height='60'>
    <td height='60' align='right'>1</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1' />
    <td><select name='labourSavingTech[]' id='labourSavingTech1' style='width:200px;'>";
    $data.="<option value=''>-select-</option>";
    $stmnt="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='30' ORDER BY  l.`codeName` ASC";
    $qTech=@mysql_query($stmnt);
    while($row=@mysql_fetch_array($qTech)){
     $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";   
    }
    $data.="</select></td>
    <td><textarea name='labourSavingConcept[]' id='labourSavingConcept1' cols='25' rows='3'></textarea></td>
    <td><input type='text' name='personResponsible[]' id='personResponsible1' style='width:280px;' /></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly=readonly onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly=readonly onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td></tr>";
  
$data.="
 </tbody>
 </table>	
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>

<table style='display:none' >";
$data.="<tbody id=\"template-div\">
    
<tr class='evenrow' height='60'>
    <td height='60' align='right'>1</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1' />
    <td><select name='labourSavingTech[]' id='labourSavingTech1' style='width:200px;'>";
    $data.="<option value=''>-select-</option>";
    $stmnt="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='30' ORDER BY  l.`codeName` ASC";
    $qTech=@mysql_query($stmnt);
    while($row=@mysql_fetch_array($qTech)){
     $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";   
    }
    $data.="</select></td>
    <td><textarea name='labourSavingConcept[]' id='labourSavingConcept1' cols='25' rows='3'></textarea></td>
    <td><input type='text' name='personResponsible[]' id='personResponsible1' style='width:280px;' /></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                   getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly=readonly onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly=readonly onKeyUp=\"xajax_calc_labourSavingTech(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td> 
    

<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" />
</td>
</tr>
</tbody>
</table>"; 
  
  $data.="</td>";  
$data.="</tr>";
  

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>
  <tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='Compiledby' id='Compiledby' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='Reviewedby' id='Reviewedby' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='Submittedby' id='Submittedby' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.labourSavingTech.labourSavingTechDateSubmission);return false;\" hidefocus=''>
            <input name='labourSavingTechDateSubmission' type='text' style='width:200px;'  size='50' value='' id='labourSavingTechDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_labourSavingTech(xajax.getFormValues('labourSavingTech')); return false;\" />
            </div>
    </td>
  </tr>
</table>";
$data.="</td>";  
$data.="</tr>";


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function new_labourSavingTech--------------------------------------------------------
//calc_labourSavingTech
function calc_labourSavingTech($jobsCreatedFemaleNew1,
                                     $jobsCreatedFemaleOld1,
                                     $jobsCreatedMaleNew1,
                                     $jobsCreatedMaleOld1,
                                     $jobsCreatedTotalNew1,
                                     $jobsCreatedTotalOld1,
                                     $jobsCreatedFemaleNew2,
                                     $jobsCreatedFemaleOld2,
                                     $jobsCreatedMaleNew2,
                                     $jobsCreatedMaleOld2,
                                     $jobsCreatedTotalNew2,
                                     $jobsCreatedTotalOld2,
                                     $jobsCreatedFemaleOld3,
                                     $jobsCreatedMaleNew3,
                                     $jobsCreatedMaleOld3,
                                     $jobsCreatedTotalNew3,
                                     $jobsCreatedTotalOld3
                                     ){
$obj= new xajaxResponse();

$jobsCreatedTotalNew=0;
$jobsCreatedTotalNew=(($jobsCreatedFemaleNew1)+($jobsCreatedMaleNew1));
$obj->assign($jobsCreatedTotalNew1,"value",$jobsCreatedTotalNew);

$jobsCreatedTotalOld=0;
$jobsCreatedTotalOld=($jobsCreatedFemaleOld1+$jobsCreatedMaleOld1);
$obj->assign($jobsCreatedTotalOld1,"value",$jobsCreatedTotalOld);
return $obj;
}
//save_labourSavingTech
function save_labourSavingTech($formValues){
$obj = new xajaxResponse();


    $valueChain=$formValues['techArea'];
    $reportingPeriod=$_SESSION['quarter'].=' '.$_SESSION['CPMactiveyear'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['labourSavingTechDateSubmission'];
 
 

for($x=0;$x<count($formValues['loopkey']);$x++){

    
 $labourSavingTech=$formValues['labourSavingTech'][$x];
 $labourSavingConcept=$formValues['labourSavingConcept'][$x];
 $personResponsible=$formValues['personResponsible'][$x];
 
  $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}

 //code assisting in enforcing strictly one week's worth of reporting--------------------------------------------

$Today=date('Y-m-d');
$DateSubmissionDay=date('l',strtotime($DateSubmission));
$dateCompared=$DateSubmission;
//$endDate=date('Y-m-d', strtotime('-7 days'));
//$obj->alert($userName);
//$activeQuarter=$_SESSION['quarter'];
$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


/*elseif (($dateCompared<$endDate)AND (!(($_SESSION['GroupCode']=='SystemAdministrator')) )){
    
    $obj->alert("You can only report for the last seven days.");
    return $obj;*/
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future .");
    return $obj;
}
 
 if($labourSavingTech<>'' or $labourSavingTech<>0){
 
 $stmnt="INSERT INTO `tbl_laboursavingtech`(`valueChain`,`reportingPeriod`,
                                `labourSavingTech`,`labourSavingConcept`,
                                `personResponsible`,`jobsCreatedFemaleNew`,
                               `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`,
                               `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
                               `jobsCreatedTotalOld`, `CompiledBy`,
                               `ReviewedBy`, `SubmittedBy`,
                               `DateSubmission`)
VALUES
('".$valueChain."','".$activeQuarter."',
'".$labourSavingTech."','".$labourSavingConcept."',
'".$personResponsible."','".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."','".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."','".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."','".$CompiledBy."',
 '".$ReviewedBy."','".$SubmittedBy."',
 '".$DateSubmission."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die("CPM Error-code 968 because ".http(__line__));



 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_labourSavingTech','','','','');
return $obj;
}
//view_mediaPrograms
function view_mediaPrograms($reporting_period,$cpma_year,$valueChain,$mediaType,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['mediaType']=$mediaType;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);
$mediaType=($_SESSION['mediaType']<>''?$_SESSION['mediaType']:$mediaType);

$data="<form action='".$_SERVER['PHP_SELF']."' name='mediaProgramsEdit' id='mediaProgramsEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".mediaProgramsFilter();
				$data.="<tr>
					<th colspan='14'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Media Programs
					</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
					<th rowspan='2' class='first-cell-header'>#</th>
					<th rowspan='2'>Awareness message designed</th>
					<th rowspan='2' class='small-cell-header'>Value Chain</th>
					<th rowspan='2'>Reporting Period</th>
					<th rowspan='2'>Category of Youth targeted</th>
					<th rowspan='2'>Anticipated results</th>
					<th rowspan='2'>Type of Media utilised</th>
					<th rowspan='2'>Broadcast contract period</th>
					<th rowspan='2'>Districts Covered</th>
					<th colspan='4' class='small-cell-header'>Jobs Created</th>
					<th rowspan='2' colspan='2' class='largest-cell-header'>Action</th>
				</tr>

				<tr>
					<th class='small-cell-header'>Name of Job holder</th>
					<th class='small-cell-header'>Sex</th>
					<th class='small-cell-header'>Date of engagement</th>
					<th class='small-cell-header'>Time spent on job (Months)</th>
				</tr>
			</thead>
		<tbody>";

	$table='tbl_mediaprograms';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_mediaprogramsId';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}
		
		switch(trim($cpma_year)){
			case trim('Project start up'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Apr - Sep') 
			and `m`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
			and `m`.`year` in (2013,2014)";
			break;

			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `m`.`year` in (2014,2015)";
			break;

			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `m`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `m`.`year` in (2015,2016)";
			break;

			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `m`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `m`.`year` in (2016,2017)";
			break;

			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `m`.`year` in (2017,2018)";
			break;

			default:
			break;
			}

			switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `m`.`year` in (2013)
			";
			break;

			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `m`.`year` in (2013,2014)
			";
			break;

			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `m`.`year` in (2014)
			";
			break;

			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `m`.`year` in (2014,2015)
			";
			break;

			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `m`.`year` in (2015)
			";
			break;

			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `m`.`year` in (2015,2016)
			";
			break;

			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `m`.`year` in (2016)
			";
			break;

			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `m`.`year` in (2016,2017)
			";
			break;

			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `m`.`year` in (2017)
			";
			break;

			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `m`.`year` in (2017,2018)
			";
			break;

			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `m`.`year` in (2018)
			";
			break;

			default:
			break;
			}
		
		//Pick parent records		
		$query_string="
			select  `m`.*,
					case
					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2013-04-01') and ('2013-09-30') 
					and `m`.`year` in (2013) 
					then 'Apr 2012 - Sep 2013'
					
					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2013-10-01') and ('2014-03-31') 
					and `m`.`year` in (2013,2014) 
					then 'Oct 2013 - Mar 2014'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2014-04-01') and ('2014-09-30') 
					and `m`.`year` in (2014) 
					then 'Apr 2014 - Sep 2014'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2014-10-01') and ('2015-03-31') 
					and `m`.`year` in (2014,2015) 
					then 'Oct 2014 - Mar 2015'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2015-04-01') and ('2015-09-30') 
					and `m`.`year` in (2015) 
					then 'Apr 2015 - Sep 2015'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2015-10-01') and ('2016-03-31') 
					and `m`.`year` in (2015,2016) 
					then 'Oct 2015 - Mar 2016'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2016-04-01') and ('2016-09-30') 
					and `m`.`year` in (2016) 
					then 'Apr 2016 - Sep 2016'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2016-10-01') and ('2017-03-31') 
					and `m`.`year` in (2016,2017) 
					then 'Oct 2016 - Mar 2017'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2017-04-01') and ('2017-09-30') 
					and `m`.`year` in (2017) 
					then 'Apr 2017 - Sep 2017'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2017-10-01') and ('2018-03-31') 
					and `m`.`year` in (2017,2018) 
					then 'Oct 2017 - Mar 2018'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2018-04-01') and ('2018-09-30') 
					and `m`.`year` in (2018) 
					then 'Apr 2018 - May 2018'
					
				else `m`.`reportingPeriod`
				end 
				as  `reportingPeriod_cleaned`,
				`v`.*,
				DATEDIFF( `m`.`toDate` , `m`.`fromDate` ) AS `duration`
				from `tbl_mediaprograms` AS `m`,
				tbl_mainvaluechain as `v`
				where `m`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')";
				
				$reporting_period=(!empty($cpma_year))?'':$reporting_period;
				$cpma_year=(!empty($reporting_period))?'':$cpma_year;
				$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
				$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
				$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
				$mediaType=(!empty($mediaType))?" AND `m`.`typeOfMedia` LIKE  '%".$mediaType."%' ":"";
				$query_string.=$reporting_period.$cpma_year.$valueChain.$mediaType;
				$query_string.=" order by `m`.`tbl_mediaprogramsId` desc";

				$n=1;
				$query_=mysql_query($query_string)or die(mysql_error());
				/**************
				*paging parameters
				*
				****/
				$max_records = mysql_num_rows($query_);
				$num_pages=ceil($max_records/$records_per_page);
				$offset = ($cur_page-1)*$records_per_page;
				$n=$offset+1;
				$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
		
		while($row_parent=mysql_fetch_array($new_query)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_mediaprogram_jobholder` WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.".</td>
					<td ".$row_span.">".$row_parent['mediaAwarenessMessage']."</td>
					<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>
					<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>
					<td ".$row_span.">".$row_parent['categoryYouthTargeted']."</td>";					
					$data.="<td ".$row_span.">".$row_parent['anticipatedResults']."</td>";
					$typeOfMedia=$row_parent['typeOfMedia'];
					$data.="<td ".$row_span.">
					<ul>";
					$a = mysql_query("SELECT l . * FROM `tbl_lookup` l 
					WHERE l.`classCode`='33' 
					AND l.`status` = 'Yes' 
					ORDER BY l.`code` ASC")or die(mysql_error());
					while($b = mysql_fetch_array($a)){
					$display=(strpos($typeOfMedia, $b['codeName']) !==false)?"".$b['codeName']."":"";
					if($display<>'') {
					$data.="<li>".$display."</li>";
					}
					else{
					$data.="";   
					}
					}
					@mysql_free_result($a); 
					$data.="</ul>
					</td>";
					$duration=((strpos($row_parent['duration'], '-'))=== false)?$row_parent['duration']:str_replace("-","","".$row_parent['duration']."");
					$data.="<td ".$row_span.">".$duration." days</td>
					<td ".$row_span.">".$row_parent['coverage']."</td>";
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_mediaPrograms('".$row_parent['tbl_mediaprogramsId']."');return false;\" value='edit' /> |
						<input type='button' class='disabled' disabled='disabled' value='Delete' class='red'
							onclick=\"ConfirmDelete(xajax.getFormValues('".$row_parent['tbl_mediaprogramsId']."'),'Delete_mediaPrograms');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


			$data.="<tr align='right'>
			<td colspan='13'>";
			$p='';
			$num_links=10;
			$startAt_links=($cur_page-5);
			$endAt_links=($cur_page+$num_links);
			$cur_link=$cur_page;


			if($num_pages>1){
			$links=1;
			$append_bar=$p==$num_pages?"":"|";
			if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_mediaPrograms('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['mediaType']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
			else $data.="<a href='#' onclick=\"xajax_view_mediaPrograms('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['mediaType']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

			$p=2;
			while($p<$num_pages){
			if(($p>$startAt_links) and ($p<$endAt_links)){
			$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_mediaPrograms('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['mediaType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			$p++;
			}
			if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_mediaPrograms('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['mediaType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			}


			$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_mediaPrograms('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['mediaType']."','".$cur_page."',this.value)\">";
			$i=1;
			$selected="";
			while($i*10<=$max_records){
			$selected=$i*10==$records_per_page?"SELECTED":"";
			$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
			$i++;
			}

			$sel=$records_per_page>=$max_records?"SELECTED":"";
			$data.="<option value='".$max_records."' ".$sel.">All</option>";
			$data.="</select>";
			$data.="</br>
				</td>
			</tr>
		</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_mediaPrograms--------------------------------------------------------
function new_mediaPrograms($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();
$n=1;
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$QueryManager=new QueryManager('');

if($addField==''OR $addField==0){
    $addField=15;
}

$data="<form action=\"".$PHP_SELF."\" name='mediaPrograms' id='mediaPrograms' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";
$data.="<tr height='31'>
    <th colspan='14' height='33'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Media Programs</div></th>
</tr>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
 $data.="<tr class='evenrow3' height='28'>
    <td colspan='14' height='28'>Value Chain/Tech Area:
    <select name='valueChain' id='valueChain' style='width:200px;'>";
    $data.=$QueryManager->valueChainFilter($program_id,$project_id);
    $data.="</select>";
      $data.="</td>
  </tr>
</table>";
$data.="</td>";
$data.="</tr>";




$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
 $data.="<tr class='evenrow' height='28'>
    <th rowspan='3' height='84'>#</th>
    <th rowspan='3'>Awareness message designed</th>
    <th rowspan='3'>Value Chain</th>
    <th rowspan='3'>Category of Youth targeted</th>
    <th rowspan='3'>Anticipated results</th>
    <th rowspan='3'>Type of Media utilised</th>
    <th rowspan='3'>Broadcast contract period</th>
    <th rowspan='3'>Coverage</th>
    <th colspan='6'>Jobs Created</th>
    <th rowspan='3'>ACTION</th>
        </tr>
  <tr class='evenrow' height='28'>
    <th colspan='2' height='28'>Female</th>
    <th colspan='2'>Male</th>
    <th colspan='2'>Total</th>
    </tr>
  <tr class='evenrow' height='28'>
    <th height='28'>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
    </tr>";
  
  
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow' height='80'>
    <td height='55'>1<input type='hidden' name='loopkey[]' id='loopkey1' value='1'/></td>
    <td><textarea name='mediaAwarenessMessage[]' id='mediaAwarenessMessage1' cols='25' rows='3'></textarea></td>
    <td><select name='mediaValueChain[]' id='mediaValueChain1' style='width:80px;'>";
    $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classCode` = 34 ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
                                             
                
        $data.="<option value='Beans/Maize'>Beans/Maize</option>";
        $data.="<option value='Beans/Coffee'>Beans/Coffee</option>";
        $data.="<option value='Maize/Coffee'>Maize/Coffee</option>";
                                                
                                                
                                                
    $data.="</select>";
    
    
    
    
    $data.="</td>";
    $data.="<td>";
    $data.="<select name='categoryYouthTargeted[]' id='categoryYouthTargeted1' style='width:80px;'>";
    $data.="<option value=''>-select-</option>";
    $stmnt="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'category youth targeted' ORDER BY  l.`code`";
    $qYouthCat=mysql_query($stmnt);
    while($row=mysql_fetch_array($qYouthCat)){
     $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";     
    }
    $data.="</select>";
    $data.="</td>
    <td><textarea name='anticipatedResults[]' id='anticipatedResults1' cols='25' rows='3'></textarea></td>
    <td>";
    


    $data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='33' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='typeOfMedia1[]' id='typeOfMedia1'
    value=\"".$b['codeName']."\" >".$b['codeName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    
    $data.="</td>
    <td>
    From:<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById('fromDate1'));return false;\"
    hidefocus=''><input name='fromDate[]' type='text'  size='15px' value='' id='fromDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    <br/>To:<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById('toDate1'));return false;\" hidefocus=''>
            <input name='toDate[]' type='text'  size='15px' value='' id='toDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
    <td>";
    
    
    
    
    $data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT * FROM `tbl_zone` z  ORDER BY  z.`zoneName` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='coverage1[]' id='coverage1'
    value=\"".$b['zoneCode']."\" >".$b['zoneName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    $data.="</td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_mediaPrograms(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td></tr>	 			
   			</tbody>
   		</table>	
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";


$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";



$data.="<tr class='evenrow' height='80'>
    <td height='55'>1</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'/>
    <td><textarea name='mediaAwarenessMessage[]' id='mediaAwarenessMessage1' cols='25' rows='3'></textarea></td>
    <td><select name='mediaValueChain[]' id='mediaValueChain1' style='width:80px;'>";
    $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
        $data.="<option value='Beans/Maize'>Beans/Maize</option>";
        $data.="<option value='Beans/Coffee'>Beans/Coffee</option>";
        $data.="<option value='Maize/Coffee'>Maize/Coffee</option>";
    $data.="</select>";
    
    
    
    
    $data.="</td>";
    $data.="<td>";
    $data.="<select name='categoryYouthTargeted[]' id='categoryYouthTargeted1' style='width:80px;'>";
    $data.="<option value=''>-select-</option>";
    $stmnt="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'category youth targeted' ORDER BY  l.`code`";
    $qYouthCat=mysql_query($stmnt);
    while($row=mysql_fetch_array($qYouthCat)){
     $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";     
    }
    $data.="</select>";
    $data.="</td>
    <td><textarea name='anticipatedResults[]' id='anticipatedResults1' cols='25' rows='3'></textarea></td>
    <td>";
    

    $data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='33' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='typeOfMedia1[]' id='typeOfMedia1'
    value=\"".$b['codeName']."\" >".$b['codeName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    
    $data.="</td>
    <td>
    From:<a href='javascript:void(0)'
    onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'fromDate').attr('id')));return false;\"
    
    hidefocus=''>
            <input name='fromDate[]' type='text'  size='15px' value='' id='fromDate2' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    <br/>To:<a href='javascript:void(0)'
    
    onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'toDate').attr('id')));return false;\"
    
    hidefocus=''>
            <input name='toDate[]' type='text'  size='15px' value='' id='toDate2' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
    <td>";
    
    

$data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT * FROM `tbl_zone` z  ORDER BY  z.`zoneName` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='coverage1[]' id='coverage1'
    value=\"".$b['zoneCode']."\" >".$b['zoneName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    $data.="</td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
                                                                                                                                    $data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" />
</td>
</tr>
</tbody>";
$data.="</table>";


$data.="</td>";
$data.="</tr>";
//start of another table segement
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";

$data.="
<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.mediaPrograms.mediaProgramsDateSubmission);return false;\" hidefocus=''>
            <input name='mediaProgramsDateSubmission' type='text' style='width:200px;'  size='50' value='' id='mediaProgramsDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_mediaPrograms(xajax.getFormValues('mediaPrograms')); return false;\" />
            </div>
    </td>
  </tr>

";


$data.="</table>";
$data.="</td>";
$data.="</tr>";
//End of the new table segement

$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_mediaPrograms--------------------------------------------------------
function calc_mediaPrograms($jobsCreatedFemaleNew1,
                                     $jobsCreatedFemaleOld1,
                                     $jobsCreatedMaleNew1,
                                     $jobsCreatedMaleOld1,
                                     $jobsCreatedTotalNew1,
                                     $jobsCreatedTotalOld1
                                     ){
$obj= new xajaxResponse();

$jobsCreatedTotalNew=0;
$jobsCreatedTotalNew=(($jobsCreatedFemaleNew1)+($jobsCreatedMaleNew1));
$obj->assign($jobsCreatedTotalNew1,"value",$jobsCreatedTotalNew);

$jobsCreatedTotalOld=0;
$jobsCreatedTotalOld=($jobsCreatedFemaleOld1+$jobsCreatedMaleOld1);
$obj->assign($jobsCreatedTotalOld1,"value",$jobsCreatedTotalOld);
return $obj;
}
//save_mediaPrograms
function save_mediaPrograms($formValues){
$obj = new xajaxResponse();



    
    $reportingPeriod=$_SESSION['quarter'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['mediaProgramsDateSubmission'];
    $techArea=$formValues['valueChain'];
    


 

for($x=0;$x<count($formValues['loopkey']);$x++){
    

 $valueChain=$formValues['mediaValueChain'][$x];   
 $mediaAwarenessMessage=$formValues['mediaAwarenessMessage'][$x];
 $categoryYouthTargeted=$formValues['categoryYouthTargeted'][$x];
 $anticipatedResults=$formValues['anticipatedResults'][$x];
 $typeOfMedia=$formValues['typeOfMedia'.($x+1)];
 $coverage=$formValues['coverage'.($x+1)];
$fromDate=$formValues['fromDate'][$x];
 $toDate=$formValues['toDate'][$x];
  $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}

 
 
 //code assisting in enforcing strictly one week's worth of reporting--------------------------------------------

$Today=date('Y-m-d');
$DateSubmissionDay=date('l',strtotime($DateSubmission));
$dateCompared=$DateSubmission;
$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


/*elseif (($dateCompared<$endDate)AND (!(($_SESSION['GroupCode']=='SystemAdministrator')) )){
    
    $obj->alert("You can only report for the last seven days.");
    return $obj;*/
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future .");
    return $obj;
}

 if($mediaAwarenessMessage<>''){
 
 $stmnt="INSERT INTO `tbl_mediaprograms`(`techArea`,`valueChain`,`reportingPeriod`,
                                `mediaAwarenessMessage`,`categoryYouthTargeted`,
                                `anticipatedResults`,
                                `typeOfMedia`,
                                `fromDate`,
                                `toDate`,
                                `coverage`,
                                `jobsCreatedFemaleNew`,
                               `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`,
                               `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
                               `jobsCreatedTotalOld`, `CompiledBy`,
                               `ReviewedBy`, `SubmittedBy`,
                               `DateSubmission`)
VALUES
('".$techArea."','".$valueChain."','".$activeQuarter."',
'".$mediaAwarenessMessage."','".$categoryYouthTargeted."',
'".$anticipatedResults."',
'".implode(",",$typeOfMedia)."',
'".$fromDate."',
'".$toDate."',
'".implode(",",$coverage)."',
'".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."','".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."','".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."','".$CompiledBy."',
 '".$ReviewedBy."','".$SubmittedBy."',
 '".$DateSubmission."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die(http(1929));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_mediaPrograms','','','','');
return $obj;
}
//view_youthApprentice
function view_youthApprentice($reporting_period,$cpma_year,$valueChain,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

//$obj->alert('Reached Method');

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);


$data="<form action='".$_SERVER['PHP_SELF']."' name='youthApprentice' id='youthApprentice' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".youthApprenticeFilter();
	
		$data.="<tr>
		<th colspan='18'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/YOUTH APPRENTICESHIPS
					</th>
		</tr>";

		$data.="<tr>
			<th rowspan='4' class='first-cell-header'>#</th>
			<th rowspan='4'>Name of Business incorporating the youth apprenticeship</th>
			<th rowspan='4' class='small-cell-header'>Sex of Owner</th>
			<th rowspan='4' class='small-cell-header'>Value chain</th>
			<th rowspan='4'>Reporting Period</th>
			<th colspan='6' rowspan='2' class='small-cell-header'>Number of Youth attached</th>
			<th rowspan='4'>Apprenticeship period in the Agreement</th>
			<th rowspan='4' >Anticipated outcomes from the apprenticeship program</th>
			<th colspan='4' class='small-cell-header'>Jobs Created</th>
			<th rowspan='4' colspan='4' class='largest-cell-header'>Action</th>
		</tr>
		<tr>
			<th rowspan='3' class='large-cell-header'>Name of Job holder</th>
			<th rowspan='3' class='small-cell-header'>Sex</th>
			<th rowspan='3'>Date of engagement</th>
			<th rowspan='3' class='small-cell-header'>Time spent on job (Months)</th>
		</tr>
		<tr>
			<th colspan='2'>Female</th>
			<th colspan='2'>Male</th>
			<th colspan='2'>Total</th>
		</tr>
		<tr>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
		</tr>
	</thead>
	<tbody>";


  $table='tbl_youthapprentice';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_youthapprenticeId';


	$first_three_chars_rp=substr($reporting_period,0,3);
	

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}
	
			switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Apr - Sep') 
			and `y`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `y`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `y`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `y`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `y`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `y`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `y`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `y`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `y`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `y`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `y`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `y`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `y`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `y`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `y`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `y`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `y`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `y`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `y`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `y`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `y`.*,
		case
		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `y`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `y`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `y`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `y`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `y`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `y`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `y`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `y`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `y`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `y`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `y`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `y`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
  DATEDIFF( `y`.`fromDate`,`y`.`toDate`) AS `duration`,
  `v`.*	
  from `tbl_youthapprentice` as `y`,
  tbl_mainvaluechain as `v`
  where `y`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')  ";
				
					$reporting_period=(!empty($cpma_year))?'':$reporting_period;
					$cpma_year=(!empty($reporting_period))?'':$cpma_year;
					$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
					$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
					$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
					$query_string.=$reporting_period.$cpma_year.$valueChain;
          $query_string.=" group BY `y`.`tbl_youthapprenticeId` ";
					$query_string.=" order BY `y`.`tbl_youthapprenticeId` desc";

			$n=1;
			$query_=mysql_query($query_string)or die(mysql_error());
			 $max_records = mysql_num_rows($query_);
			 $num_pages=ceil($max_records/$records_per_page);
			 $offset = ($cur_page-1)*$records_per_page;
			 $n=$offset+1;
			 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
			
		  
		  while($row_parent=mysql_fetch_array($new_query)){
			  
			
				$s_child="SELECT * FROM `tbl_apprenticeship_jobHolder` WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']."";
				$q_child=Execute($s_child) or die(mysql_error());			
				$num_child_records=mysql_num_rows($q_child);	
						
				$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
				$col_span=($num_child_records>1)?"colspan='2'":"";
				$v=$n+$num_child_records;
				
					$data.="<tr>";
					$data.="<td ".$row_span.">".$n.".</td>";
					$data.="<td ".$row_span.">".($row_parent['nameofBusiness'])."</td>";
					$data.="<td ".$row_span.">".($row_parent['sexBusinessOwner'])."</td>";
					$data.="<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
					$data.="<td ".$row_span.">".($row_parent['reportingPeriod_cleaned'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedFemaleNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedFemaleOld'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedMaleNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedMaleOld'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedTotalNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedTotalOld'])."</td>";
					$duration=((strpos($row_parent['duration'], '-'))=== false)?$row_parent['duration']:str_replace("-","","".$row_parent['duration']."");
					$data.="<td  ".$row_span." align='right'>".$duration." days</td>";
					$data.="<td ".$row_span.">".($row_parent['anticipatedOutcome'])."</td>";
					
					
				
					$s_first_child = mysql_query("SELECT * FROM `tbl_apprenticeship_jobHolder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
				
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_youthApprentice('".$row_parent['tbl_youthapprenticeId']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['tbl_youthapprenticeId']."','Delete_youthApprentice');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					$s_other_children = mysql_query("SELECT * FROM `tbl_apprenticeship_jobHolder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		

		$data.="<tr align='right'>
		<td colspan=17>";

		$p='';
		$num_links=10;
		$startAt_links=($cur_page-5);
		$endAt_links=($cur_page+$num_links);
		$cur_link=$cur_page;


		if($num_pages>1){
		$links=1;
		$append_bar=$p==$num_pages?"":"|";
		if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
		else $data.="<a href='#' onclick=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

		$p=2;
		while($p<$num_pages){
		if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
		}
		$p++;
		}
		if($p==$num_pages){
		$data.="...<a href='#' onclick=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
		}
		}


		$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$cur_page."',this.value)\">";
		$i=1;
		$selected="";
		while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
		}

		$sel=$records_per_page>=$max_records?"SELECTED":"";
		$data.="<option value='".$max_records."' ".$sel.">All</option>";
		$data.="</select>";
		$data.="</br>
		</td>
		</tr>
	</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_youthApprentice--------------------------------------------------------
function new_youthApprentice($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();
$n=1;
$inc=1;
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

if($addField==''OR $addField==0){
    $addField=15;
}


$data="<form action=\"".$PHP_SELF."\" name='youthApprentice' id='youthApprentice' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>
    <th colspan='22'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Youth Apprenticeship<div></th>
    </tr>";
  
$data.="<tr class='evenrow2'>
    <td colspan='2'>Value Chain/Tech Area
      <select name='techArea' id='techArea' style='width:200px;'>";
      $data.=QueryManager::valueChainFilter($program_id,$project_id);
      $data.="</select>";
      $data.="</td>
    <td></td>
  </tr>";

//========table1 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="
<tr class='evenrow' height='23'>
    <th rowspan='4' height='102'>S/No</th>
    <th rowspan='4'>Name of Business incorporating the youth apprenticeship</th>
    <th rowspan='4'>Sex of Owner</th>
    <th rowspan='4'>Value chain</th>
    <th colspan='6' rowspan='2'>Number of Youth attached</th>
    <th rowspan='4'>Apprenticeship period in the Agreement</th>
    <th rowspan='4'>Anticipated outcomes from the apprenticeship program</th>
    <th colspan='6'>Jobs Created</th>
    <th rowspan='4'>ACTION</th>
  </tr>
  <tr class='evenrow' height='28'>
    <th colspan='2' height='28'>Female</th>
    <th colspan='2'>Male</th>
    <th colspan='2'>Total</th>
  </tr>
  <tr class='evenrow' height='23'>
    <th colspan='2' height='23'>Female</th>
    <th colspan='2'>Male</th>
    <th colspan='2'>Total</th>
    <th rowspan='2'>N</th>
    <th rowspan='2'>O</th>
    <th rowspan='2'>N</th>
    <th rowspan='2'>O</th>
    <th rowspan='2'>N</th>
    <th rowspan='2'>O</th>
  </tr>
  <tr class='evenrow' height='28'>
    <th height='28'>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
  </tr>";


 
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow' height='66'>
    <td height='66' align='right'>1</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'/>";
    $data.="<td>";
    $data.="<textarea name='nameofBusiness[]' id='nameofBusiness1'>";
    $data.="</textarea>";
    $data.="</td>";
    
    
    
    
    $data.="<td><select name='sexBusinessOwner[]' id='sexBusinessOwner1' style='width:80px;'>
      <option value=''>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>";
    
    
    
    $data.="<td><select name='valueChainYouthApprenticeship[]' id='valueChainYouthApprenticeship1' style='width:80px;' />
            <option value=''>-select-</option>";
    
        $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
        $data.="</select>";
    $data.="</td>";
    
    
    $data.="<td><input type='text' name='num_youthAttachedFemaleNew[]' id='num_youthAttachedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('num_youthAttachedFemaleNew1').value,
                                                                                                                                                getElementById('num_youthAttachedMaleNew1').value,
                                                                                                                                                'num_youthAttachedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='num_youthAttachedFemaleOld[]' id='num_youthAttachedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('num_youthAttachedFemaleOld1').value,
                                                                                                                                                getElementById('num_youthAttachedMaleOld1').value,
                                                                                                                                                'num_youthAttachedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedMaleNew[]' id='num_youthAttachedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('num_youthAttachedFemaleNew1').value,
                                                                                                                                                getElementById('num_youthAttachedMaleNew1').value,
                                                                                                                                                'num_youthAttachedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedMaleOld[]' id='num_youthAttachedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('num_youthAttachedFemaleOld1').value,
                                                                                                                                                getElementById('num_youthAttachedMaleOld1').value,
                                                                                                                                                'num_youthAttachedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedTotalNew[]' id='num_youthAttachedTotalNew1' class='disabled' readonly='readonly' onkeypress='return numbersonly(event, false)'style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedTotalOld[]' id='num_youthAttachedTotalOld1' class='disabled' readonly='readonly' onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    
    <td>From:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById('fromDate1'));return false;\" hidefocus=''>
            <input name='fromDate[]' type='text'  size='15px' value='' id='fromDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    <br/>To:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById('toDate1'));return false;\" hidefocus=''>
            <input name='toDate[]' type='text'  size='15px' value='' id='toDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    </td>
    <td><textarea name='anticipatedOutcome[]' id='anticipatedOutcome' cols='25' rows='3'></textarea></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' class='disabled' readonly='readonly' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' 
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    
    <td><input type='text' class='disabled' readonly='readonly' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1'
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td>&nbsp;</td>
  </tr>


";


$data.="</tbody>
   		</table>	
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";



$data.="<tr class='evenrow' height='66'>
    <td height='66' align='right'>1</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'/>";
    $data.="<td>";
    $data.="<textarea name='nameofBusiness[]' id='nameofBusiness1'>";
    $data.="</textarea>";
    $data.="</td>";
    
    
    
    
    $data.="<td><select name='sexBusinessOwner[]' id='sexBusinessOwner1' style='width:80px;'>
      <option value=''>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>";
    
    
    
    $data.="<td><select name='valueChainYouthApprenticeship[]' id='valueChainYouthApprenticeship1' style='width:80px;' />
            <option value=''>-select-</option>";
    
        $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
        $data.="</select>";
    $data.="</td>";
    
    
    $data.="<td><input type='text' name='num_youthAttachedFemaleNew[]' id='num_youthAttachedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'num_youthAttachedFemaleNew').val(),
                                                                                                                                                getElementWithNameLike(this,'num_youthAttachedMaleNew').val(),
                                                                                                                                                getElementWithNameLike(this,'num_youthAttachedTotalNew').attr('id'));return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='num_youthAttachedFemaleOld[]' id='num_youthAttachedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'num_youthAttachedFemaleOld').val(),
                                                                                                                                getElementWithNameLike(this,'num_youthAttachedMaleOld').val(),
                                                                                                                                getElementWithNameLike(this,'num_youthAttachedTotalOld').attr('id'));return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedMaleNew[]' id='num_youthAttachedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'num_youthAttachedFemaleNew').val(),
                                                                                                                                                getElementWithNameLike(this,'num_youthAttachedMaleNew').val(),
                                                                                                                                                getElementWithNameLike(this,'num_youthAttachedTotalNew').attr('id'));return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedMaleOld[]' id='num_youthAttachedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'num_youthAttachedFemaleOld').val(),
                                                                                                                                getElementWithNameLike(this,'num_youthAttachedMaleOld').val(),
                                                                                                                                getElementWithNameLike(this,'num_youthAttachedTotalOld').attr('id'));return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedTotalNew[]' id='num_youthAttachedTotalNew1' class='disabled' readonly='readonly' onkeypress='return numbersonly(event, false)'style='width:30px' /></td>
    <td><input type='text' name='num_youthAttachedTotalOld[]' id='num_youthAttachedTotalOld1' class='disabled' readonly='readonly' onkeypress='return numbersonly(event, false)' style='width:30px' /></td>
    
    
    <td>From:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'fromDate').attr('id')));return false;\" hidefocus=''>
            <input name='fromDate[]' type='text'  size='15px' value='' id='fromDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    <br/>To:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'toDate').attr('id')));return false;\" hidefocus=''>
            <input name='toDate[]' type='text'  size='15px' value='' id='toDate1' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
    </td>
    
    
    <td><textarea name='anticipatedOutcome[]' id='anticipatedOutcome' cols='25' rows='3'></textarea></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_mediaPrograms(getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>


";



$data.="</tbody>";
$data.="</table>";

$data.="</td>";
$data.="</tr>";
//========table1 end============



//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.youthApprentice.youthApprenticeDateSubmission);return false;\" hidefocus=''>
            <input name='youthApprenticeDateSubmission' type='text' style='width:200px;'  size='50' value='' id='youthApprenticeDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_youthApprentice(xajax.getFormValues('youthApprentice')); return false;\" />
            </div>
    </td>
  </tr>

";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_youthApprentice--------------------------------------------------------
function calc_youthApprentice($female,$male,$total){
$obj=new xajaxResponse();
$totalValue=0;
$totalValue=($female+$male);
$obj->assign($total,'value',$totalValue);
return $obj;
}
//save_youthApprentice
function save_youthApprentice($formValues){
$obj = new xajaxResponse();


    
    $techArea=$formValues['techArea'];
    $reportingPeriod=$_SESSION['quarter'];
    //.=' '.$_SESSION['CPMactiveyear']
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['youthApprenticeDateSubmission'];
 
 

for($x=0;$x<count($formValues['loopkey']);$x++){
    
    
    $valueChain=$formValues['valueChainYouthApprenticeship'][$x];   
    $nameofBusiness=$formValues['nameofBusiness'][$x];
    $sexBusinessOwner=$formValues['sexBusinessOwner'][$x];
    
    
    
    
    
    $num_youthAttachedFemaleNew=$formValues['num_youthAttachedFemaleNew'][$x];
if($num_youthAttachedFemaleNew=='' or $num_youthAttachedFemaleNew==null){
  $num_youthAttachedFemaleNew=0;  
}

$num_youthAttachedFemaleOld=$formValues['num_youthAttachedFemaleOld'][$x];
if($num_youthAttachedFemaleOld=='' or $num_youthAttachedFemaleOld==null){
  $num_youthAttachedFemaleOld=0;  
}

$num_youthAttachedMaleNew=$formValues['num_youthAttachedMaleNew'][$x];
if($num_youthAttachedMaleNew=='' or $num_youthAttachedMaleNew==null){
  $num_youthAttachedMaleNew=0;  
}

$num_youthAttachedMaleOld=$formValues['num_youthAttachedMaleOld'][$x];
if($num_youthAttachedMaleOld=='' or $num_youthAttachedMaleOld==null){
  $num_youthAttachedMaleOld=0;  
}

$num_youthAttachedTotalNew=$formValues['num_youthAttachedTotalNew'][$x];
if($num_youthAttachedTotalNew=='' or $num_youthAttachedTotalNew==null){
  $num_youthAttachedTotalNew=0;  
}

$num_youthAttachedTotalOld=$formValues['num_youthAttachedTotalOld'][$x];
if($num_youthAttachedTotalOld=='' or $num_youthAttachedTotalOld==null){
  $num_youthAttachedTotalOld=0;  
}

    
    
    
    
    
    $fromDate=$formValues['fromDate'][$x];
    $toDate=$formValues['toDate'][$x];
    $anticipatedOutcome=$formValues['anticipatedOutcome'][$x];
    
    $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}


//code assisting in enforcing strictly one week's worth of reporting--------------------------------------------

$Today=date('Y-m-d');
$DateSubmissionDay=date('l',strtotime($DateSubmission));
$dateCompared=$DateSubmission;
//$endDate=date('Y-m-d', strtotime('-7 days'));
//$obj->alert($userName);

//$activeQuarter=$_SESSION['quarter'];
$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


/*elseif (($dateCompared<$endDate)AND (!(($_SESSION['GroupCode']=='SystemAdministrator')) )){
    
    $obj->alert("You can only report for the last seven days.");
    return $obj;*/
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future .");
    return $obj;
}
    
 if($nameofBusiness<>''){
 
 $stmnt="INSERT INTO `tbl_youthapprentice`(`techArea`,`nameofBusiness`, `valueChain`,`reportingPeriod`,`sexBusinessOwner`,
                                            `num_youthAttachedFemaleNew`, `num_youthAttachedFemaleOld`, `num_youthAttachedMaleNew`,
                                            `num_youthAttachedMaleOld`, `num_youthAttachedTotalNew`, `num_youthAttachedTotalOld`,
                                            `fromDate`, `toDate`, `anticipatedOutcome`, `jobsCreatedFemaleNew`,
                                            `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`, `jobsCreatedMaleOld`,
                                            `jobsCreatedTotalNew`, `jobsCreatedTotalOld`, `CompiledBy`,
                                            `ReviewedBy`, `SubmittedBy`, `DateSubmission`)
VALUES
('".$techArea."','".$nameofBusiness."', '".$valueChain."', '".$activeQuarter."',
'".$sexBusinessOwner."','".$num_youthAttachedFemaleNew."', '".$num_youthAttachedFemaleOld."', '".$num_youthAttachedMaleNew."',
'".$num_youthAttachedMaleOld."', '".$num_youthAttachedTotalNew."', '".$num_youthAttachedTotalOld."',
'".$fromDate."', '".$toDate."', '".$anticipatedOutcome."',
'".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."','".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."','".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."','".$CompiledBy."',
 '".$ReviewedBy."','".$SubmittedBy."',
 '".$DateSubmission."')";
 //$obj->alert($stmnt);
@mysql_query($stmnt)or die("CPM Error-code 1702 because ".http(__line__));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_youthApprentice','','','',1,20);
return $obj;
}

function view_bds($reporting_period,$cpma_year,$valueChain,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);


$data="<form action='".$_SERVER['PHP_SELF']."' name='bdsEdit' id='bdsEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".bdsFilter();

$data.="<tr>
					<th colspan='18'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/BUSINESS DEVELOPMENT SERVICES</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Business Development Service Provider</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3'>Areas of Expertize</th>
    <th rowspan='3'>Service(s) Offered in the reporting period</th>
    <th colspan='6'>Details of Actor(s) served</th>
    <th rowspan='3'>Role of the Activity in Service delivery</th>
    <th colspan='4'>Jobs Created</th>
	<th rowspan='3'>Action</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of MSME receving BDS service</th>
    <th rowspan='2' class='small-cell-header'>No. of Employees</th>
    <th rowspan='2' class='small-cell-header'>Sex of MSME</th>
    <th rowspan='2'>Type of Actor served</th>
    <th colspan='2' class='small-cell-header'>Number</th>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2'>Date of engagement</th>
    <th rowspan='2'>Time spent on job (Months)</th>	
  </tr>
  <tr>
    <th class='small-cell-header'>F</th>
    <th class='small-cell-header'>M</th>
  </tr>
  </thead>
  <tbody>";

  $table='tbl_businessdev';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_businessdevId';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}

	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Apr - Sep') 
			and `v`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `v`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `v`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `v`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `v`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `v`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `v`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `v`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `v`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `v`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `v`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `v`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `v`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `v`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `v`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `v`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `v`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `v`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `v`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `v`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `v`.*,
		case
		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `v`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `v`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `v`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `v`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `v`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `v`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `v`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `v`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `v`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `v`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `v`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `v`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
	from `tbl_businessdev` as `v`
	where 1=1  ";  
	
	$reporting_period=(!empty($cpma_year))?'':$reporting_period;
	$cpma_year=(!empty($reporting_period))?'':$cpma_year;
	$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
	$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
	$valueChain=(!empty($valueChain))?" AND `mv`.`tbl_chainId` = '".$valueChain."' ":"";
	$query_string.=$reporting_period.$cpma_year.$valueChain;
	$query_string.=" order by `v`.`tbl_businessdevId` desc";
	
	//$obj->alert($query_string);

	 $n=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
		
		//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bds_jobHolder` WHERE `bds_id`=".$row_parent['tbl_businessdevId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
			
			$data.="<tr>";
			$data.="<td ".$row_span.">".$n.".</td>";
			$data.="<td ".$row_span.">".$row_parent['nameofBusiness']."</td>";
			$data.="<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>";
			$data.="<td ".$row_span.">".$row_parent['areaOfExpertise']."</td>";
			$data.="<td ".$row_span.">".$row_parent['servicesOffered']."</td>";
			$data.="<td ".$row_span.">".$row_parent['nameOfMSME']."</td>";
			$data.="<td ".$row_span.">".$row_parent['numOfEmployee']."</td>";
			$data.="<td ".$row_span.">".$row_parent['sexOfMSME']."</td>";

			$actorServiced=$row_parent['typeOfActorServiced'];
			$data.="<td ".$row_span.">";
			$data.="<div>";
			$a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(mysql_error());

			while($b = mysql_fetch_array($a)){
			$display=(strpos($actorServiced, $b['codeName']) !==false)?"".$b['codeName']."":"";
			if($display<>'') {
			$data.="".$display."";
			}
			else{
			 $data.="";   
			}
			}
			@mysql_free_result($a); 
			$data.="</div>";
			$data.="</td>";
			$data.="<td ".$row_span.">".$row_parent['actorServedFemale']."</td>";
			$data.="<td ".$row_span.">".$row_parent['actorServedMale']."</td>";
			$data.="<td ".$row_span.">".$row_parent['roleOfActivity']."</td>";
			
			
				//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_bds('".$row_parent['tbl_businessdevId']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['tbl_businessdevId']."','Delete_bds');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='17'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_bds--------------------------------------------------------
function new_bds($valueChainBds,$areaOfExpertise,$servicesoffered,$typeOfActorServiced){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;

$data="<form action=\"".$PHP_SELF."\" name='bds' id='bds' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>";
$data.="<th colspan='22'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/ BUSINESS DEVELOPMENT SERVICES</div></th>
        </tr>";
        
    $data.="<tr class='evenrow3'>
        <td colspan='15'>Value Chain/Tech Area:";
          $data.="<select name='techArea' id='techArea' style='width:200px;'>";
          $data.=QueryManager::valueChainFilter($program_id,$project_id);
          $data.="</select>";
        $data.="</td>
    </tr>";
//===========================Start of table====================    
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="
<tr>
    <th rowspan='3'>S/No.</th>
    <th rowspan='3'>Name of Business Development Service Provider</th>
    <th rowspan='3'>Value Chain</th>
    <th rowspan='3'>Areas of Expertize</th>
    <th rowspan='3'>Service(s) Offered in the reporting period</th>
    <th colspan='3'>Details of Actor(s) served</th>
    <th rowspan='3'>Role of Activity in service delivery</th>
    <th colspan='6'>Jobs Created</th>
    <th rowspan='3'>Action</th>
  </tr>
  <tr class='evenrow'>
    <th rowspan='2'>Type of Actor Served<img src='' height=0 width=200></th>
    <th colspan='2'>Number</th>
    <th colspan='2'>Female</th>
    <th colspan='2'>Male</th>
    <th colspan='2'>Total</th>
  </tr>
  <tr class='evenrow'>
    <th>F</th>
    <th>M</th>
    <th>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
    <th>N</th>
    <th>O</th>
  </tr>";
  
  
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow' id='report'>
    <td>1</td>
    <td>";
    $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1' />";
    $data.="<textarea name='NameOfPartner[]' id='NameOfPartner1' style='width:80px;'>";
    $data.="</textarea>";
    $data.="</td>";
    
    $data.="<td><select name='valueChainBds[]' id='valueChainBds1' style='width:80px;' />
            <option value=''>-select-</option>";
    
        $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
        $data.="</select>";
    $data.="</td>";
    
    
    
    $data.="<td><textarea name='areaOfExpertise[]' id='areaOfExpertise1' cols='25' rows='3'></textarea></td>";
    $data.="<td><textarea name='servicesOffered[]' id='servicesOffered' cols='25' rows='3'>";
    $data.="</textarea>";
    $data.="</td>
    
    <td>";
    
 
    $data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='typeOfActorServiced1[]' id='typeOfActorServiced1'
    value=\"".$b['codeName']."\" >".$b['codeName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    
    $data.="</td>
    <td><input type='text' name='numActorServedFemale[]' onkeypress='return numbersonly(event, false)' id='numActorServedFemale1' style='width:30px;'/></td>
    <td><input type='text' name='numActorServedMale[]' onkeypress='return numbersonly(event, false)' id='numActorServedMale1' style='width:30px;'/></td>
    <td><textarea name='roleOfActivity[]' id='roleOfActivity1' cols='25' rows='3'></textarea></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                                    getElementById('jobsCreatedMaleNew1').value,
                                                                                                                                    getElementById('jobsCreatedMaleOld1').value,
                                                                                                                                    'jobsCreatedTotalNew1',
                                                                                                                                    'jobsCreatedTotalOld1');\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
  <td></td><tr>
</tbody>";

$data.= " />
</p>\"";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";

$data.="<tr class='evenrow' id='report'>
    <td>1</td>
    <td>";
    $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1' />";
    $data.="<textarea name='NameOfPartner[]' id='NameOfPartner' style='width:80px;'>";
    $data.="</textarea>";
    $data.="</td>";
    
    $data.="<td><select name='valueChainBds[]' id='valueChainBds' style='width:80px;' />
            <option value=''>-select-</option>";
    
        $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
        $data.="</select>";
    $data.="</td>";
    
    
    
    $data.="<td><textarea name='areaOfExpertise[]' id='areaOfExpertise' cols='25' rows='3'></textarea></td>";
    $data.="<td><textarea name='servicesOffered[]' id='servicesOffered' cols='25' rows='3'>";
    $data.="</textarea>";
    $data.="</td>
    
    <td>";
    
    

    $data.="<table cellspacing='0'>";
    $a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(mysql_error());
    while($b = mysql_fetch_array($a)){
    //$div="status_".$b['countryCode'];
    //$checked=(strpos($actorServiced, $b['codeName']) !==false)?"CHECKED":"";
    $data.="<tr><td><input type='checkbox'  name='typeOfActorServiced1[]' id='typeOfActorServiced1'
    value=\"".$b['codeName']."\" >".$b['codeName']."</td></tr>";	}
    @mysql_free_result($a); 
    $data.="</table>";
    
    
    $data.="</td>
    <td><input type='text' name='numActorServedFemale[]' onkeypress='return numbersonly(event, false)' id='numActorServedFemale' style='width:30px;'/></td>
    <td><input type='text' name='numActorServedMale[]' onkeypress='return numbersonly(event, false)' id='numActorServedMale[' style='width:30px;'/></td>
    <td><textarea name='roleOfActivity[]' id='roleOfActivity' cols='25' rows='3'></textarea></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  


$data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";



$data.="</td>";
$data.="</tr>";
//===========================End of table====================


//===========================Start of table2====================    
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="


<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.bds.bdsDateSubmission);return false;\" hidefocus=''>
            <input name='bdsDateSubmission' type='text' style='width:200px;'  size='50' value='' id='bdsDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_bds(xajax.getFormValues('bds')); return false;\" />
            </div>
    </td>
  </tr>


";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//===========================End of table2====================

$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_bds--------------------------------------------------------
//calc_bds
function calc_bds($jobsCreatedFemaleNew1,
                                     $jobsCreatedFemaleOld1,
                                     $jobsCreatedMaleNew1,
                                     $jobsCreatedMaleOld1,
                                     $jobsCreatedTotalNew1,
                                     $jobsCreatedTotalOld1,
                                     $jobsCreatedFemaleNew2,
                                     $jobsCreatedFemaleOld2,
                                     $jobsCreatedMaleNew2,
                                     $jobsCreatedMaleOld2,
                                     $jobsCreatedTotalNew2,
                                     $jobsCreatedTotalOld2,
                                     $jobsCreatedFemaleOld3,
                                     $jobsCreatedMaleNew3,
                                     $jobsCreatedMaleOld3,
                                     $jobsCreatedTotalNew3,
                                     $jobsCreatedTotalOld3
                                     ){
$obj= new xajaxResponse();

$jobsCreatedTotalNew=0;
$jobsCreatedTotalNew=(($jobsCreatedFemaleNew1)+($jobsCreatedMaleNew1));
$obj->assign($jobsCreatedTotalNew1,"value",$jobsCreatedTotalNew);

$jobsCreatedTotalOld=0;
$jobsCreatedTotalOld=($jobsCreatedFemaleOld1+$jobsCreatedMaleOld1);
$obj->assign($jobsCreatedTotalOld1,"value",$jobsCreatedTotalOld);
return $obj;
}
//save_bds
function save_bds($formValues){
$obj = new xajaxResponse();


    $techArea=$formValues['techArea'];
    $reportingPeriod=$_SESSION['quarter'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['bdsDateSubmission'];
    $user=$_SESSION['username'];
   

for($x=0;$x<count($formValues['loopkey']);$x++){

 $valueChain=$formValues['valueChainBds'][$x];   
 $nameOfPartner=$formValues['NameOfPartner'][$x];
 $areaOfExpertise=$formValues['areaOfExpertise'][$x];
 $typeOfActorServiced=$formValues['typeOfActorServiced'.($x+1)];
 $servicesOffered=$formValues['servicesOffered'][$x];
 $actorServedFemale=$formValues['numActorServedFemale'][$x];
 $actorServedMale=$formValues['numActorServedMale'][$x];
 $roleOfActivity=$formValues['roleOfActivity'][$x];
 
 
 
 
 
 $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}

 
/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

require_once('connections/reportingPeriodValidate.php');
 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
} 
 
 if($nameOfPartner<>''){
 
 $stmnt="INSERT INTO `tbl_businessdev`(`techArea`,`nameOfPartner`, `valueChain`, `reportingPeriod`,
                                            `areaOfExpertise`,`servicesOffered`, `typeOfActorServiced`, `actorServedFemale`,
                                            `actorServedMale`, `roleOfActivity`, `jobsCreatedFemaleNew`,
                                            `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`, `jobsCreatedMaleOld`,
                                            `jobsCreatedTotalNew`, `jobsCreatedTotalOld`, `CompiledBy`,
                                            `ReviewedBy`, `SubmittedBy`, `DateSubmission`,`updatedby`)
VALUES
('".$techArea."','".$nameOfPartner."', '".$valueChain."', '".$activeQuarter."',
'".$areaOfExpertise."','".$servicesOffered."','".implode(",",$typeOfActorServiced)."','".$actorServedFemale."',
'".$actorServedMale."', '".$roleOfActivity."','".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."','".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."','".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."','".$CompiledBy."',
 '".$ReviewedBy."','".$SubmittedBy."',
 '".$DateSubmission."','".$user."')";
 
//$obj->alert($stmnt);
@mysql_query($stmnt)or die(http(3058));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_bds','','','',1,20);
return $obj;
}
function view_bankLoans($reporting_period,$cpma_year,$valueChain,$partnerType,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['partnerType']=$partnerType;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data="<form action='".$_SERVER['PHP_SELF']."'  name='bankLoansEdit' id='bankLoansEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".bankLoansFilter();

$data.="<tr>
					<th colspan='20'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/BANK LOANS</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of MSME (Include Individual farmers and VAs as applicable)</th>
	<th rowspan='3' class='small-cell-header'>Value Chain</th>
	<th rowspan='3' class='small-cell-header'>Partner Type</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>No. of Full time Employees</th>
    <th rowspan='3' class='small-cell-header'>Sex of MSME (F/M)</th>
    <th rowspan='3'>Date of Birth</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3' class='small-cell-header'>Amount of Loan Accessed (UGX)</th>
    <th rowspan='3'>Type of Loan Receipient (Farmer, Local trader, Processors, Exporter etc)</th>
    <th colspan='3' rowspan='2'>Sex of recipient (Female, Male,Joint)</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='4'>Jobs Created</th>
	<th rowspan='3'>Action</th>
  </tr>
  <tr height='28'>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Joint</th>
  </tr>
  </thead>
  <tbody>";

  	$table='tbl_bankloans';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_bankLoanId';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}
  
  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Apr - Sep') 
			and `b`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `b`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `b`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `b`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `b`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `b`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `b`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `b`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `b`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `b`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `b`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `b`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `b`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `b`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `b`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `b`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `b`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `b`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `b`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `b`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select 1, `b`.*,
		case
		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `b`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `b`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `b`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `b`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `b`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `b`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `b`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `b`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `b`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `b`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `b`.`year` in (2018) 
		then 'Apr 2018 - May 2018'		
	else `b`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
from `tbl_bankloans` as `b` 
where 1=1 "; 
$reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$valueChain=(!empty($valueChain))?" AND `b`.`valueChain` = '".$valueChain."' ":"";
$partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `b`.`msmeType` = '".$partnerType."' ":"";
$query_string.=$reporting_period.$cpma_year.$valueChain.$partnerType;
$query_string.=" order by `b`.`tbl_bankLoanId` desc";



	$x=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
	/* $obj->alert(($query_string." limit ".$offset.",".$records_per_page)); */
  
  while($row_parent=mysql_fetch_array($new_query)){
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bank_loans_jobHolder` WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
			$data.="<tr>";
			$data.="<td>".$n.".</td>";
			$data.="<td>".($row_parent['nameMSME'])."</td>";
			$data.="<td>".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td>".($row_parent['msmeType'])."</td>";
			$data.="<td>".($row_parent['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".($row_parent['numberOfFullTimeEmployees'])."</td>";
			$data.="<td>".($row_parent['sexOfMSME'])."</td>";
			$data.="<td>".substr(($row_parent['dateOfBirth']), 0, 10)."</td>";
			$data.="<td>".($row_parent['cpmAssistance'])."</td>";
			$data.="<td align='right'>".number_format(($row_parent['amountLoanAccessed']))."</td>";
			$data.="<td>".($row_parent['typeOfLoanRecepient'])."</td>";
			$recipientSex=$row_parent['recipientSex'];
			$wrong=''.'<font color=\'red\'>&#10060;</font>'.'';
			$tick=''.'<font color=\'green\'>&#10004;</font>'.'';
			$data.="<td>".($recipientSex=='M'?$tick:$wrong)."</td>";
			$data.="<td>".($recipientSex=='F'?$tick:$wrong)."</td>";
			$data.="<td>".($recipientSex=='Joint'?$tick:$wrong)."</td>";
			$data.="<td>".($row_parent['bankingInstitution'])."</td>";
			
			
		//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_bankLoans('".$row_parent['tbl_bankLoanId']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['tbl_bankLoanId']."','Delete_bankLoans');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='19'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_bankLoans('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_bankLoans('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_bankLoans('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_bankLoans('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_bankLoans('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_bankLoans--------------------------------------------------------
function new_bankLoans($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}



$n=1;
$data="<form action=\"".$PHP_SELF."\" name='bankLoans' id='bankLoans' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellpadding='2' cellspacing='2'>
  <tr>
    <th colspan='16'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Bank Loans</div></th>
  </tr>";
  $data.="<tr class='evenrow3'>";
    $data.="<td colspan='4'>Value Chain/Tech Area";
 	$data.="<select name='techArea' id='techArea' style='width:200px;'>";
		 $data.=QueryManager::valueChainFilter($program_id,$project_id);
		  $data.="</select>";
                  $data.="</td>";
  $data.="</tr>";
  $data.="<tr class='evenrow'>
    <th rowspan='3'>S/No</th>
    <th rowspan='3'>Name of MSME</th>
    <th rowspan='3'>Value chain</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3'>Amount of Loan Accessed (UGX)</th>
    <th colspan='3' rowspan='3'>Sex of recipient</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='6'><div align='center'>Jobs Created </div></th>
    <th colspan='6' rowspan='3'><div align='center'>Action</div></th>
  </tr>
  <tr class='evenrow'>
    <th colspan='2'><div align='center'>Female</div></th>
    <th colspan='2'><div align='center'>Male</div></th>
    <th colspan='2'><div align='center'>Total</div></th>
  </tr>
  <tr class='evenrow'>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
  </tr>";
 
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' 
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1'
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td></tr>
</tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";
$data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";



$data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";
$data.="</table>";
$data.="</tbody>";

  $data.="</td>";
$data.="</tr>";

//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.bankLoans.bankLoansDateSubmission);return false;\" hidefocus=''>
            <input name='bankLoansDateSubmission' type='text' style='width:200px;'  size='50' value='' id='bankLoansDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_bankLoans(xajax.getFormValues('bankLoans')); return false;\" />
            </div>
    </td>
  </tr>

";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_bankLoans--------------------------------------------------------
//save_bankLoans
function save_bankLoans($formValues){
$obj = new xajaxResponse();

$reportingPeriod=$_SESSION['quarter'];
//$obj->alert($_SESSION['quarter']);

$techArea=$formValues['techArea'];
$CompiledBy=$formValues['CompiledBy'];
$ReviewedBy=$formValues['ReviewedBy'];
$SubmittedBy=$formValues['SubmittedBy'];
$DateSubmission=$formValues['bankLoansDateSubmission'];
 
for($x=0;$x<count($formValues['loopkey']);$x++){
$valueChain=$formValues['valueChainMSME'][$x];
$cpmAssistance=$formValues['cpmAssistance'][$x];
$nameMSME=$formValues['nameMSME'][$x];

$amountLoanAccessed=$formValues['amountLoanAccessed'][$x];
if($amountLoanAccessed=='' or $amountLoanAccessed==null){
  $amountLoanAccessed=0;  
}

$bankingInstitution=$formValues['bankingInstitution'][$x];


$recipientSex=$formValues['recipientSex'][$x];

$jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}


/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

include('connections/reportingPeriodValidate.php');


 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
}
 
 if($nameMSME<>''){
 
 $stmnt="INSERT INTO `tbl_bankloans`(`techArea`,`reportingPeriod`,`nameMSME`, `valueChain`,
 `cpmAssistance`, `amountLoanAccessed`, `recipientSex`,
 `bankingInstitution`, `jobsCreatedFemaleNew`, `jobsCreatedFemaleOld`,
 `jobsCreatedMaleNew`, `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
 `jobsCreatedTotalOld`, `CompiledBy`, `ReviewedBy`,
 `SubmittedBy`, `DateSubmission`,`updatedby`) VALUES
('".$techArea."','".$activeQuarter."','".$nameMSME."', '".$valueChain."',
 '".$cpmAssistance."', '".$amountLoanAccessed."', '".$recipientSex."',
 '".$bankingInstitution."', '".$jobsCreatedFemaleNew."', '".$jobsCreatedFemaleOld."',
 '".$jobsCreatedMaleNew."', '".$jobsCreatedMaleOld."', '".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."', '".$CompiledBy."', '".$ReviewedBy."',
 '".$SubmittedBy."', '".$DateSubmission."','".$_SESSION['username']."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die(mysql_error());

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_bankLoans','','','','',1,20);
return $obj;
}
//---Start of view_inputSales------
function view_inputSales($reporting_period,$cpma_year,$partnerType,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['partnerType']=$partnerType;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data="<form action='".$_SERVER['PHP_SELF']."' name='inputSalesEdit' id='inputSalesEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".inputSalesFilter();

$data.="<tr>
	<th colspan='23'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/INPUT SALES</th>
</tr>";			

//===================data to be displayed=====================
$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Middle Value Chain Actor (Trader, Exporter, Processor, Input dealer), Trade and business association or CBOs - (Include Vas giving independent service</th>
	<th rowspan='3'>Date of Start of Inputs Sales Business</th>
	<th rowspan='3' class='large-cell-header'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
    <th colspan='3' rowspan='2' class='small-cell-header'>Number of VA/Messengers assisting in Promoting Input Access to farmers</th>
    <th colspan='3' rowspan='2' class='small-cell-header'>Number of Farmers Benefiting</th>
    <th colspan='6' rowspan='2' class='small-cell-header'>Value of Inputs Sold by Input type</th>
    <th rowspan='3' class='small-cell-header'>Amount invested in Setting up Input Sales Business (UGX)</th>
    <th colspan='4'>Jobs Created</th>
	<th rowspan='3' class='largest-cell-header'>Action</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2' class='small-cell-header'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Total</th>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Total</th>
    <th class='small-cell-header'>Seeds/ Seedling</th>
    <th class='small-cell-header'>Chemicals</th>
    <th class='small-cell-header'>Fertilizers</th>
    <th class='small-cell-header'>Herbicides</th>
    <th class='small-cell-header'>Farm Implements</th>
    <th class='small-cell-header'>Others</th>
  </tr>
  </thead>
  <tbody>";

  
  $table='tbl_input_sales_meta_data';
	$name_column_submission_date='dateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='input_sales_id';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}


	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Apr - Sep') 
			and `sm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `sm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `sm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `sm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `sm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `sm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `sm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `sm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `sm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `sm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `sm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `sm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `sm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `sm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `sm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}		
  
		$query_string="select
		`s`.`id`,  
		`s`.`dateOfStartOfinputsSalesBusiness`,
		`s`.`nameOfMiddleValueChainActor`,
		`sm`.`dateSubmission`,
		`sm`.`reportingPeriod`,
		`sm`.`year`, 
		`sm`.`reportingMonth`
		from `tbl_input_sales` as `s`
		join `inputSales_metaData` as `sr` on (`sr`.`sales_id` = `s`.`id`)
		join `tbl_input_sales_meta_data` as `sm` on (`sm`.`id` = `sr`.`metadata_id`)
		where `sm`.`input_sales_id`	is not null ";
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year;	
		$query_string.=" group by `s`.`id` ";
		$query_string.=" order by `s`.`id` desc";
	
	//$obj->alert($query_string);



	$x=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
	  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Apr - Sep') 
			and `sm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `sm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `sm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `sm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `sm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `sm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `sm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `sm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `sm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `sm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `sm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `sm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `sm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `sm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `sm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$s_child="select  `sm`.*,
		case
		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `sm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `sm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `sm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `sm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `sm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `sm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `sm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `sm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `sm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `sm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `sm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `sm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
		FROM `tbl_input_sales_meta_data` as `sm`
		WHERE `sm`.`input_sales_id`='".$row_parent['id']."'";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$s_child.=$reporting_period.$cpma_year;	

		$s_child.=" order by `sm`.`input_sales_id` ";

		//$q_child=Execute($s_child) or die(mysql_error());		
		$q_child=Execute($s_child) or die(mysql_error()).' on line '.__LINE__;			
		$num_child_records=mysql_num_rows($q_child);	
		//$obj->alert($num_child_records);			
		$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
		$col_span=($num_child_records>1)?"colspan='2'":"";
		$v=$n+$num_child_records;

	  
		$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".</td>";
		$data.="<td ".$row_span.">".($row_parent['nameOfMiddleValueChainActor'])."</td>";		
		$data.="<td ".$row_span.">".$qmobj->cleanDirtyDates($row_parent['dateOfStartOfinputsSalesBusiness'])."</td>";
		//return first row of child records
		$s_first_child = mysql_query("SELECT `sm`.*,
								case
								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2013-04-01') and ('2013-09-30') 
								and `sm`.`year` in (2013) 
								then 'Apr 2012 - Sep 2013'
								
								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2013-10-01') and ('2014-03-31') 
								and `sm`.`year` in (2013,2014) 
								then 'Oct 2013 - Mar 2014'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2014-04-01') and ('2014-09-30') 
								and `sm`.`year` in (2014) 
								then 'Apr 2014 - Sep 2014'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2014-10-01') and ('2015-03-31') 
								and `sm`.`year` in (2014,2015) 
								then 'Oct 2014 - Mar 2015'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2015-04-01') and ('2015-09-30') 
								and `sm`.`year` in (2015) 
								then 'Apr 2015 - Sep 2015'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2015-10-01') and ('2016-03-31') 
								and `sm`.`year` in (2015,2016) 
								then 'Oct 2015 - Mar 2016'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2016-04-01') and ('2016-09-30') 
								and `sm`.`year` in (2016) 
								then 'Apr 2016 - Sep 2016'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2016-10-01') and ('2017-03-31') 
								and `sm`.`year` in (2016,2017) 
								then 'Oct 2016 - Mar 2017'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2017-04-01') and ('2017-09-30') 
								and `sm`.`year` in (2017) 
								then 'Apr 2017 - Sep 2017'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2017-10-01') and ('2018-03-31') 
								and `sm`.`year` in (2017,2018) 
								then 'Oct 2017 - Mar 2018'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2018-04-01') and ('2018-09-30') 
								and `sm`.`year` in (2018) 
								then 'Apr 2018 - May 2018'
								
							else `sm`.`reportingPeriod`
							end 
							as  `reportingPeriod_cleaned`
		FROM `tbl_input_sales_meta_data` as `sm`
		WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 0,1")or die(mysql_error());
		$first_child_row = mysql_fetch_array($s_first_child );	
					
					$data.="<td>".($first_child_row['reportingPeriod_cleaned'])."</td>";					
					$data.="<td>".($first_child_row['valueChain'])."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersMale'])+($first_child_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingFemale'])+($first_child_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldBySeeds']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByChemicals']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByFertilizers']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByHerbicides']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByFarmImplements']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByOthers']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['amountInvestedInSettingUpInputSalesBusiness']))."</td>";
					$data.="<td>".($first_child_row['nameOfJobHolder'])."</td>";
					$data.="<td>".($first_child_row['sexOfJobHolder'])."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>";
					$data.="<td>".($first_child_row['timeSpentOnJob'])."</td>";					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_inputSales('".$row_parent['id']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['id']."','Delete_inputSales');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT `sm`.*,
						case
							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2013-04-01') and ('2013-09-30') 
							and `sm`.`year` in (2013) 
							then 'Apr 2012 - Sep 2013'
							
							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2013-10-01') and ('2014-03-31') 
							and `sm`.`year` in (2013,2014) 
							then 'Oct 2013 - Mar 2014'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2014-04-01') and ('2014-09-30') 
							and `sm`.`year` in (2014) 
							then 'Apr 2014 - Sep 2014'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2014-10-01') and ('2015-03-31') 
							and `sm`.`year` in (2014,2015) 
							then 'Oct 2014 - Mar 2015'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2015-04-01') and ('2015-09-30') 
							and `sm`.`year` in (2015) 
							then 'Apr 2015 - Sep 2015'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2015-10-01') and ('2016-03-31') 
							and `sm`.`year` in (2015,2016) 
							then 'Oct 2015 - Mar 2016'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2016-04-01') and ('2016-09-30') 
							and `sm`.`year` in (2016) 
							then 'Apr 2016 - Sep 2016'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2016-10-01') and ('2017-03-31') 
							and `sm`.`year` in (2016,2017) 
							then 'Oct 2016 - Mar 2017'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2017-04-01') and ('2017-09-30') 
							and `sm`.`year` in (2017) 
							then 'Apr 2017 - Sep 2017'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2017-10-01') and ('2018-03-31') 
							and `sm`.`year` in (2017,2018) 
							then 'Oct 2017 - Mar 2018'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2018-04-01') and ('2018-09-30') 
							and `sm`.`year` in (2018) 
							then 'Apr 2018 - May 2018'
							
						else `sm`.`reportingPeriod`
						end 
						as  `reportingPeriod_cleaned`
						FROM `tbl_input_sales_meta_data` as `sm`
						WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 1,100000")or die(mysql_error().' on line '.__LINE__);
					while($other_children_row = mysql_fetch_array($s_other_children )){
						$data.="<tr>";					
						$data.="<td>".($other_children_row['reportingPeriod_cleaned'])."</td>";						
						$data.="<td>".($other_children_row['valueChain'])."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersMale'])+($other_children_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingFemale'])+($other_children_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['inputsSoldBySeeds']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByChemicals']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByFertilizers']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByHerbicides']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByFarmImplements']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByOthers']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['amountInvestedInSettingUpInputSalesBusiness']))."</td>";
						$data.="<td>".($other_children_row['nameOfJobHolder'])."</td>";
						$data.="<td>".($other_children_row['sexOfJobHolder'])."</td>";
						$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
						$data.="<td>".$dateOfEngagement."</td>";
						$data.="<td>".($other_children_row['timeSpentOnJob'])."</td>";					
						$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='15'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_inputSales('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_inputSales('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_inputSales('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_inputSales('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_inputSales('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//---End of view_inputSales------
function new_inputSales($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}



$n=1;
$data="<form action=\"".$PHP_SELF."\" name='inputSales' id='inputSales' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellpadding='2' cellspacing='2'>
  <tr>
    <th colspan='16'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Bank Loans</div></th>
  </tr>";
  $data.="<tr class='evenrow3'>";
    $data.="<td colspan='4'>Value Chain/Tech Area";
 	$data.="<select name='techArea' id='techArea' style='width:200px;'>";
		 $data.=QueryManager::valueChainFilter($program_id,$project_id);
		  $data.="</select>";
                  $data.="</td>";
  $data.="</tr>";
  $data.="<tr class='evenrow'>
    <th rowspan='3'>S/No</th>
    <th rowspan='3'>Name of MSME</th>
    <th rowspan='3'>Value chain</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3'>Amount of Loan Accessed (UGX)</th>
    <th colspan='3' rowspan='3'>Sex of recipient</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='6'><div align='center'>Jobs Created </div></th>
    <th colspan='6' rowspan='3'><div align='center'>Action</div></th>
  </tr>
  <tr class='evenrow'>
    <th colspan='2'><div align='center'>Female</div></th>
    <th colspan='2'><div align='center'>Male</div></th>
    <th colspan='2'><div align='center'>Total</div></th>
  </tr>
  <tr class='evenrow'>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
  </tr>";
 
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' 
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1'
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td></tr>
</tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";
$data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";



$data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";
$data.="</table>";
$data.="</tbody>";

  $data.="</td>";
$data.="</tr>";

//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.inputSales.inputSalesDateSubmission);return false;\" hidefocus=''>
            <input name='inputSalesDateSubmission' type='text' style='width:200px;'  size='50' value='' id='inputSalesDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_inputSales(xajax.getFormValues('inputSales')); return false;\" />
            </div>
    </td>
  </tr>

";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_inputSales--------------------------------------------------------
//save_inputSales
function save_inputSales($formValues){
$obj = new xajaxResponse();

$reportingPeriod=$_SESSION['quarter'];
//$obj->alert($_SESSION['quarter']);

$techArea=$formValues['techArea'];
$CompiledBy=$formValues['CompiledBy'];
$ReviewedBy=$formValues['ReviewedBy'];
$SubmittedBy=$formValues['SubmittedBy'];
$DateSubmission=$formValues['inputSalesDateSubmission'];
 
for($x=0;$x<count($formValues['loopkey']);$x++){
$valueChain=$formValues['valueChainMSME'][$x];
$cpmAssistance=$formValues['cpmAssistance'][$x];
$nameMSME=$formValues['nameMSME'][$x];

$amountLoanAccessed=$formValues['amountLoanAccessed'][$x];
if($amountLoanAccessed=='' or $amountLoanAccessed==null){
  $amountLoanAccessed=0;  
}

$bankingInstitution=$formValues['bankingInstitution'][$x];


$recipientSex=$formValues['recipientSex'][$x];

$jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}


/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

include('connections/reportingPeriodValidate.php');


 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
}
 
 if($nameMSME<>''){
 
 $stmnt="INSERT INTO `tbl_bankloans`(`techArea`,`reportingPeriod`,`nameMSME`, `valueChain`,
 `cpmAssistance`, `amountLoanAccessed`, `recipientSex`,
 `bankingInstitution`, `jobsCreatedFemaleNew`, `jobsCreatedFemaleOld`,
 `jobsCreatedMaleNew`, `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
 `jobsCreatedTotalOld`, `CompiledBy`, `ReviewedBy`,
 `SubmittedBy`, `DateSubmission`,`updatedby`) VALUES
('".$techArea."','".$activeQuarter."','".$nameMSME."', '".$valueChain."',
 '".$cpmAssistance."', '".$amountLoanAccessed."', '".$recipientSex."',
 '".$bankingInstitution."', '".$jobsCreatedFemaleNew."', '".$jobsCreatedFemaleOld."',
 '".$jobsCreatedMaleNew."', '".$jobsCreatedMaleOld."', '".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."', '".$CompiledBy."', '".$ReviewedBy."',
 '".$SubmittedBy."', '".$DateSubmission."','".$_SESSION['username']."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die("CPMA Error-code 3494 because ".http(__line__));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_inputSales','','','',1,20);
return $obj;
}
//inputSales End
//Start phh
//Start phh
function view_phh($reporting_period,$cpma_year,$partnerType,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['partnerType']=$partnerType;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data="<form action='".$_SERVER['PHP_SELF']."' name='phhEdit' id='phhEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".phhFilter();

$data.="<tr>
	<th colspan='15'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/PHH</th>
</tr>";			

//===================data to be displayed=====================
$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Middle Value Chain Actor</th>    
	<th rowspan='3' class='small-cell-header'>Date Store was refurbished or Newly constructed/hired</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3' class='small-cell-header'>Size of Store Refurbished or Installed Use Formulae (L*W*H) in M3</th>
    <th colspan='2' rowspan='2'>Storage Type (Indicate M3 for each type)</th>
    <th rowspan='3' class='small-cell-header'>Amount invested in refurbishing or Installing a store (UGX)</th>
    <th colspan='4'>Jobs Created</th>
	<th rowspan='3' class='largest-cell-header'>Action</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2' class='small-cell-header'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Dry Goods</th>
    <th class='small-cell-header'>Cold Chain Storage</th>
  </tr>
  </thead>
  <tbody>";
  
  
	$table='tbl_phh_meta_data';
	$name_column_submission_date='dateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='phh_id';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}
  
		switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Apr - Sep') 
			and `pm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `pm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `pm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `pm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `pm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `pm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `pm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `pm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `pm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `pm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `pm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `pm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `pm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `pm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `pm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}		
  
		$query_string="select
		`p`.`id`,  
		`p`.`dateOfStartOfinputsSalesBusiness`,
		`p`.`nameOfMiddleValueChainActor`,
		`pm`.`dateSubmission`,
		`pm`.`reportingPeriod`,
		`pm`.`year`, 
		`pm`.`reportingMonth`
		from `tbl_phh` as `p`
		join `phh_metaData` as `pr` on (`pr`.`phh_id` = `p`.`id`)
		join `tbl_phh_meta_data` as `pm` on (`pm`.`id` = `pr`.`metadata_id`)
		where `pm`.`phh_id`	is not null ";
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `p`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year;	
		$query_string.=" group by `p`.`id` ";
		$query_string.=" order by `p`.`id` desc";
	
	
	
	
	//$obj->alert($query_string);



	$x=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
	  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Apr - Sep') 
			and `pm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `pm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `pm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `pm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `pm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `pm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `pm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `pm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `pm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `pm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `pm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `pm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `pm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `pm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `pm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
  
	$s_child="select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		WHERE `pm`.`phh_id`='".$row_parent['id']."'";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$s_child.=$reporting_period.$cpma_year;	

		$s_child.=" order by `pm`.`phh_id` ";

		//$q_child=Execute($s_child) or die(mysql_error());		
		$q_child=Execute($s_child) or die(mysql_error());			
		$num_child_records=mysql_num_rows($q_child);	
		//$obj->alert($num_child_records);			
		$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
		$col_span=($num_child_records>1)?"colspan='2'":"";
		$v=$n+$num_child_records;

	  
		$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".</td>";
		$data.="<td ".$row_span.">".($row_parent['nameOfMiddleValueChainActor'])."</td>";		
		$data.="<td ".$row_span.">".$qmobj->cleanDirtyDates($row_parent['dateOfStartOfinputsSalesBusiness'])."</td>";
		//return first row of child records
		$s_first_child = mysql_query("select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		where `pm`.`phh_id`='".$row_parent['id']."' limit 0,1")or die(mysql_error());
		$first_child_row = mysql_fetch_array($s_first_child );	
					
					$data.="<td>".($first_child_row['reportingPeriod_cleaned'])."</td>";				
							$data.="<td>".($first_child_row['valueChain'])."</td>";
							$data.="<td align='right'>".$first_child_row['assistanceRenderedByActivity']."</td>";
							$data.="<td align='right'>".number_format(($first_child_row['sizeOfStoreRefurbished']))."</td>";
							$data.="<td align='right'>".$first_child_row['storageTypeForDryGoods']."</td>";
							$data.="<td align='right'>".$first_child_row['storageTypeForColdChain']."</td>";
							$data.="<td align='right'>".number_format(($first_child_row['amountInvestedInRefurbishing']))."</td>";
							$data.="<td>".($first_child_row['nameOfJobHolder'])."</td>";
							$data.="<td>".($first_child_row['sexOfJobHolder'])."</td>";
							$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
							$data.="<td>".$dateOfEngagement."</td>";
							$data.="<td>".($first_child_row['timeSpentOnJob'])."</td>";	
							
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_phh('".$row_parent['id']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['id']."','Delete_phh');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		where `pm`.`phh_id`='".$row_parent['id']."' limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
						$data.="<tr>";					
							$data.="<td>".($other_children_row['reportingPeriod_cleaned'])."</td>";				
							$data.="<td>".($other_children_row['valueChain'])."</td>";
							$data.="<td align='right'>".$other_children_row['assistanceRenderedByActivity']."</td>";
							$data.="<td align='right'>".number_format(($other_children_row['sizeOfStoreRefurbished']))."</td>";
							$data.="<td align='right'>".$other_children_row['storageTypeForDryGoods']."</td>";
							$data.="<td align='right'>".$other_children_row['storageTypeForColdChain']."</td>";
							$data.="<td align='right'>".number_format(($other_children_row['amountInvestedInRefurbishing']))."</td>";
							$data.="<td>".($other_children_row['nameOfJobHolder'])."</td>";
							$data.="<td>".($other_children_row['sexOfJobHolder'])."</td>";
							$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
							$data.="<td>".$dateOfEngagement."</td>";
							$data.="<td>".($other_children_row['timeSpentOnJob'])."</td>";				
						$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
*display pages
*/


$data.="<tr align='right'>
<td colspan='14'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_phh('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_phh('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_phh('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_phh('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_phh('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['partnerType']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_phh--------------------------------------------------------
function new_phh($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}



$n=1;
$data="<form action=\"".$PHP_SELF."\" name='phh' id='phh' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellpadding='2' cellspacing='2'>
  <tr>
    <th colspan='16'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Bank Loans</div></th>
  </tr>";
  $data.="<tr class='evenrow3'>";
    $data.="<td colspan='4'>Value Chain/Tech Area";
 	$data.="<select name='techArea' id='techArea' style='width:200px;'>";
		 $data.=QueryManager::valueChainFilter($program_id,$project_id);
		  $data.="</select>";
                  $data.="</td>";
  $data.="</tr>";
  $data.="<tr class='evenrow'>
    <th rowspan='3'>S/No</th>
    <th rowspan='3'>Name of MSME</th>
    <th rowspan='3'>Value chain</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3'>Amount of Loan Accessed (UGX)</th>
    <th colspan='3' rowspan='3'>Sex of recipient</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='6'><div align='center'>Jobs Created </div></th>
    <th colspan='6' rowspan='3'><div align='center'>Action</div></th>
  </tr>
  <tr class='evenrow'>
    <th colspan='2'><div align='center'>Female</div></th>
    <th colspan='2'><div align='center'>Male</div></th>
    <th colspan='2'><div align='center'>Total</div></th>
  </tr>
  <tr class='evenrow'>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
  </tr>";
 
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedTotalNew[]' class='disabled' readonly='readonly' id='jobsCreatedTotalNew1' 
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    
    <td><input type='text' name='jobsCreatedTotalOld[]' class='disabled' readonly='readonly' id='jobsCreatedTotalOld1'
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td></tr>
</tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";
$data.="<tr class='evenrow'>
    <td>1.</td>
    <input type='hidden' name='loopkey[]' id='loopkey' value='1'>
    <td><input type='text' name='nameMSME[]' id='nameMSME1' style='width:150px;'/></td>";
    $data.="<td>";
    $data.="<select name='valueChainMSME[]' id='valueChainMSME1' style='width:80px;'>";
          $data.="<option value=''>-select-</option>";
		 $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
                    $qmedia=mysql_query($stmntTwo);
                    while($rowCrop=mysql_fetch_array($qmedia)){
                    //$nameofBusiness=$row['typeOfMedia'];                     
                    $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
                    
                    $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";     
                                                }
		  $data.="</select>";
    $data.="</td>";
    $data.="<td><textarea name='cpmAssistance[]' id='cpmAssistance1' cols='35' rows='3'></textarea></td>
    <td><input type='text' name='amountLoanAccessed[]' id='amountLoanAccessed1' onkeypress='return numbersonly(event, false)' style='width:60px;' ></td>
    <td colspan='3' >
    <select name='recipientSex[]' id='recipientSex1' style='width:80px;'>
      <option value='Female'>-Select-</option>
      <option value='Female'>Female</option>
      <option value='Male'>Male</option>
      <option value='Joint'>Joint</option>
    </select></td>
    <td><input type='text' name='bankingInstitution[]' id='bankingInstitution1'></td>";
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' class='disabled' readonly='readonly' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";



$data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";
$data.="</table>";
$data.="</tbody>";

  $data.="</td>";
$data.="</tr>";

//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.phh.phhDateSubmission);return false;\" hidefocus=''>
            <input name='phhDateSubmission' type='text' style='width:200px;'  size='50' value='' id='phhDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_phh(xajax.getFormValues('phh')); return false;\" />
            </div>
    </td>
  </tr>

";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_phh--------------------------------------------------------
//save_phh
function save_phh($formValues){
$obj = new xajaxResponse();

$reportingPeriod=$_SESSION['quarter'];
//$obj->alert($_SESSION['quarter']);

$techArea=$formValues['techArea'];
$CompiledBy=$formValues['CompiledBy'];
$ReviewedBy=$formValues['ReviewedBy'];
$SubmittedBy=$formValues['SubmittedBy'];
$DateSubmission=$formValues['phhDateSubmission'];
 
for($x=0;$x<count($formValues['loopkey']);$x++){
$valueChain=$formValues['valueChainMSME'][$x];
$cpmAssistance=$formValues['cpmAssistance'][$x];
$nameMSME=$formValues['nameMSME'][$x];

$amountLoanAccessed=$formValues['amountLoanAccessed'][$x];
if($amountLoanAccessed=='' or $amountLoanAccessed==null){
  $amountLoanAccessed=0;  
}

$bankingInstitution=$formValues['bankingInstitution'][$x];


$recipientSex=$formValues['recipientSex'][$x];

$jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
  $jobsCreatedFemaleNew=0;  
}

$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
  $jobsCreatedFemaleOld=0;  
}

$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
  $jobsCreatedMaleNew=0;  
}

$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
  $jobsCreatedMaleOld=0;  
}

$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
  $jobsCreatedTotalNew=0;  
}

$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
  $jobsCreatedTotalOld=0;  
}


/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

include('connections/reportingPeriodValidate.php');


 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
}
 
 if($nameMSME<>''){
 
 $stmnt="INSERT INTO `tbl_bankloans`(`techArea`,`reportingPeriod`,`nameMSME`, `valueChain`,
 `cpmAssistance`, `amountLoanAccessed`, `recipientSex`,
 `bankingInstitution`, `jobsCreatedFemaleNew`, `jobsCreatedFemaleOld`,
 `jobsCreatedMaleNew`, `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
 `jobsCreatedTotalOld`, `CompiledBy`, `ReviewedBy`,
 `SubmittedBy`, `DateSubmission`,`updatedby`) VALUES
('".$techArea."','".$activeQuarter."','".$nameMSME."', '".$valueChain."',
 '".$cpmAssistance."', '".$amountLoanAccessed."', '".$recipientSex."',
 '".$bankingInstitution."', '".$jobsCreatedFemaleNew."', '".$jobsCreatedFemaleOld."',
 '".$jobsCreatedMaleNew."', '".$jobsCreatedMaleOld."', '".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."', '".$CompiledBy."', '".$ReviewedBy."',
 '".$SubmittedBy."', '".$DateSubmission."','".$_SESSION['username']."')";
//$obj->alert($reportingPeriod);
//$obj->alert($stmnt);
@mysql_query($stmnt)or die("CPMA Error-code 3494 because ".http(__line__));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_phh','','','',1,20);
return $obj;
}

function view_partnerships($reporting_period,$cpma_year,$valueChain,$partnerType,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['partnerType']=$partnerType;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data="<form action='".$_SERVER['PHP_SELF']."'  name='privatePartnershipsEdit' id='privatePartnershipsEdit' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".partnershipsFilter();

$data.="<tr>
					<th colspan='13'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/PUBLIC PRIVATE PARTNERSHIPS</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
    <th rowspan='2' class='first-cell-header'>#</th>
    <th rowspan='2'>Name of partner/Business / Grantee</th>
	<th rowspan='2'>Reporting Period</th>
    <th rowspan='2' class='small-cell-header'>Value chain</th>
    <th rowspan='2'>Partnership Focus (USE Agricultural production, Agricultural PH transformation, Multi-focus, others)</th>
    <th colspan='3'>Value of Partnership (Ushs)</th>
    <th colspan='4'>Jobs Created</th>
	<th rowspan='2'>Action</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Activity</th>
    <th class='small-cell-header'>Partner</th>
    <th class='small-cell-header'>Total</th>
    <th>Name of Job holder</th>
    <th class='small-cell-header'>Sex</th>
    <th class='small-cell-header'>Date of engagement</th>
    <th class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  </thead>
  <tbody>";


  $table='tbl_public_private_partnership';
	$name_column_submission_date='DateSubmission';
	$name_column_rep_period='reportingPeriod';
	$name_column_year='year';
	$primary_key_column='tbl_partnershipId';

	//get expected end of reporting period date
	$first_three_chars_rp=substr($reporting_period,0,3);
	//$obj->alert($reporting_period);

	switch($first_three_chars_rp){
		case 'Oct':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-03-31';
		break;

		case 'Apr':
		$expected_end_date=''.trim(substr($reporting_period,-4)).'-04-30';
		break;

		default:
		break;

	}

	//select records dates with issues
		$statement_rec_with_issues="select * from ".$table." 
		where ".$name_column_submission_date." > '".$expected_end_date."'
		";

		//$obj->alert($statement_rec_with_issues);

		$query_rec_with_issues = Execute($statement_rec_with_issues) or die(mysql_error());
			while ($row_rec_with_issues = FetchRecords($query_rec_with_issues)) {
				//update  records with issues
					$date_submission = $row_rec_with_issues[''.$name_column_submission_date.''];
					$affected_rec = $row_rec_with_issues[''.$primary_key_column.''];

					//Return statement from method to do the table clean-up
					$stamentToCleanUp = $qmobj->cleanUpDateSubmissionValues(
						$date_submission,
						$reporting_period,
						$table,
						$name_column_submission_date,
						$name_column_rep_period,
						$name_column_year,
						$primary_key_column,
						$affected_rec
					);

					switch(true){
						case(!empty($stamentToCleanUp) and ($stamentToCleanUp !=='')):
						@Execute($stamentToCleanUp) or die(mysql_error());
						break;

						default:
						break;
					}
			
			}
  
	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Apr - Sep') 
			and `p`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `p`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `p`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `p`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `p`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `p`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `p`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `p`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `p`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `p`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `p`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `p`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `p`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `p`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `p`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `p`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `p`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `p`.*,
		case
		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `p`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `p`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `p`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `p`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `p`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `p`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `p`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `p`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `p`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `p`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `p`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `p`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
		`v`.* 
		from `tbl_public_private_partnership` as `p`,
		tbl_mainvaluechain as `v`
		where `p`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%') "; 
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year.$valueChain;
		$query_string.=" group by `p`.`tbl_partnershipId`,`p`.`reportingPeriod`,`p`.`year` ";
		$query_string.=" order by `p`.`tbl_partnershipId` desc";

 $n=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_partnership_jobHolder` WHERE `partnership_id`=".$row_parent['tbl_partnershipId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
			$data.="<tr>";
			$data.="<td>".$n.". </td>";
			$data.="<td>".($row_parent['namePartner'])."</td>";
			$data.="<td>".($row_parent['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td>".($row_parent['partnershipFocus'])."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valueActivity']))."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valuePartner']))."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valueTotal']))."</td>";
			
			
			//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_partnership_jobHolder` 
					WHERE `partnership_id`=".$row_parent['tbl_partnershipId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
					
					//end of parent record row
					$data.="<td ".$col_span." ".$row_span." >
						<input type='button' class='formButton2'title='Edit'
							onclick=\"xajax_edit_partnerships('".$row_parent['tbl_partnershipId']."');return false;\" value='edit' /> |
						<input type='button' value='Delete' class='disabled' disabled='disabled'
							onclick=\"ConfirmDelete('".$row_parent['tbl_partnershipId']."','Delete_privatePartnerships');return false;\" align='left'>
					</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_partnership_jobHolder` 
					WHERE `partnership_id`=".$row_parent['tbl_partnershipId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
		
		/*
		*display pages
		*/


$data.="<tr align='right'>
<td colspan='12'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_partnerships('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_partnerships('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_partnerships('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_partnerships('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_partnerships('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."','".$_SESSION['partnerType']."','".$cur_page."',this.value)\">";
$i=1;
$selected="";
while($i*10<=$max_records){
$selected=$i*10==$records_per_page?"SELECTED":"";
$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
$i++;
}

$sel=$records_per_page>=$max_records?"SELECTED":"";
$data.="<option value='".$max_records."' ".$sel.">All</option>";
$data.="</select>";
$data.="</br>
</td>
</tr>
</tbobdy>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
//-----------------------------------End of Function view_partnerships--------------------------------------------------------
function new_partnerships($addField,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;

$data="<form action=\"".$PHP_SELF."\" name='partnerships' id='partnerships' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";

$data.="<tr class='evenrow'>
            <th colspan='22'><div align='center'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Public Private Partnership</div></th>
        </tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='4'>Value Chain/Tech Area :</td>
            <td><select name='techArea' id='techArea' style='width:200px;'>";
            $data.=QueryManager::valueChainFilter($program_id,$project_id);
            $data.="</select>";
            $data.="</td>
        </tr>";

//===========Start of table===============
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="
        <tr class='evenrow'>
    <th rowspan='3'>#</th>
    <th rowspan='3'>Name of partner/Business / Grantee</th>
    <th rowspan='3'>Value chain</th>
    <th rowspan='3'>Partnership Focus</th>
    <th colspan='3' rowspan='2'>Value of Partnership (Ushs)</th>
    <th colspan='6'><div align='center'>Jobs Created </div></th>
    <th colspan='6' rowspan='3'><div align='center'>Action</div></th>
  </tr>
  <tr class='evenrow'>
    <th colspan='2'><div align='center'>Female </div></th>
    <th colspan='2'><div align='center'>Male</div></th>
    <th colspan='2'><div align='center'>Total</div></th>
  </tr>
  <tr class='evenrow'>
    <th>Activity</th>
    <th>Partner</th>
    <th>Total</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
    <th>New</th>
    <th>Old</th>
  </tr>";
  
  
  $data.="<tbody id='theBody'>";
  $data.="<tr class='evenrow'>
    <td>1.</td>";
    $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1'/>";
    $data.="<td><input type='text' name='nameofPartner[]' id='nameofPartner1' style='width:200px;'/></td>
    <td><select name='valueChainPartner[]' id='valueChainPartner1' style='width:80px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Beans/Maize/Coffee'>All</option>";
    $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";
        }
        $data.="<option value='Beans/Maize'>Beans/Maize</option>";
        $data.="<option value='Beans/Coffee'>Beans/Coffee</option>";
        $data.="<option value='Maize/Coffee'>Maize/Coffee</option>";
              
    $data.="</select>";
    $data.="</td>
    <td><select name='partnershipFocus[]' id='partnershipFocus1' >
    <option value=''>-select-</option>
    <option value='Agricultural production'>Agricultural production</option>
    <option value='Agricultural PH transformation'>Agricultural PH transformation</option>
    <option value='Multi-focus'>Multi-focus</option>
    <option value='Others'>Others</option>
    
    </select></td>";
    $data.="<td><input type='text' name='valueOfPartnershipActivity[]' id='valueOfPartnershipActivity1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('valueOfPartnershipActivity1').value,
                                                                                                                            getElementById('valueOfPartnershipPartner1').value,
                                                                                                                            'valueOfPartnershipTotal1');return false;\"
                                                                                                                            onkeypress='return numbersonly(event, false)' style='width:80px'/></td>
    
    <td><input type='text' name='valueOfPartnershipPartner[]' id='valueOfPartnershipPartner1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('valueOfPartnershipActivity1').value,
                                                                                                                            getElementById('valueOfPartnershipPartner1').value,
                                                                                                                            'valueOfPartnershipTotal1');return false;\"
                                                                                                                            onkeypress='return numbersonly(event, false)' style='width:80px'/></td>
    
    <td><input type='text' name='valueOfPartnershipTotal[]' class='disabled' readonly='readonly' id='valueOfPartnershipTotal1' onkeypress='return numbersonly(event, false)' style='width:80px'/></td>
    
    <td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew1').value,
                                                                                                                            getElementById('jobsCreatedMaleNew1').value,
                                                                                                                            'jobsCreatedTotalNew1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld1').value,
                                                                                                                            getElementById('jobsCreatedMaleOld1').value,
                                                                                                                            'jobsCreatedTotalOld1');return false;\"
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    <td><input type='text' class='disabled' readonly='readonly' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' 
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    
    
    <td><input type='text' class='disabled' readonly='readonly' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1'
    onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  $data.="<td></td><tr>
</tbody>";

$data.="</table>
<p>
<input  type='button' class='formButton2' name='Add Rows' title='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
</p>";



$data.="<table style='display:none' >";
$data.="<tbody id=\"template-div\">";

$data.="<tr class='evenrow' id='report'>
    <td>1.</td>";
    $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1' />";
    $data.="<td><input type='text' name='nameofPartner[]' id='nameofPartner1' style='width:200px;'/></td>
    <td><select name='valueChainPartner[]' id='valueChainPartner1' style='width:80px;'>
    <option value=''>-select-</option>";
    $data.="<option value='Beans/Maize/Coffee'>All</option>";
    $stmntTwo="SELECT * FROM `tbl_lookup` l WHERE  l.`classDescription` = 'Activity Crops' ORDER BY  l.`code`";
        $qmedia=mysql_query($stmntTwo);
        while($rowCrop=mysql_fetch_array($qmedia)){
        $nameofBusiness=$row['typeOfMedia'];                     
        $selected=($nameofBusiness==$rowCrop['codeName'])?"selected":"";
        $data.="<option value=\"".$rowCrop['codeName']."\" ".$selected.">".$rowCrop['codeName']."</option>";
        }
        $data.="<option value='Beans/Maize'>Beans/Maize</option>";
        $data.="<option value='Beans/Coffee'>Beans/Coffee</option>";
        $data.="<option value='Maize/Coffee'>Maize/Coffee</option>";
              
    $data.="</select>";
    $data.="</td>
    <td><select name='partnershipFocus[]' id='partnershipFocus1' >
    <option value=''>-select-</option>
    <option value='Agricultural production'>Agricultural production</option>
    <option value='Agricultural PH transformation'>Agricultural PH transformation</option>
    <option value='Multi-focus'>Multi-focus</option>
    <option value='Others'>Others</option>
    
    </select></td>";
    $data.="<td><input type='text' name='valueOfPartnershipActivity[]' id='valueOfPartnershipActivity1'
    
    onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'valueOfPartnershipActivity').val(),
                                        getElementWithNameLike(this,'valueOfPartnershipPartner').val(),
                                       getElementWithNameLike(this,'valueOfPartnershipTotal').attr('id'));return false;\"
                                        onkeypress=\"return numbersonly(event, false)\" style='width:80px'/></td>
    
    <td><input type='text' name='valueOfPartnershipPartner[]' id='valueOfPartnershipPartner1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'valueOfPartnershipActivity').val(),
                                        getElementWithNameLike(this,'valueOfPartnershipPartner').val(),
                                       getElementWithNameLike(this,'valueOfPartnershipTotal').attr('id'));return false;\"
                                        onkeypress=\"return numbersonly(event, false)\" style='width:80px'/></td>
    
    <td><input type='text' class='disabled' readonly='readonly' name='valueOfPartnershipTotal[]' id='valueOfPartnershipTotal1' onKeyUp=\"xajax_calc_youthApprentice(getElementWithNameLike(this,'valueOfPartnershipActivity').val(),
                                        getElementWithNameLike(this,'valueOfPartnershipPartner').val(),
                                       getElementWithNameLike(this,'valueOfPartnershipTotal').attr('id'));return false;\"
                                        onkeypress=\"return numbersonly(event, false)\" style='width:80px'/></td>";
    
    
    
    
    
    
    
    $data.="<td><input type='text' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
                                                                                                                                    
    <td><input type='text' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleNew[]'  id='jobsCreatedMaleNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input type='text' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input class='disabled' readonly='readonly' type='text' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>
    <td><input class='disabled' readonly='readonly' type='text' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld1' onKeyUp=\"xajax_calc_bds(
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedFemaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleNew').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedMaleOld').val(),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalNew').attr('id'),
                                                                                                                                    getElementWithNameLike(this,'jobsCreatedTotalOld').attr('id'));return false;\" onkeypress='return numbersonly(event, false)' style='width:30px;'/></td>";
  


$data.="<td><input  type='button' class='formButton2'name='Remove' title='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
  </tr>";

$data.="</tbody>";
$data.="</table>";




$data.="</td>";
$data.="</tr>";
//===========End of table===============


//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.partnerships.partnershipsDateSubmission);return false;\" hidefocus=''>
            <input name='partnershipsDateSubmission' type='text' style='width:200px;'  size='50' value='' id='partnershipsDateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_partnerships(xajax.getFormValues('partnerships')); return false;\" />
            </div>
    </td>
  </tr>

";
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============


$data.="</table>";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_publicDialogueMechanisms--------------------------------------------------------
function save_partnerships($formValues){
$obj = new xajaxResponse();

//$obj->alert('Hello World');
    $reportingPeriod=$_SESSION['quarter'];
    
   $techArea=$formValues['techArea'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['partnershipsDateSubmission'];
 
 

for($x=0;$x<count($formValues['loopkey']);$x++){
    $valueChain=$formValues['valueChainPartner'][$x];   
   $namePartner=$formValues['nameofPartner'][$x];
    $partnershipFocus=$formValues['partnershipFocus'][$x];
    
    
    $valueActivity=$formValues['valueOfPartnershipActivity'][$x];
    if($valueActivity=='' or $valueActivity==null){
     $valueActivity=0;   
    }
    $valuePartner=$formValues['valueOfPartnershipPartner'][$x];
    if($valuePartner=='' or $valuePartner==null){
     $valuePartner=0;   
    }
    
    $valueTotal=$formValues['valueOfPartnershipTotal'][$x];
    if($valueTotal=='' or $valueTotal==null){
     $valueTotal=0;   
    }
    
    
    $jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$x];
    if($jobsCreatedFemaleNew=='' or $jobsCreatedFemaleNew==null){
     $jobsCreatedFemaleNew=0;   
    }
    
    $jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$x];
    if($jobsCreatedFemaleOld=='' or $jobsCreatedFemaleOld==null){
     $jobsCreatedFemaleOld=0;   
    }
    
    $jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$x];
    if($jobsCreatedMaleNew=='' or $jobsCreatedMaleNew==null){
     $jobsCreatedMaleNew=0;   
    }
    
    $jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$x];
    if($jobsCreatedMaleOld=='' or $jobsCreatedMaleOld==null){
     $jobsCreatedMaleOld=0;   
    }
    
    $jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$x];
    if($jobsCreatedTotalNew=='' or $jobsCreatedTotalNew==null){
     $jobsCreatedTotalNew=0;   
    }
    
    $jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$x];
    if($jobsCreatedTotalOld=='' or $jobsCreatedTotalOld==null){
     $jobsCreatedTotalOld=0;   
    }
    
    
    /*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

include('connections/reportingPeriodValidate.php');


 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
}
    
 if($namePartner<>''){
 
 $stmnt="INSERT INTO `tbl_public_private_partnership`(`techArea`,`namePartner`, `valueChain`,
 `reportingPeriod`, `partnershipFocus`,
 `valueActivity`, `valuePartner`,
 `valueTotal`, `jobsCreatedFemaleNew`,
 `jobsCreatedFemaleOld`, `jobsCreatedMaleNew`,
 `jobsCreatedMaleOld`, `jobsCreatedTotalNew`,
 `jobsCreatedTotalOld`, `CompiledBy`,
 `ReviewedBy`, `SubmittedBy`,
 `DateSubmission`)
 VALUES ('".$techArea."','".$namePartner."', '".$valueChain."',
 '".$activeQuarter."', '".$partnershipFocus."',
 '".$valueActivity."', '".$valuePartner."',
 '".$valueTotal."', '".$jobsCreatedFemaleNew."',
 '".$jobsCreatedFemaleOld."', '".$jobsCreatedMaleNew."',
 '".$jobsCreatedMaleOld."', '".$jobsCreatedTotalNew."',
 '".$jobsCreatedTotalOld."', '".$CompiledBy."',
 '".$ReviewedBy."', '".$SubmittedBy."',
 '".$DateSubmission."')";
 
@mysql_query($stmnt)or die("CPM Error-code 3986 because ".http(__line__));

 }
}
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_partnerships','','','','',1,20);
return $obj;
}
//Delete form4
function delete_traders_form4($formValues){
$obj=new xajaxResponse();

if(count($formValues['tbl_form4_tradersId'])>0){
for($x=0;$x<count($formValues['tbl_form4_tradersId']);$x++){
	
	//$sql="DELETE e.* FROM `tbl_form4_traders` e WHERE e.`tbl_form4_tradersId`='".$formValues['tbl_form4_tradersId'][$x]."' ";
	$sql="update tbl_form4_traders set display='No' where  tbl_form4_tradersId='".$formValues['tbl_form4_tradersId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a record on form4 Traders tbl_form4_tradersId->".$formValues['tbl_form4_tradersId'][$x]."";  
$description=($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".http(__line__));
@mysql_query($stmnt) or die(QueryManager::http("DEL-5540"));

//@mysql_query($sql)or die("DEL-27 because ".http(__line__));
@mysql_query($sql) or die(QueryManager::http("DEL-5543"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form4 Trader Record successfully Deleted!"));
$obj->call('xajax_view_form4','','','','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete_traders_form4-----------------------------------------
function view_form4($region,$reporting_period,$cpma_year,$trName,$trCode,$cur_page=1,$records_per_page=20){
$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}



$n=1;
$inc=1;
$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['trName']=$trName;
$_SESSION['trCode']=$trCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$trName=($_SESSION['trName']<>''?$_SESSION['trName']:$trName);
$trCode=($_SESSION['trCode']<>''?$_SESSION['trCode']:$trCode);





$data="<form action=\"".$PHP_SELF."\" name='form4' id='form4' method='post'>
	<table width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form4();
		$data.="<tr><th colspan='23' ><center>TRADER DATA DETAILS</center></th></tr>";



		$data.="<tr>
    <td class='offwhite' COLSPAN='11' align='left'><input type='button' class='formButton2'title='Edit'  onclick=\"xajax_edit_traders_form4(xajax.getFormValues('form4'));return false;\" value='edit' /> ";
        $data.=" <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form4'),'Delete_traders_form4');return false;\" align='left'></td>";
    $data.="</td>
</tr> </table>"; 





		//===================data to be displayed=====================

		
	switch(trim($cpma_year)){
      case trim('Project start up'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Apr - Sep') 
      and `w`.`year` in (2013)";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
	  
	  case trim('CPMA Year One'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2013,2014)";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Two'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2014,2015)";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Three'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Four'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;      
      
      case trim('CPMA Year Five(Activity close out)'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2017,2018)";
       $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      default:
      break;
    }

			switch($reporting_period){

			case trim('Project start up'):
		      $reportingYearToPeriodCleaned="
		      and `w`.`reportingPeriod` = 'Apr - Sep' 
		      and `w`.`year` in (2013)
		      ";
		      $monthsArray=array('4','5','6','7','8','9');
		      break;
			case'Oct 2012 - Mar 2013':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2012,2013)
			";
			$monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2013 - Sep 2013':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2013)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			case'Oct 2013 - Mar 2014':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2013,2014)
			";
			$monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2014 - Sep 2014':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2014)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			case'Oct 2014 - Mar 2015':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2014,2015)
			";
			 $monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2015 - Sep 2015':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2015)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			case'Oct 2015 - Mar 2016':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2015,2016)
			and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
			";
			 $monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2016 - Sep 2016':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2016)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			case'Oct 2016 - Mar 2017':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2016,2017)
			and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
			";
			 $monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2017 - Sep 2017':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2017)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			case'Oct 2017 – Mar 2018':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2017,2018)
			";
			 $monthsArray=array('10','11','12','1','2','3');
			break;

			case'Apr 2018 – May 2018':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2018)
			";
			$monthsArray=array('4','5','6','7','8','9');
			break;

			default:
			$monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
			break;
			}





			//Mysql query to return Results from uploaded Excel sheet
			$query_string="SELECT `w` . * ,
			case
			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2012,2013) 
			then 'Oct 2012 - Mar 2013'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2013) 
			then 'Apr 2013 - Sep 2013'

			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2013,2014) 
			then 'Oct 2013 - Mar 2014'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2014) 
			then 'Apr 2014 - Sep 2014'

			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2014,2015) 
			then 'Oct 2014 - Mar 2015'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2015) 
			then 'Apr 2015 - Sep 2015'

			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2015,2016) 
			then 'Oct 2015 - Mar 2016'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2016) 
			then 'Apr 2016 - Sep 2016'

			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2016,2017) 
			then 'Oct 2016 - Mar 2017'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2017) 
			then 'Apr 2017 - Sep 2017'

			when `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2017,2018) 
			then 'Oct 2017 - Mar 2018'

			when `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2017) 
			then 'Apr 2018 - Sep 2018'

			else `w`.`reportingPeriod`
			end 
			as  `reportingPeriod_cleaned`,
		`w`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
		`w`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
		`w`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
		`w`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
		`w`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
		`w`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
		`w`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
		`w`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
		`w`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
		`w`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
		`w`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
		`w`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
		`w`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
		`w`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
		`w`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
		`w`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
		`w`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
		`w`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
		`w`.`vaSupplyChain`,
		`w`.`vaSupplyChainDetails`,
		`w`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
		`w`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
		`w`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
		`w`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
		`w`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
		`w`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
		`w`.`numCbo`,
		`w`.`numCboDetails`,
		`w`.`volMaizePurchasedDetails`,
		`w`.`volMaizeExDetails`,
		`w`.`volCoffeeExDetails`,
		`w`.`volBeansExDetails`,
		`w`.`epayRecievedDetails`,
		`w`.`epayMadeDetails`,
		`w`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
		`w`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
		`w`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
		`w`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
		`w`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
		`w`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
		`w`.`volBeansExUgx`, `w`.`volBeansExUgxDetails`,
		`w`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
		`w`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
		`w`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
		`w`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
		`w`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
		`w`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
		`w`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
		`w`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
		`w`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
		`w`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
		`w`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
		`w`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
		`w`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
		`w`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
		`w`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
		`w`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
		`w`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
		`w`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
		`w`.`volCoffeeExUgx`,`w`.`volCoffeeExUgxDetails`,
		`w`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
		`w`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
		`w`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
		`w`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
		`w`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
		`w`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
		`w`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
		`w`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
		`w`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
		`w`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
		`w`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
		`w`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
		`w`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
		`w`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
		`w`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
		`w`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
		`w`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
		`w`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
		`w`.`volMaizeExUgx`, `w`.`volMaizeExUgxDetails`,
		`w`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
		`w`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
		`w`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
		`w`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
		`w`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
		`w`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
		`w`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
		`w`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
		`w`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
		`w`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
		`w`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
		`w`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`,
			`x`.`traderName`,
			`x`.`traderDob`, 
			`x`.`traderCode`,
			`x`.`traderSex`, 
			`x`.`traderDistrict`,
			`x`.`traderSubcounty`,
			`x`.`traderVillage`,
			`d`.`districtName`,
			`s`.`districtCode`,
			`s`.`subcountyCode`,
			`s`.`subcountyName`
			FROM 
			`tbl_form4_traders` as `w`,
			`tbl_traders` as `x`,
			`tbl_district` as `d`,
			`tbl_subcounty` as `s`
			WHERE `w`.`tbl_traderId` = `x`.`tbl_tradersId`
			AND `d`.`districtCode`=`x`.`traderDistrict`
			AND `d`.`Display`='Yes' 
			AND `d`.`districtCode`=`s`.`districtCode`
			AND `s`.`subcountyCode`=`x`.`traderSubcounty`
			AND `s`.`Display`='Yes' 
			AND `w`.`display`='Yes' ";



			//$reporting_period=(!empty($cpma_year))?'':$reporting_period;
			//$cpma_year=(!empty($reporting_period))?'':$cpma_year;
			$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
			$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
			$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
			
			$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
			$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
			$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode;


			$query_string.=" GROUP BY w.`tbl_traderId`,`w`.`year`";
			$query_string.=" ORDER BY w.`tbl_form4_tradersId` DESC";

			//$obj->alert($query_string);

			$x=1;
			$query_=mysql_query($query_string)or die(mysql_error());
			/**************
			*paging parameters
			*
			****/



			$data.="<table style='background-color:#EBEBEB;' border='0' cellspacing='1' cellpadding='0' width='100%'>
  <tr>
  <th colspan='0'rowspan='2' style='min-width: 50px;'>#</th>
  <th rowspan='2'>Name of Business/Exporter</th>
  <th rowspan='2'>Reporting Period</th>
    <th colspan='2' rowspan='2' class='largest-cell-header'>Performance Indicators</th>";

    switch(true){

   	case (!empty($cpma_year)) and (empty($reporting_period)):
   			 $data.="<th colspan='13' >Achievements</th>";
   		break;
   	case (empty($cpma_year)) and (!empty($reporting_period)):
   		
   			 $data.="<th colspan='7' >Achievements</th>";
   		break;

   	case (!empty($cpma_year)) and (!empty($reporting_period)):
   			 $data.="<th colspan='7' >Achievements</th>";
   		break;
   	default:
   		 $data.="<th colspan='13' >Achievements</th>";
   		break;
   } 

  

  $data.="<th rowspan='2'>Given details</th>
  </tr><tr>";

                      
foreach ($monthsArray as $key) {
  $month= __month__coverter($key); 
  $result = substr($month, 0, 3); 
  $data.="<th >".$result."</th>"; 
  }
  $data.="<th >Total</th>";
  $data.="</tr>";


			$max_records = mysql_num_rows($query_);
			$num_pages=ceil($max_records/$records_per_page);
			$offset = ($cur_page-1)*$records_per_page;
			$x=$offset+1;
			$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
			
			while($row=mysql_fetch_array($new_query)){
				$divVwDisaggregation="vwDisaggregation".$row['tbl_form4_tradersId'];
//				$color=$x%2==1?"evenrow3":"evenrow";


				 $data.="<td rowspan='14' >".$x.".<input name='loopkey[]' type='hidden' id='loopkey' value='1'/>
       <input name='tbl_form4_tradersId[]' type='checkbox' id='tbl_form4_tradersId".$x."' size='25' value='".$row['tbl_form4_tradersId']."'  /></td>";
                $data.="<td rowspan='14' style='background-color:#e7e7e7'>".$row['traderName']."</td>";
                $data.="<td rowspan='14'>".$row['reportingPeriod_cleaned']."</td>";

				
			//	$data.="<tr><td colspan='23'><div id='".$divVwDisaggregation."'>".view_frm4ExDisaggregation($row['tbl_traderId'],$row['year'],$row['tbl_form4_tradersId'],($row['traderName']),$reporting_period,$divVwDisaggregation)."</div><td></tr>";

                switch(true){

   	case (!empty($cpma_year)) and (empty($reporting_period)):
   		 $data.=view_frm4ExDisaggregation("All",$row['tbl_traderId'],$row['year'],$row['tbl_form4_tradersId'],($row['traderName']),$reporting_period,$divVwDisaggregation);

   		break;
   	case (empty($cpma_year)) and (!empty($reporting_period)):
   			$data.=data_form4($row);
   		break;

   	case (!empty($cpma_year)) and (!empty($reporting_period)):
   			$data.=data_form4($row);
   		break;
   	default:
   		 $data.=view_frm4ExDisaggregation("All",$row['tbl_traderId'],$row['year'],$row['tbl_form4_tradersId'],($row['traderName']),$reporting_period,$divVwDisaggregation);
   		break;
   } 

    $data.="<tr>
    <td colspan='21' style='height:5px;background-color:#FFFFFF'></td>
    </tr>";

		  
		  $x++;
		$n++;
		}

		$data.="".noRecordsFound($new_query,23)."";


		/*
		*display pages
		*/

		$data.="</table>";

$data.="<tr><td>
						<input type='button' class='formButton2' title='Edit'  onclick=\"xajax_edit_traders_form4(xajax.getFormValues('form4'));return false;\" value='edit' /> 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form4'),'Delete_traders_form4');return false;\" align='left'>
					</td>
</tr>";		
		


			$data.="<tr align='right'>
			<td colspan=8>";

			$p='';
			$num_links=10;
			$startAt_links=($cur_page-5);
			$endAt_links=($cur_page+$num_links);
			$cur_link=$cur_page;


			if($num_pages>1){
			$links=1;
			$append_bar=$p==$num_pages?"":"|";
			if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form4('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
			else $data.="<a href='#' onclick=\"xajax_view_form4('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

			$p=2;
			while($p<$num_pages){
			if(($p>$startAt_links) and ($p<$endAt_links)){
			$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form4('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			$p++;
			}
			if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_form4('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			}


			$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form4('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['trName']."','".$_SESSION['trCode']."','".$cur_page."',this.value)\">";
			$i=1;
			$selected="";
			while($i*10<=$max_records){
			$selected=$i*10==$records_per_page?"SELECTED":"";
			$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
			$i++;
			}

			$sel=$records_per_page>=$max_records?"SELECTED":"";
			$data.="<option value='".$max_records."' ".$sel.">All</option>";
			$data.="</select>";
			$data.="</br>
			</td>
		</tr>
	</table>
</form>";



$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}
function view_frm4ExDisaggregation($value,$Id,$Year,$tbl_form4_tradersId,$traderName,$reportingPeriod,$divVwDisaggregation){
$obj=new xajaxResponse();
/* $rp=$_SESSION['quarter'];
$reportingPeriod=substr("".$rp."",0,9); */
$recordId=$tbl_form4_tradersId;
$nameOfTrader=$traderName;


		$query_string="SELECT 
		`x`.`tbl_form4_tradersId`,
		`x`.`tbl_traderId`,
		`x`.`reportingPeriod`,
		`x`.`year`,
		`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
		`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
		`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
		`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
		`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
		`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
		`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
		`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
		`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
		`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
		`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
		`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
		`x`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
		`x`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
		`x`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
		`x`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
		`x`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
		`x`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
		`x`.`vaSupplyChain`,
		`x`.`vaSupplyChainDetails`,
		`x`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
		`x`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
		`x`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
		`x`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
		`x`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
		`x`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
		`x`.`numCbo`,
		`x`.`numCboDetails`,
		`x`.`volMaizePurchasedDetails`,
		`x`.`volMaizeExDetails`,
		`x`.`volCoffeeExDetails`,
		`x`.`volBeansExDetails`,
		`x`.`epayRecievedDetails`,
		`x`.`epayMadeDetails`,
		`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
		`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
		`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
		`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
		`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
		`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
		`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
		`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
		`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
		`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
		`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
		`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
		`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
		`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
		`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
		`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
		`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
		`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
		`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
		`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
		`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
		`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
		`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
		`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
		`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
		`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
		`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
		`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
		`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
		`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
		`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
		`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
		`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
		`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
		`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
		`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
		`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
		`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
		`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
		`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
		`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
		`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
		`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
		`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
		`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
		`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
		`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
		`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
		`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
		`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
		`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
		`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
		`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
		`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
		`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
		`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
		`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
		FROM `tbl_form4_traders` as `x`
		WHERE `x`.`tbl_form4_tradersId`='".$recordId."'
		and `x`.`reportingPeriod`='".$reportingPeriod."'";



    $query_string1="SELECT 
    `x`.`tbl_form4_tradersId`,
    `x`.`tbl_traderId`,
    `x`.`reportingPeriod`,
    `x`.`year`,
    `x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `x`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `x`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `x`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `x`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `x`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `x`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `x`.`vaSupplyChain`,
    `x`.`vaSupplyChainDetails`,
    `x`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
    `x`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
    `x`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
    `x`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
    `x`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
    `x`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
    `x`.`numCbo`,
    `x`.`numCboDetails`,
    `x`.`volMaizePurchasedDetails`,
    `x`.`volMaizeExDetails`,
    `x`.`volCoffeeExDetails`,
    `x`.`volBeansExDetails`,
    `x`.`epayRecievedDetails`,
    `x`.`epayMadeDetails`,
    `x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
    `x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
    `x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
    `x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
    FROM `tbl_form4_traders` as `x`
    WHERE `x`.`tbl_form4_tradersId`='".$recordId."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Oct - Mar'";


    $query_string2="SELECT 
    `x`.`tbl_form4_tradersId`,
    `x`.`tbl_traderId`,
    `x`.`reportingPeriod`,
    `x`.`year`,
    `x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `x`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `x`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `x`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `x`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `x`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `x`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `x`.`vaSupplyChain`,
    `x`.`vaSupplyChainDetails`,
    `x`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
    `x`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
    `x`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
    `x`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
    `x`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
    `x`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
    `x`.`numCbo`,
    `x`.`numCboDetails`,
    `x`.`volMaizePurchasedDetails`,
    `x`.`volMaizeExDetails`,
    `x`.`volCoffeeExDetails`,
    `x`.`volBeansExDetails`,
    `x`.`epayRecievedDetails`,
    `x`.`epayMadeDetails`,
    `x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
    `x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
    `x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
    `x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
    FROM `tbl_form4_traders` as `x`
    WHERE `x`.`tbl_traderId`='".$Id."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Apr - Sep'";



		
		//$obj->alert($query_string);

    switch($value){
                case "Apr - Sep":
                $query=mysql_query($query_string)or die(mysql_error());
                $row=mysql_fetch_array($query);
                $data.=data_form4($row);
                break;
                
                case "Oct - Mar":
                $query=mysql_query($query_string)or die(mysql_error());
                $row=mysql_fetch_array($query);
                $data.=data_form4($row);
                break;

                case 'All':
                	# code...
                $query1=mysql_query($query_string1)or die(mysql_error());
                $query2=mysql_query($query_string2)or die(mysql_error());
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form4All($row,$row2);
                break;
                
                default:
                $query1=mysql_query($query_string1)or die(mysql_error());
                $query2=mysql_query($query_string2)or die(mysql_error());
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form4All($row,$row2);
                break;
              }
// $data.="</table></form>";  
 
 $_SESSION['divVwDisaggregationTraders']=$data;
 
//$obj->assign($divVwDisaggregation,'innerHTML',$data); 
return $data;			
}
function data_form4($row){
	$qmobj = new QueryManager('');
	
    $data.="<tr>";
    $data.="<td colspan='2'>Number of VAs in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
  $data.="<td>".$qmobj->cleanHtmlSpecialCharacters($row['vaSupplyChainDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
     $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
    $data.="<td align='right'>".$totUSC."</td>";
  $data.="<td>".$qmobj->cleanHtmlSpecialCharacters($row['numCboDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$qmobj->cleanHtmlSpecialCharacters($row['volMaizePurchasedDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";
    $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$qmobj->cleanHtmlSpecialCharacters($row['volMaizeExDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$qmobj->cleanHtmlSpecialCharacters($row['volCoffeeExDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";
    $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$qmobj->cleanHtmlSpecialCharacters($row['volBeansExDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";
    $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$qmobj->cleanHtmlSpecialCharacters($row['epayRecievedDetails'])."</td>";
  $data.="</tr>";
  $data.="<tr>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
  $data.="<td>".$qmobj->cleanHtmlSpecialCharacters($row['epayMadeDetails'])."</td>";
  $data.="</tr>";

  return $data;

}
function data_form4All($row,$row2){

	$qmobj = new QueryManager('');

    $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of VAs in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']+$row2['exTSCFirstQM']+$row2['exTSCSecondQM']+$row2['exTSCThirdQM']+$row2['exTSCFourthQM']+$row2['exTSCFifthQM']+$row2['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
  $data.="<td>".$row['vaSupplyChainDetails']."\n".$row2['vaSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
     $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']+$row2['exUSCFirstQM']+$row2['exUSCSecondQM']+$row2['exUSCThirdQM']+$row2['exUSCFourthQM']+$row2['exUSCFifthQM']+$row2['exUSCSixthQM']);
   $data.="<td align='right'>".$totUSC."</td>";
  $data.="<td>".$row['numCboDetails']."\n".$row2['numCboDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']+$row2['volMPFirstQM']+$row2['volMPSecondQM']+$row2['volMPThirdQM']+$row2['volMPFourthQM']+$row2['volMPFifthQM']+$row2['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."\n".$row2['volMaizePurchasedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSixthQM'])."</td>";
    $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']+$row2['volCPFirstQM']+$row2['volCPSecondQM']+$row2['volCPThirdQM']+$row2['volCPFourthQM']+$row2['volCPFifthQM']+$row2['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']+$row2['volBPFirstQM']+$row2['volBPSecondQM']+$row2['volBPThirdQM']+$row2['volBPFourthQM']+$row2['volBPFifthQM']+$row2['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']+$row2['volMEFirstQM']+$row2['volMESecondQM']+$row2['volMEThirdQM']+$row2['volMEFourthQM']+$row2['volMEFifthQM']+$row2['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$row['volMaizeExDetails']."\n".$row2['volMaizeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']+$row2['volMEUgxFirstQM']+$row2['volMEUgxSecondQM']+$row2['volMEUgxThirdQM']+$row2['volMEUgxFourthQM']+$row2['volMEUgxFifthQM']+$row2['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']+$row2['volCEFirstQM']+$row2['volCESecondQM']+$row2['volCEThirdQM']+$row2['volCEFourthQM']+$row2['volCEFifthQM']+$row2['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$row['volCoffeeExDetails']."\n".$row2['volCoffeeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSixthQM'])."</td>";
    $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']+$row2['volCEUgxFirstQM']+$row2['volCEUgxSecondQM']+$row2['volCEUgxThirdQM']+$row2['volCEUgxFourthQM']+$row2['volCEUgxFifthQM']+$row2['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']+$row2['volBEFirstQM']+$row2['volBESecondQM']+$row2['volBEThirdQM']+$row2['volBEFourthQM']+$row2['volBEFifthQM']+$row2['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$row['volBeansExDetails']."\n".$row2['volBeansExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']+$row2['volBEUgxFirstQM']+$row2['volBEUgxSecondQM']+$row2['volBEUgxThirdQM']+$row2['volBEUgxFourthQM']+$row2['volBEUgxFifthQM']+$row2['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSixthQM'])."</td>";
    $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']+$row2['epayRFirstQM']+$row2['epayRSecondQM']+$row2['epayRThirdQM']+$row2['epayRFourthQM']+$row2['epayRFifthQM']+$row2['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$row['epayRecievedDetails']."\n".$row2['epayRecievedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']+$row2['epayMFirstQM']+$row2['epayMSecondQM']+$row2['epayMThirdQM']+$row2['epayMFourthQM']+$row2['epayMFifthQM']+$row2['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
  $data.="<td>".$row['epayMadeDetails']."\n".$row2['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;
}
//-----------------------------------End of Function view_form4--------------------------------------------------------
function new_form4($trName='',$trCode,$trAge,$trGender,$trDistrict,$trSubcounty,$quarter='',$Qyear=''){
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$_SESSION['trName']=$trName;

$data.="<form action=\"".$PHP_SELF."\" name='form4' id='form4' method='post'>";
$data.="

<table width='100%' border='0' cellpadding='2' cellspacing='2' id='report'>
<tr class='evenrow3' height='31'>
    <th colspan='15'>
      <div align='center'>Commodity Production and Marketing Activity TRADER DATA COLLECTION FORM</div>
    </th>
</tr>";

$data.="<tr class='evenrow'>
<th colspan=10>Identification Particulars</th>
</tr>";
 
$data.="<tr class='evenrow3'>
<td colspan='22'>
<table  width='100%' border='0' cellspacing='2' cellpadding='2'>";

$data.="

<tr class='evenrow'>
<td colspan=2><strong>Name of Business / Trader:</strong> </td>";

$stmnt_ExDetails="SELECT x . * , d.`districtName`, s.`subcountyName`
                                    FROM `tbl_traders` x, `tbl_district` d, `tbl_subcounty` s
                                    WHERE x.`tbl_tradersId`='".$_SESSION['trName']."'
                                    AND d.`districtCode` = s.`districtCode`
                                    AND x.`traderDistrict` = d.`districtCode`
                                    AND x.`traderSubcounty` = s.`subcountyCode`
                                    ORDER BY x.`tbl_tradersId` ASC";
                                    
                                    //$obj->alert($stmnt_ExDetails);
                $Qtrader= @mysql_query($stmnt_ExDetails);
                $rowEx=mysql_fetch_array($Qtrader);
                //creating a date object
                                    $today=date('Y-m-d');
                                    //$obj->alert($today);
                                    $dateRef=$rowEx['traderDob'];
                                    //$obj->alert($dateRef);
                                    $date3 = date_create($dateRef);
                                    $date4 = date_create($today);
                                    
                                    $diff34 = date_diff($date4, $date3);
                                    
                                    //accesing years
                                    $years = $diff34->y;
                                    
                                    
                                    
                                    


  $data.="<td align='left'><select name='trName' id='trName' onchange=\"xajax_new_form4(this.value,
  '".$trCode."',
  '".$trAge."',
  '".$trGender."',
  '".$trDistrict."',
  '".$trSubcounty."',
  '".$trVillage."'
  );return false;\" />";
  $data.="<option value=''>-select-</option>";
  
  $stmnt="SELECT x . * , d.`districtName`, s.`subcountyName`
                                    FROM `tbl_traders` x, `tbl_district` d, `tbl_subcounty` s
                                    WHERE d.`districtCode` = s.`districtCode`
                                    AND x.`traderDistrict` = d.`districtCode`
                                    AND x.`traderSubcounty` = s.`subcountyCode`
                                    ORDER BY x.`traderName` ASC";
                $Q= @mysql_query($stmnt);
                                    while($row=mysql_fetch_array($Q)){
                                    
                                    
  $selected=($trName==$row['tbl_tradersId'])?"selected":"";
$data.="<option value=\"".$row['tbl_tradersId']."\" ".$selected.">".$row['traderName']."</option>";
                                   }
  $data.="</select></td>";
  $data.="<td align='right'><strong>Code:</strong></td>";
  $data.="<td>
  <input type='hidden' name='trCode' id='trCode' value='' onchange=\"xajax_new_form4('".$trName."',
  this.value,
  '".$trAge."',
  '".$trGender."',
  '".$trDistrict."',
  '".$trSubcounty."',
  '".$trVillage."'
  );return false;\" />
  
    <input type='text' value='".$rowEx['traderCode']."' class='disabled' disabled='disabled'  style='width:100px;'/>
  </td>";

  $data.="<td align='right'><strong>Age:</strong></td>";
  $data.="<td>
    <input type='hidden' name='trAge' id='trAge' onchange=\"xajax_new_form4('".$trName."',
  '".$trCode."',
  this.value
  '".$trGender."',
  '".$trDistrict."',
  '".$trSubcounty."',
  '".$trVillage. '\';
  );return false;\"  value=\'\'/>

    <input type=\'text\' value=\'"' .$years."' readonly='readonly' class='disabled' disabled='disabled' style='width:100px;'/>
  </td>";
  $data.="<td></td>";
  $data.="</tr>";

  $data.="<tr class='evenrow'>
	<td align='right'><strong>Gender:</strong></td>";
	  $data.="<td>
          <input type='hidden' name='trGender' id='trGender' value='' onchange=\"xajax_new_form4('".$trName."',
  '".$trCode."',
  '".$trAge."',
  this.value,
  '".$trDistrict."',
  '".$trSubcounty."',
  '".$trVillage."',
  '".$trVillage."'
  );return false;\" style='width:100px;'/>
          <input type='text' value='".$rowEx['traderSex']."' readonly='readonly' class='disabled' disabled='disabled' style='width:100px;'/>
          </td>";

  $data.="<td align='right'><strong>District:</strong></td>
<td>
<input type='hidden' name='trDistrict' id='trDistrict' value='' onchange=\"xajax_new_form4('".$trName."',
  '".$trCode."',
  '".$trAge."',
  '".$trGender."',
  this.value,
  '".$trSubcounty."',
  '".$trVillage."'
  );return false;\"  />
<input type='text' value='".$rowEx['districtName']."' class='disabled' disabled='disabled' style='width:100px;' />
</td>";
  
  $data.="<td align='right'><strong>Subcounty:</strong></td>
<td>
<input type='hidden' name='trSubcounty' id='trSubcounty' value='' onchange=\"xajax_new_form4('".$trName."',
  '".$trCode."',
  '".$trAge."',
  '".$trGender."',
  '".$trDistrict."',
  this.value,
  '".$trVillage."',
  );return false;\"  />
<input type='text' value='".$rowEx['subcountyName']."' class='disabled' disabled='disabled' style='width:100px;'/>
</td>";
  
  $data.="<td align='right'><strong>Village:</strong></td>";
    $data.="<td><input type='hidden' name='trVillage' id='trVillage' value='' onchange=\"xajax_new_form4('".$trName."',
  '".$trCode."',
  '".$trAge."',
  '".$trGender."',
  '".$trDistrict."',
  '".$trSubcounty."',
  this.value
  );return false;\"  />
<input type='text' value='".$rowEx['traderVillage']."' class='disabled' disabled='disabled' style='width:100px;'/>
    
    ";
    $data.="</td>";

$data.="</table>
</td>
</tr>";
 


$data.="<tr class='evenrow3'>
<td colspan='22'>
<table  width='100%' border='0' cellspacing='2' cellpadding='2'>

<tr>
<th>Performance Indicator</th>
<th></th>
<th >Total</th>
<th>Given details</th>
  </tr>

<tr class='evenrow'>
<td colspan='2'>Number of VAs in the supply chain </td>
<td  ><input value=0 type='text' name='vaSupplyChain' id='vaSupplyChain' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='vaSupplyChainDetails' id='vaSupplyChainDetails' cols='100' rows='5'></textarea></td>
  </tr>

<tr class='evenrow'>
<td colspan='2'>Number of Community Based Organizations in the supply Chain</td>
<td  ><input value=0 type='text' name='numCbo' id='numCbo' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='numCboDetails' id='numCboDetails' cols='100' rows='5'></textarea></td>

  </tr>

<tr class='evenrow'>
<td colspan='4'>Volume of produce purchased (Kgs):</td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Maize</td>
<td  ><input value=0 type='text' name='volMaizePurchased' id='volMaizePurchased' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='volMaizePurchasedDetails' id='volMaizePurchasedDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Coffee</td>
<td  ><input value=0 type='text' name='volCoffeePurchased' id='volCoffeePurchased' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='volCoffeePurchasedDetails' id='volCoffeePurchasedDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Beans</td>
<td  ><input value=0 type='text' name='volBeansPurchased' id='volBeansPurchased' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='volBeansPurchasedDetails' id='volBeansPurchasedDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td colspan='4' >Volume of produce exported (Kgs):</td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Maize</td>
<td  ><input value=0 type='text' name='volMaizeEx' id='volMaizeEx' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='volMaizeExDetails' id='volMaizeExDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Coffee</td>
<td  ><input value=0 type='text' name='volCoffeeEx' id='volCoffeeEx' onkeypress=\"return numbersonly(event, false)\"/></td>
<td  ><textarea name='volCoffeeExDetails' id='volCoffeeExDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Beans</td>
<td><input value=0 type='text' name='volBeansEx' id='volBeansEx' onkeypress=\"return numbersonly(event, false)\"/></td>
<td><textarea name='volBeansExDetails' id='' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td colspan='2'>Number of e-payments received:</td>
<td><input value=0 type='text' name='epayRecieved' id='epayRecieved' onkeypress=\"return numbersonly(event, false)\"/></td>
<td><textarea name='epayRecievedDetails' id='epayRecievedDetails' cols='100' rows='5'></textarea></td>
  </tr>
  
<tr class='evenrow'>
<td colspan='2'>Number of e-payments made:</td>
<td><input value=0 type='text' name='epayMade' id='epayMade' onkeypress=\"return numbersonly(event, false)\"/></td>
<td><textarea name='epayMadeDetails' id='epayMadeDetails' cols='100' rows='5'></textarea></td>
  </tr>
  
<tr class='evenrow'>
<td colspan='4'>Installed/improved storage capacity (M<sup>3</sup>):</td>
</tr>

<tr class='evenrow'>
<td></td>
<td>New</td>
<td><input value=0 type='text' name='storageCapNew' id='storageCapNew' onkeypress=\"return numbersonly(event, false)\"/></td>
<td><textarea name='storageCapNewDetails' id='storageCapNewDetails' cols='100' rows='5'></textarea></td>
</tr>

<tr class='evenrow'>
<td></td>
<td>Improved</td>
<td><input value=0 type='text' name='storageCapImproved' id='storageCapImproved' onkeypress=\"return numbersonly(event, false)\"/></td>
<td><textarea name='storageCapImprovedDetails' id='storageCapImprovedDetails' cols='100' rows='5'></textarea></td>
</tr>



</table>
</td>
</tr>



<tr class='evenrow3'>
<td colspan='22'>
<table  width='100%' border='0' cellspacing='2' cellpadding='2'>

<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.form4.DateSubmission);return false;\" hidefocus=''>
            <input name='DateSubmission' type='text' style='width:200px;'  size='50' value='' id='DateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('form4'),'save_form4');return false;\"/>
            </div>
    </td>
    
  </tr>
</table>";

  $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              
$data.="</td>
</tr>

</table>

";
$data.="</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function save_form4($formValues){
$obj = new xajaxResponse();

$trName=$formValues['trName'];
$vaSupplyChain=$formValues['vaSupplyChain'];
$vaSupplyChainDetails=$formValues['vaSupplyChainDetails'];
$numCbo=$formValues['numCbo'];
$numCboDetails=$formValues['numCboDetails'];
$volMaizePurchased=$formValues['volMaizePurchased'];
$volMaizePurchasedDetails=$formValues['volMaizePurchasedDetails'];
$volCoffeePurchased=$formValues['volCoffeePurchased'];
$volCoffeePurchasedDetails=$formValues['volCoffeePurchasedDetails'];
$volBeansPurchased=$formValues['volBeansPurchased'];
$volBeansPurchasedDetails=$formValues['volBeansPurchasedDetails'];
$volMaizeEx=$formValues['volMaizeEx'];
$volMaizeExDetails=$formValues['volMaizeExDetails'];
$volCoffeeEx=$formValues['volCoffeeEx'];
$volCoffeeExDetails=$formValues['volCoffeeExDetails'];
$volBeansEx=$formValues['volBeansEx'];
$volBeansExDetails=$formValues['volBeansExDetails'];
$epayRecieved=$formValues['epayRecieved'];
$epayRecievedDetails=$formValues['epayRecievedDetails'];
$epayMade=$formValues['epayMade'];
$epayMadeDetails=$formValues['epayMadeDetails'];
$storageCapNew=$formValues['storageCapNew'];
$storageCapNewDetails=$formValues['storageCapNewDetails'];
$storageCapImproved=$formValues['storageCapImproved'];
$storageCapImprovedDetails=$formValues['storageCapImprovedDetails'];
$reportingPeriod=$_SESSION['quarter'];
$CompiledBy=$formValues['CompiledBy'];
$ReviewedBy=$formValues['ReviewedBy'];
$SubmittedBy=$formValues['SubmittedBy'];
$DateSubmission=$formValues['DateSubmission'];


/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

require_once('connections/reportingPeriodValidate.php');
 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$DateSubmission;
//$obj->alert($dateCompared);

if($DateSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
} 





$stmnt_form4="INSERT INTO `tbl_form4_traders`(`tbl_traderId`,
`reportingPeriod`,
`vaSupplyChain`,`vaSupplyChainDetails`,
`numCbo`,`numCboDetails`,
`volMaizePurchased`, `volMaizePurchasedDetails`,
`volCoffeePurchased`, `volCoffeePurchasedDetails`,
`volBeansPurchased`, `volBeansPurchasedDetails`,
`volMaizeEx`, `volMaizeExDetails`,
`volCoffeeEx`, `volCoffeeExDetails`,
`volBeansEx`, `volBeansExDetails`,
`epayRecieved`, `epayRecievedDetails`,
`epayMade`, `epayMadeDetails`,
`storageCapNew`, `storageCapNewDetails`,
`storageCapImproved`, `storageCapImprovedDetails`,
`CompiledBy`,
`ReviewedBy`, `SubmittedBy`,
`DateSubmission`)
VALUES
('".$trName."',
'".$activeQuarter."',
'".$vaSupplyChain."','".$vaSupplyChainDetails."',
'".$numCbo."','".$numCboDetails."',
'".$volMaizePurchased."',
'".$volMaizePurchasedDetails."','".$volCoffeePurchased."',
'".$volCoffeePurchasedDetails."','".$volBeansPurchased."',
'".$volBeansPurchasedDetails."','".$volMaizeEx."',
'".$volMaizeExDetails."','".$volCoffeeEx."',
'".$volCoffeeExDetails."','".$volBeansEx."',
'".$volBeansExDetails."','".$epayRecieved."',
'".$epayRecievedDetails."','".$epayMade."',
'".$epayMadeDetails."','".$storageCapNew."',
'".$storageCapNewDetails."','".$storageCapImproved."',
'".$storageCapImprovedDetails."','".$CompiledBy."',
'".$ReviewedBy."','".$SubmittedBy."',
'".$DateSubmission."')";

 
//$obj->alert($stmnt_form4);
@mysql_query($stmnt_form4)or die("CPMA Error-code 567 because ".http(__line__));
$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_form4','','','','','',1,20);
return $obj;

}
//=====================End of function save_form4===============================================================
//Delete form4
function delete_form5($formValues){
$obj=new xajaxResponse();
		//$obj->alert($formvalues[$unique_column]);
		//$obj->alert(count($formvalues[$unique_column]));

if(count($formValues['tbl_form5_villageagentId'])>0){
for($x=0;$x<count($formValues['tbl_form5_villageagentId']);$x++){
	//$code=$formvalues[$unique_column][$x];
	$sql="DELETE v.* FROM `tbl_form5_villageagent` v WHERE v.`tbl_form5_villageagentId`='".$formValues['tbl_form5_villageagentId'][$x]."' ";
	//$obj->alert($sql);
if($sql<>''){

@mysql_query($sql)or die(QueryManager::http("DEL-3234"));
//$obj->alert("Record successfully Deleted!");
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Village Agent Record successfully Deleted!"));
$obj->call('xajax_view_form5','','',1,20);
return $obj;
}//===================================================================End of function delete Training Form5=======================
function view_form5($vaName,$vaCode,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['vaName']=$vaName;
$_SESSION['vaCode']=$vaCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;
$vaName=($_SESSION['vaName']<>''?$_SESSION['vaName']:$vaName);
$vaCode=($_SESSION['vaCode']<>''?$_SESSION['vaCode']:$vaCode);

$data="<form action=\"".$PHP_SELF."\" name='form5' id='form5' method='post'>
	<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form5();



			$data.="<tr>
				<th colspan='15' ><center>USAID/UGANDA FTF CPM ".strtoupper('Village Agent Data collection Form')."</center></th>
			</tr>";


			//===================data to be displayed=====================
			$data.="<tr>
				<th  rowspan='2' class='first-cell-header'>#</th>
				<th  rowspan='2' >Name of Village Agent</th>
				<th  rowspan='2' >No. of farmers n the supply chain</th>
				<th  rowspan='2' >No. of groups in the supply chain</th>
				<th  colspan='3' >Volume of produce purchased (Kg)</th>
				<th  colspan='3' >Value of inputs sold (UGX)</th>
				<th  rowspan='2' >Value of own resources invested (UGX)</th>
				<th  rowspan='2' >No. of e-payments made</th>
				<th  rowspan='2' >No. of jobs created</th>
				<th  rowspan='2' >Size of<br/> installed/improved <br/>storage capacity</th>
				<th  rowspan='2' >Action</th>
			</tr>

			<tr>
				<th>Maize</th>
				<th>Beans</th>
				<th>Coffee</th>
				<th>Maize</th>
				<th>Beans</th>
				<th>Coffee</th>
			</tr>
		</thead>
		<tbody>";
			   
			$query_string="SELECT w . * , x.`vAgentName`
			FROM `tbl_form5_villageagent` w, `tbl_villageagents` x
			WHERE w.`tbl_villageagentsId` = x.`tbl_villageAgentId` ";
				
			//Filter parameters
			if($trName<>'' and $trCode<>''){
			  $query_string.="
							  AND x.`vAgentName` LIKE '%".$vaName."%'
							  AND x.`vAgentCode` LIKE '%".$vaCode."%' ";
			  }elseif($vaName<>'' and $vaCode==''){
			  $query_string.="AND x.`vAgentName` LIKE '%".$vaName."%' ";
			  }elseif($vaName=='' and $vaCode<>''){
			  $query_string.="AND x.`vAgentCode` LIKE '%".$vaCode."%' ";
			  }
			$query_string.=" ORDER BY w.`tbl_form5_villageagentId` desc";                    
				
				


			//$obj->alert($query_string);
			$query_=mysql_query($query_string)or die(mysql_error());
			/**************
			*paging parameters
			*
			****/
			$max_records = mysql_num_rows($query_);
			//$records_per_page=5;
			$num_pages=ceil($max_records/$records_per_page);
			//$feedback->addAlert($cur_page);
			$offset = ($cur_page-1)*$records_per_page;
			$x=$offset+1;
			$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());

			while($row=mysql_fetch_array($new_query)){

			$data.="<tr>";
				$data.="<td >".$x.".<input type='hidden'  name='tbl_form5_villageagentId[]' id='tbl_form5_villageagentId".$x."' value='".$row['tbl_form5_villageagentId']."'/>
				<input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/></td>";
				$data.="<td>".($row['vAgentName'])."</td>";
				$data.="<td align='right'>".number_format(($row['SC_AchevementsTotal']))."</td>";
				$data.="<td align='right'>".number_format(($row['numGroups_SC']))."</td>";
				$data.="<td align='right'>".number_format(($row['volPurchasedMaize']))."</td>";
				$data.="<td align='right'>".number_format(($row['volPurchasedBeans']))."</td>";
				$data.="<td align='right'>".number_format(($row['volPurchasedCoffee']))."</td>";
				$data.="<td align='right'>".number_format(($row['inputsMaize']))."</td>";
				$data.="<td align='right'>".number_format(($row['inputsBeans']))."</td>";
				$data.="<td align='right'>".number_format(($row['inputsCoffee']))."</td>";
				$data.="<td align='right'>".number_format(($row['valueOwnResources']))."</td>";
				$data.="<td align='right'>".number_format(($row['EpayMade']))."</td>";
				$data.="<td align='right'>".number_format(($row['jobsTotal']))."</td>";
				$storage=(($row['sizeStoreNew'])+($row['sizeStoreImproved']));
				$data.="<td align='right'>".number_format(($storage))."</td>";
				$data.="<td>
				<input type='button' class='formButton2'title='Edit'
				onclick=\"xajax_edit_form5('".$row['tbl_form5_villageagentId']."');return false;\" value='edit' />
				<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form5'),'Delete_form5');return false;\" align='left'>
				</td>";
			$data.="</tr>";
			$x++;
			$n++;
			}
			$data.="".noRecordsFound($new_query,15)."";

			//====================end of displayed data===================
			 
			  


			/*
			*display pages
			*/
			$data.="<tr align='right'>
				<td colspan=15>";

				$p='';
				$num_links=10;
				$startAt_links=($cur_page-5);
				$endAt_links=($cur_page+$num_links);
				$cur_link=$cur_page;


				if($num_pages>1){
				$links=1;
				$append_bar=$p==$num_pages?"":"|";
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form5('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form5('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form5('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form5('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form5('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$cur_page."',this.value)\">";
				$i=1;
				$selected="";
				while($i*10<=$max_records){
				$selected=$i*10==$records_per_page?"SELECTED":"";
				$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
				$i++;
				}

				$sel=$records_per_page>=$max_records?"SELECTED":"";
				$data.="<option value='".$max_records."' ".$sel.">All</option>";
				$data.="</select>";
				$data.="</br>
				</td>
			</tr>
		</tbody>
	</table>
</form>";

$obj->call("hideLoadingDiv");
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------------------End of Function view_form5--------------------------------------------------------
function new_form5($vaName='',$vaCode,$vaAge,$vaGender,$vaDistrict,$vaSubcounty,$quarter='',$Qyear=''){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$_SESSION['vaName']=$vaName;
//$obj->alert($groupSel);

$data.="<form action=\"".$PHP_SELF."\" name='form5' id='form5' method='post'>";
$data.="<table width='100%' border='0' cellpadding='2' cellspacing='2' id='report'>";
 
$data.="<tr class='evenrow'>
    <th colspan='7'><div align='center'>Commodity Production and Marketing Activity VILLAGE AGENT DATA COLLECTION FORM</div></th>
    </tr>";
  
$data.="<tr class='evenrow3'>
<td colspan='22'>
         <table  width='100%' border='0' cellpadding='2' cellspacing='2'>";
          
          //else display this
          $data.="<tr class='evenrow'>
            <td colspan='2'>Name of Village Agent:</td>";
            
            $stmnt_ExDetails="SELECT x . * , d.`districtName`, s.`subcountyName`,z.`zoneName`
                                    FROM `tbl_villageagents` x, `tbl_district` d, `tbl_subcounty` s, `tbl_zone` z
                                    WHERE x.`tbl_villageAgentId`='".$_SESSION['vaName']."'
                                    AND z.`zoneCode`=x.`vAgentRegion`
                                    AND d.`districtCode` = s.`districtCode`
                                    AND x.`vAgentDistrict` = d.`districtCode`
                                    AND x.`vAgentSubcounty` = s.`subcountyCode`
                                    ORDER BY x.`tbl_villageAgentId` ASC
                                    ";
                                    
                                    //$obj->alert($stmnt_ExDetails);
                $Qvillageagent= @mysql_query($stmnt_ExDetails);
                $rowEx=mysql_fetch_array($Qvillageagent);
            
            $data.="<td><select name='vaName' id='vaName' style='width:100px;' onchange=\"xajax_new_form5(this.value,
                                                                                                                            '".$vaCode."',
                                                                                                                            '".$vaAge."',
                                                                                                                            '".$vaGender."',
                                                                                                                            '".$vaDistrict."',
                                                                                                                            '".$vaSubcounty."',
                                                                                                                            '".$vaVillage."'
                                                                                                                            );return false;\" />";
                                                                                            $data.="<option value=''>-select-</option>";
                                                                                            
                                                                                            $stmnt="SELECT x . * , d.`districtName`, s.`subcountyName`,z.`zoneName`
                                                                                                    FROM `tbl_villageagents` x, `tbl_district` d, `tbl_subcounty` s, `tbl_zone` z
                                                                                                    WHERE d.`districtCode` = s.`districtCode`
                                                                                                    AND z.`zoneCode`=x.`vAgentRegion`
                                                                                                    AND x.`vAgentDistrict` = d.`districtCode`
                                                                                                    AND x.`vAgentSubcounty` = s.`subcountyCode`
                                                                                                    ORDER BY x.`vAgentName` ASC";
                                                                                                          $Q= @mysql_query($stmnt);
                                                                                                                              while($row=mysql_fetch_array($Q)){
                                                                                                                              
                                                                                                                              
                                                                                            //$selected=($vaName==$row['tbl_villageAgentId'])?"selected":"";
                                                                                          $data.="<option value=\"".$row['tbl_villageAgentId']."\" ".$selected.">".$row['vAgentName']."</option>";
                                                                                                                             }
                                                                                            $data.="</select></td>";
$data.="<td><div align='right'>Code:</div></td>
            <td><input type='text' name='codeVillageAgent' id='codeVillageAgent' value='".$rowEx['vAgentCode']."' disabled='disabled' class='disabled' style='width:80px;'></td>
            <td>Sex :</td>
            <td>";
            $data.="<input type='text' name='VillageAgentSex' id='VillageAgentSex' value='".$rowEx['vAgentSex']."' disabled='disabled' class='disabled' style='width:80px;'>";
            $data.="</td><td></td><td></td><td></td><td></td><td></td>";
          $data.="</tr>";
          
          
          
          $data.="<tr class='evenrow'>
            <td>Crops:</td>
            <td class='disabled'>";
            $beans=$rowEx['vAgentCropBeans'];
            $coffee=$rowEx['vAgentCropCoffee'];
             
            $maize=$rowEx['vAgentCropMaize'];
            //$obj->alert($maize);
            if($beans=='Yes' AND $coffee=='Yes' AND $maize=='Yes'){$data.="<ol><li>Beans</li><li>Coffee</li><li>Maize</li></ol>";}
            else if($beans=='Yes' AND $coffee=='Yes' AND $maize=='No'){$data.="<ol><li>Beans</li><li>Coffee</li></ol>";}
            else if($beans=='Yes' AND $coffee=='No' AND $maize=='No'){$data.="<ol><li>Beans</li></ol>";}
            else if($beans=='Yes' AND $coffee=='No' AND $maize=='Yes'){$data.="<ol><li>Beans</li><li>Maize</li></ol>";}
            else if($beans=='No' AND $coffee=='Yes' AND $maize=='Yes'){$data.="<ol><li>Coffee</li><li>Maize</li></ol>";}
            $data.="</td>
            <td>Date When recruited as a Village Agent : </td>
            <td>
            <input type='text' name='datedRecruited' id='datedRecruited' value='".$rowEx['vAgentDateRecruited']."' disabled='disabled' class='disabled' style='width:100px; />
            
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        <tr class='evenrow'>
             <td> Region:</td>
             <td><input type='text' name='agentRegion' id='agentRegion' disabled='disabled' class='disabled' value='".$rowEx['zoneName']."' style='width:100px;'/></td>
             <td><div align='right'>District:</div></td>
             <td><input type='text' name='agentDistrict' id='agentDistrict'   disabled='disabled' class='disabled' value='".$rowEx['districtName']."' style='width:100px;'/></td>
             <td><div align='right'>Sub-county:</div></td>
             <td><input type='text' name='agentSubcounty' id='agentSubcounty' disabled='disabled' class='disabled' value='".$rowEx['subcountyName']."' style='width:100px;'/></td>
             <td><div align='right'>Village/LC1:</div></td><td><input type='text' name='agentVillage' id='agentVillage' disabled='disabled' class='disabled' value='".$rowEx['vAgentVillage']."' style='width:100px;' /></td>
          </tr>
	</table>
 	</td>
    </tr>";  
   
$data.="<tr class='evenrow3'>
 	<td colspan='22'>
             <table  width='100%' border='0' cellpadding='2' cellspacing='2'>     
                  <tr class='evenrow'>
                    <th colspan='6' rowspan='2'>Performance Indicator</th>
                    <th>Achievements</th>
                    <th rowspan='2'>Given details</th>
                  </tr>
                  <tr class='evenrow'>
                    <th>Total</th>
                  </tr>
                  <tr class='evenrow'>
                    <th width='24%' colspan='5' rowspan='3'>Number of farmers in the supply chain </th>
                    <th>Female</th>
                    <td><input value=0 type='text' name='supplyChainAchievementsFemale' id='supplyChainAchievementsFemale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('supplyChainAchievementsFemale').value,
                                                                                                                        getElementById('supplyChainAchievementsMale').value,
                                                                                                                        'supplyChainAchevementsTotal');return false;\" onkeypress='return numbersonly(event, false)'></td>
                    <td>
                      <textarea name='supplyChainAchievementsFemaleDetails' id='supplyChainAchievementsFemaleDetails' cols='30' rows='3'></textarea>  </td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Male</th>
                    <td><input value=0 type='text' name='supplyChainAchievementsMale' id='supplyChainAchievementsMale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('supplyChainAchievementsFemale').value,
                                                                                                                        getElementById('supplyChainAchievementsMale').value,
                                                                                                                        'supplyChainAchevementsTotal');return false;\" onkeypress='return numbersonly(event, false)' ></td>
                    <td><textarea name='supplyChainAchievementsMaleDetails' id='supplyChainAchievementsMaleDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Total</th>
                    <td><input value=0 type='text' class='disabled' readonly=readonly name='supplyChainAchevementsTotal' id='supplyChainAchevementsTotal' onkeypress='return numbersonly(event, false)' ></td>
                    <td><textarea name='supplyChainAchevementsTotalDetails' id='supplyChainAchevementsTotalDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='6'>Number of groups in the supply chain</th>
                    <td><input value=0 type='text' name='numGroupsSupplyChain' id='numGroupsSupplyChain' onkeypress='return numbersonly(event, false)' ></td>
                    <td><textarea name='numGroupsSupplyChainDetails' id='numGroupsSupplyChainDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='3'>Number of farmers in groups</th>
                    <th>Female</th>
                    <td><input value=0 type='text' name='numFarmerGroupsFemale' id='numFarmerGroupsFemale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('numFarmerGroupsFemale').value,
                                                                                                                        getElementById('numFarmerGroupsMale').value,
                                                                                                                        'numFarmerGroupsTotal');return false;\" onkeypress=\"return numbersonly(event, false)\"></td>
                    <td><textarea name='numFarmerGroupsFemaleDetails' id='numFarmerGroupsFemaleDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Male</th>
                    <td><input value=0 type='text' name='numFarmerGroupsMale' id='numFarmerGroupsMale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('numFarmerGroupsFemale').value,
                                                                                                                        getElementById('numFarmerGroupsMale').value,
                                                                                                                        'numFarmerGroupsTotal');return false;\" onkeypress=\"return numbersonly(event, false)\"></td>
                    <td><textarea name='numFarmerGroupsMaleDetails' id='numFarmerGroupsMaleDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Total</th>
                    <td><input value=0 type='text' class='disabled' readonly=readonly name='numFarmerGroupsTotal' id='numFarmerGroupsTotal' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='numFarmerGroupsTotalDetails' id='numFarmerGroupsTotalDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='3'>Volume of produce purchased (Kg)</th>
                    <th>Maize</th>
                    <td><input value=0 type='text' name='volPurchasedMaize' id='volPurchasedMaize' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='volPurchasedMaizeDetails' id='volPurchasedMaizeDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Beans</th>
                    <td><input value=0 type='text' name='volPurchasedBeans' id='volPurchasedBeans' onkeypress='return numbersonly(event, false)' ></td>
                    <td><textarea name='volPurchasedBeansDetails' id='volPurchasedBeansDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Coffee</th>
                    <td><input value=0 type='text' name='volPurchasedCoffee' id='volPurchasedCoffee' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='volPurchasedCoffeeDetails' id='volPurchasedCoffeeDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='3'>Value of inputs sold (UGX)</th>
                    <th>Maize</th>
                    <td><input value=0 type='text' name='inputsMaize' id='inputsMaize' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='inputsMaizeDetails' id='inputsMaizeDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Beans</th>
                    <td><input value=0 type='text' name='inputsBeans' id='inputsBeans' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='inputsBeansDetails' id='inputsBeansDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Coffee</th>
                    <td><input value=0 type='text' name='inputsCoffee' id='inputsCoffee' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='inputsCoffeeDetails' id='inputsCoffeeDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='6'>Value of own resources invested in promoted  technologies and models (UGX)</th>
                    <td><input value=0 type='text' name='valueOwnResources' id='valueOwnResources' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='valueOwnResourcesDetails' id='valueOwnResourcesDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='4'>Amount of bank loans received (UGX)</th>
                    <th>Bank</th>
                    <td><input value=0 type='text' name='loanRecievedBank' id='loanRecievedBank' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='loanRecievedBankDetails' id='loanRecievedBankDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>SACCO</th>
                    <td><input value=0 type='text' name='loanRecievedSACCO' id='loanRecievedSACCO' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='loanRecievedSACCODetails' id='loanRecievedSACCODetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>MFI/MDI</th>
                    <td><input value=0 type='text' name='loanRecievedMDI' id='loanRecievedMDI' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='loanRecievedMDIDetails' id='loanRecievedMDIDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>VSLA</th>
                    <td><input value=0 type='text' name='loanRecievedVSLA' id='loanRecievedVSLA' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='loanRecievedVSLADetails' id='loanRecievedVSLADetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='6'>Number of e-payments received</th>
                    <td><input value=0 type='text' name='numEpayRecieved' id='numEpayRecieved' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='numEpayRecievedDetails' id='numEpayRecievedDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='6'>Number of e-payments made</th>
                    <td><input value=0 type='text' name='numEpayMade' id='numEpayMade' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='numEpayMadeDetails' id='numEpayMadeDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='3'>Number of new jobs created (Capture if consistently Employed for four Months and Above)</th>
                    <th>Total</th>
                    <td><input value=0 type='text' class='disabled' readonly=readonly name='jobsTotal' id='jobsTotal' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='jobsTotalDetails' id='jobsTotalDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Male</th>
                    <td><input value=0 type='text' name='jobsMale' id='jobsMale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsFemale').value,
                                                                                                                        getElementById('jobsMale').value,
                                                                                                                        'jobsTotal');return false;\" onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='jobsMaleDetails' id='jobsMaleDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Female</th>
                    <td><input value=0 type='text' name='jobsFemale' id='jobsFemale' onKeyUp=\"xajax_calc_youthApprentice(getElementById('jobsFemale').value,
                                                                                                                        getElementById('jobsMale').value,
                                                                                                                        'jobsTotal');return false;\" onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='jobsFemaleDetails' id='jobsFemaleDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th colspan='5' rowspan='2'><p>Size  of Installed /improved store (M<sup>3</sup>)</p></th>
                    <th>New</th>
                    <td><input value=0 type='text' name='sizeStoreNew' id='sizeStoreNew' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='sizeStoreNewDetails' id='sizeStoreNewDetails' cols='30' rows='3'></textarea></td>
                  </tr>
                  <tr class='evenrow'>
                    <th>Improved</th>
                    <td><input value=0 type='text' name='sizeStoreImproved' id='sizeStoreImproved' onkeypress='return numbersonly(event, false)'></td>
                    <td><textarea name='sizeStoreImprovedDetails' id='sizeStoreImprovedDetails' cols='30' rows='3'></textarea></td>
                  </tr>
        </table>
    </td>
 </tr>"; 
           
$data.="<tr class='evenrow3'>
 <td colspan='22'>
         <table  width='100%' border='0' cellpadding='2' cellspacing='2'>             
              <tr class='evenrow'>
                <td>Compiled by :</td>
                <td><input type='text' name='compiledBy' id='compiledBy'></td>
                <td><div align='right'>Title :</div></td>
                <td><input type='text' name='compiledByTitle' id='compiledByTitle'></td>
                <td><div align='right'>Telephone :</div></td>
                <td><input type='text' name='compiledBytel' id='compiledBytel' value='+256' maxlength='13'></td>
              </tr>
              <tr class='evenrow'>
                <td>Reviewed  by :</td>
                <td><input type='text' name='reviewedBy' id='reviewedBy'></td>
                <td><div align='right'>Title :</div></td>
                <td><input type='text' name='reviewedByTitle' id='reviewedByTitle'></td>
                <td><div align='right'>Telephone :</div></td>
                <td><input type='text' name='reviewedBytel' id='reviewedBytel' value='+256' maxlength='13'></td>
              </tr>
              <tr class='evenrow'>
                <td>Submitted by :</td>
                <td><input type='text' name='submittedBy' id='submittedBy'></td>
                <td><div align='right'>Title :</div></td>
                <td><input type='text' name='submittedByTitle' id='submittedByTitle'></td>
                <td><div align='right'>Telephone :</div></td>
                <td><input type='text' name='submittedBytel' id='submittedBytel' value='+256' maxlength='13'></td>
              </tr>
              <tr class='evenrow'>
                <td>Date of submission:</td>
                <td colspan='5'>
                <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.form5.dateOfSubmission);return false;\" hidefocus=''>
                <input name='dateOfSubmission' type='text' style='width:200px;'  size='50' value='' id='dateOfSubmission' readonly='readonly'/>
                <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
                </a>
                </td>
              </tr>
 	</table>
    </td>
</tr>"; 
 
$data.="<tr class=''>
<td>
<div align='right'>
<input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('form5'),'save_form5');return false;\"/>
</div>
</td>
</tr>";
$data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
$data.="</table>
    </form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function save_form5($formValues){
$obj = new xajaxResponse();


//first create the refrence point for the three form1 tables
//Start of stored procedure
@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`tbl_form5_villageagentId`) as tbl_form5_villageagentId  FROM `tbl_form5_villageagent`";
$Qcheck=@mysql_query($stmnt_check);

//$obj->alert($stmnt_check);
$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$tbl_form5_villageagentId=$Rcheck['tbl_form5_villageagentId'];

//$obj->alert($tbl_form5_villageagentId);

//$newId=str_replace("_f5VA","",$tbl_form5_villageagentId);

$nextform5_villageagentId=($tbl_form5_villageagentId+$y);
$tbl_form5_villageagentId=$nextform5_villageagentId;  
    
}
else
{
//Setting the first Id if all tables are empty
$initialform5_villageagentId=$y;
$tbl_form5_villageagentId=$initialform5_villageagentId;  
}



$thisYear=date('Y');
$nextYear=$thisYear+1;
$activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");

$vaName=$formValues['vaName'];
//$obj->alert($vaName);
$supplyChainAchievementsFemale=$formValues['supplyChainAchievementsFemale'];
$supplyChainAchievementsFemaleDetails=$formValues['supplyChainAchievementsFemaleDetails'];
$supplyChainAchievementsMale=$formValues['supplyChainAchievementsMale'];
$supplyChainAchievementsMaleDetails=$formValues['supplyChainAchievementsMaleDetails'];
$supplyChainAchevementsTotal=$formValues['supplyChainAchevementsTotal'];
//landing for change details


$supplyChainAchevementsTotalDetails=$formValues['supplyChainAchevementsTotalDetails'];
$numGroupsSupplyChain=$formValues['numGroupsSupplyChain'];
$numGroupsSupplyChainDetails=$formValues['numGroupsSupplyChainDetails'];
$volPurchasedMaize=$formValues['volPurchasedMaize'];

//*************new values*******************

$numFarmerGroupsFemale=$formValues['numFarmerGroupsFemale'];
$numFarmerGroupsFemaleDetails=$formValues['numFarmerGroupsFemaleDetails'];
$numFarmerGroupsMale=$formValues['numFarmerGroupsMale'];
$numFarmerGroupsMaleDetails=$formValues['numFarmerGroupsMaleDetails'];
$numFarmerGroupsTotal=$formValues['numFarmerGroupsTotal'];
$numFarmerGroupsTotalDetails=$formValues['numFarmerGroupsTotalDetails'];

//***********End of new values**************

$volPurchasedMaizeDetails=$formValues['volPurchasedMaizeDetails'];
$volPurchasedBeans=$formValues['volPurchasedBeans'];
$volPurchasedBeansDetails=$formValues['volPurchasedBeansDetails'];
$volPurchasedCoffee=$formValues['volPurchasedCoffee'];
$volPurchasedCoffeeDetails=$formValues['volPurchasedCoffeeDetails'];
$inputsMaize=$formValues['inputsMaize'];
$inputsMaizeDetails=$formValues['inputsMaizeDetails'];

$inputsMaize=$formValues['inputsMaize'];
$inputsMaizeDetails=$formValues['inputsMaizeDetails'];


$inputsBeans=$formValues['inputsBeans'];
$inputsBeansDetails=$formValues['inputsBeansDetails'];

$inputsCoffee=$formValues['inputsCoffee'];
$inputsCoffeeDetails=$formValues['inputsCoffeeDetails'];

$valueOwnResources=$formValues['valueOwnResources'];
$valueOwnResourcesDetails=$formValues['valueOwnResourcesDetails'];

$loanRecievedBank=$formValues['loanRecievedBank'];
$loanRecievedBankDetails=$formValues['loanRecievedBankDetails'];

$loanRecievedSACCO=$formValues['loanRecievedSACCO'];
$loanRecievedSACCODetails=$formValues['loanRecievedSACCODetails'];


$loanRecievedMDI=$formValues['loanRecievedMDI'];
$loanRecievedMDIDetails=$formValues['loanRecievedMDIDetails'];

$loanRecievedVSLA=$formValues['loanRecievedVSLA'];
$loanRecievedVSLADetails=$formValues['loanRecievedVSLADetails'];



$epayRecieved=$formValues['numEpayRecieved'];
$epayRecievedDetails=$formValues['numEpayRecievedDetails'];

$epayMade=$formValues['numEpayMade'];
$epayMadeDetails=$formValues['numEpayMadeDetails'];

$jobsTotal=$formValues['jobsTotal'];
$jobsTotalDetails=$formValues['jobsTotalDetails'];

$jobsMale=$formValues['jobsMale'];
$jobsMaleDetails=$formValues['jobsMaleDetails'];

$jobsFemale=$formValues['jobsFemale'];
$jobsFemaleDetails=$formValues['jobsFemaleDetails'];


$sizeStoreNew=$formValues['sizeStoreNew'];
$sizeStoreNewDetails=$formValues['sizeStoreNewDetails'];

$sizeStoreImproved=$formValues['sizeStoreImproved'];
$sizeStoreImprovedDetails=$formValues['sizeStoreImprovedDetails'];

$compiledBy=$formValues['compiledBy'];
$compiledByTitle=$formValues['compiledByTitle'];
$compiledBytel=$formValues['compiledBytel'];

$reviewedBy=$formValues['reviewedBy'];
$reviewedByTitle=$formValues['reviewedByTitle'];
$reviewedBytel=$formValues['reviewedBytel'];

$submittedBy=$formValues['submittedBy'];
$submittedByTitle=$formValues['submittedByTitle'];
$submittedBytel=$formValues['submittedBytel'];
$dateOfSubmission=$formValues['dateOfSubmission'];



$stmnt_form5="INSERT INTO `tbl_form5_villageagent`(`tbl_form5_villageagentId`,`tbl_villageagentsId`,`reportingPeriod`,`SC_AchievementsFemale`,
`SC_AchievementsMale`, `SC_AchevementsTotal`, `numGroups_SC`,

`numFarmerGroupsFemale`,
`numFarmerGroupsMale`,
`numFarmerGroupsTotal`,

`volPurchasedMaize`, `volPurchasedBeans`, `volPurchasedCoffee`,
`inputsMaize`, `inputsBeans`, `inputsCoffee`,
`valueOwnResources`, `loanRecievedBank`, `loanRecievedSACCO`,
`loanRecievedMDI`, `loanRecievedVSLA`, `EpayRecieved`,
`EpayMade`, `jobsTotal`, `jobsMale`,
`jobsFemale`, `sizeStoreNew`,`sizeStoreImproved`, `compiledBy`,
`compiledByTitle`, `compiledBytel`, `reviewedBy`,
`reviewedByTitle`, `reviewedBytel`, `submittedBy`,
`submittedByTitle`, `submittedBytel`, `dateOfSubmission`)
VALUES ('".$tbl_form5_villageagentId."',
'".$vaName."','".$activeQuater."','".$supplyChainAchievementsFemale."','".$supplyChainAchievementsMale."',
'".$supplyChainAchevementsTotal."','".$numGroupsSupplyChain."','".$numFarmerGroupsFemale."',
'".$numFarmerGroupsMale."','".$numFarmerGroupsTotal."','".$volPurchasedMaize."',
'".$volPurchasedBeans."', '".$volPurchasedCoffee."','".$inputsMaize."',
'".$inputsBeans."', '".$inputsCoffee."','".$valueOwnResources."',
'".$loanRecievedBank."', '".$loanRecievedSACCO."','".$loanRecievedMDI."',
'".$loanRecievedVSLA."', '".$epayRecieved."','".$epayMade."',
'".$jobsTotal."', '".$jobsMale."','".$jobsFemale."',
'".$sizeStoreNew."','".$sizeStoreImproved."', '".$compiledBy."',
'".$compiledByTitle."', '".$compiledBytel."', '".$reviewedBy."',
'".$reviewedByTitle."', '".$reviewedBytel."', '".$submittedBy."',
'".$submittedByTitle."', '".$submittedBytel."', '".$dateOfSubmission."')";

//the separation between the first and last statement.

$stmnt_details="INSERT INTO `tbl_form5_details`(`tbl_form5_villageagentId`,`tbl_villageagentsId`,
`SC_AchievementsFemaleDetails`, `SC_AchievementsMaleDetails`, `SC_AchevementsTotalDetails`,
`numGroups_SC_Details`,`numFarmerGroupsFemaleDetails`,`numFarmerGroupsMaleDetails`,
`numFarmerGroupsTotalDetails`,`volPurchasedMaizeDetails`, `volPurchasedBeansDetails`,
`volPurchasedCoffeeDetails`, `inputsMaizeDetails`, `inputsBeansDetails`,
`inputsCoffeeDetails`, `valueOwnResourcesDetails`, `loanRecievedBankDetails`,
`loanRecievedSACCODetails`, `loanRecievedMDIDetails`, `loanRecievedVSLADetails`,
`EpayRecievedDetails`, `EpayMadeDetails`, `jobsTotalDetails`,
`jobsMaleDetails`, `jobsFemaleDetails`, `sizeStoreNewDetails`,`sizeStoreImprovedDetails`,`dateOfSubmission`)
VALUES ('".$tbl_form5_villageagentId."','".$vaName."',
'".$supplyChainAchievementsFemaleDetails."', '".$supplyChainAchievementsMaleDetails."', '".$supplyChainAchevementsTotalDetails."',
'".$numGroupsSupplyChainDetails."','".$numFarmerGroupsFemaleDetails."','".$numFarmerGroupsMaleDetails."',
'".$numFarmerGroupsTotalDetails."','".$volPurchasedMaizeDetails."', '".$volPurchasedBeansDetails."',
'".$volPurchasedCoffeeDetails."', '".$inputsMaizeDetails."', '".$inputsBeansDetails."',
'".$inputsCoffeeDetails."', '".$valueOwnResourcesDetails."', '".$loanRecievedBankDetails."',
'".$loanRecievedSACCODetails."', '".$loanRecievedMDIDetails."', '".$loanRecievedVSLADetails."',
'".$epayRecievedDetails."', '".$epayMadeDetails."', '".$jobsTotalDetails."',
'".$jobsMaleDetails."', '".$jobsFemaleDetails."', '".$sizeStoreNewDetails."', '".$sizeStoreImprovedDetails."','".$dateOfSubmission."')";



/*===================================
*=======code assisting in enforcing==
*strictly active period of===========
*reporting Data entry================
====================================*/

require_once('connections/reportingPeriodValidate.php');
 
/*============================
 *End of code for Active
*reporting period restriction
*==============================*/

//$obj->alert($endDate);
//$obj->alert($startDate);
 
$dateCompared=$dateOfSubmission;
//$obj->alert($dateCompared);

if($dateOfSubmission==NULL){

			$obj->alert("You cannot Continue until the Submission Date is Selected.");
			return $obj;


}elseif ($dateCompared<$startDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif ($dateCompared>$endDate){
    
    $obj->alert("You cannot make a data entry outside \n the current Reporting Period.");
    return $obj;
				
}elseif($dateCompared>$Today){
    
    $obj->alert("You cannot make a data entry for a Date in the future.");
    return $obj;
} 


//$obj->alert($stmnt_form5);
@mysql_query($stmnt_form5)or die("CPMA Error-code 3748 because ".http(__line__));
//$obj->alert($stmnt);
@mysql_query($stmnt_details)or die("CPMA Error-code 3769 because ".http(__line__));


@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
$obj->call("hidemyLoaderDiv"); 
$obj->assign('bodyDisplay','innerHTML',congMsg("Record has been added successfully!"));
$obj->call('xajax_view_form5','','',1,20);
return $obj;

}
//=================================================End of form 5 modules==============================
function delete_exporters_form3($formValues){
$obj=new xajaxResponse();

if(count($formValues['tbl_form3_exportersId'])>0){
for($x=0;$x<count($formValues['tbl_form3_exportersId']);$x++){
	
	//$sql="DELETE e.* FROM `tbl_form3_exporters` e WHERE e.`tbl_form3_exportersId`='".$formValues['tbl_form3_exportersId'][$x]."' ";
	$sql="update tbl_form3_exporters set display='No' where  tbl_form3_exportersId='".$formValues['tbl_form3_exportersId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a record on form3 Exporters tbl_form3_exportersId->".$formValues['tbl_form3_exportersId'][$x]."";  
$description=($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".http(__line__));
@mysql_query($stmnt) or die(QueryManager::http("DEL-7411"));

//@mysql_query($sql)or die("DEL-27 because ".http(__line__));
@mysql_query($sql) or die(QueryManager::http("DEL-7414"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form3 Exporter Record successfully Deleted!"));
$obj->call('xajax_view_form3','','','','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete_exporters_form3-----------------------------------------
function view_form3($region,$reporting_period,$cpma_year,$exName,$exCode,$cur_page=1,$records_per_page=20){

$obj =new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}


//$obj->alert(trim($reporting_period));
$n=1;
$inc=1;

$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['exName']=$exName;
$_SESSION['exCode']=$exCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
//$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$exName=($_SESSION['exName']<>''?$_SESSION['exName']:$exName);
$exCode=($_SESSION['exCode']<>''?$_SESSION['exCode']:$exCode);



$data="<form action=\"".$_SERVER['PHP_SELF']."\" name='form3' id='form3' method='post'>
<table width='100%' cellspacing='1' id='report'>".filter_form3();
$data.="</tr>";
$data.="<tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>";
$data.="</tr>";


$data.="<tr CLASS='evenrow'>
<th colspan='15' ><center>EXPORTER AND PROCESSOR DATA DETAILS</center></th>
</tr>";

$data.="<tr>
    <td class='offwhite' COLSPAN='11' align='left'><input type='button' class='formButton2'title='Edit'  onclick=\"xajax_edit_exporters_form3(xajax.getFormValues('form3'));return false;\" value='edit' /> ";
        $data.=" <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form3'),'Delete_exporters_form3');return false;\" align='left'></td>";
    $data.="</td>
</tr> </table>"; 



 //===================data to be displayed=====================

$data.="<tr class=''>
  <td colspan=8>";
  
  switch(trim($cpma_year)){
      case trim('Project start up'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Apr - Sep') 
      and `w`.`year` in (2013)";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
	  
	  case trim('CPMA Year One'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2013,2014)";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Two'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2014,2015)";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Three'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      case trim('CPMA Year Four'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;      
      
      case trim('CPMA Year Five(Activity close out)'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2017,2018)";
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
      
      default:
      break;
    }
    
	
	
    switch(trim($reporting_period)){
      
	  case trim('Project start up'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2013)
      ";
      $monthsArray=array('4','5','6','7','8','9');
      break;
      
      case trim('Oct 2013 - Mar 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2013,2014)
      ";
      $monthsArray=array('10','11','12','1','2','3');
      break;
      
      case trim('Apr 2014 - Sep 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
	  and `w`.`year` in (2014)
      ";
      $monthsArray=array('4','5','6','7','8','9');
	   
      break;
      
      case trim('Oct 2014 - Mar 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2014,2015)
      ";
      $monthsArray=array('10','11','12','1','2','3');
      break;
      
      case trim('Apr 2015 - Sep 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2015)
      ";
      $monthsArray=array('4','5','6','7','8','9');
      break;
      
      case trim('Oct 2015 - Mar 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2015,2016)
      and `w`.`DateSubmission` between ('2015-10-01') and ('2016-03-31')
      ";
      $monthsArray=array('10','11','12','1','2','3');
      break;
      
      case trim('Apr 2016 - Sep 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2016)
      ";
      $monthsArray=array('4','5','6','7','8','9');
      break;
      
      case trim('Oct 2016 - Mar 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2016,2017)
      and `w`.`DateSubmission` between ('2016-10-01') and ('2017-03-31')
      ";
      $monthsArray=array('10','11','12','1','2','3');
      break;
      
      case trim('Apr 2017 - Sep 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2017)
      ";
      $monthsArray=array('4','5','6','7','8','9');
      break;
      
      case trim('Oct 2017 – Mar 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2017,2018)
      ";
      $monthsArray=array('10','11','12','1','2','3');
      break;
      
      case trim('Apr 2018 – May 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2018)
      ";
      $monthsArray=array('4','5','6','7','8','9');
      break;
      
      default:
      $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
      break;
    }

    

   // $obj->alert($reporting_period);

 
//Mysql query to return Results from uploaded Excel sheet
  $query_string="SELECT `w` . * ,
  case
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2013) 
  then 'Apr 2013 - Sep 2013'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2013,2014) 
  then 'Oct 2013 - Mar 2014'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2014) 
  then 'Apr 2014 - Sep 2014'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2014,2015) 
  then 'Oct 2014 - Mar 2015'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2015) 
  then 'Apr 2015 - Sep 2015'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2015,2016) 
  then 'Oct 2015 - Mar 2016'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2016) 
  then 'Apr 2016 - Sep 2016'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2016,2017) 
  then 'Oct 2016 - Mar 2017'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2017) 
  then 'Apr 2017 - Sep 2017'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2017,2018) 
  then 'Oct 2017 - Mar 2018'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2018) 
  then 'Apr 2018 - May 2018'
  
  else `w`.`reportingPeriod`
  end 
  as  `reportingPeriod_cleaned`,
      `w`.`tbl_form3_exportersId`,
    `w`.`tbl_exporterId`,
    `w`.`reportingPeriod`,
    `w`.`year`,
    `w`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `w`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `w`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `w`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `w`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `w`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `w`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `w`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `w`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `w`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `w`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `w`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `w`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `w`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `w`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `w`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `w`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `w`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `w`.`exTradersSupplyChainDetails`,
    `w`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
    `w`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
    `w`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
    `w`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
    `w`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
    `w`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
    `w`.`exUnionsSupplyChainDetails`,
    `w`.`volMaizePurchasedDetails`,
    `w`.`volMaizeExDetails`,
    `w`.`volCoffeeExDetails`,
    `w`.`volBeansExDetails`,
    `w`.`epayRecievedDetails`,
    `w`.`epayMadeDetails`,
    `w`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `w`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `w`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `w`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `w`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `w`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `w`.`volBeansExUgx`, `w`.`volBeansExUgxDetails`,
    `w`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `w`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `w`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `w`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `w`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `w`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `w`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `w`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `w`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `w`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `w`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `w`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `w`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `w`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `w`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `w`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `w`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `w`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `w`.`volCoffeeExUgx`,`w`.`volCoffeeExUgxDetails`,
    `w`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `w`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `w`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `w`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `w`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `w`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `w`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `w`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `w`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `w`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `w`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `w`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `w`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `w`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `w`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `w`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `w`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `w`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `w`.`volMaizeExUgx`, `w`.`volMaizeExUgxDetails`,
    `w`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `w`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `w`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `w`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `w`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `w`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `w`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `w`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `w`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `w`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `w`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `w`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`,
    `x`.`exporterName`,
  `x`.`exporterDob`, 
  `x`.`exporterCode`,
  `x`.`exporterSex`, 
  `x`.`exporterDistrict`,
  `x`.`exporterSubcounty`,
  `x`.`exporterVillage`,
   IF(left((`x`.`exporterTel`),8) = '+2560000', '-', (`x`.`exporterTel`)) as exporterTel,
  `x`.`exporterCropBeans`,
  `x`.`exporterCropCoffee`,
  `x`.`exporterCropMaize`,
  `d`.`districtName`,
  `s`.`districtCode`,
  `s`.`subcountyCode`,
  `s`.`subcountyName`
  FROM 
  `tbl_form3_exporters` as `w`,
  `tbl_exporters` as `x`,
  `tbl_district` as `d`,
  `tbl_subcounty` as `s`
  WHERE `w`.`tbl_exporterId` = `x`.`tbl_exportersId`
  AND `d`.`districtCode`=`x`.`exporterDistrict`
  AND `d`.`Display`='Yes' 
  AND `d`.`districtCode`=`s`.`districtCode`
  AND `s`.`subcountyCode`=`x`.`exporterSubcounty`
  AND `s`.`Display`='Yes' 
  AND `w`.`display`='Yes' ";
  
  //$reporting_period=(!empty($cpma_year))?'':$reporting_period;
  //$cpma_year=(!empty($reporting_period))?'':$cpma_year;
  $region=(!empty($region))?" AND x.`exporterRegion` LIKE '%".$region."%' ":"";
  $reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
  $cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
  $exName=(!empty($exName))?" AND x.`tbl_exportersId` = '".$exName."' ":"";
  $exCode=(!empty($exCode))?" AND x.`exporterCode` LIKE '%".$exCode."%' ":"";
  $query_string.=$region.$reporting_period.$cpma_year.$exName.$exCode;
  $query_string.=" ORDER BY w.`tbl_form3_exportersId` DESC";
  
//$obj->alert($query_string);
  $x=1;
  
  //$query_=mysql_query($query_string)or die(mysql_error());
   $query_=mysql_query($query_string)or die(mysql_error());
   
   /**************
   *paging parameters
   *
   ****/

   
   $data.="<table style='background-color:#EBEBEB;' border='0' cellspacing='1' cellpadding='0' width='100%'>
  <tr>
  <th colspan='0'rowspan='2' style='min-width: 50px;'>#</th>
  <th rowspan='2'>Name of Business/Exporter</th>
  <th rowspan='2'>Reporting Period</th>
    <th colspan='2' rowspan='2' class='largest-cell-header'>Performance Indicators</th>";

    switch(true){

   	case (!empty($cpma_year)) and (empty($reporting_period)):
   			 $data.="<th colspan='13' >Achievements</th>";
   		break;
   	case (empty($cpma_year)) and (!empty($reporting_period)):
   		
   			 $data.="<th colspan='7' >Achievements</th>";
   		break;

   	case (!empty($cpma_year)) and (!empty($reporting_period)):
   			 $data.="<th colspan='7' >Achievements</th>";
   		break;
   	default:
   		 $data.="<th colspan='13' >Achievements</th>";
   		break;
   } 

  

  $data.="<th rowspan='2'>Given details</th>
  </tr><tr>";

                      
foreach ($monthsArray as $key) {
  $month= __month__coverter($key); 
  $result = substr($month, 0, 3); 
  $data.="<th >".$result."</th>"; 
  }
  $data.="<th >Total</th>";
  $data.="</tr>";





   $max_records = mysql_num_rows($query_);
   $num_pages=ceil($max_records/$records_per_page);
   $offset = ($cur_page-1)*$records_per_page;
   $x=$offset+1;
   
   $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
 //s$obj->alert($new_query);
  while($row=mysql_fetch_array($new_query)){
    $divVwDisaggregation="vwDisaggregation".$row['tbl_form3_exportersId'];
    //$color=$x%2==1?"evenrow3":"evenrow";
    // $data.="<tr class='alternating_rows'>";
                    $data.="<td rowspan='14' >".$x.".<input name='loopkey[]' type='hidden' id='loopkey' value='1'/>
       <input name='tbl_form3_exportersId[]' type='checkbox' id='tbl_form3_exportersId".$x."' size='25' value='".$row['tbl_form3_exportersId']."'/></td>";
                $data.="<td rowspan='14' style='background-color:#e7e7e7'>".$row['exporterName']."</td>";
                $data.="<td rowspan='14'>".$row['reportingPeriod_cleaned']."</td>";
       
      
    // $data.="</tr>";
    
     /* $obj->alert('tbl_form3_exportersId->'.$row['tbl_form3_exportersId'].' year->'.$row['year'].' exporterName->'.$row['exporterName'].' reportingPeriod->'.$row['reportingPeriod']);  */
   switch(true){

   	case (!empty($cpma_year)) and (empty($reporting_period)):
   		 $data.=view_frm3ExDisaggregation('All',$row['tbl_form3_exportersId'],$row['year'],($row['exporterName']),($row['reportingPeriod']),$divVwDisaggregation);

   		break;
   	case (empty($cpma_year)) and (!empty($reporting_period)):
   			$data.=data_form3($row);
   		break;

   	case (!empty($cpma_year)) and (!empty($reporting_period)):
   			$data.=data_form3($row);
   		break;
   	default:
   		 $data.=view_frm3ExDisaggregation('All',$row['tbl_form3_exportersId'],$row['year'],($row['exporterName']),($row['reportingPeriod']),$divVwDisaggregation);
   		break;
   } 
    
   
   
      $data.="<tr>
    <td colspan='21' style='height:5px;background-color:#FFFFFF'></td>
    </tr>";
    
  
  $x++;
$n++;
}

$data.="".noRecordsFound($new_query,10)."";

$data.="</table>";

$data.="<tr>
    <td class='offwhite' COLSPAN='11' align='left'><input type='button' class='formButton2'title='Edit'  onclick=\"xajax_edit_exporters_form3(xajax.getFormValues('form3'));return false;\" value='edit' /> ";
        $data.=" <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form3'),'Delete_exporters_form3');return false;\" align='left'></td>";
    $data.="</td>
</tr>";		
		


/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form3('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['exName']."','".$_SESSION['exCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_form3('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['exName']."','".$_SESSION['exCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form3('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['exName']."','".$_SESSION['exCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_form3('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['exName']."','".$_SESSION['exCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form3('".$_SESSION['region']."','".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."','".$_SESSION['exName']."','".$_SESSION['exCode']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td>
	</tr>";
	
 
        
   $data.="</tr>
   </table>
   </form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
}

function view_frm3ExDisaggregation($value,$tbl_form3_exportersId,$Year,$exporterName,$reportingPeriod,$divVwDisaggregation){
$obj=new xajaxResponse();
$rp=$_SESSION['quarter'];
//$reportingPeriod=substr("".$rp."",0,9);
$recordId=$tbl_form3_exportersId;
$nameOfExporter=$exporterName;
//$obj->alert($reportingPeriod);
//41


  
    $query_string="SELECT 
    `x`.`tbl_form3_exportersId`,
    `x`.`tbl_exporterId`,
    `x`.`reportingPeriod`,
    `x`.`year`,
    `x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `x`.`exTradersSupplyChainDetails`,
    `x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
    `x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
    `x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
    `x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
    `x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
    `x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
    `x`.`exUnionsSupplyChainDetails`,
    `x`.`volMaizePurchasedDetails`,
    `x`.`volMaizeExDetails`,
    `x`.`volCoffeeExDetails`,
    `x`.`volBeansExDetails`,
    `x`.`epayRecievedDetails`,
    `x`.`epayMadeDetails`,
    `x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
    `x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
    `x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
    `x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
    FROM `tbl_form3_exporters` as `x`
    WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
    and `x`.`reportingPeriod`='".$reportingPeriod."'";


        $query_string1="SELECT 
    `x`.`tbl_form3_exportersId`,
    `x`.`tbl_exporterId`,
    `x`.`reportingPeriod`,
    `x`.`year`,
    `x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `x`.`exTradersSupplyChainDetails`,
    `x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
    `x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
    `x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
    `x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
    `x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
    `x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
    `x`.`exUnionsSupplyChainDetails`,
    `x`.`volMaizePurchasedDetails`,
    `x`.`volMaizeExDetails`,
    `x`.`volCoffeeExDetails`,
    `x`.`volBeansExDetails`,
    `x`.`epayRecievedDetails`,
    `x`.`epayMadeDetails`,
    `x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
    `x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
    `x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
    `x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
    FROM `tbl_form3_exporters` as `x`
    WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Oct - Mar'";


            $query_string2="SELECT 
    `x`.`tbl_form3_exportersId`,
    `x`.`tbl_exporterId`,
    `x`.`reportingPeriod`,
    `x`.`year`,
    `x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
    `x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
    `x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
    `x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
    `x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
    `x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
    `x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
    `x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
    `x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
    `x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
    `x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
    `x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
    `x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
    `x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
    `x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
    `x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
    `x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
    `x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
    `x`.`exTradersSupplyChainDetails`,
    `x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
    `x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
    `x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
    `x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
    `x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
    `x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
    `x`.`exUnionsSupplyChainDetails`,
    `x`.`volMaizePurchasedDetails`,
    `x`.`volMaizeExDetails`,
    `x`.`volCoffeeExDetails`,
    `x`.`volBeansExDetails`,
    `x`.`epayRecievedDetails`,
    `x`.`epayMadeDetails`,
    `x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
    `x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
    `x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
    `x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
    `x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
    `x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
    `x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
    `x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
    `x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
    `x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
    `x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
    `x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
    `x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
    `x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
    `x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
    `x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
    `x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
    `x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
    `x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
    `x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
    `x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
    `x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
    `x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
    `x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
    `x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
    `x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
    `x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
    `x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
    `x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
    `x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
    `x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
    `x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
    `x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
    `x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
    `x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
    `x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
    `x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
    `x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
    `x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
    `x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
    `x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
    `x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
    `x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
    `x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
    `x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
    `x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
    `x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
    `x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
    `x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
    `x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
    `x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
    `x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
    `x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
    `x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
    `x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
    `x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
    `x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
    FROM `tbl_form3_exporters` as `x`
    WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Apr - Sep'";


    switch($value){
                case "Apr - Sep":
                $query=mysql_query($query_string)or die(mysql_error());
                $row=mysql_fetch_array($query);
                $data.="<td rowspan='14' >".$x.".<input name='loopkey[]' type='hidden' id='loopkey' value='1'/>
       <input name='tbl_form3_exportersId[]' type='checkbox' id='tbl_form3_exportersId".$x."' size='25' value='".$row['tbl_form3_exportersId']."'/></td>";
                $data.="<td rowspan='14' style='background-color:#e7e7e7'>".$nameOfExporter."</td>";
                $data.="<td rowspan='14'>".$reportingPeriod." ".$Year."</td>";
                $data.=data_form3($row);
                break;
                
                case "Oct - Mar":
                $query=mysql_query($query_string)or die(mysql_error());
                $row=mysql_fetch_array($query);
                $data.="<td rowspan='14' style='background-color:#e7e7e7'>".$nameOfExporter."</td>";
                $data.="<td rowspan='14'>".$reportingPeriod." ".$Year."</td>";
                $data.=data_form3($row);
                break;

                case 'All':
                	# code...
                $query1=mysql_query($query_string1)or die(mysql_error());
                $query2=mysql_query($query_string2)or die(mysql_error());
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form3All($row,$row2);
                break;
                
                default:
                $query1=mysql_query($query_string1)or die(mysql_error());
                $query2=mysql_query($query_string2)or die(mysql_error());
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form3All($row,$row2);
                break;
              }


  
$_SESSION['divVwDisaggregationExporter']=$data;
 
//$obj->assign($divVwDisaggregation,'innerHTML',$data);
return $data;     
}

function data_form3($row){
    $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of Traders/DC in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
  $data.="<td>".$row['exTradersSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
     $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
    $data.="<td align='right'>".$totUSC."</td>";
  $data.="<td>".$row['exUnionsSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";
    $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$row['volMaizeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$row['volCoffeeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";
    $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$row['volBeansExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";
    $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$row['epayRecievedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
  $data.="<td>".$row['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;

}

function data_form3All($row,$row2){

    $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of Traders/DC in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']+$row2['exTSCFirstQM']+$row2['exTSCSecondQM']+$row2['exTSCThirdQM']+$row2['exTSCFourthQM']+$row2['exTSCFifthQM']+$row2['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
    $data.="<td>".$row['exTradersSupplyChainDetails']."\n".$row2['exTradersSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
    $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']+$row2['exUSCFirstQM']+$row2['exUSCSecondQM']+$row2['exUSCThirdQM']+$row2['exUSCFourthQM']+$row2['exUSCFifthQM']+$row2['exUSCSixthQM']);
    $data.="<td align='right'>".$totUSC."</td>";
    $data.="<td>".$row['exUnionsSupplyChainDetails']."\n".$row2['exUnionsSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']+ $row2['volMPFirstQM']+$row2['volMPSecondQM']+$row2['volMPThirdQM']+$row2['volMPFourthQM']+$row2['volMPFifthQM']+$row2['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."\n".$row2['volMaizePurchasedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSixthQM'])."</td>";
   $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']+$row2['volCPFirstQM']+$row2['volCPSecondQM']+$row2['volCPThirdQM']+$row2['volCPFourthQM']+$row2['volCPFifthQM']+$row2['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']+$row2['volBPFirstQM']+$row2['volBPSecondQM']+$row2['volBPThirdQM']+$row2['volBPFourthQM']+$row2['volBPFifthQM']+$row2['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']+$row2['volMEFirstQM']+$row2['volMESecondQM']+$row2['volMEThirdQM']+$row2['volMEFourthQM']+$row2['volMEFifthQM']+$row2['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$row['volMaizeExDetails']."\n".$row2['volMaizeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']+$row2['volMEUgxFirstQM']+$row2['volMEUgxSecondQM']+$row2['volMEUgxThirdQM']+$row2['volMEUgxFourthQM']+$row2['volMEUgxFifthQM']+$row2['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM'] + $row2['volCEFirstQM']+$row2['volCESecondQM']+$row2['volCEThirdQM']+$row2['volCEFourthQM']+$row2['volCEFifthQM']+$row2['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$row['volCoffeeExDetails']."\n".$row2['volCoffeeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSixthQM'])."</td>";
     $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM'] + $row2['volCEUgxFirstQM']+$row2['volCEUgxSecondQM']+$row2['volCEUgxThirdQM']+$row2['volCEUgxFourthQM']+$row2['volCEUgxFifthQM']+$row2['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM'] + $row2['volBEFirstQM']+$row2['volBESecondQM']+$row2['volBEThirdQM']+$row2['volBEFourthQM']+$row2['volBEFifthQM']+$row2['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$row['volBeansExDetails']."\n".$row2['volBeansExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='white1'>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM'] + $row2['volBEUgxFirstQM']+$row2['volBEUgxSecondQM']+$row2['volBEUgxThirdQM']+$row2['volBEUgxFourthQM']+$row2['volBEUgxFifthQM']+$row2['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSixthQM'])."</td>";
     $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM'] + $row2['epayRFirstQM']+$row2['epayRSecondQM']+$row2['epayRThirdQM']+$row2['epayRFourthQM']+$row2['epayRFifthQM']+$row2['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$row['epayRecievedDetails']."\n".$row2['epayRecievedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr class='bluish'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']+ $row2['epayMFirstQM']+$row2['epayMSecondQM']+$row2['epayMThirdQM']+$row2['epayMFourthQM']+$row2['epayMFifthQM']+$row2['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
    $data.="<td>".$row['epayMadeDetails']."\n".$row2['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;
}
//-----------------------------------End of Function view_form3--------------------------------------------------------
function close_form3($data='',$div){
$object=new xajaxResponse();
$object->assign($div,'innerHTML',$data);

return $object;
}

function viewQualiatativeTSOEntered($quarter,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['Qquarter']='';
$_SESSION['Qyear']='';

$_SESSION['intervention']='';
$_SESSION['Qquarter']=$quarter;
$_SESSION['Qyear']=$Qyear;
$_SESSION['intervention']=$intervention;
$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0'  width='100%' border='0'> ".filter_tsoQualitative()." 
	  <tr class='evenrow'>
 
<td colspan=8><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TSOqualitativeReporting(xajax.getFormValues('organization'),'".$_SESSION['quarter']."');return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_QualiatativeTSOEntered','');return false;\" value='Delete' class='redhdrs' /></td>

	 <td></td>
<td></td>

   

  </tr><tr>
<th colspan='10' ><div align='center' class=''>TECHNICAL SERVICES ORGANIZATIONS (TSO) QUALITATIVE REPORT</div></th>
</tr>
  
  <tr>
	  <th ><b class=''>NO.</th><th><b class=''>SELECT</th>
	  <th width='' colspan=''><strong class=''>INTERVENTION NAME</strong></th>
	 
<th width='' colspAN='3'><strong class=''>PLANNED ACTIVITIES</strong></th>

		<th width=''><strong class=''>IMPLEMENTATION</strong></th>
		<th width=''><strong class=''>ACHIEVEMENTS</strong></th>
		<th width=''><strong class=''>DEVIATIONS</strong></th>
		
	
		<th  width=''><strong class=''>ACTION</strong></th>
		

  </tr>";

$query_string="select t.narrative_id,t.org_code,o.orgName,t.intervention,l.code,l.codeName as interventionName,t.reportingPeriod,t.year,t.plannedActivities,t.implementation,t.achievements,t.deviations,t.challenges,
t.next_quarter,t.lessons,t.report,t.report2,t.updatedby,t.display from tbl_tsoqualitative t inner join tbl_organization o on(o.org_code=t.org_code) inner join tbl_lookup l on(l.code=t.intervention) where classCode='5' and t.display='Yes' and l.codeName like '".$_SESSION['intervention']."%' and o.org_code='".$_SESSION['org_code']."'  and t.year like '".$_SESSION['Qyear']."%' and t.reportingPeriod like '".$_SESSION['Qquarter']."%'  order by o.org_code,t.year,t.reportingPeriod Asc";
#$obj->addAlert($query_string);

$query_=mysql_query($query_string)or die(mysql_error());

	  while($row=mysql_fetch_array($query_)){

	
	  $color=$n%2==1?"evenrow3":"white1";
 $data.="<tr class=$color '>
	 <td>".$inc++."</td>
	 <td><input name='narrative_id[]' id='narrative_id' type='checkbox' value='".$row['narrative_id']."' />
	 <input type='hidden' name='loopkey[]' id='loopkey' value='1'></td>
	 <td>".mysql_real_escape_string($row['interventionName'])."</td>
	 
	 <td COLSPan='3' >".$row['plannedActivities']."</td>
	 <td>".$row['implementation']."</td>
	 <td>".$row['achievements']."</td>
	  <td>".$row['deviations']."</td> 
	  

<td><input name='details' type='button' class='formButton2'   id='button' onclick=\" xajax_TSO_Details('".$row['narrative_id']."');\" value='Details' /></td>
	  </tr>";
	  $n++;
	  }
$data.="<tr class='evenrow'>
 
<td colspan=8><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TSOqualitativeReporting(xajax.getFormValues('organization'),'".$_SESSION['quarter']."');return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_QualiatativeTSOEntered','');return false;\" value='Delete' class='redhdrs' /></td>

	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#---------------------staff reporting--------------------------------
function view_TrainingParticipants($organization,$quarter,$year){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['region']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['staffyear']=$year;
$_SESSION['staffQuarter']=$quarter;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report'>";
 
  $data.="
  
  <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>
  
  
	  
	 
<tr class='evenrow3'>
  <td width='30%' colspan='12'><div id='' style='float:right;'><input type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_TrainingParticipants('');return false;\" /> |  <a href='export_to_excel_word.php?linkvar=Export Training Participants&&organization=".$organization."&&quarter=".$quarter."&&year=".$year."&&format=excel' > <input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='Export to Excel' /></a> | <a href='print_version2.php?linkvar=Print Training Participants&&organization=".$organization."&&quarter=".$quarter."&&year=".$year."&&format=Print' target='_blank'><input type='button' class='formButton2'   id='button' value='Print Version'  /> </a></td></tr>
	<tr class='evenrow3'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Organization</strong></div></td>
  <td colspan=9><select name='project' style='width:300px;'  onchange=\"xajax_view_TrainingParticipants(this.value,'','');return false;\"><option value=''>-ALL-</option>";
		  $sql="select * from tbl_organization order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(4371)); 
		  while($ROW=mysql_fetch_array($query)){
		$selected=($organization==$ROW['org_code'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['org_code']."\" ".$selected." >".substr($ROW['orgName'],0,500)."</option>";}
		  $data.="</select></td>
</tr><tr class='evenrow'>
 
<td colspan='12'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TrainingParticipants(xajax.getFormValues('projects'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>

	
</tr>
 <tr CLASS='evenrow'>
 
<th colspan='12' ><center>PARTICPANTS TRAINING  RECORDs</center></th>
	
  </tr>
	
	
	<tr>
	<th colspan=2>NO</th>
	<th>organization</th>
	<th>DISTRICT</th>
	<th>subcounty</th>
	<th>parish</th>
	<th>VILLAGE/LOCATION</th>
	<th>training AREA</th>
	<th>trainees</th>
	<th>naME</th>
	<th>SEX</th>
	<th>NUMBER OF TIMES<br> TRAINED ON <br>THIS TOPIC</th>
	</tr>";
	$sql="select t.`training_id`, t.`org_code`,o.orgName, t.`village`, t.`semi_annual`, t.`year`, t.`training_topic`,c.topic, t.`trainer`, 
	 t.`typeofparticipants`, t.`name_oftrainee`,tr.Name as NameofParticipants, t.`gender`, t.`number_of_times`,l.codeName, t.`organizing_date`, t.`updatedby`, t.`status`, t.`district`, d.districtName,
	 t.`subcounty`,s.subcountyName, t.`parish`,p.ParishName, t.`task`,t.village 
	 from tbl_training t left join tbl_trainees tr on(tr.code=t.typeofparticipants)
	 left join tbl_district d on(d.districtCode=t.district)
	 
	 left join tbl_subcounty s on (s.subcountyCode=t.subcounty)
	 left join tbl_parish p on(p.parishCode=t.parish)
	 left join tbl_organization o on(o.org_code=t.org_code)
	 left join tbl_trainingtopic c on(c.code=t.training_topic)
	 left join tbl_trainees e on(e.code=t.typeofparticipants)
	 left join tbl_lookup l on(l.code=t.number_of_times)
	 where t.status like 'Yes%' && t.org_code like '".$organization."%'";
	 $query=mysql_query($sql)or die(http("PR-310"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
<td>".$row['orgName']."</td>
<td>".$row['districtName']."</td>
<td>".$row['subcountyName']."</td>
<td align='left'>".$row['ParishName']."</td>
 <td align='left'>".$row['village']."</td>
 <td align='left'>".$row['topic']."</td>
 <td align='left'>".$row['NameofParticipants']."</td>
  <td align='left'>".$row['name_oftrainee']."</td>
  <td align='left'>".$row['gender']."</td>
  <td align='left'>".$row['codeName']."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,18)."<tr class='evenrow'>
 <td colspan='12'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TrainingParticipants(xajax.getFormValues('projects'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>

	
</tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function ViewCFTechnicalTrainingActivities($region,$district,$indicator,$subcomponent,$output,$year,$quarter,$indicatorCode,$indicator,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();


$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' cellspacing='1'>";
 
  $data.=filter_CFTechnicalTrainingActivities('ViewCFTechnicalTrainingActivities');
	  if($_GET['action']=='Reports'){
 $data.="";
 }else{
$data.="<tr class='evenrow'>
<td colspan='14'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_CFTechnicalTrainingActivities(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' /> <input type='hidden' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>
 </tr>";
 }
 
 $data.="<tr CLASS='evenrow'>
 
<th colspan='14' ><center>TECHNICAL TRAINING ACTIVITIES</center></th>
	
  </tr>
	
	
	<tr><th colspan='2' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='1'>DISTRICT</th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF Herbicise Safety and Use</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='2'><center>Tree Planting</center></th>
	<th rowspan='2'>Action</th>
		</tr>
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	</tr>";  
	
	$querytrainees=mysql_query("select * from tbl_trainees order by code asc")or die(http("PR-403"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
$data.="<tr class='evenrow'>

  <td colspan='14'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewCFTechnicalTrainingActivities($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-413"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
<td colspan='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
<td>".$row['MaleHoebasin']."</td>
<td align='right'>".$row['FemaleHoebasin']."</td>
 <td align='right'>".$row['MaleADPRipping']."</td>
 <td align='right'>".$row['FemaleADPRipping']."</td>
 <td align='right'>".$row['MaleMechanizedRipping']."</td>
  <td align='right'>".$row['FemaleMechanizedRipping']."</td>
  <td align='right'>".$row['MaleHerbicide']."</td>
  <td align='right'>".$row['FemaleHerbicide']."</td>
   <td align='right'>".$row['MaleTreePlanting']."</td>
   <td align='right'>".$row['FemaleTreePlanting']."</td>
 <td  align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_TechnicalTraining('".$row['year']."',
  
  '".$row['semi_annual']."','".$row['zone']."','".$row['district']."','".$row['typeofparticipants']."','".$row['training_topic']."','tbl_technicaltraining','delete_ViewCFTechnicalTrainingActivities');return false;\" ></td>
  </tr>";
$n++;
  }
  
  $sqlTotal=QueryManager::ViewCFTechnicalTrainingActivitiesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']); 
  
  $queryTotal=Execute($sqlTotal) or die(http("PR-446"));
		$rowTotal=FetchRecords($queryTotal);
  
   $data.="<tr class='$color'>
<td colspan='3'><strong>Total ".$rowparticipants['Name']."</strong></td>
<td><strong>".$rowTotal['MaleHoebasin']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleHoebasin']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleADPRipping']."</strong></td>
 <td align='right'><strong>".$rowTotal['FemaleADPRipping']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleMechanizedRipping']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleMechanizedRipping']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleHerbicide']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleHerbicide']."</strong></td>
   <td align='right'><strong>".$rowTotal['MaleTreePlanting']."</strong></td>
   <td align='right'><strong>".$rowTotal['FemaleTreePlanting']."</strong></td>
 
  </tr>";
  
  
  		}


 $data.="".noRecordsFound($query,14);
	
	if($_GET['action']=='Reports'){
 $data.="";
 }else{
$data.="<tr class='evenrow'>
<td colspan='14'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_CFTechnicalTrainingActivities(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' /> <input type='hidden' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>
 </tr>";
 }
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//--------------------View Other Trainings----------------------
function ViewOtherTrainingActivities($region,$district,$indicator,$subcomponent,$output,$year,$quarter,$indicatorCode,$indicator,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();


$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report' cellspacing='1'>";
 
  $data.=filter_OtherTrainingActivities('ViewOtherTrainingActivities');
	 
if($_GET['action']=='Reports'){
 $data.="";
 }else{
 $data.="<tr class='evenrow'>
 <td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' />  <input type='hidden' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_OtherTrainingActivities(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>

	
</tr>";
}
	

	
	
	$data.="<tr><th colspan='2' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='1'>DISTRICT</th>
	<th colspan='2'><center>Training in IPM</center></th>
	<th colspan='2'><center>Training in Post Harvest Handling </center></th>
	<th colspan='2'><center>Business Training</center></th>
	<th colspan='2'><center>Seedling beneficiaries</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='2' rowspan='2'><center>No. of seedlings given out</center></th>
	<th colspan='3'><center>Inputs procured Kg/Litres</center></th>
	<th colspan='4'><center>Kg of produce bulked</center></th>
	<th rowspan='2'><center>Action</center></th>
		</tr>
	<tr>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	

	<th>Seed</th>
	<th>Fertilizer</th>
	<th>Herbicide</th>
	<th>Maize</th>
	<th>Beans</th>
	<th>Sunflower</th>
	<th>SoyaBean</th>
	</tr>";  
	
	
	  
	$sql=QueryManager::ViewOtherTrainingActivities($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-528"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
<td colspan='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
<td align='right'>".$row['MaleTraininginIPM']."</td>
<td align='right'>".$row['FemaleTraininginIPM']."</td>
 <td align='right'>".$row['MalePostHarvest']."</td>
 <td align='right'>".$row['FemalePostHarvest']."</td>
 <td align='right'>".$row['MaleBulkMrktng']."</td>
  <td align='right'>".$row['FemaleBulkMrktng']."</td>
  <td align='right'>".$row['MaleSeedBen']."</td>
  <td align='right'>".$row['FemaleSeedBen']."</td>
   <td align='right' colspan='2'>".$row['seedlingsgivenout']."</td>
   <td align='right'>".$row['SeedInputProcured']."</td>
 <td align='right'>".$row['FertilizerInputProcured']."</td>
 <td align='right'>".$row['HerbicideInputProcured']."</td>
 
   <td align='right'>".$row['maizeproducebulked']."</td>
   <td align='right'>".$row['beansproducebulked']."</td>
 <td align='right'>".$row['sunflowerproducebulked']."</td>
 <td align='right'>".$row['soyaproducebulked']."</td>
  <td  align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_OtherTechnicalTraining('".$row['year']."',
'".$row['semi_annual']."','".$row['zone']."','".$row['district']."','".$row['typeofparticipants']."','".$row['training_topic']."','tbl_othertrainingsandseeddistribution','delete_OtherTechnicalTraining');return false;\" ></td>
  </tr>";
$n++;
  }

		$sqlTotal=QueryManager::ViewOtherTrainingActivitiesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['fyear'],$_SESSION['semiAnnual']); 
		 #$obj->alert($sqlTotal);
		$queryTotal=Execute($sqlTotal) or die(http("PR-597"));
		$rowTotal=FetchRecords($queryTotal);

 $data.="<tr class='$color'>

  <td colspan='3'><strong>Total</strong></td>
<td align='right'><strong>".$rowTotal['MaleTraininginIPM']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleTraininginIPM']."</strong></td>
 <td align='right'><strong>".$rowTotal['MalePostHarvest']."</strong></td>
 <td align='right'><strong>".$rowTotal['FemalePostHarvest']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleBulkMrktng']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleBulkMrktng']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleSeedBen']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleSeedBen']."</strong></td>
   <td align='right' colspan='2'><strong>".$rowTotal['seedlingsgivenout']."</strong></td>
   <td align='right'><strong>".$rowTotal['SeedInputProcured']."</strong></td>
 <td align='right'><strong>".$rowTotal['FertilizerInputProcured']."</strong></td>
 <td align='right'><strong>".$rowTotal['HerbicideInputProcured']."</strong></td>
<td align='right'><strong>".$rowTotal['maizeproducebulked']."</strong></td>
   <td align='right'><strong>".$rowTotal['beansproducebulked']."</strong></td>
 <td align='right'><strong>".$rowTotal['sunflowerproducebulked']."</strong></td>
 <td align='right'><strong>".$rowTotal['soyaproducebulked']."</strong></td>
  <td align='right'></td>
  </tr>";



 $data.="".noRecordsFound($query,14);
 if($_GET['action']=='Reports'){
 $data.="";
 }else{
 $data.="<tr class='evenrow'>
 <td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_OtherTrainingActivities(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>

	
</tr>";
}
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_OtherTrainingActivities($region,$district,$organization,$fyear){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
return $obj;
}

if($region==NULL){
$obj->alert("Please select a region you are Entering Data for!");
return $obj;
}


$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
$fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
#$obj->alert($_SESSION['parishCode']);
//$n=1;
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  			<tr class='evenrow'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Region</strong></div></td>
  <td colspan='18'><select name='region' id='region' onchange=\"xajax_new_OtherTrainingActivities(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
			$data.=QueryManager::ZoneFilter($region);
		  $data.="</select></td>
</tr>
	<tr class='evenrow3'>
  <td width='30%' colspan='3'>
  <div align='left'>Field Supervisor Responsible</div></td>
  <td colspan='18'><input type='text' name='fieldofficer' id='fieldofficer' size='55' ></td>
</tr>
<tr class='evenrow3'><td colspan='3'>Project Year:</td>
	<td colspan='18'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::FinancialYearFilter($fyear);
				  $data.="</select></td>
	</tr>
	<tr class='evenrow'><td colspan='3'>Reporting Period</td>
	 <td colspan='18'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
				  $data.="</select></td></tr>
	<tr class='display_none'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
	 <tr CLASS='evenrow'>
 
<th colspan='21' ><center>Other Famer Training and Tree Seedling Distribution conducted in each district</center></th>
	
  </tr>
	

	
	
	<tr><th colspan='1' ROWSPAN='2'>No</th>
	
	<th ROWSPAN='2' colspan='1'>DISTRICT</th>
	<th colspan='2'><center>Training in IPM</center></th>
	<th colspan='2'><center>Training in Post Harvest Handling </center></th>
	<th colspan='2'><center>Training in Bulk Marketing</center></th>
	<th colspan='2'><center>Seedling beneficiaries</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='1' rowspan='2'><center>No. of seedlings given out</center></th>
	<th colspan='3'><center>Inputs procured Kg/Litres</center></th>
	<th colspan='4'><center>Kg of produce bulked</center></th>
		</tr>
	<tr>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Seed</th>
	<th>Fertilizer</th>
	<th>Herbicide</th>
	<th>Maize</th>
	<th>Beans</th>
	<th>Sunflower</th>
	<th>SoyaBean</th>
	</tr>";  

	
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	
	<td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
	
	 	$data.=QueryManager::DistrictFilter($region,$district);
	
	$data.="</select></td>
	
	<td>
	
	
	
	<input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
	<input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
	<input name='malehoe[]' size='10'  type='text' id='malehoe".$n."' onKeyPress='return numbersonly(event, false)'  /></td>
	<td><input name='femalehoe[]' size='10'  type='text' id='malehoe".$n."' onKeyPress='return numbersonly(event, false)'  /></td>
	<td> <input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
	<input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
	<input name='maleadp[]' size='10'  type='text' id='maleadp".$n."' onKeyPress='return numbersonly(event, false)' /></td>
	<td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
	<input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
	<input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
	<input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
		
		onKeyPress='return numbersonly(event, false)'
		
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
		<input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
		<input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
	<input name='maleseedling[]' size='10'  type='text' id='maleherbicide".$n."' 
		onKeyPress='return numbersonly(event, false)'	 /></td>
	<td><input name='femaleseedling[]' size='10'  type='text' id='femaleherbicide".$n."'
		onKeyPress='return numbersonly(event, false)'/></td>
		<td>
		
		<input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
		<input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
		<input name='seedlingsgivenout[]' size='10' type='text' id='seedlingsgivenout".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		
		
		<td>
		<input name='loopkey6[]' size='10'  type='hidden' id='loopkey6' value='1'  />
		<input name='trainingtopic6[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='6'  />
		<input name='seed[]' size='10' type='text' id='seed".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td><input name='fertilizer[]' size='10' type='text' id='fertilizer".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td><input name='herbicide[]' size='10' type='text' id='herbicide".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td>
		
		<input name='loopkey7[]' size='10'  type='hidden' id='loopkey7' value='1'  />
		<input name='trainingtopic7[]' size='10'  type='hidden' id='trainingtopic7".$n."' value='7'  />
		<input name='maize[]' size='10' type='text' id='maize".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td><input name='beans[]' size='10' type='text' id='beans".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td><input name='sunflower[]' size='10' type='text' id='sunflower".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		<td><input name='soyabean[]' size='10' type='text' id='soyabean".$n."'  onKeyPress='return numbersonly(event, false)' /></td>
		</tr>";
	
	$n++;
	
	}
	
	

  $data.=" 
 <tr style='display:none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  <tr style='display:none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
 $data.="<tr class='evenrow'><td></td><td colspan='21' align='right'><div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_OtherTrainingActivities(xajax.getFormValues('projects')); return false;\" />Save</button>
</div></td></tr>
</table>



</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//----------------------Field Days and Demos--------------------
function ViewFieldDaysandDemonstrations($region,$district,$indicator,$subcomponent,$output,$year,$quarter,$indicatorCode,$indicator,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();


$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' cellspacing='1'>";
 
  $data.=filter_FieldDaysandDemonstrations('ViewFieldDaysandDemonstrations');
	 
 if($_GET['action']=='Reports'){
 $data.="";
 }else{
 $data.="<tr class='evenrow'>
 <td colspan='18'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_FieldDaysandDemonstrations(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' /> <input type='hidden' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' />  | <a href='project_crosstab.php?linkvar=Aggregate Field Days and Demonstrations&&region=".$region."&&year=".$year."&&quarter=".$quarter."'  > <input type='button' class='formButton2'   id='button' title='Cross tab'   value='Cross tab' class='' /></a></td>

	
</tr>";
}
 
 $data.="<tr CLASS='evenrow'>
 
<th colspan='18' ><center>Field days and demonstrations </center></th>
	
  </tr>
	
	
	<tr>
	<th colspan='2' ROWSPAN='3'>No/Select</th>
	<th ROWSPAN='3' colspan='1'>DISTRICT</th>
	<th  colspan='9'><center>Field days conducted<center></th>
	<th colspan='3' rowspan='2'><center>demonstrations</center></th>
	<th rowspan='3'>Action</th>
		</tr>
		
		<tr>
		<th  colspan='3'>District (Major) Field days</th>
		<th  colspan='3'>DC (Regular) Field days</th>
		<th  colspan='3'>PO (Specific) Field days</th>

	
		</tr>
	
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
		<th>Female</th>
		<th>No. of Demos</th>
		</tr>";  
	
	
	$sql=QueryManager::ViewFieldDaysandDemonstrations($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=Execute($sql)or die(http("PR-866"));
  while($row=FetchRecords($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
<td colspan='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='fielddayIndicator[]' type='hidden' id='fielddayIndicator' value='".$row['fielddayIndicator']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
 <td align='right'>".$row['MaleDMajor']."</td>
<td align='right'>".$row['FemaleDMajor']."</td>
	<td align='right'>".$row['numberofDMFieldDays']."</td>
	   <td align='right'>".$row['MaleDRegular']."</td>
	  <td align='right'>".$row['FemaleDRegular']."</td>
		   <td align='right'>".$row['numberofDRFieldDays']."</td>
<td align='right'>".$row['MalePOSpecific']."</td>
 <td align='right'>".$row['FemalePOSpecific']."</td>
 <td align='right'>".$row['numberofPOFieldDays']."</td>
  <td align='right'>".$row['MaleDemo']."</td>
  <td align='right'>".$row['FemaleDemo']."</td>
  <td align='right'>".$row['numberofDemonstrationsEstablished']."</td>
  
  <td  align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_CarpFieldDaysandDemonstrations('".$row['year']."',
  
  '".$row['semi_annual']."','".$row['zone']."','".$row['district']."','".$row['fielddayIndicator']."','tbl_fielddaysanddemonstrations','delete_ViewFieldDaysandDemonstrations');return false;\" ></td>
  
  
  
</tr>";
$n++;
  }
  //-------Gerrating Totals
  
  
  	$sqlTotal=QueryManager::ViewFieldDaysandDemonstrationsTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],
	$_SESSION['fyear'],$_SESSION['semiAnnual']);
	
	//$obj->alert($sqlTotal);
  
	$queryTotal=Execute($sqlTotal) or die(http("PR-934"));
		$rowTotal=FetchRecords($queryTotal);
   $data.="<tr class='$color'>
	
<td colspan='3'>
	<strong>Total</strong></td>
 <td align='right'><strong>".$rowTotal['MaleDMajor']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleDMajor']."</strong></td>
	<td align='right'>".$rowTotal['numberofDMFieldDays']."</td>
	   <td align='right'><strong>".$rowTotal['MaleDRegular']."</strong></td>
	  <td align='right'><strong>".$rowTotal['FemaleDRegular']."</strong></td>
		  <td align='right'>".$rowTotal['numberofDRFieldDays']."</td>
<td align='right'><strong>".$rowTotal['MalePOSpecific']."</strong></td>
 <td align='right'><strong>".$rowTotal['FemalePOSpecific']."</strong></td>
 <td align='right'>".$rowTotal['numberofPOFieldDays']."</td>
  <td align='right'><strong>".$rowTotal['MaleDemo']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleDemo']."</strong></td>
  <td align='right'>".$rowTotal['numberofDemonstrationsEstablished']."</td>
  <td  align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"ConfirmDeletionCompletely('".$rowWP['workplan_id']."','workplan_id','tbl_workplan','delete_AnnualTargets');return false;\" ></td>
</tr>";
  
  


 $data.="".noRecordsFound($query,14);
 if($_GET['action']=='Reports'){
 $data.="";
 }
 else {
 $data.="<tr class='evenrow'>
 <td colspan='18'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_FieldDaysandDemonstrations(xajax.getFormValues('projects'),'".$region."');return false;\" value='edit' /> <input type='hidden' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('projects'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /> | <a href='project_crosstab.php?linkvar=Aggregate Field Days and Demonstrations&&region=".$region."&&year=".$year."&&quarter=".$quarter."'  > <input type='button' class='formButton2'   id='button' title='Cross tab'   value='Cross tab' class='' /></a></td>

	
</tr>";
}
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-------------Adoption rates-----------------------
function ViewAdoptionRates($region,$district,$indicator,$subcomponent,$output,$year,$quarter,$indicatorCode,$indicator,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();


$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report'>";
 
  $data.=filter_AdoptionRates('ViewAdoptionRates');
	 if($_GET['action']=='Reports'){
 $data.="";
 }else{
$data.="<tr class='evenrow'>
<td colspan='22'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_AdoptionRates(xajax.getFormValues('projects'),'".$region."','".$year."');return false;\" value='edit' /> | <a href='project_crosstab.php?linkvar=Aggregate Adoption Rates&&region=".$region."&&year=".$year."&&quarter=".$quarter."'  > <input type='button' class='formButton2'   id='button' title='Cross tab'   value='Cross tab' class='' /></a></td>
 </tr>";
 }
 
 $data.="<tr CLASS='evenrow'>
 
<th colspan='22' ><center>CF/CA Adoption Rates (M=Male,F=Female,CF=Conservation Farming,CA=Conservation Agriculture)</center></th>
	
  </tr>
	
	
	<tr><th colspan='2' ROWSPAN='3'>No/Select</th>
	
	<th ROWSPAN='3' colspan='1'>DISTRICT</th>
	<th colspan='6'><center>No. of farmers adopting</center></th>
	<th colspan='6'><center>Area under adoption</center></th>
	<th colspan='2' ROWSPAN='2'><center>Area under legumes</center>
	</th>
	<th colspan='2' ROWSPAN='2' ><center>Herbicide use</center></th>
	<th colspan='2' ROWSPAN='2' ><center>Not burning residue</center></th>
		<th colspan='1' ROWSPAN='3' ><center>Action</center></th>
	
		</tr>
		
		
		<tr>
	

	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
		</tr>
	<tr>";
	for($x=0;$x<9;$x++){
	$data.="<th>M</th><th>F</th>";
	}
	
	$data.="</tr>";  
	
	$querytrainees=mysql_query("select * from tbl_trainees order by code asc")or die(http("PR-432"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
$data.="<tr class='evenrow'>

  <td colspan='22'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewAdoptionRates($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   #$obj->alert($sql);
	   
	 $query=@mysql_query($sql)or die(http("PR-1000"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	".loop_key('adoption_id',$row['adoption_id'])."
<td>".$n."</td>
<td colspan='1'>
	<input name='loopkey[]' type='hidden' id='loopkey' value='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='AdoptionTopic[]' type='hidden' id='AdoptionTopic' value='".$row['adoption_topic']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
<td align='right'>".$row['MaleHoebasin']."</td>
<td align='right'>".$row['FemaleHoebasin']."</td>
 <td align='right'>".$row['MaleADPRipping']."</td>
 <td align='right'>".$row['FemaleADPRipping']."</td>
 <td align='right'>".$row['MaleMechanizedRipping']."</td>
  <td align='right'>".$row['FemaleMechanizedRipping']."</td>
  <td align='right'>".$row['MaleAreaHoebasin']."</td>
  <td align='right'>".$row['FemaleAreaHoebasin']."</td>
<td align='right'>".$row['MaleAreaADPRipping']."</td>
  <td align='right'>".$row['FemaleAreaADPRipping']."</td>
   <td align='right'>".$row['MaleAreaMechanizedRipping']."</td>
   <td align='right'>".$row['FemaleAreaMechanizedRipping']."</td>
   <td align='right'>".$row['MaleLegumes']."</td>
  <td align='right'>".$row['FemaleLegumes']."</td>
  <td align='right'>".$row['MaleHerbicide']."</td>
  <td align='right'>".$row['FemaleHerbicide']."</td>
  <td align='right'>".$row['MaleResidues']."</td>
  <td align='right'>".$row['FemaleResidues']."</td>";
 
  //$obj->alert($code);
  
  /* xajax_delete_CarpAdoptionRates('".$row['year']."',
  
  '".$row['semi_annual']."','".$row['zone']."','".$row['district']."','".$row['typeofparticipants']."'
  'tbl_adoptionrates','delete_AdoptionRates');return false;\" */
 // $year,$semi_annual,$zone,$district,$typeofparticipants
  $data.="<td  align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_CarpAdoptionRates('".$row['year']."',
  
  '".$row['semi_annual']."','".$row['zone']."','".$row['district']."','".$row['typeofparticipants']."','tbl_adoptionrates','delete_AdoptionRates');return false;\" ></td>
  </tr>";
$n++; }
	
	$sqlTotal=QueryManager::ViewAdoptionRatesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
		$queryTotal=Execute($sqlTotal) or die(http("PR-1025"));
		$rowTotal=FetchRecords($queryTotal);
	$data.="<tr class='$color'>
	<td colspan=3><strong>Total ".$rowparticipants['Name']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleHoebasinTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleHoebasinTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleADPRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleADPRippingTotal']."</strong></td>
 	<td align='right'><strong>".$rowTotal['MaleMechanizedRippingTotal']."</strong></td>
  	<td align='right'><strong>".$rowTotal['FemaleMechanizedRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleAreaHoebasinTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleAreaHoebasinTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleAreaADPRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleAreaADPRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleAreaMechanizedRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleAreaMechanizedRippingTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleLegumesTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleLegumesTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleHerbicideTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleHerbicideTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['MaleResiduesTotal']."</strong></td>
<td align='right'><strong>".$rowTotal['FemaleResiduesTotal']."</strong></td>
	 <td align='right'></strong></td>
</tr>";
 
  
  
  
  
  
  		}
		//Generating Totals---------

 $data.="".noRecordsFound($query,22);
 
 if($_GET['action']=='Reports'){
 $data.="";
 }else{
 $data.="<tr class='evenrow'>
 <td colspan='22'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_AdoptionRates(xajax.getFormValues('projects'),'".$region."','".$year."');return false;\" value='edit' />  | <a href='project_crosstab.php?linkvar=Aggregate Adoption Rates&&region=".$region."&&year=".$year."&&quarter=".$quarter."' > <input type='button' class='formButton2'   id='button' title='Cross tab'   value='Cross tab' class='' /></a></td>

	
</tr>";
}
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
 #-======new training Particpants===================
function new_AdoptionRates($region,$district,$organization,$fyear){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
return $obj;
}

$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
$fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
#$obj->alert($_SESSION['parishCode']);
//$n=1;
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  			<tr class='evenrow'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Region</strong></div></td>
  <td colspan='18'><select name='region' id='region' onchange=\"xajax_new_AdoptionRates(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
			$data.=QueryManager::ZoneFilter($region);
		  $data.="</select></td>
</tr>
	<tr class='evenrow3'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Field Supervisor Responsible</strong></div></td>
  <td colspan='18'><input type='text' name='fieldofficer' id='fieldofficer' size='48' ></td>
</tr>
<tr class='evenrow3'><td colspan='3'>Project Year:</td>
	<td colspan='18'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::FinancialYearFilter($fyear);
				  $data.="</select></td>
	</tr>
	<tr class='evenrow'><td colspan='3'>Reporting Period</td>
	 <td colspan='18'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
				  $data.="</select></td></tr>
	<tr class='display_none'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
	<tr CLASS='evenrow'>
 
<th colspan='21' ><center>CF/CA Adoption Rates</center></th>
	
  </tr>
	
	<tr><th colspan='' ROWSPAN='3'>No</th>
		<th ROWSPAN='3' colspan='1'>category</th>
	<th ROWSPAN='3' colspan='1'>DISTRICT</th>
	
	<th colspan='6'><center>No. of farmers adopting</center></th>
	<th colspan='6'><center>Area under adoption</center></th>
	<th rowspan='2' colspan='2'><center>Area under legumes</center></th>
	<th rowspan='2' colspan='2'><center>Herbicide use</center></th>
	<th rowspan='2' colspan='2'><center>Not burning residue</center></th>
	
	</tr>
	
	<tr>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
		</tr>
	<tr>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>

	</tr>";
	
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	<td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'>
	".funct_dropDown('tbl_trainees', 'Name', 'code', 'code')."</select></td>
	<td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
	
	 	$data.=QueryManager::DistrictFilter($region,$district);
	
	$data.="</select></td>
	
	<td>
	
	
	
	<input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
	<input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
	<input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
	
	onKeyPress='return numbersonly(event, false)'
	

	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
		onKeyPress='return numbersonly(event, false)'
	
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td>
		<input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
	<input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
	<input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
	<input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
	<input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
	<input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
		
		onKeyPress='return numbersonly(event, false)'
		
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
		<input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
		<input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
	<input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	<td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
		onKeyPress='return numbersonly(event, false)'
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
	<td>
	
	
		<input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
	<input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
	<input name='maletreeplanting[]' size='10'  type='text' id='maletreeplanting".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaletreeplanting[]' size='10'  type='text' id='femaletreeplanting".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 <td>
	
	
		<input name='loopkey6[]' size='10'  type='hidden' id='loopkey6' value='1'  />
	<input name='trainingtopic6[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='6'  />
	<input name='malearea[]' size='10'  type='text' id='malearea".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femalearea[]' size='10'  type='text' id='femalearea".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	 
	 
	 <td>
	
	
		<input name='loopkey7[]' size='10'  type='hidden' id='loopkey7' value='1'  />
	<input name='trainingtopic7[]' size='10'  type='hidden' id='trainingtopic7".$n."' value='7'  />
	<input name='malelegumes[]' size='10'  type='text' id='malelegumes".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femalelegumes[]' size='10'  type='text' id='femalelegumes".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	  <td>
	
		<input name='loopkey9[]' size='10'  type='hidden' id='loopkey9' value='1'  />
	<input name='trainingtopic9[]' size='10'  type='hidden' id='trainingtopic9".$n."' value='9'  />
	<input name='maleherbs[]' size='10'  type='text' id='maleherbs".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaleherbs[]' size='10'  type='text' id='femaleherbs".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	 
	 
	 <td>
	
	
		<input name='loopkey8[]' size='10'  type='hidden' id='loopkey8' value='1'  />
	<input name='trainingtopic8[]' size='10'  type='hidden' id='trainingtopic8".$n."' value='8'  />
	<input name='maleresidues[]' size='10'  type='text' id='maleresidues".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaleresidues[]' size='10'  type='text' id='femaleresidues".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 	 
	 
	</tr>";
	
	
	
	/**/
	
	$n++;
	
	}
	
	

  $data.=" 
 <tr style='display:none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  <tr style='display:none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
 $data.="<tr class='evenrow'><td></td><td colspan='21' align='right'><div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_AdoptionRates(xajax.getFormValues('projects')); return false;\" />Save</button>
</div></td></tr>
</table>



</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function getRecordId($semi_annual,$year,$org_code,$div){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}

//$obj->alert($year);
/* 
$obj->addAlert($_SESSION['quarter']);
if($_SESSION['quarter']!=$quarter){
$obj->addAlert("You are Trying to edit Items in a wrong Quarter!");
return $obj;

} */
 $sql="select narrative_id from tbl_tsoqualitative where org_code='".$org_code."' and year='".$year."' and semi_annual='".$semi_annual."' ";
//$obj->alert($sql);
$query=mysql_query($sql)or die(http(0941));
while($queryRecord=mysql_fetch_array($query)){
//$obj->alert($queryRecord['narrative_id']."---narr----- ".$semi_annual."-semi-----  ----".$div."--div------".$project_id."-prj_id-----".$year."----year");
if($queryRecord['narrative_id']<>0){
$obj->call("xajax_view_NarrativequalitativeReport",$queryRecord['narrative_id'],$semi_annual,$div,$org_code,$year);
return $obj;
}
 }
$obj->assign('bodyDisplay','innerHTML','');
return $obj;
}
function getRecordIdFarmersRecord($semi_annual,$year,$org_code,$div){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}

//$obj->alert($year);
/* 
$obj->addAlert($_SESSION['quarter']);
if($_SESSION['quarter']!=$quarter){
$obj->addAlert("You are Trying to edit Items in a wrong Quarter!");
return $obj;

} */
 $sql="select * from tbl_farmerproductionrecords where org_code='".$org_code."' and year='".$year."' and quarter='".$semi_annual."' ";
//$obj->alert($sql);
$query=mysql_query($sql)or die(http(0941));
while($queryRecord=mysql_fetch_array($query)){
//$obj->alert($queryRecord['narrative_id']."---narr----- ".$semi_annual."-semi-----  ----".$div."--div------".$project_id."-prj_id-----".$year."----year");
if($queryRecord['org_code']<>0){
$obj->call("xajax_view_FarmersProductionRecords",$queryRecord['org_code'],$div);
return $obj;
}
 }
$obj->assign('bodyDisplay','innerHTML','');
return $obj;
}
function view_NarrativequalitativeReport($narrative_id,$semi_annual,$div,$org_code,$year){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
	return $obj;

}
//$narrative_id=1;$project_id=1;$semi_annual='Jan - Jun';$year='2012';

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
<table width='100%' border='0'><TR><td colspan=2><hr ></td></TR>
	  <TR><td colspan=2><div id='status'></div></td></TR>
	  <tr>
  <td></td>
  <td><div align='right'>
<input type='button' class='formButton2'   id='button' name='edit' id='button' style='width:100px;' value='Edit' onclick=\"xajax_edit_TSOqualitativeReporting2('".$narrative_id."','".$quarter."','".$div."','".$project_id."');return false;\" /> | <a href='print_version2.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&org_code=".$org_code."&&year=".$year."&&format=Print' target='_blank'><input type='button' class='formButton2'   id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a> |   <a href='export_to_excel_word.php?linkvar=Export Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&org_code=".$org_code."&&year=".$year."&&format=word' target='_blank'><input type='button' class='formButton2'   id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a> | <input name='' type='button' value='Close' id='button' onclick=\"xajax_view_NarrativequalitativeReport('".$narrative_id."','".$semi_annual."','".$div."','','".$year."')\">
   </div></td>
</tr>";
	 # $obj->addAlert(count($formvalues['loopkey']));
//for($i=0;$i<count($narrative_id);$i++){
#$narrative_id=$formvalues['narrative_id'][$i];
$select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
$data.="<tr>
 ";
		  $sql="select * from tbl_organization where org_code='".$org_code."' order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  $ROW=mysql_fetch_array($query) or die(http(0030));
		
		  $data.="<input name='intervention' id='intervention' value='".$ROW['org_code']."' type='hidden' ><strong>".substr($ROW['orgName'],0,500)."</strong></td>
</tr>
   <tr>
  <td colspan=2>
  <div align='left'><strong>Executive Summary (1.1	Summary of key training activities including field days and demo plots)</strong><em>[0.5 page]</em></div></td></tr>
  <tr><td colspan=2>".$row['plannedActivities']."</td>
</tr>
  <tr>
  <td colspan=2>
  <div align='left'><strong>1.1.2	Partners/Government Staff trained.</strong><em>(0.5 page)</em></div></td></tr> 
 <tr> <td colspan=2>".$row['implementation']."</td>
</tr><tr>
  <td colspan=2>
  <div align='left'><strong>1.2	Summary of other main activities undertaken during the reporting period  </strong><em>(Maximum 3 pages)</em></div></td></tr>
 <tr><td colspan=2>".$row['achievements']."</td>
</tr>";
 $data.="<tr>
  <td colspan=2>
  <div align='left'><strong>2.1	Progress against Adoption Targets Area and Farmers </strong><em>[Max 3 pages]</em></div></td></tr><tr>
  <td colspan=2>".$row['Deviation']."</td>
</tr>
		
<tr>
  <td colspan=2>
  <div align='left'><strong>2.2	Major Reasons for Adoption by Farmers</strong><em>[Max 0.5 page]</em></div></td></tr><tr>
  <td colspan=2>".$row['next_quarter']."</td>
</tr>
<tr>
  <td>
  <div align='left'><strong>2.3	Major Reasons for Non-Adoption by Farmers</strong> <em>[Max 0.5 page]</em> </div></td></tr><tr>
  <td>".$row['Challenges']."</td>
</tr>
   
		<tr><td colspan=2> <div align='left'><strong>8. 2.4	Specific Activities to Increase Adoption (for the next period) [Max 0.5 page]</strong></div></td></tr>
<tr>
  <td colspan='2'>
<table cellspacing='0'  width='500' border='0'>";
		  $n=1; $is=10;$inc=1;
  $data.="<tr>
<th>NO</th>
<th>Activities planned for next 6 months</th>
<th>Milestones</th>
<th>Timeframe</th>
  </tr>";$data.="<tr><td>".noResultsFound()."</td></tr></table>
<td></center></tr>";
  
 // for($x=0;$x<$is;$x++){
  //$color=$inc%2==1?"evenrow":"white1";
  /* 
  $SQLM="select * from tbl_projectworkplan where project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'";
  //$obj->alert($SQLM);
   $querym=mysql_query($SQLM)or die("0707");
  while($rowm=mysql_fetch_array($querym)){
  $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='$color'><td>".$n."</td>
<td>".$rowm['activity']."</td>
<td>".$rowm['milestone']."</td>
<td>".$rowm['semi_annual']."</td></tr>";
	//$inc++;
  $n++;								
  }  */


		$data.="</center></TD></tr>
		<tr><td colspan=2><center>
  
  <table> <tr CLASS='evenrow'>
  <td colspan='1' class='black2'>NO</td>
<td class='black2'>Training course title</td>
<td class='black2'>Provided by</td>
<td class='black2'>Type of Participants</th>

	<td class='black2'>No. of Male participants</td>
	<td class='black2' >No. of Female participants</td>
<td class='black2'>Total No. of participants</td>
<td class='black2'>Organizing<br/>Date<br/></td>
  </tr>";
 $queryt=mysql_query("select * from tbl_training where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' and year='".$year."'")or die(http("2140"));
  while($row=mysql_fetch_array($queryt)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
	
  <td>".$n."</td>
<td>".$rowt['course']."</td>
<td>".$rowt['trainer']."</td>
<td>".$rowt['typeofparticipants']."</td>
<td align='right'>".$rowt['male']."</td>
 <td align='right'>".$rowt['female']."</td>
 <td align='right'>".$rowt['total']."</td>

  <td align='right'>".$rowt['organizing_date']."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($queryt,11)."</table></center></td></tr>
		
  ";

		  $data.="<tr>
  <td></td>
  <td><div align='right'>
<input type='button' class='formButton2'   id='button' name='edit' id='button' style='width:100px;' value='Edit' onclick=\"xajax_edit_TSOqualitativeReporting2('".$narrative_id."','".$quarter."','".$div."','".$project_id."');return false;\" /> | <a href='print_version2.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&org_code=".$org_code."&&year=".$year."&&format=Print' target='_blank'><input type='button' class='formButton2'   id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a> |   <a href='export_to_excel_word.php?linkvar=Export Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&org_code=".$org_code."&&year=".$year."&&format=word' target='_blank'><input type='button' class='formButton2'   id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a> | <input name='' type='button' value='Close' id='button' onclick=\"xajax_view_NarrativequalitativeReport('".$narrative_id."','".$semi_annual."','".$div."','','".$year."')\">
   </div></td>
</tr>";
		}
$data.="</table></FORM>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}
function view_qualitativeReporting($year,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']='';
$prog_id=1;
$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 
//$obj->alert($_SESSION['Ryear']);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
<td colspan='3' ><div align='center' class=''>YEAR</div></td><td colspan='10' A ><div align='left' class=''><select name='year' id='year' onchange=\"xajax_view_qualitativeReporting(getElementById('year').value,'".$organization."',1,20); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		
		$data.="</select></strong></div></td>
</tr>
		<tr class='evenrow'>
<td colspan='3' ><div align='center' class=''>Organization:</div></td><td colspan='10' A ><div align='left' class=''><select name='organization' id='organization' onchange=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."',this.value,1,20); return false;\" style='width:300px;'><option value=''>-All-</option>";
		
		$ql="select * from tbl_organization order by orgName asc";
$qry = @mysql_query($ql)or die(http("PR-00573"));
while($row=mysql_fetch_array($qry)){
$data.="<option value=\"".$row['org_code']."\"  ".CheckExistance($row['org_code'],$organization,'selected').">".$row['orgName']."</option>";


}
		$data.="</select></strong></div></td>
</tr>

		
		
		
		
		
	  <tr>
<th colspan='13' ><div align='center' class=''>SEMI-ANNUAL perfomance REPORT</div></th>
</tr>
  
  <tr>
	  <th ><b class=''>NO.</th>
	   <th width='' colspan=7 ><strong class=''>Organization</strong></th>
		<th  width='70'><strong class=''>Oct - Mar</strong></th>
		
		<th  width='70'><strong class=''>Apr - Sep</strong></th>
		 </tr>";

#$query_string="select * from tbl_tsoqualitative qr join  tbl_organization o on(o.org_code=qr.org_code) join tbl_lookup l on(l.code=qr.intervention) where l.classCode='5' order by o.org_code,qr.year,qr.reportingPeriod Asc";
$ql="select * from tbl_organization where org_code like '".$organization."%' order by orgName";
$qry = @mysql_query($ql)or die(http("PR-00583"));
		$max_records = @mysql_num_rows($qry);
	//or die(http("PR-0032"))
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$aa=$offset+1;
$new_query=mysql_query($ql." limit ".$offset.",".$records_per_page) or die(http("PR-589"));  



	  while($row=mysql_fetch_array($new_query)){


$query_string="select l.orgName,q.narrative_id,q.org_code,
 			q.reportingPeriod,q.semi_annual,q.year,
			sum(if(((q.semi_annual='Oct - Mar')  
			and q.year like '".$_SESSION['Ryear']."%'),q.org_code,'')) AS Quarter1,
			sum(if(((q.semi_annual='Apr - Sep')  
			and q.year like '".$_SESSION['Ryear']."%'),q.org_code,'')) AS Quarter2
			from tbl_organization l left join tbl_tsoqualitative q  on(l.org_code=q.org_code) 
 			where l.org_code ='".$row['org_code']."'
 			group by l.org_code 
			order by l.org_code Asc"; 
 $query_n=mysql_query($query_string)or die(http("PR-0185"));
 //$obj->alert($query_string);
while($rowq=mysql_fetch_array($query_n)){
//$obj->alert($row['id']);
$_SESSION['org_code']=$row['org_code'];
$div="status".$row['org_code'];
	  $color=$n%2==1?"evenrow3":"white1";
 $data.="<tr class=$color class='black'>
	 <td>".$inc++."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$row['org_code']."' />
	 <input name='narrative_id[]' id='narrative_id' type='hidden' value='".$row['org_code']."' />
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$row['org_code']."'>".ucfirst(strtolower($row['orgName']))."</td>
		<td align='center'>";


if(($rowq['Quarter1']<>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('Oct - Mar','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_qualitativeReporting('".$row['org_code']."','Oct - Mar');return false;\">";
}

$data.="</td>
<td align='center'>";


if(($rowq['Quarter2']<>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('Apr - Sep','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_qualitativeReporting('".$row['org_code']."','Apr - Sep');return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='$div'></div></td></tr>
	  
	  ";
	  $n++;
	  }
	  }
	  
	  $data.="<tr><td colspan='10' align='right'>";
	  
	  $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;



if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."','".$organization."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."','".$organization."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_qualitativeReporting('".$_SESSION['Ryear']."','".$organization."','".$cur_page."',this.value)\">";


	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>";


	  
	  
	  
   
$data.="</td></tr></table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#----------qualitativeReporting------------------
function new_qualitativeReporting($intervention,$quarter){
$obj = new xajaxResponse();
$_SESSION['intervention']='';
$_SESSION['intervention']=$intervention;
$_SESSION['semi_annual']=$quarter;

 //$semi_annual=@mysql_fetch_array(@mysql_query("select * from tbl_quarters where britishSemiannual like '".$_SESSION['quarter']."%'"))or die(http("PR-0699"));
if(mappQuarterToSemiAnnual($_SESSION['quarter'])<>$quarter){
$obj->alert('You are Trying to enter Details in a wrong Quarter/Half! Process Halted!');
return $obj;

}  

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='".$PHP_SELF."' enctype='multipart/form-data'><table cellspacing='0'  width='100%' border='0'>";
 //for($i=0;$i<count($intervention['code']);$i++){
	 
	 $data.="<tr>
  <td width='30%'>
  <div align='left'><strong>Organization</strong></div></td>
  <td>";
		  $sql="select * from tbl_organization where org_code='".$intervention."' order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("PR-887"));
		  $ROW=@mysql_fetch_array($query) or die(http("PR-888"));
		
		  $data.="<input name='intervention' id='intervention' value='".$ROW['org_code']."' type='hidden' ><strong>".substr($ROW['orgName'],0,500)."</strong></td>
</tr>
<tr>
  <td>
  <div align='left'><strong>Executive Summary (1.1	Summary of key training activities including field days and demo plots)</strong><em>[0.5 page]</em></div></td>
  <td><textarea name='plannedActivities'  cols='100' rows='5'  onKeyDown=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\" onKeyUp=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\"></textarea>You have <input readonly type='text' name='countdownplannedActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
</tr>
  <tr>
  <td>
  <div align='left'><strong>1.1.2	Partners/Government Staff trained.</strong><em>(0.5 page)</em></div></td>
  <td><textarea name='implementation' id='implementation' cols='100' rows='5' onKeyDown=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\" onKeyUp=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\"></textarea>You have <input readonly type='text' name='countdownimplementation' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
</tr><tr>
  <td>
  <div align='left'><strong>1.2	Summary of other main activities undertaken during the reporting period  </strong><em>(Maximum 3 pages)</em></div></td>
  <td><textarea name='achievements' id='achievements' cols='100' rows='5'  onKeyDown=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\" onKeyUp=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\"></textarea>You have <input readonly type='text' name='countdownachievements' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
</tr>";
 $data.="<tr>
  <td>
  <div align='left'><strong>2.1	Progress against Adoption Targets Area and Farmers </strong><em>[Max 3 pages]</em></div></td>
  <td><textarea name='deviations' id='deviations' cols='100' rows='5'  onKeyDown=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\" onKeyUp=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\"></textarea>You have <input readonly type='text' name='countdowndeviations' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
</tr>
		
<tr>
  <td>
  <div align='left'><strong>2.2	Major Reasons for Adoption by Farmers</strong><em>[Max 0.5 page]</em></div></td>
  <td><textarea name='challenges' id='challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\" onKeyUp=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\"></textarea>You have <input readonly type='text' name='countdownchallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
</tr>
<tr>
  <td>
  <div align='left'><strong>2.3	Major Reasons for Non-Adoption by Farmers</strong> <em>[Max 0.5 page]</em> </div></td>
  <td><textarea name='next_quarter' id='next_quarter' cols='100' rows='5' onKeyDown=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\" onKeyUp=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\"></textarea>You have <input readonly type='text' name='countdownnext_quarter' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
</tr>
   
		
<tr>
  <td>
  <div align='left'><strong>8. 2.4	Specific Activities to Increase Adoption (for the next period) [Max 0.5 page]</strong></div></td><td><table cellspacing='0'  width='500' border='0'>";
		  $n=1; $is=10;$inc=1;
  $data.="<tr>
<th>NO</th>
<th>Activities planned for next 6 months</th>
<th>Milestones</th>
<th>Timeframe</th>
  </tr>";
  for($x=0;$x<$is;$x++){
  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='$color'><td>".$n++."</td>
<td><textarea name='activity[]' cols=50 rows=3></textarea></td>
<td><textarea name='milestone[]' cols=18 rows=3></textarea></td>
<td><select name='quarter[]' size='1'><option value='' >-select-</option>";
	$s=@mysql_query("select britishSemiannual from tbl_quarters group by britishSemiannual asc") or die(http(0789)); 
	while($rr=@mysql_fetch_array($s)){
	$data.="<option value=\"".$rr['britishSemiannual']."\" >".$rr['britishSemiannual']."</option>";
	}
	$data.="</select></td>

  </tr>";
  
  $inc++;
  }
$data.="</table>
<td>
		  
		  
		  
		  
		  
		  <tr><td><input type='hidden' name='textDir[]' id='textDir' value='Workplan for next Quarter'></td>
  <td><input name='fileDir[]' type='file' size='30' /><div style='float:right;'><a onClick='ShowDirec()'><input name='' type='button' class='formButton2'   id='button' value='Upload More Files'></a>(Up to a Maximum of 10 Files)</div></td>
</tr>";
		
		
		$data.="<tr>
		</table>
		
		<table cellspacing='0'  width='700' cellpadding='5' cellspacing='5' align='left'>
  <tr>
<td colspan='2' align='left'><div id='dirRec'>
  
</div></td>
</tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr>
  ";

		  
		 
		  $data.="<tr>
  <td></td>
  <td colspan='3'><div align='right'>
<input type='button' class='formButton2'  name='save_QualitativeReporting' onclick=\"xajax_save_QualitativeReporting(xajax.getFormValues('formUploadIndividual'));return false;\" id='button' style='width:100px;' value='Save'  />
  </div></td>
</tr>";
		//}
$data.="</table>

 </FORM>";
/**/

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#----------------------------------------------
function TSO_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;
/* $_SESSION['intervention']='';
$_SESSION['intervention']=$intervention;
 */
$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table cellspacing='0'  width='700' border='0'>
";


$select="select t.narrative_id,t.org_code,o.orgName,t.intervention,i.codeName,reportingPeriod,t.year,t.plannedActivities,t.implementation,t.achievements,t.deviations,t.challenges,t.next_quarter,t.lessons ,i.codeName as interventionName,i.code from tbl_tsoqualitative t inner join tbl_organization o on(o.org_code=t.org_code) inner join tbl_lookup i on(i.code=t.intervention) where i.classcode='5' and narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
  $data.="<tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <input name='' type='button' class='formButton2'   id='button' value='Back' onclick=\"xajax_viewQualiatativeTSOEntered('','','','');return false;\"> |<a href='print_version.php?linkvar=Print TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>
	  
	  
	<tr class='evenrow3'>
  <td width='100%' colspan=2>
  <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  QUALITATIVE  REPORT FOR ".strtoupper($row['orgName'])."</strong></div></td>
 </td>
</tr>
	<tr class='white1'>
  <td width='50'>
  <div align='left'><strong>Intervention:</strong></div></td>
  <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['interventionName']."</td>
</tr>
   <tr class='evenrow3'>
  <td colspan=2>
  <div align='justify'><p></p><strong>List of  activities planned for implementation During  the reporting period </strong></div></td></tr>
<tr class='evenrow3'> <td colspan=2  align='justify'><p></p><p><li>".$row['plannedActivities']."</li></p></td></tr>
</tr>
   <tr>
  <td colspan=2>
  <div align='justify' ><p></p><strong>Concise Description of Activity Implementation During  The Quarter</strong></div></td></tr>
		  <tr>
  <td colspan=2 align='justify'><p></p><p><li>
   ".$row['implementation']."</li></p></td>
</tr>";
		
		
$data.="<tr class='evenrow3'>
  <td colspan=2>
  <div align='left'><p></p><strong>Key outputs and achievements obtained  against planned targets</strong></div></td></tr>
		 <tr class='evenrow3'>
  <td colspan=2><p></p><p><li>
".$row['achievements']."</li></p></td>
</tr>
   <tr>
  <td colspan=2>
  <div align='justify'><p></p><strong>Reasons for any deviations from expected  outputs and targets</strong></div></td></tr>
		  <tr>
  <td colspan=2 align='justify'><p></p><p>
 <li>".$row['deviations']."</li></p></td>
</tr>
<tr class='evenrow3'>
  <td colspan=2>
  <div align='justify'><p></p><strong>Main challenges met during implementation and  their effect on project implementation, how they were or will be addressed and  further support needed to address them </strong></div></td></tr>
		 <tr class='evenrow3'>
  <td colspan=2><p></p><p><li>".$row['challenges']."</li></p></td>
</tr>
   <tr>
  <td colspan=2 align='justify'><p></p>
  <strong>Activities planned for implementation during  the next quarter and targets to achieve</strong></td></tr>
  <tr>
  <td colspan=2 align='justify'><p></p><p><li>".$row['next_quarter']."</li></p></td>
</tr>
  <tr class='evenrow3'>
  <td colspan=2><div align='justify' ><p></p><strong>Human and Institutional  Change/Success story and photographs of project impact on local government OVC  systems, communities, households or lives of vulnerable children</strong></div></td></tr>
 <td></td>
</tr>
<tr class='evenrow3'>
  <td colspan=2 align='justify' ><div '><p></p><strong>Good practices and lessons  learnt during the Quarter</strong></div></td></tr>
<tr class='evenrow3'>
  <td colspan=2 align='justify'><p></p><p><li>".$row['implementation']."</li></p></td>
</tr>";
		$query_upload=mysql_query("select * from tbl_uploads where narrative_id='".$row['narrative_id']."'")or die(http(1247));
		while($rowupload=mysql_fetch_array($query_upload)){
		$narrative_id=$rowupload['narrative_id'];
		$upload_id=$rowupload['upload_id'];
$data.="<tr>
  <td colspan=2>
  <div align='left'><strong><a href='download.php?directory=BinaryDataFile&&narrative_id=$narrative_id&&upload_id=$upload_id&&format=word' target='_blank'>".$rowupload['documentName']."</a></strong></div></td>
   
</tr>
		
		<tr>
  <td>
  <div align='left'><strong></strong></div></td>
 <td></td>
</tr>";
		}
		
$data.="<tr>
		</table>
		
		<table cellspacing='0'  width='700' cellpadding='5' cellspacing='5' align='left'>
  <tr>
<td colspan='2' align='left'><div id='dirRec'>
  
</div></td>
</tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr><tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <input name='' type='button' class='formButton2'   id='button' value='Back' onclick=\"xajax_viewQualiatativeTSOEntered('','','','');return false;\"> | <a href='print_version.php?linkvar=Print TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>
  ";
		  
		  }

  
		  
		  $data.="
	  
</table>
</form>
  
  </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function ResultLead_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table cellspacing='0'  width='700' border='0'>
";



$query_string="select rl.narrative_id,rl.resultarea,s.subcomponent,s.subcomponent_code,rl.reportingPeriod,rl.year,rl.briefIntroduction,rl.listActivities,rl.descriptionOfImplementation,rl.resultsAndAchievements,rl.challenges,rl.goodpracticesandlessons,u.upload_id,u.documentName,u.content from tbl_resultleadreporting rl inner  join tbl_subcomponent s on(s.id=rl.resultarea) left join tbl_uploads u on(rl.narrative_id=u.narrative_id) where display='Yes'  and rl.narrative_id='".$narrative_id."' order by rl.year,rl.reportingPeriod Asc";

$queryRL=mysql_query($query_string)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryRL)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
  $data.="<tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>
	  
	  
	<tr class='evenrow3'>
  <td width='100%' colspan=2>
  <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  COUNTRY OFFICE STAFF QUARTERLY REPORT </strong></div></td>
 </td>
</tr>
	<tr class='white1'>
  <td width='50'>
  <div align='left'><strong>Result Area:</strong></div></td>
  <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['subcomponent_code']." ".$row['subcomponent']."</td>
</tr>
   <tr class='evenrow3'>
  <td colspan=2>
  <div align='justify'><p></p><strong>A brief introduction of the report</strong></div></td></tr>
<tr class='evenrow3'> <td colspan=2  align='justify'><p></p><p><li>".$row['briefIntroduction']."</li></p></td></tr>
</tr>
   <tr>
  <td colspan=2>
  <div align='justify' ><p></p><strong>Activities that were planned to be implemented during the reporting period and the expected targets/outputs</strong></div></td></tr>
		  <tr>
  <td colspan=2 align='justify'><p></p><p><li>
   ".$row['listActivities']."</li></p></td>
</tr>";
		
		
$data.="<tr class='evenrow3'>
  <td colspan=2>
  <div align='left'><p></p><strong>A detailed description of implementation of each of the activities listed above during the quarter</strong></div></td></tr>
		 <tr class='evenrow3'>
  <td colspan=2><p></p><p><li>
".$row['descriptionOfImplementation']."</li></p></td>
</tr>
   <tr>
  <td colspan=2>
  <div align='justify'><p></p><strong>A concise description of key specific results and achievements obtained, both quantitative and qualitative, during the quarter in relation to the annual targets</strong></div></td></tr>
		  <tr>
  <td colspan=2 align='justify'><p></p><p>
 <li>".$row['resultsAndAchievements']."</li></p></td>
</tr>
<tr class='evenrow3'>
  <td colspan=2>
  <div align='justify'><p></p><strong>main challenges faced, their effect on project implementation, how they were or will be addressed </strong></div></td></tr>
		 <tr class='evenrow3'>
  <td colspan=2><p></p><p><li>".$row['challenges']."</li></p></td>
</tr>
   <tr>
  <td colspan=2 align='justify'><p></p>
  <strong>Good practices and lessons learned  during the quarter </strong></td></tr>
  <tr>

  <td colspan=2 align='justify'><p></p><p><li>".$row['goodpracticesandlessons']."</li></p></td></tr>";
		  
		 /*  $sqlupload="select * from tbl_uploads where narrative_id='".$row['narrative_id']."' and responsible like 'Results Lead'";
		  $obj->addAlert($sqlupload);
		  $queryupload=mysql_query($sqlupload)or die(http(0822));
		   while($rowupload=mysql_fetch_array($queryupload)){ */
		$data.="<tr><td>Attached Deliverable:</td><td colspan='' align='justify'><a href='export_to_excel_word.php?linkvar=Export Attached Deliverable&&upload_id=".$row['upload_id']."&&format=word'>".$row['documentName']."<input name='' type='button' class='formButton2'   id='button' value='Download'></a></td></tr>";
		  #}
		   $data.="<tr><td colspan='' align='justify'></td><td colspan='' align='justify'></td></tr>";
$data.="<tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>";
		  
		  }

  
		  
		  $data.="</table></form>
  
  </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function Staff_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
<table cellspacing='0'  width='700' border= 0'>
";


$query_string="select st.narrative_id,st.region,z.zoneName,st.districtsVisited,st.OtherpersonsonTrip,st.purposeofTrip,st.personsMet, st.AccountofTrip,st.reportingPeriod,st.year,st.FinancialYear,st.Findings,st.actionPoints,st.ConclusionsAndRecommendations,
 st.followUpAreas,st.report,st.report2,st.updatedby,st.display,st.to_datevisited,st.from_datevisited from  tbl_staffreporting st inner join tbl_zone z on(z.zoneCode=st.region) where st.display='Yes' and narrative_id='".$narrative_id."' order by 1 asc ";

$queryTSO=mysql_query($query_string)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
  $data.="<tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print Field Trip Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export Field Trip Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>
	  
	  
	<tr class='evenrow3'>
  <td width='100%' colspan=2>
  <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  FIELD TRIP REPORT SUMMARY </strong></div></td>
 </td>
</tr><tr class='evenrow3'>
  <td width='100%' colspan=2>
  <div align='center'><strong> By</strong></div></td>
 </td>
</tr>
		<tr class='evenrow3'>
  <td width='100%' colspan=2>
  <div align='center'><strong>".strtoupper($_SESSION['name'])." </strong></div></td>
 </td>
</tr>
	<tr class='white1'>
  <td width='30%'>
  <div align='left'><strong>Region:</strong></div></td>
  <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['zoneName']."</td>
</tr>
   <tr class='evenrow3'>
  <td colspan=''>
  <div align='justify'><p></p><strong>Districts Visited in the Region:</strong></div></td>
  <td colspan=''  align='justify'>".$row['districtsVisited']."</td>
</tr>
   <tr>
  <td colspan=''>
  <div align='justify' ><p></p><strong>Dates of the visit:</strong></div></td>
  <td colspan='' align='justify'>From ".$row['from_datevisited']."  to  ".$row['to_datevisited']."</td>
</tr>
		 <tr class='evenrow3'>
  <td colspan='' >
  <div align='justify' ><strong>Other Persons on the Trip:</strong></div></td>
  <td colspan='' align='justify'>".$row['OtherpersonsonTrip']."</td>
</tr>";
		
		
$data.="
   <tr>
  <td colspan=2>
  <div align='justify'><p></p><strong>Purpose of Trip and Objective(s)</strong></div></td></tr>
		  <tr>
  <td colspan=2 align='justify'><p></p><p>
 <li>".$row['purposeofTrip']."</li></p></td>
</tr>
		<tr class='evenrow3'>
  <td colspan=''>
  <div align='left'><strong>Persons met during the trip</strong></div></td><td colspan=''>
".$row['personsMet']."</td>
</tr>
<tr class=''>
  <td colspan=2>
  <div align='justify'><p></p><strong>Account of the Trip</strong></div></td></tr>
		 <tr class=''>
  <td colspan=2><p></p><p><li>".$row['AccountofTrip']."</li></p></td>
</tr>
   <tr class='evenrow3'>
  <td colspan=2 align='justify'><p></p>
  <strong>Findings</strong></td></tr>
  <tr class='evenrow3'>

  <td colspan=2 align='justify'><p></p><p><li>".$row['Findings']."</li></p></td>
</tr>
  <tr class=''>
  <td colspan=2><div align='justify' ><p></p><strong>Action points</strong></div></td></tr>
<tr><td colspan=2><p><li>".$row['actionPoints']."</li></p></td>
</tr>
<tr class='evenrow3'>
  <td colspan=2 align='justify' ><div '><p></p><strong>Conclusions and Recommendations</strong></div></td></tr>
<tr class='evenrow3'>
  <td colspan=2 align='justify'><p></p><p><li>".$row['ConclusionsAndRecommendations']."</li></p></td>
</tr>
<tr>
  <td colspan=2>
  <div align='left'><strong>Follow-up areas</strong></div></td></tr>
		  <tr><td colspan='2'><li>".$row['followUpAreas']."</li></td></tr>";

$data.="<tr>
		</table>
		
		<table cellspacing='0'  width='700' cellpadding='5' cellspacing='5' align='left'>
  <tr>
<td colspan='2' align='left'><div id='dirRec'>
  
</div></td>
</tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr><tr class='evenrow3'>
  <td></td>
  
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print Field Trip Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'   id='button' name='' id='button' value='Print Version'  /></a> |
<a href='export_to_excel_word.php?linkvar=Export Field Trip Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'   id='button' name='' id='button' value='Export to Word'  /></a>
  </div></td>
</tr>
  ";
		  
		  }

  
		  
		  $data.="
	  
</table>
</form>
  
  </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function view_FarmersProductionRecordsReportLog($year,$quarter,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']='';
$prog_id=1;
$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 
//$obj->alert($_SESSION['Ryear']);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
<td colspan='3' ><div align='center' class=''>YEAR</div></td><td colspan='10' A ><div align='left' class=''><select name='year' id='year' onchange=\"xajax_view_FarmersProductionRecordsReportLog(this.value,'','".$organization."'); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($year==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		
		$data.="</select></strong></div></td>
</tr>
		<tr class='evenrow'>
<td colspan='3' ><div align='center' class=''>Orgnization</div></td><td colspan='10' A ><div align='left' class=''><select name='organization' id='organization' onchange=\"xajax_view_FarmersProductionRecordsReportLog('".$year."','',this.value); return false;\" style='width:300px;'><option value=''>-All-</option>";
		 $s=@mysql_query("select * from tbl_organization order by orgName asc")or die(http("PR-1221"));
		 while($end=@mysql_fetch_array($s)){
		 $data.="<option value=\"".$end['org_code']."\" ".checkExistance($end['org_code'],$organization,'selected').">".$end['orgName']."</option>";
		}
		$data.="</select></strong></div></td>
</tr>

	  <tr>
<th colspan='13' ><div align='center' class=''>SEMI-ANNUAL perfomance REPORT</div></th>
</tr>
  
  <tr>
	  <th ><b class=''>NO.</th>
	   <th width='' colspan=7 ><strong class=''>Organization</strong></th>
		<th  width='70'><strong class=''>Oct - Mar</strong></th>
		
		<th  width='70'><strong class=''>Apr - Sep</strong></th>
		 </tr>";

#$query_string="select * from tbl_tsoqualitative qr join  tbl_organization o on(o.org_code=qr.org_code) join tbl_lookup l on(l.code=qr.intervention) where l.classCode='5' order by o.org_code,qr.year,qr.reportingPeriod Asc";
$query_string="select * from tbl_organization where org_code like '".$organization."%' order by orgName";

#$obj->addAlert($_SESSION['name']);
$query=mysql_query($query_string)or die(http("PR-0185"));


/**************  paging parameters ****/
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("PR-1292"));
	
	





	  while($row=mysql_fetch_array($new_query)){


$query_string="select l.orgName,q.fid,q.org_code,
 			q.quarter,q.year,
			sum(if(((q.quarter='Oct - Mar')  
			and q.year='".$_SESSION['Ryear']."'),1,'')) AS Quarter1,
			sum(if(((q.quarter='Apr - Sep')  and q.year='".$_SESSION['Ryear']."'),1,'')) AS Quarter2
			from tbl_organization l left join tbl_farmerproductionrecords q  on(l.org_code=q.org_code) 
 			where l.org_code ='".$row['org_code']."'
 			group by l.org_code 
			order by l.org_code Asc"; 
 $query_n=mysql_query($query_string)or die(http("PR-0185"));
// $obj->alert($query_string);
while($rowq=mysql_fetch_array($query_n)){
//$obj->alert($row['id']);
$_SESSION['org_code']=$row['org_code'];
$div="status".$row['org_code'];
	  $color=$n%2==1?"evenrow3":"white1";
 $data.="<tr class=$color class='black'>
	 <td>".$inc++."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$row['org_code']."' />
	 <input name='narrative_id[]' id='narrative_id' type='hidden' value='".$row['org_code']."' />
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$row['org_code']."'>".ucfirst(strtolower($row['orgName']))."</td>
		<td align='center'>";


if(($rowq['Quarter1']<>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdFarmersRecord('Oct - Mar','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_FarmersProductionRecords('".$row['org_code']."',1);return false;\">";
}

$data.="</td>
<td align='center'>";


if(($rowq['Quarter2']<>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdFarmersRecord('Apr - Sep','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_FarmersProductionRecords('".$row['org_code']."',1);return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='$div'></div></td></tr>
	  
	  ";
	  $n++;
	  }
	  }
	  
	  $data.="<tr><td align='right' colspan='10'>";
	  
	  $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;



if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_FarmersProductionRecordsReportLog('".$_SESSION['Ryear']."','".$_SESSION['quarter']."','".$organization."','1','".$records_per_page."');return false;\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_FarmersProductionRecordsReportLog('".$_SESSION['Ryear']."','".$_SESSION['quarter']."','".$organization."','1','".$records_per_page."');return false;\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_FarmersProductionRecordsReportLog('".$_SESSION['Ryear']."','".$_SESSION['quarter']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_FarmersProductionRecordsReportLog('".$_SESSION['Ryear']."','".$_SESSION['quarter']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onclick=\"xajax_view_FarmersProductionRecordsReportLog('".$_SESSION['Ryear']."','".$_SESSION['quarter']."','".$organization."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

   
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_TSOquantitativeReporting($subcomponent_id,$org_code,$district,$subcounty,$zone){
$obj= new xajaxResponse();
$n=1;
 //$org_code=$_SESSION['managerorg_code'];
 //$obj->addAlert($org_code."xxxxxxx".$_SESSION['org_code']);
$_SESSION['districtCode']='';
#$_SESSION['ParishCode']
 $_SESSION['subcounty']=$subcounty;
  $_SESSION['parish']=$parish;
$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
//$year=($_SESSION['year']!='')?$_SESSION['year']:$_SESSION['Activeyear'];
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;
$_SESSION['districtCode']=$district;
$_SESSION['subcountyCode']=$subcounty;
$_SESSION['subcomponent_id']=$subcomponent_id;
 $data="<form name='TSOQuantitativeReporting' id='TSOQuantitativeReporting' method='post' action='".$PHP_SELF."' >
<table cellspacing='0'  id='' width='100%'>
<tr class='evenrow'>
<td width=50>District/Municipality:</td>
<td colspan='5'><select name='district' id='district' onchange=\"xajax_new_TSOquantitativeReporting('','',getElementById('district').value,'".$_SESSION['zone']."','".$_SESSION['org_code']."')\" style='width:700px;'><option value=''>-select-</option>";

	$querydistrict=mysql_query("select * from tbl_district where zone like '".$_SESSION['zoneCode']."%' order by districtName asc")or die(http(0702));
	while($rowdistrict=mysql_fetch_array($querydistrict)){
	$seldistrictCode=($_SESSION['districtCode']==$rowdistrict['districtCode'])?"SELECTED":"";
	$data.="<option value=\"".$rowdistrict['districtCode']."\" ".$seldistrictCode." >".$rowdistrict['districtName']."</option>";
	}
	
	$data.="</select></td>
  </tr>  
  <tr class='evenrow'>
<td width=50>Subcounty/Division:</td>
<td colspan='5'><select name='subcounty' id='subcounty' style='width:700px;'><option value=''>-select-</option>";
 
	$querysubcounty=mysql_query("select * from tbl_subcounty where districtCode='".$_SESSION['districtCode']."' order by subcountyName asc")or die(http(0702));
	while($rowselsubcounty=mysql_fetch_array($querysubcounty)){
	$selsubcounty=($_SESSION['subcountyCode']==$rowselsubcounty['subcountyCode'])?"SELECTED":"";
	$data.="<option value=\"".$rowselsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowselsubcounty['subcountyName']."</option>";
	}
	
	$data.="</select></td>
  </tr>
   
		   <tr class='evenrow' style='display:none;'>
<td width=50>Parish/Ward:</td>
<td colspan='5'><select name='parish' id='parish' style='width:700px;'><option value=''>-select-</option>";
 
	$queryparish=mysql_query("select * from tbl_parish order by ParishCode asc")or die(http(0702));
	while($rowselparish=mysql_fetch_array($queryparish)){
	$selparish=($_SESSION['ParishCode']==$rowselparish['ParishCode'])?"SELECTED":"";
	$data.="<option value='".$rowselparish['ParishCode']."' '".$selparish."'>".$rowselparish['ParishName']."</option>";
	}
	
	$data.="</select></td>
  </tr>
<tr><td>";
			
//where id='".$_SESSION['usersubcomponent']."'
  $data.="<tr class='evenrow'>
<td scope='col' width=50>Intermediate Results Area:</td>
<td scope='col' colspan='5'><select name='subcomponent_id' id='subcomponent_id' style='width:700px;'  onchange=\"xajax_new_TSOquantitativeReporting(getElementById('subcomponent_id').value,'".$_SESSION['org_code']."',getElementById('district').value,getElementById('subcounty').value,'".$_SESSION['subcountyCode']."')\"><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_subcomponent ")or die(http(0714));
	while($row1=mysql_fetch_array($query)){
	$selectedSubcomponent=($row1['id']==$_SESSION['subcomponent_id'])?"SELECTED":"";
	$data.="<option value=\"".$row1['id']."\" ".$selectedSubcomponent."  >".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,100)."</option>";
	}
	$data.="</select></td>
  </tr>
 <tr>
  <th height='26' bordercolor='' bgcolor='' class='black2'>NO.</th>
			  <th bordercolor='' bgcolor='' class='black2'>Sub-Intermediate Result Area</>
  <th bordercolor='' bgcolor='' class='black2'>Indicator</th>
   <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Female</th>
		   <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Male</th>
  <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Total</th>
   </tr>";
		   $inc=1;
		   // where i.output_id='".$activity_id."' 
		   $x="select i.indicator_id,i.indicator_name,i.order_of_reporting,i.disaggregation,i.subcomponent_id,o.output_name,o.output_code,i.output_id from tbl_indicator i inner join tbl_output o on (o.output_id=i.output_id) where i.subcomponent_id='".$_SESSION['subcomponent_id']."' and order_of_reporting <> 0 and responsible like 'TSO%' and responsible not like 'Managers%' order by i.order_of_reporting asc";
		  # $obj->addAlert($x);
		 $query1=mysql_query($x)or die(http(0755));
			 $m=1;
			 if(mysql_num_rows($query1)>0){
		while($rowi=mysql_fetch_array($query1)){
		 $m=$rowi['indicator_id'];
			
		  $color=$inc%2==1?"evenrow":"white1";

$disaggregationbyGender=($rowi['disaggregation']=='None')?"<td  align='right'><input name='female[]' type='text' id='female".$m."' class='disabled' disabled size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
		   <td  align='right'><input name='male[]' type='text' id='male".$m."' size='10' class='disabled' disabled onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
  <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
			  
			  ":"<td  align='right'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
		   <td  align='right'><input name='male[]' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
  <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,'total".$m."')\" value='' readonly='readonly'/></td>";
			  
$data.="<tr class=$color>
<td bordercolor=''><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
<td>".$rowi['output_code']." ".$rowi['output_name']."</td>
<td bordercolor=''><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
   ".$disaggregationbyGender."
</tr>";
	
	$inc++;
	$m++;
	}
	}
	else{
	#$obj->addAlert("No Results Found!");
}
		  $data.="</tr>
 </td></tr>
 <tr><td></td><td></td><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right' colspan=4>
   <input name='save' type='button' class='formButton2'   id='button' value='Save' style='width:100px;' onclick=\"xajax_save_TSOQuantitativeReporting(xajax.getFormValues('TSOQuantitativeReporting'));return false;\"></td>
</tr>
  
  
</table></form>";		 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function viewQualitativeEnteredData(){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;

$data.="<form name='organization' id='organization'   action='?' method='post'>
";


$data.="<table cellspacing='0'  width='668' border='0'> ".filter_tsoQualitative()." 
	  <tr>
<th colspan='10' ><div align='center' class=''>TECHNICAL SERVICES ORGANIZATIONS (TSO) QUALITATIVE REPORT</div></th>
</tr>
  
  <tr>
	  <th ><b class=''>NO.</th><th><b class=''>SELECT</th>
	   <th width='' ><strong class=''>INTERVENTION</strong></th>
	  <th width='' ><strong class=''>TSO NAME</strong></th>
	 
<th width='' ><strong class=''>PLANNED ACTIVITIES</strong></th>

		<th width=''><strong class=''>IMPLEMENTATION</strong></th>
		<th width=''><strong class=''>OUTPUTS</strong></th>
		<th width=''><strong class=''>DEVIATIONS</strong></th>
		<th ><strong class=''>CHALLENGES</strong></th>
	
		<th  width=''><strong class=''>ACTION</strong></th>
		

  </tr>";
/* $query_string="select * from view_organization where lower(orgName) like '".strtolower($orgname)."%'&& lower(organization_type) like '".strtolower($orgtype)."%'&& lower(district) like '".strtolower($district)."%' group by orgName order by orgName Asc"; */
$query_string="select * from tbl_lookup  where classCode='5' order by code Asc";

#where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%'&& lower(organization_type) like '".strtolower($_SESSION['orgtype1'])."%'&& lower(district) like '".strtolower($_SESSION['district1'])."%$feedback->addAlert($query_string);'


$query_=mysql_query($query_string)or die(http(0186));

	  while($row=mysql_fetch_array($query_)){

	
	  $color=$n%2==1?"#e6e6e6":"#ffffff";
 $data.="<tr bgcolor=$color class='black'>
	 <td>".$inc++."</td>
	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' /></td>
	  <td>".$row['codeName']."</td>
	 <td><input name='".$row['org_code']."' id='".$row['org_code']."' type='hidden' value=''/><a href='#' onclick=\" xajax_view_allorganization('".$row['org_code']."');\" class='greenlinks2'>".mysql_real_escape_string($row['orgName'])."</a></td>
	 <td>".$row['plannedActivities']."</td>
	 <td>".$row['implementation']."</td>
	 <TD>".$row['achievements']."</TD>
	  <TD>".$row['deviations']."</TD>
	 <td>".$row['challenges']."</td>

<td><input name='details' type='button' class='formButton2'   id='button' value='Details' /></td>
	  </tr>";
	  $n++;
	  }
$data.="<tr class='evenrow'>
 
<td colspan=8><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_organization','');return false;\" value='Delete' class='redhdrs' /></td>

	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_calc($male,$female,$total){
$obj= new xajaxResponse();
$totalValue=0;

$totalValue=($male+$female);
#$obj->addAlert($total."ppppppppp".$male."-".$female."-".$totalValue);
$obj->assign($total,"value",$totalValue);
//$data.="<input name='total[]' type='text' id='total' value='".$total."'  size='10' readonly='readonly' />";
return $obj;
}
function Display($id,$narrative_id){
$obj= new xajaxResponse();
#$checked='';

if($narrative_id->checked==true){
$obj->assign($id, 'style', 'color:#ff0000;');
}
else{
$obj->assign($id, 'style', '');
}

return $obj;
}
//gender for growth
function view_TSOquantitativeReporting($output,$indicator,$quarter,$year){
$obj= new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}

$_SESSION['TSOsubresultarea']='';
$_SESSION['TSOindicator']='';
$_SESSION['TSOyear']='';
$_SESSION['TSOquarter']='';
$_SESSION['TSOsubresultarea']=$output;
$_SESSION['TSOindicator']=$indicator;
$_SESSION['TSOyear']=$year;
$_SESSION['TSOquarter']=$quarter;
#$_SESSION['org_code']=$tso;

$data="<form name='annualTarget1' id='annualTarget1' method='post' action='".$PHP_SELF."'><table cellspacing='0'  width='700' border='0'>
 
  <tr><td colspan='9'>
  ".filter_TSOquantitativeReporting()."</td></tr>
  <tr  class='evenrow'>
 
<td colspan='6'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TSOquantitativeReporting(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget1'),'Delete_QuantitativeReportDetails','');return false;\" value='Delete' class='redhdrs' /></td>
<td colspan='4'></td>

  </tr>
  <tr>
  <tr>
<th scope='col'>SELECT</th>
	<th scope='col'> YEAR</th>
	<th scope='col'> REPORTING PERIOD</th>

	   <th scope='col'>SUB-INTERMEDIATE RESULT AREA</th>
<th scope='col'>INDICATOR</th>
<th scope='col' align='RIGHT'> MALE</th>
<th scope='col' align='RIGHT'> FEMALE</th>
   
<th scope='col' align='RIGHT'>TOTAL</th>
  </tr>";
  $n=1; $inc=1;
  $query_string="select r.id,r.org_code,r.district,r.subcounty,r.parish,r.year,r.reportingPeriod,r.indicator_id,i.indicator_name,i.output_id,o.output_name,r.male,r.female,r.total from tbl_organizationreporting r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_output o on(i.output_id=o.output_id) where i.indicator_name like 
  '".$_SESSION['TSOindicator']."%' and o.output_name like '".$_SESSION['TSOsubresultarea']."%' and  r.reportingPeriod like '".$_SESSION['TSOquarter']."%' and r.year like '".$_SESSION['TSOyear']."%' and r.org_code ='".$_SESSION['org_code']."' order by i.indicator_id asc";
#$obj->addAlert($query_string);
 $query=mysql_query($query_string)or die(http(2097));
  $inc=1;
$cur_page=1;
$records_per_page=20;
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);

$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1000));

   # LimitRecords($query_string,$query);
   while($row=mysql_fetch_array($new_query)){ 
  #$color=$inc%2==1?"#f0e5a5":"#ffffff";
  $male=$row['male'];
   $m=$male>0?$male:"-";
$female=$row['female'];
   $f=$female>0?$female:"-";

$color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
<td><input name='TSO_id[]' type='checkbox' id='TSO_id' value='".$row['id']."' />".$n++."</td>
   <td align='RIGHT'>".$row['year']."</td>
<td align=''>".$row['reportingPeriod']."</td>
	 <td colspan=''>$row[output_name]</td>
 <td colspan=''>$row[indicator_name]</td>
<td align=right>".$m."</td>
<td align=right>".$f."</td>
   
<td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
 $data.="<tr  class='evenrow'>
 
<td colspan='4'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' title='Edit'  onclick=\"xajax_edit_TSOquantitativeReporting(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget1'),'Delete_QuantitativeReportDetails','');return false;\" value='Delete' class='redhdrs' /></td>";
$fxnName="view_TSOquantitativeReporting";
	 $data.="<td colspan='4' align='right'>".displayPages($fxnName,$query,$cur_page,$records_per_page)."</td>
</tr>

</table></FORM>";

$obj->assign("bodyDisplay",'innerHTML',$data);
return $obj;
}
function view_publications(){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='publications' id='publications' method='post'>
<table  width='100%'>";
 
  $data.="
  
  
 
   <tr class='evenrow'>
  <td colspan=9>
  <div id='status'></div>
 </td>
</tr>
 <tr  class='evenrow'> <td colspan='6' align='right'><input name='new_publications' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_publications('');return false;\"> | <a href='export_to_excel_word.php?linkvar=Export Publications&&format=excel'><input name='new_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a></td></tr>
	   <tr class='evenrow'>
  <td width='30%' colspan=3>
  <div align='left' ><strong>Project</strong></div></td>
  <td colspan=3><select name='project' style='width:300px;' ><option value=''>-select-</option>";
		  $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >".substr($ROW['title'],0,100)."</option>";}
		  $data.="</select></td>  
</tr>
	  <tr CLASS='evenrow'>
 
<th colspan=5><center>List of all publications/knowledge products produced</center></th>
	
  </tr>
	 
  <tr>

  
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
<th>Title of Publication <br/>/Knowledge Product</th>
<th>Author & Organization</th>
<th>Date</th>

  </tr>
  <tr CLASS='evenrow'>
  <th colspan='5'><div id='status'></div></th>

  </tr>".selectandDelete_all('11',"edit_publication","publications",'Delete_publications','publication_id','publication_id','tbl_publication','xajax_view_publications','2')."</tr>";
  

  
  
  $n=1;$inc=1;
  $query=mysql_query("select * from tbl_publication where status like 'Yes%'")or die(http("1844"));
  while($row=mysql_fetch_assoc($query)){
$publication_id=$row['publication_id'];
  //$obj->alert($datename);
  $color=($inc%2==1)?"evenrow3":"white1";
  $data.="<tr class='$color' id='report'>".loop_key('publication_id',$row['publication_id'])."<td align='right'>".$n."</td><td>".$row['title']."</td>
<td>".$row['organization']."</td>
<td>".$row['dateofpublication']."</td>
   



  </tr>";
  $n++;
  $inc++;
  }
  
$data.="</tr>".noRecordsFound($query,11).selectandDelete_all('11',"edit_publication","publications",'Delete_publications','publication_id','publication_id','tbl_publication','xajax_view_publications','2')."</tr>
</table>


</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_publications($nhh){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='publications' id='publications' method='post'>
<table  width='100%'>";
 
  $data.="
  
  
 
   <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>
  <tr class='evenrow'>
  <td colspan='2'>Select the Number of Publications to Make</td><td colspan='2'><select name='nhh' id='nhh' style='width:300px;' onchange=\"xajax_new_publications(getElementById('nhh').value);return false;\"><option value=''>-select-</option>";
	$yr = 21; $end = $yr; do{
		$sel=($_SESSION['nhh']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";

$end--;} while($end>= 1);
  $data.="</select></td></tr>
	   <tr class='evenrow'>
  <td width='30%' colspan=2>
  <div align='left' ><strong>Project</strong></div></td>
  <td colspan=2><select name='project' style='width:300px;' ><option value=''>-select-</option>";
		  $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >".substr($ROW['title'],0,100)."</option>";}
		  $data.="</select></td>
</tr>
	  <tr CLASS='evenrow'>
 
<th colspan=4><center>List of all publications/knowledge products produced</center></th>
	
  </tr>
	 
  <tr>

  
  <tr CLASS='evenrow'>
  <th>NO</th>
<th>Title of Publication <br/>/Knowledge Product</th>
<th>Author & Organization</th>
<th>Date</th>

  </tr>
  <tr CLASS='evenrow'>
  <th colspan='4'><div id='status'></div></th>

  </tr>
  
  ";
  $n=1;
  for($i=0;$i<$_SESSION['nhh'];$i++){
  $datename="datepublished".$n;
  //$obj->alert($datename);
  $data.="<tr class='evenrow'>
  <td>".$n."</td>
<td> <input name='loopkey[]' type='hidden' id='loopkey' size='30' value='1' /><input name='title[]' type='text' id='village' size='30' /></td>
<td><input name='organization[]' type='text' id='village' size='30' /></td>
<td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.publications.$datename);return false;\" hidefocus=''>
<input name=\"".$datename."\" type='text'  size='20' value='' id=\"".$datename."\" readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td></td>


  </tr>";
  $n++;
  }
  

 $data.="</tr>
</table>


<div align='right'>
<input type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_publications(xajax.getFormValues('publications')); return false;\" />
</div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_training($nhh){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>
  
  
	  
	  <tr CLASS='evenrow'>
 
<th colspan='10' ><center>Training record summary</center></th>
	
  </tr>

	<tr class='evenrow3'>
  <td width='30%' colspan=''>
  <div align='left'><strong>Program</strong></div></td>
  <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_programme";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >".substr($ROW['program_name'],0,500)."</option>";}
		  $data.="</select></td>
</tr>

  
  <tr CLASS='evenrow'>

<td>Training course title</td> <td> <input name='loopkey[]' type='hidden' id='loopkey' size='50' value='1' />
	<input name='course[]' type='text' id='course' size='53' /></td>
	</tr>
	<tr class='evenrow'>
<td>Provided by</td>
	 <td><input name='trainer[]' type='text' id='trainer' size='53' /></td>
	</tr>
	<tr class='evenrow'>
<td colspan=10><table>
	<tr>
	<th>No</th>
	<th>Type of Participants</th>
	<th>No. of Male participants</th>
	<th>No. of Female participants</th>
	<th>Total No. of participants</th></tr>";
	$n=1;
	for($x=0;$x<5;$x++){
	$data.="<tr class='evenrow'>
	<td>".$n."</td>
	<td></td> <td> <input name='male[]' type='text' id='male".$n."' size='20' onKeyPress='return numbersonly(event, false)' /></td>
	<td><input name='female[]' type='text' id='female".$n."' size='20' onKeyPress='return numbersonly(event, false)' /></td>
	<td><input name='total[]' six='20' readonly='readonly' onclick=\"xajax_calc_training(getElementById('male".$n."').value,getElementById('female".$n."').value,'total".$n."');\" type='text' id='total".$n."'  /></td></tr>";
	$n++;}
	
	

  $data.=" </table></td>
	 
</tr>
 
  ";
 
 
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_training(xajax.getFormValues('projects')); return false;\" />Save</button>
</div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#-======new training Particpants===================
function new_CFTechnicalTrainingActivities($region,$district,$organization,$fyear){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
return $obj;
}

$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
$fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
#$obj->alert($_SESSION['parishCode']);
//$n=1;
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  			<tr class='evenrow'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Region</strong></div></td>
  <td colspan='12'><select name='region' id='region' onchange=\"xajax_new_CFTechnicalTrainingActivities(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
			$data.=QueryManager::ZoneFilter($region);
		  $data.="</select></td>
</tr>
	<tr class='evenrow3'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Field Supervisor Responsible</strong></div></td>
  <td colspan='12'><input type='text' name='fieldofficer' id='fieldofficer' size='60' ></td>
</tr>
<tr class='evenrow3'><td colspan='3'>Project Year:</td>
	<td colspan='12'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::FinancialYearFilter($fyear);
				  $data.="</select></td>
	</tr>
	<tr class='evenrow'><td colspan='3'>Reporting Period</td>
	 <td colspan='12'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
				  $data.="</select></td></tr>
	<tr class='display_none'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
	<tr CLASS='evenrow'>
 
<th colspan='14' ><center>TECHNICAL TRAINING ACTIVITIES</center></th>
	
  </tr>
	
	
	<tr><th colspan='' ROWSPAN='2'>No</th>
		<th ROWSPAN='2' colspan='1'>Trainees</th>
	<th ROWSPAN='2' colspan='1'>DISTRICT</th>
	
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF Herbicide Safety and Use</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='2'><center>Tree Planting</center></th>
	<th ROWSPAN='2' colspan='1'><center>Total</center></th>
		</tr>
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
		<th>Male</th>
	<th>Female</th>

	</tr>";
	
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	<td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'>
	".funct_dropDown('tbl_trainees', 'Name', 'code', 'Name')."</select></td>
	<td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
	
	 	$data.=QueryManager::DistrictFilter($region,$district);
	
	$data.="</select></td>
	
	<td>
	
	
	
	<input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
	<input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
	<input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
	
	onKeyPress='return numbersonly(event, false)'
	

	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
		onKeyPress='return numbersonly(event, false)'
	
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td>
		<input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
	<input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
	<input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
	<input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
	<input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
	<input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
		
		onKeyPress='return numbersonly(event, false)'
		
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
		<input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
		<input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
	<input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	<td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
		onKeyPress='return numbersonly(event, false)'
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
	<td>
	
	
		<input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
	<input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
	<input name='maletreeplanting[]' size='10'  type='text' id='maletreeplanting".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaletreeplanting[]' size='10'  type='text' id='femaletreeplanting".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
		<td><input name='total[]' size='20' type='text' id='total".$n."'  
			onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
	</tr>";
	
	
	
	/**/
	
	$n++;
	
	}
	
	

  $data.=" 
 <tr style='display:none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  <tr style='display:none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
 $data.="<tr class='evenrow'><td></td><td colspan='14' align='right'><div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_TechnicalTraining(xajax.getFormValues('projects')); return false;\" />Save</button>
</div></td></tr>
</table>



</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_FieldDaysandDemonstrations($region,$district,$organization,$fyear){
$obj=new xajaxResponse();
	if($_SESSION['user_id']==''){
	$obj->redirect('index.php');
	return $obj;
	}
	if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
	$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
	return $obj;
	}
	if($region==NULL)
	{
	$obj->alert("Select A region to Continue!");
	return $obj;
	}

$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
$fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
#$obj->alert($_SESSION['parishCode']);
//$n=1;
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  			<tr class='evenrow'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Region</strong></div></td>
  <td colspan='16'><select name='region' id='region' onchange=\"xajax_new_FieldDaysandDemonstrations(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
			$data.=QueryManager::ZoneFilter($region);
		  $data.="</select></td>
</tr>
	<tr class='evenrow3'>
  <td width='30%' colspan='3'>
  <div align='left'><strong>Field Supervisor Responsible</strong></div></td>
  <td colspan='16'><input type='text' name='fieldofficer' id='fieldofficer' size='48' ></td>
</tr>
<tr class='evenrow3'><td colspan='3'>Project Year:</td>
	<td colspan='12'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::FinancialYearFilter($fyear);
				  $data.="</select></td>
	</tr>
	<tr class='evenrow'><td colspan='3'>Reporting Period</td>
	 <td colspan='16'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
				  $data.="</select></td></tr>
	<tr class='display_none'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
	<tr CLASS='evenrow'>
 
<th colspan='16' ><center>Field days and demonstrations </center></th>
	
  </tr>
	
	
	<tr>
	<th colspan='2' ROWSPAN='3'>No</th>
	<th ROWSPAN='3' colspan=''><center>DISTRICT</center></th>
	<th  colspan='9'><center>Field days conducted</center></th>
	<th colspan='3' rowspan='2'><center>demonstrations</center></th>
	
		</tr>
		
		<tr>
		<th  colspan='3'>District (Major) Field days</th>
		<th  colspan='3'>DC (Regular) Field days</th>
		<th  colspan='3'>PO (Specific) Field days</th>

	
		</tr>
	
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>No of F/Days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No of F/Days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No of F/Days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No of Demos</th>
	
	</tr>";  
	
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td colspan='2'><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	
	<td colspan=''><select name='district[]' id='district' style='width:100px;'><option value=''>-select-</option>";
	
	 	$data.=QueryManager::DistrictFilter($region,$district);
	
	$data.="</select></td>
	
	<td>
	
	
	
	<input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
	<input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
	<input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
	
	onKeyPress='return numbersonly(event, false)'
	

	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
		onKeyPress='return numbersonly(event, false)'
	
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	 
	 <td><input name='fdaydm[]' size='10'  type='text' id='fdaydm".$n."' 
		onKeyPress='return numbersonly(event, false)'  /></td>
	 
	 
	 
	<td>
		<input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
	<input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
	<input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	  <td><input name='fdaydr[]' size='10'  type='text' id='fdaydr".$n."' 
		onKeyPress='return numbersonly(event, false)'  /></td>
	<td>
	<input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
	<input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
	<input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
		
		onKeyPress='return numbersonly(event, false)'
		
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
	<td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	  <td><input name='fdaypo[]' size='10'  type='text' id='fdaypo".$n."' 
		onKeyPress='return numbersonly(event, false)'  /></td>
	<td>
		<input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
		<input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
	<input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	<td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
		onKeyPress='return numbersonly(event, false)'
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
		<td><input name='ndemo[]' size='10'  type='text' id='ndemo".$n."' 
		onKeyPress='return numbersonly(event, false)'  /></td>
		
		</tr>";
	
	
	
	/**/
	
	$n++;
	
	}
	
	

  $data.=" 
 <tr style='display:none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  <tr style='display:none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
 $data.="<tr class='evenrow'><td></td><td colspan='14' align='right'><div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_FieldDaysandDemonstrations(xajax.getFormValues('projects')); return false;\" />Save</button>
</div></td></tr>
</table>



</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#-======new training Particpants===================
function new_TrainingParticipants($district){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>
  
  
	  
	  <tr CLASS='evenrow'>
 
<th colspan='10' ><center> PARTICPANTS TRAINING details</center></th>
	
  </tr>

<tr class='display_none'>
  <td width='30%' colspan=''>
  <div align='left'><strong>Task</strong></div></td>
  <td colspan=''><select name='task' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_lookup where classCode='23' order by codeName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		//$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['code']."\" ".$selected." >".substr($ROW['codeName'],0,500)."</option>";}
		  $data.="</select></td>
</tr>
	<tr class='evenrow3'>
  <td width='30%' colspan=''>
  <div align='left'><strong>District</strong></div></td>
  <td colspan=''><select name='district' id='district'  onchange=\"xajax_new_TrainingParticipants(this.value);return false;\" style='width:300px;'><option value=''>-select-</option>";
		   $sql="select * from tbl_district  order by districtName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($district==$ROW['districtCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['districtCode']."\" ".$selected." >".substr($ROW['districtName'],0,500)."</option>";}
		  $data.="</select></td>
</tr>
<tr class='evenrow3'><td>Provided by</td>
	 <td><input name='trainer' type='text' id='trainer' size='50' /></td>
	</tr>
	<tr class='evenrow'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
	<tr class='evenrow'>
<td colspan=10><table>
	<tr>
	<th>NO</th>
	<th>subcounty</th>
	<th>parish</th>
	<th>VILLAGE/LOCATION</th>
	<th>organization</th>
	<th>training topic</th>
	<th>trainees</th>
	<th>naME</th>
	<th>SEX</th>
	<th>NUMBER OF TIMES<br> TRAINED ON <br>THIS TOPIC</th>
	</tr>";
	$n=1;
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' six='20'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	<td colspan=''><select name='subcounty[]' id='subcounty' style='width:100px;'><option value=''>-select-</option>";
	
	 $sql="select * from tbl_subcounty where districtCode='$district'  order by subcountyName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		//$selected=($district==$ROW['subcountyCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['subcountyCode']."\" ".$selected." >".substr($ROW['subcountyName'],0,500)."</option>";}
	
	$data.="</select></td>
	<td colspan=''><select name='parishCode[]' id='parishCode' style='width:100px;'><option value=''>-select-</option>";
	$sql="select * from tbl_parish where districtCode='$district'  order by ParishName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		//$selected=($district==$ROW['subcountyCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['parishCode']."\" ".$selected." >".substr($ROW['ParishName'],0,500)."</option>";}
	
	$data.="</select></td>
	<td><input name='village[]' six='20'  type='text' id='total".$n."'  /></td>
	<td colspan=''><select name='org_code[]' id='org_code' style='width:100px;'>".funct_dropDown('tbl_organization', 'orgName', 'org_code', 'orgName')."</select></td>
	<td colspan=''><select name='trainingtopic[]' id='trainingtopic' style='width:100px;'>".funct_dropDown('tbl_trainingtopic', 'topic', 'code', 'topic')."</select></td>
	<td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'>".funct_dropDown('tbl_trainees', 'Name', 'code', 'Name')."</select></td>
	
	<td><input name='name[]' type='text' id='name".$n."' size='30'  /></td>
	<td><select name='sex[]' id='sex'>
	<option value=''>-select-</option>
	<option value='1'>Male</option>
	<option value='2'>Female</option>
	</select></td></td>
	<td><select name='num_training[]'  style='width:100px;' ><option value=''>-select-</option>";
		  $sql="select * from tbl_lookup where classCode='12' order by code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
	//	$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['code']."\" ".$selected." >".substr($ROW['codeName'],0,500)."</option>";}
		  $data.="</select></td>
	</tr>";
	$n++;}
	
	

  $data.=" </table></td>
	 
</tr>
  
   <tr class='display_none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
   <tr class='display_none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
<button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_TrainingParticipants(xajax.getFormValues('projects')); return false;\" />Save</button>
</div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#----------------------------------------------
function view_FarmersProductionRecords($organization,$div){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'><tr class='evenrow'>
  <td width='30%' colspan=3>
  <div align='left' ><strong>Organization:</strong></div></td>
  <td colspan='12'><select name='project' style='width:300px;' onClick=\"xajax_view_FarmersProductionRecords(this.value);\"><option value=''>-ALL-</option>";
		  $sql="select * from tbl_organization  order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("PR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($organization==$ROW['org_code'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['org_code']."\" ".$selected." > ".substr($ROW['orgName'],0,100)."</option>";}
		  $data.="</select></td>
		  <td colspan='11' align='right'><input name='new_training' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_FarmersProductionRecords('".$organization."',1);return false;\"> | <a href='export_to_excel_word.php?linkvar=Export Farmers Production Records&&organization=".$organization."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Farmers Production Records&&organization=".$organization."&&format=Print'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
</tr>";
 
  $data.="".selectandDelete_all('25',"edit_FarmersProductionRecords","projects",'delete_data','fid','fid','tbl_farmerproductionrecords','xajax_view_FarmersProductionRecords','1')."</tr>

  <tr CLASS='evenrow'>
 
<th colspan='25' ><center>farmer production records</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
<th>NAMe</th>
<th>Sex: Male=1,Female=2</th>
<th>Lead Farmer No=0,Yes=1</th>
<th>tOTAL AREA* UNDER CROP PRODUCTION</th>
	<th>AREA* UNDER CROP lEGUMES (BEANS,SOYA BEANS)</th>

	<th>AREA* UNDER HOE BASINS</th>
	<th>CROP</th>
	<th>YIELDS(KGS)</th>
	<th>SELLING PRICE PER KGS</th>
	<th>AREA* UNDER adp RIPPING</th>
	<th>CROP</th>
	<th>YIELDS(KGS)</th>
	<th>SELLING PRICE PER KGS</th>
	
	<th>AREA* UNDER MECHANIZED RIPPING</th>
	<th>CROP</th>
	<th>YIELDS(KGS)</th>
	<th>SELLING PRICE PER KGS</th>
	
	<th>ADOPTED CF/CA NO=0,yES=1</th>
	<th>>AREA* UNDER CF/CA</th>
	<th>>hERBICIDE USE NO=0,YES=1</th>
	<th>BURNT CROP RESIDUES,nO=0,YES=1</th>
	  </tr>";
	  $sql="SELECT `fid`, `org_code`, `FarmerName`, `sex`, `LeadFarmer`,c.crop_id,c.cropName, `Totalareaundercropproduction`, `AreaundercropLegumes`,AreaunderHoebasins, `crophoebasin`, `yieldhoebasin`, `selling_pricehoebasin`, `AreaunderADPripping`, `cropadpripping`, `yieldcropadpripping`, `selling_pricecropadpripping`, `AreaunderMechanizedripping`, `cropmechanized`, `yieldmechanized`, `selling_pricemechanized`, `doptedCF/CA`, `AreaunderCF/CA`, `Herbicideuse`, `Burntcropresidues`, `display`, `updatedby`, `lastupdated` FROM `tbl_farmerproductionrecords` f left join tbl_crops c on(c.crop_id=f.crophoebasin)
	
	  
	   where org_code like '".$organization."%' and  display like 'Yes%'";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	  //$obj->alert($sql);
 $query=mysql_query($sql)or die(http("2140"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
$cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
$data.="<tr class='$color'>
	".loop_key('fid',$row['fid'])."
  <td>".$n."</td>
<td>".$row['FarmerName']."</td>
<td>".$row['sex']."</td>
<td>".$row['LeadFarmer']."</td>
<td align='right'>".$row['Totalareaundercropproduction']."</td>
 <td align='right'>".$row['AreaundercropLegumes']."</td>
  
  <td align='right'>".$row['AreaunderHoebasins']."</td>
   <td align='left'>".$row['cropName']."</td>
<td align='right'>".$row['yieldhoebasin']."</td>
<td align='right'>".$row['selling_pricehoebasin']."</td>
  <td align='right'>".$row['AreaunderADPripping']."</td>
 <td align='left'>".$cropNameADP['cropName']."</td>
<td align='right'>".$row['yieldadpripping']."</td>
<td align='right'>".$row['selling_priceadpripping']."</td>
  <td align='right'>".$row['Areaunderhechanizedripping']."</td>
 <td align='left'>".$cropNameMechanized['cropName']."</td>
<td align='right'>".$row['yieldhechanizedripping']."</td>
<td align='right'>".$row['selling_pricehechanizedripping']."</td>
  <td align='right'>".$row['doptedCF/CA']."</td>
  <td align='right'>".$row['AreaunderCF/CA']."</td>
  <td align='right'>".$row['Herbicideuse']."</td>
  <td align='right'>".$row['Burntcropresidues']."</td>
  
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27).selectandDelete_all('25',"edit_FarmersProductionRecords","projects",'delete_data','fid','fid','tbl_farmerproductionrecords','xajax_view_FarmersProductionRecords','1')."</tr></table></form>";

$obj->assign($div1,'innerHTML',$data);
return $obj;
}
function new_FarmersProductionRecords($organization,$NORc){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$NORc;
$_SESSION['subcountyCode']=$subcounty;
#$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  <tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>
</tr>
  

	<tr class='evenrow3'>
  <td width='30%' colspan=''>
  <div align='left'><strong>Organization</strong></div></td>
  <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_organization order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http("PR-2496"));
		  while($ROW=mysql_fetch_array($query)){

		  $data.="<option value=\"".$ROW['org_code']."\" ".checkExistance($ROW['org_code'],$organization,'selected')." >".substr($ROW['orgName'],0,500)."</option>";}
		  $data.="</select></td>
</tr><tr><td>Number of  Farmers Records to be Registered </td><td><select name='nhh' id='nhh' style='width:300px;' onchange=\"xajax_new_FarmersProductionRecords('".$organization."',this.value);\">";
	$yr = 51; $end = $yr; do{
		$sel=($_SESSION['nhh']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";

$end--;} while($end>= 1);
  $data.="</select></td></tr>

  
  <tr><td colspan=6><div id='statusxxx'></div></td></tr>
	<tr class='evenrow'>
<td colspan=10><table>
	 <tr CLASS='evenrow'>
 
<th colspan='22' ><center>farmer production records</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th >NO</th>
<th>NAMe</th>
<th>Sex: Male=1,Female=2</th>
<th>Lead Farmer No=0,Yes=1</th>
<th>tOTAL AREA* UNDER CROP PRODUCTION</th>
	<th>AREA* UNDER CROP lEGUMES (BEANS,SOYA BEANS)</th>
	<th>AREA* UNDER HOE BASINS</th>
<th>crop</th>
<th>yield (KGS)</th>
<th>SELLING PRICE</th>
	
	
	<th>AREA* UNDER adp RIPPING</th>
	<th>crop</th>
<th>yield (KGS)</th>
<th>SELLING PRICE</th>
	<th>AREA* UNDER MECHANIZED RIPPING</th>
	<th>crop</th>
<th>yield (KGS)</th>
<th>SELLING PRICE</th>
	<th>ADOPTED CF/CA No=0,Yes=1</th>
	<th>AREA* UNDER CF/CA</th>
	<th>hERBICIDE USE No=0,YES=1</th>
	<th>BURNT CROP RESIDUES,no=0,YES=1</th>
	  </tr>";
	$n=1;
	//onclick=\"xajax_calc_training(getElementById('male".$n."').value,getElementById('female".$n."').value,'total".$n."');\"
	for($x=0;$x<$_SESSION['nhh'];$x++){
	$data.="<tr class='evenrow'>
	<td> <input name='loopkey[]' type='hidden' id='loopkey' size='40' value='1'  />".$n."</td>
	<td> <input name='name[]' type='text' id='male".$n."' size='40'  /></td> 
	<td><select name='sex[]' id='sex'>
	<option value=''>-select-</option>
	<option value='1'>Male</option>
	<option value='2'>Female</option>
	</select></td>
	<td> <input name='leadFarmer[]' type='text' id='leadFarmer".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td><input name='total[]' six='20' onKeyPress='return numbersonly(event, false)'  type='text' id='total".$n."'  /></td>
	<td> <input name='croplegumes[]' type='text' id='croplegumes".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>

	<td> <input name='hoebasin[]' type='text' id='hoebasin".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	<td><select name='crophoebasin[]' id='crophoebasin'><option value=''>-select-</option>";
	$s=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row=@mysql_fetch_array($s)){
	$data.="<option value='".$row['crop_id']."' >".$row['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldhoebasin[]' type='text' id='yieldhoebasin".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_pricehoebasin[]' type='text' id='selling_pricehoebasin".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	<td> <input name='adpripping[]' type='text' id='adpripping".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='cropadpripping[]' id='cropadpripping'><option value=''>-select-</option>";
	$s=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row=@mysql_fetch_array($s)){
	$data.="<option value='".$row['crop_id']."' >".$row['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldadpripping[]' type='text' id='yieldadpripping".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_priceadpripping[]' type='text' id='selling_priceadpripping".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	
	<td> <input name='mechanized[]' type='text' id='mechanized".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='cropmechanized[]' id='cropmechanized'><option value=''>-select-</option>";
	$s=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row=@mysql_fetch_array($s)){
	$data.="<option value='".$row['crop_id']."' >".$row['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldmechanized[]' type='text' id='yieldmechanized".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_pricemechanized[]' type='text' id='selling_pricemechanized".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	
	
	<td> <input name='adoptedadpca[]' type='text' id='adoptedadpca".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='areaundercfca[]' type='text' id='areaundercfca".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='herbicideuse[]' type='text' id='herbicideuse".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='burntcropresidues[]' type='text' id='burntcropresidues".$n."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	</tr>";
	$n++;}
	
	

  $data.=" </table></td>
	 
</tr>
  
  ";
 
 
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
<button type='button' class='formButton2' id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_FarmersProductionRecords(xajax.getFormValues('projects')); return false;\" />Save</button>
</div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#************************************
$xajax->processRequest();

  ?>


<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">


    <?php $xajax->printJavascript('xajax_0.5/');

    ?>
    <script language="javascript" type="text/javascript" src="js/check.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <title><?php heading($_GET['action']); ?></title>
    <script type="text/javascript" src="js/number.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
<table width="870" border="0" align="center" id="content_" >
	<tr>
		<td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
	</tr>
	
	<tr>
		<td class='sd-menu-container' style="display:none;" width="190" valign="top">
		
			<table width="190" border="0" >
				<tr>
					<td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
				</tr>
			</table>
		</td>
		
		<td width="660" valign="top" style="background-color: #F8F5EC;" >

		 <?php title($_GET['linkvar'],$_GET['action']);   ?>
			<div id="bodyDisplay">
                <script language="JavaScript" type="text/javascript">

                    <?php
                    if(!isset($FunctionName))$FunctionName='';
                                else $FunctionName='';
                                if(!isset($Arguments))$Arguments='';
                                else $Arguments='';
                    $linkvar='';
                    $linkvar=$_GET['linkvar'];
                    $FunctionName=$_GET['FunctionName'];
                    $Arguments=$_GET['Arguments'];

                    switch($_GET['linkvar']){
					case"TSO Quantitative Reporting":
					?>
					xajax_new_TSOquantitativeReporting('','','','','','','');
					<?php 
					break;
					case"View TSO Quantitative Reporting":
					?>
					xajax_view_TSOquantitativeReporting('','','','','');
					<?php 
					break;
					case"Form3":
					?>
					xajax_view_form3('','','','','',1,20);
					<?php 
					break;
					case"Form4":
					?>
					xajax_view_form4('','','','','',1,20);
					//xajax_view_form4();
					<?php 
					break;
					case"Form2":
					?>
					xajax_view_form2('','','','');
					<?php 
					break;
					case"Form5":
					?>
					xajax_view_form5('','',1,20);
					<?php 
					break;
					case"Performance Narrative Report":
					?>
					xajax_view_qualitativeReporting('','',1,20);
					<?php 
					break;
					case"View TSO Qualitative Reporting":
					?>
					xajax_viewQualiatativeTSOEntered('','','','');
					<?php
					break;
					case"Training Participant Registration":
					?>
					xajax_view_TrainingParticipants('','','');
					<?php
					break;
					case"CF Technical Training Activities":
					?>
					xajax_ViewCFTechnicalTrainingActivities('','','','','','','','','','',1,20);
					<?php
					break;
					case"CF/CA Adoption rates":
					?>
					xajax_ViewAdoptionRates('','','','','','','','','','',1,20);
					<?php
					break;
					case"Field Days and demos":
					?>
					xajax_ViewFieldDaysandDemonstrations('','','','','','','','','','',1,20);
					<?php
					break;
					case"Other Training and Seedling Distributn":
					?>
					xajax_ViewOtherTrainingActivities('','','','','','','','','','',1,20);
					<?php
					break;
					case"Farmers Production Records":
					?>
					xajax_view_FarmersProductionRecordsReportLog('','','',1,20);

					<?php
					break; 
					default: ?>
					<?php } ?>
                </script>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199"></iframe>
</body>
</html>

