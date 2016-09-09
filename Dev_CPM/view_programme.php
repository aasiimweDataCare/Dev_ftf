<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
//require_once('functions.php');
require_once('filters.php');
//require_once('organization.php');
$xajax = new xajax();
$xajax->errorHandlerOn();

#xajax register function
#------------------------------------------------
$xajax->registerFunction('selectAll');
$xajax->registerFunction('view_programme');
$xajax->registerFunction('search_programme');
$xajax->registerFunction('reload_programme');
$xajax->registerFunction('edit_programmeAll');
#-----------------------------------------------
$xajax->registerFunction('view_all');
$xajax->registerFunction('viewall_output');
$xajax->registerFunction('viewall_activity');
$xajax->registerFunction('viewall_subactivity');
$xajax->registerFunction('viewall_indicator');
#programme
#-----------------------------------------------
$xajax->registerFunction('add_programme');
$xajax->registerFunction('save_programme');
$xajax->registerFunction('programme_details');
$xajax->registerFunction('edit_programme');
$xajax->registerFunction('update_programme');
$xajax->registerFunction('updateProgramme2');
$xajax->registerFunction('deleteprogramme2');
$xajax->registerFunction('delete_programme');

#component
$xajax->registerFunction('view_component');
$xajax->registerFunction('search_component');
$xajax->registerFunction('component_details');
$xajax->registerFunction('add_component');
$xajax->registerFunction('save_component');
$xajax->registerFunction('edit_component');
$xajax->registerFunction('update_component');
$xajax->registerFunction('updateComponent2');
$xajax->registerFunction('delete_component');
$xajax->registerFunction('deletecomponent');
#subcomponent
$xajax->registerFunction('view_subcomponent');
$xajax->registerFunction('search_subcomponent');
$xajax->registerFunction('subcomponent_details');
$xajax->registerFunction('add_subcomponent');
$xajax->registerFunction('save_subcomponent');
$xajax->registerFunction('edit_subcomponent');
$xajax->registerFunction('update_subcomponent');
$xajax->registerFunction('updateSubcomponent2');
$xajax->registerFunction('delete_subcomponent');
$xajax->registerFunction('deletesubcomponent');
#output
$xajax->registerFunction('view_output');
$xajax->registerFunction('output_details');
$xajax->registerFunction('add_output');
$xajax->registerFunction('save_output');
$xajax->registerFunction('search_output');
$xajax->registerFunction('edit_output');
$xajax->registerFunction('update_output');
$xajax->registerFunction('updateOutput2');
$xajax->registerFunction('reload_outputProgramme');
$xajax->registerFunction('delete_output');
$xajax->registerFunction('deleteOutput');

#activity
$xajax->registerFunction('view_activity');
$xajax->registerFunction('dynamicfilter_subcomponent');
$xajax->registerFunction('dynamicfilter_subcomponent_editing');
$xajax->registerFunction('reloadActivityProgramme');
$xajax->registerFunction('reloadActivitySubcomponent');
$xajax->registerFunction('autofilter_subcomponent');
$xajax->registerFunction('search_activity');
$xajax->registerFunction('activity_details');
$xajax->registerFunction('add_activity');
$xajax->registerFunction('save_activity');
$xajax->registerFunction('edit_activity');
$xajax->registerFunction('update_activity');
$xajax->registerFunction('updateActivity2');
$xajax->registerFunction('delete_activity');
$xajax->registerFunction('deleteActivity');
#sub-activity
$xajax->registerFunction('view_subactivity');
$xajax->registerFunction('search_subactivity');
$xajax->registerFunction('dynamicfilter_subactivity');
$xajax->registerFunction('dynamicfilter_output_editing');
$xajax->registerFunction('subactivity_details');
$xajax->registerFunction('add_subactivity');
$xajax->registerFunction('save_subactivity');
$xajax->registerFunction('edit_subactivity');
$xajax->registerFunction('update_subactivity');
$xajax->registerFunction('updateSubactivity2');
$xajax->registerFunction('dynamicfilter_subactivity_editing');
$xajax->registerFunction('reloadSubactivityProgramme');
$xajax->registerFunction('delete_subactivity');
$xajax->registerFunction('deleteSubactivity');
#indicator
$xajax->registerFunction('view_indicator');
$xajax->registerFunction('edit_indicatorLogoframeSubactivity_2');
$xajax->registerFunction('edit_indicatorLogoframeSubactivity');
$xajax->registerFunction('dynamicfilter_indicator');
$xajax->registerFunction('dynamicfilter_indicator_output');
$xajax->registerFunction('dynamicfilter_indicator_activity');
$xajax->registerFunction('reloadview_indicator');
$xajax->registerFunction('indicator_details');
$xajax->registerFunction('add_indicator');
$xajax->registerFunction('add_indicatorDCED');
$xajax->registerFunction('save_DCEDindicator');
$xajax->registerFunction('add_indicator_2');
$xajax->registerFunction('save_indicator');
$xajax->registerFunction('save_indicator_gender');
$xajax->registerFunction('search_indicator');
$xajax->registerFunction('view_DCEDindicator');
$xajax->registerFunction('search_DCEDindicator');
$xajax->registerFunction('DCED_mapping');
$xajax->registerFunction('check_indicatorType');
$xajax->registerFunction('check_indicatorType_editing');
$xajax->registerFunction('dynamicFilterSubcomponentIndicatorEditing');
$xajax->registerFunction('check_viewIndicatorType');
$xajax->registerFunction('searchActivityBasedIndicator');
$xajax->registerFunction('selectIndicator');
$xajax->registerFunction('add_abiTrustIndicator');
$xajax->registerFunction('view_ABTrustIndicators');
$xajax->registerFunction('view_resultsBasedIndicators');
$xajax->registerFunction('reloadIndicatorProgramme');
$xajax->registerFunction('reloadResultsBasedIndicatorProgramme');
#--------------------------------------------------------
$xajax->registerFunction('delete_indicator');
$xajax->registerFunction('deleteIndicator');
$xajax->registerFunction('edit_indicator');
$xajax->registerFunction('update_indicator');
$xajax->registerFunction('updateIndicator2');
#********************************************

#-------------------------------------------------
#dced standard
#**********************************************
$xajax->registerFunction('view_intervention');
$xajax->registerFunction('add_intervention');
$xajax->registerFunction('save_intervention');
$xajax->registerFunction('save_subsector');
$xajax->registerFunction('edit_intervention');
$xajax->registerFunction('update_intervention');
$xajax->registerFunction('delete_intervention');
$xajax->registerFunction('intervention_details');
#**************************************************
$xajax->registerFunction('view_resultschain_level');
$xajax->registerFunction('search_resultsChain');
$xajax->registerFunction('add_resultschain');
$xajax->registerFunction('resultschain_details');
$xajax->registerFunction('save_resultschain');
$xajax->registerFunction('edit_resultschain');
$xajax->registerFunction('update_resultschain');
$xajax->registerFunction('updateResultsChain');
$xajax->registerFunction('delete_resultsChain');
$xajax->registerFunction('deleteResultsChain');

#************************************************
#subsector
$xajax->registerFunction('view_subsector');
$xajax->registerFunction('search_subsector');
$xajax->registerFunction('add_subsector');
$xajax->registerFunction('save_subsector');
$xajax->registerFunction('edit_subsector');
$xajax->registerFunction('update_subsector');
$xajax->registerFunction('updateSubsector');
$xajax->registerFunction('delete_subsector');
$xajax->registerFunction('deleteSubsector');
$xajax->registerFunction('UpdateVariable');
$xajax->registerFunction('UpdateCumulativeIndicator');





require_once('save.php');
include('search.php');
require_once('edit.php');
require_once('delete.php');
#************************************************

#***********************************************
#view programme
#edit programme
#save programme
#edit_programme
#delete_programme
#************************************************
//$programme,$funder
function view_programme($programme,$funder){
$obj=new xajaxResponse();
$_SESSION['programme']=$programme;
$_SESSION['funder']=$funder;
$data="<form name='programme' id='programme'><div id='records'><table width='660' border='0' cellspacing='1' border>".filter_programme()."
<tr class='evenrow2'>
    <td class='black2' colspan='5' ><center>PROGRAMME DETAILS</center></td>

  </tr>
  
  <tr class='evenrow2'>
    <td class='black2' colspan='1' >PROGRAMME</td>
    <td class='black2' colspan='2'>FUNDER</td>
    <td class='black2' colspan='2'>DETAILS</td>
  </tr>
  ";
   $inc=1;
  $query=mysql_query("select * from tbl_programme order by program_name asc")or die("aBi Trust Error:0201, Because ".mysql_error());
  $n=1;
  $_SESSION['prog2_id']="";
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
	  $_SESSION['prog2_id']=$row['prog_id'];
	  $x= "+"; $y= "-";
	 $add=$_SESSION['prog2_id']===$row['prog_id']?$x:$y; 
  $data.="<tr class=$color class='black'>
    <td colspan='1'><input type='checkbox' name='prog_id[]' id='prog_id' value='".$row['prog_id']."'><a href='#view_all' onclick=\"xajax_view_all('".$row['prog_id']."')\"><img src='images/Add-icon.png' alt='View All' /></a> <a href='#DETAILS' onclick=\"xajax_programme_details('".$row['prog_id']."')\">".$row['program_name']."</td>
    <td  colspan='2'>".$row['Funder']."</td>
    <td colspan='2'>".$row['details']."</td>
  
  </tr>";
    $inc++;
    }
$data.="<tr class=$color>  
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' name='Delete' TITLE='Delete'  onclick=\"xajax_delete_programme(xajax.getFormValues('programme'));return false;\" value='Delete' class='redhdrs'   /></td>
	 <td></td></tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function search_programme($programme,$funder){
$obj=new xajaxResponse();
$_SESSION['programme']=$programme;
$_SESSION['funder']=$funder;

//$obj->addAlert($programme."-".$funder);

$data="<form name='programme' id='programme'><div id='records'><table width='660' border='0'><tr><td class='green_field' width=660 colspan=4>Setup &raquo; View Programme</td></tr>
<tr><td class='green_field' width=660 colspan=4><hr/></td></tr>".filter_programme()."
</table><table width='660' border='0'><tr class='evenrow'>
    <td class='black2' colspan=2>SELECT</td>
    <td class='black2'>PROGRAMME</td>
    <td class='black2'>FUNDER</td>
    <td class='black2'>DESCRIPTION</td>
  </tr>";
   $inc=1;
   $q="select * from tbl_programme  WHERE lower(program_name) like '".strtolower($_SESSION['programme'])."' && lower(Funder) like '".strtolower($_SESSION['funder'])."' order by program_name asc";

 
  $query=mysql_query($q)or die("aBi Trust Error:00422, Because ".mysql_error());
  $n=1;
  $_SESSION['prog2_id']="";  
  
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
	  $_SESSION['prog2_id']=$row['prog_id'];
	  $x= "+"; $y= "--";
	 $add=$_SESSION['prog2_id']==""?$x:$x; 
  $data.="<tr class=$color class='black'>
    <td><input type='checkbox' name='prog_id[]' id='prog_id[]' value='".$row['prog_id']."'></td><td><a href='#view_all' onclick=\"xajax_view_all('".$_SESSION['prog2_id']."')\">".$add."</a></td>
    <td><a href='#DETAILS' onclick=\"xajax_programme_details('".$row['prog_id']."')\">".$row['program_name']."</td>
    <td>".$row['Funder']."</td>
    <td>".$row['details']."</td>
  
  </tr>";
    $inc++;
  }
  }else
  {
     $obj->addAlert("No Results Found!");
	 return $obj;
  
  }
$data.="<tr class=$color>  
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit'  onclick=\"xajax_edit_programmeAll(xajax.getFormValues('programme'));return false;\"  value='Edit' />| <input type='button' name='Delete' TITLE='Delete'  onclick=\"xajax_delete_programme(xajax.getFormValues('programme'));return false;\" value='Delete' class='redhdrs'  /></td>
	 <td></td></tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function selectAll($test){
$obj=new xajaxResponse();
#$obj->addAlert(('Ok!');
$obj->addAssign($test,'checked',"true");
$obj->addScriptCall("xajax_view_programme");
return $obj;
}

/* function selectAll(obj) {
var checkBoxes = document.getElementsByTagName('input');
for (i = 0; i < checkBoxes.length; i++) {
if (obj.checked == true) {
checkBoxes[i].checked = true; // this checks all the boxes
} else {
checkBoxes[i].checked = false; // this unchecks all the boxes
}
}
} */

