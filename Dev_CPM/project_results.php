<?php


//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION,'ViewLOPTargets');
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets');
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargetsReport');
$xajax->register(XAJAX_FUNCTION,'view_CARPPMPIndicatorTracker');
$xajax->register(XAJAX_FUNCTION,'ViewCFTechnicalTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'ViewOtherTrainingActivities');
$xajax->register(XAJAX_FUNCTION,'ViewSemiAnnualPerfomanceReport');
$xajax->register(XAJAX_FUNCTION,'ViewAnnualPerfomanceReport');
$xajax->register(XAJAX_FUNCTION,'ViewCumulativePerfomanceReport');
$xajax->register(XAJAX_FUNCTION,'ViewFieldDaysandDemonstrations');
$xajax->register(XAJAX_FUNCTION,'ViewAdoptionRates');
#------------------------xxxxxxxxx-----------------------------------
$xajax->register(XAJAX_FUNCTION,'new_qualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'view_organization');
$xajax->register(XAJAX_FUNCTION,'view_allorganizations');
$xajax->register(XAJAX_FUNCTION,'view_ParticipatingfarmersbyproducerOrganization');
$xajax->register(XAJAX_FUNCTION,'view_allParticipatingfarmersbyproducerOrganization');
$xajax->register(XAJAX_FUNCTION,'YieldsPerCrop');
$xajax->register(XAJAX_FUNCTION,'view_NumberofFarmersandAreaunderAdoption');
$xajax->register(XAJAX_FUNCTION,'view_FarmersProductionRecords');
$xajax->register(XAJAX_FUNCTION,'edit_TSOqualitativeReporting2');
$xajax->register(XAJAX_FUNCTION,'view_ParticipantsperTrainingArea');
$xajax->register(XAJAX_FUNCTION,'view_FarmersNotBurningCropResidues');
$xajax->register(XAJAX_FUNCTION,'view_FarmersUsingHerbicides');
require_once('filters.php');
#************************xxxxxxxxxxxxxxx************************
#************************xxxxxxxxxxxxxxx***********************

#-======


 


 function ViewLOPTargets($indicator_type,$subcomponent,$output,$indicator,$year,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['indicator']='';
$_SESSION['indicator_Type']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';

$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;


$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>
<table cellspacing='1'  id='report'  border='0'    width='100%' >".filter_LOPTargetReport()."

   <tr>
			<th class='dataRow' rowspan='3' >NO/SELECT</th>
                <th  colspan='4' rowspan='3' class='dataRow'>Indicator</th>
			      <th scope='col' rowspan='3' class='dataRow'>Indicator type</th>
			 		<th scope='col' rowspan='3' class='dataRow'>unit of measure</th>
			 		<th scope='col' rowspan='3'  class='dataRow'>Disaggregation</th>
              		<th scope='col' colspan='13' class='dataRow' ><center>Life of Project Targets</center></th>
															</tr><tr>
														
									
            ";
	
			 $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
				 // $nx=$n."/".$n++;
				 // $obj->alert($nx);
				 $zz=$n+1;
            		$data.="<th class='evenrow2' colspan='3' rowspan='1' align='right'><center>".$n."/".$zz."</center></th>";
					
					}
			 
			 
			 $data.="<th  scope='col' rowspan='2' class='dataRow'>Total LOP Target</th>
            </tr>";
		
			 $data.="<tr><th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>";
		
				  $data.="</tr>";
$inc=1;
//$obj->alert(WorkplanYearSequence($queryHeader['opening_year'],$queryHeader['closure_year'],0));

			$x=QueryManager::LOPTargets($_SESSION['subcomponent_id'],$_SESSION['output'],$_SESSION['indicator_Type'],$_SESSION['indicator']);
			
			
			
			
//$obj->alert($x);
//$_SESSION['queryExport']=$x;
		$query=Execute($x)or die(http("Workplan-0123"));
		  if(mysql_num_rows($query)>0)
		  while($row=FetchRecords($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
$indicator_type=($row['indicator_type']<>NULL)?$row['indicator_type']:noteMsgDefined("Not Defined");
$MaleYear1=($row['MaleYear1']<>NULL)?$row['MaleYear1']:"-";
$FemaleYear1=($row['FemaleYear1']<>NULL)?$row['FemaleYear1']:"-";
$OthersYear1=($row['OthersYear1']<>NULL)?$row['OthersYear1']:"-";
$MaleYear2=($row['MaleYear2']<>NULL)?$row['MaleYear2']:"-";
$FemaleYear2=($row['FemaleYear2']<>NULL)?$row['FemaleYear2']:"-";
$OthersYear2=($row['OthersYear2']<>NULL)?$row['OthersYear2']:"-";
$MaleYear3=($row['MaleYear3']<>NULL)?$row['MaleYear3']:"-";
$FemaleYear3=($row['FemaleYear3']<>NULL)?$row['FemaleYear3']:"-";
$OthersYear3=($row['OthersYear3']<>NULL)?$row['OthersYear3']:"-";
$MaleYear4=($row['MaleYear4']<>NULL)?$row['MaleYear4']:"-";
$FemaleYear4=($row['FemaleYear4']<>NULL)?$row['FemaleYear4']:"-";
$OthersYear4=($row['OthersYear4']<>NULL)?$row['OthersYear4']:"-";
$TotalTarget=($row['MaleYear1']+$row['FemaleYear1']+$row['OthersYear1']+$row['MaleYear2']+$row['FemaleYear2']+$row['OthersYear2']+$row['MaleYear3']+$row['FemaleYear3']+$row['OthersYear3']+$row['MaleYear4']+$row['FemaleYear4']+$row['OthersYear4']);

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='".$row['indicator_id']."' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>
	
			<td align='left'>".$indicator_type."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
			<td align='left' colspan='' >".$row['typeofDisaggregation']."</td>";
		
		$data.="<td align='right'>".$MaleYear1."</td>
			<td align='right'>".$FemaleYear1."</td>
			<td align='right'>".$OthersYear1."</td>";
		$data.="<td align='right'>".$MaleYear2."</td>
			<td align='right'>".$FemaleYear2."</td>
			<td align='right'>".$OthersYear2."</td>";
			$data.="<td align='right'>".$MaleYear3."</td>
			<td align='right'>".$FemaleYear3."</td>
			<td align='right'>".$OthersYear3."</td>";
			$data.="<td align='right'>".$MaleYear4."</td>
			<td align='right'>".$FemaleYear4."</td>
			<td align='right'>".$OthersYear4."</td>";
	
			$data.="<td align='right' ><strong>".$TotalTarget."</strong></td>
        </tr>";
$inc++;
		  }
		

		
			$data.="".noRecordsFound($query,19)."";
		  $data.="
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function ViewAnnualTargetsReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}



$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];

//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_annualTargetReport2($fnctName="ViewAnnualTargetsReport")."



                        
				<tr><th rowspan='2' class='dataRow' >NO/SELECT</th>
			 <th rowspan=2 colspan='6' width='' class='dataRow'>Indicator</th>
		
		<th colspan='11' class='dataRow' ><center>".$reportTitle."</center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='2' class='dataRow'>unit of measure</th>
			 	<th colspan='1' class='dataRow'>Disaggregation</th>
				  <th  class='dataRow'>Baseline</th>
				  <th  class='dataRow'>Male</th>
				  <th  class='dataRow'>Female</th>
				   <th colspan='1' class='dataRow'>Other</th>
				   <th colspan='1' class='dataRow'>Total Semi-Annual Target</th>
				    </tr>";
$inc=1;


/* left join tbl_subcomponent s 
on(s.subcomponent_id=i.subcomponent_id)
left join tbl_output o on(o.output_id=i.output_id) */
$x=QueryManager::ViewAnnualTargets($_SESSION['fyear'],$_SESSION['semiAnnual']);
//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
//checkExistance($row['Target'],NULL,'ExistsInteger')
//$obj->alert($row['Target']);
$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left>
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 <INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
			<td colspan='5' >".$row['indicator_name']."</td>
	
			<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align='left' colspan='2'>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td align=right ><strong>".$base."</strong></td>
									<td align=right ><strong>".checkExistance($row['maleAprSep'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($row['femaleAprSep'],NULL,'ExistsInteger')."</strong></td>
									<td align=right colspan='1' ><strong>".checkExistance($row['otherAprSep'],NULL,'ExistsInteger')."</strong></td>
										<td align=right colspan='1' ><strong>".checkExistance($row['totalAnnualTarget'],NULL,'ExistsInteger')."</strong></td>
								
        </tr>";
$inc++;
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




//-------------SemiAnnualPerformance---------------------
function ViewSemiAnnualPerfomanceReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------------------------------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//---------------------------------------------------------------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_SemiAnnualPerfomanceReport($fnctName="ViewSemiAnnualPerfomanceReport")."



            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Semi Annual Report for the period ".$_SESSION['semiAnnual']."  ".$_SESSION['fyear']."</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='4' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Male</center></th>
				<th colspan='3' class='dataRow' ><center>Female</center></th>
				<th colspan='3' class='dataRow' ><center>Other</center></th>
			</tr>
			
			
			
			<tr>
			
             
			
             <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
				  <th width='' class='dataRow'>Baseline</th>
				  <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
				    <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
				     <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
            		
           			</tr>";
$inc=1;



/*  $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
 where subprog_id='".$rowoutcome['subcomponent_id']."' */
 
 $logicaloutput=@mysql_query("select * from tbl_output order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";



			$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
			

	
				$_SESSION['queryExport']=$x;
				$query=@Execute($x)or die(http("WRKPlan-202"));
		  
		  		if(@mysql_num_rows($query)>0)
				  while($row=@FetchRecords($query)){
				  $baseline=$row['baseline'];
				  $base=$baseline>0?$baseline:"-";
				  $color=$inc%2==1?"evenrow3":"white1";
				  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
					//checkExistance($row['Target'],NULL,'ExistsInteger')
					//$obj->alert($row['Target']);
						//$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
						
						$xT=QueryManager::ViewSemiAnnualReportTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
						#$obj->alert($xT);
						$queryTarget=@Execute($xT)or die(http("PR-422"));
						$rowTarget=@FetchRecords($queryTarget);
		 				 $l="align=right";
			$data.="<tr class=$color ".$events2.">
				 <td align=left>
				 <INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$row['workplan_id']."' >
				 <INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
				".$inc."</td>
            	<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
				<td colspan='3' width=''>".$row['indicator_name']."</td>";
					
			//$obj->alert($x);
			$y=QueryManager::view_SemiAnnualResultsHOActuals($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
			#$obj->alert($y);
			$queryActual=@Execute($y)or die(http("PR-431"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['disaggregation']."</td>
						<td align=right ><strong>".$base."</strong></td>
									<td align=right ><strong>".checkExistance($rowTarget['maleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['maleActual'],NULL,'ExistsInteger')."	</strong></td>";
									
									$xTOT=QueryManager::calc_Percentage($rowTarget['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['femaleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['femaleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOTfem=QueryManager::calc_Percentage($rowTarget['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['otherTarget'],NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance($rowActual['otherActual'],NULL,'ExistsInteger')."</strong></td>";
									$xTOTother=QueryManager::calc_Percentage($rowTarget['otherTarget'],$rowActual['otherActual']);
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother;
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



//-----------------Annual Perfomance Report---------------

function ViewAnnualPerfomanceReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_AnnualPerfomanceReport($fnctName="ViewAnnualPerfomanceReport")."



            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Annual Performance Report for the period  ".$_SESSION['fyear']."</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='4' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Male</center></th>
				<th colspan='3' class='dataRow' ><center>Female</center></th>
				<th colspan='3' class='dataRow' ><center>Other</center></th>
			</tr>
			
			
			
			<tr>
			
             
			
             <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
				  <th width='' class='dataRow'>Baseline</th>
				  <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
				    <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
				     <th width='' class='dataRow'>Target</th>
				   <th width='' class='dataRow'>Actual</th>
				      <th width='' class='dataRow'>% Achieved</th>
            		
           			</tr>";
$inc=1;



/*  $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
 where subprog_id='".$rowoutcome['subcomponent_id']."' */
 
 $logicaloutput=@mysql_query("select * from tbl_output order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";




$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
			

	
				$_SESSION['queryExport']=$x;
				$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  
		  		if(@mysql_num_rows($query)>0)
				  while($row=@mysql_fetch_array($query)){
				  $baseline=$row['baseline'];
				  $base=$baseline>0?$baseline:"-";
				  $color=$inc%2==1?"evenrow3":"white1";
				  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
					//checkExistance($row['Target'],NULL,'ExistsInteger')
					//$obj->alert($row['Target']);
						$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
		 				 $l="align=right";
			$data.="<tr class=$color ".$events2.">
				 <td align=left>
				 <INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$row['workplan_id']."' >
				 <INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
				".$inc."</td>
            	<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
				<td colspan='3' width=''>".$row['indicator_name']."</td>";
					$xT=QueryManager::ViewAnnualReportTargets($_SESSION['fyear'],$row['indicator_id']);
					//$obj->alert($xT);
					$queryTarget=@Execute($xT)or die(http("PR-597"));
					$rowTarget=@FetchRecords($queryTarget);			
			
			
			$y=QueryManager::view_AnnualResultsHOActuals($_SESSION['fyear'],$row['indicator_id']);
			#$obj->alert($y);
			$queryActual=@Execute($y)or die(http("PR-358"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td align=right ><strong>".$base."</strong></td>
									<td align=right ><strong>".checkExistance($rowTarget['maleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['maleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOT=QueryManager::calc_Percentage($rowTarget['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['femaleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['femaleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOTfem=QueryManager::calc_Percentage($rowTarget['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['otherTarget'],NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance($rowActual['otherActual'],NULL,'ExistsInteger')."</strong></td>";
									$xTOTother=QueryManager::calc_Percentage($rowTarget['maleTarget'],$rowActual['maleActual']);
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother;
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}









function ViewCumulativePerfomanceReport($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_CumulativePerfomanceReport($fnctName="ViewCumulativePerfomanceReport")."



            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Cumulative Performance (Achievements) against Project Life Targets</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='3' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Project Life Targets</center></th>
				<th colspan='3' class='dataRow' ><center>achievements todate</center></th>
				<th colspan='3' class='dataRow' ><center>Percentage(%) Achievement</center></th>
			</tr>
			
			
			
			
			<tr>
			
             
			
             <th class='dataRow'>Indicator type</th>
			 <th  class='dataRow'>unit of measure</th>
			 <th class='dataRow'>Disaggregation</th>
				
				  <th class='dataRow'>Male</th>
				  <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
					  <th  class='dataRow'>Male</th>
				  <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
					  <th class='dataRow'>Male</th>
					    <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
				  
            		
           			</tr>";
$inc=1;



/*  $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
 where subprog_id='".$rowoutcome['subcomponent_id']."' */
 
 $logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";

$x=QueryManager::ViewCumulativeLOPTargets($rowoutput['output_id']);
#$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
//checkExistance($row['Target'],NULL,'ExistsInteger')
//$obj->alert($row['Target']);
$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left>
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 <INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>";
			
			
			
			$y=QueryManager::view_CumulativeResultsTodate($row['indicator_id']);
			#$obj->alert($y);
			$queryActual=@Execute($y)or die(http("PR-358"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						
									<td align=right ><strong>".checkExistance(round($row['maleTarget'],2),NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance(round($row['femaleTarget'],2),NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance(round($row['otherTarget'],2),NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance(round($rowActual['maleActual'],2),NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance(round($rowActual['femaleActual'],2),NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance(round($rowActual['otherActual'],2),NULL,'ExistsInteger')."</strong></td>
									";
									
									$xTOT=QueryManager::calc_Percentage($row['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="
									";
									
									$xTOTfem=QueryManager::calc_Percentage($row['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
									$data.="
									";
									$xTOTother=QueryManager::calc_Percentage($row['maleTarget'],$rowActual['maleActual']);
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother;
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}












#----------------------------------------------
function ViewAnnualTargets($indicator_type,$subcomponent,$output,$indicator,$year,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
#----------------------------------------------
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
#----------------------------------------------
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;
#$_SESSION['fyear']=$year;
#---------------------------------------------

$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >".filter_annualTargetReport()."



            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='6' class='dataRow' >Annual Targets</th>
															</tr>
            <tr><th width='' class='dataRow' >SELECT</th>
			
              <th width='' colspan='4' width='' class='dataRow'>Indicator</th>
			
             <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
				  <th width='' class='dataRow'>Baseline</th>
            		<th class='dataRow'  bgcolor='#669900'>Total</th>
           			</tr>";
$inc=1;

/* $logicaloutcome=@mysql_query("select * from tbl_subcomponent WHERE subcomponent_id like '".$_SESSION['subcomponent_id']."%' order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='9'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
$logicaloutput=@mysql_query("select * from tbl_output where subprog_id='".$rowoutcome['subcomponent_id']."' order by output_code asc")or die(http("PR-063"));
 */
/* while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan=9><strong>".$rowoutput['output_name']."</strong></td></tr>";
 */
/* if($_SESSION['fyear']<>NULL){ */
$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` ,i.`baseline` , i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

	WHERE i.subcomponent_id like '".$_SESSION['subcomponent_id']."%'
 	and i.output_id like '".$_SESSION['output_id']."%'
 	&& i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 	and i.indicator_name like '".$_SESSION['indicator']."%'
	OR w.curr_year like  '".$_SESSION['fyear']."%'
	GROUP BY i.indicator_id
	HAVING i.display like 'Yes%' 
	ORDER BY i.indicator_code,i.indicator_type ASC";
/* }
else */
/* $x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` ,i.`baseline` , i.`unitofmeasure`,
   w.Target, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
 and i.output_id='".$rowoutput['output_id']."'
GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code,i.indicator_type ASC"; 
 */
//$obj->alert($x);
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-0123"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='".$row['workplan_id']."' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>
	
			<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td  align='right'>$base</td>
			<td align=right ><strong>".checkExistance($row['Target'],NULL,'ExistsInteger')."</strong></td>
        </tr>";
$inc++;
		  }
		//} 
		//}
			//$data.="".noRecordsFound($query,10)."";
		  $data.="
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function view_CARPPMPIndicatorTracker($indicator_type,$subcomponent,$output,$indicator,$year,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
#----------------------------------------------
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
#----------------------------------------------
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;
$_SESSION['fyear']=($year<>NULL)?$year:$_SESSION['Activeyear'];
#---------------------------------------------

//$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >".filter_CARPPMPIndicatorTracker()."



            <tr>
           
              <th colspan='13' class='dataRow' ><center>CARP PMP Indicator Tracker</center></th>
															</tr>
            <tr><th width='' class='dataRow' >SELECT</th>
			
              <th width='' colspan='4' width='' class='dataRow'>Indicator</th>
			
             <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
				  
				   <th width='' class='dataRow'>Baseline</th>
				   <th width='' class='dataRow'>LOP Targets</th>
				    <th width='' class='dataRow'>Year ".$_SESSION['fyear']." Target</th>
					  <th width='' class='dataRow'>Year ".$_SESSION['fyear']." Progress</th>
					  <th width='' class='dataRow'>Progress Against ".$_SESSION['fyear']." Target </th>
            		
           			</tr>";
$inc=1;

/* $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
$logicaloutput=@mysql_query("select * from tbl_output where subprog_id='".$rowoutcome['subcomponent_id']."' order by output_code asc")or die(http("PR-063"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='13'><strong>".$rowoutput['output_name']."</strong></td></tr>";
 */
//if($_SESSION['fyear']<>NULL){
$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` ,i.`baseline` , i.`unitofmeasure`,
   w.Target, l.Target as loptarget, r.total,i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w  ON ( i.indicator_id = w.indicator_id )
 LEFT JOIN  `tbl_loptargets`l  ON ( i.indicator_id = l.indicator_id )
 LEFT JOIN  `tbl_organizationreporting` r  ON ( i.indicator_id = r.indicator_id )


WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
 OR w.curr_year like  '".$_SESSION['fyear']."%'

GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code,i.indicator_type ASC";
//}
/* else
$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` ,i.`baseline` , i.`unitofmeasure`,
   w.Target AS TotalTarget, i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w
 ON ( i.indicator_id = w.indicator_id )

WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
 and i.output_id='".$rowoutput['output_id']."'
GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code,i.indicator_type ASC"; 
 */
//$obj->alert($x);
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-0123"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='".$row['workplan_id']."' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>
	
			<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td  align='right'>$base</td>
						
			<td align=right ><strong>".checkExistance($row['loptarget'],NULL,'ExistsInteger')."</strong></td>
			<td align=right ><strong>".checkExistance($row['Target'],NULL,'ExistsInteger')."</strong></td>
			<td align=right ><strong>".checkExistance($row['total'],NULL,'ExistsInteger')."</strong></td>";
			//$obj->alert($row['Target'].",----".$row['total']);
			$Target=Mean($row['Target'],$row['unitofmeasure']);
			$Actual=Mean($row['total'],$row['unitofmeasure']);
			//$obj->alert($Target.",----".$Actual);
			$percentage=calc_Percentage($Target,$Actual);
			$displayPercentage=($percentage<>0)?"<td align=right ><strong>".$percentage."%</strong></td>":"<td align='center' ><strong>-</strong></td>";
			$data.=$displayPercentage."</tr>";
$inc++;
		  }
		//} 
		//}
			//$data.="".noRecordsFound($query,10)."";
		  $data.="
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_organization($orgname,$orgtype,$countryName,$district,$subcounty,$parish,$cur_page=1,$records_per_page=20){
$feedback = new xajaxResponse();
if($_SESSION['user_id']==''){
$feedback->redirect('index.php');
return $feedback;
} 
$n=1; $inc=1;
$_SESSION['orgname1']='';
$_SESSION['orgtype1']='';
$_SESSION['countryName']='';
$_SESSION['districtName']='';
$_SESSION['subcountyName']='';
$_SESSION['ParishName']='';
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['countryName']=$countryName;
$_SESSION['districtName']=$district;
$_SESSION['subcountyName']=$subcounty;
$_SESSION['ParishName']=$parish;

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>
";


$data.="<table cellspacing='1'  id='report'     width='100%' border='0'> ".filter_organizationReport()." 

	  <tr>
        <th colspan='12' ><div align='center' class=''>ORGANIZATION/INSTITUTION DETAILS </div></th>
        </tr>
      
      <tr>
	  <th colspan='2'>SELECT</th>
	  <th  ><strong >ORGANIZATION NAME</strong></th>

        <th width='' '><strong class=''>District</strong></th>
	<th width='' '><strong class=''>Subcounty</strong></th>
	<th width='' '><strong class=''>Parish</strong></th>
		<th width=''><strong class=''>Village</strong></th>
		<th ><strong class=''>CONTACT PERSON</strong></th>
		<th ><strong class=''>GENDER</strong></th>
		<th  width=''><strong class=''>TELEPHONE</strong></th>
		<th  width=''><strong class=''>EMAIL</strong></th>
		<th  width=''><span align='right'>ACTION</span></th>
      </tr>";
/* $query_string="select * from view_organization where lower(orgName) like '".strtolower($orgname)."%'&& lower(organization_type) like '".strtolower($orgtype)."%'&& lower(district) like '".strtolower($district)."%' group by orgName order by orgName Asc"; */
$query_string="select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,
o.telephone,o.orgtype,o.email_address,o.village,z.countryName ,o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName
from tbl_organization o 
left join tbl_country z on(o.country_id=z.countryCode) 
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%' 
&& lower(countryName) like '".strtolower($_SESSION['countryName'])."%'
&& o.district like '".$_SESSION['districtName']."%'
&& o.subcounty like '".$_SESSION['subcountyName']."%'
&& o.parish like '".$_SESSION['ParishName']."%'
and l.classCode='1' 
and o.display like 'Yes%'  
 order by orgName Asc";
 //$feedback->alert($query_string);
$query_=mysql_query($query_string)or die(http("STP-2614"));

$max_records = mysql_num_rows($query_);
	
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1278));  



	  while($row=mysql_fetch_array($new_query)){
	 $color=$n%2==1?"#e7d58f":"#ffffff";
	 //$feedback->ainclert($row[21]);
	 $div2="view_projectDetails_".$row['org_code'];
	 $telno=($row['telephone']!='')?"<td>".checkExistance($row['telephone'],NULL,'ExistsString')."</td>":"<td><center>-</center></td>";
	  $color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#A9753A';\" >

	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' /></td><td>".$n."</td>
	 <td colspan='1'>".mysql_real_escape_string($row['orgName'])."</td>

	 <td>".checkExistance($row['districtName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['subcountyName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['ParishName'],NULL,'ExistsString')."</td>
	<TD>".checkExistance($row['village'],NULL,'ExistsString')."</TD>
	 <td >".checkExistance($row['contact_person'],NULL,'ExistsString')."</td>
 <td >".checkExistance($row['gender'],NULL,'ExistsString')."</td>
	  ".$telno;
	  $data.="<td>".checkExistance($row['email_address'],NULL,'ExistsInteger')."</td>
	    <td ALIGN='RIGHT'><input name='' type='button'  id='button' value='Details' onclick=\"xajax_view_allorganizations('".$row['org_code']."','".$div2."');\" /></td></tr>
	  <tr >
<td colspan='7'><div id='$div2'></div></a></td>
	</tr>
	  
	  ";
	  $n++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=6></td>
   </td><td colspan=6 align='right'>";
	
   
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;




		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$cur_page."',this.value)\">";


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
$feedback->assign('bodyDisplay','innerHTML',$data);
return $feedback;
 }


function view_allorganizations($org_code,$div2){
$obj=new xajaxResponse();


$query=mysql_query("select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,
o.telephone,o.orgtype,o.email_address,o.village,z.countryName ,o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName
from tbl_organization o 
left join tbl_country z on(o.country_id=z.countryCode) 
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
 where o. org_code='".$org_code."'
  order by orgName ASC")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data="<div id='login'>

<table cellspacing='0'      width='600'><tr><td><legend class='green_field'></legend>
      
      <table cellspacing='0'      width='670' border='0'>
        <tr>
          <td>Reports &raquo; Organizationa Details</td>
        </tr>
        <tr>
          <td><hr size='1' color='orange' align='left'width='640'/></td>
        </tr>
      </table>
      <legend class='green_field'></legend>
      <form name='organization' id='organization'><table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
              <tr>
                <td width='150'>&nbsp;</td>
                <td colspan='2'><span class='green_field'>Organizational Details</span></td>
              </tr>
              <tr>
                <td>Organization:</td>
                <td colspan='2'><input type='hidden' name='org_code12[]' value='".$row['org_code']."'>".mysql_real_escape_string($row['orgName'])."</td>
              </tr>
              <tr>
                <td>Acronym</td>
                <td colspan='2'>".$row['acronym']."</td>
              </tr>
              <tr style='display:none;'>
                <td>Registered?</td>
                <td width='74' colspan='2'>".$row['registered']."</td>
              </tr>
              <tr style='display:none;'>
                <td>Registration Number:</td>
                <td colspan='2'>".$row['regno']."</td>
              </tr>
              <tr >
                <td>District:</td>
                <td colspan='2'>".$row['districtName']."</td>
              </tr>
			   <tr>
                <td>Subcounty:</td>
                <td colspan='2'>".$row['subcountyName']."</td>
              </tr>
			   <tr >
                <td>Parish:</td>
                <td colspan='2'>".$row['ParishName']."</td>
              </tr>
			   <tr >
                <td>Village:</td>
                <td colspan='2'>".$row['village']."</td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'>".$row['organization_type']."</td>
              </tr>
              <tr class='display_none'>
                <td>Vision</td>
                <td colspan='2'>".mysql_real_escape_string($row['vision'])."</td>
            </tr>
             <tr class='display_none'>
                <td>Mission</td>
                <td colspan='2'>".mysql_real_escape_string($row['mission'])."</td>
            </tr>
              <tr class='display_none'>
                <td>Objectives</td>
                <td colspan='2'>".mysql_real_escape_string($row['objectives'])."</td>
              </tr>
			  <tr style='display:none;'>
                <td><span class='green_field'>Sub-component:</span></td>
                <td colspan='2'>".$row['subcomponent']."</td>
            </tr>
              <tr style='display:none;'>
                <td><span class='green_field'>Subsector:</span></td>
                <td colspan='2'>".$row['subsector']."</td>
            </tr>
			
                
  
</table>

<table cellspacing='0'      width='597' border='0' id='contacts'>
     <tr class='display_none'>
             <td width='152'>Website:</td>
      <td width='435'>".$row['webiste']."</td>
    </tr>
           <tr>
             <td>Contact Person :</td>
             <td>".$row['contact_person']."</td>
           </tr>
           <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title']."</td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td>".$row['telephone']."</td>
    </tr>
           <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile']."</td>
    </tr>
	 <tr class='display_none'>
             <td>Contact Person 2:</td>
      <td>".$row['contact_person2']."</td>
    </tr>
        <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
           <tr class='display_none'>
             <td>Telephone No.:</td>
      <td>".$row['telephone2']."</td>
    </tr>
          <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile2']."</td>
    </tr>
	 <tr class='display_none'>
             <td>Contact Person 3:</td>
      <td>".$row['contact_person3']."</td>
    </tr>
           <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
          <tr class='display_none'>
             <td>Telephone No.:</td>
      <td>".$row['telephone3']."</td>
    </tr>
          <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile3']."</td>
    </tr>";
	if($_SESSION['role']=='Monitoring  and Evaluation'){
	$data.="<tr >
             <td colspan=2 align=center><input type='button'  id='button' Value='Close' onclick=\"xajax_view_allorganizations('".$org_code."','');return false;\" Title='Close'>|<input type='button'  id='button' class='evenrow' Value='Edit' title='Edit' name='Edit'  onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'))\">|<input type='button'  id='button'  class='evenrow' title='Delete'  value='Delete' class='redhdrs'></td>
      <td></td>
    </tr>";
	}else 
	$data.="<tr >
             <td colspan=2 align=center><input type='button'  id='button' Value='Close' onclick=\"xajax_view_allorganizations('".$org_code."','');return false;\" Title='Close'>|<input type='button'  id='button' class='' Value='Edit' title='Edit' name='Edit'  onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'));return false;\">|<a href='print_version2.php?linkvar=print_orgDetails&&org_code=".$row['org_code']."&&format=Print' target='_blank'><input type='button'  id='button' value='Print Version' name='' ></a></td>
      <td></td>
    </tr>";
	
	

	
  $data.="</table>
 
         
       </form></td></tr></table>
<p>&nbsp;</p>
</div>";
}

$obj->assign($div2,'innerHTML',$data);
return $obj;
}


//=====================
/*<tr>
	
	<td width='' colspan='2' class='evenrow'><strong>District:</strong></td><td width='' colspan='2' class='evenrow'><select name='district' size='1' onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('','','',this.value,'".$subcounty."','".$parish."','".$leadfarmer."','".$gender."',1,20);return false;\" id='district' style='width:200px;'>
          <option value=''>-All-</option>
		  ".funct_dropDownSelected('tbl_district','districtName','districtCode','districtName',$district)."</select></td>
		 <td width='' colspan='2' class='evenrow'><strong>Subcounty:</strong></td>
		 <td width='' colspan='2' class='evenrow'>
		 <select name='subcounty' size='1' class='' id='subcounty'  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('','','','".$district."',this.value,'".$parish."','".$leadfarmer."','".$gender."',1,20);return false;\"   style='width:200px;'>
          <option value=''>-All-</option>";
		  $sql="select * from tbl_subcounty where districtCode like '".$district."%' order by subcountyName asc";
		  $query=@mysql_query($sql) or die(http("FLT-2621"));
		  while($row=@mysql_fetch_array($query)){
		  $sel=($row['subcountyCode']==$subcounty)?"selected":"";
		  		$data.="<option value=\"".$row['subcountyCode']."\" ".$sel.">".$row['subcountyName']."</option>";
		  }
		 $data.="</select></td>
	<strong>Parish:</strong></td>
	<td width='' colspan='2' class='evenrow'>
	<select name='parish' size='1' class=''  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('','','',this.value,'".$subcounty."','".$parish."','".$leadfarmer."','".$gender."',1,20);return false;\"  id='parish' style='width:200px;'>
          <option value=''>-All-</option>";
		  
		  $sql="select * from tbl_parish where subcountyCode like '".$subcounty."%' order by ParishName asc";
		  $query=@mysql_query($sql) or die(http("FLT-2621"));
		  while($row=@mysql_fetch_array($query)){
		  $selP=($row['parishCode']==$parish)?"selected":"";
		  		$data.="<option value=\"".$row['parishCode']."\" ".$selP.">".$row['ParishName']."</option>";
		  }
		  $data.="</select></td>
		
		 </tr>

 
 <tr class='evenrow'><td colspan='2'>Lead Farmer:</td><td colspan='2'><select name='leadfarmer' size='1' class='' id='leadfarmer'      style='width:200px;'>
          ";
		 
		  /* onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."',this.value,'".$_SESSION['gender']."',1,20);return false;\" 
		  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."',getElementById('').value,this.value,1,20);return false;\" 

		 if($leadfarmer=='0')$data.="<option value='0' selected >No</option><option value=''>-All-</option><option value='1' >Yes</option>";
		 else if($leadfarmer=='1')$data.="<option value='1' selected >Yes</option><option value=''>-All-</option><option value='0' >No</option>";
	else $data.="
	
	<option value=''>-All-</option>
	<option value='0' >No</option>
	<option value='1' >Yes</option>";


*/








function view_ParticipatingfarmersbyproducerOrganization($orgname,$orgtype,$farmerName,$district,$subcounty,$parish,$leadfarmer,$gender,$cur_page=1,$records_per_page=20){
$feedback = new xajaxResponse();
if($_SESSION['user_id']==''){
$feedback->redirect('index.php');
return $feedback;
} 
$n=1; $inc=1;


$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='1'  id='report'     width='100%' border='0'>
".filter_ParticipatingfarmersbyproducerOrganization()."
	  <tr>
        <th colspan='12' ><div align='center' class=''>Participating farmers by producer Organization</div></th>
        </tr>
      
      <tr>
	  <th colspan='2'>SELECT</th>
	  	<th colspan='2'><strong >farmer name</strong></th>
		<th ><strong class=''>GENDER</strong></th>
		<th  width=''><strong class=''>LEad Farmer</strong></th>
	  <th colspan='2' ><strong >ORGANIZATION NAME</strong></th>

        <th width='' '><strong class=''>district</strong></th>
	<th width='' '><strong class=''>subcounty</strong></th>
	<th width='' '><strong class=''>parish</strong></th>
		<th width=''><strong class=''>Village</strong></th></tr>";

$query_string="select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,
o.telephone,o.orgtype,o.email_address,o.village,
o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName,
f.`FarmerName`, f.`sex`, f.`LeadFarmer` from tbl_organization o  
join `tbl_farmerproductionrecords` f on(f.org_code=o.org_code)
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
where o.org_code like '".$_SESSION['orgname1']."%' 
&& o.orgtype like '".$_SESSION['orgtype1']."%' 
and gender like '".$_SESSION['gender']."%' 
and o.district like '".$_SESSION['districtName']."%' 
and lower(s.subcountyName) like '".strtolower($_SESSION['subcountyName'])."%' 
and lower(p.ParishName) like '".strtolower($_SESSION['ParishName'])."%' 
and lower(f.`LeadFarmer`) like '".strtolower($_SESSION['leadfarmer'])."%' 
and lower(f.`FarmerName`) like '%".strtolower($_SESSION['farmerName'])."%' 
OR lower(o.village) like '%".strtolower($_SESSION['farmerName'])."%'
group by f.`FarmerName` order by orgName Asc";

 #$feedback->alert($query_string);

$query_=@mysql_query($query_string)or die(http("STP-2614"));

$max_records = @mysql_num_rows($query_);
	
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1278));  



	  while($row=mysql_fetch_array($new_query)){
	 // $color=$n%2==1?"#e7d58f":"#ffffff";
	 //$feedback->ainclert($row[21]);
	 $div2="view_projectDetails_".$row['org_code'];
	 $sex=($row['sex']==2)?"<td>Female</td>":(($row['sex']==1)?"<td>Male</td>":"<td>-</td>");
	  $leadfarmer=($row['LeadFarmer']==0)?"<td>No</td>":(($row['LeadFarmer']==1)?"<td>Yes</td>":"<td>-</td>");
	  $color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#A9753A';\" >

	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' /></td><td>".$inc++."</td>
	  <td  colspan='2'>".$row['FarmerName']."</td>
	 ".$sex.$leadfarmer."
	 <td colspan='2'>".mysql_real_escape_string($row['orgName'])."</td>

	 <td>".checkExistance($row['districtName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['subcountyName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['ParishName'],NULL,'ExistsString')."</td>
	<TD>".checkExistance($row['village'],'','ExistsString')."</TD>
	</tr>
	  
	  
	  ";
	
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=6></td>
   </td><td colspan=6 align='right'>";
	
   
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;




		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$_SESSION['leadFarmer']."','".$_SESSION['gender']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$_SESSION['leadFarmer']."','".$_SESSION['gender']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$_SESSION['leadFarmer']."','".$_SESSION['gender']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$_SESSION['leadFarmer']."','".$_SESSION['gender']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'".$_SESSION['orgtype1']."','".$_SESSION['famerName']."','".$_SESSION['districtName']."','".$_SESSION['subcountyName']."','".$_SESSION['ParishName']."','".$_SESSION['leadFarmer']."','".$_SESSION['gender']."','".$cur_page."',this.value)\">";


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
$feedback->assign('bodyDisplay','innerHTML',$data);
return $feedback;
 }




function view_ParticipantsperTrainingArea($district,$quarter,$year){
$obj = new xajaxResponse();

$n=1; $inc=1;
/* $_SESSION['region']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['staffyear']=$year;
$_SESSION['staffQuarter']=$quarter; */


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>
  
  
	  
	 
<tr class='evenrow3'>
          <td width='30%' colspan='18'><div id='' style='float:right;'>
		  <a href='export_to_excel_word.php?linkvar=Export Participants per Training Area&&district=".$district."&&quarter=".$quarter."&&year=".$year."&&format=excel' > <input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='Export to Excel' /></a> | <a href='print_version2.php?linkvar=Print Participants per Training Area&&district=".$district."&&quarter=".$quarter."&&year=".$year."&&format=Print' target='_blank'><input type='button' class='formButton2'   id='button' value='Print Version'  /> </a></td></tr>
		  
		  <tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='15'><select name='project' style='width:300px;' onClick=\"xajax_view_ParticipantsperTrainingArea('".$year."','".$quarter."',this.value);return false;\"><option value=''>-All-</option>";
		 $yr=date('Y'); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='15'>
      <select name='quarter' id='quarter'  onClick=\"xajax_view_ParticipantsperTrainingArea('".$district."',this.value,'".$year."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
		  
	<tr class='evenrow3'>
          <td width='30%' colspan='3'>
          <div align='left'><strong>District:</strong></div></td>
          <td colspan=15><select name='project' style='width:300px;'  onchange=\"xajax_view_TrainingParticipants(this.value,'".$quarter."','".$year."');return false;\"><option value=''>-ALL-</option>";
		  $sql="select * from tbl_district order by districtName asc";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){
		$selected=($district==$ROW['districtCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['districtCode']."\" ".$selected." >".substr($ROW['districtName'],0,500)."</option>";}
		  $data.="</select></td>
        </tr>

<tr>
<th colspan='17'><center>TRaining Area</center></th>
  </tr>
  <tr>
    <th colspan='' rowspan='2'>NO</th>
    <th colspan='' rowspan='2'>District</th>
    <th colspan='2'>Hoe Basin</th>
    <th colspan='2'>ADP Ripping</th>
    <th colspan='2'>Mechanized Ripping</th>
    <th colspan='2'>Herbicide Safety and  use</th>
     <th colspan='2'>Tree Planting</th>
    <th colspan='2'>Others</th>
     <th rowspan='2'>% of Females</th>
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
     </tr>";
 
				/* $sql="select t.`training_id`, t.`org_code`,o.orgName, t.`village`, t.`semi_annual`, t.`year`, t.`training_topic`,c.topic, t.`trainer`, 
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
				 where t.status like 'Yes%' && t.org_code like '".$organization."%'"; */
				 $sql="
SELECT t.`training_id` , t.`org_code` , t.`semi_annual` , t.`year` , t.`district` , d.districtName, t.`subcounty` , t.`task` , t.village, t.`training_topic` , c.topic, t.`trainer` , t.`typeofparticipants` , t.`name_oftrainee` , t.`gender` , t.`number_of_times` , t.`organizing_date` , t.`updatedby` , t.`status` , sum( if( c.topic = 'Hoe Basin'
AND t.gender = 'M', 1,0 ) ) AS HomeBasinMale, sum( if( c.topic = 'Hoe Basin'
AND t.gender = 'F', 1,0 ) ) AS HomeBasinFemale, sum( if( c.topic = 'ADP Ripping'
AND t.gender = 'M', 1,0 ) ) AS ADPRippingMale, sum( if( c.topic = 'ADP Ripping'
AND t.gender = 'F', 1,0 ) ) AS ADPRippingFemale, sum( if( c.topic = 'Mechanized ripping'
AND t.gender = 'M', 1,0 ) ) AS MechanizedrippingMale, sum( if( c.topic = 'Mechanized ripping'
AND t.gender = 'F', 1,0 ) ) AS MechanizedrippingFemale, sum( if( c.topic = 'Herbicide safety and use'
AND t.gender = 'M', 1,0) ) AS HerbicidesafetyanduseMale, sum( if( c.topic = 'Herbicide safety and use'
AND t.gender = 'F', 1,0 ) ) AS HerbicidesafetyanduseFemale, sum( if( c.topic = 'Tree Planting'
AND t.gender = 'M', 1,0 ) ) AS TreePlantingMale, sum( if( c.topic = 'Tree Planting'
AND t.gender = 'F', 1,0 ) ) AS TreePlantingFemale, sum( if( c.topic = 'Others'
AND t.gender = 'M', 1,0 ) ) AS OthersMale, sum( if( c.topic = 'Others'
AND t.gender = 'F', 1,0 ) ) AS OthersFemale
,count(t.name_oftrainee) as totalNumberOfTrainees,
sum(if(t.gender='F',1,0)) as totalNumberOfFemales
FROM tbl_training t LEFT JOIN tbl_district d ON ( d.districtCode = t.district )
LEFT JOIN tbl_trainingtopic c ON ( c.code = t.training_topic )
WHERE d.districtName <>''
and t.district like '".$district."%'
and t.year like '".$year."%'
and t.semi_annual like '".$quarter."%'
group by t.district order by d.districtName asc
 ";
# $obj->alert($sql);
	 $query=@mysql_query($sql)or die(http("PR-918"));
	
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>

  <td colspan=''>".$n."</td>

    <td>".$row['districtName']."</td>
    <td align='left' colspan=1>".$row['HomeBasinMale']."</td>
 <td align='left' colspan='1'>".$row['HomeBasinFemale']."</td>
  <td align='left'>".$row['ADPRippingMale']."</td>
  <td align='left'>".$row['ADPRippingFemale']."</td>
  <td align='left'>".$row['MechanizedrippingMale']."</td>
   <td>".$row['MechanizedrippingFemale']."</td>
    <td align='left' colspan=1>".$row['HerbicidesafetyanduseMale']."</td>
 <td align='left' colspan='1'>".$row['HerbicidesafetyanduseFemale']."</td>
  <td align='left'>".$row['TreePlantingMale']."</td>
  <td align='left'>".$row['TreePlantingFemale']."</td>
  <td align='left'>".$row['OthersMale']."</td>
    <td align='left'>".$row['OthersFemale']."</td>
	<td align='left'><strong>".calc_Percentage($row['totalNumberOfTrainees'],$row['totalNumberOfFemales'])."%</strong></td>
  </tr>";
  $n++;
  }


 $data.="<tr class='evenrow'><td colspan='18'>".noRecordsFound($query,17)."</td></tr></table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
 


function view_FarmersProductionRecords($year,$quarter,$district){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
$inc=1;

//$_SESSION['quarter1']=($quarter<>'')?$quarter:$_SESSION['quarter'];
//$_SESSION['PMyear']=($year<>'')?$year:$_SESSION['Activeyear'];

#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'><tr class='evenrow'>
       
		  <td colspan='10' align='right'> <a href='export_to_excel_word.php?linkvar=Export Farmers Production Records Report&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Farmers Production Records Report&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='9'><select name='project' style='width:300px;' onClick=\"xajax_view_FarmersProductionRecords(this.value,'".$quarter."','".$district."');return false;\"><option value=''>-All-</option>";
		 $yr=date(Y); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='9'>
      <select name='quarter' id='quarter'  onClick=\"xajax_view_FarmersProductionRecords('".$year."',this.value,'".$district."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
			  
			  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan='9'>
      <select name='district' id='district'  onClick=\"xajax_view_FarmersProductionRecords('".$year."','".$quarter."',this.value);return false;\" style='width:300px;'>
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_district where entryType like 'District%' group by districtName order by districtName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  	  $seld=($row['districtCode']==$district)?"SELECTED":"";
  $data.="<option value=\"".$row['districtCode']."\" ".$seld." >".$row['districtName']."</option>";
  }
  $data.="
      </select></td>
			  
			  
			  
			  
			  <tr CLASS='evenrow'>
 
    <th colspan='9' ><center>Area under Production (Acreage)</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>
    
	<th>AREA* UNDER CROP lEGUMES (BEANS,SOYA BEANS)</th>

	<th>AREA* UNDER HOE BASINS</th>
	
	<th>AREA* UNDER adp RIPPING</th>
	
	<th>AREA* UNDER MECHANIZED RIPPING</th>
	
	<th>AREA* UNDER CF/CA</th>
	    <th>tOTAL AREA* UNDER CROP PRODUCTION</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, f.`FarmerName`,
	   	f.`sex`, f.`LeadFarmer`, sum(f.`Totalareaundercropproduction`) as Totalareaundercropproduction , sum(f.`AreaundercropLegumes`) as AreaundercropLegumes,
	   	sum(f.AreaunderHoebasins) as AreaunderHoebasins,
	  	f.`selling_pricehoebasin`, sum(f.`AreaunderADPripping`) as AreaunderADPripping , f.`cropadpripping`,
	   	f.`yieldcropadpripping`, f.`selling_pricecropadpripping`, sum(f.`AreaunderMechanizedripping`) as AreaunderMechanizedripping,
	   	f.`cropmechanized`, f.`yieldmechanized`, f.`selling_pricemechanized`, f.`doptedCF/CA`,
	    sum(f.`AreaunderCF/CA`) as AreaunderCF , f.`Herbicideuse`, f.`Burntcropresidues`, f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	 // $obj->alert($sql);
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>
	".loop_key('fid',$row['fid'])."
  <td>".$n."</td>
    <td>".$row['districtName']."</td>
    <td align='right'>".round($row['AreaundercropLegumes'],2)."</td>
    <td align='right'>".round($row['AreaunderHoebasins'],2)."</td>
       <td align='right'>".round($row['AreaunderADPripping'],2)."</td>
  <td align='right'>".round($row['AreaunderMechanizedripping'],2)."</td>
    <td align='right'>".round($row['AreaunderCF'],2)."</td>
    <td align='right'>".round($row['Totalareaundercropproduction'],2)."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_FarmersNotBurningCropResidues($year,$quarter,$district){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
$inc=1;

//$_SESSION['quarter1']=($quarter<>'')?$quarter:$_SESSION['quarter'];
//$_SESSION['PMyear']=($year<>'')?$year:$_SESSION['Activeyear'];

#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'><tr class='evenrow'>
       
		  <td colspan='10' align='right'> <a href='export_to_excel_word.php?linkvar=Export FarmersNotBurningCropResidues&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print FarmersNotBurningCropResidues&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='9'><select name='project' style='width:300px;' onClick=\"xajax_view_FarmersNotBurningCropResidues(this.value,'".$quarter."','".$district."');return false;\"><option value=''>-All-</option>";
		 $yr=date(Y); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='9'>
      <select name='quarter' id='quarter'  onClick=\"xajax_view_FarmersNotBurningCropResidues('".$year."',this.value,'".$district."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
			  
			  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan='9'>
      <select name='district' id='district'  onClick=\"xajax_view_FarmersNotBurningCropResidues('".$year."','".$quarter."',this.value);return false;\" style='width:300px;'>
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_district where entryType like 'District%' group by districtName order by districtName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  	  $seld=($row['districtCode']==$district)?"SELECTED":"";
  $data.="<option value=\"".$row['districtCode']."\" ".$seld." >".$row['districtName']."</option>";
  }
  $data.="
      </select></td>
			  
			  
			  
			  
			  <tr CLASS='evenrow'>
 
    <th colspan='9' ><center>Number of Farmers Not Burning Crop Residues</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>

	    <th># of Farmers Burning Crop Residues</th>
		    <th># of Farmers Not Burning Crop Residues</th>
		<th>% of Farmers Not Burning Crop Residues</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, f.`Herbicideuse`,
	   sum(if(f.`Burntcropresidues`=0,1,0)) as farmersnotBurningcropresidues,
	  sum(if(f.`Burntcropresidues`=1,1,0)) as farmersBurningcropresidues,
	  
	  
	   f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	 // $obj->alert($sql);
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $total=($row['farmersBurningcropresidues']+$row['farmersnotBurningcropresidues']);
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>
	".loop_key('fid',$row['fid'])."
  <td>".$n."</td>
    <td>".$row['districtName']."</td>
   
    <td align='right'>".$row['farmersnotBurningcropresidues']."</td>
       <td align='right'>".$row['farmersBurningcropresidues']."</td>
    <td align='right'>".intval(calc_Percentage($total,$row['farmersnotBurningcropresidues']))."%</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}





function view_FarmersUsingHerbicides($year,$quarter,$district){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
$inc=1;

//$_SESSION['quarter1']=($quarter<>'')?$quarter:$_SESSION['quarter'];
//$_SESSION['PMyear']=($year<>'')?$year:$_SESSION['Activeyear'];

#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'><tr class='evenrow'>
       
		  <td colspan='10' align='right'> <a href='export_to_excel_word.php?linkvar=Export FarmersUsingHerbicides&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print FarmersUsingHerbicides&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='9'><select name='project' style='width:300px;' onClick=\"xajax_view_FarmersUsingHerbicides(this.value,'".$quarter."','".$district."');return false;\"><option value=''>-All-</option>";
		 $yr=date(Y); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='9'>
      <select name='quarter' id='quarter'  onClick=\"xajax_view_FarmersUsingHerbicides('".$year."',this.value,'".$district."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
			  
			  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan='9'>
      <select name='district' id='district'  onClick=\"xajax_view_FarmersUsingHerbicides('".$year."','".$quarter."',this.value);return false;\" style='width:300px;'>
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_district where entryType like 'District%' group by districtName order by districtName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  	  $seld=($row['districtCode']==$district)?"SELECTED":"";
  $data.="<option value=\"".$row['districtCode']."\" ".$seld." >".$row['districtName']."</option>";
  }
  $data.="
      </select></td>
			  
			  
			  
			  
			  <tr CLASS='evenrow'>
 
    <th colspan='9' ><center>NUmber of Farmers Using Herbicides</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>
    <th># of Farmers Not Using Herbicides</th>
	    <th># of Farmers Using Herbicides</th>
		<th>% of Farmers Using Herbicides</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, 
	   sum(if(f.`Herbicideuse`=0,1,0)) as farmersnotUsingHerbicides,
	  sum(if(f.`Herbicideuse`=1,1,0)) as farmersUsingHerbicides,
	  
	  
	   f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	 // $obj->alert($sql);
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $total=($row['farmersnotUsingHerbicides']+$row['farmersUsingHerbicides']);
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>
	".loop_key('fid',$row['fid'])."
  <td>".$n."</td>
    <td>".$row['districtName']."</td>
    <td align='right'>".$row['farmersnotUsingHerbicides']."</td>
    <td align='right'>".$row['farmersUsingHerbicides']."</td>
      
    <td align='right'>".intval(calc_Percentage($total,$row['farmersUsingHerbicides']))."%</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}







function YieldsPerCrop($quarter,$year,$district){
$obj = new xajaxResponse();

$n=1; $inc=1;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='1000' id='report' border='0'>";
 
  $data.="
  
 <tr class='evenrow'>
       
		  <td colspan='12' align='right'> <a href='export_to_excel_word.php?linkvar=Export YieldsPerCrop&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print YieldsPerCrop&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='9'><select name='project' style='width:300px;' onClick=\"xajax_YieldsPerCrop(this.value,'".$quarter."','".$district."');return false;\"><option value=''>-All-</option>";
		 $yr=date(Y); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='9'>
      <select name='quarter' id='quarter'  onClick=\"xajax_YieldsPerCrop('".$year."',this.value,'".$district."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
			  
			  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan='9'>
      <select name='district' id='district'  onClick=\"xajax_YieldsPerCrop('".$year."','".$quarter."',this.value);return false;\" style='width:300px;'>
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_district where entryType like 'District%' group by districtName order by districtName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  	  $seld=($row['districtCode']==$district)?"SELECTED":"";
  $data.="<option value=\"".$row['districtCode']."\" ".$seld." >".$row['districtName']."</option>";
  }
  $data.="
      </select></td>
			  
			  
			  </tr>
	
<tr>
   
    <th colspan='12'><center>
      Yields Per Crop
    </center></th>
  </tr>
  <tr>
   
    <th colspan='2' rowspan='2'>District</th>
    <th colspan='2' rowspan='2'>Crop</th>
    <th colspan='2'>Hoe Basin</th>
    <th colspan='2'>ADP Ripping;</th>
    <th colspan='2'>Mechanized Ripping</th>
    
  </tr>
  <tr>
    <th width='12%'>Yields (Kgs)</th>
    <th width='9%'>Selling Price</th>
        <th width='15%'>Yields (Kgs)</th>
    <th width='7%'>Selling Price</th>
        <th width='7%'>Yields</th>
    <th width='9%'>Selling Price</th>
       
  </tr>";


$x="SELECT d.districtCode,d.districtName
		FROM `tbl_district` d inner join tbl_organization o on(d.districtCode=o.district)
		inner join `tbl_farmerproductionrecords` f on(f.org_code=o.org_code)
	 	where d.districtName <> ''
	   and d.districtCode like '".$district."%' 
	   and d.entryType like 'District%'
		group by d.districtCode
		order by d.districtName asc";
		  # $obj->addAlert($x);
		     $query1=mysql_query($x)or die(http("PR-0755"));
			 $m=1;
			 //if(mysql_num_rows($query1)>0){
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			
		  $color=$inc%2==1?"evenrow":"white1";

$data.="<tr class=$color>
<td colspan=12><strong><input type='hidden' name='cpa_id[]' id='cpa_id' value='".$rowi['districtCode']."' /><strong>".$rowi['districtName']."</strong></td>

    </tr>";


$sql="SELECT `fid`,  f.`org_code`,o.district,d.districtName, f.`FarmerName`, f.`sex`, f.`LeadFarmer`,c.crop_id,c.cropName, f.`Totalareaundercropproduction`, f.`AreaundercropLegumes`,f.AreaunderHoebasins, f.`crophoebasin`, f.`yieldhoebasin`, f.`selling_pricehoebasin`, f.`AreaunderADPripping`, f.`cropadpripping`, f.`yieldcropadpripping`, f.`selling_pricecropadpripping`, f.`AreaunderMechanizedripping`, f.`cropmechanized`, f.`yieldmechanized`, f.`selling_pricemechanized`, f.`doptedCF/CA`, f.`AreaunderCF/CA`, f.`Herbicideuse`, f.`Burntcropresidues`, f.`display`, f.`updatedby`, f.`lastupdated` 
		FROM `tbl_farmerproductionrecords` f
		 left join tbl_crops c on(c.crop_id=f.crophoebasin)
		left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
	 	where d.districtName <> '' and c.cropName <> ''
	   and o.district='".$rowi['districtCode']."' 
	   and f.year like '".$year."%'
	   and f.quarter like '".$quarter."%' 
	    and  f.display like 'Yes%' 
		group by c.cropName
		order by d.districtName,c.cropName asc";
	  //$obj->alert($sql);
 $query=mysql_query($sql)or die(http("2140"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    //".$n."
	
	$data.="<tr class='$color'>

  <td colspan=2 ></td>
<td colspan=2 align='left'>".$row['cropName']."</td>
<td align='right'>".$row['yieldhoebasin']."</td>
<td align='right'>".$row['selling_pricehoebasin']."</td>
<td align='right'>".$row['yieldcropadpripping']."</td>
<td align='right'>".$row['selling_pricecropadpripping']."</td>

    
<td align='right'>".$row['yieldmechanized']."</td>
<td align='right'>".$row['selling_pricemechanized']."</td>

  
  </tr>";
  $n++;
}

}
//<tr class='evenrow'><td colspan='18'>".noResultsFound()."</td></tr>
 $data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}





function view_NumberofFarmersandAreaunderAdoption($quarter,$year,$district){
$obj = new xajaxResponse();

$n=1; $inc=1;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='1000' id='report' border='0' cellspacing='1'>";
 
  $data.="
  
 <tr class='evenrow'>
       
		  <td colspan='16' align='right'> <a href='export_to_excel_word.php?linkvar=Export Number of farmers and area under adoption&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=excel'><input name='export_training' type='button' class='formButton2'   id='button' value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Number of farmers and area under adoption&&year=".$year."&&quarter=".$quarter."&&district=".$district."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'   id='button' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=3>
          <div align='left' ><strong>Year:</strong></div></td>
          <td colspan='13'><select name='project' style='width:300px;' onClick=\"xajax_view_NumberofFarmersandAreaunderAdoption('".$quarter."',this.value,'".$district."');return false;\"><option value=''>-All-</option>";
		 $yr=date('Y'); $end=$yr;
	do{
	$sel2=($year==$end)?"SELECTED":"";
	$data.="<option value=\"".$end."\" ".$sel2.">".$end."</option>";
	$end--;}while($end>= 2010);
		  $data.="</select></td>
	
        </tr>";
 
  $data.="<tr class='evenrow' ><td  colspan=3><strong>Period:</strong></td><td colspan='13'>
      <select name='quarter' id='quarter'  onClick=\"xajax_view_NumberofFarmersandAreaunderAdoption(this.value,'".$year."','".$district."');return false;\" style='width:300px;'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters group by britishSemiannual order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value=\"".$row2['britishSemiannual']."\" ".checkExistance($row2['britishSemiannual'],$quarter,'selected').">".$row2['britishSemiannual']."</option>";
	  }
              $data.="</select></td></tr>
			  
			  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan='13'>
      <select name='district' id='district'  onClick=\"xajax_view_NumberofFarmersandAreaunderAdoption('".$year."','".$quarter."',this.value);return false;\" style='width:300px;'>
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_district where entryType like 'District%' group by districtName order by districtName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  	  $seld=($row['districtCode']==$district)?"SELECTED":"";
  $data.="<option value=\"".$row['districtCode']."\" ".$seld." >".$row['districtName']."</option>";
  }
  $data.="
      </select></td>
			  
			  
			  </tr>
  <tr><th colspan='1' rowspan='3'>NO</th><th colspan='2' rowspan='3'>District</th>
    
    <th colspan='6'><center>Number of Farmers Adopting CF  <em>(CF=Conservation farming)</em></center></th>
    <th colspan='6'><center>Area under Adoption <em>(Acreage)</em></center></th>
  </tr>
  <tr>
    
    
    <th colspan='2'><center>Hoe CF</center></th>
    <th colspan='2'><center>ADP Ripping CF</center></th>
    <th colspan='2'><center>Mechanized Ripping CF</center></th>
    <th colspan='2'><center>Hoe CF</center></th>
    <th colspan='2'><center>ADP CF</center></th>
    <th colspan='2'><center>Mechanised CF</center></th>
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
  </tr>
";


/* $sql="SELECT `fid`,  f.`org_code`,o.district,d.districtName, `FarmerName`,
 
  `doptedCF/CA`, `AreaunderCF/CA`,  f.`display`, f.`updatedby`, f.`lastupdated`
   FROM `tbl_farmerproductionrecords` f 
	left join tbl_organization o on(o.org_code=f.org_code)
	  left join tbl_district d on(d.districtCode=o.district)
	 	where d.districtName <> ''
	   and o.district='".$rowi['districtCode']."' 
	   and f.year like '".$year."%'
	   and f.quarter like '".$quarter."%' 
	    and  f.display like 'Yes%' 
		group by o.district 
		order by d.districtName asc";
 */
$sql=" SELECT f.`fid` , f.`org_code` ,f.year, f.quarter,o.district, d.districtName, f.`FarmerName` ,
 sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderHoebasins <>0, 1, 0 ) ) AS adoptedcfHoeBasinMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderHoebasins <>0, 1, 0 ) ) AS adoptedcfHoeBasinFemale,
   sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderADPripping <>0, 1, 0 ) ) AS adoptedcfAreaunderADPrippingMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderADPripping <>0, 1, 0 ) ) AS adoptedcfAreaunderADPrippingFemale,
 sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderMechanizedripping <>0, 1, 0 ) ) AS adoptedcfAreaunderMechanizedrippingMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderMechanizedripping <>0, 1, 0 ) ) AS adoptedcfAreaunderMechanizedrippingFemale,


sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderHoebasins <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptioncfHoeBasinMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderHoebasins <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionHoeBasinFemale,
   sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderADPripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionADPrippingMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderADPripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionADPrippingFemale,
sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderMechanizedripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionMechanizedrippingMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderMechanizedripping <>0,f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionMechanizedrippingFemale
  
    , f.`display` , f.`updatedby` , f.`lastupdated`
FROM `tbl_farmerproductionrecords` f
LEFT JOIN tbl_organization o ON ( o.org_code = f.org_code )
LEFT JOIN tbl_district d ON ( d.districtCode = o.district )
WHERE f.display LIKE 'Yes%' and d.districtName <>''
and o.district like '".$district."%'
and f.year like '".$year."%'
and f.quarter like '".$quarter."%'
GROUP BY o.`district`
ORDER BY d.districtName ASC
";

	   
	 //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http("Project_results-1589"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";

    $data.="<tr class='$color'>
  	<td colspan='1' >".$n."</td>
    <td colspan=2>".$row['districtName']."</td>
    <td colspan=1 align='right'>".$row['adoptedcfHoeBasinMale']."</td>
	<td align='right'>".$row['adoptedcfHoeBasinFemale']."</td>
 	<td colspan='1' align='right'>".$row['adoptedcfAreaunderADPrippingMale']."</td>
	<td align='right'>".$row['adoptedcfAreaunderADPrippingFemale']."</td>
 	<td colspan=1 align='right'>".$row['adoptedcfAreaunderMechanizedrippingMale']."</td>
	<td align='right'>".$row['adoptedcfAreaunderMechanizedrippingFemale']."</td>
	
	<td colspan=1 align='right'>".$row['AreaunderAdoptioncfHoeBasinMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionHoeBasinFemale']."</td>
 	<td colspan='1' align='right'>".$row['AreaunderAdoptionADPrippingMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionADPrippingFemale']."</td>
 	<td colspan=1 align='right'>".$row['AreaunderAdoptionMechanizedrippingMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionMechanizedrippingFemale']."</td>
  	</tr>";
  	$n++;
	//$obj->alert($data1);
		}

  
 $data.="<tr class='evenrow'><td colspan='18'>".noRecordsFound($query,17)."</td></tr></table></form>";

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
<table width='800' id='report'>";
 
  $data.=filter_CFTechnicalTrainingActivitiesReport('ViewCFTechnicalTrainingActivities');
	 
