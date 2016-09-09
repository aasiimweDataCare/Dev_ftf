<?php
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('connections/lib_connectExtended.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug', false);
global $sem_annual;
#*************************************
$xajax->register(XAJAX_FUNCTION, 'melaReport'); //---PTT---


require_once('ActivityFilters.php');
#************************xxxxxxxxxxxxxxx************************
#************************xxxxxxxxxxxxxxx***********************
#======


function melaReport($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator, $cur_page = 1, $records_per_page = 20)
{
    $obj = new xajaxResponse();
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    $umobj = new umemsDataMining('');
    $umemsRepL2Obj = new umemsDataMiningLevelOne('');

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

    $data = '';

    
	
	$data .= "<form name='mela_report' id='mela_report' action=\"" . $PHP_SELF . "\" method='post'>
	<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>" . filter_melaReport($fnctName = "filter_melaReport");

    //start of report retrieval
    $data .= "<tr>
				<th rowspan='3' class='first-cell-header dataRow' >#</th>
				<th rowspan=3 colspan='6' class='largest-cell-header dataRow'>Indicator/Disaggregation</th>
				<th colspan='23' class='dataRow' >MELA Report for the for the Period 2013 - 2018 <em>, T=Target,A=Actual</em></th>
            </tr>

			<tr>
				<th class='small-cell-header dataRow' rowspan='2' colspan='2'>type of Indicator</th>
				<th class='small-cell-header dataRow' rowspan='2'>unit of measure</th>
				<th class='small-cell-header dataRow' rowspan='2'>Baseline Year</th>
				<th class='small-cell-header dataRow' rowspan='2'>Baseline Value</th>";
    $queryHeader = @mysql_fetch_array(@mysql_query("SELECT * FROM tbl_workplan_setup WHERE status LIKE 'Open%' ORDER BY 1 ASC"));
    for ($n = intval($queryHeader['opening_year']); $n < intval($queryHeader['closure_year']); $n++) {
        switch ($n) {
            case 2013:
                $class = "yearOne";
                break;
            case 2014:
                $class = "yearTwo";
                break;
            case 2015:
                $class = "yearThree";
                break;
            case 2016:
                $class = "yearFour";
                break;
            case 2017:
                $class = "yearFive";
                break;
            case 2018:
                $class = "yearSix";
                break;

        }

        $data .= "<th class='small-cell-header " . $class . "'  align='right' colspan='3' >FY " . $n . "</th>";

    }
    $data .= "</tr>";

    $data .= "<tr>";
    for ($n = 0; $n < 6; $n++) {
        switch ($n) {
            case 0:
                $class = "yearOne";
                break;
            case 1:
                $class = "yearTwo";
                break;
            case 2:
                $class = "yearThree";
                break;
            case 3:
                $class = "yearFour";
                break;
            case 4:
                $class = "yearFive";
                break;
            case 5:
                $class = "yearSix";
                break;

        }


        $data .= "<th class='small-cell-header " . $class . "' align='right'>T</th>";
        $data .= "<th class='small-cell-header " . $class . "' align='right'>A</th>";
        $data .= "<th class='small-cell-header " . $class . "'  align='right'>%</th>";

    }
    $data .= "</tr>
	</thead>
	<tbody>";
    $data .= "<tr>
				<td colspan='30' style='background-color:#DCDCDC;' align='center'>
					<strong>Commodity Production and Marketing (CPM)</strong>
				</td>
			  </tr>";
    $inc = 1;
    $logicaloutput = @mysql_query("SELECT * FROM tbl_output WHERE output_id LIKE '" . $_SESSION['output_id'] . "%' AND display='Yes' ORDER BY output_code ASC") or die(http("PR-338"));
    while ($rowoutput = @mysql_fetch_array($logicaloutput)) {

        $x = $qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
        $_SESSION['queryExport'] = $x;
        $query = @mysql_query($x) or die(http(__line__));
        if (@mysql_num_rows($query) > 0)

            while ($row = @mysql_fetch_array($query)) {
                $baseline = $row['baseline'];
                $base = $baseline > 0 ? $baseline : "-";
              
				/*start of main indicators frame*/
                $data .= "<tr>";
                $data .= "<td align=left>
				<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='" . $row['indicator_id'] . "' >" . $inc . "</td>";
                $data .= "<td colspan='6' ><strong>" . stripslashes($row['indicator_name']) . "</strong></td>";
                $data .= "<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>";
                $data .= "<td align='left' colspan='1'>" . $row['unitofmeasure'] . "</td>";
                $data .= "<td></td>";
                $data .= "<td align=right >" . number_format($base) . "</td>";

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

                $percentageYr1 = ColorCodingMELA(calc_Percentage(($rowWP['fy1']), $ActualYr1), "yearOne");
                $percentageYr2 = ColorCodingMELA(calc_Percentage(($rowWP['fy2']), $ActualYr2), "yearTwo");
                $percentageYr3 = ColorCodingMELA(calc_Percentage(($rowWP['fy3']), $ActualYr3), "yearThree");
                $percentageYr4 = ColorCodingMELA(calc_Percentage(($rowWP['fy4']), $ActualYr4), "yearFour");
                $percentageYr5 = ColorCodingMELA(calc_Percentage(($rowWP['fy5']), $ActualYr5), "yearFive");
                $percentageYr6 = ColorCodingMELA(calc_Percentage(($rowWP['fy6']), $ActualYr6), "yearSix");

                $data .= "<td align='right' class='yearOne'><input type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >";
                $data .= "<input type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >";
                $data .= "<input type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >";
                $data .= "" . checkExistance($rowWP['fy1'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearOne'>" . checkExistance($ActualYr1, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr1;
                $data .= "<td align='right' class='yearTwo'>" . checkExistance($rowWP['fy2'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearTwo'>" . checkExistance($ActualYr2, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr2;
                $data .= "<td align='right' class='yearThree'>" . checkExistance($rowWP['fy3'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearThree'>" . checkExistance($ActualYr3, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr3;
                $data .= "<td align='right' class='yearFour'>" . checkExistance($rowWP['fy4'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFour'>" . checkExistance($ActualYr4, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr4;
                $data .= "<td align='right' class='yearFive'>" . checkExistance($rowWP['fy5'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearFive'>" . checkExistance($ActualYr5, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr5;
                $data .= "<td align='right' class='yearSix'>" . checkExistance($rowWP['fy6'], 0, 'ExistsInteger') . "</td>";
                $data .= "<td align='right' class='yearSix'>" . checkExistance($ActualYr6, 0, 'ExistsInteger') . "</td>";
                $data .= $percentageYr6;

                $data .= "</tr>";


                $i = 1;
                $cpmonly = $qmobj->melaDissagregation($row['indicator_id']);
                //$obj->alert($cpmonly);
                $qCpmonly = @Execute($cpmonly) or die(http(__line__));
                while ($rowCpm = @FetchRecords($qCpmonly)) {
                    $data .= "<tr class='umemsRpLevelOne' " . $events2 . ">";
                    $data .= "<td align='right'>" . $inc . "." . $i . ".</td>";
                    $data .= "<td colspan='6'>" . $rowCpm['dissagregate_name'] . "</td>";
                    $data .= "<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>";
                    $data .= "<td align='left'>" . $row['unitofmeasure'] . "</td>";
                    $data .= "<td align='left'></td>";
                    $data .= "<td align='right' align='right'>-</td>";

                    switch ($rowCpm['tbl_mela_dissagregationId']) {
                        default:
                            $Actl1Yr1 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
                            $Actl1Yr2 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
                            $Actl1Yr3 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
                            $Actl1Yr4 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
                            $Actl1Yr5 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
                            $Actl1Yr6 = $umobj->umemsMiningIndicator($rowCpm['tbl_mela_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

                            break;
                    }

                    $targetL1Yr1 = 0;
                    $targetL1Yr2 = 0;
                    $targetL1Yr3 = 0;
                    $targetL1Yr4 = 0;
                    $targetL1Yr5 = 0;
                    $targetL1Yr6 = 0;

                    $percentageL1Yr1 = ColorCodingMELA(calc_Percentage($targetL1Yr1, $Actl1Yr1), "yearOne");
                    $percentageL1Yr2 = ColorCodingMELA(calc_Percentage($targetL1Yr2, $Actl1Yr2), "yearTwo");
                    $percentageL1Yr3 = ColorCodingMELA(calc_Percentage($targetL1Yr3, $Actl1Yr3), "yearThree");
                    $percentageL1Yr4 = ColorCodingMELA(calc_Percentage($targetL1Yr4, $Actl1Yr4), "yearFour");
                    $percentageL1Yr5 = ColorCodingMELA(calc_Percentage($targetL1Yr5, $Actl1Yr5), "yearFive");
                    $percentageL1Yr6 = ColorCodingMELA(calc_Percentage($targetL1Yr6, $Actl1Yr6), "yearSix");

                    $data .= "<td align='right' class='yearOne'>" . displayValues($targetL1Yr1, 0) . "</td>";
                    $data .= "<td align='right' class='yearOne'>" . displayValues($Actl1Yr1, 0) . "</td>";
                    $data .= $percentageL1Yr1;
                    $data .= "<td align='right' class='yearTwo'>" . displayValues($targetL1Yr2, 0) . "</td>";
                    $data .= "<td align='right' class='yearTwo'>" . displayValues($Actl1Yr2, 0) . "</td>";
                    $data .= $percentageL1Yr2;
                    $data .= "<td align='right' class='yearThree'>" . displayValues($targetL1Yr3, 0) . "</td>";
                    $data .= "<td align='right' class='yearThree'>" . displayValues($Actl1Yr3, 0) . "</td>";
                    $data .= $percentageL1Yr3;
                    $data .= "<td align='right' class='yearFour'>" . displayValues($targetL1Yr4, 0) . "</td>";
                    $data .= "<td align='right' class='yearFour'>" . displayValues($Actl1Yr4, 0) . "</td>";
                    $data .= $percentageL1Yr4;
                    $data .= "<td align='right' class='yearFive'>" . displayValues($targetL1Yr5, 0) . "</td>";
                    $data .= "<td align='right' class='yearFive'>" . displayValues($Actl1Yr5, 0) . "</td>";
                    $data .= $percentageL1Yr5;
                    $data .= "<td align='right' class='yearSix'>" . displayValues($targetL1Yr6, 0) . "</td>";
                    $data .= "<td align='right' class='yearSix'>" . displayValues($Actl1Yr6, 0) . "</td>";
                    $data .= $percentageL1Yr6;

                    $data .= "</tr>";
                    $j = 1;
                    $cpmonlylevel_two = $qmobj->melaDissagregationLevel_two($rowCpm['indicator_id'], $rowCpm['tbl_mela_dissagregationId']);

                    $qCpmonlylevel_two = @Execute($cpmonlylevel_two) or die(http(__line__));
                    while ($rowCpmlevel_two = @FetchRecords($qCpmonlylevel_two)) {
                        $data .= "<tr class='umemsRpLevelTwo' " . $events2 . ">";
                        $data .= "<td align='right'>" . $inc . "." . $i . "." . $j . ".</td>";
                        $data .= "<td colspan='6'>" . $rowCpmlevel_two['dissagregate_name'] . "</td>";
                        $data .= "<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>";
                        $data .= "<td align='left'>" . $row['unitofmeasure'] . "</td>";
                        $data .= "<td align='left'></td>";
                        $data .= "<td align='right' align='right'></td>";

                        //$obj->alert($rowCpmlevel_two['tbl_mela_sub_dissagregationId']);

                        switch ($rowCpmlevel_two['tbl_mela_sub_dissagregationId']) {
                            default:
                                $Actl2Yr1 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
                                $Actl2Yr2 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
                                $Actl2Yr3 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
                                $Actl2Yr4 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
                                $Actl2Yr5 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
                                $Actl2Yr6 = $umemsRepL2Obj->umemsMiningIndicatorLevelOne($rowCpmlevel_two['tbl_mela_sub_dissagregationId'], $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

                                break;
                        }


                        $targetL2Yr1 = 0;
                        $targetL2Yr2 = 0;
                        $targetL2Yr3 = 0;
                        $targetL2Yr4 = 0;
                        $targetL2Yr5 = 0;
                        $targetL2Yr6 = 0;

                        $percentageL2Yr1 = ColorCodingMELA(calc_Percentage($targetL2Yr1, $Actl2Yr1), "yearOne");
                        $percentageL2Yr2 = ColorCodingMELA(calc_Percentage($targetL2Yr2, $Actl2Yr2), "yearTwo");
                        $percentageL2Yr3 = ColorCodingMELA(calc_Percentage($targetL2Yr3, $Actl2Yr3), "yearThree");
                        $percentageL2Yr4 = ColorCodingMELA(calc_Percentage($targetL2Yr4, $Actl2Yr4), "yearFour");
                        $percentageL2Yr5 = ColorCodingMELA(calc_Percentage($targetL2Yr5, $Actl2Yr5), "yearFive");
                        $percentageL2Yr6 = ColorCodingMELA(calc_Percentage($targetL2Yr6, $Actl2Yr6), "yearSix");

                        $data .= "<td align='right' class='yearOne'>" . displayValues($targetL2Yr1, 0) . "</td>";
                        $data .= "<td align='right' class='yearOne'>" . displayValues($Actl2Yr1, 0) . "</td>";
                        $data .= $percentageL2Yr1;

                        $data .= "<td align='right' class='yearTwo'>" . displayValues($targetL2Yr2, 0) . "</td>";
                        $data .= "<td align='right' class='yearTwo'>" . displayValues($Actl2Yr2, 0) . "</td>";
                        $data .= $percentageL2Yr2;

                        $data .= "<td align='right' class='yearThree'>" . displayValues($targetL2Yr3, 0) . "</td>";
                        $data .= "<td align='right' class='yearThree'>" . displayValues($Actl2Yr3, 0) . "</td>";
                        $data .= $percentageL2Yr3;

                        $data .= "<td align='right' class='yearFour'>" . displayValues($targetL2Yr4, 0) . "</td>";
                        $data .= "<td align='right' class='yearFour'>" . displayValues($Actl2Yr4, 0) . "</td>";
                        $data .= $percentageL2Yr4;

                        $data .= "<td align='right' class='yearFive'>" . displayValues($targetL2Yr5, 0) . "</td>";
                        $data .= "<td align='right' class='yearFive'>" . displayValues($Actl2Yr5, 0) . "</td>";
                        $data .= $percentageL2Yr5;

                        $data .= "<td align='right' class='yearSix'>" . displayValues($targetL2Yr6, 0) . "</td>";
                        $data .= "<td align='right' class='yearSix'>" . displayValues($Actl2Yr6, 0) . "</td>";
                        $data .= $percentageL2Yr6;


                        $data .= "</tr>";
                        $j++;
                    }

                    $i++;
                }
                $inc++;
            }
    }


    $data .= "</tbody>
	</table>
	</form>";

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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading MELA Table...</span></div>
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
						case"Monitoring,Learning,Evaluation and Activity (MELA)":
						?>
						xajax_melaReport('', '', '', '', '', '', '', '', '', 1, 20);
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

