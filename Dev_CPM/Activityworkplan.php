<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************



#------------------end of CPM LOA Targets----------------------------
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets');
$xajax->register(XAJAX_FUNCTION,'new_annualTarget');
$xajax->register(XAJAX_FUNCTION,'edit_annualTarget');

$xajax->register(XAJAX_FUNCTION,'save_AnnualTargetExtended');
$xajax->register(XAJAX_FUNCTION,'update_annualTargetExtended');

#functions
#****************************
include('ActivitySave.php');
require_once('ActivityFilters.php');
require_once('ActivityEdit.php');
require_once('ActivityDelete.php');
#********************************************

function ViewAnnualTargets($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
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
$_SESSION['fyear']=($year==0)?$_SESSION['CPMactiveyear']:$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}
$n=1;
$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_annualTarget_2($fnctName="ViewAnnualTargets");

if($_GET['action']=='Reports'){
		$data.="";
		}else {
			$data.="<tr  class='evenrow'>
				<td colspan='13'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
				<input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' /> 
				<input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"xajax_delete_AnnualTargets(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>
			</tr>";
			}
			$data.="<tr>
				<th rowspan='2' class='dataRow' >NO/SELECT</th>
				<th rowspan=2 colspan='6' width='' class='dataRow'>Indicator</th>
				<th colspan='6' class='dataRow' ><center>Annual Targets</center></th>
			</tr>";
			$data.="<tr>
				<th  colspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
				<th  colspan='2' class='dataRow'>unit of measure</th>
				<th  class='dataRow'>Baseline</th>
				<th colspan='1' class='dataRow'>Total Targets</th>
			</tr>";

			$inc=1;
			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));
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
						  $events2="onmouseup=\"this.style.backgroundColor='#666666';\"";
						  
							$data.="<tr class=$color ".$events2.">
									<td align=left>
									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
									<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='2'>".$row['unitofmeasure']."</td>
									<td align=right ><strong>".number_format($base)."</strong></td>";
									$x=QueryManager::ViewAnnualTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
									//$obj->alert($x);					
									$yQuery=Execute($x) or die(http(__line__));
									$rowWP=FetchRecords($yQuery);
									
													$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$rowWP['workplan_id']."' >
													<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >
													<INPUT type='hidden' name='curr_year []'   id='curr_year ' value='".$rowWP['curr_year']."' >
													<INPUT type='hidden' name='semi_annual[]'   id='semi_annual' value='".$rowWP['semi_annual']."' >
													<INPUT type='hidden' name='DerivedWorkplanId[]'   id='DerivedWorkplanId' value='".$newId."' ><strong>".checkExistance($rowWP['totalAnnualTarget'],0,'ExistsInteger')."</strong>
													</td>";
							$data.="</tr>";
							$inc++;
					}		
				}
			
			$data.="".noRecordsFound($query,10)."";
		    if($_GET['action']=='Reports'){
			  $data.="";
			}else {
				$data.="<tr  class='evenrow'>
				<td colspan='17'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
				<input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' /> 
				<input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>
			</tr>";
			}
     
$data.="</table>
</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

