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
case "ViewRelatedLinks":
$data.="<div style='float:right;'>";
	  
	  if($_SESSION['role']==pagination::roleMgt(0)||$_SESSION['role']==pagination::roleMgt(7)){
       $data.="<input type='button' class='formButton2'   id='button' name='export' value='New Entry' onclick=\"xajax_new_relatedLink();return false;\"/> |";
	   }
	   else{
	   
	   //$data.="";
	   }
	   
	   $data.="<a href='export_to_excel_word.php?linkvar=Export ViewRelatedLinks&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print ViewRelatedLinks&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
break;



case "ViewCumulativePerfomanceReport":
$data.="<div style='float:right;'>
	  
       <a href='export_to_excel_word.php?linkvar=Export ViewCumulativePerfomanceReport&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print ViewCumulativePerfomanceReport&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
break;
case "ViewAnnualPerfomanceReport":
$data.="<div style='float:right;'>
	  
       <a href='export_to_excel_word.php?linkvar=Export ViewAnnualPerfomanceReport&&fyear=".$_SESSION['fyear']."&&semiAnnual=".$_SESSION['semiAnnual']."&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print ViewAnnualPerfomanceReport&&fyear=".$_SESSION['fyear']."&&semiAnnual=".$_SESSION['semiAnnual']."&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
break;
case "SemiAnnualPerfomanceReport":
$data.="<div style='float:right;'>
	  
       <a href='export_to_excel_word.php?linkvar=Export SemiAnnualPerfomanceReport&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print SemiAnnualPerfomanceReport&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
break;


case "AnnualResultsHO":
$data.="<div style='float:right;'>
	   <input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_edit_AnnualResults(xajax.getFormValues('annualTarget1'),'".pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')."');return false;\" /> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Results&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print Annual Results&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
break;

case "AnnualTargetsReport":
#-------------------------------------------
$data.="<div style='float:right;'>
	 
       <a href='export_to_excel_word.php?linkvar=Export Annual Workplan&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a target='_blank' href='print_version2.php?linkvar=Print Annual Workplan&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>";
break;
case "AnnualTargets":
#-------------------------------------------
$data.="<div style='float:right;'>";

		if($_GET['action']=='Reports'){
		$data.="";
		}else {
	   /* $data.="<input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_new_annualTarget('".$_SESSION['fyear']."','".$_SESSION['zoneID']."','','');return false;\" /> |"; */
	   }
$data.="<a href='export_to_excel_word.php?linkvar=Export Annual Workplan&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a target='_blank' href='print_version2.php?linkvar=Print Annual Workplan&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version' target='_blank' />
    </a></div>";
break;


//------------AnnualResultsFS------------------------------
		case "AnnualResultsFS":
$data.="<div style='float:right;'>
	   <input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_edit_annualResults(xajax.getFormValues('annualTarget1'),'".pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange')."');return false;\" /> |
       <a href='export_to_excel_word.php?linkvar=Export Annual Results&&format=excel'><input type='button' class='formButton2'   id='button' name='export' value='Export to Excel' />
    </a> | <a  target='_blank' href='print_version2.php?linkvar=Print Annual Results&&format=Print'><input type='button' class='formButton2'   id='button' name='export' value='Print Version'  />
    </a></div>";
		
	break;	
default:


		}


return $data;

			}

}

?>