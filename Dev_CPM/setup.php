<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);

require_once('permission_filters.php');

#************************
#registering functions
#****************************************
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
#-------------USERS---------------------
$xajax->register(XAJAX_FUNCTION,'new_user');
$xajax->register(XAJAX_FUNCTION,'add_user');
$xajax->register(XAJAX_FUNCTION,'view_users');
$xajax->register(XAJAX_FUNCTION,'search_users');
$xajax->register(XAJAX_FUNCTION,'edit_users');
$xajax->register(XAJAX_FUNCTION,'update_users');
$xajax->register(XAJAX_FUNCTION,'updateusers2');
$xajax->register(XAJAX_FUNCTION,'delete_user');
$xajax->register(XAJAX_FUNCTION,'deleteuser');
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
$xajax->register(XAJAX_FUNCTION,'view_relatedLinks');

$xajax->register(XAJAX_FUNCTION,'edit_relatedLink');
$xajax->register(XAJAX_FUNCTION,'delete_relatedlink');
#-------------DOCUMENTS-----------------
$xajax->register(XAJAX_FUNCTION,'view_documents');
$xajax->register(XAJAX_FUNCTION,'new_document');
$xajax->register(XAJAX_FUNCTION,'view_document_admin');
$xajax->register(XAJAX_FUNCTION,'edit_document');
$xajax->register(XAJAX_FUNCTION,'delete_documents');
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
$xajax->register(XAJAX_FUNCTION,'faqs2');
$xajax->register(XAJAX_FUNCTION,'view_faqs');
$xajax->register(XAJAX_FUNCTION,'faqAnswer');
$xajax->register(XAJAX_FUNCTION,'view_all');
$xajax->register(XAJAX_FUNCTION,'view_questions');
#---------------view~_district----------------
$xajax->register(XAJAX_FUNCTION,'new_district');
$xajax->register(XAJAX_FUNCTION,'save_district');
$xajax->register(XAJAX_FUNCTION,'view_district');
$xajax->register(XAJAX_FUNCTION,'edit_district');
$xajax->register(XAJAX_FUNCTION,'update_district');
$xajax->register(XAJAX_FUNCTION,'updatedistrict2');
$xajax->register(XAJAX_FUNCTION,'delete_district');
$xajax->register(XAJAX_FUNCTION,'SystemLog');
#-------------------delete document----------------





#*************************************


#-------------END-----------------------------
require_once('save.php');
require_once('edit.php');
require_once('delete.php');
#---------------------------------------------------
#view_usergroup
#new_usergroup
#---------------------------------------------------

#------------------Village Agents SetUp-------------








function view_documents($docType,$docFY,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['docType']=$docType;
$_SESSION['docFY']=$docFY;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$docType=($_SESSION['docType']<>''?$_SESSION['docType']:$docType);
$docFY=($_SESSION['docFY']<>''?$_SESSION['docFY']:$docFY);
$data='';

$data.="<form  name='frm_documents' id='frm_documents' method='post' action='".$_SERVER['PHP_SELF']."'>
<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>
<tr>
<td colspan='8'>
<select name='docType'  id='docType' onchange=\"xajax_view_documents(
'".$_SESSION['docType']."',
'".$_SESSION['docFY']."',
1,20
); return false;\" style='width:300px;'>
<option value=''>-select Document Type-</option>";
$data.=QueryManager::reportTypeFilter($docType);
$data.="</select>

<select name='docFY' id='docFY' 
onchange=\"xajax_view_documents(
'".$_SESSION['docType']."',
'".$_SESSION['docFY']."',
1,20
); return false;\" style='width:300px;'>
<option value=''>-Select Year-</option>";
$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
$data.="</select>";

$data.="<input name='search' type='button' class='formButton2' value='Go'
onclick=\"xajax_view_documents(
getElementById('docType').value,
getElementById('docFY').value,
1,20
);return false;\" />


<input name='new_doc' type='button' class='formButton2' value='New Document' onclick=\"xajax_new_document();\"> |

<!--<a href='export_to_excel_word.php?linkvar=Export Document
&&docFY=".$docFY."
&&cur_page=".$_SESSION['cur_page']."
&&records_per_page=".$_SESSION['records_per_page']."
&&format=excel'>
<input name='export_documenets' type='button' class='formButton2'value='Export to Excel'></a> |-->";

$data.="<!--<a href='print_version.php?linkvar=Print Document
&&docFY=".$docFY."
&&cur_page=".$_SESSION['cur_page']."
&&records_per_page=".$_SESSION['records_per_page']."
&&format=Print' target='_blank'>
<input name='export_documenets' type='button' class='formButton2' value='Print Version'></a>-->
</td>";

$data.="</tr>";

$data.="<tr class='evenrow'><th colspan='8'><div align='center'>REPOSITORY DETAILS</div></th></tr>";

/* $data.="<tr>
<td class='offwhite' COLSPAN='8' align='left'>
<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('frm_documents'),'Delete_Doc');return false;\" align='left'></td>";
$data.="</td>";
$data.="</tr>";	 */

//===================data to be displayed=====================
$data.="<tr>
	<th class='first-cell-header'>#</th>
	<th colspan='2' class='large-cell-header'>Document Name</th>
	<th class='small-cell-header'>Type</th>
	<th class='small-cell-header'>Financial Year</th>
	<th class='large-cell-header'>Uploaded By</th>
	<th class='small-cell-header'>Date Uploaded</th>
	<th class='largest-cell-header'>Action</th>
</tr>";

	switch($docFY){
			case'CPMA Year One':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2012,2013)";
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2013,2014)";
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2014,2015)";
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2015,2016)";
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2016,2017)";
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod="and `d`.`doc_fy` in (2017,2018)";
			break;
			
			default:
			break;
		}



