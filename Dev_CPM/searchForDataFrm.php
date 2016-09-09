<?php
session_start();
//$linkvar=$_SESSION['linkvar'];
require_once('connections/lib_connect.php');
require_once('./xajax_0.5/xajax_core/xajax.inc.php');

$xajax = new xajax();
$xajax->setFlag('debug',false);
#*************************************
							
$xajax->register(XAJAX_FUNCTION,'qAnalyzer_home');
$xajax->register(XAJAX_FUNCTION,'qAnalyzer_results');


#************************************


function qAnalyzer_home($dataForms, $dataSets, $condition)
{
	$obj = new xajaxResponse();
	$qaobj = new QueryAnalyzer('');
	global $data;


//Sessions to be retained
	$_SESSION['dataForms'] = $dataForms;
	$_SESSION['dataSets'] = $dataSets;
	$_SESSION['condition'] = $condition;

//$obj->alert($dataForms);

	if ($_SESSION['user_id'] == '') {
		$obj->alert("Your Session has expired. Kindly log into the system again.");
		$obj->redirect('index.php');
		return $obj;
	}

	$div = 'myDiv';


	$data .= "<table class='' width='100%' border='0' cellspacing='2' cellpadding='2'>
  <tr class='evenrow1'>
    <td><img src='images/qAnalyzer.png' width='221.5px' height='113.5px'/>
    <form name='qAnalyzer' id='qAnalyzer' action=\"" . $PHP_SELF . "\" method='post'>
     <table width='100%' border='0' cellspacing='1' cellpadding='1'>
        <tr class='evenrow'>
            <td><strong>DATA FORM:</strong></td>
            <td>";
	$data .= "<select name='dataForms' id='dataForms' onchange=\"xajax_qAnalyzer_home(this.value,'" . $_SESSION['dataSets'] . "','" . $_SESSION['condition'] . "');return false;\" style='width:100px;'>
            <option value=''>-select-</option>";
	$data .= $qaobj->DataFormsFilter($_SESSION['dataForms']);
	$data .= "</select>";
	$data .= "</td>
            
             <td><strong>DATA SET:</strong></td>
            <td>
            <select name='dataSet' id='dataSet' value='' onchange=\"xajax_qAnalyzer_home('" . $_SESSION['dataForms'] . "',this.value,'" . $_SESSION['condition'] . "');return false;\" style='width:100px;'>
            <option value=''>-select-</option>";
	$data .= $qaobj->DataSetsFilter($_SESSION['dataForms'], $_SESSION['dataSets']);
	$data .= "</select>";
	$data .= "</td>
            
             <td><strong>OPTION:</strong></td>
            <td>
            <select name='condition' id='condition' value='' onchange=\"xajax_qAnalyzer_home('" . $_SESSION['dataForms'] . "','" . $_SESSION['dataSets'] . "',this.value);return false;\" style='width:100px;'>
            <option value=''>-select-</option>";
	$data .= $qaobj->DataConditionsFilter($_SESSION['dataForms'], $_SESSION['dataSets'], $_SESSION['condition']);
	$data .= "</select>";
	$data .= "</td>";
	$data .= "</tr>";

	//Start further filter conditions
	//$obj->alert($_SESSION['condition']);
	//start dynamic filter
	switch ($_SESSION['condition']) {
		case 1:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;
		case 5:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;
		case 9:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;

		case 13:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 14:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 15:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 16:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerExporterFilters($var);
			break;

		case 17:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerExporterFilters($var);
			break;

		case 18:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerExporterFilters($var);
			break;

		case 19:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 20:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 21:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 22:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;

		case 23:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;

		case 24:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;

		case 25:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;

		case 28:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;

		case 31:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;

		case 34:
			$data .= $qaobj->displayAnalyzerDateFilters($var);
			break;

		case 45:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 46:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;

		case 47:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 48:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		//Start Medard
		case 57:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 58:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 59:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 60:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		case 61:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 62:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		case 63:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 64:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		case 65:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 66:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		case 67:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 68:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		case 69:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			break;

		case 70:
			$data .= $qaobj->displayAnalyzerReportingPeriodFilters($var);
			$data .= $qaobj->displayAnalyzerTraderFilters($var);
			break;
		//End Medard

		default:
			$data .= " ";
			break;
	}
	//end of dynamic filter

	$data .= "<tr class='evenrow'>
            <td><strong>SORT BY:</strong></td>
            <td>
            <select name='order' id='order' style='width:100px;'>";
	$data .= "<option value=''>-select-</option>";
	$data .= "<option value='ASC'>Ascending Order</option>";
	$data .= "<option value='DESC'>Descending Order</option>";
	$data .= "</select>";
	$data .= "</td>";

	$data .= "<td><strong>RESULT RANGE</strong></td>";
	$data .= "<td>FROM:";
	$data .= "<input name='offsetLimit' id='offsetLimit' type='text'  style='width:100px;' onKeyPress=\"return numbersonly(event, false)\" />";
	$data .= "</td>";

	$data .= "<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>";
	$data .= "<td>";
	$data .= "TO:<input name='countLimit' id='countLimit' type='text'  style='width:100px;' onKeyPress=\"return numbersonly(event, false)\" />";
	$data .= "</td>";
	$data .= "</tr>";

	//End of further filter conditions

	$data .= "<tr class='evenrow'>
            <td colspan='12' align='right'>
				<input type='button' class='formButton2' id='button' name='submit' value='search' style='width:100px;'";
	//$data.=" onclick=\"xajax_qAnalyzer_results(xajax.getFormValues('qAnalyzer'),'".$div."');return false;\"";
	$data .= " onclick=\"loadingIconSearch(xajax.getFormValues('qAnalyzer'),'search_analyzer','" . $div . "');return false;\"";
	$data .= "/>
			</td>
        </tr>";

	$data .= "<div align='center' height='900' id='searchLoader' style='display:none;'><span style='font-size:24px; margin-top:500px; font-weight:bold;'>Searching for Data...</span></div>";

	$data .= "</table>
    </form>
    </td>
  </tr>
  
  

  <tr class='evenrow1'>
    <td><div id='" . $div . "'></div></td>
  </tr>
  
</table>";


	$obj->assign('bodyDisplay', 'innerHTML', $data);
	$obj->call("hideLoadingDiv"); 
	return $obj;
}

