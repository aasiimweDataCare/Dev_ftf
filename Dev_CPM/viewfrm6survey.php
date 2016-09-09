<?php
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
global $sem_annual;


#==============================Form6===========
$xajax->register(XAJAX_FUNCTION,'view_frm6Survey');
$xajax->register(XAJAX_FUNCTION,'new_form6');
$xajax->register(XAJAX_FUNCTION,'delete_form6');
$xajax->register(XAJAX_FUNCTION,'edit_form6');
$xajax->register(XAJAX_FUNCTION,'update_form6');
$xajax->register(XAJAX_FUNCTION,'save_householdData');
$xajax->register(XAJAX_FUNCTION,'calc_transfer');
$xajax->register(XAJAX_FUNCTION,'calc_totalHousehold');
$xajax->register(XAJAX_FUNCTION,'calc_form6');
$xajax->register(XAJAX_FUNCTION,'addFirst');
$xajax->register(XAJAX_FUNCTION,'close');


#************************************************
#************************************************

require_once('save.php');
require_once('edit.php');
require_once('delete.php');
 
function view_frm6Survey($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['dsName']=$dsName;
$_SESSION['hsName']=$hsName;
$_SESSION['fromDate']=$fromDate;
$_SESSION['toDate']=$toDate;
$_SESSION['speriod']=$speriod;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$dsName=($_SESSION['dsName']<>''?$_SESSION['dsName']:$dsName);
$hsName=($_SESSION['hsName']<>''?$_SESSION['hsName']:$hsName);
$fromDate=($_SESSION['fromDate']<>''?$_SESSION['fromDate']:$fromDate);
$toDate=($_SESSION['toDate']<>''?$_SESSION['toDate']:$toDate);
$speriod=($_SESSION['speriod']<>''?$_SESSION['speriod']:$speriod);



$data.="<form  name='form6' id='form6' method='post' action='".$PHP_SELF."'>

	<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form6survey();

		$data.="<tr class='evenrow'>
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA</th>
		</tr>

		<tr>
			<td class='offwhite' COLSPAN='29' ALIGN='LEFT'>
				<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
				<input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form6(xajax.getFormValues('form6'));return false;\" value='edit' /> |
				<input type='button' value='Delete' class='red'  align='left'></td>
			</td>
		</tr>";

		//===================data to be displayed=====================
		$data.="<tr>
			<th class='first-cell-header'  rowspan='2' >#</th>
			<th  rowspan='2' >Region</th>
			<th  rowspan='2' >District</th>
			<th  rowspan='2' >Subcounty</th>
			<th  rowspan='2' >Farmer Code</th>
			<th  rowspan='2' >Sampled Farmer Name</th>
			<th  rowspan='2' >Respondent</th>
			<th  rowspan='2' >Compiled By</th>
			<th  rowspan='2' >Surveyor's Tel</th>
			<th  colspan='6' >Maize</th>
			<th  colspan='6' >Beans</th>
			<th  colspan='6' >Coffee</th>
			<th  rowspan='2' >Date Surveyed</th>
		</tr>
			
		<tr>
			<th  >Area (Acre)</th>
			<th  >Value of inputs (UGX)</th>
			<th  >Total yield<br />
			 (Kg)</th>
			<th  >Volume sold<br />
			 (Kg)</th>
			 <th  >Common price<br />
			 (UGX)</th>
			<th  >Volume lost in PHH<br />
			 (Kg)</th>
			<th  >Area (Acre)</th>
			<th  >Value of inputs (UGX)</th>
			<th  >Total yield<br />
			 (Kg)</th>
			<th  >Volume sold<br />
			 (Kg)</th>
			 <th  >Common price<br />
			 (UGX)</th>
			<th  >Volume lost in PHH<br />
			 (Kg)</th>
			<th  >Area (Acre)</th>
			<th  >Value of inputs (UGX)</th>
			<th  >Total yield<br />
			 (Kg)</th>
			<th  >Volume sold<br />
			 (Kg)</th>
			 <th  >Common price<br />
			 (UGX)</th>
			<th  >Volume lost in PHH<br />
			 (Kg)</th>
		</tr>";
		  
			
				
		$query_string="select 
		`f`.`tbl_farmersId`,
		`f`.`hhName`,
		`f`.`farmersName`,
		`f`.`farmersDistrict`,
		`f`.`farmersSubcounty`,
		`z`.`zoneName`,
		`d`.`districtName` ,
		`s`.`subcountyName`,
		`g`.`compiled_by`,
		`g`.`telephone`,
		`b`.`beans_sold_price`,
		`c`.`coffee_sold_price`,
		`m`.`maize_sold_price`,
		p . * ,
		sum( if((`m`.`maize_acreage` <>'') or  (`m`.`maize_acreage`<>null),`m`.`maize_acreage`,0 )) as `hsAreaMaizeMember`,
		sum(if((`m`.`maize_improved_cost` <>'') or  (`m`.`maize_improved_cost`<>null)
		or (`m`.`maize_fertilizer_cost` <>'') or  (`m`.`maize_fertilizer_cost`<>null)
		or (`m`.`maize_chemical_cost` <>'') or  (`m`.`maize_chemical_cost`<>null)
		or (`m`.`maize_cost_ict` <>'') or  (`m`.`maize_cost_ict`<>null)
		or (`m`.`maize_machinery_cost`<>'') or  (`m`.`maize_machinery_cost`<>null),
		`m`.`maize_improved_cost` + `m`.`maize_fertilizer_cost` + `m`.`maize_chemical_cost` + `m`.`maize_cost_ict`+ `m`.`maize_machinery_cost`,0 ) ) as hsValueInputsMaizeMember,
		sum( if((`m`.`maize_harvested` <>'') or  (`m`.`maize_harvested`<>null),`m`.`maize_harvested`,0 )) as hsTotalYieldMaizeMember,
		sum( if((`m`.`maize_sold` <>'') or  (`m`.`maize_sold`<>null),`m`.`maize_sold`,0 )) as hsVolumeSoldMaizeMember,
		sum( if((`m`.`maize_harvest_loss` <>'') or  (`m`.`maize_harvest_loss`<>null),`m`.`maize_harvest_loss`,0 )) as hsVolumeLostMaizeMember,

		sum( if((`b`.`beans_acreage` <>'') or  (`b`.`beans_acreage`<>null),`b`.`beans_acreage`,0 )) as hsAreaBeansMember,
		sum(if((`b`.`beans_improved_cost` <>'') or  (`b`.`beans_improved_cost`<>null)
		or (`b`.`beans_fertilizer_cost` <>'') or  (`b`.`beans_fertilizer_cost`<>null)
		or (`b`.`beans_chemical_cost` <>'') or  (`b`.`beans_chemical_cost`<>null)
		or (`b`.`beans_cost_ict` <>'') or  (`b`.`beans_cost_ict`<>null)
		or (`b`.`beans_machinery_cost`<>'') or  (`b`.`beans_machinery_cost`<>null),
		`b`.`beans_improved_cost` + `b`.`beans_fertilizer_cost` + `b`.`beans_chemical_cost` + `b`.`beans_cost_ict`+ `b`.`beans_machinery_cost`,0 ) ) as hsValueInputsBeansMember,
		sum( if((`b`.`beans_harvested` <>'') or  (`b`.`beans_harvested`<>null),`b`.`beans_harvested`,0 )) as hsTotalYieldBeansMember,
		sum( if((`b`.`beans_sold` <>'') or  (`b`.`beans_sold`<>null),`b`.`beans_sold`,0 )) as hsVolumeSoldBeansMember,
		sum( if((`b`.`beans_harvest_loss` <>'') or  (`b`.`beans_harvest_loss`<>null),`b`.`beans_harvest_loss`,0 )) as hsVolumeLostBeansMember,

		sum( if((`c`.`coffee_acreage` <>'') or  (`c`.`coffee_acreage`<>null),`c`.`coffee_acreage`,0 )) as hsAreaCoffeeMember,
		sum(if((`c`.`coffee_improved_cost` <>'') or  (`c`.`coffee_improved_cost`<>null)
		or (`c`.`coffee_fertilizer_cost` <>'') or  (`c`.`coffee_fertilizer_cost`<>null)
		or (`c`.`coffee_chemical_cost` <>'') or  (`c`.`coffee_chemical_cost`<>null)
		or (`c`.`coffee_cost_ict` <>'') or  (`c`.`coffee_cost_ict`<>null)
		or (`c`.`coffee_machinery_cost`<>'') or  (`c`.`coffee_machinery_cost`<>null),
		`c`.`coffee_improved_cost` + `c`.`coffee_fertilizer_cost` + `c`.`coffee_chemical_cost` + `c`.`coffee_cost_ict`+ `c`.`coffee_machinery_cost`,0 ) ) as hsValueInputsCoffeeMember,
		sum( if((`c`.`coffee_harvested` <>'') or  (`c`.`coffee_harvested`<>null),`c`.`coffee_harvested`,0 )) as hsTotalYieldCoffeeMember,
		sum( if((`c`.`coffee_sold` <>'') or  (`c`.`coffee_sold`<>null),`c`.`coffee_sold`,0 )) as hsVolumeSoldCoffeeMember,
		sum( if((`c`.`coffee_harvest_loss` <>'') or  (`c`.`coffee_harvest_loss`<>null),`c`.`coffee_harvest_loss`,0 )) as hsVolumeLostCoffeeMember

		FROM
		`tbl_frm6particulars` as `p`,
		`tbl_frm6production_maize` as `m`,
		`tbl_frm6production_beans` as `b`,
		`tbl_frm6production_coffee` as `c`,
		`tbl_frm6gqnsandgps` as `g`, 
		`tbl_farmers` as `f`,
		`tbl_zone` as `z`,
		`tbl_district`as `d`,
		`tbl_subcounty` as `s` ";

		$query_string.="WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
		AND `c`.`farmer_code` = `p`.`farmer_code`
		AND `m`.`farmer_code` = `p`.`farmer_code`
		AND `b`.`farmer_code` = `p`.`farmer_code` 
		AND `p`.`pk_patId` = `m`.`fk_patId`
		AND `p`.`pk_patId` = `m`.`fk_patId`
		AND `m`.`fk_patId` = `b`.`fk_patId`
		AND `b`.`fk_patId` = `c`.`fk_patId`
		AND `c`.`fk_patId` = `g`.`fk_patId`
		AND `d`.`zone` = `z`.`zoneCode`
		AND `f`.`farmersDistrict` = `d`.`districtCode`
		AND `f`.`farmersSubcounty` = `s`.`subcountyCode` ";

		$hhString = " and `f`.`tbl_farmersId` like '".$hsName."%' "; 
		$hhFilter=(!empty($hsName))?$hhString:" ";
		$query_string.=$hhFilter;

		$districtString = " and `d`.`districtCode` = '".$dsName."' "; 
		$districtFilter=(!empty($dsName))?$districtString:" ";
		$query_string.=$districtFilter;

		$dateString = " and `p`.`interview_date` between ('".$fromDate."') and ('".$toDate."') "; 
		$dateFilter=(!empty($fromDate) && !empty($toDate))?$dateString:" ";
		$query_string.=$dateFilter;



		$sfrom = substr($speriod, 0, 10);    
		$sto = substr($speriod, -10);



		$speriodString = " and `p`.`interview_date` between ('".$sfrom."') and ('".$sto."') "; 
		$speriodFilter=(!empty($sfrom) && !empty($sto))?$speriodString:" ";
		$query_string.=$speriodFilter;

		$query_string.="
		group by `p`.`pk_patId`
		ORDER BY `p`.`pk_patId` DESC";
		/* $obj->alert($query_string); */


		$query_=mysql_query($query_string)or die(http(__line__));
		/**************
		*paging parameters
		*
		****/
		$max_records = mysql_num_rows($query_);
		$num_pages=ceil($max_records/$records_per_page);
		$offset = ($cur_page-1)*$records_per_page;
		$n=$offset+1;
		$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
		while($rowh=mysql_fetch_array($new_query)){

		$data.="<tr>";
			$data.="<td>".$n.".";
				$data.="<input type='checkbox'  name='pk_patId[]' id='pk_patId".$n."' value='".$rowh['pk_patId']."'/>
				<input name='loopkey[]' id='loopkey".$n."' type='hidden' value='1'/>";
			$data.="</td>";
			$data.="<td>".$rowh['zoneName']."</td>";
			$data.="<td>".$rowh['districtName']."</td>";
			$data.="<td>".$rowh['subcountyName']."</td>";
			$data.="<td>".$rowh['tbl_farmersId']."</td>";
			$data.="<td align='left'>".$rowh['farmersName']."</td>";
			$data.="<td align='left'>".$rowh['respondent']."</td>";
			$data.="<td align='left'>".$rowh['compiled_by']."</td>";
			$telString=$rowh['telephone'];
			$rest = substr("".$telString."", 0, 1); 
			$allZeroStarters=substr("".$telString."", 1, -1);
			$tel=($rest<>0)?"+256".$telString:"+256".$allZeroStarters;
			$data.="<td align='left'>".$tel."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaMaizeMember'],2)."</td>";
			$hsValueInputsMaizeMember=(($rowh['hsValueInputsMaizeMember'])<=1.0 ?"-":($rowh['hsValueInputsMaizeMember'])-1);
			$data.="<td align='right'>".number_format($hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format($hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format($hsValueInputsCoffeeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldCoffeeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldCoffeeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['coffee_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostCoffeeMember'],2)."</td>";
			$data.="<td align='right'>".$rowh['interview_date']."</td>";
		$data.="</tr>";

		$n++;
		}
		$data.="".noRecordsFound($new_query,10).""; 
		//====================end of displayed data===================
		$data.="<tr>
			<td class='offwhite' COLSPAN='10' ALIGN='LEFT'>
				<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
				<input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form6(xajax.getFormValues('form6'));return false;\" value='edit' /> |
				<input type='button' value='Delete' class='red'  align='left'></td>
			</td>
		</tr>";
		   
		/*
		*display pages
		*/
		$data.="<tr align='right'>
			<td colspan=10>";

				$p='';
				$num_links=10;
				$startAt_links=($cur_page-5);
				$endAt_links=($cur_page+$num_links);
				$cur_link=$cur_page;


				if($num_pages>1){
				$links=1;
				$append_bar=$p==$num_pages?"":"|";
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
				$i=1;
				$selected="";
				while($i*10<=$max_records){
				$selected=$i*10==$records_per_page?"SELECTED":"";
				$data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
				$i++;
				}

				$sel=$records_per_page>=$max_records?"SELECTED":"";
				$data.="<option value='".$max_records."' ".$sel.">All</option>";
				$data.="</select></br>
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
                                    case"view form6 Survey":
                                ?>
                    xajax_view_frm6Survey('','','','','',1,20);

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


