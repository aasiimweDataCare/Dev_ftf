<?php
require_once('connections/lib_connect.php');
#-------------------------------------------------------------

function GeneralFilter($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
	<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=8><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_edit_annualTarget(xajax.getFormValues('annualTarget1'));return false;\" /> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Workplan&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a href='print_version.php?linkvar=Print Annual Workplan&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='2'>Region:
                <label></label></td>
              <td colspan='9'><select name='zone' id='zone'  style='width:250px;' onChange=\"xajax_$fnctName(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";
    $data .= QueryManager::ZoneFilter($_SESSION['zone']);

    $data .= "</select></td>
					   <td colspan='2'>District:
                <label></label></td>
              <td colspan='9'><select name='district' id='district'  style='width:250px;' onChange=\"xajax_$fnctName(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";
    $data .= QueryManager::DistrictFilter($_SESSION['zone'], $_SESSION['districtCode']);

    $data .= "</select></td>
					  
            </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);

    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox'  id='output' onChange=\"xajax_$fnctName('" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
        </tr>";

    $data .= "<tr class=evenrow>
              <td colspan=2>Year:</td><td colspan='3' >
			  <select name='fyear' id='fyear' style='width:200px;'  ><option value=''>-All-</option>";
    $data .= QueryManager::YearFilter($_SESSION['fyear']);
    $data .= "</select></td>
			  
			   <td colspan=2>Reporting Period:</td><td colspan='3' >
			  <select name='quarter' id='quarter' style='width:150px;' ><option value=''>-All-</option>";
    $data .= QueryManager::YearFilter($_SESSION['quarter']);
    $data .= "</select></td> 
		<td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,'',getElementById('fyear').value,getElementById('quarter').value,1,20);return false;\" /></td>
            </tr>";

    return $data;
}

function filter_annualResultsHO($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='3'></td>
    <td width='' scope='col' colspan=14><label>";
    $data .= ExportManager::ExportData("AnnualTargets");
    $data .= " </label></td>
  </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Region:
                <label></label></td>
              <td colspan='3'><select name='zone' id='zone'  style='width:200px;' 
			  onChange=\"xajax_$fnctName(this.value,'" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"   >
			  <option value='' >-All-</option>";
    $data .= QueryManager::ZoneFilter($_SESSION['zoneID']);

    $data .= "</select></td>
					   <td colspan='1'>District:
                <label></label></td>
              <td colspan='11'><select name='district' id='district' style='width:230px;'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "',this.value,'" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";
    $data .= QueryManager::DistrictFilter($_SESSION['zoneID'], $_SESSION['districtID']);


    $data .= "</select></td>
					  
            </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='13'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
    //$data.=QueryManager::DistrictFilter($_SESSION['zone'],$_SESSION['districtID']);
    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>Outcome:</td>
              <td colspan='13'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"  >";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='13'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
        </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>Indicator Code:</td>
              <td colspan='3'><input name='indicator_code' type='text' size='30'  onKeyup=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "',this.value,'" . $_SESSION['indicator'] . "',1,20);return false;\" /></td>
			  <td colspan='1'>Indicator:</td>
              <td colspan='9'><input name='indicator' type='text' size='35' onKeyup=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "',this.value,1,20);return false;\" /></td>
        </tr>";

    $data .= "<tr class=evenrow>
              <td colspan=3>Financial Year:</td><td colspan='3' >
			  <select name='fyear' id='fyear' style='width:200px;' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "',this.value,'" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"   ><option value=''>-All-</option>";
    $data .= QueryManager::FinancialYearFilter(pagination::currFinancialYear($_SESSION['fyear'], 'YearRange'));
    $data .= "</select></td>
			  
			   <td colspan=2>Reporting Period:</td><td colspan='7' >
			  <select name='quarter' id='quarter'  disabled='disabled'   onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "',this.value,'" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" style='width:140px;' ><option value=''>-All-</option>";
    $data .= QueryManager::YearFilter($_SESSION['semiAnnual']);
    $data .= "</select></td> 
		<td colspan='6'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" 
		
		
		 /></td>
            </tr>
";

    return $data;

}

function filter_annualTarget_2($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='3'></td>
    <td width='' scope='col' colspan=14><label>";
    $data .= ExportManager::ExportData("AnnualTargets");
    $data .= " </label></td>
  </tr>";


    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='13'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
    //$data.=QueryManager::DistrictFilter($_SESSION['zone'],$_SESSION['districtID']);
    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>IR:</td>
              <td colspan='13'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"  >";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='3'>Sub-IR:</td>
              <td colspan='13'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
        </tr>";


    $data .= "<tr class=evenrow>
              <td colspan=3>Reporting Year:</td><td colspan='4' >
			  <select name='fyear' id='fyear' style='width:200px;' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "',this.value,'" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"   ><option value=''>-All-</option>";
    $data .= QueryManager::YearFilter($_SESSION['fyear']);
    $data .= "</select></td>
			  
			  
		<td colspan='8'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" 
		
		
		 /></td>
            </tr>
";

    return $data;

}

function filter_ViewAnnualAchievementsReport($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
<tr class='evenrow' >
    
    <td width='' scope='col' colspan=40><label>";
    $data .= ExportManager::ExportData("ViewAnnualAchievementsReport");
    $data .= " </label></td>
  </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='34'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
    //$data.=QueryManager::DistrictFilter($_SESSION['zone'],$_SESSION['districtID']);
    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>IR:</td>
              <td colspan='34'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"  >";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='3'>Sub-IR:</td>
              <td colspan='25'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
<td colspan='1'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" />
        </tr>";

    return $data;

}

function filter_SemiAnnualAndAnnualIndicatorTracker($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
<tr class='evenrow' >
    
    <td width='' scope='col' colspan=37><label>";
    $data .= ExportManager::ExportData("SemiAnnualAndAnnualIndicatorTracker");
    $data .= " </label></td>
  </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='34'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>IR:</td>
              <td colspan='34'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"  >";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='3'>Sub-IR:</td>
              <td colspan='33'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
<td colspan='1'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" />
        </tr>";

    return $data;

}

//Start of MELA FILTER
function filter_melaReport($fnctName)
{
$classCode = 5;
$data = '';
$data .= "
<thead>
	<tr>
		<td colspan=30>
			<table style='background-color:#F8F5EC;' width='100%' border='0' cellspacing='1' cellpadding='1'>
				<!--<tr>
				<td  colspan=37>";
				$data .= ExportManager::ExportData("SemiAnnualAndAnnualIndicatorTracker");
				$data .= "</td>
				</tr>-->

				<tr>
					<td colspan='3'><label for='indicator_type'>Indicator Type:</label></td>
					<td colspan='27'>
						<select name='indicator_type' id='indicator_type' class='combobox' 
							onChange=\"xajax_$fnctName(
							'" . $_SESSION['zoneID'] . "',
							'" . $_SESSION['districtID'] . "',
							this.value,
							'" . $_SESSION['subcomponent_id'] . "',
							'" . $_SESSION['output_id'] . "',
							'" . $_SESSION['fyear'] . "',
							'" . $_SESSION['semiAnnual'] . "',
							'" . $_SESSION['indicatorCode'] . "',
							'" . $_SESSION['indicator'] . "',
							1,20
							);return false;\" >
						<option value='' >-All-</option>";
						$data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
						$data .= "</select>
					</td>
				</tr>";

				$data .= "<tr>
					<td colspan='3'><label for='indicator_type'>IR:</label></td>
					<td colspan='27'>
						<select name='subcomponent' class='combobox' id='subcomponent' 
							onChange=\"xajax_$fnctName(
							'" . $_SESSION['zoneID'] . "',
							'" . $_SESSION['districtID'] . "',
							'" . $_SESSION['indicator_Type'] . "',
							this.value,'" . $_SESSION['output_id'] . "',
							'" . $_SESSION['fyear'] . "',
							'" . $_SESSION['semiAnnual'] . "',
							'" . $_SESSION['indicatorCode'] . "',
							'" . $_SESSION['indicator'] . "',
							1,20
							);return false;\">
							<option value=''>-All-</option>";
						$data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
						$data .= "</select>
					</td>
				</tr>";

				$data .= "<tr>
					<td colspan='3'>
						<label for='indicator_type'>Sub-IR:</label>
					</td>
					<td colspan='27'>
						<select name='output' class='combobox'  id='output'  
							onChange=\"xajax_$fnctName(
							'" . $_SESSION['zoneID'] . "',
							'" . $_SESSION['districtID'] . "',
							'" . $_SESSION['indicator_Type'] . "',
							'" . $_SESSION['subcomponent_id'] . "',
							this.value,'" . $_SESSION['fyear'] . "',
							'" . $_SESSION['semiAnnual'] . "',
							'" . $_SESSION['indicatorCode'] . "',
							'" . $_SESSION['indicator'] . "',
							1,20
							);return false;\">
							<option value=''>-All-</option>";
						$data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
						$data .= "</select>

					<input name='search' type='button' class='formButton2' style='width: 100px;'  id='button' value='Go'  
						onclick=\"xajax_$fnctName(
						getElementById('zone').value,
						getElementById('district').value,
						getElementById('indicator_type').value,
						getElementById('subcomponent').value,
						getElementById('output').value,
						getElementById('fyear').value,
						getElementById('quarter').value,
						getElementById('indicator_code').value,
						getElementById('indicator').value,1,20
						);return false;\"

						onKeyUp=\"xajax_$fnctName(
						getElementById('zone').value,
						getElementById('district').value,
						getElementById('indicator_type').value,
						getElementById('subcomponent').value,
						getElementById('output').value,
						getElementById('fyear').value,getElementById('quarter').value,
						getElementById('indicator_code').value,
						getElementById('indicator').value,1,20
						);return false;\" />

					<a href='export_to_excel_word.php?linkvar=Export MELA Report
						&zone=".$_SESSION['zoneID']."
						&district=".$_SESSION['districtID']."
						&indicator_type=".$_SESSION['indicator_Type']."
						&subcomponent=".$_SESSION['subcomponent_id']."
						&output=".$_SESSION['output']."
						&year=".$_SESSION['fyear']."
						&semiAnnual=".$_SESSION['semiAnnual']."
						&indicatorCode=".$_SESSION['indicatorCode']."
						&indicator=".$_SESSION['indicator']."
						&format=excel'>
							<input name='export_mela_report' type='button' class='formButton2'value='Export to Excel'>
					</a>

					<a href='print_version.php?linkvar=Print MELA Report
						&zone=".$_SESSION['zoneID']."
						&district=".$_SESSION['districtID']."
						&indicator_type=".$_SESSION['indicator_Type']."
						&subcomponent=".$_SESSION['subcomponent_id']."
						&output=".$_SESSION['output']."
						&year=".$_SESSION['fyear']."
						&semiAnnual=".$_SESSION['semiAnnual']."
						&indicatorCode=".$_SESSION['indicatorCode']."
						&indicator=".$_SESSION['indicator']."
						&format=Print' target='_blank'>
							<input name='export_mela_report' type='button' class='formButton2' value='Print Version'>
					</a>

					</td>
				</tr>
			</table>
		</td>
	</tr>";

return $data;

}

//End of MELA filter
function filter_ftfReport($fnctName)
{
    $classCode = 5;
    $data = '';
    $data .= "
<tr class='evenrow' >
    
    <td width='' scope='col' colspan=26><label>";
    $data .= ExportManager::ExportData("SemiAnnualAndAnnualIndicatorTracker");
    $data .= " </label></td>
  </tr>";

    $data .= "
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='23'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
			  <option value='' >-All-</option>";

    $data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='3'>IR:</td>
              <td colspan='23'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\"  >";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='3'>Sub-IR:</td>
              <td colspan='20'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "','" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\">";
    $data .= "<option value=''>-All-</option>";
    $data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
    $data .= "</select></td>
<td colspan='3'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" />
        </td></tr>";

    return $data;

}

function filter_DataPerformanceMaps($fnctName)
{
$classCode = 5;
$data = '';
$data .= "
<thead>
	<tr>
		<td colspan=37>
			<table style='background-color:#F8F5EC;' width='100%' border='0' cellspacing='1' cellpadding='1'>
				<!--<tr>
				<td  colspan=37>";
				$data .= ExportManager::ExportData("SemiAnnualAndAnnualIndicatorTracker");
				$data .= "</td>
				</tr>--> 
				
				<tr>
					<td colspan='3'><label for='indicator_type'>Indicator Typesss:</label></td>
					<td colspan='34'>
						<select name='indicator_type' id='indicator_type' class='combobox' 
						onChange=\"xajax_$fnctName(
							'" . $_SESSION['zoneID'] . "',
							'" . $_SESSION['districtID'] . "',
							this.value,
							'" . $_SESSION['subcomponent_id'] . "',
							'" . $_SESSION['output_id'] . "',
							'" . $_SESSION['fyear'] . "',
							'" . $_SESSION['semiAnnual'] . "',
							'" . $_SESSION['indicatorCode'] . "',
							'" . $_SESSION['indicator'] . "',
							1,20
							);return false;\" >
						<option value='' >-All-</option>";
						$data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
						$data .= "</select>
					</td>
				</tr>
				
				<tr class='evenrow'>
					<td colspan='3'><label for='subcomponent'>IR:</label></td>
					<td colspan='34'>
						<select name='subcomponent' class='combobox' id='subcomponent' 
						onChange=\"xajax_$fnctName(
							'" . $_SESSION['zoneID'] . "',
							'" . $_SESSION['districtID'] . "',
							'" . $_SESSION['indicator_Type'] . "',
							this.value,'" . $_SESSION['output_id'] . "',
							'" . $_SESSION['fyear'] . "',
							'" . $_SESSION['semiAnnual'] . "',
							'" . $_SESSION['indicatorCode'] . "',
							'" . $_SESSION['indicator'] . "',
							1,20
							);return false;\"  >
						<option value=''>-All-</option>";
						$data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
						$data .= "</select>
					</td>
				</tr>
				
				<tr class='evenrow'>
					<td colspan='3'><label for='output'>Sub-IR:</label></td>
					<td colspan='34'>
						<select name='output' class='combobox'  id='output'  
							onChange=\"xajax_$fnctName(
								'" . $_SESSION['zoneID'] . "',
								'" . $_SESSION['districtID'] . "',
								'" . $_SESSION['indicator_Type'] . "',
								'" . $_SESSION['subcomponent_id'] . "',
								this.value,
								'" . $_SESSION['fyear'] . "',
								'" . $_SESSION['semiAnnual'] . "',
								'" . $_SESSION['indicatorCode'] . "',
								'" . $_SESSION['indicator'] . "',
								1,20
								);return false;\">";
						$data .= "<option value=''>-All-</option>";
						$data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
						$data .= "</select>
				
						<input name='search' type='button' class='formButton2' style='width: 100px;'  id='button' value='Go'  
							onclick=\"xajax_$fnctName(
								getElementById('zone').value,
								getElementById('district').value,
								getElementById('indicator_type').value,
								getElementById('subcomponent').value,
								getElementById('output').value,
								getElementById('fyear').value,
								getElementById('quarter').value,
								getElementById('indicator_code').value,
								getElementById('indicator').value,
								1,20
								);return false;\"

							onKeyUp=\"xajax_$fnctName(
								getElementById('zone').value,
								getElementById('district').value,
								getElementById('indicator_type').value,
								getElementById('subcomponent').value,
								getElementById('output').value,
								getElementById('fyear').value,
								getElementById('quarter').value,
								getElementById('indicator_code').value,
								getElementById('indicator').value,
								1,20
								);return false;\" /> |
					
						<a href='export_to_excel_word.php?linkvar=Export Data Performance Maps Report
							&zone=".$_SESSION['zoneID']."&district=".$_SESSION['districtID']."
							&indicator_type=".$_SESSION['indicator_Type']."
							&subcomponent=".$_SESSION['subcomponent_id']."
							&output=".$_SESSION['output']."
							&year=".$_SESSION['fyear']."
							&semiAnnual=".$_SESSION['semiAnnual']."
							&indicatorCode=".$_SESSION['indicatorCode']."
							&indicator=".$_SESSION['indicator']."
							&format=excel'>
								<input name='export_dataPerformanceMaps' type='button' class='formButton2'value='Export to Excel'>
						</a> |
						
						<a href='print_version.php?linkvar=Print Data Performance Maps Report
							&zone=".$_SESSION['zoneID']."&district=".$_SESSION['districtID']."
							&indicator_type=".$_SESSION['indicator_Type']."
							&subcomponent=".$_SESSION['subcomponent_id']."
							&output=".$_SESSION['output']."
							&year=".$_SESSION['fyear']."
							&semiAnnual=".$_SESSION['semiAnnual']."
							&indicatorCode=".$_SESSION['indicatorCode']."
							&indicator=".$_SESSION['indicator']."
							&format=Print' target='_blank'>
								<input name='export_dataPerformanceMaps' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";

return $data;

}

function filter_annualTargetActivityReport($fnctName){
$classCode = 5;
$data = '';
$data .= "
<thead>
	<tr>
		<td colspan=37>
			<table style='background-color:#F8F5EC;' width='100%' border='0' cellspacing='1' cellpadding='1'>
				<!--<tr>
				<td  colspan=37>";
				$data .= ExportManager::ExportData("SemiAnnualAndAnnualIndicatorTracker");
				$data .= "</td>
				</tr>-->

				<tr >
				<td colspan='3'><label for='indicator_type'>Indicator Type:</label></td>
				<td colspan='34'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20);return false;\" >
				<option value='' >-All-</option>";
				$data .= QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
				$data .= "</select></td>
				</tr>

				<tr >
				<td colspan='3'><label for='subcomponent'>IR:</label></td>
				<td colspan='34'>
				<select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName(
				'" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',
				'" . $_SESSION['indicator_Type'] . "',this.value,
				'" . $_SESSION['output_id'] . "','" . $_SESSION['fyear'] . "',
				'" . $_SESSION['semiAnnual'] . "','" . $_SESSION['indicatorCode'] . "',
				'" . $_SESSION['indicator'] . "',1,20
				);return false;\"  >
				<option value=''>-All-</option>";
				$data .= QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
				$data .= "</select>
				</td>
				</tr>

				<tr >
					<td colspan='3'><label for='output'>Sub-IR:</label></td>
					<td colspan='24'>
						<select name='output' class='combobox'  id='output'  
						onChange=\"xajax_$fnctName(
						'" . $_SESSION['zoneID'] . "','" . $_SESSION['districtID'] . "',
						'" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',
						this.value,'" . $_SESSION['fyear'] . "','" . $_SESSION['semiAnnual'] . "',
						'" . $_SESSION['indicatorCode'] . "','" . $_SESSION['indicator'] . "',1,20
						);return false;\">
						<option value=''>-All-</option>";
						$data .= QueryManager::OutputFilter($_SESSION['subcomponent_id'], $_SESSION['output_id']);
						$data .= "</select>
						
						<input name='search' type='button' class='formButton2'   id='button' value='Go'  
							onclick=\"xajax_$fnctName(
							getElementById('zone').value,
							getElementById('district').value,
							getElementById('indicator_type').value,
							getElementById('subcomponent').value,
							getElementById('output').value,
							getElementById('fyear').value,
							getElementById('quarter').value,
							getElementById('indicator_code').value,
							getElementById('indicator').value,
							1,20
							);return false;\"

							onKeyUp=\"xajax_$fnctName(
							getElementById('zone').value,
							getElementById('district').value,
							getElementById('indicator_type').value,
							getElementById('subcomponent').value,
							getElementById('output').value,
							getElementById('fyear').value,
							getElementById('quarter').value,
							getElementById('indicator_code').value,
							getElementById('indicator').value,1,20
							);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export IPTT Report
							&zone=".$_SESSION['zoneID']."
							&district=".$_SESSION['districtID']."
							&indicator_type=".$_SESSION['indicator_Type']."
							&subcomponent=".$_SESSION['subcomponent_id']."
							&output=".$_SESSION['output']."
							&year=".$_SESSION['fyear']."
							&semiAnnual=".$_SESSION['semiAnnual']."
							&indicatorCode=".$_SESSION['indicatorCode']."
							&indicator=".$_SESSION['indicator']."
							&format=excel'>
								<input name='export_iptt' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print IPTT Report&zone=".$_SESSION['zoneID']."
							&district=".$_SESSION['districtID']."
							&indicator_type=".$_SESSION['indicator_Type']."
							&subcomponent=".$_SESSION['subcomponent_id']."
							&output=".$_SESSION['output']."
							&year=".$_SESSION['fyear']."
							&semiAnnual=".$_SESSION['semiAnnual']."
							&indicatorCode=".$_SESSION['indicatorCode']."
							&indicator=".$_SESSION['indicator']."
							&format=Print' target='_blank'>
								<input name='export_iptt' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
