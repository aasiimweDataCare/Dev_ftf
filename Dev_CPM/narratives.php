<?php
session_start();
require_once('connections/lib_connect.php');




require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);
#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_narrative');
$xajax->register(XAJAX_FUNCTION,'new_narrative');
$xajax->register(XAJAX_FUNCTION,'delete_narrative');
$xajax->register(XAJAX_FUNCTION,'edit_narrative');
#************************************************
require_once('save.php');
require_once('edit.php');
require_once('delete.php');
#************************************************


#*************************************************
function view_narrative($docType,$docFY,$cur_page=1,$records_per_page=20){
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
<select name='docType'  id='docType'  style='width:300px;'>
<option value=''>-select Document Type-</option>";
$data.=QueryManager::reportTypeFilter($docType);
$data.="</select>

<select name='docFY' id='docFY' style='width:300px;'>
<option value=''>-Select Year-</option>";
$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
$data.="</select>";

$data.="<input name='search' type='button' class='formButton2' value='Go'
onclick=\"xajax_view_narrative(
getElementById('docType').value,
getElementById('docFY').value,
1,20
);return false;\" />


<input name='new_doc' type='button' class='formButton2' value='New Narrative' onclick=\"xajax_new_narrative();\"> |

<!--<a href='export_to_excel_word.php?linkvar=Export Document
&&docFY=".$docFY."
&&cur_page=".$_SESSION['cur_page']."
&&records_per_page=".$_SESSION['records_per_page']."
&&format=excel'>
<input name='export_narratives' type='button' class='formButton2'value='Export to Excel'></a> |-->";