$query_string="select `d`.* from `tbl_documents` as `d` ";
$query_string.=" where `d`.`Display` = 'Yes' ";
$cpma_year=(!empty($docFY))?" ".$reportingYearToPeriod." ":"";
$query_string.$cpma_year;
$query_string.=" order by tbl_documents_id asc";
			 
	   $count=1;
	   $query_=Execute($query_string)or die(http(__line__));
		/**************
		*paging parameters
		*
		****/
		$max_records = mysql_num_rows($query_);
		$num_pages=ceil($max_records/$records_per_page);
		$offset = ($cur_page-1)*$records_per_page;
		$count=$offset+1;
		$new_query=Execute($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
		//noRecordsFound($query,$colspan)
		$x=1;
		while($row=FetchRecords($new_query)){
			$color=$count%2==1?"evenrow3":"evenrow";
		$data.="
		<tr>";
		$data.="<td>".$count.".<input type='hidden'  name='tbl_documents_id[]' id='tbl_documents_id".$count."' value='".$row['tbl_documents_id']."' />";
		$data.="<input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>";
		$data.="</td>";
		$data.="<td colspan='2'>".$row['document_name']."</td>";
		$data.="<td>".$row['doc_type']."</td>";
		$data.="<td align='right'>".$row['doc_fy']."</td>";
		$userId=$row['doc_user_id'];
		$userName=(!empty($userId) or ($userId !==''))?QueryManager::getUserName($userId) :'';
		$data.="<td>".$userName."</td>";
		$data.="<td align='right'>".$row['doc_timestamp']."</td>";
		$filePath="".dirname(__DIR__)."/reports/".$row['file_name']."";
		$data.="<td><a href='".$filePath."' download='".$row['file_name']."'>
		<input type='button' value='Download' class='red' align='left'></a>
		</td>";
		$data.="</tr>";

				$count++;
				 }
				 $data.="".noRecordsFound($new_query,8)."";
	//====================end of displayed data===================
	/* $data.="<tr>
			<td class='offwhite' COLSPAN='8' align='left'>
			<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('frm_documents'),'Delete_Doc');return false;\" align='left'></td>";
			$data.="</td>";
	$data.="</tr>"; */
	
/*
*display pages
*/
$data.="<tr align='right'><td colspan=8>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['docType']."','".$_SESSION['docFY']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['docType']."','".$_SESSION['docFY']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_setup_vAgent('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr><table>";
	
	$data.="<table>";
        
   $data.="</tr>
   </table>
   </form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv"); 
return $obj;


}
function new_document(){
$obj=new xajaxResponse();
$QueryManager =new QueryManager('');

$data="<table width='400' border='0'>


          <tr>
            <td>
              <form action='functions.php' method='post' name='document' id='document' enctype='multipart/form-data'>
                <table width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table border='0'>
					  
						<tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Document Type:</strong></td>
                          <td>
						  <select name='doc_type'  id='doc_type' style='width:218.18px;'>
						  <option value=''>-select-</option>";
						  $data.=$QueryManager->reportTypeFilter($reportType);
						  $data.="</select>
						  </td>
                        </tr>
						
						<tr class='white1'>
                          <td class=''><strong>Financial Year:</strong></td>
                          <td>
						  <select name='doc_fy'  id='doc_fy' style='width:218.18px;'>
						  <option value=''>-select-</option>";
						  $data.=$QueryManager->FinancialYearDigitsFilter($financialYear);
						  $data.="</select>
						  </td>
                        </tr>
						
						
					  
                        <tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Document Name:</strong></td>
                          <td>
						  <input name='document_name' type='text' id='document_name' style='width:218.18px;'/>
						  <input name='doc_user_id' id='doc_user_id' type='hidden' value='".$_SESSION['user_id']."'/>
						  <input name='doc_ipaddress' id='doc_ipaddress' type='hidden' value='".$_SERVER['REMOTE_ADDR']."'/>
						  <input name='doc_timestamp' id='doc_timestamp' type='hidden' value='".date('Y-m-d H:i:s')."'/>
						  </td>
                        </tr>
						
						<tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Brief Document Description:</strong></td>
                          <td>
						  <textarea name='doc_desc' rows='2' col='5' id='doc_desc' style='width:218.18px;'></textarea>
						  </td>
                        </tr>
                       
                        <tr class='white1'>
                          <td><strong>Upload Document:</strong></td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> 
						  <input name='img_file' type='file'  id='img_file' style='width:218.18px;'></td>
                        </tr>

                        <tr class='ftfRpLevelTwo'>
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
function close_reporting(){
 $obj=new xajaxResponse();

 $data="<form name='reporting' id='reporting' method='post' action='?'>
 
<table width='400' border='0'>
  <tr>
    <th scope='col'>Current Active Quarter</th>
    <th scope='col'><span style='font-weight:bold;'>".$_SESSION['quarter']."</span></th>
  </tr>
  
  <tr>
    <td>Current Date of Closing Data Entry </td>
    <td><span style='font-weight:bold;'>
      <select name='openentry'>
        ";
		$query=Execute("select * from tbl_active where status like 'Open%'")or die(http(__line__));
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
    <td><select name='aPeriod' id='aPeriod'><option value=''>-select-</option>
      ";
                $yr = date('Y'); $end=($yr+1);
				do{
				 $data.="
      <option value='".$end."'>".$end."</option>
      ";
				 $end--;
				} while($end>=2013);
                $data.="<option value='Closed'>Close Reporting </option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Change Active Quarter</td>
    <td><select name='active_quarter' id='active_quarter'><option value=''>-select-</option>
      ";
         $query=Execute("select * from tbl_quarters order by quarterCode asc")or die(http(__line__));
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
    <td>Start Date for Data Entry</td>
    <td><a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.reporting.startdate);return false;' hidefocus=''>
      <input name='startdate' type='text'  size='15' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
  </tr>
  <tr>
    <td>New Closing Date for Data Entry</td>
    <td><a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.reporting.chdate);return false;' hidefocus=''>
      <input name='chdate' type='text'  size='15' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
  </tr>"; 
  $data.="<tr>
    <td>&nbsp;</td>
    <td><input type='button' value='Save' name='saveReportPeriod' onclick=\"xajax_save_reporting(xajax.getFormValues('reporting'));\"  /></td>
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
function save_reporting($formvalues){
 $obj=new xajaxResponse();

$aPeriod=$formvalues['aPeriod'];
$openentry=$formvalues['openentry'];
$quarter=$formvalues['active_quarter'];
#$obj->alert($quarter);
$chdate=$formvalues['chdate'];
$startdate=$formvalues['startdate'];
#$obj->alert($chdate);
$user=$_SESSION['username'];
if($quarter=='Close Reporting'&& $aPeriod=='Close Reporting'){
Execute("update tbl_active set status='Closed',quarter='Closed',year='Closed' where status like 'Open%' and  quarter like '".$_SESSION['quarter']."%'")or die(http(__line__));
}
else
{

@Execute("UPDATE tbl_active SET status='Closed',quarter='Closed',year='Closed' WHERE status LIKE 'Open%'")or die(http(__line__));


}
 $obj->assign('bodyDisplay','innerHTML',congMsg("Reporting Period Closed!"));
 $obj->call('xajax_open_reporting',$user,$aPeriod,$quarter,$chdate,$startdate);
return $obj;
}
function open_reporting($user,$aPeriod,$quarter,$chdate,$startdate){
  $obj=new xajaxResponse();
 $x="insert into tbl_active(uname,year,quarter,doentry,startDate,endDate) values('".$user."','".$aPeriod."','".$quarter."','".$chdate."','".$startdate."','".$chdate."')";
@Execute($x)or die(http(__line__));
#$obj->alert($x);
  $obj->assign('bodyDisplay','innerHTML',congMsg("New Reporting Period Opened\n Please Login to start Reporting"));
  $obj->redirect('logout.php');
return $obj;
 }
function home(){
 $obj=new xajaxResponse();
 $data.="<form name='home' id='home'><table width='100%' border='0'>
  
  <tr>
    <td>Heading</td>
    <td><input type='text' name='heading' id='textfield' size='113' /></td>
  </tr>
  <tr>
    <td>Body</td>
    <td><textarea name='body' id='body' cols='110' rows='15'></textarea></td>
  </tr>
  <tr>
    <td></td>
    <td><div style='float:right;'><input name='save' type='button' value='Save' onclick=\"xajax_save_home(xajax.getFormValues('home'));\" /></div></td>
  </tr>
</table></form>"; 
 $obj->assign('bodyDisplay','innerHTML',$data);
 $obj->call("hideLoadingDiv"); 
return $obj;
 }
