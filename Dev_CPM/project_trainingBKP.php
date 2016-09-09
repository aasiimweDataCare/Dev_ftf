<?php
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION,'view_qualitativeReporting');//report log
$xajax->register(XAJAX_FUNCTION,'new_qualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'getRecordId');
$xajax->register(XAJAX_FUNCTION,'getRecordIdQuantitative');
$xajax->register(XAJAX_FUNCTION,'view_NarrativequalitativeReport');
$xajax->register(XAJAX_FUNCTION,'new_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'view_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'save_TSOQuantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'edit_TSOqualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'edit_TSOquantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'new_target');
$xajax->register(XAJAX_FUNCTION,'edit_TSOqualitativeReporting2');
$xajax->register(XAJAX_FUNCTION,'Update_TSOQualitativeReporting');
$xajax->register(XAJAX_FUNCTION,'update_TSOQuantitativeReporting');
$xajax->register(XAJAX_FUNCTION,'delete_QualiatativeTSOEntered');
$xajax->register(XAJAX_FUNCTION,'delete_TSOAnnualResults');
$xajax->register(XAJAX_FUNCTION,'Delete_publications');
$xajax->register(XAJAX_FUNCTION,'Delete_PublicationOne');
$xajax->register(XAJAX_FUNCTION,'ViewAdoptionRates');
$xajax->register(XAJAX_FUNCTION,'new_AdoptionRates');


$xajax->register(XAJAX_FUNCTION,'close');
//------------------Annual Results---------------------------------

$xajax->register(XAJAX_FUNCTION,'view_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'new_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'save_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'edit_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'update_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'TSO_Details');
$xajax->register(XAJAX_FUNCTION,'Staff_Details');
$xajax->register(XAJAX_FUNCTION,'view_quantitativeReportLog');
#==============================child status index-===========
#----------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_publications');
$xajax->register(XAJAX_FUNCTION,'view_publicationsDetails');
$xajax->register(XAJAX_FUNCTION,'view_other_publications');
$xajax->register(XAJAX_FUNCTION,'new_publications');
$xajax->register(XAJAX_FUNCTION,'save_publications');
$xajax->register(XAJAX_FUNCTION,'edit_publication');
$xajax->register(XAJAX_FUNCTION,'update_publication');
//$xajax->register(XAJAX_FUNCTION,'save_training');
$xajax->register(XAJAX_FUNCTION,'view_training');
$xajax->register(XAJAX_FUNCTION,'view_trainingDetails');
$xajax->register(XAJAX_FUNCTION,'AttachFile');


$xajax->register(XAJAX_FUNCTION,'new_training');
$xajax->register(XAJAX_FUNCTION,'edit_training');
$xajax->register(XAJAX_FUNCTION,'update_training');
$xajax->register(XAJAX_FUNCTION,'calc_training');
$xajax->register(XAJAX_FUNCTION,'save_training');

//================================sta=================
$xajax->register(XAJAX_FUNCTION,'edit_staffReporting');
$xajax->register(XAJAX_FUNCTION,'Update_staffReporting');
$xajax->register(XAJAX_FUNCTION,'view_staffQualitative_reports');
$xajax->register(XAJAX_FUNCTION,'new_staffReporting');
$xajax->register(XAJAX_FUNCTION,'save_staffReporting');
$xajax->register(XAJAX_FUNCTION,'delete_staffReporting');



#--------view_resultLeadReportingData-------------
$xajax->register(XAJAX_FUNCTION,'view_resultLeadReporting');
$xajax->register(XAJAX_FUNCTION,'new_resultLeadReporting');
$xajax->register(XAJAX_FUNCTION,'Update_resultLeadReporting');
$xajax->register(XAJAX_FUNCTION,'edit_resultLeadReporting');
$xajax->register(XAJAX_FUNCTION,'delete_resultLeadReportingData');
$xajax->register(XAJAX_FUNCTION,'view_resultLeadReportingData');
$xajax->register(XAJAX_FUNCTION,'delete_financialActuals');
$xajax->register(XAJAX_FUNCTION,'CheckedAndSelected');

#************************************************
#************************************************

require_once('save.php');
require_once('edit.php');
require_once('delete.php');

function AttachFile($attachFile,$table_name){
$obj=new xajaxResponse();

				
						$url="z_uploadFiles.php?id=$attachFile&&table_name=$table_name";
					//$obj->alert($url);
                		$obj->call("popUpWindow",$url, 400, 400, 500, 400);
						//$conceptNoteIdValue=$conceptNoteId['id'];
						//$obj->assign('bodyDisplay','innerHTML',$data);
						//$obj->call("xajax_home",'','','', 1, 20);
						return $obj;
		
		}




function new_target($q1,$q2,$target){
$obj= new xajaxResponse();
$targetValue=0;
$targetValue=($q1+$q2);
//$obj->alert($targetValue);
$obj->assign($target,"value",$targetValue);
return $obj;
}


//--------Annula Results---------------------
function view_AnnualResults($indicator_type,$indicator,$year,$semi_annual,$quarter,$program,$project_id,$div,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['subprogram']='';
//$_SESSION['program']='';
//$_SESSION['project_id']='';
$_SESSION['semiAnnual']='';
$_SESSION['quarterName']='';
$_SESSION['fyear']='';
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['fyear']=$year; //($year=='')?$_SESSION['Activeyear']:
//$_SESSION['subprogram']=$subprogram;
//$_SESSION['program_id']=$program;
//$_SESSION['project_id']=$project_id;
$_SESSION['indicator_name']=$indicator;
$program=($program==NULL)?$_SESSION['program_id']:$program;
$project_id=($project_id==NULL)?$_SESSION['project_id']:$project_id;
//$_SESSION['quarterName']=($quarter=='')?$_SESSION['quarter']:$quarter;
//$_SESSION['semiAnnual']=(($_SESSION['quarterName']=='Jan - Mar') or ($_SESSION['quarterName']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";
//$obj->alert($div);
$n=1;

$data="<form name='annualTarget1' id='annualTarget1' action='?' method='post' /><table cellspacing='1'  id='report'     width='100%' >

<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>

	   <input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_AnnualResults('".$program."','".mappQuarterToSemiAnnual($_SESSION['quarter'])."','','".$project_id."','".$_SESSION['Activeyear']."');return false;\"/> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Project Results&&indicator_type=".$indicator_type."&&indicator=".$indicator."&&year=".$year."&&program=".$program."&&project_id=".$project_id."&&semi_annual=".$semi_annual."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print Annual Project Results&&indicator_type=".$indicator_type."&&indicator=".$indicator."&&year=".$year."&&program=".$program."&&project_id=".$project_id."&&semi_annual=".$semi_annual."&&format=Print' target='_blank'><input type='button' class='formButton2'name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";

		 $data.="<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project_id']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::ProgramFilter($program);
$data.="</select></td>
        </tr>";
		
		$data.="<tr class='display_none'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent'  onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project_id']."','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subprogram']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program_id']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::ProjectFilter($program,$project_id);
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='7'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				$selyr=($end==$_SESSION['fyear'])?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$selyr." >".$end."</option>";
				  $end--;
				  }while($end>=2009);
              $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' 
			  onclick=\"xajax_view_AnnualResults('','',getElementById('year').value,'".$semi_annual."','".$quarter."',getElementById('Program').value,getElementById('Project').value,'".$div."',1,20);return false;\" /></td>
			   
            </tr>
			<tr  class='evenrow'>     
   				 <td colspan='11'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> 				|<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
				  <input type='button' 		class='formButton2'TITLE='Edit' onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('annualTarget1'));return false;\" value='Delete'  /></td>
      </tr>
            <tr>
        
              <th colspan='11' class='dataRow'><center>Annual Results/Progress Against Targets</center></th>
															</tr>
            <tr><th width='' class='dataRow'>SELECT</th>
			
              <th width='' colspan='5' width='500' class='dataRow'>Indicator</th>
             
				  <th width='' class='dataRow'>Baseline</th>
				  <th width='' class='dataRow'>Target</th>
            		<th width='' class='dataRow'>Male</th>
					<th width='' class='dataRow'>Female</th>
			  			<th class='dataRow' colspan='' >Total</th>
              
            </tr>";
$inc=1;

//$queryProg=@mysql_query("select * from tbl_programme where prog_id='".$program."'") or die(http("PR-126"));

$x="select r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`, r.`project_id`, r.`country_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,i.baseline,i.baseyear,w.Target,w.curr_year
from tbl_indicator i left outer join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
left join tbl_workplan w on(w.indicator_id=i.indicator_id)
 WHERE i.indicator_type like '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator_name']."%'
  and  ".QueryManager::ViewAnnualResults($program,$project_id)."
  and r.semi_annual like '".$semi_annual."%'
  and r.year like '".$_SESSION['fyear']."%'
  and w.curr_year like '".$_SESSION['fyear']."%'
  group by i.indicator_name,r.year,r.`semi_annual`,r.reportingPeriod order by i.indicator_id,i.indicator_code asc";
  //,r.year,r.`semi_annual`,r.reportingPeriod and 	r.reportingPeriod like '".$_SESSION['quarterName']."%'
 //$obj->alert($x);
$query=@mysql_query($x)or die(http("PR-339"));
		  if(mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $l="align=right";
$data.="<tr class=$color>
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='checkbox' name='id[]'  id='id' value='".$row['id']."' >
".$inc."</td>
            <td align=left>
			<INPUT type='hidden' name='loopkey[]'  id='loopkey' value='1' >".$row['indicator_code']."</td>
            <td colspan='4' width='500'>$row[indicator_name]</td>
			<td align='right' >$base</td>
			<td align=right>$row[Target]</td>
			<td align=right>$row[male]</td>
			<td align=right>$row[female]</td>
			<td align=right ><strong>$row[total]</strong></td>
        </tr>";
$inc++;
												}
		
		$sql="select  sum(w.`male`) as male, sum(w.`female`) as female, sum(w.`total`) as ptotal,w.project_id,w.prog_id, w.`display`
				from tbl_organizationreporting w  
				WHERE w.semi_annual like '".$semi_annual."%'
  				and 	w.year like '".$_SESSION['fyear']."%'
				&& ".QueryManager::ViewTotalAnnualResults($program,$project_id)."
				 group by w.project_id,w.semi_annual,w.year  asc"; 
 $xxqq=mysql_query($sql)or die(http("PR-0163"));
 if(mysql_num_rows($xxqq)){
 $tot=mysql_fetch_array($xxqq)or die(http("PR-0161"));
	$data.="<tr class='evenrow'>
            <td colspan='7' align=left ><strong>TOTAL:</strong></td>
			<td align=right><strong>$tot[baseline]</strong></td>
			<td align=right><strong>$tot[male]</strong></td>
			<td align=right><strong>$tot[female]</strong></td>
			<td align=right><strong>$tot[ptotal]</strong></td></tr>";
			}else 
			$data.="<tr><td>".noResultsFound()."</td></tr>";
		  $data.="<tr  class='evenrow'>
     
    <td colspan='11'>
		<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> 
		|<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' />
		| <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' /></td>
    
	
  </tr>
</table></form>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}






function calc_training($male,$female,$total){
$obj= new xajaxResponse();
$totalValue=0;
//$obj->addAlert($total."ppppppppp");
$totalValue=($male+$female);
//$obj->addAlert($total."ppppppppp".$q1."-".$q2."-".$q3."-".$targetValue);
$obj->assign($total,"value",$totalValue);
return $obj;
}


function new_AnnualResults($program,$semi_annual,$indicator_type,$project,$fyear){
$obj=new xajaxResponse();

if($_SESSION['username']==NULL){
$obj->alert("Process Halted! Your Sesion Has Expired Please Login again!");
$obj->redirect('index.php');
return $obj;

} 


//$_SESSION['program']=$program;
$_SESSION['subcomponent']=$subcomponent;
$_SESSION['indicator_type']=$indicator_type;
//$_SESSION['Project']=$Project;
$level_ofindicator=array('ASARECA','Program','Project');
$_SESSION['fyear']=($fyear==NULL)?$_SESSION['Activeyear']:$fyear;
$Gender='Yes';
$program=($program==NULL)?$_SESSION['program_id']:$program;
$project=($project==NULL)?$_SESSION['project_id']:$project;
//$obj->alert(mappQuarterToSemiAnnual($_SESSION['quarter'])."-------".$semi_annual);

/**/ if(mappQuarterToSemiAnnual($_SESSION['quarter'])<>$semi_annual){
$obj->alert("Process Halted! ".$semi_annual." is Not open for Reporting. Please Try ".mappQuarterToSemiAnnual($_SESSION['quarter'])."!");
return $obj;

} 
 
 
 
 

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";
//getElementById('Program')
         $data.="
		 
		  <tr class='evenrow'>
              <td colspan='2'>Program:
                <label></label></td>
              <td colspan='10'><select name='Program' class='combobox' id='Program' onchange=\"xajax_new_AnnualResults(this.value,'".$semi_annual."','','".$_SESSION['Project']."','".$_SESSION['fyear']."')\"><option value=''>-select-</option>";
			  
				  $data.=QueryManager::ProgramFilter($program);
 
$data.="</select></td>
        </tr>
		  <tr class='evenrow'>
              <td colspan='2'>Project:
                <label></label></td>
              <td colspan='10'><select name='Project' class='combobox'  id='Project' onchange=\"xajax_new_AnnualResults('".$_SESSION['program']."','".$semi_annual."','',this.value,'".$_SESSION['fyear']."')\"><option value=''>-select-</option>";
					$data.=QueryManager::ProjectFilter($program,$project); 
$data.="</select></td>
        </tr>
				 <tr class='display_none' >
              <td colspan='2'>Sub-Program:
                <label></label></td>
              <td colspan='10'><select name='subcomponent' class='combobox' id='subcomponent' onchange=\"xajax_new_AnnualResults('".$_SESSION['program']."','".$semi_annual."','','".$_SESSION['Project']."','".$_SESSION['fyear']."')\">";
			  
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".substr($row['subcomponent'],0,100)."</option>";
				
					  }  $data.="</select></td>
        </tr>
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='10'><select name='indicator_type' id='indicator_type' class='combobox' onchange=\"xajax_new_AnnualResults('".$_SESSION['program']."','".$semi_annual."',this.value,'".$_SESSION['Project']."','".$_SESSION['fyear']."');\"><option value=''>-select-</option>";
			    
$queryit=mysql_query("select indicator_type from tbl_indicator where indicator_type <> '' group by indicator_type order by indicator_type asc")or die(http(735));
					  while($rowit=mysql_fetch_array($queryit)){
					 $selsubra=($_SESSION['indicator_type']==$rowit['indicator_type'])?"SELECTED":"";
					  $data.="<option value=\"".$rowit['indicator_type']."\" ".$selsubra.">".$rowit['indicator_type']."</option>";
					  }
					
				
					  $data.="
              </select></td>
            </tr>";
         
            $data.="<tr class='evenrow'>
              <td colspan='2'>Year:</td>
              <td colspan='10'>
                 <select name='fyear' id='fyear' class='combobox'   onchange=\"xajax_new_AnnualResults('".$_SESSION['program']."','".$semi_annual."','".$_SESSION['indicator_type']."','".$_SESSION['Project']."',this.value);\"><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				$selyr=($end==$_SESSION['fyear'])?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$selyr.">".$end."</option>";
				  $end--;
				  }
				  while($end>=2009);
              $data.="</select></td>
            </tr>
            <tr>
            <td width='25' class='evenrow2' colspan=3>&nbsp;</td>
        
              <td colspan='6' class='evenrow2' >Perfomance Indicator Annual Results</td>
             
            </tr>
            <tr class='evenrow'>
            <td width='25' class='evenrow2'>Indicator Code</td>
			<td width='' class='evenrow2' colspan='3' >Indicator<img src='images/spacer2.png' width='200px' height='0.1'></td>
			<td width='55' class='evenrow2' align='right'><strong>Baseline</strong></td>
			<td width='55' class='evenrow2' align='right'><strong>Total Target</strong></td>
			<td width='55' class='evenrow2' align='right'><strong>Actual(Male)</strong></td>
			<td width='51' class='evenrow2' align='right'><b>Actual(Female)</b></td>
			<td width='51' class='evenrow2' align='right'><b>Total Actual</b></td>
			</tr>";
//if($level_ofindicator[2]==){}

			$y="select  i.`indicator_id` , i.`prog_id` , i.`supergoal_id` , i.`goal_id` , i.`purpose_id` , i.`subcomponent_id` , i.`output_id` , i.`project_id` , i.`indicator_code` , i.`indicator_name` , i.`disaggregation` , i.`gender` , i.`indicator_type` , i.`level_ofindicator` , w.curr_year,i.`frequency_of_reporting` , i.`remarks` , i.`responsible` , i.`expected_output` , i.`unitofmeasure` , i.`updatedby` , i.`display` , i.`dateupdated`,w.curr_year,i.baseline,w.Target
			from tbl_indicator i 
			left join tbl_workplan w on(i.indicator_id=w.indicator_id)
			 where i.level_ofindicator like '".$level_ofindicator[2]."%' 
			 and i.indicator_type like '".$_SESSION['indicator_type']."%' and 
			 
			 ".QueryManager::ViewAnualTargetsProjects($program,$project)." 
			 && w.curr_year LIKE '".$_SESSION['fyear']."%'
			 group by w.curr_year,i.`indicator_id`
			 order by i.`indicator_id`,indicator_code asc";
		  $query2=@Execute($y)or die(http("PR-410"));
		//$obj->alert($y); 
		
		// and w.curr_year like '".$_SESSION['fyear']."%'and w.curr_year like '".$_SESSION['fyear']."%'  subcomponent_id ='".$_SESSION['subcomponent']."' and prog_id='".$_SESSION['program']."' and 
		 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
		 // $obj->alert($row['baseline']);
		   $color=$inc%2==1?"evenrow3":"white1";
		 
		 
switch($row['disaggregation']){
case "Yes":

$data.="<tr class='".$color."' >
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'>
			<INPUT type=hidden name='unitofmeasure[]'  id='unitofmeasure' value='".$row['unitofmeasure']."' >
			<INPUT type='hidden' name='disaggregation[]'  id='disaggregation' value='".$row['disaggregation']."' >
			<INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopkey'  /></td>
 <td align='right'><input name='baselinevalue[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."' onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='targetx[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='targetx".$a."' size='20' value='".$row['Target']."' onKeyPress='return numbersonly(event, false)' /></td>
 
 <td align='right'><input name='male[]' onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'target".$a."');return false;\" type='text' id='male".$a."' size='20'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text' id='female".$a."' size='20' onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'target".$a."');return false;\"  onKeyPress='return numbersonly(event, false)' /></td>
		
			<td align='right'><input name='target[]' size='20'   onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'target".$a."');return false;\" type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false)'   /></td></tr>";
		break;
		
		case "No":
			
			
			
			$data.="<tr class='".$color."' >
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'>
			<INPUT type=hidden name='unitofmeasure[]'  id='unitofmeasure' value='".$row['unitofmeasure']."' >
			<INPUT type=hidden name='disaggregation[]'  id='disaggregation' value='".$row['disaggregation']."' >
			<INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopkey'  /></td>
 <td align='right'><input name='baselinevalue[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."' onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='targetx[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='targetx".$a."' size='20' value='".$row['Target']."' onKeyPress='return numbersonly(event, false)' /></td><td align='right'><input name='male[]' readonly='readonly' class='evenrow' type='text' id='male".$a."' size='20'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text'  readonly='readonly'  class='evenrow' id='female".$a."' size='20'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='20'      /></td></tr>";
			
			break;
		
		
		default:
			
			
			
			$data.="<tr class='".$color."' >
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'>
			<INPUT type=hidden name='unitofmeasure[]'  id='unitofmeasure' value='".$row['unitofmeasure']."' >
			<INPUT type=hidden name='disaggregation[]'  id='disaggregation' value='".$row['disaggregation']."' >
			<INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopkey'  /></td>
 <td align='right'><input name='baselinevalue[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."' onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='targetx[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='targetx".$a."' size='20' value='".$row['Target']."' onKeyPress='return numbersonly(event, false)' /></td><td align='right'><input name='male[]' readonly='readonly' class='evenrow' type='text' id='male".$a."' size='20'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text'  readonly='readonly'  class='evenrow' id='female".$a."' size='20'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='20'      /></td></tr>";
			
			break;
		}
	
		  $inc++;
		 $a++; 
		
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='9' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save Project Actuals' onclick=\"xajax_save_AnnualResults(xajax.getFormValues('annualTarget'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
} 



