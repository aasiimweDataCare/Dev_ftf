<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax('');
$xajax->setFlag('debug',false);
global $sem_annual;

//================================FORM2=================
$xajax->register(XAJAX_FUNCTION,'view_form6');
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


$xajax->register(XAJAX_FUNCTION,'view_form6_web_form');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_one');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_two');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_three');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_four');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_five');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_six');
$xajax->register(XAJAX_FUNCTION,'view_form6_survey_seven');
$xajax->register(XAJAX_FUNCTION,'view_frm6Survey2016');



#************************************************
#************************************************

function view_form6(){
$obj = new xajaxResponse();

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$data="<form action=\"".$PHP_SELF."\" name='form2' id='form2' method='post'>
<table  width='920px' height='400px'  border='0' cellspacing='1' cellpadding='1'>

<tr>
<th><center><font size=''>&nbsp;&nbsp;Commodity Production and Marketing Activity Form2: Subforms</font> </center>
   </th>
</tr>

<tr>
	<td>
		<div  class='fond'>
		<div  style='cursor:pointer; font-size:18px; font-weight:bold;'>
			<a onclick=\"loadingIconFormSix('go_to_form6_web_form');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#8CD6DE; '>
					<span style='color: #011F63; font-size: 250%;'>Data:First Web-Form</span>
				</div>
			</a>		
			<a onclick=\"loadingIconFormSix('go_to_form6_survey_one');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#97bf0d; '>
					<span style='color: #011F63; font-size: 250%;'>Survey: Oct 2014 - Mar 2015</span><br/>
					<span style='color: #011F63;'>Survey carried out by Grameen Foundation</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormSix('go_to_form6_survey_two');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#f8b334; vertical-align: middle;'>
					<span style='color: #011F63; font-size: 250%;'>Survey: Apr 2015 - Sep 2015</span><br/>
					<span style='color: #011F63;'>Survey carried out by Grameen Foundation</span>
				</div>
			</a>
		</div>


		<div style='cursor:pointer; font-size:12px; font-weight:bold;'>
			<a onclick=\"loadingIconFormSix('go_to_form6_survey_three');return false;\">		
				<div align='center' class='style_prevu_kit' style='background-color:#f8b334;'>
					<span style='color: #011F63; font-size: 250%;'>Survey: Oct 2015 - Mar 2016</span><br/>
					<span style='color: #011F63;'>Survey carried out by Shoreline Services</span>
				</div>
			</a>
			<a onclick=\"loadingIconFormSix('go_to_frm6Survey2016');return false;\">
				<div align='center' class='style_prevu_kit' style='background-color:#8CD6DE;'>
					<span style='color: #011F63; font-size: 250%;'>Survey: Apr 2016 - Sep 2016</span><br/>
					<span style='color: #011F63;'> Survey carried out by Shoreline Services</span>
				</div>
			</a>
			
		</div>


		
	</td>
</tr>";


$data.="<tr class='green'>
<td><i>Please, click on the form that you wish to access</i></td>
</tr>"; 

$data.="</table>";
	
	

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;
}
function new_form6($regionalCode,$districtCode,$subCounty,$Parish){
$obj=new xajaxResponse();
$QueryManager=new QueryManager('');


if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}
$n=1;
//$obj->alert('form 4 action');


$data="<form action=\"".$PHP_SELF."\" name='partnerships' id='partnerships' method='post'>";
$data.="<table width='100%' cellspacing='0' id='report'>";


$data.="<tr class='evenrow'>
            <th colspan='22'><strong><center>HOUSEHOLD DATA COLLECTION FORM</center></strong></th>
            </tr>";
            
            $data.="<tr class='evenrow'>
            <th colspan='22'><strong>1.HOUSEHOLD IDENTITY</strong></th>
            </tr>";
            
            
            $data.="<tr class='evenrow3'>
                <td colspan='22'>";
                $data.="<table cellpadding='0' cellspacing='2' border='0' width='100%'>
                        <tr class='evenrow'>
                            <td colspan='3' rowspan='2'><strong>Name of Household head:</strong><input type='text' name='hsHead' id='hsHead' /></td>
                            
                            <td colspan='2'><strong>Code:</strong><input type='text' name='hsCode' id='hsCode' /></td>
                            
                            <th colspan='2'><p align='center'><strong>Location</strong></p></th>
                        </tr>";
                        
                        $data.="<tr class='evenrow'>
                          <td colspan='2' rowspan='2'><strong>Sex</strong><select name='hsSex' id='hsSex' size='1' style='width:150px;'>
                              <option value=''>-select-</option>
                              <option value='M'>Male</option>
                              <option value='F'>Female</option>
                                </select>
                            </td>";
                          
                          $data.="<td>Region</td>
                          <td>
                          <select name='hsRegion' id='hsRegion' onchange=\"xajax_new_form6(this.value,'".$districtCode."','".$subCounty."','".$Parish."');return false;\" style='width:300px;'>
                                  <option value=''>-select-</option>";
                                  $data.=$QueryManager->regionalFilter($regionalCode);
                            $data.="</select>
                          </td>";
                        $data.="</tr>";
                        
                        $data.="<tr class='evenrow'>
                          <td colspan='3'><strong>Status of household:</strong>
                          <select name='hsStatus' id='hsStatus' size='1' style='width:200px;'>
                              <option value=''>-select-</option>
                              <option value='Old'>Old</option>
                              <option value='New'>New</option>
                          </select></td>
                          
                          <td>District:</td>
                          <td>";$data.="
                          <select name='hsDistrict' id='hsDistrict' onchange=\"xajax_new_form6('".$regionalCode."',this.value,'".$subCounty."','".$Parish."');return false;\" style='width:300px;'>
                          <option value=''>-select-</option>";
                          $data.=$QueryManager->DistrictFilter($regionalCode,$districtCode);
                          $data.="</select>";
                          $data.="</td>";
                          
                        $data.="</tr>";
                        
                        $data.="<tr class='evenrow'>
                          <td width='25%' rowspan='3'><strong>Household Composition:</strong></td>
                          <td colspan='4'>&nbsp;</td>
                          
                          <td>Sub County:</td>
                          <td><select name='hsSubcounty' id='hsSubcounty' onchange=\"xajax_new_form6('".$regionalCode."','".$districtCode."',this.value,'".$Parish."');return false;\" style='width:300px;'>
                          <option value=''>-select-</option>";
                            $data.=$QueryManager->SubcountyFilter($regionalCode,$districtCode,$subCounty);
                            $data.="</select>
                          </td>";
                          
                        $data.="</tr>";
                        
                        $data.="<tr class='evenrow'><td colspan='4'><select name='hsComposition' id='hsComposition' size='1' style='width:200px;'>
                          <option value=''>-select-</option>
                          <option value='Household has Only Females No Males'>Household has Only Females No Males</option>
                          <option value='Household has Only Males no Females'>Household has Only Males no Females</option>
                          <option value='Household has both Males and Females'>Household has both Males and Females</option>
                        </select></td>";
                        
                        $data.="<td>Parish</td>
                          <td><select name='hsParish' id='hsParish' onchange=\"xajax_new_form6('".$regionalCode."','".$districtCode."','".$subCounty."',this.value);return false;\" style='width:300px;'>
                          <option value=''>-select-</option>";
                           $data.=$QueryManager->ParishFilter($regionalCode,$districtCode,$subCounty,$Parish);
                            $data.="</select>";
                          $data.="</td>";
                        $data.="</tr>";
                        
                        $data.="<tr class='evenrow'><td colspan='4'></td>
                          <td>Village</td>
                          <td><input name='hsVillage' id='hsVillage' type='text' style='width:300px;'></td>
                        </tr>
                        
                        <tr class='evenrow'>
                          <td colspan='5'><strong>Reporting Period:</strong> ".$_SESSION['quarter']."</td>
                          <td>Name of VA:</td>
                          <td><select name='hsVillageAgent' id='hsVillageAgent' size='1' style='width:300px;'>
                              <option value=''>-select-</option>";
                              
                              
                              $stmnt_vADetails="SELECT v. * , z.`zoneName` , d.`districtName` , s.`subcountyName`
                                                FROM `tbl_villageagents` v, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s
                                                WHERE v.`vAgentRegion` = z.`zoneCode`
                                                AND d.`districtCode` = s.`districtCode`
                                                AND v.`vAgentDistrict` = d.`districtCode`
                                                AND v.`vAgentSubcounty` = s.`subcountyCode`
                                                AND v.`display` = 'Yes'
                                                AND v.`vAgentRegion`='".$regionalCode."'";
                                                
                                                $stmnt_vADetails.=" AND v.`vAgentDistrict` = '".$districtCode."'";
                                                //$stmnt_vADetails.=" AND v.`vAgentSubcounty` = '".$subCounty."'";
                                                $stmnt_vADetails.=" ORDER BY v.`tbl_villageAgentId` DESC";
                              $QvAgent= @mysql_query($stmnt_vADetails);
                                   //$obj->alert($stmnt_vADetails);
                           $count=1; 
                            while($rowVagent=mysql_fetch_array($QvAgent)){
                                
                                $vAgentName=$rowVagent['tbl_villageAgentId'];                     
        $selected=($vAgentName==$rowVagent['tbl_villageAgentId'])?"selected":"";
        
        $data.="<option value=\"".$rowVagent['tbl_villageAgentId']."\" ".$selected.">".$rowVagent['vAgentName']."</option>";
                            }
                            
                            
                            
                            
                              $data.="</select></td>";
                              
                        $data.="</tr>
                        <tr class='evenrow'>
                          <td colspan='5' valign='bottom'>
                            <strong>Total number of members</strong>:<input value=0 name='hsTotMembers' id='hsTotMembers' onkeypress='return numbersonly(event, false)'  type='text'>
                            <strong>Out of which: Females:</strong>
                            <input value=0 name='hsTotMembersFemale' id='hsTotMembersFemale' onKeyUp=\"xajax_calc_totalHousehold(getElementById('hsTotMembersFemale').value,
                                                                                                                            getElementById('hsTotMembersMale').value,
                                                                                                                            'hsTotMembers');return false;\"
                            onkeypress='return numbersonly(event, false)'  type='text'>
                            <strong>Males:</strong>
                            <input value=0 name='hsTotMembersMale' id='hsTotMembersMale' onKeyUp=\"xajax_calc_totalHousehold(getElementById('hsTotMembersFemale').value,
                                                                                                                            getElementById('hsTotMembersMale').value,
                                                                                                                            'hsTotMembers');return false;\"
                            onkeypress='return numbersonly(event, false)' type='text'>
                            <strong>and Youth:</strong>
                            <input value=0 name='hsTotMembersYouth' id='hsTotMembersYouth' onkeypress='return numbersonly(event, false)' type='text'></td>
                            <td colspan='2'>
                            <strong>Age of the Household head (in complete years):</strong>
                            <input value=0 name='hsHouseholdAge' id='hsHouseholdAge' onkeypress='return numbersonly(event, false)' type='text'>
                        </td>
                        </tr>
                        </table>";
            $data.="</td>
        </tr>";



