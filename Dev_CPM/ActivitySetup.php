<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************


#xajax register function


//----------mer layout-----------------------
$xajax->register(XAJAX_FUNCTION,'view_supergoal');
$xajax->register(XAJAX_FUNCTION,'new_supergoal');
$xajax->register(XAJAX_FUNCTION,'save_supergoal');
$xajax->register(XAJAX_FUNCTION,'edit_supergoal');
$xajax->register(XAJAX_FUNCTION,'update_supergoal');
$xajax->register(XAJAX_FUNCTION,'delete_data');

//-----------program info----------

$xajax->register(XAJAX_FUNCTION,'view_programme_supergoal');

//---------------------------------
$xajax->register(XAJAX_FUNCTION,'view_goal');
$xajax->register(XAJAX_FUNCTION,'new_goal');
$xajax->register(XAJAX_FUNCTION,'save_goal');

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
$xajax->register(XAJAX_FUNCTION,'viewall_programs');
$xajax->register(XAJAX_FUNCTION,'viewall_subprograms');
$xajax->register(XAJAX_FUNCTION,'viewall_projects');
$xajax->register(XAJAX_FUNCTION,'viewall_indicator');
$xajax->register(XAJAX_FUNCTION,'viewall_indicatorDefintion');
//$xajax->register(XAJAX_FUNCTION,'view_programLogframe');


#programme
$xajax->register(XAJAX_FUNCTION,'add_programme');
$xajax->register(XAJAX_FUNCTION,'save_programme');
$xajax->register(XAJAX_FUNCTION,'programme_details');
$xajax->register(XAJAX_FUNCTION,'edit_programme');
$xajax->register(XAJAX_FUNCTION,'update_programme');
$xajax->register(XAJAX_FUNCTION,'updateProgramme2');
$xajax->register(XAJAX_FUNCTION,'deleteprogramme2');
$xajax->register(XAJAX_FUNCTION,'delete_programme');

#component----Purpose----------------
$xajax->register(XAJAX_FUNCTION,'view_purpose');
$xajax->register(XAJAX_FUNCTION,'edit_purpose');
$xajax->register(XAJAX_FUNCTION,'update_purpose');
//------------------------------------------------
$xajax->register(XAJAX_FUNCTION,'search_component');
$xajax->register(XAJAX_FUNCTION,'component_details');
$xajax->register(XAJAX_FUNCTION,'new_purpose');
$xajax->register(XAJAX_FUNCTION,'save_purpose');
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
$xajax->register(XAJAX_FUNCTION,'delete_indicator');
$xajax->register(XAJAX_FUNCTION,'deleteIndicator');
$xajax->register(XAJAX_FUNCTION,'edit_indicator');
$xajax->register(XAJAX_FUNCTION,'update_indicator');
//-indicator defn----------------------------------------
$xajax->register(XAJAX_FUNCTION,'view_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'save_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'update_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'new_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'edit_indicatorDefinition');
$xajax->register(XAJAX_FUNCTION,'delete_indicatorDefinition');
#********************************************
$xajax->register(XAJAX_FUNCTION,'edit_goal');
$xajax->register(XAJAX_FUNCTION,'update_goal');

require_once('ActivitySave.php');
require_once('ActivityFilters.php');
require_once('ActivityEdit.php');
require_once('ActivityDelete.php');

//--------------undo view------------------------
function undo_view($div){
$obj=new xajaxResponse();
$obj->assign($div,'style.display',"none");
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
//
$data="<form name='programme' id='programme'><div id='records'><table cellspacing='0' id='report'   width='660' border='0' >
".filter_programme().selectandDelete_all(6,'edit_programmeAll','programme','prog_id','tbl_programme')."
<tr class='evenrow'>

    
   <th class='black2' COlspan=6><div align='center'>PROGRAM DETAILS</div></th>
  </tr>
  <tr class='evenrow'>
    <th class='black2' colspan=2>SELECT</th>
    <th class='black2'>PROGRAM</th>
    <th class='black2'>FUNDER</th>
	<th class='black2'>IMPLEMENTING ORGANIZATION</th>
    <th class='black2' ><div align='right'>ACtion</div></th>
  </tr>
  ";
   $inc=1;$n=1;
   $q="select * from tbl_programme p
   		left join tbl_funder f on(p.Funder=f.funder_id)
		LEFT JOIN tbl_organization o on(o.org_code=p.imp_org)
     	WHERE lower(p.program_name) like '".strtolower($_SESSION['programme'])."%'
	 	&& lower(Funder) like '".strtolower($_SESSION['funder'])."%'
	  	order by p.program_name asc";
   //$obj->alert($q);
   $query=mysql_query($q)or die(http("VP-205"));
  $n=1;
  $_SESSION['prog2_id']="";
  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  $div="status".$row['prog_id'];
	  $_SESSION['prog2_id']=$row['prog_id'];
	  $x= "+"; $y= "-";
	 $add=($_SESSION['prog2_id']==$row['prog_id'])?$x:$y; 
	 $events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";
  $data.="<tr class='$color' ".$events2.">
    <td><input type='checkbox' name='prog_id[]' id='prog_id' value='".$row['prog_id']."' >".$n++."</td><td><a href='#view_all' >".$add."</a></td>
    <td>".$row['program_name']."</td>
    <td>".$row['funder_name']."</td>
	<td>".$row['orgName']."</td>
    <td align='right'><input name='button' type='button' class='formButton2'   id='button'  id='button' value='Details' onclick=\"xajax_programme_details('".$row['prog_id']."','".$div."');return false;\" /></td>
  
  </tr>
  <tr><td colspan=5><div id='$div'></div></td></tr>";
    $inc++;
    }
	//select and Delete
	//selectandDelete_all($colspan,$function_name,$form_name,$delete_link,$unique_column,$column_namevalue,$table_name)
	//$data.=selectandDelete_all(6,'edit_programmeAll','programme','prog_id','tbl_programme')."
	
	
$data.=selectandDelete_all(6,'edit_programmeAll','programme','prog_id','tbl_programme')."</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function programme_details($prog_id,$div){
$obj=new xajaxResponse();
$_SESSION['prog_id']=$prog_id;

