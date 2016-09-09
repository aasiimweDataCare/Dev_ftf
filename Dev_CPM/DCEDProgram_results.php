<?php
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************

#----------------------------------------------

#***********************dced***********************************
$xajax->register(XAJAX_FUNCTION,'view_DCEDPerfomanceMeasurementSummaryHighLevel');

$xajax->register(XAJAX_FUNCTION,'view_DCEDannualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQualitativeannualTargetReport');
$xajax->register(XAJAX_FUNCTION,'view_DCEDQuantitativeannualTargetReport');
$xajax->register(XAJAX_FUNCTION,'view_DCEDquarterlyResults');
$xajax->register(XAJAX_FUNCTION,'view_DCEDAnnualWorkplan');
//-----------Partner Reports------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_DCEDPartnerAnnualWorkplan');
$xajax->register(XAJAX_FUNCTION,'view_DCEDPartnerAnnualPhysicalMonitoring');
$xajax->register(XAJAX_FUNCTION,'view_DCEDPartnerQuarterlyResults');
$xajax->register(XAJAX_FUNCTION,'view_DCEDPerfomanceMeasurementSummaryPrimary');
//-----------Partner Reports------------------------------------


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

$organization=($_SESSION['org_code']<>'')?$_SESSION['org_code']:$organization;
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
				and w.indicator_id='".$row['indicator_id']."' and org_code='".$organization."'
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
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Percentage Achieved(c=A/T*100)<img src='' width='100' height='0'></th>
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

$organization=($_SESSION['org_code']<>'')?$_SESSION['org_code']:$organization;
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
 <th  align='right' width='3%' colspan='4' rowspan='1'><b>Percentage Achieved(c=A/T*100)<img src='' width='100' height='0'></th>
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

$organization=($_SESSION['org_code']<>'')?$_SESSION['org_code']:$organization;
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




function view_DCEDAnnualWorkplan($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);


