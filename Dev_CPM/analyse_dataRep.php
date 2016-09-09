<?php
session_start();
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');
require_once('filters.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);

#registering functions
#************************
$xajax->register(XAJAX_FUNCTION,'view_dataAnalysis');
$xajax->register(XAJAX_FUNCTION,'view_Duplicates');
$xajax->register(XAJAX_FUNCTION,'view_Partial');
$xajax->register(XAJAX_FUNCTION,'view_Tot');
$xajax->register(XAJAX_FUNCTION,'clean_form1_duplicates');
$xajax->register(XAJAX_FUNCTION,'clean_form3_duplicates');
$xajax->register(XAJAX_FUNCTION,'clean_form4_duplicates');
$xajax->register(XAJAX_FUNCTION,'clean_form6_duplicates');
$xajax->register(XAJAX_FUNCTION,'clean_form7_duplicates');
#************************************************
require_once('edit.php');
require_once('save.php');
require_once('delete.php');

function  view_dataAnalysis($dataForm,$rPeriod,$loader){
$obj=new xajaxResponse();
$qmobj=new QueryManager('');
$vmobj=new ValidationManager('');

if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
}

$_SESSION['dataForm']=$dataForm;
$_SESSION['rPeriod']=$rPeriod;
$_SESSION['loader']=$loader;

$dataForm=($_SESSION['dataForm']<>''?$_SESSION['dataForm']:$dataForm);
$rPeriod=($_SESSION['rPeriod']<>''?$_SESSION['rPeriod']:$rPeriod);
$loader=($_SESSION['loader']<>''?$_SESSION['loader']:$loader);

$divDuplicates="vwDuplicates";
$divPartial="vwPartial";
$divTot="vwTot";


$data="<form  name='analysis' id='analysis' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' border='0'>";
$data.="<tr class='evenrow'>
		<td>
			<select name='dataform' id='dataform' class='dataFilter'
			onchange=\"loadingIconDataform(this.value,'".$rPeriod."','data_form_loader');return false;\">
			<option default>-select Data Form-</option>";
			$data.=$vmobj->filter_dataForm($dataForm);
			$data.="</select>
		</td>
	</tr>
";

	if ($dataForm == 'form2'){
		
		$data.="<tr class='evenrow'>
			<td>
				<select name='form2_dataForm' id='form2_dataForm' class='dataFilter'
				onchange=\"loadingIconDataform(this.value,'".$rPeriod."','data_form_loader');return false;\">
				<option default>-select Data Form-</option>";
				$data.=$vmobj->filter_form2_dataForm($dataForm);
				$data.="</select>
			</td>
		</tr>
	";
}

$data.="<tr class='evenrow'>
		<td>
			<select name='rperiod' id='rperiod' class='dataFilter'
			onchange=\"xajax_view_dataAnalysis('".$dataForm."',this.value)\">
			<option default>-Reporting Period-</option>";
			$data.=$vmobj->filter_rPeriod($rPeriod);
			$data.="</select>
		</td>
	</tr>";
	

	
	$data.="<tr>
		<td>&nbsp;&nbsp;</td>
	</tr>";
	
	
	$data.="<div align='center' height='900' id='dataFormLoader' style='display:none;'><span style='font-size:24px; color:black; font-weight:bold;'>Loading analysis report...</span></div>";
   
	if(empty($dataForm) || ($dataForm == '')){
		$data.="<tr class='evenrow'>
		<td style='color:white; font-size:28px;'>Filter Data Form to perform analysis.</td>
		</tr>";
	}else{
	$data.="<tr>
		<td>";
			$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";

				$data.="<tr>
					<th colspan='4' scope='col' align='center'>ANALYSIS Results</th>
				</tr>";

				$data.="<tr class='white1'>
					<td colspan='2'><strong>Data Form:</strong><br /></td>
					<td align='right'><b>".$dataForm."</b></td>
					<td></td>
				</tr>";
				
				
				
				$data.="<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Suspected duplicate Records:</strong><br /></td>";
					switch($dataForm){
						case "form1":
						$qStmnt=$vmobj->form1Duplicates($myQuery='');
						$totPartialRecords = $vmobj->sumform1Partials($value);
						$totRecordSubmissions = $vmobj->form1TotSubmissions($value);
						break;
						
						case "form2":
						break;
						
						case "form3":
						$qStmnt=$vmobj->form3Duplicates($myQuery='');
						$totPartialRecords = $vmobj->sumform3Partials($value);
						$totRecordSubmissions = $vmobj->form3TotSubmissions($value);
						break;
						
						case "form4":
						$qStmnt=$vmobj->form4Duplicates($myQuery='');
						$totPartialRecords = $vmobj->sumform4Partials($value);
						$totRecordSubmissions = $vmobj->form4TotSubmissions($value);
						break;
						
						case "form6":
						$qStmnt=$vmobj->form6Duplicates($myQuery='');
						$totPartialRecords = $vmobj->sumform6Partials($value);
						$totRecordSubmissions = $vmobj->form6TotSubmissions($value);
						break;
						
						case "form7":
						$qStmnt=$vmobj->form7Duplicates($myQuery='');
						$totPartialRecords = $vmobj->sumform7Partials($value);
						$totRecordSubmissions = $vmobj->form7TotSubmissions($value);
						break;
						
						default:
						break;
						
					
					}
					
					$duplicates = $vmobj->queryRecordsCount($qStmnt);
					
					$data.="<td align='right'>".number_format($duplicates)."</td> 
					<td><input type='button' class='formButton2' onclick=\"xajax_view_Duplicates(getElementById('dataform').value,getElementById('rperiod').value,'".$divDuplicates."');return false;\" value='click to clean' /></td>
				</tr>";
				
				

				$data.="<tr class='white1'>
					<td colspan='2'><strong>Partial records:</strong><br /></td>
					<td align='right'> &#8776;".number_format($totPartialRecords)."</td>
					<td><input type='button' align='center' class='formButton2' onclick=\"xajax_view_Partial(getElementById('dataform').value,getElementById('rperiod').value,'".$divPartial."');return false;\" value='click to clean' /></td>
				</tr>";
				
				
				
				
		
				$data.="<tr class='ftfRpLevelTwo'>
					<td colspan='2'><strong>Total Record Submissions</strong><br /></td>
					<td align='right' colspan='2'>".number_format($totRecordSubmissions)."</td>";
					
				$data.="</tr>";
				
				

			$data.="</table>";
			
			
			$data.="<div id='".$divDuplicates."'></div>";
			$data.="<div id='".$divPartial."'></div>";
			
			
			
		$data.="</td>";
	$data.="</tr>";
	}
$data.="</table>";


$data.="</form>";

$obj->assign('bodyDisplay','innerHTML',$data);
$obj->call("shadeBgOnCheck"); 
$obj->call("hideDataFormLoaderDiv"); 
$obj->call("hideLoadingDiv");
return $obj;
}
function view_Duplicates($dForm,$rPeriod,$divDuplicates){

$obj=new xajaxResponse();
$qmobj=new QueryManager('');
$vmobj=new ValidationManager('');


 
$data="<form  name='analysis' id='analysis' method='post' action='".$PHP_SELF."'>";
$data.="
<fieldset>
<legend><h2>ANALYSIS: ".$dForm." Duplicate Records</h2></legend>";
$data.="<table width='600' border='0'>
        <tr>
            <td>";
			
			switch($dForm){
			case "form1":
			
            $data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form1');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                $data.="<tr>";
					$data.="<th>#</th>";
					$data.="<th>ParticipantName</th>";
					$data.="<th>trainingDate</th>";
					$data.="<th>age</th>";
					$data.="<th>sex</th>";
					$data.="<th>status</th>";
					$data.="<th>village</th>";
					$data.="<th>IndividualType</th>";
					$data.="<th>telephone</th>";
					
					
                $data.="</tr>";
				
				
				  
				$y=$vmobj->form1Duplicates($myQuery='');
				$qResults=Execute($y) or die(http(__line__)); 
				$x=1;
                while($row=FetchRecords($qResults)){
					$colorClass=$x%2==1?"ftfRpLevelTwo":"white1";
						$data.="<tr class='".$colorClass."'>";
							$data.="<td>".$x.".";
							$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
							$data.="<input name='tbl_participantId[]' type='checkbox' id='tbl_participantId".$x."' size='25' value='".$row['tbl_participantId']."'/>";
							$data.="</td>";
							$data.="<td>".$row['name']."</td>";
							$data.="<td>".$row['trainingDate']."</td>";
							$data.="<td>".$row['age']."</td>";
							$data.="<td>".$row['sex']."</td>";
							$data.="<td>".$row['status']."</td>";
							$data.="<td>".$row['village']."</td>";
							$data.="<td>".$row['IndividualType']."</td>";
							$data.="<td>".$row['telephone']."</td>";
				
						$data.="</tr>";
					$x++;
				}
				$data.="".noRecordsFound($qResults,10)."";
				// end of additional columns
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form1');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				$data.="</table>";
				break;
				
				case "form2":
				break;
				
				case "form3":
				$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_exporters_form3');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                $data.="<tr>";
					$data.="<th>#</th>";
					$data.="<th>Exporter Name</th>";
					$data.="<th>year</th>";
					$data.="<th>reportingPeriod</th>"; 
					$data.="<th>vaSupplyChain</th>"; 
					$data.="<th>numCbo</th>";
					$data.="<th>volMaizePurchased</th>";
					$data.="<th>volCoffeePurchased</th>"; 
					$data.="<th>volBeansPurchased</th>"; 
					$data.="<th>volMaizeEx</th>";
					$data.="<th>volCoffeeEx</th>";
					$data.="<th>volBeansEx</th>"; 
					$data.="<th>epayRecieved</th>"; 
					$data.="<th>epayMade</th>";
					$data.="<th>storageCapNew</th>";
					$data.="<th>storageCapImproved</th>";
					$data.="<th>CompiledBy</th>"; 
					$data.="<th>personInterviewed</th>"; 
					$data.="<th>telephoneInterviewed</th>";
					$data.="<th>titleCompiledBy</th>"; 
					$data.="<th>titleOfPersonInterviewed</th>";
					
					
                $data.="</tr>";
				
				
				  
				$y=$vmobj->form3Duplicates($myQuery='');
				$qResults=Execute($y) or die(http(__line__)); 
				$x=1;
                while($row=FetchRecords($qResults)){
					$colorClass=$x%2==1?"ftfRpLevelTwo":"white1";
						$data.="<tr class='".$colorClass."'>";
							$data.="<td>".$x.".";
							$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
							$data.="<input name='tbl_form3_exportersId[]' type='checkbox' id='tbl_form3_exportersId".$x."' size='25' value='".$row['tbl_form3_exportersId']."'/>";
							$data.="</td>";
							$data.="<td>".$row['exporterName']."</td>";
									$data.="<td>".$row['year']."</td>";
									$data.="<td>".$row['reportingPeriod']."</td>"; 
									$data.="<td align='right'>".number_format($row['exTradersSupplyChain'])."</td>"; 
									$data.="<td align='right'>".number_format($row['exUnionSupplyChain'])."</td>";
									$data.="<td align='right'>".number_format($row['volMaizePurchased'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeePurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volBeansPurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volMaizeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volBeansEx'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayRecieved'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayMade'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapNew'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapImproved'])."</td>";
									$data.="<td>".$row['CompiledBy']."</td>"; 
									$data.="<td>".$row['personInterviewed']."</td>"; 
									$data.="<td>".$row['telephoneInterviewed']."</td>";
									$data.="<td>".$row['titleCompiledBy']."</td>"; 
									$data.="<td>".$row['titleOfPersonInterviewed']."</td>";
				
						$data.="</tr>";
					$x++;
				}
				$data.="".noRecordsFound($qResults,10)."";
				// end of additional columns
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_exporters_form3');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                
              
                $data.="</table>";
				break;
				
				case "form4":
				$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_traders_form4');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                $data.="<tr>";
					$data.="<th>#</th>";
					$data.="<th>Trader Name</th>";
					$data.="<th>year</th>";
					$data.="<th>reportingPeriod</th>"; 
					$data.="<th>vaSupplyChain</th>"; 
					$data.="<th>numCbo</th>";
					$data.="<th>volMaizePurchased</th>";
					$data.="<th>volCoffeePurchased</th>"; 
					$data.="<th>volBeansPurchased</th>"; 
					$data.="<th>volMaizeEx</th>";
					$data.="<th>volCoffeeEx</th>";
					$data.="<th>volBeansEx</th>"; 
					$data.="<th>epayRecieved</th>"; 
					$data.="<th>epayMade</th>";
					$data.="<th>storageCapNew</th>";
					$data.="<th>storageCapImproved</th>";
					$data.="<th>CompiledBy</th>"; 
					$data.="<th>personInterviewed</th>"; 
					$data.="<th>telephoneInterviewed</th>";
					$data.="<th>titleCompiledBy</th>"; 
					$data.="<th>titleOfPersonInterviewed</th>";
					
					
                $data.="</tr>";
				
				
				  
				$y=$vmobj->form4Duplicates($myQuery='');
				$qResults=Execute($y) or die(mysql_error()." on line 303"); 
				$x=1;
                while($row=FetchRecords($qResults)){
					$colorClass=$x%2==1?"ftfRpLevelTwo":"white1";
						$data.="<tr class='".$colorClass."'>";
							$data.="<td>".$x.".";
							$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
							$data.="<input name='tbl_form4_tradersId[]' type='checkbox' id='tbl_form4_tradersId".$x."' size='25' value='".$row['tbl_form4_tradersId']."'/>";
							$data.="</td>";
							$data.="<td>".$row['traderName']."</td>";
							$data.="<td align='right'>".$row['year']."</td>";
							$data.="<td>".$row['reportingPeriod']."</td>"; 
							$data.="<td align='right'>".$row['vaSupplyChain']."</td>"; 
							$data.="<td align='right'>".number_format($row['numCbo'])."</td>";
							$data.="<td align='right'>".number_format($row['volMaizePurchased'])."</td>";
							$data.="<td align='right'>".number_format($row['volCoffeePurchased'])."</td>"; 
							$data.="<td align='right'>".number_format($row['volBeansPurchased'])."</td>"; 
							$data.="<td align='right'>".number_format($row['volMaizeEx'])."</td>";
							$data.="<td align='right'>".number_format($row['volCoffeeEx'])."</td>";
							$data.="<td align='right'>".number_format($row['volBeansEx'])."</td>"; 
							$data.="<td align='right'>".number_format($row['epayRecieved'])."</td>"; 
							$data.="<td align='right'>".number_format($row['epayMade'])."</td>";
							$data.="<td align='right'>".number_format($row['storageCapNew'])."</td>";
							$data.="<td align='right'>".number_format($row['storageCapImproved'])."</td>";
							$data.="<td>".$row['CompiledBy']."</td>"; 
							$data.="<td>".$row['personInterviewed']."</td>"; 
							$data.="<td align='right'>".$row['telephoneInterviewed']."</td>";
							$data.="<td>".$row['titleCompiledBy']."</td>"; 
							$data.="<td>".$row['titleOfPersonInterviewed']."</td>";
				
						$data.="</tr>";
					$x++;
				}
				$data.="".noRecordsFound($qResults,10)."";
				// end of additional columns
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_traders_form4');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                
              
                $data.="</table>";
				break;
				
				case "form6":
				$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form6');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                $data.="<tr>";
					$data.="<th>#</th>";
					$data.="<th>nameOfFarmer</th>";
					$data.="<th>farmer_code</th>";  
					$data.="<th>interview_date</th>";
					$data.="<th>respondent</th>"; 
					$data.="<th>farmer_crop_maize</th>"; 
					$data.="<th>farmer_crop_beans</th>";
					$data.="<th>farmer_crop_coffee</th>"; 
					$data.="<th>loan_access</th>"; 
					$data.="<th>loan_accessed</th>";
					$data.="<th>implemented_mgt_climate</th>"; 
					$data.="<th>implemented_mgt_climate_action</th>";
					$data.="<th>implemented_mgt_climate_action_other</th>";
					$data.="<th>gps</th>"; 
					$data.="<th>compiled_by</th>"; 
					$data.="<th>va</th>"; 
					$data.="<th>telephone</th>";
					$data.="<th>readtime</th>";
					
                $data.="</tr>";
				
				
				  
				$y=$vmobj->form6Duplicates($myQuery='');
				$qResults=Execute($y) or die(http(__line__)); 
				$x=1;
                while($row=FetchRecords($qResults)){
					$colorClass=$x%2==1?"ftfRpLevelTwo":"white1";
						$data.="<tr class='".$colorClass."'>";
							$data.="<td>".$x.".";
							$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
							$data.="<input name='pk_patId[]' type='checkbox' id='pk_patId".$x."' size='25' value='".$row['pk_patId']."'/>";
							$data.="</td>";
							$data.="<td>".$row['nameOfFarmer']."</td>";
							$data.="<td>".$row['farmer_code']."</td>";  
							$data.="<td>".$row['interview_date']."</td>";
							$data.="<td>".$row['respondent']."</td>"; 
							$data.="<td>".$row['farmer_crop_maize']."</td>"; 
							$data.="<td>".$row['farmer_crop_beans']."</td>";
							$data.="<td>".$row['farmer_crop_coffee']."</td>"; 
							$data.="<td>".$row['loan_access']."</td>"; 
							$data.="<td>".$row['loan_accessed']."</td>";
							$data.="<td>".$row['implemented_mgt_climate']."</td>"; 
							$data.="<td>".$row['implemented_mgt_climate_action']."</td>";
							$data.="<td>".$row['implemented_mgt_climate_action_other']."</td>";
							$data.="<td>".$row['gps']."</td>"; 
							$data.="<td>".$row['compiled_by']."</td>"; 
							$data.="<td>".$row['va']."</td>"; 
							$data.="<td>".$row['telephone']."</td>";
							$data.="<td>".$row['readtime']."</td>";
				
						$data.="</tr>";
					$x++;
				}
				$data.="".noRecordsFound($qResults,10)."";
				// end of additional columns
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form6');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                
              
                $data.="</table>";
				break;
				
				case "form7":
				$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form7');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                $data.="<tr>";
					$data.="<th>#</th>";
					$data.="<th>farmersName</th>"; 
					$data.="<th>reportingPeriod</th>";
					$data.="<th>memberDstart</th>";
					$data.="<th>farmersVillage</th>";
					$data.="<th>farmersSex</th>";
					$data.="<th>farmersTel</th>"; 
					$data.="<th>hhName</th>"; 
					$data.="<th>hhDob</th>";
					$data.="<th>hhSex</th>";
					$data.="<th>hhHeadDStart</th>";
					$data.="<th>traderName</th>";
					$data.="<th>traderCode</th>";
					$data.="<th>vAgentName</th>";
					$data.="<th>vAgentCode</th>";
					
                $data.="</tr>";
				
				
				  
				$y=$vmobj->form7Duplicates($myQuery='');
				$qResults=Execute($y) or die(http(__line__)); 
				$x=1;
                while($row=FetchRecords($qResults)){
					$colorClass=$x%2==1?"ftfRpLevelTwo":"white1";
						$data.="<tr class='".$colorClass."'>";
							$data.="<td>".$x.".";
							$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
							$data.="<input name='tbl_farmersId[]' type='checkbox' id='tbl_farmersId".$x."' size='25' value='".$row['tbl_farmersId']."'/>";
							$data.="</td>";
							$data.="<td>".$row['farmersName']."</td>"; 
							$data.="<td>".$row['reportingPeriod']."</td>";
							$data.="<td>".$row['memberDstart']."</td>";
							$data.="<td>".$row['farmersVillage']."</td>";
							$data.="<td>".$row['farmersSex']."</td>";
							$data.="<td>".$row['farmersTel']."</td>"; 
							$data.="<td>".$row['hhName']."</td>"; 
							$data.="<td>".$row['hhDob']."</td>";
							$data.="<td>".$row['hhSex']."</td>";
							$data.="<td>".$row['hhHeadDStart']."</td>";
							$data.="<td>".$row['traderName']."</td>";
							$data.="<td>".$row['traderCode']."</td>";
							$data.="<td>".$row['vAgentName']."</td>";
							$data.="<td>".$row['vAgentCode']."</td>";
				
						$data.="</tr>";
					$x++;
				}
				$data.="".noRecordsFound($qResults,10)."";
				// end of additional columns
				
				$data.="<tr>
					<td class='offwhite' colspan='22' align='left'>";
						$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
						<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form7');return false;\" align='left'></td>";
					$data.="</td>
				</tr>";
				
                
              
                $data.="</table>";
				break;
				
				default:
				$data.="<table border='0' cellpadding='1' cellspacing='1' width='100%'>";
                $data.="<tr>";
					$data.="<td>No Data found!!</td>";
                $data.="</tr>";
				$data.="</table>";
				break;
}
				
				$data.="</fieldset>";
              
			  
              
    $data.="</td>";
        $data.="</tr>";
  
$data.="</table>";
$data.="</form>";

$obj->assign($divDuplicates,'innerHTML',$data); 
return $obj;
}
function clean_form3_duplicates($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['tbl_form3_exportersId']);$x++){
	
	
	$sql="update tbl_form3_exporters set display='No' where  tbl_form3_exportersId='".$formValues['tbl_form3_exportersId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a record on form3 Exporters tbl_form3_exportersId->".$formValues['tbl_form3_exportersId'][$x]."";  
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";


@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form3 Exporter Record(s) successfully Cleaned"));
$obj->call('xajax_view_dataAnalysis','','','');
return $obj;
}//-----------------------------------------------------------End of function clean_traders_form4-----------------------------------------
function clean_form4_duplicates($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['tbl_form4_tradersId']);$x++){
	
	
	$sql="update tbl_form4_traders set display='No' where  tbl_form4_tradersId='".$formValues['tbl_form4_tradersId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a record on form4 Traders tbl_form4_tradersId->".$formValues['tbl_form4_tradersId'][$x]."";  
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";


@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form4 Trader Record(s) successfully Cleaned"));
$obj->call('xajax_view_dataAnalysis','','','','');
return $obj;
}//-----------------------------------------------------------End of function clean_traders_form4-----------------------------------------
function clean_form6_duplicates($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['pk_patId']);$x++){
	
	
	$sql="update tbl_frm6particulars set display='No' where  pk_patId='".$formValues['pk_patId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a record on form6 Survey pk_patId->".$formValues['pk_patId'][$x]."";  
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";


@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form6 Survey Record(s) successfully Cleaned"));
$obj->call('xajax_view_dataAnalysis','','','');
return $obj;
}//-----------------------------------------------------------End of function clean_traders_form4-----------------------------------------
function clean_form7_duplicates($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['tbl_farmersId']);$x++){
	
	
	$sql="update tbl_farmers set display='No' where  tbl_farmersId='".$formValues['tbl_farmersId'][$x]."' "; 
	//$obj->alert($sql);
if($sql<>''){
	
//log user Action

$action = "Deleted a farmer record on form7 tbl_farmersId->".$formValues['tbl_farmersId'][$x]."";  
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";


@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Form7 Farmer Record(s) successfully Cleaned"));
$obj->call('xajax_view_dataAnalysis','','','');
return $obj;
}//-----------------------------------------------------------End of function clean_traders_form4-----------------------------------------
function clean_form1_duplicates($formValues){
$obj=new xajaxResponse();

if(count($formValues['loopkey'])>0){
for($x=0;$x<count($formValues['tbl_participantId']);$x++){
	
	
	$sql="update tbl_participants set display='No' where  tbl_participantId='".$formValues['tbl_participantId'][$x]."' "; 
	/* $obj->alert($sql); */
if($sql<>''){
	
//log user Action

$action = "Deleted a Training Participant Record on form1 tbl_participantId->".$formValues['tbl_participantId'][$x]."";  
$description=mysql_real_escape_string($sql);

$stmnt="INSERT INTO `tbl_usertrack`(`username`, `action`, `description`) VALUES ('".$_SESSION['username']."','".$action."','".$description."')";


@mysql_query($stmnt) or die(http(__line__));
@mysql_query($sql) or die(http(__line__));


}
}
}

$obj->assign('bodyDisplay','innerHTML',QueryManager::noteMsg("Participant Record(s) successfully Cleaned"));
$obj->call('xajax_view_dataAnalysis','','','');
return $obj;
}//-----------------------------------------------------------End of function clean_traders_form4-----------------------------------------
function view_Partial($dForm,$rPeriod,$divPartial){

$obj=new xajaxResponse();
$qmobj=new QueryManager('');
$vmobj=new ValidationManager('');
    
$data="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="
<fieldset>
<legend><h2>Partial Records</h2></legend>
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' cellpadding='1' cellspacing='1' width='400'>
                <tr>
                  <th colspan='20' scope='col'>".$dForm." ANALYSIS: Partial Records</th>
                  </tr>";
				  
				  switch($dForm){
					  //start form1
				  case "form1":
				 
					  $data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form1');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
					
					  $data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Unknown \"Training Participant Age\"</b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>ParticipantName</th>";
								$data.="<th>trainingDate</th>";
								$data.="<th>age</th>";
								$data.="<th>sex</th>";
								$data.="<th>status</th>";
								$data.="<th>village</th>";
								$data.="<th>IndividualType</th>";
								$data.="<th>telephone</th>";
							
					  $data.="</tr>";
						
						//unknown participant age
					$stCond = "select 
								`p`.`tbl_participantId`,
								`p`.`name`,
								`t`.`trainingDate`,
								`p`.`age`,
								`p`.`sex`,
								`p`.`status`, 
								`p`.`village`, 
								`l`.`codeName` as `IndividualType`,
								`p`.`telephone`
								from (`tbl_participants` as `p`, `tbl_training` as `t`, `tbl_lookup`  as `l` )
								where `p`.`trainingId`=`t`.`tbl_trainingId`
								and `p`.`typeOfIndividual` = `l`.`code`
								and `l`.`classCode` = '25'
								and  `t`.`trainingDate` >= '2013-10-01'
								and  `p`.`display` = 'Yes'
								and `p`.`age` <= 0
								order by `p`.`name` asc";
			
					$qCond = @Execute($stCond) or die(http(__line__));
					$t=1;	
					while ($row = @FetchRecords($qCond)){
					$colorClass=$t%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_participantId[]' type='checkbox' id='tbl_participantId".$t."' size='25' value='".$row['tbl_participantId']."'/>";
								$data.="</td>";
								$data.="<td>".$row['name']."</td>";
								$data.="<td>".$row['trainingDate']."</td>";
								$data.="<td>".$row['age']."</td>";
								$data.="<td>".$row['sex']."</td>";
								$data.="<td>".$row['status']."</td>";
								$data.="<td>".$row['village']."</td>";
								$data.="<td>".$row['IndividualType']."</td>";
								$data.="<td>".$row['telephone']."</td>";
								
								
					  $data.="</tr>";
						$t++;
					}
					$data.="".noRecordsFound($qCond,10)."";
					// end of additional columns
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Unknown \"Participant Name\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>ParticipantName</th>";
								$data.="<th>trainingDate</th>";
								$data.="<th>age</th>";
								$data.="<th>sex</th>";
								$data.="<th>status</th>";
								$data.="<th>village</th>";
								$data.="<th>IndividualType</th>";
								$data.="<th>telephone</th>";
								
					  $data.="</tr>";
						
						//Unknown Participant Name
					$stCond2 = "select 
								`p`.`tbl_participantId`,
								`p`.`name`,
								`t`.`trainingDate`,
								`p`.`age`,
								`p`.`sex`,
								`p`.`status`, 
								`p`.`village`, 
								`l`.`codeName` as `IndividualType`,
								`p`.`telephone`
								from (`tbl_participants` as `p`, `tbl_training` as `t`, `tbl_lookup`  as `l` )
								where `p`.`trainingId`=`t`.`tbl_trainingId`
								and `p`.`typeOfIndividual` = `l`.`code`
								and `l`.`classCode` = '25'
								and  `t`.`trainingDate` >= '2013-10-01'
								and  `p`.`display` = 'Yes'
								and `p`.`name` <= 2
								order by `p`.`name` asc";
			
					$qCond2 = @Execute($stCond2) or die(http(__line__));
					$t2=1;	
					while ($row2 = @FetchRecords($qCond2)){
					$colorClass=$t2%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t2.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_participantId[]' type='checkbox' id='tbl_participantId".$t2."' size='25' value='".$row2['tbl_participantId']."'/>";
								$data.="</td>";
								$data.="<td>".$row2['name']."</td>";
								$data.="<td>".$row2['trainingDate']."</td>";
								$data.="<td>".$row2['age']."</td>";
								$data.="<td>".$row2['sex']."</td>";
								$data.="<td>".$row2['status']."</td>";
								$data.="<td>".$row2['village']."</td>";
								$data.="<td>".$row2['IndividualType']."</td>";
								$data.="<td>".$row2['telephone']."</td>";
								
					  $data.="</tr>";
						$t2++;
					}
					$data.="".noRecordsFound($qCond2,10)."";
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Blank \"Participant gender\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>ParticipantName</th>";
								$data.="<th>trainingDate</th>";
								$data.="<th>age</th>";
								$data.="<th>sex</th>";
								$data.="<th>status</th>";
								$data.="<th>village</th>";
								$data.="<th>IndividualType</th>";
								$data.="<th>telephone</th>";
								
					  $data.="</tr>";
					
					//Blank Participant gender
					$stCond3 = "select 
								`p`.`tbl_participantId`,
								`p`.`name`,
								`t`.`trainingDate`,
								`p`.`age`,
								`p`.`sex`,
								`p`.`status`, 
								`p`.`village`, 
								`l`.`codeName` as `IndividualType`,
								`p`.`telephone`
								from (`tbl_participants` as `p`, `tbl_training` as `t`, `tbl_lookup`  as `l` )
								where `p`.`trainingId`=`t`.`tbl_trainingId`
								and `p`.`typeOfIndividual` = `l`.`code`
								and `l`.`classCode` = '25'
								and  `t`.`trainingDate` >= '2013-10-01'
								and  `p`.`display` = 'Yes'
								and `p`.`age` = ''
								order by `p`.`name` asc";
			
					$qCond3 = @Execute($stCond3) or die(http(__line__));
					$t3=1;	
					while ($row3 = @FetchRecords($qCond3)){
					$colorClass=$t3%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t3.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_participantId[]' type='checkbox' id='tbl_participantId".$t3."' size='25' value='".$row3['tbl_participantId']."'/>";
								$data.="</td>";
								$data.="<td>".$row3['name']."</td>";
								$data.="<td>".$row3['trainingDate']."</td>";
								$data.="<td>".$row3['age']."</td>";
								$data.="<td>".$row3['sex']."</td>";
								$data.="<td>".$row3['status']."</td>";
								$data.="<td>".$row3['village']."</td>";
								$data.="<td>".$row3['IndividualType']."</td>";
								$data.="<td>".$row3['telephone']."</td>";
								
								
					  $data.="</tr>";
						$t3++;
					}
					$data.="".noRecordsFound($qCond3,10)."";
					
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Blank \"Participant Status(New/Old)\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>ParticipantName</th>";
								$data.="<th>trainingDate</th>";
								$data.="<th>age</th>";
								$data.="<th>sex</th>";
								$data.="<th>status</th>";
								$data.="<th>village</th>";
								$data.="<th>IndividualType</th>";
								$data.="<th>telephone</th>";
								
					  $data.="</tr>";
					
					//Blank Participant gender
					$stCond4 = "select 
								`p`.`tbl_participantId`,
								`p`.`name`,
								`t`.`trainingDate`,
								`p`.`age`,
								`p`.`sex`,
								`p`.`status`, 
								`p`.`village`, 
								`l`.`codeName` as `IndividualType`,
								`p`.`telephone`
								from (`tbl_participants` as `p`, `tbl_training` as `t`, `tbl_lookup`  as `l` )
								where `p`.`trainingId`=`t`.`tbl_trainingId`
								and `p`.`typeOfIndividual` = `l`.`code`
								and `l`.`classCode` = '25'
								and  `t`.`trainingDate` >= '2013-10-01'
								and  `p`.`display` = 'Yes'
								and `p`.`status` = ''
								order by `p`.`name` asc";
			
					$qCond4 = @Execute($stCond4) or die(http(__line__));
					$t4=1;	
					while ($row4 = @FetchRecords($qCond4)){
					$colorClass=$t4%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t4.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_participantId[]' type='checkbox' id='tbl_participantId".$t4."' size='25' value='".$row4['tbl_participantId']."'/>";
								$data.="</td>";
								$data.="<td>".$row4['name']."</td>";
								$data.="<td>".$row4['trainingDate']."</td>";
								$data.="<td>".$row4['age']."</td>";
								$data.="<td>".$row4['sex']."</td>";
								$data.="<td>".$row4['status']."</td>";
								$data.="<td>".$row4['village']."</td>";
								$data.="<td>".$row4['IndividualType']."</td>";
								$data.="<td>".$row4['telephone']."</td>";
								
								
					  $data.="</tr>";
						$t4++;
					}
					$data.="".noRecordsFound($qCond4,10)."";
					// end of additional columns
					
					$data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form1');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
			 
					 break;
					//end of form1
					  
					  //start form3
					  case "form3":
					 
						  $data.="<tr>
							<td class='offwhite' colspan='22' align='left'>";
								$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
								<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_exporters_form3');return false;\" align='left'></td>";
							$data.="</td>
						</tr>";
						
						  $data.="<tr class='white1'>
						  <td colspan='20' scope='col' style='color:red;'><b>Repoting Period \"Closed\"</b></td>
						  </tr>";
						  
						  $data.="<tr class='evenrow'>";
									$data.="<th>#</th>";
									$data.="<th>exporterName</th>";
									$data.="<th>year</th>";
									$data.="<th>reportingPeriod</th>"; 
									$data.="<th>vaSupplyChain</th>"; 
									$data.="<th>numCbo</th>";
									$data.="<th>volMaizePurchased</th>";
									$data.="<th>volCoffeePurchased</th>"; 
									$data.="<th>volBeansPurchased</th>"; 
									$data.="<th>volMaizeEx</th>";
									$data.="<th>volCoffeeEx</th>";
									$data.="<th>volBeansEx</th>"; 
									$data.="<th>epayRecieved</th>"; 
									$data.="<th>epayMade</th>";
									$data.="<th>storageCapNew</th>";
									$data.="<th>storageCapImproved</th>";
									$data.="<th>CompiledBy</th>"; 
									$data.="<th>personInterviewed</th>"; 
									$data.="<th>telephoneInterviewed</th>";
									$data.="<th>titleCompiledBy</th>"; 
									$data.="<th>titleOfPersonInterviewed</th>";
						  $data.="</tr>";
							
							//No tbl_traderId
						$stCond = "select 
						`y`.`tbl_form3_exportersId`,
						`t`.`exporterName`,
						`y`.`tbl_exporterId`,
						`y`.`reportingPeriod`, 
						`y`.`exTradersSupplyChain`,
						`y`.`exUnionSupplyChain`,
						`y`.`volMaizePurchased`, 
						`y`.`volCoffeePurchased`, 
						`y`.`volBeansPurchased`, 
						`y`.`volMaizeEx`, 
						`y`.`volCoffeeEx`,
						`y`.`volBeansEx`, 
						`y`.`epayRecieved`,
						`y`.`epayMade`,
						`y`.`storageCapNew`, 
						`y`.`storageCapImproved`, 
						`y`.`CompiledBy`,
						`y`.`ReviewedBy`,
						`y`.`SubmittedBy`, 
						`y`.`DateSubmission`, 
						`y`.`updatedby`,
						`y`.`year`, 
						`y`.`dateCompiled`, 
						`y`.`personInterviewed`, 
						`y`.`telephoneInterviewed`,
						`y`.`titleCompiledBy`, 
						`y`.`titleOfPersonInterviewed`, 
						`y`.`volBeansExUgx`,
						`y`.`volMaizeExUgx`, 
						`y`.`display`
						from (`tbl_exporters` as `t`, `tbl_form3_exporters` as `y`)
						where `y`.`reportingPeriod` like 'Closed%'
						and `y`.`display`='Yes'
						and `y`.`tbl_exporterId` = `t`.`tbl_exportersId`";
				
						$qCond = @Execute($stCond) or die(http(__line__));
						$t=1;	
						while ($row = @FetchRecords($qCond)){
						$colorClass=$t%2==1?"ftfRpLevelTwo":"white1";
								$data.="<tr class='".$colorClass."'>";
									$data.="<td>".$t.".";
									$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
									$data.="<input name='tbl_form3_exportersId[]' type='checkbox' id='tbl_form3_exportersId".$t."' size='25' value='".$row['tbl_form3_exportersId']."'/>";
									$data.="</td>";
									$data.="<td>".$row['exporterName']."</td>";
									$data.="<td>".$row['year']."</td>";
									$data.="<td>".$row['reportingPeriod']."</td>"; 
									$data.="<td align='right'>".number_format($row['exTradersSupplyChain'])."</td>"; 
									$data.="<td align='right'>".number_format($row['exUnionSupplyChain'])."</td>";
									$data.="<td align='right'>".number_format($row['volMaizePurchased'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeePurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volBeansPurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volMaizeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volBeansEx'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayRecieved'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayMade'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapNew'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapImproved'])."</td>";
									$data.="<td>".$row['CompiledBy']."</td>"; 
									$data.="<td>".$row['personInterviewed']."</td>"; 
									$data.="<td>".$row['telephoneInterviewed']."</td>";
									$data.="<td>".$row['titleCompiledBy']."</td>"; 
									$data.="<td>".$row['titleOfPersonInterviewed']."</td>";
									
						  $data.="</tr>";
							$t++;
						}
						$data.="".noRecordsFound($qCond,10)."";
						// end of additional columns
						
						$data.="<tr class='white1'>
						  <td colspan='20' scope='col' style='color:red;'><b>\"Compiled by\" not submitted </b></td>
						  </tr>";
						  
						  $data.="<tr class='evenrow'>";
									$data.="<th>#</th>";
									$data.="<th>exporterName</th>";
									$data.="<th>year</th>";
									$data.="<th>reportingPeriod</th>"; 
									$data.="<th>vaSupplyChain</th>"; 
									$data.="<th>numCbo</th>";
									$data.="<th>volMaizePurchased</th>";
									$data.="<th>volCoffeePurchased</th>"; 
									$data.="<th>volBeansPurchased</th>"; 
									$data.="<th>volMaizeEx</th>";
									$data.="<th>volCoffeeEx</th>";
									$data.="<th>volBeansEx</th>"; 
									$data.="<th>epayRecieved</th>"; 
									$data.="<th>epayMade</th>";
									$data.="<th>storageCapNew</th>";
									$data.="<th>storageCapImproved</th>";
									$data.="<th>CompiledBy</th>"; 
									$data.="<th>personInterviewed</th>"; 
									$data.="<th>telephoneInterviewed</th>";
									$data.="<th>titleCompiledBy</th>"; 
									$data.="<th>titleOfPersonInterviewed</th>";
						  $data.="</tr>";
							
							//No tbl_traderId
						$stCond2 = "select 
						`y`.`tbl_form3_exportersId`,
						`t`.`exporterName`,
						`y`.`tbl_exporterId`,
						`y`.`reportingPeriod`, 
						`y`.`exTradersSupplyChain`,
						`y`.`exUnionSupplyChain`,
						`y`.`volMaizePurchased`, 
						`y`.`volCoffeePurchased`, 
						`y`.`volBeansPurchased`, 
						`y`.`volMaizeEx`, 
						`y`.`volCoffeeEx`,
						`y`.`volBeansEx`, 
						`y`.`epayRecieved`,
						`y`.`epayMade`,
						`y`.`storageCapNew`, 
						`y`.`storageCapImproved`, 
						`y`.`CompiledBy`,
						`y`.`ReviewedBy`,
						`y`.`SubmittedBy`, 
						`y`.`DateSubmission`, 
						`y`.`updatedby`,
						`y`.`year`, 
						`y`.`dateCompiled`, 
						`y`.`personInterviewed`, 
						`y`.`telephoneInterviewed`,
						`y`.`titleCompiledBy`, 
						`y`.`titleOfPersonInterviewed`, 
						`y`.`volBeansExUgx`,
						`y`.`volMaizeExUgx`, 
						`y`.`display`
						from (`tbl_exporters` as `t`, `tbl_form3_exporters` as `y`)
						where `y`.`CompiledBy` = ''
						&& `y`.`display` = 'Yes'
						&& `y`.`tbl_exporterId` = `t`.`tbl_exportersId`";
				
						$qCond2 = @Execute($stCond2) or die(http(__line__));
						$t2=1;	
						while ($row2 = @FetchRecords($qCond2)){
						$colorClass=$t2%2==1?"ftfRpLevelTwo":"white1";
								$data.="<tr class='".$colorClass."'>";
									$data.="<td>".$t2.".";
									$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
									$data.="<input name='tbl_form3_exportersId[]' type='checkbox' id='tbl_form3_exportersId".$t2."' size='25' value='".$row2['tbl_form3_exportersId']."'/>";
									$data.="</td>";
									$data.="<td>".$row2['exporterName']."</td>";
									$data.="<td>".$row2['year']."</td>";
									$data.="<td>".$row2['reportingPeriod']."</td>"; 
									$data.="<td align='right'>".number_format($row2['vaSupplyChain'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['numCbo'])."</td>";
									$data.="<td align='right'>".number_format($row2['volMaizePurchased'])."</td>";
									$data.="<td align='right'>".number_format($row2['volCoffeePurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['volBeansPurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['volMaizeEx'])."</td>";
									$data.="<td align='right'>".number_format($row2['volCoffeeEx'])."</td>";
									$data.="<td align='right'>".number_format($row2['volBeansEx'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['epayRecieved'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['epayMade'])."</td>";
									$data.="<td align='right'>".number_format($row2['storageCapNew'])."</td>";
									$data.="<td align='right'>".number_format($row2['storageCapImproved'])."</td>";
									$data.="<td>".$row2['CompiledBy']."</td>"; 
									$data.="<td>".$row2['personInterviewed']."</td>"; 
									$data.="<td>".$row2['telephoneInterviewed']."</td>";
									$data.="<td>".$row2['titleCompiledBy']."</td>"; 
									$data.="<td>".$row2['titleOfPersonInterviewed']."</td>";
									
						  $data.="</tr>";
							$t2++;
						}
						$data.="".noRecordsFound($qCond2,10)."";
						// end of additional columns
						
						$data.="<tr>
							<td class='offwhite' colspan='22' align='left'>";
								$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
								<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_exporters_form3');return false;\" align='left'></td>";
							$data.="</td>
						</tr>";
						 
					  break;
					  //end of form3
					  
					  //start form4
					  case "form4":
					 
						  $data.="<tr>
							<td class='offwhite' colspan='22' align='left'>";
								$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
								<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_traders_form4');return false;\" align='left'></td>";
							$data.="</td>
						</tr>";
						
						  $data.="<tr class='white1'>
						  <td colspan='20' scope='col' style='color:red;'><b>Reporting Period \"Closed\"</b></td>
						  </tr>";
						  
						  $data.="<tr class='evenrow'>";
									$data.="<th>#</th>";
									$data.="<th>traderName</th>";
									$data.="<th>year</th>";
									$data.="<th>reportingPeriod</th>"; 
									$data.="<th>vaSupplyChain</th>"; 
									$data.="<th>numCbo</th>";
									$data.="<th>volMaizePurchased</th>";
									$data.="<th>volCoffeePurchased</th>"; 
									$data.="<th>volBeansPurchased</th>"; 
									$data.="<th>volMaizeEx</th>";
									$data.="<th>volCoffeeEx</th>";
									$data.="<th>volBeansEx</th>"; 
									$data.="<th>epayRecieved</th>"; 
									$data.="<th>epayMade</th>";
									$data.="<th>storageCapNew</th>";
									$data.="<th>storageCapImproved</th>";
									$data.="<th>CompiledBy</th>"; 
									$data.="<th>personInterviewed</th>"; 
									$data.="<th>telephoneInterviewed</th>";
									$data.="<th>titleCompiledBy</th>"; 
									$data.="<th>titleOfPersonInterviewed</th>";
						  $data.="</tr>";
							
							//No tbl_traderId
						$stCond = "select 
						`y`.`tbl_form4_tradersId`,
						`t`.`traderName`,
						`y`.`tbl_traderId`,
						`y`.`year`,
						`y`.`reportingPeriod`, 
						`y`.`vaSupplyChain`, 
						`y`.`numCbo`,
						`y`.`volMaizePurchased`,
						`y`.`volCoffeePurchased`, 
						`y`.`volBeansPurchased`, 
						`y`.`volMaizeEx`,
						`y`.`volCoffeeEx`,
						`y`.`volBeansEx`, 
						`y`.`epayRecieved`, 
						`y`.`epayMade`,
						`y`.`storageCapNew`,
						`y`.`storageCapImproved`,
						`y`.`CompiledBy`, 
						`y`.`personInterviewed`, 
						`y`.`telephoneInterviewed`,
						`y`.`titleCompiledBy`, 
						`y`.`titleOfPersonInterviewed`,
						`y`.`display` 
						from (`tbl_traders` as `t`, `tbl_form4_traders` as `y`)
						where `y`.`reportingPeriod` like 'Closed%'
						and `y`.`display`='Yes'
						and `y`.`tbl_traderId` = `t`.`tbl_tradersId`";
				
						$qCond = @Execute($stCond) or die(http(__line__));
						$t=1;	
						while ($row = @FetchRecords($qCond)){
						$colorClass=$t%2==1?"ftfRpLevelTwo":"white1";
								$data.="<tr class='".$colorClass."'>";
									$data.="<td>".$t.".";
									$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
									$data.="<input name='tbl_form4_tradersId[]' type='checkbox' id='tbl_form4_tradersId".$t."' size='25' value='".$row['tbl_form4_tradersId']."'/>";
									$data.="</td>";
									$data.="<td>".$row['traderName']."</td>";
									$data.="<td>".$row['year']."</td>";
									$data.="<td>".$row['reportingPeriod']."</td>"; 
									$data.="<td align='right'>".number_format($row['vaSupplyChain'])."</td>"; 
									$data.="<td align='right'>".number_format($row['numCbo'])."</td>";
									$data.="<td align='right'>".number_format($row['volMaizePurchased'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeePurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volBeansPurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row['volMaizeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volCoffeeEx'])."</td>";
									$data.="<td align='right'>".number_format($row['volBeansEx'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayRecieved'])."</td>"; 
									$data.="<td align='right'>".number_format($row['epayMade'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapNew'])."</td>";
									$data.="<td align='right'>".number_format($row['storageCapImproved'])."</td>";
									$data.="<td>".$row['CompiledBy']."</td>"; 
									$data.="<td>".$row['personInterviewed']."</td>"; 
									$data.="<td>".$row['telephoneInterviewed']."</td>";
									$data.="<td>".$row['titleCompiledBy']."</td>"; 
									$data.="<td>".$row['titleOfPersonInterviewed']."</td>";
									
						  $data.="</tr>";
							$t++;
						}
						$data.="".noRecordsFound($qCond,10)."";
						// end of additional columns
						
						$data.="<tr class='white1'>
						  <td colspan='20' scope='col' style='color:red;'><b>\"Compiled by\" not submitted </b></td>
						  </tr>";
						  
						  $data.="<tr class='evenrow'>";
									$data.="<th>#</th>";
									$data.="<th>traderName</th>";
									$data.="<th>year</th>";
									$data.="<th>reportingPeriod</th>"; 
									$data.="<th>vaSupplyChain</th>"; 
									$data.="<th>numCbo</th>";
									$data.="<th>volMaizePurchased</th>";
									$data.="<th>volCoffeePurchased</th>"; 
									$data.="<th>volBeansPurchased</th>"; 
									$data.="<th>volMaizeEx</th>";
									$data.="<th>volCoffeeEx</th>";
									$data.="<th>volBeansEx</th>"; 
									$data.="<th>epayRecieved</th>"; 
									$data.="<th>epayMade</th>";
									$data.="<th>storageCapNew</th>";
									$data.="<th>storageCapImproved</th>";
									$data.="<th>CompiledBy</th>"; 
									$data.="<th>personInterviewed</th>"; 
									$data.="<th>telephoneInterviewed</th>";
									$data.="<th>titleCompiledBy</th>"; 
									$data.="<th>titleOfPersonInterviewed</th>";
						  $data.="</tr>";
							
							//No tbl_traderId
						$stCond2 = "select 
						`y`.`tbl_form4_tradersId`,
						`t`.`traderName`,
						`y`.`tbl_traderId`,
						`y`.`year`,
						`y`.`reportingPeriod`, 
						`y`.`vaSupplyChain`, 
						`y`.`numCbo`,
						`y`.`volMaizePurchased`,
						`y`.`volCoffeePurchased`, 
						`y`.`volBeansPurchased`, 
						`y`.`volMaizeEx`,
						`y`.`volCoffeeEx`,
						`y`.`volBeansEx`, 
						`y`.`epayRecieved`, 
						`y`.`epayMade`,
						`y`.`storageCapNew`,
						`y`.`storageCapImproved`,
						`y`.`CompiledBy`, 
						`y`.`personInterviewed`, 
						`y`.`telephoneInterviewed`,
						`y`.`titleCompiledBy`, 
						`y`.`titleOfPersonInterviewed`,
						`y`.`display` 
						from (`tbl_traders` as `t`, `tbl_form4_traders` as `y`)
						where `y`.`CompiledBy` = ''
						&& `y`.`display` = 'Yes'
						&& `y`.`tbl_traderId` = `t`.`tbl_tradersId`";
				
						$qCond2 = @Execute($stCond2) or die(http(__line__));
						$t2=1;	
						while ($row2 = @FetchRecords($qCond2)){
						$colorClass=$t2%2==1?"ftfRpLevelTwo":"white1";
								$data.="<tr class='".$colorClass."'>";
									$data.="<td>".$t2.".";
									$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
									$data.="<input name='tbl_form4_tradersId[]' type='checkbox' id='tbl_form4_tradersId".$t2."' size='25' value='".$row2['tbl_form4_tradersId']."'/>";
									$data.="</td>";
									$data.="<td>".$row2['traderName']."</td>";
									$data.="<td>".$row2['year']."</td>";
									$data.="<td>".$row2['reportingPeriod']."</td>"; 
									$data.="<td align='right'>".number_format($row2['vaSupplyChain'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['numCbo'])."</td>";
									$data.="<td align='right'>".number_format($row2['volMaizePurchased'])."</td>";
									$data.="<td align='right'>".number_format($row2['volCoffeePurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['volBeansPurchased'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['volMaizeEx'])."</td>";
									$data.="<td align='right'>".number_format($row2['volCoffeeEx'])."</td>";
									$data.="<td align='right'>".number_format($row2['volBeansEx'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['epayRecieved'])."</td>"; 
									$data.="<td align='right'>".number_format($row2['epayMade'])."</td>";
									$data.="<td align='right'>".number_format($row2['storageCapNew'])."</td>";
									$data.="<td align='right'>".number_format($row2['storageCapImproved'])."</td>";
									$data.="<td>".$row2['CompiledBy']."</td>"; 
									$data.="<td>".$row2['personInterviewed']."</td>"; 
									$data.="<td>".$row2['telephoneInterviewed']."</td>";
									$data.="<td>".$row2['titleCompiledBy']."</td>"; 
									$data.="<td>".$row2['titleOfPersonInterviewed']."</td>";
									
						  $data.="</tr>";
							$t2++;
						}
						$data.="".noRecordsFound($qCond2,10)."";
						// end of additional columns
						
						$data.="<tr>
							<td class='offwhite' colspan='22' align='left'>";
								$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
								<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_traders_form4');return false;\" align='left'></td>";
							$data.="</td>
						</tr>";
				 
				 break;
				 
				 //start form6
				  case "form6":
				 
					  $data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form6');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
					
					  $data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Invalid \"farmer code\"</b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>farmer_code</th>"; 
								$data.="<th>interview_date</th>";
								$data.="<th>respondent</th>"; 
								$data.="<th>farmer_crop_maize</th>"; 
								$data.="<th>farmer_crop_beans</th>";
								$data.="<th>farmer_crop_coffee</th>"; 
								$data.="<th>loan_access</th>"; 
								$data.="<th>loan_accessed</th>";
								$data.="<th>implemented_mgt_climate</th>"; 
								$data.="<th>implemented_mgt_climate_action</th>";
								$data.="<th>implemented_mgt_climate_action_other</th>";
								$data.="<th>gps</th>"; 
								$data.="<th>compiled_by</th>"; 
								$data.="<th>va</th>"; 
								$data.="<th>telephone</th>";
								$data.="<th>readtime</th>";
							
					  $data.="</tr>";
						
						//Invalid farmer Id
					$stCond = "select
								`p`.`pk_patId`,
								`p`.`farmer_code`, 
								`p`.`interview_date`,
								`p`.`respondent`, 
								`p`.`farmer_crop_maize`, 
								`p`.`farmer_crop_beans`,
								`p`.`farmer_crop_coffee`, 
								`g`.`loan_access`, 
								`g`.`loan_accessed`,
								`g`.`implemented_mgt_climate`, 
								`g`.`implemented_mgt_climate_action`,
								`g`.`implemented_mgt_climate_action_other`,
								`g`.`gps`, 
								`g`.`compiled_by`, 
								`g`.`va`, 
								`g`.`telephone`,
								`p`.`readtime`  
								from `tbl_frm6particulars` as `p`
								join `tbl_frm6gqnsandgps` as `g` on ( `g`.`fk_patid` = `p`.`pk_patId` )
								where  `p`.`farmer_code` < 860
								and `p`.`display` = 'Yes'";
			
					$qCond = @Execute($stCond) or die(http(__line__));
					$t=1;	
					while ($row = @FetchRecords($qCond)){
					$colorClass=$t%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='pk_patId[]' type='checkbox' id='pk_patId".$t."' size='25' value='".$row['pk_patId']."'/>";
								$data.="</td>";
								$data.="<td>".$row['farmer_code']."</td>";
								$data.="<td>".$row['interview_date']."</td>";
								$data.="<td>".$row['respondent']."</td>";
								$data.="<td>".$row['farmer_crop_maize']."</td>";
								$data.="<td>".$row['farmer_crop_beans']."</td>";
								$data.="<td>".$row['farmer_crop_coffee']."</td>";
								$data.="<td>".$row['loan_access']."</td>"; 
								$data.="<td>".$row['loan_accessed']."</td>";
								$data.="<td>".$row['implemented_mgt_climate']."</td>"; 
								$data.="<td>".$row['implemented_mgt_climate_action']."</td>";
								$data.="<td>".$row['implemented_mgt_climate_action_other']."</td>";
								$data.="<td>".$row['gps']."</td>"; 
								$data.="<td>".$row['compiled_by']."</td>"; 
								$data.="<td>".$row['va']."</td>"; 
								$data.="<td>".$row['telephone']."</td>";
								$data.="<td>".$row['readtime']."</td>"; 
								
								
					  $data.="</tr>";
						$t++;
					}
					$data.="".noRecordsFound($qCond,10)."";
					// end of additional columns
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Invalid \"interview date\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>nameOfFarmer</th>";
								$data.="<th>farmer_code</th>";  
								$data.="<th>interview_date</th>";
								$data.="<th>respondent</th>"; 
								$data.="<th>farmer_crop_maize</th>"; 
								$data.="<th>farmer_crop_beans</th>";
								$data.="<th>farmer_crop_coffee</th>"; 
								$data.="<th>loan_access</th>"; 
								$data.="<th>loan_accessed</th>";
								$data.="<th>implemented_mgt_climate</th>"; 
								$data.="<th>implemented_mgt_climate_action</th>";
								$data.="<th>implemented_mgt_climate_action_other</th>";
								$data.="<th>gps</th>"; 
								$data.="<th>compiled_by</th>"; 
								$data.="<th>va</th>"; 
								$data.="<th>telephone</th>";
								$data.="<th>readtime</th>";
								
					  $data.="</tr>";
						
						//Invalid interview date
					$stCond2 = "select
								`p`.`pk_patId`,
								case 
								  when `f`.`tbl_farmersId` <> `p`.`farmer_code`  then 'Not Available' 
								  else `f`.`farmersName`
								end as `nameOfFarmer`,
								`p`.`farmer_code`,  
								`p`.`interview_date`,
								`p`.`respondent`, 
								`p`.`farmer_crop_maize`, 
								`p`.`farmer_crop_beans`,
								`p`.`farmer_crop_coffee`, 
								`g`.`loan_access`, 
								`g`.`loan_accessed`,
								`g`.`implemented_mgt_climate`, 
								`g`.`implemented_mgt_climate_action`,
								`g`.`implemented_mgt_climate_action_other`,
								`g`.`gps`, 
								`g`.`compiled_by`, 
								`g`.`va`, 
								`g`.`telephone`,
								`p`.`readtime`  
								 from `tbl_frm6particulars` as `p`
								join `tbl_frm6gqnsandgps` as `g` on ( `g`.`fk_patid` = `p`.`pk_patId` )
								join `tbl_farmers` as `f` on ( `f`.`tbl_farmersId` = `g`.`farmer_code`  )
								where  `p`.`interview_date` <= '2013-10-01'
								and `p`.`display` = 'Yes'";
			
					$qCond2 = @Execute($stCond2) or die(http(__line__));
					$t2=1;	
					while ($row2 = @FetchRecords($qCond2)){
					$colorClass=$t2%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t2.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='pk_patId[]' type='checkbox' id='pk_patId".$t2."' size='25' value='".$row2['pk_patId']."'/>";
								$data.="</td>";
								$data.="<td>".$row2['nameOfFarmer']."</td>";
								$data.="<td>".$row2['farmer_code']."</td>";  
								$data.="<td>".$row2['interview_date']."</td>";
								$data.="<td>".$row2['respondent']."</td>"; 
								$data.="<td>".$row2['farmer_crop_maize']."</td>"; 
								$data.="<td>".$row2['farmer_crop_beans']."</td>";
								$data.="<td>".$row2['farmer_crop_coffee']."</td>"; 
								$data.="<td>".$row2['loan_access']."</td>"; 
								$data.="<td>".$row2['loan_accessed']."</td>";
								$data.="<td>".$row2['implemented_mgt_climate']."</td>"; 
								$data.="<td>".$row2['implemented_mgt_climate_action']."</td>";
								$data.="<td>".$row2['implemented_mgt_climate_action_other']."</td>";
								$data.="<td>".$row2['gps']."</td>"; 
								$data.="<td>".$row2['compiled_by']."</td>"; 
								$data.="<td>".$row2['va']."</td>"; 
								$data.="<td>".$row2['telephone']."</td>";
								$data.="<td>".$row2['readtime']."</td>";
								
					  $data.="</tr>";
						$t2++;
					}
					$data.="".noRecordsFound($qCond2,10)."";
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>No \"Farmer crop\" captured </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>nameOfFarmer</th>";
								$data.="<th>farmer_code</th>";  
								$data.="<th>interview_date</th>";
								$data.="<th>respondent</th>"; 
								$data.="<th>farmer_crop_maize</th>"; 
								$data.="<th>farmer_crop_beans</th>";
								$data.="<th>farmer_crop_coffee</th>"; 
								$data.="<th>loan_access</th>"; 
								$data.="<th>loan_accessed</th>";
								$data.="<th>implemented_mgt_climate</th>"; 
								$data.="<th>implemented_mgt_climate_action</th>";
								$data.="<th>implemented_mgt_climate_action_other</th>";
								$data.="<th>gps</th>"; 
								$data.="<th>compiled_by</th>"; 
								$data.="<th>va</th>"; 
								$data.="<th>telephone</th>";
								$data.="<th>readtime</th>";
								
					  $data.="</tr>";
					
					//No Farmer crop
					$stCond3 = "select
								`p`.`pk_patId`,
								case 
								  when `f`.`tbl_farmersId` <> `p`.`farmer_code`  then 'Not Available' 
								  else `f`.`farmersName`
								end as `nameOfFarmer`, 
								`p`.`farmer_code`, 
								`p`.`interview_date`,
								`p`.`respondent`, 
								`p`.`farmer_crop_maize`, 
								`p`.`farmer_crop_beans`,
								`p`.`farmer_crop_coffee`, 
								`g`.`loan_access`, 
								`g`.`loan_accessed`,
								`g`.`implemented_mgt_climate`, 
								`g`.`implemented_mgt_climate_action`,
								`g`.`implemented_mgt_climate_action_other`,
								`g`.`gps`, 
								`g`.`compiled_by`, 
								`g`.`va`, 
								`g`.`telephone`,
								`p`.`readtime`  
								 from `tbl_frm6particulars` as `p`
								join `tbl_frm6gqnsandgps` as `g` on ( `g`.`fk_patid` = `p`.`pk_patId` )
								join `tbl_farmers` as `f` on ( `f`.`tbl_farmersId` = `g`.`farmer_code`  )
								where `p`.`farmer_crop_maize` = 0
								and `p`.`farmer_crop_beans` = 0
								and `p`.`farmer_crop_coffee`= 0
								and `p`.`display` = 'Yes'";
			
					$qCond3 = @Execute($stCond3) or die(http(__line__));
					$t3=1;	
					while ($row3 = @FetchRecords($qCond3)){
					$colorClass=$t3%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t3.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='pk_patId[]' type='checkbox' id='pk_patId".$t3."' size='25' value='".$row3['pk_patId']."'/>";
								$data.="</td>";
								$data.="<td>".$row3['nameOfFarmer']."</td>";
								$data.="<td>".$row3['farmer_code']."</td>";  
								$data.="<td>".$row3['interview_date']."</td>";
								$data.="<td>".$row3['respondent']."</td>"; 
								$data.="<td>".$row3['farmer_crop_maize']."</td>"; 
								$data.="<td>".$row3['farmer_crop_beans']."</td>";
								$data.="<td>".$row3['farmer_crop_coffee']."</td>"; 
								$data.="<td>".$row3['loan_access']."</td>"; 
								$data.="<td>".$row3['loan_accessed']."</td>";
								$data.="<td>".$row3['implemented_mgt_climate']."</td>"; 
								$data.="<td>".$row3['implemented_mgt_climate_action']."</td>";
								$data.="<td>".$row3['implemented_mgt_climate_action_other']."</td>";
								$data.="<td>".$row3['gps']."</td>"; 
								$data.="<td>".$row3['compiled_by']."</td>"; 
								$data.="<td>".$row3['va']."</td>"; 
								$data.="<td>".$row3['telephone']."</td>";
								$data.="<td>".$row3['readtime']."</td>";
								
								
					  $data.="</tr>";
						$t3++;
					}
					$data.="".noRecordsFound($qCond3,10)."";
					// end of additional columns
					
					$data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form6');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
			 
			 break;
			//end of form6
			
			//start form7
				  case "form7":
				 
					  $data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form7');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
					
					  $data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Reporting Period \"Closed\"</b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>farmersName</th>"; 
								$data.="<th>reportingPeriod</th>";
								$data.="<th>memberDstart</th>";
								$data.="<th>farmersVillage</th>";
								$data.="<th>farmersSex</th>";
								$data.="<th>farmersTel</th>"; 
								$data.="<th>hhName</th>"; 
								$data.="<th>hhDob</th>";
								$data.="<th>hhSex</th>";
								$data.="<th>hhHeadDStart</th>";
								$data.="<th>traderName</th>";
								$data.="<th>traderCode</th>";
								$data.="<th>vAgentName</th>";
								$data.="<th>vAgentCode</th>";
							
					  $data.="</tr>";
						
						//reportingPeriod Closed
					$stCond = "select 
								`f`.`tbl_farmersId`,
								`f`.`farmersName`, 
								`f`.`reportingPeriod`,
								`f`.`memberDstart`,
								`f`.`farmersVillage`,
								`f`.`farmersSex`,
								`f`.`farmersTel`, 
								`f`.`hhName`, 
								`f`.`hhDob`,
								`f`.`hhSex`,
								`f`.`hhHeadDStart`,
								`t`.`traderName`,
								concat(' ', `t`.`traderCode`) as`traderCode`,
								`v`.`vAgentName`, 
								concat(' ', `v`.`vAgentCode`) as`vAgentCode`
								from (`tbl_traders` as `t`,`tbl_villageagents` as `v`,`tbl_farmers` as `f` )
								where `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
								and  `v`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
								and `f`.`display` = 'Yes'
								and  `f`.`reportingPeriod` like 'Closed%'
								order by `f`.`farmersName`  asc";
			
					$qCond = @Execute($stCond) or die(http(__line__));
					$t=1;	
					while ($row = @FetchRecords($qCond)){
					$colorClass=$t%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_farmersId[]' type='checkbox' id='tbl_farmersId".$t."' size='25' value='".$row['tbl_farmersId']."'/>";
								$data.="</td>";
								$data.="<td>".$row['farmersName']."</td>"; 
								$data.="<td>".$row['reportingPeriod']."</td>";
								$data.="<td>".$row['memberDstart']."</td>";
								$data.="<td>".$row['farmersVillage']."</td>";
								$data.="<td>".$row['farmersSex']."</td>";
								$data.="<td>".$row['farmersTel']."</td>"; 
								$data.="<td>".$row['hhName']."</td>"; 
								$data.="<td>".$row['hhDob']."</td>";
								$data.="<td>".$row['hhSex']."</td>";
								$data.="<td>".$row['hhHeadDStart']."</td>";
								$data.="<td>".$row['traderName']."</td>";
								$data.="<td>".$row['traderCode']."</td>";
								$data.="<td>".$row['vAgentName']."</td>";
								$data.="<td>".$row['vAgentCode']."</td>";
								
								
					  $data.="</tr>";
						$t++;
					}
					$data.="".noRecordsFound($qCond,10)."";
					// end of additional columns
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Reporting Period \"Blank\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>farmersName</th>"; 
								$data.="<th>reportingPeriod</th>";
								$data.="<th>memberDstart</th>";
								$data.="<th>farmersVillage</th>";
								$data.="<th>farmersSex</th>";
								$data.="<th>farmersTel</th>"; 
								$data.="<th>hhName</th>"; 
								$data.="<th>hhDob</th>";
								$data.="<th>hhSex</th>";
								$data.="<th>hhHeadDStart</th>";
								$data.="<th>traderName</th>";
								$data.="<th>traderCode</th>";
								$data.="<th>vAgentName</th>";
								$data.="<th>vAgentCode</th>";
								
					  $data.="</tr>";
						
						//Reporting period blank
					$stCond2 = "select 
								`f`.`tbl_farmersId`,
								`f`.`farmersName`, 
								`f`.`reportingPeriod`,
								`f`.`memberDstart`,
								`f`.`farmersVillage`,
								`f`.`farmersSex`,
								`f`.`farmersTel`, 
								`f`.`hhName`, 
								`f`.`hhDob`,
								`f`.`hhSex`,
								`f`.`hhHeadDStart`,
								`t`.`traderName`,
								concat(' ', `t`.`traderCode`) as`traderCode`,
								`v`.`vAgentName`, 
								concat(' ', `v`.`vAgentCode`) as`vAgentCode`
								from (`tbl_traders` as `t`,`tbl_villageagents` as `v`,`tbl_farmers` as `f` )
								where `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
								and  `v`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
								and `f`.`display` = 'Yes'
								and  `f`.`reportingPeriod` = ''
								order by `f`.`farmersName`  asc";
			
					$qCond2 = @Execute($stCond2) or die(http(__line__));
					$t2=1;	
					while ($row2 = @FetchRecords($qCond2)){
					$colorClass=$t2%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t2.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_farmersId[]' type='checkbox' id='tbl_farmersId".$t2."' size='25' value='".$row2['tbl_farmersId']."'/>";
								$data.="</td>";
								$data.="<td>".$row2['farmersName']."</td>"; 
								$data.="<td>".$row2['reportingPeriod']."</td>";
								$data.="<td>".$row2['memberDstart']."</td>";
								$data.="<td>".$row2['farmersVillage']."</td>";
								$data.="<td>".$row2['farmersSex']."</td>";
								$data.="<td>".$row2['farmersTel']."</td>"; 
								$data.="<td>".$row2['hhName']."</td>"; 
								$data.="<td>".$row2['hhDob']."</td>";
								$data.="<td>".$row2['hhSex']."</td>";
								$data.="<td>".$row2['hhHeadDStart']."</td>";
								$data.="<td>".$row2['traderName']."</td>";
								$data.="<td>".$row2['traderCode']."</td>";
								$data.="<td>".$row2['vAgentName']."</td>";
								$data.="<td>".$row2['vAgentCode']."</td>";
								
					  $data.="</tr>";
						$t2++;
					}
					$data.="".noRecordsFound($qCond2,10)."";
					
					$data.="<tr class='white1'>
					  <td colspan='20' scope='col' style='color:red;'><b>Blank \"Farmer Gender\" </b></td>
					  </tr>";
					  
					  $data.="<tr class='evenrow'>";
								$data.="<th>#</th>";
								$data.="<th>farmersName</th>"; 
								$data.="<th>reportingPeriod</th>";
								$data.="<th>memberDstart</th>";
								$data.="<th>farmersVillage</th>";
								$data.="<th>farmersSex</th>";
								$data.="<th>farmersTel</th>"; 
								$data.="<th>hhName</th>"; 
								$data.="<th>hhDob</th>";
								$data.="<th>hhSex</th>";
								$data.="<th>hhHeadDStart</th>";
								$data.="<th>traderName</th>";
								$data.="<th>traderCode</th>";
								$data.="<th>vAgentName</th>";
								$data.="<th>vAgentCode</th>";
								
					  $data.="</tr>";
					
					//Blank Farmer gender
					$stCond3 = "select 
								`f`.`tbl_farmersId`,
								`f`.`farmersName`, 
								`f`.`reportingPeriod`,
								`f`.`memberDstart`,
								`f`.`farmersVillage`,
								`f`.`farmersSex`,
								`f`.`farmersTel`, 
								`f`.`hhName`, 
								`f`.`hhDob`,
								`f`.`hhSex`,
								`f`.`hhHeadDStart`,
								`t`.`traderName`,
								concat(' ', `t`.`traderCode`) as`traderCode`,
								`v`.`vAgentName`, 
								concat(' ', `v`.`vAgentCode`) as`vAgentCode`
								from (`tbl_traders` as `t`,`tbl_villageagents` as `v`,`tbl_farmers` as `f` )
								where `t`.`tbl_tradersId`=`v`.`tbl_tradersId`
								and  `v`.`tbl_villageAgentId`=`f`.`tbl_villageAgentId`
								and `f`.`display` = 'Yes'
								and  `f`.`farmersSex` = ''
								order by `f`.`farmersName`  asc";
			
					$qCond3 = @Execute($stCond3) or die(http(__line__));
					$t3=1;	
					while ($row3 = @FetchRecords($qCond3)){
					$colorClass=$t3%2==1?"ftfRpLevelTwo":"white1";
							$data.="<tr class='".$colorClass."'>";
								$data.="<td>".$t3.".";
								$data.="<input name='loopkey[]' type='hidden' id='loopkey' size='25' value='1'/>";
								$data.="<input name='tbl_farmersId[]' type='checkbox' id='tbl_farmersId".$t3."' size='25' value='".$row3['tbl_farmersId']."'/>";
								$data.="</td>";
								$data.="<td>".$row3['farmersName']."</td>"; 
								$data.="<td>".$row3['reportingPeriod']."</td>";
								$data.="<td>".$row3['memberDstart']."</td>";
								$data.="<td>".$row3['farmersVillage']."</td>";
								$data.="<td>".$row3['farmersSex']."</td>";
								$data.="<td>".$row3['farmersTel']."</td>"; 
								$data.="<td>".$row3['hhName']."</td>"; 
								$data.="<td>".$row3['hhDob']."</td>";
								$data.="<td>".$row3['hhSex']."</td>";
								$data.="<td>".$row3['hhHeadDStart']."</td>";
								$data.="<td>".$row3['traderName']."</td>";
								$data.="<td>".$row3['traderCode']."</td>";
								$data.="<td>".$row3['vAgentName']."</td>";
								$data.="<td>".$row3['vAgentCode']."</td>";
								
								
					  $data.="</tr>";
						$t3++;
					}
					$data.="".noRecordsFound($qCond3,10)."";
					// end of additional columns
					
					$data.="<tr>
						<td class='offwhite' colspan='22' align='left'>";
							$data.="<input type='button' onclick=\"multiCheckBox('checked');return false;\" value='check all' /> | 
							<input type='button' value='Delete' class='red' onclick=\"ConfirmDelete(xajax.getFormValues('analysis'),'Clean_form7');return false;\" align='left'></td>";
						$data.="</td>
					</tr>";
			 
			 break;
			//end of form7
					  
			default:
			break;
		}
				
                
				
                
              
                $data.="</table>
				</fieldset>";
              
			  
              
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign($divPartial,'innerHTML',$data); 
return $obj;
}
function view_Tot($divTot){

$obj=new xajaxResponse();
$qmobj=new QueryManager('');
$vmobj=new ValidationManager('');
    
$data="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="
<fieldset>
<legend><h2>All Records</h2></legend>
<table width='600' border='0'>
        <tr>
            <td>";
            $data.="<table border='0' cellpadding='1' cellspacing='1' width='400'>
                <tr>
                  <th colspan='4' scope='col'>ANALYSIS:Status Summary</th>
                  </tr>
                
                
				<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Data Form:</strong><br /></td>
                  <td align='right'>Form1(Training Form)</td>
					<td></td>
                   </tr>
                
				<tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Suspected duplicate Records:</strong><br /></td>
                  <td align='right'>400</td> 
				  <td><input type='button' class='formButton2' onclick=\"xajax_view_dataAnalysisSeg('".$divDuplicates."');return false;\" value='click to view' /></td>
                   </tr>
                   
                     <tr class='white1'>
                  <td colspan='2'><strong>Partial records:</strong><br /></td>
                  <td align='right'>20</td>
                </tr>
                <tr class='ftfRpLevelTwo'>
                  <td colspan='2'><strong>Total Record Submissions</strong><br /></td>
                  <td align='right'>420</td>
                </tr>
                ";
				
				//end of additional columns
				
                
              
                $data.="</table>
				</fieldset>";
              
			  
              
    $data.="</td>
        </tr>
  
</table>
</form>";

$obj->assign($divTot,'innerHTML',$data); 
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
                                    case "Data Analysis Report":
                                ?>
                    xajax_view_dataAnalysis('','','');

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
