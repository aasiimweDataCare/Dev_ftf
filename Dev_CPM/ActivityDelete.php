<?php
#*************************editing*******************
function delete_zone($formvalues){
$feedback =new xajaxResponse();
/* if($_SESSION['role']<>'Monitoring and Evaluation'){
$feedback->addAlert("Access Denied!\n Only Monitoring and Evaluation Soecialist  can Delete a Setup Item!");
return $feedback;
} */
#$feedback->addAlert($formvalues['map_id']);
for($i=0;$i<count($formvalues['map_id']);$i++){
$map_id=$formvalues['map_id'][$i];
$sql="select * from tbl_zonalmapping  where map_id='".$map_id."'";
#$feedback->addAlert($sql);
$query=@mysql_query($sql)or die(http(0139));
while($row=mysql_fetch_array($query)){
@mysql_query("delete from tbl_zonalmapping WHERE map_id='".$map_id."'")or die(http(0142));


}}
$feedback->addAssign('bodyDisplay','innerHTML',"<font color=red>Data deleted!</font>");
$feedback->addScriptCall("xajax_view_zonalMapping",'','','');
return $feedback;
}


function delete_organization($formvalues){
$feedback =new xajaxResponse();
/*  if($_SESSION['role']<>'Monitoring and Evaluation'){
$feedback->addAlert("Access Denied!\n Only Monitoring and Evaluation can Delete an Item!");
return $feedback;
}  */
for($i=0;$i<count($formvalues['org_code12']);$i++){
$org_code=$formvalues['org_code12'][$i];
$x="select * from tbl_organization where org_code='".$org_code."'";
#$obj->addAlert($x);
$query=mysql_query($x)or die("Sunrise - Error code 0626: could not delete an item because ".mysql_error());


while($row=mysql_fetch_array($query)){
$xx="delete from tbl_organization WHERE org_code='".$org_code."'";
#$feedback->addAlert($xx);
mysql_query("update tbl_organization set display='No' where display='Yes' and org_code='".$org_code."' ")or die("Sunrise-Error code 0627: Deletion failed!".mysql_error());

}
}
$feedback->assign('bodyDisplay','innerHTML',noteMsg("Organization  Deactivated!"));
$feedback->call("xajax_view_organization",'','','',1,20);
return $feedback;
}


#***********************************
#deleting user

#***********************************
function delete_user($formvalues){
$feedback =new xajaxResponse();
for($i=0;$i<count($formvalues['user_id']);$i++){
$user_id=$formvalues['user_id'][$i];
#$row =mysql_fetch_array(mysql_query("select * from tbl_user where user_id='".$user_id."'"))or die("Sunrise Error-code 716 because, ".mysql_error());
#$x="delete from tbl_user where user_id='".$user_id."'";
$x="update tbl_user set display='No' where user_id='".$user_id."'";
#$feedback->addAlert($x);
mysql_query($x)or die(http(0064));
}
$feedback->addAssign('bodyDisplay','innerHTML',noteMsg("User Deleted!"));
$feedback->AddScriptCall("xajax_view_users",'','','','','','','','','','');
return $feedback;
}


function delete_relatedlink($formvalues){
$feedback =new xajaxResponse();
for($i=0;$i<count($formvalues['relatedlink_id']);$i++){
$relatedlink_id=$formvalues['relatedlink_id'][$i];
#$row =mysql_fetch_array(mysql_query("select * from tbl_user where user_id='".$user_id."'"))or die("Sunrise Error-code 716 because, ".mysql_error());
$x="delete from tbl_relatedlinks where relatedlink_id='".$relatedlink_id."'";
#$feedback->addAlert($x);
mysql_query($x)or die("Sunrise Error-code 734 because, ".mysql_error());
}
$feedback->addAssign('bodyDisplay','innerHTML',noteMsg("Related Link Deleted!"));
$feedback->AddScriptCall("xajax_view_relatedLink",'');
return $feedback;
}



function delete_district($formvalues){
$feedback =new xajaxResponse();
#$feedback->addAlert($formvalues['district_code']);
for($i=0;$i<count($formvalues['district_code']);$i++){

$district_code=$formvalues['district_code'][$i];
$districtName=$formvalues['districtName'][$i];

$sqlone="update tbl_district set Display='NO', updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";
//$feedback->addAlert($sql);

#$sqltwo="update tbl_subcounty set Display='No' , updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";
#$sqlthree="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where districtCode='".$district_code."'";



#$sqlone="update tbl_district  where districtCode='".$district_code."'";
//$feedback->addAlert($sql);

$sqltwo="delete from tbl_subcounty  where districtCode='".$district_code."'";
$sqlthree="delete from tbl_parish  where districtCode='".$district_code."'";
//$feedback->addAlert($sql);
mysql_query($sqlone) or die(http(0748));
mysql_query($sqltwo) or die(http(0749));
mysql_query($sqlthree) or die(http(750));
}
$feedback->addAssign('bodyDisplay','innerHTML',"<font color=red>District Deleted!</font>");
$feedback->addScriptCall("xajax_view_district",'','',1,20);
return $feedback;
}


function delete_subcounty($formvalues){
$feedback =new xajaxResponse();
#$feedback->addAlert($formvalues['district_code']);
for($i=0;$i<count($formvalues['subcountyCode']);$i++){

$subcountyCode=$formvalues['subcountyCode'][$i];
$sql="delete from  tbl_subcounty where subcountyCode='".$subcountyCode."'";
$sql2="delete from tbl_parish  where subcountyCode='".$subcountyCode."'";
#$sql="update tbl_subcounty set Display='No' , updatedby='".$_SESSION['username']."' where subcountyCode='".$subcountyCode."'";
#$sql2="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where subcountyCode='".$subcountyCode."'";
#$feedback->addAlert($sql);
mysql_query($sql)or die(http(0762));
mysql_query($sql2)or die(http(0764));
}
$feedback->addAssign('bodyDisplay','innerHTML',"<font color=red>Subcounty Deleted!</font>");
$feedback->addScriptCall("xajax_view_subcounty",'','','',1,20);
return $feedback;
}