$data.="<tr class='evenrow'><th colspan='22'><strong>2. HOUSEHOLD PRODUCTION DATA</strong></th></tr>";

$data.="<tr class='evenrow3'>
        <td colspan='22'>
                      <table border='0' cellspacing='2' cellpadding='0' align='left' width='100%'>
                        <tr class='evenrow'>
                          <th rowspan='2'><strong>#</strong></th>
                          <th rowspan='2'><strong>Name of member</strong></th>
                          <th rowspan='2'><p align='center'><strong>Sex</strong></th>
                          <th rowspan='2'><p align='center'><strong>Age</strong><strong> </strong></th>
                          <th colspan='5'><p align='center'><strong>Maize</strong></th>
                          <th colspan='5'><p align='center'><strong>Beans</strong><strong> </strong></th>
                          <th colspan='5'><p align='center'><strong>Coffee</strong></th>
                          <th rowspan='2'><p align='center'>Total Loan Accessed</th>
                        </tr>
                        <tr class='evenrow'>
                          <th><p align='center'>Area(acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold<br>(Kg)</th>
                          <th><p align='center'>Volume lost in PH<br>(Kg)</th>
                          <th><p align='center'>Area (acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold<br>(Kg)</th>
                          <th><p align='center'>Volume lost in PH (Kg)</th>
                          <th><p align='center'>Area (acres)</th>
                          <th><p align='center'>Value of Inputs (UGX)</th>
                          <th><p align='center'>Total Yield (Kg)</th>
                          <th><p align='center'>Volume Sold</th>
                          <th><p align='center'>Volume lost in<br>PH<br>(Kg)</th>
                        </tr>";
                    
                        $num=5;
                        for($v=1; $v<=$num; $v++){
                        $data.="<tr class='evenrow'>
                          <td>".$v."</td>";
                          $data.="<input type='hidden' name='loopkey[]' id='loopkey' value='1'/>";
                          $data.="<td valign='top'><input type='text' name='hsNameMember[]' id='hsNameMember".$v."'/></td>
                          <td valign='top'><select name='hsSexMember[]' id ='hsSexMember".$v."' size='1' style='width:75px;'>
                              <option value=''>-select-</option>";
                              $data.="<option value='M'>Male</option>";
                              $data.="<option value='F'>Female</option>";
                              $data.="</select></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAgeMember[]' id='hsAgeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaMaizeMember[]' id='hsAreaMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsMaizeMember[]' id='hsValueInputsMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldMaizeMember[]' id='hsTotalYieldMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldMaizeMember[]' id='hsVolumeSoldMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostMaizeMember[]' id='hsVolumeLostMaizeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaBeansMember[]' id='hsAreaBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsBeansMember[]' id='hsValueInputsBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldBeansMember[]' id='hsTotalYieldBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldBeansMember[]' id='hsVolumeSoldBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostBeansMember[]' id='hsVolumeLostBeansMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsAreaCoffeeMember[]' id='hsAreaCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsValueInputsCoffeeMember[]' id='hsValueInputsCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotalYieldCoffeeMember[]' id='hsTotalYieldCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeSoldCoffeeMember[]' id='hsVolumeSoldCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsVolumeLostCoffeeMember[]' id='hsVolumeLostCoffeeMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                          
                          <td valign='top'><input style='width:75px;' type='text' value=0 name='hsTotLoanAccessedMember[]' id='hsTotLoanAccessedMember".$v."' onKeyPress=\"return numbersonly(event, false)\" /></td>
                        </tr>";
                        
                        }//-------------------End of loop for number of records to be displayed at data entry--------------------
                        
                $data.="</table>";
        $data.="</td>";
    $data.="</tr>";
    
    
    

//========table1 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='1' cellpadding='1'>";

$data.="

<table border='0' cellspacing='1' cellpadding='1' width='100%'>
  <tr class='evenrow'>
    <th colspan='6' rowspan='2' valign='top'><em><br clear='all' />
      </em>
        <strong>Household Summary Data on Production, Adoption,    Savings, Credit
           
          Access and&nbsp; Inputs </strong></th>
    <th  colspan='6' valign='top'><p align='center'><strong>Maize</strong></th>
    <th  colspan='8' valign='top'><p align='center'><strong>Beans </strong></th>
    <th  colspan='6' valign='top'><p align='center'><strong>Coffee</strong></th>
  </tr>
  <tr class='evenrow'>
    <th  colspan='2'><strong>Total</strong></th>
    <th ><strong>Male</strong></th>
    <th ><strong>Female</strong></th>
    <th  colspan='2'><p align='center'><strong>Youth</strong></th>
    <th  colspan='2'><p align='center'><strong>Total</strong></th>
    <th  colspan='2'><p align='center'><strong>Male</strong></th>
    <th  colspan='2'><p align='center'><strong>Female</strong></th>
    <th  colspan='2'>Youth</th>
    <th >Total</th>
    <th  colspan='3'>Male</th>
    <th >Female</th>
    <th >Youth</th>
  </tr>";
  $data.="<tr class='evenrow'>
    <th  colspan='6'>Average farm gate price    (UGX per kg)</th>
    <td  colspan='6' valign='top'>
    <input type='hidden' name='loopkeyRand' id='loopkeyRand' value=1 />
      <input type='text' value=0 name='maizeTotalFGPrice' id='maizeTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
        <input type='text' value=0 name='beansTotalFGPrice' id='beansTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    &nbsp;</td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='coffeeTotalFGPrice' id='coffeeTotalFGPrice' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Number of members adopting    use of improved seed / Planting materials (S)</th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeT' id='improvedSeedMaterialsMaizeT'  onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeM' id='improvedSeedMaterialsMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsMaizeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsMaizeF').value,
                                                                                                                            'improvedSeedMaterialsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeF' id='improvedSeedMaterialsMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsMaizeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsMaizeF').value,
                                                                                                                            'improvedSeedMaterialsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsMaizeY' id='improvedSeedMaterialsMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansT' id='improvedSeedMaterialsBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansM' id='improvedSeedMaterialsBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsBeansM').value,
                                                                                                                            getElementById('improvedSeedMaterialsBeansF').value,
                                                                                                                            'improvedSeedMaterialsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansF' id='improvedSeedMaterialsBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsBeansM').value,
                                                                                                                            getElementById('improvedSeedMaterialsBeansF').value,
                                                                                                                            'improvedSeedMaterialsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsBeansY' id='improvedSeedMaterialsBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeT' id='improvedSeedMaterialsCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeM' id='improvedSeedMaterialsCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsCoffeeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsCoffeeF').value,
                                                                                                                            'improvedSeedMaterialsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeF' id='improvedSeedMaterialsCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('improvedSeedMaterialsCoffeeM').value,
                                                                                                                            getElementById('improvedSeedMaterialsCoffeeF').value,
                                                                                                                            'improvedSeedMaterialsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='improvedSeedMaterialsCoffeeY' id='improvedSeedMaterialsCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under improved    seed/ Planting materials: (S).</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedMaize' id='acreageImprovedSeedMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedBeans' id='acreageImprovedSeedBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageImprovedSeedCoffee' id='acreageImprovedSeedCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  
  
  <tr class='evenrow'>
    <th  colspan='6'>&nbsp; Number of    members adopting use of Fertilizers (F) </th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeT' id='useFertilizersMaizeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeM' id='useFertilizersMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersMaizeM').value,
                                                                                                                            getElementById('useFertilizersMaizeF').value,
                                                                                                                            'useFertilizersMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeF' id='useFertilizersMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersMaizeM').value,
                                                                                                                            getElementById('useFertilizersMaizeF').value,
                                                                                                                            'useFertilizersMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersMaizeY' id='useFertilizersMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansT' id='useFertilizersBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;'/>
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansM' id='useFertilizersBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersBeansM').value,
                                                                                                                            getElementById('useFertilizersBeansF').value,
                                                                                                                            'useFertilizersBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansF' id='useFertilizersBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersBeansM').value,
                                                                                                                            getElementById('useFertilizersBeansF').value,
                                                                                                                            'useFertilizersBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useFertilizersBeansY' id='useFertilizersBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeT' id='useFertilizersCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeM' id='useFertilizersCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersCoffeeM').value,
                                                                                                                            getElementById('useFertilizersCoffeeF').value,
                                                                                                                            'useFertilizersCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeF' id='useFertilizersCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useFertilizersCoffeeM').value,
                                                                                                                            getElementById('useFertilizersCoffeeF').value,
                                                                                                                            'useFertilizersCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useFertilizersCoffeeY' id='useFertilizersCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under Fertilizers    (F)</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageFertilizersMaize' id='acreageFertilizersMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageFertilizersBeans' id='acreageFertilizersBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageFertilizersCoffee' id='acreageFertilizersCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Number of    members adopting use of Chemicals (herbicides/ pesticides)(C)</th>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeT' id='useChemicalsMaizeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeM' id='useChemicalsMaizeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsMaizeM').value,
                                                                                                                            getElementById('useChemicalsMaizeF').value,
                                                                                                                            'useChemicalsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeF' id='useChemicalsMaizeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsMaizeM').value,
                                                                                                                            getElementById('useChemicalsMaizeF').value,
                                                                                                                            'useChemicalsMaizeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsMaizeY' id='useChemicalsMaizeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansT' id='useChemicalsBeansT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansM' id='useChemicalsBeansM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsBeansM').value,
                                                                                                                            getElementById('useChemicalsBeansF').value,
                                                                                                                            'useChemicalsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansF' id='useChemicalsBeansF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsBeansM').value,
                                                                                                                            getElementById('useChemicalsBeansF').value,
                                                                                                                            'useChemicalsBeansT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='2' valign='top'>
      <input type='text' value=0 name='useChemicalsBeansY' id='useChemicalsBeansY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeT' id='useChemicalsCoffeeT' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='3' valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeM' id='useChemicalsCoffeeM' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsCoffeeM').value,
                                                                                                                            getElementById('useChemicalsCoffeeF').value,
                                                                                                                            'useChemicalsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeF' id='useChemicalsCoffeeF' onKeyUp=\"xajax_calc_totalHousehold(getElementById('useChemicalsCoffeeM').value,
                                                                                                                            getElementById('useChemicalsCoffeeF').value,
                                                                                                                            'useChemicalsCoffeeT');return false;\"
      onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  valign='top'>
      <input type='text' value=0 name='useChemicalsCoffeeY' id='useChemicalsCoffeeY' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='6'>Acreage under Chemicals    (herbicides or pesticides) (C)</th>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageChemicalsMaize' id='acreageChemicalsMaize' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='8' valign='top'>
      <input type='text' value=0 name='acreageChemicalsBeans' id='acreageChemicalsBeans' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='6' valign='top'>
      <input type='text' value=0 name='acreageChemicalsCoffee' id='acreageChemicalsCoffee' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th  colspan='7'>Number of members purchasing Inputs through each source    (No.) </th>
    <td  colspan='8'>Stockist through VARM:
      <input type='text' value=0 name='purchasingInputThruVARM' id='purchasingInputThruVARM' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='4'>Village Agents:
      <input type='text' value=0 name='purchasingInputThruVillageAgent' id='purchasingInputThruVillageAgent'onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='3'>Stockist:
      <input type='text' value=0 name='purchasingInputThruStockist' id='purchasingInputThruStockist' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
    <td  colspan='4'>Others:
      <input type='text' value=0 name='purchasingInputThruOthers' id='purchasingInputThruOthers' onkeypress=\"return numbersonly(event, false)\" style='width:50px;' />
    </td>
  </tr>
  <tr class='evenrow'>
    <th >Benefits from procured inputs (No)</th>
    <td  colspan='2'>
