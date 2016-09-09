<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('connections/lib_connectExtended.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug', false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION, 'ViewAnnualTargets'); //---PTT---
$xajax->register(XAJAX_FUNCTION, 'SemiAnnualAndAnnualIndicatorTracker');//Semi Annual and Annual Indicator Tracker
$xajax->register(XAJAX_FUNCTION, 'ViewAnnualAchievementsReport');// Annual Achievements
$xajax->register(XAJAX_FUNCTION, 'ViewSemiAnnualReport');//Annual Achievements

require_once('ActivityFilters.php');
#************************xxxxxxxxxxxxxxx************************
#************************xxxxxxxxxxxxxxx************************
function ViewAnnualTargets($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator, $cur_page = 1, $records_per_page = 20)
{
    $obj = new xajaxResponse();
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    $umobj = new umemsDataMining('');
    $imobj = new IndDissagDataMining('');
    $tmobj = new IndDissagTargets('');

    if ($_SESSION['username'] == NULL) {
        $obj->alert("Your Session Has Expired Please Login again!");
        $obj->redirect("index.php");
        return $obj;
    }


    $_SESSION['zoneID'] = '';
    $_SESSION['districtID'] = '';
    $_SESSION['indicator_Type'] = '';
    $_SESSION['subcomponent_id'] = '';
    $_SESSION['output'] = '';
    $_SESSION['fyear'] = '';
    $_SESSION['semiAnnual'] = '';
    $_SESSION['indicatorCode'] = '';
    $_SESSION['indicator'] = '';
//----------------------------------------
    $_SESSION['zoneID'] = $zone;
    $_SESSION['districtID'] = $district;
    $_SESSION['indicator_Type'] = $indicator_type;
    $_SESSION['subcomponent_id'] = $subcomponent;
    $_SESSION['output_id'] = $output;
    $_SESSION['fyear'] = ($year == '') ? currFinancialYear($_SESSION['Activeyear'], 'YearRange') : $year;
    $_SESSION['semiAnnual'] = ($semiAnnual == NULL) ? $_SESSION['quarter'] : $semiAnnual;
    $_SESSION['indicatorCode'] = $indicatorCode;
    $_SESSION['indicator'] = $indicator;
//-----------------------------------------
    if ($_SESSION['semiAnnual'] == 'Closed' || $_SESSION['fyear'] == 'Closed') {
        $obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
    }


$n = 1;
$data .= "<form name='annualTarget1' id='annualTarget1' action=\"" . $PHP_SELF . "\" method='post'>
	<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>" . filter_annualTargetActivityReport($fnctName = "ViewAnnualTargets");

			$data .= "<tr>
				<th rowspan='3' class='first-cell-header dataRow' >#</th>
				<th rowspan=3 colspan='6' class='largest-cell-header dataRow'>Indicator</th>
				<th colspan='20' class='dataRow' >
					Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((LOAA/LOAT)x100)</em>
				</th>
			</tr>
			<tr>
				<th  colspan='2' rowspan='2'  class='small-cell-header dataRow'>type of Indicator</th>
				<th  colspan='1' rowspan='2' class='small-cell-header dataRow'>unit of measure</th>
				<th  class='small-cell-header dataRow' rowspan='2'>Baseline</th>";
				$queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
				for ($n = intval($queryHeader['opening_year']); $n < intval($queryHeader['closure_year']); $n++) {
				switch ($n) {
				case 2013:
				$bgcolor = "background:#F0E68C; color:black;";
				break;
				case 2014:
				$bgcolor = "background:#f38fbf; color:black;";
				break;
				case 2015:
				$bgcolor = "background:#ccffff; color:black;";
				break;
				case 2016:
				$bgcolor = "background:#fde9d9; color:black;";
				break;
				case 2017:
				$bgcolor = "background:#ccccff; color:black;";
				break;
				case 2018:
				$bgcolor = "background:#98FB98; color:black;";
				}
				$data .= "<th width='100' style='" . $bgcolor . "' class='dataRow' align='right' colspan='2' >FY " . $n . "</th>";
				}
				$data .= "<th colspan='1'  rowspan='2'  class='small-cell-header dataRow'>LOA Targets</th>
				<th colspan='1' rowspan='2' class='small-cell-header dataRow'>LOA Actuals</th>
				<th colspan='1'   rowspan='2'  class='small-cell-header dataRow'><strong>% Achieved</strong></th>
			</tr>
			<tr>";

				for ($n = 0; $n < 6; $n++) {
				switch ($n) {
				case 0:
				$bgcolor = "background:#F0E68C; color:black;";
				break;
				case 1:
				$bgcolor = "background:#f38fbf; color:black;";
				break;
				case 2:
				$bgcolor = "background:#ccffff; color:black;";
				break;
				case 3:
				$bgcolor = "background:#fde9d9; color:black;";
				break;
				case 4:
				$bgcolor = "background:#ccccff; color:black;";
				break;
				case 5:
				$bgcolor = "background:#98FB98; color:black;";

				}
				$data .= "<th style='" . $bgcolor . "' width='100' class='small-cell-header dataRow' align='right'>T</th>";
				$data .= "<th style='" . $bgcolor . "' width='100' class='small-cell-header dataRow' align='right'>A</th>";
				}
			$data .= "</tr>
		</thead>
	<tbody>";
		$inc = 1;
		$logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' AND display='Yes' ORDER BY output_code ASC") or die(http(__line__));
		while ($rowoutput = @mysql_fetch_array($logicaloutput)) {
			
			$data .= "<tr style='background-color:#DCDCDC;'>
				<td><strong>" . $rowoutput['output_code'] . "</strong></td>
				<td colspan='25'><strong>" . $rowoutput['output_name'] . "</strong></td>
			</tr>";
			
			$x = $qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
			$_SESSION['queryExport'] = $x;
			$query = @mysql_query($x) or die(http(__line__));
			if (@mysql_num_rows($query) > 0)
				while ($row = @mysql_fetch_array($query)) {
				$baseline=$row['baseline'];
				$base=$baseline>0?$baseline:"-";				
				$l="align=right";
				
				$data .= "<tr>
				<td align=left>
					<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "
				</td>
				<td colspan='6' >" . stripslashes($row['indicator_name']) . "</td>
				<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>
				<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>
				<td align=right >" . number_format($base,2) . "</td>";
				
				$y = $qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year']);
				$qResults = Execute($y) or die(http(__line__));
				$rowWP = FetchRecords($qResults);
					switch ($row['indicator_id']) {
					default:
					$ActualYr1 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$ActualYr2 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$ActualYr3 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$ActualYr4 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$ActualYr5 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$ActualYr6 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

					break;
					}

					$one = "background:#F0E68C;";
					$two = "background:#f38fbf;";
					$three = "background:#ccffff;";
					$four = "background:#fde9d9;";
					$five = "background:#ccccff;";
					$six = "background:#98FB98;";

					$data .= "<td style='" . $one . "' rowspan='" . $rowspan . "' align='right' >
					<input type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >";
					$data .= "<input type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >
					<input type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >
					" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "</td>
					<td style='" . $one . "'  align='right' >" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>
					<td style='" . $two . "' rowspan='" . $rowspan . "' align='right' >" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>
					<td style='" . $two . "' align='right' >" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>
					<td style='" . $three . "' rowspan='" . $rowspan . "' align='right' >" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>
					<td style='" . $three . "' align='right' >" . checkExistance($ActualYr3, 0, 'ExistsInteger') . "</td>
					<td style='" . $four . "' rowspan='" . $rowspan . "' align='right' colspan='1' >" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>
					<td style='" . $four . "' align='right' >" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>
					<td style='" . $five . "' rowspan='" . $rowspan . "' align='right' colspan='1' >" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>
					<td style='" . $five . "' align='right' >" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>
					<td style='" . $six . "' rowspan='" . $rowspan . "' align='right' colspan='1' >" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>
					<td style='" . $six . "' align='right' >" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
					$LOAT = $qmobj->identifyIndicatorLevelTargets($row['unitofmeasure'], $rowWP['fy1'], $rowWP['fy2'], $rowWP['fy3'], $rowWP['fy4'], $rowWP['fy5'], $rowWP['fy6'], $yr7 = 0);
					$LOAA = $qmobj->identifyIndicatorLevelActuals($row['unitofmeasure'], $ActualYr1, $ActualYr2, $ActualYr3, $ActualYr4, $ActualYr5, $ActualYr6, $yr7 = 0);
					$data .= "<td align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>
					<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
					$percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);
					$data .= $percentageAc;
					$data .= "</tr>";
					
					$startYear = $queryHeader['opening_year'];
					$closeYear = $queryHeader['closure_year'];
					$cells = 6;
					$colorArray = array($one, $two, $three, $four, $five, $six);
						switch ($inc) {
						case 1:
						$i = 1;
						$sCpm = $qmobj->cpmSubIndicatorsOnly(13);
						$qCpm = @Execute($sCpm) or die(http(__line__));
							while ($rowCpm = @FetchRecords($qCpm)) {
								if ($rowCpm['otherMeasures'] == '') {
								} else {
									/* The display of dissggregations */
									$subIndTarget = (($rowCpm['Target'] <> '' || $rowCpm['Target'] <> null) ? $rowCpm['Target'] : 0);
									$data .= "<tr>
									<td colspan='7' align='right'><strong>" . $rowCpm['otherMeasures'] . "</strong></td>
									<td colspan='2'>" . $rowCpm['indicator_type'] . "</td>
									<td>" . $rowCpm['indUnitofmeasure'] . "</td>
									<td align='right'>" . number_format($rowCpm['subBaseline'],2) . "</td>";
									$x = 1;
									foreach ($colorArray as $var) {

										switch ($i) {
											case 1:
											$newIndicatorId = "2.1";
											break;

											case 2:
											$newIndicatorId = "2.2";
											break;

											case 3:
											$newIndicatorId = "2.3";
											break;
										}
										$data .= "<td style='" . $var . "'  align='right'>" . checkExistance($tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy' . $x . ''), 0, 'ExistsInteger') . "</td>";
										$data .= "<td style='" . $var . "'  align='right'>" . checkExistance($imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr' . $x . ''), 0, 'ExistsInteger') . "</td>";
										$x++;
									}
									switch ($newIndicatorId) {
										default:
										$ActualYr1 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr1');
										$ActualYr2 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr2');
										$ActualYr3 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr3');
										$ActualYr4 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr4');
										$ActualYr5 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr5');
										$ActualYr6 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr6');

										/* targets */
										$TargetYr1 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy1');
										$TargetYr2 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy2');
										$TargetYr3 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy3');
										$TargetYr4 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy4');
										$TargetYr5 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy5');
										$TargetYr6 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy6');
										break;
									}
									$LOAT = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $TargetYr1, $TargetYr2, $TargetYr3, $TargetYr4, $TargetYr5, $TargetYr6, $yr7 = 0);
									$LOAA = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $ActualYr1, $ActualYr2, $ActualYr3, $ActualYr4, $ActualYr5, $ActualYr6, $yr7 = 0);
									$data .= "<td valign='' align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>";
									$data .= "<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
									$percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);
									$data .= $percentageAc;
									$adata .= "</tr>";
								}
							$i++;
							}
						break;

						//Indicator 25
						case 25:
						$i = 1;
						$sCpm = $qmobj->cpmSubIndicatorsOnly(36);
						$qCpm = @Execute($sCpm) or die(http(__line__));
							while ($rowCpm = @FetchRecords($qCpm)) {
								if ($rowCpm['otherMeasures'] == '') {
								} else {
									/* The display of dissggregations */
									$subIndTarget = (($rowCpm['Target'] <> '' || $rowCpm['Target'] <> null) ? $rowCpm['Target'] : 0);
									$data .= "<tr>
									<td colspan='7' align='right'><strong>" . $rowCpm['otherMeasures'] . "</strong></td>
									<td colspan='2'>" . $rowCpm['indicator_type'] . "</td>
									<td>" . $rowCpm['indUnitofmeasure'] . "</td>
									<td align='right'>" . number_format($rowCpm['subBaseline'],2) . "</td>";
									$x = 1;
									foreach ($colorArray as $var) {
										switch ($i) {
										case 1:
											$newIndicatorId = "25.1";
										break;

										case 2:
											$newIndicatorId = "25.2";
										break;

										case 3:
											$newIndicatorId = "25.3";
										break;
									}
									$data .= "<td style='" . $var . "'   align='right'>" . checkExistance($tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy' . $x . ''), 0, 'ExistsInteger') . "</td>";
									$data .= "<td style='" . $var . "'   align='right'>" . checkExistance($imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr' . $x . ''), 0, 'ExistsInteger') . "</td>";
									$x++;
									}
									switch ($newIndicatorId) {
										default:
											$ActualYr1 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr1');
											$ActualYr2 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr2');
											$ActualYr3 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr3');
											$ActualYr4 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr4');
											$ActualYr5 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr5');
											$ActualYr6 = $imobj->dissagMiningIndicator($newIndicatorId, $startYear, $closeYear, 'notrainedYr6');

											/* targets */
											$TargetYr1 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy1');
											$TargetYr2 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy2');
											$TargetYr3 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy3');
											$TargetYr4 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy4');
											$TargetYr5 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy5');
											$TargetYr6 = $tmobj->dissagTargetsIndicator($newIndicatorId, $startYear, $closeYear, 'fy6');
										break;
									}
									$LOAT = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $TargetYr1, $TargetYr2, $TargetYr3, $TargetYr4, $TargetYr5, $TargetYr6, $yr7 = 0);
									$LOAA = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $ActualYr1, $ActualYr2, $ActualYr3, $ActualYr4, $ActualYr5, $ActualYr6, $yr7 = 0);
									$data .= "<td align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>";
									$data .= "<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
									$percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);
									$data .= $percentageAc;
									$adata .= "</tr>";
								}
							$i++;
							}
						break;

						default:
						break;
						}
					$inc++;
					}
		}
	$data .= "" . noRecordsFound($qResults, 10) . "";
	$data .= "<tbody>
	</table>
