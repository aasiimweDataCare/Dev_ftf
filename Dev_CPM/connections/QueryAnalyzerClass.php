<?php
class QueryAnalyzer{

/* Objects of the QueryAnalyzer Class	 */
 
 var $query;
 var $role;
 
 	
function QueryAnalyzer($query)
							{
							$this->query;
							}

//-------------------------------VillageAgent Flter-------------------------
function filterTrader($trCode)
		{
 			$query_thisUser1= "SELECT *
			 FROM `tbl_traders`
			 ORDER BY `tbl_traders`.`traderName` ASC";
			$thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--2163"));

			while ($rows_tr=mysql_fetch_array($thisUser1))
				{
				
				$selected=($trCode==$rows_tr['tbl_tradersId'])?"selected":"";
				$data.="<option value=\"".$rows_tr['tbl_tradersId']."\" ".$selected.">
			".$rows_tr['traderName']."</option>";

		}		 
		return 	$data;

 }
 
//-------------------------------VillageAgent Flter-------------------------
function filterExporter($exCode)
		{
 			$query_thisUser1= "SELECT *
			 FROM `tbl_exporters`
			 ORDER BY `tbl_exporters`.`exporterName` ASC";
			$thisUser1 = @mysql_query($query_thisUser1) or die(http("QMClass--1562"));

			while ($rows_ex=mysql_fetch_array($thisUser1))
				{
				
				$selected=($exCode==$rows_ex['tbl_exportersId'])?"selected":"";
				$data.="<option value=\"".$rows_ex['tbl_exportersId']."\" ".$selected.">".$rows_ex['exporterName']."</option>";

		}		 
		return 	$data;

 }
							
//----------------------Query Analyzer methods----------------------------------------------------
function DataFormsFilter($dataForms) {		
	$x="select `d`.* from `tbl_dataforms` as `d`
	order by `d`.`frmCode` asc ";
	$query=@Execute($x)or die(http("QMGR-3827"));
	while($row=@FetchRecords($query)){
	$selected=($dataForms==$row['pk_dataformsId'])?"SELECTED":"";
	$data.="<option value=\"".$row['pk_dataformsId']."\" ".$selected.">".$row['frmName']." </option>";
}	
	
return $data;
}


function DataSetsFilter($dataForms,$dataSets) {		
	$x="select `s`.*, `d`.* 
	from `tbl_dataforms` as `d`,`tbl_datasets` as `s` 
	where `s`.`fk_dataformsId`='".$dataForms."'
	and `s`.`fk_dataformsId`=`d`.`pk_dataformsId`
	order by `s`.`pk_datasetsId` asc ";
	$query=@Execute($x)or die(http("QMGR-3840"));
	while($row=@FetchRecords($query)){
	$selected=($dataSets==$row['pk_datasetsId'])?"SELECTED":"";
	$data.="<option value=\"".$row['pk_datasetsId']."\" ".$selected.">".$row['dataSetName']." </option>";
}	
	
return $data;
}

function DataConditionsFilter($dataForms,$dataSets,$condition) {		
	$x="select `d`.*,`s`.*, c.* 
	from `tbl_dataforms` as `d`,`tbl_datasets` as `s`, `tbl_dataconditions` as `c`
	where `d`.`pk_dataformsId`=`s`.`fk_dataformsId`
	and `s`.`fk_dataformsId`='".$dataForms."' 
	and `s`.`pk_datasetsId`=`c`.`fk_datasetsId`
	and `c`.`fk_datasetsId`='".$dataSets."'
	order by `c`.`pk_dataconditionsId` asc ";
	$query=@Execute($x)or die(http("QMGR-3859"));
	while($row=@FetchRecords($query)){
	$selected=($condition==$row['pk_dataconditionsId'])?"SELECTED":"";
	$data.="<option value=\"".$row['pk_dataconditionsId']."\" ".$selected.">".$row['dataConditionName']." </option>";
}	
	
return $data;
}

function displayAnalyzerDateFilters($var){
	$data.="<tr class='evenrow'>
				<td><strong>FROM DATE:</strong></td>
				<td>";
				$data.="<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.qAnalyzer.dateOne);return false;\" hidefocus=''>
						<input name='dateOne' type='text'  style='width:100px;' value='' id='dateOne' readonly='readonly' />
						<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a>";
				$data.="</td>";
				
				$data.="<td><strong>TO DATE:</strong></td>";
				$data.="<td>";
				$data.="<a href='javascript:void(0)' onClick=\"if(self.gfPop)gfPop.fPopCalendar(document.qAnalyzer.dateTwo);return false;\" hidefocus=''>
						<input name='dateTwo' type='text'  style='width:100px;' value='' id='dateTwo' readonly='readonly' />
						<img name='popcal' src='WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30'></a>";
				$data.="</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="</tr>";
	
	return $data;
}



function displayAnalyzerReportingPeriodFilters($var){
	$data.="<tr class='evenrow'>
				<td><strong>REPORTING PERIOD:</strong></td>
				<td>";
				$data.="<select name='reportingPeriod' id='reportingPeriod' style='width:100px;'>";
				//$data.="<option value=''>-select-</option>";
				$data.="<option value=''>-All-</option>";
				
					$arrQauters=array("Oct - Mar","Apr - Sep");
					foreach ($arrQauters as $reportingPeriod) {
				$data.="<option value='".$reportingPeriod."'>".$reportingPeriod."</option>";
				}
				$data.="</select>";
				$data.="</td>";
				
				$data.="<td><strong>FINANCIAL YEAR:</strong></td>";
				$data.="<td>";
				$data.="<select name='year' id='year' style='width:100px;'>";
				$data.="<option value=''>-select-</option>";
				$endYear=2018;
					for($year=2013; $year<=$endYear; $year++) {
				$data.="<option value='".$year."'>".$year."</option>";
				}
				$data.="</select>";
				$data.="</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="</tr>";
	
	return $data;
}

function displayAnalyzerTraderFilters($var){
	$data.="<tr class='evenrow'>
				<td><strong>TRADER:</strong></td>
				<td>";
				$data.="<select name='trader' id='trader' style='width:100px;'>";
				$data.="<option value=''>-select-</option>";
				$data.=QueryManager::filterTrader($trCode);
				$data.="</select>";
				$data.="</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="</tr>";
	
	return $data;
}


function displayAnalyzerExporterFilters($var){
	$data.="<tr class='evenrow'>
				<td><strong>EXPORTER:</strong></td>
				<td>";
				$data.="<select name='exporter' id='exporter' style='width:100px;'>";
				$data.="<option value=''>-select-</option>";
				$data.=QueryManager::filterExporter($exCode);
				$data.="</select>";
				$data.="</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				$data.="<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
				
				$data.="</tr>";
	
	return $data;
}


function DataTables($dataSets,$condition){
	
	$x="select t.tableName from tbl_dataconditions_tables as t
	where t.fk_datasetsId='".$dataSets."'
	and t.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3876"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['tableName'].",";
	}
	
	return $queryPart;
}

//fields to display
function DataFieldsToDisplay($condition){
	
	$x="select sp.fieldsToDisplay from tbl_dataconditions_specifics as sp
	where  sp.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3890"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['fieldsToDisplay']."";
	}
	
	return $queryPart;
}

//primary condition
function DataPrimaryCondition($condition){
	
	$x="select sp.keyCondition from tbl_dataconditions_specifics as sp
	where  sp.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3904"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['keyCondition']."";
	}
	
	return $queryPart;
}

//secondary conditions
function DataSecondaryCondition($condition){
	
	$x="select sp.otherConditions from tbl_dataconditions_specifics as sp
	where  sp.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3918"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['otherConditions']."";
	}
	
	return $queryPart;
}

//order conditions
function DataOrderingPrimary($condition){
	
	$x="select sp.primarySortfield from tbl_dataconditions_specifics as sp
	where  sp.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3932"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['primarySortfield']."";
	}
	
	return $queryPart;
}

function DataOrderingSecondary($condition){
	
	$x="select sp.secondarySortfield from tbl_dataconditions_specifics as sp
	where  sp.fk_dataconditionsId = '".$condition."'";
	
	$query=@Execute($x)or die(http("QMGR-3932"));
	while($row=@FetchRecords($query)){
		$queryPart.="".$row['secondarySortfield']."";
	}
	
	return $queryPart;
}

function reportingPeriodMonthsData($reportingPeriod){
							$data.="<tr>";
							if(($reportingPeriod)=="Apr - Sep"){
							$monthsArray=array('4','5','6','7','8','9');
							foreach ($monthsArray as $key) {
							$month= __month__coverter($key); 
							$result = substr($month, 0, 3);
							$data.="<th >".$result."</th>";	
							}
							}else if(($reportingPeriod)=="Oct - Mar"){
							$monthsArray=array('10','11','12','1','2','3');
							foreach ($monthsArray as $key) {
							$month= __month__coverter($key); 
							$result = substr($month, 0, 3);	
							$data.="<th >".$result."</th>";	
							}
							}  
							$data.="<th >Total</th>";
							$data.="</tr>";
	
	return $data;
}

