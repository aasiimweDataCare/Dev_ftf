<?php

function delete_myDistricts($formValues){
$obj=new xajaxResponse();

if(count($formValues['districtCode'])>0){
for($x=0;$x<count($formValues['districtCode']);$x++){
	$sql="DELETE d.* FROM `tbl_district` d
	WHERE d.`districtCode`='".$formValues['districtCode'][$x]."'
	AND d.`zone`='".$formValues['regionalCode'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the Districts.";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(http(56));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(http(59));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("District record successfully Deleted!"));
$obj->call('xajax_view_myDistricts','');
return $obj;
}//-----------------------------------------------------------End of function delete_Districts-----------------------------------------

function delete_Parishes($formValues){
$obj=new xajaxResponse();

if(count($formValues['ParishCode'])>0){
for($x=0;$x<count($formValues['ParishCode']);$x++){
	$sql="DELETE p.* FROM `tbl_parish` p
	WHERE p.`districtCode`='".$formValues['districtCode'][$x]."'
	AND p.`SubcountyCode`='".$formValues['SubcountyCode'][$x]."'
	AND p.`ParishCode`='".$formValues['ParishCode'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the Parishes.";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-20"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-23"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Parish record successfully Deleted!"));
$obj->call('xajax_view_Parishes','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_Parishes-----------------------------------------

function delete_Subcounties($formValues){
$obj=new xajaxResponse();

if(count($formValues['subcountyCode'])>0){
for($x=0;$x<count($formValues['subcountyCode']);$x++){
	$sql="DELETE s.* FROM `tbl_subcounty` s WHERE s.`districtCode`='".$formValues['districtCode'][$x]."' AND s.`subcountyCode`='".$formValues['subcountyCode'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the Subcounties.";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-20"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-23"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Subcounty record successfully Deleted!"));
$obj->call('xajax_view_Subcounties','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_Subcounties-----------------------------------------

function delete_cropTreatmentsLookup($formValues){
$obj=new xajaxResponse();

if(count($formValues['code'])>0){
for($x=0;$x<count($formValues['code']);$x++){
	$sql="DELETE l.* FROM `tbl_lookup` l WHERE l.`classCode`=36 AND l.`code`='".$formValues['code'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the crop treatment types for Demo record book form";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-20"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-23"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Crop treatment record  successfully Deleted From Look up Table!"));
$obj->call('xajax_view_cropTreatmentsLookup','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_cropTreatmentsLookup-----------------------------------------

function delete_actorsServedLookup($formValues){
$obj=new xajaxResponse();

if(count($formValues['code'])>0){
for($x=0;$x<count($formValues['code']);$x++){
	$sql="DELETE l.* FROM `tbl_lookup` l WHERE l.`classCode`=31 AND l.`code`='".$formValues['code'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the type of Actors served for form 2 BDS sub-form";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-25"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-27"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("BDS type of actor served record  successfully Deleted From Look up Table!"));
$obj->call('xajax_view_actorsServedLookup','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_actorsServedLookup-----------------------------------------

function delete_labourSavingTechLookup($formValues){
$obj=new xajaxResponse();

if(count($formValues['code'])>0){
for($x=0;$x<count($formValues['code']);$x++){
	$sql="DELETE l.* FROM `tbl_lookup` l WHERE l.`classCode`=30 AND l.`code`='".$formValues['code'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the labour saving Technologies";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-25"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-27"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Labour Saving Technology successfully Deleted From Look up Table!"));
$obj->call('xajax_view_labourSavingTechLookup','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_labourSavingTechLookup-----------------------------------------
//--------------start Delete traderModelsLookup-----------------------
function delete_traderModelsLookup($formValues){
$obj=new xajaxResponse();

if(count($formValues['code'])>0){
for($x=0;$x<count($formValues['code']);$x++){
	$sql="DELETE l.* FROM `tbl_lookup` l WHERE l.`classCode`=38 AND l.`code`='".$formValues['code'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the Trader Models";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-25"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-27"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Trader Model successfully Deleted From Look up Table!"));
$obj->call('xajax_view_traderModelsLookup','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_traderModelsLookup-----------------------------------------
//--------------end Delete traderModelsLookup-------------------------
//--------------start Delete enterpriseTechnologiesLookup-----------------------
function delete_enterpriseTechnologiesLookup($formValues){
$obj=new xajaxResponse();

if(count($formValues['code'])>0){
for($x=0;$x<count($formValues['code']);$x++){
	$sql="DELETE l.* FROM `tbl_lookup` l WHERE l.`classCode`=37 AND l.`code`='".$formValues['code'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted one of the Enterprise Technologies";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(QueryManager::http("DEL-25"));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(QueryManager::http("DEL-27"));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Trader Model successfully Deleted From Look up Table!"));
$obj->call('xajax_view_enterpriseTechnologiesLookup','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_enterpriseTechnologiesLookup-----------------------------------------
//--------------end Delete enterpriseTechnologiesLookup-------------------------
function delete_cropVarieties($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['loopkey']);$x++){
	$sql="DELETE  `c`.* FROM `tbl_cropvarieties` as `c` where `c`.`pk_cropVarietiesId`='".$formValues['pk_cropVarietiesId'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted  crop variety [id]->".$formValues['pk_cropVarietiesId'][$x]." and Variety:".$formValues['cropCode']."  ";  // returns "abcde"
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

//@mysql_query($stmnt)or die("DEL-25 because ".mysql_error());
@mysql_query($stmnt) or die(http(223));

//@mysql_query($sql)or die("DEL-27 because ".mysql_error());
@mysql_query($sql) or die(http(226));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Crop Variety Deleted Successfully"));
$obj->call('xajax_view_cropVarieties','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_labourSavingTechLookup-----------------------------------------

function delete_form8($formValues){
$obj=new xajaxResponse();

if(count($formValues['demoId'])>0){
for($x=0;$x<count($formValues['demoId']);$x++){
	$sql="DELETE  b.*, d.* FROM `tbl_demo_records_book` b INNER JOIN `tbl_demo_book_details` d ON  d.`demoId`=b.`demoId`  WHERE  d.`demoId`='".$formValues['demoId'][$x]."' ";
	//$obj->alert($sql);
if($sql<>''){

@mysql_query($sql)or die(http(249));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Demo record book successfully Deleted!"));
$obj->call('xajax_view_form8','','','');
return $obj;
}//-----------------------------------------------------------End of function delete_form8-----------------------------------------
//===============================Profile deletes===========================
function delete_form6($formValues){
$obj=new xajaxResponse();

//$obj->alert(count($formValues['houseHoldId']));

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['loopkey']);$x++){

// Chech which table is empty
$x1="select `m`.* from `tbl_household_members` as `m` where  `m`.`houseHoldId`='".$formValues['houseHoldId'][$x]."'";
$query=@Execute($x1) or die(http("delete.php-0272"));
$result1=FetchRecords($query);

$x2="select `sm`.* from `tbl_household_summary_data` as `sm` where  `sm`.`houseHoldId`='".$formValues['houseHoldId'][$x]."'";
$query=@Execute($x2) or die(http("delete.php-0276"));
$result2=FetchRecords($query);

$x3="select `rsk`.* from `tbl_household_risk_reducing_practices` as `rsk` where  `rsk`.`houseHoldId`='".$formValues['houseHoldId'][$x]."'";
$query=@Execute($x3) or die(http("delete.php-0280"));
$result3=FetchRecords($query);

$sql="DELETE `h`.*";
($result1<>null || $result1<>'')?$sql.=", `m`.*":$sql.=" ";
($result2<>null || $result2<>'')?$sql.=", `sm`.*":$sql.=" ";
($result3<>null || $result3<>'')?$sql.=", `rsk`.*":$sql.=" ";
$sql.=" FROM ";
$sql.="`tbl_house_hold_details` as `h`";
($result1<>null || $result1<>'')?$sql.=" join `tbl_household_members` as `m` on (`m`.`houseHoldId`=`h`.`houseHoldId`)":$sql.=" ";
($result2<>null || $result2<>'')?$sql.=" join `tbl_household_summary_data` as `sm` on (`sm`.`houseHoldId`=`h`.`houseHoldId`)":$sql.=" ";
($result2<>null || $result2<>'')?$sql.=" join `tbl_household_risk_reducing_practices` as `rsk` on (`rsk`.`houseHoldId`=`h`.`houseHoldId`)":$sql.=" ";
$sql.=" WHERE  `h`.`houseHoldId`='".$formValues['houseHoldId'][$x]."'";
if($sql<>'' || $result1<>null){
@mysql_query($sql)or die(http(294));
}

}
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Household  record successfully Deleted!"));
$obj->call('xajax_view_form6','','',1,20);
return $obj;
}//-----------------------------------------------------------End of delete_form6-----------------------------------------

function delete_farmers($formValues){
$obj=new xajaxResponse();

if(count($formValues['tbl_villageagent_groupsId'])>0){
for($x=0;$x<count($formValues['tbl_villageagent_groupsId']);$x++){
	/* $sql="DELETE  f.* FROM `tbl_farmers` as `f` WHERE  `f`.`tbl_villageagent_groupsId`='".$formValues['tbl_villageagent_groupsId'][$x]."' "; 
	$sql2="DELETE v.* FROM `tbl_villageagent_groups` as `v` WHERE `v`.`tbl_villageagent_groupsId`='".$formValues['tbl_villageagent_groupsId'][$x]."' ";
 */
 
	$sql="update tbl_farmers set display='No' where  tbl_villageagent_groupsId='".$formValues['tbl_villageagent_groupsId'][$x]."' "; 
	$sql2="update tbl_villageagent_groups set display='No' where tbl_villageagent_groupsId='".$formValues['tbl_villageagent_groupsId'][$x]."' ";


if($sql<>''){
//$obj->alert('sql->'.$sql.'sql->'.$sql2);
//log user Action
$action = "Deleted all farmers in a group with id->".$formValues['tbl_villageagent_groupsId'][$x]." .";  // returns "abcde"
$description=mysql_real_escape_string($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";
//Actual execute query to delete farmers
@mysql_query($stmnt)or die(QueryManager::http("DEL-325"));
@mysql_query($sql)or die(QueryManager::http("DEL-325"));


//log user Action
$action = "Deleted a farmer group from the groups table group with id->".$formValues['tbl_villageagent_groupsId'][$x].".";  // returns "abcde"
$description=mysql_real_escape_string($sql2);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";
//Actual execute query to delete farmer group
@mysql_query($stmnt)or die(QueryManager::http("DEL-325"));
@mysql_query($sql2)or die(QueryManager::http("DEL-326"));
} 

}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Farmer records successfully Deleted!"));
$obj->call('xajax_view_form7','','',1,20);  
return $obj;
}//-----------------------------------------------------------End of function delete_farmer-----------------------------------------

function delete_vAgent($formValues){
$obj=new xajaxResponse();

//$obj->alert(count($formValues['tbl_villageAgentId']));

if(count($formValues['tbl_villageAgentId'])>0){
for($x=0;$x<count($formValues['tbl_villageAgentId']);$x++){
	
//$sql="DELETE FROM `tbl_villageagents` WHERE `tbl_villageagents`.`tbl_villageAgentId` ='".$formValues['tbl_villageAgentId'][$x]."'";
$sql="update `tbl_villageagents` set display='No' where `tbl_villageAgentId` ='".$formValues['tbl_villageAgentId'][$x]."'";

if($sql<>''){
//log user Action
$action = "Deleted Village agent(s), Farmer Groups and Farmers with Village Agent id->".$formValues['tbl_villageAgentId'][$x]." .";  // returns "abcde"
$description=mysql_real_escape_string($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";
//Actual execute query to delete farmers
//$obj->alert($sql);
@mysql_query($stmnt)or die(http(__line__));	
@mysql_query($sql)or die(http(__line__));

//delete Farmer Groups too
$delGroupstmnt="UPDATE `tbl_villageagent_groups` 
SET `display`='No'
WHERE `tbl_villageAgentId` = '".$formValues['tbl_villageAgentId'][$x]."'";
$query=@Execute($delGroupstmnt) or die(http(__line__));	

//delete  Farmers too
$delFarmersStmnt="UPDATE `tbl_farmers` 
SET `display`='No'
WHERE `tbl_villageAgentId` = '".$formValues['tbl_villageAgentId'][$x]."'";		
$query=@Execute($delFarmersStmnt) or die(http(__line__));	

}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Village Agent Profile successfully Deleted!"));
$obj->call('xajax_setup_vAgent','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete_vAgent-----------------------------------------

function delete_exporter($formValues){
$obj=new xajaxResponse();
$table='tbl_exporters';
$keyField="tbl_exportersId";
if(count($formValues['tbl_exportersId'])>0){
for($x=0;$x<count($formValues['tbl_exportersId']);$x++){
	$sql="update ".$table." set display='No' WHERE  ".$keyField." = '".$formValues['tbl_exportersId'][$x]."'";
	
if($sql<>''){
//log user Action
$action = "Deleted Exporter(s) with id->".$formValues['tbl_exportersId'][$x]." .";  // returns "abcde"
$description=mysql_real_escape_string($sql);

//values before
$st="select * from ".$table." where ".$keyField." = '".$formValues['tbl_exportersId'][$x]."'";
$query=@Execute($st)or die(http("DEL-465"));
$result=FetchRecords($query);
$exporterName=$result['exporterName'];
//$valueBeforeAction = implode(', ', $result);
$valueBeforeAction = "Exporter named:".$exporterName."";
$valueAfterAction = "Deleted an exporter named:".$exporterName."";
$affectedTable = $table;
$affectedTableId = $formValues['tbl_exportersId'][$x];

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`, `valueBeforeAction`, `valueAfterAction`, `affectedTable`, `affectedTableId`) 
VALUES 
('".$_SESSION['username']."','".$action."','".$description."','".$valueBeforeAction."','".$valueAfterAction."','".$affectedTable."','".$affectedTableId."')";


/* Actual execute query to delete farmers */
@mysql_query($stmnt)or die(QueryManager::http("DEL-325"));	
@mysql_query($sql)or die(QueryManager::http("DEL-481"));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Exporter Profile successfully Deleted!"));
$obj->call('xajax_setup_exporter','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete_exporter-----------------------------------------

function delete_trader($formValues){
$obj=new xajaxResponse();
		
if(count($formValues['tbl_tradersId'])>0){
for($x=0;$x<count($formValues['tbl_tradersId']);$x++){
	//$sql="DELETE  t.* FROM `tbl_traders` t  WHERE  t.`tbl_tradersId`='".$formValues['tbl_tradersId'][$x]."' ";
	$sql="update tbl_traders set display='No' WHERE  tbl_tradersId='".$formValues['tbl_tradersId'][$x]."' ";
if($sql<>''){
//log user Action
$action = "Deleted Trader(s) with id->".$formValues['tbl_tradersId'][$x]." .";  // returns "abcde"
$description=mysql_real_escape_string($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";
//Actual execute query to delete farmers
//$obj->alert($sql);	
@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));

//delete VA's
$delVAstmnt="UPDATE `tbl_villageagents` SET `display` = 'No' 
where `tbl_tradersId` = '".$formValues['tbl_tradersId'][$x]."'";
$query=@Execute($delVAstmnt) or die(http(__line__));

//delete Farmer Groups too
$delGroupstmnt="UPDATE `tbl_villageagent_groups` 
SET `display`='No'
where `tbl_tradersId` = '".$formValues['tbl_tradersId'][$x]."'";
$query=@Execute($delGroupstmnt) or die(http(__line__));	

//delete  Farmers too
$delFarmersStmnt="UPDATE `tbl_farmers` 
SET `display`='No'
where `tbl_tradersId` = '".$formValues['tbl_tradersId'][$x]."'";		
$query=@Execute($delFarmersStmnt) or die(http(__line__));	


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Trader Profile successfully Deleted!"));
$obj->call('xajax_setup_trader','','',1,20);
return $obj;
}//-----------------------------------------------------------End of function delete_trader-----------------------------------------
//===============================form2 deletes===========================
function delete_enterpriseTechAdoption($formValues){
$obj=new xajaxResponse();
		//$obj->alert($formvalues[$unique_column]);
		//$obj->alert(count($formvalues[$unique_column]));

if(count($formValues['tbl_techadoptionId'])>0){
for($x=0;$x<count($formValues['tbl_techadoptionId']);$x++){
	//$code=$formvalues[$unique_column][$x];
	$sql="DELETE  t.* FROM `tbl_techadoption` t  WHERE  t.`tbl_techadoptionId`='".$formValues['tbl_techadoptionId'][$x]."' ";
	//$obj->alert($sql);
if($sql<>''){

@mysql_query($sql)or die(QueryManager::http("DEL-4347"));
//$obj->alert("Record successfully Deleted!");
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Enterprise Technology Adoption Record successfully Deleted!"));
$obj->call('xajax_view_enterpriseTechAdoption','','','','');
return $obj;
}//-----------------------------------------------------------End of function delete Training Form1-----------------------------------------

function delete_labourSavingTech($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `l`.*,`ls`.* 
FROM `tbl_laboursavingtech` as `l`
INNER JOIN `tbl_labourSavingTech_jobHolder` as `ls` 
ON (`ls`.`labour_saving_tech_id`=`l`.`tbl_laboursavingtechId`)
Where  `l`.`tbl_laboursavingtechId`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("Labour Saving Technology Adoption totally deleted"));
$obj->call('xajax_view_labourSavingTech','','','',1,20);
return $obj;
}


function delete_mediaPrograms($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `m`.*,`mj`.* 
FROM `tbl_mediaprograms` as `m`
INNER JOIN `tbl_mediaprogram_jobholder` as `mj` 
ON (`mj`.`media_program_id` = `m`.`tbl_mediaprogramsId`)
Where  `m`.`tbl_mediaprogramsId`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("Media Programs record successfully Deleted!"));
$obj->call("xajax_view_mediaPrograms",'','','','',1,20);
return $obj;
}

function delete_youthApprentice($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `y`.*,`yj`.* 
FROM `tbl_youthapprentice` as `y`
INNER JOIN `tbl_apprenticeship_jobHolder` as `yj` 
ON (`yj`.`apprenticeship_id` = `y`.`tbl_youthapprenticeId`)
Where  `y`.`tbl_youthapprenticeId`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("Youth Apprenticeship record successfully Deleted!"));
$obj->call('xajax_view_youthApprentice','','','',1,20);
return $obj;
}

function delete_bds($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `b`.*,`bj`.* 
FROM `tbl_businessdev` as `b`
INNER JOIN `tbl_bds_jobHolder` as `bj` 
ON (`bj`.`bds_id` = `b`.`tbl_businessdevId`)
Where  `b`.`tbl_businessdevId`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("Business Development Service record successfully Deleted!"));
$obj->call('xajax_view_bds','','','',1,20);
return $obj;
}

function delete_bankLoans($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `b`.*,`bj`.* 
FROM `tbl_bankloans` as `b`
INNER JOIN `tbl_bank_loans_jobHolder` as `bj` 
ON (`bj`.`bankLoan_id` = `b`.`tbl_bankLoanId`)
Where  `b`.`tbl_bankLoanId`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("Bank Loans record successfully Deleted!"));
$obj->call('xajax_view_bankLoans','','','','',1,20);
return $obj;
}


function delete_inputSales($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `s`.*,`sr`.*,`sm`.* 
from `tbl_input_sales` as `s`
join `inputSales_metaData` as `sr` on (`sr`.`sales_id` = `s`.`id`)
join `tbl_input_sales_meta_data` as `sm` on (`sm`.`id` = `sr`.`metadata_id`)
Where  `s`.`id`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("INPUT SALES record successfully Deleted!"));
$obj->call('xajax_view_inputSales','','','',1,20);
return $obj;
}

function delete_phh($id){
$obj=new xajaxResponse();

@mysql_query('SET foreign_key_checks = 0')or die(mysql_error());
$sql="
DELETE `p`.*,`pr`.*,`pm`.* 
from `tbl_phh` as `p`
join `phh_metaData` as `pr` on (`pr`.`phh_id` = `p`.`id`)
join `tbl_phh_meta_data` as `pm` on (`pm`.`id` = `pr`.`metadata_id`)
Where  `s`.`id`='".$id."'
";
@mysql_query($sql)or die(mysql_error());
@mysql_query('SET foreign_key_checks = 1')or die(mysql_error());

$obj->assign('bodyDisplay','innerHTML',errorMsg("PHH record successfully Deleted!"));
$obj->call('xajax_view_phh','','','',1,20);
return $obj;
}

function delete_partnerships($formValues){
$obj=new xajaxResponse();

if(count($formValues['tbl_partnershipId'])>0){
for($x=0;$x<count($formValues['tbl_partnershipId']);$x++){
	$sql="DELETE  p.* FROM `tbl_public_private_partnership` p  WHERE  p.`tbl_partnershipId`='".$formValues['tbl_partnershipId'][$x]."'";
	//$obj->alert($sql);
if($sql<>''){

@mysql_query($sql)or die(QueryManager::http("DEL-249"));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Public Private Partnership record(s) successfully Deleted!"));
$obj->call('xajax_view_partnerships','','','');
return $obj;
}//------------------End of function delete_partnerships-------------------
//********************************End of Form2 Deletes**********************************
//-------------- Delete Data Completely--------------------
function ConfirmDeletionCompletely($Keys,$FunctionName,$Tbl_name) {
$obj=new xajaxResponse();
	/* if(FunctionName==''){
		var answer=alert("Missing Unique Field!");
		
		}  */
		if($Tbl_name=='')
		{
			$obj->alert("Missing Entity Name!");
			}
//var $answer = $obj->confirm("Do you really want to Deactivate Records? \n Click 'Ok' to continue otherwise click 'Cancel'");
	if ($answer){
		if($FunctionName=='xajax_delete_AnnualTargets')xajax_delete_AnnualTargets($Keys,$FunctionName,$Tbl_name);
		if($FunctionName=='xajax_delete_LOPTarget')xajax_delete_LOPTarget($Keys,$FunctionName,$Tbl_name);
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
$query=@mysql_query($sql)or die(mysql_error());
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
$query=mysql_query($x)or die("Sunrise - Error code 0626: could not delete an item because ".mysql_error());


while($row=mysql_fetch_array($query)){
$xx="delete from tbl_organization WHERE org_code='".$org_code."'";
#$obj->alert($xx);
mysql_query("update tbl_organization set display='No' where display='Yes' and org_code='".$org_code."' ")or die("Sunrise-Error code 0627: Deletion failed!".mysql_error());

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
mysql_query($sqlone) or die(mysql_error());
mysql_query($sqltwo) or die(mysql_error());
mysql_query($sqlthree) or die(mysql_error());
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


function delete_documents($formValues){
$obj=new xajaxResponse();


if($_SESSION['role']<>'Systems Administrator'){
$obj->alert("Access Denied! Only Systems Administrator can Delete Home details!");
return $obj;
} 


	if(count($formValues['document_id'])>0){
		for($x=0;$x<count($formValues['document_id']);$x++){
		$sql="UPDATE `tbl_documents` SET `Display` = 'No' WHERE `document_id` = '".$formValues['document_id'][$x]."'";
			if($sql<>''){
			$action = "Deleted Documents(s) with document id->".$formValues['document_id'][$x]." .";
			$description=$action;
			$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";
			@mysql_query($stmnt)or die(http(__line__));	
			@mysql_query($sql)or die(http(__line__));
			}
		}
	}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Document successfully Deleted!"));
$obj->call('xajax_view_documents','','',1,20);
return $obj;
}

function delete_home($formvalues){
$obj = new xajaxResponse(); 

if($_SESSION['role']<>'Systems Administrator'){
$obj->alert("Access Denied! Only Systems Administrator can Delete Home details!");
return $obj;
} 

#$obj->alert(count($formvalues['home_id']));
for($i=0;$i<count($formvalues['home_id']);$i++){
$id=$formvalues['home_id'][$i];

$x="delete from tbl_home where home_id='".$id."'";
#$obj->alert($x);
mysql_query($x)or die("Sunrise Error-code 830 because, ".mysql_error());
}
$obj->assign('bodyDisplay','innerHTML',noteMsg("Sunrise home details Deleted!"));
$obj->call("xajax_view_home",'');
return $obj;
}

function delete_household($formvalues){
	$obj=new xajaxResponse();
for($x=0;$x<count($formvalues['household_id']);$x++){
	$hh_id=$formvalues['household_id'][$x];
	
	$insert="update tbl_household set display='NO' where household_id='".$hh_id."'";
	#$obj->alert($insert);
	mysql_query($insert)or die(mysql_error());
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
	mysql_query($insert)or die(mysql_error());
	$data="OVC Details Deleted!";
	}
	
	$obj->assign('bodyDisplay','innerHTML',congMsg($data));
	$obj->call('xajax_community_mapping','','','','');
	return $obj;
	}
 
function delete_dataCompletely($formvalues,$unique_column,$tbl_name){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert($formvalues['loopkey']);
//$obj->alert(count($formvalues['loopkey']));
for($x=0;$x<count($formvalues['loopkey']);$x++){

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

//$obj->assign('bodyDisplay','innerHTML',noteMsg("Records Deactivated! "));
$obj->alert("Records Deactivated!");
return $obj;

}

function delete_LOPTarget($code,$fyear,$tbl_name){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
/* $obj->alert($formvalues['indicator_idAll']);
$obj->alert(count($formvalues['indicator_idAll']));
 */
if($fyear==NULL){
$obj->alert("Please Select Project Year and Try again!");
return $obj;
}
if(count($code)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else


$sql="delete from  ".$tbl_name." where indicator_id='".$code."' and target_year='".$fyear."'";
//$obj->alert($sql);

$del=@mysql_query($sql)or die(http(0235));
if($del){
$obj->alert("Records Deactivated!");
#$obj->call('xajax_ViewLOPTargets','','','','','',1,20);

$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));
$obj->call('xajax_ViewLOPTargets','','','','','',1,20);
}else {

$obj->alert("Records Could Not be Deleted!");
return $obj;
}
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

function delete_CarpDataCompletely($code,$unique_column,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert($code);
//$obj->alert(count($code));


if(count($code)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else

$del=@mysql_query("delete from ".$tbl_name." where ".$unique_column."='".$code."'")or die(http("Delete-410"));
#$sql="delete from ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
//$obj->alert("delete from ".$tbl_name." where ".$unique_column."='".$code."'");
#@mysql_query($sql)or die(http(0235));
//@mysql_query("select * from tbl_workplan where workplan_id='$code'")
if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_AnnualTargets":
$obj->call('xajax_ViewAnnualTargets','','','','','','','','','','',1,20);
break;
case "delete_LOPTargets":
$obj->call('xajax_ViewLOPTargets','','','','','',1,20);
break;
case "delete_AnnualResultsHO":
$obj->call('xajax_view_AnnualResultsHO','','','','','','','','','',1,20);
break;
case "delete_AnnualResultsFS":
$obj->call('xajax_view_AnnualResultsReportLog','','','',1,20);
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

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}


return $obj;

}

function delete_CarpAdoptionRates($year,$semi_annual,$zone,$district,$typeofparticipants,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert("ook");
//$obj->alert(count($code));


if(count($year)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else
 #$code=" year='".$year."' && semi_annual='".$semi_annual."' && zone='".$zone."' && district='".$district."' && typeofparticipants='".$typeofparticipants."'";
 $sql="delete from ".$tbl_name." where year='".$year."' && semi_annual='".$semi_annual."' && zone='".$zone."' && district='".$district."' && typeofparticipants='".$typeofparticipants."'";
$del=@mysql_query($sql)or die(http("Delete-410"));
//$sql="delete from ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
#$obj->alert("delete from ".$tbl_name." where ".$code);
#@mysql_query($sql)or die(http(0235));
//@mysql_query("select * from tbl_workplan where workplan_id='$code'")
if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_AdoptionRates":
$obj->call('xajax_ViewAdoptionRates','','','','','','','','','','',1,20);
break;
default:
$obj->redirect('home.php');
}


}else{

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}
 

return $obj;

}

function delete_AnnualTargets($year,$semi_annual,$zone,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
#$obj->alert("ook");
if($zone==0){
$obj->alert("Please Select a Region and Try again!");
return $obj;
}

if(count($year)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else
 	$sql="delete from ".$tbl_name." where curr_year='".$year."' && semi_annual='".$semi_annual."' && region='".$zone."'";
	$del=@mysql_query($sql)or die(http("Delete-410"));

if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_AnnualTargets":
$obj->call('xajax_ViewAnnualTargets','','','','','','','','','','',1,20);
break;
default:
$obj->redirect('home.php');
}


}else{

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}
 

return $obj;

}

function delete_CarpFieldDaysandDemonstrations($year,$semi_annual,$zone,$district,$fielddayIndicator,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert("ook");
//$obj->alert(count($code));


if(count($year)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else

 $sql="delete from ".$tbl_name." where year='".$year."' && semi_annual='".$semi_annual."' && zone='".$zone."' && district='".$district."' ";
$del=@mysql_query($sql)or die(http("Delete-410"));
//$sql="delete from ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
#$obj->alert($sql);
#@mysql_query($sql)or die(http(0235));
//@mysql_query("select * from tbl_workplan where workplan_id='$code'")
if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_ViewFieldDaysandDemonstrations":
$obj->call('xajax_ViewFieldDaysandDemonstrations','','','','','','','','','','',1,20);
break;
default:
$obj->redirect('home.php');
}


}else{

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}
 

return $obj;

}

function delete_TechnicalTraining($year,$semi_annual,$zone,$district,$typeofparticipants,$training_topic,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert("ook");
//$obj->alert(count($code));


if(count($year)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else
# && training_topic='".$training_topic."'
 $sql="delete from ".$tbl_name." where year='".$year."' && semi_annual='".$semi_annual."' && zone='".$zone."' && district='".$district."' && typeofparticipants='".$typeofparticipants."' ";
$del=@mysql_query($sql)or die(http("Delete-410"));
//$sql="delete from ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
#$obj->alert($sql);
#@mysql_query($sql)or die(http(0235));
//@mysql_query("select * from tbl_workplan where workplan_id='$code'")
if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_ViewCFTechnicalTrainingActivities":
$obj->call('xajax_ViewCFTechnicalTrainingActivities','','','','','','','','','','',1,20);
break;
default:
$obj->redirect('home.php');
}


}else{

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}
 

return $obj;

}

function delete_OtherTechnicalTraining($year,$semi_annual,$zone,$district,$typeofparticipants,$training_topic,$tbl_name,$component){
$obj=new xajaxResponse();
if($_SESSION['role']<>pagination::rolemgt(0)){
$obj->alert("Only M&E Officer Can Delete a record. Please try again!");
return $obj;
}  
//$obj->alert("ook");
//$obj->alert(count($code));


if(count($year)==0){
$obj->alert("Please Select items For Deletion and Try again!");
return $obj;
}
else
# && typeofparticipants='".$typeofparticipants."' && training_topic='".$training_topic."'
 $sql="delete from ".$tbl_name." where year='".$year."' && semi_annual='".$semi_annual."' && zone='".$zone."' && district='".$district."'  ";
$del=@mysql_query($sql)or die(http("Delete-410"));
//$sql="delete from ".$tbl_name." set display='No' where ".$unique_column."='".$code."'";
#$obj->alert($sql);
#@mysql_query($sql)or die(http(0235));
//@mysql_query("select * from tbl_workplan where workplan_id='$code'")
if($del){
$obj->alert("Records Deleted! ");
$obj->addEvent('','onsubmit',audit_trail($unique_column,$code,$sql,$tbl_name,$changed_from='Deleted',$changed_to='Deleted'));



switch($component){
case "delete_OtherTechnicalTraining":
$obj->call('xajax_ViewOtherTrainingActivities','','','','','','','','','','',1,20);
break;
default:
$obj->redirect('home.php');
}


}else{

$obj->alert("Could Not Delete Record, Please Try again.");
return $obj;

}
 

return $obj;

}
//delete pmp extrapolation
function delete_extrapolation($formValues){

    $obj=new xajaxResponse();
    $QMobj=new QueryManager();
    $n=1;

    if(count($formValues['loopkey'])>0){
        for($x=0;$x<count($formValues['pk_id']);$x++){

            $sql="UPDATE `tbl_pmpextrapolation`
            SET `display` = 'No',
            `updatedby` = '".$_SESSION['user_id']."'
            WHERE `pk_id` = '".$formValues['pk_id'][$x]."'";

            if($sql<>''){
                $action = "Deleted the PMP EXTRAPOLATION FACTOR.";
                $description=mysql_real_escape_string($sql);
                $user=$_SESSION['username'];
                $oldValue='';
                $newValue='';
                $table='';
                $id='';
                $QMobj::logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                $query=@mysql_query($sql)or die(http(1420));
            }



        }
    }

    $obj->assign('bodyDisplay','innerHTML',errorMsg("Record has been deleted!"));
    $obj->call('xajax_view_extrapolation',1,20);
    return $obj;
}
//end of delete pmp extrapolation



?>