</form>";
$obj->assign('bodyDisplay', 'innerHTML', $data);
$obj->call("hideLoadingDiv");
return $obj;
}

function SemiAnnualAndAnnualIndicatorTracker($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator, $cur_page = 1, $records_per_page = 20)
{
    $obj = new xajaxResponse();
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    if ($_SESSION['username'] == NULL) {
        $obj->alert("Your Session Has Expired Please Login again!");
        $obj->redirect("index.php");
        return $obj;
    }

    $_SESSION['zoneID'] = '';
    $_SESSION['districtID'] = '';
    $_SESSION['indicator_Type'] = '';
    $_SESSION['subcomponent_id'] = '';
    $_SESSION['output'] = '';
    $_SESSION['fyear'] = '';
    $_SESSION['semiAnnual'] = '';
    $_SESSION['indicatorCode'] = '';
    $_SESSION['indicator'] = '';
//----------------------------------------
    $_SESSION['zoneID'] = $zone;
    $_SESSION['districtID'] = $district;
    $_SESSION['indicator_Type'] = $indicator_type;
    $_SESSION['subcomponent_id'] = $subcomponent;
    $_SESSION['output_id'] = $output;
    $_SESSION['fyear'] = ($year == '') ? currFinancialYear($_SESSION['Activeyear'], 'YearRange') : $year;
    $_SESSION['semiAnnual'] = ($semiAnnual == NULL) ? $_SESSION['quarter'] : $semiAnnual;
    $_SESSION['indicatorCode'] = $indicatorCode;
    $_SESSION['indicator'] = $indicator;
//-----------------------------------------
    if ($_SESSION['semiAnnual'] == 'Closed' || $_SESSION['fyear'] == 'Closed') {
        $obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
    }


    $n = 1;

$data .= "<form name='annualTarget1' id='annualTarget1' action=\"" . $PHP_SELF . "\" method='post'><table cellspacing='1' id='report' width='100%'>" . filter_SemiAnnualAndAnnualIndicatorTracker($fnctName = "SemiAnnualAndAnnualIndicatorTracker");
	$data .= "<tr>
		<th rowspan='3' class='dataRow' >NO/SELECT</th>
		<th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		<th colspan='30' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((A/T)x100)</em></center></th>
	</tr>
	<tr>
		<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
		<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
		<th  class='dataRow' rowspan='2'>Baseline</th>";
		$data .= "<th colspan='1'  rowspan='2'  class='dataRow'>LOA Targets</th>";
		$data .= "<th colspan='1' rowspan='2' class='dataRow'>LOA Actuals</th>";
		$data .= "<th colspan='1'   rowspan='2'  class='dataRow'><strong>% Achieved</strong> </th>";
		
		$queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
		$opening_year = $queryHeader['opening_year'];
		$closure_year = $queryHeader['closure_year'];
		
		$data .= "<th width='100' class='yearOne' align='right' colspan='3'>Apr " . TheFinancialYear($opening_year, $closure_year, 0) . " - Sep " . TheFinancialYear($opening_year, $closure_year, 0) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
		$data .= "<th width='100' class='yearTwo' align='right' colspan='4'>Oct " . TheFinancialYear($opening_year, $closure_year, 0) . " - Sep " . TheFinancialYear($opening_year, $closure_year, 1) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
		$data .= "<th width='100' class='yearThree' align='right' colspan='4'>Oct " . TheFinancialYear($opening_year, $closure_year, 1) . " - Sep " . TheFinancialYear($opening_year, $closure_year, 2) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
		$data .= "<th width='100' class='yearFour' align='right' colspan='4'>Oct " . TheFinancialYear($opening_year, $closure_year, 2) . " - Sep " . TheFinancialYear($opening_year, $closure_year, 3) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
		$data .= "<th width='100' class='yearFive' align='right' colspan='4'>Oct " . TheFinancialYear($opening_year, $closure_year, 3) . " - Sep " . TheFinancialYear($opening_year, $closure_year, 4) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
		$data .= "<th width='100' class='yearSix' align='right' colspan='4'>Oct " . TheFinancialYear($opening_year, $closure_year, 4) . "   - Mar " . TheFinancialYear($opening_year, $closure_year, 5) . "<img src='images/spacer2.png' width='20' height='0.1'></th>";
	$data .= "</tr>";

	$data .= "<tr>";
	$data .= "<th width='100' class='yearOne' align='right'>T</th>";
	$data .= "<th width='100' class='yearOne' align='right'>A</th>";
	$data .= "<th colspan='1' class='yearOne'><strong>% Achieved</strong> </th>";
	for ($n = 0; $n < 5; $n++) {
		
		switch ($n) {
						
						case 0:
							$class = "yearTwo";
							break;
						case 1:
							$class = "yearThree";
							break;
						case 2:
							$class = "yearFour";
							break;
						case 3:
							$class = "yearFive";
							break;
						case 4:
							$class = "yearSix";
							break;

					}
		
		
		$data .= "<th width='100' class='".$class."' align='right'>T</th>";
		$data .= "<th width='100' class='".$class."' align='right'>A</th>";
		$data .= "<th width='100' class='".$class."' align='right'>Annual</th>";
		$data .= "<th colspan='1' class='".$class."'><strong>% Achieved</strong> </th>";

	}
	$data .= "</tr>";


$inc = 1;
$logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' ORDER BY output_code ASC") or die(http(__line__));
while ($rowoutput = @mysql_fetch_array($logicaloutput)) {
        $data .= "<tr><td><strong>" . $rowoutput['output_code'] . "</strong></td><td colspan='20'><strong>" . $rowoutput['output_name'] . "</strong></td></tr>";
		$x = $qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
		$_SESSION['queryExport'] = $x;
        $query = @mysql_query($x) or die(http(__line__));
        if (@mysql_num_rows($query) > 0)
            while ($row = @mysql_fetch_array($query)) {
                $baseline = $row['baseline'];
                $base = $baseline > 0 ? $baseline : "-";
                $color=$inc%2==1?"evenrow":"white1";
				$events2 = "onMouseover=\"this.style.color='#001E55',this.style.fontWeight='bold',this.style.backgroundColor='#666666';\" onMouseout=\"this.style.color='black',this.style.fontWeight='normal',this.style.backgroundColor='';\"";
				$l="align=right";
				
				$data.="<tbody class='".$color."' ".$events2.">";
				$data.="<tr>
					<td align=left><input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "</td>
					<td align=left ><input type=hidden name='loopkey[]'  id='loopkey'  value='1' />" . $row['indicator_code'] . "</td>
					<td colspan='5'>".$row['indicator_name']."</td>
					<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>
					<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>
					<td align=right >" . number_format($base) . "</td>";

                $y = $qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year']);
                $qResults = Execute($y) or die(http(__line__));
                $rowWP = FetchRecords($qResults);
				
				$ActualYr1 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
                $ActualYr2 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
                $ActualYr3 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
                $ActualYr4 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
                $ActualYr5 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
                $ActualYr6 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				
				$yrOne='yearOne';
				$yrTwo='yearTwo';
				$yrThree='yearThree';
				$yrFour='yearFour';
				$yrFive='yearFive';
				$yrSix='yearSix';
				
                $percentageAcyR1 = ColorCodingByYears(calc_Percentage($rowWP['fy1'], $ActualYr1), 1, 1, $yrOne);
                $percentageAcyR2 = ColorCodingByYears(calc_Percentage($rowWP['fy2'], $ActualYr2), 1, 1, $yrTwo);
                $percentageAcyR3 = ColorCodingByYears(calc_Percentage($rowWP['fy3'], $ActualYr3), 1, 1, $yrThree);
                $percentageAcyR4 = ColorCodingByYears(calc_Percentage($rowWP['fy4'], $ActualYr4), 1, 1, $yrFour);
                $percentageAcyR5 = ColorCodingByYears(calc_Percentage($rowWP['fy5'], $ActualYr5), 1, 1, $yrFive);
                $percentageAcyR6 = ColorCodingByYears(calc_Percentage($rowWP['fy6'], $ActualYr6), 1, 1, $yrSix);

                $data .= "<td valign='' align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>
				<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
                $percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);
                $data .= $percentageAc;

                $data .= "<td align='right' class='yearOne' >
					<input type='hidden' name='workplan_id[]' id='workplan_id' value='" . $rowWP['workplan_id'] . "' >
					<input type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >
					<input type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "
				</td>
				<td align='right' class='yearOne'>" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageAcyR1;

                $data .= "<td align='right' class='yearTwo'>" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>
				<td align='right' class='yearTwo'>" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearTwo'>-</td>";
                $data .= $percentageAcyR2;
				
                $data .= "<td align='right' class='yearThree'>" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>
				<td align='right' class='yearThree'>" . checkExistance($ActualYr3, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearThree'>-</td>";
                $data .= $percentageAcyR3;

                $data .= "<td align='right' class='yearFour'>" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>
				<td align='right' class='yearFour'>" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFour'>-</td>";
                $data .= $percentageAcyR4;
				
				$data .= "<td align='right' class='yearFive'>" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>
				<td align='right' class='yearFive'>" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFive'>-</td>";
                $data .= $percentageAcyR5;

				$data .= "<td align='right' class='yearSix'>" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>
				<td align='right' class='yearSix'>" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearSix' >-</td>";
                $data .= $percentageAcyR6;
				
				$data .= "</tr>";
				$data.="</tbody>";
				
                $inc++;
            }
    }


    $data .= "" . noRecordsFound($query, 10) . "";


    $data .= "</table></form>";
    $obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv");
    return $obj;
}