function qAnalyzer_results($formValues, $search_analyzer, $div)
{
	$obj = new xajaxResponse();
	$qaobj = new QueryAnalyzer('');

	if ($_SESSION['username'] == '') {
		$obj->redirect('index.php');
		return $obj;
	}

//Query Parameters to search For
	$dataForms = $formValues['dataForms'];
	$dataSets = $formValues['dataSet'];
	$condition = $formValues['condition'];
	$offsetLimit = $formValues['offsetLimit'];
	$countLimit = $formValues['countLimit'];
	$oder = $formValues['order'];
	$dateOne = $formValues['dateOne'];
	$dateTwo = $formValues['dateTwo'];
	$searchValueOne = $formValues['reportingPeriod'];
	$searchValueTwo = $formValues['year'];
	$searchValueThree = $formValues['exporter'];
	$searchValueFour = $formValues['trader'];
	$recordId = $searchValueThree;
	$traderId = $searchValueFour;
	$reportingPeriod = $searchValueOne;
	$year = $searchValueTwo;


	$data .= "
		<table>
			<tr>
				<td>
					<fieldset>
					<legend><strong><h1>Results Area:</h1></strong></legend>";

	//Start of results area

	$data .= "<table>";

	$and = ' and ';

	//Dynamic conditions
	switch ($condition) {
		case 13;

			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 14;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 15;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 16;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$fieldThree = "w.tbl_exporterId like '" . $searchValueThree . "%'";
			$fieldThree = ($fieldThree == "''") ? "" : $fieldThree;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldThree;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 17;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$fieldThree = "w.tbl_exporterId like '" . $searchValueThree . "%'";
			$fieldThree = ($fieldThree == "''") ? "" : $fieldThree;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldThree;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 18;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$fieldThree = "w.tbl_exporterId like '" . $searchValueThree . "%'";
			$fieldThree = ($fieldThree == "''") ? "" : $fieldThree;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldThree;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 19;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 20;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 21;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 22;
			$fieldOne = "w.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "w.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$fieldFour = "w.tbl_traderId like '" . $searchValueFour . "%'";
			$fieldFour = ($fieldFour == "''") ? "" : $fieldFour;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldFour;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 46;
			$fieldOne = "t.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "t.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$fieldFour = "x.tbl_tradersId like '" . $searchValueFour . "%'";
			$fieldFour = ($fieldFour == "''") ? "" : $fieldFour;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldFour;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 47;
			$fieldOne = "l.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "l.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldFour;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;

		case 48;
			$fieldOne = "p.reportingPeriod like '" . $searchValueOne . "%'";
			$fieldOne = ($fieldOne == "''") ? "" : $fieldOne;
			$fieldTwo = "p.year like '" . $searchValueTwo . "%'";
			$fieldTwo = ($fieldTwo == "''") ? "" : $fieldTwo;
			$dynamicString = $fieldOne . $and . $fieldTwo . $and . $fieldFour;
			$lastThreeCharacters = trim(substr("" . $dynamicString . "", -4));
			$newDynamicString = ($lastThreeCharacters == 'and') ? substr("" . $dynamicString . "", 0, -4) : $dynamicString;
			break;


		default:
			break;
	}


	$tabUnsanitized = $qaobj->DataTables($dataSets, $condition);
	$tables = substr("" . $tabUnsanitized . "", 0, -1);
	$fieldsToDisplay = $qaobj->DataFieldsToDisplay($condition);
	$keyCondition = $qaobj->DataPrimaryCondition($condition);
	$secondaryCondition = $qaobj->DataSecondaryCondition($condition);
	$dynamicCondition = ($newDynamicString <> '' || $newDynamicString <> null) ? $and . $newDynamicString : "";
	$primarySortField = $qaobj->DataOrderingPrimary($condition);
	$secondarySortField = $qaobj->DataOrderingSecondary($condition);
	$dateString = " and " . $secondarySortField . " between cast('" . $dateOne . "' as date) and cast('" . $dateTwo . "' as date)";
	$dateOption = (($dateOne <> '' && $dateTwo <> '') ? "" . $dateString . "" : "");
	$limitString = "limit " . $offsetLimit . ", " . $countLimit . "";
	$limitOption = (($offsetLimit <> '' && $countLimit <> '') ? "" . $limitString . "" : "");
	$satisfiedCondition = ($df == $dataForms && $ds == $dataSets && $dc == $condition);

	switch ($satisfiedCondition) {
		default:
			$queryPart = $qaobj->analyzerDynamicQuery($fieldsToDisplay, $tables, $keyCondition, $secondaryCondition, $dynamicCondition, $primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;

	}
	
	switch ($condition) {
		case 25:
			$queryPart = $qaobj->qAnalyzerForm6MaizeProductionDateSurveyed($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 26:
			$queryPart = $qaobj->qAnalyzerForm6MaizeProductionLocation($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 27:
			$queryPart = $qaobj->qAnalyzerForm6MaizeProductionGender($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;

		case 28:
			$queryPart = $qaobj->qAnalyzerForm6CoffeeProductionDateSurveyed($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 29:
			$queryPart = $qaobj->qAnalyzerForm6CoffeeProductionLocation($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 30:
			$queryPart = $qaobj->qAnalyzerForm6CoffeeProductionGender($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;

		case 31:
			$queryPart = $qaobj->qAnalyzerForm6BeansProductionDateSurveyed($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 32:
			$queryPart = $qaobj->qAnalyzerForm6BeansProductionLocation($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 33:
			$queryPart = $qaobj->qAnalyzerForm6BeansProductionGender($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 34:
			$queryPart = $qaobj->qAnalyzerForm6GeneralProductionDateSurveyed($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 35:
			$queryPart = $qaobj->qAnalyzerForm6GeneralProductionLocation($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 36:
			$queryPart = $qaobj->qAnalyzerForm6GeneralProductionGender($primarySortField, $secondarySortField, $dateOption, $oder, $limitOption);
			break;
		case 37:
			$queryPart = $qaobj->qAnalyzerForm7GroupsRegion($primarySortField, $secondarySortField, $oder, $limitOption);
			break;


		default:
			break;
	}


	/* $obj->alert($queryPart); */
	if(empty($queryPart)){
		$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
			<tr class='evenrow'>
			<td colspan='8' rowspan='2'>".errorMsg("The current Filter Parameters Have no result")."</td>
			</tr>";

	}else{
		$result = @Execute($queryPart) or die(http(__line__));
		
			$data .= "<table border=0 cellspacing=1 cellpadding=1 width='100%'>";
			$colspan = (mysql_num_fields($result) + 1);
			$data .= "<tr class='evenrow'>
												<td colspan='" . $colspan . "' align='right'>
												<a href='export_to_excel_word.php?linkvar=Export QueryAnalyzer&&dataForms=" . $dataForms . "&&dataSets=" . $dataSets . "&&condition=" . $condition . "&&searchValueOne=" . $searchValueOne . "&&searchValueTwo=" . $searchValueTwo . "&&searchValueThree=" . $searchValueThree . "&&searchValueFour=" . $searchValueFour . "&&offsetLimit=" . $offsetLimit . "&&countLimit=" . $countLimit . "&&oder=" . $oder . "&&dateOne=" . $dateOne . "&&dateTwo=" . $dateTwo . "&&format=excel'>
												<input name='export_analyzer' type='button' class='formButton2'value='Export to Excel'></a> |
												<a href='print_version.php?linkvar=Print QueryAnalyzer&&dataForms=" . $dataForms . "&&dataSets=" . $dataSets . "&&condition=" . $condition . "&&searchValueOne=" . $searchValueOne . "&&searchValueTwo=" . $searchValueTwo . "&&searchValueThree=" . $searchValueThree . "&&searchValueFour=" . $searchValueFour . "&&offsetLimit=" . $offsetLimit . "&&countLimit=" . $countLimit . "&&oder=" . $oder . "&&dateOne=" . $dateOne . "&&dateTwo=" . $dateTwo . "&&format=Print' target='_blank'>
												<input name='export_analyzer' type='button' class='formButton2' value='Print Version'></a>
												</td>";
			$data .= "</tr>";

			switch ($condition) {
				case 16:
					$data .= $qaobj->analyzerExporterDisaggregationData($recordId, $reportingPeriod, $year);
					break;
				case 17:
					$data .= $qaobj->analyzerExporterDisaggregationData($recordId, $reportingPeriod, $year);
					break;
				case 18:
					$data .= $qaobj->analyzerExporterDisaggregationData($recordId, $reportingPeriod, $year);
					break;

				case 22:
					$data .= $qaobj->analyzerTraderDisaggregationData($traderId, $reportingPeriod, $year);
					break;

				case 23:
					$data .= $qaobj->analyzerTraderDisaggregationData($traderId, $reportingPeriod, $year);
					break;

				case 24:
					$data .= $qaobj->analyzerTraderDisaggregationData($traderId, $reportingPeriod, $year);
					break;

				case 46:

					$data .= $qaobj->entTech_view($query = $queryPart);
					break;

				case 48:
					//$data .= $qaobj->labourTech_view($query = $queryPart);
					$data .= $queryPart;
					break;


				default:


					$data .= "<tr>";
					$data .= "<th>#</th>";
					for ($i = 0; $i < mysql_num_fields($result); $i++) {
						$field_info = mysql_fetch_field($result, $i);
						$data .= "<th>{$field_info->name}</th>";
					}
					$data .= "</tr>";

					$n = 1;
					while ($row = mysql_fetch_row($result)) {
						$color = $n % 2 == 1 ? "evenrow" : "evenrow3";
						$data .= "<tr class=" . $color . ">";
						$data .= "<td>" . $n . ". </td>";
						foreach ($row as $_column) {
							$data .= "";
							$data .= "<td>&nbsp;{$_column}</td>";
						}
						$data .= "</tr>";
						$n++;
					}

					$data .= noRecordsFound($result, $colspan);
					break;
			}
			$data .= "</table>";

	}

	//End of results area
	$data .= "</fieldset>
				</td>
			</tr>
		</table>";

	$obj->assign($div, 'innerHTML', $data);
	$obj->call("hidesearchLoaderDiv");
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
        style='font-size:24px; margin-top:50px; font-weight:bold;'>Loading CPM Query Analyzer Report...</span></div>
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
						case "CPM Query Analyzer":
						?>
						xajax_qAnalyzer_home('', '', '');    
						  
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

<iframe name="gToday:normal:agenda.js" id="gToday:normal:agenda.js" src="WeekPicker/ipopeng.htm"
        style="visibility: visible; z-index: 700; position: absolute; top: -500px; left: -700px;" frameborder="0"
        height="178" scrolling="no" width="199"></iframe>
</body>
</html>

