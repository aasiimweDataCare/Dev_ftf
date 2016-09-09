<?php 


//**********************************************************************************************
//--------------WORKPLAN------------------------------------------------------------------------
function edit_annualTarget($formvalues,$year){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');

switch($year){
	
	case $year=='':
	$obj->alert("Please select a Financial year to continue...");
	return $obj;
	break;
	
	case $year==0:
	$obj->alert("Please select a Financial year to continue...");
	return $obj;
	break;
	
	case $year==NULL:
	$obj->alert("Please select a Financial year to continue...");
	return $obj;
	break;
	case $year==' ':
	$obj->alert("Please select a Financial year to continue...");
	return $obj;
	break;
	
	default:
	break;
	
}



$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
         <tr>
       
        
              <th colspan='2' class='evenrow2' align='center'>Financial Year:</th><th colspan='2' >
			  <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::YearFilter($year);
              $data.="</select></th><th colspan='13' ></th>
             
            </tr>
 <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Annual Targets</center></th>
															</tr>
            
			<tr><th rowspan='2' class='dataRow' >SELECT</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 <th colspan='4' class='dataRow' ></th>
			<th class='dataRow'  rowspan='2'>Total Annual Target</th>
			</tr>
			<tr>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
             <th width='' class='dataRow'>Baseline</th>
			     	</tr>";
		
		    $inc=1;
			$a=1;  		
			$m=1;

if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please filter out the Categories and Select Indicators For Setting/Editing Targets");
return $obj;
}
else
for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
$y=QueryManager::ViewAnnualTargets($year,$_SESSION['semiAnnual'],$formvalues['indicator_idAll'][$x]);
$query2=@mysql_query($y)or die(http(__line__));

while($row=@mysql_fetch_array($query2)){
	$color=$inc%2==1?"evenrow":"white1";
		  switch($row['typeofDisaggregation'])
		  		{
				
		default:
		
		$data.="<tr class='".$color."'>";
			$data.="<td width='25'>".$row['indicator_code']."</td>";
			$data.="<td colspan='4'>
						<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
						<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
						<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".(mysql_real_escape_string(trim($row['indicator_name'])))."</td>";
			$data.="<td align='left' colspan='1'>".$row['indicator_type']."</td>";
			$data.="<td align='left'>".$row['unitofmeasure']."</td>";
			$data.="<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >".$row['typeofDisaggregation']."</td>";
			$data.="<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
			$data.="<td><input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'  /></td>"; 
		$data.="</tr>";
		
		$i=1;
		
				/* start of SubIndicator-Rows */
				$s_cpmSubIndicators=$qmobj->cpmSubIndicatorsOnly($row['indicator_id']);
				$q_cpmSubIndicators=@Execute($s_cpmSubIndicators)or die(http(__line__));
				while($rowCpm=@FetchRecords($q_cpmSubIndicators)){
					if($rowCpm['otherMeasures']==''){
						
					}else{
						/* Start display of dissggregations */
									$data.="<tr style='".$color2."'>
									   <td align='left'>&nbsp;</td>
									   <td align='right'><img src='' height='0.2' width='25'/>
									   
									   <INPUT type='hidden' name='subLoopkey[]'  id='subLoopkey' value='1' >
									   <INPUT type='hidden' name='sub_indicator_id[]'  id='sub_indicator_id' value='".$rowCpm['sub_indicatorId']."' >
									   <INPUT type=hidden name='indicator[]'  id='indicator'  value='".$rowCpm['indicator_id']."' />".$i.".</td>
									   <td colspan='2'>".$rowCpm['otherMeasures']."</td>
									   <td colspan='2' align='left'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									   <td colspan='2' align='left'>".$row['unitofmeasure']."</td>
									   <td align='right'><input name='Sub_baselinevalue[]' type='text' id='baselinevalue".$i."' size='20' value='".$rowCpm['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
									   
									    $s_cpmSubTarget=$qmobj->cpmSubIndicatorsByYear($row['indicator_id'],$rowCpm['sub_indicatorId'], $row['curr_year']);
										$q_cpmSubTarget=@Execute($s_cpmSubTarget)or die(http(__line__));
										$rowT=@FetchRecords($q_cpmSubTarget);
										$subIndTarget=(($rowT['Target']<>'' || $rowT['Target']<>null)?$rowT['Target']:0);
										$data.="<td align='right'><input name='Sub_target[]' type='text' id='target".$i."' size='20' value='".$subIndTarget."'  onKeyPress='return numbersonly(event, false)'/></td>";
									$data.="</tr>";
									
									
									}
									
									$i++;
									}
									

									//End of dissggregations
	
		
		break;
		}
		  $inc++;
		
		}
		  
		 $m++; }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//-----------------update annualtargets---------
function update_annualTargetExtended($formvalues){
$obj=new xajaxResponse();
	$fyear=$formvalues['fyear'];
	for($i=0;$i<count($formvalues['indicator_id']);$i++){
		$indicator=$formvalues['indicator_id'][$i];
		$baseline=$formvalues['baselinevalue'][$i];
		$workplan_id=$formvalues['workplan_id'][$i];
		$target=$formvalues['target'][$i];
		$other2=$formvalues['other'][$i];
		$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
		
				 if($target<>NULL){



				switch($typeofDisaggregation)
				{
				
				default:
				$updateIndicator="UPDATE tbl_indicator set baseline='".$baseline."',updatedby='".$_SESSION['username']."' WHERE indicator_id='".$indicator."'";
				$updateTarget="UPDATE tbl_workplan set curr_year='".$fyear."',other='".$other2."',
				 				Target='".$target."',lastUpdatedby='".$_SESSION['username']."' WHERE indicator_id='".$indicator."' and workplan_id='".$workplan_id."'";

				 // $insert2="INSERT INTO tbl_workplan(indicator_id,semi_annual,curr_year,Target,lastUpdatedby) 
				 // 				values('".$indicator."','".$_SESSION['quarter']."','".$fyear."','".$target."','".$_SESSION['username']."')
				 // 				ON DUPLICATE KEY UPDATE curr_year='".$fyear."',other='".$other2."',
				 // 				Target='".$target."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";
				
				
															
				}

						//$obj->alert($updateTarget);
						 @mysql_query($updateIndicator)or die(http(__line__));
						 @mysql_query($updateTarget)or die(http(__line__));
						
						

						



		}
		
	
				 

	}
	
//Start of the disaggregated indicators
		for($d=0;$d<count($formvalues['subLoopkey']);$d++){
			
		$indicator_id=$formvalues['indicator'][$d];
		$sub_indicatorId=$formvalues['sub_indicator_id'][$d];
		$Sub_baselinevalue=$formvalues['Sub_baselinevalue'][$d];
		$Sub_target=$formvalues['Sub_target'][$d];
		
				 if($Sub_target<>NULL){
					 
					 $updateSubIndicator="UPDATE tbl_sub_indicator set baseline='".floatval(trim($Sub_baselinevalue))."', baselineYear='".$fyear."', updatedby='".$_SESSION['username']."' WHERE sub_indicatorId='".$sub_indicatorId."' and indicator_id='".$indicator_id."'";
					// $updateSubIndicator="UPDATE tbl_workplan_sub set curr_year='".$fyear."',Target='".$Sub_target."',lastUpdatedby='".$_SESSION['username']."' WHERE sub_indicatorId='".$sub_indicatorId."' and indicator_id='".$indicator_id."'";


					  $insert3="INSERT INTO `tbl_workplan_sub`(`indicator_id`, `sub_indicatorId`,`curr_year`, `semi_annual`,`Target`,`lastUpdatedby`) 
						 	VALUES ('".$indicator_id."','".$sub_indicatorId."','".$fyear."','".$_SESSION['quarter']."','".$Sub_target."','".$_SESSION['username']."')
							ON DUPLICATE KEY UPDATE curr_year='".$fyear."',Target='".$Sub_target."',indicator_id='".$indicator_id."',sub_indicatorId='".$sub_indicatorId."',lastUpdatedby='".$_SESSION['username']."'";
				
						@mysql_query($updateSubIndicator)or die(http(__line__));
						@mysql_query($insert3)or die(http(__line__));
						
						


		}
		
		}
		//End of the disaggregated indicators		
	
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_ViewAnnualTargets",'','','','','','','','','',1,20);
return $obj;
}



#----------------------LOP Targets----------------------------------------


function edit_LOPTarget($formvalues){
$obj=new xajaxResponse();

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='800' border='0'>
         <tr>
       
        
              <th colspan='10' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of Project Targets</center></th>
             
            </tr>
            <tr class=evenrow>
            <th width='25' class='dataRow'>Code</th>
              
			  <th width='' class='dataRow' colspan='3' >Indicator</th>
			  <th width='55' class='dataRow' align='right'>Unit of Measure</th>
			  <th width='55' class='dataRow' align='right'>disaggregation</th>
			  <th width='55' class='dataRow' align='right'>Male</th>
			  <th width='55' class='dataRow' align='right'>Female</th>
			  <th width='55' class='dataRow' align='right'>Other</th>
			  <th width='55' class='dataRow' align='right'>Total Life of Project Target</th>
			
			  
             
            </tr>";
//$obj->alert(count($formvalues['workplan_id']));
//$obj->alert(count($formvalues['loopkey']));
$m=1;

if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please Filter out the Categories and Select Indicators For Setting/Editing LOP Targets");
return $obj;
}
else

for($x=0;$x<count($formvalues['indicator_idAll']);$x++){

$y="select w.workplan_id,w.Target,i.indicator_id,i.indicator_code,i.indicator_name,i.unitofmeasure,i.typeofDisaggregation
  from tbl_indicator i left join  tbl_loptargets w
  on(i.indicator_id=w.indicator_id) 
  where i.indicator_id='".$formvalues['indicator_idAll'][$x]."' group by i.indicator_id";
  //$obj->alert($y);
		$query2=@mysql_query($y)or die(http("ED-150"));
		
		 
		  $inc=1;
		  $a=1;
		 while($rowTarget=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  switch($rowTarget['typeofDisaggregation'])
		  		{
				case "None":
				
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  type='text' value='".$rowTarget['other']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				break;
				case "Male and Female":
				
				
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' value='".$rowTarget['male']."' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' value='".$rowTarget['female']."' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" class='evenrow' readonly='readonly' value='N/A' type='text'  id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				break;
				default:
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  type='text' value='".$rowTarget['other']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				
				
				
				break;
				}
				  
		 $inc++;
		
		}
		 $m++; 
		  } 
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//---------update annualtargets----------------------------------------------------------------
function update_LOPTargetExtendedOldBackup($formvalues){
$obj=new xajaxResponse();
for($i=0;$i<count($formvalues['loopKey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$baseline=$formvalues['baselinevalue'][$i];
$workplan_id=$formvalues['workplan_id'][$i];
$typeofDisaggregation=$formvalues['typeofDisaggregation'][$i];
$male=$formvalues['male'][$i];
$female=$formvalues['female'][$i];
$other=$formvalues['other'][$i];
$total=$formvalues['target'][$i];

if($total!=''){

		switch($typeofDisaggregation)
		{
		case"None":
$insert="INSERT INTO tbl_loptargets(indicator_id,otherTargets,Target,lastUpdatedby) 
values('".$indicator."','".$other."','".$total."','".$_SESSION['username']."')
ON DUPLICATE KEY UPDATE period='5',otherTargets='".$other."',
Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";
		break;
		case "Male and Female":
		$insert="INSERT INTO tbl_loptargets(indicator_id,male,female,otherTargets,Target,lastUpdatedby) 
values('".$indicator."','".$male."','".$female."','".$other."','".$total."','".$_SESSION['username']."')
ON DUPLICATE KEY UPDATE period='5',male='".$male."',female='".$female."',otherTargets='".$other."',
Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";
		
		
		break;
		default:
		
			$insert="INSERT INTO tbl_loptargets(indicator_id,otherTargets,Target,lastUpdatedby) 
values('".$indicator."','".$other."','".$total."','".$_SESSION['username']."')
ON DUPLICATE KEY UPDATE period='5',otherTargets='".$other."',
Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";

		
		//$obj->alert("The Type of Disaggregation of Your Indicators are unknown.Update Aborted!");
		//return $obj;
		}
// WHERE workplan_id='".$workplan_id."'
$query=@mysql_query($insert)or die(http("Edit-201"));

//$obj->alert($insert);

}

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
return $obj;
}





function edit_LOPTargetBackup($formvalues){
$obj=new xajaxResponse();

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'   id='report'   width='100%' border='0'>
         <tr>
       
        
              <th colspan='11' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of ASARECA Targets</center></th>
             
            </tr>
            <tr class=evenrow>
            <th width='25' class='dataRow'>indicator Code</th>
              
			  <th width='' class='dataRow' colspan='3' >Indicator</th>
			  <th width='55' class='dataRow' align='right'></th>";
			  
			  	 $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<td width='100' class='evenrow2' colspan='1' align='right'>".$n."</td>";
		}
			  
			  $data.="</tr>";
			  //$obj->alert(count($formvalues['workplan_id']));
//$obj->alert(count($formvalues['loopkey']));

for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
$indicator_id=$formvalues['indicator_idAll'][$x];
$workplan_id=$formvalues['workplan_id'][$x];
if($workplan_id<>NULL){
$y="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, w.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,

max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
sum( w.`Target` ) AS LOPTarget, w.`display`
FROM tbl_indicator i
LEFT JOIN `tbl_loptargets` w ON ( w.indicator_id = i.indicator_id )
WHERE w.indicator_id='".$indicator_id."'
 GROUP BY w.indicator_id
ORDER BY i.indicator_code ASC";
}else {

$y="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, w.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,

max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
sum( w.`Target` ) AS LOPTarget, w.`display`
FROM tbl_indicator i
LEFT JOIN `tbl_loptargets` w ON ( w.indicator_id = i.indicator_id )
WHERE i.indicator_id='".$indicator_id."'
 GROUP BY w.indicator_id
ORDER BY i.indicator_id,i.indicator_code ASC";


}
  //$obj->alert($y);
		$query2=@mysql_query($y)or die(http("ED-150"));
		
		 
		  $inc=1;
		  $a=1;
		 while($rowTarget=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=".$color.">
 <td width='25' >".$rowTarget['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >
			<INPUT type='hidden' name='loopkey[]'  id='loopkey' value='1' >
			<INPUT type='hidden' name='workplan_id[]'  id='workplan_id' value='".$rowTarget['workplan_id']."' >
			".$rowTarget['indicator_name']."</td>";
			$data.="<td><INPUT type='text' name='qtr1[]' size='15'  id='qtr1".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year1']."' ></td>
			<td><INPUT type='text' name='qtr2[]' size='15'  id='qtr2".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year2']."' ></td>
			<td><INPUT type='text' name='qtr3[]' size='15' id='qtr3".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year3']."'></td>
			<td><INPUT type='text' name='qtr4[]' size='15' id='qtr4".$a."' onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year4']."' ></td>
			<td><INPUT type='text' name='qtr5[]' size='15' id='qtr5".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['Year5']."' ></td>";
		
		//$obj->alert($data1);
	//}
		
		//---------------end------------------	
			$data.="</tr>";
            $a++;
		}
		
		  } 
	$data.="<tr class='evenrow'>
  
            <td colspan='11' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" class='formButton2' /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


//---------update annualtargets----------------------------------------------------------------
function update_LOPTargetExtended($formvalues){
$obj=new xajaxResponse();
/* for($i=0;$i<count($formvalues['loopKey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$baseline=$formvalues['baselinevalue'][$i];
$workplan_id=$formvalues['workplan_id'][$i];
$total=$formvalues['target'][$i];

if(($total!='')){
if($workplan_id==''){
$insert="INSERT INTO tbl_loptargets(period,indicator_id,Target,lastUpdatedby) 
values('5','".$indicator."','".$total."','".$_SESSION['username']."')ON DUPLICATE KEY UPDATE period='5',Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."'";
// WHERE workplan_id='".$workplan_id."'
$query=@mysql_query($insert)or die(http("Edit-201"));
}
else{
$insert1="UPDATE tbl_loptargets set  period='5',Target='".$total."',indicator_id='".$indicator."',lastUpdatedby='".$_SESSION['username']."' where workplan_id='".$workplan_id."'";
$query=@mysql_query($insert1)or die(http("Edit-201"));
}
#$obj->alert($insert);
#$obj->alert($insert1);

}else{} 


} */




for($i=0;$i<count($formvalues['loopkey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$workplan_id=$formvalues['workplan_id'][$i];
$baseline=$formvalues['base'][$i];
$qtr1=$formvalues['qtr1'][$i];
$qtr2=$formvalues['qtr2'][$i];
$qtr3=$formvalues['qtr3'][$i];
$qtr4=$formvalues['qtr4'][$i];
$qtr5=$formvalues['qtr5'][$i];

$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));



if($workplan_id<>''){
$sql="update tbl_loptargets set Target='".$qtr1."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'";

$query=@mysql_query($sql) or die(http("WP-42"));
@mysql_query("update tbl_loptargets set Target='".$qtr2."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'") or die(http("WP-42"));
@mysql_query("update tbl_loptargets set Target='".$qtr3."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'") or die(http("WP-42"));
@mysql_query("update tbl_loptargets set Target='".$qtr4."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'") or die(http("WP-42"));
@mysql_query("update tbl_loptargets set Target='".$qtr5."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'") or die(http("WP-42"));

/* if(@mysql_num_rows($query)>0){


$insert1="replace INTO tbl_loptargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
values('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."','".$indicator."','".$qtr1."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."','".$indicator."','".$qtr2."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."','".$indicator."','".$qtr3."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."','".$indicator."','".$qtr4."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."','".$indicator."','".$qtr5."','".$_SESSION['username']."','".$baseline."')
";
$query1=@mysql_query($insert1)or die(http("Save-59"));
//$obj->alert($insert1);
 */}
else {

$insert2="INSERT INTO tbl_loptargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
values('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."','".$indicator."','".$qtr1."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."','".$indicator."','".$qtr2."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."','".$indicator."','".$qtr3."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."','".$indicator."','".$qtr4."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."','".$indicator."','".$qtr5."','".$_SESSION['username']."','".$baseline."')
";
$query2=@mysql_query($insert2)or die(http("Save-235"));

//$obj->alert($insert2);
}

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
return $obj;
}


//-----------------edit-indicator_Definition---------------------------------------------------

//-----------------------update tbl_indicator_defn---------------------------------------------------

#------------------update indicatorDefinition--------------------------------------------------------

function update_indicatorDefinition($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['defn_id']);$i++){

$defn=mysql_real_escape_string($formvalues['definition'][$i]);
$defn_id=trim($formvalues['defn_id'][$i]);
$output=trim($formvalues['output'][$i]);
$definition=trim($formvalues['definition'][$i]);


$xx="update tbl_indicator_definition
 set DefName = '".$definition."',
 expected_output='".$output."'
 where defn_id='".$defn_id."'";
 //$obj->alert($xx);
@mysql_query($xx)or die(http("ED-097"));
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data updated!"));
$obj->call("xajax_view_indicatorDefintion",'','','','','',1,20);
return $obj;
}