function analyzerExporterDisaggregationData($recordId,$reportingPeriod,$year){
								
								$query_string=QueryManager::analyzerExporterDisaggregationQuery($recordId,$reportingPeriod,$year);
								$query=@Execute($query_string)or die(http(__line__));
								$row=mysql_fetch_array($query);
								$data.="<tr>";
								$data.="<th colspan='2' rowspan='2'>Performance Indicators For: <strong>".$row['exporterName']."</strong></th>";
								switch($reportingPeriod){
									case "Oct - Mar":
									$firstString=substr("".$reportingPeriod."", 0, 3).($year-1);
									$lastString=substr("".trim($reportingPeriod)."", -3).($year);
									break;
									
									case "Apr - Sep":
									$firstString=substr("".$reportingPeriod."", 0, 3).($year);
									$lastString=substr("".trim($reportingPeriod)."", -3).($year);
									break;
								
									default:
									break;
								}
								
								$reportingPeriodString="".$firstString."-".$lastString."";
								$data.="<th colspan='7' >Achievements ".$reportingPeriodString."</th>";
								$data.="<th rowspan='2'>Given details</th>";
								$data.="</tr>";
								$data.=QueryManager::reportingPeriodMonthsData($reportingPeriod);
								
								$data.="<tr class='white1'>";
									$data.="<td colspan='2'><strong>Number of Traders/DC in the supply chain:</strong></td>";
									$data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";
									$totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
									$data.="<td align='right'>".$totTSC."</td>";
									$data.="<td>".$row['exTradersSupplyChainDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='evenrow'>";
									$data.="<td colspan='2'><strong>Number of CBOs/unions/societies in the supply Chain:</strong></td>";
									 $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";
									$totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
									$data.="<td align='right'>".$totUSC."</td>";
									$data.="<td>".$row['exUnionsSupplyChainDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td rowspan='3'><strong>Volume of produce purchased (Kgs):</strong></td>";
									$data.="<td>Maize</td>";
									$data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";
									$totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
									$data.="<td align='right'>".$totVolMP."</td>";
									$data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td>Coffee</td>";
									$data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";
									$totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
									$data.="<td align='right'>".$totvolCP."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td>Beans</td>";
									$data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";
									$totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
									$data.="<td align='right'>".$totvolBP."</td>";
								  $data.="</tr>";
								  $data.="<tr class='evenrow'>";
									$data.="<td rowspan='2'><strong>Maize Exports: Volumes and Values:</strong></td>";
									$data.="<td>Volume (Kg)</td>";
									$data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";
									$totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
									$data.="<td align='right'>".$totvolME."</td>";
									$data.="<td rowspan='2'>".$row['volMaizeExDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='evenrow'>";
									$data.="<td>Value (UGX)</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";
									$totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
									$data.="<td align='right'>".$totvolMEUgx."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td rowspan='2'><strong>Coffee Exports: Volumes and Values:</strong></td>";
									$data.="<td>Volume (Kg)</td>";
									$data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";
									$totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
									$data.="<td align='right'>".$totvolCE."</td>";
									$data.="<td rowspan='2' >".$row['volCoffeeExDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td>Value (UGX)</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";
									$totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
									$data.="<td align='right'>".$totvolCEUgx."</td>";
								  $data.="</tr>";
								  $data.="<tr class='evenrow'>";
									$data.="<td rowspan='2'><strong>Bean Exports: volumes and values:</strong></td>";
									$data.="<td>Volume (Kg)</td>";
									$data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";
									$totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
									$data.="<td align='right'>".$totvolBE."</td>";
									$data.="<td rowspan='2' >".$row['volBeansExDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='evenrow'>";
									$data.="<td>Value(UGX)</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";
									$totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
									$data.="<td align='right'>".$totvolBEUgx."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td colspan='2'><strong>Number of e-payments received:</strong></td>";
									$data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";
									$totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
									$data.="<td align='right'>".$totepayR."</td>";
									$data.="<td>".$row['epayRecievedDetails']."</td>";
								  $data.="</tr>";
								  $data.="<tr class='white1'>";
									$data.="<td colspan='2'><strong>NNumber of e-payments made:</strong></td>";
									$data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
									$data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";
									$totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
									$data.="<td align='right'>".$totepayM."</td>";
									$data.="<td>".$row['epayMadeDetails']."</td>";
								  $data.="</tr>";
 return $data;								  
	
}


function analyzerTraderDisaggregationData($traderId,$reportingPeriod,$year){
								
								$query_string=QueryManager::analyzerTraderDisaggregationQuery($traderId,$reportingPeriod,$year);
								$query=@Execute($query_string)or die(http(__line__));
								$row=mysql_fetch_array($query);
								$data.="<tr>";
								$data.="<th colspan='2' rowspan='2'>Performance Indicators For: <font style='color:Gold;'>".$row['traderName']."</font></th>";
								switch($reportingPeriod){
									case "Oct - Mar":
									$firstString=substr("".$reportingPeriod."", 0, 3).($year-1);
									$lastString=substr("".trim($reportingPeriod)."", -3).($year);
									break;
									
									case "Apr - Sep":
									$firstString=substr("".$reportingPeriod."", 0, 3).($year);
									$lastString=substr("".trim($reportingPeriod)."", -3).($year);
									break;
								
									default:
									break;
								}
								
								$reportingPeriodString="".$firstString."-".$lastString."";
								$data.="<th colspan='7' >Achievements ".$reportingPeriodString."</th>";
								$data.="<th rowspan='2'>Given details</th>";
								$data.="</tr>";
								$data.=QueryManager::reportingPeriodMonthsData($reportingPeriod);
								
								$data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of Traders/DC in the supply chain:</strong></td>";
								$data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";
								$totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
								$data.="<td align='right'>".$totTSC."</td>";
								$data.="<td>".$row['vaSupplyChainDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of CBOs/unions/societies in the supply Chain</strong></td>";
								 $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";
								$totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
								$data.="<td align='right'>".$totUSC."</td>";
								$data.="<td>".$row['numCboDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='3'><strong>Volume of produce purchased (Kgs):</strong></td>";
								$data.="<td><strong>Maize</strong></td>";
								$data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";
								$totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
								$data.="<td align='right'>".$totVolMP."</td>";
								$data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Coffee</strong></td>";
								$data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";
								$totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
								$data.="<td align='right'>".$totvolCP."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Beans</strong></td>";
								$data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";
								$totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
								$data.="<td align='right'>".$totvolBP."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Maize Exports: Volumes and Values</strong></td>";
								$data.="<td><strong>Volume (Kg)</strong></td>";
								$data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";
								$totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
								$data.="<td align='right'>".$totvolME."</td>";
								$data.="<td rowspan='2'>".$row['volMaizeExDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong>Value (UGX):</strong></td>";
								$data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";
								$totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
								$data.="<td align='right'>".$totvolMEUgx."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td rowspan='2'><strong>Coffee Exports: Volumes and Values</strong></td>";
								$data.="<td><strong>Volume (Kg)</strong></td>";
								$data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";
								$totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
								$data.="<td align='right'>".$totvolCE."</td>";
								$data.="<td rowspan='2' >".$row['volCoffeeExDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td><strong>Value (UGX)</strong></td>";
								$data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";
								$totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
								$data.="<td align='right'>".$totvolCEUgx."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td rowspan='2'><strong>Bean Exports: volumes and values</strong></td>";
								$data.="<td><strong>Volume (Kg):</strong></td>";
								$data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";
								$totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
								$data.="<td align='right'>".$totvolBE."</td>";
								$data.="<td rowspan='2' >".$row['volBeansExDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td><strong>Value(UGX):</strong></td>";
								$data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";
								$totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
								$data.="<td align='right'>".$totvolBEUgx."</td>";
							  $data.="</tr>";
							  $data.="<tr class='white1'>";
								$data.="<td colspan='2'><strong>Number of e-payments received:</strong></td>";
								$data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";
								$totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
								$data.="<td align='right'>".$totepayR."</td>";
								$data.="<td>".$row['epayRecievedDetails']."</td>";
							  $data.="</tr>";
							  $data.="<tr class='evenrow'>";
								$data.="<td colspan='2'><strong>Number of e-payments made:</strong></td>";
								$data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
								$data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";
								$totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
								$data.="<td align='right'>".$totepayM."</td>";
								$data.="<td>".$row['epayMadeDetails']."</td>";
							  $data.="</tr>";
							 return $data;								  
	
}

/*function entTech_view($query){
global $data;


	if(empty($query)){


		$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<td colspan='8' rowspan='2'>".errorMsg("The current Filter Parameters Have no result")."</td>
				  </tr>";
		@(http(687));

	}else{
		$q=@Execute($query);
		$row = mysql_fetch_array($q);
		$reportingPeriod=$row['reportingPeriod'];
		$year=$row['year'];
		switch($reportingPeriod){
			case "Oct - Mar":
				$firstString=substr("".$reportingPeriod."", 0, 3).($year-1);
				$lastString=substr("".trim($reportingPeriod)."", -3).($year);
				break;

			case "Apr - Sep":
				$firstString=substr("".$reportingPeriod."", 0, 3).($year);
				$lastString=substr("".trim($reportingPeriod)."", -3).($year);
				break;

			default:
				break;
		}

		$reportingPeriodString="".$firstString."-".$lastString."";

		$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<th colspan='2' rowspan='2'>&nbsp;</th>
					<th colspan='6'>Reporting Period:&nbsp;&nbsp;&nbsp;&nbsp;".$reportingPeriodString."</th>
				  </tr>";


						$data.="<tr class='evenrow'>";
						switch($reportingPeriod){
							case "Apr - Sep":
								$monthsArray=array('4','5','6','7','8','9');
								break;

							case "Oct - Mar":
								$monthsArray=array('10','11','12','1','2','3');
								break;

							default:
								break;
						}
						foreach ($monthsArray as $key) {
							$month= __month__coverter($key);
							$result = substr($month, 0, 3);
							$data.="<th >".$result."</th>";
						}
						$data.="</tr>";



						$data.="<tr class='bluish'>
					<td colspan='8'><strong>Name of BUSINESS:</strong>&nbsp;&nbsp;&nbsp;".$row['traderName']."</td>
				  </tr>
				  <tr class='white1'>
					<td colspan='8' class='white1'><strong>Code:</strong>&nbsp;&nbsp;&nbsp;".$row['traderCode']."</td>
				  </tr>";

						$data.="<tr class='bluish'>";
						$data.="<td colspan='2' class='bluish'><strong>Value Chain/Tech Area:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_ValueChain($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0747"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>";

						$data.="<tr class='white1'>";
						$data.="<td colspan='2'><strong>Type of Business (Trader, Exporter, Processor, Input dealer,others), Trade and business association or CBOs:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_bizType($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0757"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>";

						$data.="<tr class='bluish'>
					<td colspan='2'><strong>Location (Urban/ Rural):</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_Location($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0767"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='white1'>
					<td colspan='2' class='white1'><strong>Duration with the Activity:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_Duration($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0776"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>

				  <tr class='bluish'>
					<td colspan='2' rowspan='3' class='bluish'><strong>Name of improved technology or management practice exposed to:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0786"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>

				  <tr class='bluish'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0795"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0803"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='white1'>
					<td colspan='2' rowspan='3' class='white1'><strong>Name of NEW improved technology or management practice adopted within the    reporting period:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0812"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='white1'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0820"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='white1'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0828"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>
					<td colspan='2' rowspan='3' class='bluish'><strong>Name of technology or management    practices continued with from    past reporting periods</strong><strong>:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0837"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0845"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0853"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='white1'>
					<td colspan='2'><strong>Amount invested in Technology adoption (UGX):</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_AmountInvested($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0764"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td align='right'>".number_format($result['valMonth'.$i.''])."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>
					<td rowspan='4' class='bluish'><strong>Jobs Created&nbsp;</strong></td>
					<td><strong>Name of Job holder:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_NameJobHolder($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0764"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>
					<td><strong>Sex:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_Sex($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0764"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>
					<td><strong>Date of engagement:</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_DateEngagement($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0764"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>
				  <tr class='bluish'>
					<td><strong>Time spent on job (Months):</strong></td>";
						$x=Form2QueryAnalyzer::f2QA_EntTechQuery_TimeSpentOnJob($row['year'],$row['businessTraderName'],$row['reportingPeriod']);
						$query=@Execute($x) or die(http("QA-0764"));
						$result=FetchRecords($query);
						for ($i=1;$i<=6;$i++){
							$data.="<td>".$result['valMonth'.$i.'']."</td>";
						}
						$data.="</tr>";


						$data.="</table>";

	}

	
return $data;
}*/

function entTech_view($query){
		global $data;
		if (empty($query)){
			$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<td colspan='8' rowspan='2'>".errorMsg("The current Filter Parameters Have no result")."</td>
				  </tr>";
		}else{

			/*$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<td colspan='8' rowspan='2'>".congMsg("Success")."</td>
				  </tr>";*/



			$q = @Execute($query) or die(http("QueryAnalyzerClass - 0942"));
			$row = mysql_fetch_array($q);
			$reportingPeriod = $row['reportingPeriod'];
			$year = $row['year'];
			switch ($reportingPeriod) {
				case "Oct - Mar":
					$firstString = substr("" . $reportingPeriod . "", 0, 3) . ($year - 1);
					$lastString = substr("" . trim($reportingPeriod) . "", -3) . ($year);
					break;

				case "Apr - Sep":
					$firstString = substr("" . $reportingPeriod . "", 0, 3) . ($year);
					$lastString = substr("" . trim($reportingPeriod) . "", -3) . ($year);
					break;

				default:
					break;
			}

			$reportingPeriodString = "" . $firstString . "-" . $lastString . "";

			$data .= "<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<th colspan='2' rowspan='2'>&nbsp;</th>
					<th colspan='6'>Reporting Period:&nbsp;&nbsp;&nbsp;&nbsp;" . $reportingPeriodString . "</th>
				  </tr>";


			$data .= "<tr class='evenrow'>";
			switch ($reportingPeriod) {
				case "Apr - Sep":
					$monthsArray = array('4', '5', '6', '7', '8', '9');
					break;

				case "Oct - Mar":
					$monthsArray = array('10', '11', '12', '1', '2', '3');
					break;

				default:
					break;
			}
			foreach ($monthsArray as $key) {
				$month = __month__coverter($key);
				$result = substr($month, 0, 3);
				$data .= "<th >" . $result . "</th>";
			}
			$data .= "</tr>";


			$data .= "<tr class='bluish'>
					<td colspan='8'><strong>Name of BUSINESS:</strong>&nbsp;&nbsp;&nbsp;" . $row['traderName'] . "</td>
				  </tr>
				  <tr class='white1'>
					<td colspan='8' class='white1'><strong>Code:</strong>&nbsp;&nbsp;&nbsp;" . $row['traderCode'] . "</td>
				  </tr>";

			$data .= "<tr class='bluish'>";
			$data .= "<td colspan='2' class='bluish'><strong>Value Chain/Tech Area:</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_ValueChain($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
				$q1 = @Execute($x) or die(http(__LINE__));
				$result = FetchRecords($q1);
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";

				}
			}
			$data .= "</tr>";

			$data .= "<tr class='white1'>";
			$data .= "<td colspan='2'><strong>Type of Business (Trader, Exporter, Processor, Input dealer,others), Trade and business association or CBOs:</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_bizType($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q2 = @Execute($x) or die(http(__LINE__));
			$result = FetchRecords($q2);
			for ($i = 1; $i <= 6; $i++) {
				$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
			}
			}
			$data .= "</tr>";

			$data .= "<tr class='bluish'>
					<td colspan='2'><strong>Location (Urban/ Rural):</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_Location($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q3 = @Execute($x) or die(http(__LINE__));
			$result = FetchRecords($q3);
			for ($i = 1; $i <= 6; $i++) {
				$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
			}
			}
			$data .= "</tr>";

			$data.="<tr class='white1'>
                    <td colspan='2' class='white1'><strong>Duration with the Activity:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_Duration($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q4 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q4);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";

			$data .="<tr class='bluish'>
                    <td colspan='2' rowspan='3' class='bluish'><strong>Name of improved technology or management practice exposed to:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q5 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q5);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";

            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q6 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q6);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q7 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q7);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>
                    <td colspan='2' rowspan='3' class='white1'><strong>Name of NEW improved technology or management practice adopted within the    reporting period:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q8 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q8);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q9 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q9);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q10 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q10);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>
                    <td colspan='2' rowspan='3' class='bluish'><strong>Name of technology or management    practices continued with from    past reporting periods</strong><strong>:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q11 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q11);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q12 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q12);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q13 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q13);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>
                    <td colspan='2'><strong>Amount invested in Technology adoption (UGX):</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_AmountInvested($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q14 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q14);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td align='right'>" . number_format($result['valMonth' . $i . '']) . "</td>";
            }
			}
            $data .= "</tr>";
		    $data .= "<tr class='bluish'>
                    <td rowspan='4' class='bluish'><strong>Jobs Created&nbsp;</strong></td>
                    <td><strong>Name of Job holder:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_NameJobHolder($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q15 = @Execute($x)or die(http(__LINE__));
            $result = FetchRecords($q15);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
			$data .= "<tr class='bluish'>
                    <td><strong>Sex:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_Sex($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q16 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q16);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>
                    <td><strong>Date of engagement:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_DateEngagement($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
					$q17 = @Execute($x) or die(http(__LINE__));
					$result = FetchRecords($q17);
					for ($i = 1; $i <= 6; $i++) {
							$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
					}
			}
            $data .= "</tr>";
			$data .= "<tr class='bluish'>
                    <td><strong>Time spent on job (Months):</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_TimeSpentOnJob($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
					$q18 = @Execute($x) or die(http(__LINE__));
					$result = FetchRecords($q18);
					for ($i = 1; $i <= 6; $i++) {
						$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
					}
			}
			$data .= "</tr>";


			$data .= "</table>";

		}









		return $data;
	}

