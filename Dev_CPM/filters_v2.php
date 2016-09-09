<?php 

//filter farmer sample

function  filter_farmerSample(){
$QueryManager=new QueryManager('');
$data.="<tr>
	<td colspan='16'>
		<table class='data-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td>
					<strong>Trader:</strong>
					<select name='tbl_tradersId' id='tbl_tradersId' 
					onchange=\"xajax_view_farmers(this.value,'".$tbl_villageAgentId."');return false;\" style='width:300px;'>
					<option value=''>-select trader-</option>";
					$data.=$QueryManager->filterTrader($_SESSION['tbl_tradersId']);
					$data.="</select>
					
					<strong>Village Agent:</strong>
					<select name='tbl_villageAgentId' id='tbl_villageAgentId' 
					onchange=\"xajax_view_farmers('".$tbl_tradersId."',this.value);return false;\" style='width:300px;'>
					<option value=''>-select village agent-</option>";
					$data.=$QueryManager->filterVillageAgent($_SESSION['tbl_tradersId'],$_SESSION['tbl_villageAgentId']);
					$data.="</select>
					
					<input name='search' type='button' class='formButton2' value='Go'
					onclick=\"xajax_view_farmers(
					getElementById('tbl_tradersId').value,
					getElementById('tbl_villageAgentId').value
					);return false;\" />
				</td>
			</tr>
		</table>
	</td>
</tr>";
return $data;
}

//------------------------------------------------------------------------------------End of filter for farmer sample------------------------------------------
function filter_projectProgramMappingExport($linkvar,$indicator,$program,$project,$colspan,$div){

$data.="<tr  class='evenrow'> <td colspan='$colspan' align='right'> <a href='export_to_excel_word.php?linkvar=Export ".$linkvar."&&program=".$program."&project=".$project."&indicator=".$indicator."&&format=excel'><input name='new_training' type='button' class='formButton2'value='Export to Excel'></a> | 

<a href='print_version2.php?linkvar=Print ".$linkvar."&&program=".$program."&project=".$project."&indicator=".$indicator."&&format=print' target='_blank'><input name='new_training' type='button' class='formButton2'value='Print Version'></a> | <input name='new_publications' type='button' class='formButton2' value='Close' onclick=\"xajax_close('".$div."');return false;\"> 

 </td></tr>";
 return $data;




}
//Filter for Form3

function  filter_form3(){
$qmobj = new QueryManager('');

$data.="
<thead>
	<tr>
		<td colspan='16'>
			<table width='100%' cellspacing='1' cellpadding='1'>
				<tr>
					<td>
						<select name='region' id='region' 
						onchange=\"xajax_view_form3(
						<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_form3(
						this.value,
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['exName']."',
						'".$_SESSION['exCode']."',
						1,20); return false;\" 
						style='width:150px;'>";
						$data.="<option value='' default selected>-Region-</option>";
						$data.=$qmobj->ZoneFilter($_SESSION['region']);	
						$data.="</select> |

						<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_form3(
						'".$_SESSION['region']."',
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['exName']."',
						'".$_SESSION['exCode']."',
						1,20); return false;\"
						style='width:150px;'>";
						$data.="<option value=''>-Reporting Period-</option>";
						$data.=$qmobj->CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select> |

						<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_form3(
						'".$_SESSION['region']."',
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['exName']."',
						'".$_SESSION['exCode']."',
						1,20); return false;\"
						style='width:150px;'>";
						$data.="<option value=''>-CPMA Year-</option>";
						$data.=$qmobj->CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select> |

						<select name='exName' id='exName' 
						onchange=\"xajax_view_form3(
						'".$_SESSION['region']."',
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						this.value,
						'".$_SESSION['exCode']."',
						1,20); return false;\"
						style='width:150px;'>";
						$data.="<option value=''>-Exporter-</option>";	
						$data.=$qmobj->filterExporter($_SESSION['exName']);
						$data.="</select> |

						<input type='text' 
						name='exCode' 
						id='exCode' 
						placeholder='exporter code'
						onchange=\"xajax_view_form3(
						'".$_SESSION['region']."',
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['exName']."',
						this.value,
						1,20); return false;\"
						style='width:150px;'
						placeholder='".$_SESSION['exCode']."' /> |

						<input type='button' class='formButton2' value='Go' 
						onclick=\"xajax_view_form3(
						getElementById('region').value,
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('exName').value,
						getElementById('exCode').value
						);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export EXPORTER AND PROCESSOR DATA DETAILS
						&&region=".$_SESSION['region']."
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&exName=".$_SESSION['exName']."
						&&exCode=".$_SESSION['exCode']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
						<input name='export_exporters' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print EXPORTER AND PROCESSOR DATA DETAILS
						&&region=".$_SESSION['reporting_period']."
						&&region=".$_SESSION['region']."
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&exName=".$_SESSION['exName']."
						&&exCode=".$_SESSION['exCode']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
						<input name='export_exporters' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
";


return $data;
}

//--------------------------------------------------------------------------------------------------End of filter for Form3---------------------------------

//Filter for Form2

function  enterpriseTechnologyAdoptionFilter(){

$data.="<thead>
	<tr>";
	$data.="<td colspan='17'>";
		$data.="<table width='100%' border='0' cellspacing='1' cellpadding='1'>";
				$data.="<tr>";
						$data.="<td>
						
						<select name='region' id='region' 
						onchange=\"xajax_view_enterpriseTechAdoption(
						this.value,
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['trName']."',
						'".$_SESSION['trCode']."',
						1,20); return false;\" style='width:150px;'>";
						$data.="<option value='' default selected>-Select Region-</option>";
						$data.=QueryManager::ZoneFilter($_SESSION['region']);	
						$data.="</select>";
						
						$data.="<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_enterpriseTechAdoption(
						'".$_SESSION['region']."',
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['trName']."',
						'".$_SESSION['trCode']."',
						1,20); return false;\"
						style='width:150px;'>";
							$data.="<option value=''>-Select Reporting Period-</option>";
							$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>
						
						<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_enterpriseTechAdoption(
						'".$_SESSION['region']."',
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['trName']."',
						'".$_SESSION['trCode']."',
						1,20); return false;\"
						style='width:150px;'>";
							$data.="<option value=''>-Select CPMA Year-</option>";
							$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>";
						
						$data.="<select name='trName' id='trName' 
						onchange=\"xajax_view_enterpriseTechAdoption(
						'".$_SESSION['region']."',
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						this.value,
						'".$_SESSION['trCode']."',
						1,20); return false;\" style='width:150px;'>";
						$data.="<option value=''>-Select Trader Name-</option>";	
						$data.=QueryManager::filterTrader($_SESSION['trName']);
						$data.="</select>";
						
						$trCodePlaceHolder=(!empty($_SESSION['trCode']) and ($_SESSION['trCode'] !==''))?$_SESSION['trCode']:'Trader Code';
						
						$data.="<input type='text' name='trCode' id='trCode' style='width:150px;' placeholder='".$trCodePlaceHolder."' />";
						
						$data.="<input type='button' class='formButton2' value='Go' 
						onclick=\"xajax_view_enterpriseTechAdoption(
						getElementById('region').value,
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('trName').value,
						getElementById('trCode').value);return false;\" />";
						
						$data.="<input name='enterpriseTechAdoption' type='button' class='formButton2'value='New Entry' 
						onclick=\"xajax_new_enterpriseTechAdoption('','','','','','');\"> |
									<a href='export_to_excel_word.php?linkvar=Export Enterprise Technology Adoption
										&&reporting_period=".$_SESSION['reporting_period']."
										&&cpma_year=".$_SESSION['cpma_year']."
										&&trName=".$_SESSION['trName']."
										&&trCode=".$_SESSION['trCode']."
										&&cur_page=".$_SESSION['cur_page']."
										&&records_per_page=".$_SESSION['records_per_page']."
										&&format=excel'>
										
									<input name='export_enterpriseTechAdoption' type='button' class='formButton2'value='Export to Excel'></a> |
									<a href='print_version.php?linkvar=Print Enterprise Technology Adoption
									&&reporting_period=".$_SESSION['reporting_period']."
									&&cpma_year=".$_SESSION['cpma_year']."
									&&trName=".$_SESSION['trName']."
									&&trCode=".$_SESSION['trCode']."
									&&cur_page=".$_SESSION['cur_page']."
									&&records_per_page=".$_SESSION['records_per_page']."
									&&format=Print' target='_blank'>
									
									<input name='export_enterpriseTechAdoption' type='button' class='formButton2' value='Print Version'></a>
									</td>";
				$data.="</tr>";
			$data.="</table>";
	$data.="</td>";
$data.="</tr>";


