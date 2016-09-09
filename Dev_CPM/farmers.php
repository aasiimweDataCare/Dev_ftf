<?php
session_start();
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);



#--------------SET UP EXPORTER------
$xajax->register(XAJAX_FUNCTION,'setup_farmers');
$xajax->register(XAJAX_FUNCTION,'new_farmers');
$xajax->register(XAJAX_FUNCTION,'save_farmers');
$xajax->register(XAJAX_FUNCTION,'edit_farmers');
$xajax->register(XAJAX_FUNCTION,'update_farmers');
$xajax->register(XAJAX_FUNCTION,'delete_farmers');

#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');



 
 
 
 
function setup_farmers($regionalCode,$districtCode,$subCounty,$village){
    
    
$object=new xajaxResponse();
$inc=1;
$data.="<form  name='farmer' id='farmer' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0' cellspacing='2' cellpadding='2'>";
$data.="<tr class='evenrow'>";
        $data.="<td colspan='' align='right'>
                  <input name='new_farmers' type='button' class='formButton2'value='New Farmer' onclick=\"xajax_new_farmers('','','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export Farmers&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_farmers' type='button' class='formButton2'value='Export to Excel'></a> |";
                  
                  $data.="<a href='print_version.php?linkvar=Print Farmers&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_farmers' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
        $data.="<tr class='evenrow3'>
            <td colspan='22'>";
            $data.="<table border='0' width='100%' cellspacing='2' cellpadding='2'>
                <tr class='evenrow'>
                  <th colspan='22'><div align='center'>FARMER DETAILS</div></th>
                  </tr>";
                  //===================data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_farmers(xajax.getFormValues('farmer'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('farmer'),'Delete_farmers');return false;\" align='left'></td>
                        </td>
                    </tr>";
                  
                  $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th colspan='2'>Name</th>
                  <th>Village Agent</th>
                  <th>Date of recruitment</th>
                  <th>Region</th>
                  <th>District</th>
                  <th>Subcounty</th>
                  <th colspan='2'>Village</th>
                  <th>Action</th>
                  </tr>";
                  $stmnt_farmers="SELECT f . * , z.`zoneName` , d.`districtName` , s.`subcountyName`, v.`vAgentName`
                                    FROM `tbl_farmers` f, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s, `tbl_villageagents` v
                                    WHERE f.`farmersRegion` = z.`zoneCode`
                                    AND f.`tbl_villageAgentId`=v.`tbl_villageAgentId`
                                    AND d.`districtCode` = s.`districtCode`
                                    AND f.`farmersDistrict` = d.`districtCode`
                                    AND f.`farmersSubcounty` = s.`subcountyCode`
                                    ORDER BY f.`tbl_farmersId` DESC";
                                   $Qfarmers= @mysql_query($stmnt_farmers);
                           $count=1; 
                            while($rowFarmer=mysql_fetch_array($Qfarmers)){
                                $color=$inc%2==1?"evenrow3":"evenrow";
                 $data.="
                            <tr class='".$color."'>
                            <td>".$count.".<input type='checkbox'  name='tbl_farmersId[]' id='tbl_farmersId".$count."' value='".$rowFarmer['tbl_farmersId']."' />
                            <input name='loopkey[]' id='loopkey".$count."' type='hidden' value='1'/></td>
                            <td colspan='2'>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['farmersName'])."</td>
                            <td>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['vAgentName'])."</td>
                            <td align='right'>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['farmersDateRecruited'])."</td>
                            <td>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['zoneName'])."</td>
                            <td>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['districtName'])."</td>
                            <td>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['subcountyName'])."</td>
                            <td colspan='2'>".retrieve_info_withSpecialCharactersNowordLimit($rowFarmer['farmersVillage'])."</td>
                            <td><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_farmer(xajax.getFormValues('farmer'));return false;\" value='edit' /></td>
                            </tr>
                 ";
                 $count++;
                 $inc++;
                                     }
                            //===================End of data to be displayed=====================

                    $data.="<tr>
                        <td class='offwhite' COLSPAN='11' ALIGN='LEFT'>
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
                            <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
                            <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_farmers(xajax.getFormValues('farmer'));return false;\" value='edit' /> |
                            <input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('farmer'),'Delete_farmers');return false;\" align='left'></td>
                        </td>
                    </tr>";         
                                     
                
              $data.="</table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}