<input name='Good Yields' type='checkbox' id='Good Yields' value='Good Yields' />      
Good Yields:</td>
    <td  colspan='4'>
      <input name='Reduced Costs' type='checkbox' id='Reduced Costs' value='Reduced Costs' />
    Reduced costs:</td>
    <td  colspan='4'>
      <input name='Labour Saving' type='checkbox' id='Labour Saving' value='Labour Saving' />
    Labor-saving:</td>
    <td  colspan='2'>&nbsp;
        <input name='None' type='checkbox' id='None' value='None' />
    None:</td>
    <td  colspan='5'>
    <input name='Better Quality' type='checkbox' id='Better Quality' value='Better Quality' />
    Better quality:</td>
    <td  colspan='5'>&nbsp;
      <input name='Disease Resistance' type='checkbox' id='Disease Resistance' value='Disease Resistance' />
    Disease Resistance:</td>
    <td  colspan='3'>&nbsp;
      <input name='Early maturity' type='checkbox' id='Early maturity' value='Early maturity' /> 
    Early maturity:</td>
  </tr>";
  $data.="<tr class='evenrow'>
    <th  colspan='2' rowspan='6'>Risk reducing practices adopted to mitigate climate change</th>
    <th >#</th>
    <th >Member </th>
    <th >Sex</th>
    <th >Age</th>
    <th  colspan='20' valign='top'><p align='center'>Name risk reducing    practices adopted by each household member: </th>
  </tr>";
  for($i=1; $i<=5; $i++){
  $data.="<tr class='evenrow'>
    <td >".$i."</td>";
    $data.="<input type='hidden' name='loopkey3[]' id='loopkey3' value='1'/>";
    $data.="<td ><input type='text' name='riskReducingPracticesMember[]' id='riskReducingPracticesMember".$i."'  style='width:100px;' /></td>
    <td >
      <select name='riskReducingMitigateClimateChangeSex[]' id='riskReducingMitigateClimateChangeSex".$i."' style='width:75px;'>
        <option>-select-</option>
        <option value='M'>Male</option>
        <option value='F'>Female</option>
      </select>
    </td>
    <td >
      <input type='text' value=0 name='ageMemberRiskReducingPractice[]' id='ageMemberRiskReducingPractice".$i."' onkeypress=\"return numbersonly(event, false)\" style='width:30px;' />
    </td>
    <td  colspan='11'>
      <textarea name='riskReducingPractice1[]' id='ariskReducingPractice1".$i."'  rows='5' cols='50' /></textarea>
    </td>
    <td  colspan='9'><textarea name='riskReducingPractice2[]' id='riskReducingPractice2".$i."'  rows='5' cols='50' /></textarea>
    </td>
  </tr>";
  }
  $data.="</table>

";
$data.="</td>";
$data.="</tr>";
//========table1 end============         

  
  
//========table2 start==========
$data.="<tr class='evenrow3'>";
$data.="<td colspan='22'>";
$data.="<table  width='100%' border='0' cellspacing='1' cellpadding='1'>";
$data.="<tr class='evenrow'>
    <td colspan='12'>Compiled by:</td><td><input type='text' name='CompiledBy' id='CompiledBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Reviewed by:</td><td><input type='text' name='ReviewedBy' id='ReviewedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Submitted by:</td><td><input type='text' name='SubmittedBy' id='SubmittedBy' style='width:200px;'></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='12'>Date of submission:</td>
        <td>
        <a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.partnerships.DateSubmission);return false;\" hidefocus=''>
            <input name='DateSubmission' type='text' style='width:200px;'  size='50' value='' id='DateSubmission' readonly='readonly'/>
            <img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='25'>
        </a>
        </td>
  </tr>
  <tr class='evenrow'>
    <td colspan='22'>
    <div align='right'>
             <input  type='button' class='formButton2'name='save' id='save' style='width:100px;' value='Save' onclick=\"loadingIcon(xajax.getFormValues('partnerships'),'save_householdData');return false;\" />
            </div>
    </td>
  </tr>";
$data.="<div align='center' height='900' id='myLoader' style='display:none;'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Saving Data...</span></div>";
  
$data.="</table>";
$data.="</td>";
$data.="</tr>";
//========table2 end============
        
        
$data.="</table>";
$data.="</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
return $obj;
}
function save_householdData($formValues){
$obj = new xajaxResponse();


//first create the refrence point for the three form1 tables
$stmnt_check="SELECT h.`tbl_house_hold_detailsId` FROM `tbl_house_hold_details` h ORDER BY h.`tbl_house_hold_detailsId` DESC";
$Qcheck=@mysql_query($stmnt_check) or die(http(5959));

//$obj->alert($stmnt_check);

$y=1;
if(@mysql_num_rows($Qcheck)>0){
$Rcheck=mysql_fetch_array($Qcheck);
$lasthouseholdId=$Rcheck['tbl_house_hold_detailsId'];

//$obj->alert($lasthouseholdId);

$newId=$lasthouseholdId;

$nexthouseholdId=($newId+$y);
$tbl_householdId=$nexthouseholdId;  
    
}
else
{
//Setting the first Id if all tables are empty
$initialhouseholdId=$y;
$tbl_householdId=$initialhouseholdId;  
}


    //Submission Details
   // $reportingPeriod=$_SESSION['quarter'];
    $CompiledBy=$formValues['CompiledBy'];
    $ReviewedBy=$formValues['ReviewedBy'];
    $SubmittedBy=$formValues['SubmittedBy'];
    $DateSubmission=$formValues['DateSubmission'];
    $year=date('Y');
    
    $thisYear=date('Y');
    $nextYear=$thisYear+1;
    $activeQuarter=str_replace("".$thisYear."","","".$_SESSION['quarter']."");
    
    
    //=========================Household head Details==============
    $hsHead=$formValues['hsHead'];
    $hsCode=$formValues['hsCode'];
    $hsSex=$formValues['hsSex'];
    $hsRegion=$formValues['hsRegion'];
    $hsStatus=$formValues['hsStatus'];
    $hsDistrict=$formValues['hsDistrict'];
    $hsComposition=$formValues['hsComposition'];
    $hsSubcounty=$formValues['hsSubcounty'];
    $hsParish=$formValues['hsParish'];
    $hsVillage=$formValues['hsVillage'];
    $hsVillageAgent=$formValues['hsVillageAgent'];
    $hsTotMembers=$formValues['hsTotMembers'];
    $hsTotMembersFemale=$formValues['hsTotMembersFemale'];
    $hsTotMembersMale=$formValues['hsTotMembersMale'];
    $hsTotMembersYouth=$formValues['hsTotMembersYouth'];
    $hsHouseholdAge=$formValues['hsHouseholdAge'];
    
     $stmnt="INSERT INTO `tbl_house_hold_details`(`houseHoldId`,`year`,
                `hsHead`, `hsCode`,`hsSex`,
                `hsRegion`,`hsStatus`,`hsDistrict`, 
                `hsComposition`,`hsSubcounty`,`hsParish`, 
                `hsVillage`, `hsVillageAgent`,`hsTotMembers`, 
                `hsTotMembersFemale`,`hsTotMembersMale`,`hsTotMembersYouth`,`hsHouseholdAge`,
                `reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(
                '".$tbl_householdId."','".$year."','".$hsHead."','".$hsCode."','".$hsSex."',
                '".$hsRegion."','".$hsStatus."','".$hsDistrict."',
                '".$hsComposition."','".$hsSubcounty."','".$hsParish."',
                '".$hsVillage."','".$hsVillageAgent."','".$hsTotMembers."',
                '".$hsTotMembersFemale."','".$hsTotMembersMale."','".$hsTotMembersYouth."','".$hsHouseholdAge."',
                '".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";
    
    //$obj->alert($hsHouseholdAge);
    //$obj->alert($stmnt);
    @mysql_query($stmnt)or die(http(6031));
    
    //========================Household members data==================
for($x=0;$x<count($formValues['loopkey']);$x++){
    
$hsNameMember=$formValues['hsNameMember'][$x];
$hsSexMember=$formValues['hsSexMember'][$x];



$hsAgeMember=$formValues['hsAgeMember'][$x];
$hsAreaMaizeMember=$formValues['hsAreaMaizeMember'][$x];
$hsValueInputsMaizeMember=$formValues['hsValueInputsMaizeMember'][$x];
$hsTotalYieldMaizeMember=$formValues['hsTotalYieldMaizeMember'][$x];
$hsVolumeSoldMaizeMember=$formValues['hsVolumeSoldMaizeMember'][$x];
$hsVolumeLostMaizeMember=$formValues['hsVolumeLostMaizeMember'][$x];
$hsAreaBeansMember=$formValues['hsAreaBeansMember'][$x];
$hsValueInputsBeansMember=$formValues['hsValueInputsBeansMember'][$x];
$hsTotalYieldBeansMember=$formValues['hsTotalYieldBeansMember'][$x];
$hsVolumeSoldBeansMember=$formValues['hsVolumeSoldBeansMember'][$x];
$hsVolumeLostBeansMember=$formValues['hsVolumeLostBeansMember'][$x];
$hsAreaCoffeeMember=$formValues['hsAreaCoffeeMember'][$x];
$hsValueInputsCoffeeMember=$formValues['hsValueInputsCoffeeMember'][$x];
$hsTotalYieldCoffeeMember=$formValues['hsTotalYieldCoffeeMember'][$x];
$hsVolumeSoldCoffeeMember=$formValues['hsVolumeSoldCoffeeMember'][$x];
$hsVolumeLostCoffeeMember=$formValues['hsVolumeLostCoffeeMember'][$x];
$hsTotLoanAccessedMember=$formValues['hsTotLoanAccessedMember'][$x];

if($hsNameMember<>'' OR $hsNameMember<>0 OR $hsSexMember='' OR $hsSexMember<>0){

$stmnt_two="INSERT INTO `tbl_household_members` (`houseHoldId`,`year`,
`hsNameMember`,  `hsSexMember`,  `hsAgeMember`,  
`hsAreaMaizeMember`,`hsValueInputsMaizeMember`,  `hsTotalYieldMaizeMember`,  
`hsVolumeSoldMaizeMember`,`hsVolumeLostMaizeMember`,`hsAreaBeansMember`,  
`hsValueInputsBeansMember`,`hsTotalYieldBeansMember`,`hsVolumeSoldBeansMember`,  
`hsVolumeLostBeansMember`, `hsAreaCoffeeMember`,`hsValueInputsCoffeeMember`,  
`hsTotalYieldCoffeeMember`,`hsVolumeSoldCoffeeMember`,`hsVolumeLostCoffeeMember`,  
`hsTotLoanAccessedMember`,
`reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(
'".$tbl_householdId."','".$year."','".$hsNameMember."','".$hsSexMember."','".$hsAgeMember."',
'".$hsAreaMaizeMember."','".$hsValueInputsMaizeMember."','".$hsTotalYieldMaizeMember."',
'".$hsVolumeSoldMaizeMember."','".$hsVolumeLostMaizeMember."','".$hsAreaBeansMember."',
'".$hsValueInputsBeansMember."','".$hsTotalYieldBeansMember."','".$hsVolumeSoldBeansMember."',
'".$hsVolumeLostBeansMember."','".$hsAreaCoffeeMember."','".$hsValueInputsCoffeeMember."',
'".$hsTotalYieldCoffeeMember."','".$hsVolumeSoldCoffeeMember."','".$hsVolumeLostCoffeeMember."',
'".$hsTotLoanAccessedMember."',
'".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";
  //$obj->alert($stmnt_two);
 @mysql_query($stmnt_two)or die(http(6096));
}
}


