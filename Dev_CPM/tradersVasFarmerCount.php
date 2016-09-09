<?php
session_start();
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
							
$xajax->register(XAJAX_FUNCTION,'tradersVas_home');



#************************************


function tradersVas_home($tr_id,$tr_code,$va_region,$cur_page=1,$records_per_page=4){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['tr_id']=$tr_id;
$_SESSION['tr_code']=$tr_code;
$_SESSION['va_region']=$va_region;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$tr_id=($_SESSION['tr_id']<>''?$_SESSION['tr_id']:$tr_id);
$tr_code=($_SESSION['tr_code']<>''?$_SESSION['tr_code']:$tr_code);
$va_region=($_SESSION['va_region']<>''?$_SESSION['va_region']:$va_region);




$data.="<form  name='tr_va_farmer_counts' id='tr_va_farmer_counts' method='post' action='".$_SERVER['PHP_SELF']."'>
<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>
	<thead>
		<tr>
			<td colspan='5'>
				<table width='100%' border='0' cellspacing='1' cellpadding='1'>
					<tr>
						<td width='' colspan=''>
						
						<select name='tr_id' id='tr_id' 
							onchange=\"xajax_tradersVas_home(
							this.value,
							'".$tr_code."',
							'".$va_region."',
							1,4
							);return false;\" style='width:150px;'>
							<option value=''>-select trader-</option>";
							$data.=$qmobj->filterTrader($_SESSION['tr_id']);
						$data.="</select>
						
						<input type='text' name='tr_code' id='tr_code' placeholder='Trader code' 
							onchange=\"xajax_tradersVas_home(
								'".$tr_id."',
								this.value,
								'".$va_region."',
								1,4
								);return false;\"/>
						
						<select name='va_region' id='va_region' 
							onchange=\"xajax_tradersVas_home(
							'".$tr_id."',
							'".$tr_code."',
							this.value,
							1,4
							);return false;\" style='width:150px;'>
							<option value=''>-select VA Region-</option>";
							$data.=$qmobj->regionalFilter($_SESSION['va_region']);
						$data.="</select>
						
						<input name='search' type='button' class='formButton2' value='Go'
							onclick=\"xajax_tradersVas_home(
							getElementById('tr_id').value,
							getElementById('tr_code').value,
							getElementById('va_region').value,
							1,4
							);return false;\" /> |
						
						<a href='export_to_excel_word.php?linkvar=Export Traders VAs Farmer Count
							&tr_id=".$tr_id."
							&tr_code=".$tr_code."
							&va_region=".$va_region."
							&cur_page=".$cur_page."
							&records_per_page=".$records_per_page."
							&format=excel'>
							<input name='export_tradersVasFarmerCount' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print Traders VAs Farmer Count
							&tr_id=".$tr_id."
							&tr_code=".$tr_code."
							&va_region=".$va_region."
							&cur_page=".$cur_page."
							&records_per_page=".$records_per_page."
							&format=Print' target='_blank'>
							<input name='export_tradersVasFarmerCount' type='button' class='formButton2' value='Print Version'>
						</a>
						
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</thead>
<tbody>
		
		<tr class='evenrow'>
			<th colspan='5' align='center'>Trader and VA Farmer Counts</th>
		</tr>";

$query_string="select 
t.`tbl_tradersId`,
t.`traderName`,
t.`traderCode`, 
t.`traderRegion`,
v.`tbl_villageAgentId`, 
v.`tbl_tradersId`,
v.`vAgentName`,
v.`vAgentCode`, 
v.`vAgentRegion`,
v.`display` 
from tbl_traders t 
join tbl_villageagents v 
on (t.`tbl_tradersId`=`v`.`tbl_tradersId`)
where v.`display` ='Yes'
and t.`display` ='Yes' ";
//Filter parameters
$tr_id=(!empty($tr_id))?" AND t.`tbl_tradersId`=".$tr_id." ":"";
$tr_code=(!empty($tr_code))?" AND t.`traderCode` LIKE '%".$tr_code."%' ":"";
$va_region=(!empty($va_region))?" AND `v`.`vAgentRegion` = '".$va_region."' ":"";
$query_string.=$tr_id.$tr_code;

