<?php
function edit_enterpriseTechAdoption($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$data.="<form action='".$_SERVER['PHP_SELF']."' name='edit_enterpriseTechAdoption' id='edit_enterpriseTechAdoption' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";

$data.="<tr>
	<th colspan='16'>
	CPMA-Data Form2/Enterprise Technology Adoption: EDIT
	</th>
</tr>

<tr >
<th colspan='16'>Indicator</th>
</tr>

<tr>
<th colspan='16'>1. Number of food security private enterprises (for profit), producer orgs, water user associations, women’s groups, trade and business associations, and community-based organizations receiving U.S. government assistance.</th>
</tr>

<tr>
<th colspan='16'>2. Number of jobs attributed to FTF implementation</th>
</tr>

<tr>
<th colspan='16'>3. Number of private enterprises, producers organisationss, water user associations, women’s groups, trade and business associations, and community-based organizations that applied improved technologies or management practices as a result of U.S. government assistance.</th>
</tr>

<tr>
<th colspan='16'>4. Value of new private sector investment in the agriculture sector or food chain leveraged by FTF implementation</th>
</tr>
";			

//===================data to be displayed=====================

$data.="<tr>
<th class='first-cell-header' rowspan='2'>#</th>
<th rowspan='2'>Name of Business</th>

<th rowspan='2'>Value Chain</th>
<th rowspan='2'>reportingPeriod</th>


<th rowspan='2' >Type of Business</th>
<th rowspan='2' >Location</th>
<th rowspan='2' >Duration with the Activity</th>
<th rowspan='2' >Organisation level technologies and management practices</th>
<th rowspan='2' >Technical innovations</th>
<th rowspan='2' >Land based technologies</th>
<th rowspan='2' >Amount invested in Technology adoption (UGX)</th>
<th colspan='4' >Jobs Created</th>
</tr>
<tr >
<th >Name of Job holder</th>
<th >Sex</th>
<th >Date of engagement</th>
<th >Time spent on job (Months)</th>
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
$query_string.=" and t.`tbl_techadoptionId` = ".$id."";					
$query_string.=" order by t.`tbl_techadoptionId` DESC";

/* $obj->alert($query_string); */

  
	$n=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	
  
  while($row_parent=mysql_fetch_array($query_)){
	  
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_tech_adoption_jobHolder` 
			WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
	  
			$data.="<tr>";
			$data.="<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_techadoptionId' 
					id='tbl_techadoptionId' value='".$row_parent['tbl_techadoptionId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' /></td>";
			$data.="<td ".$row_span.">
			<select name='traderName' id='traderName' style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2TraderFilter($row_parent['businessTraderName']);
						$data.="</select>
						</td>";
			$data.="<td ".$row_span.">
			<select name='valueChain' id='valueChain'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($row_parent['valueChain']));
						$data.="</select>
			</td>"; 			
			$data.="<td ".$row_span.">
			<select name='reporting_period' id='reporting_period'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($row_parent['reportingPeriod_cleaned']);
					$data.="</select>
						</td>";			
			$data.="<td ".$row_span.">
			<select name='typeOfBusiness' id='typeOfBusiness'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->TypeOfBusinessFilter($row_parent['typeOfBusiness']);
					$data.="</select>
						</td>";
			$data.="<td ".$row_span.">
			<select name='businessLocation' id='businessLocation'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2businessLocation($row_parent['businessLocation']);
					$data.="</select>
						</td>";
			$data.="<td ".$row_span.">
			<select name='durationWithOldActivity' id='durationWithOldActivity'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->DurationWithActivityFilter($row_parent['durationWithOldActivity']);
					$data.="</select>
					</td>";
						
			$data.="<td ".$row_span.">
			<select name='nameOfImprovedTech' id='nameOfImprovedTech'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2OrgLevelTechnologiesMangtPractices($row_parent['nameOfImprovedTech']);
					$data.="</select>
					</td>";
			
			$data.="<td ".$row_span.">
			<select name='techAdoptedInReportingPeriod' id='techAdoptedInReportingPeriod'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2TechnicalInnovations($row_parent['techAdoptedInReportingPeriod']);
					$data.="</select>
			</td>";
			
			$data.="<td ".$row_span.">
			<select name='techContinuedFromPast' id='techContinuedFromPast'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2LandBasedTechnologies($row_parent['techContinuedFromPast']);
					$data.="</select>
			</td>";
			$data.="<td ".$row_span." align='right'>
			<input 
				type='text' 
				name='amountInvestedInTechAdoption' 
				id='amountInvestedInTechAdoption' 
				value='".$row_parent['amountInvestedInTechAdoption']."'	
				onkeypress='return numbersonly(event, false)'
			/>
			</td>";
			
			//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_tech_adoption_jobHolder` 
					WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_tech_adoption_jobHolder` 
					WHERE `techAdoption_id`=".$row_parent['tbl_techadoptionId']." limit 1,100000")or die(http(__line__));
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
						xajax.getFormValues('edit_enterpriseTechAdoption'),
						'update_enterpriseTechAdoption'
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
				'>Updating  TECHNOLOGY ADOPTION Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";


$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_enterpriseTechAdoption($formValues){

$obj=new xajaxResponse();
$n=1;

$tbl_techadoptionId=$formValues['tbl_techadoptionId'];
$traderName=trim($formValues['traderName']);
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

$reportingMonth=($reportingMonth=='' or $reportingMonth==null)?$reportingMonth_default:$reportingMonth;
$typeOfBusiness=trim($formValues['typeOfBusiness']);
$businessLocation=$formValues['businessLocation'];
$durationWithOldActivity=trim($formValues['durationWithOldActivity']);
$nameOfImprovedTech=$formValues['nameOfImprovedTech'];
$techAdoptedInReportingPeriod=$formValues['techAdoptedInReportingPeriod'];
$techContinuedFromPast=$formValues['techContinuedFromPast'];
$amountInvestedInTechAdoption=$formValues['amountInvestedInTechAdoption'];


//get valid trader code
$s_tr = "SELECT `tbl_tradersId`,
`traderName` FROM `tbl_traders` WHERE `display`='Yes' and tbl_tradersId=".$traderName." order by `traderName` asc";
$q = Execute($s_tr) or die(http(__line__));
$rowd = FetchRecords($q);

$code= $rowd['tbl_tradersId']; 


//update  parent table
 $sql_parent_record="UPDATE `tbl_techadoption` 
SET
`valueChain`='".$valueChain."',
`reportingPeriod`='".$reportinPeriod."', 
`businessTraderName`='".$traderName."',
`businessLocation`='".$businessLocation."',
`nameOfImprovedTech`='".$nameOfImprovedTech."',
`techAdoptedInReportingPeriod`='".$techAdoptedInReportingPeriod."',
`techContinuedFromPast`='".$techContinuedFromPast."',
`amountInvestedInTechAdoption`='".$amountInvestedInTechAdoption."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`code`='".$code."',
`durationWithOldActivity`='".$durationWithOldActivity."',
`typeOfBusiness`='".$typeOfBusiness."',
`year`='".$year."',
`reportingMonth`='".$reportingMonth."',
`msmeType`='Trader'
WHERE
`tbl_techadoptionId` =".$tbl_techadoptionId."";
//$obj->alert($sql_parent_record); 
//$query=@mysql_query($sql_parent_record)or die(http(__line__)); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//update  first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=$formValues['nameOfJobHolder_first_child_row'];
$sexOfJobHolder_first_child_row=$formValues['sexOfJobHolder_first_child_row'];
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=$formValues['timeSpentOnJob_first_child_row'];

$sql_first_record="insert into tbl_tech_adoption_jobHolder
(`dateOfEngagement`,
`nameOfJobHolder`,
`sexOfJobHolder`,
`timeSpentOnJob`,
`techAdoption_id`)
values(
'".$dateOfEngagement_first_child_row."',
'".$nameOfJobHolder_first_child_row."',
'".$sexOfJobHolder_first_child_row."',
'".$timeSpentOnJob_first_child_row."',
'".$tbl_techadoptionId."') 

 on duplicate key update
 
`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."',
`techAdoption_id`=".$tbl_techadoptionId."";
//$obj->alert($sql_first_record); 
//$query=@mysql_query($sql_first_record)or die(mysql_error()); 
$query=@mysql_query($sql_first_record)or die(http(__line__)); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$nameOfJobHolder_other_children=$formValues['nameOfJobHolder_other_children'][$i];
	$sexOfJobHolder_other_children=$formValues['sexOfJobHolder_other_children'][$i];
	$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
	$timeSpentOnJob_other_children=$formValues['timeSpentOnJob_other_children'][$i];

		if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_tech_adoption_jobHolder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`=".$tbl_id_other_children."
		and `techAdoption_id`=".$tbl_techadoptionId."";
		
		//$obj->alert($sql_other_children); 
		//$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		$query=@mysql_query($sql_other_children)or die(http(__line__)); 
		
		}

	}

$obj->call("hidemyLoaderDiv"); 					 
$obj->assign('bodyDisplay','innerHTML',congMsg("Enterprise Technology Adoption has been Updated!"));
$obj->call("xajax_view_enterpriseTechAdoption",'','','','','','',1,20);
return $obj;
}

function edit_labourSavingTech($id){
	$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_labourSavingTech' id='edit_labourSavingTech' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='14'>
					CPMA-Data Form2/Labour Saving Technology: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='14'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='14'>1.  Number of labor-saving technologies that meet women farmers’ needs made available for transfer </td>
				</tr>
				
				<tr>
				<td colspan='14'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
  ";			

				//===================data to be displayed=====================
				$data.="<tr>
					<th rowspan='2' class='first-cell-header'>#</th>
    <th rowspan='2' >Name of Labour Saving technology</th>
					<th rowspan='2' class='small-cell-header'>Value Chain</th>
					<th rowspan='2'>Reporting Period</th>
					<th rowspan='2' >Labour saving concept</th>
    <th rowspan='2' >Person/Partner responsible for promoting adoption</th>
    <th rowspan='2' class='small-cell-header'>Amount invested in Technology adoption (UGX)</th>
    <th colspan='4' class='small-cell-header'>Jobs Created</th>
  </tr>
  <tr>
    <th >Name of Job holder</th>
    <th class='small-cell-header'>Sex</th>
    <th >Date of engagement</th>
    <th class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  </thead>
  <tbody>";
		
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
		$query_string.=" and `l`.`tbl_laboursavingtechId` ='".$id."'";
		$query_string.=" order by `l`.`tbl_laboursavingtechId` desc";

				$n=1;
				$query_=mysql_query($query_string)or die(http(__line__));
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_labourSavingTech_jobHolder` WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_laboursavingtechId' 
					id='tbl_laboursavingtechId' value='".$row_parent['tbl_laboursavingtechId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' />
					</td>
					
					<td ".$row_span.">						
						<select name='labourSavingTech' id='labourSavingTech'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2LabourSavingTechnologies($row_parent['labourSavingTech']);
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
						<textarea 
						style='width: 419px; height: 92px;'
						name='labourSavingConcept' 
						id='labourSavingConcept' 
						cols='30' 
						rows='1'>
						".$row_parent['labourSavingConcept']."
						</textarea>
					</td>";					
					$data.="<td ".$row_span.">
						<input type='text'
						name='personResponsible' 
						id='personResponsible' 
						value='".$row_parent['personResponsible']."'
						/>
					</td>";
					
					$data.="<td ".$row_span.">					
					<input 
						value='".$row_parent['amountInvestedOnTechInvestment']."' 
						type='text' 
						name='amountInvestedOnTechInvestment' 
						id='amountInvestedOnTechInvestment' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 1,100000")or die(http(__line__));
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
						xajax.getFormValues('edit_labourSavingTech'),
						'update_labourSavingTech'
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
				'>Updating LABOUR SAVING TECHONOLOGIES Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_labourSavingTech($formValues){
$obj=new xajaxResponse();
$n=1;

$tbl_laboursavingtechId=$formValues['tbl_laboursavingtechId'];
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
`tbl_laboursavingtechId` ='".$tbl_laboursavingtechId."'";
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
	'".$tbl_laboursavingtechId."'
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
	and `labour_saving_tech_id`='".$tbl_laboursavingtechId."'";
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
		and `labour_saving_tech_id`='".$tbl_laboursavingtechId."'";
		
		//$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		}

	}


$obj->call("hidemyLoaderDiv"); 				 
 $obj->assign('bodyDisplay','innerHTML',congMsg("LABOUR SAVING TECHONOLOGIES form has been Updated!"));
$obj->call("xajax_view_labourSavingTech",'','','',1,20);
return $obj;

}

