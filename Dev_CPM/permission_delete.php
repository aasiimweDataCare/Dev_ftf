<?php

function MoveToTrash($formvalues,$component,$tblColumField,$unique_column,$tbl_name){
$obj=new xajaxResponse();

if(count($formvalues[$unique_column])>0){
//for($x=0;$x<count($formvalues[$unique_column]);$x++){
$code=$formvalues[$unique_column];
$sql="update ".$tbl_name." set display='No' where ".$tblColumField."='".$code."'";
#$obj->alert($sql);
if(@mysql_query($sql)or die(http(__line__))){;
$table_pk_id='id';
$changed_from='Yes';
$changed_to='No';
#audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to);
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to));
}


$obj->assign('bodyDisplay','innerHTML',noteMsg("Records Deactivated! Your Deactivated Records will be  kept Temporarily for a month and will be deleted Completely! For information bout how to rollback Contact Your Systems Administrator"));
//return $obj;
switch($component){
case "Delete_SuperGoal":
$obj->call('xajax_view_supergoal','','','','','','');
break;

default:
$obj->redirect('home.php');
}


}else{ 
$obj->assign('bodyDisplay','innerHTML',noteMsg("Records could not be Deactivated please try again!"));


}

return $obj;
}

function delete_project($formvalues){
$obj =new xajaxResponse();
if($_SESSION['role']<>pagination::roleMgt(3)){
$obj->alert("Access Denied!\n Only Monitoring and Evaluation can Delete an Item!");
return $obj;
}
$obj->alert("Note: All Information Regarding the Project will be Lost!");
//$obj->AddConfirm("Do you real want to continue?");

if(count($formvalues['id'])>0){
for($i=0;$i<count($formvalues['id']);$i++){
$id=$formvalues['id'][$i];
$x="select * from tbl_project where id='".$id."'";
#$obj->alert($x);
$query=Execute($x)or die(http("Del-277"));

//


#$obj->alert($xx);
@Execute("delete from tbl_project WHERE id='".$id."'")or die(http("Del-283"));
@Execute("delete from tbl_goal WHERE project_id='".$id."'")or die(http("Del-287"));
@Execute("delete from tbl_purpose WHERE project_id='".$id."'")or die(http("Del-287"));
@Execute("delete from tbl_output WHERE project_id='".$id."'")or die(http("Del-287"));
@Execute("delete from tbl_indicator WHERE project_id='".$id."'")or die(http("Del-287"));
@Execute("delete from tbl_indicator_definition WHERE project_id='".$id."'")or die(http("Del-287"));


}

}
else{

$obj->alert("Could Not Deactivate Project! Please try again!");
return $obj;
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Project  Deactivated!"));
$obj->call("xajax_view_project",'','','','','','',1,20);
return $obj;
}

function delete_subcomponent($formvalues){
$obj =new xajaxResponse();
if($_SESSION['role']<>pagination::roleMgt(3)){
$obj->alert("Access Denied!\n Only Monitoring and Evaluation can Delete an Item!");
return $obj;
}
$obj->alert("Note: All Information Regarding the Subcomponent will be Lost!");
//$obj->AddConfirm("Do you really want to continue?");

if(count($formvalues['subcomponent_id'])>0){
for($i=0;$i<count($formvalues['subcomponent_id']);$i++){
$id=$formvalues['subcomponent_id'][$i];
$x="select * from tbl_subcomponent where subcomponent_id='".$id."'";
#$obj->alert($x);
$query=Execute($x)or die(http("Del-277"));

//


#$obj->alert($xx);
@Execute("delete from tbl_subcomponent WHERE subcomponent_id='".$id."'")or die(http("Del-283"));
}

}
else{

$obj->alert("Could Not Deactivate Project! Please try again!");
return $obj;
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Data  Deactivated!"));
$obj->call("xajax_view_subcomponent",'','','');
return $obj;
}

function delete_data($formvalues,$component,$tblColumField,$unique_column,$tbl_name){
$obj=new xajaxResponse();
//$obj->alert($formvalues[$unique_column]);
//$obj->alert(count($formvalues[$unique_column]));

if(count($formvalues[$unique_column])>0){
for($x=0;$x<count($formvalues[$unique_column]);$x++){
$code=$formvalues[$unique_column][$x];
$sql="update ".$tbl_name." set display='No' where ".$tblColumField."='".$code."'";
#$obj->alert($sql);
if(@mysql_query($sql)or die(http("DEL-0235"))){;
$table_pk_id='id';
$changed_from='Yes';
$changed_to='No';
#audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to);
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to));
}
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Records Deactivated! Your Deactivated Records will be  kept Temporarily for a month and will be deleted Completely! For information about how to rollback Contact Your Systems Administrator"));
//return $obj;
switch($component){
case "Delete_SuperGoal":
$obj->call('xajax_view_supergoal','','','','','','');
break;
case "Delete_Goal":
$obj->call('xajax_view_goal','','','','','','');
break;
case "Delete_Purpose":
$obj->call('xajax_view_purpose','','','','','','');
break;
case "Delete_output":
$obj->call('xajax_view_output','','','','','','','');
break;

case "Delete_project":
$obj->call('xajax_view_project','','','','','','',1,20);
break;
case "delete_staff":
$obj->call('xajax_view_staffMembers','','');
break;

case "Delete_Programme":
$obj->call('xajax_view_programme','','');
break;

default:
$obj->redirect('home.php');
}


}else{ 
$obj->assign('bodyDisplay','innerHTML',noteMsg("Records could not be Deactivated please try again!"));
}

return $obj;
}

#*************************editing*******************
function delete_zone($formvalues){
$obj =new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->alert("Access Denied!\n Only Monitoring and Evaluation Soecialist  can Delete a Setup Item!");
return $obj;
} */
#$obj->alert($formvalues['map_id']);
for($i=0;$i<count($formvalues['map_id']);$i++){
$map_id=$formvalues['map_id'][$i];
$sql="select * from tbl_zonalmapping  where map_id='".$map_id."'";
#$obj->alert($sql);
$query=@mysql_query($sql)or die(http(0139));
while($row=mysql_fetch_array($query)){
@mysql_query("delete from tbl_zonalmapping WHERE map_id='".$map_id."'")or die(http(0142));


}}
$obj->assign('bodyDisplay','innerHTML',"<font color=red>Data deleted!</font>");
$obj->call("xajax_view_zonalMapping",'','','');
return $obj;
}