function labourTech_view($query){
		global $data;
		if (empty($query)){
			$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<td colspan='8' rowspan='2'>".errorMsg("The current Filter Parameters Have no result")."</td>
				  </tr>";
		}else{

			/*$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<td colspan='8' rowspan='2'>".congMsg("Success")."</td>
				  </tr>";*/



			$q = @Execute($query) or die(http("QueryAnalyzerClass - 0942"));
			$row = mysql_fetch_array($q);
			$reportingPeriod = $row['reportingPeriod'];
			$year = $row['year'];
			switch ($reportingPeriod) {
				case "Oct - Mar":
					$firstString = substr("" . $reportingPeriod . "", 0, 3) . ($year - 1);
					$lastString = substr("" . trim($reportingPeriod) . "", -3) . ($year);
					break;

				case "Apr - Sep":
					$firstString = substr("" . $reportingPeriod . "", 0, 3) . ($year);
					$lastString = substr("" . trim($reportingPeriod) . "", -3) . ($year);
					break;

				default:
					break;
			}

			$reportingPeriodString = "" . $firstString . "-" . $lastString . "";

			$data .= "<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
				  <tr class='evenrow'>
					<th colspan='2' rowspan='2'>&nbsp;</th>
					<th colspan='6'>Reporting Period:&nbsp;&nbsp;&nbsp;&nbsp;" . $reportingPeriodString . "</th>
				  </tr>";


			$data .= "<tr class='evenrow'>";
			switch ($reportingPeriod) {
				case "Apr - Sep":
					$monthsArray = array('4', '5', '6', '7', '8', '9');
					break;

				case "Oct - Mar":
					$monthsArray = array('10', '11', '12', '1', '2', '3');
					break;

				default:
					break;
			}
			foreach ($monthsArray as $key) {
				$month = __month__coverter($key);
				$result = substr($month, 0, 3);
				$data .= "<th >" . $result . "</th>";
			}
			$data .= "</tr>";


			$data .= "<tr class='bluish'>
					<td colspan='8'><strong>Name of BUSINESS:</strong>&nbsp;&nbsp;&nbsp;" . $row['traderName'] . "</td>
				  </tr>
				  <tr class='white1'>
					<td colspan='8' class='white1'><strong>Code:</strong>&nbsp;&nbsp;&nbsp;" . $row['traderCode'] . "</td>
				  </tr>";

			$data .= "<tr class='bluish'>";
			$data .= "<td colspan='2' class='bluish'><strong>Value Chain/Tech Area:</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_ValueChain($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
				$q1 = @Execute($x) or die(http(__LINE__));
				$result = FetchRecords($q1);
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";

				}
			}
			$data .= "</tr>";

			$data .= "<tr class='white1'>";
			$data .= "<td colspan='2'><strong>Type of Business (Trader, Exporter, Processor, Input dealer,others), Trade and business association or CBOs:</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_bizType($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q2 = @Execute($x) or die(http(__LINE__));
			$result = FetchRecords($q2);
			for ($i = 1; $i <= 6; $i++) {
				$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
			}
			}
			$data .= "</tr>";

			$data .= "<tr class='bluish'>
					<td colspan='2'><strong>Location (Urban/ Rural):</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_Location($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q3 = @Execute($x) or die(http(__LINE__));
			$result = FetchRecords($q3);
			for ($i = 1; $i <= 6; $i++) {
				$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
			}
			}
			$data .= "</tr>";

			$data.="<tr class='white1'>
                    <td colspan='2' class='white1'><strong>Duration with the Activity:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_Duration($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q4 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q4);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";

			$data .="<tr class='bluish'>
                    <td colspan='2' rowspan='3' class='bluish'><strong>Name of improved technology or management practice exposed to:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q5 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q5);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";

            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q6 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q6);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPractice($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q7 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q7);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>
                    <td colspan='2' rowspan='3' class='white1'><strong>Name of NEW improved technology or management practice adopted within the    reporting period:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q8 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q8);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q9 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q9);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticeAdopted($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q10 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q10);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>
                    <td colspan='2' rowspan='3' class='bluish'><strong>Name of technology or management    practices continued with from    past reporting periods</strong><strong>:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q11 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q11);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q12 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q12);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_MgtPracticePast($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q13 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q13);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='white1'>
                    <td colspan='2'><strong>Amount invested in Technology adoption (UGX):</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_AmountInvested($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q14 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q14);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td align='right'>" . number_format($result['valMonth' . $i . '']) . "</td>";
            }
			}
            $data .= "</tr>";
		    $data .= "<tr class='bluish'>
                    <td rowspan='4' class='bluish'><strong>Jobs Created&nbsp;</strong></td>
                    <td><strong>Name of Job holder:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_NameJobHolder($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q15 = @Execute($x)or die(http(__LINE__));
            $result = FetchRecords($q15);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
			$data .= "<tr class='bluish'>
                    <td><strong>Sex:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_Sex($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
            if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
			$q16 = @Execute($x) or die(http(__LINE__));
            $result = FetchRecords($q16);
            for ($i = 1; $i <= 6; $i++) {
                $data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
            }
			}
            $data .= "</tr>";
            $data .= "<tr class='bluish'>
                    <td><strong>Date of engagement:</strong></td>";
            $x = Form2QueryAnalyzer::f2QA_EntTechQuery_DateEngagement($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
					$q17 = @Execute($x) or die(http(__LINE__));
					$result = FetchRecords($q17);
					for ($i = 1; $i <= 6; $i++) {
							$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
					}
			}
            $data .= "</tr>";
			$data .= "<tr class='bluish'>
                    <td><strong>Time spent on job (Months):</strong></td>";
			$x = Form2QueryAnalyzer::f2QA_EntTechQuery_TimeSpentOnJob($row['year'], $row['businessTraderName'], $row['reportingPeriod']);
			if(empty($x)){
				for ($i = 1; $i <= 6; $i++) {
					$data .= "<td>" . errorMsg("The current Filter Parameters Have no result") . "</td>";

				}

			}else {
					$q18 = @Execute($x) or die(http(__LINE__));
					$result = FetchRecords($q18);
					for ($i = 1; $i <= 6; $i++) {
						$data .= "<td>" . $result['valMonth' . $i . ''] . "</td>";
					}
			}
			$data .= "</tr>";


			$data .= "</table>";

		}









		return $data;
	}