function ViewAnnualAchievementsReport($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator, $cur_page = 1, $records_per_page = 20)
{
    $obj = new xajaxResponse();
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    if ($_SESSION['username'] == NULL) {
        $obj->alert("Your Session Has Expired Please Login again!");
        $obj->redirect("index.php");
        return $obj;
    }


    $_SESSION['zoneID'] = '';
    $_SESSION['districtID'] = '';
    $_SESSION['indicator_Type'] = '';
    $_SESSION['subcomponent_id'] = '';
    $_SESSION['output'] = '';
    $_SESSION['fyear'] = '';
    $_SESSION['semiAnnual'] = '';
    $_SESSION['indicatorCode'] = '';
    $_SESSION['indicator'] = '';
//----------------------------------------
    $_SESSION['zoneID'] = $zone;
    $_SESSION['districtID'] = $district;
    $_SESSION['indicator_Type'] = $indicator_type;
    $_SESSION['subcomponent_id'] = $subcomponent;
    $_SESSION['output_id'] = $output;
    $_SESSION['fyear'] = ($year == '') ? currFinancialYear($_SESSION['Activeyear'], 'YearRange') : $year;
    $_SESSION['semiAnnual'] = ($semiAnnual == NULL) ? $_SESSION['quarter'] : $semiAnnual;
    $_SESSION['indicatorCode'] = $indicatorCode;
    $_SESSION['indicator'] = $indicator;
//-----------------------------------------
    if ($_SESSION['semiAnnual'] == 'Closed' || $_SESSION['fyear'] == 'Closed') {
        $obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
    }


    $n = 1;

    $data .= "<form name='annualTarget1' id='annualTarget1' action=\"" . $PHP_SELF . "\" method='post'><table cellspacing='1'  id='report'     width='100%' >
" . filter_ViewAnnualAchievementsReport($fnctName = "ViewAnnualAchievementsReport");
//


    $data .= "<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='23' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>,  T=Target,A=Actual, % Achieved=>((A/T)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";

    $queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
    //or die(http("WP-00236"));
    for ($n = intval($queryHeader['opening_year']); $n < intval($queryHeader['closure_year']); $n++) {
        switch ($n) {
            case 2013:
                $bgcolor = "background:#F0E68C; color:black;";
                break;
            case 2014:
                $bgcolor = "background:#f38fbf; color:black;";
                break;
            case 2015:
                $bgcolor = "background:#ccffff; color:black;";
                break;
            case 2016:
                $bgcolor = "background:#fde9d9; color:black;";
                break;
            case 2017:
                $bgcolor = "background:#ccccff; color:black;";
                break;
            case 2018:
                $bgcolor = "background:#98FB98; color:black;";

        }

        $data .= "<th width='100' style='" . $bgcolor . "' class='dataRow' align='right' colspan='3' >FY " . $n . "
					<img src='images/spacer2.png' width='15' height='0.1'></th>";

    }

    $data .= "</tr>";

    $data .= "<tr>";
    for ($n = 0; $n < 6; $n++) {
        switch ($n) {
            case 0:
                $bgcolor = "background:#F0E68C; color:black;";
                break;
            case 1:
                $bgcolor = "background:#f38fbf; color:black;";
                break;
            case 2:
                $bgcolor = "background:#ccffff; color:black;";
                break;
            case 3:
                $bgcolor = "background:#fde9d9; color:black;";
                break;
            case 4:
                $bgcolor = "background:#ccccff; color:black;";
                break;
            case 5:
                $bgcolor = "background:#98FB98; color:black;";

        }
        $data .= "<th style='" . $bgcolor . "' width='100' class='dataRow' align='right'>T</th>";
        $data .= "<th style='" . $bgcolor . "' width='100' class='dataRow' align='right'>A</th>";
        $data .= "<th style='" . $bgcolor . "' width='100' class='dataRow' align='right'>% ACHV'T</th>";

    }
    $data .= "</tr>";
    $inc = 1;

    $logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' AND display='Yes' ORDER BY output_code ASC") or die(http(__line__));

    while ($rowoutput = @mysql_fetch_array($logicaloutput)) {
        $data .= "<tr><td><strong>" . $rowoutput['output_code'] . "</strong></td><td colspan='20'><strong>" . $rowoutput['output_name'] . "</strong></td></tr>";


        $x = $qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);


        $_SESSION['queryExport'] = $x;
        $query = @mysql_query($x) or die(http(__line__));
        if (@mysql_num_rows($query) > 0)
            while ($row = @mysql_fetch_array($query)) {
                $baseline = $row['baseline'];
                $base = $baseline > 0 ? $baseline : "-";
                $color = $inc % 2 == 1 ? "evenrow" : "white1";
                $events2 = "onmouseup=\"this.style.backgroundColor='#666666';\"";


                $l = "align=right";


                $data .= "<tr class=$color " . $events2 . ">
 									<td align=left>
 									
									
 									<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "</td>
           							<td align=left ><input type=hidden name='loopkey[]'  id='loopkey'  value='1' />" . $row['indicator_code'] . "</td>
									<td colspan='5' >" . (mysql_real_escape_string(trim($row['indicator_name']))) . "</td>
									<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>
									<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>
								
									<td align=right >" . number_format($base) . "</td>";

                $y = $qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year']);
                $qResults = @Execute($y) or die(http(__line__));
                $rowWP = FetchRecords($qResults);


                /*$obj->alert($xActual);
										$xActual=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');	
										//$Actualquery=@mysql_query($xActual) or die(http("DM-0027"));
										 $result1=@mysql_fetch_array($Actualquery);*/
                $ActualYr1 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
                $ActualYr2 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
                $ActualYr3 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
                $ActualYr4 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
                $ActualYr5 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
                $ActualYr6 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

                $one = "background:#F0E68C;";
                $two = "background:#F38FBF;";
                $three = "background:#CFF;";
                $four = "background:#FDE9D9;";
                $five = "background:#CCF;";
                $six = "background:#98FB98;";


                $percentageAcyR1 = ColorCodingGeneral(calc_Percentage($rowWP['fy1'], $ActualYr1), $one);
                $percentageAcyR2 = ColorCodingGeneral(calc_Percentage($rowWP['fy2'], $ActualYr2), $two);
                $percentageAcyR3 = ColorCodingGeneral(calc_Percentage($rowWP['fy3'], $ActualYr3), $three);
                $percentageAcyR4 = ColorCodingGeneral(calc_Percentage($rowWP['fy4'], $ActualYr4), $four);
                $percentageAcyR5 = ColorCodingGeneral(calc_Percentage($rowWP['fy5'], $ActualYr5), $five);
                $percentageAcyR6 = ColorCodingGeneral(calc_Percentage($rowWP['fy6'], $ActualYr6), $six);


                $data .= "<td style='" . $one . "' align='right' ><input type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >
								<input type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >
								<input type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >
									" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "</td>
									<td style='" . $one . "' align='right' >" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageAcyR1;

                $data .= "<td style='" . $two . "' align='right' >" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>
									<td style='" . $two . "' align='right' >" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageAcyR2;


                $data .= "<td style='" . $three . "' align='right' >" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>
									<td style='" . $three . "' align='right' >" . checkExistance($ActualYr3, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageAcyR3;


                $data .= "<td style='" . $four . "' align='right' colspan='1' >
									" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>
									<td style='" . $four . "' align='right' >" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>
									";
                $data .= $percentageAcyR4;


                $data .= "<td style='" . $five . "' align='right' colspan='1' >
									" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>
									<td style='" . $five . "' align='right' >" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>
									";

                $data .= $percentageAcyR5;


                $data .= "<td style='" . $six . "' align='right' colspan='1' >
									" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>
									<td style='" . $six . "' align='right' >" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageAcyR6;


                $data .= "</tr>";
                $inc++;
            }
    }


    $data .= "" . noRecordsFound($query, 10) . "";


    $data .= "</table></form>";
    $obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv");
    return $obj;
}

