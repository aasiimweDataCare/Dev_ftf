<?php
//------------------------------FAQs---------------

//-----------------MER Layout save-----------------


function save_programme($formValues){
$obj=new xajaxResponse();
$pname=$formValues['pname'];
$pcode=$formValues['pcode'];
$pfunder=$formValues['pfunder'];
$pdescription=$formValues['pdescription'];
$organization=$formValues['organization'];
//$xx=str_replace("'","",$x);
 if($pname==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Program Name</li>"));
return $obj;
}
/* if($pfunder==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Funder Name</li>"));
return $obj;
 } */

$query="insert into tbl_programme(program_name,program_code,Funder,details,imp_org) values('".mysql_real_escape_string($pname)."','".mysql_real_escape_string($pcode)."','".mysql_real_escape_string($pfunder)."','".mysql_real_escape_string(str_replace("'","",$pdescription))."','".$organization."')";
@mysql_query($query)or die(http("SV-0018"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_programme",'','');
return $obj;
}


function save_goal($formValues){
$obj=new xajaxResponse();
$supergoal_id=$formValues['supergoal_id'];
$cprogramme=$formValues['cprogramme'];
$supergoal=$formValues['supergoal'];
$pdescription=$formValues['pdescription'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['subprogram'];
$project=$formValues['project'];
$component=$formValues['supergoal'];
//$xx=str_replace("'","",$x);
/*  if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select Goal Type</li>"));
return $obj;
} */
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Goal Name</li>"));
return $obj;
 } 

$query="insert into tbl_goal(supergoal_id,prog_id,subprog_id,project_id,type,component,description) 
values('".$supergoal_id."','".mysql_real_escape_string($cprogramme)."','".$subprogram."','".$project."','".$supergoaltype."','".$component."','".mysql_real_escape_string(str_replace("'","",$pdescription))."')";
//$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_goal",'','','','','','');
return $obj;
}

function save_purpose($formValues){
$obj=new xajaxResponse();

//--------
$prog_id=$formValues['prog_id'];
$cprogramme=$formValues['cprogramme'];
$supergoal=$formValues['supergoal'];
$pdescription=$formValues['pdescription'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['subprogram'];
$code=$formValues['code'];
$component=$formValues['supergoal'];
//$xx=str_replace("'","",$x);
 if($code==""){
$obj->assign("status","innerHTML",errorMsg("<li>Missing Purpose Code</li>"));
return $obj;
} 
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Purpose Name</li>"));
return $obj;
 } 

$query="insert into tbl_purpose(prog_id,subprog_id,component_code,type,component,description) 
values('".$prog_id."','".$subprogram."','".$code."','".$supergoaltype."','".$component."','".mysql_real_escape_string(str_replace("'","",$pdescription))."')";
//$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_purpose",'','','','','','');
return $obj;
}





//------------------save goal---------------------------------------
function save_supergoal($formValues){
$obj=new xajaxResponse();
$cprogramme=$formValues['cprogramme'];
$supergoal=$formValues['supergoal'];
$pdescription=$formValues['pdescription'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['subprogram'];
$project=$formValues['project'];
$component=$formValues['supergoal'];
//$xx=str_replace("'","",$x);
 if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select SuperGoal Type</li>"));
return $obj;
}
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Super Goal Name</li>"));
return $obj;
 } 

$query="insert into tbl_supergoal(prog_id,subprog_id,project_id,type,component,description) 
values('".mysql_real_escape_string($cprogramme)."','".$subprogram."','".$project."','".$supergoaltype."','".$component."','".mysql_real_escape_string(str_replace("'","",$pdescription))."')";
$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_supergoal",'','','','','','');
return $obj;
}





//s==========save  output========================================
function save_output($formValues){
$obj=new xajaxResponse();
//------------>>>>>>><<<<<<<--------------------
$program=get_Stringorg($formValues['program']);
$output_code=$formValues['output_code'];
$output_name=$formValues['output_name'];
//---------------xxxxxxxx-----------------
$supergoal_id=$formValues['supergoal_id'];
$cprogramme=$formValues['prog_id'];
$goal_id=$formValues['goal_id'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['outcome'];
$project=$formValues['project'];
$purpose_id=$formValues['purpose_id'];
//$program=$formValues['program'];
//--------------->>>>>>>>>><<<<<<<<<<<------------
/*  if($supergoaltype==''){
$obj->assign('status','innerHTML',noteMsg("Please Enter Output Type!"));
return $obj;
} */
if($output_name==''){
$obj->assign('status','innerHTML',noteMsg("Please Enter Output Name!"));
return $obj;
} 
$outputcode=mysql_fetch_array(mysql_query("select * from tbl_output where output_code='".$output_code."' order by output_name asc"));
if($output_code==$outputcode['output_code']){
$obj->alert("Output Code Already Exists. Please Change the Output Code and Save again!");
return $obj;
//$erCount++;
} 


$query="insert into tbl_output(goal_id,purpose_id,prog_id,subprog_id,output_code,output_name)
 values('".$goal_id."','".$purpose_id."','".$cprogramme."','".$subprogram."',
 '".mysql_real_escape_string($output_code)."','".mysql_real_escape_string($output_name)."') ";
//$obj->alert($query);
@mysql_query($query)or die(http("SV-0042"));

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_output",'','','','','');
return $obj;
}



function save_indicatorDefinition($formvalues){
$obj=new xajaxResponse();
//variables
$indicator_type=$formvalues['indicator_type'];
$indicator_id=$formvalues['indicator'];
//$obj->alert($indicator_id);
for($i=0;$i<count($formvalues['loopkey']);$i++){
$expected_output=$formvalues['output'][$i];
$defn=mysql_real_escape_string($formvalues['definition'][$i]);


if($defn<>''){
$insert="INSERT INTO tbl_indicator_definition(`indicator_id`, `DefName`,expected_output,`updatedby`) 
values('".$indicator_id."','".$defn."','".$expected_output."','".$_SESSION['username']."')";
@mysql_query($insert)or die(http("SV-0063"));
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_indicatorDefinition",'','','','',1,20);
return $obj;

}










//-----------------end of M&E layout save------------------------
//--------------workplan save-----------------------------0------



function save_LOPTargetExtendedBACKUP($formvalues){
$obj=new xajaxResponse();
$Program=$formvalues['Program'];
$Project=$formvalues['Project'];
$subcomponent=$formvalues['subcomponent'];
$fyear=$formvalues['fyear'];
$_SESSION['semiAnnual']=(($_SESSION['quarter']=='Jan - Mar') or ($_SESSION['quarter']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";

/* if($fyear==''){
$obj->alert("Missing year");
return $obj;

} */

//$obj->alert(count($formvalues['loopkey']));
for($i=0;$i<count($formvalues['loopkey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$baseline=$formvalues['base'][$i];
$qtr1=$formvalues['qtr1'][$i];
$qtr2=$formvalues['qtr2'][$i];
$qtr3=$formvalues['qtr3'][$i];
$qtr4=$formvalues['qtr4'][$i];
$qtr5=$formvalues['qtr5'][$i];
$total=$formvalues['target'][$i];


 /* $indcode=@mysql_fetch_array(@mysql_query("select * from tbl_loptargets where indicator_id='".$indicator."' order by indicator_id asc"));
if($indicator.$fyear==$indcode['indicator_id'].$indcode['curr_year']){
$obj->alert("Duplicate Entry: Life of Project Target ".$indicator." Already Exists!");
return $obj;
//$erCount++;
}  */ 

$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));

if($total!=''){

$sql="select * from tbl_loptargets where indicator_id='".$indicator."'";

/*  && target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)||currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)||currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)||currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)||currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."' */
//$obj->alert($sql);
$query=@mysql_query($sql) or die(http("WP-42"));

if(mysql_num_rows($query)>0){
//-----------ASARECA LOP Targets

/* $insert="update tbl_loptargets set period='5',Target='".$qtr1."',lastUpdatedby='".$_SESSION['username']."'
 where  target_year='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."' and 
indicator_id='".$indicator."'";
$query=@mysql_query($insert)or die(http("Save-235")); */

//$query1=@mysql_query("delete from tbl_loptargets where indicator_id='".$indicator."' ")or die(http("Save-54"));

$insert1="replace INTO tbl_loptargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
values('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."','".$indicator."','".$qtr1."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."','".$indicator."','".$qtr2."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."','".$indicator."','".$qtr3."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."','".$indicator."','".$qtr4."','".$_SESSION['username']."','".$baseline."'),
('5','".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],4)."','".$indicator."','".$qtr5."','".$_SESSION['username']."','".$baseline."')
";
$query1=@mysql_query($insert1)or die(http("Save-59"));
//$obj->alert($insert1);
}
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
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
return $obj;
}





function save_AnnualTargetExtended($formvalues){
$obj=new xajaxResponse();
$Program=$formvalues['Program'];
$Project=$formvalues['Project'];
$subcomponent=$formvalues['subcomponent'];
$fyear=$formvalues['fyear'];
$_SESSION['semiAnnual']=(($_SESSION['quarter']=='Jan - Mar') or ($_SESSION['quarter']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";

if($fyear==''){
$obj->alert("Missing year");
return $obj;

}

//$obj->alert(count($formvalues['loopkey']));
for($i=0;$i<count($formvalues['loopkey']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$baseline=$formvalues['baselinevalue'][$i];
$qtr1=$formvalues['qtr1'][$i];
$qtr2=$formvalues['qtr2'][$i];
$qtr3=$formvalues['qtr3'][$i];
$qtr4=$formvalues['qtr4'][$i];
$total=$formvalues['target'][$i];


 $indcode=@mysql_fetch_array(@mysql_query("select * from tbl_workplan where indicator_id='".$indicator."' and curr_year='".$fyear."' order by indicator_id asc"));
if($indicator.$fyear==$indcode['indicator_id'].$indcode['curr_year']){
$obj->alert("Duplicate Entry  Annual Targets for ".$indicator."-".$fyear." Already Exists!");
return $obj;
//$erCount++;
}  

if($total!=''){

$insert="INSERT INTO tbl_workplan(curr_year,semi_annual,Quarter,indicator_id,baseline,Target,lastUpdatedby) 
values('".$fyear."','','','".$indicator."','".$baseline."','".$total."','".$_SESSION['username']."')";
$query=@mysql_query($insert)or die(http("Save-235"));

//$obj->alert($insert);

}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_ViewAnnualTargets",'','','','','',1,20);
return $obj;
}


function save_AnnualResults($formvalues){
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
for($i=0;$i<count($formvalues['indicator_id']);$i++){
$indicator=$formvalues['indicator_id'][$i];
$male=$formvalues['male'][$i];
$female=$formvalues['female'][$i];
$total=$formvalues['target'][$i];

if($fyear==''){
$obj->alert("Missing year of Reporting");
return $obj;

}
if($total<>''){
//$obj->alert("Enter Total Annual Actual");
//return $obj;




$insert="INSERT INTO tbl_organizationreporting(year,reportingPeriod,indicator_id,male,female,total,updatedby,org_code,subcomponent_id,output_id,startdate,enddate,semi_annual)
 values('".$fyear."','".$_SESSION['quarter']."','".$indicator."','".$male."','".$female."','".$total."','".$_SESSION['username']."','".$org_code."','".$subcomponent."','".$output."','".$StartDate."','".$endDate."','".$_SESSION['quarter']."')";

#$obj->addAlert($insert);
@mysql_query($insert)or die(http("SV-283"));
}}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_AnnualResults",'','','','','','','',1,20);
return $obj;
}


//****************************************************************************88888
//--------General Functions---------------------------------------------------------

/*---------------------- function : SavePermissions-----------------------------------------------------------------*/
function SavePermissions($aFormValues){
session_start();
//Full Texts 	tbl_permisionsId 	role_id 	MenuItem 	EntryDate 	EnteredBy
$objResponse = new xajaxResponse();
$Done='';
if($aFormValues['PermitGroup']!=''){

$Done="User Permissions"; 
$query_DelPermissions = "Delete FROM tbl_permisions WHERE role_id='".$aFormValues['PermitGroup']."'";
$DelPermissions = mysql_query($query_DelPermissions);
$role_name=mysql_fetch_array(mysql_query("select * from tbl_role where role_id='".$aFormValues['PermitGroup']."'"))or die(http(0114));
$RoleName=$role_name['role_name'];
for($i=0;$i< count($aFormValues['MenuItem']); $i++){

//Per_PermitGroup 	Per_MenuItem 	Per_AllowAccess 	EntryDate 	EnteredBy
//$save=Save_Permissions($cur_user,$Today,$Per_PermitGroup,$This_MenuItem) ;

 $query_CHKPermissions = "SELECT * FROM tbl_permisions 
						WHERE role_id='".$aFormValues['PermitGroup']."'
						AND MenuItem='".$aFormValues['MenuItem'][$i]."'
						";
		
		$CHKPermissions = mysql_query($query_CHKPermissions);
		$Totalvalues=mysql_num_rows($CHKPermissions);

		if ($Totalvalues!=0){
			 $query_addPermissions = "UPDATE tbl_permisions set 
								role_id='".$aFormValues['PermitGroup']."',
								MenuItem='".$aFormValues['MenuItem'][$i]."',
								EnteredBy='".$_SESSION['username']."'
								WHERE role_id='".$aFormValues['PermitGroup']."'
								AND MenuItem='".$aFormValues['MenuItem'][$i]."'";
		}else{
		 $query_addPermissions = "Insert into  tbl_permisions set 
								role_id='".$aFormValues['PermitGroup']."',
								MenuItem='".$aFormValues['MenuItem'][$i]."',
								EnteredBy='".$_SESSION['username']."'";
			}			 
		//$objResponse->addAlert($query_addPermissions);						
		$addPermissions = mysql_query($query_addPermissions);
	}
}//save Permissions
	if($Done!="")$objResponse->assign('bodyDisplay','innerHTML',congMsg($Done.", for ".$RoleName." Granted/Revoked!"));
	else $objResponse->alert("Please select a user Role to Grant or Deny/Revoke Access.");
	//AddBankAccount()
	//$objResponse->call("xajax_UserPermissions","");
	return $objResponse;
}


function add_user($user){
$obj=new xajaxResponse();
$fname=trim($user['fname']);
$subcomponent=trim($user['subcomponent']);
$program_code=trim($user['program']);
$project=trim($user['Project']);
$lname=trim($user['lname']);
$usergroup=trim($user['usergroup']);
$username=trim($user['username']);
$name=$fname." ".$lname;
$role=trim($user['role']);
$password=trim($user['password']);
$cpass=trim($user['cpass']);
$district=trim($user['district']);
$organization=trim($user['organization']);
$code=trim($user['code']);
$vcode=trim($user['vcode']);
$country=trim($user['country']);
//validation
if($fname==''){
$obj->assign('status',"innerHTML",errorMsg("Missing FirstName"));
return $obj;
}else 
if($lname==''){
$obj->assign('status',"innerHTML",errorMsg("Missing LastName"));
return $obj;
}else if($password==''){
$obj->assign('status',"innerHTML",errorMsg("Missing Password"));
return $obj;
}
else if($cpass==''){
$obj->assign('status',"innerHTML",errorMsg("confirmCommands Password!"));
return $obj;
}
else if(strlen($password)<6){
$obj->assign('status',"innerHTML",errorMsg("Weak Password,Password should be more than 6 characters"));
return $obj;
} 
else if($password!=$cpass){
$obj->assign('status',"innerHTML",errorMsg("Password Mismatch"));
return $obj;
}
else if($vcode==''){
$obj->assign('status',"innerHTML",errorMsg("Enter Verification Code"));
return $obj;
}
else if($code!=$vcode){
$obj->assign('status',"innerHTML",errorMsg("Invalid Verification Code"));
return $obj;
}
else
$stmnt="insert into tbl_user(name,username,password,role,subcomponent,program_id,org_code,district,usergroup,project_id,country)values('".$name."','".$username."','".md5($password)."','".$role."','".$subcomponent."','".$program_code."','".$organization."','".$district."','".$usergroup."','".$project."','".$country."')";
$obj->alert($stmnt);

$query=mysql_query("insert into tbl_user(name,username,password,
                   role,org_code,district,
                   usergroup,country)values('".$name."','".$username."','".md5($password)."',
                   '".$role."','".$organization."','".$district."',
                   '".$usergroup."','".$country."')")or die(http(0704));


$obj->assign('bodyDisplay','innerHTML',congMsg("New User Created!"));
$obj->call("xajax_view_users",'','','','');
return $obj;
}





 function save_project($formvalues){
$obj=new xajaxResponse();
$program=$formvalues['program'];
$subprogram=mysql_real_escape_string($formvalues['subprogram']);
$goal=mysql_real_escape_string($formvalues['goal']);
$project_purpose=mysql_real_escape_string($formvalues['project_purpose']);
$project_code=mysql_real_escape_string($formvalues['project_code']);
$project_goal=mysql_real_escape_string($formvalues['proj_goal']);
$title=mysql_real_escape_string($formvalues['title']);
$background=mysql_real_escape_string($formvalues['background']);
$funding_type=mysql_real_escape_string($formvalues['funding_type']);
$organization=mysql_real_escape_string(get_Stringorg($formvalues['organization']));
$country=mysql_real_escape_string(get_Stringorg($formvalues['country']));
$leadInstitution=mysql_real_escape_string($formvalues['leadInstitution']);
$status=mysql_real_escape_string($formvalues['status']);
$duration=mysql_real_escape_string($formvalues['duration']);
$fromdatevisited=mysql_real_escape_string($formvalues['fromdatevisited']);
$todatevisited=mysql_real_escape_string($formvalues['todatevisited']);
$newending_date=mysql_real_escape_string($formvalues['newendingdate']);
$source_of_funding=mysql_real_escape_string(get_Stringorg($formvalues['source']));
$amount=mysql_real_escape_string(get_Stringorg($formvalues['amount']));
$shortfall=mysql_real_escape_string(get_Stringorg($formvalues['shortfall']));
$principalinvestigator=mysql_real_escape_string($formvalues['principalinvestigator']);

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
 /**/
		
 $query=@mysql_query("insert into  tbl_project( `programme_id`, 
 `subprogram_code`,
 `goal`, 
 purpose,
 `project_code`,
  `title`,project_goal,
  `background`,
  `projectFundingtype`,
   `countries`,
    `institutions`,
	 `leadInstitution`,principalinvestigator,
	  `status`,
	  `duration`, 
	  `startDate`, 
	  `EndDate`,
	   `NewendingDate`,
	   totalprojectFunding,
	    `sourceof_funding`,
   `amount_available`,
    `shortfall`,
	`updatedby`) 
		values('".mysql_real_escape_string($program)."',
		'".$subprogram."',
		'".$goal."',
		'".$project_purpose."'
		,'".$project_code."',
		'".$title."','".$project_goal."',
		'".$background."',
		'".$funding_type."',
		'".$country."',
		'".$organization."',
		'".$leadInstitution."','".$principalinvestigator."',
		'".$status."',
		'".$duration."',
		'".$fromdatevisited."',
		'".$todatevisited."',
		'".$newending_date."',
		'".$totalfunding."',
		'".$source_of_funding."',
		'".$amount."',
		'".$shortfall."',
		'".$_SESSION['username']."')")or die(http(0043));
		
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_project",'','','','','',1,20);
return $obj;
} 


//==========================old records========================




function save_TrainingParticipants($formvalues){
$obj=new xajaxResponse();
$n=1;
	$task=$formvalues['task'];	
	$district=$formvalues['district'];
	$trainer=$formvalues['trainer'];
		$orgdate=$formvalues['orgdate'];
	
	
	$error="<ul>";
		$erCount=0;
if($district==''){
		$error.="<li>Select District Name</li>";
		$erCount++;
		}
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
$insert="insert into tbl_training(semi_annual,year, `org_code`,`training_topic`, `trainer`,
 `typeofparticipants`, `name_oftrainee`, `gender`, `number_of_times`, `organizing_date`,
  `updatedby`, `district`, `subcounty`, `parish`, `task`,village)
values('".$_SESSION['quarter']."','".$_SESSION['Activeyear']."','".$org_code."','".$trainingtopic."',
'".$trainer."','".$trainees."','".$name."','".$sex."','".$num_training."','".$orgdate."',
'".$_SESSION['username']."','".$district."','".$subcounty."','".$parishCode."','".$task."','".$village."')";

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



function save_home($formvalues){
$obj=new xajaxResponse();
$heading=mysql_real_escape_string($formvalues['heading']);
$body=mysql_real_escape_string($formvalues['body']);
mysql_query("insert into tbl_home(head,body) values('".mysql_real_escape_string($heading)."','".mysql_real_escape_string($body)."')")or die(mysql_error());
$obj->assign('bodyDisplay','innerHTML',congMsg("New home details captured!"));
$obj->call("xajax_view_home",'');
return $obj;
}

function save_usergroup($formvalues){
$obj=new xajaxResponse();
$groupName=$formvalues['groupname'];
$desc=$formvalues['desc'];
if($groupName==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter group Name!"));
return $obj;
}else
mysql_query("insert into tbl_usergroup(group_name,description) values('".$groupName."','".$desc."')")or die(mysql_error());
$obj->assign('bodyDisplay','innerHTML',congMsg("New user group created!"));
$obj->call("xajax_view_usergroup");
return $obj;
}

function save_role($formvalues){
$obj=new xajaxResponse();
$role=$formvalues['role_name'];
$groupName=$formvalues['group_name'];
$desc=$formvalues['desc'];
if($role==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Role Name!"));
return $obj;
}if($groupName==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter User Group!"));
return $obj;
}

@mysql_query("insert into tbl_role (role_name,usergroup,description) values('".$role."','".$groupName."','".$desc."')")or die(mysql_error());
$obj->assign('new_role','innerHTML',congMsg("New user role created!"));
$obj->call("xajax_view_role",'','');
return $obj;
}




 function saveZonalMapping($formValues){
$obj=new xajaxResponse();
 $district=get_stringorg($formValues['district']);
 #$obj->addAlert($district);
$orgName=trim($formValues['orgName']);
$zonename=trim($formValues['zonename']);
 
 $insert="INSERT INTO tbl_zonalMapping(zone,orgName,districts_inZone) values('".$zonename."','".$orgName."','".$district."'); ";
 
 mysql_query($insert)or die(http(260));
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Zonal Captured."));
$obj->call("xajax_view_zonalMapping",'','','','','','','');
return $obj;
 }
#**************************************************
/* 
function get_Stringorg($getString){
$str="";
for($i=0;$i< count($getString); $i++){
if($str!='')$temp=$str.", ".$getString[$i];
else $temp=$str."".$getString[$i];
$str=$temp;
$gotString=$temp;
}
return $gotString;
}
  */

	function save_organization($formvalues){
$obj=new xajaxResponse();
//$obj->addAlert("ok!");
$orgName=mysql_real_escape_string($formvalues['orgname']);
$acronym=trim($formvalues['acronym']);
$registered=trim($formvalues['registered']);
$zonename=trim($formvalues['zonename']);
$regno=trim($formvalues['regno']);
$district=trim($formvalues['district']);
$subcounty=trim($formvalues['subcounty']);
$parish=trim($formvalues['parish']);
$orgtype=trim($formvalues['orgtype']);
$mission=mysql_real_escape_string($formvalues['mission']);
$vision=mysql_real_escape_string($formvalues['vision']);
$objectives=mysql_real_escape_string($formvalues['objectives']);


$username=trim($formvalues['username']);
$password=trim($formvalues['password']);
$subsector=get_stringorg($formvalues['subsector']);
#$obj->addAlert($subsector);
$district=mysql_real_escape_string($formvalues['district']);
$country=trim($formvalues['country']); 
$subcounty=trim($formvalues['subcounty']);
$parish=trim($formvalues['parish']);

$address=mysql_real_escape_string($formvalues['address']);
$website=trim($formvalues['website']); 
$fax=trim($formvalues['fax']);

$contact_person=trim($formvalues['contact_person']);
$title=trim($formvalues['title']);
$tel_code=trim($formvalues['tel_code']);
$telephone=trim($formvalues['telephone']);
$tel2=$tel_code.$telephone;
$mobile=trim($formvalues['mobile']);
$mobile2=$tel_code.$mobile;
$brief_introduction=trim($formvalues['brief_introduction']);
$contact_person2=trim($formvalues['contact_person2']);
$title2=trim($formvalues['title2']);
$telephone2=trim($formvalues['telephone2']);
$tel22=$tel_code.$telephone2;
$mobile2=trim($formvalues['mobile2']);
$mobile22=$tel_code.$mobile2;
$contact_person3=trim($formvalues['contact_person3']);
$title3=trim($formvalues['title3']);
$telephone3=trim($formvalues['telephone3']);
$tel3=$tel_code.$telephone3;
$mobile3=trim($formvalues['mobile3']);
$mobile33=$tel_code.$mobile2;
//-------------------------------------
$maleF=trim($formvalues['male']);
$femaleF=trim($formvalues['female']);
$totalF=$formvalues['total'];

$maleheadedHHH=trim($formvalues['maleh']);
$femaleheadedHH=trim($formvalues['femaleh']);
$totalHH=$formvalues['totalh'];



if($orgName==""){
$obj->assign("status","innerHTML",errorMsg("Enter Organization Name"));
return $obj;
}
/* if($username==""){
$obj->assign("status","innerHTML",errorMsg("Enter userName"));
return $obj;
} */
if($contact_person==""){
$obj->assign("status","innerHTML",errorMsg("Enter contact Person's Name"));
return $obj;
}


$insert="INSERT INTO tbl_organization(orgName,acronym,country_id,orgtype,district,subcounty,parish,
username,password,address,website,contact_person,title,telephone,mobile,
contact_person2,title2,telephone2,mobile2,
contact_person3,title3,telephone3,mobile3,fax,
`maleFarmers`, `femaleFarmers`, `totalF`, `maleheadedHH`, `femaleheadedHH`, `totalHH`)
VALUES('".ucwords($orgName)."','".strtoupper($acronym)."',
'".$country."','".$orgtype."','".$district."','".$subcounty."','".$parish."',
'".$username."','".md5($password)."','".$address."','".$website."','".$contact_person."','".$title."','".$tel2."','".$mobile2."',
'".$contact_person2."','".$title2."','".$tel22."','".$mobile22."',
'".$contact_person3."','".$title3."','".$tel3."','".$maobile33."','".$fax."',
'".$maleF."','".$femaleF."','".$totalF."','".$maleheadedHHH."','".$femaleheadedHH."','".$totalHH."'
)";

//$obj->alert($insert);

$query=@mysql_query($insert)or die(http("SAVE-0399"));
//
#$obj->addAlert($insert);
//$max
//mysql_query("insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,o.organization_type from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_ where username='".$username."');")or die("aBi error code 00236 because, ".mysql_error());

$sql="insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,l.codeName  from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_lookup l on(l.code=o.orgtype) where  l.classCode='1' and username='".$username."')";
#$obj->addAlert($sql);
//mysql_query($sql)or die(http(407));
$obj->assign("bodyDisplay","innerHTML",congMsg("Organization Captured!"));
$obj->call("xajax_view_organization",'','','',1,20);
//$obj->redirect('organization.php');
return $obj;
}




function save_district($formvalues,$linkvar){
$obj=new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->AddAlert("Access Denied!\n Only the Monitoring and Evaluation specialist can add a District!");
$obj->redirect("index.php");
return $obj;
} */
$districtName=mysql_real_escape_string($formvalues['districtName']);
$acronym=mysql_real_escape_string($formvalues['txtacronym']);
$zone=$formvalues['zone'];
$subcountyCode=$formvalues['subcountyCode'];
$entryType=$formvalues['entryType'];
#for($i=0;$i<count())

$serviceproviders=$formvalues['serviceproviders'];


if($districtName==''){

$obj->assign("status","innerHTML",errorMsg("<li>Enter District Name</li>"));
return $obj;
}


switch($linkvar){
 case "new_subcounty":
 for($i=0;$i<count($formvalues['loopkey']);$i++){
$subcounty=$formvalues['subcounty'][$i];

/* if($subcounty==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Subcounty Name</li>"));
return $obj;
} */
if($subcounty<>""){
$sql="INSERT INTO tbl_subcounty (districtCode,subcountyName) values('".$districtName."','".$subcounty."')";
$check=@mysql_query($sql)or die(http(0728));
#$obj->AddAlert($sql);
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Subcounty(S) Captured!"));
//$obj->call('xajax_view_subcounty','','','',1,20);
return $obj;
break;
case "new_parish":
 for($i=0;$i<count($formvalues['loopkey']);$i++){

$parish=$formvalues['parish'][$i];
/* if($parish==""){

$obj->assign("status","innerHTML",errorMsg("<li>Enter Parish Name</li>"));
return $obj;
} */
if($parish<>""){
$sql2="INSERT INTO tbl_parish (districtCode,subcountyCode,ParishName) values('".$districtName."','".$subcountyCode."','".$parish."')";
#$obj->AddAlert($sql2);
$check=@mysql_query($sql2)or die(http(0730));
}}
$obj->assign('bodyDisplay','innerHTML',congMsg("Parish Captured!"));
//$obj->call('xajax_view_parish','','','','',1,20);
return $obj;
break;
case"new_district":
 

if($acronym==""){

$obj->assign("status","innerHTML",errorMsg("<li>Enter Acronym</li>"));
return $obj;
}
if($zone==""){

$obj->assign("status","innerHTML",errorMsg("<li>Select Zone Name</li>"));
return $obj;
}  

if($zone==""){

$obj->assign("status","innerHTML",errorMsg("<li>Select Zone Name</li>"));
return $obj;
} 
$xx="INSERT INTO tbl_district (districtName,acronym,Zone,tso_service_providers,entryType) values('".$districtName."','".$acronym."','".$zone."','".$serviceproviders."','".$entryType."')";
#$obj->addAlert($xx);
$check=@mysql_query($xx)or die(http(0736));
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
//$obj->call('xajax_view_district','','',1,20);
return $obj;

break;
default:

}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call('xajax_view_district','','',1,20);
return $obj;
}




function save_subcounty($formvalues,$linkvar){
$obj=new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->AddAlert("Access Denied!\n Only the Monitoring and Evaluation specialist can add a District!");
$obj->redirect("index.php");
return $obj;
} */
$districtName=mysql_real_escape_string($formvalues['districtName']);
$acronym=mysql_real_escape_string($formvalues['txtacronym']);
$zone=$formvalues['zone'];
$entryType=$formvalues['entryType'];
#for($i=0;$i<count())
$subcounty=$formvalues['subcounty'];
$parish=$formvalues['parish'];
$serviceproviders=$formvalues['serviceproviders'];


if($districtName==''){

$obj->assign("status","innerHTML",errorMsg("<li>Enter District Name</li>"));
return $obj;
}


switch($linkvar){
 case "new_subcounty":

if($subcounty==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Subcounty Name</li>"));
return $obj;
}
$sql="INSERT INTO tbl_subcounty (districtCode,subcountyName) values('".$districtName."','".$subcounty."')";
$check=@mysql_query($sql)or die(http(0728));
$obj->assign('bodyDisplay','innerHTML',congMsg("Subcounty Captured!"));
$obj->call('xajax_view_subcounty','','','',1,20);
return $obj;
break;
case "new_parish":

if($parish==""){

$obj->assign("status","innerHTML",errorMsg("<li>Enter Parish Name</li>"));
return $obj;
}
$sql2="INSERT INTO tbl_parish (districtCode,subcountyCode,ParishName) values('".$districtName."','".$subcounty."','".$parish."')";
#$obj->AddAlert($sql2);
$check=@mysql_query($sql2)or die(http(0730));
$obj->assign('bodyDisplay','innerHTML',congMsg("Parish Captured!"));
$obj->call('xajax_view_parish','','','','',1,20);
return $obj;
break;
case"new_district":
 

if($acronym==""){

$obj->assign("status","innerHTML",errorMsg("<li>Enter Acronym</li>"));
return $obj;
}
if($zone==""){

$obj->assign("status","innerHTML",errorMsg("<li>Select Zone Name</li>"));
return $obj;
}  

if($zone==""){

$obj->assign("status","innerHTML",errorMsg("<li>Select Zone Name</li>"));
return $obj;
} 
$xx="INSERT INTO tbl_district (districtName,acronym,Zone,tso_service_providers,entryType) values('".$districtName."','".$acronym."','".$zone."','".$serviceproviders."','".$entryType."')";
#$obj->addAlert($xx);
$check=@mysql_query($xx)or die(http(0736));
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call('xajax_view_district','','',1,20);
return $obj;

break;
default:

}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call('xajax_view_district','','',1,20);
return $obj;
}







function save_municipality($formvalues){
$object=new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$object->AddAlert("Access Denied!\n Only the Monitoring and Evaluation Specialist can add a Municipality!");
$object->redirect("index.php");
return $object;
} */
$district=mysql_real_escape_string($formvalues['district']);
$municipalityName=mysql_real_escape_string($formvalues['municipalityName']);
$zone=mysql_real_escape_string($formvalues['zone']);
if($municipalityName==''){
$object->assign("status","innerHTML",errorMsg("<li>Enter Municipality Name</li>"));
return $object;
}
/* if($zone==""){

$obj->assign("status","innerHTML",errorMsg("<li>Enter Acronym</li>"));
return $obj;
}
 */
$check=mysql_query("INSERT INTO tbl_municipality (municipalityName,zone,districtCode) values('".$municipalityName."','".$zone."','".$district."')")or die(mysql_error());

$object->assign('bodyDisplay','innerHTML',congMsg("Municipality Captured!"));
$object->call('xajax_view_municipality','',1,20);
return $object;
}

#------------------------------save csi------------------------------------------------
function save_actionplan($formvalues){
$obj=new xajaxResponse();


$district=$formvalues['district'];
$subcounty=$formvalues['subcounty'];

$parish=$formvalues['parish'];

for($x=0;$x<count($formvalues['loopkey']);$x++){
$responsible=$formvalues['responsible'][$x];
$cpa=$formvalues['cpas'][$x];
$intervention=$formvalues['intervention'][$x];
$bywho=$formvalues['who'][$x];
$gaps=$formvalues['gaps'][$x];
$outcome=$formvalues['outcome'][$x];
$indicator=$formvalues['indicator'][$x];
$resources=$formvalues['resources'][$x];
$quarter=$formvalues['quarter'][$x];
$year=date(Y);
 $error="<ul>";
		#$erCount=0;
		/* if($cpa==''){
		$error.="<li>Please Enter Core program Area!</li>";
		$erCount++;
		}
		if($gaps==''){
		$error.="<li>Missing Gaps Identified!</li>";
		$erCount++;
		}
		if($subcounty==''){
		$error.="<li>Enter Subcounty Name</li>";
		$erCount++;
		}
		if($district=='') {
		$error.="<li>Select District</li>";
		$erCount++;
		}
		if(($bywho=='')){
		$error.="<li>Enter Person Responsible</li>";
		$erCount++;
		}
		if($parish==''){
		$error.="<li>Please select Parish!</li>";
		$erCount++;
		}
		 if($resources==""){
		$error.="<li>Missing Resources!</li>";
		$erCount++;
		}  
		 if($responsible==""){
		$error.="<li>Responsible Party!</li>";
		$erCount++;
		} */
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		}
if($cpa<>''){
 $check="INSERT INTO tbl_actionplan(district,subcounty,parish,core_program_area,intervention,indicator,responsible,who,gaps,outcome,resources_required,year,timeline,updatedby) values('".$district."','".$subcounty."','".$parish."','".$cpa."','".$intervention."','".$indicator."','".$responsible."','".$bywho."','".$gaps."','".$outcome."','".$resources."','".$year."','".$quarter."','".$_SESSION['username']."')";
 #$object->alert($check);
mysql_query($check)or die(http(0314));

}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->Call("xajax_view_actionplan",'','','','','','','','',1,20);
return $obj;
}





function save_staff($formvalues){
$obj=new xajaxResponse();
$name=$formvalues['name'];
$email=$formvalues['email'];
$organization=$formvalues['organization'];
$mobile=$formvalues['mob_code'].$formvalues['mobile_number'];
$telno=$formvalues['tel_code'].$formvalues['tel_no'];
$username=mysql_real_escape_string($formvalues['username']);
$password=mysql_real_escape_string($formvalues['password']);
$role=$formvalues['role'];
$responsiblity=$formvalues['responsiblity'];


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
$query="insert into tbl_staffmembers(name,organization,responsibilty,role,username,password,mobile,telno,email_address,updatedby)
values('".$name."','".$organization."','".$responsiblity."','".$role."','".$username."','".$password."','".$mobile."','".$telno."','".$email."','".$_SESSION['user_id']."')";
#$obj->addAlert($query);

/* 


$sql="insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,l.codeName  from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_lookup l on(l.code=o.orgtype) where  l.classCode='1' and username='".$username."')";
#$obj->addAlert($sql) */
mysql_query($query)or die(http(1066));
#mysql_query("insert into tbl_user() values()")or die(http(1067));
$obj->assign('bodyDisplay','innerHTML',congMsg("Staff Member Captured!"));
$obj->call("xajax_view_staffMembers",'','','','');
return $obj;
}






function saveChildStatusIndex($formvalues,$child_id,$household_id){
$obj=new xajaxResponse();
$evdate=$formvalues['evdate'];
$evname=$formvalues['evname'];
$caregiver=$formvalues['caregiver'];
$relationship=$formvalues['relationship'];
$otherdomain=$formvalues['otherdomain'];
$otherinfo_sources=$formvalues['otherinfo_sources'];
$comments=$formvalues['comments'];
$otherresources=$formvalues['otherresources'];
$parent_died=$formvalues['parent_died'];
$year=date(Y);
$quarter=quarter(date('m'));
$info_sources=get_Stringorg($formvalues['info_sources']);
$importantevents=get_Stringorg($formvalues['importantevents']);
$support_service=get_Stringorg($formvalues['support_service']);
$provided=get_Stringorg($formvalues['provided']);
$service_provider=get_Stringorg($formvalues['service_provider']);

$insert="INSERT INTO tbl_csi(child_id,household_id,date_of_evaluation,evaluator,caregiver,relationship_to_child,info_source,parent_died,important_events,
support_services,provided,service_provider,year,quarter,updatedby)
					  values('".$child_id."','".$household_id."','".$evdate."','".$evname."','".$caregiver."','".$relationship."','".$info_sources."','".$parent_died."','".$importantevents."','".$support_service."','".$provided."','".$service_provider."','".$year."','".$quarter."','".$_SESSION['username']."')";

mysql_query($insert)or die(http(0416));


for($i=0;$i<count($formvalues['subdomain']);$i++){
#$obj->addAlert($service);
$subdomain=$formvalues['subdomain'][$i];
$action_taken=$formvalues['action_taken'][$i];
$domain_id=$formvalues['domain_id'][$i];
$score=$formvalues['fooddm'][$i];
$error="<ul>";
 if($evdate==""){
$error.="<li>Missing Date</li>";
$erCount++;
} 

if($evname==""){
$error.="<li>Enter Evaluator Name</li>";
$erCount++;
}

if($relationship==""){
$error.="<li>Enter Relationship to child</li>";
$erCount++;
} 
if($caregiver==""){
$error.="<li>Enter Caregiver's Name</li>";
$erCount++;
}

if($_SESSION['quarter']=='Closed'){
$error.="<li>The Reporting period has Expired, \n Please Contact Your M&E Specialist!</li>";
$erCount++;
}

$error .="</ul>";
if($erCount > 0){
	$obj->assign("status","innerHTML",errorMsg($error));
	#$obj->call("xajax_new_organization",$formvalues);
	return $obj;
} 




$insertscore="insert into tbl_csi_scores (child_id,household_id,domain_id,subdomain_id,score,Action_taken_today,year,updatedby) 
										values('".$child_id."','".$household_id."','".$domain_id."','".$subdomain."','".$score."','".$action_taken."','".$year."','".$_SESSION['username']."')";
#$obj->addAlert($insert);

mysql_query($insertscore)or die(http(0417));
mysql_query("update tbl_ovcdetails set status='Assessed' where child_id='".$child_id."'")or die(http(0418));

}
$obj->assign('bodyDisplay','innerHTML',congMsg("Child Status Index Assesment Captured!"));
$obj->call("xajax_viewChildren",'','','','','','','',1,20);
return $obj;

}







#----------------------------------------------


function save_household($formvalues){
	$obj=new xajaxResponse();
	$_SESSION['novchildren']='';
	$district=$formvalues['district'];
	$parish=$formvalues['parish'];
	$subcounty=$formvalues['subcounty'];
	$visitdate=$formvalues['visitdate'];
	$village=mysql_real_escape_string($formvalues['village']);
	$hhname=mysql_real_escape_string($formvalues['hhname']);
	$mobile=$formvalues['mobile'];
	$mobile_no=$formvalues['mobile_no'];
	$tel=($mobile_no=='')?"":$mobile.$mobile_no;
	#$need=$formvalues['need'];
	$nofchildren=$formvalues['nofchildren'];
	$novchildren=$formvalues['novchildren'];
	$registering_officer=$formvalues['registering_officer'];
	$position=$formvalues['position'];
	$mobile_1=$formvalues['mobile_1'];
	$reg_mobile_no=$formvalues['reg_mobile_no'];
	$mobile_for_RO=($reg_mobile_no=='')?"":$mobile_1.$reg_mobile_no;
	
	$moderately_vulnerable=get_Stringorg($formvalues['moderately_vulnerable']);
	$critically_vulnerable=get_Stringorg($formvalues['critically_vulnerable']);
	$_SESSION['novchildren']=$novchildren;
	$comment=mysql_real_escape_string($formvalues['comment']);
	$month=date('m');
	$year=date(Y);
	$quarter=quarter($month);
	$error="<ul>";
	if($district==""){
	$error.="<li>Select District</li>";
	$erCount++;
	}
	 if($parish==""){
	$error.="<li>Select Parish</li>";
	$erCount++;
	} 
	if($subcounty==""){
	$error.="<li>Select Sub-county</li>";
	$erCount++;
	}

	if($visitdate==""){
	$error.="<li>Enter Date of Visit</li>";
	$erCount++;
	}
	if($visitdate==""){
	$error.="<li>Enter Date of Visit</li>";
	$erCount++;
	}
	if($village==''){
	$error .='<li>Enter Village!</li>';
	$erCount++;
	
	} 
	if($hhname==''){
	
		$error .='<li>Missing House hold name!</li>';
		$erCount++;
	
	} 
	 
	/*  if($need==""){
	$error.="<li>Select Need or Category</li>";
	$erCount++;
	} */
	if($nofchildren==""){
	$error.="<li>Enter No. of  children in the household</li>";
	$erCount++;
	}
	
	if($novchildren==""){
	$error.="<li>No of vulnerable children out of the total</li>";
	$erCount++;
	}
	if($novchildren>$nofchildren){
	$error.="<li>No of vulnerable children in the house hold cannot be greater \n than the overall number of children on the household!</li>";
	$erCount++;
	}
	$error .="</ul>";
	if($erCount > 0){
		$obj->assign("status","innerHTML",errorMsg($error));
		#$obj->call("xajax_new_organization",$formvalues);
		return $obj;
	} 
	
	$insert="insert into tbl_household(district,subcounty,parish,village,hhheadname,contactno,critically_vulnerable,moderatery_vulnerable,
	noofchildren,novchildren,datevisited,comment,updatedby,quarter,
	 year,registering_officer,position,contactphone)values('".$district."','".$subcounty."','".$parish."','".$village."','".$hhname."','".substr($tel,0,12)."','".$critically_vulnerable."','".$moderately_vulnerable."','".$nofchildren."','".$novchildren."','".$visitdate."','".$comment."','".$_SESSION['username']."','".$quarter."',
	 '".$year."','".$registering_officer."','".$position."','".substr($mobile_for_RO,0,12)."')";
	mysql_query($insert)or die(http(0297));
	$data="House Hold Details Captured!";
	$hhcode=mysql_fetch_array(mysql_query("select * from tbl_household where village='".$village."' and hhheadname='".$hhname."'"))or die(http(0381));
	$_SESSION['householdCode']='';
	$_SESSION['householdname']='';
	$_SESSION['householdCode']=$hhcode['household_id'];
	$_SESSION['householdname']=$hhcode['hhheadname'];
	
	$obj->assign('bodyDisplay','innerHTML',congMsg($data));
	$obj->call('xajax_ovcdetails',$_SESSION['novchildren'],$_SESSION['householdCode'],$_SESSION['householdname']);
	return $obj;
	}
	
	


  
	function save_ovc_details($formvalues,$novchildren,$householdCode){
	$obj=new xajaxResponse();
	
			for($i=0;$i<$novchildren;$i++){
				$school=$formvalues['school'][$i];
				$age=$formvalues['age'][$i];
				$sex=$formvalues['sex'][$i];
				$childname=$formvalues['childname'][$i];
				
				#$need=get_Stringorg($formvalues['condition']);
				#$obj->alert($need);
				$need=$formvalues['condition'][$i];
				$eligibility=$formvalues['eligibility'][$i];
				
				
				 $error="<ul>";
		#$erCount=0;
		if($childname==''){
		$error.="<li>Please Enter child Name!</li>";
		$erCount++;
		}
		if($age>=18){
		$error.="<li>OVC age cannot be greater than 17yrs!</li>";
		$erCount++;
		}
		if($age==0){
		$error.="<li>OVC age cannot be zero!</li>";
		$erCount++;
		}
		/* if(($inschool=='Yes') and ($age<3)){
		$error.="<li>OVC age cannot be zero!</li>";
		$erCount++;
		}
		if(($inschool=='Yes') and ($age<3)){
		$error.="<li>OVC age cannot be zero!</li>";
		$erCount++;
		} */
		if($sex==''){
		$error.="<li>Please select Gender!</li>";
		$erCount++;
		}
		/*  if($need==""){
		$error.="<li>Please select condition for critical vulnerability!</li>";
		$erCount++;
		}  */
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		}	
		#$obj->alert($condition);
					$insert="insert into tbl_ovcdetails(household_id,childname,age,sex,inschool,need,eligibility_for_assesment)values('".$householdCode."','".$childname."','".$age."','".$sex."','".$school."','".$need."','".$eligibility."')";
				#$obj->alert($insert);
				mysql_query($insert)or die(http(0297));
				
				}
				mysql_query("update tbl_mapping_register set children_registered='Yes' where mapping_id='".$householdCode."'")or die(http(0888));
	$data="OVC Details for ".$_SESSION['householdname']." Captured!";
	
	$obj->assign('bodyDisplay','innerHTML',congMsg($data));
	$obj->call('xajax_viewChildren','','','','','','','',1,20);
	return $obj;
		}
	

#------------menu----------------------------------
function save_menu_Category($formvalues){
$obj=new xajaxResponse();
$Category=$formvalues['Category'];
$rank=$formvalues['rank'];

if($Category==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Menu Category!"));
return $obj;
}if($rank==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Menu Ranking!"));
return $obj;
}

@mysql_query("insert into tbl_menu_categories (MenuCategory,Rank,updatedby) values('".mysql_real_escape_string($Category)."','".mysql_real_escape_string($rank)."','".$_SESSION['username']."')")or die(http(1218));
$obj->assign('new_menuCategory','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_menu_category",'','');
return $obj;
}



function save_menu_items($formvalues){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['loopkey']);$x++){
$Category=$formvalues['category'][$x];
$menu_item=$formvalues['menu_item'][$x];
$rank=$formvalues['rank'][$x];
$page=$formvalues['page'][$x];
$action=$formvalues['action'][$x];
/* if($Category==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Menu Category!"));
return $obj;
}if($rank==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Menu Ranking!"));
return $obj;
}

if($action==''){
$obj->assign('status','innerHTML',errorMsg("Please Enter Menu Item!"));
return $obj;
}
 */if($menu_item!==''){
@mysql_query("insert into tbl_menu_items (`MenuCategory`,`MenuItem`,`Rank`,page,updatedby,LinkvalCode,action) values('".mysql_real_escape_string($Category)."','".mysql_real_escape_string($menu_item)."','".$rank."','".mysql_real_escape_string($page)."','".$_SESSION['username']."','".$menu_item."','".$action."')")or die(http("1249"));
}}
$obj->assign('new_menu_item','innerHTML',congMsg("Menu Item created!"));
$obj->call("xajax_view_menu_items",'','');
return $obj;
}



function save_dropdownlist($formvalues){
$obj=new xajaxResponse();

 /* $error="<ul>";
		$erCount=0;
if($district==''){
		$error.="<li>Please choose a district!</li>";
		$erCount++;
		}
		if($subcounty==''){
		$error.="<li>Please Choose a subsounty</li>";
		$erCount++;
		}
		if($parish==''){
		$error.="<li>Please Choose a parish</li>";
		$erCount++;
		}
		
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		}	 */
for($i=0;$i<count($formvalues['code']);$i++){
$classDescription=$formvalues['classDescription'][$i];
$code=$formvalues['code'][$i];
$codeName=$formvalues['codeName'][$i];
$desc=$formvalues['desc'][$i];

if($codeName!=''){
$insert="insert into tbl_lookup(`classCode`, `classDescription`,`codeName`, `notes`,updatedby) values('".$code."','".$classDescription."','".$codeName."','".$desc."','".$_SESSION['username']."')";
@mysql_query($insert)or die(http('0013'));

}}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_dropdownlist",'','');
return $obj;
}

//-----------------save indicator-------------------
///----------------save indicator=-------------------------------

function save_indicator($formvalues){
$obj=new xajaxResponse();

//for($i=0;$i<count($formvalues['indicator_id']);$i++){

$target=mysql_real_escape_string($formvalues['target']);
$supergoal=trim($formvalues['supergoal']);
$goal=trim($formvalues['goal']);$component=trim($formvalues['component']);$level=trim($formvalues['Level_ofindicator']);
$project=trim($formvalues['project']);


$prog_id=trim($formvalues['prog_id']);

$subcomponent=trim($formvalues['sub_component']);
$output_id=trim($formvalues['output_id']);
$typeofindicator=trim($formvalues['type_ofindicator']);
$indicator_id=$formvalues['indicator_id'];
$indicator=$formvalues['indicator'];
$gender=$formvalues['gender'];
$responsible=trim($formvalues['reponsible']);
$output=trim($formvalues['output']);
$indicator_code=trim($formvalues['indicator_code']);
$unit=trim($formvalues['unitofmeasure']);
$typeofdisaggregation=trim($formvalues['typeofdisaggregation']);


// exception Handling 

$error="<ul>";
$erCount=0;

$indcode=@mysql_fetch_array(@mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' order by indicator_name asc"));
if($indicator_code==$indcode['indicator_code']){
$obj->alert("Indicator Code Already Exists. Please Change the indicator Code and save again.");
return $obj;
//$erCount++;
} 

 if($indicator_code==""){
$error.="<li>Missing Indicator Code</li>";
$erCount++;
}  

if($indicator==''){
$error.="<li>Please Enter Indicator Name!</li>";
$erCount++;
}
if($typeofindicator==''){
$error.="<li>Please Select Type of Indicator !</li>";
$erCount++;
}
/* if($level==''){
$error.="<li>Please Select Level of Indicator !</li>";
$erCount++;
} */

if($erCount > 0){
	$obj->assign("status","innerHTML",errorMsg($error));
	return $obj;


} 
$error .="</ul>";


//if(mysql_num_rows($query)==0){
//if($typeofindicator<>''){
$sql="insert into tbl_indicator(prog_id,subcomponent_id,output_id,indicator_name,indicator_code,disaggregation,indicator_type,responsible,
expected_output, unitofmeasure,typeofDisaggregation)
 values('".$prog_id."','".$subcomponent."','".$output_id."','".mysql_real_escape_string($indicator)."','".mysql_real_escape_string($indicator_code)."','".trim($gender)."','".$typeofindicator."',
 '".$responsible."','".$output."','".$unit."','".$typeofDisaggregation."')";
 
@mysql_query($sql)or die(http("ED-464"));
//}
/* }
else {
$obj->alert("Process Halted! Indicator Code Already Exists. Please Change the indicator Code and save again.");
return $obj;
} */
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_indicator",'','','','','',1,20);
return $obj;
}
//-----------------end of indiocator------------------
//-----save subcomponent------------------------------
function save_subcomponent($formValues){
$obj=new xajaxResponse();
$prog_id=$formValues['programme'];
$component=$formValues['component_code'];
$sub_code=$formValues['subcomponent_code'];
$subcomponent=$formValues['subcomponent_name'];
$details=$formValues['scdescript'];

 if($sub_code==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Sub-Program Code</li>"));
return $obj;
}
if($subcomponent==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Sub-Program Name</li>"));
return $obj;
 } 

$query="insert into tbl_subcomponent(prog_id,subcomponent_code,subcomponent,description) values('".$prog_id."','".$sub_code."','".$subcomponent."','".mysql_real_escape_string($details)."')";
@mysql_query($query)or die(http("SV-1465"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_subcomponent",'','','','');
return $obj;
}





 function save_FarmersProductionRecords($formvalues){
$obj=new xajaxResponse();
$organization=$formvalues['project'];


$erCount=0;
  $error="<ul>";
		
		if($organization==''){
		$error.="<li>Please select an Organization!</li>";
	$erCount++;
		}
		/*if($name==''){
		$error.="<li>Please Enter Farmer's Name</li>";
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
		  if($leadInstitution==''){
		$error.="<li>Missing Lead Institution</li>";
`		$erCount++;
		} */
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("statusxxx","innerHTML",errorMsg($error));
			return $obj;
		}	  
 /**/
 
 for($x=0;$x<count($formvalues['loopkey']);$x++){
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
 $query=@mysql_query("insert into `tbl_farmerproductionrecords` (quarter,year,`org_code`,`FarmerName`, `sex`, `LeadFarmer`, `Totalareaundercropproduction`, `AreaundercropLegumes`, `AreaunderHoebasins`,
 crophoebasin,yieldhoebasin,selling_pricehoebasin, 
  `AreaunderADPripping`,cropadpripping,yieldcropadpripping,selling_pricecropadpripping,  
   `AreaunderMechanizedripping`,cropmechanized,yieldmechanized,selling_pricemechanized,
    `doptedCF/CA`, `AreaunderCF/CA`, `Herbicideuse`, `Burntcropresidues`,`updatedby`)
 	values('".$_SESSION['quarter']."','".$_SESSION['Activeyear']."','".$organization."',	'".$name."','".$sex."',	'".$leadFarmer."','".$total."',	'".$croplegumes."',
	'".$hoebasin."','".$crophoebasin."','".$yieldhoebasin."','".$selling_pricehoebasin."',
	'".$adpripping."','".$cropadpripping."','".$yieldadpripping."','".$selling_priceadpripping."',
	'".$mechanized."','".$cropmechanized."','".$yieldmechanized."','".$selling_pricemechanized."',
	'".$adoptedadpca."','".$areaundercfca."',
		'".$herbicideuse."','".$burntcropresidues."',
				'".$_SESSION['username']."')")or die(http("SV-1655"));
				}
		
		}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_FarmersProductionRecords",$organization,"status".$organization);
return $obj;
} 





	  
	function save_QualitativeReporting($formvalues){ 
	$obj=new xajaxResponse();
		# $reportingPeriod=quarter(date(m));
		$reportingPeriod=$_SESSION['quarter'];
		
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

 $x="insert into tbl_tsoqualitative( `org_code`,
   `reportingPeriod`, `semi_annual`, `year`,
      `plannedActivities`,
	   `implementation`, 
	   `achievements`,
	`Deviation`,
	`lessons`, 
	`Challenges`, 
	next_quarter,
	`updatedby`)
 values('".$org_code."',
 '".$_SESSION['quarter']."','".$_SESSION['quarter']."','".$_SESSION['Activeyear']."',
 '".mysql_real_escape_string(str_replace("-","-",$plannedActivities))."',
 '".mysql_real_escape_string(str_replace("-","-",$implementation))."',
 '".mysql_real_escape_string(str_replace("-","-",$achievements))."',
	'".mysql_real_escape_string(str_replace("-","-",$deviations))."',
	'".mysql_real_escape_string(str_replace("-","-",$lessons))."',
	'".mysql_real_escape_string(str_replace("-","-",$challenges))."',
 '".mysql_real_escape_string(str_replace("-","-",$next_quarter))."',
 '".$_SESSION['username']."')";

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



	  
	function save_crop($formvalues){ 
	$obj=new xajaxResponse();

		$crop=$formvalues['crop'];
		
 $x="insert into tbl_crops(
	`cropName`)
 values('".$crop."')";

$query=@mysql_query($x)or die(http("Save-1716"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
return $obj;
}






 ?>