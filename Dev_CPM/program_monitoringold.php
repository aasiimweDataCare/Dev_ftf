<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.2.4/xajax.inc.php');
require_once('filters.php');
//require_once('organization.php');
$xajax = new xajax();
$xajax->errorHandlerOn();
//
#xajax register function
$xajax->registerFunction('view_activityBasedIndicator');
$xajax->registerFunction('view_activityBasedReport');
$xajax->registerFunction('selectActivityBasedReporting');
#--------value chain development-------------
$xajax->registerFunction('new_valueChainDevelopment');
$xajax->registerFunction('view_valueChainDevelopmentAnnualTargetvsActuals');
$xajax->registerFunction('new_valueChainDevelopment_Manager');
$xajax->registerFunction('view_valueChainDevelopment');
#=========dced===========================================
$xajax->registerFunction('view_DCEDvalueChainDevelopment');
$xajax->registerFunction('new_DCEDvalueChainDevelopment');
$xajax->registerFunction('view_DCEDQualitativeannualActual');
$xajax->registerFunction('edit_DCEDQualitativeannualActual');
$xajax->registerFunction('update_DCEDAnnualActual');
$xajax->registerFunction('Delete_DCEDAnnualActual');
$xajax->registerFunction('view_DCEDvalueChainDevelopment_Manager');
$xajax->registerFunction('new_DCEDvalueChainDevelopment_Manager');
$xajax->registerFunction('view_DCEDQualitativeActual_Manager');
$xajax->registerFunction('edit_DCEDQualitativeActual_Manager');
$xajax->registerFunction('Delete_DCEDAnnualActual_Manager');
$xajax->registerFunction('update_DCEDAnnualActual_Manager');
$xajax->registerFunction('view_DCEDvalueChainDevelopmentAnnualTargetvsActuals');
$xajax->registerFunction('view_organizationsReported');

#$xajax->registerExternalFunction("view_DCED","workplan.php");
#==========================================================
$xajax->registerFunction('view_valueChainDevelopment_Manager');
$xajax->registerFunction('view_valueChainFinancialActuals_Manager');
$xajax->registerFunction('new_valueChainFinancialActuals_Manager');
$xajax->registerFunction('switchManagerValueChainQuarterlyReporting');
$xajax->registerFunction('search_valueChainDevelopment');
$xajax->registerFunction('save_valueChainDevelopment');
$xajax->registerFunction('edit_valueChainDevelopment');
$xajax->registerFunction('update_valueChainDevelopment');
$xajax->registerFunction('delete_valueChainDevelopment');
$xajax->registerFunction('delete_ConfirmedComponent');
//$xajax->registerFunction('view_lineofcredit');
#financial services
$xajax->registerFunction('new_financialServices');
$xajax->registerFunction('select_financialServices');
$xajax->registerFunction('choose_financialServices');
$xajax->registerFunction('view_financialServices');
$xajax->registerFunction('searchFinancialServices');
$xajax->registerFunction('save_financialServices');
#spsQMS
$xajax->registerFunction('new_spsQMS');
$xajax->registerFunction('view_spsQMS');
$xajax->registerFunction('search_spsQMS');
$xajax->registerFunction('save_spsQMS');
$xajax->registerFunction('new_genderForGrowth');
$xajax->registerFunction('view_genderForGrowth');
$xajax->registerFunction('save_g4g');
$xajax->registerFunction('new_test');
$xajax->registerFunction('new_calc');
#functions
#registering functions
#************************
//lineofcredit
$xajax->registerFunction('edit_lineofcredit');
$xajax->registerFunction('update_lineofcredit');
$xajax->registerFunction('delete_lineofcredit');
$xajax->registerFunction('new_lineofcredit');
$xajax->registerFunction('view_lineofcredit');
$xajax->registerFunction('save_lineofcredit');
$xajax->registerFunction('locdetails');
$xajax->registerFunction('search_lineofcredit');
#************************************************
//mou
$xajax->registerFunction('view_mou');
$xajax->registerFunction('new_mou');
$xajax->registerFunction('save_mou');
$xajax->registerFunction('search_mou');

$xajax->registerFunction('edit_mou');
$xajax->registerFunction('update_mou');
$xajax->registerFunction('delete_mou');
#************************************************
//grant
$xajax->registerFunction('edit_grant');
$xajax->registerFunction('update_grant');
$xajax->registerFunction('delete_grant');

$xajax->registerFunction('view_grant');
$xajax->registerFunction('new_grant');
$xajax->registerFunction('save_grant');
#************************************************
//grant
$xajax->registerFunction('edit_branch');
$xajax->registerFunction('update_branch');
$xajax->registerFunction('delete_branch');

$xajax->registerFunction('new_branch');
$xajax->registerFunction('view_branch');
$xajax->registerFunction('save_branch');
$xajax->registerFunction('search_branch');
#************************************************
$xajax->registerFunction('search_financialActuals');
#************************************************
$xajax->registerFunction('select_quarterlyValueChainReportingType');
$xajax->registerFunction('switchQuarterlyReporting');
$xajax->registerFunction('switchValueChainQuarterlyReporting');
$xajax->registerFunction('view_valueChainFinancialActuals');
$xajax->registerFunction('new_valueChainFinancialActuals');
$xajax->registerFunction('filter_quarterlyFinacialActuals_subcomponent');
$xajax->registerFunction('save_QuarterlyFinancialActuals');
$xajax->registerFunction('view_organizationPerSubcomponent');
#======DCED======================
$xajax->registerExternalFunction('view_all',"organization.php");

#===============================================================
$xajax->registerFunction('view_orgDetails');
$xajax->registerFunction('edit_financialActuals');
$xajax->registerFunction('update_FinancialActuals');
$xajax->registerFunction('delete_financialActuals');
#$xajax->registerExternalFunction("view_all","tests/myExternalFunction.php");
#$xajax->registerExternalFunction("myExternalFunction","tests/myExternalFunction.php");
$xajax->registerFunction('reload_annualBudgetActivity');
#planning
$xajax->registerFunction('annualTargetselect');
$xajax->registerFunction('switchAnnualTargets');
$xajax->registerFunction('select_planningTypeAnnual');
$xajax->registerFunction('switchPlanningTypeAnnual');
$xajax->registerFunction('select_ManagerQuarterlyValueChainReportingType');
$xajax->registerFunction('switchDCEDPlanningTypeReporting');
$xajax->registerFunction('switchDCEDPlanningTypeReporting_Manager');
$xajax->registerFunction('switchDCEDPlanningTypeReporting_Partners');
$xajax->registerFunction('switchDCEDPlanningTypeReporting_Manager');

#************************************************

#************************************************
require_once('save.php');
require_once('edit.php');
require_once('delete.php');
#require_once('organization.php');
#************************************************
#planning
#---------------




