<?php
//require_once("connections/lib_connect.php");

function UpdateDasboard($formvalues,$id){
		$obj=new xajaxResponse();
		$query=@Execute("update tbl_indicator set displayonDashboard='$formvalues' where indicator_id='".$id."' ") or die(http("Edit-5138"));
		
		if($query){
		#$obj->addAlert("Indicator Status Changed to ".$formvalues."!");
				}
		return $obj;
}

function UpdateVariableOperand($formvalues,$id,$column){
		$obj=new xajaxResponse();
		$query=@Execute("update tbl_indicator set ".$column."='$formvalues' where indicator_id='".$id."' ") or die(http("Edit-5138"));
		
		if($query){
		#$obj->alert("Indicator Value Changed to ".$formvalues."!");
				}
		return $obj;
}


function SpecifyFormular($formvalues,$id,$div){
		$obj=new xajaxResponse();
		$data.="<textarea name='formular' ID='formular' cols='50' rows='5'>".$formvalues."</textarea>
		<input name='update' type='button' onclick=\"xajax_UpdateFormular(getElementById('formular').value,'".$id."','Formular');return false;\" value='Update' />";
		$obj->assign($div,'innerHTML',$data);
		return $obj;
}


function UpdateFormular($formvalues,$id,$column){
		$obj=new xajaxResponse();
		$obj->alert("update tbl_indicator set ".$column."='".$formvalues."' where indicator_id='".$id."' ");
		$query=@Execute("update tbl_indicator set ".$column."='".$formvalues."' where indicator_id='".$id."' ") or die(http("Edit-5138"));
		
		if($query){
		$obj->alert("Indicator Value Changed to ".$formvalues."!");
		
				}
		$obj->assign($div,'innerHTML',$formvalues);
		return $obj;
}


