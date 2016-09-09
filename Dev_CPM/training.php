<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************

//================================FORM7=================
$xajax->register(XAJAX_FUNCTION,'view_form7');
$xajax->register(XAJAX_FUNCTION,'new_form7');
$xajax->register(XAJAX_FUNCTION,'save_form7');
$xajax->register(XAJAX_FUNCTION,'calc_form7');
$xajax->register(XAJAX_FUNCTION,'edit_form7');
$xajax->register(XAJAX_FUNCTION,'view_villageAgent');
$xajax->register(XAJAX_FUNCTION,'view_vAgroup');
$xajax->register(XAJAX_FUNCTION,'view_vAfarmer');
$xajax->register(XAJAX_FUNCTION,'getSampledFarmers');
$xajax->register(XAJAX_FUNCTION,'update_form7');
$xajax->register(XAJAX_FUNCTION,'delete_form7');
$xajax->register(XAJAX_FUNCTION,'delete_farmers');


#************************************************
#************************************************
//require_once('save.php');
require_once('edit.php');
require_once('delete.php');
function calc_form7($female,$male,$total){
$obj=new xajaxResponse();
$totalValue=0;
$totalValue=($female+$male);
$obj->assign($total,'value',$totalValue);
return $obj;
}
function view_form7($trader,$village_agent,$cpma_year,$reporting_period,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
$qmobj = new QueryManager();

if($_SESSION['user_id']==''){
$obj->alert('Session has timed out.');	
$obj->redirect('index.php');
return $obj;
}


$n=1;

$inc=1;
$_SESSION['trader']=$trader;
$_SESSION['village_agent']=$village_agent;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;



$trader=($_SESSION['trader']<>''?$_SESSION['trader']:$trader);
$village_agent=($_SESSION['village_agent']<>''?$_SESSION['village_agent']:$village_agent);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);


$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>";
	$data="<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form7();
		$data.="<tr CLASS='evenrow'>
			<th colspan='13' ><center>BUSINESS RECORD BOOK FARMER INFORMATION</center></th>
		</tr>";


		//===================data to be displayed=====================

		$data.="<tr>
			<th rowspan='2' class='first-cell-header'>#</th>
			<th rowspan='2'>Trader</th>
			<th rowspan='2'>Name of Village Agent</th>
			<th rowspan='2' class='small-cell-header'>VA Code</th>
			<th rowspan='2' class='small-cell-header'>Total N<u>o</u>. of farmers</th>
			<th rowspan='2' class='small-cell-header'>N<u>o</u>. of Groups</th>
			<th colspan='3' class='small-cell-header'>N<u>o</u>. of farmers in groups</th>
			<th colspan='3' class='small-cell-header'>N<u>o</u>. of individual farmers</th>
			<th rowspan='2' colspan='3' class='largest-cell-header'>Action</th>
		</tr>";

		$data.="<tr>
			<th class='small-cell-header'>Male</th>
			<th class='small-cell-header'>Female</th>
			<th class='small-cell-header'>Total</th>
			<th class='small-cell-header'>Male</th>
			<th class='small-cell-header'>Female</th>
			<th class='small-cell-header'>Total</th>
		</tr>
	<thead>