function delete_organization($formvalues){
$obj =new xajaxResponse();
/*  if($_SESSION['role']<>'Monitoring and Evaluation'){
$obj->alert("Access Denied!\n Only Monitoring and Evaluation can Delete an Item!");
return $obj;
}  */
for($i=0;$i<count($formvalues['org_code12']);$i++){
$org_code=$formvalues['org_code12'][$i];
$x="select * from tbl_organization where org_code='".$org_code."'";
#$obj->alert($x);
$query=mysql_query($x)or die(http(__line__));


while($row=mysql_fetch_array($query)){
$xx="delete from tbl_organization WHERE org_code='".$org_code."'";
#$obj->alert($xx);
mysql_query("update tbl_organization set display='No' where display='Yes' and org_code='".$org_code."' ")or die(http("DL-0042"));

}
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Organization  Deactivated!"));
$obj->call("xajax_view_organization",'','','',1,20);
return $obj;
}

function delete_relatedlink($formvalues){
$obj =new xajaxResponse();
for($i=0;$i<count($formvalues['relatedlink_id']);$i++){
$relatedlink_id=$formvalues['relatedlink_id'][$i];
#$row =mysql_fetch_array(mysql_query("select * from tbl_user where user_id='".$user_id."'"))or die("Sunrise Error-code 716 because, ".mysql_error());
$x="delete from tbl_relatedlinks where relatedlink_id='".$relatedlink_id."'";
#$obj->alert($x);
mysql_query($x)or die("Sunrise Error-code 734 because, ".mysql_error());
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Related Link Deleted!"));
$obj->call("xajax_view_relatedLink",'');
return $obj;
}

function delete_district($formvalues){
$obj =new xajaxResponse();
#$obj->alert($formvalues['district_code']);
for($i=0;$i<count($formvalues['district_code']);$i++){

$district_code=$formvalues['district_code'][$i];
$districtName=$formvalues['districtName'][$i];

$sqlone="update tbl_district set Display='NO', updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";
//$obj->alert($sql);

#$sqltwo="update tbl_subcounty set Display='No' , updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";
#$sqlthree="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";



#$sqlone="update tbl_district  where districtCode='".$district_code."'";
//$obj->alert($sql);

$sqltwo="delete from tbl_subcounty  where districtCode='".$district_code."'";
$sqlthree="delete from tbl_parish  where districtCode='".$district_code."'";
//$obj->alert($sql);
mysql_query($sqlone) or die(http(0748));
mysql_query($sqltwo) or die(http(0749));
mysql_query($sqlthree) or die(http(750));
}
$obj->assign('bodyDisplay','innerHTML',"<font color=red>District Deleted!</font>");
$obj->call("xajax_view_district",'','',1,20);
return $obj;
}

function delete_subcounty($formvalues){
$obj =new xajaxResponse();
#$obj->alert($formvalues['district_code']);
for($i=0;$i<count($formvalues['subcountyCode']);$i++){

$subcountyCode=$formvalues['subcountyCode'][$i];
$sql="delete from  tbl_subcounty where subcountyCode='".$subcountyCode."'";
$sql2="delete from tbl_parish  where subcountyCode='".$subcountyCode."'";
#$sql="update tbl_subcounty set Display='No' , updatedby='".$_SESSION['username']."' where subcountyCode='".$subcountyCode."'";
#$sql2="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where subcountyCode='".$subcountyCode."'";
#$obj->alert($sql);
mysql_query($sql)or die(http(0762));
mysql_query($sql2)or die(http(0764));
}
$obj->assign('bodyDisplay','innerHTML',"<font color=red>Subcounty Deleted!</font>");
$obj->call("xajax_view_subcounty",'','','',1,20);
return $obj;
}

function delete_parish($formvalues){
$obj =new xajaxResponse();

for($i=0;$i<count($formvalues['ParishCode']);$i++){

$ParishCode=$formvalues['ParishCode'][$i];
$sql="delete from  tbl_parish where ParishCode='".$ParishCode."'";
#$sql="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where ParishCode='".$ParishCode."'";
#$obj->alert($sql);
mysql_query($sql)or die(http(785));
}
$obj->assign('bodyDisplay','innerHTML',"<font color=red>Parish Deleted!</font>");
$obj->call("xajax_view_parish",'','','','',1,20);
return $obj;
}

function delete_document($formvalues){
$obj =new xajaxResponse();
for($i=0;$i<count($formvalues['document_id']);$i++){
$id=$formvalues['document_id'][$i];
#$row =mysql_fetch_array(mysql_query("select * from tbl_user where user_id='".$user_id."'"))or die("Sunrise Error-code 716 because, ".mysql_error());
$x="delete from tbl_documents where document_id='".$id."'";
#$obj->alert($x);
mysql_query($x)or die("Sunrise Error-code 810 because, ".mysql_error());
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Sunrise document Deleted!"));
$obj->call("xajax_view_document_admin",'','','');
return $obj;
}

function delete_home($formvalues){
$obj = new xajaxResponse(); 

/* if($_SESSION['role']<>'Systems Administrator'){
$obj->alert("Access Denied! Only Systems Administrator can Delete Home details!");
return $obj;
}  */

#$obj->alert(count($formvalues['home_id']));
for($i=0;$i<count($formvalues['home_id']);$i++){
$id=$formvalues['home_id'][$i];

	$x="delete from tbl_home where home_id='".$id."'";
	#$obj->alert($x);
@mysql_query($x)or die(http("Setup-280"));
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Details Deleted!"));
$obj->call("xajax_view_home",'');
return $obj;
}

function delete_household($formvalues){
	$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['household_id']);$x++){
	$hh_id=$formvalues['household_id'][$x];
	
	$insert="update tbl_household set display='NO' where household_id='".$hh_id."'";
	#$obj->alert($insert);
	mysql_query($insert)or die(http(0297));
	$data="House Hold Details Changed!";
	}
	
	$obj->assign('bodyDisplay','innerHTML',congMsg($data));
	$obj->call('xajax_community_mapping','','','','');
	return $obj;
	}

function delete_child($formvalues){
	$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['child_id']);$x++){
	$child_id=$formvalues['child_id'][$x];
	
	$insert="update tbl_ovcdetails set display='NO' where child_id='".$child_id."'";
	#$obj->alert($insert);
	mysql_query($insert)or die(http(0297));
	$data="OVC Details Deleted!";
	}
	
	$obj->assign('bodyDisplay','innerHTML',congMsg($data));
	$obj->call('xajax_community_mapping','','','','');
	return $obj;
	}

