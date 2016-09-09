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
$data.="<tr class='evenrow'>
	<td><div align='left'><strong>Data Form:</strong></div></td>
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
	<td align='right' colspan='3'><input type='Submit' name='Submit' 
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

$append_reportingPeriod =($reportingPeriod !='')?$reportingPeriod:"";
//$append_period=(($fromDate !='') and  ($toDate !=''))?"From: ".$fromDate." To: ".$toDate."":"";
$append_reportingYear =($reportingYear !='')?$reportingYear:"";


$title=strtoupper("".$dataForm." data for period ".$append_reportingPeriod." ".$append_reportingYear." ");
$data="";
$data.="<form action=\"".$PHP_SELF."\" name='processRawData' id='processRawData' method='post'>";
	$data.="<table style='background-color:#EEEEEE;' width='600px' height='550px' cellspacing='1' border='0' callpadding='1'>";
	
		$data.="<tr>";
			$data.="<td align='right' colspan='17'>";
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
						$sql = $qmobj->form6RawDataToExcel($reportingYear,$reportingPeriod);
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
								$data.="<td align='left'>".$row['Date_Surveyed']."</td>";
								$data.="<td align='left'>".$row['Farmer_Name']."</td>";
								$data.="<td align='left'>".$row['Farmer_Code']."</td>";
								$data.="<td align='left'>".$row['Farmer_Gender']."</td>";
								$data.="<td align='left'>".$row['Farmer_Region']."</td>";
								$data.="<td align='left'>".$row['Farmer_District']."</td>";
								$data.="<td align='left'>".$row['Farmer_Sub-County']."</td>";
								$data.="<td align='left'>".$row['Farmer_Village']."</td>";
								$data.="<td align='left'>".$row['Respondent']."</td>";
								$data.="<td align='left'>".$row['farmer_crop_maize']."</td>";
								$data.="<td align='left'>".$row['farmer_crop_beans']."</td>";
								$data.="<td align='left'>".$row['farmer_crop_coffee']."</td>";
								$data.="<td align='left'>".$row['farmer_crop_maize_crop']."</td>";
								$data.="<td align='left'>".$row['Other_Crop_Planted_Maize']."</td>";
								$data.="<td align='left'>".$row['Maize_Other_Crop']."</td>";
								$data.="<td align='left'>".$row['maize_acreage']."</td>";
								$data.="<td align='left'>".$row['Land_Mapped']."</td>";	
								$data.="<td align='left'>".$row['Maize_Equipment_Used']."</td>";
								$Maize_Seed_Variety=(is_numeric($row['Maize_Seed_Variety']))?'':$row['Maize_Seed_Variety'];
								$data.="<td align='left'>".$Maize_Seed_Variety."</td>";
								$Maize_Improvedseeds_Notuse=(is_numeric($row['Maize_Improvedseeds_Notuse']))?'':$row['Maize_Improvedseeds_Notuse'];
								$data.="<td align='left'>".$Maize_Improvedseeds_Notuse."</td>";
								$data.="<td align='left'>".$row['Maize_improvedseeds_notuse_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Improvedseeds_Benefits']."</td>";
								$data.="<td align='left'>".$row['maize_improvedseeds_benefits_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Improvedseeds_Supplier']."</td>";
								$data.="<td align='left'>".$row['maize_improvedseed_supplier_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Improvedseed_Properusage']."</td>";
								$data.="<td align='left'>".$row['Landsize_Maize_Improvedseeds']."</td>";
								$data.="<td align='left'>".$row['MaizeEquipmentMethod_Planting']."</td>";
								$data.="<td align='left'>".$row['maize_equipment_planting_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Whoplanted']."</td>";
								$data.="<td align='left'>".$row['maize_whoplanted_Other']."</td>";
								$Maize_Fertilizer_use=(is_numeric($row['Maize_Fertilizer_use']))?'':$row['Maize_Fertilizer_use'];
								$data.="<td align='left'>".$Maize_Fertilizer_use."</td>";
								$Maize_Fertlizer_Notuse=(is_numeric($row['Maize_Fertlizer_Notuse']))?'':$row['Maize_Fertlizer_Notuse'];
								$data.="<td align='left'>".$Maize_Fertlizer_Notuse."</td>";
								$data.="<td align='left'>".$row['maize_fertlizer_notuse_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Fertilizer_Benefits']."</td>";
								$data.="<td align='left'>".$row['maize_fertilizer_benefits_other']."</td>";
								$Maize_Fertilizer_Supplier=(is_numeric($row['Maize_Fertilizer_Supplier']))?'':$row['Maize_Fertilizer_Supplier'];
								$data.="<td align='left'>".$Maize_Fertilizer_Supplier."</td>";
								$data.="<td align='left'>".$row['maize_fertilizer_supplier_other']."</td>";	
								$data.="<td align='left'>".$row['Maize_Fertilizer_Properusage']."</td>";
								$data.="<td align='left'>".$row['Maize_WhoApplied']."</td>";
								$data.="<td align='left'>".$row['maize_ferilizer_whosupplied_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Land_fertilizers']."</td>";
								$Maize_Chemical_Use=(is_numeric($row['Maize_Chemical_Use']))?'':$row['Maize_Chemical_Use'];
								$data.="<td align='left'>".$Maize_Chemical_Use."</td>";
								$data.="<td align='left'>".$row['Maize_Chemical_use_other']."</td>";
								$Maize_Chemicals_NotUse=(is_numeric($row['Maize_Chemicals_NotUse']))?'':$row['Maize_Chemicals_NotUse'];
								$data.="<td align='left'>".$Maize_Chemicals_NotUse."</td>";
								$data.="<td align='left'>".$row['maize_chemical_notuse_other']."</td>";	
								$data.="<td align='left'>".$row['Maize_Chemicals_Benefits']."</td>";
								$data.="<td align='left'>".$row['maize_chemical_benefits_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Chemicals_Supplier']."</td>";
								$data.="<td align='left'>".$row['maize_chemical_supplier_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Chemicals_Properusage']."</td>";
								$data.="<td align='left'>".$row['Maize_Chemicals_WhoApplied']."</td>";
								$data.="<td align='left'>".$row['maize_chemical_whoapplied_other']."</td>";	
								$data.="<td align='left'>".$row['Maize_Land_Chemicals']."</td>";
								$data.="<td align='left'>".$row['Maize_Detect_Counterfeit']."</td>";
								$data.="<td align='left'>".$row['Maize_Opinion']."</td>";
								$data.="<td align='left'>".$row['Maize_Counterfeit_Improvedseeds']."</td>";
								$data.="<td align='left'>".$row['Maize_Counterfeit_Herbicides']."</td>";
								$data.="<td align='left'>".$row['Maize_Counterfeit_Pesticides']."</td>";
								$data.="<td align='left'>".$row['Maize_Counterfeit_Fungicides']."</td>";
								$data.="<td align='left'>".$row['Maize_Counterfeit_Fertilizers']."</td>";
								$data.="<td align='left'>".$row['Maize_Avoid_Counterfeits']."</td>";
								$data.="<td align='left'>".$row['maize_avoid_counterfeits_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Dry_Harvested']."</td>";
								$data.="<td align='left'>".$row['maize_dry_harvested_other']."</td>";
								$Maize_Shelling_Use=(is_numeric($row['Maize_Shelling_Use']))?'':$row['Maize_Shelling_Use'];
								$data.="<td align='left'>".$Maize_Shelling_Use."</td>";
								$data.="<td align='left'>".$row['maize_shell_use_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Storage']."</td>";
								$data.="<td align='left'>".$row['maize_storage_other']."</td>";
								$data.="<td align='left'>".$row['Maize_Cost_Production']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_machinery']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_improvedseed']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_fertilizers']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_chemicals']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_storage']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_transportation']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_labour']."</td>";
								$data.="<td align='left'>".$row['maize_cost_production_other']."</td>";
								$data.="<td align='left'>".$row['maize_harvested']."</td>";	
								$data.="<td align='left'>".$row['maize_sold']."</td>";	
								$data.="<td align='left'>".$row['maize_sold_lastperiod']."</td>";
								$data.="<td align='left'>".$row['maize_sold_price']."</td>";	
								$data.="<td align='left'>".$row['maize_harvest_loss']."</td>";
								$data.="<td align='left'>".$row['Maize_Aware_Standard']."</td>";
								$data.="<td align='left'>".$row['farmer_crop_beans_crop']."</td>";
								$data.="<td align='left'>".$row['Other_Crop_Planted_Beans']."</td>";
								$data.="<td align='left'>".$row['Beans_Other_Crop']."</td>";	
								$data.="<td align='left'>".$row['beans_acreage']."</td>";
								$data.="<td align='left'>".$row['Land_Mapped']."</td>";	
								$data.="<td align='left'>".$row['Beans_Equipment_Used']."</td>";
								$Beans_Seed_Variety=(is_numeric($row['Beans_Seed_Variety']))?'':$row['Beans_Seed_Variety'];
								$data.="<td align='left'>".$Beans_Seed_Variety."</td>";
								$Beans_Improvedseeds_Notuse=(is_numeric($row['Beans_Improvedseeds_Notuse']))?'':$row['Beans_Improvedseeds_Notuse'];
								$data.="<td align='left'>".$Beans_Improvedseeds_Notuse."</td>";
								$data.="<td align='left'>".$row['Beans_improvedseeds_notuse_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Improvedseeds_Benefits']."</td>";
								$data.="<td align='left'>".$row['beans_improvedseeds_benefits_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Improvedseeds_Supplier']."</td>";
								$data.="<td align='left'>".$row['beans_improvedseed_supplier_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Improvedseed_Properusage']."</td>";
								$data.="<td align='left'>".$row['Landsize_Beans_Improvedseeds']."</td>";
								$data.="<td align='left'>".$row['BeansEquipmentMethod_Planting']."</td>";
								$data.="<td align='left'>".$row['beans_equipment_planting_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Whoplanted']."</td>";
								$data.="<td align='left'>".$row['beans_whoplanted_Other']."</td>";
								$Beans_Fertilizer_use=(is_numeric($row['Beans_Fertilizer_use']))?'':$row['Beans_Fertilizer_use'];
								$data.="<td align='left'>".$Beans_Fertilizer_use."</td>";
								$Beans_Fertlizer_Notuse=(is_numeric($row['Beans_Fertlizer_Notuse']))?'':$row['Beans_Fertlizer_Notuse'];
								$data.="<td align='left'>".$Beans_Fertlizer_Notuse."</td>";
								$data.="<td align='left'>".$row['beans_fertlizer_notuse_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Fertilizer_Benefits']."</td>";
								$data.="<td align='left'>".$row['beans_fertilizer_benefits_other']."</td>";
								$Beans_Fertilizer_Supplier=(is_numeric($row['Beans_Fertilizer_Supplier']))?'':$row['Beans_Fertilizer_Supplier'];
								$data.="<td align='left'>".$Beans_Fertilizer_Supplier."</td>";
								$data.="<td align='left'>".$row['beans_fertilizer_supplier_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Fertilizer_Properusage']."</td>";
								$data.="<td align='left'>".$row['Beans_WhoApplied']."</td>";
								$data.="<td align='left'>".$row['beans_ferilizer_whosupplied_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Land_fertilizers']."</td>";
								$Beans_Chemical_Use=(is_numeric($row['Beans_Chemical_Use']))?'':$row['Beans_Chemical_Use'];
								$data.="<td align='left'>".$Beans_Chemical_Use."</td>";
								$data.="<td align='left'>".$row['Beans_Chemical_use_other']."</td>";
								$Beans_Chemicals_NotUse=(is_numeric($row['Beans_Chemicals_NotUse']))?'':$row['Beans_Chemicals_NotUse'];
								$data.="<td align='left'>".$Beans_Chemicals_NotUse."</td>";
								$data.="<td align='left'>".$row['beans_chemical_notuse_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Chemicals_Benefits']."</td>";
								$data.="<td align='left'>".$row['beans_chemical_benefits_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Chemicals_Supplier']."</td>";
								$data.="<td align='left'>".$row['beans_chemical_supplier_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Chemicals_Properusage']."</td>";
								$data.="<td align='left'>".$row['Beans_Chemicals_WhoApplied']."</td>";
								$data.="<td align='left'>".$row['beans_chemical_whoapplied_other']."</td>";	
								$data.="<td align='left'>".$row['Beans_Land_Chemicals']."</td>";
								$data.="<td align='left'>".$row['Beans_Detect_Counterfeit']."</td>";
								$data.="<td align='left'>".$row['Beans_Opinion']."</td>";
								$data.="<td align='left'>".$row['Beans_Counterfeit_Improvedseeds']."</td>";
								$data.="<td align='left'>".$row['Beans_Counterfeit_Herbicides']."</td>";
								$data.="<td align='left'>".$row['Beans_Counterfeit_Pesticides']."</td>";
								$data.="<td align='left'>".$row['Beans_Counterfeit_Fungicides']."</td>";
								$data.="<td align='left'>".$row['Beans_Counterfeit_Fertilizers']."</td>";
								$data.="<td align='left'>".$row['Beans_Avoid_Counterfeits']."</td>";
								$data.="<td align='left'>".$row['beans_avoid_counterfeits_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Dry_Harvested']."</td>";	
								$data.="<td align='left'>".$row['beans_dry_harvested_other']."</td>";
								$Beans_Shelling_Use=(is_numeric($row['Beans_Shelling_Use']))?'':$row['Beans_Shelling_Use'];
								$data.="<td align='left'>".$Beans_Shelling_Use."</td>";
								$data.="<td align='left'>".$row['beans_shell_use_other']."</td>";
								$data.="<td align='left'>".$row['Beans_Storage']."</td>";
								$data.="<td align='left'>".$row['beans_storage_other']."</td>";	
								$data.="<td align='left'>".$row['Beans_Cost_Production']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_machinery']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_improvedseed']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_fertilizers']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_chemicals']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_storage']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_transportation']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_labour']."</td>";
								$data.="<td align='left'>".$row['beans_cost_production_other']."</td>";	
								$data.="<td align='left'>".$row['beans_harvested']."</td>";	
								$data.="<td align='left'>".$row['beans_sold']."</td>";	
								$data.="<td align='left'>".$row['beans_sold_lastperiod']."</td>";	
								$data.="<td align='left'>".$row['beans_sold_price']."</td>";	
								$data.="<td align='left'>".$row['beans_harvest_loss']."</td>";	
								$data.="<td align='left'>".$row['Beans_Aware_Standard']."</td>";	
								$data.="<td align='left'>".$row['farmer_crop_coffee_crop']."</td>";	
								$data.="<td align='left'>".$row['Other_Crop_Planted_Coffee']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Other_Crop']."</td>";	
								$data.="<td align='left'>".$row['coffee_acreage']."</td>";	
								$data.="<td align='left'>".$row['Land_Mapped']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Equipment_Used']."</td>";
								$Coffee_Trees_Variety=(is_numeric($row['Coffee_Trees_Variety']))?'':$row['Coffee_Trees_Variety'];
								$data.="<td align='left'>".$Coffee_Trees_Variety."</td>";
								$Coffee_Improvedtrees_Notuse=(is_numeric($row['Coffee_Improvedtrees_Notuse']))?'':$row['Coffee_Improvedtrees_Notuse'];
								$data.="<td align='left'>".$Coffee_Improvedtrees_Notuse."</td>";
								$data.="<td align='left'>".$row['Coffee_improvedtrees_notuse_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Improvedtrees_Benefits']."</td>";	
								$data.="<td align='left'>".$row['coffee_improvedtrees_benefits_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Improvedtrees_Supplier']."</td>";	
								$data.="<td align='left'>".$row['coffee_improvedtrees_supplier_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Improvedtrees_Properusage']."</td>";	
								$data.="<td align='left'>".$row['Landsize_Coffee_Improvedtrees']."</td>";	
								$data.="<td align='left'>".$row['CoffeeEquipmentMethod_Planting']."</td>";	
								$data.="<td align='left'>".$row['coffee_equipment_planting_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Whoplanted']."</td>";	
								$data.="<td align='left'>".$row['coffee_whoplanted_Other']."</td>";	
								$Coffee_Fertilizer_use=(is_numeric($row['Coffee_Fertilizer_use']))?'':$row['Coffee_Fertilizer_use'];
								$data.="<td align='left'>".$Coffee_Fertilizer_use."</td>";	
								$Coffee_Fertlizer_Notuse=(is_numeric($row['Coffee_Fertlizer_Notuse']))?'':$row['Coffee_Fertlizer_Notuse'];
								$data.="<td align='left'>".$Coffee_Fertlizer_Notuse."</td>";	
								$data.="<td align='left'>".$row['coffee_fertlizer_notuse_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Fertilizer_Benefits']."</td>";	
								$data.="<td align='left'>".$row['coffee_fertilizer_benefits_other']."</td>";	
								$Coffee_Fertilizer_Supplier=(is_numeric($row['Coffee_Fertilizer_Supplier']))?'':$row['Coffee_Fertilizer_Supplier'];
								$data.="<td align='left'>".$Coffee_Fertilizer_Supplier."</td>";
								$data.="<td align='left'>".$row['coffee_fertilizer_supplier_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Fertilizer_Properusage']."</td>";	
								$data.="<td align='left'>".$row['Coffee_WhoApplied']."</td>";	
								$data.="<td align='left'>".$row['coffee_ferilizer_whosupplied_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Land_fertilizers']."</td>";
								$Coffee_Chemical_Use=(is_numeric($row['Coffee_Chemical_Use']))?'':$row['Coffee_Chemical_Use'];
								$data.="<td align='left'>".$Coffee_Chemical_Use."</td>";
								$data.="<td align='left'>".$row['Coffee_Chemical_use_other']."</td>";	
								$Coffee_Chemicals_NotUse=(is_numeric($row['Coffee_Chemicals_NotUse']))?'':$row['Coffee_Chemicals_NotUse'];
								$data.="<td align='left'>".$Coffee_Chemicals_NotUse."</td>";
								$data.="<td align='left'>".$row['coffee_chemical_notuse_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Chemicals_Benefits']."</td>";	
								$data.="<td align='left'>".$row['coffee_chemical_benefits_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Chemicals_Supplier']."</td>";	
								$data.="<td align='left'>".$row['coffee_chemical_supplier_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Chemicals_Properusage']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Chemicals_WhoApplied']."</td>";	
								$data.="<td align='left'>".$row['coffee_chemical_whoapplied_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Land_Chemicals']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Detect_Counterfeit']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Opinion']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Counterfeit_Improvedtrees']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Counterfeit_Herbicides']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Counterfeit_Pesticides']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Counterfeit_Fungicides']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Counterfeit_Fertilizers']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Avoid_Counterfeits']."</td>";	
								$data.="<td align='left'>".$row['coffee_avoid_counterfeits_other']."</td>";	
								$data.="<td align='left'>".$row['coffee_dry_harvested_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Dry_Harvested']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Storage']."</td>";	
								$data.="<td align='left'>".$row['coffee_storage_other']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Cost_Production']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_machinery']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_improvedtrees']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_fertilizers']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_chemicals']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_storage']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_transportation']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_labour']."</td>";	
								$data.="<td align='left'>".$row['coffee_cost_production_other']."</td>";	
								$data.="<td align='left'>".$row['coffee_harvested']."</td>";	
								$data.="<td align='left'>".$row['coffee_sold']."</td>";	
								$data.="<td align='left'>".$row['coffee_sold_lastperiod']."</td>";	
								$data.="<td align='left'>".$row['coffee_sold_price']."</td>";	
								$data.="<td align='left'>".$row['coffee_harvest_loss']."</td>";	
								$data.="<td align='left'>".$row['Coffee_Aware_Standard']."</td>";
								$data.="<td align='left'>".$row['Climate Change Impacts']."</td>";
								$data.="<td align='left'>".$row['Management Practices Climate']."</td>";
								$data.="<td align='left'>".$row['Management practices implemented']."</td>";
								$data.="<td align='left'>".$row['implemented_mgt_climate_action_other']."</td>";
								$data.="<td align='left'>".$row['Protection Counterfeit']."</td>";
								$data.="<td align='left'>".$row['protection_counterfeit_other']."</td>";
								$data.="<td align='left'>".$row['hotline_counterfeit']."</td>";
								$data.="<td align='left'>".$row['Called The Hotline']."</td>";
								$data.="<td align='left'>".$row['Government_Agricultural_Related_Information']."</td>";
								$data.="<td align='left'>".$row['receive_information_method_other']."</td>";
								$data.="<td align='left'>".$row['Farming Decisions']."</td>";
								$data.="<td align='left'>".$row['Owns_Farming_Assests']."</td>";
								$data.="<td align='left'>".$row['Farming_Money_Spent']."</td>";
								$data.="<td align='left'>".$row['Attend Training Events']."</td>";
								$data.="<td align='left'>".$row['Member_Organisation']."</td>";
								$data.="<td align='left'>".$row['GPSLatitude']."</td>";
								$data.="<td align='left'>".$row['GPSLongitude']."</td>";
								$data.="<td align='left'>".$row['GPSAltitude']."</td>";
								$data.="<td align='left'>".$row['GPSAccuracy']."</td>";
								$data.="<td align='left'>".$row['X_axis']."</td>";
								$data.="<td align='left'>".$row['Y_axis']."</td>";
								$data.="<td align='left'>".$row['Accessed a loan']."</td>";
								$data.="<td align='left'>".$row['Amount Loan accessed']."</td>";
								$data.="<td align='left'>".$row['Implemented management practices']."</td>"; 
								$data.="<td align='left'>".$row['Compiled_By']."</td>";
								$data.="<td align='left'>".$row['Tel_Data_Compiler']."</td>";
								$data.="<td align='left'>".$row['GPS_coordinates']."</td>";
								$data.="<td align='left'>".$row['Message_Logged_at_Readtime']."</td>";
								$data.="<td align='left'>".$row['MIS_Data_Readtime']."</td>";
							$data.="</tr>";
							$count ++;
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