return $data;
}
function  labourSavingTechFilter(){
$data.="<thead>
<tr>
	<td colspan='12'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td>
					<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_labourSavingTech(
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['valueChain']."',
						1,20); return false;\" style='width:150px;'>";
						$data.="<option value=''>-Select Reporting Period-</option>";
						$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
					$data.="</select>";


					$data.="<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_labourSavingTech(
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['valueChain']."',
						1,20); return false;\" 
						style='width:150px;'>";
						$data.="<option value=''>-Select CPMA Year-</option>";
						$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
					$data.="</select>";

					$data.="<select name='valueChain' id='valueChain' 
						onchange=\"xajax_view_labourSavingTech('
						".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						this.value,
						1,20); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select Value chain-</option>";	
						$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
					$data.="</select>";

					$data.="<input type='button' class='formButton2' value='Go' 
						onclick=\"xajax_view_labourSavingTech(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('valueChain').value
						);return false;\" />

					<a href='export_to_excel_word.php?linkvar=Export Labour Saving Technology
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&valueChain=".$_SESSION['valueChain']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=excel'>
						<input name='export_labourSavingTech' type='button' class='formButton2'value='Export to Excel'>
					</a> |
					
					<a href='print_version.php?linkvar=Print Labour Saving Technology
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&valueChain=".$_SESSION['valueChain']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=Print' target='_blank'>
						<input name='export_labourSavingTech' type='button' class='formButton2' value='Print Version'>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>";
return $data;
}
function  mediaProgramsFilter(){
$data.="<thead>
				<tr>
					<td colspan='13'>";
									$data.="<select name='reporting_period' id='reporting_period' 
									onchange=\"xajax_view_mediaPrograms(
									this.value,
									'".$_SESSION['cpma_year']."',
									'".$_SESSION['valueChain']."',
									'".$_SESSION['mediaType']."',1,20); return false;\" style='width:150px;'>";
									$data.="<option value=''>-Select Reporting Period-</option>";
									$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
									$data.="</select>";

									$data.="<select name='cpma_year' id='cpma_year' 
									onchange=\"xajax_view_mediaPrograms(
									'".$_SESSION['reporting_period']."',
									this.value,
									'".$_SESSION['valueChain']."',
									'".$_SESSION['mediaType']."',
									1,20
									); return false;\" style='width:150px;'>";
									$data.="<option value=''>-Select CPMA Year-</option>";
									$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
									$data.="</select>";

									$data.="<select name='valueChain' id='valueChain' 
									onchange=\"xajax_view_mediaPrograms(
									'".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."',
									this.value,
									'".$_SESSION['mediaType']."',
									1,20
									); return false;\" style='width:150px;'>";
									$data.="<option value=''>-Select Value Chain-</option>";	
									$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
									$data.="</select>";

									$data.="<select name='mediaType' id='mediaType' 
									onchange=\"xajax_view_mediaPrograms(
									'".$_SESSION['reporting_period']."',
									'".$_SESSION['cpma_year']."',
									'".$_SESSION['valueChain']."',
									this.value,
									1,20
									); return false;\" style='width:150px;'>";
									$data.="<option value=''>-Select Media Type-</option>";	
									$data.=QueryManager::mediaTypeFilter($_SESSION['mediaType']);
									$data.="</select> |";

									$data.="<input type='button' class='formButton2' value='Go' 
									onclick=\"xajax_view_mediaPrograms(
									getElementById('reporting_period').value,
									getElementById('cpma_year').value,
									getElementById('valueChain').value,
									getElementById('mediaType').value
									);return false;\" /> |

									<a href='export_to_excel_word.php?linkvar=Export Media Programs
										&&reporting_period=".$_SESSION['reporting_period']."
										&&cpma_year=".$_SESSION['cpma_year']."
										&&valueChain=".$_SESSION['valueChain']."
										&&mediaType=".$_SESSION['mediaType']."
										&&cur_page=".$_SESSION['cur_page']."
										&&records_per_page=".$_SESSION['records_per_page']."
										&&format=excel'>
											<input name='export_mediaPrograms' type='button' class='formButton2'value='Export to Excel'>
									</a> |

									<a href='print_version.php?linkvar=Print Media Programs
										&&reporting_period=".$_SESSION['reporting_period']."
										&&cpma_year=".$_SESSION['cpma_year']."
										&&valueChain=".$_SESSION['valueChain']."
										&&mediaType=".$_SESSION['mediaType']."
										&&cur_page=".$_SESSION['cur_page']."
										&&records_per_page=".$_SESSION['records_per_page']."
										&&format=Print' target='_blank'>
											<input name='export_mediaPrograms' type='button' class='formButton2' value='Print Version'>
									</a>
								
					<td>
				</tr>";
return $data;
}
function  youthApprenticeFilter(){

$data.="<thead>
	<tr>
		<td colspan='18'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>	  
					<td>";
						$data.="<select name='reporting_period' id='reporting_period' onchange=\"xajax_view_youthApprentice(this.value,'".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."',1,20); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select Reporting Period-</option>";
						$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>";

						$data.="<select name='cpma_year' id='cpma_year' onchange=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."',this.value,'".$_SESSION['valueChain']."',1,20); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select CPMA Year-</option>";
						$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>";

						$data.="<select name='valueChain' id='valueChain' onchange=\"xajax_view_youthApprentice('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."',this.value,1,20); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select Value Chain-</option>";	
						$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
						$data.="</select> |";

						$data.="<input type='button' class='formButton2' value='Go' 
						onclick=\"xajax_view_youthApprentice(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('valueChain').value);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export Youth Apprenticeships
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
							<input name='export_youthApprentice' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print Youth Apprenticeships
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
							<input name='export_youthApprentice' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}
function  bdsFilter(){

$data.="<thead>
	<tr>
		<td colspan='18'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>";
						$data.="<select name='reporting_period' id='reporting_period' onchange=\"xajax_view_bds(this.value,'".$_SESSION['cpma_year']."','".$_SESSION['valueChain']."',1,20); return false;\" style='width:300px;'>";
							$data.="<option value=''>-Select Reporting Period-</option>";
							$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>";

						$data.="<select name='cpma_year' id='cpma_year' onchange=\"xajax_view_bds('".$_SESSION['reporting_period']."',this.value,'".$_SESSION['valueChain']."',1,20); return false;\" style='width:300px;'>";
							$data.="<option value=''>-Select CPMA Year-</option>";
							$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>";

						$data.="<select name='valueChain' id='valueChain' onchange=\"xajax_view_bds('".$_SESSION['reporting_period']."','".$_SESSION['cpma_year']."',this.value,1,20); return false;\" style='width:300px;'>";
							$data.="<option value=''>-Select Value Chain-</option>";	
							$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
						$data.="</select> |";

						$data.="<input type='button' class='formButton2' value='Go'
						onclick=\"xajax_view_bds(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('valueChain').value
						);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export business development services
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
							<input name='export_bds' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print business development services
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
							<input name='export_bds' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}
function  bankLoansFilter(){

$data.="<thead>
	<tr>
		<td colspan='20'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>";
						$data.="<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_bankLoans(
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['valueChain']."',
						'".$_SESSION['partnerType']."',1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Reporting Period-</option>";
							$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>";

						$data.="<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_bankLoans(
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['valueChain']."',
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select CPMA Year-</option>";
							$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>";

						$data.="<select name='valueChain' id='valueChain' 
						onchange=\"xajax_view_bankLoans(
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						this.value,
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Value Chain-</option>";	
							$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
						$data.="</select>";

						$data.="<select name='partnerType' id='partnerType' 
						onchange=\"xajax_view_bankLoans(
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['valueChain']."',
						this.value,1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Partner Type-</option>";
							$typePartnerArray=array('Trader','Exporter','VillageAgent','Others');
							foreach ($typePartnerArray as $partner) {
							$selected = ($_SESSION['partnerType'] == $partner) ? "selected" : "";
							$data .= "<option value='" . $partner . "' " . $selected . ">" . $partner . "</option>";
							}
						$data.="</select>|

						<input type='button' class='formButton2' value='Go'
						onclick=\"xajax_view_bankLoans(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('valueChain').value,
						getElementById('partnerType').value
						);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export Bank Loans
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
							<input name='export_bankLoans' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print Bank Loans
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
							<input name='export_bankLoans' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";


return $data;
}
function  inputSalesFilter(){

$data.="<thead>
	<tr>
		<td colspan='23'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>";
					$data.="<select name='reporting_period' id='reporting_period' 
					onchange=\"xajax_view_inputSales(
					this.value,'".$_SESSION['cpma_year']."',
					'".$_SESSION['partnerType']."',1,20
					); return false;\"  style='width:300px;'>";
						$data.="<option value=''>-Select Reporting Period-</option>";
						$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
					$data.="</select>";

					$data.="<select name='cpma_year' id='cpma_year' 
					onchange=\"xajax_view_inputSales(
					'".$_SESSION['reporting_period']."',this.value,
					'".$_SESSION['partnerType']."',
					1,20
					); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select CPMA Year-</option>";
						$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
					$data.="</select>";


					$data.="<select name='partnerType' id='partnerType' 
					onchange=\"xajax_view_inputSales(
					'".$_SESSION['reporting_period']."',
					'".$_SESSION['cpma_year']."',
					this.value,1,20
					); return false;\" style='width:300px;'>";
						$data.="<option value=''>-Select Partner Type-</option>";
						$typePartnerArray=array('Trader','Exporter','VillageAgent','Others');
						foreach ($typePartnerArray as $partner) {
						$selected = ($_SESSION['partnerType'] == $partner) ? "selected" : "";
						$data .= "<option value='" . $partner . "' " . $selected . ">" . $partner . "</option>";
						}
					$data.="</select> | 

					<input type='button' class='formButton2' value='Go' 
					onclick=\"xajax_view_inputSales(
					getElementById('reporting_period').value,
					getElementById('cpma_year').value,
					getElementById('partnerType').value
					);return false;\" /> |

					<a href='export_to_excel_word.php?linkvar=Export Input Sales
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&partnerType=".$_SESSION['partnerType']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=excel'>
						<input name='export_inputSales' type='button' class='formButton2'value='Export to Excel'>
					</a> |

					<a href='print_version.php?linkvar=Print Input Sales
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&partnerType=".$_SESSION['partnerType']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=Print' target='_blank'>
						<input name='export_inputSales' type='button' class='formButton2' value='Print Version'>
					</a>

					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}
