<?php

function edit_partnerships($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_partnerships' id='edit_partnerships' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='14'>
					CPMA-Data Form2/PARTNERSHIPS FORMED: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='14'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='14'>1. Number of public-private partnerships formed as a result of FTF assistance </td>
				</tr>
				
				<tr>
				<td colspan='14'>2. Value of new private sector investment in the agriculture sector or food chain leveraged by FTF implementation</td>
				</tr>
				
				<tr>
				<td colspan='14'>3. Number of jobs attributed to FTF implementation</td>
				</tr>
  ";			

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
				$data.="
				<tr>
					<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_partnershipId' 
					id='tbl_partnershipId' value='".$row_parent['tbl_partnershipId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' />
					</td>";
					
					$partnerProperties=$qmobj->get_phh_nameValuchainPartnerTypeAndId($row_parent['msmeId'],$row_parent['msmeType'],$row_parent['namePartner']);
		list($partnershipId,$partnerType)=$partnerProperties;
					
					$data.="<td ".$row_span.">						
						<select name='namePartner' id='namePartner'>
							<option value=''>-select-</option>";
							$data.=$qmobj->get_form2_partner_filter($partnershipId,$partnerType);
						$data.="</select>
					</td>
					
					<td ".$row_span.">
					<select name='valueChain' id='valueChain'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($row_parent['valueChain']));
						$data.="</select>
					
					
					</td>					
					
					<td ".$row_span.">
					<select name='reporting_period' id='reporting_period'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($row_parent['reportingPeriod_cleaned']);
					$data.="</select>
					</td>
					<td ".$row_span.">
						<select name='partnershipFocus' id='partnershipFocus'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->form2PartnershipFocus($row_parent['partnershipFocus']);
					$data.="</select>
					</td>";
					
					$data.="<td ".$row_span.">					
					<input 
						value='".$row_parent['valueActivity']."' 
						type='text' 
						name='valueActivity' 
						id='valueActivity' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td ".$row_span.">					
					<input 
						value='".$row_parent['valuePartner']."' 
						type='text' 
						name='valuePartner' 
						id='valuePartner' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td ".$row_span.">					
					<input 
						value='".$row_parent['valueTotal']."' 
						type='text' 
						name='valueTotal' 
						id='valueTotal' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_partnership_jobholder` 
					WHERE `labour_saving_tech_id`='".$row_parent['partnership_id']."' limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$y=1;
					
						$data.="<td>
						<input type='hidden' name='tbl_id_first_row' id='tbl_id_first_row' value='".$first_child_row['tbl_id']."' />
						<input 
						value='".$first_child_row['nameOfJobHolder']."' 
						type='text' 
						name='nameOfJobHolder_first_child_row' 
						id='nameOfJobHolder_first_child_row'/>
						</td>
						
						<td>
							<select  
							name='sexOfJobHolder_first_child_row' 
							id='sexOfJobHolder_first_child_row' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=QueryManager::Form2GenderFilter($first_child_row['sexOfJobHolder']);
							$data.="</select>
						</td>";
						
					$data.="<td>";
					$currentDate=@date('Y-m-d', @strtotime($first_child_row['dateOfEngagement']));
					$data.="
						<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById(
						getElementWithNameLike(this,'dateOfEngagement_first_child_row').attr('id')
						)
						);return false;\" 
						hidefocus=''>
						<input  
							name='dateOfEngagement_first_child_row' 
							id='dateOfEngagement_first_child_row' 
							type='text' size='10'
							value='".$currentDate."'   
							style='width:70px;' 
						/>
						<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
						</a>
					</td>
					<td>
					<input 
						value='".$first_child_row['timeSpentOnJob']."' 
						type='text' 
						name='timeSpentOnJob_first_child_row' 
						id='timeSpentOnJob_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					//end of parent record row
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_partnership_jobholder` 
					WHERE `labour_saving_tech_id`='".$row_parent['partnership_id']."'  limit 1,100000")or die(http(__line__));
					$z=1;
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
					$data.="<input type='hidden' name='loopkey_edit_other_children[]' id='loopkey_edit_other_children".$y."' value='1' />
					<input type='hidden' name='tbl_id_other_children[]' id='tbl_id__other_children".$y."' value='".$other_children_row['tbl_id']."' />";
					$data.="<td>
						<input 
						value='".$other_children_row['nameOfJobHolder']."' 
						type='text' 
						name='nameOfJobHolder_other_children[]' 
						id='nameOfJobHolder_other_children".$z."'/>
					</td>
					<td>
						<select  
							name='sexOfJobHolder_other_children[]' 
							id='sexOfJobHolder_other_children".$z."' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=QueryManager::Form2GenderFilter($other_children_row['sexOfJobHolder']);
						$data.="</select>
					</td>";
					
					$data.="<td>";
					$currentDate=@date('Y-m-d', @strtotime($other_children_row['dateOfEngagement']));
					$data.="
						<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById(
						getElementWithNameLike(this,'dateOfEngagement_other_children').attr('id')
						)
						);return false;\" 
						hidefocus=''>
						<input  
							name='dateOfEngagement_other_children[]' 
							id='dateOfEngagement_other_children".$z."' 
							type='text' size='10'
							value='".$currentDate."'   
							style='width:70px;' 
						/>
						<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
						</a>
					</td>
					<td>
					<input 
						value='".$other_children_row['timeSpentOnJob']."' 
						type='text' 
						name='timeSpentOnJob_other_children[]' 
						id='timeSpentOnJob_other_children".$z."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					$data.="</tr>";
					$z++;
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="<tr class='evenrow'>
				<td colspan='16'>
					<div align='right'>
						<input  type='submit' class='formButton2' 
						name='save' id='save' 
						style='width:100px;' value='Update' 
						onclick=\"loadingIcon(
						xajax.getFormValues('edit_partnerships'),
						'update_partnerships'
						);return false;\" />
					</div>
				</td>
			</tr>

			<div align='center' height='900' id='myLoader' style='display:none;'>
				<span 
				style='
				font-size:24px;
				margin-top:50px;
				font-weight:bold;
				'>Updating PARTNERSHIPS FORMED Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_partnerships($formValues){
