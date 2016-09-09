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




#--------------------LOP Targets---------------------------------
$xajax->register(XAJAX_FUNCTION,'ViewLOPTargets');
$xajax->register(XAJAX_FUNCTION,'new_LOPTarget');
$xajax->register(XAJAX_FUNCTION,'edit_LOPTarget');
$xajax->register(XAJAX_FUNCTION,'save_LOPTargetExtended');
$xajax->register(XAJAX_FUNCTION,'update_LOPTargetExtended');


#------------------end of LOP Targets----------------------------
$xajax->register(XAJAX_FUNCTION,'ViewAnnualTargets');
$xajax->register(XAJAX_FUNCTION,'new_annualTarget');
$xajax->register(XAJAX_FUNCTION,'edit_annualTarget');


$xajax->register(XAJAX_FUNCTION,'calc_budget');
$xajax->register(XAJAX_FUNCTION,'calc_target');

$xajax->register(XAJAX_FUNCTION,'save_AnnualTargetExtended');
$xajax->register(XAJAX_FUNCTION,'update_annualTargetExtended');
$xajax->register(XAJAX_FUNCTION,'view_quantitativeReportLog');
$xajax->register(XAJAX_FUNCTION,'getRecordId');

//------------------Annual Results-------------------
$xajax->register(XAJAX_FUNCTION,'view_AnnualResultsHO');
$xajax->register(XAJAX_FUNCTION,'view_AnnualResultsFS');


$xajax->register(XAJAX_FUNCTION,'save_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'view_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'view_AnnualResultsReportLog');
$xajax->register(XAJAX_FUNCTION,'new_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'edit_AnnualResults');
$xajax->register(XAJAX_FUNCTION,'update_AnnualResults');
//update_annualResults
$xajax->register(XAJAX_FUNCTION,'new_calc');
$xajax->register(XAJAX_FUNCTION,'new_target');
$xajax->register(XAJAX_FUNCTION,'new_actual');
$xajax->register(XAJAX_FUNCTION,'calc_LOP');
$xajax->register(XAJAX_FUNCTION,'calc_targetSemiAnnual');
//----------------Delete Data Completetly------------------

$xajax->register(XAJAX_FUNCTION,'delete_dataCompletely');
$xajax->register(XAJAX_FUNCTION,'ConfirmDeletionCompletely');
$xajax->register(XAJAX_FUNCTION,'delete_AnnualTargets');
$xajax->register(XAJAX_FUNCTION,'delete_LOPTarget');
$xajax->register(XAJAX_FUNCTION,'delete_CarpDataCompletely');

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


function view_form7($vaName,$vaCode,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;

$inc=1;
$_SESSION['vAgentName']=$vaName;
$_SESSION['vAgentCode']=$vaCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>";
$data="<table width='800px' cellspacing='1' id='report'>".filter_form7();
$data.="</tr>";
$data.="<tr class=''>
  <td colspan=8>
  <div id='status'></div>
 </td>";
$data.="</tr>";


$data.="<tr CLASS='evenrow'>
<th colspan='15' ><center>COMMODITY PRODUCTION AND MARKETING /Register for Farmers (Individuals & Groups)</center></th>
</tr>";

$data.="<table width='800px' cellpadding=1 cellspacing=1>";
$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |";
        $data.="<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |";
        $data.="<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form7'),'Delete_form7');return false;\" align='left'></td>";
    $data.="</td>
</tr>";	

 //===================data to be displayed=====================

$data.="<tr>
<th>#</th>
<th>Name of<br/>Village Agent</th>
<th>Code (VA)</th>
<th>Total No.<br/> of farmers</th>
<th>No. of farmers <br/> in groups</th>
<th>No. of individual <br/> farmers</th>
<th colspan='3'>Action</th>
</tr>";



//=========================Start of data display=======================


    
$query_string="SELECT g.*, v.`tbl_villageAgentId`, v.`vAgentName`, v.`vAgentCode` ,
SUM(g.`numMembersTotal`) AS total 
FROM `tbl_villageagent_groups`g, 
`tbl_villageagents` v ";
$query_string.="WHERE v.`tbl_villageAgentId`=g.`tbl_villageAgentId` ";

                  if($vaName<>'' and $vaCode<>''){
                    $query_string.="
                                    AND v.`vAgentName` LIKE '%".$vaName."%'
                                    AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
                    }elseif($vaName<>'' and $vaCode==''){
                    $query_string.="AND v.`vAgentName` LIKE '%".$vaName."%' ";
                    }elseif($vaName=='' and $vaCode<>''){
                    $query_string.="AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
                    }

$query_string.="GROUP BY v.`vAgentCode`";    

if($vaName=='' && $vaCode=='' ){
$query_string="SELECT g.*, v.`tbl_villageAgentId`, v.`vAgentName`, v.`vAgentCode` , SUM(g.`numMembersTotal`) AS total 
FROM `tbl_villageagent_groups`g, `tbl_villageagents` v
WHERE v.`tbl_villageAgentId`=g.`tbl_villageAgentId`
GROUP BY v.`vAgentCode`";
}





$query_=mysql_query($query_string)or die(http(5096));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$m=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(5107));



$x=1;
while($row=mysql_fetch_array($new_query)){
$color=$m%2==1?"evenrow":"white1";

$data.="<tr class='".$color."'>";
$data.="<td>".$m.".<input type='checkbox'  name='tbl_villageAgentId[]' id='tbl_villageAgentId".$x."' value='".$row['tbl_villageAgentId']."'/>
<input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/></td>";
//$obj->alert($row['tbl_villageAgentId']);
$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentName'])."</td>";
$data.="<td align='right'>".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentCode'])."</td>";
$data.="<td align='right'>".number_format($row['total'])."</td>";

$stmnt2="SELECT g . * , v.`tbl_villageAgentId` , v.`vAgentCode` , SUM( g.`numMembersTotal` ) AS numFarmersGroup
FROM `tbl_villageagent_groups` g, `tbl_villageagents` v
WHERE v.`tbl_villageAgentId` = g.`tbl_villageAgentId`
AND v.`vAgentCode` = '".$row['vAgentCode']."'
AND g.`groupName` <> ''
AND g.`groupName` <> 'No Group'
GROUP BY v.`vAgentCode`";

//$obj->alert($stmnt2);
  $qform=mysql_query($stmnt2);
  
  $row2=mysql_fetch_array($qform);

$data.="<td align='right'>".number_format($row2['numFarmersGroup'])."</td>";


$stmnt4="SELECT g.*, SUM(g.`numMembersTotal`) AS numFarmersNoGroup FROM `tbl_villageagent_groups`g 
WHERE g.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'
AND g.`groupName`='No Group'
OR g.`groupName`=''
GROUP BY g.`tbl_villageAgentId`
ORDER BY g.`groupName` ASC";

//$obj->alert($stmnt4);
  $qform=mysql_query($stmnt4);
 
  $row3=mysql_fetch_array($qform);

$data.="<td align='right'>".number_format($row3['numFarmersNoGroup'])."</td>";


$data.="<td><input type='button' class='formButton2' TITLE='View All Details' onclick=\"xajax_view_villageAgent('".$row['tbl_villageAgentId']."');return false;\" value='All Details'/></td>";
$data.="<td><input type='button' class='formButton2' TITLE='View Group Lists' onclick=\"xajax_view_vAgroup('".$row['tbl_villageAgentId']."');return false;\" value='Group Lists'/></td>";
$data.="<td><input type='button' class='formButton2' TITLE='View Farmer Lists' onclick=\"xajax_view_vAfarmer('".$row['tbl_villageAgentId']."');return false;\" value='Farmer Lists'/></td>";
$data.="</tr>";
$x++;
$m++;
}
$data.="".noRecordsFound($new_query,10)."";

//====================end of displayed data===================

$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
        <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form7'),'Delete_form7');return false;\" align='left'></td>
    </td>
</tr>";
 
  

/*
*display pages
*/
$data.="<tr align='right'><td colspan=20>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form7('','','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_form7('','','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form7('','','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_form7('','','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form7('','','".$cur_page."',this.value)\">";
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
        
   $data.="</tr>";
   $data.="</table>";
   
   $data.="</form>";
        
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;


}

//-----------------------------------End of Function view_form7--------------------------------------------------------





function new_form7($trCode,$vaCode,$groupName,$groupCode,$groupStatus,$numMembersFemale,$numMembersMale,$numMembersTotal,$districtCode,$subcountyCode,$village){
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
$_SESSION['village']=$village;






$data="<form action=\"".$PHP_SELF."\" name='form7' id='form7' method='post'>";
$data.="<table width='100%' id='report'>";
 
  $data.="<tr class='evenrow'><th colspan='22'><center>Register for Farmers (Individuals & Groups)</center></th></tr>";
        $data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    
                          $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>
                                    <tr class='evenrow3'>
                                      <th colspan='22'>Village Agent Particulars</th>
                                    </tr>";
                                    $data.="<tr class='evenrow'>
                                      <td colspan=''>Name of Trader or Organization:</td>
                                      <td colspan=''><select name='nameTrader' id='nameTrader' onchange=\"xajax_new_form7(
                                this.value,
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
								'".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\"  style='width:150px;'>
                                                                    <option value=''>
                                                                            -Select-
                                                                        </option>";
                                                                        $data.=$QueryManager->filterTrader($trCode);
                                                                        
                                                                        $data.="</select>
                                      </td>
                                      <td colspan=''>Trader or Organization Code:</td>";
                                      $stmnt="SELECT t.* FROM `tbl_traders` t WHERE t.`tbl_tradersId`='".$trCode."' ORDER BY t.`tbl_tradersId` ASC";
                                            $q=mysql_query($stmnt);
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
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\" style='width:150px;'>
                                                                                        <option value=''>
                                                                                                -Select-
                                                                                            </option>";
                                                                                        $data.=$QueryManager->filterVillageAgent($trCode,$vaCode);
                                                                                            $data.="</select>";
                $data.="</td>
                                      <td colspan=''>VA or Messenger Code:</td>";
                                      $stmnt="SELECT v . * FROM `tbl_villageagents` v WHERE v.tbl_villageAgentId='".$vaCode."' ORDER BY v.`vAgentName` ASC";
                                        $q=mysql_query($stmnt);
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
                                      
                                        $q=mysql_query($stmnt);
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
                    $data.="<tr class='evenrow'><th colspan='22'>Register for Individual members, Group and Community Based Organization  members</tr></th>";
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
                                  <input type='text' name='groupName' value='".$_SESSION['groupName']."' id='groupName' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                this.value,
                                '".$groupCode."',
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\" /><br>
                                <i>Use: 'No Group' as the group name if farmers being captured are not in a group </i></td>";
								
								$data.="<td valign='top'>group type</td>";
								
                                // Algorithm for autogenerating the Group Code
                                
                                $sVa="select v.* from `tbl_villageagents` as `v` where `v`.`tbl_villageAgentId`='".$vaCode."'";
                               // $obj->alert($sVa);
                                $q=mysql_query($sVa)or die(http(508));
                                $r=mysql_fetch_array($q);
                                $vaCodes=$r['vAgentCode'];
                                $stmnt2="SELECT max(vg.`tbl_villageagent_groupsId`) as highestId
                                from `tbl_villageagent_groups` as `vg`, `tbl_villageagents` as `v`
                                where `v`.`vAgentCode`='".$vaCodes."'
                                and `vg`.`tbl_villageAgentId`='".$vaCode."'
                                and `vg`.groupName<> 'No Group'
                                and `vg`.`tbl_villageAgentId` =`v`.`tbl_villageAgentId`";
                                $q=mysql_query($stmnt2)or die(http(516));
                                $r=mysql_fetch_array($q);
                                $id=$r['highestId'];
                                $stmnt3="SELECT vg.`groupCode` 
                                from `tbl_villageagent_groups` as `vg`
                                where vg.`tbl_villageagent_groupsId`='".$id."'";
                                $q=mysql_query($stmnt3)or die(http(522));
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
                                             $q=mysql_query($stmnt4) or die(http(535));
                                            $r=mysql_fetch_array($q);
                                            $vaCodes=$r['vAgentCode'];
                                            //Setting the first Id if all tables are empty
                                            $initialGroupCode=$y;
                                            $nextGroupCode="".$vaCodes."-".($initialGroupCode);  
                                            }
                                
                                
                                
                                
                                $data.="<td valign='top'><input class='disabled' readonly=readonly type='text' name='groupCode' value='".$nextGroupCode."' id='groupCode' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                this.value,
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\"/>
                                </td>";
								//Modification to the new form7 
								$data.="
								<td valign='top'><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form7.dateGroupStarted);return false;\" hidefocus=''>
								<input  name='dateGroupStarted' type='text' size='20' value='' id='dateGroupStarted'  style='width:175px;>
								<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>
								";
								
								
                                $data.="<td valign='top'>
                                  <select name='groupStatus'  id='groupStatus' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                this.value,
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\"/>";
                                                                     
                                    $data.="<option value=''>-select-</option>";
                                    
                                    $arrStatus=array('New','Old');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $selected=($_SESSION['groupStatus']==$var)?"selected":"";
                                            $data.="<option value=\"".$var."\" ".$selected.">".$var."</option>";
                                            $k++;
                                        }
                                    
                                  $data.="</select>";
                                $data.="</td>
								
								<td valign='top'>
                                  <input type='text' name='numMembersMale' value='".$_SESSION['numMembersMale']."' id='numMembersMale' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
                                this.value,
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\" onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                            getElementById('numMembersMale').value,
                                                                                                                            'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                </td>
								
								<td valign='top'>
                                  <input type='text' name='numMembersFemale' value='".$_SESSION['numMembersFemale']."' id='numMembersFemale' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                this.value,
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\" onKeyUp=\"xajax_calc_form7(getElementById('numMembersFemale').value,
                                                                                                                            getElementById('numMembersMale').value,
                                                                                                                            'numMembersTotal');return false;\" onkeypress='return numbersonly(event, false)' style='width:50px;'/>
                                </td>
								
								<td valign='top'>
                                  <input type='text' class='disabled' name='numMembersTotal' value='".$_SESSION['numMembersTotal']."' id='numMembersTotal' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
                                '".$numMembersFemale."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                '".$village."',
                                '".$addField."');return false;\" style='width:50px;'/>
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
                                  $data.="<select name='groupSubcounty' id='groupSubcounty' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                this.value,
                                '".$village."',
                                '".$addField."');return false;\" /> ";
                                  
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
                                  <input type='text' name='groupVillage' id='groupVillage' value='".$_SESSION['village']."' onchanges=\"xajax_new_form7(
                                '".$trCode."',
                                '".$vaCode."',
                                '".$groupName."',
                                '".$groupCode."',
                                '".$groupStatus."',
                                '".$numMembersMale."',
                                '".$numMembersFemale."',
                                '".$numMembersTotal."',
                                '".$districtCode."',
                                '".$subcountyCode."',
                                this.value,
                                '".$addField."');return false;\">
                                </td>
                                
                              </tr>";
                    $data.="</table>";