function  new_farmers($farmersName,
                      $vAgent,
                       $regionalCode,
                       $districtCode,
                       $subCounty,
                       $village,
                       $farmersDob,
                       $farmersDateRecruited){

$object=new xajaxResponse();

$QueryManager=new QueryManager('');
    
//sessional values to be ratained
$_SESSION['farmersName']=$farmersName;
$_SESSION['village']=$village;
$_SESSION['vAgent']=$vAgent;
//$object->alert($vAgent);



$data="<form  name='farmers' id='farmers' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>NEW FARMER DETAILS</th>
                  </tr>
                
                <tr>
                  <td>Farmer Name:<br /></td>
                  <td>
                    <input type='text' name='farmersName' id='farmersName' value='".$_SESSION['farmersName']."' onchange=\"xajax_new_farmers(this.value,
                       '".$vAgent."',
                       '".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."',
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\"/></td>
                </tr>";
                
                
                $data.="<tr>
                  <td>Village Agent:<br /></td>
                  <td><select name='vAgent' id='vAgent' style='width:100px;' onchange=\"xajax_new_farmers('".$farmersName."',
                       this.value,
                       '".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."',
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\" >
                      <option value=''>-select-</option>";
                 $stmnt="SELECT x . * , d.`districtName`, s.`subcountyName`,z.`zoneName`
                        FROM `tbl_villageagents` x, `tbl_district` d, `tbl_subcounty` s, `tbl_zone` z
                        WHERE d.`districtCode` = s.`districtCode`
                        AND z.`zoneCode`=x.`vAgentRegion`
                        AND x.`vAgentDistrict` = d.`districtCode`
                        AND x.`vAgentSubcounty` = s.`subcountyCode`
                        ORDER BY x.`tbl_villageAgentId` ASC";
                              $Q= @mysql_query($stmnt);
                                                  while($row=mysql_fetch_array($Q)){
                                                  
                                                  
                $selected=($_SESSION['vAgent']==$row['tbl_villageAgentId'])?"selected":"";
              $data.="<option value=\"".$row['tbl_villageAgentId']."\" ".$selected.">".$row['vAgentName']."</option>";
                                                  }
                $data.="</select>      </td> 
                   </tr>";                                                                          
                
                
                
                $data.="<tr>
                  <td>Region:<br /></td>
                  <td><select name='farmersRegion' id='farmersRegion' style='width:100px;' onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       this.value,
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."',
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->regionalFilter($regionalCode); 
                    $data.="</select>      </td> 
                   </tr>
                   
                     <tr>
                  <td>District<br /></td>
                  <td><select name='farmersDistrict' id='farmersDistrict' style='width:100px;' onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       '".$regionalCode."',
                       this.value,
                       '".$subCounty."',
                       '".$village."',
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->DistrictFilter($regionalCode,$districtCode);
                    $data.="</select></td>
                </tr>
                <tr>
                  <td>Subcounty<br /></td>
                  <td><select name='farmersSubcounty' id='farmersSubcounty' style='width:100px;' onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       '".$regionalCode."',
                       '".$districtCode."',
                       this.value,
                       '".$village."',
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\">
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->SubcountyFilter($regionalCode,$districtCode,$subCounty);
                    $data.="</select></td>
                </tr>
                <tr>
                  <td>Village<br /></td>
                  <td><input type='text' name='farmersVillage' id='farmersVillage' value='".$_SESSION['village']."' onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       '".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       this.value,
                       '".$farmersDob."',
                       '".$farmersDateRecruited."');return false;\" /></td>
                </tr>
                <tr>
                  <td>Date of birth/Business Commencement:<br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.farmers.farmersDob);return false;\" hidefocus=''>
                    <input name='farmersDob' id='farmersDob' size='15' onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       '".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."',
                       this.value,
                       '".$farmersDateRecruited."');return false;\" readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Date of Recruitment:<br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.farmers.farmersDateRecruited);return false;\" hidefocus=''>
                    <input name='farmersDateRecruited' id='farmersDateRecruited' size='15'  onchange=\"xajax_new_farmers('".$farmersName."',
                       '".$vAgent."',
                       '".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."',
                       '".$farmersDob."',
                       this.value);return false;\" readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Farmer Code:<br /></td>
                  <td><input type='text' name='farmersCode' id='farmersCode' /></td>
                </tr>
                <tr>
                  <td>Telephone:<br /></td>
                  <td><input type='text' name='farmersTel' id='farmersTel' /></td>
                </tr>
                <tr>
                  <td>Gender <i>(Consider majority if a Business)</i>:<br /></td>
                  <td><select name='farmersSex' id='farmersSex' style='width:100px;'>
                    <option value=''>-select-</option>";
                    $gender=array('Male','Female');
                                        $i = 0; 
                                        foreach ($gender as $v) {
                                            $selected=($farmersSex==$v)?"selected":"";
                                            $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
                <tr>
                  <td rowspan='3'>Crops<br /></td>
                  <td colspan='2'><input type='checkbox' name='Beans' value='Yes' id='Beans' />
                    Beans</td>
                    </tr>
                <tr>
                  <td colspan='2'><input type='checkbox' name='Coffee' value='Yes' id='Coffee' />
                    Coffee</td>
                </tr>
                <tr>
                  <td colspan='2'><input type='checkbox' name='Maize' value='Yes' id='Maize' />
                    Maize</td>
                </tr>
                
              
                <tr>
                  <td>&nbsp;</td>
                  <td><input value='Save' name='saveVillageAgent' onclick=\"xajax_save_farmers(xajax.getFormValues('farmers'));\" type='button'></td>
                </tr>
              </table>";
    $data.="</td>
        </tr>
  
</table>
</form>";

$object->assign('bodyDisplay','innerHTML',$data);
return $object;
}

