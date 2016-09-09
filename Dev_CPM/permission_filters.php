<?php 

function  filter_training(){

$data.="<tr class='evenrow'>
        
          <td width='30%' colspan='2'>
          <div align='left'><strong>Program</strong></div></td>
          <td colspan=3><select name='program' id='program' style='width:300px;'><option value=''>-All-</option>";
		 /*  $sql="select * from tbl_programme
		  		where type like 'Program%'
			   	order by prog_id asc";
		  #$obj->addAlert($sql);
		  
		  $query=@mysql_query($sql) or die(http("FILTERS-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['program_id']==$ROW['prog_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >
		  	".$ROW['program_id']." ".substr($ROW['program_name'],0,500)."</option>";}  */
			 $data.=QueryManager::ProgramFilter($program);
		  $data.="</select></td>
       
		  <td colspan=5 align='right'><input name='new_training' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_training('','');\"> | <a href='export_to_excel_word.php?linkvar=Export Training&&program=".$program_id."&&project=".$project_id."&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'><input name='export_training' type='button' class='formButton2'value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Training&&program=".$program_id."&&project=".$project_id."&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2' value='Print Version'></a></td>
        </tr>
		<tr class='evenrow'>
          <td width='30%' colspan='2'>
          <div align='left' ><strong>Project</strong></div></td>
          <td colspan='9'><select name='project' id='project'  style='width:300px;' >
		  <option value=''>-All-</option>";
	
		  $data.=QueryManager::ProjectFilter($program,$project);
		  $data.="</select></td>  
        </tr>
		
		<tr class='evenrow'>
        
          <td width='30%' colspan='3'>
          <div align='left'><strong>Reporting Period</strong></div></td>
          <td colspan=2><select name='semi_annual' id='semi_annual' style='width:150px;'><option value=''>-All-</option>";
		  
		  $sql="select * from tbl_quarters   group by semi_annual order by quarterCode asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("FLRR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['semi_annual']==$ROW['semi_annual'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['semi_annual']."\" ".$selected." >".substr($ROW['semi_annual'],0,500)."</option>";}
		  $data.="</select></td>
		  
		   <td width='30%' colspan=''>
          <div style='float:left;'><strong>Year</strong></div></div>  <td width='30%' colspan=''><div style='float:right;'><select name='year' id='year' style='width:150px;'><option value=''>-All-</option>";
		  
		 $end=date('Y');
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		  $data.="</select></div></td>
       
		  <td colspan=3 align='right'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_training(getElementById('project').value,getElementById('semi_annual').value,getElementById('year').value);return false;\" /></td>
        </tr>";


return $data;
}

// filter trainignReport========================

function  filter_trainingReport(){

$data.="<tr class='evenrow'>
        
          <td width='30%' colspan='2'>
          <div align='left'><strong>Program</strong></div></td>
          <td colspan=3><select name='project' id='project' style='width:300px;'><option value=''>-All-</option>";
		  $sql="select * from tbl_programme  order by prog_id asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['program_id']==$ROW['prog_id'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['prog_id']."\" ".$selected." >".$ROW['program_id']." ".substr($ROW['program_name'],0,500)."</option>";}
		  $data.="</select></td>
       
		  <td colspan='5' align='right'><a href='export_to_excel_word.php?linkvar=Export Training&&format=excel'><input name='export_training' type='button' class='formButton2'value='Export to Excel'></a> | <a href='print_version2.php?linkvar=Print Training&&format=Print' target='_blank'><input name='export_training' type='button' class='formButton2'value='Print Version'></a></td>
    
        </tr>
		
		<tr class='evenrow'>
        
          <td width='30%' colspan='3'>
          <div align='left'><strong>Reporting Period</strong></div></td>
          <td colspan=2><select name='semi_annual' id='semi_annual' style='width:150px;'><option value=''>-All-</option>";
		  
		  $sql="select * from tbl_quarters   group by semi_annual order by quarterCode asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("FLRR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['semi_annual']==$ROW['semi_annual'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['semi_annual']."\" ".$selected." >".substr($ROW['semi_annual'],0,500)."</option>";}
		  $data.="</select></td>
		  
		   <td width='30%' colspan=''>
          <div style='float:left;'><strong>Year</strong></div></div>  <td width='30%' colspan=''><div style='float:right;'><select name='year' id='year' style='width:150px;'><option value=''>-All-</option>";
		  
		 $end=date('Y');
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		  $data.="</select></div></td>
       
		  <td colspan=3 align='right'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_trainingReport(getElementById('project').value,getElementById('semi_annual').value,getElementById('year').value,1,20);return false;\" /></td>
        </tr>";


return $data;
}