function edit_mediaPrograms($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_mediaPrograms' id='edit_mediaPrograms' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='14'>
					CPMA-Data Form2/Media Programs: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='14'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='14'>1. Number of radio, SMS, and other media awareness programs designed to encourage youth to work in value chain businesses implemented</td>
				</tr>
				
				<tr>
				<td colspan='14'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
  ";			

				//===================data to be displayed=====================
				$data.="<tr>
					<th rowspan='2' class='first-cell-header'>#</th>
					<th rowspan='2'>Awareness message designed</th>
					<th rowspan='2' class='small-cell-header'>Value Chain</th>
					<th rowspan='2'>Reporting Period</th>
					<th rowspan='2'>Category of Youth targeted</th>
					<th rowspan='2'>Anticipated results</th>
					<th rowspan='2'>Type of Media utilised</th>
					<th colspan='2'>Broadcast  contract period</th>
					<th rowspan='2'>Districts Covered</th>
					<th colspan='4' class='small-cell-header'>Jobs Created</th>
				</tr>

				<tr>
					<th>From Date</th>
					<th>To Date</th>
					<th class='small-cell-header'>Name of Job holder</th>
					<th class='small-cell-header'>Sex</th>
					<th class='small-cell-header'>Date of engagement</th>
					<th class='small-cell-header'>Time spent on job (Months)</th>
				</tr>
			</thead>
		<tbody>";
		
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
				$query_string.=" and `m`.`tbl_mediaprogramsId`=".$id."";
				$query_string.=" order by `m`.`tbl_mediaprogramsId` desc";

				$n=1;
				$query_=mysql_query($query_string)or die(http(__line__));
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_mediaprogram_jobholder` 
			WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_mediaprogramsId' 
					id='tbl_mediaprogramsId' value='".$row_parent['tbl_mediaprogramsId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' />
					</td>
					<td ".$row_span.">
					<textarea style='width: 419px; height: 92px;'
					name='mediaAwarenessMessage' 
					id='mediaAwarenessMessage'>".$row_parent['mediaAwarenessMessage']."
					</textarea>
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
						<select name='categoryYouthTargeted' id='categoryYouthTargeted'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2GenderFilter($row_parent['categoryYouthTargeted']);
						$data.="</select>
					</td>";					
					$data.="<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='anticipatedResults' 
						id='anticipatedResults' 
						cols='30' 
						rows='1'>
						".$row_parent['anticipatedResults']."
						</textarea>
					</td>";
					
					$data.="<td ".$row_span.">					
					<select name='typeOfMedia' id='typeOfMedia'>
						<option value=''>-select-</option>";
						$data.=QueryManager::Form2TypeOfMediaUtilisedFilter($row_parent['typeOfMedia']);
					$data.="</select>
					</td>";
					
					$data.="
					<td ".$row_span.">
						<a href='javascript:void(0)' 
						onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById('fromDate')
						);return false;\" 
						hidefocus=''>
						<input 
						name='fromDate' 
						type='text'  
						size='15px' 
						id='fromDate' 
						value='".$row_parent['fromDate']."' 
						readonly='readonly'
						/>
						<img 
						name='popcal' 
						src='WeekPicker/calbtn.gif' 
						alt='calendar' 
						align='absmiddle' 
						border='0' 
						height='22' 
						width='25'
						>
						</a>
					</td>
					<td ".$row_span.">
						<a href='javascript:void(0)' 
						onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById('toDate')
						);return false;\" 
						hidefocus=''>
						<input 
						name='toDate' 
						type='text'  
						size='15px' 
						id='toDate' 
						value='".$row_parent['toDate']."' 
						readonly='readonly'
						/>
						<img 
						name='popcal' 
						src='WeekPicker/calbtn.gif' 
						alt='calendar' 
						align='absmiddle' 
						border='0' 
						height='22' 
						width='25'
						>
						</a>
					</td>
					<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='coverage' 
						id='coverage' 
						cols='30' 
						rows='1'>
						".$row_parent['coverage']."
						</textarea>
					</td>";
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 1,100000")or die(http(__line__));
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
						xajax.getFormValues('edit_mediaPrograms'),
						'update_mediaPrograms'
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
				'>Updating Media Programs Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_mediaPrograms($formValues){
$obj=new xajaxResponse();
$n=1;


$tbl_mediaprogramsId=$formValues['tbl_mediaprogramsId'];
$mediaAwarenessMessage=trim($formValues['mediaAwarenessMessage']);
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
$fromDate=($formValues['fromDate']=='')?$start_date_default:$formValues['fromDate'];
$toDate=($formValues['toDate']=='')?$end_date_default:$formValues['toDate'];

$coverage=trim($formValues['coverage']);
$categoryYouthTargeted=$formValues['categoryYouthTargeted'];
$anticipatedResults=trim($formValues['anticipatedResults']);
$typeOfMedia=$formValues['typeOfMedia'];




//update  parent table
 $sql_parent_record="UPDATE `tbl_mediaprograms` 
SET
`mediaAwarenessMessage`='".$mediaAwarenessMessage."',
`valueChain`='".$valueChain."',
`year`='".$year."',
`reportingPeriod`='".$reportinPeriod."', 
`categoryYouthTargeted`='".$categoryYouthTargeted."', 
`anticipatedResults`='".$anticipatedResults."', 
`typeOfMedia`='".$typeOfMedia."',
`fromDate`='".$fromDate."',
`toDate`='".$toDate."',
`coverage`='".$coverage."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`reportingMonth`='".$reportingMonth."'
WHERE
`tbl_mediaprogramsId` =".$tbl_mediaprogramsId."";
//$obj->alert($sql_parent_record); 
$query=@mysql_query($sql_parent_record)or die(http(__line__)); 



//update or insert into the first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=$formValues['nameOfJobHolder_first_child_row'];
$sexOfJobHolder_first_child_row=$formValues['sexOfJobHolder_first_child_row'];
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=$formValues['timeSpentOnJob_first_child_row'];

switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_mediaprogram_jobholder`
	(`dateOfEngagement`, `nameOfJobHolder`, `sexOfJobHolder`, `timeSpentOnJob`, `media_program_id`) 
	VALUES (
	'".$dateOfEngagement_first_child_row."',
	'".$nameOfJobHolder_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$tbl_mediaprogramsId."'
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_mediaprogram_jobholder` 
	SET 
	`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."' 
	WHERE `tbl_id`=".$tbl_id_first_row."
	and `media_program_id`='".$tbl_mediaprogramsId."'";
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
		$sql_other_children="UPDATE `tbl_mediaprogram_jobholder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`=".$tbl_id_other_children."
		and `media_program_id`=".$tbl_mediaprogramsId."";
		
		//$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		}

	}

$obj->call("hidemyLoaderDiv"); 				 
$obj->assign('bodyDisplay','innerHTML',congMsg("Media Programs Form Successfully Updated"));
$obj->call("xajax_view_mediaPrograms",'','','','',1,20);
return $obj;
}

function edit_youthApprentice($id){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$qmobj=new QueryManager('');
$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='youthApprentice' id='youthApprentice' method='post'>
<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
	$data.="<thead>
		<tr>
			<th colspan='18'>
			CPMA-Data Form2/YOUTH APPRENTICESHIP: EDIT
			</th>
		</tr>

		<tr >
			<td colspan='18'>Indicator</td>
		</tr>

		<tr>
			<td colspan='18'>1. Number of apprenticeships for youth in value chain businesses brokered by the activity</td>
		</tr>

		<tr>
			<td colspan='18'>2. Number of jobs attributed to FTF implementation</td>
		</tr>
		";			

		//===================data to be displayed=====================
		$data.="<tr>
			<th rowspan='4' class='first-cell-header'>#</th>
			<th rowspan='4'>Name of Business incorporating the youth apprenticeship</th>
			<th rowspan='4' class='small-cell-header'>Sex of Owner</th>
			<th rowspan='4' class='small-cell-header'>Value chain</th>
			<th rowspan='4'>Reporting Period</th>
			<th colspan='6' rowspan='2' class='small-cell-header'>Number of Youth attached</th>
			<th colspan='2'>Apprenticeship period in the Agreement</th>
			<th rowspan='4' >Anticipated outcomes from the apprenticeship program</th>
			<th colspan='4' class='small-cell-header'>Jobs Created</th>
		</tr>
		
		<tr>
			<th rowspan='3' class='small-cell-header'>From Date:</th>
			<th rowspan='3' class='small-cell-header'>To Date:</th>
		
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
					$query_string.=" and `y`.`tbl_youthapprenticeId` =".$id."";
					$query_string.=" group BY `y`.`tbl_youthapprenticeId` ";
					$query_string.=" order BY `y`.`tbl_youthapprenticeId` desc";

			$x=1;
			$query_=mysql_query($query_string)or die(http(__line__));
			
		  
		  while($row_parent=mysql_fetch_array($query_)){
			  
			  //determining the number of child records for each row
				$s_child="SELECT * FROM `tbl_apprenticeship_jobHolder` WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']."";
				$q_child=Execute($s_child) or die(http(__line__));			
				$num_child_records=mysql_num_rows($q_child);	
				//$obj->alert($num_child_records);			
				$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
				$col_span=($num_child_records>1)?"colspan='2'":"";
				$v=$n+$num_child_records;
				
					$data.="<tr>";
					$data.="<td ".$row_span.">".$x.".<input type='hidden'  name='tbl_youthapprenticeId' 
					id='tbl_youthapprenticeId' value='".$row_parent['tbl_youthapprenticeId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' /></td>";
					$data.="<td ".$row_span.">
					<textarea style='width: 419px; height: 92px;'
						name='nameofBusiness' 
						id='nameofBusiness' 
						cols='30' 
						rows='1'>".($row_parent['nameofBusiness'])."
					</textarea>
					</td>";
					$data.="<td ".$row_span.">
					<select  
							name='sexBusinessOwner' 
							id='sexBusinessOwner' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2GenderFilter($row_parent['sexBusinessOwner']);
							$data.="</select>
					</td>";
					$data.="<td ".$row_span.">						
						<select name='valueChain' id='valueChain'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($row_parent['valueChain']));
						$data.="</select>
					</td>";
					$data.="<td ".$row_span.">
					<select name='reporting_period' id='reporting_period'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($row_parent['reportingPeriod_cleaned']);
					$data.="</select>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedFemaleNew' 
						id='num_youthAttachedFemaleNew' 
						value='".$row_parent['num_youthAttachedFemaleNew']."'
						onKeyUp=\"xajax_calc_youthApprentice(
						getElementById('num_youthAttachedFemaleNew').value,
						getElementById('num_youthAttachedMaleNew').value,
						'num_youthAttachedTotalNew');return false;\"
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedFemaleOld' 
						id='num_youthAttachedFemaleOld' 
						value='".$row_parent['num_youthAttachedFemaleOld']."'
						onKeyUp=\"xajax_calc_youthApprentice(
						getElementById('num_youthAttachedFemaleOld').value,
						getElementById('num_youthAttachedMaleOld').value,
						'num_youthAttachedTotalOld');return false;\"
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedMaleNew' 
						id='num_youthAttachedMaleNew' 
						value='".$row_parent['num_youthAttachedMaleNew']."'
						onKeyUp=\"xajax_calc_youthApprentice(
						getElementById('num_youthAttachedFemaleNew').value,
						getElementById('num_youthAttachedMaleNew').value,
						'num_youthAttachedTotalNew');return false;\"
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedMaleOld' 
						id='num_youthAttachedMaleOld' 
						value='".$row_parent['num_youthAttachedMaleOld']."'
						onKeyUp=\"xajax_calc_youthApprentice(
						getElementById('num_youthAttachedFemaleOld').value,
						getElementById('num_youthAttachedMaleOld').value,
						'num_youthAttachedTotalOld');return false;\"
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedTotalNew' 
						id='num_youthAttachedTotalNew' 
						value='".$row_parent['num_youthAttachedTotalNew']."'
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					$data.="<td ".$row_span." align='right'>
					<input 
						type='text' 
						name='num_youthAttachedTotalOld' 
						id='num_youthAttachedTotalOld' 
						value='".$row_parent['num_youthAttachedTotalOld']."'
						onkeypress='return numbersonly(event, false)'
					/>
					</td>";
					
					$data.="<td ".$row_span.">
						<a href='javascript:void(0)' 
						onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById('fromDate')
						);return false;\" 
						hidefocus=''>
						<input 
						name='fromDate' 
						type='text'  
						size='15px' 
						id='fromDate' 
						value='".$row_parent['fromDate']."' 
						readonly='readonly'
						/>
						<img 
						name='popcal' 
						src='WeekPicker/calbtn.gif' 
						alt='calendar' 
						align='absmiddle' 
						border='0' 
						height='22' 
						width='25'
						>
						</a>
					</td>
					<td ".$row_span.">
						<a href='javascript:void(0)' 
						onclick=\"if(self.gfPop)gfPop.fPopCalendar(
						document.getElementById('toDate')
						);return false;\" 
						hidefocus=''>
						<input 
						name='toDate' 
						type='text'  
						size='15px' 
						id='toDate' 
						value='".$row_parent['toDate']."' 
						readonly='readonly'
						/>
						<img 
						name='popcal' 
						src='WeekPicker/calbtn.gif' 
						alt='calendar' 
						align='absmiddle' 
						border='0' 
						height='22' 
						width='25'
						>
						</a>
					</td>
					<td ".$row_span.">
					<textarea style='width: 419px; height: 92px;'
						name='anticipatedOutcome' 
						id='anticipatedOutcome' 
						cols='30' 
						rows='1'>".($row_parent['anticipatedOutcome'])."
					</textarea>
					</td>";
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_apprenticeship_jobHolder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_apprenticeship_jobHolder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 1,100000")or die(http(__line__));
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
				<td colspan='18'>
					<div align='right'>
						<input  type='submit' class='formButton2' 
						name='save' id='save' 
						style='width:100px;' value='Update' 
						onclick=\"loadingIcon(
						xajax.getFormValues('youthApprentice'),
						'update_youthApprentice'
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
				'>Updating YOUTH APPRENTICESHIP Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_youthApprentice($formValues){
$obj=new xajaxResponse();
$n=1;
$tbl_youthapprenticeId=$formValues['tbl_youthapprenticeId'];
$nameofBusiness=trim($formValues['nameofBusiness']);
$sexBusinessOwner=trim($formValues['sexBusinessOwner']);
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
$fromDate=($formValues['fromDate']=='')?$start_date_default:$formValues['fromDate'];
$toDate=($formValues['toDate']=='')?$end_date_default:$formValues['toDate'];