//=====================================other values=================
for($k=0;$k<count($formValues['loopkeyRand']);$k++){
 
$maizeTotalFGPrice=$formValues['maizeTotalFGPrice'];
$beansTotalFGPrice=$formValues['beansTotalFGPrice'];
$coffeeTotalFGPrice=$formValues['coffeeTotalFGPrice'];
$improvedSeedMaterialsMaizeT=$formValues['improvedSeedMaterialsMaizeT'];
$improvedSeedMaterialsMaizeM=$formValues['improvedSeedMaterialsMaizeM'];
$improvedSeedMaterialsMaizeF=$formValues['improvedSeedMaterialsMaizeF'];
$improvedSeedMaterialsMaizeY=$formValues['improvedSeedMaterialsMaizeY'];
$improvedSeedMaterialsBeansT=$formValues['improvedSeedMaterialsBeansT'];
$improvedSeedMaterialsBeansM=$formValues['improvedSeedMaterialsBeansM'];
$improvedSeedMaterialsBeansF=$formValues['improvedSeedMaterialsBeansF'];
$improvedSeedMaterialsBeansY=$formValues['improvedSeedMaterialsBeansY'];
$improvedSeedMaterialsCoffeeT=$formValues['improvedSeedMaterialsCoffeeT'];
$improvedSeedMaterialsCoffeeM=$formValues['improvedSeedMaterialsCoffeeM'];
$improvedSeedMaterialsCoffeeF=$formValues['improvedSeedMaterialsCoffeeF'];
$improvedSeedMaterialsCoffeeY=$formValues['improvedSeedMaterialsCoffeeY'];
$acreageImprovedSeedMaize=$formValues['acreageImprovedSeedMaize'];
$acreageImprovedSeedBeans=$formValues['acreageImprovedSeedBeans'];
$acreageImprovedSeedCoffee=$formValues['acreageImprovedSeedCoffee'];
    
$useFertilizersMaizeT=$formValues['useFertilizersMaizeT'];
$useFertilizersMaizeM=$formValues['useFertilizersMaizeM'];
$useFertilizersMaizeF=$formValues['useFertilizersMaizeF'];
$useFertilizersMaizeY=$formValues['useFertilizersMaizeY'];
$useFertilizersBeansT=$formValues['useFertilizersBeansT'];
$useFertilizersBeansM=$formValues['useFertilizersBeansM'];
$useFertilizersBeansF=$formValues['useFertilizersBeansF'];
$useFertilizersBeansY=$formValues['useFertilizersBeansY'];
$useFertilizersCoffeeT=$formValues['useFertilizersCoffeeT'];
$useFertilizersCoffeeM=$formValues['useFertilizersCoffeeM'];
$useFertilizersCoffeeF=$formValues['useFertilizersCoffeeF'];
$useFertilizersCoffeeY=$formValues['useFertilizersCoffeeY'];
$acreageFertilizersMaize=$formValues['acreageFertilizersMaize'];
$acreageFertilizersBeans=$formValues['acreageFertilizersBeans'];
$acreageFertilizersCoffee=$formValues['acreageFertilizersCoffee'];
$useChemicalsMaizeT=$formValues['useChemicalsMaizeT'];
$useChemicalsMaizeM=$formValues['useChemicalsMaizeM'];
$useChemicalsMaizeF=$formValues['useChemicalsMaizeF'];
$useChemicalsMaizeY=$formValues['useChemicalsMaizeY'];
$useChemicalsBeansT=$formValues['useChemicalsBeansT'];
$useChemicalsBeansM=$formValues['useChemicalsBeansM'];
$useChemicalsBeansF=$formValues['useChemicalsBeansF'];
$useChemicalsBeansY=$formValues['useChemicalsBeansY'];
$useChemicalsCoffeeT=$formValues['useChemicalsCoffeeT'];
$useChemicalsCoffeeM=$formValues['useChemicalsCoffeeM'];
$useChemicalsCoffeeF=$formValues['useChemicalsCoffeeF'];
$useChemicalsCoffeeY=$formValues['useChemicalsCoffeeY'];
$acreageChemicalsMaize=$formValues['acreageChemicalsMaize'];
$acreageChemicalsBeans=$formValues['acreageChemicalsBeans'];
$acreageChemicalsCoffee=$formValues['acreageChemicalsCoffee'];




$purchasingInputThruVARM=$formValues['purchasingInputThruVARM'];
$purchasingInputThruVillageAgent=$formValues['purchasingInputThruVillageAgent'];
$purchasingInputThruStockist=$formValues['purchasingInputThruStockist'];
$purchasingInputThruOthers=$formValues['purchasingInputThruOthers'];

$goodYields=($formValues['Good Yields']=='Good Yields')?"Yes":"No";
$reducedCosts=($formValues['Reduced Costs']=='Reduced Costs')?"Yes":"No";
$labourSaving=($formValues['Labour Saving']=='Labour Saving')?"Yes":"No";
$none=($formValues['None']=='None')?"Yes":"No";
$betterQuality=($formValues['Better Quality']=='Better Quality')?"Yes":"No";
$diseaseResistance=($formValues['Disease Resistance']=='Disease Resistance')?"Yes":"No";
$earlyMaturity=($formValues['Early maturity']=='Early maturity')?"Yes":"No";






$stmnt_three="INSERT INTO `tbl_household_summary_data` (`houseHoldId`,`year`,
`maizeTotalFGPrice`,`beansTotalFGPrice`,`coffeeTotalFGPrice`,
`improvedSeedMaterialsMaizeT`,`improvedSeedMaterialsMaizeM`,`improvedSeedMaterialsMaizeF`,
`improvedSeedMaterialsMaizeY`,`improvedSeedMaterialsBeansT`,`improvedSeedMaterialsBeansM`,
`improvedSeedMaterialsBeansF`,`improvedSeedMaterialsBeansY`,`improvedSeedMaterialsCoffeeT`,`improvedSeedMaterialsCoffeeM`,
`improvedSeedMaterialsCoffeeF`,`improvedSeedMaterialsCoffeeY`,
`acreageImprovedSeedMaize`,`acreageImprovedSeedBeans`,`acreageImprovedSeedCoffee`,

`useFertilizersMaizeT`,`useFertilizersMaizeM`,`useFertilizersMaizeF`,`useFertilizersMaizeY`,
`useFertilizersBeansT`,`useFertilizersBeansM`,`useFertilizersBeansF`,`useFertilizersBeansY`,
`useFertilizersCoffeeT`,`useFertilizersCoffeeM`,`useFertilizersCoffeeF`,`useFertilizersCoffeeY`,
`acreageFertilizersMaize`,`acreageFertilizersBeans`,`acreageFertilizersCoffee`,`useChemicalsMaizeT`,
`useChemicalsMaizeM`,`useChemicalsMaizeF`,`useChemicalsMaizeY`,`useChemicalsBeansT`,
`useChemicalsBeansM`,`useChemicalsBeansF`,`useChemicalsBeansY`,`useChemicalsCoffeeT`,
`useChemicalsCoffeeM`,`useChemicalsCoffeeF`,`useChemicalsCoffeeY`,`acreageChemicalsMaize`,
`acreageChemicalsBeans`,`acreageChemicalsCoffee`,`purchasingInputThruVARM`,`purchasingInputThruVillageAgent`,
`purchasingInputThruStockist`,`purchasingInputThruOthers`,
`goodYields`,`reducedCosts`,`labourSaving`,`techNone`,
`betterQuality`,`diseaseResistance`,`earlyMaturity`,
`reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(


'".$tbl_householdId."','".$year."','".$maizeTotalFGPrice."','".$beansTotalFGPrice."','".$coffeeTotalFGPrice."',
'".$improvedSeedMaterialsMaizeT."','".$improvedSeedMaterialsMaizeM."','".$improvedSeedMaterialsMaizeF."',
'".$improvedSeedMaterialsMaizeY."','".$improvedSeedMaterialsBeansT."','".$improvedSeedMaterialsBeansM."',
'".$improvedSeedMaterialsBeansF."','".$improvedSeedMaterialsBeansY."','".$improvedSeedMaterialsCoffeeT."','".$improvedSeedMaterialsCoffeeM."',
'".$improvedSeedMaterialsCoffeeF."','".$improvedSeedMaterialsCoffeeY."',
'".$acreageImprovedSeedMaize."','".$acreageImprovedSeedBeans."','".$acreageImprovedSeedCoffee."',

'".$useFertilizersMaizeT."','".$useFertilizersMaizeM."','".$useFertilizersMaizeF."','".$useFertilizersMaizeY."',
'".$useFertilizersBeansT."','".$useFertilizersBeansM."','".$useFertilizersBeansF."','".$useFertilizersBeansY."',
'".$useFertilizersCoffeeT."','".$useFertilizersCoffeeM."','".$useFertilizersCoffeeF."','".$useFertilizersCoffeeY."',
'".$acreageFertilizersMaize."','".$acreageFertilizersBeans."','".$acreageFertilizersCoffee."','".$useChemicalsMaizeT."',
'".$useChemicalsMaizeM."','".$useChemicalsMaizeF."','".$useChemicalsMaizeY."','".$useChemicalsBeansT."',
'".$useChemicalsBeansM."','".$useChemicalsBeansF."','".$useChemicalsBeansY."','".$useChemicalsCoffeeT."',
'".$useChemicalsCoffeeM."','".$useChemicalsCoffeeF."','".$useChemicalsCoffeeY."','".$acreageChemicalsMaize."',
'".$acreageChemicalsBeans."','".$acreageChemicalsCoffee."','".$purchasingInputThruVARM."','".$purchasingInputThruVillageAgent."',
'".$purchasingInputThruStockist."','".$purchasingInputThruOthers."','".$goodYields."',
'".$reducedCosts."','".$labourSaving."','".$none."','".$betterQuality."','".$diseaseResistance."','".$earlyMaturity."',
'".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";


//$obj->alert($stmnt_three);
 @mysql_query($stmnt_three)or die(http(6218));
}

//========================loop3 values=============================
for($k=0;$k<count($formValues['loopkey3']);$k++){ 
$riskReducingPracticesMember=$formValues['riskReducingPracticesMember'][$k];
$riskReducingMitigateClimateChangeSex=$formValues['riskReducingMitigateClimateChangeSex'][$k];
$ageMemberRiskReducingPractice=$formValues['ageMemberRiskReducingPractice'][$k];
$riskReducingPractice1=$formValues['riskReducingPractice1'][$k];
$riskReducingPractice2=$formValues['riskReducingPractice2'][$k];


if($riskReducingPracticesMember<>'' OR $riskReducingPracticesMember<>0){
$stmnt_four="INSERT INTO `tbl_household_risk_reducing_practices`(`houseHoldId`,`year`,
`Member`,`Sex`,
`Age`,`riskReducingPractice1`,
`riskReducingPractice2`,
`reportingPeriod`,`CompiledBy`,`ReviewedBy`,`SubmittedBy`,`DateSubmission`)VALUES(
'".$tbl_householdId."','".$year."','".$riskReducingPracticesMember."','".$riskReducingMitigateClimateChangeSex."',
'".$ageMemberRiskReducingPractice."','".$riskReducingPractice1."',
'".$riskReducingPractice2."',
'".$activeQuarter."','".$CompiledBy."','".$ReviewedBy."','".$SubmittedBy."','".$DateSubmission."')";
//$obj->alert($stmnt_four);
@mysql_query($stmnt_four)or die(http(6241));
}
}

//===================End of other values===========================
$obj->call("hidemyLoaderDiv");
$obj->assign('bodyDisplay','innerHTML',congMsg("Data successfully captured!"));
$obj->call('xajax_view_form6','','','','',1,20);
return $obj;
}
function calc_totalHousehold($female,$male,$total){
$obj=new xajaxResponse();
$totalValue=0;
$totalValue=($female+$male);
$obj->assign($total,'value',$totalValue);
return $obj;
}
function close($div){
$obj=new xajaxResponse();
$data="";
$obj->assign($div,'innerHTML',$data);
return $obj;
}

function view_form6_web_form($fromDate,$toDate,$dsName,$hsName,$cur_page=1,$records_per_page=20){
$obj=new xajaxResponse();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;
$_SESSION['fromDate']=$fromDate;
$_SESSION['toDate']=$toDate;
$_SESSION['dsName']=$dsName;
$_SESSION['hsName']=$hsName;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$fromDate=($_SESSION['fromDate']<>''?$_SESSION['fromDate']:$fromDate);
$toDate=($_SESSION['toDate']<>''?$_SESSION['toDate']:$toDate);
$dsName=($_SESSION['dsName']<>''?$_SESSION['dsName']:$dsName);
$hsName=($_SESSION['hsName']<>''?$_SESSION['hsName']:$hsName);

$data.="<form  name='form6' id='form6' method='post' action='".$PHP_SELF."'>";
$data.="<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form6();
$data.="<tr>
<th colspan='21' >
Commodity Production And Marketing Activity VALUE CHAIN DATA COLLECTION FORM/HOUSEHOLD DATA</th>
</tr>";


//===================data to be displayed=====================

$data.="<tr>
<th  rowspan='2' class='first-cell-header'>#</th>
<th  rowspan='2' >District</th>
<th  rowspan='2' >Household Head<img width='220'height='0.1' src=''></th>
<th  rowspan='2' >No of members</th>
<th  colspan='5' >Maize</th>
<th  colspan='5' >Beans</th>
<th  colspan='5' >Coffee</th>
<th  rowspan='2' >Action</th>
</tr>

<tr>
<th  >Area (Acre)</th>
<th  >Value of inputs (UGX)</th>
<th  >Total yield<br />
(Kg)</th>
<th  >Volume sold<br />
(Kg)</th>
<th  >Volume lost in PHH<br />
(Kg)</th>
<th  >Area (Acre)</th>
<th  >Value of inputs (UGX)</th>
<th  >Total yield<br />
(Kg)</th>
<th  >Volume sold<br />
(Kg)</th>
<th  >Volume lost in PHH<br />
(Kg)</th>
<th  >Area (Acre)</th>
<th  >Value of inputs (UGX)</th>
<th  >Total yield<br />
(Kg)</th>
<th  >Volume sold<br />
(Kg)</th>
<th  >Volume lost in PHH<br />
(Kg)</th>
</tr>";



$query_string="SELECT d.`districtName` , h . * , COUNT(h.`houseHoldId` ) AS numHouseholds, m.`houseHoldId`,

SUM(m.`hsAreaMaizeMember`) as hsAreaMaizeMember,
SUM(m.`hsValueInputsMaizeMember`) as hsValueInputsMaizeMember,
SUM(m.`hsTotalYieldMaizeMember`) as hsTotalYieldMaizeMember,
SUM(m.`hsVolumeSoldMaizeMember`) as hsVolumeSoldMaizeMember,
SUM(m.`hsVolumeLostMaizeMember`) as hsVolumeLostMaizeMember,

SUM(m.`hsAreaBeansMember`) as hsAreaBeansMember,
SUM(m.`hsValueInputsBeansMember`) as hsValueInputsBeansMember,
SUM(m.`hsTotalYieldBeansMember`) as hsTotalYieldBeansMember,
SUM(m.`hsVolumeSoldBeansMember`) as hsVolumeSoldBeansMember,
SUM(m.`hsVolumeLostBeansMember`) as hsVolumeLostBeansMember,


SUM(m.`hsAreaCoffeeMember`) as hsAreaCoffeeMember,
SUM(m.`hsValueInputsCoffeeMember`) as hsValueInputsCoffeeMember,
SUM(m.`hsTotalYieldCoffeeMember`) as hsTotalYieldCoffeeMember,
SUM(m.`hsVolumeSoldCoffeeMember`) as hsVolumeSoldCoffeeMember,
SUM(m.`hsVolumeLostCoffeeMember`) as hsVolumeLostCoffeeMember,


COUNT( m.`houseHoldId` ) AS numMembers
FROM `tbl_household_members` as `m`,
`tbl_district` d, `tbl_house_hold_details` as `h` ";
$query_string.="WHERE h.`hsDistrict` = d.`districtCode` ";

//Filter parameters
if($dsName<>'' and $hsName<>''){
$query_string.="
AND d.`districtName` LIKE '%".$dsName."%'
AND h.`hsHead` LIKE '%".$hsName."%' ";
}elseif($dsName<>'' and $hsName==''){
$query_string.="AND d.`districtName` LIKE '%".$dsName."%' ";
}elseif($dsName=='' and $hsName<>''){
$query_string.="AND h.`hsHead` LIKE '%".$hsName."%' ";
}



$query_string.="AND m.`houseHoldId`=h.`houseHoldId` ";
$query_string.=" GROUP BY m.`houseHoldId` ORDER BY h.`tbl_house_hold_detailsId` DESC";

//$obj->alert($query_string);

$query_=mysql_query($query_string)or die(http(__line__));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$n=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));


//$obj->alert($new_query);

while($rowh=mysql_fetch_array($new_query)){
$data.="<tr>";
$data.="<td>".$n.".";
$data.="<input type='hidden'  name='houseHoldId[]' id='houseHoldId".$n."' value='".$rowh['houseHoldId']."'/>
<input name='loopkey[]' id='loopkey".$n."' type='hidden' value='1'/>";
$data.="</td>";
$data.="<td>".$rowh['districtName']."</td>";
$data.="<td align='left'>".$rowh['hsHead']."</td>";    
$data.="<td align='right'>".displayValues($rowh['numMembers'])."</td>";
$data.="<td align='right'>".displayValues($rowh['hsAreaMaizeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsValueInputsMaizeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsValueInputsBeansMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsValueInputsCoffeeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsTotalYieldCoffeeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldCoffeeMember'],2)."</td>";
$data.="<td align='right'>".displayValues($rowh['hsVolumeLostCoffeeMember'],2)."</td>";
$data.="<td>
<input type='button' class='formButton2'TITLE='Edit'
onclick=\"xajax_edit_form6(
'".$regionCode."',
'".$districtCode."',
'".$subcountyCode."',
'".$parishCode."',
'".$rowh['tbl_house_hold_detailsId']."'
);return false;\"
value='edit' />
<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('form6'),'Delete_form6');return false;\" align='left'></td>";
$data.="</tr>";

$n++;
}
$data.="".noRecordsFound($new_query,21)."";
//====================end of displayed data===================

/*
*display pages
*/
$data.="<tr align='right'>
<td colspan='9'>";

$p='';
$num_links=10;
$startAt_links=($cur_page-5);
$endAt_links=($cur_page+$num_links);
$cur_link=$cur_page;


if($num_pages>1){
$links=1;
$append_bar=$p==$num_pages?"":"|";
if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_web_form('".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['dsName']."','".$_SESSION['hsName']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
else $data.="<a href='#' onclick=\"xajax_view_form6_web_form('".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['dsName']."','".$_SESSION['hsName']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
//for($p=2;$p<$num_pages;$p++){
$p=2;
while($p<$num_pages){
if(($p>$startAt_links) and ($p<$endAt_links)){
$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_web_form('".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
$p++;
}
if($p==$num_pages){
$data.="...<a href='#' onclick=\"xajax_view_form6_web_form('".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
}
}


$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_web_form('".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$cur_page."',this.value)\">";
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
function view_form6_survey_one($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
		AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
		and `p`.`interview_date` between ('2014-10-01') and ('2015-09-30') ";

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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_one('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_one('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_one('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_one('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_one('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}
function view_form6_survey_two($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_two('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_two('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_two('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_two('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_two('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}
function view_form6_survey_three($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_three('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_three('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_three('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_three('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_three('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}
function view_form6_survey_four($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
$obj=new xajaxResponse();
$qmobj = new QueryManager('');
$f6obj = new Form6DataValidationManager('');
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
	<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form6surveyApr2016ToSep2016();
		$data.="<tr class='evenrow'>
			<th colspan='29' align='left'>
				Commodity Production And Marketing Activity FORM 6 SURVEY DATA 
			</th>
		</tr>

		<tr>
		<th class='first-cell-header'>#</th>";
		$q=$qmobj->fetchForm6AprToSep2016Fields('');
		$query=mysql_query($q)or die(mysql_error().__line__);
		$num_rows = mysql_num_rows($query);
    $data_header = array();
		while($row=mysql_fetch_array($query)){				
		$data.="<th>".$row['field']."</th>";
    $data_header[] = $row['answer'];
		}
		$data.="</tr>
		</thead>
		<tbody>";
		
$query_string=$qmobj->fetchForm6AprToSep2016Data('');

/* $reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode; */

$query_string.=" order by `Id` DESC";

 //$obj->alert($query_string); 

  
  $x=1;
	$query_=mysql_query($query_string)or die(mysql_error().__line__);
	 /**************
	 *paging parameters
	 *
	 ****/
	$max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $x=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error().__line__);
	
  
  while($row=mysql_fetch_array($new_query)){
	  $ans_var=1;
	  
			$data.="<tr>";
			$data.="<td>".$x.".</td>";				
			/* pick all data for each data cell 
			and all data values for each cell */
			foreach ($data_header as $fieldName) {
       //$obj->alert($data_header);
				$field_name=$fieldName;
				$columnValue=$row[''.$fieldName.''];
				
				
				 /* start Validation of values returned */
				 switch($field_name){
          //from the db, add 1 + (ans_var)
          //validate Interview_Date
          case 'ans_15':
          $date_var=$f6obj->formatDateString($columnValue);
          $data.=$f6obj->validateDateRange($date_var,'2015-10-01','2016-09-30');
          break;   

          case 'ans_23':
          $data.=$f6obj->validateRegion($columnValue);
          break;

          #HH head........

          case 'ans_41':
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_42':
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_44':
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_45':
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_46':
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          #HH hold1........

          case 'ans_47':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_48':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_50':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_51':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_52':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                    #HH hold2........

          case 'ans_53':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_54':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_56':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_57':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_58':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold3........

          case 'ans_59':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_60':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_62':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_63':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_64':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold4........

          case 'ans_65':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_66':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_68':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_69':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_70':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


            #HH hold4........

          case 'ans_71':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_72':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_74':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_75':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_76':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;




                      #HH hold4........

          case 'ans_77':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_78':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_80':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_81':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_82':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;

                      #HH hold4........

          case 'ans_83':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_84':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_86':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_87':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_88':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_89':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_90':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_92':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_93':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_94':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_95':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_96':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_98':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_99':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_100':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_101':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_102':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_104':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_105':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_106':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                                #HH hold4........

          case 'ans_107':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_108':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_110':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_111':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_112':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          case 'ans_114':
          #Produced_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_116':
          #Produced_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_115':
          #Produced_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;




          case 'ans_118':
          #Produced_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_120':
          #Produced_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_119':
          #Produced_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_123':
          #Harvested_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_592':
          #Harvested_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1064':
          #Harvested_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


        
          
          //validate farmer_code
          case 'ans_18':
          $data.=$f6obj->validateFarmerCode($columnValue);
          break;
          
          //validate farmer_gender
          case 'ans_20':
          $data.=$f6obj->validateGender($columnValue);
          break;
          
          //validate farmer_dob
          case 'ans_21':
          $data.="<td>".$f6obj->formatDateString($columnValue)."</td>";
          break;


           // //validate farmer_district
           // case 'ans_24':
           // $data.=$f6obj->validateDistrict($columnValue);
           // break;
          
          
          /* start Shaffic Cases */         
          case 'ans_1575':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1574':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1573':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen10($columnValue);
          break;
          
          case 'ans_1572':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1571':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1560':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen07($columnValue);
          break;

          case 'ans_1559':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1558':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1557':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1550':
          # code...ProtectCounterfeit
          $data.=$f6obj->validateProtectCounterfeit($columnValue);
          break;

          case 'ans_1543':
          # code...FakeFertilizer
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1544':
          # code...ReasonFakeFertilizer
          $data.=$f6obj->validateReasonFakeFertilizer($columnValue);
          break;

          case 'ans_1542':
          # code...FakeAgroInputs
          $data.=$f6obj->validateFakeAgroInputs($columnValue);
          break;

          case 'ans_1535':
          # code...ImprovedClimate
          $data.=$f6obj->validateImprovedClimate($columnValue);
          break;

          case 'ans_1534':
          # code...Climate Awareness
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1531':
          # code...Loan accessed
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

        #coffee_data................



          case 'ans_1530':
          # code...Aware_Quality_Standards_Coffee
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1524':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1496':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1495':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1482':
          # code...ICT_Technology_Help_Coffee
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1473':
          # code...ICT_technologies_Used_Coffee
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_1461':
          # code...Reasons_Not_Using_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_1453':
          # code...Type_Of_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_1451':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1437':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1423':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1416':
          # code...Coffee_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1402':
          # code...Coffee_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1394':
          # code...Coffee_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1381':
          # code...PHH_Technology_Used_Coffee_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1380':
          # code...Apply_PHH_Technology_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1368':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1356':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_1349':
          # code...Coffee_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1335':
          # code...Coffee_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1327':
          # code...Coffee_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1314':
          # code...PHH_Technology_Used_Coffee_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1313':
          # code...Apply_PHH_Technology_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1301':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1289':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_1278':
          # code...Coffee_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_1255':
          # code...Coffee_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1254':
          # code...Coffee_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1253':
          # code...Coffee_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1252':
          # code...Coffee_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1251':
          # code...Coffee_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1250':
          # code...Coffee_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1249':
          # code...Coffee_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1248':
          # code...Coffee_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1247':
          # code...Coffee_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1246':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1245':
          # code...Coffee_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1233':
          # code...Coffee_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_1210':
          # Coffee_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1209':
          # code...Coffee_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1208':
          # code...Coffee_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1207':
          # code...Coffee_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1206':
          # code...Coffee_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1205':
          # code...Coffee_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1204':
          # code...Coffee_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1203':
          # code...Coffee_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1202':
          # code...Coffee_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1201':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1200':
          # code...Coffee_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1192':
          # code...Coffee_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1182':
          # code...Coffee_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_1181':
          # code...Coffee_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1179':
          # code...Coffee_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1166':
          # code...Coffee_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_1153':
          # code...Coffee_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1152':
          # code...Coffee_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1151':
          # code...Coffee_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1150':
          # code...Coffee_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1149':
          # code...Coffee_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1148':
          # code...Coffee_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1147':
          # code...Coffee_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1146':
          # code...Coffee_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1145':
          # code...Coffee_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1144':
          # code...Coffee_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1143':
          # code...Coffee_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1142':
          # code...Coffee_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1141':
          # code...Coffee_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1140':
          # code...Coffee_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1138':
          # code...Type_Seeds_Coffee_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1131':
          # code...Coffee_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1121':
          # code...Coffee_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_1120':
          # code...Coffee_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1118':
          # code...Coffee_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1105':
          # code...Coffee_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_1092':
          # code...Coffee_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1091':
          # code...Coffee_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1090':
          # code...Coffee_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1089':
          # code...Coffee_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1088':
          # code...Coffee_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1087':
          # code...Coffee_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1086':
          # code...Coffee_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1085':
          # code...Coffee_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1084':
          # code...Coffee_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1083':
          # code...Coffee_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1082':
          # code...Coffee_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1081':
          # code...Coffee_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1080':
          # code...Coffee_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1079':
          # code...Coffee_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1077':
          # code...Type_Seeds_Coffee_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1075':
          # code...Coffee_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1071':
          # code...Land_Mapped_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1068':
          # code...Coffee_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1063':
          # code...Land_Mapped_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1059':
          # code...Type_Coffee_Grown
          $data.=$f6obj->validateTypeCoffee($columnValue);
          break;


          #Beans data..................

          case 'ans_1058':
          # code...Aware_Quality_Standards_Beans
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1052':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1024':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1023':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1010':
          # code...ICT_Technology_Help_Beans
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1001':
          # code...ICT_technologies_Used_Beans
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_989':
          # code...Reasons_Not_Using_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_988':
          # code...Type_Of_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_979':
          # code...Beans_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_965':
          # code...Use_Paid_Labour_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_951':
          # code...Use_Paid_Labour_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_944':
          # code...Beans_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_930':
          # code...Beans_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_922':
          # code...Beans_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_909':
          # code...PHH_Technology_Used_Beans_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_908':
          # code...Apply_PHH_Technology_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_896':
          # code...Store_Beans_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_884':
          # code...Dry_Beans_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_877':
          # code...Beans_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_863':
          # code...Beans_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_855':
          # code...Beans_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_842':
          # code...PHH_Technology_Used_Beans_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_841':
          # code...Apply_PHH_Technology_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_829':
          # code...Store_Beans_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_817':
          # code...Dry_Beans_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_806':
          # code...Beans_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_783':
          # code...Beans_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_782':
          # code...Beans_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_781':
          # code...Beans_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_780':
          # code...Beans_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_779':
          # code...Beans_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_778':
          # code...Beans_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_777':
          # code...Beans_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_776':
          # code...Beans_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_775':
          # code...Beans_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_774':
          # code...Beans_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_773':
          # code...Beans_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_761':
          # code...Beans_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_738':
          # Beans_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_737':
          # code...Beans_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_736':
          # code...Beans_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_735':
          # code...Beans_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_734':
          # code...Beans_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_733':
          # code...Beans_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_732':
          # code...Beans_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_731':
          # code...Beans_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_730':
          # code...Beans_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_729':
          # code...Beans_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_728':
          # code...Beans_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_720':
          # code...Beans_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_710':
          # code...Beans_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_709':
          # code...Beans_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_707':
          # code...Beans_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_694':
          # code...Beans_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_681':
          # code...Beans_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_680':
          # code...Beans_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_679':
          # code...Beans_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_678':
          # code...Beans_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_677':
          # code...Beans_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_676':
          # code...Beans_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_675':
          # code...Beans_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_674':
          # code...Beans_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_673':
          # code...Beans_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_672':
          # code...Beans_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_671':
          # code...Beans_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_670':
          # code...Beans_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_669':
          # code...Beans_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_668':
          # code...Beans_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_666':
          # code...Type_Seeds_Beans_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_659':
          # code...Beans_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_649':
          # code...Beans_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_648':
          # code...Beans_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_646':
          # code...Beans_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_633':
          # code...Beans_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_620':
          # code...Beans_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_619':
          # code...Beans_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_618':
          # code...Beans_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_617':
          # code...Beans_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_616':
          # code...Beans_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_615':
          # code...Beans_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_614':
          # code...Beans_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_613':
          # code...Beans_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_612':
          # code...Beans_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_611':
          # code...Beans_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_610':
          # code...Beans_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_609':
          # code...Beans_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_605':
          # code...Type_Seeds_Beans_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_603':
          # code...Beans_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_599':
          # code...Land_Mapped_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_596':
          # code...Beans_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_591':
          # code...Land_Mapped_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          #Maize.... data.............


          case 'ans_589':
          # code...Aware_Quality_Standards_Maize
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_583':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;


          case 'ans_555':
          # code...Good_Agricultural_Practices_Trained_Maize
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_554':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_541':
          # code...ICT_Technology_Help_Maize
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_532':
          # code...ICT_technologies_Used_Maize
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_520':
          # code...Reasons_Not_Using_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_512':
          # code...Type_Of_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_510':
          # code...Maize_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_496':
          # code...Use_Paid_Labour_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_482':
          # code...Use_Paid_Labour_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_475':
          # code...Maize_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_461':
          # code...Maize_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_453':
          # code...Maize_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_440':
          # code...PHH_Technology_Used_Maize_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_439':
          # code...Apply_PHH_Technology_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_427':
          # code...Store_Maize_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_415':
          # code...Dry_Maize_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_408':
          # code...Maize_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_394':
          # code...Maize_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_386':
          # code...Maize_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_373':
          # code...PHH_Technology_Used_Maize_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_372':
          # code...Apply_PHH_Technology_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_360':
          # code...Store_Maize_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_348':
          # code...Dry_Maize_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_337':
          # code...Maize_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_314':
          # code...Maize_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_313':
          # code...Maize_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_312':
          # code...Maize_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_311':
          # code...Maize_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_310':
          # code...Maize_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_309':
          # code...Maize_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_308':
          # code...Maize_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_307':
          # code...Maize_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_306':
          # code...Maize_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_305':
          # code...Maize_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_304':
          # code...Maize_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_292':
          # code...Maize_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_269':
          # Maize_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_268':
          # code...Maize_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_267':
          # code...Maize_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_266':
          # code...Maize_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_265':
          # code...Maize_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_264':
          # code...Maize_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_263':
          # code...Maize_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_262':
          # code...Maize_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_261':
          # code...Maize_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_260':
          # code...Maize_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_259':
          # code...Maize_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_251':
          # code...Maize_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_241':
          # code...Maize_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_240':
          # code...Maize_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_238':
          # code...Maize_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_225':
          # code...Maize_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_212':
          # code...Maize_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_211':
          # code...Maize_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_210':
          # code...Maize_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_209':
          # code...Maize_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_208':
          # code...Maize_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_207':
          # code...Maize_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_206':
          # code...Maize_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_205':
          # code...Maize_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_204':
          # code...Maize_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_203':
          # code...Maize_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_202':
          # code...Maize_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_201':
          # code...Maize_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_200':
          # code...Maize_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_199':
          # code...Maize_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_197':
          # code...Type_Seeds_Maize_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_190':
          # code...Maize_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_180':
          # code...Maize_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_179':
          # code...Maize_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_177':
          # code...Maize_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_164':
          # code...Maize_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_151':
          # code...Maize_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_150':
          # code...Maize_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_149':
          # code...Maize_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_148':
          # code...Maize_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_147':
          # code...Maize_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_146':
          # code...Maize_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_145':
          # code...Maize_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_144':
          # code...Maize_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_143':
          # code...Maize_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_142':
          # code...Maize_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_141':
          # code...Maize_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_140':
          # code...Maize_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_139':
          # code...Maize_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_138':
          # code...Maize_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_136':
          # code...Type_Seeds_Maize_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_134':
          # code...Maize_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_130':
          # code...Land_Mapped_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_127':
          # code...Maize_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_122':
          # code...Land_Mapped_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

         

        
          
          
          /* end Shaffic Cases */
          
          
          default:
          $data.="<td>".$columnValue."</td>";
          break;          
         }
        /* end of validation series */
				
				
				
				
				
						
			}
			
			
			$data.="</tr>";
			$x++;
			$n++;
	}

$data.="".noRecordsFound($new_query,16)."";

//====================end of displayed data===================
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_four('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_four('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_four('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_four('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_four('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}

function view_form6_survey_five($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_five('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_five('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_five('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_five('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_five('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}
function view_form6_survey_six($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_six('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_six('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_six('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_six('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_six('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}
function view_form6_survey_seven($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=1000){
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
			<th colspan='29' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA </th>
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
			$data.="<td align='right'>".number_format((float)$hsValueInputsMaizeMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
			$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsBeansMember,2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
			$data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
			$hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
			$data.="<td align='right'>".number_format((float)$hsValueInputsCoffeeMember,2)."</td>";
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
				if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_form6_survey_seven('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
				else $data.="<a href='#' onclick=\"xajax_view_form6_survey_seven('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
				//for($p=2;$p<$num_pages;$p++){
				$p=2;
				while($p<$num_pages){
				if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_form6_survey_seven('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				$p++;
				}
				if($p==$num_pages){
				$data.="...<a href='#' onclick=\"xajax_view_form6_survey_seven('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
				}
				}


				$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_form6_survey_seven('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
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
$obj->call("shadeBgOnCheck"); 
$obj->call("hideLoadingDiv");  
return $obj;
}



#new form6  surmarised.........


function view_frm6Survey2016($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page=1,$records_per_page=50){
$obj=new xajaxResponse();
$f6obj = new Form6DataValidationManager('');
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

  <table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>".filter_form6surveyApr2016ToSep2016();

    $data.="<tr class='evenrow'>
      <th colspan='46' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA</th>
    </tr>";

    //===================data to be displayed=====================
    $data.="<tr>
      <th class='first-cell-header'  rowspan='3' >#</th>
      <th  rowspan='3' >Region</th>
      <th  rowspan='3' >District</th>
      <th  rowspan='3' >Subcounty</th>
      <th  rowspan='3' >Farmer Code</th>
      <th  rowspan='3' >Sampled Farmer Name</th>
      <th  rowspan='3' >Respondent</th>
      <th  rowspan='3' >Compiled By</th>
      <th  rowspan='3' >Surveyor's Tel</th>
      <th  rowspan='3' >Date Surveyed</th>
      <th  colspan='12' >Maize</th>
      <th  colspan='12' >Beans</th>
      <th  colspan='12' >Coffee</th>
      
    </tr>
      
    <tr>
      <th colspan='2' >Area (Acre)</th>
      <th colspan='2' >Value of inputs (UGX)</th>
      <th colspan='2' >Total yield<br />
       (Kg)</th>
      <th  colspan='2'>Volume sold<br />
       (Kg)</th>
       <th  colspan='2'>Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
      <th  colspan='2'>Area (Acre)
      
      </th>
      <th  colspan='2'>Value of inputs (UGX)</th>
      <th  colspan='2'>Total yield<br />
       (Kg)</th>
      <th colspan='2' >Volume sold<br />
       (Kg)</th>
       <th colspan='2' >Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
      <th colspan='2' >Area (Acre)</th>
      <th  colspan='2'>Value of inputs (UGX)</th>
      <th  colspan='2'>Total yield<br />
       (Kg)</th>
      <th  colspan='2'>Volume sold<br />
       (Kg)</th>
       <th colspan='2' >Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
    </tr>
    <tr >
    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>


    </tr>


    ";
      
      
        



    //$query_string_farmers="select tbl_farmersId FROM `tbl_farmers` limit 1,20";

    

    /* $obj->alert($query_string); */


  //  $query_=mysql_query($query_string_farmers)or die(mysql_error());
    /**************
    *paging parameters
    *
    ****/
    //while($row=mysql_fetch_array($query_)){
      $query_string="select p . * ,z.zoneName
      FROM `tbl_form6_survey_data` as `p`
      left  join tbl_zone z on(z.zoneCode = p.ans_23)
      limit 0,100";

    //$obj->alert($query_string);

    
      
      $new_query=mysql_query($query_string) or die(mysql_error());
      $n=1;
      while($rowh=mysql_fetch_array($new_query)){

      
      $data.="<tr>";
      $data.="<td>".$n.".";
          
        $data.="</td>";
        
         $data.="<td>".$rowh['zoneName']."</td>";
        // $obj->alert()
         $data.=$f6obj->validateDistrict($rowh['ans_24']);
         $data.=$f6obj->validateSubCountry($rowh['ans_25']);
         $data.="<td>".$rowh['ans_18']."</td>";
         $data.="<td>".$rowh['ans_17']."</td>";
         $data.="<td>".$rowh['ans_16']."</td>";
         $data.="<td>".$rowh['ans_8']."</td>";
         $data.="<td>".$rowh['ans_7']."</td>";
         $data.="<td>".$rowh['ans_1']."</td>";

        // #maize data.......

         $data.="<td>".$rowh['ans_121']."</td>";
         $data.="<td>".$rowh['ans_129']."</td>";

        $inputseasonA=((intval($rowh['ans_270'])*intval($rowh['ans_281'])) + (intval($rowh['ans_271'])*intval($rowh['ans_282'])) 
          +(intval($rowh['ans_272'])*intval($rowh['ans_283']))+(intval($rowh['ans_273'])*intval($rowh['ans_284']))+(intval($rowh['ans_274']*intval($rowh['ans_285'])))
          +(intval($rowh['ans_275'])*intval($rowh['ans_286']))+(intval($rowh['ans_276'])*intval($rowh['ans_287']))+(intval($rowh['ans_277'])*intval($rowh['ans_288']))
          +(intval($rowh['ans_278'])*intval($rowh['ans_289']))+(intval($rowh['ans_279'])*intval($rowh['ans_290']))
          +(intval($rowh['ans_280'])*intval($rowh['ans_291']))
          );
        $inputseasonB=((intval($rowh['ans_315'])*intval($rowh['ans_326'])) + (intval($rowh['ans_316'])*intval($rowh['ans_327'])) 
          +(intval($rowh['ans_317'])*intval($rowh['ans_328']))+(intval($rowh['ans_318'])*intval($rowh['ans_329']))+(intval($rowh['ans_319']*intval($rowh['ans_330'])))
          +(intval($rowh['ans_320'])*intval($rowh['ans_331']))+(intval($rowh['ans_321'])*intval($rowh['ans_332']))+(intval($rowh['ans_322'])*intval($rowh['ans_333']))+
          (intval($rowh['ans_323'])*intval($rowh['ans_334']))+(intval($rowh['ans_324'])*intval($rowh['ans_335']))
          +(intval($rowh['ans_325'])*intval($rowh['ans_336']))
          );

          $data.="<td>".$inputseasonA."</td>";
          $data.="<td>".$inputseasonB."</td>";

         $data.="<td>".$rowh['ans_124']."</td>";
         $data.="<td>".$rowh['ans_131']."</td>";

         $data.="<td>".$rowh['ans_125']."</td>";
         $data.="<td>".$rowh['ans_132']."</td>";

         $data.="<td>".$rowh['ans_126']."</td>";
         $data.="<td>".$rowh['ans_133']."</td>";

         $data.="<td>".$rowh['ans_410']."</td>";
         $data.="<td>".$rowh['ans_477']."</td>";


        // //beans data........

         $data.="<td>".$rowh['ans_590']."</td>";
         $data.="<td>".$rowh['ans_598']."</td>";

        $inputseasonS1Beans=((intval($rowh['ans_739'])*intval($rowh['ans_750'])) + (intval($rowh['ans_740'])*intval($rowh['ans_751'])) 
          +(intval($rowh['ans_741'])*intval($rowh['ans_752']))+(intval($rowh['ans_742'])*intval($rowh['ans_753']))+(intval($rowh['ans_743']*intval($rowh['ans_754'])))
          +(intval($rowh['ans_744'])*intval($rowh['ans_755']))+(intval($rowh['ans_745'])*intval($rowh['ans_756']))+(intval($rowh['ans_746'])*intval($rowh['ans_757']))+
          (intval($rowh['ans_747'])*intval($rowh['ans_758']))+(intval($rowh['ans_748'])*intval($rowh['ans_759']))
          +(intval($rowh['ans_749'])*intval($rowh['ans_760']))
          );
        $inputseasonS2Beans=((intval($rowh['ans_784'])*intval($rowh['ans_795'])) + (intval($rowh['ans_785'])*intval($rowh['ans_796'])) 
          +(intval($rowh['ans_786'])*intval($rowh['ans_797']))+(intval($rowh['ans_787'])*intval($rowh['ans_798']))+(intval($rowh['ans_788']*intval($rowh['ans_799'])))
          +(intval($rowh['ans_789'])*intval($rowh['ans_800']))+(intval($rowh['ans_790'])*intval($rowh['ans_801']))+(intval($rowh['ans_791'])*intval($rowh['ans_802']))+
          (intval($rowh['ans_792'])*intval($rowh['ans_803']))+(intval($rowh['ans_793'])*intval($rowh['ans_804']))
          +(intval($rowh['ans_794'])*intval($rowh['ans_805']))
          );

          $data.="<td> ".$inputseasonS1Beans."</td>";
          $data.="<td>".$inputseasonS2Beans."</td>";

         $data.="<td>".$rowh['ans_593']."</td>";
         $data.="<td>".$rowh['ans_600']."</td>";

         $data.="<td>".$rowh['ans_594']."</td>";
         $data.="<td>".$rowh['ans_601']."</td>";

         $data.="<td>".$rowh['ans_595']."</td>";
         $data.="<td>".$rowh['ans_602']."</td>";

         $data.="<td>".$rowh['ans_879']."</td>";
         $data.="<td>".$rowh['ans_946']."</td>";



        // //coffee data......

         $data.="<td>".$rowh['ans_1062']."</td>";
         $data.="<td>".$rowh['ans_1070']."</td>";

        $inputseasonS1coffee=((intval($rowh['ans_1211'])*intval($rowh['ans_1222'])) + (intval($rowh['ans_1212'])*intval($rowh['ans_1223'])) 
          +(intval($rowh['ans_1213'])*intval($rowh['ans_1224']))+(intval($rowh['ans_1214'])*intval($rowh['ans_1225']))+(intval($rowh['ans_1215']*intval($rowh['ans_1226'])))
          +(intval($rowh['ans_1216'])*intval($rowh['ans_1227']))+(intval($rowh['ans_1217'])*intval($rowh['ans_1228']))+(intval($rowh['ans_1218'])*intval($rowh['ans_1229']))+
          (intval($rowh['ans_1219'])*intval($rowh['ans_1230']))+(intval($rowh['ans_1220'])*intval($rowh['ans_1231']))
          +(intval($rowh['ans_1232'])*intval($rowh['ans_1160']))
          );


        $inputseasonS2coffee=((intval($rowh['ans_1256'])*intval($rowh['ans_1267'])) + (intval($rowh['ans_1257'])*intval($rowh['ans_1268'])) 
          +(intval($rowh['ans_1258'])*intval($rowh['ans_1269']))+(intval($rowh['ans_1259'])*intval($rowh['ans_1270']))+(intval($rowh['ans_1260']*intval($rowh['ans_1271'])))
          +(intval($rowh['ans_1261'])*intval($rowh['ans_1272']))+(intval($rowh['ans_1262'])*intval($rowh['ans_1273']))+(intval($rowh['ans_1263'])*intval($rowh['ans_1274']))+
          (intval($rowh['ans_1264'])*intval($rowh['ans_1275']))+(intval($rowh['ans_1265'])*intval($rowh['ans_1276']))
          +(intval($rowh['ans_1266'])*intval($rowh['ans_1277']))
          );

         $data.="<td>".$inputseasonS1coffee."</td>";
         $data.="<td>".$inputseasonS2coffee."</td>";

         $data.="<td>".$rowh['ans_1065']."</td>";
         $data.="<td>".$rowh['ans_1072']."</td>";

         $data.="<td>".$rowh['ans_1066']."</td>";
         $data.="<td>".$rowh['ans_1073']."</td>";

         $data.="<td>".$rowh['ans_1067']."</td>";
         $data.="<td>".$rowh['ans_1074']."</td>";

         $data.="<td>".$rowh['ans_1351']."</td>";
         $data.="<td>".$rowh['ans_1418']."</td>";

      $n++;
    }
    
    //}
    //$data.="".noRecordsFound($new_query,10).""; 
    //====================end of displayed data===================
    // $data.="<tr>
    //   <td class='offwhite' COLSPAN='10' ALIGN='LEFT'>
    //     <input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
    //     <input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
    //     <input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form6(xajax.getFormValues('form6'));return false;\" value='edit' /> |
    //     <input type='button' value='Delete' class='red'  align='left'></td>
    //   </td>
    // </tr>";
       
    // /*
    // *display pages
    // */
    // $data.="<tr align='right'>
    //   <td colspan=10>";

    //     $p='';
    //     $num_links=10;
    //     $startAt_links=($cur_page-5);
    //     $endAt_links=($cur_page+$num_links);
    //     $cur_link=$cur_page;


    //     if($num_pages>1){
    //     $links=1;
    //     $append_bar=$p==$num_pages?"":"|";
    //     if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
    //     else $data.="<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
    //     //for($p=2;$p<$num_pages;$p++){
    //     $p=2;
    //     while($p<$num_pages){
    //     if(($p>$startAt_links) and ($p<$endAt_links)){
    //     $data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
    //     }
    //     $p++;
    //     }
    //     if($p==$num_pages){
    //     $data.="...<a href='#' onclick=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
    //     }
    //     }


    //     $data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_view_frm6Survey('".$_SESSION['dsName']."','".$_SESSION['hsName']."','".$_SESSION['fromDate']."','".$_SESSION['toDate']."','".$_SESSION['speriod']."','".$cur_page."',this.value)\">";
    //     $i=1;
    //     $selected="";
    //     while($i*10<=$max_records){
    //     $selected=$i*10==$records_per_page?"SELECTED":"";
    //     $data.="<option value='".($i*10)."' ".$selected.">".($i*10)."</option>";
    //     $i++;
    //     }

    //     $sel=$records_per_page>=$max_records?"SELECTED":"";
    //     $data.="<option value='".$max_records."' ".$sel.">All</option>";
    //     $data.="</select></br>
    //   </td>
    // </tr>
  $data.="</table>
</form>";
$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("hideLoadingDiv"); 
return $obj;


}






#************************************
$xajax->processRequest();

  ?>


<html lang='en' xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8">


    <?php $xajax->printJavascript('xajax_0.5/');

    ?>
    <script language="javascript" type="text/javascript" src="js/check.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/loading.css" rel="stylesheet" type="text/css"/>
    <title><?php heading($_GET['action']); ?></title>
	 <script type="text/javascript" src="js/jquery-2.1.4.js" language="javascript"></script>
    
</head>

<body>
<div align='center' id='dvLoading'><span
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Form Six Survey Data...</span></div>
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
					case"Form 6":
					?>
					xajax_view_form6();
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
<script type="text/javascript" src="js/number.js"></script>
<script type="text/javascript" src="js/addRow.js" language="javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js" language="javascript"></script>
<script type="text/javascript" src="js/loading.js" language="javascript"></script>
<script type="text/javascript" src="js/check.js" language="javascript"></script>
<script type="text/javascript" src="js/js.js" language="javascript"></script>   
<script type="text/javascript" src="js/sumRows.js" language="javascript"></script>
<script type="text/javascript" src="js/hoverRows.js" language="javascript"></script>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199">
</iframe>

</body>
</html>

