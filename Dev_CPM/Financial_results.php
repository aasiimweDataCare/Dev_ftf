<?php
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************

#----------------------------------------------

#***********************dced******************************************************
$xajax->register(XAJAX_FUNCTION,'view_DCEDPerfomanceMeasurementSummaryHighLevel');
$xajax->register(XAJAX_FUNCTION,'view_DCEDannualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQualitativeannualTargetReport');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQuantitativeannualTargetReport');
//-----------Partner Reports-----------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_FinancialAnnualWorkplan');
$xajax->register(XAJAX_FUNCTION,'view_FinancialAnnualExpenses');
$xajax->register(XAJAX_FUNCTION,'view_BudgetMonitoring');
#--------------------------------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_DCEDPartnerAnnualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_DCEDPartnerQuarterlyResults');
$xajax->register(XAJAX_FUNCTION,'view_DCEDPerfomanceMeasurementSummaryPrimary');
//-----------Partner Reports------------------------------------------------------


#************************************************

require_once('filters_v2.php');
#************************************************


#*************************************************

function view_DCEDPerfomanceMeasurementSummaryHighLevel($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  
<tr class='evenrow'>
  
    <td width='186' scope='col' colspan='25'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export Performance Measurement Summary&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print Performance Measurement Summary&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='23'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='23'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='23'><select name='project' id='project' onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='23'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='20'><select name='year' id='year' onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='50' ><center>PERFORMANCE Measurement  summary   (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
    <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td>
	 <th align='right' width='3%' colspan='16'><b>Quarterly Actual (Realized)</th>
	 <th align='right' width='3%' colspan='4' rowspan='2'><b>Cumulative Actual (Since Project Start)<img src='' width='100' height='0'></th>
	  <th align='right' width='3%' colspan='1' rowspan='3'><b>Deviation(Reason for Variance)</th>
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<2;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<10;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 					$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='44'><strong>".$rowRC1['name']."</strong></td></tr>";
			
  
					$select=QueryManager::viewPerfomanceMeasurementTargets($rowRC1['rc_id'],$subcomponent);
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>".$row['indicator_name']."</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	$querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($querySql) or die(http("DPR-1407"));
	$rowq=FetchRecords($q);
	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
    $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
		//$obj->alert($totalR);
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter1.
   $Quarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter2.
   $Quarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter3.
   $Quarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter4.
   $Quarter4;
   	//---------Querterly Actuals
	
	
	 $querySqlActual="SELECT 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
		w.year, d.`prog_id` , d.`project_id` ,
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		FROM tbl_indicator_definition d
		INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
		where w.year='2013' 
		&& `EntryType`='DCED'
		and d.indicator_id='".$row['indicator_id']."'
		GROUP BY d.indicator_id";
	//$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-229"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter1.
   $ActualQuarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter2.
   $ActualQuarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter3.
   $ActualQuarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter4.
   $ActualQuarter4;
	
	//------------Cumulative Actual Since Project Start-----------------
	
	 $querySqlCumulative="SELECT 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` , sum( w.`total` ) AS CumulativeActual
				FROM tbl_indicator_definition d
				INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
				WHERE `EntryType` = 'DCED'
				and d.indicator_id='".$row['indicator_id']."'
				GROUP BY d.indicator_id";
	//$obj->alert($querySql);
		$qCumulative=@Execute($querySqlCumulative) or die(http("DPR-261"));
		$rowActualCumulative=FetchRecords($qCumulative);

	$totalACumulative=($rowActualCumulative['CumulativeActual']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActualCumulative['CumulativeActual'])."</td>";
	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$totalACumulative.
   $totalACumulative."
	<td align='left'>-</td>";
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);	$inc++;
 }
  
	//----------------End of Result Chain Level------------------------ 			
  }
  
   $data.=noRecordsFound($q,$colspan=54);
   $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}


function view_DCEDPerfomanceMeasurementSummaryPrimary($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='25'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Partner Perfomance Measurement summary&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Partner Perfomance Measurement summary&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='23'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='23'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='23'><select name='project' id='project' onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='23'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='20'><select name='year' id='year' onChange=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDPerfomanceMeasurementSummaryPrimary(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='50' ><center>PERFORMANCE Measurement  summary(PRIMARY INDICATORS) (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
    <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td>
	 <th align='right' width='3%' colspan='16'><b>Quarterly Actual (Realized)</th>
	 <th align='right' width='3%' colspan='4' rowspan='2'><b>Cumulative Actual (Since Project Start)<img src='' width='100' height='0'></th>
	  <th align='right' width='3%' colspan='1' rowspan='3'><b>Deviation(Reason for Variance)</th>
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<2;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<10;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 				
		$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='52'><strong>".$rowRC1['name']."</strong></td></tr>";
 # }
					$select=QueryManager::viewPerfomanceMeasurementTargetsPrimary($mappingType='Primary',$rowRC1['rc_id'],$subcomponent);
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	 /* $querySql="SELECT 1 AS `counter` , 
		w.curr_year,
	  	sum( if(( w.`Quarter` = 'Jan - Mar'), w.`Target` , '-' )) AS Quarter1, 
	  	sum( if(( w.`Quarter` = 'Apr- Jun'), w.`Target` , '-' )) AS Quarter2, 
	  	sum( if(( w.`Quarter` = 'Jul - Sep'), w.`Target` , '-' )) AS Quarter3,
		sum( if(( w.`Quarter` = 'Oct - Dec'), w.`Target` , '-' )) AS Quarter4
		FROM tbl_dcedworkplan w 
		where w.curr_year='".$year."' and w.indicator_id='".$row['indicator_id']."'
		GROUP BY w.indicator_id"; */
		$querySql=QueryManager::viewPartnerWorkplan($row['indicator_id'],$organization,$project,$year);
	//$obj->alert($querySql);
		$q=@Execute($querySql) or die(http("DPR-436"));
		$rowq=FetchRecords($q);

	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
    $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
		//$obj->alert($totalR);
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter1.
   $Quarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter2.
   $Quarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter3.
   $Quarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter4.
   $Quarter4;
   	//---------Querterly Actuals
	
	
	 /* $querySqlActual="SELECT 1 AS `counter` ,
		w.year, sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		FROM tbl_organizationreporting w 
		where w.year='".$year."' 
		&& `EntryType`='DCED'
		and w.indicator_id='".$row['indicator_id']."'
		GROUP BY w.indicator_id"; */
		$querySqlActual=QueryManager::viewPartnerActuals($row['indicator_id'],$organization,$project,$year);
		
		
	#$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-485"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter1.
   $ActualQuarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter2.
   $ActualQuarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter3.
   $ActualQuarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter4.
   $ActualQuarter4;
	
	//------------Cumulative Actual Since Project Start-----------------
	
	 $querySqlCumulative="SELECT 1 AS `counter` , sum( w.`total` ) AS CumulativeActual
				FROM tbl_organizationreporting w 
				WHERE `EntryType` = 'DCED'
				and w.indicator_id='".$row['indicator_id']."'
				GROUP BY w.indicator_id";
	//$obj->alert($querySql);
		$qCumulative=@Execute($querySqlCumulative) or die(http("DPR-261"));
		$rowActualCumulative=FetchRecords($qCumulative);

	$totalACumulative=($rowActualCumulative['CumulativeActual']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActualCumulative['CumulativeActual'])."</td>";
	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$totalACumulative.
   $totalACumulative."
	<td align='left'>-</td>";
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  //
  	$inc++;			
  }
  
  //----------------End of Result Chain Level------------------------
  } 
   $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}