function viewQualiatativeTSOEntered($quarter,$Qyear,$orgname,$intervention){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['Qquarter']='';
$_SESSION['Qyear']='';

$_SESSION['intervention']='';
$_SESSION['Qquarter']=$quarter;
$_SESSION['Qyear']=$Qyear;
$_SESSION['intervention']=$intervention;
$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0'      width='100%' border='0'> ".filter_tsoQualitative()." 
	  <tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_TSOqualitativeReporting(xajax.getFormValues('organization'),'".$_SESSION['quarter']."');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_QualiatativeTSOEntered','');return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>

   

  </tr><tr>
        <th colspan='10' ><div align='center' class=''>TECHNICAL SERVICES ORGANIZATIONS (TSO) QUALITATIVE REPORT</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th><th><b class=''>SELECT</th>
	  <th width='' colspan=''><strong class=''>INTERVENTION NAME</strong></th>
	 
        <th width='' colspAN='3'><strong class=''>PLANNED ACTIVITIES</strong></th>
    
		<th width=''><strong class=''>IMPLEMENTATION</strong></th>
		<th width=''><strong class=''>ACHIEVEMENTS</strong></th>
		<th width=''><strong class=''>DEVIATIONS</strong></th>
		
	
		<th  width=''><strong class=''>ACTION</strong></th>
		

      </tr>";

$query_string="select t.narrative_id,t.org_code,o.orgName,t.intervention,l.code,l.codeName as interventionName,t.reportingPeriod,t.year,t.plannedActivities,t.implementation,t.achievements,t.deviations,t.challenges,
t.next_quarter,t.lessons,t.report,t.report2,t.updatedby,t.display from tbl_tsoqualitative t inner join tbl_organization o on(o.org_code=t.org_code) inner join tbl_lookup l on(l.code=t.intervention) where classCode='5' and t.display='Yes' and l.codeName like '".$_SESSION['intervention']."%' and o.org_code='".$_SESSION['org_code']."'  and t.year like '".$_SESSION['Qyear']."%' and t.reportingPeriod like '".$_SESSION['Qquarter']."%'  order by o.org_code,t.year,t.reportingPeriod Asc";
#$obj->addAlert($query_string);

$query_=mysql_query($query_string)or die(mysql_error());

	  while($row=mysql_fetch_array($query_)){

	
	  $color=$n%2==1?"evenrow3":"white1";
     $data.="<tr class=$color '>
	 <td>".$inc++."</td>
	 <td><input name='narrative_id[]' id='narrative_id' type='checkbox' value='".$row['narrative_id']."' />
	 <input type='hidden' name='loopkey[]' id='loopkey' value='1'></td>
	 <td>".mysql_real_escape_string($row['interventionName'])."</td>
	 
	 <td COLSPan='3' >".$row['plannedActivities']."</td>
	 <td>".$row['implementation']."</td>
	 <td>".$row['achievements']."</td>
	  <td>".$row['deviations']."</td> 
	  

<td><input name='details' type='button' class='formButton2'onclick=\" xajax_TSO_Details('".$row['narrative_id']."');\" value='Details' /></td>
	  </tr>";
	  $n++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_TSOqualitativeReporting(xajax.getFormValues('organization'),'".$_SESSION['quarter']."');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_QualiatativeTSOEntered','');return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function new_resultLeadReporting($id,$quarter){
$obj = new xajaxResponse();
if($_SESSION['quarter']<>$quarter){
$obj->addAlert("You are trying to Enter items in a wrong quarter!");
return $obj;
}
$data="<form action='functions.php' method='post' enctype='multipart/form-data' name='staffReporting'><table cellspacing='0'      width='600' border='0'>
      <tr class='evenrow2'>
          <td colspan=2 align='center'>&nbsp;<strong>Result Lead Reporting</strong></td>
        </tr>
        <tr>
          <td><strong>Result Area</strong></td>
          <td><input type='hidden' name='resultarea_id' value='".$id."' value='' id='resultarea_id' ><select name='resultArea' id='resultArea' disabled >";
			$query=mysql_query("select * from tbl_subcomponent where id='".$id."' order by id asc") or die(http(0070));
			while($rowresultArea=mysql_fetch_array($query)){
			#$selected=()
              $data.="<option value='".$rowresultArea['id']."'>".$rowresultArea['subcomponent_code']." ".substr($rowresultArea['subcomponent'],0,70)."</option>";
              }
         $data.="</select></td>
        </tr>
        <tr>
          <td><strong>1.A brief introduction of the report</strong></td>
          <td><textarea name='introduction' id='introduction' cols='100' rows='5'  onKeyDown=\"limitText(this.form.introduction,this.form.countdownintroduction,500);\" onKeyUp=\"limitText(this.form.introduction,this.form.countdownintroduction,500);\"></textarea>You have <input readonly type='text' name='countdownintroduction' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>2. Activities,expected targets/outputs during the reporting period</strong></div></td>
          <td><textarea name='Activities' id='Activities' cols='100' rows='5'   onKeyDown=\"limitText(this.form.Activities,this.form.countdownActivities,500);\" onKeyUp=\"limitText(this.form.Activities,this.form.countdownActivities,500);\"></textarea>You have <input readonly type='text' name='countdownActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>3.Provide a detailed description of implementation of each of the activities listed above during the quarter</strong></div></td>
          <td><textarea name='Description' id='Description' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Description,this.form.countdownDescription,500);\" onKeyUp=\"limitText(this.form.Description,this.form.countdowDescription,500);\"></textarea>You have <input readonly type='text' name='countdownDescription' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><strong>4. Give a concise description of key specific results  and achievements obtained</strong></td>
          <td><textarea name='achievements1' id='achievements1' cols='100' rows='5'  onKeyDown=\"limitText(this.form.achievements1,this.form.countdownachievements,500);\" onKeyUp=\"limitText(this.form.achievements1,this.form.countdownachievements,500);\" ></textarea>You have <input readonly type='text' name='countdown' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>5. Challenges faced, their effect on project  implementation, how they were or will be addressed.</strong></div></td>
          <td><textarea name='Challenges' id='Challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Challenges,this.form.countdownChallenges,500);\" onKeyUp=\"limitText(this.form.Challenges,this.form.countdownChallenges,500);\"></textarea>You have <input readonly type='text' name='countdownChallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>6. Highlight good practices and lessons  learned&nbsp; </strong></div></td>
          <td><textarea name='goodPractices' id='goodPractices' cols='100' rows='5'  onKeyDown=\"limitText(this.form.goodPractices,this.form.countdowngoodPractices,500);\" onKeyUp=\"limitText(this.form.goodPractices,this.form.countdowngoodPractices,500);\"></textarea>You have <input readonly type='text' name='countdowngoodPractices' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><div align='left'><strong>7. Attach deliverables</strong></div></td>
          <td><input type='hidden' name='MAX_FILE_SIZE' id='MAX_FILE_SIZE' VALUE='500000' />
          <input type='file' name='userfile' id='userfile' size='70' /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='submit' name='saveResultsLead' id='button' value='Save' />
          </div></td>
        </tr>
        <tr>
       
      </table></form>";




$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


#---------------------staff reporting--------------------------------

function new_staffReporting($zone_id){
$obj = new xajaxResponse();
if($_SESSION['username']==''){

$obj->addRedirect('index.php');


}
$_SESSION['ZoneCode']='';
$_SESSION['ZoneCode']=$zone_id;
 $data="<form action='".$PHP_SELF."' method='post'   name='staffReporting1' id='staffReporting1'><table cellspacing='0'      width='600' border='0'>
      <tr class='evenrow2'>
          <td colspan=2 align='center'>&nbsp;<strong>Field Trip Report by <b>".$_SESSION['name']."</b></strong></td>
        </tr>
		
        
		
        <tr>
          <td><p><strong>TSO Region/Zone Visited</td>
          <td><select name='region' id='region' onChange=\"xajax_new_staffReporting(getElementById('region').value); return false;\" ><option value=''>-select-</option>";
			$query=mysql_query("select * from tbl_zone order by zoneCode asc") or die(http(0070));
			while($rowresultArea=mysql_fetch_array($query)){
			$selected=($_SESSION['ZoneCode']==$rowresultArea['zoneCode'])?"SELECTED":"";
            $data.="<option value='".$rowresultArea['zoneCode']."' '".$selected."'>".$rowresultArea['zoneName']."</option>";
              }
         $data.="</select></td>
        </tr>
        <tr>
          <td><strong>Districts Visited</strong></td>";
		  
		  #$query=mysql_query("select * from tbl_zonalMapping where zone='".$_SESSION['ZoneCode']."' order by zone asc")or die(http(264));
				
				#while($row=mysql_fetch_array($query)){
		  $data.="<td colspan='2'><fieldset><legend>Check All Districts/Municipalities Visited</legend><table cellspacing='0'      width=''>";
		  $queryzone=mysql_query("select * from tbl_district where zone='".$_SESSION['ZoneCode']."' and zone <> ''  order by districtName asc")or die(http(264));
				
				while($rowzone=mysql_fetch_array($queryzone)){
		
				#$checked=(strpos($row['districts_inZone'], $rowzone['districts_inZone'])!==false)?"CHECKED":"";
			
				$data.="<tr><td> <input type='checkbox' '".$checked."'   name='districtsVisited[]' id='checkbox8' value='".$rowzone['districtName']."' /></td><td>".$rowzone['districtName']." </td></tr>";
				
				}
				
				$data.="</table></fieldset></td>";
				
		  #}
        $data.="</tr>
		 <tr><td><strong>Dates of Visit:</strong></td>
          <td colspan=2>From:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.staffReporting1.fromdatevisited);return false;\" hidefocus=''>
<input name='fromdatevisited' type='text'  size='20' value='' id='fromdatevisited' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> To:<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.staffReporting1.todatevisited);return false;\" hidefocus=''>
<input name='todatevisited' type='text'  size='20' value='' id='todatevisited' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a> </td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>Other people on the TRIP</strong></div></td>
          <td><textarea name='trip' id='trip' cols='100' rows='5'   onKeyDown=\"limitText(this.form.trip,this.form.countdowntrip,500);\" onKeyUp=\"limitText(this.form.trip,this.form.countdowntrip,100);\"></textarea>You have <input readonly type='text' name='countdowntrip' size='3'  value='100' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>1.Purpose of Trip and Objective(s)</strong></div></td>
          <td><textarea name='purposeoftrip' id='purposeoftrip' cols='100' rows='5'  onKeyDown=\"limitText(this.form.purposeoftrip,this.form.countdownpurposeoftrip,200);\" onKeyUp=\"limitText(this.form.purposeoftrip,this.form.countdowpurposeoftrip,200);\"></textarea>You have <input readonly type='text' name='countdownpurposeoftrip' size='3'  value='200' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><strong>2.Persons met during the trip</strong></td>
          <td><textarea name='Personsmet' id='Personsmet' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Personsmet,this.form.countdownPersonsmet,500);\" onKeyUp=\"limitText(this.form.Personsmet,this.form.countdownPersonsmet,500);\" ></textarea>You have <input readonly type='text' name='countdownPersonsmet' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>3.	Account of the Trip</strong></div></td>
          <td><textarea name='Account' id='Account' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Account,this.form.countdownAccount,1000);\" onKeyUp=\"limitText(this.form.Account,this.form.countdownAccount,1000);\"></textarea>You have <input readonly type='text' name='countdownAccount' size='3'  value='1000' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>4.	Findings</strong></div></td>
          <td><textarea name='Findings' id='Findings' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Findings,this.form.countdownFindings,500);\" onKeyUp=\"limitText(this.form.Findings,this.form.countdownFindings,500);\"></textarea>You have <input readonly type='text' name='countdownFindings' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><div align='left'><strong>5. 5.	Action points</strong></div></td>
          <td><textarea name='actionpoints' id='actionpoints' cols='100' rows='5'  onKeyDown=\"limitText(this.form.actionpoints,this.form.countdownactionpoints,500);\" onKeyUp=\"limitText(this.form.actionpoints,this.form.countdownactionpoints,500);\"></textarea>You have <input readonly type='text' name='countdownactionpoints' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
		
        <tr>
          <td><strong>6.	Conclusions and Recommendations</strong></td>
          <td><textarea name='Recommendations' id='Recommendations' cols='100' rows='5'  onKeyDown=\"limitText(this.form.Recommendations,this.form.countdownRecommendations,500);\" onKeyUp=\"limitText(this.form.Recommendations,this.form.countdownRecommendations,500);\"></textarea>You have <input readonly type='text' name='countdownRecommendations' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
		
		<tr>
          <td><strong>Follow Up Areas</strong></td>
          <td><textarea name='followupareas' id='followupareas' cols='100' rows='5'  onKeyDown=\"limitText(this.form.followupareas,this.form.countdownfollowupareas,500);\" onKeyUp=\"limitText(this.form.followupareas,this.form.countdownfollowupareas,500);\"></textarea>You have <input readonly type='text' name='countdownfollowupareas' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
		<tr>
          <td colspan=3><div id='status'></div></td></tr>
		    <tr>
		<tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_staffReporting(xajax.getFormValues('staffReporting1'));return false;\" />
          </div></td>
        </tr>
		

       
      </table></form>";



$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function view_staffQualitative_reports($region,$quarter,$year){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['region']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['staffyear']=$year;
$_SESSION['staffQuarter']=$quarter;

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>
";

$data.="<table cellspacing='0'      width='100%' border='0'>".filter_staffQualitative()." 
<tr class='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_staffReporting(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>
</tr> 
	  <tr>
        <th colspan='9' ><div align='center' class=''>STAFF QUARTERLY FIELD TRIP REPORTING</div></th>
        </tr>
      
      <tr>
	  <th><b class=''>SELECT</th>

	 <th width='' colspan=''><strong class=''>REGION</strong></th>
        <th width='' colspan='2' ><strong>DISTRICTS VISITED</strong></th>
    
		<th width=''><strong class=''>PURPOSE OF THE TRIP</strong></th>
		<th width=''><strong class=''>ACCOUNT OF THE TRIP<br/><img src='images/spacer_rresultlead.png'></strong></th>
		<th width=''><strong class=''>FINDINGS</strong></th>
		<th width=''><strong class=''>ACTION POINTS</strong></th>

<th  width=''><strong class=''>ACTION</strong></th>
		

      </tr>";

$query_string="select st.narrative_id,st.region,z.zoneName,st.districtsVisited,st.OtherpersonsonTrip,st.purposeofTrip,st.personsMet, st.AccountofTrip,st.reportingPeriod,st.year,st.FinancialYear,st.Findings,st.actionPoints,st.ConclusionsAndRecommendations,
 st.followUpAreas,st.report,st.report2,st.updatedby,st.display from  tbl_staffreporting st inner join tbl_zone z on(z.zoneCode=st.region) where st.display='Yes' and z.zoneName like '".$_SESSION['region']."%' and st.reportingPeriod like '".$_SESSION['staffQuarter']."%' and st.year like '".$_SESSION['staffyear']."%' order by 1 asc ";

#$obj->addAlert($query_string);

$query_=mysql_query($query_string)or die(mysql_error());

	  while($row=mysql_fetch_array($query_)){

	
	  $color=($n%2==1)?"evenrow3":"white1";
     $data.="<tr class=$color >

	 <td><input name='narrative_id[]' id='narrative_id' type='checkbox' value='".$row['narrative_id']."' />".$inc++."</td>
	
	 <td>".$row['zoneName']."</td>
	 <td colspan=2>".$row['districtsVisited']."</td>
	 <td>".$row['purposeofTrip']."</td>
	 <td>".$row['AccountofTrip']."</td>
	  <td>".$row['Findings']."</td> 
	  <td>".$row['actionPoints']."</td>


<td><input name='details' type='button' class='formButton2'value='Details' onclick=\"xajax_Staff_Details('".$row['narrative_id']."');\" /></td>
	  </tr>";
	  $n++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_staffReporting(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_StaffQualitativeReport','');return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>
</tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

 
 
 
 
 function getRecordId($semi_annual,$year,$project_id,$div){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}


 $sql="select narrative_id from tbl_tsoqualitative where project_id='".$project_id."' and year='".$year."' and semi_annual like '".$semi_annual."%' ";
//$obj->alert($sql);
$query=mysql_query($sql)or die(http(0941));
while($queryRecord=mysql_fetch_array($query)){
//$obj->alert("XXXX".$queryRecord['narrative_id']."---narr----- ".$semi_annual."-semi-----  ----xxxxxx".$div."xxxxxxx--div------".$project_id."-prj_id-----".$year."----year");
if($queryRecord['narrative_id']<>0){
$obj->call("xajax_view_NarrativequalitativeReport",$queryRecord['narrative_id'],$semi_annual,$div,$project_id,$year,$_SESSION['program_id']);
return $obj;
}
 }
$obj->assign('bodyDisplay','innerHTML','');
return $obj;
}


//-----------------view qualitative Reporting----------------------
//view_AnnualResults($indicator_type,$indicator,$year,$semi_annual,$quarter,$program,$project_id,$div,$cur_page=1,$records_per_page=20)
function getRecordIdQuantitative($semi_annual,$year,$prog_id,$project_id,$div){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;
}

 $sql="select * from tbl_organizationreporting where prog_id='".$prog_id."' and year='".$year."' and project_id='".$project_id."' and semi_annual='".$semi_annual."' ";
//$obj->alert($sql."----".$semi_annual."---".$year);
$query=mysql_query($sql)or die(http(0941));
while($queryRecord=@mysql_fetch_array($query)){
//$obj->alert($queryRecord['narrative_id']."---narr----- ".$semi_annual."-semi---------".$div."--div------".$project_id."-prj_id-----".$year."----year");
if($queryRecord['project_id']<>0){
$div="Program".$queryRecord['prog_id'].$queryRecord['project_id'];
$obj->call("xajax_view_AnnualResults",'','',$year,$semi_annual,$_SESSION['quarter'],$queryRecord['prog_id'],$queryRecord['project_id'],$div,1,20);
return $obj;
}
 }
$obj->assign('bodyDisplay','innerHTML','');
return $obj;
}
 



 
 
 
 
 
 
 function view_NarrativequalitativeReport($narrative_id,$semi_annual,$div,$project_id,$year,$program_id){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
	return $obj;

}

$program_id=($program==NULL)?$_SESSION['program_id']:$program_id;
$project_id=($project_id==NULL)?$_SESSION['project_id']:$project_id;
//$narrative_id=1;$project_id=1;$semi_annual='Jan - Jun';$year='2012';

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
<div class='break'>
<table width='100%' border='0'><TR><td colspan=2><hr ></td></TR>
	  <TR><td colspan=2><div id='status'></div></td></TR>
	 <tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Edit' onclick=\"xajax_edit_TSOqualitativeReporting2('".$narrative_id."','".$quarter."','".$div."','".$project_id."');return false;\"  /> | <a href='export_to_excel_word.php?linkvar=ExportNarrativeReport&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."&&program_id=".$program_id."&&format=word' ><input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Export to Word'  /></a> | <a href='print_version2.php?linkvar=PrintNarrativeReport&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."&&program_id=".$program_id."&&format=Print'  target='_blank' ><input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Print Version'  /></a> | <input type='button' name='Close' onclick=\"xajax_view_NarrativequalitativeReport('','','".$div."','','','');\" value='Close' class='formButton2' >
          </div></td>
        </tr>";
	 # $obj->addAlert(count($formvalues['loopkey']));
//for($i=0;$i<count($narrative_id);$i++){
#$narrative_id=$formvalues['narrative_id'][$i];
$select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
$queryTSO=@mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
$data.="<tr>
         ";
		  $sql="select * from tbl_project where id='".$project_id."' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  $ROW=mysql_fetch_array($query) or die(http(0030));
				$cronym=($ROW['acronym']<>NULL)?"(".$ROW['acronym'].")":"";
		  $data.="<input name='intervention' id='intervention' value='".$ROW['id']."' type='hidden' ><strong>
		  	".retrieve_info_withSpecialCharactersNowordLimit($ROW['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($ROW['title'])." ".$cronym."</strong></td>
        </tr>
		<tr>
        <td><center>".retrieve_info_withSpecialCharactersNowordLimit($ROW['project_code'])."</center></td>
        </tr>
		<tr>
        <td><center>".$ROW['subgrante_agreement']."</center></td>
        </tr>";
		
		$queryProgramme=@mysql_fetch_array("select * from tbl_programme where programme_id='".$ROW['programme_id']."'");
		$acronym=($queryProgramme['Accronym']<>NULL)?"(".$queryProgramme['Accronym'].")":"";
		$data.="<tr>
        <td><center>".$queryProgramme['program_name']." ".$acronym."</center></td>
        </tr>
		
		<tr>
        <td><center>Semi-Annual (Annual) Performance Report </center></td>
        </tr>
		<tr>
        <td><center>".$row['sem_annual']."</center></td>
        </tr>
		<tr>
        <td><center>".$row['dateofsubmission']."</center></td>
        </tr>
		 	 	
		</table>
		</div>
		<table>
        <tr>
          <td colspan=2>
          <strong><center>Executive Summary</center></strong></td></tr><tr>
          <td colspan='2' align='justify'>".$row['executive_summary']."</td>
        </tr>
      <tr>
          <td colspan='2' >
         <strong><center>1.0 Introduction</center></strong></td></tr><tr>
          <td colspan=2 align='justify'>".$row['Introduction']."</td>
        </tr>";
		
		
        $data.="<tr>
          <td>
        <strong>2.0 Project Progress </strong></td></tr><tr>
          <td colspan=2 align='justify'>".$row['project_progress']."</td></td>
        </tr>
        <tr>
          <td>
          <strong>3.0 Contribution to Program Purpose </strong></td></tr><tr>
          <td>".$row['ContributiontoProgramPurpose']."</td>
        </tr>
        <tr>
          <td>
          <strong>4.0 Deviation from the Original Results Chain </strong></td></tr><tr>
          <td colspan=2 align='justify'>".$row['Deviation']."</td>
        </tr>
        <tr>
          <td colspan=2 >
         <strong>5.0 Inputs</strong></td></tr><tr>
          <td colspan=2 align='justify'>".$row['project_inputs']."</td>
        </tr>
        <tr>
          <td colspan=2><strong>6.0 Key Lessons</strong></td></tr>
		  <tr> <td colspan=2 align='justify'>".$row['lessons']."</td></tr>
        <tr><td><strong>7.0 Challenges and Solutions Identified</strong></strong></td></tr>
         <tr> <td colspan='2' align='justify'>".$row['Challenges']."</td><tr>
        </tr>
		
		
        <tr>
          <td colspan=2 >
          <div align='left'><strong>8.0 Plans for the Next Reporting Period</strong></div></td></tr>
			<tr><td colspan=2><center><table cellspacing='1' width='500' border='0'>";
		  $n=1; $is=5;$inc=1;
  $data.="
  
  <tr class='black2'>
    <td COLSPAN='5'><CENTER>PROJECT WORKPLAN</CENTER></td></tr>
  <tr class='black2'>
    <td >&nbsp;NO</td>
    <td>&nbsp;ACTIVITIES PLANNED FOR THE NEXT 6 MONTHS</td>
    <td>&nbsp;MILESTONES</td>
    <td>&nbsp;TIME FRAME</td>
	<td>&nbsp;YEAR</td>
  </tr>";
  
 // for($x=0;$x<$is;$x++){
  //$color=$inc%2==1?"evenrow":"white1";
  
  $SQLM="select * from tbl_projectworkplan where project_id='".$project_id."' and activity <>''  and narrative_id='".$narrative_id."'";
  //$obj->alert($SQLM);
   $querym=mysql_query($SQLM)or die("0707");
  while($rowm=mysql_fetch_array($querym)){
  $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='$color'><td>".$n++."</td>
    <td>".trim(retrieve_info_withSpecialCharactersNowordLimit($rowm['activity']))."</td>
    <td>".trim(retrieve_info_withSpecialCharactersNowordLimit($rowm['milestone']))."</td>
    <td>".$rowm['semi_annual']."</td>
	 <td>".$rowm['year']."</td></tr>";
	//$inc++;
  //$n++;								
  } 
  
  
$data.=noRecordsFound($querym,5);
  //}
$data.="</table>
<td></center></tr>";
		  
		  
		  
		  
		  
		  $data.="<tr><td colspan=2><center>";
		  
		 $data.=" <table><tr class='evenrow'>
    
    <td colspan='8' class='black2'><CENTER>ANNEX</CENTER></td></tr>
   <tr class='evenrow'><td colspan='8' class='black2'><center>List of all publications/knowledge products produced</center></td></tr>
	<tr>
<tr CLASS='evenrow'>
  <td colspan='1' class='black2'>NO</td>
    <td class='black2'>Title of Publication <br/>/Knowledge Product</td>
    <td class='black2'>Type of Publication</td>
	   <td class='black2'>Organization</td>
	      <td class='black2'>Author</td>
		   <td class='black2'>Date of Publication</td>
    <td class='black2'>Link</td>
	    <td class='black2'>Action</td>
  </tr>";
  $n=1;
  
  $selectpp="select p.`publication_id`, p.`project_id`, p.`prog_id`, p.`semi_annual`, p.`year`, p.`typeofpublication`, p.`other_publication`, p.`title` as publicationTitle, p.`organization`,o.orgName,l.codeName, p.`author`, p.`dateofpublication`, p.`link`, p.`Publication`, p.`updatedby`, p.`status`,r.id,r.title as project_title from 
			tbl_publication p left join 
			tbl_project r on(r.id=p.project_id)
			left join tbl_organization o on(p.organization=o.org_code)
			left join tbl_lookup l on(l.code=p.typeofpublication)
			where prog_id like '".$program_id."%' and project_id like '".$project_id."%'
			&& l.classCode='7'
			 ";
 		 	//$obj->alert($selectpp);
 		 	$querypp=@mysql_query($selectpp)or die(http("PR-2629"));
 			 while($rowpp=@mysql_fetch_array($querypp)){
 			 $data.="<tr>
 				 		<td> ".$n++." </td>
    		
    					<td>".checkExistance($rowpp['publicationTitle'],NULL,'ExistsString')."</td>
						<td>".checkExistance($rowpp['codeName'],NULL,'ExistsString')."</td>
	  					<td>".checkExistance($rowpp['orgName'],NULL,'ExistsString')."</td>
	   					<td>".checkExistance($rowpp['author'],NULL,'ExistsString')."</td>
						 <td>".$rowpp['dateofpublication']."</td>
						<td>".checkExistance($rowpp['link'],NULL,'ExistsString')."</td>";
						
						$download=($rowpp['Publication']==NULL)?"<td align='left'><input name='upload' type='button' id='".$rowpp['publication_id']."' value='Attach File'  onclick=\"xajax_AttachFile('".$rowpp['publication_id']."','tbl_publication');return false;\"></td>":"<td align='left'><a href='download.php?directory=docs/".$row['Publication']."' target='_blank'  class='green_field'><strong>Download</strong></a></td>";
						
  					$data.=$download."</tr>";
  }
  //$data.=noRecordsFound($querypp,3);
  
		
		$data.="</table>";
		$data.="</center>";
		
		
		
		
		
		
		
		
		
		
		$data.="</TD></tr>"; 
		
		$data.="<tr><td colspan=2 ><IFRAME SRC='z_trainings.php?linkvar=view_trainings&&project=".$project_id."&&quarter=".$semi_annual."&&year=".$year."&&program=".$program_id."' width='800' height='800'></iframe></td></tr>";
 
 $data.="<tr><td colspan='2'><a href='download.php?docs/".$row['report']."'>".$row['report']."</a></td></tr>
		
          ";
          
		  $data.="<tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Edit' onclick=\"xajax_edit_TSOqualitativeReporting2('".$narrative_id."','".$quarter."','".$div."','".$project_id."');return false;\"  /> | <a href='export_to_excel_word.php?linkvar=Export Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."&&program_id=".$program_id."&&format=word'  ><input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Export to Excel'  /></a> | <a href='print_version2.php?linkvar=Print Narrative Report&&narrative_id=".$narrative_id."&&quarter=".$quarter."&&project_id=".$project_id."&&year=".$year."&&program_id=".$program_id."&&format=Print'  target='_blank' ><input type='button' class='formButton2'name='edit' id='button' style='width:100px;' value='Print Version'  /></a>
          | <input type='button' name='Close' onclick=\"xajax_view_NarrativequalitativeReport('','','".$div."','','','');\" value='Close' class='formButton2' ></div></td>
        </tr>";
		}
        $data.="</table></FORM>";

	  
		
		