function  phhFilter(){
$data.="<thead>
	<tr>
		<td colspan='15'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>
						<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_phh(
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\"  style='width:300px;'>";
							$data.="<option value=''>-Select Reporting Period-</option>";
							$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>

						<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_phh(
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\"  style='width:300px;'>";
							$data.="<option value=''>-Select CPMA Year-</option>";
							$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>

						<select name='partnerType' id='partnerType' 
						onchange=\"xajax_view_phh(
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						this.value,
						1,20
						); return false;\" style='width:300px;'>";
							$data.="<option value=''>-Select Partner Type-</option>";
							$typePartnerArray=array('Trader','Exporter','VillageAgent','Others');
							foreach ($typePartnerArray as $partner) {
							$selected = ($_SESSION['partnerType'] == $partner) ? "selected" : "";
							$data .= "<option value='" . $partner . "' " . $selected . ">" . $partner . "</option>";
							}
						$data.="</select> |

						<input type='button' class='formButton2' value='Go'
						onclick=\"xajax_view_phh(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('partnerType').value
						);return false;\" /> | 

						<a href='export_to_excel_word.php?linkvar=Export PHH
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
							<input name='export_phh' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print PHH
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
							<input name='export_phh' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}
function  partnershipsFilter(){

$data.="<thead>
	<tr>
		<td colspan='13'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>
						<select name='reporting_period' id='reporting_period' 
						onchange=\"xajax_view_partnerships(
						this.value,'".$_SESSION['cpma_year']."',
						'".$_SESSION['valueChain']."',
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Reporting Period-</option>";
							$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
						$data.="</select>";

						$data.="<select name='cpma_year' id='cpma_year' 
						onchange=\"xajax_view_partnerships(
						'".$_SESSION['reporting_period']."',
						this.value,
						'".$_SESSION['valueChain']."',
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select CPMA Year-</option>";
							$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
						$data.="</select>";

						$data.="<select name='valueChain' id='valueChain' 
						onchange=\"xajax_view_partnerships(
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',this.value,
						'".$_SESSION['partnerType']."',
						1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Value Chain-</option>";	
							$data.=QueryManager::valueChainFilter($_SESSION['valueChain']);
						$data.="</select>";

						$data.="<select name='partnerType' id='partnerType' 
						onchange=\"xajax_view_partnerships(
						'".$_SESSION['reporting_period']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['valueChain']."',
						this.value,1,20
						); return false;\" style='width:150px;'>";
							$data.="<option value=''>-Select Partner Type-</option>";
							$typePartnerArray=array('Trader','Exporter','VillageAgent','Others');
							foreach ($typePartnerArray as $partner) {
							$selected = ($_SESSION['partnerType'] == $partner) ? "selected" : "";
							$data .= "<option value='" . $partner . "' " . $selected . ">" . $partner . "</option>";
							}
						$data.="</select> |

						<input type='button' class='formButton2' value='Go'
						onclick=\"xajax_view_partnerships(
						getElementById('reporting_period').value,
						getElementById('cpma_year').value,
						getElementById('valueChain').value,
						getElementById('partnerType').value
						);return false;\" /> |

						<a href='export_to_excel_word.php?linkvar=Export Public Private Partnerships
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=excel'>
							<input name='export_partnerships' type='button' class='formButton2'value='Export to Excel'>
						</a> |

						<a href='print_version.php?linkvar=Print Public Private Partnerships
						&&reporting_period=".$_SESSION['reporting_period']."
						&&cpma_year=".$_SESSION['cpma_year']."
						&&valueChain=".$_SESSION['valueChain']."
						&&partnerType=".$_SESSION['partnerType']."
						&&cur_page=".$_SESSION['cur_page']."
						&&records_per_page=".$_SESSION['records_per_page']."
						&&format=Print' target='_blank'>
							<input name='export_partnerships' type='button' class='formButton2' value='Print Version'>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}


//-------------------------------------------------------------------------------Filter for Form4--------------------------------------------

function  filter_form4(){

$data.="<thead><tr>
	<td colspan='23'>

		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td>
					<select name='region' id='region' 
					onchange=\"xajax_view_form4(
					this.value,'".$_SESSION['reporting_period']."',
					'".$_SESSION['cpma_year']."',
					'".$_SESSION['trName']."',
					'".$_SESSION['trCode']."',
					1,20); return false;\" 
					style='width:300px;'>
					<option value='' default selected>-Select Region-</option>";
					$data.=QueryManager::ZoneFilter($_SESSION['region']);	
					$data.="</select>";


					$data.="
					<select name='reporting_period' id='reporting_period' 
					onchange=\"xajax_view_form4(
					'".$_SESSION['region']."',
					this.value,
					'".$_SESSION['cpma_year']."',
					'".$_SESSION['trName']."',
					'".$_SESSION['trCode']."',
					1,20); return false;\" style='width:300px;'>
					<option value=''>-All Reporting Period-</option>";
					$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
					$data.="</select>";
						

					$data.="
					<select name='cpma_year' id='cpma_year' 
					onchange=\"xajax_view_form4(
					'".$_SESSION['region']."',
					'".$_SESSION['reporting_period']."',
					this.value,
					'".$_SESSION['trName']."',
					'".$_SESSION['trCode']."',
					1,20); return false;\" style='width:300px;'>
					<option value=''>-Select CPMA Year-</option>";
					$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
					$data.="</select>";

					
					$data.="
					<select name='trName' id='trName' 
					onchange=\"xajax_view_form4(
					'".$_SESSION['region']."',
					'".$_SESSION['reporting_period']."',
					'".$_SESSION['cpma_year']."',
					this.value,
					'".$_SESSION['trCode']."',
					1,20); return false;\" style='width:300px;'>
					<option value=''>-Select Trader-</option>";
					$data.=QueryManager::filterTrader($_SESSION['trName']);
					$data.="</select>";


					$data.="
					<input type='text' name='trCode' id='trCode' 
					onchange=\"xajax_view_form4(
					'".$_SESSION['region']."',
					'".$_SESSION['reporting_period']."',
					'".$_SESSION['cpma_year']."',
					'".$_SESSION['trName']."',
					this.value,1,20); return false;\" 
					style='width:300px;' 
					placeholder='".$_SESSION['trCode']."' />

					<input type='button' alt='Submit' value='Go'  class='formButton2'
					onclick=\"xajax_view_form4(
					getElementById('region').value,
					getElementById('reporting_period').value,
					getElementById('cpma_year').value,
					getElementById('trName').value,
					getElementById('trCode').value
					);return false;\" /> |

					<a href='export_to_excel_word.php?linkvar=Export TRADER DATA DETAILS
					&&region=".$_SESSION['region']."
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&trName=".$_SESSION['trName']."
					&&trCode=".$_SESSION['trCode']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=excel'>
					<input name='export_exporters' type='button' class='formButton2'value='Export to Excel'>
					</a> |

					<a href='print_version.php?linkvar=Print TRADER DATA DETAILS
					&&region=".$_SESSION['region']."
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&trName=".$_SESSION['trName']."
					&&trCode=".$_SESSION['trCode']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=Print' target='_blank'>
					<input name='export_exporters' type='button' class='formButton2' value='Print Version'>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>";


return $data;
}
//------------------------------------------------------------------------------------End of filter for Form4------------------------------------------
function  filter_form5(){

$data.="<tr>
	<td colspan='15'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td>
					<input type='text' name='vaName' id='vaName' placeholder='VA Name' />
					
					<input type='text' name='vaCode' id='vaCode' placeholder='VA Code' />
					
					<input name='search' type='button' class='formButton2' value='Go'
					onclick=\"xajax_view_form5(
					getElementById('vaName').value,
					getElementById('vaCode').value
					);return false;\" /> |

					<input name='new_form5' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_form5('','','','','','','','');\"> |
					<a href='export_to_excel_word.php?linkvar=Export VILLAGE AGENT DATA&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
					<input name='export_form5' type='button' class='formButton2'value='Export to Excel'></a> |
					
					<a href='print_version.php?linkvar=Print VILLAGE AGENT DATA&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
					<input name='export_form5' type='button' class='formButton2' value='Print Version'>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>";