<tbody>";

		//=========================Start of data display=======================
				
			switch($cpma_year){
					case'CPMA Year One':
					$reportingYearToPeriod="'Oct - Mar 2013','Apr - Sep 2013','Oct - Mar2013','Apr - Sep2013'";
					break;
					
					case'CPMA Year Two':
					$reportingYearToPeriod="'Oct - Mar 2014','Apr - Sep 2014','Oct - Mar2014','Apr - Sep2014'";
					break;
					
					case'CPMA Year Three':
					$reportingYearToPeriod="'Oct - Mar 2015','Apr - Sep 2015','Oct - Mar2015','Apr - Sep2015'";
					break;
					
					case'CPMA Year Four':
					$reportingYearToPeriod="'Oct - Mar 2016','Apr - Sep 2016','Oct - Mar2016','Apr - Sep2016'";
					break;
					
					case'CPMA Year Five':
					$reportingYearToPeriod="'Oct - Mar 2017','Apr - Sep 2017','Oct - Mar2017','Apr - Sep2017'";
					break;
					
					case'CPMA Year Six':
					$reportingYearToPeriod="'Oct - Mar 2018','Apr - Sep 2018','Oct - Mar2018','Apr - Sep2018'";
					break;
					
					default:
					break;
				}
				
				switch($reporting_period){
					case'Oct 2012 - Mar 2013':
					$reportingYearToPeriodCleaned="'Oct - Mar 2013','Oct - Mar2013'";
					break;
					
					case'Apr 2013 - Sep 2013':
					$reportingYearToPeriodCleaned="'Apr - Sep 2013','Apr - Sep2013'";
					break;
					
					case'Oct 2013 - Mar 2014':
					$reportingYearToPeriodCleaned="'Oct - Mar 2014','Oct - Mar2014'";
					break;
					
					case'Apr 2014 - Sep 2014':
					$reportingYearToPeriodCleaned="'Apr - Sep 2014','Apr - Sep2014'";
					break;
					
					case'Oct 2014 - Mar 2015':
					$reportingYearToPeriodCleaned="'Oct - Mar 2015','Oct - Mar2015'";
					break;
					
					case'Apr 2015 - Sep 2015':
					$reportingYearToPeriodCleaned="'Apr - Sep 2015','Apr - Sep2015'";
					break;
					
					case'Oct 2015 - Mar 2016':
					$reportingYearToPeriodCleaned="'Oct - Mar 2016','Oct - Mar2016'";
					break;
					
					case'Apr 2016 - Sep 2016':
					$reportingYearToPeriodCleaned="'Apr - Sep 2016','Apr - Sep2016'";
					break;
					
					case'Oct 2016 - Mar 2017':
					$reportingYearToPeriodCleaned="'Oct - Mar 2017','Oct - Mar2017'";
					break;
					
					case'Apr 2017 - Sep 2017':
					$reportingYearToPeriodCleaned="'Apr - Sep 2017','Apr - Sep2017'";
					break;
					
					case'Oct 2017 - Mar 2018':
					$reportingYearToPeriodCleaned="'Oct - Mar 2018','Oct - Mar2018'";
					break;
					
					case'Apr 2018 - Sep 2018':
					$reportingYearToPeriodCleaned="'Apr - Sep 2018','Apr - Sep2018'";
					break;
					
					
					break;
					
					default:
					break;
				}
			$query_string="SELECT 
							`g`.*, 
							`v`.`tbl_villageAgentId`,
							`v`.`vAgentName`,
							`v`.`vAgentCode`,
							`t`.`traderName`
							FROM `tbl_villageagent_groups` as `g`, 
							`tbl_villageagents` as `v`,
							`tbl_traders` as `t`				
							where `v`.`tbl_villageAgentId` = `g`.`tbl_villageAgentId`
							and `g`.`display`='Yes'
							and `t`.`tbl_tradersId` = `g`.`tbl_tradersId`
							and `v`.`display`='Yes' ";

			$filterValue = '';
			//filter parameters
			//$trader,$village_agent,$cpma_year,$reporting_period,
			
			if(!empty($trader)){ $filterValue.="and g.tbl_tradersId='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and g.tbl_villageAgentId='".$village_agent."'  ";}						
			if((!empty($cpma_year))){ $filterValue.="and `g`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `g`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			
			$query_string.=$filterValue;

			$query_string.="group by `v`.`vAgentCode` order by `v`.`vAgentName`"; 



		$query_=@Execute($query_string)or die(http(__line__));

		//paging parameters

		$max_records = mysql_num_rows($query_);
		//$records_per_page=5;
		$num_pages=ceil($max_records/$records_per_page);
		//$feedback->addAlert($cur_page);
		$offset = ($cur_page-1)*$records_per_page;
		$m=$offset+1;
		$new_query=@Execute($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));



		$x=1;
		while($row=mysql_fetch_array($new_query)){
		

		$data.="<tr>";
			$data.="<td>".$m.".<input type='hidden'  name='tbl_villageAgentId[]' id='tbl_villageAgentId".$x."' value='".$row['tbl_villageAgentId']."'/><input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/></td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderName'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentName'])."</td>";
			$data.="<td>&nbsp;&nbsp;".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentCode'])."</td>";
			//numFarmers_all  
			$stAllFarmers="select COUNT(*) as `numAllFarmers` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'"; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stAllFarmers.=$filterValue;
			$stAllFarmers.="and `f`. `display` like 'Yes%'";
			$qAllFarmers=@Execute($stAllFarmers) or die(http(__line__));
			$rAllFarmers=FetchRecords($qAllFarmers);
			$data.="<td align='right'>".number_format($rAllFarmers['numAllFarmers'])."</td>";
			
			//numberGroups 
			$stNumGroups="select COUNT(distinct(`f`.`groupName`)) as `numGroups` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stNumGroups.=$filterValue;
			$stNumGroups.=" and `f`. `display` like 'Yes%' 
			and `f`.`groupName` <> 'No Group' 
			and `f`.`groupName` <> ''";
			$qNumGroups=@Execute($stNumGroups) or die(http(__line__));
			$rNumGroups=FetchRecords($qNumGroups);
			$data.="<td align='right'>".number_format($rNumGroups['numGroups'])."</td>";
			//numFarmersGroups_Male 
			$stMale="select COUNT(*) as `numqMalesInGroups` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stMale.=$filterValue;
			$stMale.="and `f`. `display` like 'Yes%' 
			and  `f`.`groupName` <> 'No Group' 
			and `f`.`groupName` <> '' 
			and `f`.`farmersSex` like 'Male%'";
			$qMale=@Execute($stMale) or die(http(__line__));
			$rMale=FetchRecords($qMale);
			$data.="<td align='right'>".number_format($rMale['numqMalesInGroups'])."</td>";
			//numFarmersGroups_Female 
			$stFemale="select COUNT(*) as `numqFemalesInGroups` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stFemale.=$filterValue;
			$stFemale.="and `f`. `display` like 'Yes%' 
			and `f`.`groupName` <> 'No Group' 
			and `f`.`groupName` <> '' 
			and `f`.`farmersSex` like 'Female%'";
			$qFemale=@Execute($stFemale) or die(http(__line__));
			$rFemale=FetchRecords($qFemale);
			$data.="<td align='right'>".number_format($rFemale['numqFemalesInGroups'])."</td>";
			//numFarmersGroups_Total 
			$data.="<td align='right'>".number_format((($rFemale['numqFemalesInGroups'])+($rMale['numqMalesInGroups'])))."</td>";
			
			//numFarmersNoGroups_Male 
			$stNoGrpMale="select COUNT(*) as `numqMalesNoGroupsOne` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stNoGrpMale.=$filterValue;
			$stNoGrpMale.="and `f`. `display` like 'Yes%' 
			and `f`.`groupName` = '' 
			and `f`.`farmersSex` like 'Male%'";
			$qNoGrpMale=@Execute($stNoGrpMale) or die(http(__line__));
			$rNoGrpMale=FetchRecords($qNoGrpMale);
			$NoGrpMaleOne=$rNoGrpMale['numqMalesNoGroupsOne'];
			$stNoGrpMale="select COUNT(*) as `numqMalesNoGroupsTwo` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stNoGrpMale.=$filterValue;
			$stNoGrpMale.="and `f`. `display` like 'Yes%' 
			and `f`.`groupName` = 'No Group'  
			and `f`.`farmersSex` like 'Male%'";
			$qNoGrpMale=@Execute($stNoGrpMale) or die(http(__line__));
			$rNoGrpMale=FetchRecords($qNoGrpMale);
			$NoGrpMaleTwo=$rNoGrpMale['numqMalesNoGroupsTwo'];
			$NoGrpMaleTotal=($NoGrpMaleOne+$NoGrpMaleTwo);
			$data.="<td align='right'>".number_format($NoGrpMaleTotal)."</td>";
			
			//numFarmersNoGroups_Female 
			$stNoGrpFemale="select COUNT(*) as `numqFemalesNoGroupsOne` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stNoGrpFemale.=$filterValue;
			$stNoGrpFemale.="and `f`. `display` like 'Yes%' 
			and `f`.`groupName` = '' 
			and `f`.`farmersSex` like 'Female%'";
			$qNoGrpFemale=@Execute($stNoGrpFemale) or die(http(__line__));
			$rNoGrpFemale=FetchRecords($qNoGrpFemale);
			$NoGrpFemaleOne=$rNoGrpFemale['numqFemalesNoGroupsOne'];
			$stNoGrpFemale="select COUNT(*) as `numqFemalesNoGroupsTwo` 
			from `tbl_farmers` as `f` 
			where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
			$filterValue = '';
			//filter parameters
			
			if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
			if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
			if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
			if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
			$stNoGrpFemale.=$filterValue;
			$stNoGrpFemale.="and `f`. `display` like 'Yes%' 
			and `f`.`groupName` = 'No Group'  
			and `f`.`farmersSex` like 'Female%'";
			$qNoGrpFemale=@Execute($stNoGrpFemale) or die(http(__line__));
			$rNoGrpFemale=FetchRecords($qNoGrpFemale);
			$NoGrpFemaleTwo=$rNoGrpFemale['numqFemalesNoGroupsTwo'];
			$NoGrpFemaleTotal=($NoGrpFemaleOne+$NoGrpFemaleTwo);
			$data.="<td align='right'>".number_format($NoGrpFemaleTotal)."</td>";
			
			//numFarmersNoGroups_Total 
			$data.="<td align='right'>".number_format(($NoGrpFemaleTotal+$NoGrpMaleTotal))."</td>";
			
			$data.="<td>
			<input type='button' class='formButton2' TITLE='View All Details' 
			onclick=\"xajax_view_villageAgent('".$row['tbl_villageAgentId']."');return false;\" value='All Details'/> |
			<input type='button' class='formButton2' TITLE='View Group Lists' 
			onclick=\"xajax_view_vAgroup('".$row['tbl_villageAgentId']."');return false;\" value='Group Lists'/> |
			<input type='button' class='formButton2' TITLE='View Farmer Lists' 
			onclick=\"xajax_view_vAfarmer('".$row['tbl_villageAgentId']."');return false;\" value='Farmer Lists'/>
			<input type='button' value='Delete' class='red' 
			onclick=\"ConfirmDelete(xajax.getFormValues('form7'),'Delete_form7');return false;\" align='left'>
			</td>";

		$data.="</tr>";

		$x++;
		$m++;
		} 
		$data.="".noRecordsFound($new_query,13)."";

		//====================end of displayed data===================
		  

		/*
		*display pages
		*/
		$data.="<tr align='right'>
			<td colspan='13'>";

			$p='';
			$num_links=10;
			$startAt_links=($cur_page-5);
			$endAt_links=($cur_page+$num_links);
			$cur_link=$cur_page;


			if($num_pages>1){
			$links=1;
			$append_bar=$p==$num_pages?"":"|";
			if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form7('".$_SESSION['trader']."','".$_SESSION['village_agent']."','".$_SESSION['cpma_year']."','".$_SESSION['reporting_period']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
			else $data.="<a href='#' onclick=\"xajax_view_form7('".$_SESSION['trader']."','".$_SESSION['village_agent']."','".$_SESSION['cpma_year']."','".$_SESSION['reporting_period']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
			//for($p=2;$p<$num_pages;$p++){
			$p=2;
			while($p<$num_pages){
			if(($p>$startAt_links) and ($p<$endAt_links)){
			$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form7('".$_SESSION['trader']."','".$_SESSION['village_agent']."','".$_SESSION['cpma_year']."','".$_SESSION['reporting_period']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			$p++;
			}
			if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_form7('".$_SESSION['trader']."','".$_SESSION['village_agent']."','".$_SESSION['cpma_year']."','".$_SESSION['reporting_period']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			}


			$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form7('".$_SESSION['trader']."','".$_SESSION['village_agent']."','".$_SESSION['cpma_year']."','".$_SESSION['reporting_period']."','".$cur_page."',this.value)\">";
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
function new_form7($trCode,$vaCode,$groupName,$groupCode,$dateGroupStarted,$groupStatus){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$QueryManager=new QueryManager('');

$_SESSION['subcountyCode']=$subcountyCode;
$_SESSION['trCode']=$trCode;
//$_SESSION['vaCode']=$vaCode;
$_SESSION['groupName']=$groupName;

//$obj->alert($_SESSION['groupName']);
$_SESSION['groupCode']=$groupCode;
$_SESSION['groupStatus']=$groupStatus;
$_SESSION['numMembersFemale']=$numMembersFemale;
$_SESSION['numMembersMale']=$numMembersMale;


$numMembersTotal=($numMembersFemale+$numMembersMale);
$_SESSION['numMembersTotal']=$numMembersTotal;







$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>";
$data.="<table width='100%' id='report'>";
 
  $data.="<tr class='evenrow'><th colspan='22'><center>Register for Farmers (Individuals & Groups)</center></th></tr>";
        $data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    
                          $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>
                                    <tr class='evenrow3'>
                                      <th colspan='22'>1.Village Agent Particulars</th>
                                    </tr>";
                                    $data.="<tr class='evenrow'>
                                      <td colspan=''>Name of Trader or Organization:</td>
                                      <td colspan=''><select name='nameTrader' id='nameTrader' onchange=\"xajax_new_form7(
                                this.value,
                                '".$vaCode."',
                                '".$groupName."',
								'".$groupCode."',
                                '".$dateGroupStarted."',
                                '".$groupStatus."');return false;\"  style='width:150px;'>
                                                                    <option value=''>
                                                                            -Select-
                                                                        </option>";
                                                                        $data.=$QueryManager->filterTrader($trCode);
                                                                        
                                                                        $data.="</select>
                                      </td>
                                      <td colspan=''>Trader or Organization Code:</td>";
                                      $stmnt="SELECT t.* FROM `tbl_traders` t WHERE t.`tbl_tradersId`='".$trCode."' ORDER BY t.`tbl_tradersId` ASC";
                                            $q=@Execute($stmnt);
                                            $r=mysql_fetch_array($q);
                                      $data.="<td colspan=''><input type='text' class='disabled' disabled='disabled' name='codeTrader' id='codeTrader' value='".$r['traderCode']."' disabled/>
                                      </td>
                                    </tr>";
                                    
                                    $data.="<tr class='evenrow'>
                                      <td colspan=''>Name of VA or Messenger:</td>
                                      <td colspan=''>";
                                      $data.="<select name='nameVA' id='nameVA' onchange=\"xajax_new_form7(
                                '".$trCode."',
                                this.value,
                                '".$groupName."',
								'".$groupCode."',
                                '".$dateGroupStarted."',
                                '".$groupStatus."');return false;\" style='width:150px;'>
                                                                                        <option value=''>
                                                                                                -Select-
                                                                                            </option>";
                                                                                        $data.=$QueryManager->filterVillageAgent($trCode,$vaCode);
                                                                                            $data.="</select>";
                $data.="</td>
                                      <td colspan=''>VA or Messenger Code:</td>";
                                      $stmnt="SELECT v . * FROM `tbl_villageagents` v WHERE v.tbl_villageAgentId='".$vaCode."' ORDER BY v.`vAgentName` ASC";
                                        $q=@Execute($stmnt);
                                        $v=mysql_fetch_array($q);
                              
                                      $data.="<td colspan=''><input type='text' class='disabled' disabled='disabled' name='codeVA' id='codeVA' value='".$v['vAgentCode']."'  disabled/>
                                      </td>
                                    </tr>";
                                    
                                    $data.="<tr class='evenrow'>
                                      <td>Crops Dealt in:</td>";
                                      $data.="<td>";
                                      $stmnt="SELECT v.`vAgentCropBeans` , v.`vAgentCropCoffee` , v.`vAgentCropMaize`
                                            FROM `tbl_villageagents` v
                                            WHERE v.`tbl_villageAgentId` = '".$vaCode."'
                                            ORDER BY v.`tbl_villageAgentId` ASC ";
                                      
                                        $q=@Execute($stmnt);
                                        $numFields=mysql_num_fields($q);
                                            while($r=mysql_fetch_array($q)){
                                    for($i=0; $i<$numFields; $i++){
                                           $cropsArray=array($r['vAgentCropBeans'] , $r['vAgentCropCoffee'] , $r['vAgentCropMaize']);
                                           $data.="<input type='checkbox' name='farmerCrop' disabled id='farmerCrop'";
                                           switch ($i) {
                                                case 0:
                                                    $cropName='Beans';
                                                    if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                    break;
                                                case 1:
                                                    $cropName='Coffee';
                                                    if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                    break;
                                                case 2:
                                                    $cropName='Maize';
                                                    if($cropsArray[$i]=='Yes')$data.="checked='checked'";
                                                    break;
                                            }
                                            
                                           $data.="value='".$cropName."'/>".$cropName." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
                                                       
                                          }
                                        }
                                        
                                      
	   
           
                                     $data.="</td>";
                                      $data.="<td>Telephone No. of VA or Messenger:</td>";
                                     // $obj->alert($v['vAgentTel']);
                                      $data.="<td><input class='disabled' disabled='disabled' type='text' name='telVA' id='telVA' value='".$v['vAgentTel']."' disabled/>
                                      </td>";
                                      
                                    $data.="</tr>
                                </table>";
            $data.="</td>
                </tr>";

	

$data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>";
                    $data.="<tr class='evenrow'><th colspan='22'>2.Group/ Community Based Organization Particulars</tr></th>";
                    $data.="<tr class='evenrow'>
                                <th rowspan='2'>#</th>
                                <th rowspan='2'>Name of Group/CBO</th>
								<th rowspan='2'>Type (Indicate Group,  CBO or any other type)</th>
                                <th rowspan='2'>CODE</th>
								<th rowspan='2'>Date when You started working with the group</th>
                                <th rowspan='2'>New/Old</th>
                                <th colspan='3'>No.of members</th>
                                <th colspan='3'>Location</th>
                              </tr>
                              <tr class='evenrow'>
                                <th valign='top'>Male</th>
                                <th valign='top'><strong>Female</th>
                                <th valign='top'><strong>Total</th>
                                <th valign='top'>District</th>
                                <th valign='top'>Sub-County</th>
                                <th valign='top'>Village</th>
                              </tr>
                              <tr class='evenrow'>
                                <td>1</td>
                                <td>
                                  <input type='text' name='groupName' value='".$_SESSION['groupName']."' id='groupName' /><br>
                                <i>Use: 'No Group' as the group name if farmers being captured are not in a group </i></td>";
								
								$data.="<td valign='top'>
                                  <select name='groupType'  id='groupType' />";
                                                                     
                                    $data.="<option value=''>-select-</option>";
                                    $arrStatus=array('producer orgs/groups','women&#39s groups','trade and business associations','community-based organizations');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $selected=($_SESSION['groupType']==$var)?"selected":"";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
                                            $k++;
                                        }
                                    
                                  $data.="</select>";
                                $data.="</td>";
								
                                // Algorithm for autogenerating the Group Code
                                
                                $sVa="select v.* from `tbl_villageagents` as `v` where `v`.`tbl_villageAgentId`='".$vaCode."'";
                               // $obj->alert($sVa);
                                $q=@Execute($sVa)or die(http(__line__));
                                $r=mysql_fetch_array($q);
                                $vaCodes=$r['vAgentCode'];
                                $stmnt2="SELECT max(vg.`tbl_villageagent_groupsId`) as highestId
                                from `tbl_villageagent_groups` as `vg`, `tbl_villageagents` as `v`
                                where `v`.`vAgentCode`='".$vaCodes."'
                                and `vg`.`tbl_villageAgentId`='".$vaCode."'
                                and `vg`.groupName<> 'No Group'
                                and `vg`.`tbl_villageAgentId` =`v`.`tbl_villageAgentId`";
                                $q=@Execute($stmnt2)or die(http(__line__));
                                $r=mysql_fetch_array($q);
                                $id=$r['highestId'];
                                $stmnt3="SELECT vg.`groupCode` 
                                from `tbl_villageagent_groups` as `vg`
                                where vg.`tbl_villageagent_groupsId`='".$id."'";
                                $q=@Execute($stmnt3)or die(http(__line__));
                                $r=mysql_fetch_array($q);
                                $y=1;
                                $lastGroupCode=$r['groupCode'];
                                            if($lastGroupCode<>'' or $lastGroupCode<>null){
                                            $newId=str_replace("".$vaCodes."-","",$lastGroupCode);
                                            $nextGroupCode="".$vaCodes."-".($newId+$y); 
                                            }
                                            else
                                            {
                                             
                                             $stmnt4="SELECT `v`.*
                                            from`tbl_villageagents` as `v`
                                            where `v`.`tbl_villageAgentId`='".$vaCode."'";   
                                             $q=@Execute($stmnt4) or die(http(__line__));
                                            $r=mysql_fetch_array($q);
                                            $vaCodes=$r['vAgentCode'];
                                            //Setting the first Id if all tables are empty
                                            $initialGroupCode=$y;
                                            $nextGroupCode="".$vaCodes."-".($initialGroupCode);  
                                            }
                                
                                
                                
                                
                                $data.="<td valign='top'><input class='disabled' readonly=readonly type='text' name='groupCode' value='".$nextGroupCode."' id='groupCode' />
                                </td>";
								//Modification to the new form7 
								$st="SELECT year, quarter, doentry, startDate, EndDate FROM `tbl_active` where status='Open' ORDER BY `status` DESC ";
										$query=@Execute($st) or die(http(__line__));
										$row=FetchRecords($query);
											$startDate =$row['startDate'];
											$endDate = $row['EndDate'];
								
								$data.="
								<td valign='top'><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form7.dateGroupStarted);return false;\" hidefocus=''>
								<input  name='dateGroupStarted' type='text' size='20' value='' id='dateGroupStarted' class='dateGroupStarted'   style='width:175px;' />
								<input name='startDate' id='startDate'    type='hidden' value='".$startDate."'>
								<input name='endDate' id='endDate'   type='hidden' value='".$endDate."'>
								<img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>
								";
								
								
								
                                $data.="<td valign='top'>
                                  <input type='text' class='disabled' readonly=readonly id='groupStatus' name='groupStatus' value='".$_SESSION['groupStatus']."'/>";
                                $data.="</td>
								
								<td valign='top'>
                                  <input type='text' name='numMembersMale' value='".$_SESSION['numMembersMale']."' id='numMembersMale'  onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                            getElementById('numMembersMale').value,
                                                                                                                            'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                </td>
								
								<td valign='top'>
                                  <input type='text' name='numMembersFemale' value='".$_SESSION['numMembersFemale']."' id='numMembersFemale' onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                            getElementById('numMembersMale').value,
                                                                                                                            'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                </td>
								
								<td valign='top'>
                                  <input type='text' class='disabled' name='numMembersTotal' value='".$_SESSION['numMembersTotal']."' id='numMembersTotal' style='width:50px;'/>
                                </td>
                                <td valign='top'>";
                                $query_thisUser1= "SELECT v.*, d.* FROM `tbl_villageagents` v, `tbl_district` d
						WHERE v.`tbl_villageAgentId`='".$vaCode."'
                                                AND d.`districtCode`=v.`vAgentDistrict`
                                                AND d.`Display`='Yes'";
                                $thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--1282"));
                                $rows_districts=mysql_fetch_array($thisUser1);
                                  $data.="<input class='disabled' type='text' value='".$rows_districts['districtName']."' readonly=readonly name='groupDistrict' id='groupDistrict'/>";
                                $data.="</td>";
                                $data.="<td valign='top'>";
                                  $data.="<select name='groupSubcounty' id='groupSubcounty'/> ";
                                  
                                    $data.="<option value=''>-select-</option>";
                                    
                                    $query_thisUser1= "SELECT v.* FROM `tbl_villageagents` v
						WHERE v.`tbl_villageAgentId`='".$vaCode."'";
		
			$thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--1282"));


			while ($rows_sub=mysql_fetch_array($thisUser1))
				{
                                    $data.=$QueryManager->SubcountyFilterNoRegion($rows_sub['vAgentDistrict'],$rows_sub['vAgentSubcounty']);
                                    
                                }
                                    
                                  
                                  
                                  $data.="</select>";
                                $data.="</td>";
                                $data.="<td valign='top'>
                                  <input type='text' name='groupVillage' id='groupVillage' value='".$_SESSION['village']."'/>
                                </td>
                                
                              </tr>";
                    $data.="</table>";
$data.="</td></tr>";

$data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    $data.="<table id='tbl_household' border='0' cellspacing='1' cellpadding='1' width='100%'>";
                    $data.="<tr class='evenrow'><th colspan='22'>3.Details of Group and Individual members</th></tr>";
                    $data.="<tr evenrow>
							<th rowspan='2'>No</th>
							<th colspan='5'>Details of Household(HH) head</th>
							<th colspan='4'>Household Composition <br>(Tick only ONE option)</th>
							<th rowspan='2' >No</th>
							<th rowspan='2'>Name of HH member (s) who you are directly working with</th>
							<th rowspan='2'>Farmer Crop<br>(Write C or M or B for farmer crop)<br>C=Coffee<br>M=Maize<br>B=Beans</th>
							<th rowspan='2'>Date-started working with member<img src='' height='0.2' width='85px'/></th>
							<th rowspan='2'>Date of Birth<img src='' height='0.2' width='85px'/></th>
							<th rowspan='2'>Sub County</th>
							<th rowspan='2'>Village</th>
							<th rowspan='2'>Sex</th>
							<th rowspan='2'>Telephone</th>
							<th rowspan='2'>Action</th>
						  </tr>
						  <tr>
							<th>Name of household head</th>
							<th>Date of Birth of<br>HH Head<img src='' height='0.2' width='85px'/></th>
							<th>Sex</th>
							<th>Date-started working with HH<img src='' height='0.2' width='100px'/></th>
							<th>Total Area Available for cropping(Acres)</th>
							<th>Adult Male No <br>Adult Female</th>
							<th>Adult Male<br>&amp;Female</th>
							<th>Adult Female No<br>Adult Male</th>
							<th>Children No Adults</th>
							<input type='hidden' name='numberOfHouseholds' id='numberOfHouseholds' />
						  </tr>";
                            
                            
							$data.="</table>
                        <p>
                        <input  type='button' class='formButton2' id='Add Household' name='Add Household' TITLE='Add Household' value='Add Household' onclick=\"addHousehold()\" />
                        </p>";
						  
            $data.="</td>
        </tr>";


$data.="<tr class='evenrow'>
            <td>
            <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' 
			 onclick=\"loadingIcon(xajax.getFormValues('form7'),'save_form7');return false;\" />
            </div>
            </td>
        </tr>
</form>";


		//None displaying table
						
						$data.="
						<table id='template_household' style='display:none;'>";
						
						$data.="<tbody class=\"household\">
							
							<tr class='evenrow'>";
							$data.="<td rowspan='3' valign='top'><span class='hsIndex'>1</span>
							<input type='hidden' name='childStart[]' id='childStart1' />
							<input type='hidden' name='childStop[]' id='childStop1' />
							</td>";
							$data.="<td rowspan='3' valign='top'>
							<input type='hidden' name='loopkey[]' id='loopkey1' value='1'> 
							<input type='text' name='hhName[]' id='hhName1'></td>";
							
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhDob').attr('id')));return false;\" hidefocus=''>
							<input name='hhDob[]' type='text' size='20' value='' id='hhDob1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><select name='hhSex[]' id='hhSex1'>
								<option value=''>-select-</option>";
								$arrStatus=array('M','F');
									$k = 0; 
									foreach ($arrStatus as $var) {
										switch ($var) {
											case "M":
												$display='Male';
												break;
											case "F":
												$display='Female';
												break;
											default:
												$display='';
										}
										
										$data.="<option value=\"".$var."\">".$display."</option>";
										$k++;
									}
							  $data.="</select></td>";
							  
							$data.="<td rowspan='3' valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'hhHeadDStart').attr('id')));return false;\" hidefocus=''>
							<input name='hhHeadDStart[]' type='text' size='20' value='' id='hhHeadDStart1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td rowspan='3' valign='top'><input type='text' name='hhArea[]' id='hhArea1' onkeypress='return numbersonly(event, false)'></td>";
							
							//An array of possible hscomposition.
							/* 
							db_Value->Translation on form
							noMaleOrFemale->Adult Male No Adult Female
							maleAndFemale->Adult Male and Female
							femaleNoMale->Adult Female No Adult Male
							childHeaded->Children No Adults 
							*/
							$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded');
									$k = 0; 
									foreach ($arrHs as $var) {
									$data.="<td rowspan='3' valign='top'><input type='radio' name='hsComposition1[]'  id='hsComposition1' value='".$var."'></td>";
									$k++;										
									}
								$data.="</tr>";	
								
								
								
								
								
								
								
								$data.="<tr class='evenrow member'>";
							$data.="<td valign='top'><span class='memberIndex'>1</span></td>";
							
							$data.="<td valign='top'><input type='text' name='nameIndividual[]' id='nameIndividual1'></td>";
							$data.="<td valign='top'>";
							
							$arrCrops=array('Coffee','Maize','Beans');
									$k = 1; 
									foreach ($arrCrops as $crop) {
										switch($crop){
											case 'Coffee':
											$newVar='Coffee';
											break;
											
											case 'Maize':
											$newVar='Maize';
											break;
											
											case 'Beans':
											$newVar='Beans';
											break;
											
											default:
											break;
											
										}
										$data.="<input type='checkbox' name='farmerCrop1[]' id='farmerCrop1' value='".$newVar."'>".$crop."<br>";
										
									}
							
							
							
							$data.="</td>";
							
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
							<input name='memberDstart[]' type='text' size='20' value='' id='memberDstart1'  style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
						   
							$data.="<td valign='top'>";
							$data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
							<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' style='width:60px;'>
							<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
							$data.="</td>";
							
							$data.="<td valign='top'>";
								$data.="<select name='farmerSubcounty[]' id='farmerSubcounty1'  /> ";
								$data.="<option value=''>-select-</option>";
                                $query_thisUser1= "SELECT v.* FROM `tbl_villageagents` v WHERE v.`tbl_villageAgentId`='".$vaCode."'";
									$thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--1282"));
									while ($rows_sub=mysql_fetch_array($thisUser1))
									{
                                    $data.=$QueryManager->SubcountyFilterNoRegion($rows_sub['vAgentDistrict'],$rows_sub['vAgentSubcounty']);
									}
                                $data.="</select>";
                                $data.="</td>";
								
							$data.="<td valign='top'><input type='text' name='farmerVillage[]' id='farmerVillage1'></td>";
							$data.="<td valign='top'><p>
							  <select name='sexIndividual[]' id='sexIndividual1'>
								<option value=''>-select-</option>";
								$arrStatus=array('Male','Female');
									$k = 0; 
									foreach ($arrStatus as $var) {
										$data.="<option value=\"".$var."\">".$var."</option>";
										$k++;
									}
							  $data.="</select>
							</td>";
							$data.="<td valign='top'><input maxlength='13' value=\"+256\" type='text' name='telIndividual[]' id='telIndividual1'></td>";
							//Action table cell
							
							$data.="<td><input  type='button' class='formButton2'name='Remove Member' TITLE='Remove Member' value='Remove Member' onclick=\"removeMember(this)\" /></td>
						</tr>";
					$data.="<tr class='evenrow'><td valign='top' colspan='10'>
					<input  type='button' class='formButton2'name='Remove Household' TITLE='Remove Household' value='Remove Household' onclick=\"removeHousehold(this)\" />
					<input  type='button' class='formButton2'name='Add Member' TITLE='Add Member' value='Add Member' onclick=\"addMember(this,'evenrow member')\" /></td></tr>";	
					$data.="</tbody>";
						
						$data.="</table>";
		
        $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              

$data.="</table>";




$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
$obj->call("validateForm7"); 
return $obj;
}

function save_form7($formValues){
$obj = new xajaxResponse();

@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`tbl_villageagent_groupsId`) as tbl_villageagent_groupsId  FROM `tbl_villageagent_groups`";
/* $Qcheck=@Execute($stmnt_check)or die(http(__line__)); */
$Qcheck=@Execute($stmnt_check)or die(http(__line__));

$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$lastGroupId=$Rcheck['tbl_villageagent_groupsId'];
$nextGroupId=($lastGroupId+$y);
$tbl_villageagent_groupsId=$nextGroupId;  
    
}
else
{

$initialGroupId=$y;
$tbl_villageagent_groupsId=$initialGroupId;  
}