$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='25'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Annual Workplan&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Annual Workplan&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='23'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDAnnualWorkplan(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='23'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDAnnualWorkplan('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='23'><select name='project' id='project' onChange=\"xajax_view_DCEDAnnualWorkplan('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='23'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDAnnualWorkplan('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='20'><select name='year' id='year' onChange=\"xajax_view_DCEDAnnualWorkplan('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDAnnualWorkplan(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='25' ><center>DCED Annual Workplan (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
   
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td> <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<1;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<5;$y++){
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
   	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR;
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
  
  	$inc++;			
  }
 //----------------End of Result Chain Level------------------------ 
   }
   
   $data.="</table></fieldset>";
$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}



function view_DCEDPartnerAnnualWorkplan($subcomponent,$organization,$project,$resultchain,$year){
$obj=new xajaxResponse();
//$year=date(Y);
#$obj->alert($resultchain);
$mappingType='Primary';
$organization=($_SESSION['org_code']<>'')?$_SESSION['org_code']:$organization;
$year=($year==NULL)?$_SESSION['ABIActiveyear']:$year;
$data="<fieldset class='evenrow' ><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
  
    <td width='186' scope='col' colspan='25'>
      <div style='float:right;'>";
	  $new_entry=($_SESSION['role']<>'Monitoring and Evaluation')?"":" ";
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Partner Annual Workplan&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='print_version.php?linkvar=Print DCED Partner Annual Workplan&&subcomponent=".$subcomponent."&&intervention=".$project."&&resultcahin=".$resultchain."&&organization=".$organization."&&year=".$year."&&format=Print' target='_blank'><input type='button' name='export' value='Print Version' />
    </a></div></td></tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='23'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDPartnerAnnualWorkplan(this.value,'".$organization."','".$project."','".$resultchain."','".$year."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$subcomponent);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='23'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDPartnerAnnualWorkplan('".$subcomponent."',this.value,'".$project."','".$resultchain."','".$year."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization,$subcomponent);
				$data.="</select></td></tr>";
		$data.="<tr class='evenrow'>
    <td colspan=2 >Project:</td>
    <td colspan='23'><select name='project' id='project' onChange=\"xajax_view_DCEDPartnerAnnualWorkplan('".$subcomponent."','".$_SESSION['organization']."',this.value,'".$resultchain."','".$year."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	
	   
	   $data.=QueryManager::ProjectFilter($organization,$project);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='23'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDPartnerAnnualWorkplan('".$subcomponent."','".$organization."','".$project."',this.value,'".$year."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
	  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>";
		
		 $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='20'><select name='year' id='year' onChange=\"xajax_view_DCEDPartnerAnnualWorkplan('".$subcomponent."','".$organization."','".$project."','".$resultchain."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($year==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDPartnerAnnualWorkplan(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>

  <tr class='evenrow2'>
     <th colspan='25' ><center>DCED Annual Workplan (M=Male,F=Female,O=Other,T=Total)</center></th>
  </tr>
  <tr class='evenrow2'>
    <th align='right' rowspan='3'><b>NO</th>
	<th  align='left' width='300' rowspan='3'><b>Result Level( From the Results Chain) <img src='' width='200' height='0'></th>
	<th  align='left' width='300' rowspan='3'><b>Perfomance Indicator<img src='' width='200' height='0'></th>
    <th  align='right' width='2%' rowspan='3'><b>Unit of Measure</th>
   
	 <th  align='right' width='3%' colspan='16'><b>Quarterly Target (Planned)</td> <th  align='right' width='3%' colspan='4' rowspan='2'><b>Total Target (Planned)<img src='' width='100' height='0'></th>
	 
	  </tr>
	  <tr class='evenrow2'>";
      for($y=0;$y<1;$y++){
	 $data.="<th  align='right' width='3%' colspan='4'><b>Jan - Mar<img src='' width='80' height='0'></th>
	  <th  align='right' width='3%' colspan='4'><b>Apr - Jun<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Jul - Sep<img src='' width='80' height='0'></th>
	   <th  align='right' width='3%' colspan='4'><b>Oct - Dec <img src='' width='80' height='0'></th>";
	  }
	
	  $data.="</tr>";
  
  $data.="<tr class='evenrow2'>";
  for($y=0;$y<5;$y++){
     $data.="<td colspan='1'><strong>M</strong></td>
    <td colspan='1'><strong>F</strong></td>
    <td colspan='1'><strong>O</strong></td>
    <td colspan='1'><strong>T</strong></td>";
	 
  }
  $data.="</tr>";

  $n=1; $inc=1;
 				# 
			$sql1="SELECT * FROM `tbl_resultschain` where rc_id like '".$resultchain."%' order by rc_id asc";
			#$obj->alert($sql);
				$q1=@Execute($sql1) or die(http("Workplan-1778"));
						while($rowRC1=@FetchRecords($q1)){

			  $data.="<tr class='evenrow'><td align='right'><strong>".$rowRC1['rc_id']."</strong></td><td colspan='12'><strong>".$rowRC1['name']."</strong></td></tr>";
 # }
					$select=QueryManager::viewPerfomanceMeasurementTargetsPrimary($mappingType='Primary',$rowRC1['rc_id'],$subcomponent);
					/* $select="SELECT i.indicator_id,i.rc_id,i.unitofmeasure, i.indicator_name,i.physical_target
				FROM tbl_indicator i 
				WHERE i.rc_id='".$rowRC['rc_id']."' 
				and i.mapping_type like '$mappingType%' 
				GROUP BY i.indicator_id
				order by i.rc_id,i.indicator_id asc"; */
				#$obj->alert($rowRC1['rc_id']);
				/*  $select="select i.rc_id,i.indicator_id,i.unitofmeasure,i.subcomponent_id,
		i.indicator_name,i.indicator_type,i.physical_target from
		 tbl_indicator i
		where i.rc_id='".$rowRC1['rc_id']."' 
		and i.mapping_type like '".$mappingType."%'
		&& i.indicator_id like '%' 
		group by i.indicator_id
		order by i.rc_id,i.indicator_name asc"; */
  			#$select=QueryManager::ViewDCEDWorkplan($subcomponent,$organization,$project,$resultchain=$rowRC1['rc_id'],$year);
  			#$obj->alert($select);
 			$query=@mysql_query($select)or die(http("DCEDProgramResults-159")); #'PReport-'.mysql_error()
  while($row=@mysql_fetch_array($query)){
  $q=$row['q1'];
  
  $color=$inc%2==1?"evenrowBorder":"evenrowBorder";
   $data.="<tr class=$color>
  <td align='right'>".$n++."</td>
  <td  align='left' width='200'>$row[physical_target]</td>
	<td  align='left' width='200'> ".$row['indicator_name']."</td>
    <td align='left'>$row[unitofmeasure]</td>";
	
	
		
		$x=QueryManager::viewPartnerWorkplan($row['indicator_id'],$organization,$project,$year);
		#$obj->alert($x);
		$q=@Execute($x) or die(http("DPR-1598"));
		$rowq=FetchRecords($q); 

	$total=($rowq['Quarter1']+$rowq['Quarter2']+$rowq['Quarter3']+$rowq['Quarter4']);
	//$obj->alert($total);
	
	$totalR=($total==NULL)?"<td align=right><strong><center>-</center></strong></td>":"<td align=right><strong>".number_format($total)."</strong></td>";
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
   	
	$data.="<td align='right'>-</td>
    <td align='right'>-</td>".$totalR.$totalR; 
   $data.="</tr>"; 
  
  //$obj->addAlert($data2);
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
			elseif($_GET['linkvar']=='DCED Annual Workplan'){
			?>
			xajax_view_DCEDAnnualWorkplan('','','','','','');
			<?php
			}
			elseif($_GET['linkvar']=='Partner Annual Workplan')
			{
			?>
			xajax_view_DCEDPartnerAnnualWorkplan('','','','','','');
			<?php
			}
			elseif($_GET['linkvar']=='DCED Quartery Results')
			{
			?>
			
			xajax_view_DCEDquarterlyResults('','','','','','');
			
			<?php
			}
			elseif($_GET['linkvar']=='Partner Quarterly Results')
			{
			?>
			
			xajax_view_DCEDPartnerQuarterlyResults('','','','','','');
			
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