function switchDCEDPlanningTypeReporting($type){
$obj= new xajaxResponse();
$_SESSION['type']='';
$_SESSION['type']=$type;
//$obj->alert($_SESSION['type']);
switch($type){
case"DCED Qualitative":
$obj->addScriptCall("xajax_view_DCEDQualitativeannualActual",'','','','','','','');
break;
case"DCED Quantitative":
$obj->addScriptCall("xajax_view_DCEDQuantitativeannualTarget",'','','','','');
return $obj;
break;
 
default:
$obj->addScriptCall("xajax_view_DCEDQuantitativeannualTarget",'','','','','');
return $obj;

}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function switchDCEDPlanningTypeReporting_Partners($type){
$obj= new xajaxResponse();
$_SESSION['type']='';
$_SESSION['type']=$type;
switch($type){
case"DCED Qualitative":
$obj->addScriptCall("xajax_view_DCEDQualitativeannualActual",$_SESSION['usersubcomponent'],'','','','','','');
break;
case"DCED Quantitative":
$obj->addScriptCall("xajax_view_DCEDvalueChainDevelopment",'','','','','','','');
return $obj;
break;
 
default:
$obj->addScriptCall("xajax_view_DCEDvalueChainDevelopment",'','','','','','','');
return $obj;
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function switchDCEDPlanningTypeReporting_Manager($type){
$obj= new xajaxResponse();
$_SESSION['type']='';
$_SESSION['type']=$type;
//$obj->addAlert($_SESSION['type']);
switch($type){
case"DCED Qualitative":
$obj->addScriptCall("xajax_view_DCEDQualitativeActual_Manager",'','','','','','','');
break;
case"DCED Quantitative":
$obj->addScriptCall("xajax_view_DCEDvalueChainDevelopment_Manager",'','','','','');
return $obj;
break;
 
default:
$obj->addScriptCall("xajax_view_DCEDvalueChainDevelopment_Manager",'','','','','');
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


 
 function view_DCEDQualitativeannualActual($year,$timeline,$subsector,$status,$intervention,$indicator,$subcomponent){
$obj= new xajaxResponse();
#=====declaring sessions=============
$_SESSION['subsector']='';
$_SESSION['resultchain']='';
$_SESSION['intervention']='';
$_SESSION['indicator']='';
$_SESSION['subcomponent']='';

$_SESSION['status']='';
#=====addaddAssigning  Ssessions===========
$_SESSION['subsector']=$subsector;
$_SESSION['resultchain']=$resultchain;
$_SESSION['fyear']=($year!='')?$year:$_SESSION['ABIActiveyear'];
$_SESSION['intervention']=$intervention;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent']=$subcomponent;
$_SESSION['subsector']=$subsector;
$_SESSION['status']=$status;
$n=1;

$data.="<form name='annualTarget11' id='annualTarget11' method='post' action='".$PHP_SELF."'><table width='740'>
".filter_DCEDQualitativeannualActual()."

<tr class='evenrow'>
    <td colspan=12>
	
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_DCEDQualitativeannualActual(xajax.getFormValues('annualTarget11'));return false;\" value='edit' />|
	  <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget11'),'Delete_DCEDAnnualActual','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr>
<td colspan='12' class='evenrow2' align='center'>DCED Qualitative Annual Actuals</td>
</tr>
			
			<td width='50' class='evenrow2' colspan='' align='left'>Select</td>
			<td colspan='3' class='evenrow2'>Intervention</td>
		<td colspan='2' class='evenrow2'>Result</td>
		<td colspan='2' class='evenrow2'>Indicator </td>
				<td width='' class='evenrow2' >Deliverable</td>
				  <td width='' class='evenrow2'>Responsible</td>
				  <td class='evenrow2' >Timeline</td>
			  	<td class='evenrow2' >Status</td>
            </tr>";
$inc=1;


$x="select d.target_id,d.target_id,d.indicator_id,d.status,d.timeline,d.responsible,d.deliverable,d.display,d.year,i.indicator_type,i.subcomponent_id,i.physical_target as result,i.indicator_name,i.responsible,intv.intervention as intervention_name,s.subsector as subsector_name,rc.name as resultschainName from tbl_dcedannualtarget d inner join tbl_indicator i on(d.indicator_id=i.indicator_id) left join tbl_intervention intv on(i.intervention_id=intv.intervention_id) left join tbl_subsector s on(s.subsector_id=intv.subsector) left join tbl_resultschain rc on(rc.rc_id=i.rc_id)where i.indicator_type like 'DCED Based%' && d.year like '".$_SESSION['fyear']."%' && intv.intervention like '".$_SESSION['intervention']."%' and i.indicator_name like '".$_SESSION['indicator']."%'  and s.subsector like '".$_SESSION['subsector']."%' and rc.name like '".$_SESSION['resultchain']."%' and i.subcomponent_id='".$_SESSION['usersubcomponent']."' and d.display like 'Yes%' && i.responsible like 'Partners%' order by i.indicator_name,d.year asc";

#$obj->addAlert($x);

		  $query=mysql_query($x)or die("abi Error code 1581 because,".mysql_error());
		 //$obj->addAlert($x);
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		   $color=$n%2==1?"evenrow":"white";
		  if($row['status']=='Pending')$status="<td align='' bgcolor='' ><strong><font color='orange'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='on-going')$status="<td align='' bgcolor='' ><strong><font color='green'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Completed')$status="<td align='' bgcolor='' ><strong><font color='blue'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Cancelled')$status="<td align='' bgcolor='' ><strong><font color='red'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='')$status="<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>";
		  $l="align=right";
		  
							$data.="<tr class=$color>
							<td width='50'><input name='target_id[]' id='target_id' type='checkbox' value='".$row['target_id']."' />".$n++."</td>
							
							<td align=left colspan='3'>".$row['intervention_name']."</td>
							<td align=left colspan=2>".$row['result']."</td>
									  <td colspan='2'>$row[indicator_name]</td>
									  <td align=''>$row[deliverable]</td>
							
									 <td align=''>".$row['responsible']."</td>
										<td align=''>".$row['timeline']."</td>
									<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>
										
									  </tr>";
							$inc++;
		  }
		
		
	$data.="<tr class='evenrow'>
    <td colspan='12'>
	
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_DCEDQualitativeannualActual(xajax.getFormValues('annualTarget11'));return false;\" value='edit' />|
	  <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget11'),'Delete_DCEDAnnualActual','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
            <tr></table></form>";
	
 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function view_DCEDQualitativeActual_Manager($year,$timeline,$subsector,$status,$intervention,$indicator,$subcomponent){
$obj= new xajaxResponse();
#=====declaring sessions=============
$_SESSION['subsector']='';
$_SESSION['resultchain']='';
$_SESSION['intervention']='';
$_SESSION['indicator']='';
$_SESSION['subcomponent']='';

$_SESSION['status']='';
#=====addaddAssigning  Ssessions===========
$_SESSION['subsector']=$subsector;
$_SESSION['resultchain']=$resultchain;
$_SESSION['fyear']=($year!='')?$year:$_SESSION['ABIActiveyear'];
$_SESSION['intervention']=$intervention;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent']=$subcomponent;
$_SESSION['subsector']=$subsector;
$_SESSION['status']=$status;
$n=1;

$data.="<form name='annualTarget11' id='annualTarget11' method='post' action='".$PHP_SELF."'><table width='740'>
".filter_DCEDQualitativeannualActual_manager()."

<tr class='evenrow'>
    <td colspan=12>
	
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_DCEDQualitativeActual_Manager(xajax.getFormValues('annualTarget11'));return false;\" value='edit' />|
	  <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget11'),'Delete_DCEDAnnualActual_Manager','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr>
           
              
              <td colspan='12' class='evenrow2' align='center'>DCED Qualitative Annual Actuals</td>
            </tr>
			
			<td width='50' class='evenrow2' colspan='' align='left'>Select</td>
			<td colspan='3' class='evenrow2'>Intervention</td>
		<td colspan='2' class='evenrow2'>Result</td>
		<td colspan='2' class='evenrow2'>Indicator </td>
				<td width='' class='evenrow2' >Deliverable</td>
				  <td width='' class='evenrow2'>Responsible</td>
				  <td class='evenrow2' >Timeline</td>
			  	<td class='evenrow2' >Status</td>
            </tr>";
$inc=1;


$x="select d.target_id,d.target_id,d.indicator_id,d.status,d.timeline,d.responsible,d.deliverable,d.display,d.year,i.indicator_type,i.subcomponent_id,i.physical_target as result,i.indicator_name,intv.intervention as intervention_name,s.subsector as subsector_name,rc.name as resultschainName from tbl_dcedannualtarget d inner join tbl_indicator i on(d.indicator_id=i.indicator_id) left join tbl_intervention intv on(i.intervention_id=intv.intervention_id) left join tbl_subsector s on(s.subsector_id=intv.subsector) left join tbl_resultschain rc on(rc.rc_id=i.rc_id)where i.indicator_type like 'DCED Based%' && i.responsible like 'Managers%' && d.year like '".$_SESSION['fyear']."%' && intv.intervention like '".$_SESSION['intervention']."%' and i.indicator_name like '".$_SESSION['indicator']."%'  and s.subsector like '".$_SESSION['subsector']."%' and rc.name like '".$_SESSION['resultchain']."%' and i.subcomponent_id='".$_SESSION['usersubcomponent']."' and d.display like 'Yes%' order by i.indicator_name,d.year asc";

#$obj->addAlert($x);

		  $query=mysql_query($x)or die("abi Error code 1581 because,".mysql_error());
		 //$obj->addAlert($x);
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		   $color=$n%2==1?"evenrow":"white";
		  if($row['status']=='Pending')$status="<td align='' bgcolor='' ><strong><font color='orange'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='on-going')$status="<td align='' bgcolor='' ><strong><font color='green'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Completed')$status="<td align='' bgcolor='' ><strong><font color='blue'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='Cancelled')$status="<td align='' bgcolor='' ><strong><font color='red'>".$row['status']."</font></strong></td>";
		  else if($row['status']=='')$status="<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>";
		  $l="align=right";
		  
							$data.="<tr class=$color>
							<td width='50'><input name='target_id[]' id='target_id' type='checkbox' value='".$row['target_id']."' />".$n++."</td>
							
							<td align=left colspan='3'>".$row['intervention_name']."</td>
							<td align=left colspan=2>".$row['result']."</td>
									  <td colspan='2'>$row[indicator_name]</td>
									  <td align=''>$row[deliverable]</td>
							
									 <td align=''>".$row['responsible']."</td>
										<td align=''>".$row['timeline']."</td>
									<td align='' bgcolor='' ><strong>".$row['status']."</strong></td>
										
									  </tr>";
							$inc++;
		  }
		
		
	$data.="<tr class='evenrow'>
    <td colspan='12'>
	
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	 <input type='button' TITLE='Edit'  onclick=\"xajax_edit_DCEDQualitativeActual_Manager(xajax.getFormValues('annualTarget11'));return false;\" value='edit' />|
	  <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('annualTarget11'),'Delete_DCEDAnnualActual_Manager','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
            <tr></table></form>";
	
 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}







function view_orgDetails($org_code){
$obj=new xajaxResponse();
$query=mysql_query("select * from view_organization where org_code='".$org_code."' order by orgName ASC")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$data="<div id='login'>

<table width='600'><tr><td><legend class='green_field'></legend>
      
      <table width='670' border='0'>
        <tr>
          <td>Reports &raquo; Organizationa Details</td>
        </tr>
        <tr>
          <td><hr size='1' color='orange' align='left'width='640'/></td>
        </tr>
      </table>
      <legend class='green_field'></legend>
      <form name='organization' id='organization'><table width='600' border='0' id='organizational_details'>
              
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
              
              <tr>
                <td>District of Operation:</td>
                <td colspan='2'>".$row['district']."</td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'>".$row['organization_type']."</td>
              </tr>
              
			  <tr>
                <td><span class='green_field'>Sub-component:</span></td>
                <td colspan='2'>".$row['subcomponent']."</td>
            </tr>
              <tr>
                <td><span class='green_field'>Subsector:</span></td>
                <td colspan='2'>".$row['subsector']."</td>
            </tr>
			
                
  
</table>

<table width='597' border='0' id='contacts'>
           <tr>
             <td width='152'>Website:</td>
      <td width='435'>".$row['webiste']."</td>
    </tr>
           <tr>
             <td>Contact Person 1:</td>
             <td>".$row['contact_person']."</td>
           </tr>
           <tr>
             <td>Title:</td>
      <td>".$row['title']."</td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td>".$row['telephone']."</td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td>".$row['mobile']."</td>
    </tr>
	 </tr>
           <tr>
             <td>Email Address:</td>
      <td>".$row['emailAddress1']."</td>
    </tr>
	 <tr>
             <td>Contact Person 2:</td>
      <td>".$row['contact_person2']."</td>
    </tr>
           <tr>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td>".$row['telephone2']."</td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td>".$row['mobile2']."</td>
    </tr>
	<tr>
             <td>Email Address:</td>
      <td>".$row['emailAddress2']."</td>
    </tr>
	 <tr>
             <td>Contact Person 3:</td>
      <td>".$row['contact_person3']."</td>
    </tr>
           <tr>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td>".$row['telephone3']."</td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td>".$row['mobile3']."</td>
    </tr>
	<tr>
             <td>Email Address:</td>
      <td>".$row['emailAddress2']."</td>
    </tr>
	";
	if($_SESSION['role']=='Monitoring  and Evaluation'){
	$data.="<tr >
             <td colspan=2 align=center><input type='button'  onclick=\"xajax_view_organization('','','');return false;\" Title='Close'><input type='button' class='evenrow' Value='Edit' title='Edit' name='Edit'  onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'))\">|<input type='button'  class='evenrow' title='Delete'  value='Delete' class='redhdrs'></td>
      <td></td>
    </tr>";
	}else 
	$data.="<tr >
             <td colspan=2 align=center><input type='button' Value='Back' onclick=\"xajax_view_organizationPerSubcomponent('".$_SESSION['usersubcomponent']."');return false;\" Title='Close'>|<input type='button' class='evenrow' Value='Edit' title='Edit' name='Edit' disabled='disabled' onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'))\">|<input type='button'  class='evenrow' title='Delete' disabled='disabled' value='Delete' class='redhdrs'></td>
      <td></td>
    </tr>";
	
	

	
  $data.="</table>
 
         
       </form></td></tr></table>
<p>&nbsp;</p>
</div>";
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 


function select_ManagerQuarterlyValueChainReportingType(){
$obj=new xajaxResponse();
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
#$org_code=$_SESSION['org_code'];
#$_SESSION['managerorg_code']='';
#$_SESSION['orgName']='';
#$obj->addAlert($orgname."-----org_code=".$org_code);
$data="<table width='600' border='0'>
<tr><td colspan=2 class='green_field'>Program Monitoring &raquo; Quarterly Actuals </td></tr>
<tr><td colspan=2><hr/></td></tr>
  <tr class='evenrow2'>
    <td align='right'>Quarterly Reporting Category</td>
    <td><select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchManagerValueChainQuarterlyReporting(getElementById('project_lifeplanning').value,'".$org_code."','".$orgname."');return false;\">";
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
  </tr>
</table>
";
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}










function select_planningTypeAnnual(){
$obj=new xajaxResponse();
$data="<table width='600' border='0'>
<tr><td colspan=2 class='green_field'>Workplan &raquo; Annual planning </td></tr>
<tr><td colspan=2><hr/></td></tr>
  <tr class='evenrow2'>
    <td><div align='right'>Annual Planning Category </div></td>
    <td><label>
      <select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchPlanningTypeAnnual(getElementById('project_lifeplanning').value);return false;\">
        <option value=''>-Select-</option>";
		$query=mysql_query("select * from tbl_lookup where classCode=2")or die(mysql_error());
		while($row=mysql_fetch_array($query)){
        $data.="<option value='".$row['codeName']."'>".$row['codeName']."</option>";
        }
      $data."</select>
    </label></td>
   
  </tr>

</table>
";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function annualTargetselect(){
$obj=new xajaxResponse();
$data="<table width='600' border='0'>
<tr><td colspan=2 class='green_field'>Workplan &raquo; Annual Targets</td></tr>
<tr><td colspan=2><hr/></td></tr>
  <tr>
    <th><div align='right'>Annual Target </div></th>
    <th><label>
      <select name='project_life' id='project_life' onChange=\"xajax_switchAnnualTargets(getElementById('project_life').value);return false;\">
        <option value=''>-Select-</option>
        <option value='Annual Physical Targets'>Annual Physical Targets</option>
        <option value='Annual Financial Budget'>Annual Financial Budget</option>
      </select>
    </label></th>
   
  </tr>

</table>
";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function switchAnnualTargets($target){
$obj =new xajaxResponse();
switch($target){
case"Annual Physical Targets":

$obj->addScriptCall("xajax_select_planningTypeAnnual",$target);
return $obj;
break;

case"Annual Financial Budget":
$obj->addScriptCall("xajax_view_annualBudget",$target);
return $obj;
break;
default:
$obj->addScriptCall("xajax_filter_annualBudget",$target);
return $obj;
}

$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function view_organizationPerSubcomponent($subcomponent,$fyear){
$feedback = new xajaxResponse();
$n=1; $inc=1;
if($_SESSION['role']==''){
$feedback->addRedirect('index.php');
return $feedback;
}
$year='';
//$year=date('Y');
$_SESSION['Ryear']='';
$_SESSION['Ryear']=($fyear=='')?$_SESSION['ABIActiveyear']:$fyear;
$_SESSION['managerorg_code']='';
//$feedback->addAlert($_SESSION['Ryear']);
$currentReporting_year=mysql_fetch_array(mysql_query("select year from tbl_active where status='Open' group by year order by year desc"))or die(http(0270));
$subcomponent=$_SESSION['usersubcomponent'];
$data.="<form name='orgreporting' id='orgreporting'><table width='668' border='0'>
<tr class='evenrow'>	<td width='' class='evenrow'><strong class='greenlinks'></strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'></strong></td>
	  <td width='' class='evenrow'><strong class='greenlinks'>Year:</strong></td>
  
		<td width='' class='evenrow'><strong class='greenlinks'><select name='year' id='year' onchange=\"xajax_view_organizationPerSubcomponent('".$_SESSION['usersubcomponent']."',getElementById('year').value); return false;\">";
		 $end=$_SESSION['ABIActiveyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		
		$data.="</select></strong></td>
		
	<td width='' class='evenrow'><strong class='greenlinks'></strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'></strong></td>

		
      </tr>  
	  <tr>
        <td colspan='6' class='evenrow'><div align='center' class='black2'>REPORTING DETAILS FOR ".strtoupper($_SESSION['titlesubcomponent'])."</div></td>
        </tr>
      
      <tr class='evenrow'>
		<TD ><strong class='greenlinks'>NO</strong></TD>
	  	<td width='' class='evenrow'><strong class='greenlinks'>ORGANIZATION NAME</strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'>Jan - Mar </strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'>Apr - Jun </strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'>Jul - Sep </strong></td>
		<td width='' class='evenrow'><strong class='greenlinks'>Oct - Dec </strong></td>
      </tr>";

	  //$feedback->addAlert("select * from tbl_organization where subcomponent like '%".$_SESSION['titlesubcomponent']."%' group BY org_code ORDER BY org_code");
$new_query=mysql_query("select * from tbl_organization where subcomponent like '%".$_SESSION['titlesubcomponent']."%' group BY org_code ORDER BY org_code")
 or die(http('681'));
	  while($row=mysql_fetch_array($new_query))
	  {
	 //$color=$n%2==1?"#e7d58f":"#ffffff";
		//$feedback->addAlert($row['org_code']);
	 $quarter=substr($_SESSION['quarter'],0,10);
	#$feedback->addAlert($quarter);
		
	 // and o.org_code in('".$row['org_code']."')
	  
	$xx="SELECT o.org_code, o.orgName, o.subcomponent,r.updatedby,
	 max( if( (r.reportingPeriod = 'Jan - Mar' and r.year='".$_SESSION['Ryear']."' and r.updatedby='Partners' and r.subcomponent_id='".$_SESSION['usersubcomponent']."'), r.total, 0) ) AS Quarter1,
	  max( if( (r.reportingPeriod = 'Apr - Jun' and r.year= '".$_SESSION['Ryear']."' and r.updatedby='Partners' and r.subcomponent_id='".$_SESSION['usersubcomponent']."'), r.total, 0) ) AS Quarter2,
 		max( if( (r.reportingPeriod = 'Jul - Sep' and r.year='".$_SESSION['Ryear']."' and r.updatedby='Partners' and r.subcomponent_id='".$_SESSION['usersubcomponent']."'), r.total, 0) ) AS Quarter3,
  		max( if( (r.reportingPeriod = 'Oct - Dec' and r.year= '".$_SESSION['Ryear']."' and r.updatedby='Partners' and r.subcomponent_id='".$_SESSION['usersubcomponent']."'), r.total, 0) ) AS Quarter4, r.year
FROM tbl_organization o
LEFT JOIN tbl_organizationreporting r ON ( o.org_code = r.org_code )
WHERE subcomponent LIKE '%".$_SESSION['titlesubcomponent']."%'
 and o.org_code in('".$row['org_code']."')
GROUP BY o.org_code ORDER BY orgName ASC";
 
	//$feedback->addAlert($_SESSION['Ryear']);
	//$feedback->addAlert($xx);
	 $query=mysql_query($xx)or die(http("703"));
	 while($row2=mysql_fetch_array($query)){
	   $_SESSION['managerorg_code']=$row2['org_code'];
	   #$feedback->addAlert($_SESSION['managerorg_code']."======".$row2['org_code']);
	   $_SESSION['orgName']=$row2['orgName'];
	     $color=$n%2==1?"#f0e5a5":"#ffffff";
	
  $data.="<tr class=$color class='black'>
	 <td><input name='org_code[]' type='checkbox' value='".$row2['org_code']."' />".$inc++."</td><td><a href='#view_organization_details' onclick=\"xajax_view_orgDetails('".$row2['org_code']."')\">".$row2['orgName']."</a></td><td align='center' >"; if(($row2['Quarter1']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','".$_SESSION['Ryear']."','','','Jan - Mar');return false;\">";
}else {
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','".$_SESSION['Ryear']."','','','Jan - Mar');return false;\">";

} 

$data.="</td><td align='center'>"; if(($row2['Quarter2']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Apr - Jun');return false;\">";
}else{
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Apr - Jun');return false;\">";
} 

$data.="</td><td align='center'>";
 if(($row2['Quarter3']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Jul - Sep');return false;\">";
}else{
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Jul - Sep');return false;\">";
}
$data.="</td><td align='center'>";
if(($row2['Quarter4']<>0)){$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Oct - Dec');return false;\">";
}else{
$data.="<img src='icons/cross_shield_icon.png'  onclick=\"xajax_view_valueChainDevelopment('".$row2['org_code']."','".$row2['orgName']."','','','','Oct - Dec');return false;\">";
}
 
 
$data.="</td>";

	
	$data.="</tr>";
	  $n++;
	  
	  }
	  }
	  $data.="</table></form>";
   	$feedback->addAssign('bodyDisplay','innerHTML',$data);
return $feedback;
 }
 
 
 
 
 
 
 #-------------------------------------------
#view_valueChainDevelopment
#search_valueChainDevelopment


#-------------------------------------------



function view_valueChainDevelopment($org_code,$orgname,$year,$quarter1,$indicator,$ReportingPeriod){
$obj= new xajaxResponse();
$_SESSION['ReportingPeriod']='';
$_SESSION['ReportingPeriod']=($ReportingPeriod!='')?$ReportingPeriod:'';
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];

#$quarter1=($quarter1!=='')?$quarter1:$_SESSION['quarter'];
$_SESSION['quartersubcomponent']=$quarter1;
$_SESSION['year106']=($year<>'')?$year:$_SESSION['ABIActiveyear'];
//$obj->addAlert($_SESSION['quartersubcomponent']);
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;

#$obj->addAlert($_SESSION['orgName'].'---------------'.$org_code."-----".$orgname.'bbbb'.$_SESSION['managerorg_code'].'------------'.$sub_name.'-subcomp'.$subcomponent);
//$obj->addAlert($_SESSION['managerorg_code']);

$data="<ul id='countrytabs' class='shadetabs'>
											<li><a href='#' onclick=\"onclick=\"xajax_view_valueChainDevelopment('".$_SESSION['managerorg_code']."','','','','','');return false;\"\" rel='tab2' class='selected' >Logical Framework Reporting</a></li>
											<li><a href='#' onclick=\"xajax_view_DCEDvalueChainDevelopment('".$_SESSION['managerorg_code']."','','','','','');return false;\" rel='tab1' class=''>DCED Reporting</a></li>
											
										</ul><form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
<table width='800' border='0'>
 <tr>
    <td colspan='14' class='green_field'>Program Monitoring &raquo; ".$sub_name."  Quarterly Physical Actuals</td>
  </tr>
  <tr>
    <td colspan='14'><hr/></td>
  </tr>
  
  ".filter_vcdgrid()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
	   <td scope='col' align='left' class='black2' colspan=5>SUB - ACTIVITY</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>";

    $data.="<td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  ## AND responsible_for_reporting like 'Partners%'
  $n=1; $inc=1;
  $sql="select i.indicator_id,i.subcomponent_id,i.indicator_name,i.responsible as responsible_for_reporting,i.subactivity_id,s.subactivity_name,s.subactivity_code,
  r.id,r.reportingPeriod,r.year,r.org_code,r.total,r.updatedby 
  from tbl_indicator 
  i inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
  inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) 
  where i.subcomponent_id='".$subcomponent."' 
  AND reportingPeriod like '".$_SESSION['ReportingPeriod']."%'
  AND r.updatedby like 'Partners%'
AND r.updatedby not like  'Managers%'
  AND year like '".$_SESSION['Ryear']."%' 
  AND org_code='".$_SESSION['managerorg_code']."' AND org_code<> '0'
  AND indicator_name like '".$_SESSION['indicator106']."%' 
  order by subactivity_code  asc";
//$obj->addAlert($sql);
$query=mysql_query($sql)or die(http(886));
if(mysql_num_rows($query)>0){
   while($row=mysql_fetch_array($query)){ 
   $id=$row['id'];
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='id[]' type='checkbox' value='".$row['id']."' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td colspan=5>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
<td colspan=3>$row[indicator_name]</td>";

    $data.="<td align=right>".$row['total']."</td>
  </tr>";
  $inc++;
  }}
  
$data.="<tr class='evenrow'>
	  <td colspan=13><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\"  />
	  <input type='button' name='Delete' class='redhdrs' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('valueChainDevelopment'),'valueChainDevelopment','".$org_code."')\" /></td>

	
  </tr>";
$data.="</table></form>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}



function view_DCEDvalueChainDevelopment($org_code,$orgname,$year,$quarter1,$indicator,$ReportingPeriod){
$obj= new xajaxResponse();
$_SESSION['ReportingPeriod']='';
$_SESSION['ReportingPeriod']=$ReportingPeriod;
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$_SESSION['DCEDsubcomponent_name']=$sub_name;
#$obj->addAlert($_SESSION['ReportingPeriod']);
#$quarter1=($quarter1!=='')?$quarter1:$_SESSION['quarter'];
$_SESSION['quartersubcomponent']=$quarter1;
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;

#$obj->addAlert($_SESSION['orgName'].'---------------'.$org_code."-----".$orgname.'bbbb'.$_SESSION['managerorg_code'].'------------'.$sub_name.'-subcomp'.$subcomponent);
#$obj->addAlert($org_code);

$data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
<table width='800' border='0'>
 <tr>
    <td colspan='14' class='green_field'>Program Monitoring &raquo; DCED ".$_SESSION['titlesubcomponent']."  Quarterly  Actuals</td>
  </tr>
  <tr>
    <td colspan='14'><hr/></td>
  </tr>
  
  ".filter_DCEDvcdgrid()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
	   <td scope='col' align='left' class='black2' colspan=5>INTERVENTION</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>";

    $data.="<td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  ## AND responsible_for_reporting like 'Partners%'
  $n=1; $inc=1;
  $sql="select i.indicator_id,i.subcomponent_id,i.indicator_name,i.indicator_type,i.responsible as responsible_for_reporting,intv.intervention_id,intv.intervention,r.id,r.reportingPeriod,r.year,r.org_code,r.total,r.updatedby from tbl_indicator i inner join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_intervention intv on(intv.intervention_id=i.intervention_id) where i.subcomponent_id='".$subcomponent."' 
  AND reportingPeriod like '".$_SESSION['quartersubcomponent']."%'
  AND r.updatedby like 'Partners%'
AND r.updatedby not like 'Managers%'
&& i.indicator_type like 'DCED Based%' 
  AND year like '".$year."%' 
  AND r.org_code='".$org_code."' AND r.org_code<> '0'
  AND indicator_name like '".$_SESSION['indicator106']."%' 
  order by intv.intervention  asc";
//$obj->addAlert($sql);
$query=mysql_query($sql)or die(http(0971));
if(mysql_num_rows($query)>0){
   while($row=mysql_fetch_array($query)){ 
   $id=$row['id'];
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='id[]' type='checkbox' value='".$row['id']."' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td colspan=5>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
<td colspan=3>$row[indicator_name]</td>";

    $data.="<td align=right>".$row['total']."</td>
  </tr>";
  $inc++;
  }}
  
$data.="<tr class='evenrow'>
	  <td colspan=13><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\"  />
	  <input type='button' name='Delete' class='redhdrs' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('valueChainDevelopment'),'valueChainDevelopment','".$org_code."')\" /></td>

	
  </tr>";
$data.="</table></form>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}


#----------------------modified this code on 22072011 by Achilley-------------------------------------------------
function view_valueChainDevelopment_Manager($org_code,$orgname,$year,$quarter,$indicator){
$obj = new xajaxResponse();
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$_SESSION['quartersubcomponent']=$quarter;
$quarter =($quarter!='')?$quarter:$_SESSION['quarter'];
$_SESSION['quarterselected']=$quarter;
$year=(year!='')?$year:$_SESSION['ABIActiveyear'];
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;

#$obj->addAlert($_SESSION['year106'].'---------------'.$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-subcomp'.$subcomponent);
//$obj->addAlert($org_code);
$data="<ul id='countrytabs' class='shadetabs'>
											<li><a href='#' onclick=\"onclick=\"xajax_view_valueChainDevelopment_Manager('','','','','');return false;\"\" rel='tab2' class='selected'>Logical Framework Reporting</a></li>
											<li><a href='#' onclick=\"xajax_view_DCEDvalueChainDevelopment_Manager('','','','','');return false;\" rel='tab1' class=''>DCED Reportiong</a></li>
											
										</ul><form name='valueChainDevelopment'  id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
<table width='700' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; LogFrame ".$sub_name."  Quarterly Physical Actuals</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_vcdgrid_Manager()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
	   <td scope='col' align='left' class='black2' colspan=2> SUB-ACTIVITY</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>";

    $data.="<td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  $n=1; $inc=1;
   $sql="select i.indicator_id,i.subcomponent_id,i.indicator_name,i.responsible as responsible_for_reporting,i.subactivity_id,s.subactivity_name,s.subactivity_code,r.id,r.reportingPeriod,r.year,r.org_code,r.total,r.updatedby  from tbl_indicator i inner join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where i.subcomponent_id='".$subcomponent."' 
  AND reportingPeriod like '".$quarter."%'
  AND r.updatedby  like 'Managers%'
AND r.updatedby not like 'Partners%'
  AND year like '".$year."%' 
 AND indicator_name like '".$_SESSION['indicator106']."%' 
  order by subactivity_code  asc";
 
//$obj->addAlert($sql);
$query=mysql_query($sql)or die("abi Error code:491 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $id=$row['id'];
 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='id[]' type='checkbox' value='".$row['id']."' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td colspan=2>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
<td colspan=3>$row[indicator_name]</td>";
 
    $data.="<td align=right>".$row['total']."</td>
  </tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>
	  <td colspan=15><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\"  />
	  <input type='button' name='Delete' class='redhdrs' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('valueChainDevelopment'),'valueChainDevelopment','".$org_code."')\" /></td>

	
  </tr>";
$data.="</table></form>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}




#==========dced vc manager  =============================
function view_DCEDvalueChainDevelopment_Manager($org_code,$orgname,$year,$quarter,$indicator){
$obj = new xajaxResponse();
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$_SESSION['quartersubcomponent']=$quarter;
$quarter =($quarter!='')?$quarter:$_SESSION['quarter'];
$_SESSION['quarterselected']=$quarter;
$year=(year!='')?$year:date('Y');
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;


$data="
<form name='valueChainDevelopment'  id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
<table width='700' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; DCED ".$sub_name."  Quarterly Physical Actuals</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>";
  $data.="<tr class='evenrow'>
    <td colspan=3 >Result Type:</td>
    <td colspan='10'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningTypeReporting_Manager(getElementById('type').value);return false;\"><option value=''>-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>";
  
 $data.="".filter_DCEDvcdgrid_Manager()."

  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
	   <td scope='col' align='left' class='black2' colspan='2'>INTERVENTION</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>";

    $data.="<td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  ## AND responsible_for_reporting like 'Partners%'
  $n=1; $inc=1;
  $sql="select i.indicator_id,i.subcomponent_id,intv.intervention,i.intervention_id,i.rc_id,rc.name as rc_name,i.indicator_name,i.indicator_type,i.responsible as responsible_for_reporting,r.id,r.reportingPeriod,r.year,r.org_code,r.total from tbl_indicator i inner join  tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_intervention intv on(i.intervention_id=intv.intervention_id) join tbl_resultschain rc on(rc.rc_id=i.rc_id)  where i.subcomponent_id='".$subcomponent."' 
  AND reportingPeriod like '".$_SESSION['quartersubcomponent']."%'
  AND i.responsible not like 'Partners%'
AND i.responsible  like 'Managers'
&& i.indicator_type like 'DCED Based%' 
  AND r.year like '".$year."%' 
 
  AND i.indicator_name like '".$_SESSION['indicator106']."%' 
  order by intv.intervention  asc";
#$obj->addAlert($sql);
$query=mysql_query($sql)or die(http("1148"));
if(mysql_num_rows($query)>0){
   while($row=mysql_fetch_array($query)){ 
   $id=$row['id'];
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='id[]' type='checkbox' value='".$row['id']."' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td colspan=2> ".$row['intervention']."</td>
<td colspan=3>$row[indicator_name]</td>";

    $data.="<td align=right>".$row['total']."</td>
  </tr>";
  $inc++;
  }}
  
$data.="<tr class='evenrow'>
	  <td colspan=13><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\"  />
	  <input type='button' name='Delete' class='redhdrs' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('valueChainDevelopment'),'valueChainDevelopment','".$org_code."')\" /></td>

	
  </tr>";
$data.="</table></form>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}





function new_valueChainDevelopment($subcomponent,$activity_id,$org_code,$orgname,$ReportingPeriod){
$obj= new xajaxResponse();
$n=1;
 $org_code=$_SESSION['managerorg_code'];
 #$obj->addAlert($org_code);
 $_SESSION['activity_id']=$activity_id;


$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;
if($ReportingPeriod!==$quarter){
$obj->addAlert("The Selected Quarter ".$ReportingPeriod." is not Active For Reporting");
return $obj;
}
#$obj->addAlert($_SESSION['orgName'].$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-------------subcompoonent_id='.$subcomponent);


#$query23=mysql_fetch_array(mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")) or die("abi error-code-1815".mysql_error());
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
 

            <TABLE id='' width='700'>
             
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; ".$_SESSION['titlesubcomponent']." (".$orgname.")</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr><tr><td>";
			/*  // $x="select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id='".$subcomponent."') group by activity_id order by 1  asc";
//$obj->addAlert($x);
		  $select=mysql_query($x) or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];
		 <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td> */

/* $query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."' group by activity_name order by activity_name asc ")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>"; */
    
  $data.="<tr class='evenrow'>
    <td scope='col' width=50>Sub-Component:</td>
    <td scope='col' colspan='2'><select name='subcomponent' id='subcomponent'>";
	$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."'")or die("aBi error-code 590 because".mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value=\"".$row1['id']."\" >".$row1['subcomponent']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td width=50>Activity:</td>
    <td colspan='2'><select name='activity_id' id='activity_id' onchange=\"xajax_new_valueChainDevelopment('".$subcomponent."',getElementById('activity_id').value,'".$org_code."','".$orgname."','".$ReportingPeriod."')\"><option value=''>-select-</option>";
	$query=mysql_query("select aa.activity_id,aa.activity_code,aa.activity_name,i.indicator_name,i.responsible from tbl_activity aa inner join tbl_indicator i on(aa.activity_id=i.activity_id) where subcomp_id='".$_SESSION['usersubcomponent']."' and i.responsible='Partners' group by aa.activity_code order by activity_code asc")or die("aBi error-code 599 because".mysql_error());
	while($row2=mysql_fetch_array($query)){
	$sel=($row2['activity_id']==$_SESSION['activity_id'])?"SELECTED":"";
	$data.="<option value=\"".$row2['activity_id']."\" ".$sel." >".$row2['activity_code']." ".$row2['activity_name']."</option>";
	}
	
	$data.="</select></td>
  </tr>


            <tr>
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
           
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Total</td>
           </tr>";
		   $inc=1;
		   $x="select i.indicator_id,i.indicator_name,s.subactivity_name,s.subactivity_code,s.subact_id,i.activity_id,i.responsible as responsible_for_reporting from tbl_indicator i inner join tbl_subactivity s on (i.subactivity_id=s.subact_id) where i.activity_id='".$activity_id."' and i.responsible <> 'Managers'  order by s.subactivity_code asc";
		   #$obj->addAlert($x);
		     $query1=mysql_query($x)or die("aBi error-code 618 because".mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 
			 /* $gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' disabled='disabled' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly  disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10'readonly=readonly disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' readonly=readonly disabled='disabled' onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; */ 

			   //".$sex." 
		   $color=$n%2==1?"evenrow":"white";

$data.="<tr class=$color><td bordercolor='#FF9933'><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	$inc++;
	}

		//}  
		  #} 
		  $data.="</tr>
 </td></tr>
 <tr><td></td><td></td><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'));\" class='button_width' ></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function new_DCEDvalueChainDevelopment($org_code,$subcomponent,$subsector,$intervention,$resultchain,$orgname,$ReportingPeriod){
$obj= new xajaxResponse();
$n=1;
 $org_code=$_SESSION['managerorg_code'];
 #$obj->addAlert($org_code);
 $_SESSION['activity_id']=$activity_id;

$ReportingPeriod=$_SESSION['quarter'];
$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
#$obj->addAlert($quarter);
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;
$_SESSION['intervention_id']=$intervention;
$_SESSION['subsector_id']=$subsector;
$_SESSION['resultchain_id']=$subsector;
$_SESSION['subcomponent_id']=$subcomponent;
$reportingPeriod=$_SESSION['quarter'];
#$obj->addAlert($quarter);
if($ReportingPeriod!==$quarter){
$obj->addAlert("The Selected Quarter ".$ReportingPeriod." is not Active For Reporting");
return $obj;
}
#$obj->addAlert($_SESSION['orgName'].$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-------------subcompoonent_id='.$subcomponent);


#$query23=mysql_fetch_array(mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")) or die("abi error-code-1815".mysql_error());
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
 

            <TABLE id='' width='700'>
           
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; ".$_SESSION['titlesubcomponent']." (".$orgname.")</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr><tr><td>
		     <tr class='evenrow'>
    <td colspan='' >Result Type:</td>
    <td colspan='12'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningTypeReporting_Partners(getElementById('type').value);return false;\"><option value='' >-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>
		   
		   
		   ";
			
    
  $data.="<tr class='evenrow'>
    <td scope='col' width=50>Sub-Component:</td>
    <td scope='col' colspan='9'><select name='subcomponent' id='subcomponent' style='width:500px;'>";
	$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc")or die("aBi error-code 590 because".mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value='".$row1['id']."' >".$row1['subcomponent']."</option>";
	}
	$data.="</select></td>
  </tr>
  
  <tr class='evenrow'>
    <td>Subsector:</td>
    <td colspan='9'><label>
      <select name='subsector' id='subsector' style='width:500px;'  onChange=\"xajax_new_DCEDvalueChainDevelopment('".$_SESSION['managerorg_code']."',getElementById('subcomponent').value,getElementById('subsector').value,'','','".$orgname."','".$ReportingPeriod."');return false;\">";
	  if($_SESSION['subsector_id']<>''){
	  
	  $querysC=mysql_query("select * from tbl_subsector where subsector_id='".$_SESSION['subsector_id']."' order by subsector asc") or die(http(2289));
	  while($rowSC=mysql_fetch_array($querysC)){
	  $selsubsector=($rowSC['subsector_id']==$_SESSION['subsector_id'])?"SELECTED":"";
	  $data.="<option value='".$rowSC['subsector_id']."' '".$selsubsector."'>".substr($rowSC['subsector'],0,100)."</option>";
	  
	  }
	  }
	  else 
	  $data.="<option value=''>-select-</option>";
	  $querysC=mysql_query("select * from tbl_subsector order by subsector asc") or die(http(2289));
	  while($rowSC=mysql_fetch_array($querysC)){
	  $selsubsector=($rowSC['subsector_id']==$_SESSION['subsector_id'])?"SELECTED":"";
	  $data.="<option value='".$rowSC['subsector_id']."' '".$selsubsector."'>".substr($rowSC['subsector'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td>
  </tr>
 
<tr class='evenrow'>
    <td>Intervention:</td>
    <td colspan='9'><select name='intervention' id='intervention' style='width:500px;' onChange=\"xajax_new_DCEDvalueChainDevelopment('".$_SESSION['managerorg_code']."',getElementById('subcomponent').value,getElementById('subsector').value,getElementById('intervention').value,'','".$orgname."','".$ReportingPeriod."');return false;\">";
	if($_SESSION['intervention_id']<>''){
	  $queryn=mysql_query("select intv.intervention_id,intv.intervention,i.responsible,i.expected_output,intv.subsector from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id)  where intv.subsector='".$_SESSION['subsector_id']."' and intv.intervention_id='".$_SESSION['intervention_id']."'  and i.expected_output like 'Quantitative%' and i.responsible like 'Partners%' group by intv.intervention order by intervention asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  if($rowintervn['intervention_id']==$_SESSION['intervention_id'])
	  $data.="<option value='".$rowintervn['intervention_id']."' 'selected'>".substr($rowintervn['intervention'],0,100)."</option>";
	  else $data.="<option value='".$rowintervn['intervention_id']."'>".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  } }
	   else $data.="<option value='' >-select-</option>";
	   $queryn=mysql_query("select intv.intervention_id,intv.intervention,i.expected_output from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id)  where i.expected_output like 'Quantitative%' and i.responsible like 'Partners%' group by intv.intervention  order by intv.intervention asc") or die(http(1802));
	  while($rowintervn=mysql_fetch_array($queryn)){
	  $selint=($rowintervn['intervention_id']==$_SESSION['intervention_id'])?"SELECTED":"";
	  $data.="<option value='".$rowintervn['intervention_id']."' '".$selint."'>".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  } 
      $data.="</select></td>
  </tr>  
  
   <tr class='evenrow' style='display:none;'>
    <td>Result Chain Level</td>
    <td colspan='9'><label>
      <select name='rchain' id='rchain'  onChange=\"xajax_new_DCEDvalueChainDevelopment('".$_SESSION['managerorg_code']."',getElementById('subcomponent').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('rchain').value,'".$orgname."','".$ReportingPeriod."');return false;\"   >";
	  
	  $sql="select intv.intervention_id,intv.intervention,i.indicator_id,i.indicator_name,
	  i.expected_output,i.responsible,i.rc_id,rc.name from 
	  tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id)
	   join tbl_resultschain rc on(i.rc_id=rc.rc_id)  where i.expected_output like 'Quantitative%'
	    and i.responsible like 'Partners%' and intv.intervention_id='".$_SESSION['intervention_id']."'
		 and i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
		  group by intv.intervention  order by intv.intervention asc";
	 # $obj->addAlert($sql);
	  $queryrc=mysql_query($sql) or die(http(2289));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  	  $selrc=($rowrc['rc_id']==$_SESSION['resultchain_id'])?"SELECTED":"";
	  $data.="<option value='".$rowrc['rc_id']."' '".$selrc."'>".substr($rowrc['name'],0,100)."</option>";
	  
	  }
      $data.="<option value=''>-select-</option></select>
    </label></td>
  </tr>
 <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
               <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Result Chain Level</td>
			   <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Intervention</td>
			 
			   <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
           
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Total</td>
           </tr>";
		   #============select stmt==============
		   $inc=1;
		   
		   #'i.intervention_id='".$_SESSION['intervention_id']."' and &&  i.subsector='".$_SESSION['subsector_id']."'$_SESSION['subsector_id'] 
		   $x="select i.indicator_id,i.indicator_name,intv.intervention_id,intv.intervention,
		   i.rc_id,rc.name as rc_name,intv.subsector,i.responsible,i.expected_output from tbl_indicator 
		   i left join tbl_intervention intv on (intv.intervention_id=i.intervention_id)
		   left join tbl_resultschain rc on(rc.rc_id=i.rc_id) 
		   where  i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
		   && i.responsible like 'Partners%'
		    and i.indicator_type like 'DCED Based%'
			 && i.intervention_id='".$_SESSION['intervention_id']."' 
			 and i.expected_output like 'Quantitative%'
			   order by intv.intervention asc";
		   #$obj->addAlert($x);
		   
		     $query1=mysql_query($x)or die("aBi error-code 1264 because".mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 
			
		   $color=$n%2==1?"evenrow":"white";

$data.="<tr class=$color><td bordercolor='#FF9933'><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value='".$n."' />".$n++."</td>
 <td bordercolor='#FF9933'>$rowi[rc_name]</td>
  <td bordercolor='#FF9933'>$rowi[intervention]</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	$inc++;
	}

		//}  
		  #} 
		  $data.="</tr>
 </td></tr>
 <tr class='evenrow'><td></td><td></td><td colspan='3' bordercolor='#FF9933'  align='right'>
   <input name='save' type='button' value='Save' style='width:140px;' onclick=\"xajax_save_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}








function new_valueChainDevelopment_Manager($subcomponent,$activity_id){
$obj= new xajaxResponse();
$n=1;
 $org_code=$_SESSION['managerorg_code'];
 #$obj->addAlert($org_code);
 $_SESSION['activity_id']=$activity_id;


$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='')?$_SESSION['year']:$_SESSION['ABIActiveyear'];
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;

#$obj->addAlert($_SESSION['orgName'].$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-------------subcompoonent_id='.$subcomponent);


#$query23=mysql_fetch_array(mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")) or die("abi error-code-1815".mysql_error());
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
 

            <TABLE id='' width='700'>
             
            <tr class=''>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; ".$_SESSION['titlesubcomponent']." ".$orgname."</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr><tr><td>";
			/*  // $x="select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id='".$subcomponent."') group by activity_id order by 1  asc";
//$obj->addAlert($x);
		  $select=mysql_query($x) or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];
		 <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td> */

/* $query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."' group by activity_name order by activity_name asc ")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>"; */
    
  $data.="<tr class='evenrow'>
    <td scope='col' width=50>Sub-Component:</td>
    <td scope='col' colspan='2'><select name='subcomponent' id='subcomponent'>";
	$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."'")or die(mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value='".$row1['id']."' >".$row1['subcomponent']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr class='evenrow'>
    <td width=50>Activity:</td>
    <td colspan='2'><select name='activity_id' id='activity_id' onchange=\"xajax_new_valueChainDevelopment_Manager('".$subcomponent."',getElementById('activity_id').value)\"><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_activity where subcomp_id='".$_SESSION['usersubcomponent']."' order by activity_code asc")or die(mysql_error());
	while($row2=mysql_fetch_array($query)){
	$sel=($row2['activity_id']==$_SESSION['activity_id'])?"SELECTED":"";
	$data.="<option value=\"".$row2['activity_id']."\" ".$sel.">".$row2['activity_code']." ".$row2['activity_name']."</option>";
	}
	
	$data.="</select></td>
  </tr>


            <tr>
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
           
              <td  class='evenrow2' align='right'>Total</td>
           </tr>";
		   $x="select i.indicator_id,i.indicator_name,i.responsible,s.subactivity_name,s.subactivity_code,s.subact_id,i.activity_id from tbl_indicator i inner join tbl_subactivity s on (i.subactivity_id=s.subact_id) where i.activity_id='".$activity_id."' and i.activity_id <> '0'  and i.responsible like 'Managers%' and i.responsible  not like 'Partners%'  order by s.subactivity_code asc";
		   #$obj->addAlert($x);
		   $inc=1;
		     $query1=mysql_query($x)or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 /* $gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' disabled='disabled' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly  disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10'readonly=readonly disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' readonly=readonly disabled='disabled' onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; */ 

			   //".$sex." 
			  $color=$n%2==1?"evenrow":"white";
$data.="<tr bgcolor='$color'><td bordercolor='#FF9933'><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	$inc++;
	}

		//}  
		  #} 
		  $data.="</tr>
 </td></tr>
 <tr><td></td><td></td><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


 
 function new_DCEDvalueChainDevelopment_Manager($subcomponent,$subsector,$intervention,$resultchain,$org_code,$orgname,$ReportingPeriod){
$obj= new xajaxResponse();
$n=1;
 $org_code=$_SESSION['managerorg_code'];
 #$obj->addAlert($org_code);
 $_SESSION['activity_id']=$activity_id;

$ReportingPeriod=$_SESSION['quarter'];
$subcomponent=($subcomponent!=0)?$_SESSION['usersubcomponent']:$subcomponent;
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
#$obj->addAlert($quarter);
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year;
$_SESSION['indicator106']=$indicator;
$_SESSION['intervention_id']=$intervention;
$_SESSION['subsector_id']=$subsector;
$_SESSION['resultchain_id']=$subsector;
$_SESSION['subcomponent_id']=$subcomponent;
$reportingPeriod=$_SESSION['quarter'];
#$obj->addAlert($quarter);
if($ReportingPeriod!==$quarter){
$obj->addAlert("The Selected Quarter ".$ReportingPeriod." is not Active For Reporting");
return $obj;
}
/*#$obj->addAlert($_SESSION['orgName'].$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-------------subcompoonent_id='.$subcomponent);


$query23=mysql_fetch_array(mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")) or die("abi error-code-1815".mysql_error());/* <ul id='countrytabs' class='shadetabs'>
 <li><a href='#' onclick=\"xajax_view_DCEDQuantitativeValuechainDevelopment('','','','','','','".$ReportingPeriod."');return false;\" rel='tab1' class='selected'> DCED Quantitative Actuals</a></li>
<li><a href='#' onclick=\"xajax_view_DCEDQualitativeannualActual('','','','','','','');return false;\" rel='tab2' class='' > DCED Qualitative Actuals</a></li>						
											
										</ul> */
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' >
 

            <TABLE id='' width='700'>
             
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; ".$_SESSION['titlesubcomponent']." (".$orgname.")</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr>
		   <tr class='evenrow'>
    <td colspan='' >Result Type:</td>
    <td colspan='12'><select name='type' id='type' style='width:500px;' onchange=\"xajax_switchDCEDPlanningTypeReporting_Managers(getElementById('type').value);return false;\"><option value='' >-select-</option>";
	
	$queryx=mysql_query("select * from tbl_lookup where classCode='9' order by code asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	  $selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['codeName']."\" ".selx." >".$row['codeName']."</option>";
	  }
	  
      $data.="</select></td>
  </tr>
		   
		   
		   <tr><td>";
			
    
  $data.="<tr class='evenrow'>
    <td scope='col' width=50>Sub-Component:</td>
    <td scope='col' colspan='9'><select name='subcomponent' id='subcomponent' style='width:500px;'>";
	$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by id asc")or die("aBi error-code 590 because".mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value=\"".$row1['id']."\" >".$row1['subcomponent']."</option>";
	}
	$data.="</select></td>
  </tr>
  
  <tr class='evenrow'>
    <td>Subsector:</td>
    <td colspan='9'><label>
      <select name='subsector' id='subsector'  style='width:500px;' onChange=\"xajax_new_DCEDvalueChainDevelopment_Manager(getElementById('subcomponent').value,getElementById('subsector').value,'','','".$_SESSION['managerorg_code']."','".$orgname."','".$ReportingPeriod."');return false;\"><option value=''>-select-</option>";
	/*   if($_SESSION['subsector_id']<>''){
	  
	  $querysC=mysql_query("select * from tbl_subsector where subsector_id='".$_SESSION['subsector_id']."' order by subsector asc") or die(http(2289));
	  while($rowSC=mysql_fetch_array($querysC)){
	  $selsubsector=($rowSC['subsector_id']==$_SESSION['subsector_id'])?"SELECTED":"";
	  $data.="<option value='".$rowSC['subsector_id']."' '".$selsubsector."'>".substr($rowSC['subsector'],0,100)."</option>";
	  
	  }
	  }
	  else  */
	  
	  $querysC=mysql_query("select * from tbl_subsector order by subsector asc") or die(http(2289));
	  while($rowSC=mysql_fetch_array($querysC)){
	  $selsubsector=($rowSC['subsector_id']==$_SESSION['subsector_id'])?"SELECTED":"";
	  $data.="<option value=\"".$rowSC['subsector_id']."\" ".$selsubsector.">".substr($rowSC['subsector'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td>
  </tr>
 
<tr class='evenrow'>
    <td>Intervention:</td>
    <td colspan='9'><select name='intervention' id='intervention'  style='width:500px;' onChange=\"xajax_new_DCEDvalueChainDevelopment_Manager(getElementById('subcomponent').value,getElementById('subsector').value,getElementById('intervention').value,'','".$_SESSION['managerorg_code']."','".$orgname."','".$ReportingPeriod."');return false;\"><option value='' >-select-</option>";
	if($_SESSION['subsector_id']<>''){
	  $queryn=mysql_query("select intv.intervention_id,intv.intervention,i.responsible,i.expected_output,intv.subsector from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id)  where intv.subsector='".$_SESSION['subsector_id']."' and i.expected_output like 'Quantitative%' and i.responsible like 'Managers%' group by intv.intervention order by intv.intervention asc") or die(http(2289));
	  while($rowintervn=mysql_fetch_array($queryn)){
	   $selint=($rowintervn['intervention_id']==$_SESSION['intervention_id'])?"SELECTED":"";
	  $data.="<option value=\"".$rowintervn['intervention_id']."\" ".$selint." >".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  } }
	  /*  else $data.="<option value='' >-select-</option>";
	   $queryn=mysql_query("select intv.intervention_id,intv.intervention,i.expected_output from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id)  where i.expected_output like 'Quantitative%' and i.responsible like 'Managers%' group by intv.intervention  order by intv.intervention asc") or die(http(1802));
	  while($rowintervn=mysql_fetch_array($queryn)){
	   #$selint=($rowintervn['intervention_id']==$_SESSION['intervention_id'])?"SELECTED":"";
	  $data.="<option value='".$rowintervn['intervention_id']."' '".$selint."'>".substr($rowintervn['intervention'],0,100)."</option>";
	  
	  }  */
      $data.="</select></td>
  </tr> "; 
  
   /* <tr class='evenrow' style='display:none;'>
    <td>Result Chain Level</td>
    <td colspan='9'><label>
      <select name='rchain' id='rchain'  onChange=\"xajax_new_DCEDvalueChainDevelopment_Manager(getElementById('subcomponent').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('rchain').value,'".$_SESSION['managerorg_code']."','".$orgname."','".$ReportingPeriod."');return false;\"   ><option value=''>-select-</option>";
	  
	  
	  $queryrc=mysql_query("select intv.intervention_id,intv.intervention,i.expected_output,i.responsible,i.rc_id,rc.name from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id) join tbl_resultschain rc on(i.rc_id=rc.rc_id)  where i.expected_output like 'Quantitative%' and i.responsible  like 'Managers%' and i.responsible not like 'Partners%' and intv.intervention_id='".$_SESSION['intervention_id']."' and i.subcomponent_id='".$_SESSION['usersubcomponent']."'  group by intv.intervention  order by intv.intervention asc") or die(http(2289));
	  while($rowrc=mysql_fetch_array($queryrc)){
	  	  $selrc=($rowrc['rc_id']==$_SESSION['resultchain_id'])?"SELECTED":"";
	  $data.="<option value='".$rowrc['rc_id']."' '".$selrc."'>".substr($rowrc['name'],0,100)."</option>";
	  
	  }
      $data.="</select>
    </label></td>
  </tr> */
 $data.="<tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
             <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Result Chain Level</td> 
			 <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Intervention</td>
			  
			   <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
           
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2' align='right'>Total</td>
           </tr>";
		   #============select stmt==============
		   $inc=1;
		   $x="select intv.intervention_id,intv.intervention,i.rc_id,rc.name as rc_name,i.responsible,i.indicator_name,i.indicator_id,i.expected_output,intv.subsector from tbl_intervention intv inner join tbl_indicator i on(i.intervention_id=intv.intervention_id) join tbl_resultschain rc on(i.rc_id=rc.rc_id) where intv.subsector='".$_SESSION['subsector_id']."' and intv.intervention_id='".$_SESSION['intervention_id']."' and i.expected_output like 'Quantitative%' and i.responsible like 'Managers%' group by intv.intervention order by intv.intervention asc";
		   #$x="select i.indicator_id,i.indicator_name,s.subactivity_name,s.subactivity_code,s.subact_id,i.activity_id,intervention_id,i.rc_id,i.subsector,i.responsible as responsible_for_reporting from tbl_indicator i inner join tbl_subactivity s on (i.subactivity_id=s.subact_id) join tbl_resultschain rc on(rc.rc_id=i.rc_id) where i.intervention_id='".$_SESSION['intervention_id']."' and i.subsector='".$_SESSION['subsector_id']."'  && i.subcomponent_id='".$_SESSION['usersubcomponent']."'  and  i.responsible  like 'Managers%' and i.indicator_type like 'DCED Based%' order by s.subactivity_code asc";
		   #$obj->addAlert($x);
		     $query1=mysql_query($x)or die("aBi error-code 1264 because".mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 
			
		   $color=$n%2==1?"evenrow":"white";

$data.="<tr class=$color><td bordercolor='#FF9933'><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
 <td bordercolor='#FF9933'>$rowi[rc_name]</td>
  <td bordercolor='#FF9933'>$rowi[intervention]</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           
              <td  align='right'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	$inc++;
	}

		//}  
		  #} 
		  $data.="</tr>
 </td></tr>
 <tr class='evenrow'><td></td><td></td><td colspan='3' bordercolor='#FF9933'  align='right'>
   <input name='save' type='button' value='Save' style='width:100px;'  onclick=\"xajax_save_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



 function filter_quarterlyFinacialActuals_subcomponent($subcomponent){
$obj=new xajaxResponse();
$_SESSION['wpsubcomponent_id']='';
 $_SESSION['wpsubcomponent_code']='';
$_SESSION['wpsubcomponent']='';
$_SESSION['wpoutput_id']='';
$_SESSION['wpoutput_name']='';
$_SESSION['wpoutput_code']=''; 

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['wpsubcomponent_id']=$row['subcomponent_id'];
$_SESSION['wpsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['wpsubcomponent']=$row['subcomponent'];
$_SESSION['wpoutput_id']=$row['output_id'];
$_SESSION['wpoutput_name']=$row['output_name'];
$_SESSION['wpoutput_code']=$row['output_code']; 
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_new_valueChainFinancialActuals",'','','');
return $obj;
}


function new_valueChainFinancialActuals($subcomponent,$activity_id,$org_code,$orgname){
$obj=new xajaxResponse();
$_SESSION['ractivity_id']=$activity_id;
$_SESSION['usersubcomponent']=$subcomponent;
#$_SESSION['orgName']=$orgname;
//$_SESSION[
#$obj->addAlert($org_code.$orgname);
$data="<form name='annualBudget' id='annualBudget' action='".$PHP_SELF."'><table width='700' border='0'>";
         $data.=" 
		 <tr class='evenrow'>
              <td colspan='11' class='green_field'>Program Monitoring &raquo; Quarterly Actuals ".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")
                <label></label></td></tr>
				 <tr>
              <td colspan='11'><hr/></td></tr>
	 <tr class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' >";
		
$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['usersubcomponent']==$row['id'])?"SELECTED":"";
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
       	 <tr class='evenrow'>
              <td colspan='2'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity' onchange=\"xajax_new_valueChainFinancialActuals('".$_SESSION['usersubcomponent']."',getElementById('activity').value,'".$_SESSION['managerorg_code']."','".$_SESSION['orgName']."');return false;\"><option value=''>-select-</option>";
			 
				$data."<option value='%'>-All-</option>";
					  $query=mysql_query("select aa.activity_code,sc.id,sc.subcomponent_code,sc.subcomponent,aa.activity_name,aa.activity_id,i.responsible,i.indicator_id from tbl_indicator i inner join tbl_activity aa on(aa.activity_id=i.indicator_id) inner join tbl_subcomponent sc on(sc.id=aa.subcomp_id) where sc.id='".$_SESSION['usersubcomponent']."' and activity_name <> '' and i.responsible='Partners'   group by activity_code order by activity_code asc")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['ractivity_id']==$row['activity_id'])?"SELECTED":"";
$data.="<option value='".$row['activity_id']."' '".$selected."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='9'><select name='fyear' id='fyear'>";
$yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select></td>
            </tr>
            <tr>
             
              
              <td colspan='8' class='evenrow2'>Quarterly Actuals in '000' UgShs.</td>
             
            </tr>
            <tr>
              <td width='20' class='evenrow2'>Code</td>
              <td colspan='6'  class='evenrow2' width='200'>Subactivity </td>
              
			  <td width='51' class='evenrow2'>Total</td>
             
            </tr>";
			$r=$_SESSION['rractivity_id']; //&& activity_id='".$r."'
//$n=1;$a=1;$b=2;$c=3;$d=4;$e=5;$f=6;$g=7;$h=8;$i=9;$j=10;
$y="select * from view_indicator where subcomponent_id='".$_SESSION['usersubcomponent']."' && activity_id='".$activity_id."' and responsible like 'Partners%' group by subactivity_code order by subactivity_code asc";
		  $query2=mysql_query($y)or die(mysql_error());
		 # $obj->addAlert($y);
		  //value='".
		  $a=1;
		  $inc=1; 
		  while($row=mysql_fetch_array($query2)){
		  
 $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  
            <td><INPUT type='hidden' name='subactivity_id[]'  id='subactivity_id[]' value='".$row['subactivity_id']."' >$row[subactivity_code]</td>
            <td colspan='4'>
           <input name='loopKey[]' type='hidden' value='1' id='textfield' size='6'  />$row[subactivity_name]</td>
            <td align='right'><input name='total[]' type='text' size='20'   onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('pq1".$a."').value,getElementById('pq2".$a."').value,getElementById('pq3".$a."').value,getElementById('pq4".$a."').value,'total".$a."')\" type='text' id='total".$a."'  /></td>
          </tr>";
		 // $a++; $b++; $c++; $d++; $e++; $f++;	 $g++;	 $h++; 
		 $inc++;
		 $a++;
		  }
	$data.="<tr>
            <td></td>
            <td colspan='5'></td><td></td>
          
           
            <td align=right></td>
          </tr>
		  <tr>
            <td></td>
            <td colspan='5'></td>
           
   
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_save_QuarterlyFinancialActuals(xajax.getFormValues('annualBudget'))\" /></td>
          </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_valueChainFinancialActuals_Manager($subcomponent,$activity_id){
$obj=new xajaxResponse();
$_SESSION['ractivity_id']=$activity_id;
$_SESSION['usersubcomponent']=$subcomponent;
#$_SESSION['orgName']=$orgname;
//$_SESSION[
#$obj->addAlert($org_code.$orgname);
$data="<form name='annualBudget' id='annualBudget' action='".$PHP_SELF."'><table width='700' border='0'>";
         $data.=" 
		 <tr>
              <td colspan='11' class='green_field'>Program Monitoring &raquo; Quarterly Actuals ".$_SESSION['titlesubcomponent']." (".$_SESSION['orgName'].")
                <label></label></td></tr>
				 <tr>
              <td colspan='11'><hr/></td></tr>
		 <tr class='evenrow'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' >";
		
$query=mysql_query("select * from tbl_subcomponent where id='".$_SESSION['usersubcomponent']."' order by subcomponent_code asc")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['usersubcomponent']==$row['id'])?"SELECTED":"";
$data.="<option value='".$row['id']."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>
            <tr class='evenrow'>
              <td colspan='2'>Activity: </td>
              <td colspan='9'><select name='activity' id='activity' onchange=\"xajax_new_valueChainFinancialActuals_Manager('".$_SESSION['usersubcomponent']."',getElementById('activity').value);return false;\"><option value=''>-select-</option>";
			 
				$data."<option value='%'>-All-</option>";
				$sql="select s.subact_id,s.subactivity_name,s.activity_id,s.subcomponent_id,sc.subcomponent,a.activity_code,a.activity_name from tbl_subactivity s inner join tbl_activity a  on(s.activity_id=a.activity_id) inner join tbl_subcomponent sc on(s.subcomponent_id=sc.id) where s.subcomponent_id='".$_SESSION['usersubcomponent']."' and activity_name <> ''   group by activity_code order by activity_code asc";
					  $query=mysql_query($sql)or die(mysql_error());
					 # $obj->addAlert($sql);
					  
					  while($row=mysql_fetch_array($query)){
					  $selected=($_SESSION['ractivity_id']==$row['activity_id'])?"SELECTED":"";
$data.="<option value='".$row['activity_id']."' '".$selected."'>".$row['activity_code']." ".$row['activity_name']."</option>";
		
					  }
					   
$data.="</select></td>
            </tr>"; 
			
			
            $data.="<tr class='evenrow'>
              <td colspan='2'>Financial Year:</td>
              <td colspan='9'><select name='fyear' id='fyear'>";
$yr = date(Y); $end = $yr; do{
$data.="<option value='$end'>".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select></td>
            </tr>
            <tr class='evenrow'>
             
              
              <td colspan='8' class='evenrow2'>Quarterly Actuals in '000' UgShs.</td>
             
            </tr>
            <tr>
              <td width='20' class='evenrow2'>Code</td>
              <td colspan='4'  class='evenrow2' width='200'>Subactivity </td>
              
			  <td width='51' class='evenrow2' colspan=3 align=right>Total</td>
             
            </tr>";
			$r=$_SESSION['rractivity_id']; //&& activity_id='".$r."'
//$n=1;$a=1;$b=2;$c=3;$d=4;$e=5;$f=6;$g=7;$h=8;$i=9;$j=10;
#$y="select * from view_indicator where subcomponent_id='".$_SESSION['usersubcomponent']."' && activity_id='".$activity_id."' AND responsible like 'Managers%' group by subactivity_code order by subactivity_code asc";
$y="select s.subact_id,s.subactivity_code,s.subactivity_name,s.activity_id,s.subcomponent_id,sc.subcomponent,a.activity_code,a.activity_name from tbl_subactivity s inner join tbl_activity a  on(s.activity_id=a.activity_id) inner join tbl_subcomponent sc on(s.subcomponent_id=sc.id) inner join tbl_usergroup u on(s.responsible=u.group_name) where s.subcomponent_id='".$_SESSION['usersubcomponent']."' and a.activity_name <> '' && s.activity_id='".$activity_id."' AND s.responsible like 'Managers%'    group by s.subactivity_code order by a.activity_code asc";
		  $query2=mysql_query($y)or die(mysql_error());
		 # $obj->addAlert($y);
		  //value='".
		  $a=1;
		  $inc=1; 
		  while($row=mysql_fetch_array($query2)){
		  
 $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  
            <td><INPUT type='hidden' name='subactivity_id[]'  id='subactivity_id[]' value='".$row['subact_id']."' >$row[subactivity_code]</td>
            <td colspan='6'>
           <input name='loopKey[]' type='hidden' value='1' id='textfield' size='6'  />$row[subactivity_name]</td>
            <td align='right'><input name='total[]' type='text' size='20'   onKeyPress='return numbersonly(event, false)' onFocus=\"xajax_calc_budget(getElementById('pq1".$a."').value,getElementById('pq2".$a."').value,getElementById('pq3".$a."').value,getElementById('pq4".$a."').value,'total".$a."')\" type='text' id='total".$a."'  /></td>
          </tr>";
		 // $a++; $b++; $c++; $d++; $e++; $f++;	 $g++;	 $h++; 
		 $inc++;
		 $a++;
		  }
	$data.="<tr>
            <td></td>
            <td colspan='5'></td><td></td>
          
           
            <td align=right></td>
          </tr>
		  <tr>
            <td></td>
            <td colspan='6'></td>
           
   
            <td align=right><input name='save' type='button' id='save' size='' value='Save' title='Save workplan' onclick=\"xajax_save_QuarterlyFinancialActuals(xajax.getFormValues('annualBudget'))\" /></td>
          </tr></table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}






function reload_vcdActuals_subcomponent($subcomponent){
$obj=new xajaxResponse();
$_SESSION['PLTsubcomponent_id']='';
$_SESSION['PLTsubcomponent_code']='';
$_SESSION['PLTsubcomponent']='';
$_SESSION['PLToutput_id']='';
$_SESSION['PLToutput_name']='';
$_SESSION['PLToutput_code']=''; 

$query=mysql_query("select * from view_output where subcomponent_id='".$subcomponent."'")or die(mysql_error());
while($row=mysql_fetch_array($query)){
$_SESSION['PLTsubcomponent_id']=$row['subcomponent_id'];
 $_SESSION['PLTsubcomponent_code']=$row['subcomponent_code'];
$_SESSION['PLTsubcomponent']=$row['subcomponent'];
$_SESSION['PLToutput_id']=$row['output_id'];
$_SESSION['PLToutput_name']=$row['output_name'];
$_SESSION['PLToutput_code']=$row['output_code']; 
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_view_valueChainFinancialActuals",$activity,'','','');
return $obj;
}




function switchManagerValueChainQuarterlyReporting($activity){
$obj= new xajaxResponse();
#$_SESSION['usersubcomponent']=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
#$_SESSION['titlesubcomponent']=($sub_name!='')?$sub_name:$_SESSION['titlesubcomponent'];
#$_SESSION['managerorg_code']=($org_code!=0)?$_SESSION['managerorg_code']:$_SESSION['org_code'];
#$_SESSION['orgName']=($orgname!='')?$_SESSION['orgName']:$_SESSION['name'];
#$obj->addAlert($activity.'------'.$org_code."-----".$orgname);
switch($activity){
case"Results Indicators":
$obj->addScriptCall("xajax_view_valueChainDevelopment_Manager",'','','','','');
break;
case"Financial Actuals":
$obj->addScriptcall("xajax_view_valueChainFinancialActuals_Manager",'',$org_code,$orgname,'','','');
return $obj;
break;
case "Line of credit":
$obj->addScriptCall('xajax_view_lineofcredit',$org_code);
return $obj;
break;

case "Memorandum of Understanding (MOU)":
$obj->addScriptCall('xajax_view_mou',$org_code);
return $obj;
break;
case "New Branches":
$obj->addScriptCall('xajax_view_branch',$org_code);
return $obj;
break;

case "Grants":
$obj->addScriptCall('xajax_view_grant',$org_code);
return $obj;
break;
default:
$obj->addAlert("No match Found!");
return $obj;
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function switchValueChainQuarterlyReporting($activity,$org_code,$orgname){
$obj= new xajaxResponse();
#$_SESSION['usersubcomponent']=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
#$_SESSION['titlesubcomponent']=($sub_name!='')?$sub_name:$_SESSION['titlesubcomponent'];
#$_SESSION['managerorg_code']=($org_code!=0)?$_SESSION['managerorg_code']:$_SESSION['org_code'];
#$_SESSION['orgName']=($orgname!='')?$_SESSION['orgName']:$_SESSION['name'];
$org_code=($org_code==0)?$_SESSION['org_code']:$org_code;
$orgname=($orgname=='')?$_SESSION['name']:$orgname;
#$obj->addAlert($activity.'------'.$org_code."-----".$orgname);
switch($activity){
case"Results Indicators":
$obj->addScriptCall("xajax_view_valueChainDevelopment",$org_code,$orgname,'','','','');
break;
case"Financial Actuals":
$obj->addScriptcall("xajax_view_valueChainFinancialActuals",'',$org_code,$orgname,'','','');
return $obj;
break;
case "Line of credit":
$obj->addScriptCall('xajax_view_lineofcredit',$org_code);
return $obj;
break;

case "Memorandum of Understanding (MOU)":
$obj->addScriptCall('xajax_view_mou',$org_code);
return $obj;
break;
case "New Branches":
$obj->addScriptCall('xajax_view_branch',$org_code);
return $obj;
break;

case "Grants":
$obj->addScriptCall('xajax_view_grant',$org_code);
return $obj;
break;
default:
$obj->addAlert("No match Found!");
return $obj;
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function reload_annualBudgetActivity($activity_id){
$obj=new xajaxResponse();
$sc=$_SESSION['wpsubcomponent_id'];
//$_SESSION['ractivity_id']='';
$_SESSION['ractivity_code']='';
$_SESSION['ractivity_name']='';
$x="select activity_id,subcomponent_code,activity_code from view_indicator where subcomponent_id='".$sc."' && activity_id ='".$activity_id."' ";
//$obj->addAlert($x);
$select=mysql_query($x)or die(mysql_error()); 
while($row=mysql_fetch_array($select)){
$_SESSION['rractivity_id']=$row['activity_id'];
$_SESSION['ractivity_code']=$row['activity_code'];
$_SESSION['ractivity_name']=$row['activity_name'];
}
$obj->addAssign('bodyDisplay','innerHTML',$data);
$obj->addScriptCall("xajax_new_valueChainFinancialActuals");
return $obj;
}


#--------------------------------------------
function view_valueChainFinancialActuals_Manager($subcomponent,$subactivity,$year,$quarter){
$obj=new xajaxResponse();


$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=($quarter!='')?$quarter:$_SESSION['quarter'];
$_SESSION['managerorg_code']=$org_code;
$_SESSION['quarterselected']=$quarter;
$year=($year!='')?$year:date('Y');
$_SESSION['yearselected']=$year;
$subactivity=$_SESSION['subactivity'];
#$obj->addAlert($_SESSION['orgName'].'--------------'.$_SESSION['managerorg_code']);
#$data="".filter_vcdActuals_Manager()."
		$data.="<form name='FinancialActual'    id='FinancialActual' action='".$PHP_SELF."'><table width='700' border='0'>
		".filter_vcdActuals_Manager()."
		<tr class='evenrow'>
			<td colspan='5' class='evenrow'><div align='center'><strong> Financial Actuals  ".$_SESSION['titlesubcomponent']." (".$orgname.") in '000'</strong></div></td>
			</tr>
			<tr class=evenrow2>
			<td class='evenrow2'>Select</td>
			<td class='evenrow2'>Year</td>
			<td colspan='' class='evenrow2'>Quarter</td>
			<td width='311' colspan='' class='evenrow2' >Subactivity</td>
			<td width='180' class='evenrow2' align=right><b>Total</b></td>
		</tr>";
		$y="select f.id,f.org_code,o.orgName,f.year,f.reportingPeriod,f.subactivity_id,sa.subactivity_code,sa.subactivity_name,f.subcomponent_id,s.subcomponent,f.amount 
		from tbl_financialactuals f left join 
		tbl_organization o on(o.org_code=f.org_code) left join 
		tbl_subactivity sa on(f.subactivity_id=sa.subact_id) left join 
		tbl_subcomponent s on(s.id=f.subcomponent_id) left join tbl_annualtarget at on(at.subactivity_id=f.subactivity_id) where f.subcomponent_id='".$subcomponent."' and f.year like '".$year."%' and f.reportingPeriod like '".$_SESSION['quarterselected']."%' and sa.subactivity_name like '".$_SESSION['subactivity']."%'  group by sa.subactivity_code order by subactivity_code asc";
		#$obj->addAlert($y);
		  $query2=mysql_query($y)or die(http(1205));
$n=1;
		  $inc=1;
		  $a=1;

	while($row=mysql_fetch_array($query2)){
		 $color=$n%2==1?"evenrow":"white";
		$data.="<tr class=$color>
				<td width='16'>
				<input name=org_code[] id='org_code' type='hidden' value='".$row['org_code']."'
				<input name='id[]' id='id' type='checkbox' value='".$row['id']."' />  
				".$n++."
				<input name='subcomponent_id[]' id='subcomponent_id' type='hidden' value='".$row['subcomponent_id']."' />
				</td>
				<td width='10'>$row[year]</td>
				<td width='16'>$row[reportingPeriod]</td>
				<td colspan=''>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
				<td align=right bgcolor='#669900'><b>".number_format($row['amount'])."</b></td>
				</tr>";
			  $inc++;
			 $a++; 
		  }

$data.="<tr class='evenrow2'>
	  <td colspan='4'><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	 <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_financialActuals(xajax.getFormValues('FinancialActual')); return false;\"  />
	  <input type='button' name='Delete' id='Delete' value='Delete' class='redhdrs' onClick=\"ConfirmDelete(xajax.getFormValues('FinancialActual'),'FinancialActuals108','".$org_code."');return false;\" /></td>
	<td></td>

  </tr>";
  
$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}











function view_valueChainFinancialActuals($subcomponent,$org_code,$orgname,$subactivity,$year,$quarter){
$obj=new xajaxResponse();


$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
#$obj->addAlert($_SESSION['orgName'].'--------------'.$_SESSION['managerorg_code']);
$data="
		<form name='FinancialActuals108' id='FinancialActuals108' action='".$PHP_SELF."'><table width='400' border='0'>".filter_vcdActuals()."
		<tr class='evenrow'>
			<td colspan='5' class='evenrow'><div align='center'><strong> Financial Actuals  ".$_SESSION['titlesubcomponent']." ".$orgname." in '000'</strong></div></td>
			</tr>
			<tr class=evenrow2>
			<td class='evenrow2'>Select</td>
			<td class='evenrow2'>Year</td>
			<td colspan='' class='evenrow2'>Quarter</td>
			<td width='311' colspan='' class='evenrow2' >Subactivity</td>
			<td width='180' class='evenrow2' align=right><b>Total</b></td>
		</tr>";
		$y="select f.id,f.org_code,o.orgName,f.year,f.reportingPeriod,f.subactivity_id,sa.subactivity_code,sa.subactivity_name,f.subcomponent_id,s.subcomponent,f.amount 
		from tbl_financialactuals f inner join 
		tbl_organization o on(o.org_code=f.org_code) inner join 
		tbl_subactivity sa on(f.subactivity_id=sa.subact_id) inner join 
		tbl_subcomponent s on(s.id=f.subcomponent_id) where f.subcomponent_id='".$subcomponent."' order by sa.subactivity_code asc";
		//$obj->addAlert($y);
		  $query2=mysql_query($y)or die(mysql_error());
$n=1;
		  $inc=1;
		  $a=1;

	while($row=mysql_fetch_array($query2)){
		 $color=$n%2==1?"evenrow":"white";
		$data.="<tr class=$color>
				<td width='16'>
				<input name=org_code[] id='org_code' type='hidden' value='".$row['org_code']."'
				<input name=f_id[] id='f_id' type='checkbox' value='".$row['id']."' />  
				".$n++."
				<input name=subcomponent_id[] id='subcomponent_id' type='hidden' value='".$row['subcomponent_id']."' />
				</td>
				<td width='10'>".$row['year']."</td>
				<td width='16'>".$row['reportingPeriod']."</td>
				<td colspan='2'>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
				
				<td align=right bgcolor='#669900'><b>".number_format($row['amount'])."</b></td>
				</tr>";
			  $inc++;
			 $a++; 
		  }

$data.="<tr class='evenrow2'>
	  <td colspan='4'><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	 <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_financialActuals(xajax.getFormValues('FinancialActuals108'))\"  />
	  <input type='button' name='Delete' id='Delete' value='Delete' class='redhdrs' onClick=\"ConfirmDelete(xajax.getFormValues('FinancialActuals108'),'FinancialActuals108','".$org_code."')\" /></td>
	<td></td>

  </tr>";
  
$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function select_quarterlyValueChainReportingType($org_code,$orgname){
$obj=new xajaxResponse();
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
#$org_code=$_SESSION['org_code'];
#$_SESSION['managerorg_code']='';
#$_SESSION['orgName']='';
#$obj->addAlert($orgname."-----org_code=".$org_code);
$data="<table width='600' border='0'>
<tr><td colspan=2 class='green_field'>Program Monitoring &raquo; Quarterly Actuals </td></tr>
<tr><td colspan=2><hr/></td></tr>
  <tr class='evenrow2'>
    <td align='right'>Quarterly Reporting Category</td>
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
  </tr>
</table>
";
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}


function new_calc($male,$female,$maleyouth,$femaleyouth,$total){
$obj= new xajaxResponse();
$totalValue=0;
/* $lp=$test['loopkey'];
for($i=1;$i<count($lp);$i++){
$male=$test['male'][$i];
$female=$test['female'][$i];
$youth=$test['youth'][$i]; */
$totalValue=($male+$female+$maleyouth+$femaleyouth);
//$obj->addAlert($total."ppppppppp".$male."-".$female."-".$youth."-".$totalValue);
//}
$obj->addAssign($total,"value",$totalValue);
//$data.="<input name='total[]' type='text' id='total' value='".$total."'  size='10' readonly='readonly' />";
//$obj->addAssign('total_1','innerHTML',$data);
return $obj;
}


//gender for growth

function view_genderForGrowth(){
$obj= new xajaxResponse();
$data="<table width='600' border='0'>
 <tr>
    <td colspan='7' class='green_field'>Program Monitoring &raquo; View Gender For Growth</td>
  </tr>
  <tr>
    <td colspan='7'><hr/></td>
  </tr>
  <tr><td colspan='9'>
  ".filter_g4ggrid()."</td></tr>
  <tr>
  <tr>
    <th scope='col'>No.</th>
	
    <th scope='col'>INDICATOR</th>
    <th scope='col'>ADULT MALE</th>
    <th scope='col'>ADULT FEMALE</th>
    <th scope='col'> MALE YOUTH</th>
	<th scope='col'> FEMALE YOUTH</th>
    <th scope='col'>TOTAL</th>
  </tr>";
  $n=1; $inc=1;
  $query=mysql_query("select * from view_organizationreporting where subcomponent_id='4' order by indicator_id asc")or die("abi Error code:1386 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";
   
    $youth=$row['youth'];
   $y=$youth>0?$youth:"-";
   
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
   <td><input name='' type='checkbox' value='' /></td>
    <td>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
    <td align=right>".$y."</td>
	<td align=right>".$y."</td>
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
 $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>";

$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}





function new_genderForGrowth(){
$obj= new xajaxResponse();
//$obj->addAlert("it works!");
$data="<form name='g4g' id='g4g' method='post' action='".$PHP_SELF."' ><table width='500' border='0' >
            <tr>
            
              <td bordercolor='#FF9933'><table  border='0'>
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; Gender for Growth</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr></table></td></tr></table><TABLE id='' width=500><tr><td>";
$select=mysql_query("select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id=4) group by activity_id order by 1 asc") or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];

		   
	
		  
$query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."'")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<fieldset><legend><b><input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>
    
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
			  
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			   <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Total</td>
           </tr>";
		     $query1=mysql_query("select * from view_indicator where activity_id='".$activity_id."'  order by subactivity_code asc")or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
$data.="<tr><td bordercolor='#FF9933'><input type='hidden' name='loopkey[]' id='loopkey' value='1' />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
              <td bordercolor='#FF9933'><input name='male[]' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933' bgcolor='#FFFFFF'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('maleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	//$m++;
	}
		  $data.="</table></fieldset>";
		}  
		  } 
		  $data.="</td></tr><tr><td>";
		
	
   $data.="</td></tr><tr><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_g4g(xajax.getFormValues('g4g'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



#---------------------------
//sps$MS
#search_spsQMS
#new_spsQMS
#--------------------------
function view_spsQMS(){
$obj= new xajaxResponse();
$data="<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; SPS and QMS</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_spsgrid()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
    <td scope='col' align='left' class='black2'>INDICATOR</td>
    <td scope='col' align='right' class='black2'> ADULT MALE</td>
    <td scope='col' align='right' class='black2'> ADULT FEMALE</td>
    <td scope='col' align='right' class='black2'> MALE YOUTH</td>
	<td scope='col' align='right' class='black2'>FEMALE YOUTH</td>
    <td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  $n=1; $inc=1;
  $query=mysql_query("select * from view_organizationreporting where subcomponent_id=3 order by indicator_id asc")or die("abi Error code:1540 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";
   
    $maleyouth=$row['youth'];
   $y=$maleyouth>0?$youth:"-";
   $femaleyouth=$row['youth'];
   $y=$maleyouth>0?$youth:"-";
   $z=$femaleyouth>0?$youth:"-";
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='checkbox[]' type='checkbox' value='' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
    <td align=right>".$y."</td>
	 <td align=right>".$z."</td>
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
$data.="<tr class=$color>
     
	  <td><input type='checkbox' name='vcd[]' id='vcd' value='select_all' onClick='selectAll(this.form.vcd)'/></td>
    <td colspan=4><a href='#' >Check All</a> | <img src='icons/edit_icon.png' TITLE='Edit' width='16' height='16'>| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16'></td>
    <td></td>
	 <td></td>
 <td></td>
	 <td></td>
<td></td>
   

  </tr>
  
</table></form>";

$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}

/* function search_spsQMS($year,$quarter,$indicator){
$obj= new xajaxResponse();
$_SESSION['year']=$year;
$_SESSION['quarter1']=$quarter;
$_SESSION['indicator']=$indicator;
$data="<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; SPS and QMS</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_spsgrid()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
    <td scope='col' align='left' class='black2'>INDICATOR</td>
    <td scope='col' align='right' class='black2'> ADULT MALE</td>
    <td scope='col' align='right' class='black2'> ADULT FEMALE</td>
    <td scope='col' align='right' class='black2'> MALE YOUTH</td>
	<td scope='col' align='right' class='black2'>FEMALE YOUTH</td>
    <td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  $n=1; $inc=1;
  $query=mysql_query("select * from view_organizationreporting where subcomponent_id=3 && year='".$_SESSION['year']."' && reportingPeriod like '".$_SESSION['quarter1']."%' && lower(indicator_name) like '".$_SESSION['indicator']."%'  order by indicator_id asc")or die("abi Error code:1341 because,".mysql_error());
  if(@mysql_num_rows($query)>0){
   while($row=@mysql_fetch_array($query)){ 
   $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";
   
    $youth=$row['youth'];
   $y=$youth>0?$youth:"-";
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='checkbox[]' type='checkbox' value='' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
    <td align=right>".$y."</td>
	 <td align=right>".$y."</td>
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
  }
  else{
  $obj->addAlert("No results Found!");
  //error();
  return $obj;
  }
$data.="<tr class=$color>
     
	  <td><input type='checkbox' name='vcd[]' id='vcd' value='select_all' onClick='selectAll(this.form.vcd)'/></td>
    <td colspan=4><a href='#' >Check All</a> | <img src='icons/edit_icon.png' TITLE='Edit' width='16' height='16'>| <img src='icons/delete_icon.png' TITLE='Delete' width='16' height='16'></td>
    <td></td>
	 <td></td>
 <td></td>
	 <td></td>
<td></td>

  </tr>
  
</table></form>";

$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}


function new_spsQMS(){
$obj= new xajaxResponse();
$n=1;
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' ><table width='500' border='0' >
            <tr>
            
              <td bordercolor='#FF9933'><table  border='0'>
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; SPS and QMS</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr></table></td></tr></table><TABLE id='' width=500><tr><td>";
$select=mysql_query("select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id=3) group by activity_id order by 1  asc") or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];

		   
	
		  
$query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."' group by activity_name order by activity_name asc ")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<fieldset><legend><b><input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>
    
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Total</td>
           </tr>";
		     $query1=mysql_query("select * from view_indicator where activity_id='".$activity_id."'  order by subactivity_code asc")or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 $gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' disabled='disabled' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly  disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10'readonly=readonly disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' readonly=readonly disabled='disabled' onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; 

			 
			 
$data.="<tr><td bordercolor='#FF9933'><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
              ".$sex."
              <td bordercolor='#FF9933' bgcolor='#FFFFFF'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	//$m++;
	}
		  $data.="</table></fieldset>";
		}  
		  } 
		  $data.="</td></tr>
 </td></tr><tr><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_spsQMS(xajax.getFormValues('valueChainDevelopment'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
 */

#*************************************************
/*
select_financialServices
view_financialService
new_financialServices
*/
#*************************************************
function select_financialServices(){
$obj=new xajaxResponse();
$data="<table width='600' border='0'>
<tr><td colspan=2 class='green_field'>Program Monitoring &raquo; Access to Agricultural Finance</td></tr>
<tr><td colspan=2><hr/></td></tr>
  <tr>
    <th><div align='right'>Select a financial Service:</div></th>
    <th><label>
      <select name='project_life' id='financial_services' onChange=\"xajax_choose_financialServices(getElementById('financial_services').value);return false;\">
        <option value=''>-Select-</option>
        <option value='Financial Services'>Results Indicators</option>
        <option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>
      </select>
    </label></th>

  </tr>

</table>
";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}






function choose_financialServices($financialServices){
$obj= new xajaxResponse();
switch($financialServices){
case "Financial Services":
$obj->addScriptCall('xajax_view_financialServices');
return $obj;
break;

case "Line of credit":
$obj->addScriptCall('xajax_view_lineofcredit',$org_code);
return $obj;
break;

case "Memorandum of Understanding (MOU)":
$obj->addScriptCall('xajax_view_mou',$org_code);
return $obj;
break;
case "New Branches":
$obj->addScriptCall('xajax_view_branch',$org_code);
return $obj;
break;

case "Grants":
$obj->addScriptCall('xajax_view_grant',$org_code);
return $obj;
break;
default:
}



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function view_financialServices(){
$obj= new xajaxResponse();
$data="<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field' >Program Monitoring &raquo; View Financial Services</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  

  <tr>
    <th colspan=4><div align='right'>Select a financial Service:</div></th>
    <th colspan=6><label>
      <select name='project_life' id='financial_services' onChange=\"xajax_choose_financialServices(getElementById('financial_services').value);return false;\">
        <option value=''>-Select-</option>
        <option value='Financial Services'>Results Indicators</option>
        <option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>
      </select>
    </label></th>

  </tr>

  ".filter_fisgrid()."
  <tr>
  <tr>
    <th scope='col' colspan='2'>No.</th>

    <th scope='col'>YEAR</th>
	<th scope='col'>REPORTING PERIOD</th>
    <th scope='col'>INDICATOR</th>
    <th scope='col'>ADULT MALE</th>
    <th scope='col'>ADULT FEMALE</th>
    <th scope='col'>MALE YOUTH</th>
	<th scope='col'>FEMALE YOUTH</th>
    <th scope='col'>TOTAL VALUE</th>
  </tr>";
  $n=1; $inc=1;
  $query=mysql_query("select * from view_organizationreporting where subcomponent_id=2 and indicator_id='56211' and lower(indicator_type) like 'results based%' order by year,indicator_id,reportingPeriod asc")or die("abi Error code:1860 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
 $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";
   
    $youth=$row['youth'];
   $yM=$youth>0?$youth:"-";
   $color=$n%2==1?"evenrow":"white";
   $yF=$youth>0?$youth:"-";
   $color=$n%2==1?"evenrow":"white";
  /* 
  <td>$row[subactivity_code]</td>
    <td>$row[subactivity_name]</td> */
  $data.="<tr class=$color>
   <td><input name='' type='checkbox' value='' /></td><td>".$n++."</td>
	 
	    
		    <td>$row[year]</td>
			    <td>$row[reportingPeriod]</td>
				<td>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
    <td align=right>".$yM."</td>
	<td align=right>".$yF."</td>
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
 $data.="<tr>
   
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
  </tr>
  <tr>
  
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
	 <td>&nbsp;</td>
  </tr>

</table>";

$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}

function selectActivityBasedReporting($activity){
$obj= new xajaxResponse();
switch($activity){
case"Results Based":
$obj->addScriptCall("xajax_view_activityBasedIndicator",$activity);
break;
case"Sub-Activity Based":
$obj->addAlert("ok");
return $obj;
break;
default:

}
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function view_activityBasedIndicator($activity){
$obj=new xajaxResponse();

$n=1;
 $data="
 
 
 <form name='fis' id='fis' method='post' action='".$PHP_SELF."' ><table width='500' border='0' >
            <tr>
            
              <td bordercolor='#FF9933'><table  border='0'>
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; Financial Services</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr>
		   ".filter_activityBasedIndicator()."
		   </table></td></tr></table><TABLE id='' width=500><tr><td>";
		   //$ss="select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id=2)  and lower(indicator_type) like '".strtolower($activity)."' group by indicator_id order by 1 asc";
		   //$obj->addAlert($ss);
//$select=mysql_query($ss) or die(mysql_error());
		   //while($row=mysql_fetch_array($select)){
		   //$activity_id=$row['activity_id'];
		   //$activity_name=$row['activity_name'];
		   //$activity_code=$row['activity_code'];
		    // $subcomponent_id=$row['subcomponent_id'];

		   
	
		  
//$query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."'")or die(mysql_error());
       //while($rowa=mysql_fetch_array($query)){    
		   //$data.="<fieldset><legend><b><input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		   
		 $data.="<table width='600' border='0'>
    
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Total Value</td>
           </tr>";
		 $ss="select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id=2)  and lower(indicator_type) like '".strtolower($activity)."' group by indicator_id order by 1 asc";
		   //$obj->addAlert($ss);
$select=mysql_query($ss) or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($select)){
		     $m=$rowi['indicator_id'];
			 $gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='youthm[]' type='text' id='youth".$m."' size='10'readonly=readonly class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='youthf[]' type='text' id='youth".$m."' size='10' readonly=readonly onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='youthm[]' type='text' id='youth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='youthf[]' type='text' id='youth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; 
			  
$data.="<tr><td bordercolor='#FF9933'><input type='hidden' name='loopkey[]' id='loopkey' value='1' />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
            ".$sex."
              <td bordercolor='#FF9933' bgcolor='#FFFFFF'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('youth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	//$m++;
	}
		  //$data.="</table></fieldset>";
		//}  
		  //} 
	
   $data.="</td></tr><tr><td bordercolor='#FF9933' colspan=7 bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_financialServices(xajax.getFormValues('fis'));return false;\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_financialServices(){
$obj= new xajaxResponse();
$n=1;
 $data="<form name='fis' id='fis' method='post' action='".$PHP_SELF."' ><table width='500' border='0' >
            <tr>
            
              <td bordercolor='#FF9933'><table  border='0'>
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; Financial Services</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr>
		   ".filter_activityBasedIndicator()."
		   </table></td></tr></table><TABLE id='' width=500><tr><td>";
$select=mysql_query("select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id=2) group by activity_id order by 1 asc") or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];

		   
	
		  
$query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."' group by activity_name asc")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<fieldset><legend><b><input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>
    
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Total</td>
           </tr>";
		     $query1=mysql_query("select * from view_indicator where activity_id='".$activity_id."' order by subactivity_code asc")or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
$data.="<tr><td bordercolor='#FF9933'><input type='hidden' name='loopkey[]' id='loopkey' value='1' />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
              <td bordercolor='#FF9933'><input name='male[]' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			   <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933' bgcolor='#FFFFFF'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('youth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	//$m++;
	}
		  $data.="</table></fieldset>";
		}  
		  } 
		  
	
   $data.="</td></tr><tr><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_financialServices(xajax.getFormValues('fis'));return false;\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

#************
//view branch
#new branch
#save_branch
#************/
function view_branch($org_code){
$obj=new xajaxResponse();

$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
$n=1;$inc=1;


$data="".filter_branch()."<form name='Branches' id='Branches' method='post' action='".$PHP_SELF."' >
		<table width='100%' border='0'>
		<tr>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
			<th colspan='7'><div align='center'>BRANCH DETAILS</div></th>
			<th>&nbsp;</th>
			<th>&nbsp;</th>
		  </tr><tr>
			<th>NO</th>
			<th>SELECT</th>
			<th>BRANCH NAME</th>
			<th colspan=2>ORGANIZATION</th>
			<th>LOCATION</th>
			<th>DISTRICT</th>
			<th>PARISH</th>
			<th>SUBCOUNTY</th>
			<th>NORTHINGS</th>
			<th>EASTINGS</th>
		  </tr>";
  $inc=1;
 $n=1; 
$qry="select * from view_branch   
				WHERE reportingPeriod='".$quarter."' 
				AND year='".$year."' 
				AND org_code='".$org_code."' 
				order by orgName asc";

$query=mysql_query($qry)or die(mysql_error());
//$obj->addAlert($qry);

 //if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color >

 	 <td>".$n++."</td>
	 <td><input name='id[]' id='id' type='checkbox' value='".$row['branch_id']."' /></td>
	 <td>".$row['branch_name']."</td>
    <td colspan=2>".$row['orgName']."</td>
	<td>".$row['location']."</td>
    <td>".$row['districtName']."</td>
	<td>".$row['subcounty']."</td>
	<td>".$row['parish']."</td>
    <td>".$row['northings']."</td>
    <td>".$row['eastings']."</td>
  </tr>";
  $inc++;
  }//}
  //else{
  
//$obj->addAssign('status','innerHTML',noteMsg("No results Found!"));
//return $obj;
 // }
$data.="<tr>
    <td colspan=6><div id='status'></div></td>
  </tr>";
  
  
  
$data.="<tr class='evenrow2'>
	  <td><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	  <input type='checkbox' name='vcd[]' id='vcd' value='select_all' onClick='selectAll(this.form.vcd)'/></td>
	  <td colspan=4>
	  <input type='button' name='CheckAll' id='CheckAll' value='Check All'/>
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_branch(xajax.getFormValues('Branches'),'".$org_code."')\"  />
	  <input type='button' name='Delete' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('Branches'),'Branches','".$org_code."')\" /></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>";
  
$data.="</table></form>";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function search_branch(){
$obj=new xajaxResponse();

$data="<table width='650' border='0'>".filter_branch()."
<tr>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    <th colspan='2'><div align='center'>BRANCH DETAILS</div></th>
    <th>&nbsp;</th>
    <th>&nbsp;</th>
    
  </tr><tr>
    <th>NO</th>
	<th>BRANCH NAME</th>
    <th>ORGANIZATION</th>
    <th>LOCATION</th>
	<th>SUBCOUNTY</th>
	<th>PARISH</th>
    <th>NORTHINGS</th>
    <th>EASTINGS</th>
	
  </tr>
  
 ";
  $inc=1;
 $n=1; 
 $query=mysql_query("select * from view_branch")or die("because, ".mysql_error());
 //if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color >

 	 <td>".$n++."</td>
	 <td>".$row['branch_name']."</td>
    <td>".$row['orgName']."</td>
	    <td>".$row['location']."</td>
    <td>".$row['districtName']."</td>
	<td>".$row['subcounty']."</td>
	<td>".$row['parish']."</td>
    <td>".$row['northings']."</td>
    <td>".$row['eastings']."</td>
  </tr>";
  $inc++;
  }//}
  //else{
  
//$obj->addAssign('status','innerHTML',noteMsg("No results Found!"));
//return $obj;
 // }
$data.="<tr>
    <td colspan=6><div id='status'></div></td>
	
  </tr></table>";



$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_branch(){
$obj = new xajaxResponse();
 
$data="<form action='".$PHP_SELF."' method='post' name='new_branch' id='new_branch'>
            <table width='650' border='0'>
              <tr>
                <td colspan='3' class='green_links'>Program Monitoring &raquo; Access to Agricultural Finance &raquo; New Branch</td></tr>
				 <tr>
				 <tr>
                <td colspan='3'><hr/></td></tr>
				 <tr>
				 <tr>
                <td colspan='3'><div id='status'></div></td></tr>
				 <tr>
                <td colspan='3'>
                  <table width='650' border='0'>
                    <tr>
                      <td>Organization</td>
                      <td><select name='orgName' id='orgName'><option value=''>-select-</option>";
					  $select=mysql_query("select org_code,orgName from tbl_organization where orgName <> '' group by orgName")or die(mysql_error());
					while($row=mysql_fetch_array($select)){
					  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					  }
                        $data.="</select>                        </td>
                    </tr>
                    <tr>
                      <td>Branch Name:</td>
                      <td><input name='branch_name' type='text' id='branch_name' size='35' /></td>
                    </tr>
                    <tr>
					
                      <td>District:</td>
                      <td><select name='location' id='location'><option value=''>-select-</option>
                      ";
					  $select2=mysql_query("select districtCode,districtName from tbl_district where districtName <> '' group by districtName order by districtName asc")or die(mysql_error());

					  while($row=mysql_fetch_array($select2)){
					  $data.="<option value='".$row['districtCode']."'>".$row['districtName']."</option>";
					  }
                     $data.="</select></td>
                    </tr>
					 <tr>
                      <td>Sub-county:</td>
                      <td><input name='subcounty' id='subcounty' size=35  type='text' /></td>
                    </tr>
					 <tr>
                      <td>Parish:</td>
                      <td><input name='parish' id='parish' size=35 type='text' /></td>
                    </tr>
					
                    <tr>
                      <td>Northings</td>
                      <td><input name='northings' type='text' id='northings' size='35' /></td>
                    </tr>
                    <tr>
                      <td>Eastings</td>
                      <td><input name='eastings' type='text' id='eastings' size='35' /></td>
                    </tr>
                    <tr>
                      <td>Date Created:</td>
                      <td><a href='javascript:void(0)'onClick='if(self.gfPop)gfPop.fPopCalendar(document.new_branch.datecreated);return false;' hidefocus=''>
                      <input name='datecreated' type='text'  size='27' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                    </tr>
                  </table>";
				  
              $data.=" </td>
                <td width='28'>&nbsp;</td>
              </tr>
              <tr><td width='165'>&nbsp;</td>
                <td width='255'>&nbsp;</td>
                <td width='69'><input name='btn_item' type='button' id='btn_item' onclick=\"xajax_save_branch(xajax.getFormValues('new_branch'));\" value='Save' /></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
               <td colspan='4'></td>
              </tr></table></form>"; 
			  
$obj->addAssign("bodyDisplay","innerHTML",$data);
return $obj;
}


function save_branch($new_branch){
$obj=new xajaxResponse();
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');

$org= trim($new_branch['orgName']);
$branch=trim($new_branch['branch_name']);
$location= trim($new_branch['location']);
$subcounty= trim($new_branch['subcounty']);
$parish= trim($new_branch['parish']);
$northings= trim($new_branch['northings']);
$eastings= trim($new_branch['eastings']);
$datecreated= trim($new_branch['datecreated']);
//$query=;
if($branch==''){
$obj->addAssign('status','innerHTML',errorMsg("Missing Branch Name."));
return $obj;
}
else


mysql_query("insert into tbl_branch(org_code,branch_name,location,subcounty,parish,northings,eastings,date_created,reportingPeriod,year)VALUES('".$org."','".$branch."','".$location."','".$subcounty."','".$parish."','".$northings."','".$eastings."','".$datecreated."','".$reportingPeriod."','".$year."')")or die("aBi Error-Code:00175, because,".mysql_error());

$obj->addAssign('bodyDisplay','innerHTML','New Branch created.');
$obj->addScriptcall("xajax_view_branch",$org);
return $obj;
}



function view_mou($org_code){
$obj=new xajaxResponse();

$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
$n=1;$inc=1;

$query=mysql_query("select * from view_mou   
				WHERE reportingPeriod='".$quarter."' 
				AND year='".$year."' 
				AND org_code='".$org_code."' 
				order by orgName asc")or die(mysql_error());
#if(mysql_num_rows($query)>0){
$data="<form id='frmMOU' name='frmMOU' ><table width='100%' border='0'>".filter_mou()."

<tr><td colspan='7' ALIGN=center class=evenrow ><b>MEMORANDUM OF UNDERSTANDING</b></td></tr>
  <tr>
  <th width=''>N0.</th>
  <th width=''>SELECT</th>
    <th width=''>ORGANIZATION</th>
    <th width=''>MOU SIGNED?</th>
    <th width=''>DATE SIGNED</th>
    <th width=''>GUARANTEE LIMIT</th>
    <th width=''>MAX. LOAN SIZE</th>
  </tr>";
  $inc=1;$n=1;
  while($row=mysql_fetch_array($query)){ 
  $mou_id=$row[mou_id];
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color> 
    <td>".$n++."</td>
	<td><input name='id[]' id='id'  type='checkbox' value='".$mou_id."' /></td>
	<td>$row[orgName]</td>
    <td>$row[loan_agreement]</td>
    <td>$row[date_signed]</td>
    <td>$row[guarantee_limit]</td>
    <td>$row[max_loan_size]</td>
  </tr>";
  $inc++;
  }
   $data.="<tr class='evenrow'>
	  <td colspan=6> <input name='subcomponent' type='hidden' value='".$subcomponent."' />
	  <input name='org_code' type='hidden' value='".$org_code."' />
	  <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_mou(xajax.getFormValues('frmMOU'))\"  />
	  <input type='button' name='Delete' id='Delete' value='Delete' class='redhdrs' onClick=\"ConfirmDelete(xajax.getFormValues('frmMOU'),'MOU','".$org_code."')\" />
	</td>
	<td></td>
  </tr>";


  #}
  ##else{
 ## $obj->addAssign('bodyDisplay','innerHTML',noteMsg("No results Found!"));
##return $obj;}
$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function search_mou($org,$loan,$glimit,$maxloansize){
$obj=new xajaxResponse();
$select="select * from view_mou where lower(orgName) like '".$org."' && lower(loan_agreement) like '".$loan."' && lower(guarantee_limit) like '5".$glimit."%' && lower(max_loan_size) like '%".$maxloansize."%' order by orgName asc";
$query=mysql_query($select)or die(mysql_error());
//$obj->addAlert($select);
if(mysql_num_rows($query)>0){
$data="<form id='mou' name='mou' ><table width='700' border='0'>".filter_mou()."
<tr><td colspan=7 ALIGN='center' class='evenrow' ><b>MEMORANDUM OF UNDERSTANDING</b></td></tr>
  <tr>
  <th width=''>NO</th>
  <th width=''>SELECT</th>
    <th width=''>ORGANIZATION</th>
    <th width=''>MOU SIGNED?</th>
    <th width=''>DATE SIGNED</th>
    <th width=''>GUARANTEE LIMIT</th>
    <th width=''>MAX. LOAN SIZE</th>
  </tr>";
  $inc=1; $n=1;
  while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color> 
    <td>".$n++."</td>
	<td><input name='' type='checkbox' value='' /></td>
	<td>$row[orgName]</td>
    <td>$row[loan_agreement]</td>
    <td>$row[date_signed]</td>
    <td>$row[guarantee_limit]</td>
    <td>$row[max_loan_size]</td>
  </tr>";
  $inc++;
  }
  
  }
  else{
  $obj->addAssign('bodyDisplay','innerHTML',noteMsg("No results Found!"));
return $obj;}

$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_mou($org_code){
$obj=new xajaxResponse();
//$obj->addAlert('mous');

$data="<table width='620' border='0'>
<tr><td class='green_field' >Program Monitoring &raquo; ".$_SESSION['titlesubcomponent']." &raquo; New MOU  (".$_SESSION['orgName'].")</td></tr>
<tr><hr></tr>
          <tr>
            <td><form id='mou' name='mou' method='post' action=''>
              <table width='618' border='0'>
			  <tr>
				
                  <td width='' colspan=2><div id='status'></div></td></tr>
                <tr>
				
                  <td width='153'>Organization</td>
                  <td width='409'><select name='org_code' id='org_code'>";
				  
$query2=mysql_query("select * from tbl_organization   group by orgName order by orgName Asc")or die("aBi Error-Code-0057 because, ".mysql_error());
				  
				  while($row=mysql_fetch_array($query2)){
				  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
				  
				  }
				   $data.="
                 
				  
                  </select>                  </td>
                </tr>
                 <tr>
                      <td>Loan agreement signed?</td>
                      <td><input name='agrmt' type='radio' value='Yes' /> Yes    <input name='agrmt' type='radio' value='No' /> No                  </td>
                    </tr>
                <tr>
                  <td>Date signed </td>
                  <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.mou.dsigned);return false;' hidefocus=''>
                      <input name='dsigned' type='text'  size='15' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Total guarantee Limit</td>
                  <td><input name='guarantee_limit' type='text' id='guarantee_limit' size='30' /></td>
                </tr>
                <tr>
                  <td>Maximum loan size</td>
                  <td><input name='maxloan' type='text' id='maxloan' size='30' /></td>
                </tr>
                <tr>
                  
                  <td colspan=2 align=right><input type='button' name='button' id='button' value='save' onclick=\"xajax_save_mou(xajax.getFormValues('mou'))\" /></td>
                </tr>
              </table>
              </form>
              </td>
          </tr>
        </table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function save_mou($mou){
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
$reportingPeriod=substr($_SESSION['quarter'],0,10);
$obj=new xajaxResponse();
$org=$mou['org_code'];
$agrmt=$mou['agrmt'];
$dsigned=$mou['dsigned'];
$guarantee=$mou['guarantee_limit'];
$maxloan=$mou['maxloan'];
if($guarantee==''){
$obj->addAssign('status','innerHTML',errorMsg("Missing guarantee amount"));
return $obj;}
else if($maxloan==''){
$obj->addAssign('status','innerHTML',errorMsg("Enter maximum loan amount"));
return $obj;

 } else
$select="insert into tbl_mou(org_code,loan_agreement,date_signed,guarantee_limit,max_loan_size,reportingPeriod,year) values('".$org."','".$agrmt."','".$dsigned."','".$guarantee."','".$maxloan."','".$reportingPeriod."','".$year."')";
//$obj->addAlert($select);
$query=mysql_query($select)or die(mysql_error());
$obj->addAssign('bodyDisplay','innerHTML',"<font color='green'>MOU captured!</font>");
$obj->addScriptCall('xajax_view_mou',$org);
return $obj;
}

function view_grant($org_code){
$obj=new xajaxResponse();
$n=1;$inc=1;
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');


$query=mysql_query("select * from view_grant WHERE reportingPeriod='".$quarter."' 
AND year='".$year."' 
AND org_code='".$org_code."' order by subactivity_code asc")or die(mysql_error());
if(mysql_num_rows($query)>0){
$data.=" <form id='frmGrant' name='frmGrant' ><table width='100%' border='0'><table width='100%' border='0'>
".filter_grant()."
<th scope='col'>NO</th>
    <th scope='col' colspan=1>ORGANIZATION</th>
    <th scope='col' colspan=1>SUB-ACTIVITY</th>
    <th scope='col'>DATE</th>
    <th scope='col'>AMOUNT</th>
  </tr>";
  while($row=mysql_fetch_array($query)){ 
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
   <td><input name='id[]' type='checkbox' id='id' size='30'  value='".$row['grant_id']."'/>".$n++."</td>
    <td colspan=1>$row[orgName]</td>
    <td colspan=1>$row[subactivity_name]</td>
	<td>$row[date]</td>
	<td>$row[damount]</td>
    
  </tr>";
  $inc++;
  }}
  else{
  $obj->addAssign('bodyDisplay','innerHTML',noteMsg("No Results Found!"));
return $obj;
  }
  
    $data.="<tr class='evenrow2'>
	  <td><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	  <input name='org_code' type='hidden' value='".$org_code."' />
	  <input type='checkbox' name='vcd[]' id='vcd' value='select_all' onClick='selectAll(this.frmGrant.vcd)'/></td>
	  <td colspan=6>
	  <input type='button' name='CheckAll' id='CheckAll' value='Check All'/>
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_grant(xajax.getFormValues('frmGrant'))\"  />
	  <input type='button' name='Delete' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('frmGrant'),'Grant','".$org_code."')\" />
	</td>
  </tr>";
 
$data.="</table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}



function new_grant(){
$obj=new xajaxResponse();
$data="<table width='650'><tr><td><form id='grant' name='grant' method='post' action=''>
              <table width='618' border='0'>
			   <tr>
                      <td colspan=2 class=green_field>Partners Inventory &raquo; New Grant </td>
                      
                    </tr>
					  <tr>
                      <td colspan=2><hr/></td>
                      
                    </tr>
					  <tr>
                      <td colspan=2><div id='status'></div></td>
                      
                    </tr>
                <tr>
                  <td width='132'>Institution</td>
                  <td width='476'><select name='org_code' id='org_code'>";  
				  
				  $query=mysql_query('select distinct(orgName),org_code from tbl_organization order by orgName Asc')or die('aBi Error-Code-0057 because, '.mysql_error());
				  
				  while($row=mysql_fetch_array($query)){
				  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
				  
				  }
				 $data.="
                  </select>                  </td>
                </tr>
                 <tr>
                      <td>Sub-activity</td>
                      <td><select name='subactivity' id='subactivity'>";
					  $query=mysql_query("select * from  tbl_subactivity order by subactivity_code")or die(mysql_error());
					  while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['subact_id']."'>".$row['subactivity_code']." ".$row['subactivity_name']."</option>";
					  }
					  $data.="
                        </select>                        </td>
                    </tr>
                <tr>
                  <td>Date of First Disbursement</td>
                  <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.grant.fddate);return false;' hidefocus=''>
                      <input name='fddate' type='text'  size='15' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Amount</td>
                  <td><input name='amount_disbursed' type='text' id='amount_disbursed' size='30' /></td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align=right><input type='button' name='button' id='button' value='save' onclick=\"xajax_save_grant(xajax.getFormValues('grant'))\" /></td>
                </tr>
              </table>
                          </form></td></tr></table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;

}


 /*
function view_valueChainDevelopment($year,$quarter,$indicator,$org_code){
$obj= new xajaxResponse();
$_SESSION['year13']=$year;
$_SESSION['quarter1']=$quarter;
$_SESSION['indicator']=$indicator;
$_SESSION['managerorg_code']=$org_code;
$subcomponent=$_SESSION['usersubcomponent'];
$data="<form name='valueChainDevelopment' id='valueChainDevelopment'><table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; ".$_SESSION['titlesubcomponent']."</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_vcdgrid()."
  <tr class='evenrow2'>
    <tD scope='col' COLSPAN=2 class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
       <td scope='col' align='left' class='black2'>QUARTER</td>
    <td scope='col' align='left' class='black2'>INDICATOR</td>
    <td scope='col' align='right' class='black2'> ADULT MALE</td>
    <td scope='col' align='right' class='black2'> ADULT FEMALE</td>
    <td scope='col' align='right' class='black2'> MALE YOUTH</td>
	<td scope='col' align='right' class='black2'>FEMALE YOUTH</td>
    <td scope='col' align='right' class='black2'>TOTAL</td>
  </tr>";
  $n=1; $inc=1;
  $x="select * from view_organizationreporting where subcomponent_id ='".$subcomponent."%' && year like '".$_SESSION['year13']."%' && reportingPeriod like '".$_SESSION['quarter1']."%' && lower(indicator_name) like '".strtolower($_SESSION['indicator'])."%'  order by indicator_id asc";
  #$obj->addAlert($x);
  $query=mysql_query($x)or die("abi Error code:1341 because,".mysql_error());
  if(@mysql_num_rows($query)>0){
   while($row=@mysql_fetch_array($query)){ 
   $male=$row['male'];
   $m=$male>0?$male:"-";
    $female=$row['female'];
   $f=$female>0?$female:"-";
   
    $youth=$row['youth'];
   $y=$youth>0?$youth:"-";
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='checkbox[]' type='checkbox' value='".$row['id']."' /></td>
<td>".$n++."</td>
<td>$row[year]</td>
<td>$row[reportingPeriod]</td>
<td>$row[indicator_name]</td>
    <td align=right>".$m."</td>
    <td align=right>".$f."</td>
    <td align=right>".$y."</td>
	 <td align=right>".$y."</td>
    <td align=right>$row[total]</td>
  </tr>";
  $inc++;
  }
  }
 /*  else{
  $obj->addAlert("No results Found!");
  //error();
  return $obj;
  } 
$data.="<tr class='evenrow2'>
	  <td colspan=5><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'),'".$org_code."')\"  />
	  <input type='button' name='Delete' class='redhdrs' id='Delete' value='Delete' onClick=\"ConfirmDelete(xajax.getFormValues('valueChainDevelopment'),'valueChainDevelopment','".$org_code."')\" /></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>";
$data.="</table></form>";
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}

*/










function new_valueChainDevelopment_backup16042011($subcomponent,$activity_id,$org_code,$orgname){
$obj= new xajaxResponse();
$n=1;
 $org_code=$_SESSION['managerorg_code'];
 #$obj->addAlert($org_code);
$subcomponent=$_SESSION['usersubcomponent'];
$query23=mysql_fetch_array(mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")) or die("abi error-code-1815".mysql_error());
 $data="<form name='valueChainDevelopment' id='valueChainDevelopment' method='post' action='".$PHP_SELF."' ><table width='400' border='0' >
 

  <tr>
    <td scope='col'>Sub-Component:</td>
    <td scope='col'><select name='subcomponent' id='subcomponent'>";
	$query=mysql_query("select * from tbl_subcomponent where id='".$subcomponent."'")or die(mysql_error());
	while($row1=mysql_fetch_array($query)){
	$data.="<option value='".$row1['id']."' >".$row1['subcomponent']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Activity:</td>
    <td><select name='activity' id='activity'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_activity where subcomp_id='".$subcomponent."'")or die(mysql_error());
	while($row2=mysql_fetch_array($query)){
	$sel=($row2['activity_id']==$_SESSION['activity_id'])?"SELECTED":"";
	$data.="<option value='".$row2['activity_id']."' '".$sel."'>".$row2['activity_code']." ".$row2['activity_name']."</option>";
	}
	
	$data.="</select></td>
  </tr>


            <tr>
            
              <td bordercolor='#FF9933'><table  border='0'>
            <tr>
            
              <td  class='green_field' colspan='6'>Programme Monitoring &raquo; ".$query23['subcomponent']."</td>
           </tr>
		   <tr>
            
              <td colspan='6'><hr/></td>
           </tr></table></td></tr></table><TABLE id='' width=500><tr><td>";
		  $x="select * from view_indicator where subcomponent_id in(select id from tbl_subcomponent where id='".$subcomponent."') group by activity_id order by 1  asc";
//$obj->addAlert($x);
		  $select=mysql_query($x) or die(mysql_error());
		   while($row=mysql_fetch_array($select)){
		   $activity_id=$row['activity_id'];
		   $activity_name=$row['activity_name'];
		   $activity_code=$row['activity_code'];
		     $subcomponent_id=$row['subcomponent_id'];
			/*  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Male</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Adult Female</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Male Youth</td>
			  <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Female Youth</td> */

$query=mysql_query("select distinct(activity_name),subcomp_id,activity_id from tbl_activity where activity_id='".$activity_id."' group by activity_name order by activity_name asc ")or die(mysql_error());
       while($rowa=mysql_fetch_array($query)){    
		   $data.="<fieldset><legend><b><input type='hidden' name='subcomp_id[]' id='subcomp_id' value='".$rowa['subcomp_id']."'><input type='hidden' name='activity_id[]' id='activity_id' value='".$rowa['activity_id']."'>$rowa[activity_name]</b></legend>
		 <table width='600' border='0'>
    
		   <tr>
              <td height='26' bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>NO.</td>
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Indicator</td>
           
              <td bordercolor='#FF9933' bgcolor='#FFCC66' class='black2'>Total</td>
           </tr>";
		     $query1=mysql_query("select * from view_indicator where activity_id='".$activity_id."'  order by subactivity_code asc")or die(mysql_error());
			 //$m=1;
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			 $gender=$rowi['disagreggation'];
			 $genderDisagreggated2="<td bordercolor='#FF9933'><input name='male[]' readonly=readonly class='evenrow' disabled='disabled' type='text' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' readonly=readonly  disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10'readonly=readonly disabled='disabled' class='evenrow' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' readonly=readonly disabled='disabled' onKeyPress=\"return numbersonly(event, false)\" class='evenrow' /></td>";
			 $genderDisagreggated="<td bordercolor='#FF9933'><input name='male[]' type='text'  id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\"/></td>
              <td bordercolor='#FF9933'><input name='female[]' type='text' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
              <td bordercolor='#FF9933'><input name='maleyouth[]' type='text' id='maleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
			  <td bordercolor='#FF9933'><input name='femaleyouth[]' type='text' id='femaleyouth".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>";
			 $sex=($gender=="Yes")?$genderDisagreggated:$genderDisagreggated2; 

			   //".$sex." 
			 
$data.="<tr><td bordercolor='#FF9933'><input type='hidden' name='orgcode[]' id='orgcode' value='".$_SESSION['manager_orgcode']."' /><input type='hidden' name='loopkey[]' id='loopkey' value=$n />".$n++."</td>
              <td bordercolor='#FF9933'><input type='hidden' name='indicator_id[]' id='indicator_id' value='".$rowi['indicator_id']."' />$rowi[indicator_name]</td>
           
              <td bordercolor='#FF9933' bgcolor='#FFFFFF'><input name='total[]' type='text' id='total".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" onFocus=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('maleyouth".$m."').value,getElementById('femaleyouth".$m."').value,'total".$m."')\" value=''/></td>
    </tr>";
	
	//$m++;
	}
		  $data.="</table></fieldset>";
		}  
		  } 
		  $data.="</td></tr>
 </td></tr><tr><td bordercolor='#FF9933' bgcolor='#FFFFFF' align='right'>
   <input name='save' type='button' value='Save' onclick=\"xajax_save_valueChainDevelopment(xajax.getFormValues('valueChainDevelopment'))\"></td>
            </tr>
  
  
</table></form>";		 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}
















#************************
#new line of credit
#saVE LINE OF CREDIT
#view lineofcredit
#888888888888888888888888
function view_lineofcredit($org_code){
$obj=new xajaxResponse();
$subcomponent=$_SESSION['usersubcomponent'];
$sub_name=$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
$n=1;$inc=1;
$data="
".filter_lineofcredit()."<form name='LineOfCredit' id='LineOfCredit' method='post' action='".$PHP_SELF."'>
<table width='100%' border='0'>
<tr><td colspan='12' CLASS='evenrow' align=center class='green_field'><B class=black2 >LINE OF CREDIT DETAILS FOR (".$_SESSION['orgName'].")</b></td></tr>
  <tr>
    <th scope='col'>NO.</th>
	<th scope='col'>SELECT</th>
    <th scope='col'>FINANCIAL INSTITUTION </th>
    <th scope='col'>CLIENT NAME </th>
    <th scope='col'>DATE DISBURSED</th>
    <th scope='col'>LOAN VALUE </th>
    <th scope='col'>LOAN PURPOSE </th>
    <th scope='col'>LOAN MATURITY </th>
    <th scope='col'>OUTSTANDING LOAN </th>
    <th scope='col'>DATE UNDER COVERAGE </th>
    <th scope='col'>NO. OF DAYS IN ARREARS </th>
    <th scope='col'>GUARANTEE EXPOSURE </th>
  
  </tr>";
  $query=mysql_query("select * from view_lineofcredit 
  WHERE reportingPeriod='".$quarter."' 
  AND year='".$year."' 
  AND org_code='".$org_code."' 

  order by client_name asc")or die(mysql_error());
  while($row=mysql_fetch_array($query)){
	$loc_id=$row['loc_id'];
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
	    <td><input name='id[]' id='id' type='checkbox' value='".$loc_id."'/></td>
	<td><a href='#' onclick=\"xajax_locdetails()\">$row[orgName]</a></td>
    <td>$row[client_name]</td>
    <td>$row[dateGranted]</td>
    <td>$row[loanValue]</td>
    <td>$row[loanPurpose]</td>
    <td>$row[loanmaturity]</td>
    <td>$row[outsloan]</td>
    <td>$row[ducoverage]</td>
    <td>$row[days_inarrears]</td>
    <td>$row[guarantee_exposure]</td>
  </tr>";
  $inc++;
  }
  $data.="<tr class='evenrow'>
    <td colspan='5'>Overall Total:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>";
  
  $data.="<tr class='evenrow'>
	 <td colspan=6><input name='subcomponent' type='hidden' value='".$subcomponent."' />
	  <input name='org_code' type='hidden' value='".$org_code."' />
	 <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	  <input type='button' name='Edit' id='Edit' value='Edit' onClick=\"xajax_edit_lineofcredit(xajax.getFormValues('LineOfCredit'))\"  /> |
	  <input type='button' name='Delete' id='Delete' value='Delete' class='redhdrs' onClick=\"ConfirmDelete(xajax.getFormValues('LineOfCredit'),'LineOfCredit','".$org_code."')\" /></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
  </tr>";
$data.="</table></form>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}


function search_lineofcredit($org,$cname,$lvalue,$lpurpose){
$obj=new xajaxResponse();
$n=1;$inc=1;
$data="<table width='660' border='0'>".filter_lineofcredit()."
<tr><td colspan='11' CLASS='evenrow' align=center class='green_field'>LINE OF CREDIT DETAILS</td></tr>
  <tr>
    <th scope='col'>NO.</th>
    <th scope='col'>FINANCIAL INSTITUTION </th>
    <th scope='col'>CLIENT NAME </th>
    <th scope='col'>DATE GRANTED</th>
    <th scope='col'>LOAN VALUE </th>
    <th scope='col'>LOAN PURPOSE </th>
    <th scope='col'>LOAN MATURITY </th>
    <th scope='col'>OUTSTANDING LOAN </th>
    <th scope='col'>DATE UNDER COVERAGE </th>
    <th scope='col'>NO. OF DAYS IN ARREARS </th>
    <th scope='col'>GUARANTEE EXPOSURE </th>
  
  </tr>";
  
  $sel="select * from view_lineofcredit where lower(orgName) like '".$org."%'&& lower(client_name) like '".$cname."%' && lower(loanValue) like '%".$lvalue."%' && lower(loanPurpose) like '".$lpurpose."%' order by client_name asc";
  //$obj->addAlert($sel);
  $query=mysql_query($sel)or die(mysql_error());
  if(mysql_num_rows($query)>0){
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    <td>".$n++."</td>
	<td><a href='#' onclick=\"xajax_locdetails()\">$row[orgName]</a></td>
    <td>$row[client_name]</td>
    <td>$row[dateGranted]</td>
    <td>$row[loanValue]</td>
    <td>$row[loanPurpose]</td>
    <td>$row[loanmaturity]</td>
    <td>$row[outsloan]</td>
    <td>$row[ducoverage]</td>
    <td>$row[days_inarrears]</td>
    <td>$row[guarantee_exposure]</td>
   
  </tr>";
  $inc++;
  }
  }
  else
  $obj->addAlert("No results found!");
  $data.="<tr>
    
    <td colspan=2>Overall Total:</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}




function save_lineofcredit($loc){
$obj=new xajaxResponse();

$year=($_SESSION['year']!='%'&&$_SESSION['year']!='')?$_SESSION['year']:date('Y');
$reportingPeriod=substr($_SESSION['quarter'],0,10);

$fis= trim($loc['fis']);
$cname= trim($loc['cname']);
$dategranted=trim($loc['dategranted']);
$loanvalue= trim($loc['loanvalue']);
$lpurpose= trim($loc['loan_purpose']);
$loanmaturity= trim($loc['loanmaturity']);
$outsloan= trim($loc['outsloan']);
$ducoverage= trim($loc['ducoverage']);
$days_inarrears= trim($loc['days_inarrears']);
$gexposure= trim($loc['guarantee_exposure']);
$gex=0.5*$loanvalue;
//$query=;
if($cname==""){
$obj->addAssign('status','innerHTML',errorMsg("Missing client Name."));
return $obj;  }

/* if($dategranted=="")
$obj->addAssign('status','innerHTML',errorMsg("Enter date granted please!."));
return $obj;
 */
if($loanvalue==""){
$obj->addAssign('status','innerHTML',errorMsg("Enter loan value please!."));
return $obj;  }
 if($lpurpose==""){
$obj->addAssign('status','innerHTML',errorMsg("Enter loan purpose please!."));
return $obj;
}
/*
if($loanmaturity=="")
$obj->addAssign('status','innerHTML',errorMsg("Enter loan maturity."));
return $obj;
 */

$select="insert into tbl_lineofcredit(org_code,client_name,dateGranted,loanValue,loanPurpose,loanmaturity,outsloan,ducoverage,days_inarrears,guarantee_exposure ,reportingPeriod,year)VALUES('".$fis."','".$cname."','".$dategranted."','".$loanvalue."','".$lpurpose."','".$loanmaturity."','".$outsloan."',
'".$ducoverage."','".$days_inarrears."','".$gex."','".$reportingPeriod."','".$year."')";
 //$obj->addAlert($select);
 
mysql_query($select)or die("aBi Error-Code:00175 because".mysql_error());


$obj->addAssign('bodyDisplay','innerHTML','Organizational data Captured.');
$obj->addScriptcall("xajax_view_line_ofcredit");
return $obj;
}


function gex(){
$obj=new xajaxResponse();

$obj->addAssign('gex','innerHTML',$data);
$obj->addScriptcall("xajax_view_line_ofcredit");
return $obj;
}



function new_lineofcredit(){
$obj=new xajaxResponse();
$data="<table width='400' border='0'>
<tr><td class=greenlinks>Programme Monitoring &raquo; Line of Credit (".$_SESSION['orgName'].")</td></tr>
<tr><td><hr></td></tr>
<tr><td><div id='status'></div></td></tr>
      <tr>
        <td>";
		
                      $data.="<table width='100%' border='0'>
              <tr>
                <td colspan='3'><form action='".$PHP_SELF."' name='loc' id='loc' method='post'>
                  <table width='660' border='0'>
                    <tr>
                      <td width='200'>Financial Institution</td>
                      <td><select name='fis' id='fis'><option value=''>-select-</option>";
					  $query=mysql_query("select * from tbl_organization  order by orgName asc")or die(mysql_error());
					 while($row=mysql_fetch_array($query)){
					  $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					  
					  
					  }
					  
					   $data.="
                        </select>                        </td>
                    </tr>
                    <tr>
                      <td>Client  Name:</td>
                      <td><input name='cname' type='text' id='cname' size='35' /></td>
                    </tr>
                    <tr>
                      <td>Date of Disbursement</td>
                      <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.loc.dategranted);return false;' hidefocus=''>
                      <input name='dategranted' type='text'  size='28' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                    </tr>
                    <tr>
                      <td>Loan Value</td>
                      <td><input name='loanvalue' type='text' id='loanvalue' size='35'  /></td>
                    </tr>
                    <tr>
                      <td>Loan Purpose</td>
                      <td><input name='loan_purpose' type='text' id='loan_purpose' size=35'  /></td>
                    </tr>
                    <tr>
                      <td>Loan  maturity</td>
                      <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.loc.loanmaturity);return false;' hidefocus=''>
                      <input name='loanmaturity' type='text'  size='28' value=''  readonly='readonly' />
                      <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='34'></a></td>
                    </tr>
                    <tr>
                      <td>Out standing Loan</td>
                      <td><input name='outsloan' type='text' id='outsloan' size='35'  /></td>
                    </tr>
                    <tr>
                      <td>Date under coverage</td>
                      <td><a href='javascript:void(0)' onClick='if(self.gfPop)gfPop.fPopCalendar(document.loc.ducoverage);return false;' hidefocus=''>
                        <input name='ducoverage' type='text' id='ducoverage'  size=28' value=''  readonly='readonly' />
                        <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
                    </tr>
                    <tr>
                      <td>Days in arrears</td>
                      <td><input name='days_inarrears' type='text' id='days_inarrears' size='35'  /></td>
                    </tr>
                    <tr>
                      <td>Out standing Guarantee exposure</td>
                      <td><input name='guarantee_exposure' type='text' id='guarantee_exposure' size='35' value='50%'  /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td align=right><input type='button' name='button' id='button' value='Save' onclick=\"xajax_save_lineofcredit(xajax.getFormValues('loc'))\" /></td>
                    </tr>
                  </table>       </form>
               </td>
              </tr>
             
            </table>"; 
$obj->addAssign('bodyDisplay','innerHTML',$data);
return $obj;
}

function view_valueChainDevelopmentAnnualTargetvsActuals($year,$subactivity,$indicator){
$obj= new xajaxResponse();
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$date=$_SESSION['ABIActiveyear'];
$year=($year!='')?$year:$date;
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;
$_SESSION['subactivityActual']=$subactivity;
#$obj->addAlert('ok');
#$obj->addAlert($_SESSION['orgName'].'---------------'.$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-subcomp'.$subcomponent);
//$obj->addAlert($org_code);
$data="
<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; ".$sub_name."  Quarterly Physical Actuals</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_vcdgrid_actuals()."
  <tr class='evenrow2'>
    <tD scope='col'  class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
     
	   <td scope='col' align='left' class='black2' colspan=2> SUB-ACTIVITY</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>
     <td scope='col' align='right' class='black2'> ANNUAL TARGET</td>
    <td scope='col' align='right' class='black2'> ANNUAL ACTUAL</td>";
   
    $data.="<td scope='col' align='right' class='black2'>% ACHIEVED</td>
  </tr>";
  $n=1; $inc=1;
  
  
  $x=" create or replace view view_annualresults as select s.subact_id,s.subactivity_name,s.subactivity_code,i.indicator_id,i.activity_id,a.activity_code,a.activity_name,i.subcomponent_id,i.indicator_name,r.year,
   		sum(r.total) as TotalAnnualActuals
  		from tbl_indicator i
		inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
		left join tbl_activity a on(a.activity_id=i.activity_id)
    	left join tbl_organization o on(o.org_code=r.org_code)
		left join tbl_subactivity s on(s.subact_id=i.subactivity_id)
		where i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
		AND  r.year like '".$year."%' 
		 group by i.indicator_id,r.year
  		order by r.reportingPeriod,i.indicator_name asc";
		@mysql_query($x)or die(http("4421"));
		
		//$obj->addAlert($x);
   $sql="select i.indicator_id,i.indicator_name,i.subcomponent_id,
   i.year,i.subact_id,i.subactivity_code,i.subactivity_name,
   at.ptotal as totalAnnualtarget,
 i.TotalAnnualActuals,
   round(IFNULL(i.TotalAnnualActuals,0)/IFNULL(at.ptotal,0)*100,2) as percentageActualvsTargets 
   from view_annualresults i 
   inner join tbl_annualTarget at on(i.indicator_id=at.indicator_id) 
  
where i.subcomponent_id='".$subcomponent."' 
AND  i.year like '".$year."%' 
and i.subactivity_name like '".$_SESSION['subactivityActual']."%'
 and i.indicator_name like '".$_SESSION['indicator106']."%'
 group by i.indicator_id,i.year
  order by i.subactivity_code,i.indicator_name asc"; 
//$obj->addAlert($sql); 
$query=mysql_query($sql)or die(http(4439));
   while($row=mysql_fetch_array($query)){ 
   $target=($row['totalAnnualtarget']<>NULL)?$row['totalAnnualtarget']:"-";
   $ACTUAL=($row['TotalAnnualActuals']<>NULL)?$row['TotalAnnualActuals']:"-";
  
   $percentageActualvsTargets=($row['percentageActualvsTargets']!=0)?"<td align=right>".$row['percentageActualvsTargets']."%</td>":"<TD align='right'>0%</td>";
   $div="status".$row['indicator_id'];
  
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>

<td>".$n++."</td>
<td>$row[year]</td>

<td colspan=2>".$row['subactivity_code']." ".$row['subactivity_name']."</td>
<td colspan=3><a href='#' onclick=\"xajax_view_organizationsReported('".$row['indicator_id']."','".$year."','".$div."');return false;\">$row[indicator_name]</a></td>
 <td align=right>".$target."</td>
    <td align=right>".$ACTUAL."</td>".$percentageActualvsTargets."
  </tr><tr><td colspan=3></td><td colspan='6'><div id='$div'></div></td></tr>";
  $inc++;
  }
$data.="</table>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}




function view_organizationsReported($indicator_id,$year,$div){
$obj= new xajaxResponse();
$date=date('Y');
$year=($year!='')?$year:$date;
$_SESSION['year106']=$year;
$data="<table width='600'><tr class='evenrow2'><td>No</td><td>Name</td><td colspan=2>Indicator</td><td>Quarter</td><td>Actual Value</td></tr>";

 $sql="select i.indicator_id,i.indicator_name,i.subcomponent_id,s.subcomponent_code,s.subcomponent,r.org_code,o.orgName,r.reportingPeriod,r.year,
   r.total as TotalAnnualActuals
  
   from tbl_indicator i inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) inner join tbl_subcomponent s on(s.id=i.subcomponent_id) left join tbl_organization o on(o.org_code=r.org_code)
where i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
AND  r.year like '".$year."%' 
and  i.indicator_id='".$indicator_id."'
  order by r.reportingPeriod,i.indicator_name asc"; 
#$obj->addAlert($sql);
$x=1;
$query=mysql_query($sql)or die("abi Error code:491 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
    $color=$n%2==1?"evenrow":"white";
   $rep=($row['orgName']==NULL)?"<strong>".$row['subcomponent']." Manager </strong>":$row['orgName'];
   
$data.="<tr bgcolor='#f0e5a5'><td>".$x++."</td><td>".$rep."</td><td colspan=2>".$row['indicator_name']."</td><td>".$row['reportingPeriod']."</td><td align='right'>".$row['TotalAnnualActuals']."</td></tr>";

}
$sql2="select i.indicator_id,i.indicator_name,r.year,
   sum(r.total) as AnnualActuals
  
   from tbl_indicator i inner join tbl_organizationreporting r 
   on(i.indicator_id=r.indicator_id) left join tbl_organization o on(o.org_code=r.org_code)
where i.subcomponent_id='".$_SESSION['usersubcomponent']."' 
AND  r.year like '".$year."%' 
and  i.indicator_id='".$indicator_id."' group by i.indicator_id,r.year
  order by r.reportingPeriod,i.indicator_name asc";
  $tot=mysql_fetch_array(mysql_query($sql2))or die(http(4449));
$data.="<tr class='evenrow2'><td colspan=5>Total </td><td align='right'>".$tot['AnnualActuals']."</td></tr></table>";

$obj->addAssign($div,'innerHTML',$data);
return $obj;
}

function view_DCEDvalueChainDevelopmentAnnualTargetvsActuals($year,$subactivity,$indicator){
$obj= new xajaxResponse();
$subcomponent=($subcomponent!=0)?$subcomponent:$_SESSION['usersubcomponent'];
$sub_name=($sub_name!=0)?$sub_name:$_SESSION['titlesubcomponent'];
$quarter=$_SESSION['quarter'];
$year=($_SESSION['year']!='')?$_SESSION['year']:date('Y');
$_SESSION['year106']=$year;
$_SESSION['managerorg_code']=$org_code;
$_SESSION['orgName']=$orgname;
$_SESSION['indicator106']=$indicator;
$_SESSION['subactivityActual']=$subactivity;
#$obj->addAlert('ok');
#$obj->addAlert($_SESSION['orgName'].'---------------'.$org_code."-----".$orgname.$_SESSION['managerorg_code'].'------------'.$sub_name.'-subcomp'.$subcomponent);
//$obj->addAlert($org_code);
$data="
<table width='100%' border='0'>
 <tr>
    <td colspan='10' class='green_field'>Program Monitoring &raquo; ".$sub_name."  Quarterly Physical Actuals</td>
  </tr>
  <tr>
    <td colspan='10'><hr/></td>
  </tr>
  
  ".filter_DCEDvcdgrid_actuals()."
  <tr class='evenrow2'>
    <tD scope='col'  class='black2' align='right'>No.</tD>
	    <td scope='col' align='left' class='black2'>YEAR</td>
     
	   <td scope='col' align='left' class='black2' colspan=2> INTERVENTION</td>
    <td scope='col' align='left' class='black2' colspan=3>INDICATOR</td>
     <td scope='col' align='right' class='black2'> ANNUAL TARGET</td>
    <td scope='col' align='right' class='black2'> ANNUAL ACTUAL</td>";
   
    $data.="<td scope='col' align='right' class='black2'>% ACHIEVED</td>
  </tr>";
  $n=1; $inc=1;
  

   $sql="select i.indicator_id,i.indicator_name,i.indicator_type,r.year,
   intv.intervention,i.intervention_id,i.subcomponent_id, r.reportingPeriod,
   sum(at.ptotal) as totalAnnualtarget,
   sum(r.total) as TotalAnnualActuals,
   round(IFNULL(sum(r.total),0)/IFNULL(sum(at.ptotal),0)*100,2) as percentageActualvsTargets 
    from tbl_indicator i  left join tbl_annualTarget at on(i.indicator_id=at.indicator_id)  
	 inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
	 inner join tbl_intervention intv on(i.intervention_id=intv.intervention_id)  
	  where i.subcomponent_id like '".$_SESSION['usersubcomponent']."%' && i.indicator_type
	   like 'DCED Based%' && i.expected_output like 'Quantitative%'  group by indicator_id,r.year order by intv.intervention,i.indicator_name asc "; 
#$obj->addAlert($sql);
$query=mysql_query($sql)or die("abi Error code:4514 because,".mysql_error());
   while($row=mysql_fetch_array($query)){ 
   $percentageActualvsTargets=($row['percentageActualvsTargets']!=0)?"<td align=right>".$row['percentageActualvsTargets']."%</td>":"<TD align='right'>0%</td>";
   
  $div="status".$row['indicator_id'];
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>

<td>".$n++."</td>
<td>$row[year]</td>

<td colspan=2>".$row['intervention']."</td>
<td colspan=3><a href='#' onclick=\"xajax_view_organizationsReported('".$row['indicator_id']."','".$year."','".$div."');return false;\">$row[indicator_name]</a></td>
 <td align=right>".$row['totalAnnualtarget']."</td>
    <td align=right>".$row['TotalAnnualActuals']."</td>".$percentageActualvsTargets."
  </tr><tr><td colspan=3></td><td colspan='6'><div id='$div'></div></td></tr>";
  $inc++;
  }
$data.="</table>";
//$obj->addScriptCall("xajax_view_valueChainDevelopment",$subcomponent);
$obj->addAssign("bodyDisplay",'innerHTML',$data);
return $obj;
}






#**************************************
$xajax->processRequests();
?>
<html>
<head>
<?php $xajax->printJavascript('xajax_0.2.4/'); ?>



<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/js.js"></script>
<script type="text/javascript" src="js/check.js"></script>
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
</head>

<body>

<table width="870" border="0" align="center" id="content_" >
        <tr>
          <td colspan="2" valign="top">
          <?php require_once('connections/header.php'); ?></td>
        </tr>
      <tr>
        <td width="190" valign="top"><table width="190" border="0" >
            <tr>
              <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
            </tr>
          </table></td>
          <td width="660" align="left" valign="top"  ><table width="100%" border="0">
  <tr>
    <td>
   
    <div id="bodyDisplay" align="left">
            <script language="JavaScript" type="text/javascript">
			<?php $linkvar=$_GET['linkvar'];
			switch($linkvar){
			case"Quarterly Reporting":
			?>
			xajax_select_quarterlyValueChainReportingType('','');
		
			<?php 
			break;
			case"view_valueChainDevelopment":?>
			xajax_view_valueChainDevelopment('','','','','','');
			
			<?php 
			case"financialServices":
			
			?>
			xajax_view_organizationPerSubcomponent('');
			//xajax_select_financialServices();
			<?php
			break;
				case"Value Chain Manager":
			
			?>
		//xajax_annualTargetselect();
		xajax_select_ManagerQuarterlyValueChainReportingType();
			<?php
			break;
			
			
			case"spsQMS":
			
	
			 ?>	
			 xajax_view_organizationPerSubcomponent('');
				<?php
				break;
				case"genderForGrowth":
				
				 ?>
				  xajax_view_organizationPerSubcomponent('');
				 //xajax_view_genderForGrowth();
			<?php
			break; 
			case"Targets against Actuals":
				 ?>
				 xajax_view_valueChainDevelopmentAnnualTargetvsActuals('','','');
				  //xajax_view_organizationPerSubcomponent('');
				 //xajax_view_genderForGrowth();
			<?php
			break; 
			case"DCED Annual Targets against Actuals":
			?>
			xajax_view_DCEDvalueChainDevelopmentAnnualTargetvsActuals('','','');
			
			
		<?php
			break;
			case"Value Chain Development Quarterly Physical Actuals":
			?>
			
			xajax_view_organizationPerSubcomponent('','<?php echo $_SESSION['ABIActiveyear'];?>');
			<?php
			break;
			
			default: ?>
//xajax_view_organizationPerSubcomponent('');

//xajax_select_quarterlyValueChainReportingType();
<?php }?>
    </script>
                  </div>          <div id="status"></div>
                  
                   <!--to be included immediately after the -->
										<script type="text/javascript">
											var countries=new ddtabcontent("countrytabs")
											countries.setpersist(true)
											countries.setselectedClassTarget("link") //"link" or "linkparent"
											countries.init()
										</script>
										
										<script type="text/javascript">
											var countries=new ddtabcontent("countrytabs1")
											countries.setpersist(true)
											countries.setselectedClassTarget("link") //"link" or "linkparent"
											countries.init()
										</script>

</td>
  </tr>
</table>
</td>
  </tr>
      <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
        </tr>
        </table></td>
  </tr>
</table>

</div>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