$obj->assign($div,'innerHTML',$data);
return $obj;
}


function view_qualitativeReporting($year,$program,$project){
$obj = new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
if($year=='Closed'||$_SESSION['quarter']=='Closed'){
$obj->alert('Your Reporting Period Closed! Your will only be able to view  Records .');
//return $obj;
}


$n=1; $inc=1;

$program=(($program<>NULL)||($program<>0))?$prog_id:($_SESSION['program_id']==0?"":$_SESSION['program_id']);
$project=(($project<>NULL)||($project<>0))?$project:($_SESSION['project_id']==0?"":$_SESSION['project_id']);

/* if($_SESSION['role_id']==5){

}else {

$_SESSION['program_id']='';
$_SESSION['project_id']='';
 $_SESSION['program_id']=$program;
$_SESSION['project_id']=$project; 
} */

$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']='';

$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 

/*$obj->alert($_SESSION['role_id']);*/ 
/* $obj->alert($_SESSION['program_id']);
$obj->alert($_SESSION['project_id']); */
 


//$obj->alert($_SESSION['Ryear']);
		$half_1='Jan - Jun';
 		$half_2='Jul - Dec';
$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";
$data.="<table cellspacing='0' id='report' width='100%' border='0'> 
<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Year:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='year' id='year' onchange=\"xajax_view_qualitativeReporting(getElementById('year').value,); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		
		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Program:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='program' id='program' onchange=\"xajax_view_qualitativeReporting('".$year."',this.value,'".$project."'); return false;\" style='width:300px;'><option value=''>-All-</option>";
		 
			
				$data.=QueryManager::ProgramFilter($program);
			
															 
 		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Project:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='project' id='project' onchange=\"xajax_view_qualitativeReporting('".$year."','".$program."',this.value); return false;\" style='width:300px;'><option value=''>-All-</option>";
		 								
						
						
						$data.=QueryManager::ProjectFilter($program,$project);
								
		$data.="</select></strong></div></td>
        </tr>
	  <tr>
        <th colspan='13' ><div align='center' class=''> SEMI-ANNUAL perfomance REPORT</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th>
	   <th width='' colspan=7 ><strong class=''>PROJECT</strong></th>
		<th  width='70'><strong class=''>JAN - JUN</strong></th>
		
		<th  width='70'><strong class=''>JUL - DEC</strong></th>
		 </tr>";

//$obj->alert($sqlx);
		
		$queryx=QueryManager::ProgramNarrativeReporting($program);
		  while($rowx=FetchRecords($queryx)){
	  		$data.="<tr><td><strong>".$rowx['program_id']."</strong></td><td colspan='10'><strong>".$rowx['program_name']."</strong></td></tr>";
	  
	  //---------------------Projects under each program--------------------------
	
		$query_string=QueryManager::ProjectNarrativeReporting($program,$project);
		//$obj->alert($query_string);
		$query_=Execute($query_string)or die(http("QMGR-219"));
			while($row=FetchRecords($query_)){
			
			
				 /**/ $query_stringx="select l.id,l.title,l.project_code,q.narrative_id,q.org_code,q.reportingPeriod,q.semi_annual,q.year,
					sum(if(((q.semi_annual='".$half_1."') and q.project_id='".$project."' and q.year='".$_SESSION['Ryear']."'),q.project_id,0)) AS Quarter1,
					sum(if(((q.semi_annual='".$half_2."') and q.project_id='".$project."' and q.year='".$_SESSION['Ryear']."'),q.project_id,0)) AS Quarter2
					from tbl_project l left join 
					tbl_tsoqualitative q  on(l.id=q.project_id) 
					 where l.id ='".$row['id']."'
					 group by l.id order by l.id Asc";
				
				  $query_n=Execute($query_stringx)or die(http("PR-1311"));
					
# $obj->alert($query_stringx);
							while($rowq=FetchRecords($query_n)){ 
							//$obj->alert($row['id']);
							//$_SESSION['project_id']=$row['id'];
							$div="status".$row['id'];
								  $color=$n%2==1?"evenrow3":"white1";
								 $data.="<tr class=$color class='black'>
								 <td>".$inc++."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$row['id']."' />
								 <input name='narrative_id[]' id='narrative_id' type='hidden' value='".$row['id']."' />
								 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
								</td>
								<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$row['id']."'>
								".retrieve_info_withSpecialCharactersNowordLimit($row['project_code'])."
						 ".ucfirst(strtolower(retrieve_info_withSpecialCharactersNowordLimit($row['title'])))."</td>
									<td align='center'>";


if(($rowq['Quarter1']>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('".$half_1."','".$_SESSION['Ryear']."','".$row['id']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_qualitativeReporting('".$row['id']."','".$half_1."');return false;\">";
}

$data.="</td>
<td align='center'>";


if(($rowq['Quarter2']>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('".$half_2."','".$_SESSION['Ryear']."','".$row['id']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_qualitativeReporting('".$row['id']."','".$half_2."');return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='$div'></div></td></tr>
	  
	  ";
	  $n++;
	  }}
	  }
   
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//-----------------view_quantitativeReportLog-----------------------
function view_quantitativeReportLog($prog_id,$project,$year){
$obj = new xajaxResponse();

if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']=$year;
$half_1='Jan - Jun';
$half_2='Jul - Dec';
$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 

/* $obj->alert($_SESSION['program_id']);
$obj->alert($_SESSION['project_id']); */

$prog_id=(($prog_id<>NULL)||($prog_id >0))?$prog_id:($_SESSION['program_id']==0?"":$_SESSION['program_id']);
$project_id=(($project_id<>NULL)||($project_id<>0))?$project_id:($_SESSION['project_id']==0?"":$_SESSION['project_id']);



//$obj->alert($prog_id);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Year:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='year'  id='year' onchange=\"xajax_view_quantitativeReportLog('".$prog_id."','".$project."',this.value); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2009);
		
		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Program:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='prog_id' id='prog_id' onchange=\"xajax_view_quantitativeReportLog(this.value,'".$project."','".$_SESSION['Ryear']."'); return false;\" style='width:300px;'><option value=''>-ALL-</option>";
		$data.=QueryManager::ProgramFilter($prog_id);
		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Project:</div></td><td colspan='10' ><div align='LEFT' class=''><select name='project' id='project' onchange=\"xajax_view_quantitativeReportLog('".$prog_id."',this.value,'".$_SESSION['Ryear']."'); return false;\" style='width:300px;'><option value=''>-ALL-</option>";
		/* if($_SESSION['role_id']==5){
		  $sql1="select * from tbl_project where id like '".$_SESSION['project_id']."%' order by project_code asc";
		  //$obj->alert($sql);
		  $query=@mysql_query($sql1) or die(http("Workplan-137"));
		  while($ROW=@mysql_fetch_array($query)){
					$selected1=($_SESSION['project_id']==$ROW['id'])?"SELECTED":"";
		 			 $data.="<option value=\"".$ROW['id']."\" ".$selected1." >".$ROW['project_code']." ".substr($ROW['title'],0,100)."</option>";
		 										 }
		  }elseif($_SESSION['role_id']==6){
		  $sql1="select * from tbl_project where id like '".$_SESSION['project_id']."%' order by project_code asc";
		  //$obj->alert($sql);
		  $query=@mysql_query($sql1) or die(http("Workplan-137"));
		  while($ROW=@mysql_fetch_array($query)){
		$selected1=($_SESSION['project_id']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected1." >".$ROW['project_code']." ".substr($ROW['title'],0,100)."</option>";}
		  
		  
		  
		  
		  }else { 
	
		
		
		
		// $data.="".funct_dropDownSelected('tbl_project', 'title', 'id', 'id',$project);		
					$sqlproject="select * from tbl_project where  programme_id='".$prog_id."' order by project_code";
					#$obj->addAlert($_SESSION['name']);
					$query_Project=Execute($sqlproject)or die(http("PR-1337"));
	  					while($rowProject=FetchRecords($query_Project)){
								$selectedP=($rowProject['id']==$project)?"selected":"";
							$data.="<option value=\"".$rowProject['id']."\" ".$selectedP.">".$rowProject['project_code']." ".retrieve_info_withSpecialCharacters($rowProject['title'])."</option>";
						
						}
						
						}
						
		 */
		 
		 
		 $data.=QueryManager::ProjectFilter($prog_id,$project);
		 
		$data.="</select></strong></div></td>
        </tr>
	  <tr>
        <th colspan='13' ><div align='center' class=''>SEMI-ANNUAL Quantitative perfomance Monitoring</div></th>
        </tr>
      
      <tr>
	  <th colspan=2><b class='' >NO.</th>
	   <th width='' colspan='7' ><strong class=''>Project Code/Project Name</strong></th>
		<th  width='70'><strong class=''>JAN - JUN</strong></th>
		
		
		<th  width='70'><strong class=''>JUL - DEC</strong></th>
		 </tr>";

$sqlPr=QueryManager::ProgramGeneralQuery($prog_id);
//$obj->alert($sqlPr);
$query_=@Execute($sqlPr)or die(http("PR-1484"));
//$query_=@mysql_query("select * from tbl_programme where prog_id like '".$prog_id."%' and type like 'Program%' order by prog_id",$_SESSION['connections'])or die(http("PR-1307"));
while($row=FetchRecords($query_)){
$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
$data.="<tr class='evenrow' '".$events2."'><td colspan='11'><strong>".$row['program_id']." ".$row['program_name']."</strong></td></tr>";

$qlP="select * from tbl_project where  programme_id='".$row['prog_id']."' and id like '".$project."%' order by project_code";

		$sqlProject=QueryManager::ProjectGeneralQuery($row['prog_id'],$project);
		$query_P=@Execute($sqlProject)or die(http("PR-1493"));
		//$obj->alert($sqlProject);
			#$query_P=@mysql_query($qlP,$_SESSION['connections'])or die(http("PR-1312"));
		 while($rowP=FetchRecords($query_P)){


 $query_string="select q.`id`, q.`org_code`, q.`prog_id`,q.`project_id`,p.id,p.title,p.project_code, q.`subcomponent_id`,q.reportingPeriod,q.semi_annual,q.year,

sum(if(((q.semi_annual='".$half_1."')  and q.year like '".$_SESSION['Ryear']."%'),q.project_id,'')) AS Quarter1,

sum(if(((q.semi_annual='".$half_2."')  and q.year like '".$_SESSION['Ryear']."%'),q.project_id,'')) AS Quarter2
 FROM tbl_project p
LEFT JOIN tbl_organizationreporting q ON ( q.project_id = p.id ) 
where p.id='".$rowP['id']."'
 group by p.id order by p.project_code,p.title Asc"; 
 $query_n=mysql_query($query_string,$_SESSION['connections'])or die(http("PR-0185"));
 //$obj->alert($query_string);
while($rowq=mysql_fetch_array($query_n)){
//$obj->alert($rowq['title']);
$div="Program".$row['prog_id'].$rowq['id'];
//$_SESSION['program_id']=$row['prog_id'];
//$div="status".$row['id'];
	  $color=$n%2==1?"evenrow3":"white1";
	  $events2="onmouseup=\"this.style.backgroundColor='#999999';\"";

     $data.="<tr class=$color class='black'  '".$events2."'>
	 <td> ".$inc++."</td><td>".$rowP['project_code']."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$rowP['id']."' />
	 
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$rowq['id']."'> ".retrieve_info_withSpecialCharacters(ucfirst(strtolower($rowq['title'])))."</td>
		<td align='center'>";


										if(($rowq['Quarter1']<>0)){
										
										$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdQuantitative('".$half_1."','".$_SESSION['Ryear']."','".$row['prog_id']."','".$rowq['id']."','".$div."');return false;\">";
										}else{
										$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['prog_id']."','".$half_1."','','".$rowq['id']."','".$_SESSION['Ryear']."');return false;\">";
										}
										
										$data.="</td><td align='center'>";
										
										
										if(($rowq['Quarter2']<>0)){
										$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdQuantitative('".$half_2."','".$_SESSION['Ryear']."','".$row['prog_id']."','".$rowq['id']."','".$div."');return false;\">";
										}else{
										$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['prog_id']."','".$half_2."','','".$rowq['id']."','".$_SESSION['Ryear']."');return false;\">";
										}
										
										$data.="</td>
											  </tr>
											  <tr><td colspan=15><div id='".$div."'></div></td></tr>
											  										  ";
	  $n++;
	  }

	  }
	   



}  
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_quantitativeReportLogBackup($prog_id,$year){
$obj = new xajaxResponse();
$dbh1 = @mysql_connect($hostname="localhost", $username="root", $password="craiwrut",true); 
//$dbh2 = mysql_connect($hostname, $username, $password, true); 
@mysql_select_db('db_asareca_v3_1', $dbh1);
#mysql_select_db('database2', $dbh2);
#mysql_query('select * from tablename', $dbh1);
#mysql_query('select * from tablename', $dbh2);
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']=$year;
$half_1='Jan - Jun';
$half_2='Jul - Dec';
$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 
//$obj->alert($_SESSION['Ryear']);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>YEAR:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='year'  id='year' onchange=\"xajax_view_quantitativeReportLog('".$prog_id."','".$project."',this.value); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2009);
		
		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Program:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='prog_id' id='prog_id' onchange=\"xajax_view_quantitativeReportLog(this.value,'".$project."','".$_SESSION['Ryear']."'); return false;\" style='width:300px;'><option value=''>-ALL-</option>";
		
		 $data.="".funct_dropDownSelected('tbl_programme', 'program_name', 'prog_id', 'program_name',$prog_id);
		$data.="</select></strong></div></td>
        </tr>
	  <tr>
        <th colspan='13' ><div align='center' class=''>SEMI-ANNUAL Quantitative perfomance Monitoring</div></th>
        </tr>
      
      <tr>
	  <th colspan=2><b class='' >NO.</th>
	   <th width='' colspan=7 ><strong class=''>Proect Code/Project Name</strong></th>
		<th  width='70'><strong class=''>JAN - JUN</strong></th>
		
		
		<th  width='70'><strong class=''>JUL - DEC</strong></th>
		 </tr>";

#$ql=;

#$obj->addAlert($_SESSION['name']);
$query_=Execute("select * from tbl_programme where prog_id like '".$prog_id."%' and type like 'Program%' order by prog_id",$dbh1)or die(http("PR-1307"));
while($row=FetchRecords($query_)){
$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
$data.="<tr class='evenrow' '".$events2."'><td colspan='11'><strong>".$row['program_id']." ".$row['program_name']."</strong></td></tr>";

	  
$qlP="select * from tbl_project where  programme_id='".$row['prog_id']."' order by id";

#$obj->addAlert($_SESSION['name']);
$query_P=Execute($qlP)or die(http("PR-1312"));


	  while($rowP=FetchRecords($query_P)){


 $query_string="select q.`id`, q.`org_code`, q.`prog_id`,q.`project_id`,p.id,p.title,p.project_code, q.`subcomponent_id`,q.reportingPeriod,q.semi_annual,q.year,

sum(if(((q.semi_annual='".$half_1."')  and q.year like '".$_SESSION['Ryear']."%'),q.project_id,'')) AS Quarter1,

sum(if(((q.semi_annual='".$half_2."')  and q.year like '".$_SESSION['Ryear']."%'),q.project_id,'')) AS Quarter2
 FROM tbl_project p
LEFT JOIN tbl_organizationreporting q ON ( q.project_id = p.id ) 
where p.id='".$rowP['id']."'
 group by p.id order by p.title Asc"; 
 $query_n=mysql_query($query_string)or die(http("PR-0185"));
 //$obj->alert($query_string);
while($rowq=mysql_fetch_array($query_n)){
//$obj->alert($row['prog_id']);
$div="Program".$row['prog_id'].$rowq['id'];
//$_SESSION['program_id']=$row['prog_id'];
//$div="status".$row['id'];
	  $color=$n%2==1?"evenrow3":"white1";
	  $events2="onmouseup=\"this.style.backgroundColor='#999999';\"";

     $data.="<tr class=$color class='black'  '".$events2."'>
	 <td> ".$inc++."</td><td>".$rowP['project_code']."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$rowP['id']."' />
	 
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$rowP['id']."'> ".retrieve_info_withSpecialCharacters(ucfirst(strtolower($rowP['title'])))."</td>
		<td align='center'>";


if(($rowq['Quarter1']<>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdQuantitative('".$half_1."','".$_SESSION['Ryear']."','".$row['prog_id']."','".$rowq['id']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['prog_id']."','".$half_1."','','".$rowq['id']."','".$_SESSION['Ryear']."');return false;\">";
}

$data.="</td><td align='center'>";


if(($rowq['Quarter2']<>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordIdQuantitative('".$half_2."','".$_SESSION['Ryear']."','".$row['prog_id']."','".$rowq['id']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['prog_id']."','".$half_2."','','".$rowq['id']."','".$_SESSION['Ryear']."');return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='".$div."'></div></td></tr>
	  
	  ";
	  $n++;
	  }

	  }
	   
	  }
   
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}









 

#----------qualitativeReporting---------------------------



function new_qualitativeReporting($intervention,$quarter){
$obj = new xajaxResponse();
$_SESSION['intervention']='';
$_SESSION['intervention']=$intervention;
$_SESSION['semi_annual']=$quarter;
$curr_date=date('Y-m-d');
 $semi_annual=mysql_fetch_array(mysql_query("select * from tbl_quarters where quarterName like '".$_SESSION['quarter']."%'"))or die(http(0699));
 if($_SESSION['semi_annual']<>$semi_annual['semi_annual']){
$obj->alert("You are Trying to enter Details in a wrong Quarter/Half! Process Halted!");
return $obj;

} 
 
$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table cellspacing='0'  width='100%' border='0'>";
     for($i=0;$i<count($intervention['code']);$i++){
	 
	 $data.="<tr>
          <td width='30%'>
          <div align='left'><strong>Project Title/Code:</strong></div></td>
          <td>";
		  $sql="select * from tbl_project where id='".$intervention."' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  $ROW=mysql_fetch_array($query) or die(http(1103));
		
		  $data.="<input name='intervention' id='intervention' value='".$ROW['id']."' type='hidden' ><strong>
		  ".substr($ROW['title'],0,500)."</strong></td>
        </tr>
		
        <tr>
          <td>
          <div align='left'><strong>Executive Summary</strong><em>[0.5 page]</em></div></td>
          <td><textarea name='plannedActivities'  cols='100' rows='5'  onKeyDown=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\" onKeyUp=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\"></textarea>&nbsp;<em>You have <input readonly type='text' name='countdownplannedActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></em></td>
        </tr>
      <tr>
          <td>
          <div align='left'><strong>1.0 Introduction</strong><em>(0.5 page)</em></div></td>
          <td><textarea name='implementation1' id='implementation1' cols='100' rows='5' onKeyDown=\"limitText(this.form.implementation1,this.form.countdownimplementation1,500);\" onKeyUp=\"limitText(this.form.implementation1,this.form.countdownimplementation1,500);\"></textarea><em>You have <input readonly type='text' name='countdownimplementation1' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></em></td></td>
        </tr>";
		
		
        $data.="<tr>
          <td>
          <div align='left'><strong>2.0 Project Progress </strong><em>(Maximum 3 pages)</em></div></td>
          <td><textarea name='achievements' id='achievements' cols='100' rows='10'  onKeyDown=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\" onKeyUp=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\"></textarea><em>You have <input readonly type='text' name='countdownachievements' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></em></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>3.0 Contribution to Program Purpose </strong><em>[Max 3 pages]</em></div></td>
          <td><textarea name='deviations' id='deviations' cols='100' rows='10'
		  
		  onKeyDown=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\" onKeyUp=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\"></textarea><em>You have <input readonly type='text' name='countdowndeviations' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></em></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>4.0 Deviation from the Original Results Chain </strong><em>[Max 0.5 page]</em></div></td>
          <td><textarea name='challenges' id='challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\" onKeyUp=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\"></textarea><em>You have <input readonly type='text' name='countdownchallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font</em></td></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>5.0 Inputs</strong> <em>[Max 0.5 page]</em> </div></td>
          <td><textarea name='next_quarter' id='next_quarter' cols='100' rows='5' onKeyDown=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\" onKeyUp=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\"></textarea><em>You have <input readonly type='text' name='countdownnext_quarter' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></em></td>
        </tr>
        <tr>
          <td><div align='left'><strong>6.0 Key Lessons</strong><em> [Max 0.5 page]</em></div></td> <td><textarea name='KeyLessons' id='KeyLessons' cols='100' rows='5' onKeyDown=\"limitText(this.form.KeyLessons,this.form.countdownKeyLessons,500);\" onKeyUp=\"limitText(this.form.KeyLessons,this.form.countdownKeyLessons,500);\"></textarea>You have <input readonly type='text' name='countdownKeyLessons' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><div align='left'><strong>7.0 Challenges and Solutions Identified</strong><em> [Max 0.5 page]</em></div></td>
          <td><textarea name='challng' id='challng' cols='100' rows='5' onKeyDown=\"limitText(this.form.challng,this.form.countdownchallng,500);\"
		   onKeyUp=\"limitText(this.form.challng,this.form.countdownchallng,500);\"></textarea><em>You have <input readonly type='text' name='countdownchallng' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font</em></td></td>
        </tr>
		
		
        <tr>
          <td>
          <div align='left'><strong>8.0 Plans for the Next Reporting Period [Max 0.5 page]</strong></div></td><td><table cellspacing='0'      width='500' border='0'>";
		  $n=1; $is=10;$inc=1;
  $data.="<tr>
    <th>&nbsp;NO</th>
    <th>&nbsp;Activities planned for next 6 months</th>
    <th>&nbsp;Milestones</th>
    <th>&nbsp;Timeframe</th>
  </tr>";
  for($x=0;$x<$is;$x++){
  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='$color'><td><input type='hidden' name='loopkey[]' id='loopkey' value='1'>".$n++."</td>
    <td><textarea name='activity[]' cols=50 rows=3>&nbsp;</textarea></td>
    <td><textarea name='milestone[]' cols=18 rows=3>&nbsp;</textarea></td>
    <td><select name='quarter[]' size='1'><option value='' >-select-</option>";
	$s=mysql_query("select quarterName from tbl_quarters group by quarterName asc") or die(http(0789)); 
	while($rr=mysql_fetch_array($s)){
	$data.="<option value=\"".$rr['quarterName']."\" >".$rr['quarterName']."</option>";
	}
	$data.="</select></td><td><select name='year[]' id='year[]' size='1'><option value=''>-Select-</option>";
		 
		 $end=date('Y')+1;
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2009);
$data.="</select></td>
    
  </tr>";
  
  $inc++;
  }
$data.="</table>
<td>
		  
		  
		  
		  
		  
		  </tr>
		  
		  <tr>
          <td width='30%'>
          <div align='left'><strong>Submitted By:</strong></div></td>
          <td><input name='sumbittedby' type='text' value='".$_SESSION['username']."' size='80' id='sumbittedby'></td>
        </tr>
		<tr>
          <td width='30%'>
          <div align='left'><strong>Date of Submission:</strong></div></td>
          <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.formUploadIndividual.dateofSubmission);return false;\" hidefocus=''>
<input name='dateofSubmission' type='text'  size='80' value='".$curr_date."' id='dateofSubmission' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td>
        </tr>
		  
		  
		  
		  <td><input type='hidden' name='textDir[]' id='textDir' value='Workplan for next Quarter'></td>
          <td><input name='fileDir' type='file' id='fileDir' size='30' /><div style='float:right;'><a onClick='ShowDirec()'><input name='' type='hidden' class='formButton2'value='Upload More Files'></a></div></td>
        </tr>";
		
		
		$data.="<tr>
		</table>
		
		<table cellspacing='0'  width='700' cellpadding='5' cellspacing='5' align='left'>
          <tr>
            <td colspan='2' align='left'><div id='dirRec'>
              
            </div></td>
            </tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr>";
        /*   $data.="<tr>
            <td width='40%' align='right' class='formLabel'>&nbsp;</td>
            <td><input name='bttnUpload' type='submit' id='bttnUpload' value='  Upload  '></td>
          </tr>";
		   */
		 
		  $data.="<tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='submit' name='save_TSOQualitativeReporting' id='button' class='formButton2' style='width:200px;' value='Save'  />
          </div></td>
        </tr>";
		}
        $data.="</table>

     </FORM>";


$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#----------------------------------------------

function TSO_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;
/* $_SESSION['intervention']='';
$_SESSION['intervention']=$intervention;
 */
$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table cellspacing='0'      width='700' border='0'>
";


$select="select t.narrative_id,t.org_code,o.orgName,t.intervention,i.codeName,reportingPeriod,t.year,t.plannedActivities,t.implementation,t.achievements,t.deviations,t.challenges,t.next_quarter,t.lessons ,i.codeName as interventionName,i.code from tbl_tsoqualitative t inner join tbl_organization o on(o.org_code=t.org_code) inner join tbl_lookup i on(i.code=t.intervention) where i.classcode='5' and narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
      $data.="<tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <input name='' type='button' class='formButton2'value='Back' onclick=\"xajax_viewQualiatativeTSOEntered('','','','');return false;\"> |<a href='print_version.php?linkvar=Print TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>
	  
	  
	<tr class='evenrow3'>
          <td width='100%' colspan=2>
          <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  QUALITATIVE  REPORT FOR ".strtoupper($row['orgName'])."</strong></div></td>
     </td>
        </tr>
	<tr class='white1'>
          <td width='50'>
          <div align='left'><strong>Intervention:</strong></div></td>
          <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['interventionName']."</td>
        </tr>
       <tr class='evenrow3'>
          <td colspan=2>
          <div align='justify'><p></p><strong>List of  activities planned for implementation During  the reporting period </strong></div></td></tr>
        <tr class='evenrow3'> <td colspan=2  align='justify'><p></p><p><li>".$row['plannedActivities']."</li></p></td></tr>
        </tr>
       <tr>
          <td colspan=2>
          <div align='justify' ><p></p><strong>Concise Description of Activity Implementation During  The Quarter</strong></div></td></tr>
		      <tr>
          <td colspan=2 align='justify'><p></p><p><li>
           ".$row['implementation']."</li></p></td>
        </tr>";
		
		
        $data.="    <tr class='evenrow3'>
          <td colspan=2>
          <div align='left'><p></p><strong>Key outputs and achievements obtained  against planned targets</strong></div></td></tr>
		 <tr class='evenrow3'>
          <td colspan=2><p></p><p><li>
                ".$row['achievements']."</li></p></td>
        </tr>
           <tr>
          <td colspan=2>
          <div align='justify'><p></p><strong>Reasons for any deviations from expected  outputs and targets</strong></div></td></tr>
		      <tr>
          <td colspan=2 align='justify'><p></p><p>
                     <li>".$row['deviations']."</li></p></td>
        </tr>
            <tr class='evenrow3'>
          <td colspan=2>
          <div align='justify'><p></p><strong>Main challenges met during implementation and  their effect on project implementation, how they were or will be addressed and  further support needed to address them </strong></div></td></tr>
		     <tr class='evenrow3'>
          <td colspan=2><p></p><p><li>".$row['challenges']."</li></p></td>
        </tr>
           <tr>
          <td colspan=2 align='justify'><p></p>
          <strong>Activities planned for implementation during  the next quarter and targets to achieve</strong></td></tr>
              <tr>
          <td colspan=2 align='justify'><p></p><p><li>".$row['next_quarter']."</li></p></td>
        </tr>
          <tr class='evenrow3'>
          <td colspan=2><div align='justify' ><p></p><strong>Human and Institutional  Change/Success story and photographs of project impact on local government OVC  systems, communities, households or lives of vulnerable children</strong></div></td></tr>
                     <td></td>
        </tr>
            <tr class='evenrow3'>
          <td colspan=2 align='justify' ><div '><p></p><strong>Good practices and lessons  learnt during the Quarter</strong></div></td></tr>
        <tr class='evenrow3'>
          <td colspan=2 align='justify'><p></p><p><li>".$row['implementation']."</li></p></td>
        </tr>";
		$query_upload=mysql_query("select * from tbl_uploads where narrative_id='".$row['narrative_id']."'")or die(http(1247));
		while($rowupload=mysql_fetch_array($query_upload)){
		$narrative_id=$rowupload['narrative_id'];
		$upload_id=$rowupload['upload_id'];
        $data.="<tr>
          <td colspan=2>
          <div align='left'><strong><a href='download.php?directory=BinaryDataFile&&narrative_id=$narrative_id&&upload_id=$upload_id&&format=word' target='_blank'>".$rowupload['documentName']."</a></strong></div></td>
                   
        </tr>
		
		<tr>
          <td>
          <div align='left'><strong></strong></div></td>
                     <td></td>
        </tr>";
		}
		
$data.="<tr>
		</table>
		
		<table cellspacing='0'      width='700' cellpadding='5' cellspacing='5' align='left'>
          <tr>
            <td colspan='2' align='left'><div id='dirRec'>
              
            </div></td>
            </tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr><tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <input name='' type='button' class='formButton2'value='Back' onclick=\"xajax_viewQualiatativeTSOEntered('','','','');return false;\"> | <a href='print_version.php?linkvar=Print TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export TSO Qualitative Quarterly Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>
          ";
		  
		  }

          
		  
		  $data.="
	  
        </table>
        </form>
      
      </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}





function ResultLead_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table cellspacing='0'      width='700' border='0'>
";



$query_string="select rl.narrative_id,rl.resultarea,s.subcomponent,s.subcomponent_code,rl.reportingPeriod,rl.year,rl.briefIntroduction,rl.listActivities,rl.descriptionOfImplementation,rl.resultsAndAchievements,rl.challenges,rl.goodpracticesandlessons,u.upload_id,u.documentName,u.content from tbl_resultleadreporting rl inner  join tbl_subcomponent s on(s.id=rl.resultarea) left join tbl_uploads u on(rl.narrative_id=u.narrative_id) where display='Yes'  and rl.narrative_id='".$narrative_id."' order by rl.year,rl.reportingPeriod Asc";

$queryRL=mysql_query($query_string)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryRL)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
      $data.="<tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>
	  
	  
	<tr class='evenrow3'>
          <td width='100%' colspan=2>
          <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  COUNTRY OFFICE STAFF QUARTERLY REPORT </strong></div></td>
     </td>
        </tr>
	<tr class='white1'>
          <td width='50'>
          <div align='left'><strong>Result Area:</strong></div></td>
          <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['subcomponent_code']." ".$row['subcomponent']."</td>
        </tr>
       <tr class='evenrow3'>
          <td colspan=2>
          <div align='justify'><p></p><strong>A brief introduction of the report</strong></div></td></tr>
        <tr class='evenrow3'> <td colspan=2  align='justify'><p></p><p><li>".$row['briefIntroduction']."</li></p></td></tr>
        </tr>
       <tr>
          <td colspan=2>
          <div align='justify' ><p></p><strong>Activities that were planned to be implemented during the reporting period and the expected targets/outputs</strong></div></td></tr>
		      <tr>
          <td colspan=2 align='justify'><p></p><p><li>
           ".$row['listActivities']."</li></p></td>
        </tr>";
		
		
        $data.="    <tr class='evenrow3'>
          <td colspan=2>
          <div align='left'><p></p><strong>A detailed description of implementation of each of the activities listed above during the quarter</strong></div></td></tr>
		 <tr class='evenrow3'>
          <td colspan=2><p></p><p><li>
                ".$row['descriptionOfImplementation']."</li></p></td>
        </tr>
           <tr>
          <td colspan=2>
          <div align='justify'><p></p><strong>A concise description of key specific results and achievements obtained, both quantitative and qualitative, during the quarter in relation to the annual targets</strong></div></td></tr>
		      <tr>
          <td colspan=2 align='justify'><p></p><p>
                     <li>".$row['resultsAndAchievements']."</li></p></td>
        </tr>
            <tr class='evenrow3'>
          <td colspan=2>
          <div align='justify'><p></p><strong>main challenges faced, their effect on project implementation, how they were or will be addressed </strong></div></td></tr>
		     <tr class='evenrow3'>
          <td colspan=2><p></p><p><li>".$row['challenges']."</li></p></td>
        </tr>
           <tr>
          <td colspan=2 align='justify'><p></p>
          <strong>Good practices and lessons learned  during the quarter </strong></td></tr>
              <tr>

          <td colspan=2 align='justify'><p></p><p><li>".$row['goodpracticesandlessons']."</li></p></td></tr>";
		  
		 /*  $sqlupload="select * from tbl_uploads where narrative_id='".$row['narrative_id']."' and responsible like 'Results Lead'";
		  $obj->addAlert($sqlupload);
		  $queryupload=mysql_query($sqlupload)or die(http(0822));
		   while($rowupload=mysql_fetch_array($queryupload)){ */
		    $data.="<tr><td>Attached Deliverable:</td><td colspan='' align='justify'><a href='export_to_excel_word.php?linkvar=Export Attached Deliverable&&upload_id=".$row['upload_id']."&&format=word'>".$row['documentName']."<input name='' type='button' class='formButton2'value='Download'></a></td></tr>";
		  #}
		   $data.="<tr><td colspan='' align='justify'></td><td colspan='' align='justify'></td></tr>";
        $data.="<tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export ResultLead Qualitative Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>";
		  
		  }

          
		  
		  $data.="</table></form>
      
      </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function Staff_Details($narrative_id){
$obj= new xajaxResponse();
$n=1;

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
<table cellspacing='0'      width='700' border='0'>
";


$query_string="select st.narrative_id,st.region,z.zoneName,st.districtsVisited,st.OtherpersonsonTrip,st.purposeofTrip,st.personsMet, st.AccountofTrip,st.reportingPeriod,st.year,st.FinancialYear,st.Findings,st.actionPoints,st.ConclusionsAndRecommendations,
 st.followUpAreas,st.report,st.report2,st.updatedby,st.display,st.to_datevisited,st.from_datevisited from  tbl_staffreporting st inner join tbl_zone z on(z.zoneCode=st.region) where st.display='Yes' and narrative_id='".$narrative_id."' order by 1 asc ";

$queryTSO=mysql_query($query_string)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
//<input type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'
      $data.="<tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print Field Trip Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export Field Trip Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>
	  
	  
	<tr class='evenrow3'>
          <td width='100%' colspan=2>
          <div align='center'><strong>".strtoupper($row['reportingPeriod'])." ".$row['year']."  FIELD TRIP REPORT SUMMARY </strong></div></td>
     </td>
        </tr><tr class='evenrow3'>
          <td width='100%' colspan=2>
          <div align='center'><strong> By</strong></div></td>
     </td>
        </tr>
		<tr class='evenrow3'>
          <td width='100%' colspan=2>
          <div align='center'><strong>".strtoupper($_SESSION['name'])." </strong></div></td>
     </td>
        </tr>
	<tr class='white1'>
          <td width='30%'>
          <div align='left'><strong>Region:</strong></div></td>
          <td align='left'><input type='hidden' name='narrative_id[]' id='narrative[]' value='".$row['narrative_id']."' >".$row['zoneName']."</td>
        </tr>
       <tr class='evenrow3'>
          <td colspan=''>
          <div align='justify'><p></p><strong>Districts Visited in the Region:</strong></div></td>
      <td colspan=''  align='justify'>".$row['districtsVisited']."</td>
        </tr>
       <tr>
          <td colspan=''>
          <div align='justify' ><p></p><strong>Dates of the visit:</strong></div></td>
          <td colspan='' align='justify'>From ".$row['from_datevisited']."  to  ".$row['to_datevisited']."</td>
        </tr>
		 <tr class='evenrow3'>
          <td colspan='' >
          <div align='justify' ><strong>Other Persons on the Trip:</strong></div></td>
          <td colspan='' align='justify'>".$row['OtherpersonsonTrip']."</td>
        </tr>";
		
		
        $data.="
           <tr>
          <td colspan=2>
          <div align='justify'><p></p><strong>Purpose of Trip and Objective(s)</strong></div></td></tr>
		      <tr>
          <td colspan=2 align='justify'><p></p><p>
                     <li>".$row['purposeofTrip']."</li></p></td>
        </tr>    
		<tr class='evenrow3'>
          <td colspan=''>
          <div align='left'><strong>Persons met during the trip</strong></div></td><td colspan=''>
                ".$row['personsMet']."</td>
        </tr>
        <tr class=''>
          <td colspan=2>
          <div align='justify'><p></p><strong>Account of the Trip</strong></div></td></tr>
		     <tr class=''>
          <td colspan=2><p></p><p><li>".$row['AccountofTrip']."</li></p></td>
        </tr>
           <tr class='evenrow3'>
          <td colspan=2 align='justify'><p></p>
          <strong>Findings</strong></td></tr>
              <tr class='evenrow3'>

          <td colspan=2 align='justify'><p></p><p><li>".$row['Findings']."</li></p></td>
        </tr>
          <tr class=''>
          <td colspan=2><div align='justify' ><p></p><strong>Action points</strong></div></td></tr>
        <tr><td colspan=2><p><li>".$row['actionPoints']."</li></p></td>
        </tr>
            <tr class='evenrow3'>
          <td colspan=2 align='justify' ><div '><p></p><strong>Conclusions and Recommendations</strong></div></td></tr>
        <tr class='evenrow3'>
          <td colspan=2 align='justify'><p></p><p><li>".$row['ConclusionsAndRecommendations']."</li></p></td>
        </tr>
        <tr>
          <td colspan=2>
          <div align='left'><strong>Follow-up areas</strong></div></td></tr>
		  <tr><td colspan='2'><li>".$row['followUpAreas']."</li></td></tr>";

$data.="<tr>
		</table>
		
		<table cellspacing='0'      width='700' cellpadding='5' cellspacing='5' align='left'>
          <tr>
            <td colspan='2' align='left'><div id='dirRec'>
              
            </div></td>
            </tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr><tr class='evenrow3'>
          <td>&nbsp;</td>
          
		  <td><div align='right'> <div style='float:right;'> <a href='print_version.php?linkvar=Print Field Trip Report&&narrative_id=".$row['narrative_id']."' target='_blank'> <input type='button' class='formButton2'name='' id='button' value='Print Version'  /></a> |
            <a href='export_to_excel_word.php?linkvar=Export Field Trip Report&&narrative_id=".$row['narrative_id']."&&format=word'><input type='button' class='formButton2'name='' id='button' value='Export to Word'  /></a>
          </div></td>
        </tr>
          ";
		  
		  }

          
		  
		  $data.="
	  
        </table>
        </form>
      
      </table></FORM>";





$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}







#--------------------view_new_resultLeadReporting---------------------------
function view_resultLeadReporting($resultarea,$year,$quarter){
$obj= new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect("index.php");
return $obj;
}
/* $resultarea=($resultarea!=0)?$resultarea:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year; */
/* $_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
 */

#==================================================================
$n=1; $inc=1;
/* $_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district; */

$data.="<form name='organization' id='organization'   action='?' method='post'>
";


$data.="<table cellspacing='0'      width='668' border='0'> 
	  <tr>
        <th colspan='13' ><div align='center' class=''>RESULT LEAD QUALITATIVE REPORT LOG</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th><th><b class=''>CODE</th>
	   <th width='' colspan=7 ><strong class=''>INTERMEDIATE RESULT AREA</strong></th>
<th  width='70'><strong class=''>JAN - MAR</strong></th><th  width='70'><strong class=''>APR - JUN</strong></th><th  width='70'><strong class=''>JUL - SEP</strong></th><th  width='70'><strong class=''>OCT - DEC</strong></th>
		
		

      </tr>";

#$query_string="select * from tbl_tsoqualitative qr join  tbl_organization o on(o.org_code=qr.org_code) join tbl_lookup l on(l.code=qr.intervention) where l.classCode='5' order by o.org_code,qr.year,qr.reportingPeriod Asc";

/* $query_string="select rl.resultarea,rl.reportingPeriod,rl.year,s.subcomponent_code,s.id,s.subcomponent,CASE rl.reportingPeriod when 'Jan - Mar' then 'Quarter1'
when 'Apr - Jun' then 'Quarter2'
when 'Jul - Sep' then 'Quarter3'
when 'Oct - Dec' then 'Quarter4'
end



 from tbl_subcomponent s left join tbl_resultleadreporting rl on(s.id=rl.resultarea) where s.id='".$_SESSION['usersubcomponent']."'  order by subcomponent_code Asc"; */
#$obj->addAlert($query_string);
$rowyear=mysql_fetch_array(mysql_query("select year,quarter from tbl_active where status='open'"))or die(http(1024));
$year=($rowyear['year']!='Closed')?$rowyear['year']:$_SESSION['Activeyear'];


$selectRA=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."'")or die(http("1646"));
while($rowRa=mysql_fetch_array($selectRA)){
/* $query_string="select rl.narrative_id,rl.resultarea,rl.reportingPeriod,rl.year,s.subcomponent_code,s.id,s.subcomponent,
sum(if((rl.reportingPeriod='Jan - Mar'),rl.narrative_id,'')) AS Quarter1,
sum(if((rl.reportingPeriod='Apr - Jun'),rl.narrative_id,'')) AS Quarter2,
sum(if((rl.reportingPeriod='Jul - Sep'),rl.narrative_id,''))AS Quarter3,
sum(if((rl.reportingPeriod='Oct - Dec'),rl.narrative_id,'')) AS Quarter4 
 from tbl_resultleadreporting rl left join tbl_subcomponent s   on(s.id=rl.resultarea) where s.id in('".$rowRa['id']."') and rl.year like '".$year."' group by rl.resultarea order by subcomponent_code Asc"; */
 
 
 $query_string="SELECT rl.narrative_id, rl.resultarea, rl.reportingPeriod, rl.year, s.subcomponent_code, s.id, s.subcomponent, sum( if( (
rl.reportingPeriod = 'Jan - Mar'
AND year LIKE '".$year."%'
), rl.narrative_id, '' ) ) AS Quarter1, sum( if( (
rl.reportingPeriod = 'Apr - Jun'
AND year LIKE '".$year."%'
), rl.narrative_id, '' ) ) AS Quarter2, sum( if( (
rl.reportingPeriod = 'Jul - Sep'
AND year LIKE '".$year."%'
), rl.narrative_id, '' ) ) AS Quarter3, sum( if( (
rl.reportingPeriod = 'Oct - Dec'
AND year LIKE '".$year."%'
), rl.narrative_id, '' ) ) AS Quarter4
FROM tbl_subcomponent s
LEFT JOIN tbl_resultleadreporting rl ON ( s.id = rl.resultarea )
where s.id ='".$rowRa['id']."'
GROUP BY s.subcomponent_code
ORDER BY s.subcomponent_code ASC";
 //$obj->addAlert($_SESSION['usersubcomponent']."----".$rowRa['id']);
  //$obj->addAlert($query_string);
 #s.id='".$_SESSION['usersubcomponent']."' and
$query_=mysql_query($query_string)or die(http("0185"));

	  while($row=mysql_fetch_array($query_)){

	#$_SESSION['intervention']=$row['codeName'];
	  $color=$n%2==1?"#e6e6e6":"#ffffff";
     $data.="<tr bgcolor=$color class='black'>
	 <td>".$inc++."</td>
	 <td>".$row['subcomponent_code']."</td>
	  <td colspan=7><INPUT type='hidden' name='narrative_id[]' id='narrative_id' value='".$row['narrative_id']."'>".$rowRa['subcomponent_code']." ".$rowRa['subcomponent']."</td>

"; 
$data.="<td align='center'>";
if(($row['Quarter1']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'),'".$rowRa['id']."','Jan - Mar');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_resultLeadReporting('".$rowRa['id']."','Jan - Mar');return false;\" >";
}


$data.="</td><td align='center'>";
if(($row['Quarter2']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'),'".$rowRa['id']."','Apr - Jun');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_resultLeadReporting('".$rowRa['id']."','Apr - Jun');return false;\" >";
}
$data.="</td><td align='center'>";
if(($row['Quarter3']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'),'".$rowRa['id']."','Jul - Sep');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_resultLeadReporting('".$rowRa['id']."','Jul - Sep');return false;\" >";
}
$data.="</td><td align='center'>";
if(($row['Quarter4']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'),,'".$rowRa['id']."','Oct - Dec');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_resultLeadReporting('".$rowRa['id']."','Oct - Dec');return false;\" >";
}
$data.="</td>
	  </tr>";
	  $n++;
	  }
	  }
   
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function view_resultLeadReportingData($quarter,$resultArea,$year){
$obj = new xajaxResponse();
$_SESSION['rlreportingPeriod']='';
#$_SESSION['intermediateResultArea']='';
$_SESSION['RLyear']='';
$quarter=($quarter!=='')?$quarter:$_SESSION['quarter'];
$_SESSION['rlreportingPeriod']=$quarter;
#$resultArea=$_SESSION['usersubcomponent'];
$year=($year!=='')?$year:$_SESSION['Activeyear'];
$_SESSION['RLyear']=$year;
$n=1; $inc=1;


$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>
";


$data.="<table cellspacing='0'      width='700' border='0'> ".filter_ResultLeadData()." 
<tr class='evenrow'>
     
    <td colspan=10><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'));\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_resultLeadReportingData','');\" value='Delete' class='redhdrs' /></td>
    


   

  </tr>
	  <tr>
        <th colspan='10' ><div align='center' class=''>RESULT LEAD  ACTIVITY REPORTING</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th><th><b class=''>SELECT</th>
	  <th width='' colspan=''><strong class=''>INTERMEDIATE RESULT AREA</strong></th>
	 
        <th width='' ><strong class=''>INTRODUCTION</strong></th>
    
		<th width=''><strong class=''>ACTIVITIES</strong></th>
		<th width=''><strong class=''>DESCRIPTION</strong></th>
		<th width=''><strong class=''>ACHIEVEMENTS</strong></th>
		<th width=''><strong class=''>CHALLENGES</strong></th>
<th width=''><strong class=''>LESSONS</strong></th>
	
		<th  width=''><strong class=''>ACTION</strong></th>
		

      </tr>";

$query_string="select rl.narrative_id,rl.resultarea,s.subcomponent,s.subcomponent_code,rl.reportingPeriod,rl.year,rl.briefIntroduction,rl.listActivities,rl.descriptionOfImplementation,rl.resultsAndAchievements,rl.challenges,rl.goodpracticesandlessons from tbl_resultleadreporting rl inner  join tbl_subcomponent s on(s.id=rl.resultarea) where rl.display  like 'Yes%'  and rl.reportingPeriod like '".$_SESSION['rlreportingPeriod']."%' and rl.resultarea = '".$_SESSION['usersubcomponent']."' and rl.year like '".$_SESSION['RLyear']."%' order by rl.year,rl.reportingPeriod Asc";
#$obj->addAlert($query_string);
#$ch="checked";
$query_=mysql_query($query_string)or die(mysql_error());

	  while($row=mysql_fetch_array($query_)){
#$checked=($ch==true)?"#ff0000":"";
	
	  $color=($n%2==1)?"evenrow3":"white1";
     $data.="<tr class=$color onkeyUp=\"xajax_Display(getElementByTagname('tr'),'".$row['narrative_id']."');\">
	 <td>".$inc++."</td>
	 <td><input name='narrative_id[]' id='narrative_id'  type='checkbox' onkeyUp=\"xajax_Display(getElementById('narrative_id').value,'".$row['narrative_id']."');\" value='".$row['narrative_id']."' /></td>
	 <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>
 <td>".$row['briefIntroduction']."</td>
	 <td>".$row['listActivities']."</td>
	 <td>".$row['descriptionOfImplementation']."</td>
	  <td>".$row['resultsAndAchievements']."</td> 
	  <td>".$row['challenges']."</td>
 <td>".$row['goodpracticesandlessons']."</td>

<td><input name='details' type='button' class='formButton2'onclick=\"xajax_ResultLead_Details(".$row['narrative_id'].");\" value='Details' /></td>
	  </tr>";
	  $n++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=10><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_resultLeadReporting(xajax.getFormValues('organization'));\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_resultLeadReportingData','')\" value='Delete' class='redhdrs' /></td>
    


   

  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_TSOquantitativeReporting($subcomponent_id,$org_code,$district,$subcounty,$zone){
$obj= new xajaxResponse();
$n=1;
 //$org_code=$_SESSION['managerorg_code'];
 //$obj->addAlert($org_code."xxxxxxx".$_SESSION['org_code']);
$_SESSION['districtCode']='';
#$_SESSION['ParishCode']
 $_SESSION['subcounty']=$subcounty;
  $_SESSION['parish']=$parish;
$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
//$year=($_SESSION['year']!='')?$_SESSION['year']:$_SESSION['Activeyear'];
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;
$_SESSION['districtCode']=$district;
$_SESSION['subcountyCode']=$subcounty;
$_SESSION['subcomponent_id']=$subcomponent_id;
 $data="<form name='TSOQuantitativeReporting' id='TSOQuantitativeReporting' method='post' action='".$PHP_SELF."' >
<table cellspacing='0'      id='' width='100%'>
<tr class='evenrow'>
    <td width=50>District/Municipality:</td>
    <td colspan='5'><select name='district' id='district' onchange=\"xajax_new_TSOquantitativeReporting('','',getElementById('district').value,'".$_SESSION['zone']."','".$_SESSION['org_code']."')\" style='width:700px;'><option value=''>-select-</option>";

	$querydistrict=mysql_query("select * from tbl_district where zone like '".$_SESSION['zoneCode']."%' order by districtName asc")or die(http(0702));
	while($rowdistrict=mysql_fetch_array($querydistrict)){
	$seldistrictCode=($_SESSION['districtCode']==$rowdistrict['districtCode'])?"SELECTED":"";
	$data.="<option value=\"".$rowdistrict['districtCode']."\" ".$seldistrictCode." >".$rowdistrict['districtName']."</option>";
	}
	
	$data.="</select></td>
  </tr>  
  <tr class='evenrow'>
    <td width=50>Subcounty/Division:</td>
    <td colspan='5'><select name='subcounty' id='subcounty' style='width:700px;'><option value=''>-select-</option>";
 
	$querysubcounty=mysql_query("select * from tbl_subcounty where districtCode='".$_SESSION['districtCode']."' order by subcountyName asc")or die(http(0702));
	while($rowselsubcounty=mysql_fetch_array($querysubcounty)){
	$selsubcounty=($_SESSION['subcountyCode']==$rowselsubcounty['subcountyCode'])?"SELECTED":"";
	$data.="<option value=\"".$rowselsubcounty['subcountyCode']."\" ".$selsubcounty.">".$rowselsubcounty['subcountyName']."</option>";
	}
	
	$data.="</select></td>
  </tr>            
           
		   <tr class='evenrow' style='display:none;'>
    <td width=50>Parish/Ward:</td>
    <td colspan='5'><select name='parish' id='parish' style='width:700px;'><option value=''>-select-</option>";
 
	$queryparish=mysql_query("select * from tbl_parish order by ParishCode asc")or die(http(0702));
	while($rowselparish=mysql_fetch_array($queryparish)){
	$selparish=($_SESSION['ParishCode']==$rowselparish['ParishCode'])?"SELECTED":"";
	$data.="<option value='".$rowselparish['ParishCode']."' '".$selparish."'>".$rowselparish['ParishName']."</option>";
	}
	
	$data.="</select></td>
  </tr>
<tr><td>";
			
    //where id='".$_SESSION['usersubcomponent']."'
  $data.="<tr class='evenrow'>
    <td scope='col' width=50>Intermediate Results Area:</td>
    <td scope='col' colspan='5'><select name='subcomponent_id' id='subcomponent_id' style='width:700px;'  onchange=\"xajax_new_TSOquantitativeReporting(getElementById('subcomponent_id').value,'".$_SESSION['org_code']."',getElementById('district').value,getElementById('subcounty').value,'".$_SESSION['subcountyCode']."')\"><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_subcomponent ")or die(http(0714));
	while($row1=mysql_fetch_array($query)){
	$selectedSubcomponent=($row1['id']==$_SESSION['subcomponent_id'])?"SELECTED":"";
	$data.="<option value=\"".$row1['id']."\" ".$selectedSubcomponent."  >".$row1['subcomponent_code']." ".substr($row1['subcomponent'],0,100)."</option>";
	}
	$data.="</select></td>
  </tr>
 <tr>
              <th height='26' bordercolor='' bgcolor='' class='black2'>NO.</th>
			  <th bordercolor='' bgcolor='' class='black2'>Sub-Intermediate Result Area</>
              <th bordercolor='' bgcolor='' class='black2'>Indicator</th>
           <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Female</th>
		   <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Male</th>
              <th bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Total</th>
           </tr>";
		   $inc=1;
		   // where i.output_id='".$activity_id."' 
		   $x="select i.indicator_id,i.indicator_name,i.order_of_reporting,i.disaggregation,i.subcomponent_id,o.output_name,o.output_code,i.output_id from tbl_indicator i inner join tbl_output o on (o.output_id=i.output_id) where i.subcomponent_id='".$_SESSION['subcomponent_id']."' and order_of_reporting <> 0 and responsible like 'TSO%' and responsible not like 'Managers%' order by i.order_of_reporting asc";
		  # $obj->addAlert($x);
		     $query1=mysql_query($x)or die(http(0755));
			 $m=1;
			 if(mysql_num_rows($query1)>0){
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			
		  $color=$inc%2==1?"evenrow":"white1";

$disaggregationbyGender=($rowi['disaggregation']=='None')?"<td  align='right'><input name='female[]' type='text' id='female".$m."' class='disabled' disabled size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
		   <td  align='right'><input name='male[]' type='text' id='male".$m."' size='10' class='disabled' disabled onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
			  
			  ":"<td  align='right'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
		   <td  align='right'><input name='male[]' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"  value=''/></td>
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,'total".$m."')\" value='' readonly='readonly'/></td>";
			  
$data.="<tr class=$color>
<td bordercolor=''><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
<td>".$rowi['output_code']." ".$rowi['output_name']."</td>
<td bordercolor=''><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           ".$disaggregationbyGender."
    </tr>";
	
	$inc++;
	$m++;
	}
	}
	else{
	#$obj->addAlert("No Results Found!");
}
		  $data.="</tr>
 </td></tr>
 <tr><td></td><td></td><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right' colspan=4>
   <input name='save' type='button' class='formButton2'value='Save' style='width:100px;' onclick=\"xajax_save_TSOQuantitativeReporting(xajax.getFormValues('TSOQuantitativeReporting'));return false;\"></td>
            </tr>
  
  
</table></form>";		 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function viewQualitativeEnteredData(){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;

$data.="<form name='organization' id='organization'   action='?' method='post'>
";


$data.="<table cellspacing='0'      width='668' border='0'> ".filter_tsoQualitative()." 
	  <tr>
        <th colspan='10' ><div align='center' class=''>TECHNICAL SERVICES ORGANIZATIONS (TSO) QUALITATIVE REPORT</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th><th><b class=''>SELECT</th>
	   <th width='' ><strong class=''>INTERVENTION</strong></th>
	  <th width='' ><strong class=''>TSO NAME</strong></th>
	 
        <th width='' ><strong class=''>PLANNED ACTIVITIES</strong></th>
    
		<th width=''><strong class=''>IMPLEMENTATION</strong></th>
		<th width=''><strong class=''>OUTPUTS</strong></th>
		<th width=''><strong class=''>DEVIATIONS</strong></th>
		<th ><strong class=''>CHALLENGES</strong></th>
	
		<th  width=''><strong class=''>ACTION</strong></th>
		

      </tr>";
/* $query_string="select * from view_organization where lower(orgName) like '".strtolower($orgname)."%'&& lower(organization_type) like '".strtolower($orgtype)."%'&& lower(district) like '".strtolower($district)."%' group by orgName order by orgName Asc"; */
$query_string="select * from tbl_lookup  where classCode='5' order by code Asc";

#where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%'&& lower(organization_type) like '".strtolower($_SESSION['orgtype1'])."%'&& lower(district) like '".strtolower($_SESSION['district1'])."%$feedback->addAlert($query_string);'


$query_=mysql_query($query_string)or die(http(0186));

	  while($row=mysql_fetch_array($query_)){

	
	  $color=$n%2==1?"#e6e6e6":"#ffffff";
     $data.="<tr bgcolor=$color class='black'>
	 <td>".$inc++."</td>
	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' /></td>
	  <td>".$row['codeName']."</td>
	 <td><input name='".$row['org_code']."' id='".$row['org_code']."' type='hidden' value=''/><a href='#' onclick=\" xajax_view_allorganization('".$row['org_code']."');\" class='greenlinks2'>".mysql_real_escape_string($row['orgName'])."</a></td>
	 <td>".$row['plannedActivities']."</td>
	 <td>".$row['implementation']."</td>
	 <TD>".$row['achievements']."</TD>
	  <TD>".$row['deviations']."</TD>
	 <td>".$row['challenges']."</td>

<td><input name='details' type='button' class='formButton2'value='Details' /></td>
	  </tr>";
	  $n++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_organization','');return false;\" value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}





function new_calc($male,$female,$total){
$obj= new xajaxResponse();
$totalValue=0;

$totalValue=($male+$female);
#$obj->addAlert($total."ppppppppp".$male."-".$female."-".$totalValue);
$obj->assign($total,"value",$totalValue);
//$data.="<input name='total[]' type='text' id='total' value='".$total."'  size='10' readonly='readonly' />";
return $obj;
}

function Display($id,$narrative_id){
$obj= new xajaxResponse();
#$checked='';

if($narrative_id->checked==true){
    $obj->assign($id, 'style', 'color:#ff0000;');
}
else{
    $obj->assign($id, 'style', '');
}

return $obj;
}


//gender for growth

function view_TSOquantitativeReporting($output,$indicator,$quarter,$year){
$obj= new xajaxResponse();
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}

$_SESSION['TSOsubresultarea']='';
$_SESSION['TSOindicator']='';
$_SESSION['TSOyear']='';
$_SESSION['TSOquarter']='';
$_SESSION['TSOsubresultarea']=$output;
$_SESSION['TSOindicator']=$indicator;
$_SESSION['TSOyear']=$year;
$_SESSION['TSOquarter']=$quarter;
#$_SESSION['org_code']=$tso;

$data="<form name='annualTarget1' id='annualTarget1' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='700' border='0'>
 
  <tr><td colspan='9'>
  ".filter_TSOquantitativeReporting()."</td></tr>
  <tr  class='evenrow'>
     
    <td colspan='6'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_TSOquantitativeReporting(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget1'),'Delete_QuantitativeReportDetails','');return false;\" value='Delete' class='redhdrs' /></td>
    <td colspan='4'></td>

  </tr>
  <tr>
  <tr>
    <th scope='col'>SELECT</th>
	    <th scope='col'> YEAR</th>
	<th scope='col'> REPORTING PERIOD</th>

	   <th scope='col'>SUB-INTERMEDIATE RESULT AREA</th>
    <th scope='col'>INDICATOR</th>
    <th scope='col' ALIGN='RIGHT'> MALE</th>
    <th scope='col' ALIGN='RIGHT'> FEMALE</th>
   
    <th scope='col' ALIGN='RIGHT'>TOTAL</th>
  </tr>";
  $n=1; $inc=1;
  $query_string="select r.id,r.org_code,r.district,r.subcounty,r.parish,r.year,r.reportingPeriod,r.indicator_id,i.indicator_name,i.output_id,o.output_name,r.male,r.female,r.total from tbl_organizationreporting r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_output o on(i.output_id=o.output_id) where i.indicator_name like 
  '".$_SESSION['TSOindicator']."%' and o.output_name like '".$_SESSION['TSOsubresultarea']."%' and  r.reportingPeriod like '".$_SESSION['TSOquarter']."%' and r.year like '".$_SESSION['TSOyear']."%' and r.org_code ='".$_SESSION['org_code']."' order by i.indicator_id asc";
#$obj->addAlert($query_string);
 $query=mysql_query($query_string)or die(http(2097));
  $inc=1;
$cur_page=1;
$records_per_page=20;
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);

$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1000));

   # LimitRecords($query_string,$query);
   while($row=mysql_fetch_array($new_query)){ 
  #$color=$inc%2==1?"#f0e5a5":"#ffffff";
  $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";

$color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
    <td><input name='TSO_id[]' type='checkbox' id='TSO_id' value='".$row['id']."' />".$n++."</td>
   <td ALIGN='RIGHT'>".$row['year']."</td>
    <td align=''>".$row['reportingPeriod']."</td>
	 <td colspan=''>$row[output_name]</td>
 <td colspan=''>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
   
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
 $data.="<tr  class='evenrow'>
     
    <td colspan='4'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_TSOquantitativeReporting(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget1'),'Delete_QuantitativeReportDetails','');return false;\" value='Delete' class='redhdrs' /></td>";
    $fxnName="view_TSOquantitativeReporting";
	 $data.="<td colspan='4' align='right'>".displayPages($fxnName,$query,$cur_page,$records_per_page)."</td>
</tr>

</table></FORM>";

$obj->assign("bodyDisplay",'innerHTML',$data);
return $obj;
}


function view_publications($program,$project,$quarter,$year,$cur_page=1,$record_per_page=20){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['pquarter']='';
$_SESSION['pquarter']=$quarter;
$classCode=7;

$program=(($program<>NULL)||($program<>0))?$program:($_SESSION['program_id']==0?"":$_SESSION['program_id']);
$project=(($project<>NULL)||($project<>0))?$project:($_SESSION['project_id']==0?"":$_SESSION['project_id']);


//$project_id=($project_id==0)?$_SESSION['project_id']:$project_id;


$_SESSION['Ryear']='';
$_SESSION['Ryear']=$year;


$data="<form action=\"".$PHP_SELF."\" name='publications' id='publications' method='post'>
<table id='report'     width='100%'>";
 
  $data.="".filter_publications();
  
  
  if($_GET['action']=='Reports'){
  $data.="";
  }else{
  $data.=selectandDelete_all('12',"edit_publication","publications",'Delete_publications','publication_id','publication_id','tbl_publication','xajax_view_publications','2');
  }
  
  
  $data.="<tr CLASS='evenrow'>
  <th colspan='12' ><center>Types of Publications produced</center></th>
	</tr><tr>
  <tr CLASS='evenrow'>
  <th rowspan=2 colspan=2>NO</th>
    <th rowspan='2'>Program<img src='images/spacer2.png'></th>
	<th colspan=2>Peer-Reviewed Journal articles</th>
    <th rowspan='2'><font color='orange'>Chapter in books</font></th>
	 <th rowspan='2'><font color='purple'>Conference proceedings</font> </th>
	 <th rowspan='2'><font color='green'>Books</font></th>
	  <th rowspan='2'>Electronic Newsletters </th>
	 <th rowspan='2'><font color='Yellow'>Documentaries </font></th>
	<th rowspan='2'  class='grey'><font color='grey'>Other publications* </font></th>
	<th rowspan='2'><strong>Total</strong></th>
	</tr>
  <tr CLASS='evenrow'>
      <th class='blue'><font color='blue'>Published</font></th>
	<th class='maroon'><font color='maroon'>Manuscripts</font></th>
	</tr>";

$n=1;$inc=1;


		$sql=QueryManager::ViewPublications($program,$project);
				//$obj->alert($sql);
		$query=@Execute($sql)or die(http("PR-1844"));
  		while($row=@mysql_fetch_assoc($query)){
		$publication_id=$row['publication_id'];
  		//$obj->alert($datename);
		//-------------------Total Publications at program level----------------
			$totalPublication=0;
			$totalPublication=($row['Published']+$row['Manuscripts']+$row['Chapter_in_books']+$row['Conference_proceedings']+$row['Books']+$row['Electronic_Newsletters']+$row['Documentaries']+$row['Other_publications']);
			$totalPublication=($totalPublication<>0)?$totalPublication:"-";
			$div="other_publications".$row['prog_id'];
			$div1="publicationsDetails".$row['prog_id'];
		//$obj->alert($div);
  		$download=($row['attachedFileName']==NULL)?"<input name='Download' id='Download' disabled='disabled' type='button' class='formButton2'value='Download'>":
		"<input name='Download' id='Download' type='button' class='formButton2' value='Download'>";
  $color=($inc%2==1)?"evenrow3":"white1";
  $data.=Backgroundstyle($n)."<td align='right' colspan='2' >".$n."</td>
  <td><a href='#' onclick=\"xajax_view_publicationsDetails('".$row['prog_id']."','35','".$row['semi_annual']."','".$row['year']."','".$div1."');\" title='Publication Details for ".$row['Program_name']."'>".$row['program_id']." ".$row['program_name']."</a></td>
  <td align='right' class='blue'>".checkExistance($row['Published'],0,'ExistsInteger')."</td>
    <td align='right' class='maroon'>".checkExistance($row['Manuscripts'],0,'ExistsInteger')."</td>
	<td align='right' class='orange'>".checkExistance($row['Chapter_in_books'],0,'ExistsInteger')."</td>
	<td align='right' class='purple'>".checkExistance($row['Conference_proceedings'],0,'ExistsInteger')."</td>
	<td align='right' class='green'>".checkExistance($row['Books'],0,'ExistsInteger')."</td>
    <td align='right'>".checkExistance($row['Electronic_Newsletters'],0,'ExistsInteger')."</td>
	<td align='right' class='yellow'>".checkExistance($row['Documentaries'],0,'ExistsInteger')."</td>
	<td align='right' class='grey'><a href='#' onclick=\"xajax_view_other_publications('".$row['prog_id']."','35','".$row['semi_annual']."','".$row['year']."','".$div."');\">".checkExistance($row['Other_publications'],0,'ExistsInteger')."</a><div id='".$div."'></div></td>";
	
	
	
	
	
	
	
	$data.="<td align='right'><strong>".$totalPublication."</strong></td>
  </tr>
  <tr><td colspan='12'><div id='".$div1."'></div></td></tr>
  
  
  ";
  $n++;
  $inc++;
  }
  
  //}
  
$data.="</tr><tr class='evenrow'><td colspan='3'>Total</td>";
	$sqlTotal=QueryManager::TotalPublications($program,$project);
$nx=Execute($sqlTotal) or die(http("PR-2932"));
$tot=@FetchRecords($nx);

$Totalpublicationsummation=0;
$Totalpublicationsummation=($tot['Published']+$tot['Manuscripts']+$tot['Chapter_in_books']+$tot['Conference_proceedings']+$tot['Books']+$tot['Electronic_Newsletters']+$tot['Documentaries']+$tot['Other_publications']);

$data.="<td class='blue'><strong>".$tot['Published']."</strong></td>
<td align='right' class='maroon'><strong>".$tot['Manuscripts']."</strong></td>
<td align='right' class='orange'><strong>".$tot['Chapter_in_books']."</strong></td>
<td align='right' class='purple'><strong>".$tot['Conference_proceedings']."</strong></td>
<td align='right' class='green'><strong>".$tot['Books']."</strong></td>
<td align='right' class='black'><strong>".$tot['Electronic_Newsletters']."</strong></td>
<td align='right' class='yellow' ><strong>".$tot['Documentaries']."</strong></td>
<td align='right' class='grey1' ><strong>".$tot['Other_publications']."</strong></td>
<td align='right'  ><strong>".$Totalpublicationsummation."</strong></td>
</tr>".noRecordsFound($query,12)."</tr>";



if($_GET['action']=='Reports'){
  $data.="";
  }else{
  $data.=selectandDelete_all('12',"edit_publication","publications",'Delete_publications','publication_id','publication_id','tbl_publication','xajax_view_publications','2');
  }
  
  
 $data.="
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function view_other_publications($program_id,$other_publication,$semi_annual,$year,$div){
	$obj=new xajaxResponse();
			if($_SESSION['user_id']==''){
				$obj->redirect('index.php');
				return $obj;
				}
		$classCode=35; $n=1;
			$data="<table width='100%' border='0'>
			<tr><th>No</th><th>Publication Name</th><th>Title</th></tr>";
  	 	$select="select * from 
			tbl_publication 
			where prog_id='".$program_id."' 
			and typeofpublication='".$classCode."' 
			and year like '".$year."%'";
 		 	#$obj->alert($select);
 		 $query=@mysql_query($select)or die(http("PR-2629"));
 			 while($row=@mysql_fetch_array($query)){
 			 $data.="<tr>
 				 <td>".$n++."</td>
    <td>".$row['other_publication']."</td>
    <td>".$row['title']."</td>
  </tr>";
  }
  $data.=noRecordsFound($query,3);
  
  
  $data.="</table>";


$obj->assign($div,'innerHTML',$data);
return $obj;
}

function view_publicationsDetails($program_id,$other_publication,$semi_annual,$year,$div){
	$obj=new xajaxResponse();
		if($_SESSION['user_id']==''){
			$obj->redirect('index.php');
		return $obj;
		}
		$classCode=7; $n=1;
	$data="<table width='100%' border='0'>
		<tr>
			<th colspan='2'>No</th>
			<th>Project/ Regional Center of Excellence</th>
			<th>Publication Title</th>	
			<th>Type of Publication</th>
			<th>Organization</th>
			<th>Author</th>
			<th>Date of Publication</th>
			<th>Link</th>
			<th>Publication</th><th>Action</th>
		</tr>";
  	 		$select="select p.`publication_id`, p.`project_id`, p.`prog_id`, p.`semi_annual`, p.`year`, p.`typeofpublication`, p.`other_publication`, p.`title` as publicationTitle, p.`organization`,o.orgName,l.codeName, p.`author`, p.`dateofpublication`, p.`link`, p.`Publication`, p.`updatedby`, p.`status`,r.id,r.title as project_title from 
			tbl_publication p left join 
			tbl_project r on(r.id=p.project_id)
			left join tbl_organization o on(p.organization=o.org_code)
			left join tbl_lookup l on(l.code=p.typeofpublication)
			where prog_id like '".$program_id."%' and project_id like '".$_SESSION['project_id']."%'
			&& l.classCode='".$classCode."'
			 ";
 		 	//$obj->alert($select);
 		 	$query=@mysql_query($select)or die(http("PR-2629"));
 			 while($row=@mysql_fetch_array($query)){
 			 $data.="<tr>". loop_key('publication_id',$row['publication_id'])."
 				 		<td> ".$n++." </td>
    					<td>".checkExistance($row['project_title'],NULL,'ExistsString')."</td>
    					<td>".checkExistance($row['publicationTitle'],NULL,'ExistsString')."</td>
						<td>".checkExistance($row['codeName'],NULL,'ExistsString')."</td>
	  					<td>".checkExistance($row['orgName'],NULL,'ExistsString')."</td>
	   					<td>".checkExistance($row['author'],NULL,'ExistsString')."</td>
						 <td>".$row['dateofpublication']."</td>
						<td>".checkExistance($row['link'],NULL,'ExistsString')."</td>";
						
						$download=($row['Publication']==NULL)?"<td align='left'><input name='upload' type='button' id='".$row['publication_id']."' value='Attach File'  onclick=\"xajax_AttachFile('".$row['publication_id']."','tbl_publication');return false;\"></td>":"<td align='left'><a href='download.php?directory=docs/".$row['Publication']."' target='_blank'  class='green_field'><strong>Download</strong></a></td>";
						
  					$data.=$download."<td valign='middle' align='right'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_Delete_PublicationOne('".$row['publication_id']."');return false;\" ></td></tr>";
  }
  $data.=noRecordsFound($query,3);
  
  
  $data.="</table>";


$obj->assign($div,'innerHTML',$data);
return $obj;
}







function new_publications($program,$project,$typeofPublication){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$classCode=7;
//

$data="<form action='functions.php' name='publications' id='publications' method='post' enctype='multipart/form-data'>
<table      width='100%'>";
 
  $data.="
  <tr class=''>
          <td width='30%' >
          <div align='right' ><strong>Programme:</strong></div></td>
          <td colspan=2><select name='program' style='width:300px;' id='program' onclick=\"xajax_new_publications(this.value,'".$project."','".$typeofPublication."');return false;\" ><option value=''>-select-</option>";
		  /* $sql="select * from tbl_programme where type='Program' order by prog_id asc";
		  #$obj->addAlert($sql);
		  $query=Execute($sql) or die(http("PR-2565"));
		  while($ROW=@mysql_fetch_array($query)){
		$selected=($ROW['prog_id']==$_SESSION['program_id'])?"selected":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected."  >".$ROW['program_id']." ".substr($ROW['program_name'],0,100)."</option>";} */
		  $data.=QueryManager::ProgramFilter($program);
		  $data.="</select></td>
        </tr>
		 <tr class=''>
          <td width='30%' >
          <div align='right' ><strong>Project/ Regional Center of Excellence:</strong></div></td>
          <td colspan=2><select name='project' style='width:300px;' onclick=\"xajax_new_publications('".$program."',this.value,'".$typeofPublication."');return false;\" ><option value=''>-select-</option>";
		  /* $sql="select * from tbl_project where programme_id like '".$program."%' order by title  asc";
		  #$obj->addAlert($sql);
		  $query=Execute($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
			$selected1=($ROW['id']==$_SESSION['project_id'])?"selected":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected1." >".retrieve_info_withSpecialCharacters($ROW['project_code'])." ".retrieve_info_withSpecialCharacters($ROW['title'])."</option>";
		  
		  } */
		  
		   $data.=QueryManager::ProjectFilter($program,$project);
		  $data.="</select></td>
        </tr>
		  <tr class=''>
          <td width='30%' >
          <div align='right' ><strong>Type of Publication:</strong></div></td>
          <td colspan=2><select name='typeofpublication' style='width:300px;' id='typeofpublication' onclick=\"xajax_new_publications('".$program."','".$project."',this.value);return false;\" ><option value=''>-select-</option>";
			  $sql="select * from tbl_lookup where classCode='".$classCode."' order by codeName asc";

		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){

		  $data.="<option value=\"".$ROW['code']."\" ".checkExistance($ROW['code'],$typeofPublication,'selected')." >".$ROW['codeName']."</option>";}
		  $data.="</select></td>
        </tr>";
		
		if($typeofPublication==35){
		
		$data.=" <tr class=''>  
  <tr><td align='right'><strong>Other Publication (Specify):
</strong></td><td colspan='2'>

<textarea name='otherPublication' id='otherPublication' cols='51' rows='3'></textarea>
</td></tr> ";
		}
		else {
		$data.="";
		
		}
		
 
 $data.="<tr><td align='right'><strong>Title of Publication:
/Knowledge Product:</strong></td><td colspan='2'>
<input name='loopkey' type='hidden' id='loopkey' size='30' value='1' />
<textarea name='title' cols='51' rows='3'></textarea>
</td></tr> 
<tr class=''> 
    <td align='right'><strong>Organization:</strong></td>
     <td colspan=2><select name='Organization' id='Organization' style='width:300px;' ><option value=''>-select-</option>";
		  $sql="select * from tbl_organization order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		//$selected=($_SESSION['intervention']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['org_code']."\" ".$selected." >".substr($ROW['orgName'],0,100)."</option>";}
		  $data.="</select></td>
    
  </tr> 
  <tr class=''><td align='right' ><strong>Author:</strong></td><td><input name='author' type='text' id='author' size='54' /></td></tr>
  
  
  <tr class=''><td align='right'><strong>Date of Publication</strong></td>
    <td colspan=2><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.publications.datepublished);return false;\" hidefocus=''>
<input name='datepublished' type='text'  size='47' value='' id='datepublished' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td></tr>
 
 
 <tr class=''><td align='right'><strong>Link to the Publication(URL):</strong></td><td colspan='2'><input name='link' type='text' id='link' size='53' />
  </td></tr>
   <tr class=''><td align='right'><strong>Attach Publication:</strong></td><td colspan='2'>
  <input name='' type='hidden' value=''>
  <input name='imgfile' size='43' type='file' id='imgfile'></td></tr>
  ";
 

 $data.=" <tr class='' >
  <td colspan='3'><div id='status'></div></td>
    
  </tr>
</table>


<div align='right' class=''>
        <button  type='submit' class='formButton2' name='save_Publications' id='save_Publications' style='width:100px;' value='Save' />
        Save</button></div>
</form>";
//onclick=\"xajax_save_publications(xajax.getFormValues('publications')); return false;\" 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_training($districtCode,$subcountyCode,$parish,$village){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['nhh']=1;
$_SESSION['nhh']=$nhh;
$_SESSION['subcountyCode']=$subcountyCode;
//$obj->alert($_SESSION['subcountyCode']);
$_SESSION['ParishName']=$parishName;
$_SESSION['parishCode']=$parish;
//$obj->alert($_SESSION['parishCode']);

$program_id=($program_id==NULL)?$_SESSION['program_id']:$program_id;
$project_id=($project_id==NULL)?$_SESSION['project_id']:$project_id;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>
  
  
	  
	  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>In case of any training conducted, complete the Table</center></th>
	
            </tr>";

	$data.="<tr class='evenrow3'>
          <td colspan='10'>
          <table>";
          $data.="<td><strong>District:</strong></td>";
          $data.="<td><select name='district' id='distict' style='width:200px;'>
          <option value=''>-select-</option>";
		  $data.=QueryManager::DistrictFilter($districtCode);
		  $data.="</select>";
                  $data.="</td>";
                  
        
          $data.="<td><strong>Subcounty:</strong></td>";
          $data.="<td><select name='subcounty' style='width:200px;'>
          <option value=''>-select-</option>";
             $data.=QueryManager::SubcountyFilter($districtCode,$subcountyCode);
		
		  $data.="</select>";
                  $data.="</td>";
        
          $data.="<td><strong>Parish:</strong></td>
          <td><select name='parish' id='parish' style='width:200px;'><option value=''>-select-</option>";
		 $data.=QueryManager::ParishFilter($program_id,$project_id);
		  $data.="</select></td>
        
          <td width='5%' colspan=''>
          <div align='left'><strong>Village:</strong></div></td>
          <td><input name='village' id='village'  type='text' id='trainer' size='50' /></td>
          
          
        
   <tr>
          <td>
          <div align='left'><strong>Date of training:</strong></div></td>
            <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.trainingDate);return false;\" hidefocus=''>
            <input name='trainingDate' type='text'  size='25px' value='' id='trainingDate' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
        
          <td><strong>Main Value Chain or <br> Technical Area addressed:</strong></td>
          <td><select name='valueChain' style='width:200px;'>
          <option value=''>-select-</option>";
		 $data.=QueryManager::valueChainFilter($program_id,$project_id);
		  $data.="</select></td>
        
          <td><strong>Training Focus:<br>(Select ONE most relevant):</strong></div></td>
          <td><select name='trainingFocus' style='width:200px;'>
          <option value=''>-select-</option>";
		 $data.=QueryManager::trainingFocusFilter($program_id,$project_id);
		  $data.="</select></td>
        
          <td><strong>Target Audience (Select the ONE most relevant):</strong></td>
          <td><select name='targetAudience' style='width:200px;'><option value=''>-select-</option>";
		 $data.=QueryManager::targetAudienceFilter($program_id,$project_id);
		  $data.="</select></td>
        </tr>
        </table>
        </td>
        </tr>";
        
        
  //Start of the analysis table
	$data.="<!--<tr class='evenrow'>
    <th align='center' colspan='10'>ATTENDANCE DETAILS</th>
	</tr>
        
        <tr class='evenrow'>
      <th>&nbsp;</th>
      <th>Gender</th>
      <th>Total</th>
      <th>New</th>
      <th>Old</th>
    </tr>
    <tr class='evenrow'>
      <td><p>Total number of participants</p></td>
      <td><p>Male</p></td>
      <td><input name='pat_total_male' type='text' id='pat_total_male' size='53' /></td>
      <td><input name='pat_total_male_new' type='text' id='pat_total_male_new' size='53' /></td>
      <td><input name='pat_total_male_old' type='text' id='pat_total_male_old' size='53' /></td>
    </tr>
    <tr class='evenrow'>
    <td></td>
      <td>Female</td>
      <td><input name='pat_total_female' type='text' id='pat_total_female' size='53' /></td>
      <td><input name='pat_total_female_new' type='text' id='pat_total_female_new' size='53' /></td>
      <td><input name='pat_total_female_old' type='text' id='pat_total_female_old' size='53' /></td>
    </tr>
    <tr class='evenrow'>
    <td></td>
      <td>Total</td>
      <td><input name='pat_total_femaleAndMale' type='text' id='pat_total_femaleAndMale' size='53' /></td>
      <td><input name='pat_total_new_femaleAndMale' type='text' id='pat_total_new_femaleAndMale' size='53' /></td>
      <td><input name='pat_total_old_femaleAndMale' type='text' id='pat_total_old_femaleAndMale' size='53' /></td>
    </tr>
    
    
    <tr class='evenrow'>
      <td>Number of youth attending training</td>
      <td>Male</td>
      <td><input name='pat_total_youthAndMale' type='text' id='pat_total_youthAndMale' size='53' /></td>
      <td><input name='pat_total_new_youthAndMale' type='text' id='pat_total_new_AndMale' size='53' /></td>
      <td><input name='pat_total_old_youthAndMale' type='text' id='pat_total_old_youthAndMale' size='53' /></td>
    </tr>
    <tr class='evenrow'>
    <td></td>
    
      <td>Female</p></td>
      <td><input name='pat_total_youthAndfemale' type='text' id='pat_total_youthAndfemale' size='53' /></td>
      <td><input name='pat_total_new_youthAndfemale' type='text' id='pat_total_new_youthAndfemale' size='53' /></td>
      <td><input name='pat_total_old_youthAndfemale' type='text' id='pat_total_old_youthAndfemale' size='53' /></td>
    </tr>
    
    <tr class='evenrow'>
    <td></td>
    <td>Totals</td>
      <td><input name='pat_total_youthFemaleAndMale' type='text' id='pat_total_youthFemaleAndMale' size='53' /></td>
      <td><input name='pat_total_new_youthFemaleAndMale' type='text' id='pat_total_new_youthFemaleAndMale' size='53' /></td>
      <td><input name='pat_total_old_youthFemaleAndMale' type='text' id='pat_total_old_youthFemaleAndMale' size='53' /></td>
    </tr>-->";
    
     //End of analysis  table 
    
$data.="<tr class='evenrow'>
    <td colspan=10>
    <table>
    
    <tr class='evenrow'><th colspan=10>PARTICIPANT REGISTRATION FORM</th></tr>
	<tr>
	<th>No</th>
	<th>Name</th> 
	<th>Age</th>
	<th>Sex</th>
	<th>New/Old</th>
	<th>Village</th>
	<th>Type of Individual</th>
	<th>Telephone</th>
        </tr>";
	$n=1;
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td>".$n."</td>
	<td> <input name='loopkey[]' type='hidden' id='loopkey' size='50' value='1' />
	<input name='pat_name[]' type='text' id='pat_name' size='53' /></td>
	 <td><input name='pat_age[]' type='text' id='pat_age' size='20'/></td>
	<td><select name='pat_sex[]' id ='pat_sex' size='1' style='width:200px;'>
	<option value=''>-select-</option>";
	$data.="<option value='M'>Male</option>";
        $data.="<option value='F'>Female</option>";
	$data.="</select>
        </td>
        
	<td><select name='pat_status[]' id ='pat_status' size='1' style='width:200px;'>
	<option value=''>-select-</option>";
	$data.="<option value='N'>New</option>";
        $data.="<option value='O'>Old</option>";
	$data.="</select>
        </td>
        
	<td><input name='pat_village[]'  type='text' id='pat_village' size='20' onKeyPress='return numbersonly(event, false)' /></td>
	<td><select name='typeofparticipants[]' id ='typeofparticipants' size='1' style='width:200px;'>
	<option value=''>-select-</option>";
	$queryx=mysql_query("select * from tbl_lookup where classCode='25' order by codeName asc ") or die(http("PR-2294"));
	while($rowx=mysql_fetch_array($queryx)){
	$data.="<option value=\"".$rowx['code']."\">".$rowx['codeName']."</option>";
	
	}
	$data.="</select>
        </td> 
	<td><input name='pat_tel[]'  type='text' id='pat_tel' size='20'/></td>
	</tr>";
	$n++;}
	
	

  $data.=" </table></td>
	 
    </tr>";
    
    
    $data.="<tr class='evenrow'>
    <td colspan=''>
    <table>
    <tr>
    <th align='center' colspan='10'>TRAINERS</th>
    </tr>
    <tr class='evenrow'>
    <th>No</th>
      <th>Name</th>
      <th>Title</th>
      <th>Organization</th>
      <th>Contact</th>
    </tr>";
    $n=1;
	for($x=0;$x<3;$x++){
	$data.="<tr class='evenrow'>
	<td>".$n."</td>
	<td> <input name='loopkey[]' type='hidden' id='loopkey' size='50' value='1' />
	<input name='trainers_name[]' type='text' id='trainers_name' size='53' /></td>
	 <td> <input name='trainers_title[]'  type='text' id='trainers_title' size='20'  /></td>
	<td><input name='trainers_organisation[]'  type='text' id='trainers_organisation' size='20' /></td>
	<td><input name='trainers_contact[]' six='20'   type='text' id='trainers_contact'  /></td></tr>";
	$n++;}
        
    $data.="
    </table></td>
    </tr>
    
    <tr class='evenrow'>
    <td colspan=10>
    <table>
    
    
    ";    
        
    $data.="<tr class='evenrow'>
    <td>PARTICPANTS SUGGESTIONS/RECOMMENDATIONS:</td>
	 <td colspan='10'><textarea name='pat_recommendations' id='pat_recommendations'  cols='100' rows='10'></textarea></td>
	</tr>";
        
        $data.="<tr class='evenrow'>
    <td colspan=''>Compiled by:</td>
    <td colspan='10'><input name='compiled_by' type='text' id='compiled_by' size='53' />
    </td>
    </tr>
    <tr class='evenrow'>
    <td colspan=''>Title:</td>
    <td colspan='10'><input name='compiler_title' type='text' id='compiler_title' size='53' />
    </td>
    </tr>
    <tr class='evenrow'>
    <td colspan=''>Reviewed by:</td>
    <td colspan='10'><input name='reviewed_by' type='text' id='reviewed_by' size='53' />
    </td>
    </tr>
    <tr class='evenrow'>
        <td width='30%' colspan=''><div align='left'>Title Date</div></td>
            <td colspan='10'>
            <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.titleDate);return false;\" hidefocus=''>
            <input name='titleDate' type='text'  size='35px' value='' id='titleDate' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
            </a>
            </td>
    </tr>
    </table></td>
    </tr>";
  
  $data.="<!--<tr class='evenrow'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr>
   <tr class='evenrow'>
  <td>Attach Training Procedings:</td>
  <td><input name='TrainingProcedings' id='TrainingProcedings' size='50' type='file'></td>
  </tr>
   <tr class='evenrow'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='Attendance' id='Attendance' size='50' type='file'></td>
  </tr>-->
  
 </table>
