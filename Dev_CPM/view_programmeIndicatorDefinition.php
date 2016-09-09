<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
#xajax register functionor
$xajax->register(XAJAX_FUNCTION,'delete_data');
$xajax->register(XAJAX_FUNCTION,'delete_IndicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'delete_IndicatorDefn');
$xajax->register(XAJAX_FUNCTION,'UpdateDasboard');

//----------mer layout-----------------------
$xajax->register(XAJAX_FUNCTION,'view_supergoal');
$xajax->register(XAJAX_FUNCTION,'new_supergoal');
$xajax->register(XAJAX_FUNCTION,'save_supergoal');
$xajax->register(XAJAX_FUNCTION,'edit_supergoal');
$xajax->register(XAJAX_FUNCTION,'update_supergoal');
$xajax->register(XAJAX_FUNCTION,'Close_Logframes');
//-----------program info----------
$xajax->register(XAJAX_FUNCTION,'view_programme_supergoal');
//---------------------------------
$xajax->register(XAJAX_FUNCTION,'view_goal');
$xajax->register(XAJAX_FUNCTION,'new_goal');
$xajax->register(XAJAX_FUNCTION,'save_goal');
$xajax->register(XAJAX_FUNCTION,'edit_goal');
$xajax->register(XAJAX_FUNCTION,'update_goal');
$xajax->register(XAJAX_FUNCTION,'undo_view');
//-------------------------------------------
$xajax->register(XAJAX_FUNCTION,'selectAll');
$xajax->register(XAJAX_FUNCTION,'view_programme');

$xajax->register(XAJAX_FUNCTION,'reload_programme');
$xajax->register(XAJAX_FUNCTION,'edit_programmeAll');
$xajax->register(XAJAX_FUNCTION,'view_all');
$xajax->register(XAJAX_FUNCTION,'viewall_goal');
$xajax->register(XAJAX_FUNCTION,'viewall_purpose');
$xajax->register(XAJAX_FUNCTION,'viewall_output');
$xajax->register(XAJAX_FUNCTION,'close');

$xajax->register(XAJAX_FUNCTION,'viewall_programs');
$xajax->register(XAJAX_FUNCTION,'viewall_subprograms');
$xajax->register(XAJAX_FUNCTION,'viewall_projects');
$xajax->register(XAJAX_FUNCTION,'viewall_indicator');
$xajax->register(XAJAX_FUNCTION,'viewall_indicatorDefintion');
$xajax->register(XAJAX_FUNCTION,'view_programLogframe');


#programme
$xajax->register(XAJAX_FUNCTION,'add_programme');
$xajax->register(XAJAX_FUNCTION,'save_programme');
$xajax->register(XAJAX_FUNCTION,'programme_details');
$xajax->register(XAJAX_FUNCTION,'edit_programme');
$xajax->register(XAJAX_FUNCTION,'update_programme');
$xajax->register(XAJAX_FUNCTION,'updateProgramme2');
$xajax->register(XAJAX_FUNCTION,'deleteprogramme2');
$xajax->register(XAJAX_FUNCTION,'delete_programme');

#component
$xajax->register(XAJAX_FUNCTION,'view_purpose');
$xajax->register(XAJAX_FUNCTION,'search_component');
$xajax->register(XAJAX_FUNCTION,'component_details');
$xajax->register(XAJAX_FUNCTION,'new_purpose');
$xajax->register(XAJAX_FUNCTION,'save_purpose');
$xajax->register(XAJAX_FUNCTION,'edit_purpose');
$xajax->register(XAJAX_FUNCTION,'update_purpose');



$xajax->register(XAJAX_FUNCTION,'edit_component');
$xajax->register(XAJAX_FUNCTION,'update_component');
$xajax->register(XAJAX_FUNCTION,'updateComponent2');
$xajax->register(XAJAX_FUNCTION,'delete_component');
$xajax->register(XAJAX_FUNCTION,'deletecomponent');
#subcomponent
$xajax->register(XAJAX_FUNCTION,'view_subcomponent');
$xajax->register(XAJAX_FUNCTION,'search_subcomponent');
$xajax->register(XAJAX_FUNCTION,'subcomponent_details');
$xajax->register(XAJAX_FUNCTION,'add_subcomponent');
$xajax->register(XAJAX_FUNCTION,'save_subcomponent');
$xajax->register(XAJAX_FUNCTION,'edit_subcomponent');
$xajax->register(XAJAX_FUNCTION,'update_subcomponent');

$xajax->register(XAJAX_FUNCTION,'delete_subcomponent');
$xajax->register(XAJAX_FUNCTION,'deletesubcomponent');
#output
$xajax->register(XAJAX_FUNCTION,'view_output');
$xajax->register(XAJAX_FUNCTION,'output_details');
$xajax->register(XAJAX_FUNCTION,'add_output');
$xajax->register(XAJAX_FUNCTION,'save_output');
$xajax->register(XAJAX_FUNCTION,'search_output');
$xajax->register(XAJAX_FUNCTION,'edit_output');
$xajax->register(XAJAX_FUNCTION,'update_output');
$xajax->register(XAJAX_FUNCTION,'updateOutput2');

$xajax->register(XAJAX_FUNCTION,'delete_output');
$xajax->register(XAJAX_FUNCTION,'delete_indicator');
$xajax->register(XAJAX_FUNCTION,'deleteOutput');

#strategy
$xajax->register(XAJAX_FUNCTION,'view_subprogram');

#indicator

$xajax->register(XAJAX_FUNCTION,'indicator_details');
$xajax->register(XAJAX_FUNCTION,'add_indicator');

$xajax->register(XAJAX_FUNCTION,'save_indicator');
$xajax->register(XAJAX_FUNCTION,'save_indicator_gender');
$xajax->register(XAJAX_FUNCTION,'search_indicator');

$xajax->register(XAJAX_FUNCTION,'check_indicatorType');
$xajax->register(XAJAX_FUNCTION,'check_indicatorType_editing');
$xajax->register(XAJAX_FUNCTION,'selectIndicator');

#--------------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_indicator');
$xajax->register(XAJAX_FUNCTION,'deleteIndicator');
$xajax->register(XAJAX_FUNCTION,'edit_indicator');
$xajax->register(XAJAX_FUNCTION,'update_indicator');
//-indicator defn----------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'view_VariableindicatorDefinition');

$xajax->register(XAJAX_FUNCTION,'save_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'update_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'new_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'new_VariableIndicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'edit_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'delete_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'SpecifyFormular');
$xajax->register(XAJAX_FUNCTION,'UpdateFormular');

#********************************************
$xajax->register(XAJAX_FUNCTION,'dashboardIndicators');
$xajax->register(XAJAX_FUNCTION,'AutoIndicatorCode');
$xajax->register(XAJAX_FUNCTION,'AutoOutputCode');
$xajax->register(XAJAX_FUNCTION,'UpdateVariableOperand');




require_once('permission_save.php');
require_once('permission_edit.php');
require_once('permission_delete.php');
//----------delete data-------------------------<td colspan='2'><input type='checkbox' name='id[]' id='id' value='".$row['id']."' >".$inc."</td>
//--------------undo view------------------------
function undo_view($div){
$obj=new xajaxResponse();
$obj->assign($div,'style.display',"none");
return $obj;

}










function dashboardIndicators(){
  $obj = new xajaxResponse();
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}

 $_SESSION['subcomponent']='';
  $_SESSION['indicator_type']='';
 $_SESSION['program_name']='';
$_SESSION['indicator_name']='';
 $_SESSION['subcomponent']=$subcomponent;
$_SESSION['program_name']=$program;
  $_SESSION['indicator_name']=$indicator_name;
$_SESSION['indicator_type']=$indicator_type;





$data="<fieldset class='evenrowBorder'><form id='indicator_all' name='indicator_all' action='".$PHP_SELF."' method='post' ><table   id='report'    width='100%' border='0' cellspacing='1'>".filter_indicatorDefinition()."

  <tr class='evenrow2'>
    <tD colspan='7' scope='cols' align=center class='dataRow'><B>DASHBOARD INDICATOR DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2' class='dataRow'>
  <td CLASS=black2 colspan='' width='10' class='dataRow'>SELECT</td>
  <td CLASS=black2 width='150' class='dataRow'>INDICATOR TYPE<img src='' height='0' width='100'></td>

  <td CLASS=black2 COLSPAN='3' class='dataRow'>INDICATOR NAME<img src='' height='0' width='300'> </td>
 
  <td CLASS=black2 class='dataRow' width='500' ALIGN='RIGHT'>SHOW ON DASHBOARD?</td>
  </tr>";

$query_string=QueryManager::DashBoardIndicator($indicator_id,$MappingType=LookupData($code=1,$returnValue1=3));
#$obj->alert($query_string);
$query=@mysql_query($query_string)or die(http("VP-4788"));
/* 
$max_records = mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
  */  #$obj->alert($select);
 
/*  if(mysql_num_rows($new_query)>0){ */
  while($row=@mysql_fetch_array($query)){
  $color=($n%2==1)?"evenrow":"whiet1";
 
$events2="onmouseup=\"this.style.backgroundColor='#f0e5a5';\"";
 $data.="<tr class=$color ".$events2.">
   
   <td class='dataRow' ><input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' /><input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >".$inc++."</td>
<td class='dataRow' width='150'>".$row['indicator_type']."</td> 
        <td class='dataRow' colspan='3'>".$row['indicator_code']." ".$row['indicator_name']."</td>
<td ALIGN='RIGHT'><select name='variable' id='variable' onchange=\"xajax_UpdateDasboard(this.value,'".$row['indicator_id']."');return false;\" >";

		$data.=QueryManager::LookupFilter($classCode=14,$codeName=$row['displayonDashboard']);


$data.="</select></td>
  </tr>";
  $n++;  
 }
 $data.="</table></form></fieldset>";

			//$obj->alert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


#************************************************
//$programme,$funder
function view_programme($programme,$funder){
$obj=new xajaxResponse();
$_SESSION['programme']='';
$_SESSION['funder']='';
$_SESSION['programme']=$programme;
$_SESSION['funder']=$funder;
$data="<form name='programme' id='programme'><div id='records'><table cellspacing='1' id='report'   width='100%' border='0' >".filter_programme()."

<tr class='evenrow'>  
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('programme'),'Delete_Programme','prog_id','prog_id','tbl_programme');return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>

<tr class='evenrow'>

    
   <th class='black2' COlspan=5><div align='center'>PROGRAM DETAILS</div></th>
  </tr>
  <tr class='evenrow'>
    <th class='black2' colspan=''>SELECT</th>
	 <th class='black2' colspan=''>CODE</th>
    <th class='black2'>PROGRAM</th>
    <th class='black2'>FUNDER</th>
    <th class='black2' ><div align='right'>DETAILS</div></th>
  </tr>
  ";
   $inc=1;$n=1;
  		 $q="select * from tbl_programme 
		 	 WHERE lower(program_name) like '".strtolower($_SESSION['programme'])."%' 
			 && lower(Funder) like '".strtolower($_SESSION['funder'])."%'
			 and display='Yes'
			  order by prog_id asc";
   #$obj->alert($q);
   $query=mysql_query($q)or die(http(205));
  $n=1;
  $_SESSION['prog2_id']="";
  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	  $div="status".$row['prog_id'];
	  $_SESSION['prog2_id']=$row['prog_id'];
	  $x= "+"; $y= "-";
	 $add=($_SESSION['prog2_id']==$row['prog_id'])?$x:$y; 
  $data.="<tr class=$color class='black'>
    <td><input type='checkbox' name='prog_id[]' id='prog_id' value='".$row['prog_id']."' >".$n++."</td>
	<td><a href='#view_all' >".retrieve_info_withSpecialCharacters($row['program_id'])."</a></td>
    <td>".retrieve_info_withSpecialCharacters($row['program_name'])."</td>
    <td>".retrieve_info_withSpecialCharacters($row['Funder'])."</td>
    <td align='right'><input name='button' type='button' class='formButton2'value='Details' onclick=\"xajax_programme_details('".$row['prog_id']."','".$div."');return false;\" /></td>
  
  </tr>
  <tr><td colspan=5><div id='$div'></div></td></tr>";
    $inc++;
    }
$data.="<tr class='evenrow'>  
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('programme'),'Delete_Programme','prog_id','prog_id','tbl_programme');return false;\"  value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>";
$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function programme_details($prog_id,$div){
$obj=new xajaxResponse();
$_SESSION['prog_id']=$prog_id;
$query=mysql_query("select * from tbl_programme where prog_id='".$prog_id."' order by program_name asc")or die(http(0243));
while($row=mysql_fetch_array($query)){
//$_SESSION['prog_id']=$row['prog_id'];

$data.="<table cellspacing='0' width='100%' border='0' bgcolor='#f0f0f0'>
  <tr >
    <td width='20%'><b>Program:</b></td>
    <td width='' colspan=''>$row[program_name]</td>

  </tr>
  <tr>
    <td><b>Funder:</b></td>
    <td colspan=>$row[Funder]</td>
    
  </tr>
  <tr>
    <td><b>Details</b></td>
    <td colspan=>$row[details]</td>

  </tr>
  <tr>
    <td></td>
    <td colspan=><input type='button' class='formButton2'onclick=\"xajax_view_programme('','','')\" value='Back'> | <input type='button' class='formButton2'onclick=\"print()\" value='Print'>  </td>
    <td></td>
  </tr>
  ";
 }
 
$data.="</table>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}

#***************************************
#view_all
#viewall_subcomponent
#viewall_output
#viewall_activity
#viewall_subactivity
#viewall_indicator
#***************************************
function view_all($div){
$obj=new xajaxResponse();
$divindicator1="Impact Indicator";
$level=array('ASARECA','Program','Project','Secretariat');
$data="
<table cellspacing='0' style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'   width='900' border='1'>
<tr><td colspan='5' align='right'> 
<a href='export_to_excel_word.php?linkvar=Export ResultsFramework&&format=excel'><input name='export' class='formButton2' type='button' value='Export to Excel'></a> 
| <a href='print_version2.php?linkvar=Print ResultsFramework&&format=excel' target='_blank'><input name='export' class='formButton2' type='button' value='Print Version'></a></td></tr>
<tr><td colspan='5' ALIGN='CENTER'><strong>ASARECA LOGICAL FRAMEWORK</strong></td>

</tr>";

  $query1=@mysql_query("select * from tbl_supergoal  order by id asc")or die(http("411"));
  
  $n=1;$inc=1;
  while($row1=@mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	  $divindicatorspgoal="Impact Indicator".$row1['component_code'].$row1['id'];
	   $divgoal="Super Goal".$row1['id'];

$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'value='Impact Indicators' class='button_width' onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicatorspgoal."','supergoal_id','".$row1['id']."','ASARECA');return false;\"></td>";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
<td colspan=''  width='100' ><strong>".ucfirst($row1['component_code'])."</strong></td>
	 <td colspan='3' >".ucfirst($row1['component'])."</td>".$indicator."</tr>
	 <tr class=''  style='background-color:#ffffff;'>
<td colspan='4' ><div id='".$divindicatorspgoal."'></div></td></tr>


";
  $inc++;
 }
  //view all goals
  
  //supergoal_id='".$row1['id']."' and 
  $queryg=mysql_query("select * from tbl_goal where type like '$level[0]%'  order by supergoal_id asc")or die(http("VP-283"));
  
  $n=1;$inc=1;
  while($rowg=mysql_fetch_array($queryg)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicatorgoal="Impact Indicator".$rowg['component_code'].$rowg['id'];
	   $divpurpose="Purpose".$rowg['id'];
$indicator="<td colspan='3' ><input name='indicators' type='button' class='formButton2'value='Impact Indicators' class='button_width'  ondbclick=\"xajax_undo_view('".$divindicatorgoal."');return false;\" onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicatorgoal."','goal_id','".$rowg['id']."','ASARECA');return false;\" /></td>";
$data.="<tr class='evenrow3' style='background-color:#ffffff;'  >
<td colspan='' ><strong>".ucfirst($rowg['component_code'])."</strong></td>
	 <td colspan='3' >".ucfirst($rowg['component'])."</td>".$indicator."</tr>
	 <tr class=''>
<td colspan='4' ><div id='".$divindicatorgoal."'></div></td></tr>";

  $inc++;
  }
  
  //goal_id='".$rowg['goal_id']."' and
  $queryp=mysql_query("select * from tbl_purpose where  type like '$level[0]%' order by id asc")or die(mysql_error());
  
  $n=1;$inc=1;
  while($rowp=mysql_fetch_array($queryp)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicatorpurpose="Outcome Indicator".$rowp['component_code'].$rowp['id'];
	   $divoutput="Purpose".$row1['id'];
$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'value='Outcome Indicators' class='button_width' onclick=\"xajax_viewall_indicator('Outcome Indicator','".$divindicatorpurpose."','purpose_id','".$rowp['id']."','ASARECA');return false;\" /></td>";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
<td colspan='' ><strong>".ucfirst($rowp['component_code'])."</strong></td>
	 <td colspan='3' >".ucfirst($rowp['component'])."</td>".$indicator."</tr>
	 <tr class=''>
<td colspan='4'  style='background-color:#ffffff;' ><div id='".$divindicatorpurpose."'></div></td></tr>
 <tr class=''>";
  $inc++;
  }
  
  $query=mysql_query("select * from tbl_output where type like '$level[0]%' order by output_code asc")or die(http("0305"));
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomp_id']=$row['id'];
  
  $divoutput="output".$row['output_id'];
    $divindicator="Output Indicator".$row['output_id'];
	$color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
  <td><strong>Output:  $row[output_code]</strong></td>
   
    <td colspan='3'><a href='#output_details' class='black'  onclick=\"xajax_viewall_programs('".$row['output_id']."','".$divoutput."');return false;\"><strong>&nbsp;&nbsp;&nbsp;$row[output_name]</strong><a></td>
	
	<td class=''><input type='button' class='formButton2'value='Output Indicators' class='button_width'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\"  onclick=\"xajax_viewall_indicator('Output Indicator','".$divindicator."','output_id','".$row['output_id']."','ASARECA');return false;\" ></td>
  </tr>
  
 
 
  <tr class=''  style='background-color:#ffffff;'>
    <td colspan='6'><div id='".$divindicator."'></ div></td></tr>
  <tr class=''  style='background-color:#ffffff;'>
    <td></td><td colspan=6><div id='".$divoutput."' ></div></td>
  </tr>";
  $inc++;
  }

  }
  else{
  $obj->assign('bodyDisplay','innerHTML',noteMsg("No results Found!"));
  return $obj;
  } 
 
  

$data.=" <input type='hidden' id='datatodisplay' name='datatodisplay'>  </table>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function viewall_goal($div,$supergoal_id){
$obj=new xajaxResponse();
$divindicator1="Impact Indicator";
$data="<table cellspacing='0'  style='tr:hover background-color:#ffffff;' width='800' border='0'>";

  $query1=mysql_query("select * from tbl_goal where supergoal_id='".$supergoal_id."' and type like 'ASARECA%'  order by supergoal_id asc")or die(http("VP-283"));
  
  $n=1;$inc=1;
  while($row1=mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicator="Impact Indicator".$row1['component_code'].$row1['id'];
	   $divpurpose="Purpose".$row1['id'];
$indicator="<td colspan='3' ><input name='indicators' type='button' class='formButton2'value='Impact Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\" onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicator."','goal_id','".$row1['id']."');return false;\" /></td>";
  $data.="<tr class='evenrow3' style='background-color:#ffffff;'  ><td colspan='2' ></td>
<td colspan='' ><strong>".ucfirst($row1['component_code'])."</strong></td>
	 <td colspan='2' ><a href='#'  onclick=\"xajax_viewall_purpose('".$divpurpose."','".$row1['id']."');return false;\"    ondbclick=\"xajax_undo_view('".$divpurpose."');return false;\">".ucfirst($row1['component'])."</a></td>".$indicator."</tr>
	 <tr class=''><td colspan='2' ></td>
<td colspan='4' ><div id='".$divindicator."'></div></td></tr>
 <tr class=''>
<td colspan='2' ></td><td colspan='4' ><div id='".$divpurpose."'></div></td></tr>

";
  $inc++;
  }