function delete_parish($formvalues){
$feedback =new xajaxResponse();

for($i=0;$i<count($formvalues['ParishCode']);$i++){

$ParishCode=$formvalues['ParishCode'][$i];
$sql="delete from  tbl_parish where ParishCode='".$ParishCode."'";
#$sql="update tbl_parish set Display='No' , updatedby='".$_SESSION['username']."' where ParishCode='".$ParishCode."'";
#$feedback->addAlert($sql);
mysql_query($sql)or die(http(785));
}
$feedback->addAssign('bodyDisplay','innerHTML',"<font color=red>Parish Deleted!</font>");
$feedback->addScriptCall("xajax_view_parish",'','','','',1,20);
return $feedback;
}

function delete_document($formvalues){
$feedback =new xajaxResponse();
for($i=0;$i<count($formvalues['document_id']);$i++){
$id=$formvalues['document_id'][$i];
#$row =mysql_fetch_array(mysql_query("select * from tbl_user where user_id='".$user_id."'"))or die("Sunrise Error-code 716 because, ".mysql_error());
$x="delete from tbl_documents where document_id='".$id."'";
#$feedback->addAlert($x);
mysql_query($x)or die("Sunrise Error-code 810 because, ".mysql_error());
}
$feedback->addAssign('bodyDisplay','innerHTML',noteMsg("Sunrise document Deleted!"));
$feedback->AddScriptCall("xajax_view_document_admin",'','','');
return $feedback;
}

function delete_home($formvalues){
$feedback = new xajaxResponse(); 

if($_SESSION['role']<>'Systems Administrator'){
$feedback->addAlert("Access Denied! Only Systems Administrator can Delete Home details!");
return $feedback;
} 

#$feedback->addAlert(count($formvalues['home_id']));
for($i=0;$i<count($formvalues['home_id']);$i++){
$id=$formvalues['home_id'][$i];

$x="delete from tbl_home where home_id='".$id."'";
#$feedback->addAlert($x);
mysql_query($x)or die("Sunrise Error-code 830 because, ".mysql_error());
}
$feedback->addAssign('bodyDisplay','innerHTML',noteMsg("Sunrise home details Deleted!"));
$feedback->AddScriptCall("xajax_view_home",'');
return $feedback;
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

/* function get_agruments($fn_name,$number){
for(){


} */

 #delete_data($formvalues,$unique_column,$tbl_name,$funtion_or_file_name);
 
 
function delete_dataCompletely($formvalues,$unique_column,$tbl_name){
$obj=new xajaxResponse();
/*  if($formvalues[$unique_column]==NULL){
$obj->alert("Please Select Records to Delete!");
return $obj;
}  */
//$obj->alert($formvalues[$unique_column]);
for($x=0;$x<count($formvalues[$unique_column]);$x++){

$code=$formvalues[$unique_column][$x];
#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$sql="delete from  ".$tbl_name." where ".$unique_column."='".$code."'";
//$obj->alert($sql);

@mysql_query($sql)or die(http(0235));
$table_pk_id='id';
$changed_from='Deleted';
$changed_to='Deleted';
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to));
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Records Deactivated! "));
return $obj;

}

 
 
 
 


function delete_data($formvalues,$unique_column,$tbl_name){
$obj=new xajaxResponse();
/*  if($formvalues[$unique_column]==NULL){
$obj->alert("Please Select Records to Delete!");
return $obj;
}  */
//$obj->alert($formvalues[$unique_column]);
for($x=0;$x<count($formvalues[$unique_column]);$x++){

$code=$formvalues[$unique_column][$x];
#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$sql="update ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
//$obj->alert($sql);

@mysql_query($sql)or die(http(0235));
$table_pk_id='id';
$changed_from='Yes';
$changed_to='No';
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to));
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Records Deactivated! Your Deactivated Records will be  kept Temporarily for a month and will be deleted Completely! For information bout how to rollback Contact Your Systems Administrator"));
return $obj;

}


/* function EmptyRecycleBin($formvalues,$unique_column,$tbl_name){
$obj=new xajaxResponse();

//$obj->alert($formvalues[$unique_column]);
for($x=0;$x<count($formvalues[$unique_column]);$x++){

$code=$formvalues[$unique_column][$x];
$sql="delete from ".$tbl_name." where display='No'";
//$obj->alert($sql);
@mysql_query($sql)or die(http("DEL-0279"));
$table_pk_id='id';
$changed_from='Yes';
$changed_to='No';
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from,$changed_to));
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Recycle Bin Emptied!"));
return $obj;

} */




//}





 /* function Rollback_delete($formvalues,$comment,$unique_column,$tbl_name,$funtion_or_file_name){
$obj=new xajaxResponse();
for($x=0;$x<count($formvalues[$unique_column]);$x++){
$code=$formvalues[$unique_column][$x];
#$del=mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die("Error...on line 006".mysql_error());
$del=mysql_query("update ".$tbl_name." set display='Yes' where ".$unique_column."='".$code."'")or die(http(0235));
/* if($del){
echo"<font color='red'>Data Deleted!</font>";
echo "<meta http-equiv=Refresh content=3;url=$file_name.php>";
}else
echo"<font color='red'>Error...could not delete Data!</font>";
} 
}

$obj->assign('bodyDisplay','innerHTML',congMsg("Rollback Complete!"));
$obj->call($funtion_or_file_name,'','','','','','','','','','');
return $obj;
}

 
 }
 } */
?>