function ViewSemiAnnualReport($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator, $cur_page = 1, $records_per_page = 20)
{
    $obj = new xajaxResponse();
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    if ($_SESSION['username'] == NULL) {
        $obj->alert("Your Session Has Expired Please Login again!");
        $obj->redirect("index.php");
        return $obj;
    }


    $_SESSION['zoneID'] = '';
    $_SESSION['districtID'] = '';
    $_SESSION['indicator_Type'] = '';
    $_SESSION['subcomponent_id'] = '';
    $_SESSION['output'] = '';
    $_SESSION['fyear'] = '';
    $_SESSION['semiAnnual'] = '';
    $_SESSION['indicatorCode'] = '';
    $_SESSION['indicator'] = '';
//----------------------------------------
    $_SESSION['zoneID'] = $zone;
    $_SESSION['districtID'] = $district;
    $_SESSION['indicator_Type'] = $indicator_type;
    $_SESSION['subcomponent_id'] = $subcomponent;
    $_SESSION['output_id'] = $output;
    $_SESSION['fyear'] = ($year == '') ? currFinancialYear($_SESSION['Activeyear'], 'YearRange') : $year;
    $_SESSION['semiAnnual'] = ($semiAnnual == NULL) ? $_SESSION['quarter'] : $semiAnnual;
    $_SESSION['indicatorCode'] = $indicatorCode;
    $_SESSION['indicator'] = $indicator;
//-----------------------------------------
    if ($_SESSION['semiAnnual'] == 'Closed' || $_SESSION['fyear'] == 'Closed') {
        $obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
    }


    $n = 1;

    $data .= "<form name='annualTarget1' id='annualTarget1' action=\"" . $PHP_SELF . "\" method='post'><table cellspacing='1'  id='report'     width='100%' >
" . filter_annualTargetActivityReport($fnctName = "ViewAnnualTargets");
//


    $data .= "<tr><th rowspan='3' class='dataRow' >NO/SELECT</th>
			 <th rowspan=3 colspan='6' width='' class='dataRow'>Indicator<img src='images/spacer2.png' width='200' height='0.1'></th>
		
		<th colspan='20' class='dataRow' ><center>Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((LOAA/LOAT)x100)</em></center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='dataRow'>type of Indicator <img src='images/spacer2.png' width='100' height='0.1'></th>
			 	<th  colspan='1' rowspan='2' class='dataRow'>unit of measure</th>
			   <th  class='dataRow' rowspan='2'>Baseline</th>";

    $queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
    //or die(http("WP-00236"));
    for ($n = intval($queryHeader['opening_year']); $n < intval($queryHeader['closure_year']); $n++) {
        $data .= "<th width='100' class='dataRow' align='right' colspan='2' >FY " . $n . "<img src='images/spacer2.png' width='15' height='0.1'></th>";

    }
    $data .= "<th colspan='1'  rowspan='2'  class='dataRow'>LOA Targets</th>";
    $data .= "<th colspan='1' rowspan='2' class='dataRow'>LOA Actuals</th>";
    $data .= "<th colspan='1'   rowspan='2'  class='dataRow'><strong>% Achieved</strong> </th>";

    $data .= "</tr>";

    $data .= "<tr>";
    for ($n = 0; $n < 6; $n++) {
        $data .= "<th width='100' class='dataRow' align='right'>T</th>";
        $data .= "<th width='100' class='dataRow' align='right'>A</th>";

    }
    $data .= "</tr>";
    $inc = 1;

    $logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' ORDER BY output_code ASC") or die(http(__line__));

    while ($rowoutput = @mysql_fetch_array($logicaloutput)) {
        $data .= "<tr><td><strong>" . $rowoutput['output_code'] . "</strong></td><td colspan='20'><strong>" . $rowoutput['output_name'] . "</strong></td></tr>";


        $x = $qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
#$obj->alert($x);


        $_SESSION['queryExport'] = $x;
        $query = @mysql_query($x) or die(http(__line__));
        if (@mysql_num_rows($query) > 0)
            while ($row = @mysql_fetch_array($query)) {
                $baseline = $row['baseline'];
                $base = $baseline > 0 ? $baseline : "-";
                $color = $inc % 2 == 1 ? "evenrow3" : "white1";
                $events2 = "onmouseup=\"this.style.backgroundColor='#666666';\"";


                $l = "align=right";


                $data .= "<tr class=$color " . $events2 . ">
 									<td align=left>
 									
									
 									<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "</td>
           							<td align=left ><input type=hidden name='loopkey[]'  id='loopkey'  value='1' />" . $row['indicator_code'] . "</td>
									<td colspan='5' >" . (mysql_real_escape_string(trim($row['indicator_name']))) . "</td>
									<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>
									<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>
								
									<td align=right >" . number_format($base) . "</td>";

                $y = $qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year']);
                $qResults = Execute($y) or die(http(__line__));
                $rowWP = FetchRecords($qResults);


                /*$obj->alert($xActual);
										$xActual=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');	
										//$Actualquery=@mysql_query($xActual) or die(http("DM-0027"));
										 $result1=@mysql_fetch_array($Actualquery);*/
                $ActualYr1 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
                $ActualYr2 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
                $ActualYr3 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
                $ActualYr4 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
                $ActualYr5 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
                $ActualYr6 = $dmobj->MiningIndicator15($row['indicator_id'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

                //$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
                $data .= "<td align='right' class='yearOne' ><input type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >
									<input type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >
									<input type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >
									" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearOne' >" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearTwo' >" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearTwo' >" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearThree' >" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearThree' >" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFour' colspan='1' >" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearFour' >" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFive' colspan='1' >" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearFive' >" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearSix' colspan='1' >" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>
									<td align='right' class='yearSix' >" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
                $LOAT = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $rowWP['fy1'], $rowWP['fy2'], $rowWP['fy3'], $rowWP['fy4'], $rowWP['fy5'], $rowWP['fy6'], $yr7 = 0);
                $LOAA = $qmobj->identifyIndicatorLevel($row['unitofmeasure'], $ActualYr1, $ActualYr2, $ActualYr3, $ActualYr4, $ActualYr5, $ActualYr6, $yr7 = 0);
                $data .= "<td valign='' align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>
									<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
                //$obj->alert($LOAT."-".$LOAA);
                $percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);

                $data .= $percentageAc;


                $data .= "</tr>";
                $inc++;
            }
    }


    $data .= "" . noRecordsFound($query, 10) . "";


    $data .= "</table></form>";
    $obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv");
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM Indicator Performance Tracking Table...</span></div>
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

					switch($linkvar){
						case"Performance Tracking Table":
						?>
						xajax_ViewAnnualTargets('', '', '', '', '', '', '', '', '', 1, 20);
						<?php 
						break;
						case"Semi Annual and Annual Indicator Tracker (All Disaggregations)":
						?>
						xajax_SemiAnnualAndAnnualIndicatorTracker('', '', '', '', '', '', '', '', '', 1, 20);
						<?php 
						break;

						case"Annual Achievements":
						?>
						xajax_ViewAnnualAchievementsReport('', '', '', '', '', '', '', '', '', 1, 20);
						<?php 
						break;

						case"Semi Annual and Annual Indicator Tracker (Main Disaggregations)":
						?>
						xajax_SemiAnnualAndAnnualIndicatorTracker('', '', '', '', '', '', '', '', '', 1, 20);
						<?php 
						break;


						default: ?>

						<?php } ?>
					</script>
				</div>
			</td>
		</tr>
	</table>
</td>
</tr>
</table>
</td>
<td width="12%" bgcolor="#f0f0f0">&nbsp;</td>
</tr>
<tr>
<td height="38" bgcolor="#F0F0F0">&nbsp;</td>
<td height="38"><?php require_once('connections/footer.php'); ?></td>
<td height="38" bgcolor="#f0f0f0">&nbsp;</td>
</tr>
</table>
</td>
</tr>
</table>
<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
height="178" scrolling="no" width="199"></iframe>
</body>
</html>