$data.="</td></tr>";

$data.="<tr class='evenrow3'>
                    <td colspan='22'>";
                    $data.="<table border='0' cellspacing='1' cellpadding='1' width='100%'>";
                    $data.="<tr class='evenrow'><th colspan='22'>Details of Group and Individual members</th></tr>";
                    $data.="<tr class='evenrow'>
                                <th rowspan='2'>#</th>
								<th rowspan='2'>Name of members</th>
								<th rowspan='2'>Date - started working with member<img src='' height='0.2px' width='80px'/></th>
								<th rowspan='2'>New/Old</th>
								<th rowspan='2'>Date of Birth<img src='' height='0.2px' width='80px'/></th>
								<th rowspan='2'>Village</th>
								<th rowspan='2'>Sex</th>
								<th rowspan='2'>Telephone</th>
                                <!--<th rowspan='2'>Received/Made e-Payment(Yes/No)</th>-->
								<th colspan='4'>Details of Household(HH) head</th>
								<th colspan='4'>Household Composition</th>
                                <th rowspan='2'>Action</th>
                            </tr>
							<tr>
								<th>Name of HH Head</th>
								<th>Age of HH Head</th>
								<th>Sex of HH Head</th>
								<th valign='top'>New/Old</th>
								<th>Male No Female</th>
								<th>Male &amp; Female</th>
								<th>Female No Male</th>
								<th>Child Headed HH</th>
							</tr>";
                            
                            
                            
                            
                            $data.="<tbody id='theBody'>";
                            $data.="<tr class='evenrow'>
                                <td>1</td>
                                <td valign='top'>
                                  <input type='hidden' name='loopkey[]' id='loopkey1' value='1'> 
                                  <input type='text' name='nameIndividual[]' id='nameIndividual1'>
                                </td>";
								
                                $data.="<td valign='top'>";
                                $data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
                                <input name='memberDstart[]' type='text' size='20' value='' id='memberDstart1' readonly='readonly' style='width:85px;'>
                                <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
                               $data.="</td>";
							   
								$data.="<td valign='top'>
                                  <select name='memberStatus[]'  id='memberStatus1' />";
                                    $data.="<option value=''>-select-</option>";
                                    $arrStatus=array('New','Old');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $data.="<option value=\"".$var."\">".$var."</option>";
                                            $k++;
                                        }
                                    $data.="</select>";
                                $data.="</td>";
								
								$data.="<td valign='top'>";
                                $data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
                                <input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' readonly='readonly' style='width:85px;'>
                                <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
                                // $data.="<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' onkeypress=\"return numbersonly(event, false)\" style='width:85px;'>";
                                $data.="</td>";
								
								
                                $data.="<td valign='top'>
                                  <input type='text' name='farmerVillage[]' id='farmerVillage1'>
                                </td>";
								
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
								
                                $data.="<td valign='top'>     
                                <input maxlength='13' value=\"+256\" type='text' name='telIndividual[]' id='telIndividual1'>
                                </td>";
								
								$data.="<td valign='top'>
								 <input type='text' name='hhName[]' id='hhName1'>
                                </td>";
								
								$data.="<td valign='top'>
								 <input type='text' maxlength='3' name='hhAge[]' onkeypress='return numbersonly(event, false)' id='hhAge1'>
								 </td>";
								
								$data.="<td valign='top'><p>
                                  <select name='hhSex[]' id='hhSex1'>
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
                                  $data.="</select>
                                </td>";
								
								$data.="<td valign='top'><p>
                                  <select name='hhStatus[]' id='hhStatus1'>
                                    <option value=''>-select-</option>";
									$arrStatus=array('N','O');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
											switch ($var) {
												case "N":
													$display='New';
													break;
												case "O":
													$display='Old';
													break;
												default:
													$display='';
											}
                                            $data.="<option value=\"".$var."\">".$display."</option>";
                                            $k++;
                                        }
                                  $data.="</select>
                                </td>";
								
								//An array of possible hscomposition.
								$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded',);
                                        $k = 0; 
                                        foreach ($arrHs as $var) {
										$data.="<td valign='top'><input type='radio' name='hsComposition1[]'  id='hsComposition1' value='".$var."'></td>";
										$k++;										
										}
								
								
								//Action table cell
                                $data.="<td></td>";
                            $data.="</tr>
							
                            </tbody>";
                    $data.="</table>
                        <p>
                        <input  type='button' class='formButton2' name='Add Rows' TITLE='Add Rows' value='Add Rows' onclick=\"javascript:addRow2()\" />
                        </p>";
                        
                        $data.="<table style='display:none' >";
                        $data.="<tbody id=\"template-div\">";
                        $data.="<tr class='evenrow'>
                                <td>1</td>
                                <td valign='top'>
                                  <input type='hidden' name='loopkey[]' id='loopkey1' value='1'> 
                                  <input type='text' name='nameIndividual[]' id='nameIndividual1'>
                                </td>";
                                
								//Date when member started with group
                                $data.="<td valign='top'>";
                                $data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'memberDstart').attr('id')));return false;\" hidefocus=''>
                                <input name='memberDstart[]' type='text' size='20' value='' id='memberDstart1' readonly='readonly' style='width:85px;'>
                                <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
                                // $data.="<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' onkeypress=\"return numbersonly(event, false)\" style='width:85px;'>";
                                $data.="</td>";
								
								//status below
								$data.="<td valign='top'>
                                  <select name='memberStatus[]'  id='memberStatus1' />";
                                    $data.="<option value=''>-select-</option>";
                                    $arrStatus=array('New','Old');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
                                            $data.="<option value=\"".$var."\">".$var."</option>";
                                            $k++;
                                        }
                                    $data.="</select>";
                                $data.="</td>";
								
								$data.="<td valign='top'>";
                                $data.="<a href='javascript:void(0)'onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.getElementById(getElementWithNameLike(this,'farmersDob').attr('id')));return false;\" hidefocus=''>
                                <input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' readonly='readonly' style='width:85px;'>
                                <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a>";
                                // $data.="<input name='farmersDob[]' type='text' size='20' value='' id='farmersDob1' onkeypress=\"return numbersonly(event, false)\" style='width:85px;'>";
                                $data.="</td>";
								
								
                                $data.="<td valign='top'>
                                  <input type='text' name='farmerVillage[]' id='farmerVillage1'>
                                </td>";
								
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
								
                                $data.="<td valign='top'>     
                                <input maxlength='13' value=\"+256\" type='text' name='telIndividual[]' id='telIndividual1'>
                                </td>";
								
								$data.="<td valign='top'>
								 <input type='text' name='hhName[]' id='hhName1'>
                                </td>";
								
								$data.="<td valign='top'>
								 <input type='text' maxlength='3' name='hhAge[]' onkeypress='return numbersonly(event, false)' id='hhAge1'>
								 </td>";
								
								$data.="<td valign='top'><p>
                                  <select name='hhSex[]' id='hhSex1'>
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
                                  $data.="</select>
                                </td>";
								
								$data.="<td valign='top'><p>
                                  <select name='hhStatus[]' id='hhStatus1'>
                                    <option value=''>-select-</option>";
									$arrStatus=array('N','O');
                                        $k = 0; 
                                        foreach ($arrStatus as $var) {
											switch ($var) {
												case "N":
													$display='New';
													break;
												case "O":
													$display='Old';
													break;
												default:
													$display='';
											}
                                            $data.="<option value=\"".$var."\">".$display."</option>";
                                            $k++;
                                        }
                                  $data.="</select>
                                </td>";
								
								//An array of possible hscomposition.
								$arrHs=array('noMaleOrFemale','maleAndFemale','femaleNoMale','childHeaded',);
                                        $k = 0; 
                                        foreach ($arrHs as $var) {
										$data.="<td valign='top'><input type='radio' name='hsComposition1[]'  id='hsComposition1' value='".$var."'></td>";
										$k++;										
										}
								//Action table cell
							$data.="<td><input  type='button' class='formButton2'name='Remove' TITLE='Remove' value='Remove' onclick=\"removeRow2(this)\" /></td>
                    </tr>";

                    $data.="</tbody>";
                    $data.="</table>";
                        
            $data.="</td>
        </tr>";


$data.="<tr class='evenrow'>
            <td>
            <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('form7'),'save_form7');return false;\" />
            </div>
            </td>
        </tr>
</form>";
        $data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
              

$data.="</table>";




$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}