";

return $data;
}

function filter_annualResults()
{
    $data = '';
    $data .= "<tr class='evenrow' >
 
    <td width='186' scope='col' colspan='11'><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2'   id='button' name='Submit' value='New Entry' onclick=\"xajax_new_AnnualResults('','','','');return false;\"/> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Actuals&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print Annual Actuals&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";


    $data .= "
<tr class=evenrow>
              <td colspan='2'>Organization:
                <label></label></td>
              <td colspan='9'><select name='organization' id='organization' class='combobox' ><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_organization  group by orgName order by orgName asc") or die(http("FTR-0025"));
    while ($row = mysql_fetch_array($query)) {
        $selectedSIR = ($_SESSION['orgName2'] == $row['org_code']) ? "selected" : "";
        $data .= "<option value=\"" . $row['org_code'] . "\" " . $selectedSIR . " >" . $row['orgName'] . "</option>";
    }
    $data .= "</select></td>
</tr>
<tr class=evenrow>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' ><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_indicator where indicator_type <> ''  group by indicator_type order by indicator_type asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selectedSIR = ($_SESSION['indicator_type'] == $row['indicator_type']) ? "selected" : "";
        $data .= "<option value=\"" . $row['indicator_type'] . "\" " . $selectedSIR . " >" . $row['indicator_type'] . "</option>";
    }
    $data .= "</select></td>
</tr>


<tr class=evenrow>
              <td colspan='2'>Outcome:
                <label></label></td>
              <td colspan='9'><select name='subprogram' id='subprogram' class='combobox' ><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_subcomponent  group by subcomponent order by subcomponent_code asc") or die(http("FL-0038"));
    while ($row = mysql_fetch_array($query)) {
        $selsubcomponent = ($_SESSION['subcomponent_id'] == $row['subcomponent_id']) ? "selected" : "";
        $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selsubcomponent . " >" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";
    }
    $data .= "</select></td>
</tr>
<tr class=evenrow>
              <td colspan='2'>Output:
                <label></label></td>
              <td colspan='9'><select name='output' id='output' class='combobox' ><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_output  group by output_code order by output_code asc") or die(http("FL-0026"));
    while ($row = mysql_fetch_array($query)) {
        $selprogram_name = ($_SESSION['output_name'] == $row['output_id']) ? "selected" : "";
        $data .= "<option value=\"" . $row['output_id'] . "\" " . $selprogram_name . " >" . $row['output_code'] . " " . $row['output_name'] . "</option>";
    }
    $data .= "</select></td>
</tr>
<tr class='evenrow'>
              <td colspan='2'>Indicator:
                <label></label></td>
              <td colspan='9'><textarea  name='indicator' id='indicator'  cols='78'  ></textarea>
</td>
</tr>

";

    $data .= "<tr class=evenrow>
              <td colspan=2>Year:</td><td colspan='' >
			  <select name='fyear' id='fyear' disabled='disabled' style='width:100px;'><option value=''>-All-</option>";

    $yr = date('Y');
    $end = $yr;
    do {
        $selyr = ($_SESSION['fyear'] == $end) ? "SELECTED" : "";
        $data .= "<option value=\"" . $end . "\" " . $selyr . " >" . $end . "</option>
      ";
        $end--;
    } while ($end >= 2010);
    $data .= "</select></td>
			  <td colspan='3'>From:
			  <a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.annualTarget1.fromdate);return false;' hidefocus=''>
      <input name='fromdate' type='text'  size='30' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
			   <td colspan='4' align='left'>To:
			 <a href='javascript:void(0)' onclick='if(self.gfPop)gfPop.fPopCalendar(document.annualTarget1.todate);return false;' hidefocus=''>
      <input name='todate' type='text'  size='20' value=''  readonly='readonly' />
      <img src='WeekPicker/calbtn.gif' alt='' name='popcal' width='34' height='22' border='0' align='absmiddle' id='popcal' /></a></td>
	<td align='right'><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_AnnualResults(getElementById('indicator_type').value,getElementById('indicator').value,getElementById('fyear').value,getElementById('from').value,getElementById('quarter1').value,getElementById('Program').value,getElementById('subprogram').value,1,20);return false;\" /></td>
            </tr>
";

    return $data;
}

