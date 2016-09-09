<?php
session_start();
require_once('connections/lib_connect.php');




require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);
#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_organization');
$xajax->register(XAJAX_FUNCTION,'new_organization');
$xajax->register(XAJAX_FUNCTION,'save_organization');
$xajax->register(XAJAX_FUNCTION,'edit_organization');
$xajax->register(XAJAX_FUNCTION,'update_organization');
$xajax->register(XAJAX_FUNCTION,'updateOrganization');
$xajax->register(XAJAX_FUNCTION,'delete_organization');
$xajax->register(XAJAX_FUNCTION,'search_org');
$xajax->register(XAJAX_FUNCTION,'view_all');
$xajax->register(XAJAX_FUNCTION,'UpdateOrganizationStatus');
#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');

function view_organization($subcomponent,$subsector,$orgname,$orgtype,$district,$data=""){
$obj = new xajaxResponse();

$n=1; $inc=1;
$_SESSION['orgname1']='';
$_SESSION['orgtype1']='';
$_SESSION['district1']='';
$_SESSION['subsectororg']='';
$_SESSION['subcomponentorg']='';
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['subsectororg']=$subsector;
$_SESSION['subcomponentorg']=$subcomponent;

$data.="<fieldset class='white1'>
<form name='organization' id='organization'   action='?' method='post'>
<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'> ".filter_organization()." 

<tr class='evenrow'>     
<td colspan=11>
<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | 
<input type='button' title='Edit'  onclick=\"xajax_edit_organization(
xajax.getFormValues('organization'));return false;\" value='edit' />| 
<input type='button' title='Delete'  onclick=\"ConfirmDelete(
xajax.getFormValues('organization'),'delete_organization','');return false;\" value='Delete' class='redhdrs'/>
</td>
</tr>

<tr>
<th colspan='11'>ORGANIZATIONAL DETAILS</th>
</tr>

<tr>
<th class='first-cell-header'>#</th>
<th>ORGANIZATION NAME</th>
<th>ACRONYM</th>
<th>DISTRICT OF OPERATION</th>
<th>ORGANIZATION TYPE</th>
<th>CONTACT PERSON</th>
<th>TELEPHONE</th>
<th>EMAIL ADDRESS</th>
<th>STATUS</th>
<th colspan='2' class='largest-cell-header'>ACTION</th>

</tr>";
$query_string="select * from tbl_organization where  subsector like '%".$_SESSION['subsectororg']."%' and subcomponent like '%".$_SESSION['subcomponentorg']."%' and lower(orgName) like '".strtolower($_SESSION['orgname1'])."%'&& lower(orgtype) like '".strtolower($_SESSION['orgtype1'])."%'&& lower(district) like '".strtolower($_SESSION['district1'])."%' group by orgName order by orgName Asc";
$query_=mysql_query($query_string)or die(http(__line__));
while($row=mysql_fetch_array($query_)){
$telno=(strlen($row['telephone'])>=10)?"<td>+".$row['telephone']."</td>":"<td align='center'></td>";
$mobile=(strlen($row['mobile'])>=10)?"<td>+".$row['mobile']."</td>":"<td align='center'></td>";

$data.="<tr>
	<td>".$inc++."<input name='org_code12[]' id='org_code12' type='checkbox' value='".$row['org_code']."' /></td>
	<td><input name='".$row['org_code']."' id='".$row['org_code']."' type='hidden' value=''/>".mysql_real_escape_string($row['orgName'])."
	</a>
	</td>
	<td>".$row['acronym']."</td>
	<td>".$row['district']."</td>

	<TD>".$row['organization_type']."</TD>
	
	<td>".$row['contact_person']."</td>
	
	".$telno."
	
	<td>".$row['emailAddress1']."</td>
	
	<td>
	<select name='letter_variable' id='letter_variable' 
	onchange=\"xajax_UpdateOrganizationStatus(this.value,'".$row['org_code']."','status');return false;\" >
	<option value='' >-status-</option>";

	$data.=QueryManager::LookupFilter($classCode=31,$codeName=$row['status']);
	$data.="</select>
	</td>

	<td>
		<a href='#' onclick=\" xajax_view_all('".$row['org_code']."');\" class='greenlinks2'>
			<input name='' type='button' value='Details'>
		</a>
	</td>
</tr>";
$n++;
}

$data.="<tr class='evenrow'>
<td colspan='13'>
<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
<input type='button' title='Edit'  onclick=\"xajax_edit_organization(xajax.getFormValues('organization'));return false;\" value='edit' />|
<input type='button' title='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('organization'),'delete_organization','');return false;\" value='Delete' class='redhdrs' />
</td>
</tr>
</table>
</form>
</fieldset>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;
 }