function delete_IndicatorDefinition($formvalues){
$obj =new xajaxResponse();
if(count($formvalues['defn_id'])>0){
$query=@mysql_query("select * from tbl_indicator_definition where defn_id ='".$formvalues."'")or die(http("Delete-372"));
while($row=@mysql_fetch_array($query)){
@mysql_query("delete from tbl_indicator_definition WHERE defn_id='".$formvalues."'")or die(http("Delete-377"));
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Indicator Moved to Trash!"));
$obj->call("xajax_view_indicatorDefinition",'','','','','',1,20);
}else{ 
$obj->assign('bodyDisplay','innerHTML',noteMsg("Records could not be Deleted please try again!"));

}
return $obj;
} 

function delete_indicator($formvalues){
$obj =new xajaxResponse();
if(count($formvalues['indicator_idAll'])>0){
for($i=0;$i<count($formvalues['indicator_idAll']);$i++){
$indicator_id=$formvalues['indicator_idAll'][$i];
$query=@mysql_query("select * from tbl_indicator where indicator_id ='".$indicator_id."'")or die(http("Delete-372"));
while($row=@mysql_fetch_array($query)){
#mysql_query("delete from tbl_indicator WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());
//@mysql_query("delete from tbl_workplan WHERE indicator_id='".$indicator_id."'")or die(http("Delete-375"));
#mysql_query("delete from tbl_organizationreporting WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());
@mysql_query("delete from tbl_indicator WHERE indicator_id='".$indicator_id."'")or die(http("Delete-377"));
#mysql_query("delete from tbl_projectlifetargets WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());





}
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Indicator deleted!"));
$obj->call("xajax_view_indicator",'','','','','',1,20);
}else{ 
$obj->assign('bodyDisplay','innerHTML',noteMsg("Records could not be Deleted please try again!"));


}


return $obj;
} 

function delete_IndicatorDefn($formvalues){
$obj =new xajaxResponse();
if(count($formvalues['indicator_idAll'])>0){
for($i=0;$i<count($formvalues['indicator_idAll']);$i++){
$indicator_id=$formvalues['indicator_idAll'][$i];
$query=@mysql_query("select * from tbl_indicator_definition where indicator_id ='".$indicator_id."'")or die(http("Delete-372"));
while($row=@mysql_fetch_array($query)){
#mysql_query("delete from tbl_indicator WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());
//@mysql_query("delete from tbl_workplan WHERE indicator_id='".$indicator_id."'")or die(http("Delete-375"));
#mysql_query("delete from tbl_organizationreporting WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());
@mysql_query("delete from tbl_indicator_definition WHERE indicator_id='".$indicator_id."'")or die(http("Delete-377"));
#mysql_query("delete from tbl_projectlifetargets WHERE indicator_id='".$indicator_id."'")or die("aBi-Error code 0961: Deletion failed!".mysql_error());





}
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Indicator Definition deleted!"));
$obj->call("xajax_view_indicatorDefinition","ASARECA",'','','','',1,20);
}else{ 
$obj->assign('bodyDisplay','innerHTML',noteMsg("Records could not be Deleted please try again!"));


}


return $obj;
} 



 
 
 
?>