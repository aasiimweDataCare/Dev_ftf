<?php
//------------------saveLO Targets-----------------
function save_LOPTargetExtended($formvalues){
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
$sql="update tbl_indicator set baseline='".$baseline."' where indicator_id='".$indicator."' ";
@mysql_query($sql) or die(http("Edit-4729"));
//$obj->alert($sql);
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
	@mysql_query("update tbl_indicator set baseline='".$baseline."' where indicator_id='".$indicator."' ") or die(http("Edit-77"));
//$obj->alert($insert2);
}
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_ViewLOPTargets",'','','','','',1,20);
return $obj;
}


function save_ProgramTargetExtended($formvalues){
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

$sql="select * from tbl_programTargets where indicator_id='".$indicator."'";

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

$insert1="replace INTO tbl_programTargets(period,target_year,indicator_id,Target,lastUpdatedby,baseline) 
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
$obj->call("xajax_ViewProgramTargets",'','','','','',1,20);
return $obj;
}




//-------------FAQS--------------------------------
function save_faqs($faqs,$id){
$obj=new xajaxResponse();
if(mysql_num_rows(Execute("select * from tbl_faqs where question='".$faqs."' "))>0)
{
$obj->alert("Question ".$faqs." Already Exists!");
return $obj;
}else 
Execute("insert into tbl_faqs(question) values('".insert_info_withSpecialCharacters($faqs)."')")or die(http("Setup-44"));
//if($query)
//$obj->assign('bodyDisplay','innerHTML',$data);
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_faqs","");
return $obj;
}



//-----------------MER Layout save-----------------


function save_programme($formValues){
$obj=new xajaxResponse();
$pname=$formValues['pname'];
$pfunder=$formValues['pfunder'];
$pdescription=$formValues['pdescription'];
//$xx=str_replace("'","",$x);
 if($pname==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Program Name</li>"));
return $obj;
}
/* if($pfunder==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Funder Name</li>"));
return $obj;
 } */

$query="insert into tbl_programme(program_name,program_id,Funder,details) values('".mysql_real_escape_string($pname)."','".mysql_real_escape_string($pcode)."','".mysql_real_escape_string($pfunder)."','".mysql_real_escape_string(str_replace("'","",$pdescription))."')";
@mysql_query($query)or die(http("SV-0018"));
$obj->assign('bodyDisplay','innerHTML',congMsg("New Program Added!"));
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
$verification_sources=$formValues['verification_sources'];
$assumptions=$formValues['assumptions'];



//$xx=str_replace("'","",$x);
 if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select Goal Type</li>"));
return $obj;
}
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Goal Name</li>"));
return $obj;
 } 

$query="insert into tbl_goal(supergoal_id,prog_id,subprog_id,project_id,type,component,verification_sources,assumptions,description) 
values('".$supergoal_id."','".mysql_real_escape_string($cprogramme)."','".$subprogram."','".$project."','".$supergoaltype."','".$component."',
'".pagination::insert_info_withSpecialCharacters($verification_sources)."',
'".pagination::insert_info_withSpecialCharacters($assumptions)."',
'".mysql_real_escape_string(str_replace("'","",$pdescription))."')";
//$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_goal",'','','','','','');
return $obj;
}