//Save Village Agent
function save_farmers($formvalues){
$object=new xajaxResponse();
//$object->addAlert('Hello World');

$farmersName=$formvalues['farmersName'];
$vAgent=$formvalues['vAgent'];
$farmersCode=$formvalues['farmersCode'];
$farmersDob=$formvalues['farmersDob'];
$farmersTel=$formvalues['farmersTel'];
$farmersSex=$formvalues['farmersSex'];
$farmersDateRecruited=$formvalues['farmersDateRecruited'];
$farmersRegion=$formvalues['farmersRegion'];
$farmersDistrict=$formvalues['farmersDistrict'];
$farmersSubcounty=$formvalues['farmersSubcounty'];
$farmersVillage=$formvalues['farmersVillage'];
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


$stmnt_fa="INSERT INTO `tbl_farmers`(`tbl_villageAgentId`,`farmersName`,`farmersDob`,
                                    `farmersCode`, `farmersTel`, `farmersSex`,
                                    `farmersDateRecruited`, `farmersRegion`, `farmersDistrict`,
                                    `farmersSubcounty`, `farmersVillage`, `farmersCropBeans`,
                                    `farmersCropCoffee`, `farmersCropMaize`)
                                            VALUES
                                            ('".$vAgent."','".$farmersName."','".$farmersDob."','".$farmersCode."',
                                            '".$farmersTel."','".$farmersSex."',
                                            '".$farmersDateRecruited."','".$farmersRegion."',
                                            '".$farmersDistrict."','".$farmersSubcounty."',
                                            '".$farmersVillage."','".$beans."',
                                            '".$coffee."','".$maize."')";
 //$object->alert($stmnt_fa);                                           
@mysql_query($stmnt_fa)or die("Trader setup Error-code 344 because ".mysql_error());
 $object->assign('bodyDisplay','innerHTML',congMsg("Farmer profile has been added successfully!"));
 $object->call('xajax_setup_farmers','','','');
return $object;
}






 





$xajax->processRequest();

  ?>


<html>
<head>
<?php $xajax->printJavascript('xajax_0.5/'); 

?>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<title>USAID/FtF CPM:Farmers</title>
 <script language="javascript" type="text/javascript" src="js/check.js"> </script>
 <script language="javascript" type="text/javascript" src="js/js.js"> </script>
<style type="text/css">
<!--
.style1 {color: #046c10}
-->
</style>
</head>

<body>

<table width="870" border="0" align="center" id="content_" >
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/header.php'); ?>
      </td>
        </tr>
  <tr>
    <td width="190" valign="top"><table width="190" border="0" >
      <tr>
        <td valign="top" align="left"><?php require_once('connections/left_links.php'); ?></td>
      </tr>
    </table></td>
    <td width="660" valign="top"  >
    
     <?php title($_GET['linkvar'],$_GET['action']);   ?>
    <div id="bodyDisplay">
      <script language="javascript" type="text/javascript" > 
			
		
		   xajax_setup_farmers('','','','');
			
			</script>
    </div></td>
  </tr>
  <tr>
    <td colspan="2" valign="top"><?php require_once('connections/footer.php'); ?></td>
    </tr>
</table>


</div>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm" style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0" height="178" scrolling="no" width="199"></iframe>
</body>
</html>