function edit_goal($formvalues){
$obj=new xajaxResponse();
$_SESSION['programme']='';
$_SESSION['project']='';
$_SESSION['supergoal_type']='';
$_SESSION['subprogram']='';
$_SESSION['output_id']='';
$_SESSION['supergoal_type']=$supergoal_type;
$_SESSION['output_id']=$output;
$_SESSION['programme']=$programme;
$_SESSION['subprogram']=$subprogram;
$_SESSION['project']=$project;
      $data="<form action='".$PHP_SELF."' method='post' name='edit_goal' id='edit_goal' ><table cellspacing='0'      width='557' border='0'>";
	  #$obj->alert(count($formvalues['goal_id']));
	  
        for($m=0;$m<count($formvalues['goal_id']);$m++){
		$sql="select * from tbl_goal where id='".$formvalues['goal_id'][$m]."' order by id asc";
		$query=@mysql_query($sql) or die(http("Edit-0019"));
		while($row=@mysql_fetch_array($query)){
		$data.="<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><hr></td>
        </tr>
		<tr>
                <td>Super Goal:<input name='goal_id[]' type='hidden'  id='goal_id' value='".$row['id']."' size='55' /></td>
                <td><select name='supergoal_id[]' id='supergoal_id' class='combobox2' >";
					  $querytyp=@mysql_query("select * from tbl_supergoal  order by component asc")or die(http("VP-620"));
					while($rowtyp=@mysql_fetch_array($querytyp)){
					$seltype=($row['supergoal_id']==$rowtype['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['id']."\" ".$seltype." >".$rowtyp['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  
			  <tr>
                <td>Type of Goal :</td>
                <td><select name='supergoaltype[]' id='supergoaltype' class='combobox2'  return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-620"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($row['type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			  
			   $data.="<tr>
                <td>Program:</td>
                <td><select name='cprogramme[]' id='cprogramme' class='combobox2' ><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					$query=mysql_query("select * from tbl_programme  order by prog_id")or die(mysql_error());
					while($rowp=mysql_fetch_array($query)){
					$selecd=($rowp['prog_id']==$row['prog_id'])?"selected":"";
					$data.="<option value=\"".$rowp['prog_id']."\" ".$selecd." >".$row['program_id']."  ".pagination::retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram[]' id='subprogram' class='combobox2' ><option value=''>-select-</option>";
				$sql="select * from tbl_subcomponent order by subcomponent_code asc";
				
					  $querysc=@mysql_query($sql)or die(@mysql_error());
					while($rowsc=@mysql_fetch_array($querysc)){
					$selecdsc=($rowsc['subcomponent_id']==$row['subprog_id'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowsc['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project[]' id='project' class='combobox2'><option value=''>-select-</option>";
				 $sql2="select * from tbl_project where programme_id='".$row['prog_id']."' && display like 'Yes%' order by project_code,title asc";
				//$obj->alert($sql2);
					  $query=@mysql_query($sql2)or die(@mysql_error());
					while($rowpp=@mysql_fetch_array($query)){
					$sel=($rowpp['id']==$row['project_id'])?"selected":"";
					$data.="<option value=\"".$rowpp['id']."\" ".$sel.">".retrieve_info_withSpecialCharactersNowordLimit($rowpp['project_code'])."
					  ".retrieve_info_withSpecialCharactersNowordLimit($rowpp['title'])."</option>";
					
					} 
					
					//$data.=QueryManager::ProjectFilter($row['prog_id'],$row['project_id']);
    $data.="</select></td>
              </tr>";
			   
			/*   }
			  else {} */
			   $data.="
			   
			   <tr>
                <td> Goal Code:</td>
                <td><textarea name='goal_code[]' id='goal_code' cols='52' row='3' />".$row['component_code']."</textarea></td>
              </tr>
			   <tr>
                <td> Goal:</td>
                <td><textarea name='supergoal[]' id='supergoal' cols='52' row='3' />".$row['component']."</textarea></td>
              </tr>
			  <tr>
                <td> Sources of Verification:</td>
                <td><textarea name='verification_sources[]' id='verification_sources' cols='52' row='3' />".$row['verification_sources']."</textarea></td>
              </tr>
              <tr>
                <td>Assumptions:</td>
                <td><textarea name='assumptions[]' id='assumptions' cols='52' rows='3'>".$row['assumptions']."</textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='52' rows='3'>".$row['description']."</textarea></td>
              </tr>";
			  
			  			               }}
              $data.="<tr>
                <td>&nbsp;</td>
                <td align=right><button type='button' class='formButton2'name='button' id='button' class='button_width' value='Save' onclick=\"xajax_update_goal(xajax.getFormValues('edit_goal'));\">Save</button></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_goal($formValues){
$obj=new xajaxResponse();


if(count($formValues['goal_id'])>0){
for($i=0;$i<count($formValues['goal_id'][$i]);$i++){
$id=$formValues['goal_id'][$i];
$supergoal_id=$formValues['supergoal_id'][$i];
$cprogramme=$formValues['cprogramme'][$i];
$supergoal=$formValues['supergoal'][$i];
$pdescription=$formValues['pdescription'][$i];
$supergoaltype=$formValues['supergoaltype'][$i];
$subprogram=$formValues['subprogram'][$i];
$project=$formValues['project'][$i];
$component=$formValues['supergoal'][$i];
$verification_sources=$formValues['verification_sources'][$i];
$assumptions=$formValues['assumptions'][$i];

//$xx=str_replace("'","",$x);
 if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select Goal Type</li>"));
return $obj;
}
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Goal Name</li>"));
return $obj;
 } 

$query="update tbl_goal set supergoal_id='".$supergoal_id."',prog_id='".mysql_real_escape_string($cprogramme)."',subprog_id='".$subprogram."',project_id='".$project."',type='".$supergoaltype."',component='".$component."',verification_sources='".pagination::insert_info_withSpecialCharacters($verification_sources)."'
,assumptions='".pagination::insert_info_withSpecialCharacters($assumptions)."',description='".mysql_real_escape_string(str_replace("'","",$pdescription))."' 
where id='".$id."'";

#$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_goal",'','','','','','');

}else {

$obj->assign('bodyDisplay','innerHTML',errorMsg("Data could not be Captured! Please try again later."));

}

return $obj;
}




function edit_purpose($formvalues){
$obj=new xajaxResponse();
$_SESSION['programme']='';
$_SESSION['project']='';
$_SESSION['supergoal_type']='';
$_SESSION['subprogram']='';
$_SESSION['output_id']='';
$_SESSION['supergoal_type']=$supergoal_type;
$_SESSION['output_id']=$output;
$_SESSION['programme']=$programme;
$_SESSION['subprogram']=$subprogram;
$_SESSION['project']=$project;
      $data="<form action='".$PHP_SELF."' method='post' name='edit_purpose' id='edit_purpose' ><table cellspacing='0'      width='557' border='0'>";
	  #$obj->alert(count($formvalues['goal_id']));
	  
        for($m=0;$m<count($formvalues['purpose_id']);$m++){
		$sql="select * from tbl_purpose where id='".$formvalues['purpose_id'][$m]."' order by id asc";
		$query=@mysql_query($sql) or die(http("Edit-0019"));
		while($row=@mysql_fetch_array($query)){
		$data.="<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><hr></td>
        </tr>
		<tr>
                <td>Super Goal:<input name='purpose_id[]' type='hidden'  id='purpose_id' value='".$row['id']."' size='55' /></td>
                <td><select name='supergoal_id[]' id='supergoal_id' class='combobox2' >";
					  $querytyp=@mysql_query("select * from tbl_supergoal  order by component asc")or die(http("VP-620"));
					while($rowtyp=@mysql_fetch_array($querytyp)){
					$seltype=($row['supergoal_id']==$rowtype['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['id']."\" ".$seltype." >".$rowtyp['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Type of Purpose :</td>
                <td><select name='supergoaltype[]' id='supergoaltype' class='combobox2'  return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-620"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($row['type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			  
			   $data.="<tr>
                <td>Program:</td>
                <td><select name='cprogramme[]' id='cprogramme' class='combobox2' ><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					$query=mysql_query("select * from tbl_programme  order by prog_id")or die(mysql_error());
					while($rowp=mysql_fetch_array($query)){
					$selecd=($rowp['prog_id']==$row['prog_id'])?"selected":"";
					$data.="<option value=\"".$rowp['prog_id']."\" ".$selecd." >".$row['program_id']."  ".pagination::retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram[]' id='subprogram' class='combobox2' ><option value=''>-select-</option>";
				$sql="select * from tbl_subcomponent order by subcomponent_code asc";
				
					  $querysc=@mysql_query($sql)or die(@mysql_error());
					while($rowsc=@mysql_fetch_array($querysc)){
					$selecdsc=($rowsc['subcomponent_id']==$row['subprog_id'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowsc['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project[]' id='project' class='combobox2'><option value=''>-select-</option>";
				$sql2="select * from tbl_project where display like 'Yes%' group by title order by project_code,title asc";
				//$obj->alert($sql2);
					  $queryx=@mysql_query($sql2)or die(@mysql_error());
					while($rowpp=@mysql_fetch_array($queryx)){
					$sel=($rowpp['id']==$row['project_id'])?"selected":"";
					$data.="<option value=\"".$rowpp['id']."\" ".$sel.">".$rowpp['project_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowpp['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   
			/*   }
			  else {} */
			   $data.="
			   
			   <tr>
                <td>Purpose Code:</td>
                <td><textarea name='goal_code[]' id='goal_code' cols='52' row='3' />".$row['component_code']."</textarea></td>
              </tr>
			   <tr>
                <td> Purpose:</td>
                <td><textarea name='supergoal[]' id='supergoal' cols='52' row='3' />".$row['component']."</textarea></td>
              </tr>
			  <tr>
                <td> Sources of Verification:</td>
                <td><textarea name='verification_sources[]' id='verification_sources' cols='52' row='3' />".$row['verification_sources']."</textarea></td>
              </tr>
              <tr>
                <td>Assumptions:</td>
                <td><textarea name='assumptions[]' id='assumptions' cols='52' rows='3'>".$row['assumptions']."</textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='52' rows='3'>".$row['description']."</textarea></td>
              </tr>";
			  
			  			               }}
              $data.="<tr>
                <td>&nbsp;</td>
                <td align=right><button type='button' class='formButton2'name='button' id='button' class='button_width' value='Save' onclick=\"xajax_update_purpose(xajax.getFormValues('edit_purpose'));\">Save</button></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_purpose($formValues){
$obj=new xajaxResponse();

if(count($formValues['purpose_id'])>0){
for($i=0;$i<count($formValues['purpose_id'][$i]);$i++){
$id=$formValues['purpose_id'][$i];
$supergoal_id=$formValues['supergoal_id'][$i];
$cprogramme=$formValues['cprogramme'][$i];
$supergoal=$formValues['supergoal'][$i];
$pdescription=$formValues['pdescription'][$i];
$supergoaltype=$formValues['supergoaltype'][$i];
$subprogram=$formValues['subprogram'][$i];
$project=$formValues['project'][$i];
$component=$formValues['supergoal'][$i];
$verification_sources=$formValues['verification_sources'][$i];
$assumptions=$formValues['assumptions'][$i];

//$xx=str_replace("'","",$x);
 if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select Goal Type</li>"));
return $obj;
}
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Goal Name</li>"));
return $obj;
 } 

$query="update tbl_purpose set supergoal_id='".$supergoal_id."',prog_id='".mysql_real_escape_string($cprogramme)."',subprog_id='".$subprogram."',project_id='".$project."',type='".$supergoaltype."',component='".$component."',verification_sources='".pagination::insert_info_withSpecialCharacters($verification_sources)."'
,assumptions='".pagination::insert_info_withSpecialCharacters($assumptions)."',description='".mysql_real_escape_string(str_replace("'","",$pdescription))."' 
where id='".$id."'";

#$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_purpose",'','','','','','');

}else {

$obj->assign('bodyDisplay','innerHTML',errorMsg("Data could not be Captured! Please try again later."));

}

return $obj;
}



//------------------edit annualResults---------------------
function edit_AnnualResults($formvalues){
$obj=new xajaxResponse();

$_SESSION['program']=$Program;
$_SESSION['subcomponent']=$subcomponent;
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['Project']=$Project;
$level_ofindicator=array('ASARECA','Program','Project');
$_SESSION['fyear']=$fyear;
$Gender='Yes';

/*$obj->alert(mappQuarterToSemiAnnual($_SESSION['quarter'])."-------".$semi_annual);

if(mappQuarterToSemiAnnual($_SESSION['quarter'])<>$semi_annual){
$obj->alert('Process Halted! You are Trying to Enter or Edit Details in a wrong Reporting Period!');
return $obj;

} */


$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";
//getElementById('Program')
         $data.="
		 
		    <tr>
            <td width='25' class='evenrow2' colspan=3>&nbsp;</td>
        
              <td colspan='6' class='evenrow2' >Editing Perfomance Indicator Annual Results</td>
             
            </tr>
            <tr class='evenrow'>
            <td width='25' class='evenrow2'>Indicator Code</td>
			<td width='' class='evenrow2' colspan='3' >Indicator<img src='images/spacer2.png' width='200px' height='0.1px'></td>
			<td width='55' class='evenrow2' align='right'>Baseline</td>
			<td width='55' class='evenrow2' align='right'>Target</td>
			<td width='55' class='evenrow2' align='right'>Male</td>
			<td width='51' class='evenrow2' align='right'><b>Female</b></td>
			<td width='51' class='evenrow2' align='right'><b>Total</b></td>
			</tr>";
																//if($level_ofindicator[2]==){}
			$inc=1;
		  $a=1;													/*  i.prog_id='".$_SESSION['program']."' 
																			 and i.level_ofindicator like '".$level_ofindicator[2]."%' 
																			 and i.indicator_type like '".$_SESSION['indicator_type']."%'
																			 and i.project_id like '".$_SESSION['Project']."%' and w.curr_year like '".$_SESSION['fyear']."%' */
																					# $obj->alert(count($formvalues['loopkey']));
			 for($t=0;$t<count($formvalues['id']);$t++){
										/* $y="select  r.id,r.total,i.`indicator_id` , i.`prog_id` , i.`supergoal_id` , i.`goal_id` , i.`purpose_id` , i.`subcomponent_id` , i.`output_id` , i.`project_id` , i.`indicator_code` , i.`indicator_name` , i.`disaggregation` , i.`gender` , i.`indicator_type` , i.`level_ofindicator` , w.curr_year,i.`frequency_of_reporting` , i.`remarks` , i.`responsible` , i.`expected_output` , i.`unitofmeasure` , i.`updatedby` , i.`display` , i.`dateupdated`,w.curr_year,w.baseline,w.Target
										from tbl_indicator i 
										left join tbl_workplan w on(i.indicator_id=w.indicator_id)
										left join tbl_organizationreporting r on(r.indicator_id=i.indicator_id)
										 where r.id='".$formvalues['id'][$t]."' and r.year like '".$_SESSION['Activeyear']."%' AND w.curr_year like  '".$_SESSION['Activeyear']."%'
							GROUP BY i.indicator_id
										 order by indicator_code asc"; */
										 
			 //--------------Organization reporting---------------------------
			 $y="select  r.id,r.total,r.male,r.female,w.Target,w.curr_year,i.baseline,i.`indicator_id` , i.`prog_id` , i.`supergoal_id` , i.`goal_id` , i.`purpose_id` ,
			 i.`subcomponent_id` , i.`output_id` , i.`project_id` , i.`indicator_code` , i.`indicator_name` , i.`disaggregation` , 
			 i.`gender` , i.`indicator_type` , i.`level_ofindicator` ,
			 i.`frequency_of_reporting` , i.`remarks` , i.`responsible` , i.`expected_output` , i.`unitofmeasure` ,
			 i.`updatedby` , i.`display` , i.`dateupdated`
			from tbl_indicator i  left join tbl_workplan w on(w.indicator_id=i.indicator_id)
			left join tbl_organizationreporting r on(r.indicator_id=i.indicator_id)
			where r.id='".$formvalues['id'][$t]."' 
			and r.year like '".$_SESSION['Activeyear']."%' &&
			w.curr_year like '".$_SESSION['Activeyear']."%' 
			GROUP BY i.indicator_id
			Order by indicator_code asc";
			 //
			 
			 
			 
			 
			 
		  $query2=@mysql_query($y)or die(http("PR-421"));
		//$obj->alert($y); 
		
		// and w.curr_year like '".$_SESSION['fyear']."%'  subcomponent_id ='".$_SESSION['subcomponent']."' and prog_id='".$_SESSION['program']."' and 
		 
		  
		  if(@mysql_num_rows($query2)>0){
		 			 while($row=@mysql_fetch_array($query2)){
					 $color=$inc%2==1?"evenrow3":"white1";
					 //-------------workplan
					 $sqlworkplan="select  w.indicator_id,w.curr_year,w.baseline,w.Target
									from tbl_indicator i 
									left join tbl_workplan w on(i.indicator_id=w.indicator_id)
			 						where i.indicator_id='".$row['iindicator_id']."' 
									AND w.curr_year like '".$_SESSION['Activeyear']."%'
									GROUP BY i.indicator_id
			 						order by indicator_code asc";
						$queryWorkplan=Execute($sqlworkplan) or die(http("Edit-438"));	
					 	$rowworkplan=FetchRecords($queryWorkplan);
					 	//$obj->alert($row['total']);
							/* 	$disaggregation1="<td align='right'>
								<input name='male[]' type='text' id='male".$a."'  onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" value='".$row['male']."'  size='10'  onKeyPress='return numbersonly(event, false)' />
								</td>
								<td align='right'>
								<input name='female[]' type='text' id='female".$a."' onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" value='".$row['female']."'  size='10'  onKeyPress='return numbersonly(event, false)' />
								</td>
								<td align='right'>
								<input name='actual[]' size='10'  onKeyDown=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onFocus=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" type='text' id='actual".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['total']."'   />
								</td>";
								
								$disaggregation2="<td align='right'>
								<input name='male[]' readonly='readonly' disabled='disabled' value='N/A' class='evenrow' type='text' id='male".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text'  readonly='readonly' disabled='disabled' class='evenrow' id='female".$a."' size='10'  onKeyPress='return numbersonly(event, false)' value='N/A' /></td>
			<td align='right'><input name='actual[]' size='10'   onFocus=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" type='text' id='actual".$a."' size='10' onKeyPress='return numbersonly(event, false)'  value='".$row['total']."'   /></td>"; */
			
		  $color=$inc%2==1?"evenrow3":"white1";
		  
		 
		 
		 if($row['disaggregation']=='Yes'){
  $data.="<tr class='".$color."' >
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."
			<input name='loopKey[]' type='hidden' value='1' id='loopkey'  />
			<input name='unitofmeasure[]' type='hidden' value='".$row['unitofmeasure']."' id='unitofmeasure'  />
			<input name='disaggregation[]' type='hidden' value='".$row['disaggregation']."' id='disaggregation'  />
			<input name='id[]' type='hidden' value='".$row['id']."' id='id'  />
			
			</td>
 <td align='right'>
 <input name='baselinevalue[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."' onKeyPress='return numbersonly(event, false)' />
 </td>
 <td align='right'>
 <input name='target[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='target".$a."' size='20' value='".$row['Target']."' onKeyPress='return numbersonly(event, false)' />
 </td>
<td align='right'>
								<input name='male[]' type='text' id='male".$a."'  onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" value='".$row['male']."'  size='10'  onKeyPress='return numbersonly(event, false)' />
								</td>
								<td align='right'>
								<input name='female[]' type='text' id='female".$a."' onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" value='".$row['female']."'  size='10'  onKeyPress='return numbersonly(event, false)' />
								</td>
								<td align='right'>
								<input name='actual[]' size='10'  onKeyDown=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onKeyUp=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" onFocus=\"xajax_new_target(getElementById('male".$a."').value,getElementById('female".$a."').value,'actual".$a."');return false;\" type='text' id='actual".$a."' size='10' onKeyPress='return numbersonly(event, false)' value='".$row['total']."'   />
								</td>
            
          </tr>";}
		  else {
		  
		  
		  $data.="<tr class='".$color."' >
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopKey'  />
					<input name='unitofmeasure[]' type='hidden' value='".$row['unitofmeasure']."' id='unitofmeasure'  />
						<input name='disaggregation[]' type='hidden' value='".$row['disaggregation']."' id='disaggregation'  />
			<input name='id[]' type='hidden' value='".$row['id']."' id='id'  /></td>
 <td align='right'><input name='baselinevalue[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='baselinevalue".$a."' size='10'' value='".$rowworkplan['baseline']."' onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='target[]' readonly='readonly' disabled='disabled' class='evenrow' type='text' id='target".$a."' size='10' value='".$rowworkplan['Target']."' onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'>
								<input name='male[]' readonly='readonly' disabled='disabled' value='N/A' class='evenrow' type='text' id='male".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text'  readonly='readonly' disabled='disabled' class='evenrow' id='female".$a."' size='10'  onKeyPress='return numbersonly(event, false)' value='N/A' /></td>
			<td align='right'><input name='actual[]' size='10'    value='".$row['total']."'   /></td>
            
          </tr>";
		  
		  
		  
		  }
		  $inc++;
		 $a++; 
		
		  }
		  }else {
		  $obj->alert("The Records You are trying to edit DO NOT Have Targets Set for Current Year!");
		  return $obj;
		  }
		  
		  
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='9' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
} 


function update_AnnualResults($formvalues){
$obj=new xajaxResponse();

//$obj->alert(count($formvalues['loopKey']));
for($i=0;$i<count($formvalues['loopKey']);$i++){
		$indicator=$formvalues['indicator_id'][$i];
		$baseline=$formvalues['baselinevalue'][$i];
		$id=$formvalues['id'][$i];
		$typeofDisaggregation=$formvalues['unitofmeasure'][$i];
		$disaggregation=$formvalues['disaggregation'][$i];
	
		$actual=$formvalues['actual'][$i];
		$male=$formvalues['male'][$i];
		$female=$formvalues['female'][$i];
//$obj->alert($total);

 //&&($curr_year>$_SESSION['Activeyear']-1)
if(($actual<>'')){





 switch($disaggregation){
case "Yes": 

$insert="UPDATE tbl_organizationreporting set male='".$male."',total='".$actual."',female='".$female."',updatedby='".$_SESSION['username']."' WHERE id='".$id."'";
 
 break;

default:
$insert="update tbl_organizationreporting set total='".$actual."',updatedby='".$_SESSION['username']."' where id='".$id."'";
//break;
}

//$insert="UPDATE tbl_organizationreporting set male='".$male."',actual='".$actual."',female='".$female."',lastUpdatedby='".$_SESSION['username']."' WHERE id='".$id."'";

//$obj->alert($insert);
@mysql_query($insert)or die(http("Edit-123"));
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_quantitativeReportLog",'','','');
return $obj;
}




//-----------------faqs----------------------------------------------------------------------------
function edit_faqs($qn){
$obj=new xajaxResponse();
$select=Execute("select * from tbl_faqs where id='".$qn."'") or die(http("Edit-005")); 
while($row=@mysql_fetch_array($select)){
$data="<table cellspacing='0'      width='600' border='0'>
  <tr>
    <td>

<table cellspacing='0'      width='362' border='0'>
  <tr>
    <td width='257'><div align='center'></div></td>
    <td width='95'><label></label></td>
  </tr>
  <tr>
    <td><label>Question.</label></td>
    <td><textarea cols='150' rows='20' id='faqs' name='faqs'>".$row['answer']."</textarea></td>
  </tr>
  <tr>
    <td><label>
        <div align='right'></div>
      </label></td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='save' value='Save' onclick=\"xajax_update_faqs(getElementById('faqs').value,'".$qn."')\" />
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>";
}
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function update_faqs($faqs){
$obj=new xajaxResponse();
mysql_query("update tbl_faqs set question ='".insert_info_withSpecialCharacters($faqs)."' where id='".$id."'")or die(http("Setup-44"));
//if($query)
//$obj->assign('bodyDisplay','innerHTML',$data);
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajx_view_questions",'','');
return $obj;
}



 

//********************************************************************************88888888888888
//--------------WORKPLAN------------------------------------------------------------------------







function edit_annualTargetBackup12March201302_24hrsSerenaHotel($formvalues){
$obj=new xajaxResponse();
$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'   id='report'   width='100%' border='0'>
         <tr>
            <td width='25' class='evenrow2' colspan=4>&nbsp;</td>
        
              <td colspan='6' class='evenrow2'>Perfomance Indicator Annual Targets</td>
              </tr>
            <tr class=evenrow>
			<th width='' class='dataRow' colspan='4' class='dataRow'>indicator/Code
              </th>
			  <th width='55' class='dataRow' align='right'>Baseline</th>";
			  
			  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='evenrow2' align='right'>".$n."</th>";
					
					}
			 // $data.="<th width='55' class='dataRow' align='right'>TARGET</th>
				
			  
             
            $data.="</tr>";
//$obj->alert(count($formvalues['workplan_id']));
for($y1=0;$y1<count($formvalues['p_id']);$y1++){
$y="select w.workplan_id,w.Target,w.Quarter,w.curr_year,w.indicator_id,i.indicator_code,i.indicator_name,w.baseline
  from tbl_workplan w join tbl_indicator i on(i.indicator_id=w.indicator_id) where w.workplan_id='".$formvalues['p_id'][$y1]."'";
 $query2=@mysql_query($y)or die(http("ED-791"));
		  		#$obj->alert($y);
				if(@mysql_num_rows($query2)==0){
$obj->alert("The Indicator You have selected Has No Targets Set!
				 Please Add New targets Before Continuing!");
return $obj;
				}
		 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
/*  if($_SESSION['Activeyear']<>$row['curr_year']){
$obj->alert("You can only Change Targets of the Current Year! Please check the Target Year.");
return $obj;
}  */



//$obj->alert($_SESSION['project_id']);

		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."
			<INPUT type='text' name='workplan_id[]'  id='workplan_id' value='".$row['workplan_id']."' >
			</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
//-------------retriving Targets---------------------
/* $sqlp="select * from tbl_workplan
				 where indicator_id='".$row['indicator_id']."' 
				 and curr_year='".$_SESSION['Activeyear']."' 	
				 and  workplan_id='".$row['workplan_id']."'
				 order by workplan_id asc"; */
//$obj->alert($sqlp);
			 								$qquarter=@mysql_query("select * from tbl_workplan 
			 								where indicator_id='".$row['indicator_id']."' 
											and workplan_id='".$row['workplan_id']."' and curr_year like '".$row['curr_year']."%'
											order by curr_year asc")or die(http("ED-0046"));
			while($rowTarget=@mysql_fetch_array($qquarter)){
			/*  and curr_year='".$_SESSION['Activeyear']."' $data.="<input name='loopKey[]' type='hidden' value='1' id='loopkey'  />
			 <input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id'  />
		
		"; ".$disabled."  */
		$disabled=($rowTarget['curr_year']<$_SESSION['Activeyear'])?"disabled class='evenrow'":"";
		$data.="<td align='right'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
		<input name='curr_year[]' type='hidden' size='5' value='".$rowTarget['curr_year']."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$rowTarget['Target']."'  onKeyPress='return numbersonly(event, false)' /></td>
		"; 
		}
			$data.="</tr>";
		  $inc++;
		 $a++; 
		}
		
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function edit_annualTargetBackuptwo($formvalues){
$obj=new xajaxResponse();
$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'   id='report'   width='100%' border='0'>
         <tr>
            <td width='25' class='evenrow2' colspan=4>&nbsp;</td>
        
              <td colspan='6' class='evenrow2'>Perfomance Indicator Annual Targets</td>
              </tr>
            <tr class=evenrow>
			<th width='' class='dataRow' colspan='4' class='dataRow'>indicator/Code
              </th>
			  <th width='55' class='dataRow' align='right'>Baseline</th>";
			  
			  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100' class='evenrow2' align='right'>".$n."</th>";
					
					}
			 // $data.="<th width='55' class='dataRow' align='right'>TARGET</th>
				
			  
             
            $data.="</tr>";
//$obj->alert(count($formvalues['workplan_id']));
for($y1=0;$y1<count($formvalues['p_id']);$y1++){

$y="SELECT w.`workplan_id` , w.`indicator_id` , w.`prog_id` , i.`project_id` , i.indicator_code, i.indicator_name, i.indicator_type, i.level_ofindicator, w.baseline, max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
 w.`display`
FROM tbl_workplan w
inner JOIN tbl_indicator i ON ( w.indicator_id = i.indicator_id )
 where w.workplan_id='".$formvalues['p_id'][$y1]."'
GROUP BY w.`indicator_id`
ORDER BY i.indicator_code ASC";

 $query2=@mysql_query($y)or die(http("ED-791"));
		  		//$obj->alert($y);
				if(@mysql_num_rows($query2)==0){
$obj->alert("The Indicator You have selected Has No Targets Set!
				 Please Add New targets Before Continuing!");
return $obj;
				}
		 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
/*  if($_SESSION['Activeyear']<>$row['curr_year']){
$obj->alert("You can only Change Targets of the Current Year! Please check the Target Year.");
return $obj;
}  */



//$obj->alert($_SESSION['project_id']);
			$disabled=($row['curr_year']<$_SESSION['Activeyear'])?"disabled class='evenrow'":"";
		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'>".$row['indicator_name']."
			<INPUT type='hidden' name='workplan_id[]'  id='workplan_id' value='".$row['workplan_id']."' >	
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> </td>
						
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";
			
			$data.="<td align='right'>
				<input name='loopKey[]' type='hidden' value='1' id='loopKey' />
				<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<INPUT type='hidden' name='prog_id[]'  id='prog_id' value='".$row['prog_id']."' >
			<INPUT type='hidden' name='project_id[]'  id='project_id' value='".$row['project_id']."' >
		<input name='curr_year[]' type='hidden' size='5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$row['Year1']."'  onKeyPress='return numbersonly(event, false)' /></td>"; 
		
		
		$data.="<td align='right'>
		<input name='curr_year[]' type='hidden' size='5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$row['Year2']."'  onKeyPress='return numbersonly(event, false)' /></td>"; 
		
		
		
		
		$data.="<td align='right'>
		<input name='curr_year[]' type='hidden' size='5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$row['Year3']."'  onKeyPress='return numbersonly(event, false)' /></td>"; 
		
		
		$data.="<td align='right'>
		
		<input name='curr_year[]' type='hidden' size='5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$row['Year4']."'  onKeyPress='return numbersonly(event, false)' /></td>"; 
		
		
		$data.="<td align='right'>
		<input name='curr_year[]' type='hidden' size='5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."' id='curr_year' />
		<input name='target[]' type='text' id='target".$a."' size='10' value='".$row['Year5']."'  onKeyPress='return numbersonly(event, false)' /></td>"; 
		
		
		
		
			$data.="</tr>";
		  $inc++;
		 $a++; 
		}
		
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


//---------------------Annual Targets Projects---------------------------
function edit_annualTarget($formvalues,$program,$project){
$obj= new xajaxResponse();

if($_SESSION['role']<>pagination::roleMgt(3)){
$obj->alert("Process Halted: Only M&E Personnel can Modify/Revise Annual Targets!");
return $obj;

}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed.Please Contact Your M&E Person to Open the Reporting period and Try Again!");
return $obj;
}



$_SESSION['indicator_type']='';
//$_SESSION['fyear']='';
//$_SESSION['program']='';
$_SESSION['subprogram']='';
//$_SESSION['project']='';

$_SESSION['indicator_type']=$indicator_type;
$_SESSION['target_type']=$typeoftarget;
//$_SESSION['program']=$program;
$_SESSION['subprogram']=$subprogram;
//$_SESSION['project']=$project;
$_SESSION['fyear']=$year;
$level1=array('ASARECA','Program','Project');
$program=($program==NULL)?$_SESSION['program_id']:$program;
$project=($project==NULL)?$_SESSION['project_id']:$project;
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
//$obj->alert($_SESSION['fyear']);
//".filter_annualTarget_2();
$data.="<form name='annualTarget1' id='annualTarget1' action='".$PHP_SELF."' method='post'><table cellspacing='1' id='report'      width='100%' ><tr>
              <th class='evenrow2' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='evenrow2'>&nbsp;</th>
              <th width='145' colspan='' class='evenrow2'>&nbsp;</th>
              <th colspan='10' class='evenrow2'>".$_SESSION['target_type']."  Annual Targets</th>
															</tr>
            <tr><th width='' class='evenrow2'>SELECT</th>
			
              <th width='' colspan='6' width='500' class='evenrow2'>Indicator</th>
             
				  <th width='' class='evenrow2'>Baseline</th>";
				  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<td width='100' class='evenrow2' align='right'>".$n."</td>";
					
					}
			  		$data.="</tr>";
$inc=1;

		

$qlP=QueryManager::ProjectGeneralQuery($program,$project);
#$obj->addAlert($_SESSION['name']);
$query_P=@mysql_query($qlP)or die(http("PR-1283"));


	  while($rowP=mysql_fetch_array($query_P)){


$data.="<tr class='evenrow' '".$events2."'><td colspan='15'><strong>".$rowP['project_code']." ".$rowP['title']."</strong></td></tr>";

//$obj->alert($formvalues['indicator_idAllworkplan']);

if(count($formvalues['indicator_idAllworkplan'])==0){
$obj->alert("Select Indicators For Setting/Editing Targets");
return $obj;
}
else

for($i=0;$i<count($formvalues['indicator_idAllworkplan']);$i++){

$x="SELECT w.`workplan_id` , i.`indicator_id` , i.`prog_id` , i.`project_id` , i.indicator_code, i.indicator_name, i.indicator_type,
 i.level_ofindicator, i.baseline, i.baseyear, 
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
sum( w.`Target` ) AS Target, w.`display`
FROM tbl_indicator i
left JOIN tbl_workplan w ON ( w.indicator_id = i.indicator_id )
WHERE i.level_ofindicator LIKE '".$level1[2]."%' 
&& i.indicator_id='".$formvalues['indicator_idAllworkplan'][$i]."'
&& i.prog_id='".$formvalues['prog_id'][$i]."'
&& i.project_id='".$formvalues['project_id'][$i]."'
GROUP BY i.`indicator_id`
ORDER BY i.indicator_code,w.`indicator_id`,w.prog_id, w.project_id, w.curr_year ASC";




//$obj->alert($x);
$query=@mysql_query($x)or die(http("WP-1086"));
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=number_format($row['baseline']);
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"grey";
		  
		  $l="align=right";
		  
		 
$data.="<tr class=$color>
 <td align=left>
 <INPUT type='checkbox' name='p_id[]'   id='p_id' value='".$row['indicator_id']."-".$row['prog_id']."-".$row['project_id']."' >
 
".$inc."</td>
            <td align=left>".
	 $row['indicator_code']."</td>
            <td colspan='5' width='50'>".retrieve_info_withSpecialCharacters($row['indicator_name'])."</td>
			<td>
			<INPUT type='hidden' name='indicator_idBaseline[]'  id='indicator_idBaseline' value='".$row['indicator_id']."' >
			<INPUT type='text' name='baselinevalue[]'  id='baselinevalue' value='".$row['baseline']."' ></td>";
			
			
			$data.="<td>
			 <INPUT type='hidden' name='loopkey1[]'   id='loopkey1' value='1' >
			 <INPUT type='hidden' name='project_id1[]'   id='poject_id1' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id1[]'   id='prog_id1' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr1[]'  id='indicator_idYr1' value='".$row['indicator_id']."' >
				  <INPUT type='hidden' name='curr_year1[]'   id='curr_year1' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."' >
			 <INPUT type=text name='targetYr1[]'  id='target1' value='".$row['Year1']."' ></td>";
			 
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey2[]'   id='loopkey2' value='1' >
			 <INPUT type='hidden' name='project_id2[]'   id='poject_id2' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id2[]'   id='prog_id2' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr2[]'  id='indicator_idYr2' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year2[]'   id='curr_year2' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."' >
			 <INPUT type=text name='targetYr2[]'  id='target2' value='".$row['Year2']."' ></td>";
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey3[]'   id='loopkey3' value='1' >
			 <INPUT type='hidden' name='project_id3[]'   id='poject_id3' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id3[]'   id='prog_id3' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr3[]'  id='indicator_idYr3' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year3[]'   id='curr_year3' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."' >
			 <INPUT type=text name='targetYr3[]'  id='target3' value='".$row['Year3']."' ></td>";
			
			$data.="<td>
			 <INPUT type='hidden' name='loopkey4[]'   id='loopkey4' value='1' >
			 <INPUT type='hidden' name='project_id4[]'   id='poject_id4' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id4[]'   id='prog_id4' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr4[]'  id='indicator_idYr4' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year4[]'   id='curr_year4' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."' >
			 <INPUT type=text name='targetYr4[]'  id='target4' value='".$row['Year4']."' ></td>";
			 
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey5[]'   id='loopkey5' value='1' >
			 <INPUT type='hidden' name='project_id5[]'   id='poject_id5' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id5[]'   id='prog_id5' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr5[]'  id='indicator_idYr5' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year5[]'   id='curr_year5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."' >
			 <INPUT type=text name='targetYr5[]'  id='target5' value='".$row['Year5']."' ></td>";
			$data.="</tr>";
$inc++;
		  }
		  
		  }
		}
		 //selectandDelete_all(15,'edit_annualTarget','annualTarget1','delete_target','workplan_id','','tbl_workplan','','').".noRecordsFound($query,11);
			$data.="</tr>";
		  $data.="<tr class='evenrow'>
              <td colspan='15' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget1'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function edit_annualTargetIndicator($indicator_id,$program,$project,$divindicator){
$obj= new xajaxResponse();

//$obj->alert($indicator_id."..,..".$program."..,..".$project);
if($_SESSION['role']<>pagination::roleMgt(3)){
$obj->alert("Process Halted: Only M&E Personnel can Modify/Revise Annual Targets!");
return $obj;

}
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed.Please Contact Your M&E Person to Open the Reporting period and Try Again!");
return $obj;
}



$_SESSION['indicator_type']='';
//$_SESSION['fyear']='';
//$_SESSION['program']='';
$_SESSION['subprogram']='';
//$_SESSION['project']='';

$_SESSION['indicator_type']=$indicator_type;
$_SESSION['target_type']=$typeoftarget;
//$_SESSION['program']=$program;
$_SESSION['subprogram']=$subprogram;
//$_SESSION['project']=$project;
$_SESSION['fyear']=$year;
$level1=array('ASARECA','Program','Project');
$program=($program==NULL)?$_SESSION['program_id']:$program;
$project=($project==NULL)?$_SESSION['project_id']:$project;
$div1=($div<>'')?$div:"bodyDisplay";
$n=1;
//$obj->alert($_SESSION['fyear']);
//".filter_annualTarget_2();
$data.="<form name='annualTarget1' id='annualTarget1' action='".$PHP_SELF."' method='post'><table cellspacing='1' id='report'      width='100%' ><tr>
              <th class='evenrow2' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='evenrow2'>&nbsp;</th>
              <th width='145' colspan='' class='evenrow2'>&nbsp;</th>
              <th colspan='10' class='evenrow2'>".$_SESSION['target_type']."  Annual Targets</th>
															</tr>
            <tr><th width='' class='evenrow2'>SELECT</th>
			
              <th width='' colspan='6' width='500' class='evenrow2'>Indicator</th>
             
				  <th width='' class='evenrow2'>Baseline</th>";
				  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  //or die(http("WP-00236"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<td width='100' class='evenrow2' align='right'>".$n."</td>";
					
					}
			  		$data.="</tr>";
$inc=1;

		

$qlP=QueryManager::ProjectGeneralQuery($program,$project);
#$obj->addAlert($_SESSION['name']);
$query_P=@mysql_query($qlP)or die(http("PR-1283"));


	  while($rowP=mysql_fetch_array($query_P)){


$data.="<tr class='evenrow' '".$events2."'><td colspan='15'><strong>".$rowP['project_code']." ".$rowP['title']."</strong></td></tr>";

//$obj->alert($formvalues['indicator_idAllworkplan']);

/* if(count($formvalues['indicator_idAllworkplan'])==0){
$obj->alert("Select Indicators For Setting/Editing Targets");
return $obj;
}
else */

//for($i=0;$i<count($formvalues['indicator_idAllworkplan']);$i++){

$x="SELECT w.`workplan_id` , i.`indicator_id` , i.`prog_id` , i.`project_id` , i.indicator_code, i.indicator_name, i.indicator_type,
 i.level_ofindicator, i.baseline, i.baseyear, 
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,
max(if((w.`curr_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'),w.`Target`,0)) as Year5,
sum( w.`Target` ) AS Target, w.`display`
FROM tbl_indicator i
left JOIN tbl_workplan w ON ( w.indicator_id = i.indicator_id )
WHERE i.level_ofindicator LIKE '".$level1[2]."%' 
&& i.indicator_id='".$indicator_id."'
&& i.prog_id='".$program."'
&& i.project_id='".$project."'
GROUP BY i.`indicator_id`
ORDER BY i.indicator_code,w.`indicator_id`,w.prog_id, w.project_id, w.curr_year ASC";


		$year1=currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0);
			$year2=	currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1);
				$year3=currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2);
				$year4=currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3);
				$year5=currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4);

			//$obj->alert($years[0]);
			$query=@mysql_query($x)or die(http("WP-1086"));
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=number_format($row['baseline']);
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"grey";
		  
		  $l="align=right";
		  
		 
$data.="<tr class=$color>
 <td align=left>
 <INPUT type='checkbox' name='p_id[]'   id='p_id' value='".$row['indicator_id']."-".$row['prog_id']."-".$row['project_id']."' >
 
".$inc."</td>
            <td align=left>".
	 $row['indicator_code']."</td>
            <td colspan='5' width='50'>".retrieve_info_withSpecialCharacters($row['indicator_name'])."</td>
			<td>
			<INPUT type='hidden' name='indicator_idBaseline[]'  id='indicator_idBaseline' value='".$row['indicator_id']."' >
			<INPUT type='text' name='baselinevalue[]'  id='baselinevalue' value='".$row['baseline']."' ></td>";
			
			
			$data.="<td>
			 <INPUT type='hidden' name='loopkey1[]'   id='loopkey1' value='1' >
			  <INPUT type='hidden' name='workplan_id1[]'   id='workplan_id1' value='".RetrieveDataCondtion2("tbl_workplan","indicator_id",$row['indicator_id'],"curr_year",$year1,"workplan_id")."' >
			 <INPUT type='hidden' name='project_id1[]'   id='poject_id1' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id1[]'   id='prog_id1' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr1[]'  id='indicator_idYr1' value='".$row['indicator_id']."' >
				  <INPUT type='hidden' name='curr_year1[]'   id='curr_year1' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."' >
			 <INPUT type=text name='targetYr1[]'  id='target1' value='".$row['Year1']."' ></td>";
			 
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey2[]'   id='loopkey2' value='1' >
			 
			  <INPUT type='hidden' name='workplan_id2[]'   id='workplan_id2'  value='".RetrieveDataCondtion2("tbl_workplan","indicator_id",$row['indicator_id'],"curr_year",$year2,"workplan_id")."' >
			 <INPUT type='hidden' name='project_id2[]'   id='poject_id2' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id2[]'   id='prog_id2' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr2[]'  id='indicator_idYr2' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year2[]'   id='curr_year2' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."' >
			 <INPUT type=text name='targetYr2[]'  id='target2' value='".$row['Year2']."' ></td>";
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey3[]'   id='loopkey3' value='1' >
			  <INPUT type='hidden' name='workplan_id3[]'   id='workplan_id3'  value='".RetrieveDataCondtion2("tbl_workplan","indicator_id",$row['indicator_id'],"curr_year",$year3,"workplan_id")."' >
			 <INPUT type='hidden' name='project_id3[]'   id='poject_id3' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id3[]'   id='prog_id3' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr3[]'  id='indicator_idYr3' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year3[]'   id='curr_year3' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."' >
			 <INPUT type=text name='targetYr3[]'  id='target3' value='".$row['Year3']."' ></td>";
			
			$data.="<td>
			 <INPUT type='hidden' name='loopkey4[]'   id='loopkey4' value='1' >
			  <INPUT type='hidden' name='workplan_id4[]'   id='workplan_id4'  value='".RetrieveDataCondtion2("tbl_workplan","indicator_id",$row['indicator_id'],"curr_year",$year4,"workplan_id")."' >
			 <INPUT type='hidden' name='project_id4[]'   id='poject_id4' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id4[]'   id='prog_id4' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr4[]'  id='indicator_idYr4' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year4[]'   id='curr_year4' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."' >
			 <INPUT type='text' name='targetYr4[]'  id='target4' value='".$row['Year4']."' ></td>";
			 
			 
			$data.="<td>
			 <INPUT type='hidden' name='loopkey5[]'   id='loopkey5' value='1' >
			 <INPUT type='hidden' name='workplan_id5[]'   id='workplan_id5'  value='".RetrieveDataCondtion2("tbl_workplan","indicator_id",$row['indicator_id'],"curr_year",$year5,"workplan_id")."' >
			  <INPUT type='hidden' name='project_id5[]'   id='poject_id5' value='".$row['project_id']."' >
 				<INPUT type='hidden' name='prog_id5[]'   id='prog_id5' value='".$row['prog_id']."' >
			 <INPUT type='hidden' name='indicator_idYr5[]'  id='indicator_idYr5' value='".$row['indicator_id']."' >
			  <INPUT type='hidden' name='curr_year5[]'   id='curr_year5' value='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."' >
			 <INPUT type='text' name='targetYr5[]'  id='target5' value='".$row['Year5']."' ></td>";
			$data.="</tr>";
$inc++;
		  }
		  
		  }
		//}
		 //selectandDelete_all(15,'edit_annualTarget','annualTarget1','delete_target','workplan_id','','tbl_workplan','','').".noRecordsFound($query,11);
			$data.="</tr>";
		  $data.="<tr class='evenrow'>
              <td colspan='15' align=right><input name='save' type='button' class='formButton2'id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetIndicator(xajax.getFormValues('annualTarget1'),'".$divindicator."');\" /></td>
          </tr></table></form>";
$obj->assign($divindicator,'innerHTML',$data);
return $obj;
}




//---------update annualtargets----------------------------------------------------------------
function update_annualTargetIndicator($formvalues,$divindicator){
$obj=new xajaxResponse();



//$obj->alert(count($formvalues['baselinevalue']));
//$obj->alert($formvalues['baselinevalue']);
for($x=0;$x<count($formvalues['baselinevalue']);$x++){
$indicator=$formvalues['indicator_idBaseline'][$x];
$baseline=$formvalues['baselinevalue'][$x];
$curr_year1=$formvalues['curr_year1'][$x];
//-------Baseline--------------
/* if($curr_year1=='2009'){ */
if(($baseline<>NULL)||($baseline==0)){
	$insert="
  UPDATE tbl_indicator set baseline='".$baseline."',
 updatedby='".$_SESSION['username']."' 
 where indicator_id='".$indicator."' ";
 //$obj->alert($insert);
$queryBaseline=@mysql_query($insert)or die(http("Edit-1049"));
	}
	//}
	
	
}
//$obj->alert(count($formvalues['loopkey1']));
//$obj->alert($formvalues['loopkey1']);
//-----------------Year1-----------
//-----------------Year1-----------
			for($x=0;$x<count($formvalues['loopkey1']);$x++){
						$indicator1=$formvalues['indicator_idYr1'][$x];
						$workplan_id1=$formvalues['workplan_id1'][$x];
						$target1=$formvalues['targetYr1'][$x];
						//$obj->alert($target1);
						$curr_year1=$formvalues['curr_year1'][$x];
						$prog_id1=($formvalues['prog_id1'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id1'][$x];
						$project_id1=($formvalues['project_id1'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id1'][$x];
					
							if($target1<>NULL){
									if($workplan_id1<>0)$insert1="UPDATE tbl_workplan 
												set 
												Target='".$target1."',
												lastUpdatedby='".$_SESSION['username']."'
												where workplan_id='".$workplan_id1."'";
												else $insert1="insert into tbl_workplan(workplan_id,indicator_id,curr_year,prog_id,project_id,Target,lastUpdatedby)
									values('".$workplan_id1."','".$indicator1."','".$curr_year1."','".$prog_id1."',
									'".$project_id1."','".$target1."','".$_SESSION['username']."') 	
									on Duplicate Key UPDATE  indicator_id='".$indicator1."',curr_year='".$curr_year1."', 
									prog_id='".$prog_id1."',
									project_id='".$project_id1."',
									Target='".$target1."',
									lastUpdatedby='".$_SESSION['username']."' 
									,workplan_id='".$workplan_id1."'";
								//$obj->alert($insert1);
								$queryIndicator=@mysql_query($insert1)or die(http("Edit-1102"));
			
							}
				
				
			}
//-----------------Year2-----------

for($x=0;$x<count($formvalues['loopkey2']);$x++){
$indicator2=$formvalues['indicator_idYr2'][$x];
$workplan_id2=$formvalues['workplan_id2'][$x];
$target2=$formvalues['targetYr2'][$x];
//$obj->alert($target1);
$curr_year2=$formvalues['curr_year2'][$x];
$prog_id2=($formvalues['prog_id2'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id2'][$x];
$project_id2=($formvalues['project_id2'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id2'][$x];

	if($target2<>NULL){
			
				if($workplan_id2<>0)$insert2="UPDATE tbl_workplan 
			set 
			Target='".$target2."',
			lastUpdatedby='".$_SESSION['username']."'
			where workplan_id='".$workplan_id2."'";
			else $insert2="insert into tbl_workplan(workplan_id,indicator_id,curr_year,prog_id,project_id,Target,lastUpdatedby)
									values('".$workplan_id2."','".$indicator2."','".$curr_year2."','".$prog_id2."',
									'".$project_id2."','".$target2."','".$_SESSION['username']."') 	
									on Duplicate Key UPDATE indicator_id='".$indicator2."',curr_year='".$curr_year2."', 
									prog_id='".$prog_id2."',
									project_id='".$project_id2."',
									Target='".$target2."',
									lastUpdatedby='".$_SESSION['username']."' 
									,workplan_id='".$workplan_id2."'";
//$obj->alert($insert2);
$queryIndicator=@mysql_query($insert2)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year3-----------
for($x=0;$x<count($formvalues['loopkey3']);$x++){
$indicator3=$formvalues['indicator_idYr3'][$x];
$workplan_id3=$formvalues['workplan_id3'][$x];
$target3=$formvalues['targetYr3'][$x];
//$obj->alert($target1);
$curr_year3=$formvalues['curr_year3'][$x];
$prog_id3=($formvalues['prog_id3'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id3'][$x];
$project_id3=($formvalues['project_id3'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id3'][$x];

	if($target3<>NULL){
			if($workplan_id3<>0)$insert3="UPDATE tbl_workplan 
			set 
			Target='".$target3."',
			lastUpdatedby='".$_SESSION['username']."'
			where workplan_id='".$workplan_id3."'";
			else $insert3="insert into tbl_workplan(workplan_id,indicator_id,curr_year,prog_id,project_id,Target,lastUpdatedby)
									values('".$workplan_id3."','".$indicator3."','".$curr_year3."','".$prog_id3."',
									'".$project_id3."','".$target3."','".$_SESSION['username']."') 	
									on Duplicate Key UPDATE indicator_id='".$indicator3."',curr_year='".$curr_year3."', 
									prog_id='".$prog_id3."',
									project_id='".$project_id3."',
									Target='".$target3."',
									lastUpdatedby='".$_SESSION['username']."' 
									,workplan_id='".$workplan_id3."'";
//$obj->alert($insert3);
$queryIndicator=@mysql_query($insert3)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year4-----------
for($x=0;$x<count($formvalues['loopkey4']);$x++){
$indicator4=$formvalues['indicator_idYr4'][$x];
$workplan_id4=$formvalues['workplan_id4'][$x];
$target4=$formvalues['targetYr4'][$x];
//$obj->alert($target1);
$curr_year4=$formvalues['curr_year4'][$x];
$prog_id4=($formvalues['prog_id4'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id4'][$x];
$project_id4=($formvalues['project_id4'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id4'][$x];

	if($target4<>NULL){
			if($workplan_id4<>0)$insert4="UPDATE tbl_workplan 
			set Target='".$target4."',
			lastUpdatedby='".$_SESSION['username']."'
			where workplan_id='".$workplan_id4."'";
			else $insert4="insert into tbl_workplan(workplan_id,indicator_id,curr_year,prog_id,project_id,Target,lastUpdatedby)
									values('".$workplan_id4."','".$indicator4."','".$curr_year4."','".$prog_id4."',
									'".$project_id4."','".$target4."','".$_SESSION['username']."') 	
									on Duplicate Key UPDATE indicator_id='".$indicator4."',
									curr_year='".$curr_year4."', 
									prog_id='".$prog_id4."',
									project_id='".$project_id4."',
									Target='".$target4."',
									lastUpdatedby='".$_SESSION['username']."' 
									,workplan_id='".$workplan_id4."'";
//$obj->alert($insert4);
$queryIndicator=@mysql_query($insert4)or die(http("Edit-1050"));

				}
	
	
}

//-----------------Year5-----------
for($x=0;$x<count($formvalues['loopkey5']);$x++){
$indicator5=$formvalues['indicator_idYr5'][$x];
$workplan_id5=$formvalues['workplan_id5'][$x];
$target5=$formvalues['targetYr5'][$x];
//$obj->alert($target1);
$curr_year5=$formvalues['curr_year5'][$x];
$prog_id5=($formvalues['prog_id5'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id5'][$x];
$project_id5=($formvalues['project_id5'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id5'][$x];

	if($target5<>NULL){
	
	
	
			if($workplan_id5<>0)$insert5="UPDATE tbl_workplan 
			set 
			Target='".$target5."',
			lastUpdatedby='".$_SESSION['username']."'
			where workplan_id='".$workplan_id5."'";
			else $insert5="insert into tbl_workplan(workplan_id,indicator_id,curr_year,prog_id,project_id,Target,lastUpdatedby)
									values('".$workplan_id5."','".$indicator5."','".$curr_year5."','".$prog_id5."',
									'".$project_id5."','".$target5."','".$_SESSION['username']."') 	
									on Duplicate Key UPDATE  
									indicator_id='".$indicator5."'
									,curr_year='".$curr_year5."', 
									prog_id='".$prog_id5."',
									project_id='".$project_id5."',
									Target='".$target5."',
									lastUpdatedby='".$_SESSION['username']."' 
									,workplan_id='".$workplan_id5."'";
//$obj->alert($insert5);
$queryIndicator=@mysql_query($insert5)or die(http("Edit-1050"));

				}
	
	
}

$obj->assign($divindicator,'innerHTML',congMsg("Details Updated!"));
//$obj->call("xajax_ViewAnnualTargets",'','','','','','',1,20);
return $obj;
}


function update_annualTargetExtended($formvalues){
$obj=new xajaxResponse();



//$obj->alert(count($formvalues['baselinevalue']));
//$obj->alert($formvalues['baselinevalue']);
for($x=0;$x<count($formvalues['baselinevalue']);$x++){
$indicator=$formvalues['indicator_idBaseline'][$x];
$baseline=$formvalues['baselinevalue'][$x];
$curr_year1=$formvalues['curr_year1'][$x];
//-------Baseline--------------
/* if($curr_year1=='2009'){ */
if(($baseline<>NULL)){
	$insert="insert into tbl_indicator(indicator_id,baseline) 
	 values('".$indicator."','".$baseline."') 
 on duplicate key UPDATE  baseline='".$baseline."',
 updatedby='".$_SESSION['username']."' ";
 //$obj->alert($insert);
$queryBaseline=@mysql_query($insert)or die(http("Edit-1049"));
	}
	//}
	
	
}
//$obj->alert(count($formvalues['loopkey1']));
//$obj->alert($formvalues['loopkey1']);
//-----------------Year1-----------
for($x=0;$x<count($formvalues['loopkey1']);$x++){
$indicator1=$formvalues['indicator_idYr1'][$x];
$target1=$formvalues['targetYr1'][$x];
//$obj->alert($target1);
$curr_year1=$formvalues['curr_year1'][$x];
$prog_id1=($formvalues['prog_id1'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id1'][$x];
$project_id1=($formvalues['project_id1'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id1'][$x];

	if(($target1<>NULL)||($target1==0)){
			$insert1="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator1."','".$curr_year1."','".$target1."','".$prog_id1."','".$project_id1."') 
			on duplicate key UPDATE indicator_id='".$indicator1."',curr_year='".$curr_year1."',prog_id='".$prog_id1."',project_id='".$project_id1."',Target='".$target1."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert2);
$queryIndicator=@mysql_query($insert1)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year2-----------

for($x=0;$x<count($formvalues['loopkey2']);$x++){
$indicator2=$formvalues['indicator_idYr2'][$x];
$target2=$formvalues['targetYr2'][$x];
//$obj->alert($target1);
$curr_year2=$formvalues['curr_year2'][$x];
$prog_id2=($formvalues['prog_id2'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id2'][$x];
$project_id2=($formvalues['project_id2'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id2'][$x];

	if(($target2<>NULL)||($target2==0)){
			$insert2="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator2."','".$curr_year2."','".$target2."','".$prog_id2."','".$project_id2."') 
			on duplicate key UPDATE indicator_id='".$indicator2."',curr_year='".$curr_year2."',prog_id='".$prog_id2."',project_id='".$project_id2."',Target='".$target2."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert2);
$queryIndicator=@mysql_query($insert2)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year3-----------
for($x=0;$x<count($formvalues['loopkey3']);$x++){
$indicator3=$formvalues['indicator_idYr3'][$x];
$target3=$formvalues['targetYr3'][$x];
//$obj->alert($target1);
$curr_year3=$formvalues['curr_year3'][$x];
$prog_id3=($formvalues['prog_id3'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id3'][$x];
$project_id3=($formvalues['project_id3'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id3'][$x];

	if(($target3<>NULL)||($target3==0)){
			$insert3="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator3."','".$curr_year3."','".$target3."','".$prog_id3."','".$project_id3."') 
			on duplicate key UPDATE indicator_id='".$indicator3."',curr_year='".$curr_year3."',prog_id='".$prog_id3."',project_id='".$project_id3."',Target='".$target3."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert3);
$queryIndicator=@mysql_query($insert3)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year4-----------
for($x=0;$x<count($formvalues['loopkey4']);$x++){
$indicator4=$formvalues['indicator_idYr4'][$x];
$target4=$formvalues['targetYr4'][$x];
//$obj->alert($target1);
$curr_year4=$formvalues['curr_year4'][$x];
$prog_id4=($formvalues['prog_id4'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id4'][$x];
$project_id4=($formvalues['project_id4'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id4'][$x];

	if(($target4<>NULL)||($target4==0)){
			$insert4="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator4."','".$curr_year4."','".$target4."','".$prog_id4."','".$project_id4."') 
			on duplicate key UPDATE indicator_id='".$indicator4."',curr_year='".$curr_year4."',prog_id='".$prog_id4."',project_id='".$project_id4."',Target='".$target4."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert4);
$queryIndicator=@mysql_query($insert4)or die(http("Edit-1050"));

				}
	
	
}

//-----------------Year5-----------
for($x=0;$x<count($formvalues['loopkey5']);$x++){
$indicator5=$formvalues['indicator_idYr5'][$x];
$target5=$formvalues['targetYr5'][$x];
//$obj->alert($target1);
$curr_year5=$formvalues['curr_year5'][$x];
$prog_id5=($formvalues['prog_id5'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id5'][$x];
$project_id5=($formvalues['project_id5'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id5'][$x];

	if(($target5<>NULL)||($target5==0)){
	//@mysql_query("delete from tbl_workplan where workplan_id=");
			$insert5="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator5."','".$curr_year5."','".$target5."','".$prog_id5."','".$project_id5."') 
			on duplicate key UPDATE indicator_id='".$indicator5."',curr_year='".$curr_year5."',prog_id='".$prog_id5."',project_id='".$project_id5."',Target='".$target5."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert5);
$queryIndicator=@mysql_query($insert5)or die(http("Edit-1050"));

				}
	
	
}





//for($z=0;$z<count($formvalues['loopkey']);$z++){
/* $indicator=$formvalues['indicator_idAll'][$z];
$baseline=$formvalues['baselinevalue'][$z];
//$workplan_id=$formvalues['workplan_id'][$z];
$total=$formvalues['target'][$z];
$curr_year=$formvalues['curr_year'][$z];
$prog_id=($formvalues['prog_id'][$z]==NULL)?$_SESSION['program_id']:$formvalues['prog_id'][$z];
$project_id=($formvalues['project_id'][$z]==NULL)?$_SESSION['project_id']:$formvalues['project_id'][$z]; */

//$obj->alert($total);
/*if($fyear==''){
$obj->alert("Missing year");
return $obj;

}
 if($total==''){
$obj->alert("Enter Total Yearly Value");
return $obj;

}
 */
 //&&($curr_year>$_SESSION['Activeyear']-1)
 
/*  if($baseline<>NULL){
 
 
 
// $obj->alert($insert);
 } */
 
/*  $insert="UPDATE tbl_workplan set baseline='".$baseline."',lastUpdatedby='".$_SESSION['username']."' 
			WHERE prog_id='".$prog_id."' 
			and project_id='".$project_id."'
			and curr_year='".$curr_year."'
			&& indicator_id='".$indicator."' ";
			
			$insert2="UPDATE tbl_workplan set Target='".$total."',lastUpdatedby='".$_SESSION['username']."' 
			WHERE prog_id='".$prog_id."' 
			and project_id='".$project_id."'
			and curr_year='".$curr_year."'
			&& indicator_id='".$indicator."' "; */

 

 
 
/* if(($total<>'')){
			$insert2="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator."','".$curr_year."','".$total."','".$prog_id."','".$project_id."') 
			on duplicate key UPDATE Target='".$total."',lastUpdatedby='".$_SESSION['username']."' ";
$obj->alert($insert2);
$queryIndicator=@mysql_query($insert2)or die(http("Edit-1050")); */

//}
//}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
//$obj->call("xajax_ViewAnnualTargets",'','','','','','',1,20);
return $obj;
}









//-----------------------------

//---------update annualtargets----------------------------------------------------------------
function update_annualTargetExtendedBackup111234($formvalues){
$obj=new xajaxResponse();



//$obj->alert(count($formvalues['baselinevalue']));
//$obj->alert($formvalues['baselinevalue']);
			for($x=0;$x<count($formvalues['baselinevalue']);$x++){
					$indicator=$formvalues['indicator_idBaseline'][$x];
					$baseline=$formvalues['baselinevalue'][$x];
					$curr_year1=$formvalues['curr_year1'][$x];
//-------Baseline--------------
/* if($curr_year1=='2009'){*/
if(($baseline<>NULL)){
				$insert="insert into tbl_indicator(indicator_id,baseline) 
				 values('".$indicator."','".$baseline."') 
			 on duplicate key UPDATE  baseline='".$baseline."',
			 updatedby='".$_SESSION['username']."' ";
			 //$obj->alert($insert);
			$queryBaseline=@mysql_query($insert)or die(http("Edit-1049"));
	}
	//}
	
	
}
//$obj->alert(count($formvalues['loopkey1']));
//$obj->alert($formvalues['loopkey1']);
//-----------------Year1-----------
			for($x=0;$x<count($formvalues['loopkey1']);$x++){
						$indicator1=$formvalues['indicator_idYr1'][$x];
						$workplan_id1=$formvalues['workplan_id1'][$x];
						$target1=$formvalues['targetYr1'][$x];
						//$obj->alert($target1);
						$curr_year1=$formvalues['curr_year1'][$x];
						$prog_id1=($formvalues['prog_id1'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id1'][$x];
						$project_id1=($formvalues['project_id1'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id1'][$x];
						
							if($target1<>NULL){
									$insert1=" UPDATE tbl_workplan set indicator_id='".$indicator1."',curr_year='".$curr_year1."',prog_id='".$prog_id1."',project_id='".$project_id1."',Target='".$target1."',lastUpdatedby='".$_SESSION['username']."'  where workplan_id='".$workplan_id1."'";
						$obj->alert($insert1);
						$queryIndicator=@mysql_query($insert1)or die(http("Edit-1102"));
			
							}
				
				
			}
//-----------------Year2-----------

for($x=0;$x<count($formvalues['loopkey2']);$x++){
$indicator2=$formvalues['indicator_idYr2'][$x];
$workplan_id2=$formvalues['workplan_id2'][$x];
$target2=$formvalues['targetYr2'][$x];
//$obj->alert($target1);
$curr_year2=$formvalues['curr_year2'][$x];
$prog_id2=($formvalues['prog_id2'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id2'][$x];
$project_id2=($formvalues['project_id2'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id2'][$x];

	if($target2<>NULL){
			$insert2="UPDATE tbl_workplan set indicator_id='".$indicator2."',curr_year='".$curr_year2."',prog_id='".$prog_id2."',project_id='".$project_id2."',Target='".$target2."',lastUpdatedby='".$_SESSION['username']."'   where workplan_id='".$workplan_id2."'";
$obj->alert($insert2);
$queryIndicator=@mysql_query($insert2)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year3-----------
for($x=0;$x<count($formvalues['loopkey3']);$x++){
$indicator3=$formvalues['indicator_idYr3'][$x];
$workplan_id3=$formvalues['workplan_id3'][$x];
$target3=$formvalues['targetYr3'][$x];
//$obj->alert($target1);
$curr_year3=$formvalues['curr_year3'][$x];
$prog_id3=($formvalues['prog_id3'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id3'][$x];
$project_id3=($formvalues['project_id3'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id3'][$x];

	if($target3<>NULL){
			$insert3="UPDATE tbl_workplan set indicator_id='".$indicator3."',curr_year='".$curr_year3."',prog_id='".$prog_id3."',project_id='".$project_id3."',Target='".$target3."',lastUpdatedby='".$_SESSION['username']."'   where workplan_id='".$workplan_id3."'";
$obj->alert($insert3);
$queryIndicator=@mysql_query($insert3)or die(http("Edit-1050"));

				}
	
	
}
//-----------------Year4-----------
for($x=0;$x<count($formvalues['loopkey4']);$x++){
$indicator4=$formvalues['indicator_idYr4'][$x];
$workplan_id4=$formvalues['workplan_id4'][$x];
$target4=$formvalues['targetYr4'][$x];
//$obj->alert($target1);
$curr_year4=$formvalues['curr_year4'][$x];
$prog_id4=($formvalues['prog_id4'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id4'][$x];
$project_id4=($formvalues['project_id4'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id4'][$x];

	if($target4<>NULL){
			$insert4="UPDATE tbl_workplan set indicator_id='".$indicator4."',curr_year='".$curr_year4."',prog_id='".$prog_id4."',project_id='".$project_id4."',Target='".$target4."',lastUpdatedby='".$_SESSION['username']."'   where workplan_id='".$workplan_id4."'";
$obj->alert($insert4);
$queryIndicator=@mysql_query($insert4)or die(http("Edit-1050"));

				}
	
	
}

//-----------------Year5-----------
for($x=0;$x<count($formvalues['loopkey5']);$x++){
$indicator5=$formvalues['indicator_idYr5'][$x];
$workplan_id5=$formvalues['workplan_id5'][$x];
$target5=$formvalues['targetYr5'][$x];
//$obj->alert($target1);
$curr_year5=$formvalues['curr_year5'][$x];
$prog_id5=($formvalues['prog_id5'][$x]==NULL)?$_SESSION['program_id']:$formvalues['prog_id5'][$x];
$project_id5=($formvalues['project_id5'][$x]==NULL)?$_SESSION['project_id']:$formvalues['project_id5'][$x];

	if($target5<>NULL){
			$insert5="UPDATE tbl_workplan set indicator_id='".$indicator5."',curr_year='".$curr_year5."',prog_id='".$prog_id5."',project_id='".$project_id5."',Target='".$target5."',lastUpdatedby='".$_SESSION['username']."' where workplan_id='".$workplan_id5."' ";
$obj->alert($insert5);
$queryIndicator=@mysql_query($insert5)or die(http("Edit-1050"));

				}
	
	
}



$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
//$obj->call("xajax_ViewAnnualTargets",'','','','','','',1,20);
return $obj;
}
//--------------------------------








//-----------------edit-indicator_Definition---------------------------------------------------
function edit_indicatorDefinition($indicator_id,$level){
$obj=new xajaxResponse();

//$level1=array('ASARECA','Program','Project');
$data="";

    $data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'>
	 <fieldset class='evenrowBorder'>
	 <table cellspacing='0'  id='report' width='100%' border='0'>
	 <tr><th>HIGH LEVEL INDICATORS</th>
	 
	 <th>Primary INDICATORS</th>
	 
	 </tr>";

$n=1;
	 $x=1;
	
	  $sql="select * FROM tbl_indicator where indicator_id='".$indicator_id."'";
	  #$obj->alert($sql);
$qr=@mysql_query($sql) or die(http("ED-0017"));

while($rowD=mysql_fetch_array($qr)){
	$data.="
	<tr>
  <td width='' align='left' valign='top'><select name='parent_indicator' id='indicator_id' size='20'style='width:300px;' onchange=''>";
//$data.=QueryManager::IndicatorFilter($programID=$rowD['indicator_id'],$mappingType=LookupData($code=1,3));
$data.="<option value=\"".RetrieveData($table='tbl_indicator',$condition='indicator_id',$value=$rowD['indicator_id'],$returnValue1='indicator_id')."\"  selected='selected'>
".RetrieveData($table='tbl_indicator',$condition='indicator_id',$value=$rowD['indicator_id'],$returnValue1='indicator_name')."</option>";
	$data.="</select></td><td>
	 
   <frame width='300' height='500' scroll='Yes'>
   <table cellspacing='1'>
 <th>Mapping Type<img src='' width='50' height='0'></th>
   <th>Data Source<img src='' width='100' height='0'></th>
   <th>Result<img src='' width='200' height='0'></th>
	 <th>Sub-Activity<img src='' width='300' height='0'></th>

	 <th>Indicator<img src='' width='300' height='0'></th>      ";
	
  
  
  
		$queryPrimary=@Execute("select * FROM 
		   tbl_indicator 
		   where mapping_type='Primary'
		   group by indicator_id
		   order by indicator_name asc")or die(http("ED-1821"));
		 
		   while($rowPrimary=@mysql_fetch_array($queryPrimary)){ 
   		  #$obj->alert("select * FROM tbl_indicator_definition where indicator_id='".$rowD['indicator_id']."'");
		  $queryDF=@Execute("select * FROM tbl_indicator_definition where  indicator_id='".$rowD['indicator_id']."' and DefName='".$rowPrimary['indicator_id']."'")or die(http("ED-1831"));	
			$rowDF=@mysql_fetch_array($queryDF);
			//$cA1=($rowPrimary['indicator_id']==$rowDF['DefName'])?"checked":"";
			$cA=(strpos($rowPrimary['indicator_id'], $rowDF['DefName']) !==false)?"checked":"";
			#$obj->alert("select * FROM tbl_indicator_definition where indicator_id='".$rowPrimary['indicator_id']."'");
	
			$xx=($rowPrimary['indicator_id']==$rowDF['DefName'])?"checked":"";  
			
			$data.="<tr><td width='' colspan='' class='evenrow'>
			<input name='loopkey[]' id='loopkey' value='1' type='hidden' size='40'>
			<input name='defn_id[]' id='defn_id' value=\"".$rowDF['defn_id']."\" type='hidden' size='40'>
			<strong>$rowPrimary[mapping_type]</strong>	</td>
			<td class='evenrow'><strong>$rowPrimary[indicator_type]</strong></td>
			<td class='evenrow'>$rowPrimary[physical_target]</td>
			<td  class='evenrow'>".RetrieveData($table='tbl_subactivity',$condition='subact_id',$value=$rowPrimary['subactivity_id'],$returnValue1='subactivity_name')."</td>
			<td class='evenrow'><input name='indicator_id[]' id='indicator_id' value='".$rowPrimary['indicator_id']."'  ".$xx." type='checkbox' size='40'>$rowPrimary[indicator_name]</td></tr>";
	
	} 
   
$data.="</table></frame>
</td>
  </tr>";
  

   
  $n++;
  }

			
			 $data.="
              <tr class='evenrow'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right' colspan=3><input type='button' name='save_indicatorDefinition' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicatorDefinition(xajax.getFormValues('indicator13'),'".$level."');return false;\" /></td>
            
              </tr>
             
    </table>  </fieldset></form>";		 
					  
				
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

//-----------------------update tbl_indicator_defn---------------------------------------------------

#------------------update indicatorDefinition--------------------------------------------------------






//--------------------mer layout setup---------------------------------------------------------

//----------------------update supergoal---------------------------

function edit_supergoal($formvalues){
$obj=new xajaxResponse();
$data="<form action='".$PHP_SELF."' method='post' name='edit_supergoal' id='edit_supergoal' ><table width='557' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Supergoal</div>
         <div style='float:right;'><input type='button' class='formButton2'name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
        </tr>";
for($m=0;$m<count($formvalues['supergoal_id']);$m++){
$prog_id=$formvalues['supergoal_id'][$m];

$x="select * from tbl_supergoal where id='".$prog_id."' order by id asc";
//$obj->addAlert($x);
$query=@mysql_query($x)or die(http("Edit-514"));
 
while($row=@mysql_fetch_array($query)){
      
       $data.="<tr>
          <td colspan='4' class='black'><hr/></td>
        </tr>
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table border='0'> <tr>
                <td>Super Goal Code:<input name='supergoal_id[]' type='hidden'  id='supergoal_id' value='$row[id]' size='50' /></td>
                <td><input name='code[]' type='text'  id='code' value='$row[component_code]' size='50' /></td>
              </tr>
              <tr>
                <td>Super Goal:</td>
                <td><INPUT TYPE='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'>
				<textarea name='pname[]' id='pname' cols='48' rows='3'>$row[component]</textarea>
				</td>
              </tr>
             
			  <tr>
                <td>Implementing Organization:</td>
                <td><input name='implementing_org[]' type='text'  id='implementing_org' value='".$row['implementing_org']."' size='50' /></td>
              </tr>
             
			  <tr>
                <td>Sources of verification:</td>
                <td><textarea name='verification_sources[]' id='verification_sources' cols='48' rows='3'>$row[verification_sources]</textarea></td>
              </tr>
			  <tr>
                <td>Assumptions:</td>
                <td><textarea name='assumptions[]' id='assumptions' cols='48' rows='3'>$row[assumptions]</textarea></td>
              </tr>
			   <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='48' rows='3'>$row[description]</textarea></td>
              </tr>
             ";
            

		   }
		   }
		  
		   $data.=" <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' class='formButton2'name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_supergoal(xajax.getFormValues('edit_supergoal'));\"></td>
              </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;


}


function update_supergoal($formvalues){
$obj=new xajaxResponse();
if(count($formvalues['supergoal_id'])>0){
for($i=0;$i<count($formvalues['supergoal_id']);$i++){

$prog_id=$formvalues['supergoal_id'][$i];
$pname=$formvalues['pname'][$i];
$code=$formvalues['code'][$i];
$implementing_org=$formvalues['implementing_org'][$i];
$verification_sources=$formvalues['verification_sources'][$i];
$assumptions=$formvalues['assumptions'][$i];
$pdesc=$formvalues['pdescription'][$i];
$x1="select * from tbl_supergoal where id='".$prog_id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
#$obj->addAlert($x);
if(@mysql_num_rows($select)>0){
$x="update tbl_supergoal set 
component ='".$pname."',
component_code='".$code."',
implementing_org='".$implementing_org."',
verification_sources='".$verification_sources."',
assumptions='".$assumptions."',
description='".$pdesc."' where id='".$prog_id."'";
@mysql_query($x) or die(http("ED-0159"));

//$xrow=mysql_fetch_array(mysql_query($x1))or die(http("ED-188"));
//audit info----
//$table_pk_id='id';
/* $ch=@mysql_fetch_array(@mysql_query("SELECT concat_ws( prog_id, program_name,Funder,details ) as changed_from
FROM `tbl_supergoal`
WHERE id ='".$prog_id."'")) or die(http("ED-0183"));
$changed_from=$ch['changed_from']; */
$columnsChanged="prog_id,component_code,component,implementing_org,verification_sources,assumptions,description";
$changed_from=pagination::get_ColumnsChanged($columnsChanged,'tbl_supergoal','id',$prog_id);
$changed_to=$prog_id."-".$code."-".$pname."-".$implementing_org."-".$verification_sources."-".$assumptions."-".$pdesc;
$obj->addEvent('','onsubmit',audit_trail("prog_id",$prog_id,$x,"tbl_supergoal",$changed_from,$changed_to));

//---------end of audit info---
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated"));
$obj->call("xajax_view_supergoal",'','','','','','');
}else 
{
$obj->assign('bodyDisplay','innerHTML',errorMsg("Details Could not be Updated! Please Try again Later!"));
}
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

            
                      
          
                      <td height='103' COLSPAN=4 ALIGN='right'><input name='back'  value='Cancel' class='button_width' onclick=\"xajax_view_subcomponent('','','','')\" type='button' class='formButton2'/> | <input type='button' class='formButton2'name='save_subcomponent' class='button_width' id=save_subcomponent value=Save onclick=\"xajax_update_subcomponent(xajax.getFormValues('subcomponent'))\"></td>
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
$data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
        <tr>
          <td colspan='4' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; Editing Programme</div>
         <div style='float:right;'><input type='button' class='formButton2'name='back' title='back' value='Back' onclick=\"xajax_view_programme('','');return false;\"></div></td>
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
                <td><input name='pcode[]' type='text' id='pcode' value='".$row['program_id']."' size='50' /></td>
              </tr>
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
                <td align=right><input type='button' class='formButton2'name='button' id='button' value='Save' class='button_width' onclick=\"xajax_update_programme(xajax.getFormValues('programme'));\"></td>
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
$imp_org=$formvalues['imp_org'][$i];
$pdesc=$formvalues['pdescription'][$i];
$x1="select * from tbl_programme where prog_id='".$prog_id."'";

$select=@mysql_query($x1)or die(http("ED-192"));
#$obj->addAlert($x);
if(mysql_num_rows($select)>0){
$x="update tbl_programme set program_name='".$pname."',program_id='".$pcode."',Funder='".$pfunder."',imp_org='".$imp_org."',details='".$pdesc."' where prog_id='".$prog_id."'";
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

//==================edit output========================================
function edit_output($formvalues){
$obj=new xajaxResponse();

 
$data.="<form name='output' id='output' method=post><table border='0'><tr
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>";
	
	for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];

$q=mysql_query("select * from tbl_output where display like 'Yes%' and  output_id='".$output_id."'")or die(mysql_error());
while($row=mysql_fetch_array($q)){
	
$data.="<tr>
    <td colspan='2'><hr></td></tr>
<tr>
                <td>Level of Output :</td>
                <td><select name='supergoaltype[]' id='supergoaltype' class='combobox2'  return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-620"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($row['type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			  
			   $data.="<tr>
                <td>Program:</td>
                <td><select name='cprogramme[]' id='cprogramme' class='combobox2' ><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					$query=@mysql_query("select * from tbl_programme  order by prog_id")or die(mysql_error());
					while($rowp=@mysql_fetch_array($query)){
					$selecd=($rowp['prog_id']==$row['prog_id'])?"selected":"";
					$data.="<option value=\"".$rowp['prog_id']."\" ".$selecd." >".$row['program_id']."  ".pagination::insert_info_withSpecialCharacters($rowp['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram[]' id='subprogram' class='combobox2' ><option value=''>-select-</option>";
				$sql="select * from tbl_subcomponent where display like 'Yes%' order by subcomponent_code asc";
				
					  $querysc=@mysql_query($sql)or die(@mysql_error());
					while($rowsc=@mysql_fetch_array($querysc)){
					$selecdsc=($rowsc['subcomponent_id']==$row['subprog_id'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".pagination::insert_info_withSpecialCharacters($rowsc['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project[]' id='project' class='combobox2'><option value=''>-select-</option>";
				$sql2="select * from tbl_project where  display like 'Yes%' order by project_code,title asc";
				//$obj->alert($sql2);
					  $query=@mysql_query($sql2)or die(@mysql_error());
					while($rowpp=@mysql_fetch_array($query)){
					$sel=($rowpp['id']==$row['project_id'])?"selected":"";
					$data.="<option value=\"".$rowpp['id']."\" ".$sel.">".$rowpp['project_code']."  ".pagination::insert_info_withSpecialCharacters($rowpp['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			   <tr>
    <td>Output Code</td>
    <td><input type='hidden' name='output_id[]' id='output_id' size='80' value='".$row['output_id']."' />
	<input type='text' name='output_code[]' id='output_code' size=60 value='".$row['output_code']."' />";
	
	$data.="</td>
  </tr>
  <tr>
    <td>Output Name </td>
    <td><label>
	<textarea name='oname[]' id='oname' cols='52' row='3' />".pagination::insert_info_withSpecialCharacters($row['output_name'])."</textarea>
  
    </label></td>
  </tr>
   <tr>
                <td> Sources of Verification:</td>
                <td><textarea name='verification_sources[]' id='verification_sources' cols='52' row='3' />".pagination::insert_info_withSpecialCharacters($row['verification_sources'])."</textarea></td>
              </tr>
              <tr>
                <td>Assumptions:</td>
                <td><textarea name='assumptions[]' id='assumptions' cols='52' rows='3'>".pagination::insert_info_withSpecialCharacters($row['assumptions'])."</textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription[]' id='pdescription' cols='52' rows='3'>".pagination::insert_info_withSpecialCharacters($row['description'])."</textarea></td>
              </tr>";
			 
  

  
  }
} 
  
	$data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' class='formButton2'name='output' id='output' value='Save' onclick=\"xajax_update_output(xajax.getFormValues('output'))\">
        </p>
      </div></td>
  </tr>
</table></form>";
 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function update_output($formvalues){
$obj=new xajaxResponse();
if(count($formvalues['output_id'])){
 for($m=0;$m<count($formvalues['output_id']);$m++){
 $output_id=$formvalues['output_id'][$m];
$program=get_Stringorg($formvalues['program']);
$prog_id=$formvalues['cprogramme'][$m];
$ocomponent=$formvalues['ocomponent'][$m];
$subcomponent=$formvalues['subprogram'][$m];
$output_code=$formvalues['output_code'][$m];
$oname=$formvalues['oname'][$m];
$details=$formvalues['odesc'][$m];
$project=$formvalues['project'][$m];
$verification_sources=$formvalues['verification_sources'][$m];
$assumptions=$formvalues['assumptions'][$m];
$pdescription=$formvalues['pdescription'][$m];


if($oname==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Output Name</li>"));
return $obj;
}
$q=@mysql_query("select * from tbl_output where output_id='".$output_id."'")or die(http("ED-296"));
if(@mysql_num_rows($q)>0){
$query="update tbl_output set prog_id='".$prog_id."',
subprog_id='".$subcomponent."',
project_id='".$project."',
output_code='".pagination::insert_info_withSpecialCharacters($output_code)."',
output_name='".pagination::insert_info_withSpecialCharacters($oname)."',
verification_sources='".pagination::insert_info_withSpecialCharacters($verification_sources)."'
,assumptions='".pagination::insert_info_withSpecialCharacters($assumptions)."',
description='".pagination::insert_info_withSpecialCharacters($pdescription)."'
 where output_id='".$output_id."'";
#$obj->alert($query);
@mysql_query($query)or die(http("ED-0304"));


//=========audit trail info===================
$ch=@mysql_fetch_array(@mysql_query("SELECT concat_ws( output_id, output_code, output_name,program ) as changed_from
FROM `tbl_output`
WHERE output_id ='".$output_id."'")) or die(http("ED-0183"));
$changed_from=$ch['changed_from'];
$changed_to=$output_id."-".$output_code."-".$oname."-".$program;
$obj->addEvent('','onsubmit',audit_trail("output_id",$output_id,$$x,"tbl_output",$changed_from,$changed_to));

//---------end of audit info---

}}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_output",'','','','',1,20);

}else {
$obj->assign('bodyDisplay','innerHTML',errorMsg("Details could not be updated Updated!"));
}


return $obj;
}


function edit_indicator($formvalues,$indicatorLevel){
$obj=new xajaxResponse();
 
$data.="<form name='indicator13' id='indicator13' action='".$PHP_SELF."'><table >";





if($indicatorLevel==NULL)
		{
		$obj->alert("Please Select The Level of Indicator You are trying to edit");
		return $obj;
		}


for($i=0;$i<count($formvalues['indicator_idAll']);$i++){
$sel="select * from tbl_indicator where indicator_id='".$formvalues['indicator_idAll'][$i]."'";
//$obj->alert($sel);
$queryedit=Execute($sel)or die(http("ED-0301"));
while($rowedit=mysql_fetch_array($queryedit)){

//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."',this.value,'".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					$data.="<tr class=''>
                      <td colspan='3'><hr></td></tr
					<tr class='evenrow3'>
                      <td>Super Goal</td>
                      <td>";
					
	 $data.="<select name='supergoal[]' id='supergoal' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE=''>-N/A-</OPTION>";
			
					  $querysp=@mysql_query('select * from tbl_supergoal order by component asc')or die(http("VP-2268"));
					 while($rowsp=mysql_fetch_array($querysp)){
					 $selectedsp=$rowsp['id']==$rowedit['supergoal_id']?"SELECTED":$_SESSION['supergoal'];
					   $data.="<option value=\"".$rowsp['id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowsp['component'])."</option>";
				
					   }
					  
$data.="</select>";
			//onchange=\"xajax_edit_indicator(this.value,'".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
			
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator[]'  id='type_ofindicator' class='combobox2'  />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					
					   $queryt=@mysql_query("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-2284"));	
					   
					   while($rowt=mysql_fetch_array($queryt)){
					 $selected2=($rowt['codeName']==$rowedit['indicator_type'])?"SELECTED":$_SESSION['indicator_type'];
					 $data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".retrieve_info_withSpecialCharacters($rowt['codeName'])."</option>";
					   }	
					  //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."','','',this.value,'','".$formvalues."');return false;\"
					  $data.=" </select></td>
                    </tr >
					<tr class='evenrow3'>
                      <td>Level of Indicator</td>
                      <td><select name='Level_ofindicator[]'  id='Level_ofindicator' class='combobox2'  />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					   $queryt=@mysql_query("select * from tbl_lookup where classCode='24' order by codeName asc")or die(http("VP-2298"));	
					  
					   while($rowl=@mysql_fetch_array($queryt)){
					 $selectedl=$rowl['codeName']==$rowedit['level_ofindicator']?"SELECTED":$_SESSION['indicator_level'];
					 $data.="<option value=\"".$rowl['codeName']."\" ".$selectedl.">".retrieve_info_withSpecialCharacters($rowl['codeName'])."</option>";
					   }
					   
			$data.="</select></td>
                    </tr>";
					//--------------------------------------------
					$data.="<tr class='evenrow3'>
                      <td>Goal</td>
                      <td>";
					//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."',this.value,'".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\" 
					  $data.="<select name='goal[]' id='goal' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal  order by prog_id asc")or die(http("VP-2862"));

					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$rowedit['goal_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".$rowg['prog_id']." ".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
				
					   }
					  
				
					  $data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Purpose</td>
                      <td>";
					//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					  $data.="<select name='component[]' id='component' class='combobox2'    ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose  order by prog_id asc")or die(http("VP-2877"));
		
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$rowedit['purpose_id']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".$rows['prog_id']." ".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				
				
				$data.="</select>";//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\" 
					$data.="</td>
                    </tr>
			<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id[]' id='output_id' class='combobox2'    ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_output order by output_code")or die(http("VP-1320"));
					
						   while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$rowedit['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".retrieve_info_withSpecialCharacters($rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";
//onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					$data.="<select name='prog_id[]' id='prog_id' class='combobox2'    ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by prog_id,program_name")or die(http("VP-1874"));
				
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$rowedit['prog_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['prog_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
						 
					      //onchange=\"xajax_edit_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."','".$formvalues."');return false;\"
					  $data.="</select></td>
                    </tr>
                  
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component[]' id='sub_component' class='combobox2'      ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
				
		while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$rowedit['subcomponent_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				  
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project[]' id='project' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where display like 'Yes%' order by title asc")or die(http("VP-1543"));
			
					 while($rowpj=mysql_fetch_array($querypj)){
					 $selected=$rowpj['id']==$rowedit['project_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters(strtolower($rowpj['title']))."</option>";
				
					   }
					     
					      
					  $data.="</select></td></tr>";
					  
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id[]' id='indicator_id' type='hidden' value='".$rowedit['indicator_id']."' /><input name='indicator_code[]' type='text' id='indicator_code' size='50' value='".$rowedit['indicator_code']."' /></td>
</tr>
    <tr><td>Indicator Name:</td><td><textarea name='indicator[]' class='combobox2' type='text' id='indicator1' cols='45' rows='3' >".retrieve_info_withSpecialCharacters($rowedit['indicator_name'])."</textarea></td></tr>";

	$data.="<tr><td>Gender Disaggregation:</td><td><select name='gender1[]' id='gender1' class='combobox2' ><option value=''>-select-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("ED-390"));
while($rowg=mysql_fetch_array($SEL)){
$sel=($rowg['codeName']==$rowedit['disaggregation'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select></td></tr>
  <tr class='evenrow3'><td>Responsible</td><td><select name='reponsible[]' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("ED-400"));
	while($row13=mysql_fetch_array($q)){
	$sel=(retrieve_info_withSpecialCharacters($row13['group_name'])==retrieve_info_withSpecialCharacters($rowedit['responsible']))?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	<tr><td>Expected Output</td><td><select name='output[]' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("ED-400"));
	while($row13=mysql_fetch_array($q)){
	$selo=($rowo['codeName']==$rowedit['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency[]' class='combobox2' ><option value='' >-Select-</option>";
	$q4=@Execute("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	$sel14=(retrieve_info_withSpecialCharacters($row14['codeName'])==retrieve_info_withSpecialCharacters($rowedit['frequency_of_reporting']))?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel14."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>
	
	
	
	
	
	<tr class='evenrow'>
	 <td>Unit of Measure:</td><td><select name='unitofmeasure[]'  id='unitofmeasure' class='combobox2' ><option value='' >-Select-</option>";
	 
	$q4=mysql_query("select * from  tbl_lookup 
					where classCode='40' 
					order by codeName asc") or die(http("VP-1957"));
				while($row14=mysql_fetch_array($q4)){
			$sel=($row14['codeName']==$row['unitofmeasure'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>
			".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>
	
	";
			
			
			}
			
			
			
			
	}
			 $data.="
			 
			 <tr class='evenrow3'>
                      <td colspan=2><div id='status'></div></td></tr>
			 <tr class='evenrow'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right'><button  name='save_indicator' type='button' class='formButton2'id='save_indicator' value='Save' class='button_width' onclick=\"xajax_update_indicator(xajax.getFormValues('indicator13'));\" />Save</button></td>
            
              </tr>
             
    </table>"; $data.="</form>";		 
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
$project=$formvalues['project'][$i];
//$obj->alert($prog_id);

$component=trim($formvalues['component'][$i]);
$supergoal_id=trim($formvalues['supergoal'][$i]);
$goal_id=trim($formvalues['goal'][$i]);
$subcomponent=$formvalues['sub_component'][$i];
$output_id=trim($formvalues['output_id'][$i]);
$typeofindicator=trim($formvalues['type_ofindicator'][$i]);
$Level_ofindicator=trim($formvalues['Level_ofindicator'][$i]);
$responsible=trim($formvalues['reponsible'][$i]);
$expected_output=trim($formvalues['output'][$i]);
$indicator_id=$formvalues['indicator_id'][$i];
$indicator_code=trim($formvalues['indicator_code'][$i]);
$indicator=trim($formvalues['indicator'][$i]);
$gender=trim($formvalues['gender1'][$i]);
$frequency_of_reporting=trim($formvalues['frequency'][$i]);
$unitofmeasure=trim($formvalues['unitofmeasure'][$i]);
//$output=trim($formvalues['output_id'][$i]);

/*  if(mysql_num_rows(mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' and prog_id='".$prog_id."' "))>0){
$obj->alert("Process Halted! Indicator Code ".$indicator_code." Already Exists");
return $obj;}
  */

$xx="update tbl_indicator
 set supergoal_id = '".$supergoal_id."',
 goal_id='".$goal_id."',prog_id = '".$prog_id."'
 ,project_id = '".$project."',
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
 ,frequency_of_reporting='".$frequency_of_reporting."',
 unitofmeasure='".mysql_real_escape_string($unitofmeasure)."'
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
function edit_TSOqualitativeReporting2($narrative_id,$quarter,$div,$project_id){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;
}

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'><table width='700' border='0'><TR><td colspan=2><hr ></td></TR>
	  <TR><td colspan=2><div id='status'></div></td></TR>";
	 # $obj->addAlert(count($formvalues['loopkey']));
//for($i=0;$i<count($narrative_id);$i++){
#$narrative_id=$formvalues['narrative_id'][$i];
$select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
$data.="<tr>
          <td width='30%'>
          <div align='left'><strong>Project</strong></div></td>
          <td>";
		  $sql="select * from tbl_project where id='".$project_id."' and display like 'Yes%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("Edit-2976"));
		  $ROW=mysql_fetch_array($query) or die(http(0030));
		
		  $data.="<input name='intervention' id='intervention' value='".$ROW['id']."' type='hidden' ><strong>".substr($ROW['title'],0,500)."</strong></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>Executive Summary</strong><em>[0.5 page]</em></div></td>
          <td><input type='hidden' name='narrative_id' id='narrative_id' value='".$row['narrative_id']."'><textarea name='plannedActivities'  cols='100' rows='5'  onKeyDown=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\" onKeyUp=\"limitText(this.form.plannedActivities,this.form.countdownplannedActivities,500);\">".$row['executive_summary']."</textarea>&nbsp;You have <input readonly type='text' name='countdownplannedActivities' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
      <tr>
          <td>
          <div align='left'><strong>1.0 Introduction</strong><em>(0.5 page)</em></div></td>
          <td><textarea name='introduction' id='introduction' cols='100' rows='5' onKeyDown=\"limitText(this.form.introduction,this.form.countdownintroduction,500);\" onKeyUp=\"limitText(this.form.introduction,this.form.countdownintroduction,500);\">".$row['Introduction']."</textarea>You have <input readonly type='text' name='countdownintroduction' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>";
		
		
        $data.="<tr>
          <td>
          <div align='left'><strong>2.0 Project Progress </strong><em>(Maximum 3 pages)</em></div></td>
          <td><textarea name='achievements' id='achievements' cols='100' rows='5'  onKeyDown=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\" onKeyUp=\"limitText(this.form.achievements,this.form.countdownachievements,3000);\">".$row['project_progress']."</textarea>You have <input readonly type='text' name='countdownachievements' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>3.0 Contribution to Program Purpose </strong><em>[Max 3 pages]</em></div></td>
          <td><textarea name='deviations' id='deviations' cols='100' rows='5'
		  
		  onKeyDown=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\" onKeyUp=\"limitText(this.form.deviations,this.form.countdowndeviations,3000);\">".$row['ContributiontoProgramPurpose']."</textarea>You have <input readonly type='text' name='countdowndeviations' size='3'  value='3000' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>4.0 Deviation from the Original Results Chain </strong><em>[Max 0.5 page]</em></div></td>
          <td><textarea name='challenges' id='challenges' cols='100' rows='5'  onKeyDown=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\" onKeyUp=\"limitText(this.form.challenges,this.form.countdownchallenges,500);\">".$row['Deviation']."</textarea>You have <input readonly type='text' name='countdownchallenges' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>5.0 Inputs</strong> <em>[Max 0.5 page]</em> </div></td>
          <td><textarea name='next_quarter' id='next_quarter' cols='100' rows='5' onKeyDown=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\" onKeyUp=\"limitText(this.form.next_quarter,this.form.countdownnext_quarter,500);\">".$row['project_inputs']."</textarea>You have <input readonly type='text' name='countdownnext_quarter' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
        <tr>
          <td><div align='left'><strong>Key Lessons</strong><em> [Max 0.5 page]</em></div></td> <td><textarea name='lessons' id='lessons' cols='100' rows='5' onKeyDown=\"limitText(this.form.lessons,this.form.countdownlessons,500);\" onKeyUp=\"limitText(this.form.implementation,this.form.countdownlessons,500);\">".$row['lessons']."</textarea>You have <input readonly type='text' name='countdownlessons' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td>
        </tr>
        <tr>
          <td><div align='left'><strong>7.0 Challenges and Solutions Identified</strong><em> [Max 0.5 page]</em></div></td>
          <td><textarea name='challng' id='challng' cols='100' rows='5' onKeyDown=\"limitText(this.form.challng,this.form.countdownchallng,500);\"
		   onKeyUp=\"limitText(this.form.challng,this.form.countdownchallng,500);\">".$row['Challenges']."</textarea>You have <input readonly type='text' name='countdownchallng' size='3'  value='500' style='color:red;width:34px;border:2px;'>characters left.</font></td></td>
        </tr>
		
		
        <tr>
          <td>
          <div align='left' valign='top'><strong>8. Plans for the Next Reporting Period [Max 0.5 page]</strong></div></td><td><table cellspacing='0'      width='500' border='0'>";
		  $n=1; $is=5;$inc=1;
  $data.="<tr>
    <th>&nbsp;NO</th>
    <th>&nbsp;Activities planned for next 6 months</th>
    <th>&nbsp;Milestones</th>
    <th>&nbsp;Timeframe</th>
	<th>&nbsp;Year</th>
  </tr>";
  
  //for($x=0;$x<$is;$x++){
  //$color=$inc%2==1?"evenrow":"white1";
  
  
  $querym=mysql_query("select * from tbl_projectworkplan where project_id='".$project_id."' and narrative_id='".$narrative_id."'")or die("PR-3255");
  while($rowm=mysql_fetch_array($querym)){
  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='$color'><td><input type='hidden' name='pworkplan_id[]' id='pworkplan_id' value='".$rowm['pworkplan_id']."'><input type='hidden' name='loopkey[]' id='loopkey' value='1'>".$n++."</td>
    <td><textarea name='activity[]' cols=50 rows=3>".$rowm['activity']."</textarea></td>
    <td><textarea name='milestone[]' cols=18 rows=3>".$rowm['milestone']."</textarea></td>
    <td><select name='quarter[]' size='1'><option value='' >-select-</option>";
	$s=mysql_query("select semi_annual from tbl_quarters group by semi_annual asc") or die(http("Edit-0789")); 
	while($rr=mysql_fetch_array($s)){
	$sel=($rr['semi_annual']==$row['semi_annual'])?"selected":"";
	$data.="<option value=\"".$rr['semi_annual']."\" ".$sel." >".$rr['semi_annual']."</option>";
	}
	$data.="</select></td>
    
	<td><select name='year[]' id='year' size='1'><option value='' >-select-</option>";
	/* $end=date('Y')+1;
	do {
	$sel=($rowm['year']==$end)?"selected":"";
	$data.="<option value=\"".$rowm['year']."\" ".$sel." >".$rowm['year']."</option>";
	}while($end>=2009); */
	$end=date('Y')+1;
		do{
		$selyear=($row['year']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2009);
	$data.="</select></td>
	
  </tr>";
  
  
  
  }
  
$data.="</table>
<td>
		  
 <tr><td><input type='hidden' name='textDir[]' id='textDir' value='Workplan for next Quarter'><a href='download.php?docs/".$row['report']."'>".$row['report']."</a></td>
          <td><input name='fileDir[]' id='fileDir' type='file' size='30' /><div style='float:right;'><a onClick='ShowDirec()'><input name='' type='hidden' class='formButton2'value='Upload More Files'></a></div></td>
        </tr>";
		
		
		$data.="<tr>
		</table>
		
		<table cellspacing='0'      width='700' cellpadding='5' cellspacing='5' align='left'>
          <tr>
            <td colspan='2' align='left'><div id='dirRec'>
              
            </div></td>
            </tr>
			<tr><td colspan='2'><div id='dirRec1'></div></td></tr>
          ";
          /* <tr>
            <td width='40%' align='right' class='formLabel'>&nbsp;</td>
            <td><input name='bttnUpload' type='submit' id='bttnUpload' value='  Upload  '></td>
          </tr> */
		  
		 
		  $data.="<tr>
          <td>&nbsp;</td>
          <td><div align='right'>
            <input type='submit' class='formButton2' name='update_TSOQualitativeReporting' id='update_TSOQualitativeReporting' style='width:200px;' value='Save'  /> | <input type='button' name='Close' onclick=\"xajax_edit_TSOqualitativeReporting2('','','".$div."','');\" value='Close' class='formButton2' >
          </div></td>
        </tr>";
		}
        $data.="</table></FORM>";

	  
		
		




$obj->assign($div,'innerHTML',$data);
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
         
          
        </tr>

  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>In case of any training conducted, complete the Table</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th>NO</th>
  <th>
    <strong>Program</strong></th>
   <th>
    <strong>Project</strong></th>
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
  <td colspan=''><select name='program[]' style='width:200px;'><option value=''>-select-</option>";
		  /* $sql="select * from tbl_programme order by program_id asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($row['prog_id']==$ROW['prog_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >".substr($ROW['program_name'],0,50)."</option>";} */
		   $data.=QueryManager::ProgramFilter($program=$row['prog_id']);
		  $data.="</select></td>
		  <td colspan=''><select name='project[]' style='width:200px;'><option value=''>-select-</option>";
		  /* $sql="select * from tbl_project where id like '".$_SESSION['intervention']."%' and display like 'Yes%' order by project_code asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected1=($row['project_id']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected1." >".substr($ROW['title'],0,50)."</option>";} */
		   $data.=QueryManager::ProjectFilter($program=$row['prog_id'],$project=$row['project_id']);
		  $data.="</select></td>
    <td> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
	<input name='training_id[]' type='hidden' id='training_id' size='25' value='".$row['training_id']."' />
	<input name='course[]' type='text' id='course' size='25'  value='".$row['course']."' /></td>
    <td><input name='trainer[]' type='text' id='trainer' size='25' value='".$row['trainer']."' /></td>
    <td>
	<select name='typeofparticipants[]' style='width:100px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_lookup  where classCode like '25%' and status like 'Yes%' order by codeName asc";
		  #$obj->addAlert($sql);
		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){
		$selected2=($row['typeofparticipants']==$ROW['code'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['code']."\" ".$selected2." >".substr($ROW['codeName'],0,50)."</option>";}
		  $data.="</select>
	
	</td>
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
   
 $data.="</tr><tr><td colspan='9'></td><td><div align='right'>
        <input type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_training(xajax.getFormValues('projects'),'".$orgdate."'); return false;\" />
        </div></td></tr>
</table>


</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//-----------------------update training----------------------------------



								function update_training($formvalues,$orgdate){
								$obj=new xajaxResponse();
								$n=1;
								
								for($i=0;$i<count($formvalues['loopkey']);$i++){
								$training_id=$formvalues['training_id'][$i];
									$prog_id=$formvalues['program'][$i];
									$project=$formvalues['project'][$i];
		$course=mysql_real_escape_string($formvalues['course'][$i]);
$trainer=mysql_real_escape_string($formvalues['trainer'][$i]);
	$typeofparticipants=mysql_real_escape_string($formvalues['typeofparticipants'][$i]);
		$male=mysql_real_escape_string($formvalues['male'][$i]);
				$female=mysql_real_escape_string($formvalues['female'][$i]);
		$total=mysql_real_escape_string($formvalues['total'][$i]);
	$date=$formvalues['org_date'.$n][$i];
$sql="update tbl_training set `course`='".$course."',`prog_id`='".$prog_id."',`project_id`='".$project."',
`trainer`='".$trainer."',`typeofparticipants`='".$typeofparticipants."',male='".$male."',
 `female`='".$female."',`total`='".$total."',updatedby='".$_SESSION['username']."',organizing_date='".$orgdate."' where training_id='".$training_id."'";
 //$obj->alert($sql);
$query=@mysql_query($sql)or die(http("PR-3449"));
		
		//$n++;
		
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
$obj->call("xajax_view_training",'','','','');

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
$classCode=7;
$data="
<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' border='0' cellspacing='0'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>
  



  <tr CLASS='evenrow'>
 
    <th colspan='10' ><center>List of publications</center></th>
	
  </tr>
 
  ";
 
  for($i=0;$i<count($formvalues['loopkey']);$i++){
  $s="select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'";
  //$obj->alert($s);
  $sel=mysql_query("select * from tbl_publication where publication_id='".$formvalues['publication_id'][$i]."'")or die(http(0063));
  while($row=mysql_fetch_assoc($sel)){
  $orgdate="org_date".$n;
    $data.="<tr class='evenrow'>
   <th>Program</th>
    <td class='evenrow'> <input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1' />
	<input name='publication_id[]' type='hidden' id='publication_id' size='25' value='".$row['publication_id']."' />
<select name='program[]' style='width:300px;'><option value=''>-select-</option>";
		 /*  $sql="select * from tbl_programme where type='Program' and display like 'Yes%' order by prog_id asc";
		  #$obj->addAlert($sql);
		  $query=Execute($sql) or die(http("Edit-219"));
		  while($ROW=FetchRecords($query)){
		$selected=($row['prog_id']==$ROW['prog_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >".substr($ROW['program_id'],0,500)." ".substr($ROW['program_name'],0,500)."</option>";} */
				$data.=QueryManager::ProgramFilter($program=$row['prog_id']);
		  $data.="</select></td>
		  </tr>
		  <tr>
		   <th>Project/ Regional Center of Excellence</th>
    		<td class='evenrow'><select name='project[]' style='width:300px;'><option value=''>-select-</option>";
		  $sql="select * from tbl_project where  display like 'Yes%' order by project_code asc";
		  #$obj->addAlert($sql);
		  /* $query=Execute($sql) or die(http(219));
		  while($ROW=FetchRecords($query)){
		$selected=($row['project_id']==$ROW['id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['id']."\" ".$selected." >".$ROW['project_code']." ".substr($ROW['title'],0,500)."</option>";} */
		  
		  $data.=QueryManager::ProjectFilter($program=$row['prog_id'],$project=$row['project_id']);
		  $data.="</select></td> </tr> <tr>
          	 <th>Type of Publication</th>
       		<td class='evenrow'>
			<select name='typeofpublication[]' style='width:300px;' id='typeofpublication'  ><option value=''>-select-</option>";
			  $sql="select * from tbl_lookup where classCode='".$classCode."' order by codeName asc";

		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){

		  $data.="<option value=\"".$ROW['code']."\" ".checkExistance($ROW['code'],$row['typeofpublication'],'selected')." >".$ROW['codeName']."</option>";}
		  $data.="</select></td></tr> <tr>
		  <th >Other Publication</th>
    		<td class='evenrow'>
			<textarea name='other_publication[]' cols='51' rows='3'>".$row['other_publication']."</textarea>
			</td></tr> <tr>
             <th>Title of Publication: /Knowledge Product</th>
	    	<td class='evenrow'><input name='title[]' type='text' id='title' size='55' value='".$row['title']."' /></td>
            </tr> 
			<tr>
             <th>Author:</th>
	    	<td class='evenrow'><input name='author[]' type='text' id='author' size='55' value='".$row['author']."' /></td>
            </tr>
			
			
			<tr class=''>
            <th>Date of Publication</th>
		    <td class='evenrow'><a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.projects.$orgdate);return false;\" hidefocus=''>
<input name='$orgdate' type='text'  size='55' value='".$row['dateofpublication']."' id='$orgdate' readonly='readonly' />
<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a></td>
			 </tr> 
			 <tr>
             		<th>Organization</th>
			<td class='evenrow'>
           
			<select name='organization[]' style='width:300px;' id='organization'  ><option value=''>-select-</option>";
			  $sql="select * from tbl_organization order by orgName asc";

		  $query=@mysql_query($sql) or die(http(219));
		  while($ROW=@mysql_fetch_array($query)){

		  $data.="<option value=\"".$ROW['org_code']."\" ".checkExistance($ROW['org_code'],$row['organization'],'selected')." >".$ROW['orgName']."</option>";}
		  $data.="</select></td>
          </tr>
 </tr> <tr>
<th>Link to the Publication(URL)</th>
<td class='evenrow'><input name='link[]' type='text' id='link' size='55' value='".$row['link']."' /></td>
 </tr> <tr class='display_none'>
    <th>Publication</th>
  <td class='evenrow'><input name='publication[]' type='text' id='trainer' size='55' value='".$row['Publication']."' /></td>
 
  </tr>
   <tr CLASS='evenrow'>
		<td colspan='2'><hr/></td>  
  </tr>  
  
  ";
  $n++;
  }
  }
  
  
$data."


</table>
</td>";
   
 $data.="</tr>
</table>


<div align='right'>
        <input type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"xajax_update_publication(xajax.getFormValues('projects')); return false;\" />
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
									$typeofpublication=$formvalues['typeofpublication'][$i];
									$program=$formvalues['program'][$i];
									$project=$formvalues['project'][$i];
									$link=$formvalues['link'][$i];
									$author=$formvalues['author'][$i];
									$date=$formvalues['org_date'.$n];
									$title=mysql_real_escape_string($formvalues['title'][$i]);
									$organization=mysql_real_escape_string($formvalues['organization'][$i]);
									$other_publication=mysql_real_escape_string($formvalues['other_publication'][$i]);
						
/* */
									$sql="update tbl_publication set title='".$title."',organization='".$organization."',
									other_publication='".$other_publication."',link='".$link."',
									prog_id='".$program."',project_id='".$project."',author='".$author."',
									typeofpublication='".$typeofpublication."',	updatedby='".$_SESSION['username']."' 
									where publication_id='".$publication_id."' ";
							
 										#$obj->alert($sql);
										$query=@mysql_query($sql)or die(http("Edit-2593"));
		
		//$n++;
		$n++;
																			}
			$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
			$obj->call("xajax_view_publications",'','','','',1,20);
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
						$query=Execute("select * from tbl_project where id='".$formvalues['id'][$i]."'")or die(http("216"));
							while($row=mysql_fetch_array($query)){
								$data="<form action='".$PHP_SELF."' name='projects' ID='projects' method='post' >
								<table cellspacing='0'      width='800' align='center' border='0' cellspacing='0' cellpadding='0'>
								<tr height='25'>
									<td>&nbsp;Program:</td><td>
										<select name='program[]' id='program' style='width:450px;' >
											<option value=''>-select-</option>";
														$ab4 = Execute("select * from tbl_programme order by prog_id asc")or die(mysql_error());
														while($b4 = mysql_fetch_array($ab4)){
														$selp=($row['programme_id']==$b4['prog_id'])?"SELECTED":"";
														$data.="<option value=\"".$b4['prog_id']."\" ".$selp." >".$b4['prog_id']." ".$b4['program_name']."</option>";
														}
										
														@mysql_free_result($ab4);
												$data.="</select></td>
						</tr>
						
						<tr height='25'>
						<td>&nbsp;Sub-Program:</td><td>
								<select name='subprogram[]'  id='subprogram' style='width:450px;'><option value=''>-select-</option>";
				$ab1 = mysql_query("select * from tbl_subcomponent where prog_id like '".$_SESSION['program']."%' order by subcomponent_code asc")or die(mysql_error());
				while($ba = mysql_fetch_array($ab1)){
				$selsub=($row['subprogram_id']==$ba['subcomponent_id'])?"SELECTED":"";
			$data.="<option value=\"".$ba['subcomponent_id']."\"  ".$selsub.">".$ba['subcomponent_code']."&nbsp;&nbsp;   ".$ba['subcomponent']."</option>";
														}
										
			mysql_free_result($ab1);
$data.="</select></td>
						</tr>
						<tr height='25'>
						<td>&nbsp;Goal:</td>
						<td><textarea name='goal[]' id='goal' cols='80' rows='5'>".$row['goal']."</textarea></td>
										</tr>
						
						<tr height='25'>
						<td>&nbsp;Project Title</td>
						<td><textarea name='title[]' cols='80' id='title' rows='5'>".$row['title']."</textarea></td></tr>
						<tr>
						<td>&nbsp;Project Acronym</td>
						<td><input type='text' name='acronym[]' id='acronym' value='".$row['acronym']."' size='83'></td></tr>
						<tr height='25'>
						<td>&nbsp;Project Code:</td>
						<td><input type='text' name='project_code[]' id='project_code' value='".$row['project_code']."' size='83'></td></tr>
						<tr height='25'>
						<td>&nbsp;Sub-Grantee Agreement Number:</td>
						<td><input type='text' name='agreement_no[]' id='agreement_no' value='".$row['subgrante_agreement']."' size='83'></td></tr>
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
							<td><textarea cols='80' rows='8' name='background[]'  id='background'>".$row['background']."</textarea></td>
										</tr>
										<tr height='25'>
											<td width='200' valign='top'>&nbsp;Project Funding Type:</td>
											<td><input type='text' name='funding_type[]' id='funding_type' value='".$row['projectFundingtype']."' size='83'></td>
										</tr>
										<tr height='25' valign='top'>
											<td>&nbsp;Participating  Countries and Institutions:</td>
											<td><table cellspacing='0'>";
										$a = mysql_query("select * from tbl_country  where memberstatus like 'Yes%' order by countryName asc")or die(mysql_error());
										while($b = mysql_fetch_array($a)){
										$div="status_".$b['countryCode'];
										$checked=(strpos($row['countries'], $b['countryName']) !==false)?"CHECKED":"";
							$data.="<tr><td><input type='checkbox' ".$checked." name='country[]' id='country' value=\"".$b['countryName']."\" ><a href='#'  title='click here to view organizations in ".$b['countryName']."' onclick=\"xajax_edit_organizationPerCountry('".$row['id']."','".$b['countryCode']."','".$b['countryName']."','".$div."');return false;\" ><strong>".$b['countryName']."</strong></a></td></tr>
							<tr><td colspan=2><div id='status_".$b['countryCode']."'></div></td></tr>";	}
							@mysql_free_result($a); 
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
												<input name='organization' type='text' size='60' id='organization' />
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
          <td colspan=2><input name='totalfunding[]' type='text'  size='80'  id='totalfunding' value='".$row['totalprojectFunding']."' onKeyPress='return numbersonly(event, false)' />(USD)</td>
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
				<input type='button' class='formButton2'value='SAVE' name='project_save' onclick=\"xajax_update_project(xajax.getFormValues('projects'));return false;\" class='button_width' >
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
								$organization=$formvalues['organization'];
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
$organization1=mysql_real_escape_string(get_Stringorg($formvalues['organization1']));
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
$project_id=$formvalues['project_id'][$x];

$acronym=mysql_real_escape_string($formvalues['acronym'][$x]);
$agreement_no=mysql_real_escape_string($formvalues['agreement_no'][$x]);
$totalfunding=mysql_real_escape_string($formvalues['totalfunding'][$x]);



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
	$query=@mysql_query("insert into  tbl_organization(`orgName`)
		values('".mysql_real_escape_string($organization)."')")or die(http("Save-817"));
		$leadInstitution=mysql_insert_id();
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
		$sql="update tbl_project set 
		`programme_id`='".mysql_real_escape_string($program)."', 
 `subcomponent_id`='".$subprogram."',
 `subprogram_id`='".$subprogram."',
`goal`='".$goal."', 
 purpose='".$project_purpose."',
 `project_code`='".$project_code."',
  `title`='".$title."',project_goal='".$project_goal."',
  `background`='".$background."',
  `projectFundingtype`='".$funding_type."',
  totalprojectFunding='".$totalfunding."',
   `countries`='".$country."',
    `institutions`='".$organization1."',
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
	`updatedby`='".$_SESSION['username']."',acronym='".$acronym."',subgrante_agreement='".$agreement_no."' where id='".$project_id."'
		";
//$obj->alert($sql);
 $query=@mysql_query($sql)or die(http("Edit-0043"));
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
#$obj->call("xajax_view_project",'','','','','',1,20);

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
			$data.="<tr><td><input type='checkbox' name='organization1[]' ".$checkedorg." id='organization1' value=\"".$b['orgName']."\">".$b['orgName']."</option></td></tr>
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
			 # $obj->addAlert($x);
			  $query=mysql_query($x)or die(mysql_error());
			   while($row=mysql_fetch_array($query)){
$data="

<div id='login'><table cellspacing='0'      width='600'><tr><td><form name='organization' id='organization'>
<table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
              <tr>
                <td>Name of Organization</td>
                <td colspan='2'><input name='orgname[]' type='text' id='orgname' size='80' value='".$row['orgName']."'/></td>
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
			  
			  
			 <tr style='display:none;'>
    <td>District/Municipality:</td>
    <td><select name='district[]' id='district' >";
	if($_SESSION['districtCode']<>''){

     $q=mysql_query("select * from tbl_district where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(330));
	  while($rowd=mysql_fetch_array($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";

	}
	
	}
	else
	{
	
	
      $data.="<option>-select-</option>";
     $q=mysql_query("select * from tbl_district  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(342));
	  while($rowd=mysql_fetch_array($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";
	
	 }
	 }
	 

       $data.="</select></td>
  </tr>
   <tr style='display:none;'>
    <td>Subcounty/Division:</td>
    <td><select name='subcounty[]' id='subcounty' >";
	if($_SESSION['districtCode']<>''){/*  
      $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where subcountyCode='".$_SESSION['subcountyCode']."' order by 1 asc")or die(http(321));
	  while($rowsubcounty=mysql_fetch_array($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 }else { 
	  */
	  $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(321));
	  while($rowsubcounty=mysql_fetch_array($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"SELECTED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 
	 }

        $data.="</select></td>
  </tr>
 <tr style='display:none;'>
    <td>Parish/Ward:</td>
    <td><select name='parish[]' id='parish' ><option value='' >-select-</option>";
	if($_SESSION['districtCode']<>''){
     
      $qparish=mysql_query("select * from tbl_parish where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(321));
	  while($rowparish=mysql_fetch_array($qparish)){
	  #$selparish=($_SESSION['parishCode']==$rowparish['parishCode'])?"selected":"";
      $data.="<option value='".$rowparish['ParishCode']."' '".$selparish."'>".$rowparish['ParishName']."</option>";
	
	 
	 }
	 }

        $data.="</select></td>
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
                <td>Brief Description of the Organization:</td>
                <td colspan='2'><textarea name='brief_introduction[]' id='brief_introduction' cols='77' rows='3'>".$row['brief_introduction']."</textarea></td>
              </tr>
              <tr>
                <td>Vision:</td>
                <td colspan='2'><textarea name='vision[]' id='vision' cols='77' rows='3'>".$row['vision']."</textarea></td>
              </tr>
              <tr>
                <td>Mission:</td>
                <td colspan='2'><textarea name='mission[]' id='mission' cols='77' rows='3'>".$row['mission']."</textarea></td>
              </tr>
              <tr>
                <td>Objectives:</td>
                <td colspan='2'><label>
                  <textarea name='objectives[]' id='objectives' cols='77' rows='3'>".$row['objectives']."</textarea>
                  </label></td>
              </tr>
			  
			  <tr>
                <td>Desired Username:</td>
                <td colspan='2'><label>
                  <input name='username[]' id='username' type='text' size='80' value='".$row['username']."' />
                  </label></td>
              </tr>
			  <tr>
                <td>Password:</td>
                <td colspan='2'><label>
                  <input name='password[]' type='password' size='80' value='".$row['password']."' />
                  </label></td>
              </tr>
              </table>
			  		  
         <fieldset><legend class='green_field'>Contact Details</legend>
		 <table cellspacing='0'      width='445' border='0' id='contacts'>
		 <tr>
        <td width='125'>Physical and Postal Address:</td>
      <td width='287'><textarea name='address[]' cols='77' rows='3'>".$row['address']."</textarea></td>
    </tr>
           <tr>
             <td width='125'>Website:</td>
      <td width='287'><input name='website[]' type='text' id='website' size='80' value='".$row['website']."' /></td>
    </tr>
	<tr>
             <td width='125'>Fax:</td>
      <td width='287'><input name='fax[]' type='text' id='fax' size='80' value='".$row['fax']."' /></td>
    </tr>
           <tr>
             <td>Contact Person 1:</td> 
      <td><input name='contact_person[]' type='text' id='contact_person' size='80' value='".$row['contact_person']."' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title[]' type='text' id='title' size='80' value='".$row['title']."' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><input name='telephone[]' type='text' id='telephone' size='80' value='".$row['telephone']."' /></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td><input name='mobile[]' type='text' id='mobile' size='80' value='".$row['mobile']."' /></td>
    </tr>
	 <tr>
             <td>Contact Person 2:</td>
      <td><input name='contact_person2[]' type='text' id='contact_person2' size='80' value='".$row['contact_person2']."' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title2[]' type='text' id='title2' size='80' value='".$row['title2']."' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
  
      
        <TD> <input name='telephone2[]' type='text' id='telephone2' size='80' value='".$row['telephone2']."' /></label></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
    
        <TD><LABEL><input name='mobile2[]' type='text' id='mobile2' value='".$row['mobile2']."' size='80' />
        </label></td>
    </tr>
	 <tr>
             <td>Contact Person 3:</td>
      <td><input name='contact_person3[]' type='text' id='contact_person3' size='80' value='".$row['contact_person3']."' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title3[]' type='text' id='title3' size='80' value='".$row['title3']."' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><label>
         <input name='telephone3[]' type='text' id='telephone3' value='".$row['telephone3']."' size='80' /></label></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td>
          <label> <input name='mobile3[]' type='text' id='mobile3' value='".$row['mobile3']."' size='80' /></label>
        </td>
    </tr>
	
  </table>
  </fieldset>
         
       <table cellspacing='0'      width='500' border='0'>
	   <tr><td colspan=2><div id='status'></div></td></tr>
         <tr>
           <td COLSPAN=2>&nbsp;</td>
      <td><label>
        <div align='right'>
          <input type='button' class='formButton2'name='save_organization' class='button_width' id='save_organization' onclick=\"xajax_update_organization(xajax.getFormValues('organization'));return false;\" value='Save' />
          </div>
      </label></td>
    </tr>
  </table></form></td></tr></table></div>";
} 
	   
	   
	  }

$obj->assign("bodyDisplay","innerHTML",$data);
return $obj;
}
 






function update_organization($formvalues){
$obj=new xajaxResponse();
#$obj->addAlert($formvalues['org_code12']);
#$obj->addAlert(count($formvalues['org_code12']));
for($x=0;$x<count($formvalues['org_code12']);$x++){
$org_code=$formvalues['org_code12'][$x];
$orgName=mysql_real_escape_string($formvalues['orgname'][$x]);
$acronym=trim($formvalues['acronym'][$x]);
$registered=trim($formvalues['registered'][$x]);
$regno=trim($formvalues['regno']);
$zone=trim($formvalues['zone'][$x]);
$orgtype=trim($formvalues['orgtype'][$x]);
$brief_introduction=mysql_real_escape_string($formvalues['brief_introduction'][$x]);
$mission=mysql_real_escape_string($formvalues['mission'][$x]);
$vision=mysql_real_escape_string($formvalues['vision'][$x]);
$objives=mysql_real_escape_string($formvalues['objectives'][$x]);
//$subcomponent=get_Stringorg($formvalues['subcomponent'][$x]);
$username=trim($formvalues['username'][$x]);
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
$mobile3=trim($formvalues['mobile3'][$x]);


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
registered='".ucwords($registered)."',
registration_no='".$regno."',
zone='".$zone."',orgtype='".$orgtype."',
vision='".ucwords($vision)."',mission='".ucwords($mission)."',
objective='".ucwords($objives)."',

brief_introduction='".ucwords($brief_introduction)."',
address='".strtoupper($address)."',
website='".$website."',fax='".$fax."';
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
#$obj->addAlert($insert);
//$max
#mysql_query("update tbl_user set name='".ucwords($orgName)."',username='".$username."',password='".md5($password)."',subcomponent='".mysql_real_escape_string($subcomponent)."',usergroup='".$orgtype."',role)(select orgName,username,password,subcomponent,usergroup,organization_type from view_organization where username='".$username."');")or die("Sunrise error code 00236 because, ".mysql_error());

}
$obj->assign("bodyDisplay","innerHTML",congMsg("Organization Captured!"));
$obj->call("xajax_view_organization",'','','',1,20);
//$obj->redirect('organization.php');
return $obj;
}





#--------------------------------edit_users-------------------------
 function edit_users($formvalues){
		//$obj->addAlert('Hello World');
$obj=new xajaxResponse();
$data="<form name='users' ID='users' method=post action='".$PHP_SELF."'>
<table cellspacing='0'      width='100%' border='0' align='left'>
		"; 
				for($i=0;$i<count($formvalues['user_id']);$i++){
				
 // $obj->alert(count($formvalues['user_id']));
  $sql="select * from tbl_user where user_id='".$formvalues['user_id'][$i]."'";
 // $obj->alert($sql);
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
              </tr>";
//		$data.="<tr>
//                <td><div align=''>Organization:</div></td>
//                <td align='right'><label></label>
//                    <span style='color:#ff0000;'></td><td>
//                   <select name='organization[]' id='organization' style='width:376px;' >
//												<option value=''>-select-</option>
//												";
//                    $select=mysql_query("select * from tbl_organization group by orgName order by orgName asc")or die(mysql_error());
//					while($rowo=mysql_fetch_array($select)){
//					$selorg=($row['org_code']==$rowo['org_code'])?"SELECTED":"";
//                      $data.="<option value=\"".$rowo['org_code']."\" ".$selorg.">".$rowo['orgName']."</option>";
//					  }
//                    $data.="</select>
//                    </span></td>
//                <td></td>
//              </tr>";
		$data.="<tr>
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
              </tr>";
		$data.="<tr>
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
              </tr>";
//		$data.="<tr>
//                <td><div align=''>Program:</div></td>
//                <td align='right'><label></label>
//                    <span style='color:#ff0000;'>*</td><td>
//                    <select name='program[]' id='program' style='width:376px;'><option value=''>-select-</option>
//					<option value='N/A'>-N/A-</option>";
//                    $select=mysql_query("select * from tbl_programme group by program_name order by program_name asc")or die(mysql_error());
//					while($rowp=mysql_fetch_array($select)){
//					$selp=($row['program_id']==$rowp['prog_id'])?"SELECTED":"";
//                      $data.="<option value=\"".$rowp['prog_id']."\" ".$selp.">".$rowp['program_id']." ".substr($rowp['program_name'],0,70)."</option>";
//					  }
//                    $data.="</select>
//                    </span></td>
//                <td></td>
//              </tr>";
//	$data.="<tr>
//                <td><div align=''>Sub-Program:</div></td>
//                <td align='right'><label></label>
//                    <span style='color:#ff0000;'>* </td><td>
//                    <select name='subcomponent[]' id='subcomponent' style='width:376px;'><option value=''>-select-</option>
//					";
//                    $selects=mysql_query("select * from tbl_subcomponent group by subcomponent order by subcomponent_code asc")or die(mysql_error());
//					while($rows=mysql_fetch_array($selects)){
//					$selw=($row['subcomponent_id']==$rows['subcomponent_id'])?"SELECTED":"";
//                      $data.="<option value=\"".$rows['subcomponent_id']."\" ".$selw.">".$rows['subcomponent_code']." ".substr($rows['subcomponent'],0,70)."</option>";
//					  }
//                    $data.="</select>
//                    </span></td>
//                <td></td>
//              </tr>";
//             $data.="<tr>
//                <td><div align=''>Project:</div></td>
//                <td><label></label>
//                    <span style='color:#ff0000;'>* </td><td>
//                    <select name='Project[]' id='Project' style='width:376px;'><option value=''>-select-</option>
//					";
//                    $selectp=mysql_query("select * from tbl_intervention  group by intervention order by intervention asc")or die(mysql_error());
//					while($rowp=mysql_fetch_array($selectp)){
//                     $selp=($row['project_id']==$rowp['id'])?"SELECTED":"";
//					  $data.="<option value='".$rowp['intervention_id']."'>".$rowp['intervention']."</option>";
//											  }
//                    $data.="</select>
//                    </span></td>
//                <td></td>
//              </tr>";
			  $data.="<tr>
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
                <td width='162'>Email</td>
                <td align='right'><span style='color:#ff0000;'>* </span></td><td>
                    <input type='text' size='70' name='email[]' id ='email'  value='".$row['email']."' /></td>
					<td></td>
              </tr>
			  <tr>
          <td width='162'>Email Status:</td>
		   <td align='right'></td>
          <td><select name='emailStatus[]' type='text'  id='emailStatus' size='1' style='width:301px;' />
		  <option value=''>-select-</option>";
		  
		  $select = @mysql_query("select * from tbl_lookup where classCode='35' order by code asc")or die(http(4211));
while($row110 = @mysql_fetch_array($select)){
		  $selected=($row110['codeName']==$row['emailStatus'])?"SELECTED":"";
		  $data.="<option value=\"".$row110['codeName']."\" ".$selected.">".$row110['codeName']."</option>";
		 }
		  
		  $data.="</select></td>
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
								<input name='reg_user' type='button' class='formButton2'style='width:140px;'  id='reg_user' value='Save' onclick=\"xajax_update_users(xajax.getFormValues('users')); \" />
						</td>
				</tr>
		</table>
</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function update_users($formvalues){
$obj=new xajaxResponse();
/* if($_SESSION['role']<>'Systems Administrator'){
$obj->alert("Access Denied!\n Only Systems Adminstrator  can edit a setup Item");
$obj->redirect("index.php");
return $obj;
} */
for($x=0;$x<count($formvalues['user_id']);$x++){
$user_id=$formvalues['user_id'][$x];
$fname=$formvalues['fname'][$x];
$usergroup=$formvalues['usergroup'][$x];
$role=$formvalues['role'][$x];
$username=$formvalues['username'][$x];
$email=$formvalues['email'][$x];
//$organization=$formvalues['organization'][$x];
$district=$formvalues['district'][$x];
//$program=$formvalues['program'][$x];
//$subcomponent=$formvalues['subcomponent'][$x];
//$project_id=$formvalues['project_id'][$x];
$password=$formvalues['password'][$x];
$cpass=$formvalues['cpass'][$x];
$emailStatus=$formvalues['emailStatus'][$x];
$code=$formvalues['code'][$x];
$vcode=$formvalues['vcode'][$x];
$country=$formvalues['country'][$x];
$passwordHint=generateCode(6).$password;

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
 
$xx="update tbl_user set name='".$fname."',username='".$username."',usergroup='".$usergroup."',EncryptionHint='".$passwordHint."',password='".md5($password)."',role='".$role."',district='".$district."',country='".$country."',email='".$email."',emailStatus='".$emailStatus."' where user_id='".$user_id."'";
#$obj->addAlert($xx);
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
$obj=new xajaxResponse(); 

$data="<form name='new_district' id='new_district' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' ><table cellspacing='0'      width='100%' border='0'> ";
switch($linkvar){
case "edit_district":
for($i=0;$i<count($formvalues['district_code']);$i++){
$district_code=$formvalues['district_code'][$i];
$check="select * from tbl_district where districtCode ='".$district_code."'";
#$obj->addAlert($check);
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
                      <td><input type='button' class='formButton2'id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_district')\" /></td>
                    </tr>
                  ";
				  break;
					
					case "edit_subcounty":
					#========edit_subcounty========================
					
					for($i=0;$i<count($formvalues['subcountyCode']);$i++){
$subcountyCode=$formvalues['subcountyCode'][$i];
$check="select * from tbl_subcounty where subcountyCode ='".$subcountyCode."'";
#$obj->addAlert($check);
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
<td><input type='button' class='formButton2'id='btnsave' value='Save' name='btnsave'  onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_subcounty')\" /></td>
                   
  </tr>
";
					
					
					break;
				case "edit_parish":	
				
for($i=0;$i<count($formvalues['ParishCode']);$i++){
$ParishCode=$formvalues['ParishCode'][$i];
$check="select * from tbl_parish where ParishCode ='".$ParishCode."'";
#$obj->addAlert($check);
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
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_update_district(xajax.getFormValues('new_district'),'edit_parish')\" />
    </div></td>
  </tr>
";

				
				
				
				break;
				default:
				
				}	
					
					
					
                 $data.=" </table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


#****************************************************


function update_district($formvalues,$linkvar){
$obj=new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->AddAlert("Access Denied!\n Only the Monitoring and Evaluation can Change District Details");
$obj->redirect("index.php");
return $obj;
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
#$obj->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
$obj->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$obj->call('xajax_view_district','',1,20);
}
break;
case "edit_subcounty":

for($i=0;$i<count($formvalues['subcountyCode']);$i++){
$subcountyCode=$formvalues['subcountyCode'][$i];
$districtCode=$formvalues['districtCode'][$i];
$subcountyName=$formvalues['subcountyName'][$i];

$sql="update tbl_subcounty set districtCode='".$districtCode."',subcountyName='".$subcountyName."' where  subcountyCode='".$subcountyCode."'";
#$obj->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
}
$obj->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$obj->call('xajax_view_subcounty','','','',1,20);


break;

case "edit_parish":

for($i=0;$i<count($formvalues['ParishCode']);$i++){
$ParishCode=$formvalues['ParishCode'][$i];
$districtCode=$formvalues['districtCode'][$i];
$subcountyCode=$formvalues['subcountyName'][$i];
$parishName=$formvalues['parishName'][$i];

$sql="update tbl_parish set districtCode='".$districtCode."',subcountyCode='".$subcountyCode."' where  ParishCode='".$ParishCode."'";
#$obj->addAlert($sql);
$check=mysql_query($sql)or die(http(4533));
}
$obj->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$obj->call('xajax_view_parish','','','','',1,20);
break;

default:
}

return $obj;
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
$obj=new xajaxResponse();
if($_SESSION['role']<>'Systems Administrator'){
$obj->AddAlert("Access Denied!\n Only the Systems Administrator can edit a Document");
$obj->redirect("index.php");
return $obj;
}
for($i=0;$i<count($formvalues['document_id']);$i++){
$districtCode=$formvalues['districtCode'][$i];
$districtName=$formvalues['districtName'][$i];
$acronym=$formvalues['acronym'][$i];
$sql="update tbl_district set districtName='".$districtName."' acronym='".$acronym."' where  districtCode='".$districtCode."'";
//$obj->addAlert($sql);
$check=mysql_query($sql)or die(mysql_error());
}
$obj->assign('bodyDisplay','innerHTML',congMsg('District Updated!'));
$obj->call('xajax_view_district','','',1,20);
return $obj;
}


#---------------------home details------------------------
function edit_home($formvalues){
 $obj=new xajaxResponse();
 $data.="<form name='home2' id='home2' style=''><table cellspacing='0'      width='100%' border='0'>";
  //$obj->addAlert($formvalues['home_id']);
 for($i=0;$i<count($formvalues['home_id']);$i++){
 $home_id=$formvalues['home_id'][$i];
 #$obj->addAlert($home_id);
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
    <td><div style='float:right;'><input name='save' type='button' class='formButton2'value='Save' onclick=\"xajax_update_home(xajax.getFormValues('home2'));\" /></div></td>
  </tr>
</table></form>"; 
 $obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
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

 



/*function updatedistrict2($parishcode,$subcountycode,$acronym,$subcountyname,$parishname){
$obj=new xajaxResponse();
$cur_user=$_SESSION['role'];
mysql_query("update tblparish set parishName='".$parishname."' where parishCode='".$parishcode."'")or die(mysql_error());
mysql_query("update tblsubcounty set subcountyName='".$subcountyname."' where subcountyCode='".$subcountycode."'")or die(mysql_error());
//$sel=mysql_fetch_array(mysql_query("select max(login_id) from tbl_login"))or die(mysql_error());
$user="select user() as cur_user";
//$obj->addAlert($user);
$usr=mysql_fetch_array(mysql_query("select user() as cur_user"))or die(mysql_error());
//root@localhost
$upd="update parish_log set user_id='".$_SESSION['id']."',district='".$_SESSION['district']."' where user_id='".$usr['cur_user']."'";
$obj->addAlert($upd);
mysql_query($upd)or die("UNASO-Error: 333 Because". mysql_error());
$obj->assign('status','innerHTML',"<div align='center' class='green'>Subcounty and subcounty changed Successfully!</div>");
$obj->redirect("view_district.php");
return $obj;
} */





function edit_usergroup($formvalues){
$obj=new xajaxResponse();
$data="<form  name='usergroup12' id='usergroup12' method='post' action='".$PHP_SELF."'>
<table cellspacing='0' width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['group_id']);$x++){
  //$obj->alert($formvalues['group_id']);
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
      <input type='button' class='formButton2'class='button_width' name='update_usergroup' id='update_usergroup' value='Save' onclick=\"xajax_update_usergroup(xajax.getFormValues('usergroup12'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

#---------------------------update usergroup------------------------------------
function update_usergroup($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['group_id']);$x++){
$groupname=$formvalues['groupname'][$x];
$desc=$formvalues['desc'][$x];


$update="update tbl_usergroup set group_name='".$groupname."',description='".$desc."',updatedby='".$_SESSION['username']."' where group_id='".$formvalues['group_id'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$obj->call("xajax_view_usergroup",'');
return $obj;
}

//----------------edit role---------------------------
function edit_role($formvalues){
$obj=new xajaxResponse();
$data.="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['role_id']);$x++){
 // $obj->alert($formvalues['role_id']);
  // $obj->alert(count($formvalues['role_id']));
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
      <input type='button' class='formButton2'class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_role(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//----------update role-------------------------------
function update_role($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['role_id']);$x++){
$role=$formvalues['rolename'][$x];
$group_name=$formvalues['group_name'][$x];

$desc=$formvalues['desc'][$x];


$update="update tbl_role set role_name='".mysql_real_escape_string($role)."',description='".mysql_real_escape_string($desc)."',usergroup='".$group_name."',updatedby='".$_SESSION['username']."' where role_id='".$formvalues['role_id'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$obj->call("xajax_view_role",'','');
return $obj;
}

//-------------------update dropdown list ------------------------


function edit_dropdownList($formvalues){
$obj=new xajaxResponse();
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
 <td><input name='save_dropdown' type='button' class='formButton2'value='Save' class='button_width' onclick=\"xajax_update_dropdownlist(xajax.getFormValues('dropdown'));\"></td> 
  </tr>";
$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
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
$obj=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
  //$obj->alert($formvalues['group_id']);
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
      <input type='button' class='formButton2'class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_category(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//----------------------update New Menu item---------------------
function update_menu_category($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['tbl_menu_categoriesId']);$x++){
$MenuCategory=$formvalues['MenuCategory'][$x];
$Rank=$formvalues['Rank'][$x];


$update="update tbl_menu_categories set MenuCategory='".mysql_real_escape_string($MenuCategory)."',Rank='".mysql_real_escape_string($Rank)."',updatedby='".$_SESSION['username']."' where tbl_menu_categoriesId='".$formvalues['tbl_menu_categoriesId'][$x]."'";

//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}


$obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$obj->call("xajax_view_menu_category",'');
return $obj;
}
//----------------------edit sub menu-----------------------
function edit_menu_items($formvalues){
$obj=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
  //$obj->alert($formvalues['group_id']);
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
      <input type='button' class='formButton2'class='button_width' name='button' id='button' value='Save' onclick=\"xajax_update_menu_items(xajax.getFormValues('usergroup'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




#----------------------LOP Targets----------------------------------------


function edit_LOPTarget($formvalues){
$obj=new xajaxResponse();

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'   id='report'   width='100%' border='0'>
         <tr>
       
        
              <th colspan='11' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of ASARECA Targets</center></th>
             
            </tr>
            <tr class=evenrow>
            <th width='25' class='dataRow'>indicator Code</th>
              
			  <th width='' class='dataRow' colspan='4' >Indicator<img src='images/spacer2.png' width='150' height='0.1'></th>
			  <th width='55' class='dataRow' align='right'>Baseline</th>";
			  
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
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, i.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,

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
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`,w.`period`, i.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,

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
		$query2=@Execute($y)or die(http("ED-150"));
		
		 
		  $inc=1;
		  $a=1;
		 while($rowTarget=@FetchRecords($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=".$color.">
 <td width='25' >".$rowTarget['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >
			<INPUT type='hidden' name='loopkey[]'  id='loopkey' value='1' >
			<INPUT type='hidden' name='workplan_id[]'  id='workplan_id' value='".$rowTarget['workplan_id']."' >
			".$rowTarget['indicator_name']."</td>";
			$data.="<td><INPUT type='text' name='base[]' size='15'  id='base".$a."'  onKeyPress='return numbersonly(event, false);' value='".$rowTarget['baseline']."' ></td>";
			
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

$query=@mysql_query($sql) or die(http("Edit-4722"));
@mysql_query("update tbl_loptargets set Target='".$qtr2."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'") or die(http("Edit-4724"));
@mysql_query("update tbl_loptargets set Target='".$qtr3."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'") or die(http("Edit-4725"));
@mysql_query("update tbl_loptargets set Target='".$qtr4."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'") or die(http("Edit-4726"));
@mysql_query("update tbl_loptargets set Target='".$qtr5."' where indicator_id='".$indicator."' and target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."'") or die(http("Edit-4727"));

@mysql_query("update tbl_indicator set baseline='".$baseline."' where indicator_id='".$indicator."' ") or die(http("Edit-4729"));


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
@mysql_query("update tbl_indicator set baseline='".$baseline."' where indicator_id='".$indicator."' ") or die(http("Edit-4729"));
//$obj->alert($insert2);
}

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_ViewLOPTargets",'ASARECA','','','','',1,20);
return $obj;
}


//----------------------update sub menu---------------------
function update_menu_items($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['tbl_menu_itemsId']);$x++){
$MenuCategory=$formvalues['category'][$x];
$Rank=$formvalues['Rank'][$x];
$MenuItem=$formvalues['MenuItem'][$x];
$page=$formvalues['page'][$x];
$action=$formvalues['action'][$x];

$update="update `tbl_menu_items` set MenuCategory='".$MenuCategory."',Rank='".$Rank."',action='".$action."',MenuItem = '".$MenuItem."',LinkvalCode='".$MenuItem."',page='".$page."',updatedby='".$_SESSION['username']."' where tbl_menu_itemsId='".$formvalues['tbl_menu_itemsId'][$x]."'";
//$obj->alert($update);
@mysql_query($update)or die(http('0145'));
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Data Updated!"));
$obj->call("xajax_view_menu_items",'','');
return $obj;
}





function edit_staff($formvalues){
$obj = new  xajaxResponse();


$data="<form name='staffDirectory' id='staffDirectory' action='".$PHP_SELF."'><table cellspacing='0'      width='660' border='0'>
  <tr>
    <td scope='col' colspan=3><div id='status'></div></td>
  </tr>";
  
  for($x=0;$x<count($formvalues['staff_id']);$x++){
  $query=Execute("select * from tbl_staffmembers where staff_id='".$formvalues['staff_id'][$x]."'") or die(http("Edit-4343"));
  while($row=FetchRecords($query)){
  $data.="<tr>
   <td colspan='2'><hr/></td></tr><tr>
   <td>Programme/Unit:</td>
    <td><label>
      <select name='programme[]' style='width:230px;'><option value=''>-select-</option>";
	  $query1=@mysql_query("select * from tbl_programme order by prog_id asc")or die(http(2451));
	  while($row1=@mysql_fetch_array($query1)){
	  $selRecords=($row1['prog_id']==$row['prog_id'])?"selected":"";
$data.="<option value=\"".$row1['prog_id']."\" ".$selRecords." >".$row1['program_id']." ".$row1['program_name']."(".$row1['Accronym'].")</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td>Project:</td>
    <td><label>
      <select name='project[]' id='project' style='width:230px;'><option value=''>-select-</option>";
	  $query21=@mysql_query("select * from tbl_project where programme_id='".$programme."' group by title order by title asc")or die(http(2451));
	  while($row21=FetchRecords($query21)){
	  	$selRecords1=($row21['id']==$row['project_id'])?"selected":"";
$data.="<option value=\"".$row21['id']."\" ".$selRecords1."> ".$row21['title']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td scope='col'>Name</td>
    <td scope='col'><label>".edit_txtFieldArray($fieldname="name",$row['Name'])."
   
    </label></td>
    <td scope='col'>&nbsp;</td >
  </tr>

 
  <tr>
    <td>Role/Tittle:</td>
    <td><label>
      <select name='role[]' style='width:230px;'><option value=''>-select-</option>";
	  $query3=@mysql_query("select * from tbl_role order by role_name asc")or die(http(2451));
	  while($row3=@mysql_fetch_array($query3)){
	  $selRecords3=($row3['role_id']==$row['role'])?"selected":"";
$data.="<option value=\"".$row3['role_id']."\" ".$selRecords3.">".$row3['role_name']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr height='25'>
											<td width='200'>Organization:</td>
											<td>
												<select name='leadInstitution[]' id='leadInstitution' style='width:230px;'><option value='' >-select-</option>";
														$ab = @mysql_query("select * from tbl_organization order by orgName asc")or die(@http("Edit-4403"));
														while($b = @mysql_fetch_array($ab)){
		$selRecords4=($b['org_code']==$row['organization'])?"selected":"";
	$data.="<option value=\"".$b['org_code']."\" ".$selRecords4." >".@mysql_real_escape_string($b['orgName'])."</option>";
														}
										
														@mysql_free_result($ab);
												$data.="</select>
											</td>
										</tr>
  
  
   <tr>
   <td>Country:</td>
    <td><label>
      <select name='country[]' id='country' style='width:230px;'><option value=''>-select-</option>";
	  $query5=@mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName asc")or die(http(2451));
	  while($row5=@mysql_fetch_array($query5)){
	  	$selRecords5=($row5['countryCode']==$row['country'])?"selected":"";
$data.="<option value=\"".$row5['countryCode']."\"  ".$selRecords5."> ".$row5['countryName']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
   <td>District:</td>
    <td><label>
      <select name='district[]' id='district' style='width:230px;'><option value=''>-select-</option>";
	  $query6=Execute("select * from tbl_district where entryType like 'District%' order by districtName asc")or die(http(2451));
	  while($row6=FetchRecords($query6)){
	  	  	$selRecords6=($row6['districtCode']==$row['district'])?"selected":"";
$data.="<option value=\"".$row6['districtCode']."\" ".$selRecords6."> ".$row6['districtName']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Desired Username </td>
    <td>".edit_txtFieldArray($fieldname="username",$row['username'])."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>".edit_txtFieldPasswordArray($fieldname="password",$row['password'])."
   </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Tel No. </td>
    <td>  <select name='mob_code' id='tel_code'><option value=''>+</option>
      </select>".edit_txtFieldArray($fieldname="tel_no",$row['Telno'])."
  </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mobile:</td>
    <td>
	
	<select name='mob_code' id='mob_code'>

	<option value=''>+</option>
      </select>".edit_txtFieldArray($fieldname="mobile_number",$row['Mobile'])." </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Physical and Postal Address</td>
    <td>".edit_txtFieldArray('postalAddress','Postala and Physical Address')."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>

    <td>".edit_txtFieldArray($fieldname="email",$row['Email'])."<input name='staff_id[]' id='staff_id' type='hidden' size='40' value='".$row['staff_id']."' /></td>
    <td>&nbsp;</td>
  </tr>";
  }
  }
  
  $data.="<tr>
    <td>&nbsp;</td><td>&nbsp;</td>
    <td align='left'><label>
      <input type='button'  name='save' class='formButton2' value='Save' onclick=\"xajax_update_staff(xajax.getFormValues('staffDirectory'));return false;\" />
    </label></td>
    
  </tr>
</table></form>
";




$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function update_staff($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['staff_id']);$x++){
$staff_id=$formvalues['staff_id'][$x];
$name=$formvalues['name'][$x];
$email=$formvalues['email'][$x];
$program=$formvalues['programme'][$x];
$project=$formvalues['project'][$x];
$country=$formvalues['country'][$x];
$district=$formvalues['district'][$x];
$organization=$formvalues['organization'][$x];
$mobile=$formvalues['mob_code'].$formvalues['mobile_number'][$x];
$telno=$formvalues['tel_code'].$formvalues['tel_no'][$x];
$username=mysql_real_escape_string($formvalues['username'][$x]);
$password=mysql_real_escape_string($formvalues['password'][$x]);
$role=$formvalues['role'][$x];
$district=$formvalues['district'][$x];
$address=$formvalues['postalAddress'][$x];


$error="<ul>";
if($name==""){
$error.="<li>Missing Staff Member  Name</li>";
$erCount++;
}
 if($role==""){
$error.="<li>Select Role Name</li>";
$erCount++;
}
 if($username==""){
$error.="<li>Missing Username</li>";
$erCount++;
}
if($password==""){
$error.="<li>Missing Password</li>";
$erCount++;
} 
$error .="</ul>";
if($erCount > 0){
	$obj->assign("status","innerHTML",errorMsg($error));
	#$obj->call("xajax_new_organization",$formvalues);
	return $obj;
} 
#$qyear=mysql_fetch_array(mysql_query("select year from tbl_active"))or die(http(1048));

$query="update tbl_staffmembers set Name='".$name."',prog_id='".$program."',organization='".$organization."',
Type='".RetrieveData($table="tbl_programme",$condition="prog_id",$value=$program,$returnValue1="type")."',role='".$role."',
Title='".RetrieveData($table="tbl_role",$condition="role_id",$value=$role,$returnValue1="role_name")."',
username='".$username."',password='".md5($password)."',mobile='".$mobile."',telno='".$telno."',`Postala and Physical Address`='".$address."', Email='".$email."',project='".$project."',country='".$country."',district='".$district."',updatedby='".$_SESSION['username']."' where staff_id='".$staff_id."' ";

#$obj->alert($query);
/*
$sql="insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,l.codeName  from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_lookup l on(l.code=o.orgtype) where  l.classCode='1' and username='".$username."')";
#$obj->addAlert($sql)  */
@Execute($query)or die(http("Save-1066"));
#@mysql_query("insert into tbl_user() values()")or die(http(1067));
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Staff Member Captured!"));
$obj->call("xajax_view_staffMembers",'','','','');
return $obj;
}



?>