$data.="<!--<a href='print_version.php?linkvar=Print Document
&&docFY=".$docFY."
&&cur_page=".$_SESSION['cur_page']."
&&records_per_page=".$_SESSION['records_per_page']."
&&format=Print' target='_blank'>
<input name='export_narratives' type='button' class='formButton2' value='Print Version'></a>-->
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
								<th colspan='2' class='large-cell-header'>Narrative Name</th>
								<th class='small-cell-header'>Type</th>
								<th class='small-cell-header'>Financial Year</th>
								<th class='large-cell-header'>Uploaded By</th>
								<th class='small-cell-header'>Date Uploaded</th>
								<th class='largest-cell-header'>Action</th>
							</tr>
						</thead>
						<tbody>";
						switch($docFY){
						case'CPMA Year One':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2012,2013)";
						break;

						case'CPMA Year Two':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2013,2014)";
						break;

						case'CPMA Year Three':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2014,2015)";
						break;

						case'CPMA Year Four':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2015,2016)";
						break;

						case'CPMA Year Five':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2016,2017)";
						break;

						case'CPMA Year Six':
						$reportingYearToPeriod="and `d`.`narrative_fy` in (2017,2018)";
						break;

						default:
						break;
						}


						$query_string.="SELECT 
						`d`.`tbl_narrative_id`, 
						`d`.`narrative_name`,
						`d`.`narrative_type`,
						`d`.`file_name`, 
						`d`.`narrative_fy`,
						`d`.`narrative_desc`,
						`d`.`narrative_user_id`, 
						`d`.`narrative_ipaddress`, 
						`d`.`narrative_timestamp`, 
						`d`.`Display` 
						FROM 
						`tbl_narrative`  as `d`
						where `d`.`Display` ='Yes' ";

						$cpma_year=(!empty($docFY))?" ".$reportingYearToPeriod." ":"";
						$doc = (!empty($docType))?"and d.narrative_type ='".$docType."'":"";
						$query_string.=$cpma_year;
						$query_string.=$doc;
						$query_string.=" order by `d`.`tbl_narrative_id` asc";
						// $obj->alert($query_string);

							$count=1;
							$query_=mysql_query($query_string)or die(http(__line__));
							/**************
							*paging parameters
							*
							****/
							$max_records = mysql_num_rows($query_);
							$num_pages=ceil($max_records/$records_per_page);
							$offset = ($cur_page-1)*$records_per_page;
							$count=$offset+1;
							$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
							//noRecordsFound($query,$colspan)
							$x=1;
							while($row=FetchRecords($new_query)){
								$color=$count%2==1?"evenrow3":"evenrow";
							$data.="
							<tr>";
							$data.="<td>".$count.".<input type='hidden'  name='tbl_narrative_id[]' id='tbl_narrative_id".$count."' value='".$row['tbl_documents_id']."' />";
							$data.="<input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>";
							$data.="</td>";
							$data.="<td colspan='2'>".$row['narrative_name']."</td>";
							$data.="<td>".$row['narrative_type']."</td>";
							$data.="<td align='right'>".$row['narrative_fy']."</td>";
							$userId=$row['narrative_user_id'];
							$userName=(!empty($userId) or ($userId !==''))?QueryManager::getUserName($userId) :'';
							$data.="<td>".$userName."</td>";
							$data.="<td align='right'>".$row['narrative_timestamp']."</td>";
							$filePath="../Dev_CPM/narratives/".$row['file_name']."";
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
$data.="<tr align='right'>
<td colspan=8>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_narrative('".$_SESSION['docType']."','".$_SESSION['docFY']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_narrative('".$_SESSION['docType']."','".$_SESSION['docFY']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_narrative('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_narrative('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_narrative('".$_SESSION['docType']."','".$_SESSION['docFY']."','".$cur_page."',this.value)\">";
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
function new_narrative(){
$obj=new xajaxResponse();
$QueryManager =new QueryManager('');
$data="<table width='100%' border='0'>
          <tr>
            <td>
              <form action='functions.php' method='post' name='frm_narratives' id='frm_narratives' enctype='multipart/form-data'>
                <table width='535' border='0'>
                  <tr>
                    <td width='517'>
                      <table border='0'>
					  
						<tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Narrative Type:</strong></td>
                          <td>
						  <select name='narrative_type'  id='narrative_type' style='width:218.18px;'>
						  <option value=''>-select-</option>";
						  $data.=$QueryManager->reportTypeFilter($reportType);
						  $data.="</select>
						  </td>
                        </tr>
						
						<tr class='white1'>
                          <td class=''><strong>Financial Year:</strong></td>
                          <td>
						  <select name='narrative_fy'  id='narrative_fy' style='width:218.18px;'>
						  <option value=''>-select-</option>";
						  $data.=$QueryManager->FinancialYearDigitsFilter($financialYear);
						  $data.="</select>
						  </td>
                        </tr>
						
						
					  
                        <tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Narrative Name:</strong></td>
                          <td>
						  <input name='narrative_name' type='text' id='narrative_name' style='width:218.18px;'/>
						  <input name='narrative_user_id' id='narrative_user_id' type='hidden' value='".$_SESSION['user_id']."'/>
						  <input name='narrative_ipaddress' id='narrative_ipaddress' type='hidden' value='".$_SERVER['REMOTE_ADDR']."'/>
						  <input name='narrative_timestamp' id='narrative_timestamp' type='hidden' value='".date('Y-m-d H:i:s')."'/>
						  </td>
                        </tr>
						
						<tr class='ftfRpLevelTwo'>
                          <td class=''><strong>Brief Narrative Description:</strong></td>
                          <td>
						  <textarea name='narrative_desc' rows='2' col='5' id='narrative_desc' style='width:218.18px;'></textarea>
						  </td>
                        </tr>
                       
                        <tr class='white1'>
                          <td><strong>Upload Narrative Document:</strong></td>
                          <td> <input type='hidden' name='MAX_FILE_SIZE' value='100000000' /> 
						  <input name='img_file' type='file'  id='img_file' style='width:218.18px;'></td>
                        </tr>

                        <tr class='ftfRpLevelTwo'>
                          <td>&nbsp;</td>
                          <td align='right'></td>
                        </tr>
						
                        <tr>
                          <td>&nbsp;</td>
                          <td align='right'>
						  <input type='submit' name='save_narrative' id='save_narrative'  value='Save' />
						  </td>
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Narratives...</span></div>
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
                                    case "Narratives":
                                ?>
                    xajax_view_narrative('','',1,10); 

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
