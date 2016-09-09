<?php
/* start of delete_user */
function delete_user($formValues){
$obj=new xajaxResponse();


if(count($formValues['user_id'])>0){
for($x=0;$x<count($formValues['user_id']);$x++){
	
$sql="update `tbl_user` set display='No', status='deactivated'  where `user_id` ='".$formValues['user_id'][$x]."'";

if($sql<>''){

$action = "Deleted User(s) with id->".$formValues['user_id'][$x]." .";  // returns "abcde"
$description=retrieve_info_withSpecialCharactersNowordLimit($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

@mysql_query($stmnt)or die(QueryManager::http("DEL-18"));	
@mysql_query($sql)or die(http(19));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("User successfully Deactivated!"));
$obj->call("xajax_view_users",'','','','',1,20);
return $obj;
}
/* end of delete_user */



function delete_usergroup($formValues){
$obj=new xajaxResponse();


if(count($formValues['group_id'])>0){
for($x=0;$x<count($formValues['group_id']);$x++){
	
$sql="update `tbl_usergroup` set display='No' where `group_id` ='".$formValues['group_id'][$x]."'";

if($sql<>''){

$action = "Deleted Usergroup(s) with id->".$formValues['group_id'][$x]." .";  // returns "abcde"
$description=retrieve_info_withSpecialCharactersNowordLimit($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

@mysql_query($stmnt)or die(QueryManager::http(__line__));	
@mysql_query($sql)or die(http(__line__));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("User role successfully Deactivated!"));
$obj->call("xajax_view_usergroup",'');
return $obj;
}//-----------------------------------------------------------End of function delete_usergroup-----------------------------------------




function delete_submenuItem($formValues){
$obj=new xajaxResponse();


if(count($formValues['tbl_menu_itemsId'])>0){
for($x=0;$x<count($formValues['tbl_menu_itemsId']);$x++){
	
$sql="update `tbl_menu_items` set display='No' where `tbl_menu_itemsId` ='".$formValues['tbl_menu_itemsId'][$x]."'";
/* $obj->alert($sql); */
if($sql<>''){

$action = "Deleted Submenu Item(s) with id->".$formValues['group_id'][$x]." .";  
$description=retrieve_info_withSpecialCharactersNowordLimit($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

@mysql_query($stmnt)or die(QueryManager::http(__line__));	
@mysql_query($sql)or die(http(__line__));
}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Sub-Menu Item successfully Deleted!"));
$obj->call('view_menu_items','','');
return $obj;
}//-----------------------------------------------------------End of function delete_submenuItem-----------------------------------------

function delete_menuItem($formValues){
$obj=new xajaxResponse();

$affectedTable="tbl_menu_categories";
$PK="tbl_menu_categoriesId";

if(count($formValues['tbl_menu_categoriesId'])>0){
for($x=0;$x<count($formValues['tbl_menu_categoriesId']);$x++){
	
$sql="update ".$affectedTable." set display='No' where ".$PK." ='".$formValues['tbl_menu_categoriesId'][$x]."'";

if($sql<>''){
//log user Action
$action = "Deleted a Menu Category from Table-> ".$affectedTable." with  tbl_menu_categoriesId(PK) ->".$formValues['tbl_menu_categoriesId'][$x]." .";  
$description=mysql_real_escape_string($sql);
$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";

@mysql_query($stmnt)or die(http(__line__));	
@mysql_query($sql)or die(http(__line__));

//delete  Submenu Items too
$delMenuItemsStmnt="UPDATE `tbl_menu_items` 
SET `display`='No'
WHERE `MenuCategory` = '".$formValues['tbl_menu_categoriesId'][$x]."'";		
$query=@Execute($delMenuItemsStmnt) or die(http(__line__));	

}
}
}

$obj->assign('bodyDisplay','innerHTML',noteMsg("Menu Category successfully Deleted!"));
$obj->call('xajax_view_menu_category');
return $obj;
}//-----------------------------------------------------------End of function delete_menuItem-----------------------------------------