</td></tr>";

$data.="<div align='right'>
        <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_save_training(xajax.getFormValues('projects')); return false;\" />
        </div>
</form></table>";




$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function save_training($formValues){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['Ryear']='';
//$_SESSION['program_id']='';
$_SESSION['reportingPeriod']='';
$_SESSION['Ryear']=$year;
//$_SESSION['program_id']=$program_id;


$program_id=(($program_id<>NULL)||($program_id<>0))?$program_id:($_SESSION['program_id']==0?"":$_SESSION['program_id']);
$project_id=(($project_id<>NULL)||($project_id<>0))?$project_id:($_SESSION['project_id']==0?"":$_SESSION['project_id']);

//".filter_training();

$_SESSION['reportingPeriod']=$reportingPeriod;

$district=$formValues['district'];
$subcounty=$formValues['subcounty'];
$parish=$formValues['parish'];
$village=$formValues['village'];
$trainingDate=$formValues['trainingDate'];
$mainValueChain=$formValues['mainValueChain'];
$trainingFocus=$formValues['trainingFocus'];
$targetAudience=$formValues['targetAudience'];

$pat_total_male=$formValues['pat_total_male'];
$pat_total_male_new=$formValues['pat_total_male_new'];
$pat_total_male_old=$formValues['pat_total_male_old'];

$pat_total_female=$formValues['pat_total_female'];
$pat_total_female_new=$formValues['pat_total_female_new'];
$pat_total_female_old=$formValues['pat_total_female_old'];

$pat_total_femaleAndMale=$formValues['pat_total_femaleAndMale'];
$pat_total_new_femaleAndMmale=$formValues['pat_total_new_femaleAndMmale'];
$pat_total_old_femaleAndMmale=$formValues['pat_total_old_femaleAndMmale'];

$pat_total_youthAndMale=$formValues['pat_total_youthAndMale'];
$pat_total_new_youthAndMale=$formValues['pat_total_new_youthAndMale'];
$pat_total_old_youthAndMale=$formValues['pat_total_old_youthAndMale'];


$pat_total_youthAndfemale=$formValues['pat_total_youthAndfemale'];
$pat_total_new_youthAndfemale=$formValues['pat_total_new_youthAndfemale'];
$pat_total_old_youthAndfemale=$formValues['pat_total_old_youthAndfemale'];

$pat_total_youthFemaleAndMale=$formValues['pat_total_youthFemaleAndMale'];
$pat_total_new_youthFemaleAndMale=$formValues['pat_total_new_youthFemaleAndMale'];
$pat_total_old_youthFemaleAndMale=$formValues['pat_total_old_youthFemaleAndMale'];



$trainers_name=$formValues['trainers_name'];
$trainers_title=$formValues['trainers_title'];
$trainers_organisation=$formValues['trainers_organisation'];
$trainers_contact=$formValues['trainers_contact'];




$pat_recommendations=$formValues['pat_recommendations'];
$compiled_by=$formValues['compiled_by'];
$compiler_title=$formValues['compiler_title'];
$reviewed_by=$formValues['reviewed_by'];
$titleDate=$formValues['titleDate'];





foreach( $trainers_name as $j => $value ) {
   $trainers_name=$value;
   $trainers_title=$trainers_title[$j];
   $trainers_organisation=$trainers_organisation[$j];
   $trainers_contact=$trainers_contact[$j];
   $obj->alert($trainers_name);
}

$stmntTraining="INSERT INTO `n_training`(`district`, `subcounty`,
                                        `parish`, `village`,
                                `trainingDate`, `mainValueChain`,
                                        `trainingFocus`, `targetAudience`,
                                        `pat_total_male`, `pat_total_male_new`,
                                        `pat_total_male_old`, `pat_total_female`,
                                        `pat_total_new_femaleAndMale`, `pat_total_old_femaleAndMale`,
                                        `pat_total_youthAndMale`, `pat_total_new_youthAndMale`,
                                        `pat_total_old_youthAndMale`, `pat_total_youthAndfemale`,
                                        `pat_total_new_youthAndfemale`, `pat_total_old_youthAndfemale`,
                                        `pat_total_youthFemaleAndMale`, `pat_total_new_youthFemaleAndMale`,
                                        `pat_total_old_youthFemaleAndMale`,`trainers_name`,
                                        `trainers_title`, `trainers_organisation`,
                                        `trainers_contact`,`pat_recommendations`,
                                        `compiled_by`, `compiler_title`,
                                        `reviewed_by`,`titleDate`)
                        VALUES ('".$district."','".$subcounty."',
                                '".$parish."','".$village."',
                                '".$trainingDate."','".$mainValueChain."',
                                '".$trainingFocus."','".$targetAudience."',
                                '".$pat_total_male."', '".$pat_total_male_new."',
                                    '".$pat_total_male_old."', '".$pat_total_female."',
                                    '".$pat_total_new_femaleAndMale."', '".$pat_total_old_femaleAndMale."',
                                    '".$pat_total_youthAndMale."', '".$pat_total_new_youthAndMale."',
                                    '".$pat_total_old_youthAndMale."', '".$pat_total_youthAndfemale."',
                                    '".$pat_total_new_youthAndfemale."', '".$pat_total_old_youthAndfemale."',
                                    '".$pat_total_youthFemaleAndMale."', '".$pat_total_new_youthFemaleAndMale."',
                                    '".$pat_total_old_youthFemaleAndMale."','".$trainers_name."',
                                    '".$trainers_title."', '".$trainers_organisation."',
                                    '".$trainers_contact."','".$pat_recommendations."',
                                    '".$compiled_by."', '".$compiler_title."',
                                    '".$reviewed_by."','".$titleDate."')";