$tbl_villageAgentId=$formValues['nameVA'];
$tbl_tradersId=$formValues['nameTrader'];
$reportingPeriodVA=$_SESSION['quarter'];
$groupName=$formValues['groupName'];
$groupType=$formValues['groupType'];
$groupCode=$formValues['groupCode'];
$dateGroupStarted=$formValues['dateGroupStarted'];
$groupStatus=$formValues['groupStatus'];
$numMembersFemale=$formValues['numMembersFemale'];
$numMembersMale=$formValues['numMembersMale'];
$numMembersTotal=($numMembersFemale+$numMembersMale);
$groupDistrict=$formValues['groupDistrict'];
$date1 = "2013-06-01";
$year=date('Y');



$st="SELECT * FROM `tbl_district` WHERE `districtName`='".$groupDistrict."'";

$qst=@Execute($st)or die(http(__line__));
if(!$qst){ $obj->alert("CPM MIS could not save this form 7. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }
$rowST=mysql_fetch_array($qst);
$district=$rowST['districtCode'];
$groupSubcounty=$formValues['groupSubcounty'];
$groupVillage=$formValues['groupVillage'];

if(($tbl_tradersId<>''
    OR $tbl_tradersId<>0
    OR $tbl_villageAgentId<>''
    OR $tbl_villageAgentId<>0) AND
   ($groupName<>''
    OR $groupName<>0)) {
    $groupIdCheck="select `vg`.*, `vg`.`groupCode` as `lastGroupCode`,`v`.`vAgentCode`
                                from `tbl_villageagent_groups` as `vg`,`tbl_villageagents` as `v`
                                where `v`.`tbl_villageAgentId`=`vg`.`tbl_villageAgentId`
    and `vg`.`groupCode`='".$groupCode."'";
    
    $qCheckId=@Execute($groupIdCheck)or die(http(__line__));
    $rowId=@FetchRecords($qCheckId);
    $lastGroupCode=$rowId['lastGroupCode'];
    $vaCodes=$rowId['vAgentCode'];
    
    if($lastGroupCode<>null or $lastGroupCode<>'' and $groupName<>'No Group'){
      
      
                                            
                                           
                                            $newId=str_replace("".$vaCodes."-","",$lastGroupCode);
                                            $nextGroupCode="".$vaCodes."-".($newId+1);
                                           
                                            
      $stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`, `tbl_villageAgentId`,
                                            `reportingPeriod`, `groupName`,`groupType`,`groupCode`,
                                            `dateGroupStarted`, `groupStatus`,
                                            `numMembersFemale`, `numMembersMale`,
                                            `numMembersTotal`, `groupDistrict`,
                                            `groupSubcounty`, `groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."', '".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".mysql_real_escape_string($groupType)."','".$nextGroupCode."',
											'".$dateGroupStarted."','".$groupStatus."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
        
    }else if($groupName=='No Group'){
		$groupCode='0-00-00-01';
		$stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`,`tbl_villageAgentId`,
                                            `reportingPeriod`, `groupName`,`groupType`,`groupCode`,
											`dateGroupStarted`,`groupStatus`,`numMembersFemale`,
											`numMembersMale`,`numMembersTotal`,`groupDistrict`,
                                            `groupSubcounty`,`groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."','".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".mysql_real_escape_string($groupType)."','".$groupCode."',
											'".$dateGroupStarted."','".$groupStatus."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
		
	}else{
    
    
    $stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`,`tbl_villageAgentId`,
                                            `reportingPeriod`, `groupName`,`groupType`,`groupCode`,
											`dateGroupStarted`,`groupStatus`,`numMembersFemale`,
											`numMembersMale`,`numMembersTotal`,`groupDistrict`,
                                            `groupSubcounty`,`groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."','".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".mysql_real_escape_string($groupType)."','".$groupCode."',
											'".$dateGroupStarted."','".mysql_escape_string($groupStatus)."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
        }        

		
		$date2 = $dateGroupStarted;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("The date suplied for\n 'Date when You started working with the group' is invalid.\n It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		} 
		
		/* $obj->alert($stmnt_group); */
		$query=@Execute($stmnt_group)or die(http(__line__));
		
		if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
				   Please make sure all the data to be supplied is correct.");
		 $obj->call("hidemyLoaderDiv"); 	   
		  return $obj;
		 }


for($x=0;$x<$formValues['numberOfHouseholds'];$x++){
$hhName=$formValues['hhName'][$x];
$hhDob=$formValues['hhDob'][$x];
$hhSex=$formValues['hhSex'][$x];
$hhHeadDStart=$formValues['hhHeadDStart'][$x];
$hhArea=$formValues['hhArea'][$x];
$hsComposition=$formValues['hsComposition'.($x+1)];

$childStart=$formValues['childStart'][$x];
$childStop=$formValues['childStop'][$x];

/* $obj->alert('childStart='.$childStart.' childStop='.$childStop); */

for($y=$childStart;$y<=$childStop;$y++){ 
 
$nameIndividual=$formValues['nameIndividual'.$y];

$z=(($childStart === $y))?($y-1):$y;

$farmerCrop =$formValues['farmerCrop'.($z+1)];

//$obj->alert('farmerCropValue='.implode(",",$farmerCrop));


$memberDstart=$formValues['memberDstart'.$y];
//$obj->alert($memberDstart);
$memberStatus=$formValues['memberStatus'.$y];
$farmersDob=$formValues['farmersDob'.$y];
if($farmersDob==''){
$dirtyBd='1800-01-01';
$farmersDob=$dirtyBd;
}
$farmerSubcounty=$formValues['farmerSubcounty'.$y];
$farmersVillage=$formValues['farmerVillage'.$y];
$sexIndividual=$formValues['sexIndividual'.$y];
$telIndividual=$formValues['telIndividual'.$y];


if($nameIndividual<>''OR $nameIndividual<>0) {

$stmnt_grMembers="INSERT INTO `tbl_farmers`(`tbl_tradersId`, `tbl_villageAgentId`,`tbl_villageagent_groupsId`, 
                                            `reportingPeriod`, `groupName`,`farmersDistrict`,`farmersSubcounty`,
                                            `farmersName`,`farmerCrop`,`memberDstart`,`memberStatus`,`farmersDob`,`farmersVillage`, `farmersSex`, `farmersTel`,
											`hhName`,`hhDob`,`hhSex`,`hhHeadDStart`,`hhArea`,`hsComposition`,`submittedBy`,`updatedBy`,`year`)
                                                        VALUES
                                                    ('".$tbl_tradersId."', '".$tbl_villageAgentId."','".$tbl_villageagent_groupsId."',
                                            '".$reportingPeriodVA."','".$groupName."','".$district."','".$farmerSubcounty."',
                                            '".$nameIndividual."','".implode(",",$farmerCrop)."','".$memberDstart."','".$memberStatus."','".$farmersDob."','".$farmersVillage."','".$sexIndividual."', '".$telIndividual."',
											'".$hhName."','".$hhDob."','".$hhSex."','".$hhHeadDStart."','".$hhArea."','".implode(",",$hsComposition)."','".$_SESSION['username']."','".$_SESSION['username']."','".$year."')";


											
		$date2 = $hhHeadDStart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		}

		$date2 = $memberDstart;
		$dateTimestamp1 = strtotime($date1);
		$dateTimestamp2 = strtotime($date2);
		 
		if ( $dateTimestamp2 < $dateTimestamp1){
		$obj->alert("One of the dates suplied for:\n 'Date-started working with Household  member'\n is invalid. It cannot be before 1st.June.2013 when CPM started.");
		$obj->call("hidemyLoaderDiv"); 
		return $obj;
		} 			
											
/* $obj->alert($stmnt_grMembers); */
$query=@Execute($stmnt_grMembers)or die(http(__line__));

if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
				   Please make sure all the data to be supplied is correct.");
		 $obj->call("hidemyLoaderDiv"); 	   
		  return $obj;
		 }


}
//End of validation farmers

}
//End of collection farmers

}
//End of collection house hold data




}
else{
 $obj->alert("CPM MIS could not make this form 7 modification. \n
            Please make sure all the data to be supplied is correct.");
			$obj->call("hidemyLoaderDiv"); 
            return $obj;   
    
}

###Start with query to reset table values...
$sAutoM="SELECT count(*) as maleFarmers FROM `tbl_farmers` 
WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'
and `farmersSex` = 'Male'";
$qAutoM=@Execute($sAutoM) or die(http(1162));
$rowM=mysql_fetch_array($qAutoM);
$numMales=$rowM['maleFarmers'];


$sAutoF="SELECT count(*) as femaleFarmers FROM `tbl_farmers` 
WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'
and `farmersSex` = 'Female'";
$qAutoF=@Execute($sAutoF) or die(http(1170));
$rowF=mysql_fetch_array($qAutoF);
$numFemales=$rowF['femaleFarmers'];

$sAutoTot="SELECT count(*) as TotalFarmers FROM `tbl_farmers` 
WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";
$qAutoTot=@Execute($sAutoTot) or die(http(1176));
$rowTot=mysql_fetch_array($qAutoTot);
$numTotal=$rowTot['TotalFarmers'];


 $st_grps2="UPDATE `tbl_villageagent_groups`
 SET `numMembersFemale`='".$numFemales."',
 `numMembersMale`='".$numMales."',
 `numMembersTotal`='".$numTotal."'
 WHERE `tbl_villageagent_groupsId`='".$tbl_villageagent_groupsId."'";

 $query=@Execute($st_grps2)or die(http(__line__));

@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
$obj->call("hidemyLoaderDiv"); 
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_form7','','','','',1,20); 
return $obj; 
}
function view_villageAgent($tbl_villageAgentId){
$obj = new xajaxResponse();
$QueryManager=new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>
<table width='100%' cellpadding='1' border='0' cellspacing='1'>";
 $data.="<tr class=''>
          <td colspan='8'>
          <div id='status'></div>
         </td>
        </tr>";
$data.="<tr CLASS='evenrow'><th colspan='10'><center>VILLAGE AGENT DETAILS</center></th></tr>";
$st_vAgent="SELECT v.*, t.*, d.*, s.*
FROM  `tbl_villageagents` v,  `tbl_traders` t , `tbl_district` d, `tbl_subcounty` s
WHERE v.`tbl_villageAgentId`='".$tbl_villageAgentId."' 
AND t.`tbl_tradersId`=v.`tbl_tradersId`
AND v.`vAgentDistrict`=d.`districtCode`
AND s.`districtCode`=v.`vAgentDistrict`
AND v.`vAgentSubcounty`=s.`subcountyCode`
AND v.`display`='Yes'";

$sel=@Execute($st_vAgent)or die(http(__line__));
while($row_vAgent=FetchRecords($sel)){

$data.="<table width='100%' cellpadding='1' cellspacing='1'>
        <tr class='white1'>
        <td colspan='22'>
        <table width='100%' height='226' border='0' cellpadding='1' cellspacing='1'>
   <tr>
     <td><strong>VA's Trader Name:</strong></td>
     <td>".$row_vAgent['traderName']."</td>
   </tr>
   <tr>
     <td><strong>VA's Trader Code:</strong></td>
     <td>".$row_vAgent['traderCode']."</td>
   </tr>
   <tr>
     <td><strong>VA Name:</strong></td>
     <td>".$row_vAgent['vAgentName']."</td>
   </tr>
   <tr>
     <td><strong>VA Code:</strong></td>
     <td>".$row_vAgent['vAgentCode']."</td>
   </tr>
   <tr>
     <td><strong>VA's District:</strong></td>
     <td>".$row_vAgent['districtName']."</td>
   </tr>
   <tr>
     <td><strong>VA's Subcounty:</strong></td>
     <td>".$row_vAgent['subcountyName']."</td>
   </tr>
   <tr>
     <td><strong>VA's Crops:</strong></td>";
	$b=$row_vAgent['traderCropBeans'];
	$c=$row_vAgent['traderCropCoffee'];
	$m=$row_vAgent['traderCropMaize'];
	$sanB=($b=='Yes')?"Beans,":"";
	$sanC=($c=='Yes')?"Coffee,":"";
	$sanM=($m=='Yes')?"Maize,":"";
	$cropString="".$sanB."".$sanC."".$sanM."";
	$vaCrops=substr($cropString, 0, -1);
    $data.="<td>".$vaCrops."</td>";
    $data.="</tr>
   <tr>
     <td><strong>VA's Telephone:</strong></td>
     <td>".$row_vAgent['vAgentTel']."</td>
   </tr>
 </table>";
 
 $data.="<tr class='evenrow'><th colspan='22'>GROUPS:</th></tr>
        <tr class='evenrow'>
                                <th rowspan='2'>#</th>
                                <th rowspan='2'>Name of Group / Community Based Organization</th>
                                <th rowspan='2'>CODE</th>
                                <th rowspan='2'>Type of Group</th>
                                
                                <th colspan='3'>No.of members</th>
                                <th colspan='3'>Location</th>
                                <th colspan='2' rowspan='2'>Action</th>
                              </tr>
                              <tr class='evenrow'>
                                <th>Female</th>
                                <th><strong>Male</strong></th>
                                <th><strong>Total</strong></th>
                                <th>District</th>
                                <th>Sub-County</th>
                                <th>Village</th>
                              </tr>";
    $g=1;
    $st_groups="SELECT g.*,d.*,s.* FROM `tbl_villageagent_groups` g, `tbl_district` d, `tbl_subcounty` s
    WHERE g.`tbl_villageAgentId` ='".$row_vAgent['tbl_villageAgentId']."'
	and `g`.`display`='Yes'
    AND g.`groupDistrict`=d.`districtCode`
    AND g.`groupSubcounty`=s.`subcountyCode`
	order by `g`.`groupName` asc";
    
      $q_groups=@Execute($st_groups)or die(http(__line__));
        while($row_vAgentGroups=FetchRecords($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".<input type='checkbox'  name='tbl_villageagent_groupsId[]' id='tbl_villageagent_groupsId".$g."' value='".$row_vAgentGroups['tbl_villageagent_groupsId']."'/>
        <input name='loopkey[]' id='loopkey".$g."' type='hidden' value='1'/></td>";
                                $data.="<td>".$row_vAgentGroups['groupName']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupCode']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupStatus']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersFemale']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersMale']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersTotal']."</td>";
                                $data.="<td>".$row_vAgentGroups['districtName']."</td>";
                                $data.="<td>".$row_vAgentGroups['subcountyName']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupVillage']."</td>";
                                $data.="<td><input type='button' value='edit' onclick=\"xajax_edit_form7(xajax.getFormValues('form7'),'".$row_vAgentGroups['districtCode']."');return false;\" title='Edit' class='formButton2'></td>";
                                $data.="<td><input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form7'),'Delete_farmers');return false;\" align='left'></td>";
        $data.="</tr>";
        $g++;
        }
 
 }
 

            $data.="</td>
            </tr>