$num_youthAttachedFemaleNew=trim($formValues['num_youthAttachedFemaleNew']);
$num_youthAttachedMaleNew=$formValues['num_youthAttachedMaleNew'];
$num_youthAttachedTotalNew=trim($formValues['num_youthAttachedTotalNew']);
$num_youthAttachedFemaleOld=$formValues['num_youthAttachedFemaleOld'];
$num_youthAttachedMaleOld=$formValues['num_youthAttachedMaleOld'];
$num_youthAttachedTotalOld=$formValues['num_youthAttachedTotalOld'];
$anticipatedOutcome=$formValues['anticipatedOutcome'];




//update  parent table
 $sql_parent_record="UPDATE `tbl_youthapprentice` 
SET
`nameofBusiness`='".$nameofBusiness."',
`valueChain`='".$valueChain."',
`year`='".$year."',
`reportingPeriod`='".$reportinPeriod."', 
`sexBusinessOwner`='".$sexBusinessOwner."',
`num_youthAttachedFemaleNew`='".$num_youthAttachedFemaleNew."',
`num_youthAttachedFemaleOld`='".$num_youthAttachedFemaleOld."',
`num_youthAttachedMaleNew`='".$num_youthAttachedMaleNew."',
`num_youthAttachedMaleOld`='".$num_youthAttachedMaleOld."',
`num_youthAttachedTotalNew`='".$num_youthAttachedTotalNew."',
`num_youthAttachedTotalOld`='".$num_youthAttachedTotalOld."',
`fromDate`='".$fromDate."',
`toDate`='".$toDate."',
`anticipatedOutcome`='".$anticipatedOutcome."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`reportingMonth`='".$reportingMonth."'
WHERE
`tbl_youthapprenticeId` =".$tbl_youthapprenticeId."";
//$obj->alert($sql_parent_record); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//update or insert into the first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=$formValues['nameOfJobHolder_first_child_row'];
$sexOfJobHolder_first_child_row=$formValues['sexOfJobHolder_first_child_row'];
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=$formValues['timeSpentOnJob_first_child_row'];

switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_apprenticeship_jobHolder`
	(`dateOfEngagement`, `nameOfJobHolder`, `sexOfJobHolder`, `timeSpentOnJob`, `apprenticeship_id`) 
	VALUES (
	'".$dateOfEngagement_first_child_row."',
	'".$nameOfJobHolder_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$tbl_youthapprenticeId."'
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_apprenticeship_jobHolder` 
	SET 
	`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."' 
	WHERE `tbl_id`=".$tbl_id_first_row."
	and `apprenticeship_id`='".$tbl_youthapprenticeId."'";
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
		$sql_other_children="UPDATE `tbl_apprenticeship_jobHolder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`=".$tbl_id_other_children."
		and `apprenticeship_id`=".$tbl_youthapprenticeId."";
		
		//$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(http(__line__)); 
		
		}

	}

$obj->call("hidemyLoaderDiv"); 	
$obj->assign('bodyDisplay','innerHTML',congMsg("Youth Apprenticeship record(s) has been Updated!"));
$obj->call("xajax_view_youthApprentice",'','','',1,20);
return $obj;
}

function edit_bds($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_bds' id='edit_bds' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='17'>
					CPMA-Data Form2/BUSINESS DEVELOPMENT SERVICES: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='17'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='17'>1. Number of MSMEs, including farmers, receiving business development services from U.S. government assisted sources </td>
				</tr>
				
				<tr>
				<td colspan='17'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
  ";			

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
	as  `reportingPeriod_cleaned`,
	`mv`.*
	from `tbl_businessdev` as `v`,
	tbl_mainvaluechain as `mv`
	where `v`.valueChain LIKE CONCAT('%', SUBSTRING(`mv`.`name`, 3, 20) ,'%')   ";  
	
	$reporting_period=(!empty($cpma_year))?'':$reporting_period;
	$cpma_year=(!empty($reporting_period))?'':$cpma_year;
	$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
	$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
	$valueChain=(!empty($valueChain))?" AND `mv`.`tbl_chainId` = '".$valueChain."' ":"";
	$query_string.=$reporting_period.$cpma_year.$valueChain;
	$query_string.=" and   `v`.`tbl_businessdevId` = '".$id."'";
	$query_string.=" order by `v`.`tbl_businessdevId` desc";

				$n=1;
				$query_=mysql_query($query_string)or die(http(__line__));
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bds_jobHolder` WHERE `bds_id`=".$row_parent['tbl_businessdevId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_businessdevId' 
					id='tbl_businessdevId' value='".$row_parent['tbl_businessdevId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' />
					</td>
					
					<td ".$row_span.">
					<textarea 
						style='width: 419px; height: 92px;'
						name='nameofBusiness' 
						id='nameofBusiness' 
						cols='30' 
						rows='1'>
						".$row_parent['nameofBusiness']."
						</textarea>
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
						<textarea 
						style='width: 419px; height: 92px;'
						name='areaOfExpertise' 
						id='areaOfExpertise' 
						cols='30' 
						rows='1'>
						".$row_parent['areaOfExpertise']."
						</textarea>
					</td>

					<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='servicesOffered' 
						id='servicesOffered' 
						cols='30' 
						rows='1'>
						".$row_parent['servicesOffered']."
						</textarea>
					</td>";	
						
					$data.="<td ".$row_span.">
						<select name='nameOfMSME' id='nameOfMSME'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2PartnerFilter($row_parent['nameOfMSME']);
					$data.="</select>
					</td>";
					
					$data.="<td ".$row_span.">					
					<input 
						value='".$row_parent['numOfEmployee']."' 
						type='text' 
						name='numOfEmployee' 
						id='numOfEmployee' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					<td ".$row_span.">
					<select  
							name='sexOfMSME' 
							id='sexOfMSME' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=QueryManager::Form2GenderFilter($row_parent['sexOfMSME']);
							$data.="</select>					
					</td>
					
					<td ".$row_span.">
					<select  
							name='typeOfActorServiced' 
							id='typeOfActorServiced' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=QueryManager::Form2TypeOfActorServiced($row_parent['typeOfActorServiced']);
							$data.="</select>					
					</td>
					<td ".$row_span.">					
					<input 
						value='".$row_parent['actorServedFemale']."' 
						type='text' 
						name='actorServedFemale' 
						id='actorServedFemale' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					<td ".$row_span.">					
					<input 
						value='".$row_parent['actorServedMale']."' 
						type='text' 
						name='actorServedMale' 
						id='actorServedMale' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='roleOfActivity' 
						id='roleOfActivity' 
						cols='30' 
						rows='1'>
						".$row_parent['roleOfActivity']."
						</textarea>
					</td>";
					
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 1,100000")or die(http(__line__));
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
				<td colspan='17'>
					<div align='right'>
						<input  type='submit' class='formButton2' 
						name='save' id='save' 
						style='width:100px;' value='Update' 
						onclick=\"loadingIcon(
						xajax.getFormValues('edit_bds'),
						'update_bds'
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
				'>Updating BUSINESS DEVELOPMENT SERVICES Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_bds($formValues){
$obj=new xajaxResponse();
$n=1;


$tbl_businessdevId=$formValues['tbl_businessdevId'];
$nameofBusiness=trim($formValues['nameofBusiness']);
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

$areaOfExpertise=trim($formValues['areaOfExpertise']);
$servicesOffered=trim($formValues['servicesOffered']);

//name SME made up of VA's, Traders and Exporters
$nameOfMSME=trim($formValues['nameOfMSME']);
list($smeId,$smeType) = QueryManager::get_partner_type_and_Id(QueryManager::get_partnership_id($nameOfMSME),$nameOfMSME);
$tot_string_length= trim(strlen($nameOfMSME));
$string_length_char= trim(strrpos($nameOfMSME,"|"));
$start_index=($string_length_char-$tot_string_length);
$nameOfMSME=trim(substr($nameOfMSME, 0, ($start_index)));

$numOfEmployee=$formValues['numOfEmployee'];
$sexOfMSME=trim($formValues['sexOfMSME']);
$typeOfActorServiced=trim($formValues['typeOfActorServiced']);
$actorServedFemale=trim($formValues['actorServedFemale']);
$actorServedMale=trim($formValues['actorServedMale']);
$roleOfActivity=trim($formValues['roleOfActivity']);




//update  parent table
 $sql_parent_record="UPDATE `tbl_businessdev` 
SET
`nameofBusiness`='".$nameofBusiness."',
`valueChain`='".$valueChain."',
`year`='".$year."',
`reportingPeriod`='".$reportinPeriod."', 
`areaOfExpertise`='".$areaOfExpertise."', 
`servicesOffered`='".$servicesOffered."', 
`nameOfMSME`='".$nameOfMSME."',
`numOfEmployee`='".$numOfEmployee."',
`sexOfMSME`='".$sexOfMSME."',
`typeOfActorServiced`='".$typeOfActorServiced."',
`actorServedFemale`='".$actorServedFemale."',
`actorServedMale`='".$actorServedMale."',
`roleOfActivity`='".$roleOfActivity."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`reportingMonth`='".$reportingMonth."',
`msmeId`='".$smeId."',
`msmeType`='".$smeType."'
WHERE
`tbl_businessdevId` =".$tbl_businessdevId."";
//$obj->alert($sql_parent_record); 
//$query=@mysql_query($sql_parent_record)or die(http(__line__)); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//update or insert into the first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=($formValues['nameOfJobHolder_first_child_row'] !=='')?$formValues['nameOfJobHolder_first_child_row']:'-';
$sexOfJobHolder_first_child_row=($formValues['sexOfJobHolder_first_child_row'] !=='')?$formValues['sexOfJobHolder_first_child_row']:'-';
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=($formValues['timeSpentOnJob_first_child_row'] !=='')?$formValues['timeSpentOnJob_first_child_row']:0;



switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_bds_jobHolder`
	(`dateOfEngagement`, `nameOfJobHolder`, `sexOfJobHolder`, `timeSpentOnJob`, `bds_id`) 
	VALUES (
	'".$dateOfEngagement_first_child_row."',
	'".$nameOfJobHolder_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$tbl_businessdevId."'
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_bds_jobHolder` 
	SET 
	`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."' 
	WHERE `tbl_id`=".$tbl_id_first_row."
	and `bds_id`='".$tbl_businessdevId."'";
	break;
	
}

//$obj->alert($sql_first_record); 
//$query=@mysql_query($sql_first_record)or die(http(__line__)); 
$query=@mysql_query($sql_first_record)or die(mysql_error()); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$nameOfJobHolder_other_children=$formValues['nameOfJobHolder_other_children'][$i];
	$sexOfJobHolder_other_children=$formValues['sexOfJobHolder_other_children'][$i];
	$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
	$timeSpentOnJob_other_children=$formValues['timeSpentOnJob_other_children'][$i];

		if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_bds_jobHolder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`=".$tbl_id_other_children."
		and `bds_id`=".$tbl_businessdevId."";
		
		//$obj->alert($sql_other_children); 
		//$query=@mysql_query($sql_other_children)or die(http(__line__)); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		
		}

	}

$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("Business Development Services record successfully Updated!"));
$obj->call("xajax_view_bds",'','','',1,20);
return $obj;
}