//----------------------filter projects--------------------
function filter_projects()
{
    $data = '';
    $data .= "
    <td colspan='4'><label></label>      <label>
      <div align='right' class='floatright'><input type='button' class='formButton2'   id='button' name='new_project' value='New Project' onclick=\"xajax_new_project('','');\" /> \t|\t 
       <a href='export_to_excel_word.php?linkvar=Export Project&&program=" . $_SESSION['program'] . "&&project=" . $_SESSION['project'] . "&&organization=" . $_SESSION['organization'] . "&&status=" . $_SESSION['status'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
	
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Program</td>
    <td colspan=5><select name='Program' id='Program' class='combobox' ><option value=''>-All-</option>";
    $queryzone = mysql_query("select * from tbl_programme order by prog_id  asc") or die(http(0018));
    while ($rowzone = mysql_fetch_array($queryzone)) {
        $selectedzone = ($_SESSION['program'] == $rowzone['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['program_name'] . "\" " . $selectedzone . ">" . $rowzone['prog_id'] . " " . $rowzone['program_name'] . "</option>";
    }
    $data .= "</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='3'>Sub-Program/Commodities</td>
    <td colspan=5><select name='subProgram' id='subProgram' class='combobox' ><option value=''>-All-</option>";
    $querysub = mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc") or die(http("PR-0018"));
    while ($rowsub = mysql_fetch_array($querysub)) {
        $selectedsub = ($_SESSION['program'] == $rowsub['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowsub['subcomponent'] . "\" " . $selectedsub . ">" . $rowsub['subcomponent_code'] . "  " . $rowsub['subcomponent'] . "</option>";
    }
    $data .= "</select></td>
  </tr>
  
  
   
  
  
  
  <tr class='evenrow'>
    <td colspan='3'>Project</td>
    <td colspan=3><select name='Project' id='Project' class='combobox' ><option value=''>-All-</option>";
    $queryzone = mysql_query("select * from tbl_project where display like 'Yes%' order by title  asc") or die(http(0028));
    while ($rowzone = mysql_fetch_array($queryzone)) {
        $selectedzone = ($_SESSION['project'] == $rowzone['title']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['title'] . "\" " . $selectedzone . ">" . $rowzone['project_code'] . "  &nbsp;" . $rowzone['title'] . "</option>";
    }
    $data .= "</select></td><td colspan=2>Status</td>
  </tr>
 
  
  
  
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
    $query1 = mysql_query("select * from tbl_organization order by orgName  asc") or die(http(0037));
    while ($rowOrg1 = mysql_fetch_array($query1)) {
        $selectedTSO = ($_SESSION['organization'] == $rowOrg1['orgName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowOrg1['orgName'] . "\" " . $selectedTSO . ">" . $rowOrg1['orgName'] . "</option>";
    }
    $data .= "</select></td><td><select name='status' id='status'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc") or die(http(0044));
    while ($rowOrg = mysql_fetch_array($query)) {
        $selectedTSO = ($_SESSION['status'] == $rowOrg['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowOrg['codeName'] . "\" " . $sel . ">" . $rowOrg['codeName'] . "</option>";
    }


    $data .= "</select></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_project(getElementById('Program').value,getElementById('subProgram').value,getElementById('Project').value,getElementById('orgName').value,getElementById('status').value,1,20);return false;\" /></td>
  </tr>";

    return $data;

}

//-----------------project report--------------------------
function filter_projectsReport()
{
    $data = '';
    $data .= "
    <td colspan='4'><label></label>      <label>
      <div align='right' class='floatright'>
       <a href='export_to_excel_word.php?linkvar=Export Project&&program=" . $_SESSION['program'] . "&&project=" . $_SESSION['project'] . "&&organization=" . $_SESSION['organization'] . "&&status=" . $_SESSION['status'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
	
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='3'>Program</td>
    <td colspan=5><select name='Program' id='Program' class='combobox' ><option value=''>-All-</option>";
    $queryzone = mysql_query("select * from tbl_programme order by program_name  asc") or die(http(0018));
    while ($rowzone = mysql_fetch_array($queryzone)) {
        $selectedzone = ($_SESSION['program'] == $rowzone['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['program_name'] . "\" " . $selectedzone . ">" . $rowzone['program_name'] . "</option>";
    }
    $data .= "</select></td>
  </tr>
  <tr class='evenrow'>
    <td colspan='3'>Project</td>
    <td colspan=3><select name='Project' id='Project' class='combobox' ><option value=''>-All-</option>";
    $queryzone = mysql_query("select * from tbl_project where display like 'Yes%' order by title  asc") or die(http(0028));
    while ($rowzone = mysql_fetch_array($queryzone)) {
        $selectedzone = ($_SESSION['project'] == $rowzone['title']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['title'] . "\" " . $selectedzone . ">" . $rowzone['project_code'] . "  &nbsp;" . $rowzone['title'] . "</option>";
    }
    $data .= "</select></td><td colspan=2>Status</td>
  </tr>
<tr class='evenrow'>
    <td colspan='3'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
    $query1 = mysql_query("select * from tbl_organization order by orgName  asc") or die(http(0037));
    while ($rowOrg1 = mysql_fetch_array($query1)) {
        $selectedTSO = ($_SESSION['organization'] == $rowOrg1['orgName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowOrg1['orgName'] . "\" " . $selectedTSO . ">" . $rowOrg1['orgName'] . "</option>";
    }
    $data .= "</select></td><td><select name='status' id='status'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_lookup where classCode='6' order by codeName asc") or die(http(0044));
    while ($rowOrg = mysql_fetch_array($query)) {
        $selectedTSO = ($_SESSION['status'] == $rowOrg['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowOrg['codeName'] . "\" " . $sel . ">" . $rowOrg['codeName'] . "</option>";
    }


    $data .= "</select></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_project(getElementById('Program').value,getElementById('Project').value,getElementById('orgName').value,getElementById('status').value,1,20);return false;\" /></td>
  </tr>";

    return $data;

}

function filter_indicator()
{
    $data = '';
    $classCode = 5;
    $data = "<tr CLASS='evenrow'><td width='' align='right' colspan=6><div style='float:right;'>
     <input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' class='formButton' onclick=\"xajax_add_indicator('','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=" . $_SESSION['output'] . "&&subcomponent=" . $_SESSION['subcomponent'] . "&&strategy=" . $_SESSION['indstrategy'] . "&&siractivity=" . $_SESSION['siractivity'] . "&&format=excel'><input type='button' class='formButton2'   id='button' class='formButton' name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
  
  <tr CLASS='evenrow'>
    <td colspan=2>INDICATOR TYPE</td>
    <td colspan='3'><select name='indicator_type' id='indicator_type' class='combobox'><option value='' >-All-</option>";

    $query = mysql_query("select * from tbl_lookup where classCode='" . $classCode . "'  group by codeName order by codeName asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['indicator_type'] == $row['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>
        ";
    }
    $data .= "
      </select>    </td>
    <td></td>
  </tr>";
    $data .= "<tr CLASS='evenrow'>
    <td colspan=2>PROGRAM</td>
    <td colspan='3'><select name='program' id='program' class='combobox'><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_programme where program_name <>''  group by program_name order by program_name asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['program_name'] == $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['program_name'] . "\" " . $selected . ">" . $row['program_code'] . " " . $row['program_name'] . " </option>
        ";
    }
    $data .= "</select>    </td>
    <td></td>
  </tr>
 <tr CLASS='evenrow'>
    <td colspan=2>IR</td>
    <td colspan='3'><select name='subcomponent' id='subcomponent' class='combobox'><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_subcomponent where subcomponent <>''  group by subcomponent order by subcomponent asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['subcomponent'] == $row['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcomponent'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";
    }
    $data .= "
      </select>    </td>
    <td></td></tr>
	<tr CLASS='evenrow'>
    <td colspan=2>Sub-IR</td>
    <td colspan='3'><select name='output' id='output' class='combobox'><option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_output where output_name <>''  group by output_code order by output_code asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['output_name'] == $row['output_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['output_id'] . "\" " . $selected . ">" . $row['output_code'] . " " . $row['output_name'] . " </option>";
    }
    $data .= "
      </select>    </td>
    <td></td></tr>
	
	";

    $data .= "<tr CLASS='evenrow'>
    <td colspan=2>INDICATOR :</td>
    <td colspan='3'><select name='indicator' id='indicator' class='combobox'><option value='' >-All-</option>";

    $queryIND = mysql_query("select * from tbl_indicator where indicator_name <> ''  group by indicator_id order by indicator_code  asc") or die(http("FLTR-298"));
    while ($rowIND = mysql_fetch_array($queryIND)) {

        $selIND = ($_SESSION['indicator_name'] == $rowIND['indicator_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowIND['indicator_name'] . "\" " . $selIND . " > " . $rowIND['indicator_code'] . " " . substr($rowIND['indicator_name'], 0, 70) . "</option>";
    }
    $data .= "</select></td>
    <td><input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' class='formButton' onclick=\"xajax_view_indicator(getElementById('subcomponent').value,getElementById('program').value,getElementById('output').value,getElementById('indicator_type').value,getElementById('indicator').value,1,20);return false;\" /></td>
  </tr>";
    return $data;

}

//-----------------filter indicaotor Definition---------------------------------------
function filter_indicatorDefinition()
{
    $data = '';

    $data = "<table cellspacing='0'     ><tr CLASS='evenrow'>
   

	


    <td width='' align='right' colspan=5 class='dataRow'><div style='float:right;'>
     <input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_new_indicatorDefinition('','','','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=" . $_SESSION['output'] . "&&subcomponent=" . $_SESSION['subcomponent'] . "&&strategy=" . $_SESSION['indstrategy'] . "&&siractivity=" . $_SESSION['siractivity'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
  
  <tr CLASS='evenrow'>
    <td colspan=2 class='dataRow'>INDICATOR TYPE</td>
    <td colspan='2' class='dataRow'><select name='indicator_type' id='indicator_type' class='combobox'><option value='' >-All-</option>";

    $query = mysql_query("select * from tbl_indicator where indicator_type <>''  group by indicator_type order by indicator_type asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['indicator_type'] == $row['indicator_type']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['indicator_type'] . "\" " . $selected . ">" . $row['indicator_type'] . " </option>
        ";
    }
    $data .= "
      </select>    </td>
    <td class='dataRow'></td>
  </tr>
  <tr CLASS='evenrow'>
    <td colspan=2 class='dataRow'>PROGRAM</td>
    <td colspan='2' class='dataRow'><select name='program' id='program' class='combobox'><option valaue=''>-All-</option>";

    $query = mysql_query("select * from tbl_programme where program_name <>''  group by program_name order by program_name asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['program_name'] == $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['program_name'] . "\" " . $selected . ">" . $row['program_name'] . " </option>
        ";
    }
    $data .= "
      </select>    </td>
    <td class='dataRow'></td>
  </tr>
 <tr CLASS='evenrow'>
    <td colspan=2 class='dataRow'>SUB-PROGRAM</td>
    <td colspan='2' class='dataRow'><select name='subcomponent' id='subcomponent' class='combobox'><option valaue=''>-All-</option>";

    $query = mysql_query("select * from tbl_subcomponent where subcomponent <>''  group by subcomponent order by subcomponent asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['subcomponent'] == $row['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcomponent'] . "\" " . $selected . ">" . $row['subcomponent'] . " </option>
        ";
    }
    $data .= "
      </select>    </td>
    <td class='dataRow'></td>
  </tr>
  <tr CLASS='evenrow'>
    <td colspan=2 class='dataRow'>INDICATOR :</td>
    <td colspan='2' class='dataRow'><select name='indicator' id='indicator' class='combobox'><option value='' >-All-</option>";

    $queryIND = mysql_query("select * from tbl_indicator where indicator_name <> ''  group by indicator_id order by indicator_name  asc") or die(http("FLTR-3624"));
    while ($rowIND = mysql_fetch_array($queryIND)) {

        $selIND = ($_SESSION['indicator_name'] == $rowIND['indicator_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowIND['indicator_name'] . "\" " . $selIND . " > " . substr($rowIND['indicator_name'], 0, 70) . "</option>";
    }
    $data .= "</select></td>
    <td class='dataRow'><input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' onclick=\"xajax_view_indicatorDefinition(getElementById('subcomponent').value,getElementById('program').value,getElementById('indicator_type').value,getElementById('indicator').value,1,20);return false;\" /></td>
  </tr>
  
  
  
  
  ";
    return $data;

}


//====================old filters from other area=============================================
function filter_zonalMapping()
{

    $data .= "<tr class='evenrow'>
  
    <td colspan='5'><label></label>      <label>
      <div align='right' class='floatright'>
       <a href='export_to_excel_word.php?linkvar=Export Zonal Mapping&&zone=" . $_SESSION['zone'] . "&&tso=" . $_SESSION['tso'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      </div>
    </label></td>
  </tr>
 <tr class='evenrow'>
    <td colspan='2'>Zone</td>
    <td colspan=3><select name='zonename' id='zonename' class='combobox' ><option value=''>-All-</option>";
    $queryzone = mysql_query("select * from tbl_zone order by zoneName  asc") or die(http(2244));
    while ($rowzone = mysql_fetch_array($queryzone)) {
        $selectedzone = ($_SESSION['zone'] == $rowzone['zoneName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['zoneName'] . "\" " . $selectedzone . ">" . $rowzone['zoneName'] . "</option>";
    }
    $data .= "</select></td>
  </tr>
<tr class='evenrow'>
    <td colspan='2'>Organization</td>
    <td colspan=3><select name='orgName' id='orgName' class='combobox'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_organization order by orgName  asc") or die(http(2244));
    while ($rowOrg = mysql_fetch_array($query)) {
        $selectedTSO = ($_SESSION['tso'] == $rowOrg['orgName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowOrg['orgName'] . "\" " . $selectedTSO . ">" . $rowOrg['orgName'] . "</option>";
    }
    $data .= "</select> | \t<input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_zonalMapping(getElementById('zonename').value,getElementById('orgName').value);return false;\" /></td>
  </tr>";

    return $data;

}


function filter_programme()
{

    $data = "<tr class='evenrow'>
    <td colspan=4></td>

    <td width='154' align='right'><input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_add_programme();return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=" . $_SESSION['programme'] . "&&funder=" . $_SESSION['funder'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
  <tr CLASS='evenrow'>
  <td width=''>PROGRAMME </td>
    <td colspan='3'><select name='program' id='program' class='combobox2'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_programme order by program_name asc") or die(mysql_error());
    while ($row1 = mysql_fetch_array($query1)) {
        $selprogramme = ($_SESSION['programme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selprogramme . ">" . $row1['program_code'] . " " . substr($row1['program_name'], 0, 40) . "</option>";

    }

    $data .= "</select></td>
   
    <td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_view_programme(getElementById('program').value,'');return false;\"/></td>
    <td>&nbsp;</td>
    
  </tr>
";
    return $data;

}

//-------------------------
function filter_supergoal()
{

    $data = "<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan=7 align='right'><input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_new_supergoal('','','','');return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=" . $_SESSION['programme'] . "&&funder=" . $_SESSION['funder'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan=3 >Output</td>
    <td colspan='6'><select name='output' id='output' onchange=\"xajax_view_supergoal(this.value,'','','','','');return false;\" class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_output order by output_code asc") or die(http("VP-501"));
    while ($row1 = mysql_fetch_array($query1)) {

        $seloutput = ($_SESSION['output_name'] == $row1['output_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['output_name'] . "\" " . $seloutput . ">" . $row1['output_code'] . "  " . $row1['output_name'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan=3 >Program</td>
    <td colspan='6'><select name='program' id='program' onchange=\"xajax_view_supergoal('" . $_SESSION['output_name'] . "',this.value,'','','','');return false;\" class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("SELECT p.`prog_id` , p.`program_code` , p.`output_id` ,
	  p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	  FROM `tbl_programme` p
	  LEFT JOIN tbl_output o 
	  ON ( o.output_id = p.output_id ) where o.output_name like '" . $_SESSION['output_name'] . "%' order by program_name asc") or die(http("VP-523"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selprogramme = ($_SESSION['programme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selprogramme . ">" . $row1['program_name'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Sub-Program</td>
    <td colspan=6><select name='subprogram' id='program' onchange=\"xajax_view_supergoal('" . $_SESSION['output_name'] . "','" . $_SESSION['programme'] . "',this.value,'','','');return false;\" class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_subcomponent sc
	  left join tbl_programme p on(sc.prog_id=p.prog_id) 
	  left join tbl_output o on(o.output_id=sc.output_id)
	  where o.output_name like '" . $_SESSION['output_name'] . "%' and p.program_name like '" . $_SESSION['programme'] . "%' order by subcomponent_code asc") or die(http("VP-544"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selsubprogramme = ($_SESSION['subprogramme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selsubprogramme . " >" . $row1['program_name'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3'>Project:</td>
    <td colspan=6><select name='project' id='project' class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("SELECT pr.title, sc.subcomponent
FROM tbl_project pr
LEFT JOIN tbl_subcomponent sc ON ( sc.subcomponent_id = pr.subprogram_code )
 where sc.subcomponent like '" . $_SESSION['subprogramme'] . "%' order by title asc") or die(http("VP-565"));
    while ($row1 = mysql_fetch_array($query1)) {
        $selprogramme = ($_SESSION['project'] == $row1['title']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['title'] . "\" " . $selprogramme . ">" . $row1['selcodeName'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr class='display_none'>
  <td width='' colspan='3' >Super Goal Type:</td>
    <td colspan=6><select name='type' id='type' class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_lookup where classCode='23' order by codeName asc") or die(mysql_error());
    while ($row1 = mysql_fetch_array($query1)) {
        $selcodeName = ($_SESSION['codeName'] == $row1['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['codeName'] . "\" " . $selcodeName . " >" . $row1['codeName'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr CLASS='evenrow'>
  <td width='' colspan='3'>Super Goal </td>
    <td colspan='5'><select name='supergoal' id='supergoal' class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_supergoal order by component asc") or die(http("VP-599"));
    while ($row1 = mysql_fetch_array($query1)) {
        $selsupergoal = ($_SESSION['supergoal'] == $row1['component']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['component'] . "\" " . $selsupergoal . ">" . $row1['component'] . "</option>";

    }

    $data .= "</select></td>
   
    <td><input name='search' type='button' class='formButton2'   id='button'  value='Go'  onclick=\"xajax_view_supergoal('','','','','',getElementById('supergoal').value);return false;\"/></td>

    
  </tr>
";
    return $data;

}


function filter_goal()
{

    $data = "<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan=7 align='right'><input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_new_goal('','','','');return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=" . $_SESSION['programme'] . "&&funder=" . $_SESSION['funder'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>

  <tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='6'><select name='program' id='program' onchange=\"xajax_view_supergoal('" . $_SESSION['output_name'] . "',this.value,'','','','');return false;\" class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("SELECT p.`prog_id` , p.`program_code` ,
	  p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	  FROM `tbl_programme` p
	   order by program_name asc") or die(http("VP-523"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selprogramme = ($_SESSION['programme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selprogramme . ">" . $row1['program_code'] . " " . $row1['program_name'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  
";
    return $data;

}

function filter_purpose()
{

    $data = "<tr class='evenrow'>
    <td colspan=''>.</td>

    <td width='' colspan=7 align='right'><input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_new_purpose('','','','','','');return false;\" />
      </td>
    <td width='40' align='right'><label><a href='export_to_excel_word.php?linkvar=Export Project Goal&&programme=" . $_SESSION['programme'] . "&&funder=" . $_SESSION['funder'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      
    </label></td>
    
  </tr>
 
  <tr class='evenrow3'>
  <td width='' colspan=3 >Program</td>
    <td colspan='6'><select name='program' id='program' onchange=\"xajax_view_supergoal('" . $_SESSION['output_name'] . "',this.value,'','','','');return false;\" class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("SELECT p.`prog_id` , p.`program_code`,
	 					 p.`program_name` , p.`Funder` , p.`imp_org` , p.`details` 
	 					 FROM `tbl_programme` p order by p.program_name asc") or die(http("FILTER-657"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selprogramme = ($_SESSION['programme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selprogramme . ">" . $row1['program_code'] . " " . $row1['program_name'] . "</option>";

    }

    $data .= "</select></td></tr>";
    return $data;

}


#--------------------------------------------------------------------------

function filter_projectLifeFinancialTargets()
{

    $data = "<tr>
F
    <th scope='col' colspan='2'>Programme</th><th colspan=3>
      <select name='programme100' size='1' id='programme100'><option value='%' >-All-</option>";
    $query = mysql_query("select * from tbl_programme order by program_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($programme100 = $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['program_name'] . "' '" . $sel . "'>" . $row['program_name'] . "</option>";
    }

    $data .= "</select><div style='float:right'><input name='New Entry' value='New Entry' type='button' class='formButton2'   id='button' onclick=\"xajax_projectLifeFinancialBudget('')\"/><a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=" . $_SESSION['programme100'] . "&&subcomponent=" . $_SESSION['subcomponent100'] . "&&output=" . $_SESSION['output100'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></div>
    </th>
   
  
  </tr>";
    /* $data.=" <tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>
     <option value='%'  >-All-</option>";
         $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
         while($row=mysql_fetch_array($query)){
        $sel=($_SESSION['subcomponent100']=$row['subcomponent'])?"SELECTED":"";
         $data.="<option value='".$row['subcomponent']."' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
         }
         
         $data.="</select></th><th></th></tr>";onchange=\"xajax_projectLifeFinancialBudget(getElementById('subcomponent').value);\" */
    $data .= "<tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>";
    if ($subcomponent100 != '')
        $data .= "<option value='" . $subcomponent100 . "' />" . $subcomponent100 . "</option>";
    else
        $data .= "<option value='%' />-All-</option>";
    $query2 = mysql_query("select * from tbl_subcomponent  order by subcomponent_code desc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query2)) {
        #$selected2=($_SESSION['ssubcomponent_id']==$row2['id'])?"SELECTED":"";
        //if($_SESSION['ssubcomponent_id']==$row['id'])
        $data .= "<option value='" . $row2['subcomponent'] . "' '" . $selected2 . "'>" . $row2['subcomponent_code'] . " " . $row2['subcomponent'] . "</option>";
    }


    $data .= "</select></th><th></th></tr>
  <tr>


    <th scope='col' colspan='2'>Output</th><th colspan=2>
      <select name='output100' size='1' id='output100' >";
    if ($output100 != '')
        $data .= "<option value='" . $output100 . "' >" . $_SESSION['output100'] . "</option>";
    else
        $data .= "<option value='%' >-All-</option>";

    $query = mysql_query("select * from tbl_output order by output_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        #$selected2=($_SESSION['output100']==$row['output_name'])?"SELECTED":"";
        $data .= "<option value='" . $row['output_name'] . "' '" . $selected2 . "'>" . $row['output_code'] . " " . $row['output_name'] . "</option>";
    }

    $data .= "</select>
    </th> <th scope='col'><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value)\" /></th>
   
  </tr>";

    return $data;


}


function filter_ProgramResultsProjectLifeFinancialTargets()
{

    $data = "<tr class=evenrow>

    <td scope='col' colspan='2'>Programme</td><td colspan=3>
      <select name='programme100' size='1' id='programme100'><option value='%' >-All-</option>";
    $query = mysql_query("select * from tbl_programme order by program_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($programme100 = $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['program_name'] . "' '" . $sel . "'>" . $row['program_name'] . "</option>";
    }

    $data .= "</select><div style='float:right'><a href='export_to_excel_word.php?linkvar=Export Project Life Financial Targets&&programme=" . $_SESSION['programme100'] . "&&subcomponent=" . $_SESSION['subcomponent100'] . "&&output=" . $_SESSION['output100'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></div>
    </td>
   
  </tr>";
    /* $data.=" <tr> <th scope='col' colspan='2'>SUB-COMPONENT:</th> <th scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>
     <option value='%'  >-All-</option>";
         $query=mysql_query("select * from tbl_subcomponent order by id asc")or die(mysql_error());
         while($row=mysql_fetch_array($query)){
        $sel=($_SESSION['subcomponent100']=$row['subcomponent'])?"SELECTED":"";
         $data.="<option value='".$row['subcomponent']."' '".$sel."'>".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
         }
         
         $data.="</select></th><th></th></tr>";onchange=\"xajax_projectLifeFinancialBudget(getElementById('subcomponent').value);\" */
    $data .= "<tr class='evenrow'> <td scope='col' colspan='2'>SUB-COMPONENT:</td> <td scope='col' colspan=2><select name='subcomponent100' size='1' id='subcomponent100'>";
    if ($subcomponent100 != '')
        $data .= "<option value='" . $subcomponent100 . "' />" . $subcomponent100 . "</option>";
    else
        $data .= "<option value='%' />-All-</option>";
    $query2 = mysql_query("select * from tbl_subcomponent  order by subcomponent_code desc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query2)) {
        #$selected2=($_SESSION['ssubcomponent_id']==$row2['id'])?"SELECTED":"";
        //if($_SESSION['ssubcomponent_id']==$row['id'])
        $data .= "<option value='" . $row2['subcomponent'] . "' '" . $selected2 . "'>" . $row2['subcomponent_code'] . " " . $row2['subcomponent'] . "</option>";
    }


    $data .= "</select></td><td></td></tr>
  <tr class='evenrow'>


    <td scope='col' colspan='2'>Output</td><td colspan=2>
      <select name='output100' size='1' id='output100' >";
    if ($output100 != '')
        $data .= "<option value='" . $output100 . "' >" . $_SESSION['output100'] . "</option>";
    else
        $data .= "<option value='%' >-All-</option>";

    $query = mysql_query("select * from tbl_output order by output_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        #$selected2=($_SESSION['output100']==$row['output_name'])?"SELECTED":"";
        $data .= "<option value='" . $row['output_name'] . "' '" . $selected2 . "'>" . $row['output_code'] . " " . $row['output_name'] . "</option>";
    }

    $data .= "</select>
    </td> <td scope='col'><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_projectLifeFinancialBudget(getElementById('programme100').value,getElementById('subcomponent100').value,getElementById('output100').value)\" /></td>
   
  </tr>";

    return $data;


}


function filter_TSOfinancialctuals()
{
#'".$_SESSION['usersubcomponent']."','".$activity_id."','".$org_code.",'".$orgname."'
    $data .= "<tr class=evenrow><td colspan=2>Year</td>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
    $yr = date(Y);
    $end = $yr;
    do {
        $data .= "<option value='$end'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>
    </td><td class=evenrow colspan=2>Quarter:
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
    $query = mysql_query("select * from tbl_quarters order by quarterCode") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['quarterName'] . "'>" . $row2['quarterName'] . "</option>";
    }
    $data .= "</select> <div style='float:right;'>
                              
                <input name='new_entry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals('" . $_SESSION['usersubcomponent'] . "','','" . $_SESSION['managerorg_code'] . "','" . $_SESSION['orgName'] . "');return false;\" /> |
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=" . $_SESSION['usersubcomponent'] . "&&org_code=" . $_SESSION['managerorg_code'] . "&&orgname=" . $_SESSION['orgName'] . "&&subactivity=" . $_SESSION['subactivity107'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> </div></td></tr>
			  <tr class='evenrow'><td colspan=2>Intermediate Result Area</td><td colspan=3><select name='subcomponent' id='subcomponent' >";

    $data .= "
                <option value='%'>-All-</option>
                ";

    $query = mysql_query("select * from tbl_subcomponent  order by id asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['titlesubcomponent'] == $row['subcomponent'] ? "SELECTED" : "";
        $data .= "
                <option value='" . $row['id'] . "' '" . $selected . "'>" . $row['subcomponent_code'] . " " . substr($row['subcomponent'], 0, 70) . "</option>
                ";

    }
    $data .= "</select></td>
<tr class='evenrow'>  <td colspan=2>Sub-Intermediate Result Area</td><td colspan=2><select name='subactivity' id='subactivity' >";
    $data .= "<option value='%'>-All-</option>
                ";


    $query = mysql_query("select * from tbl_output  order by output_id asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['output_name'] . "%'>" . $row['output_code'] . " " . substr($row['output_name'], 0, 70) . ";</option>";

    }
    $data .= "</select></td>
              <td><input type='button' class='formButton2'   id='button' name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value," . $_SESSION['managerorg_code'] . "," . $_SESSION['orgName'] . ",getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value)\" /></td>
            </tr>
            ";

    return $data;
}


function filter_vcdActuals_Manager()
{
#'".$_SESSION['usersubcomponent']."','".$activity_id."','".$org_code.",'".$orgname."'

    $data = "<tr class=''>
              <td colspan=3 class='green_field'>Program Monitoring  &raquo; " . ucwords($_SESSION['titlesubcomponent']) . " 
  </td>
              <td colspan=2 class='green_field'><div align='right'>
                              
                <input name='new_entry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_valueChainFinancialActuals_Manager('" . $_SESSION['usersubcomponent'] . "','','" . $_SESSION['managerorg_code'] . "','" . $_SESSION['orgName'] . "');return false;\" />
                 <a href='export_to_excel_word.php?linkvar=Export Financial Actuals&&subcomponent=" . $_SESSION['usersubcomponent'] . "&&org_code=" . $_SESSION['managerorg_code'] . "&&orgname=" . $_SESSION['orgName'] . "&&subactivity=" . $_SESSION['subactivity107'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> </div></td>
  </tr>
				 <tr>
              <td colspan='6'><hr/></td></tr>
		
		<tr class=evenrow>
              <td>
                <label>Year</label></td>
              <td>Quarter</td>
              <td>Sub-
                
              component</td>
              <td>Sub-Activity</td>
              <td>&nbsp;</td>
		</tr>
";


    $data .= "<tr class=evenrow2>
              <td><select name='period' id='period'><option value='%'>-All-</option>";
    $yr = date(Y);
    $end = $yr;
    do {
        $data .= "<option value='$end'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>
    </label></td>
    <td class=evenrow><label>
      <select name='quarter' id='quarter'><option value='%'>-All-</option>";
    $query = mysql_query("select * from tbl_quarters order by quarterCode") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['quarterName'] . "'>" . $row2['quarterName'] . "</option>";
    }
    $data .= "</select></td>
             
              <td><select name='subcomponent' id='subcomponent' >";

    $data .= "
                <option value='%'>-All-</option>
                ";

    $query = mysql_query("select * from tbl_subcomponent where id='" . $_SESSION['usersubcomponent'] . "' order by id asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['titlesubcomponent'] == $row['subcomponent'] ? "SELECTED" : "";
        $data .= "
                <option value='" . $row['id'] . "' '" . $selected . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>
                ";

    }
    $data .= "</select></td><td><select name='subactivity' id='subactivity' >";
    $data .= "<option value='%'>-All-</option>
                ";


    $query = mysql_query("select * from tbl_subactivity where subcomponent_id='" . $_SESSION['usersubcomponent'] . "' order by subact_id asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['subcativity_name'] . "%'>" . $row['subactivity_code'] . "" . substr($row['subactivity_name'], 0, 40) . ";</option>";

    }
    $data .= "</select></td>
              <td><input type='button' class='formButton2'   id='button' name='button' id='button' value='Go' onclick=\"xajax_view_valueChainFinancialActuals_Manager(getElementById('subcomponent').value," . $_SESSION['managerorg_code'] . "," . $_SESSION['orgName'] . ",getElementById('subactivity').value,getElementById('period').value,getElementById('quarter').value)\" /></td>
            </tr>
            ";

    return $data;
}


function filter_users()
{

    $data = "
<tr class=evenrow>
     </td>
	
	
	<td scope='col' COLSPAN='6'><div style='float:right;'><input type='button' class='formButton2'   id='button' name='button' id='button' value='Add User' onclick=\"xajax_new_user();return false;\"  /> | <a href='export_to_excel_word.php?linkvar=Export User&&name=" . $_SESSION['name1'] . "&&username=" . $_SESSION['user1'] . "&&usergroup=" . $_SESSION['usergroup1'] . "&&role=" . $_SESSION['role1'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' /></a></div></td>
	</tr>
 
	 <tr class=evenrow>
   
     
</td>
	
	</tr>
	
	
	
	<tr class='evenrow'>
    <td scope='col' colspan=''>ROLE:</td><td colspan=2><select name='role1' id='role1'>";
    if ($_SESSION['role1'] != '')
        $data .= "<option  value='" . $_SESSION['role1'] . "'>" . $_SESSION['role1'] . "</option>";
    else
        $data .= "<option  value=''>-All-</option>";
    $query = mysql_query("select role from tbl_user group by role order by role asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['role'] . "'>" . $row['role'] . "</option>";

    }

    $data .= "</select></td><td scope='col' colspan=''>USER GROUP</td> <td colspan=2><select name='usergroup' id='usergroup'>";
    if ($_SESSION['usergroup1'] != '')
        $data .= "<option  value='" . $_SESSION['usergroup1'] . "'>" . $_SESSION['usergroup1'] . "</option>";
    else
        $data .= "<option  value=''>-All-</option>";
    $query = mysql_query("select * from tbl_usergroup order by group_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['group_name'] . "'>" . $row['group_name'] . "</option>";

    }

    $data .= "</select>  
    
    

  </tr>
<tr class=evenrow>
    <td scope='col' COLSPAN=''>NAME</td>
	
	<td COLSPAN=2><select id='name1' name='name1'>";
    if ($_SESSION['name1'] != '')
        $data .= "<option  value='" . $_SESSION['name1'] . "'>" . $_SESSION['name1'] . "</option>";
    else
        $data .= "<option  value=''>-All-</option>";
    $query = mysql_query("select name from tbl_user order by name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['name'] . "'>" . substr($row['name'], 0, 40) . "</option>";

    }

    $data .= "
    </select>   </td>
	 <td scope='col' COLSPAN=''>USENAME:</td>
	<td COLSPAN=''><select id='username' name='username' >";
    if ($_SESSION['name1'] != '')
        $data .= "<option  value='" . $_SESSION['username'] . "'>" . $_SESSION['username'] . "</option>";
    else
        $data .= "<option  value=''>-All-</option>";
    $query = mysql_query("select username from tbl_user order by username asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['username'] . "'>" . substr($row['username'], 0, 40) . "</option>";
    }


    $data .= "</select> <td align='right'><input name='filter' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_users(getElementById('name1').value,
	 getElementById('username').value,
	 getElementById('usergroup').value,
	 getElementById('role1').value);
	 return false;\" /></td> 
	</tr>";

    return $data;
}


function filter_systemlogs()
{

    $data = "<tr class='evenrow'>
    <td width='144' scope='col'><di>
    <div align='left'><b>Log  ID</b> </div></td>
    <td width='84' scope='col'><div align='left'><b>Username</b></div></th>
    <td width='145' scope='col'><div align='left' colspan='3' ><b>Ip Address</b></div></th>
    <td width='209' colspan='3' scope='col' ><div align='right'><div style='float:left;'><b>Status</b></div> <a href='export_to_excel_word.php?linkvar=Export System Logins&&log_id=" . $_SESSION['login_id'] . "&&username=" . $_SESSION['username1'] . "&&ipaddress=" . $_SESSION['ipaddress'] . "&&status=" . $_SESSION['status'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  <tr class=evenrow>
    <td><label>
      <input type='text' name='logid' id='logid' value='" . $_SESSION['login_id'] . "' />
    </label></td>
    <td><label>
      <select name='username' id='username'>
	  <option value=''>-All-</option>";
    if ($_SESSION['username1'] != '')
        $data .= "<option value='" . $_SESSION['username1'] . "'>" . $_SESSION['username1'] . "</option>";
    else $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_login l join tbl_user u on(l.user_id=u.user_id) group by username order by username asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='%" . $row['username'] . "'>" . $row['username'] . "</option>";

    }
    $data .= "</select>
    </label></td>
    <td colspan=''><input type='text' name='ipaddress'  id='ipaddress' value='" . $_SESSION['ipaddress'] . "'/></td><td colspan=2><select name='status' id='status'>";
    if ($_SESSION['status'] != '')
        $data .= "<option value='" . $_SESSION['status'] . "'>" . $_SESSION['status'] . "</option>";
    else $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_login group by status order by status asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['status'] . "'>" . $row['status'] . "</option>";

    }
    $data .= "</select></td>
    <td><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_login(getElementById('logid').value,getElementById('username').value,getElementById('ipaddress').value,getElementById('status').value,1,20);return false;\" />
    </label></td>
  </tr>";
    return $data;


}


function filter_activityBasedPlanning()
{
    $data = " 
		 <tr class=''>
              <td colspan='3' class='green_field'><div style='float:left;'>Planning &raquo; Results Based Project Life Targets
                </div><div style='float:right;'><input name='new_entry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_newResultsBasedIndicatorProjectLifePlanning('" . $_SESSION['activity'] . "','');return false;\" /><a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=" . $_SESSION['activity'] . "&&programme=" . $_SESSION['programme'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></div></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>
		<tr class=evenrow2>
              <td colspan=''>Programme:</td>
              <td colspan='2'><select name='programme' id='programme'>
                <option value=''>-All-</option>";
    $q = mysql_query("select * from tbl_programme order by prog_id asc") or die("Sunrise Error-code:264 because, " . mysql_error());
    while ($row = mysql_fetch_array($q)) {
        $selected = ($_SESSION['programme104'] == $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['program_name'] . "%' '" . $selected . "' >" . $row['program_name'] . "</option>";

    }
    $data .= "</select>              </td>
            </tr>
		<tr class=evenrow>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan=''><select name='subcomponent' id='subcomponent' ><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected2 = ($_SESSION['subcomponent104'] == $row['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['subcomponent'] . "%' '" . $selected2 . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_activityBasedPlanning('Results Based',getElementById('programme').value,getElementById('subcomponent').value)\" /></td>
        </tr>
";


    $data .= "
            <tr class='evenrow'>
             
              <td colspan='3' class='evenrow'><div align='center'><strong> Results Based Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=>Select</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

    return $data;
}

function filter_subactivityBasedPlanning()
{


    $data = "<tr class=''>
              <td colspan='3' class='green_field'>Planning &raquo; Sub-Activity Project Life Targets
                <label></label></td><td width='300' align=right colspan='2'><input name='new_entry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_subactivityBasedIndicatorPlanning('" . $activity . "','','');return false;\" />  <a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=" . $_SESSION['activity'] . "&&programme=" . $_SESSION['programme'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='5'><hr/></td></tr>";
    $data .= "<tr class=evenrow2>
             <td >Programme:</td><td colspan='4'> 
             <select name='programme' id='programme103' >
                <option value=''>-All-</option>";
    $q = mysql_query("select * from tbl_programme order by prog_id asc") or die("Sunrise Error-code:197 because, " . mysql_error());
    while ($row = mysql_fetch_array($q)) {
        $sel = ($programme == $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['program_name'] . "%'  '" . $sel . "'>" . $row['program_name'] . "</option>";

    }
    $data .= "</select>     </td>
            </tr>
		
		<tr class=evenrow>
              <td colspan=''>Sub-component:
                <label></label></td>
              <td colspan='4'><select name='subcomponent' id='subcomponent103' >";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['subcomponent11'] == $row['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['subcomponent'] . "%' '" . $sel . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Output:
                <label></label></td>
              <td colspan='4'><select name='output' id='output103' >";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_output order by output_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['output'] == $row['output_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['output_name'] . "%' '" . $sel . "'>" . $row['output_code'] . " " . $row['output_name'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Activity:
                <label></label></td>
              <td colspan='4'><select name='activity' id='activity103' >";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_activity order by activity_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['activity'] == $row['activity_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['activity_name'] . "%' '" . $sel . "'>" . $row['activity_code'] . " " . $row['activity_name'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Sub-Activity:
                <label></label></td>
              <td colspan='4'><select name='subactivity' id='subactivity103' >";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subactivity order by subactivity_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['subactivity'] == $row['subactivity_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['subactivity_name'] . "%' '" . $sel . "'>" . $row['subactivity_code'] . " " . substr($row['subactivity_name'], 0, 70) . "</option>";

    }
    $data .= "</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan=''>Indicator:
                <label></label></td>
              <td colspan='3'><select name='indicator' id='indicator103' >";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_indicator  group by indicator_name order by indicator_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION[''] == $row['indicator_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['indicator_name'] . "%'>" . substr($row['indicator_name'], 0, 70) . "</option>";
//'".$activity."',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value

    }
    $data .= "</select></td><td align='right'><input name='search' type='button' class='formButton2'   id='button' value='Go' onClick=\"xajax_subActivityBasedIndicatorPlanning('" . $activity . "',getElementById('programme103').value,getElementById('subcomponent103').value,getElementById('output103').value,getElementById('activity103').value,getElementById('subactivity103').value,getElementById('indicator103').value);return false;\" /></td>
        </tr>

            <tr class='evenrow'>
             
              <td colspan='5' class='evenrow'><div align='center'><strong> Results Based Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			<td colspan='' class='evenrow2' >Code</td>
			<td colspan='' class='evenrow2' >Subactivity</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

    return $data;
}


function filter_SunriseTrustBasedPlanning()
{
    $data = " 
		 <tr class=''>
              <td colspan='2' class='green_field'>Planning &raquo; Results Based Project Life Targets
                <label></label></td><td width='300' align=right><input name='new_entry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_ABTrustBasedIndicatorPlanning('" . $activity . "','');return false;\" /> <a href='export_to_excel_word.php?linkvar=Export Sunrise Trust Project Life Targets&&activity=" . $_SESSION['activity'] . "&&programme=" . $_SESSION['programme'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></td></tr>
				 <tr>
              <td colspan='3'><hr/></td></tr>";


    $data .= "<tr class=evenrow>
              <td colspan='3'>Programme: 
           <select name='programme' id='programme' onchange=\"xajax_ABTrustBasedIndicatorPlanning('Sunrise trust',getElementById('programme').value)\">
                <option value=''>-All-</option>";
    $q = mysql_query("select * from tbl_programme order by prog_id asc") or die("Sunrise Error-code:197 because, " . mysql_error());
    while ($row = mysql_fetch_array($q)) {
        $sel = ($_SESSION['programme101'] == $row['program_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row['program_name'] . "%'  '" . $sel . "'>" . $row['program_name'] . "</option>";

    }
    $data .= "</select>     </td>
            </tr>
            <tr class='evenrow'>
             
              <td colspan='3' class='evenrow'><div align='center'><strong> Sunrise Trust Project Life Targets</strong></div></td>
            </tr>
            <tr class=evenrow2>
			<td width='50' class='evenrow2' colspan=''>Select</td>
			  <td colspan='' class='evenrow2' >Indicator</td>
			  <td width='' class='evenrow2' align=right><b>Total</b></td>
            </tr>";

    return $data;
}


function filter_resultsBasedIndicator()
{
    $data = " 
		 <tr class=''>
              <td colspan='8' class='green_field'>Planning &raquo; Physical Project Life Targets
                <label></label></td></tr>
				 <tr>
              <td colspan='8'><hr/></td></tr>
		 <tr class=evenrow2>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='6'><select name='planning_type' id='planning_type' onchange=\"xajax_reload_newActivityBasedPlanning(getElementById('planning_type').value)\"><option value=''>-Select-</option>";

    $queryt = mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc") or die(mysql_error());
    while ($rowt = mysql_fetch_array($queryt)) {
        if ($_SESSION['activity'] != '')
            $selected = $row['indicator_type'] == $rowt['indicator_type'] ? "SELECTED" : "";
//$data.="<option value='".$_SESSION['activity']."'>".$_SESSION['activity']."</option>";

        $data .= "<option value='" . $rowt['indicator_type'] . "' '" . $selected . "'>" . $rowt['indicator_type'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
		<tr class=evenrow>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='6'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_newProjectLifeTarget_subcomponent(getElementById('subcomponent').value)\">";
    if ($_SESSION['PLTsubcomponent_id'] != '')
        $data .= "<option value='" . $_SESSION['PLTsubcomponent_id'] . "'>" . $_SESSION['PLTsubcomponent_code'] . " " . $_SESSION['PLTsubcomponent'] . "</option>";

    else
        $data .= "<option value=''>-Select-</option>";
    $querysc = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(mysql_error());
    while ($rowsc = mysql_fetch_array($querysc)) {
        $data .= "<option value='" . $rowsc['id'] . "'>" . $rowsc['subcomponent_code'] . " " . $rowsc['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
";


    $data .= "<tr class=evenrow2>
              <td colspan='2'>Period</td>
              <td colspan='6'><select name='period' id='period'>
                <option value='4'>4Yrs</option>
              </select>              </td>
            </tr>";

    return $data;
}


function filter_narratives()
{
    $data = "<tr>
    <th width='' scope='col' >Year <select name='year'><option value=''>-All-</option>";
    $year = date(Y);
    $end = $year;
    do {
        $data .= "<option value='" . $end . "'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>  </th><th>REPORTING PERIOD<select name='reportingperiod'><option value=''>-All-</option>";
    $ss = mysql_query("select * from tbl_quarters order by quarterCode asc ") or die(mysql_error());
    while ($r = mysql_fetch_array($ss)) {
        $data .= "<option value='" . $r['quarterName'] . "%'>" . $r['quarterName'] . "</option>";
    }
    $data .= "</select></th>
    <th width='' scope='col' colspan=2><input type='button' class='formButton2'   id='button' name='button' id='button' value='Export to Excel' />";
    if ($_SESSION['role'] == 'Managing Director')
        $data .= "";
    else if ($_SESSION['role'] == 'Chief Technical Advisor')
        $data .= "";
    else {
        $data .= "<input type='button' class='formButton2'   id='button' name='button2' id='button2' value='New Entry' onclick=\"xajax_new_narrative()\"/>";
    }
    $data .= "</th>
  </tr>
  <tr>
    <th width='' scope='col' >SUB-COMPONENT </th><th>  <select name='select'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by id") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['id'] . "%'>" . $row2['subcomponent_code'] . " " . $row2['subcomponent'] . "</option>";
    }
    $data .= "</select></th>
    <th width='' scope='col' colspan=2></th>
  </tr>
   <tr>
    <th width='' scope='col' >INDICATOR</th><th colspan=3> <select name='indicator_id' id='indicator_id'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_indicator order by indicator_id") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['indicator_id'] . "%'>" . substr($row2['indicator_name'], 0, 50) . "</option>";
    }
    $data .= "</select></th>
    
  </tr>
";

}


function filter_userGroup()
{
    $data .= " <table cellspacing='0'      width='600'><tr>
    
  <tr class='evenrow'>
    <td scope='col'>&nbsp;</td>
    <td scope='col'><div align='right'>GROUP NAME</div></td>
    <td scope='col'><div align='left' width=100>
      <select name='group_name' id='group_name' onchange=\"xajax_view_usergroup(getElementById('group_name').value);return false;\"><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_usergroup where group_name <> '' order by group_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['group_name'] . "%'>" . substr($row['group_name'], 0, 40) . "</option>";
    }
    $data .= "</select>
    </div></td>
    <td scope='col' align=right><div id='' align='right'><input name='newentry' type='button' class='formButton2'   id='button' value='New Entry' onclick=\"xajax_new_usergroup()\" /> | <input name='' type='button' class='formButton2'   id='button' value='Export to Excel' />  </div></td>
  </tr></table>";
    return $data;
}


function filter_activityBasedIndicator()
{
    $data .= " <tr>
             
			  <tr><td colspan=''>Indicator Type <select name='planning_type' id='planning_type' onchange=\"xajax_selectActivityBasedReporting(getElementById('planning_type').value)\" >";
    if ($_SESSION['activity'] != '')
        $data .= "<option value='" . $_SESSION['activity'] . "'>" . $_SESSION['activity'] . "</option>";
    $data .= "<option value=''>-Select-</option>";
    $query = mysql_query("select distinct(indicator_type) from tbl_indicator group by indicator_type order by indicator_type asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['indicator_type'] . "'>" . $row['indicator_type'] . "</option>";

    }
    $data .= "</select></td><td>
			  Year <select name='year' id='year'>
			  <option value='%'>-All-</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
                  <option value='2010'>2010</option>
				  <option value='2011'>2011</option>
				  <option value='2012'>2012</option>
				  <option value='2013'>2013</option>
              </select>
			  </td></tr>
 

            <tr>
            ";
    return $data;

}

//


function selectfis()
{
//$obj=new xajaxResponse();
    $data = "
  <tr>
    <td><div align='right'>Quarterly Reporting Category:</div></td>
    <td><select name='project_lifeplanning' id='project_lifeplanning' onChange=\"xajax_switchValueChainQuarterlyReporting(getElementById('project_lifeplanning').value,'" . $org_code . "','" . $orgname . "');return false;\">";
    $data .= "<option value=''>-Select-</option>";
    if ($_SESSION['usersubcomponent'] == '2') {
        $data .= "<option value='Line of credit'>Line of credit</option>
		<option value='Memorandum of Understanding (MOU)'>Memorandum of Understanding (MOU)</option>
		<option value='Grants'>Grants</option>
		<option value='New Branches'>New Branches</option>";
        $query = mysql_query("select * from tbl_lookup where classCode=4") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $data .= "<option value='" . $row['codeName'] . "'>" . $row['codeName'] . "</option>";
        }
    } else {
        $query = mysql_query("select * from tbl_lookup where classCode='4'") or die(mysql_error());
        while ($row = mysql_fetch_array($query)) {
            $data .= "<option value='" . $row['codeName'] . "'>" . $row['codeName'] . "</option>";
        }
    }
    $data . "</select></td>

  </tr>";
    return $data;
}


function filter_TSOquantitativeResultsReport()
{

    $_SESSION['wpsubcomponent'] = $resultsarea;
    $_SESSION['subintermediateResultArea'] = $subresultarea;
    $_SESSION['fyear'] = $year;
    $_SESSION['indicator_12'] = $indicator;
    $data = "
  <tr class='evenrow'>
    
    <td width='105' scope='col' colspan=18>
      <div align='right'>
        <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Results Report&&resultarea=" . $_SESSION['wpsubcomponent'] . "&&output=" . $_SESSION['subintermediateResultArea'] . "&&indicator=" . $_SESSION['indicator_12'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' /></a>
      </div>
   </td></tr>
  
   <tr class='evenrow'><td colspan=3>Intermediate Result Area:</td><td colspan='14'> <select name='subcomponent' id='subcomponent' style='width:500px;'><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $queryir = mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc") or die(mysql_error());
    while ($rowir = mysql_fetch_array($queryir)) {
        $data .= "<option value='" . $rowir['subcomponent_name'] . "'>" . $rowir['subcomponent_code'] . " " . substr($rowir['subcomponent'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='14'> <select name='output' id='output' style='width:500px;' ><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $queryout = mysql_query("select * from tbl_output order by output_code  asc") or die(mysql_error());
    while ($rowout = mysql_fetch_array($queryout)) {
        $data .= "<option value='" . $rowout['output_name'] . "'>" . $rowout['output_code'] . " " . substr($rowout['output_name'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='14'> <select name='indicator' id='indicator' style='width:500px;' ><option value=''>-All-</option>";


    $x = "select at.p_id,at.subcomponent_id,at.display,s.subcomponent,s.subcomponent_code,o.output_code,o.output_name,
at.output_id,at.year,at.indicator_id,i.indicator_name,at.baseyear,at.baselinevalue,at.pquarter1,
at.pquarter2,at.pquarter3,at.pquarter4,sum(at.ptotal) as TotalyearlyTarget,
sum(if((at.year='2011'),at.ptotal,'')) as year2011,
sum(if((at.year='2012'),at.ptotal,'')) as year2012,
sum(if((at.year='2013'),at.ptotal,'')) as year2013,
sum(if((at.year='2014'),at.ptotal,'')) as year2014,
sum(if((at.year='2015'),at.ptotal,'')) as year2015, round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))) 
as totalProjectLifeTargetTotal,

sum(if((at.year='2011'),r.total,'')) as year2011Actual,
sum(if((at.year='2012'),r.total,'')) as year2012Actual,
sum(if((at.year='2013'),r.total,'')) as year2013Actual,
sum(if((at.year='2014'),r.total,'')) as year2014Actual,
sum(if((at.year='2015'),r.total,'')) as year2015Actual,
round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,''))) as totalProjectLifeActualTotal,
round((round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,'')))/round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))))*100,2) as PercentageActualvsTargets
  from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_output o on(o.output_id=at.output_id) inner join tbl_subcomponent s on(s.id=at.subcomponent_id) inner join tbl_organizationreporting r on(r.indicator_id=at.indicator_id)  where at.year <> '0000' and i.display='Yes' and i.responsible <> 'Managers' and i.responsible like 'TSO%'  group by at.year,indicator_id  order by at.year,i.indicator_name asc";
    $query = mysql_query("select * from tbl_indicator where responsible like 'TSO%' and responsible <> 'Managers' order by indicator_id  asc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['indicator_name'] . "'>" . substr($row2['indicator_name'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_TSOquantitativeResults(getElementById('subcomponent').value,getElementById('output').value,  getElementById('indicator').value);return false;\" />
    </label></td></tr>

  <tr>
    <th colspan='18'><div align='center'><strong> TSO Quantitative Annual Results</strong></div></th>
  </tr>
  

";
    return $data;
}


function filter_TSOQuantitativeCumulativeResults()
{

    $_SESSION['wpsubcomponent'] = $resultsarea;
    $_SESSION['subintermediateResultArea'] = $subresultarea;
    $_SESSION['fyear'] = $year;
    $_SESSION['indicator_12'] = $indicator;
    $data = "
  <tr class='evenrow'>
    
    <td width='105' scope='col' colspan=17>
      <div align='right'>
        <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Cumulative Results Report&&resultarea=" . $_SESSION['wpsubcomponent'] . "&&output=" . $_SESSION['subintermediateResultArea'] . "&&indicator=" . $_SESSION['indicator_12'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' /></a>
      </div>
   </td></tr>
  
   <tr class='evenrow'><td colspan=3>Intermediate Result Area:</td><td colspan='13'> <select name='subcomponent' id='subcomponent' style='width:500px;'><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $queryir = mysql_query("select * from tbl_subcomponent order by subcomponent_code  asc") or die(mysql_error());
    while ($rowir = mysql_fetch_array($queryir)) {
        $data .= "<option value='" . $rowir['subcomponent_name'] . "'>" . $rowir['subcomponent_code'] . " " . substr($rowir['subcomponent'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='13'> <select name='output' id='output' style='width:500px;'><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $queryout = mysql_query("select * from tbl_output order by output_code  asc") or die(mysql_error());
    while ($rowout = mysql_fetch_array($queryout)) {
        $data .= "<option value='" . $rowout['output_name'] . "'>" . $rowout['output_code'] . " " . substr($rowout['output_name'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='13'> <select name='indicator' id='indicator' style='width:500px;' ><option value=''>-All-</option>";


    $x = "select at.p_id,at.subcomponent_id,at.display,s.subcomponent,s.subcomponent_code,o.output_code,o.output_name,
at.output_id,at.year,at.indicator_id,i.indicator_name,at.baseyear,at.baselinevalue,at.pquarter1,
at.pquarter2,at.pquarter3,at.pquarter4,sum(at.ptotal) as TotalyearlyTarget,
sum(if((at.year='2011'),at.ptotal,'')) as year2011,
sum(if((at.year='2012'),at.ptotal,'')) as year2012,
sum(if((at.year='2013'),at.ptotal,'')) as year2013,
sum(if((at.year='2014'),at.ptotal,'')) as year2014,
sum(if((at.year='2015'),at.ptotal,'')) as year2015, round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))) 
as totalProjectLifeTargetTotal,

sum(if((at.year='2011'),r.total,'')) as year2011Actual,
sum(if((at.year='2012'),r.total,'')) as year2012Actual,
sum(if((at.year='2013'),r.total,'')) as year2013Actual,
sum(if((at.year='2014'),r.total,'')) as year2014Actual,
sum(if((at.year='2015'),r.total,'')) as year2015Actual,
round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,''))) as totalProjectLifeActualTotal,
round((round(sum(if((at.year='2011'),r.total,''))+sum(if((at.year='2012'),r.total,''))+sum(if((at.year='2013'),r.total,''))+sum(if((at.year='2014'),r.total,''))+sum(if((at.year='2015'),r.total,'')))/round(sum(if((at.year='2011'),at.ptotal,''))+sum(if((at.year='2012'),at.ptotal,''))+sum(if((at.year='2013'),at.ptotal,''))+sum(if((at.year='2014'),at.ptotal,''))+sum(if((at.year='2015'),at.ptotal,''))))*100,2) as PercentageActualvsTargets
  from tbl_annualtarget at inner join tbl_indicator i on(i.indicator_id=at.indicator_id) inner join tbl_output o on(o.output_id=at.output_id) inner join tbl_subcomponent s on(s.id=at.subcomponent_id) inner join tbl_organizationreporting r on(r.indicator_id=at.indicator_id)  where at.year <> '0000' and i.display='Yes' and i.responsible <> 'Managers' and i.responsible like 'TSO%'  group by at.year,indicator_id  order by at.year,i.indicator_name asc";
    $query = mysql_query("select * from tbl_indicator where responsible like 'TSO%' and responsible <> 'Managers' order by indicator_id  asc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['indicator_name'] . "'>" . substr($row2['indicator_name'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_TSOquantitativeCumulativeResults(getElementById('subcomponent').value,getElementById('output').value,  getElementById('indicator').value);return false;\" />
    </label></td></tr>

  <tr>
    <th colspan='17'><div align='center'><strong> TSO Quantitative Cumulative Results</strong></div></th>
  </tr>
  

";
    return $data;
}


function filter_TSOquantitativeReporting()
{
    $data = "<tr class='evenrow'>
    <td width=''  colspan='3' scope='col' >Year:
      <select name='year' id='year'>";
    $yr = date(Y);
    $end = $yr;
    do {
        $data .= "<option value='$end'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>
    </label></td>
    <td width='' scope='col' colspan=2><div style='float:left;'>Reporting Period
      <select name='quarter' id='quarter'>";
    $query = mysql_query("select * from tbl_quarters order by quarterCode asc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['quarterName'] . "'>" . $row2['quarterName'] . "</option>";
    }
    $data .= "</select>
    </div></th>
    <td width='105' scope='col' colspan=3>
      <div align='right'>
       <a href='export_to_excel_word.php?linkvar=Export TSO Quantitative Reporting Data Entered&&output=" . $_SESSION['TSOsubresultarea'] . "&&indicator=" . $_SESSION['TSOindicator'] . "&&year=" . $_SESSION['TSOyear'] . "&&quarter=" . $_SESSION['TSOquarter'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
      </div>
   </td></tr>
   
   <tr class='evenrow'><td colspan=3><B>TSO</B></td><td colspan='8'><select name='orgname' size='1'  id='orgname'>";


    $query = mysql_query("select distinct(orgName) from tbl_organization where org_code='" . $_SESSION['org_code'] . "' group by orgName") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        #$selected1=$_SESSION['name']==$row['orgName']?"SELECTED":"";
        $data .= "<option value='" . $row['orgName'] . "' '" . $selected1 . "'>" . substr($row['orgName'], 0, 40) . "</option>
          ";
    }


    $data .= "
        </select></td></tr>
  
  <tr class='evenrow'><td colspan=3>Sub-Intermediate Result Area:</td><td colspan='4'> <select name='output' id='output'><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $queryout = mysql_query("select * from tbl_output order by output_code  asc") or die(mysql_error());
    while ($rowout = mysql_fetch_array($queryout)) {
        $data .= "<option value='" . $rowout['output_name'] . "'>" . $rowout['output_code'] . " " . substr($rowout['output_name'], 0, 70) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      
    </label></td></tr>
	<tr class='evenrow'><td colspan=3>Indicator:</td><td colspan='4'> <select name='indicator' id='indicator'><option value=''>-All-</option>";
    # r join tbl_indicator i on(r.indicator_id=i.indicator_id) inner join tbl_siractivity s on(i.siractivity_id=s.activity_id)  order by i.indicator_id
    $query = mysql_query("select * from tbl_indicator order by indicator_id  asc") or die(mysql_error());
    while ($row2 = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row2['indicator_name'] . "'>" . substr($row2['indicator_name'], 0, 100) . "</option>";
    }
    $data .= "</select></td> <td class=evenrow align=right><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_TSOquantitativeReporting(getElementById('output').value,getElementById('indicator').value,getElementById('quarter').value,getElementById('year').value,getElementById('orgname').value);\" />
    </label></td></tr>

  <tr>
    <th colspan='9'><div align='center'><strong> TSO Quantitative Reporting</strong></div></th>
  </tr>
  

";
    return $data;
}


function filter_TSOreporting()
{

    $data = " <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='7' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' class='formButton2'   id='button' name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment('','','','" . $_SESSION['orgName'] . "')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=" . $subcomponent . "&&org_code=" . $org_code . "&&orgname=" . $orgname . "&&year=" . $_SESSION['year106'] . "&&quarter=" . $quarter . "&&indicator=" . $_SESSION['indicator106'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
    $yr = date(Y);
    $end = $yr;
    do {
        $sel = ($_SESSION['year106'] == $end) ? "SELECTED" : "";
        $data .= "<option value='" . $end . "' '" . $sel . "'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "
      </select>
    </label></td>
   
    <td class=evenrow colspan='5'><select name='quarter' id='quarter'>
      <option value=''>-ALL-</option>";
    $query = mysql_query("select * from tbl_quarters order by quarterCode asc ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['quarter'] == $row['quarterName'] ? "SELECTED" : "";
        $data .= "<option value='" . $row['quarterName'] . "' '" . $selected . "'>" . $row['quarterName'] . "</option>";
    }
    $data .= "</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";

    $query = mysql_query("select * from tbl_organizationreporting r join tbl_indicator i on(i.indicator_id=r.indicator_id) where i.subcomponent_id='" . $_SESSION['usersubcomponent'] . "' group by i.indicator_name order by i.indicator_id asc ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['indicator106'] == $row['indicator_name'] ? "SELECTED" : "";
        $data .= "<option value='" . $row['indicator_name'] . "'  '" . $selected . "' >" . substr($row['indicator_name'], 0, 50) . "</option>";
    }

    $data .= "</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_valueChainDevelopment('" . $_SESSION['managerorg_code'] . "','" . $_SESSION['orgName'] . "',getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='13'><div align='center'><strong>" . $_SESSION['titlesubcomponent'] . " (" . $_SESSION['orgName'] . ")</strong></div></th>
  </tr>

";
    return $data;
}


function filter_vcdgrid_Manager()
{

    $data = " <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Reporting Period </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'><input type='button' class='formButton2'   id='button' name='Submit' value='New Entry' onclick=\"xajax_new_valueChainDevelopment_Manager('','','','')\" /></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=" . $subcomponent . "&&org_code=" . $org_code . "&&orgname=" . $orgname . "&&year=" . $_SESSION['year106'] . "&&quarter=" . $quarter . "&&indicator=" . $_SESSION['indicator106'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
    $yr = date(Y);
    $end = $yr;
    do {
        $sel = ($_SESSION['year106'] == $end) ? "SELECTED" : "";
        $data .= "<option value='" . $end . "' '" . $sel . "'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='quarter' id='quarter'>
      <option value=''>-ALL-</option>";
    $query = mysql_query("select * from tbl_quarters order by quarterCode asc ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['quarter'] == $row['quarterName'] ? "SELECTED" : "";
        $data .= "<option value='" . $row['quarterName'] . "' '" . $selected . "'>" . $row['quarterName'] . "</option>";
    }
    $data .= "</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";

    $query = mysql_query("select * from view_organizationreporting where subcomponent_id='" . $_SESSION['usersubcomponent'] . "' group by indicator_name order by indicator_id asc ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['indicator106'] == $row['indicator_name'] ? "SELECTED" : "";
        $data .= "<option value='" . $row['indicator_name'] . "'  '" . $selected . "' >" . substr($row['indicator_name'], 0, 50) . "</option>";
    }

    $data .= "</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_valueChainDevelopment_Manager('" . $_SESSION['managerorg_code'] . "','" . $_SESSION['orgName'] . "',getElementById('year').value,getElementById('quarter').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>" . $_SESSION['titlesubcomponent'] . " (" . $_SESSION['orgName'] . ")</strong></div></th>
  </tr>

";
    return $data;
}


function filter_vcdgrid_actuals()
{

    $data = " <tr class='evenrow'>
    <td width='' scope='col' colspan='2'>Year</td>
    <td scope='col' colspan='2'><div align='left'  >Sub-Activity </div>      <label> </label></td>
    <td width='=' scope='col' colspan='4' ><div align='left'>Indicator</div>      <label></label></td><td width='100'></td><td width='74'><a href='export_to_excel_word.php?linkvar=Export Results Indicators&&subcomponent=" . $subcomponent . "&&org_code=" . $org_code . "&&orgname=" . $orgname . "&&year=" . $_SESSION['year106'] . "&&quarter=" . $quarter . "&&indicator=" . $_SESSION['indicator106'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a></td>
  </tr>
  
  <tr>
    <td class='evenrow' colspan='2' ><label>
      <select name='year' id='year'><option value=''>-ALL-</option>
        ";
    $yr = date(Y);
    $end = $yr;
    do {
        $sel = ($_SESSION['year106'] == $end) ? "SELECTED" : "";
        $data .= "<option value='" . $end . "' '" . $sel . "'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "
      </select>
    </label></td>
   
    <td class=evenrow colspan='2'><select name='subactivity' id='subactivity'>
      <option value=''>-ALL-</option>";
    $sel = mysql_query("select i.indicator_id,i.indicator_name,s.subact_id,s.subactivity_code,s.subactivity_name from tbl_indicator i  inner join tbl_organizationreporting r on(i.indicator_id=r.indicator_id) inner join tbl_subactivity s on(i.subactivity_id=s.subact_id) where subactivity_name <> '' group by s.subact_id order by subactivity_code") or die("Sunrise Error-code 1037 because " . mysql_error());
    while ($row1 = mysql_fetch_array($sel)) {
        $s = ($_SESSION['Resultsubactivity1'] == $row1['subactivity_name']) ? "SELECTED" : "";
        $data .= "<option value='" . $row1['subactivity_name'] . "' '" . $s . "'>" . $row1['subactivity_code'] . " " . substr($row1['subactivity_name'], 0, 50) . "</option>";


    }


    $data .= "</select></td><td CLASS='evenrow' colspan='4'><select name='indicator' id='indicator'><option value=''>-ALL-</option>";

    $query = mysql_query("select * from view_organizationreporting where subcomponent_id='" . $_SESSION['usersubcomponent'] . "' group by indicator_name order by indicator_id asc ") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['indicator106'] == $row['indicator_name'] ? "SELECTED" : "";
        $data .= "<option value='" . $row['indicator_name'] . "'  '" . $selected . "' >" . substr($row['indicator_name'], 0, 50) . "</option>";
    }

    $data .= "</select>
    </td>
    <td class=evenrow><label>
      <input type='button' class='formButton2'   id='button' name='search' value='Go' onclick=\"xajax_view_valueChainDevelopmentAnnualTargetvsActuals(getElementById('year').value,getElementById('subactivity').value,getElementById('indicator').value)\" />
    </label></td>
    <td class=evenrow></td>
  </tr>
  <tr>
    <th colspan='10'><div align='center'><strong>" . $_SESSION['titlesubcomponent'] . " (" . $_SESSION['orgName'] . ")</strong></div></th>
  </tr>

";
    return $data;
}


function filter_annualTarget()
{
    $data = "<table cellspacing='0'      width='660'>
<tr>
              <td colspan='3' align=left><table cellspacing='0'      width='660' border=0>
  <tr>
    <td scope='col' class=green_field><div align='left' >Planning &raquo; View Physical Annual Targets </div></td>
    <td width='186' scope='col'><label>
      <div align='right'>
        <input type='button' class='formButton2'   id='button' name='Submit2' value='Export to Excel ' />
        <input type='button' class='formButton2'   id='button' name='Submit' value='New Entry' onclick=\"xajax_new_annualTarget('" . $activity . "','','')\"/>
        </div>
    </label></td>
  </tr>
</table>
</td></tr>
		 <tr class='evenrow2'>
  <tr>
              <td colspan='3' align=left><hr align=left width=''/></td></tr>
			 
		 <tr class='evenrow2'>
              <td colspan=''>Intermediate Result Area:
                <label></label></td>
              <td colspan='2'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_annualTarget(getElementById('subcomponent').value)\">";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $data .= "<option value='" . $_SESSION['wpsubcomponent_id'] . "'>" . $_SESSION['wpsubcomponent_code'] . " " . $_SESSION['wpsubcomponent'] . "</option>";

    else
        $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['id'] . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
<tr class=evenrow>
              <td colspan=''>Sub-Intermediate Result Area:
                <label></label></td>
              <td colspan='2'><select name='output' ><option value=''>-All-</option>";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $query = mysql_query("select * from tbl_output where subcomp_id='" . $_SESSION['wpsubcomponent_id'] . "' order by output_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        //$selected=($_SESSION['ou'])
        $data .= "<option value='" . $row['output_id'] . "'>" . $row['output_code'] . " " . $row['output_name'] . "</option>";
    }

    $data .= "
              </select></td>
</tr>
            <tr class=evenrow2>
              <td colspan=''>Activity: </td>
              <td colspan='2'><select name='activity' id='activity'><option value=''>-All-</option>";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $query = mysql_query("select * from tbl_activity where subcomp_id='" . $_SESSION['wpsubcomponent_id'] . "' order by activity_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['activity_id'] . "'>" . $row['activity_code'] . " " . $row['activity_name'] . "</option>";

    }

    $data .= "</select></td>
            </tr>";


    $data .= "<tr class=evenrow>
              <td colspan=''>Financial Year:</td>
              <td colspan=''>
                 <select name='year' id='year'>";
    $yr = date(Y);
    $end = $yr;
    do {
        $data .= "<option value='$end'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>
              </select></td><td><input name='' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_annualTarget(getElementById('').value,getElementById('').value,getElementById('activity').value,getElementById('year').value)\" /></td>
            </tr></table>
";

    return $data;
}


function filter_annualWorkplan()
{
    $data .= "

		 <tr class='evenrow' >
              <td colspan='3'>Intermediate Result Area:
                <label></label></td>
              <td colspan='2'><select name='subcomponent' id='subcomponent' onchange=\"xajax_reload_annualTarget(getElementById('subcomponent').value)\">";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $data .= "<option value='" . $_SESSION['wpsubcomponent_id'] . "'>" . $_SESSION['wpsubcomponent_code'] . " " . $_SESSION['wpsubcomponent'] . "</option>";

    else
        $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(1791));
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['id'] . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>
<tr class=evenrow>
              <td colspan='3'>Sub-Intermediate Result Area:
                <label></label></td>
              <td colspan='2'><select name='output' ><option value=''>-All-</option>";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $query = mysql_query("select * from tbl_output where subcomp_id='" . $_SESSION['wpsubcomponent_id'] . "' order by output_code asc") or die(http(1803));
    while ($row = mysql_fetch_array($query)) {
        //$selected=($_SESSION['ou'])
        $data .= "<option value='" . $row['output_id'] . "'>" . $row['output_code'] . " " . $row['output_name'] . "</option>";
    }

    $data .= "
              </select></td>
</tr>
            <tr class=evenrow2>
              <td colspan='3'>Activity: </td>
              <td colspan='2'><select name='activity' id='activity'><option value=''>-All-</option>";
    if ($_SESSION['wpsubcomponent_id'] != '')
        $query = mysql_query("select * from tbl_activity where subcomp_id='" . $_SESSION['wpsubcomponent_id'] . "' order by activity_code asc") or die(http(1817));
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['activity_id'] . "'>" . $row['activity_code'] . " " . $row['activity_name'] . "</option>";

    }

    $data .= "</select></td>
            </tr>";


    $data .= "<tr class=evenrow>
              <td colspan='3'>Financial Year:</td>
              <td colspan=''>
                 <select name='year' id='year'>";
    $yr = date(Y);
    $end = $yr;
    do {
        $data .= "<option value='$end'>" . $end . "</option>";
        $end--;
    } while ($end >= 2010);
    $data .= "</select>
              </select></td><td><input name='' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_annualTarget(getElementById('').value,getElementById('').value,getElementById('activity').value,getElementById('year').value)\" /></td>
            </tr>
";

    return $data;
}


function filter_LOPTarget()
{
    $classCode = 5;
    /* $_SESSION['indicator_type']=$indicator_type;
    $_SESSION['indicator']=$indicator;
    $_SESSION['subcomponent_id']=$subcomponent;
    $_SESSION['output']=$output; */
    $data .= "
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=10><label>
      <div style='float:right;'>
	   <input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_edit_LOPTarget(xajax.getFormValues('annualTarget1'));return false;\" /> |
       <a href='export_to_excel_word.php?linkvar=Export LOP Targets&&type_of_indicator=" . $_SESSION['indicator_Type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print LOP Targets&&type_of_indicator=" . $_SESSION['indicator_Type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&format=print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	";
    $data .= "
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='12'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewLOPTargets(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";

    $query = mysql_query("select * from tbl_lookup where classCode='" . $classCode . "'  group by codeName order by codeName asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $select = ($_SESSION['indicator_Type'] == $row['codeName']) ? "SELECTED" : "";

        $data .= "<option value=\"" . $row['codeName'] . "\" " . $select . ">" . $row['codeName'] . " </option>
        ";
    }


    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='12'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_ViewLOPTargets('" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
//ViewAnnualTargets($indicator_type,$subcomponent,$output,$indicator,$year)
        $selected = ($_SESSION['subcomponent_id'] == $row['subcomponent_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='7'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewLOPTargets('" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_output where subprog_id like '" . $_SESSION['subcomponent_id'] . "%' order by output_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['output'] == $row['output_id']) ? "SELECTED" : "";
//checkExistance($row['output_id'],$_SESSION['output'],'selected')
        $data .= "<option value=\"" . $row['output_id'] . "\"  " . $sel . ">" . $row['output_code'] . " " . $row['output_name'] . "</option>";

    }
    $data .= "</select></td><td colspan='4'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewLOPTargets(getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,'','',1,20);return false;\" /></td>
        </tr>";

    $data .= "<tr class='display_none'>
              <td colspan=2>Year:</td><td colspan='7' >
			  <select name='fyear' id='fyear' class='combobox' ><option value=''>-All-</option>";

    $yr = date('Y');
    $end = $yr;
    do {
        $selyr = ($_SESSION['fyear'] == $end) ? "SELECTED" : "";
        $data .= "<option value=\"" . $end . "\" " . $selyr . " >" . $end . "</option>
      ";
        $end--;
    } while ($end >= 2010);
    $data .= "</select></td> 
		
            </tr>
";

    return $data;
}


function filter_annualTargetReport()
{
    $classCode = 5;
    $data .= "
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=8><label>
      <div style='float:right;'>
	 
       <a href='export_to_excel_word.php?linkvar=Export Annual Workplan&&type_of_indicator=" . $_SESSION['indicator_type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&year=" . $_SESSION['fyear'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print Annual Workplan&&type_of_indicator=" . $_SESSION['indicator_type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&year=" . $_SESSION['fyear'] . "' target='_blank'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";
    $data .= "
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='9'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewAnnualTargets(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";

    $query = mysql_query("select * from tbl_lookup where classCode='" . $classCode . "'  group by codeName order by codeName asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['indicator_type'] == $row['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>
        ";
    }


    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='2'>Outcome:</td>
              <td colspan='9'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_ViewAnnualTargets('" . $_SESSION['indicator_Type'] . "',this.value,'" . $_SESSION['output_id'] . "','','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
//ViewAnnualTargets($indicator_type,$subcomponent,$output,$indicator,$year)
        $selected = ($_SESSION['subcomponent_id'] == $row['subcomponent_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='9'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewAnnualTargets('" . $_SESSION['indicator_Type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_output where subprog_id like '" . $_SESSION['subcomponent_id'] . "%' order by output_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['output'] == $row['output_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['output_id'] . "\" " . $selected . ">" . $row['output_code'] . " " . $row['output_name'] . "</option>";

    }
    $data .= "</select></td>
        </tr>";

    $data .= "<tr class=evenrow>
              <td colspan=2>Year:</td><td colspan='7' >
			  <select name='fyear' id='fyear' class='combobox' ><option value=''>-All-</option>";

    $yr = date('Y');
    $end = $yr;
    do {
        $selyr = ($_SESSION['fyear'] == $end) ? "SELECTED" : "";
        $data .= "<option value=\"" . $end . "\" " . $selyr . " >" . $end . "</option>
      ";
        $end--;
    } while ($end >= 2010);
    $data .= "</select></td> 
		<td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewAnnualTargets(getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,'',getElementById('fyear').value,1,20);return false;\" /></td>
            </tr>
";

    return $data;
}


function filter_CARPPMPIndicatorTracker()
{
    $classCode = 5;
    $data .= "
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='4'></td>
    <td width='' scope='col' colspan=10><label>
      <div style='float:right;'>
	 
       <a href='export_to_excel_word.php?linkvar=Export CARP PMP Indicator Tracker&&type_of_indicator=" . $_SESSION['indicator_type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&year=" . $_SESSION['fyear'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a href='print_version2.php?linkvar=Print CARP PMP Indicator Tracker&&type_of_indicator=" . $_SESSION['indicator_type'] . "&outcome=" . $_SESSION['subcomponent_id'] . "&&output=" . $_SESSION['output'] . "&&year=" . $_SESSION['fyear'] . "' target='_blank'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>
    </label></td>
  </tr>
</tr>
	";
    $data .= "
 <tr class='evenrow'>
              <td colspan='4'>Indicator Type:
                <label></label></td>
              <td colspan='10'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_view_CARPPMPIndicatorTracker(this.value,'" . $_SESSION['subcomponent_id'] . "','" . $_SESSION['output_id'] . "','','');return false;\">
			  <option value='' >-All-</option>";

    $query = mysql_query("select * from tbl_lookup where classCode='" . $classCode . "'  group by codeName order by codeName asc ") or die(http("FLTR-198"));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['indicator_type'] == $row['codeName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected . ">" . $row['codeName'] . " </option>
        ";
    }


    $data .= "</select></td>
            </tr>";

    $data .= "<tr class='evenrow'>
              <td colspan='4'>Outcome:</td>
              <td colspan='10'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_view_CARPPMPIndicatorTracker('" . $_SESSION['indicator_type'] . "',this.value,'" . $_SESSION['output_id'] . "','','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
//ViewAnnualTargets($indicator_type,$subcomponent,$output,$indicator,$year)
        $selected = ($_SESSION['subcomponent_id'] == $row['subcomponent_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcomponent_id'] . "\" " . $selected . ">" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";

    }
    $data .= "</select></td>
        </tr>";
    $data .= "<tr class='evenrow'>
              <td colspan='4'>Output:</td>
              <td colspan='10'><select name='output' class='combobox'  id='output' onChange=\"xajax_view_CARPPMPIndicatorTracker('" . $_SESSION['indicator_type'] . "','" . $_SESSION['subcomponent_id'] . "',this.value,'','');return false;\">";
    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_output where subprog_id like '" . $_SESSION['subcomponent_id'] . "%' order by output_code asc") or die(http(724));
    while ($row = mysql_fetch_array($query)) {
        $selected = ($_SESSION['output'] == $row['output_id']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['output_id'] . "\" " . $selected . ">" . $row['output_code'] . " " . $row['output_name'] . "</option>";

    }
    $data .= "</select></td>
        </tr>";

    $data .= "<tr class=evenrow>
              <td colspan=4>Year:</td><td colspan='8' >
			  <select name='fyear' id='fyear' class='combobox' ><option value=''>-All-</option>";

    $yr = date('Y');
    $end = $yr;
    do {
        $selyr = ($_SESSION['fyear'] == $end) ? "SELECTED" : "";
        $data .= "<option value=\"" . $end . "\" " . $selyr . " >" . $end . "</option>
      ";
        $end--;
    } while ($end >= 2010);
    $data .= "</select></td> 
		<td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_view_CARPPMPIndicatorTracker(getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,'',getElementById('fyear').value,1,20);return false;\" /></td>
            </tr>
";

    return $data;
}


#***************************filter_district()***********************
function filter_district()
{
    $data = "
  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong>
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select DISTINCT(districtname) from tbl_district group by districtName order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $seld = ($row['districtname'] == $_SESSION['districtName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['districtname'] . "\" " . $seld . " >" . $row['districtname'] . "</option>
          ";
    }
    $data .= "
      </select></td><td><strong>Zone:</strong></td><td><select name='zone' size='1' id='zone'><option value=''>-All-</option>";
    $selzone = mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC") or die(http(2427));
    while ($rowzone = mysql_fetch_array($selzone)) {
        $sel = ($rowzone['zoneName'] == $_SESSION['zone']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $rowzone['zoneName'] . "\" " . $sel . ">" . $rowzone['zoneName'] . "</option>";
    }
    $data .= "</select></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onClick=\"xajax_view_district(getElementById('district').value,getElementById('zone').value,'District',1,20);\" /></td><td width='84' scope='col'><input type='button' class='formButton2'   id='button' id='search' name='' value='New District' onclick=\"xajax_new_district('new_district','','')\"  />

</td><td scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export District&&&&district=" . $_SESSION['district'] . "&&zone=" . $_GET['zone'] . "&&format=excel'><input type='button' class='formButton2'   id='button' id='export' name='export' value='Export to Excel' /></a></td>
  </tr>
 
";
    return $data;


}


function filter_staffMembers()
{
    $data = "
  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>Name:</strong>
      <select name='name' id='name' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select name from tbl_staffmembers group by name order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['name'] . "'>" . $row['name'] . "</option>
          ";
    }
    $data .= "
      </select></td><td><strong>Role:</strong></td><td><select name='role' size='1' id='role'><option value=''>-All-</option>";
    $selzone = mysql_query("select * FROM tbl_lookup where classcode='11' ORDER BY code ASC") or die(http(2427));
    while ($rowzone = mysql_fetch_array($selzone)) {
        $data .= "<option value='" . $rowzone['codeName'] . "'>" . $rowzone['codeName'] . "</option>";
    }
    $data .= "</select></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onClick=\"xajax_view_staffMembers(getElementById('name').value,getElementById('role').value);\" /></td><td width='84' scope='col'>
<input type='button' class='formButton2'   id='button' id='search' value='New Entry' onclick=\"xajax_add_staff()\"  />
</td><td scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export staff&&district=" . $_SESSION['district'] . "&&format=excel'><input type='button' class='formButton2'   id='button' id='export' name='export' value='Export to Excel' /></a></td>
  </tr>
 
";
    return $data;


}


function filter_municipality()
{
    $data = "
  <tr class='evenrow'>
    <td scope='col'  colspan='3'><strong>District:</strong></td><td colspan=2><strong>Municipality</strong></td><td colspan='3'><strong>Zone:</strong></td><td width='84' scope='col'>
<input type='button' class='formButton2'   id='button' id='search' value='New Municipality' onclick=\"xajax_add_municipality('',1,20)\"  />
</td><td scope='col' colspan=''><a href='export_to_excel_word.php?linkvar=Export Municipality&&district=" . $_SESSION['district'] . "&&format=excel'><input type='button' class='formButton2'   id='button' id='export' name='export' value='Export to Excel' /></a></td></tr>
	
	
	
	<tr class='evenrow'><td colspan='3'>
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select DISTINCT(districtname) from tbl_district group by districtName order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "
          <option value='" . $row['districtname'] . "'>" . $row['districtname'] . "</option>
          ";
    }
    $data .= "
      </select></td>
	  <td colspan='2'>
      <select name='municipality' id='municipality' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select DISTINCT(municipalityName) from tbl_municipality group by municipal_id order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $data .= "
          <option value='" . $row['municipalityName'] . "'>" . $row['municipalityName'] . "</option>
          ";
    }
    $data .= "
      </select></td><td colspan=3><select name='zone' size='1' id='zone'><option value=''>-All-</option>";
    $selzone = mysql_query("select * FROM tbl_zone ORDER BY zoneCode ASC") or die(http(2427));
    while ($rowzone = mysql_fetch_array($selzone)) {
        $data .= "<option value='" . $rowzone['zoneName'] . "'>" . $rowzone['zoneName'] . "</option>";
    }
    $data .= "</select></td><td colspan=2><input name='search' type='button' class='formButton2'   id='button' value='Go' onClick=\"xajax_view_municipality(getElementById('district').value,getElementById('municipality').value,getElementById('zone').value,1,20);\" /></td>
  </tr>
 
";
    return $data;


}


#***************************filter_subcounty()***********************
function filter_subcounty()
{
    $data = "
  <tr class='evenrow'>
    <td scope='col'  colspan='2'>District:
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select DISTINCT(districtname) from tbl_district order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $seldistrict = ($_SESSION['district'] == $row['districtname']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['districtname'] . "\" " . $seldistrict . ">" . $row['districtname'] . "</option>";
    }
    $data .= "
      </select>    </td>
    
    <td width='84' scope='col' colspan='2' ><DIV  style='float:right;'>
      <input type='button' class='formButton2'   id='button' id='search' value='New Subcounty' onclick=\"xajax_new_district('new_subcounty','','')\"  />
   | <a href='export_to_excel_word.php?linkvar=Export Subcounty&&district=" . $_SESSION['district'] . "&&subcounty=" . $_SESSION['subcounty'] . "&&zone=" . $_GET['zone'] . "&&format=excel'><input type='button' class='formButton2'   id='button' id='export' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  
 <tr class='evenrow'>
    <td scope='col'  colspan='2'>Subcounty:
      <select name='subcounty' id='subcounty' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select subcountyName from tbl_subcounty group by subcountyName order by subcountyName ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selsubcounty = ($_SESSION['subcounty'] == $row['subcountyName']) ? "SELECTED" : "";
        $data .= "<option value='\"" . $row['subcountyName'] . "\" " . $selsubcounty . ">" . $row['subcountyName'] . "</option>
          ";

    }
    $data .= "
      </select>    </td>
 
    <td scope='col'  colspan=''>Zone:
      <select name='zone' id='zone' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select zoneName from tbl_zone group by zoneName order by zoneName ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selzone = ($_SESSION['zone'] == $row['zoneName']) ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['zoneName'] . "\" " . $selzone . ">" . $row['zoneName'] . "</option>";
    }
    $data .= "</select>    </td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_subcounty(getElementById('district').value,getElementById('subcounty').value,getElementById('zone').value)\" /></td>
    </tr>
 
";
    return $data;
}

function filter_parish()
{
    $data = "
  <tr class='evenrow'>
    
    
    <td width='84' scope='col' colspan='4' ><DIV  style='float:right;'>
      <input type='button' class='formButton2'   id='button' id='search' value='New Parish' onclick=\"xajax_new_district('new_parish','','');return false;\"  />
   | <a href='export_to_excel_word.php?linkvar=Export Parish&&district=" . $_SESSION['district'] . "&&subcounty=" . $_SESSION['subcounty'] . "&&parish=" . $_SESSION['parish'] . "&&zone=" . $_GET['zone'] . "&&format=excel'><input type='button' class='formButton2'   id='button' id='export' name='export' value='Export to Excel' /></a></div></td>
  </tr>
  
  <tr class='evenrow'><td scope='col'  colspan='2'>District:
      <select name='district' id='district' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select DISTINCT(districtname) from tbl_district order by 1 ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $seldistrict = ($_SESSION['district'] == $row['districtname']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['districtname'] . "\" " . $seldistrict . ">" . $row['districtname'] . "</option>";
    }
    $data .= "
      </select>    </td><td scope='col'  colspan='2'>Zone:
      <select name='zone' id='zone' ><option value=''>-All-</option>";
    $query = mysql_query("select zoneName from tbl_zone group by zoneName order by zoneName ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selzone = ($_SESSION['zone'] == $row['zoneName']) ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['zoneName'] . "\" " . $selzone . ">" . $row['zoneName'] . "</option>";
    }
    $data .= "</select>    </td></tr>
 <tr class='evenrow'>
    <td scope='col'  colspan='2'>Subcounty:
      <select name='subcounty' id='subcounty' style='width:200px;' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select * from tbl_subcounty group by subcountyName order by subcountyName ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selsubcounty = ($_SESSION['subcounty'] == $row['subcountyName']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['subcountyName'] . "\" " . $selsubcounty . ">" . $row['subcountyName'] . "</option>
          ";
    }
    $data .= "
      </select>    </td>
	  <td scope='col'  colspan=''>Parish:
      <select name='parish' id='parish' style='width:200px;' >
          <option value=''>-All-</option>
          ";
    $query = mysql_query("select * from tbl_parish group by ParishName order by ParishName ASC") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $selparish = ($_SESSION['parish'] == $row['ParishName']) ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['ParishName'] . "\" " . $selparish . ">" . $row['ParishName'] . "</option>
          ";
    }
    $data .= "
      </select>    </td>
 
    <td><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_view_parish(getElementById('district').value,getElementById('zone').value,getElementById('subcounty').value,getElementById('parish').value)\" /></td>
    </tr>
 
";
    return $data;
}


function filter_comments()
{
    $data = "<tr>

    <th width='' scope='col' colspan=2><div align='left'>User:
      <select name='user' id='user' onchange=\"xajax_view_comments(getElementById('user').value);return false;\">";
    if ($_SESSION['username1'] != '') $data .= "<option value='" . $_SESSION['username1'] . "'>" . $_SESSION['username1'] . "</option>";
    else
        $data .= "<option value=''>-All-</option>";
    $query1 = mysql_query("select u.user_id,c.user_id,u.username from tbl_comment c inner join tbl_user u on(u.user_id=c.user_id) order by u.username asc") or die("Sunrise error-code 1962 because, " . mysql_error());
    while ($row1 = mysql_fetch_assoc($query1)) {
        $data .= "<option value='" . $row1['username'] . "' >" . $row1['username'] . "</option>";

    }
    $data .= "</select>
    </div>
   
  </th>
    <th width='100' scope='col'><a href='export_to_excel_word.php?linkvar=Export User Comments&&user=" . $_SESSION['username1'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' /></a></th>
    <th width='100' scope='col'>
   
   <a href='new_comment.php' title='New comment'><input type='submit' name='button' id='button' value='New Comment'  /></a> </th>
  </tr>";
    return $data;

}


function filter_organizationReport()
{
    /*<input type='button' class='formButton2'   id='button' name='newentry' value='New Entry' onclick=\"xajax_new_organization('','','','','','');return false;\">";
            $data.=" | */
    $tot = @mysql_fetch_array(mysql_query("select count(orgName) as num_org from tbl_organization o join tbl_country c on(c.countryCode=o.country_id) where lower(orgName) like '" . strtolower($_SESSION['orgname1']) . "%' && lower(c.countryName) like '" . strtolower($_SESSION['countryName']) . "%' and o.display like 'Yes%'")) or die(http("SP-2682"));
    $data .= "<tr class='evenrow'>
        <td class='' colspan='5'><b class='greenlinks'>TOTAL OF : " . $tot['num_org'] . " ORGANIZATIONS</b></td><td class='' colspan='7' align='right' width='70'>";

    $data .= "<a href='export_to_excel_word.php?linkvar=Export Organization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['parishName'] . "&&format=excel'><input name='export' type='button' class='formButton2'   id='button' value='Export to Excel' /></a> | <a href='print_version2.php?linkvar=Print Organization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['parishName'] . "&&format=Print' target='_blank'><input name='export' type='button' class='formButton2'   id='button' value='Print Version' /></a></td>
        </tr>

<tr class='evenrow'>
        <td width='' colspan='2' class='evenrow'><strong>Organisation</strong></td>
		<td width='' class='evenrow' colspan='2' ><select name='orgname1' id='orgname1'  size='1' onChange=\"xajax_view_organization(this.value,'" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\" class=''  style='width:200px;'>
          <option value=''>-All-</option>
          ";

    $query = mysql_query("select distinct(orgName) from tbl_organization where orgName <> '' group by orgName") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        $selected1 = $_SESSION['orgname1'] == $row['orgName'] ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['orgName'] . "\" " . $selected1 . ">" . substr($row['orgName'], 0, 30) . "</option>
          ";
    }

    $data .= "
        </select></td>
		<td width='' colspan='2' class='evenrow'><strong>District:</strong></td><td width='' colspan='6' class='evenrow'><select name='district' size='1' onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "',this.value,'" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\" id='district' style='width:200px;'>
          <option value=''>-All-</option>
		  " . funct_dropDownSelected('tbl_district', 'districtName', 'districtCode', 'districtName', $_SESSION['districtName']) . "</select></td>
    </tr>
		 <tr class='evenrow'>
        <td class='evenrow3' colspan='2'><b>Organization Type:</b></td>
		 <td  colspan='2' class='evenrow3'><label>
		 <select name='orgtype' size='1' class='' id='orgtype' style='width:200px;'  onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "',this.value,'" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\">
           <option value=''>-All-</option>
		   ";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select distinct(codeName) from tbl_lookup  where classCode='1' order by codeName ASC") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {

        $selected2 = $_SESSION['orgtype1'] == $row['codeName'] ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected2 . ">" . $row['codeName'] . "</option>";
    }

    $data .= "
	     </select>
		 </label></td>
		 <td width='' colspan='2' class='evenrow'><strong>Subcounty:</strong></td>
		 <td width='' colspan='6' class='evenrow'>
		 <select name='subcounty' size='1' class='' id='subcounty'  onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "',this.value,'" . $_SESSION['ParishName'] . "',1,20);return false;\"  style='width:200px;'>
          <option value=''>-All-</option>";
    $sql = "select * from tbl_subcounty where districtCode like '" . $_SESSION['districtName'] . "%' order by subcountyName asc";
    $query = @mysql_query($sql) or die(http("FLT-2621"));
    while ($row = @mysql_fetch_array($query)) {
        $sel = ($row['subcountyCode'] == $_SESSION['subcountyCode']) ? "selected" : "";
        $data .= "<option value=\"" . $row['subcountyCode'] . "\" " . $sel . ">" . $row['subcountyName'] . "</option>";
    }
    $data .= "</select></td>
		 </tr>
		 <tr>
		 <td class='evenrow3' colspan='2' align='left'><strong>Country:</strong></td>
		 <td width='' colspan='2' class='evenrow' align='right'><select name='zone' size='1' class='' id='zone' onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyCode'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\"style='width:200px;'>
           <option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_country  where memberstatus  like 'Yes%' group by countryName order by countryName asc") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['countryName'] == $row['countryCode'] ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['countryCode'] . "\" " . $selected . ">" . $row['countryName'] . "</option>";
    }

    $data .= "</select></td>
	<td width='' colspan='2' class='evenrow'>
	<strong>Parish:</strong></td>
	<td width='' colspan='5' class='evenrow'>
	<select name='parish' size='1' class='' id='parish' style='width:200px;'>
          <option value=''>-All-</option>" . funct_dropDownSelected('tbl_parish', 'ParishName', 'ParishCode', 'ParishName', $_SESSION['ParishName'], 'subcountyCode', $_SESSION['subcountyName']) . " 
		  </select></td>
		<td class='evenrow'><input name='search' type='button' class='formButton2'   id='button' value='Go' 
		 onclick=\"xajax_view_organization(getElementById('orgname1').value,getElementById('orgtype').value,getElementById('zone').value);\" /></td></tr>
";
    return $data;

}


//view_ParticipatingfarmersbyproducerOrganization($orgname,$orgtype,$farmerName,$district,$subcounty,$parish,$leadfarmer,$cur_page=1,$records_per_page=20)
function filter_ParticipatingfarmersbyproducerOrganization()
{
    $tot = mysql_fetch_array(mysql_query("select count(FarmerName) as num_org from tbl_farmerproductionrecords ")) or die(http("SP-2682"));
    $data .= "<tr class='evenrow'>
        <td class='' colspan='9'><b class='greenlinks'>TOTAL OF : " . $tot['num_org'] . " Producer Farmers</b></td><td colspan='3' align='right'>
       <a href='export_to_excel_word.php?linkvar=Export ParticipatingfarmersbyproducerOrganization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['ParishName'] . "&&leadfarmer=" . $_SESSION['leadfarmer'] . "&&gender=" . $_SESSION['gender'] . "&&farmerName=" . $_SESSION['farmerName'] . "&&format=excel'><input name='export' type='button' class='formButton2'   id='button' value='Export to Excel' /></a> | <a href='print_version2.php?linkvar=Print ParticipatingfarmersbyproducerOrganization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['ParishName'] . "&&leadfarmer=" . $_SESSION['leadfarmer'] . "&&gender=" . $_SESSION['gender'] . "&&farmerName=" . $_SESSION['farmerName'] . "&&format=Print' target='_blank'><input name='export' type='button' class='formButton2'   id='button' value='Print Version' /></a></td>
        </tr>


<tr class='evenrow'>
        <td width='' colspan='2' class='evenrow'><strong>Organization</strong></td>
		<td width='' class='evenrow' colspan='2' ><select name='orgname1' id='orgname1'  size='1' onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization(this.value,'" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);return false;\" class=''  style='width:200px;'>
          <option value=''>-All-</option>
          ";

    $query = mysql_query("select * from tbl_organization where orgName <> '' group by orgName") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        $selected1 = $_SESSION['orgname1'] == $row['org_code'] ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['org_code'] . "\" " . $selected1 . ">" . substr($row['orgName'], 0, 30) . "</option>
          ";
    }

    $data .= "
        </select></td>
		<td width='' colspan='2' class='evenrow'><strong>District:</strong></td><td width='' colspan='6' class='evenrow'><select name='district' size='1' onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "',this.value,'" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);\" id='district' style='width:200px;'>
          <option value=''>-All-</option>
		  " . funct_dropDownSelected('tbl_district', 'districtName', 'districtCode', 'districtName', $_SESSION['districtName']) . "</select></td>
    </tr>
		 <tr class='evenrow'>
        <td class='evenrow3' colspan='2'><b>Organization Type:</b></td>
		 <td  colspan='2' class='evenrow3'><label>
		 <select name='orgtype' size='1' class='' id='orgtype' style='width:200px;'  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "',this.value,'" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);return false;\" >
           <option value=''>-All-</option>
		   ";

    $query = mysql_query("select distinct(codeName) from tbl_lookup  where classCode='1' order by codeName ASC") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {

        $selected2 = $_SESSION['orgtype1'] == $row['codeName'] ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected2 . ">" . $row['codeName'] . "</option>";
    }

    $data .= "
	     </select>
		 </label></td>
		 <td width='' colspan='2' class='evenrow'><strong>Subcounty:</strong></td>
		 <td width='' colspan='7' class='evenrow'>
		 <select name='subcounty' size='1' class='' id='subcounty'  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "',this.value,'" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);return false;\"  style='width:200px;'>
          <option value=''>-All-</option>";
    $sql = "select * from tbl_subcounty where districtCode like '" . $_SESSION['districtName'] . "%' order by subcountyName asc";
    $query = @mysql_query($sql) or die(http("FLT-2621"));
    while ($row = @mysql_fetch_array($query)) {
        $sel = ($row['subcountyCode'] == $_SESSION['subcountyCode']) ? "selected" : "";
        $data .= "<option value=\"" . $row['subcountyCode'] . "\" " . $sel . ">" . $row['subcountyName'] . "</option>";
    }
    $data .= "</select></td>
		 </tr>
		 <tr>
		 <td class='evenrow3' colspan='2' align='left'><strong>Farmer/Village:</strong></td>
		 <td width='' colspan='2' class='evenrow' align='left'><input name='village' id='village' type='text' value='" . $_SESSION['famerName'] . "'  size='30'></td>
	<td width='' colspan='2' class='evenrow'>
	<strong>Parish:</strong></td>
	<td width='' colspan='6' class='evenrow'>
	<select name='parish' size='1' class=''   onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "',this.value,'" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);return false;\"  id='parish' style='width:200px;'>
          <option value=''>-All-</option>" . funct_dropDownSelected('tbl_parish', 'ParishName', 'ParishCode', 'ParishName', $_SESSION['ParishName'], 'subcountyCode', $_SESSION['subcountyName']) . " 
		  </select></td>
		
		 
		 <tr class='evenrow'><td colspan='2'>Lead Farmer:</td><td colspan='2'><select name='leadfarmer' size='1' class='' id='leadfarmer'   onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',this.value,'" . $_SESSION['gender'] . "',1,20);return false;\"   style='width:200px;'>
          ";
    if ($_SESSION['leadFarmer'] == '0') $data .= "<option value='0' selected >No</option>";
    else if ($_SESSION['leadFarmer'] == '1') $data .= "<option value='1' selected >Yes</option>";
    else $data .= "
	
	<option value=''>-All-</option>
	<option value='0'  >Male</option>
	<option value='1'>Female</option>";
    $data .= "</select></td><td colspan='2'>Gender</td>
		 <td colspan='5'><select name='gender' size='1' class='' id='gender'  onChange=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "',this.value,1,20);return false;\"  style='width:200px;'>";

    if ($_SESSION['gender'] == '1') $data .= "<option value='1' selected >Male</option>";
    else if ($_SESSION['gender'] == '2') $data .= "<option value='2' selected >Female</option>";
    else $data .= "<option value=''>-All-</option>
	<option value='1'  >Male</option>
	<option value='2'>Female</option>";

    $data .= "</select></td><td class='evenrow'>
		 <input name='search' type='button' value='Go' id='button'  onClick=\"xajax_view_ParticipatingfarmersbyproducerOrganization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['famerName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "','" . $_SESSION['leadFarmer'] . "','" . $_SESSION['gender'] . "',1,20);return false;\"></td></tr>
		 
		 
		 
		 </tr>";
    return $data;

}


function filter_organization()
{

//$dataentry=($_SESSION['role']=='Managing Director'or'Chief Technical Advisor')?"":"<input type='button' class='formButton2'   id='button' name='newentry' value='Add Organization' onclick=\"xajax_new_organization();return false;\">";
    $tot = mysql_fetch_array(mysql_query("select count(orgName) as num_org from tbl_organization o join tbl_country c on(c.countryCode=o.country_id) where lower(orgName) like '" . strtolower($_SESSION['orgname1']) . "%' && lower(c.countryName) like '" . strtolower($_SESSION['countryName']) . "%' and o.display like 'Yes%'")) or die(http("SP-2682"));
    $data .= "<tr class='evenrow'>
        <td class='' colspan='5'><b class='greenlinks'>TOTAL OF : " . $tot['num_org'] . " ORGANIZATIONS</b></td><td class='' colspan='7' align='right' width='70'>";

    $data .= "<input type='button' class='formButton2'   id='button' name='newentry' value='New Entry' onclick=\"xajax_new_organization('','','','','','');return false;\">";
    $data .= " | <a href='export_to_excel_word.php?linkvar=Export Organization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['parishName'] . "&&format=excel'><input name='export' type='button' class='formButton2'   id='button' value='Export to Excel' /></a> | <a href='print_version2.php?linkvar=Print Organization&&districtName=" . $_SESSION['districtName'] . "&orgName=" . $_SESSION['orgname1'] . "&&orgtype=" . $_SESSION['orgtype1'] . "&&subcounty=" . $_SESSION['subcountyName'] . "&&parish=" . $_SESSION['parishName'] . "&&format=Print' target='_blank'><input name='export' type='button' class='formButton2'   id='button' value='Print Version' /></a></td>
        </tr>

<tr class='evenrow'>
        <td width='' colspan='2' class='evenrow'><strong>Organisation</strong></td>
		<td width='' class='evenrow' colspan='2' ><select name='orgname1' id='orgname1'  size='1' onChange=\"xajax_view_organization(this.value,'" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\" class=''  style='width:200px;'>
          <option value=''>-All-</option>
          ";

    $query = mysql_query("select distinct(orgName) from tbl_organization where orgName <> '' group by orgName") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        $selected1 = $_SESSION['orgname1'] == $row['orgName'] ? "SELECTED" : "";
        $data .= "
          <option value=\"" . $row['orgName'] . "\" " . $selected1 . ">" . substr($row['orgName'], 0, 30) . "</option>
          ";
    }

    $data .= "
        </select></td>
		<td width='' colspan='2' class='evenrow'><strong>District:</strong></td><td width='' colspan='6' class='evenrow'><select name='district' size='1' onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "',this.value,'" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\" id='district' style='width:200px;'>
          <option value=''>-All-</option>
		  " . funct_dropDownSelected('tbl_district', 'districtName', 'districtCode', 'districtName', $_SESSION['districtName']) . "</select></td>
    
    
    

 
</tr>
		 <tr class='evenrow'>
        <td class='evenrow3' colspan='2'><b>Organization Type:</b></td>
		 <td  colspan='2' class='evenrow3'><label>
		 <select name='orgtype' size='1' class='' id='orgtype' style='width:200px;'  onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "',this.value,'" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyName'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\">
           <option value=''>-All-</option>
		   ";

    $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select distinct(codeName) from tbl_lookup  where classCode='1' order by codeName ASC") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {

        $selected2 = $_SESSION['orgtype1'] == $row['codeName'] ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['codeName'] . "\" " . $selected2 . ">" . $row['codeName'] . "</option>";
    }

    //".funct_dropDownSelectedWhere('tbl_subcounty','subcountyName','subcountyCode','subcountyName',$_SESSION['subcountyName'],'districtCode',$_SESSION['districtName']).
    $data .= "
	     </select>
		 </label></td>
		 <td width='' colspan='2' class='evenrow'><strong>Subcounty:</strong></td>
		 <td width='' colspan='6' class='evenrow'>
		 <select name='subcounty' size='1' class='' id='subcounty'  onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "',this.value,'" . $_SESSION['ParishName'] . "',1,20);return false;\"  style='width:200px;'>
          <option value=''>-All-</option>";
    $sql = "select * from tbl_subcounty where districtCode like '" . $_SESSION['districtName'] . "%' order by subcountyName asc";
    $query = @mysql_query($sql) or die(http("FLT-2621"));
    while ($row = @mysql_fetch_array($query)) {
        $sel = ($row['subcountyCode'] == $_SESSION['subcountyCode']) ? "selected" : "";
        $data .= "<option value=\"" . $row['subcountyCode'] . "\" " . $sel . ">" . $row['subcountyName'] . "</option>";
    }
    $data .= "</select></td>
		 </tr>
		 <tr>
		 <td class='evenrow3' colspan='2' align='left'><strong>Country:</strong></td>
		 <td width='' colspan='2' class='evenrow' align='right'><select name='zone' size='1' class='' id='zone' onChange=\"xajax_view_organization('" . $_SESSION['orgname1'] . "','" . $_SESSION['orgtype1'] . "','" . $_SESSION['countryName'] . "','" . $_SESSION['districtName'] . "','" . $_SESSION['subcountyCode'] . "','" . $_SESSION['ParishName'] . "',1,20);return false;\"style='width:200px;'>
           <option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_country  where memberstatus  like 'Yes%' group by countryName order by countryName asc") or die(mysql_error());

    while ($row = mysql_fetch_array($query)) {
        $selected = $_SESSION['countryName'] == $row['countryCode'] ? "SELECTED" : "";
        $data .= "<option value=\"" . $row['countryCode'] . "\" " . $selected . ">" . $row['countryName'] . "</option>";
    }

    $data .= "</select></td>
	<td width='' colspan='2' class='evenrow'>
	<strong>Parish:</strong></td>
	<td width='' colspan='5' class='evenrow'>
	<select name='parish' size='1' class='' id='parish' style='width:200px;'>
          <option value=''>-All-</option>" . funct_dropDownSelected('tbl_parish', 'ParishName', 'ParishCode', 'ParishName', $_SESSION['ParishName'], 'subcountyCode', $_SESSION['subcountyName']) . " 
		  </select></td>
		<td class='evenrow'><input name='search' type='button' class='formButton2'   id='button' value='Go' 
		 onclick=\"xajax_view_organization(getElementById('orgname1').value,getElementById('orgtype').value,getElementById('zone').value);\" /></td></tr>
";
    return $data;

}



function filter_component()
{

    $data = "<tr class='evenrow'>


	<td width='70'>PROJECT GOAL </td><td>
      <select name='programme' id='programme'>";
    if ($_SESSION['program_name'] != '') {

        $query1 = mysql_query("select * from tbl_programme where program_name like '" . $_SESSION['program_name'] . "%' order by program_name asc") or die(mysql_error());
        while ($row1 = mysql_fetch_array($query1)) {

            $data .= "<option value='" . $row1['program_name'] . "' >" . substr($row1['program_name'], 0, 50) . "</option>";

        }
    } else

        $data .= "<option value='%' >-All-</option>";
    $query11 = mysql_query("select * from tbl_programme where program_name <> '' order by program_name") or die(mysql_error());
    while ($row11 = mysql_fetch_array($query11)) {

        $data .= "<option value='" . $row11['program_name'] . "%'>" . substr($row11['program_name'], 0, 40) . "</option>";
    }
    $data .= "</select>
    </label></td>
   
    <td width='154' align='right'><label>
    <input type='button' class='formButton2'   id='button' name='new_programme' value='New Strategic objective' onclick=\"xajax_add_component();return false;\" />
    </label></td>
    <td width='40' align='right'><label>
	  
    <a href='export_to_excel_word.php?linkvar=Export Strategic Objective&&component=" . $_SESSION['component'] . "&&programme=" . $_SESSION['program_name'] . "&&funder=" . $_SESSION['Funder'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
    </label></td>
    
  </tr>
  <tr class='evenrow'>
    	<td width='70'>STRATEGIC OBJECTIVE</td>
	<td colspan=2><label>
      <select name='ccomponent' id='ccomponent'>";
    if ($_SESSION['component'] <> '') {
        $query2 = mysql_query("select * from tbl_component where component like '" . $_SESSION['component'] . "%' order by component asc") or die(mysql_error());
        while ($row = mysql_fetch_array($query2)) {

            $data .= "<option value='" . $row['component'] . "' >" . substr($row['component'], 0, 70) . "</option>";

        }
    } else
        $data .= "<option value='%' >-All-</option>";

    $query2 = mysql_query("select * from tbl_component  order by component asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query2)) {
        $data .= "<option value='" . $row['component'] . "%' '>" . substr($row['component'], 0, 70) . "</option>";
    }
    $data .= "</select>
</td>
	
	
    
    <td align='right'><input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' onclick=\"xajax_view_component(getElementById('ccomponent').value,getElementById('programme').value);return false;\" /></td>

    
  </tr>
";
    return $data;

}

function filter_subcomponent()
{
    $data = "<tr CLASS='evenrow'>
   
	<td width='' colspan=5>&nbsp;</td>
	

    <td width='' align='right'>
 <input type='button' class='formButton2'   id='button' name='new_programme' value='New Entry' onclick=\"xajax_add_subcomponent('');return false;\" />

    </td>
    <td width='' colspan='4' align='right'><label>
       <a href='export_to_excel_word.php?linkvar=Export Subcomponent&&code=" . $_SESSION['ssubcomponent_code'] . "&&subcomponent=" . $_SESSION['ssubcomponent'] . "&&component=" . $_SESSION['scomponent'] . "&&programme=" . $_SESSION['sprogramme'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
    </label></td>
  </tr>
   
  <tr CLASS='evenrow'>
    <td colspan=2>PROGRAM: </td>
    <td width='' colspan=5><select name='programme' id='programme' class='combobox' ><OPTION VALUE=''>-All-</OPTION>";

    $query13 = mysql_query("select * from tbl_programme where lower(program_name) like '%" . strtolower($_SESSION['sprogramme']) . "%' order by program_name asc") or die(mysql_error());
    while ($row13 = mysql_fetch_array($query13)) {
        $SEL = ($row13['program_name'] == $_SESSION['sprogramme']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row13['program_name'] . "\" " . $SEL . " >" . $row13['program_id'] . " " . $row13['program_name'] . "</option>";

    }


    $data .= "</select></td>
 		 </tr>
 
  			<tr CLASS='evenrow'><td colspan=2>Outcome</td><td colspan=4><label>
       		<select name='subcomponent' id='subcomponent'  class='combobox' ><option value='' >-All-</option>";
    $query2 = mysql_query("select * from tbl_subcomponent where  subcomponent <> '' order by subcomponent") or die(http(2248));
    while ($row2 = mysql_fetch_array($query2)) {
        $selsubp = ($_SESSION['ssubcomponent'] == $row2['subcomponent']) ? "selected" : "";
        $data .= "<option value=\"" . $row2['subcomponent'] . "\" " . $selsubp . ">" . $row2['subcomponent_code'] . " " . $row2['subcomponent'] . "</option>";

    }
    $data .= "</select>
  </label></td><td><input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' onclick=\"xajax_view_subcomponent(getElementById('subcomponent').value,getElementById('component').value,getElementById('programme').value);return false;\" /></td>
</tr>
";
    return $data;

}

function filter_output()
{

    $data .= "<tr CLASS='evenrow'>

<td width='' align='right' colspan=6><div style='float:right;'><label>
      <input type='button' class='formButton2'   id='button' name='Output' value='New Entry' onclick=\"xajax_add_output('','','','','','','');return false;\" />
    </label> | <label>
      <a href='export_to_excel_word.php?linkvar=Export Sub-Intermediate Result Area&&code=" . $_SESSION['ooutput_code'] . "&&output_name=" . $_SESSION['ooutput_name'] . "&&subcomponent=" . $_SESSION['osubcomponent'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
    </label></div></td>
  </tr>  
<tr class='evenrow3'>
  <td width='' colspan='2' >Program</td>
    <td colspan='4'><select name='program' id='program'  class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_programme order by prog_id asc") or die(http("FLTR-2691"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selprogramme = ($_SESSION['programme'] == $row1['program_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['program_name'] . "\" " . $selprogramme . ">" . $row1['program_code'] . " " . $row1['program_name'] . "</option>";

    }

    $data .= "</select></td>
   
   
    
  </tr>
  <tr class='evenrow3'>
  <td width='' colspan='2'>Outcome</td>
    <td colspan='4'><select name='outcome' id='outcome'  class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_subcomponent order by subcomponent_code asc") or die(http("FLTR-2712"));
    while ($row1 = mysql_fetch_array($query1)) {

        $selsubprogramme = ($_SESSION['subcomponent'] == $row1['subcomponent']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['subcomponent'] . "\" " . $selsubprogramme . " >" . $row1['subcomponent_code'] . " " . $row1['subcomponent'] . "</option>";

    }

    $data .= "</select></td>
   
 
    

    
  </tr>
  
  
  
  <tr class='evenrow3'>
  <td width='' colspan='2' >Output</td>
    <td colspan='3'><select name='output' id='output'  class='combobox'>";
    $data .= "<option value='' >-All-</option>";

    $query1 = mysql_query("select * from tbl_output order by output_code asc") or die(http("VP-501"));
    while ($row1 = mysql_fetch_array($query1)) {

        $seloutput = ($_SESSION['output_name'] == $row1['output_name']) ? "SELECTED" : "";
        $data .= "<option value=\"" . $row1['output_name'] . "\" " . $seloutput . ">" . $row1['output_code'] . "  " . $row1['output_name'] . "</option>";

    }

    $data .= "</select></td>
   
   <td><input name='search' type='button' class='formButton2'   id='button'  value='Go'  onclick=\"xajax_view_output(getElementById('program').value,getElementById('program').value,getElementById('supergoal').value);return false;\"/></td>
    
  </tr>
  
  
 
";
    return $data;

}

function filter_subprogram()
{

    $data = "

   <tr CLASS='evenrow'>
<td colspan='8'>
    <div align='right'>
<input type='button' class='formButton2'   id='button' name='new_programme' value='New Subprogram' onclick=\"xajax_add_strategy('','','','');return false;\" /> | <a href='export_to_excel_word.php?linkvar=Export Strategy&&strategy=" . $_SESSION['strategy_name'] . "&&output=" . $_SESSION['output'] . "&&subcomponent=" . $_SESSION['subcomponent'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
</a></div></td>
</tr>
  
 <tr class='evenrow'>
     <td colspan=2>Programme:</td><td colspan=6>
      
    <select name='programme' id='programme'>
        <option value='' >-All-</option>
        ";
    if ($_SESSION['program_name'] <> '')
        $data .= "<option value='" . $_SESSION['program_name'] . "' >" . $_SESSION['program_name'] . "</option>";
    else
        $data .= "<option value='' >-All-</option>";
    $query = mysql_query("select * from tbl_programme where program_name <> '' order by program_name") or die(http(2832));
    while ($row = mysql_fetch_array($query)) {
        $data .= "
        <option value='" . $row['program_name'] . "'>" . $row['program_name'] . "</option>
        ";

    }
    $data .= "
      </select></td></tr>
	  
 
 <tr class='evenrow'>
     <td colspan=2> SubProgram:</td>
    <td colspan=5><select name='subcomponent' id='subcomponent'>";
    if ($_SESSION['subcomponent'] <> '')
        $data .= "<option value='" . $_SESSION['subcomponent'] . "%' >" . $_SESSION['subcomponent'] . "</option><option value='%' >-All-</option>";
    else
        $data .= "<option value='' >-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc") or die(http(2848));
    while ($row = mysql_fetch_array($query)) {
        $data .= "<option value='" . $row['subcomponent'] . "'>" . $row['subcomponent_code'] . "  " . $row['subcomponent'] . "</option>
      ";

    }
    $data .= "
    </select></td>
 

<td>
    <input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' onclick=\"xajax_view_strategy(getElementById('strategy_name').value,getElementById('output').value,getElementById('subcomponent').value,getElementById('component').value,getElementById('programme').value);return false;\" /></td>
   
  </tr>
";
    return $data;

}


function filter_siractivity()
{

    $data = "
<tr class='evenrow'>
	<td colspan='7'><div align='right'>
	  <input type='button' class='formButton2'   id='button' name='new_programme' value='New SIR-Activity' onclick=\"xajax_add_siractivity('','','','','','');return false;\" /> |
	    <a href='export_to_excel_word.php?linkvar=Export SIRActivity&&strategy=" . $_SESSION['strategy'] . "&&siractivity=" . $_SESSION['sasiractivity'] . "&&output=" . $_SESSION['saoutput'] . "&&subcomponent=" . $_SESSION['sasubcomponent'] . "&&component=" . $_SESSION['sacomponent'] . "&&programme=" . $_SESSION['saprogramme'] . "&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a>
	    
      </div></td>
</tr>
<tr class='evenrow'><td colspan=2>
      PROJECT GOAL:</td><td COLSPAN=5>
      
    <select name='programme' id='programme' class='combobox'>";
    if ($_SESSION['saprogramme'] <> NULL)
        $data .= "<option value='" . $_SESSION['saprogramme'] . "'>" . substr($_SESSION['saprogramme'], 0, 100) . "</option><option value=''>-All-</option>";
    else
        $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_programme where program_name <> '' order by program_name") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {


        //$SEL=($_SESSION['saprogramme']==$row['program_name'])?"SELECTED":"";
        $data .= "
        <option value=\"" . $row['program_name'] . "%\" " . $SEL . ">" . substr($row['program_name'], 0, 100) . "</option>
        ";

    }

    $data .= " 
      </select></TD>
</TR>

  <tr class='evenrow'><td colspan=2>STRATEGIC OBJECTIVE:</td>
    <td colspan=5><select name='component' id='component' class='combobox'>
     
      ";
    if ($_SESSION['sacomponent'] != '')
        $data .= "<option value='" . $_SESSION['sacomponent'] . "' >" . substr($_SESSION['sacomponent'], 0, 100) . "</option><option value=''>-All-</option>";
    else
        $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_component where component <> '' order by component") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        // $SEL=($_SESSION['sacomponent']==$row['component'])?"SELECTED":"";

        $data .= "<option value=\"" . $row['component'] . "\" " . $SEL . ">" . substr($row['component'], 0, 100) . "</option>";

    }
    $data .= "
     <option value='' >-All-</option></select></td></tr>
	<tr class='evenrow'><td colspan=2>
      INTERMEDIATE RESULT AREA:    </td>
    <td colspan='5'><select name='subcomponent' id='subcomponent' class='combobox'>";
    if ($_SESSION['sasubcomponent'] != '')
        $data .= "<option value=\"" . $_SESSION['sasubcomponent'] . "\" >" . substr($_SESSION['sasubcomponent'], 0, 100) . "</option><option value=''>-All-</option>";

    else
        $data .= "<option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['subcomponent'] == $row['subcomponent']) ? "SELECTED" : "";
        $data .= "
      <option value=\"" . $row['subcomponent'] . "\" " . $sel . ">" . $row['subcomponent_code'] . "  " . substr($row['subcomponent'], 0, 100) . "</option>
      ";

    }
    $data .= "
    </select></td>
   
</tr>
	
	
	
	 <tr class='evenrow'><td colspan=2>
      SUB-INTERMEDIATE RESULT AREA:    </td>
    <td colspan='5'><select name='output' id='output' class='combobox'> ";
    if ($_SESSION['saoutput'] != '')
        $data .= "<option value=\"" . $_SESSION['saoutput'] . "\" >" . substr($_SESSION['saoutput'], 0, 100) . "</option><option value=''>-All-</option>";
    else
        $data .= "<option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_output where output_name <> '' order by output_code asc") or die(http(3337));
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['saoutput'] == $row['output_name']) ? "SELECTED" : "";
        $data .= "
      <option value=\"" . $row['output_name'] . "\" " . $sel . ">" . $row['output_code'] . "  " . substr($row['output_name'], 0, 100) . "</option>
      ";

    }
    $data .= "
    </select></td>
   
</tr>";

    $data .= "<tr class='evenrow'><td colspan=2>
      STRATEGY:    </td>
    <td colspan='5'><select name='strategy' id='strategy' class='combobox'>";
    if ($_SESSION['saactivity'] != '')
        $data .= "<option value=\"" . $_SESSION['strategy'] . "\" >" . substr($_SESSION['strategy'], 0, 100) . "</option>";

    else
        $data .= "<option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_strategy where strategy_name <> '' order by strategy_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['strategy'] == $row['strategy_name']) ? "SELECTED" : "";
        $data .= "
      <option value=\"" . $row['strategy_name'] . "\" " . $sel . ">" . $row['strategy_code'] . "  " . substr($row['strategy_name'], 0, 100) . "</option>
      ";

    }
    $data .= "
    </select></td>
   
</tr>";
    $data .= "<tr class='evenrow'><td colspan=2>SIR-ACTIVITY:     </td>
	<td colspan='4'><div align='left' style='float:left;'>
	  <select name='sirubactivity' id='siractivity' class='combobox'>";
    if ($_SESSION['sasiractivity'] != '')
        $data .= "<option value=\"" . $_SESSION['sasiractivity'] . "\" >" . substr($_SESSION['sasiractivity'], 0, 100) . "</option>";

    else
        $data .= "<option value=''>-All-</option>";

    $query = mysql_query("select * from tbl_siractivity where activity_name <> '' order by activity_code") or die(http(3380));
    while ($row = mysql_fetch_array($query)) {
        $sel = ($_SESSION['sasiractivity'] == $row['activity_name']) ? "SELECTED" : "";
        $data .= "
        <option value=\"" . $row['activity_name'] . "\" " . $sel . ">" . $row['activity_code'] . " " . substr($row['activity_name'], 0, 100) . "</option>
        ";

    }
    $data .= "
      </select></div><div align='right'>
	    
      </div></td> <TD><input name='search' type='button' class='formButton2'   id='button' value='Go' title='search' onclick=\"xajax_view_siractivity(getElementById('programme').value,getElementById('component').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('strategy').value,getElementById('siractivity').value);return false;\" /></td>
</tr>

";
    return $data;

}

#*********************************


#filter activity_basedindicator

function filterActivityBasedIndicator()
{

    $data = "


<table cellspacing='0'      width='660' border='0'>
 
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PROGRAMME: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='programme' id='programme'>";

    $query = mysql_query("select * from tbl_programme where program_name <> '' order by program_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['program_name'] . "'>" . $row['program_name'] . "</option>";
    }
    $data .= "</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'><div align='left' width=165>COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left'>
      <select name='component' id='component'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_component where component <> '' order by component asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='%" . $row['component'] . "'>" . $row['component'] . "</option>";
    }
    $data .= "</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>SUB-COMPONENT: </div></th>
    <th scope='col' colspan=2><div align='left' class=evenrow>
      <select name='subcomponent' id='subcomponent'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_subcomponent where subcomponent <> '' order by subcomponent_code asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='%" . $row['subcomponent_code'] . "'>" . $row['subcomponent_code'] . " " . $row['subcomponent'] . "</option>";
    }
    $data .= "</select>
    </div></th>
   
  </tr>
  <tr>
    <th width='165' scope='col'colspan=''>Type of Indicator:</th>
   
    <th scope='col' colspan=2><div style='float:left;'><select name='type_ofindicator' id='type_ofindicator' onchange=\"xajax_check_viewIndicatorType(getElementById('type_ofindicator').value);\"><option value=''>-All-</option>";

    $q = mysql_query("select * from tbl_lookup where classCode='2' order by code") or die(mysql_error());
    while ($rowL = mysql_fetch_array($q)) {
        $selected = $_SESSION['code'] == $rowL['code'] ? "SELECTED" : "";
        $data .= "<option value='" . $rowL['code'] . "' '" . $selected . "'>" . $rowL['codeName'] . "</option>";

    }
    $data .= "			  
                      </select></div><div align='right'><input type='button' class='formButton2'  name='export' id='export' value='Export to Excel ' />
      <input type='button' class='formButton2'   id='button' name='button' id='button' value='New Indicator'  onclick=\"xajax_add_indicator('','','','')\"/>
    <input type='button' class='formButton2'   id='button' name='button' id='button' value='DCED Mapping'  onclick=\"xajax_view_DCEDindicator()\"/>
	</div></th>
  </tr>
  <tr>
    <th width='165' scope='col' class=evenrow><div align='left' width=165>PHYSICAL TARGET: </div></th>
    <th scope='col' colspan=2 class=evenrow><div align='left'>
      <select name='physical_target' id='physical_target'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_indicator where physical_target <> '' and indicator_type like '" . $_SESSION['indicatorType'] . "%'  group by physical_target order by physical_target asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['physical_target'] . "'>" . $row['physical_target'] . "</option>";
    }
    $data .= "</select>
    </div></th>
   
  </tr>
 <tr>
    <th width='165' scope='col'><div align='left' width=165>INDICATOR: </div></th>
    <th width='306' scope='col'><div align='left'>
 <select name='indicator' id='indicator'><option value=''>-All-</option>";
    $query = mysql_query("select * from tbl_indicator where physical_target <> '' and lower(indicator_type) like '" . $_SESSION['indicatorType'] . "%'  group by indicator_name  order by indicator_name asc") or die(mysql_error());
    while ($row = mysql_fetch_array($query)) {

        $data .= "<option value='" . $row['indicator_name'] . "'>" . substr($row['indicator_name'], 0, 50) . "</option>";
    }
    $data .= "</select>      </select>
    </div></th><th width='31'><input name='search' type='button' class='formButton2'   id='button' value='Go' onclick=\"xajax_searchActivityBasedIndicator(getElementById('programme').value,getElementById('component').value,getElementById('subcomponent').value,getElementById('physical_target').value,getElementById('indicator').value); return false;\" align=right /></th>
   
  </tr>
</table>

";
    return $data;
}




