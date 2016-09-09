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
			<th colspan='46' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA</th>
		</tr>

		<tr>
			<td class='offwhite' COLSPAN='46' ALIGN='LEFT'>
				<input type='button' class='formButton2'onclick=\"multiCheckBox('checked');return false;\" value='check all' /> |
				<input type='button' class='formButton2'onclick=\"multiCheckBox('');return false;\" value='uncheck all' /> |
				<input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form6(xajax.getFormValues('form6'));return false;\" value='edit' /> |
				<input type='button' value='Delete' class='red'  align='left'></td>
			</td>
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


	//	$query_=mysql_query($query_string_farmers)or die(mysql_error());
		/**************
		*paging parameters
		*
		****/
		//while($row=mysql_fetch_array($query_)){
			$query_string="select p . * ,z.zoneName
			FROM `tbl_form6_survey_data` as `p`
			left  join tbl_zone z on(z.zoneCode = p.ans_23)
			";

		//$obj->alert($query_string);

		
			
			$new_query=mysql_query($query_string) or die(mysql_error());
			$n=1;
			while($rowh=mysql_fetch_array($new_query)){

			
			$data.="<tr>";
			$data.="<td>".$n.".";
					$data.="<input type='checkbox'  name='pk_patId[]' id='pk_patId".$n."' value='".$rowh['Id']."'/>
					<input name='loopkey[]' id='loopkey".$n."' type='hidden' value='1'/>";
				$data.="</td>";
				
				 $data.="<td>".$rowh['zoneName']."</td>";
				 $data.="<td>".$rowh['ans_24']."</td>";
				 $data.="<td>".$rowh['ans_25']."</td>";
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

function calc_totalHousehold($female,$male,$total){
$obj=new xajaxResponse();
$totalValue=0;
$totalValue=($female+$male);
$obj->assign($total,'value',$totalValue);
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
$obj->call('xajax_view_frm6Survey','','','','','',1,20);
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