function edit_bankLoans($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_bankLoans' id='edit_bankLoans' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='17'>
					CPMA-Data Form2/BANK LOANS: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='16'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='16'>1. Number of MSMEs receiving USG assistance to access bank loans</td>
				</tr>
				
				<tr>
				<td colspan='16'>2. Value of Agricultural and Rural loans</td>
				</tr>
				
				<tr>
				<td colspan='16'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
  ";			

				//===================data to be displayed=====================
				$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of MSME (Include Individual farmers and VAs as applicable)</th>
	<th rowspan='3' class='small-cell-header'>Value Chain</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>No. of Full time Employees</th>
    <th rowspan='3' class='small-cell-header'>Sex of MSME (F/M)</th>
    <th rowspan='3'>Date of Birth</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3' class='small-cell-header'>Amount of Loan Accessed (UGX)</th>
    <th rowspan='3'>Type of Loan Receipient (Farmer, Local trader, Processors, Exporter etc)</th>
    <th rowspan='3'>Sex of recipient (Female, Male,Joint)</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr height='28'>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  </thead>
  <tbody>";
  
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
$query_string.=" and `b`.`tbl_bankLoanId` = '".$id."'";
$query_string.=" order by `b`.`tbl_bankLoanId` desc";

				$n=1;
				//$query_=mysql_query($query_string)or die(http(__line__));
				$query_=mysql_query($query_string)or die(mysql_error());
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bank_loans_jobHolder` WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.". <input type='hidden'  name='tbl_bankLoanId' 
					id='tbl_bankLoanId' value='".$row_parent['tbl_bankLoanId']."' />
					<input type='hidden'  name='reportingMonth' 
					id='reportingMonth' value='".$row_parent['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy' 
					id='CompiledBy' value='".$row_parent['CompiledBy']."' />
					</td>
					
					<td ".$row_span.">						
						<select name='nameMSME' 
						id='nameMSME'
						style='width:150px;'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2PartnerFilter($row_parent['nameMSME']);
					$data.="</select>
					</td>					
					
					
					<td ".$row_span.">
					<select name='valueChain' 
					id='valueChain'
					style='width:150px;'>
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
					<input 
						value='".$row_parent['numberOfFullTimeEmployees']."' 
						type='text' 
						name='numberOfFullTimeEmployees' 
						id='numberOfFullTimeEmployees' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					
					<td ".$row_span.">
					<select  
							name='sexOfMSME' 
							id='sexOfMSME' 
							style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=QueryManager::Form2GenderFilter($row_parent['sexOfMSME']);
							$data.="</select>					
					</td>					

					<td ".$row_span.">
						<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.edit_bankLoans.dateOfBirth);return false;\"
						hidefocus=''>
						<input  
						name='dateOfBirth' 
						type='text' size='20' 
						value='' id='dateOfBirth' 
						value='".$row_parent['dateOfBirth']."' readonly='readonly' 
						style='width:175px;>
						<img name='popcal' 
						src='/WeekPicker/calbtn.gif' 
						alt='' 
						align='absmiddle'
						border='0' 
						height='22' 
						width='30px'>
						</a>
					</td>
					
					<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='cpmAssistance' 
						id='cpmAssistance' 
						cols='30' 
						rows='1'>
						".$row_parent['cpmAssistance']."
						</textarea>
					</td>
					
					<td ".$row_span.">
						<input 
						value='".$row_parent['amountLoanAccessed']."' 
						type='text' 
						name='amountLoanAccessed' 
						id='amountLoanAccessed' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";	
						
					$data.="<td ".$row_span.">
						<select name='typeOfLoanRecepient'
						id='typeOfLoanRecepient'
						style='width:150px;'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2typeOfLoanRecepient($row_parent['typeOfLoanRecepient']);
					$data.="</select>
					</td>";
					
					$data.="<td ".$row_span.">
						<select name='recipientSex' 
						id='recipientSex'
						style='width:150px;'>";
					$data.="<option value=''>-Select-</option>";
					$data.=$qmobj->Form2BankLoansGenderRecepient($row_parent['recipientSex']);
					$data.="</select>
					</td>
					<td ".$row_span.">
						<textarea 
						style='width: 419px; height: 92px;'
						name='bankingInstitution' 
						id='bankingInstitution' 
						cols='30' 
						rows='1'>
						".$row_parent['bankingInstitution']."
						</textarea>
					</td>";
					
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 0,1")or die(http(__line__));
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
					$s_other_children = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 1,100000")or die(http(__line__));
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
						xajax.getFormValues('edit_bankLoans'),
						'update_bankLoans'
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
				'>Updating BANK LOANS Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_bankLoans($formValues){
$obj=new xajaxResponse();
$n=1;


$tbl_bankLoanId=$formValues['tbl_bankLoanId'];
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

$numberOfFullTimeEmployees=trim($formValues['numberOfFullTimeEmployees']);
$sexOfMSME=trim($formValues['sexOfMSME']);

//name SME made up of VA's, Traders and Exporters
$nameMSME=trim($formValues['nameMSME']);
list($smeId,$smeType) = QueryManager::get_partner_type_and_Id(QueryManager::get_partnership_id($nameMSME),$nameMSME);
$tot_string_length= trim(strlen($nameMSME));
$string_length_char= trim(strrpos($nameMSME,"|"));
$start_index=($string_length_char-$tot_string_length);
$nameMSME=trim(substr($nameMSME, 0, ($start_index)));

$numOfEmployee=$formValues['numOfEmployee'];
$sexOfMSME=trim($formValues['sexOfMSME']);
$dateOfBirth=trim($formValues['dateOfBirth'])." 00:00:00";

$dateOfBirth=(trim($formValues['dateOfBirth']) !=='')?trim($formValues['dateOfBirth'])." 00:00:00":date('Y-m-d h:i:s');
$cpmAssistance=trim($formValues['cpmAssistance']);
$amountLoanAccessed=trim($formValues['amountLoanAccessed']);
$typeOfLoanRecepient=trim($formValues['typeOfLoanRecepient']);

$recipientSex=trim($formValues['recipientSex']);
$bankingInstitution=trim($formValues['bankingInstitution']);




//update  parent table
 $sql_parent_record="UPDATE `tbl_bankloans` 
SET
`nameMSME`='".$nameMSME."',
`valueChain`='".$valueChain."',
`year`='".$year."',
`reportingPeriod`='".$reportinPeriod."', 
`numberOfFullTimeEmployees`='".$numberOfFullTimeEmployees."', 
`sexOfMSME`='".$sexOfMSME."', 
`cpmAssistance`='".$cpmAssistance."',
`amountLoanAccessed`='".$amountLoanAccessed."',
`typeOfLoanRecepient`='".$typeOfLoanRecepient."',
`recipientSex`='".$recipientSex."',
`bankingInstitution`='".$bankingInstitution."',
`CompiledBy`='".$CompiledBy."',
`ReviewedBy`='".$CompiledBy."', 
`SubmittedBy`='".$CompiledBy."', 
`DateSubmission`='".date('Y-m-d')."', 
`updatedby`='".$_SESSION['name']."',
`dateOfBirth`='".$dateOfBirth."',
`reportingMonth`='".$reportingMonth."',
`msmeId`='".$smeId."',
`msmeType`='".$smeType."'
WHERE
`tbl_bankLoanId` =".$tbl_bankLoanId."";
//$obj->alert($sql_parent_record); 
//$query=@mysql_query($sql_parent_record)or die(http(__line__)); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//update or insert into the first kid table record
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=($formValues['nameOfJobHolder_first_child_row'] !=='')?$formValues['nameOfJobHolder_first_child_row']:'-';
$sexOfJobHolder_first_child_row=($formValues['sexOfJobHolder_first_child_row'] !=='')?$formValues['sexOfJobHolder_first_child_row']:'-';
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=($formValues['timeSpentOnJob_first_child_row'] !=='')?$formValues['timeSpentOnJob_first_child_row']:0;



switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_bank_loans_jobHolder`
	(`dateOfEngagement`, `nameOfJobHolder`, `sexOfJobHolder`, `timeSpentOnJob`, `bankLoan_id`) 
	VALUES (
	'".$dateOfEngagement_first_child_row."',
	'".$nameOfJobHolder_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$tbl_bankLoanId."'
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_bank_loans_jobHolder` 
	SET 
	`dateOfEngagement`='".$dateOfEngagement_first_child_row."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."',
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."' 
	WHERE `tbl_id`=".$tbl_id_first_row."
	and `bankLoan_id`='".$tbl_bankLoanId."'";
	break;
	
}

//$obj->alert($sql_first_record); 
//$query=@mysql_query($sql_first_record)or die(http(__line__)); 
$query=@mysql_query($sql_first_record)or die(mysql_error()); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$nameOfJobHolder_other_children=$formValues['nameOfJobHolder_other_children'][$i];
	$sexOfJobHolder_other_children=$formValues['sexOfJobHolder_other_children'][$i];
	$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
	$timeSpentOnJob_other_children=$formValues['timeSpentOnJob_other_children'][$i];

		if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_bank_loans_jobHolder` 
		SET 
		`dateOfEngagement`='".$dateOfEngagement_other_children."',
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."',
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."' 
		WHERE `tbl_id`=".$tbl_id_other_children."
		and `bankLoan_id`=".$tbl_bankLoanId."";
		
		//$obj->alert($sql_other_children); 
		//$query=@mysql_query($sql_other_children)or die(http(__line__)); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		
		}

	}

$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("BANK LOANS record successfully Updated!"));
$obj->call("xajax_view_bankLoans",'','','','',1,20);
return $obj;
}

function edit_inputSales($id){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_inputSales' id='edit_inputSales' method='post'>";
$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='22'>
					CPMA-Data Form2/INPUT SALES: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='22'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='22'>1. Input Sales by Activity -assisted intermediary business models</td>
				</tr>
				
				<tr>
				<td colspan='22'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
				
				<tr>
				<td colspan='22'>3. Percentage of Farmers purchasing inputs from village agents and other promoted models</td>
				</tr>
				
				<tr>
				<td colspan='22'>4. Value of new private sector investment in the agriculture sector or food chain leveraged by FTF implementation</td>
				</tr>
  ";			

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
		$query_string.=" and `s`.`id`='".$id."' ";	
		$query_string.=" group by `s`.`id` ";
		$query_string.=" order by `s`.`id` desc";

				$n=1;
				//$query_=mysql_query($query_string)or die(http(__line__));
				$query_=mysql_query($query_string)or die(mysql_error());
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
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
		
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
			
				$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".<input type='hidden'  name='tbl_inputSales_id' 
					id='tbl_inputSales_id' value='".$row_parent['id']."' />			
					</td>";
		$data.="<td ".$row_span.">
		<select name='nameOfMiddleValueChainActor' 
		id='nameOfMiddleValueChainActor'
		style='width:150px;'>";
		$data.="<option value=''>-Select-</option>";
		$data.=$qmobj->Form2PartnerFilter($row_parent['nameOfMiddleValueChainActor']);
		$data.="</select>
		</td>";
		
		$data.="<td ".$row_span.">";
		$currentDateBizStart=@date('Y-m-d', @strtotime($row_parent['dateOfStartOfinputsSalesBusiness']));
		$data.="
			<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(
			document.getElementById(getElementWithNameLike(this,'dateOfStartOfinputsSalesBusiness').attr('id')
			)
			);return false;\" 
			hidefocus=''>
			<input  
			name='dateOfStartOfinputsSalesBusiness' 
			id='dateOfStartOfinputsSalesBusiness' 
			type='text' size='10'
			value='".$currentDateBizStart."' 
			style=\"width:100px;\"
			/>
			<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
			</a>
		</td>";
					
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
		WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 0,1")or die(http(__line__));
		$first_child_row = mysql_fetch_array($s_first_child);	
					
					$data.="<td>
					<input type='hidden'  name='reportingMonth_first_child_row' 
					id='reportingMonth_first_child_row' value='".$first_child_row['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy_first_child_row' 
					id='CompiledBy_first_child_row' value='".$first_child_row['compiledBy']."' />
					<select name='reporting_period_first_child_row' id='reporting_period_first_child_row'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($first_child_row['reportingPeriod_cleaned']);
					$data.="</select>
					</td>";
					
					$data.="<td>
					<select name='valueChain_first_child_row' 
					id='valueChain_first_child_row'
					class='disabled'
					'readonly'='readonly'
					style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($first_child_row['valueChain']));
						$data.="</select>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['numberOfMessengersMale']."' 
						type='text' 
						name='numberOfMessengersMale_first_child_row' 
						id='numberOfMessengersMale_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['numberOfMessengersFemale']."' 
						type='text' 
						name='numberOfMessengersFemale_first_child_row' 
						id='numberOfMessengersFemale_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".(($first_child_row['numberOfMessengersMale'])+($first_child_row['numberOfMessengersFemale']))."' 
						type='text' 
						name='numberOfMessengersTOtal_first_child_row' 
						id='numberOfMessengersTOtal_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['numberOfFarmersBenefitingMale']."' 
						type='text' 
						name='numberOfFarmersBenefitingMale_first_child_row' 
						id='numberOfFarmersBenefitingMale_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['numberOfFarmersBenefitingFemale']."' 
						type='text' 
						name='numberOfFarmersBenefitingFemale_first_child_row' 
						id='numberOfFarmersBenefitingFemale_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".(($first_child_row['numberOfFarmersBenefitingMale'])+($first_child_row['numberOfFarmersBenefitingFemale']))."' 
						type='text' 
						name='numberOfFarmersBenefitingTotal_first_child_row' 
						id='numberOfFarmersBenefitingTotal_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldBySeeds']."' 
						type='text' 
						name='inputsSoldBySeeds_first_child_row' 
						id='inputsSoldBySeeds_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldByChemicals']."' 
						type='text' 
						name='inputsSoldByChemicals_first_child_row' 
						id='inputsSoldByChemicals_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldByFertilizers']."' 
						type='text' 
						name='inputsSoldByFertilizers_first_child_row' 
						id='inputsSoldByFertilizers_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldByHerbicides']."' 
						type='text' 
						name='inputsSoldByHerbicides_first_child_row' 
						id='inputsSoldByHerbicides_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldByFarmImplements']."' 
						type='text' 
						name='inputsSoldByFarmImplements_first_child_row' 
						id='inputsSoldByFarmImplements_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['inputsSoldByOthers']."' 
						type='text' 
						name='inputsSoldByOthers_first_child_row' 
						id='inputsSoldByOthers_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['amountInvestedInSettingUpInputSalesBusiness']."' 
						type='text' 
						name='amountInvestedInSettingUpInputSalesBusiness_first_child_row' 
						id='amountInvestedInSettingUpInputSalesBusiness_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					
					<td>
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
							style=\"width:100px;\" 
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
						WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 1,100000")or die(http(__line__));
						$y=1;
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
					$data.="<input type='hidden' name='loopkey_edit_other_children[]' id='loopkey_edit_other_children".$y."' value='1' />
					<input type='hidden' name='tbl_id_other_children[]' id='tbl_id__other_children".$y."' value='".$other_children_row['id']."' />";	

					$data.="<td>
					<input type='hidden'  name='reportingMonth_other_children[]' 
					id='reportingMonth_other_children".$y."' value='".$other_children_row['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy_other_children[]' 
					id='CompiledBy_other_children".$y."' value='".$other_children_row['compiledBy']."' />
					<select name='reporting_period_other_children[]' id='reporting_period_other_children".$y."'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($other_children_row['reportingPeriod_cleaned']);
					$data.="</select>
					</td>";
					
					$data.="<td>
					<select name='valueChain_other_children[]' 
					id='valueChain_other_children".$y."'
					class='disabled'
					readonly='readonly'
					style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($other_children_row['valueChain']));
						$data.="</select>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['numberOfMessengersMale']."' 
						type='text' 
						name='numberOfMessengersMale_other_children[]' 
						id='numberOfMessengersMale_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['numberOfMessengersFemale']."' 
						type='text' 
						name='numberOfMessengersFemale_other_children[]' 
						id='numberOfMessengersFemale_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".(($other_children_row['numberOfMessengersMale'])+($other_children_row['numberOfMessengersFemale']))."' 
						type='text' 
						name='numberOfMessengersTOtal_other_children[]' 
						id='numberOfMessengersTOtal_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['numberOfFarmersBenefitingMale']."' 
						type='text' 
						name='numberOfFarmersBenefitingMale_other_children[]' 
						id='numberOfFarmersBenefitingMale_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['numberOfFarmersBenefitingFemale']."' 
						type='text' 
						name='numberOfFarmersBenefitingFemale_other_children[]' 
						id='numberOfFarmersBenefitingFemale_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".(($other_children_row['numberOfFarmersBenefitingMale'])+($other_children_row['numberOfFarmersBenefitingFemale']))."' 
						type='text' 
						name='numberOfFarmersBenefitingTotal_other_children[]' 
						id='numberOfFarmersBenefitingTotal_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldBySeeds']."' 
						type='text' 
						name='inputsSoldBySeeds_other_children[]' 
						id='inputsSoldBySeeds_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldByChemicals']."' 
						type='text' 
						name='inputsSoldByChemicals_other_children[]' 
						id='inputsSoldByChemicals_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldByFertilizers']."' 
						type='text' 
						name='inputsSoldByFertilizers_other_children[]' 
						id='inputsSoldByFertilizers_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldByHerbicides']."' 
						type='text' 
						name='inputsSoldByHerbicides_other_children[]' 
						id='inputsSoldByHerbicides_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldByFarmImplements']."' 
						type='text' 
						name='inputsSoldByFarmImplements_other_children[]' 
						id='inputsSoldByFarmImplements_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['inputsSoldByOthers']."' 
						type='text' 
						name='inputsSoldByOthers_other_children[]' 
						id='inputsSoldByOthers_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['amountInvestedInSettingUpInputSalesBusiness']."' 
						type='text' 
						name='amountInvestedInSettingUpInputSalesBusiness_other_children[]' 
						id='amountInvestedInSettingUpInputSalesBusiness_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					
					<td>
						<input type='hidden' name='tbl_id_first_row[]' id='tbl_id_first_row".$y."' value='".$other_children_row['tbl_id']."' />
						<input 
						value='".$other_children_row['nameOfJobHolder']."' 
						type='text' 
						name='nameOfJobHolder_other_children[]' 
						id='nameOfJobHolder_other_children".$y."'/>
						</td>
						
						<td>
							<select  
							name='sexOfJobHolder_other_children[]' 
							id='sexOfJobHolder_other_children".$y."' 
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
						getElementWithNameLike(this,'dateOfEngagement_other_children".$y."').attr('id')
						)
						);return false;\"												
						hidefocus=''>
						<input  
							name='dateOfEngagement_other_children[]' 
							id='dateOfEngagement_other_children".$y."' 
							type='text' size='10'
							value='".$currentDate."'   
							style=\"width:100px;\" 
						/>
						<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
						</a>
					</td>
					<td>
					<input 
						value='".$other_children_row['timeSpentOnJob']."' 
						type='text' 
						name='timeSpentOnJob_other_children[]' 
						id='timeSpentOnJob_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					$data.="</tr>";
					$y++;
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="<tr class='evenrow'>
				<td colspan='22'>
					<div align='right'>
						<input  type='submit' class='formButton2' 
						name='save' id='save' 
						style='width:100px;' value='Update' 
						onclick=\"loadingIcon(
						xajax.getFormValues('edit_inputSales'),
						'update_inputSales'
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
				'>Updating  INPUTS SALES Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_inputSales($formValues){