//--------------------mer layout setup---------------------------------------------------------

//----------------------update supergoal---------------------------

function edit_supergoal($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Programme</div>
         <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['prog_id']);$m++){
$prog_id=$formvalues['prog_id'][$m];

$x="select * from tbl_programme where prog_id='".$prog_id."' order by prog_id asc";
//$obj->addAlert($x);
$query=mysql_query($x)or die(mysql_error());
 
while($row=mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
              <tr>
                <td>Program Name:</td>
                <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><input name='pname[]' type='text' id='pname' value='$row[program_name]' size='50' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><input name='pfunder[]' type='text'  id='pfunder' value='$row[Funder]' size='50' /></td>
              </tr>
			  <tr>
                <td>Implementing Organization:</td>
                <td><input name='imp_org[]' type='text'  id='imp_org' value='$row[imp_org]' size='50' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='48' rows='3'>$row[details]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
              </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;


}




function update_supergoal($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['prog_id']);$i++){
$prog_id=$formvalues['prog_id'][$i];
$pname=$formvalues['pname'][$i];
$pfunder=$formvalues['pfunder'][$i];
$imp_org=$formvalues['imp_org'][$i];
$pdesc=$formvalues['pdescription'][$i];
$x1="select * from tbl_programme where prog_id='".$prog_id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
#$obj->addAlert($x);
if(mysql_num_rows($select)>0){
$x="update tbl_programme set program_name='".$pname."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";
@mysql_query($x) or die(http("ED-0159"));

//$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
//audit info----
//$table_pk_id='id';
$ch=mysql_fetch_array(mysql_query("SELECT concat_ws( prog_id, program_name,Funder,details ) as changed_from
FROM `tbl_programme`
WHERE prog_id ='".$prog_id."'")) or die(http("ED-0183"));
$changed_from=$ch['changed_from'];
$changed_to=$prog_id."-".$pname."-".$imp_org."-".$pdesc;
$obj->addEvent('','onsubmit',audit_trail("prog_id",$prog_id,$$x,"tbl_programme",$changed_from,$changed_to));

//---------end of audit info---
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_supergoal",'','');
return $obj;
}






function edit_subcomponent($formvalues){
$obj=new xajaxResponse();
$data="<form method=post name='subcomponent' id='subcomponent'><table border='0'><tr >
                      <td colspan='3'><div id='status'></div></td>
                    </tr>
					<tr>
					 <th>NO</th> 
                      <th>PROGRAM</th> <th>SUB-PROGRAM CODE</th> <th>SUB-PROGRAM</th>
                    </tr>";
 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $id=$formvalues['subcomponent_id'][$m];
 $x="select * from tbl_subcomponent where subcomponent_id='".$id."'";
 #$obj->addAlert($x);'
 $n=1;
$q=mysql_query($x)or die(http("ED-0014"));
while($row=mysql_fetch_array($q)){
$color=($n%2==1)?"evenrow3":"white1";
					$data.=" 
                    <tr class='$color'>
                   <td>".$n."</td>
                      <td><input type='hidden' name='subcomponent_id[]' id='subcomponent_id' value='".$row['subcomponent_id']."'><select name='programme[]' id='programme'>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(http("ED-024"));
					 while($rowp=mysql_fetch_array($query)){
					 $selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['program_name']."</option>";
				
					   }
$data.="  </select></td>
<td><input name='subcomponent_code[]' type='text' id='subcomponent_code' value='".$row['subcomponent_code']."' size=40></td> <td><label>
                 
                      <textarea name='subcomponent_name[]' id='subcomponent_name' cols='45' rows='3'>".$row['subcomponent']."</textarea>
					  </td>
                    </tr>
    
    <tr>";
 $n++;
					}
				  }
	 $data.="<tr class='evenrow'>

            
                      
          
                      <td height='103' COLSPAN=4 ALIGN='right'><input name='back'  value='Cancel' class='button_width' onclick=\"xajax_view_subcomponent('','','','')\" type='button'  id='button' /> | <input type='button'  id='button' name='save_subcomponent' class='button_width' id=save_subcomponent value=Save onclick=\"xajax_update_subcomponent(xajax.getFormValues('subcomponent'))\"></td>
                    </tr>
                  </table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_subcomponent($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['subcomponent_id']);$m++){
 $subcomponent_id=$formvalues['subcomponent_id'][$m];

$x="select * from tbl_subcomponent where subcomponent_id='".$subcomponent_id."'";
$s=@mysql_query($x)or die(mysql_error());
$programme=$formvalues['programme'][$m];
$scname=$formvalues['subcomponent_name'][$m];
$code=$formvalues['subcomponent_code'][$m];

if(@mysql_num_rows($s)>0){
$sql="update tbl_subcomponent 
set prog_id='$programme',subcomponent_code='$code',subcomponent='$scname'
 where subcomponent_id='".$subcomponent_id."'";
//$obj->addAlert($x);
@mysql_query($sql)or die(mysql_error());


//audit info----
//$table_pk_id='id';
$c=mysql_fetch_array(mysql_query("SELECT concat_ws( subcomponent_code, prog_id, subcomponent ) as changed_from
FROM `tbl_subcomponent`
WHERE subcomponent_id ='".$subcomponent_id."'")) or die(http("ED-080"));
$changed_from=$c['changed_from'];
$changed_to=$programme."-".$code."-".$scname;
$obj->addEvent('','onsubmit',audit_trail("subcomponent_id",$subcomponent_id,$sql,"tbl_subcomponent",$changed_from,$changed_to));

//---------end of audit info---



}
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_subcomponent",'','','','');
return $obj;
}

//================EDIT PROGRAMME==================================
#edit programme

function edit_programmeAll($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Programme</div>
         <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['prog_id']);$m++){
$prog_id=$formvalues['prog_id'][$m];

$x="select * from tbl_programme where prog_id='".$prog_id."' order by prog_id asc";
//$obj->addAlert($x);
$query=mysql_query($x)or die(mysql_error());
 
while($row=mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
			<tr>
                <td>Program Code:</td>
                <td><input name='pcode[]' type='text' id='pcode' value='".$row['program_code']."' size='80' /></td>
              </tr>
              <tr>
                <td>Program Name:</td>
                <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><input name='pname[]' type='text' id='pname' value='$row[program_name]' size='80' /></td>
              </tr>
		
			    <tr>
                <td>Funder:</td>
                <td><select name='pfunder[]'   id='pfunder' class='combobox'>".funct_dropDownSelected('tbl_funder', 'funder_name', 'funder_id', 'funder_id',"".$row['Funder']."")."</select></td>
              </tr>
			   <tr>
                <td>Implementing Organization:</td>
                <td><select name='organization[]'   id='organization' class='combobox'>".funct_dropDownSelected('tbl_organization', 'orgName', 'org_code', 'org_code',"".$row['imp_org']."")."</select></td>
              </tr>
              
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='80' rows='3'>$row[details]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
              </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;


}




function update_programme($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['prog_id']);$i++){
$prog_id=$formvalues['prog_id'][$i];
$pcode=$formvalues['pcode'][$i];
$pname=$formvalues['pname'][$i];
$pfunder=$formvalues['pfunder'][$i];
$imp_org=$formvalues['organization'][$i];
$pdesc=$formvalues['pdescription'][$i];
$x1="select * from tbl_programme where prog_id='".$prog_id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
#$obj->addAlert($x);
if(mysql_num_rows($select)>0){
$x="update tbl_programme set program_name='".$pname."',program_code='".$pcode."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";
@mysql_query($x) or die(http("ED-0159"));

//$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
//audit info----
//$table_pk_id='id';
$ch=mysql_fetch_array(mysql_query("SELECT concat_ws( prog_id, program_name,Funder,details ) as changed_from
FROM `tbl_programme`
WHERE prog_id ='".$prog_id."'")) or die(http("ED-0183"));
$changed_from=$ch['changed_from'];
$changed_to=$prog_id."-".$pname."-".$imp_org."-".$pdesc;
$obj->addEvent('','onsubmit',audit_trail("prog_id",$prog_id,$$x,"tbl_programme",$changed_from,$changed_to));

//---------end of audit info---
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_programme",'','');
return $obj;
}



function edit_goal($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Goal</div>
         <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"history.back();return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['id']);$m++){
$goal_id=$formvalues['id'][$m];

$x="select * from tbl_goal where id='".$goal_id."' order by id asc";
//$obj->addAlert($x);
$query=mysql_query($x)or die(mysql_error());
 
while($row=mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
			 <tr>
                <td>Program:</td>
                <td><input type='hidden' value='".$row['id']."' name='id[]' id='id' >
				<select name='prog_id[]'   id='prog_id' class='combobox'>".funct_dropDownSelected('tbl_programme', 'program_name', 'prog_id', 'prog_id',"".$row['prog_id']."")."</select></td>
              </tr>
		
			    <tr>
               
              
              <tr>
                <td>Goal:</td>
                <td><textarea name='goal[]' id='goal' cols='80' rows='3'>$row[component]</textarea></td>
              </tr>
			   <tr>
                <td>Description:</td>
                <td><textarea name='description[]' id='description' cols='80' rows='3'>$row[description]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_goal(xajax.getFormValues('programme'));\"></td>
              </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;


}



function update_goal($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['id']);$i++){
$prog_id=$formvalues['prog_id'][$i];
$goal=$formvalues['goal'][$i];
$id=$formvalues['id'][$i];
$desc=$formvalues['description'][$i];
$x1="select * from tbl_goal where id='".$id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
//$obj->alert($x1);
if(mysql_num_rows($select)>0){
$x="update tbl_goal set prog_id='".$prog_id."',component='".$goal."',description='".$desc."',updatedby='".$_SESSION['username']."' where id='".$id."'";
@mysql_query($x) or die(http("ED-0159"));

//$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
//audit info----
//$table_pk_id='id';
$ch=mysql_fetch_array(mysql_query("SELECT concat_ws( id,prog_id, component,updatedby,description ) as changed_from
FROM `tbl_goal`
WHERE id ='".$id."'")) or die(http("ED-603"));
$changed_from=$ch['changed_from'];
$changed_to=$id."-".$prog_id."-".$goal."-".$desc;
$obj->addEvent('','onsubmit',audit_trail("id",$prog_id,$x,"tbl_goal",$changed_from,$changed_to));

//---------end of audit info---
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_goal",'','','','','','');
return $obj;
}


//----------------edit purpose---------------------
function edit_purpose($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='100%' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Systems Setup &raquo; Editing Purpose</div>
         <div style='float:right;'><input type='button'  id='button' name='back' title='back' value='Back' onclick=\"history.back();return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['id']);$m++){
$purpose_id=$formvalues['id'][$m];

$x="select * from tbl_purpose where id='".$purpose_id."' order by id asc";
//$obj->addAlert($x);
$query=mysql_query($x)or die(mysql_error());
 
while($row=mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'>
			 <tr>
                <td>Program:</td>
                <td><input type='hidden' value='".$row['id']."' name='id[]' id='id' >
				<select name='prog_id[]'   id='prog_id' class='combobox'>".funct_dropDownSelected('tbl_programme', 'program_name', 'prog_id', 'prog_id',"".$row['prog_id']."")."</select></td>
              </tr>
		
			    <tr>
               <tr>
                <td>Code:</td>
                <td><input type='text' value='".$row['component_code']."' name='component_code[]' id='component_code' size='80' ></td>
              </tr>
              
              <tr>
                <td>Purpose:</td>
                <td><textarea name='purpose[]' id='purpose' cols='80' rows='3'>$row[component]</textarea></td>
              </tr>
			   <tr>
                <td>Description:</td>
                <td><textarea name='description[]' id='description' cols='80' rows='3'>$row[description]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button'  id='button' name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_purpose(xajax.getFormValues('programme'));\"></td>
              </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;


}



function update_purpose($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['id']);$i++){
		$prog_id=$formvalues['prog_id'][$i];
		$code=$formvalues['component_code'][$i];
		$purpose=$formvalues['purpose'][$i];
		$id=$formvalues['id'][$i];
		$desc=$formvalues['description'][$i];
		$x1="select * from tbl_purpose where id='".$id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
//$obj->alert($x1);
if(mysql_num_rows($select)>0){
$x="update tbl_purpose set prog_id='".$prog_id."',component='".$purpose."',description='".$desc."',updatedby='".$_SESSION['username']."',component_code='".$code."' where id='".$id."'";
@mysql_query($x) or die(http("ED-0159"));

//$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
//audit info----
//$table_pk_id='id';
$ch=@mysql_fetch_array(mysql_query("SELECT concat_ws( id,prog_id,component_code,component,updatedby,description ) as changed_from
FROM `tbl_purpose`
WHERE id ='".$id."'")) or die(http("ED-708"));
$changed_from=$ch['changed_from'];
$changed_to=$id."-".$prog_id."-".$goal."-".$desc;
$obj->addEvent('','onsubmit',audit_trail("id",$prog_id,$x,"tbl_purpose",$changed_from,$changed_to));

//---------end of audit info---
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_purpose",'','','','','','');
return $obj;
}







//==================edit output========================================
function edit_output($formvalues){
$obj=new xajaxResponse();
$data="<form name='output' id='output' method=post><table border='0'>";
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$q=mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){
$data.="<tr
    <td colspan='2'><hr/></td></tr>
  <tr>
   <tr>
    <td colspan='2'><hr></td></tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
                <td>Progrmme:</td>
                <td><select name='prog_id' id='prog_id' class='combobox2'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'','','',''); return false;\" >";
					  $querytyp=mysql_query("select * from tbl_programme  order by prog_id asc")or die(http("VP-2012"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					$seltype=($row['prog_id']==$rowtyp['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['prog_id']."\" ".$seltype." >".$rowtyp['prog_id']." ".$rowtyp['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Outcome:</td>
                <td><select name='outcome' id='outcome' class='combobox2' ><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_subcomponent  order by 1 asc")or die(http("VP-2023"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($row['subprog_id']==$rowtype['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['subcomponent_id']."\" ".$seltype." >".$rowtype['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
  <tr>
    <td>Output Code</td>
    <td><input type='hidden' name='output_id[]' id='output_id' size='50' value='".$row['output_id']."' /><input type='text' name='output_code[]' id='output_code' size='50' value='".$row['output_code']."' />";
	
	$data.="</td>
  </tr>
  <tr>
    <td>Output Name </td>
    <td><label>
      <input name='oname[]' type='text' id='oname' size='50' value='".$row['output_name']."'/>
    </label></td>
  </tr>"; }
} $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button'  id='button' name='output' id='output' value='Save' onclick=\"xajax_update_output(xajax.getFormValues('output'))\">
        </p>
      </div></td>
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_output($formvalues){
$obj=new xajaxResponse();
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$prog_id=$formvalues['prog_id'];
$ocomponent=$formvalues['ocomponent'][$m];
$subcomponent=$formvalues['outcome'][$m];
$output_code=$formvalues['output_code'][$m];
$oname=$formvalues['oname'][$m];
$details=$formvalues['odesc'][$m];

if($oname==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Output Name</li>"));
return $obj;
}
$q=mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(http("ED-296"));
if(mysql_num_rows($q)>0){
$query="update tbl_output set prog_id='".$prog_id."',
subprog_id='".$subcomponent."',
output_code='".mysql_real_escape_string($output_code)."',
output_name='".mysql_real_escape_string($oname)."'
 where output_id='".$output_id."'";
#$obj->addAlert($query);
@mysql_query($query)or die(http("ED-0304"));


//=========audit trail info===================
$ch=mysql_fetch_array(mysql_query("SELECT concat_ws( output_id, output_code, output_name,prog_id) as changed_from
FROM `tbl_output`
WHERE output_id ='".$output_id."'")) or die(http("ED-0183"));
$changed_from=$ch['changed_from'];
$changed_to=$output_id."-".$output_code."-".$oname."-".$prog_id;
$obj->addEvent('','onsubmit',audit_trail("output_id",$output_id,$$x,"tbl_output",$changed_from,$changed_to));

//---------end of audit info---
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_output",'','','','','');
return $obj;
}


function edit_indicator($formvalues){
$obj=new xajaxResponse();
 
$data.="<form name='indicator13' id='indicator13' action='".$PHP_SELF."'><table >";

for($i=0;$i<count($formvalues['indicator_id']);$i++){
$sel="select * from tbl_indicator where indicator_id='".$formvalues['indicator_id'][$i]."'";
//$obj->alert($sel);
$queryedit=mysql_query($sel)or die(http("ED-0301"));
while($rowedit=mysql_fetch_array($queryedit)){

//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_code']."','".$_SESSION['subprogram_code']."',this.value,'".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					$data.="
					<tr class=''>
                      <td colspan=2><hr/></td></tr>
					<tr class=''>
                      <td width='200'>Programme</td>
                      <td>";
//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_code']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					$data.="<select name='prog_id[]' id='prog_id' class='combobox2'    ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by prog_id,program_name")or die(http("VP-1874"));
					 if($_SESSION['program_code']==''){
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$rowedit['prog_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
				
					   }
					      
						  }else 
						  while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$rowedit['prog_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
				
					   }
					      //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_code']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					  $data.="</select></td>
                    </tr>
	<tr class=''>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator[]'  id='type_ofindicator' class='combobox2' />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					   $queryt=mysql_query("select * from tbl_lookup where classCode='11' order by codeName asc ")or die(http("VP-2284"));	
					   while($rowt=mysql_fetch_array($queryt)){
					 	$selected2=($rowt['codeName']==$rowedit['indicator_type'])?"SELECTED":"";
					$data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".$rowt['codeName']."</option>";
					   }	
					   
					  $data.=" </select></td>
                    </tr >
					<tr class=''>
                      <td>Outcome</td>
                      <td><select name='sub_component[]' id='sub_component' class='combobox2'      ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_code']."'
	$sql="select * from tbl_subcomponent order by  subcomponent_code asc";
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
				while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$rowedit['subcomponent_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".$rowst['subcomponent']."</option>";
					   }   
				$data.="</select></td>
                    </tr>
			<tr class=''>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id[]' id='output_id' class='combobox2'    >
						<OPTION VALUE=''>-SELECT-</OPTION>
						<OPTION VALUE=''>-N/A-</OPTION>";
					  $queryout=mysql_query("select * from tbl_output order by output_code")or die(http("VP-1320"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$rowedit['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".$rowout['output_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>";
				
					  $data.="<tr class=''>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$rowedit['indicator_id']."' /><input name='indicator_code[]' type='text' id='indicator_code' size='50' value='".$rowedit['indicator_code']."' /></td>
</tr>
    <tr><td>Indicator Name:</td><td><textarea name='indicator[]' class='combobox2' type='text' id='indicator1' cols='45' rows='3' >".$rowedit['indicator_name']."</textarea></td></tr>";

	$data.="<tr><td>Gender Disaggregation:</td><td><select name='gender1[]' class='combobox2' ><option value=''>-select-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("ED-390"));
while($rowg=mysql_fetch_array($SEL)){
$sel=($rowg['codeName']==$rowedit['disaggregation'])?"SELECTED":"";
	$data.="<option value=\"".$rowg['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
	}
	
	$data.="</select></td></tr>
	<tr class=''><td>Type of Disaggregation:</td><td><select name='typeofdisaggregation[]' class='combobox2' ><option value='' />-select-</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode like '17' order by codeName asc")or die(http("ED-400"));
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['codeName']==$rowedit['typeofDisaggregation'])?"SELECTED":"";
	$data.="<option value=\"".$row13['codeName']."\" ".$sel."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>
	<tr class=''>
  <td>Unit of Measure:</td><td><select name='unitofmeasure[]' id='unitofmeasure' class='combobox2' ><option value=''>-Select-</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='10' order by codeName asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['codeName']==$rowedit['unitofmeasure'])?"SELECTED":"";
	$data.="<option value=\"".$row13['codeName']."\" ".$sel."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>
 
  <tr class=''><td>Responsible</td><td><select name='reponsible[]' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("ED-400"));
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['group_name']==$rowedit['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td></tr>
	<tr><td>Expected Output</td><td><select name='output[]' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("ED-400"));
	while($row13=mysql_fetch_array($q)){
	$selo=($rowo['codeName']==$rowedit['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class=''>
	 <td>Frequency of Reporting</td><td><select name='frequency[]' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	$sel14=($row14['codeName']==$rowedit['frequency_of_reporting'])?"SELECTED":"";
	$data.="<option value=\"".$row14['codeName']."\" ".$sel14."/>".$row14['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>";
			
			
			}
	}
			 $data.="
			 
			 <tr class=''>
                      <td colspan=2><div id='status'></div></td></tr>
			 <tr class=''>
                <td width='165'>&nbsp;</td>
               <td width='69' ALIGN='right'><button  name='save_indicator' type='button'  id='button' id='save_indicator' value='Save' class='button_width' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator13'));\" />Save</button></td>
            
              </tr>
             
    </table>";$data.="</form>";		 
//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



///----------------eupdate indicator=-------------------------------

function update_indicator($formvalues){
$obj=new xajaxResponse();


for($i=0;$i<count($formvalues['indicator_id']);$i++){
$target=mysql_real_escape_string($formvalues['target'][$i]);
$prog_id=$formvalues['prog_id'][$i];
//$obj->alert($prog_id);
$typeofdisaggregation=trim($formvalues['typeofdisaggregation'][$i]);
$unitofmeasure=trim($formvalues['unitofmeasure'][$i]);
$goal_id=trim($formvalues['goal'][$i]);
$subcomponent=$formvalues['sub_component'][$i];
$component=0;
$output_id=trim($formvalues['output_id'][$i]);
$typeofindicator=trim($formvalues['type_ofindicator'][$i]);
$Level_ofindicator=trim($formvalues['Level_ofindicator'][$i]);
$responsible=trim($formvalues['reponsible'][$i]);
$expected_output=trim($formvalues['output'][$i]);
$indicator_id=$formvalues['indicator_id'][$i];
$indicator_code=trim($formvalues['indicator_code'][$i]);
$indicator=$formvalues['indicator'][$i];
$gender=$formvalues['gender1'][$i];
$frequency_of_reporting=$formvalues['frequency'][$i];

 /* if(mysql_num_rows(mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' and prog_id='".$prog_id."' "))>0){
$obj->alert("Process Halted! Indicator Code ".$indicator_code." Already Exists");
return $obj;} */
 
 
$xx="update tbl_indicator
 set unitofmeasure = '".mysql_real_escape_string($unitofmeasure)."',
 typeofDisaggregation='".mysql_real_escape_string($typeofdisaggregation)."',prog_id = '".$prog_id."',
 purpose_id='".$component."',
 subcomponent_id='".$subcomponent."',
 output_id='".$output_id."'
 ,indicator_name='".mysql_real_escape_string($indicator)."',
 indicator_code='".mysql_real_escape_string($indicator_code)."',
 disaggregation='".mysql_real_escape_string($gender)."',
 indicator_type='".mysql_real_escape_string($typeofindicator)."'
 ,responsible='".mysql_real_escape_string($responsible)."',
 expected_output='".mysql_real_escape_string($expected_output)."',
 level_ofindicator='".mysql_real_escape_string($Level_ofindicator)."'
 ,frequency_of_reporting='".$frequency_of_reporting."'
  where indicator_id='".$indicator_id."'";
//$obj->alert($xx);
@mysql_query($xx)or die(http("ED-464"));
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$obj->call("xajax_view_indicator",'','','','','',1,20);
return $obj;
}



//==============end of MER LAYOUT ==================================
//---------------------------edit project monitoring--------------------------


 function edit_TSOqualitativeReporting2($narrative_id,$semi_annual,$div,$org_code){
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
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='button'  id='button' name='edit' id='button' style='width:100px;' value='save' onclick=\"xajax_update_QualitativeReporting(xajax.getFormValues('formUploadIndividual'));return false;\" /> | <a href='print_version.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."' target='_blank'><input type='button'  id='button' name='print' id='button' style='width:100px;' value='Print Version'  /></a>
       </div></td>
        </tr>";
	 # $obj->addAlert(count($formvalues['loopkey']));
//for($i=0;$i<count($narrative_id);$i++){
#$narrative_id=$formvalues['narrative_id'][$i];
$select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http("Edit-4857"));
#$obj->addAlert($select);
while($row=@mysql_fetch_array($queryTSO)){
$data.="<tr>
         ";
		  $sql="select * from tbl_organization where org_code='".$org_code."' order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http("Edit-219"));
		  $ROW=@mysql_fetch_array($query);
		
		  $data.="
		  <input name='narrative_id' id='narrative_id' value='".$row['narrative_id']."' type='hidden' >
		  <input name='intervention' id='intervention' value='".$ROW['org_code']."' type='hidden' ><strong>".substr($ROW['orgName'],0,500)."</strong></td>
        </tr>
       <tr>
          <td>
          <div align='left'><strong>Executive Summary (1.1	Summary of key training activities including field days and demo plots)</strong><em>[0.5 page]</em></div></td>
          <td><textarea name='plannedActivities'  cols='100' rows='5'  onKeyDown=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\" onKeyUp=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\">".$row['plannedActivities']."</textarea>&nbsp;You have <input readonly type='text' name='countdownplannedActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
      <tr>
          <td>
          <div align='left'><strong>1.1.2	Partners/Government Staff trained.</strong><em>(0.5 page)</em></div></td>
          <td><textarea name='implementation' id='implementation' cols='100' rows='5' onKeyDown=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\" onKeyUp=\"limitText(this.form.implementation,this.form.countdownimplementation,500);\">".$row['implementation']."</textarea>You have <input readonly type='text' name='countdownimplementation' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr><tr>
          <td>
          <div align='left'><strong>1.2	Summary of other main activities undertaken during the reporting period  </strong><em>(Maximum 3 pages)</em></div></td>
          <td><textarea name='achievements' id='achievements' cols='100' rows='5'  onKeyDown=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\" onKeyUp=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\">".$row['achievements']."</textarea>You have <input readonly type='text' name='countdownachievements' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>";
         $data.="<tr>
          <td>
          <div align='left'><strong>2.1	Progress against Adoption Targets Area and Farmers </strong><em>[Max 3 pages]</em></div></td>
          <td><textarea name='deviations' id='deviations' cols='100' rows='5'  onKeyDown=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\" onKeyUp=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\">".$row['Deviation']."</textarea>You have <input readonly type='text' name='countdowndeviations' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
		
        <tr>
          <td>
          <div align='left'><strong>2.2	Major Reasons for Adoption by Farmers</strong><em>[Max 0.5 page]</em></div></td>
          <td><textarea name='challenges' id='challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\" onKeyUp=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\">".$row['next_quarter']."</textarea>You have <input readonly type='text' name='countdownchallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>2.3	Major Reasons for Non-Adoption by Farmers</strong> <em>[Max 0.5 page]</em> </div></td>
          <td><textarea name='next_quarter' id='next_quarter' cols='100' rows='5' onKeyDown=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\" onKeyUp=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\">".$row['Challenges']."</textarea>You have <input readonly type='text' name='countdownnext_quarter' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
       
		
        <tr>
          <td>
          <div align='left'><strong>8. 2.4	Specific Activities to Increase Adoption (for the next period) [Max 0.5 page]</strong></div></td><td><table cellspacing='0'      width='500' border='0'>";
		  $n=1; $is=10;$inc=1;
  $data.="<tr>
    <th>&nbsp;NO</th>
    <th>&nbsp;Activities planned for next 6 months</th>
    <th>&nbsp;Milestones</th>
    <th>&nbsp;Timeframe</th>
  </tr>";
  
 // for($x=0;$x<$is;$x++){
  //$color=$inc%2==1?"evenrow":"white1";
  
  //$SQLM="select * from tbl_projectworkplan where project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'";
  //$obj->alert($SQLM);
   /*$querym=mysql_query($SQLM)or die("0707");
  while($rowm=mysql_fetch_array($querym)){
  $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='$color'><td>".$n."</td>
    <td>".$rowm['activity']."</td>
    <td>".$rowm['milestone']."</td>
    <td>".$rowm['semi_annual']."</td></tr>";
	//$inc++;
  $n++;								
  } */
  
  
//".noRecordsFound($querym,11)."
  //}
/* $data.="</table>
<td></center></tr>
		  
		  
		  
		  
		  
		  <tr><td colspan=2><center>
		  <table><tr class='evenrow'>
    
    <td colspan=4 class='black2'><CENTER>ANNEX</CENTER></td></tr>
   <tr class='evenrow'><td colspan=5 class='black2'><center>List of all publications/knowledge products produced</center></td></tr>
	<tr>
<tr CLASS='evenrow'>
  <td colspan='1' class='black2'>NO</td>
    <td class='black2'>Title of Publication <br/>/Knowledge Product</td>
    <td class='black2'>Author & Organization</td>
    <td class='black2'>Date</td>
  </tr>
  <tr CLASS='evenrow'>
  <td colspan='5'><div id='status'></div></td>
 ";
  
 */
  
  
  $n=1;
 /*  $queryp=mysql_query("select * from tbl_publication where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'")or die(http("1844"));
  while($rowp=mysql_fetch_assoc($queryp)){
$publication_id=$rowp['publication_id'];
  //$obj->alert($datename);
  $color=($n%2==1)?"evenrow3":"white1";
  $data.="<tr class='$color'><td align='right'>".$n."</td><td>".$rowp['title']."</td>
    <td>".$rowp['organization']."</td>
    <td>".$rowp['dateofpublication']."</td>
   

    

  </tr>";
  $n++;
  }
   

		  
		  
		 $data.="".noRecordsFound($queryp,11)."</table>";
		*/
		
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
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='button'  id='button' name='edit' id='button' style='width:100px;' value='Save' onclick=\"xajax_update_QualitativeReporting(xajax.getFormValues('formUploadIndividual'));return false;\"  /> | <a href='print_version.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."'  target='_blank' ><input type='button'  id='button' name='edit' id='button' style='width:100px;' value='Print Version'  /></a>
          </div></td>
        </tr>";
		}
        $data.="</table></FORM>";

	  
		
		




$obj->assign($div,'innerHTML',$data);
return $obj;
}

 
 
 function update_QualitativeReporting($formvalues){ 
	$obj=new xajaxResponse();
		//# $reportingPeriod=quarter(date(m));
		$narrative_id=$formvalues['narrative_id'];
		$org_code=$formvalues['intervention'];
		$plannedActivities=$formvalues['plannedActivities'];
		$implementation=$formvalues['implementation'];
		$achievements=$formvalues['achievements'];
		$deviations=$formvalues['deviations'];
		$ContributiontoProgramPurpose=$formvalues['ContributiontoProgramPurpose'];
		$challenges=$formvalues['challenges'];
		$next_quarter=$formvalues['next_quarter'];
	
		
	  $year=$_SESSION['Activeyear'];
	$org_code=$_SESSION['org_code'];

 $x="update tbl_tsoqualitative set 
      `plannedActivities`='".mysql_real_escape_string(str_replace("-","-",$plannedActivities))."',
	   `implementation`='".mysql_real_escape_string(str_replace("-","-",$implementation))."',
	   `achievements`='".mysql_real_escape_string(str_replace("-","-",$achievements))."',
	`Deviation`='".mysql_real_escape_string(str_replace("-","-",$deviations))."',
	`lessons`='".mysql_real_escape_string(str_replace("-","-",$lessons))."', 
	`Challenges`='".mysql_real_escape_string(str_replace("-","-",$challenges))."', 
	next_quarter='".mysql_real_escape_string(str_replace("-","-",$next_quarter))."',
	`updatedby`='".$_SESSION['username']."' where narrative_id='".$narrative_id."'";

$query=@mysql_query($x)or die(http("Save-1716"));



/* for($i=0;$i<count($formvalues['loopkey']);$i++){
$activity=$formvalues['course'][$i];
$milestone=$formvalues['trainer'][$i];
$quarter=$formvalues['typeofparticipants'][$i];

	//$obj->alert($datepublished);	
			
if($course<>''){
$insert="insert into tbl_training(semi_annual,year,project_id,narrative_id,
course,trainer,typeofparticipants,male,female,total,organizing_date,updatedby) values('".$_SESSION['sem_annual']."','".$_SESSION['Activeyear']."','".$project."','".$_SESSION['narrative_id']."','".$course."','".$trainer."','".$typeofparticipants."','".$male."','".$female."','".$total."','".$date."','".$_SESSION['username']."')";

@mysql_query($insert)or die(http('0013'));
$obj->alert($insert);
}
if($query){
congMsg("Data Captured!") or die(http("0031"));
}
 */

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
//$obj->call("xajax_view_FarmersProductionRecords",'',1,20);
return $obj;
}

 
 

function edit_TrainingParticipants($formvalues){
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
 
    <th colspan='10' ><center> TRAINING PARTICPANTS details</center></th>
	
  </tr>

	<tr class='evenrow'>
    <td colspan=10><table>
	<tr>
	<th>NO</th>
	<th>district</th>
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
	for($x=0;$x<count($formvalues['loopkey']);$x++){
	
	$sql="select * from tbl_training where training_id='".$formvalues['training_id'][$x]."'";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($row=mysql_fetch_array($query)){
	
	
	
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' six='20'  type='hidden' id='loopkey".$n."' value='".$row['training_id']."'  />".$n."</td>
	<td colspan=''><select name='district[]' id='district' ><option value=''>-select-</option>";
		   $sql="select * from tbl_district  order by districtName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($row['district']==$ROW['districtCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['districtCode']."\" ".$selected." >".substr($ROW['districtName'],0,500)."</option>";}
		  $data.="</select></td>
	<td colspan=''><select name='subcounty[]' id='subcounty' style='width:100px;'><option value=''>-select-</option>";
	
	 $sql="select * from tbl_subcounty   order by subcountyName";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($row['subcounty']==$ROW['subcountyCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['subcountyCode']."\" ".$selected." >".substr($ROW['subcountyName'],0,500)."</option>";}
	
	$data.="</select></td>
	<td colspan=''><select name='parishCode[]' id='parishCode' style='width:100px;'><option value=''>-select-</option>";
	$sql="select * from tbl_parish  order by ParishName";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){
		$selected=($row['parish']==$ROW['parishCode'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['parishCode']."\" ".$selected." >".substr($ROW['ParishName'],0,500)."</option>";}
	
	$data.="</select></td>
	<td><input name='village[]' six='20'  type='text' id='total".$n."' value='".$row['village']."' /></td>
	<td colspan=''><select name='org_code[]' id='org_code' style='width:100px;'>".funct_dropDownSelected('tbl_organization', 'orgName', 'org_code', 'orgName','$row[org_code]')."</select></td>
	<td colspan=''><select name='trainingtopic[]' id='trainingtopic' style='width:100px;'>".funct_dropDownSelected('tbl_trainingtopic', 'topic', 'code', 'topic','$row[code]')."</select></td>
	<td colspan=''><select name='trainees[]' id='trainees' style='width:100px;'>".funct_dropDownSelected('tbl_trainees', 'Name', 'code', 'Name','$row[code]')."</select></td>
	
	<td><input name='name[]' type='text' id='name".$n."' size='30' value='".$row['name_oftrainee']."'  /></td>
	<td><select name='sex[]' id='sex'>
	<option value=''>-select-</option>
	<option value='M'>Male</option>
	<option value='F'>Female</option>
	</select></td></td>
	<td><select name='num_training[]'  style='width:100px;' ><option value=''>-select-</option>";
		  $sql="select * from tbl_lookup where classCode='12' order by code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
	$selected=($row['number_of_times']==$ROW['code'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['code']."\" ".$selected." >".substr($ROW['codeName'],0,500)."</option>";}
		  $data.="</select></td>
	</tr>";
	$n++;}
	}
	

  $data.=" </table></td>
	 
    </tr>
  
 
  ";
 
 
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
        <button type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_TrainingParticipants(xajax.getFormValues('projects')); return false;\" />Save</button>
        </div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}





function update_TrainingParticipants($formvalues){
$obj=new xajaxResponse();
$n=1;
	
	
	
	$error="<ul>";
		$erCount=0;
/* if($district==''){
		$error.="<li>Select District Name</li>";
		$erCount++;
		} */
		if($_SESSION['quarter']=='Closed'){
		$error.="<li>Reporting Period Closed!</li>";
		$erCount++;
		}
$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		} 	
		
/* if($_SESSION['quarter']='Jan - Mar')$sem_annual='Jan - Jun';
		else if($_SESSION['quarter']=='Apr - Jun')$sem_annual='Jan - Jun';
		else if($_SESSION['quarter']=='Jul - Sep')$sem_annual='Jul - Dec';
		else if($_SESSION['quarter']=='Oct - Dec')$sem_annual='Jul - Dec';
		else if($_SESSION['quarter']=='Closed')$sem_annual='';
		else $sem_annual=''; 
		$_SESSION['sem_annual']=$sem_annual;*/
			for($i=0;$i<count($formvalues['loopkey']);$i++){
					$task=$formvalues['task'][$i];	
	$district=$formvalues['district'][$i];
	$trainer=$formvalues['trainer'][$i];
		$orgdate=$formvalues['orgdate'][$i];
					$subcounty=$formvalues['subcounty'][$i];
					$parishCode=$formvalues['parishCode'][$i];
					$village=$formvalues['village'][$i];
					$org_code=$formvalues['org_code'][$i];
					$trainingtopic=$formvalues['trainingtopic'][$i];
					$trainees=$formvalues['trainees'][$i];
					$name=$formvalues['name'][$i];
						$sex=$formvalues['sex'][$i];
					$num_training=$formvalues['num_training'][$i];
					$village=$formvalues['village'][$i];
					
	//$obj->alert($datepublished);	
			
if($name<>''){
$insert="update tbl_training set  `org_code`='".$org_code."',`training_topic`='".$trainingtopic."', `trainer`='".$trainer."',
 `typeofparticipants`='".$trainees."', `name_oftrainee`='".$name."', `gender`='".$sex."', `number_of_times`='".$num_training."',
  `updatedby`='".$_SESSION['username']."', `district`='".$district."', `subcounty`='".$subcounty."', `parish`='".$parishCode."', `task`='".$task."',village='".$village."' where training_id='".$formvalues['loopkey'][$i]."'";

@mysql_query($insert)or die(http('0013'));
//$obj->alert($insert);
}
$n++;
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
#$obj->call('xajax_mapping_register','','','');
$obj->call("xajax_view_TrainingParticipants",'','','');
return $obj;
}




//---------------edit training------------------------
function edit_training($formvalues){
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
<table width='100%'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>
  


	<tr class='evenrow'>
          <td width='30%' colspan=2>
          <div align='left'><strong>Project</strong></div></td>
          <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' and display like 'Yes%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >".substr($ROW['title'],0,500)."</option>";}
		  $data.="</select></td>
        </tr>

  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>In case of any training conducted, complete the Table</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th>NO</th>
    <th>Training course title</th>
    <th>Provided by</th>
    <th>Type of
participants</th>
    
	<th>No. of Male participants</th><th>No. of Female participants</th>
<th>Total No. of participants</th>
<th>Organizing date<br/><img src='images/spacer3.gif'></th>
  </tr>  
  ";
 
  for($i=0;$i<count($formvalues['loopkey']);$i++){
  $s="select * from tbl_training where training_id='".$formvalues['training_id'][$i]."'";
 //$obj->alert($s);
  $sel=mysql_query("select * from tbl_training where training_id='".$formvalues['training_id'][$i]."'")or die(http(0063));
  while($row=mysql_fetch_assoc($sel)){
  $orgdate="org_date".$n;
    $data.="<tr class='evenrow'>
  <td>".$n."</td>
    <td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
	<input name='training_id[]' type='hidden' id='training_id' size='25' value='".$row['training_id']."' />
	<input name='course[]' type='text' id='course' size='25'  value='".$row['course']."' /></td>
    <td><input name='trainer[]' type='text' id='trainer' size='25' value='".$row['trainer']."' /></td>
    <td><input name='typeofparticipants[]' type='text' id='typeofparticipants' size='25' value='".$row['typeofparticipants']."'   /></td>
    <td> <input name='male[]' type='text' id='male".$n."' size='13' onKeyPress='return numbersonly(event, false)' value='".$row['male']."' /></td>
    <td><input name='female[]' type='text' id='female".$n."' size='13' onKeyPress='return numbersonly(event, false)' value='".$row['female']."' /></td>
    <td><input name='total[]' readonly='readonly' onclick=\"xajax_calc_training(getElementById('male".$n."').value,getElementById('female".$n."').value,'total".$n."');\" type='text' id='total".$n."' value='".$row['total']."' size='13' /></td>

 <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.$orgdate);return false;\" hidefocus=''>
<input name='$orgdate' type='text'  size='18' value='".$row['organizing_date']."' id='$orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td>
  </tr>";
  $n++;
  }
  }
  
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
        <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_training(xajax.getFormValues('projects')); return false;\" />
        </div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------update training----------------------------------



								function update_training($formvalues){
								$obj=new xajaxResponse();
								$n=1;
								
								for($i=0;$i<count($formvalues['loopkey']);$i++){
								$training_id=$formvalues['training_id'][$i];
		$course=mysql_real_escape_string($formvalues['course'][$i]);
$trainer=mysql_real_escape_string($formvalues['trainer'][$i]);
	$typeofparticipants=mysql_real_escape_string($formvalues['typeofparticipants'][$i]);
		$male=mysql_real_escape_string($formvalues['male'][$i]);
				$female=mysql_real_escape_string($formvalues['female'][$i]);
		$total=mysql_real_escape_string($formvalues['total'][$i]);
	$date=$formvalues['org_date'.$n][$i];
$sql="update tbl_training set `course`='".$course."',`trainer`='".$trainer."',`typeofparticipants`='".$typeofparticipants."',male='".$male."',
 `female`='".$female."',`total`='".$total."',updatedby='".$_SESSION['username']."' where training_id='".$training_id."'";
 //$obj->alert($sql);
$query=@mysql_query($sql)or die(http(0043));
		
		//$n++;
		
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_training",'','');

								return $obj;
								}





 
//------------------------end of update training=--------------------------
//=-----------edit_prublications-------------------------------------------

function edit_publication($formvalues){
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
<table width='100%'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>
  


	<tr class='evenrow'>
          <td width='30%' colspan=2>
          <div align='left'><strong>Project</strong></div></td>
          <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' and display like 'Yes%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >".substr($ROW['title'],0,500)."</option>";}
		  $data.="</select></td>
        </tr>

  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>List of publications</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th>NO</th>
    <th>title</th>
    <th>Organization</th>
    
<th>Organizing date<br/><img src='images/spacer3.gif'></th>
  </tr>  
  ";
 
  for($i=0;$i<count($formvalues['loopkey']);$i++){
  $s="select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'";
  //$obj->alert($s);
  $sel=mysql_query("select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'")or die(http(0063));
  while($row=mysql_fetch_assoc($sel)){
  $orgdate="org_date".$n;
    $data.="<tr class='evenrow'>
  <td>".$n."</td>
    <td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
	<input name='publication_id[]' type='hidden' id='publication_id' size='25' value='".$row['publication_id']."' />
	<input name='title[]' type='text' id='title' size='25'  value='".$row['title']."' /></td>
    <td><input name='organization[]' type='text' id='trainer' size='25' value='".$row['organization']."' /></td>
   

 <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.$orgdate);return false;\" hidefocus=''>
<input name='$orgdate' type='text'  size='18' value='".$row['dateofpublication']."' id='$orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td>
  </tr>";
  $n++;
  }
  }
  
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
        <input type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_publication(xajax.getFormValues('projects')); return false;\" />
        </div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------update training----------------------------------



								function update_publication($formvalues){
								$obj=new xajaxResponse();
								$n=1;
								
								for($i=0;$i<count($formvalues['loopkey']);$i++){
								$publication_id=$formvalues['publication_id'][$i];
		$title=mysql_real_escape_string($formvalues['title'][$i]);
$organization=mysql_real_escape_string($formvalues['organization'][$i]);
	
	$date=$formvalues['org_date'.$n][$i];
$sql="update tbl_publication set `title`='".$title."',`organization`='".$organization."',updatedby='".$_SESSION['username']."' where publication_id='".$publication_id."'";
 //$obj->alert($sql);
$query=@mysql_query($sql)or die(http(0043));
		
		//$n++;
		
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_publications",'','');

								return $obj;
								}


//-----------------end of publications-------------------------------------

//edit project==========================
function edit_project($formvalues){
				$obj=new xajaxResponse();
			
				$_SESSION['program']='';
				$_SESSION['subprogram']='';
				$_SESSION['program']=$program;
				$_SESSION['subprogram']=$subprogram;
				for($i=0;$i<count($formvalues['id']);$i++){
					$query=mysql_query("select * from tbl_project where id='".$formvalues['id'][$i]."'")or die(http("216"));
					while($row=mysql_fetch_array($query)){
						$data="<form action='".$PHP_SELF."' name='projects' ID='projects' method='post' >
						<table cellspacing='0'      width='800' align='center' border='0' cellspacing='0' cellpadding='0'>
						
						<tr height='25'>
						<td>&nbsp;Program:</td><td>
								<select name='program[]' id='program' style='width:450px;' >
								<option value=''>-select-</option>";
														$ab4 = mysql_query("select * from tbl_programme order by prog_id asc")or die(mysql_error());
														while($b4 = mysql_fetch_array($ab4)){
														$selp=($row['programme_id']==$b4['prog_id'])?"SELECTED":"";
														$data.="<option value=\"".$b4['prog_id']."\" ".$selp." >".$b4['prog_id']." ".$b4['program_name']."</option>";
														}
										
														mysql_free_result($ab4);
												$data.="</select></td>
						</tr>
						
						<tr height='25'>
						<td>&nbsp;Sub-Program:</td><td>
								<select name='subprogram[]'  id='subprogram' style='width:450px;'><option value=''>-select-</option>";
				$ab1 = mysql_query("select * from tbl_subcomponent where prog_id like '".$_SESSION['program']."%' order by subcomponent_code asc")or die(mysql_error());
				while($ba = mysql_fetch_array($ab1)){
				$selsub=($row['subprogram_code']==$ba['subcomponent_id'])?"SELECTED":"";
			$data.="<option value=\"".$ba['subcomponent_id']."\"  ".$selsub.">".$ba['subcomponent_code']."&nbsp;&nbsp;   ".$ba['subcomponent']."</option>";
														}
										
			mysql_free_result($ab1);
$data.="</select></td>
						</tr>
						<tr height='25'>
						<td>&nbsp;Goal:</td>
						<td><textarea name='goal[]' id='goal' cols='80' rows='5'>".$row['goal']."</textarea></td>
										</tr>
						<tr valign='top'>
						<td>&nbsp;Project Purpose:</td>
						<td><div align='left'>
						<textarea name='program_purpose[]' id='program_purpose' cols='80' rows='5'>".$row['purpose']."</textarea>
						</div></td></tr>
						<tr height='25'>
						<td>&nbsp;Project Title</td>
						<td><textarea name='title[]' cols='80' id='title' rows='5'>".$row['title']."</textarea></td></tr>
						<tr height='25'>
						<td>&nbsp;Project Code:</td>
						<td><input type='text' name='project_code[]' id='project_code' id='project_code' value='".$row['project_code']."' size='83'></td></tr>
						<tr height='25'>
						<td>&nbsp;Project Goal:</td>
						<td><textarea name='proj_goal[]' id='proj_goal' cols='80' rows='5'>".$row['project_goal']."</textarea>
						</td></tr>
						<tr valign='top'>
											<td>&nbsp;Project Purpose:</td>
											<td><div align='left'>
											<textarea name='project_purpose[]' id='project_purpose' cols='80' rows='5'>".$row['purpose']."</textarea>
											</div></td>
										</tr>
										<tr height='25'>
											<td width='200' valign='top'>&nbsp;Background/Rationale:</td>
											<td><textarea cols='80' rows='8' name='background[]'  id ='background'>".$row['background']."</textarea></td>
										</tr>
										<tr height='25'>
											<td width='200' valign='top'>&nbsp;Project Funding Type:</td>".$row['background']."
											<td><input type='text' name='funding_type[]' id='funding_type' value='".$row['projectFundingtype']."' size='83'></td>
										</tr>
										<tr height='25' valign='top'>
											<td>&nbsp;Participating  Countries and Institutions:</td>
											<td><table cellspacing='0'     ></tr>";
										$a = mysql_query("select * from tbl_country  where memberstatus like 'Yes%' order by countryName asc")or die(mysql_error());
										while($b = mysql_fetch_array($a)){
										$div="status_".$b['countryCode'];
										$checked=(strpos($row['countries'], $b['countryName']) !==false)?"CHECKED":"";
							$data.="<tr><td><input type='checkbox' ".$checked." name='country[]' id='country' value=\"".$b['countryName']."\" ><a href='#'  title='click here to view organizations in ".$b['countryName']."' onclick=\"xajax_edit_organizationPerCountry('".$row['id']."','".$b['countryCode']."','".$b['countryName']."','".$div."');return false;\" ><strong>".$b['countryName']."</strong></a></td></tr>
							<tr><td colspan=2><div id='status_".$b['countryCode']."'></div></td></tr>";	}
							mysql_free_result($a); 
			$data.="</table></td></tr><tr height='25'>
											<td width='200'>Lead Institution/Organization:</td>
											<td><select name='leadInstitution[]' id='leadInstitution' style='width:450px;'><option value='' >-select-</option>";
														$ab3 = mysql_query("select * from tbl_organization order by orgName asc")or die(http(0089));
														while($b3 = mysql_fetch_array($ab3)){
														$selO=($row['leadInstitution']==$b3['org_code'])?"SELECTED":"";
															$data.="<option value=\"".$b3['org_code']."\" ".$selO." >".mysql_real_escape_string($b3['orgName'])."</option>";
														}
										
														mysql_free_result($ab3);
												$data.="</select>
											</td>
										</tr>
										";
										
										
									 $data.="<tr height='25'>
											<td width='200'>&nbsp;Status:</td>
											<td valign='center'><select name='status[]' id='status' style='width:450px;'><option value=''>-select-</option>
												";
														$ab2 = mysql_query("select * from tbl_lookup where classCode='2' order by codeName")or die(mysql_error());
														while($b2 = mysql_fetch_array($ab2)){
														$selstatus=($b2['codeName']==$row['status'])?"SELECTED":"";
															$data.="<option value=\"".$b2['codeName']."\" ".$selstatus.">".$b2['codeName']."</option>";
														}
														mysql_free_result($ab2);
												$data.="</select></td>
										</tr> <tr height='25'>
											<td width='200'>Principal Investigator:</td>
											<td>
												<select name='principalinvestigator[]' id='principalinvestigator' style='width:450px;'><option value='' >-select-</option>";
														$ab = mysql_query("select * from tbl_organization order by contact_person asc")or die(mysql_error());
														while($b = mysql_fetch_array($ab)){
															$selstatus=($b['contact_person']==$row['principalinvestigator'])?"SELECTED":"";
															$data.="<option value=\"".$b['contact_person']."\" ".$selstatus." >".mysql_real_escape_string($b['contact_person'])."</option>";
														}
										
														mysql_free_result($ab);
												$data.="</select>
											</td>
										</tr>"; 
										$data.="<tr height='25'>
											<td width='200'>&nbsp;Duration:</td>
											<td valign='center'><input type name='duration[]' id='duration' value='".$row['duration']."' size='85'>
												</td>
										</tr>
										<tr><td><strong>Start Date:</strong></td>
          <td colspan=2>From:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.fromdatevisited);return false;\" hidefocus=''>
<input name='fromdatevisited[]' type='text'  size='20' value='".$row['startDate']."'  id='fromdatevisited' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> End Date:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.todatevisited);return false;\" hidefocus=''>
<input name='todatevisited[]' type='text'  size='27' value='".$row['EndDate']."'  id='todatevisited' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> </td>
        </tr>
										<tr><td><strong>New Ending Date:</strong></td>
          <td colspan=2><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.newendingdate);return false;\" hidefocus=''>
<input name='newendingdate[]' type='text'  size='78' value='".$row['NewendingDate']."' id='newendingdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a>  </td>
        </tr>
					<tr><td><strong>Total Project Funding:</strong></td>
          <td colspan=2><input name='totalfunding[]' type='text'  size='80' value='' id='totalfunding' value='".$row['totalprojectFunding']."' onKeyPress='return numbersonly(event, false)' />(USD)</td>
        </tr>			

										
										<tr height='25'>
											<td width='200' valign='top' colspan=2>&nbsp;
											<center><table cellspacing='0'     ><tr><td>No</td><td>Source of Funding</td><td>Amount of Funding (USD)</td><td>Shortfall(USD)</td></tr>";
											$n=1;$y=1;
											for($x=0;$x<1;$x++){
											$color=$y%2==1?"evenrow":"white1";
											$selected=$checked==true?"evenrow3":$color;
											$data.="<tr class='$selected'><td>".$n++."</td>
											<td><input type='text' name='source[]' 		id='source' value='".$row['sourceof_funding']."' size='20' /></td>
											<td><input type='text' name='amount[]' 		id='amount' value='".$row['amount_available']."' size='20' /></td>
											<td><input type='text' name='shortfall[]' 	id='shortfall' value='".$row['shortfall']."' size='20' /></td></tr>";
											$y++;
											}
										
										$data.="</table></center></td></tr>";
									$data.="
									
									<tr><td colspan=2><div id='statusxxx'></div></td></tr>
									
									<tr height='25'>
									<td width='200'>&nbsp;</td>
											<td width='200'>&nbsp;</td>
											<td>
				<input type='hidden' value='".$row['id']."' name='project_id[]' id='project_id' class='button_width'  >
				<input type='button'  id='button' value='SAVE' name='project_save' onclick=\"xajax_update_project(xajax.getFormValues('projects'));return false;\" class='button_width' >
											</td>
										</tr>
									</table></form>";
									}
									}
							$obj->assign('bodyDisplay','innerHTML',$data);
							return $obj;		
									
								}
								
								
								
								
								function update_project($formvalues){
								$obj=new xajaxResponse();
								
								for($x=0;$x<count($formvalues['project_id']);$x++){
								$program=$formvalues['program'][$x];
$subprogram=mysql_real_escape_string($formvalues['subprogram'][$x]);
$goal=mysql_real_escape_string($formvalues['goal'][$x]);
$project_purpose=mysql_real_escape_string($formvalues['project_purpose'][$x]);
$project_code=mysql_real_escape_string($formvalues['project_code'][$x]);
$project_goal=mysql_real_escape_string($formvalues['proj_goal'][$x]);
$title=mysql_real_escape_string($formvalues['title'][$x]);
$background=mysql_real_escape_string($formvalues['background'][$x]);
$funding_type=mysql_real_escape_string($formvalues['funding_type'][$x]);
$organization=mysql_real_escape_string(get_Stringorg($formvalues['organization']));
$country=mysql_real_escape_string(get_Stringorg($formvalues['country']));
$leadInstitution=mysql_real_escape_string($formvalues['leadInstitution'][$x]);
$status=mysql_real_escape_string($formvalues['status'][$x]);
$duration=mysql_real_escape_string($formvalues['duration'][$x]);
$fromdatevisited=mysql_real_escape_string($formvalues['fromdatevisited'][$x]);
$todatevisited=mysql_real_escape_string($formvalues['todatevisited'][$x]);
$newending_date=mysql_real_escape_string($formvalues['newendingdate'][$x]);
$source_of_funding=mysql_real_escape_string(get_Stringorg($formvalues['source']));
$amount=mysql_real_escape_string(get_Stringorg($formvalues['amount']));
$shortfall=mysql_real_escape_string(get_Stringorg($formvalues['shortfall']));
$totalfunding=mysql_real_escape_string($formvalues['totalfunding'][$x]);
$principalinvestigator=mysql_real_escape_string($formvalues['principalinvestigator'][$x]);
$project_code=$formvalues['project_id'][$x];
$erCount=0;
  $error="<ul>";
		
		if($goal==''){
		$error.="<li>Please Enter a Goal!</li>";
	$erCount++;
		}
		if($project_code==''){
		$error.="<li>Please Enter Project Code</li>";
	$erCount++;
		}
		if($project_purpose==''){
		$error.="<li>Missing Project Purpose</li>";
		$erCount++;
		}
		if($title==''){
		$error.="<li>Missing Project Title</li>";
	$erCount++;
		}
		if($leadInstitution==''){
		$error.="<li>Missing Lead Institution</li>";
	$erCount++;
		}
		/*  if($leadInstitution==''){
		$error.="<li>Missing Lead Institution</li>";
`		$erCount++;
		} */
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("statusxxx","innerHTML",errorMsg($error));
			return $obj;
		}	  
 //////**/
		$sql="update tbl_project set `programme_id`='".mysql_real_escape_string($program)."', 
 `subcomponent_id`='".$subprogram."',
 `goal`='".$goal."', 
 purpose='".$project_purpose."',
 `project_code`='".$project_code."',
  `title`='".$title."',project_goal='".$project_goal."',
  `background`='".$background."',
  `projectFundingtype`='".$funding_type."',
  totalprojectFunding='".$totalfunding."',
   `countries`='".$country."',
    `institutions`='".$organization."',
	 `leadInstitution`='".$leadInstitution."',
	  `status`='".$status."',
	  `duration`='".$duration."', 
	  `startDate`='".$fromdatevisited."', 
	  `EndDate`='".$todatevisited."',
	   `NewendingDate`='".$newending_date."',
	   `principalinvestigator`='".$principalinvestigator."',
	    `sourceof_funding`='".$source_of_funding."',
   `amount_available`='".$amount."',
    `shortfall`='".$shortfall."',
	`updatedby`='".$_SESSION['username']."' where id=$project_code
		";
 $query=@mysql_query($sql)or die(http(0043));
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_project",'','','','','',1,20);

								return $obj;
								}




function edit_organizationPerCountry($id,$country_id,$countryName,$div){
	$obj=new xajaxResponse();
	//$obj->alert($county_id);
		$data.="<table cellspacing='0'     >
		<tr class='evenrow'><td><strong>Institutions In $countryName </strong><em>(select all that Apply)</em></td>";
		$x=mysql_query("select * from tbl_project where id='".$id."'")or die(http(0180));
		while($rowx=mysql_fetch_array($x)){
		$a = mysql_query("select * from tbl_organization  where country_id ='".$country_id."' order by orgName asc")or die(mysql_error());
			while($b = mysql_fetch_array($a)){
			$checkedorg=(strpos($rowx['institutions'], $b['orgName']) !==false)?"CHECKED":"";
			$data.="<tr><td><input type='checkbox' name='organization[]' ".$checkedorg." id='organization' value=\"".$b['orgName']."\">".$b['orgName']."</option></td></tr>
				<tr><td colspan=2><div id='status_".$b['countryCode']."'></div></td></tr>";	
				
				}
				}
							mysql_free_result($a); 
			$data.="</table>";
								
		$obj->assign($div,'innerHTML',$data);
		return $obj;	
			}







function edit_organization($formvalues){
$obj=new xajaxResponse();

           
 for($i=0;$i<count($formvalues['org_code12']);$i++){
			  $org_code12=$formvalues['org_code12'][$i];
			  $x="select * from tbl_organization where org_code='".$org_code12."'";
			 #$obj->addAlert($x);
			  $query=mysql_query($x)or die(http("ED-2214"));
			   while($row=@mysql_fetch_array($query)){
$data.="<div id='login'><table cellspacing='0'      width='600'><tr><td><form name='organization_reds' id='organization_reds'>
<table cellspacing='0'      width='600' border='0' id='organizational_details'> ";

$data.="<tr>
                <td>Name of Organization</td>
                <td colspan='2'><input name='orgcode[]' type='hidden' id='orgcode' size='80' value='".$row['org_code']."'/><input name='orgname[]' type='text' id='orgname' size='80' value='".$row['orgName']."'/></td>
              </tr>
              <tr>
                <td>Acronym</td>
                <td colspan='2'><input name='acronym[]' type='text' id='acronym' size='80' value='".$row['acronym']."' /></td>
              </tr>
              
            
              <tr>
                <td>Country:</td>
                <td colspan='2'><select name='zonename[]' id='zonename' style='width:430px;'><option value=''>-select-</option>";
	$queryzone=mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName  asc")or die(http(2244));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selct=($row['country_id']==$rowzone['countryCode'])?"selected":"";
      $data.="<option value=\"".$rowzone['countryCode']."\" ".$selct.">".$rowzone['countryName']."</option>";
	  }
	  $data.="</select></td>
              </tr>
			   <tr>
    <td>District/Municipality:</td>
    <td><select name='district[]' id='district' style='width:430px;' >";


     $q=mysql_query("select * from tbl_district  order by 1 asc")or die(http(330));
	  while($rowd=mysql_fetch_array($q)){
	  $selc=($row['district']==$rowd['districtCode'])?"selected":"";
      $data.="<option value=\"".$rowd['districtCode']."\" ".$selc." >".$rowd['districtName']."</option>";

	}
	
	       $data.="</select></td>
  </tr>
   <tr >
    <td>Subcounty/Division:</td>
    <td><select name='subcounty[]' id='subcounty' style='width:430px;' ><option>-select-</option>";

      $qsubcounty=mysql_query("select * from tbl_subcounty  where districtCode like '".$row['district']."' order by 1 asc")or die(http(321));
	  while($rowsubcounty=mysql_fetch_array($qsubcounty)){
	  $selsubcounty=($row['subcounty']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
      $data.="<option value=\"".$rowsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowsubcounty['subcountyName']."</option>";
	 }
	 
    $data.="</select></td>
  </tr>
 <tr >
    <td>Parish/Ward:</td>
    <td><select name='parish[]' id='parish' style='width:430px;' ><option value='' >-select-</option>";
	//if($_SESSION['districtCode']<>''){
     
      $qparish=mysql_query("select * from tbl_parish where districtCode like '".$row['district']."%' order by 1 asc")or die(http(321));
	  while($rowparish=mysql_fetch_array($qparish)){
	 $selparish=($row['parish']==$rowparish['parishCode'])?"selected":"";
      $data.="<option value=\"".$rowparish['ParishCode']."\" ".$selparish.">".$rowparish['ParishName']."</option>";
	
	 
	// }
	 }

        $data.="</select></td>
  </tr>
<tr>
                <td>Village:</td>
                <td colspan='2'><label>
                  <input name='village[]' id='village' value='".$row['village']."' type='text' size='80' />
                  </label></td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'><label>
                  <select name='orgtype[]' id='orgtype' style='width:430px;'><option value='' >-select organization-</option>";
				   $query=mysql_query("select * from tbl_lookup where classCode=1 order by codeName Asc")or die("Sunrise Error-Code-0057 because, ".mysql_error());
				  
				  while($rowt=mysql_fetch_array($query)){
				  $selovc=($row['orgtype']==$rowt['code'])?"selected":"";
				  $data.="<option value=\"".$rowt['code']."\" ".$selovc." >".$rowt['codeName']."</option>";
				  }
                  $data.="</select>
                  </label></td>
              </tr>
			 
			  
			    <tr>
             <td>Contact Farmer:</td>
      <td><input name='contact_person[]' type='text' id='contact_person' size='80' /></td>
    </tr>
	 <tr>
             <td>Contact Farmer Gender:</td>
    <td colspan='2'><label>
                  <select name='gender[]' id='gender' style='width:430px;'><option value='' >-select-</option>";
				 
				 if($row['gender']=='M'){
				  $data.="<option value='M' 'selected' >Male</option>
				  <option value='F'  >Female</option>";
				}else if($row['gender']=='F'){
				   $data.="<option value='F' 'selected'  >Female</option>
				   <option value='M' >Male</option>
				  ";
				 
				 }
				 else
				 
				 $data.="
				 <option value='' >-select-</option>
				 <option value='M'>Male</option>
				  <option value='F'>Female</option>";
                  $data.="</select>
                  </label></td>
              </tr></td>
    </tr>
		
           <tr>
             <td>Telephone No.:</td>
      <td><input name='telephone[]' type='text' id='telephone' size='80' value='".$row['telephone']."' /></td>
    </tr>
  
	 <tr>
       <td colspan='2' >
	   <table width='30%' border='0' align='center'>
	   <tr><th  colspan='4'><center>Farmer Information</center></th></tr>
  <tr>
   <th width='6%'>NO</th>
    <th width='9%'>Male Farmers</th>
    <th width='10%'>Female Farmers</th>
    <th width='75%'>Total Number of Farmers</th>
  </tr>
   <tr>
   <td>1</td>
    <td><input name='male[]' type='text' id='male' size='20' value='".$row['maleFarmers']."' /></td>
    <td><input name='female[]' type='text' id='female' size='20' value='".$row['femaleFarmers']."'onKeyPress='return numbersonly(event, false)' /></td>
    <td><input name='total[]' type='text' id='total' size='20' value='".$row['totalF']."' onKeyPress='return numbersonly(event, false)' readonly='readonly' onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('male').value,getElementById('female').value,'total');return false;\" onBlur=\"xajax_calc_budget(getElementById('male').value,getElementById('female').value,'total');return false;\" /></td>
   </tr
></table>
	   
	   
</td>
    </tr>
	
	 <tr>
             <td colspan='2' align='center'><table width='200' border='0'>

   <tr><th  colspan='4'><center>Household Information</center></th></tr>
   <tr>
   <th>NO</th>
    <th>Male Headed</th>
    <th>Female Headed</th>
    <th>Total Number of Housedolds</th>
  </tr>
    <td>1</td>
    <td><input name='maleh[]' type='text' id='maleh' size='20' value='".$row['maleheadedHH']."' onKeyPress='return numbersonly(event, false)' /></td>
    <td><input name='femaleh[]' type='text' id='femaleh' size='20' value='".$row['maleheadedHH']."' onKeyPress='return numbersonly(event, false)' /></td>
    <td><input name='totalh[]' type='text' id='totalh' size='20' 
	value='".$row['totalHH']."'
	
	 readonly='readonly' onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('maleh').value,getElementById('femaleh').value,'totalh')\" /></td>
</table>
</td>
    </tr>
         <tr>
           <td COLSPAN=2>&nbsp;</td>
      <td><label>
        <div align='right'>
          <input type='button'  id='button' name='save_organization' class='button_width' id='save_organization' onclick=\"xajax_update_organization(xajax.getFormValues('organization_reds'));return false;\" value='Save' />
          </div>
      </label></td>
    </tr>
  </table></form>";
} 
	   
	   
	  }

$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
 



function update_organization($formvalues){
$obj=new xajaxResponse();
//$obj->alert(count($formvalues['orgcode']));
#$obj->addAlert(count($formvalues['org_code12']));
for($x=0;$x<count($formvalues['orgcode']);$x++){
$org_code=$formvalues['orgcode'][$x];
$orgName=mysql_real_escape_string($formvalues['orgname'][$x]);
$acronym=trim($formvalues['acronym'][$x]);
$registered=trim($formvalues['registered'][$x]);
$village=trim($formvalues['village'][$x]);
$country=trim($formvalues['zonename'][$x]);
$orgtype=trim($formvalues['orgtype'][$x]);
$district=mysql_real_escape_string($formvalues['district'][$x]);
$subcounty=mysql_real_escape_string($formvalues['subcounty'][$x]);
$parish=mysql_real_escape_string($formvalues['parish'][$x]);
$objectives=mysql_real_escape_string($formvalues['objectives'][$x]);
//$subcomponent=get_Stringorg($formvalues['subcomponent'][$x]);
$gender=trim($formvalues['gender'][$x]);
$password=trim($formvalues['password'][$x]);
$subsector=$formvalues['subsector'][$x];
#$obj->addAlert($subsector);
$address=mysql_real_escape_string($formvalues['address'][$x]);
$website=trim($formvalues['website'][$x]); 
$fax=trim($formvalues['fax'][$x]); 
$contact_person=trim($formvalues['contact_person'][$x]);
$title=trim($formvalues['title'][$x]);
$telephone=trim($formvalues['telephone'][$x]);
 $mobile=trim($formvalues['mobile'][$x]);
$contact_person2=trim($formvalues['contact_person2'][$x]);
$title2=trim($formvalues['title2'][$x]);
$telephone2=trim($formvalues['telephone2'][$x]);
$mobile2=trim($formvalues['mobile2'][$x]);
$contact_person3=trim($formvalues['contact_person3'][$x]);
$title3=trim($formvalues['title3'][$x]);
$telephone3=trim($formvalues['telephone3'][$x]);
$mobile3=trim($formvalues['mobile3'][$x]); /**/


if($orgName==""){
$obj->assign("status","innerHTML",errorMsg("Enter Organization Name"));
return $obj;
}
/*if($username==""){
$obj->assign("status","innerHTML",errorMsg("Enter userName"));
return $obj;
}*/
if($contact_person==""){
$obj->assign("status","innerHTML",errorMsg("Enter contact Person's Name"));
return $obj;
}

$insert="UPDATE tbl_organization set orgName='".ucwords($orgName)."',
acronym='".strtoupper($acronym)."',
district='".ucwords($district)."',
village='".$village."',
country_id='".$country."',orgtype='".$orgtype."',
subcounty='".ucwords($subcounty)."',parish='".ucwords($parish)."',
gender='".ucwords($gender)."',

brief_introduction='".ucwords($brief_introduction)."',
address='".strtoupper($address)."',
website='".$website."',fax='".$fax."',
contact_person='".$contact_person."',
title='".$title."',
telephone='".$telephone."',
mobile='".$mobile."',
contact_person2='".$contact_person2."',title2='".$title2."',telephone2='".$telephone2."',
mobile2='".$mobile2."',contact_person3='".$contact_person3."',
title3='".$title3."',
telephone3='".$telephone3."',
mobile3='".$mobile3."' where org_code='".$org_code."'";
$query=mysql_query($insert)or die(http(0617));
//$obj->alert($insert);
//$max
#mysql_query("update tbl_user set name='".ucwords($orgName)."',username='".$username."',password='".md5($password)."',subcomponent='".mysql_real_escape_string($subcomponent)."',usergroup='".$orgtype."',role)(select orgName,username,password,subcomponent,usergroup,organization_type from view_organization where username='".$username."');")or die("Sunrise error code 00236 because, ".mysql_error());
$obj->assign("bodyDisplay","innerHTML",congMsg("Organization Captured!"));
}

//$obj->call("xajax_view_organization",'','','',1,20);
//$obj->redirect('organization.php');
return $obj;
}





#--------------------------------edit_users-------------------------
 function edit_users($formvalues){
$object=new xajaxResponse();
$data="<form name='users' ID='users' method=post action='".$PHP_SELF."'>
<table cellspacing='0'      width='100%' border='0' align='left'>
		"; 
				for($i=0;$i<count($formvalues['user_id']);$i++){
				
 // $object->alert(count($formvalues['user_id']));
  $sql="select * from tbl_user where user_id='".$formvalues['user_id'][$i]."'";
 // $object->alert($sql);
				$sel=mysql_query($sql)or die(http(330));
				while($row=mysql_fetch_array($sel)){
				
			$data.="<tr>
                <td colspan='4' valign='top'><div id='status'></div></td>
              </tr>
			  <tr>
                <td colspan='4' valign='top'><hr></td>
              </tr>
              <tr>
                <td width='162'><input name='user_id[]' type='hidden'  size='40' id='user_id' value='".$row['user_id']."' /><div align=''>Name</div></td>
                <td width='3' align='right'><label> <span style='color:#ff0000;'>* </span></td><td>
                      <input name='fname[]' type='text'  size='70' id='fname' value='".$row['name']."' />
              </td>
				<td></td>
              </tr>
              
			  <tr>
                <td><div align=''>User Group:</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;' >*</td><td> 
                   <select name='usergroup[]' id='usergroup' style='width:376px;' >
												<option value=''>-select-</option>
												";
                    $select=mysql_query("select * from tbl_usergroup group by group_name order by group_name asc")or die(mysql_error());
					while($rowg=mysql_fetch_array($select)){
					$selgroup=($rowg['group_id']==$row['usergroup'])?"SELECTED":"";
                      $data.="
												<option value=\"".$rowg['group_id']."\" ".$selgroup." >".$rowg['group_name']."</option>
												";
					  }
                    $data.="
										</select>
                    </span></td>
                <td></td>
              </tr>
			   <tr>
                <td><div align=''>Role</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='role[]' id='role' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_role  group by role_name order by role_name asc")or die(mysql_error());
					while($rowr=mysql_fetch_array($select)){
					$selr=($rowr['role_id']==$row['role'])?"SELECTED":"";
                      $data.="<option value=\"".$rowr['role_id']."\" ".$selr.">".$rowr['role_name']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Organization:</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                   <select name='organization[]' id='organization' style='width:376px;' >
												<option value=''>-select-</option>
												";
                    $select=mysql_query("select * from tbl_organization group by orgName order by orgName asc")or die(mysql_error());
					while($rowo=mysql_fetch_array($select)){
					$selorg=($row['org_code']==$rowo['org_code'])?"SELECTED":"";
                      $data.="<option value=\"".$rowo['org_code']."\" ".$selorg.">".$rowo['orgName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Country:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='country[]' id='country' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_country group by countryName order by countryName asc")or die(mysql_error());
					while($rowdc=mysql_fetch_array($select)){
					$seldc=($rowdc['countryCode']==$row['country'])?"SELECTED":"";
                      $data.="<option value=\"".$rowdc['countryCode']."\" ".$seldc." >".$rowdc['countryName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>District/Province:</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='district[]' id='district' style='width:376px;' >
												<option value=''>-select-</option>
												";
                    $select=mysql_query("select * from tbl_district group by districtName order by districtName asc")or die(mysql_error());
					while($rowd=mysql_fetch_array($select)){
					$seld=($rowd['districtCode']==$row['district'])?"SELECTED":"";
                      $data.="<option value=\"".$rowd['districtCode']."\" ".$seld.">".$rowd['districtName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Program:</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;'>*</td><td>
                    <select name='program[]' id='program' style='width:376px;'><option value=''>-select-</option>
					<option value='N/A'>-N/A-</option>";
                    $select=mysql_query("select * from tbl_programme group by program_name order by program_name asc")or die(mysql_error());
					while($rowp=mysql_fetch_array($select)){
					$selp=($row['program_code']==$rowp['prog_id'])?"SELECTED":"";
                      $data.="<option value=\"".$rowp['prog_id']."\" ".$selp.">".$rowp['program_code']." ".substr($rowp['program_name'],0,70)."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			   <tr>
                <td><div align=''>Sub-Program:</div></td>
                <td align='right'><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='subcomponent[]' id='subcomponent' style='width:376px;'><option value=''>-select-</option>
					";
                    $selects=mysql_query("select * from tbl_subcomponent group by subcomponent order by subcomponent_code asc")or die(mysql_error());
					while($rows=mysql_fetch_array($selects)){
					$selw=($row['subcomponent_id']==$rows['subcomponent_id'])?"SELECTED":"";
                      $data.="<option value=\"".$rows['subcomponent_id']."\" ".$selw.">".$rows['subcomponent_code']." ".substr($rows['subcomponent'],0,70)."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
             <tr>
                <td><div align=''>Project:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='Project[]' id='Project' style='width:376px;'><option value=''>-select-</option>
					";
                    $selectp=mysql_query("select * from tbl_project group by title order by title asc")or die(mysql_error());
					while($rowp=mysql_fetch_array($selectp)){
						$selp=($row['project_id']==$rowp['id'])?"SELECTED":"";

                      $data.="<option value=\"".$rowp['project_id']."\" ".$selp." >".$rowp['project_code']." ".substr($rowp['title'],0,70)."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Username</div></td>
                <td colspan='' width='2' align='right'><label></label>
                    <span style='color:#ff0000;'>* </span></td><td colspan=2>
                    <input type='text' size='70' name='username[]' id='username' value='".$row['username']."' />
					<em>[hint]</em>  <b>firstname.second Name</b></td>
              </tr>
              <tr>
                <td><div align=''>Desired Password</div></td>
                <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                    <input name='password[]' type='password'  id='password' size='70'  value='".$row['password']."' /></td>
					<td></td>
              </tr>
              <tr>
                <td width='162'>confirm password</td>
                <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                    <input type='password' size='70' name='cpass[]' id ='cpass'  value='".$row['password']."' /></td>
					<td></td>
              </tr>
              <tr>
        <td>Verification Code </td><td></td>
		
            <td class='evenrow' background='images/pub.jpg'>";
			$code = generateCode(6);
              $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
              <input type='hidden' name='code[]'  size='70' id='code' value='".$code."' /></td><td style='padding: 10px 7px 7px;' <a tabindex='6' href=\"javascript:Recaptcha.reload();\" title='Get two new words' id='recaptcha_reload_btn'><img src='http://www.google.com/recaptcha/api/img/clean/refresh.png' id='recaptcha_reload' alt='Get two new words' width='25' height='18'></a> <a tabindex='7' href=\"javascript:Recaptcha.switch_type('audio');\" title='Audio challenge' id='recaptcha_switch_audio_btn' class='recaptcha_only_if_image'><img src='http://www.google.com/recaptcha/api/img/clean/audio.png' id='recaptcha_switch_audio' alt='Audio challenge' width='25' height='15'></a><a tabindex='8' href=\"javascript:Recaptcha.switch_type('image');\" title='Visual challenge' id='recaptcha_switch_img_btn' class='recaptcha_only_if_audio'><img src='http://www.google.com/recaptcha/api/img/clean/text.png' id='recaptcha_switch_img' alt='Visual challenge' width='25' height='15'></a> <a tabindex='9' target='_blank' href='http://www.google.com/recaptcha/help?c=03AHJ_VuvT0DMV-Y9hwnvfcbjhkc1VlCFOGet8ll55LohTirWXhn_cZAqn_l6_s5ko40zc15s5G_9eVWhOqhwOL-LUqOmuXLCWHGbeDCw7AgxNKh8-FSazKLaEA1nRbdNczqJUveZj6GfxAoEPIFKdJRMG20GJZRZghA&amp;hl=en-GB' title='Help' id='recaptcha_whatsthis_btn'><img alt='Help' src='http://www.google.com/recaptcha/api/img/clean/help.png' id='recaptcha_whatsthis' width='25' height='16'></a> </td> <td style='padding: 18px 7px;'> <img src='http://www.google.com/recaptcha/api/img/clean/logo.png' id='recaptcha_logo' alt='' width='71' height='36'></td></tr>
                
             
              <tr>
                <td colspan =''>Enter code above </td>
                <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                    <input type='text' name='vcode[]' size='70' id ='vcode' />                </td>
				<td width='500' class='redhdrs' align=left>Case Sensitive!</td>
              </tr>";
			  
		
				}
				
				}
				
				$data.="
				<tr>
						<td>&nbsp;</td>
						<td align='right' colspan=2>
								<input name='reg_user' type='button'  id='button' style='width:140px;'  id='reg_user' value='Save' onclick=\"xajax_update_users(xajax.getFormValues('users')); \" />
						</td>
				</tr>
		</table>
</form>";
$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}


function update_users($formvalues){
$obj=new xajaxResponse();
/* if($_SESSION['role']<>'Systems Administrator'){
$object->alert("Access Denied!\n Only Systems Adminstrator  can edit a setup Item");
$object->redirect("index.php");
return $object;
} */
for($x=0;$x<count($formvalues['user_id']);$x++){
$user_id=$formvalues['user_id'][$x];
$fname=$formvalues['fname'][$x];
$usergroup=$formvalues['usergroup'][$x];
$role=$formvalues['role'][$x];
$username=$formvalues['username'][$x];
$organization=$formvalues['organization'][$x];
$district=$formvalues['district'][$x];
$program=$formvalues['program'][$x];
$subcomponent=$formvalues['subcomponent'][$x];
$project_id=$formvalues['project_id'][$x];
$password=$formvalues['password'][$x];
$cpass=$formvalues['cpass'][$x];
$code=$formvalues['code'][$x];
$vcode=$formvalues['vcode'][$x];
$country=$formvalues['country'][$x];

if($fname==''){
$obj->assign('status',"innerHTML",errorMsg("Missing FirstName"));
return $obj;
}
if($username==''){
$obj->assign('status',"innerHTML",errorMsg("Missing LastName"));
return $obj;
} if ($password==''){
$obj->assign('status',"innerHTML",errorMsg("Missing Password"));
return $obj;
}
 if($cpass==''){
$obj->assign('status',"innerHTML",errorMsg("confirm Password!"));
return $obj;
}
if(strlen($password)<6){
$obj->assign('status',"innerHTML",errorMsg("Weak Password,Password should be more than 6 characters"));
return $obj;
} 
if($password!=$cpass){
$obj->assign('status',"innerHTML",errorMsg("Password Mismatch"));
return $obj;
}
if($vcode==''){
$obj->assign('status',"innerHTML",errorMsg("Enter Verification Code"));
return $obj;
}
if($code!=$vcode){
$obj->assign('status',"innerHTML",errorMsg("Invalid Verification Code"));
return $obj;
}
 
$xx="update tbl_user set name='".$fname."',username='".$username."',usergroup='".$usergroup."',program_id='".$program."',subcomponent='".$subcomponent."',project_id='".$project_id."',password='".md5($password)."',role='".$role."',district='".$district."',org_code='".$organization."',country='".$country."' where user_id='".$user_id."'";
#$object->addAlert($xx);
mysql_query($xx)or die(mysql_error());
}
$obj->assign('bodyDisplay','innerHTML',congMsg("User Changed Successfully!"));
$obj->call("xajax_view_users",'','','','','','','','','');
return $obj;

}
#------------------------end--------------------------------------------------------

function edit_relatedLink(){
$obj=new xajaxResponse();
$data="
              <form action='functions.php' method='post' NAME='comments' id='comments' enctype='multipart/form-data'>
                <table cellspacing='0'      width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table cellspacing='0'      border='0'>";
					for($i=0;$i<count($formvalues['relatedlink_id']);$i++){
					$link_id=$formvalues['relatedlink_id'][$i];
					  $query114=mysql_query("select * from tbl_relatedLinks where relatedlink_id='".$link_id."'")or die(mysql_error());
					  while($row=mysql_fetch_array($query114)){
					  $data.="<tr>
                          
 
 
 
                          <td colspan=2><hr></td>
                        </tr>
                        <tr>
                          <td class=''>Link Name:</td>
                          <td><input name='relatelink_id[] type='text' id='relatelink_id' size='48' value='".$row['relatedlink_id']."' />
						  <input name='linkname' type='text' id='linkname' size='48' value='".$row['linkName']."' /></td>
                        </tr>
                        <tr>
                          <td>Url</td>
                          <td><input name='url' type='text' id='url' size='48' value='".$row['url']."' /></td>
                        </tr>
                        <tr>
                          <td>Attach Logo if any:</td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file' value='".$row['logo']."'  id='img_file' size='35'></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'><input type='submit' name='save_relatedLink' id='save_relatedLink'  value='Save' /></td>
                        </tr>";
						}
						}
                      $data.="</table>
                   </td>
                  </tr>
                </table>
              </form>
           ";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
//<a href='functions.php?linkvar=Save_Related_Link&&action=Related Links'>
}





 function edit_district($formvalues,$linkvar){
$object=new xajaxResponse(); 

$data="<form name='new_district' id='new_district' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' ><table cellspacing='0'      width='100%' border='0'> ";
switch($linkvar){
case "edit_district":
for($i=0;$i<count($formvalues['district_code']);$i++){
$district_code=$formvalues['district_code'][$i];
$check="select * from tbl_district where districtCode ='".$district_code."'";
#$object->addAlert($check);
$select = mysql_query($check)or die(http(3577));
while($row = mysql_fetch_array($select)){

              
              $data.="
			 
            <tr>
                      <td>Entry Type:</td>
					  <select name='entryType[]' id='entryType' size='1'>";
					  
					  if($row['entryType']=='District') {
					  $data.="<option value='District' selected='selected'>District</option>
					  <option value='Municipality'>Municipality</option>";
					 } else if($row['entryType']=='Municipality') {
					   $data.="<option value='Municipality' selected='selected'>Municipality</option>
					   <option value='District' >District</option>
					  ";
					  }else {
					  $data.="<option value=''>-select-</option>
					  <option value='Municipality' >Municipality</option>
					   <option value='District' >District</option>
				
					  ";
					  }


	$data.="</select>
                    </tr>
                    <tr>
                      <td>District Name:</td>
					  <td>
					<input type='hidden' id='district_code'  name='district_code[]'  value='".$row['districtCode']."' size='25' />  
			<input type='text' id='districtname'  name='districtname[]'  value='".$row['districtName']."' size='25' /></td>
                    </tr>
                    <tr>
                      <td>Acronym:</td>
					  <td><input type='text' id='acronym'  name='acronym[]'  value='".$row['acronym']."' size='25' /></td>
                    </tr>
					<tr>
                      <td>Zone:</td>
					  <td><select name='zone[]' size='1' id='zone'><option value=''>-Select-</option>";
	  $selzone=mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC")or die(http(2427));
	  while($rowzone=mysql_fetch_array($selzone)){
	  $selectedzone=($row['zone']==$rowzone['zoneCode'])?"selected":"";
	  $data.="<option value=\"".$rowzone['zoneCode']."\" ".$selectedzone." >".$rowzone['zoneName']."</option>";
	  }
$data.="</select></td>
                    </tr>
					
					
					<tr>
                      <td>No. of TSO service Providers:</td>
					  <td><input type='text' id='serviceprovider'  name='serviceprovider[]'  value='".$rowedit['serviceprovider']."' size='25' /></td>
                    </tr>
					";
					}
					}
               $data.="<tr>
                      <td colspan=2></td>
                      <td><input type='button'  id='button' id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_district')\" /></td>
                    </tr>
                  ";
				  break;
					
					case "edit_subcounty":
					#========edit_subcounty========================
					
					for($i=0;$i<count($formvalues['subcountyCode']);$i++){
$subcountyCode=$formvalues['subcountyCode'][$i];
$check="select * from tbl_subcounty where subcountyCode ='".$subcountyCode."'";
#$object->addAlert($check);
$select = mysql_query($check)or die(http(3577));
while($rowedit = mysql_fetch_array($select)){

$data.="
		<tr>
    <td colspan='2'><hr></td></tr>
  <tr>
    <td>District Name:</td>
    <td width='162'><select name='districtCode[]' id='districtCode' size='1'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_district order by districtCode asc")or die(http());
	while($row=mysql_fetch_array($query)){
	$seldistrict=($rowedit['districtCode']==$row['districtCode'])?"SELECTED":"";
	$data.="<option value=\"".$row['districtCode']."\" ".$seldistrict." >".$row['districtName']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Subcounty:</td>
    <td><input type='text' name='subcountyName[]' id='subcountyName' value='".$rowedit['subcountyName']."' />
	<input type='hidden' name='subcountyCode[]' id='subcountyCode' value='".$rowedit['subcountyCode']."'>
	
	</td>
  </tr>";
  
}


}

$data.="<tr>
<td colspan=''></td>
<td><input type='button'  id='button' id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_subcounty')\" /></td>
                   
  </tr>
";
					
					
					break;
				case "edit_parish":	
				
for($i=0;$i<count($formvalues['ParishCode']);$i++){
$ParishCode=$formvalues['ParishCode'][$i];
$check="select * from tbl_parish where ParishCode ='".$ParishCode."'";
#$object->addAlert($check);
$select = mysql_query($check)or die(http(3577));
while($rowedit = mysql_fetch_array($select)){
				
				
				$data.="
				<tr>
    <td colspan='2'><hr></td></tr>
  <tr>
    <td>District Name:</td>
    <td width='162'>
	<input type='hidden' name='ParishCode[]' id='ParishCode' value='".$rowedit['ParishCode']."'>
	<select name='districtCode[]' id='districtCode' size='1'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_district order by districtName asc")or die(http(2017));
	while($row=mysql_fetch_array($query)){
	$seldistrict=($rowedit['districtCode']==$row['districtCode'])?"selected":"";
	$data.="<option value=\"".$row['districtCode']."\" ".$seldistrict." >".$row['districtName']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Subcounty:</td>
    <td><select name='subcountyName[]' id='subcountyName' size='1'><option value=''>-select-</option>";

	$querysubcounty=mysql_query("select * from tbl_subcounty order by subcountyName asc")or die(http(2026));
	while($rowsubcounty=mysql_fetch_array($querysubcounty)){
	$selsubcounty=($rowedit['subcountyCode']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
	$data.="<option value=\"".$rowsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowsubcounty['subcountyName']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Parish Name:</td>
    <td width='162'><input type='text' name='parishName[]' id='parishName' value='".$rowedit['ParishName']."' /></td>
  </tr>";
  }
  
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button'  id='button' name='button' id='button' value='Save' onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_parish')\" />
    </div></td>
  </tr>
";

				
				
				
				break;
				default:
				
				}	
					
					
					
                 $data.=" </table></form>";


$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}


#****************************************************


function update_district($formvalues,$linkvar){
$object=new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$object->AddAlert("Access Denied!\n Only the Monitoring and Evaluation can Change District Details");
$object->redirect("index.php");
return $object;
} */

switch($linkvar){
case "edit_district":
for($i=0;$i<count($formvalues['district_code']);$i++){
$districtCode=$formvalues['district_code'][$i];
$districtName=$formvalues['districtname'][$i];
$zone=$formvalues['zone'][$i];
$acronym=$formvalues['acronym'][$i];
$serviceprovider=$formvalues['serviceprovider'][$i];

$entryType=$formvalues['entryType'][$i];
$sql="update tbl_district set districtName='".$districtName."',acronym='".$acronym."',zone='".$zone."',entryType = '".$entryType."',tso_service_providers='".$serviceprovider."' where  districtCode='".$districtCode."'";
#$object->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
$object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$object->call('xajax_view_district','',1,20);
}
break;
case "edit_subcounty":

for($i=0;$i<count($formvalues['subcountyCode']);$i++){
$subcountyCode=$formvalues['subcountyCode'][$i];
$districtCode=$formvalues['districtCode'][$i];
$subcountyName=$formvalues['subcountyName'][$i];

$sql="update tbl_subcounty set districtCode='".$districtCode."',subcountyName='".$subcountyName."' where  subcountyCode='".$subcountyCode."'";
#$object->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
}
$object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$object->call('xajax_view_subcounty','','','',1,20);


break;

case "edit_parish":

for($i=0;$i<count($formvalues['ParishCode']);$i++){
$ParishCode=$formvalues['ParishCode'][$i];
$districtCode=$formvalues['districtCode'][$i];
$subcountyCode=$formvalues['subcountyName'][$i];
$parishName=$formvalues['parishName'][$i];

$sql="update tbl_parish set districtCode='".$districtCode."',subcountyCode='".$subcountyCode."' where  ParishCode='".$ParishCode."'";
#$object->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
}
$object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$object->call('xajax_view_parish','','','','',1,20);
break;

default:
}

return $object;
}



function edit_document($formvalues){
$obj=new xajaxResponse();
$data="<table cellspacing='0'      width='400' border='0'>


          <tr>
            <td>
              <form action='functions.php' method='post' NAME='document' id='document' enctype='multipart/form-data'>
                <table cellspacing='0'      width='535' border='0'>
                  
				  <tr>
                    <td width='517'>
                      <table cellspacing='0'      border='0'>";
for($i=0;$i<count($formvalues['document_id']);$i++){
$id=$formvalues['document_id'][$i];		
$sql="select * from tbl_documents where document_id='".$id."'";		
  #$obj->addAlert($sql);
$QUERY=mysql_query($sql)or die("Sunrise Error code 4487 because ".mysql_error());
while($row=mysql_fetch_array($QUERY)){
				  $data.="
				  
					  
					  <tr><td colspan=2><hr></td></tr>
                        <tr>
                          <td class=''>Document Name:</td>
                          <td>
		<input name='document_id' type='hidden' id='document_id' size='48' VALUE='".$row['document_id']."' />
		<input name='document_name' type='text' id='document_name' size='48' VALUE='".$row['document_name']."' /></td>
                        </tr>
                       
                        <tr>
                          <td>Upload Document:</td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file'  id='img_file' size='35' value='".$row['file_name']."'></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'></td>
                        </tr>";
						
						#onclick=\"xajax_update_document(xajax.getFormValues('document'))\"
						}
						
						}
                        $data.="<tr>
                          <td>&nbsp;</td>
                          <td align='right'><input type='submit' name='update_document' id='save_document'  value='Save'  /></td>
                        </tr>
                      </table>
                   </td>
                  </tr>
                </table>
              </form></td>
          </tr>
        </table>";
          
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;

}


function update_document($formvalues){
$object=new xajaxResponse();
if($_SESSION['role']<>'Systems Administrator'){
$object->AddAlert("Access Denied!\n Only the Systems Administrator can edit a Document");
$object->redirect("index.php");
return $object;
}
for($i=0;$i<count($formvalues['document_id']);$i++){
$districtCode=$formvalues['districtCode'][$i];
$districtName=$formvalues['districtName'][$i];
$acronym=$formvalues['acronym'][$i];
$sql="update tbl_district set districtName='".$districtName."' acronym='".$acronym."' where  districtCode='".$districtCode."'";
//$object->addAlert($sql);
$check=mysql_query($sql)or die(mysql_error());
}
$object->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$object->call('xajax_view_district','','',1,20);
return $object;
}


#---------------------home details------------------------
function edit_home($formvalues){
 $object=new xajaxResponse();
 $data.="<form name='home2' id='home2' style=''><table cellspacing='0'      width='100%' border='0'>";
  //$object->addAlert($formvalues['home_id']);
 for($i=0;$i<count($formvalues['home_id']);$i++){
 $home_id=$formvalues['home_id'][$i];
 #$object->addAlert($home_id);
 $query=mysql_query("select * from tbl_home where home_id='".$home_id."'")or die("Sunrise error code 4565 because, ".mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="<tr>
    <td>Heading</td>
    <td><input type='hidden' name='home_id[]' id='textfield' size='113' value='".$row['home_id']."' />
	<input type='text' name='heading[]' id='textfield' size='113' value='".$row['head']."' /></td>
  </tr>
  <tr>
    <td>Body</td>
    <td><textarea name='body[]' id='body' cols='110' rows='15'>".$row['body']."</textarea></td>
  </tr>";
  
  }}
  $data.="<tr>
    <td></td>
    <td><div style='float:right;'><input name='save' type='button'  id='button' value='Save' onclick=\"xajax_update_home(xajax.getFormValues('home2'));\" /></div></td>
  </tr>
</table></form>"; 
 $object->assign('bodyDisplay','innerHTML',$data);
return $object;
 }
 
 
 
 function update_home($formvalues){
$obj=new xajaxResponse();
#$obj->addAlert(count($formvalues['home_id']));
for($i=0;$i<count($formvalues['home_id']);$i++){
$home_id=$formvalues['home_id'][$i];
$heading=mysql_real_escape_string($formvalues['heading'][$i]);
$body=mysql_real_escape_string($formvalues['body'][$i]);
mysql_query("update tbl_home set head='".$heading."',body='".$body."' where home_id='".$home_id."' ")or die("Sunrise Error-code 4600 because, ".mysql_error());

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Home details Edited!"));
$obj->call("xajax_view_home",'');
return $obj;
}

 

function edit_usergroup($formvalues){
$object=new xajaxResponse();
$data="<form  name='usergroup12' id='usergroup12' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['group_id']);$x++){
  //$object->alert($formvalues['group_id']);
  $query=mysql_query("select * from tbl_usergroup where group_id='".$formvalues['group_id'][$x]."'")or die(http("3226"));
  while($row=mysql_fetch_array($query)){
  $data.="
  <tr>
   
    <td colspan=1><hr></td>
  </tr>
  <tr>
    <td >Group Name</td>
    <td>
	<input name='group_id[]' type='hidden' id='group_id' size='48' value='".$row['group_id']."' />
	<input name='groupname[]' type='text' id='groupname' size='48' value='".$row['group_name']."' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['description']."</textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='left'>
      <input type='button'  id='button' class='button_width' name='update_usergroup' id='update_usergroup' value='Save' onclick=\"xajax_update_usergroup(xajax.getFormValues('usergroup12'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}

#---------------------------update usergroup------------------------------------
function update_usergroup($formvalues){
$object=new xajaxResponse();
for($x=0;$x<count($formvalues['group_id']);$x++){
$groupname=$formvalues['groupname'][$x];
$desc=$formvalues['desc'][$x];


$update="update tbl_usergroup set group_name='".$groupname."',description='".$desc."',updatedby='".$_SESSION['username']."' where group_id='".$formvalues['group_id'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$object->call("xajax_view_usergroup",'');
return $object;
}

//----------------edit role---------------------------
function edit_role($formvalues){
$object=new xajaxResponse();
$data.="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['role_id']);$x++){
 // $object->alert($formvalues['role_id']);
  // $object->alert(count($formvalues['role_id']));
  $query=mysql_query("select * from tbl_role where role_id='".$formvalues['role_id'][$x]."'")or die(http("3226"));
  while($row=mysql_fetch_array($query)){
  $data.="
  <tr>
   
    <td colspan=1><hr></td>
  </tr>
  <tr>
    <td>User Group</td>
    <td><select name='group_name[]' id='group_name' style='width:270px;'><option value=''>-All-</option>";
       $queryR=mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc")or die(mysql_error());
  while($rowR=mysql_fetch_array($queryR)){ 
  $sel=($row['usergroup']==$rowR['group_id'])?"SELECTED":"";
  $data.="<option value=\"".$rowR['group_id']."\" ".$sel.">".substr($rowR['group_name'],0,40)."</option>";
   }
      $data.="</select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td >Role Name</td>
    <td>
	<input name='role_id[]' type='hidden' id='role_id' size='48' value='".$row['role_id']."' />
	<input name='rolename[]' type='text' id='rolename' size='48' value='".$row['role_name']."' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['description']."</textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='left'>
      <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_role(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}
//----------update role-------------------------------
function update_role($formvalues){
$object=new xajaxResponse();
for($x=0;$x<count($formvalues['role_id']);$x++){
$role=$formvalues['rolename'][$x];
$group_name=$formvalues['group_name'][$x];

$desc=$formvalues['desc'][$x];


$update="update tbl_role set role_name='".mysql_real_escape_string($role)."',description='".mysql_real_escape_string($desc)."',usergroup='".$group_name."',updatedby='".$_SESSION['username']."' where role_id='".$formvalues['role_id'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$object->call("xajax_view_role",'','');
return $object;
}

//-------------------update dropdown list ------------------------


function edit_dropdownList($formvalues){
$object=new xajaxResponse();
$data="<form  name='dropdown' id='dropdown' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0' >
<tr class='white1'><td colspan=5><div id='status'></div></td>
  </tr>
  
  
  
  </tr>
				  <tr class='evenrow2'>
                    <th width='50' class=''>No.</th>
					<th class=''>Class Code</th>
                    <th class=''>drop-down description </th>
					  <th class=''>DROP-DOWN name</th>
					    <th class=''>REMARKS</th>
                  </tr>
				  
				  ";
				  
				  $inc=1;
				 $n=1;
  for($i=0;$i<count($formvalues['code']);$i++){
  $sel=mysql_query("select * from tbl_lookup where code='".$formvalues['code'][$i]."'") or die(http(3395));
  while($row=mysql_fetch_array($sel)){
  $color=$n%2==1?"evenrow3":"white1";
  $data.="<tr class='$color'>
  <td width=''>".$n."</td>
   <td width=''><input name='code[]'  id='code' value='".$row['code']."' type='hidden' size='20'>
   <input name='classcode[]'  id='classcode' value='".$row['classCode']."' type='text' size='20'></td>
   
 <td ><input name='classDescription[]' type='text' value='".$row['classDescription']."' size='40'></td>
 <td><input name='codeName[]' type='text' value='".$row['codeName']."' size='40'></td> 
 <td><textarea name='desc[]' id='desc' cols='45' rows='5'>".$row['notes']."</textarea></td> 
  </tr>";
  $n++;
  }
  }
	
	$data.="<tr class='evenrow'>
  <td width=''></td>
   <td width=''></td>
   
 <td ></td>
 <td></td> 
 <td><input name='save_dropdown' type='button'  id='button' value='Save' class='button_width' onclick=\"xajax_update_dropdownlist(xajax.getFormValues('dropdown'));\"></td> 
  </tr>";
$data.="</table></form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}




function update_dropdownlist($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['code']);$i++){

$classDescription=$formvalues['classDescription'][$i];
$classcode=$formvalues['classcode'][$i];
$codeName=$formvalues['codeName'][$i];
$desc=$formvalues['desc'][$i];
$code=$formvalues['code'][$i];
if($codeName!==''){
$insert="update tbl_lookup set `classCode`='".$classcode."',`classDescription`='".$classDescription."',`codeName`='".$codeName."', `notes`='".$desc."',updatedby='".$_SESSION['username']."' where code='".$code."'";
@mysql_query($insert)or die(http('0013'));

}}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_dropdownList",'','');
return $obj;
}


//------------------------edit new menu category-----------------
function edit_menu_category($formvalues){
$object=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
  //$object->alert($formvalues['group_id']);
  $query=mysql_query("select * from tbl_menu_categories where tbl_menu_categoriesId='".$formvalues['tbl_menu_categoriesId'][$x]."' order by Rank asc")or die(http("3226"));
  while($row=mysql_fetch_array($query)){
  $data.="
  <tr>
   
    <td colspan=1><hr></td>
  </tr>
  
  <tr>
    <td >Menu Category</td>
    <td>
	<input name='tbl_menu_categoriesId[]' type='hidden' id='tbl_menu_categoriesId' size='48' value='".$row['tbl_menu_categoriesId']."' />
	<input name='MenuCategory[]' type='text' id='MenuCategory' size='48' value='".$row['MenuCategory']."' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Rank</td>
    <td><input name='Rank[]' id='Rank' type='text' value='".$row['Rank']."' size='48' ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='left'>
      <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_category(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}
//----------------------update New Menu item---------------------
function update_menu_category($formvalues){
$object=new xajaxResponse();
for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
$MenuCategory=$formvalues['MenuCategory'][$x];
$Rank=$formvalues['Rank'][$x];


$update="update tbl_menu_categories set MenuCategory='".mysql_real_escape_string($MenuCategory)."',Rank='".mysql_real_escape_string($Rank)."',updatedby='".$_SESSION['username']."' where tbl_menu_categoriesId='".$formvalues['tbl_menu_categoriesId'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$object->call("xajax_view_menu_category",'');
return $object;
}
//----------------------edit sub menu-----------------------
function edit_menu_items($formvalues){
$object=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
  //$object->alert($formvalues['group_id']);
  $query=mysql_query("select * from tbl_menu_items where tbl_menu_itemsId='".$formvalues['tbl_menu_itemsId'][$x]."' order by Rank asc")or die(http("3226"));
  while($row=mysql_fetch_array($query)){
  $data.="
  <tr>
   
    <td colspan=1><hr></td>
  </tr>
  
  <tr>
    <td >Menu Category</td>
    <td>
	<input name='tbl_menu_itemsId[]' type='hidden' id='tbl_menu_itemsId' size='48' value='".$row['tbl_menu_itemsId']."' />
	
	<select name='category[]' id='category' style='width:270px;'><option value=''>-select-</option>";
       $queryc=mysql_query("select * from tbl_menu_categories  order by MenuCategory asc")or die(mysql_error());
  while($rowc=mysql_fetch_array($queryc)){
  $selc=($row['MenuCategory']==$rowc['tbl_menu_categoriesId'])?"selected":"";
  $data.="<option value=\"".$rowc['tbl_menu_categoriesId']."\" ".$selc.">".$rowc['MenuCategory']."</option>";
   }
      $data.="</select>
	</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Menu Item </td>
    <td><input name='MenuItem[]' id='MenuItem' type='text' value='".$row['MenuItem']."' size='48' ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
   <tr>
    <td>Rank</td>
    <td><input name='Rank[]' id='Rank' type='text' value='".$row['Rank']."' size='48' ></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Action</td>
    <td><input name='action[]' type='text' id='action' size='48.5' value='".$row['action']."' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Page</td>
    <td><input name='page[]' type='text' id='page' size='48.5' value='".$row['page']."' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  }
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='left'>
      <input type='button'  id='button' class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_items(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}
//----------------------update sub menu---------------------
function update_menu_items($formvalues){
$object=new xajaxResponse();
for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
$MenuCategory=$formvalues['category'][$x];
$Rank=$formvalues['Rank'][$x];
$MenuItem=$formvalues['MenuItem'][$x];
$page=$formvalues['page'][$x];
$action=$formvalues['action'][$x];

$update="update `tbl_menu_items` set MenuCategory='".$MenuCategory."',Rank='".$Rank."',action='".$action."',MenuItem = '".$MenuItem."',LinkvalCode='".$MenuItem."',page='".$page."',updatedby='".$_SESSION['username']."' where tbl_menu_itemsId='".$formvalues['tbl_menu_itemsId'][$x]."'";
//$object->alert($update);
@mysql_query($update)or die(http('0145'));
}

$object->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$object->call("xajax_view_menu_items",'','');
return $object;
}


function edit_FarmersProductionRecords($formvalues){
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
  

	<tr class='evenrow3'>
          
          
        </tr>

  
  <tr><td colspan=6><div id='statusxxx'></div></td></tr>
	<tr class='evenrow'>
    <td colspan=10><table>
	 <tr CLASS='evenrow'>
 
    <th colspan='23' ><center>farmer production records</center></th>
	
  </tr>
   <tr CLASS='evenrow'>
  <th >NO</th>
      <th>organization</th>
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
	for($x=0;$x<count($formvalues['fid']);$x++){
	$query=mysql_query("SELECT `fid`, `org_code`, `FarmerName`, `sex`, `LeadFarmer`, `Totalareaundercropproduction`, `AreaundercropLegumes`,AreaunderHoebasins, `crophoebasin`, `yieldhoebasin`, `selling_pricehoebasin`, `AreaunderADPripping`, `cropadpripping`, `yieldcropadpripping`, `selling_pricecropadpripping`, `AreaunderMechanizedripping`, `cropmechanized`, `yieldmechanized`, `selling_pricemechanized`, `doptedCF/CA`, `AreaunderCF/CA`, `Herbicideuse`, `Burntcropresidues`, `display`, `updatedby`, `lastupdated` FROM `tbl_farmerproductionrecords`  where fid='".$formvalues['fid'][$x]."'")or die(http("Edit-2140"));
  while($row=@mysql_fetch_array($query)){
	$data.="<tr class='evenrow'>
	<td> <input name='loopkey[]' type='hidden' id='loopkey' size='40' value='".$row['fid']."'  />".$n."</td>
	<td colspan=''><select name='org_code[]' id='org_code' style='width:100px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_organization order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http("PR-2496"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($row['org_code']==$ROW['org_code'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['org_code']."\" ".$selected." >".substr($ROW['orgName'],0,500)."</option>";}
		  $data.="</select></td>
	<td> <input name='name[]' type='text' id='male".$n."' size='40' value='".$row['FarmerName']."'  /></td> 
	<td>
	 <input name='sex[]' type='text' id='sex".$n."' size='5' value='".$row['sex']."'  />
	</td>
	<td> <input name='leadFarmer[]' type='text' id='leadFarmer".$n."' size='5' value='".$row['sex']."' onKeyPress='return numbersonly(event, false)' /></td>
	<td><input name='total[]' six='20' onKeyPress='return numbersonly(event, false)' value='".$row['Totalareaundercropproduction']."'  type='text' id='total".$n."'  /></td>
	<td> <input name='croplegumes[]' type='text' id='croplegumes".$n."' size='5' value='".$row['AreaundercropLegumes']."' onKeyPress='return numbersonly(event, false)' /></td>
	
	<td> <input name='hoebasin[]' type='text' id='hoebasin".$n."' size='5' value='".$row['AreaunderHoebasins']."' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='crophoebasin[]' id='crophoebasin'><option value=''>-select-</option>";
	$s=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row1=@mysql_fetch_array($s)){
	$data.="<option value=\"".$row1['crop_id']."\" ".checkExistance($row1['crop_id'],$row['crophoebasin'],'selected')." >".$row1['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldhoebasin[]' type='text' id='yieldhoebasin".$n."' value='".$row['yieldhoebasin']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_pricehoebasin[]' type='text' id='selling_pricehoebasin".$n."' value='".$row['selling_pricehoebasin']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	
	<td> <input name='adpripping[]' type='text' id='adpripping".$n."' value='".$row['AreaunderADPripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='cropadpripping[]' id='cropadpripping'><option value=''>-select-</option>";
	$s1=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row1=@mysql_fetch_array($s1)){
	$data.="<option value=\"".$row1['crop_id']."\"  ".checkExistance($row1['crop_id'],$row['cropadpripping'],'selected')." >".$row1['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldadpripping[]' type='text' id='yieldadpripping".$n."' value='".$row['yieldcropadpripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_priceadpripping[]' type='text' id='selling_priceadpripping".$n."' value='".$row['selling_pricecropadpripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	
	
	
	<td> <input name='mechanized[]' type='text' id='mechanized".$n."' value='".$row['AreaunderMechanizedripping']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='cropmechanized[]' id='cropmechanized'><option value=''>-select-</option>";
	$s2=@mysql_query("select * from tbl_crops")or die(http("PR-2425"));
	while($row2=@mysql_fetch_array($s2)){
	$data.="<option value=\"".$row2['crop_id']."\" ".checkExistance($row2['crop_id'],$row['cropmechanized'],'selected')." >".$row2['cropName']."</option>";
	}
	$data.="</select> </td>
	<td> <input name='yieldmechanized[]' type='text' id='yieldmechanized".$n."' value='".$row['yieldmechanized']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	<td> <input name='selling_pricemechanized[]' type='text' id='selling_pricemechanized".$n."' value='".$row['selling_pricemechanized']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		
	<td> <input name='adoptedadpca[]' type='text' id='adoptedadpca".$n."' value='".$row['doptedCF/CA']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='areaundercfca[]' type='text' id='areaundercfca".$n."' value='".$row['AreaunderCF/CA']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='herbicideuse[]' type='text' id='herbicideuse".$n."' value='".$row['Herbicideuse']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
		<td> <input name='burntcropresidues[]' type='text' id='burntcropresidues".$n."' value='".$row['Burntcropresidues']."' size='5' onKeyPress='return numbersonly(event, false)' /></td>
	</tr>";
	$n++;}}
	
	

  $data.=" </table></td>
	 
    </tr>
  
  ";
 
 
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
        <button type='button'  id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_FarmersProductionRecords(xajax.getFormValues('projects')); return false;\" />Save</button>
        </div>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_FarmersProductionRecords($formvalues){
$obj=new xajaxResponse();
$organization=$formvalues['project'];


$erCount=0;
  $error="<ul>";
		
	/* 	if($organization==''){
		$error.="<li>Please select an Organization!</li>";
	$erCount++;
		} */

		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("statusxxx","innerHTML",errorMsg($error));
			return $obj;
		}	  
 /**/
 
 for($x=0;$x<count($formvalues['loopkey']);$x++){
 $organization=mysql_real_escape_string($formvalues['org_code'][$x]);
  $name=mysql_real_escape_string($formvalues['name'][$x]);
 $sex=mysql_real_escape_string($formvalues['sex'][$x]);
$leadFarmer=mysql_real_escape_string($formvalues['leadFarmer'][$x]);
$total=mysql_real_escape_string($formvalues['total'][$x]);
$croplegumes=mysql_real_escape_string($formvalues['croplegumes'][$x]);

$hoebasin=mysql_real_escape_string($formvalues['hoebasin'][$x]);
$crophoebasin=mysql_real_escape_string($formvalues['crophoebasin'][$x]);
$yieldhoebasin=mysql_real_escape_string($formvalues['yieldhoebasin'][$x]);
$selling_pricehoebasin=mysql_real_escape_string($formvalues['selling_pricehoebasin'][$x]);

$adpripping=mysql_real_escape_string($formvalues['adpripping'][$x]);
$cropadpripping=mysql_real_escape_string($formvalues['cropadpripping'][$x]);
$yieldadpripping=mysql_real_escape_string($formvalues['yieldadpripping'][$x]);
$selling_priceadpripping=mysql_real_escape_string($formvalues['selling_priceadpripping'][$x]);

$mechanized=mysql_real_escape_string($formvalues['mechanized'][$x]);
$cropmechanized=mysql_real_escape_string($formvalues['cropmechanized'][$x]);
$yieldmechanized=mysql_real_escape_string($formvalues['yieldmechanized'][$x]);
$selling_pricemechanized=mysql_real_escape_string($formvalues['selling_pricemechanized'][$x]);

$adoptedadpca=mysql_real_escape_string($formvalues['adoptedadpca'][$x]);
$areaundercfca=mysql_real_escape_string($formvalues['areaundercfca'][$x]);
$herbicideuse=mysql_real_escape_string($formvalues['herbicideuse'][$x]);
$burntcropresidues=mysql_real_escape_string($formvalues['burntcropresidues'][$x]);


		if($name<>''){
 $query=@mysql_query("update `tbl_farmerproductionrecords` set `org_code`='".$organization."',`FarmerName`='".$name."',`sex`='".$sex."',`LeadFarmer`='".$leadFarmer."', `Totalareaundercropproduction`='".$total."', `AreaundercropLegumes`='".$croplegumes."', 
  `AreaunderHoebasins`='".$hoebasin."',crophoebasin='".$crophoebasin."',yieldhoebasin='".$yieldhoebasin."',selling_pricehoebasin='".$selling_pricehoebasin."', 
   `AreaunderADPripping`='".$adpripping."',cropadpripping='".$cropadpripping."',yieldcropadpripping='".$yieldadpripping."',selling_pricecropadpripping='".$selling_priceadpripping."',
   `AreaunderMechanizedripping`='".$mechanized."',cropmechanized='".$cropmechanized."',yieldmechanized='".$yieldmechanized."',selling_pricemechanized='".$selling_pricemechanized."', `doptedCF/CA`='".$adoptedadpca."', `AreaunderCF/CA`='".$areaundercfca."', `Herbicideuse`='".$herbicideuse."', `Burntcropresidues`='".$burntcropresidues."',`updatedby`='".$_SESSION['username']."' where fid='".$formvalues['loopkey'][$x]."'")or die(http("SV-3449"));
				
	}
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_FarmersProductionRecords",'',1,20);
return $obj;
} 





function edit_AnnualResults($formvalues){
$obj=new xajaxResponse();
$_SESSION['output_id']='';
$_SESSION['entryyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['indicator_type']='';

$_SESSION['output_id']=$output;
$_SESSION['semi_annual']=$semi_annual;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['entryyear']=$year;
$gender='Male and Female';
$outcome="Outcome Indicator";
$output_indicator="Output Indicator";



/* if(mappQuarterToSemiAnnual($_SESSION['quarter'])<>$semi_annual){
$obj->alert('Process Halted! You are Trying to Enter or Edit Details in a wrong Reporting Period!');
return $obj;
}
 */

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";

         
            $data.="
            <tr>
            <th width='25' class='evenrow2' colspan=3>&nbsp;</th>
        
              <th colspan='6' ><center>Perfomance Indicator Annual Results</center></th>
             
            </tr>
            <tr class=''>
            <th width='25' class='evenrow2'>indicator Code</th>
              
			  <th width='200' class='evenrow2' colspan='3' >Indicator<img src='images/spacer2.png'></th>
			  <th width='55' class='evenrow2' align='right'>Base Value</th>
			  <th width='55' class='evenrow2' align='right'>Target</th>
<th width='55' class='evenrow2' align='right'>Male</th>
<th width='51' class='evenrow2' align='right'><b>Female</b></th>
<th width='51' class='evenrow2' align='right'><b>Total Value</b></th>
			 
             
            </tr>";

	for($x=0;$x<count($formvalues['p_id']);$x++){
$y="select i.`indicator_id`, i.`prog_id`, i.`supergoal_id`, i.`goal_id`, i.`purpose_id`,
 i.`subcomponent_id`, i.`output_id`, i.`project_id`, i.`indicator_code`,
  i.`indicator_name`, i.`disaggregation`, i.`unitofmeasure`,i.typeofDisaggregation,
   i.`gender`, i.`indicator_type`, i.`level_ofindicator`,
    i.`frequency_of_reporting`, i.`remarks`, i.`responsible`,
	 i.`expected_output`,r.org_code,r.id,r.male,r.female,r.total,w.Target
	  from tbl_indicator i
	    left join tbl_organizationreporting r on(r.indicator_id=i.indicator_id)
		left join tbl_workplan w on(w.indicator_id=i.indicator_id)
 where r.id='".$formvalues['p_id'][$x]."' 
  order by indicator_code,indicator_name asc";
//and w.curr_year like '".$_SESSION['entryyear']."%'
		  $query2=mysql_query($y)or die(http("WP-763"));



 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
		  //disaggregation
		  
$disaggregation=($row['typeofDisaggregation']==$gender)?"<td align='right'><input name='male[]' type='text' id='male".$a."' size='20'   onKeyPress='return numbersonly(event, false)' value='".$row['male']."' /></td>
		<td align='right'><input name='female[]' type='text' id='female".$a."' size='20' value='".$row['female']."'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' value='".$row['total']."' size='20'   onFocus=\"xajax_new_actual(getElementById('male".$a."').value,getElementById('female".$a."').value,'target".$a."');return false;\" type='text' id='target".$a."' size='10' readonly='readonly' onKeyPress='return numbersonly(event, false)'   /></td>":"<td align='right'><input name='male[]' type='text' id='male".$a."' value='N/A' size='20' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text' id='female".$a."' value='N/A' size='20' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='20' type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['total']."'  /></td>";
			
			
		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".mysql_real_escape_string((mysql_real_escape_string(trim($row['indicator_name']))))."<input name='loopKey[]' type='hidden' value='".$row['id']."' id='loopKey'  /></td>
 <td align='right'><input name='baselinevalue[]' class='evenrow'  readonly='readonly' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='annualtarget[]' class='evenrow' readonly='readonly' type='text' id='annualtarget".$a."' size='10'  onKeyPress='return numbersonly(event, false)' value='".$row['Target']."' /></td>".$disaggregation."</tr>";
		  $inc++;
		 $a++; 
		
		  }
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='9' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_AnnualResults($formvalues){
$obj=new xajaxResponse();
//$Program=$formvalues['Program'];
$output=$formvalues['output'];
$subcomponent=$formvalues['subcomponent'];
$fyear=$formvalues['fyear'];
$org_code=$formvalues['org_code'];
$prog_id=1;
//$_SESSION['semiAnnual']=(($_SESSION['quarter']=='Jan - Mar') or ($_SESSION['quarter']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";
$status="Open";
$reportingDates=@mysql_fetch_array(@mysql_query("select * from tbl_active where status='".$status."'")) or die(http("SV-266"));
$StartDate=$reportingDates['startDate'];
$endDate=$reportingDates['EndDate'];
for($i=0;$i<count($formvalues['loopKey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$male=$formvalues['male'][$i];
$female=$formvalues['female'][$i];
$total=$formvalues['target'][$i];
/* 
if($fyear==''){
$obj->alert("Missing year of Reporting");
return $obj;
 
}*/
if($total<>''){
//$obj->alert("Enter Total Annual Actual");
//return $obj;




$insert="update tbl_organizationreporting set male='".$male."',female='".$female."',total='".$total."',updatedby='".$_SESSION['username']."' where id='".$formvalues['loopKey'][$i]."' ";
//$obj->alert($insert);
@mysql_query($insert)or die(http("SV-287"));
}

}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_AnnualResults",'','','','','','','','','',1,20);
return $obj;
}





function edit_crops($formvalues){
$obj=new xajaxResponse();

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";

         
            $data.="
            
            <tr class=''>
            <th width='25' class='evenrow2'>Crop</th>
              </tr>";

	for($x=0;$x<count($formvalues['crop_id']);$x++){
$y="select * from tbl_crops
 where crop_id='".$formvalues['crop_id'][$x]."' 
  order by cropName asc";
		  $query2=@mysql_query($y)or die(http("EDIT-4008"));



 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
		  //disaggregation
		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>

 <td align='right'><input name='crop[]' class='evenrow' type='text' id='crop".$a."' size='10' value='".$row['cropName']."' ></td></tr>  ";
		  $inc++;
		 $a++; 
		
		  }
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='9' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_crops(xajax.getFormValues('annualTarget'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_crops($formvalues){
$obj=new xajaxResponse();

for($i=0;$i<count($formvalues['crop_id']);$i++){

$crop=$formvalues['crop'][$i];
if($crop<>''){

$insert="update tbl_crops set cropName='".$crop."' where crop_id='".$formvalues['crop_id'][$i]."' ";
//$obj->alert($insert);
@mysql_query($insert)or die(http("SV-4123"));
}

}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
return $obj;
}



?>