</table>";
 
$data.="</table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_vAgroup($tbl_villageAgentId){
$obj = new xajaxResponse();
$QueryManager=new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>
<table width='100%' cellpadding='1' border='0' cellspacing='1'>";
 $data.="<tr class=''>
          <td colspan='8'>
          <div id='status'></div>
         </td>
        </tr>";
		
$data.="<tr CLASS='evenrow'><th colspan='22'><center>VILLAGE AGENT DETAILS</center></th></tr>";
$st_vAgent="SELECT v.*, t.*, d.*, s.*
FROM  `tbl_villageagents` v,  `tbl_traders` t , `tbl_district` d, `tbl_subcounty` s
WHERE v.`tbl_villageAgentId`='".$tbl_villageAgentId."' 
AND t.`tbl_tradersId`=v.`tbl_tradersId`
AND v.`vAgentDistrict`=d.`districtCode`
AND s.`districtCode`=v.`vAgentDistrict`
AND v.`vAgentSubcounty`=s.`subcountyCode`
AND v.`display`='Yes'";

$sel=@Execute($st_vAgent)or die(http(__line__));
while($row_vAgent=FetchRecords($sel)){


 
 $data.="<tr class='evenrow'><th colspan='8'>GROUPS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
 <a href='export_to_excel_word.php?linkvar=Export Group&&format=excel'>
 <div align='right'>
 <th colspan='3'>
                  <input name='export_group' type='button' class='formButton2'value='Export to Excel'></a> |
                  <a href='print_version.php?linkvar=Print Group&&format=Print' target='_blank'>
                  <input name='export_group' type='button' class='formButton2' value='Print Version'></a>
 </th>
 <th><input type='button' value='Back' onclick=\"xajax_view_form7('','','','',1,20);return false;\" title='Back' class='formButton2'></th>
 
 </div></tr>
        <tr class='evenrow'>
                                <th rowspan='2'>#</th>
                                <th rowspan='2'>Name of Group / Community Based Organization</th>
                                <th rowspan='2'>CODE</th>
                                <th rowspan='2'>Type of Group</th>
                                
                                <th colspan='3'>No.of members</th>
                                <th colspan='3'>Location</th>
                                <th colspan='2' rowspan='2'>Action</th>
                              </tr>
                              <tr class='evenrow'>
                                <th>Female</th>
                                <th><strong>Male</strong></th>
                                <th><strong>Total</strong></th>
                                <th>District</th>
                                <th>Sub-County</th>
                                <th>Village</th>
                              </tr>";
    $g=1;
    $st_groups="SELECT g.*,d.*,s.* FROM `tbl_villageagent_groups` g, `tbl_district` d, `tbl_subcounty` s
    WHERE g.`tbl_villageAgentId` ='".$row_vAgent['tbl_villageAgentId']."'
    and `g`.`display`='Yes'
	AND g.`groupDistrict`=d.`districtCode`
    AND g.`groupSubcounty`=s.`subcountyCode`
	order by `g`.`groupName` asc";
    
      $q_groups=@Execute($st_groups)or die(http(__line__));
        while($row_vAgentGroups=FetchRecords($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".<input type='checkbox'  name='tbl_villageagent_groupsId[]' id='tbl_villageagent_groupsId".$g."' value='".$row_vAgentGroups['tbl_villageagent_groupsId']."'/>
        <input name='loopkey[]' id='loopkey".$g."' type='hidden' value='1'/></td>";
                                $data.="<td>".$row_vAgentGroups['groupName']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupCode']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupStatus']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersFemale']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersMale']."</td>";
                                $data.="<td>".$row_vAgentGroups['numMembersTotal']."</td>";
                                $data.="<td>".$row_vAgentGroups['districtName']."</td>";
                                $data.="<td>".$row_vAgentGroups['subcountyName']."</td>";
                                $data.="<td>".$row_vAgentGroups['groupVillage']."</td>";
                                $data.="<td><input type='button' value='edit' onclick=\"xajax_edit_form7(xajax.getFormValues('form7'));return false;\" title='Edit' class='formButton2'></td>";
                                $data.="<td><input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form7'),'Delete_farmers');return false;\" align='left'></td>";
        $data.="</tr>";
        $g++;
        }
 
 }
 

            $data.="</td>
            </tr>