function view_home($head){
$obj=new xajaxResponse();
$_SESSION['head']=$head;
$data="<form name='home1' id='home1' action='".$PHP_SELF."'>

<table width='600' border='0'  >
<tr class='evenrow'>
    
    
    <td scope='col'>Title</td><td scope='col' colspan=2><select name='heading' id='heading' onChange=\"xajax_view_home(getElementById('heading').value)\"><option value=''>-All-</option>";
	$query=Execute("select * from tbl_home order by home_id asc ")or die(http(__line__));
	while($rowh=FetchRecords($query)){
	$sel=($rowh['head']==$_SESSION['head'])?"SELECTED":"";
	$data.="<option value='".$rowh['head']."' '".$sel."'>".substr($rowh['head'],0,40)."</option>";
	}
	$data.="</select></td>
    <td scope='col' colspan=2><div style='float:right;'><input name='' type='button' value='New Entry' onclick=\"xajax_home()\" /> | <a href='export_to_excel_word.php?linkvar=Export Home&&head=".$_SESSION['head']."&&format=excel'><input name='' type='button' value='Export to Excel' /></a></td>
   
   
  </tr>
  <tr>
    <th scope='col' colspan=2>NO</th>
    
    <th scope='col'>Title</th>
    <th scope='col'>Body</th>
   
  </tr>";
  $n=1; $inc=1;
  $xx="SELECT * FROM tbl_home WHERE head LIKE '%".$_SESSION['head']."%'  ORDER BY home_id ASC ";
  #$obj->alert($xx);
   $query=Execute($xx)or die(http(__line__));
  while($row=FetchRecords($query)){
    $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    
    <td><input name='home_id[]' type='checkbox' value='".$row['home_id']."' /></td><td>".$n++."</td>
      <td>$row[head]</td>
	  <td>$row[body]</td>

  </tr>";
  $inc++;}
  $data.="<tr class=$color>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' value='Edit'   TITLE='Edit'onclick=\"xajax_edit_home(xajax.getFormValues('home1'));return false;\"  />| <input type='button' value='Delete' class='redhdrs' TITLE='Delete' onclick=\"ConfirmDelete(xajax.getFormValues('home1'),'Delete_home','');return false;\"  /></td>
    
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function view_usergroup(){
$obj=new xajaxResponse();
$data="<table width='600' class='border' border='0'>".filter_userGroup()."</table>

<table width='600' border='0'  >
  <tr>
    <th scope='col' colspan=2>NO</th>
    
    <th scope='col'>GROUP NAME</th>
    <th scope='col'>DESCRIPTION</th>
    <th scope='col'>ACTION</th>
  </tr>";
  $n=1; $inc=1;
   $query=Execute("select * from tbl_usergroup where group_name <> '' order by group_name asc ")or die(http(__line__));
  while($row=FetchRecords($query)){
    $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
    
    <td><input name='' type='checkbox' value='' /></td><td>".$n++."</td>
    <td>$row[group_name]</td>
    <td>$row[description]</td>
    <td><input name='' type='button' value='Manage Usergroup' /></td>
  </tr>";
  $inc++;}
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function new_usergroup(){
$obj=new xajaxResponse();
$data="<form  name='usergroup' id='usergroup' method='post' action='".$PHP_SELF."'><table width='600' border='0'>
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
      <input type='button' name='button' id='button' value='Save' onclick=\"xajax_save_usergroup(xajax.getFormValues('usergroup'))\" />
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
function view_users($name,$username,$usergroup,$role){

    $obj=new xajaxResponse();
    $n=1;
    $inc=1;

    $_SESSION['name1']=$name;
    $_SESSION['user1']=$username;
    $_SESSION['usergroup1']=$usergroup;
    $_SESSION['role1']=$role;


        $data="<fieldset class='evenrow'>
            <form name='users' id='users'   method='post' action='".$PHP_SELF."' >";

                $data.="<table>".filter_users().
                    $data.="<tr>";
                        $data.="<th colspan='2' >NO</th>";
                        $data.="<th>NAME</th>";
                        $data.="<th >USERNAME</th>";
                        $data.="<th>usergroup</th>";
                        $data.="<th COLSPAN=''>ROLE</th>";
                        $data.="<th COLSPAN='2'>SUB-COMPONENT</th>";
                    $data.="</tr>";

                    $query_string="select u.user_id,u.org_code,u.subcomponent,u.name,u.username,u.password,u.role,g.group_name from tbl_user u left join tbl_usergroup g on(g.group_id=u.usergroup) where lower(u.name) like '".strtolower($_SESSION['name1'])."%' && lower(u.username) like '".strtolower($_SESSION['user1'])."%' && lower(u.role) like '".strtolower($_SESSION['role1'])."%' && lower(g.group_name) like '".strtolower($_SESSION['usergroup1'])."%'  order by name";
                    $SELECT=Execute($query_string)or die(http(__line__));

                        while($row=FetchRecords($SELECT)){
                            $color=$n%2==1?"#f0e5a5":"#ffffff";
                            $data.="<tr class=$color>
                                <td><input type ='checkbox' name ='user_id[]' id='user_id' value='".$row['user_id']."'></td>
                                <td>".$inc++."</td>
                                <td >".$row['name']."</td>
                                <td>".$row['username']."</td>
                                <td>".$row['group_name']."</td>
                                <td COLSPAN=''>".$row['role']."</td>
                                <td COLSPAN='2'>".$row['subcomponent']."</td>
                            </tr>";
                            $n++;
                        }
                    $data.="<tr><td colspan='7' align='right'>";
                    $data.="<tr class=$color>
                        <td colspan=5>
                            <input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
                            <input type='button' TITLE='Edit'  onclick=\"xajax_edit_users(xajax.getFormValues('users'));return false;\" value='edit' />|
                            <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('users'),'delete_users','');return false;\" value='Delete' class='redhdrs' />
                        </td>
                        <td></td>
                        <td COLSPAN='2'></td>
                    </tr>
                </table>

            </form>
        </fieldset>";

    $obj->assign('bodyDisplay','innerHTML',$data);
	$obj->call("hideLoadingDiv"); 
    return $obj;
}
function search_users($name,$username,$usergroup,$role){
$obj=new xajaxResponse();

$n=1; $inc=1;
$_SESSION['name1']=$name;
$_SESSION['user1']=$username;
$_SESSION['usergroup1']=$usergroup;
$_SESSION['role1']=$role;
$data="".filter_users()."<thead ><th colspan=2 >NO</th><th >NAME</th><th >USERNAME</th><th>usergroup</th><th >ROLE</th><th  colspan=''><div align='right'>ACTION</DIV></th></thead>";

$query_string="select u.user_id,u.org_code,u.name,u.username,u.password,u.role,g.group_name from tbl_user u left join tbl_usergroup g on(g.group_id=u.usergroup) where lower(u.name) like '".strtolower($_SESSION['name1'])."' && lower(u.username) like '".strtolower($_SESSION['user1'])."' && lower(u.role) like '".strtolower($_SESSION['role1'])."' && lower(g.group_name) like '".strtolower($_SESSION['usergroup1'])."'  order by name";
	
	$SELECT=Execute($query_string)or die(http(__line__));
	if(@mysql_num_rows($SELECT)>0){
	while($row=FetchRecords($SELECT)){
	 $color=$n%2==1?"#f0e5a5":"#ffffff";
		$data.="<tr class=$color><td><input type ='checkbox' name ='".$row['id']."' id='".$row['id']."'></td><td>".$inc++."<input type ='hidden' name ='".$row['id']."' id='".$row['id']."'></td><td>".$row['name']."</td><td>".$row['username']."</td><td>".$row['group_name']."</td><td>".$row['role']."</td><td align=right><input name='Edit' type='button' value='Manage User' onClick=\" xajax_edit_users(".$row['id'].",'".$name."','".$username."','".$password."','".$role."','".$usergroup."');\" /></td></tr>";
$n++;		      
}	}
else{
$obj->alert("No Results Found!");
return $obj;
}		
	
		$data.="<tr><td colspan='7' align='right'>";
$data.="  Records:<select name='num_rec' id='num_rec' onchange=\"xajax_view_users('".$id."','".$name."','".$username."','".$password."','".$role."','".$usergroup."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*20)."' ".$selected.">".($i*20)."</option>";
		$i++;
	}
	//$feedback->alert($max_records."-->".($i*10));
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select></td></tr></table>";

$data.="</td></tr></table>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function new_user(){
$obj=new xajaxResponse();
$data="<form name='user' id='user' method='post' action='".$PHP_SELF."' onSubmit=\"validateForm(this.form)\">
	
		  
		    <table width='700' border='0' align='left'>
              <tr>
                <td colspan='3' valign='top'>&nbsp;</td>
              </tr>
              <tr>
                <td colspan='3' valign='top'><div id='status'></div></td>
              </tr>
              <tr>
                <td width='162'><div align=''>Firstname</div></td>
                <td width='400'><label> <span style='color:#ff0000;'>* </span>
                      <input name='fname' type='text'  size='30' id='fname' />
                </label></td>
				<td></td>
              </tr>
              <tr>
                <td><div align=''>Lastname</div></td>
                <td><label> <span style='color:'#ff0000;'>* </span>
                      <input name='lname' type='text'  id='lname' size='30'/>
                </label></td>
				<td></td>
              </tr>
			  <tr>
                <td><div align=''>User Group:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* 
                    <select name='usergroup' id='usergroup'  class='combobox'><option value=''>-select-</option>";
                    $select=Execute("select * from tbl_usergroup group by group_name order by group_name asc")or die(http(__line__));
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['group_id']."'>".$row['group_name']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			   <tr>
                <td><div align=''>Subcomponent:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* 
                    <select name='subcomponent' id='subcomponent' class='combobox'><option value=''>-select-</option>
					<option value='All Subcomponents'>All Subcomponents</option>";
                    $select=Execute("SELECT * FROM tbl_subcomponent GROUP BY subcomponent ORDER BY subcomponent ASC")or die(http(__line__));
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['subcomponent']."'>".$row['subcomponent']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Organization:</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* 
                    <select name='organization' id='organization'  class='combobox'><option value=''>-select-</option>
					<option value=''>select</option>";
                    $select=Execute("select * from tbl_organization group by org_code order by orgName asc")or die(http(__line__));
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['org_code']."'>".$row['orgName']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
              <tr>
                <td><div align=''>Role</div></td>
                <td><label></label>
                    <span style='color:#ff0000;'>* 
                    <select name='role' id='role'  class='combobox'><option value=''>-select-</option>";
                    $select=Execute("select * from tbl_role group by role_name order by role_name asc")or die(http(__line__));
					while($row=FetchRecords($select)){
                      $data.="<option value='".$row['role_id']."'>".$row['role_name']."</option>";
					  }
                    $data.="</select>
                    </span></td>
                <td></td>
              </tr>
			  <tr>
                <td><div align=''>Username</div></td>
                <td colspan=2><label></label>
                    <span style='color:#ff0000;'>* </span>
                    <input type='text' size='30' name='username' id='username' />
					Username standard is <b>firstname.second Name</b></td>
              </tr>
              <tr>
                <td><div align=''>Password</div></td>
                <td><span style='color:#ff0000;'>* </span>
                    <input name='password' type='password'  id='password' size='30' /></td>
					<td></td>
              </tr>
              <tr>
                <td width='162'>Confirm password</td>
                <td><span style='color:#ff0000;'>* </span>
                    <input type='password' size='30' name='cpass' id ='cpass' /></td>
					<td></td>
              </tr>
              <tr>
        <td>Verification Code </td>
		
            <td  bgcolor='#f0e5a5' background='images/pub.jpg'>";
			$code = generateCode(6);
              $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
              <input type='hidden' name='code'  size='30' id='code' value='".$code."' /></td></tr>
                
             
              <tr>
                <td colspan =''>Enter code above </td>
                <td><span style='color:#ff0000;'>* </span>
                    <input type='text' name='vcode' size='30' id ='vcode' />                </td>
				<td width='500' class='redhdrs' align=left>Case Sensitive!</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input name='reg_user' type='submit' id='reg_user' onclick=\"xajax_add_user(xajax.getFormValues('user'));return false;\" value='Add user'  />
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
function system_backup(){
$obj=new xajaxResponse();

$dbname="db_cpma";
$dbuser='root';
$dbpass='cpmmisV1';

$backupFile = $dbname._. date("Y-m-d-H-i");


 $command=("usr/bin/mysqldump --login-path=local --password=cpmmisV1 db_cpma>../../../..".$_SERVER['DOCUMENT_ROOT']."/Database_backups/$backupFile.sql");
/* $obj->alert($command); */
$data="<table width='618' border='0'>
  <tr>
    <td><form action='' method='POST'>
 <table width='300' border='0'>
  <tr class='evenrow2'>
  
    <td  class='evenrow2' scope='col' colspan='2'>DATABASE BACKUP LOG</td>
    
    <td class='evenrow2' scope='col' align='right'><a href='cron.php?linkvar=Export Database&&format=sql'><input type='button' value='Backup Database'  name='dumpDB'></a>
</td>
  </tr><tr class='evenrow2'>
    <td>NO</td>
	  <td>DATE OF BACKUP</td>
     
	<td COLSPAN='' align=right>ACTION</td></tr>";
  $n=1; $inc=1;
  $QUERY=Execute("select * from tbl_databasebackuplog order by backup_id desc limit 0,20 ")or die(http(__line__));
  
  while($row=FetchRecords($QUERY)){
     $color=$n%2==1?"evenrow":"white1";
  $data.="<tr class=$color>
  
    <td>".$n++."</td>
	   <td>$row[date_uploaded]</td>
   <td align='right'><a href='download.php?directory=Database_backups/$row[file_name]' target='_blank' class='green_field'>Download</a></td>

   
  </tr>";
  $inc++;
  }
  
  $data.="</table>

		</form></td>
  </tr>
</table>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function systemBackup(){
$obj=new xajaxResponse();
$dbname="db_cpma";
$dbuser='cpm_root';
$dbpass='cpmmisV2';
$backupFile = $dbname."_.". date("Y-m-d-H-i-s");
$command = "E:/wamp64/bin/mysql/mysql5.7.9/bin/mysqldump -u $user -p$dbpass $dbname> c:/$backupFile";
$backup=@system($command);





$obj->assign('bodyDisplay','innerHTML',congMsg("Backup Successful!\n Please check on drive C of your machine for the database backup copy:$backupFile.sql"));
//$obj->call("xajax_system_backup");
return $obj;
}
function change_password(){
$obj=new xajaxResponse();
$data="<table width='618' border='0'>
<tr><td><div id='status'></div></td></tr>
  <tr>
    <td>
<form id='changepassword' name='changepassword' method='post' action='".$PHP_SELF."'>
    <table width='473' border='0'>
      <tr>
        <td width='159'>Current Password </td>
        <td width='174'><label>
          <span style='color:#ff0000;'>* </span><input name='currentpass' type='password'  id='currentpass' />
        </label></td>
        <td width='111'>&nbsp;</td>
        <td width='11'>&nbsp;</td>
      </tr>
      <tr>
        <td>New Password </td>
        <td><span style='color:#ff0000;'>* </span><input name='newpass' type='password'  id='newpass' /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Confirm Password </td>
        <td><span style='color:#ff0000;'>* </span><input name='cpass' type='password'  id='cpass' /></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Verification Code </td>
        <td    width='174'><table width='159' border='0' align='center'>
          <tr>
            <td bgcolor='#f0e5a5' background='images/pub.jpg'>";
			$code = generateCode(6);
              $data.="<font color='#990000' size='4' face ='palatino linotype'><b>".$code."</b></font>
              <input type='hidden' name='code'  size='30' id='code' value='".$code."' /></td>
          </tr>
        </table></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>Enter Varification Code </td>
        <td><span style='color:#ff0000;'>* </span><input name='vcode' type='text'  id='vcode' /></td>
        <td class='redhdrs' width='111'>Case sensitive!</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
        <span style='color:#ffffff;'>* </span>   
          <input type='button' name='change_pass' value='Change Password' onclick=\"xajax_updatePassword(xajax.getFormValues('changepassword'))\" />
        </label></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
	  <tr>
        <td>&nbsp;</td>
        <td col;span='3'></td>
        
      </tr>
    </table>

</form>
</td>
  </tr>
</table>";


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
$x="SELECT * FROM tbl_user WHERE user_id='".$user_id."'AND password='".md5($currpass)."'";
//$obj->alert($x);
$select=@Execute($x) or die('HttpError-code-0126'.mysql_error());		
		if(@mysql_num_rows($select)>0){
		/* $row =@FetchRecords($select)or die(http(__line__));
	$_SESSION['id']=$row['id'];	 */
		@Execute("UPDATE tbl_user SET password='".md5($newpass)."' WHERE user_id='".$user_id."'")or die('HttpERROR CODE-0105'.mysql_error());
		
	}
	else{
	$obj->alert("Could not change user Password, Please try again!");
	return $obj;
	}
		
		
$obj->assign('bodyDisplay','innerHTML',congMsg("Dear ".$_SESSION['username'].", You have successfully changed your password!"));
//$obj->redirect('index.php');
return $obj;
}
function new_relatedLink(){
$obj=new xajaxResponse();
$data="<table width='400' border='0'>


          <tr>
            <td>
              <form action='functions.php' method='post' NAME='comments' id='comments' enctype='multipart/form-data'>
                <table width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table border='0'>
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
                          <td align='right'><input type='submit' name='save_relatedLink' id='save_relatedLink'  value='Save' /></td>
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
function view_login($login_id,$username,$ipaddress,$status,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
$cur_user=$_SESSION['role'];
$_SESSION['login_id']=$login_id;
$_SESSION['username1']=$username;
$_SESSION['ipaddress']=$ipaddress;
$_SESSION['status']=$status;

$data="<table width='600' border='0' align='left'>".filter_systemlogs()."
<tr><th  colspan='5' align='center'><div class='greenlinks' align='center'>USERS LOG.</div></th>
<th  colspan=''></th></tr>
<tr class='evenrow' align='left'><th class='black2'>LOG ID</th><th class='black2'>USERNAME</th><th class='black2'><div align='right'>TIME</div></th><th class='black2'><div align='right'>IP ADDRESS</div></th><th class='black2' colspan='' align='center' >STATUS</th><th class='black2' colspan='' align='' ><div align=right>ACTION</div></th></tr>";
	 $p=1;
	 #$query_string="select * from view_login order by login_id desc";
	#$SELECT=@Execute($query_string)or die("<div align='center' style='color:#ff0000;font-weight:bold;font-size:12px;'>aBi-Error code 0073:".mysql_error());
	 $query_string="SELECT * FROM view_login WHERE login_id LIKE '".$_SESSION['login_id']."%' && lower(username) LIKE '".$_SESSION['username1']."%' && ip_address LIKE '".$_SESSION['ipaddress']."%' && lower(STATUS) LIKE '".$_SESSION['status']."%' order by status,login_id desc";
	 #$obj->alert($query_string);
	$SELECT=@Execute($query_string)or die("aBi-Error code 670:".mysql_error());
	
	
	/**************
*paging parameters
*
****/
 $max_records = mysql_num_rows($SELECT);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$p=$offset+1;
$new_query=Execute($query_string." limit ".$offset.",".$records_per_page) or die("aBi-Error code 683:".mysql_error());

	
	
	
	while($row=FetchRecords($new_query)){
	$color=$n%2==1?"#f0e5a5":"#ffffff";
	$class=$row['status']=='Active'?"greenlinks":"redhdrs";
	$data.="<tr class=$color><td><input type ='hidden' name ='".$row['login_id']."' id='".$row['login_id']."'>".$row['login_id']."</td><td>".$row['username']."</td><td align='right'>".$row['time']."</td><td align=right>".$row['ip_address']."</td><TD align='right' width='10' class='$class'>".$row['status']."</TD><td><div align=right><input name='kill' type='button' onclick=\"xajax_kill_session('".$row['login_id']."')\" value='Kill' /></div></td></tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/
$data.="<tr align='right'><td colspan=6>";

$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$usergroup."','".$acronym."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_district('".$distcode."','".$usergroup."','".$acronym."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_district('".$distcode."','".$usergroup."','".$acronym."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_district('".$distcode."','".$usergroup."','".$acronym."','".$pp."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_district('".$distcode."','".$usergroup."','".$acronym."','".$cur_page."',this.value)\">";
	$i=1;
	$selected="";
	while($i*10<=$max_records){
		$selected=$i*10==$records_per_page?"SELECTED":"";
		$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
		$i++;
	}
	//$feedback->alert($max_records."-->".($i*10));
	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value='".$max_records."' ".$sel.">All</option>";
	$data.="</select>";
	$data.="</br></td></tr><table>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function kill_session($login_id){
$obj=new xajaxResponse();
$select=Execute("SELECT * FROM tbl_login WHERE login_id='".$login_id."'&& status LIKE 'Active%'")or die("<font color='red'>HttpError Code-0144: because, ".mysql_error()."</font>");
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
@Execute("update tbl_login set status='Inactive' where login_id='$login_id'")or die("<font color='red'>HttpError Code-0144: could not kill session because, ".mysql_error()."</font>");
//session_destroy();
$obj->assign('bodyDisplay','innerHTML',noteMsg('User session Closed!'));
$obj->call("xajax_view_login",'','','','',1,20);
return $obj;
}
function view_relatedLink($link){
$obj = new xajaxResponse();
$_SESSION['linkname']=$link;
//style='font-weight:bold;' bgcolor='#e6e6e6'
# style='border-right:1px solid #d6dff7;border-left:1px solid #d6dff7;border-bottom:1px solid #d6dff7;'
$data="<form name='links' id='links' action='".$PHP_SELF."' method='post' style='background:#ff0000;' ><table width='600' border='0' cellspacing='0' class='darklink'>
<tr height='25' class='evenrow'>
                    <td width='25'colspan=2 >Link Name</tD>
					
                    <td width='25' colspan=2 ><select name='linkname'  id='linkname' size='1' onchange=\"xajax_view_relatedLink(getElementById('linkname').value)\">";
					if($_SESSION['linkname']!='')
					$data.="<option value='".$_SESSION['linkname']."'>".$_SESSION['linkname']."</option>";
					else
					$data.="<option value=''>-All-</option>";
					$query113=Execute("SELECT * FROM tbl_relatedlinks ORDER BY linkName ASC")or die("Httperror-code 884 because, ".mysql_error());
					while($row113=FetchRecords($query113)){
					$data."<option value='".$row113['linkName']."'>".$row113['linkName']."</option>";
					}
					$data.="</select></td>
                    <td align='right'><input name='' type='button' value='New Entry' onclick=\"xajax_new_relatedLink();return false;\" /></td>
                  </tr>
                  <tr height='25'>
                    <th width='25' >No.</th>
					<th width='25' >SELECT</th>
                    <th width='25' >Logo</th>
                    <th width='200' >Link Name</th>
					<th width='200'>URL</th>
                  </tr>";
				  $n=1;$inc=1;
				  $query=Execute("SELECT * FROM tbl_relatedlinks ORDER BY linkName ASC")or die(http(__line__));
				  
				  while($row=FetchRecords($query)){
				  
                    $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
                    <td width='25'>".$n++."</td>
					<td width='25'><input name='relatedlink_id[]' id='relatedlink_id' type='checkbox' value='".$row['relatedlink_id']."' /></td>
                    <td width='25'><img src='icons/$row[logo]' width='24' heigh='24' /></td>
                    <td>".$row['linkName']."</td>
					<td>".$row['url']."</td>
                  </tr>";
				  $inc++;
				  
				  }
				  
   $data.="<tr class=$color>
     
    <td colspan='5'><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit'  onclick=\"xajax_edit_relatedLink(xajax.getFormValues('links'));return false;\" value='edit' />|
	 <input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('links'),'delete_relatedlink','');return false;\" value='Delete' class='redhdrs' /></td>
 

   

  </tr>";
$data.="</table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function mail2($mail){
$obj=new xajaxResponse();



$data="  
          <table width='600' border='0'>
            <tr>
              <td>Your Name:</td>
              <td><select name='name' id='name' class='combobox2'>";
						  
						 $query=Execute("SELECT * FROM tbl_user WHERE user_id='".$_SESSION['user_id']."'")or die(http(__line__));
						  while($row=FetchRecords($query)){
						  
						  $data.="<option value=\"".$row['user_id']."\" >".$row['username']."<option>";
						 
						  } 
						  
						 $data.="
                       </select></td>
                        </tr>
            <tr>
              <td>Subject:</td>
              <td><input type='text' name='subjetc' id='subject' size='60'></td>
            </tr>
            <tr>
              <td>Your Email:</td>
              <td><label>
                <input type='text' name='email' id='email' size='60'>
              </label></td>
            </tr>
            <tr>
              <td>Message</td>
              <td><label>
                <textarea name='message' id='message' cols='60' rows='5'></textarea>
              </label></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align='right'><label>
                <input type='button' name='button' class='button_width' value='Send' onclick=\"xajax_sendmail(getElementById('name').value,getElementById('subject').value,getElementById('email').value,getElementById('message').value)\" >
              </label></td>
            </tr>
            
          </table>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function sendmail($name,$subject,$email,$message){
	$obj=new xajaxResponse();
	//mis.ftfcpm@dcareug.com
		$query=@send_email("aasiimwe@dcareug.com",$subject,$message, $headers=$email);
		$query2=@send_email($email,$subject,$message="Dear ".$email.", Your Enquiry has been successfully sent, The CPM MIS team will get back to you shortly ", $headers="mis.ftfcpm@dcareug.com");
	
	$obj->assign('bodyDisplay','innerHTML',congMsg("Thank you for Contacting us. Your Email has been sent."));
	return $obj;

}
function view_comments($user){
$obj = new xajaxResponse();
$_SESSION['username1']=$user;
$inc=1;$n=1;
$data="<table width='650' border='0'>".filter_comments()."</table>
<table width='650' border='0' cellspacing='1'>
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
  $query=Execute("SELECT c.id,u.username,c.comment,c.snapshot,c.status FROM tbl_comment  c INNER JOIN tbl_user u ON(u.user_id=c.user_id) WHERE u.username LIKE '".$_SESSION['username1']."%' ORDER BY DATE DESC")or die("<font color=red> Could not retrieve comment because ".mysql_error()."</font>");
  while($row=FetchRecords($query)){
   $color=$n%2==1?"bluish":"white1";
   $status=($row['status']=='Unsorted')?"<td class='redhdrs'>".$row['status']."</td>":"<td class='greenlinks'>".ucwords($row['status'])."</td>";
	$clear=($_SESSION['role']=="Systems Administrator")?"<td class='redhdrs'><input name='clear' type='button' value='Clear' onclick=\"xajax_clearUserComment('".$row['id']."')\" /></td>":"<td></td>";
	$data.="<tr class=".$color.">
      <td align='right'>".$inc++."</td>
    <td><input name='comment_id' id='comment_id' type='hidden' value='".$row['id']."' />".$row['username']."</td>
    <td>".$row['comment']."</td>";
	if($row['snapshot']<>''){
    $data.="<td align='left'><a href='snapshots/".$row['snapshot']."' target=_blank>View Snaphost</a></td>";
	}else{
	 $data.="<td align='center'>N/A</td>";
	
	}
   $data.=$status."
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
$sql="SELECT * FROM tbl_comment WHERE id='".$comment_id."'&& status LIKE 'Unsorted%'";
//$obj->alert($sql);
$select=Execute($sql)or die("<font color='red'>HttpError Code-0144: because, ".mysql_error()."</font>");
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
@Execute("update tbl_comment set status='Sorted' where id='$comment_id' and status like 'Unsorted%'")or die("<font color='red'>HttpError Code-0144: could not kill session because, ".mysql_error()."</font>");
//session_destroy();
$obj->assign('bodyDisplay','innerHTML',noteMsg('User Comment or Issue Addressed!'));
$obj->call("xajax_view_comments",'');
return $obj;
}
function faqs($qn)
{
    $obj = new xajaxResponse();

        $data .= "<form  name='frmPostFaq' id='frmPostFaq' method='post' action='" . $PHP_SELF . "'>";
            $data .= "<table width='600' border='0'>
              <tr>
                <td>
                    <table width='362' border='0'>

                      <tr>
                        <td width='257'><div align='center'></div></td>
                        <td width='95'><label></label></td>
                      </tr>

                      <tr>
                        <td><label>Question.</label></td>
                        <td><textarea cols='40' rows='10' name='question' id='question'></textarea></td>
                      </tr>

                      <tr>
                        <td><label>
                            <div align='right'></div>
                          </label></td>
                        <td><div align='right'>
                          <input type='button' name='save' value='Submit' onclick=\"xajax_faqs2(xajax.getFormValues('frmPostFaq'));return false;\" />
                        </div></td>
                      </tr>

                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                      </tr>

                    </table>
                </td>
              </tr>
            </table>
        </form>";

    $obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv"); 
    return $obj;
}
function faqs2($formValues){
    $obj=new xajaxResponse();

    $question = $formValues['question'];
    $dateAsked = date('Y-m-d h:i:s');
    $whoAsked = $_SESSION['user_id'];
    $stW="SELECT u.district FROM  tbl_user as u WHERE u.user_id = '".$_SESSION['user_id']."'";

    $query=Execute($stW) or die(http(1460));
    $r=FetchRecords($query);
    $district = $r['district'];


        $st="INSERT INTO `tbl_faqs`(`question`, `district`, `dateAsked`,`whoAsked`)
                                 VALUES
                                ('".$question."','".$district."','".$dateAsked."','".$whoAsked."')";

           $query=Execute($st) or die(http(1456));

        $obj->assign('bodyDisplay','innerHTML',congMsg("Question Captured!"));
        $obj->call("faqs",$faqs);

    return $obj;
}
function view_questions($question)
{
    $obj = new xajaxResponse();

    $_SESSION['question1'] = $question;

    $data = "<table width='100%' border='0' cellspacing='1' cellpadding='1'>
        <tr CLASS='evenrow'>
            <td colspan='8' ALIGN=left >FREQUENTLY ASKED QUESTIONS
                <select name='faqs' id='faqs' size='1' onchange=\"xajax_view_questions(getElementById('faqs').value)\">";
    $data .= "<option value=''>-All-</option>";
    $select = Execute("SELECT * FROM tbl_faqs ORDER BY id ASC") or die("Http ERROR-code 1100 because, " . mysql_error());

    while ($ROW = FetchRecords($select)) {
        $data .= "<option value='" . $ROW['question'] . "'>" . $ROW['question'] . "</option>";

    }
    $data .= "</select>

                <div style='float:right;'>
                        <input type='button' name='new entry' value='New Entry' onclick=\"xajax_faqs('')\"> |
                        <a href='export_to_excel_word.php?linkvar=Export FAQ&&format=excel'>
                        <input name='export_vAgent' type='button' class='formButton2'value='Export to Excel'></a> |";
                        $data.="<a href='print_version.php?linkvar=Print FAQ&&format=Print' target='_blank'>
                        <input name='export_vAgent' type='button' class='formButton2' value='Print Version'></a>
                </div>

            </td>";


    $data .= "
        </tr>";

    $data .= "<tr>
            <td colspan='8'>
                <table border='0' class='hoverTable' cellspacing='1' cellpadding='1' width='100%'>";
    $data .= "<tr>
                        <th>Check All<br/><input type='checkbox' id='check_all' /></th>
                        <th>QUESTION<img src='' width='120' height='0.2'></th>
                        <th>RESPONSE<img src='' width='120' height='0.2'></th>
                        <th>DATE ASKED<img src='' width='67' height='0.2'></th>
                        <th>WHO ASKED<img src='' width='120' height='0.2'></th>
                        <th>DATE ANSWERED<img src='' width='67' height='0.2'></th>
                        <th>WHO ANSWERED<img src='' width='120' height='0.2'></th>
                        ";

    switch ($_SESSION['role']) {
        Case "Systems Administrator":
            //execute this
            $data .= "<th ALIGN='RIGHT'>ACTION</b></th>";
            break;
        default:
            $data .= "<th ALIGN='RIGHT'></th>";
            break;
    }
    $data .= "</tr>";

    $inc = 1;
    $n = 1;
    $query = Execute("SELECT q.*,u.name AS `asker`
                                        FROM tbl_faqs AS q JOIN tbl_user AS u
                                        ON (u.user_id = q.whoAsked)
                                        WHERE q.Display = 'Yes'
                                        ORDER BY dateAsked DESC") or die(http(__line__));

    while ($row = FetchRecords($query)) {
        $data .= "<tr class='alternating_rows'>";

        $data .= "<td>" . $n . ".";
        $data .= "<input type='checkbox'  name='recordId[]' id='recordId" . $n . "' value='" . $row['id'] . "' />
                            <input name='loopkey[]' id='loopkey" . $n . "' type='hidden' value='1'/>";
        $data .= "</td>";

        $data .= "<td > " . $row['question'] . " </td > ";
        $answer = ($row['answer'] == '') ? "<td align='right'><input name='answer' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $row['answer'] . " </td >";
        $data .= $answer;

        $data .= "<td>" . $row['dateAsked'] . " </td >";
        $data .= "<td > " . $row['asker'] . " </td > ";
        $dateAnswered = ($row['dateAnswered'] == '') ? "<td align='right'><input name='dateAnswered' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $row['dateAnswered'] . " </td >";
        $data .= $dateAnswered;
        //pick who answered
        $stA = "SELECT u.name AS `responder` FROM tbl_faqs AS q JOIN tbl_user AS u ON (u.user_id = q.whoAnswered) WHERE q.whoAnswered='" . $row['whoAnswered'] . "'";
        $queryResponse = Execute($stA) or die(http("FAQ-1571"));
        $rowResponse = FetchRecords($queryResponse);

        switch ($_SESSION['role']) {
            Case "Systems Administrator":
                $answerState = ($row['answer'] == '' && $rowResponse['responder'] == '') ? "<td align='right'><input name='responder' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td><td><input name='' class='redhdrs' type='button' value='Answer' onclick=\"xajax_view_faqs('" . $row['id'] . "')\" /></td>" : "<td class='green_field'> " . $rowResponse['responder'] . " </td ><td><input name='answerState' type='button' value='&#x2714; Answered' disabled='disabled' class='green_field'  /></td>";
                $data .= $answerState;
                break;
            default:

                $responder = ($rowResponse['responder'] == '') ? "<td align='right'><input name='responder' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $rowResponse['responder'] . " </td >";
                $data .= $responder;
                break;
        }

        $data .= "</tr>";

        $n++;
    }
    $data .= "" . noRecordsFound($query, 8) . "";

    $data .= "</table>
             </td>
        </tr>";


    $data .= "</table>";
    $obj->assign('bodyDisplay', 'innerHTML', $data);
    $obj->call("shadeBgOnCheck");
	$obj->call("hideLoadingDiv"); 
    return $obj;
}
function view_faqs($id)
{
    $obj = new xajaxResponse();

    $data .= "<form name='answerFaq' id='answerFaq' method='post' action='" . $PHP_SELF . "'>";
    $data .= "<table width='600' border='0'>";
    $query = Execute("SELECT * FROM tbl_faqs WHERE id='" . $id . "'") or die(http(1582));
    while ($row = FetchRecords($query)) {
        $_SESSION['id'] = $row['id'];
        $data .= "<tr>
            <td>

                <table width='362' border='0'>
                    <tr>
                        <td width='257'><div align='center'>Question</div></td>
                        <td width='95'><input type='hidden' name='qnId' id='qnId' value='" . $row['id'] . "'>'" . $row['question'] . "'</td>
                    </tr>
                    <tr>
                        <td><label>Answer:</label></th>
                        <td><textarea cols='40' rows='10' name='answer' id='answer'>" . $row['answer'] . "</textarea></td>
                    </tr>";
    }

    $data .= "<tr>
                        <td>
                            <label>
                                <div align='right'></div>
                            </label>
                        </td>

                        <td>
                            <div align='right'>
                                <input type='button' name='save' value='Save' onclick=\"xajax_faqAnswer(xajax.getFormValues('answerFaq'));return false;\" />
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>";

    $data .= "<form>";

    $obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv"); 
    return $obj;
}
function faqAnswer($formValues)
{
    $obj = new xajaxResponse();

        $id = $formValues['qnId'];
        //$obj->alert($id);
        $answer = $formValues['answer'];
        $dateAnswered = date('Y-m-d h:i:s');
        $whoAnswered = $_SESSION['user_id'];

        $sel = Execute("SELECT * FROM tbl_faqs WHERE id='" . $id . "'") or die(http(1638));

        if (mysql_num_rows($sel) > 0) {
            $query = "UPDATE `tbl_faqs`
                SET `answer`='" . mysql_real_escape_string($answer) . "',
                `dateAnswered`='".$dateAnswered."',
                `whoAnswered`='".$whoAnswered."'
                WHERE id ='" . $id . "'";
            @Execute($query) or die(http(1601));

        }

    $obj->assign('bodyDisplay', 'innerHTML', congMsg("CPM  FAQ Answered!"));
    $obj->call('xajax_view_questions', '');


    return $obj;
}
function view_all($question,$answer){
    $obj=new xajaxResponse();

        $data="<table width='600' class='black' border='0'>
            <tr>
                <td></td>
                <td align='right'>
                    <a href='#new_faq' onclick=\"xajax_faqs('');\" >
                        <input type='button' value='New Question'>
                    </a>
                </td>
            </tr>";

            $query=Execute("SELECT * FROM tbl_faqs")or die(http(__line__));
            while($row=FetchRecords($query)){
                $data.="<tr>
                    <td colspan='2' class='greenlinks'>".$row['question']."</td>
                </tr>

                <tr>
                    <td colspan='2' >".$row['answer']."</td>
                </tr>";

            }
        $data.="</table>";

    $obj->assign("bodyDisplay",'innerHTML',$data);
	$obj->call("hideLoadingDiv"); 
    return $obj;
}
function view_district($district,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
$n=1;
$_SESSION['district']=$district;
$cur_user=$_SESSION['role'];
//$obj->alert($cur_user);

$data.="<table width='400' border='0'>".filter_district()."</table>";
$data.="<form name='district1' id='district1' method='POST' enctype='application/x-www-form-urlencoded'  action='".$PHP_SELF."' >

<table width='400' border='0'>
<tr class=''><th scope='col' colspan='5' align='center'><b class='greenlinks'>REGISTERED DISTRICTS</b></th></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
</tr>";
	 $p=1;
	 $query_string="SELECT * FROM tbl_district WHERE districtName LIKE '".$_SESSION['district']."%' ORDER BY districtName";
	 #$obj->alert($query_string);
	$SELECT=@Execute($query_string)or die("CPMA-Error code 1406 because, ".mysql_error());
	/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($SELECT);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->alert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$p=$offset+1;
$new_query=Execute($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
	
	
	
	while($row=FetchRecords($new_query)){

	 $color=$n%2==1?"#f0e5a5":"#ffffff";
		$data.="<tr class=$color>
		<TD><input name='district_code[]' id='district_code' type='checkbox' value='".$row['districtCode']."' /></td>
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$p++."</td>
		<td>".$row['districtName']."</td><td>".$row['acronym']."</td>
		
		</tr>";
$n++;		      
}			
		
		
		/*
*display pages
*/


$data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
	<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> |
	<input type='button' TITLE='Edit'  onclick=\"xajax_edit_district(xajax.getFormValues('district1'));return false;\" value='edit' />|
	<input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('district1'),'delete_district1','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr>";
	$data.="<table></form>";	
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function new_district(){
$obj = new xajaxResponse();
$data.="<form name='new_district' id='new_district' action='".$PHP_SELF."'>
<table width='265' border='0'>
<tr>
    <td colspan=2><div id='status' name='status'></div></td>
   
  </tr>
  <tr>
    <td>District Name:</td>
    <td width='162'><input type='text' name='districtName' id='districtName' /></td>
  </tr>
  <tr>
    <td>Acronym:</td>
    <td><input type='text' name='txtacronym' id='txtacronym' /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><div align='right'>
      <input type='button' name='button' id='button' value='Save' onclick=\"xajax_save_district(xajax.getFormValues('new_district'))\" />
    </div></td>
  </tr>
</table><form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function view_document_admin(){
$obj = new xajaxResponse();
$data="<form name='document' id='document' method='post' action='".$PHP_SELF."' ><table width='400' border='0'>
<tr>
    <th scope='col' COLSPAN=3>DOCUMENT DETAILS</th>

    <th scope='col'><input name='' type='button' value='New Entry' onclick=\"xajax_new_document()\"/></th>

  </tr>
  <tr>
    <th scope='col' COLSPAN=2>No.</th>
    <th scope='col'>Document  Name</th>
    <th scope='col' colspan=''>ACTION</th>

  </tr>";
  $n=1; $inc=1;
  $QUERY=Execute("SELECT * FROM tbl_documents")or die("Httperror-code 1620 because ".mysql_error());
  while($row=FetchRecords($QUERY)){
   $color=$n%2==1?"evenrow":"white";
  $data.="<tr class=$color>
  <td><input name='document_id[]' id='document_id' type='checkbox' value='".$row['document_id']."' /></td>
    <td>".$n++."</td>
    <td>".$row['document_name']."</td>
    <td><div style='float:left;'><input type='button' TITLE='Edit'  onclick=\"xajax_edit_document(xajax.getFormValues('document'));return false;\" value='Edit' /> |
	<a href='download.php?directory=reports/$row[filename]' target='_blank'  class='green_field'>Download</a></div></td>
    
  </tr>";
  $inc++;
  }
  
  $data.="<tr class='evenrow'>
     
    <td colspan=4><input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' TITLE='Edit'  onclick=\"xajax_edit_document(xajax.getFormValues('document'));return false;\" value='edit' />| 
	<input type='button' TITLE='Delete'  onclick=\"ConfirmDelete(xajax.getFormValues('document'),'delete_document','');return false;\" value='Delete' class='redhdrs' /></td>


   

  </tr></table></FORM>
";

$obj->assign('bodyDisplay','innerHTML',$data);
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
					$queryrole=Execute("SELECT * FROM tbl_role ORDER BY role_name ASC")or die(http(2437));
					
					while($rowrole=FetchRecords($queryrole)){
					$selectedrole=($_SESSION['userRole']==$rowrole['role_name'])?"selected":"";
					$data.="<option value=\"".$rowrole['role_name']."\" ".$selectedrole." >".$rowrole['role_name']."</option>";
					}
					$data.="</select></td><td><input type='button' class='formButton2'name='role' id='role' onclick=\"xajax_view_role(getElementById('role').value,getElementById('usergroup').value);return false;\" value='Go'></td>
                    <td class=''><div style='float:right;'><input name='new_role' onclick=\"xajax_new_role();\" type='button' class='formButton2'value='New Role' /> | <input name='' type='button' class='formButton2'value='Export to Excel' /></div></td>
					 
                  </tr>
				  <tr class='evenrow'>
     
    <td colspan=5><input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_role(xajax.getFormValues('userRole'));return false;\" value='edit' />| <input type='button' class='formButton2'TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('userRole'),'delete_role','role_id','tbl_role','xajax_view_role','2');return false;\" value='Delete' class='redhdrs' /></td>
 

   

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
				  $SQL=Execute("SELECT g.group_id,r.role_id,r.role_name,r.description,g.group_name FROM tbl_role r LEFT JOIN tbl_usergroup g ON(g.group_id=r.usergroup) WHERE role_name LIKE '".$_SESSION['userRole']."%'  AND group_name LIKE '".$_SESSION['usergroup']."%' ORDER BY role_name  ASC")or die(http(__line__));
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
function view_relatedLinks(){
$obj = new xajaxResponse();
//style='font-weight:bold;' bgcolor='#e6e6e6'

$data="<table width='600' border='0' cellspacing='0' >
                  <tr height='25'>
                    <th width='25' >No.</th>
                    <th width='25' >Logo</th>
                    <th>Link Name</th>
                  </tr>";
				  $n=1;$inc=1;
				  $query=Execute("SELECT * FROM tbl_relatedlinks ORDER BY linkName ASC")or die(http(__line__));
				  
				  while($row=FetchRecords($query)){
				  
                   $color=$inc%2==1?"evenrow2":"white";
  $data.="<tr class=$color>
                    <td width='25'>".$n++."</td>
                    <td width='25'><img src='icons/$row[logo]' width='24' heigh='24' /></td>
                    <td><a href='http://$row[url]' target='_blank' >$row[linkName]</a></td>
                  </tr>";
				  $inc++;
				  
				  }
				  
              $data.="</table>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
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
						case"User Role";
						?>
						xajax_view_role('','');
						<?php
						break;
						case "System Users":
						?>
						xajax_view_users('','','','','','','',1,20);
						<?php 
						break;
						case "User Group":
						?>
						xajax_view_usergroup();
						<?php 
						break;
						case "Database Backup Log":
						?>
						xajax_system_backup();
						<?php 
						break;
						case "Reporting Period":
						?>
						xajax_close_reporting();
						<?php break;
						case "Change Pasword":
						?>
						xajax_change_password();
						<?php 
						break;
						case"New Link":
						?>
						xajax_view_relatedLink('');
						<?php 
						break;
						case"System Logins":
						?>
						xajax_view_login('','','','',1,20);
						<?php 
						break;
						case"Home":
						?>
						xajax_view_home('');
						<?php 
						break;
						case"view Documents":
						?>
						xajax_view_documents('','',1,20);
						<?php
						break;
						case "View District":
						?>
						xajax_view_district("",1,20);
						<?php
						break;
						case"Related Links": ?>
						xajax_view_relatedLinks();
						<?php 
						break;
						case "New Document":
						?>
						xajax_view_document_admin();
					
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