return $data;
}
//------------------------------------------------------------------------------------End of filter for Form5------------------------------------------
function  filter_form6(){

//$data="<table width='100%' cellspacing='1' id='report'>";
$data.="<thead>
	<tr class='evenrow'>
		<td colspan='21'>
			<table width='100%' border='0' cellspacing='1' cellpadding='1'>
				<tr>
					<td>
					<input type='text' name='dsName' id='dsName' placeholder='District'/>
					<input type='text' name='hsName' id='hsName' placeholder='Household Head Name'/>

					<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form6.fromDate);return false;\" hidefocus=''>
					<input  name='fromDate' type='text' size='20' placeholder='From Date:' id='fromDate' readonly='readonly' style='width:175px;>
					<img name='popcal' src='/WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>
					</a>

					<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form6.toDate);return false;\" hidefocus=''>
					<input  name='toDate' type='text' size='20' placeholder='To Date:' id='toDate' readonly='readonly' style='width:175px;>
					<img name='popcal' src='/WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22px' width='34px'></a>

					<input name='search' type='button' class='formButton2'value='Go'
					onclick=\"xajax_view_training(
					getElementById('dsName').value,
					getElementById('hsName').value,
					getElementById('fromDate').value,
					getElementById('toDate').value);return false;\" /> |

					<input name='newForm6' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_form6('','','','','');\"> |
					<a href='export_to_excel_word.php?linkvar=Export Household Data&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
					<input name='export_form6' type='button' class='formButton2'value='Export to Excel'>
					</a> |

					<a href='print_version.php?linkvar=Print Household Data&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
					<input name='export_form6' type='button' class='formButton2' value='Print Version'>
					</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>";
return $data;
}

function  filter_form6survey(){
$data.="<tr class='evenrow'>
	<td colspan='29'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr>
				<td>
					<select name='dsName' id='dsName' style='width:300px;' >";
					$data.="<option value=''>--select District--</option>";
					$qDistrict = "SELECT * FROM `tbl_district` WHERE `tbl_district`.`Display`='Yes' ORDER BY `tbl_district`.`districtName` ASC";
					$thisUser1 = @mysql_query($qDistrict) or die(http(__line__));
					while ($rDistricts = mysql_fetch_array($thisUser1)) {
					$selected = ($_SESSION['dsName'] == $rDistricts['districtCode']) ? "selected" : "";
					$data .= "<option value=\"" . $rDistricts['districtCode'] . "\" " . $selected . " >" . $rDistricts['districtName'] . "</option>";

					}
					$data.="</select>
					
					<input placeholder='Farmer Code:' type='text' name='hsName' id='hsName' value='".$_SESSION['hsName']."' style='width:300px;'/>
					
					<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form6.fromDate);return false;\" hidefocus=''>
						<input placeholder='From: Date'  name='fromDate' type='text' size='20' value='' id='fromDate' readonly='readonly' value='".$_SESSION['fromDate']."' style='width:150px;>
						<img name='popcal' src='/WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'>
					</a>
					
					<a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.form6.toDate);return false;\" hidefocus=''>
						<input placeholder='To: Date'   name='toDate' type='text' size='20' value='' id='toDate' readonly='readonly' value='".$_SESSION['toDate']."' style='width:145px;>
						<img name='popcal' src='/WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22px' width='34px'>
					</a>
					
					<select name='speriod' id='speriod' style='width:300;'/>
						<option value=''>-select survey period-</option>
						<option value='2014-03-01  2014-04-30'>FY14 Semi Annual (Mar 1st - Apr 30th)</option>
						<option value='2014-09-01  2014-10-30'>FY14 Annual (Sep 1st - Oct 30th)</option>
						<option value='2015-03-01  2015-04-30'>FY15 Semi Annual (Mar 1st - Apr 30th)</option>
						<option value='2015-09-01  2015-10-30'>FY15 Annual (Sep 1st - Oct 30th)</option>
						<option value='2016-03-01  2016-04-30'>FY16 Semi Annual (Mar 1st - Apr 30th)</option>
						<option value='2016-09-01  2016-10-30'>FY16 Annual (Sep 1st - Oct 30th)</option>
						<option value='2017-03-01  2017-04-30'>FY17 Semi Annual (Mar 1st - Apr 30th)</option>
						<option value='2017-09-01  2017-10-30'>FY17 Annual (Sep 1st - Oct 30th)</option>
						<option value='2018-03-01  2018-04-30'>FY18 Semi Annual (Mar 1st - Apr 30th)</option>
						<option value='2018-09-01  2018-10-30'>FY18 Annual (Sep 1st - Oct 30th)</option>
					</select>
					
					<input name='search' type='button' class='formButton2' value='Search'
					onclick=\"xajax_view_frm6Survey(
					getElementById('dsName').value,
					getElementById('hsName').value,
					getElementById('fromDate').value,
					getElementById('toDate').value,
					getElementById('speriod').value);return false;\" />|

					<a href='export_to_excel_word.php?linkvar=Export Survey Data&&dsName=".$_SESSION['dsName']."&&hsName=".$_SESSION['hsName']."&&fromDate=".$_SESSION['fromDate']."&&toDate=".$_SESSION['toDate']."&&sPeriod=".$_SESSION['speriod']."&&cur_page=".$_SESSION['cur_page']."&&records_per_page=".$_SESSION['records_per_page']."&&format=excel'>
						<input name='export_form6' type='button' class='formButton2'value='Export to Excel'>
					</a> |
					
					<a href='print_version.php?linkvar=Print Survey Data&&dsName=".$_SESSION['dsName']."&&hsName=".$_SESSION['hsName']."&&fromDate=".$_SESSION['fromDate']."&&toDate=".$_SESSION['toDate']."&&sPeriod=".$_SESSION['speriod']."&&cur_page=".$_SESSION['cur_page']."&&records_per_page=".$_SESSION['records_per_page']."&&format=Print' target='_blank'>
						<input name='export_form6' type='button' class='formButton2' value='Print Version'>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>";
		

return $data;
}

function  filter_form6surveyApr2016ToSep2016(){
$data.="<thead>
		<tr>
			<td colspan='".$_SESSION['numFields']."'>
				<table width='100%' border='0' cellspacing='1' cellpadding='1'>
					<tr>
						<td>
							<a href='export_to_excel_word.php?linkvar=
							ExportApr2016toSep2016SurveyData
							&dsName=".$_SESSION['dsName']."
							&hsName=".$_SESSION['hsName']."
							&fromDate=".$_SESSION['fromDate']."
							&toDate=".$_SESSION['toDate']."
							&sPeriod=".$_SESSION['speriod']."
							&cur_page=".$_SESSION['cur_page']."
							&records_per_page=".$_SESSION['records_per_page']."
							&format=excel'>
									<input name='export_form6_survey_four' type='button' class='formButton2' value='Export to Excel'>
							</a> <!--|
							
							<a href='print_version.php?linkvar=
							PrintApr2016toSep2016SurveyData
							&dsName=".$_SESSION['dsName']."
							&hsName=".$_SESSION['hsName']."
							&fromDate=".$_SESSION['fromDate']."
							&toDate=".$_SESSION['toDate']."
							&sPeriod=".$_SESSION['speriod']."
							&cur_page=".$_SESSION['cur_page']."
							&records_per_page=".$_SESSION['records_per_page']."
							&format=Print' target='_blank'>
								<input name='print_form6_survey_four' type='button' class='formButton2' value='Print Version'>
							</a>-->
						</td>
					</tr>
				</table>
			</td>
		</tr>";
		

return $data;
}

//--------------------------------------------------------------------------------------------------End of filter for Form6---------------------------------

//-------------------------------------------------------------------------------Filter for Form7--------------------------------------------
function  filter_form7(){
$data="<thead>
<tr class='evenrow'>
	<td colspan='13'>
		<table width='100%' border='0' cellspacing='1' cellpadding='1'>
			<tr class='evenrow'>
				<td>
					<select name='form7_trader' id='form7_trader'
					onChange=\"xajax_view_form7(
						this.value,
						'".$_SESSION['village_agent']."',
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['reporting_period']."'
					);return false;\" style='width:150px;'>";
					$data.="<option value=''>-Select Trader-</option>";
					$data.=QueryManager::TradersFilter($_SESSION['trader']);
					$data.="</select> 
					
					<select name='form7_village_agent' id='form7_village_agent' 
					onChange=\"xajax_view_form7(
						'".$_SESSION['trader']."',
						this.value,
						'".$_SESSION['cpma_year']."',
						'".$_SESSION['reporting_period']."'
					);return false;\" 
					style='width:150px;'>
					<option value=''>-Select VA-</option>";
					$data.=QueryManager::VasFilter($_SESSION['trader'],$_SESSION['village_agent']);
					$data.="</select> 
					
					<select name='cpma_year' id='cpma_year' 
						onChange=\"xajax_view_form7(
						'".$_SESSION['trader']."',
						'".$_SESSION['village_agent']."',
						this.value,
						'".$_SESSION['reporting_period']."'
					);return false;\"
					style='width:150px;'>
					<option value=''>-Select CPMA Year-</option>";
					$data.=QueryManager::CPMYearFilter($_SESSION['cpma_year']);
					$data.="</select>
					
					<select name='reporting_period' id='reporting_period' 
						onChange=\"xajax_view_form7(
						'".$_SESSION['trader']."',
						'".$_SESSION['village_agent']."',
						'".$_SESSION['cpma_year']."',
						this.value
					);return false;\"	
					style='width:150px;'>
					<option value=''>-Select Reporting Period-</option>";
					$data.=QueryManager::CPMAReportingPeriodFilter($_SESSION['reporting_period']);
					$data.="</select> |
					
					<input name='search' type='submit' class='formButton2' value='Go'
					onclick=\"xajax_view_form7(
						getElementById('form7_trader').value,
						getElementById('form7_village_agent').value,
						getElementById('cpma_year').value,
						getElementById('reporting_period').value
					);return false;\" /> 
					
					<input name='new_form7' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_form7('','','','','');\"> |
					<a href=\"export_to_excel_word.php?linkvar=Export GROUP REGISTER
					&&trader=".$_SESSION['trader']."
					&&village_agent=".$_SESSION['village_agent']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=excel\">
						<input name='export_form7' type='button' class='formButton2'value='Export to Excel'></a> |
					<a href=\"print_version.php?linkvar=Print GROUP REGISTER
					&&trader=".$_SESSION['trader']."
					&&village_agent=".$_SESSION['village_agent']."
					&&cpma_year=".$_SESSION['cpma_year']."
					&&reporting_period=".$_SESSION['reporting_period']."
					&&cur_page=".$_SESSION['cur_page']."
					&&records_per_page=".$_SESSION['records_per_page']."
					&&format=Print\" target=\"_blank\">
						<input name='export_form7' type='button' class='formButton2' value='Print Version'>
					</a>
				</td>
			</tr>
		</table>
	</td>