</table>";
 
$data.="</table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function view_vAfarmer($tbl_villageAgentId){
$obj = new xajaxResponse();
$QueryManager=new QueryManager('');
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['tbl_villageAgentId']=$tbl_villageAgentId;
$data="<form action=\"".$PHP_SELF."\" name='viewfarmer' id='viewfarmer' method='post'>
<table width='100%' cellpadding='1' border='0' cellspacing='1'>"; 
$data.="<tr class='evenrow'>
	<th colspan='22'>
	<center>FARMER DETAILS</center>
	</th>
</tr>";

$st_vAgent="select v.* from`tbl_villageagents` v where v.`tbl_villageAgentId`='".$tbl_villageAgentId."' ";
$sel=@Execute($st_vAgent)or die(http(1479));
$row_vAgent=FetchRecords($sel);

$data.="<tr class='evenrow'><th colspan='5'>FARMERS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
	<div align='right'>
		<th colspan='5'>
		<input type='button' value='Back' onclick=\"xajax_view_form7('','','','',1,20);return false;\" title='Back' class='formButton2'>
		</th>
	</div>
</tr>";

$data.="<tr>
    <td class='offwhite' colspan='11' align='right'>
		<a href='export_to_excel_word.php?linkvar=Export Farmer List&&tbl_villageAgentId=".$tbl_villageAgentId."&&format=excel'>
		<input type='button' class='formButton2' id='button' name='export' value='Export to Excel'/>
		</a>
		<a  target='_blank' href='print_version.php?linkvar=Print Export Farmer List&&tbl_villageAgentId=".$tbl_villageAgentId."&&format=Print'>
		<input type='button' class='formButton2' id='button' name='print' value='Print Version'/>
		</a>
	</td>