function filter_projects(){

$data.="<td colspan='4'><label></label>      <label>
      <div align='right' class='floatright'><input type='button' class='formButton2'name='new_project' value='New Project' onclick=\"xajax_new_project('','');\" /> \t|\t 
       <a href='export_to_excel_word.php?linkvar=Export Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> |  <a href='print_version2.php?linkvar=Print Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=Print'><input type='button' class='formButton2'name='export' value='Print Version' />
    </a>
	
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Program</td>
    <td colspan=5><select name='Program' id='Program' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_programme order by prog_id  asc")or die(http(0018));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['program']==$rowzone['program_name'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['program_name']."\" ".$selectedzone.">".$rowzone['prog_id']."
	   ".retrieve_info_withSpecialCharactersNowordLimit($rowzone['program_name'])."</option>";
	  }
	  $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='3'>Sub-Program/Commodities</td>
    <td colspan=5><select name='subProgram' id='subProgram' class='combobox' ><option value=''>-All-</option>";
	$querysub=mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc")or die(http("PR-0018"));
	while($rowsub=mysql_fetch_array($querysub)){
	$selectedsub=($_SESSION['program']==$rowsub['subcomponent'])?"SELECTED":"";
      $data.="<option value=\"".$rowsub['subcomponent']."\" ".$selectedsub.">".$rowsub['subcomponent_code']." 
	   ".retrieve_info_withSpecialCharactersNowordLimit($rowsub['subcomponent'])."</option>";
	  }
	  $data.="</select></td>
  </tr>
  
  <tr class='evenrow'>
        <td colspan='3' >Country:</td><td colspan='5' ><select name='country' id='country' class='combobox'><option value=''>-All-</option>";
		
		$select=@mysql_query("select * from tbl_country where memberstatus like 'Yes%'  order by countryName") or die(http("FLTR-142"));
		
		while($row=@mysql_fetch_array($select)){
		$data.="<option value=\"".$row['countryName']."\" ".checkExistance($row['countryName'],$_SESSION['country'],'selected').">".retrieve_info_withSpecialCharactersNowordLimit($row['countryName'])."</option>";
		
		}
		$data.="</select></strong></div></td>
        </tr>
  
  
  <tr class='evenrow'>
    <td colspan='3'>Project</td>
    <td colspan=3><select name='Project' id='Project' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_project where display like 'Yes%' order by title  asc")or die(http(0028));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['project']==$rowzone['title'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['title']."\" ".$selectedzone.">
	  ".retrieve_info_withSpecialCharactersNowordLimit($rowzone['project_code'])." 
	  
	   &nbsp;".retrieve_info_withSpecialCharactersNowordLimit($rowzone['title'])."</option>";
	  }
	  $data.="</select></td><td colspan=2>Status</td>
  </tr>
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(0037));
	while($rowOrg1=mysql_fetch_array($query1)){
		$selectedTSO=($_SESSION['organization']==$rowOrg1['orgName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg1['org_code']."\" ".$selectedTSO.">".retrieve_info_withSpecialCharactersNowordLimit($rowOrg1['orgName'])."</option>";
	  }
	  $data.="</select></td><td><select name='status' id='status'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(0044));
	while($rowOrg=mysql_fetch_array($query)){
		$selectedTSO=($_SESSION['status']==$rowOrg['codeName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg['codeName']."\" ".$selectedTSO.">".retrieve_info_withSpecialCharactersNowordLimit($rowOrg['codeName'])."</option>";
	  }
	

	  $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_project(getElementById('Program').value,getElementById('subProgram').value,getElementById('Project').value,getElementById('orgName').value,getElementById('status').value,getElementById('country').value,1,20);return false;\" /></td>
  </tr>";

return $data;

}

//-----------------project report--------------------------
function filter_projectsReportbyFunding(){

$data.="
    <td colspan='6'><label></label>      <label>
      <div align='right' class='floatright'>
       <a href='export_to_excel_word.php?linkvar=Export Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> |  <a href='print_version2.php?linkvar=Print Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=Print' target='_blank'><input type='button' class='formButton2'name='export' value='Print Version' />
    </a>
	
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Program</td>
    <td colspan=5><select name='Program' id='Program' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_programme order by program_name  asc")or die(http(0018));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['program']==$rowzone['program_name'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['program_name']."\" ".$selectedzone.">".$rowzone['program_name']."</option>";
	  }
	  $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='3'>Project</td>
    <td colspan=3><select name='Project' id='Project' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_project where display like 'Yes%' order by title  asc")or die(http(0028));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['project']==$rowzone['title'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['title']."\" ".$selectedzone.">".retrieve_info_withSpecialCharactersNowordLimit($rowzone['project_code'])." 
	   &nbsp;".retrieve_info_withSpecialCharactersNowordLimit($rowzone['title'])."</option>";
	  }
	  $data.="</select></td><td colspan=2>Status</td>
  </tr>
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(0037));
	while($rowOrg1=mysql_fetch_array($query1)){
		$selectedTSO=($_SESSION['organization']==$rowOrg1['orgName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg1['orgName']."\" ".$selectedTSO.">".$rowOrg1['orgName']."</option>";
	  }
	  $data.="</select></td><td><select name='status' id='status'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(0044));
	while($rowOrg=mysql_fetch_array($query)){
		$selectedTSO=($_SESSION['status']==$rowOrg['codeName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg['codeName']."\" ".$sel.">".$rowOrg['codeName']."</option>";
	  }
	

	  $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_projectsByFundingIntsrumentReport(getElementById('Program').value,getElementById('Project').value,getElementById('orgName').value,getElementById('status').value,1,20);return false;\" /></td>
  </tr>";

return $data;

}




function filter_projectsReport(){

$data.="
    <td colspan='6'><label></label>      <label>
      <div align='right' class='floatright'>
       <a href='export_to_excel_word.php?linkvar=Export Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> |  <a href='print_version2.php?linkvar=Print Project&&program=".$_SESSION['program']."&&project=".$_SESSION['project']."&&organization=".$_SESSION['organization']."&&status=".$_SESSION['status']."&&format=Print' target='_blank'><input type='button' class='formButton2'name='export' value='Print Version' />
    </a>
	
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Program</td>
    <td colspan=5><select name='Program' id='Program' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_programme order by program_name  asc")or die(http(0018));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['program']==$rowzone['program_name'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['program_name']."\" ".$selectedzone.">".$rowzone['program_name']."</option>";
	  }
	  $data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='3'>Project</td>
    <td colspan=3><select name='Project' id='Project' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_project where display like 'Yes%' order by title  asc")or die(http(0028));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['project']==$rowzone['title'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['title']."\" ".$selectedzone.">".retrieve_info_withSpecialCharactersNowordLimit($rowzone['project_code'])." 
	   &nbsp;".retrieve_info_withSpecialCharactersNowordLimit($rowzone['title'])."</option>";
	  }
	  $data.="</select></td><td colspan=2>Status</td>
  </tr>
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
	$query1=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(0037));
	while($rowOrg1=mysql_fetch_array($query1)){
		$selectedTSO=($_SESSION['organization']==$rowOrg1['orgName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg1['orgName']."\" ".$selectedTSO.">".$rowOrg1['orgName']."</option>";
	  }
	  $data.="</select></td><td><select name='status' id='status'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc")or die(http(0044));
	while($rowOrg=mysql_fetch_array($query)){
		$selectedTSO=($_SESSION['status']==$rowOrg['codeName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg['codeName']."\" ".$sel.">".$rowOrg['codeName']."</option>";
	  }
	

	  $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_projectReport(getElementById('Program').value,getElementById('Project').value,getElementById('orgName').value,getElementById('status').value,1,20);return false;\" /></td>
  </tr>";

return $data;

}


function filter_indicator(){


$data="<tr CLASS='evenrow'><td width='' align='right' colspan=9><div style='float:right;'>
     <input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_add_indicator('','','','','','','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=".$_SESSION['output']."&&subcomponent=".$_SESSION['subcomponent']."&&strategy=".$_SESSION['indstrategy']."&&siractivity=".$_SESSION['siractivity']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
  
  <tr CLASS='evenrow'>
    <td colspan='2'>Level of Indicator</td>
    <td colspan='8'><select name='indicator_level' id='indicator_level'  onchange=\"xajax_view_indicator(this.value,'".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'><option value='' >-All-</option>";
       
	  $query=mysql_query("select * from tbl_lookup where classCode='24'  order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicator_level']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".$row['codeName']." </option>
        ";
	  }
	  $data.="</select></td></tr>";
	   switch($_SESSION['indicator_level']){
  case "Program":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=2 >Program</td>
    <td colspan='7'><select name='program' id='program' onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	$data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 
	 $data.="</select></td></tr>
   ";
  
  break;
  
  case "Project":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=2 >Program</td>
    <td colspan='7'><select name='program' id='program' onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	$data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='2'>Sub-Program</td>
    <td colspan=7><select name='subprogram' id='subprogram' onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."',this.value,'".$_SESSION['project']."','".$_SESSION['indicator_code']."',1,20);return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_subcomponent sc
	 where prog_id like '".$_SESSION['programme']."%' order by subcomponent_code asc")or die(http("VP-544"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selsubprogramme=($_SESSION['subprogram']==$row1['subcomponent_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['subcomponent_id']."\" ".$selsubprogramme." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='evenrow3'>
  <td width='' colspan='2'>Project:</td>
    <td colspan='7'><select name='project' id='project' class='combobox'  onchange=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value,'".$_SESSION['indicator_code']."',1,20);return false;\">";
 	$data.="<option value='' >-All-</option>";
	$data.=QueryManager::ProjectFilter($_SESSION['programme'],$_SESSION['project']);
	 
	 $data.="</select></td></tr>";
  
  break;
  default:
  $data.="";
  
  
  }

	  
	  
	  
	  
	  
	  
         $data.="<tr class='evenrow'><TD colspan='2'>Indicator/Code:</td><td colspan='6'><input name='indicator_code' id='indicator_code' type='text' size='80' value=\"".$_SESSION['indicator_code']."\"  onKeyUp=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."',this.value,1,20);return false;\" /></TD>
    <td><input name='search' type='button' class='formButton2'value='Go' title='search' onclick=\"xajax_view_indicator(getElementById('indicator_level').value,getElementById('program').value,getElementById('subprogram').value,getElementById('project').value,getElementById('indicator_code').value,1,20);return false;\" class='formButton2' />  </td>
</tr>";
return $data;  

}

//-----------------filter indicaotor Definition---------------------------------------
function filter_indicatorDefinition(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');

$data="<table cellspacing='0'     ><tr CLASS='evenrow'>
   

	


    <td width='' align='right' colspan=6 class='dataRow'><div style='float:right;'>
     <input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_indicatorDefinition('','','','','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=".$_SESSION['output']."&&subcomponent=".$_SESSION['subcomponent']."&&strategy=".$_SESSION['indstrategy']."&&siractivity=".$_SESSION['siractivity']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
  <tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='9'><select name='Program1' class='combobox' id='Program1' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."',this.value,'".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."',1,1);return false;\">";
$data.="<option value=''>-All-</option>"; 

			$data.=QueryManager::ProgramFilter($_SESSION['program']);
				
					 
$data.="</select></td>
        </tr>
  
  			 <tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='9'><select name='project' class='combobox' id='project' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."',1,1);return false;\">";
$data.="<option value=''>-All-</option>"; 

			$data.=QueryManager::ProjectFilter($_SESSION['program'],$_SESSION['project']);
				
					 
$data.="</select></td>
        </tr>
  
  
  <tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='9'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,1);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> ''  group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>"; 
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
				 $data.="<tr class='evenrow'>
              			<td colspan='3'>Output:</td>
              			<td colspan='9'>
						<select name='output' disabled='disabled' class='combobox' id='output' 
						onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."',
						'".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,1);
						return false;\" >";
$data.="<option value=''>-All-</option>"; 

				$query=@mysql_query("select * from tbl_output 
							where type like '".$_SESSION['target_type']."%'  
							order by output_code asc")or die(http("WP-594"));
				while($row=mysql_fetch_array($query)){
							
							$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
							$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
								
									  }  
$data.="</select></td>
        </tr>";
		
				}else {
				$data.="<tr class='evenrow'>
              	<td colspan='3'>Output:</td>
              	<td colspan='9'><select name='output'  class='combobox' id='output'  onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."',
				'".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,1);return false;\" >";
				$data.="<option value=''>-All-</option>"; 

				$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-610"));
						while($row=mysql_fetch_array($query)){
							$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
							$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
								
									  }  
					$data.="</select></td>
							</tr>";
		
		
		
		
		} 
			 $data.="<tr class='evenrow'>
						  <td colspan='3'>Indicator:</td>
						  <td colspan='2'>
							 <select name='indicator' id='indicator' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,1);return false;\" class='combobox'><option value=''>-All-</option>";
						  
			$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
			while($row=mysql_fetch_array($query)){
					$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
			$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
							
								  }  
			$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,1);return false;\" /></td>
						</tr>";

return $data;

}













//====================old filters from other area=============================================
function filter_zonalMapping(){

$data.="<tr class='evenrow'>
  
    <td colspan='5'><label></label>      <label>
      <div align='right' class='floatright'>
       <a href='export_to_excel_word.php?linkvar=Export Zonal Mapping&&zone=".$_SESSION['zone']."&&tso=".$_SESSION['tso']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='2'>Zone</td>
    <td colspan=3><select name='zonename' id='zonename' class='combobox' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_zone order by zoneName  asc")or die(http(2244));
	while($rowzone=mysql_fetch_array($queryzone)){
	$selectedzone=($_SESSION['zone']==$rowzone['zoneName'])?"SELECTED":"";
      $data.="<option value=\"".$rowzone['zoneName']."\" ".$selectedzone.">".$rowzone['zoneName']."</option>";
	  }
	  $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan='2'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(2244));
	while($rowOrg=mysql_fetch_array($query)){
		$selectedTSO=($_SESSION['tso']==$rowOrg['orgName'])?"SELECTED":"";
      $data.="<option value=\"".$rowOrg['orgName']."\" ".$selectedTSO.">".$rowOrg['orgName']."</option>";
	  }
	  $data.="</select> | \t<input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_zonalMapping(getElementById('zonename').value,getElementById('orgName').value);return false;\" /></td>
  </tr>";

return $data;

}


function filter_programme(){

$data="<tr class='evenrow'>
    <td colspan=3></td>

    <td width='154' align='right'><input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_add_programme();return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
  <tr CLASS='evenrow'>
  <td width=''>PROGRAM </td>
    <td colspan=2><select name='program' id='program' class='combobox2'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
	  while($row1=mysql_fetch_array($query1)){
	  $selprogramme=($_SESSION['programme']==$row1['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['program_name']."\" ".$selprogramme.">".substr($row1['program_name'],0,40)."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
    <td><input name='search' type='button' class='formButton2'value='Go'  onclick=\"xajax_view_programme(getElementById('program').value,'');return false;\"/></td>
    <td>&nbsp;</td>
    
  </tr>
";
return $data;

}

//-------------------------
function filter_supergoal(){

$data="<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan='8' align='right'><input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_supergoal('','','','');return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
  
  <tr class='display_none'>
  <td width='' colspan=3 >Program</td>
    <td colspan='8'><select name='program' id='program' onchange=\"xajax_view_supergoal('".$_SESSION['output_name']."',this.value,'','','','');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("SELECT p.`prog_id` , p.`program_id` , p.`output_id` ,
	  p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	  FROM `tbl_programme` p
	  LEFT JOIN tbl_output o 
	  ON ( o.output_id = p.output_id ) where o.output_name like '".$_SESSION['output_name']."%' order by program_name asc")or die(http("VP-711"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selprogramme=($_SESSION['programme']==$row1['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['program_name']."\" ".$selprogramme.">".$row1['program_name']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Sub-Program</td>
    <td colspan=8><select name='subprogram' id='program' onchange=\"xajax_view_supergoal('".$_SESSION['output_name']."','".$_SESSION['programme']."',this.value,'','','');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_subcomponent sc
	  left join tbl_programme p on(sc.prog_id=p.prog_id) 
	  left join tbl_output o on(o.output_id=sc.output_id)
	  where o.output_name like '".$_SESSION['output_name']."%' and p.program_name like '".$_SESSION['programme']."%' order by subcomponent_code asc")or die(http("VP-544"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selsubprogramme=($_SESSION['subprogramme']==$row1['program_name'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['program_name']."\" ".$selsubprogramme." >".$row1['program_name']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Project:</td>
    <td colspan=6><select name='project' id='project' class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("SELECT pr.title, sc.subcomponent
FROM tbl_project pr
LEFT JOIN tbl_subcomponent sc ON ( sc.subcomponent_id = pr.subprogram_id )
 where sc.subcomponent like '".$_SESSION['subprogramme']."%' order by title asc")or die(http("VP-565"));
	  while($row1=mysql_fetch_array($query1)){
	  $selprogramme=($_SESSION['project']==$row1['title'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['title']."\" ".$selprogramme.">".$row1['selcodeName']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3' >Super Goal Type:</td>
    <td colspan=6><select name='type' id='type' class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(mysql_error());
	  while($row1=mysql_fetch_array($query1)){
	  $selcodeName=($_SESSION['codeName']==$row1['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['codeName']."\" ".$selcodeName." >".$row1['codeName']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr CLASS='evenrow'>
  <td width='' colspan='3'>Super Goal </td>
    <td colspan='6'><select name='supergoal' id='supergoal' class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_supergoal order by component asc")or die(http("VP-599"));
	  while($row1=mysql_fetch_array($query1)){
	  $selsupergoal=($_SESSION['supergoal']==$row1['component'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['component']."\" ".$selsupergoal.">".$row1['component']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
    <td><input name='search' type='button' class='formButton2'value='Go'  onclick=\"xajax_view_supergoal('','','','','',getElementById('supergoal').value);return false;\"/></td>

    
  </tr>
";
return $data;

}



function filter_goal(){

$data="<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan='10' align='right'><input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_goal('','','','');return false;\" />
      | <label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
   <tr class='evenrow3'>
  <td width='' colspan='3' >Goal Level:</td>
    <td colspan=8><select name='type' id='type' class='combobox' onchange=\"xajax_view_goal(this.value,'".$_SESSION['program']."','".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\"/>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=@mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(@mysql_error());
	  while($row1=@mysql_fetch_array($query1)){
	  $selcodeName=($_SESSION['goal_type']==$row1['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['codeName']."\" ".$selcodeName." >".$row1['codeName']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   </tr>";
  switch($_SESSION['goal_type']){
  case "Program":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='7'><select name='program' id='program' onchange=\"xajax_view_goal('".$_SESSION['goal_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("SELECT p.`prog_id` , p.`program_id` , p.`output_id` ,
	  p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	  FROM `tbl_programme` p
	   order by prog_id asc")or die(http("VP-847"));
	  while($row1=@mysql_fetch_array($query1)){
	  
	  $selprogramme=($_SESSION['programme']==$row1['prog_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['prog_id']."\" ".$selprogramme.">".$row1['program_id']." ".$row1['program_name']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   ";
  
  break;
  
  case "Project":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='8'><select name='program' id='program' onchange=\"xajax_view_goal('".$_SESSION['goal_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	/* 
	 $query1=mysql_query("SELECT p.`prog_id` , p.`program_id` , p.`output_id` ,
	  p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	  FROM `tbl_programme` p
	   order by prog_id asc")or die(http("VP-847"));
	  while($row1=@mysql_fetch_array($query1)){
	  
	  $selprogramme=($_SESSION['programme']==$row1['prog_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['prog_id']."\" ".$selprogramme.">".$row1['program_id']." ".$row1['program_name']."</option>";
	  
	   } */
	 	$data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Sub-Program</td>
    <td colspan=8><select name='subprogram' id='subprogram' onchange=\"xajax_view_goal('".$_SESSION['goal_type']."','".$_SESSION['programme']."',this.value,'".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_subcomponent sc
	 where prog_id like '".$_SESSION['programme']."%' order by subcomponent_code asc")or die(http("VP-544"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selsubprogramme=($_SESSION['subprogram']==$row1['subcomponent_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['subcomponent_id']."\" ".$selsubprogramme." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='evenrow3'>
  <td width='' colspan='3'>Project:</td>
    <td colspan='7'><select name='project' id='project' class='combobox'  onchange=\"xajax_view_goal('".$_SESSION['goal_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value);return false;\">";
 	$data.="<option value='' >-All-</option>";
	
	/*  $query1=@mysql_query("SELECT * FROM tbl_project 
	 						where subprogram_id like '".$_SESSION['subprogram']."%' 
							order by title asc")or die(http("VP-565"));
	  while($row1=@mysql_fetch_array($query1)){
	  $selprogramme=($_SESSION['project']==$row1['id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['id']."\" ".$selprogramme.">".$row1['project_code']." ".$row1['title']."</option>";
	  
	   } */
	   $data.=QueryManager::ProjectFilter($_SESSION['programme'],$_SESSION['project']);
	 
	 
	 $data.="</select></td>";
  
  break;
  default:
  $data.="<tr class='evenrow'><td colspan='10'></td>";
  
  
  }
  
$data.="<td><input name='search' type='button' class='formButton2'value='Go'  onclick=\"xajax_view_goal(getElementById('type').value,getElementById('program').value,getElementById('subprogram').value,getElementById('project').value);return false;\"/></td>

    
  </tr>
";
return $data;

}

function filter_purpose(){

$data="<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan='10' align='right'><input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_purpose('','','','','','');return false;\" />
      | <label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=".$_SESSION['programme']."&&funder=".$_SESSION['funder']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
   <tr class='evenrow3'>
  <td width='' colspan='3' >Purpose Level:</td>
    <td colspan=8><select name='type' id='type' class='combobox' onchange=\"xajax_view_purpose(this.value,'".$_SESSION['program']."','".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\"/>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=@mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(@mysql_error());
	  while($row1=@mysql_fetch_array($query1)){
	  $selcodeName=($_SESSION['purpose_type']==$row1['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['codeName']."\" ".$selcodeName." >".$row1['codeName']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   </tr>";
  switch($_SESSION['purpose_type']){
  case "Program":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='7'><select name='program' id='program' onchange=\"xajax_view_purpose('".$_SESSION['purpose_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	$data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 $data.="</select></td>
   ";
  
  break;
  
  case "Project":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='8'><select name='program' id='program' onchange=\"xajax_view_purpose('".$_SESSION['purpose_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	$data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Sub-Program</td>
    <td colspan=8><select name='subprogram' id='subprogram' onchange=\"xajax_view_purpose('".$_SESSION['purpose_type']."','".$_SESSION['programme']."',this.value,'".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_subcomponent sc
	 where prog_id like '".$_SESSION['programme']."%' order by subcomponent_code asc")or die(http("VP-544"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selsubprogramme=($_SESSION['subprogram']==$row1['subcomponent_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['subcomponent_id']."\" ".$selsubprogramme." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='evenrow3'>
  <td width='' colspan='3'>Project:</td>
    <td colspan='7'><select name='project' id='project' class='combobox'  onchange=\"xajax_view_purpose('".$_SESSION['purpose_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value);return false;\">";
 	$data.="<option value='' >-All-</option>";
	$data.=QueryManager::ProjectFilter($_SESSION['programme'],$_SESSION['project']); 
	 $data.="</select></td>";
  
  break;
  default:
  $data.="<tr class='evenrow'><td colspan='10'></td>";
  
  
  }
  
$data.="<td><input name='search' type='button' class='formButton2'value='Go'  onclick=\"xajax_view_purpose(getElementById('type').value,getElementById('program').value,getElementById('subprogram').value,getElementById('project').value);return false;\"/></td>

    
  </tr>
";
return $data;

}




#--------------------------------------------------------------------------

function filter_projectLifeFinancialTargets(){

$data="<tr>
F
    <th scope='col' colspan='2'>Programme</th><th colspan=3>
      <select name='programme100' size='1' id='programme100'><option value='%' >-All-</option>";
	  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
  $sel=($programme100=$row['program_name'])?"SELECTED":"";
	  $data.="<option value='".$row['program_name']."' '".$sel."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select><div style='float:right'><input name='New Entry' value='New Entry' type='button' class='formButton2'onclick=\"xajax_projectLifeFinancialBudget('')\"/><a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=".$_SESSION['programme100']."&&subcomponent=".$_SESSION['subcomponent100']."&&output=".$_SESSION['output100']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></div>
    </th>
   
  
  </tr>";
 /* $data.=" <tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>
  <option value='%'  >-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	 $sel=($_SESSION['subcomponent100']=$row['subcomponent'])?"SELECTED":"";
	  $data.="<option value='".$row['subcomponent']."' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  }
	  
	  $data.="</select></th><th></th></tr>";onchange=\"xajax_projectLifeFinancialBudget(getElementById('subcomponent').value);\" */
$data.="<tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>";
if($subcomponent100!='')
$data.="<option value='".$subcomponent100."' />".$subcomponent100."</option>";
else
$data.="<option value='%' />-All-</option>";
	  $query2=mysql_query("select * from tbl_subcomponent  order by subcomponent_code desc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query2)){
	   #$selected2=($_SESSION['ssubcomponent_id']==$row2['id'])?"SELECTED":"";
	   //if($_SESSION['ssubcomponent_id']==$row['id'])
	  $data.="<option value='".$row2['subcomponent']."' '".$selected2."'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }

	  
	  $data.="</select></th><th></th></tr>
  <tr>


    <th scope='col' colspan='2'>Output</th><th colspan=2>
      <select name='output100' size='1' id='output100' >";
	  if($output100!='')
	  $data.="<option value='".$output100."' >".$_SESSION['output100']."</option>";
	  else
	  $data.="<option value='%' >-All-</option>";
	 
	  $query=mysql_query("select * from tbl_output order by output_code asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	   #$selected2=($_SESSION['output100']==$row['output_name'])?"SELECTED":"";
	  $data.="<option value='".$row['output_name']."' '".$selected2."'>".$row['output_code']." ".$row['output_name']."</option>";
	  }
	  
	  $data.="</select>
    </th> <th scope='col'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value)\" /></th>
   
  </tr>";

return $data;


}





function filter_ProgramResultsProjectLifeFinancialTargets(){

$data="<tr class=evenrow>

    <td scope='col' colspan='2'>Programme</td><td colspan=3>
      <select name='programme100' size='1' id='programme100'><option value='%' >-All-</option>";
	  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
  $sel=($programme100=$row['program_name'])?"SELECTED":"";
	  $data.="<option value='".$row['program_name']."' '".$sel."'>".$row['program_name']."</option>";
	  }
	  
	  $data.="</select><div style='float:right'><a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=".$_SESSION['programme100']."&&subcomponent=".$_SESSION['subcomponent100']."&&output=".$_SESSION['output100']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></div>
    </td>
   
  </tr>";
 /* $data.=" <tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>
  <option value='%'  >-All-</option>";
	  $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	 $sel=($_SESSION['subcomponent100']=$row['subcomponent'])?"SELECTED":"";
	  $data.="<option value='".$row['subcomponent']."' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  }
	  
	  $data.="</select></th><th></th></tr>";onchange=\"xajax_projectLifeFinancialBudget(getElementById('subcomponent').value);\" */
$data.="<tr class='evenrow'> <td scope='col' colspan='2'>SUB-COMPONENT:</td> <td scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>";
if($subcomponent100!='')
$data.="<option value='".$subcomponent100."' />".$subcomponent100."</option>";
else
$data.="<option value='%' />-All-</option>";
	  $query2=mysql_query("select * from tbl_subcomponent  order by subcomponent_code desc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query2)){
	   #$selected2=($_SESSION['ssubcomponent_id']==$row2['id'])?"SELECTED":"";
	   //if($_SESSION['ssubcomponent_id']==$row['id'])
	  $data.="<option value='".$row2['subcomponent']."' '".$selected2."'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }

	  
	  $data.="</select></td><td></td></tr>
  <tr class='evenrow'>


    <td scope='col' colspan='2'>Output</td><td colspan=2>
      <select name='output100' size='1' id='output100' >";
	  if($output100!='')
	  $data.="<option value='".$output100."' >".$_SESSION['output100']."</option>";
	  else
	  $data.="<option value='%' >-All-</option>";
	 
	  $query=mysql_query("select * from tbl_output order by output_code asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	   #$selected2=($_SESSION['output100']==$row['output_name'])?"SELECTED":"";
	  $data.="<option value='".$row['output_name']."' '".$selected2."'>".$row['output_code']." ".$row['output_name']."</option>";
	  }
	  
	  $data.="</select>
    </td> <td scope='col'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value)\" /></td>
   
  </tr>";

return $data;


}











function filter_TSOfinancialctuals(){
#'".$_SESSION['usersubcomponent']."','".$activity_id."','".$org_code.",'".$orgname."'
 $data.="<tr class=evenrow><td colspan=2>Year</td>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
                $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select>
    </td><td class=evenrow colspan=2>Quarter:
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters order by quarterCode")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['quarterName']."'>".$row2['quarterName']."</option>";
	  }
              $data.="</select> <div style='float:right;'>
                              
                <input name='new_entry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals('".$_SESSION['usersubcomponent']."','','".$_SESSION['managerorg_code']."','".$_SESSION['orgName']."');return false;\" /> |
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=".$_SESSION['usersubcomponent']."&&org_code=".$_SESSION['managerorg_code']."&&orgname=".$_SESSION['orgName']."&&subactivity=".$_SESSION['subactivity107']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> </div></td></tr>
			  <tr class='evenrow'><td colspan=2>Intermediate Result Area</td><td colspan=3><select name='subcomponent' id='subcomponent' >";
			 
$data.="
                <option value='%'>-All-</option>
                "; 

$query=mysql_query("select * from tbl_subcomponent  order by id asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected=$_SESSION['titlesubcomponent']==$row['subcomponent']?"SELECTED":"";
$data.="
                <option value='".$row['id']."' '".$selected."'>".$row['subcomponent_code']." ".substr($row['subcomponent'],0,70)."</option>
                ";
				
					  }  
$data.="</select></td>
<tr class='evenrow'>  <td colspan=2>Sub-Intermediate Result Area</td><td colspan=2><select name='subactivity' id='subactivity' >";		 
$data.="<option value='%'>-All-</option>
                "; 


$query=mysql_query("select * from tbl_output  order by output_id asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){

$data.="<option value='".$row['output_name']."%'>".$row['output_code']." ".substr($row['output_name'],0,70).";</option>";
				
					  }  
$data.="</select></td>
              <td><input type='button' class='formButton2'name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value,".$_SESSION['managerorg_code'].",".$_SESSION['orgName'].",getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value)\" /></td>
            </tr>
            ";

return $data;
}




function filter_vcdActuals_Manager(){
#'".$_SESSION['usersubcomponent']."','".$activity_id."','".$org_code.",'".$orgname."'

$data="<tr class=''>
              <td colspan=3 class='green_field'>Program Monitoring  &raquo; ".ucwords($_SESSION['titlesubcomponent'])." 
  </td>
              <td colspan=2 class='green_field'><div align='right'>
                              
                <input name='new_entry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals_Manager('".$_SESSION['usersubcomponent']."','','".$_SESSION['managerorg_code']."','".$_SESSION['orgName']."');return false;\" />
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=".$_SESSION['usersubcomponent']."&&org_code=".$_SESSION['managerorg_code']."&&orgname=".$_SESSION['orgName']."&&subactivity=".$_SESSION['subactivity107']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> </div></td>
  </tr>
				 <tr>
              <td colspan='6'><hr/></td></tr>
		
		<tr class=evenrow>
              <td>
                <label>Year</label></td>
              <td>Quarter</td>
              <td>Sub-
                
              component</td>
              <td>Sub-Activity</td>
              <td>&nbsp;</td>
		</tr>
";
           
			
            $data.="<tr class=evenrow2>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
                $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="</select>
    </label></td>
    <td class=evenrow><label>
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
	   $query=mysql_query("select * from tbl_quarters order by quarterCode")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['quarterName']."'>".$row2['quarterName']."</option>";
	  }
              $data.="</select></td>
             
              <td><select name='subcomponent' id='subcomponent' >";
			 
$data.="
                <option value='%'>-All-</option>
                "; 

$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected=$_SESSION['titlesubcomponent']==$row['subcomponent']?"SELECTED":"";
$data.="
                <option value='".$row['id']."' '".$selected."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>
                ";
				
					  }  
$data.="</select></td><td><select name='subactivity' id='subactivity' >";		 
$data.="<option value='%'>-All-</option>
                "; 


$query=mysql_query("select * from tbl_subactivity where subcomponent_id='".$_SESSION['usersubcomponent']."' order by subact_id asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){

$data.="<option value='".$row['subcativity_name']."%'>".$row['subactivity_code']."".substr($row['subactivity_name'],0,40).";</option>";
				
					  }  
$data.="</select></td>
              <td><input type='button' class='formButton2'name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value,".$_SESSION['managerorg_code'].",".$_SESSION['orgName'].",getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value)\" /></td>
            </tr>
            ";

return $data;
}







function filter_users(){

$data="
<tr class=evenrow>
     </td>
	
	
	<td scope='col' COLSPAN='9'><div style='float:right;'><input type='button' class='formButton2'name='button' id='button' value='Add User' onclick=\"xajax_new_user();return false;\"  /> | <a href='export_to_excel_word.php?linkvar=Export User&&name=".$_SESSION['name1']."&&username=".$_SESSION['user1']."&&usergroup=".$_SESSION['usergroup1']."&&role=".$_SESSION['role1']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a></div></td>
	</tr>
 
	 <tr class=evenrow>
 
</td>
	
	</tr>
	
	
	
	<tr class='evenrow'>
    <td scope='col' colspan=''>ROLE:</td><td colspan='5'><select name='role1' id='role1'>";
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select * from tbl_role  where role_name <> '' group by role_name order by role_name asc")or die(@mysql_error());
while($row=mysql_fetch_array($query)){
$select=($_SESSION['role1']==$row['role_name'])?"selected":"";
$data.="<option value=\"".$row['role_name']."\" ".$select.">".$row['role_name']."</option>";

}


$data.="</select></td><td scope='col' colspan=''>USER GROUP</td> <td colspan=2><select name='usergroup' id='usergroup'>";
	if($_SESSION['usergroup1']!='')
	$data.="<option  value='".$_SESSION['usergroup1']."'>".$_SESSION['usergroup1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select * from tbl_usergroup order by group_name asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['group_name']."'>".$row['group_name']."</option>";

}

$data.="</select>  
    
    

  </tr>
<tr class=evenrow>
    <td scope='col' COLSPAN=''>NAME</td>
	
	<td COLSPAN='5'><select id='name1' name='name1'>";
	if($_SESSION['name1']!='')
	$data.="<option  value='".$_SESSION['name1']."'>".$_SESSION['name1']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select name from tbl_user order by name asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['name']."'>".substr($row['name'],0,40)."</option>";

}

$data.="
    </select>   </td>
	 <td scope='col' COLSPAN=''>USENAME:</td>
	<td COLSPAN=''><select id='username' name='username' >";
	if($_SESSION['name1']!='')
	$data.="<option  value='".$_SESSION['username']."'>".$_SESSION['username']."</option>";
	else
	$data.="<option  value=''>-All-</option>";
$query=mysql_query("select username from tbl_user order by username asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['username']."'>".substr($row['username'],0,40)."</option>";
}


$data.="</select> <td align='right'><input name='filter' type='button' class='formButton2'value='Go' onclick=\"xajax_view_users(getElementById('name1').value,
	 getElementById('username').value,
	 getElementById('usergroup').value,
	 getElementById('role1').value);
	 return false;\" /></td> 
	</tr>";

return $data;
}


function filter_systemlogs(){

$data="<tr class='evenrow'>
    <td width='144' scope='col'><di>
    <div align='left'><b>Log  ID</b> </div></td>
    <td width='84' scope='col'><div align='left'><b>Username</b></div></th>
    <td width='145' scope='col'><div align='left' colspan='3' ><b>Ip Address</b></div></th>
    <td width='209' colspan='3' scope='col' ><div align='right'><div style='float:left;'><b>Status</b></div> <a href='export_to_excel_word.php?linkvar=Export System Logins&&log_id=".$_SESSION['login_id']."&&username=".$_SESSION['username1']."&&ipaddress=".$_SESSION['ipaddress']."&&status=".$_SESSION['status']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class=evenrow>
    <td><label>
      <input type='text' name='logid' id='logid' value='".$_SESSION['login_id']."' />
    </label></td>
    <td><label>
      <select name='username' id='username'>
	  <option value=''>-All-</option>";
	  if($_SESSION['username1']!='')
	 $data.="<option value='".$_SESSION['username1']."'>".$_SESSION['username1']."</option>";
	 else $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from tbl_login l join tbl_user u on(l.user_id=u.user_id) group by username order by username asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  
	  	  $data.="<option value='%".$row['username']."'>".$row['username']."</option>";
		  
		  }
      $data.="</select>
    </label></td>
    <td colspan=''><input type='text' name='ipaddress'  id='ipaddress' value='".$_SESSION['ipaddress']."'/></td><td colspan=2><select name='status' id='status'>";
	if($_SESSION['status']!='')
	 $data.="<option value='".$_SESSION['status']."'>".$_SESSION['status']."</option>";
	 else $data.="<option value=''>-All-</option>";
	  $query=mysql_query("select * from tbl_login group by status order by status asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  
	  	  $data.="<option value='".$row['status']."'>".$row['status']."</option>";
		  
		  }
      $data.="</select></td>
    <td><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_login(getElementById('logid').value,getElementById('username').value,getElementById('ipaddress').value,getElementById('status').value,1,20);return false;\" />
    </label></td>
  </tr>";
return $data;


}



function filter_activityBasedPlanning(){
$data=" 
		 <tr class=''>
              <td colspan='3' class='green_field'><div style='float:left;'>Planning &raquo; Results Based Project Life Targets
                </div><div style='float:right;'><input name='new_entry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_newResultsBasedIndicatorProjectLifePlanning('".$_SESSION['activity']."','');return false;\" /><a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=".$_SESSION['activity']."&&programme=".$_SESSION['programme']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></div></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>
		<tr class=evenrow2>
              <td colspan=''>Programme:</td>
              <td colspan='2'><select name='programme' id='programme'>
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die("Sunrise Error-code:264 because, ".mysql_error());
				while($row=mysql_fetch_array($q)){
				$selected=($_SESSION['programme104']==$row['program_name'])?"SELECTED":"";
				$data.="<option value='".$row['program_name']."%' '".$selected."' >".$row['program_name']."</option>";
				
				}
              $data.="</select>              </td>
            </tr>
		<tr class=evenrow>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan=''><select name='subcomponent' id='subcomponent' ><option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected2=($_SESSION['subcomponent104']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value='".$row['subcomponent']."%' '".$selected2."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_activityBasedPlanning('Results Based',getElementById('programme').value,getElementById('subcomponent').value)\" /></td>
        </tr>
";
           
			
            $data.="
            <tr class='evenrow'>
             
              <td colspan='3' class='evenrow'><div align='center'><strong> Results Based Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=>Select</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

return $data;
}

function filter_subactivityBasedPlanning(){


$data="<tr class=''>
              <td colspan='3' class='green_field'>Planning &raquo; Sub-Activity Project Life Targets
                <label></label></td><td width='300' align=right colspan='2'><input name='new_entry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_subactivityBasedIndicatorPlanning('".$activity."','','');return false;\" />  <a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=".$_SESSION['activity']."&&programme=".$_SESSION['programme']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='5'><hr/></td></tr>";
			  $data.="<tr class=evenrow2>
             <td >Programme:</td><td colspan='4'> 
             <select name='programme' id='programme103' >
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die("Sunrise Error-code:197 because, ".mysql_error());
				while($row=mysql_fetch_array($q)){
				$sel=($programme==$row['program_name'])?"SELECTED":"";
				$data.="<option value='".$row['program_name']."%'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>
		
		<tr class=evenrow>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan='4'><select name='subcomponent' id='subcomponent103' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['subcomponent11']==$row['subcomponent'])?"SELECTED":"";
$data.="<option value='".$row['subcomponent']."%' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Output:
                <label></label></td>
              <td colspan='4'><select name='output' id='output103' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output order by output_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['output']==$row['output_name'])?"SELECTED":"";
$data.="<option value='".$row['output_name']."%' '".$sel."'>".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Activity:
                <label></label></td>
              <td colspan='4'><select name='activity' id='activity103' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_activity order by activity_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['activity']==$row['activity_name'])?"SELECTED":"";
$data.="<option value='".$row['activity_name']."%' '".$sel."'>".$row['activity_code']." ".$row['activity_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Sub-Activity:
                <label></label></td>
              <td colspan='4'><select name='subactivity' id='subactivity103' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subactivity order by subactivity_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['subactivity']==$row['subactivity_name'])?"SELECTED":"";
$data.="<option value='".$row['subactivity_name']."%' '".$sel."'>".$row['subactivity_code']." ".substr($row['subactivity_name'],0,70)."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Indicator:
                <label></label></td>
              <td colspan='3'><select name='indicator' id='indicator103' >";
	
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator  group by indicator_name order by indicator_name asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['']==$row['indicator_name'])?"SELECTED":"";
$data.="<option value='".$row['indicator_name']."%'>".substr($row['indicator_name'],0,70)."</option>";
//'".$activity."',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value

					  }  
$data.="</select></td><td align='right'><input name='search' type='button' class='formButton2'value='Go' onClick=\"xajax_subActivityBasedIndicatorPlanning('".$activity."',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value);return false;\" /></td>
        </tr>

            <tr class='evenrow'>
             
              <td colspan='5' class='evenrow'><div align='center'><strong> Results Based Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			<td colspan='' class='evenrow2' >Code</td>
			<td colspan='' class='evenrow2' >Subactivity</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

return $data;
}


function filter_SunriseTrustBasedPlanning(){
$data=" 
		 <tr class=''>
              <td colspan='2' class='green_field'>Planning &raquo; Results Based Project Life Targets
                <label></label></td><td width='300' align=right><input name='new_entry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_ABTrustBasedIndicatorPlanning('".$activity."','');return false;\" /> <a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=".$_SESSION['activity']."&&programme=".$_SESSION['programme']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>";
		
		
			
           $data.="<tr class=evenrow>
              <td colspan='3'>Programme: 
           <select name='programme' id='programme' onchange=\"xajax_ABTrustBasedIndicatorPlanning('Sunrise trust',getElementById('programme').value)\">
                <option value=''>-All-</option>";
				$q=mysql_query("select * from tbl_programme order by prog_id asc")or die("Sunrise Error-code:197 because, ".mysql_error());
				while($row=mysql_fetch_array($q)){
				$sel=($_SESSION['programme101']==$row['program_name'])?"SELECTED":"";
				$data.="<option value='".$row['program_name']."%'  '".$sel."'>".$row['program_name']."</option>";
				
				}
              $data.="</select>     </td>
            </tr>
            <tr class='evenrow'>
             
              <td colspan='3' class='evenrow'><div align='center'><strong> Sunrise Trust Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

return $data;
}








function filter_resultsBasedIndicator(){
 $data=" 
		 <tr class=''>
              <td colspan='8' class='green_field'>Planning &raquo; Physical Project Life Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='8'><hr/></td></tr>
		 <tr class=evenrow2>
              <td colspan='2'>Indicator Class:
                <label></label></td>
              <td colspan='6'><select name='planning_type' id='planning_type' onchange=\"xajax_reload_newActivityBasedPlanning(getElementById('planning_type').value)\"><option value=''>-Select-</option>";
			
$queryt=mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc")or die(mysql_error());
while($rowt=mysql_fetch_array($queryt)){
if($_SESSION['activity']!='')
$selected=$row['indicator_type']==$rowt['indicator_type']?"SELECTED":"";
//$data.="<option value='".$_SESSION['activity']."'>".$_SESSION['activity']."</option>";

$data.="<option value='".$rowt['indicator_type']."' '".$selected."'>".$rowt['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='6'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_newProjectLifeTarget_subcomponent(getElementById('subcomponent').value)\">";
			  if($_SESSION['PLTsubcomponent_id']!='')
$data.="<option value='".$_SESSION['PLTsubcomponent_id']."'>".$_SESSION['PLTsubcomponent_code']." ".$_SESSION['PLTsubcomponent']."</option>";

else
$data.="<option value=''>-Select-</option>"; 
$querysc=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(mysql_error());
while($rowsc=mysql_fetch_array($querysc)){
$data.="<option value='".$rowsc['id']."'>".$rowsc['subcomponent_code']." ".$rowsc['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
";
          
			
            $data.="<tr class=evenrow2>
              <td colspan='2'>Period</td>
              <td colspan='6'><select name='period' id='period'>
                <option value='4'>4Yrs</option>
              </select>              </td>
            </tr>";

return $data;
}


function filter_narratives(){
$data="<tr>
    <th width='' scope='col' >Year <select name='year'><option value=''>-All-</option>";
           $year=date(Y); $end=$year;
		   do{
		   $data.="<option value='".$end."'>".$end."</option>";
		   $end--;}
		   while($end>=2010);
                $data.="</select>  </th><th>REPORTING PERIOD<select name='reportingperiod'><option value=''>-All-</option>";
           $ss=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(mysql_error());
		   while($r=mysql_fetch_array($ss)){
		   $data.="<option value='".$r['quarterName']."%'>".$r['quarterName']."</option>";}
                $data.="</select></th>
    <th width='' scope='col' colspan=2><input type='button' class='formButton2'name='button' id='button' value='Export to Excel' />";
	 if($_SESSION['role']=='Managing Director')
		$data.="";
		else if($_SESSION['role']=='Chief Technical Advisor')
		$data.="";
		else{
    $data.="<input type='button' class='formButton2'name='button2' id='button2' value='New Entry' onclick=\"xajax_new_narrative()\"/>";
	}
	$data.="</th>
  </tr>
  <tr>
    <th width='' scope='col' >SUB-COMPONENT </th><th>  <select name='select'><option value=''>-All-</option>";
            $query=mysql_query("select * from tbl_subcomponent order by id")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['id']."%'>".$row2['subcomponent_code']." ".$row2['subcomponent']."</option>";
	  }
                $data.="</select></th>
    <th width='' scope='col' colspan=2></th>
  </tr>
   <tr>
    <th width='' scope='col' >INDICATOR</th><th colspan=3> <select name='indicator_id' id='indicator_id'><option value=''>-All-</option>";
            $query=mysql_query("select * from tbl_indicator order by indicator_id")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['indicator_id']."%'>".substr($row2['indicator_name'],0,50)."</option>";
	  }
$data.="</select></th>
    
  </tr>
";

}



function filter_userGroup(){
$data.=" <table cellspacing='0'      width='600'><tr>
    
  <tr class='evenrow'>
    <td scope='col'>&nbsp;</td>
    <td scope='col'><div align='right'>GROUP NAME</div></td>
    <td scope='col'><div align='left' width=100>
      <select name='group_name' id='group_name' onchange=\"xajax_view_usergroup(getElementById('group_name').value);return false;\"><option value=''>-All-</option>";
       $query=mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="<option value='".$row['group_name']."%'>".substr($row['group_name'],0,40)."</option>";
   }
      $data.="</select>
    </div></td>
    <td scope='col' align=right><div id='' align='right'><input name='newentry' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_usergroup()\" /> | <input name='' type='button' class='formButton2'value='Export to Excel' />  </div></td>
  </tr></table>";
return $data;
}



function filter_activityBasedIndicator(){
$data.=" <tr>
             
			  <tr><td colspan=''>Indicator Type <select name='planning_type' id='planning_type' onchange=\"xajax_selectActivityBasedReporting(getElementById('planning_type').value)\" >";
			if($_SESSION['activity']!='')
			$data.="<option value='".$_SESSION['activity']."'>".$_SESSION['activity']."</option>";
$data.="<option value=''>-Select-</option>"; 
$query=mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['indicator_type']."'>".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td><td>
			  Year <select name='year' id='year'>
			  <option value='%'>-All-</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
                  <option value='2010'>2010</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
              </select>
			  </td></tr>
 

            <tr>
            ";
return $data;

}
//



 function selectfis(){
//$obj=new xajaxResponse();
$data="
  <tr>
    <td><div align='right'>Quarterly Reporting Category:</div></td>
    <td><select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchValueChainQuarterlyReporting(getElementById('project_lifeplanning').value,'".$org_code."','".$orgname."');return false;\">";
	  $data.="<option value=''>-Select-</option>";
	   if($_SESSION['usersubcomponent']=='2'){
        $data.="<option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>";
		$query=mysql_query("select * from tbl_lookup where classCode=4")or die(mysql_error());
		while($row=mysql_fetch_array($query)){
        $data.="<option value='".$row['codeName']."'>".$row['codeName']."</option>";
	        }
		}
		else{
		$query=mysql_query("select * from tbl_lookup where classCode='4'")or die(mysql_error());
		while($row=mysql_fetch_array($query)){
        $data.="<option value='".$row['codeName']."'>".$row['codeName']."</option>";
			}
		}
      $data."</select></td>

  </tr>";
return $data;
}



function filter_TSOquantitativeResultsReport(){

$_SESSION['wpsubcomponent']=$resultsarea;
$_SESSION['subintermediateResultArea']=$subresultarea;
$_SESSION['fyear']=$year;
$_SESSION['indicator_12']=$indicator;
$data="
  <tr class='evenrow'>
    
    <td width='105' scope='col' colspan=18>
      <div align='right'>
        <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Results Report&&resultarea=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['subintermediateResultArea']."&&indicator=".$_SESSION['indicator_12']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a>
      </div>
   </td></tr>
  
   <tr class='evenrow'><td colspan=3>Intermediate Result Area:</td><td colspan='14'> <select name='subcomponent' id='subcomponent' style='width:500px;'><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $queryir=mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc")or die(mysql_error());
	  while($rowir=mysql_fetch_array($queryir)){
	  $data.="<option value='".$rowir['subcomponent_name']."'>".$rowir['subcomponent_code']." ".substr($rowir['subcomponent'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='14'> <select name='output' id='output' style='width:500px;' ><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $queryout=mysql_query("select * from tbl_output order by output_code  asc")or die(mysql_error());
	  while($rowout=mysql_fetch_array($queryout)){
	  $data.="<option value='".$rowout['output_name']."'>".$rowout['output_code']." ".substr($rowout['output_name'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='14'> <select name='indicator' id='indicator' style='width:500px;' ><option value=''>-All-</option>";


$x="select at.p_id,at.subcomponent_id,at.display,s.subcomponent,s.subcomponent_code,o.output_code,o.output_name,
at.output_id,at.year,at.indicator_id,i.indicator_name,at.baseyear,at.baselinevalue,at.pquarter1,
at.pquarter2,at.pquarter3,at.pquarter4,sum(at.ptotal) as TotalyearlyTarget,
sum(if((at.year='2011'),at.ptotal,'')) as year2011,
sum(if((at.year='2012'),at.ptotal,'')) as year2012,
sum(if((at.year='2013'),at.ptotal,'')) as year2013,
sum(if((at.year='2014'),at.ptotal,'')) as year2014,
sum(if((at.year='2015'),at.ptotal,'')) as year2015, round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))) 
as totalProjectLifeTargetTotal,

sum(if((at.year='2011'),r.total,'')) as year2011Actual,
sum(if((at.year='2012'),r.total,'')) as year2012Actual,
sum(if((at.year='2013'),r.total,'')) as year2013Actual,
sum(if((at.year='2014'),r.total,'')) as year2014Actual,
sum(if((at.year='2015'),r.total,'')) as year2015Actual,
round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,''))) as totalProjectLifeActualTotal,
round((round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,'')))/round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))))*100,2) as PercentageActualvsTargets
  from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_output o on(o.output_id=at.output_id) inner join tbl_subcomponent s on(s.id=at.subcomponent_id) inner join tbl_organizationreporting r on(r.indicator_id=at.indicator_id)  where at.year <> '0000' and i.display='Yes' and i.responsible <> 'Managers' and i.responsible like 'TSO%'  group by at.year,indicator_id  order by at.year,i.indicator_name asc";
	   $query=mysql_query("select * from tbl_indicator where responsible like 'TSO%' and responsible <> 'Managers' order by indicator_id  asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['indicator_name']."'>".substr($row2['indicator_name'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_TSOquantitativeResults(getElementById('subcomponent').value,getElementById('output').value,  getElementById('indicator').value);return false;\" />
    </label></td></tr>

  <tr>
    <th colspan='18'><div align='center'><strong> TSO Quantitative Annual Results</strong></div></th>
  </tr>
  

";
return $data;
}




function filter_TSOQuantitativeCumulativeResults(){

$_SESSION['wpsubcomponent']=$resultsarea;
$_SESSION['subintermediateResultArea']=$subresultarea;
$_SESSION['fyear']=$year;
$_SESSION['indicator_12']=$indicator;
$data="
  <tr class='evenrow'>
    
    <td width='105' scope='col' colspan=17>
      <div align='right'>
        <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Cumulative Results Report&&resultarea=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['subintermediateResultArea']."&&indicator=".$_SESSION['indicator_12']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a>
      </div>
   </td></tr>
  
   <tr class='evenrow'><td colspan=3>Intermediate Result Area:</td><td colspan='13'> <select name='subcomponent' id='subcomponent' style='width:500px;'><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $queryir=mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc")or die(mysql_error());
	  while($rowir=mysql_fetch_array($queryir)){
	  $data.="<option value='".$rowir['subcomponent_name']."'>".$rowir['subcomponent_code']." ".substr($rowir['subcomponent'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='13'> <select name='output' id='output' style='width:500px;'><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $queryout=mysql_query("select * from tbl_output order by output_code  asc")or die(mysql_error());
	  while($rowout=mysql_fetch_array($queryout)){
	  $data.="<option value='".$rowout['output_name']."'>".$rowout['output_code']." ".substr($rowout['output_name'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='13'> <select name='indicator' id='indicator' style='width:500px;' ><option value=''>-All-</option>";


$x="select at.p_id,at.subcomponent_id,at.display,s.subcomponent,s.subcomponent_code,o.output_code,o.output_name,
at.output_id,at.year,at.indicator_id,i.indicator_name,at.baseyear,at.baselinevalue,at.pquarter1,
at.pquarter2,at.pquarter3,at.pquarter4,sum(at.ptotal) as TotalyearlyTarget,
sum(if((at.year='2011'),at.ptotal,'')) as year2011,
sum(if((at.year='2012'),at.ptotal,'')) as year2012,
sum(if((at.year='2013'),at.ptotal,'')) as year2013,
sum(if((at.year='2014'),at.ptotal,'')) as year2014,
sum(if((at.year='2015'),at.ptotal,'')) as year2015, round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))) 
as totalProjectLifeTargetTotal,

sum(if((at.year='2011'),r.total,'')) as year2011Actual,
sum(if((at.year='2012'),r.total,'')) as year2012Actual,
sum(if((at.year='2013'),r.total,'')) as year2013Actual,
sum(if((at.year='2014'),r.total,'')) as year2014Actual,
sum(if((at.year='2015'),r.total,'')) as year2015Actual,
round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,''))) as totalProjectLifeActualTotal,
round((round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,'')))/round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))))*100,2) as PercentageActualvsTargets
  from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_output o on(o.output_id=at.output_id) inner join tbl_subcomponent s on(s.id=at.subcomponent_id) inner join tbl_organizationreporting r on(r.indicator_id=at.indicator_id)  where at.year <> '0000' and i.display='Yes' and i.responsible <> 'Managers' and i.responsible like 'TSO%'  group by at.year,indicator_id  order by at.year,i.indicator_name asc";
	   $query=mysql_query("select * from tbl_indicator where responsible like 'TSO%' and responsible <> 'Managers' order by indicator_id  asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['indicator_name']."'>".substr($row2['indicator_name'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_TSOquantitativeCumulativeResults(getElementById('subcomponent').value,getElementById('output').value,  getElementById('indicator').value);return false;\" />
    </label></td></tr>

  <tr>
    <th colspan='17'><div align='center'><strong> TSO Quantitative Cumulative Results</strong></div></th>
  </tr>
  

";
return $data;
}





 

function filter_TSOquantitativeReporting(){
$data="<tr class='evenrow'>
    <td width=''  colspan='3' scope='col' >Year:
      <select name='year' id='year'>";
	    $yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while($end>= 2010);
      $data.="</select>
    </label></td>
    <td width='' scope='col' colspan=2><div style='float:left;'>Reporting Period
      <select name='quarter' id='quarter'>";
	   $query=mysql_query("select * from tbl_quarters order by quarterCode asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['quarterName']."'>".$row2['quarterName']."</option>";
	  }
      $data.="</select>
    </div></th>
    <td width='105' scope='col' colspan=3>
      <div align='right'>
       <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Reporting Data Entered&&output=".$_SESSION['TSOsubresultarea']."&&indicator=".$_SESSION['TSOindicator']."&&year=".$_SESSION['TSOyear']."&&quarter=".$_SESSION['TSOquarter']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      </div>
   </td></tr>
   
   <tr class='evenrow'><td colspan=3><B>TSO</B></td><td colspan='8'><select name='orgname' size='1'  id='orgname'>";
		
		 
		 $query=mysql_query("select distinct(orgName) from tbl_organization where org_code='".$_SESSION['org_code']."' group by orgName")or die(mysql_error());
		 
		 while($row=mysql_fetch_array($query)){
		#$selected1=$_SESSION['name']==$row['orgName']?"SELECTED":"";
		 $data.="<option value='".$row['orgName']."' '".$selected1."'>".substr($row['orgName'],0,40)."</option>
          ";
		  }
		 
		 
		 $data.="
        </select></td></tr>
  
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='4'> <select name='output' id='output'><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $queryout=mysql_query("select * from tbl_output order by output_code  asc")or die(mysql_error());
	  while($rowout=mysql_fetch_array($queryout)){
	  $data.="<option value='".$rowout['output_name']."'>".$rowout['output_code']." ".substr($rowout['output_name'],0,70)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='4'> <select name='indicator' id='indicator'><option value=''>-All-</option>";
 # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
	   $query=mysql_query("select * from tbl_indicator order by indicator_id  asc")or die(mysql_error());
	  while($row2=mysql_fetch_array($query)){
	  $data.="<option value='".$row2['indicator_name']."'>".substr($row2['indicator_name'],0,100)."</option>";
	  }
      $data.="</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_TSOquantitativeReporting(getElementById('output').value,getElementById('indicator').value,getElementById('quarter').value,getElementById('year').value,getElementById('orgname').value);\" />
    </label></td></tr>

  <tr>
    <th colspan='9'><div align='center'><strong> TSO Quantitative Reporting</strong></div></th>
  </tr>
  

";
return $data;
}



function filter_TSOreporting(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='7' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment('','','','".$_SESSION['orgName']."')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$org_code."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$quarter."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value='".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='5'><select name='quarter' id='quarter'>
      <option value=''>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
	  $selected=$_SESSION['quarter']==$row['quarterName']?"SELECTED":"";
      $data.="<option value='".$row['quarterName']."' '".$selected."'>".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from tbl_organizationreporting r join tbl_indicator i on(i.indicator_id=r.indicator_id) where i.subcomponent_id='".$_SESSION['usersubcomponent']."' group by i.indicator_name order by i.indicator_id asc ")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value='".$row['indicator_name']."'  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_valueChainDevelopment('".$_SESSION['managerorg_code']."','".$_SESSION['orgName']."',getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='13'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}


function filter_vcdgrid_Manager(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment_Manager('','','','')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$org_code."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$quarter."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value='".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='quarter' id='quarter'>
      <option value=''>-ALL-</option>";
      $query=mysql_query("select * from tbl_quarters order by quarterCode asc ")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
	  $selected=$_SESSION['quarter']==$row['quarterName']?"SELECTED":"";
      $data.="<option value='".$row['quarterName']."' '".$selected."'>".$row['quarterName']."</option>";
      }
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value='".$row['indicator_name']."'  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_valueChainDevelopment_Manager('".$_SESSION['managerorg_code']."','".$_SESSION['orgName']."',getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}


function filter_vcdgrid_actuals(){

$data=" <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Sub-Activity </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=".$subcomponent."&&org_code=".$org_code."&&orgname=".$orgname."&&year=".$_SESSION['year106']."&&quarter=".$quarter."&&indicator=".$_SESSION['indicator106']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
	    $yr = date(Y); $end = $yr; do{
$sel=($_SESSION['year106']==$end)?"SELECTED":"";
$data.="<option value='".$end."' '".$sel."'>".$end."</option>";
$end--;} while ($end>= 2010);
      $data.="
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
	$sel=mysql_query("select i.indicator_id,i.indicator_name,s.subact_id,s.subactivity_code,s.subactivity_name from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where subactivity_name <> '' group by s.subact_id order by subactivity_code")or die("Sunrise Error-code 1037 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity1']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$s."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
    $data.="</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";
   
	$query=mysql_query("select * from view_organizationreporting where subcomponent_id='".$_SESSION['usersubcomponent']."' group by indicator_name order by indicator_id asc ")or die(mysql_error());
      while($row=mysql_fetch_array($query)){
	   $selected=$_SESSION['indicator106']==$row['indicator_name']?"SELECTED":"";
      $data.="<option value='".$row['indicator_name']."'  '".$selected."' >".substr($row['indicator_name'],0,50)."</option>";
      }
      
      $data.="</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'name='search' value='Go' onclick=\"xajax_view_valueChainDevelopmentAnnualTargetvsActuals(getElementById('year').value,getElementById('subactivity').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")</strong></div></th>
  </tr>

";
return $data;
}









function filter_LOPTarget(){
$classCode=5;
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=12><label>
      <div style='float:right;'> 
	   <input type='button' class='formButton2' id='button' name='Submit' onclick=\"xajax_new_LOPTargets('','','');return false;\" value='New Entry' /> |
       <a href='export_to_excel_word.php?linkvar=Export LOP Targets&&target_type=ASARECA&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print LOP Targets&&target_type=ASARECA&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=Print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	";$data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:
                <label></label></td>
              <td colspan='12'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewLOPTargets('ASARECA',this.value,'".$_SESSION['output_id']."','','');return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicatorType']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".retrieve_info_withSpecialCharacters($row['codeName'])." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>";
			  if($_SESSION['indicatorType']==$indicator_Type[2]){

		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewLOPTargets('ASARECA','".$_SESSION['indicatorType']."',this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like 'ASARECA%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else{
		
	$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  disabled='disabled' id='output' onChange=\"xajax_ViewLOPTargets('ASARECA','".$_SESSION['indicatorType']."',,this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like 'ASARECA%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";	
		
		
		}
	          
           $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='11'>
                 <select name='Indicator' id='Indicator' onchange=\"xajax_ViewAnnualTargets('ASARECA','".$_SESSION['indicatorType']."',
				
				 '".$_SESSION['output_id']."','','',this.value);return false;\" class='combobox'><option value=''>-All-</option>";
                $xs=@mysql_query("select * from tbl_indicator where level_ofIndicator like 'ASARECA%'
				group by indicator_name
				 order by indicator_code")or die(http("FLTR-2489"));
				while($row=mysql_fetch_array($xs)){
				$sel=($row['indicator_name']==$year)?"selected":"";
				$data.="<option value=\"".$row['indicator_name']."\" ".$sel."> ".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
				}
              $data.="</select></td>

			  <td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewLOPTargets('ASARECA',getElementById('indicator_type').value,getElementById('output').value,getElementById('Indicator').value,'',1,20);return false;\" /></td> 
		
            </tr>
";

return $data;
}




function filter_LOPTargetReport(){
$classCode=5;
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=13><label>
       <div style='float:right;'> 
	   <input type='button' class='formButton2' id='button' name='Submit' onclick=\"xajax_new_LOPTargets('','','');return false;\" value='New Entry' /> |
       <a href='export_to_excel_word.php?linkvar=Export LOP Targets&&target_type=ASARECA&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print LOP Targets&&target_type=ASARECA&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=Print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	";$data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:
                <label></label></td>
              <td colspan='13'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewLOPTargets('ASARECA',this.value,'".$_SESSION['output_id']."','','');return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicatorType']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".retrieve_info_withSpecialCharacters($row['codeName'])." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>";
			  if($_SESSION['indicatorType']==$indicator_Type[2]){

		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='13'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewLOPTargets('ASARECA','".$_SESSION['indicatorType']."',this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like 'ASARECA%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else{
		
	$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='13'><select name='output' class='combobox'  disabled='disabled' id='output' onChange=\"xajax_ViewLOPTargets('ASARECA','".$_SESSION['indicatorType']."',,this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like 'ASARECA%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";	
		
		
		}
	          
           $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='12'>
                 <select name='Indicator' id='Indicator' onchange=\"xajax_ViewAnnualTargets('ASARECA','".$_SESSION['indicatorType']."',
				
				 '".$_SESSION['output_id']."','','',this.value);return false;\" class='combobox'><option value=''>-All-</option>";
                $xs=@mysql_query("select * from tbl_indicator where level_ofIndicator like 'ASARECA%'
				group by indicator_name
				 order by indicator_code")or die(http("FLTR-2489"));
				while($row=mysql_fetch_array($xs)){
				$sel=($row['indicator_name']==$year)?"selected":"";
				$data.="<option value=\"".$row['indicator_name']."\" ".$sel."> ".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
				}
              $data.="</select></td>

			  <td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewLOPTargets('ASARECA',getElementById('indicator_type').value,getElementById('output').value,getElementById('Indicator').value,'',1,20);return false;\" /></td> 
		
            </tr>
";

return $data;
}





function filter_annualTarget_3(){
$data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_annualTargets('Project','','','','','','');return false;\"/> |
       <a href='export_to_excel_word.php?linkvar=Export Workplan&&targetType=".$_SESSION['target_type']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> | <a href='print_version.php?linkvar=Print Annual SIRActivity Workplan&&subcomponent=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['outputAnnualplanning']."&&strategy=".$_SESSION['strategy']."&&siractivity=".$_SESSION['SIRActivity']."&&year=".$_SESSION['fyear']."&&responsible=".$_SESSION['responsible']."&&status=".$_SESSION['status']."'><input type='button' class='formButton2'name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>";
	}







function filter_annualTarget_2(){
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_annualTargets('".$_SESSION['target_type']."','','','','','','');return false;\"/> |
       <a href='export_to_excel_word.php?linkvar=Export Workplan&&targetType=".$_SESSION['target_type']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> | <a href='print_version.php?linkvar=Print Annual SIRActivity Workplan&&subcomponent=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['outputAnnualplanning']."&&strategy=".$_SESSION['strategy']."&&siractivity=".$_SESSION['SIRActivity']."&&year=".$_SESSION['fyear']."&&responsible=".$_SESSION['responsible']."&&status=".$_SESSION['status']."'><input type='button' class='formButton2'name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";
			  
if($_SESSION['target_type']=='Program'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' disabled='disabled' onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("WP-2411"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subprogram']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project' disabled='disabled' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where id='".$_SESSION['project_id']."'  order by project_code asc")or die(http("WP-2423"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project_id']==$row['id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		else if($_SESSION['target_type']=='Project'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['program']."' order by subcomponent_code asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subprogram']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
             <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-All-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		 
		 
		 else {

$data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='13'>
                 <select name='Indicator' id='Indicator' onchange=\"xajax_ViewAnnualTargets('','','','',this.value);return false;\" class='combobox'><option value=''>-All-</option>";
                $xs=@mysql_query("select * from tbl_indicator where level_ofIndicator like 'ASARECA%'
				group by indicator_name
				 order by indicator_code")or die(http("FLTR-2489"));
				while($row=mysql_fetch_array($xs)){
				$sel=($row['indicator_name']==$year)?"selected":"";
				$data.="<option value=\"".$row['indicator_name']."\" ".$sel."> ".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
				}
              $data.="</select></td>
            </tr>";
			
			}

 
return $data;
}


function filter_CumulativePerfomanceagainstIndicators(){
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='10' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export CumulativePerfomanceagainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print CumulativePerfomanceagainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:</td>
              <td colspan='10'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_CumulativePerfomanceagainstIndicators('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<>'' group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='10'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_view_CumulativePerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='10'><select name='output' class='combobox' id='output'  onchange=\"xajax_view_CumulativePerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		}
 $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='9'>
                 <select name='indicator' id='indicator' onchange=\"xajax_view_CumulativePerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
                $data.="<option value='' >-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_CumulativePerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
 
return $data;




}


function filter_PerformanceagainstAnnualandOPTargets(){
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');

$data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='12' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export PerformanceagainstAnnualandOPTargets&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print PerformanceagainstAnnualandOPTargets&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_PerformanceagainstAnnualandOPTargets('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_view_PerformanceagainstAnnualandOPTargets('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox' id='output'  onchange=\"xajax_view_PerformanceagainstAnnualandOPTargets('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		}
 $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='11'>
                 <select name='indicator' id='indicator' onchange=\"xajax_view_PerformanceagainstAnnualandOPTargets('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
     
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_PerformanceagainstAnnualandOPTargets('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
 
return $data;




}






//-------------filter_CumulativeAnnualPerfomanceagainstIndicators----------------------

function filter_CumulativeAnnualPerfomanceagainstIndicators(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');

$data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='16' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export CumulativeAnnualPerfomanceagainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print CumulativeAnnualPerfomanceagainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:</td>
              <td colspan='16'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_CumulativeAnnualPerfomanceagainstIndicators('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> ''  group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='16'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_view_CumulativeAnnualPerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		
 $data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='16'><select name='output' class='combobox' id='output'  onchange=\"xajax_view_CumulativeAnnualPerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		}
 $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='15'>
                 <select name='indicator' id='indicator' onchange=\"xajax_view_CumulativeAnnualPerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
            
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_CumulativeAnnualPerfomanceagainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>"; 
return $data;

}






function filter_CumulativeTargetsandActuaLBasedonOP(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');

$data.="<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export CumulativeTargetsandActualBasedonOP&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print CumulativeTargetsandActualBasedonOP&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
 <tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_CumulativeTargetsandActualBasedonOP('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_view_CumulativeTargetsandActualBasedonOP('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' class='combobox' id='output'  onchange=\"xajax_view_CumulativeTargetsandActualBasedonOP('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		}
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator:</td>
              <td colspan='11'>
                 <select name='indicator' id='indicator' onchange=\"xajax_view_CumulativeTargetsandActualBasedonOP('".$_SESSION['target_type']."','','".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
 
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_CumulativeTargetsandActualBasedonOP('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
 
return $data;

}




#--------------filter_annualPerformanceAgainstIndicators------------
function filter_annualPerformanceAgainstIndicators(){
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='21' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export AnnualPerformanceAgainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print AnnualPerformanceAgainstIndicators&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
 <tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='20'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_annualPerformanceAgainstIndicators('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> '' group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='20'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_view_annualPerformanceAgainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else{
$data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='20'><select name='output' class='combobox' id='output'  onchange=\"xajax_view_annualPerformanceAgainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected1=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected1.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator:</td>
              <td colspan='19'>
                 <select name='indicator' id='indicator' onchange=\"xajax_view_annualPerformanceAgainstIndicators('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
               
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_annualPerformanceAgainstIndicators('ASARECA','',getElementById('Program').value,getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
return $data;
}

function filter_annualTargetReport(){
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="

<tr class='evenrow'>
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export Workplan&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print Workplan&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
</tr>
	";
			  
if($_SESSION['target_type']=='Program'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' disabled='disabled' onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
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
              <td colspan='12'><select name='Project' class='combobox' id='Project' disabled='disabled' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['Program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-2789"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		/* else if($_SESSION['target_type']=='Project'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['program']."' order by subcomponent_code asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subprogram']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
             <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-All-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		 
		 */ 
		 else {
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		$data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output'  class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
		
		}
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator:</td>
              <td colspan='10'>
                 <select name='indicator' id='indicator' onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
              
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
			}

 
return $data;
}

function filter_annualTargetReportPI(){
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
  
if($_SESSION['target_type']=='Program'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' disabled='disabled' onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
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
              <td colspan='12'><select name='Project' class='combobox' id='Project' disabled='disabled' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['Program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-2789"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		else if($_SESSION['target_type']=='Project'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargetsProjects('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::ProgramFilter($program);  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargetsProjects('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::ProjectFilter($program,$project);  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
             <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-All-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		 
	
		 else {
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		$data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output'  class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
		
		}
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator:</td>
              <td colspan='10'>
                 <select name='indicator' id='indicator' onchange=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
              
$query=mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_ViewAnnualTargetsReport('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
			}

 
return $data;
}






function filter_annualTargets(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>  
	 
       <a href='export_to_excel_word.php?linkvar=Export Workplan&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=excel'><input type='button' class='formButton2' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print Workplan&&typeoftarget=ASARECA&&program=".$_SESSION['program']."&&indicatorType=".$_SESSION['indicatorType']."&&indicator=".$_SESSION['indicator']."&&output=".$_SESSION['output']."&&format=Print' target='_blank'><input type='button' class='formButton2' name='export' value='Print Version'  />
    </a></div>
    </label></td>
  </tr>
</tr>
	";
			  
if($_SESSION['target_type']=='Program'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' disabled='disabled' onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','','');return false;\" >";
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
              <td colspan='12'><select name='Project' class='combobox' id='Project' disabled='disabled' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['Program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-2789"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		/* else if($_SESSION['target_type']=='Project'){ 
		
		
		$data.="		
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['program']."' order by subcomponent_code asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subprogram']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Project:</td>
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_project where programme_id='".$_SESSION['program']."' and subprogram_id='".$_SESSION['subprogram']."' order by project_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
             <td colspan='12'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-All-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>";
         
		 }
		 
		 
		 */ 
		 else {
		 
 $data.="
 <tr class='evenrow'>
              <td colspan='3'>Indicator Class:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargetsASARECA('".$_SESSION['target_type']."','',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> '' group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		if(($_SESSION['indicatorType']==$indicator_Type[0]) or ($_SESSION['indicatorType']==$indicator_Type[1])){
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' disabled='disabled' class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsASARECA('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}else {
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='12'><select name='output' class='combobox' id='output'  onchange=\"xajax_ViewAnnualTargetsASARECA('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."',this.value,1,20);return false;\" >";
$data.="<option value=''>-All-</option>"; 

$query=mysql_query("select * from tbl_output where type like '".$_SESSION['target_type']."%'  order by output_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']."  ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		}
		
 $data.="<tr class='evenrow'>
              <td colspan='3'>Indicator:</td>
              <td colspan='10'>
                 <select name='indicator' id='indicator' onchange=\"xajax_ViewAnnualTargetsASARECA('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
          
$query=@mysql_query("select * from tbl_indicator where level_ofindicator like '".$_SESSION['target_type']."%' and indicator_type like '".$_SESSION['indicatorType']."%' and output_id like '".$_SESSION['output']."%' order by indicator_code asc")or die(http("WP-524"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicator']==$row['indicator_id'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_id']."\" ".$selected.">".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
					  }  
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_ViewAnnualTargetsASARECA('".$_SESSION['target_type']."','','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
            </tr>";
			
			}

 
return $data;
}







#***************************filter_district()***********************
function filter_district(){
$data="
  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong>
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(districtname) from tbl_district group by districtName order by 1 ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="<option value='".$row['districtname']."'>".$row['districtname']."</option>
          ";
  }
  $data.="
      </select></td><td><strong>Zone:</strong></td><td><select name='zone' size='1' id='zone'><option value=''>-All-</option>";
	  $selzone=mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC")or die(http(2427));
	  while($rowzone=mysql_fetch_array($selzone)){
	  $data.="<option value='".$rowzone['zoneName']."'>".$rowzone['zoneName']."</option>";
	  }
$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onClick=\"xajax_view_district(getElementById('district').value,getElementById('zone').value,1,20);\" /></td><td width='84' scope='col'><input type='button' class='formButton2'id='search' name='' value='New District' onclick=\"xajax_new_district('new_district','','')\"  />

</td><td scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export District&&&&district=".$_SESSION['district']."&&zone=".$_GET['zone']."&&format=excel'><input type='button' class='formButton2'id='export' name='export' value='Export to Excel' /></a></td>
  </tr>
 
";
return $data;


}

/* 
function filter_staffMembers(){
$data="
  
 
";
return $data;


} */



function filter_municipality(){
$data="
  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan=2><strong>Municipality</strong></td><td colspan='3'><strong>Zone:</strong></td><td width='84' scope='col'>
<input type='button' class='formButton2'id='search' value='New Municipality' onclick=\"xajax_add_municipality('',1,20)\"  />
</td><td scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export Municipality&&district=".$_SESSION['district']."&&format=excel'><input type='button' class='formButton2'id='export' name='export' value='Export to Excel' /></a></td></tr>
	
	
	
	<tr class='evenrow'><td colspan='3'>
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(districtname) from tbl_district group by districtName order by 1 ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="
          <option value='".$row['districtname']."'>".$row['districtname']."</option>
          ";
  }
  $data.="
      </select></td>
	  <td colspan='2'>
      <select name='municipality' id='municipality' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(municipalityName) from tbl_municipality group by municipal_id order by 1 ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $data.="
          <option value='".$row['municipalityName']."'>".$row['municipalityName']."</option>
          ";
  }
  $data.="
      </select></td><td colspan=3><select name='zone' size='1' id='zone'><option value=''>-All-</option>";
	  $selzone=mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC")or die(http(2427));
	  while($rowzone=mysql_fetch_array($selzone)){
	  $data.="<option value='".$rowzone['zoneName']."'>".$rowzone['zoneName']."</option>";
	  }
$data.="</select></td><td colspan=2><input name='search' type='button' class='formButton2'value='Go' onClick=\"xajax_view_municipality(getElementById('district').value,getElementById('municipality').value,getElementById('zone').value,1,20);\" /></td>
  </tr>
 
";
return $data;


}



#***************************filter_subcounty()***********************
function filter_subcounty(){
$data="
  <tr class='evenrow'>
    <td scope='col'  colspan='2'>District:
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(districtname) from tbl_district order by 1 ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $seldistrict=($_SESSION['district']==$row['districtname'])?"SELECTED":"";
  $data.="<option value='".$row['districtname']."' '".$seldistrict."'>".$row['districtname']."</option>";
  }
  $data.="
      </select>    </td>
    
    <td width='84' scope='col' colspan='2' ><DIV  style='float:right;'>
      <input type='button' class='formButton2'id='search' value='New Subcounty' onclick=\"xajax_new_district('new_subcounty','','')\"  />
   | <a href='export_to_excel_word.php?linkvar=Export Subcounty&&district=".$_SESSION['district']."&&subcounty=".$_SESSION['subcounty']."&&zone=".$_GET['zone']."&&format=excel'><input type='button' class='formButton2'id='export' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  
 <tr class='evenrow'>
    <td scope='col'  colspan='2'>Subcounty:
      <select name='subcounty' id='subcounty' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select subcountyName from tbl_subcounty group by subcountyName order by subcountyName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
   $selsubcounty=($_SESSION['subcounty']==$row['subcountyName'])?"SELECTED":"";
  $data.="<option value='".$row['subcountyName']."' '".$selsubcounty."'>".$row['subcountyName']."</option>
          ";
  
  }
  $data.="
      </select>    </td>
 
    <td scope='col'  colspan=''>Zone:
      <select name='zone' id='zone' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select zoneName from tbl_zone group by zoneName order by zoneName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
    $selzone=($_SESSION['zone']==$row['zoneName'])?"SELECTED":"";
  $data.="
          <option value='".$row['zoneName']."' '".$selzone."'>".$row['zoneName']."</option>";
  }
  $data.="</select>    </td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_subcounty(getElementById('district').value,getElementById('subcounty').value,getElementById('zone').value)\" /></td>
    </tr>
 
";
return $data;
}

function filter_parish(){
$data="
  <tr class='evenrow'>
    
    
    <td width='84' scope='col' colspan='4' ><DIV  style='float:right;'>
      <input type='button' class='formButton2'id='search' value='New Parish' onclick=\"xajax_new_district('new_parish','','');return false;\"  />
   | <a href='export_to_excel_word.php?linkvar=Export Parish&&district=".$_SESSION['district']."&&subcounty=".$_SESSION['subcounty']."&&parish=".$_SESSION['parish']."&&zone=".$_GET['zone']."&&format=excel'><input type='button' class='formButton2'id='export' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  
  <tr class='evenrow'><td scope='col'  colspan='2'>District:
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select DISTINCT(districtname) from tbl_district order by 1 ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $seldistrict=($_SESSION['district']==$row['districtname'])?"SELECTED":"";
  $data.="<option value='".$row['districtname']."' '".$seldistrict."'>".$row['districtname']."</option>";
  }
  $data.="
      </select>    </td><td scope='col'  colspan='2'>Zone:
      <select name='zone' id='zone' ><option value=''>-All-</option>";
  $query=mysql_query("select zoneName from tbl_zone group by zoneName order by zoneName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $selzone=($_SESSION['zone']==$row['zoneName'])?"SELECTED":"";
  $data.="
          <option value='".$row['zoneName']."' '".$selzone."'>".$row['zoneName']."</option>";
  }
  $data.="</select>    </td></tr>
 <tr class='evenrow'>
    <td scope='col'  colspan='2'>Subcounty:
      <select name='subcounty' id='subcounty' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_subcounty group by subcountyName order by subcountyName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
    $selsubcounty=($_SESSION['subcounty']==$row['subcountyName'])?"SELECTED":"";
  $data.="<option value='".$row['subcountyName']."' '".$selsubcounty."'>".$row['subcountyName']."</option>
          ";
  }
  $data.="
      </select>    </td>
	  <td scope='col'  colspan=''>Parish:
      <select name='parish' id='parish' >
          <option value=''>-All-</option>
          ";
  $query=mysql_query("select * from tbl_parish group by ParishName order by ParishName ASC")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
  $selparish=($_SESSION['parish']==$row['ParishName'])?"SELECTED":"";
  $data.="
          <option value='".$row['ParishName']."' '".$selparish."'>".$row['ParishName']."</option>
          ";
  }
  $data.="
      </select>    </td>
 
    <td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_parish(getElementById('district').value,getElementById('zone').value,getElementById('subcounty').value,getElementById('parish').value)\" /></td>
    </tr>
 
";
return $data;
}




function filter_comments(){
$data="<tr>

    <th width='' scope='col' colspan=2><div align='left'>User:
      <select name='user' id='user' onchange=\"xajax_view_comments(getElementById('user').value);return false;\">";
	  if($_SESSION['username1']!='')$data.="<option value='".$_SESSION['username1']."'>".$_SESSION['username1']."</option>";
	  else
	  $data.="<option value=''>-All-</option>";
	  $query1=mysql_query("select u.user_id,c.user_id,u.username from tbl_comment c inner join tbl_user u on(u.user_id=c.user_id) order by u.username asc")or die("Sunrise error-code 1962 because, ".mysql_error());
	  while($row1=mysql_fetch_assoc($query1)){
	  $data.="<option value='".$row1['username']."' >".$row1['username']."</option>";
	  
	  }
      $data.="</select>
    </div>
   
  </th>
    <th width='100' scope='col'><a href='export_to_excel_word.php?linkvar=Export User Comments&&user=".$_SESSION['username1']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a></th>
    <th width='100' scope='col'>
   
   <a href='new_comment.php' title='New comment'><input type='submit' name='button' id='button' value='New Comment'  /></a> </th>
  </tr>";
return $data;

}



function filter_organization(){

//$dataentry=($_SESSION['role']=='Managing Director'or'Chief Technical Advisor')?"":"<input type='button' class='formButton2'name='newentry' value='Add Organization' onclick=\"xajax_new_organization();return false;\">";
$tot=mysql_fetch_array(mysql_query("select count(orgName) as num_org from tbl_organization o join tbl_country c on(c.countryCode=o.country_id) where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%' && lower(c.countryName) like '".strtolower($_SESSION['countryName'])."%' and o.display like 'Yes%'"))or die(http("SP-2682")); 
$data.="<tr class='evenrow'>
        <td class='' colspan='5'><b class='greenlinks'>TOTAL OF : ".$tot['num_org']." ORGANIZATIONS</b></td><td class='' colspan='3' align='right' width='70'>";
		
		$data.="<input type='button' class='formButton2'name='newentry' value='New Institution' onclick=\"xajax_new_organization();return false;\">";
		$data.="</td>
		<td  align='right' class='evenrow' width='115'><a href='export_to_excel_word.php?linkvar=Export Organization&&districtName=".$_SESSION['district1']."&orgName=".$_SESSION['orgname1']."&&orgtype=".$_SESSION['orgtype1']."&format=excel'><input name='export' type='button' class='formButton2'value='Export to Excel' /></a></td>
        </tr>
		
<tr class='evenrow'>
        <td width='' colspan='5' class='evenrow'><strong>Organisation</strong></td>
    <td class='evenrow3' colspan=2><b>Org.Type:</b></td>
    <td class='evenrow3' colspan=1 align='right'><strong>Country</strong></td>
    
<td class='evenrow3' colspan=1 align='right'></td>
 
</tr>
		 <tr class='evenrow'>
        <td width='' class='evenrow' colspan='5' ><select name='orgname' size='1' class='' id='orgname'>
          <option value=''>-All-</option>
          ";
		 
		  $data.="<option value=''>-All-</option>";
		 $query=mysql_query("select distinct(orgName) from tbl_organization where orgName <> '' group by orgName")or die(mysql_error());
		 
		 while($row=mysql_fetch_array($query)){
		$selected1=$_SESSION['orgname1']==$row['orgName']?"SELECTED":"";
		 $data.="
          <option value=\"".$row['orgName']."\" ".$selected1.">".substr($row['orgName'],0,30)."</option>
          ";
		  }
		 
		 
		 $data.="
        </select></td>
		 <td width='' colspan=2 class='evenrow3'><label>
		 <select name='orgtype' size='1' class='' id='orgtype'>
           <option value=''>-All-</option>
		   ";
		
		  $data.="<option value=''>-All-</option>";
		 $query=mysql_query("select distinct(codeName) from tbl_lookup  where classCode='1' order by codeName ASC")or die(mysql_error());
		 
		 while($row=mysql_fetch_array($query)){
		 
		  $selected2=$_SESSION['orgtype1']==$row['codeName']?"SELECTED":"";
		 $data.="<option value=\"".$row['codeName']."\" ".$selected2.">".$row['codeName']."</option>";
		 }
		 $data.="
	     </select>
		 </label></td>
		 <td width='' class='evenrow' align='right'><select name='zone' size='1' class='' id='zone'>
           <option value=''>-All-</option>";
		  
		  $data.="<option value=''>-All-</option>";
		  $query=mysql_query("select * from tbl_country  where memberstatus  like 'Yes%' group by countryName order by countryName asc")or die(mysql_error());
		 
		 while($row=mysql_fetch_array($query)){
		 $selected=$_SESSION['countryName']==$row['countryName']?"SELECTED":"";
		 $data.="<option value=\"".$row['countryName']."\" ".$selected.">".$row['countryName']."</option>";
		 }
		  
		 
		 $data.="
		   </select></td>
		 
		<td class=''><input name='search' type='button' class='formButton2'value='Go' 
		 onclick=\"xajax_view_organization(getElementById('orgname').value,getElementById('orgtype').value,getElementById('zone').value);\" /></td></tr>
";
return $data;

}












function filter_component(){

$data="<tr class='evenrow'>


	<td width='70'>PROJECT GOAL </td><td>
      <select name='programme' id='programme'>";
	   if($_SESSION['program_name']!=''){
	
	 $query1=mysql_query("select * from tbl_programme where program_name like '".$_SESSION['program_name']."%' order by program_name asc")or die(mysql_error());
	  while($row1=mysql_fetch_array($query1)){
	 
	  $data.="<option value='".$row1['program_name']."' >".substr($row1['program_name'],0,50)."</option>";
	  
	   }
	   }
	else 
	
	$data.="<option value='%' >-All-</option>";
	  $query11=mysql_query("select * from tbl_programme where program_name <> '' order by program_name")or die(mysql_error());
	  while($row11=mysql_fetch_array($query11)){

	  $data.="<option value='".$row11['program_name']."%'>".substr($row11['program_name'],0,40)."</option>";
	  }
     $data.="</select>
    </label></td>
   
    <td width='154' align='right'><label>
    <input type='button' class='formButton2'name='new_programme' value='New Strategic objective' onclick=\"xajax_add_component();return false;\" />
    </label></td>
    <td width='40' align='right'><label>
	  
    <a href='export_to_excel_word.php?linkvar=Export Strategic Objective&&component=".$_SESSION['component']."&&programme=".$_SESSION['program_name']."&&funder=".$_SESSION['Funder']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </label></td>
    
  </tr>
  <tr class='evenrow'>
    	<td width='70'>STRATEGIC OBJECTIVE</td>
	<td colspan=2><label>
      <select name='ccomponent' id='ccomponent'>";
	  if($_SESSION['component']<>''){
	  $query2=mysql_query("select * from tbl_component where component like '".$_SESSION['component']."%' order by component asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query2)){

	  $data.="<option value='".$row['component']."' >".substr($row['component'],0,70)."</option>";
	  
	  }
	  }else
	  	$data.="<option value='%' >-All-</option>";
	 
	  $query2=mysql_query("select * from tbl_component  order by component asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query2)){
	  $data.="<option value='".$row['component']."%' '>".substr($row['component'],0,70)."</option>";
	  }
     $data.="</select>
</td>
	
	
    
    <td align='right'><input name='search' type='button' class='formButton2'value='Go' title='search' onclick=\"xajax_view_component(getElementById('ccomponent').value,getElementById('programme').value);return false;\" /></td>

    
  </tr>
";
return $data;

}


function filter_output(){

$data.="<tr CLASS='evenrow'>

<td width='' align='right' colspan='8'><div style='float:right;'><label>
      <input type='button' class='formButton2'name='Output' value='New Entry' onclick=\"xajax_add_output('','','','','','','');return false;\" />
    </label> | <label>
      <a href='export_to_excel_word.php?linkvar=Export Sub-Intermediate Result Area&&code=".$_SESSION['ooutput_code']."&&output_name=".$_SESSION['ooutput_name']."&&subcomponent=".$_SESSION['osubcomponent']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </label></div></td>
  </tr>  

   <tr class='evenrow3'>
  <td width='' colspan='3' >Output Level:</td>
    <td colspan='7'><select name='type' id='type' class='combobox' onchange=\"xajax_view_output(this.value,'".$_SESSION['program']."','".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\"/>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=@mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(@mysql_error());
	  while($row1=@mysql_fetch_array($query1)){
	  $selcodeName=($_SESSION['output_type']==$row1['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['codeName']."\" ".$selcodeName." >".$row1['codeName']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   </tr>";
  switch($_SESSION['output_type']){
  case "Program":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='4'><select name='program' id='program' onchange=\"xajax_view_output('".$_SESSION['output_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 $data.="</select></td>
   ";
  
  break;
  
  case "Project":
  
    $data.="<tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='5'><select name='program' id='program' onchange=\"xajax_view_output('".$_SESSION['output_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
		 $data.=QueryManager::ProgramFilter($_SESSION['programme']);
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Sub-Program</td>
    <td colspan=5><select name='subprogram' id='subprogram' onchange=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."',this.value,'".$_SESSION['project']."');return false;\" class='combobox'>";
 	$data.="<option value='' >-All-</option>";
	
	 $query1=mysql_query("select * from tbl_subcomponent sc
	 where prog_id like '".$_SESSION['programme']."%' order by subcomponent_code asc")or die(http("VP-544"));
	  while($row1=mysql_fetch_array($query1)){
	  
	  $selsubprogramme=($_SESSION['subprogram']==$row1['subcomponent_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row1['subcomponent_id']."\" ".$selsubprogramme." >".$row1['subcomponent_code']." ".$row1['subcomponent']."</option>";
	  
	   }
	 
	 $data.="</select></td>
   
   
    
  </tr>
  <tr class='evenrow3'>
  <td width='' colspan='3'>Project:</td>
    <td colspan='4'><select name='project' id='project' class='combobox'  onchange=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value);return false;\">";
 	$data.="<option value='' >-All-</option>";
	
	 	 $data.=QueryManager::ProjectFilter($_SESSION['programme'],$_SESSION['project']);
	 
	 $data.="</select></td>";
  
  break;
  default:
  $data.="<tr class='evenrow'><td colspan='7'></td>";
  
  
  }
  
$data.="<td><input name='search' type='button' class='formButton2'value='Go'  onclick=\"xajax_view_output(getElementById('type').value,getElementById('program').value,getElementById('subprogram').value,getElementById('project').value);return false;\"/></td>

    
  </tr>
";
return $data;

}

function filter_subprogram(){

$data="<tr CLASS='evenrow'>
<td colspan='8'>
    <div align='right'>
<input type='button' class='formButton2'name='new_programme' value='New Subprogram' onclick=\"xajax_add_subcomponent('');return false;\"  /> | <a href='export_to_excel_word.php?linkvar=Export Subprogram&&program=".$_SESSION['program_name']."&&subcomponent=".$_SESSION['subcomponent']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
</a></div></td>
</tr>
  
 <tr class='evenrow'>
     <td colspan=2>Programme:</td><td colspan='5'>
      
    <select name='programme' id='programme' onchange=\"xajax_view_subcomponent(this.value,'');return false;\" style='width:300px;'>
        <option value='' >-All-</option>
        ";

	  $query=mysql_query("select * from tbl_programme where program_name <> '' and display='Yes' order by prog_id asc")or die(http(2832));
	  while($row=mysql_fetch_array($query)){
	  $data.="
        <option value=\"".retrieve_info_withSpecialCharacters($row['prog_id'])."\"  ".checkExistance($row['prog_id'],$_SESSION['program_name'],'selected').">
		".$row['program_id']."  
		".retrieve_info_withSpecialCharacters($row['program_name'])."</option>";
	  
	  }
     $data.="
      </select></td></tr>
	  
 
 <tr class='evenrow'>
     <td colspan=2> SubProgram:</td>
    <td colspan='4'><select name='subcomponent' id='subcomponent'  style='width:300px;'  onchange=\"xajax_view_subcomponent('".$_SESSION['program_name']."',this.value);return false;\">";
 
	 $data.="<option value='' >-All-</option>"; 
	  $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' and prog_id like '".$_SESSION['program_name']."%' order by subcomponent_code asc")or die(http(2848));
	  while($row=mysql_fetch_array($query)){
	  $data.="<option value=\"".retrieve_info_withSpecialCharacters($row['subcomponent_id'])."\">".retrieve_info_withSpecialCharacters($row['subcomponent_code']."  ".$row['subcomponent'])."</option>
      ";
	  
	  }
     $data.="
    </select></td>
 

<td>
    <input name='search' type='button' class='formButton2'value='Go' title='search' onclick=\"xajax_view_subcomponent(getElementById('programme').value,getElementById('subcomponent').value);return false;\" /></td>
   
  </tr>
";
return $data;

}



#*********************************


#filter activity_basedindicator

function filterActivityBasedIndicator(){

$data="


<table cellspacing='0'      width='660' border='0'>
 
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PROGRAMME: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='programme' id='programme'>";

	 $query=mysql_query("select * from tbl_programme where program_name <> '' order by program_name asc") or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['program_name']."'>".$row['program_name']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='component' id='component'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_component where component <> '' order by component asc") or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='%".$row['component']."'>".$row['component']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>SUB-COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left' class=evenrow>
      <select name='subcomponent' id='subcomponent'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc") or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='%".$row['subcomponent_code']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'colspan=''>Type of Indicator:</th>
   
    <th scope='col' colspan=2><div style='float:left;'><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_check_viewIndicatorType(getElementById('type_ofindicator').value);\"><option value=''>-All-</option>";
	
					  $q=mysql_query("select * from tbl_lookup where classCode='2' order by code")or die(mysql_error());
					while($rowL=mysql_fetch_array($q)){
$selected=$_SESSION['code']==$rowL['code']?"SELECTED":"";
$data.="<option value='".$rowL['code']."' '".$selected."'>".$rowL['codeName']."</option>";					
					
					}
					  $data.="			  
                      </select></div><div align='right'><input type='button' class='formButton2'name='export' id='export' value='Export to Excel ' />
      <input type='button' class='formButton2'name='button' id='button' value='New Indicator'  onclick=\"xajax_add_indicator()\"/>
    <input type='button' class='formButton2'name='button' id='button' value='DCED Mapping'  onclick=\"xajax_view_DCEDindicator()\"/>
	</div></th>
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PHYSICAL TARGET: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_indicator where physical_target <> '' and indicator_type like '".$_SESSION['indicatorType']."%'  group by physical_target order by physical_target asc") or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['physical_target']."'>".$row['physical_target']."</option>";
	  } 
      $data.="</select>
    </div></th>
   
  </tr>
 <tr>
    <th width='165' scope='col'><div align='left' width=165>INDICATOR: </div></th>
    <th width='306' scope='col'><div align='left'>
 <select name='indicator' id='indicator'><option value=''>-All-</option>";
	 $query=mysql_query("select * from tbl_indicator where physical_target <> '' and lower(indicator_type) like '".$_SESSION['indicatorType']."%'  group by indicator_name  order by indicator_name asc")or die(mysql_error());
	  while($row=mysql_fetch_array($query)){
	  
	  $data.="<option value='".$row['indicator_name']."'>".substr($row['indicator_name'],0,50)."</option>";
	  } 
      $data.="</select>      </select>
    </div></th><th width='31'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_searchActivityBasedIndicator(getElementById('programme').value,getElementById('component').value,getElementById('subcomponent').value,getElementById('physical_target').value,getElementById('indicator').value); return false;\" align=right /></th>
   
  </tr>
</table>

";
return $data;
}




#*********************************************************************
function filter_annualPhysicalMonitoring(){
$data="<tr class='evenrow'>
    <td scope='col' colspan=9 align='center'><B>Physical Monitoring Results For ".$_SESSION['PMyear']."</b> </td>
    
    <td scope='col' colspan=3 align='right'><a href='export_to_excel_word.php?linkvar=Export Annual Physical Monitoring&&subcomponent=".$_SESSION['Resultsubcomponent']."&&output=".$_SESSION['Resultsoutput']."&&activity=".$_SESSION['Resultactivity']."&&subactivity=".$_SESSION['Resultsubactivity1']."&&year=".$_SESSION['PMyear']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' /></a></td>
  </tr>
  
  <tr class='evenrow'>
    <td scope='col' colspan=2>Subcomponent:</td>
    <td scope='col' colspan=5><select name='subcomponent' id='subcomponent'><option value=''>-ALL-</option>";
	$sel2=mysql_query("select * from tbl_subcomponent order by id asc ")or die("Sunrise Error-code 4525 because ".mysql_error());
	while($row12=mysql_fetch_array($sel2)){
	$s=($_SESSION['Resultsubcomponent']==$row12['subcomponent'])?"SELECTED":"";
	$data.="<option value='".$row12['subcomponent']."' '".$s."'>".$row12['subcomponent_code']." ".substr($row12['subcomponent'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td> <td scope='col'></td>
    <td scope='col'></td><td></td>
     <td scope='col'></td> <td scope='col'></td>
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Output:</td>
    <td scope='col' colspan=5><select name='output' id='output'><option value=''>-ALL-</option>";
	$sel4=mysql_query("select * from tbl_output  order by output_id asc ")or die("Sunrise Error-code 4541 because ".mysql_error());
	while($row14=mysql_fetch_array($sel4)){
	$s1=($_SESSION['Resultoutput']==$row14['output_name'])?"SELECTED":"";
	$data.="<option value='".$row14['output_name']."' '".$s1."'>".$row14['output_code']." ".substr($row14['output_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'></td><td></td>
    <td scope='col'></td> <td scope='col'></td>
     <td scope='col'></td> 
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Activity:</td>
    <td scope='col' colspan=5><select name='activity' id='activity'><option value=''>-ALL-</option>";
	$sel3=mysql_query("select * from tbl_activity order by activity_id asc ")or die("Sunrise Error-code 1183 because ".mysql_error());
	while($row13=mysql_fetch_array($sel3)){
	$s3=($_SESSION['Resultactivity']==$row13['activity_name'])?"SELECTED":"";
	$data.="<option value='".$row13['activity_name']."' '".$s3."'>".$row13['activity_code']." ".substr($row13['activity_name'],0,50)."</option>";
	
	
	}
	$data.="</select></td>
    <td scope='col'></td><td></td>
    <td scope='col'></td><td colspan=2></td>
    
  </tr><tr class='evenrow'>
    <td scope='col' colspan=2>Sub-Activity:</td>
    <td scope='col' colspan=5><select name='subactivity' id='subactivity'><option value=''>-ALL-</option>";
	$sel=mysql_query("select i.indicator_id,i.indicator_name,s.subact_id,s.subactivity_code,s.subactivity_name from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where subactivity_name <> '' group by s.subact_id order by subactivity_code")or die("Sunrise Error-code 1183 because ".mysql_error());
	while($row1=mysql_fetch_array($sel)){
	$s=($_SESSION['Resultsubactivity1']==$row1['subactivity_name'])?"SELECTED":"";
	$data.="<option value='".$row1['subactivity_name']."' '".$s."'>".$row1['subactivity_code']." ".substr($row1['subactivity_name'],0,50)."</option>";
	
	
	}
	
	
	$data.="</select></td>
    <td scope='col'>Year:</td><td><select name='year' id='year'><option value=''>-ALL-</option>";
	$yr=date(Y); $end=$yr;
	do{
	$sel2=($_SESSION['PMyear']==$end)?"SELECTED":"";
	$data.="<option value='".$end."' '".$sel2."'>".$end."</option>";
	$end--;}while($end>= 2010);
	$data.="</select></td>
    <td scope='col'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_annualPhysicalMonitoring(getElementById('subcomponent').value,getElementById('output').value,getElementById('activity').value,getElementById('subactivity').value,getElementById('year').value)\" /></td><td colspan=2></td>
    
  </tr>
  ";
  return $data;
  
}


//-----------------filter Annual Results------------------------

function filter_annualResults(){
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='186' scope='col' colspan='13' ><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2'name='Submit' value='New Entry' onclick=\"xajax_new_AnnualResults('','','','','');return false;\"/> |
       <a href='export_to_excel_word.php?linkvar=Export Workplan&&subcomponent=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['outputAnnualplanning']."&&strategy=".$_SESSION['strategy']."&&siractivity=".$_SESSION['SIRActivity']."&&year=".$_SESSION['fyear']."&&responsible=".$_SESSION['responsible']."&&status=".$_SESSION['status']."&&format=word'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a> | <a href='print_version.php?linkvar=Print Annual SIRActivity Workplan&&subcomponent=".$_SESSION['wpsubcomponent']."&&output=".$_SESSION['outputAnnualplanning']."&&strategy=".$_SESSION['strategy']."&&siractivity=".$_SESSION['SIRActivity']."&&year=".$_SESSION['fyear']."&&responsible=".$_SESSION['responsible']."&&status=".$_SESSION['status']."'><input type='button' class='formButton2'name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";

		 
		 $data.="
			<tr class='evenrow'>
              <td colspan='3'>Program:</td>
              <td colspan='12'><select name='Program' class='combobox' id='Program' onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."',this.value,'".$_SESSION['subprogram']."','".$_SESSION['project']."','','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_programme where prog_id='".$_SESSION['program']."' order by prog_id asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['program']==$row['prog_id'])?"SELECTED":"";
$data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".$row['program_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		
		
			$data.="<tr class='evenrow'>
              <td colspan='3'>Sub-Program:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent'  onchange=\"xajax_new_annualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."',this.value,'".$_SESSION['project']."','','','');return false;\" >";
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
              <td colspan='12'><select name='Project' class='combobox' id='Project'  onchange=\"xajax_ViewAnnualTargets('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['subprogram']."',this.value,'','');return false;\" >";
$data.="<option value=''>-All-</option>"; 
$sql="select * from tbl_project where programme_id='".$_SESSION['Program']."' and id='".$_SESSION['project_id']."' order by project_code asc";
$obj->alert($sql);
$query=mysql_query($sql)or die(http("WP-3817"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['project_id']==$row['id'])?"SELECTED":"";
$data.="<option value=\"".$row['id']."\" ".$selected.">".$row['project_code']." ".$row['title']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Year:</td>
              <td colspan='7'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' /></td>
            </tr>";
  
			
	

 
return $data;
}


//========report filters================================







