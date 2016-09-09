<?php
session_start();
ini_set('memory_limit', '500M');
require_once('connections/lib_connect.php');




require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'setup_Form');
$xajax->register(XAJAX_FUNCTION,'view_rawData');
$xajax->register(XAJAX_FUNCTION,'view_frm3ExDisaggregation');




#************************************************

function setup_Form($dataForm,$reportingYear,$reportingPeriod){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$_SESSION['dataForm'] = $dataForm;
$_SESSION['fromDate'] = $fromDate;
$_SESSION['toDate'] = $toDate;
$_SESSION['reportingYear'] = $reportingYear;
$_SESSION['reportingPeriod'] = $reportingPeriod;

$data.="<form  name='xportRawData' id='xportRawData' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
$data.="<tr style='width: 300px;' class='evenrow'>
	<td style='width: 300px;'><div align='left'><strong>Data Form:</strong></div></td>
	<td colspan='2'>
		<select name='dataForm' id='dataForm' style='width:300px;'  onchange=\"xajax_setup_Form(this.value,
  '".$reportingYear."',
  '".$reportingPeriod."'
  );return false;\" >
			<option value=''>-Select Data Form-</option>";
			$formArray=array(
			'Form 1',
			'Form 2:Enterprise Technology Adoption form',
			'Form 2:Labour Saving Technology form',
			'Form 2:Media Programs form',
			'Form 2:Youth Apprenticeship form',
			'Form 2:Business Development Services form',
			'Form 2:Bank Loans form',
			'Form 2:Input Sales form',
			'Form 2:PHH form',
			'Form 2:Public Private Partnership form',
			'Form 3',
			'Form 4',
			'Form6 Survey',
			'Form 7',
			'Demo Record Book'
			);
				$i = 0; 
				foreach ($formArray as $formKey) {
					$selected=($_SESSION['dataForm']==$formKey)?"selected":"";
					$data.="<option value=\"".$formKey."\" ".$selected.">".$formKey."</option>";
					$i++;
					
				}
			
		$data.="</select>
	</td>
</tr>";
$divRawData=$dataForm;
/*$dateFilter.="<tr class='evenrow'>";		  
	$dateFilter.="<td>";
		$dateFilter.="<div align='left'><strong>Date Range</strong></div>";
	$dateFilter.="</td>";
	$dateFilter.="<td colspan='2'>";
		$dateFilter.="From:<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'fromDate').attr('id')));return false;\" hidefocus=''>
						<input name='fromDate' type='text'  size='12px' value='' id='fromDate' readonly='readonly' />
						<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>
				To:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'toDate').attr('id')));return false;\" hidefocus=''>
						<input name='toDate' type='text'  size='12px' value='' id='toDate' readonly='readonly' />
						<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a>";
	$dateFilter.="</td>";
$dateFilter.="</tr>";

/* choose to display date filter or ignore 
switch($dataForm){
	case 'Form 1':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Enterprise Technology Adoption form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Labour Saving Technology form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Media Programs form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Youth Apprenticeship form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Business Development Services form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Bank Loans form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Input Sales form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:PHH form':
		$data.=$dateFilter;
	break;
	
	case 'Form 2:Public Private Partnership form':
		$data.=$dateFilter;
	break;
	
	case 'Form 3':
		$data.=$dateFilter;
	break;
	
	case 'Form 4':
		$data.=$dateFilter;
	break;
	
	case 'Form6 Survey':
		$data.=$dateFilter;
	break;
	
	case 'Form 7':
		$data.=$dateFilter;
	break;
	
	default:
	break;
	
	
}*/


$data.="<tr class='evenrow'>
	<td><div align='left'><strong>Reporting Year:</strong></div></td>
	<td colspan='2'>
		<select name='reportingYear' id='reportingYear' style='width:300px;'>
			<option value=''>-All-</option>";
			$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
			
		$data.="</select>
	</td>
</tr>";

$data.="<tr class='evenrow'>";		  
	$data.="<td>";
		$data.="<div align='left'><strong>Reporting Period:</strong></div>";
	$data.="</td>";
	$data.="<td colspan='2'>";
		$data.="<select name='reportingPeriod' id='reportingPeriod'  style='width:300px;'>";
		$data.="<option value=''>-All-</option>";
		$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
		$data.="</select>";
	$data.="</td>";
$data.="</tr>";