//--------------WORKPLAN------------------------------------------------------------------------
function new_annualTarget($year,$region,$outcome,$output){
$obj=new xajaxResponse();
if(($_SESSION['quarter']=='Closed')||($_SESSION['CPMactiveyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed! Contact Your M&E Personnel to Open the Reporting period and Try Again!");
return $obj;
}

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
         
		
			<tr class='evenrow' > <td colspan='4'  align='left'>IR:</td><td colspan='13' >
			  <select name='outcome' id='outcome' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."',this.value,'".$output."');\" ><option value=''>-All-</option>";
			   //
				$data.=QueryManager::OutcomeFilter($outcome);
              $data.="</select></td></tr>
						<tr class='evenrow'>
              <td colspan='4'  align='left'>Sub-IR:</td><td colspan='13' >
			  <select name='output' id='output' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."','".$outcome."',this.value);\"    ><option value=''>-All-</option>";
				$data.=QueryManager::OutputFilter($outcome,$output);
              $data.="</select></td> </tr>
			    <tr class='displaynone'  >
			    <td colspan='4' ' align='left'>Region:</td><td colspan='13' >
			  <select name='zone' id='zone' style='width:400px;'   ><option value=''>-All-</option>";
			   //onchange=\"xajax_edit_annualTarget('".$formvalues."','".$year."','".$region."');\"
				$data.=QueryManager::ZoneFilter($region);
              $data.="</select></td>
                 
            </tr>
			  <tr class='evenrow'>
       		<td colspan='4'  align='left'>Activity Year:</td><td colspan='15' >
			  <select name='fyear' id='fyear' style='width:400px;'    ><option value=''>-All-</option>";
				$data.=QueryManager::YearFilter($year);
              $data.="</select></td>
			  </tr>
			  <tr class='displaynone'>
       		<td colspan='4'  align='left'>Reporting Period:</td><td colspan='15' >
			  <select name='quarter' id='quarter' style='width:400px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
              $data.="</select></td>
			  </tr>
			  
			
			  <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Semi-Annual Targets</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='1' class='dataRow' >SELECT</th>
			 <th rowspan='1' colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='150' height='0.1'></th>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
             
			
			
				  <th width='' class='dataRow'>Baseline</th>
				 
				   <th class='dataRow'  rowspan='1'>Total Annual Target</th>
            		
      	</tr>";
		
		    $inc=1;   $a=1;  		$m=1;

//and curr_year like '".$year."%'
$y="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.Target
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
  where i.output_id like '".$output."%'
  and curr_year like '".$year."%'
   group by i.indicator_id
  order by i.indicator_code asc";
$obj->alert($y);
		  $query2=@mysql_query($y)or die(http(__line__));
		
		 
		
		
		  while($row=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow":"white1";
		  switch($row['typeofDisaggregation'])
		  		{
				
		default:
		
		$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['Target']."'  onKeyPress='return numbersonly(event, false)'/></td>"; 
	
			$data.="</tr>";
		
		break;
		}
		  $inc++;
		$m++; 
		}
		  
	
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

function view_AnnualResults($org_code,$div,$indicator_type,$indicator,$year,$semi_annual,$quarter,$program,$subprogram,$cur_page=1,$records_per_page=20){

$obj=new xajaxResponse();
$_SESSION['orgName2']=$org_code;
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['subprogram']='';
$_SESSION['program']='';
$_SESSION['semiAnnual']='';
$_SESSION['quarterName']='';
$_SESSION['fyear']='';
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$_SESSION['subprogram']=$subprogram;
$_SESSION['program']=$program;
$_SESSION['indicator_name']=$indicator;
$_SESSION['quarterName']=($quarter=='')?$_SESSION['quarter']:$quarter;

//$_SESSION['semiAnnual']=(($_SESSION['quarterName']=='Jan - Mar') or ($_SESSION['quarterName']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";

$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action='?' method='post'><table cellspacing='1'  id='report'     width='100%' >".filter_annualResults()."


<tr  class='evenrow'>
     
    <td colspan='11'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('annualTarget1'));return false;\" value='Delete' class='redhdrs' /></td>
    
	
  </tr>
            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow'>&nbsp;</th>
              <th width='145' colspan='' class='dataRow'>&nbsp;</th>
              <th colspan='7' class='dataRow'>Annual Results/Progress Against Targets</th>
															</tr>
            <tr><th width='' class='dataRow'>SELECT</th>
			<th width='' colspan='3' width='' class='dataRow'>Indicator</th>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			<th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
			<th width='' colspan='' width='' class='dataRow'>Unit of Measure</th>
             <th width='' class='dataRow'>Baseline</th>
            		<th width='' class='dataRow'>Male</th>
					<th width='' class='dataRow'>Female</th>
			  			<th class='dataRow' colspan='' >Total</th></tr>";
$inc=1;

$x="select r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,i.unitofmeasure,i.typeofDisaggregation
from tbl_indicator i left outer join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
 WHERE i.indicator_type like '".$_SESSION['indicator_type']."%'
 and 	i.indicator_name like '".$_SESSION['indicator_name']."%'
  and 	r.semi_annual like '".$_SESSION['quarterName']."%'
  and r.org_code like '".$_SESSION['orgName2']."%'
  group by i.indicator_name,r.year,r.`semi_annual`,r.reportingPeriod order by i.indicator_code asc";
  //,r.year,r.`semi_annual`,r.reportingPeriod
//$obj->alert($x);
$query=mysql_query($x)or die(http("WP-543"));
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $l="align=right";
		  $events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";

$data.="<tr class='$color' ".$events2.">
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='checkbox' name='p_id[]'   id='p_id' value='".$row['id']."' >
".$inc."</td>
            <td align=left><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subact_id] >$row[indicator_code]</td>
            <td colspan='2' width='500'>$row[indicator_name]</td>
			<td align='left'>$row[indicator_type]</td>
			<td  align='left'>$row[typeofDisaggregation]</td>
			<td  align='left'>$row[unitofmeasure]</td>
			<td  align='right'>$base</td>
			<td align=right>$row[male]</td>
			<td align=right>$row[female]</td>
			<td align=right ><strong>$row[total]</strong></td>
        </tr>";
$inc++;
		  }
		


$data.="<tr><td>".noRecordsFound($query,11)."</td></tr>";
 $data.="<tr  class='evenrow'>
         <td colspan='11'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('annualTarget1'));return false;\" value='Delete' class='redhdrs' /></td>
    
	
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