$obj=new xajaxResponse();
$n=1;
$qmobj = new QueryManager('');

$tbl_inputSales_id=$formValues['tbl_inputSales_id'];
$dateOfStartOfinputsSalesBusiness=$formValues['dateOfStartOfinputsSalesBusiness'];
$nameOfMiddleValueChainActor=$formValues['nameOfMiddleValueChainActor'];
list($smeId,$smeType) = QueryManager::get_partner_type_and_Id(QueryManager::get_partnership_id($nameOfMiddleValueChainActor),$nameOfMiddleValueChainActor);
$tot_string_length= trim(strlen($nameOfMiddleValueChainActor));
$string_length_char= trim(strrpos($nameOfMiddleValueChainActor,"|"));
$start_index=($string_length_char-$tot_string_length);
$nameOfMiddleValueChainActor=trim(substr($nameOfMiddleValueChainActor, 0, ($start_index)));

//update  parent table
 $sql_parent_record="UPDATE `tbl_input_sales` 
SET
`dateOfStartOfinputsSalesBusiness`='".$dateOfStartOfinputsSalesBusiness."',
`nameOfMiddleValueChainActor`='".$nameOfMiddleValueChainActor."',
`msmeId`='".$smeId."',
`msmeType`='".$smeType."'
WHERE
`id` ='".$tbl_inputSales_id."'";
//$obj->alert($sql_parent_record); 
//$query=@mysql_query($sql_parent_record)or die(http(__line__)); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//when reportingMonth is null or invalid
$CompiledBy_first_child_row=($formValues['CompiledBy_first_child_row']=='')?$_SESSION['name']:$formValues['CompiledBy_first_child_row'];
$valueChain_first_child_row=$formValues['valueChain_first_child_row'];
$reporting_period_first_child_row_rp_start_month=substr($formValues['reporting_period_first_child_row'], 0, -16); 
$reporting_period_first_child_row_rp_end_month=substr($formValues['reporting_period_first_child_row'], 11, -5);
$year_first_child_row=substr($formValues['reporting_period_first_child_row'],-4);
$reportingPeriod_first_child_row="".$reporting_period_first_child_row_rp_start_month." - ".$reporting_period_first_child_row_rp_end_month."";
$reportingMonth_first_child_row=$formValues['reportingMonth_first_child_row'];

//$obj->alert($year_first_child_row);

switch($reporting_period_first_child_row_rp_end_month){
	case"Sep":
	$reportingMonth_first_child_row_default="".$year_first_child_row."-09-30 00:00:00";
	break;
	
	case"Mar":
	$reportingMonth_first_child_row_default="".$year_first_child_row."-03-31 00:00:00";
	break;
	
	default:	
	break;
}
switch($reporting_period_first_child_row_rp_start_month){
	case"Apr":
	$start_date_default_first_child_row="".$year_first_child_row."-04-01";
	$end_date_default_first_child_row="".$year_first_child_row."-09-30";
	break;
	
	case"Oct":
	$start_date_default_first_child_row="".$year_first_child_row."-10-01";
	$end_date_default_first_child_row="".($year_first_child_row+1)."-03-31";
	break;
	
	default:	
	break;
}
$reportingMonth_first_child_row=($reportingMonth_first_child_row=='' or $reportingMonth_first_child_row==null)?$reportingMonth_first_child_row_default:$reportingMonth_first_child_row;

$numberOfMessengersMale_first_child_row=($formValues['numberOfMessengersMale_first_child_row'] !=='')?$formValues['numberOfMessengersMale_first_child_row']:0;
$numberOfMessengersFemale_first_child_row=($formValues['numberOfMessengersFemale_first_child_row'] !=='')?$formValues['numberOfMessengersFemale_first_child_row']:0;
$numberOfMessengersTOtal_first_child_row=($formValues['numberOfMessengersTOtal_first_child_row'] !=='')?$formValues['numberOfMessengersTOtal_first_child_row']:0;

$numberOfFarmersBenefitingMale_first_child_row=($formValues['numberOfFarmersBenefitingMale_first_child_row'] !=='')?$formValues['numberOfFarmersBenefitingMale_first_child_row']:0;
$numberOfFarmersBenefitingFemale_first_child_row=($formValues['numberOfFarmersBenefitingFemale_first_child_row'] !=='')?$formValues['numberOfFarmersBenefitingFemale_first_child_row']:0;
$numberOfFarmersBenefitingTotal_first_child_row=($formValues['numberOfFarmersBenefitingTotal_first_child_row'] !=='')?$formValues['numberOfFarmersBenefitingTotal_first_child_row']:0;

$inputsSoldBySeeds_first_child_row=($formValues['inputsSoldBySeeds_first_child_row'] !=='')?$formValues['inputsSoldBySeeds_first_child_row']:0;
$inputsSoldByChemicals_first_child_row=($formValues['inputsSoldByChemicals_first_child_row'] !=='')?$formValues['inputsSoldByChemicals_first_child_row']:0;
$inputsSoldByFertilizers_first_child_row=($formValues['inputsSoldByFertilizers_first_child_row'] !=='')?$formValues['inputsSoldByFertilizers_first_child_row']:0;
$inputsSoldByHerbicides_first_child_row=($formValues['inputsSoldByHerbicides_first_child_row'] !=='')?$formValues['inputsSoldByHerbicides_first_child_row']:0;
$inputsSoldByFarmImplements_first_child_row=($formValues['inputsSoldByFarmImplements_first_child_row'] !=='')?$formValues['inputsSoldByFarmImplements_first_child_row']:0;
$inputsSoldByOthers_first_child_row=($formValues['inputsSoldByOthers_first_child_row'] !=='')?$formValues['inputsSoldByOthers_first_child_row']:0;

$amountInvestedInSettingUpInputSalesBusiness_first_child_row=($formValues['amountInvestedInSettingUpInputSalesBusiness_first_child_row'] !=='')?$formValues['amountInvestedInSettingUpInputSalesBusiness_first_child_row']:0;

$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=($formValues['nameOfJobHolder_first_child_row'] !=='')?$formValues['nameOfJobHolder_first_child_row']:'-';
$sexOfJobHolder_first_child_row=($formValues['sexOfJobHolder_first_child_row'] !=='')?$formValues['sexOfJobHolder_first_child_row']:'-';
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=($formValues['timeSpentOnJob_first_child_row'] !=='')?$formValues['timeSpentOnJob_first_child_row']:0;




switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_input_sales_meta_data`( 
	`amountInvestedInSettingUpInputSalesBusiness`, 
	`compiledBy`, 
	`dateOfEngagement`,
	`inputsSoldByChemicals`, 
	`inputsSoldByFarmImplements`, 
	`inputsSoldByFertilizers`, 
	`inputsSoldByHerbicides`,
	`inputsSoldByOthers`, 
	`inputsSoldBySeeds`, 
	`nameOfJobHolder`, 
	`numberOfFarmersBenefitingFemale`, 
	`numberOfFarmersBenefitingMale`,
	`numberOfFarmersBenefitingTotal`, 
	`numberOfMessengersFemale`,
	`numberOfMessengersMale`,
	`numberOfMessengersTOtal`, 
	`reportingPeriod`,
	`reviewedBy`, 
	`sexOfJobHolder`, 
	`submittedBy`,
	`timeSpentOnJob`, 
	`updatedby`, 
	`valueChain`, 
	`year`,
	`input_sales_id`, 
	`reportingMonth`
	) VALUES (
	'".floatval($amountInvestedInSettingUpInputSalesBusiness_first_child_row)."',
	'".$CompiledBy_first_child_row."',	
	'".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_first_child_row)."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByChemicals_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFarmImplements_first_child_row)."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFertilizers_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByHerbicides_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByOthers_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldBySeeds_first_child_row)."',
	'".$nameOfJobHolder_first_child_row."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingFemale_first_child_row)."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingMale_first_child_row )."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingTotal_first_child_row)."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersFemale_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersMale_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersTOtal_first_child_row)."',	
	'".$reportingPeriod_first_child_row."',	
	'".$CompiledBy_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$CompiledBy_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$CompiledBy_first_child_row."',	
	'".$valueChain_first_child_row."',		
	'".$year_first_child_row."',	
	'".$tbl_inputSales_id."',	
	'".$reportingMonth_first_child_row."'	
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_input_sales_meta_data` 
	SET 	
	`amountInvestedInSettingUpInputSalesBusiness`='".floatval($amountInvestedInSettingUpInputSalesBusiness_first_child_row)."', 
	`compiledBy`='".$CompiledBy_first_child_row."', 
	`dateOfEngagement`='".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_first_child_row)."',
	`inputsSoldByChemicals`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByChemicals_first_child_row)."', 
	`inputsSoldByFarmImplements`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFarmImplements_first_child_row)."', 
	`inputsSoldByFertilizers`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFertilizers_first_child_row)."', 
	`inputsSoldByHerbicides`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByHerbicides_first_child_row)."',
	`inputsSoldByOthers`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByOthers_first_child_row)."', 
	`inputsSoldBySeeds`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldBySeeds_first_child_row)."', 
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."', 
	`numberOfFarmersBenefitingFemale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingFemale_first_child_row)."', 
	`numberOfFarmersBenefitingMale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingMale_first_child_row)."',
	`numberOfFarmersBenefitingTotal`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingTotal_first_child_row)."', 
	`numberOfMessengersFemale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersFemale_first_child_row)."',
	`numberOfMessengersMale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersMale_first_child_row)."',
	`numberOfMessengersTOtal`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersTOtal_first_child_row)."', 
	`reportingPeriod`='".$reportinPeriod_first_child_row."',
	`reviewedBy`='".$CompiledBy_first_child_row."', 
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."', 
	`submittedBy`='".$CompiledBy_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."', 
	`updatedby`='".$CompiledBy_first_child_row."', 
	`valueChain`='".$valueChain_first_child_row."', 
	`year`='".$year_first_child_row."',
	`input_sales_id`='".$tbl_inputSales_id."', 
	`reportingMonth`='".$reportingMonth_first_child_row."' 	
	WHERE `id`='".$tbl_id_first_row."'
	and `input_sales_id`='".$tbl_inputSales_id."'";
	break;
	
}