$obj->alert($stmntTraining);

//@mysql_query($stmntTraining)or die("CPMA Error-code 3504 because ".mysql_error());

		    $obj->assign('bodyDisplay','innerHTML',$data);
		    $obj->call('xajax_view_training','');
		    return $obj;

}//End of function save_training





function view_training($program_id,$project_id,$reportingPeriod,$year){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['Ryear']='';
//$_SESSION['program_id']='';
$_SESSION['reportingPeriod']='';
$_SESSION['Ryear']=$year;
//$_SESSION['program_id']=$program_id;


$program_id=(($program_id<>NULL)||($program_id<>0))?$program_id:($_SESSION['program_id']==0?"":$_SESSION['program_id']);
$project_id=(($project_id<>NULL)||($project_id<>0))?$project_id:($_SESSION['project_id']==0?"":$_SESSION['project_id']);

//".filter_training();

$_SESSION['reportingPeriod']=$reportingPeriod;
#$obj->alert($_SESSION['parishCode']);
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>";
//$data="<table width='800' cellspacing='0' id='report'>".filter_training();
 $data="<table width='800' cellspacing='0' id='report'>";
 
 
 $data.="<tr class='evenrow'>
        <td colspan=5 align='right'><input name='new_training' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_training('','');\"> | <a href='export_to_excel_word.php?linkvar=Export Training&&program=".$program_id."&&project=".$project_id."&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'><input name='export_training' type='button' class='formButton2'value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Training&&program=".$program_id."&&project=".$project_id."&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2' value='Print Version'></a></td>
        </tr>";
 
 
 
 
  $data.="</tr>";

 // $data.=selectandDelete_all(10,'edit_training','projects','delete_training','training_id','training_id','tbl_training','delete_data',7)."</tr>

 
	
  //  asiimwe $data.="<tr CLASS='evenrow'>
  //
  //  <th colspan='10' ><center>Short-term Trainings</center></th>
  //
  //</tr>
  //<tr CLASS='evenrow'>
  //<th colspan=''>NO</th>
  //<th colspan='7'>District</th>
  //<th colspan=''> Total</th>
  //  </tr>
  //
  //";
  
  
// asiimwe $n=1;
//  
//  $classCode=25;$x=1;
//		
//		$sql="select * from tbl_district order by districtName asc";
//		#$obj->alert($sql);
//  $query_program=Execute($sql)or die(http("PR-3346"));
//  	while($rowP=@mysql_fetch_array($query_program)){
// 	 $div=$rowP['program_name'].$rowP['program_id'];
//
//    	
//		$color=$n%2==1?"evenrow":"white1";
//	
//    $data.="<tr class=$color><td><strong>".$n++."</strong></td><td colspan='7' ><strong>".$rowP['districtName']." </strong></td>
//   <td colspan=''><A HREF='#' ONCLICK=\"xajax_view_trainingDetails('".$rowP['prog_id']."','".$rowP['project_id']."','".$rowP['year']."','".$rowP['semi_annual']."','".$div."');return false;\"><strong>".CheckExistance($rowP['TotalProgramValue'],NULL,'ExistsInteger')."</a></strong></td>
//  </tr><tr><td colspan='10'><div id='".$div."' ></div></td></tr>";
//  $x++;
//  }

$obj->alert('Detected fault');
$data.="<tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>District:</strong></div></td>
          <td colspan=8><select name='program' onchange=\"xajax_new_training(this.value,'".$project_id."');return false;\" id='program' style='width:300px;'><option value=''>-select-</option>";
		  /* $sql="select * from tbl_programme  order by program_id asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($program_id==$ROW['prog_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >".$ROW['program_id']." ".substr($ROW['program_name'],0,500)."</option>";} */
		  $data.=QueryManager::DistrictFilter($program_id);
		  $data.="</select></td>
        </tr>

<tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Subcounty:</strong></div></td>
          <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  /* $sql="select * from tbl_project where  programme_id like '".$program_id."%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("PR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['project']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >
		  
		  	".retrieve_info_withSpecialCharactersNowordLimit($ROW['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($ROW['title'])."
		  
		 </option>";} */
		 $data.=QueryManager::SubcountyFilter($program_id,$project_id);
		
		  $data.="</select></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Parish:</strong></div></td>
          <td colspan=8><select name='project' style='width:300px;'><option value=''>-select-</option>";
		  /* $sql="select * from tbl_project where  programme_id like '".$program_id."%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("PR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['project']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >
		  
		  	".retrieve_info_withSpecialCharactersNowordLimit($ROW['project_code'])."
						 ".retrieve_info_withSpecialCharactersNowordLimit($ROW['title'])."
		  
		 </option>";} */
		 $data.=QueryManager::ParishFilter($program_id,$project_id);
		  $data.="</select></td>
        </tr>
  
  <tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Village:</strong></div></td>
          <td><input name='trainer' type='text' id='trainer' size='53' /></td>
        </tr>
        
   <tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Date of training:</strong></div></td>
            <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.trainingDate);return false;\" hidefocus=''>
            <input name='trainingDate' type='text'  size='50' value='' id='trainingDate' readonly='readonly' />
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
        </tr>
    
    <tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Main Value Chain or Technical Area addressed:</strong></div></td>
          <td colspan=8><select name='valueChain' style='width:300px;'><option value=''>-select-</option>";
		 $data.=QueryManager::valueChainFilter($program_id,$project_id);
		  $data.="</select></td>
        </tr>    
        
    <tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Training Focus:(Select ONE most relevant):</strong></div></td>
          <td colspan=8><select name='trainingFocus' style='width:300px;'><option value=''>-select-</option>";
		 $data.=QueryManager::trainingFocusFilter($program_id,$project_id);
		  $data.="</select></td>
        </tr>
        
        
    <tr class='evenrow'>
          <td width='30%' colspan=''>
          <div align='left'><strong>Target Audience (Select the ONE most relevant):</strong></div></td>
          <td colspan=8><select name='targetAudience' style='width:300px;'><option value=''>-select-</option>";
		 $data.=QueryManager::targetAudienceFilter($program_id,$project_id);
		  $data.="</select></td>
        </tr>";



















 $data.="</tr>";
 
 $data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_trainingDetails($prog_id,$project_id,$year,$semi_annual,$div){
$obj=new xajaxResponse();
$classCode=25;
$data="<table cellspacing='0'><tr><td colspan='11' align='right'><input name='Close' class='formButton2' type='button' value='Close' onclick=\"xajax_close('".$div."');return false;\"></td></tr><tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>Project</th>
  <th>date</th>
  <th>Provided by</th>
    <th>Training Area</th>
    
    <th colspan='5'> number of Participants</th>";

 $n=1;
    /* $sql=" SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` ,p.title as projectName, t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
FROM `tbl_training` t
LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
left join tbl_project p on(p.id=t.project_id)
WHERE l.classCode = '25' and t.status like 'Yes%' and t.prog_id like '".$prog_id."%' 
and p.id like '".$project_id."%'
and  t.`semi_annual`  like '".$semi_annual."%'  and t.`year`  like '".$year."%'
group BY  t.`course`, t.`prog_id`,t.project_id
ORDER BY  t.`course`, t.`prog_id` asc"; */
		$sql=QueryManager::ViewTrainingDetails($prog_id,$project_id,$semi_annual,$year);
 			$query=@mysql_query($sql)or die(http("PR-2985"));
 				 while($row=@mysql_fetch_array($query)){
  					$orgdate="org_date".$n;
//$obj->alert($row['projectName']);
$data.=Backgroundstyle($n).loop_key('training_id',$row['training_id'])."
  <td>".$n."</td> 
  <td align='left'>".checkExistance($row['projectName'],NULL,'ExistsString')."</td>
  <td align='left'>".$row['organizing_date']."</td>
   <td>".$row['trainer']."</td>
    <td>".$row['course']."</td>
   
    <td colspan='5'><table width='300px'><tr><th colspan='2'>Type of Participants</th><th>Male</th><th>Female</th><th>Total</th></tr>";
	$query1=@mysql_query("select * from tbl_lookup l inner  join tbl_training t on(t.typeofparticipants=l.code) where classCode like '".$classCode."'
	 and course like '".$row['course']."%' and t.prog_id='".$row['prog_id']."' and  t.`semi_annual`  like '".$row['semi_annual']."%'  and t.`year`  like '".$row['year']."%'
	 group by code
	 order by codeName asc")or die(http("PR-2895"));
	while($rowx=@mysql_fetch_array($query1)){
	
	
	$data.="<tr><td><input type='checkbox' checked='checked' disabled name='typeofparticpants' id='typeofparticpants' value='".$rowx['codeName']."' ".checkExistance($row['typeofparticipants'],$row['code'],'checked')." ></td><td>".$rowx['codeName']."</td> 
	<td align='right'>".checkExistance($rowx['male'],'','ExistsInteger')."</td>
     <td align='right'>".checkExistance($rowx['female'],'','ExistsInteger')."</td>
     <td align='right'><strong>".checkExistance($rowx['total'],'','ExistsInteger')."</strong></td></tr>";
	 
	 }
	 
	 //--------Totals for the Participants------------------------------------------------------------
	 
	 $query2=@mysql_query("select sum(t.male) as male,sum(t.female) as female, sum(t.total) as total,t.status from tbl_lookup l inner  join tbl_training t on(t.typeofparticipants=l.code) where classCode like '".$classCode."'
	 and course like '".$row['course']."%' and t.prog_id='".$row['prog_id']."' and  t.`semi_annual`  like '".$row['semi_annual']."%'  and t.`year`  like '".$row['year']."%'
	 group by t.status
	 order by codeName asc")or die(http("PR-2895"));
$rowParticipant=@mysql_fetch_array($query2);
	 
	 
	 
	 $data.="<tr><td colspan='2'><strong>Total</strong></td> 
	<td align='right'><strong>".checkExistance($rowParticipant['male'],'','ExistsInteger')."</strong></td>
     <td align='right'><strong>".checkExistance($rowParticipant['female'],'','ExistsInteger')."</strong></td>
     <td align='right'><strong>".checkExistance($rowParticipant['total'],'','ExistsInteger')."</strong></td></tr>";
	 #--- end of ---Totals for the Participants---------------------------------------------------------
	 
	 $data.="</table></td>
   

 
  </tr>";
  $n++;
  }
 $data.=noRecordsFound($query,10)."<tr><td colspan='11' align='right'><input name='Close' class='formButton2' type='button' value='Close' onclick=\"xajax_close('".$div."');return false;\"></td></tr></table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}


function close($div){
$obj=new xajaxResponse();
$data="";
$obj->assign($div,'innerHTML',$data);
return $obj;
}





function view_trainingBackup($program_id,$reportingPeriod,$year){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
$inc=1;
$_SESSION['Ryear']='';
//$_SESSION['program_id']='';
$_SESSION['reportingPeriod']='';
$_SESSION['Ryear']=$year;
//$_SESSION['program_id']=$program_id;
$program_id=($program_id==NULL)?$_SESSION['program_id']:$program_id;
$_SESSION['reportingPeriod']=$reportingPeriod;
#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>".filter_training()."

";
 
  $data.="".selectandDelete_all('11',"edit_training","projects",'Delete_training','training_id','training_id','tbl_training','xajax_view_training','2')."</tr>

  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>Participants of Short-term Trainings</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>Training course title</th>
    <th>Provided by</th>
    <th>Type of
participants</th>
    
	<th>No. of Male participants</th><th>No. of Female participants</th>
<th>Total No. of participants</th>
<th>Organizing<br/>date<br/><img src='images/spacer3.gif'></th>
  </tr>
  
  ";
  //view program related training
  
  $query_program=@mysql_query("select * from tbl_programme order by program_id asc ")or die(http("PR-2782"));
  while($rowP=mysql_fetch_array($query_program)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	
  <td><strong>".$rowP['program_id']."</strong></td>
    <td colspan='8' ><strong>".$rowP['program_name']."</strong></td>
  
  </tr>";
  $n++;
  
  
  
 $query=@mysql_query(" SELECT t.`training_id` , t.`narrative_id` , t.`prog_id` , t.`project_id` , t.`semi_annual` , t.`year` , t.`course` , t.`trainer` , t.`typeofparticipants` , l.codeName, t.`male` , t.`female` , t.`total` , t.`organizing_date` , t.`updatedby` , t.`status`
FROM `tbl_training` t
LEFT JOIN tbl_lookup l ON ( l.code = t.typeofparticipants )
WHERE l.classCode = '25' and t.status like 'Yes%' and t.prog_id='".$rowP['prog_id']."'
ORDER BY  t.`course`, t.`prog_id` asc")or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
    <td>".$row['course']."</td>
    <td>".$row['trainer']."</td>
    <td>".$row['codeName']."</td>
    <td align='right'>".$row['male']."</td>
     <td align='right'>".$row['female']."</td>
     <td align='right'>".$row['total']."</td>

  <td align='right'>".$row['organizing_date']."</td>
  </tr>";
  $n++;
  }
  
  }
  


 $data.="".noRecordsFound($query,11).selectandDelete_all('11',"edit_training","projects",'Delete_training','training_id','training_id','tbl_training','xajax_view_training','2')."</tr></table></form>";

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
 
  $data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='3'></td>
    <td scope='col' colspan=19><label><div style='float:right;'>";
	
	   if($_GET['action']=='Reports'){
 $data.="";
 }else{
	   $data.="<input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_new_AdoptionRates('','','','');return false;\" /> |";
	   }
	   
	   
       $data.="<a href='export_to_excel_word.php?linkvar=Export AdoptionRates&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print AdoptionRates&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div> </label></td>
  </tr>";
	
	$data.="
 <tr class='evenrow'>
              <td colspan='3'>Region:
                <label></label></td>
              <td colspan='4'><select name='zone' id='zone' style='width:200px;' 
			  onChange=\"xajax_$fnctName(this.value,'".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\"   >
			  <option value='' >-All-</option>";
		 		$data.=QueryManager::ZoneFilter($_SESSION['zoneID']);		
				
					  $data.="</select></td>
					   <td colspan='1'>District:
                <label></label></td>
              <td colspan='14'><select name='district'  id='district' style='width:230px;'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."',this.value,'".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\" >
			  <option value='' >-All-</option>";
		$data.=QueryManager::DistrictFilter($_SESSION['zoneID'],$_SESSION['districtID']);
	  
					
				
					  $data.="</select></td>
					  
            </tr>";
			
			
			$data.="<tr class='display_none'>
          <td width='30%' colspan='3'>
          <div align='left'><strong>Organization</strong></div></td>
          <td colspan=19><select name='organization' id='organization' style='width:500px;'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',this.value,1,20);return false;\"><option value=''>-ALL-</option>";
		  		$data.=QueryManager::OrganizationFilter($region=$_SESSION['zoneID'],$district=$_SESSION['districtID'],$organization=$_SESSION['organization']);
		  
		  $data.="</select></td>
        </tr>
			";
	
	$data.="
 <tr class='display_none'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='19'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."',this.value,'".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\" >
			  <option value='' >-All-</option>";
		 
					$data.=QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
					//$data.=QueryManager::DistrictFilter($_SESSION['zone'],$_SESSION['districtID']);
					  $data.="</select></td>
            </tr>";
			  
$data.=" <tr class='display_none'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."',this.value,'".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\"  >";
$data.="<option value=''>-All-</option>"; 
			$data.=QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
$data.="</select></td>
        </tr>";
		$data.=" <tr class='display_none'>
              <td colspan='3'>Activity:</td>
              <td colspan='14'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::OutputFilter($_SESSION['subcomponent_id'],$_SESSION['output_id']);
$data.="</select></td>
        </tr>";
		
		$data.=" <tr class='display_none'>
              <td colspan='3'>Indicator Code:</td>
              <td colspan='3'><input name='indicator_code' type='text' size='30'  onKeyup=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."',this.value,'".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\" /></td>
			  <td colspan='1'>Indicator:</td>
              <td colspan='10'><input name='indicator' type='text' size='35' onKeyup=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."',this.value,'".$_SESSION['organization']."',1,20);return false;\" /></td>
        </tr>";
	          
           $data.="<tr class=evenrow>
              <td colspan=3>Project Year:</td><td colspan='3' >
			  <select name='fyear' id='fyear' style='width:200px;' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\"   >
			  <option value='' >-All-</option>";
			  //value=\"".currFinancialYear($_SESSION['fyear'],'YearRange')."' 
				$data.=QueryManager::FinancialYearFilter($_SESSION['fyear']);
              $data.="</select></td>
			  
			   <td colspan=2>RP/Season:</td><td colspan='11' >
			  <select name='quarter' id='quarter'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."',this.value,'".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."','".$_SESSION['organization']."',1,20);return false;\" style='width:200px;' ><option value=''>-All-</option>";
				//$data.=QueryManager::SemiAnnualFilter($_SESSION['semiAnnual']);
              $data.="</select></td> 
		<td colspan='5'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,getElementById('organization').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,getElementById('organization').value,1,20);return false;\" 
		
		
		 /></td>
            </tr>
";
	 if($_GET['action']=='Reports'){
 $data.="";
 }else{
$data.="<tr class='evenrow'>
<td colspan='22'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AdoptionRates(xajax.getFormValues('projects'),'".$region."','".$year."');return false;\" value='edit' /> | <a href='project_crosstab.php?linkvar=Aggregate Adoption Rates&&region=".$region."&&year=".$year."&&quarter=".$quarter."'  > <input type='button' class='formButton2'   id='button' TITLE='Cross tab'   value='Cross tab' class='' /></a></td>
 </tr>";
 }
 
 $data.="<tr CLASS='evenrow'>
 
    <th colspan='22' ><center>HOUSEHOLD DATA COLLECTION FORM</center> </th>
	
  </tr>
	
	
	<tr><th colspan='1' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='1'>Name of member
	<th colspan='2' ROWSPAN='2' ><center>Sex</center></th>
	<th colspan='2' ROWSPAN='2' ><center>Age</center></th>
</th>
	<th colspan='5'><center>Maize</center></th>
	<th colspan='5'><center>Beans</center></th>
	<th colspan='5'><center>Coffee</center></th>
	<th colspan='1' ROWSPAN='2' ><center>Total Loan Accessed</center></th>
	
		</tr>
		
		
		<tr>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	</tr>";
	
		//Generating Totals---------

// $data.=noRecordsFound($query,22);
 
 if($_GET['action']=='Reports'){
 $data.="";
 }else{
 $data.="<tr class='evenrow'>
     <td colspan='22'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AdoptionRates(xajax.getFormValues('projects'),'".$region."','".$year."');return false;\" value='edit' />  | <a href='project_crosstab.php?linkvar=Aggregate Adoption Rates&&region=".$region."&&year=".$year."&&quarter=".$quarter."' > <input type='button' class='formButton2'   id='button' TITLE='Cross tab'   value='Cross tab' class='' /></a></td>
    
	
</tr>";
}
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

 
 #-======new training Particpants===================
function new_AdoptionRates($region,$district,$organization,$fyear){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
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
$fyear=($fyear==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
#$obj->alert($_SESSION['parishCode']);
//$n=1;
$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report'>";
 
  $data.="
  
  			<tr class='evenrow'>
          <td width='30%' colspan='3'>
          <div align='left'><strong>Region</strong></div></td>
          <td colspan='18'><select name='region' id='region' onchange=\"xajax_new_AdoptionRates(this.value,'','".$organization."','".$fyear."');return false;\" style='width:300px;'><option value=''>-select-</option>";
			$data.=QueryManager::ZoneFilter($region);
		  $data.="</select></td>
        </tr>
	<tr class='evenrow3'>
          <td width='30%' colspan='3'>
          <div align='left'><strong>District</strong></div></td>
          <td colspan='18'><select name='district' id='district' style='width:300px;'><option value=''>-select-</option>";
	
	 	$data.=QueryManager::DistrictFilter($region,$district);
	
	$data.="</select></td>
        </tr>
<tr class='evenrow3'><td colspan='3'>Project Year:</td>
	<td colspan='18'><select name='year' id='year'   style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::FinancialYearFilter($fyear);
				  $data.="</select></td>
	</tr>
	<tr class='evenrow'><td colspan='3'>Reporting Period</td>
	 <td colspan='18'><select name='semiAnnual' id='semiAnnual' style='width:300px;'><option value=''>-select-</option>";
				$data.=QueryManager::ReportingPeriodFilter($period=$_SESSION['quarter']);
				  $data.="</select></td></tr>
	<tr class='display_none'>
  <td>Organizing Date</td>
  <td><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.orgdate);return false;\" hidefocus=''>
<input name='orgdate' type='text'  size='50' value='' id='orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'></a></td>
  </tr><tr CLASS='evenrow'>
 
    <th colspan='22' ><center>HOUSEHOLD DATA COLLECTION FORM</center> </th>
	
  </tr>
	
	
	<tr><th colspan='1' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='1'>Name of member
	<th colspan='1' ROWSPAN='2' ><center>Sex</center></th>
	<th colspan='1' ROWSPAN='2' ><center>Age</center></th>
</th>
	<th colspan='5'><center>Maize</center></th>
	<th colspan='5'><center>Beans</center></th>
	<th colspan='5'><center>Coffee</center></th>
	<th colspan='1' ROWSPAN='2' ><center>Total Loan Accessed</center></th>
	
		
	
		</tr>
		
		
		<tr>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	<th colspan='1'><center>Area  (acres)</center></th>
	<th colspan='1'><center>Value of Inputs (UGX)</center></th>
	<th colspan='1'><center>Total Yield (Kg</center></th>
	<th colspan='1'><center>Volume Sold (Kg) </center></th>
	<th colspan='1'><center>Volume lost in PH (Kg) </center></th>
	</tr>";
	for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
	<td><input name='loopkey[]' size='10'  type='hidden' id='loopkey".$n."' value='1'  />".$n."</td>
	<td colspan=''><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
		
	
	 /></td>
	
	
	<td>
	
	
	
	<input name='loopkey1[]' size='10'  type='hidden' id='loopkey' value='1'  />
	<input name='trainingtopic1[]' size='10' type='hidden' id='trainingtopic1".$n."' value='1'  />
	<input name='malehoe[]' size='10'  type='text' id='malehoe".$n."'
	
	onKeyPress='return numbersonly(event, false)'
	

	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femalehoe[]' size='10'  type='text' id='femalehoe".$n."' 
		onKeyPress='return numbersonly(event, false)'
	
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td>
		<input name='loopkey2[]' size='10'  type='hidden' id='loopkey2' value='1'  />
	<input name='trainingtopic2[]' size='10'  type='hidden' id='trainingtopic2".$n."' value='2'  />
	<input name='maleadp[]' size='10'  type='text' id='maleadp".$n."'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	  /></td>
	<td><input name='femaleadp[]' size='10'  type='text' id='femaleadp".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
	<input name='loopkey3[]' size='10'  type='hidden' id='loopkey3' value='1'  />
	<input name='trainingtopic3[]' size='10'  type='hidden' id='trainingtopic3".$n."' value='3'  />
	<input name='malemechanized[]' size='10'  type='text' id='malemechanized".$n."' 
		
		onKeyPress='return numbersonly(event, false)'
		
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	
	 /></td>
	<td><input name='femalemechanized[]' size='10'  type='text' id='femalemechanized".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td>
		<input name='loopkey4[]' size='10'  type='hidden' id='loopkey4' value='1'  />
		<input name='trainingtopic4[]' size='10'  type='hidden' id='trainingtopic4".$n."' value='4'  />
	<input name='maleherbicide[]' size='10'  type='text' id='maleherbicide".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	<td><input name='femaleherbicide[]' size='10'  type='text' id='femaleherbicide".$n."'
		onKeyPress='return numbersonly(event, false)'
onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"  /></td>
	<td>
	
	
		<input name='loopkey5[]' size='10'  type='hidden' id='loopkey5' value='1'  />
	<input name='trainingtopic5[]' size='10'  type='hidden' id='trainingtopic5".$n."' value='5'  />
	<input name='maletreeplanting[]' size='10'  type='text' id='maletreeplanting".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaletreeplanting[]' size='10'  type='text' id='femaletreeplanting".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 <td>
	
	
		<input name='loopkey6[]' size='10'  type='hidden' id='loopkey6' value='1'  />
	<input name='trainingtopic6[]' size='10'  type='hidden' id='trainingtopic6".$n."' value='6'  />
	<input name='malearea[]' size='10'  type='text' id='malearea".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femalearea[]' size='10'  type='text' id='femalearea".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	 
	 
	 <td>
	
	
		<input name='loopkey7[]' size='10'  type='hidden' id='loopkey7' value='1'  />
	<input name='trainingtopic7[]' size='10'  type='hidden' id='trainingtopic7".$n."' value='7'  />
	<input name='malelegumes[]' size='10'  type='text' id='malelegumes".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femalelegumes[]' size='10'  type='text' id='femalelegumes".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	  <td>
	
		<input name='loopkey9[]' size='10'  type='hidden' id='loopkey9' value='1'  />
	<input name='trainingtopic9[]' size='10'  type='hidden' id='trainingtopic9".$n."' value='9'  />
	<input name='maleherbs[]' size='10'  type='text' id='maleherbs".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaleherbs[]' size='10'  type='text' id='femaleherbs".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 
	 
	 
	 <td>
	
	
		<input name='loopkey8[]' size='10'  type='hidden' id='loopkey8' value='1'  />
	<input name='trainingtopic8[]' size='10'  type='hidden' id='trainingtopic8".$n."' value='8'  />
	<input name='maleresidues[]' size='10'  type='text' id='maleresidues".$n."'
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	  /></td>
	<td><input name='femaleresidues[]' size='10'  type='text' id='femaleresidues".$n."' 
		onKeyPress='return numbersonly(event, false)'
	onKeyUp=\"xajax_calc_trainingSemiAnnual(
		getElementById('malehoe".$n."').value,getElementById('femalehoe".$n."').value,
		getElementById('maleadp".$n."').value,getElementById('femaleadp".$n."').value,
		getElementById('malemechanized".$n."').value,getElementById('femalemechanized".$n."').value,
		getElementById('maleherbicide".$n."').value,getElementById('femaleherbicide".$n."').value,
		getElementById('maletreeplanting".$n."').value,getElementById('femaletreeplanting".$n."').value,
		'total".$n."');\"
	 /></td>
	 	 
	 
	</tr>";
	
	
	
	/**/
	
	$n++;
	
	}
	
	

  $data.=" 
 <tr style='display:none'>
  <td>Attach Minutes</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  <tr style='display:none'>
  <td>Attach Attendance Sheet/List</td>
  <td><input name='' size='50' type='file'></td>
  </tr>
  ";
 
 
 $data.="<tr class='evenrow'><td></td><td colspan='21' align='right'><div align='right'>
        <button type='button' class='formButton2'   id='button' name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_AdoptionRates(xajax.getFormValues('projects')); return false;\" />Save</button>
        </div></td></tr>
</table>



</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


 
 

#-======
#----------------------------------------------

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
<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
<script src="popup/prototype.js" type="text/javascript"></script>
  <script src="popup/effects.js" type="text/javascript"></script>
  <script src="popup/dragdrop.js" type="text/javascript"></script>
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
			case"TSO Quantitative Reporting":
			?>
			//xajax_select_quarterlyValueChainReportingType('','');
		xajax_new_TSOquantitativeReporting('','','','','','','');
			<?php 
			break;
			
			case"View TSO Quantitative Reporting":
			?>
			xajax_view_TSOquantitativeReporting('','','','','');
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
		
			
			case"Training Record Form":
			 ?>
			xajax_view_training('','','','');
			<?php
			break;
			 case "Progress Against Targets": 
		  ?>
		  
		  xajax_view_quantitativeReportLog('','','','','');
		  	//xajax_view_AnnualResults('','','','','','','',1,20);
	//$FunctionName(calcArguments($Arguments));
		 
		<?php
		
	break;
	
	
	case"Household Data Collection Form":
			?>
			
			xajax_ViewAdoptionRates('','','','','','','','','','',1,20);
			//xajax_calc_trainingSemiAnnual('','','','','','','','','','','');
			//xajax_new_CFTechnicalTrainingActivities('','','');
			
			<?php
			break;

			case"Publications/Knowledge Products":
			?>
			xajax_view_publications('','','','',1,20);
			
			<?php
			break; 
			default: ?>
			//xajax_view_NarrativequalitativeReport('','','','','');
				 //xajax_view_qualitativeReporting('','','');
			//xajax_OVCServicesRegister_summary('','');
 //xajax_view_staffActivity_reports('','','');
<?php }




 ?>

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