$query_string.=" group by t.`tbl_tradersId`
order by t.`tbl_tradersId`, t.`traderRegion` DESC";

//$obj->alert($query_string);
$count=1; 
$query_=mysql_query($query_string)or die(http(__line__));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$count=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
$x=1;
while($rowTrader=mysql_fetch_array($new_query)){
	$data.="<tr>
		<td colspan='5'>TRADER:<strong>".$rowTrader['traderName']."</strong></td>
	</tr>
	
	
	<tr>
		<th class='first-cell-header'>#</th>
		<th class='large-cell-header'>VA NAME</th>
		<th class='small-cell-header'>VA CODE</th>
		<th class='small-cell-header'>VA REGION</th>
		<th class='small-cell-header'>FARMER COUNT</th>
	</tr>";
	
	
	/* find the vAs */
	$sql="select v.`tbl_villageAgentId`, v.`vAgentName`, v.`vAgentCode`, v.`vAgentRegion`
	from `tbl_villageagents` as `v`
	where v.`tbl_tradersId`='".$rowTrader['tbl_tradersId']."'
	and `v`.`display`='Yes'
	order by v.`vAgentName` asc";
	$query=Execute($sql)or die(http(__line__));
	$n=1;
		while($row=FetchRecords($query)){
			$vAgentRegion='';
			switch($row['vAgentRegion']){
				case 1:
				$vAgentRegion='Central';
				break;
				
				case 2:
				$vAgentRegion='North';
				break;
				
				case 3:
				$vAgentRegion='East';
				break;
				
				case 4:
				$vAgentRegion='West';
				break;
				
				default:
				$vAgentRegion='-';
				break;
			}

			$data.="<tr>
				<td>".$n.".</td>
				<td>".$row['vAgentName']."</td>
				<td>&nbsp;&nbsp;".$row['vAgentCode']."</td>
				<td>".$vAgentRegion."</td>";
				/* Num farmers per Village Agent */
				$sqlF="select count(f.`tbl_farmersId`) as `numFarmers`
				from `tbl_farmers` as `f`
				where f.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'
				and f.`tbl_tradersId`='".$rowTrader['tbl_tradersId']."'
				and f.`display`='Yes'";
				$queryF=Execute($sqlF)or die(http(__line__));
				$rowf=FetchRecords($queryF);
				$data.="<td>".number_format($rowf['numFarmers'])."</td>
			</tr>";
			$n++;
		}
	$data.="".noRecordsFound($query,5)."";
	$count++;
	$inc++;
}
$data.="".noRecordsFound($new_query,5)."";

//====================end of displayed data===================



/*
*display pages
*/
$data.="<tr align='right'>
<td colspan='5'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_tradersVas_home('".$_SESSION['tr_id']."','".$_SESSION['tr_code']."','".$_SESSION['va_region']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_tradersVas_home('".$_SESSION['tr_id']."','".$_SESSION['tr_code']."','".$_SESSION['va_region']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
//for($p=2;$p<$num_pages;$p++){
$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_tradersVas_home('".$_SESSION['tr_id']."','".$_SESSION['tr_code']."','".$_SESSION['va_region']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_tradersVas_home('".$_SESSION['tr_id']."','".$_SESSION['tr_code']."','".$_SESSION['va_region']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_tradersVas_home('".$_SESSION['tr_id']."','".$_SESSION['tr_code']."','".$_SESSION['va_region']."','".$cur_page."',this.value)\">";
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
$data.="</br>
</td>
</tr>
</tbody>
</table>
</form>";

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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>CPM Traders and their VA's Farmer Counts Report...</span></div>
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

					switch($linkvar){
							case "Traders with their VAs Farmer Counts":
							?>
							xajax_tradersVas_home('','','',1,4);
						  
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

