<?php
session_start();
require_once('connections/lib_connect.php');




require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');


$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'setup_vAgent');
$xajax->register(XAJAX_FUNCTION,'reassign_vAgent');
$xajax->register(XAJAX_FUNCTION,'shift_vAgent');
$xajax->register(XAJAX_FUNCTION,'new_vAgent');
$xajax->register(XAJAX_FUNCTION,'save_vAgent');
$xajax->register(XAJAX_FUNCTION,'edit_vAgent');
$xajax->register(XAJAX_FUNCTION,'update_vAgent');
$xajax->register(XAJAX_FUNCTION,'delete_vAgent');



#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');
 
function setup_vAgent($vaName,$vaCode,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['vaName']=$vaName;
$_SESSION['vaCode']=$vaCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;
$vaName=($_SESSION['vaName']<>''?$_SESSION['vaName']:$vaName);
$vaCode=($_SESSION['vaCode']<>''?$_SESSION['vaCode']:$vaCode);


$data.="<form  name='vAgent' id='vAgent' method='post' action='".$_SERVER['PHP_SELF']."'>
<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>

<tr class='evenrow'>
	<td colspan='17'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td width='' colspan=''>
					<strong>Village Agent Name:</strong>
					<input type='text' name='vaName' id='vaName' />
					<strong>Village Agent Code:</strong>
					<input type='text' name='vaCode' id='vaCode' />
					<input name='search' type='button' class='formButton2' value='Go'
					onclick=\"xajax_setup_vAgent(getElementById('vaName').value,getElementById('vaCode').value);return false;\" />
					
					<input name='new_vAgent' type='button' class='formButton2' value='New Village Agent' onclick=\"xajax_new_vAgent('','','','','','','');\"> |
					<a href='export_to_excel_word.php?linkvar=Export Village Agent
					&&semi_annual=".$reportingPeriod."&&year=".$year."
					&&format=excel'>
					<input name='export_vAgent' type='button' class='formButton2'value='Export to Excel'></a> |";

					$data.="<a href='print_version.php?linkvar=Print Village Agent
					&&semi_annual=".$reportingPeriod."&&year=".$year."
					&&format=Print' target='_blank'>
					<input name='export_vAgent' type='button' class='formButton2' value='Print Version'></a>
				</td>
			</tr>
		</table>
	</td>
</tr>";




$data.="<tr class='evenrow'>
	<th colspan='17'>
		<div align='center'>VILLAGE AGENT DETAILS</div>
	</th>
</tr>";



//===================data to be displayed=====================
$data.="<tr>
	<th class='first-cell-header'>#</th>
	<th colspan='2' class='large-cell-header'>VA Name</th>
	<th class='small-cell-header'>VA Code</th>
	<th class='small-cell-header'>Trader Name</th>
	<th class='small-cell-header'>Trader Code</th>
	<th class='small-cell-header'>VA Crops</th>
	<th class='small-cell-header'>Type Of Agent</th>
	<th class='small-cell-header'>Size of VA store</th>
	<th class='small-cell-header'>VA Date of recruitment</th>
	<th class='small-cell-header'>VA Contact</th>
	<th class='small-cell-header'>VA Region</th>
	<th class='small-cell-header'>VA District</th>
	<th class='large-cell-header'>VA Subcounty</th>
	<th colspan='2' class='large-cell-header'>VA Village</th>
	<th class='largest-cell-header'>Action</th>
</tr>";


		$query_string="SELECT 
		`v`.`tbl_villageAgentId`,
		`v`.`tbl_tradersId`,
		`v`.`vAgentName`, 
		`v`.`vAgentDob`, 
		`v`.`vAgentCode`, 
		IF(left((`v`.`vAgentTel`),8) = '+2560000', '-', (`v`.`vAgentTel`)) as vAgentTel,
		`v`.`vAgentStoreSize`, 
		`v`.`vAgentSex`,
		`v`.`typeOfAgent`, 
		`v`.`vAgentLocation`,
		`v`.`vAgentDateRecruited`,
		`v`.`vAgentRegion`,
		`v`.`vAgentDistrict`,
		`v`.`vAgentSubcounty`,
		`v`.`vAgentVillage`,
		`v`.`vAgentCropBeans`, 
		`v`.`vAgentCropCoffee`,
		`v`.`vAgentCropMaize`,
		`v`.`display`, 
		t.`traderName`,
		t.`traderCode`,
		z.`zoneName` ,
		d.`districtName` ,
		s.`subcountyName`
		FROM `tbl_villageagents` v, `tbl_zone` z,
		`tbl_district` d, `tbl_subcounty` s, `tbl_traders` t
		WHERE v.`vAgentRegion` = z.`zoneCode`
		AND v.`tbl_tradersId`=t.`tbl_tradersId` ";

		//Filter parameters
		if($vaName<>'' and $vaCode<>''){
		$query_string.="
		AND v.`vAgentName` LIKE '%".$vaName."%'
		AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
		}elseif($vaName<>'' and $vaCode==''){
		$query_string.="AND v.`vAgentName` LIKE '%".$vaName."%' ";
		}elseif($vaName=='' and $vaCode<>''){
		$query_string.="AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
		}
		$query_string.="AND d.`districtCode` = s.`districtCode`
		AND v.`vAgentDistrict` = d.`districtCode`
		AND v.`vAgentSubcounty` = s.`subcountyCode`
		AND v.`display` = 'Yes'
		ORDER BY v.`tbl_villageAgentId` DESC";

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
			while($rowVagent=mysql_fetch_array($new_query)){
			
			$data.="
			<tr>";
				$data.="<td>".$count.".";
				$data.="<input type='hidden'  name='tbl_villageAgentId[]' id='tbl_villageAgentId".$count."' value='".$rowVagent['tbl_villageAgentId']."' />
				<input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/>";
				$data.="</td>";
				$data.="<td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentName']))."</td>
				<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentCode']))."</td>
				<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['traderName']))."</td>
				<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['traderCode']))."</td>";
				$b=$rowVagent['vAgentCropBeans'];
				$c=$rowVagent['vAgentCropCoffee'];
				$m=$rowVagent['vAgentCropMaize'];
				$sanB=($b=='Yes')?"Beans,":"";
				$sanC=($c=='Yes')?"Coffee,":"";
				$sanM=($m=='Yes')?"Maize,":"";

				$cropString="".$sanB."".$sanC."".$sanM."";
				$vaCrops=substr($cropString, 0, -1);
				$data.="<td align='right'>&nbsp;".$vaCrops."</td>";

				$typeOfAgent=$rowVagent['typeOfAgent'];
				$data.="<td align='left'>";
				if ($typeOfAgent<>null or $typeOfAgent<>''){
				$string = explode(",",$typeOfAgent);
				foreach ($string as $str) {
				$data.="&#10148".$str."<br/>";

				}
				}
				$data.="</td>";
				$data.="<td align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentStoreSize']))."</td>
				<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentDateRecruited']))."</td>
				<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentTel']))."</td>
				<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['zoneName']))."</td>
				<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['districtName']))."</td>
				<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['subcountyName']))."</td>
				<td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentVillage']))."</td>";
				$data.="<td>";
				$data.="<input type='button' class='formButton2' TITLE='Edit' onclick=\"xajax_edit_vAgent('".$regionCode."','".$_SESSION['districtCode']."','".$subcountyCode."','".$rowVagent['tbl_villageAgentId']."');return false;\" value='edit' />";
				$data.="<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('vAgent'),'Delete_vAgent');return false;\">";
				$data.="<input type='button' class='formButton2' TITLE='Re-assign' onclick=\"xajax_reassign_vAgent('".$rowVagent['tbl_villageAgentId']."');return false;\" value='Re-assign Farmers' />";
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
			<td colspan=17>";

			$p='';
			$num_links=10;
			$startAt_links=($cur_page-5);
			$endAt_links=($cur_page+$num_links);
			$cur_link=$cur_page;


			if($num_pages>1){
			$links=1;
			$append_bar=$p==$num_pages?"":"|";
			if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
			else $data.="<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
			//for($p=2;$p<$num_pages;$p++){
			$p=2;
			while($p<$num_pages){
			if(($p>$startAt_links) and ($p<$endAt_links)){
			$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			$p++;
			}
			if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_setup_vAgent('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			}


			$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_setup_vAgent('".$_SESSION['vaName']."','".$_SESSION['vaCode']."','".$cur_page."',this.value)\">";
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
function  reassign_vAgent($villageAgentId){
$obj=new xajaxResponse();

$data="<form  name='reassign' id='reassign' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400' cellpadding='1' cellspacing='1'>";
			
			$x="select `v`.* FROM `tbl_villageagents` as `v` where `v`.`tbl_villageAgentId` = '".$villageAgentId."'";
			$query=@Execute($x) or die(http(__line__));
			$result=FetchRecords($query);
			
                $data.="<tr>";
                $data.="<th colspan='2' scope='col'>RE-ASSIGNING  <font color='#012D65'>".$result['vAgentName']."'s MIS PROPERTIES </font> TO ANOTHER VILLAGE AGENT</th>";
                $data.="</tr>";
                
                
                 $data.="<tr class='evenrow'>";
                  $data.="<td><strong>Outgoing Village Agent:</strong><br /></td>";
                  $data.="<td>";
					
					$data.="<input type='hidden' name='old_VA' id='old_VA' value='".$result['tbl_villageAgentId']."'/>";
                    $data.="<input type='text' disabled=disabled class='disabled' name='out_VA' id='out_VA' value='".$result['vAgentName']."'/></td>";
                $data.="</tr>";
                
                $data.="<tr class='evenrow'>";
                  $data.="<td><strong>Incoming Village Agent:</strong><br /></td>";
                  $data.="<td>";
                    $data.="<select name='in_VA' id='in_VA' style='width:100px;'>";
                    $data.="<option value=''>-select-</option>";
					
					$x = "SELECT v . * FROM `tbl_villageagents` v WHERE `v`.`tbl_villageAgentId` <> '".$villageAgentId."' ORDER BY  v.`vAgentName`, v.`tbl_villageAgentId` ASC";
									$query=@Execute($x) or die(http(__line__));
									while ($rows_va=FetchRecords($query)) {
										$data .= "<option value=\"" . $rows_va['tbl_villageAgentId'] . "\">" . $rows_va['vAgentName'] . "</option>";

									}
                    $data.="</select></td>";
					$xTr = "SELECT v . * FROM `tbl_villageagents` v WHERE `v`.`tbl_villageAgentId` <> '".$villageAgentId."' ORDER BY  v.`vAgentName`, v.`tbl_villageAgentId` ASC";
									$query=@Execute($xTr) or die(http(__line__));
									$rows_tr=FetchRecords($query);
					$data.="<input type='hidden' name='in_TR' id='in_TR' value='".$rows_tr['tbl_tradersId']."'/>";
                $data.="</tr>";
                
               $data.="<tr class='evenrow'>";
                  $data.="<td>&nbsp;</td>";
                  $data.="<td><input value='Save' id='shiftVillageAgent' name='shiftVillageAgent' onclick=\"loadingIcon(xajax.getFormValues('reassign'),'shift_vAgent');return false;\" type='button'></td>";
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
//shift Village Agent
function shift_vAgent($formvalues){
$obj=new xajaxResponse();
$QMobj=new QueryManager();

$outgoingVa=$formvalues['old_VA'];
$incomingTr=$formvalues['in_TR'];
$incomingVa=$formvalues['in_VA'];

//Deactivate VA										
	$delVAStmnt="UPDATE `tbl_villageagents` 
	SET `display`='No' 
	WHERE `tbl_villageAgentId` = '".$outgoingVa."'";
		
	
	if($delVAStmnt<>''){
                $action = "Deleted and shifted both farmer groups and their farmers to another Village Agent .";
                $description=mysql_real_escape_string($delVAStmnt);
                $user=$_SESSION['username'];
                $oldValue=$outgoingVa;
                $newValue=$incomingVa;
                $table='tbl_villageagents';
                $id=$outgoingVa;
                $QMobj->logUserAction($action,$description,$user,$oldValue,$newValue,$table,$id);
                $query=@Execute($delVAStmnt) or die(http(__line__));
				/* $obj->alert($description); */
				
				//shift Farmer Groups to new VA 
				$shiftGroupstmnt="UPDATE `tbl_villageagent_groups` 
				SET `tbl_villageAgentId`='".$incomingVa."',
					`tbl_tradersId`='".$incomingTr."'
				WHERE `tbl_villageAgentId` = '".$outgoingVa."'";
				$query=@Execute($shiftGroupstmnt) or die(http(__line__));	
				
				//shift Farmers to new VA 
				$shiftFarmersStmnt="UPDATE `tbl_farmers` 
				SET `tbl_villageAgentId`='".$incomingVa."',
					`tbl_tradersId`='".$incomingTr."'
				WHERE `tbl_villageAgentId` = '".$outgoingVa."'";		
				$query=@Execute($shiftFarmersStmnt) or die(http(__line__));	
				
            }
	
	$obj->call("hidemyLoaderDiv"); 
    $obj->assign('bodyDisplay','innerHTML',congMsg("Village Agent Shifted successfully!"));
    $obj->call('xajax_setup_vAgent','','',1,20);
return $obj;    
}
function  new_vAgent($regionalCode,$districtCode,$subCounty,$village){

$obj=new xajaxResponse();

$qmobj=new QueryManager('');
//sessional values to be ratained
$_SESSION['regionalCode']=$regionalCode;
$_SESSION['districtCode']=$districtCode;
$_SESSION['subCounty']=$subCounty;
$_SESSION['village']=$village;




$data="<form  name='vAgent' id='vAgent' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400' cellpadding='1' cellspacing='1'>
                <tr>
                  <th colspan='2' scope='col'>NEW VILLAGE AGENT DETAILS</th>
                  </tr>
                
                
                
                <tr class='evenrow'>
                  <td><strong>Region:</strong><br/></td>
                  <td><select name='vAgentRegion' id='vAgentRegion' style='width:100px;' onchange=\"xajax_new_vAgent(
                       this.value,
                       '".$_SESSION['districtCode']."',
                       '".$_SESSION['subCounty']."',
                       '".$_SESSION['village']."'
                       );return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$qmobj->regionalFilter($_SESSION['regionalCode']); 
                    $data.="</select>      </td> 
                   </tr>
                   
                  <tr class='evenrow'>
                  <td><strong>District:</strong><br /></td>
                  <td><select name='vAgentDistrict' id='vAgentDistrict' style='width:100px;' onchange=\"xajax_new_vAgent('".$_SESSION['regionalCode']."',
                       this.value,
                       '".$_SESSION['subCounty']."',
                       '".$_SESSION['village']."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$qmobj->DistrictFilter($_SESSION['regionalCode'],$_SESSION['districtCode']);
                    $data.="</select></td>
                </tr>
                <tr class='evenrow'>
                  <td><strong>Subcounty:</strong><br /></td>
                  <td><select name='vAgentSubcounty' id='vAgentSubcounty' style='width:100px;' onchange=\"xajax_new_vAgent('".$_SESSION['regionalCode']."',
                       '".$_SESSION['districtCode']."',
                       this.value,
                       '".$_SESSION['village']."');return false;\">
                      <option value=''>-select-</option>";
                      $data.=$qmobj->SubcountyFilter($_SESSION['regionalCode'],$_SESSION['districtCode'],$_SESSION['subCounty']);
                    $data.="</select></td>
                </tr>
                <tr class='evenrow'>
                  <td><strong>Village:</strong><br /></td>
                  <td><input type='text' name='vAgentVillage' id='vAgentVillage' value='".$_SESSION['village']."' onchange=\"xajax_new_vAgent('".$_SESSION['regionalCode']."',
                       '".$_SESSION['districtCode']."',
                       '".$_SESSION['subCounty']."',
                       this.value);return false;\" /></td>
                </tr>
                
                <tr class='evenrow'>
                  <td><strong>Village Agent's Trader:</strong><br /></td>
                  <td>
                    <select name='vAgentTrader' id='vAgentTrader' style='width:100px;'>";
                       
                    $data.="<option value=''>-select-</option>";
                    $data.=$qmobj->filterTrader($trCode);
                    $data.="</select></td>
                </tr>
                
                <tr class='evenrow'>
                  <td><strong>Village Agent Name:</strong><br /></td>
                  <td>
                    <input type='text' name='vAgentName' id='vAgentName'/></td>
                </tr>
                
                <tr class='evenrow'>
                  <td><strong>Date of birth/Business Commencement:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.vAgent.vAgentDob);return false;\" hidefocus=''>
                    <input name='vAgentDob' id='vAgentDob' size='15'  readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr class='evenrow'>
                  <td><strong>Date of Recruitment:</strong><br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.vAgent.vAgentDateRecruited);return false;\" hidefocus=''>
                    <input name='vAgentDateRecruited' id='vAgentDateRecruited' size='15' readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>";
                /* $data.="<tr>
                  <td>Village Agent Code:<br /></td>
                  <td><input type='text' name='vAgentCode' id='vAgentCode' /></td>
                </tr>"; */
                $data.="<tr class='evenrow'>
                  <td><strong>Telephone:</strong><br /></td>
                  <td><input value='+256' type='text' name='vAgentTel' id='vAgentTel' maxlength='13' /></td>
                </tr>";
				
				$data.="<tr class='evenrow'>
                  <td><strong>Size of Village Agent Store:</strong><br /></td>
                  <td><input type='text' name='vAgentStoreSize' id='vAgentStoreSize' onkeypress='return numbersonly(event, false)' /></td>
                </tr>";
				
                $data.="<tr class='evenrow'>
                  <td><strong>Gender <i>(Consider majority if a Business)</i>:</strong><br /></td>
                  <td><select name='vAgentSex' id='vAgentSex' style='width:100px;'>
                    <option value=''>-select-</option>";
                    $gender=array('Male','Female');
                                        $i = 0; 
                                        foreach ($gender as $v) {
                                            $selected=($vAgentSex==$v)?"selected":"";
                                            $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
				
				<tr class='evenrow'>
                  <td rowspan='2'><strong>Type of Agent:</strong><br/></td>
				  
                  <td colspan='2'><input type='checkbox' name='typeOfAgent[]' id='typeOfAgent' value='Input/output trader'/>
                    Input/output trader</td>
                    </tr>
					
					
                <tr class='evenrow'>
                  <td colspan='2'><input type='checkbox' name='typeOfAgent[]' id='typeOfAgent' value='Services Provider'  />
                    Services Provider</td>
                </tr>
                
                
                
                
                
                <tr class='evenrow'>
                  <td><strong>Location:</strong></td>
                  <td><select name='vAgentLocation' id='vAgentLocation' style='width:100px;'>
                    <option value=''>-select-</option>";
                    $location=array('Urban','Rural');
                    //$location=sort($location);
                                        $i = 0; 
                                        foreach ($location as $l) {
                                            $selected=($vAgentLocation==$l)?"selected":"";
                                            $data.="<option value=\"".$l."\" ".$selected.">".$l."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
                
                
                
                
                <tr class='evenrow'>
                  <td rowspan='3'><strong>Crops:</strong><br /></td>
                  <td colspan='2'><input type='checkbox' name='Beans' value='Yes' id='Beans' />
                    Beans</td>
                    </tr>
                <tr class='evenrow'>
                  <td colspan='2'><input type='checkbox' name='Coffee' value='Yes' id='Coffee' />
                    Coffee</td>
                </tr>
                <tr class='evenrow'>
                  <td colspan='2'><input type='checkbox' name='Maize' value='Yes' id='Maize' />
                    Maize</td>
                </tr>
                
              
                <tr class='evenrow'>
                  <td>&nbsp;</td>";
                  $data.="<td><input value='Save' id='saveVillageAgent' name='saveVillageAgent' onclick=\"loadingIcon(xajax.getFormValues('vAgent'),'save_vAgent');return false;\" type='button'></td>
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
function save_vAgent($formvalues){
$obj=new xajaxResponse();
$trader=$formvalues['vAgentTrader'];
$vAgentName=$formvalues['vAgentName'];


//===============Village Agent algorithm====================
$hyphen="-";
/*  Default Trader when none is chosen */
$stDefTrader="SELECT tbl_tradersId, max(`traderCode`) as `lastCode` FROM `tbl_traders`";
$qDefTrader=@Execute($stDefTrader)or die(mysql_error() ." on  line 453");
$rowIdDefTrader=@FetchRecords($qDefTrader);
$lastDbDefTrader=$rowIdDefTrader['lastCode'];


$stDefTraderId="SELECT tbl_tradersId FROM `tbl_traders` where traderCode='".$lastDbDefTrader."'";
$qDefTraderId=@Execute($stDefTraderId)or die(mysql_error() ." on  line 457");
$rowIdDefTraderId=@FetchRecords($qDefTraderId);
$DefTraderId=$rowIdDefTraderId['tbl_tradersId'];
/* $obj->alert($DefTraderId); */

/* The trader will be picked by the user 
else pick the highest trader code last entered */
$userTraderId = ($trader<>'' || $trader<>null)?$trader:$DefTraderId;
/* $obj->alert("userTraderId->".$userTraderId ); */

$stVaCodeUser="SELECT max(`v`.`vAgentCode`) as `lastVaCodeUser`
FROM `tbl_villageagents` as `v`
where `v`.`tbl_tradersId`='".$userTraderId."'";
if($trader=='' || $trader==null){
$stVaCodeUser.="and `v`.`vAgentCode` like '".$lastDbDefTrader."%'";
}
/* $obj->alert($stVaCodeUser);  */

$qVaCodeUser=@Execute($stVaCodeUser)or die(mysql_error() ." on  line 454");
$rowIdVaCodeUser=@FetchRecords($qVaCodeUser);
$lastDbvar=$rowIdVaCodeUser['lastVaCodeUser'];

if($trader=='' || $trader==null){
$defVar= "".$lastDbDefTrader."".$hyphen."00";
}else{
$sTr="SELECT traderCode FROM `tbl_traders` where tbl_tradersId='".$trader."'";	
$qTr=@Execute($sTr)or die(mysql_error() ." on  line 454");
$rowTr=@FetchRecords($qTr);
$lTrCode=$rowTr['traderCode'];
$defVar= "".$lTrCode."".$hyphen."00";	
}

$lastDbVaCodeUser=($lastDbvar<>'' || $lastDbvar<>null)?$lastDbvar:$defVar;
/* $obj->alert("lastDbVaCodeUser->".$lastDbVaCodeUser); */

$stringBeforeHypenUser=substr($lastDbVaCodeUser, 0, strrpos( $lastDbVaCodeUser, ''.$hyphen.'') ); 
$sCount=strlen($stringBeforeHypenUser);
$seriesOne=substr($lastDbVaCodeUser, 0, $sCount);
/* $obj->alert("seriesOne->".$seriesOne); */

/* default series */
$stSeriesDefault="SELECT max(`v`.`vAgentCode`) as `lastSeriesCode`
FROM `tbl_villageagents` as `v`";
$qSeriesDefault=@Execute($stSeriesDefault)or die(mysql_error() ." on  line 9");
$rowIdDefault=@FetchRecords($qSeriesDefault);
$lastDbSeriesCode=$rowIdDefault['lastSeriesCode'];
$stringBeforeHypen=substr($lastDbSeriesCode, 0, strrpos( $lastDbSeriesCode, ''.$hyphen.'') ); 
$sCount=strlen($stringBeforeHypen);
$seriesTwo=substr($lastDbSeriesCode, 0, $sCount);
/* $obj->alert("seriesTwo->".$seriesTwo); */

/* Switch between default and user chosen series */
$series=($seriesOne<>'' || $seriesOne<>null)?$seriesOne:$seriesTwo;

/* pick from db the highest value from series starting with selected series */
$stSeries="SELECT max(`vAgentCode`) as `lastCode` FROM `tbl_villageagents` WHERE vAgentCode like '".$series."%'";
$qSeries=@Execute($stSeries)or die(mysql_error() ." on  line 11");
$rowId=@FetchRecords($qSeries);
$lastDbCode=$rowId['lastCode'];

/* strip off first characters up to the last hyphen characters from last code */
$stringSerieBeforeHypen=substr($lastDbCode, 0, strrpos($lastDbCode, ''.$hyphen.'') );
$sSerieCount=(strlen($stringSerieBeforeHypen)+1);
$lastCodeDigit=substr($lastDbCode, $sSerieCount);
$nextAvailableCodeDigit=($lastCodeDigit+1);
/* append the zero if single digit */
$nextCodeDigit=((strlen($nextAvailableCodeDigit))==1)?"0".$nextAvailableCodeDigit:$nextAvailableCodeDigit;
$nextVillageAgentCode = "".$series."".$hyphen."".$nextCodeDigit."";

/* $obj->alert($nextVillageAgentCode);	 */
//===============End of Village Agent algorithm====================



$vAgentCode=$nextVillageAgentCode;

$vAgentDob=$formvalues['vAgentDob'];
$vAgentTel=$formvalues['vAgentTel'];
$vAgentStoreSize=$formvalues['vAgentStoreSize'];
$vAgentSex=$formvalues['vAgentSex'];
$dirty_typeOfAgent=$formvalues['typeOfAgent'][0].",".$formvalues['typeOfAgent'][1];
$typeOfAgent=rtrim($dirty_typeOfAgent, ",");
$vAgentLocation=$formvalues['vAgentLocation'];
$vAgentDateRecruited=$formvalues['vAgentDateRecruited'];
$vAgentRegion=$formvalues['vAgentRegion'];
$vAgentDistrict=$formvalues['vAgentDistrict'];
$vAgentSubcounty=$formvalues['vAgentSubcounty'];
$vAgentVillage=$formvalues['vAgentVillage'];
$beans=$formvalues['Beans'];
$coffee=$formvalues['Coffee'];

$maize=$formvalues['Maize'];

if($beans=='Yes' AND $coffee=='Yes' AND $maize==''){
$maize='No';
}

if($beans=='Yes' AND $coffee=='' AND $maize==''){
$maize='No';
$coffee='No';
}

if($beans=='Yes' AND $coffee=='' AND $maize=='Yes'){
$coffee='No';
}

if($beans=='' AND $coffee=='Yes' AND $maize=='Yes'){
$beans='No';
}

if($beans=='Yes' AND $coffee=='' AND $maize==''){
$coffee='No';
$maize='No';
}

if($beans=='' AND $coffee=='Yes' AND $maize==''){
$beans='No';
$maize='No';
}

if($beans=='' AND $coffee=='' AND $maize=='Yes'){
$beans='No';
$coffee='No';
}


$stmnt_va="INSERT INTO `tbl_villageagents`(`tbl_tradersId`,`vAgentName`, `vAgentDob`,
                                    `vAgentCode`, `vAgentTel`,`vAgentStoreSize`,`vAgentSex`,`typeOfAgent`,`vAgentLocation`,
                                    `vAgentDateRecruited`, `vAgentRegion`, `vAgentDistrict`,
                                    `vAgentSubcounty`, `vAgentVillage`, `vAgentCropBeans`,
                                    `vAgentCropCoffee`, `vAgentCropMaize`)
                                            VALUES
                                            ('".$userTraderId."','".$vAgentName."','".$vAgentDob."','".$vAgentCode."',
                                            '".$vAgentTel."','".$vAgentStoreSize."','".$vAgentSex."','".$typeOfAgent."','".$vAgentLocation."',
                                            '".$vAgentDateRecruited."','".$vAgentRegion."',
                                            '".$vAgentDistrict."','".$vAgentSubcounty."',
                                            '".$vAgentVillage."','".$beans."',
                                            '".$coffee."','".$maize."')";
	/* $obj->alert($stmnt_va);                                            */
	@mysql_query($stmnt_va)or die(http(596));
    $obj->call("hidemyLoaderDiv"); 
    $obj->assign('bodyDisplay','innerHTML',congMsg("Village Agent has been added successfully!"));
    $obj->call('xajax_setup_vAgent','','',1,20);
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
                                    case "Village Agents":
                                ?>
                    xajax_setup_vAgent('', '', 1, 20);

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
