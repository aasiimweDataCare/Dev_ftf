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




#************************************************

function setup_Form($dataForm,$fromDate,$toDate,$reportingYear,$reportingPeriod){
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
  '".$fromDate."',
  '".$toDate."',
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
$dateFilter.="<tr class='evenrow'>";		  
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

/* choose to display date filter or ignore */
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
	
	
}


$data.="<tr class='evenrow'>
	<td><div align='left'><strong>Reporting Year:</strong></div></td>
	<td colspan='2'>
		<select name='reportingYear' id='reportingYear' style='width:300px;'>
			<option value=''>-Select Reporting Year-</option>";
			$yearArray=array(
			'CPMA Year One',
			'CPMA Year Two',
			'CPMA Year Three',
			'CPMA Year Four',
			'CPMA Year Five',
			'CPMA Year Six'
			);
				$i = 0; 
				foreach ($yearArray as $key) {
					$selected=($_SESSION['reportingYear']==$key)?"selected":"";
					$data.="<option value=\"".$key."\" ".$selected.">".$key."</option>";
					$i++;
				}
			
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
			$data.=QueryManager::ReportingPeriodFilter($_SESSION['reportingPeriod']);
		$data.="</select>";
	$data.="</td>";
$data.="</tr>";

$data.="<tr class='evenrow'>
	<td align='right' colspan='3'><input type='Submit' name='Submit' 
	onclick=\"xajax_view_rawData(
	getElementById('dataForm').value,
	getElementById('fromDate').value,
	getElementById('toDate').value,
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

function view_rawData($dataForm,$fromDate,$toDate,$reportingYear,$reportingPeriod,$divRawData){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');

$append_reportingPeriod =($reportingPeriod !='')?$reportingPeriod:"";
$append_period=(($fromDate !='') and  ($toDate !=''))?"From: ".$fromDate." To: ".$toDate."":"";
$append_reportingYear =($reportingYear !='')?$reportingYear:"";


$title=strtoupper("".$dataForm." data for period ".$append_reportingPeriod." ".$append_period." ".$append_reportingYear." ");
$data="";
$data.="<form action=\"".$PHP_SELF."\" name='processRawData' id='processRawData' method='post'>";
	$data.="<table style='background-color:#EEEEEE;' width='600px' height='550px' cellspacing='1' border='0' callpadding='1'>";
	
		$data.="<tr>";
			$data.="<td align='right' colspan='17'>";
				$data.="<a href='export_to_excel_word.php?linkvar=Export Raw Data to Excel&dataForm=".$dataForm."&fromDate=".$fromDate."&toDate=".$toDate."&reportingYear=".$reportingYear."&reportingPeriod=".$reportingPeriod."&format=excel'>";
					$data.="<input type='button' name='ExportToExcel' id='ExportToExcel' value='Export To Excel'/>";	
				$data.="</a>";
			
				$data.="<a href='print_version.php?linkvar=Print Raw Data to Excel&dataForm=".$dataForm."&fromDate=".$fromDate."&toDate=".$toDate."&reportingYear=".$reportingYear."&reportingPeriod=".$reportingPeriod."&format=Print' target='_blank'>";
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
						$sql = $qmobj->form1RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2EntTechRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2LabSavRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2MedProRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2YouAppRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2BusDevRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2BanLoaRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2InpSalRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2PHHRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
						$sql = $qmobj->form2PubPriRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
					
					/* start form1 retrieval */
						$sql = $qmobj->form3RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
								$data.="<td align='left'>".$row['epayRecieved-Mar']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['TradersInSupplyChain_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['UnionsInSupplyChain_Details_Oct-Mar']."</td>";
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
					/* ***************************************************Form 3******************************* */
					
					case 'Form 4':
					
					/* start form1 retrieval */
						$sql = $qmobj->form4RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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
					
					case 'Form 7':
					
					/* start form1 retrieval */
						$sql = $qmobj->form7RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
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



 





//$xajax->processRequests();
$xajax->processRequest();

  ?>


<html>
<head>

<?php $xajax->printJavascript('xajax_0.5/'); 

?>

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/loading.css" rel="stylesheet" type="text/css" />
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/addRow.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
<script type="text/javascript" src="js/loading.js" language="javascript"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body>
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
<table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?>
      </td>
        </tr>
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
      </tr>
    </table></td>
    <td width="660" valign="top"  >
    
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
                          
                          default:
                                  
                               #underConstruction("Under Construction!");
                                   
                                   }
                              
                        ?>
    </script>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js"
        id="gToday:normal:agenda.js"
        src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;"
        frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