</tr>";
return $data;
}

//------------------------------------------------------------------------------------End of filter for Form7------------------------------------------



function  filter_form8(){

$data.="<tr class='evenrow'>";
$data.="<td width='' colspan=''>";
          $data.="<div align='left'><strong>Reporting Period</strong></div>";
          $data.="</td>";
          $data.="<td colspan=2>";
          $data.="<select name='quarterName' id='quarterName' style='width:150px;'><option value=''>-All-</option>";
		  
		  $sql="select * from tbl_quarters   group by quarterName order by quarterCode asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http("FLRR-219"));
		  while($ROW=mysql_fetch_array($query)){
		$selected=($_SESSION['quarterName']==$ROW['quarterName'])?"SELECTED":"";
		  $data.="<option value=\"".$ROW['quarterName']."\" ".$selected." >".substr($ROW['quarterName'],0,500)."</option>";}
		  $data.="</select>";
                  $data.="</td>";
                  
                  
                  
       
		  $data.="<td colspan='15' align='right'>
                  <input name='form8' type='button' class='formButton2'value='New Entry' onclick=\"xajax_new_form8('','','','','','','','','','','','','');\"> |
                  <a href='export_to_excel_word.php?linkvar=Export DEMO DATA&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=excel'>
                  <input name='export_form8' type='button' class='formButton2'value='Export to Excel'></a> |
                  <a href='print_version.php?linkvar=Print DEMO DATA&&semi_annual=".$reportingPeriod."&&year=".$year."&&format=Print' target='_blank'>
                  <input name='export_form8' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
		
$data.="<tr class='evenrow'>";
       
		  $data.="<td colspan='16' align='right'><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_form8(getElementById('form8').value,getElementById('semi_annual').value,getElementById('year').value);return false;\" /></td>";
$data.="</tr>";


return $data;
}

//------------------------------------------------------------------------------------End of filter for Form8------------------------------------------







function  filter_training(){
$QueryManager=new QueryManager('');
        
$data.="<tr class='evenrow'>";
$data.="<td width='' colspan=''>";
$data.="<table cellpadding=1 cellspacing=1>";

$data.="<tr><td>";
        $data.="<table><tr>";
        $data.="<td>";
          $data.="<strong>Technical Area Addressed:</strong>";
          $data.="</td>";
          $data.="<td>";
          $data.="<select name='technicalArea' id='technicalArea' style='width:335px;'>";
		  $data.="<option value=''>-All-</option>";
		 $data.=$QueryManager->valueChainFilter($program_id,$project_id);
		  $data.="</select>";
	$data.="</td>";
        $data.="</tr></table>";
        $data.="</td></tr>";
        
        
        $data.="<tr><td>";
        $data.="<table><tr>";
        $data.="<td>";
          $data.="<strong>Training Focus:</strong>";
          $data.="</td>";
          $data.="<td>";
          $data.="<select name='trainingFocus' id='trainingFocus' style='width:400px;'>";
		  $data.="<option value=''>-All-</option>";
          $data.="<option value=''>-Training Focus-</option>";
		 $data.=$QueryManager->trainingFocusFilter($program_id,$project_id);
		  $data.="</select>";
	$data.="</td>";
        $data.="</tr></table>";
        $data.="</td></tr>";


$data.="<tr><td>";
        $data.="<table><tr>";
        $data.="<td>";
          $data.="<strong>Location:</strong>";
          $data.="</td>";
          $data.="<td>";
          $data.="<input type='text' name='location' id='location' style='width:430px;'/>";
	$data.="</td>";
        $data.="</tr></table>";
        $data.="</td></tr>";
        
        
        
        $data.="<tr><td>";
        $data.="<table cellpadding=1 cellspacing=1><tr>";
        $data.="<td width='' colspan=''><strong>Training Date:</strong></td>";
        $data.="<td width='' colspan=''>";
          $data.="From:";
          $data.="</td>";
          $data.="<td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.training.fromDate);return false;\" hidefocus=''>
        <input  name='fromDate' type='text' size='20' value='' id='fromDate' value='".$_SESSION['fromDate']."' readonly='readonly' style='width:175px;>
        <img name='popcal' src='/WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>";
        
        

        $data.="<td width='' colspan=''>";
          $data.="To:";
          $data.="</td>";
          $data.="<td><a href='javascript:void(0)' onclick=\"if(self.gfPop)gfPop.fPopCalendar(document.training.toDate);return false;\" hidefocus=''>
        <input  name='toDate' type='text' size='20' value='' id='toDate' value='".$_SESSION['toDate']."' readonly='readonly' style='width:175px;>
        <img name='popcal' src='./WeekPicker/calbtn.gif' alt='' align='absmiddle' border='0' height='22' width='30px'></a></td>";
        $data.="</tr></table>";
        $data.="</td></tr>";
        
        $data.="<tr>
        
        
        <td align='right'><input name='search' type='button' class='formButton2'value='Go'
        onclick=\"xajax_view_training(
        getElementById('technicalArea').value,
        getElementById('trainingFocus').value,
        getElementById('location').value,
        getElementById('fromDate').value,
        getElementById('toDate').value);return false;\" /></td>
        ";
        
        
        
        $data.="</tr>";
        $data.="</table>";
        $data.="</td>";
              
/* onclick=\"xajax_new_training('','','','');\" */			  
                  
       
		  $data.="<td colspan=16 align='right'>
                  <input name='training' 
				  type='button' class='formButton2'
				  value='New Entry' 
				  onclick=\"loadingIconFormOne('go_to_form1_data_forms');return false;\"> |
				  
                  <a href='export_to_excel_word.php?linkvar=Export Training&&technicalArea=".$technicalArea."&&trainingFocus=".$trainingFocus."&&location=".$location."&&fromDate=".$fromDate."&&toDate=".$toDate."&&cur_page=".$cur_page."&&records_per_page=".$records_per_page."&&format=excel'>
                  <input name='export_training' type='button' class='formButton2'value='Export to Excel'></a> |
                  <a href='print_version.php?linkvar=Print Training&&technicalArea=".$technicalArea."&&trainingFocus=".$trainingFocus."&&location=".$location."&&fromDate=".$fromDate."&&toDate=".$toDate."&&cur_page=".$cur_page."&&records_per_page=".$records_per_page."&&format=Print' target='_blank'>
                  <input name='export_training' type='button' class='formButton2' value='Print Version'></a>
                  </td>";
$data.="</tr>";
		
$data.="<tr class='evenrow'>";
       
		  $data.="<td colspan='25' align='right'>";
$data.="</tr>";


return $data;

}