//$obj->alert($sql_first_record); 
$query=@mysql_query($sql_first_record)or die(mysql_error()); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$CompiledBy_other_children=($formValues['CompiledBy_other_children'][$i]=='')?$_SESSION['name']:$formValues['CompiledBy_other_children'][$i];
	$valueChain_other_children=$formValues['valueChain_other_children'][$i];
	$reporting_period_other_children_rp_start_month=substr($formValues['reporting_period_other_children'][$i], 0, -16); 
	$reporting_period_other_children_rp_end_month=substr($formValues['reporting_period_other_children'][$i], 11, -5);
	$year_other_children=substr($formValues['reporting_period_other_children'][$i],-4);
	$reportinPeriod_other_children="".$reporting_period_other_children_rp_start_month." - ".$reporting_period_other_children_rp_end_month."";
	$reportingMonth_other_children=$formValues['reportingMonth_other_children'][$i];
	switch($reporting_period_other_children_rp_end_month){
	case"Sep":
	$reportingMonth_other_children_default="".$year_other_children."-09-30 00:00:00";
	break;

	case"Mar":
	$reportingMonth_other_children_default="".$year_other_children."-03-31 00:00:00";
	break;

	default:	
	break;
	}
	switch($reporting_period_other_children_rp_start_month){
	case"Apr":
	$start_date_default_other_children="".$year_other_children."-04-01";
	$end_date_default_other_children="".$year_other_children."-09-30";
	break;

	case"Oct":
	$start_date_default_other_children="".$year_other_children."-10-01";
	$end_date_default_other_children="".($year_other_children+1)."-03-31";
	break;

	default:	
	break;
	}
	$reportingMonth_other_children=($reportingMonth_other_children=='' or $reportingMonth_other_children==null)?$reportingMonth_other_children_default:$reportingMonth_other_children;
	$numberOfMessengersMale_other_children=($formValues['numberOfMessengersMale_other_children'][$i] !=='')?$formValues['numberOfMessengersMale_other_children'][$i]:0;
	$numberOfMessengersFemale_other_children=($formValues['numberOfMessengersFemale_other_children'][$i] !=='')?$formValues['numberOfMessengersFemale_other_children'][$i]:0;
	$numberOfMessengersTOtal_other_children=($formValues['numberOfMessengersTOtal_other_children'][$i] !=='')?$formValues['numberOfMessengersTOtal_other_children'][$i]:0;
	$numberOfFarmersBenefitingMale_other_children=($formValues['numberOfFarmersBenefitingMale_other_children'][$i] !=='')?$formValues['numberOfFarmersBenefitingMale_other_children'][$i]:0;
	$numberOfFarmersBenefitingFemale_other_children=($formValues['numberOfFarmersBenefitingFemale_other_children'][$i] !=='')?$formValues['numberOfFarmersBenefitingFemale_other_children'][$i]:0;
	$numberOfFarmersBenefitingTotal_other_children=($formValues['numberOfFarmersBenefitingTotal_other_children'][$i] !=='')?$formValues['numberOfFarmersBenefitingTotal_other_children'][$i]:0;
	$inputsSoldBySeeds_other_children=($formValues['inputsSoldBySeeds_other_children'][$i] !=='')?$formValues['inputsSoldBySeeds_other_children'][$i]:0;
	$inputsSoldByChemicals_other_children=($formValues['inputsSoldByChemicals_other_children'][$i] !=='')?$formValues['inputsSoldByChemicals_other_children'][$i]:0;
	$inputsSoldByFertilizers_other_children=($formValues['inputsSoldByFertilizers_other_children'][$i] !=='')?$formValues['inputsSoldByFertilizers_other_children'][$i]:0;
	$inputsSoldByHerbicides_other_children=($formValues['inputsSoldByHerbicides_other_children'][$i] !=='')?$formValues['inputsSoldByHerbicides_other_children'][$i]:0;
	$inputsSoldByFarmImplements_other_children=($formValues['inputsSoldByFarmImplements_other_children'][$i] !=='')?$formValues['inputsSoldByFarmImplements_other_children'][$i]:0;
	$inputsSoldByOthers_other_children=($formValues['inputsSoldByOthers_other_children'][$i] !=='')?$formValues['inputsSoldByOthers_other_children'][$i]:0;
	$amountInvestedInSettingUpInputSalesBusiness_other_children=($formValues['amountInvestedInSettingUpInputSalesBusiness_other_children'][$i] !=='')?$formValues['amountInvestedInSettingUpInputSalesBusiness_other_children'][$i]:0;
	$tbl_id_first_row=$formValues['tbl_id_first_row'];
	$nameOfJobHolder_other_children=($formValues['nameOfJobHolder_other_children'][$i] !=='')?$formValues['nameOfJobHolder_other_children'][$i]:'-';
	$sexOfJobHolder_other_children=($formValues['sexOfJobHolder_other_children'][$i] !=='')?$formValues['sexOfJobHolder_other_children'][$i]:'-';
	$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
	$timeSpentOnJob_other_children=($formValues['timeSpentOnJob_other_children'][$i] !=='')?$formValues['timeSpentOnJob_other_children'][$i]:0;

		if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_input_sales_meta_data` 
		SET 
		`amountInvestedInSettingUpInputSalesBusiness`='".floatval($amountInvestedInSettingUpInputSalesBusiness_other_children)."', 
		`compiledBy`='".$CompiledBy_other_children."', 
		`dateOfEngagement`='".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_other_children)."',
		`inputsSoldByChemicals`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByChemicals_other_children)."', 
		`inputsSoldByFarmImplements`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFarmImplements_other_children)."', 
		`inputsSoldByFertilizers`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByFertilizers_other_children)."', 
		`inputsSoldByHerbicides`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByHerbicides_other_children)."',
		`inputsSoldByOthers`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByOthers_other_children)."', 
		`inputsSoldBySeeds`='".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldBySeeds_other_children)."', 
		`nameOfJobHolder`='".$nameOfJobHolder_other_children."', 
		`numberOfFarmersBenefitingFemale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingFemale_other_children)."', 
		`numberOfFarmersBenefitingMale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingMale_other_children)."',
		`numberOfFarmersBenefitingTotal`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfFarmersBenefitingTotal_other_children)."', 
		`numberOfMessengersFemale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersFemale_other_children)."',
		`numberOfMessengersMale`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersMale_other_children)."',
		`numberOfMessengersTOtal`='".$qmobj->validateRequiredNumericInput_Form2Edits($numberOfMessengersTOtal_other_children)."', 
		`reportingPeriod`='".$reportinPeriod_other_children."',
		`reviewedBy`='".$CompiledBy_other_children."', 
		`sexOfJobHolder`='".$sexOfJobHolder_other_children."', 
		`submittedBy`='".$CompiledBy_other_children."',
		`timeSpentOnJob`='".$timeSpentOnJob_other_children."', 
		`updatedby`='".$CompiledBy_other_children."', 
		`valueChain`='".$valueChain_other_children."', 
		`year`='".$year_other_children."',
		`input_sales_id`='".$tbl_inputSales_id."', 
		`reportingMonth`='".$reportingMonth_other_children."' 
		WHERE `id`='".$tbl_id_other_children."'
		and `input_sales_id`='".$tbl_inputSales_id."'";
		
		//$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		
		}

	}

$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("INPUT SALES record successfully Updated!"));
$obj->call("xajax_view_inputSales",'','','',1,20);
return $obj;
}

