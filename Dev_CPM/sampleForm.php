<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************

//================================FORM7=================

$xajax->register(XAJAX_FUNCTION,'view_farmers');



//-----------------------------------End of Function view_form7--------------------------------------------------------





function view_farmers($tbl_tradersId,$tbl_villageAgentId,$cur_page=1,$records_per_page=200){
$obj = new xajaxResponse();
$QueryManager=new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}



$n=1;
$inc=1;
$_SESSION['tbl_tradersId']=$tbl_tradersId;
$_SESSION['tbl_villageAgentId']=$tbl_villageAgentId;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;
$tbl_tradersId=($_SESSION['tbl_tradersId']<>''?$_SESSION['tbl_tradersId']:$tbl_tradersId);
$tbl_villageAgentId=($_SESSION['tbl_villageAgentId']<>''?$_SESSION['tbl_villageAgentId']:$tbl_villageAgentId);

$data="<form action=\"".$PHP_SELF."\" name='viewfarmer' id='viewfarmer' method='post'>

	<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_farmerSample();

		$data.="<tr class='evenrow'><th colspan='16'><center>FARMER SAMPLE DETAILS</center></th></tr>

		<tr>
			<td class='offwhite' COLSPAN='16' ALIGN='LEFT'>
				<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
				<a href='export_to_excel_word.php?linkvar=Export Sampled Form7&&tbl_tradersId=".$tbl_tradersId."&&tbl_villageAgentId=".$tbl_villageAgentId."&&cur_page=".$cur_page."&&records_per_page=".$records_per_page."&&format=excel'>
					<input name='Expo' type='button' class='formButton2' value='Export selected records to Excel'>
				</a>
			</td>
		</tr>";

		$data.="<tr class='evenrow'>
			<th class='first-cell-header'>#</th>
			<th>Farmer Code</th>
			<th>Farmer Name</th>
			<th>Trader Name</th>
			<th>Trader Code</th>
			<th>Trader Tel</th>
			<th>VA Name</th>
			<th>VA Code</th>
			<th>VA Tel</th>
			<th>Group Name</th>
			<th>Group Code</th>
			<th>Farmer District</th>
			<th>Farmer Subcounty</th> 
			<th>Farmer Village</th>
			<th>Farmer Start Date</th>
			<th>Farmer Tel</th>
		</tr>";

		$query_string="select `f`.`tbl_farmersId`,`f`.`farmersName`,`f`.`farmersVillage`,`f`.`farmersTel`,
		`t`.`tbl_tradersId`, `t`.`traderName`, `t`.`traderCode`, `t`.`traderTel`,
		`v`.`vAgentName`,`v`.`vAgentCode`, `v`.`vAgentTel`, `g`.`groupName`,`g`.`groupCode`,
		`d`.`districtName`, `s`.`subcountyName`,
		`f`.`memberDstart`, `f`.`memberStatus`
		from `tbl_farmers` as `f`,
		`tbl_traders` as `t`,
		`tbl_villageagents` as `v`, 
		`tbl_villageagent_groups` as `g`,
		`tbl_district` as `d`,
		`tbl_subcounty` as `s` 
		where `t`.`tbl_tradersId`=`v`.`tbl_tradersId` 
		and `v`.`tbl_villageAgentId` = `f`.`tbl_villageAgentId` ";


		//Filter parameters
		if($tbl_tradersId<>'' and $tbl_villageAgentId<>''){
		$query_string.="
		and `t`.`tbl_tradersId` = '".$tbl_tradersId."'
		and `v`.`tbl_villageAgentId` = '".$tbl_villageAgentId."' ";
		}elseif($tbl_tradersId<>'' and $tbl_villageAgentId==''){
		$query_string.="and `t`.`tbl_tradersId` = '".$tbl_tradersId."' ";
		}elseif($tbl_tradersId=='' and $tbl_villageAgentId<>''){
		$query_string.="and `v`.`tbl_villageAgentId` = '".$tbl_villageAgentId."' ";
		}

		$query_string.="and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
		and `f`.`farmersDistrict`=d.`districtCode`
		and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` DESC";

		$g=1;
		//$obj->alert($query_string);

		$query_=mysql_query($query_string)or die(http(__line__));
		/**************
		*paging parameters
		*
		****/
		$max_records = mysql_num_rows($query_);
		$num_pages=ceil($max_records/$records_per_page);
		$offset = ($cur_page-1)*$records_per_page;
		$g=$offset+1;
		$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));

		$x=1;
		$farmer_array=array();
		while($rfarmer=mysql_fetch_array($new_query)){
		$farmer_array=$rfarmer['tbl_farmersId'];


		$data.="<tr>";
			$data.="<td>".$g.".<input type='checkbox'  name='tbl_farmersId[]' id='tbl_farmersId".$g."' value='".$rfarmer['tbl_farmersId']."' />
			<input name='loopkey[]' id='loopkey".$g."' type='hidden' value='1'/></td>";
			$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
			$data.="<td>".$rfarmer['farmersName']."</td>";
			$data.="<td>".$rfarmer['traderName']."</td>";
			$data.="<td>".$rfarmer['traderCode']."</td>";
			$trTel=($rfarmer['traderTel']);
			if(($trTel)=='+256' or ($trTel)==''){$telTr='-';}else{$telTr=$trTel;}
			$data.="<td>".$telTr."</td>";
			$data.="<td>".$rfarmer['vAgentName']."</td>";
			$data.="<td>".$rfarmer['vAgentCode']."</td>";
			$vaTel=($rfarmer['vAgentTel']);
			if(($vaTel)=='+256' or ($vaTel)==''){$telVa='-';}else{$telVa=$vaTel;}
			$data.="<td>".$telVa."</td>";
			$data.="<td>".$rfarmer['groupName']."</td>";
			$data.="<td>".$rfarmer['groupCode']."</td>";
			$data.="<td>".$rfarmer['districtName']."</td>";
			$data.="<td>".$rfarmer['subcountyName']."</td>";
			$data.="<td>".$rfarmer['farmersVillage']."</td>";
			$data.="<td>".$rfarmer['memberDstart']."</td>";
			$farmerTel=($rfarmer['farmersTel']);
			if(($farmerTel)=='+256'){$tel='-';}else{$tel=$farmerTel;}
			$data.="<td>".$tel."</td>";
		$data.="</tr>";
		$g++;
		$inc++;
		}
		$data.="".noRecordsFound($new_query,10)."";
										

				
		$data.="<tr>
			<td class='offwhite' COLSPAN='16' ALIGN='LEFT'>
				<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
			</td>
		</tr>";


		/*
		*display pages
		*/
		$data.="<tr align='right'>
			<td colspan=16>";

				$p='';
				$num_links=10;
				$startAt_links=($cur_page-5);
				$endAt_links=($cur_page+$num_links);
				$cur_link=$cur_page;


				if($num_pages>1){
				$links=1;
				$append_bar=$p==$num_pages?"":"|";
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_farmers('".$_SESSION['tbl_tradersId']."','".$_SESSION['tbl_villageAgentId']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_farmers('".$_SESSION['tbl_tradersId']."','".$_SESSION['tbl_villageAgentId']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_farmers('".$_SESSION['tbl_tradersId']."','".$_SESSION['tbl_villageAgentId']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_farmers('".$_SESSION['tbl_tradersId']."','".$_SESSION['tbl_villageAgentId']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_farmers('".$_SESSION['tbl_tradersId']."','".$_SESSION['tbl_villageAgentId']."','".$cur_page."',this.value)\">";
				$i=1;
				$selected="";
				while($i*10<=$max_records){
				$selected=$i*10==$records_per_page?"SELECTED":"";
				$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
				$i++;
				}

				$sel=$records_per_page>=$max_records?"SELECTED":"";
				$data.="<option value='".$max_records."' ".$sel.">All</option>";
				$data.="</select>
				</br>
			</td>
		</tr>
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
                                    case "Sample Form7 Farmers": 
                                ?>
                    xajax_view_farmers('','',1,200);

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