$data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}

#------------------------viewall_purpose-----------------------------------------------------------------------------------------

function viewall_purpose($divpurpose,$goal_id){
$obj=new xajaxResponse();
$divindicator1="Outcome Indicator";
$data="<table cellspacing='0'   width='800' border='0'>";

  $query1=mysql_query("select * from tbl_purpose where goal_id='".$goal_id."' and type like 'ASARECA%' order by id asc")or die(mysql_error());
  
  $n=1;$inc=1;
  while($row1=mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicator="Outcome Indicator".$row1['component_code'].$row1['id'];
	   $divoutput="Purpose".$row1['id'];
$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'value='Outcome Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\" onclick=\"xajax_viewall_indicator('Outcome Indicator','".$divindicator."','component_id','".$row1['id']."');return false;\" /></td>";
  $data.="<tr class='evenrow3'>
<td colspan='' ><strong>".ucfirst($row1['component_code'])."</strong></td>
	 <td colspan='2' ><a href='#' ondbclick=\"xajax_undo_view('".$divoutput."');return false;\"  onclick=\"xajax_viewall_output('".$divoutput."','".$row1['id']."');return false;\">".ucfirst($row1['component'])."</a></td>".$indicator."</tr>
	 <tr class=''>
<td colspan='4' ><div id='".$divindicator."'></div></td></tr>
 <tr class=''>
<td colspan='4' ><div id='".$divoutput."'></div></td></tr>

";
  $inc++;
  }
$data.="</table>";

$obj->assign($divpurpose,'innerHTML',$data);
return $obj;
}



function viewall_output($div,$component_id){
$obj=new xajaxResponse();
$data="<table width='800'>";
  $query=mysql_query("select * from tbl_output where purpose_id='".$component_id."' order by output_code asc")or die(http(0305));
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomp_id']=$row['id'];
  
  $divoutput="output".$row['output_id'];
    $divindicator="Output Indicator".$row['output_id'];
	$color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='evenrow3'>
  <td><strong>Main Output:</strong></td>
   
    <td colspan='2'>$row[output_code]<a href='#output_details' class='black' ondbclick=\"xajax_undo_view('".$divoutput."');return false;\" onclick=\"xajax_viewall_programs('".$row['output_id']."','".$divoutput."');return false;\"><strong>&nbsp;&nbsp;&nbsp;$row[output_name]</strong><a></td>
	
	<td class=''><input type='button' class='formButton2'value='Output Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\"  onclick=\"xajax_viewall_indicator('Output Indicator','".$divindicator."','output_id','".$row['output_id']."');return false;\" ></td>
  </tr>
  
 
 
  <tr class=''>
    <td colspan='6'><div id='".$divindicator."'></ div></td></tr>
  <tr class=''>
    <td></td><td colspan=6><div id='".$divoutput."' ></div></td>
  </tr>";
  $inc++;
  }

  }
  else{
  $obj->assign('bodyDisplay','innerHTML',noteMsg("No results Found!"));
  return $obj;
  } 
$data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}





function viewall_programs($output_id,$div){
$obj=new xajaxResponse();
//$p=2;
$dd="program";
$data=" <table cellspacing='0'   style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'    width='600'>
<tr><td></td><td></td><td></td><td><img src='icons/close.png' title='Close' alt='Close' onclick=\"xajax_close('".$div."');\"></td></tr>";
if($output_id==1){
$select="select * from tbl_programme where type like 'unit%'  order by prog_id asc";
$query=mysql_query($select)or die(http("VP-464"));
		//view all units-----------------------
		while($row=mysql_fetch_array($query)){
$divoutput="unit_".$row['prog_id'].$output_id;
$divactivity="Subprogram".$row['prog_id'].$output_id;

$data.="<tr>
<td><strong>Unit:</strong></td>
    <td class=''><input type='hidden' value='".$row['unit_id']."'><strong>".$row['unit_id']."</strong></td>
    <td>".ucwords(strtolower($row['program_name']))." ".$row['Accronym']."</td>

 <td class=''><input type='button' class='formButton2'value='Unit Logical Framework' onclick=\"xajax_view_programLogframe('prog_id',".$row['prog_id'].",'Unit','".$divoutput."','".$row['program_name']."');return false;\" ></td>
  </tr>
 
  <tr>
    <td></td><td class='' colspan='2'><div id='".$divoutput."'></div></td>
    
  </tr> <tr>
    <td colspan='4' ><div id='".$divactivity."' ></div></td></td>
    
  </tr>";
  //$p++;
  }
}
else if($output_id==2){
$select=QueryManager::ResultsFramework();

$query=mysql_query($select)or die(http(348));
//$obj->alert($select);
$p=10;
while($row=mysql_fetch_array($query)){
$divoutput="Program_".$row['prog_id'].$output_id;
$divactivity="Subprogram".$row['prog_id'].$output_id;

$data.="<tr>
<td>Program:</td>
    <td class=''><input type='hidden' value='".$row['program_id']."'><strong>".$row['program_id']."</strong></td>
    <td><a href='#Program_details' onclick=\"xajax_viewall_subprograms('".$row['prog_id']."','".$output_id."','".$divactivity."');return false;\"><strong>".$row['program_name']."</strong></a></td>

 <td class=''><input type='button' class='formButton2'value='Program Logical Framework' onclick=\"xajax_view_programLogframe('prog_id',".$row['prog_id'].",'Program','".$divoutput."','".$row['program_name']."');return false;\" ></td>
  </tr>
 
  <tr>
    <td></td><td class='' colspan='2'><div id='".$divoutput."'></div></td>
    
  </tr> <tr>
    <td colspan='4' ><div id='".$divactivity."' ></div></td></td>
    
  </tr>";
  //$p++;
  }
}else {
$select=QueryManager::ResultsFramework();
$query=mysql_query($select)or die(http(348));
//$obj->alert($select);
$p=10;
while($row=mysql_fetch_array($query)){
$divoutput="Program_".$row['prog_id'].$output_id;
$divactivity="Subprogram".$row['prog_id'].$output_id;

$data.="<tr>
<td>Program:</td>
    <td class=''><input type='hidden' value='".$row['program_id']."'><strong>".$row['program_id']."</strong></td>
    <td><a href='#Program_details' onclick=\"xajax_viewall_subprograms('".$row['prog_id']."','".$output_id."','".$divactivity."');return false;\"><strong>".$row['program_name']."</strong></a></td>

 <td class=''><input type='button' class='formButton2'value='Program Logical Framework' onclick=\"xajax_view_programLogframe('prog_id',".$row['prog_id'].",'Program','".$divoutput."','".$row['program_name']."');return false;\" ></td>
  </tr>
 
  <tr>
    <td></td><td class='' colspan='2'><div id='".$divoutput."'></div></td>
    
  </tr> <tr>
    <td colspan='4' ><div id='".$divactivity."' ></div></td></td>
    
  </tr>";
  //$p++;
  }
  }
  $data.="</table>";

$obj->assign($div,'innerHTML',$data);
return $obj;
}

function Close_Logframes($div){
$obj=new xajaxResponse();

$obj->assign($div,'innerHTML','');
return $obj;
}