function view_DCEDannualPhysicalMonitoring($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
 
			  
<tr class='evenrow'>
  
    <td width='186' scope='col' colspan='10'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Annual Physical Monitoring&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Annual Physical Monitoring&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='10'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDannualPhysicalMonitoring(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='10'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDannualPhysicalMonitoring('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='15'><select name='project' id='project' onChange=\"xajax_view_DCEDannualPhysicalMonitoring('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='15'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDannualPhysicalMonitoring('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='10'><select name='year' id='year' onChange=\"xajax_view_DCEDannualPhysicalMonitoring('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDannualPhysicalMonitoring(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='16' ><center>Annual PERFORMANCE Results  (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='2'><b>NO</th>
	<th  align='left' width='300' rowspan='2'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='2'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='2'><b>Unit of Measure</th>
   
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Total Actual (Realized)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Percentage Achieved(c=T/A)<img src='' width='100' height='0'></th>
	  </tr>";
	
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<3;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";


  $n=1; $inc=1;
 					$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='44'><strong>".$rowRC1['name']."</strong></td></tr>";
			
  
					$select=QueryManager::viewPerfomanceMeasurementTargets($rowRC1['rc_id'],$subcomponent);
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>".$row['indicator_name']."</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	$querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($querySql) or die(http("DPR-1407"));
	$rowq=FetchRecords($q);
	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
   
	
   	//---------Querterly Actuals
	
	
	 $querySqlActual="SELECT 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
		w.year, d.`prog_id` , d.`project_id` ,
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		FROM tbl_indicator_definition d
		INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
		where w.year='2013' 
		&& `EntryType`='DCED'
		and d.indicator_id='".$row['indicator_id']."'
		GROUP BY d.indicator_id";
	//$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-718"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	/* ;
	 
; */
	
	$percentageAchvmntAGOP=calc_Percentage($total,$totalA);
	$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0%</td>";
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalActual.$totalActual;

	
	/* $percentage1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."%</td>";
	$percentage2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."%</td>";
	$percentage3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."%</td>";
	$percentage4=(calc_Percentage($total,$totalA)==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."%</td>";
 */	
	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>".$percentageAchvmntAGOPDisplay.$percentageAchvmntAGOPDisplay;
	
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  $inc++;	
  }
  			//----------------End of Result Chain Level------------------------ 
  }
   $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}



function view_DCEDPartnerAnnualPhysicalMonitoring($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='20'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Partner Annual Physical Monitoring&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Partner Annual Physical Monitoring&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	 $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='10'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='10'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='10'><select name='project' id='project' onChange=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='10'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='10'><select name='year' id='year' onChange=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDPartnerAnnualPhysicalMonitoring(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='16' ><center>".$_GET['linkvar']."  (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='2'><b>NO</th>
	<th  align='left' width='300' rowspan='2'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='2'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='2'><b>Unit of Measure</th>
   
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Total Actual (Realized)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Percentage Achieved(c=T/A)<img src='' width='100' height='0'></th>
	  </tr>";
	
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<3;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 				
			$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='12'><strong>".$rowRC1['name']."</strong></td></tr>";
 # }
					$select=QueryManager::viewPerfomanceMeasurementTargetsPrimary($mappingType='Primary',$rowRC1['rc_id'],$subcomponent);
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	$querySql=QueryManager::viewPartnerWorkplan($row['indicator_id'],$organization,$project,$year);
	
	
	 /* $querySql="SELECT 1 AS `counter` ,	w.curr_year,
	  	sum( if(( w.`Quarter` = 'Jan - Mar'), w.`Target` , '-' )) AS Quarter1, 
	  	sum( if(( w.`Quarter` = 'Apr- Jun'), w.`Target` , '-' )) AS Quarter2, 
	  	sum( if(( w.`Quarter` = 'Jul - Sep'), w.`Target` , '-' )) AS Quarter3,
		sum( if(( w.`Quarter` = 'Oct - Dec'), w.`Target` , '-' )) AS Quarter4
		FROM tbl_dcedworkplan w 
		where w.curr_year='2013' and w.indicator_id='".$row['indicator_id']."'
		GROUP BY w.indicator_id"; */
	//$obj->alert($querySql);
		$q=@Execute($querySql) or die(http("DPR-687"));
		$rowq=FetchRecords($q);

	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
   
	
   	//---------Querterly Actuals
	
	
	 /* $querySqlActual="SELECT 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
		w.year, d.`prog_id` , d.`project_id` ,
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		FROM tbl_indicator_definition d
		INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
		where w.year='2013' 
		&& `EntryType`='DCED'
		and d.indicator_id='".$row['indicator_id']."'
		GROUP BY d.indicator_id"; */
		
		$querySqlActual=QueryManager::viewPartnerActuals($row['indicator_id'],$organization,$project,$year);
	//$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-718"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	/* ;
	 
; */
	
	$percentageAchvmntAGOP=calc_Percentage($total,$totalA);
	$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0%</td>";
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalActual.$totalActual;

	
	/* $percentage1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."%</td>";
	$percentage2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."%</td>";
	$percentage3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."%</td>";
	$percentage4=(calc_Percentage($total,$totalA)==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."%</td>";
 */	
	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>".$percentageAchvmntAGOPDisplay.$percentageAchvmntAGOPDisplay;
	
   $data.="</tr>"; 
  

  	$inc++;			
  }
  			

  $data.=noRecordsFound($query,$colspan=30);
      //----------------End of Result Chain Level------------------------ 
  
 }
   $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}


function view_DCEDquarterlyResults($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  
			  
<tr class='evenrow'>
  
    <td width='186' scope='col' colspan='25'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Quartery Results&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Export DCED Quartery Results&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='23'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDquarterlyResults(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='23'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDquarterlyResults('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='23'><select name='project' id='project' onChange=\"xajax_view_DCEDquarterlyResults('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='23'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDquarterlyResults('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='20'><select name='year' id='year' onChange=\"xajax_view_DCEDquarterlyResults('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDquarterlyResults(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='50' ><center>Quarterly PERFORMANCE Results  (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
   
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td>
	 <th align='right' width='3%' colspan='16'><b>Quarterly Actual (Realized)</th>
 <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Actual (Realized)<img src='' width='100' height='0'></th>
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<2;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<10;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 					$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='44'><strong>".$rowRC1['name']."</strong></td></tr>";
			
  
					$select=QueryManager::viewPerfomanceMeasurementTargets($rowRC1['rc_id'],$subcomponent);
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>".$row['indicator_name']."</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	$querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($querySql) or die(http("DPR-1407"));
	$rowq=FetchRecords($q);
	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
   
	
		//$obj->alert($totalR);
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter1.
   $Quarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter2.
   $Quarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter3.
   $Quarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter4.
   $Quarter4;
   	//---------Querterly Actuals
	
	
	 $querySqlActual="SELECT 1 AS `counter` , d.`defn_id` , d.`indicator_id` , d.`DefName` ,
		w.year, d.`prog_id` , d.`project_id` ,
	  	sum( if(( w.`reportingPeriod` = 'Jan - Mar'), w.`total` , '-' )) AS ActualQuarter1, 
	  	sum( if(( w.`reportingPeriod` = 'Apr- Jun'), w.`total` , '-' )) AS ActualQuarter2, 
	  	sum( if(( w.`reportingPeriod` = 'Jul - Sep'), w.`total` , '-' )) AS ActualQuarter3,
		sum( if(( w.`reportingPeriod` = 'Oct - Dec'), w.`total` , '-' )) AS ActualQuarter4
		FROM tbl_indicator_definition d
		INNER JOIN tbl_organizationreporting w ON ( w.indicator_id = d.DefName )
		where w.year='2013' 
		&& `EntryType`='DCED'
		and d.indicator_id='".$row['indicator_id']."'
		GROUP BY d.indicator_id";
	//$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-961"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter1.
   $ActualQuarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter2.
   $ActualQuarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter3.
   $ActualQuarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter4.
   $ActualQuarter4;
	
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalActual.$totalActual;

	
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  $inc++;	
  }
  			//----------------End of Result Chain Level------------------------ 
  }
   $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}

function view_DCEDPartnerQuarterlyResults($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='20'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Partner Quarterly Results&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Partner Quarterly Results&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	 $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='38'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDPartnerQuarterlyResults(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='38'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDPartnerQuarterlyResults('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='38'><select name='project' id='project' onChange=\"xajax_view_DCEDPartnerQuarterlyResults('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='38'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDPartnerQuarterlyResults('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='10'><select name='year' id='year' onChange=\"xajax_view_DCEDPartnerQuarterlyResults('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDPartnerQuarterlyResults(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='44' ><center>".$_GET['linkvar']."  (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
   
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td>
	 <th align='right' width='3%' colspan='16'><b>Quarterly Actual (Realized)</th>
 <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
 <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Actual (Realized)<img src='' width='100' height='0'></th>
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<2;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<10;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 				
				$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='44'><strong>".$rowRC1['name']."</strong></td></tr>";
			
					
 					 $select=QueryManager::viewPerfomanceMeasurementTargetsPrimary($mappingType='Primary',$rowRC1['rc_id'],$subcomponent);
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'>$row[indicator_name]</td>
    <td align='left'>$row[unitofmeasure]</td>";
	

		
		$querySql=QueryManager::viewPartnerWorkplan($row['indicator_id'],$organization,$project,$year);
	//$obj->alert($querySql);
		$q=@Execute($querySql) or die(http("DPR-1159"));
		$rowq=FetchRecords($q);

	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($total)."</td>";
	$Quarter1=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
   
   
   
	
		//$obj->alert($totalR);
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter1.
   $Quarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter2.
   $Quarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter3.
   $Quarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$Quarter4.
   $Quarter4;
   	//---------Querterly Actuals
	
	
		$querySqlActual=QueryManager::viewPartnerActuals($row['indicator_id'],$organization,$project,$year);
	//$obj->alert($querySql);
		$qActual=@Execute($querySqlActual) or die(http("DPR-1209"));
		$rowActual=FetchRecords($qActual);

	$totalA=($rowActual['ActualQuarter1']+$rowActual['ActualQuarter2']+$rowActual['ActualQuarter3']+$rowActual['ActualQuarter4']);
	//$obj->alert($total);
	
	$totalActual=($totalA==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($totalA)."</td>";
	$ActualQuarter1=($rowActual['ActualQuarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter1'])."</td>";
	$ActualQuarter2=($rowActual['ActualQuarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter2'])."</td>";
	$ActualQuarter3=($rowActual['ActualQuarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter3'])."</td>";
	$ActualQuarter4=($rowActual['ActualQuarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowActual['ActualQuarter4'])."</td>";
   
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter1.
   $ActualQuarter1;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter2.
   $ActualQuarter2;
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter3.
   $ActualQuarter3;
   
   $data.="<td align='right'>-</td>
    <td align='right'>-</td>
    ".$ActualQuarter4.
   $ActualQuarter4;
	
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
	
	
	 $data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalActual.$totalActual;

	
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  //
  	$inc++;			
  }
  //----------------End of Result Chain Level------------------------ 
  } $data.="</table></fieldset>
";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}




function view_FinancialAnnualWorkplan($subcomponent,$output,$activity,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' id='report' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='9'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export FinancialAnnualWorkplan&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> |
	    <a href='print_version.php?linkvar=Print FinancialAnnualWorkplan&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='7'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_FinancialAnnualWorkplan(this.value,'".$output."','".$activity."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Output:
                <label></label></td>
              <td colspan='7'><select name='organization' id='organization'  onChange=\"xajax_view_FinancialAnnualWorkplan('".$subcomponent."',this.value,'".$activity."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $select="select * from tbl_output where subcomp_id='".$subcomponent."' order by output_code asc";
			  $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $sel=($row['output_code']==$output)?"selected":"";
			  $data.="<option value=\"".$row['output_code']."\" ".$sel.">".$row['output_code']." ".$row['output_name']."</option>";
			  
			  }
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Activity:</td>
    <td colspan='7'><select name='project' id='project' onChange=\"xajax_view_FinancialAnnualWorkplan('".$subcomponent."','".$output."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	$output_id=RetrieveData($table='tbl_output',$condition='output_code',$value=$output,$returnValue1='output_id');
	
	 		$select="select * from tbl_activity where output_id like '".$output_id."%' order by activity_code asc";
			 $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $selActivity=($row['activity_code']==$activity)?"selected":"";
			  $data.="<option value=\"".$row['activity_code']."\" ".$selActivity.">".$row['activity_code']." ".$row['activity_name']."</option>";
			  
			  }
		
      $data.="</select></td>
  </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='6'><select name='year' id='year' onChange=\"xajax_view_FinancialAnnualWorkplan('".$subcomponent."','".$output."','".$activity."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date('Y'); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_FinancialAnnualWorkplan(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='9' ><center>".$_GET['linkvar']." Report(UGX)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='2'><b>NO</th>
	<th  align='left' width='300' rowspan='2'><b>CODE</th>
	<th  align='left' width='300' rowspan='2'><b>Activity<img src='' width='300' height='0'></th>
    <th  align='right' width='2%' rowspan='2'><b>Year</th>
   
	 <th  align='right' width='3%' colspan='4'><b>Quarterly Target (Planned)</td> <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<1;$y++){
	 $data.="<th  align='right' width='3%' colspan='1'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='1'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  
				 $grandTotal1=0;
				$grandq11=0;
				$grandq12=0;
				$grandq13=0;
				$grandq14=0; 
				
				 
  $n=1; $inc=1;
 				
			$sql1="SELECT * FROM `tbl_subcomponent` where id like '".$subcomponent."%' order by subcomponent_code asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['subcomponent_code']."</strong></td><td colspan='44'><strong>".$rowRC1['subcomponent']."</strong></td></tr>";
			
  
  				$grandTotal=0;
				$q11=0;
				$q12=0;
				$q13=0;
				$q14=0;
  
  
					$select="SELECT b.`Activity_Code` , a.activity_name,b.Year, 
					sum( if( b.`Year` = '$year' AND `Quarter` = '1', b.`Amount` , 0 ) ) AS Quarter1,
					 sum( if( b.`Year` = '$year' AND `Quarter` = '2', b.`Amount` , 0 ) ) AS Quarter2,
					  sum( if( b.`Year` = '$year' AND `Quarter` = '3', b.`Amount` , 0 ) ) AS Quarter3,
					   sum( if( b.`Year` = '$year' AND `Quarter` = '4', b.`Amount` , 0 ) ) AS Quarter4
								FROM  n_activity a left join `n_budget` b
								on(a.Activity_code = b.Activity_code)
								WHERE  b.Activity_code like '$t%'
								and b.`Year` = '$year'
								and substr(b.`Activity_Code`,1,1) = '".$rowRC1['id']."'
								and substr(b.`Activity_Code`,1,3)  like '".$output."%'
								and b.`Activity_Code` like '".$activity."%'
								GROUP BY b.Year, b.`Activity_Code`
								ORDER BY b.`Activity_Code";
//substr(b.`Activity_Code`,1)=
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
   $events2="onmouseup=\"this.style.backgroundColor='#f0e5a5';\"";
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color  ".$events2.">
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>".$row['Activity_Code']."</td>
	<td  align='left' width='200'>".$row['activity_name']."</td>
    <td align='left'>".$row['Year']."</td>";
	
	/* $querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($querySql) or die(http("DPR-1407"));
	$rowq=FetchRecords($q); */
	$total=($row['Quarter1']+$row['Quarter2']+$row['Quarter3']+$row['Quarter4']);
	//$obj->alert($total);
	
	
				$grandTotal=$grandTotal+$total;
				$q11=$q11+$row['Quarter1'];
				$q12=$q12+$row['Quarter2'];
				$q13=$q13+$row['Quarter3'];
				$q14=$q14+$row['Quarter4']; 
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right><strong>".number_format($total)."</strong></td>";
	$Quarter1=($row['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter1'])."</td>";
	$Quarter2=($row['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter2'])."</td>";
	$Quarter3=($row['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter3'])."</td>";
	$Quarter4=($row['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter4'])."</td>";
   
   
    
		//$obj->alert($totalR);
	 $data.=
   $Quarter1. 
   $Quarter2.
   $Quarter3.
   $Quarter4.$totalR;
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  
  	$inc++;			
  }
 
  $data.="<tr class=$color>
  <td align='left' colspan='4'><strong>Sub-Totals:</strong></td>
 	<td  align='right' width='200'><strong>".number_format($q11)."</strong></td>
    <td align='right'><strong>".number_format($q12)."</strong></td>
	 <td align='right'><strong>".number_format($q13)."</strong></td>
	 <td align='right'><strong>".number_format($q14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal)."</strong></td></tr>";
   $grandTotal1=$grandTotal1+$grandTotal;
				$grandq11=$grandq11+$q11;
				$grandq12=$grandq12+$q12;
				$grandq13=$grandq13+$q13;
				$grandq14=$grandq14+$q14;
 //----------------End of Result Chain Level------------------------ 
   }
   
   

   $data.="<tr class=$color>
  <td align='left' colspan='4'><strong>Grand Totals:</strong></td>
 	<td  align='right' width='200'><strong>".number_format($grandq11)."</strong></td>
    <td align='right'><strong>".number_format($grandq12)."</strong></td>
	 <td align='right'><strong>".number_format($grandq13)."</strong></td>
	 <td align='right'><strong>".number_format($grandq14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal1)."</strong></td></tr>";
  
   
   
   $data.=noRecordsFound($query,$colspan=9)."</table></fieldset>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}




function view_FinancialAnnualExpenses($subcomponent,$output,$activity,$resultchain,$year){
$obj=new xajaxResponse();
$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1' id='report'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='9'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export FinancialAnnualExpenses&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> |
	    <a href='print_version.php?linkvar=Print FinancialAnnualExpenses&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='7'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_FinancialAnnualExpenses(this.value,'".$output."','".$activity."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Output:
                <label></label></td>
              <td colspan='7'><select name='organization' id='organization'  onChange=\"xajax_view_FinancialAnnualExpenses('".$subcomponent."',this.value,'".$activity."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $select="select * from tbl_output where subcomp_id='".$subcomponent."' order by output_code asc";
			  $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $sel=($row['output_code']==$output)?"selected":"";
			  $data.="<option value=\"".$row['output_code']."\" ".$sel.">".$row['output_code']." ".$row['output_name']."</option>";
			  
			  }
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Activity:</td>
    <td colspan='7'><select name='project' id='project' onChange=\"xajax_view_FinancialAnnualExpenses('".$subcomponent."','".$output."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	$output_id=RetrieveData($table='tbl_output',$condition='output_code',$value=$output,$returnValue1='output_id');
	
	 		$select="select * from tbl_activity where output_id like '".$output_id."%' order by activity_code asc";
			 $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $selActivity=($row['activity_code']==$activity)?"selected":"";
			  $data.="<option value=\"".$row['activity_code']."\" ".$selActivity.">".$row['activity_code']." ".$row['activity_name']."</option>";
			  
			  }
		
      $data.="</select></td>
  </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='6'><select name='year' id='year' onChange=\"xajax_view_FinancialAnnualExpenses('".$subcomponent."','".$output."','".$activity."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_FinancialAnnualExpenses(
			  getElementById('subcomponent').value,
			  getElementById('organization').value,
			  getElementById('project').value,
			  getElementById('intervention').value,
			  getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='9' ><center>".$_GET['linkvar']." Report (UGX)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='2'><b>NO</th>
	<th  align='left' width='300' rowspan='2'><b>CODE</th>
	<th  align='left' width='300' rowspan='2'><b>Activity<img src='' width='300' height='0'></th>
    <th  align='right' width='2%' rowspan='2'><b>Year</th>
   
	 <th  align='right' width='3%' colspan='4'><b>Quarterly Target (Planned)</td> <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<1;$y++){
	 $data.="<th  align='right' width='3%' colspan='1'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='1'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  

  $n=1; $inc=1;

				$grandTotal1=0;
				$grandq11=0;
				$grandq12=0;
				$grandq13=0;
				$grandq14=0; 
 				
			$sql1="SELECT * FROM `tbl_subcomponent` where id like '".$subcomponent."%' order by subcomponent_code asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['subcomponent_code']."</strong></td><td colspan='44'><strong>".$rowRC1['subcomponent']."</strong></td></tr>";
				$grandTotal=0;
				$q11=0;
				$q12=0;
				$q13=0;
				$q14=0;
  
					$select="SELECT b.`Activity_Code` , a.activity_name,b.Year, 
					sum( if( b.`Year` = '$year' AND `Quarter` = '1', b.`Amount` , 0 ) ) AS Quarter1,
					 sum( if( b.`Year` = '$year' AND `Quarter` = '2', b.`Amount` , 0 ) ) AS Quarter2,
					  sum( if( b.`Year` = '$year' AND `Quarter` = '3', b.`Amount` , 0 ) ) AS Quarter3,
					   sum( if( b.`Year` = '$year' AND `Quarter` = '4', b.`Amount` , 0 ) ) AS Quarter4
								FROM `n_expense` b, n_activity a
								WHERE a.Activity_code = b.Activity_code 
								and b.Activity_code like '$t%'
								and b.`Year` = '$year'
								and substr(b.`Activity_Code`,1,1) = '".$rowRC1['id']."'
								and substr(b.`Activity_Code`,1,3)  like '".$output."%'
								and b.`Activity_Code` like '".$activity."%'
								GROUP BY b.Year, b.`Activity_Code`
								ORDER BY b.`Activity_Code";
//substr(b.`Activity_Code`,1)=
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
    $events2="onmouseup=\"this.style.backgroundColor='#f0e5a5';\"";
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color  ".$events2.">
 
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>".$row['Activity_Code']."</td>
	<td  align='left' width='200'>".$row['activity_name']."</td>
    <td align='left'>".$row['Year']."</td>";
	
	/* $querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($querySql) or die(http("DPR-1407"));
	$rowq=FetchRecords($q); */
	$total=($row['Quarter1']+$row['Quarter2']+$row['Quarter3']+$row['Quarter4']);
	//$obj->alert($total);
				$grandTotal=$grandTotal+$total;
				$q11=$q11+$row['Quarter1'];
				$q12=$q12+$row['Quarter2'];
				$q13=$q13+$row['Quarter3'];
				$q14=$q14+$row['Quarter4']; 
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right><strong>".number_format($total)."</strong></td>";
	$Quarter1=($row['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter1'])."</td>";
	$Quarter2=($row['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter2'])."</td>";
	$Quarter3=($row['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter3'])."</td>";
	$Quarter4=($row['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter4'])."</td>";
   
   
    
		//$obj->alert($totalR);
	 $data.=
   $Quarter1. 

   $Quarter2.
   $Quarter3.
   $Quarter4.$totalR;
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  
  	$inc++;			
  }
 //----------------SubTotals------------------------ 
  
  $data.="<tr class=$color>
  <td align='left' colspan='4'><strong>Sub-Total:</strong></td>
 	<td  align='right' width='200'><strong>".number_format($q11)."</strong></td>
    <td align='right'><strong>".number_format($q12)."</strong></td>
	 <td align='right'><strong>".number_format($q13)."</strong></td>
	 <td align='right'><strong>".number_format($q14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal)."</strong></td></tr>";
   				$grandTotal1=$grandTotal1+$grandTotal;
				$grandq11=$grandq11+$q11;
				$grandq12=$grandq12+$q12;
				$grandq13=$grandq13+$q13;
				$grandq14=$grandq14+$q14;
 //----------------End of Result Chain Level------------------------ 
   }
   
   

   $data.="<tr class=$color>
  <td align='left' colspan='4'><strong>Grand Total:</strong></td>
 	<td  align='right' width='200'><strong>".number_format($grandq11)."</strong></td>
    <td align='right'><strong>".number_format($grandq12)."</strong></td>
	 <td align='right'><strong>".number_format($grandq13)."</strong></td>
	 <td align='right'><strong>".number_format($grandq14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal1)."</strong></td></tr>";
  
   $data.=noRecordsFound($query,$colspan=9)."</table></fieldset>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}


function view_BudgetMonitoring($subcomponent,$output,$activity,$resultchain,$year){
$obj=new xajaxResponse();
$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1' id='report'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='9'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export BudgetMonitoring&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> </a> |
	    <a href='print_version.php?linkvar=Print BudgetMonitoring&&subcomponent=".$subcomponent."&&output=".$output."&&activity=".$actitivty."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='7'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_BudgetMonitoring(this.value,'".$output."','".$activity."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Output:
                <label></label></td>
              <td colspan='7'><select name='organization' id='organization'  onChange=\"xajax_view_BudgetMonitoring('".$subcomponent."',this.value,'".$activity."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $select="select * from tbl_output where subcomp_id='".$subcomponent."' order by output_code asc";
			  $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $sel=($row['output_code']==$output)?"selected":"";
			  $data.="<option value=\"".$row['output_code']."\" ".$sel.">".$row['output_code']." ".$row['output_name']."</option>";
			  
			  }
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Activity:</td>
    <td colspan='7'><select name='project' id='project' onChange=\"xajax_view_BudgetMonitoring('".$subcomponent."','".$output."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	$output_id=RetrieveData($table='tbl_output',$condition='output_code',$value=$output,$returnValue1='output_id');
	
	 		$select="select * from tbl_activity where output_id like '".$output_id."%' order by activity_code asc";
			 $sel=@mysql_query($select) or die(@http("FR-1474"));
			  while($row=@mysql_fetch_array($sel)){
			  $selActivity=($row['activity_code']==$activity)?"selected":"";
			  $data.="<option value=\"".$row['activity_code']."\" ".$selActivity.">".$row['activity_code']." ".$row['activity_name']."</option>";
			  
			  }
		
      $data.="</select></td>
  </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='6'><select name='year' id='year' onChange=\"xajax_view_BudgetMonitoring('".$subcomponent."','".$output."','".$activity."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_BudgetMonitoring(
			  getElementById('subcomponent').value,
			  getElementById('organization').value,
			  getElementById('project').value,
			  getElementById('intervention').value,
			  getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='15' ><center>".$_GET['linkvar']." Report (UGX)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='2'><b>NO</th>
	<th  align='left' width='300' rowspan='2'><b>CODE</th>
	<th  align='left' width='300' rowspan='2'><b>Activity<img src='' width='300' height='0'></th>
    <th  align='right' width='2%' rowspan='2'><b>Year</th>
   
	 <th  align='right' width='3%' colspan='4'><b>Quarterly budget (Planned)</td> <th  align='right' width='3%' colspan='1' rowspan='2'><b>Total Budget (Planned)<img src='' width='100' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>expenses</td> <th  align='right' width='3%' colspan='1' rowspan='2'><b>Total Budget Spent<img src='' width='100' height='0'></th>
	  <th  align='right' width='3%' colspan='1' rowspan='2'><b>% Achieved ((Expenses/Budget)*100)</th>
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<2;$y++){
	 $data.="<th  align='right' width='3%' colspan='1'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='1'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='1'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  

 				$n=1; $inc=1;
 			 	$grandTotal1=0;
				$grandq11=0;
				$grandq12=0;
				$grandq13=0;
				$grandq14=0; 
				
				$grandTotal1Ac=0;
				$grandq11Ac=0;
				$grandq12Ac=0;
				$grandq13Ac=0;
				$grandq14Ac=0;
 				
			$sql1="SELECT * FROM `tbl_subcomponent` where id like '".$subcomponent."%' order by subcomponent_code asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['subcomponent_code']."</strong></td><td colspan='44'><strong>".$rowRC1['subcomponent']."</strong></td></tr>";
			  	$grandTotal=0;
				$q11=0;
				$q12=0;
				$q13=0;
				$q14=0;
  				$grandTotalAc=0;
				$q11Ac=0;
				$q12Ac=0;
				$q13Ac=0;
				$q14Ac=0;
					$select="SELECT b.`Activity_Code` , a.activity_name,b.Year, 
					sum( if( b.`Year` = '$year' AND `Quarter` = '1', b.`Amount` , 0 ) ) AS Quarter1,
					 sum( if( b.`Year` = '$year' AND `Quarter` = '2', b.`Amount` , 0 ) ) AS Quarter2,
					  sum( if( b.`Year` = '$year' AND `Quarter` = '3', b.`Amount` , 0 ) ) AS Quarter3,
					   sum( if( b.`Year` = '$year' AND `Quarter` = '4', b.`Amount` , 0 ) ) AS Quarter4
								FROM `n_budget` b, n_activity a
								WHERE a.Activity_code = b.Activity_code 
								and b.Activity_code like '$t%'
								and b.`Year` = '$year'
								and substr(b.`Activity_Code`,1,1) = '".$rowRC1['id']."'
								and substr(b.`Activity_Code`,1,3)  like '".$output."%'
								and b.`Activity_Code` like '".$activity."%'
								GROUP BY b.Year, b.`Activity_Code`
								ORDER BY b.`Activity_Code";
//substr(b.`Activity_Code`,1)=
  
  					#$obj->alert($select);
 				 $query=@mysql_query($select)or die(http("DCEDProgramResults-159"));
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  $events2="onmouseup=\"this.style.backgroundColor='#f0e5a5';\"";
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color  ".$events2.">
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>".$row['Activity_Code']."</td>
	<td  align='left' width='200'>".$row['activity_name']."</td>
    <td align='left'>".$row['Year']."</td>";
	
	$total=($row['Quarter1']+$row['Quarter2']+$row['Quarter3']+$row['Quarter4']);
	
				$grandTotal=$grandTotal+$total;
				$q11=$q11+$row['Quarter1'];
				$q12=$q12+$row['Quarter2'];
				$q13=$q13+$row['Quarter3'];
				$q14=$q14+$row['Quarter4']; 
	
	$totalR=($total==NULL)?"<td align=right><center>-</center></td>":"<td align=right><strong>".number_format($total)."</strong></td>";
	$Quarter1=($row['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter1'])."</td>";
	$Quarter2=($row['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter2'])."</td>";
	$Quarter3=($row['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter3'])."</td>";
	$Quarter4=($row['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($row['Quarter4'])."</td>";
   
   //------------------------Actuals--------------------------------
   
   								$selectSql="SELECT b.`Activity_Code`,b.Year, 
								sum( if( b.`Year` = '$year' AND `Quarter` = '1', b.`Amount` , 0 ) ) AS Quarter1,
					 			sum( if( b.`Year` = '$year' AND `Quarter` = '2', b.`Amount` , 0 ) ) AS Quarter2,
					  			sum( if( b.`Year` = '$year' AND `Quarter` = '3', b.`Amount` , 0 ) ) AS Quarter3,
					   			sum( if( b.`Year` = '$year' AND `Quarter` = '4', b.`Amount` , 0 ) ) AS Quarter4
								FROM `n_expense` b
								WHERE b.`Year` = '".$year."'
								and b.`Activity_Code`='".$row['Activity_Code']."'
								GROUP BY b.Year, b.`Activity_Code`
								ORDER BY b.`Activity_Code";
     #$querySql=QueryManager::viewHighLevelWorkplan($row['indicator_id'],$organization,$project,$year);
	#$obj->alert($querySql);
	$q=@Execute($selectSql) or die(http("DPR-1954"));
	$rowq=FetchRecords($q);
	$totalAc=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']); 
	
				$grandTotalAc=$grandTotalAc+$totalAc;
				$q11Ac=$q11Ac+$rowq['Quarter1'];
				$q12Ac=$q12Ac+$rowq['Quarter2'];
				$q13Ac=$q13Ac+$rowq['Quarter3'];
				$q14Ac=$q14Ac+$rowq['Quarter4'];
	
	
	$totalAcv=($totalAc==NULL)?"<td align=right><center>-</center></td>":"<td align=right><strong>".number_format($totalAc)."</strong></td>";
	$Quarter1Ac=($rowq['Quarter1']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter1'])."</td>";
	$Quarter2Ac=($rowq['Quarter2']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter2'])."</td>";
	$Quarter3Ac=($rowq['Quarter3']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter3'])."</td>";
	$Quarter4Ac=($rowq['Quarter4']==NULL)?"<td align=right><center>-</center></td>":"<td align=right>".number_format($rowq['Quarter4'])."</td>";
	/**/
	//$obj->alert($total);
	  
   //-------------------------end of Script-------------------------
    	//$obj->alert($totalR);
		
		$percentageAchvmntAGOP=calc_Percentage($total,$totalAc);
	$percentageAchvmntAGOPDisplay=($percentageAchvmntAGOP!=0)?ColorCoding($percentageAchvmntAGOP,1):"<td ALIGN='RIGHT' class='redhdrs' >0%</td>";
		
		
	 $data.=
   $Quarter1. 
   $Quarter2.
   $Quarter3.
   $Quarter4.
   $totalR.
   $Quarter1Ac. 
   $Quarter2Ac.
   $Quarter3Ac.
   $Quarter4Ac.
   $totalAcv.$percentageAchvmntAGOPDisplay;
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  
  	$inc++;			
  }
 //----------------Sub-Totals------------------------ 
  $percentageSubTotals=calc_Percentage($grandTotal,$grandTotalAc);
	$percentageSubTotalsDisplay=($percentageSubTotals!=0)?ColorCoding($percentageSubTotals,1):"<td ALIGN='RIGHT' class='redhdrs' >0%</td>";
  $data.="<tr class='evenrow'>
     <td align='left' colspan='4'><strong>Sub-Totals:</strong></td>
 	 <td  align='right' width='200'><strong>".number_format($q11)."</strong></td>
     <td align='right'><strong>".number_format($q12)."</strong></td>
	 <td align='right'><strong>".number_format($q13)."</strong></td>
	 <td align='right'><strong>".number_format($q14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($q11Ac)."</strong></td>
     <td align='right'><strong>".number_format($q12Ac)."</strong></td>
	 <td align='right'><strong>".number_format($q13Ac)."</strong></td>
	 <td align='right'><strong>".number_format($q14Ac)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotalAc)."</strong></td>".$percentageSubTotalsDisplay."	 
	 </tr>";
   				$grandTotal1=$grandTotal1+$grandTotal;
				$grandq11=$grandq11+$q11;
				$grandq12=$grandq12+$q12;
				$grandq13=$grandq13+$q13;
				$grandq14=$grandq14+$q14;
				$grandTotal1Ac=$grandTotal1Ac+$grandTotalAc;
				$grandq11Ac=$grandq11Ac+$q11Ac;
				$grandq12Ac=$grandq12Ac+$q12Ac;
				$grandq13Ac=$grandq13Ac+$q13Ac;
				$grandq14Ac=$grandq14Ac+$q14Ac;

 //----------------End of Result Chain Level------------------------ 
   }
   
   
 $percentageGrandTotals=calc_Percentage($grandTotal1,$grandTotal1Ac);
	$percentageGrandTotalsDisplay=($percentageGrandTotals!=0)?ColorCoding($percentageGrandTotals,1):"<td ALIGN='RIGHT' class='redhdrs' >0%</td>";
   $data.="<tr class='evenrow'>
  <td align='left' colspan='4'><strong>Grand Totals:</strong></td>
 	<td  align='right' width='200'><strong>".number_format($grandq11)."</strong></td>
    <td align='right'><strong>".number_format($grandq12)."</strong></td>
	 <td align='right'><strong>".number_format($grandq13)."</strong></td>
	 <td align='right'><strong>".number_format($grandq14)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal1)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandq11Ac)."</strong></td>
    <td align='right'><strong>".number_format($grandq12Ac)."</strong></td>
	 <td align='right'><strong>".number_format($grandq13Ac)."</strong></td>
	 <td align='right'><strong>".number_format($grandq14Ac)."</strong></td>
	 <td  align='right' width='200'><strong>".number_format($grandTotal1Ac)."</strong></td>
	 ".$percentageGrandTotalsDisplay."
	 </tr>";
  
   
   
   $data.=noRecordsFound($query,$colspan=9)."</table></fieldset>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}


//view organizations resported quarterly





$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<!--	Tabs in Page: start	-->
		<link rel="stylesheet" type="text/css" href="tabs/tabcontent.css" />

		<script type="text/javascript" src="tabs/tabcontent.js">

		/***********************************************
		* Tab Content script v2.2- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
		* This notice MUST stay intact for legal use
		* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
		***********************************************/

		</script>
	<!--	Tabs in Page: end	-->

<title><?php heading($_GET['action']); ?></title>
<style type="text/css">
<!--
.style1 {color: #046c10}
-->
</style>

</head>

<body>

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
	  <div id="title"><?php title($_GET['linkvar'],$_GET['action']); ?></div>
          <div id="bodyDisplay">
          <script language="javascript" type="text/javascript">
		  <?php $linkvar=$_GET['linkvar'];if($linkvar!='')$_SESSION['linkvar']=$linkvar;
		  $action=$_GET['action'];if($action!='')$_SESSION['action']=$action;
	 if($_GET['linkvar']=='Performance Measurement Summary'){
			?>
			xajax_view_DCEDPerfomanceMeasurementSummaryHighLevel('','','','','','');
			<?php
			}
			
			elseif($_GET['linkvar']=='Partner Perfomance Summary'){
			?>
			xajax_view_DCEDPerfomanceMeasurementSummaryPrimary('','','','','','');
			<?php
			}
			elseif($_GET['linkvar']=='Financial Annual workplan'){
			?>
			xajax_view_FinancialAnnualWorkplan('','','','','','');
			<?php
			}
			
			elseif($_GET['linkvar']=='Financial Expenses')
			{
			?>
			xajax_view_FinancialAnnualExpenses('','','','','','');
			<?php
			}
			elseif($_GET['linkvar']=='Budget Monitoring')
			{
			?>
			xajax_view_BudgetMonitoring('','','','','','');
			<?php
			}
			elseif($_GET['linkvar']=='DCED Annual Physical Monitoring'){
			?>
			xajax_view_DCEDannualPhysicalMonitoring('','','','','','');
			<?php
			}
			
			elseif($_GET['linkvar']=='Partner Annual Results'){
			?>
			xajax_view_DCEDPartnerAnnualPhysicalMonitoring('','','','','','');
			<?php
			}
			
			
			
			else{
			?>
			//xajax_view_DCEDAnnualWorkplan('','','','','','');
			//xajax_view_annualResults('','');
			<?php
			
			}
			
			?>
			</script>
    </div>
     
  
    
    
    
    </td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