function save_form7($formValues){
$obj = new xajaxResponse();


@mysql_query("SET AUTOCOMMIT=FALSE");
@mysql_query("BEGIN TRANSACTION");

$stmnt_check="SELECT MAX(`tbl_villageagent_groupsId`) as tbl_villageagent_groupsId  FROM `tbl_villageagent_groups`";
$Qcheck=@Execute($stmnt_check)or die(http(845));

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
$groupCode=$formValues['groupCode'];

$dateGroupStarted=$formValues['dateGroupStarted'];
$groupStatus=$formValues['groupStatus'];
$numMembersFemale=$formValues['numMembersFemale'];
$numMembersMale=$formValues['numMembersMale'];
$numMembersTotal=($numMembersFemale+$numMembersMale);
$groupDistrict=$formValues['groupDistrict'];


$st="SELECT * FROM `tbl_district` WHERE `districtName`='".$groupDistrict."'";

$qst=@Execute($st)or die(http(887));
if(!$qst){ $obj->alert("CPM MIS could not save this form 7. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }
$rowST=mysql_fetch_array($qst);
$district=$rowST['districtCode'];
$groupSubcounty=$formValues['groupSubcounty'];
$groupVillage=$formValues['groupVillage'];
//$groupEpay=$formValues['groupEpay'];

if(($tbl_tradersId<>''
    OR $tbl_tradersId<>0
    OR $tbl_villageAgentId<>''
    OR $tbl_villageAgentId<>0) AND
   ($groupName<>''
    OR $groupName<>0)) {
    //check if this groupsId was saved before
    $groupIdCheck="select `vg`.*, `vg`.`groupCode` as `lastGroupCode`,`v`.`vAgentCode`
                                from `tbl_villageagent_groups` as `vg`,`tbl_villageagents` as `v`
                                where `v`.`tbl_villageAgentId`=`vg`.`tbl_villageAgentId`
    and `vg`.`groupCode`='".$groupCode."'";
    
    $qCheckId=@Execute($groupIdCheck)or die(mysql_error() ." on  line 1062");
    $rowId=@FetchRecords($qCheckId);
    $lastGroupCode=$rowId['lastGroupCode'];
    $vaCodes=$rowId['vAgentCode'];
    
    if($lastGroupCode<>null or $lastGroupCode<>'' and $groupName<>'No Group'){
      
      
                                            
                                           
                                            $newId=str_replace("".$vaCodes."-","",$lastGroupCode);
                                            $nextGroupCode="".$vaCodes."-".($newId+1);
                                            //$obj->alert($nextGroupCode);
                                           
                                            
      $stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`, `tbl_villageAgentId`,
                                            `reportingPeriod`, `groupName`,
                                            `groupCode`,`dateGroupStarted`, `groupStatus`,
                                            `numMembersFemale`, `numMembersMale`,
                                            `numMembersTotal`, `groupDistrict`,
                                            `groupSubcounty`, `groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."', '".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".$nextGroupCode."',
											'".$dateGroupStarted."','".$groupStatus."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
        
    }else if($groupName=='No Group'){
		$groupCode='0-00-00-01';
		$stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`,`tbl_villageAgentId`,
                                            `reportingPeriod`,`groupName`,`groupCode`,
											`dateGroupStarted`,`groupStatus`,`numMembersFemale`,
											`numMembersMale`,`numMembersTotal`,`groupDistrict`,
                                            `groupSubcounty`,`groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."','".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".$groupCode."',
											'".$dateGroupStarted."','".$groupStatus."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
		
	}else{
    
    
    $stmnt_group="INSERT INTO `tbl_villageagent_groups`( tbl_villageagent_groupsId,`tbl_tradersId`,`tbl_villageAgentId`,
                                            `reportingPeriod`,`groupName`,`groupCode`,
											`dateGroupStarted`,`groupStatus`,`numMembersFemale`,
											`numMembersMale`,`numMembersTotal`,`groupDistrict`,
                                            `groupSubcounty`,`groupVillage`) VALUES
                                            ('".$tbl_villageagent_groupsId."','".$tbl_tradersId."','".$tbl_villageAgentId."',
                                            '".$reportingPeriodVA."','".$groupName."','".$groupCode."',
											'".$dateGroupStarted."','".$groupStatus."','".$numMembersFemale."',
											'".$numMembersMale."','".$numMembersTotal."','".$district."',
											'".$groupSubcounty."','".$groupVillage."')";
        }        
//$obj->alert($stmnt_group);	
//$query=@Execute($stmnt_group)or die (mysql_error()."in save.php on line 112");
$query=@Execute($stmnt_group)or die(http(1137));
if(!$query){ $obj->alert("CPM MIS could not make this form 7 modification. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }


for($x=0;$x<count($formValues['loopkey']);$x++){
$nameIndividual=$formValues['nameIndividual'][$x];
$memberDstart=$formValues['memberDstart'][$x];
$memberStatus=$formValues['memberStatus'][$x];
$farmersDob=$formValues['farmersDob'][$x];
if($farmersDob==''){
//Assign a dirty birthday to farmers with no birthdays
$dirtyBd='1800-01-01';
$farmersDob=$dirtyBd;
}
$farmersVillage=$formValues['farmerVillage'][$x];
$sexIndividual=$formValues['sexIndividual'][$x];
$telIndividual=$formValues['telIndividual'][$x];
/*$farmersEpay=$formValues['farmersEpay'][$x];*/
$hhName=$formValues['hhName'][$x];
$hhAge=$formValues['hhAge'][$x];
$hhSex=$formValues['hhSex'][$x];
$hhStatus=$formValues['hhStatus'][$x];
$hsComposition=$formValues['hsComposition'.($x+1)];


if($nameIndividual<>''OR $nameIndividual<>0) {

$stmnt_grMembers="INSERT INTO `tbl_farmers`(`tbl_tradersId`, `tbl_villageAgentId`,`tbl_villageagent_groupsId`, 
                                            `reportingPeriod`, `groupName`,`farmersDistrict`,`farmersSubcounty`,
                                            `farmersName`,`memberDstart`,`memberStatus`,`farmersDob`,`farmersVillage`, `farmersSex`, `farmersTel`,
											`hhName`,`hhAge`,`hhSex`,`hhStatus`,`hsComposition`)
                                                        VALUES
                                                    ('".$tbl_tradersId."', '".$tbl_villageAgentId."','".$tbl_villageagent_groupsId."',
                                            '".$reportingPeriodVA."','".$groupName."','".$district."','".$groupSubcounty."',
                                            '".$nameIndividual."','".$memberDstart."','".$memberStatus."','".$farmersDob."','".$farmersVillage."','".$sexIndividual."', '".$telIndividual."',
											'".$hhName."','".$hhAge."','".$hhSex."','".$hhStatus."','".implode(",",$hsComposition)."')";

//$obj->alert($stmnt_grMembers);
//$query=@mysql_query($stmnt_grMembers)or die("CPM Error-code 166 because ".mysql_error());
$query=@Execute($stmnt_grMembers)or die(http(1193));

if(!$query){ $obj->alert("CPM MIS could not make this form 7. \n
                   Please make sure all the data to be supplied is correct.");
      return $obj;
     }

}
}
}
else{
 $obj->alert("CPM MIS could not make this form 7 modification. \n
            Please make sure all the data to be supplied is correct.");
      return $obj;   
    
}

@mysql_query("COMMIT");
@mysql_query("SET AUTOCOMMIT=TRUE");
$obj->call("hidemyLoaderDiv"); 
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_form7','','',1,20);
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

$sel=mysql_query($st_vAgent)or die(http(37));
while($row_vAgent=mysql_fetch_assoc($sel)){

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
     <td><strong>VA's Crops:</strong></td>
     <td>Village Agent's Crops</td>
   </tr>
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
    AND g.`groupDistrict`=d.`districtCode`
    AND g.`groupSubcounty`=s.`subcountyCode`";
    
      $q_groups=mysql_query($st_groups)or die(http(37));
        while($row_vAgentGroups=mysql_fetch_assoc($q_groups)){
    
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

$sel=mysql_query($st_vAgent)or die(http(37));
while($row_vAgent=mysql_fetch_assoc($sel)){


 
 $data.="<tr class='evenrow'><th colspan='8'>GROUPS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
 <a href='export_to_excel_word.php?linkvar=Export Group&&format=excel'>
 <div align='right'>
 <th colspan='3'>
                  <input name='export_group' type='button' class='formButton2'value='Export to Excel'></a> |
                  <a href='print_version.php?linkvar=Print Group&&format=Print' target='_blank'>
                  <input name='export_group' type='button' class='formButton2' value='Print Version'></a>
 </th>
 <th><input type='button' value='Back' onclick=\"xajax_view_form7('','',1,20);return false;\" title='Back' class='formButton2'></th>
 
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
    AND g.`groupDistrict`=d.`districtCode`
    AND g.`groupSubcounty`=s.`subcountyCode`";
    
      $q_groups=mysql_query($st_groups)or die(http(37));
        while($row_vAgentGroups=mysql_fetch_assoc($q_groups)){
    
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
//end of Group lists

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
$sel=mysql_query($st_vAgent)or die(http(1479));
$row_vAgent=mysql_fetch_assoc($sel);

$data.="<tr class='evenrow'><th colspan='5'>FARMERS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
	<div align='right'>
		<th colspan='5'>
		<input type='button' value='Back' onclick=\"xajax_view_form7('','',1,20);return false;\" title='Back' class='formButton2'>
		</th>
	</div>
</tr>";

$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
		<input type='button' class='formButton2'onclick=\"xajax_getSampledFarmers(xajax.getFormValues('viewfarmer')); return false;\" value='Export selected records to Excel' /> 
		<!--<a href='print_version.php?linkvar=Print Sampled Fom7&&format=Print' target='_blank'>
		<input name='export_farmers' type='button' class='formButton2' value='Print Version'>
		</a>-->
    </td>
</tr>";

$data.="<tr class='evenrow'>
	<th>#<img src='' width='30' height='0.2'/></th>
	<th>Farmer Code</th>
	<th>Farmer Name<img src='' width='100' height='0.2'/></th>
	<th>Group Name<img src='' width='100' height='0.2'/></th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Start Date</th>
	<th>Farmer Status</th>
</tr>";
$g=1;
$st_groups="select `f`.`tbl_farmersId`,`f`.`farmersName`, 
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
and `f`.`farmersDistrict`=d.`districtCode`
and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` desc";
    
$q_groups=mysql_query($st_groups)or die(http(1526));
while($rfarmer=mysql_fetch_assoc($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".<input type='checkbox'  name='tbl_farmersId[]' id='tbl_farmersId".$g."' value='".$rfarmer['tbl_farmersId']."' />
		<input name='loopkey[]' id='loopkey".$g."' type='hidden' value='1'/></td>";
		$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
		$data.="<td>".$rfarmer['farmersName']."</td>";
		$data.="<td>".$rfarmer['groupName']."</td>";
		$data.="<td>".$rfarmer['groupCode']."</td>";
		$data.="<td>".$rfarmer['districtName']."</td>";
		$data.="<td>".$rfarmer['subcountyName']."</td>";
		$data.="<td>".$rfarmer['memberDstart']."</td>";
		$data.="<td>".$rfarmer['memberStatus']."</td>";
        $data.="</tr>";
        $g++;
        }
		
$data.="<tr>
    <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
        <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
        <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
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
	<th>Farmer Status</th>
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
	


$q_groups=mysql_query($sfarmers)or die(http(1590));
while($rfarmer=mysql_fetch_assoc($q_groups)){
    
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

function new_calc($male,$female,$other,$total){
$obj= new xajaxResponse();
$totalValue=0;

$totalValue=($male+$female+$other);
#$obj->addAlert($total."ppppppppp".$male."-".$female."-".$totalValue);
$obj->assign($total,"value",$totalValue);
//$data.="<input name='total[]' type='text' id='total' value='".$total."'  size='10' readonly='readonly' />";
return $obj;
}

function new_target($q1,$q2,$q3,$q4,$target){
$obj= new xajaxResponse();
$targetValue=0;
$targetValue=($q1+$q2+$q3+$q4);
$obj->assign($target,"value",$targetValue);
return $obj;
}

function new_actual($male,$female,$target){
$obj= new xajaxResponse();
$targetValue=0;
$targetValue=($male+$female);
$obj->assign($target,"value",$targetValue);
return $obj;
}


#functions
#****************************
include('save.php');
require_once('filters.php');
require_once('edit.php');
require_once('delete.php');
#********************************************
//-----------------workplan----------------------------


function calc_budget($pq1,$pq2,$pq3,$pq4,$total){
$obj= new xajaxResponse();
$targetValue=0;
$totalValue=($pq1+$pq2+$pq3+$pq4);
$obj->assign($total,"value",$totalValue);
return $obj;
}


function calc_target($pq1,$pq2,$pq3,$pq4,$total){
$obj= new xajaxResponse();
$targetValue=0;
$totalValue=($pq1+$pq2+$pq3+$pq4);
$obj->assign($total,"value",$totalValue);
return $obj;
}


function calc_targetSemiAnnual($male,$female,$other,$male2,$female2,$other2,$total){
$obj= new xajaxResponse();
$targetValue=0;
$totalValue=($male+$female+$other+$male2+$female2+$other2);
#$obj->alert($totalValue);
$obj->assign($total,"value",$totalValue);
return $obj;
}
 
 function calc_LOP($male,$female,$other,$total){
$obj= new xajaxResponse();
$targetValue=0;
$totalValue=($male+$female+$other);
//$obj->alert($totalValue);
$obj->assign($total,"value",$totalValue);
return $obj;
}



function ViewAnnualTargets($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
if($_SESSION['username']==NULL){
$obj->alert("Your Session Has Expired Please Login again!");
$obj->redirect("index.php");
return $obj;
}



$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------
if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];

//$reportingType=(isset($_GET['linkvar'])=='Targets and Baselines')?"Managers":"Field Supervisors";
//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >
".filter_annualTarget_2($fnctName="ViewAnnualTargets");
//
if($_GET['action']=='Reports'){
		$data.="";
		}else {
$data.="<tr  class='evenrow'>
     
    <td colspan='17'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' /> 
	 <input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"xajax_delete_AnnualTargets(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>
    
	
  </tr>";
  
  }
                        
			$data.="<tr><th rowspan='2' class='dataRow' >NO/SELECT</th>
			 <th rowspan=2 colspan='6' width='' class='dataRow'>Indicator</th>
		
		<th colspan='11' class='dataRow' ><center>".$reportTitle."</center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' class='dataRow'>unit of measure</th>
			 	<th scope='col' rowspan='1'  class='dataRow'>Gender Disaggregation</th>
				  <th  class='dataRow'>Baseline</th>
				  <th  class='dataRow'>Male</th>
				  <th  class='dataRow'>Female</th>
				   <th colspan='1' class='dataRow'>Other</th>
				   <th colspan='1' class='dataRow'>Total Semi-Annual Target</th>
				   <th>Action</th>
				    </tr>";
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

	$total=($rowWP['maleAprSep']+$rowWP['femaleAprSep']+$rowWP['otherAprSep']);
		  $l="align=right";
		  
		 
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									
									
 									<INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
									<td align=left >".$row['disaggregation']."</td>
									<td align=right ><strong>".$base."</strong></td>";
									
										$rowWP=QueryManager::ViewAnnualTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
										
										
										
										 
		  $newId=QueryManager::DerivedTableIdentifier($UniqueKey=" region='".$rowWP['region']."' and curr_year = '".$rowWP['curr_year']."' and semi_annual ='".$rowWP['semi_annual']."' and indicator_id= '".$row['indicator_id']."'",$TableName='tbl_workplan',$PrimaryKey='workplan_id',$ErrorCode='Workplan-241');
		 //$obj->alert($newId);
									$data.="<td align='right' ><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$rowWP['workplan_id']."' >
									<INPUT type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >
									<INPUT type='hidden' name='curr_year []'   id='curr_year ' value='".$rowWP['curr_year']."' >
									<INPUT type='hidden' name='semi_annual[]'   id='semi_annual' value='".$rowWP['semi_annual']."' >
									<INPUT type='hidden' name='DerivedWorkplanId[]'   id='DerivedWorkplanId' 
									value='".$newId."' >
									<strong>".checkExistance($rowWP['maleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align='right' ><strong>".checkExistance($rowWP['femaleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align='right' ><strong>".checkExistance($rowWP['otherAprSep'],0,'ExistsInteger')."</strong></td>";
									
									$data.="<td align='right' colspan='1' ><strong>".checkExistance($rowWP['totalAnnualTarget'],0,'ExistsInteger')."</strong></td>";
									$data.="<td valign='top' align='center'><img src='icons/trash.png' title='Move to Trash' 
									onclick=\"xajax_delete_AnnualTargets('".$rowWP['curr_year']."','".$rowWP['semi_annual']."','".$rowWP['region']."','tbl_workplan','delete_AnnualTargets');return false;\" ></td></tr>";
$inc++;
		  }		
		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		  if($_GET['action']=='Reports'){
		$data.="";
		}else {
$data.="<tr  class='evenrow'>
     
    <td colspan='17'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."','".$_SESSION['zoneID']."','".$_SESSION['semiAnnual']."');return false;\" value='edit' title='Edit' /> 
	 <input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'xajax_delete_AnnualTargets','tbl_workplan');return false;\" value='Delete' /></td>
    
	
  </tr>";
  
  }
     
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

//-----------------------------new_ResultsBasedannualTarget------------------------------------------------------------




function new_LOPTarget($indicatorType,$outcome,$output,$year){
$obj=new xajaxResponse();

$_SESSION['indicator_type']=$indicatorType;
$_SESSION['subcomponent_id']=$outcome;
$_SESSION['output_id']=$output;
//$IndicatorType=array('Outcome','Output');
$classCode=5;
$n=1;


$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
";
         $data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_new_LOPTarget(this.value,'".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$year."');return false;\">
			  <option value='' >-select-</option>";
				$data.=QueryManager::IndicatorTypeFilter($indicatorType);				
					  $data.="</select></td>
            </tr>";
			
			$data.="<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_new_LOPTarget('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output_id']."','".$year."');return false;\">";
$data.="<option value=''>-select-</option>"; 
			$data.=QueryManager::OutcomeFilter($outcome);
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox'  id='output' onchange=\"xajax_new_LOPTarget('".$_SESSION['indicator_type']."','".$_SESSION['subcomponent_id']."',this.value,'".$year."')\">";
		$data.="<option value=''>-select-</option>"; 
		$data.=QueryManager::OutputFilter($outcome,$output);
		$data.="</select></td>
        </tr>";
	
		
            $data.="<tr class='evenrow'>
              <td colspan='2'>Project Year:</td>
              <td colspan='9'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $data.=QueryManager::FinancialYearFilter($year);
              $data.="</select></td>
            </tr>

         <tr>
       
        
              <th colspan='10' class='evenrow2' align='center'><center>Key Perfomance Indicator Life of Project Targets</center></th>
             
            </tr>
            <tr class=evenrow>
            <th width='25' class='dataRow'>Code</th>
              
			  <th width='' class='dataRow' colspan='3' >Indicator</th>
			  <th width='55' class='dataRow' align='right'>Unit of Measure</th>
			  <th width='55' class='dataRow' align='right'>disaggregation</th>
			  <th width='55' class='dataRow' align='right'>Male</th>
			  <th width='55' class='dataRow' align='right'>Female</th>
			  <th width='55' class='dataRow' align='right'>Other</th>
			  <th width='55' class='dataRow' align='right'>Total Life of Project Target</th>
			
			  
             
            </tr>";
//$obj->alert(count($formvalues['workplan_id']));
//$obj->alert(count($formvalues['loopkey']));
$m=1;
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed. Open the Reporting period and Try Again!");
return $obj;
}
/* if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Filter out the Categories and Select Indicators For Setting/Editing LOP Targets");
return $obj;
}
else

for($x=0;$x<count($formvalues['indicator_idAll']);$x++){ */

$y="select * from tbl_indicator i  
  where output_id like '".$output."%' group by i.indicator_id";
  //$obj->alert($y);
		$query2=@mysql_query($y)or die(http("ED-150"));
		
		 
		  $inc=1;
		  $a=1;
		 while($rowTarget=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  switch($rowTarget['typeofDisaggregation'])
		  		{
				case "None":
				
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  type='text' value='".$rowTarget['other']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				break;
				case "Male and Female":
				
				
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' value='".$rowTarget['male']."' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' value='".$rowTarget['female']."' id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" class='evenrow' readonly='readonly' value='N/A' type='text'  id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				break;
				default:
				$data.="<tr class=$color>
 			<td width='55' >".$rowTarget['indicator_code']."</td>
			<td colspan='3'><input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
			<input name='workplan_id[]' type='hidden' value='".$rowTarget['workplan_id']."' id='workplan_id' />
			<INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$rowTarget['typeofDisaggregation']."' >
			<INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$rowTarget['indicator_id']."' >".$rowTarget['indicator_name']."											</td>
 			<td width='55' >".$rowTarget['unitofmeasure']."</td>
			<td width='55' >".$rowTarget['typeofDisaggregation']."</td>
		<td><input name='male[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A' id='male".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='female[]'  onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\" type='text' class='evenrow' readonly='readonly' value='N/A'  id='female".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td><input name='other[]' onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  type='text' value='".$rowTarget['other']."' id='other".$m."' size='10' onKeyPress=\"return numbersonly(event, false)\" /></td>
		
		<td  align='right'><input name='target[]' type='text' id='target".$m."' size='20' onKeyPress=\"return numbersonly(event, false)\" onKeyUp=\"xajax_new_calc(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'target".$m."')\"  value='".$rowTarget['Target']."' readonly='readonly'/></td>
		"; 
	
			$data.="</tr>";
				
				
				
				
				
				break;
				}
				  
		 $inc++;
		$m++;
		}
		  
		 // } 
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_LOPTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}






/* function new_annualTargets($indicator_type,$subcomponent,$output){
$obj=new xajaxResponse();
$_SESSION['indicator_type']='';
$_SESSION['subcomponent']='';
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$IndicatorType=array('Outcome','Output');
$classCode=5;
$n=1;
$data="<form name='annualTargetx' id='annualTargetx' action=\"".$PHP_SELF."\"><table cellspacing='0'    id='report'   width='100%' border='0'>";
         $data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_new_annualTargets(this.value,'".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."');return false;\">
			  <option value='' >-select-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicator_type']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".$row['codeName']." </option>
        ";
	  }
				
					  $data.="</select></td>
            </tr>";
			
			if($_SESSION['indicator_type']==$IndicatorType[0]){
			$data.="<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_new_annualTargets('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output_id']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent_id']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox' disabled='disabled' id='output' onchange=\"xajax_new_annualTargets('".$_SESSION['subcomponent_id']."',this.value)\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_output order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else 		
		if($_SESSION['indicator_type']==$IndicatorType[1]){
			$data.="<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_new_annualTargets('".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output_id']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent_id']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox'  id='output' onchange=\"xajax_new_annualTargets('".$_SESSION['indicator_type']."','".$_SESSION['subcomponent_id']."',this.value)\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%'  order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		
		
else {

}
		
            $data.="<tr class='evenrow'>
              <td colspan='2'>Year:</td>
              <td colspan='9'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>
            <tr>
            <th width='25' class='evenrow2' colspan=4>&nbsp;</th>
        
              <th colspan='6' class='evenrow2'>Perfomance Indicator Annual Targets</th>
             
            </tr>
            <tr >
            
              <th width='200' class='dataRow' colspan='3' >Outcome/Output</th>
			  <th width='25' class='dataRow'>indicator Code</th>
			  <th width='' class='dataRow' colspan='3' >Indicator</th>
			  <th width='55' class='dataRow' align='right'>Baseline</th>
			 
			  <th width='51' class='dataRow' align='right'><b>Total Yearly Value</b></th>
             
            </tr>";

if($_SESSION['indicator_type']==$IndicatorType[0]){
$y="select i.`indicator_id`, i.`prog_id`, i.`supergoal_id`, i.`goal_id`, i.`purpose_id`,
 i.`subcomponent_id`, i.`output_id`, i.`project_id`, i.`indicator_code`,
  i.`indicator_name`, i.`disaggregation`, i.`unitofmeasure`,
   i.`gender`, i.`indicator_type`, i.`level_ofindicator`,
    i.`frequency_of_reporting`, i.`remarks`, i.`responsible`,
	 i.`expected_output`,s.subcomponent,s.subcomponent_code
	  from tbl_indicator i  left join tbl_subcomponent s 
		on(s.subcomponent_id=i.subcomponent_id)
  		where i.indicator_type like '".$_SESSION['indicator_type']."%'
 		and i.subcomponent_id like '".$_SESSION['subcomponent_id']."%'
  		order by indicator_code asc";

}
else if($_SESSION['indicator_type']==$IndicatorType[1]){
$y="select i.`indicator_id`, i.`prog_id`, i.`supergoal_id`, i.`goal_id`, i.`purpose_id`,
 i.`subcomponent_id`, i.`output_id`, i.`project_id`, i.`indicator_code`,
  i.`indicator_name`, i.`disaggregation`, i.`unitofmeasure`,
   i.`gender`, i.`indicator_type`, i.`level_ofindicator`,
    i.`frequency_of_reporting`, i.`remarks`, i.`responsible`,
	 i.`expected_output`,s.subcomponent,s.subcomponent_code,
	 	o.output_name from tbl_indicator i left join tbl_subcomponent s 
		on(s.subcomponent_id=i.subcomponent_id)
		left join tbl_output o on(o.output_id=i.output_id) 
 		where i.indicator_type like '".$_SESSION['indicator_type']."%'
 		and i.subcomponent_id like '".$_SESSION['subcomponent_id']."%'
 		and i.output_id like '".$_SESSION['output_id']."%'  
		order by indicator_code asc";
		#$obj->alert($y);
}
else 

			$y="select * from tbl_indicator where indicator_type like '".$_SESSION['indicator_type']."%'  order by indicator_code asc"; 
		  	$query2=@mysql_query($y)or die(http("WP-369"));
			//$obj->alert($y);
		 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
$display_column=($_SESSION['indicator_type']==$IndicatorType[0])?$row['subcomponent_code']." ".$row['subcomponent']:$row['output_code']." ".$row['output_name'];
//$obj->alert($display_column);
		  $color=$inc%2==1?"evenrow3":"white1";
  			$data.="<tr class=$color> 
  			<td width='25' colspan='3' >".$display_column."</td>
 			<td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			".$row['indicator_name']."<input name='loopkey[]' type='hidden' value='1' id='loopkey'  /></td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$a."' size='30'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='30'   onFocus=\"xajax_new_target(getElementById('qtr1".$a."').value,getElementById('qtr2".$a.		"').value,getElementById('qtr3".$a."').value,getElementById('qtr4".$a."').value,'target".$a."');\"
			 type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false);'  value='' /></td>
            
          </tr>";
		  $inc++;
		 $a++; 
		 
		// readonly='readonly'
		
		  }
	$data.="<tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_save_AnnualTargetExtended(xajax.getFormValues('annualTargetx'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

 */



//--------------WORKPLAN------------------------------------------------------------------------


function new_annualTarget($year,$region,$outcome,$output){
$obj=new xajaxResponse();
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed! Contact Your M&E Personnel to Open the Reporting period and Try Again!");
return $obj;
}
/* if($year<currFinancialYear($_SESSION['Activeyear'],'YearRange')){
$obj->alert("You Cannot Enter Targets for a previous Project Year:! Contact Your M&E Personnel For Access.");
return $obj;
}  */ 

if($region==''){
$obj->alert("Please select Region to continue...");
return $obj;
} 

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
         
		
			<tr class='evenrow' > <td colspan='4'  align='left'>Outcome:</td><td colspan='13' >
			  <select name='outcome' id='outcome' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."',this.value,'".$output."');\" ><option value=''>-All-</option>";
			   //
				$data.=QueryManager::OutcomeFilter($outcome);
              $data.="</select></td></tr>
						<tr class='evenrow'>
              <td colspan='4'  align='left'>Output:</td><td colspan='13' >
			  <select name='output' id='output' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."','".$outcome."',this.value);\"    ><option value=''>-All-</option>";
				$data.=QueryManager::OutputFilter($outcome,$output);
              $data.="</select></td> </tr>
			    <tr class='evenrow'  >
			    <td colspan='4' ' align='left'>Region:</td><td colspan='13' >
			  <select name='zone' id='zone' style='width:400px;'   ><option value=''>-All-</option>";
			   //onchange=\"xajax_edit_annualTarget('".$formvalues."','".$year."','".$region."');\"
				$data.=QueryManager::ZoneFilter($region);
              $data.="</select></td>
                 
            </tr>
			  <tr class='evenrow'>
       		<td colspan='4'  align='left'>Project Year:</td><td colspan='15' >
			  <select name='fyear' id='fyear' style='width:400px;'    ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($year);
              $data.="</select></td>
			  </tr>
			  <tr class='evenrow'>
       		<td colspan='4'  align='left'>RP/Season:</td><td colspan='15' >
			  <select name='quarter' id='quarter' style='width:400px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
              $data.="</select></td>
			  </tr>
			  
			
			  <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Semi-Annual Targets</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='1' class='dataRow' >SELECT</th>
			 <th rowspan='1' colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='150' height='0.1'></th>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
             
			
			
				  <th width='' class='dataRow'>Baseline</th>
				  <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>
				   <!--
				   <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>-->
				   <th class='dataRow'  rowspan='1'>Total Annual Target</th>
            		
      	</tr>";
		
		    $inc=1;   $a=1;  		$m=1;

//$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
//$obj->alert(count($formvalues['indicator_idAll']));
/* if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please Filter out the Categories and Select Indicators For Setting/Editing Targets");
return $obj;
}
else

,w.semi_annual,w.curr_year,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
 */
///for($x=0;$x<count($formvalues['indicator_idAll']);$x++){

$y="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
  where i.output_id like '".$output."%'
    group by i.indicator_id
  order by i.indicator_code asc";
/* 


$y2="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
    group by i.indicator_id
  order by i.indicator_id,i.indicator_code asc 
  ";
  $y=count($formvalues['indicator_idAll'])==0?$y2:$y1; */
		  $query2=@mysql_query($y)or die(http("ED-791"));
		//$obj->alert($y);
		 
		
		
		  while($row=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  switch($row['typeofDisaggregation'])
		  		{
				case "None":
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"	 
		 /></td>
		"; 
	
			$data.="</tr>";
	
	break;
		case "Male and Female":
		
				$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
		readonly='readonly' class='evenrow' value='N/A'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"	
		 /></td>
		"; 
	
			$data.="</tr>";
	
		break;
		default:
		
		$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"	
		 /></td>
			<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		'','','','target".$m."');return false;\"		 
		 /></td>
		"; 
	
			$data.="</tr>";
	
		
		
		break;
		}
		  $inc++;
		$m++; 
		}
		  
	
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}






function new_annualTargetBackup29042013($year,$region,$outcome,$output){
$obj=new xajaxResponse();
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Your Reporting Period is Closed! Contact Your M&E Personnel to Open the Reporting period and Try Again!");
return $obj;
}
if($year<currFinancialYear($_SESSION['Activeyear'],'YearRange')){
$obj->alert("You Cannot Enter Targets for a previous Project Year:! Contact Your M&E Personnel For Access.");
return $obj;
} 

$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
         
		
			<tr class='evenrow' > <td colspan='4'  align='left'>Outcome:</td><td colspan='13' >
			  <select name='outcome' id='outcome' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."',this.value,'".$output."');\" ><option value=''>-All-</option>";
			   //
				$data.=QueryManager::OutcomeFilter($outcome);
              $data.="</select></td></tr>
						<tr class='evenrow'>
              <td colspan='4'  align='left'>Output:</td><td colspan='13' >
			  <select name='output' id='output' style='width:400px;'  onchange=\"xajax_new_annualTarget('".$year."','".$region."','".$outcome."',this.value);\"    ><option value=''>-All-</option>";
				$data.=QueryManager::OutputFilter($outcome,$output);
              $data.="</select></td> </tr>
			    <tr class='evenrow'  >
			    <td colspan='4' ' align='left'>Region:</td><td colspan='13' >
			  <select name='zone' id='zone' style='width:400px;'   ><option value=''>-All-</option>";
			   //onchange=\"xajax_edit_annualTarget('".$formvalues."','".$year."','".$region."');\"
				$data.=QueryManager::ZoneFilter($region);
              $data.="</select></td>
                 
            </tr>
			  <tr class='evenrow'>
       		<td colspan='4'  align='left'>Project Year:</td><td colspan='15' >
			  <select name='fyear' id='fyear' style='width:400px;'    ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($year);
              $data.="</select></td>
			  </tr>
			  <tr class='evenrow'>
       		<td colspan='4'  align='left'>RP/Season:</td><td colspan='15' >
			  <select name='quarter' id='quarter' style='width:400px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($year);
              $data.="</select></td>
			  </tr>
			  
			
			  <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Semi-Annual Targets</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='1' class='dataRow' >SELECT</th>
			 <th rowspan='1' colspan='4' width='' class='dataRow'>Indicator</th>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
             
			
			
				  <th width='' class='dataRow'>Baseline</th>
				  <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>
				   <!--
				   <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>-->
				   <th class='dataRow'  rowspan='1'>Total Annual Target</th>
            		
      	</tr>";
		
		    $inc=1;   $a=1;  		$m=1;

//$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
//$obj->alert(count($formvalues['indicator_idAll']));
/* if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please Filter out the Categories and Select Indicators For Setting/Editing Targets");
return $obj;
}
else

,w.semi_annual,w.curr_year,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
 */
///for($x=0;$x<count($formvalues['indicator_idAll']);$x++){

$y="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
  where i.output_id like '".$output."%'
    group by i.indicator_id
  order by i.indicator_code asc";
/* 


$y2="select w.workplan_id,i.indicator_type,i.indicator_id,i.indicator_code,i.indicator_name,
i.baseline,i.unitofmeasure,i.typeofDisaggregation,w.semi_annual,w.curr_year,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.male,0)) as maleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.female,0)) as femaleAprSep,
max(if(w.semi_annual='Apr - Sep' and w.curr_year='".$year."',w.other,0)) as otherAprSep,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.male,0)) as maleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.female,0)) as femaleOctMar,
max(if(w.semi_annual='Oct - Mar' and w.curr_year='".$year."',w.other,0)) as otherOctMar,
sum(if(w.curr_year='".$year."',w.Target,0)) as totalAnnualTarget
 from  tbl_indicator i 
 left join tbl_workplan w on(i.indicator_id=w.indicator_id)
    group by i.indicator_id
  order by i.indicator_id,i.indicator_code asc 
  ";
  $y=count($formvalues['indicator_idAll'])==0?$y2:$y1; */
		  $query2=@mysql_query($y)or die(http("ED-791"));
		//$obj->alert($y);
		 
		
		
		  while($row=@mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  switch($row['typeofDisaggregation'])
		  		{
				case "None":
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		
		<!--<td>
		
		<input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
		<input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>-->
		<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
			 
		 /></td>
		"; 
	
			$data.="</tr>";
	
	break;
		case "Male and Female":
		
				$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
		readonly='readonly' class='evenrow' value='N/A'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<!--
		<td>
		
		<input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
		<input name='male2[]' type='text' id='male2".$m."' size='10' value='".$row['maleOctMar']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='female2[]' type='text' id='female2".$m."' size='10' value='".$row['femaleOctMar']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='other2[]' type='text' id='other2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>-->
		<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
			 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 
		
		 /></td>
		"; 
	
			$data.="</tr>";
	
		break;
		default:
		
		$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='workplan_id[]' type='hidden' value='".$row['workplan_id']."' id='workplan_id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >".$row['typeofDisaggregation']."</td>
			<td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$m."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(this.value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		
		 /></td>
		<!--
		<td>
		
		<input name='quarter2[]' type='hidden' value='Oct - Mar' id='quarter1' />
		<input name='male2[]' type='text' id='male2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='female2[]' type='text' id='female2".$m."' size='10' readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
		 /></td>
		<td><input name='other2[]' type='text' id='other2".$m."' size='10' value='".$row['otherOctMar']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\" 		 /></td>-->
		<td>
		<input name='target[]' type='text' id='target".$m."' size='20' value='".$row['totalAnnualTarget']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyup=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,
		getElementById('male2".$m."').value,getElementById('female2".$m."').value,getElementById('other2".$m."').value,'target".$m."');return false;\"
			 
		 /></td>
		"; 
	
			$data.="</tr>";
	
		
		
		break;
		}
		  $inc++;
		$m++; 
		}
		  
	
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_annualTargetExtended(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}


function new_annualTargetsBackup($indicator_type){
$obj=new xajaxResponse();
$_SESSION['indicator_type']='';
$_SESSION['subcomponent']='';
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['wpsubcomponent_id']=$subcomponent;
$n=1;
$data="<form name='annualTargetx' id='annualTargetx' action=\"".$PHP_SELF."\"><table cellspacing='0'    id='report'   width='100%' border='0'>";
         $data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_new_annualTargets(this.value);return false;\">
			  <option value='' >-select-</option>";
		
$queryt=mysql_query("select distinct(indicator_type) as indicator_type from tbl_indicator  group by indicator_type having indicator_type  <> '' order by indicator_type asc")or die(http(735));
					  while($rowt=mysql_fetch_array($queryt)){
					 $selsubra=($_SESSION['indicator_type']==$rowt['indicator_type'])?"SELECTED":"";
					  $data.="<option value=\"".$rowt['indicator_type']."\" ".$selsubra.">".$rowt['indicator_type']."</option>";
					  }
					
				
					  $data.="</select></td>
            </tr>
			<tr class='display_none'>
              <td colspan='2'>Sub-Program:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onchange=\"xajax_new_annualTargets('".$_SESSION['subcomponent']."',this.value)\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
         
            $data.="<tr class='evenrow'>
              <td colspan='2'>Year:</td>
              <td colspan='9'>
                 <select name='fyear' id='fyear' class='combobox'><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				
				  $data.="<option value=\"".$end."\">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
            </tr>
            <tr>
            <th width='25' class='evenrow2' colspan=4>&nbsp;</th>
        
              <th colspan='6' class='evenrow2'>Perfomance Indicator Annual Targets</th>
             
            </tr>
            <tr >
            <th width='25' class='dataRow'>indicator Code</th>
              
			  <th width='' class='dataRow' colspan='3' >Indicator</th>
			  <th width='55' class='dataRow' align='right'>Baseline</th>
			  <th width='55' class='dataRow' align='right'>Jan - Mar</th>
				<th width='55' class='dataRow' align='right'>Apr - Jun</th>

				<th width='55' class='dataRow' align='right'>Jul - Sep</th>
				<th width='55' class='dataRow' align='right'>Oct - Dec</th>
			  <th width='51' class='dataRow' align='right'><b>Total Yearly Value</b></th>
             
            </tr>";


$y="select * from tbl_indicator where indicator_type='".$_SESSION['indicator_type']."'  order by indicator_name asc";
		  $query2=mysql_query($y)or die(http(791));
		//$obj->alert($y);
		 
		  $inc=1;
		  $a=1;
		  while($row=mysql_fetch_array($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopkey'  /></td>

			 
			 <td align='right'><input name='baselinevalue[]' type='text' id='baselinevalue".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='qtr1[]' type='text' id='qtr1".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='qtr2[]' type='text' id='qtr2".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='qtr3[]' type='text' id='qtr3".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='qtr4[]' type='text' id='qtr4".$a."' size='10'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='15'   onFocus=\"xajax_new_target(getElementById('qtr1".$a."').value,getElementById('qtr2".$a."').value,getElementById('qtr3".$a."').value,getElementById('qtr4".$a."').value,'target".$a."');\"
			 type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false);'  value='' /></td>
            
          </tr>";
		  $inc++;
		 $a++; 
		 
		// readonly='readonly'
		
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='10' align=right><input name='save' type='button' class='formButton2'   id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_save_AnnualTargetExtended(xajax.getFormValues('annualTargetx'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}









function view_AnnualResults($org_code,$div,$indicator_type,$indicator,$year,$semi_annual,$quarter,$program,$subprogram,$cur_page=1,$records_per_page=20){

$obj=new xajaxResponse();
$_SESSION['orgName2']=$org_code;
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['subprogram']='';
$_SESSION['program']='';
$_SESSION['semiAnnual']='';
$_SESSION['quarterName']='';
$_SESSION['fyear']='';
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$_SESSION['subprogram']=$subprogram;
$_SESSION['program']=$program;
$_SESSION['indicator_name']=$indicator;
$_SESSION['quarterName']=($quarter=='')?$_SESSION['quarter']:$quarter;

//$_SESSION['semiAnnual']=(($_SESSION['quarterName']=='Jan - Mar') or ($_SESSION['quarterName']=='Apr - Jun'))?"Jan - Jun":"Jul - Dec";

$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action='?' method='post'><table cellspacing='1'  id='report'     width='100%' >".filter_annualResults()."


<tr  class='evenrow'>
     
    <td colspan='11'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('annualTarget1'));return false;\" value='Delete' class='redhdrs' /></td>
    
	
  </tr>
            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow'>&nbsp;</th>
              <th width='145' colspan='' class='dataRow'>&nbsp;</th>
              <th colspan='7' class='dataRow'>Annual Results/Progress Against Targets</th>
															</tr>
            <tr><th width='' class='dataRow'>SELECT</th>
			<th width='' colspan='3' width='' class='dataRow'>Indicator</th>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			<th width='' colspan='' width='' class='dataRow'>Disaggregation</th>
			<th width='' colspan='' width='' class='dataRow'>Unit of Measure</th>
             <th width='' class='dataRow'>Baseline</th>
            		<th width='' class='dataRow'>Male</th>
					<th width='' class='dataRow'>Female</th>
			  			<th class='dataRow' colspan='' >Total</th></tr>";
$inc=1;

$x="select r.`id`, r.`org_code`, r.`prog_id`, r.`subcomponent_id`,
 r.`year`, r.`reportingPeriod`, r.`semi_annual`, r.`indicator_id`, r.`male`, r.`female`, r.`total`, r.`date_reported`, r.`updatedby`,i.indicator_name,i.indicator_type,i.indicator_code,i.unitofmeasure,i.typeofDisaggregation
from tbl_indicator i left outer join tbl_organizationreporting r on(i.indicator_id=r.indicator_id)
 WHERE i.indicator_type like '".$_SESSION['indicator_type']."%'
 and 	i.indicator_name like '".$_SESSION['indicator_name']."%'
  and 	r.semi_annual like '".$_SESSION['quarterName']."%'
  and r.org_code like '".$_SESSION['orgName2']."%'
  group by i.indicator_name,r.year,r.`semi_annual`,r.reportingPeriod order by i.indicator_code asc";
  //,r.year,r.`semi_annual`,r.reportingPeriod
//$obj->alert($x);
$query=mysql_query($x)or die(http("WP-543"));
		  if(mysql_num_rows($query)>0)
		  while($row=mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $l="align=right";
		  $events2="onmouseup=\"this.style.backgroundColor='#ffa040';\"";

$data.="<tr class='$color' ".$events2.">
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='checkbox' name='p_id[]'   id='p_id' value='".$row['id']."' >
".$inc."</td>
            <td align=left><INPUT type=hidden name='subact_id[]'  id=subact_id value=$row[subact_id] >$row[indicator_code]</td>
            <td colspan='2' width='500'>$row[indicator_name]</td>
			<td align='left'>$row[indicator_type]</td>
			<td  align='left'>$row[typeofDisaggregation]</td>
			<td  align='left'>$row[unitofmeasure]</td>
			<td  align='right'>$base</td>
			<td align=right>$row[male]</td>
			<td align=right>$row[female]</td>
			<td align=right ><strong>$row[total]</strong></td>
        </tr>";
$inc++;
		  }
		


$data.="<tr><td>".noRecordsFound($query,11)."</td></tr>";
 $data.="<tr  class='evenrow'>
         <td colspan='11'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_annualResults(xajax.getFormValues('annualTarget1'));return false;\" value='edit' />| <input type='button' class='formButton2'   id='button' TITLE='Delete'  onclick=\"ConfirmDeletion(xajax.getFormValues('annualTarget1'));return false;\" value='Delete' class='redhdrs' /></td>
    
	
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}




function new_AnnualResults($year,$zone,$district,$outcome,$output,$quarter){
$obj=new xajaxResponse();
if($_SESSION['username']==NULL){
$obj->redirect('index.php');
return $obj;
}

$_SESSION['subcomponent_id']=$outcome;
$_SESSION['output_id']=$output;

if($quarter<>$_SESSION['quarter']){
	$obj->alert($quarter. " is not open For Reporting please Try ".$_SESSION['quarter']);
	return $obj;
	}



$reportingType=(isset($_GET['linkvar'])=='Progress Against Targets (FS)')?"Field Supervisors":"Managers";

$reportTitle=($_SESSION['quarter']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".substr($year,5,9):"Semi-Annual Achievements for the Period ".$_SESSION['quarter']." ".$year;

$zoneAndDistrict=($_GET['linkvar']=='Progress Against Targets (HO)')?"display_none":"evenrow";

if($_GET['linkvar']=='Progress Against Targets (FS)')
{

	if($zone==NULL||$zone==0){
	$obj->alert("Please Select a Region For Capturing/Editing Achievements");
	return $obj;
	}
	
	
	
	
	if($district==NULL||$district==0){
	$obj->alert("Please Select a District For Capturing/Editing Achievements");
	return $obj;
	}
}
//else
$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='1'   id='report'   width='100%' border='0'>
<tr class='evenrow'>
              <td colspan='2'>Output:</td>
			  
              <td colspan='11'><select name='subcomponent' class='combobox' id='subcomponent' 
			  onChange=\"xajax_new_AnnualResults('".$year."','".$zone."','".$district."',this.value,'".$_SESSION['output_id']."','".$_SESSION['quarter']."');return false;\">";
$data.="<option value=''>-All-</option>"; 
			$data.=QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Activity:</td>
              <td colspan='11'><select name='output' class='combobox'  id='output'   onChange=\"xajax_new_AnnualResults('".$year."','".$zone."','".$district."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['quarter']."');return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::OutputFilter($_SESSION['subcomponent_id'],$_SESSION['output_id']);
$data.="</select></td>
        </tr>
         <tr class='evenrow'>
       
        
              <td colspan='4' class='evenrow' align='center'>Project Year:</td>
			  <td colspan='4' >
			  <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($year);
              $data.="</select></td>
			  <td colspan='2' class='evenrow' align='center'>RP/Season:</td>
			  <td colspan='6' >
			  <select name='semiAnnual' id='semiAnnual' style='width:200px;'  ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($_SESSION['quarter']);
              $data.="</select></td>
             
            </tr>
			<tr class='".$zoneAndDistrict."'>
       
        
              <td colspan='4' class='evenrow' align='center'>Region:</td>
			  <td colspan='4' >
			  <select name='zone' id='zone' style='width:200px;'  ><option value=''>-All-</option>";
					$data.=QueryManager::ZoneFilter($zone);		
              $data.="</select></td>
			  <td colspan='2' class='evenrow' align='center'>District:</td>
			  <td colspan='6' >
			  <select name='district' id='district' style='width:200px;'  >
			  <option value=''>-All-</option>";
					$data.=QueryManager::DistrictFilter($zone,$district);
              $data.="</select></td>
             
            </tr>
			
		<tr><th rowspan='2' class='dataRow' >SELECT</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
			
		<th colspan='7' class='dataRow' ><center>".$reportTitle."</center></center></th>
		
		<th class='dataRow'  rowspan='2'>Total Actual</th>
			</tr>
			<tr>
			<th width='' colspan='' width='' class='dataRow'>Indicator type</th>
              <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='2' width='' class='dataRow'>Disaggregation</th>
             
		
				  <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>
				 
            		
      	</tr>";
		
		    $inc=1;   $a=1;  		$m=1;

//$count=$formvalues['indicator_idAll']==0?$formvalues['loopkey']:$formvalues['indicator_idAll'];
//$obj->alert(count($formvalues['indicator_idAll']));
if(($_SESSION['quarter']=='Closed')||($_SESSION['Activeyear']=='Closed')){
$obj->alert("Please Your Reporting Period is Closed Please Open the Reporting period and Try Again!");
return $obj;
}
/* if(count($formvalues['indicator_idAll'])==0){
$obj->alert("Please Filter out the Categories and Select Indicators For Capturing/Editing Achievements");
return $obj;
}
else */
//for($x=0;$x<count($formvalues['indicator_idAll']);$x++){

//and i.responsible='".$reportingType."'
			//$y=QueryManager::EditAnnualResults($formvalues['indicator_idAll'][$x],$year);
			$y="select i.indicator_type,i.indicator_id,i.responsible,i.indicator_code,i.indicator_name,
						i.baseline,i.unitofmeasure,i.typeofDisaggregation,i.disaggregation
						 from  tbl_indicator i 
						   where i.output_id like '".$_SESSION['output_id']."%'
						  and i.responsible<>'Managers'
						  group by i.indicator_id
						  order by i.indicator_code asc 
						  ";
			
			//$obj->alert($y);
		  $query2=@Execute($y)or die(http("ED-791"));
		 
		 
		
		
		  while($row=@FetchRecords($query2)){

		  $color=$inc%2==1?"evenrow3":"white1";
		  
		  switch($row['typeofDisaggregation']){
					case "None":
							
$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";
				
		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
			
			onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>"; 
	
			$data.="</tr>";
			

								break;
								case "Male and Female":
								
								//-Male Female Oct March=--------------------=

$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";

		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='".$_SESSION['quarter']."' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  value='".$row['maleAprSep']."' onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10' value='".$row['femaleAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10'   onKeyPress='return numbersonly(event, false)'
		readonly='readonly' class='evenrow' value='N/A'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"  
		
		 /></td>
		</tr>";
								break;
								default:
								
							
$data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='4'><INPUT type='hidden' name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >
			<input name='loopKey[]' type='hidden' value='1' id='loopKey' /> 
		<input name='id[]' type='hidden' value='".$row['id']."' id='id' />".$row['indicator_name']."</td>
			<td align='left' colspan='1'>".$row['indicator_type']."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
				<td align='left' colspan='2'><INPUT type='hidden' name='typeofDisaggregation[]'  id='typeofDisaggregation' value='".$row['typeofDisaggregation']."' >
				".$row['disaggregation']."</td>";
				
		$data.="
		<td>
		<input name='quarter[]' type='hidden' value='Apr - Sep' id='quarter' />
		<input name='male[]' type='text' id='male".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		
		 /></td>
		<td><input name='female[]' type='text' id='female".$m."' size='10'  readonly='readonly' class='evenrow' value='N/A'   onKeyPress='return numbersonly(event, false)'
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		<td><input name='other[]' type='text' id='other".$m."' size='10' value='".$row['otherAprSep']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
		
		onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		
		<td>
		<input name='target[]' type='text' id='target".$m."' size='10' value='".$row['totalAnnualActual']."'  onKeyPress='return numbersonly(event, false)'
		
		onKeyUp=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\"
			 
			 onFocus=\"xajax_calc_targetSemiAnnual(getElementById('male".$m."').value,getElementById('female".$m."').value,getElementById('other".$m."').value,'','','','target".$m."');return false;\" 
		 /></td>
		"; 
	
			$data.="</tr>";
			

	break;
					}
					
		  
		  
		
		  $inc++;$m++;
		
		}
		  
		  //}
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='16' align=right><input name='save' type='button'  id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_update_AnnualResults(xajax.getFormValues('annualTarget'));\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}

function new_AnnualResultsBackup($org_code,$semi_annual,$indicator_type,$subcomponent,$output,$year){
$obj=new xajaxResponse();
$_SESSION['output_id']='';
$_SESSION['entryyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['indicator_type']='';

$_SESSION['output_id']=$output;
$_SESSION['semi_annual']=$semi_annual;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['entryyear']=$year;
$gender='Male and Female';
$outcome="Outcome Indicator";
$output_indicator="Output Indicator";



if(mappQuarterToSemiAnnual($_SESSION['quarter'])<>$semi_annual){
$obj->alert('Process Halted! You are Trying to Enter or Edit Details in a wrong Reporting Period!');
return $obj;

}


$n=1;
$data="<form name='annualTarget' id='annualTarget' action='".$PHP_SELF."'><table cellspacing='0'  id='report'     width='100%' border='0'>";
//getElementById('Program')
         $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label><input type='hidden' name='org_code' id='org_code' value='".$org_code."'></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."',this.value,'".$_SESSION['subcomponent']."','".$_SESSION['output_id']."','".$_SESSION['entryyear']."');return false;\"><option value=''>-select-</option>";
			    
 $queryit=@mysql_query("select indicator_type from tbl_indicator where indicator_type <> '' group by indicator_type order by indicator_type asc")or die(http("WP-601"));
					  while($rowit=@mysql_fetch_array($queryit)){
					 $selsubra=($_SESSION['indicator_type']==$rowit['indicator_type'])?"SELECTED":"";
					  $data.="<option value=\"".$rowit['indicator_type']."\" ".$selsubra.">".$rowit['indicator_type']."</option>";
					  }
					
				
 $data.="</select></td>
            </tr>";
			//outcome and output reporting
			
			
			if($_SESSION['indicator_type']==$outcome){
			$data.="<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."','".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output_id']."','".$_SESSION['entryyear']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("WP-618"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent_id']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox' disabled='disabled' id='output' onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."','".$_SESSION['indicator_type']."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['entryyear']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_output order by output_code asc")or die(http("WP-629"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else if($_SESSION['indicator_type']==$output_indicator){
				$data.="<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."','".$_SESSION['indicator_type']."',this.value,'".$_SESSION['output_id']."','".$_SESSION['entryyear']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['subcomponent_id']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox'  id='output' onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."','".$_SESSION['indicator_type']."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['entryyear']."');return false;\">";
$data.="<option value=''>-select-</option>"; 
$query=mysql_query("select * from tbl_output order by output_code asc")or die(http("WP-656"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		
		
else {

}	
			
			
			
			
			
         
            $data.="<tr class='evenrow'>
              <td colspan='2'>Year:</td>
              <td colspan='9'>
                 <select name='fyear' id='fyear' class='combobox'   onchange=\"xajax_new_AnnualResults('".$org_code."','".$_SESSION['semi_annual']."','".$_SESSION['indicator_type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id'].",this.value);return false;\" ><option value=''>-select-</option>";
                $yr=$_SESSION['Activeyear'];  $end=$yr;do{
				$selYr=($end==$_SESSION['entryyear'])?"SELECTED":"";
				  $data.="<option value=\"".$end."\" ".$selYr.">".$end."</option>";
				  $end--;
				  }while($end>=2011);
              $data.="</select></td>
			  
            </tr>
            <tr>
            <th width='25' class='evenrow2' colspan=3>&nbsp;</th>
        
              <th colspan='6' ><center>Perfomance Indicator Annual Results</center></th>
             
            </tr>
            <tr class=''>
            <th width='25' class='evenrow2'>indicator Code</th>
              
			  <th width='200' class='evenrow2' colspan='3' >Indicator<img src='images/spacer2.png'></th>
			  <th width='55' class='evenrow2' align='right'>Base Value</th>
			  <th width='55' class='evenrow2' align='right'>Target</th>
<th width='55' class='evenrow2' align='right'>Male</th>
<th width='51' class='evenrow2' align='right'><b>Female</b></th>
<th width='51' class='evenrow2' align='right'><b>Total Value</b></th>
			 
             
            </tr>";

	

if($_SESSION['indicator_type']==$outcome){
$y="select i.`indicator_id`, i.`prog_id`, i.`supergoal_id`, i.`goal_id`, i.`purpose_id`,
 i.`subcomponent_id`, i.`output_id`, i.`project_id`, i.`indicator_code`,
  i.`indicator_name`, i.`disaggregation`, i.`unitofmeasure`,i.typeofDisaggregation,
   i.`gender`, i.`indicator_type`, i.`level_ofindicator`,
    i.`frequency_of_reporting`, i.`remarks`, i.`responsible`,
	 i.`expected_output`,s.subcomponent,w.Target,i.baseline,w.curr_year
	  from tbl_indicator i  left join tbl_subcomponent s 
	 
on(s.subcomponent_id=i.subcomponent_id)
 left join tbl_workplan w on(w.indicator_id=i.indicator_id)
  where i.indicator_type='".$_SESSION['indicator_type']."'
 and i.subcomponent_id='".$_SESSION['subcomponent_id']."' 
  order by indicator_code,indicator_name asc";
//and w.curr_year like '".$_SESSION['entryyear']."%'
}
else if($_SESSION['indicator_type']==$output_indicator){
$y="select i.`indicator_id`, i.`prog_id`, i.`supergoal_id`, i.`goal_id`, i.`purpose_id`,
 i.`subcomponent_id`, i.`output_id`, i.`project_id`, i.`indicator_code`,
  i.`indicator_name`, i.`disaggregation`, i.`unitofmeasure`,i.typeofDisaggregation,
   i.`gender`, i.`indicator_type`, i.`level_ofindicator`,
    i.`frequency_of_reporting`, i.`remarks`, i.`responsible`,
	 i.`expected_output`,s.subcomponent,w.Target,i.baseline,w.curr_year,
					 o.output_name from tbl_indicator i  left join tbl_subcomponent s 
				on(s.subcomponent_id=i.subcomponent_id)
			left join tbl_output o on(o.output_id=i.output_id)
		left join tbl_workplan w on(w.indicator_id=i.indicator_id)
	where i.indicator_type='".$_SESSION['indicator_type']."'
 and i.subcomponent_id='".$_SESSION['subcomponent_id']."'
 and i.output_id ='".$_SESSION['output_id']."' 
 
    order by indicator_code,indicator_name asc";
//and w.curr_year like '".$_SESSION['entryyear']."%'
}
else 

$y="select * from tbl_indicator where indicator_type='".$_SESSION['indicator_type']."'  order by indicator_name asc"; 
		  $query2=mysql_query($y)or die(http("WP-763"));



 
		  $inc=1;
		  $a=1;
		  while($row=@mysql_fetch_array($query2)){
		  //disaggregation
		  
$disaggregation=($row['typeofDisaggregation']==$gender)?"<td align='right'><input name='male[]' type='text' id='male".$a."' size='20'   onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text' id='female".$a."' size='20'   onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='20'   onFocus=\"xajax_new_actual(getElementById('male".$a."').value,getElementById('female".$a."').value,'target".$a."');return false;\" type='text' id='target".$a."' size='10' readonly='readonly' onKeyPress='return numbersonly(event, false)'   /></td>":"<td align='right'><input name='male[]' type='text' id='male".$a."' value='N/A' size='20' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)' /></td>
		<td align='right'><input name='female[]' type='text' id='female".$a."' value='N/A' size='20' readonly='readonly' class='evenrow'  onKeyPress='return numbersonly(event, false)' /></td>
			<td align='right'><input name='target[]' size='20' type='text' id='target".$a."' size='10' onKeyPress='return numbersonly(event, false)'   /></td>";
			
			
		  $color=$inc%2==1?"evenrow3":"white1";
  $data.="<tr class=$color>
 <td width='25' >".$row['indicator_code']."</td>
			<td colspan='3'><INPUT type=hidden name='indicator_id[]'  id='indicator_id' value='".$row['indicator_id']."' >".$row['indicator_name']."<input name='loopKey[]' type='hidden' value='1' id='loopkey'  /></td>
 <td align='right'><input name='baselinevalue[]' class='evenrow'  readonly='readonly' type='text' id='baselinevalue".$a."' size='10' value='".$row['baseline']."'  onKeyPress='return numbersonly(event, false)' /></td>
 <td align='right'><input name='annualtarget[]' class='evenrow' readonly='readonly' type='text' id='annualtarget".$a."' size='10'  onKeyPress='return numbersonly(event, false)' value='".$row['Target']."' /></td>".$disaggregation."</tr>";
		  $inc++;
		 $a++; 
		
		  }
	$data.="
		  <tr class='evenrow'>
  
            <td colspan='9' align=right><input name='save' type='button' class='formButton2'   id='button' id='save' style='width:120px;' value='Save' title='Save workplan' onclick=\"xajax_save_AnnualResults(xajax.getFormValues('annualTarget'));return false;\" /></td>
          </tr></table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
//----------------------end of workplan-------------------------------




 function getRecordId($zone,$semiAnnual,$year,$district,$div){
$obj= new xajaxResponse();
$n=1;

 if($_SESSION['username']==''){
$obj->redirect("index.php");
return $obj;

}


//$obj->alert($div);

 $sql="select * from tbl_organizationreporting where district='".$district."' and year='".$year."' and semi_annual='".$semiAnnual."' ";
//$obj->alert($sql);
$query=@Execute($sql)or die(http("WRKP-2199"));
	$queryRecord=@FetchRecords($query);
	

			if($queryRecord['district']>0){
			$obj->call("xajax_view_AnnualResultsFS",$zone,$queryRecord['district'],'','','',$year,$semiAnnual,'','',1,20,$div);
			return $obj;
			}

$obj->assign('bodyDisplay','innerHTML','');
return $obj;
}
 
 
 
 
 function view_quantitativeReportLog($year,$organization,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1; $inc=1;
$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['district1']=$district;
$_SESSION['Ryear']='';

$_SESSION['Ryear']=($year<>'')?$year:$_SESSION['Activeyear']; 
//$obj->alert($_SESSION['Ryear']);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>YEAR</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='year' id='year' onchange=\"xajax_view_quantitativeReportLog(this.value,'".$organization."',1,20); return false;\" style='width:300px;'>";
		 $end=$_SESSION['Activeyear'];
		do{
		$selyear=($_SESSION['Ryear']==$end)?"SELECTED":"";
		$data.="<option value=\"".$end."\" ".$selyear.">".$end."</option>";
		$end--;
		}while($end>=2010);
		
		$data.="</select></strong></div></td>
        </tr>
		
		<tr class='evenrow'>
        <td colspan='3' ><div align='center' class=''>Organization:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='organization' id='organization' onchange=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."',this.value,1,20); return false;\" style='width:300px;'><option value=''>-All-</option>";
		
		$ql="select * from tbl_organization order by orgName asc";
$qry = @mysql_query($ql)or die(http("PR-00573"));
while($row=mysql_fetch_array($qry)){
$data.="<option value=\"".$row['org_code']."\"  ".CheckExistance($row['org_code'],$organization,'selected').">".$row['orgName']."</option>";


}
		$data.="</select></strong></div></td>
        </tr>
	  <tr>
        <th colspan='13' ><div align='center' class=''> SEMI-ANNUAL Quantitative Perfomance Monitoring</div></th>
        </tr>
      
      <tr>
	  <th colspan=2><b class='' >NO.</th>
	   <th width='' colspan=7 ><strong class=''>Organization</strong></th>
		<th  width='70'><strong class=''>Oct - Mar</strong></th>
		
		
		<th  width='70'><strong class=''>Apr - Sep</strong></th>
		 </tr>";


$ql="select * from tbl_organization where org_code like '".$organization."%' order by orgName";
$qry = @mysql_query($ql)or die(http("PR-00583"));
		$max_records = @mysql_num_rows($qry);
	//or die(http("PR-0032"))
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$aa=$offset+1;
$new_query=mysql_query($ql." limit ".$offset.",".$records_per_page) or die(http("PR-589"));  



	  while($row=mysql_fetch_array($new_query)){



 $query_string="select q.`id`, q.`org_code`, q.`prog_id`,p.org_code,p.orgName, q.`subcomponent_id`,q.reportingPeriod,q.semi_annual,q.year,

sum(if(((q.semi_annual='Oct - Mar')  and q.year like '".$_SESSION['Ryear']."%'),q.org_code,'')) AS Quarter1,

sum(if(((q.semi_annual='Apr - Sep')  and q.year like '".$_SESSION['Ryear']."%'),q.org_code,'')) AS Quarter2
 FROM tbl_organization p
LEFT JOIN tbl_organizationreporting q ON ( q.org_code = p.org_code ) 
where p.org_code='".$row['org_code']."'
 group by p.org_code order by p.org_code Asc"; 
 $query_n=@mysql_query($query_string)or die(http("WP-0185"));
 //$obj->alert($query_string);
while($rowq=@mysql_fetch_array($query_n)){
//$obj->alert($row['id']);
$_SESSION['program_code']=$row['prog_id'];
$div="status".$row['org_code'];
	  $color=$n%2==1?"evenrow3":"white1";
     $data.="<tr class=$color class='black'>
	 <td><input name='org_code[]' id='org_code' type='checkbox' value='".$row['org_code']."' /></td><td>".$inc++."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$row['org_code']."' />
	 
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$row['org_code']."'>".ucfirst(strtolower($row['orgName']))."</td>
		<td align='center'>";


if(($rowq['Quarter1']<>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('Oct - Mar','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['org_code']."','Oct - Mar','','','','');return false;\">";
}

$data.="</td>
<td align='center'>";


if(($rowq['Quarter2']<>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('Apr - Sep','".$_SESSION['Ryear']."','".$row['org_code']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$row['org_code']."','Apr - Sep','','','','');return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='$div'></div></td></tr>
	  
	  ";
	  $n++;
	  }
	  }
   
 $data.="<tr><td colspan='11' align='right'>";
	  
	  $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;



if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."','".$organization."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."','".$organization."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."','".$organization."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_quantitativeReportLog('".$_SESSION['Ryear']."','".$organization."','".$cur_page."',this.value)\">";


	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>";


	  
	  
	  
   
$data.="</td></tr></table></form>";


$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}

 
 
 function ViewLOPTargets($indicator_type,$subcomponent,$output,$indicator,$year,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['indicator']='';
$_SESSION['indicator_Type']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';

$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>
<table cellspacing='1'  id='report'  border='0'    width='100%' >".filter_LOPTarget();


if($_GET['action']=='Reports'){
		$data.="";
		}else {
$data.="<tr  class='evenrow'>
     <td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_LOPTarget(xajax.getFormValues('annualTarget1'),'".$_SESSION['fyear']."');return false;\" value='edit' /> 
	 <input type='hidden'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'xajax_delete_LOPTarget','tbl_loptargets');return false;\" value='Delete' /></td>
    
	
  </tr>";
  }
            $data.="<tr>
			<th class='dataRow' rowspan='3' >NO/SELECT</th>
                <th  colspan='3' rowspan='3' class='dataRow'>Indicator</th>
			      <th scope='col' rowspan='3' class='dataRow'>Indicator type</th>
			 		<th scope='col' rowspan='3' class='dataRow'>unit of measure</th>
			 		<th scope='col' rowspan='3'  class='dataRow'>Type of Disaggregation</th>
              		<th scope='col' colspan='13' class='dataRow' ><center>Life of Project Targets</center></th>
					<th rowspan='3'>Action</th>
															</tr><tr>
														
									
            ";
	
			 $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
				 // $nx=$n."/".$n++;
				 // $obj->alert($nx);
				 $zz=$n+1;
            		$data.="<th class='evenrow2' colspan='3' rowspan='1' align='right'><center>".$n."/".$zz."</center></th>";
					
					}
			 
			 
			 $data.="<th  scope='col' rowspan='2' class='dataRow'>Total LOP Target</th>
            </tr>";
		
			 $data.="<tr><th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>";
		
				  $data.="</tr>";
$inc=1;
$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";



//$obj->alert(WorkplanYearSequence($queryHeader['opening_year'],$queryHeader['closure_year'],0));

			$x=QueryManager::LOPTargets($_SESSION['subcomponent_id'],$rowoutput['output_id'],$_SESSION['indicator_Type'],$_SESSION['indicator']);
			
			
			
			
//$obj->alert($x);
//$_SESSION['queryExport']=$x;
		$query=Execute($x)or die(http("Workplan-0123"));
		  if(mysql_num_rows($query)>0)
		  while($row=FetchRecords($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
$indicator_type=($row['indicator_type']<>NULL)?$row['indicator_type']:noteMsgDefined("Not Defined");
$MaleYear1=($row['MaleYear1']<>NULL)?$row['MaleYear1']:"-";
$FemaleYear1=($row['FemaleYear1']<>NULL)?$row['FemaleYear1']:"-";
$OthersYear1=($row['OthersYear1']<>NULL)?$row['OthersYear1']:"-";
$MaleYear2=($row['MaleYear2']<>NULL)?$row['MaleYear2']:"-";
$FemaleYear2=($row['FemaleYear2']<>NULL)?$row['FemaleYear2']:"-";
$OthersYear2=($row['OthersYear2']<>NULL)?$row['OthersYear2']:"-";
$MaleYear3=($row['MaleYear3']<>NULL)?$row['MaleYear3']:"-";
$FemaleYear3=($row['FemaleYear3']<>NULL)?$row['FemaleYear3']:"-";
$OthersYear3=($row['OthersYear3']<>NULL)?$row['OthersYear3']:"-";
$MaleYear4=($row['MaleYear4']<>NULL)?$row['MaleYear4']:"-";
$FemaleYear4=($row['FemaleYear4']<>NULL)?$row['FemaleYear4']:"-";
$OthersYear4=($row['OthersYear4']<>NULL)?$row['OthersYear4']:"-";
$TotalTarget=($row['MaleYear1']+$row['FemaleYear1']+$row['OthersYear1']+$row['MaleYear2']+$row['FemaleYear2']+$row['OthersYear2']+$row['MaleYear3']+$row['FemaleYear3']+$row['OthersYear3']+$row['MaleYear4']+$row['FemaleYear4']+$row['OthersYear4']);

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$row['workplan_id']."' >
".$inc."</td>


		
            <td align=left >
			<INPUT type='hidden' name='fyear[]'  id='fyear'  value='".$_SESSION['fyear']."' />
			<INPUT type='hidden' name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
			<td colspan='2' width=''>".$row['indicator_name']."</td>
	
			<td align='left'>".$indicator_type."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
			<td align='left' colspan='' >".$row['typeofDisaggregation']."</td>";
		
		$data.="<td align='right'>".$MaleYear1."</td>
			<td align='right'>".$FemaleYear1."</td>
			<td align='right'>".$OthersYear1."</td>";
		$data.="<td align='right'>".$MaleYear2."</td>
			<td align='right'>".$FemaleYear2."</td>
			<td align='right'>".$OthersYear2."</td>";
			$data.="<td align='right'>".$MaleYear3."</td>
			<td align='right'>".$FemaleYear3."</td>
			<td align='right'>".$OthersYear3."</td>";
			$data.="<td align='right'>".$MaleYear4."</td>
			<td align='right'>".$FemaleYear4."</td>
			<td align='right'>".$OthersYear4."</td>";
				$data.="<td align='right' ><strong>".$TotalTarget."</strong></td>
			<td valign='middle' align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"xajax_delete_LOPTarget('".$row['indicator_id']."','".$_SESSION['fyear']."','tbl_loptargets');return false;\" ></td>
        </tr>";
$inc++;
		  }
		}
		
			$data.="".noRecordsFound($query,19);
		  if($_GET['action']=='Reports'){
		$data.="";
		}else {
$data.="<tr  class='evenrow'>
     <td colspan='21'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'xajax_delete_LOPTarget','tbl_loptargets');return false;\" value='edit' /> 
	 <input type='hidden'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'xajax_delete_LOPTarget','tbl_loptargets');return false;\" value='Delete' /></td>
    
	
  </tr>";
  }
$data.="</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}




function ViewLOPTargetsBackup($target_type,$indicator_type,$output,$indicator,$year,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
$_SESSION['indicator']='';
$_SESSION['indicatorType']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';

$_SESSION['indicatorType']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;


$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >".filter_LOPTarget()."


<tr  class='evenrow'>
     
    <td colspan='14'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_LOPTarget(xajax.getFormValues('annualTarget1'));return false;\" value='edit' /> | 
	 <input type='button'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'workplan_id','tbl_loptargets');return false;\" value='Delete' /></td>
    
	
  </tr>
            <tr>
             
              <th colspan='14' class='dataRow' ><center>Life of Project Targets</center></th>
															</tr>
            <tr><th width='' class='dataRow' >SELECT</th>
			
              <th width='' colspan='5' width='' class='dataRow'>Indicator</th>

             <th width='' colspan='' width='' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>Unit of measure</th>
			 
			 ";
			 
				  $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
            		$data.="<th width='100'  colspan='1' align='right'>".$n."</th>";
					
					}
            		$data.="<th class='dataRow' colspan=''  bgcolor='#669900'>Life of Project Target</th>
           			</tr>";
$inc=1;

/* $sql="select * from  `tbl_logframe` where level_ofindicator like '".$target_type."%' and indicator_type like '".$_SESSION['indicatorType']."%'  order by level_ofindicator asc";
$queryType=@mysql_query($sql)or die(http("WP-1465"));
#$obj->alert($sql);
				  while($rowsp=@mysql_fetch_array($queryType)){
				  
				  $data.="<tr class='evenrow3'>
 
            <td align='left' colspan='14'><strong>".$rowsp['component_code'].":   ".$rowsp['component']."</strong></td>
            
			</tr>"; */
				  




$x="SELECT w.`workplan_id` , i.subcomponent_id, i.output_id, i.indicator_code, i.indicator_id, i.indicator_name, i.`unitofmeasure` , 
w.Target AS TotalTarget, i.`display` ,  i.`indicator_type`, i.`baseline`, w.`target_year`, w.`Target`, w.`display`, w.`dateUpdated`, w.`lastUpdatedby`,

max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],0)."'),w.`Target`,0)) as Year1,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],1)."'),w.`Target`,0)) as Year2,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],2)."'),w.`Target`,0)) as Year3,
max(if((w.`target_year`='".currFinancialYear($queryHeader['opening_year'],$queryHeader['closure_year'],3)."'),w.`Target`,0)) as Year4,

sum( w.`Target` ) AS LOPTarget, w.`display`
FROM tbl_indicator i
LEFT JOIN `tbl_loptargets` w ON ( w.indicator_id = i.indicator_id )
WHERE i.indicator_type LIKE '".$rowsp['indicator_type']."%' and i.level_ofindicator like '".$target_type."%' and i.display like 'yes%' and( i.output_id like '".$rowsp['component_id']."%' or 
 i.supergoal_id like '".$rowsp['component_id']."%' or 
  i.goal_id like '".$rowsp['component_id']."%' or
   i.purpose_id like '".$rowsp['component_id']."%')
 GROUP BY i.indicator_id,i.indicator_type
ORDER BY i.indicator_code ASC";
//$obj->alert($x);

//
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("Workplan-0123"));
		  if(mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#cccccc';\"";
$indicator_type=($row['indicator_type']<>NULL)?$row['indicator_type']:noteMsgDefined("Not Defined");
$year1=($row['Year1']<>NULL)?$row['Year1']:"-";
$year2=($row['Year2']<>NULL)?$row['Year2']:"-";
$year3=($row['Year3']<>NULL)?$row['Year3']:"-";
$year4=($row['Year4']<>NULL)?$row['Year4']:"-";
$year5=($row['Year5']<>NULL)?$row['Year5']:"-";
$totalAc=($row['Year5']+$row['Year4']+$row['Year3']+$row['Year2']+$row['Year1']);
$TotalTarget=Mean($totalAc,$row['unitofmeasure']);
		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
".$inc."</td>
            <td align=left ><INPUT type='hidden' name='loopkey11[]'  id='loopkey11'  value='".$row['indicator_id']."' />".$row['indicator_code']."</td>
			<td colspan='4' width=''>".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
	<td align=left>".$indicator_type."</td>
		
			<td align=left colspan='1' >".$row['unitofmeasure']."</td>
		
					<td align=right ><strong>".$year1."</strong></td>
					<td align=right ><strong>".$year2."</strong></td>
		<td align=right ><strong>".$year3."</strong></td>
			<td align=right ><strong>".$year4."</strong></td>

			<td align=right  colspan=''><strong>".$TotalTarget."</strong></td>
        </tr>";
$inc++;
		  }
		  
		 // }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="<tr  class='evenrow'>
     
    <td colspan='14'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_LOPTarget(xajax.getFormValues('annualTarget1'));return false;\" value='edit' /> | <input type='button'  class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'workplan_id','tbl_loptargets');return false;\" value='Delete' /></td>
    
	
  </tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}








function view_AnnualResultsHO($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20){
$obj= new xajaxResponse();
	if($_SESSION['username']==NULL){
	$obj->alert("Your Session has Expired!");
	$obj->redirect('index.php');
	return $obj;
	}
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//------------------------------------------------------------------------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;

$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;

$reportingType=($_GET['linkvar']=='Progress Against Targets (HO)')?"Managers":"Field Supervisors";

if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
}



$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];


//-----------------------------------------#$_SESSION['fyear']=$year;

$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>
<table cellspacing='1'  id='report'     width='100%' >
<tr><td>
           District: __________Sub-county: _________Parish: _________Village__________

 

Date of training: ____________________________ (DD/MM/YYYY)

Main Value Chain or Technical Area addressed(Write ONE code):    _____

1=Coffee2=Maize      3. Beans          4=Agro-inputs            5. Finance       6. Gender/Youth

Training Focus: (Write ONEmost relevant/main code):  ____________

1=Good Agronomic Practices& IPM 2= Harvesting, PHH, Grading & Quality control

3. Marketing, pricing and e-payments            4.Savings mobilization, credit access

5. Micro-leasing & crop insurance                  6. Input product knowledge& input linkages

7. Entrepreneurship                                         8.Environmental mitigation practices

9. Agricultural machinery & machine use       10. Leadership                                                           

11. Farming as a family business                    12.Others (Specify) ___________________________

Target Audience(Write the ONEmost relevant/main code):  __________         

1=Farmers                               2=VA/CBF/Extension workers          3= Traders       4=Processors

5=Agro-inputs dealers            6=Village Farm-input Agent               7= Hullers       8= Bank staff   9=Exporters                           10=Others (Specify)__________________, _________________
</td></tr>
</table></form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}


function view_AnnualResultsFS($zone,$district,$indicator_type,$subcomponent,$output,$year,$semiAnnual,$indicatorCode,$indicator,$cur_page=1,$records_per_page=20,$div){
$obj= new xajaxResponse();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
#$obj->alert($_SESSION['fyear']);
//-----------------------------------------#$_SESSION['fyear']=$year;

$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];


$reportingType=($_GET['linkvar']=='Progress Against Targets (FS)')?"Field Supervisors":"Managers";


$n=1;
//".filter_annualResultsFS($fnctName="view_AnnualResultsFS")."
$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >

<tr class='evenrow' >
    <td scope='col' class=green_field colspan='3'></td>
    <td width='' scope='col' colspan=14><label><div style='float:right;'>
	   <input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'),'".pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')."','".$_SESSION['zoneID']."','".$_SESSION['districtID']."');return false;\" /> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Actuals&&responsible=Field Supervisors&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print Annual Actuals&&responsible=Field Supervisors&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div> </label></td>
  </tr>
<tr  class='evenrow'>
      <td colspan='16'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'),'".pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')."','".$_SESSION['zoneID']."','".$_SESSION['districtID']."');return false;\" value='edit' /> 
	 <input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'id','tbl_organizationreporting');return false;\" value='Delete' /></td>
    
	
  </tr><tr>
             <th rowspan='2' class='dataRow' >NO/SELECT</th>
			 <th rowspan=2 colspan='5' class='dataRow'>Indicator</th>
              <th colspan='7' class='dataRow' ><center>".$reportTitle."</center></th>
															<th class='dataRow'  rowspan='2' colspan='2'><center>Total Actual</center></th>
															<th class='dataRow'  rowspan='2' colspan='1'><center>Action</center></th>
															</tr>
            
			
			<tr>
			 <th width='' colspan='1' class='dataRow'>Indicator type</th>
			 <th width='' colspan='' width='' class='dataRow'>unit of measure</th>
			 <th width='' colspan='2' width='' class='dataRow'>Gender Disaggregation</th>
				 
				  <th width='' class='dataRow'>Male</th>
				  <th width='' class='dataRow'>Female</th>
				   <th width='' class='dataRow'>Other</th>
				
            		
           			</tr>";
$inc=1;

				$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output']."%' order by output_code asc")or die(http("PR-338"));
		
				while($rowoutput=@mysql_fetch_array($logicaloutput)){
				$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";
		
		
			$x=QueryManager::ViewIndicators($reportingType,$rowoutput['output_id']);
			//$obj->alert($x);

	
				$_SESSION['queryExport']=$x;
				$query=@mysql_query($x)or die(http("WRKPlan-2266"));
		  if(@mysql_num_rows($query)>0)
		  			while($row=@mysql_fetch_array($query)){
					  $baseline=$row['baseline'];
					  $base=$baseline>0?$baseline:"-";
					  $color=$inc%2==1?"evenrow3":"white1";
					  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
//checkExistance($row['Target'],NULL,'ExistsInteger')
//$obj->alert($row['Target']);
					
					$x=QueryManager::view_AnnualResultsFS($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id'],$_SESSION['zoneID'],$_SESSION['districtID']);
					#$obj->alert($x);
					$yQuery=Execute($x) or die(http("QM-628"));
					$rowFS=FetchRecords($yQuery);
					
			
			
			
		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left>
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 <INPUT type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
			<td colspan='4' width=''>".$row['indicator_id']." ".$row['indicator_name']."</td>
	
			<td align='left' colspan='1'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left colspan='2'>".$row['disaggregation']."</td>
						
									<td align=right ><strong>".checkExistance($rowFS['maleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowFS['femaleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowFS['otherAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right colspan='2' ><strong>".checkExistance($rowFS['totalAnnualActual'],0,'ExistsInteger')."</strong></td>
									<td valign='middle' align='center'><img src='icons/trash.png' title='Move to Trash' onclick=\"ConfirmDeletionCompletely('".$rowFS['id']."','id','tbl_organizationreporting','delete_AnnualResultsFS');return false;\" ></td>
        </tr>";
$inc++;
		  }
		  	}
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="<tr  class='evenrow'>
     
    <td colspan='16'><input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |<input type='button' class='formButton2'   id='button' onclick=\"multiCheckBox('');\" value='uncheck all' /> | <input type='button' class='formButton2'   id='button' TITLE='Edit'  onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'),'".pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')."','".$_SESSION['zoneID']."','".$_SESSION['districtID']."');return false;\" value='edit' /> 
	 <input type='hidden' class='formButtonRed' TITLE='Delete'  onclick=\"ConfirmDeletionCompletely(xajax.getFormValues('annualTarget1'),'id','tbl_organizationreporting');return false;\" value='Delete' /></td>
    
	
  </tr>

</table></form>";
$obj->assign($div,'innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}




function view_AnnualResultsReportLog($year,$district,$zone,$cur_page=1,$records_per_page=20){
$obj = new xajaxResponse();
if($_SESSION['username']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1; $inc=1;

$prog_id=1;

$_SESSION['fyear']=($year=='')?pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
//$obj->alert($_SESSION['Ryear']);

$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";


$data.="<table cellspacing='0' id='report' width='800' border='0'> 
<tr class='evenrow'>
        <td colspan='3' ><div align='left' class=''>YEAR</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='year' id='year' onchange=\"xajax_view_AnnualResultsReportLog(getElementById('year').value,'".$district."','".$zone."',1,20); return false;\" style='width:300px;'>";
		 $data.=QueryManager::FinancialYearFilter($_SESSION['fyear']);
		$data.="</select></strong></div></td>
        </tr>
		<tr class='evenrow'>
        <td colspan='3' ><div align='left' class=''>zone:</div></td><td colspan='10'><div align='LEFT' class=''><select name='zone' id='zone' onchange=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."',this.value,1,20); return false;\"
		 return false;\" style='width:300px;'><option value=''>-All-</option>";
		$data.=QueryManager::ZoneFilter($zone);
		$data.="</select></strong></div></td>
        </tr>
		
		<tr class='evenrow'>
        <td colspan='3' ><div align='left' class=''>District:</div></td><td colspan='10' A ><div align='LEFT' class=''><select name='district' id='district' onchange=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."',this.value,'".$zone."',1,20);  return false;\" style='width:300px;'><option value=''>-All-</option>";
		$data.=QueryManager::DistrictFilter($zone,$district);
		$data.="</select></strong></div></td>
        </tr>

		
	  <tr>
        <th colspan='13' ><div align='center' class=''>SEMI-ANNUAL perfomance REPORT</div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th>
	   <th width='' colspan=7 ><strong class=''><strong>Region</strong>/district</strong></th>
		<th  width='70'><strong class=''>Oct - Mar</strong></th>
		
		<th  width='70'><strong class=''>Apr - Sep</strong></th>
		 </tr>";
		 
		 
		 $ql="select * from tbl_zone where zoneCode like '".$zone."%' order by zoneName";
			$qryzone = @Execute($ql)or die(http("PR-00583"));
			  while($rowzone=FetchRecords($qryzone)){
		 
		 
		 $data.="<tr><td><strong></strong></td><td colspan='10'><strong>".$rowzone['zoneName']."</strong></td></tr>";
		 
			$ql="select * from tbl_district where districtCode like '".$district."%' and zone='".$rowzone['zoneCode']."' order by districtName";
			$qry = @Execute($ql)or die(http("PR-00583"));
		$max_records = @mysql_num_rows($qry);
	//or die(http("PR-0032"))
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$aa=$offset+1;
$new_query=Execute($ql." limit ".$offset.",".$records_per_page) or die(http("PR-589"));  



	  while($row=FetchRecords($new_query)){


	
 //$obj->alert($query_string);
//while($rowq=mysql_fetch_array($query_n)){
//$obj->alert($row['id']);

$div="status".$row['districtCode'];
	  $color=$n%2==1?"evenrow":"white1";
     $data.="<tr class=$color class='black'>
	 <td>".$inc++."<input name='org_code12' id='org_code12' size='20' type='hidden' value='".$row['org_code']."' />
	 <input name='narrative_id[]' id='narrative_id' type='hidden' value='".$row['org_code']."' />
	 <input name='loopkey[]' id='loopkey' type='hidden' value='1' />
	</td>
	<td colspan=7><INPUT type='hidden' name='code[]' id='code' value='".$row['districtCode']."'>".ucfirst(strtolower($row['districtName']))."</td>
		<td align='center'>";
		
		$x=QueryManager::view_AnnualResultsReportLog($_SESSION['fyear'],$row['districtCode']);
		//$obj->alert($x);
		
 		$query_n=Execute($x)or die(http("PR-2550"));
		$rowq=FetchRecords($query_n);  /**/

$div="district".$row['districtCode'];
//$obj->alert($div);

 if(($rowq['Quarter1']<>0)){

$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('".$row['zone']."','Oct - Mar','".$_SESSION['fyear']."','".$row['districtCode']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$_SESSION['fyear']."','".$row['zone']."','".$row['districtCode']."','','','Oct - Mar');return false;\">";
}

$data.="</td>
<td align='center'>";


if(($rowq['Quarter2']<>0)){
$data.="<img src='icons/tick_icon.png' width='16' height='16' onclick=\"xajax_getRecordId('".$row['zone']."','Apr - Sep','".$_SESSION['fyear']."','".$row['districtCode']."','".$div."');return false;\">";
}else{
$data.="<img src='icons/cross-shield-icon.png'  onclick=\"xajax_new_AnnualResults('".$_SESSION['fyear']."','".$row['zone']."','".$row['districtCode']."','','','Apr - Sep');return false;\">";
}

$data.="</td>
	  </tr>
	  <tr><td colspan=15><div id='$div'></div></td></tr>
	  
	  ";
	  $n++;
	  //} 
	  /**/
	  }      
	  $n++;
	  	}
	  
	  $data.="<tr><td colspan='10' align='right'>";
	  
	  $num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;



if($num_pages>1){
$links=1;
		$append_bar=$p==$num_pages?"":"|";
	
	if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."','".$zone."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
	else $data.="<a href='#' onclick=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."','".$zone."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
	
	//for($p=2;$p<$num_pages;$p++){
	$p=2;
	while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
		$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."','".$zone."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
	}
	$p++;
	}
	if($p==$num_pages){
			$data.="...<a href='#' onclick=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."','".$zone."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
}

$data.="  Records:<select name='num_rec' id='num_rec' onclick=\"xajax_view_AnnualResultsReportLog('".$_SESSION['fyear']."','".$district."','".$zone."','".$cur_page."',this.value)\">";


	$i=1;
	$selected="";
	while($i*20<=$max_records){
		$selected=$i*20==$records_per_page?"SELECTED":"";
		$data.="<option value=\"".($i*20)."\" ".$selected.">".($i*20)."</option>";
		$i++;
	}

	$sel=$records_per_page>=$max_records?"SELECTED":"";
	$data.="<option value=\"".$max_records."\" ".$sel.">All</option>";
	$data.="</select>";


	  
	  
	  
   
$data.="</td></tr></table></form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv");
return $obj;
}



/* 


//-----------------------------new_ResultsBasedannualTarget------------------------------------------------------------

} */

#************************************
$xajax->processRequest();

  ?>


<html>
<head>
<?php //$xajax->printJavascript('xajax_0.2.4/'); 

?>

<?php $xajax->printJavascript('xajax_0.5/'); 

?>

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
<script type="text/javascript" src="js/limit_text.js" language="javascript"></script>
<script type="text/javascript" src="js/add_upload.js" language="javascript"></script>
</head>

<body>
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>

    <table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#f0f0f0" bordercolor="#CCCCCC" style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#f0f0f0">
<table cellspacing='0'      width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFFFFF" bordercolor="#CCCCCC"  style="border-left:none; border:none; border-spacing:0px; border-style:hidden;" >
  <tr>
    <td bgcolor="#f0f0f0">&nbsp;</td>
    <td><?php require_once('connections/header.php'); ?></td>
    <td bgcolor="#f0f0f0">&nbsp;</td>
  </tr>
  <tr>
    <td width="12%"  bgcolor="#f0f0f0">&nbsp;</td>
    <td width="76%" align="left" valign="top"><table cellspacing='0'      width="1011" border="0" bordercolor="">
      <tr>
        <td width="20%"  align="left" valign="top"><table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><?php require_once('connections/left_links.php'); ?></td>
          </tr>
        </table></td>
        <td width="80%" align="left" valign="top" style="text-align:justify; top:0px; ">
        
        <table cellspacing='0'      width="100%" border="0">
          <tr>
            <td width="10%" valign="top" style="border-spacing:0px; top:0px;p"><div id="title">
      <?php title($_GET['linkvar'],$_GET['action']); ?>
    </div>
	  <div id="dropdownMenu">
     <script language="javascript" type="text/javascript">
	 
	 </script>
    </div>
          <div id="bodyDisplay" align="left">
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
		  case "Project Targets and Baselines": 
		  ?>
		  	xajax_ViewAnnualTargets('','','','','','','','','',1,20);
		<?php
		 break;
		 
		  ?>
		 
		 
		<?php
		
	break;
	
	
	 case "Project Life Targets": 
		  ?>
		  xajax_ViewLOPTargets('','','','','',1,20);
        
        
        
        <?php
		
	break;
	
	
	 case "Form7": 
		  ?>
		  xajax_view_form7('','',1,20);
        
        
        
        
		 
		<?php
		
	break;
	case "Progress Against Targets (HO)": 
		  ?>
		  xajax_view_AnnualResultsHO('','','','','','','','','',1,20);
		 
		<?php
		
	break;
		case "Progress Against Targets": 
		  ?>
		  
		  xajax_view_AnnualResultsReportLog('','','',1,20);
		 
		<?php
		
	break;
	
	
	
	
	
		  default:
		
		  #underConstruction("Under Construction!");
		 
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