function programme_details($prog_id){
$obj=new xajaxResponse();
$_SESSION['prog_id']=$prog_id;
$query=mysql_query("select * from tbl_programme where prog_id='".$prog_id."' order by program_name asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
//$_SESSION['prog_id']=$row['prog_id'];

$data.="<table width='100%' border='0'>
<tr><td class='green_field' width='' colspan=>Setup &raquo; Programme Details</td><td align=right>
<input name='back' type='button' onClick=\"xajax_view_programme();return false\" value='Back' /> </td><td>  <input name='view_all' type='button' value='Programme BreakDown' onclick=\"xajax_view_all('".$row['prog_id']."')\" /></td></tr>
<tr><td class='green_field' width=660 colspan=3><hr/></td></tr>
  <tr>
    <td width='20%'>Program:</td>
    <td width='' colspan=''>$row[program_name]</td>

  </tr>
  <tr>
    <td>Funder:</td>
    <td colspan=>$row[Funder]</td>
    
  </tr>
  <tr>
    <td>Details</td>
    <td colspan=>$row[details]</td>

  </tr>
  <tr>
    <td></td>
    <td colspan=><img src='icons/cancel_icon.png' title='close' onclick=\"xajax_view_programme()\"> | <img src='icons/print_icon.png' title='Edit' >  </td>
    <td></td>
  </tr>
  ";
 }
 
$data.="</table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
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
function view_all($prog_id){
$obj=new xajaxResponse();
$query=mysql_query("select * from tbl_programme where prog_id='".$prog_id."'")or die("<font color=red>aBi Error Code: 0744 Because, ".mysql_error()."</font>");
while($row=mysql_fetch_array($query)){
$data="<table width='511' border='0'>
<tr><td class='green_field' width=660 colspan=2><div style='float:left;'>Setup &raquo; Program BreakDown</div><div style='float:right'><input name='back' type='button' onClick=\"xajax_view_programme('','');\" value='Back' /></div></td></tr>
<tr><td class='green_field' width=660 colspan=2><hr/></td></tr>
  <tr>
    <td width='105' class='green_field'>Programme:
      <input type='hidden' name='prog_id' value=$row[prog_id]></td>
    <td width='396'>$row[program_name]</td>
  </tr>
  <tr>
    <td class='green_field'>Component:</td>
    <td>$row[component]</td>
  </tr>
  <tr>
    <td class='green_field' valign=top>Sub-Components:</td>
    <td><table width='400' border='0'>";
  $p=2; $d="subcomponent";
  
  $query=mysql_query("select * from tbl_subcomponent where prog_id='".$prog_id."' order by subcomponent_code asc")or die(mysql_error());
  if(@mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomp_id']=$row['id'];
  $div=$d.$row['id'];
  $data.="<tr>
  <td>Sub-Component:</td>
    <td><input type='hidden' name='subcomponent_id' id='subcomponent_id' value='".$row['id']."'>".$row['subcomponent_code']."</td>
    <td><a href='#subcomponent_details' class=black onclick=\"xajax_viewall_output('".$row['id']."','".$div."')\">$row[subcomponent]<a></td>
  </tr>
  <tr>
    <td></td><td colspan=2><div id='".$div."' ></div></td>
  </tr>
 
  ";
  //$_SESSION['div']=$d.$row['id'];
  $p++;
  }
  }
  else{
  $obj->addAssign("bodyDisplay",'innerHTML',noteMsg("No results Found!"));
  return $obj;
  }
$data.=" <tr>
    <td colspan=2 align=center><img src='icons/cancel_icon.png' title='close' onclick=\"xajax_view_programme()\" /> | <img src='icons/print_icon.png' title='print' onclick=\"xajax_print_programme()\" /></td>

  </tr></table>
</td>
  </tr>
 
</table>";
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function viewall_output($subcomponent_id,$div){
$obj=new xajaxResponse();
//$p=2;
$dd="output";
$data=" <table>";
$select="select * from tbl_output where subcomp_id='".$subcomponent_id."' order by output_code asc";
$query=mysql_query($select)or die("aBi Error code: 0187 because,".mysql_error());
//$obj->addAlert($select);
$p=10;
while($row=mysql_fetch_array($query)){
$divoutput=$dd.$row['output_id'];
$data.="<tr>
<td>Output:</td>
    <td class=''><input type='hidden' value='".$row['output_id']."'>".$row['output_code']."</td>
    <td><a href='#output_details' onclick=\"xajax_viewall_activity('".$row['output_id']."','".$divoutput."')\">".$row['output_name']."</a></td>
  </tr>
  <tr>
    <td></td><td class='' colspan=2><div id='".$divoutput."'></div></td>
    
  </tr>";
  //$p++;
  }
  
  $data.="</table>";

$obj->addAssign($div,'innerHTML',$data);
return $obj;
} 


function viewall_activity($output_id,$divoutput){
$obj=new xajaxResponse();
//$p=5;
$ddd="activity";
$data="<table>";
$select="select * from tbl_activity where output_id='".$output_id."' order by activity_code asc";
$query=mysql_query($select)or die("aBi Error code: 0187 because,".mysql_error());
//$obj->addAlert($select);
$p=11;
while($row=mysql_fetch_array($query)){
$divactivity=$ddd.$row['activity_id'];
$data.="<tr>
<td>Activity:</td>
    <td class=''>".$row['activity_code']."</td>
    <td><a href='#subactivity_details' onclick=\"xajax_viewall_subactivity('".$row['activity_id']."','".$divactivity."')\">".$row['activity_name']."</td>
  </tr>
  <tr>
    <td colspan='3'><div id='".$divactivity."'></div></td></tr>";
  //$p++;
  }
  
  $data.="</table>";

$obj->addAssign($divoutput,'innerHTML',$data);
return $obj;
} 
#**********************************************
function viewall_subactivity($activity_id,$divactivity){
$obj=new xajaxResponse();
//$p=12;
$dddd="subactivity"; 
$data=" <table>";
$select="select * from tbl_subactivity where activity_id='".$activity_id."' order by subactivity_code asc";
$query=mysql_query($select)or die("aBi Error code: 0187 because,".mysql_error());
//$obj->addAlert($select);

while($row=mysql_fetch_array($query)){
$divindicator=$dddd.$row['subact_id'];
$data.="<tr>
<td>Sub-Activity:</td>
    <td class=''><input type='hidden' value='".$row['subact_id']."'>".$row['subactivity_code']."</td>
    <td><a href='#subactivity_details' onclick=\"xajax_viewall_indicator('".$row['subact_id']."','".$divindicator."')\">".$row['subactivity_name']."</a></td>
  </tr>
  <tr>
    <td colspan='3'><div id='".$divindicator."'></div></td></tr>
  ";
  //$p++;
  }
  
  $data.="</table>";

$obj->addAssign($divactivity,'innerHTML',$data);
return $obj;
} 
#********************************************
function viewall_indicator($subactivity_id,$divindicator){
$obj=new xajaxResponse();
//$p=13;
//$d="indicator".$p; 
$data=" <table><th COLSPAN=2>Indicator (Logframe)</th>";
$select="select * from tbl_indicator where subactivity_id='".$subactivity_id."' order by indicator_name asc";
$query=mysql_query($select)or die("aBi Error code: 0187 because,".mysql_error());
//$obj->addAlert($select);

while($row=mysql_fetch_array($query)){
$data.="<tr>
    
    <td COLSPAN=2><ul><li>".$row['indicator_name']."</li></ul></td>
  </tr>
  ";
  //$p++;
  }
  $data.="<th colspan=2>DCED MAPPING</th>
  <tr><td>Intervention:</td><td></td></tr>
  <tr><td>Results Chain Level:</td><td></td></tr>
  </table>";

$obj->addAssign($divindicator,'innerHTML',$data);
return $obj;
} 
#********************

#***************************************
function add_programme(){
$obj=new xajaxResponse();
      $data="<form action='".$PHP_SELF."' method='post' name='programme' id='programme' ><table width='557' border='0'>
        <tr>
          <td colspan='3' class='black'><div align='center' class='green_field'>
            <div align='left'>Setup &raquo; New Program</div>
          </div></td><td><input name='' type='button' value='Back' onclick=\"xajax_view_programme('','')\" /></td>
        </tr>";
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
                <td><input name='pname' type='text' id='pname' value='' size='30' /></td>
              </tr>
              <tr>
                <td>Funder:</td>
                <td><input name='pfunder' type='text'  id='pfunder' size='30' /></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><textarea name='pdescription' id='pdescription' cols='45' rows='5'></textarea></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align=right><input type='button' name='button' id='button' value='Save' onclick=\"xajax_save_programme(xajax.getFormValues('programme'));\"></td>
              </tr>
            </table></form>";
           
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_programme($formValues){
$obj=new xajaxResponse();
$pname=$formValues['pname'];
$pfunder=$formValues['pfunder'];
$pdescription=$formValues['pdescription'];
//$xx=str_replace("'","",$x);
 if($pname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Program Name</li>"));
return $obj;
}
if($pfunder==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Funder Name</li>"));
return $obj;
 }

$query="insert into tbl_programme(program_name,Funder,details) values('".$pname."','".$pfunder."','".str_replace("'","",$pdescription)."')";
mysql_query($query)or die("aBi error code 0369: because,".mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>New Program Added!</font>");
$obj->addScriptCall("xajax_view_programme",'','');
return $obj;
}




#************************************************************************************************************************
#view_component
#search_component
#component_details
#add_component
#save_component
#edit_component
#delete_component
#************************************************************************************************************************
function view_component($component,$programme,$funder){
$obj=new xajaxResponse();
 $_SESSION['component']=$component;
  $_SESSION['program_name']=$programme;
  $_SESSION['Funder']=$funder;
$data="<form name='component' id='component' method='post' action='".$PHP_SELF."'><div id='records'><table width='660' border='0' cellspacing='1'>

<tr><td>".filter_component()."</td></tr></table>
<table width='660' border='0' cellspacing='1'><tr class='evenrow'>
    <tH class='black2' colspan=5><DIV align='center'>COMPONENT DETAILS</div></tH>
 

  </tr><tr class='evenrow'>
    <td class='black2'>SELECT</td>
    <td class='black2'>COMPONENT </td>
	<td class='black2'>PROGRAMME </td>
	<td class='black2'>FUNDER </td>
    <td class='black2'>DETAILS</td>

  </tr>";
  $inc=1;

  //$query=mysql_query("select * from view_programme")or die(mysql_error());
  $query=mysql_query("select c.id,c.prog_id,c.component_code,c.component,c.description,p.program_name,p.Funder from tbl_component c inner join tbl_programme p on(c.prog_id=p.prog_id) order by component_code asc")or die("<font color=red>aBi Trust Error:0166, Because ".mysql_error()."</font>");
  //where component_code='".$_SESSION['component_code']."'&& lower(component) like '".strtolower($_SESSION['component'])."' && lower(program_name) like '".strtolower($_SESSION['programme'])."' && lower(Funder) like '".strtolower($_SESSION['funder'])."'   
  $n=1;
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
	  //$_SESSION['id']=$row['id'];
  $data.="<tr class=$color class='black'>
  
    <td><input type='checkbox' name='component_id[]' id='component_id' value='".$row['id']."'></td>
    <td><a href='#component' onclick=\"xajax_component_details('".$row['id']."')\">".$row['component']."</a></td>
	 <td>".$row['program_name']."</td>
	 <td>".$row['Funder']."</td>
    <td>".$row['description']."</td>

  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' TITLE='Edit'   onclick=\"xajax_edit_component(xajax.getFormValues('component'));return false;\" value='Edit'/>| <input type='button' name='Delete' TITLE='Delete' TITLE='Delete'  onclick=\"xajax_delete_component(xajax.getFormValues('component'));return false;\" value='Delete' class='redhdrs'  /></td>
    
	 <td></td>

   

  </tr>";

$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function search_component($component,$programme,$funder){
$obj=new xajaxResponse(); 
  $_SESSION['component']=$component;
  $_SESSION['program_name']=$programme;
  $_SESSION['Funder']=$funder;
$data="<form name='component' id='component' method='post' action='".$PHP_SELF."'><div id='records'><table width='660' border='0'>
<tr><td class='green_field' width='' colspan=6>Setup &raquo; Search Component</td></tr>
<tr><td class='green_field' width='' colspan=6 align=left><hr/ width=660></td></tr>
<tr><td>".filter_component()."</td></tr></table>
<table width='660' border='0'><tr class='evenrow'>
  <td class='black2'>SELECT</td>
	
    <td class='black2'>COMPONENT </td>
	<td class='black2'>PROGRAMME </td>
	<td class='black2'>FUNDER </td>
    <td class='black2'>DETAILS</td>

  </tr>";
  $inc=1;
 
  $select="select * from view_programme where lower(component) like '".strtolower($_SESSION['component'])."' && lower(program_name) like '".strtolower($_SESSION['program_name'])."' && lower(Funder) like '".strtolower($_SESSION['Funder'])."'   order by component asc";
  $query=mysql_query($select)or die("<font color=red>aBi Trust Error:0166, Because ".mysql_error()."</font>");
  //$obj->addAlert($select);
  $n=1;
  if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
  <td><input type='checkbox' name='component_id[]' id='component_id' value='".$row['id']."'></td>
  
    <td><a href='#component' onclick=\"xajax_component_details('".$row['id']."')\">".$row['component']."</a></td>
	 <td>".$row['program_name']."</td>
	 <td>".$row['Funder']."</td>
    <td>".$row['description']."</td>

  </tr>";
  $inc++;
  }}
  /* else{
  $obj->addAlert("No Results Found!");
  return $obj;
  } */
  
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' TITLE='Edit'   onclick=\"xajax_edit_component(xajax.getFormValues('component'));return false;\" value='Edit'/>| <input type='button' name='Delete' TITLE='Delete' TITLE='Delete'  onclick=\"xajax_delete_component(xajax.getFormValues('component'));return false;\" value='Delete' class='redhdrs'  /></td>
    
	 <td></td>

   

  </tr>";

$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

 function component_details($id){
 $obj=new xajaxResponse();
 $query=mysql_query("select c.id,c.prog_id,c.component_code,c.component,c.description,p.program_name from tbl_component c inner join tbl_programme p on(c.prog_id=p.prog_id) where id='".$id."' order by component_code asc")or die("<font color=red>aBi Trust Error:0166, Because ".mysql_error()."</font>");
 while($row=mysql_fetch_array($query)){
 $data="<table width='400' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><DIV style='float:left;'>Setup &raquo; Component Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_component()\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  
  </tr>
  <tr>
    <td>Component:</td>
    <td>$row[component]</td>

  </tr>
  
  <tr>
    <td>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
  <tr>
    <td>Details</td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr>
    <td>Action</td><td colspan=><img src='icons/cancel_icon.png' title='Close' onclick=\"xajax_view_component()\" width='16' height='16' /> | <img src='icons/print_icon.png' width='16' height='16' title='print'  /> </td>


  </tr>
</table>
";}
 $obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
 }

function add_component(){
$obj=new xajaxResponse();
$data="<form name=component id=component action='' method=post><table border='0'>
  <tr>
    <td colspan='2' class='greenlinks'><div style='float:left;'>Setup &raquo; New Component</div><div style='float:right;'><input name='back' value='Back' type='button' onclick=\"xajax_view_component()\" /></div></td>
  </tr>
  <tr>
    <td colspan='2'><hr/></td>
  </tr>
  <tr>
    <td colspan='2'><div id='status'></div></td>
  </tr>
  <tr>
    <td>Programme:</td>
    <td><select name='cprogramme' id='cprogramme'><option value=''>-select-</option>";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					while($row=mysql_fetch_array($query)){
					
					$data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
					
					} 
    $data.="</select></td>
  </tr>
  
  
  <tr>
    <td>Component:</td>
    <td><input name='component' type='text' id='component' size='30' /></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='cdescription' id='cdescription' cols='45' rows='5'></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' name='button' id='button' value='Save' onclick=\"xajax_save_component(xajax.getFormValues('component'))\">
    </div></td>
  </tr>
</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_component($formValues){
$obj=new xajaxResponse();
$cprog=$formValues['cprogramme'];
$ccode=$formValues['component_code'];
$component=$formValues['component'];
$cdesc=$formValues['cdescription']; 
/* if($cprog==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Select Program</li>"));
return $obj;
} */
if($component==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing component</li>"));
return $obj;
}else
/* if($ccode==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter component code</li>"));
return $obj;
} */
$query="INSERT INTO tbl_component(prog_id,component_code,component,description) values('".$cprog."','".$ccode."','".$component."','".str_replace("'","",$cdesc)."')";
mysql_query($query)or die("<font color=red>aBi Error Code: 0257 because,".mysql_error()."</font>");
#$obj->addAlert($query);
$obj->addAssign('bodyDisplay','innerHML',"<font color=green>New Component Added!</font>");
$obj->addScriptCall("xajax_view_component",'','','');
return $obj;
}
 

#**********************************
#VIEW SUB-COMPONENT
#add subcomponent
#save_subcomponent
#search_sub_component
#******************************************************************************************************************************
/* function view_subcomponent($code,$subcomponent,$component,$programme){
$obj=new xajaxResponse();
  $_SESSION['ssubcomponent_code']='';
  $_SESSION['ssubcomponent']='';
  $_SESSION['scomponent']='';
  $_SESSION['sprogramme']='';  
$data="<form name='subcomp' action='".$PHP_SELF."' id='subcomp'><div id='records'><table width='660' border='0'>
<tr><td colspan=4 class=greenlinks>Setup &raquo; View Subcomponents</td></tr>
<tr><td colspan=4 align=left><hr align='left' /></td></tr>".filter_subcomponent()."</table>
<table width='660' border='0'><tr class='evenrow'>
    <td class='black2' colspan=''>SELECT</td>
	<td class='black2' colspan=''>CODE</td>
    <td class='black2'>SUB-COMPONENT</td>
	<td class='black2'>COMPONENT</td>
	<td class='black2'>PROGRAMME</td>
    <td class='black2'>DESCRIPTION</td>
  </tr>";
  $inc=1;
  $query=mysql_query("select * from view_subcomponent order by subcomponent_code asc")or die("<font color=red>aBi Trust Error:053, Because ".mysql_error()."</font>");
  $n=1;
  while($row=mysql_fetch_array($query)){
  $_SESSION['subcomponent_id']=$row['id'];
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
<td><input name='subcomponent_id[]' type='checkbox' value='".$row['id']."' /></td>
    <td><input type='hidden' name='".$row['id']."'>".$row['subcomponent_code']."</td>
    <td><a href='#subcomponent_details' onclick=\"xajax_subcomponent_details('".$row['id']."')\">".$row['subcomponent']."</a></td>
	<td>".$row['component']."</td>
	<td>".$row['program_name']."</td>
     <td>".$row['description']."</td>
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' TITLE='Edit'  TITLE='Delete'  onclick=\"xajax_delete_subcomponent(xajax.getFormValues('subcomp'));return false;\"  value='Delete' class='redhdrs' /></td>
    
	 <td></td>
<td></td>
   

  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */


 function subcomponent_details($id){
 $obj=new xajaxResponse();
 $query=mysql_query("select * from view_subcomponent where id='".$id."' ")or die("aBi Trust Error:0166, Because ".mysql_error());
 while($row=mysql_fetch_array($query)){
 $data="<table width='569' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo; Subcomponent Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subcomponent()\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  <tr>
    <td width='159' class='black2'>Code:</td>
    <td width='168'>$row[subcomponent_code]</td>

  </tr>
  <tr>
    <td class='black2'>Subcomponent:</td>
    <td>$row[subcomponent]</td>

  </tr>
   <tr>
    <td class='black2'>Component:</td>
    <td>$row[component]</td>

  </tr>
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
  <tr>
    <td class='black2'>Details</td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><img src='icons/cancel_icon.png' title='Close' onclick=\"xajax_view_subcomponent('','','','')\" width='16' height='16' /> | <img src='icons/print_icon.png' width='16' height='16' title='print'  /> </td>


  </tr>
</table>
";}
 $obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
 }



function view_subcomponent($code,$subcomponent,$component,$programme){
$obj=new xajaxResponse();
$_SESSION['ssubcomponent_code']=$code;
  $_SESSION['ssubcomponent']=$subcomponent;
  $_SESSION['scomponent']=$component;
  $_SESSION['sprogramme']=$programme;
$data="<form name='subcomp' id='subcomp' action='".$PHP_SELF."'><DIV ID='records'><table width='660' border='0' cellspacing='1'>
".filter_subcomponent()."</table>
<table width='660' border='0' cellspacing='1'><tr class='evenrow'>

		 
		<td colspan=7 class='evenrow3'><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' TITLE='Edit'  TITLE='Delete'  onclick=\"xajax_delete_subcomponent(xajax.getFormValues('subcomp'));return false;\"  value='Delete' class='redhdrs' /></td>

	
	  </tr><tr class='evenrow2'>
    <td class='black2' colspan=''>SELECT</td>
	
    <td class='black2' colspan='5'>SUB-COMPONENT</td>

    <td class='black2'>DETAILS</td>
  </tr>";
  
	 
  
  $inc=1;
  
  
  
  			$select=SetupQueryManager::View_subcomponent($_SESSION['ssubcomponent_code'],$_SESSION['ssubcomponent']);
   			$query=Execute($select)or die(http("View Programme-941"));
  
  
  $n=1;
  //$obj->addAlert($select);
  if(mysql_num_rows($query)>0){
  while($row=FetchRecords($query)){
  $_SESSION['subcomponent_id']=$row['id'];
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
<td><input name='subcomponent_id[]' type='checkbox' value='".$row['id']."' />".$n++."</td>
    <td colspan=5><input type='hidden' name='".$row['id']."'>".$row['subcomponent_code']." <a href='#subcomponent_details' onclick=\"xajax_subcomponent_details('".$row['id']."')\">".$row['subcomponent']."</a></td>
	<!--<td>".$row['component']."</td>
	<td>".$row['program_name']."</td>-->
     <td>".$row['description']."</td>
  </tr>";
  $inc++;
  }}/* }else{
  $obj->addAlert("No Results Found!");
  return $obj;} */
$data.="<tr class=$color>
     
    <td colspan=8><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |  <input type='button' TITLE='Edit'  TITLE='Edit'  onclick=\"xajax_edit_subcomponent(xajax.getFormValues('subcomp'));return false;\" value='Edit' />|  <input type='button' TITLE='Edit'  TITLE='Delete'  onclick=\"xajax_delete_subcomponent(xajax.getFormValues('subcomp'));return false;\"  value='Delete' class='redhdrs' /></td>
      </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function add_subcomponent($prog_id){
$obj=new xajaxResponse();
$_SESSION['sprog_id']=$prog_id;
$data="<form method=post name=subcomponent id=subcomponent><table border='0'>
 <tr>
                      <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; Sub-component</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subcomponent('','','','')\" type='button' /></div></td>
                      
                    </tr>
					<tr>
                      <td colspan='2'><hr/></td>
                    </tr>
					<tr>
                      <td colspan='2'><div id='status'></div></td>
                    </tr>
                    <tr>
                      <td>Programme:</td>
                      <td><select name='programme' id='programme' onChange=\"xajax_reload_programme(getElementById('programme').value);return false;\">";
					  if($_SESSION['sprog_id']!='')
					  $data.="<option value='".$_SESSION['sprog_id']."'>".$_SESSION['sprogramme']."</option><option value=''>-select-</option>";
					  else
					  $data.="<option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['sprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$row['prog_id']."' '".$selected."'>".$row['program_name']."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>
                    <tr>
    <td>Component:</td>
    <td><select name='component_code' id='component_code'><option value=''>-select-</option>";
	
	//prog_id='".$_SESSION['sprog_id']."'
   $query1=mysql_query("select * from tbl_component where prog_id='".$prog_id."'")or die("abi error-code 1011, because, ".mysql_error());
   while($row1=mysql_fetch_array($query1)){
   //$_SESSION['code']=$row1['code'];
   //$ccode=$_SESSION['code']+1.0;
  	$selected=($_SESSION['scomponent_id']==$row1['id'])?"SELECTED":"";
   $data.="<option value='".$row1['id']."' '".$selected."'>".$row1['component']."</option>";
   }
    $data.="</select></td>
  </tr>
    <tr>
    <td>Sub-Component Code:</td>
    <td><input name='subcomponent_code' type='text' id='subcomponent_code' size=40>";
  /*  $query=mysql_query("select subcomponent_code as code from tbl_subcomponent")or die(mysql_error());
   while($row=mysql_fetch_array($query)){
   $_SESSION['code']=$row['code'];
  $ccode=$_SESSION['code']+1.0;
   $data.="<option value='".$ccode."'>".$ccode.".0</option>"; */
  $data.="</td>
  </tr>
       
  
                    <tr>
                      <td>Sub-component Name </td>
                      <td><label>
                        <input name='subcomponent_name' type='text'  id='subcomponent_name' size='40' />
                      </label></td>
                    </tr>
                    <tr>
                      <td height='103'>Description</td>
                      <td><textarea name='scdescript' id='scdescript' cols='45' rows='5'></textarea></td>
                    </tr>
					<tr>
                      <td height='103'></td>
                      <td><input type='button' name='subcomponent' id=subcomponent value=Save onclick=\"xajax_save_subcomponent(xajax.getFormValues('subcomponent'))\"></td>
                    </tr>
                  </table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_subcomponent($formValues){
$obj=new xajaxResponse();
$prog_id=$formValues['programme'];
$component=$formValues['component_code'];
$sub_code=$formValues['subcomponent_code'];
$subcomponent=$formValues['subcomponent_name'];
$details=$formValues['scdescript'];

 /* if($pname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Program Name</li>"));
return $obj;
}
if($pfunder==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Funder Name</li>"));
return $obj;
 } */

$query="insert into tbl_subcomponent(prog_id,component_id,subcomponent_code,subcomponent,description) values('".$prog_id."','".$component."','".$sub_code."','".$subcomponent."','".mysql_real_escape_string($details)."')";
mysql_query($query)or die("aBi error code 1208: because,".mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Sub-component Added!</font>");
$obj->addScriptCall("xajax_view_subcomponent",'','','','');
return $obj;
}


#***********************************
#view output
#add output
#output_details
#save output
#search_output
#**********************************
/* function view_output(){
$obj=new xajaxResponse();
$_SESSION['ooutput_code']=NULL;
  $_SESSION['ooutput_name']=NULL;
  $_SESSION['osubcomponent']=NULL;
  $_SESSION['ocomponent']=NULL;

$data="<form name='output' id='output' action='$PHP_SELF' METHOD='POST'><div id='records'><table width='660' border='0'><tr><td COLSPAN=4 class=greenlinks>Setup &raquo; View Output</td></tr>
<tr><td COLSPAN=4><hr/></td></tr>
".filter_output()."</table><table width='660' border='0'><tr class='evenrow'>
    <td class='black2'>SELECT</td>
	<td class='black2'>SUB-COMPONENT</td>
	<td class='black2' colspan=''>OUTPUT-CODE</td>
	<td class='black2'>OUTPUT</td>
	<td class='black2'>ACTION</td>
 
   
    
  </tr>";
  $inc=1;
  $query=mysql_query("select * from view_output order by output_code asc")or die("<font color=red>aBi Trust Error:053, Because ".mysql_error()."</font>");
  $n=1;

  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
	   //$subcomponent1=$inc%2==1?"#f0e5a5":"#ffffff";
  $data.="<tr class=$color class='black'>
<td><input type='checkbox' name='output_id[]' id='output_id' value='".$row['output_id']."'></td>
 <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>
<td>".$row['output_code']."</td>
    <td><a href='#output_details' onclick=\"xajax_output_details('".$row['output_id']."')\">".$row['output_name']."</td>
	<td><input name='details' type='button' value='Details' title='output_details' onclick=\"xajax_output_details('".$row['output_id']."')\" /></td>
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' TITLE='Delete'  onclick=\"xajax_delete_output(xajax.getFormValues('output'));return false;\" value='Delete' class='redhdrs' /></td>
    
  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
} */

function view_output($code,$output,$subcomponent,$component){
$obj=new xajaxResponse(); 
 $_SESSION['ooutput_code']=$code;
  $_SESSION['ooutput_name']=$output;
  $_SESSION['osubcomponent']=$subcomponent;
  $_SESSION['ocomponent']=$component;
$data="<form name='output' id='output' action='$PHP_SELF' METHOD='POST'><div id='records'><table width='100%' border='0'>
".filter_output()."</table><table width='100%' border='0'><tr class='evenrow'>
<th class='black2'>SELECT</th> 
<th class='black2' colspan='2'>OUTPUT-CODE/OUTPUT<img width='500' height='0'></th>
   <th class='black2'>SUB-COMPONENT <img width='150' height='0'></th>
  
	<th class='black2'>ACTION</th>
    </tr>";
  

  $inc=1;
  $select="select * from view_output where lower(output_code) like '%".strtolower($_SESSION['ooutput_code'])."%' && lower(output_name) like '%".strtolower($_SESSION['ooutput_name'])."%' && lower(subcomponent) like '%".strtolower($_SESSION['osubcomponent'])."%' && lower(component) like '%".strtolower($_SESSION['ocomponent'])."%' order by output_code asc";
 //$obj->addAlert($select);
  $query=mysql_query($select)or die("aBi Trust Error:053, Because ".mysql_error());
  if(@mysql_num_rows($query)>0){
  $n=1;

  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
  
<td><input type='checkbox' name='output_id[]' id='output_id' value='".$row['output_id']."'>".$inc."</td>

<td colspan='2'>".$row['output_code']."
   <a href='#output_details' onclick=\"xajax_output_details('".$row['output_id']."')\">".$row['output_name']."</td>
   <td>".$row['subcomponent']."</td>
     <td><input name='details' type='button' value='Details' title='output_details' onclick=\"xajax_output_details('".$row['output_id']."')\" /></td>

  </tr>";
  $inc++;
  }}
  /* else{
  $obj->addAlert("No Results Found!");
  return $obj;
  } */
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <INPUT type='button' name='edit' TITLE='Edit'  onclick=\"xajax_edit_output(xajax.getFormValues('output'));return false;\" value='Edit' />| <INPUT type='button' TITLE='Delete'  onclick=\"xajax_delete_output(xajax.getFormValues('output'));return false;\" value='Delete' class='redhdrs'  /></td>
<td></td>

  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
} 

function output_details($output_id){
 $obj=new xajaxResponse();
 $query=mysql_query("select * from view_output where output_id='".$output_id."' ")or die("aBi Trust Error:0166, Because ".mysql_error());
 while($row=mysql_fetch_array($query)){
 
 $data="<table width='569' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo; Output Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_output()\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  <tr>
    <td width='159' class='black2'>Output Code:</td>
    <td width='168'>$row[output_code]</td>

  </tr>
  <tr>
    <td class='black2'>Output:</td>
    <td>$row[output_name]</td>

  </tr>
  <tr>
    <td class='black2'>Subcomponent:</td>
    <td>$row[subcomponent]</td>

  </tr>
   <tr>
    <td class='black2'>Component:</td>
    <td>$row[component]</td>

  </tr>
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
   <tr>
    <td class='black2'>Programme:</td>
    <td>$row[details]</td>

  </tr>
  
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><img src='icons/cancel_icon.png' title='Close' onclick=\"xajax_view_output()\" width='16' height='16' /> | <img src='icons/print_icon.png' width='16' height='16' title='print'  /> </td>
  </tr>
</table>
";}
 $obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
 }




function add_output($prog_id){
$obj=new xajaxResponse();
$_SESSION['oprog_id']=$prog_id;
$data="<form name='output' id='output' method=post><table border='0'>
 <tr>
    <td colspan='2' class='greenlinks'><div style='float:left;'>Setup &raquo; New Output</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_output()\" type='button' /></div></td></tr>
  <tr>
  <tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
                      <td>Programme:</td>
                      <td><select name='programme' id='programme' onChange=\"xajax_reload_outputProgramme(getElementById('programme').value);return false;\"><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['oprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$row['prog_id']."' '".$selected."'>".$row['program_name']."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>
                    <tr>
    <td>Component:</td>
    <td><select name='ocomponent' id='ocomponent'><option value=''>-select-</option>";
   $query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['oprog_id']."'")or die(mysql_error());
   while($row=mysql_fetch_array($query)){
   $_SESSION['code']=$row['code'];
   $ccode=$_SESSION['code']+1.0;
  	$selected=$_SESSION['oprog_id']==$row['prog_id']?"SELECTED":"";
   $data.="<option value='".$row['component_id']."' '".$selected."'>".$row['component']."</option>";
   }
    $data.="</select></td>
  </tr>
  <tr>
    <td>Sub-Component</td>
    <td><select name='subcomponent' id='subcomponent'><option value=''>-select-</option>";
      
					  $query = mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['oprog_id']."' order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   }
					      
					  
    $data.="</select>    </td>
  </tr>
  <tr>
    <td>Output Code</td>
    <td><input type='text' name='output_code' id='output_code' size=30 />";
	
	$data.="</td>
  </tr>
  <tr>
    <td>Output Name </td>
    <td><label>
      <input name='oname' type='text' id='oname' size='30' />
    </label></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='odesc' id='odesc' cols='45' rows='5'></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_save_output(xajax.getFormValues('output'))\">
        </p>
      </div></td>
  </tr>
</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_output($formValues){
$obj=new xajaxResponse();
$prog_id=$formValues['programme'];
$ocomponent=$formValues['ocomponent'];
$subcomponent=$formValues['subcomponent'];
$output_code=$formValues['output_code'];
$oname=$formValues['oname'];
$details=$formValues['odesc'];

if($oname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter Output Name</li>"));
return $obj;
}
$query="insert into tbl_output(prog_id,component_id,subcomp_id,output_code,output_name,details) values('".$prog_id."','".$ocomponent."','".$subcomponent."','".$output_code."','".$oname."','".str_replace("'","",$details)."')";
mysql_query($query)or die("aBi error code 120: because,".mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Output Added!</font>");
$obj->addScriptCall("xajax_view_output",'','','','');
return $obj;
}


#**********************************
#view_acivity
#search_activity
#activity_details
#add_activity
#save_activity
#**********************************
/* function view_activity(){
$obj=new xajaxResponse();
$data="<form name='activity' id='activity' method='post' action='".$PHP_SELF."'><DIV id='records'><table width='660' border='0'><tr>
    <td colspan='2' class='greenlinks'>Setup &raquo; View Activity</td></tr>
  <tr>
  <tr>
    <td colspan='2'><hr/></td></tr>
  ".filter_activity()."</table><table width='660' border='0'><tr class='evenrow'>
      <td class='black2'>SELECT</td>
	<td class='black2'>SUB-COMPONENT</td>
		  <td class='black2'>OUTPUT</td>
	  <td class='black2' colspan=''>CODE:</td>
    <td class='black2'>ACTIVITY</td>
<td></td>


  </tr>";
  $inc=1;
  $query=mysql_query("select * from view_activity order by activity_code asc")or die("aBi Trust Error:053, Because ".mysql_error());
  $n=1;

  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
  <td><input name='activity_id[]' type='checkbox' value='".$row['activity_id']."' /></td>
   <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td> 
  <td>".$row['output_code']." ".$row['output_name']."</td>
    <td>".$row['activity_code']."</td>
	<td>".$row['activity_name']."</td>
	<td class='black2'><input name='details' title='activity_details' type='button' value='Details' onclick=\"xajax_activity_details('".$row['activity_id']."')\" /></td>
   
 
     
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_activity(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' src='icons/delete_icon.png' TITLE='Delete' onclick=\"xajax_delete_activity(xajax.getFormValues('activity'));return false;\" value='Delete' class='redhdrs'  /></td>
    
	 <td></td>
<td></td>
   <td></td>

  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */

function view_activity($code,$activity,$output,$subcomponent,$component,$programme){
$obj=new xajaxResponse();
 $_SESSION['activity_code']=$code;
  $_SESSION['activity_name']=$activity;
  $_SESSION['output']=$output;
  $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['component']=$component;
  $_SESSION['program_name']=$programme;
$data="<form name='activity' id='activity' method='post' action='".$PHP_SELF."'><DIV id='records'><table width='100%' border='0' cellspacing='1'>
  ".filter_activity()."</table><table width='100%' border='0' cellspacing='1'>
  <tr class='evenrow'>
     <th class='black2' colspan=''>SELECT</th> <th class='black2' colspan='2'>ACTIVITY<img width='300' height='0'></th>
	   <th class='black2'>OUTPUT<img width='300' height='0'></th>
	   <th class='black2'>SUB-COMPONENT<img width='150' height='0'></th> 
	 

   
	 <th class='black2'>Action</th>
	 

  </tr>";
  $inc=1;
 
  $select="select * from view_activity where lower(activity_code) like '%".strtolower($_SESSION['activity_code'])."%' && lower(activity_name) like '%".strtolower($_SESSION['activity_name'])."%' && lower(output_name) like '%".strtolower($_SESSION['output'])."%' && lower(subcomponent) like '%".strtolower($_SESSION['subcomponent'])."%' && lower(component) like '%".strtolower($_SESSION['component'])."%' && lower(program_name) like '%".strtolower($_SESSION['program_name'])."%' order by activity_code asc";
  $query=mysql_query($select)or die("aBi Trust Error:053, Because ".mysql_error());
  #$obj->addAlert($select);
  $n=1;
if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
    <td><input name='activity_id[]' type='checkbox' value='".$row['activity_id']."' />".$inc."</td>
	 <td colspan='2'>".$row['activity_code']." 	".$row['activity_name']."</td> 
	 <td>".$row['output_code']." ".$row['output_name']."</td> 
	  <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>	
	   
   
<td class='black2'><input name='details' title='activity_details' type='button' value='Details' onclick=\"xajax_activity_details('".$row['activity_id']."')\"/></td>

  </tr>";
  $inc++;
  }}
  /* else {
  #$obj->addAlert("No Results Found!");
  return $obj;
  } */
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_activity(xajax.getFormValues('activity'));return false;\" Value='Edit' />| <input type='button' src='icons/delete_icon.png' TITLE='Delete' onclick=\"xajax_delete_activity(xajax.getFormValues('activity'));return false;\" value='Delete' class='redhdrs'  /></td>
    
	 <td></td>
<td></td>
 

  </tr>";
$data.="</table></div></form>";


$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function activity_details($activity_id){
 $obj=new xajaxResponse();
 $query=mysql_query("select * from view_activity where activity_id='".$activity_id."' ")or die("aBi Trust Error:0166, Because ".mysql_error());
 while($row=mysql_fetch_array($query)){
 
 $data="<table width='569' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo; Activity Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_activity()\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  <tr>
    <td width='159' class='black2'>Activity Code:</td>
    <td width='168'>$row[activity_code]</td>

  </tr>
  <tr>
    <td width='159' class='black2'>Activity:</td>
    <td width='168'>$row[activity_name]</td>

  </tr>
  <tr>
    <td class='black2'>Output:</td>
    <td>$row[output_name]</td>

  </tr>
  <tr>
    <td class='black2'>Subcomponent:</td>
    <td>$row[subcomponent]</td>

  </tr>
   <tr>
    <td class='black2'>Component:</td>
    <td>$row[component]</td>

  </tr>
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
  
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><img src='icons/cancel_icon.png' title='Close' onclick=\"xajax_view_activity()\" width='16' height='16' /> | <img src='icons/print_icon.png' width='16' height='16' title='print' /></td>
  </tr>
</table>
";}
 $obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
 }

function add_activity($prog_id){
$obj=new xajaxResponse();
$_SESSION['aprog_id']=$prog_id;
$data="<form name='activity' id='activity'>
<table border='0'>

  <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo;  New Activity</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_activity()\" type='button' /></div></td>

  </tr>
  <tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
                      <td>Programme:</td>
                      <td><select name='aprogramme' id='aprogramme' onChange=\"xajax_reloadActivityProgramme(getElementById('aprogramme').value);return false;\"><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['aprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$row['prog_id']."' '".$selected."'>".$row['program_name']."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>";
$data.="<tr>
    <td>Component:</td>
    <td><select name='acomponent' id='acomponent'><option value=''>-select-</option>";
$query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['aprog_id']."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['code']=$row['code'];
$selected=$_SESSION['acomponent_id']==$row['id']?"SELECTED":"";
   $data.="<option value='".$row['id']."' '".$selected."'>".$row['component']."</option>";
   }
    $data.="</select></td>
  </tr>";
  //onChange=\"xajax_reloadActivitySubcomponent(getElementById('asubcomponent').value)\"
  $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='asubcomponent' id='asubcomponent'  ><option value=''>-select-</option>"; 
      if($_SESSION['asubcomponent_id1']){
$query11 =@mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['aprog_id']."' && id='".$_SESSION['asubcomponent_id1']."' order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query11)){
					 $SELECTED=($_SESSION['asubcomponent_id1']==$row11['id'])?"SELECTED":"";
$data.="<option value='".$row11['id']."' '".$SELECTED."'>".$row11['subcomponent_code']."  ".$row11['subcomponent']."</option>";
					   } 
					   }
					  
					  else
					    $data.="<option value=''>-select-</option>";
						
					   $query = mysql_query("select * from tbl_subcomponent where prog_id='".$_SESSION['aprog_id']."' order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					      
					
					
					}
    $data.="</select>    </td>
  </tr>";  
  $data.="<tr>
    <td>Output</td>
    <td><select name='aoutput' id='aoutput'><option value=''>-select-</option>";
 if($_SESSION['asubcomponent_id1']!=''){

	   $query=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['asubcomponent_id1']."'  order by output_code  asc")or die(mysql_error());
						  while($row=mysql_fetch_array($query)){
					$data.="<option value='".$row['output_id']."'>".$row['output_code']."  ".$row['output_name']."</option>";	   
					 }
					}
					else{
					$data.="<option value=''>-select-</option>";
					$query=@mysql_query("select * from tbl_output where prog_id='".$_SESSION['aprog_id']."' order by output_code  asc")or die(mysql_error());
						  while($row=mysql_fetch_array($query)){
					$data.="<option value='".$row['output_id']."'>".$row['output_code']."  ".$row['output_name']."</option>";	   }
					} 
						
$data.="
    </select></td>
  </tr>
  <tr>
    <td>Activity Code</td>
    <td><input name='aactivity_code' id='aactivity_code' type='text'  size='45' />";
	
    $data.="e.g 1.1.2</td>
  </tr>
  <tr>
    <td>Activity Name </td>
    <td><label>
      <input name='aactivity_name' type='text' class='' id='aactivity_name' size='45' />
    </label></td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='adescription' id='adescription' cols='42' rows='5'></textarea></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_save_activity(xajax.getFormValues('activity'))\">
        </p>
      </div></td>
  </tr>
</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
} 

function save_activity($formValues){
$obj=new xajaxResponse();
$prog_id=$formValues['aprogramme'];
$acomponent=$formValues['acomponent'];
$asubcomponent=$formValues['asubcomponent'];
$aoutput_code=$formValues['aoutput'];
$aactivity_code=$formValues['aactivity_code'];
$aactivity=$formValues['aactivity_name'];
$adesc=$formValues['adescription'];
if($aactivity_code==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter activity Code Please!</li>"));
return $obj;
}
if($aactivity==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing activity Name</li>"));
return $obj;
}
$query="insert into tbl_activity(prog_id,component_id,subcomp_id,output_id,activity_code,activity_name,details)values('".$prog_id."','".$acomponent."','".$asubcomponent."','".$aoutput_code."','".$aactivity_code."','".$aactivity."','".str_replace("'","",$adesc)."')";
mysql_query($query)or die("aBi error code 120: because,".mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Output Added!</font>");
$obj->addScriptCall("xajax_view_activity",'','','','','','');
return $obj;
}
#***********************************
#view_subacivity
#search_subactivity
#subactivity_details
#add_suactivity
#save_subactivity
#**********************************
/* function view_subactivity(){
$obj=new xajaxResponse();
$data="<form name='subactivity1' id='subactivity1'><div id='records'><table width='660' border='0'><tr><td colspan=2 class='green_field'>Setup &raquo; view Sub-Activity</td></tr>
<tr><td colspan=2><hr/></td></tr>".filter_subactivity()."</table><table width='660' border='0'><tr class='evenrow'>
   <td class='black2' colspan=''>SELECT</td>
   <td class='black2'>SUB-COMPONENT</td>
		<td class='black2'>OUTPUT</td>
		<td class='black2'>ACTIVITY</td>
		 <td class='black2' colspan=''>CODE</td>
	<td class='black2'>SUBACTIVITY</td>
    <td class='black2'></td>

	
   

  </tr>";
  $inc=1;
  $query=mysql_query("select * from view_subactivity order by subactivity_code asc")or die("aBi Trust Error:01372, Because ".mysql_error());
  $n=1;

  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color class='black'>
  <td><input type='checkbox' name='subactivity_id[]' id='subactivity_id' value='".$row['subactivity_id']."'></td>
  <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>
  <td>".$row['output_code']." ".$row['output_name']."</td>  
    <td>".$row['activity_code']." ".$row['activity_name']."</td>
    <td>".$row['subactivity_code']."</td>
	<td>".$row['subactivity_name']."</td>
<td><input name='details' type='button' onclick=\"xajax_subactivity_details('".$row['subactivity_id']."')\"  value='Details'/></td>

	
	
	
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' name='edit' TITLE='Edit' value='Edit' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' name='edit' TITLE='Delete' value='Delete' class='redhdrs' onclick=\"xajax_delete_\" /> </td>
     <td></td>
<td></td>
<td></td>
	 <td></td>
<td></td>
  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */

function view_subactivity($code,$subactivity,$activity,$output,$subcomponent,$component,$programme){

$obj=new xajaxResponse();
	$_SESSION['sacode']=$code;
  	$_SESSION['sasubactivity']=$subactivity;
  	$_SESSION['saactivity']=$activity;
  	$_SESSION['saoutput']=$output;
  	$_SESSION['sasubcomponent']=$subcomponent;
  	$_SESSION['sacomponent']=$component;
  	$_SESSION['saprogramme']=$programme;
$data="<form name='subactivity1' id='subactivity1'><div id='records'><table width='100%' border='0' cellspacing='1'>".filter_subactivity()."</table><table width='100%' border='0' cellspacing='1'>
<tr class='evenrow'>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' />
	 |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_subactivity(xajax.getFormValues('subactivity1'));return false;\" value='Edit' />|
	  <input type='button' TITLE='Delete' value='Delete' class='redhdrs' onclick=\"xajax_delete_subactivity(xajax.getFormValues('subactivity1'));return false;\"  /></td>
    
	 <td></td>
<td></td><td></td>


   
</tr>


<tr class='evenrow'> 

	<th class='black2' colspan='7'><center>sub-activity DETAILS</center</th>
    	
	
   

  </tr>
  </tr>


<tr class='evenrow'> 
<th class='black2' colspan=''>SELECT</th> <th class='black2' colspan='2'>CODE/SUB-ACTIVITY<img width='200' height='0'></th>
<th class='black2'>ACTIVITY<img width='100' height='0'></th>
<th class='black2'>OUTPUT<img width='200' height='0'></th>
<th class='black2'>SUB-COMPONENT<img width='100' height='0'></th>
	<th class='black2'>action</th>
    	
	
   

  </tr>";
  $inc=1;
  $x="select * from view_subactivity where lower(subactivity_code) like '".strtolower($_SESSION['sacode'])."%' && lower(subactivity_name) like '".strtolower($_SESSION['sasubactivity'])."%' &&  lower(activity_name) like '".strtolower($_SESSION['saactivity'])."%' && lower(output_name) like '".strtolower($_SESSION['saoutput'])."%' && lower(subcomponent) like '".strtolower($_SESSION['sasubcomponent'])."%' && lower(component) like '".strtolower($_SESSION['sacomponent'])."%' && lower(program_name) like '".strtolower($_SESSION['saprogramme'])."%' order by subactivity_code asc";
  $query=mysql_query($x)or die("aBi Trust Error:01372, Because ".mysql_error());
  //$obj->addAlert($x);
  $n=1;
if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
  	   $color=$n%2==1?"evenrow":"white";
$data.="<tr class=$color class='black'>
  <td><input type='checkbox' name='subactivity_id[]' id='subactivity_id' value='".$row['subactivity_id']."'>".$inc."</td>
  <td colspan='2'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
     <td>".$row['activity_code']." ".$row['activity_name']."</td>
	  <td>".$row['output_code']." ".$row['output_name']."</td>  
  <td>".$row['subcomponent_code']." ".$row['subcomponent']."</td>
 
 
 
<td><input name='details' type='button' onclick=\"xajax_subactivity_details('".$row['subactivity_id']."')\"  value='Details'/></td>
	
	
	
  </tr>";
  $inc++;
  }}
  else{
  //$obj->addAlert("No Results Found!");
  //return $obj;
  }
$data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' />
	 |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_subactivity(xajax.getFormValues('subactivity1'));return false;\" value='Edit' />|
	  <input type='button' TITLE='Delete' value='Delete' class='redhdrs' onclick=\"xajax_delete_subactivity(xajax.getFormValues('subactivity1'));return false;\"  /></td>
    
	 <td></td>
<td></td><td></td>


   

  </tr>";
$data.="</table></div></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



#****************************************************
function subactivity_details($subactivity_id){
 $obj=new xajaxResponse();
 $query=mysql_query("select * from view_subactivity where subactivity_id='".$subactivity_id."' ")or die("aBi Trust Error:0166, Because ".mysql_error());
 while($row=mysql_fetch_array($query)){
 
 $data="<form name='subactivity1' id='subactivity1' method='post' action='".$PHP_SELF."'><table width='569' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo; Sub-Activity Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subactivity('','','','','','','')\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  <tr>
    <td width='159' class='black2'><INPUT TYPE='hidden' name='subactivity_id[]' id='subactivity_id' value='".$row['subactivity_id']."'>Sub-Activity Code:</td>
    <td width='168'>$row[subactivity_code]</td>

  </tr>
  <tr>
    <td width='159' class='black2'>Sub-Activity:</td>
    <td width='168'>$row[subactivity_name]</td>

  </tr>
  <tr>
    <td width='159' class='black2'>Activity:</td>
    <td width='168'>$row[activity_name]</td>

  </tr>
  <tr>
    <td class='black2'>Output:</td>
    <td>$row[output_name]</td>

  </tr>
  <tr>
    <td class='black2'>Subcomponent:</td>
    <td>$row[subcomponent]</td>

  </tr>
   <tr>
    <td class='black2'>Component:</td>
    <td>$row[component]</td>

  </tr>
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
   <tr>
    <td class='black2'>Description:</td>
    <td>$row[description]</td>

  </tr>
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><img src='icons/cancel_icon.png' title='Close' onclick=\"xajax_view_subactivity()\" width='16' height='16' /> | <img src='icons/edit_icon.png' width='16' height='16' title='edit' onclick=\"xajax_edit_subactivity(xajax.getFormValues('subactivity1'))\" /> | <img src='icons/delete_icon.png' width='16' title='delete' height='16' onclick=\"xajax_delete_subactivity(xajax.getFormValues('subactivity1'))\" /></td>
  </tr>
</table><form>
";}
 $obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
 }


#****************************************************
function dynamicfilter_output($sa,$output){
$obj=new xajaxResponse();
$sa=$_SESSION['sasubcomponent_id'];
$_SESSION['sasubcomponent_code']='';
$_SESSION['sasubcomponent']='';
$_SESSION['saoutput_id']='';
$_SESSION['saoutput_name']='';
$_SESSION['saoutput_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$sa."' && output_id='".$output."'  ")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['sasubcomponent_id']=$row['subcomponent_id'];
$_SESSION['sasubcomponent_code']=$row['subcomponent_code'];
$_SESSION['sasubcomponent']=$row['subcomponent'];
$_SESSION['saoutput_id']=$row['output_id'];
$_SESSION['saoutput_name']=$row['output_name'];
$_SESSION['saoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_subactivity",'','');
return $obj;
}


function dynamicfilter_output_editing($sa,$output){
$obj=new xajaxResponse();
$sa=$_SESSION['esasubcomponent_id'];
$_SESSION['esasubcomponent_code']='';
$_SESSION['esasubcomponent']='';
$_SESSION['esaoutput_id']='';
$_SESSION['esaoutput_name']='';
$_SESSION['esaoutput_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$sa."' && output_id='".$output."'  ")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['esasubcomponent_id']=$row['subcomponent_id'];
$_SESSION['esasubcomponent_code']=$row['subcomponent_code'];
$_SESSION['esasubcomponent']=$row['subcomponent'];
$_SESSION['esaoutput_id']=$row['output_id'];
$_SESSION['esaoutput_name']=$row['output_name'];
$_SESSION['esaoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_edit_subactivity",$subactivity_id);
return $obj;
}



function add_subactivity($prog_id,$subcomponent){
$obj=new xajaxResponse();
$_SESSION['saprog_id']=$prog_id;
$_SESSION['sasubcomponent_id']=$subcomponent;
$data="<form name='subactivity' id='subactivity' method='post'><table border='0'>
 <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; New Sub-activity</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subactivity()\" type='button' /></div></td></tr>
  <tr>
  <tr>
    <td colspan='2'><hr/></td></tr>
  <tr>
  <tr>
    <td colspan='2'><div id='status'></td></tr>
	<tr>
                      <td>Programme:</td>
                      <td><select name='saprogramme' id='saprogramme' onChange=\"xajax_reloadSubactivityProgramme(getElementById('saprogramme').value);return false;\"><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_programme order by program_name asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $selected=$_SESSION['saprog_id']==$row['prog_id']?"SELECTED":"";
					   $data.="<option value='".$row['prog_id']."' '".$selected."'>".$row['program_name']."</option>";
				
					   }
					                   $data.="  </select></td>
                    </tr>
                    <tr>
    <td>Component:</td>
    <td><select name='sacomponent' id='sacomponent'>";
	if($_SESSION['sacomponent_id']!='')
	
   $query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['saprog_id']."'")or die(mysql_error());
   while($row=mysql_fetch_array($query)){
  
  	$selected=$_SESSION['sacomponent_id']==$row['id']?"SELECTED":"";
   $data.="<option value='".$row['id']."' '".$selected."'>".$row['component']."</option>";
   }
    $data.="<option value=''>-select-</option></select></td>
  </tr>";
 $data.="<tr>
    <td>Sub-Component</td>
    <td><select name='sasubcomponent' id='sasubcomponent' onchange=\"xajax_dynamicfilter_subactivity('".$_SESSION['saprog_id']."',getElementById('sasubcomponent').value)\">";
      if($_SESSION['sasubcomponent_id']!='')
	
	$data.="<option value='".$_SESSION['sasubcomponent_id']."'>".$_SESSION['sasubcomponent_code']." ".$_SESSION['sasubcomponent']."</option>";
	
	else
	$data.="<option value=''>-Select-</option>"; 
      
					  $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   }
					     
					  
    $data.="</select>    </td>
  </tr>";
 
  $data.="<tr>
    <td>Output </td>
    <td>
     <select name='saoutput' id='saoutput' onchange=\"xajax_dynamicfilter_output('".$_SESSION['sasubcomponent_id']."',getElementById('saoutput').value)\"><option value=''>-select-</option>";
	 /* if($_SESSION['sasubcomponent_id']&& $_SESSION['saoutput_id']!='')

$data.="<option value='".$_SESSION['output_id']."'>".$_SESSION['output_code']." ".$_SESSION['output_name']."</option>";
else $data."<option value=''>-Select-</option>";  */
	   $query=@mysql_query("select * from view_output where subcomponent_id='".$_SESSION['sasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($row=mysql_fetch_array($query)){
					$data.="<option value='".$row['output_id']."'>".$row['output_code']."  ".$row['output_name']."</option>";	   }
					
					
					/* 
						  else{
						 $data.="<option value=''>-Select-</option>";
						 $query=@mysql_query("select * from tbl_output where subcomp_id='".$_SESSION['sasubcomponent_id']."' order by output_code  asc")or die(mysql_error());
						  while($row=mysql_fetch_array($query)){
					$data.="<option value='".$row['output_id']."'>".$row['output_code']."  ".$row['output_name']."</option>";
						 
						 }} */

	 $data.="</select>
    </td>
  </tr>";
  
  $data.="<tr>
                    <td>Activity</td>
                    <td><select name='saactivity'  id='saactivity'><option value=''>-select-</option>"; 
					if($_SESSION['sasubcomponent_id']&& $_SESSION['saoutput_id']!='')
					$query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['sasubcomponent_id']."' order by activity_code asc")or die(mysql_error());
						  while($row=mysql_fetch_array($query)){
					$data.="<option value='".$row['activity_id']."'>".$row['activity_code']."  ".$row['activity_name']."</option>";	   
			
						 } 
						$data.="</select></td>
                  </tr>";
				 
                  $data.="<tr>
                    <td>Sub-activity Code</td>
                    <td><input type='text' name='subactivity_code' class='' id='subactivity_code' size='43' /> e.g 2.1.1.1</td>
                  </tr>
                  <tr>
                    <td>Sub-activity Name </td>
                    <td><label>
                      <input name='subactivity_name' type='text' class='' id='subactivity_name' size='43' />
                    </label></td>
                  </tr>
				  <tr>
                    <td>Implementer </td>
                    <td><label>
                      <select name='implementer[]' id='implementer' size='' multiple>
					  <option value='All'>All</option>
					  <option value='aBi Trust'>aBi Trust</option>
					  <option value='Finance Manager '>Finance Manager</option>
					  <option value='FSD'>Finance services Development</option>
					    <option value='SPS and QMS Manager'>SPS and QMS Manager</option>
						<option value='Managing Director'>Managing Director</option>
						<option value='Monitoring and Evaluation'>Monitoring and Evaluation</option> 
						<option value='Gender For Growth Manager'>Gender For Growth Manager</option>
						
					  ";
					  $query=mysql_query("select * from tbl_subcomponent order by subcomponent_code")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".ucfirst($row['subcomponent'])."'>".ucfirst($row['subcomponent'])."</option>";
					  
					  }
					  $data.="</select>
                    </label></td>
                  </tr>
				  <tr>
                    <td>Responsible</td>
                   
                      <td><select name='responsible[]' id='responsible' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$sel=($row13['group_name']==$row['responsible'])?"SELECTED":"";
	$data.="<option value='".$row13['group_name']."' '".$sel."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
                  </tr>
                  
				 
				  <tr>
         <td>Remarks</td>
        <td><textarea name='sadetails' id='sadetails' cols='40' rows='5'></textarea></td>
  </tr><tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <p>
        <input type='button' name='output' id='output' value='Save' onclick=\"xajax_save_subactivity(xajax.getFormValues('subactivity'))\">
        </p>
      </div></td>
  </tr>
				  
</table></form>"; 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
#****************************************************
function get_String($getString){
$str="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}
function save_subactivity($formValues){
$obj=new xajaxResponse();
$comp= $_SESSION['component_1'];
$saprog_id=$formValues['saprogramme'];
$sacomponent=$formValues['sacomponent'];
$sasubcomponent=$formValues['sasubcomponent'];
$saoutput=$formValues['saoutput'];
$saactivity=$formValues['saactivity'];


/* function get_String($getString){
$str!="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}
 */
#$obj->addAlert(count($formValues['responsible']).'.......'.count($formValues['implementer']));
 #$obj->addAlert($formValues['responsible'].'.......'.$formValues['implementer']);

$subactivity_code=$formValues['subactivity_code'];
$saname=$formValues['subactivity_name'];
$sadesc=$formValues['sadetails'];
$resp = get_String($formValues['responsible']);
$impl = get_String($formValues['implementer']);
#$obj->addAlert($impl.'.......'.$resp);
//for($x=0;$x<count($formvalues['implementer']);$x++){
//$resp=$formValues['responsible'];
//$impl=$formValues['implementer'];
if($subactivity_code==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Enter subactivity Code</li>"));
return $obj;
}
else if($saname==""){
$obj->addAssign("status","innerHTML",errorMsg("<li>Missing subactivity Name!</li>"));
return $obj;
}else

$query="insert into tbl_subactivity(prog_id,component_id,subcomponent_id,output_id,activity_id,subactivity_code,subactivity_name,responsible,
implementer,description)values('".$saprog_id."','".$sacomponent."','".$sasubcomponent."','".$saoutput."',
'".$saactivity."','".$subactivity_code."','".str_replace("'","",$saname)."','".$resp."','".$impl."','".str_replace("'","",$sadesc)."')";
mysql_query($query)or die("aBi error code 120: because,".mysql_error());
#$obj->addAlert(($query);
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Sub-activity Added!</font>");
$obj->addScriptCall("xajax_view_subactivity",'','','','','','','');
return $obj;
}

#***************************************************
#view_indicator
#add_indicator
#save_indicator
#indicator_details
#search_indicator
#view_DCEDindicator
#search_DCEDindicator
#****************************************************

function view_DCEDindicator(){
$obj = new xajaxResponse();
$n=1; 
$data="<table width=660>
<tr class=''>
    <td colspan='2' scope='cols' class='greenlinks'>Setup &raquo; View Indicator (DCED Standard Mapping)</td>
  </tr>
  <tr class=''>
    <td colspan='2' scope='cols' ><hr/></td>
  </tr>
  ".filter_indicator()."</table>";
$data.="<table width='660' border='0'>

  <tr class='evenrow'>
    <th colspan='8' scope='cols' align=center>INDICATOR DETAILS (DCED Standard Mapping)</td>
   
  </tr>
  <tr class='evenrow'>
  <td CLASS=black2 colspan=2>NO.</td>
  <td CLASS=black2>INDICATOR </td>
    <td CLASS=black2>ITEM </td>
	<td CLASS=black2>ACTIVITY</td>
	<td CLASS=black2>OUTPUT</td>
	<td CLASS=black2>SUB-COMPONENT</td>
	<td CLASS=black2>RESULTS CHAIN LEVEL</td>
	<td CLASS=black2>INTERVENTION</td>

  </tr>";
   $query=mysql_query("select * from Ratio of largest funder to overall revenues order by  subcomponent,component,program_name asc ")or die(mysql_error());
  $inc=1;

  if(mysql_num_rows($query)>0)
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td>".$n++."</td>
  <td><a href='#' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" >".$row['indicator_name']."</a></td>
    <td>".$row['physical_target']."</td>
    
	<td>".$row['activity_name']."</td>
		<td>".$row['output_name']."</td>
			<td>".$row['subcomponent']."</td>
				<td>".$row['resultschain']."</td>
					<td>".$row['intervention']."</td>

  </tr>";
  $inc++; } 
 
$data.="</table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
#*********************************************

function search_DCEDindicator(){
$obj = new xajaxResponse();
$n=1; 
$data="<table width=660>
<tr class=''>
    <td colspan='2' scope='cols' class='greenlinks'>Setup &raquo; View Indicator (DCED Standard Mapping)</td>
  </tr>
  <tr class=''>
    <td colspan='2' scope='cols' ><hr/></td>
  </tr>
  ".filter_DCEDindicator()."</table>";
$data.="<table width='660' border='0'>

  <tr class='evenrow'>
    <th colspan='8' scope='cols' align=center>INDICATOR DETAILS (DCED Standard Mapping)</td>
   
  </tr>
  <tr class='evenrow'>
  <td CLASS=black2>NO.</td> <td CLASS=black2>INDICATOR </td>
    <td CLASS=black2>ITEM </td>
   
	<td CLASS=black2>ACTIVITY</td>
	<td CLASS=black2>OUTPUT</td>
	<td CLASS=black2>SUB-COMPONENT</td>
	<td CLASS=black2>RESULTS CHAIN LEVEL</td>
	<td CLASS=black2>Result</td>

  </tr>";
   $query=mysql_query("select * from view_indicator order by  subcomponent,component,program_name asc ")or die(mysql_error());
  $inc=1;

  if(mysql_num_rows($query)>0)
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td>".$n++."</td>
  <td><a href='#' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" >".$row['indicator_name']."</a></td>
    <td>".$row['physical_target']."</td>
	<td>".$row['activity_name']."</td>
		<td>".$row['output_name']."</td>
			<td>".$row['subcomponent']."</td>
				<td>".$row['resultschain']."</td>
					<td>".$row['intervention']."</td>

  </tr>";
  $inc++; } 
 
$data.="</table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



#*********************************************




#***********************************view_indicator**********filter_indicator()**************************
function view_indicator($indicator_type,$subcomponent,$output,$activity,$subactivity,$target,$indicator,$resultChain,$mapping_type,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
  $inc=1; $n=1;
if($_SESSION['username']==''){
$obj->addRedirect('index.php');
return $obj;
}

//$_SESSION['mapping_type']='';
 #$_SESSION['resultChain']=$resultChain;
$_SESSION['indicatorType']=$indicator_type;
 $_SESSION['subcomponent']=$subcomponent;
  $_SESSION['output']=$output;
  $_SESSION['activity']=$activity;
  $_SESSION['subactivity']=$subactivity;
  $_SESSION['target']=$target;
  $_SESSION['indicator11']=$indicator;
  $_SESSION['resultChain']=$resultChain;
 
  $_SESSION['mapping_type']=$mapping_type;
$indicatorType1=array("DCED"=>"DCED Based","Result"=>"Result Based","Subactivity"=>"Sub Activity Based","ABI"=>"aBi Trust");
$mappingType=array("Aggregation"=>"Primary","Formula"=>"Formula","ABIHighLevel"=>"ABI High Level");
$data.="<fieldset class='evenrow'><form id='indicator_all' name='indicator_all' action='".$PHP_SELF."' method='post' >
<table width='100%' border='0' cellspacing='1'>
".filter_indicator()."
<tr class='evenrow'>
     
    <td colspan=12> <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' />  <iNput type='hidden' TITLE='Edit'  onclick=\"xajax_edit_indicatorLogoframeSubactivity('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" value='Edit' />| <input type='button'  TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDelete(xajax.getFormValues('indicator_all'),'Delete_Indicator','')\"  /></td>
    
	

  </tr>
  <tr class='evenrow2'>
    <tD colspan='13' scope='cols' align=center><B>INDICATOR DETAILS</B></tD>
   
  </tr>
  <tr class='evenrow2'>
  ";
  
  if($_SESSION['indicatorType']==$indicatorType1['DCED'])$data.="<td CLASS=black2 colspan='2' width='10'>SELECT</td>
  <td CLASS=black2>SUB-COMPONENT<img width='120' height='0'></td>
  <td CLASS=black2>RESULTS CHAIN LEVEL <img src='' width='150' height='0.1'></td>
  
  ";
  elseif($_SESSION['indicatorType']==$indicatorType1['Result'])$data.="<td CLASS=black2 colspan='3' width='10'>SELECT</td>";
  elseif($_SESSION['indicatorType']==$indicatorType1['Subactivity'])$data.="<td CLASS=black2 colspan='2' width='10'>SELECT</td>
  <td CLASS=black2>SUB-COMPONENT<img width='120' height='0'></td>
   <td CLASS=black2>RESULTS CHAIN LEVEL <img src='' width='150' height='0.1'></td>
  <td CLASS=black2>SUB-ACTIVITY <img width='200' height='0'></td>";
  
  else $data.="<td CLASS=black2 colspan='2' width='10'>SELECT</td>
  <td CLASS=black2>SUB-COMPONENT<img width='120' height='0'></td>
   <td CLASS=black2>RESULTS CHAIN LEVEL <img src='' width='150' height='0.1'></td>
 ";
  
  
  $data.="
 
  <td CLASS=black2 colspan='2'>RESULTS <img width='150' height='0'></td>
  <td CLASS=black2 colspan='2'>INDICATOR<img width='200' height='0'> </td>
 
  <td CLASS=black2>GENDER DISAGGREGATION</td>


 
  <td CLASS=black2>RESPONSIBLE</td>
    <td CLASS=black2>VARIABLE INDICATOR</td>
	<td CLASS=black2>CUMULATIVE INDICATOR</td>
  <td CLASS=black2 colspan='1'><center>ACTION </center><img src='' width='125' height='0.1'></td>
  </tr>";
  
 /* $_SESSION['programme']=$programme;
  $_SESSION['component']=$component; */
if($_SESSION['indicatorType']=='Sub Activity Based')
  $select="select i.*,t.* from tbl_indicator i
   left join tbl_subactivity t  on(t.subact_id=i.subactivity_id)
  where lower(i.indicator_type) like '".strtolower($_SESSION['indicatorType'])."%'&&
    i.subcomponent_id like '".$_SESSION['subcomponent']."%' &&
   lower( i.output_id) like '".strtolower($_SESSION['output'])."%' &&
	 lower(i.activity_id) like '".strtolower($_SESSION['activity'])."%'&&
	  lower(i.subactivity_id) like '".strtolower($_SESSION['subactivity'])."%' &&
	   lower(i.physical_target) like '".strtolower($_SESSION['target'])."%' && 
	   lower(i.indicator_name) like '".strtolower($_SESSION['indicator11'])."%' 
	   and i.mapping_type like '".$_SESSION['mapping_type']."%' 
	   order by i.subcomponent_id,i.rc_id,t.subactivity_code,i.indicator_name  asc";
	   
	   else if(($_SESSION['indicatorType']=='Result Based')&&($_SESSION['subcomponent']<>''))
	   //
	   $select="select * from tbl_indicator where 
	   lower(indicator_type) like '".strtolower($_SESSION['indicatorType'])."%' 
	   &&  subcomponent_id like '".$_SESSION['subcomponent']."%' &&
   	   lower(physical_target) like '".strtolower($_SESSION['target'])."%' && 
	   lower(indicator_name) like '".strtolower($_SESSION['indicator11'])."%'
	   and mapping_type like '".$_SESSION['mapping_type']."%' 
	   ORDER BY i.subcomponent_id,i.rc_id,indicator_type,indicator_id asc";
	   else if($_SESSION['indicatorType']=='aBi Trust'){
	   $select="SELECT * FROM tbl_indicator WHERE indicator_type LIKE 'aBi Trust%' ORDER BY indicator_type,indicator_id ASC";
}
else 
		$select="SELECT i.*,s.subcomponent_code,s.subcomponent FROM tbl_indicator i 
		left join tbl_subcomponent s on(i.subcomponent_id=s.id) 
		WHERE indicator_type LIKE '".trim($_SESSION['indicatorType'])."%' 
		&& lower(physical_target) like '".trim(strtolower($_SESSION['target']))."%' 
		&& lower(indicator_name) like '".trim(strtolower($_SESSION['indicator11']))."%' 
		and subcomponent_id like '".$_SESSION['subcomponent']."%' 
		and mapping_type like '".$_SESSION['mapping_type']."%' 
		and rc_id like '".$_SESSION['resultChain']."%'
		ORDER BY i.subcomponent_id,i.rc_id,indicator_type,indicator_id ASC";

	   
	    //$query_selection=($_SESSION['indicatorType']=='Sub-Activity Based')?$select:$select2;
		#$obj->addAlert($select);
$query=@mysql_query($select)or die(mysql_error());

$max_records = mysql_num_rows($query);
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($select." limit ".$offset.",".$records_per_page) or die(http(1000)); 
   #$obj->addAlert($select);

 // if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($new_query)){
  $rc=RetrieveData($table='tbl_resultschain',$condition='rc_id',$value=$row['rc_id'],'name');
  $subcomponent=RetrieveData($table='tbl_subcomponent',$condition='id',$value=$row['subcomponent_id'],'subcomponent');
   $subcomponentCode=RetrieveData($table='tbl_subcomponent',$condition='id',$value=$row['subcomponent_id'],'subcomponent_code');
    $subActivity=RetrieveData($table='tbl_subactivity',$condition='subact_id',$value=$row['subactivity_id'],'subactivity_name');
	$subActivityCode=RetrieveData($table='tbl_subactivity',$condition='subact_id',$value=$row['subactivity_id'],'subactivity_code');
   $color=$n%2==1?"evenrow2":"white1";
   $abt=$row['indicator_type']." (".$row['abitrust_category'].")";
   $bitrust_category=($row['indicator_type']=='aBi Trust')?$abt:$row['indicator_type'];
 $data.="<tr class=$color >
   
   <td><input type='radio' name='indicator_idAll[]' id='indicator_idAll'  value='".$row['indicator_id']."' /><input type='hidden' name='indicator_type[]' id='indicator_type' value='".$row['indicator_type']."' ></td>
 ";
 
    
	
	
	 if($_SESSION['indicatorType']==$indicatorType1['Subactivity'])$data.="<td colspan='1'>".$inc++."</td>
	  <td>".$subcomponentCode."".checkExistance($subcomponent,'',$argument3="ExistsString")."</td>
	<td>".checkExistance($rc,'',$argument3="ExistsString")."</td>
	<td>".$subActivityCode." ".checkExistance($subActivity,'',$argument3="ExistsString")."</td>
	 
	 ";
  elseif($_SESSION['indicatorType']==$indicatorType1['DCED'])$data.="<td colspan='1'>".$inc++."</td>
	 <td>".$row['sucomponent_code']."".checkExistance($row['subcomponent'],'',$argument3="ExistsString")."</td>
	<td>".checkExistance($rc,'',$argument3="ExistsString")."</td>
	   ";
  elseif($_SESSION['indicatorType']==$indicatorType1['Result'])$data.="<td colspan='2'>".$inc++."</td>
  	 <td>".$row['sucomponent_code']."".checkExistance($row['subcomponent'],'',$argument3="ExistsString")."</td>
	<td>".checkExistance($rc,'',$argument3="ExistsString")."</td>
  ";
  else $data.="<td colspan='1'>".$inc++."</td>
 	 <td>".$row['sucomponent_code']."".checkExistance($row['subcomponent'],'',$argument3="ExistsString")."</td>
	<td>".checkExistance($rc,'',$argument3="ExistsString")."</td>";
  
   $data.="<td colspan='2'>".$row['physical_target']."</td>
  <td  colspan='2'>".$row['indicator_code']." ".$row['indicator_name']."</td>
  	 <td>".$row['disaggregation']."</td>
	  ";
	  
	 
	  
	  $data.="
<td>".$row['responsible']."</td>
<td><select name='variable' id='variable' onchange=\"xajax_UpdateVariable(this.value,'".$row['indicator_id']."');return false;\" >";

		$data.=QueryManager::LookupFilter($classCode=14,$codeName=$row['variable']);


$data.="</select></td>
<td align='center'><select name='resultsCumulation' id='resultsCumulation' onchange=\"xajax_UpdateCumulativeIndicator(this.value,'".$row['indicator_id']."');return false;\" >";

		$data.=QueryManager::LookupFilter($classCode=17,$codeName=$row['cumulativeIndicator']);


$data.="</select></td>



";
 
	
  $edit=$_SESSION['indicatorType']==$indicatorType1['Subactivity']?"<td> <input type='button' TITLE='Edit'  onclick=\"xajax_edit_indicatorLogoframeSubactivity('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" value='Edit' />":
  "<td> <input type='button' TITLE='Edit'  onclick=\"xajax_edit_indicator('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" value='Edit' />";
  
  
  
  $data.=$edit." | <input name='details' type='button' value='Details' title='details' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" /></td>
  </tr>";
  $n++;  
 }

 /*  }else{
// $obj->addAlert("No results Found!");
 //return $obj;
 } */
$data.=noRecordsFound($query,$colspan='12')."<tr class=evenrow>
     
    <td colspan=6> <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | <input type='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> <iNput type='hidden' TITLE='Edit'  onclick=\"xajax_edit_indicatorLogoframeSubactivity('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" value='Edit' />| <input type='button'  TITLE='Delete' value='Delete' class='redhdrs' onclick=\"ConfirmDelete(xajax.getFormValues('indicator_all'),'Delete_Indicator','')\"  /></td><td colspan=7 align='right'>
 ";
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;

		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','". $_SESSION['mapping_type']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','". $_SESSION['mapping_type']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','". $_SESSION['mapping_type']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','". $_SESSION['mapping_type']."','".$p."','".$records_per_page."');\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_indicator('".$_SESSION['indicatorType']."','".$_SESSION['subcomponent']."','".$_SESSION['output']."','".$_SESSION['activity']."','".$_SESSION['subactivity']."','".$_SESSION['target']."','".$_SESSION['indicator11']."','','". $_SESSION['mapping_type']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

 
 
 
$data.="</table></form></fieldset>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

#***********************************************************************


function add_indicator($prog_id,$indicator_type,$subcomponent){
$obj=new xajaxResponse();
$_SESSION['indicatorType']=$indicator_type;
$_SESSION['indprog_id']=$prog_id;
$_SESSION['indsubcomponent_id']=$subcomponent;
$data="<table width='400' border='0'>
<tr><td colspan='' class='green_field'><div style='float:left;'>Setup &raquo; New Indicator (Logframe Standard) <div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_indicator('','','','','','','')\" type='button' /></div></td><TD align=right><input name='dced' type='hidden' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></TD></tr>
<tr><td colspan='2'><hr/></td></tr>
<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme<img src='' width='100' height='0.1'></td>
                      <td><select name='prog_id' id='prog_id' class='combobox' onchange=\"xajax_reloadIndicatorProgramme(getElementById('prog_id').value);\">
                        ";
						if($_SESSION['indprog_id']<>''){
					  $query=mysql_query("select * from tbl_programme where prog_id='".$_SESSION['indprog_id']."' order by program_name")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value=\"".$row['prog_id']."\">".$row['program_name']."</option>
					   ";
					   }
				}
					  else
					   $data.="<option value='' >-select-</option>";
					 $query=mysql_query("select * from tbl_programme order by program_name")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value=\"".$row['prog_id']."\">".$row['program_name']."</option>";
					   }
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component' class='combobox'>
					  ";
					  if($_SESSION['indprog_id']<>''){
					  
					  $query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['indprog_id']."' order by component")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $sel=($row['id']==$_SESSION['indcomponent_id'])?"":"";
					   $data.="<option value=\"".$row['id']."\">".$row['component']."</option>";
					   }
					   }
					   else
					   $data.="<option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['iprog_id']."' order by component")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value=\"".$row['id']."\">".$row['component']."</option>";
				}
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Indicator Category</td>
                      <td><select name='type_ofindicator' class='combobox' id='type_ofindicator' onchange=\"xajax_check_indicatorType('".$_SESSION['indprog_id']."',getElementById('type_ofindicator').value);\"><option value=''>-select-</option>
					  ";  
					  if($_SESSION['indicatorType']!=''){
				$queryi=mysql_query("select * from tbl_lookup where classCode=2 and codeName like '".$_SESSION['indicatorType']."%' group by codeName order by code asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  $selected=($_SESSION['indicatorType']==$rowi['codeName'])?"SELECTED":"";
					 $data.="<option value=\"".$rowi['codeName']."\" ".$selected." >".$rowi['codeName']."</option>";
					 }
					 }
						  else
						  $data.="<option value=''>-select-</option>";
						  $queryi=mysql_query("select * from tbl_lookup where classCode='2' group by codeName order by code asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  $selected=$_SESSION['indicatorType']==$rowi['codeName']?"SELECTED":"";
					 $data.="<option value=\"".$rowi['codeName']."\" ".$selected.">".$rowi['codeName']."</option>";
					 }
						     
				// onchange=\"xajax_dynamicfilter_indicator('".$_SESSION['indprog_id']."','".$_SESSION['indicatorType']."',getElementById('sub_component').value);return false;\" 
					  $data.="			  
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-Component</td>
                      <td><select name='sub_component'  class='combobox' id='sub_component' onchange=\"xajax_add_indicator('".$_SESSION['indprog_id']."','".$_SESSION['indicatorType']."',getElementById('sub_component').value);return false;\">";
					    if($_SESSION['indsubcomponent_id']!=''){
	
	  $query = mysql_query("select * from tbl_subcomponent where id='".$_SESSION['indsubcomponent_id']."' order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['id']."\">".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   }
	}
	else
	$data.="<option value=''>-Select-</option>"; 
      
					  $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value=\"".$row['id']."\">".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   } 
					      
					  $data.="</select></td>
                    </tr>
					 <tr>
                      <td>Output</td>
                      <td><select name='output_id' class='combobox'  id='output_id' \"><option value=''>-select-</option>
					   ";
						  if($_SESSION['indsubcomponent_id'] && $_SESSION['indoutput_id']!='')
						 $data."<option value=\"".$_SESSION['indoutput_id']."\">".$_SESSION['indoutput_code']." ".$_SESSION['indoutput_name']."</option>"; 
						else 
			
						$data."<option value=''>-select-</option>";
						$query3=@mysql_query("select * from view_output where subcomponent_id='".$_SESSION['indsubcomponent_id']."'  order by output_code aSC")or die(mysql_error());
					
						  while($row=mysql_fetch_array($query3)){
					$data.="<option value=\"".$row['output_id']."\">".$row['output_code']." ".$row['output_name']."</option>";	   
					}
					
					 
						 
						 $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Activity</td>
                      <td><select name='activity' class='combobox' id='activity'><option value=''>-select-</option>";
					   if($_SESSION['indsubcomponent'] && $_SESSION['indoutput'] && $_SESSION['activity_id']!='')
					  $data."<option value='".$_SESSION['indactivity_id']."'>".$_SESSION['indactivity_code']."".$_SESSION['indactivity_name']."</option>";
					  else 
					  $query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['indsubcomponent_id']."' order by activity_code asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					 $_SESSION['act_id']=$row['activity_id'];
					   $data.="<option value=\"".$row['activity_id']."\">".$row['activity_code']." ".$row['activity_name']."</option>";
				
					   }/* 
					      $query2=mysql_query("select * from tbl_activity where output_id='4' order by activity_code asc")or die(mysql_error());
						    while($row=mysql_fetch_array($query2)){
							
							 $data.="<option value='".$row['activity_id']."'>".$row['activity_code']." ".$row['activity_name']."</option>";
							} */
						   
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
                      <td>Sub-Activity</td>
                      <td><select name='subactivity'  class='combobox' id='subactivity'><option value=''>-select-</option>";
					  //if($_SESSION['indsubcomponent']&& $_SESSION['indoutput_id'] && $_SESSION['activity_id']!='')
					  /* $data."<option value='".$_SESSION['indsubactivity_id']."'>".$_SESSION['indsubactivity_code']."".$_SESSION['indsubactivity_name']."</option>";
					  else  * */ 
					    
					 //subactivity_code like '".$_SESSION['subactivity_code']."%'
					  
					  
					//$select2="select * from tbl_subactivity where output_id='".$_SESSION['indoutput_id']."' order by subactivity_code asc";
					  $select="select * from tbl_subactivity where subcomponent_id='".$_SESSION['indsubcomponent_id']."%' order by subactivity_code asc";
					  $query=mysql_query($select)or die(mysql_error());
					 //$obj->addAlert($select2);
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value=\"".$row['subact_id']."\">".$row['subactivity_code']." ".$row['subactivity_name']."</option>";
				
					  } 
					      
					  $data.="
                      </select></td>
                    </tr>
                    <tr>
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
  <tr>
    <th scope='col'>No.</th>
	<th>RESULT CHAIN LEVEL</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
	<th scope='col' colspan='' width='150'>Indicator Type</th>
  </tr>";
  
  
  
  
  
  		for($x=0;$x<1;$x++){
   $data.="<tr class='evenrow'>
   <td>".($x+1)."<input name='loopkey[]' type='hidden' value='1' /></td>
   <td><select name='resultschainlevel[]' id='resultschainlevel' \><oPTION VALUE=''>-select-</option>
					  ";  
					   $data.=QueryManager::ResultsChainFilter($rc_id); 
					        
					  $data.="	 </select> </td>
    <td><input name='target[]' type='text' id='target3' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator3' size='30' /></td>
<td><select name='gender[]' class='button_width' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
	
	<td><select name='mapping_type[]' id='mapping_type' >
	<option value=''/>-select-</option>";
	
			$data.=QueryManager::MappingTypeFilter($programID);
		$data.="</select> </td></tr>";
  
  }
  
  $data.="<tr class='evenrow'>
           
                <td colspan='8' align='right'><input type='button' name='save_indicator' id='button' class='button_width' value='Save' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator'));\" /></td>
         
              </tr>
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";
	//$obj->addAlert($data);
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function check_indicatorType($prog_id,$indicatorType){
$obj=new xajaxResponse();
$_SESSION['indicatorType']=$indicatorType;
$_SESSION['indprog_id']=$prog_id;
//$_SESSION['indsubcomponent_id']=$subcomponent;
if(($_SESSION['indicatorType']=="Results Based")or($_SESSION['indicatorType']=="DCED Based")){

$data="<table width='400' border='0'>
<tr><td colspan='' class='green_field'><div style='float:left;'>Setup &raquo; New Indicator (Logframe Standard)</div> </td><TD align=right><div style='float:left;'>
<input type='button' value'Back' onclick=\"xajax_view_indicator('','','','','','','','','','');return false;\"  ></div><div style='float:right;'><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></div></TD></tr>
<tr><td colspan='2'><hr/></td></tr>
<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id' class='combobox' onchange=\"xajax_reloadResultsBasedIndicatorProgramme(getElementById('prog_id').value)\">
                        ";
						if($_SESSION['indprog_id']!=''){
						 $query=mysql_query("select * from tbl_programme where prog_id='".$_SESSION['indprog_id']."' order by program_name")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
				}
					   }else
					   
						
					  $query=mysql_query('select * from tbl_programme order by program_name')or die("aBi Error code 2617 because, ".mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'  class='combobox'>
					  ";
					  if($_SESSION['indcomponent_id']<>''){
					  
					  $query=mysql_query("select * from tbl_component where prog_id='".$_SESSION['indprog_id']."' order by component")or die("aBi error Code 2631 because, ".mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['id']."'>".$row['component']."</option>";
				}
				}else
				 
					  $query=mysql_query("select * from tbl_component order by component")or die("aBi error code 2637 because,".mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['id']."'>".$row['component']."</option>";
				}
					   
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Indicator Category</td>
                      <td><select name='type_ofindicator' class='combobox' id='type_ofindicator' onchange=\"xajax_check_indicatorType('".$_SESSION['indprog_id']."',getElementById('type_ofindicator').value);\">
					  ";
					   if($_SESSION['indicatorType']!=''){
$queryi=mysql_query("select * from tbl_indicator where indicator_type like '%".$_SESSION['indicatorType']."%' group by indicator_type order by indicator_type asc ")or die("aBi error code 2652 because,".mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					 
					 $data.="<option value='".$rowi['indicator_type']."' >".$rowi['indicator_type']."</option>";
					 }
					 }
					else
					$data.="<option value=''>-select-</option>";
				$queryi=mysql_query("select * from tbl_lookup where classCode=2 order by code asc ")or die("aBi error code 2660 because,".mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  $selected=$_SESSION['indicatorType']==$rowi['codeName']?"SELECTED":"";
		
					 $data.="<option value='".$rowi['codeName']."' '".$selected."'>".$rowi['codeName']."</option>";
					 }
						      
							      
					  $data.="			  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Sub-Component</td>
                      <td><select name='sub_component'  class='combobox' id='sub_component' ><option value='10.0'>All Subcomponents</option>";
					    if($_SESSION['indsubcomponent_id']!='')
	
	$data.="<option value='".$_SESSION['indsubcomponent_id']."'>".$_SESSION['indsubcomponent_code']." ".$_SESSION['indsubcomponent']."</option>";
	
	else
	$data.="<option value=''>-Select-</option>
	<option value='All Subcomponets'>All Subcomponents</option>"; 
      
					  $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code ASC")or die("aBi error code 2680 because,".mysql_error());
					 while($row=mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']."  ".$row['subcomponent']."</option>";
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
                   <tr>
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
  <tr>
    <th scope='col'>No.</th>
	<th>Result Chain Level</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
	<th scope='col' colspan='' width='150'>Indicator Type</th>
  </tr>";
  
  for($x=0;$x<1;$x++){
   $data.="<tr class='evenrow'>
   <td>".($x+1)."<input name='loopkey[]' type='hidden' value='1' /></td>
   
   <td><select name='resultschainlevel[]' id='resultschainlevel' \><oPTION VALUE=''>-select-</option>";
					   $data.=QueryManager::ResultsChainFilter($row['rc_id']); 
					        
					  $data.="</select></td>
   
   
   
    <td><input name='target[]' type='text' id='target3' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator3' size='30' /></td>
<td><select name='gender[]' class='button_width' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
	<td><select name='mapping_type[]' id='mapping_type' >
	<option value=''/>-select-</option>";
	
			$data.=QueryManager::MappingTypeFilter($programID);
		$data.="</select> </td>
  </tr>";
  
  }
  
  
  $data.="<!--<tr class='evenrow'>
    <td>1 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' size='30' /></td>
	<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(http("View_programme-2945"));
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  
  <tr >
   <td>2 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target2' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator2' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  
   <tr class='evenrow'>
   <td>3 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target3' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator3' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  <tr>
   <td>4 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target4' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator4' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  <tr class='evenrow'>
   <td>5 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target5' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator5' size='30' /></td>
	<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='' />-Select-</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>-->";
  
  
  
$data.="</table>
</td>
                    
                   
					
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<!--<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' value='DCED' onclick=\"xajax_DCED_mapping()\" />DCED Mapping</td>
                     
                    </tr>
					<tr>
                      <td colspan='2'><div id='DCED'></div></td>
                     
                    </tr>-->
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr class=''>
              
                <td colspan='10' align='right'><input type='button' name='save_indicator' class='button_width' id='button' value='Save' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator'));\" /></td>
                
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";
}else if($_SESSION['indicatorType']=="Sub-Activity Based"){

	$obj->addScriptCall("xajax_add_indicator",$_SESSION['indprog_id'],$_SESSION['indicatorType'],'');
	return $obj;
	}
/* else if($_SESSION['indicatorType']=="DCED Based"){

	$obj->addScriptCall("xajax_add_indicator",$_SESSION['indprog_id'],$_SESSION['indicatorType'],'');
	return $obj;
	} */

	 else if($_SESSION['indicatorType']=="aBi Trust"){
	$obj->addScriptCall("xajax_add_abiTrustIndicator",$_SESSION['indicatorType']);
	return $obj;
	
	}
	else{
	$obj->addAssign('bodyDisplay','innerHTML',noteMsg("No Match Found!"));
	return $obj;
	}
$obj->addAssign('bodyDisplay','innerHTML',$data);
//$obj->addScriptCall("xajax_add_indicator_activity",$indicatorType);
return $obj;
}


function add_abiTrustIndicator($indicatorType){
$obj= new xajaxResponse();
$_SESSION['indicatorType']=$indicatorType;
//$obj->addAlert($indicatorType);
//$obj->addAlert("ok!");
 $data="<table width='600' border='0'>
<tr><td colspan='' class='green_field'>Setup &raquo; New Indicator (Logframe Standard) </td><TD align=right><div style='float:left;'><input name='back'  value='Back' onclick=\"xajax_view_indicator()\" type='button' /></div><div style='float:left;'><input name='dced' type='button' value='DCED Standard' onclick=\"xajax_add_indicatorDCED()\"/></div></TD></tr>
<tr><td colspan='2'><hr/></td></tr>
<tr><td colspan='2'><div id='status'></div></td></tr>
      <tr>
        <td>
          <form action='".$PHP_SELF."' name='indicator' id='indicator'>
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    <tr>
                      <td>Programme</td>
                      <td><select name='prog_id' id='prog_id'>
                        ";
					  $query=mysql_query('select * from tbl_programme order by program_name')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";
				
					   }
					      
					  $data.="</select></td>
                    </tr>
                   <tr>
                      <td>Component</td>
                      <td><select name='component' id='component'>
					  ";
					  $query=mysql_query('select * from tbl_component order by component')or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					   $data.="<option value='".$row['id']."'>".$row['component']."</option>";
				
					   }
					      
					  $data.="
					  
                      </select></td>
                    </tr>
					 <tr>
                      <td>Indicator Category</td>
                      <td><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_check_indicatorType('".$_SESSION['indprog_id']."',getElementById('type_ofindicator').value);\">
					  ";
					   if($_SESSION['indicatorType']!=''){
$queryi=mysql_query("select * from tbl_indicator where indicator_type like '%".$_SESSION['indicatorType']."%' group by indicator_type order by indicator_type asc ")or die("aBi Error-code:2832 because, ".mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					 
					 $data.="<option value='".$rowi['indicator_type']."' >".$rowi['indicator_type']."</option>";
					 }
					 }
					else
					$data.="<option value=''>-select-</option>";
				$queryi=mysql_query("select * from tbl_lookup where classCode=2 order by code asc ")or die(mysql_error());
					  while($rowi=mysql_fetch_array($queryi)){
					  $selected=$_SESSION['indicatorType']==$rowi['codeName']?"SELECTED":"";
		
					 $data.="<option value='".$rowi['codeName']."' '".$selected."'>".$rowi['codeName']."</option>";
					 }
						      
						       
					  $data.="			  
                      </select></td>
                    </tr>
					<tr>
                      <td width='200'>aBi Trust Category</td>
                      <td><select name='abitrust_category' id='abitrust_category'><option value=''>-select-</option>
					  ";
					  $qu=@mysql_query("select * from tbl_lookup where classCode='3'")or die(mysql_error());    
					 while($rowab=mysql_fetch_array($qu)){
					 $data.="<option value='".$rowab['codeName']."'>".$rowab['codeName']."</option>";
					 }  
					  $data.="			  
                      </select></td>
                    </tr>
					
					
					                   <tr>
					<td></td>
                      <td colspan='1'  align='left' width='300' ><table width='300' border='0'>
  <tr>
    <th scope='col'>No.</th>
    <th scope='col'>Result </th>
    <th scope='col'>Indicator </th>
	<th scope='col' colspan='' width='150'>Gender Disaggregation</th>
	<th scope='col' colspan='' width='150'>Responsible</th>
	<th scope='col' colspan='' width='150'>Expected Output</th>
  </tr>
  <tr class='evenrow'>
    <td>1 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator1' size='30' /></td>
	<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  
  <tr >
   <td>2 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target2' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator2' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  
   <tr class='evenrow'>
   <td>3 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target3' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator3' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  <tr>
   <td>4 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target4' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator4' size='30' /></td>
<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
  <tr class='evenrow'>
   <td>5 <input name='loopkey[]' type='hidden' value='1' /></td>
    <td><input name='target[]' type='text' id='target5' size='20' /></td>
    <td><input name='indicator[]' type='text' id='indicator5' size='30' /></td>
	<td><select name='gender[]' ><option value='No' selected='selected'/>No</option>
	<option value='Yes'/>Yes</option></select> </td>
	<td><select name='reponsible[]' ><option value='Managers' selected='selected' />Managers</option>";
	$q=mysql_query("select * from  tbl_usergroup order by group_name asc")or die(mysql_error());
	while($row13=mysql_fetch_array($q)){
	$data.="<option value='".$row13['group_name']."'/>".$row13['group_name']."</option>";
	
	}
	$data.="</select> </td>
	<td><select name='output[]' ><option value='Quantitative' selected='selected'/>Quantitative</option>
	<option value='Qualitative'/>Qualitative</option></select> </td>
  </tr>
</table>
</td>
                    
                   
					 <tr>
                      <td>Indicator Definition</td>
                      <td><textarea name='definition' id='definition' cols='55' rows='5'></textarea></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                    </tr>
					<tr>
                      <td colspan=2><input name='dced_mapping' id='dced_mapping' type='checkbox' value='DCED' onclick=\"xajax_DCED_mapping()\" />DCED Mapping</td>
                     
                    </tr>
					<tr>
                      <td colspan='2'><div id='DCED'></div></td>
                     
                    </tr>
                  </table>
          </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr>
                <td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input type='button' name='save_indicator' id='button' value='Save' onclick=\"xajax_save_indicator(xajax.getFormValues('indicator'));\" /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4'></td>
              </tr>
            </table>
          </form>
        </td>
      </tr>
    </table>";
 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


#*********************************************************
function DCED_mapping(){
$obj=new xajaxResponse();

  /* $query=mysql_query("select * from tbl_indicator where indicator_id='".$indicator_id."'")or die(mysql_error());
      while($row=mysql_fetch_array($query)){<tr>
                      <td width=100 >Subsector:</td>
                      <td><select name='subsector' id='subsector' multiple='multiple' size='5'><option value=''>-Select-</option>
					  ";
					  $query12=mysql_query("select * from tbl_subsector where subsector <> '' order by subsector_id asc")or die(mysql_error());
					 while($row12=mysql_fetch_array($query12)){
					   $data.="<option value='".$row12['subsector']."'>".$row12['subsector']."</option>";
				
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr> */
$data="
            <table width='535' border='0'>
              <tr>
                <td colspan='3'>
                  <table border='0'>
                    
					<tr>
                      <td width=100 >Intervention:</td>
                      <td><select name='intervention' id='intervention'><option value=''>-Select-</option>
					  ";
					  $query1=mysql_query('select * from tbl_intervention order by intervention asc')or die(mysql_error());
					 while($row1=mysql_fetch_array($query1)){
					   $data.="<option value='".$row1['intervention_id']."'>".$row1['intervention']."</option>";
				
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
						<tr>
                      <td>Results Chain Level:</td>
                      <td><select name='resultschain_level' id='resultschain_level'><option value=''>-Select-</option>
					  ";
					   $query2=mysql_query('select * from tbl_resultschain order by rc_id asc')or die(mysql_error());
					 while($row2=mysql_fetch_array($query2)){
					   $data.="<option value='".$row2['rc_id']."'>".$row2['name']."</option>";
				
					   } 
					      
					  $data.="
					  
                      </select></td>
                    </tr>
                    
              
    </table>";
	//$obj->addAlert($data);
$obj->addAssign('DCED','innerHTML',$data);
return $obj;
}
 
#check view_indicator
#search check_viewindicator
function check_viewIndicatorType($typeOfIndicator){
$obj=new xajaxResponse();
$indicator=mysql_fetch_array(mysql_query("select * from tbl_lookup where code='".$typeOfIndicator."'"))or die("aBi error-code 2936 because,".mysql_error());
$_SESSION['indicatorType']=$indicator['codeName'];
$_SESSION['code']=$indicator['code'];
//$obj->aABTrustddAlert($_SESSION['indicatorType']."RRRRRRRRrrr".$_SESSION['code']);
switch($typeOfIndicator){
case 8:
$obj->addScriptCall("xajax_view_ABTrustIndicators",$_SESSION['indicatorType'],'','','','','');
return $obj;
break;
case 7:
case "Sub-Activity Based":
$obj->addScriptCall("xajax_view_indicator",$_SESSION['indicatorType'],'','','','','','','','','',1,20);
return $obj;
break;
case 6:
case "Results Based":
$obj->addScriptCall("xajax_view_resultsBasedIndicators",$_SESSION['indicatorType'],'','','');
return $obj;
break;
default:
$obj->addScriptCall("xajax_view_indicator",$_SESSION['indicatorType'],'','','','','','','','','',1,20);
//$obj->addAlert($_SESSION['indicatorType']);
$obj->addAssign('bodyDisplay','innerHTML',noteMsg("NO Results Found!"));
return $obj;
//default:
}


$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function view_resultsBasedIndicators($typeOfIndicator){
$obj=new xajaxResponse();
$n=1; 
$data="<table width=660>
<tr class=''>
    <td colspan='2' scope='cols' class='greenlinks'>Setup &raquo; View Indicator (".$_SESSION['indicatorType'].")</td>
  </tr>
  <tr class=''>
    <td colspan='2' scope='cols' ><hr/></td>
  </tr>
".filterActivityBasedIndicator()."
  </table>
  ";
$data.="<table width='660' border='0'>

  <tr class='evenrow'>
    <td class='evenrow2' colspan='9' scope='cols' align=center>INDICATOR DETAILS (".strtoupper($_SESSION['indicatorType']).")</td>
   
  </tr>";
  

   $data.="<tr class='evenrow'>

  <td CLASS=black2>SELECT</td>
    <td CLASS=black2>RESULTTS</td>
	  <td CLASS=black2>INDICATOR</td>
  <td CLASS=black2>SUB-COMPONENT</td>
	<td CLASS=black2>RESULTS CHAIN LEVEL</td>
	<td CLASS=black2>ACTIVITY</td>

  </tr>";
  
 
  //$indicator_type="Results Based";
/* $qq="SELECT i.indicator_id, i.rc_id, i.physical_target, i.indicator_type, i.abitrust_category, i.indicator_name
FROM tbl_indicator i
WHERE lower( indicator_type ) LIKE '".strtolower($_SESSION['indicatorType'])."%' && indicator_name <> ''
ORDER BY i.indicator_id ASC "; */
  //$obj->addAlert($qq);
  
   $query=mysql_query("select i.indicator_id,i.rc_id,i.physical_target,i.indicator_type,i.abitrust_category,i.indicator_name,s.id as subcomponent_id,s.subcomponent,r.rc_id,r.name AS  resultschain,it.intervention_id,it.intervention from tbl_indicator i left join tbl_subcomponent s on(s.id=i.subcomponent_id) left join tbl_intervention it on(it.intervention_id=i.intervention_id) left join tbl_resultschain r on(r.rc_id=i.rc_id) WHERE lower(indicator_type) like '".strtolower($_SESSION['indicatorType'])."%' && indicator_name <> ''order by  s.subcomponent asc ")or die(mysql_error());
  $inc=1;

  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>

  <td><input name='indicator[]' id='indicator' type='checkbox' value='".$row['indicator_id']."' /></td>
    <td>".$row['physical_target']."</td>
    <td><a href='#' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" >".$row['indicator_name']."</a></td>
			<td>".$row['subcomponent']."</td>
				<td>".$row['resultschain']."</td>
					<td>".$row['intervention']."</td>

  </tr>";
  $inc++; }
 
$data.="<tr class=$color>
     
    <td colspan='6'><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_selectIndicator('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" value='Edit' />| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_indicator(xajax.getFormValues('programmeAll'));return false;\"  /></td>
    

<td></td>

   

  </tr>";
$data.="</table>";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_ABTrustIndicators($typeOfIndicator){
$obj=new xajaxResponse();
$n=1; 
$data="<table width=660>
<tr class=''>
    <td colspan='2' scope='cols' class='greenlinks'>Setup &raquo; View Indicator (".$_SESSION['indicatorType'].")</td>
  </tr>
  <tr class=''>
    <td colspan='2' scope='cols' ><hr/></td>
  </tr>
".filterActivityBasedIndicator()."
  </table>
  ";

 
  
$data.="<table width='660' border='0'>

  <tr class='evenrow'>
    <td class='evenrow2' colspan='9' scope='cols' align=center>INDICATOR DETAILS (".strtoupper($_SESSION['indicatorType']).")</td>
   
  </tr>";
  

   $data.="<tr class='evenrow'>
  <td CLASS=black2>NO.</td>
  <td CLASS=black2>SELECT</td>
    <td CLASS=black2>Result</td>
	  <td CLASS=black2>INDICATOR</td>
  <td CLASS=black2>ABI TRUST CATEGORY</td>
	<td CLASS=black2>RESULTS CHAIN LEVEL</td>
	<td CLASS=black2>ACTIVITY</td>

  </tr>";
  
 
  //$indicator_type="Results Based";
  $qq="SELECT i.indicator_id, i.rc_id, i.physical_target, i.indicator_type, i.abitrust_category, i.indicator_name
FROM tbl_indicator i
WHERE lower( indicator_type ) LIKE '".strtolower($_SESSION['indicatorType'])."%' && indicator_name <> ''
ORDER BY i.indicator_id ASC ";
//$obj->addAlert($qq);
  $query=mysql_query($qq)or die("aBi Trust error code: 03368 because ,".mysql_error());
  
  
   //$query=mysql_query("select i.indicator_id,i.rc_id,i.physical_target,i.indicator_type,i.abitrust_category,i.indicator_name,s.id as subcomponent_id,s.subcomponent,r.rc_id,r.name AS  resultschain,it.intervention_id,it.intervention from tbl_indicator i left join tbl_subcomponent s on(s.id=i.subcomponent_id) left join tbl_intervention it on(it.intervention_id=i.intervention_id) left join tbl_resultschain r on(r.rc_id=i.rc_id) WHERE lower(indicator_type) like '".strtolower($_SESSION['indicatorType'])."%' && indicator_name <> ''order by  i.indicator_id asc ")or die(mysql_error());
  $inc=1;

 // if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td>".$n++."</td>
  <td><input name='indicator[]' id='indicator' type='checkbox' value='".$row['indicator_id']."' /></td>
    <td>".$row['physical_target']."</td>
    <td><a href='#' onclick=\"xajax_indicator_details('".$row['indicator_id']."');\" >".$row['indicator_name']."</a></td>
			<td>".$row['abitrust_category']."</td>
				<td>".$row['resultschain']."</td>
					<td>".$row['intervention']."</td>

  </tr>";
  $inc++; }
 
$data.="</table>";


$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


#************************************************
#dynamic filrter dced
function dynamicfilter_indicatorDCED($subcomponent){
$obj=new xajaxResponse();
$_SESSION['indsubcomponent_id']='';
$_SESSION['indsubcomponent_code']='';
$_SESSION['indsubcomponent']='';
$_SESSION['indoutput_id']='';
$_SESSION['indoutput_name']='';
$_SESSION['indoutput_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['indsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['indsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['indsubcomponent']=$row['subcomponent'];
$_SESSION['indoutput_id']=$row['output_id'];
$_SESSION['indoutput_name']=$row['output_name'];
$_SESSION['indoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_indicatorDCED");
return $obj;
}


#************************************************

function dynamicfilter_indicator($prog_id,$indicatorType,$subcomponent){
$obj=new xajaxResponse();
$_SESSION['indprog_id']=$prog_id;
$_SESSION['indicatorType']=$indicatorType;
$_SESSION['indsubcomponent_id']='';
$_SESSION['indsubcomponent_code']='';
$_SESSION['indsubcomponent']='';
$_SESSION['indoutput_id']='';
$_SESSION['indoutput_name']='';
$_SESSION['indoutput_code']='';

$query=mysql_query("select * from view_indicator where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['indprog_id']=$row['prog_id'];
$_SESSION['indcomponent_id']=$row['component_id'];
$_SESSION['indsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['indsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['indsubcomponent']=$row['subcomponent'];
$_SESSION['indoutput_id']=$row['output_id'];
$_SESSION['indoutput_name']=$row['output_name'];
$_SESSION['indoutput_code']=$row['output_code'];
$_SESSION['indicatorType']=$row['indicator_type'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_indicator",$_SESSION['indprog_id'],$_SESSION['indicatorType'],$_SESSION['indsubcomponent_id']);
return $obj;
}

function reloadview_indicator($subcomponent){
$obj=new xajaxResponse();

$_SESSION['rsvsubcomponent_code']='';


$query=mysql_query("select * from tbl_subcomponent where subcomponent_code='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){

$_SESSION['rsvsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['rsvsubcomponent']=$row['subcomponent'];

}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_view_indicator");
return $obj;
}



function dynamicfilter_indicator_output($output){
$obj=new xajaxResponse();
$sa=$_SESSION['indsubcomponent_id'];
$query=mysql_query("select * from view_activity where subcomponent_id='".$sa."' && output_id='".$output."'  ")or die(mysql_error());
while($row=mysql_fetch_array($query)){

$_SESSION['indoutput_id']=$row['output_id'];
$_SESSION['indoutput_name']=$row['output_name'];
$_SESSION['indoutput_code']=$row['output_code'];
$_SESSION['activity_id']=$row['activity_id'];
$_SESSION['indactivity_code']=$row['activity_code'];
$_SESSION['indactivity_name']=$row['activity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_indicator",'','');
return $obj;
}

#dynamic filter DCED




function dynamicfilter_indicator_activity($activity){
$obj=new xajaxResponse();
$sa=$_SESSION['indsubcomponent_id'];
$output=$_SESSION['indoutput_id'];
/*$_SESSION['indsubcomponent_code']='';
$_SESSION['indsubcomponent']='';

$_SESSION['indoutput_name']='';
$_SESSION['indoutput_code']='';
$_SESSION['indactivity_id']='';
$_SESSION['indsubactivity_id']='';
$_SESSION['indsubactivity_name']=''; */
$select="select * from view_subactivity where subcomponent_id='".$sa."' && output_id='".$output."'&& activity_id='".$activity."' order by activity_code asc  ";
$query=mysql_query($select)or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['indsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['indsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['indsubcomponent']=$row['subcomponent'];
$_SESSION['indoutput_id']=$row['output_id'];
$_SESSION['indoutput_name']=$row['output_name'];
$_SESSION['indoutput_code']=$row['output_code'];
$_SESSION['activity_id']=$row['activity_id'];
$_SESSION['indsubactivity_id']=$row['subactivity_id'];
$_SESSION['indsubactivity_name']=$row['subactivity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_indicator",'','');
return $obj;
}




#****************************************************
function indicator_details($indicator_id){
 $obj=new xajaxResponse();
 $sel="select * from view_indicator where indicator_id='".$indicator_id."' ";
 //$obj->addAlert($sel);
 $query=mysql_query($sel)or die("aBi Trust Error:0166, Because ".mysql_error());
 if(mysql_num_rows($query)>0){
 while($row=mysql_fetch_array($query)){
 
 $data="<form name='indicator_details' ID='indicator_details' method='post' action='".$PHP_SELF."' ><table width='569' border='0'>
 <tr>
    <td width='' colspan=2 class=greenlinks><div style='float:left;'>Setup &raquo; Indicator Details</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_indicator()\" type='button' /></div></td>

  </tr>
  <tr>
    <td width='' colspan=2><hr/></td>

  </tr>
  <tr>
    <td width='159' class='black2'>Item:</td>
    <td width='168'>
	
	<input type='hidden' name='indicator_id' id='indicator_id' value='".$row['indicator_id']."' />".$row['physical_target']."</td>

  </tr>
  <tr>
    <td width='159' class='black2'>indicator:</td>
    <td width='168'>".$row['indicator_name']."</td>

  </tr>
 
  <tr>
    <td width='159' class='black2'>Sub-Activity:</td>
    <td width='168'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>

  </tr>
  <tr>
    <td width='159' class='black2'>Activity:</td>
    <td width='168'>$row[activity_name]</td>

  </tr>
  <tr>
    <td class='black2'>Output:</td>
    <td>$row[output_name]</td>

  </tr>
  <tr>
    <td class='black2'>Subcomponent:</td>
    <td>$row[subcomponent]</td>

  </tr>
   <tr>
    <td class='black2'>Component:</td>
    <td>$row[component]</td>

  </tr>
  <tr>
    <td class='black2'>Programme:</td>
    <td>$row[program_name]</td>

  </tr>
  
  </tr>
  <tr class=evenrow2>
    <td>Action</td><td colspan=><input type='button' Value='Back' title='Back' name='Back' onclick=\"xajax_view_indicator('','','','','','','')\" /> | <input type='button' value='Edit' title='edit' onclick=\"xajax_selectIndicator('".$row['indicator_id']."','".$row['indicator_type']."');return false;\" /> </td>
  </tr>
</table></form>
";}}
else
$obj->addAlert("Error.....".mysql_error());
 $obj->addAssign('bodyDisplay','innerHTML',$data);
 
return $obj;
 }


#****************************************************
#dynamicfilter_subcomponent
#dynamic filtersubactivty
#filter_activity
#****************************************************
function dynamicfilter_subactivity($prog_id,$subactivity){
$obj=new xajaxResponse();
$_SESSION['saprog_id']=$prog_id;
$_SESSION['sasubcomponent_id']='';
$_SESSION['sasubcomponent_code']='';
$_SESSION['sasubcomponent']='';
$_SESSION['saoutput_id']='';
$_SESSION['saoutput_name']='';
$_SESSION['saoutput_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$subactivity."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['saprog_id']=$row['prog_id'];
$_SESSION['sasubcomponent_id']=$row['subcomponent_id'];
$_SESSION['sasubcomponent_code']=$row['subcomponent_code'];
$_SESSION['sasubcomponent']=$row['subcomponent'];
$_SESSION['saoutput_id']=$row['output_id'];
$_SESSION['saoutput_name']=$row['output_name'];
$_SESSION['saoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_subactivity",$_SESSION['saprog_id'],$_SESSION['sasubcomponent_id']);
return $obj;
}


function dynamicfilter_subactivity_editing($subactivity){
$obj=new xajaxResponse();
$_SESSION['esasubcomponent_id']='';
$_SESSION['esasubcomponent_code']='';
$_SESSION['esasubcomponent']='';
$_SESSION['esaoutput_id']='';
$_SESSION['esaoutput_name']='';
$_SESSION['esaoutput_code']='';
$_SESSION['esasubactivity_id']='';

$query=mysql_query("select * from view_subactivity where subcomponent_id='".$subactivity."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['esasubactivity_id']=$row['subactivity_id'];
$_SESSION['esasubcomponent_id']=$row['subcomponent_id'];
$_SESSION['esasubcomponent_code']=$row['subcomponent_code'];
$_SESSION['esasubcomponent']=$row['subcomponent'];
$_SESSION['esaoutput_id']=$row['output_id'];
$_SESSION['esaoutput_name']=$row['output_name'];
$_SESSION['esaoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_edit_subactivity",$_SESSION['esasubactivity_id']);
return $obj;
}


function dynamicfilter_subcomponent($subcomponent){
$obj=new xajaxResponse();
$_SESSION['subcomponent_id']='';
$_SESSION['subcomponent_code']='';
$_SESSION['subcomponent']='';
$_SESSION['output_id']='';
$_SESSION['output_name']='';
$_SESSION['output_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['subcomponent_id']=$row['subcomponent_id'];
$_SESSION['subcomponent_code']=$row['subcomponent_code'];
$_SESSION['subcomponent']=$row['subcomponent'];
$_SESSION['output_id']=$row['output_id'];
$_SESSION['output_name']=$row['output_name'];
$_SESSION['output_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_activity");
return $obj;
}

function dynamicfilter_subcomponent_editing($subcomponent){
$obj=new xajaxResponse();
$_SESSION['esubcomponent_id']='';
$_SESSION['esubcomponent_code']='';
$_SESSION['esubcomponent']='';
$_SESSION['eoutput_id']='';
$_SESSION['eoutput_name']='';
$_SESSION['eoutput_code']='';

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['esubcomponent_id']=$row['subcomponent_id'];
$_SESSION['esubcomponent_code']=$row['subcomponent_code'];
$_SESSION['esubcomponent']=$row['subcomponent'];
$_SESSION['eoutput_id']=$row['output_id'];
$_SESSION['eoutput_name']=$row['output_name'];
$_SESSION['eoutput_code']=$row['output_code'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_edit_activity",$activity_id);
return $obj;
}


function reload_programme($prog_id){
$obj=new xajaxResponse();
$_SESSION['sprogramme']='';
$_SESSION['sprog_id']='';
$_SESSION['ssubcomponent_id']='';
$_SESSION['ssubcomponent_code']='';
$_SESSION['ssubcomponent']='';
$_SESSION['scomponent_id']='';
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['sprogramme']=$row['program_name'];
$_SESSION['sprog_id']=$row['prog_id'];
$_SESSION['ssubcomponent_id']=$row['id'];
$_SESSION['scomponent_id']=$row['id'];
$_SESSION['ssubcomponent_code']=$row['ssubcomponent_code'];
$_SESSION['ssubcomponent']=$row['ssubcomponent'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_subcomponent",$prog_id);
return $obj;
}


function reloadIndicatorProgramme($prog_id){
$obj=new xajaxResponse();
$_SESSION['indprogramme']='';
$_SESSION['indprog_id']='';
$_SESSION['indsubcomponent_id']='';
$_SESSION['indsubcomponent_code']='';
$_SESSION['indsubcomponent']='';
$_SESSION['indcomponent_id']='';
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['indprogramme']=$row['program_name'];
$_SESSION['indprog_id']=$row['prog_id'];
$_SESSION['indsubcomponent_id']=$row['id'];
$_SESSION['indcomponent_id']=$row['id'];
$_SESSION['indsubcomponent_code']=$row['ssubcomponent_code'];
$_SESSION['indsubcomponent']=$row['ssubcomponent'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_indicator",$_SESSION['indprog_id'],'','');
return $obj;
}


function reloadResultsBasedIndicatorProgramme($prog_id){
$obj=new xajaxResponse();
$_SESSION['indprogramme']='';
$_SESSION['indprog_id']='';
$_SESSION['indcomponent_id']='';
$_SESSION['indsubcomponent_id']='';
$_SESSION['indsubcomponent_code']='';
$_SESSION['indsubcomponent']='';
$_SESSION['indcomponent_id']='';
$query=mysql_query("select * from tbl_subcomponent where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['indprogramme']=$row['program_name'];
$_SESSION['indprog_id']=$row['prog_id'];
$_SESSION['indcomponent_id']=$row['component_id'];
$_SESSION['indsubcomponent_id']=$row['id'];
$_SESSION['indcomponent_id']=$row['id'];
$_SESSION['indsubcomponent_code']=$row['ssubcomponent_code'];
$_SESSION['indsubcomponent']=$row['ssubcomponent'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_check_indicatorType",$_SESSION['indprog_id'],$_SESSION['indicatorType'],$_SESSION['indsubcomponent_id'],'');
return $obj;
}




function reload_outputProgramme($prog_id){
$obj=new xajaxResponse();
$_SESSION['oprogramme']='';
$_SESSION['oprog_id']='';
$_SESSION['osubcomponent_id']='';
$_SESSION['osubcomponent_code']='';
$_SESSION['osubcomponent']='';
$query=mysql_query("select * from view_output where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['oprogramme']=$row['program_name'];
$_SESSION['oprog_id']=$row['prog_id'];
$_SESSION['osubcomponent_id']=$row['id'];
$_SESSION['osubcomponent_code']=$row['subcomponent_code'];
$_SESSION['osubcomponent']=$row['subcomponent'];
$_SESSION['ooutput_code']=$row['output_code'];
$_SESSION['ooutput_name']=$row['output_name'];
$_SESSION['ooutput_id']=$row['output_id'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_output",$prog_id);
return $obj;
}

function reloadActivityProgramme($prog_id){
$obj=new xajaxResponse();
$_SESSION['aprogramme']='';
$_SESSION['aprog_id']='';
$_SESSION['asubcomponent_id']='';
$_SESSION['acomponent_id']='';
$_SESSION['asubcomponent_code']='';
$_SESSION['asubcomponent']='';
$query=mysql_query("select * from view_output where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['aprogramme']=$row['program_name'];
$_SESSION['aprog_id']=$row['prog_id'];
$_SESSION['acomponent_id']=$row['component_id'];
$_SESSION['asubcomponent_id']=$row['id'];
$_SESSION['asubcomponent_code']=$row['subcomponent_code'];
$_SESSION['asubcomponent']=$row['subcomponent'];
$_SESSION['aoutput_code']=$row['output_code'];
$_SESSION['aoutput_name']=$row['output_name'];
 $_SESSION['aactivity_id']=$row['activity_id'];
 $_SESSION['aoutput_id']=$row['output_id'];
 $_SESSION['aactivity_code']=$row['activity_code'];
 $_SESSION['aactivity_name']=$row['activity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_activity",$prog_id);
return $obj;
}

function reloadActivitySubcomponent($subcomponent){
$obj=new xajaxResponse();

$query=mysql_query("select * from view_output where prog_id='".$_SESSION['aprogramme']."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['aprogramme']=$row['program_name'];
$_SESSION['aprog_id']=$row['prog_id'];
$_SESSION['asubcomponent']=$row['subcomponent'];

$_SESSION['asubcomponent_id1']=$row['id'];
$_SESSION['asubcomponent_code1']=$row['subcomponent_code'];
$_SESSION['asubcomponent1']=$row['subcomponent'];
$_SESSION['aoutput_code1']=$row['output_code'];
$_SESSION['aoutput_name1']=$row['output_name'];
 $_SESSION['aactivity_id1']=$row['activity_id'];
 $_SESSION['aoutput_id1']=$row['output_id'];
 $_SESSION['aactivity_code1']=$row['activity_code'];
 $_SESSION['aactivity_name1']=$row['activity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_activity",$subcomponent);
return $obj;
}








function reloadSubactivityProgramme($prog_id){
$obj=new xajaxResponse();
$_SESSION['saprogramme']='';
$_SESSION['saprog_id']='';
$_SESSION['sacomponent_id']='';
$_SESSION['sasubcomponent_id']='';
$_SESSION['sasubcomponent_code']='';
$_SESSION['sasubcomponent']='';
$_SESSION['saoutput_code']='';
$_SESSION['saoutput_name']='';
 $_SESSION['saactivity_id']='';
 $_SESSION['saoutput_id']='';
 $_SESSION['saactivity_code']='';
 $_SESSION['saactivity_name']='';
  $_SESSION['sasubactivity_id']='';
 $_SESSION['sasubactivity_code']='';
 $_SESSION['sasubactivity_name']='';
$query=mysql_query("select * from view_output where prog_id='".$prog_id."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['saprogramme']=$row['program_name'];
$_SESSION['saprog_id']=$row['prog_id'];
$_SESSION['sacomponent_id']=$row['component_id'];
$_SESSION['sasubcomponent_id']=$row['id'];
$_SESSION['sasubcomponent_code']=$row['subcomponent_code'];
$_SESSION['sasubcomponent']=$row['subcomponent'];
$_SESSION['saoutput_code']=$row['output_code'];
$_SESSION['saoutput_name']=$row['output_name'];
 $_SESSION['saactivity_id']=$row['activity_id'];
 $_SESSION['saoutput_id']=$row['output_id'];
 $_SESSION['saactivity_code']=$row['activity_code'];
 $_SESSION['saactivity_name']=$row['activity_name'];
  $_SESSION['sasubactivity_id']=$row['subactivity_id'];
 $_SESSION['sasubactivity_code']=$row['subactivity_code'];
 $_SESSION['sasubactivity_name']=$row['subactivity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_add_subactivity",$prog_id,'');
return $obj;
}

#--------------------------
#results chain
#interventions

#-----------------------
function view_subsector($subsector){
$obj=new xajaxResponse();
$n=1;$inc=1;
$_SESSION['subsector']=$subsector;

$data="<form name='subsector1' id='subsector1' method='post' action='".$PHP_SELF."'>
<table width='100%' border='0'>
  
 
	".filter_subsector()."



  
  <tr>
    <th colspan='5'><div align='center'>SUB-SECTOR</div></th>
    </tr>
  <tr>
      <th>SELECT</th>
    <th colspan='3'>SUB-SECTOR</th>
	   
		<!--<th>COMPONENT</th>
		<th>PROGRAMME</th>-->
    <th>DETAILS</th>
  </tr>";
  $query=mysql_query("select * from tbl_subsector where subsector like '".$_SESSION['subsector']."%' order by subcomponent_id asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
       $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
        <td><input type='checkbox' name='subsector_id[]' id='subsector_id' value='".$row['subsector_id']."'>".$inc."</td>

    <td colspan='3'><a href='#' onclick=\"xajax_intervention_details('".$row['subsector_id']."')\">$row[subsector]</a></td>
	
	<!-- <td>$row[component]</td>
	 <td>$row[program_name]</td>-->
	 <td>$row[details]</td>
  </tr>";
  $inc++;
  }

$data.="<tr bgcolor='$color'>
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit' onclick=\"xajax_edit_subsector(xajax.getFormValues('subsector1'));return false;\" value='Edit'  />| <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('subsector1'),'subsector1','');return false;\" value='Delete' class='redhdrs'  /></td>
    
	
<td></td>
  </tr></table></FORM>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

/* function search_subsector($subsector){
$obj=new xajaxResponse();
$n=1;$inc=1;
$data="
 <table width='660' border='0'>
  
  <tr>
    <td colspan='6' class='green_field'>Setup &raquo;Sub-sector</td>
    </tr>
	<tr>
    <td colspan='6'><hr></td>
    </tr>
	".filter_subsector()."
	</table>
	<div id='records'>
<form name='subsector' id='subscetor' method='post' action='".$PHP_SELF."'>
 <table width='660' border='0'>
  
  <tr>
    <th colspan='6'><div align='center'>SUB-SECTOR</div></th>
    </tr>
  <tr>
      <th>SELECT</th>
    <th>SUB-SECTOR</th>
	    <th>SUB-COMPONENT</th>
		<th>COMPONENT</th>
		<th>PROGRAMME</th>
    <th>DETAILS</th>
  </tr>";
  $_SESSION['subsector']=$subsector;
  $query=mysql_query("select * from view_intervention where lower(intervention) like '".strtolower( $_SESSION['subsector'])."' order by intervention asc")or die(mysql_error());
  if(mysql_num_rows($query)==0){
  $obj->addAlert("No results Found!");
  return $obj;
  }
  else
  while($row=mysql_fetch_array($query)){
       $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
      <td><input type='checkbox' name='subsector_id[]' id='subsector_id' value='".$row['intervention_id']."'></td>

    <td><a href='#' onclick=\"xajax_intervention_details('".$row['intervention_id']."')\">$row[intervention]</a></td>
	 <td>$row[subcomponent]</td>
	 <td>$row[component]</td>
	 <td>$row[program_name]</td>
	 <td>$row[details]</td>
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\"  value='check all' /> |<input type='button' onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> | <img src='icons/edit_icon.png' TITLE='Edit'  onclick=\"xajax_edit_subsector(xajax.getFormValues('subsector'));return false;\" width='16' height='16' />| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_subsector(xajax.getFormValues('subsector'));return false;\"  /></td>
    
	 <td></td>
<td></td>

   

  </tr>";
$data.="</table></form></div>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */
 
 
 
 function add_intervention(){
$obj=new xajaxResponse();
$data=" <form name='intervention' id='intervention' method='post' action='".$PHP_SELF."'><table width='660' border='0'>
  <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; New intervention</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_intervention('')\" type='button' /></div></td>
    </tr>
	<tr>
    <td colspan='2'><hr></td>
    </tr>
	<tr>
    <td colspan='2'><div id='status'></div></td>
    </tr>
	 <tr>
    <td>Programme:</td>
    <td><select name='programme' >";
	$query=mysql_query("select * from tbl_programme order by program_name")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Component:</td>
    <td><select name='component' >";
	$query=mysql_query("select * from tbl_component order by component")or die(mysql_error());
	while($row2=mysql_fetch_array($query)){
	$data.="<option value='".$row2['id']."'>".$row2['component']."</option>";}
	$data.="</select></td>
  </tr>
 
  <tr>
    <td>Subsector:</td>
    <td><select name='subsector' >";
	$query=mysql_query("select * from tbl_subsector where subsector <> '' order by subsector_id asc")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$data.="<option value='".$row['subsector_id']."'>".$row['subsector']."</option>";}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Organization:</td>
    <td><select name='organization' ><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_organization where orgName <> '' order by orgName asc")or die(mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value='".$row1['org_code']."'>".substr($row1['orgName'],0,70)."</option>";}
	$data.="</select></td>
  </tr>
   <tr>
    <td>Intervention:</td>
    <td><textarea name='intervention' cols='40' rows='3'></textarea></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='idesc' cols='40' rows='3'></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input name='save_subsector' type='button' value='Save' onclick=\"xajax_save_intervention(xajax.getFormValues('intervention'))\" /></td>
  </tr>
</table></form>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function add_subsector(){
$obj=new xajaxResponse();
$data=" <form name='subsector1' id='subsector1' method='post' action='".$PHP_SELF."'><table width='660' border='0'>
  <tr>
    <td colspan='2' class='green_field'><div style='float:left;'>Setup &raquo; New Subsector</div><div style='float:right;'><input name='back'  value='Back' onclick=\"xajax_view_subsector('')\" type='button' /></div></td>
    </tr>
	<tr>
    <td colspan='2'><hr></td>
    </tr>
	<tr>
    <td colspan='2'><div id='status'></div></td>
    </tr>
	 <tr>
    <td>Programme:</td>
    <td><select name='programme' >";
	$query=mysql_query("select * from tbl_programme order by program_name")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$data.="<option value='".$row['prog_id']."'>".$row['program_name']."</option>";}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Component:</td>
    <td><select name='component' >";
	$query=mysql_query("select * from tbl_component order by component")or die(mysql_error());
	while($row=mysql_fetch_array($query)){
	$data.="<option value='".$row['id']."'>".$row['component']."</option>";}
	$data.="</select></td>
  </tr>
 
  <tr>
    <td>Subsector name:</td>
    <td><input name='subsector' id='subsector' type='text' size='40'></td>
  </tr>
  
  <tr>
    <td>Description:</td>
    <td><textarea name='idesc' cols='40' rows='3'></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  
  <tr>
    <td></td>
    <td><input name='save_subsector' type='button' value='Save' onclick=\"xajax_save_subsector(xajax.getFormValues('subsector1'))\" /></td>
  </tr>
</table></form>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function save_subsector($formvalues){
$obj=new xajaxResponse();
$programme=$formvalues['programme'];
$component=$formvalues['component'];
$subsector=$formvalues['subsector'];
#$subcomponent=$formvalues['subcomponent'];
$idesc=$formvalues['idesc'];
if($subsector==""){
$obj->addAssign("status","innerHTML",errorMsg("Enter subsector Name"));
return $obj;
}
else

$x="insert into tbl_subsector(prog_id,component_id,subsector,details)values('".$programme."','".$component."','".str_replace("'","",$subsector)."','".str_replace("'","",$idesc)."')";
#$obj->addAlert($x);
$query=mysql_query($x)or die("aBi Error Code 0223 because of ".mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color=green>Subsector added.</font>");
$obj->addScriptCall("xajax_view_subsector",'');
return $obj;
}


#******************************************************
 function view_resultschain_level(){
$obj=new xajaxResponse();
$data="<form name='rchain' id='rchain' method='post' action='".$PHP_SELF."'><table width='660' border='0'>
  
	".filter_resultschain()."
	</table> <table width='660' border='0'>
  
  <tr>
    <th colspan='3'><div align='center'>RESULTS CHAIN</div></th>
    </tr>
  <tr>
      <th>NO.</th>
    <th align=left>RESULTS CHAIN</th>
    <th>DETAILS</th>
  </tr>";
  $inc=1;
  $query=mysql_query("select * from tbl_resultschain order by rc_id")or die(http("4299"));
  while($row=mysql_fetch_array($query)){
     $color=$n%2==1?"evenrow":"white";
  
  $data.="<tr class=$color>
  
      <td>
	  <input name='rcl_id[]' id='rcl_id' type='checkbox' value='".$row['rc_id']."'/></td>
    <td><a href='#results_chaindetails onclick=\"xajax_resultschain_details('".$row['rc_id']."')\">$row[name]</a></td>

    <td>$row[details]</td>
  </tr>";
  $inc++;}
$data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input  type='button' TITLE='Edit'  onclick=\"xajax_edit_resultschain(xajax.getFormValues('rchain'));return false;\" width='16' height='16' Value='Edit' />|
	<input  type='button' TITLE='Delete' width='16' height='16' onclick=\"xajax_delete_resultsChain(xajax.getFormValues('rchain'));return false;\" value='Delete'  /></td>

   

  </tr>";
$data.="</table></form";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
} 

function view_intervention($intervention){
$obj=new xajaxResponse();
$_SESSION['intervention']=$intervention;
$data="<form name='rchain' id='rchain' method='post' action='".$PHP_SELF."'><table width='100%' border='0'>
  
  
	
  ".filter_intervention()."
  <tr>
    <th colspan='6'><div align='center'>Projects/Interventions</div></th>
    </tr>
  <tr>
      <th WIDTH='5'>SELECT</th>
    <th align=left width='300' >Project Title<img width='200' height='0'></th>
	<th align=left width='' >ORGANIZATION<img width='150' height='0'></th>
	<th width='50'>SUB-SECTOR<img width='80' height='0'></th>
    <th width='' colspan=2>DETAILS<img width='200' height='0'></th>
  </tr>";
  $inc=1;
$xx="select i.intervention_id,i.prog_id,i.component_id,i.org_code,o.orgName,i.intervention,i.subsector as subsector_id,s.subsector,
 i.details from tbl_intervention i left join tbl_subsector s on(i.subsector=s.subsector_id) inner join tbl_organization o on(o.org_code=i.org_code) where lower(i.intervention) like '".strtolower($_SESSION['intervention'])."%' order by s.subsector";
  $query=mysql_query($xx)or die(mysql_error());
 /*  if(@mysql_num_rows($query)==0){
  $obj->addAlert('No results Found!');
  return $obj;
}
else */  
  while($row=mysql_fetch_array($query)){
     $color=$n%2==1?"evenrow":"white";
  
  $data.="<tr class=$color>
  
      <td>
	  <input name='intervention_id[]' id='intervention_id' type='checkbox' value='".$row['intervention_id']."'/>".$inc."</td>
    <td width='200'><a href='#intervnetion_details onclick=\"xajax_intervention_details('".$row['intervnention_id']."')\">$row[intervention]</a></td>
	<td width='200'>$row[orgName]</td>
<td width='100'>$row[subsector]</td>
    <td width='200' colspan=''>$row[details]</td>
  </tr>";
  $inc++;}
$data.="<tr class='evenrow'>
     
    <td colspan=6><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit' value='Edit'  onclick=\"xajax_edit_intervention(xajax.getFormValues('rchain'));return false;\" />| <input type='button' TITLE='Edit' value='Delete' TITLE='Delete' class='redhdrs' onclick=\"ConfirmDelete(xajax.getFormValues('rchain'),'intervention','');return false;\"  /></td>

   

  </tr>";
$data.="</table></FORM>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function add_resultschain(){
$obj=new xajaxResponse();
$data=" <form name='resultschain' id='resultschain' ><table width='660' border='0'>
  <tr>
    <td colspan='2' class='green_field'>Setup &raquo;New Intervention</td>
    </tr>
	<tr>
    <td colspan='2'><hr></td>
    </tr>
	<tr>
    <td colspan='2'><div id='status'></div></td>
    </tr>
	<tr>
    <td>Sub-sector:</td>
    <td><select name='subsector_id' size='1'>";
	$q=mysql_query("select * from tbl_subsector where subsector <> '' order by subsector_id asc")or die("abi error-code 4090 because,".mysql_error());
	while($row=mysql_fetch_array($q)){
	$data.="<option value='".$row['subsector_id']."'>".$row['subsector']."</option>";
	
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Intervention name:</td>
    <td><textarea name='intervention' cols='40' rows='3'></textarea></td>
  </tr>
  <tr>
    <td>Description:</td>
    <td><textarea name='desc' cols='40' rows='3'></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td></td>
    <td><input name='' type='button' value='Save' onclick=\"xajax_save_intervention(xajax.getFormValues('resultschain'))\" /></td>
  </tr>
</table></form>";

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




//-----------vIEW INDICATOR dEFINTION-----------------







$xajax->processRequests();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />

<title><?php heading($_GET['action']); ?></title>
<script type="text/javascript" src="js/js.js"></script>
<script language="javascript" type="text/javascript" src="js/check.js">

/* function selectAll(){
t=document.forms[0].length;
for(i=0; i<t; i++) document.forms[0][i].checked=document.forms[0][0].checked;
}
 */
 <!--

		  function show_row()
		  {
			  if (document.getElementById("dced").style.display == 'none')
			  {
				document.getElementById("dced").style.display = 'inline';
				  document.getElementById("dced_mapping").checked = true;
			  } else {
				document.getElementById("dced").style.display = 'none';
				  document.getElementById("dced_mapping").checked = false;
			  }
		  }
		  
		  function show_row_1()
		  {
			  if (document.getElementById("dced").style.display == 'inline')
			  {
				document.getElementById("dced").style.display = 'none';
				  document.getElementById("dced_mapping").checked = false;
			  } 
		  }
		  
		

function addRowToTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  // if there's no header row in the table, then iteration = lastRow + 1
  var iteration = lastRow-0;
  var row = tbl.insertRow(lastRow);
  
  // left cell
  var cellLeft = row.insertCell(0);
  var textNode = document.createTextNode(iteration);
  cellLeft.appendChild(textNode);
  
  // right cell
  var cellRight = row.insertCell(1);
  var el = document.createElement('input');
  el.type = 'text';
  el.name = 'txtRow' + iteration + 1;
  el.id = 'txtRow' + iteration;
  el.size = 50;

  
  el.onkeypress = keyPressTest;
  cellRight.appendChild(el);

 
}
function keyPressTest(e, obj)
{
  var validateChkb = document.getElementById('chkValidateOnKeyPress');
  if (validateChkb.checked) {
    var displayObj = document.getElementById('spanOutput');
    var key;
    if(window.event) {
      key = window.event.keyCode; 
    }
    else if(e.which) {
      key = e.which;
    }
    var objId;
    if (obj != null) {
      objId = obj.id;
    } else {
      objId = this.id;
    }
    displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
  }
}

function removeRowFromTable()
{
  var tbl = document.getElementById('tblSample');
  var lastRow = tbl.rows.length;
  if (lastRow > 2) tbl.deleteRow(lastRow - 1);
}

function validateRow(frm)
{
  var chkb = document.getElementById('chkValidate');
  if (chkb.checked) {
    var tbl = document.getElementById('tblSample');
    var lastRow = tbl.rows.length - 1;
    var i;
    for (i=1; i<=lastRow; i++) {
      var aRow = document.getElementById('txtRow' + i);
      if (aRow.value.length <= 0) {
        alert('Row ' + i + ' is empty');
        return;
      }
    }
  }
  //openInNewWindow(frm);
}
-->
</SCRIPT>





</head>

<body>

<table width="101%" border="0" align="center" id="container_table">
  <tr>
    <td width="994"><table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></tr>
  <tr>
    <td width="190" valign="top"><?php require_once('connections/left_links.php'); ?></td>
    <td width="660" valign="top"  > 
    <?php title($_GET['linkvar'],$_GET['action']);   ?>
    
    
    <div id='bodyDisplay'> <script language='javascript' type='text/javascript'> 
		  <?php if($_GET['linkvar']=='Component') {  ?>
			xajax_view_component('','','');
<?php 

}else if($_GET['linkvar']=='Sub-Component') {  ?>
xajax_view_subcomponent('','','','');
<?php 

}else if($_GET['linkvar']=='Output') {  ?>
xajax_view_output('','','','');
<?php 

}else if($_GET['linkvar']=='Activity') {  ?>
xajax_view_activity('','','','','','');
<?php 

}else if($_GET['linkvar']=='Sub-Activity') {  ?>
xajax_view_subactivity('','','','','','','');
<?php 

}else if($_GET['linkvar']=='View Indicator') {  ?>
xajax_view_indicator('','','','','','','','','',1,20);
<?php 

}else if($_GET['linkvar']=='Subsector') {  ?>

xajax_view_subsector('');

<?php 

}
elseif($_GET['linkvar']=='Result Chain Level'){
?>

xajax_view_resultschain_level('');

<?php 


}


else if($_GET['linkvar']=='Intervention') {  ?>

xajax_view_intervention('');

<?php 
  }else {?> 
  //xajax_add_abiTrustIndicator('');
		  xajax_view_programme('','');
		  <?php } ?>
		  </script>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php  require_once('connections/footer.php'); ?></td>
    </tr>
</table></td>

</td>
  </tr>
</table>

</td>
  </tr>
</table>
</div>
</body>
</html>