$data.="<tr class='evenrow'>
	<td colspan='2' align='right' colspan='3'><input  type='Submit' name='Submit' 
	onclick=\"xajax_view_rawData(
	getElementById('dataForm').value,
	getElementById('reportingYear').value,
	getElementById('reportingPeriod').value,
	'".$divRawData."');return false;\"
	id='Submit' value='Search'/></td>

</tr>";

$data.="<tr class='evenrow'>";
	$data.="<td colspan='3'>";
	$data.="<div id='".$divRawData."'></div>";/* Results Area */
	$data.="</td>";
$data.="</tr>";


$data.="</table>";
$data.="</form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;


}

function view_rawData($dataForm,$reportingYear,$reportingPeriod,$divRawData){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
$f6obj = new Form6DataValidationManager('');

$append_reportingPeriod =($reportingPeriod !='')?$reportingPeriod:"";
//$append_period=(($fromDate !='') and  ($toDate !=''))?"From: ".$fromDate." To: ".$toDate."":"";
$append_reportingYear =($reportingYear !='')?$reportingYear:"";


$title=strtoupper("".$dataForm." data for period ".$append_reportingPeriod." ".$append_reportingYear." ");
$data="";
$data.="<form action=\"".$PHP_SELF."\" name='processRawData' id='processRawData' method='post'>";
	$data.="<table style='background-color:#EEEEEE;' width='600px' height='550px' cellspacing='1' border='0' callpadding='1'>";
	
		$data.="<tr>";
			$data.="<td align='left' colspan='17'>";
				$data.="<a href='export_to_excel_word.php?linkvar=Export Raw Data to Excel&dataForm=".$dataForm."&fromDate=,&toDate=,&reportingYear=".$reportingYear."&reportingPeriod=".$reportingPeriod."&format=excel'>";
					$data.="<input type='button' name='ExportToExcel' id='ExportToExcel' value='Export To Excel'/>";	
				$data.="</a>";
			
				$data.="<a href='print_version.php?linkvar=Print Raw Data to Excel&dataForm=".$dataForm."&fromDate=,&toDate=,&reportingYear=".$reportingYear."&reportingPeriod=".$reportingPeriod."&format=Print' target='_blank'>";
					$data.="<input type='button' name='PrintVersion' id='PrintVersion' value='Print Version'/>";
				$data.="</a>";
			$data.="</td>";
		$data.="</tr>";
		
		$data.="<tr>";
			$data.="<td colspan='17'><strong>".$title."</strong></td>";
		$data.="</tr>";
	
	/* $obj->alert('dataform:'.$dataForm.'DateFilters:'.$fromDate.' to '.$toDate.'ReportingYear:'.$reportingYear.'reportingPeriod:'.$reportingPeriod);
	 */
		$data.="<tr>";
			$data.="<td colspan='17'>";
			
				switch($dataForm){
					
					case 'Form 1':
					
					/* start form1 retrieval */
						$sql = $qmobj->form1RawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['zoneName']."</td>";
								$data.="<td align='left'>".$row['districtName']."</td>";
								$data.="<td align='left'>".$row['subcountyName']."</td>";
								$data.="<td align='left'>".$row['ParishName']."</td>";
								$data.="<td align='left'>".$row['trainingVillage']."</td>";
								$data.="<td align='right'>".$row['trainingDate']."</td>";
								$data.="<td align='left'>".$row['main Value Chain']."</td>";
								$data.="<td align='left'>".$row['training Focus']."</td>";
								$data.="<td align='left'>".$row['Target Audience']."</td>";
								$data.="<td align='left'>".$row['Participant Recommendations']."</td>";
								$data.="<td align='left'>".$row['Participant Name']."</td>";
								$data.="<td align='left'>".$row['Participant Age']."</td>";
								$data.="<td align='right'>".$row['Participant Gender']."</td>";
								$data.="<td align='left'>".$row['Participant Status']."</td>";
								$data.="<td align='left'>".$row['Participant Village']."</td>";
								$data.="<td align='left'>".$row['Participant Type of Individual']."</td>";
								$tel=(($row['Participant Tel'])=='+256')?'-':$row['Participant Tel'];
								$data.="<td align='left'>".$tel."</td>";
							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************form 1 break******************************* */
					
					case 'Form 2:Enterprise Technology Adoption form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2EntTechRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['tbl_techadoptionId']."</td>";
								$data.="<td align='left'>".$row['valueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['businessTraderName']."</td>";
								$data.="<td align='left'>".$row['businessLocation']."</td>";
								$data.="<td align='left'>".$row['durationWithActivity']."</td>";
								$data.="<td align='left'>".$row['nameOfImprovedTech']."</td>";
								$data.="<td align='left'>".$row['techAdoptedInReportingPeriod']."</td>";
								$data.="<td align='left'>".$row['techContinuedFromPast']."</td>";
								$data.="<td align='left'>".$row['amountInvestedInTechAdoption']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalOld']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>";
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['code']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['durationWithOldActivity']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['typeOfBusiness']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagementTj']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolderTj']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolderTj']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJobTj']."</td>";
								$data.="<td align='left'>".$row['tbl_tradersId']."</td>";
								$data.="<td align='left'>".$row['traderCode']."</td>";
								$data.="<td align='left'>".$row['traderName']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Labour Saving Technology form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2LabSavRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['labourSavingTech']."</td>"; 
								$data.="<td align='left'>".$row['labourSavingConcept']."</td>";
								$data.="<td align='left'>".$row['personResponsible']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleNew']."</td>"; 
								$data.="<td align='left'>".$row['jobsCreatedMaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalOld']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['amountInvestedOnTechInvestment']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Media Programs form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2MedProRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['mediaAwarenessMessage']."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['categoryYouthTargeted']."</td>";
								$data.="<td align='left'>".$row['anticipatedResults']."</td>";
								$data.="<td align='left'>".$row['typeOfMedia']."</td>";
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['coverage']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>";
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
																							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Youth Apprenticeship form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2YouAppRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameofBusiness']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['sexBusinessOwner']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedFemaleNew']."</td>"; 
								$data.="<td align='left'>".$row['num_youthAttachedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedMaleNew']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedMaleOld']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedTotalNew']."</td>"; 
								$data.="<td align='left'>".$row['num_youthAttachedTotalOld']."</td>"; 
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['anticipatedOutcome']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['apprenticeShip']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Business Development Services form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2BusDevRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfPartner']."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['areaOfExpertise']."</td>";
								$data.="<td align='left'>".$row['servicesOffered']."</td>";
								$data.="<td align='left'>".$row['typeOfActorServiced']."</td>";
								$data.="<td align='left'>".$row['actorServedFemale']."</td>"; 
								$data.="<td align='left'>".$row['actorServedMale']."</td>";
								$data.="<td align='left'>".$row['roleOfActivity']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['nameOfMSME']."</td>";
								$data.="<td align='left'>".$row['nameofBusiness']."</td>";
								$data.="<td align='left'>".$row['numOfEmployee']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfMSME']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['msmeType']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Bank Loans form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2BanLoaRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['nameMSME']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['cpmAssistance']."</td>";  
								$data.="<td align='left'>".$row['amountLoanAccessed']."</td>";  
								$data.="<td align='left'>".$row['recipientSex']."</td>";  
								$data.="<td align='left'>".$row['bankingInstitution']."</td>";  
								$data.="<td align='left'>".$row['CompiledBy']."</td>";  
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";  
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['dateOfBirth']."</td>";  
								$data.="<td align='left'>".$row['sexOfMSME']."</td>"; 
								$data.="<td align='left'>".$row['typeOfLoanRecepient']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>";  
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['msmeType']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";  
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Input Sales form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2InpSalRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfMiddleValueChainActor']."</td>"; 
								$data.="<td align='left'>".$row['dateOfStartOfinputsSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['amountInvestedInSettingUpInputSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['compiledBy']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['dateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByChemicals']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByFarmImplements']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByFertilizers']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByHerbicides']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByOthers']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldBySeeds']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingFemale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingMale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingTotal']."</td>"; 
								$data.="<td align='left'>".$row['numberOfMessengersFemale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfMessengersMale']."</td>";  
								$data.="<td align='left'>".$row['numberOfMessengersTOtal']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['reviewedBy']."</td>";  
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";  
								$data.="<td align='left'>".$row['submittedBy']."</td>";  
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:PHH form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2PHHRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfMiddleValueChainActor']."</td>";  
								$data.="<td align='left'>".$row['dateOfStartOfinputsSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['valueChain']."</td>"; 
								$data.="<td align='left'>".$row['amountInvestedInRefurbishing']."</td>"; 
								$data.="<td align='left'>".$row['assistanceRenderedByActivity']."</td>";  
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['dateSubmission']."</td>";  
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
								$data.="<td align='left'>".$row['sizeOfStoreRefurbished']."</td>"; 
								$data.="<td align='left'>".$row['storageTypeForColdChain']."</td>"; 
								$data.="<td align='left'>".$row['storageTypeForDryGoods']."</td>";  
								$data.="<td align='left'>".$row['submittedBy']."</td>";  
								$data.="<td align='left'>".$row['compiledBy']."</td>"; 
								$data.="<td align='left'>".$row['reviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Public Private Partnership form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2PubPriRawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['namePartner']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['partnershipFocus']."</td>"; 
								$data.="<td align='left'>".$row['valueActivity']."</td>"; 
								$data.="<td align='left'>".$row['valuePartner']."</td>"; 
								$data.="<td align='left'>".$row['valueTotal']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 3':
					
					/* start form3 retrieval */
						$sql = $qmobj->form3RawDataToExcel($reportingYear,$reportingPeriod);
						//$obj->alert($sql);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";

					    $data.="<th>#</th>";
						$data.="<th>Ex_Name</th>";
						$data.="<th>Ex_DOB </th>";
						$data.="<th>'Ex_Code </th>";
						$data.="<th>Ex_Gender </th>";
						$data.="<th>Ex_District </th>";
						$data.="<th>Ex_Subcounty </th>";
						$data.="<th>Ex_Village </th>";
						$data.="<th>Ex_Tel </th>";
						$data.="<th>Ex_Crop_Beans </th>";
						$data.="<th>Ex_Crop_Coffee </th>";
						$data.="<th>Ex_Crop_Maize </th>";
						$data.="<th>reportingPeriod </th>";
						$data.="<th>year </th>";
						$data.="</tr>";

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['Ex_Name']."</td>";
								$data.="<td align='left'>".$row['Ex_DOB']."</td>";
								$data.="<td align='left'>".$row['Ex_Code']."</td>";
								$data.="<td align='left'>".$row['Ex_Gender']."</td>"; 
								$data.="<td align='left'>".$row['Ex_District']."</td>"; 
								$data.="<td align='left'>".$row['Ex_Subcounty']."</td>"; 
								$data.="<td align='left'>".$row['Ex_Village']."</td>";
								$data.="<td align='left'>".$row['Ex_Tel']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Beans']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Coffee']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Maize']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="</tr>";

								$data.="<tr><td colspan='20'><div id='form3Ihoo'>". view_frm3ExDisaggregation($row)
    							."</div></td></tr>";
								

								
										
							
							$count ++;
						}

						$data.="</table>";
						
				
					/* end form3 retrieval */
					break;
					/* ***************************************************Form 3******************************* */
					
					case 'Form 4':
					
					/* start form1 retrieval */
						$sql = $qmobj->form4RawDataToExcel($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['Tr_Name']."</td>";
								$data.="<td align='left'>".$row['Tr_DOB']."</td>";
								$data.="<td align='left'>".$row['Tr_Code']."</td>";
								$data.="<td align='left'>".$row['Tr_Gender']."</td>"; 
								$data.="<td align='left'>".$row['Tr_District']."</td>"; 
								$data.="<td align='left'>".$row['Tr_Subcounty']."</td>"; 
								$data.="<td align='left'>".$row['Tr_Village']."</td>";
								$data.="<td align='left'>".$row['Tr_Tel']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Beans']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Coffee']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Maize']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="<td align='left'>".$row['epayMade-Oct']."</td>";
								$data.="<td align='left'>".$row['epayMade-Nov']."</td>";
								$data.="<td align='left'>".$row['epayMade-Dec']."</td>";
								$data.="<td align='left'>".$row['epayMade-Jan']."</td>";
								$data.="<td align='left'>".$row['epayMade-Feb']."</td>";
								$data.="<td align='left'>".$row['epayMade-Mar']."</td>";
								$data.="<td align='left'>".$row['epayMade_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Oct']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Nov']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Dec']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Jan']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Feb']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Mar']."</td>";
								$data.="<td align='left'>".$row['epayRecieved_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Mar']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 4******************************* */

					case 'Form6 Survey':

					/* start form6 retrieval */
						$data.="<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
		$data.="<tr class='evenrow'>
			<th colspan='29' align='left'>
				Commodity Production And Marketing Activity FORM 6 SURVEY DATA 
			</th>
		</tr>

		<tr>
		<th class='first-cell-header'>#</th>";
		$q=$qmobj->fetchForm6AprToSep2016Fields('');
		$query=mysql_query($q)or die(mysql_error().__line__);
		$num_rows = mysql_num_rows($query);
    $data_header = array();
		while($row=mysql_fetch_array($query)){				
		$data.="<th>".$row['field']."</th>";
    $data_header[] = $row['answer'];
		}
		$data.="</tr>
		</thead>
		<tbody>";

		
