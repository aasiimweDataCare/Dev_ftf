<?php
session_start();
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);



#--------------SET UP EXPORTER------
$xajax->register(XAJAX_FUNCTION,'setup_trader');
$xajax->register(XAJAX_FUNCTION,'reassign_trader');
$xajax->register(XAJAX_FUNCTION,'shift_trader');
$xajax->register(XAJAX_FUNCTION,'new_trader');
$xajax->register(XAJAX_FUNCTION,'save_trader');
$xajax->register(XAJAX_FUNCTION,'edit_trader');
$xajax->register(XAJAX_FUNCTION,'update_trader');
$xajax->register(XAJAX_FUNCTION,'delete_trader');

#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');
 
function setup_trader($trName,$trCode,$cur_page=1,$records_per_page=20){
    
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['trName']=$trName;
$_SESSION['trCode']=$trCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;
$trName=($_SESSION['trName']<>''?$_SESSION['trName']:$trName);
$trCode=($_SESSION['trCode']<>''?$_SESSION['trCode']:$trCode);




$data.="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";


$data.="
<tr>
	<td colspan='16'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td >
					<strong>Trader Name:</strong>
					<input type='text' name='trName' id='trName' />
					<strong>Trader Code:</strong>
					<input type='text' name='trCode' id='trCode' />
				
					<input name='search' type='button' class='formButton2' value='Go'
					onclick=\"xajax_setup_trader(getElementById('trName').value,getElementById('trCode').value);return false;\" /> | 
					<input name='new_trader' type='button' class='formButton2'value='New Trader' onclick=\"xajax_new_trader('','','','','','','');\"> |
				<a href='export_to_excel_word.php?linkvar=Export Traders Data&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
					<input name='export_trader' type='button' class='formButton2'value='Export to Excel'>
				</a> |
				<a href='print_version.php?linkvar=Print Traders Data&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
					<input name='export_trader' type='button' class='formButton2' value='Print Version'>
				</a>
				</td>
			</tr>	
		</table>
	</td>
</tr>";





$data.="<tr class='evenrow'>
	<th colspan='16'><div align='center'>TRADER DETAILS</div></th>
</tr>";


//===================data to be displayed=====================
$data.="<tr>
	<th class='first-cell-header'>#</th>
	<th colspan='2' class='large-cell-header'>Name</th>
	<th class='small-cell-header'>Trader Code</th>
	<th class='small-cell-header'>Trader Crops</th>
	<th class='small-cell-header'>Distance in Kilometers(Km)<br/>from CPM offices</th>
	<th class='small-cell-header'>Size of store</th>
	<th class='large-cell-header'>Trader Model</th>
	<th class='small-cell-header'>Date of recruitment</th>
	<th class='small-cell-header'>Trader Contact</th>
	<th class='small-cell-header'>Region</th>
	<th class='small-cell-header'>District</th>
	<th class='large-cell-header'>Subcounty</th>
	<th class='small-cell-header' colspan='2'>Village</th>
	<th class='largest-cell-header'>Action</th>
</tr>";
 
$query_string="SELECT 
`t`.`tbl_tradersId`, 
`t`.`traderName`, 
`t`.`traderDob`, 
`t`.`traderCode`, 
`t`.`traderModel`, 
`t`.`traderRadius`,
`t`.`traderStoreSize`,
IF(left((`t`.`traderTel`),8) = '+2560000', '-', (`t`.`traderTel`)) as traderTel,
`t`.`traderSex`, 
`t`.`traderLocation`,
`t`.`traderDateRecruited`, 
`t`.`traderRegion`,
`t`.`traderDistrict`,
`t`.`traderSubcounty`,
`t`.`traderVillage`,
`t`.`traderCropBeans`,
`t`.`traderCropCoffee`,
`t`.`traderCropMaize`, 
`t`.`contactPerson`,
`t`.`traderType`, 
`t`.`tradermouExpiryDate`,
`t`.`valueInputStock`,
`t`.`traderRecordKeepingSystem`,
`t`.`traderfinancialServices`,
`t`.`tradersavingsComponent`,
`t`.`tradernumFarmers`, 
`t`.`tradernumYouthGroups`, 
`t`.`tradervolPurchasedYr1`, 
`t`.`tradervolPurchasedYr2`,
`t`.`tradervolPurchasedYr3`,
`t`.`tradervolPurchasedYr4`, 
`t`.`tradervolPurchasedYr5`,
`t`.`tradervolPurchasedYr6`, 
`t`.`keyDecisionMaker1`,
`t`.`keyDecisionMaker2`,
`t`.`keyDecisionMaker3`, 
`t`.`keyDecisionMaker4`,
`t`.`traderLoan`,
`t`.`display`,
`t`.`enteredBy`, 
`t`.`timeDataEntry`, 
`t`.`updatedBy`,
z.`zoneName` , 
d.`districtName` , 
s.`subcountyName`
FROM `tbl_traders` t, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s
WHERE t.`traderRegion`  = z.`zoneCode`
and t.display='Yes'";
	
/* Filter parameters */
$trName=(!empty($trName))?" AND t.`traderName` LIKE '%".$trName."%' ":"";
$trCode=(!empty($trCode))?" AND t.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$trName.$trCode;
$query_string.=" and d.`districtCode`  = s.`districtCode`
and t.`traderDistrict`  = d.`districtCode`
and t.`traderSubcounty`  = s.`subcountyCode`
order by t.`tbl_tradersId` desc";

/* $obj->alert($query_string); */

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
$x=1;

while($rowTrader=mysql_fetch_array($new_query)){
	$color=$count%2==1?"evenrow":"white1";
	$data.="<tr class='alternating_rows'>
	<td>".$count.".<input type='hidden'  name='tbl_tradersId[]' id='tbl_tradersId".$count."' value='".$rowTrader['tbl_tradersId']."' />
	<input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/> </td>
	<td colspan='2'>".strtoupper(mysql_real_escape_string($rowTrader['traderName']))."</td>
	<td align='right'>&nbsp;".strtoupper(mysql_real_escape_string($rowTrader['traderCode']))."</td>";
	$b=$rowTrader['traderCropBeans'];
	$c=$rowTrader['traderCropCoffee'];
	$m=$rowTrader['traderCropMaize'];
	$sanB=($b=='Yes')?"Beans,":"";
	$sanC=($c=='Yes')?"Coffee,":"";
	$sanM=($m=='Yes')?"Maize,":"";

	$cropString="".$sanB."".$sanC."".$sanM."";
	$trCrops=substr($cropString, 0, -1);
	$data.="<td align='right'>&nbsp;".$trCrops."</td>";
	$data.="<td align='right'>&nbsp;".number_format(mysql_real_escape_string($rowTrader['traderRadius']))."</td>";
	$data.="<td align='right'>&nbsp;".number_format(mysql_real_escape_string($rowTrader['traderStoreSize']))."</td>
	<td>&nbsp;".strtoupper(mysql_real_escape_string($rowTrader['traderModel']))."</td>
	<td align='right'>".strtoupper(mysql_real_escape_string($rowTrader['traderDateRecruited']))."</td>
	<td align='right'>".strtoupper(mysql_real_escape_string($rowTrader['traderTel']))."</td>
	<td>".strtoupper(mysql_real_escape_string($rowTrader['zoneName']))."</td>
	<td>".strtoupper(mysql_real_escape_string($rowTrader['districtName']))."</td>
	<td>".strtoupper(mysql_real_escape_string($rowTrader['subcountyName']))."</td>
	<td colspan='2'>".strtoupper(mysql_real_escape_string($rowTrader['traderVillage']))."</td>";
	$data.="<td><input type='button' class='formButton2'TITLE='Edit' onclick=\"xajax_edit_trader('".$regionCode."','".$districtCode."','".$subcountyCode."','".$rowTrader['tbl_tradersId']."');return false;\" value='edit' />";
	$data.="<input type='button' class='formButton2' TITLE='Re-assign VAs' onclick=\"xajax_reassign_trader('".$rowTrader['tbl_tradersId']."');return false;\" value='Re-assign VAs' />";
	$data.="<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('trader'),'Delete_trader');return false;\">";
	$data.="</td>";
	$data.="</tr>";
	$count++;
}
$data.="".noRecordsFound($new_query,10)."";

//====================end of displayed data===================
/*
*display pages
*/
$data.="<tr align='right'>
<td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_setup_trader('".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_setup_trader('".$_SESSION['trName']."','".$_SESSION['trCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
//for($p=2;$p<$num_pages;$p++){
$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_setup_trader('".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_setup_trader('".$_SESSION['trName']."','".$_SESSION['trCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_setup_trader('".$_SESSION['trName']."','".$_SESSION['trCode']."','".$cur_page."',this.value)\">";
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
</table>
</form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");
return $obj;
}

function  reassign_trader($traderId){
$obj=new xajaxResponse();

$data="<form  name='reassignTr' id='reassignTr' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400' cellpadding='1' cellspacing='1'>";
			
			$x="select `t`.* FROM `tbl_traders` as `t` where `t`.`tbl_tradersId` = '".$traderId."'";
			$query=@Execute($x) or die(http(__line__));
			$result=FetchRecords($query);
			
                $data.="<tr>";
                $data.="<th colspan='2' scope='col'>RE-ASSIGNING  <font color='#012D65'>".$result['traderName']."'s MIS PROPERTIES </font> TO ANOTHER VILLAGE AGENT</th>";
                $data.="</tr>";
                
                
                 $data.="<tr class='evenrow'>";
                  $data.="<td><strong>Outgoing Trader:</strong><br /></td>";
                  $data.="<td>";
					
					$data.="<input type='hidden' name='oldTrader' id='oldTrader' value='".$result['tbl_tradersId']."' />";
                    $data.="<input type='text' disabled=disabled class='disabled' name='out_TR' id='out_TR' value='".$result['traderName']."'/>";
					$data.="</td>";
                $data.="</tr>";
                
                $data.="<tr class='evenrow'>";
                  $data.="<td><strong>Incoming Trader:</strong><br /></td>";
                  $data.="<td>";
                    $data.="<select name='in_TR' id='in_TR' style='width:100px;'>";
                    $data.="<option value=''>-select-</option>";
					
					$x = "SELECT t . * FROM `tbl_traders` t WHERE `t`.`tbl_tradersId` <> '".$traderId."' ORDER BY  t.`traderName`, t.`tbl_tradersId` ASC";
									$query=@Execute($x) or die(http(__line__));
									while ($rows_tr=FetchRecords($query)) {
										$data .= "<option value=\"" . $rows_tr['tbl_tradersId'] . "\">" . $rows_tr['traderName'] . "</option>";

									}
                    $data.="</select></td>";
					
                $data.="</tr>";
                
               $data.="<tr class='evenrow'>";
                  $data.="<td>&nbsp;</td>";
                  $data.="<td><input value='Save' id='shiftTrader' name='shiftTrader' onclick=\"loadingIcon(xajax.getFormValues('reassignTr'),'shift_trader');return false;\" type='button'></td>";
                $data.="</tr>";
              $data.="</table>";
              
              $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              
    $data.="</td>";
        $data.="</tr>";
  
$data.="</table>";
$data.="</form>";


$obj->assign('bodyDisplay','innerHTML',$data);

return $obj;
}

//shift Trader
function shift_trader($formvalues){
$obj=new xajaxResponse();
$QMobj=new QueryManager();

$outgoingTr=$formvalues['oldTrader'];
$incomingTr=$formvalues['in_TR'];

//Deactivate VA										
	$delTRStmnt="UPDATE tbl_traders 
	SET display = 'No' 
	WHERE tbl_tradersId = '".$outgoingTr."'";
		
		if($delTRStmnt<>''){
                $action = "Deleted and shifted All VAs, farmer groups and their farmers to another Trader .";
                $description=mysql_real_escape_string($delTRStmnt);
                $user=$_SESSION['username'];
                $oldValue=$outgoingTr;
                $newValue=$incomingTr;
                $table='tbl_traders';
                $id=$outgoingTr;
                $QMobj::logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                $query=@Execute($delTRStmnt) or die(http(__line__));
				
				//Shift VA
				$shiftVAstmnt="UPDATE tbl_villageagents SET tbl_tradersId='".$incomingTr."' 
				WHERE tbl_tradersId = '".$outgoingTr."'";
				$query=@Execute($shiftVAstmnt) or die(http(__line__));
				
				//shift Farmer Groups to new VA 
				$shiftGroupstmnt="UPDATE tbl_villageagent_groups 
				SET tbl_tradersId='".$incomingTr."'
				WHERE tbl_tradersId = '".$outgoingTr."'";
				$query=@Execute($shiftGroupstmnt) or die(http(__line__));	
				
				//shift Farmers to new VA 
				$shiftFarmersStmnt="UPDATE tbl_farmers 
				SET tbl_tradersId='".$incomingTr."'
				WHERE tbl_tradersId = '".$outgoingTr."'";		
				$query=@Execute($shiftFarmersStmnt) or die(http(__line__));	
				
            }
	
	$obj->call("hidemyLoaderDiv"); 
    $obj->assign('bodyDisplay','innerHTML',congMsg("Trader Shifted successfully!"));
    $obj->call('xajax_setup_trader','','',1,20);
return $obj;    
}


function  new_trader($regionalCode,$districtCode,$subCounty,$village){

$obj=new xajaxResponse();

$QueryManager=new QueryManager('');
    
//sessional values to be ratained
$_SESSION['traderName']=$traderName;
$_SESSION['village']=$village;




$data="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' cellpadding='1' cellspacing='1' width='400'>
                <tr>
                  <th colspan='3' scope='col'>TRADER DETAILS</th>
                  </tr>
                
                
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Region:</strong><br /></td>
                  <td><select name='traderRegion' id='traderRegion' style='width:218.18px;' onchange=\"xajax_new_trader(this.value,
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->regionalFilter($regionalCode); 
                    $data.="</select>      </td> 
                   </tr>
                   
                     <tr class='white1'>
                  <td colspan='2'><strong>District:</strong><br /></td>
                  <td><select name='traderDistrict' id='traderDistrict' style='width:218.18px;' onchange=\"xajax_new_trader('".$regionalCode."',
                       this.value,
                       '".$subCounty."',
                       '".$village."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->DistrictFilter($regionalCode,$districtCode);
                    $data.="</select></td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Subcounty:</strong><br /></td>
                  <td><select name='traderSubcounty' id='traderSubcounty' style='width:218.18px;' onchange=\"xajax_new_trader('".$regionalCode."',
                       '".$districtCode."',
                       this.value,
                       '".$village."');return false;\">
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->SubcountyFilter($regionalCode,$districtCode,$subCounty);
                    $data.="</select></td>
                </tr>
                <tr class='white1'>
                  <td colspan='2'><strong>Village:</strong><br /></td>
                  <td><input type='text' name='traderVillage' id='traderVillage' value='".$_SESSION['village']."' style='width:218.18px;' onchange=\"xajax_new_trader('".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       this.value);return false;\" /></td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Trader Name:</strong><br /></td>
                  <td>
                    <input type='text' name='traderName' id='traderName' value='".$_SESSION['traderName']."' style='width:218.18px;'  /></td>
                </tr>
                <tr class='white1'>
                  <td colspan='2'><strong>Date of birth/Business Commencement:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.traderDob);return false;\" hidefocus=''>
                    <input name='traderDob' id='traderDob' size='15'  readonly='readonly' type='text' style='width:180.18px;'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Date of Recruitment:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.traderDateRecruited);return false;\" hidefocus=''>
                    <input name='traderDateRecruited' id='traderDateRecruited' size='15'   readonly='readonly' type='text' style='width:180.18px'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>";
                $data.="<tr class='white1'>";
                  $data.="<td colspan='2'><strong>Trader Code Series:(eg for codes in <br> the range '1-1' onwards: <br/> select '1-' series)<br /></strong></td>";
                  $data.="<td>";
				  $data.="<select name='traderCodeSeries' id='traderCodeSeries' style='width:218.18px;'>";
				  $data.="<option value=''>--select Trader Code Series--</option>";
				  for($x=1; $x<=100; $x++){
					$data.="<option value='".$x."'>".$x."-</option>";  
				  }
				  $data.="</select>";
				  $data.="</td>";
                $data.="</tr>";
				
				$data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Distance in Kilometers(Km)<br>from CPM offices:</strong><br /></td>
                  <td><input type='text' name='traderRadius' id='traderRadius' onkeypress='return numbersonly(event, false)' style='width:218.18px;' /></td>
                </tr>";
				
				$data.="<tr class='white1'>
                  <td colspan='2'><strong>Size of Trader Store:</strong><br /></td>
                  <td><input type='text' name='traderStoreSize' id='traderStoreSize' onkeypress='return numbersonly(event, false)' style='width:218.18px;' /></td>
                </tr>";
				$data.="<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Model adopted:</strong><br /></td>
                  <td><select name='traderModel' id='traderModel' style='width:218.18px;'>";
						$data.="<option value=''>-select-</option>";
						$stmnt="SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='38' ORDER BY  l.`codeName` ASC";
						$qTech=@mysql_query($stmnt);
						while($row=@mysql_fetch_array($qTech)){
						 $data.="<option value=\"".$row['codeName']."\">".$row['codeName']."</option>";   
						}
						$data.="</select>";
                      $data.="</td>
                </tr>
				
                <tr class='white1'>
                  <td colspan='2'><strong>Telephone:</strong><br /></td>
                  <td><input type='text' name='traderTel' id='traderTel' value='+256' maxlength='13' style='width:218.18px;' /></td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Gender <i>(Consider majority if a Business)</i>:</strong><br /></td>
                  <td><select name='traderSex' id='traderSex' style='width:218.18px;'>
                    <option value=''>-select-</option>";
                    $gender=array('Male','Female');
                                        $i = 0; 
                                        foreach ($gender as $v) {
                                            $selected=($traderSex==$v)?"selected":"";
                                            $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
                
                <tr class='white1'>
                  <td colspan='2'><strong>Location:</strong></td>
                  <td><select name='traderLocation' id='traderLocation' style='width:218.18px;'>
                    <option value=''>-select-</option>";
                    $location=array('Urban','Rural');
                    //$location=sort($location);
                                        $i = 0; 
                                        foreach ($location as $l) {
                                            $selected=($exporterLocation==$l)?"selected":"";
                                            $data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
                
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2' rowspan='3'><strong>Crops</strong><br /></td>
                  <td colspan='2'><input type='checkbox' name='Beans' value='Yes' id='Beans' />
                    <strong>Beans</strong></td>
                    </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><input type='checkbox' name='Coffee' value='Yes' id='Coffee' />
                    <strong>Coffee</strong></td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><input type='checkbox' name='Maize' value='Yes' id='Maize' />
                    <strong>Maize</strong></td>
                </tr>";
				//start of additional coluimns
				$data.="
				<tr class='white1'>
					<td colspan='2'><strong>Contact person:</strong></td>
					<td><input type='text' name='cperson' id='cperson' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Type of Trader:</strong></td>
					<td>
					<select name='tr_type' id='tr_type' style='width:218.18px;'/>
					<option value=''>-select Type of Trader-</option>
					<option value='A'>A</option>
					<option value='B'>B</option>
					<option value='C'>C</option>
					<option value='D'>D</option>
					</select>
					</td>
				</tr>
				<tr class='white1'>
					<td colspan='2'><strong>MOU expiry date:</strong></td>
					<td>
						<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.trader.tr_mou_expiry_date);return false;\" hidefocus=''>
						<input name='tr_mou_expiry_date' id='tr_mou_expiry_date' size='15'  readonly='readonly' type='text' style='width:180.18px'>
						<img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'>
						</a>
					</td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Value of Input stock (UGX):</strong></td>
					<td><input type='text' name='value_input_stock' id='value_input_stock' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td colspan='2'><strong>Has record keeping system?</strong></td>
					<td>
					<select name='tr_record_keeping_system' id='record_keeping_system' style='width:218.18px;'/>
					<option value=''>-select-</option>
					<option value='Yes'>Yes</option>
					<option value='No'>No</option>
					</select>
					</td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Financial Services - Source of finance?</strong></td>
					<td><input type='text' name='tr_financial_services' id='tr_financial_services' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td colspan='2'><strong>Savings component?</strong></td>
					<td><input type='text' name='tr_savings_component' id='tr_savings_component' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Number of Farmers:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_num_farmers' id='tr_num_farmers' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td colspan='2'><strong>Youth groups:</strong></td>
					<td><input type='text' name='tr_num_youth_groups' id='tr_num_youth_groups' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				
				<tr class='ftfRpLevelTwo'>
					<td rowspan='6'><strong>Volumes purchased (Kg)</strong></td>
					<td align='right'><strong>Yr-2013:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr1' id='tr_vol_purchased_yr1' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td align='right'><strong>Yr-2014:</strong></td>
					<td ><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr2' id='tr_vol_purchased_yr2' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td align='right'><strong>Yr-2015:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr3' id='tr_vol_purchased_yr3' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td align='right'><strong>Yr-2016:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr4' id='tr_vol_purchased_yr4' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td align='right'><strong>Yr-2017:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr5' id='tr_vol_purchased_yr5' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td align='right'><strong>Yr-2018:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_vol_purchased_yr6' id='tr_vol_purchased_yr6' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td rowspan='4'><strong>Key decision makers:</strong></td>
					
					<td align='right'><strong>1</strong></td>
					<td><input type='text' name='key_decision_maker1' id='key_decision_maker1' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td align='right'><strong>2</strong></td>
					<td><input type='text' name='key_decision_maker2' id='key_decision_maker2' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td align='right'><strong>3</strong></td>
					<td><input type='text' name='key_decision_maker3' id='key_decision_maker3' style='width:218.18px;'/></td>
				</tr>
				<tr class='white1'>
					<td align='right'><strong>4</strong></td>
					
					<td><input type='text' name='key_decision_maker4' id='key_decision_maker4' style='width:218.18px;'/></td>
				</tr>
				<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Loan:</strong></td>
					<td><input class='disabled' disabled=disabled type='text' name='tr_loan' id='tr_loan' onkeypress='return numbersonly(event, false)' style='width:218.18px;'/></td>
				</tr>";
				
				//end of additional columns
				
                
              
                $data.="<tr>
                  <td colspan='2'>&nbsp;</td>
                  <td align='right'><input value='Save' name='saveTrader' onclick=\"loadingIcon(xajax.getFormValues('trader'),'save_trader');return false;\" type='button'></td>
                </tr>
              </table>";
              
              
              $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              
              
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//Save Village Agent
function save_trader($formvalues){
$obj=new xajaxResponse();
//$obj->addAlert('Hello World');

$traderName=$formvalues['traderName'];

$traderCodeSeries=$formvalues['traderCodeSeries'];

//===============Trader algorithm====================
$hyphen="-";
//The series will be picked by the user
//$traderCodeSeries = "1";
//default series
$stSeriesDefault="SELECT max(`traderCode`) as `lastSeriesCode` FROM `tbl_traders`";
$qSeriesDefault=@Execute($stSeriesDefault)or die(mysql_error() ." on  line 9");
$rowIdDefault=@FetchRecords($qSeriesDefault);
$lastDbSeriesCode=$rowIdDefault['lastSeriesCode'];
$stringBeforeHypen=strstr($lastDbSeriesCode, $hyphen, true);
$sCount=strlen($stringBeforeHypen);
$seriesTwo=substr($lastDbSeriesCode, 0, $sCount);

//Switch bween default and user chosen series
$series=(($traderCodeSeries<>'' || $traderCodeSeries<>null)?$traderCodeSeries:$seriesTwo);
   

//pick from db the highest value from series starting with selected series
$stSeries="SELECT max(`traderCode`) as `lastCode` FROM `tbl_traders` WHERE traderCode like '".$series."%'";
$qSeries=@Execute($stSeries)or die(mysql_error() ." on  line 11");
$rowId=@FetchRecords($qSeries);
$lastDbCode=$rowId['lastCode'];

//strip off first character up to the hyphen characters from last code
$stringSerieBeforeHypen=strstr($lastDbCode, $hyphen, true);
$sSerieCount=(strlen($stringSerieBeforeHypen)+1);
$lastCodeDigit=substr($lastDbCode, $sSerieCount);
$nextAvailableCodeDigit=($lastCodeDigit+1);
//append the zero if single digit
$nextCodeDigit=((strlen($nextAvailableCodeDigit))==1)?"0".$nextAvailableCodeDigit:$nextAvailableCodeDigit;
$nextTraderCode = "".$series."".$hyphen."".$nextCodeDigit."";
$traderCode=$nextTraderCode;	
//===============End of Trader algorithm====================




$traderRadius=$formvalues['traderRadius'];
$traderRadius = number_format($traderRadius, 4, '.', '');
$traderRadius = ($traderRadius !='' or $traderRadius !=0)?$traderRadius:0.000;

$traderStoreSize=$formvalues['traderStoreSize'];
$traderStoreSize = number_format($traderStoreSize, 4, '.', '');
$traderStoreSize = ($traderStoreSize !='' or $traderStoreSize !=0)?$traderStoreSize:0.000;

$traderModel=$formvalues['traderModel'];
$traderModel = ($traderModel !='' or $traderModel !=0)?$traderModel:null;

$traderDob=$formvalues['traderDob'];
$traderTel=$formvalues['traderTel'];
$traderSex=$formvalues['traderSex'];
$traderLocation=$formvalues['traderLocation'];
$traderDateRecruited=$formvalues['traderDateRecruited'];
$traderRegion=$formvalues['traderRegion'];
$traderDistrict=$formvalues['traderDistrict'];
$traderSubcounty=$formvalues['traderSubcounty'];
$traderVillage=$formvalues['traderVillage'];
$beans=$formvalues['Beans'];
$coffee=$formvalues['Coffee'];
$maize=$formvalues['Maize'];

$contactPerson  = $formvalues['cperson'];
$traderType  = $formvalues['tr_type'];
$tradermouExpiryDate  = $formvalues['tr_mou_expiry_date'];

$valueInputStock  = $formvalues['value_input_stock'];
$valueInputStock = number_format($valueInputStock, 4, '.', '');
$valueInputStock = ($valueInputStock !='' or $valueInputStock !=0)?$valueInputStock:0.000;

$traderRecordKeepingSystem  = $formvalues['tr_record_keeping_system'];
$traderfinancialServices  = $formvalues['tr_financial_services'];
$traderfinancialServices = ($traderfinancialServices !='' or $traderfinancialServices !=0)?$traderfinancialServices:null;
$tradersavingsComponent  = $formvalues['tr_savings_component'];
$tradersavingsComponent = ($tradersavingsComponent !='' or $tradersavingsComponent !=0)?$tradersavingsComponent:null;
 
$tradernumFarmers  = $formvalues['tr_num_farmers']; 
$tradernumFarmers = number_format($tradernumFarmers, 4, '.', '');
$tradernumFarmers = ($tradernumFarmers !='' or $tradernumFarmers !=0)?$tradernumFarmers:0.000;

$tradernumYouthGroups  = $formvalues['tr_num_youth_groups'];
$tradernumYouthGroups = number_format($tradernumYouthGroups, 4, '.', '');
$tradernumYouthGroups = ($tradernumYouthGroups !='' or $tradernumYouthGroups !=0)?$tradernumYouthGroups:0.000;

$tradervolPurchasedYr1  = $formvalues['tr_vol_purchased_yr1']; 
$tradervolPurchasedYr1 = number_format($tradervolPurchasedYr1, 4, '.', '');
$tradervolPurchasedYr1 = ($tradervolPurchasedYr1 !='' or $tradervolPurchasedYr1 !=0)?$tradervolPurchasedYr1:0.000;

$tradervolPurchasedYr2  = $formvalues['tr_vol_purchased_yr2'];
$tradervolPurchasedYr2 = number_format($tradervolPurchasedYr2, 4, '.', '');
$tradervolPurchasedYr2 = ($tradervolPurchasedYr2 !='' or $tradervolPurchasedYr2 !=0)?$tradervolPurchasedYr2:0.000;

$tradervolPurchasedYr3  = $formvalues['tr_vol_purchased_yr3']; 
$tradervolPurchasedYr3 = number_format($tradervolPurchasedYr3, 4, '.', '');
$tradervolPurchasedYr3 = ($tradervolPurchasedYr3 !='' or $tradervolPurchasedYr3 !=0)?$tradervolPurchasedYr3:0.000;

$tradervolPurchasedYr4  = $formvalues['tr_vol_purchased_yr4'];
$tradervolPurchasedYr4 = number_format($tradervolPurchasedYr4, 4, '.', '');
$tradervolPurchasedYr4 = ($tradervolPurchasedYr4 !='' or $tradervolPurchasedYr4 !=0)?$tradervolPurchasedYr4:0.000;

$tradervolPurchasedYr5  = $formvalues['tr_vol_purchased_yr5'];
$tradervolPurchasedYr5 = number_format($tradervolPurchasedYr5, 4, '.', ''); 
$tradervolPurchasedYr5 = ($tradervolPurchasedYr5 !='' or $tradervolPurchasedYr5 !=0)?$tradervolPurchasedYr5:0.000;

$tradervolPurchasedYr6  = $formvalues['tr_vol_purchased_yr6'];
$tradervolPurchasedYr6 = number_format($tradervolPurchasedYr6, 4, '.', ''); 
$tradervolPurchasedYr6 = ($tradervolPurchasedYr6 !='' or $tradervolPurchasedYr6 !=0)?$tradervolPurchasedYr6:0.000;

$keyDecisionMaker1  = $formvalues['key_decision_maker1'];
$keyDecisionMaker1 = ($keyDecisionMaker1 !='')?$keyDecisionMaker1:null;
$keyDecisionMaker2  = $formvalues['key_decision_maker2']; 
$keyDecisionMaker2 = ($keyDecisionMaker2 !='')?$keyDecisionMaker2:null;
$keyDecisionMaker3  = $formvalues['key_decision_maker3']; 
$keyDecisionMaker3 = ($keyDecisionMaker3 !='')?$keyDecisionMaker3:null;
$keyDecisionMaker4  = $formvalues['key_decision_maker4']; 
$keyDecisionMaker4 = ($keyDecisionMaker4 !='')?$keyDecisionMaker4:null;

$traderLoan  = $formvalues['tr_loan'];
$traderLoan = number_format($traderLoan, 4, '.', ''); 
$traderLoan = ($traderLoan !='' or $traderLoan !=0)?$traderLoan:0.000;

$stmnt_tr="INSERT INTO `tbl_traders`(`traderName`, `traderDob`,
                                    `traderCode`, `traderRadius`,`traderStoreSize`,`traderModel`,`traderTel`, `traderSex`,`traderLocation`,
                                    `traderDateRecruited`, `traderRegion`, `traderDistrict`,
                                    `traderSubcounty`, `traderVillage`, `traderCropBeans`,
                                    `traderCropCoffee`, `traderCropMaize`,
									`contactPerson`,
									`traderType`,
									`tradermouExpiryDate`,
									`valueInputStock`,
									`traderRecordKeepingSystem`,
									`traderfinancialServices`,
									`tradersavingsComponent`, 
									`tradernumFarmers`, 
									`tradernumYouthGroups`,
									`tradervolPurchasedYr1`, 
									`tradervolPurchasedYr2`,
									`tradervolPurchasedYr3`, 
									`tradervolPurchasedYr4`,
									`tradervolPurchasedYr5`, 
									`tradervolPurchasedYr6`, 
									`keyDecisionMaker1`,
									`keyDecisionMaker2`, 
									`keyDecisionMaker3`, 
									`keyDecisionMaker4`, 
									`traderLoan`
									)
                                            VALUES
                                            ('".$traderName."','".$traderDob."','".$traderCode."',
											'".$traderRadius."','".$traderStoreSize."','".$traderModel."',
                                            '".$traderTel."','".$traderSex."','".$traderLocation."',
                                            '".$traderDateRecruited."','".$traderRegion."',
                                            '".$traderDistrict."','".$traderSubcounty."',
                                            '".$traderVillage."','".$beans."',
                                            '".$coffee."','".$maize."',
											'".$contactPerson."',
											'".$traderType."',
											'".$tradermouExpiryDate."',
											'".$valueInputStock."',
											'".$traderRecordKeepingSystem."',
											'".$traderfinancialServices."',
											'".$tradersavingsComponent."', 
											'".$tradernumFarmers."', 
											'".$tradernumYouthGroups."',
											'".$tradervolPurchasedYr1."', 
											'".$tradervolPurchasedYr2."',
											'".$tradervolPurchasedYr3."', 
											'".$tradervolPurchasedYr4."',
											'".$tradervolPurchasedYr5."', 
											'".$tradervolPurchasedYr6."', 
											'".$keyDecisionMaker1."',
											'".$keyDecisionMaker2."', 
											'".$keyDecisionMaker3."', 
											'".$keyDecisionMaker4."', 
											'".$traderLoan."')";
//$obj->alert($stmnt_tr);                                           
@mysql_query($stmnt_tr)or die(http(__line__));
    $obj->call("hidemyLoaderDiv"); 
    $obj->assign('bodyDisplay','innerHTML',congMsg("Trader has been added successfully!"));
    $obj->call('xajax_setup_trader','','',1,20);
return $obj;    
}




 





$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>
<script language="javascript" type="text/javascript" src="js/check.js">


-->

</script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="css/loading.css" rel="stylesheet" type="text/css" />
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
<div align='center' height='900' id='dvLoading'>
	<span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span>
</div>    

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
									case "trader": 
								?>
									  xajax_setup_trader('','',1,20);
								  
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


</div>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