function save_purpose($formValues){
$obj=new xajaxResponse();

//--------------------------------------
$supergoal_id=$formValues['supergoal_id'];
$cprogramme=$formValues['cprogramme'];
$supergoal=$formValues['supergoal'];
$pdescription=$formValues['pdescription'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['subprogram'];
$project=$formValues['project'];
$component=$formValues['supergoal'];
$pcode=$formValues['pcode'];
$verification_sources=$formValues['verification_sources'];
$assumptions=$formValues['assumptions'];

//$xx=str_replace("'","",$x);
 if($supergoaltype==""){
$obj->assign("status","innerHTML",errorMsg("<li>Select Type of Purpose</li>"));
return $obj;
}
if($supergoal==""){
$obj->assign("status","innerHTML",errorMsg("<li>Enter Purpose Name</li>"));
return $obj;
 } 

$query="insert into tbl_purpose(supergoal_id,prog_id,subprog_id,project_id,type,component_code,component,description,verification_sources,assumptions) 
values('".$supergoal_id."','".mysql_real_escape_string($cprogramme)."','".$subprogram."','".$project."','".$supergoaltype."','".$pcode."','".$component."','".mysql_real_escape_string(str_replace("'","",$pdescription))."','".$verification_sources."','".$assumptions."')";
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
#$obj->alert($query);
@mysql_query($query)or die(http("SV-0056"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));
$obj->call("xajax_view_supergoal",'','','','','','');
return $obj;
}





//s==========save  output========================================
function save_output($formValues){
$obj=new xajaxResponse();
//------------>>>>>>><<<<--------------------
$program=get_Stringorg($formValues['program']);
$output_code=$formValues['output_code'];
$output_name=$formValues['output_name'];
//---------------xxxxxxxx-----------------
$supergoal_id=$formValues['supergoal_id'];
$cprogramme=$formValues['cprogramme'];
$goal_id=$formValues['goal_id'];
$supergoaltype=$formValues['supergoaltype'];
$subprogram=$formValues['subprogram'];
$project=$formValues['project'];
$purpose_id=$formValues['purpose_id'];
$verification_sources=$formValues['verification_sources'];
$assumptions=$formValues['assumptions'];
$pdescription=$formValues['pdescription'];
//$program=$formValues['program'];
//--------------->>>>>>>>>><<<<<<<<<<<------------
 if($supergoaltype==''){
$obj->assign('status','innerHTML',noteMsg("Please Enter Output Type!"));
return $obj;
}
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


$query="insert into tbl_output(supergoal_id,goal_id,purpose_id,prog_id,subprog_id,type,project_id,program,output_code,output_name,description,verification_sources,assumptions,lastupdatedby)
 values('".$supergoal_id."','".$goal_id."','".$purpose_id."','".$cprogramme."','".$subprogram."',
 '".$supergoaltype."','".$project."','".mysql_real_escape_string($program)."','".mysql_real_escape_string($output_code)."','".mysql_real_escape_string($output_name)."',
 '".mysql_real_escape_string(str_replace("'","",$pdescription))."','".pagination::insert_info_withSpecialCharacters($verification_sources)."','".pagination::insert_info_withSpecialCharacters($assumptions)."','".$_SESSION['username']."') ";
//$obj->alert($query);
@mysql_query($query)or die(http("SV-0042"));

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_output",'','','','',1,20);
return $obj;
}



function save_indicatorDefinition($formvalues,$level){
$obj=new xajaxResponse();
//variables 
#$level=$formvalues['mapping_type'];
#$obj->alert($level);
$indicator_type=$formvalues['indicator_type'];
//$indicator_id=$formvalues['indicator'];
$parent_indicator=$formvalues['parent_indicator'];
$prog_id=$formvalues['program'];
$project_id=$formvalues['project'];
	$level1=array('Primary','Formula','ABI High Level');
//$obj->alert($prog_id);
//$obj->alert(count($formvalues['indicator_id']));
  /* if($level=='ABI High Level'){
 $obj->alert("You cannot Define ABI High Level Indicators at ABI High Level Level! Please Try Again at Primary Level.");
	return $obj;
 }  */


for($i=0;$i<count($formvalues['indicator_id']);$i++){
$indicator_code=$formvalues['indicator_code'][$i];
$defn=$formvalues['indicator_id'][$i];

if($defn<>''){
$defn_id=@mysql_query("select * from 
								tbl_indicator_definition 
								where DefName='".$defn."'") or die(http("sv-183")) ;
								if(mysql_num_rows($defn_id)>0){

if($level==LookupData($code=1,$returnValue1=3)){

$insert="update tbl_indicator_definition set `indicator_id`='".$parent_indicator."',
`DefName`='".$indicator_id."',
`projectIndicatorDefinition_id`='".$defn."',
prog_id='".$prog_id."',
project_id='".$project_id."',
`updatedby`='".$_SESSION['username']."' where DefName='".$defn."' and  mapping_type='".LookupData($code=1,$returnValue1=3)."' ";
@mysql_query($insert)or die(http("SV-415"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
} elseif($level==LookupData($code=1,$returnValue1=4)){

$insert="update tbl_indicator_definition set `indicator_id`='".$parent_indicator."',
`DefName`='".$indicator_id."',
`projectIndicatorDefinition_id`='".$defn."',
prog_id='".$prog_id."',
project_id='".$project_id."',
`updatedby`='".$_SESSION['username']."' where DefName='".$defn."'  and  mapping_type='".LookupData($code=1,$returnValue1=3)."' ";
@mysql_query($insert)or die(http("SV-425"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}
else {
$insert="update tbl_indicator_definition set `indicator_id`='".$parent_indicator."',prog_id='".$prog_id."',project_id='".$project_id."',`updatedby`='".$_SESSION['username']."' where DefName='".$defn."'  and  mapping_type='".LookupData($code=1,$returnValue1=3)."' ";
@mysql_query($insert)or die(http("SV-430"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}
}
else {
//--------insert if No indicator defined-----------------
if($level==LookupData($code=1,$returnValue1=4)){
//check if the level of  definitioon is at project level-------
$insert="INSERT INTO tbl_indicator_definition(`indicator_id`,`DefName`,projectIndicatorDefinition_id,prog_id,project_id,mapping_type,`updatedby`) 
values('".$parent_indicator."','".$defn."','','".$prog_id."','".$project_id."','".LookupData($code=1,$returnValue1=4)."','".$_SESSION['username']."')
 on duplicate key update `indicator_id`='".$parent_indicator."',`DefName`='".$defn."',prog_id='".$prog_id."',project_id='".$project_id."',
 mapping_type='".LookupData($code=1,$returnValue1=3)."',`updatedby`='".$_SESSION['username']."'
";
#$obj->alert($insert);
@mysql_query($insert)or die(http("SV-444"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}

if($level==LookupData($code=1,$returnValue1=3)){
//check if the level of  definitioon is at project level-------
$insert="INSERT INTO tbl_indicator_definition(`indicator_id`,`DefName`,projectIndicatorDefinition_id,prog_id,project_id,mapping_type,`updatedby`) 
values('".$parent_indicator."','".$defn."','','".$prog_id."','".$project_id."','".LookupData($code=1,$returnValue1=3)."','".$_SESSION['username']."')
 on duplicate key update `indicator_id`='".$parent_indicator."',`DefName`='".$defn."',prog_id='".$prog_id."',project_id='".$project_id."',
 mapping_type='".LookupData($code=1,$returnValue1=3)."',`updatedby`='".$_SESSION['username']."'
";

#$obj->alert($insert);
@mysql_query($insert)or die(http("SV-457"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}

elseif($level==LookupData($code=1,$returnValue1=4)){
//check if the level of  definitioon is at project level-------
$insert="INSERT INTO tbl_indicator_definition(`indicator_id`,`DefName`,projectIndicatorDefinition_id,prog_id,project_id,mapping_type,`updatedby`) 
values('".$parent_indicator."','".$defn."','','".$prog_id."','".$project_id."','".LookupData($code=1,$returnValue1=4)."','".$_SESSION['username']."')
  on duplicate key update `indicator_id`='".$parent_indicator."',`DefName`='".$defn."',prog_id='".$prog_id."',project_id='".$project_id."',
 mapping_type='".LookupData($code=1,$returnValue1=3)."',`updatedby`='".$_SESSION['username']."'
";

	#$obj->alert($insert);
@mysql_query($insert)or die(http("SV-470"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}
else {

//check if the level of  definitioon is at project level-------
$insert="INSERT INTO tbl_indicator_definition(`indicator_id`,`DefName`,prog_id,project_id,mapping_type,`updatedby`) 
values('".$parent_indicator."','".$defn."','".$prog_id."','".$project_id."','".LookupData($code=1,$returnValue1=3)."','".$_SESSION['username']."')
 on duplicate key update `indicator_id`='".$parent_indicator."',`DefName`='".$defn."',prog_id='".$prog_id."',project_id='".$project_id."',
 mapping_type='".LookupData($code=1,$returnValue1=3)."',`updatedby`='".$_SESSION['username']."'
";
//$obj->alert($insert);
@mysql_query($insert)or die(http("SV-482"));
//@mysql_query("update tbl_indicator set indicator_code='".$indicator_code."' where indicator_id='".$defn."'")or die(http("SV-186"));
}



}
}
}
$obj->assign('bodyDisplay','innerHTML',congMsg("Data Captured!"));

if($level==LookupData($code=1,$returnValue1=3)){
$obj->call("xajax_view_indicatorDefinition",$level=LookupData($code=1,$returnValue1=3),'','','','',1,20);
}elseif($level==LookupData($code=1,$returnValue1=4)){

$obj->call("xajax_view_VariableindicatorDefinition",$level=LookupData($code=1,$returnValue1=4),'','','','',1,20);

}else{

$obj->redirect("home.php");

}
return $obj;

}


//-----------------end of M&E layout save------------------------
//--------------workplan save-----------------------------0------




function save_AnnualResults($formvalues){
		$obj=new xajaxResponse();
		$Program=$formvalues['Program'];
		$Project=$formvalues['Project'];
		$subcomponent=$formvalues['subcomponent'];
		$fyear=$formvalues['fyear'];

				if(($_SESSION['quarter']=="Closed")||($_SESSION['Activeyear']=="Closed")){
						$obj->alert("The system is not Open for Reporting! Please Contact your M&E Person.");
					return $obj;
				}
$_SESSION['semiAnnual']=(($_SESSION['quarter']=='Jan - Mar') or ($_SESSION['quarter']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";



				for($i=0;$i<count($formvalues['target']);$i++){
				
						$indicator=$formvalues['indicator_id'][$i];
						$unitofmeasure=$formvalues['unitofmeasure'][$i];
						$disaggregation=$formvalues['disaggregation'][$i];
						$male=$formvalues['male'][$i];
						$female=$formvalues['female'][$i];
						//$obj->alert($male);
						//$obj->alert($female);
						$baseline=$formvalues['baselinevalue'][$i];
						$total=$formvalues['target'][$i];
				
				
				if($fyear==''){
				$obj->alert("Please select Year of Reporting");
				return $obj;
				
				}
		
		
			
		
		
		switch($disaggregation)
				{
			case "Yes":
							$insert1="INSERT INTO tbl_organizationreporting(year,reportingPeriod,indicator_id,male,female,
							total,updatedby,prog_id,subcomponent_id,project_id,country_id,semi_annual)
							 values('".$fyear."','".$_SESSION['quarter']."','".$indicator."','".$male."',
							 '".$female."','".$total."','".$_SESSION['username']."','".$Program."',
							 '".$subcomponent."','".$Project."','".$_SESSION['countryNameLogin']."','".$_SESSION['semiAnnual']."') 
							 on duplicate key update year='".$fyear."',reportingPeriod='".$_SESSION['quarter']."',indicator_id='".$indicator."',
							 male='".$male."',female='".$female."',total='".$total."',updatedby='".$_SESSION['username']."',
							 prog_id='".$Program."',subcomponent_id='".$subcomponent."',project_id='".$Project."',
							 country_id='".$_SESSION['countryNameLogin']."',semi_annual='".$_SESSION['semiAnnual']."'";
							 // $obj->alert($insert1);
							if($total<>''){
				@mysql_query($insert1)or die(http("SV-638"));
		//-------------------end of total Nullity-----
									}
							
		 break;
		
		 default:
								 $insert2="INSERT INTO tbl_organizationreporting(year,reportingPeriod,indicator_id,
								total,updatedby,prog_id,subcomponent_id,project_id,country_id,semi_annual)
								 values('".$fyear."','".$_SESSION['quarter']."','".$indicator."','".$total."','".$_SESSION['username']."','".$Program."',
								 '".$subcomponent."','".$Project."','".$_SESSION['countryNameLogin']."','".$_SESSION['semiAnnual']."') 
								 on duplicate key update year='".$fyear."',reportingPeriod='".$_SESSION['quarter']."',indicator_id='".$indicator."',
								total='".$total."',updatedby='".$_SESSION['username']."',
								 prog_id='".$Program."',subcomponent_id='".$subcomponent."',project_id='".$Project."',
								 country_id='".$_SESSION['countryNameLogin']."',semi_annual='".$_SESSION['semiAnnual']."'";
								  //$obj->alert($insert2);
								 if($total<>''){
				@mysql_query($insert2)or die(http("SV-638"));
		//-------------------end of total Nullity-----
									}
								//@mysql_query($insert)or die(http("SV-633")); 
								 
		 break;
		 //-----------------end of swicth stmt--------
		 }
		
		
				  	//$obj->alert($disaggregation);
					
					 
		
		//---------End of For loop------
		
}
/* else{
	// if($total==NULL)
$obj->alert('No Data to be Captured! Please Try again');
return $obj;
}
 */

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
#$obj->call("xajax_view_AnnualResults",'','','','','','','','','',1,20);
$obj->call("xajax_view_quantitativeReportLog",'','','');
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
		//$objResponse->alert($query_addPermissions);						
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
$program_id=trim($user['program']);
$project=trim($user['Project']);
$lname=trim($user['lname']);
$email=trim($user['email']);
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
$passwordHint=generateCode(6).$password;
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
$query=mysql_query("insert into tbl_user(name,username,password,
                                        role,district,usergroup,
                                        country,email,EncryptionHint)values('".$name."','".$username."','".md5($password)."',
                                                                            '".$role."','".$district."','".$usergroup."',
                                                                            '".$country."','".$email."','".$passwordHint."')")
or die(http("Setup-0704"));
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

$acronym=mysql_real_escape_string($formvalues['acronym']);
$project_code=mysql_real_escape_string($formvalues['project_code']);
$agreement_no=mysql_real_escape_string($formvalues['agreement_no']);
$totalfunding=mysql_real_escape_string($formvalues['totalfunding']);

$project_goal=mysql_real_escape_string($formvalues['proj_goal']);
$title=mysql_real_escape_string($formvalues['title']);
$background=mysql_real_escape_string($formvalues['background']);
$funding_type=mysql_real_escape_string($formvalues['funding_type']);
$organization1=mysql_real_escape_string(get_Stringorg($formvalues['organization1']));
//$obj->alert($organization);
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
$organization=mysql_real_escape_string($formvalues['organization']);


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
if($leadInstitution==''){
	$query=@mysql_query("insert into  tbl_organization(`orgName`)
		values('".mysql_real_escape_string($organization)."')")or die(http("Save-817"));
		$leadInstitution=mysql_insert_id();
		}
		
		
	$sql="insert into  tbl_project( `programme_id`, 
 `subprogram_id`,
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
	     `sourceof_funding`,
   `amount_available`,
    `shortfall`,
	`updatedby`,acronym,subgrante_agreement,totalprojectFunding) 
		values('".mysql_real_escape_string($program)."',
		'".$subprogram."',
		'".$goal."',
		'".$project_purpose."'
		,'".$project_code."',
		'".$title."','".$project_goal."',
		'".$background."',
		'".$funding_type."',
		'".$country."',
		'".$organization1."',
		'".$leadInstitution."','".$principalinvestigator."',
		'".$status."',
		'".$duration."',
		'".$fromdatevisited."',
		'".$todatevisited."',
		'".$newending_date."',
		'".$source_of_funding."',
		'".$amount."',
		'".$shortfall."',
		'".$_SESSION['username']."','".$acronym."','".$agreement_no."','".$totalfunding."')";

//$obj->alert($sql);
 $query=@mysql_query($sql)or die(http(0043));
		
		
		
		
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_project",'','','','','','',1,20);
return $obj;
} 


//==========================old records========================
function save_publicFacilities($formvalues){
$obj=new xajaxResponse();
$district=$formvalues['district'];
$subcounty=$formvalues['subcounty'];
$parish=$formvalues['parish'];

#$obj->alert(count($formvalues['loopkey']));
$erCount=0;
 $error="<ul>";
		
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
		}	
for($i=0;$i<count($formvalues['loopkey']);$i++){
$facility_type=$formvalues['facility_type'][$i];
$facility_name=$formvalues['facility_name'][$i];
$category=$formvalues['category'][$i];

#$obj->alert($category_type1);
		
if($facility_name<>''){
$insert="insert into tbl_publicfacility(district,subcounty,parish,facility_name,facility_type,facility_category,updatedby) values('".$district."','".$subcounty."','".$parish."','".$facility_name."','".$facility_type."','".$category."','".$_SESSION['username']."')";
#$obj->alert($insert);
mysql_query($insert)or die(http('0013'));

}}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_publicFacilities",'','','','','');
return $obj;
}



function save_publicationsBackup($formvalues){
$obj=new xajaxResponse();
$n=1;
$datepublished=$formvalues['datepublished'];
for($i=0;$i<count($formvalues['loopkey']);$i++){
$title=$formvalues['title'][$i];
$organization=$formvalues['Organization'][$i];

$project=$formvalues['project'][$i];
$typeofpublication=$formvalues['typeofpublication'][$i];
//$_SESSION['parishCode']=$parish;
#$obj->alert(count($formvalues['loopkey']));

 $error="<ul>";
		$erCount=0;
if($project==''){
		$error.="<li>Select Project Name</li>";
		$erCount++;
		}
		if($project==''){
		$error.="<li>Enter Title of Publication</li>";
		$erCount++;
		}
		
		if($typeofpublication==''){
		$error.="<li>Enter Type of Publication</li>";
		$erCount++;
		}
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		} 	
		
		
		if($_SESSION['quarter']='Jan - Mar')$sem_annual='Jan - Jun';
		else if($_SESSION['quarter']=='Apr - Jun')$sem_annual='Jan - Jun';
		else if($_SESSION['quarter']=='Jul - Sep')$sem_annual='Jul - Dec';
		else if($_SESSION['quarter']=='Oct - Dec')$sem_annual='Jul - Dec';
		else if($_SESSION['quarter']=='Closed')$sem_annual='';
		else $sem_annual='';
		
		
		
		$_SESSION['sem_annual']=$sem_annual;

	//$obj->alert($datepublished);	
		//$obj->alert($date);	
if($title<>''){
$insert="insert into tbl_publication(semi_annual,year,prog_id,typeofpublication,
title,organization,dateofpublication,updatedby) values('".$_SESSION['sem_annual']."','".$_SESSION['Activeyear']."','".$project."','".$typeofpublication."','".retrieve_info_withSpecialCharacters($title)."','".$organization."','".$datepublished."','".$_SESSION['username']."')";
//$obj->alert($insert);
@mysql_query($insert)or die(http('SV-620'));

}

}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
#$obj->call('xajax_mapping_register','','','');
$obj->call("xajax_view_publications",'','','',1,20);
return $obj;
}




function save_training($formvalues){
$obj=new xajaxResponse();
$n=1;
	$project=$formvalues['project'];	
	$program=$formvalues['program'];
	$trainer=$formvalues['trainer'];
	$orgdate=$formvalues['orgdate'];
	$error="<ul>";
		$erCount=0;
if($program==''){
		$error.="<li>Select Program Name</li>";
		$erCount++;
		}
	
		
		
		
		$error .="</ul>";
		if($erCount > 0){
			$obj->assign("status","innerHTML",errorMsg($error));
			return $obj;
		} 	

for($i=0;$i<count($formvalues['loopkey']);$i++){
$training_area=$formvalues['course'][$i];
//$trainer=$formvalues['trainer'][$i];
$typeofparticipants=$formvalues['typeofparticipants'][$i];
$male=$formvalues['male'][$i];
$female=$formvalues['female'][$i];
$total=$formvalues['total'][$i];

	//$obj->alert($datepublished);	
			
if($training_area<>''){
$insert="insert into tbl_training(semi_annual,year,prog_id,project_id,narrative_id,
course,trainer,typeofparticipants,male,female,total,organizing_date,updatedby) values('".mappQuarterToSemiAnnual($_SESSION['quarter'])."','".$_SESSION['Activeyear']."'
,'".$program."','".$project."','".$_SESSION['narrative_id']."','".$training_area."','".$trainer."','".$typeofparticipants."','".$male."','".$female."','".$total."','".$orgdate."','".$_SESSION['username']."')";
//$obj->alert($insert);
@mysql_query($insert)or die(http('PR-674'));

}
$n++;
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
#$obj->call('xajax_mapping_register','','','');
$obj->call("xajax_view_training",'','','');
return $obj;
}



function save_home($formvalues){
$obj=new xajaxResponse();
$heading=mysql_real_escape_string($formvalues['heading']);
$body=mysql_real_escape_string($formvalues['body1']);
$sql="insert into tbl_home(head,body) values('".mysql_real_escape_string($heading)."','".mysql_real_escape_string($body)."')";
$obj->alert($sql);
//@mysql_query($sql)or die(mysql_error());
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
 #$obj->alert($district);
$orgName=trim($formValues['orgName']);
$zonename=trim($formValues['zonename']);
 
 $insert="INSERT INTO tbl_zonalMapping(zone,orgName,districts_inZone) values('".$zonename."','".$orgName."','".$district."'); ";
 
 mysql_query($insert)or die(http(260));
 
$obj->assign('bodyDisplay','innerHTML',congMsg("Zonal Captured."));
$obj->call("xajax_view_zonalMapping",'','','','','','','');
return $obj;
 }
#**************************************************


function save_organization($formvalues){
$obj=new xajaxResponse();
//$obj->alert("ok!");
$orgName=mysql_real_escape_string($formvalues['orgname']);
$acronym=trim($formvalues['acronym']);
$registered=trim($formvalues['registered']);
$zonename=trim($formvalues['zonename']);

$regno=trim($formvalues['regno']);
$district=trim($formvalues['district']);
$district=trim($formvalues['subcounty']);
$district=trim($formvalues['parish']);
$orgtype=trim($formvalues['orgtype']);
$mission=mysql_real_escape_string($formvalues['mission']);
$vision=mysql_real_escape_string($formvalues['vision']);
$objectives=mysql_real_escape_string($formvalues['objectives']);


$username=trim($formvalues['username']);
$password=trim($formvalues['password']);
$subsector=get_stringorg($formvalues['subsector']);
#$obj->alert($subsector);
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


$insert="INSERT INTO tbl_organization(orgName,acronym,country_id,orgtype,brief_introduction,vision,mission,objective,
username,password,address,website,contact_person,title,telephone,mobile,
contact_person2,title2,telephone2,mobile2,
contact_person3,title3,telephone3,mobile3,fax)
VALUES('".ucwords($orgName)."','".strtoupper($acronym)."',
'".$zonename."','".$orgtype."','".$brief_introduction."','".ucwords($vision)."','".ucwords($mission)."','".ucwords($objectives)."',
'".$username."','".md5($password)."','".$address."','".$website."','".$contact_person."','".$title."','".$tel2."','".$mobile2."',
'".$contact_person2."','".$title2."','".$tel22."','".$mobile22."',
'".$contact_person3."','".$title3."','".$tel3."','".$maobile33."','".$fax."')";
$query=mysql_query($insert)or die(http(0399));
//
#$obj->alert($insert);
//$max
//mysql_query("insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,o.organization_type from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_ where username='".$username."');")or die("aBi error code 00236 because, ".mysql_error());

$sql="insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,l.codeName  from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_lookup l on(l.code=o.orgtype) where  l.classCode='1' and username='".$username."')";
#$obj->alert($sql);
mysql_query($sql)or die(http(407));
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
$obj->call('xajax_view_subcounty','','','',1,20);
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
#$obj->alert($xx);
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
#$obj->alert($xx);
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
$program=$formvalues['programme'];
$project=$formvalues['project'];
$country=$formvalues['country'];
$district=$formvalues['district'];
$organization=$formvalues['organization'];
$mobile=$formvalues['mob_code'].$formvalues['mobile_number'];
$telno=$formvalues['tel_code'].$formvalues['tel_no'];
$username=mysql_real_escape_string($formvalues['username']);
$password=mysql_real_escape_string($formvalues['password']);
$role=$formvalues['role'];
$district=$formvalues['district'];
$address=$formvalues['postalAddress'];


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

$query="insert into tbl_staffmembers(Name,organization,`prog_id`,Type,role,Title,username,password,mobile,telno,`Postala and Physical Address`, Email,project,country,district,updatedby)
values('".$name."','".$organization."','".$program."','".RetrieveData($table="tbl_programme",$condition="prog_id",$value=$program,$returnValue1="type")."','".$role."','".RetrieveData($table="tbl_role",$condition="role_id",$value=$role,$returnValue1="role_name")."','".$username."','".md5($password)."','".$mobile."','".$telno."','".$address."','".$email."',
'".$project."','".$country."','".$district."','".$_SESSION['username']."') on duplicate key update Name='".$name."',prog_id='".$program."'";
#$obj->alert($query);




$sql="insert into tbl_user(org_code,name,username,password,usergroup,role)(select o.org_code,o.orgName,o.username,o.password,u.group_name,l.codeName  from tbl_organization o inner join tbl_usergroup u on(o.usergroup=u.group_id) inner join tbl_lookup l on(l.code=o.orgtype) where  l.classCode='1' and username='".$username."')";
#$obj->alert($sql) /* */
@Execute($query)or die(http("Save-1066"));
#@mysql_query("insert into tbl_user() values()")or die(http(1067));
$obj->assign('bodyDisplay','innerHTML',congMsg("Staff Member Captured!"));
$obj->call("xajax_view_staffMembers",'','','','');
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
 */
 
 $String=mysql_real_escape_string($Category);
 $category = str_replace('%','',''.$String.'');
 
 if($menu_item!==''){
	 $smenu="insert into tbl_menu_items (`MenuCategory`,`MenuItem`,
	 `Rank`,page,updatedby,
	 LinkvalCode,action) 
	values
	('".$category."','".mysql_real_escape_string($menu_item)."',
	'".$rank."','".mysql_real_escape_string($page)."','".$_SESSION['username']."',
	'".$menu_item."','".$action."')";
	//$obj->alert($smenu);
@mysql_query($smenu) or die(http("1603"));
}

}
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
						$goal=trim($formvalues['goal']);
						$prog_id=trim($formvalues['prog_id']);
						$component=trim($formvalues['component']);
						$subcomponent=trim($formvalues['sub_component']);
						$output_id=trim($formvalues['output_id']);
						$typeofindicator=trim($formvalues['type_ofindicator']);
						$indicator_id=$formvalues['indicator_id'];
						
						$indicator=$formvalues['indicator'];
						$gender=$formvalues['gender'];
						$frequency=$formvalues['frequency'];
						$responsible=trim($formvalues['reponsible']);
						$output=trim($formvalues['output']);
						$indicator_code=trim($formvalues['indicator_code']);
						$project=trim($formvalues['project']);
						$level=trim($formvalues['Level_ofindicator']);
						$unitofmeasure=trim($formvalues['unitofmeasure']);



// exception Handling 

$error="<ul>";
$erCount=0;

/*$indcode=@mysql_fetch_array(@mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' order by indicator_name asc"));
if($indicator_code==$indcode['indicator_code']){
$obj->alert("Indicator Code Already Exists. Please Change the indicator Code and save again.");
return $obj;
//$erCount++;
} */



$indcode=@mysql_query("select * from tbl_indicator where indicator_code='".$indicator_code."' order by indicator_name asc");
if(@mysql_num_rows($indcode)>0){
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
if($level==''){
$error.="<li>Please Select Level of Indicator !</li>";
$erCount++;
}

if($erCount > 0){
	$obj->assign("status","innerHTML",errorMsg($error));
	return $obj;


} 
$error .="</ul>";


//if(mysql_num_rows($query)==0){
//if($typeofindicator<>''){
			$sql="insert into tbl_indicator(supergoal_id,goal_id,prog_id,purpose_id,subcomponent_id,
			project_id,output_id,indicator_name,indicator_code,
			disaggregation,indicator_type,responsible,
			expected_output,mapping_type,frequency_of_reporting,unitofmeasure)
			 values('".$supergoal."','".$goal."','".$prog_id."','".$component."','".$subcomponent."',
			 '".$project."','".$output_id."','".mysql_real_escape_string($indicator)."',
			 '".mysql_real_escape_string($indicator_code)."','".$gender."','".$typeofindicator."',
			 '".$responsible."','".$output."','".$level."','".$frequency."','".$unitofmeasure."')
			 ON DUPLICATE KEY UPDATE 
				 indicator_code='".mysql_real_escape_string($indicator_code)."',
				 prog_id='".$prog_id."',
				 supergoal_id='".$supergoal."',
				 goal_id='".$goal."',
				 purpose_id='".$component."',
				 subcomponent_id='".$subcomponent."',
				 output_id='".$output_id."',
				 responsible='".$responsible."',
				 mapping_type='".$level."',
				 frequency_of_reporting='".$frequency."',
				 unitofmeasure='".$unitofmeasure."',
				 project_id='".$project."',
				 disaggregation='".$gender."' ";
 //$obj->alert($sql);
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
mysql_query($query)or die(http("SV-1465"));
$obj->assign('bodyDisplay','innerHTML',congMsg("Details Captured!"));
$obj->call("xajax_view_subcomponent",'','','','');
return $obj;
}





function save_relatedLink($formvalues){
$obj=new xajaxResponse(); 

	$link=mysql_real_escape_string($formvalues['linkname']);$_SESSION['linkname']=$link;
	$url=mysql_real_escape_string($formvalues['url']);$_SESSION['url']=$url;
	 
if($link==''){
$obj->alert("Missing link name!");
return $obj;
}
/* if($url==''){
$obj->alert("Missing Url Name!");
return $obj;
} */
if(@mysql_fetch_array(mysql_query("select * FROM tbl_relatedlinks where linkName='".$link."' "))){
$obj->alert("Link ".$link."  Already Exists!");
return $obj;
}



 $x="insert into tbl_relatedlinks(linkName,url)values('".$link."','".$url."')";

 @mysql_query($x)or die("<font color='red'>could not capture Link name because, ".mysql_error()."</font>");

$select="select relatedlink_id from tbl_relatedlinks where linkName='".$_SESSION['linkname']."'&& url='".$_SESSION['url']."'";
 $row=mysql_fetch_array(mysql_query($select))or die(mysql_error());
/* if($_FILES['img_file']['name'] != NULL)
			$img_name = preg_replace("/.+\./", "logo_".$row['relatedlink_id'].".", $_FILES['img_file']['name']);
			@mkdir("icons");
			
			if(move_uploaded_file($_FILES['img_file']['tmp_name'], "icons/".$img_name))
				
		 $update="update tbl_relatedlinks set logo='".$img_name."' where relatedlink_id='".$row['relatedlink_id']."'";
				$query=mysql_query($update)or die(mysql_error());
				if($query){
				$obj->alert("Document Uploaded ".$img_name."    Uploaded!");
				
				} *//* else{
				
				
				$obj->alert("Could not upload logo!");
				return $obj
			} */

$obj->assign('bodyDisplay','innerHTML',congMsg($link."  Data Captured!"));
return $obj;			
} 


		
//---------update annualtargets----------------------------------------------------------------
function save_annualTargetExtended($formvalues){
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
			$insert5="insert into tbl_workplan(indicator_id,curr_year,Target,prog_id,project_id) 
			values('".$indicator5."','".$curr_year5."','".$target5."','".$prog_id5."','".$project_id5."') 
			on duplicate key UPDATE indicator_id='".$indicator5."',curr_year='".$curr_year5."',prog_id='".$prog_id5."',project_id='".$project_id5."',Target='".$target5."',lastUpdatedby='".$_SESSION['username']."' ";
//$obj->alert($insert5);
$queryIndicator=@mysql_query($insert5)or die(http("Edit-1050"));

				}
	
	
}


$obj->assign('bodyDisplay','innerHTML',congMsg("Details Updated!"));
//$obj->call("xajax_ViewAnnualTargets",'','','','','','',1,20);
return $obj;
}
			  
	

















 ?>