function new_AnnualResults($year,$zone,$district,$outcome,$output,$quarter){
$obj=new xajaxResponse();
if($_SESSION['username']==NULL){
$obj->redirect('index.php');
return $obj;
}

$_SESSION['subcomponent_id']=$outcome;
$_SESSION['output_id']=$output;

if($quarter<>$_SESSION['quarter']){
	$obj->alert($quarter. " is not open For Reporting please Try ".$_SESSION['quarter']);
	return $obj;
	}




$reportTitle=($_SESSION['quarter']=='Apr - Sep')?"Annual Targets $year": "Annual Targets Year .$year+1";


//else
$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
<tr class='evenrow'>
              <td colspan='2'>Output:</td>
			  
              <td colspan='11'><select name='subcomponent' class='combobox' id='subcomponent' 
			  onChange=\"xajax_new_AnnualResults('".$year."','".$zone."','".$district."',this.value,'".$_SESSION['output_id']."','".$_SESSION['quarter']."');return false;\">";
$data.="<option value=''>-All-</option>"; 
			$data.=QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Activity:</td>
              <td colspan='11'><select name='output' class='combobox'  id='output'   onChange=\"xajax_new_AnnualResults('".$year."','".$zone."','".$district."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['quarter']."');return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::OutputFilter($_SESSION['subcomponent_id'],$_SESSION['output_id']);
$data.="</select></td>
        </tr>
         <tr class='evenrow'>
       
        
              <td colspan='4' class='evenrow' align='center'>Project Year:</td>
			  <td colspan='4' >
			  <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($year);
              $data.="</select></td>
			  <td colspan='2' class='evenrow' align='center'>RP/Season:</td>
			  <td colspan='6' >
			  <select name='semiAnnual' id='semiAnnual' style='width:200px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
              $data.="</select></td>
             
            </tr>
			<tr class='".$zoneAndDistrict."'>
       
        
              <td colspan='4' class='evenrow' align='center'>Region:</td>
			  <td colspan='4' >
			  <select name='zone' id='zone' style='width:200px;'  ><option value=''>-All-</option>";
					$data.=QueryManager::ZoneFilter($zone);		
              $data.="</select></td>
			  <td colspan='2' class='evenrow' align='center'>District:</td>
			  <td colspan='6' >
			  <select name='district' id='district' style='width:200px;'  >
			  <option value=''>-All-</option>";
					$data.=QueryManager::DistrictFilter($zone,$district);
              $data.="</select></td>
             
            </tr>
			
		<tr><th rowspan='2' class='dataRow' >SELECT</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
			
		<th colspan='7' class='dataRow' ><center>".$reportTitle."</center></center></th>
		
		<th class='dataRow'  rowspan='2'>Total Actual</th>
			</tr>
			<tr>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='2' width='' class='dataRow'>Disaggregation</th>
             
		
				  <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>
				 
            		
      	</tr>";
		
		    $inc=1;   $a=1;  		$m=1;

//$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
//$obj->alert(count($formvalues['indicator_idAll']));
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
return $obj;
}
/* if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please Filter out the Categories and Select Indicators For Capturing/Editing Achievements");
return $obj;
}
else */
//for($x=0;$x<count($formvalues['indicator_idAll']);$x++){

//and i.responsible='".$reportingType."'
			//$y=QueryManager::EditAnnualResults($formvalues['indicator_idAll'][$x],$year);
			$y="select i.indicator_type,i.indicator_id,i.responsible,i.indicator_code,i.indicator_name,
						i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation
						 from  tbl_indicator i 
						   where i.output_id like '".$_SESSION['output_id']."%'
						  and i.responsible<>'Managers'
						  group by i.indicator_id
						  order by i.indicator_code asc 
						  ";
			
			//$obj->alert($y);
		  $query2=@Execute($y)or die(http("ED-791"));
		 
		 
		
		
		  while($row=@FetchRecords($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  
		  switch($row['typeofDisaggregation']){
					case "None":
							
$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";
				
		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
			
			onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>"; 
	
			$data.="</tr>";
			

								break;
								case "Male and Female":
								
								//-Male Female Oct March=--------------------=

$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."' onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
		readonly='readonly' class='evenrow' value='N/A'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"  
		
		 /></td>
		</tr>";
								break;
								default:
								
							
$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";
				
		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
			 
			 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		"; 
	
			$data.="</tr>";
			

	break;
					}
					
		  
		  
		
		  $inc++;$m++;
		
		}
		  
		  //}
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
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
	<script type="text/javascript" src="js/calc.js"></script>
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>CPM PMT Annual Targets Setup...</span></div>
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
						case "Annual Workplan": 
					?>
					xajax_ViewAnnualTargets('','','','','','','','','',1,20);
					<?php
					break;
						case "Project Life Targets": 
					?>
					xajax_ViewLOPTargets('','','','','',1,20);
					<?php
					break;
						case "Progress Against Targets (HO)": 
					?>
					xajax_view_AnnualResultsHO('','','','','','','','','',1,20);
					<?php
					break;
						case "Progress Against Targets": 
					?>
					xajax_view_AnnualResultsReportLog('','','',1,20);
						  
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

