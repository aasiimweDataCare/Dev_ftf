<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
//require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
//xajax->registerExternalFunction('function','file.php'); 
//$xajax->register(XAJAX_FUNCTION, new xajaxUserFunction('delete_data', 'home.php'));
$xajax->register(XAJAX_FUNCTION,'delete_data');
//------------Program Managers-------------

$xajax->register(XAJAX_FUNCTION,'view_Staff');
$xajax->register(XAJAX_FUNCTION,'save_staff');
$xajax->register(XAJAX_FUNCTION,'view_countries');
$xajax->register(XAJAX_FUNCTION,'edit_staff');
$xajax->register(XAJAX_FUNCTION,'update_staff');

//------------------------
//------------dropdown list-------------
$xajax->register(XAJAX_FUNCTION,'new_dropdownList');
$xajax->register(XAJAX_FUNCTION,'view_dropdownList');
$xajax->register(XAJAX_FUNCTION,'save_dropdownList');
$xajax->register(XAJAX_FUNCTION,'edit_dropdownList');
$xajax->register(XAJAX_FUNCTION,'update_dropdownlist');
//$xajax->register(XAJAX_FUNCTION,'update_dropdownList');
//------------------------

$xajax->register(XAJAX_FUNCTION,'zonalMapping');
$xajax->register(XAJAX_FUNCTION,'saveZonalMapping');
$xajax->register(XAJAX_FUNCTION,'view_zonalMapping');
$xajax->register(XAJAX_FUNCTION,'edit_zonalMapping');
$xajax->register(XAJAX_FUNCTION,'UpdateZonalMapping');
$xajax->register(XAJAX_FUNCTION,'delete_zone');
$xajax->register(XAJAX_FUNCTION,'save_home');
$xajax->register(XAJAX_FUNCTION,'home');
$xajax->register(XAJAX_FUNCTION,'view_home');
$xajax->register(XAJAX_FUNCTION,'delete_home');
$xajax->register(XAJAX_FUNCTION,'edit_home');
$xajax->register(XAJAX_FUNCTION,'update_home');
#--------------USER GROUP----------------
$xajax->register(XAJAX_FUNCTION,'save_usergroup');
$xajax->register(XAJAX_FUNCTION,'view_usergroup');
$xajax->register(XAJAX_FUNCTION,'new_usergroup');
$xajax->register(XAJAX_FUNCTION,'edit_usergroup');
$xajax->register(XAJAX_FUNCTION,'update_usergroup');
$xajax->register(XAJAX_FUNCTION,'delete_usergroup');


#-------------USERS---------------------
$xajax->register(XAJAX_FUNCTION,'new_user');
$xajax->register(XAJAX_FUNCTION,'add_user');
$xajax->register(XAJAX_FUNCTION,'view_users');
$xajax->register(XAJAX_FUNCTION,'search_users');
$xajax->register(XAJAX_FUNCTION,'edit_users');
$xajax->register(XAJAX_FUNCTION,'update_users');
$xajax->register(XAJAX_FUNCTION,'updateusers2');
$xajax->register(XAJAX_FUNCTION,'delete_user');

//---------------user Permissions-------------------
$xajax->register(XAJAX_FUNCTION,'UserPermissions');
$xajax->register(XAJAX_FUNCTION,'SavePermissions');


#----------------BACKUP----------------
$xajax->register(XAJAX_FUNCTION,'system_backup');
$xajax->register(XAJAX_FUNCTION,'systemBackup');
#------------------SYSTEM LOGINS----------
$xajax->register(XAJAX_FUNCTION,'view_login');
$xajax->register(XAJAX_FUNCTION,'kill_session');
$xajax->register(XAJAX_FUNCTION,'kill_user');
$xajax->register(XAJAX_FUNCTION,'search_systemLogin');
#-------------RELATED LINKS-----------------
$xajax->register(XAJAX_FUNCTION,'new_relatedLink');
$xajax->register(XAJAX_FUNCTION,'view_relatedLink');
$xajax->register(XAJAX_FUNCTION,'save_relatedLink');

$xajax->register(XAJAX_FUNCTION,'view_relatedLinkAdmin');

$xajax->register(XAJAX_FUNCTION,'edit_relatedLink');
$xajax->register(XAJAX_FUNCTION,'delete_relatedlink');
#-------------DOCUMENTS-----------------
$xajax->register(XAJAX_FUNCTION,'new_document');
$xajax->register(XAJAX_FUNCTION,'view_document_admin');
$xajax->register(XAJAX_FUNCTION,'view_documents');
$xajax->register(XAJAX_FUNCTION,'edit_document');
$xajax->register(XAJAX_FUNCTION,'delete_document');
#----------------CHANGE PASSWORD----------------
$xajax->register(XAJAX_FUNCTION,'change_password');
$xajax->register(XAJAX_FUNCTION,'updatePassword');
#-----------------REPORTING PERIOD---------------
$xajax->register(XAJAX_FUNCTION,'close_reporting');
$xajax->register(XAJAX_FUNCTION,'save_reporting');
$xajax->register(XAJAX_FUNCTION,'open_reporting');
#------------SEND MAIL--------------------
$xajax->register(XAJAX_FUNCTION,'sendmail');
$xajax->register(XAJAX_FUNCTION,'mail2');
#------------user comments---------------
$xajax->register(XAJAX_FUNCTION,'view_comments');
$xajax->register(XAJAX_FUNCTION,'save_comment');
$xajax->register(XAJAX_FUNCTION,'new_comment');
$xajax->register(XAJAX_FUNCTION,'clearUserComment');
$xajax->register(XAJAX_FUNCTION,'sort_userComment');
#----------------FAQS--------------------
$xajax->register(XAJAX_FUNCTION,'faqs');
$xajax->register(XAJAX_FUNCTION,'view_faqs');
$xajax->register(XAJAX_FUNCTION,'save_faqs');
$xajax->register(XAJAX_FUNCTION,'answer');
$xajax->register(XAJAX_FUNCTION,'view_all');
$xajax->register(XAJAX_FUNCTION,'view_questions');
$xajax->register(XAJAX_FUNCTION,'edit_faqs');
$xajax->register(XAJAX_FUNCTION,'update_faqs');
$xajax->register(XAJAX_FUNCTION,'view_allfaqs');




#---------------view~_district----------------
$xajax->register(XAJAX_FUNCTION,'new_district');
$xajax->register(XAJAX_FUNCTION,'save_district');
$xajax->register(XAJAX_FUNCTION,'view_district');
$xajax->register(XAJAX_FUNCTION,'edit_district');
$xajax->register(XAJAX_FUNCTION,'update_district');
$xajax->register(XAJAX_FUNCTION,'updatedistrict2');
$xajax->register(XAJAX_FUNCTION,'delete_district');
$xajax->register(XAJAX_FUNCTION,'delete_subcounty');
$xajax->register(XAJAX_FUNCTION,'delete_parish');
$xajax->register(XAJAX_FUNCTION,'view_subcounty');
$xajax->register(XAJAX_FUNCTION,'view_parish');
$xajax->register(XAJAX_FUNCTION,'view_allSubcounties');
$xajax->register(XAJAX_FUNCTION,'view_allParish');
/*$xajax->register(XAJAX_FUNCTION,'new_parish');
$xajax->register(XAJAX_FUNCTION,'save_parish'); */


$xajax->register(XAJAX_FUNCTION,'SystemLog');
#--------------------municipality---------------------------
$xajax->register(XAJAX_FUNCTION,'view_municipality');
$xajax->register(XAJAX_FUNCTION,'add_municipality');
$xajax->register(XAJAX_FUNCTION,'save_municipality');
$xajax->register(XAJAX_FUNCTION,'edit_municipality');
$xajax->register(XAJAX_FUNCTION,'update_municipality');
$xajax->register(XAJAX_FUNCTION,'delete_municipality');

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'new_organization');
$xajax->register(XAJAX_FUNCTION,'view_organization');
$xajax->register(XAJAX_FUNCTION,'save_organization');
$xajax->register(XAJAX_FUNCTION,'edit_organization');
$xajax->register(XAJAX_FUNCTION,'update_organization');
$xajax->register(XAJAX_FUNCTION,'updateOrganization');
$xajax->register(XAJAX_FUNCTION,'delete_organization');
$xajax->register(XAJAX_FUNCTION,'search_org');
$xajax->register(XAJAX_FUNCTION,'view_allorganizations');

#-------------------view roles----------------
$xajax->register(XAJAX_FUNCTION,'view_role');
$xajax->register(XAJAX_FUNCTION,'new_role');
$xajax->register(XAJAX_FUNCTION,'save_role');
$xajax->register(XAJAX_FUNCTION,'edit_role');
$xajax->register(XAJAX_FUNCTION,'update_role');
$xajax->register(XAJAX_FUNCTION,'add_staff');
$xajax->register(XAJAX_FUNCTION,'save_staff');
$xajax->register(XAJAX_FUNCTION,'view_staffMembers');

//-----------role----------------------------


#---------------menu--------------------------------

$xajax->register(XAJAX_FUNCTION,'edit_menu_category');
$xajax->register(XAJAX_FUNCTION,'update_menu_category');
$xajax->register(XAJAX_FUNCTION,'save_menu_Category');
$xajax->register(XAJAX_FUNCTION,'view_menu_category');
$xajax->register(XAJAX_FUNCTION,'new_menu_Category');
$xajax->register(XAJAX_FUNCTION,'delete_menuItem');

$xajax->register(XAJAX_FUNCTION,'view_menu_items');
$xajax->register(XAJAX_FUNCTION,'delete_submenuItem');
$xajax->register(XAJAX_FUNCTION,'new_menu_items');
$xajax->register(XAJAX_FUNCTION,'save_menu_items');
$xajax->register(XAJAX_FUNCTION,'edit_menu_items');
$xajax->register(XAJAX_FUNCTION,'update_menu_items');
#---------------control Panel ----------------------
$xajax->register(XAJAX_FUNCTION,'changeTheme');
$xajax->register(XAJAX_FUNCTION,'saveTheme');
$xajax->register(XAJAX_FUNCTION,'view_program_managers');
#-----------------REPORTING PERIOD---------------
$xajax->register(XAJAX_FUNCTION,'close_workplan');
$xajax->register(XAJAX_FUNCTION,'save_workplan_setup');
$xajax->register(XAJAX_FUNCTION,'open_workplan_setup');
$xajax->register(XAJAX_FUNCTION,'send_userCredentialsMail');
//---------Deletions------------------------------


#-------------END-----------------------------
//------------includes-------------------------
require_once('permission_save.php');
require_once('permission_edit.php');
require_once('permission_deleteNew.php');
require_once('permission_filters.php');
//require_once("wysiwyg/cuteeditor_files/include_CuteEditor.php") ;
//require_once('functions.php');
#---------------------------------------------------
#view_usergroup
#new_usergroup
#---------------------------------------------------
function view_program_managers($orgname,$orgtype,$countryName,$cur_page=1,$records_per_page=20){
$feedback = new xajaxResponse();
if($_SESSION['user_id']==''){
$feedback->redirect('index.php');
return $obj;
} 
$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['countryName']=$countryName;

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>
";


$data.="<table cellspacing='1'  id='report'     width='100%' border='0'> ".filter_organization()." 
<tr class='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'id='button' TITLE='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'Delete_organization','');return false;\" value='Deactivate' class='formButtonRed' /></td>
    
	 <td></td>
<td></td>

   

  </tr>
	  <tr>
        <th colspan='9' ><div align='center' class=''>ORGANIZATION/INSTITUTION DETAILS </div></th>
        </tr>
      
      <tr>
	  <th class=''>select</th>
	  <th width='' ><strong class=''>ORGANIZATION NAME</strong></th>
        <th width='' ><strong class=''>ACRONYM</strong></th>
        <th width='' '><strong class=''>COUNTRY</strong></th>
	
		<th width=''><strong class=''>ORG. TYPE</strong></th>
		<th ><strong class=''>CONTACT PERSON</strong></th>
		<th ><strong class=''>GENDER</strong></th>
		<th  width=''><strong class=''>TELEPHONE</strong></th>
		<th  width=''><strong class=''>EMAIL</strong></th>
		<th  width=''><span align='right'>ACTION</span></th>

      </tr>";
/* $query_string="select * from view_organization where lower(orgName) like '".strtolower($orgname)."%'&& lower(organization_type) like '".strtolower($orgtype)."%'&& lower(district) like '".strtolower($district)."%' group by orgName order by orgName Asc"; */
$query_string="select o.org_code,o.orgName,o.acronym,o.registered,o.contact_person,o.telephone,o.orgtype,o.email_address,z.countryName from tbl_organization o left join tbl_country z on(o.country_id=z.countryCode) where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%' && lower(countryName) like '".strtolower($_SESSION['countryName'])."%' and o.display like 'Yes%'   order by orgName Asc";
$query_=mysql_query($query_string)or die(http(2614));

$max_records = mysql_num_rows($query_)or die(http(2616));
	
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1278));  



	  while($row=FetchRecords($new_query)){
	 // $color=$n%2==1?"#e7d58f":"#ffffff";
	 //$feedback->ainclert($row[21]);
	 $div2="view_projectDetails_".$row['org_code'];
	 $telno=($row['telephone']!='')?"<td>".$row['telephone']."</td>":"<td></td>";
	  $color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#A9753A';\" >

	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' />".$inc."</td>
	 <td>".mysql_real_escape_string($row['orgName'])."</td>
	 <td>".$row['acronym']."</a></td>
	 <td>".$row['countryName']."</td>
	<TD>".$row['orgtype']."</TD>
	 <td >".$row['contact_person']."</td>

	  ".$telno;
	  $data.="<td>".$row['email_address']."</td>  <td ALIGN='RIGHT'><input name='' type='button' class='formButton2'id='button' value='Details' onclick=\"xajax_view_allorganizations('".$row['org_code']."','".$div2."');\" /></td></tr>
	  <tr >
<td colspan='7'><div id='$div2'></div></a></td>
	</tr>
	  
	  ";
	  $inc++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'id='button' TITLE='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'Delete_organization','');return false;\" value='Deactivate' class='formButtonRed'  /></td>
   </td><td colspan=4 align='right'>";
	
   
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$cur_page."',this.value)\">";


	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"selectED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";

	

   

  $data.="</td></tr></table></form>";
$feedback->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $feedback;
 }
function view_documents($document){
$obj = new  xajaxResponse();
$utilities=new pagination();
$data.="<form name='documents'  method='post' id='documents'><table cellspacing='0' id='rounded_table'     width='600' border='0' cellspacing='0'>";
if(($_SESSION['UserGroup']=='Managers')||($_SESSION['UserGroup']=='Administrators')){
$data.="<tr class='evenrow'><td colspan='4' align='right'><input type='button' value='New Entry' onclick=\"xajax_new_document()\" class='formButton2'> | <input type='button' class='formButton2' value='Export to Excel'> | <input type='button' class='formButton2' value='Print version'> </td></tr>";
} 
else {
$data.="<tr class='evenrow'><td colspan='4'> <input type='button' class='formButton2' value='Export to Excel'> | <input type='button' value='Print version' class='formButton2'> </td></tr>";
}
 $data.="<tr>

<tr class='evenrow'><td colspan='4'>Document:<input name='document' id='document' type='text' size='80'> <input type='button' class='formButton2' value='Go' onclick=\"xajax_view_documents(getElementById('document').value);return false;\"> </td></tr>";
if(($_SESSION['UserGroup']=='Managers')||($_SESSION['UserGroup']=='Administrators')){
$data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('document'),'delete_document','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr>";
}else {

$data.="";
}
 $data.="<tr>
                   
                    <th colspan='5'><center>Document Repository</center></th>
					 
                  </tr>
                  <tr class='evenrow2'>
                    <th width='50' class=''>No.</th>
                    <th class=''>Document Name</th>
					  <th class=''>File Name</th>";
					  if(($_SESSION['UserGroup']=='Managers')||($_SESSION['UserGroup']=='Administrators')){
					 $data.="<th>Action</th>";
					 }else {
					 
					 $data.="<th></th>";
					 }
					  
                  $data.="</tr>";
				  $n=1;
				  $inc=1;
				  $SQL=@mysql_query("select * from tbl_documents where document_name like '%".$document."%'  order by document_id asc")or die(mysql_error());
				  while($row=@mysql_fetch_array($SQL)){
		
                  $data.=Backgroundstyle($n)."
                    <td width='50'><input type='checkbox' name='documnent_id' id='document_id' value='".$row['documnent_id']."' >".$n++."</td>
                    <td>".$row['document_name']."</td>
					<td><a href='download.php?directory=docs/$row[file_name]' class='greenlinks' target=_blank>Download</a></td>";
					if(($_SESSION['UserGroup']=='Managers')||($_SESSION['UserGroup']=='Administrators')){
					 $data.="<td><div style='float:left;'><input type='button' class='formButton2'   id='button' TITLE='Edit'
					   onclick=\"xajax_edit_document('".$row['document_id']."');return false;\" value='edit' /> </td>";
					 }else {
					 
					 $data.="<td></td>";
					 }
                  $data.="</tr>";
				  $inc++;
				  
				  }
				  if(($_SESSION['UserGroup']=='Managers')||($_SESSION['UserGroup']=='Administrators')){
$data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('document'),'delete_document','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr>";
}else {

$data.="";
}
                  $data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;


}
function changeTheme(){
 $obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}
 $data="<form name='reporting' id='reporting' method='post' action='".$PHP_SELF."'>
 
<table cellspacing='0'      width='700' border='0' align=left>
  <tr>
    <th scope='col'>Current Active Theme</th>
    <th scope='col'><span style='font-weight:bold;'>Default</span></th>
  </tr>
  
 
 
  <tr>
    <td>New Theme</td>
    <td><select name='active_quarter' style='width:200px' id='active_quarter'><option value=''>-select-</option>
      ";
         $query=mysql_query("select * from tbl_themes order by theme_name asc")or die("HTTP ERROR-CODE 00066 because, ".mysql_error());
		 while($row=FetchRecords($query)){
		 $data.="
      <option value='".$row['theme_id']."'>".$row['theme_name']."</option>
      ";
	  
		 }
          $data.="
      
    </select>
    </td>
  </tr>
 "; 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><input type='button' class='formButton2'value='Save' name='saveReportPeriod' onclick=\"xajax_saveTheme(xajax.getFormValues('reporting'));\"  class='button_width' /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>"; 

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function close_reporting(){
 $obj=new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}
 $data="<form name='reporting' id='reporting' method='post' action='".$PHP_SELF."'>
 