//view_DCEDvalueChainDevelopment($year,$subcomponent,$org_code,$project,$resultchain,$ReportingPeriod,$div1)
function filter_DCEDvcdgrid(){
$data.="
<tr class='evenrowBorder'>
   
    	<td colspan='13'><label><div style='float:right;'>
      	<input name='newentry' type='button' value='New Entry'  
onclick=\"xajax_new_DCEDQuantitativeannualActual('".$_SESSION['Ryear']."','".$_SESSION['subcomponent_id']."','".$_SESSION['managerorg_code']."','','','".$_SESSION['quarter']."','');return false;\" /> | 	<input name='newentry' type='button' value='Export to Excel' /> | <input name='newentry' type='button' value='Print Version' />
    </label></td>
  </tr>


<!--<tr class='evenrowBorder'>
    	<td colspan='2'>Year</td>
    	<td colspan='11'><label><div style='float:left;'>
      	<select name='fyear' id='fyear' 
		onChange=\"xajax_view_DCEDvalueChainDevelopment(this.value,'".$subcomponent."','".$partner."','".$intervention."','".$resultchain."','".$_SESSION['quarter']."','');return false;\"
		 style='width:300px;' ><option value=''>-All-</option>";
	
                 $data.=QueryManager::YearFilter($year);
      $data.="</select></div><div align='right'>
       
      </div>
    </label></td>
  </tr>
  <tr class='evenrowBorder'>
              <td colspan='2'>Sub-component:
                <label></label></td>
              <td colspan='11'><select name='subcomponent' id='subcomponent'  
onChange=\"xajax_view_DCEDvalueChainDevelopment('".$year."',this.value,'".$partner."','".$intervention."','".$resultchain."','".$_SESSION['quarter']."','');return false;\"
			   style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($_SESSION['DCEDsubcomponent_name']);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrowBorder'>
              <td colspan='2'>Implementing Partner:
                <label></label></td>
              <td colspan='11'><select name='organization' id='organization'
			  
			  onChange=\"xajax_view_DCEDvalueChainDevelopment('".$year."','".$subcomponent."','".$_SESSION['managerorg_code']."','".$intervention."','".$resultchain."','".$_SESSION['quarter']."','');return false;\"
			   style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($_SESSION['managerorg_code'],$_SESSION['DCEDsubcomponent_name']);
				$data.="</select></td>
        </tr>-->";
		$data.="<tr class='evenrowBorder'>
    <td colspan=2>Project:</td>
    <td colspan='12'><select name='project' id='project' style='width:300px;'  
	onChange=\"xajax_view_DCEDvalueChainDevelopment('".$year."','".$_SESSION['DCEDsubcomponent_name']."','".$_SESSION['managerorg_code']."',this.value,'".$resultchain."','".$_SESSION['quarter']."','');return false;\" ><option value=''>-All-</option>";
	
	   
	   $data.=QueryManager::ProjectFilter($_SESSION['managerorg_code'],$intervention);
      $data.="</select></td>
  </tr>
  <!--
		<tr class='evenrowBorder'>
              <td colspan='2'>Result Chain Level:
                <label></label></td>
              <td colspan='11'><select name='rchain' id='rchain' onChange=\"xajax_view_DCEDvalueChainDevelopment('".$year."','".$subcomponent."','".$partner."','".$intervention."',this.value,'".$_SESSION['quarter']."');return false;\"
			  
			  style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 

					  $data.=QueryManager::ResultChainFilter($resultchain);
$data.="</select></td>
        </tr>-->
            
";
return $data;
}