$obj=new xajaxResponse();
$n=1;

$tbl_partnershipId=$formValues['tbl_partnershipId'];
$labourSavingTech=trim($formValues['labourSavingTech']);
$valueChain=$formValues['valueChain'];
$rp_start_month=substr($formValues['reporting_period'], 0, -16); 
$rp_end_month=substr($formValues['reporting_period'], 11, -5);
$year=substr($formValues['reporting_period'],-4);
$reportinPeriod="".$rp_start_month." - ".$rp_end_month."";
$reportingMonth=$formValues['reportingMonth'];
$CompiledBy=($formValues['CompiledBy']=='')?$_SESSION['name']:$formValues['CompiledBy'];
//when reportingMonth is null or invalid
switch($rp_end_month){
	case"Sep":
	$reportingMonth_default="".$year."-09-30 00:00:00";
	break;
	
	case"Mar":
	$reportingMonth_default="".$year."-03-31 00:00:00";
	break;
	
	default:	
	break;
}
switch($rp_start_month){
	case"Apr":
	$start_date_default="".$year."-04-01";
	$end_date_default="".$year."-09-30";
	break;
	
	case"Oct":
	$start_date_default="".$year."-10-01";
	$end_date_default="".($year+1)."-03-31";
	break;
	
	default:	
	break;
}
$reportingMonth=($reportingMonth=='' or $reportingMonth==null)?$reportingMonth_default:$reportingMonth;


$labourSavingConcept=trim($formValues['labourSavingConcept']);
$personResponsible=$formValues['personResponsible'];
$amountInvestedOnTechInvestment=trim($formValues['amountInvestedOnTechInvestment']);





//update  parent table
 $sql_parent_record="UPDATE `tbl_laboursavingtech` 
SET
`labourSavingTech`='".$labourSavingTech."',
`valueChain`='".$valueChain."',
`year`='".$year."',
`reportingPeriod`='".$reportinPeriod."', 
`labourSavingConcept`='".$labourSavingConcept."', 
`personResponsible`='".$personResponsible."',
`amountInvestedOnTechInvestment`='".$amountInvestedOnTechInvestment."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`reportingMonth`='".$reportingMonth."'
WHERE
`tbl_partnershipId` ='".$tbl_partnershipId."'";
//$obj->alert($sql_parent_record); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//update or insert into the first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=($formValues['nameOfJobHolder_first_child_row'] !=='')?$formValues['nameOfJobHolder_first_child_row']:'-';
$sexOfJobHolder_first_child_row=($formValues['sexOfJobHolder_first_child_row'] !=='')?$formValues['sexOfJobHolder_first_child_row']:'-';
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=($formValues['timeSpentOnJob_first_child_row'] !=='')?$formValues['timeSpentOnJob_first_child_row']:0;

switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_labourSavingTech_jobHolder`
	(`dateOfEngagement`, `nameOfJobHolder`, `sexOfJobHolder`, `timeSpentOnJob`, `labour_saving_tech_id`) 
	VALUES (
	'".$dateOfEngagement_first_child_row."',
	'".$nameOfJobHolder_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$tbl_partnershipId."'
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_labourSavingTech_jobHolder` 
	SET 
	`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."' 
	WHERE `tbl_id`=".$tbl_id_first_row."
	and `labour_saving_tech_id`='".$tbl_partnershipId."'";
	break;
	
}


//$obj->alert($sql_first_record); 
$query=@mysql_query($sql_first_record)or die(mysql_error()); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$nameOfJobHolder_other_children=$formValues['nameOfJobHolder_other_children'][$i];
	$sexOfJobHolder_other_children=$formValues['sexOfJobHolder_other_children'][$i];
	$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
	$timeSpentOnJob_other_children=$formValues['timeSpentOnJob_other_children'][$i];

		if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_labourSavingTech_jobHolder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`='".$tbl_id_other_children."'
		and `labour_saving_tech_id`='".$tbl_partnershipId."'";
		
		//$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		}

	}


$obj->call("hidemyLoaderDiv"); 				 
 $obj->assign('bodyDisplay','innerHTML',congMsg("LABOUR SAVING TECHONOLOGIES form has been Updated!"));
$obj->call("xajax_view_labourSavingTech",'','','',1,20);
return $obj;

}