</tr>";

$data.="<tr class='evenrow'>
	<th>#<img src='' width='30' height='0.2'/></th>
	<th>Farmer Code</th>
	<th>Farmer Name<img src='' width='100' height='0.2'/></th>
	<th>Group Name<img src='' width='250' height='0.2'/></th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Start Date</th>
	<th>New/Old</th>
	<th>Farmer Tel</th>
</tr>";
$g=1;
$st_groups="select `f`.`tbl_farmersId`,`f`.`farmersName`, `f`.`farmersTel`,
`v`.`vAgentName`, `g`.`groupName`,`g`.`groupCode`,
`d`.`districtName`, `s`.`subcountyName`,
`f`.`memberDstart`, `f`.`memberStatus`
from `tbl_farmers` as `f`,
`tbl_villageagents` as `v`, 
`tbl_villageagent_groups` as `g`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`
where `f`.`tbl_villageAgentId`='".$row_vAgent['tbl_villageAgentId']."'
and `v`.`tbl_villageAgentId` = `f`.`tbl_villageAgentId`
and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
and `g`.`display`='Yes'
and `f`.`farmersDistrict`=d.`districtCode`
and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` desc";
    
$q_groups=@Execute($st_groups)or die(http(1526));
while($rfarmer=FetchRecords($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".</td>";
		$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
		$data.="<td>".$rfarmer['farmersName']."</td>";
		$data.="<td>".$rfarmer['groupName']."</td>";
		$data.="<td>".$rfarmer['groupCode']."</td>";
		$data.="<td>".$rfarmer['districtName']."</td>";
		$data.="<td>".$rfarmer['subcountyName']."</td>";
		$data.="<td>".$rfarmer['memberDstart']."</td>";
		$data.="<td>".$rfarmer['memberStatus']."</td>";
		$farmerTel=($rfarmer['farmersTel']);
		if(($farmerTel)=='+256'){$tel='-';}else{$tel=$farmerTel;}
		$data.="<td>".$tel."</td>";
        $data.="</tr>";
        $g++;
        }
		
$data.="<tr>
    <td class='offwhite' colspan='11' align='right'>";
		$data.="<a href='export_to_excel_word.php?linkvar=Export Farmer List&&tbl_villageAgentId=".$tbl_villageAgentId."&&format=excel'>
		<input type='button' class='formButton2' id='button' name='export' value='Export to Excel'/>
		</a>
		<a  target='_blank' href='print_version.php?linkvar=Print Export Farmer List&&tbl_villageAgentId=".$tbl_villageAgentId."&&format=Print'>
		<input type='button' class='formButton2' id='button' name='print' value='Print Version'/>
		</a>
	</td>
</tr>";

$data.="</table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}
function getSampledFarmers($formValues){
$obj = new xajaxResponse();
//$_SESSION['sampled_form7']='';

$data="<table width='100%' cellpadding='1' border='1' cellspacing='1'>"; 
$data.="<tr class='evenrow'>
	<th colspan='9'>
	<center>SAMPLED FARMER DETAILS</center>
	</th>
</tr>";
$data.="<tr class='evenrow'>
	<th>#</th>
	<th>Farmer Code</th>
	<th>Farmer Name</th>
	<th>Group Name</th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Start Date</th>
	<th>New/Old</th>
	<th>Farmer Tel</th>
</tr>";
$v=1;
//start of the selected farmer loop
for($x=0;$x<count($formValues['loopkey']);$x++){
	$selFarmerId=$formValues['tbl_farmersId'][$x];
	
	$sfarmers="select `f`.*,`g`.`groupName`,`g`.`groupCode`,
			`d`.`districtName`, `s`.`subcountyName`
			from `tbl_farmers` as `f`, 
			`tbl_villageagent_groups` as `g`,
			`tbl_district` as `d`,
			`tbl_subcounty` as `s`
			where `f`.`tbl_farmersId`='".$selFarmerId."'
			and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
			and `f`.`farmersDistrict`=d.`districtCode`
			and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` desc
			";
	


$q_groups=@Execute($sfarmers)or die(http(1590));
while($rfarmer=FetchRecords($q_groups)){
    
    $color=$v%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$v.".</td>";
		$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
		$data.="<td>".$rfarmer['farmersName']."</td>";
		$data.="<td>".$rfarmer['groupName']."</td>";
		$data.="<td>".$rfarmer['groupCode']."</td>";
		$data.="<td>".$rfarmer['districtName']."</td>";
		$data.="<td>".$rfarmer['subcountyName']."</td>";
		$data.="<td>".$rfarmer['memberDstart']."</td>";
		$data.="<td>".$rfarmer['memberStatus']."</td>";
		$farmerTel=($rfarmer['farmersTel']);
		if(($farmerTel)=='+256'){$tel='-';}else{$tel=$farmerTel;}
		$data.="<td>".$tel."</td>";
		$data.="</tr>";
        $v++;
        }
	}
$data.="</table>";
$_SESSION['sampled_form7']=$data;
$obj->redirect('export_to_excel_word.php?linkvar=Export Sampled Fom7&&format=excel');
//$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

include('save.php');
require_once('filters.php');

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
	<script type="text/javascript" src="js/form7Validation.js" language="javascript"></script>
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
				
				case "Form7": 
				?>
				xajax_view_form7('','','','',1,20);
				<?php
				break;
				default:
				#underConstruction("Under Construction!");xajax_new_form7('','','','','','');   
				break;

				}

				?>
			</script>
			</td>
          </tr>
        </table>
        </td>
      </tr>
    </table>
    </td>
    <td width="12%" bgcolor="#f0f0f0" >&nbsp;</td>
  </tr>
  <tr>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
    <td height="38"><?php require_once('connections/footer.php'); ?></td>
    <td height="38" bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
</table>
</td>
  </tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>