function filter_ProgramTarget(){
$classCode=5;$level=array('ASARECA','Program','Project','Secretariat');
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=12><label>
      <div style='float:right;'> 
	   <input type='button' class='formButton2' id='button' name='Submit' onclick=\"xajax_new_LOPTargets('','','');return false;\" value='New Entry' /> |
       <a href='export_to_excel_word.php?linkvar=Export Program Targets&&target_type=$level[1]&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&program=".$_SESSION['program_id']."&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print Program Targets&&target_type=$level[1]&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&program=".$_SESSION['program_id']."&&format=Print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	";$data.="
	<tr class='evenrow'>
              <td colspan='2'>Program:
                <label></label></td>
              <td colspan='12'><select name='program' id='program' class='combobox' onChange=\"xajax_ViewProgramTargets('Program','".$_SESSION['indicatorType']."','".$_SESSION['output_id']."','','',this.value,1,20);return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_programme where type like '".$level[1]."' group by program_id order by prog_id asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['program_id']==$row['prog_id'])?"SELECTED":"";
	  $data.="<option value=\"".$row['prog_id']."\" ".$selected.">".$row['program_id']." ".retrieve_info_withSpecialCharacters($row['program_name'])." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:
                <label></label></td>
              <td colspan='12'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewProgramTargets('Program',this.value,'".$_SESSION['output_id']."','','','".$_SESSION['program_id']."',1,20);return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicatorType']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".retrieve_info_withSpecialCharacters($row['codeName'])." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>";
			  if($_SESSION['indicatorType']==$indicator_Type[2]){

		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewProgramTargets('Program','".$_SESSION['indicatorType']."',this.value,'','','".$_SESSION['program_id']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=Execute("select * from tbl_output where prog_id like '".$_SESSION['program_id']."%' and type like '$level[1]%' order by output_code asc")or die(http("filter_v2-724"));
while($row=FetchRecords($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else{
		
	$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  disabled='disabled' id='output' onChange=\"xajax_ViewProgramTargets('$level[1]','".$_SESSION['indicatorType']."',,this.value,'','','".$_SESSION['program_id']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like 'Program%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";	
		
		
		}
	          
           $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='11'>
                 <select name='Indicator' id='Indicator' onchange=\"xajax_ViewProgramTargets('Program','".$_SESSION['indicatorType']."',
				
				 '".$_SESSION['output_id']."','','',this.value,'".$_SESSION['program_id']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
                $xs=@mysql_query("select * from tbl_indicator where level_ofIndicator like '$level[1]%'
				group by indicator_name
				 order by indicator_code")or die(http("FLTR-2489"));
				while($row=mysql_fetch_array($xs)){
				$sel=($row['indicator_name']==$year)?"selected":"";
				$data.="<option value=\"".$row['indicator_name']."\" ".$sel."> ".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
				}
              $data.="</select></td>

			  <td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewProgramTargets('".$level[1]."',getElementById('indicator_type').value,getElementById('output').value,getElementById('Indicator').value,'',getElementById('program').value,1,20);return false;\" /></td> 
		
            </tr>
";

return $data;
}




function filter_ProgramTargetReport(){
$classCode=5;
$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=12><label>
       <div style='float:right;'> 
	   <input type='button' class='formButton2' id='button' name='Submit' onclick=\"xajax_new_LOPTargets('','','');return false;\" value='New Entry' /> |
       <a href='export_to_excel_word.php?linkvar=Export LOP Targets&&target_type=$level[1]&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print LOP Targets&&target_type=$level[1]&&type_of_indicator=".$_SESSION['indicatorType']."&output=".$_SESSION['output']."&&indicator=".$_SESSION['indicator']."&&format=Print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	";$data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Class:
                <label></label></td>
              <td colspan='12'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewLOPTargets('$level[1]',this.value,'".$_SESSION['output_id']."','','');return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $selected=($_SESSION['indicatorType']==$row['codeName'])?"SELECTED":"";
	  $data.="<option value=\"".$row['codeName']."\" ".$selected.">".retrieve_info_withSpecialCharacters($row['codeName'])." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>";
			  if($_SESSION['indicatorType']==$indicator_Type[2]){

		$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewLOPTargets('$level[1]','".$_SESSION['indicatorType']."',this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like '$level[1]%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		
		}
		else{
		
	$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='12'><select name='output' class='combobox'  disabled='disabled' id='output' onChange=\"xajax_ViewLOPTargets('$level[1]','".$_SESSION['indicatorType']."',,this.value,'','');return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' and type like '$level[1]%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['output_id']==$row['output_id'])?"SELECTED":"";
$data.="<option value=\"".$row['output_id']."\" ".$selected.">".$row['output_code']." ".retrieve_info_withSpecialCharacters($row['output_name'])."</option>";
				
					  }  
$data.="</select></td>
        </tr>";	
		
		
		}
	          
           $data.="<tr class='evenrow'>
              <td colspan='2'>Indicator:</td>
              <td colspan='11'>
                 <select name='Indicator' id='Indicator' onchange=\"xajax_ViewAnnualTargets('$level[1]','".$_SESSION['indicatorType']."',
				
				 '".$_SESSION['output_id']."','','',this.value);return false;\" class='combobox'><option value=''>-All-</option>";
                $xs=@mysql_query("select * from tbl_indicator where level_ofIndicator like '$level[1]%'
				group by indicator_name
				 order by indicator_code")or die(http("FLTR-2489"));
				while($row=mysql_fetch_array($xs)){
				$sel=($row['indicator_name']==$year)?"selected":"";
				$data.="<option value=\"".$row['indicator_name']."\" ".$sel."> ".$row['indicator_code']." ".$row['indicator_name']."</option>";
				
				}
              $data.="</select></td>

			  <td><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewLOPTargets('$level[1]',getElementById('indicator_type').value,getElementById('output').value,getElementById('Indicator').value,'',1,20);return false;\" /></td> 
		
            </tr>
";

return $data;
}





function filter_indicatorDefinition(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
 $level1=array('Primary','Formula','ABI High Level');
$data="<table cellspacing='0' ><tr CLASS='evenrow'>
   

	


    <td width='' align='right' colspan=6 class='dataRow'><div style='float:right;'>
     <input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_indicatorDefinition('','','','','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=".$_SESSION['output']."&&subcomponent=".$_SESSION['subcomponent']."&&strategy=".$_SESSION['indstrategy']."&&siractivity=".$_SESSION['siractivity']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
 ";
		
    $data.="<tr   class='evenrow'>
              <td colspan='3'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDQuantitativeannualTarget(this.value,'".$_SESSION['organization']."','".$_SESSION['intervention']."','".$_SESSION['resultchain']."','".$_SESSION['fyear']."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$_SESSION['wpsubcomponent']);
				$data.="</select></td>
        </tr>
		
		<tr class='evenrow'>
              <td colspan='3'>Result Chain Level:
                <label></label></td>
              <td colspan='9'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDQuantitativeannualTarget('".$_SESSION['wpsubcomponent']."','".$_SESSION['organization']."','".$_SESSION['intervention']."',this.value,'".$_SESSION['fyear']."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 

					  
					  $data.=QueryManager::ResultChainFilter($_SESSION['resultchain']);
$data.="</select></td>
        </tr>
		";
  
  
		
			 $data.="<tr class='evenrow'>
						  <td colspan='3'>Indicator:</td>
						  <td colspan='2'>
						
						  
							 <select name='indicator' id='indicator' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
						  
		 $data.=QueryManager::IndicatorFilter($programID=$_SESSION['indicator'],'ABI Hight Level');
								  
			$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
						</tr>";
						
						
					$data.="<tr class='evenrow'>
              <td colspan='3'>Indicator Type:</td>
              <td colspan='9'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_indicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> ''  group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";  

return $data;

}



function filter_VariableindicatorDefinition(){

$indicator_Type=array('Impact Indicator','Outcome Indicator','Output Indicator','Secretariat Indicator');
 $level1=array('Primary','Formula','ABI High Level');
$data="<table cellspacing='0' ><tr CLASS='evenrow'>
   

	


    <td width='' align='right' colspan=6 class='dataRow'><div style='float:right;'>
     <input type='button' class='formButton2'name='new_programme' value='New Entry' onclick=\"xajax_new_VariableIndicatorDefinition('','','','','','','');return false;\" /> |
    
    
       <a href='export_to_excel_word.php?linkvar=Export Output&&output_name=".$_SESSION['output']."&&subcomponent=".$_SESSION['subcomponent']."&&strategy=".$_SESSION['indstrategy']."&&siractivity=".$_SESSION['siractivity']."&&format=excel'><input type='button' class='formButton2'name='export' value='Export to Excel' />
    </a>
    </div></td>
  </tr>
 ";
		
    $data.="<tr   class='evenrow'>
              <td colspan='3'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_VariableindicatorDefinition(this.value,'".$_SESSION['organization']."','".$_SESSION['intervention']."','".$_SESSION['resultchain']."','".$_SESSION['fyear']."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$_SESSION['wpsubcomponent']);
				$data.="</select></td>
        </tr>
		
		<tr class='evenrow'>
              <td colspan='3'>Result Chain Level:
                <label></label></td>
              <td colspan='9'><select name='rchain' id='rchain'  onChange=\"xajax_view_VariableindicatorDefinition('".$_SESSION['wpsubcomponent']."','".$_SESSION['organization']."','".$_SESSION['intervention']."',this.value,'".$_SESSION['fyear']."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 

					  
					  $data.=QueryManager::ResultChainFilter($_SESSION['resultchain']);
$data.="</select></td>
        </tr>
		";
  
  
		
			 $data.="<tr class='evenrow'>
						  <td colspan='3'>Indicator:</td>
						  <td colspan='2'>
						
						  
							 <select name='indicator' id='indicator' onchange=\"xajax_view_VariableindicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',this.value,'".$_SESSION['output']."',1,20);return false;\" class='combobox'><option value=''>-All-</option>";
						  
		 $data.=QueryManager::IndicatorFilter($programID=$_SESSION['indicator'],'ABI Hight Level');
								  
			$data.="</select></td><td><input name='search' type='button' class='formButton2'value='Go' onclick=\"xajax_view_VariableindicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."','".$_SESSION['indicatorType']."',getElementById('indicator').value,getElementById('output').value,1,20);return false;\" /></td>
						</tr>";
						
						
					$data.="<tr class='evenrow'>
              <td colspan='3'>Indicator Type:</td>
              <td colspan='9'><select name='Program' class='combobox' id='Program' onchange=\"xajax_view_VariableindicatorDefinition('".$_SESSION['target_type']."','".$_SESSION['program']."','".$_SESSION['project']."',this.value,'".$_SESSION['indicator']."','".$_SESSION['output']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_indicator where indicator_type<> ''  group by indicator_type order by indicator_type asc")or die(http("WP-724"));
while($row=mysql_fetch_array($query)){
$selected=($_SESSION['indicatorType']==$row['indicator_type'])?"SELECTED":"";
$data.="<option value=\"".$row['indicator_type']."\" ".$selected."> ".$row['indicator_type']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";  

return $data;

}


function filter_DCEDQuantitativeannualTarget(){

$data.="<tr class='evenrow'>
  
    <td width='186' scope='col' colspan='13'>
      <div style='float:right;'>";
	  if($_SESSION['role']=='Monitoring and Evaluation')$new_entry="<input type='button' name='button' value='New DCED Annual Targets' onclick=\"xajax_new_DCEDQuantitativeannualTarget('','','','','');return false;\" /> | ";
	  else if($_SESSION['role']=='Implementing Partner')$new_entry="<input type='button' name='button' value='New DCED Annual Targets' onclick=\"xajax_new_DCEDQuantitativeannualTarget('','','".$_SESSION['organization']."','','');return false;\" /> | ";
	  else if($_SESSION['role']=='Partner')$new_entry="<input type='button' name='button' value='New DCED Annual Targets' onclick=\"xajax_new_DCEDQuantitativeannualTarget('','','','','');return false;\" /> | ";
	  else $new_entry="";
	  
	   
       $data.=$new_entry."<a href='export_to_excel_word.php?linkvar=Export DCED Quantitative Annual Target&&subcomponent=".$_SESSION['wpsubcomponent']."&&intervention=".$_SESSION['intervention']."&&resultcahin=".$_SESSION['resultchain']."&&subsector=".$_SESSION['subsector']."&&year=".$_SESSION['fyear']."&&format=excel'><input type='button' name='export' value='Export to Excel' /> | <a href='export_to_excel_word.php?linkvar=Print DCED Quantitative Annual Target&&subcomponent=".$_SESSION['wpsubcomponent']."&&intervention=".$_SESSION['intervention']."&&resultcahin=".$_SESSION['resultchain']."&&subsector=".$_SESSION['subsector']."&&year=".$_SESSION['fyear']."&&format=Print'><input type='button' name='export' value='Print Version' />
    </a>
     
        </div>
    </td>
  </tr>
";
			  

	
	
  $data.="<tr   class='evenrow'>
              <td colspan='4'>Sub-component:
                <label></label></td>
              <td colspan='9'><select name='subcomponent' id='subcomponent' 
			  
			 onChange=\"xajax_view_DCEDQuantitativeannualTarget(this.value,'".$_SESSION['organization']."','".$_SESSION['intervention']."','".$_SESSION['resultchain']."','".$_SESSION['fyear']."');return false;\"
			  style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::SubcomponentFilter($programID=$_SESSION['wpsubcomponent']);
				$data.="</select></td>
        </tr>";
		
		
		 $data.="<tr   class='evenrow'>
              <td colspan='4'>Implementing Partner:
                <label></label></td>
              <td colspan='9'><select name='organization' id='organization'  onChange=\"xajax_view_DCEDQuantitativeannualTarget('".$_SESSION['wpsubcomponent']."',this.value,'".$_SESSION['intervention']."','".$_SESSION['resultchain']."','".$_SESSION['fyear']."');return false;\" style='width:300px'><option value=''>-All-</option>";
			  $data.=QueryManager::OrganizationFilter($organization=$_SESSION['organization'],$_SESSION['wpsubcomponent']);
				$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
    <td colspan=4 >Project:</td>
    <td colspan='10'><select name='project' id='project' onChange=\"xajax_view_DCEDQuantitativeannualTarget('".$_SESSION['wpsubcomponent']."','".$_SESSION['organization']."',this.value,'".$_SESSION['resultchain']."','".$_SESSION['fyear']."');return false;\" style='width:300px;' ><option value=''>-All-</option>";
	
	/* $queryx=mysql_query("select * from tbl_intervention group by intervention order by intervention  asc") or die(http(2289));
	while($row=mysql_fetch_array($queryx)){
	 // $selx=($_SESSION['type']==$row['codeName'])?"SELECTED":"";
 $data.="<option value=\"".$row['intervention_id']."\" ".$selx." >".$row['intervention']."</option>";
	  }
	   */
	   
	   $data.=QueryManager::ProjectFilter($organization=$_SESSION['organization'],$_SESSION['intervention']);
      $data.="</select></td>
  </tr>
		<tr class='evenrow'>
              <td colspan='4'>Result Chain Level:
                <label></label></td>
              <td colspan='9'><select name='rchain' id='rchain'  onChange=\"xajax_view_DCEDQuantitativeannualTarget('".$_SESSION['wpsubcomponent']."','".$_SESSION['organization']."','".$_SESSION['intervention']."',this.value,'".$_SESSION['fyear']."');return false;\" style='width:300px;'>";
			 
			 
$data.="<option value=''>-All-</option>"; 
/* $queryrc=mysql_query("select * from tbl_resultschain order by rc_id asc")or die(mysql_error());
while($rowrc=mysql_fetch_array($queryrc)){
$selrc=($_SESSION['resultchain']==$rowrc['name'])?"SELECTED":"";
$data.="<option value=\"".$rowrc['name']."\" '".$selrc."'>".$rowrc['name']."</option>";
				
					  }   */
					  
					  $data.=QueryManager::ResultChainFilter($_SESSION['resultchain']);
$data.="</select></td>
        </tr>";
		
		
		

          
			
            $data.="<tr class='evenrow'>
              <td colspan='4'>Financial Year:</td>
              <td colspan='8'><select name='year' id='year' onChange=\"xajax_view_DCEDQuantitativeannualTarget('".$_SESSION['wpsubcomponent']."','".$_SESSION['organization']."','".$_SESSION['intervention']."','".$_SESSION['resultchain']."',this.value);return false;\" style='width:300px;'><option value=''>-All-</option>";
$yr = date(Y); $end = $yr; do{
$sel=($_SESSION['fyear']==$end)?"SELECTED":"";
$data.="<option value=\"".$end."\" ".$sel.">".$end."</option>";
$end--;} while ($end>= 2010);
              $data.="</select>
              </select></td><td><input name='search' type='button' value='Go' onclick=\"xajax_view_DCEDQuantitativeannualTarget(getElementById('subcomponent').value,getElementById('rchain').value,getElementById('subsector').value,getElementById('intervention').value,getElementById('year').value)\" /></td>
            </tr>
";

return $data;
}




function filter_LOPTarget(){
$classCode=5;
/* $_SESSION['indicator_type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output; */
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='2'></td>
    <td width='' scope='col' colspan=19><label>
      <div style='float:right;'>";
	  if($_GET['action']=='Reports'){
		$data.="";
		}else {
	   $data.="<input type='button' class='formButton2' id='button' name='Submit' value='New Entry' onclick=\"xajax_new_LOPTarget('','','','');return false;\" /> |";
	   }
       $data.="<a href='export_to_excel_word.php?linkvar=Export LOP Targets&&type_of_indicator=".$_SESSION['indicator_Type']."&outcome=".$_SESSION['subcomponent_id']."&&output=".$_SESSION['output']."&&format=excel'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Export To Excel' />
	   </a>|
       <a href='print_version2.php?linkvar=Print LOP Targets&&type_of_indicator=".$_SESSION['indicator_Type']."&outcome=".$_SESSION['subcomponent_id']."&&output=".$_SESSION['output']."&&format=print' target='_blank'> 
	   <input type='button' class='formButton2'   id='button' name='Submit' value='Print version' />
	   </a> </td>
</tr>
	"; $data.="<tr class='evenrow'>   
              <td colspan=2>Project Year:</td><td colspan='19' >
			  <select name='fyear' id='fyear'  onChange=\"xajax_ViewLOPTargets('".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output']."','".$_SESSION['indicator']."',this.value,1,20);return false;\"
			  
			   class='combobox' ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($_SESSION['fyear']);
              $data.="</select></td> 
		
            </tr>";
	$data.="
 <tr class='evenrow'>
              <td colspan='2'>Indicator Type:
                <label></label></td>
              <td colspan='19'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_ViewLOPTargets(this.value,'".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','','',1,20);return false;\">
			  <option value='' >-All-</option>";
		 
	  $query=mysql_query("select * from tbl_lookup where classCode='".$classCode."'  group by codeName order by codeName asc ")or die(http("FLTR-198"));
	  while($row=mysql_fetch_array($query)){
	 $select=($_SESSION['indicator_Type']==$row['codeName'])?"SELECTED":"";
	 
	  $data.="<option value=\"".$row['codeName']."\" ".$select.">".$row['codeName']." </option>
        ";
	  }
					
				
					  $data.="</select></td>
            </tr>";
			  
$data.="<tr class='evenrow'>
              <td colspan='2'>Output:</td>
              <td colspan='19'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_ViewLOPTargets('".$_SESSION['indicator_Type']."',this.value,'".$_SESSION['output_id']."','','',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
//ViewAnnualTargets($indicator_type,$subcomponent,$output,$indicator,$year)
$selected=($_SESSION['subcomponent_id']==$row['subcomponent_id'])?"SELECTED":"";
$data.="<option value=\"".$row['subcomponent_id']."\" ".$selected.">".$row['subcomponent_code']." ".$row['subcomponent']."</option>";
				
					  }  
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='2'>Activity:</td>
              <td colspan='7'><select name='output' class='combobox'  id='output' onChange=\"xajax_ViewLOPTargets('".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."',this.value,'','',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
$query=mysql_query("select * from tbl_output where subprog_id like '".$_SESSION['subcomponent_id']."%' order by output_code asc")or die(http(724));
while($row=mysql_fetch_array($query)){
$sel=($_SESSION['output']==$row['output_id'])?"SELECTED":"";
//checkExistance($row['output_id'],$_SESSION['output'],'selected')
$data.="<option value=\"".$row['output_id']."\"  ".$sel.">".$row['output_code']." ".$row['output_name']."</option>";
				
					  }  
$data.="</select></td><td colspan='12'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_ViewLOPTargets(getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,'','',1,20);return false;\" /></td>
        </tr>";

return $data;
}


function filter_annualTarget_2($fnctName){
$classCode=5;
$data.="
<tr class='evenrow' >
    <td scope='col' class=green_field colspan='3'></td>
    <td width='' scope='col' colspan=14><label>";
      $data.=ExportManager::ExportData("AnnualTargets");
   $data.=" </label></td>
  </tr>";
	
	$data.="
 <tr class='evenrow'>
              <td colspan='3'>Region:
                <label></label></td>
              <td colspan='15'><select name='zone' id='zone'  class='combobox'
			  onChange=\"xajax_$fnctName(this.value,'".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\"   >
			  <option value='' >-All-</option>";
		 		$data.=QueryManager::ZoneFilter($_SESSION['zoneID']);		
				
					  $data.="</select></td>
					  <!-- <td colspan='1'>District:
                <label></label></td>
              <td colspan='11'><select name='district' id='district' disabled='disabled' style='width:230px;'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."',this.value,'".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\" >
			  <option value='' >-All-</option>";
		$data.=QueryManager::DistrictFilter($_SESSION['zoneID'],$_SESSION['districtID']);
	  
					
				
					  $data.="</select></td>-->
					  
            </tr>";
	
	$data.="
 <tr class='evenrow'>
              <td colspan='3'>Indicator Type:
                <label></label></td>
              <td colspan='14'><select name='indicator_type' id='indicator_type' class='combobox' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."',this.value,'".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\" >
			  <option value='' >-All-</option>";
		 
					$data.=QueryManager::IndicatorTypeFilter($_SESSION['indicator_Type']);
					//$data.=QueryManager::DistrictFilter($_SESSION['zone'],$_SESSION['districtID']);
					  $data.="</select></td>
            </tr>";
			  
$data.="<tr class='evenrow'>
              <td colspan='3'>Output:</td>
              <td colspan='14'><select name='subcomponent' class='combobox' id='subcomponent' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."',this.value,'".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\"  >";
$data.="<option value=''>-All-</option>"; 
			$data.=QueryManager::OutcomeFilter($_SESSION['subcomponent_id']);
$data.="</select></td>
        </tr>";
		$data.="<tr class='evenrow'>
              <td colspan='3'>Activity:</td>
              <td colspan='14'><select name='output' class='combobox'  id='output'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."',this.value,'".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\">";
$data.="<option value=''>-All-</option>"; 
		$data.=QueryManager::OutputFilter($_SESSION['subcomponent_id'],$_SESSION['output_id']);
$data.="</select></td>
        </tr>";
		
		$data.="<tr class='display_none'>
              <td colspan='3'>Indicator Code:</td>
              <td colspan='3'><input name='indicator_code' type='text' size='30'  onKeyup=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."',this.value,'".$_SESSION['indicator']."',1,20);return false;\" /></td>
			  <td colspan='1'>Indicator:</td>
              <td colspan='10'><input name='indicator' type='text' size='35' onKeyup=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."','".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."',this.value,1,20);return false;\" /></td>
        </tr>";
	          
           $data.="<tr class=evenrow>
              <td colspan=3>Project Year:</td><td colspan='3' >
			  <select name='fyear' id='fyear' style='width:200px;' onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."',this.value,'".$_SESSION['semiAnnual']."','".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\"   ><option value=''>-All-</option>";
				$data.=QueryManager::FinancialYearFilter($_SESSION['fyear']);
              $data.="</select></td>
			  
			   <td colspan='1'>RP/Season:</td><td colspan='7' >
			  <select name='quarter' id='quarter'  onChange=\"xajax_$fnctName('".$_SESSION['zoneID']."','".$_SESSION['districtID']."','".$_SESSION['indicator_Type']."','".$_SESSION['subcomponent_id']."','".$_SESSION['output_id']."','".$_SESSION['fyear']."',this.value,'".$_SESSION['indicatorCode']."','".$_SESSION['indicator']."',1,20);return false;\" style='width:200px;' ><option value=''>-All-</option>";
				$data.=QueryManager::ReportingPeriodFilter($_SESSION['semiAnnual']);
              $data.="</select></td> 
		<td colspan='7'><input name='search' type='button' class='formButton2'   id='button' value='Go'  onclick=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\"
		
		onKeyUp=\"xajax_$fnctName(getElementById('zone').value,getElementById('district').value,getElementById('indicator_type').value,getElementById('subcomponent').value,getElementById('output').value,getElementById('fyear').value,getElementById('quarter').value,getElementById('indicator_code').value,getElementById('indicator').value,1,20);return false;\" 
		
		
		 /></td>
            </tr>
";

return $data;

}


?>