function edit_phh($id){
$obj=new xajaxResponse();
$n=1;

$qmobj = new QueryManager('');


$data="<form action='".$_SERVER['PHP_SELF']."' name='edit_phh' id='edit_phh' method='post'>
<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='22'>
					CPMA-Data Form2/PHH: EDIT
					</th>
				</tr>
				
				<tr >
				<td colspan='22'>Indicator</td>
				</tr>
				
				<tr>
				<td colspan='22'>1. Total Increase in installed storage Capacity</td>
				</tr>
				
				<tr>
				<td colspan='22'>2. Number of jobs attributed to FTF implementation</td>
				</tr>
				
				<tr>
				<td colspan='22'>3. Value of new private sector investment in the agriculture sector or food chain leveraged by FTF implementation</td>
				</tr>
  ";			

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
		`p`.`msmeId`,
		`p`.`msmeType`,
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
		$query_string.=" and  `p`.`id`='".$id."' ";
		$query_string.=" group by `p`.`id` ";
		$query_string.=" order by `p`.`id` desc";

				$n=1;
				//$query_=mysql_query($query_string)or die(http(__line__));
				$query_=mysql_query($query_string)or die(mysql_error());
		
		while($row_parent=mysql_fetch_array($query_)){
			//determining the number of child records for each row
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
		
		$s_child="select  `pm`.*,
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
	as  `reportingPeriod_cleaned`
		FROM `tbl_phh_meta_data` as `pm`
		WHERE `pm`.`phh_id`='".$row_parent['id']."'";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$s_child.=$reporting_period.$cpma_year;	

		$s_child.=" order by `pm`.`phh_id` desc";
		
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
			
				$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".<input type='hidden'  name='tbl_phh_id' 
					id='tbl_phh_id' value='".$row_parent['id']."' />			
					</td>";

		$partnerProperties=$qmobj->get_phh_nameValuchainPartnerTypeAndId($row_parent['msmeId'],$row_parent['msmeType'],$row_parent['nameOfMiddleValueChainActor']);
		
		list($partnershipId,$partnerType)=$partnerProperties;
		$obj->alert($partnershipId.'-'.$partnerType);
		$data.="<td ".$row_span.">
		<select name='nameOfMiddleValueChainActor' 
		id='nameOfMiddleValueChainActor'
		style='width:150px;'>";		
		$data.="<option value=''>-Select-</option>";
		$data.=$qmobj->get_form2_partner_filter($partnershipId,$partnerType);
		$data.="</select>
		</td>";
		
		$data.="<td ".$row_span.">";
		$currentDateBizStart=@date('Y-m-d', @strtotime($row_parent['dateOfStartOfinputsSalesBusiness']));
		$data.="
			<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(
			document.getElementById(getElementWithNameLike(this,'dateOfStartOfinputsSalesBusiness').attr('id')
			)
			);return false;\" 
			hidefocus=''>
			<input  
			name='dateOfStartOfinputsSalesBusiness' 
			id='dateOfStartOfinputsSalesBusiness' 
			type='text' size='10'
			value='".$currentDateBizStart."' 
			style=\"width:100px;\"
			/>
			<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
			</a>
		</td>";
					
		//return first row of child records
		$s_first_child = mysql_query("SELECT `pm`.*,
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
	as  `reportingPeriod_cleaned`
		FROM `tbl_phh_meta_data` as `pm`
		WHERE `pm`.`phh_id`='".$row_parent['id']."' limit 0,1")or die(http(__line__));
		$first_child_row = mysql_fetch_array($s_first_child);	
					
					$data.="<td>
					<input type='hidden'  name='reportingMonth_first_child_row' 
					id='reportingMonth_first_child_row' value='".$first_child_row['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy_first_child_row' 
					id='CompiledBy_first_child_row' value='".$first_child_row['compiledBy']."' />
					<select name='reporting_period_first_child_row' id='reporting_period_first_child_row'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($first_child_row['reportingPeriod_cleaned']);
					$data.="</select>
					</td>";
					
					$data.="<td>
					<select name='valueChain_first_child_row' 
					id='valueChain_first_child_row'
					class='disabled'
					'readonly'='readonly'
					style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($first_child_row['valueChain']));
						$data.="</select>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['assistanceRenderedByActivity']."' 
						type='text' 
						name='assistanceRenderedByActivity_first_child_row' 
						id='assistanceRenderedByActivity_first_child_row'
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['sizeOfStoreRefurbished']."' 
						type='text' 
						name='sizeOfStoreRefurbished_first_child_row' 
						id='sizeOfStoreRefurbished_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['storageTypeForColdChain']."' 
						type='text' 
						name='storageTypeForColdChain_first_child_row' 
						id='storageTypeForColdChain_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['storageTypeForDryGoods']."' 
						type='text' 
						name='storageTypeForDryGoods_first_child_row' 
						id='storageTypeForDryGoods_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$first_child_row['amountInvestedInRefurbishing']."' 
						type='text' 
						name='amountInvestedInRefurbishing_first_child_row' 
						id='amountInvestedInRefurbishing_first_child_row' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					
					<td>
						<input type='hidden' name='tbl_id_first_row' id='tbl_id_first_row' value='".$first_child_row['id']."' />
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
							style=\"width:100px;\" 
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
					$s_other_children = mysql_query("SELECT `pm`.*,
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
					as  `reportingPeriod_cleaned`
						FROM `tbl_phh_meta_data` as `pm`
						WHERE `pm`.`phh_id`='".$row_parent['id']."' limit 1,100000")or die(http(__line__));
						$y=1;
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
					$data.="<input type='hidden' name='loopkey_edit_other_children[]' id='loopkey_edit_other_children".$y."' value='1' />
					<input type='hidden' name='tbl_id_other_children[]' id='tbl_id__other_children".$y."' value='".$other_children_row['id']."' />";	

					$data.="<td>
					<input type='hidden'  name='reportingMonth_other_children[]' 
					id='reportingMonth_other_children".$y."' value='".$other_children_row['reportingMonth']."' />
					<input type='hidden'  name='CompiledBy_other_children[]' 
					id='CompiledBy_other_children".$y."' value='".$other_children_row['compiledBy']."' />
					<select name='reporting_period_other_children[]' id='reporting_period_other_children".$y."'>";
					$data.="<option value=''>-Select Reporting Period-</option>";
					$data.=$qmobj->CPMAReportingPeriodFilter($other_children_row['reportingPeriod_cleaned']);
					$data.="</select>
					</td>";
					
					$data.="<td>
					<select name='valueChain_other_children[]' 
					id='valueChain_other_children".$y."'
					class='disabled'
					readonly='readonly'
					style='width:150px;'>
							<option value=''>-select-</option>";
							$data.=$qmobj->Form2ValueChainFilter($qmobj->cleanValueChainDisplay($other_children_row['valueChain']));
						$data.="</select>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['assistanceRenderedByActivity']."' 
						type='text' 
						name='assistanceRenderedByActivity_other_children[]' 
						id='assistanceRenderedByActivity_children".$y."' 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['sizeOfStoreRefurbished']."' 
						type='text' 
						name='sizeOfStoreRefurbished_other_children[]' 
						id='sizeOfStoreRefurbished_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['storageTypeForColdChain']."' 
						type='text' 
						name='storageTypeForColdChain_other_children[]' 
						id='storageTypeForColdChain_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".$other_children_row['storageTypeForDryGoods']."' 
						type='text' 
						name='storageTypeForDryGoods_other_children[]' 
						id='storageTypeForDryGoods_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					
					$data.="<td align='right'>
					<input 
						value='".(($other_children_row['amountInvestedInRefurbishing'])+($other_children_row['numberOfFarmersBenefitingFemale']))."' 
						type='text' 
						name='amountInvestedInRefurbishing_other_children[]' 
						id='amountInvestedInRefurbishing_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>
					
					<td>
						<input type='hidden' name='tbl_id_first_row[]' id='tbl_id_first_row".$y."' value='".$other_children_row['tbl_id']."' />
						<input 
						value='".$other_children_row['nameOfJobHolder']."' 
						type='text' 
						name='nameOfJobHolder_other_children[]' 
						id='nameOfJobHolder_other_children".$y."'/>
						</td>
						
						<td>
							<select  
							name='sexOfJobHolder_other_children[]' 
							id='sexOfJobHolder_other_children".$y."' 
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
						getElementWithNameLike(this,'dateOfEngagement_other_children".$y."').attr('id')
						)
						);return false;\"												
						hidefocus=''>
						<input  
							name='dateOfEngagement_other_children[]' 
							id='dateOfEngagement_other_children".$y."' 
							type='text' size='10'
							value='".$currentDate."'   
							style=\"width:100px;\" 
						/>
						<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0'>
						</a>
					</td>
					<td>
					<input 
						value='".$other_children_row['timeSpentOnJob']."' 
						type='text' 
						name='timeSpentOnJob_other_children[]' 
						id='timeSpentOnJob_other_children".$y."' 
						onkeypress=\"return numbersonly(event, false)\" 
					/>
					</td>";
					$data.="</tr>";
					$y++;
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="<tr class='evenrow'>
				<td colspan='22'>
					<div align='right'>
						<input  type='submit' class='formButton2' 
						name='save' id='save' 
						style='width:100px;' value='Update' 
						onclick=\"loadingIcon(
						xajax.getFormValues('edit_phh'),
						'update_phh'
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
				'>Updating  PHH Form Data...
				</span>
			</div>";
			
		$data.="</tbody>
	</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_phh($formValues){
$obj=new xajaxResponse();
$n=1;
$qmobj = new QueryManager('');

$tbl_phh_id=$formValues['tbl_phh_id'];
$dateOfStartOfinputsSalesBusiness=$formValues['dateOfStartOfinputsSalesBusiness'];
$nameOfMiddleValueChainActor=$formValues['nameOfMiddleValueChainActor'];
list($smeId,$smeType) = QueryManager::get_partner_type_and_Id(QueryManager::get_partnership_id($nameOfMiddleValueChainActor),$nameOfMiddleValueChainActor);
$tot_string_length= trim(strlen($nameOfMiddleValueChainActor));
$string_length_char= trim(strrpos($nameOfMiddleValueChainActor,"|"));
$start_index=($string_length_char-$tot_string_length);
$nameOfMiddleValueChainActor=trim(substr($nameOfMiddleValueChainActor, 0, ($start_index)));

//update  parent table
 $sql_parent_record="UPDATE `tbl_phh` 
SET
`dateOfStartOfinputsSalesBusiness`='".$dateOfStartOfinputsSalesBusiness."',
`nameOfMiddleValueChainActor`='".$nameOfMiddleValueChainActor."',
`msmeId`='".$smeId."',
`msmeType`='".$smeType."'
WHERE
`id` ='".$tbl_phh_id."'";
//$obj->alert($sql_parent_record); 
//$query=@mysql_query($sql_parent_record)or die(http(__line__)); 
$query=@mysql_query($sql_parent_record)or die(mysql_error()); 



//when reportingMonth is null or invalid
$CompiledBy_first_child_row=($formValues['CompiledBy_first_child_row']=='')?$_SESSION['name']:$formValues['CompiledBy_first_child_row'];
$valueChain_first_child_row=$formValues['valueChain_first_child_row'];
$reporting_period_first_child_row_rp_start_month=substr($formValues['reporting_period_first_child_row'], 0, -16); 
$reporting_period_first_child_row_rp_end_month=substr($formValues['reporting_period_first_child_row'], 11, -5);
$year_first_child_row=substr($formValues['reporting_period_first_child_row'],-4);
$reportingPeriod_first_child_row="".$reporting_period_first_child_row_rp_start_month." - ".$reporting_period_first_child_row_rp_end_month."";
$reportingMonth_first_child_row=$formValues['reportingMonth_first_child_row'];

//$obj->alert($year_first_child_row);

switch($reporting_period_first_child_row_rp_end_month){
	case"Sep":
	$reportingMonth_first_child_row_default="".$year_first_child_row."-09-30 00:00:00";
	break;
	
	case"Mar":
	$reportingMonth_first_child_row_default="".$year_first_child_row."-03-31 00:00:00";
	break;
	
	default:	
	break;
}
switch($reporting_period_first_child_row_rp_start_month){
	case"Apr":
	$start_date_default_first_child_row="".$year_first_child_row."-04-01";
	$end_date_default_first_child_row="".$year_first_child_row."-09-30";
	break;
	
	case"Oct":
	$start_date_default_first_child_row="".$year_first_child_row."-10-01";
	$end_date_default_first_child_row="".($year_first_child_row+1)."-03-31";
	break;
	
	default:	
	break;
}
$reportingMonth_first_child_row=($reportingMonth_first_child_row=='' or $reportingMonth_first_child_row==null)?$reportingMonth_first_child_row_default:$reportingMonth_first_child_row;
$assistanceRenderedByActivity_first_child_row=($formValues['assistanceRenderedByActivity_first_child_row']);
$sizeOfStoreRefurbished_first_child_row=($formValues['sizeOfStoreRefurbished_first_child_row'] !=='')?$formValues['sizeOfStoreRefurbished_first_child_row']:0;
$storageTypeForColdChain_first_child_row=($formValues['storageTypeForColdChain_first_child_row'] !=='')?$formValues['storageTypeForColdChain_first_child_row']:0;
$storageTypeForDryGoods_first_child_row=($formValues['storageTypeForDryGoods_first_child_row'] !=='')?$formValues['storageTypeForDryGoods_first_child_row']:0;
$amountInvestedInRefurbishing_first_child_row=($formValues['amountInvestedInRefurbishing_first_child_row'] !=='')?$formValues['amountInvestedInRefurbishing_first_child_row']:0;
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_first_child_row=($formValues['nameOfJobHolder_first_child_row'] !=='')?$formValues['nameOfJobHolder_first_child_row']:'-';
$sexOfJobHolder_first_child_row=($formValues['sexOfJobHolder_first_child_row'] !=='')?$formValues['sexOfJobHolder_first_child_row']:'-';
$dateOfEngagement_first_child_row=$formValues['dateOfEngagement_first_child_row'];
$timeSpentOnJob_first_child_row=($formValues['timeSpentOnJob_first_child_row'] !=='')?$formValues['timeSpentOnJob_first_child_row']:0;




switch(true){
	case $tbl_id_first_row < 1 :
	$sql_first_record="INSERT INTO `tbl_phh_meta_data`( 
	`amountInvestedInRefurbishing`, 
	`assistanceRenderedByActivity`, 
	`compiledBy`, 
	`dateOfEngagement`,
	`dateSubmission`, 
	`nameOfJobHolder`,	   
	`sizeOfStoreRefurbished`, 
	`storageTypeForColdChain`,
	`storageTypeForDryGoods`, 
	`reportingPeriod`,
	`reviewedBy`, 
	`sexOfJobHolder`, 
	`submittedBy`,
	`timeSpentOnJob`, 
	`updatedby`, 
	`valueChain`, 
	`year`,
	`phh_id`, 
	`reportingMonth`
	) VALUES (
	'".floatval($amountInvestedInRefurbishing_first_child_row)."',
	'".$assistanceRenderedByActivity_first_child_row."',
	'".$CompiledBy_first_child_row."',
	'".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_first_child_row)."',	
	'".$qmobj->cleanDirtyDates_Form2Edits($end_date_default_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($inputsSoldByChemicals_first_child_row)."',
	'".$nameOfJobHolder_first_child_row."',			
	'".$qmobj->validateRequiredNumericInput_Form2Edits($sizeOfStoreRefurbished_first_child_row)."',	
	'".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForColdChain_first_child_row)."',
	'".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForDryGoods_first_child_row)."',
	'".$reportingPeriod_first_child_row."',	
	'".$CompiledBy_first_child_row."',
	'".$sexOfJobHolder_first_child_row."',
	'".$CompiledBy_first_child_row."',
	'".$timeSpentOnJob_first_child_row."',
	'".$CompiledBy_first_child_row."',	
	'".$valueChain_first_child_row."',		
	'".$year_first_child_row."',	
	'".$tbl_phh_id."',	
	'".$reportingMonth_first_child_row."'	
	)";
	break;


	default:
	$sql_first_record="UPDATE `tbl_phh_meta_data` 
	SET 	
	`amountInvestedInRefurbishing`='".floatval($amountInvestedInRefurbishing_first_child_row)."',
	`assistanceRenderedByActivity`='".$assistanceRenderedByActivity_first_child_row."',
	`compiledBy`='".$CompiledBy_first_child_row."', 
	`dateOfEngagement`='".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_first_child_row)."',
	`dateSubmission`='".$qmobj->cleanDirtyDates_Form2Edits($end_date_default_first_child_row)."',
	`nameOfJobHolder`='".$nameOfJobHolder_first_child_row."', 
	`sizeOfStoreRefurbished`='".$qmobj->validateRequiredNumericInput_Form2Edits($sizeOfStoreRefurbished_first_child_row)."', 
	`storageTypeForColdChain`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForColdChain_first_child_row)."',
	`storageTypeForDryGoods`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForDryGoods_first_child_row)."', 
	`reportingPeriod`='".$reportinPeriod_first_child_row."',
	`reviewedBy`='".$CompiledBy_first_child_row."', 
	`sexOfJobHolder`='".$sexOfJobHolder_first_child_row."', 
	`submittedBy`='".$CompiledBy_first_child_row."',
	`timeSpentOnJob`='".$timeSpentOnJob_first_child_row."', 
	`updatedby`='".$CompiledBy_first_child_row."', 
	`valueChain`='".$valueChain_first_child_row."', 
	`year`='".$year_first_child_row."',
	`phh_id`='".$tbl_phh_id."', 
	`reportingMonth`='".$reportingMonth_first_child_row."' 
	WHERE `id`='".$tbl_id_first_row."'
	and `phh_id`='".$tbl_phh_id."'";
	break;
	
}

$obj->alert($sql_first_record); 
$query=@mysql_query($sql_first_record)or die(mysql_error()); 

