<?php
session_start();
require_once('connections/lib_connect.php');
require_once('filters.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);



#--------------SET UP EXPORTER------
$xajax->register(XAJAX_FUNCTION,'setup_exporter');
$xajax->register(XAJAX_FUNCTION,'new_exporter');
$xajax->register(XAJAX_FUNCTION,'save_exporter');
$xajax->register(XAJAX_FUNCTION,'edit_exporter');
$xajax->register(XAJAX_FUNCTION,'update_exporter');
$xajax->register(XAJAX_FUNCTION,'delete_exporter');

#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');
 
function setup_exporter($exName,$exCode,$cur_page=1,$records_per_page=20){

$obj =new xajaxResponse();
$qmobj = new QueryManager();
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$n=1;
$inc=1;

$_SESSION['exName']=$exName;
$_SESSION['exCode']=$exCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$exName=($_SESSION['exName']<>''?$_SESSION['exName']:$exName);
$exCode=($_SESSION['exCode']<>''?$_SESSION['exCode']:$exCode);



$data.="<form  name='exporter_setup_form' id='exporter_setup_form' method='post' action='".$PHP_SELF."'>
	<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";

		$data.="<tr>
			<td colspan='17'>
				<table width='100%'>
					<tr>
						<td>
							<div align='left'><strong>Exporter Name:</strong></div>
						</td>
						<td>
							<input type='text' name='exName' id='exName' />
						</td>				
							
						<td>
							<div align='left'><strong>Exporter Code:</strong></div>
						</td>
						<td>
							<input type='text' name='exCode' id='exCode' />
						</td>
						<td>
							<input name='search' type='button' class='formButton2' value='Go'
							onclick=\"xajax_setup_exporter(getElementById('exName').value,getElementById('exCode').value);return false;\" />
						
							<input name='new_exporter' type='button' class='formButton2' value='New Exporter' onclick=\"xajax_new_exporter('','','','','','','','','');\"> |
								<a href='export_to_excel_word.php?linkvar=Export Exporter
								&&exName=".$exName."
								&&exCode=".$exCode."
								&&cur_page=".$cur_page."
								&&records_per_page=".$records_per_page."
								&&format=excel'>
							<input name='export_exporter' type='button' class='formButton2'value='Export to Excel'></a> |
								<a href='print_version.php?linkvar=Print Exporter
								&&exName=".$exName."
								&&exCode=".$exCode."
								&&cur_page=".$cur_page."
								&&records_per_page=".$records_per_page."
								&&format=Print' target='_blank'>
							<input name='export_exporter' type='button' class='formButton2' value='Print Version'></a>
						</td>
					</tr>
				</table>
			</td>
		</tr>";

		$data.="<tr class='evenrow'>
		<th colspan='17'><div align='center'>EXPORTER DETAILS</div></th>
		</tr>";

		//===================data to be displayed=====================
		$data.="<tr>
			<th class='first-cell-header'>#</th>
			<th colspan='3' class='large-cell-header'>Name</th>
			<th class='small-cell-header'>Exporter Code</th>
			<th class='small-cell-header'>Exporter Crop</th>
			<th class='small-cell-header'>Date of recruitment</th>
			<th class='small-cell-header'>Exporter Contact</th>
			<th class='small-cell-header'>Region</th>
			<th class='large-cell-header'>District</th>
			<th class='large-cell-header'>Subcounty</th>
			<th colspan='2' class='large-cell-header'>Village</th>
			<th colspan='4' class='large-cell-header'>Action</th>
		</tr>";
				$query_string="SELECT 
				`x`.`tbl_exportersId`,
				`x`.`exporterName`,
				`x`.`exporterDob`, 
				`x`.`exporterCode`,
				`x`.`exporterSex`,
				`x`.`exporterDateRecruited`, 
				`x`.`exporterDistrict`,
				`x`.`exporterSubcounty`,
				`x`.`exporterVillage`,
				IF(left((`x`.`exporterTel`),8) = '+2560000', '-', (`x`.`exporterTel`)) as exporterTel,
				`x`.`exporterCropBeans`,
				`x`.`exporterCropCoffee`,
				`x`.`exporterCropMaize`,
				`d`.`districtName`,
				`s`.`districtCode`,
				`s`.`subcountyCode`,
				`s`.`subcountyName`, 
				z.`zoneName` , 
				z.`zoneCode` , 
				d.`districtName` , 
				s.`subcountyName`
				FROM `tbl_exporters` x, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s
				WHERE x.`exporterRegion` = z.`zoneCode`
				and x.display='Yes'";
				//Filter parameters
				if($exName<>'' and $exCode<>''){
				$query_string.="
				AND x.`exporterName` LIKE '%".$exName."%'
				AND x.`exporterCode` LIKE '%".$exCode."%' ";
				}elseif($exName<>'' and $exCode==''){
				$query_string.="AND x.`exporterName` LIKE '%".$exName."%' ";
				}elseif($exName=='' and $exCode<>''){
				$query_string.="AND x.`exporterCode` LIKE '%".$exCode."%' ";
				}                

				$query_string.="AND d.`districtCode` = s.`districtCode`
				AND x.`exporterDistrict` = d.`districtCode`
				AND x.`exporterSubcounty` = s.`subcountyCode`
				ORDER BY x.`tbl_exportersId` DESC";

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
				$x=$offset+1;
				$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
				$x=1;
		while($rowEx=mysql_fetch_array($new_query)){
		$color=$x%2==1?"evenrow3":"evenrow";
		$data.="
		<tr>
			<td>".$x.".<input type='hidden' name='tbl_exportersId[]' id='tbl_exportersId".$x."' value='".$rowEx['tbl_exportersId']."' />
			<input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/> 
			</td>
			<td  colspan=3>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterName']))."</td>
			<td align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterCode']))."</td>";
				$b=$rowEx['exporterCropBeans'];
				$c=$rowEx['exporterCropCoffee'];
				$m=$rowEx['exporterCropMaize'];
				$sanB=($b=='Yes')?"Beans,":"";
				$sanC=($c=='Yes')?"Coffee,":"";
				$sanM=($m=='Yes')?"Maize,":"";
				$cropString="".$sanB."".$sanC."".$sanM."";
				$exCrops=substr($cropString, 0, -1);
			$data.="<td align='right'>&nbsp;".$exCrops."</td>
			<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterDateRecruited']))."</td>
			<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterTel']))."</td>
			<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['zoneName']))."</td>
			<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['districtName']))."</td>
			<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['subcountyName']))."</td>
			<td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterVillage']))."</td>
			<td colspan='4'>
			<input type='button' class='formButton2' TITLE='Edit'
			onclick=\"xajax_edit_exporter('".$rowEx['zoneCode']."','".$rowEx['districtCode']."','".$rowEx['subcountyCode']."','".$rowEx['tbl_exportersId']."');return false;\" value='edit' />
			<input type='button' value='Delete' class='red' 
			onclick=\"ConfirmDelete(xajax.getFormValues('exporter'),'Delete_exporter');return false;\">
			</td>";
		$data.="</tr>";
		$x++;
		$inc++;
		}
		$data.="".noRecordsFound($new_query,10)."";
		//====================end of displayed data===================
				
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
			if ($cur_page==1)$data.="<a href='#' onclick=\"xajax_setup_exporter('".$_SESSION['exName']."','".$_SESSION['exCode']."','1','".$records_per_page."')\"><font color=red><b>1</b></font>\n</a>...".$append_bar;
			else $data.="<a href='#' onclick=\"xajax_setup_exporter('".$_SESSION['exName']."','".$_SESSION['exCode']."','1','".$records_per_page."')\">1\n</a>...".$append_bar;
			
			$p=2;
			while($p<$num_pages){
		if(($p>$startAt_links) and ($p<$endAt_links)){
				$data.=$p==$cur_page?"<font color=red><b>".$p."</b></font>".$append_bar:"<a href='#' onclick=\"xajax_setup_exporter('".$_SESSION['exName']."','".$_SESSION['exCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
			}
			$p++;
			}
			if($p==$num_pages){
					$data.="...<a href='#' onclick=\"xajax_setup_exporter('".$_SESSION['exName']."','".$_SESSION['exCode']."','".$p."','".$records_per_page."')\">".$p."\n</a>".$append_bar;
					}
		}


		$data.=" Records: <select name='num_rec' id='num_rec' onchange=\"xajax_setup_exporter('".$_SESSION['exName']."','".$_SESSION['exCode']."','".$cur_page."',this.value)\">";
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
function new_exporter($regionalCode,$districtCode,$subCounty,$village){

$obj=new xajaxResponse();
$QueryManager=new QueryManager('');
    
//sessional values to be ratained
$_SESSION['exporterName']=$exporterName;
$_SESSION['village']=$village;



$data="<form  name='exporter' id='exporter' method='post' action='".$PHP_SELF."'>";
$data.="
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' width='400'>
                <tr>
                  <th colspan='2' scope='col'>EXPORTER DETAILS</th>
                  </tr>
                
                
                <tr>
                  <td>Region:<br /></td>
                  <td><select name='exporterRegion' id='exporterRegion' style='width:100px;' onchange=\"xajax_new_exporter(this.value,
                       '".$districtCode."',
                       '".$subCounty."',
                       '".$village."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->regionalFilter($regionalCode); 
                    $data.="</select>      </td> 
                   </tr>
                   
                     <tr>
                  <td>District<br /></td>
                  <td><select name='exporterDistrict' id='exporterDistrict' style='width:100px;' onchange=\"xajax_new_exporter( '".$regionalCode."',
                       this.value,
                       '".$subCounty."',
                       '".$village."');return false;\" >
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->DistrictFilter($regionalCode,$districtCode);
                    $data.="</select></td>
                </tr>
                <tr>
                  <td>Subcounty<br /></td>
                  <td><select name='exporterSubcounty' id='exporterSubcounty' style='width:100px;' onchange=\"xajax_new_exporter('".$regionalCode."',
                       '".$districtCode."',
                       this.value,
                       '".$village."');return false;\">
                      <option value=''>-select-</option>";
                      $data.=$QueryManager->SubcountyFilter($regionalCode,$districtCode,$subCounty);
                    $data.="</select></td>
                </tr>
                <tr>
                  <td>Village<br /></td>
                  <td><input type='text' name='exporterVillage' id='exporterVillage' value='".$_SESSION['village']."' onchange=\"xajax_new_exporter('".$regionalCode."',
                       '".$districtCode."',
                       '".$subCounty."',
                       this.value);return false;\" /></td>
                </tr>
                
                <tr>
                  <td>Exporter Name:<br /></td>
                  <td>
                    <input type='text' name='exporterName' id='exporterName' value='".$_SESSION['exporterName']."'/></td>
                </tr>
                
                <tr>
                  <td>Date of birth/Business Commencement:<br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.exporter.exporterDob);return false;\" hidefocus=''>
                    <input name='exporterDob' id='exporterDob' size='15'  readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Date of Recruitment:<br /></td>
                  <td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.exporter.exporterDateRecruited);return false;\" hidefocus=''>
                    <input name='exporterDateRecruited' id='exporterDateRecruited' size='15'   readonly='readonly' type='text'>
                    <img src='WeekPicker/calbtn.gif' alt='' name='popcal' id='popcal' align='absmiddle' border='0' height='22' width='34'></a></td>
                </tr>
                <tr>
                  <td>Exporter Code:<br /></td>
                  <td><input type='text' name='exporterCode' id='exporterCode' /></td>
                </tr>
                <tr>
                  <td>Telephone:<br /></td>
                  <td><input type='text' name='exporterTel' id='exporterTel' value='+256' maxlength='13' /></td>
                </tr>
                <tr>
                  <td>Gender <i>(Consider majority if a Business)</i>:<br /></td>
                  <td><select name='exporterSex' id='exporterSex' style='width:100px;'>
                    <option value=''>-select-</option>";
                    $gender=array('Male','Female');
                                        $i = 0; 
                                        foreach ($gender as $v) {
                                            $selected=($exporterSex==$v)?"selected":"";
                                            $data.="<option value=\"".$v."\" ".$selected.">".$v."</option>";
                                            $i++;
                                        }
                    
                      $data.="</select>";
                      $data.="</td>
                </tr>
                
                <tr>
                  <td>Location:</td>
                  <td><select name='exporterLocation' id='exporterLocation' style='width:100px;'>
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
                  <td><input value='Save' name='saveVillageAgent' onclick=\"loadingIcon(xajax.getFormValues('exporter'),'save_exporter');return false;\" type='button'></td>
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
function save_exporter($formvalues){
$obj=new xajaxResponse();
//$obj->addAlert('Hello World');

$exporterName=$formvalues['exporterName'];
$exporterDob=$formvalues['exporterDob'];
$exporterCode=$formvalues['exporterCode'];
$exporterTel=$formvalues['exporterTel'];
$exporterSex=$formvalues['exporterSex'];
$exporterLocation=$formvalues['exporterLocation'];
$exporterDateRecruited=$formvalues['exporterDateRecruited'];
$exporterRegion=$formvalues['exporterRegion'];
$exporterDistrict=$formvalues['exporterDistrict'];
$exporterSubcounty=$formvalues['exporterSubcounty'];
$exporterVillage=$formvalues['exporterVillage'];
$beans=$formvalues['Beans'];
$coffee=$formvalues['Coffee'];
$maize=$formvalues['Maize'];

$stmnt_Ex="INSERT INTO `tbl_exporters`(`exporterName`,`exporterDob`, `exporterCode`,
                                            `exporterTel`, `exporterSex`,`exporterLocation`,
                                            `exporterDateRecruited`, `exporterRegion`,
                                            `exporterDistrict`, `exporterSubcounty`,
                                            `exporterVillage`, `exporterCropBeans`,
                                            `exporterCropCoffee`, `exporterCropMaize`)
                                            VALUES
                                            ('".$exporterName."','".$exporterDob."','".$exporterCode."',
                                            '".$exporterTel."','".$exporterSex."','".$exporterLocation."',
                                            '".$exporterDateRecruited."','".$exporterRegion."',
                                            '".$exporterDistrict."','".$exporterSubcounty."',
                                            '".$exporterVillage."','".$beans."',
                                            '".$coffee."','".$maize."')";
 //$obj->addAlert($stmnt_Va);                                           
@mysql_query($stmnt_Ex)or die(http(388));
$obj->call("hidemyLoaderDiv"); 
$obj->assign('bodyDisplay','innerHTML',congMsg("Exporter has been added successfully!"));
$obj->call('xajax_setup_exporter','','',1,20);
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
<div align='center' height='900' id='dvLoading'><span style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading Content...</span></div>

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
			case "exporters": 
		?>
			  xajax_setup_exporter('','',1,20);
		  
		<?php
				  
		  break;
		  
		  default:
				  
			   #underConstruction("Under Construction!");
				   
				   }
			  
		?>
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