//dynamic analyzer Query
function analyzerExporterDisaggregationQuery($recordId,$reportingPeriod,$year){
	
	
	$query_string="SELECT y.`exporterName`,
		`x`.`tbl_form3_exportersId`,
		`x`.`tbl_exporterId`,
		`x`.`reportingPeriod`,
		`x`.`year`,
		`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
		`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
		`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
		`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
		`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
		`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
		`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
		`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
		`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
		`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
		`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
		`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
		`x`.`exTradersSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
		`x`.`exTradersSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
		`x`.`exTradersSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
		`x`.`exTradersSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
		`x`.`exTradersSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
		`x`.`exTradersSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
		`x`.`exTradersSupplyChainDetails`,
		`x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
		`x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
		`x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
		`x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
		`x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
		`x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,
		`x`.`exUnionsSupplyChainDetails`,
		`x`.`volMaizePurchasedDetails`,
		`x`.`volMaizeExDetails`,
		`x`.`volCoffeeExDetails`,
		`x`.`volBeansExDetails`,
		`x`.`epayRecievedDetails`,
		`x`.`epayMadeDetails`,
		`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
		`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
		`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
		`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
		`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
		`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
		`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
		`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
		`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
		`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
		`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
		`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
		`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
		`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
		`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
		`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
		`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
		`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
		`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
		`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
		`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
		`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
		`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
		`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
		`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
		`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
		`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
		`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
		`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
		`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
		`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
		`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
		`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
		`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
		`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
		`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
		`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
		`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
		`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
		`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
		`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
		`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
		`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
		`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
		`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
		`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
		`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
		`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
		`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
		`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
		`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
		`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
		`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
		`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
		`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
		`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
		`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
		FROM `tbl_form3_exporters` as `x`, `tbl_exporters` as `y`
		WHERE `x`.`tbl_exporterId`='".$recordId."'
		and `x`.`reportingPeriod`='".$reportingPeriod."'
		and `y`.`tbl_exportersId`=`x`.`tbl_exporterId`
		and x.`year`='".$year."'";
	
	return $query_string;
}


function analyzerTraderDisaggregationQuery($traderId,$reportingPeriod,$year){
	
	
	$query_string="SELECT `y`.traderName,
		`x`.`tbl_form4_tradersId`,
		`x`.`tbl_traderId`,
		`x`.`reportingPeriod`,
		`x`.`year`,
		`x`.`epayMadeFifthQuarterMonth` as `epayMFifthQM`,
		`x`.`epayMadeFirstQuarterMonth` as `epayMFirstQM`,
		`x`.`epayMadeFourthQuarterMonth` as `epayMFourthQM`,
		`x`.`epayMadeSecondQuarterMonth` as `epayMSecondQM`,
		`x`.`epayMadeSixthQuarterMonth` as `epayMSixthQM`,
		`x`.`epayMadeThirdQuarterMonth` as `epayMThirdQM`,
		`x`.`epayRecievedFifthQuarterMonth` as `epayRFifthQM`,
		`x`.`epayRecievedFirstQuarterMonth` as `epayRFirstQM`,
		`x`.`epayRecievedFourthQuarterMonth` as `epayRFourthQM`,
		`x`.`epayRecievedSecondQuarterMonth` as `epayRSecondQM`,
		`x`.`epayRecievedSixthQuarterMonth` as `epayRSixthQM`,
		`x`.`epayRecievedThirdQuarterMonth` as `epayRThirdQM`,
		`x`.`vaSupplyChainFifthQuarterMonth` as `exTSCFifthQM`,
		`x`.`vaSupplyChainFirstQuarterMonth` as `exTSCFirstQM`,
		`x`.`vaSupplyChainFourthQuarterMonth` as `exTSCFourthQM`,
		`x`.`vaSupplyChainSecondQuarterMonth` as `exTSCSecondQM`,
		`x`.`vaSupplyChainSixthQuarterMonth` as `exTSCSixthQM`, 
		`x`.`vaSupplyChainThirdQuarterMonth` as `exTSCThirdQM`,
		`x`.`vaSupplyChain`,
		`x`.`vaSupplyChainDetails`,
		`x`.`numCboFifthQuarterMonth` as `exUSCFifthQM`, 
		`x`.`numCboFirstQuarterMonth` as `exUSCFirstQM`, 
		`x`.`numCboFourthQuarterMonth` as `exUSCFourthQM`, 
		`x`.`numCboSecondQuarterMonth` as `exUSCSecondQM`, 
		`x`.`numCboSixthQuarterMonth` as `exUSCSixthQM`,  
		`x`.`numCboThirdQuarterMonth` as `exUSCThirdQM`,
		`x`.`numCbo`,
		`x`.`numCboDetails`,
		`x`.`volMaizePurchasedDetails`,
		`x`.`volMaizeExDetails`,
		`x`.`volCoffeeExDetails`,
		`x`.`volBeansExDetails`,
		`x`.`epayRecievedDetails`,
		`x`.`epayMadeDetails`,
		`x`.`volBeansExFifthQuarterMonth` as `volBEFifthQM`,
		`x`.`volBeansExFirstQuarterMonth` as `volBEFirstQM`, 
		`x`.`volBeansExFourthQuarterMonth` as `volBEFourthQM`,
		`x`.`volBeansExSecondQuarterMonth` as `volBESecondQM`,
		`x`.`volBeansExSixthQuarterMonth` as `volBESixthQM`,
		`x`.`volBeansExThirdQuarterMonth` as `volBEThirdQM`,
		`x`.`volBeansExUgx`, `x`.`volBeansExUgxDetails`,
		`x`.`volBeansExUgxFifthQuarterMonth` as `volBEUgxFifthQM`,
		`x`.`volBeansExUgxFirstQuarterMonth` as `volBEUgxFirstQM`,
		`x`.`volBeansExUgxFourthQuarterMonth` as `volBEUgxFourthQM`,
		`x`.`volBeansExUgxSecondQuarterMonth` as `volBEUgxSecondQM`,
		`x`.`volBeansExUgxSixthQuarterMonth` as `volBEUgxSixthQM`,
		`x`.`volBeansExUgxThirdQuarterMonth` as `volBEUgxThirdQM`,
		`x`.`volBeansPurchasedFifthQuarterMonth` as `volBPFifthQM`,
		`x`.`volBeansPurchasedFirstQuarterMonth` as `volBPFirstQM`,
		`x`.`volBeansPurchasedFourthQuarterMonth` as `volBPFourthQM`,
		`x`.`volBeansPurchasedSecondQuarterMonth` as `volBPSecondQM`, 
		`x`.`volBeansPurchasedSixthQuarterMonth` as `volBPSixthQM`,
		`x`.`volBeansPurchasedThirdQuarterMonth` as `volBPThirdQM`, 
		`x`.`volCoffeeExFifthQuarterMonth` as `volCEFifthQM`,
		`x`.`volCoffeeExFirstQuarterMonth` as `volCEFirstQM`,
		`x`.`volCoffeeExFourthQuarterMonth` as `volCEFourthQM`,
		`x`.`volCoffeeExSecondQuarterMonth` as `volCESecondQM`,
		`x`.`volCoffeeExSixthQuarterMonth` as `volCESixthQM`,
		`x`.`volCoffeeExThirdQuarterMonth` as `volCEThirdQM`,
		`x`.`volCoffeeExUgx`,`x`.`volCoffeeExUgxDetails`,
		`x`.`volCoffeeExUgxFifthQuarterMonth` as `volCEUgxFifthQM`,
		`x`.`volCoffeeExUgxFirstQuarterMonth` as `volCEUgxFirstQM`,
		`x`.`volCoffeeExUgxFourthQuarterMonth` as `volCEUgxFourthQM`,
		`x`.`volCoffeeExUgxSecondQuarterMonth` as `volCEUgxSecondQM`,
		`x`.`volCoffeeExUgxSixthQuarterMonth` as `volCEUgxSixthQM`,
		`x`.`volCoffeeExUgxThirdQuarterMonth` as `volCEUgxThirdQM`,
		`x`.`volCoffeePurchasedFifthQuarterMonth` as `volCPFifthQM`,
		`x`.`volCoffeePurchasedFirstQuarterMonth` as `volCPFirstQM`,
		`x`.`volCoffeePurchasedFourthQuarterMonth` as `volCPFourthQM`,
		`x`.`volCoffeePurchasedSecondQuarterMonth` as `volCPSecondQM`,
		`x`.`volCoffeePurchasedSixthQuarterMonth` as `volCPSixthQM`, 
		`x`.`volCoffeePurchasedThirdQuarterMonth` as `volCPThirdQM`,
		`x`.`volMaizeExFifthQuarterMonth` as `volMEFifthQM`,
		`x`.`volMaizeExFirstQuarterMonth` as `volMEFirstQM`,
		`x`.`volMaizeExFourthQuarterMonth` as `volMEFourthQM`,
		`x`.`volMaizeExSecondQuarterMonth` as `volMESecondQM`,
		`x`.`volMaizeExSixthQuarterMonth` as `volMESixthQM`,
		`x`.`volMaizeExThirdQuarterMonth` as `volMEThirdQM`,
		`x`.`volMaizeExUgx`, `x`.`volMaizeExUgxDetails`,
		`x`.`volMaizeExUgxFifthQuarterMonth` as `volMEUgxFifthQM`,
		`x`.`volMaizeExUgxFirstQuarterMonth` as `volMEUgxFirstQM`,
		`x`.`volMaizeExUgxFourthQuarterMonth` as `volMEUgxFourthQM`,
		`x`.`volMaizeExUgxSecondQuarterMonth` as `volMEUgxSecondQM`,
		`x`.`volMaizeExUgxSixthQuarterMonth` as `volMEUgxSixthQM`,
		`x`.`volMaizeExUgxThirdQuarterMonth` as `volMEUgxThirdQM`,
		`x`.`volMaizePurchasedFifthQuarterMonth` as `volMPFifthQM`,
		`x`.`volMaizePurchasedFirstQuarterMonth` as `volMPFirstQM`,
		`x`.`volMaizePurchasedFourthQuarterMonth` as `volMPFourthQM`,
		`x`.`volMaizePurchasedSecondQuarterMonth` as `volMPSecondQM`,
		`x`.`volMaizePurchasedSixthQuarterMonth` as `volMPSixthQM`,
		`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`
		FROM `tbl_form4_traders` as `x`,`tbl_traders` as `y`
		WHERE `x`.`tbl_traderId`='".$traderId."'
		and `x`.`reportingPeriod`='".$reportingPeriod."'
		and `y`.`tbl_tradersId`=`x`.`tbl_traderId`
		and x.`year`='".$year."'";
	
	return $query_string;
}


//dynamic analyzer Query
function analyzerDynamicQuery($fieldsToDisplay,$tables,$keyCondition,$secondaryCondition,$dynamicCondition,$primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
	
	
	$query_string="select ".$fieldsToDisplay." from ".$tables." where ".$keyCondition." ".$secondaryCondition." ".$dynamicCondition." ".$dateOption." order by ".$primarySortField.", ".$secondarySortField." ".$oder." ".$limitOption."";
	
	return $query_string;
}

//----start Maize Custom Queries-----
function qAnalyzerForm6MaizeProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`maize_acreage` as `Maize Acreage(Acres)`,
m.`maize_mapped` as `Maize Acreage Mapped(Acres)`,
case
	when m.`maize_improved_seeds`= '1' then 'Yes'
	when m.`maize_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Maize Improved Seeds Usage`,
m.`maize_improved_acreage` as `Maize Acreage under Improved Seeds(Acres)`,
case
	when m.`maize_improved_acreage_mapped`= '1' then 'Yes'
	when m.`maize_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Maize Acreage under Improved Seeds Mapped`,
format(m.`maize_improved_cost`,0) as `Maize Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Seeds Supplier`,
m.`maize_seed_supplier_other` as `Maize Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_benefits`, '4', 'None,')), 
(replace(m.`maize_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Maize Seed`,
m.`maize_benefits_other` as `Benefits realised using Improved Maize Seed if Other`,
case
	when m.`maize_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Maize Fertilizers`,
m.`maize_acreage_fertilizer` as `Maize Acreage Under Fertilizers(Acres)`,
format(m.`maize_fertilizer_cost`,0) as `Maize Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Fertilizer Supplier`,
m.`maize_fertilizer_supplier_other` as `Maize Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`maize_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Fertilizer`,
m.`maize_fertilizer_benefits_other` as `Benefits realised using Maize Fertilizer if Other`,
case
	when m.`maize_chemical_use` = '1' then 'Yes'
	when m.`maize_chemical_use` = '0' then 'No'
else 'null'
end 
as `Maize chemical Use`,
m.`maize_chemical_acreage` as `Maize Acreage under Chemicals(Acres)`, 
case
	when m.`maize_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`maize_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Maize acreage Mapped Under Chemicals(Acres)`,
format(m.`maize_chemical_cost`,0) as `Cost of Maize Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Maize Chemicals`,
m.`maize_chemical_supplier_other` as `Supplier Maize Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_chemical_benefits`, '4', 'None,')), 
(replace(m.`maize_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Chemicals`,
m.`maize_chemical_benefits_other` as `Benefits realised using Maize Chemicals if Other`,
case
	when m.`maize_mgt_practices` = '1' then 'Yes'
	when m.`maize_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Maize Management and Cultural Practices Use`,
m.`maize_mgt_practices_acreage` as `Maize Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`maize_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`maize_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`maize_cost_ict`,0) as `Maize ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize ICT Supplier`, 
m.`maize_ict_supplier_other` as `Maize ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_mgt_benefits`, '4', 'None,')), 
(replace(m.`maize_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Maize cultural or management practices including ICT`,
m.`maize_mgt_benefits_other` as `Benefits realized using Maize  cultural or management practices including ICT if Other`,
case
	when m.`maize_machinery_use` = '1' then 'Yes'
	when m.`maize_machinery_use` = '0' then 'No'
else 'null'
end 
as `Maize Machinery Use`,
m.`maize_machinery_acreage` as `Maize Acreage Under Machinery(Acres)`,
case
	when m.`maize_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`maize_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Maize Acreage Under Machinery Mapped`,
format(m.`maize_machinery_cost`,0) as `Maize Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Machinery Supplier`,
m.`maize_machinery_supplier_other` as `Maize Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`maize_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`maize_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`maize_machinery_benefits` , '4', 'None,')), 
(replace(m.`maize_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`maize_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`maize_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`maize_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Machinery`, 
m.`maize_machinery_benefits_other` as `Benefits realised using Maize Machinery if Other`, 
m.`maize_harvested` as `Maize Harvest(Kgs)`,
m.`maize_sold` as `Maize Sold(Kgs)`,
format(m.`maize_sold_price`,0) as `Maize Common selling Price(UGX)`, 
m.`maize_harvest_loss` as `Maize Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6MaizeProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`maize_acreage` as `Maize Acreage(Acres)`,
m.`maize_mapped` as `Maize Acreage Mapped(Acres)`,
case
	when m.`maize_improved_seeds`= '1' then 'Yes'
	when m.`maize_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Maize Improved Seeds Usage`,
m.`maize_improved_acreage` as `Maize Acreage under Improved Seeds(Acres)`,
case
	when m.`maize_improved_acreage_mapped`= '1' then 'Yes'
	when m.`maize_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Maize Acreage under Improved Seeds Mapped`,
format(m.`maize_improved_cost`,0) as `Maize Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Seeds Supplier`,
m.`maize_seed_supplier_other` as `Maize Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_benefits`, '4', 'None,')), 
(replace(m.`maize_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Maize Seed`,
m.`maize_benefits_other` as `Benefits realised using Improved Maize Seed if Other`,
case
	when m.`maize_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Maize Fertilizers`,
m.`maize_acreage_fertilizer` as `Maize Acreage Under Fertilizers(Acres)`,
format(m.`maize_fertilizer_cost`,0) as `Maize Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Fertilizer Supplier`,
m.`maize_fertilizer_supplier_other` as `Maize Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`maize_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Fertilizer`,
m.`maize_fertilizer_benefits_other` as `Benefits realised using Maize Fertilizer if Other`,
case
	when m.`maize_chemical_use` = '1' then 'Yes'
	when m.`maize_chemical_use` = '0' then 'No'
else 'null'
end 
as `Maize chemical Use`,
m.`maize_chemical_acreage` as `Maize Acreage under Chemicals(Acres)`, 
case
	when m.`maize_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`maize_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Maize acreage Mapped Under Chemicals(Acres)`,
format(m.`maize_chemical_cost`,0) as `Cost of Maize Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Maize Chemicals`,
m.`maize_chemical_supplier_other` as `Supplier Maize Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_chemical_benefits`, '4', 'None,')), 
(replace(m.`maize_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Chemicals`,
m.`maize_chemical_benefits_other` as `Benefits realised using Maize Chemicals if Other`,
case
	when m.`maize_mgt_practices` = '1' then 'Yes'
	when m.`maize_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Maize Management and Cultural Practices Use`,
m.`maize_mgt_practices_acreage` as `Maize Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`maize_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`maize_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`maize_cost_ict`,0) as `Maize ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize ICT Supplier`, 
m.`maize_ict_supplier_other` as `Maize ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_mgt_benefits`, '4', 'None,')), 
(replace(m.`maize_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Maize cultural or management practices including ICT`,
m.`maize_mgt_benefits_other` as `Benefits realized using Maize  cultural or management practices including ICT if Other`,
case
	when m.`maize_machinery_use` = '1' then 'Yes'
	when m.`maize_machinery_use` = '0' then 'No'
else 'null'
end 
as `Maize Machinery Use`,
m.`maize_machinery_acreage` as `Maize Acreage Under Machinery(Acres)`,
case
	when m.`maize_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`maize_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Maize Acreage Under Machinery Mapped`,
format(m.`maize_machinery_cost`,0) as `Maize Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Machinery Supplier`,
m.`maize_machinery_supplier_other` as `Maize Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`maize_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`maize_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`maize_machinery_benefits` , '4', 'None,')), 
(replace(m.`maize_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`maize_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`maize_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`maize_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Machinery`, 
m.`maize_machinery_benefits_other` as `Benefits realised using Maize Machinery if Other`, 
m.`maize_harvested` as `Maize Harvest(Kgs)`,
m.`maize_sold` as `Maize Sold(Kgs)`,
format(m.`maize_sold_price`,0) as `Maize Common selling Price(UGX)`, 
m.`maize_harvest_loss` as `Maize Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6MaizeProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
f.farmersSex as `Farmer Gender`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
m.`maize_acreage` as `Maize Acreage(Acres)`,
m.`maize_mapped` as `Maize Acreage Mapped(Acres)`,
case
	when m.`maize_improved_seeds`= '1' then 'Yes'
	when m.`maize_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Maize Improved Seeds Usage`,
m.`maize_improved_acreage` as `Maize Acreage under Improved Seeds(Acres)`,
case
	when m.`maize_improved_acreage_mapped`= '1' then 'Yes'
	when m.`maize_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Maize Acreage under Improved Seeds Mapped`,
format(m.`maize_improved_cost`,0) as `Maize Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Seeds Supplier`,
m.`maize_seed_supplier_other` as `Maize Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_benefits`, '4', 'None,')), 
(replace(m.`maize_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Maize Seed`,
m.`maize_benefits_other` as `Benefits realised using Improved Maize Seed if Other`,
case
	when m.`maize_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Maize Fertilizers`,
m.`maize_acreage_fertilizer` as `Maize Acreage Under Fertilizers(Acres)`,
format(m.`maize_fertilizer_cost`,0) as `Maize Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Fertilizer Supplier`,
m.`maize_fertilizer_supplier_other` as `Maize Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`maize_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Fertilizer`,
m.`maize_fertilizer_benefits_other` as `Benefits realised using Maize Fertilizer if Other`,
case
	when m.`maize_chemical_use` = '1' then 'Yes'
	when m.`maize_chemical_use` = '0' then 'No'
else 'null'
end 
as `Maize chemical Use`,
m.`maize_chemical_acreage` as `Maize Acreage under Chemicals(Acres)`, 
case
	when m.`maize_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`maize_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Maize acreage Mapped Under Chemicals(Acres)`,
format(m.`maize_chemical_cost`,0) as `Cost of Maize Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Maize Chemicals`,
m.`maize_chemical_supplier_other` as `Supplier Maize Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_chemical_benefits`, '4', 'None,')), 
(replace(m.`maize_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Chemicals`,
m.`maize_chemical_benefits_other` as `Benefits realised using Maize Chemicals if Other`,
case
	when m.`maize_mgt_practices` = '1' then 'Yes'
	when m.`maize_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Maize Management and Cultural Practices Use`,
m.`maize_mgt_practices_acreage` as `Maize Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`maize_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`maize_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`maize_cost_ict`,0) as `Maize ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize ICT Supplier`, 
m.`maize_ict_supplier_other` as `Maize ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`maize_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`maize_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`maize_mgt_benefits`, '4', 'None,')), 
(replace(m.`maize_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`maize_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`maize_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`maize_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Maize cultural or management practices including ICT`,
m.`maize_mgt_benefits_other` as `Benefits realized using Maize  cultural or management practices including ICT if Other`,
case
	when m.`maize_machinery_use` = '1' then 'Yes'
	when m.`maize_machinery_use` = '0' then 'No'
else 'null'
end 
as `Maize Machinery Use`,
m.`maize_machinery_acreage` as `Maize Acreage Under Machinery(Acres)`,
case
	when m.`maize_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`maize_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Maize Acreage Under Machinery Mapped`,
format(m.`maize_machinery_cost`,0) as `Maize Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`maize_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`maize_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`maize_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Maize Machinery Supplier`,
m.`maize_machinery_supplier_other` as `Maize Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`maize_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`maize_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`maize_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`maize_machinery_benefits` , '4', 'None,')), 
(replace(m.`maize_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`maize_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`maize_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`maize_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Maize Machinery`, 
m.`maize_machinery_benefits_other` as `Benefits realised using Maize Machinery if Other`, 
m.`maize_harvested` as `Maize Harvest(Kgs)`,
m.`maize_sold` as `Maize Sold(Kgs)`,
format(m.`maize_sold_price`,0) as `Maize Common selling Price(UGX)`, 
m.`maize_harvest_loss` as `Maize Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_maize` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}
//----End Maize Custom queries----

//----Start Coffee Custom Queries-----
function qAnalyzerForm6CoffeeProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`coffee_acreage` as `Coffee Acreage(Acres)`,
m.`coffee_mapped` as `Coffee Acreage Mapped(Acres)`,
case
	when m.`coffee_improved_seeds`= '1' then 'Yes'
	when m.`coffee_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Coffee Improved Seeds Usage`,
m.`coffee_improved_acreage` as `Coffee Acreage under Improved Seeds(Acres)`,
case
	when m.`coffee_improved_acreage_mapped`= '1' then 'Yes'
	when m.`coffee_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Coffee Acreage under Improved Seeds Mapped`,
format(m.`coffee_improved_cost`,0) as `Coffee Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Seeds Supplier`,
m.`coffee_seed_supplier_other` as `Coffee Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_benefits`, '4', 'None,')), 
(replace(m.`coffee_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Coffee Seed`,
m.`coffee_benefits_other` as `Benefits realised using Improved Coffee Seed if Other`,
case
	when m.`coffee_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Coffee Fertilizers`,
m.`coffee_acreage_fertilizer` as `Coffee Acreage Under Fertilizers(Acres)`,
format(m.`coffee_fertilizer_cost`,0) as `Coffee Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Fertilizer Supplier`,
m.`coffee_fertilizer_supplier_other` as `Coffee Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`coffee_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Fertilizer`,
m.`coffee_fertilizer_benefits_other` as `Benefits realised using Coffee Fertilizer if Other`,
case
	when m.`coffee_chemical_use` = '1' then 'Yes'
	when m.`coffee_chemical_use` = '0' then 'No'
else 'null'
end 
as `Coffee chemical Use`,
m.`coffee_chemical_acreage` as `Coffee Acreage under Chemicals(Acres)`, 
case
	when m.`coffee_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Coffee acreage Mapped Under Chemicals(Acres)`,
format(m.`coffee_chemical_cost`,0) as `Cost of Coffee Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Coffee Chemicals`,
m.`coffee_chemical_supplier_other` as `Supplier Coffee Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_chemical_benefits`, '4', 'None,')), 
(replace(m.`coffee_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Chemicals`,
m.`coffee_chemical_benefits_other` as `Benefits realised using Coffee Chemicals if Other`,
case
	when m.`coffee_mgt_practices` = '1' then 'Yes'
	when m.`coffee_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Coffee Management and Cultural Practices Use`,
m.`coffee_mgt_practices_acreage` as `Coffee Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`coffee_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`coffee_cost_ict`,0) as `Coffee ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee ICT Supplier`, 
m.`coffee_ict_supplier_other` as `Coffee ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_mgt_benefits`, '4', 'None,')), 
(replace(m.`coffee_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Coffee cultural or management practices including ICT`,
m.`coffee_mgt_benefits_other` as `Benefits realized using Coffee  cultural or management practices including ICT if Other`,
case
	when m.`coffee_machinery_use` = '1' then 'Yes'
	when m.`coffee_machinery_use` = '0' then 'No'
else 'null'
end 
as `Coffee Machinery Use`,
m.`coffee_machinery_acreage` as `Coffee Acreage Under Machinery(Acres)`,
case
	when m.`coffee_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Coffee Acreage Under Machinery Mapped`,
format(m.`coffee_machinery_cost`,0) as `Coffee Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Machinery Supplier`,
m.`coffee_machinery_supplier_other` as `Coffee Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`coffee_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`coffee_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`coffee_machinery_benefits` , '4', 'None,')), 
(replace(m.`coffee_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`coffee_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`coffee_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`coffee_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Machinery`, 
m.`coffee_machinery_benefits_other` as `Benefits realised using Coffee Machinery if Other`, 
m.`coffee_harvested` as `Coffee Harvest(Kgs)`,
m.`coffee_sold` as `Coffee Sold(Kgs)`,
format(m.`coffee_sold_price`,0) as `Coffee Common selling Price(UGX)`, 
m.`coffee_harvest_loss` as `Coffee Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6CoffeeProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`coffee_acreage` as `Coffee Acreage(Acres)`,
m.`coffee_mapped` as `Coffee Acreage Mapped(Acres)`,
case
	when m.`coffee_improved_seeds`= '1' then 'Yes'
	when m.`coffee_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Coffee Improved Seeds Usage`,
m.`coffee_improved_acreage` as `Coffee Acreage under Improved Seeds(Acres)`,
case
	when m.`coffee_improved_acreage_mapped`= '1' then 'Yes'
	when m.`coffee_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Coffee Acreage under Improved Seeds Mapped`,
format(m.`coffee_improved_cost`,0) as `Coffee Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Seeds Supplier`,
m.`coffee_seed_supplier_other` as `Coffee Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_benefits`, '4', 'None,')), 
(replace(m.`coffee_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Coffee Seed`,
m.`coffee_benefits_other` as `Benefits realised using Improved Coffee Seed if Other`,
case
	when m.`coffee_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Coffee Fertilizers`,
m.`coffee_acreage_fertilizer` as `Coffee Acreage Under Fertilizers(Acres)`,
format(m.`coffee_fertilizer_cost`,0) as `Coffee Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Fertilizer Supplier`,
m.`coffee_fertilizer_supplier_other` as `Coffee Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`coffee_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Fertilizer`,
m.`coffee_fertilizer_benefits_other` as `Benefits realised using Coffee Fertilizer if Other`,
case
	when m.`coffee_chemical_use` = '1' then 'Yes'
	when m.`coffee_chemical_use` = '0' then 'No'
else 'null'
end 
as `Coffee chemical Use`,
m.`coffee_chemical_acreage` as `Coffee Acreage under Chemicals(Acres)`, 
case
	when m.`coffee_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Coffee acreage Mapped Under Chemicals(Acres)`,
format(m.`coffee_chemical_cost`,0) as `Cost of Coffee Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Coffee Chemicals`,
m.`coffee_chemical_supplier_other` as `Supplier Coffee Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_chemical_benefits`, '4', 'None,')), 
(replace(m.`coffee_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Chemicals`,
m.`coffee_chemical_benefits_other` as `Benefits realised using Coffee Chemicals if Other`,
case
	when m.`coffee_mgt_practices` = '1' then 'Yes'
	when m.`coffee_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Coffee Management and Cultural Practices Use`,
m.`coffee_mgt_practices_acreage` as `Coffee Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`coffee_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`coffee_cost_ict`,0) as `Coffee ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee ICT Supplier`, 
m.`coffee_ict_supplier_other` as `Coffee ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_mgt_benefits`, '4', 'None,')), 
(replace(m.`coffee_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Coffee cultural or management practices including ICT`,
m.`coffee_mgt_benefits_other` as `Benefits realized using Coffee  cultural or management practices including ICT if Other`,
case
	when m.`coffee_machinery_use` = '1' then 'Yes'
	when m.`coffee_machinery_use` = '0' then 'No'
else 'null'
end 
as `Coffee Machinery Use`,
m.`coffee_machinery_acreage` as `Coffee Acreage Under Machinery(Acres)`,
case
	when m.`coffee_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Coffee Acreage Under Machinery Mapped`,
format(m.`coffee_machinery_cost`,0) as `Coffee Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Machinery Supplier`,
m.`coffee_machinery_supplier_other` as `Coffee Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`coffee_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`coffee_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`coffee_machinery_benefits` , '4', 'None,')), 
(replace(m.`coffee_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`coffee_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`coffee_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`coffee_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Machinery`, 
m.`coffee_machinery_benefits_other` as `Benefits realised using Coffee Machinery if Other`, 
m.`coffee_harvested` as `Coffee Harvest(Kgs)`,
m.`coffee_sold` as `Coffee Sold(Kgs)`,
format(m.`coffee_sold_price`,0) as `Coffee Common selling Price(UGX)`, 
m.`coffee_harvest_loss` as `Coffee Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6CoffeeProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
f.farmersSex as `Farmer Gender`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
m.`coffee_acreage` as `Coffee Acreage(Acres)`,
m.`coffee_mapped` as `Coffee Acreage Mapped(Acres)`,
case
	when m.`coffee_improved_seeds`= '1' then 'Yes'
	when m.`coffee_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Coffee Improved Seeds Usage`,
m.`coffee_improved_acreage` as `Coffee Acreage under Improved Seeds(Acres)`,
case
	when m.`coffee_improved_acreage_mapped`= '1' then 'Yes'
	when m.`coffee_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Coffee Acreage under Improved Seeds Mapped`,
format(m.`coffee_improved_cost`,0) as `Coffee Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Seeds Supplier`,
m.`coffee_seed_supplier_other` as `Coffee Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_benefits`, '4', 'None,')), 
(replace(m.`coffee_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Coffee Seed`,
m.`coffee_benefits_other` as `Benefits realised using Improved Coffee Seed if Other`,
case
	when m.`coffee_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Coffee Fertilizers`,
m.`coffee_acreage_fertilizer` as `Coffee Acreage Under Fertilizers(Acres)`,
format(m.`coffee_fertilizer_cost`,0) as `Coffee Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Fertilizer Supplier`,
m.`coffee_fertilizer_supplier_other` as `Coffee Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`coffee_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Fertilizer`,
m.`coffee_fertilizer_benefits_other` as `Benefits realised using Coffee Fertilizer if Other`,
case
	when m.`coffee_chemical_use` = '1' then 'Yes'
	when m.`coffee_chemical_use` = '0' then 'No'
else 'null'
end 
as `Coffee chemical Use`,
m.`coffee_chemical_acreage` as `Coffee Acreage under Chemicals(Acres)`, 
case
	when m.`coffee_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Coffee acreage Mapped Under Chemicals(Acres)`,
format(m.`coffee_chemical_cost`,0) as `Cost of Coffee Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Coffee Chemicals`,
m.`coffee_chemical_supplier_other` as `Supplier Coffee Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_chemical_benefits`, '4', 'None,')), 
(replace(m.`coffee_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Chemicals`,
m.`coffee_chemical_benefits_other` as `Benefits realised using Coffee Chemicals if Other`,
case
	when m.`coffee_mgt_practices` = '1' then 'Yes'
	when m.`coffee_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Coffee Management and Cultural Practices Use`,
m.`coffee_mgt_practices_acreage` as `Coffee Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`coffee_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`coffee_cost_ict`,0) as `Coffee ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee ICT Supplier`, 
m.`coffee_ict_supplier_other` as `Coffee ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`coffee_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`coffee_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`coffee_mgt_benefits`, '4', 'None,')), 
(replace(m.`coffee_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`coffee_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`coffee_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`coffee_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Coffee cultural or management practices including ICT`,
m.`coffee_mgt_benefits_other` as `Benefits realized using Coffee  cultural or management practices including ICT if Other`,
case
	when m.`coffee_machinery_use` = '1' then 'Yes'
	when m.`coffee_machinery_use` = '0' then 'No'
else 'null'
end 
as `Coffee Machinery Use`,
m.`coffee_machinery_acreage` as `Coffee Acreage Under Machinery(Acres)`,
case
	when m.`coffee_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`coffee_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Coffee Acreage Under Machinery Mapped`,
format(m.`coffee_machinery_cost`,0) as `Coffee Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`coffee_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`coffee_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`coffee_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Coffee Machinery Supplier`,
m.`coffee_machinery_supplier_other` as `Coffee Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`coffee_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`coffee_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`coffee_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`coffee_machinery_benefits` , '4', 'None,')), 
(replace(m.`coffee_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`coffee_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`coffee_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`coffee_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Coffee Machinery`, 
m.`coffee_machinery_benefits_other` as `Benefits realised using Coffee Machinery if Other`, 
m.`coffee_harvested` as `Coffee Harvest(Kgs)`,
m.`coffee_sold` as `Coffee Sold(Kgs)`,
format(m.`coffee_sold_price`,0) as `Coffee Common selling Price(UGX)`, 
m.`coffee_harvest_loss` as `Coffee Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_coffee` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

//----End Coffee Custom Queries------

//----Start Beans Custom Queries-----
function qAnalyzerForm6BeansProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`beans_acreage` as `Beans Acreage(Acres)`,
m.`beans_mapped` as `Beans Acreage Mapped(Acres)`,
case
	when m.`beans_improved_seeds`= '1' then 'Yes'
	when m.`beans_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Beans Improved Seeds Usage`,
m.`beans_improved_acreage` as `Beans Acreage under Improved Seeds(Acres)`,
case
	when m.`beans_improved_acreage_mapped`= '1' then 'Yes'
	when m.`beans_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Beans Acreage under Improved Seeds Mapped`,
format(m.`beans_improved_cost`,0) as `Beans Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Seeds Supplier`,
m.`beans_seed_supplier_other` as `Beans Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_benefits`, '4', 'None,')), 
(replace(m.`beans_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Beans Seed`,
m.`beans_benefits_other` as `Benefits realised using Improved Beans Seed if Other`,
case
	when m.`beans_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Beans Fertilizers`,
m.`beans_acreage_fertilizer` as `Beans Acreage Under Fertilizers(Acres)`,
format(m.`beans_fertilizer_cost`,0) as `Beans Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Fertilizer Supplier`,
m.`beans_fertilizer_supplier_other` as `Beans Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`beans_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Fertilizer`,
m.`beans_fertilizer_benefits_other` as `Benefits realised using Beans Fertilizer if Other`,
case
	when m.`beans_chemical_use` = '1' then 'Yes'
	when m.`beans_chemical_use` = '0' then 'No'
else 'null'
end 
as `Beans chemical Use`,
m.`beans_chemical_acreage` as `Beans Acreage under Chemicals(Acres)`, 
case
	when m.`beans_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`beans_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Beans acreage Mapped Under Chemicals(Acres)`,
format(m.`beans_chemical_cost`,0) as `Cost of Beans Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Beans Chemicals`,
m.`beans_chemical_supplier_other` as `Supplier Beans Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_chemical_benefits`, '4', 'None,')), 
(replace(m.`beans_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Chemicals`,
m.`beans_chemical_benefits_other` as `Benefits realised using Beans Chemicals if Other`,
case
	when m.`beans_mgt_practices` = '1' then 'Yes'
	when m.`beans_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Beans Management and Cultural Practices Use`,
m.`beans_mgt_practices_acreage` as `Beans Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`beans_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`beans_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`beans_cost_ict`,0) as `Beans ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans ICT Supplier`, 
m.`beans_ict_supplier_other` as `Beans ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_mgt_benefits`, '4', 'None,')), 
(replace(m.`beans_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Beans cultural or management practices including ICT`,
m.`beans_mgt_benefits_other` as `Benefits realized using Beans  cultural or management practices including ICT if Other`,
case
	when m.`beans_machinery_use` = '1' then 'Yes'
	when m.`beans_machinery_use` = '0' then 'No'
else 'null'
end 
as `Beans Machinery Use`,
m.`beans_machinery_acreage` as `Beans Acreage Under Machinery(Acres)`,
case
	when m.`beans_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`beans_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Beans Acreage Under Machinery Mapped`,
format(m.`beans_machinery_cost`,0) as `Beans Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Machinery Supplier`,
m.`beans_machinery_supplier_other` as `Beans Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`beans_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`beans_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`beans_machinery_benefits` , '4', 'None,')), 
(replace(m.`beans_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`beans_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`beans_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`beans_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Machinery`, 
m.`beans_machinery_benefits_other` as `Benefits realised using Beans Machinery if Other`, 
m.`beans_harvested` as `Beans Harvest(Kgs)`,
m.`beans_sold` as `Beans Sold(Kgs)`,
format(m.`beans_sold_price`,0) as `Beans Common selling Price(UGX)`, 
m.`beans_harvest_loss` as `Beans Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6BeansProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
m.`beans_acreage` as `Beans Acreage(Acres)`,
m.`beans_mapped` as `Beans Acreage Mapped(Acres)`,
case
	when m.`beans_improved_seeds`= '1' then 'Yes'
	when m.`beans_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Beans Improved Seeds Usage`,
m.`beans_improved_acreage` as `Beans Acreage under Improved Seeds(Acres)`,
case
	when m.`beans_improved_acreage_mapped`= '1' then 'Yes'
	when m.`beans_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Beans Acreage under Improved Seeds Mapped`,
format(m.`beans_improved_cost`,0) as `Beans Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Seeds Supplier`,
m.`beans_seed_supplier_other` as `Beans Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_benefits`, '4', 'None,')), 
(replace(m.`beans_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Beans Seed`,
m.`beans_benefits_other` as `Benefits realised using Improved Beans Seed if Other`,
case
	when m.`beans_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Beans Fertilizers`,
m.`beans_acreage_fertilizer` as `Beans Acreage Under Fertilizers(Acres)`,
format(m.`beans_fertilizer_cost`,0) as `Beans Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Fertilizer Supplier`,
m.`beans_fertilizer_supplier_other` as `Beans Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`beans_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Fertilizer`,
m.`beans_fertilizer_benefits_other` as `Benefits realised using Beans Fertilizer if Other`,
case
	when m.`beans_chemical_use` = '1' then 'Yes'
	when m.`beans_chemical_use` = '0' then 'No'
else 'null'
end 
as `Beans chemical Use`,
m.`beans_chemical_acreage` as `Beans Acreage under Chemicals(Acres)`, 
case
	when m.`beans_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`beans_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Beans acreage Mapped Under Chemicals(Acres)`,
format(m.`beans_chemical_cost`,0) as `Cost of Beans Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Beans Chemicals`,
m.`beans_chemical_supplier_other` as `Supplier Beans Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_chemical_benefits`, '4', 'None,')), 
(replace(m.`beans_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Chemicals`,
m.`beans_chemical_benefits_other` as `Benefits realised using Beans Chemicals if Other`,
case
	when m.`beans_mgt_practices` = '1' then 'Yes'
	when m.`beans_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Beans Management and Cultural Practices Use`,
m.`beans_mgt_practices_acreage` as `Beans Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`beans_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`beans_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`beans_cost_ict`,0) as `Beans ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans ICT Supplier`, 
m.`beans_ict_supplier_other` as `Beans ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_mgt_benefits`, '4', 'None,')), 
(replace(m.`beans_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Beans cultural or management practices including ICT`,
m.`beans_mgt_benefits_other` as `Benefits realized using Beans  cultural or management practices including ICT if Other`,
case
	when m.`beans_machinery_use` = '1' then 'Yes'
	when m.`beans_machinery_use` = '0' then 'No'
else 'null'
end 
as `Beans Machinery Use`,
m.`beans_machinery_acreage` as `Beans Acreage Under Machinery(Acres)`,
case
	when m.`beans_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`beans_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Beans Acreage Under Machinery Mapped`,
format(m.`beans_machinery_cost`,0) as `Beans Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Machinery Supplier`,
m.`beans_machinery_supplier_other` as `Beans Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`beans_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`beans_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`beans_machinery_benefits` , '4', 'None,')), 
(replace(m.`beans_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`beans_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`beans_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`beans_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Machinery`, 
m.`beans_machinery_benefits_other` as `Benefits realised using Beans Machinery if Other`, 
m.`beans_harvested` as `Beans Harvest(Kgs)`,
m.`beans_sold` as `Beans Sold(Kgs)`,
format(m.`beans_sold_price`,0) as `Beans Common selling Price(UGX)`, 
m.`beans_harvest_loss` as `Beans Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm6BeansProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
f.farmersSex as `Farmer Gender`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
p.respondent as `Respondent`,
q.compiled_by as `Compiled By`,
q.gps as `GPS coordinates`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
m.`beans_acreage` as `Beans Acreage(Acres)`,
m.`beans_mapped` as `Beans Acreage Mapped(Acres)`,
case
	when m.`beans_improved_seeds`= '1' then 'Yes'
	when m.`beans_improved_seeds`= '0' then 'No'
else 'null'
end 
as `Beans Improved Seeds Usage`,
m.`beans_improved_acreage` as `Beans Acreage under Improved Seeds(Acres)`,
case
	when m.`beans_improved_acreage_mapped`= '1' then 'Yes'
	when m.`beans_improved_acreage_mapped`= '0' then 'No'
else 'null'
end 
as `Beans Acreage under Improved Seeds Mapped`,
format(m.`beans_improved_cost`,0) as `Beans Improved Seeds Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_seed_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_seed_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_seed_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_seed_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Seeds Supplier`,
m.`beans_seed_supplier_other` as `Beans Seeds Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_benefits`, '4', 'None,')), 
(replace(m.`beans_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Improved Beans Seed`,
m.`beans_benefits_other` as `Benefits realised using Improved Beans Seed if Other`,
case
	when m.`beans_acreage_fertilizer` <> '0' then 'Yes'
	else 'No'
end 
 as `Used Beans Fertilizers`,
m.`beans_acreage_fertilizer` as `Beans Acreage Under Fertilizers(Acres)`,
format(m.`beans_fertilizer_cost`,0) as `Beans Fertilizer Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_fertilizer_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_fertilizer_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_fertilizer_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Fertilizer Supplier`,
m.`beans_fertilizer_supplier_other` as `Beans Fertilizer Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_fertilizer_benefits`, '4', 'None,')), 
(replace(m.`beans_fertilizer_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_fertilizer_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_fertilizer_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_fertilizer_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Fertilizer`,
m.`beans_fertilizer_benefits_other` as `Benefits realised using Beans Fertilizer if Other`,
case
	when m.`beans_chemical_use` = '1' then 'Yes'
	when m.`beans_chemical_use` = '0' then 'No'
else 'null'
end 
as `Beans chemical Use`,
m.`beans_chemical_acreage` as `Beans Acreage under Chemicals(Acres)`, 
case
	when m.`beans_chemical_acreage_mapped` = '1' then 'Yes'
	when m.`beans_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
 as `Beans acreage Mapped Under Chemicals(Acres)`,
format(m.`beans_chemical_cost`,0) as `Cost of Beans Chemicals(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_chemical_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_chemical_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_chemical_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Supplier Beans Chemicals`,
m.`beans_chemical_supplier_other` as `Supplier Beans Chemicals Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_chemical_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_chemical_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_chemical_benefits`, '4', 'None,')), 
(replace(m.`beans_chemical_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_chemical_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_chemical_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_chemical_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Chemicals`,
m.`beans_chemical_benefits_other` as `Benefits realised using Beans Chemicals if Other`,
case
	when m.`beans_mgt_practices` = '1' then 'Yes'
	when m.`beans_mgt_practices` = '0' then 'No'
else 'null'
end 
as `Beans Management and Cultural Practices Use`,
m.`beans_mgt_practices_acreage` as `Beans Acreage Under Management and Cultural Practices(Acres)`,
case
	when m.`beans_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when m.`beans_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Acreage Under Management and Cultural Practices Mapped`,
format(m.`beans_cost_ict`,0) as `Beans ICT Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_ict_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_ict_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_ict_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_ict_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans ICT Supplier`, 
m.`beans_ict_supplier_other` as `Beans ICT Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_mgt_benefits`, '1', 'Good yields,')), 
(replace(m.`beans_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(m.`beans_mgt_benefits`, '3', 'Labour saving,')), 
(replace(m.`beans_mgt_benefits`, '4', 'None,')), 
(replace(m.`beans_mgt_benefits`, '5', 'Better quality,')), 
(replace(m.`beans_mgt_benefits`, '6', 'Disease Resistance,')), 
(replace(m.`beans_mgt_benefits`, '7', 'Early Maturity,')), 
(replace(m.`beans_mgt_benefits`, '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realized using Beans cultural or management practices including ICT`,
m.`beans_mgt_benefits_other` as `Benefits realized using Beans  cultural or management practices including ICT if Other`,
case
	when m.`beans_machinery_use` = '1' then 'Yes'
	when m.`beans_machinery_use` = '0' then 'No'
else 'null'
end 
as `Beans Machinery Use`,
m.`beans_machinery_acreage` as `Beans Acreage Under Machinery(Acres)`,
case
	when m.`beans_machinery_acreage_mapped` = '1' then 'Yes'
	when m.`beans_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `Beans Acreage Under Machinery Mapped`,
format(m.`beans_machinery_cost`,0) as `Beans Machinery Cost(UGX)`,
replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_supplier`, '1', 'Stockist through VARM,')), 
(replace(m.`beans_machinery_supplier`, '2', 'Village Agents,')), 
(replace(m.`beans_machinery_supplier`, '3', 'Stockist,')), 
(replace(m.`beans_machinery_supplier`, '4', 'Others,'))
),'1',''),'2',''),'3',''),'4','') as `Beans Machinery Supplier`,
m.`beans_machinery_supplier_other` as `Beans Machinery Supplier if Other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(m.`beans_machinery_benefits` , '1', 'Good yields,')), 
(replace(m.`beans_machinery_benefits` , '2', 'Reduced costs,')), 
(replace(m.`beans_machinery_benefits` , '3', 'Labour saving,')), 
(replace(m.`beans_machinery_benefits` , '4', 'None,')), 
(replace(m.`beans_machinery_benefits` , '5', 'Better quality,')), 
(replace(m.`beans_machinery_benefits` , '6', 'Disease Resistance,')), 
(replace(m.`beans_machinery_benefits` , '7', 'Early Maturity,')), 
(replace(m.`beans_machinery_benefits` , '8', 'Others,'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as `Benefits realised using Beans Machinery`, 
m.`beans_machinery_benefits_other` as `Benefits realised using Beans Machinery if Other`, 
m.`beans_harvested` as `Beans Harvest(Kgs)`,
m.`beans_sold` as `Beans Sold(Kgs)`,
format(m.`beans_sold_price`,0) as `Beans Common selling Price(UGX)`, 
m.`beans_harvest_loss` as `Beans Harvest Poor Handling Loss(Kgs)`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6production_beans` as `m` on (`m`.`fk_patId`=`p`.`pk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`
join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`m`.`fk_patId`)
and `m`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