//update  other kids' table records
	for($i=0;$i<count($formValues['loopkey_edit_other_children']);$i++){
	$tbl_id_other_children=$formValues['tbl_id_other_children'][$i];
	$CompiledBy_other_children=($formValues['CompiledBy_other_children'][$i]=='')?$_SESSION['name']:$formValues['CompiledBy_other_children'][$i];
	$valueChain_other_children=$formValues['valueChain_other_children'][$i];
	$reporting_period_other_children_rp_start_month=substr($formValues['reporting_period_other_children'][$i], 0, -16); 
	$reporting_period_other_children_rp_end_month=substr($formValues['reporting_period_other_children'][$i], 11, -5);
	$year_other_children=substr($formValues['reporting_period_other_children'][$i],-4);
	$reportinPeriod_other_children="".$reporting_period_other_children_rp_start_month." - ".$reporting_period_other_children_rp_end_month."";
	$reportingMonth_other_children=$formValues['reportingMonth_other_children'][$i];
	switch($reporting_period_other_children_rp_end_month){
	case"Sep":
	$reportingMonth_other_children_default="".$year_other_children."-09-30 00:00:00";
	break;

	case"Mar":
	$reportingMonth_other_children_default="".$year_other_children."-03-31 00:00:00";
	break;

	default:	
	break;
	}
	switch($reporting_period_other_children_rp_start_month){
	case"Apr":
	$start_date_default_other_children="".$year_other_children."-04-01";
	$end_date_default_other_children="".$year_other_children."-09-30";
	break;

	case"Oct":
	$start_date_default_other_children="".$year_other_children."-10-01";
	$end_date_default_other_children="".($year_other_children+1)."-03-31";
	break;

	default:	
	break;
	}

$reportingMonth_other_children=($reportingMonth_other_children=='' or $reportingMonth_other_children==null)?$reportingMonth_other_children_default:$reportingMonth_other_children;
$assistanceRenderedByActivity_other_children=($formValues['assistanceRenderedByActivity_other_children'][$i]);
$sizeOfStoreRefurbished_other_children=($formValues['sizeOfStoreRefurbished_other_children'][$i] !=='')?$formValues['sizeOfStoreRefurbished_other_children'][$i]:0;
$storageTypeForColdChain_other_children=($formValues['storageTypeForColdChain_other_children'][$i] !=='')?$formValues['storageTypeForColdChain_other_children'][$i]:0;
$storageTypeForDryGoods_other_children=($formValues['storageTypeForDryGoods_other_children'][$i] !=='')?$formValues['storageTypeForDryGoods_other_children'][$i]:0;
$amountInvestedInRefurbishing_other_children=($formValues['amountInvestedInRefurbishing_other_children'][$i] !=='')?$formValues['amountInvestedInRefurbishing_other_children'][$i]:0;
$tbl_id_first_row=$formValues['tbl_id_first_row'];
$nameOfJobHolder_other_children=($formValues['nameOfJobHolder_other_children'][$i] !=='')?$formValues['nameOfJobHolder_other_children'][$i]:'-';
$sexOfJobHolder_other_children=($formValues['sexOfJobHolder_other_children'][$i] !=='')?$formValues['sexOfJobHolder_other_children'][$i]:'-';
$dateOfEngagement_other_children=$formValues['dateOfEngagement_other_children'][$i];
$timeSpentOnJob_other_children=($formValues['timeSpentOnJob_other_children'][$i] !=='')?$formValues['timeSpentOnJob_other_children'][$i]:0;

if(!empty($nameOfJobHolder_other_children)){
		$sql_other_children="UPDATE `tbl_phh_meta_data` 
	SET 	
	`amountInvestedInRefurbishing`='".floatval($amountInvestedInRefurbishing_other_children)."',
	`assistanceRenderedByActivity`='".$assistanceRenderedByActivity_other_children."',
	`compiledBy`='".$CompiledBy_other_children."', 
	`dateOfEngagement`='".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_other_children)."',
	`dateSubmission`='".$qmobj->cleanDirtyDates_Form2Edits($end_date_default_other_children)."',
	`nameOfJobHolder`='".$nameOfJobHolder_other_children."', 
	`sizeOfStoreRefurbished`='".$qmobj->validateRequiredNumericInput_Form2Edits($sizeOfStoreRefurbished_other_children)."', 
	`storageTypeForColdChain`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForColdChain_other_children)."',
	`storageTypeForDryGoods`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForDryGoods_other_children)."', 
	`reportingPeriod`='".$reportinPeriod_other_children."',
	`reviewedBy`='".$CompiledBy_other_children."', 
	`sexOfJobHolder`='".$sexOfJobHolder_other_children."', 
	`submittedBy`='".$CompiledBy_other_children."',
	`timeSpentOnJob`='".$timeSpentOnJob_other_children."', 
	`updatedby`='".$CompiledBy_other_children."', 
	`valueChain`='".$valueChain_other_children."', 
	`year`='".$year_other_children."',
	`phh_id`='".$tbl_phh_id."', 
	`reportingMonth`='".$reportingMonth_other_children."' 
	WHERE `id`='".$tbl_id_other_children."'
	and `phh_id`='".$tbl_phh_id."'";
		
		$obj->alert($sql_other_children); 
		$query=@mysql_query($sql_other_children)or die(mysql_error()); 
		
		
		}

	}

$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("PHH record successfully Updated!"));
$obj->call("xajax_view_phh",'','','',1,20);
return $obj;
}

function edit_partnerships($id){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='partnerships' id='partnerships' method='post'>
<table width='100%' cellpadding='2' border='0' cellspacing='1'>";

$data.="<tr class=''>
	   <td colspan=8>
	   <div id='status'></div>
	  </td>
	 </tr>";

$data.="<tr CLASS='evenrow'><th colspan='10' ><center>UPDATE RECORD(S)</center></th></tr>";

for($i=0;$i<count($formValues['loopkey']);$i++){
$sel=mysql_query("SELECT p.* FROM `tbl_public_private_partnership` p WHERE  p.`tbl_partnershipId`='".$formValues['tbl_partnershipId'][$i]."'")or die(http(7856));
while($row=mysql_fetch_assoc($sel)){
 $color=$n%2==1?"white1":"evenrow";
$data.="<tr><td colspan='23'><hr></td></tr>
<tr class='evenrow3'>
	 <td colspan='15'>Value Chain/Tech Area";
$data.="<select name='techArea[]' id='techArea".$n."' style='width:200px;'>
<option value=''>-select value chain-</option>";			
							 $query="select * from tbl_mainvaluechain order by 2 asc";			
							 $q=mysql_query($query)or die(http("FLTR-2146"));
							 while($rowd=mysql_fetch_array($q)){
							 $selected=($rowd['tbl_chainId']==$row['techArea'])?"SELECTED":"";
							 $data.="<option value=\"".$rowd['tbl_chainId']."\" ".$selected.">".$rowd['name']."</option>";
							 }
							 $data.="</select>";
	   $data.="</td>
	 </tr><tr class='evenrow3'><td colspan='22'><table cellpadding='2' cellspacing='2' border='0' width='100%'>
	 <tbody><tr class='evenrow'>
 <th rowspan='3'>#</th>
 <th rowspan='3'>Name of partner/Business / Grantee</th>
 <th rowspan='3'>Value chain</th>
 <th rowspan='3'>Partnership Focus</th>
 <th colspan='3' rowspan='2'>Value of Partnership (Ushs)</th>
 <th colspan='6'><div align='center'>Jobs Created </div></th>
 
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

$data.="<tr class='evenrow'>
 <td>".$n.".<input type='hidden' name='tbl_partnershipId[]' id='tbl_partnershipId".$n."' value='".$row['tbl_partnershipId']."'></td><input name='loopkey[]' id='loopkey' value='1' type='hidden'>
 <td><input value='".$row['namePartner']."' name='nameofPartner[]' id='nameofPartner".$n."' style='width:200px;' type='text'></td>
 <td><select name='valueChainPartner[]' id='valueChainPartner".$n."' style='width:80px;'>";
 $data.="<option value=''>-select-</option>";
 $values=array('Beans','Coffee','Maize','Beans/Maize','Beans/Coffee','Maize/Coffee','Beans/Maize/Coffee');
									 
									 $q = 0; 
									 foreach ($values as $s) {
										 $selected=($row['valueChain']==$s)?"selected":"";
										 $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
										 $q++;
									 } 
			 
				 
		 $data.="</select></td>";
 
 
 
 $data.="<td><select name='partnershipFocus[]' id='partnershipFocus".$n."'>";
 $data.="<option value=''>-select-</option>";
 
 $values=array('Agricultural production','Agricultural PH transformation','Multi-focus','Others');
									 
									 $q = 0; 
									 foreach ($values as $s) {
										 $selected=($row['partnershipFocus']==$s)?"selected":"";
										 $data.="<option value=\"".$s."\" ".$selected.">".$s."</option>";
										 $q++;
									 } 
 
 $data.="</select></td>";
 
 
 $data.="<td><input value='".$row['valueActivity']."' name='valueOfPartnershipActivity[]' id='valueOfPartnershipActivity".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('valueOfPartnershipActivity".$n."').value,
																														 getElementById('valueOfPartnershipPartner".$n."').value,
																														 'valueOfPartnershipTotal".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:80px' type='text'></td>
 
 <td><input value='".$row['valuePartner']."' name='valueOfPartnershipPartner[]' id='valueOfPartnershipPartner".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('valueOfPartnershipActivity".$n."').value,
																														 getElementById('valueOfPartnershipPartner".$n."').value,
																														 'valueOfPartnershipTotal".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:80px' type='text'></td>
 
 <td><input value='".$row['valueTotal']."' name='valueOfPartnershipTotal[]' class='disabled' readonly='readonly' id='valueOfPartnershipTotal".$n."' onkeypress=\"return numbersonly(event, false)\" style='width:80px' type='text'></td>
 
 <td><input value='".$row['jobsCreatedFemaleNew']."' name='jobsCreatedFemaleNew[]' id='jobsCreatedFemaleNew".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew".$n."').value,
																														 getElementById('jobsCreatedMaleNew".$n."').value,
																														 'jobsCreatedTotalNew".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
																																 
 <td><input value='".$row['jobsCreatedFemaleOld']."' name='jobsCreatedFemaleOld[]' id='jobsCreatedFemaleOld".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld".$n."').value,
																														 getElementById('jobsCreatedMaleOld".$n."').value,
																														 'jobsCreatedTotalOld".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
 
 <td><input value='".$row['jobsCreatedMaleNew']."' name='jobsCreatedMaleNew[]' id='jobsCreatedMaleNew".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleNew".$n."').value,
																														 getElementById('jobsCreatedMaleNew".$n."').value,
																														 'jobsCreatedTotalNew".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
 
 <td><input value='".$row['jobsCreatedMaleOld']."' name='jobsCreatedMaleOld[]' id='jobsCreatedMaleOld".$n."' onkeyup=\"xajax_calc_youthApprentice(getElementById('jobsCreatedFemaleOld".$n."').value,
																														 getElementById('jobsCreatedMaleOld".$n."').value,
																														 'jobsCreatedTotalOld".$n."');return false;\" onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
 
 <td><input value='".$row['jobsCreatedTotalNew']."' class='disabled' readonly='readonly' name='jobsCreatedTotalNew[]' id='jobsCreatedTotalNew".$n."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td>
 
 
 <td><input value='".$row['jobsCreatedTotalOld']."' class='disabled' readonly='readonly' name='jobsCreatedTotalOld[]' id='jobsCreatedTotalOld".$n."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' type='text'></td></tr>";

$n++;  
 
}

}

$data."
</table>
</td>";

$data.="</tr>
</table>";

$data.="
<table width='100%'>
<tr class='evenrow'>
 <td colspan=22>
	 <div align='right'>
			 <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_partnerships(xajax.getFormValues('partnerships')); return false;\" />
	 </div>
 </td>
</tr>
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function update_partnerships($formValues){
$obj=new xajaxResponse();
$n=1;

for($i=0;$i<count($formValues['loopkey']);$i++){
 
$tbl_partnershipId=$formValues['tbl_partnershipId'][$i];
$techArea=$formValues['techArea'][$i];
$namePartner=$formValues['nameofPartner'][$i];
$valueChain=$formValues['valueChainPartner'][$i];
$partnershipFocus=$formValues['partnershipFocus'][$i];
$valueActivity=$formValues['valueOfPartnershipActivity'][$i];
$valuePartner=$formValues['valueOfPartnershipPartner'][$i];
$valueTotal=$formValues['valueOfPartnershipTotal'][$i];
$jobsCreatedFemaleNew=$formValues['jobsCreatedFemaleNew'][$i];
$jobsCreatedFemaleOld=$formValues['jobsCreatedFemaleOld'][$i];
$jobsCreatedMaleNew=$formValues['jobsCreatedMaleNew'][$i];
$jobsCreatedMaleOld=$formValues['jobsCreatedMaleOld'][$i];
$jobsCreatedTotalNew=$formValues['jobsCreatedTotalNew'][$i];
$jobsCreatedTotalOld=$formValues['jobsCreatedTotalOld'][$i];


$sql="UPDATE `tbl_public_private_partnership` p SET
		p.`techArea`='".$techArea."',
		p.`namePartner`='".$namePartner."',
		p.`valueChain`='".$valueChain."',
		p.`partnershipFocus`='".$partnershipFocus."',
		p.`valueActivity`='".$valueActivity."',
		p.`valuePartner`='".$valuePartner."',
		p.`valueTotal`='".$valueTotal."',
		p.`jobsCreatedFemaleNew`='".$jobsCreatedFemaleNew."',
		p.`jobsCreatedFemaleOld`='".$jobsCreatedFemaleOld."',
		p.`jobsCreatedMaleNew`='".$jobsCreatedMaleNew."',
		p.`jobsCreatedMaleOld`='".$jobsCreatedMaleOld."',
		p.`jobsCreatedTotalNew`='".$jobsCreatedTotalNew."',
		p.`jobsCreatedTotalOld`='".$jobsCreatedTotalOld."',
		p.`updatedby`='".$_SESSION['username']."'
		WHERE p.`tbl_partnershipId`='".$tbl_partnershipId."'";
//$obj->alert($sql);
$query=@mysql_query($sql)or die(http(2444));

//$query=@mysql_query($sql)or die(mysql_error());
			 
			 
			 }
$obj->assign('bodyDisplay','innerHTML',congMsg("Public Private partnership record(s) successfully Updated!"));
$obj->call("xajax_view_partnerships",'','','');
return $obj;
}

?>