function view_all($org_code){
$obj=new xajaxResponse();
$query=mysql_query("select * from tbl_organization where org_code='".$org_code."' order by orgName ASC")or die(mysql_error());
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
             <td colspan=2 align=center><input type='button' Value='Cancel' onclick=\"xajax_view_organization('','','','','');return false;\" Title='Close'>|<input type='button' class='evenrow' Value='Edit' title='Edit' name='Edit' disabled='disabled' onclick=\"xajax_edit_organization(xajax.getFormvalues('organization'))\">|<input type='button'  class='evenrow' title='Delete' disabled='disabled' value='Delete' class='redhdrs'></td>
      <td></td>
    </tr>";
	
	

	
  $data.="</table>
 
         
       </form></td></tr></table>
<p>&nbsp;</p>
</div>";
}

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function new_organization(){
$obj=new xajaxResponse();
$data="
<table width='670' border='0'>
  <tr>
    <td class='green_field'>Data Entry &raquo; New Organization Details</td>
  </tr>
  <tr>
    <td><hr size='1' color='orange' align='left'width='640'/></td>
  </tr>
</table>

<div id='login'><table width='600'><tr><td><form name='organization' id='organization'><table width='600' border='0' id='organizational_details'>
              
              <tr>
                <td>Name of Organization</td>
                <td colspan='2'><input name='orgname' type='text' id='orgname' size='60' /></td>
              </tr>
              <tr>
                <td>Acronym</td>
                <td colspan='2'><input name='acronym' type='text' id='acronym' size='32' /></td>
              </tr>
              <tr style='display:none;'>
                <td>Registered?</td>
                <td width='131'><label>
                  <input type='radio' name='registered' id='Yes' value='Yes' />
                  Yes</label></td>
                <td width='319'><label>
                  <input type='radio' name='registered' id='No' value='No' />
                  No</label></td>
              </tr>
           <tr style='display:none;'>
                <td>Registration Number:</td>
                <td colspan='2'><input name='regno' type='text' id='regno' size='32' /></td>
              </tr>
              <tr>
                <td>District of Operation:</td>
                <td colspan='2'><select name='district' id='district'><option value=''>-select district-</option>";
				$select="select districtCode,districtName from tbl_district group by districtName order by districtName Asc";
				//$obj->alert($select);
				$query2=mysql_query($select)or die(http(__line__));
				while($row2=mysql_fetch_array($query2)){ 
	$data.="<option value='".$row2['districtName']."'>".$row2['districtName']."</option>";
	}
			
                  $data.="</select></td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'><label>
                  <select name='orgtype' id='orgtype'><option value=''>-select organization-</option>";
				   $query=mysql_query("select * from tbl_lookup where classCode=1 order by codeName Asc")or die(http(__line__));
				  
				  while($row=mysql_fetch_array($query)){
				  $data.="<option value='".$row['code']."'>".$row['codeName']."</option>";
				  }
                  $data.="</select>
                  </label></td>
              </tr>
              <tr style='display:none;'>
                <td>Vision:</td>
                <td colspan='2'><textarea name='vision' id='vision' cols='45' rows='3'></textarea></td>
              </tr>
              <tr style='display:none;'>
                <td>Mission:</td>
                <td colspan='2'><textarea name='mission' id='mission' cols='45' rows='3'></textarea></td>
              </tr>
              <tr style='display:none;'>
                <td>Objectives:</td>
                <td colspan='2'><label>
                  <textarea name='objectives' id='objectives' cols='45' rows='3'></textarea>
                  </label></td>
              </tr>
			  <tr>
                <td>Sub-Component:</td>
                <td colspan='2'><label>
                  <select name='subcomponent[]' size='5' multiple='multiple'><option value=''>-Select-</option><option value='All Subcomponents'>All Subcomponents</option>";
		$q=mysql_query("select * from tbl_subcomponent order by id asc")or die(http(__line__));
  while($row=mysql_fetch_array($q)){ 
				  $data.="<option value='".$row['subcomponent']."'>".$row['subcomponent']."</option>";
				  }
				  $data.="</select>
                  </label></td>
              </tr>
			  <tr>
                <td>Sub-sector:</td>
                <td colspan='2'><label>
                  <select name='subsector[]' size='5' multiple='multiple'><option value=''>-Select-</option>";
		$q1=mysql_query("select * from tbl_subsector order by subsector_id asc")or die(http(__line__));
  while($row=mysql_fetch_array($q1)){ 
				  $data.="<option value='".$row['subsector']."'>".$row['subsector']."</option>";
				  }
				  $data.="</select>
                  </label></td>
              </tr>
			  <tr>
                <td>Desired Username:</td>
                <td colspan='2'><label>
                  <input name='username' id='username' type='text' size='32' />
                  </label></td>
              </tr>
			  <tr>
                <td>Password:</td>
                <td colspan='2'><label>
                  <input name='password' type='password' size='32' />
                  </label></td>
              </tr>
              </table>
			  		  
         <fieldset><legend class='green_field'>Contact Details</legend><table width='445' border='0' id='contacts'>
		 <tr>
             <td width='125'>Physical and Postal Address:</td>
      <td width='287'><textarea name='address' cols='45' rows='3'></textarea></td>
    </tr>
           <tr>
             <td width='125'>Website:</td>
      <td width='287'><input name='website' type='text' id='website' size='32' /></td>
    </tr>
           <tr>
             <td>Contact Person 1:</td>
      <td><input name='contact_person' type='text' id='contact_person' size='32' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title' type='text' id='title' size='32' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><select name='tel_code' id='tel_code'><option value=''>-Select-</option><option value='256'>+256</option>
        </select>
        <input name='telephone' type='text' id='telephone' size='21' /><br/></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td><label>
        <select name='mob_code' id='mob_code'><option value=''>-Select-</option><option value='256'>+256</option>
      </select></label>
        <label><input name='mobile' type='text' id='mobile' size='21' />
        </label></td>
    </tr>
	<tr>
             <td>Email Address:</td>
      <td>
        <label><input name='emailAddress1' type='text' id='emailAddress1' size='40' />
        </td>
    </tr>
	 <tr class='evenrow'>
             <td>Contact Person 2:</td>
      <td><input name='contact_person2' type='text' id='contact_person2' size='32' /></td>
    </tr>
    <tr class='evenrow'>
             <td>Title:</td>
      <td><input name='title2' type='text' id='title2' size='32' /></td>
    </tr>
        <tr class='evenrow'>
             <td>Telephone No.:</td>
      <td><select name='tel_code2' id='tel_code2'><option value=''>-Select-</option><option value='256'>+256</option>
        </select>
		<label>
         <input name='telephone2' type='text' id='telephone2' size='21' /></label></td>
    </tr>
     <tr class='evenrow'>
             <td>Mobile No.:</td>
      <td><label>
        <select name='mob_code2' id='mob_code2'><option value=''>-Select-</option><option value='256'>+256</option>
      </select> </label><label>
        <input name='mobile2' type='text' id='mobile2' size='21' />
        </label></td>
    </tr>
 <tr class='evenrow'>
             <td>Email Address:</td>
      <td>
        <label><input name='emailAddress2' type='text' id='emailAddress2' size='40' />
        </td>
    </tr>
	 <tr>
             <td>Contact Person 3:</td>
      <td><input name='contact_person3' type='text' id='contact_person3' size='32' /></td>
    </tr>
           <tr>
             <td>Title:</td>
      <td><input name='title3' type='text' id='title3' size='32' /></td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td><label> <select name='tel_code3' id='tel_code3'><option value=''>-Select-</option><option value='256'>+256</option>
        </select></label><label>
         <input name='telephone3' type='text' id='telephone3' size='21' /></label></td>
    </tr>
           <tr>
             <td>Mobile No.:</td>
      <td><label>
        <select name='mob_code3' id='mob_code3'><option value=''>-Select-</option><option value='256'>+256</option>
      </select></label>
          <label> <input name='mobile3' type='text' id='mobile3' size='21' /></label>
        </label></td>
    </tr>
	
	<tr>
             <td>Email Address:</td>
      <td>
        <label><input name='emailAddress3' type='text' id='emailAddress3' size='40' />
        </td>
    </tr>
  </table>
  </fieldset>
         
       <table width='500' border='0'>
	   <tr><td colspan=2><div id='status'></div></td></tr>
         <tr>
           <td>&nbsp;</td>
      <td><label>
        <div align='right'>
          <input type='button' name='save_organization' id='save_organization' onclick=\"xajax_save_organization(xajax.getFormValues('organization'));return false;\" value='Save' />
          </div>
      </label></td>
    </tr>
  </table></form></td></tr></table></div>";



$obj->addAssign("bodyDisplay","innerHTML",$data);
return $obj;
}
function UpdateOrganizationStatus($formvalues,$id,$column){
		$obj=new xajaxResponse();
		$query=@Execute("update tbl_organization set ".$column."='".$formvalues."' where org_code='".$id."' ") or die(http("Edit-0036"));
		
		if($query){
		$obj->alert($column." Changed to ".$formvalues."!");
				}
		return $obj;
}

//$xajax->processRequests();
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
    <script type="text/javascript" src="js/addRow.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
    <script type="text/javascript" src="js/loading.js" language="javascript"></script>
    <script type="text/javascript" src="js/check.js" language="javascript"></script>
    <script type="text/javascript" src="js/popup.js" language="javascript"></script>
    <script type="text/javascript" src="js/js.js" language="javascript"></script>
    <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    <script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
    <script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>
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
                                    case "View Organizations":
                                ?>
                    xajax_view_organization('','','','','',''); 

                    <?php

                      break;

                      default:

                           #underConstruction("Under Construction!");

                               }

                    ?>
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