$query_string=$qmobj->fetchForm6AprToSep2016Data('');

/* $reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode; */

$query_string.=" order by `Id` DESC";

 //$obj->alert($query_string); 

  
  $x=1;
	$query_=mysql_query($query_string)or die(mysql_error().__line__);
	 /**************
	 *paging parameters
	 *
	 ****/
	$max_records = mysql_num_rows($query_);
	 $new_query=mysql_query($query_string." limit 0,100") or die(mysql_error().__line__);
	
  
  while($row=mysql_fetch_array($new_query)){
	  $ans_var=1;
	  
			$data.="<tr>";
			$data.="<td>".$x.".</td>";				
			/* pick all data for each data cell 
			and all data values for each cell */
			foreach ($data_header as $fieldName) {
       //$obj->alert($data_header);
				$field_name=$fieldName;
				$columnValue=$row[''.$fieldName.''];
				
				
				 /* start Validation of values returned */
				 switch($field_name){
          //from the db, add 1 + (ans_var)
          //validate Interview_Date
          case 'ans_15':
          $date_var=$f6obj->formatDateString($columnValue);
          $data.=$f6obj->validateDateRange($date_var,'2015-10-01','2016-09-30');
          break;   

          case 'ans_23':
          $data.=$f6obj->validateRegion($columnValue);
          break;

          #HH head........

          case 'ans_41':
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_42':
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_44':
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_45':
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_46':
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          #HH hold1........

          case 'ans_47':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_48':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_50':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_51':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_52':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                    #HH hold2........

          case 'ans_53':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_54':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_56':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_57':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_58':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold3........

          case 'ans_59':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_60':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_62':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_63':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_64':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold4........

          case 'ans_65':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_66':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_68':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_69':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_70':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


            #HH hold4........

          case 'ans_71':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_72':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_74':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_75':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_76':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;




                      #HH hold4........

          case 'ans_77':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_78':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_80':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_81':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_82':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;

                      #HH hold4........

          case 'ans_83':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_84':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_86':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_87':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_88':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_89':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_90':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_92':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_93':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_94':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_95':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_96':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_98':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_99':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_100':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_101':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_102':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_104':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_105':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_106':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                                #HH hold4........

          case 'ans_107':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_108':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_110':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_111':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_112':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          case 'ans_114':
          #Produced_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_116':
          #Produced_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_115':
          #Produced_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;




          case 'ans_118':
          #Produced_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_120':
          #Produced_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_119':
          #Produced_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_123':
          #Harvested_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_592':
          #Harvested_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1064':
          #Harvested_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


        
          
          //validate farmer_code
          case 'ans_18':
          $data.=$f6obj->validateFarmerCode($columnValue);
          break;
          
          //validate farmer_gender
          case 'ans_20':
          $data.=$f6obj->validateGender($columnValue);
          break;
          
          //validate farmer_dob
          case 'ans_21':
          $data.="<td>".$f6obj->formatDateString($columnValue)."</td>";
          break;


          //validate farmer_district
          case 'ans_24':
          $data.=$f6obj->validateDistrict($columnValue);
          break;

           //validate farmer_subcounty
          case 'ans_25':
          $data.=$f6obj->validateSubCountry($columnValue);
          break;
          
		  
		  
		  
		  /* start value chain validation by Apollo */
		  
		  
		  
		  
		  /* end value chain validation by Apollo */
		  case 'ans_114':
          $data.=$f6obj->validateMaizeProductionVC($columnValue);
          break;
		  
		  
          
          /* start Shaffic Cases */         
          case 'ans_1575':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1574':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1573':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen10($columnValue);
          break;
          
          case 'ans_1572':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1571':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1560':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen07($columnValue);
          break;

          case 'ans_1559':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1558':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1557':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1550':
          # code...ProtectCounterfeit
          $data.=$f6obj->validateProtectCounterfeit($columnValue);
          break;

          case 'ans_1543':
          # code...FakeFertilizer
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1544':
          # code...ReasonFakeFertilizer
          $data.=$f6obj->validateReasonFakeFertilizer($columnValue);
          break;

          case 'ans_1542':
          # code...FakeAgroInputs
          $data.=$f6obj->validateFakeAgroInputs($columnValue);
          break;

          case 'ans_1535':
          # code...ImprovedClimate
          $data.=$f6obj->validateImprovedClimate($columnValue);
          break;

          case 'ans_1534':
          # code...Climate Awareness
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1531':
          # code...Loan accessed
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

        #coffee_data................



          case 'ans_1530':
          # code...Aware_Quality_Standards_Coffee
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1524':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1496':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1495':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1482':
          # code...ICT_Technology_Help_Coffee
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1473':
          # code...ICT_technologies_Used_Coffee
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_1461':
          # code...Reasons_Not_Using_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_1453':
          # code...Type_Of_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_1451':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1437':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1423':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1416':
          # code...Coffee_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1402':
          # code...Coffee_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1394':
          # code...Coffee_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1381':
          # code...PHH_Technology_Used_Coffee_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1380':
          # code...Apply_PHH_Technology_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1368':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1356':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_1349':
          # code...Coffee_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1335':
          # code...Coffee_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1327':
          # code...Coffee_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1314':
          # code...PHH_Technology_Used_Coffee_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1313':
          # code...Apply_PHH_Technology_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1301':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1289':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_1278':
          # code...Coffee_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_1255':
          # code...Coffee_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1254':
          # code...Coffee_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1253':
          # code...Coffee_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1252':
          # code...Coffee_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1251':
          # code...Coffee_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1250':
          # code...Coffee_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1249':
          # code...Coffee_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1248':
          # code...Coffee_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1247':
          # code...Coffee_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1246':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1245':
          # code...Coffee_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1233':
          # code...Coffee_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_1210':
          # Coffee_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1209':
          # code...Coffee_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1208':
          # code...Coffee_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1207':
          # code...Coffee_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1206':
          # code...Coffee_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1205':
          # code...Coffee_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1204':
          # code...Coffee_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1203':
          # code...Coffee_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1202':
          # code...Coffee_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1201':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1200':
          # code...Coffee_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1192':
          # code...Coffee_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1182':
          # code...Coffee_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_1181':
          # code...Coffee_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1179':
          # code...Coffee_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1166':
          # code...Coffee_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_1153':
          # code...Coffee_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1152':
          # code...Coffee_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1151':
          # code...Coffee_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1150':
          # code...Coffee_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1149':
          # code...Coffee_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1148':
          # code...Coffee_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1147':
          # code...Coffee_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1146':
          # code...Coffee_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1145':
          # code...Coffee_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1144':
          # code...Coffee_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1143':
          # code...Coffee_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1142':
          # code...Coffee_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1141':
          # code...Coffee_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1140':
          # code...Coffee_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1138':
          # code...Type_Seeds_Coffee_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1131':
          # code...Coffee_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1121':
          # code...Coffee_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_1120':
          # code...Coffee_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1118':
          # code...Coffee_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1105':
          # code...Coffee_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_1092':
          # code...Coffee_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1091':
          # code...Coffee_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1090':
          # code...Coffee_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1089':
          # code...Coffee_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1088':
          # code...Coffee_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1087':
          # code...Coffee_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1086':
          # code...Coffee_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1085':
          # code...Coffee_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1084':
          # code...Coffee_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1083':
          # code...Coffee_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1082':
          # code...Coffee_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1081':
          # code...Coffee_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1080':
          # code...Coffee_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1079':
          # code...Coffee_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1077':
          # code...Type_Seeds_Coffee_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1075':
          # code...Coffee_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1071':
          # code...Land_Mapped_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1068':
          # code...Coffee_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1063':
          # code...Land_Mapped_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1059':
          # code...Type_Coffee_Grown
          $data.=$f6obj->validateTypeCoffee($columnValue);
          break;


          #Beans data..................

          case 'ans_1058':
          # code...Aware_Quality_Standards_Beans
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1052':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1024':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1023':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1010':
          # code...ICT_Technology_Help_Beans
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1001':
          # code...ICT_technologies_Used_Beans
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_989':
          # code...Reasons_Not_Using_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_988':
          # code...Type_Of_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_979':
          # code...Beans_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_965':
          # code...Use_Paid_Labour_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_951':
          # code...Use_Paid_Labour_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_944':
          # code...Beans_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_930':
          # code...Beans_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_922':
          # code...Beans_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_909':
          # code...PHH_Technology_Used_Beans_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_908':
          # code...Apply_PHH_Technology_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_896':
          # code...Store_Beans_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_884':
          # code...Dry_Beans_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_877':
          # code...Beans_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_863':
          # code...Beans_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_855':
          # code...Beans_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_842':
          # code...PHH_Technology_Used_Beans_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_841':
          # code...Apply_PHH_Technology_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_829':
          # code...Store_Beans_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_817':
          # code...Dry_Beans_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_806':
          # code...Beans_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_783':
          # code...Beans_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_782':
          # code...Beans_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_781':
          # code...Beans_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_780':
          # code...Beans_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_779':
          # code...Beans_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_778':
          # code...Beans_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_777':
          # code...Beans_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_776':
          # code...Beans_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_775':
          # code...Beans_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_774':
          # code...Beans_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_773':
          # code...Beans_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_761':
          # code...Beans_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_738':
          # Beans_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_737':
          # code...Beans_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_736':
          # code...Beans_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_735':
          # code...Beans_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_734':
          # code...Beans_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_733':
          # code...Beans_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_732':
          # code...Beans_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_731':
          # code...Beans_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_730':
          # code...Beans_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_729':
          # code...Beans_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_728':
          # code...Beans_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_720':
          # code...Beans_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_710':
          # code...Beans_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_709':
          # code...Beans_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_707':
          # code...Beans_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_694':
          # code...Beans_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_681':
          # code...Beans_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_680':
          # code...Beans_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_679':
          # code...Beans_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_678':
          # code...Beans_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_677':
          # code...Beans_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_676':
          # code...Beans_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_675':
          # code...Beans_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_674':
          # code...Beans_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_673':
          # code...Beans_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_672':
          # code...Beans_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_671':
          # code...Beans_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_670':
          # code...Beans_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_669':
          # code...Beans_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_668':
          # code...Beans_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_666':
          # code...Type_Seeds_Beans_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_659':
          # code...Beans_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_649':
          # code...Beans_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_648':
          # code...Beans_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_646':
          # code...Beans_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_633':
          # code...Beans_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_620':
          # code...Beans_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_619':
          # code...Beans_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_618':
          # code...Beans_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_617':
          # code...Beans_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_616':
          # code...Beans_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_615':
          # code...Beans_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_614':
          # code...Beans_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_613':
          # code...Beans_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_612':
          # code...Beans_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_611':
          # code...Beans_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_610':
          # code...Beans_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_609':
          # code...Beans_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_605':
          # code...Type_Seeds_Beans_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_603':
          # code...Beans_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_599':
          # code...Land_Mapped_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_596':
          # code...Beans_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_591':
          # code...Land_Mapped_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          #Maize.... data.............


          case 'ans_589':
          # code...Aware_Quality_Standards_Maize
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_583':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;


          case 'ans_555':
          # code...Good_Agricultural_Practices_Trained_Maize
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_554':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_541':
          # code...ICT_Technology_Help_Maize
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_532':
          # code...ICT_technologies_Used_Maize
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_520':
          # code...Reasons_Not_Using_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_512':
          # code...Type_Of_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_510':
          # code...Maize_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_496':
          # code...Use_Paid_Labour_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_482':
          # code...Use_Paid_Labour_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_475':
          # code...Maize_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_461':
          # code...Maize_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_453':
          # code...Maize_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_440':
          # code...PHH_Technology_Used_Maize_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_439':
          # code...Apply_PHH_Technology_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_427':
          # code...Store_Maize_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_415':
          # code...Dry_Maize_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_408':
          # code...Maize_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_394':
          # code...Maize_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_386':
          # code...Maize_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_373':
          # code...PHH_Technology_Used_Maize_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_372':
          # code...Apply_PHH_Technology_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_360':
          # code...Store_Maize_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_348':
          # code...Dry_Maize_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_337':
          # code...Maize_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_314':
          # code...Maize_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_313':
          # code...Maize_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_312':
          # code...Maize_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_311':
          # code...Maize_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_310':
          # code...Maize_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_309':
          # code...Maize_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_308':
          # code...Maize_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_307':
          # code...Maize_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_306':
          # code...Maize_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_305':
          # code...Maize_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_304':
          # code...Maize_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_292':
          # code...Maize_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_269':
          # Maize_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_268':
          # code...Maize_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_267':
          # code...Maize_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_266':
          # code...Maize_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_265':
          # code...Maize_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_264':
          # code...Maize_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_263':
          # code...Maize_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_262':
          # code...Maize_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_261':
          # code...Maize_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_260':
          # code...Maize_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_259':
          # code...Maize_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_251':
          # code...Maize_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_241':
          # code...Maize_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_240':
          # code...Maize_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_238':
          # code...Maize_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_225':
          # code...Maize_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_212':
          # code...Maize_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_211':
          # code...Maize_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_210':
          # code...Maize_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_209':
          # code...Maize_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_208':
          # code...Maize_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_207':
          # code...Maize_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_206':
          # code...Maize_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_205':
          # code...Maize_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_204':
          # code...Maize_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_203':
          # code...Maize_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_202':
          # code...Maize_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_201':
          # code...Maize_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_200':
          # code...Maize_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_199':
          # code...Maize_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_197':
          # code...Type_Seeds_Maize_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_190':
          # code...Maize_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_180':
          # code...Maize_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_179':
          # code...Maize_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_177':
          # code...Maize_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_164':
          # code...Maize_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_151':
          # code...Maize_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_150':
          # code...Maize_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_149':
          # code...Maize_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_148':
          # code...Maize_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_147':
          # code...Maize_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_146':
          # code...Maize_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_145':
          # code...Maize_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_144':
          # code...Maize_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_143':
          # code...Maize_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_142':
          # code...Maize_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_141':
          # code...Maize_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_140':
          # code...Maize_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_139':
          # code...Maize_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_138':
          # code...Maize_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_136':
          # code...Type_Seeds_Maize_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_134':
          # code...Maize_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_130':
          # code...Land_Mapped_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_127':
          # code...Maize_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_122':
          # code...Land_Mapped_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

         

        
          
          
          /* end Shaffic Cases */
          
          
          default:
          $data.="<td>".$columnValue."</td>";
          break;          
         }
        /* end of validation series */
				
				
				
				
				
						
			}
			
			
			$data.="</tr>";
			$x++;
			$n++;
	}

						$data.="</table>";
				
					/* end form6 retrieval */
					break;
					
					case 'Form 7':
					
					/* start form1 retrieval */
						$sql = $qmobj->form7RawDataToExcel($reportingYear,$reportingPeriod);
						//$obj->alert($sql);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['tbl_farmersId']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['groupName']."</td>";
								$data.="<td align='left'>".$row['zoneName']."</td>";
								$data.="<td align='left'>".$row['districtName']."</td>";
								$data.="<td align='left'>".$row['subcountyName']."</td>";
								$data.="<td align='left'>".$row['farmersVillage']."</td>";
								$data.="<td align='left'>".$row['farmersName']."</td>";
								$data.="<td align='left'>".$row['memberDstart']."</td>";
								$data.="<td align='left'>".$row['memberStatus']."</td>";
								$data.="<td align='left'>".$row['FarmerAge']."</td>";
								$data.="<td align='left'>".$row['farmersSex']."</td>";
								$data.="<td align='left'>".$row['farmersTel']."</td>";
								$data.="<td align='left'>".$row['hhName']."</td>";
								$data.="<td align='left'>".$row['hhAge']."</td>";
								$data.="<td align='left'>".$row['hhSex']."</td>";
								$data.="<td align='left'>".$row['hhHeadDStart']."</td>";
								$data.="<td align='left'>".$row['hhArea']."</td>";
								$data.="<td align='left'>".$row['hsComposition']."</td>";

							
								
								
							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					
					
					default:
					break;
				}
				
				
				
				
				
			$data.="</td>";
		$data.="</tr>";
		
	$data.="</table>";
$data.="</form>";


$obj->assign($divRawData,'innerHTML',$data);
return $obj;	
}



function view_frm3ExDisaggregation($row){

	$data.="<table style='background-color:#EBEBEB;' border='0' cellspacing='1' cellpadding='0' width='100%'>";

	$data.="<tr>
    <th colspan='2' rowspan='2'>Performance Indicators </th>
    <th colspan='13' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";



  $monthsArray=array('10','11','12','1','2','3');
  foreach ($monthsArray as $key) {
  $month= __month__coverter($key); 
  $result = substr($month, 0, 3); 
  $data.="<th >".$result."</th>"; 
  }
  $data.="<th >Total</th>";
  

  $data.=data_form3($row);

	

$data.="</table>";
					
return $data;			
}

function data_form3($row){
	$data="";
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

    $data.="<td align='right'>".number_format($row2['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSixthQM'])."</td>";
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

    $data.="<td align='right'>".number_format($row2['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
    $data.="<td>".$row['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;
}



 





#************************************
$xajax->processRequest();

  ?>


<html>
<head>
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
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Raw Data to Excel Report...</span></div>
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
							case "View Raw Data in Excel": 
						?>
							  xajax_setup_Form('','','','','');
						  
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