//----End Beans Custom Queries------
//----Start General Custom Queries-----
function qAnalyzerForm6GeneralProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.respondent as `Respondent`,
case
	when q.loan_accessed > '0' then 'Yes'
else 'No'
end 
as `Accessed a loan`,
format(q.loan_accessed,0) as  `Amount Loan accessed`,
case
	when q.implemented_mgt_climate = '1' then 'Yes'
	when q.implemented_mgt_climate = '0' then 'No'
else 'null'
end 
as  `Implemented management practices`, 
replace(replace(replace(replace(replace(replace(concat(
(replace(q.implemented_mgt_climate_action, '1', 'Use of improved seed varieties,')), 
(replace(q.implemented_mgt_climate_action, '2', 'Irrigation,')), 
(replace(q.implemented_mgt_climate_action, '3', 'Planting early maturing crop varieties,')), 
(replace(q.implemented_mgt_climate_action, '4', 'Planting drought resistant varieties,')),
(replace(q.implemented_mgt_climate_action, '5', 'mulching,')),
(replace(q.implemented_mgt_climate_action, '6', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6','') as  `Management practices implemented`,
q.implemented_mgt_climate_action_other as  `Management practices implemented if Other`,
q.compiled_by as `Compiled By`,
q.telephone as  `Tel Data Compiler`,
q.gps as `GPS coordinates`,
q.msg_at_readtime as  `Message Logged at Readtime`,
q.readtime as `MIS Data Readtime`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`p`.`pk_patId`)
and `q`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}
function qAnalyzerForm6GeneralProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.interview_date as `Date Surveyed`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
p.respondent as `Respondent`,
case
	when q.loan_accessed > '0' then 'Yes'
else 'No'
end 
as `Accessed a loan`,
format(q.loan_accessed,0) as  `Amount Loan accessed`,
case
	when q.implemented_mgt_climate = '1' then 'Yes'
	when q.implemented_mgt_climate = '0' then 'No'
else 'null'
end 
as  `Implemented management practices`, 
replace(replace(replace(replace(replace(replace(concat(
(replace(q.implemented_mgt_climate_action, '1', 'Use of improved seed varieties,')), 
(replace(q.implemented_mgt_climate_action, '2', 'Irrigation,')), 
(replace(q.implemented_mgt_climate_action, '3', 'Planting early maturing crop varieties,')), 
(replace(q.implemented_mgt_climate_action, '4', 'Planting drought resistant varieties,')),
(replace(q.implemented_mgt_climate_action, '5', 'mulching,')),
(replace(q.implemented_mgt_climate_action, '6', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6','') as  `Management practices implemented`,
q.implemented_mgt_climate_action_other as  `Management practices implemented if Other`,
q.compiled_by as `Compiled By`,
q.telephone as  `Tel Data Compiler`,
q.gps as `GPS coordinates`,
q.msg_at_readtime as  `Message Logged at Readtime`,
q.readtime as `MIS Data Readtime`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`p`.`pk_patId`)
and `q`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}
function qAnalyzerForm6GeneralProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption){
$query_string="SELECT
f.farmersSex as `Farmer Gender`, 
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
p.interview_date as `Date Surveyed`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`,
p.respondent as `Respondent`,
case
	when q.loan_accessed > '0' then 'Yes'
else 'No'
end 
as `Accessed a loan`,
format(q.loan_accessed,0) as  `Amount Loan accessed`,
case
	when q.implemented_mgt_climate = '1' then 'Yes'
	when q.implemented_mgt_climate = '0' then 'No'
else 'null'
end 
as  `Implemented management practices`, 
replace(replace(replace(replace(replace(replace(concat(
(replace(q.implemented_mgt_climate_action, '1', 'Use of improved seed varieties,')), 
(replace(q.implemented_mgt_climate_action, '2', 'Irrigation,')), 
(replace(q.implemented_mgt_climate_action, '3', 'Planting early maturing crop varieties,')), 
(replace(q.implemented_mgt_climate_action, '4', 'Planting drought resistant varieties,')),
(replace(q.implemented_mgt_climate_action, '5', 'mulching,')),
(replace(q.implemented_mgt_climate_action, '6', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6','') as  `Management practices implemented`,
q.implemented_mgt_climate_action_other as  `Management practices implemented if Other`,
q.compiled_by as `Compiled By`,
q.telephone as  `Tel Data Compiler`,
q.gps as `GPS coordinates`,
q.msg_at_readtime as  `Message Logged at Readtime`,
q.readtime as `MIS Data Readtime`
FROM 
`tbl_frm6particulars` as `p` join `tbl_frm6gqnsandgps` as `q` on (`q`.`fk_patId`=`p`.`pk_patId`)
and `q`.`farmer_code` = `p`.`farmer_code`,
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`

WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode`
".$dateOption."
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

//----End General Custom Queries------

//----Start Form7 Queries-----
function qAnalyzerForm7GroupsRegion($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
and vg.groupName <> 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7GroupsTrader($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
and vg.groupName <> 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7GroupsVA($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName <> 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7GroupsGender($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
f.farmersSex as `Farmer Gender`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName <> 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7NoGroupsRegion($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName = 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7NoGroupsTrader($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName = 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7NoGroupsVA($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
f.farmersSex as `Farmer Gender`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName = 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

function qAnalyzerForm7NoGroupsGender($primarySortField,$secondarySortField,$oder,$limitOption){
$query_string="select
f.farmersSex as `Farmer Gender`,
f.farmersName as `Farmer Name`,
f.tbl_farmersId as `Farmer Code`,
TIMESTAMPDIFF(YEAR,f.farmersDob,CURDATE()) as `FarmerAge`,
f.farmersTel as `FarmerTel`, 
z.zoneName as `Farmer Region`,
d.districtName as `Farmer District`,
s.subcountyName as `Farmer Sub-County`,
f.farmersVillage as `Farmer Village`, 
t.traderName as `TraderName`,
t.traderCode as `TraderCode`,
v.vAgentName as `VAName`,
v.vAgentCode as `VACode`,
vg.groupName as `VAgroupName`,
vg.groupCode as `VAgroupCode`,
f.memberDstart as `DateStartedWorkingWithGroup`,
f.memberStatus as `New/Old`,
f.hhName as `HouseholdHeadName`, 
TIMESTAMPDIFF(YEAR,f.hhDob,CURDATE()) as `HouseholdHeadAge`,
f.hhSex as `HouseholdHeadGender`, 
f.hhHeadDStart as `DateStartedWorkingWithHH`, 
f.hhArea as `TotalAreaAvailableForCropping(Acres)`, 
f.hsComposition as `HouseholdComposition`
from
`tbl_traders` as `t` join `tbl_farmers` as `f`  on (`f`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagents` as `v` on (`v`.`tbl_tradersId`=`t`.`tbl_tradersId`)
join `tbl_villageagent_groups` as `vg` on (`vg`.`tbl_villageAgentId`=`v`.`tbl_villageAgentId`),
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s`
where `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty` = `s`.`subcountyCode`
and `t`.`display` = 'Yes'
and `v`.`display` = 'Yes'
and `vg`.`display` = 'Yes'
and `f`.`display` = 'Yes'
vg.groupName = 'No Group'
order by ".$primarySortField.",".$secondarySortField." ".$oder."
".$limitOption."";
return $query_string;	
}

//----Start Form7 Queries------


//----------------------End of Query Analyzer methods----------------------------------------------------
						
							
	
	
}
/* End of the Query Analyzer Class */



?>