$query=@mysql_query("select * from tbl_programme p
   		left join tbl_funder f on(p.Funder=f.funder_id)
		LEFT JOIN tbl_organization o on(o.org_code=p.imp_org)
 where prog_id='".$prog_id."' order by program_name asc")or die(http("VP-0243"));
while($row=mysql_fetch_array($query)){
//$_SESSION['prog_id']=$row['prog_id'];

$data.="<table cellspacing='0' width='100%' border='0' >
  <tr >
    <td width='20%'><b>Program:</b></td>
    <td width='' colspan=''>$row[program_name]</td>

  </tr>
  <tr>
    <td><b>Funder:</b></td>
    <td colspan=>$row[funder_name]</td>
    
  </tr>
  <tr>
    <td><b>Implementing Organization:</b></td>
    <td colspan=>$row[orgName]</td>
    
  </tr>
  <tr>
    <td><b>Details</b></td>
    <td colspan=>$row[details]</td>

  </tr>
  <tr>
    <td></td>
    <td colspan=><input type='button' class='formButton2'   id='button'  id='button' onclick=\"xajax_view_programme('','','')\" value='Back'> | <input type='button' class='formButton2'   id='button'  id='button' onclick=\"print()\" value='Print'>  </td>
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
$data="<table cellspacing='0' style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'   width='800' border='1'>
<tr><td colspan=3 ALIGN='CENTER'><strong>RESULTS FRAMEWORK</strong></td><td><a href='export_to_excel_word.php?linkvar=Export LogicalFramework&&format=excel'><input name='export' class='button_width' type='button' class='formButton2'  id='button' value='Export to Excel'></a></td></tr>";

  $query1=mysql_query("select * from tbl_programme  order by prog_id asc")or die(mysql_error());
  
  $n=1;$inc=1;
  while($row1=mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	  $divindicatorspgoal="Impact Indicator".$row1['component_code'].$row1['id'];
	   $divgoal="Super Goal".$row1['id'];

#$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'   id='button'  id='button' value='Impact Indicators' class='button_width' onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicatorspgoal."','supergoal_id','".$row1['id']."','Program');return false;\"></td>";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
<td colspan=''  width='100' ><strong>".ucfirst($row1['program_code '])."</strong></td>
	 <td colspan='2' ><center><strong>".strtoupper($row1['program_name'])."</strong></center></td>".$indicator."</tr>
	 <tr class=''  style='background-color:#ffffff;'>
<td colspan='4' ><div id='".$divindicatorspgoal."'></div></td></tr>


";
  $inc++;
 }
  //view all goals
  
  //supergoal_id='".$row1['id']."' and 
  $queryg=mysql_query("select * from tbl_goal where type like '%'  order by supergoal_id asc")or die(http("VP-283"));
  
  $n=1;$inc=1;
  while($rowg=mysql_fetch_array($queryg)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicatorgoal="Impact Indicator".$rowg['component_code'].$rowg['id'];
	   $divpurpose="Purpose".$rowg['id'];
//$indicator="<td colspan='3' ><input name='indicators' type='button' class='formButton2'   id='button'  id='button' value='Impact Indicators' class='button_width'  ondbclick=\"xajax_undo_view('".$divindicatorgoal."');return false;\" onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicatorgoal."','goal_id','".$rowg['id']."','Program');return false;\" /></td>";
$data.="<tr class='evenrow3' style='background-color:#ffffff;'  >
<td colspan='' ><strong>".ucfirst($rowg['component_code'])."</strong></td>
	 <td colspan='2' >".ucfirst($rowg['component'])."</td>".$indicator."</tr>
	 <tr class=''>
<td colspan='4' ><div id='".$divindicatorgoal."'></div></td></tr>";

  $inc++;
  }
  
  //goal_id='".$rowg['goal_id']."' and
  $queryp=mysql_query("select * from tbl_purpose where  type like '%' order by id asc")or die(mysql_error());
  
  $n=1;$inc=1;
  while($rowp=mysql_fetch_array($queryp)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicatorpurpose="Outcome Indicator".$rowp['component_code'].$rowp['id'];
	   $divoutput="Purpose".$row1['id'];
//$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'   id='button'  id='button' value='Outcome Indicators' class='button_width' onclick=\"xajax_viewall_indicator('Outcome Indicator','".$divindicatorpurpose."','purpose_id','".$rowp['id']."','Program');return false;\" /></td>";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
<td colspan='' ><strong>".ucfirst($rowp['component_code'])."</strong></td>
	 <td colspan='2' >".ucfirst($rowp['component'])."</td>".$indicator."</tr>
	 <tr class=''>
<td colspan='4'  style='background-color:#ffffff;' ><div id='".$divindicatorpurpose."'></div></td></tr>
 <tr class=''>";
  $inc++;
  }
  
  $query=mysql_query("select * from tbl_subcomponent  order by subcomponent_code asc")or die(http(0305));
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomp_id']=$row['subcomponent_id'];
  
  $divoutput="Subcomponent".$row['subcomponent_id'];
    $divindicator="Outcome Indicator".$row['subcomponent_id'];
	$color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='evenrow3'  style='background-color:#ffffff;'>
  <td><strong>IR:  $row[subcomponent_code]</strong></td>
   
    <td colspan='2'><a href='#output_details' class='black' ondbclick=\"xajax_undo_view('".$divoutput."');return false;\" onclick=\"xajax_viewall_output('".$divoutput."','".$row['subcomponent_id']."');return false;\"><strong>&nbsp;&nbsp;&nbsp;$row[subcomponent]</strong><a></td>
	
	<td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Outcome Indicators' class='button_width'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\"  onclick=\"xajax_viewall_indicator('Outcome Indicator','".$divindicator."','subcomponent_id','".$row['subcomponent_id']."','Program');return false;\" ></td>
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
 
  

$data.="</table>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function viewall_goal($div,$supergoal_id){
$obj=new xajaxResponse();
$divindicator1="Impact Indicator";
$data="<table cellspacing='0'  style='tr:hover background-color:#ffffff;' width='800' border='0'>";

  $query1=mysql_query("select * from tbl_goal where supergoal_id='".$supergoal_id."' and type like '%'  order by supergoal_id asc")or die(http("VP-283"));
  
  $n=1;$inc=1;
  while($row1=mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicator="Impact Indicator".$row1['component_code'].$row1['id'];
	   $divpurpose="Purpose".$row1['id'];
$indicator="<td colspan='3' ><input name='indicators' type='button' class='formButton2'   id='button'  id='button' value='Impact Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\" onclick=\"xajax_viewall_indicator('Impact Indicator','".$divindicator."','goal_id','".$row1['id']."');return false;\" /></td>";
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

  $query1=mysql_query("select * from tbl_purpose where goal_id='".$goal_id."' and type like '%' order by id asc")or die(mysql_error());
  
  $n=1;$inc=1;
  while($row1=mysql_fetch_array($query1)){
  	  $color=$inc%2==1?"#e6e6e6":"#ffffff";
	 $divindicator="Outcome Indicator".$row1['component_code'].$row1['id'];
	   $divoutput="Purpose".$row1['id'];
$indicator="<td colspan='2' ><input name='indicators' type='button' class='formButton2'   id='button'  id='button' value='Outcome Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\" onclick=\"xajax_viewall_indicator('Outcome Indicator','".$divindicator."','component_id','".$row1['id']."');return false;\" /></td>";
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
  $query=mysql_query("select * from tbl_output where subprog_id='".$component_id."' order by output_code asc")or die(http(0305));
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomp_id']=$row['id'];
  //<td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Output Indicators'  ondbclick=\"xajax_undo_view('".$divindicator."');return false;\"  onclick=\"xajax_viewall_indicator('Output Indicator','".$divindicator."','output_id','".$row['output_id']."');return false;\" ></td>
  $divoutput="output".$row['output_id'];
    $divindicator="Output Indicator".$row['output_id'];
	$color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='evenrow3'>
  <td><strong>Output: $row[output_code]</strong></td>
   
    <td colspan='2'><a href='#output_details' class='black' ondbclick=\"xajax_undo_view('".$divoutput."');return false;\" onclick=\"xajax_viewall_indicator('Output Indicator','".$divindicator."','output_id','".$row['output_id']."','Program');return false;\"  ><strong>&nbsp;&nbsp;&nbsp;$row[output_name]</strong><a></td>
	
	
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





function viewall_programs(){
$obj=new xajaxResponse();
//$p=2;CONSERVATION AGRICULTURE REGIONAL PROGRAMME
$dd="program";
$data=" <table cellspacing='0'  border='1' style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'    width='600'>
<tr><td colspan=4> <center>RESULTS FRAMEWORK.</center></td></tr>";
if($output_id==2){
$select="select * from tbl_programme where prog_id > 1  order by prog_id asc";
}else 
$select="select * from tbl_programme  order by prog_id asc";
$query=mysql_query($select)or die(http(348));
//$obj->alert($select);
$p=10;
while($row=mysql_fetch_array($query)){
$divoutput="Program_".$row['prog_id'].$output_id;
$divactivity="Subprogram".$row['prog_id'].$output_id;

$data.="<tr>
<td>Program:</td>
    <td class=''><input type='hidden' value='".$row['program_code']."'><strong>".$row['program_code']."</strong></td>
    <td><a href='#Program_details' onclick=\"xajax_viewall_subprograms('".$row['program_code']."','".$output_id."','".$divactivity."');return false;\"><strong>".$row['program_name']."</strong></a></td>

 <td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Program Logical Framework' onclick=\"xajax_view_programLogframe('prog_id',".$row['prog_id'].",'Program','".$divoutput."');return false;\" ></td>
  </tr>
 
  <tr>
    <td></td><td class='' colspan='2'><div id='".$divoutput."'></div></td>
    
  </tr> <tr>
    <td colspan='4' ><div id='".$divactivity."' ></div></td></td>
    
  </tr>";
  //$p++;
  }
  
  $data.="</table>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


#********************
//Project Logical Framework
function view_programLogframe($programorProject_ID,$programorProject_IDValue,$type,$div){
$obj=new xajaxResponse();
$data.="<table width='700'  style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'  >
<tr class='evenrow'>
    
 
    <td colspan=3 align='center'><strong>".ucfirst($type)." Logical Framework</strong></td>
  </tr>
  <tr class='evenrow'>
    <td colspan=2><strong>Objective Statement</strong></td>
 
    <td><strong>Verifiable Indicator</strong></td>
  </tr>
  ";
  $querysp=mysql_query("select * FROM tbl_supergoal ")or die(http("VP-575"));
  while($row=mysql_fetch_array($querysp)){
  $data.="<tr>
    <td>".$type." Super Goal</td>
    <td><input type='hidden' name='supergoal' value='".$row['id']."'>".$row['component']."</td>
    <td>";$data.="<table>";
	$sqlsp="select * from tbl_indicator where indicator_type like 'Impact Indicator%' and level_ofindicator like '".$type."%' and supergoal_id='".$row['id']."' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' ";
	
	$query_indicatorsp=mysql_query($sqlsp)or die(http("VP-617"));
	  if(mysql_num_rows($query_indicatorsp)>0){
	while($rowIn=mysql_fetch_array($query_indicatorsp)){
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td><td class='dataRow'>".$rowIn['indicator_name']."</td></tr>";
	}
	
	}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'   id='button'  id='button' value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	
	
	
	$data.="</table></td>
  </tr>";
  }
  $sqlg="select * FROM tbl_goal  where type like '".$type."%' and   ".$programorProject_ID."  ='".$programorProject_IDValue."'  ";
  $queryg=mysql_query($sqlg)or die(http("VP-588"));

  while($rowg=mysql_fetch_array($queryg)){
  $data.="<tr>
    <td>".$type." Goal</td>
    <td><input type='hidden' name='supergoal' value='".$rowg['id']."'>".$rowg['component']."</td>
    <td>";
	$data.="<table>";
	$query_indicatorg=mysql_query("select * from tbl_indicator where indicator_type like 'Impact Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ")or die(http("VP-617"));
	  //$obj->alert("select * from tbl_indicator where indicator_type like 'Impact Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ");
	  if(mysql_num_rows($query_indicatorg)>0){
	while($rowIn=mysql_fetch_array($query_indicatorg)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td><td class='dataRow'>".$rowIn['indicator_name']."</td></tr>";

	}
	}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'   id='button'  id='button' value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
  </tr>";
  }
    $queryg=mysql_query("select * FROM tbl_purpose  where  type like '".$type."%' and   ".$programorProject_ID."  ='".$programorProject_IDValue."'  ")or die(http("VP-602"));
  while($rowg=mysql_fetch_array($queryg)){
  $data.="<tr>
    <td>".$type." Purpose</td>
    <td>".$rowg['component']."</td>
    <td>";
	$data.="<table>";
	$query_indicatorp=mysql_query("select * from tbl_indicator where indicator_type like 'Outcome Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."'  ")or die(http("VP-617"));
	  //$obj->alert("select * from tbl_indicator where indicator_type like 'Impact Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and goal_id='".$rowg['id']."' ");
	  if(mysql_num_rows($query_indicatorp)>0){
	while($rowIn=mysql_fetch_array($query_indicatorp)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td><td class='dataRow'>".$rowIn['indicator_name']."</td></tr>";

	}
	}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'   id='button'  id='button' value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
  </tr>";
  }
  
  //output================
   $queryt=mysql_query("select * from tbl_output where type like '".$type."' and   ".$programorProject_ID."   ='".$programorProject_IDValue."'  ")or die(http("VP-502"));
 //$obj->alert("select * from tbl_output where type like '".$type."' and   ".$programorProject_ID."   ='".$programorProject_IDValue."'  ");
  while($rowt=mysql_fetch_array($queryt)){
  $data.="<tr>
    <td>".$type." Output</td>
    <td><input type='hidden' value='".$rowt['output_id']."' name='output_id' id='output_id'>".$rowt['output_code']." ".$rowt['output_name']."</td>
    <td>";
	$data.="<table>";
	//$obj->alert("select * from tbl_indicator where indicator_type like 'Output Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and output_id='".$rowt['output_id']."' ");
	$query_indicator=mysql_query("select * from tbl_indicator where indicator_type like 'Output Indicator%' and level_ofindicator like '".$type."%' and  ".$programorProject_ID."  ='".$programorProject_IDValue."' and output_id='".$rowt['output_id']."' order by indicator_code asc ")or die(http("VP-501"));
	if(mysql_num_rows($query_indicator)>0){
	while($rowIn=mysql_fetch_array($query_indicator)){
	
	$data.="<tr class='evenrow3'><td class='dataRow'><input type='checkbox' name='' checked='checked' disabled='disabled' id='' value='".$row['indicator_id']."'></td>
	<td  class='dataRow'>".$rowIn['indicator_code']."</td><td class='dataRow'>".$rowIn['indicator_name']."</td></tr>";

	}}
	else{

	$data.="".noResultsFound()."<tr><td><div style='float:right'><input name='indicator' type='button' class='formButton2'   id='button'  id='button' value='Add Indicator' onclick=\"xajax_add_indicator('".$type."','','','','','','','','');\"></div></td></tr>";
	}
	$data.="</table></td>
  </tr>";
  
  	}
$data.="</table>";
$obj->assign($div,'innerHTML',$data);
return $obj;
}



function viewall_subprograms($prog_id,$output_id,$divoutput){
$obj=new xajaxResponse();
//$p=5;
$ddd="project";
$n=1;
$data="<table cellspacing='0'   style='tr:hover background-color:#ffffff; border-color:#333333;' id='report2'    width='600'>";

$select="select * from tbl_subcomponent where prog_id='".$prog_id."' order by subcomponent_code asc";
//$obj->alert($select);
$query=mysql_query($select)or die(http("VP-0379"));

$p=11;$x=1000;
while($row=mysql_fetch_array($query)){
$divactivity="Project Indicator".$row['subprogram_code'].$prog_id.$n;
$divprojects="Projects_".$row['subprogram_code'].$prog_id.$output_id.$x;
//$obj->alert($divprojects);
$data.="<tr>
<td>Sub-Program/Commodities:</td>
    <td class=''>".$row['subcomponent_code']." </td>
    <td><a href='#Commodity_details' onclick=\"xajax_viewall_projects('".$row['subcomponent_id']."','".$divprojects."');return false;\"> ".$row['subcomponent']."</td>";
	if($output_id==1){
	 $data.="<td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Secretariat Indicator' onclick=\"xajax_viewall_indicator('Secretariat Indicator','".$divactivity."','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td>";}
	 else 
	 $data.="<td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Program Indicator' onclick=\"xajax_viewall_indicator('Program Indicator','".$divactivity."','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td>";
 
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
  
   /* <td class=''><input type='button' class='formButton2'   id='button'  id='button' value='Activity Indicator' onclick=\"xajax_viewall_indicator('Activity Indicator','Activity Indicator','subcomponent_id','".$row['subcomponent_id']."');return false;\" ></td> */
 
 $n++;
 $p++;
 $x--;}
  
  $data.="</table>";

$obj->assign($divoutput,'innerHTML',$data);
return $obj;
} 
#**********************************************
//******************************************88888888888888888888


#********************************************
function viewall_indicator($indicator_type,$divindicator,$column_name,$column_value,$level){
$obj=new xajaxResponse();
//$p=13;
//$d="indicator".$p; 
$data=" <table cellspacing='0' width='600'><tr class='white1'><td COLSPAN=2><strong>".$indicator_type."(s)</strong></td></tr>";
$select="select * from tbl_indicator where  indicator_type like '".$indicator_type."%' and ".$column_name." like '".$column_value."%' and level_ofindicator like '".$level."%'  order by indicator_code,indicator_id asc";
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
<td COLSPAN=3>Indicator Defintion </td></tr>
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
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table cellspacing='0'   id='report'   width='100%' border='0'>
        
		<tr>
          <td colspan='4' class='black'><div id='status'></div></td>
        </tr>
        <tr>
          <td colspan='3'>
            <table cellspacing='0'      border='0'>
              <tr>
                <td>Program:</td>
                <td><input name='pname' type='text' id='pname' value='' size='80' /></td>
              </tr>
			  <tr>
                <td>Program Code:</td>
                <td><input name='pcode' type='text' id='pcode' value='' size='80' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><select name='pfunder'   id='pfunder' class='combobox'>".funct_dropDown('tbl_funder', 'funder_name', 'funder_id', 'funder_id')."</select></td>
              </tr>
			   <tr>
                <td>Implementing Organization:</td>
                <td><select name='organization'   id='organization' class='combobox'>".funct_dropDown('tbl_organization', 'orgName', 'org_code', 'org_code')."</select></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='80' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' class='formButton2'   id='button' name='button' id='button' value='Save' onclick=\"xajax_save_programme(xajax.getFormValues('programme'));\"></td>
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
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_code']."  ".$rowP['program_name']."</option>";
					
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
					$data.="<option value=\"".$row['prog_id']."\" ".$selecd." >".$row['program_code']."  ".$row['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>Sub-Program:</td>
                <td><select name='subprogram' id='subprogram' class='combobox2' onchange=\"xajax_new_supergoal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."','".$_SESSION['programme']."',this.value);return false;\"><option value=''>-select-</option>";
					  $querysc=mysql_query("select * from tbl_subcomponent where output_id='".$_SESSION['output_id']."' and prog_id='".$_SESSION['programme']."' order by subcomponent_code asc")or die(mysql_error());
					while($rowsc=mysql_fetch_array($querysc)){
					$selecdsc=($row['subcomponent_id']==$_SESSION['subprogram_code'])?"selected":"";
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project' class='combobox2'><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_project where subprogram_code='".$_SESSION['subprogram_code']."' order by project_code,title asc")or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['project_id']."'>".$row['project_code']."  ".$row['title']."</option>";
					
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
                <td align=right><input type='button' class='formButton2'   id='button'  id='button' name='button' id='button' class='' value='Save' onclick=\"xajax_save_supergoal(xajax.getFormValues('programme'),'".$supergoal_type."');\"></td>
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
$data="<form name='component' id='component' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='0'  width='700' border='0'>".filter_supergoal()."
 
 <tr class='evenrow'>  
    <td colspan='8'><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_xajax_edit_supergoal(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' class='formButton2'   id='button'  id='button' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('programme'));return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>
	 <tr >  

	 
    <th colspan='10' class='dataRow'><div style='float:center;'>SUPER GOAL DETAILS</div></th>
	
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No<img src='images/spacer3.gif' width='50' ></th>
	 <th colspan='2' class='dataRow' >CODE<img src='images/spacer3.gif' width='100' ></th>
	 <th class='dataRow'>SUPER GOAL</th>
	 <th class='dataRow'>TYPE</th>
	 <th class='dataRow'>Program</th>
	 <th class='dataRow'>Sub-Program</th>
	 <th class='dataRow'>Project</th>
	 <th class='dataRow'>REMARKS</th>
	 </tr>
";
  $inc=1;
  
  $sql="select s.id,s.component,s.component_code,s.type,pr.id as project_id,pr.title,s.description,sc.`subcomponent_id`,sc.subcomponent,p.prog_id,p.program_name
   from tbl_supergoal s
  left join tbl_programme p  on(s.prog_id=p.prog_id)
left join tbl_subcomponent sc  on(s.subprog_id=sc.subcomponent_id)
  left join tbl_project pr on(s.project_id=pr.id)
  
   where  s.component like '".$_SESSION['supergoal']."%'
   
   and s.type like '".$_SESSION['supergoal_type']."%'

    order by s.id asc";
//$obj->alert($sql);
/* and p.program_name like '".$_SESSION['programme']."%'
    and sc.subcomponent like '".$_SESSION['subprogram']."%'
   and pr.title like '".$_SESSION['project']."%' */
  $query=mysql_query($sql)or die(http("VP-1010"));
  
  $n=1;
  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $program_name=($row['program_name']==NULL)?"N/A":$row['program_name'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	  $description=($row['description']=='')?"<font color='orange' ><i>Not Specified</i></font>":$row['description'];
	  $div="goal_1";
  $data.="<tr class='$color'>
<td colspan=2><input type='checkbox' name='id[]' id='id' value='".$row['id']."' >".$inc."</td>
  
	 <td colspan=''>".$row['component_code']."</td>
	 
    <td>".$row['component']."</td>
	<td>".$row['type']."</td>
	<td>".$program_name."</td>
	<td>".$subcomponent."</td>
	<td>".$project."</td>
	<td>".$description."</td>
</tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>  
    <td colspan=8><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_supergoal(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' class='formButton2'   id='button'  id='button' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('programme'));return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>";

$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function view_goal($output,$programme,$subprogramme,$project,$type,$component){
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
$data="<form name='component' id='component' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='1'  width='100%' border='0'>".filter_goal()."
 
 <tr class='evenrow'>  
    <td colspan='8'><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_xajax_edit_goal(xajax.getFormValues('component'));return false;\"  value='Edit' />| <input type='button' class='formButton2'  class='formButtonRed' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component'),'id','tbl_goal');return false;\" value='Delete' /></td>
	 <td></td></tr>
	 <tr >  

	 
    <th colspan='10' class='dataRow'><center>GOAL DETAILS</center></th>
	
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No</th>

	<th class='dataRow'  colspan='' >code</th>
 <th class='dataRow'  colspan='4' >GOAL</th>
	 <th class='dataRow' colspan='2'>Program</th>

	 <th class='dataRow'>REMARKS</th>
	 </tr>
";
  $inc=1;
  
  $sql="select s.id,s.display,s.type,s.component,s.component_code,s.description,p.prog_id,p.program_code,p.program_name
   from tbl_goal s
  left join tbl_programme p  on(s.prog_id=p.prog_id)

  where  s.component like '".$_SESSION['supergoal']."%'
   and s.type like '".$_SESSION['supergoal_type']."%'
   and s.display like 'Yes%'
	 order by s.id asc";
//$obj->alert($sql);
/* and p.program_name like '".$_SESSION['programme']."%'
    and sc.subcomponent like '".$_SESSION['subprogram']."%'
   and pr.title like '".$_SESSION['project']."%' */
  $query=mysql_query($sql)or die(http("VP-1101"));
  
  $n=1;
  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $program_name=($row['program_name']==NULL)?"N/A":$row['program_name'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	  $description=($row['description']=='')?"<font color='orange' ><i>Not Specified</i></font>":$row['description'];
	  $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  $div="goal_1";
	  
	  $events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";

  $data.="<tr class='$color' '".$events2."'>
<td colspan=''><input type='checkbox' name='id[]' id='id' value='".$row['id']."' >".$inc."</td>
  
	 
	 <td colspan='1'>".$row['component_code']."</td>
    <td colspan='4'>".$row['component']."</td>

	<td colspan='2'>".$row['program_code']."  ".retrieve_info_withSpecialCharacters($program_name)."</td>
	
	<td>".retrieve_info_withSpecialCharacters($description)."</td>
</tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>  
    <td colspan=8><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_goal(xajax.getFormValues('component'));return false;\"  value='Edit' />| <input type='button' class='formButton2'   class='formButtonRed' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component'),'id','tbl_goal');return false;\" value='Delete'  /></td>
	 <td></td></tr>";

$data.="</table></div></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_purpose($output,$programme,$subprogramme,$project,$type,$component){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->alert("Your Session has expired! Please login once again.");
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
$data="<form name='component' id='component' method='post' action='".$PHP_SELF."'><div id='records'>
<table cellspacing='1'  width='100%' border='0'>".filter_purpose()."
 
 <tr class='evenrow'>  
    <td colspan='8'><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_xajax_edit_purpose(xajax.getFormValues('component'));return false;\"  value='Edit' />| <input type='button' class='formButton2'  class='formButtonRed' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component'),'id','tbl_purpose');return false;\" value='Delete'  /></td>
	 <td></td></tr>
	 <tr >  

	 
    <th colspan='10' class='dataRow'><center>Purpose DETAILS</center></th>
	
	</tr>
	 <tr>  
    <th colspan='' class='dataRow'>No<img src='images/spacer2.png' width='50' ></th>
	 <th colspan='2' class='dataRow' >CODE<img src='images/spacer2.png' width='100' ></th>
	 <th class='dataRow' colspan=4>Purpose</th>

	 <th class='dataRow' >Program</th>

	 <th class='dataRow'>REMARKS</th>
	 </tr>
";
  $inc=1;
  
  $sql="select s.id,s.component,s.component_code,
  		s.type,s.description,p.prog_id,p.program_name,s.display
   		from tbl_purpose s left join tbl_programme p  on(s.prog_id=p.prog_id)
		where  s.component like '".$_SESSION['supergoal']."%' and s.display like 'Yes%'
 		order by s.id asc";

  $query=@mysql_query($sql)or die(http("Vp-1000"));
  
  $n=1;
  while($row=@mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //$_SESSION['id']=$row['id'];
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $program_name=($row['program_name']==NULL)?"N/A":$row['prog_id']." ".$row['program_name'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent_code']." ".$row['subcomponent'];
	  $description=($row['description']=='')?"<font color='orange' ><i>Not Specified</i></font>":$row['description'];
	  $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  $div="goal_1";
  $data.="<tr class='$color'>
		<td colspan=2><input type='checkbox' name='id[]' id='id' value='".$row['id']."' >".$inc."</td>
  		<td colspan=''>".$code."</td>
	     <td colspan=4>".retrieve_info_withSpecialCharacters($row['component'])."</td>
		<td>".retrieve_info_withSpecialCharacters($program_name)."</td>
		<td>".retrieve_info_withSpecialCharacters($description)."</td>
		</tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>  
    <td colspan=8><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_purpose(xajax.getFormValues('component'));return false;\"  value='Edit' />| <input type='button' class='formButton2'  class='formButtonRed' name='Delete' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('component'),'id','tbl_purpose');return false;\" value='Delete' /></td>
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
    <td>Action</td><td colspan=><input type='button' class='formButton2'   id='button'  id='button' title='Close' value='Back' onclick=\"xajax_view_component('','','');\" width='16' height='16' /> | <input type='button' class='formButton2'   id='button'  id='button' title='Close' value='Print' onclick=\"print();\" width='16' height='16' /></td>


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
      <input type='button' class='formButton2'   id='button'  id='button' name='button' id='button' value='Save' onclick=\"xajax_save_component(xajax.getFormValues('component'))\">
    </div></td>
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}







 function subcomponent_details($id,$div){
 $obj=new xajaxResponse();
 $query=mysql_query("select * 
 					from tbl_subcomponent sc left join 
					tbl_programme p on(p.prog_id=sc.prog_id)
 				 	where subcomponent_id='".$id."' ")or die(http("VP-1308"));
 while($row=mysql_fetch_array($query)){
 $data="<table cellspacing='0'  width='500' border='0'>


 
  
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
  
   <tr>
    <td class='black2'>IR:</td>
    <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>

  </tr>
 
  <tr>
    <td class='black2'>Description</td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr class=''>
    <td>Action</td><td colspan=><input type='button' class='formButton2'   id='button'  id='button' value='Back' title='Close' onclick=\"xajax_view_subcomponent('','','','');return false;\"  /> | <input type='button' class='formButton2'   id='button'  id='button' value='Print'  title='print' onclick=\"print();\"  /> </td>


  </tr>
</table>
";}
 $obj->assign($div,'innerHTML',$data);
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
                <td>Program:</td>
                <td><select name='supergoal_id' id='supergoal_id' class='combobox2' >";
					  $querytyp=mysql_query("select * from tbl_programme  order by prog_id asc")or die(http("VP-620"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					//$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['prog_id']."\" ".$seltype." >".$rowtyp['program_code']." ".$rowtyp['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>Type of Goal :</td>
                <td><select name='supergoaltype' id='supergoaltype'  disabled='disabled' class='combobox2' onchange=\"xajax_new_goal(this.value,'','',''); return false;\"><option value=''>-select-</option>";
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
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_code']."  ".$rowP['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Goal:</td>
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
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme' class='combobox2' onchange=\"xajax_new_goal('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'');return false;\"><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					$query=mysql_query("select * from tbl_programme  order by prog_id")or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					$selecd=($row['prog_id']==$_SESSION['programme'])?"selected":"";
					$data.="<option value=\"".$row['prog_id']."\" ".$selecd." >".$row['program_code']."  ".$row['program_name']."</option>";
					
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
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project' class='combobox2'><option value=''>-select-</option>";
				$sql2="select * from tbl_project where subprogram_code='".$_SESSION['subprogram']."' order by project_code,title asc";
				//$obj->alert($sql2);
					  $query=mysql_query($sql2)or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['id']."'>".$row['project_code']."  ".$row['title']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td> Goal:</td>
                <td><textarea name='supergoal' id='supergoal' cols='52' row='3' /></textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			  else {
			   $data.="<tr>
                <td> Goal:</td>
                <td><input name='supergoal' type='text'  id='supergoal' size='55' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			
             
              $data.="<tr>
                <td>&nbsp;</td>
                <td align=right><button type='button' class='formButton2'   id='button'  id='button' name='button' id='button' class='button_width' value='Save' onclick=\"xajax_save_goal(xajax.getFormValues('programme'),'".$supergoal_type."');\">Save</button></td>
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
                <td>Programme:</td>
                <td><select name='prog_id' id='prog_id' class='combobox2' >";
					  $querytyp=mysql_query("select * from tbl_programme  order by prog_id asc")or die(http("VP-620"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					//$seltype=($_SESSION['supergoal_type']==$rowtype['codeName'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['prog_id']."\" ".$seltype." >".$rowtyp['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr class=''>
                <td>Purpose  Code:</td>
                <td><input type='Text' name='code' id='code'  size='50'></td>
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
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
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
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_code']."  ".$rowP['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  <tr>
                <td>".$_SESSION['supergoal_type']."  Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2'  ><option value=''>-select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and prog_id='".$_SESSION['programme']."'  order by component asc")or die(http("VP-1600"));
			//$obj->alert("select * from tbl_goal where type='".$_SESSION['supergoal_type']."' and prog_id='".$_SESSION['programme']."'  order by component asc");
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".$rowgoal['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  ";
			   $data.="<tr>
                <td>".$_SESSION['supergoal_type']." Purpose:</td>
                <td><textarea name='supergoal' id='supergoal' cols='52' row='3' /></textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			  else if($_SESSION['supergoal_type']=='Project'){
			  $data.="
			  
			  <tr>
                <td>Output:</td>
                <td><select name='output' id='output' class='combobox2' disabled='disabled'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."',this.value,'','');return false;\"><option value=''>-N/A-</option>";
					  $queryP=mysql_query('select * from tbl_output order by output_id')or die(http("VP-635"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcoutput=($_SESSION['output_id']==$rowP['output_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['output_id']."\" ".$selcoutput." >".$rowP['output_code']."  ".$rowP['output_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr><tr>
                <td>Program:</td>
                <td><select name='cprogramme' id='cprogramme'  onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."',this.value,'','');return false;\"  class='combobox2'><option value=''>-select-</option>";
				//where output_id='".$_SESSION['output_id']."'
					  $queryP=mysql_query("select * from tbl_programme  order by prog_id")or die(http("VP-645"));
					while($rowP=mysql_fetch_array($queryP)){
					$selcprogramme=($_SESSION['programme']==$rowP['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowP['prog_id']."\" ".$selcprogramme." >".$rowP['program_code']."  ".$rowP['program_name']."</option>";
					
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
					$data.="<option value=\"".$rowsc['subcomponent_id']."\" ".$selecdsc." >".$rowsc['subcomponent_code']."  ".$rowsc['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			   $data.="<tr>
                <td>Project:</td>
                <td><select name='project' id='project'   onchange=\"xajax_new_purpose('".$_SESSION['supergoal_type']."','".$_SESSION['goal_id']."','".$_SESSION['output_id']."','".$_SESSION['programme']."','".$_SESSION['subprogram']."',this.value);return false;\" class='combobox2'><option value='' >-select-</option>";
				$sql2="select * from tbl_project where subprogram_code='".$_SESSION['subprogram']."' order by project_code,title asc";
				//$obj->alert($sql2);
				
					  $querypp=mysql_query($sql2)or die(mysql_error());
					while($rowpp=mysql_fetch_array($querypp)){
					$selecdpp=($rowpp['id']==$_SESSION['project'])?"selected":"";
					$data.="<option value=\"".$rowpp['id']."\" ".$selecdpp." >".$rowpp['project_code']."  ".$rowpp['title']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			   <tr>
                <td> ".$_SESSION['supergoal_type']." Goal:</td>
                <td><select name='goal_id' id='goal_id' class='combobox2'  ><option value=''>-Select-</option>";
					  $querygoal=mysql_query("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and  subprog_id='".$_SESSION['subprogram']."' and project_id='".$_SESSION['project']."'  order by component asc")or die(http("VP-1674"));
					  //$obj->alert("select * from tbl_goal where type like '".$_SESSION['supergoal_type']."%' and  subprogram_code='".$_SESSION['subprogram']."' and project_id='".$_SESSION['project']."'  order by component asc");
					while($rowgoal=mysql_fetch_array($querygoal)){
					$selgoal=($_SESSION['goal_id']==$rowgoal['id'])?"SELECTED":"";
					$data.="<option value=\"".$rowgoal['id']."\" ".$selgoal." >".$rowgoal['prog_id']." ".$rowgoal['component']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
			  ";
			   $data.="<tr>
                <td>".$_SESSION['supergoal_type']." Purpose:</td>
                <td><textarea name='supergoal' id='supergoal' cols='52' row='3' /></textarea></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			  else {
			   $data.="<tr>
                <td>".$_SESSION['supergoal_type']." Purpose:</td>
                <td>
				<textarea name='supergoal' id='supergoal' cols='52' rows='3'></textarea>
				</td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='52' rows='3'></textarea></td>
              </tr>";
			  }
			
             
              $data.="<tr>
               
                <td align=right colspan=2><button type='button' class='formButton2'   id='button'  id='button' name='button' id='button' class='' value='Save' onclick=\"xajax_save_purpose(xajax.getFormValues('programme'),'".$supergoal_type."');\">Save</button></td>
              </tr>
            </table></form>";
           
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}











function view_subcomponent($subcomponent,$component,$programme){
$obj=new xajaxResponse();
 $_SESSION['ssubcomponent']='';
  $_SESSION['scomponent']='';
  $_SESSION['sprogramme']='';
  $_SESSION['ssubcomponent']=$subcomponent;
  $_SESSION['scomponent']=$component;
  $_SESSION['sprogramme']=$programme;
$data="<form name='subcomp' id='subcomp' action='".$PHP_SELF."'><DIV ID='records'><table cellspacing='0'  id='report'    width='100%' border='0'>".filter_subcomponent()."


<tr CLASS='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' class='formButton2'  TITLE='Edit'  TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('subcomp'),'subcomponent_id','tbl_subcomponent');return false;\"  value='Delete' class='formButtonRed' /></td>
    
	

  </tr>

<tr class='evenrow'>
 
	
    <tH class='black2' colspan=7><div align='center'>IR</div></tH>

  </tr>
  <tr class='evenrow'>
    <tH class='black2' colspan=''>SELECT</tH>
	
    <tH class='black2' colspan='3'>IR</tH>
	<tH class='black2' colspan='2'>PROGRAM</tH>

    <tH class='black2' COLSPAN='' align='right'>ACTION</tH>
  </tr>
  
  ";
  $inc=1;
 
$select="select s.subcomponent_id,p.prog_id,s.subcomponent_code,s.subcomponent,p.program_name,s.display
from tbl_subcomponent s 
left join tbl_programme p on(s.prog_id=p.prog_id) 
where  s.subcomponent like '".$_SESSION['ssubcomponent']."%' 

&& p.program_name like '".$_SESSION['sprogramme']."%' 
and s.display like 'Yes%'
group by s.subcomponent_code 
order by s.subcomponent_code asc";
  $query=mysql_query($select)or die(http(00726));
  $n=1;
  //$obj->alert($select);
 
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomponent_id']=$row['id'];
  	  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class='$color' class='black'>
<td><input name='subcomponent_id[]' type='checkbox' value='".$row['subcomponent_id']."' />".$n++."</td><td>".$row['subcomponent_code']."</td>
    <td colspan='2'><input type='hidden' name='".$row['s.id']."'> ".$row['subcomponent']."</a></td>

	<td colspan='2'>".$row['program_name']."</td>
	
     <td align='right'><input type='button' class='formButton2'   id='button' onclick=\"xajax_subcomponent_details('".$row['subcomponent_id']."','status".$row['subcomponent_id']."');return false;\" id='button'  value='Details' /></td>
  </tr><tr><td colspan='5'><div id='status".$row['subcomponent_id']."'></div></td></tr>";
  $inc++;
  }
$data.="".noRecordsFound($query,7)."
<tr CLASS='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' class='formButton2'   TITLE='Edit'  id='button'   onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' class='formButton2'   class='formButtonRed' TITLE='Edit'  TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('subcomp'),'subcomponent_id','tbl_subcomponent');return false;\"  value='Delete'  /></td>
    
	 

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
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['sprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$row['prog_id']."\" ".$selected." >".$row['program_code']."".substr($row['program_name'],0,70)."</option>";
				
					   }
				 $data.="  </select></td>
                    </tr>
          
    <tr>
    <td>IR Code:</td>
    <td><input name='subcomponent_code' type='text' id='subcomponent_code' size=50>";
 
  $data.="</td>
  </tr>
       
  
                    <tr>
                      <td>IR</td>
                      <td>
					  <textarea name='subcomponent_name' id='subcomponent_name' cols='47' rows='3'></textarea>
                     </td>
                    </tr>
                    <tr>
                      <td height=''>Description</td>
                      <td><textarea name='scdescript' id='scdescript' cols='47' rows='3'></textarea></td>
                    </tr>
					<tr>
                      <td height='103'></td>
                      <td align='right'><input type='button' class='formButton2'   id='button'  id='button' name='subcomponent' id=subcomponent class='button_width' value=Save onclick=\"xajax_save_subcomponent(xajax.getFormValues('subcomponent'));\" class='button_width'></td>
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


function view_output($output,$subcomponent,$component,$programme,$supergoal_type){
$obj=new xajaxResponse(); 
 $_SESSION['ooutput_code']='';
 $_SESSION['supergoal_type']='';
  $_SESSION['ooutput_name']='';
  $_SESSION['osubcomponent']='';
  $_SESSION['ocomponent']='';
    $_SESSION['programme']='';
	$_SESSION['supergoal_type']=$supergoal_type;
 $_SESSION['ooutput_code']=$code;
  $_SESSION['ooutput_name']=$output;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['ocomponent']=$component;
    $_SESSION['programme']=$programme;
$data="<form name='output' id='output' action='$PHP_SELF' METHOD='POST'><div id='records'><table cellspacing='0' id='report'     width='100%' border='0' cellspacing='1' >".filter_output()."
<tr class='evenrow'>
     
    <td colspan='5'><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' class='formButton2'   id='button'  id='button' name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' class='formButton2'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('output'),'output_id','tbl_output');return false;\" value='Delete'  /></td>
<td></td>

  </tr>
<tr>
    <tH class='black2' colspan='6'><div align='center'>OUTPUT details</div></tH></tr>
<tr class='evenrow'>
<tH class='dataRow' colspan=2>SELECT</tH>
   <th class='dataRow' colspan='2'>OUTPUT</tH>
<tH class='dataRow' colspan='' >IR</tH>
<tH class='dataRow' colspan=''>PROGRAM</tH>

    </tr>";
  

  $inc=1;
  $select="SELECT t.output_id, t.output_code, t.output_name,
   p.prog_id,p.program_name,  sc.subcomponent_id, sc.subcomponent,
    sc.subcomponent_code FROM tbl_output t
LEFT JOIN tbl_programme p ON ( p.prog_id = t.prog_id )
LEFT JOIN tbl_subcomponent sc ON ( sc.subcomponent_id =t.subprog_id )

WHERE  t.output_name LIKE '".$_SESSION['output_name']."%'
and p.program_name like '".$_SESSION['programme']."%'
and t.display like 'Yes%'
GROUP BY t.output_code
ORDER BY t.output_code ASC";
//$obj->alert($select);
  $query=mysql_query($select)or die(http("VP-866"));
  
  $n=1;

  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
	  //-------------records to display -------------
	  $project=($row['title']==NULL)?"N/A":$row['title'];
	  $subcomponent=($row['subcomponent']==NULL)?"N/A":$row['subcomponent'];
	// $code=($row['component_code']==NULL)?$row['type']:$row['component_code'];
	  
	  $events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";
	$data.="<tr class=".$color." ".$events2." >
  	<td><input type='checkbox' name='output_id[]' id='output_id' value='".$row['output_id']."'></td><td>".$n++."</td>
	<td colspan='2'>".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</td>
   	<td>".retrieve_info_withSpecialCharacters($subcomponent)."</td>
	<td colspan=''>".retrieve_info_withSpecialCharacters($row['program_name'])."</td>
	</tr>";
  	$inc++;
  }
 
	$data.="".noRecordsFound($query,7)."<tr class='evenrow'>
     
    <td colspan='5'><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' class='formButton2'   id='button'  id='button' name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' class='formButton2'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('output'),'Delete_output','output_id','tbl_output');return false;\" value='Delete' /></td>
<td></td>
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
                <td>Progrmme:</td>
                <td><select name='prog_id' id='prog_id' class='combobox2'  onchange=\"xajax_add_output('".$_SESSION['supergoal_type']."','".$_SESSION['output_id']."',this.value,'','','',''); return false;\" >";
					  $querytyp=mysql_query("select * from tbl_programme  order by prog_id asc")or die(http("VP-2012"));
					while($rowtyp=mysql_fetch_array($querytyp)){
					$seltype=($_SESSION['programme']==$rowtyp['prog_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtyp['prog_id']."\" ".$seltype." >".$rowtyp['prog_id']." ".$rowtyp['program_name']."</option>";
					
					} 
    $data.="</select></td>
              </tr>
		<tr>
                <td>IR:</td>
                <td><select name='outcome' id='outcome' class='combobox2' ><option value=''>-select-</option>";
					  $querytype=mysql_query("select * from tbl_subcomponent  order by 1 asc")or die(http("VP-2023"));
					while($rowtype=mysql_fetch_array($querytype)){
					$seltype=($_SESSION['subprogram']==$rowtype['subcomponent_id'])?"SELECTED":"";
					$data.="<option value=\"".$rowtype['subcomponent_id']."\" ".$seltype." >".$rowtype['subcomponent']."</option>";
					
					} 
    $data.="</select></td>
              </tr>";
			
			  
$data.="<tr class=''>
       <td>".$_SESSION['supergoal_type']." Sub-IR Code</td>                      
    <td><input type='text' name='output_code' id='output_code' size='55' />";
$data.="e.g 1.0</td></tr>
  <tr>
    <td>".$_SESSION['supergoal_type']." Output Name: </td>
    <td><label>
	<textarea name='output_name' id='output_name' cols='55' rows='3'></textarea>
     
    </label></td>
  </tr>
  ";
			 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right' >
      <p>
        <button type='button' class='formButton2'   id='button'  id='button' name='save_output' id='save_output' value='Save' class='button_width' 			onclick=\"xajax_save_output(xajax.getFormValues('programme'));return false;\">
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


function view_subprogram($strategy,$output,$subcomponent,$component,$programme){
$obj=new xajaxResponse();

  $_SESSION['strategy_name']='';
  $_SESSION['output']='';
  $_SESSION['subcomponent']='';
  $_SESSION['component']='';
  $_SESSION['program_name']='';

 # $_SESSION['strategy_code']=$strategy;
    $_SESSION['strategy_name']=$strategy;
  $_SESSION['output']=$output;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['component']=$component;
  $_SESSION['program_name']=$programme;
$data="<form name='activity' id='activity' method='post' action='".$PHP_SELF."'><DIV id='records'>
  <table cellspacing='0'   id='report'   width='100%' border='0'>".filter_subprogram()."<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_strategy(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' class='formButton2'   id='button'  id='button' src='icons/delete_icon.png' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('activity'),'Delete_strategy','');return false;\" value='Delete' class='redhdrs'  /></td>

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
  	group by sc.subcomponent_code order by sc.subcomponent_code asc";
  $query=mysql_query($select)or die(http(1182));
  #$obj->alert($select);
  $n=1;
if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  	  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr  class='$color'>
    <td><input name='subprogram_code[]' type='checkbox' value='".$row['subcomponent_id']."' />".$n++."</td>  
		<td colspan=3>".$row['subcomponent_code']."   ".$row['subcomponent']."</td>	
		<td colspan=3> ".$row['program_name']."</td>
	
	  	

	
<td class='black2'><input name='details' title='activity_details' type='button' class='formButton2'   id='button'  id='button' value='Details' onclick=\"xajax_strategy_details('".$row['strategy_id']."')\"/></td>

  </tr>";
  $inc++;
  }}
  
$data.="<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button'  id='button' src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_strategy(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' class='formButton2'   id='button'  id='button' src='icons/delete_icon.png' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('activity'),'Delete_strategy','');return false;\" value='Delete' class='redhdrs'  /></td>

  </tr>";
$data.="</table></div></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



#***********************************view_indicator**********filter_indicator()**************************
function view_indicator($subcomponent,$program,$output_name,$indicator_type,$indicator_name,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
   $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->alert("Your Session has Expired!");
$obj->redirect('index.php');
return $obj;
}

 	$_SESSION['subcomponent']='';
  	$_SESSION['indicator_type']='';
 	$_SESSION['program_name']='';
	$_SESSION['indicator_name']='';
	$_SESSION['output_name']='';
 	$_SESSION['subcomponent']=$subcomponent;
	$_SESSION['program_name']=$program;
	$_SESSION['output_name']=$output_name;
  	$_SESSION['indicator_name']=$indicator_name;
	$_SESSION['indicator_type']=$indicator_type;

					$data.="<form id='indicator_all5' name='indicator_all5' action='".$PHP_SELF."' method='post' ><table cellspacing='1' width='100%' id='report' border='0'>".filter_indicator()."
					<tr class='evenrow'>
						 
						<td colspan=4> <input type='button' class='formButton2'   id='button'  id='button' class='formButton' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all'  class='formButton' /> | <iNput type='button' class='formButton2'   id='button'  id='button' TITLE='Edit' class='formButton'  onclick=\"xajax_edit_indicator(xajax.getFormValues('indicator_all5'));return false;\" value='Edit' />|  <input type='button' class='formButton2'  class='formButtonRed' TITLE='Delete' value='Delete' onclick=\"ConfirmDeletion(xajax.getFormValues('indicator_all5'),'indicator_id','tbl_indicator');return false;\"  /></td>
					 
					   <td colspan=3>";
   //display pages
   
   
   
   $data.="</td>

  </tr>
  <tr class=''>
    <th colspan='7' scope='cols' align=center><center>INDICATOR DETAILS</center></th>
   
  </tr>
  <tr class='evenrow2'>
  <th CLASS=black2 colspan='' width='10'>SELECT</th>
  <th CLASS=black2 width='200'>INDICATOR TYPE</th>
 <th CLASS=black2>INDICATOR CODE</th>
  <th CLASS=black2>INDICATOR NAME </th>
 
  <th CLASS=black2 colspan=2>ACTION </th>
  </tr>";
  
  
  
  
 // and s.subcomponent like '".$_SESSION['subcomponent']."%'
 //and p.program_name like '".$_SESSION['program_name']."%'
$query_string="select i.indicator_id,i.indicator_type,i.indicator_code,i.indicator_name,s.subcomponent_code,i.display,
s.subcomponent,s.subcomponent_id,p.program_name,p.prog_id,
i.output_id
 from tbl_indicator i left join tbl_subcomponent s on(s.subcomponent_id=i.subcomponent_id) 
 left join tbl_programme p on(p.prog_id=i.prog_id)
 
 where i.indicator_type like '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator_name']."%'
 and p.program_name like '".$_SESSION['program_name']."%' 
  and i.output_id like '".$_SESSION['output_name']."%'
 and i.display like 'Yes%'
order by i.indicator_code,i.indicator_type,i.indicator_name asc";
//$obj->alert($query_string);
$query=mysql_query($query_string)or die(http("VP-1735"));
/* left join tbl_output o on(o.output_id=i.output_id)
$max_records = mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
  */  #$obj->alert($select);
 
/*  if(mysql_num_rows($new_query)>0){ */
  while($row=mysql_fetch_array($query)){
  $color=($n%2==1)?"evenrow3":"white1";
$events2="onmouseup=\"this.style.backgroundColor='#F0D6AC';\"";
$events3="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
$events4="onmouseup=\"this.style.backgroundColor='#ffA040';\"";
$div2="status".$row['indicator_id'];
 $data.="<tr class=$color ".$events4.">
   
   <td class='dataRow' ><input type='checkbox' name='indicator_id[]' id='indicator_id'  value='".$row['indicator_id']."' /><input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >".$inc++."</td>
<td class='dataRow'>".$row['indicator_type']."</td> 
      <td class='dataRow'>".$row['indicator_code']."</td>  
  <td class='dataRow'>".$row['indicator_name']."</td>



 
	
  <td class='dataRow' colspan=2><input name='details' type='button' class='formButton2'   id='button'  id='button' value='Details' title='details' onclick=\"xajax_indicator_details('".$row['indicator_id']."','".$div2."');return false;\" /></td>
  </tr><tr><td colspan='10'><div id='".$div2."'></div></td></tr>";
  $n++;  
 }

$data.="<tr class='evenrow'>
     
    <td colspan=6> <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <iNput type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_indicator(xajax.getFormValues('indicator_all5'));return false;\" value='Edit' />|<input type='button' class='formButton2'   TITLE='Delete' value='Delete'  class='formButtonRed' onclick=\"ConfirmDeletion(xajax.getFormValues('indicator_all5'),'indicator_id','tbl_indicator');return false;\"   /><div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_indicator('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}
 
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>"; 
$data.="</div></td></tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
 
#***********************************************************************

function add_indicator($indicator_type,$output_id,$program_id,$subprogram_id){
$obj=new xajaxResponse();
 //$_SESSION['indicator_id']=$indicator_id;
$_SESSION['indicator_type']=''; 
$_SESSION['indicator_level']=''; 
$_SESSION['subprogram_id']=''; 
$_SESSION['output_id']=''; 
$_SESSION['program_id']=''; 

$_SESSION['indicator_type']=$indicator_type; 
$_SESSION['output_id']=$output_id; 
$_SESSION['program_id']=$program_id; 
$_SESSION['subprogram_id']=$subprogram_id; 
$typeofIndicator=array('Outcome','Output');

 /* while($typeofIndicator=@mysql_fetch_array(mysql_query("select * from tbl_lookup where classCode='11' order by codeName asc "))or die(http("VP-2232"))){
 $arraytg= explode(",", $typeofIndicator['codeName']);
$obj->alert($arraytg[0].",".$arraytg[1]);
} */
$data="<form name='indicator13' id='indicator13' action='".$PHP_SELF."'>
	 <table cellspacing='1'  width='100%' border='0'>
		<tr class='' >
                      <td>Programme</td>
                      <td>";
	 $data.="<select name='prog_id' id='prog_id' class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['subprogram_id']."');return false;\" ><OPTION VALUE='' >-SELECT-</OPTION>
					  <OPTION VALUE=''>-N/A-</OPTION>";
					  $querysp=mysql_query('select * from tbl_programme order by prog_id asc')or die(http("VP-2268"));
					 while($rowsp=mysql_fetch_array($querysp)){
					 $selectedsp=$rowsp['prog_id']==$_SESSION['program_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowsp['prog_id']."\" ".$selectedsp." >".$rowsp['prog_id']." ".$rowsp['program_name']."</option>";
				
					   }
				
					$data.="</select></td>";
					$data.="</tr>
	<tr class=''>
                      <td>Type of Indicator</td>
                      <td><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_add_indicator(this.value,'".$_SESSION['output_id']."','".$_SESSION['program_id']."','".$_SESSION['subprogram_id']."');return false;\" />
					  <option value=''>-SELECT-</option>
					   <OPTION VALUE='N/A'>-N/A-</OPTION>";
					   $queryt=mysql_query("select * from tbl_lookup where classCode='11' order by codeName asc ")or die(http("VP-2284"));	
					   while($rowt=mysql_fetch_array($queryt)){
					 	$selected2=($rowt['codeName']==$_SESSION['indicator_type'])?"SELECTED":"";
					$data.="<option value=\"".$rowt['codeName']."\" ".$selected2.">".$rowt['codeName']."</option>";
					   }	
					   
					  $data.=" </select></td>
                    </tr >";
					
					//outcome
					if($_SESSION['indicator_type']==$typeofIndicator[0]){
					$data.="<tr class=''>
               <td>IR</td>
               <td><select name='sub_component' id='sub_component'  class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION[			'output_id']."','".$_SESSION['program_id']."',this.value);return false;\"    ><OPTION VALUE=''>-SELECT-</OPTION>";
					  
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=@mysql_query($sql)or die(http("VP-2341"));	
					   
					  while($rowst=@mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".$rowst['subcomponent']."</option>";
					   }
					   
					   $data.="</select></td>
                    </tr><tr class=''>
                      <td width='200'>Sub-IR</td>
                      <td>";
						$data.="<select name='output_id' id='output_id' disabled='disabled'  class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['subprogram_id']."','".$_SESSION['program_id']."',this.value);return false;\"   ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=@mysql_query("select * from tbl_output order by output_code")or die(http("VP-2311"));
					 while($rowout=@mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".$rowout['output_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
						";
						}else {
						
						$data.="<tr class=''>
               <td>IR</td>
               <td><select name='sub_component' id='sub_component'  class='combobox2' onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION[			'output_id']."','".$_SESSION['program_id']."',this.value);return false;\"    ><OPTION VALUE=''>-SELECT-</OPTION>";
					  
	$sql="select * from tbl_subcomponent where prog_id='".$_SESSION['program_id']."'  order by  subcomponent_code asc";
		//$obj->alert($sql);
		$queryst=@mysql_query($sql)or die(http("VP-2341"));	
					   
					  while($rowst=@mysql_fetch_array($queryst)){
					   $selectedsp=$rowst['subcomponent_id']==$_SESSION['subprogram_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowst['subcomponent_id']."\" ".$selectedsp." >".$rowst['subcomponent_code']."  ".$rowst['subcomponent']."</option>";
					   }
					   
					   $data.="</select></td>
                    </tr><tr class=''>
                      <td width='200'>Sub-IR</td>
                      <td>";
					  //onchange=\"xajax_add_indicator('".$_SESSION['indicator_type']."','".$_SESSION['subprogram_id']."','".$_SESSION['program_id']."',this.value);return false;\"
					  
						$data.="<select name='output_id' id='output_id'   class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION><OPTION VALUE=''>-N/A-</OPTION>
                        ";
					  $queryout=@mysql_query("select * from tbl_output where subprog_id='".$_SESSION['subprogram_id']."' order by output_code")or die(http("VP-2311"));
					 while($rowout=@mysql_fetch_array($queryout)){
					 $selectedout=$rowout['output_id']==$_SESSION['output_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowout['output_id']."\" ".$selectedout." >".$rowout['output_code']."  ".$rowout['output_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
						";
						
						
						
						
						
						}
						
				
					  $data.="
					  
					   <tr class=''><td>Activity Description:</td>
	<td><textarea name='desc' class='combobox2' type='text' id='desc' cols='45' rows='3' ></textarea></td></tr>
					  <tr class=''>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='48' value='".$row['indicator_code']."' /> </td>
</tr>
    <tr class=''><td>Indicator Name:</td>
	<td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr class=''><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rog['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".$rog['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
	}
	
	$data.="</select>

 </td></tr>
 <tr class=''><td>Type of Disaggregation:</td><td><select name='typeofdisaggregation' class='combobox2' ><option value=''>-SELECT-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='17'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rog['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".$rog['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
	}
	
	$data.="</select>

 </td></tr>
  <tr class=''>
  <td>Unit of Measure:</td><td><select name='unitofmeasure' class='combobox2' ><option value=''>-Select-</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='10' order by codeName asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['codeName']."\" ".$sel."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>
 
  <tr class=''>
  <td>Responsible:</td><td><select name='reponsible' class='combobox2' ><option value='Managers' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("VP-1957"));
	while($row13=mysql_fetch_array($q)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row13['group_name']."\" ".$sel."/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td></tr>
	  <tr class=''>
	<td>Expected Output:</td><td><select name='output' class='combobox2' ><option value='Quantitative' />Quantitative</option>";
	$q=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($row13=mysql_fetch_array($q)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$row13['codeName']."</option>";
	
	}
	$data.="</select>  </td></tr>
	   <tr class=''>
	 <td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
	$q4=mysql_query("select * from  tbl_lookup where classCode='8' order by codeName asc")or die(http("VP-1957"));
	while($row14=mysql_fetch_array($q4)){
	//$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value=\"".$row14['codeName']."\" ".$sel."/>".$row14['codeName']."</option>";
	
	}
	$data.="</select> </td></tr>";
		 $data.="<tr class=''>
                      <td colspan='2'><div id='status'></div></td></tr>
			 <tr class=''>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right'><button  name='save_indicator' type='button' class='formButton2'   id='button'  id='save_indicator' value='Save' class='button_width' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator13'));\" />Save</button></td>
            
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
                      <td width='200'>Sub-IR</td>
                      <td>";
					  
					 
					  $data.="<select name='output_id' id='output_id' class='combobox2' ><OPTION VALUE=''>-SELECT-</OPTION>
                        ";
					  $queryout=mysql_query('select * from tbl_output order by output_name')or die(http("VP-1320"));
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
					  $queryp=mysql_query('select * from tbl_programme order by program_name')or die(http("VP-1874"));
					 while($rowp=mysql_fetch_array($queryp)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
				
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
					  $queryp=mysql_query('select * from tbl_programme order by program_name')or die(http("VP-1903"));
					 while($rowp=mysql_fetch_array($queryp)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowp['prog_id']."\" ".$selected.">".$rowp['prog_id']." ".$rowp['program_name']."</option>";
				
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
					  $querypj=mysql_query('select * from tbl_project order by title')or die(http("VP-1320"));
					 while($rowpj=mysql_fetch_array($querypj)){
					 //$selected=$rowp['prog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value=\"".$rowpj['project_id']."\" ".$selected." >".strtolower($rowpj['title'])."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr><tr>
  <td scope='col'>Indicator Code </td>
    <td> <input name='indicator_id' id='indicator_id' type='hidden' value='' /><input name='indicator_code' type='text' id='indicator_code' size='55' value='".$row['indicator_code']."' /></td>
</tr>
    <tr><td>Indicator Name:</td><td><textarea name='indicator' class='combobox2' type='text' id='indicator1' cols='45' rows='3' ></textarea></td></tr>";

	$data.="<tr><td>Gender Disaggregation:</td><td><select name='gender' class='combobox2' ><option value=''>-select-</option>";
$SEL=mysql_query("select * from tbl_lookup where classCode='21'")or die(http("VP-1947"));
while($rowg=mysql_fetch_array($SEL)){
//$sel=($rog['codeName']==$row['gender'])?"SELECTED":"";
	$data.="<option value=\"".$rog['codeName']."\" ".$sel."/>".$rowg['codeName']."</option>";
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
	 <tr><td>Frequency of Reporting</td><td><select name='frequency' class='combobox2' ><option value='' >-Select-</option>";
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
               
                <td width='69' ALIGN='right'><input type='button' class='formButton2'   id='button'  id='button' name='save_indicator' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator13'));\" /></td>
            
              </tr>
             
    </table>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_indicatorDefinition($program_code,$indicator_type,$indicator_id,$level,$correspondence,$noofrecords){
$obj=new xajaxResponse();
 	//$_SESSION['indicator_id']=$indicator_id;
 	$_SESSION['indicator_type']=''; 
 	$_SESSION['indicator_name']='';
 	$_SESSION['program_code']='';
 	$_SESSION['level']='';
 	$_SESSION['correspondence']='';
	$_SESSION['nhh']=1; 
	$_SESSION['indicator_type']=$indicator_type;
	$_SESSION['indicator_name']=$indicator_id;
	$_SESSION['program_code']=$program_code;
	$_SESSION['level']=$level;
	$_SESSION['correspondence']=$correspondence;
	$_SESSION['nhh']=$noofrecords;
	//$obj->addAlert($_SESSION['indicator_id']);  
$data="";

    $data.="<form name='indicator13' id='indicator13'	action='".$PHP_SELF."'>
	 <table cellspacing='0'  id='report'     width='100%' border='0'>
	  <tr class='evenrow3' >
	<td colspan=''>Program:</td>
	<td colspan=3><select name='program'  id='program' class='combobox2' onchange=\"xajax_new_indicatorDefinition(this.value,'','','','',1);return false;\" /><option value=''>-select-</option>";
					   $queryip=mysql_query("select * from tbl_programme where program_name <> ''  order by program_code asc ")or die(http("VP-1838"));	
					   
					   while($rowip=mysql_fetch_array($queryip)){
					   $selected2p=$rowip['program_code']==$_SESSION['program_code']?"SELECTED":"";
			
					  
					 $data.="<option value=\"".$rowip['program_code']."\" ".$selected2p.">".$rowp['prog_id']." ".$rowip['program_name']."</option>";
					   }	
					   
					  $data.="			  
                      </select></td></tr>

	<tr class='evenrow3'>
    <td colspan=''>Type of Indicator:</td>
    <td colspan='3' ><select name='type_ofindicator'  id='type_ofindicator' class='combobox2' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."',this.value,'','','',1);return false;\" /><option value=''>-select-</option>";
					   $queryt=mysql_query("select distinct(indicator_type) as indicator_type from tbl_indicator where indicator_type<> '' group by  indicator_type asc ")or die(http("VP-1838"));	
					   
					   while($rowt=mysql_fetch_array($queryt)){
					   $selected2=$rowt['indicator_type']==$_SESSION['indicator_type']?"SELECTED":"";
			
					  
					 $data.="<option value=\"".$rowt['indicator_type']."\" ".$selected2.">".$rowt['indicator_type']."</option>";
					   }	
					   
					  $data.="			  
                      </select></td>
                    </tr >
	
    <tr class='evenrow3' >
	<td colspan=''>Indicator Name:</td>
	<td colspan=3><select name='indicator'  id='indicator' class='combobox2' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."',this.value,'','',1);return false;\" /><option value=''>-select-</option>";
					   $queryi=mysql_query("select indicator_id,indicator_code,indicator_name as indicator_name from tbl_indicator where indicator_name<> '' and indicator_type like  '".$_SESSION['indicator_type']."%' group by  indicator_code,indicator_name asc ")or die(http("VP-1838"));	
					   
					   while($rowi=mysql_fetch_array($queryi)){
					   $selected2i=$rowi['indicator_id']==$_SESSION['indicator_name']?"SELECTED":"";
			
					  
					 $data.="<option value=\"".$rowi['indicator_id']."\" ".$selected2i.">".$rowi['indicator_code']."  ".$rowi['indicator_name']."</option>";
					   }	
					   
					  $data.="			  
                      </select></td></tr>
					 					  <tr class='evenrow3' ><td>Level of Definition:</td><td colspan=3>
					  <select name='level' id='level' class='combobox2'  onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."',this.value,'',1);return false;\"  ><option value='' />-Select-</option>";
	$qo=mysql_query("select * from  tbl_lookup where classCode='12' order by codeName asc")or die(http("VP-1966"));
	while($rowo=mysql_fetch_array($qo)){
	$selo=($rowo['codeName']==$_SESSION['level'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$rowo['codeName']."</option>";
	
	}
	$data.="</select></td></tr>
	 ";
	 if($_SESSION['level']=='Corporate/Impact Level'){
	 $data="<tr class='evenrow3' ><td>Super Goal</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>";
	$qo=mysql_query("select * from  tbl_supergoal where prog_id='".$_SESSION['program_code']."' order by component asc")or die(http("VP-1966"));
	while($rowo=mysql_fetch_array($qo)){
	$selcorr=($rowo['id']==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['id']."\" ".$selcorr."/>".$rowo['component']."</option>";
	
	}
	$data.="</select></td></tr>";
	 }
	 else if($_SESSION['level']=='Corporate/Outcome Level'){
	  $data="<tr class='evenrow3' ><td>Goal</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence'  onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>";
	$qog=mysql_query("select * from  tbl_goal where prog_id='".$_SESSION['program_code']."' order by component asc")or die(http("VP-1966"));
	while($rowog=mysql_fetch_array($qog)){
	$selcorr=($rowog['id']==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value=\"".$rowog['id']."\" ".$selcorr."/>".$rowog['component']."</option>";
	
	}
	$data.="</select></td></tr>";
	 
	 }
	 else if($_SESSION['level']=='Output Level'){
	   $data="<tr class='evenrow3' ><td>Output</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence'  onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>";
	$qog=mysql_query("select * from  tbl_output where prog_id='".$_SESSION['program_code']."' order by output_name asc")or die(http("VP-1966"));
	while($rowog=mysql_fetch_array($qog)){
	$selcorr=($rowog['output_id']==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value=\"".$rowog['output_id']."\" ".$selcorr."/>".$rowog['output_name']."</option>";
	
	}
	$data.="</select></td></tr>";
	 
	 
	 
	 }
	  else if($_SESSION['level']=='Program Level'){
	   $data="<tr class='evenrow3' ><td>Sub-program/Activity/Commodities/Interventions/Theme</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence'  onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>";
	$qog=mysql_query("select * from  tbl_subcomponent where prog_id='".$_SESSION['program_code']."' order by subcomponent_code asc")or die(http("VP-1966"));
	while($rowog=mysql_fetch_array($qog)){
	$selcorr=($rowog['subcomponent_id']==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value=\"".$rowog['subcomponent_id']."\" ".$selcorr."/>".$rowog['subcomponent']."</option>";
	
	}
	$data.="</select></td></tr>";
	 
	 
	 
	 }
	  else if($_SESSION['level']=='Project Level'){
	   $data="<tr class='evenrow3' ><td>Project</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>";
	$qog=mysql_query("select * from  tbl_project where prog_id='".$_SESSION['program_code']."' order by project_code,title asc")or die(http("VP-1966"));
	while($rowog=mysql_fetch_array($qog)){
	$selcorr=($rowog['project_id']==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value=\"".$rowog['project_id']."\" ".$selcorr."/>".$rowog['project_code']." ".$rowog['title']."</option>";
	
	}
	$data.="</select></td></tr>";
	 
	 
	 
	 }
	  else if($_SESSION['level']=='Secretariat Level'){
	   $data="<tr class='evenrow3' ><td>Secretariat</td><td colspan=3>
					  <select name='level_correspondence' class='combobox2' id='level_correspondence' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."',this.value,1);return false;\" ><option value='' />-Select-</option>
					  <option value='N/A' >-N/A-</option>";
					  $selcorr=('Secretariat'==$_SESSION['correspondence'])?"SELECTED":"";
	$data.="<option value='Secretariat' ".$selcorr." >Secretariat</option>";
	

	$data.="</select></td></tr>"; 
	 

	 
	 }
	 else{
	 
	 }
	 $data.="
<tr class='evenrow3'>
<td colspan=''>Number of Indicator Definitions</td>
<td colspan=3><select name='nhh' id='nhh' class='combobox2' onchange=\"xajax_new_indicatorDefinition('".$_SESSION['program_code']."','".$_SESSION['indicator_type']."','".$_SESSION['indicator_name']."','".$_SESSION['level']."','".$_SESSION['correspondence']."',this.value);return false;\">";
	    $yr = 21; $end = $yr; do{
		$sel=($_SESSION['nhh']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel." >".$end."</option>";

$end--;} while($end>= 1);
      $data.="</select></td></tr>
	  
<tr class='evenrow3'><th>NO</Th><th>expected output</Th><th colspan='2'>DEFINITION</Th></TR>";

//$_SESSION['nhh']
$n=1;
 for($i=0;$i<$_SESSION['nhh'];$i++){
 $color=($n%2==1)?"evenrow3":"white1";
  $data.="<tr class='$color'>
  <td width='' align='right'><div style='float:left;'>".$n."</div>|<select name='output[]' id='output' style='width:140px;'><option value='' />-Select-</option>";
	$qo=mysql_query("select * from  tbl_lookup where classCode='22' order by codeName asc")or die(http("VP-1966"));
	while($rowo=mysql_fetch_array($qo)){
	//$selo=($rowo['codeName']==$row['expected_output'])?"SELECTED":"";
	$data.="<option value=\"".$rowo['codeName']."\" ".$selo."/>".$rowo['codeName']."</option>";
	
	}
	$data.="</select></td>
   <td width='' colspan='3'>
	<input name='loopkey[]' name='loopkey[]' id='loopkey' value='1' type='hidden' size='40'>
   <input name='definition[]'  id='definition' type='text' size='60'></td>
  </tr>";
  $n++;
  }
                    
                   
					
					// }
			
			 $data.="
              <tr class='evenrow'>
                <td width='165'>&nbsp;</td>
               
                <td width='69' ALIGN='right' colspan=3><input type='button' class='formButton2'   id='button'  id='button' name='save_indicatorDefinition' id='button' value='Save' class='button_width' onclick=\"xajax_save_indicatorDefinition(xajax.getFormValues('indicator13'));return false;\" /></td>
            
              </tr>
             
    </table>  </form>";		 
					  
	
	//}
					
                
	
	//$obj->addAlert($data);
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




#****************************************************
function indicator_details($indicator_id,$div2){
 $obj=new xajaxResponse();
 $select="select ti.indicator_id,ti.indicator_name,ti.disaggregation,
 o.output_code,o.output_name,ti.subcomponent_id,s.subcomponent_code,
 s.subcomponent,p.prog_id, p.program_name,p.Funder 
 FROM tbl_indicator ti
LEFT JOIN tbl_output o ON ( ti.output_id = o.output_id )
LEFT JOIN tbl_subcomponent s ON ( ti.subcomponent_id = s.subcomponent_id )
LEFT JOIN tbl_programme p ON ( ti.prog_id = p.prog_id )
 WHERE ti.indicator_id='".$indicator_id."'
 group by indicator_id  
 order by indicator_id asc;";
 #$sel="select * from tbl_indicator where indicator_id='".$indicator_id."' ";
// $obj->alert($select);
 $query=mysql_query($select)or die("VP-2889");
 //if(mysql_num_rows($query)>0){
 while($row=mysql_fetch_array($query)){
 
 $data="<form name='indicator_details' ID='indicator_details' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='100%' border='0'>

 
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
 
   <tr>
    <td class='black2'>IR:</td>
    <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>

  </tr>
  
  <tr>
    <td class='black2'>Sub-IR:</td>
    <td>".$row['output_code']." ".$row['output_name']."</td>

  </tr>
 <tr>
    <td width='' class='black2'>Indicator:</td>
    <td width=''>".$row['indicator_name']."</td>

  </tr>
</tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><input type='button' class='formButton2'   id='button'  id='button' Value='Back' title='Back' name='Back' onclick=\"xajax_view_indicator('','','','','','','','');return false;\" /> | <input type='button' class='formButton2'   id='button'  id='button' value='Print' title='edit' onclick='print()'/> </td>
  </tr>
</table></form>
";}
/* }else
$obj->alert("Error.....".mysql_error()); */
 $obj->assign($div2,'innerHTML',$data);
 
return $obj;
 }


#****************************************************
#Indicator Definitions


function view_indicatorDefinition($subcomponent,$program,$indicator_type,$indicator_name,$cur_page=1,$records_per_page=20){
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

$data.="<form id='indicator_all' name='indicator_all' action='".$PHP_SELF."' method='post' ><table   id='report'    width='100%' border='0'>".filter_indicatorDefinition()."
<tr class='evenrow'>
     
    <td colspan=4> <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <iNput type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition(xajax.getFormValues('indicator_all'));return false;\" value='Edit' /> | <input type='button' class='formButton2'   id='button'  id='button'  TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDeletion(xajax.getFormValues('indicator_all'),'Delete_Indicator','indicator_id','tbl_indicator','xajax_view_indicatorDefinition','7');return false;\"  /></td>
 
   <td colspan=3>";
   //display pages
   
   
   
   $data.="</td>

  </tr>
  <tr class='evenrow2'>
    <tD colspan='7' scope='cols' align=center class='dataRow'><B>INDICATOR DEFINITION DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2' class='dataRow'>
  <td CLASS=black2 colspan='' width='10' class='dataRow'>SELECT</td>
  <td CLASS=black2 width='150' class='dataRow'>INDICATOR TYPE</td>

  <td CLASS=black2 COLSPAN=2 class='dataRow'>INDICATOR NAME </td>
 
  <td CLASS=black2 class='dataRow' width='500'>DEFINITION</td>
  </tr>";
  // and s.subcomponent like '".$_SESSION['subcomponent']."%'
 //and p.program_name like '".$_SESSION['program_name']."%'
$query_string="
select i.indicator_type,i.indicator_id,i.indicator_code,d.display,d.DefName,i.indicator_name
 from tbl_indicator i left join `tbl_indicator_definition` d on(d.indicator_id=i.indicator_id) 
 where i.indicator_type like '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator_name']."%'
group by i.indicator_id having d.display='Yes' order by i.indicator_name asc
";
//$obj->alert($query_string);
$query=mysql_query($query_string)or die(http("VP-1735"));
/* 
$max_records = mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("VP-1741")); 
  */  #$obj->alert($select);
 
/*  if(mysql_num_rows($new_query)>0){ */
  while($row=mysql_fetch_array($query)){
  $color=($n%2==1)?"evenrow3":"white1";
 
$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
 $data.="<tr class=$color ".$events2.">
   
   <td class='dataRow' ><input type='checkbox' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' /><input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' >".$inc++."</td>
<td class='dataRow' width='150'>".$row['indicator_type']."</td> 
      <td class='dataRow'>".$row['indicator_code']."</td>  
  <td class='dataRow'>".$row['indicator_name']."</td>
<td class='dataRow' width='500'><table width='300' id='report' cellspacing='1'>";
$qdfn=mysql_query("select * from tbl_indicator_definition where indicator_id='".$row['indicator_id']."'")or die(http("VP-2290"));
while($rowdfn=mysql_fetch_array($qdfn)){
//$color=$n%2==1?"evenrow"
$data.="<tr class='evenrow'><td class='dataRow'><input name='defintion_id' type='checkbox' value='".$row['defn_id']."' checked='checked' disabled='disabled'></td><td class='dataRow'>".$rowdfn['DefName']."</td></tr>";
}
$data.="</table></td>
  </tr>";
  $n++;  
 }
 #} 
$data.="<tr class='evenrow'>
     
    <td colspan=7> <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' class='formButton2'   id='button'  id='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |  <iNput type='button' class='formButton2'   id='button'  id='button' TITLE='Edit'  onclick=\"xajax_edit_indicatorDefinition(xajax.getFormValues('indicator_all'));return false;\" value='Edit' /> | <input type='button' class='formButton2'   id='button'  id='button'  TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDeletion(xajax.getFormValues('indicator_all'),'Delete_Indicator','indicator_id','tbl_indicator','xajax_view_indicatorDefinition','7');return false;\"   /><div style='float:right;'>";

 $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['subcomponent']."','".$_SESSION['program_name']."','".$_SESSION['indicator_name']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>"; 
$data.="</div></td></tr></table></form>";
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
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/popup.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>
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
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p">
	
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
		 case "Main Activity": 
		  ?>
		  xajax_view_programme('','','','');

		<?php
		
	break;
	
	 case"Intermediate Result": 
		  ?>
		 xajax_view_subcomponent('','','','');

		<?php
		break;
		case "Sub-Intermediate Result": 
		  ?>
		 xajax_view_output('','','','','');
//xajax_view_Indicator('','','','','',1,20);
		<?php
		break;
		 case "Indicator": 
	?>

		xajax_view_indicator('','','','','','',1,20);
		
		<?php
		break;
		case "Indicator Definition": 
	?>

		xajax_view_indicatorDefinition('','','','','',1,20);
		
		<?php
		break;
		case "CARP Results Framework": 
	?>

		//xajax_view_indicatorDefinition('','','','','',1,20);
			xajax_view_all('');
			//xajax_viewall_programs();
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
    </div></td>
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