$data.="
 <tr CLASS='evenrow'>
 
    <th colspan='14' ><center>TECHNICAL TRAINING ACTIVITIES</center></th>
	
  </tr>
	
	
	<tr><th colspan='2' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='2'>DISTRICT</th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF Herbicise Safety and Use</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='2'><center>Tree Planting</center></th>
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
	
	$querytrainees=mysql_query("select * from tbl_trainees order by Name asc")or die(http("PR-432"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
    $data.="<tr class='evenrow'>
	<td colspan='1'>".$rowparticipants['code']."</td>
  <td colspan='13'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewCFTechnicalTrainingActivities($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
    <td colspan='2'>
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
 
  </tr>";
    $n++;
  }
  		}


 $data.="".noRecordsFound($query,14)."";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//--------------------View Other Trainings----------------------

function ViewOtherTrainingActivities($region,$district,$indicator,$subcomponent,$output,$year,$quarter,$indicatorCode,$indicator,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}


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
 
  $data.=filter_OtherTrainingActivitiesReport('ViewOtherTrainingActivities');
	 
$data.="
 <tr CLASS='evenrow'>
 
    <th colspan='21' ><center>Other Famer Training and Tree Seedling Distribution conducted in each district</center></th>
	
  </tr>
	

	
	
	<tr><th colspan='2' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='2'>DISTRICT</th>
	<th colspan='2'><center>Training in IPM</center></th>
	<th colspan='2'><center>Training in Post Harvest Handling </center></th>
	<th colspan='2'><center>Business Training</center></th>
	<th colspan='2'><center>Seedling beneficiaries</center>
	<img src='images/spacer2.png' width='100' height='0.1'></th>
	<th colspan='2' rowspan='2'><center>No. of seedlings given out</center></th>
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
	
	
	  
	$sql=QueryManager::ViewOtherTrainingActivities($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
    <td colspan='2'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
    <td>".$row['MaleTraininginIPM']."</td>
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
  </tr>";
    $n++;
  }



 $data.="".noRecordsFound($query,14)."";
$data.="</table></form>";

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
<table width='800' id='report'>";
 
  $data.=filter_FieldDaysandDemonstrationsReport('ViewFieldDaysandDemonstrations');
	 
$data.="<tr CLASS='evenrow'>
 
    <th colspan='14' ><center>Field days and demonstrations </center></th>
	
  </tr>
	
	
	<tr>
	<th colspan='2' ROWSPAN='3'>No/Select</th>
	<th ROWSPAN='3' colspan='2'>DISTRICT</th>
	<th  colspan='6'><center>Field days conducted<center></th>
	<th colspan='2' rowspan='2'><center>demonstrations</center></th>
	
		</tr>
		
		<tr>
		<th  colspan='2'>District (Major) Field days</th>
		<th  colspan='2'>DC (Regular) Field days</th>
		<th  colspan='2'>PO (Specific) Field days</th>

	
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
		</tr>";  
	
	
	$sql=QueryManager::ViewFieldDaysandDemonstrations($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=Execute($sql)or die(http("PR-432"));
  while($row=FetchRecords($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
    <td colspan='2'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='fielddayIndicator[]' type='hidden' id='fielddayIndicator' value='".$row['fielddayIndicator']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
 <td align='right'>".$row['MaleDMajor']."</td>
    <td align='right'>".$row['FemaleDMajor']."</td>
	   <td align='right'>".$row['MaleDRegular']."</td>
	      <td align='right'>".$row['FemaleDRegular']."</td>
    <td align='right'>".$row['MalePOSpecific']."</td>
 <td align='right'>".$row['FemalePOSpecific']."</td>
  <td align='right'>".$row['MaleDemo']."</td>
  <td align='right'>".$row['FemaleDemo']."</td>
    </tr>";
    $n++;
  }
  


 $data.="".noRecordsFound($query,14)."";
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
 
  $data.=filter_AdoptionRatesReport('ViewAdoptionRates');
	 
$data.="
 <tr CLASS='evenrow'>
 
    <th colspan='22' ><center>CF/CA Adoption Rates (M=Male,F=Female,CF=Conservation Farming,CA=Conservation Agriculture)</center> </th>
	
  </tr>
	
	
	<tr><th colspan='2' ROWSPAN='3'>No/Select</th>
	
	<th ROWSPAN='3' colspan='2'>DISTRICT</th>
	<th colspan='6'><center>No. of farmers adopting</center></th>
	<th colspan='6'><center>Area under adoption</center></th>
	<th colspan='2' ROWSPAN='2'><center>Area under legumes</center>
	</th>
		<th colspan='2' ROWSPAN='2' ><center>Herbicide use</center></th>
	<th colspan='2' ROWSPAN='2' ><center>Not burning residue</center></th>

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
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	
	
	</tr>";  
	
	$querytrainees=mysql_query("select * from tbl_trainees order by code asc")or die(http("PR-432"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
    $data.="<tr class='evenrow'>

  <td colspan='22'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewAdoptionRates($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
    <td colspan='2'>
	<input name='loopkey[]' type='hidden' id='loopkey' value='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
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
  <td align='right'>".$row['FemaleResidues']."</td>
 
  </tr>";
    $n++;
  }
  		}
		

 $data.="".noRecordsFound($query,22);
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}










#************************************
$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body><table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">
<table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFFFFF" bordercolor="#CCCCCC"  style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#F0F0F0">&nbsp;</td>
    <td><?php require_once('connections/header.php'); ?></td>
    <td bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"  bgcolor="#F0F0F0">&nbsp;</td>
    <td width="76%" align="left" valign="top"><table cellspacing='0'      width="1011" border="0" bordercolor="">
      <tr>
        <td width="20%"  align="left" valign="top"><table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="80%" align="left" valign="top" style="text-align:justify; top:0px; ">
        
        <table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><div id="title">
      <?php title($_GET['linkvar'],$_GET['action']); ?>
    </div>
     
  
    <div id="bodyDisplay" align="left">
            <script language="JavaScript" type="text/javascript">
			<?php  $linkvar=$_GET['linkvar'];
			switch($linkvar){
			case"Annual Workplan":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewAnnualTargetsReport('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"Semi-Annual Performance":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewSemiAnnualPerfomanceReport('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"Annual Performance":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewAnnualPerfomanceReport('','','','','','','','','',1,20);
			<?php 
			break;
			
			case"Cumulative Achievement against LOP":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewCumulativePerfomanceReport('','','','','','','','','',1,20);
			<?php 
			break;
			case"CF/CA Adoption Rates":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			xajax_ViewAdoptionRates('','','','','','','','','',1,20);
			<?php 
			break;
			case"Field Days and Demos":
			?>
		  	//xajax_ViewAnnualTargets('','','','','',1,20);
			//xajax_ViewAdoptionRates('','','','','','','','','',1,20);
			xajax_ViewFieldDaysandDemonstrations('','','','','','','','','','',1,20);
			<?php 
			break;
			
			
			
			
			case"CARP PMP Indicator Tracker":
			?>
			xajax_view_CARPPMPIndicatorTracker('','','','','',1,20);
			<?php 
			break;
			case"CF Technical Training Activities":
			?>
			xajax_ViewCFTechnicalTrainingActivities('','','','','','','','','','',1,20);
			<?php 
			break;
			case"CF TOther Training Activitiesand Seedling Districtbution":
			?>
			xajax_ViewOtherTrainingActivities('','','','','','','','','','',1,20);
			<?php 
			break;
			
			
			
			
			
			case"Performance Report":
			?>
			 //xajax_view_NarrativequalitativeReport('','','','','');
			 xajax_view_qualitativeReporting('','','');
		
			<?php 
			break;
			case"View TSO Qualitative Reporting":
			?>
			xajax_viewQualiatativeTSOEntered('','','','');
			<?php
			break;
			case"TSO Quantitative Reporting":?>
			xajax_view_valueChainDevelopment('','','','','');
			//xajax_new_TSOquantitativeReporting('','','');
			<?php 
			case"Child Status Index":
		?>
				xajax_viewChildren();
		
			<?php
			break;
			
			
				case"OVC Services Register":
				 ?>
				 xajax_OVCServicesRegister('','','');

				  
			<?php
			break; 
			case"Area under Production":
			?>
			xajax_view_FarmersProductionRecords('','','');
			<?php
			break;
		
			
			case "Number of farmers and  area under adoption":
				 ?>
				
			xajax_view_NumberofFarmersandAreaunderAdoption('','','');
			<?php
			break; 
			case"Yields per Crop":
				 ?>
			xajax_YieldsPerCrop('','','');
			<?php
			break; 
			case"Training":
			 ?>
			xajax_view_training('');
			<?php
			break;
			case"Participating farmers by producer Organization":
			?>
		
			xajax_view_ParticipatingfarmersbyproducerOrganization('','','','','','','','',1,20);
			
			<?php
			break;
			case"Producer organizations by Location":
			?>
			xajax_view_organization('','','','','','',1,20);
			
			<?php
			break; 
			case"Participants per Training Area":
			 ?>
			xajax_view_ParticipantsperTrainingArea('','','');
			<?php
			break;
			case"No. of farmers not burning Crop Residues":
			 ?>
			xajax_view_FarmersNotBurningCropResidues('','','');
			<?php
			break;
			
			case"Number of farmers using herbicide":
			 ?>
			xajax_view_FarmersUsingHerbicides('','','');
			<?php
			break;
			
			case"Life of Projects Targets":
			 ?>
			xajax_ViewLOPTargets('','','','','',1,20);
			<?php
			break;
			
			
			
			
			
			default: ?>
			//xajax_view_NarrativequalitativeReport('','','','','');
				 //xajax_view_qualitativeReporting('','','');
			//xajax_OVCServicesRegister_summary('','');
 //xajax_view_staffActivity_reports('','','');
<?php } ?>

//xajax_OVCServicesRegister_summary('','');
    </script>
                  </div> </td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
    <td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" bgcolor="#F0F0F0">&nbsp;</td>
    <td height="38"><?php require_once('connections/footer.php'); ?></td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