<table cellspacing='0'      width='700' border='0' align=left>
  <tr>
    <th scope='col'>Current Active Quarter</th>
    <th scope='col'><span style='font-weight:bold;'>".$_SESSION['quarter']."</span></th>
  </tr>
  
  <tr>
    <td>Date of Closing Data Entry </td>
    <td><span style='font-weight:bold;'>
      <select name='openentry' style='width:200px'>
        ";
		$query=mysql_query("select * from tbl_active where status like 'Open%'")or die("HTTP error-code".mysql_error());
		while($row=FetchRecords($query)){
		$data.="
        <option value='".$row['doentry']."'>".$row['doentry']."</option>
        ";
		
		}
		$data.="
      </select>
    </span></td>
  </tr>
  <tr>
    <td>Change Active Year</td>
    <td><select name='aPeriod' id='aPeriod' style='width:200px'><option value=''>-select-</option>";
	
     $yr = date('Y'); $end=$yr;
		do{
	$data.="<option value=\"".$end."\" >".$end."</option>
      ";
				 $end--;
				} while($end>=2009);
                $data.="<option value='Closed'>Close Reporting </option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Change Active Quarter</td>
    <td><select name='active_quarter' style='width:200px' id='active_quarter'><option value=''>-select-</option>
      ";
         $query=mysql_query("select * from tbl_quarters order by quarterCode asc")or die("HTTP ERROR-CODE 00066 because, ".mysql_error());
		 while($row=FetchRecords($query)){
		 $data.="
      <option value='".$row['quarterName']."'>".$row['quarterName']."</option>
      ";
	  
		 }
          $data.="
      <option value='Closed'>Close Reporting </option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Change Date of Closing Data Entry:</td>
    <td><a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.reporting.chdate);return false;' hidefocus=''>
      <input name='chdate' type='text'  size='27' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
  </tr>"; 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><input type='button' class='formButton2'value='Save' name='saveReportPeriod' onclick=\"xajax_save_reporting(xajax.getFormValues('reporting'));\"  class='button_width' /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>"; 

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function save_reporting($formvalues){
 $obj=new xajaxResponse();

$aPeriod=$formvalues['aPeriod'];
$openentry=$formvalues['openentry'];
$quarter=$formvalues['active_quarter'];
#$obj->alert($quarter);
$chdate=$formvalues['chdate'];
#$obj->alert($chdate);
$user=$_SESSION['username'];
if($quarter=='Close Reporting'&& $aPeriod=='Close Reporting'){
mysql_query("update tbl_active set status='Closed',quarter='Closed',year='Closed' where status like 'Open%' and  quarter like '".$_SESSION['quarter']."%'")or die("HTTP Error-code 00129 because,".mysql_error());
}
else
{

mysql_query("update tbl_active set status='Closed',quarter='Closed',year='Closed' where status like 'Open%'")or die("HTTP Error-code 00129 because,".mysql_error());


}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Reporting Period Closed!"));
 $obj->call('xajax_open_reporting',$user,$aPeriod,$quarter,$chdate);
return $obj;
}
function open_reporting($user,$aPeriod,$quarter,$chdate){
  $obj=new xajaxResponse();
 $x="insert into tbl_active(uname,year,quarter,doentry) values('".$user."','".$aPeriod."','".$quarter."','".$chdate."')";
mysql_query($x)or die("HTTP Error-code 00129 because,".mysql_error());
#$obj->alert($x);
  $obj->assign('bodyDisplay','innerHTML',congMsg("New Reporting Period Opened\n Please Login to start Reporting"));
  $obj->redirect('logout.php');
return $obj;
 }
function home(){
 $obj=new xajaxResponse();

	$data.="<iframe name='body' id='body' width='700' height='400' frameBorder='0' scroll='No' src='z_home.php'></iframe>";
	
	
	$data.="";
	
	$data.=""; 
 $obj->assign('bodyDisplay','innerHTML',$data);
 $obj->call("hideLoadingDiv");
return $obj;
 }
function view_home($head){
$obj=new xajaxResponse();
$_SESSION['head']=$head;
$data="<form name='home1' id='home1' action='".$PHP_SELF."'>

<table cellspacing='0'      width='100%' border='0'  >
<tr class='evenrow'>
    
    
    <td scope='col'>Title</td><td scope='col' colspan=2><select name='heading' id='heading' onChange=\"xajax_view_home(getElementById('heading').value)\"><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_home where head <> '' order by home_id asc ")or die(mysql_error());
	while($rowh=FetchRecords($query)){
	$sel=($rowh['head']==$_SESSION['head'])?"selectED":"";
	$data.="<option value='".$rowh['head']."' '".$sel."'>".substr($rowh['head'],0,40)."</option>";
	}
	$data.="</select></td>
    <td scope='col' colspan=2><div style='float:right;'><input name='' type='button' class='formButton2'value='New Entry' onclick=\"xajax_home()\" /> | <a href='export_to_excel_word.php?linkvar=Export Home&&head=".$_SESSION['head']."&&format=excel'><input name='' type='button' class='formButton2'value='Export to Excel' /></a></td>
   
   
  </tr>
  <tr class='evenrow'>
     
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'value='Edit'   TITLE='Edit'onclick=\"xajax_edit_home(xajax.getFormValues('home1'));return false;\"  />| <input type='button' class='formButton2'value='Delete' class='redhdrs' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('home1'),'Delete_home','');return false;\"  /></td>
    
  </tr>
  <tr>
    <th scope='col' colspan=2>NO</th>
    
    <th scope='col'>Title</th>
    <th scope='col'>Body</th>
   
  </tr>";
  $n=1; $inc=1;
  $xx="select * from tbl_home where head like '%".$_SESSION['head']."%'  order by home_id asc ";
  #$obj->alert($xx);
   $query=mysql_query($xx)or die(mysql_error());
  while($row=FetchRecords($query)){
   $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
    
    <td><input name='home_id[]' type='checkbox' value='".$row['home_id']."' /></td><td>".$n++."</td>
      <td>$row[head]</td>
	  <td>$row[body]</td>

  </tr>";
  $inc++;}
  $data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'value='Edit'   TITLE='Edit'onclick=\"xajax_edit_home(xajax.getFormValues('home1'));return false;\"  />| <input type='button' class='formButton2'value='Delete' class='redhdrs' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('home1'),'Delete_home','');return false;\"  /></td>
    
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_usergroup($usergroup){
$obj=new xajaxResponse();
$_SESSION['usergroup']='';
$_SESSION['usergroup']=$usergroup;
$data="<form action='".$PHP_SELF."' method='post' name='usergroup11' id='usergroup11'>
<table cellspacing='0'      width='600' class='border' border='0'>".filter_userGroup()."</table>
<table cellspacing='1'      width='600' border='0'  >
<tr class='evenrow'>
     
    <td colspan=5>
	<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
	<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	<input type='button' class='formButton2'TITLE='Edit' onclick=\"xajax_edit_usergroup(xajax.getFormValues('usergroup11'));return false;\" value='edit' />|
	<input type='button' class='formButton2'TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('usergroup11'),'Delete_usersGroup');return false;\" value='Deactivate' class='redhdrs' />
	</td>
</tr>
  <tr>
    <th scope='col' colspan=2>NO</th>
    
    <th scope='col'>GROUP NAME</th>
    <th scope='col'>DESCRIPTION</th>
    <th scope='col'>ACTION</th>
  </tr>";
  $n=1; $inc=1;
   $query=mysql_query("select * from tbl_usergroup where group_name <> '' and group_name like '".$_SESSION['usergroup']."%' and display='Yes' order by group_name asc ")or die(mysql_error());
  while($row=FetchRecords($query)){
     $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class=$color>
    <td>
	<input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	<input name='group_id[]' id='group_id' type='checkbox' value='".$row['group_id']."' /></td><td>".$n++."</td>
    <td>$row[group_name]</td>
    <td>$row[description]</td>
    <td><input name='' type='hidden' class='formButton2'value='Manage Usergroup' /></td>
  </tr>";
  $inc++;}
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class='evenrow'>
     
    <td colspan=5>
	<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
	<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	<input type='button' class='formButton2'TITLE='Edit' onclick=\"xajax_edit_usergroup(xajax.getFormValues('usergroup11'));return false;\" value='edit' />|
	<input type='button' class='formButton2'TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('usergroup11'),'Delete_usersGroup');return false;\" value='Deactivate' class='redhdrs' />
	</td>
</tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function new_usergroup(){
$obj=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
<tr>
    <td colspan=5><div id='status'></div></td>
  </tr>
  <tr>
    <td >Group Name</td>
    <td><input name='groupname' type='text' id='groupname' size='48' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='desc' id='desc' cols='45' rows='5'></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_usergroup(xajax.getFormValues('usergroup'))\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#-------------------------------------
function view_users($name,$username,$usergroup,$role,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1; $inc=1;
$_SESSION['name1']='';
$_SESSION['user1']='';
$_SESSION['usergroup1']='';
$_SESSION['role1']='';
$_SESSION['name1']=$name;
$_SESSION['user1']=$username;
$_SESSION['usergroup1']=$usergroup;
$_SESSION['role1']=$role;
$data="<form name='users' id='users'   method='post' action='".$PHP_SELF."' ><table cellspacing='1'>".filter_users()."<tr class='evenrow'>
     
    <td colspan=9><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
    <input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
    <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_users(xajax.getFormValues('users'));return false;\" value='edit' />|";
    $data.="<input type='button' value='Deactivate' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('users'),'delete_users');return false;\" align='left'>
    </td>
    
    </tr>
  <tr>
    <th colspan='9'><div align='center'>User Details</div></th>
  </tr>
  
  <tr><th colspan=2 >NO</th>
  <th>NAME</th>
  <th>USERNAME</th>
  <th>usergroup</th>
  <th COLSPAN=''>ROLE</th>
  <th COLSPAN=''>EMAIL</th>
  <th COLSPAN=''>STATUS</th>
  <th COLSPAN=''>ACTION</th>
  </tr>";

#$query_string="select u.user_id,u.org_code,u.name,u.username,u.password,u.role,g.group_name from tbl_user u left join tbl_usergroup g on(g.group_id=u.usergroup) order by name";
	
	
$query_string="select u.user_id,u.org_code,u.name,u.username,u.password,u.role,r.role_name,u.EncryptionHint,
g.group_name,u.display,u.email,u.status,u.emailStatus,u.ResetConfirmed,u.passwordReset from tbl_user u 
left join tbl_usergroup g on(g.group_id=u.usergroup) 
left join tbl_role r on(u.role=r.role_id)
where lower(u.name) like '".strtolower($_SESSION['name1'])."%' 
&& lower(u.username) like '".strtolower($_SESSION['user1'])."%'
 && lower(u.role) like '".strtolower($_SESSION['role1'])."%'
  && lower(g.group_name) like '".strtolower($_SESSION['usergroup1'])."%' ";
  
   $query_string.="order by name";
	
	$select=mysql_query($query_string)or die(http(__line__));
	while($row=FetchRecords($select)){
	 $color=$n%2==1?"evenrow":"white1";
		$data.="<tr class=".$color.">
		<td><input type ='checkbox' name ='user_id[]' id='user_id' value='".$row['user_id']."'></td>
		<td>".$inc++."</td>
		<td >".$row['name']."</td>
		<td>".$row['username']."</td>
		<td>".$row['group_name']."</td>
		<td COLSPAN=''>".$row['role_name']."</td>
		<td COLSPAN=''>".$row['email']."</td>";
		$status=$row['status'];
		if($status<>'active'){
		$data.="<td COLSPAN=''><font color='red'><strong>".$status."</font></strong></td>";	
		}else{
		$data.="<td COLSPAN=''><font color='green'><strong>".$status."</font></strong></td>";		
		}
		


$emailing=($row['emailStatus']=='Not Sent')?"<input name='sendmail' type='button' value='Send Mail' class='redhdrs' onclick=\"xajax_send_userCredentialsMail('".$row['name']."','".$row['username']."','".$row['email']."','".$row['EncryptionHint']."');return false;\" />":"<input name='sendmail' type='button' value='&#x2714; Sent' disabled='disabled' class='green_field'  />";
		
		
		$data.="<td COLSPAN=''>".$emailing."</td>		</tr>";
$n++;		      
}			
		$data.="<tr><td colspan='7' align='right'>";
$data.="<tr class='evenrow'>
     
    <td colspan=9><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
    <input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
    <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_users(xajax.getFormValues('users'));return false;\" value='edit' />|";
    $data.="<input type='button' value='Deactivate' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('users'),'delete_users');return false;\" align='left'>
    </td>
    

<td COLSPAN='2'></td>

   

  </tr>
</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function send_userCredentialsMail($fname,$username,$emailAddress,$password){
$obj = new xajaxResponse();
$_SESSION['email']="";
//$obj->alert($password);

if(!is_valid_email($emailAddress)){
$obj->alert("Invalid Email Address Provided!");
return $obj;
}

$email ="mis@ftfcpm.com";
$subject="CPMA MIS Logon Credentials";
$s="!";
$e="?";
$message="<font style='font-family: Calibri,Candara,Segoe,Segoe UI,Optima,Arial,sans-serif;
	font-size: 14px;
	font-style: normal;
	font-variant: normal;
	font-weight: 500;
	line-height: 26.4px;'>";
$message.="Dear  <strong>".$fname."</strong>,<br/>
Greetings from CPMA MIS Team.Your Logon Credentials are:<br/>
username:<strong>".$username."</strong><br/>
Password:<strong>".substr($password,6,300)."</strong><br/><br/>";

$message.="Visit  http://mis.ftfcpm.com:9000 to log into the system.<br/>
Please address any queries and/or feedback to:<br/>
1.mis@ftfcpm.com<br/>
2.ckasabiti@ftfcpm.com<br/>

You are requested to change your password as soon as you log into the system.<br/><br/>

Yours Sincerely;<br/>
<strong>CPM MIS TEAM</strong><br/>
Feed the Future Uganda<br/>
Commodity Production and Marketing Activity<br/>
Implemented by: Chemonics International, Inc.<br/>
UAP Nakawa Business Park, Block C, 5th Floor<br/>
Plot 3-5 New Port Bell Road<br/>
P.O. Box 6907 Kampala, Uganda<br/>
Office phone: 0393 202 920<br/>
Mobile phone: 0776 666 383<br/></font>";



if(is_valid_email($email)){
   //$query=@mail("$emailAddress","Subject: $subject",$message, $headers);
   $query=@send_emailCPMServer($emailAddress,$subject,$message, $headers="mis@ftfcpm.com");
   if($query)
   @mysql_query("update  tbl_user set emailStatus='Sent' where username='".$username."'") or die(http(__line__));
    $obj->call("xajax_view_users",'','','','',1,20);
  	return $obj;
  				}
  else {
   $obj->alert("Invalid Email Address!");
  
  }


return $obj;
} 
#********************
#edit user.

#********************
function new_user(){
$obj=new xajaxResponse();
$data="<form name='user' id='user' method='post' action='".$PHP_SELF."' onSubmit=\"validateForm(this.form)\">
	
		  
		    <table cellspacing='0'      width='100%' border='0' align='left'>
              <tr>
                <td colspan='4' valign='top'>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='4' valign='top'><div id='status'></div></td>
              </tr>
              <tr>
                <td width='162'><div align=''>Firstname</div></td>
                <td width='3'><label> <span style='color:#ff0000;'>* </span></td><td>
                      <input name='fname' type='text'  size='70' id='fname' />
              </td>
				<td></td>
              </tr>
              <tr>
                <td><div align=''>Lastname</div></td>
                <td> <span style='color:#ff0000;'>*</td><td>
                      <input name='lname' type='text'  id='lname' size='70'/>
                </span></td>
				<td></td>
              </tr>
			  <tr>
                <td><div align=''>User Group:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;' >*</td><td> 
                    <select name='usergroup' id='usergroup' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_usergroup group by group_name order by group_name asc")or die(mysql_error());
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['group_id']."'>".$row['group_name']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			   <tr>
                <td><div align=''>Role</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='role' id='role' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_role  group by role_name order by role_name asc")or die(mysql_error());
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['role_id']."'>".$row['role_name']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>";
			  $data.="<tr>
                <td><div align=''>Organization:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='organization' id='organization' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_organization group by orgName order by orgName asc")or die(mysql_error());
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>";
			   $data.="<tr>
                <td><div align=''>Country:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='country' id='country' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_country group by countryName order by countryName asc")or die(mysql_error());
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['countryCode']."'>".$row['countryName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>District/Province</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* </td><td>
                    <select name='district' id='district' style='width:376px;'><option value=''>-select-</option>";
                    $select=mysql_query("select * from tbl_district group by districtName order by districtName asc")or die(mysql_error());
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['districtCode']."'>".$row['districtName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>";

             
			  $data.="<tr>
                <td><div align=''>Username</div></td>
                <td colspan='' width='2'><label></label>
                    <span style='color:#ff0000;'>* </span></td><td colspan=2>
                    <input type='text' size='70' name='username' id='username' />
					<em>[hint]</em>  <b>firstname.second Name</b></td>
              </tr>
              <tr>
                <td><div align=''>Desired Password</div></td>
                <td><span style='color:#ff0000;'>* </span></td><td>
                    <input name='password' type='password'  id='password' size='70' /></td>
					<td></td>
              </tr>
              <tr>
                <td width='162'>confirm password</td>
                <td><span style='color:#ff0000;'>* </span></td><td>
                    <input type='password' size='70' name='cpass' id ='cpass' /></td>
					<td></td>
              </tr>
			  <tr>
                <td width='162'>Email:</td>
                <td><span style='color:#ff0000;'>* </span></td><td>
                    <input type='text' size='70' name='email' id ='email' /></td>
					<td></td>
              </tr>
              <tr>
        <td>Verification Code </td><td></td>
		
            <td class='evenrow' background='images/pub.jpg'>";
			$code = generateCode(6);
              $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
              <input type='hidden' name='code'  size='70' id='code' value='".$code."' /></td><td style='padding: 10px 7px 7px;' <a tabindex='6' href=\"javascript:Recaptcha.reload();\" title='Get two new words' id='recaptcha_reload_btn'><img src='http://www.google.com/recaptcha/api/img/clean/refresh.png' id='recaptcha_reload' alt='Get two new words' width='25' height='18'></a> <a tabindex='7' href=\"javascript:Recaptcha.switch_type('audio');\" title='Audio challenge' id='recaptcha_switch_audio_btn' class='recaptcha_only_if_image'><img src='http://www.google.com/recaptcha/api/img/clean/audio.png' id='recaptcha_switch_audio' alt='Audio challenge' width='25' height='15'></a><a tabindex='8' href=\"javascript:Recaptcha.switch_type('image');\" title='Visual challenge' id='recaptcha_switch_img_btn' class='recaptcha_only_if_audio'><img src='http://www.google.com/recaptcha/api/img/clean/text.png' id='recaptcha_switch_img' alt='Visual challenge' width='25' height='15'></a> <a tabindex='9' target='_blank' href='http://www.google.com/recaptcha/help?c=03AHJ_VuvT0DMV-Y9hwnvfcbjhkc1VlCFOGet8ll55LohTirWXhn_cZAqn_l6_s5ko40zc15s5G_9eVWhOqhwOL-LUqOmuXLCWHGbeDCw7AgxNKh8-FSazKLaEA1nRbdNczqJUveZj6GfxAoEPIFKdJRMG20GJZRZghA&amp;hl=en-GB' title='Help' id='recaptcha_whatsthis_btn'><img alt='Help' src='http://www.google.com/recaptcha/api/img/clean/help.png' id='recaptcha_whatsthis' width='25' height='16'></a> </td> <td style='padding: 18px 7px;'> <img src='http://www.google.com/recaptcha/api/img/clean/logo.png' id='recaptcha_logo' alt='' width='71' height='36'></td></tr>
                
             
              <tr>
                <td colspan =''>Enter code above </td>
                <td><span style='color:#ff0000;'>* </span></td><td>
                    <input type='text' name='vcode' size='70' id ='vcode' />                </td>
				<td width='500' class='redhdrs' align=left>Case Sensitive!</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td align='right'><label></td><td align='right'>
                  <input name='reg_user' type='button' class='formButton2'style='width:100px;' id='reg_user' onclick=\"xajax_add_user(xajax.getFormValues('user'));return false;\" value='Save'  />
                </label></td>
				<td></td>
              </tr>
              <tr>
                <td colspan='2'></td>
              </tr>
            </table>
		    </form>";
			$obj->assign('bodyDisplay','innerHTML',$data);
			$obj->call("hideLoadingDiv");
			return $obj;
}
#---------------------------------------------------
#system backup
#systemBackup
#---------------------------------------------------
function system_backup(){
$obj=new xajaxResponse();

$data="<table cellspacing='0'      width='618' border='0'>
  <tr>
    <td><form action='' method='POST'>
 <table cellspacing='0'      width='300' border='0'>
  <tr class='evenrow2'>
  
    <td  class='evenrow2' scope='col' colspan='2'>DATABASE BACKUP LOG</td>
    
    <td class='evenrow2' scope='col' align='right'><a href='cron.php?linkvar=Export Database&&format=sql'><input type='button' class='formButton2'value='Backup Database'  name='dumpDB'></a>
</td>
  </tr><tr class='evenrow2'>
    <td>NO</td>
	  <td>DATE OF BACKUP</td>
     
	<td COLSPAN='' align=right>ACTION</td></tr>";
  $n=1; $inc=1;
  $QUERY=mysql_query("select * from tbl_databasebackuplog order by backup_id desc limit 0,20 ")or die(mysql_error());
  
  while($row=FetchRecords($QUERY)){
    $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class=$color>
  
    <td>".$n++."</td>
	   <td>$row[date_uploaded]</td>
   <td align='right'><a href='Database_backups/$row[file_name]?getfilename=$row[file_name]&&format=sql' class='greenlinks'>Download</a></td>

   
  </tr>";
  $inc++;
  }
  
  $data.="</table>

		</form></td>
  </tr>
</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function systemBackup(){
$obj=new xajaxResponse();
$dbname="db_cpma";
$dbuser='root';
$dbpass='craiwrut';

$backupFile = $dbname._. date("Y-m-d-H-i-s");
//$command = "C:/wamp/bin/mysql/mysql5.0.45/bin/mysqldump -u $user -p$dbpass $dbname> c:/$backupFile";
//$backup=system($command);
@system("E:/wamp64/bin/mysql/mysql5.7.9/bin/mysqldump -uroot -pcraiwrut db_cpma>c:/$backupFile.sql");

$obj->assign('bodyDisplay','innerHTML',congMsg("Database Backup Successful!\n Please check on drive C of your machine for the database backup copy:$backupFile.sql"));
$obj->call("hideLoadingDiv");
return $obj;
}
#--------------------------------------------------------------
function change_password(){
$obj=new xajaxResponse();
$data="
<form id='changepassword' name='changepassword' method='post' action='".$PHP_SELF."'>
   <table cellspacing='0'      width='70%' border='0'>
      <tr>
        <td width='250'>Current Password </td>
        <td width='5' align='right'><label>          <span style='color:#ff0000;'>* </span></label></td>
        <td width='310'><input name='currentpass' type='password' size='30'  id='currentpass' /></td>
        <td width='340'>&nbsp;</td>
   </tr>
      <tr>
        <td>New Password </td>
        <td align='right'><span style='color:#ff0000;'>* </span></td>
        <td><input name='newpass' type='password' size='30'   id='newpass' /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Confirm Password </td>
        <td align='right'><span style='color:#ff0000;'>* </span></td>
        <td><input name='cpass' type='password' size='30'   id='cpass' /></td>
        <td>&nbsp;</td>
      </tr>
      <tr class='evenrow'>
        <td>Verification Code </td>
        <td    width='15' class='evenrow'>&nbsp;</td>
        <td><div align='left'>
          <table cellspacing='0'      width='159' border='0' align='center' class='evenrow'>
            <tr class='evenrow'>
              <td bgcolor='#666666' background='images/pub.jpg'>";
                $code = generateCode(6);
                $data.="<font color='#ffffff' size='4' face ='palatino linotype'><b>".$code."</b></font>
                    <input type='hidden' name='code'  size='30' id='code' value='".$code."' /></td>
            </tr>
          </table>
        </div>          </td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Enter Varification Code </td>
        <td align='right'><span style='color:#ff0000;'>* </span></td>
        <td class='redhdrs' width='310'><input name='vcode' type='text' size='30'   id='vcode' /></td>
        <td><span class='redhdrs'>Case sensitive!</span></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td align='right'><label>
        <span style='color:#ffffff;'>* </span></label></td>
        <td><input type='button' class='formButton2'name='change_pass' value='Change Password' onclick=\"xajax_updatePassword(xajax.getFormValues('changepassword'))\" /></td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td col;span='3'></td>
      </tr>
    </table>

</form>
";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function updatePassword($formvalues){
$obj=new xajaxResponse();
$user_id=$_SESSION['user_id'];
$currpass=$formvalues['currentpass'];
$newpass=$formvalues['newpass'];
$code=$formvalues['code'];
$vcode=$formvalues['vcode'];
$cpass=$formvalues['cpass'];

if($newpass==''){
$obj->assign('status','innerHTML',errorMsg("Please New Password!"));
return $obj;
}
else if($currpass==''){
$obj->assign('status','innerHTML',errorMsg("Please current Password!"));
return $obj;
}

else if($newpass!=$cpass){
$obj->assign('status','innerHTML',errorMsg("Password Mismatch!"));
return $obj;
}
else if($newpass==$currpass){
$obj->assign('status','innerHTML',errorMsg("Old password is the same as the new!"));
return $obj;
}
else if($vcode!=$code){
$obj->assign('status','innerHTML',errorMsg("Wrong verification code!"));
return $obj;
}

else
$obj->confirmCommands(1,"Do you really want to change your Password?");
$x="select * from tbl_user where user_id='".$user_id."'and password='".md5($currpass)."'";
//$obj->alert($x);
$select=@mysql_query($x) or die('HTTP Error-code-0126'.mysql_error());		
		if(@mysql_num_rows($select)>0){
		/* $row =@mysql_fetch_array($select)or die(mysql_error());
	$_SESSION['id']=$row['id'];	 */
		@mysql_query("UPDATE tbl_user SET password='".md5($newpass)."' where user_id='".$user_id."'")or die('HTTP ERROR CODE-0105'.mysql_error());
		
	}
	else{
	$obj->alert("Could not change user Password, Please try again!");
	return $obj;
	}
		
		
$obj->assign('bodyDisplay','innerHTML',congMsg("Dear ".$_SESSION['username'].", You have successfully changed your password!"));
//$obj->redirect('index.php');
return $obj;
}
#---related links------------------------
#related links
function new_relatedLink(){
$obj=new xajaxResponse();
$data="<table cellspacing='0'      width='400' border='0'>


          <tr>
            <td>
              <form action='?' method='post' NAME='comments' id='comments' onsubmit=\"xajax_save_relatedLink(xajax.getFormValues('comments'));return false;\" enctype='multipart/form-data'>
                <table cellspacing='0'      width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table cellspacing='0'      border='0'>
                        <tr>
                          <td class=''>Link Name:</td>
                          <td><input name='linkname' type='text' id='linkname' size='48' /></td>
                        </tr>
                        <tr>
                          <td>Url</td>
                          <td><input name='url' type='text' id='url' size='48' /></td>
                        </tr>
                        <tr>
                          <td>Attach Logo if any:</td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file'  id='img_file' size='35'></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'><input type='submit' name='save_relatedLink' id='save_relatedLink'   value='Save' /></td>
                        </tr>
                      </table>
                   </td>
                  </tr>
                </table>
              </form>
           </td>
          </tr>
        </table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
//<a href='functions.php?linkvar=Save_Related_Link&&action=Related Links'>
}
function new_document(){
$obj=new xajaxResponse();
$data="<table cellspacing='0'      width='400' border='0'>


          <tr>
            <td>
              <form action='functions.php' method='post' NAME='document' id='comments' enctype='multipart/form-data'>
                <table cellspacing='0'      width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table cellspacing='0'      border='0'>
                        <tr>
                          <td class=''>Document Name:</td>
                          <td><input name='document_name' type='text' id='document_name' size='48' /></td>
                        </tr>
                       
                        <tr>
                          <td>Upload Document:</td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> <input name='img_file' type='file'  id='img_file' size='35'></td>
                        </tr>

                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'><input type='submit' name='save_document' id='save_document'  value='Save' /></td>
                        </tr>
                      </table>
                   </td>
                  </tr>
                </table>
              </form>
           </td>
          </tr>
        </table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
//<a href='functions.php?linkvar=Save_Related_Link&&action=Related Links'>
}
#----------------------------------------------------
#**************************
#view login
#edit login
#**************************
function view_login($login_id,$username,$ipaddress,$status,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
$cur_user=$_SESSION['role'];
$_SESSION['login_id']=$login_id;
$_SESSION['username1']=$username;
$_SESSION['ipaddress']=$ipaddress;
$_SESSION['status']=$status;

$data="<table cellspacing='0'      width='100%' border='0' align='left'>".filter_systemlogs()."
<tr><th  colspan='5' align='center'><div class='' align='center'>USER LOG.</div></th>
<th  colspan=''></th></tr>
<tr class='evenrow' align='left'><th class='black2'>LOG ID</th><th class='black2'>USERNAME</th><th class='black2'><div align='right'>TIME</div></th><th class='black2'><div align='right'>IP ADDRESS</div></th><th class='black2' colspan='' align='center' >STATUS</th><th class='black2' colspan='' align='' ><div align=right>ACTION</div></th></tr>";
	 $p=1;
	 #$query_string="select * from view_login order by login_id desc";
	#$select=@mysql_query($query_string)or die("<div align='center' style='color:#ff0000;font-weight:bold;font-size:12px;'>HTTP-Error code 0073:".mysql_error());
	 $query_string="select l.login_id,u.user_id,u.username,l.role,l.time,l.ip_address,l.status from tbl_login  l inner join  tbl_user u on(l.user_id=u.user_id)  where l.login_id like '".$_SESSION['login_id']."%' && lower(u.username) like '".$_SESSION['username1']."%' && l.ip_address like '".$_SESSION['ipaddress']."%' && lower(l.status) like '".$_SESSION['status']."%' order by l.status,l.login_id desc";
	 //$obj->alert($query_string);
	$select=@mysql_query($query_string)or die("HTTP-Error code 670:".mysql_error());
	
	
	/**************
*paging parameters
*
****/
 $max_records = mysql_num_rows($select);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$p=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die("HTTP-Error code 683:".mysql_error());

	
	
	
	while($row=FetchRecords($new_query)){
	$color=$n%2==1?"evenrow":"white1";
	$class=$row['status']=='Active'?"green_field":"redhdrs";
	$kill=($row['status']=='Inactive')?"<center><strong>N/A</strong></center>":"<input name='kill' type='button' class='formButton2'onclick=\"xajax_kill_session('".$row['login_id']."')\" value='Kill Session' class='button_width' />";
	$data.="<tr class=$color><td><input type ='hidden' name ='".$row['login_id']."' id='".$row['login_id']."'>".$row['login_id']."</td><td>".$row['username']."</td><td align='right'>".$row['time']."</td><td align=right>".$row['ip_address']."</td><TD align='right' width='10' class='$class'>".$row['status']."</TD><td><div align=right>".$kill."</div></td></tr>";
$n++;		      
}			
		
	
	$data.="</br></td></tr><table cellspacing='0'     >";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function kill_session($login_id){
$obj=new xajaxResponse();
$select=mysql_query("select * from tbl_login where login_id='".$login_id."'&& status like 'Active%'")or die("<font color='red'>HTTP Error Code-0144: because, ".mysql_error()."</font>");
if(mysql_num_rows($select)>0){

$obj->confirmCommands(1,"Do you real want to close user session?");
$obj->call("xajax_kill_user",$login_id);
}
else{
$obj->alert("User already Inactive!");
return $obj;
}
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function kill_user($login_id){
$obj=new xajaxResponse();
@mysql_query("update tbl_login set status='Inactive' where login_id='$login_id'")or die("<font color='red'>HTTP Error Code-0144: could not kill session because, ".mysql_error()."</font>");
//session_destroy();
$obj->assign('bodyDisplay','innerHTML',noteMsg('User session Closed!'));
$obj->call("xajax_view_login",'','','','',1,20);
return $obj;
}
#--------view related links------------------
function view_relatedLinkAdmin($link){
$obj = new xajaxResponse();
$_SESSION['linkname']=$link;
//document.getElementById('relatedlink'
$data="<form id='relatedlink' name='relatedlink' method='post' action='?' >
<table cellspacing='0' width='100%' border='0'>
  <tr class='evenrow'>
    <td colspan='2'>Link Name</td>
    <td COLSPAN=2><label>
      <select name='relatedlink' id='relatedlink' class='combobox' onchange=\"xajax_view_relatedLinkAdmin(this.value);\"><option value=''>-ALL-</option>";
      $querylink=mysql_query("select * from tbl_relatedlinks  ORDER BY linkName asc")or die(http(1259));
      while($rowlink=FetchRecords($querylink)){
	  $sell=($rowlink['linkName']==$link)?"selected":"";
      $data.="<OPTION value=\"".$rowlink['linkName']."\" ".$sell.">".$rowlink['linkName']."</OPTION>";
      }
     $data.="</select>
    </label></td><td><input name='relatedlink' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_relatedLink();\"></td>
</tr>
<tr class='evenrow'>
   <td colspan='5'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_relatedLink(xajax.getFormValues('relatedlinks'));return false;\" value='edit' />|
	 <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('relatedlinks'),'delete_relatedlink','');return false;\" value='Delete' class='redhdrs' />
     </td>
  </tr>
  <tr class='evenrow2'>
    <td>NO</td>
    <td>select</td>
    <TD>LOGO</TD>
    <td>LINK NAME</td>
    <td>URL</td>
  </tr>
  ";
  $inc=1;
  $query=mysql_query("select * from tbl_relatedlinks where linkName like '".$link."%' ORDER BY linkName asc")or die(http(0082));
  while($row=FetchRecords($query)){

$color=($inc%2==1)?"evenrow":"white1"; 
  $data.="<tr class='$color'>
    <td>".$n++."</td>
    <td>
      <input name='relatedlink_id[]' id='relatedlink_id[]' type='checkbox' value='".$row['relatedlink_id']."' />  </td>
    <td><img src='icons/$row[logo]' width='24' heigh='24' /></td>
    <td>".$row['linkName']."</td>
    <td>".$row['url']."</td>
  </tr>";
    $inc++;
  
  }
  $data.="<tr class='evenrow'>
   <td colspan='5'><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_relatedLink(xajax.getFormValues('relatedlinks'));return false;\" value='edit' />|
	 <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('relatedlinks'),'delete_relatedlink','');return false;\" value='Delete' class='redhdrs' />
     </td>
  </tr>
</table>


</form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_relatedLink($link){
$obj = new xajaxResponse();
$_SESSION['linkname']=$link;
//document.getElementById('relatedlink'
$data="<form id='relatedlink' name='relatedlink' method='post' action='?' '>
<table cellspacing='0'      width='100%' border='0'>
  <tr class='evenrow'>
    <td colspan='2'>Link Name</td>
    <td COLSPAN=3><label>
      <select name='relatedlink' id='relatedlink' class='combobox' onchange=\"xajax_view_relatedLink(this.value);\"><option value=''>-ALL-</option>";
      $querylink=mysql_query("select * from tbl_relatedlinks  ORDER BY linkName asc")or die(http(1259));
      while($rowlink=FetchRecords($querylink)){
     $sell=($rowlink['linkName']==$link)?"selected":"";
      $data.="<OPTION value=\"".$rowlink['linkName']."\" ".$sell.">".$rowlink['linkName']."</OPTION>";
      }
     $data.="</select>
    </label></td>
</tr>

  <tr class='evenrow2'>
    <td>NO</td>
    <td>select</td>
    <TD>LOGO</TD>
    <td>LINK NAME</td>
    <td>URL</td>
  </tr>
  ";
  $inc=1;
  $query=mysql_query("select * from tbl_relatedlinks where linkName like '".$link."%' ORDER BY linkName asc")or die(http(0082));
  while($row=FetchRecords($query)){

$color=($inc%2==1)?"evenrow":"white1"; 
  $data.="<tr class='$color'>
    <td>".$n++."</td>
    <td><input name='relatedlink_id[]' id='relatedlink_id[]' type='checkbox' value='".$row['relatedlink_id']."' />  </td>
    <td><img src='icons/$row[logo]' width='24' heigh='24' /></td>
    <td>".$row['linkName']."</td>
    <td>".$row['url']."</td>
  </tr>";
    $inc++;
  
  }
  $data.="</table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#-----------FAQS-------------------------------
function mail2($mail){
$obj=new xajaxResponse();



$data="  
          <table cellspacing='0'      width='600' border='0'>
            <tr>
              <td>Name</td>
              <td><input type='text' name='name' id='name' size='50'></td>
            </tr>
            <tr>
              <td>Subject:</td>
              <td><input type='text' name='subjetc' id='subject' size='50'></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><label>
                <input type='text' name='email' id='email' size='50'>
              </label></td>
            </tr>
            <tr>
              <td>Message</td>
              <td><label>
                <textarea name='message' id='message' cols='47' rows='5'></textarea>
              </label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><label>
                <input type='button' class='formButton2'name='button' value='Send' onclick=\"xajax_sendmail(getElementById('name').value,getElementById('subject').value,getElementById('email').value,getElementById('message').value)\" class='button_width' >
              </label></td>
            </tr>
            
          </table>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function sendmail($name,$subject,$email,$message){
$obj=new xajaxResponse();
@mail("xarafire@gmail.com", $name,"Subject: $subject",$message, "From: $email");

$obj->assign('bodyDisplay','innerHTML',congMsg("Your Email has been sent!"));
$obj->call("xajax_mail2",$mail);
return $obj;

}
#------------------------user_comments----------------------------------------
function view_comments($user){
$obj = new xajaxResponse();
$_SESSION['username1']=$user;
$inc=1;$n=1;
$data="<table cellspacing='0'      width='100%' border='0'>".filter_comments()."</table>
<table cellspacing='0'      width='650' border='0'>
  <tr class=''>
    <th scope='col'><div style='float:right;'>No.</div></th>
    <th scope='col'>USER</th>
    <th scope='col'>COMMENT</th>
    <th scope='col' ><div style='float:right;'>SNAPSHOT</label></th>
	<th scope='col' ><div style=''>STATUS</label></th>";
	if($_SESSION['role']=="Systems Administrator"){
    $data.="<th scope='col' ><div style=''>action</label></th>";
	}else
	$data.="<th scope='col' ></th>";
  $data.="</tr>";
  $query=mysql_query("select c.id,u.username,c.comment,c.snapshot,c.status from tbl_comment  c inner join tbl_user u on(u.user_id=c.user_id) where u.username like '".$_SESSION['username1']."%' order by date desc")or die("<font color=red> Could not retrieve comment because ".mysql_error()."</font>");
  while($row=FetchRecords($query)){
   $color=$n%2==1?"evenrow":"white1";
   $status=($row['status']=='Unsorted')?"<td class='redhdrs'>".$row['status']."</td>":"<td class='greenlinks'>".ucwords($row['status'])."</td>";
$clear=($_SESSION['role']=="Systems Administrator")?"<td class='redhdrs'><input name='clear' type='button' class='formButton2'value='Clear' onclick=\"xajax_clearUserComment('".$row['id']."')\" /></td>":"<td></td>";
  $data.="<tr class=$color>
      <td align='right'>".$inc++."</td>
    <td><input name='comment_id' id='comment_id' type='hidden' value='".$row['id']."' />$row[username]</td>
    <td>$row[comment]</td>
    <td align='right'><a href='snapshots/$row[snapshot]' class='greenlinks' target=_blank>View Snapshot</a></td>
   ".$status."
  ".$clear."
  </tr>";
  $n++;
  }
  
  $data.="
</table>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function clearUserComment($comment_id){
$obj=new xajaxResponse();
$sql="select * from tbl_comment where id='".$comment_id."'&& status like 'Unsorted%'";
$obj->alert($sql);
$select=mysql_query($sql)or die("<font color='red'>HTTP Error Code-0144: because, ".mysql_error()."</font>");
if(mysql_num_rows($select)>0){

$obj->confirmCommands(1,"Do you real want to clear user comment?");
$obj->call("xajax_sort_userComment",$comment_id);
}
else{
$obj->alert("Comment Already sorted!");
return $obj;
}
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function sort_userComment($comment_id){
$obj=new xajaxResponse();
@mysql_query("update tbl_comment set status='Sorted' where id='$comment_id' and status like 'Unsorted%'")or die("<font color='red'>HTTP Error Code-0144: could not kill session because, ".mysql_error()."</font>");
//session_destroy();
$obj->assign('bodyDisplay','innerHTML',noteMsg('User Comment or Issue Addressed!'));
$obj->call("xajax_view_comments",'');
return $obj;
}
#************
#faqs view fags
#view faqs
#***********
function faqs($qn){
$obj=new xajaxResponse();

$data="<table cellspacing='0'      width='600' border='0'>
  <tr>
    <td>

<table cellspacing='0'      width='362' border='0'>
  <tr>
    <td width='257'><div align='center'></div></td>
    <td width='95'><label></label></td>
  </tr>
  <tr>
    <td><label>Question.</label></td>
    <td><textarea cols='40' rows='10' id='faqs'></textarea></td>
  </tr>
  <tr>
    <td><label>
        <div align='right'></div>
      </label></td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='save' value='Save' onclick=\"xajax_save_faqs(getElementById('faqs').value);return false;\" />
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_allfaqs($qn,$div){
$obj=new xajaxResponse();
$select=Execute("select * from tbl_faqs where id='".$qn."'") or die(http("Edit-005")); 
while($row=@mysql_fetch_array($select)){
$data="
<table cellspacing='0'      width='100%' border='0'>
 
  <tr>

    <td colspan=2><strong>".$row['question']."</strong></td>
  </tr>
  
  <tr>
    <td colspan='2'>".$row['answer']."</td>

  </tr>
</table>";

}
$obj->assign($div,'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_questions($question){
$obj=new xajaxResponse();

$data="<table cellspacing='0' id='rounded_table'     width='100%' border='0' class='black'>
<tr class='evenrow'><td ALIGN='RIGHT' colspan='5'><div style='float:right;'><b class=''><input type='button' class='formButton2'   id='button' name='new entry' value='New Entry' onclick=\"xajax_faqs('')\">";
	$data.=" | <input type='button' class='formButton2'   id='button' name='export' value='Export to Excel'></b> | <input type='button' class='formButton2'   id='button' name='export' value='Print Version'></td></tr>
 <tr CLASS='evenrow'>
    <td colspan='5' ALIGN=left ><b class='greenlinks' >FREQUENTLY ASKED QUESTIONS<select name='faqs' class='combobox' id='faqs' size='1' onchange=\"xajax_view_questions(getElementById('faqs').value)\">";
	
	$data.="<option value=''>-All-</option>";
	$select=mysql_query("select * from tbl_faqs order by id asc")or die(http("STP-1671"));
	while($ROW=FetchRecords($select)){
	$selc=($ROW['question']==$question)?"selected":"";
	$data.="<option value=\"".$ROW['question']."\" ".$selc.">".retrieve_info_withSpecialCharacters($ROW['question'])."</option>";
	
	}
	$data.="</select></b></td>";
	
    
    $data.="</tr>
  <tr>
   <tH colspan='5'><CENTER>FAQS:</CENTER></tH>
	</tr>
  <tr CLASS='evenrow2'>
    <tH><b class=''>NO.</b></tH>
    <tH><b class=''>QUESTION</b></tH>
	<tH><b class=''>RESPONSE</b></tH>
	<tH><b class=''>DATE</b></tH>";
	if(($_SESSION['UserGroup']=="Managers")||($_SESSION['UserGroup']=="Administrators")){
    $data.="<td ALIGN='RIGHT'><b class=''>ACTION</b></td>";
    }
	else
	 $data.="<td ALIGN='RIGHT'></td>";
 $data.="</tr>";
  $inc=1; $n=1;
  $query=mysql_query("select * from tbl_faqs where question like '".$question."%' order by date dESC")or die(mysql_error());
  while($row=FetchRecords($query)){
  $color=$n%2==1?"evenrow":"white1";
  if((($_SESSION['UserGroup']=="Managers")||($_SESSION['UserGroup']=="Administrators"))&&($row['answer']==NULL)){

  $respond="<td ALIGN='RIGHT'><input name='' type='button' class='formButton2' id='button' value='Answer' onclick=\"xajax_view_faqs('".$row['id']."')\" /></td>";

 
  }
  else if((($_SESSION['UserGroup']=="Managers")||($_SESSION['UserGroup']=="Administrators"))&&($row['answer']<>NULL)){
  
   $respond="<td><input name='' type='button' class='formButton2'   id='button' value='Edit' onclick=\"xajax_edit_faqs('".$row['id']."');return false;\" /></td>";
  }
  else {
  $respond="<td></td>";
  }
  $response=($row['answer']<>NULL)?retrieve_info_withSpecialCharacters($row['answer'])." <a href='#' onclick=\"xajax_view_allfaqs('".$row['id']."','Readmore".$row['id']."');return false;\">Read more...</a> ":"<label class='redhdrs'>Pending</label>";
  $data.="<tr class='$color'>
  <td>".$inc++."</td>
    <td class='greenlinks'>".retrieve_info_withSpecialCharacters($row['question'])."</td>
     <td>".$response."</td>
	  <td>".$row['date']."</td>
".$respond."
    </tr><tr><td colspan='6' ><div id='Readmore".$row['id']."'></div></td></tr>";
  $n++;
  }
   $data.="</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_faqs($id){
$obj= new xajaxResponse();
$data="<table cellspacing='0'      width='600' border='0'>";
$query= @Execute("select * from tbl_faqs where id='".$id."'")or die("abi Trust Error-code: 1136 because, ".mysql_error());
while($row=FetchRecords($query)){
$_SESSION['id']=$row['id'];
 $data.="<tr>
    <td>

<table cellspacing='0'      width='362' border='0'>
  <tr>
    <td width='257'><div align='center'>Question</div></td>
    <td width='95'><input type='hidden' id='".$row['id']."' value='".$row['id']."'>'".$row['question']."'</td>
  </tr>
  <tr>
    <td><label>Answer:</label></td>
    <td><textarea cols='40' rows='10' id='answer'>".$row['answer']."</textarea></td>
  </tr>";
  }
 
  $data.="<tr>
    <td><label>
        <div align='right'></div>
      </label></td>
    <td><div align='right'>
      <input type='button' class='formButton2'   id='button' name='save' value='Save' onclick=\"xajax_answer('".$_SESSION['id']."',getElementById('answer').value);\" />
    </div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function answer($id,$answer){
$obj=new xajaxResponse();
$sel=mysql_query("select * from tbl_faqs where id='".$id."'")or die("HTTP trust -Error code  1176: could not answer FAQ Because, ".mysql_error());
if(mysql_num_rows($sel)>0){
$query= "update tbl_faqs set answer='".mysql_real_escape_string($answer)."' where id ='".$id."' ";
//$obj->alert($query);
mysql_query($query)or die("HTTP Trust-Error code 1179 because ".mysql_error());
//$obj->alert($query);
}
$obj->assign('bodyDisplay','innerHTML',congMsg("HTTP Trust Question Answered!"));
$obj->call('xajax_view_questions','');
//$obj->assign("bodyDisplay",'innerHTML',"");
return $obj;
}
function view_all($question,$answer){
//if($_SESSION['district']=='')

$obj=new xajaxResponse();
$data="<table cellspacing='0'      width='600' class='black' border='0'><tr><td></td><td align='right'><a href='#new_faq' onclick=\"xajax_faqs('');\" ><input type='button' class='formButton2'   id='button' value='New Question'></a></td></tr>";
  $query=mysql_query("select * from tbl_faqs")or die(mysql_error());
  while($row=FetchRecords($query)){
  $data.="<tr><td colspan='2' class='greenlinks'>".$row['question']."</td></tr>
  <tr><td colspan='2' >".$row['answer']."</td></tr>";
  }
$data.="</table>";
$obj->assign("bodyDisplay",'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#**************************
#view district
#edit district
#update district
#confirmCommands update district
#delete district
#confirmCommands delete district
#**************************
function view_municipality($district,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
$_SESSION['district']=$district;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_municipality()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >

<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_district1','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='5' align='center'><b class=''><div style='float:center;'>REGISTERED DISTRICTS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>MUNICIPALITY</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ZONE</th>
</tr>";
	 $p=1;
	 $query_string="select * from tbl_municipality m  JOIN tbl_zone z on(z.zoneCode=m.zone) join tbl_district d on(d.districtCode=m.districtCode) where d.districtName like '".$_SESSION['district']."%' and m.municipalityName like '".$_SESSION['municipalityName']."%' order by municipal_id asc";
	 #$obj->alert($query_string);
	$select=@mysql_query($query_string)or die(http(1519));
	/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($select);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$p=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1530));
	
	
	
	
	while($row=FetchRecords($new_query)){

	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='municipal_id[]' id='municipal_id' type='checkbox' value='".$row['municipal_id']."' /></td>
		<td>".$p++."</td>
		<td>".$row['municipalityName']."</td>
			<td>".$row['districtName']."</td>
		<td>".$row['zoneName']."</td>
		
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/


$data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_district1','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr>";
 
	$data.="<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function add_municipality($zone){
$obj=new xajaxResponse();

$_SESSION['zoneName']=$zone;
$data.="<form name='new_district' id='new_district' action='".$PHP_SELF."'>
<table cellspacing='0'      width='265' border='0'>
<tr>
    <td colspan=2><div id='status' name='status'></div></td>
   
  </tr> 
   <tr>
    <td>Zone:</td>
    <td><select name='zone' id='zone' size='1' onchange=\"xajax_add_municipality(document.getElementById('zone').value); return false;\">";
	if($_SESSION['zoneName']<>''){
	$query=mysql_query("select * from tbl_zone where zoneCode='".$_SESSION['zoneName']."' order by zoneCode asc")or die(http());
	while($rowzone=FetchRecords($query)){
	#$selectedZone=($_SESSION['zoneName']==$row['zoneCode'])?"CHECKED":"";
	$data.="<option value='".$rowzone['zoneCode']."' '".$selectedZone."' >".$rowzone['zoneName']."</option>";
	}
	}
	else
	$data.="<option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_zone order by zoneCode asc")or die(http());
	while($row=FetchRecords($query)){
	$selectedZone=($_SESSION['zoneName']==$row['zoneCode'])?"CHECKED":"";
	$data.="<option value='".$row['zoneCode']."' '".$selectedZone."' >".$row['zoneName']."</option>";
	}
	$data.="</select></td>
  </tr>
  
  <tr>
    <td>District:</td>
    <td><select name='district' id='district' size='1'><option value=''>-select-</option>";
	if($_SESSION['zoneName']<>''){
	$query=mysql_query("select * from tbl_district where zone='".$_SESSION['zoneName']."' order by districtName asc")or die(http(1596));
	while($row=FetchRecords($query)){
	$data.="<option value='".$row['districtCode']."'>".$row['districtName']."</option>";
	}
	}else 
	$data.="<option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_district  order by districtName asc")or die(http(1596));
	while($row=FetchRecords($query)){
	$data.="<option value='".$row['districtCode']."'>".$row['districtName']."</option>";
	}
	$data.="</select></td>
  </tr>
  
  <tr>
    <td>Municipality Name:</td>
    <td width='162'><input type='text' name='municipalityName' id='municipalityName' /></td>
  </tr>
 
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_municipality(xajax.getFormValues('new_district'))\" />
    </div></td>
  </tr>
</table><form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_countries($country,$zone,$cur_page=1,$records_per_page=10){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$_SESSION['district']='';
$_SESSION['zone']='';
$_SESSION['district']=$district;
$_SESSION['zone']=$zone;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_district()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >
		
<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='8' align='center'><b class=''><div style='float:center;'>REGISTERED DISTRICTS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>country </th>
<th scope='col'>ASARECA Country</th>

</tr>";
	 $inc=1;
 $query_string="select * from tbl_country order by countryName asc ";
	
	
	
	
#$obj->alert($query_string);
	$query=mysql_query($query_string)or die(http(1668));
/**************  paging parameters ****/
 $max_records = mysql_num_rows($query) or die(http(1658));
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
#$obj->alert($query_string." limit ".$offset.",".$records_per_page);
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1664));
 	
	while($row=FetchRecords($new_query)){
$div="district".$row['districtCode'];
#$obj->alert($div);
	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='district_code[]' id='district_code' type='checkbox' value='".$row['districtCode']."' /></td>
		<td>".$inc++."</td>
		<td><a href='#' onclick=\"xajax_view_allSubcounties('".$row['districtCode']."','".$div."');return false;\">".$row['districtName']."</a></td><td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		<td align='right'></td><td align='right'></td>
		<td>".$row['tso_service_providers']."</td>
		
		</tr>
		<tr class=$color>
		
		<td colspan=8><div id='".$div."'></div></td>
		
		</tr>
		
		
		";
$n++;
#exit;
#mysql_free_result($new_query);		      
}			
		
		
		/*
*display pages
*/


$data.="<tr><td colspan=6><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>

<td colspan='3' align='right'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"selectED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

$data.=" 
<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_district($district,$zone,$cur_page=1,$records_per_page=10){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$_SESSION['district']='';
$_SESSION['zone']='';
$_SESSION['district']=$district;
$_SESSION['zone']=$zone;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_district()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >
		
<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='8' align='center'><b class=''><div style='float:center;'>REGISTERED DISTRICTS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col'>ZONE</th>
<th scope='col'>NO. OF SUBCOUNTIES</th>
<th scope='col'>NO. OF PARISHES</th>
<th scope='col'>NO. OF TSO SERVICE PROVIDERS</th>
</tr>";
	 $inc=1;
 $query_string="select d.districtCode,d.districtName,
 d.acronym,d.zone,z.zoneName,d.Display ,count(s.subcountyName) as no_ofsubcounty,
 count(p.ParishName) as no_ofparishes from tbl_district d left JOIN tbl_zone z
  on(z.zoneCode=d.zone) left join tbl_subcounty s on(s.districtCode=d.districtCode)
   left join tbl_parish p on(p.subcountyCode=s.subcountyCode) 
   where districtName like '".$_SESSION['district']."%' and
    z.zoneName like '".$_SESSION['zone']."%' and d.Display like 'Yes%'
	 group by  districtName order by districtName asc ";
	
	
	
	
#$obj->alert($query_string);
	$query=mysql_query($query_string)or die(http(1668));
/**************  paging parameters ****/
 $max_records = mysql_num_rows($query) or die(http(1658));
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
#$obj->alert($query_string." limit ".$offset.",".$records_per_page);
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1664));
 	
	while($row=FetchRecords($new_query)){
$div="district".$row['districtCode'];
#$obj->alert($div);
	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='district_code[]' id='district_code' type='checkbox' value='".$row['districtCode']."' /></td>
		<td>".$inc++."</td>
		<td><a href='#' onclick=\"xajax_view_allSubcounties('".$row['districtCode']."','".$div."');return false;\">".$row['districtName']."</a></td><td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		<td align='right'></td><td align='right'></td>
		<td>".$row['tso_service_providers']."</td>
		
		</tr>
		<tr class=$color>
		
		<td colspan=8><div id='".$div."'></div></td>
		
		</tr>
		
		
		";
$n++;
#exit;
#mysql_free_result($new_query);		      
}			
		
		
		/*
*display pages
*/


$data.="<tr><td colspan=6><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>

<td colspan='3' align='right'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"selectED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

$data.=" 
<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_district_backup_03012012($district,$zone,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$_SESSION['district']='';
$_SESSION['zone']='';
$_SESSION['district']=$district;
$_SESSION['zone']=$zone;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_district()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >
		
<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='8' align='center'><b class=''><div style='float:center;'>REGISTERED DISTRICTS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col'>ZONE</th>
<th scope='col'>NO. OF SUBCOUNTIES</th>
<th scope='col'>NO. OF PARISHES</th>
<th scope='col'>NO. OF TSO SERVICE PROVIDERS</th>
</tr>";
	 $inc=1;
 $query_string="select d.districtCode,d.districtName,
 d.acronym,d.zone,z.zoneName,d.Display ,count(s.subcountyName) as no_ofsubcounty,
 count(p.ParishName) as no_ofparishes from tbl_district d left JOIN tbl_zone z
  on(z.zoneCode=d.zone) left join tbl_subcounty s on(s.districtCode=d.districtCode)
   left join tbl_parish p on(p.subcountyCode=s.subcountyCode) 
   where districtName like '".$_SESSION['district']."%' and
    z.zoneName like '".$_SESSION['zone']."%' and d.Display like 'Yes%'
	 group by  districtName order by districtName asc ";
	
	
	
	
#$obj->alert($query_string);
	$query=mysql_query($query_string)or die(http(1668));
/**************  paging parameters ****/
 $max_records = mysql_num_rows($query) or die(http(1658));
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
#$obj->alert($query_string." limit ".$offset.",".$records_per_page);
$new_query=mysql_query($query_string) or die(http(1664));
 	
	while($row=FetchRecords($new_query)){
$div="district".$row['districtCode'];
#$obj->alert($div);
	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='district_code[]' id='district_code' type='checkbox' value='".$row['districtCode']."' /></td>
		<td>".$inc++."</td>
		<td><a href='#' onclick=\"xajax_view_allSubcounties('".$row['districtCode']."','".$div."');return false;\">".$row['districtName']."</a></td><td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		<td align='right'></td><td align='right'></td>
		<td>".$row['tso_service_providers']."</td>
		
		</tr>
		<tr class=$color>
		
		<td colspan=8><div id='".$div."'></div></td>
		
		</tr>
		
		
		";
$n++;
#exit;
#mysql_free_result($new_query);		      
}			
		
		
		/*
*display pages
*/


$data.="<tr><td colspan=6><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_district');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'Delete_District1','');return false;\" value='Delete' class='redhdrs' /></td>

<td colspan='3' align='right'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$_SESSION['district']."','".$_SESSION['zone']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"selectED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

$data.=" 
<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_allSubcounties($district,$div){
$obj=new xajaxResponse();
$data="<table cellspacing='0'      width='660' border='0'>";

$query=mysql_query("select * from tbl_subcounty where districtCode='".$district."'")or die(http(1711));
while($row=FetchRecords($query)){
$divsubcounty="Subcounty".$row['subcountyCode'];
#$obj->alert($divsubcounty);
 $data.="<tr>
    <td class='black2'>Subcounty/Division:</td>
    <td><a href='#' onclick=\"xajax_view_allParish('".$row['subcountyCode']."','".$divsubcounty."');return false;\">$row[subcountyName]</a></td>

  </tr>";
  
  
  $data.="<tr>
    <td colspan=2><div id='".$divsubcounty."'></div></td>
    
  </tr>";
  
  }
$data.="

  <tr><td></td><colspan=2 align='right'><input name='' type='button' class='formButton2'style='width:100px;' value='New Subcounty' onclick=\"xajax_new_district('new_subcounty','','');return false;\" /></td></tr>
</table>
";

$obj->assign($div,'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_allParish($subcounty,$divsubcounty){
$obj=new xajaxResponse();
$data.="<table cellspacing='0'      width='660' border='0'>";

$query=mysql_query("select * from tbl_parish where subcountyCode='".$subcounty."'")or die(http(1711));
while($row=FetchRecords($query)){
#$divsubcounty="Subcounty".$row['subcountyCode'];
 $data.="<tr>
    <td class='black2'>Parish/Ward:</td>
    <td>$row[ParishName]</td>

  </tr>";
  }
  
  $data.="
  <tr><td></td><colspan=2 align='right'><input name='' type='button' class='formButton2'style='width:100px;' value='New Parish' onclick=\"xajax_new_district('new_parish','','');return false;\" /></td></tr>
</table>
";

$obj->assign($divsubcounty,'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#*********************************
#view subcounty
function view_subcounty_backup03012011($district,$subcounty,$zone,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->assign('bodyDisplay','innerHTML',noteMsg("Your Session has Expired!"));
$obj->redirect('index.php');
return $obj;
}
$_SESSION['district']='';
$_SESSION['zone']='';
$_SESSION['subcounty']='';
$_SESSION['district']=$district;
$_SESSION['subcounty']=$subcounty;
$_SESSION['zone']=$zone;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_subcounty()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >
		
<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_subcounty');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_subcounty','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='7' align='center'><b class=''><div style='float:center;'>SUBCOUNTY DETAILS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>SUB-COUNTY</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM </th>
<th scope='col'>ZONE</th>
</tr>";
	 $inc=1;
 $query_string="select d.districtCode,d.districtName,d.acronym,d.zone,z.zoneName,s.subcountyName,s.subcountyCode,s.Display  from tbl_district d left JOIN tbl_zone z on(z.zoneCode=d.zone) left join tbl_subcounty s on(s.districtCode=d.districtCode) left join tbl_parish p on(p.SubcountyCode=s.subcountyCode) where districtName like '".$_SESSION['district']."%' and z.zoneName like '".$_SESSION['zone']."%' and s.subcountyName like '".$_SESSION['subcounty']."%' and s.Display like 'Yes%' group by s.subcountyName  order by d.districtName asc ";
	 #$obj->alert($query_string);
	$query=mysql_query($query_string)or die(http(1737));
/**************  paging parameters ****/
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset=($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1853));
	
	
	
	
	while($row=FetchRecords($new_query)){
$color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='subcountyCode[]' id='subcountyCode' type='checkbox' value='".$row['subcountyCode']."' /></td>
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$inc++."</td>
		<td>".$row['subcountyName']."</td>
		<td>".$row['districtName']."</td>
		<td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
	
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/


$data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_subcounty');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_district1','');return false;\" value='Delete' class='redhdrs' /></td>

<td colspan='3' align='right'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_subcounty('".$_SESSION['district']."','".$_SESSION['subcounty']."','".$_SESSION['zone']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_subcounty('".$_SESSION['district']."','".$_SESSION['subcounty']."','".$_SESSION['zone']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_subcounty('".$_SESSION['district']."','".$_SESSION['subcounty']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_subcounty('".$_SESSION['district']."','".$_SESSION['subcounty']."','".$_SESSION['zone']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_subcounty('".$_SESSION['district']."','".$_SESSION['subcounty']."','".$_SESSION['zone']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"selectED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

$data.=" 
<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_parish($district,$zone,$subcounty,$parish,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->assign('bodyDisplay','innerHTML',noteMsg("Your Session has Expired!"));
$obj->redirect('index.php');
return $obj;
}
$_SESSION['district']='';
$_SESSION['zone']='';
$_SESSION['subcounty']='';
$_SESSION['parish']='';
$_SESSION['district']=$district;
$_SESSION['subcounty']=$subcounty;
$_SESSION['parish']=$parish;
$_SESSION['zone']=$zone;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table cellspacing='0'      width='700' border='0'>".filter_parish()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >
		
<table cellspacing='0'      width='700' border='0'>
<tr class='evenrow'>
     
    <td colspan=8><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_parish');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_parish','');return false;\" value='Delete' class='redhdrs' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='7' align='center'><b class=''><div style='float:center;'>PARISH DETAILS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>PARISH </th>
<th scope='col'>SUBCOUNTY </th>

<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col'>ZONE</th>

</tr>";
	 $inc=1;
 $query_string="select d.districtName,d.acronym,d.zone,z.zoneName,s.subcountyCode,s.subcountyName,p.ParishName,p.ParishCode,p.Display from tbl_district d inner JOIN tbl_zone z on(z.zoneCode=d.zone) inner join tbl_subcounty s on(s.districtCode=d.districtCode) inner join tbl_parish p on(p.SubcountyCode=s.subcountyCode) where districtName like '".$_SESSION['district']."%' and z.zoneName like '".$_SESSION['zone']."%' and s.subcountyName like '".$_SESSION['subcounty']."%' && p.ParishName like '".$_SESSION['parish']."%' and p.Display like 'Yes%' group by  ParishName order by districtName,s.subcountyName,ParishName asc ";
	 #$obj->alert($query_string);
	$query=mysql_query($query_string)or die(http(1968));
/**************  paging parameters ****/
$max_records = mysql_num_rows($query);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1612));
	
	
	
	
	while($row=FetchRecords($new_query)){

	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='ParishCode[]' id='ParishCode' type='checkbox' value='".$row['ParishCode']."' /></td>
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$inc++."</td>
		<td>".$row['ParishName']."</td>
		<td>".$row['subcountyName']."</td>
		<td>".$row['districtName']."</td>
		<td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		
		
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/


$data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'),'edit_parish');return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_parish','');return false;\" value='Delete' class='redhdrs' /></td>

<td colspan='4' align='right'>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_parish('".$_SESSION['district']."','".$_SESSION['zone']."','".$_SESSION['subcounty']."','".$_SESSION['parish']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_parish('".$_SESSION['district']."','".$_SESSION['zone']."','".$_SESSION['subcounty']."','".$_SESSION['parish']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;

	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_parish('".$_SESSION['district']."','".$_SESSION['zone']."','".$_SESSION['subcounty']."','".$_SESSION['parish']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_parish('".$_SESSION['district']."','".$_SESSION['zone']."','".$_SESSION['subcounty']."','".$_SESSION['parish']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_parish('".$_SESSION['district']."','".$_SESSION['zone']."','".$_SESSION['subcounty']."','".$_SESSION['parish']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"selectED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr>"; 

$data.=" 
<table cellspacing='0'     ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#***********************************************
#delete district
#*********************************
#new district
function new_district($linkvar,$district){
$obj = new xajaxResponse();
$_SESSION['districtCode']=$district;
$data="<form name='new_district' id='new_district' action='".$PHP_SELF."'>
<table cellspacing='0'      width='100%' border='0'>
<tr>
    <td colspan=2><div id='status' name='status'></div></td>
   
  </tr>";
switch($linkvar){
case"new_subcounty":
$data.="
  <tr>
    <td>District Name:</td>
    <td width='162'><select name='districtName' id='districtName' size='1'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_district order by districtName asc")or die(http());
	while($row=FetchRecords($query)){
	$data.="<option value=\"".$row['districtCode']."\" >".$row['districtName']."</option>";
	}
	$data.="</select></td>
  </tr>";
  $n=1;
  for($i=0;$i<10;$i++){
  $data.="<tr>
    <td>Subcounty: $n</td>
    <td><input type='hidden' name='loopkey[]' id='loopkey' value='1' /><input type='text' name='subcounty[]' id='subcounty' /></td>
  </tr>";
  
  $n++;}
 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_district(xajax.getFormValues('new_district'),'new_subcounty')\" />
    </div></td>
  </tr>
";




break;
case"new_parish":
#=======new parish======================
$data.="
  <tr>
    <td>District Name:</td>
    <td width='162'><select name='districtName' id='districtName' size='1' onchange=\"xajax_new_district('new_parish',getElementById('districtName').value);return false;\"><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_district order by districtName asc")or die(http(2017));
	while($row=FetchRecords($query)){
	$seldistrict=($_SESSION['districtCode']==$row['districtCode'])?"selected":"";
	$data.="<option value=\"".$row['districtCode']."\" ".$seldistrict.">".$row['districtName']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>Subcounty:</td>
    <td><select name='subcountyCode' id='subcountycode' size='1'><option value=''>-select-</option>";
	if($_SESSION['districtCode']<>''){
	$queryd=mysql_query("select * from tbl_subcounty where districtCode='".$_SESSION['districtCode']."' order by subcountyName asc")or die(http(2013));
	while($rowd=FetchRecords($queryd)){
	$data.="<option value='".$rowd['subcountyCode']."'>".$rowd['subcountyName']."</option>";
	}
	}
	else
	
	$data.="<option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_subcounty where districtCode='".$_SESSION['distrctCode']."' order by subcountyName asc")or die(http(2026));
	while($row=FetchRecords($query)){
	$data.="<option value='".$row['subcountyCode']."'>".$row['subcountyName']."</option>";
	}
	$data.="</select></td>
  </tr>";
  $x=1;
   for($i=0;$i<10;$i++){
  $data.="<tr>
    <td>Parish Name: $x</td>
    <td width='162'><input type='hidden' name='loopkey[]' id='loopkey' value='1' /><input type='text' name='parish[]' id='parish' /></td>
  </tr>";
  
  $x++;}
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_district(xajax.getFormValues('new_district'),'new_parish')\" />
    </div></td>
  </tr>
";
 break;
case"new_district":

$data.="
  <tr>
    <td>Entry Type:</td>
    <td> <select name='entryType' id='entryType' size='1'><option value=''>-select-</option>
	<option value='District'>District</option>
	<option value='Municipality'>Municipality</option>
</select></td>
  </tr>
  <tr>
    <td>District/Municipality Name:</td>
    <td width='162'><input type='text' name='districtName' id='districtName' /></td>
  </tr>
  <tr>
    <td>Acronym:</td>
    <td><input type='text' name='txtacronym' id='txtacronym' /></td>
  </tr>
  <tr>
    <td>Zone:</td>
    <td><select name='zone' id='zone' size='1'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_zone order by zoneCode asc")or die(http(2072));
	while($row=FetchRecords($query)){
	$data.="<option value='".$row['zoneCode']."'>".$row['zoneName']."</option>";
	}
	$data.="</select></td>
  </tr>
  <tr>
    <td>No. of TSO Service Providers:</td>
    <td><input type='text' name='serviceproviders' id='serviceproviders' /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_save_district(xajax.getFormValues('new_district'),'new_district'); return false;\" />
    </div></td>
  </tr>";
default:

}
$data.="</table><form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
} 
function view_document_admin(){
$obj = new xajaxResponse();
$data="<form name='document' id='document' method='post' action='".$PHP_SELF."' ><table cellspacing='0'      width='400' border='0'>
<tr>
    <th scope='col' COLSPAN=3>DOCUMENT DETAILS</th>

    <th scope='col'><input name='' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_document()\"/></th>

  </tr>
  <tr>
    <th scope='col' COLSPAN=2>No.</th>
    <th scope='col'>Document  Name</th>
    <th scope='col' colspan=''>ACTION</th>

  </tr>";
  $n=1; $inc=1;
  $QUERY=mysql_query("select * from tbl_documents")or die(http("STP-2566"));
  while($row=FetchRecords($QUERY)){
  $color=$inc%2==1?"evenrow":"white1";
  $data.="<tr class=$color>
  <td><input name='document_id[]' id='document_id' type='checkbox' value='".$row['document_id']."' /></td>
    <td>".$n++."</td>
    <td>".$row['document_name']."</td>
    <td><div style='float:left;'><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_document(xajax.getFormValues('document'));return false;\" value='edit' /> |
	<a href='docs/".$row['file_name']."'><input type='button' class='formButton2'TITLE='Download' value='Download'/></a></div></td>
    
  </tr>";
  $inc++;
  }
  
  $data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('document'),'delete_document','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr></table></FORM>
";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
} 
#view organization details
#*************************************************
function view_allorganizations($org_code,$div2){
$obj=new xajaxResponse();
$query=mysql_query("select o.org_code,o.orgName,o.acronym,o.registered,o.contact_person,o.telephone,o.orgtype,o.email_address,z.countryName from tbl_organization o left join tbl_country z on(o.country_id=z.countryCode) where  org_code='".$org_code."' order by orgName asc")or die(mysql_error());
while($row=FetchRecords($query)){
$data="<div id='login'>

<table cellspacing='0'      width='600'><tr><td><legend class='green_field'></legend>
      
      <table cellspacing='0'      width='670' border='0'>
        <tr>
          <td>Reports &raquo; Organizationa Details</td>
        </tr>
        <tr>
          <td><hr size='1' color='orange' align='left'width='640'/></td>
        </tr>
      </table>
      <legend class='green_field'></legend>
      <form name='organization' id='organization'><table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
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
              <tr style='display:none;'>
                <td>Registered?</td>
                <td width='74' colspan='2'>".$row['registered']."</td>
              </tr>
              <tr style='display:none;'>
                <td>Registration Number:</td>
                <td colspan='2'>".$row['regno']."</td>
              </tr>
              <tr style='display:none;'>
                <td>District of Registration:</td>
                <td colspan='2'>".$row['district']."</td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'>".$row['organization_type']."</td>
              </tr>
              <tr>
                <td>Vision</td>
                <td colspan='2'>".mysql_real_escape_string($row['vision'])."</td>
            </tr>
              <tr>
                <td>Mission</td>
                <td colspan='2'>".mysql_real_escape_string($row['mission'])."</td>
            </tr>
              <tr>
                <td>Objectives</td>
                <td colspan='2'>".mysql_real_escape_string($row['objectives'])."</td>
              </tr>
			  <tr style='display:none;'>
                <td><span class='green_field'>Sub-component:</span></td>
                <td colspan='2'>".$row['subcomponent']."</td>
            </tr>
              <tr style='display:none;'>
                <td><span class='green_field'>Subsector:</span></td>
                <td colspan='2'>".$row['subsector']."</td>
            </tr>
			
                
  
</table>

<table cellspacing='0'      width='597' border='0' id='contacts'>
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
    </tr>";
	if($_SESSION['role']=='Monitoring  and Evaluation'){
	$data.="<tr >
             <td colspan=2 align=center><input type='button' class='formButton2'onclick=\"xajax_view_organization('','','');return false;\" Title='Close'><input type='button' class='formButton2'class='evenrow' Value='Edit' title='Edit' name='Edit'  onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'))\">|<input type='button' class='formButton2'class='evenrow' title='Delete'  value='Delete' class='redhdrs'></td>
      <td></td>
    </tr>";
	}else 
	$data.="<tr >
             <td colspan=2 align=center><input type='button' class='formButton2'Value='Cancel' onclick=\"xajax_view_organization('','','');return false;\" Title='Close'>|<input type='button' class='formButton2'class='' Value='Edit' title='Edit' name='Edit'  onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'));return false;\">|<a href='print_version.php?linkvar=print_orgDetails&&org_code=".$row['org_code']."' target='_blank'><input type='button' class='formButton2'value='Print Version' name='' ></a></td>
      <td></td>
    </tr>";
	
	

	
  $data.="</table>
 
         
       </form></td></tr></table>
<p>&nbsp;</p>
</div>";
}

$obj->assign($div2,'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_organization($orgname,$orgtype,$countryName,$cur_page=1,$records_per_page=20){
$feedback = new xajaxResponse();
if($_SESSION['user_id']==''){
$feedback->redirect('index.php');
return $obj;
} 
$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['countryName']=$countryName;

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>
";


$data.="<table cellspacing='1'  id='report'     width='668' border='0'> ".filter_organization()." 
<tr class='evenrow'>
     
    <td colspan=7><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'Delete_organization','');return false;\" value='Deactivate' class='redhdrs' /></td>
    
	 <td></td>
<td></td>

   

  </tr>
	  <tr>
        <th colspan='9' ><div align='center' class=''>ORGANIZATION/INSTITUTION DETAILS </div></th>
        </tr>
      
      <tr>
	  <th class=''>select</th>
	  <th width='' ><strong class=''>ORGANIZATION NAME</strong></th>
        <th width='' ><strong class=''>ACRONYM</strong></th>
        <th width='' '><strong class=''>COUNTRY</strong></th>
	
		<th width=''><strong class=''>ORG. TYPE</strong></th>
		<th ><strong class=''>CONTACT PERSON</strong></th>
		<th  width=''><strong class=''>TELEPHONE</strong></th>
		<th  width=''><strong class=''>EMAIL</strong></th>
		<th  width=''><span align='right'>ACTION</span></th>

      </tr>";
/* $query_string="select * from view_organization where lower(orgName) like '".strtolower($orgname)."%'&& lower(organization_type) like '".strtolower($orgtype)."%'&& lower(district) like '".strtolower($district)."%' group by orgName order by orgName Asc"; */
$query_string="select o.org_code,o.orgName,o.acronym,o.registered,o.contact_person,o.telephone,o.orgtype,o.email_address,z.countryName from tbl_organization o left join tbl_country z on(o.country_id=z.countryCode) where lower(orgName) like '".strtolower($_SESSION['orgname1'])."%' && lower(countryName) like '".strtolower($_SESSION['countryName'])."%' and o.display like 'Yes%'   order by orgName Asc";
$query_=mysql_query($query_string)or die(http(2614));

$max_records = mysql_num_rows($query_)or die(http(2616));
	
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$inc=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(1278));  



	  while($row=FetchRecords($new_query)){
	 // $color=$n%2==1?"#e7d58f":"#ffffff";
	 //$feedback->ainclert($row[21]);
	 $div2="view_projectDetails_".$row['org_code'];
	 $telno=($row['telephone']!='')?"<td>".$row['telephone']."</td>":"<td></td>";
	  $color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#999999';\" >

	 <td><input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' />".$inc."</td>
	 <td>".mysql_real_escape_string($row['orgName'])."</td>
	 <td>".$row['acronym']."</a></td>
	 <td>".$row['countryName']."</td>
	<TD>".$row['orgtype']."</TD>
	 <td >".$row['contact_person']."</td>

	  ".$telno;
	  $data.="<td>".$row['email_address']."</td>  <td ALIGN='RIGHT'><input name='' type='button' class='formButton2'value='Details' onclick=\"xajax_view_allorganizations('".$row['org_code']."','".$div2."');\" /></td></tr>
	  <tr >
<td colspan='7'><div id='$div2'></div></a></td>
	</tr>
	  
	  ";
	  $inc++;
	  }
    $data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'Delete_organization','');return false;\" value='Deactivate' class='redhdrs' /></td>
   </td><td colspan=4 align='right'>";
	
   
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;

if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_organization('".$_SESSION['orgname1']."','".$_SESSION['orgtype1']."','".$_SESSION['countryName']."','".$cur_page."',this.value)\">";


	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"selectED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"selectED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";

	

   

  $data.="</td></tr></table></form>";
$feedback->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $feedback;
 }
function new_organization(){
$obj=new xajaxResponse();
$data="

<div id='login'><table cellspacing='0'      width='600'><tr><td><form name='organization' id='organization'>
<table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
              <tr>
                <td>Name of Organization</td>
                <td colspan='2'><input name='orgname' type='text' id='orgname' size='80' /></td>
              </tr>
              <tr>
                <td>Acronym</td>
                <td colspan='2'><input name='acronym' type='text' id='acronym' size='80' /></td>
              </tr>
              
            
              <tr>
                <td>Country:</td>
                <td colspan='2'><select name='zonename' id='zonename' style='width:390px;'><option value=''>-select-</option>";
	$queryzone=mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['countryCode']."'>".$rowzone['countryName']."</option>";
	  }
	  $data.="</select></td>
              </tr>
			  
			  
			 <tr style='display:none;'>
    <td>District/Municipality:</td>
    <td><select name='district' id='district' >";
	if($_SESSION['districtCode']<>''){

     $q=mysql_query("select * from tbl_district where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowd=FetchRecords($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";

	}
	
	}
	else
	{
	
	
      $data.="<option>-select-</option>";
     $q=mysql_query("select * from tbl_district  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowd=FetchRecords($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";
	
	 }
	 }
	 

       $data.="</select></td>
  </tr>
   <tr style='display:none;'>
    <td>Subcounty/Division:</td>
    <td><select name='subcounty' id='subcounty' >";
	if($_SESSION['districtCode']<>''){/*  
      $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where subcountyCode='".$_SESSION['subcountyCode']."' order by 1 asc")or die(http(__line__));
	  while($rowsubcounty=FetchRecords($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"selectED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 }else { 
	  */
	  $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowsubcounty=FetchRecords($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"selectED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 
	 }

        $data.="</select></td>
  </tr>
 <tr style='display:none;'>
    <td>Parish/Ward:</td>
    <td><select name='parish' id='parish' ><option value='' >-select-</option>";
	if($_SESSION['districtCode']<>''){
     
      $qparish=mysql_query("select * from tbl_parish where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowparish=FetchRecords($qparish)){
	  #$selparish=($_SESSION['parishCode']==$rowparish['parishCode'])?"selected":"";
      $data.="<option value='".$rowparish['ParishCode']."' '".$selparish."'>".$rowparish['ParishName']."</option>";
	
	 
	 }
	 }

        $data.="
                </select></td>
  </tr>

              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'><label>
                  <select name='orgtype' id='orgtype' style='width:390px;'><option value='' >-select organization-</option>";
				   $query=mysql_query("select * from tbl_lookup where classCode=1 order by codeName Asc")or die("Sunrise Error-Code-0057 because, ".mysql_error());
				  
				  while($row=FetchRecords($query)){
				  $selovc=($row['code']=='98')?"selected":"";
				  $data.="<option value='".$row['code']."' '".$selovc."' >".$row['codeName']."</option>";
				  }
                  $data.="</select>
                  </label></td>
              </tr>
			 
			  
			  <tr>
                <td>Brief Description of the Organization:</td>
                <td colspan='2'><textarea name='brief_introduction' id='brief_introduction' cols='77' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>Vision:</td>
                <td colspan='2'><textarea name='vision' id='vision' cols='77' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>Mission:</td>
                <td colspan='2'><textarea name='mission' id='mission' cols='77' rows='3'></textarea></td>
              </tr>
              <tr>
                <td>Objectives:</td>
                <td colspan='2'><label>
                  <textarea name='objectives' id='objectives' cols='77' rows='3'></textarea>
                  </label></td>
              </tr>
			  
			  <tr>
                <td>Desired Username:</td>
                <td colspan='2'><label>
                  <input name='username' id='username' type='text' size='80' />
                  </label></td>
              </tr>
			  <tr>
                <td>Password:</td>
                <td colspan='2'><label>
                  <input name='password' type='password' size='80' />
                  </label></td>
              </tr>
              </table>
			  		  
         <fieldset><legend class='green_field'>Contact Details</legend>
		 <table cellspacing='0'      width='445' border='0' id='contacts'>
		 <tr>
        <td width='125'>Physical and Postal Address:</td>
      <td width='287'><textarea name='address' cols='77' rows='3'></textarea></td>
    </tr>
           <tr>
             <td width='125'>Website:</td>
      <td width='287'><input name='website' type='text' id='website' size='80' /></td>
    </tr>
	<tr>
             <td width='125'>Fax:</td>
      <td width='287'><input name='fax' type='text' id='fax' size='80' value='' /></td>
    </tr>
           <tr>
             <td>Contact Person 1:</td>
      <td><input name='contact_person' type='text' id='contact_person' size='80' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title' type='text' id='title' size='80' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><input name='telephone' type='text' id='telephone' size='80' value='+2' /></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td><input name='mobile' type='text' id='mobile' size='80' value='+2' /></td>
    </tr>
	 <tr>
             <td>Contact Person 2:</td>
      <td><input name='contact_person2' type='text' id='contact_person2' size='80' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title2' type='text' id='title2' size='80' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
  
      
        <TD> <input name='telephone2' type='text' id='telephone2' size='80' value='+2' /></label></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
    
        <TD><LABEL><input name='mobile2' type='text' id='mobile2' value='+2' size='80' />
        </label></td>
    </tr>
	 <tr>
             <td>Contact Person 3:</td>
      <td><input name='contact_person3' type='text' id='contact_person3' size='80' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title3' type='text' id='title3' size='80' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><label>
         <input name='telephone3' type='text' id='telephone3' value='+2' size='80' /></label></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td>
          <label> <input name='mobile3' type='text' id='mobile3' value='+2' size='80' /></label>
        </td>
    </tr>
	
  </table>
  </fieldset>
         
       <table cellspacing='0'      width='500' border='0'>
	   <tr><td colspan=2><div id='status'></div></td></tr>
         <tr>
           <td COLSPAN=2>&nbsp;</td>
      <td><label>
        <div align='right'>
          <input type='button' class='formButton2'name='save_organization' class='button_width' id='save_organization' onclick=\"xajax_save_organization(xajax.getFormValues('organization'));return false;\" value='Save' />
          </div>
      </label></td>
    </tr>
  </table></form></td></tr></table></div>";



$obj->assign("bodyDisplay","innerHTML",$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_zonalMapping($zone,$tso){
$obj=new xajaxResponse();

$_SESSION['zone']='';
$_SESSION['tso']='';
$_SESSION['zone']=$zone;
$_SESSION['tso']=$tso;

$data.="<form name='zonalMapping' id='zonalMapping'  action='".$PHP_SELF."'><table cellspacing='0'      width='100%' border='0'>
  <tr class='evenrow'>
   <td colspan='3'></td>
    <td colspan='2'><label></label>      <label>
      <div align='right' class='floatright'>
        <input type='button' class='formButton2'name='button2' id='button2' value='New Entry' onclick=\"xajax_zonalMapping();\" />
         <a href='export_to_excel_word.php?linkvar=Export Zonal Mapping&&zone=".$_SESSION['zone']."&&tso=".$_SESSION['tso']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Zone</td>
    <td colspan=2><select name='zonename' id='zonename' ><option value=''>-All-</option>";
	$queryzone=mysql_query("select * from tbl_zone order by zoneName  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['zoneName']."'>".$rowzone['zoneName']."</option>";
	  }
	  $data.="</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan='1'><select name='orgName' id='orgName'><option value=''>-All-</option>";
	$query=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(__line__));
	while($rowOrg=FetchRecords($query)){
	
      $data.="<option value='".$rowOrg['orgName']."'>".$rowOrg['orgName']."</option>";
	  }
	  $data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_zonalMapping(getElementById('zonename').value,getElementById('orgName').value); return false;\" /></td>
  </tr>";
$data.="
<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_zonalMapping(xajax.getFormValues('zonalMapping'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('zonalMapping'),'Delete_Zone','');return false;\" value='Delete' class='redhdrs' /></td>
    


   

  </tr>
  <tr class='evenrow2'>
    
    <td colspan=5 align='center'>ZONAL MAPPING</td>
 
  </tr>
  <tr class='evenrow2'>
    <td>NO</td>
	 <td>select</td>
    <td>ZONE</td>
    <td>ORGANIZATION</td>
    <td >DISTRICT</td>
  </tr>";
  $n=1;  $inc=1;
  $queryzones=mysql_query("select zm.map_id,zm.zone,zm.orgName,zm.districts_inZone,z.zoneCode,z.zoneName,o.org_code,o.orgName as organizationName from tbl_zonalmapping zm left join tbl_organization o on(o.org_code=zm.orgName) left join tbl_zone z on(z.zoneCode=zm.zone) where z.zoneName like '".$_SESSION['zone']."%' and o.orgName like '".$_SESSION['tso']."%' order by zoneCode  asc")or die(http(2260));
  while($rowzones=FetchRecords($queryzones)){

$color=($inc%2==1)?"evenrow3":"white1";
  $data.="<tr class=$color><td>".$n++."</td>
  <td><input name='map_id[]' id='map_id' type='checkbox' value='".$rowzones['map_id']."' /></td>
    <td>$rowzones[zoneName]</td>
    <td>$rowzones[organizationName]</td>
   <td>$rowzones[districts_inZone]</td>
    
  </tr>";
  $inc++;
  }
$data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_zonalMapping(xajax.getFormValues('zonalMapping'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('zonalMapping'),'Delete_Zone','');return false;\" value='Delete' class='redhdrs' /></td>
    



   

  </tr>";
$data.="</table></div></form>";


$obj->assign("bodyDisplay","innerHTML",$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function zonalMapping(){
$obj=new xajaxResponse();
$data.="<form name='zone' method='post' id='zone' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0'>
  <tr>
    <td>Zone Name</td>
    <td colspan='2'><select name='zonename' id='zonename'><option value=''>-select-</option>";
	$queryzone=mysql_query("select * from tbl_zone order by zonename  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['zoneCode']."'>".$rowzone['zoneName']."</option>";
	  }
	  $data.="</select></td>
  </tr>
  <tr>
    <td><p>Organization Name</p>    </td>
    <td colspan='2'><select name='orgName' id='orgName'><option value=''>-select-</option>";
	$query=mysql_query("select * from tbl_organization order by orgName  asc")or die(http(__line__));
	while($rowOrg=FetchRecords($query)){
	
      $data.="<option value='".$rowOrg['org_code']."'>".$rowOrg['orgName']."</option>";
	  }
	  $data.="</select></td>
  </tr>
  <tr>
    <td valign='top'>Districts in the Zone</td>
    <td colspan='' valign='top'><table cellspacing='0'      >";
	$query=mysql_query("select * from tbl_district order by districtName  asc limit 0,50")or die(http(__line__));
	while($rowDistrict=FetchRecords($query)){
	
	$data.="<tr><td>
      <input type='checkbox' name='district[]' id='district' value='".$rowDistrict['districtName']."' />
    </td>
    <td>".$rowDistrict['districtName']."</td>
  </tr>";
  }
  $data.="</table></td><td valign='top'><table cellspacing='0'      >";
	$query1=mysql_query("select * from tbl_district order by districtName  asc limit 51,100")or die(http(2256));
	while($rowDistrict1=FetchRecords($query1)){
	
	$data.="<tr><td>
      <input type='checkbox' name='district[]' id='district' value='".$rowDistrict1['districtName']."' />
    </td>
    <td>".$rowDistrict1['districtName']."</td>
  </tr>";
  }
  $data.="</table></td><td valign='top'><table cellspacing='0'      >";
	$query2=mysql_query("select * from tbl_district order by districtName  asc limit 101,151")or die(http(2266));
	while($rowDistrict2=FetchRecords($query2)){
	
	$data.="<tr><td>
      <input type='checkbox' name='district[]' id='district' value='".$rowDistrict2['districtName']."' />
    </td>
    <td>".$rowDistrict2['districtName']."</td>
  </tr>";
  }
 
 
 
  
  $data.="</table></td>
  </tr>
    
   <tr>
    <td>&nbsp;</td>
    <td><label></label></td>
    <td><label>
      <input type='button' class='formButton2'name='button' id='button' value='Save' onclick=\"xajax_saveZonalMapping(xajax.getFormValues('zone'))\" />
    </label></td>
  </tr>
</table></FORM>"; 
$obj->assign("bodyDisplay","innerHTML",$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function new_role(){
$obj=new xajaxResponse();
$data="<form  name='userRole' id='userRole' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0' >
<tr class='white1'><td colspan=5><div id='status'></div></td>
  </tr>
  <tr>
    <td>User Group</td>
    <td><select name='group_name' id='group_name' style='width:270px;'><option value=''>-Select-</option>";
       $query=mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc")or die(mysql_error());
  while($row=FetchRecords($query)){
  $data.="<option value='".$row['group_id']."'>".substr($row['group_name'],0,40)."</option>";
   }
      $data.="</select></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td >Role Name</td>
    <td><input name='role_name' type='text' id='role_name' size='48.5' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Description</td>
    <td><textarea name='desc' id='desc' cols='45' rows='5'></textarea></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' class='button_width' onclick=\"xajax_save_role(xajax.getFormValues('userRole'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('new_role','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function new_dropdownlist(){
$obj=new xajaxResponse();
$data="<form  name='dropdown' id='dropdown' method='post' action='".$PHP_SELF."'><table cellspacing='0'      width='600' border='0' >
<tr class='white1'><td colspan=5><div id='status'></div></td>
  </tr>
  
  
  
  </tr>
				  <tr class='evenrow2'>
                    <th width='50' class=''>No.</th>
					<th class=''>Class Code</th>
                    <th class=''>drop-down description </th>
					  <th class=''>DROP-DOWN name</th>
					    <th class=''>REMARKS</th>
                  </tr>
				  
				  ";
				  $n=1;
				  $inc=1;
				 $n=1;
  for($i=0;$i<10;$i++){
  $sel=FetchRecords(mysql_query("select max(classDescription)  as x from tbl_lookup"))or die(http("3169"));
  $color=($n%2==1)?"evenrow3":"white1";
  $x=$sel['x']+1;
  $data.="<tr class='$color'>
  <td width=''>".$n."</td>
   <td width=''><input name='code[]'  id='code' value='".$x."' type='text' size='20'></td>
   
 <td ><input name='classDescription[]' type='text' value='' size='40'></td>
 <td><input name='codeName[]' type='text' value='' size='40'></td> 
 <td><textarea name='desc[]' id='desc' cols='45' rows='3'></textarea></td> 
  </tr>";
  $n++;
  }
	
	$data.="<tr class='evenrow'>
  <td width=''></td>
   <td width=''></td>
   
 <td ></td>
 <td></td> 
 <td><input name='save_dropdown' type='button' class='formButton2'value='Save' class='button_width' onclick=\"xajax_save_dropdownlist(xajax.getFormValues('dropdown'));return false;\"></td> 
  </tr>";
$data.="</table></form>";

$obj->assign('new_dropdownlist','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_role($role,$usergroup){
$obj = new  xajaxResponse();
if($_SESSION['user_id']==''){
$obj->assign('bodyDisplay','innerHTML',noteMsg("Your Session has Expired!"));
$obj->redirect('index.php');
return $obj;
} 
$_SESSION['userRole']='';
$_SESSION['userRole']=$role;
$data.="<form action='".$PHP_SELF."' method='post' name='userRole' id='userRole'   ><table       width='100%' border='0' cellspacing='1' >
<tr class='evenrow'>
                    <td width='' class='' colspan='4'><div id='new_role'></div></td></tr>
                  <tr class='evenrow'>
                    <td width='' class=''colspan=2>ROLE <select name='role' id='role' onchange=\"xajax_view_role(getElementById('role').value,getElementById('usergroup').value);return false;\"><option vaklue=''>-All-</option>";
					$queryrole=mysql_query("select * from tbl_role order by role_name asc")or die(http(__line__));
					
					while($rowrole=FetchRecords($queryrole)){
					$selectedrole=($_SESSION['userRole']==$rowrole['role_name'])?"selected":"";
					$data.="<option value=\"".$rowrole['role_name']."\" ".$selectedrole." >".$rowrole['role_name']."</option>";
					}
					$data.="</select></td><td><input type='button' class='formButton2'name='role' id='role' onclick=\"xajax_view_role(getElementById('role').value,getElementById('usergroup').value);return false;\" value='Go'></td>
                    <td class=''><div style='float:right;'><input name='new_role' onclick=\"xajax_new_role();\" type='button' class='formButton2'value='New Role' /> | <input name='' type='button' class='formButton2'value='Export to Excel' /></div></td>
					 
                  </tr>
				  <tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
    <input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
    <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_role(xajax.getFormValues('userRole'));return false;\" value='edit' />|
    <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('userRole'),'delete_role','role_id','tbl_role','xajax_view_role','2');return false;\" value='Delete' class='redhdrs' /></td>
 

   

  </tr>
				  <tr class='evenrow2'>
                    <th width='50' class=''>No.</th>
                    <th class=''>ROLE NAME</th>
					  <th class=''>group name</th>
					    <th class=''>REMARKS</th>
                  </tr>
				  
				  ";
				  $n=1;
				  $inc=1;
				  $SQL=mysql_query("select g.group_id,r.role_id,r.role_name,r.description,g.group_name from tbl_role r left join tbl_usergroup g on(g.group_id=r.usergroup) where r.role_name like '".$_SESSION['userRole']."%'  and g.group_name like '".$_SESSION['usergroup']."%' and g.display='Yes' order by r.role_name  asc")or die(mysql_error());
				  while($row=FetchRecords($SQL)){
				  $color=$inc%2==1?"evenrow":"white1";
                  $data.="<tr height='25' class='$color'>
                    <td width='50'><input type='checkbox' name='role_id[]' id='role_id' value='".$row['role_id']."'>".$n++."</td>
                    <td>".$row['role_name']."</td>
					 <td>".$row['group_name']."</td>
					<td>".$row['description']."</td>
                  </tr>";
				  $inc++;
				  
				  }
				  
                  $data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_role(xajax.getFormValues('userRole'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('userRole'),'delete_role','role_id1','tbl_role','xajax_view_role','2');return false;\" value='Delete' class='redhdrs' /></td>
 

   

  </tr>
              </table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;


}
function view_dropdownList($codename,$classdesc){
$obj = new  xajaxResponse();
$_SESSION['classdesc']='';
$_SESSION['codeName']='';
$_SESSION['codeName']=$codename;
$_SESSION['classdesc']=$classdesc;
$data.="<form action='".$PHP_SELF."' method='post' name='dropdown' id='dropdown' ><table       width='100%' border='0' cellspacing='1' >
<tr class='evenrow'>
                    <td width='' class='' colspan='5'><div id='new_dropdownlist'></div></td></tr>
                  <tr class='evenrow'>
                    <td width='' class=''colspan=2>Class Description </td><td colspan=2><select name='classdesc' style='width:400px;' id='classdesc' >
					<option vaklue=''>-All-</option>";
					$queryrole=mysql_query("select * from tbl_lookup group by classDescription order by classDescription asc")or die(http(__line__));
					
					while($rowrole=FetchRecords($queryrole)){
					$selectedrole=($_SESSION['classdesc']==$rowrole['classDescription'])?"selected":"";
					$data.="<option value=\"".$rowrole['classDescription']."\" ".$selectedrole." >".$rowrole['classDescription']."</option>";
					}
					$data.="</select></td>
                    <td class=''><div style='float:right;'><input name='new_role' onclick=\"xajax_new_dropdownList();\" type='button' class='formButton2'value='New Entry' /> | <input name='' type='button' class='formButton2'value='Export to Excel' /></div></td>
					 
                  </tr>
				  <tr class='evenrow'>
                    <td width='' class=''colspan=2>Drop-down </td><td colspan=2><select name='codename' style='width:400px;' id='codename' onchange=\"xajax_view_role(getElementById('codename').value);return false;\"><option vaklue=''>-All-</option>";
					$queryrole=mysql_query("select * from tbl_lookup group by codeName order by codeName asc")or die(http(__line__));
					
					while($rowrole=FetchRecords($queryrole)){
					$selectedrole=($_SESSION['codeName']==$rowrole['codeName'])?"selected":"";
					$data.="<option value=\"".$rowrole['codeName']."\" ".$selectedrole." >".$rowrole['codeName']."</option>";
					}
					$data.="</select></td>
                    <td class=''><div style='float:right;'><input name='new_role' onclick=\"xajax_view_role(getElementById('codename').value,getElementById('classdesc').value);return false;\";\" type='button' class='formButton2'value='Go' /> </div></td>
					 
                  </tr>
				  <tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_dropdownList(xajax.getFormValues('dropdown'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('dropdown'),'delete_dropdownList','code','tbl_lookup','xajax_view_dropdownList','2');return false;\" value='Delete' class='redhdrs' /></td>
 

   

  </tr>
				  <tr class='evenrow2'>
                    <th width='50' class=''>No.</th>
					<th class=''>code</th>
                    <th class=''>drop-down description </th>
					  <th class=''>DROP-DOWN name</th>
					    <th class=''>REMARKS</th>
                  </tr>
				  
				  ";
				  $n=1;
				  $inc=1;
				  $SQL=mysql_query("select * from tbl_lookup where codeName like '".$_SESSION['codeName']."%' and classDescription like '".$_SESSION['classdesc']."%'  order by classCode,codeName asc")or die(http(3251));
				  while($row=FetchRecords($SQL)){
				  $color=$inc%2==1?"evenrow":"white1";
                  $data.="<tr height='25' class='$color'>
                    <td width='50'><input type='checkbox' name='code[]' id='code' value='".$row['code']."'>".$n++."</td>
					<td>".$row['classCode']."</td>
                    <td>".$row['classDescription']."</td>
					 <td>".$row['codeName']."</td>
					<td>".$row['notes']."</td>
                  </tr>";
				  $inc++;
				  
				  }
				  
                  $data.="<tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_dropdownList(xajax.getFormValues('dropdown'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('dropdown'),'delete_dropdownList','code','tbl_lookup','xajax_view_dropdownList','2');return false;\" value='Delete' class='redhdrs' /></td>
 

   

  </tr>
              </table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;


}
function add_staff($programme){
$obj = new  xajaxResponse();


$data="<form name='staffDirectory' id='staffDirectory' action='".$PHP_SELF."'><table cellspacing='0'      width='660' border='0'>
  <tr>
    <td scope='col' colspan=3><div id='status'></div></td>
  </tr>
  <tr>
   <td>Programme/Unit:</td>
    <td><label>
      <select name='programme' onchange=\"xajax_add_staff(this.value); return false;\" style='width:230px;'><option value=''>-select-</option>";
	  $query=@mysql_query("select * from tbl_programme order by prog_id asc")or die(http(2451));
	  while($row=@mysql_fetch_array($query)){
$data.="<option value=\"".$row['prog_id']."\" ".checkExistance($row['prog_id'],$programme,'selected')." >".$row['program_id']." ".$row['program_name']."(".$row['Accronym'].")</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
   <td>Project:</td>
    <td><label>
      <select name='project' style='width:230px;'><option value=''>-select-</option>";
	  $query=@mysql_query("select * from tbl_project where programme_id='".$programme."' group by title order by title asc")or die(http(2451));
	  while($row=@mysql_fetch_array($query)){
$data.="<option value='".$row['id']."'> ".$row['title']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  
  
  <tr>
    <td scope='col'>Name</td>
    <td scope='col'><label>
      <input name='name' type='text' size='40' />
    </label></td>
    <td scope='col'>&nbsp;</td >
  </tr>

 
  <tr>
    <td>Role/Tittle:</td>
    <td><label>
      <select name='role' style='width:230px;'><option value=''>-select-</option>";
	  $query=@mysql_query("select * from tbl_role order by role_name asc")or die(http(2451));
	  while($row=@mysql_fetch_array($query)){
$data.="<option value='".$row['role_id']."'>".$row['role_name']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr height='25'>
											<td width='200'>Organization:</td>
											<td>
												<select name='leadInstitution' id='leadInstitution' style='width:230px;'><option value='' >-select-</option>";
														$ab = @Execute("select * from tbl_organization order by orgName asc")or die(mysql_error());
														while($b = mysql_fetch_array($ab)){
															$data.="<option value=\"".$b['org_code']."\" >".mysql_real_escape_string($b['orgName'])."</option>";
														}
										
														@mysql_free_result($ab);
												$data.="</select>
											</td>
										</tr>
  
  
   <tr>
   <td>Country:</td>
    <td><label>
      <select name='country' style='width:230px;'><option value=''>-select-</option>";
	  $query=@mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName asc")or die(http(2451));
	  while($row=@mysql_fetch_array($query)){
$data.="<option value='".$row['countryCode']."'> ".$row['countryName']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
   <tr>
   <td>District:</td>
    <td><label>
      <select name='district' style='width:230px;'><option value=''>-select-</option>";
	  $query=Execute("select * from tbl_district where entryType like 'District%' order by districtName asc")or die(http(2451));
	  while($row=FetchRecords($query)){
$data.="<option value='".$row['districtCode']."'> ".$row['districtName']."</option>";	  
	  
	  }
      $data.="</select>
    </label></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Desired Username </td>
    <td><input name='username' type='text' size='40' /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Password</td>
    <td>
    <input name='password' type='password' size='40' /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Tel No. </td>
    <td>  <select name='mob_code' id='tel_code'><option value=''>+</option>
      </select>
    <input name='tel_no' type='text' size='32' /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Mobile:</td>
    <td>
	<select name='mob_code' id='mob_code'>

	<option value=''>+</option>
      </select> <input name='mobile_number' type='text' size='32' /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Physical and Postal Address</td>
    <td>".add_txtarea('postalAddress')."</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Email</td>
    <td><input name='email' type='text' size='40' /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td><td>&nbsp;</td>
    <td align='left'><label>
      <input type='button'  name='save' class='formButton2' value='Save' onclick=\"xajax_save_staff(xajax.getFormValues('staffDirectory'));return false;\" />
    </label></td>
    
  </tr>
</table></form>
";




$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_staffMembers($name,$role){
$obj=new xajaxResponse();
$n=1;
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
//$obj->alert($cur_user);


$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >

<table cellspacing='1'  id='report'    width='700' border='0'>
<tr class='evenrow'>
    <td colspan='1'><strong>Name:</strong></td><td colspan='2'>
      <select name='name' id='name' style='width:300px;' onChange=\"xajax_view_staffMembers(this.value,'".$name."');return false;\">
          <option value=''>-All-</option>";
		  
  $querys=Execute("select * from tbl_staffmembers where Name<>'' and display='Yes'  group by Name order by Name asc") or die(http("Setup-4074"));
  while($rows=@mysql_fetch_array($querys)){
  $data.="<option value=\"".$rows['Name']."\" ".checkExistance($rows['Name'],$name,'selected')." >".$rows['Name']."</option>
          ";
  }
 // $querys=NULL;
  $data.="
      </select></td>
	  <td colspan='1'><strong>Title:</strong></td>
	  <td colspan=2><select name='role' style='width:200px;' size='1' id='role' onChange=\"xajax_view_staffMembers('".$role."',this.value); return false;\" ><option value=''>-All-</option>";
	  $selzone=@mysql_query("select * from tbl_staffmembers where Title<>'' group by Title ORDER BY Title asc")or die(http("setup-4084"));
	  while($rowzone=FetchRecords($selzone)){
	  $data.="<option value=\"".$rowzone['Title']."\" ".checkExistance($rowzone['Title'],$role,'selected').">".$rowzone['Title']."</option>";
	  }

$data.="</select></td>
<td colspan='5' align='right'><input name='search' type='button' class='formButton2'value='Go' onClick=\"xajax_view_staffMembers(getElementById('name').value,getElementById('role').value);\" />  | <input type='button' class='formButton2'id='export' name='export' value='New Entry' onclick=\"xajax_add_staff('');\"/> | <a href='export_to_excel_word.php?linkvar=Export staff&&name=".$name."&&role=".$role."&&format=excel'><input type='button' class='formButton2'id='export' name='export' value='Export to Excel' /></a> |
<a href='print_version2.php?linkvar=Print staff&&name=".$name."&&role=".$role."&&format=Print' target='_blank'><input type='button' class='formButton2'id='export' name='export' value='Print Version' /></a></td>
  </tr>
<tr class='evenrow'>
     
    <td colspan=11><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_staff(xajax.getFormValues('district1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('district1'),'delete_staff','staff_id','staff_id','tbl_staffmembers');return false;\" value='Delete' class='formButtonRed' /></td>
</tr>
<tr class='evenrow2'><td scope='col' colspan='12' align='center'><b class=''><div style='float:center;'>STAFF DETAILS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=''>NO</th>
<th scope='col'>Name </th>
<th scope='col'>Title </th>
<th scope='col'>Programme/Unit </th>
<th scope='col'>Organization </th>
<th scope='col'>Address</th>
<th scope='col'>Country</th>
<th>District/Province</th>
<th scope='col'>Office</th>
<th scope='col'>Mobile</th>

<th scope='col'>Email Address</th>
</tr>";
	 $inc=1; $n=1;
 	 $query_string="select s.*,d.*,c.*,p.*,r.org_code,r.orgName 
 from tbl_staffmembers s left join tbl_district d on(d.districtCode=s.district)
 left join tbl_country c on(c.countryCode=s.country)
 left join tbl_programme p on(p.prog_id=s.prog_id)
 left join tbl_organization r on(r.org_code=s.organization)
 where s.Name like '%".$name."%'
 and s.title like '%".$role."%' && s.display like 'Yes%' &&
 c.memberstatus like 'Yes%' order by s.prog_id asc ";
	#$obj->alert($query_string);
		$query=@mysql_query($query_string)or die(http("STP-1649"));
	
	while($row=@mysql_fetch_array($query)){

	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<td><input name='staff_id[]' id='staff_id' type='checkbox' value='".$row['staff_id']."' />
		<input type ='hidden' name ='".$row['staff_id']."' id='".$row['staff_id']."'>".$inc++."</td>
		<td>".htmlentities($row['Name'])."</td>
		<td>".htmlentities($row['Title'])."</td>
		<td>".htmlentities($row['program_name'])."</td>
		<td>".htmlentities($row['orgName'])."</td>
		<td>".htmlentities($row['Postala and Physical Address'])."</td>
		<td>".htmlentities($row['countryName'])."</td>
		<td >".htmlentities($row['districtName'])."</td>
		<td align='right'>".htmlentities($row['Telno'])."</td>
		<td align='right'>".htmlentities($row['Mobile'])."</td>
		<td>".htmlentities($row['Email'])."</td>
		
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/


$data.="<tr class='evenrow'>
     
    <td colspan=11><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_staff(xajax.getFormValues('district1'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('district1'),'delete_staff','staff_id','staff_id','tbl_staffmembers');return false;\" value='Delete' class='formButtonRed' /></td>
</tr>";
$data.="<table cellspacing='0' ></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_menu_items($MenuCategory,$usergroup){
$obj = new  xajaxResponse();
$_SESSION['MenuCategory']='';
$_SESSION['MenuCategory']=$MenuCategory;
$data.="<form action=".$PHP_SELF." method='post' name='submenu' ID='submenu'>
	<table id='report' width='100%' border='0' cellspacing='1' >
		<tr class=''>
			<td width='' class='' colspan='5'>
				<div id='new_menu_item'></div>
			</td>
		</tr>
		<tr class='evenrow'>
			<td width='' class=''colspan=3>Menu Category <select name='MenuCategory' id='MenuCategory' onchange=\"xajax_view_menu_items(getElementById('MenuCategory').value,'');return false;\" style='width:200px;'><option value=''>-All-</option>";
			$queryrole=mysql_query("select * from tbl_menu_categories where MenuCategory <> '' group by MenuCategory order by Rank asc")or die(http(__line__));
			while($rowrole=FetchRecords($queryrole)){
			$selectedrole=($_SESSION['MenuCategory']==$rowrole['MenuCategory'])?"selected":"";
			$data.="<option value=\"".$rowrole['MenuCategory']."\" ".$selectedrole." >".$rowrole['MenuCategory']."</option>";
			}
			$data.="</select>
			</td>
			<td class='' colspan=3>
			<div style='float:right;'>
				<input name='new_role' onclick=\"xajax_new_menu_items();\" type='button' class='formButton2' value='New Sub-Menu' /> | 
				<input name='' type='button' class='formButton2' value='Export to Excel' />
			</div>
			</td>
		</tr>
		<tr class='evenrow'>
			<td colspan=6>
				<input type='button' class='formButton2' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2' onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
				<input type='button' class='formButton2' TITLE='Edit'   onclick=\"xajax_edit_menu_items(xajax.getFormValues('submenu'));return false;\" value='edit' />| 
				<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('submenu'),'Delete_submenuItem');return false;\" align='left'></td>
			</td>
		</tr>

		<tr class='evenrow2'>
			<th width='50' class=''>No.</th>
			<th class=''>Menu Category</th>
			<th class=''>Menu Item</th>
			<th class=''>Link Code</th>
			<th class=''>Rank</th>
			<th class=''>Action </th>
		</tr>

		";
		$n=1;
		$inc=1;
		$SQL=mysql_query("select s.tbl_menu_itemsId,s.page,s.action,c.MenuCategory as category,s.MenuItem,s.LinkvalCode,s.Rank from tbl_menu_items s left join tbl_menu_categories c on(c.tbl_menu_categoriesId=s.MenuCategory)  where c.MenuCategory like '".$_SESSION['MenuCategory']."%' and s.display like 'Yes%' order by c.MenuCategory,s.Rank,s.tbl_menu_itemsId asc")or die(http(__line__));
		while($row=FetchRecords($SQL)){

		//$obj->assign('tr',"style.backgroundColor", "none");
		//onmouseover=\"style.backgroundColor='#999999';\" onmouseout=\"this.style.backgroundColor='';\" onmouseup=\"this.style.backgroundColor='#999999';\"
		$events1="onmouseover=\"this.style.backgroundColor='#999999';\" onmouseout=\"this.style.backgroundColor='';\"";
		$events2="onmouseup=\"this.style.backgroundColor='#999999';\"";
		$id="tbl_row".$inc;
		$color=$inc%2==1?"evenrow":"white1";
		$data.="<tr height='25' id='tbl_row".$inc."' class='$color' ".$events2." >
			<td width='' ".$events1.">
			<input type='checkbox' name='tbl_menu_itemsId[]' id='tbl_menu_itemsId' value='".$row['tbl_menu_itemsId']."'>".$n++."";
			$data.="</td>
			<td>".$row['category']."</td>
			<td  ".$events1." >".$row['MenuItem']."</td>
			<td ".$events1." >".$row['LinkvalCode']."</td>
			<td align=right  ".$events1.">".$row['Rank']."</td>
			<td align=left ".$events1.">".$row['action']."</td>
		</tr>";
		$inc++;
		/*  $obj->addEvent($id,'onmouseout','style.backgroundColor:none;');
		$obj->addEvent($id,'onmouseover','style.backgroundColor:#999999;');
		$obj->addEvent($id,'onmouseup','style.backgroundColor:#999999;'); */
		}

		$data.="<tr class='evenrow'>
			<td colspan=6>
				<input type='button' class='formButton2' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2' onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
				<input type='button' class='formButton2' TITLE='Edit'   onclick=\"xajax_edit_menu_items(xajax.getFormValues('submenu'));return false;\" value='edit' />| 
				<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('submenu'),'Delete_submenuItem');return false;\" align='left'></td>
			</td>
		</tr>

	</table>
</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function new_menu_items(){
$obj=new xajaxResponse();
$data="<form  name='submenu' id='submenu' method='post' action='".$PHP_SELF."'>
<table cellspacing='1' width='600' border='0' >
<tr class='white1'>
	<td colspan=5>
		<div id='status'></div>
	</td>
</tr>

<tr>
	<th>NO</th>
	<th>Menu Category</th>
	<th >Menu Item</th>
	<th>Rank</th>
	<th>Page</th>
	<th>Action</th>
</tr>";

$n=1;
for($x=0;$x<10;$x++){
	$data.="<tr class='evenrow'>
		<td>".$n."</td>
		<td><input name='loopkey[]' type='hidden' id='loopkey' size='20' value='1'/>
		<select name='category[]' id='category' style='width:200px;'>
		<option value=''>-select-</option>";
		$query=mysql_query("select * from tbl_menu_categories  order by Rank asc")or die(mysql_error());
		while($row=FetchRecords($query)){
		$data.="<option value='".$row['tbl_menu_categoriesId']."%'>".substr($row['MenuCategory'],0,40)."</option>";
		}
		$data.="</select>
		</td>
		<td><input name='menu_item[]' type='text' id='menu_item' size='50' /></td>
		<td><input name='rank[]' type='text' id='rank' size='20' /></td>
		<td><input name='page[]' type='text' id='page' size='20' /></td>
		<td><input name='action[]' type='text' id='action' size='20' /></td>
	</tr>";
$n++;
}


$data.="<tr class='evenrow'>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>
		<div align='right'>
		<input type='button' class='formButton2'name='button' id='button' value='Save' class='button_width' onclick=\"xajax_save_menu_items(xajax.getFormValues('submenu'));return false;\" />
		</div>
	</td>
</tr>

</table>
</form>";

$obj->assign('new_menu_item','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function new_menu_Category(){
$obj=new xajaxResponse();
$data="<form  name='role' id='role' method='post' action='".$PHP_SELF."'>
<table cellspacing='1'      width='600' border='0' >
<tr class='white1'><td colspan=5><div id='status'></div></td>
  </tr>
  <tr>
    <td width='139'>Menu Category</td>
    <td width='289'><input name='Category' type='text' id='Category' size='48.5' />
    <td width='141'>&nbsp;</td>
    <td width='2'></td>
    <td width='13'>&nbsp;</td>

  </tr>
 
  <tr>
    <td>Rank</td>
    <td><input name='rank' type='text' id='rank' size='48.5' /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='left'>
      <input type='button' class='formButton2'name='button' id='button' value='Save' class='button_width' onclick=\"xajax_save_menu_Category(xajax.getFormValues('menu_category'));return false;\" />
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></form>";

$obj->assign('new_menuCategory','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_menu_category($category){
$obj = new  xajaxResponse();
$_SESSION['MenuCategory']='';
$_SESSION['MenuCategory']=$category;
$data.="<form action='".$PHP_SELF."' method='post' name='menu_category' id='menu_category' ><table  id='report'   width='100%' border='0' cellspacing='1' >
<tr class=''>
<td width='' class='' colspan='4'><div id='new_menuCategory'></div></td>
</tr>

<tr class='evenrow'>
	<td ></td>
	<td class='' colspan='2'>
		<div style='float:right;'>
			<input name='new_role' onclick=\"xajax_new_menu_Category();\" type='button' class='formButton2' value='New Menu Category' /> | 
			<input name='' type='button' class='formButton2' value='Export to Excel' />
		</div>
	</td>
</tr>

<tr class='evenrow'>
	<td width='' class=''>Menu Item </td>
	<td colspan='2'>
		<select name='category' id='category'  style='width:200px;' onchange=\"xajax_view_menu_category(getElementById('category').value);return false;\">
		<option value=''>-All-</option>";
		$queryrole=mysql_query("select * from tbl_menu_categories where MenuCategory like '".$_SESSION['MenuCategory']."%' and display = 'Yes'  order by MenuCategory asc")or die(http(__line__));

		while($rowrole=FetchRecords($queryrole)){
		$selectedrole=($_SESSION['MenuCategory']==$rowrole['MenuCategory'])?"selected":"";
		$data.="<option value=\"".$rowrole['MenuCategory']."\" ".$selectedrole." >".$rowrole['MenuCategory']."</option>";
		}
		$data.="</select>
	</td>
</tr>
<tr class='evenrow'>
	<td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
		<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> |
		<input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_menu_category(xajax.getFormValues('menu_category'));return false;\" value='edit' />| 
		<input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('menu_category'),'Delete_menuItem');return false;\"  value='Delete' class='redhdrs' />
	</td>
</tr>
<tr class='evenrow2'>
	<th width='50' class=''>No.</th>
	<th class=''>Menu Category</th>
	<th class='' align='right'>Rank</th>
</tr>";

$n=1;
$inc=1;
$SQL=mysql_query("select * from  tbl_menu_categories where display = 'Yes' order by Rank asc")or die(http(__line__));
while($row=FetchRecords($SQL)){
$color=$inc%2==1?"evenrow":"white1";
$data.="<tr height='25' class='$color'>
	<td width='50'><input type='checkbox' name='tbl_menu_categoriesId[]' id='tbl_menu_categoriesId' value='".$row['tbl_menu_categoriesId']."'>".$n++."</td>
	<td>".$row['MenuCategory']."</td>
	<td align='right'>".$row['Rank']."</td>
	</tr>";
$inc++;

}

$data.="<tr class='evenrow'>
	<td colspan=5>
		<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
		<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
		<input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_menu_category(xajax.getFormValues('menu_category'));return false;\" value='edit' />| 
		<input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeleteOnSetup(xajax.getFormValues('menu_category'),'Delete_menuItem');return false;\" value='Delete' class='redhdrs' />
	</td>
</tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
#----------------------------end of menu------------------------
#----------------------------userpermissions--------------------
function UserPermissions($Key){
$obj = new xajaxResponse();
/*if(!isset($Key))$Key='';*/
if(!isset($data))$data='';
else $data='';

//$obj->alert($Key);						

$query_tbl_user_groups = "select * from `tbl_role`  where display = 'Yes' order by `role_name` asc";
$usergrp = @Execute($query_tbl_user_groups) or die(http(__line__));
$query_MenuCategorys= "select * from `tbl_menu_categories` where display = 'Yes'  order by `Rank`,`MenuCategory`";
$MenuCategorys = @Execute($query_MenuCategorys)or die(http(__line__));

$_SESSION['grpName']='';
$i=1;
 $data.="<form name='myform' id='myform' method='post' action='".$PHP_SELF."'><table width='100%' align='center'  border='0' cellpadding='2' cellspacing='1'>
 	<tr>
        <tH  class=''  colspan='2'> User Role  <select name='PermitGroup' id='PermitGroup'
		 onChange=\"xajax_UserPermissions(this.value)\" size='1'><option value=''><strong>- select a Role -</strong></option>";
        while ($rows_usergrp=FetchRecords($usergrp))
						{
							$grpCode=$rows_usergrp['role_id'];
							$grpName=$rows_usergrp['role_name'];
							
							$selrole=($grpCode==$Key)?"selectED":"";
							 $data.="<option value=\"".$grpCode."\" ".$selrole.">".$grpName."</option>";
					}
        $data.=" </select></tH>
      </tr>
	  <tr>
        <td class='evenrow'  colspan='2'>Please <strong>Check</strong> or <strong>UnCheck</strong> to <strong>Grant</strong> or <strong>Deny/Revoke</strong> access and save</td>
      </tr>
	   <tr class='evenrow'>
     
    <td colspan=2><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> </tr>
	  ";
   	while ($rows_menuC=FetchRecords($MenuCategorys))
						{
							$MenuCategory=$rows_menuC['MenuCategory'];
							$MenuCategory_id=$rows_menuC['tbl_menu_categoriesId'];
							
							
							
							//$tableName=$rows_menuC['tableName'];

$query_MenuItems= "select i.tbl_menu_itemsId, i.MenuCategory, i.MenuItem, p.MenuItem as pMenuItem, i.LinkvalCode, i.Rank 
from `tbl_menu_items`  i
left join `tbl_permisions` p on (p.MenuItem = i.tbl_menu_itemsId 
AND p.role_id ='".$Key."')
where i.MenuCategory ='".$MenuCategory_id."' 
and `i`.`display` = 'Yes'
group by i.tbl_menu_itemsId, i.MenuCategory, i.MenuItem, p.MenuItem , i.LinkvalCode, i.Rank 
order by i.`Rank`,i.`MenuItem`";
//$obj->alert($query_MenuItems);
$MenuItems = @Execute($query_MenuItems) or die(http(__line__));
//Left join `tbl_permisions` pi on (p.role_id = pi.role_id)
 
        $data.="<tr>
		<td colspan='2' class='evenrow'  width='780'><strong>$MenuCategory</strong></td>
      </tr>";
        $data.="<tr class='evenrow3'>
		<td class='lineup'>No.</td>
		<td class='lineup'>Main Page(Menu)</td>
      </tr>";


   	while ($rows_MenuI=FetchRecords($MenuItems))
						{
							$ID=$rows_MenuI['tbl_menu_itemsId'];
							$MenuItem=$rows_MenuI['MenuItem'];
							$pMenuItem=$rows_MenuI['pMenuItem'];
							$LinkvalCode=$rows_MenuI['LinkvalCode'];
							
$events2="onmouseup=\"this.style.backgroundColor='#F0E5A5';\"";
		
	if($i%2!=0)$data.=" <tr class='bluepale' ".$events2.">";
	else $data.=" <tr class=''  ".$events2.">";
		$data.="<td align='right'>".$i."</td><td>";
	 $data.="<input type='checkbox' name='MenuItem[]'"; 
		if($ID!=$pMenuItem)  $data.=""; 
		else  $data.="checked='checked'"; 
		 $data.="value='".$ID."' />  ".$MenuItem."<br>";
		 
		 
      $data.="</td></tr> "; $i++;
	   }
	   }
 $data.="
 
 <tr class='evenrow'>
     
    <td colspan=2><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> </tr>
 <tr>
        <td colspan='1' >&nbsp;</td>
        <td align='right'>
		 <input  type='button' 'name='Save' id='Save' value='Save'  
   onclick=\"xajax_SavePermissions(xajax.getFormValues('myform'));return false;\" class='button_width' />

		  
		  </td>
      </tr>
    </table></form>";
	
$obj->assign("bodyDisplay","innerHTML",$data);
$obj->call("hideLoadingDiv");
return $obj;

}
#---------------------------end of userpermissions----------------
//--------------------------program/Unit Managers-------------------
function new_staff(){
$obj=new xajaxResponse();
$data="

<div id='login'><table cellspacing='0'      width='600'><tr><td><form name='organization' id='organization'>
<table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
              <tr>
                <td>Name</td>
                <td colspan='2'><input name='name' type='text' id='name' size='80' /></td>
              </tr>
              <tr>
                <td>Title</td>
                <td colspan='2'><input name='title' type='text' id='acronym' size='80' /></td>
              </tr>
			  
              <tr>
                <td>Program</td>
                <td colspan='2'><select name='programme' id='programme' style='width:390px;'><option value='N/A'>-N/A-</option>";
	$queryzone=mysql_query("select * from tbl_programme where memberstatus like 'Yes%' order by countryName  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['countryCode']."'>".$rowzone['countryName']."</option>";
	  }
	  $unit=mysql_query("select * from tbl_unit ")or die(http(__line__));
	while($rowunit=FetchRecords($unit)){
	
      $data.="<option value='".$rowunit['unitName']."'>".$rowunit['countryName']."</option>";
	  }
	  $data.="</select></td>
              </tr>
			  
			   <tr>
                <td>Unit</td>
                <td colspan='2'><select name='unit' id='unit' style='width:390px;'><option value='N/A'>-N/A-</option>";
	$queryzone=mysql_query("select * from tbl_programme where memberstatus like 'Yes%' order by countryName  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['countryCode']."'>".$rowzone['countryName']."</option>";
	  }
	  $unit=mysql_query("select * from tbl_unit ")or die(http(__line__));
	while($rowunit=FetchRecords($unit)){
	
      $data.="<option value='".$rowunit['unitName']."'>".$rowunit['countryName']."</option>";
	  }
	  $data.="</select></td>
              </tr>
            
              <tr>
                <td>Country:</td>
                <td colspan='2'><select name='country' id='country' style='width:390px;'><option value=''>-select-</option>";
	$queryzone=mysql_query("select * from tbl_country where memberstatus like 'Yes%' order by countryName  asc")or die(http(__line__));
	while($rowzone=FetchRecords($queryzone)){
	
      $data.="<option value='".$rowzone['countryCode']."'>".$rowzone['countryName']."</option>";
	  }
	  $data.="</select></td>
              </tr>
			  
			  
			 <tr>
    <td>District/Municipality:</td>
    <td><select name='district' id='district' >";
	if($_SESSION['districtCode']<>''){

     $q=mysql_query("select * from tbl_district where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowd=FetchRecords($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";

	}
	
	}
	else
	{
	
	
      $data.="<option>-select-</option>";
     $q=mysql_query("select * from tbl_district  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowd=FetchRecords($q)){
      $data.="<option value='".$rowd['districtCode']."'>".$rowd['districtName']."</option>";
	
	 }
	 }
	 

       $data.="</select></td>
  </tr>
   <tr style='display:none;'>
    <td>Subcounty/Division:</td>
    <td><select name='subcounty' id='subcounty' >";
	if($_SESSION['districtCode']<>''){/*  
      $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where subcountyCode='".$_SESSION['subcountyCode']."' order by 1 asc")or die(http(__line__));
	  while($rowsubcounty=FetchRecords($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"selectED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 }else { 
	  */
	  $data.="<option>-select-</option>";
      $qsubcounty=mysql_query("select * from tbl_subcounty  where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowsubcounty=FetchRecords($qsubcounty)){
	  $selsubcounty=($_SESSION['subcountyCode']==$rowsubcounty['subcountyCode'])?"selectED":"";
      $data.="<option value='".$rowsubcounty['subcountyCode']."' '".$selsubcounty."'>".$rowsubcounty['subcountyName']."</option>";
	
	 
	 }
	 
	 
	 }

        $data.="</select></td>
  </tr>
 <tr style='display:none;'>
    <td>Parish/Ward:</td>
    <td><select name='parish' id='parish' ><option value='' >-select-</option>";
	if($_SESSION['districtCode']<>''){
     
      $qparish=mysql_query("select * from tbl_parish where districtCode='".$_SESSION['districtCode']."' order by 1 asc")or die(http(__line__));
	  while($rowparish=FetchRecords($qparish)){
	  #$selparish=($_SESSION['parishCode']==$rowparish['parishCode'])?"selected":"";
      $data.="<option value='".$rowparish['ParishCode']."' '".$selparish."'>".$rowparish['ParishName']."</option>";
	
	 
	 }
	 }

        $data.="
                </select></td>
  </tr>

              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'><label>
                  <select name='orgtype' id='orgtype' style='width:390px;'><option value='' >-select organization-</option>";
				   $query=mysql_query("select * from tbl_lookup where classCode=1 order by codeName Asc")or die("Sunrise Error-Code-0057 because, ".mysql_error());
				  
				  while($row=FetchRecords($query)){
				  $selovc=($row['code']=='98')?"selected":"";
				  $data.="<option value='".$row['code']."' '".$selovc."' >".$row['codeName']."</option>";
				  }
                  $data.="</select>
                  </label></td>
              </tr>
			 
			  
			  
			  <tr>
                <td>Desired Username:</td>
                <td colspan='2'><label>
                  <input name='username' id='username' type='text' size='80' />
                  </label></td>
              </tr>
			  <tr>
                <td>Password:</td>
                <td colspan='2'><label>
                  <input name='password' type='password' size='80' />
                  </label></td>
              </tr>
              </table>
			  		  
         <fieldset><legend class='green_field'>Contact Details</legend>
		 <table cellspacing='0'      width='445' border='0' id='contacts'>
		 <tr>
        <td width='125'>Physical and Postal Address:</td>
      <td width='287'><textarea name='address' cols='77' rows='3'></textarea></td>
    </tr>
           <tr>
             <td width='125'>Website:</td>
      <td width='287'><input name='website' type='text' id='website' size='80' /></td>
    </tr>
	<tr>
             <td width='125'>Fax:</td>
      <td width='287'><input name='fax' type='text' id='fax' size='80' value='' /></td>
    </tr>
           <tr>
             <td>Contact Person 1:</td>
      <td><input name='contact_person' type='text' id='contact_person' size='80' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title' type='text' id='title' size='80' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><input name='telephone' type='text' id='telephone' size='80' value='+2' /></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td><input name='mobile' type='text' id='mobile' size='80' value='+2' /></td>
    </tr>
	 
  </table>
  </fieldset>
         
       <table cellspacing='0'      width='500' border='0'>
	   <tr><td colspan=2><div id='status'></div></td></tr>
         <tr>
           <td COLSPAN=2>&nbsp;</td>
      <td><label>
        <div align='right'>
          <input type='button' class='formButton2'name='save_organization' class='button_width' id='save_organization' onclick=\"xajax_save_organization(xajax.getFormValues('organization'));return false;\" value='Save' />
          </div>
      </label></td>
    </tr>
  </table></form></td></tr></table></div>";



$obj->assign("bodyDisplay","innerHTML",$data);
$obj->call("hideLoadingDiv");
return $obj;
}
//-----------------------workplan setup-----------------------------------------
function close_workplan(){
 $obj=new xajaxResponse();
 $objPagination=new pagination();
if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;
}
 $data="<form name='workplan_setup' id='workplan_setup' method='post' >
 
<table cellspacing='0'      width='700' border='0' align=left>
  <tr>
    <th scope='col'>Project Closing Date/Year</th>";
	
	
	//$currProjectYear=@mysql_fetch_array(mysql_query($query));
	//$currProjectYear['closure_year']
    $data.="<th scope='col'><span style='font-weight:bold;'>";
	$objPagination->__Fetch__Execute($sql="select * from tbl_workplan_setup where status like 'Open'",'closure_year');
	$data.="</span></th>
  </tr>
  
  <tr>
    <td>Project/Program Start Year</td>
    <td><span style='font-weight:bold;'>
      <select name='projectstartYear' id='projectstartYear' style='width:200px'><option value=''>-select-</option>
        ".YeardropDown(2008);
		$data.="
      </select>
    </span></td>
  </tr>
  <tr>
    <td>Project/Program End Year</td>
    <td><select name='endofProject' id='endofProject' style='width:200px'><option value=''>-select-</option>".YeardropDown(2008);
    /*  $yr = date('Y'); $end=$yr;
		do{
	$data.="<option value=\"".$end."\" >".$end."</option>
      ";
				 $end--;
				} while($end>=2009); */
                $data.="<option value='Closed'>Close Workplan</option>
    </select>
    </td>
  </tr>
 
  <tr>
    <td>Date of Closure:</td>
    <td><a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.workplan_setup.closuredate);return false;' hidefocus=''>
      <input name='closuredate' type='text'  size='27' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
  </tr>
  <tr>
    <td>Interval of Setting Targets:</td>
    <td><select name='interval' id='interval' style='width:200px'>
	<option value=''>-select-</option>
     <option value='1'>Annually</option>
	 <option value='2'>Bi-Annually</option>
	 <option value='4'>Quarterly</option>
	 <option value='0'>Once in Project Life</option>
    </select></td>
  </tr>"; 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><div class='submitDiv'><input type='button' class='formButton2'value='Save' name='saveworkplanSetup' 
	 id='saveworkplanSetup' 
	onclick=\"xajax_save_workplan_setup(xajax.getFormValues('reporting'));\"  class='button_width' /></div></td>
  </tr>
  
</table>
</form>"; 

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function save_workplan_setup($formvalues){
 $obj=new xajaxResponse();

$projectstartYear=$formvalues['projectstartYear'];
$endofProject=$formvalues['endofProject'];
$closuredate=$formvalues['closuredate'];
$interval=$formvalues['interval'];
#$obj->alert($quarter);
$closuredate=$formvalues['closuredate'];
#$obj->alert($chdate);
$user=$_SESSION['username'];
if($endofProject=='Close Workplan'){
$objPagination->Execute("update tbl_workplan_setup set status='Closed',closure_year='Closed',closure_date='Closed' where status like 'Open%' ");
//or die("Error-code 4492 because,".mysql_error());


}

/* $obj->assign("submitButton","value","continue ->");
		$obj->assign("submitButton","disabled",false); */
else
{
 //
 $objPagination->Execute("update tbl_workplan_setup set status='Closed',closure_year='Closed',closure_date='Closed' where status like 'Open%' ");

Execute("update tbl_active set status='Closed',quarter='Closed',year='Closed' where status like 'Open%'")or die("Error-code 4500 because,".mysql_error());


}

$obj->call('xajax_open_workplan_setup',$user,$projectstartYear,$endofProject,$closuredate,$interval);
return $obj;
}
function open_workplan($user,$projectstartYear,$endofProject,$closuredate,$interval){
  $obj=new xajaxResponse();
    $objPagination=new pagination();
 $x="insert into tbl_workplan_setup
 (`opening_year`, `closure_year`, `closing_date`, `target_setting_interval`,`updatedby`)
  values('".$projectstartYear."','".$endofProject."','".$closuredate."','".$interval."','".$user."')";
$objPagination->Execute($x)or die("Error-code 4522 because,".mysql_error());
#$obj->alert($x);
  $obj->assign('bodyDisplay','innerHTML',congMsg("Workplan Configuration successful!"));
  $obj->call("hideLoadingDiv");
  $obj->redirect('logout.php');
return $obj;
 }

#************************************
$xajax->processRequest();

  ?>


<html>
<head>
    <?php $xajax->printJavascript('xajax_0.5/');

    ?>
    <script language="javascript" type="text/javascript" src="js/check.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <title><?php heading($_GET['action']); ?></title>
    <script type="text/javascript" src="js/number.js"></script>
	<script type="text/javascript" src="js/calc.js"></script>
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
	<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
    <script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM System Setups...</span></div>
<table width="870" border="0" align="center" id="content_" >
	<tr>
		<td colspan="2" valign="top"><?php require_once('connections/header.php'); ?></td>
	</tr>
	
	<tr>
		<td class='sd-menu-container' style="display:none;" width="190" valign="top">
		
			<table width="190" border="0" >
				<tr>
					<td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
				</tr>
			</table>
		</td>
		
		<td width="660" valign="top" style="background-color: #F8F5EC;" >

		 <?php title($_GET['linkvar'],$_GET['action']);   ?>
			<div id="bodyDisplay">
				<script language="JavaScript" type="text/javascript">

					<?php
					if(!isset($FunctionName))$FunctionName='';
								else $FunctionName='';
								if(!isset($Arguments))$Arguments='';
								else $Arguments='';
					$linkvar='';
					$linkvar=$_GET['linkvar'];
					$FunctionName=$_GET['FunctionName'];
					$Arguments=$_GET['Arguments'];

					switch($_GET['linkvar']){
						case "Frequently Asked Questions":
						?>

						xajax_view_questions('');
						<?php
						break; 
						case "User Comments":
						?>
						xajax_view_comments('');
						<?php
						break;
						case "Send Email":
						?>

						xajax_mail2('');


						<?php
						break;
						case "System Users":
						?>

						xajax_view_users('','','','',1,20);


						<?php 

						break;
						case "User Group":
						?>

						xajax_view_usergroup('');


						<?php 

						break;
						case "Database Backup Log":
						?>

						xajax_system_backup();


						<?php 

						break;
						case "Change Theme":

						?>

						xajax_changeTheme();

						<?php break;
						case "Reporting Periods":

						?>

						xajax_close_reporting();

						<?php break;
						case "Change Password":
						?>

						xajax_change_password();

						<?php 

						break;
						case"Related Links":
						?>

						xajax_view_relatedLink('');


						<?php 

						break;
						case"Related Links Administrator":
						?>

						xajax_view_relatedLinkAdmin('');


						<?php 

						break;

						case"System Logins":
						?>
						xajax_view_login('','','','',1,20);
						<?php 
						break;
						case"Update Home Page":
						?>
						xajax_view_home('');
						<?php 
						break;
						case"Documents":
						?>
						xajax_view_documents('');

						<?php
						break;
						case "View District":
						?>
						xajax_view_district('','',1,10);

						<?php

						break;
						case "View Subcounty":
						?>
						xajax_view_subcounty('','','',1,20);

						<?php

						break;
						case "View Parish":
						?>
						xajax_view_parish('','','','',1,20);

						<?php

						break;
						case "View Municipality":
						?>
						xajax_view_municipality("",1,20);

						<?php

						break;


						case "Change Themes":

						underConstruction("Under Construction!");


						break;
						case"New Document":
						?>

						xajax_view_document_admin();

						<?php
						break;

						case"List of Institutions":
						?>
						xajax_view_organization('','','',1,20);  

						<?php 
						break;
						case"Zonal Mapping";
						?>
						xajax_view_zonalMapping('','');

						<?php
						break;
						case"User Role";
						?>
						xajax_view_role('','');

						<?php
						break;
						case"Staff Directory";
						?>
						xajax_view_staffMembers('','','','','');

						<?php
						break;

						case"New Menu Item";
						?>
						xajax_view_menu_category('','');

						<?php
						break;

						case"Workplan Setup";
						?>
						xajax_close_workplan();

						<?php
						break;



						case"New Dropdown List";
						?>
						xajax_view_dropdownList('','');

						<?php
						break;
						case"New Sub-Menu Item";
						?>
						xajax_view_menu_items('','');

						<?php
						break;
						case"User Permissions";
						?>
						xajax_UserPermissions('');

						<?php
						break;

						case"Staff Members";
						?>
						xajax_view_staffMembers('','','','','');

						<?php
						break;
						case"Country Mapping";
						?>
						xajax_view_countries('','','',1,20);
					
					<?php 
						break;


						default: ?>
						
					<?php } ?>

				</script>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>

<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199"></iframe>
</body>
</html>