#********************
//Project Logical Framework
function view_programLogframe($programorProject_ID,$programorProject_IDValue,$type,$div,$Name){
$obj=new xajaxResponse();
//$obj->alert($programorProject_ID);
//&&".$programorProject_ID=$programorProject_IDValue."
//$obj->alert($programorProject_ID."xxxx=".$programorProject_IDValue);

$button="<tr><td colspan='6' align='right'><a href='export_to_excel_word.php?linkvar=Export Program/Project Logframe&&name=".$Name."&&type=".$type."&&programorProject_ID=$programorProject_ID&&programorProject_IDValue=".$programorProject_IDValue."&&format=word'><input name='Exporttoexcel' type='button' class='formButton2'  value='Export to Word'></a>|<a href='export_to_excel_word.php?linkvar=Print Program/Project Logframe&&name=".$Name."&&type=".$type."&&programorProject_ID=$programorProject_ID&&programorProject_IDValue=".$programorProject_IDValue."&&format=Print' target='_blank'><input name='Printtopp' class='formButton2'  type='button' value='Print Version'> </a>|<input name='close' type='button' value='Close' class='formButton2'  onclick=\"xajax_close('".$div."');return false;\"></td></tr>";
$data.="<div id='close_div'><table width='700' cellspacing='1'  >".$button."

<tr class='evenrow'>
 <td colspan='5' align='center'><strong>".ucfirst($Name)." Logical Framework</strong></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2><strong>Objective Statement</strong></td>
 
    <td><strong>Verifiable Indicator</strong></td>
	<td><strong>Sources of Verification</strong></td>
	<td><strong>Assumptions</strong></td>
  </tr>
  ";
  $querysp=mysql_query("select * FROM tbl_supergoal where display='Yes' ")or die(http("VP-575"));
  while($row=mysql_fetch_array($querysp)){
  $data.="<tr class='evenrow'>
    <td valign='top'>".$type." Super Goal</td>
    <td valign='top'><input type='hidden' name='supergoal' value='".$row['id']."'>".$row['component']."</td>
    <td valign='top'>";$data.="<table>";
	$sqlsp="select * from tbl_indicator where display='Yes' and indicator_type like 'Impact Indicator%' and mapping_type like '".$type."%' and supergoal_id='".$row['id']."' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' ";
	
	$query_indicatorsp=@mysql_query($sqlsp)or die(http("VP-617"));
	  if(mysql_num_rows($query_indicatorsp)>0){
	while($rowIn=mysql_fetch_array($query_indicatorsp)){
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td>
	<td class='dataRow'>".$rowIn['indicator_name']."</td>
	</tr>";
	}
	
	}
	else{

	$data.="".noResultsFound()."<tr class='evenrow'><td><div style='float:right'><input name='indicator' type='button' class='formButton2'value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	
	
	
	$data.="</table></td>
	<td class='dataRow' valign='top'>".checkExistance($row['verification_sources'],'','ExistsInteger')."</td>
	<td class='dataRow' valign='top'>".checkExistance($row['assumptions'],'','ExistsInteger')."</td>
  </tr>";
  }
  $sqlg="select * FROM tbl_goal  where display='Yes' and type like '".$type."%' and   ".$programorProject_ID."  ='".$programorProject_IDValue."'  ";
  $queryg=mysql_query($sqlg)or die(http("VP-588"));

  while($rowg=mysql_fetch_array($queryg)){
  $data.="<tr class='evenrow'>
    <td valign='top'>".$type." Goal</td>
    <td valign='top'><input type='hidden' name='supergoal' value='".$rowg['id']."'>".$rowg['component']."</td>
    <td valign='top'>";
	$data.="<table>";
	$query_indicatorg=mysql_query("select * from tbl_indicator where display like 'Yes%' and  indicator_type like 'Impact Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ")or die(http("VP-617"));
	 // $obj->alert("select * from tbl_indicator where indicator_type like 'Impact Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ");
	  // 
	  if(mysql_num_rows($query_indicatorg)>0){
	while($rowIn=mysql_fetch_array($query_indicatorg)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td>
	<td class='dataRow'>".$rowIn['indicator_name']."</td>
</tr>";

	}
	}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
	<td class='dataRow' valign='top'>".checkExistance($rowg['verification_sources'],'','ExistsInteger')."</td>
	<td class='dataRow' valign='top'>".checkExistance($rowg['assumptions'],'','ExistsInteger')."</td>
  </tr>";
  }
    $queryp=mysql_query("select * FROM tbl_purpose  where  display='Yes' and type like '".$type."%' and   ".$programorProject_ID."  ='".$programorProject_IDValue."'  ")or die(http("VP-602"));
  while($rowp=mysql_fetch_array($queryp)){
  $data.="<tr class='evenrow'>
    <td valign='top'>".$type." Purpose</td>
    <td valign='top'>".$rowp['component']."</td>
    <td valign='top'>";
	$data.="<table>";
	$query_indicatorp=mysql_query("select * from tbl_indicator where display='Yes' and  indicator_type like 'Outcome Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."'  ")or die(http("VP-617"));
	  //$obj->alert("select * from tbl_indicator where indicator_type like 'Impact Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ");
	  if(mysql_num_rows($query_indicatorp)>0){
	while($rowIn=mysql_fetch_array($query_indicatorp)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td>
	<td class='dataRow'>".$rowIn['indicator_name']."</td>
	</tr>
	
	
	";

	}
	}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
	
	<td class='dataRow' valign='top'>".checkExistance($rowp['verification_sources'],'','ExistsInteger')."</td>
	<td class='dataRow' valign='top'>".checkExistance($rowp['assumptions'],'','ExistsInteger')."</td>
  </tr>";
  }
  
  //output================
   $queryt=mysql_query("select * from tbl_output where display='Yes' and  type like '".$type."' and   ".$programorProject_ID."   ='".$programorProject_IDValue."' order by output_code,output_name asc ")or die(http("VP-502"));
 //$obj->alert("select * from tbl_output where type like '".$type."' and   ".$programorProject_ID."   ='".$programorProject_IDValue."'  ");
  while($rowt=mysql_fetch_array($queryt)){
  $data.="<tr class='evenrow'>
    <td valign='top'>".$type." Output</td>
    <td valign='top'><input type='hidden' value='".$rowt['output_id']."' name='output_id' id='output_id'>".$rowt['output_code']." ".$rowt['output_name']."</td>
    <td valign='top'>";
	$data.="<table>";
	//$obj->alert("select * from tbl_indicator where indicator_type like 'Output Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and output_id='".$rowt['output_id']."' ");
	$query_indicator=mysql_query("select * from tbl_indicator where display='Yes' and  indicator_type like 'Output Indicator%' and mapping_type like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and output_id='".$rowt['output_id']."' order by indicator_code asc ")or die(http("VP-501"));
	if(mysql_num_rows($query_indicator)>0){
	while($rowIn=mysql_fetch_array($query_indicator)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'>
	<input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td>
	<td class='dataRow'>".$rowIn['indicator_name']."</td>
	</tr>
	
	";

	}}
	else{

	$data.="".noResultsFound()."<tr class='evenrow'><td><div style='float:right'><input name='indicator' type='button' class='formButton2' value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
	<td class='dataRow' valign='top'>".checkExistance($rowt['verification_sources'],'','ExistsInteger')."</td>
	<td class='dataRow' valign='top'>".checkExistance($rowt['assumptions'],'','ExistsInteger')."</td>
	
  </tr>";
  
  	}
$data.=$button."</table></div>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}




function viewall_subprograms($prog_id,$output_id,$divoutput){
$obj=new xajaxResponse();
//$p=5;
$ddd="project";
$n=1;
$data="<table cellspacing='0'   style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'    width='600'>
<tr><td></td><td></td><td></td><td></td><td></td><td><img src='icons/close.png' title='Close' onclick=\"xajax_close('".$divoutput."');return false;\" alt='Close'></td></tr>";

$select="select * from tbl_subcomponent where prog_id='".$prog_id."' order by subcomponent_code asc";
//$obj->alert($select);
$query=mysql_query($select)or die(http("VP-0379"));

$p=11;$x=1000;
while($row=mysql_fetch_array($query)){
$divactivity="Project Indicator".$row['subprogram_id'].$prog_id.$n;
$divprojects="Projects_".$row['subprogram_id'].$prog_id.$output_id.$x;
//$obj->alert($divprojects);
$data.="<tr>
<td>Sub-Program/Commodities:</td>
    <td class=''>".$row['subcomponent_code']." </td>
    <td><a href='#Commodity_details' onclick=\"xajax_viewall_projects('".$row['subcomponent_id']."','".$divprojects."');return false;\"> ".$row['subcomponent']."</td>";
	if($output_id==1){
	 $data.="<td class=''><input type='button' class='formButton2'value='Secretariat Indicator' onclick=\"xajax_viewall_indicator('Secretariat Indicator','".$divactivity."','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td>";}
	 else 
	 $data.="<td class=''><input type='hidden' class='formButton2'value='Program Indicator' onclick=\"xajax_viewall_indicator('Program Indicator','".$divactivity."','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td>";
 
 $data.="</tr>
 
  <tr>
    <td colspan='6'><div id='".$divactivity."'></div></td></tr>";
	if($output_id==1){
 $data.=" <tr>
    <td></td><td colspan='6'>".noteMsg("No Projects Attached!")."</td></tr>";
	}
	else
	$data.=" <tr>
    <td></td><td colspan='6'><div id='".$divprojects."'></div></td></tr>";
  //$p++;
  
   /* <td class=''><input type='button' class='formButton2'value='Activity Indicator' onclick=\"xajax_viewall_indicator('Activity Indicator','Activity Indicator','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td> */
 
 $n++;
 $p++;
 $x--;}
  
  $data.="</table>";

$obj->assign($divoutput,'innerHTML',$data);
return $obj;
} 
#**********************************************
//******************************************88888888888888888888
function viewall_projects($subcomponent_id,$divprojects){
$obj=new xajaxResponse();
$n=1; $p=1000;
$data=" <table cellspacing='0'      width='500'><tr><td></td><td></td><td></td><td></td><td></td><td><img src='icons/close.png' title='Close' onclick=\"xajax_close('".$divprojects."');return false;\" alt='Close'></td></tr>
";

$select="select * from tbl_project where subprogram_id='".$subcomponent_id."' and display like 'Yes%'  order by project_code ,title asc";
//$obj->alert($select);
$query=mysql_query($select)or die(http(0406));
if(mysql_num_rows($query)>0)
while($row=mysql_fetch_array($query)){
$divindicator="project".$row['id'].$row['subcomponent_id'].$row['prog_id'].$p;
$divactivity="project".$row['id'].$row['subcomponent_id'].$row['prog_id'].$n;
$color=($n%2==1)?"evenrow3":"white1";
$data.="<tr class='$color'>
<td>Project:</td>
    <td colspan='2'><input type='hidden' value='".$row['id']."'>".strtoupper(retrieve_info_withSpecialCharacters($row['project_code']))."  ".retrieve_info_withSpecialCharacters($row['title'])."</td>
	
	<td class=''><input type='button' class='formButton2'value='Project Logical Framework' onclick=\"xajax_view_programLogframe('project_id','".$row['id']."','Project','".$divactivity."','".retrieve_info_withSpecialCharacters($row['title'])."');return false;\" ></td>
	
      </tr>
   <tr>
    <td colspan='3'><div id='".$divindicator."'></div></td></tr>
	<tr><td colspan='3'><div id='".$divactivity."'></div></td></tr>";
$n++;
$p--;
  }
  
  else 
  $data.="<tr><td>".noteMsg("No Records found! ")."</td></tr>";
  $data.="</table>";

$obj->assign($divprojects,'innerHTML',$data);
return $obj;
} 

function close($div){
$obj=new xajaxResponse();
$data="";
$obj->assign($div,'innerHTML',$data);
return $obj;
}

#********************************************
function viewall_indicator($indicator_type,$divindicator,$column_name,$column_value,$level){
$obj=new xajaxResponse();
//$p=13;
//$d="indicator".$p; 
$data=" <table cellspacing='0' width='600'><tr class='white1'><td COLSPAN=2><strong>".$indicator_type."(s)</strong></td><td><input name='close' type='button' value='Close' onclick=\"xajax_close('".$divindicator."')\"></td></tr>";
$select="select * from tbl_indicator where  indicator_type like '".$indicator_type."%' 
and ".$column_name." like '".$column_value."%' 
and mapping_type like '".$level."%' 
&& display like 'Yes%'
 order by indicator_code,indicator_id asc";
$query=mysql_query($select)or die(http("VP-381"));
//$obj->alert($select);

if(mysql_num_rows($query)>0)
while($row=mysql_fetch_array($query)){
$div='Indicator_'.$row['indicator_id'];
//$obj->alert($div);
$data.="<tr class=''>
    <td COLSPAN=4><ul><li>".$row['indicator_code']."&nbsp;&nbsp;&nbsp;<a href='#' onclick=\"xajax_viewall_indicatorDefintion('".$div."','".$row['indicator_id']."');return false;\" >".$row['indicator_name']."</a></li></ul></td>
  </tr>
  <tr>
    <td colspan='4'><div id='".$div."'></div></td></tr>
  ";
  //$p++;
  }
  else 
  $data.="<tr><td>".noteMsg("No Records found! ")."</td></tr>";
  $data.="</table>";

$obj->assign($divindicator,'innerHTML',$data);
return $obj;
} 



function viewall_indicatorDefintion($divdefn,$indicator_id){
$obj=new xajaxResponse();
//$p=13;
//$d="indicator".$p; 
$data=" <table cellspacing='0'      width='600'>

<tr class='white1'>
<td COLSPAN=2>Indicator Defintion </td><td><img src='icons/close.png' alt='Close' title='Close' onclick=\"xajax_close('".$divdefn."');\"></td></tr>
";
$select="select * from tbl_indicator_definition where  indicator_id ='".$indicator_id."' order by DefName,indicator_id asc";
$query=mysql_query($select)or die(http("VP-416"));
//$obj->alert($select);

if(mysql_num_rows($query)>0)
while($row=mysql_fetch_array($query)){
$data.="<tr class=''>
    
    <td colspan=3>".$row['DefName']."  (".$row['expected_output'].")</td>
  </tr>
  ";
  //$p++;
  }
  else 
  $data.="<tr><td>".noteMsg("No Records found! ")."</td></tr>";
  $data.="</table>";

$obj->assign($divdefn,'innerHTML',$data);
return $obj;
} 
#***************************************
function add_programme(){
$obj=new xajaxResponse();
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'      width='557' border='0'>
        
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table cellspacing='0'      border='0'>
			<tr>
                <td>Program Code:</td>
                <td><input name='pcode' type='text' id='pcode' value='' size='50' /></td>
              </tr>
              <tr>
                <td>Program:</td>
                <td><input name='pname' type='text' id='pname' value='' size='50' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><input name='pfunder' type='text'  id='pfunder' size='50' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='47' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_programme(xajax.getFormValues('programme'));\"></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_supergoal($supergoal_type,$output,$programme,$subprogram){
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
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'      width='557' border='0'>
        
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
		<tr>
                <td>Type of SuperGoal :</td>
                <td><select name='supergoaltype' id='supergoaltype' class='combobox2' onchange=\"xajax_new_supergoal(this.value,'','',''); return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-837"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		
        ";
			if($_SESSION['supergoal_type']=='Program'){
              $data.="
			  <tr>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2'  onchange=\"xajax_new_supergoal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-select-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2'><option value=''>-select-</option>";
					  $queryP=mysql_query("select * from tbl_programme where output_id='".$_SESSION['output_id']."' order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".$rowP['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Super Goal:</td>
                <td><textarea name='supergoal' id='supergoal' cols='52' row='3' /></textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			  else if($_SESSION['supergoal_type']=='Project'){
			  $data.="<tr>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2'  onchange=\"xajax_new_supergoal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-select-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2' onchange=\"xajax_new_supergoal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'');return false;\"><option value=''>-select-</option>";
					$query=mysql_query("select * from tbl_programme where output_id='".$_SESSION['output_id']."' order by prog_id")or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					$selecd=($row['prog_id']==$_SESSION['programme'])?"selected":"";
					$data.="<option value=\"".$row['prog_id']."\" ".$selecd." >".$row['program_id']."  ".$row['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram' id='subprogram' class='combobox2' onchange=\"xajax_new_supergoal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value);return false;\"><option value=''>-select-</option>";
					  $querysc=mysql_query("select * from tbl_subcomponent where output_id='".$_SESSION['output_id']."' and prog_id='".$_SESSION['programme']."' order by subcomponent_code asc")or die(mysql_error());
					while($rowsc=mysql_fetch_array($querysc)){
					$selecdsc=($row['subcomponent_id']==$_SESSION['subprogram_id'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project' class='combobox2'><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by project_code,title asc")or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['project_id']."'>".$row['project_code']."  ".retrieve_info_withSpecialCharacters($row['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Super Goal:</td>
                <td><input name='supergoal' type='text'  id='supergoal' size='55' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			  else {
			   $data.="<tr>
                <td>Super Goal:</td>
                <td><input name='supergoal' type='text'  id='supergoal' size='55' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			
             
              $data.="<tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' class='formButton2'name='button' id='button' class='' value='Save' onclick=\"xajax_save_supergoal(xajax.getFormValues('programme'),'".$supergoal_type."');\"></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




#************************************************************************************************************************
#view_purpose
#search_component
#component_details
#add_component
#save_component
#edit_component
#delete_component
#************************************************************************************************************************

 function view_supergoal($output,$programme,$subprogramme,$project,$type,$component){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->alert("Your session has expired! Please login once again.");
$obj->redirect("index.php");
return $obj;
}
$_SESSION['supergoal']='';
  $_SESSION['programme']='';
  $_SESSION['project']='';
  $_SESSION['subprogram']='';
$_SESSION['supergoal_type']='';
    $_SESSION['project']=$project;
 $_SESSION['supergoal']=$component;
  $_SESSION['programme']=$programme;
   $_SESSION['output_name']=$output;
     $_SESSION['subprogramme']=$subprogramme;
   

$_SESSION['subprogram']=$subprogramme;
$_SESSION['supergoal_type']=$supergoal_type;
$data="<form name='component_supergoal' id='component_supergoal' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='0'  width='700' border='0'>".filter_supergoal()."
 
 <tr class='evenrow'>  
    <td colspan='9'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_supergoal(xajax.getFormValues('component_supergoal'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component_supergoal'),'Delete_SuperGoal','id','supergoal_id','tbl_supergoal');return false;\" value='Delete' class='formButtonRed'   /></td>
	 <td></td></tr>
	 <tr>  
    <th colspan='10' class='dataRow'><div style='float:center;'><center>SUPER GOAL DETAILS</center></div></th>
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No<img src='images/spacer3.gif' width='50' ></th>
	 <th colspan='2' class='dataRow' >CODE<img src='images/spacer3.gif' width='100' ></th>
	 <th class='dataRow'>SUPER GOAL</th>
	 <th class='dataRow'>TYPE</th>
	 <th class='dataRow'>Program</th>
	 <th class='dataRow'>Sub-Program</th>
	 <th class='dataRow'>Project</th>
	 <th class='dataRow'>Sources of Verification</th>
	  <th class='dataRow'>Assumptions</th>
	 </tr>";
  $inc=1;
  
  $sql="select s.id,s.component,s.component_code,s.type,s.verification_sources,s.assumptions,pr.id as project_id,pr.title,s.description,sc.`subcomponent_id`,sc.subcomponent,p.prog_id,p.program_name
   from tbl_supergoal s
  left join tbl_programme p  on(s.prog_id=p.prog_id)
left join tbl_subcomponent sc  on(s.subprog_id=sc.subcomponent_id)
  left join tbl_project pr on(s.project_id=pr.id)
  
   where  s.component like '".$_SESSION['supergoal']."%'
   
   and s.type like '".$_SESSION['supergoal_type']."%'
and s.display like 'Yes%'
    order by s.id asc";
//$obj->alert($sql);
/* and p.program_name like '".$_SESSION['programme']."%'
    and sc.subcomponent like '".$_SESSION['subprogram']."%'
   and pr.title like '".$_SESSION['project']."%' */
  $query=@mysql_query($sql)or die(@mysql_error());
  
  $n=1;
  while($row=@mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $program_name=($row['program_name']==NULL)?"N/A":$row['program_name'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	  $description=($row['description']=='')?"Not Specified":$row['description'];
	  $div="goal_1";
  $data.="<tr class='$color'>
<td colspan='2'><input type='checkbox' name='supergoal_id[]' id='supergoal_id' value='".$row['id']."' >".$inc."</td>
  
	 <td colspan=''>".$row['component_code']."</td>
	 
    <td>".pagination::retrieve_info_withSpecialCharactersNowordLimit($row['component'])."</td>
	<td>".retrieve_info_withSpecialCharacters($row['type'])."</td>
	<td>".retrieve_info_withSpecialCharacters($program_name)."</td>
	<td>".retrieve_info_withSpecialCharacters($subcomponent)."</td>
	<td>".retrieve_info_withSpecialCharacters($project)."</td>
	<td>".pagination::retrieve_info_withSpecialCharactersNowordLimit($row['verification_sources'])."</td>
	<td>".pagination::retrieve_info_withSpecialCharactersNowordLimit($row['assumptions'])."</td>
	
</tr>";
  $inc++;
  }
$data.="
<tr>".noRecordsFound($query,8)."</tr>
<tr class='evenrow'>  
    <td colspan=9><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_supergoal(xajax.getFormValues('component_supergoal'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component_supergoal'),'Delete_SuperGoal','id','supergoal_id','tbl_supergoal');return false;\" value='Delete' class='formButtonRed'   /></td>
	 <td></td></tr>";

$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function view_goal($type,$programme,$subprogramme,$project){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->alert("Your session has expired! Please login once again.");
$obj->redirect("index.php");
return $obj;
}

  	$_SESSION['programme']='';
  	$_SESSION['project']='';
  	$_SESSION['subprogram']='';
	$_SESSION['goal_type']='';
  	$_SESSION['goal_type']=$type;
  	$_SESSION['project']=$project;
  	$_SESSION['programme']=$programme;
 	$_SESSION['subprogram']=$subprogramme;

/* if($_SESSION['goal_type']=='ASARECA')$class='display_none';
else if($_SESSION['goal_type']=='Program')$class='display_none';
else if($_SESSION['goal_type']=='Project')$class='display_none';
else $class=''; */
$data="<form name='componentg' id='componentg' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='1'  width='600' border='0'>".filter_goal()."
 
 <tr class='evenrow'>  
    <td colspan='10'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2' TITLE='Edit'  onclick=\"xajax_edit_goal(xajax.getFormValues('componentg'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('componentg'),'Delete_Goal','id','goal_id','tbl_goal');return false;\" value='Delete' class='formButtonRed'   /></td>
	 <td></td></tr>
	 <tr >  

	 
    <th colspan='11' class='dataRow'><center>GOAL DETAILS</center></th>
	
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No<img src='images/spacer3.gif' width='50' ></th>
	 <th colspan='2' class='dataRow' >CODE/Type</th>
	 <th class='dataRow'>SUPER GOAL<img src='images/spacer3.gif' width='200' ></th>
	 <th class='dataRow' colspan='2'>Program<img src='images/spacer3.gif' width='50' ></th>
	 <th class='dataRow'>Sub-Program</th>
	 <th class='dataRow'>Project<img src='images/spacer3.gif' width='200' ></th>
	 <th class='dataRow'>verification sources</th>
	 <th class='dataRow'>assumptions</th>
	 <th class='dataRow'>REMARKS</th>
	 </tr>
";
  $inc=1;
  
 $sql=SetupModule::ViewGoal($_SESSION['goal_type'],$_SESSION['programme'],$_SESSION['project']);
 
 ///$obj->alert($sql);
  $query=@mysql_query($sql)or die(@http("View_programme-1358"));
   $n=1;
  while($row=@mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $program_name=($row['program_name']==NULL)?"N/A":$row['program_name'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	  $description=($row['description']=='')?"-":$row['description'];
	  $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  $div="goal_1";
  $data.="<tr class='$color'>
	<td colspan=2>
	<input type='hidden' name='id[]' id='id' value='".$row['id']."' >
	<input type='checkbox' name='goal_id[]' id='goal_id' value='".$row['id']."' >".$inc."</td>
  	<td colspan=''>".$row['type']."</td>
	<td>".pagination::retrieve_info_withSpecialCharacters($row['component'])."</td>

	<td colspan=2>".$row['prog_id']." ".$program_name."</td>
	<td>".$subcomponent."</td>
	<td>".$project."</td>
	<td>".pagination::retrieve_info_withSpecialCharacters($row['verification_sources'])."</td>
	<td>".pagination::retrieve_info_withSpecialCharacters($row['assumptions'])."</td>
	<td>".pagination::retrieve_info_withSpecialCharacters($description)."</td>
</tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>  
    <td colspan='10'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_goal(xajax.getFormValues('componentg'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('componentg'),'Delete_Goal','id','goal_id','tbl_goal');return false;\" value='Delete' class='formButtonRed'   /></td>
	 <td></td></tr>";

$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function view_purpose($type,$programme,$subprogramme,$project){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->alert("Your Session has expired! Please login once again.");
$obj->redirect("index.php");
return $obj;
}

  $_SESSION['programme']='';
  $_SESSION['project']='';
  $_SESSION['subprogram']='';
$_SESSION['purpose_type']='';
    $_SESSION['project']=$project;
  $_SESSION['programme']=$programme;
$_SESSION['subprogram']=$subprogramme;
$_SESSION['purpose_type']=$type;
$level=array('ASARECA','Program','Project');
$data="<form name='componentp' id='componentp' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='0'  width='700' border='0'>".filter_purpose()."
 
 <tr class='evenrow'>  
    <td colspan='10'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_purpose(xajax.getFormValues('componentp'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('componentp'),'Delete_Purpose','id','purpose_id','tbl_purpose');return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>
	 <tr>  
 
    <th colspan='12' class='dataRow'><center>Purpose DETAILS</center></th>
	
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No<img src='images/spacer3.gif' width='50' ></th>
	 <th colspan='2' class='dataRow' >CODE/TYpe</th>
	 <th class='dataRow' colspan='2'>Purpose<img src='images/spacer3.gif' width='150' ></th>
	 <th class='dataRow'>Program<img src='images/spacer3.gif' width='100' ></th>
	 <th class='dataRow'>Sub-Program</th>
	 <th class='dataRow'>Project<img src='images/spacer3.gif' width='100' ></th> 
	 <th class='dataRow'>verification sources</th>
	 <th class='dataRow'>assumptions</th>
	 <th class='dataRow'>REMARKS</th>
	 </tr>";
  $inc=1;
  
  $sql=SetupModule::ViewPurpose($_SESSION['purpose_type'],$_SESSION['programme'],$_SESSION['project']); 
  
//$obj->alert($_SESSION['purpose_type']);
//$obj->alert($sql);
  $query=@Execute($sql)or die(http("Vp-1000"));
  
  $n=1;
  while($row=@FetchRecords($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=(retrieve_info_withSpecialCharacters($row['title'])==NULL)?"N/A":$row['title'];
	  $program_name=(retrieve_info_withSpecialCharacters($row['program_name'])==NULL)?"N/A":retrieve_info_withSpecialCharacters($row['prog_id']." ".$row['program_name']);
	  $subcomponent=(retrieve_info_withSpecialCharacters($row['subcomponent'])==NULL)?"N/A":retrieve_info_withSpecialCharacters($row['subcomponent_code']." ".$row['subcomponent']);
	  $description=(retrieve_info_withSpecialCharacters($row['description'])=='')?"<font color='orange' ><i>Not Specified</i></font>":retrieve_info_withSpecialCharacters($row['description']);
	  $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  $div="goal_1";
  $data.="<tr class='$color'>
<td colspan=2><input type='checkbox' name='purpose_id[]' id='purpose_id' value='".$row['id']."' >".$inc."</td>
  
	 <td>".retrieve_info_withSpecialCharacters($row['type'])."</td>
	 <td colspan='2'>".retrieve_info_withSpecialCharacters($row['component'])."</td>
	<td>".$program_name."</td>
	<td>".$subcomponent."</td>
	<td>".$project."</td>
	<td>".retrieve_info_withSpecialCharacters($row['verification_sources'])."</td>
	<td>".retrieve_info_withSpecialCharacters($row['assumptions'])."</td>
	<td>".pagination::retrieve_info_withSpecialCharacters($description)."</td>
</tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>".noRecordsFound($query,8)."</tr><tr class='evenrow'>  
    <td colspan=10><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_purpose(xajax.getFormValues('componentp'));return false;\"  value='Edit' />| <input type='button' class='formButton2'name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('componentp'),'Delete_Purpose','id','purpose_id','tbl_purpose');return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>";

$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}







 function component_details($id){
 $obj=new xajaxResponse();
 $query=mysql_query("select c.id,c.prog_id,c.component_code,c.component,c.description,p.program_name from tbl_purpose c inner join tbl_programme p on(c.prog_id=p.prog_id) where id='".$id."' order by component_code asc")or die(http(0562));
 while($row=mysql_fetch_array($query)){
 $data="<table cellspacing='0'      width='400' border='0'>

  <tr>
    <td><b>Strategic Objective:</b></td>
    <td>$row[component]</td>

  </tr>
  
  <tr>
    <td width='150'><b>Project Goal:</b></td>
    <td>$row[program_name]</td>

  </tr>
  <tr>
    <td><b>Details</b></td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr>
    <td>Action</td><td colspan=><input type='button' class='formButton2'title='Close' value='Back' onclick=\"xajax_view_component('','','');\" width='16' height='16' /> | <input type='button' class='formButton2'title='Close' value='Print' onclick=\"print();\" width='16' height='16' /></td>


  </tr>
</table>
";}
 $obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
 }

function add_component(){
$obj=new xajaxResponse();
$data="<form name=component id=component action='' method=post><table cellspacing='0'      border='0'>
 
  
  <tr>
    <td colspan='2'><div id='status'></div></td>
  </tr>
  <tr>
    <td>Project Goal:</td>
    <td><select name='cprogramme' id='cprogramme'><option value=''>-select-</option>";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
					
					} 
    $data.="</select></td>
  </tr>
  
  
  <tr>
    <td>Strategic Objective:</td>
    <td><input name='component' type='text' id='component' size='30' /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='cdescription' id='cdescription' cols='45' rows='5'></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_component(xajax.getFormValues('component'))\">
    </div></td>
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}







 function subcomponent_details($id){
 $obj=new xajaxResponse();
 $query=mysql_query("select * from view_subcomponent where id='".$id."' ")or die(http(0638));
 while($row=mysql_fetch_array($query)){
 $data="<table cellspacing='0'      width='100%' border='0'>


 
  
  <tr>
    <td class='black2'>Project Goal:</td>
    <td>$row[program_name]</td>

  </tr>
  
   <tr>
    <td class='black2'>Strategic Objective:</td>
    <td>$row[component]</td>

  </tr><tr>
    <td class='black2'>Intermediate Result Area:</td>
    <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>

  </tr>
  <tr>
    <td class='black2'>Details</td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><input type='button' class='formButton2'value='Back' title='Close' onclick=\"xajax_view_subcomponent('','','','')\"  /> | <input type='button' class='formButton2'value='Print'  title='print' onclick=\"print();\"  /> </td>


  </tr>
</table>
";}
 $obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
 }


function new_goal($supergoal_type,$output,$programme,$subprogram){
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
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'      width='557' border='0'>
        
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
		<tr>
                <td>Super Goal:</td>
                <td><select name='supergoal_id' id='supergoal_id' class='combobox2' >";
					  $querytyp=mysql_query("select * from tbl_supergoal  order by component asc")or die(http("VP-620"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					//$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['id']."\" ".$seltype." >".$rowtyp['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Type of Goal :</td>
                <td><select name='supergoaltype' id='supergoaltype' class='combobox2' onchange=\"xajax_new_goal(this.value,'','',''); return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-620"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		
        ";
			if($_SESSION['supergoal_type']=='Program'){
              $data.="
			  <tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".pagination::retrieve_info_withSpecialCharacters($rowP['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-programme:</td>
                <td><select name='subprogramme' id='subprogramme' class='combobox2' disabled='disabled'  onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  
			  
			  ";
		
			  }
			  else if($_SESSION['supergoal_type']=='Project'){
			  $data.="<tr class='display_none'>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2' onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'');return false;\"><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					$query=mysql_query("select * from tbl_programme  order by prog_id")or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					$selecd=($row['prog_id']==$_SESSION['programme'])?"selected":"";
					$data.="<option value=\"".$row['prog_id']."\" ".$selecd." >".$row['program_id']."  ".pagination::retrieve_info_withSpecialCharacters($row['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram' id='subprogram' class='combobox2' onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value);return false;\"><option value=''>-select-</option>";
				$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."' order by subcomponent_code asc";
				
					  $querysc=mysql_query($sql)or die(mysql_error());
					while($rowsc=mysql_fetch_array($querysc)){
					$selecdsc=($rowsc['subcomponent_id']==$_SESSION['subprogram'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".pagination::retrieve_info_withSpecialCharacters($rowsc['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project' class='combobox2'><option value=''>-select-</option>";
				$sql2="select * from tbl_project where subprogram_id='".$_SESSION['subprogram']."' and display like 'Yes%' order by project_code,title asc";
				//$obj->alert($sql2);
					  $query=mysql_query($sql2)or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['id']."'>".$row['project_code']."  ".pagination::retrieve_info_withSpecialCharacters($row['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   
			  }
			  else {}
			   $data.="<tr>
                <td> Goal:</td>
                <td><input name='supergoal' type='text'  id='supergoal' size='55' /></td>
              </tr>
			  <tr>
                <td> Sources of Verification:</td>
                <td><textarea name='verification_sources' id='verification_sources' cols='52' row='3' /></textarea></td>
              </tr>
              <tr>
                <td>Assumptions:</td>
                <td><textarea name='assumptions' id='assumptions' cols='52' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  
			
             
              $data.="<tr>
                <td>&nbsp;</td>
                <td align=right><button type='button' class='formButton2'name='button' id='button' class='button_width' value='Save' onclick=\"xajax_save_goal(xajax.getFormValues('programme'),'".$supergoal_type."');\">Save</button></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_purpose($supergoal_type,$goal,$output,$programme,$subprogram,$project){
$obj=new xajaxResponse();
$_SESSION['programme']='';
$_SESSION['project']='';
$_SESSION['goal_id']='';
$_SESSION['supergoal_type']='';
$_SESSION['subprogram']='';
$_SESSION['output_id']='';
$_SESSION['supergoal_type']=$supergoal_type;
$_SESSION['output_id']=$output;
$_SESSION['programme']=$programme;
$_SESSION['goal_id']=$goal;
$_SESSION['subprogram']=$subprogram;
$_SESSION['project']=$project;
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'      width='557' border='0'>
        
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
		<tr>
                <td>Super Goal:</td>
                <td><select name='supergoal_id' id='supergoal_id' class='combobox2' >";
					  $querytyp=mysql_query("select * from tbl_supergoal  order by component asc")or die(http("VP-620"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					//$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['id']."\" ".$seltype." >".$rowtyp['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Type of Purpose :</td>
                <td><select name='supergoaltype' id='supergoaltype' class='combobox2' onchange=\"xajax_new_purpose(this.value,'','','','','',''); return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-620"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".$rowtype['codeName']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		
        ";
			if($_SESSION['supergoal_type']=='Program'){
			
              $data.="
			  <tr>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."',this.value,'','','','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."',this.value,'','');return false;\"  class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".retrieve_info_withSpecialCharacters($rowP['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr class='display_none'>
                <td>".$_SESSION['supergoal_type']."  Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2'  ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."'  order by component asc")or die(http("VP-1600"));
			//$obj->alert("select * from tbl_goal where type='".$_SESSION['supergoal_type']."' and prog_id='".$_SESSION['programme']."'  order by component asc");
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  ";
			
			  }
			  else if($_SESSION['supergoal_type']=='Project'){
			  $data.="
			  
	<tr class='display_none'>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."',this.value,'','');return false;\"  class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".retrieve_info_withSpecialCharacters($rowP['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram' id='subprogram' class='combobox2' onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value,'');return false;\" ><option value=''>-select-</option>";
				$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."' order by subcomponent_code asc";
				//$obj->alert($sql);
					  $querysc=mysql_query($sql)or die(mysql_error());
					while($rowsc=mysql_fetch_array($querysc)){
					$selecdsc=($rowsc['subcomponent_id']==$_SESSION['subprogram'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowsc['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project'   onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value);return false;\" class='combobox2'><option value='' >-select-</option>";
				$sql2="select * from tbl_project where subprogram_id='".$_SESSION['subprogram']."' and display like 'Yes%' order by project_code,title asc";
				//$obj->alert($sql2);
				
					  $querypp=mysql_query($sql2)or die(mysql_error());
					while($rowpp=mysql_fetch_array($querypp)){
					$selecdpp=($rowpp['id']==$_SESSION['project'])?"selected":"";
					$data.="<option value=\"".$rowpp['id']."\" ".$selecdpp." >".$rowpp['project_code']."  ".retrieve_info_withSpecialCharacters($rowpp['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			     <tr class='display_none'>
                <td> ".$_SESSION['supergoal_type']." Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2'  ><option value=''>-Select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and  subprog_id='".$_SESSION['subprogram']."' and project_id='".$_SESSION['project']."'  order by component asc")or die(http("VP-1674"));
					  //$obj->alert("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and  subprogram_id='".$_SESSION['subprogram']."' and project_id='".$_SESSION['project']."'  order by component asc");
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  ";
			 ;
			  }
			  else {}
			  $data.="<tr>
                <td>".$_SESSION['supergoal_type']." Purpose Code:</td>
                <td>
				<textarea name='pcode' id='pcode' cols='52' rows='3'></textarea>
				</td>
              </tr>
		<tr>
                <td>".$_SESSION['supergoal_type']." Purpose:</td>
                <td>
				<textarea name='supergoal' id='supergoal' cols='52' rows='3'></textarea>
				</td>
              </tr>
              <tr>
                <td>Sources of Verification:</td>
                <td><textarea name='verification_sources' id='verification_sources' cols='52' rows='3'></textarea></td>
              </tr>";
			  $data.="<tr>
                <td>Assumptions:</td>
                <td>
				<textarea name='assumptions' id='assumptions' cols='52' rows='3'></textarea>
				</td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  
			
             
              $data.="<tr>
               
                <td align=right colspan=2><button type='button' class='formButton2'name='button' id='button' class='' value='Save' onclick=\"xajax_save_purpose(xajax.getFormValues('programme'),'".$supergoal_type."');\">Save</button></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_subcomponent($programme,$subcomponent){
$obj=new xajaxResponse();
 $_SESSION['subcomponent']='';
  $_SESSION['program_name']='';
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['program_name']=$programme;
$data="<form name='subcomp' id='subcomp' action='".$PHP_SELF."'><DIV ID='records'><table cellspacing='0'  id='report'    width='100%' border='0'>".filter_subprogram()."


<tr CLASS='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' class='formButton2'TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' class='formButton2'TITLE='Edit'  TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('subcomp'),'Delete_subcomponent','');return false;\"  value='Delete' class='redhdrs' /></td>
    
	

  </tr>

<tr class='evenrow'>
 
	
    <tH class='black2' colspan=7><div align='center'>SUB-PROGRAMS</div></tH>

  </tr>
  <tr class='evenrow'>
    <tH class='black2' colspan=''>SELECT</tH>
	
    <tH class='black2' colspan='3'>SUB-PROGRAM</tH>
	<tH class='black2' colspan='2'>PROGRAM</tH>

    <tH class='black2' COLSPAN='' align='right'>ACTION</tH>
  </tr>";
  $inc=1;
 
$select="select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name 
from tbl_subcomponent s 
left join tbl_programme p on(s.prog_id=p.prog_id) 
where  s.subcomponent_id like '".$_SESSION['subcomponent']."%'
&& p.prog_id like '".$_SESSION['program_name']."%' 
group by s.subcomponent_code 
order by s.subcomponent_code asc";
  $query=@mysql_query($select)or die(http(00726));
  $n=1;
  #$obj->alert($select);
 
  while($row=@mysql_fetch_array($query)){
  $_SESSION['subcomponent_id']=$row['id'];
  	  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='$color' class='black'>
<td><input name='subcomponent_id[]' type='checkbox' value=\"".$row['subcomponent_id']."\" />".$n++."</td><td>".retrieve_info_withSpecialCharacters($row['subcomponent_code'])."</td>
    <td colspan='2'><input type='hidden' name='".$row['s.id']."'> ".retrieve_info_withSpecialCharacters($row['subcomponent'])."</a></td>

	<td colspan='2'>".retrieve_info_withSpecialCharacters($row['program_name'])."</td>
	
     <td align='right'><input type='button' class='formButton2'disabled='disabled'  value='Details' /></td>
  </tr>";
  $inc++;
  }
$data.="".noRecordsFound($query,7)."
<tr CLASS='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' class='formButton2'TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />| <input type='button' class='formButton2'TITLE='Edit'  TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('subcomp'),'Delete_subcomponent','');return false;\"  value='Delete' class='redhdrs' /></td>
    
	 

  </tr>";
$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function add_subcomponent($prog_id){
$obj=new xajaxResponse();
$_SESSION['sprog_id']='';
$_SESSION['sprog_id']=$prog_id;
$data="<form method=post name=subcomponent id=subcomponent><table cellspacing='0'      border='0'>
 <tr>
              
					<tr>
                      <td colspan='2'><div id='status'></div></td>
                    </tr>
                    <tr>
                      <td>Program:</td>
                      <td><select name='programme' id='programme' style='width:270px;' onChange=\"xajax_add_subcomponent(getElementById('programme').value);return false;\">";
					  if($_SESSION['sprog_id']!='')
					  $data.="<option value='".$_SESSION['sprog_id']."'>".substr($_SESSION['sprogramme'],0,70)."</option><option value=''>-select-</option>";
					  else
					  $data.="<option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_programme where display='Yes' order by prog_id asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['sprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$row['prog_id']."\" ".$selected." >".$row['program_id']." ".substr($row['program_name'],0,70)."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>
                    <tr style='display:none;'>
    <td>Strategic Objective:</td>
    <td><select name='component_code' id='component_code' style='width:270px;' ><option value=''>-select-</option>";
	
	//prog_id='".$_SESSION['sprog_id']."'
   $query1=mysql_query("select * from tbl_purpose where prog_id='".$prog_id."'")or die("Sunrise error-code 1011, because, ".mysql_error());
   while($row1=mysql_fetch_array($query1)){
   //$_SESSION['code']=$row1['code'];
   //$ccode=$_SESSION['code']+1.0;
  	$selected=($_SESSION['scomponent_id']==$row1['id'])?"SELECTED":"";
   $data.="<option value=\"".$row1['id']."\" ".$selected.">".substr($row1['component'],0,70)."</option>";
   }
    $data.="</select></td>
  </tr>
    <tr>
    <td>Sub-Program Code:</td>
    <td><input name='subcomponent_code' type='text' id='subcomponent_code' size=50>";
  /*  $query=mysql_query("select subcomponent_code as code from tbl_subcomponent")or die(mysql_error());
   while($row=mysql_fetch_array($query)){
   $_SESSION['code']=$row['code'];
  $ccode=$_SESSION['code']+1.0;
   $data.="<option value='".$ccode."'>".$ccode.".0</option>"; */
  $data.="</td>
  </tr>
       
  
                    <tr>
                      <td>Sub-Program</td>
                      <td><label>
					  <textarea name='subcomponent_name' id='subcomponent_name' cols='47' rows='3'></textarea>
                     
                      </label></td>
                    </tr>
                    <tr>
                      <td height='103'>Description</td>
                      <td><textarea name='scdescript' id='scdescript' cols='47' rows='3'></textarea></td>
                    </tr>
					<tr>
                      <td height='103'></td>
                      <td align='right'><input type='button' class='formButton2'name='subcomponent' id=subcomponent class='button_width' value=Save onclick=\"xajax_save_subcomponent(xajax.getFormValues('subcomponent'));\" class='button_width'></td>
                    </tr>
                  </table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




#***********************************
#view output
#add output
#output_details
#save output
#search_output
#**********************************

function AutoOutputCode($formvalues){
$object=new xajaxResponse();

for($x=0;$x<count($formvalues['output_id']);$x++){
$output_id=$formvalues['output_id'][$x];
//$indicator_type=RetrieveData("tbl_output","output_id",$output_id,'type');
//$object->alert($indicator_type);
$prog_id=$formvalues['prog_id'][$x];
$output_id=$formvalues['output_id'][$x];
$project_id=$formvalues['project_id'][$x];
$levelofindicator=RetrieveData("tbl_output","output_id",$output_id,'type');
if($levelofindicator=='Project'){
$indicator_code=$prog_id.".".$project_id.".".$output_id;
}else if($levelofindicator=='Program'){

$indicator_code=$prog_id.".".$output_id;


}else if($levelofindicator=='ASARECA'){
$indicator_code=$prog_id.".".$output_id;

}
else{


$indicator_code=$prog_id.".".$output_id;
}
#$object->alert($indicator_type);
$xx="update tbl_output set output_code='".$indicator_code."' where output_id='".$output_id."'";
#$object->alert($xx);
@mysql_query($xx)or die(http("VP-2215"));
}
$object->assign('bodyDisplay','innerHTML',congMsg("Output Code Updated Successfully!"));
$object->call("xajax_view_output",'','','','',1,20);
return $object;

}






function view_output($type,$programme,$subcomponent,$project,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse(); 

 	$_SESSION['output_type']='';
  	$_SESSION['programme']='';
  	$_SESSION['project']='';
  	$_SESSION['subprogram']='';
	$_SESSION['output_type']=$type;
	$_SESSION['programme']=$programme;
  	$_SESSION['subprogram']=$subcomponent;
    $_SESSION['project']=$project;  
	$level=array('ASARECA','Program','Project');
$data="<form name='output' id='output' action='$PHP_SELF' METHOD='POST'><div id='records'><table cellspacing='1' id='report'     width='100%' border='0'>".filter_output()."
<tr class='evenrow'>
     
    <td colspan='8'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' class='formButton2'name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('output'),'Delete_output','output_id','output_id','tbl_output');return false;\" value='Delete' class='redhdrs'  />
	
	| <input name='autoindicatorcoding' onclick=\"xajax_AutoOutputCode(xajax.getFormValues('output'));return false;\" type='button' value='Auto-Update Indicator Code' class='formButton2' />
	
	
	</td>

  </tr>
<tr>
    <tH class='black2' colspan='8'><center>OUTPUTS details</center></tH></tr>
<tr class='evenrow'>
<tH class='dataRow'>SELECT</tH> <th class='dataRow'>TYPE/CODE</th>
   <th class='dataRow' colspan='1'>OUTPUT</tH>
   
<tH class='dataRow' colspan=''>PROGRAM<img src='images/spacer3.gif' width='150'></tH>

<tH class='dataRow' colspan='' >SUB-PROGRAM</tH>
<tH class='dataRow' colspan='' >PROJECT<img src='images/spacer3.gif' width='150'></tH>
 <th class='dataRow'>sources of Verification</th>
<tH class='dataRow' colspan='' >assumptions</tH>
    </tr>";
  

  $inc=1;

  $select=SetupModule::ViewOutput($_SESSION['output_type'],$_SESSION['programme'],$_SESSION['project']);
  //$obj->alert($select);



  $query=@Execute($select)or die(http("VP-866"));
  $max_records = @mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=@Execute($select." limit ".$offset.",".$records_per_page) or die(http("View_program-2331")); 

  
  $n=1;

  while($row=@FetchRecords($new_query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //-------------records to display -------------
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	// $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  
  $data.="<tr class=$color >
  <td>
  <input type='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'>
  <input type='hidden' name='project_id[]' id='project_id' value='".$row['project_id']."'>
  <input type='hidden' name='type1[]' id='type1' value='".$row['type']."'>
  <input type='checkbox' name='output_id[]' id='output_id' value='".$row['output_id']."'>".$n++."</td>
  <td colspan='1'>".retrieve_info_withSpecialCharacters($row['type'])." ".$row['output_code']."</td>
<td colspan='1'> ".retrieve_info_withSpecialCharacters($row['output_name'])."</td>";
   if($row['program']<>''){
    $data.="<td colspan='1'><table cellspacing='1' >";
	 $q=mysql_query("select * from tbl_programme order by program_id")or die(http("3517"));
  while($rowsc=mysql_fetch_array($q)){

  $program_name=($rowsc['program_name']==NULL)?$row['program']:$rowsc['program_name'];
  $checked=(strpos($row['program'],$rowsc['program_name']) !==false)?"CHECKED":"";
  $data.="<tr><td><input type='checkbox' name='program[]' id='program' disabled='disabled' ".$checked." value=\"".$rowsc['program_name']."\"></td>
  <td>".$program_name."</td>";
}
$data.="</table></td>";
	}else 
	$data.="<td colspan=''><input type='checkbox' name='program[]' id='program' disabled='disabled' checked value=\"".$row['program_name']."\">".retrieve_info_withSpecialCharacters($row['program_name'])."</td>";
	
	$data.="
	<td>".retrieve_info_withSpecialCharacters($subcomponent)."</td>
    <td>".retrieve_info_withSpecialCharacters($project)."</td>
	<td>".retrieve_info_withSpecialCharacters($row['verification_sources'])."</td>
    <td>".retrieve_info_withSpecialCharacters($row['assumptions'])."</td>
	
	</tr>";
  $inc++;
  }
 
$data.="".noRecordsFound($query,7)."<tr class='evenrow'>
     
    <td colspan='5'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' class='formButton2'name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('output'),'Delete_output','output_id','output_id','tbl_output');return false;\" value='Delete' class='redhdrs'  />
	| <input name='autoindicatorcoding' onclick=\"xajax_AutoOutputCode(xajax.getFormValues('output'));return false;\" type='button' value='Auto-Update Indicator Code' class='formButton2' />
	</td><td colspan='3' align='right'>";
	
		
 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;



		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','1','".$records_per_page."');return false;\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','1','".$records_per_page."');return false;\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_output('".$_SESSION['output_type']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$cur_page."',this.value);return false;\">";
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

	
	
	
		
	
$data.="</td>

  </tr>";
$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
} 





function add_output($supergoal_type,$output,$programme,$subprogram,$project,$goal,$purpose){
$obj=new xajaxResponse();
$_SESSION['oprog_id']=$prog_id;
$_SESSION['programme']='';
$_SESSION['project']='';
$_SESSION['goal_id']='';
$_SESSION['purpose']='';
$_SESSION['supergoal_type']='';
$_SESSION['subprogram']='';
$_SESSION['output_id']='';
$_SESSION['supergoal_type']=$supergoal_type;
$_SESSION['output_id']=$output;
$_SESSION['programme']=$programme;
$_SESSION['subprogram']=$subprogram;
$_SESSION['project']=$project;
$_SESSION['goal_id']=$goal;
$_SESSION['purpose']=$purpose;

      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'      width='557' border='0'>
        
		<tr>
          <td colspan='3' class='black'><div id='status'></div></td>
        </tr>
		<tr>
                <td>Super Goal:</td>
                <td><select name='supergoal_id' id='supergoal_id' class='combobox2' >";
					  $querytyp=mysql_query("select * from tbl_supergoal  order by component asc")or die(http("VP-2012"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					//$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['id']."\" ".$seltype." >".retrieve_info_withSpecialCharacters($rowtyp['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Type of Output:</td>
                <td><select name='supergoaltype' id='supergoaltype' class='combobox2' onchange=\"xajax_add_output(this.value,'','','','','',''); return false;\"><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc")or die(http("VP-2023"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['codeName']."\" ".$seltype." >".retrieve_info_withSpecialCharacters($rowtype['codeName'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			if($_SESSION['supergoal_type']=='Program'){
			
              $data.="
			   <tr>
                <td>Main Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."',this.value,'','','','".$_SESSION['goal_id']."','".$_SESSION['purpose']."');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['prog_id']." ".$rowP['output_code']." ".retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'','','',''); return false;\" class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".retrieve_info_withSpecialCharacters($rowP['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			   <tr>
                <td>".$_SESSION['supergoal_type']."  Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2' onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."','','',this.value,''); return false;\" ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."'  order by prog_id asc")or die(http("VP-2037"));
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			   <tr>
                <td>".$_SESSION['supergoal_type']."  Purpose:</td>
                <td><select name='purpose_id' id='purpose_id' class='combobox2'  ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_purpose where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."' order by prog_id asc")or die(http("VP-2048"));
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";

			  }
			  else if($_SESSION['supergoal_type']=='Project'){
			   $data.="
			   <tr>
                <td>Main Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."',this.value,'','','','".$_SESSION['goal_id']."','".$_SESSION['purpose']."');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['prog_id']." ".$rowP['output_code']." ".retrieve_info_withSpecialCharacters($rowP['output_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'','','',''); return false;\" class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_id']."  ".retrieve_info_withSpecialCharacters($rowP['program_name'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram' id='subprogram' onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value,'','',''); return false;\" class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $querysP=mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['programme']."'  order by prog_id asc")or die(http("VP-645"));
					while($rowsP=mysql_fetch_array($querysP)){
					$selcprogrammesp=($_SESSION['subprogram']==$rowsP['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowsP['subcomponent_id']."\" ".$selcprogrammesp." >".$rowsP['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowsP['subcomponent'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  
			  ";
			  
			 $data.=" <td>Project:</td>
                <td><select name='project' id='project' class='combobox2'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value,'',''); return false;\"><option value=''>-select-</option>";
				$sql2p1="select * from tbl_project where subprogram_id='".$_SESSION['subprogram']."' and display like 'Yes%' order by project_code,title asc";
				//$obj->alert($sql2);
					  $queryp1=mysql_query($sql2p1)or die(mysql_error());
					while($rowp1=mysql_fetch_array($queryp1)){
					$selproject=($rowp1['id']==$_SESSION['project'])?"SELECTED":"";
					$data.="<option value=\"".$rowp1['id']."\" ".$selproject." >".$rowp1['project_code']."  ".retrieve_info_withSpecialCharacters($rowp1['title'])."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>".$_SESSION['supergoal_type']."  Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2' onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."',this.value,''); return false;\" ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."' and project_id='".$_SESSION['project']."'  order by prog_id asc")or die(http("VP-2037"));
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			   <tr>
                <td>".$_SESSION['supergoal_type']."  Purpose:</td>
                <td><select name='purpose_id' id='purpose_id' class='combobox2'  ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_purpose where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."' and project_id='".$_SESSION['project']."' order by prog_id asc")or die(http("VP-2048"));
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selpurpose=($_SESSION['purpose']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selpurpose." >".$rowgoal['prog_id']." ".retrieve_info_withSpecialCharacters($rowgoal['component'])."</option>";
					
					} 
    $data.="</select></td>
              </tr>";

			  } 
			  else {}

$data.="
	<tr class=''>
                      <td> Output Code:</td>
                      
    <td><input type='text' name='output_code' id='output_code' size=55 />";
	
	$data.=" e.g 1.0,2.0</td>
  </tr>
  <tr>
    <td>Output Name: </td>
    <td><label>
	<textarea name='output_name' id='output_name' cols='55' rows='3'></textarea>
     
    </label></td>
  </tr>
  
  <tr>
                <td>Sources of Verification:</td>
                <td><textarea name='verification_sources' id='verification_sources' cols='52' rows='3'></textarea></td>
              </tr>";
			  $data.="<tr>
                <td>Assumptions:</td>
                <td>
				<textarea name='assumptions' id='assumptions' cols='52' rows='3'></textarea>
				</td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>
  
  
  
  <tr class='display_none'>
    <td>Program</td>
    <td><fieldset><legend>Select All That Apply </legend><table >";
	$n=1;
	$q=mysql_query("select * from tbl_programme")or die(http("3517"));
  while($rowsc=mysql_fetch_array($q)){
 // $checked=(strpos($row['program'], $rowsc['program_name']) !==false)?"CHECKED":"";
 $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='$color'><td><input type='checkbox' name='program[]' id='program'  value=\"".$rowsc['program_name']."\"></td>
  <td>$rowsc[program_name]</td></tr>";
  $n++;
}
	$data.="</table></fieldset></td>
  </tr>";
  
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <button type='button' class='formButton2'name='save_output' id='save_output' value='Save' class='button_width' onclick=\"xajax_save_output(xajax.getFormValues('programme'));return false;\">
        Save</button></p>
      </div></td><td><div align='right'>
      <p>
        <input type='hidden' >
        </p>
      </div></td>
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


#**********************************
#view_acivity
#search_activity
#activity_details
#add_activity
#save_activity
#**********************************


/* function view_subprogram($programme,$subcomponent){
$obj=new xajaxResponse();
  $_SESSION['subcomponent']='';
  $_SESSION['program_name']='';
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['program_name']=$programme;
$data="<form name='activity' id='activity' method='post' action='".$PHP_SELF."'><DIV id='records'>
  <table cellspacing='0'   id='report'   width='100%' border='0'>".filter_subprogram()."<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_strategy(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' class='formButton2'src='icons/delete_icon.png' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('activity'),'Delete_subcomponent','');return false;\" value='Delete' class='redhdrs'  /></td>

  </tr><tr class='evenrow2'>
    
	  <td class='black2' colspan='8' align='center'>SUB-PROGRAM DETAILS</td>
    
	 

  </tr>
  <tr class='evenrow2'>
     <td class='black2' colspan=''>SELECT</td>
	 <td class='black2' colspan=3>SUB-PROGRAM</td>
	 <td class='black2' colspan=3>PROGRAMM</td>

	  
    
	 <td class='black2'>ACTION</td>
	 

  </tr>
  ";
  $inc=1;
 
  $select="select sc.subcomponent_id,sc.subcomponent,sc.subcomponent_code,p.prog_id,p.program_name from tbl_subcomponent sc
	inner join tbl_programme p on(p.prog_id=sc.prog_id)
	WHERE p.prog_id like '".$_SESSION['program_name']."%'
	and sc.subcomponent_id like '".$_SESSION['subcomponent']."%'
  	group by sc.subcomponent_code order by sc.subcomponent_code asc";
  $query=@mysql_query($select)or die(http("VP-1182"));
  $obj->alert($select);
  $n=1;
if(@mysql_num_rows($query)>0){
  while($row=@mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr  class='$color'>
    <td><input name='subcomponent_id[]' type='checkbox' value='".$row['subcomponent_id']."' />".$n++."</td>  
		<td colspan=3>".retrieve_info_withSpecialCharacters($row['subcomponent_code'])."   ".retrieve_info_withSpecialCharacters($row['subcomponent'])."</td>	
		<td colspan=3> ".retrieve_info_withSpecialCharacters($row['program_name'])."</td>
	
	  	

	
<td class='black2'><input name='details' title='activity_details' type='button' class='formButton2'value='Details' /></td>

  </tr>";
  $inc++;
  }}
  
$data.="<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_strategy(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' class='formButton2'src='icons/delete_icon.png' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('activity'),'Delete_subcomponent','');return false;\" value='Delete' class='redhdrs'  /></td>

  </tr>";
$data.="</table></div></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

 */
function AutoIndicatorCode($formvalues){
$object=new xajaxResponse();

for($x=0;$x<count($formvalues['indicator_idAll']);$x++){
$indicator_idAll=$formvalues['indicator_idAll'][$x];
$indicator_type=RetrieveData("tbl_indicator","indicator_id",$indicator_idAll,'indicator_type');
//$object->alert($indicator_type);
$prog_id=$formvalues['prog_id'][$x];
$output_id=$formvalues['output_id'][$x];
$project_id=$formvalues['project_id'][$x];
$levelofindicator=RetrieveData("tbl_indicator","indicator_id",$indicator_idAll,'mapping_type');
if($levelofindicator=='Project'){
$indicator_code=$prog_id.".".$project_id.".".generateAutoIndicatorPrefixCode($indicator_type).".".$output_id.".".$indicator_idAll;
}else if($levelofindicator=='Program'){

$indicator_code=$prog_id.".".generateAutoIndicatorPrefixCode($indicator_type).".".$output_id.".".$indicator_idAll;


}else if($levelofindicator=='ASARECA'){
$indicator_code=$prog_id.".".generateAutoIndicatorPrefixCode($indicator_type).".".$output_id.".".$indicator_idAll;

}
else{


$indicator_code=$prog_id.".".generateAutoIndicatorPrefixCode($indicator_type).".".$output_id.".".$indicator_idAll;
}
#$object->alert($indicator_type);
$xx="update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$indicator_idAll."'";
#$object->alert($xx);
@mysql_query($xx)or die(http("VP-2659"));
}
$object->assign('bodyDisplay','innerHTML',congMsg("Indicator Code Updated Successfully!"));
$object->call("xajax_view_indicator",'','','','','',1,20);
return $object;

}





#***********************************view_indicator**********filter_indicator()**************************
function view_indicator($indicator_level,$program,$subcomponent,$project,$indicator_code,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->alert("Your Session has Expired!");
$obj->redirect('index.php');
return $obj;
}
$_SESSION['indicator_code']='';
 	$_SESSION['subcomponent']='';
  	$_SESSION['indicator_type']='';
 	$_SESSION['programme']='';
	$_SESSION['project']='';
	$_SESSION['indicator_level']='';
	$_SESSION['subprogram']=$subcomponent;
	$_SESSION['programme']=$program;
	$_SESSION['project']=$project;
  	$_SESSION['indicator_name']=$indicator_name;
	$_SESSION['indicator_type']=$indicator_type;
	$_SESSION['indicator_level']=$indicator_level;
	$_SESSION['indicator_code']=$indicator_code;
	$level=array('ASARECA','Program','Project');
//
$data.="<form id='indicator_all5' name='indicator_all5' action='".$PHP_SELF."' method='post' >
<table cellspacing='1' width='1000' id='report' border='0'>".filter_indicator()."
<tr class='evenrow'>
     
    <td colspan=8> <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <iNput type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_indicator(xajax.getFormValues('indicator_all5'),'".$indicator_level."');return false;\" value='Edit' />|  <input type='button' class='formButton2' TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDelete(xajax.getFormValues('indicator_all5'),'Delete_Indicator','indicator_id','indicator_idAll','tbl_indicator');return false;\"  />| <input name='autoindicatorcoding' onclick=\"xajax_AutoIndicatorCode(xajax.getFormValues('indicator_all5'));return false;\" type='button' value='Auto-Update Indicator Code' class='formButton2' /></td>
 
   <td colspan=3>";
   //display pages
   
$data.="</td></tr>
  <tr class='evenrow2'>
    <tD colspan='9' scope='cols' align=center><B>INDICATOR DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2'>
  <td CLASS=black2 colspan='' width='10'>SELECT</td>
  <td CLASS=black2 width='200'>INDICATOR TYPE</td>
  <td CLASS=black2 width='200'>Level</td>
  <td CLASS=black2 width='200'>Programme</td>
  <td CLASS=black2 width='200'>Sub-Programme</td>
 <td CLASS=black2>INDICATOR CODE</td>
  <td CLASS='black2' align='right'>INDICATOR<br><img src='images/spacer3.gif' width='250' height='0.1'></td>
 
  <td CLASS=black2 colspan=2>ACTION </td>
  </tr>";
  
  
$query_string=QueryManager::viewASARECAIndicators($_SESSION['indicator_level']);

//$obj->alert($query_string);
$query=@Execute($query_string)or die(http("VP-2533")); 

$max_records = @mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=@mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
//$obj->alert($query_string);
 
/*  if(mysql_num_rows($new_query)>0){ */
  while($row=mysql_fetch_array($new_query)){
  $color=($n%2==1)?"evenrow3":"white1";
 $events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
$div="details".$row['indicator_id'];
 $data.="<tr class=$color ".$events2.">
   
   <td class='dataRow' >
   <input type='hidden' name='indicator_id[]' id='indicator_id'  value='".$row['indicator_id']."' />
   <input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
      <input type='hidden' name='prog_id[]' id='prog_id' value='".$row['prog_id']."' >
	   <input type='hidden' name='output_id[]' id='output_id' value='".$row['output_id']."' >
	    <input type='hidden' name='project_id[]' id='project_id' value='".$row['project_id']."' >
	    <input type='hidden' name='mapping_type[]' id='mapping_type' value='".$row['mapping_type']."' >
   <input type='hidden' name='indicator_type[]' id='indicator_type' value='".retrieve_info_withSpecialCharacters($row['indicator_type'])."' >".$inc++."</td>
<td class='dataRow'>".retrieve_info_withSpecialCharacters($row['indicator_type'])."</td> 
		<td>".retrieve_info_withSpecialCharacters($row['mapping_type'])."</td>
			<td>".retrieve_info_withSpecialCharacters($row['program_name'])."</td>
				<td>".retrieve_info_withSpecialCharacters($row['subcomponent'])."</td>
					<td class='dataRow'>".retrieve_info_withSpecialCharacters($row['indicator_code'])."</td>  
  							<td class='dataRow'>".retrieve_info_withSpecialCharacters($row['indicator_name'])."</td>
  <td class='dataRow' colspan=2><input name='details' type='button' class='formButton2' value='Details' class='formButton2'  title='details' onclick=\"xajax_indicator_details('".$row['indicator_id']."','".$row['mapping_type']."','".$div."');\" /></td>
  </tr>
  <tr><td colspan='9'><div id='".$div."'></div></td></tr>
  
  
  ";
  $n++;  
 }

$data.="<tr class='evenrow'>
        <td colspan=9> <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <iNput type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_indicator(xajax.getFormValues('indicator_all5'),'".$indicator_level."');return false;\" value='Edit' />|<input type='button' class='formButton2'TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDelete(xajax.getFormValues('indicator_all5'),'Delete_Indicator','indicator_id','indicator_idAll','tbl_indicator');return false;\"   /> | <input name='autoindicatorcoding' class='formButton2' onclick=\"xajax_AutoIndicatorCode(xajax.getFormValues('indicator_all5'));return false;\" type='button' value='Auto-Update Indicator Code' /><div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','1','".$records_per_page."');return false;\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','1','".$records_per_page."');return false;\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#'onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$p."','".$records_per_page."');return false;\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_indicator('".$_SESSION['indicator_level']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."','".$_SESSION['project']."','".$_SESSION['indicator_code']."','".$cur_page."',this.value);return false;\">";
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
$data.="</div></td></tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
 
#***********************************************************************

function add_indicator($indicator_type,$output_id,$program_id,$subprogram_id,$supergoal,$goal,$purpose,$level,$project){
$obj=new xajaxResponse();
 //$_SESSION['indicator_id']=$indicator_id;
$_SESSION['indicator_type']=''; 
$_SESSION['indicator_level']=''; 
$_SESSION['subprogram_id']=''; 
$_SESSION['output_id']=''; 
$_SESSION['program_id']=''; 
$_SESSION['purpose']=''; 
$_SESSION['supergoal']='';
$_SESSION['goal']=''; 
$_SESSION['project']='';
$_SESSION['indicator_type']=$indicator_type; 
$_SESSION['output_id']=$output_id; 
$_SESSION['program_id']=$program_id; 
$_SESSION['subprogram_id']=$subprogram_id; 
$_SESSION['purpose']=$purpose; 
$_SESSION['supergoal']=$supergoal; 
$_SESSION['goal']=$goal; 
$_SESSION['indicator_level']=$level; 
$_SESSION['project']=$project; 

//$obj->alert($_SESSION['indicator_level'].",....Indicator type------".$_SESSION['indicator_type']);
$data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'>
	 <table cellspacing='1' id='report'     width='100%' border='0'><tr><td colspan='2'><hr/></td></tr>
		
					 
	<tr class='evenrow3'>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value,'','','','".$_SESSION['supergoal']."','','','','');return false;\" />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					   $queryt=mysql_query("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-2284"));	
					   
					   while($rowt=mysql_fetch_array($queryt)){
					 $selected2=($rowt['codeName']==$_SESSION['indicator_type'])?"SELECTED":"";
					 $data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".retrieve_info_withSpecialCharacters($rowt['codeName'])."</option>";
					   }	
					   
					  $data.=" </select></td>
                    </tr >
					<tr class='evenrow3'>
                      <td>Level of Indicator</td>
                      <td><select name='Level_ofindicator'  id='Level_ofindicator' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."','','',this.value,'');return false;\" />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					   $queryt=mysql_query("select * from tbl_lookup where classCode='24' order by codeName asc")or die(http("VP-2298"));	
					   
					   while($rowl=mysql_fetch_array($queryt)){
					 $selectedl=$rowl['codeName']==$_SESSION['indicator_level']?"SELECTED":"";
					 $data.="<option value=\"".retrieve_info_withSpecialCharacters($rowl['codeName'])."\" ".$selectedl.">".retrieve_info_withSpecialCharacters($rowl['codeName'])."</option>";
					   }	
					   
					  $data.="</select></td>
                    </tr>";
					 if(($_SESSION['indicator_level']=='ASARECA') and ($_SESSION['indicator_type']=='Impact Indicator') ){
					
					//------------Program level----------------------------------------------------------------------------
					
					$data.="
					 <tr class='evenrow'>
                      <td>Super Goal</td>
                      <td>";
					
	 $data.="<select name='supergoal' id='supergoal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','',this.value,'".$_SESSION['goal']."','','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE=''>-N/A-</OPTION>";
					  $querysp=mysql_query('select * from tbl_supergoal order by component asc')or die(http("VP-2268"));
					 while($rowsp=mysql_fetch_array($querysp)){
					 $selectedsp=$rowsp['id']==$_SESSION['supergoal']?"SELECTED":"";
					   $data.="<option value=\"".$rowsp['id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowsp['component'])."</option>";
				
					   }
				
$data.="</select>";
					$data.="</td>
                    </tr>
					
					<tr class='evenrow3'>
                      <td>Goal</td>
                      <td>";
					
					  $data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."',this.value,'','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $sqlg="select * from tbl_goal WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc";
					  //$obj->alert($sqlg);
					  $queryg=mysql_query($sqlg)or die(http("VP-2317"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".$rowg['prog_id']." ".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
				
					   }
				
					  $data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Purpose</td>
                      <td>";
					
					  $data.="<select name='component' id='component' disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc")or die(http("VP-2581"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".$rows['prog_id']."  ".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				
				$data.="</select>";
					$data.="</td>
                    </tr>
			<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id' id='output_id'   class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'','','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE=''>-N/A-</OPTION>";
					  $queryout=mysql_query("select * from tbl_output WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by output_code")or die(http("VP-2659"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".retrieve_info_withSpecialCharacters($rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$row['program_id']."  ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'  disabled='disabled' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='60' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>
	
";
//----end of program level------------>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
					  
					  
					  
					}
					
					else if(($_SESSION['indicator_level']=='ASARECA') and ($_SESSION['indicator_type']=='Outcome Indicator') ){
					
					//------------Program level-----------------------------
					$data.="<tr class='evenrow3'>
                      <td>Goal</td>
                      <td>";
					
					  $data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."',this.value,'','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc")or die(http("VP-2462"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
				
					   }
				
					  $data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Purpose</td>
                      <td>";
					
					  $data.="<select name='component' id='component'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc")or die(http("VP-2581"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				
				$data.="</select>";
					$data.="</td>
                    </tr>
			<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
	$data.="<select name='output_id' id='output_id' disabled='disabled'  class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'','','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>					<OPTION VALUE=''>-N/A-</OPTION>";
					  $queryout=mysql_query("select * from tbl_output WHERE type='".$_SESSION['indicator_level']."' and display like 'Yes%' order by output_code")or die(http("VP-2804"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".retrieve_info_withSpecialCharacters($rowout['output_code']."  ".$rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".retrieve_info_withSpecialCharacters($rowp['program_id']."".$rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'  disabled='disabled' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					  
					  
					}
					else if(($_SESSION['indicator_level']=='ASARECA') and ($_SESSION['indicator_type']=='Output Indicator') ){
					
					//------------Program level-----------------------------
					$data.="<tr class='evenrow3'>
                      <td>Goal</td>
                      <td>";
					
					  $data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."',this.value,'','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc")or die(http("VP-2612"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
						   }
				
					  $data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Purpose</td>
                      <td>";
					
					  $data.="<select name='component' id='component'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','','','','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by component asc")or die(http("VP-2581"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				
				$data.="</select>";
					$data.="</td>
                    </tr>
			<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id' id='output_id'   class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'','','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_output WHERE type='".$_SESSION['indicator_level']."' and display like 'Yes%' order by output_code")or die(http("VP-2957"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".retrieve_info_withSpecialCharacters($rowout['output_code']."  ".$rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component'  disabled='disabled' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".retrieve_info_withSpecialCharacters($rowst['subcomponent_code']."  ".$rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'  disabled='disabled' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					  
					  
					}
					
					//end of ASARECA Level------------------------>>>>>>>>>>>>>>>>>>>>>>>>
					//program Level------------->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>
					
					else if(($_SESSION['indicator_level']=='Program') and ($_SESSION['indicator_type']=='Impact Indicator') ){
					
					//------------Program level-----------------------------
					//.funct_dropDownSelected($tblName="tbl_supergoal", $colSelect="component", $colId="id", $colOrderBy="component",$selected="")
					$data.="
			
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id asc")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>".$_SESSION['indicator_level']." Supergoal:</td>
                      <td>";
						$data.="<select name='supergoal' id='supergoal' class='combobox2' 
  ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=@mysql_query("select * from tbl_supergoal where display like 'Yes%' order by component")or die(http("VP-3082"));
					 while($rowout=@mysql_fetch_array($queryout)){
					 #$selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['id']."\" ".$selectedout." >".retrieve_info_withSpecialCharacters($rowout['component'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					
					
                  <tr class='evenrow3'>
                      <td>".$_SESSION['indicator_level']." Goal:</td>
                      <td>";
					
					  $data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."',this.value,'".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by component asc")or die(http("VP-2764"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".$rowg['prog_id']." ".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
				
					   }
				
$data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>".$_SESSION['indicator_level']." Purpose</td>
                      <td>";
					//add_indicator($indicator_type,$output_id,$program_id,$subprogram_id,$supergoal,$goal,$purpose,$level)
					  $data.="<select name='component' id='component' disabled='disabled'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by prog_id asc")or die(http("VP-2581"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".$rows['prog_id']." ".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				
				$data.="</select>";
					$data.="</td>
                    </tr>
					<tr class='evenrow3'>
                      <td>".$_SESSION['indicator_level']."  Sub-Program</td>
                      <td><select name='sub_component' id='sub_component' disabled='disabled'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'  disabled='disabled' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					  
					  
					}
					
					else if(($_SESSION['indicator_level']=='Program') and ($_SESSION['indicator_type']=='Outcome Indicator') ){
					
					//------------Program level-----------------------------
					$data.="
								<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id asc")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>";
                 
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					  
					  
					}
					
					else if(($_SESSION['indicator_level']=='Program') and ($_SESSION['indicator_type']=='Output Indicator') ){
					
					//------------Program level-----------------------------
					$data.="
			
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id asc")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  <tr class='evenrow3'>
                      <td>".$_SESSION['indicator_level']." Goal:</td>
                      <td>";
					
					  $data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','','".$_SESSION['supergoal']."',this.value,'".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by component asc")or die(http("VP-2764"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".$rowg['prog_id']." ".retrieve_info_withSpecialCharacters($rowg['component'])."</option>";
				
					   }
				
$data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>".$_SESSION['indicator_level']." Purpose</td>
                      <td>";
					
					  $data.="<select name='component' id='component'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					 $querys=mysql_query("select * from tbl_purpose WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by prog_id asc")or die(http("VP-2581"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".$rows['prog_id']." ".retrieve_info_withSpecialCharacters($rows['component'])."</option>";
				}
				$data.="</select>";
					$data.="</td>
                    </tr>
                  <tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id' id='output_id' class='combobox2' 
onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['program_id']."','','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_output WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and display like 'Yes%' order by output_code asc")or die(http("VP-3426"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".retrieve_info_withSpecialCharacters($rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component'  class='combobox2' disabled='disabled'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'  disabled='disabled' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' id='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' id='responsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' id='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' id='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					  
					  
					}
					
					
					
					
					
					//----------------------------------------------------------project level indicator----------------------
					else if(($_SESSION['indicator_level']=='Project') and ($_SESSION['indicator_type']=='Impact Indicator')){
					
					//-------------------------------------------------------------------------------------------------------
					$data.="<tr class='display_none'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id' id='output_id'  disabled='disabled'   class='combobox2' 
onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_output WHERE type like '".$_SESSION['indicator_level']."%' and display like 'Yes%' order by output_code")or die(http("VP-3538"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".retrieve_info_withSpecialCharacters($rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme where display like 'Yes%' order by program_id asc")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
				
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'   onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."',this.value);return false;\" ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 $selected=$rowpj['id']==$_SESSION['project']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
$data.="</select></td></tr>

<tr class='evenrow'>
                      <td width='200'>Project Super Goal</td>
                      <td>";
						$data.="<select name='supergoal' id='supergoal'   class='combobox2' 
  ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_supergoal where display like 'Yes%' order by component asc")or die(http("VP-3538"));
					 while($rowout=mysql_fetch_array($queryout)){
					// $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['id']."\" ".$selectedout." >".retrieve_info_withSpecialCharacters($rowout['component'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
<tr class='evenrow'>
                      <td width='200'>Project Goal</td>
                      <td>";
						$data.="<select name='goal' id='goal' class='combobox2' 
  ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>";
                        
						$sql="select * from tbl_goal where type like '".$_SESSION['indicator_level']."%' and project_id='".$_SESSION['project']."' and display like 'Yes%' group by component order by component asc";
						#$obj->alert($sql);
					  $queryout=@mysql_query($sql)or die(http("VP-3538"));
					 while($rowout=mysql_fetch_array($queryout)){
					// $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['id']."\" ".$selectedout." >".retrieve_info_withSpecialCharacters($rowout['component'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>


					
                  ";
					  
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' id='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' id='responsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' id='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' id='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					}
					
					else if(($_SESSION['indicator_level']=='Project') and ($_SESSION['indicator_type']=='Outcome Indicator')){
					
					//------------
					$data.="
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme where display like 'Yes%'  order by program_id asc")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".retrieve_info_withSpecialCharacters($rowp['program_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
				
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'   onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."',this.value);return false;\" ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $sql="select * from tbl_project where subprogram_id like '".$_SESSION['subprogram_id']."%' and programme_id like '".$_SESSION['program_id']."%' and display like 'Yes%' order by title asc";
					  //$obj->alert($sql);
					  $querypj=mysql_query($sql)or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 $selected=$rowpj['id']==$_SESSION['project']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
$data.="</select></td></tr>
					
	
                  ";
					  
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' id='responsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' id='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' id='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					}
					
					else if(($_SESSION['indicator_level']=='Project') and ($_SESSION['indicator_type']=='Output Indicator')){
					
					//------------
					$data.="
					<tr class='evenrow3'>
                      <td width='200'>Programme:</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id'  class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=@mysql_query("select * from tbl_programme where display like 'Yes%' order by program_id asc")or die(http("VP-1874"));
					 while($rowp=@mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":""; 
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td>Sub-Program:</td>
                      <td><select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
				
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."' and display like 'Yes%'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".retrieve_info_withSpecialCharacters($rowst['subcomponent'])."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr><tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2'   onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."',this.value);return false;\" ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where subprogram_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 $selected=$rowpj['id']==$_SESSION['project']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['project_code'])." ".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
$data.="</select></td></tr>
					
					";
				
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
					  //onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."',this.value);
					$data.="<select name='output_id' id='output_id'     class='combobox2' 
onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>
					<OPTION VALUE=''>-N/A-</OPTION>";
						$sql="select * from tbl_output WHERE type like '".$_SESSION['indicator_level']."%' and prog_id='".$_SESSION['program_id']."' and subprog_id='".$_SESSION['subprogram_id']."' and display like 'Yes%' order by output_code";
						//$obj->alert($sql);
					  $queryout=mysql_query($sql)or die(http("VP-3838"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".retrieve_info_withSpecialCharacters($rowout['output_name'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  ";					  
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' id='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowg['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($rowg['codeName'])."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row13['group_name'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row13['group_name'])."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($rowo['codeName'])."\" ".$selo."/>".retrieve_info_withSpecialCharacters($row13['codeName'])."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' id='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>";

					  
					}
					
					/* 
					
					else{
					
					
					$data.="<tr class='evenrow3'>
                      <td>Goal</td>
                      <td>";
	$data.="<select name='goal' id='goal' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."',this.value,'".$_SESSION['purpose']."','".$_SESSION['indicator_level']."','".$_SESSION['project']."');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryg=mysql_query("select * from tbl_goal  order by component asc")or die(http("VP-2862"));
					 while($rowg=mysql_fetch_array($queryg)){
					 $selectedg=$rowg['id']==$_SESSION['goal']?"SELECTED":"";
					   $data.="<option value=\"".$rowg['id']."\" ".$selectedg." >".$rowg['component']."</option>";
				
					   }
				
					  $data.="</select>";
					$data.="</td>
                    </tr>
	<tr class='evenrow3'>
                      <td>Purpose</td>
                      <td>";
					
					  $data.="<select name='component' id='component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."',this.value,'".$_SESSION['indicator_level']."','".$_SESSION['project']."');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose  order by component asc")or die(http("VP-2877"));
					 while($rows=mysql_fetch_array($querys)){
					 $selectedp=$rows['id']==$_SESSION['purpose']?"SELECTED":"";
					$data.="<option value=\"".$rows['id']."\" ".$selectedp." >".$rows['component']."</option>";
				}
				
				$data.="</select>";
					$data.="</td>
                    </tr>
			<tr class='evenrow3'>
                      <td width='200'>Output</td>
                      <td>";
						$data.="<select name='output_id' id='output_id' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."',this.value,'','".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>
					
						<OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=mysql_query("select * from tbl_output order by output_code")or die(http("VP-4017"));
					 while($rowout=mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".$rowout['output_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
					<tr class='evenrow3'>
                      <td width='200'>Programme</td>
                      <td>";

					$data.="<select name='prog_id' id='prog_id' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."','".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."');return false;\" ><OPTION VALUE=''>-SELECT-</OPTION> <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $queryp=mysql_query("select * from tbl_programme  order by program_id")or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 $selectedp=$rowp['prog_id']==$_SESSION['program_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selectedp.">".$rowp['program_id']." ".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr class='evenrow3'>
                      <td>Sub-Program</td>
                      <td><select name='sub_component' id='sub_component' class='combobox2'  onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."','".$_SESSION['program_id']."',this.value,'".$_SESSION['supergoal']."','".$_SESSION['goal']."','".$_SESSION['purpose']."','".$_SESSION['indicator_level']."');return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION>";
					  //and prog_id='".$_SESSION['program_id']."'
	$sql="select * from tbl_subcomponent order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=mysql_query($sql)or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".$rowst['subcomponent']."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
				
					
					
					
					 
                    $data.="<tr class='evenrow3'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
					  <OPTION VALUE='N/A'>-N/A-</OPTION>";
					  $querypj=mysql_query("select * from tbl_project where display like 'Yes%'  order by title asc")or die(http("VP-1543"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['id']."\" ".$selected." >".strtolower($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td></tr>";
					  
					  $data.="<tr class='evenrow3'>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class='evenrow3'><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class='evenrow3'><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".$rowg['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
	}
	
	$data.="</select>

 </td></tr>
 
  <tr class='evenrow'>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class='evenrow'>
	<td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class='evenrow'>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row14['codeName']."\" ".$sel."/>".$row14['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>";
			
			
			} */
			 $data.="
			  <tr class='evenrow'>
	 <td>Unit of Measure:</td><td><select name='unitofmeasure'  id='unitofmeasure' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='40' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".retrieve_info_withSpecialCharacters($row14['codeName'])."\" ".$sel."/>".retrieve_info_withSpecialCharacters($row14['codeName'])."</option>";
	
	}
	$data.="</select> </td></tr>
			 <tr class='evenrow3'>
                      <td colspan=2><div id='status'></div></td></tr>
			 <tr class='evenrow'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right'><button  name='save_indicator' type='button' class='formButton2'id='save_indicator' value='Save' class='button_width' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator13'));\" />Save</button></td>
            
              </tr>
             
    </table>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function add_indicator_Backup($indicator_type){
$obj=new xajaxResponse();
 //$_SESSION['indicator_id']=$indicator_id;
 $_SESSION['indicator_type']=''; 
$_SESSION['indicator_type']=$indicator_type; 
//$obj->addAlert($_SESSION['indicator_id']);  
$data="";

 

//$sel="select * from tbl_indicator where indicator_id='".$ind_id."'";
//$obj->addAlert($sel);
//$query=mysql_query($sel)or die(http("ED-0301"));
//while($row=mysql_fetch_array($query)){
//onchange=\"xajax_editIndicator(xajax.getFormValues('indicator_idAll'));return false;\"
    $data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'> <table cellspacing='1'      width='100%' border='0'><tr><td colspan='2'><hr/></td></tr>
	<tr>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value);return false;\" />
					  <option value=''>-select-</option>";
					   $queryt=mysql_query("select * from tbl_lookup where classCode='5' order by codeName asc ")or die(http("VP-1838"));	
					   
					   while($rowt=mysql_fetch_array($queryt)){
					   $selected2=$rowt['codeName']==$_SESSION['indicator_type']?"SELECTED":"";
			
					  
					 $data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".$rowt['codeName']."</option>";
					   }	
					   
					  $data.="			  
                      </select></td>
                    </tr >
	 <tr >
                      <td>Component</td>
                      <td>";
					  if(($_SESSION['indicator_type']=='Output Indicator')){
					  $data.="<select name='component' id='component' class='combobox2' disabled='disabled'><OPTION VALUE=''>-SELECT-</OPTION>";
					  $querys=mysql_query('select * from tbl_purpose order by component asc')or die(http("VP-3061"));
					 while($rows=mysql_fetch_array($querys)){
					 //$selected=$rows['component']==$row['component']?"SELECTED":"";
					   $data.="<option value=\"".$rows['id']."\" ".$selected." >".$rows['component']."</option>";
				
					   }
				
					  $data.="</select>";
					  }else {
					  
					  $data.="<select name='component' id='component' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>";
					  $querys=mysql_query("select * from tbl_purpose order by component asc")or die(http("VP-3072"));
					 while($rows=mysql_fetch_array($querys)){
					 //$selected=$rows['component']==$row['component']?"SELECTED":"";
					   $data.="<option value=\"".$rows['id']."\" ".$selected." >".$rows['component']."</option>";
				
					   }
				
					  $data.="
					  
                      </select>";
					  
					  }
					  
					  
					  $data.="</td>
                    </tr>
					<tr>
                      <td width='200'>Output</td>
                      <td>";
					  
					 
					  $data.="<select name='output_id' id='output_id' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
                        ";
					  $queryout=mysql_query('select * from tbl_output order by output_name')or die(http("VP-4222"));
					 while($rowout=mysql_fetch_array($queryout)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selected.">".$rowout['output_code']."  ".$rowout['output_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
	<tr>
                      <td width='200'>Programme</td>
                      <td>";
					  
					  if(($_SESSION['indicator_type']=='Impact Indicator') or ($_SESSION['indicator_type']=='Outcome Indicator')){
					  $data.="<select name='prog_id' id='prog_id' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>";
					  $queryp=mysql_query('select * from tbl_programme order by program_id')or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['program_id']." ".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr>
                      <td>Sub-Program</td>
                      <td><select name='sasubcomponent' id='sub_component' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>";
$queryst=mysql_query("select * from tbl_subcomponent order by  subcomponent_code asc")or die(http("VP-1887"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   //$selected=$rowst['id']==$row['subcomponent_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['id']."\" ".$selected." >".$rowst['subcomponent']."</option>";
					   }	     
				
					  $data.="</select></td>
                    </tr>";
					}else 
					
					 
					  $data.="<select name='prog_id' id='prog_id' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
                        ";
					  $queryp=mysql_query('select * from tbl_programme order by program_id')or die(http("VP-1903"));
					 while($rowp=mysql_fetch_array($queryp)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['program_id']." ".$rowp['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                  
					<tr>
                      <td>Sub-Program</td>
                      <td><select name='sasubcomponent' id='sub_component' class='combobox2'  ><OPTION VALUE=''>-SELECT-</OPTION>";
$queryst=mysql_query("select * from tbl_subcomponent order by  subcomponent_code asc")or die(http("VP-1916"));	
					   
					  while($rowst=mysql_fetch_array($queryst)){
					   //$selected=$rowst['id']==$row['subcomponent_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['id']."\" ".$selected.">".$rowst['subcomponent']."</option>";
					   }	     
				
					  $data.="
					  
                      </select></td>
                    </tr>";
					
					
					
					
					
					 
                    $data.="<tr class='display_none'>
                      <td width='200'>Project:</td>
                      <td>";
					  
					 
					  $data.="<select name='project' id='project' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
                        ";
					  $querypj=mysql_query("select * from tbl_project where display like 'Yes%' order by title")or die(http("VP-4301"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['project_id']."\" ".$selected." >".retrieve_info_withSpecialCharacters($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr><tr>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /></td>
</tr>
    <tr><td>Indicator Name:</td><td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr><td>Gender Disaggregation:</td><td><select name='gender' id='gender' class='combobox2' ><option value=''>-select-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rowg['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".$rowg['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
	}
	
	$data.="</select>

 </td></tr>
  <tr><td>Responsible</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td></tr>
	<tr><td>Expected Output</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select>  </td></tr>
	 <tr><td>Frequency of Reporting</td><td><select name='frequency' id='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row14['codeName']."\" ".$sel."/>".$row14['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>";


                    
                   
					
					// }
			
			 $data.="
     
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right'><input type='button' class='formButton2'name='save_indicator' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator13'));\" /></td>
            
              </tr>
             
    </table>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_indicatorDefinition($parent_Indicator,$program_id,$indicator_type,$indicator_id,$level,$ResultChainLevel,$subcomponent){
$obj=new xajaxResponse();
 				//$_SESSION['indicator_id']=$indicator_id;
 				//$_SESSION['indicator_type']=''; 
 				/* $_SESSION['indicator_name']='';
				$_SESSION['program_id']='';
 				$_SESSION['level']='';
 				#$_SESSION['ResultChainLevel']='';
				$_SESSION['parent_Indicator']='';
				$_SESSION['nhh']=1;  */
				$_SESSION['parent_Indicator']=$parent_Indicator;
				$_SESSION['indicator_type']=$indicator_type;
				$_SESSION['indicator_name']=$indicator_id;
				$_SESSION['program_id']=$program_id;
				$_SESSION['level']=$level;
				$_SESSION['ResultChainLevel']=$ResultChainLevel;
				$_SESSION['subcomponent_id']=$subcomponent;
				$level1=array('Primary','ABI High Level');
					$indicatorType1=array("DCED Based","Subactivity Based","aBi Trust");
				$mappingType=array("Aggregation"=>"Primary","Formula"=>"Formula","ABIHighLevel"=>"ABI High Level");

				//$obj->addAlert($_SESSION['indicator_id']);  
				$data="";

$data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'>
<fieldset class='evenrow'><legend><strong>Step 1: </strong>Select Options That Describe the Type of Indicators to Define:</legend>
									<table cellspacing='1'  id='report' width='100%' border='0'>
									<tr style='display:none' >
										<td colspan='2' >Select The Level of Indicators that You would like to which indicators will be Mapped:</td><td colspan='4'>
					  					<select name='level' id='level' class='combobox2'  onchange=\"xajax_new_indicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."',this.value,'".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\"  >";
	
	
	$data.=QueryManager::MappingTypeFilter($programID=$_SESSION['level']);
	$data.="</select></td></tr>";
	
					
					
					
					 $data.="
					  <tr class='evenrow' >
							<td colspan='2'>Subcomponent:</td><td colspan='4'><select name='subcomponent'  id='subcomponent' class='combobox2'
				onchange=\"xajax_new_indicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."',this.value);return false;\" 												   			 /><option value=''>-select-</option>";
				
					   
					   $data.=QueryManager::SubcomponentFilter($_SESSION['subcomponent_id']);
					   
					  $data.="</select></td></tr>";
					  
					  
					  //----------Result Chain Level--------------
					   $data.="
					  <tr class='evenrow' >
					<td colspan='2'>Result Chain Level:</td><td colspan='4'><select name='resultChain'  id='resultChain' class='combobox2'
				onchange=\"xajax_new_indicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."',
				'".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,'".$_SESSION['subcomponent_id']."');return false;\" />
				<option value=''>-select-</option>";
							   
					   $data.=QueryManager::ResultChainFilter($_SESSION['ResultChainLevel']);
					   
					  $data.="</select></td></tr>";
					  
			 $data.="<tr class='evenrow'>
	<td colspan='2'>High Level Indicator: <strong>(To which Low Level indicators will be Defined)</strong>:</td><td colspan='4'><select name='parent_indicator'  id='parent_indicator' class='combobox2' onchange=\"xajax_new_indicatorDefinition(this.value,'".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$indicator_id."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\" /><option value=''>-select-</option>";
						#and i.indicator_type like  '".$_SESSION['indicator_type']."%' 	
							if($_SESSION['ResultChainLevel']==NULL)$x1="select * from tbl_indicator i
					   where i.indicator_name <> '' 
					   and i.mapping_type='".$mappingType['ABIHighLevel']."' 
					   and subcomponent_id like '".$_SESSION['subcomponent_id']."%'
					  
					    group by  indicator_code,indicator_name asc ";
						else $x1="select * from tbl_indicator i
					   where i.indicator_name <> '' 
					   and i.mapping_type='".$mappingType['ABIHighLevel']."' 
					   and subcomponent_id like '".$_SESSION['subcomponent_id']."%'
					   and rc_id='".$_SESSION['ResultChainLevel']."'
					    group by  indicator_code,indicator_name asc ";
					   	$queryi=@mysql_query($x1)or die(http("VP-4663"));	
					 	//$obj->alert($x1);
					   while($rowi=@mysql_fetch_array($queryi)){
					   $selected2i2=$rowi['indicator_id']==$_SESSION['parent_Indicator']?"SELECTED":"";
			
					  
					 $data.="<option value=\"".$rowi['indicator_id']."\" ".$selected2i2.">".$rowi['indicator_code']."  ".retrieve_info_withSpecialCharacters($rowi['indicator_name'])."</option>";
					   }	
					   
					  $data.="			  
                      </select></td></tr>";
												
					$data.="<tr class='evenrow'>
		<td colspan='2'>Choose the Data Source:</td><td colspan='4'><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onChange=\"xajax_new_indicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."',this.value,'".$indicator_id."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\" /><option value=''>-ALL-</option>";
					  
					   
					   $data.=QueryManager::IndicatorTypeFilter($_SESSION['indicator_type']);
					   
					  $data.="			  
                      </select></td>
                    </tr>";
	
				 
					  $data.="</table></fieldset>";
							


	  
$data.="<fieldset class='evenrow'><legend><strong>Step 2: </strong>Defining ".$_SESSION['mapping_type']." Type Indicators Using the Data Source as ".$_SESSION['indicator_type']."

</legend><table><TR class='evenrowBorder'><th colspan='2'># |

RESULT CHAIN LEVEL<IMG SRC='' WIDTH='100' HEIGHT='0'></Th>
<th colspan='1'>SUBACTIVITY/RESULT<IMG SRC='' WIDTH='300' HEIGHT='0'></Th><th>CHECK</th>
<th colspan='1'>VARIABLE</Th>
<th colspan='4'>PRIMARY INDICATOR<IMG SRC='' WIDTH='300' HEIGHT='0'></Th></TR>";

$n=1;

						if($subcomponent==NULL)$xx="select * from tbl_subcomponent  order by id asc";
						else $xx="select * from tbl_subcomponent where id='".$_SESSION['subcomponent_id']."' order by id asc";
											
						//$obj->alert($xx);
						$queery=@mysql_query($xx) or die(http("4717"));
						while($rowsub=@mysql_fetch_array($queery)){
						
						$data.="<tr class='evenrow'>
									<td colspan='20'>
									<input name='subcomponent_id[]'  id='subcomponent_id' value='".$rowsub['id']."' type='hidden' size='40'>
									<strong>".retrieve_info_withSpecialCharacters($rowsub['subcomponent_code'])."
									 ".retrieve_info_withSpecialCharacters($rowsub['subcomponent'])."</strong></td>  
									 </tr>";
  
  		
/* 	if($_SESSION['indicator_type']==$indicatorType1['DCED']){
		
			if($_SESSION['ResultChainLevel']==NULL)$xxrc="select * from tbl_resultschain order by rc_id asc ";
						else $xxrc="select * from tbl_resultschain where rc_id='".$_SESSION['ResultChainLevel']."' order by rc_id asc ";
											
						//$obj->alert($xx);
						$queryRC=@mysql_query($xxrc) or die(http("4717"));
						while($rowrc=@mysql_fetch_array($queryRC)){
						
						$data.="<tr class='evenrow'>
<td colspan='5'>
<input name='rc_id[]'  id='rc_id' value='".$rowrc['rc_id']."' type='hidden' size='40'>
<strong>".retrieve_info_withSpecialCharacters($rowrc['rc_id'])." ".retrieve_info_withSpecialCharacters($rowrc['name'])."</strong></td>  

  </tr>"; 
  
  }  */
  if($_SESSION['indicator_type']==$indicatorType1[1]){
			$sql1="select i.*,s.subactivity_code,s.subactivity_name from  tbl_indicator i join tbl_subacitivity s on(s.subact_id=i.subactivity_id)
			where  i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by s.subactivity_code,i.indicator_name asc";
			}
  
  		if($_SESSION['indicator_type']==$indicatorType1[0]){
			$sql1="select * from  tbl_indicator i
			where  i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by i.rc_id,i.indicator_name asc";
			}
			else /*and i.rc_id='".$rowrc['rc_id']."'and i.rc_id='".$rowrc['rc_id']."'and i.rc_id='".$_SESSION['ResultChainLevel']."' if($_SESSION['indicator_type']==$indicatorType1['Subactivity']){
			$sql1="select i.*,s.subactivity_code,s.subactivity_name from  tbl_indicator i left join tbl_subactivity s 
			 on(s.subact_id=i.subactivity_id)
			where i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like 'Sub-Activity Based%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by i.indicator_name asc";
			
			
			
			}
			else */{
			
			
			 $sql1="select i.*,s.subactivity_code,s.subactivity_name 
			 from  tbl_indicator i left join tbl_subactivity s 
			 on(s.subact_id=i.subactivity_id)
			where i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by s.subactivity_code,i.indicator_name asc";
			
		
			}
		#$obj->alert($sql1); 
			
		$qouery=Execute($sql1)or die(http("VP-4645"));
	while($rowoq=@mysql_fetch_array($qouery)){
 //for($i=0;$i<$_SESSION['nhh'];$i++){
 
 
 $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='evenrowBorder' >

<td colspan='2'><input type='hidden' size='30' name='indicator_code[]' id='indicator_code' value='".$rowoq['indicator_code']."' >$n  ".RetrieveData($tableName='tbl_resultschain','rc_id',$rowoq['rc_id'],'name')."</td> 
<td colspan='1'>".$rowoq['subactivity_code']." ".$rowoq['subactivity_name']." /<strong>".retrieve_info_withSpecialCharacters($rowoq['physical_target'])."</strong></td>";

$data.="<td>";
 


$data.="<input name='indicator_id[]'  id='indicator_id' value='".$rowoq['indicator_id']."' type='checkbox' size='40'></td>

<td colspan='1'>-</td> 
<td colspan='4'>".retrieve_info_withSpecialCharacters($rowoq['indicator_name'])."</td>  

  </tr>";
  $n++;
  }
      
	  }              
       
	   if($_SESSION['indicator_type']==$indicatorType1['DCED']){
	  // }
		}	
			 $data.="".noRecordsFound($qouery,4)."
              <tr class='evenrowBorder'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right' colspan='5'><input type='button' class='button_width' name='save_indicatorDefinition' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicatorDefinition(xajax.getFormValues('indicator13'),'".LookupData($code=1,$returnValue1=3)."');return false;\" /></td>
            
              </tr>
             
    </table></fieldset>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_VariableIndicatorDefinition($parent_Indicator,$program_id,$indicator_type,$indicator_id,$level,$ResultChainLevel,$subcomponent,$variable='TRUE'){
$obj=new xajaxResponse();
 				
				$_SESSION['parent_Indicator']=$parent_Indicator;
				$_SESSION['indicator_type']=$indicator_type;
				$_SESSION['indicator_name']=$indicator_id;
				$_SESSION['program_id']=$program_id;
				$_SESSION['level']=$level;
				$_SESSION['ResultChainLevel']=$ResultChainLevel;
				$_SESSION['subcomponent_id']=$subcomponent;
				$level1=array('Primary','ABI High Level');
					$indicatorType1=array("DCED Based","Subactivity Based","aBi Trust");
				$mappingType=array("Aggregation"=>"Primary","Formula"=>"Formula","ABIHighLevel"=>"ABI High Level");

				//$obj->addAlert($_SESSION['indicator_id']);  
				$data="";

$data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'>
<fieldset class='evenrow'><legend><strong>Step 1: </strong>Select Options That Describe the Type of Indicators to Define:</legend>
									<table cellspacing='1'  id='report' width='100%' border='0'>
									<tr style='display:none' >
										<td colspan='2' >Select The Level of Indicators that You would like to which indicators will be Mapped:</td><td colspan='4'>
					  					<select name='level' id='level' class='combobox2'  onchange=\"xajax_new_VariableIndicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."',this.value,'".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\"  >";
	
	
	$data.=QueryManager::MappingTypeFilter($programID=$_SESSION['level']);
	$data.="</select></td></tr>";
	
					
					
					
					 $data.="
					  <tr class='evenrow' >
							<td colspan='2'>Subcomponent:</td><td colspan='4'><select name='subcomponent'  id='subcomponent' class='combobox2'
				onchange=\"xajax_new_VariableIndicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."',this.value);return false;\" 												   			 /><option value=''>-select-</option>";
				
					   
					   $data.=QueryManager::SubcomponentFilter($_SESSION['subcomponent_id']);
					   
					  $data.="</select></td></tr>";
					  
					  
					  //----------Result Chain Level--------------
					   $data.="
					  <tr class='evenrow' >
					<td colspan='2'>Result Chain Level:</td><td colspan='4'><select name='resultChain'  id='resultChain' class='combobox2'
				onchange=\"xajax_new_VariableIndicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."','".$_SESSION['indicator_type']."',
				'".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,'".$_SESSION['subcomponent_id']."');return false;\" />
				<option value=''>-select-</option>";
							   
					   $data.=QueryManager::ResultChainFilter($_SESSION['ResultChainLevel']);
					   
					  $data.="</select></td></tr>";
					  
			 $data.="<tr class='evenrow'>
	<td colspan='2'>Variable Indicator: <strong>(To which other Primary indicators will be Mapped)</strong>:</td><td colspan='4'><select name='parent_indicator'  id='parent_indicator' class='combobox2' onchange=\"xajax_new_VariableIndicatorDefinition(this.value,'".$_SESSION['program_id']."','".$_SESSION['indicator_type']."','".$indicator_id."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\" /><option value=''>-select-</option>";
						#and i.indicator_type like  '".$_SESSION['indicator_type']."%' 	
							$data.=QueryManager::VariableIndicatorFilter($ResultChainLevel=$_SESSION['ResultChainLevel'],
							$mappingType=LookupData($code=1,$returnValue1=1),$subcomponent_id=$_SESSION['subcomponent_id'],
							$parent_Indicator,$variable='TRUE');
					  $data.="			  
                      </select></td></tr>";
												
					$data.="<tr class='evenrow'>
		<td colspan='2'>Choose the Data Source:</td><td colspan='4'><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onChange=\"xajax_new_VariableIndicatorDefinition('".$_SESSION['parent_Indicator']."','".$_SESSION['program_id']."',this.value,'".$indicator_id."','".$_SESSION['level']."','".$_SESSION['ResultChainLevel']."','".$_SESSION['subcomponent_id']."');return false;\" /><option value=''>-ALL-</option>";
					  
					   
					   $data.=QueryManager::IndicatorTypeFilter($_SESSION['indicator_type']);
					   
					  $data.="			  
                      </select></td>
                    </tr>";
	
				 
					  $data.="</table></fieldset>";
							


	  
$data.="<fieldset class='evenrow'><legend><strong>Step 2: </strong>Defining ".$_SESSION['mapping_type']." Type Indicators Using the Data Source as ".$_SESSION['indicator_type']."

</legend><table><TR class='evenrowBorder'><th colspan='2'># |

RESULT CHAIN LEVEL<IMG SRC='' WIDTH='100' HEIGHT='0'></Th>
<th colspan='1'>SUBACTIVITY/RESULT<IMG SRC='' WIDTH='300' HEIGHT='0'></Th><th>CHECK</th>
<th colspan='1'>VARIABLE</Th>
<th colspan='4'>PRIMARY INDICATOR<IMG SRC='' WIDTH='300' HEIGHT='0'></Th></TR>";

$n=1;

						if($subcomponent==NULL)$xx="select * from tbl_subcomponent  order by id asc";
						else $xx="select * from tbl_subcomponent where id='".$_SESSION['subcomponent_id']."' order by id asc";
											
						//$obj->alert($xx);
						$queery=@mysql_query($xx) or die(http("4717"));
						while($rowsub=@mysql_fetch_array($queery)){
						
						$data.="<tr class='evenrow'>
									<td colspan='20'>
									<input name='subcomponent_id[]'  id='subcomponent_id' value='".$rowsub['id']."' type='hidden' size='40'>
									<strong>".retrieve_info_withSpecialCharacters($rowsub['subcomponent_code'])."
									 ".retrieve_info_withSpecialCharacters($rowsub['subcomponent'])."</strong></td>  
									 </tr>";
  
  		
/* 	if($_SESSION['indicator_type']==$indicatorType1['DCED']){
		
			if($_SESSION['ResultChainLevel']==NULL)$xxrc="select * from tbl_resultschain order by rc_id asc ";
						else $xxrc="select * from tbl_resultschain where rc_id='".$_SESSION['ResultChainLevel']."' order by rc_id asc ";
											
						//$obj->alert($xx);
						$queryRC=@mysql_query($xxrc) or die(http("4717"));
						while($rowrc=@mysql_fetch_array($queryRC)){
						
						$data.="<tr class='evenrow'>
<td colspan='5'>
<input name='rc_id[]'  id='rc_id' value='".$rowrc['rc_id']."' type='hidden' size='40'>
<strong>".retrieve_info_withSpecialCharacters($rowrc['rc_id'])." ".retrieve_info_withSpecialCharacters($rowrc['name'])."</strong></td>  

  </tr>"; 
  
  }  */
  if($_SESSION['indicator_type']==$indicatorType1[1]){
			$sql1="select i.*,s.subactivity_code,s.subactivity_name from  tbl_indicator i join tbl_subacitivity s on(s.subact_id=i.subactivity_id)
			where  i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by s.subactivity_code,i.indicator_name asc";
			}
  
  		if($_SESSION['indicator_type']==$indicatorType1[0]){
			$sql1="select * from  tbl_indicator i
			where  i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by i.rc_id,i.indicator_name asc";
			}
			else /*and i.rc_id='".$rowrc['rc_id']."'and i.rc_id='".$rowrc['rc_id']."'and i.rc_id='".$_SESSION['ResultChainLevel']."' if($_SESSION['indicator_type']==$indicatorType1['Subactivity']){
			$sql1="select i.*,s.subactivity_code,s.subactivity_name from  tbl_indicator i left join tbl_subactivity s 
			 on(s.subact_id=i.subactivity_id)
			where i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like 'Sub-Activity Based%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by i.indicator_name asc";
			
			
			
			}
			else */{
			
			
			 $sql1="select i.*,s.subactivity_code,s.subactivity_name 
			 from  tbl_indicator i left join tbl_subactivity s 
			 on(s.subact_id=i.subactivity_id)
			where i.mapping_type like '".$level1[0]."%' 
			and i.indicator_type like '".$_SESSION['indicator_type']."%' 
			and i.subcomponent_id='".$rowsub['id']."'
			order by s.subactivity_code,i.indicator_name asc";
			
		
			}
		#$obj->alert($sql1); 
			
		$qouery=Execute($sql1)or die(http("VP-4645"));
	while($rowoq=@mysql_fetch_array($qouery)){
 //for($i=0;$i<$_SESSION['nhh'];$i++){
 
 
 $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='evenrowBorder' >

<td colspan='2'><input type='hidden' size='30' name='indicator_code[]' id='indicator_code' value='".$rowoq['indicator_code']."' >$n  ".RetrieveData($tableName='tbl_resultschain','rc_id',$rowoq['rc_id'],'name')."</td> 
<td colspan='1'>".$rowoq['subactivity_code']." ".$rowoq['subactivity_name']." /<strong>".retrieve_info_withSpecialCharacters($rowoq['physical_target'])."</strong></td>";

$data.="<td>";
 


$data.="<input name='indicator_id[]'  id='indicator_id' value='".$rowoq['indicator_id']."' type='checkbox' size='40'></td>

<td colspan='1'>-</td> 
<td colspan='4'>".retrieve_info_withSpecialCharacters($rowoq['indicator_name'])."</td>  

  </tr>";
  $n++;
  }
      
	  }              
       
	   if($_SESSION['indicator_type']==$indicatorType1['DCED']){
	  // }
		}	
			 $data.="".noRecordsFound($qouery,4)."
              <tr class='evenrowBorder'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right' colspan='5'><input type='button' class='button_width' name='save_indicatorDefinition' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicatorDefinition(xajax.getFormValues('indicator13'),'".LookupData($code=1,$returnValue1=4)."');return false;\" /></td>
            
              </tr>
             
    </table></fieldset>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



#****************************************************
function indicator_details($indicator_id,$level1,$div){
 $obj=new xajaxResponse();
					 /* $select="select ti.indicator_id,ti.indicator_name,ti.disaggregation,o.output_code,o.output_name,ti.subcomponent_id,s.subcomponent_code,s.subcomponent,ti.component_id,c.component,p.prog_id, p.program_name,p.Funder 
					 from tbl_indicator ti 
					 inner join tbl_programme p on(ti.prog_id=p.prog_id) 
					 WHERE lower(indicator_name) 
					 like '".trim(strtolower($_SESSION['indicator11']))."%' 
					 group by indicator_id  
					 order by indicator_id asc;"; */
 #$sel="select * from tbl_indicator where indicator_id='".$indicator_id."' ";
 $select=QueryManager::viewASARECAIndicatorsDetails($level1,$indicator_id);
 //$obj->alert($sel);
 $query=@Execute($select)or die(http("VP-4771"));
 if(@mysql_num_rows($query)>0){
 while($row=@mysql_fetch_array($query)){
 
 $data="<form name='indicator_details' ID='indicator_details' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='100%' border='0'>

  <tr>
    <td width='' class='black2'>Level:</td>
    <td width=''>
	
	<input type='hidden' name='indicator_id' id='indicator_id' value='".$row['indicator_id']."' />".$row['mapping_type']."</td>

  </tr>
  <tr>
    <td class='black2'>Class:</td>
    <td>$row[indicator_type]</td>

  </tr>
  
  <tr>
    <td class='black2'>Programme:</td>
    <td>";
	$prog=$row['program_name']==NULL?"N/A":$row['program_name'];
	$data.=$prog."</td>

  </tr>
   <tr>
    <td class='black2'>Project:</td>
    <td>";
	
	$project=RetrieveData($table='tbl_project',$condition="id",$value=$row['project_id'],$returnValue1='title')==NULL?"N/A":RetrieveData($table='tbl_project',$condition="id",$value=$row['project_id'],$returnValue1='title');
	$data.=$project."</td>
	  </tr>
   
  <tr>
    <td width='' class='black2'>Indicator:</td>
    <td width=''><strong>".$row['indicator_code']."</strong> ".$row['indicator_name']."</td>

  </tr>
  
   <tr>
    <td width='' class='black2'>Gender Disaggregation:</td>
    <td width=''>".$row['disaggregation']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Frequency of Reporting:</td>
    <td width=''>".$row['frequency_of_reporting']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Responsible:</td>
    <td width=''>".$row['responsible']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Expected Output:</td>
    <td width=''>".$row['expected_output']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Unit of Measure:</td>
    <td width=''>".$row['unitofmeasure']."</td>

  </tr>
  
  <tr>
    <td width='' class='black2'>Base Year:</td>
    <td width=''>".$row['baseyear']."</td>

  </tr>
  <tr>
    <td width='' class='black2'>Baseline:</td>
    <td width=''>".$row['baseline']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Last Updated by:</td>
    <td width=''>".$row['updatedby']."</td>

  </tr>
   <tr>
    <td width='' class='black2'>Last Updated :</td>
    <td width=''>".$row['dateupdated']."</td>

  </tr>
    
</tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><input type='button' class='formButton2'Value='Back' title='Back' name='Back' onclick=\"xajax_view_indicator('','','','','','','');return false;\" /> | <input type='button' class='formButton2'value='Print' title='edit' onclick='print()'/> </td>
  </tr>
</table></form>
";}}
else
$obj->alert("Error.....".mysql_error());
 $obj->assign($div,'innerHTML',$data);
 
return $obj;
 }


#****************************************************#Indicator Definitions***************************


function view_indicatorDefinition($typeoftarget,$program,$project,$indicatorType,$indicator,$output,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}

				/*	$_SESSION['subcomponent']='';
				  	$_SESSION['indicator_type']='';
				 	$_SESSION['program_name']='';
					$_SESSION['indicator_name']='';
				 	$_SESSION['subcomponent']=$subcomponent;
					$_SESSION['program_name']=$program;
				  	$_SESSION['indicator_name']=$indicator_name;
					$_SESSION['indicator_type']=$indicator_type; */


				$_SESSION['indicatorType']='';
				$_SESSION['output']='';
				$_SESSION['program']='';
				$_SESSION['project']='';
				$_SESSION['indicator']='';
				$_SESSION['target_type']=$typeoftarget;
				$_SESSION['program']=$program;
				$_SESSION['project']=$project;
				$_SESSION['subprogram']=$subprogram;
				$_SESSION['output']=$output;
				$_SESSION['indicator']=$indicator;
				$_SESSION['indicatorType']=$indicatorType;
				$indicator_Type=array('Results Based','Sub Activity Based','DCED Based','aBi Trust');
					
 				$level1=array('Primary','Formula','ABI High Level');
$data.="<form id='indicator_allDefinition' name='indicator_allDefinition' action='".$PHP_SELF."' method='post' ><fieldset class='evenrow'><table  width='100%' border='0' cellspacing='1' >".filter_indicatorDefinition()."
<tr class='evenrowBorder'>
     
    <td colspan='5'> <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <input type='button' class='formButtonRed' TITLE='Delete' value='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('indicator_allDefinition'),'Delete_IndicatorDefinition','');return false;\"   /></td>
 
   <td colspan=3>";
   //display pages
   
   
   
   $data.="</td>

  </tr>
  <tr class='evenrow2'>
    <tD colspan='7' scope='cols' align=center class='dataRow'><B>INDICATOR DEFINITION DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2' class='dataRow'>
  <td CLASS='black2' colspan='2' width='10' class='dataRow'>SELECT</td>

  <td CLASS='black2' COLSPAN='2' class='dataRow'>HIGH LEVEL  INDICATOR<img width='200' height='0'></td>
   <td CLASS='black2' class='dataRow' width='500' colspan=''>DEFINITION</td><td colspan='2'>ACTION</td>
  </tr>";

				$query_string="select i.indicator_type,i .indicator_id,i.indicator_code,
					d.display,d.DefName,d.defn_id,i.indicator_name,i.mapping_type
				 	from tbl_indicator i join `tbl_indicator_definition` d on(d.indicator_id=i.indicator_id) 
				 	where i.indicator_type like '".$_SESSION['indicatorType']."%'
				 	and i.indicator_id like '".$_SESSION['indicator']."%'
					and i.mapping_type like '".$level1[2]."%'
					group by i.indicator_id 
				 	order by i.indicator_name asc";
			#$obj->alert($query_string);  
			$query=@Execute($query_string)or die(http("VP-4939"));

			$max_records = @mysql_num_rows($query);
			$num_pages=ceil($max_records/$records_per_page);
			$offset = ($cur_page-1)*$records_per_page;
			$inc=$offset+1;
		$new_query=Execute($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
  /* */  #$obj->alert($select);
 
 //if(mysql_num_rows($new_query)>0){ 
   while($row=@mysql_fetch_array($query)){
  $color=($n%2==1)?"evenrowBorder":"white1";
 
$events2="onmouseup=\"this.style.backgroundColor='#FOE5A5';\"";
 $data.="<tr class=$color ".$events2.">
  			<td class='dataRow' valign='top' colspan='4' ><input type='radio' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
				<input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >
				
			".$n."
				<strong>".$row['indicator_code']."</strong> 
					 ".retrieve_info_withSpecialCharacters($row['indicator_name'])." 
				<strong> (".$row['indicator_type'].")</strong>
   			</td>
			<td class='dataRow' width='500' valign='top' colspan='2'>";
 
 //-----------program indicator defn--------

$data.="<table width='300' id='report' cellspacing='0' border='0'>
			<TR>
				<Td colspan=6><strong>PRIMARY INDICATOR</strong>
					<IMG SRC='images/spacer3.gif' width='700' height='0'>
				</Td>
			</TR>";
			$sql="select * from tbl_indicator_definition d
			inner join tbl_indicator i on(i.indicator_id=d.DefName)
			where d.indicator_id='".$row['indicator_id']."'
 			order by i.indicator_code ";
			// 
		#$obj->alert($sql);#and i.mapping_type like '".$level1[1]."%'and d.prog_id like '".$_SESSION['program']."%'
$qdfn=Execute($sql)or die(http("VP-4892"));
while($rowdfn=@mysql_fetch_array($qdfn)){
//$color=$n%2==1?"evenrow"
$data.="<tr class='evenrowDarkBorder'>
			<td class='dataRow' valign='top'><input name='defintion_id' type='checkbox' value='".$rowdfn['defn_id']."' checked='checked' disabled='disabled'></td>
			<td class='dataRow' valign='top'> <strong>".$rowdfn['mapping_type']."</strong></td>
			<td class='dataRow' valign='top'><strong>(".$rowdfn['indicator_type'].")</strong> ".retrieve_info_withSpecialCharacters($rowdfn['indicator_name'])."</td>
			<td valign='top'>
			<td valign='top' valign='top'>
				";
						
						//----for project indicator defn to project indicators-------------
						/* $sql="select * from tbl_indicator_definition d
								inner  join tbl_indicator i on(i.indicator_id=d.projectIndicatorDefinition_id)
								left join tbl_project p on(p.id=d.project_id)
								where d.DefName='".$rowdfn['indicator_id']."' 
								and i.mapping_type like '".$level1[2]."%'
								and d.prog_id like '".$_SESSION['program']."%'
								and d.project_id like '".$_SESSION['project']."%'
								group by i.indicator_code "; */
 							//$obj->alert($sql);
					 		//$qdfnProject=Execute($sql)or die(http("VP-4892")); 
							/* while($rowdfnProject=@mysql_fetch_array($qdfnProject)){

			$data.="<tr class='evenrow'>
				<td class='dataRow' valign='top'>
					<input name='defintion_id' type='checkbox' value='".$row['defn_id']."' checked='checked' disabled='disabled'>
				</td>
				<td class='dataRow' valign='top'> ".$rowdfnProject['indicator_code']."</td>
				<td class='dataRow' valign='top'><strong>(".$rowdfnProject['project_code']." ". $rowdfnProject['title'].")</strong> ".retrieve_info_withSpecialCharacters($rowdfnProject['indicator_name'])."
				</td><td valign='top'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_IndicatorDefinition('".$rowdfnProject['defn_id']."');return false;\" ></td>
			</tr>";
 

					
					}
					 */
					//end of project defn
					$data.="</td><td align='right'>
					
					<a href='#' title='Delete' onclick=\"xajax_delete_IndicatorDefinition('".$rowdfn['defn_id']."');\">
					<img src='icons/trash.png' width='20' height='25' value='Delete' title='Delete'  /></a>
			</td>
			
			
		</tr>";
  
 } 


//end of programme defn----

$data.=noRecordsFound($qdfn,$colspan=7)."</TABLE></td>
<td><input type='button' class='formButton2' TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition('".$row['indicator_id']."','".$level1[2]."');return false;\" value='Edit' /> </td></tr>";

//--------end of coorporate
  $n++;
 } 
$data.=noRecordsFound($query,7)."<tr class='evenrow'>
  				<td colspan=7> <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |  <iNput type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition(xajax.getFormValues('indicator_allDefinition'));return false;\" value='Edit' /> | <input type='button' class='formButtonRed' TITLE='Delete' value='Delete'   onclick=\"ConfirmDelete(xajax.getFormValues('indicator_allDefinition'),'Delete_IndicatorDefinition','');return false;\"  /><div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";

	if($cur_page==1) $data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*1<=$max_records){
		$selected=$i*1==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*1)."\" ".$selected.">".($i*1)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>"; 
$data.="</div></td></tr></table></fieldset></form>"; 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function view_VariableindicatorDefinition($MappingType,$program,$project,$indicatorType,$indicator,$output,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}

				


				$_SESSION['indicatorType']='';
				$_SESSION['output']='';
				$_SESSION['program']='';
				$_SESSION['project']='';
				$_SESSION['indicator']='';
				$_SESSION['MappingType']=$typeoftarget;
				$_SESSION['program']=$program;
				$_SESSION['project']=$project;
				$_SESSION['subprogram']=$subprogram;
				$_SESSION['output']=$output;
				$_SESSION['indicator']=$indicator;
				$_SESSION['indicatorType']=$indicatorType;
				$indicator_Type=array('Results Based','Sub Activity Based','DCED Based','aBi Trust');
					
 				$level1=array('Primary','Formula','ABI High Level','Variable');
$data.="<form id='indicator_allDefinition' name='indicator_allDefinition' action='".$PHP_SELF."' method='post' ><fieldset class='evenrow'><table  width='100%' border='0' cellspacing='1' >".filter_VariableindicatorDefinition()."
<tr class='evenrow'>
     
    <td colspan='5'> <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <iNput type='button' class='formButton2' TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition(xajax.getFormValues('indicator_allDefinition'));return false;\" value='Edit' /> | <input type='button' class='formButtonRed' TITLE='Delete' value='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('indicator_allDefinition'),'Delete_IndicatorDefinition','');return false;\"   /></td>
 
   <td colspan=3>";
   //display pages
   
   
   
   $data.="</td>

  </tr>
  <tr class='evenrow2'>
    <tD colspan='9' scope='cols' align=center class='dataRow'><B>VARIABLE INDICATOR DEFINITION DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2' class='dataRow'>
  <td CLASS='black2' colspan='2' rowspan='1' width='10' class='dataRow'>SELECT</td>
  <td CLASS='black2' colspan='2' rowspan='1' width='10' class='dataRow'>Variable</td>
  
   <td CLASS='black2' class='dataRow' width='500' rowspan='1'  colspan='2'>PRIMARY INDICATOR</td>

   
   
   <td ><strong>FORMULA (E.G: C=(A/B)*100)</strong></td>
    <td colspan='2' align='right'><strong>ACTION</strong></td>
  </tr>";
  

				#and variable='".$typeoftarget."'
				$query_string="select i.indicator_type,Formular,i.letter_variable,i .indicator_id,i.indicator_code,
					d.display,d.DefName,d.defn_id,i.indicator_name,i.mapping_type
				 	from tbl_indicator i join `tbl_indicator_definition` d on(d.indicator_id=i.indicator_id) 
				 	where i.indicator_type like '".$_SESSION['indicatorType']."%'
				 	and i.indicator_id like '".$_SESSION['indicator']."%'
					and d.mapping_type like '".LookupData($code=1,$returnValue1=4)."%'
					group by i.indicator_id 
				 	order by i.indicator_name asc";
					#$obj->alert($query_string);  
			$query=@Execute($query_string)or die(http("VP-4939"));

			$max_records = @mysql_num_rows($query);
			$num_pages=ceil($max_records/$records_per_page);
			$offset = ($cur_page-1)*$records_per_page;
			$inc=$offset+1;
		$new_query=Execute($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
  /* */  #$obj->alert($select);
 
 //if(mysql_num_rows($new_query)>0){ 
   while($row=@mysql_fetch_array($query)){
  $color=($n%2==1)?"evenrowBorder":"white1";
 $div1="Formula".$row['indicator_id'];
$events2="onmouseup=\"this.style.backgroundColor='#FOE5A5';\"";
 $data.="<tr class=$color ".$events2.">
  			<td class='dataRow' valign='top' colspan='4' ><input type='radio' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' />
				<input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >
				
			<strong>Variable ".$inc++."</strong>
				<strong>".$row['indicator_code']."</strong> 
					 ".retrieve_info_withSpecialCharacters($row['indicator_name'])." 
				<strong> (".$row['indicator_type'].")</strong>
<select name='letter_variable' id='letter_variable' 
onchange=\"xajax_UpdateVariableOperand(this.value,'".$row['indicator_id']."','letter_variable');return false;\" >
			<option value='' >-Variable-</option>";

		$data.=QueryManager::LookupFilter($classCode=18,$codeName=$row['letter_variable']);


$data.="</select>
   			</td>
			<td class='dataRow' width='500' valign='top' colspan='2'>";
 
 //-----------program indicator defn--------

$data.="<table width='300' id='report' cellspacing='1' border='0'>
			<TR class='evenrow'>
				<Th colspan='3'><strong>PRIMARY INDICATOR</strong>
					<IMG SRC='images/spacer3.gif' width='300' height='0'>
			</th>
			<th colspan='1'><strong>VARIABLE</strong></th>
			   <th colspan='1'><strong>OPERATOR</strong></th>
   <th colspan='1'><strong>ORDER OF OPERATORS</strong></th>
   <th colspan='1'><strong>PERCENTAGE</strong></th>	
   <th colspan='1'><strong>ACTION</strong></th>	
			</TR>";
			$sql="select * from tbl_indicator_definition d
			inner join tbl_indicator i on(i.indicator_id=d.DefName)
			where d.indicator_id='".$row['indicator_id']."'
 			order by i.indicator_code ";
			// 
		#$obj->alert($sql);#and i.mapping_type like '".$level1[1]."%'and d.prog_id like '".$_SESSION['program']."%'
		$qdfn=Execute($sql)or die(http("VP-4892"));
	while($rowdfn=@mysql_fetch_array($qdfn)){
	//$color=$n%2==1?"evenrow"
	$data.="<tr class='evenrow'>

			<td class='dataRow' valign='top'><input name='defintion_id' type='checkbox' value='".$rowdfn['defn_id']."' checked='checked' disabled='disabled'></td>
		
			<td class='dataRow' valign='top'> <strong>".$rowdfn['mapping_type']."</strong></td>
			<td class='dataRow' valign='top'><strong>(".$rowdfn['indicator_type'].")</strong> ".retrieve_info_withSpecialCharacters($rowdfn['indicator_name'])."</td>
	
			<td valign='top'>
			
			<select name='letter_variable' id='letter_variable' onchange=\"xajax_UpdateVariableOperand(this.value,'".$rowdfn['indicator_id']."','letter_variable');return false;\" >
			<option value='' >-Variable-</option>";

		$data.=QueryManager::LookupFilter($classCode=18,$codeName=$rowdfn['letter_variable']);


$data.="</select> </td>
<td valign='top'>
<select name='operator' id='operator' onchange=\"xajax_UpdateVariableOperand(this.value,'".$rowdfn['indicator_id']."','operation');return false;\" ><option value='' >-Operand-</option>";

		$data.=QueryManager::LookupFilter($classCode=15,$codeName=$row['variable']);


$data.="</select> </td>

<td><select name='operatorOrder' id='operatorOrder' onchange=\"xajax_UpdateVariableOperand(this.value,'".$rowdfn['indicator_id']."','orderofoperation');return false;\" ><option value='' >-Operator Order-</option>";

		$data.=QueryManager::LookupFilter($classCode=16,$codeName=$row['variable']);
$data.="</select>
</td>
<td> <select name='percentage' id='percentage' onchange=\"xajax_UpdateVariableOperand(this.value,'".$rowdfn['indicator_id']."','percentage');return false;\" ><option value='' >-Percentage-</option>";

		$data.=QueryManager::LookupFilter($classCode=17,$codeName=$row['variable']);


$data.="</select>
			</td>
			<td align='center'>
			<a href='#' title='Delete' onclick=\"xajax_delete_IndicatorDefinition('".$rowdfn['defn_id']."');\">
			<img src='icons/trash.png' width='20' height='25' value='Delete' title='Delete'  /></a>
			</td>
		</tr>";
  
 } 


//end of programmedefn----

$data.=noRecordsFound($qdfn,$colspan=7)."</TABLE></td><td align='left'><div id='".$div1."'><strong><font color='blue' >".$row['Formular']."</font></strong></div></td>

<td><input name='manage' type='button' value='Edit Formular' onclick=\"xajax_SpecifyFormular('".$row['Formular']."','".$row['indicator_id']."','".$div1."');return false;\" /></td>

<td><input type='button' class='formButton2' TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition('".$row['indicator_id']."','".$level1[3]."');return false;\" value='Edit' /> </td>
</tr>";

//--------end of coorporate
  $n++;
 } 
$data.=noRecordsFound($query,7)."<tr class='evenrow'>
  				<td colspan=9> <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |  <iNput type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition(xajax.getFormValues('indicator_allDefinition'));return false;\" value='Edit' /> | <input type='button' class='formButtonRed' TITLE='Delete' value='Delete'   onclick=\"ConfirmDelete(xajax.getFormValues('indicator_allDefinition'),'Delete_IndicatorDefinition','');return false;\"  /><div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";

	if($cur_page==1) $data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."','".$_SESSION['indicator']."','".$_SESSION['output']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*1<=$max_records){
		$selected=$i*1==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*1)."\" ".$selected.">".($i*1)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>"; 
$data.="</div></td></tr></table></fieldset></form>"; 
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
#****************************************************

$xajax->processRequest();

  ?>



<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
 <style type="text/css">  
    .myClass  
    {  
    font-family:verdana;  
    font-size:11px;  
    }  
    </style>  
<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery.min.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
</head>

<body>
<table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#F0F0F0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
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
        <form action='exporttoexcel.php' method='post' enctype='application/x-www-form-urlencoded' name='exporttoexcel' target='_parent'     onsubmit='$("#datatodisplay").val( $("<div>").append( $("#ReportTable").eq(0).clone() ).html() )'>
        <table cellspacing='0'    id='ReportTable'   width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
	<fieldest class='evenrowBorder'><legend></legend>
	<div id="title">
      <?php title($_GET['linkvar'],$_GET['action']); ?>
    </div>
	 <div id='bodyDisplay'> <script language='javascript' type='text/javascript'> 
	 
		  <?php
		  switch($_GET['linkvar']){
		  case "Super Goal": 
		  ?>
		  xajax_view_supergoal('','','','','','');
		<?php
		 break;
		  case "Goal": 
		  ?>
		  xajax_view_goal('','','','','','');
		<?php
		 break;
		  case "Purpose": 
		  ?>
		  xajax_view_purpose('','','','','','');
	<?php
		 break;
		 case "Program": 
		  ?>
		  xajax_view_programme('','','','');

		<?php
		
	break;
	
case"Sub-Program": 
		  ?>
		 xajax_view_subcomponent('','');
 //xajax_view_subprogram('','','','');
		<?php
		break; 
		case "Output": 
		  ?>
		 xajax_view_output('','','','',1,20);
//xajax_view_Indicator('','','','','',1,20);
		<?php
		break;
		 case "View Indicator": 
	?>

		xajax_view_indicator('','','','','',1,20);
		
		<?php
		break;
		case "Indicator Definition":  
	?>
		xajax_view_indicatorDefinition('ABI High Level','','','','','',1,20);
		
		<?php
		break;
		case "Variable Definition":  
	?>
		xajax_view_VariableindicatorDefinition('Variable','','','','','',1,20);
		
		<?php
		break;
		
		case "ASARECA Results Framework": 
			?>
		//xajax_view_indicatorDefinition('','','','','',1,20);
		xajax_view_all('');
		<?php
		break;
	
	case "Dashboard Indicators": 
	?>
	//xajax_view_indicatorDefinition('','','','','',1,20);
	xajax_dashboardIndicators('');
		<?php
		break;
		 default:
		  noResultsFound();
		 ?>
		//xajax_view_indicator('','','','',1,20);
		 
		 <?php
		 }
		  
			?>
		  </script>
    </div></fieldest></td>
          </tr>
        </table></form
        ></td>
      </tr>
    </table>
    </td>
    <td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td height="38" bgcolor="#F0F0F0">&nbsp;</td>
    <td height="38"><?php require_once('connections/footer.php');
	 ?></td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

