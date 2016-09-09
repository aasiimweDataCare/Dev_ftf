<?php
//require_once('lib_sunrise.php');

class ExportManager{
 var $query;
 var $role;
function ExportManager($query){
$this->query;
}




/* $data.="<div style='float:right;'><input name='household' type='button' value='New Entry' onclick=\"xajax_new_mapping_register('','','',''); return false;\"> | <a href='export_to_excel_word.php?linkvar=Export Mapping Register&&zone=".$_SESSION['zone']."&&district=".$_SESSION['districtName']."&&subcounty=".$_SESSION['subcounty']."&&parish=".$_SESSION['parish']."&&village=".$_SESSION['village']."&&category=".$_SESSION['category_name']."&&format=excel'><input name='export' type='button' value='Export to Excel'></a>
| <a target='_blank' href='print_version2.php?linkvar=Print Mapping Register&&zone=".$_SESSION['zone']."&&district=".$_SESSION['districtName']."&&subcounty=".$_SESSION['subcounty']."&&parish=".$_SESSION['parish']."&&village=".$_SESSION['village']."&&category=".$_SESSION['category_name']."&&format=Print'><input name='export' type='button' value='Print Version'></a>


</div>"; */

function exportData($report){
switch($report){
case "MappingRegisterDataEntry":
$data.="<div style='float:right;'><input name='household' type='button' value='New Entry' onclick=\"xajax_new_mapping_register('','','',''); return false;\"> | <a href='export_to_excel_word.php?linkvar=Export Mapping Register&&format=excel'>
<input name='export' type='button' value='Export to Excel'></a>
| <a target='_blank' href='print_version2.php?linkvar=Print Mapping Register&&format=Print'>
<input name='export' type='button' value='Print Version'></a>


</div>";
break;

case "OVCDetailsCSI":
#-------------------------------------------
$data.="<div style='float:right;'><a href='export_to_excel_word.php?linkvar=Export Children&&".$_SESSION['zone']."&&district=".$_SESSION['districtZone']."&&subcounty=".$_SESSION['subcountyCode']."&&parish=".$_SESSION['parishCode']."&&childname=".$_SESSION['childname']."&&gender=".$_SESSION['gender']."&&inschool=".$_SESSION['inschool']."&&householdname=".$_SESSION['householdname']."&&fromage=".$_SESSION['fromage']."&&toage=".$_SESSION['toage']."&&need=".$_SESSION['need']."&&format=excel'><input name='export' type='button' value='Export to Excel' /></a> |
 <a target='_blank' href='print_version2.php?linkvar=Print Children&&zone=".$_SESSION['zone']."&&district=".$_SESSION['districtZone']."&&subcounty=".$_SESSION['subcountyCode']."&&parish=".$_SESSION['parishCode']."&&childname=".$_SESSION['childname']."&&gender=".$_SESSION['gender']."&&inschool=".$_SESSION['inschool']."&&householdname=".$_SESSION['householdname']."&&fromage=".$_SESSION['fromage']."&&toage=".$_SESSION['toage']."&&need=".$_SESSION['need']."&&format=Print'><input name='export' type='button' value='Print Version' /></a></div>";
break;
//------------OVC categoreis------------------------------
		case "OVCCategories":
			$data.="<div style='float:right;'><input name='' type='button' value='New Entry' onclick=\"xajax_new_OVC_categories('','','');return false;\" /> | <a href='export_to_excel_word.php?linkvar=Export OVC Categories&&zone=".$_SESSION['zone']."&&category_name=".$_SESSION['category_name']."&&category_type=".$_SESSION['category_type']."&&district=".$_SESSION['districtZone']."&&subcounty=".$_SESSION['subcountyCode']."&&parish=".$_SESSION['parishCode']."&&format=excel'><input type='button' name='export' value='Export to Excel' />
    </a>
	| <a target='_blank' href='print_version2.php?linkvar=Print OVC Categories&&zone=".$_SESSION['zone']."&&category_name=".$_SESSION['category_name']."&&category_type=".$_SESSION['category_type']."&&district=".$_SESSION['districtZone']."&&subcounty=".$_SESSION['subcountyCode']."&&parish=".$_SESSION['parishCode']."&&format=Print'><input type='button' name='export' value='Print Version' />
    </a>
	
	
	
	
	</div>";
		
		
default:

/* $data.="<div style='float:right;'><input name='household' type='button' value='New Entry' onclick=\"xajax_new_mapping_register('','','',''); return false;\"> | <a href='export_to_excel_word.php?linkvar=Export Mapping Register&&zone=".$_SESSION['zone']."&&district=".$_SESSION['districtName']."&&subcounty=".$_SESSION['subcounty']."&&parish=".$_SESSION['parish']."&&village=".$_SESSION['village']."&&category=".$_SESSION['category_name']."&&format=excel'><input name='export' type='button' value='Export to Excel'></a>
| <a target='_blank' href='print_version2.php?linkvar=Print Mapping Register&&zone=".$_SESSION['zone']."&&district=".$_SESSION['districtName']."&&subcounty=".$_SESSION['subcounty']."&&parish=".$_SESSION['parish']."&&village=".$_SESSION['village']."&&category=".$_SESSION['category_name']."&&format=Print'><input name='export' type='button' value='Print Version'></a>

</div>"; */





		}


return $data;

			}

}

?>