
<?php
ini_set('memory_limit', '500M');
require_once('connections/lib_connect.php');
require_once('connections/lib_connectExtended.php');



if($_GET['linkvar']=="Export LogicalFramework"){
view_all($_GET['linkvar'],$_GET['format']);
}

if($_GET['linkvar']=="print_projectDetails"){
view_projectdetails($_GET['id'],$_GET['linkvar']);
}

elseif($_GET['linkvar']=="Export LogicalFramework"){
view_all($_GET['linkvar'],$_GET['format']);
}
if($_GET['linkvar']=="Print LOP Targets"){
exportLOPTargets($_GET['linkvar'],$_GET['type_of_indicator'],$_GET['outcome'],$_GET['output'],$_GET['format']);

}

if($_GET['linkvar']=="Export LOP Targets"){
exportLOPTargets($_GET['linkvar'],$_GET['type_of_indicator'],$_GET['outcome'],$_GET['output'],$_GET['format']);

}
else if($_GET['linkvar']=="Export Annual Workplan"){

ViewAnnualTargets($_GET['format']);

}
else if($_GET['linkvar']=="Print Annual Workplan"){

ViewAnnualTargets($_GET['format']);

}
else if($_GET['linkvar']=="Export Farmers Production Records"){
view_FarmersProductionRecords($_GET['organization'],$_GET['format']);

}
//sampled form7 by Apollo
else if($_GET['linkvar']=="Export Sampled Form7"){
view_SampledForm7($_GET['tbl_tradersId'],$_GET['tbl_villageAgentId'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}else if($_GET['linkvar']=="Print Sampled Form7"){
view_SampledForm7($_GET['tbl_tradersId'],$_GET['tbl_villageAgentId'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}

//Farmer Lists
else if($_GET['linkvar']=="Export Farmer List"){
view_farmerList($_GET['tbl_villageAgentId'],$_GET['format']);

}else if($_GET['linkvar']=="Print Export Farmer List"){
view_farmerList($_GET['tbl_villageAgentId'],$_GET['format']);

}



else if($_GET['linkvar']=="Print Farmers Production Records"){
view_FarmersProductionRecords($_GET['organization'],$_GET['format']);
}
else if($_GET['linkvar']=="Export Training Participants"){
view_TrainingParticipants($_GET['organization'],$_GET['quarter'],$_GET['year'],$_GET['format']);
}


#------------------------start of Asiimwe CPM exports_to_excel_word-----------------------

//Print Farmers
else if($_GET['linkvar']=="Export farmers"){
view_vAfarmer($_GET['vAgentId'],$_GET['format']);
}

else if($_GET['linkvar']=="Print farmers"){
view_vAfarmer($_GET['vAgentId'],$_GET['format']);

}



//pick the village Agents
else if($_GET['linkvar']=="Export Village Agent"){
setup_villageAgent($_GET['semi_annual'],$_GET['year'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Village Agent"){
setup_villageAgent($_GET['semi_annual'],$_GET['year'],$_GET['format']);

}


//FAQ
else if($_GET['linkvar']=="Export FAQ"){
    view_faqs($_GET['format']);


}

else if($_GET['linkvar']=="Print FAQ"){
    view_faqs($_GET['format']);

}


//Enterprise Adoption technology Form2
else if($_GET['linkvar']=="Export Enterprise Technology Adoption"){
view_enterpriseTechAdoption($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['trName'],$_GET['trCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Enterprise Technology Adoption"){
view_enterpriseTechAdoption($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['trName'],$_GET['trCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//Enterprise Adoption technology Form2
else if($_GET['linkvar']=="Export Labour Saving Technology"){
view_labourSavingTech($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Labour Saving Technology"){
view_labourSavingTech($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//bds Form2
else if($_GET['linkvar']=="Export business development services"){
view_bds($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print business development services"){
view_bds($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//bds Media Programs form2
else if($_GET['linkvar']=="Export Media Programs"){
view_mediaPrograms($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['mediaType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Media Programs"){
view_mediaPrograms($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['mediaType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//bds Youth Apprentice
else if($_GET['linkvar']=="Export Youth Apprenticeships"){
view_youthApprentice($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Youth Apprenticeships"){
view_youthApprentice($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//bds Bank Loans
else if($_GET['linkvar']=="Export Bank Loans"){
view_bankLoans($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Bank Loans"){
view_bankLoans($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}

// Input Sales
else if($_GET['linkvar']=="Export Input Sales"){
view_inputSales($_GET['reporting_period'],$_GET['cpma_year'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Input Sales"){
view_inputSales($_GET['reporting_period'],$_GET['cpma_year'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}
//PHH
else if($_GET['linkvar']=="Export PHH"){
view_phh($_GET['reporting_period'],$_GET['cpma_year'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print PHH"){
view_phh($_GET['reporting_period'],$_GET['cpma_year'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}

//view_partnerships

//bds Bank Loans
else if($_GET['linkvar']=="Export Public Private Partnerships"){
view_partnerships($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Public Private Partnerships"){
view_partnerships($_GET['reporting_period'],$_GET['cpma_year'],$_GET['valueChain'],$_GET['partnerType'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//view_form3
else if($_GET['linkvar']=="Export EXPORTER AND PROCESSOR DATA DETAILS"){
view_form3($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['exName'],$_GET['exCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print EXPORTER AND PROCESSOR DATA DETAILS"){
view_form3($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['exName'],$_GET['exCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


//view_form4
else if($_GET['linkvar']=="Export TRADER DATA DETAILS"){
view_form4($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['trName'],$_GET['trCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}

else if($_GET['linkvar']=="Print TRADER DATA DETAILS"){
view_form4($_GET['region'],$_GET['reporting_period'],$_GET['cpma_year'],$_GET['trName'],$_GET['trCode'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}


//view_partners Inventory Traders
else if($_GET['linkvar']=="Export Traders Data"){
setup_trader($_GET['semi_annual'],$_GET['year'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Traders Data"){
setup_trader($_GET['semi_annual'],$_GET['year'],$_GET['format']);

}

//view_report on VAs and their farmer counts
else if($_GET['linkvar']=="Export Traders VAs Farmer Count"){
tradersVasFarmerCount($_GET['tr_id'],$_GET['tr_code'],$_GET['va_region'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Traders VAs Farmer Count"){
tradersVasFarmerCount($_GET['tr_id'],$_GET['tr_code'],$_GET['va_region'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}

//view_report on VAs and their farmer counts
else if($_GET['linkvar']=="Export XtraFormAnalysis"){
xtraFormAnalysis($_GET['semi_annual'],$_GET['year'],$_GET['format']);


}

else if($_GET['linkvar']=="Print XtraFormAnalysis"){
xtraFormAnalysis($_GET['semi_annual'],$_GET['year'],$_GET['format']);

}

//view_partners Inventory Exporter
else if($_GET['linkvar']=="Export Exporter"){
setup_exporter($_GET['semi_annual'],$_GET['year'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Exporter"){
setup_exporter($_GET['semi_annual'],$_GET['year'],$_GET['format']);

}


//view_form5
else if($_GET['linkvar']=="Export VILLAGE AGENT DATA"){
view_form5($_GET['semi_annual'],$_GET['year'],$_GET['format']);


}

else if($_GET['linkvar']=="Print VILLAGE AGENT DATA"){
view_form5($_GET['semi_annual'],$_GET['year'],$_GET['format']);

}

//training

//training Training

else if($_GET['linkvar']=="Export Training"){
//view_training($_GET['semi_annual'],$_GET['year'],$_GET['format']);
view_training($_GET['technicalArea'],$_GET['trainingFocus'],$_GET['location'],$_GET['fromDate'],$_GET['toDate'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);


}

else if($_GET['linkvar']=="Print Training"){
view_training($_GET['technicalArea'],$_GET['trainingFocus'],$_GET['location'],$_GET['fromDate'],$_GET['toDate'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}


else if($_GET['linkvar']=="Print DEMO DATA"){
view_form8($_GET['semi_annual'],$_GET['year'],$_GET['format']);
}
else if($_GET['linkvar']=="Export DEMO DATA"){
view_form8($_GET['semi_annual'],$_GET['year'],$_GET['format']);
}

//start QUERY analyzer
else if($_GET['linkvar']=="Print QueryAnalyzer"){
qAnalyzer_results($_GET['dataForms'],$_GET['dataSets'],$_GET['condition'],$_GET['searchValueOne'],$_GET['searchValueTwo'],$_GET['searchValueThree'],$_GET['searchValueFour'],$_GET['offsetLimit'],$_GET['countLimit'],$_GET['oder'],$_GET['dateOne'],$_GET['dateTwo'],$_GET['format']);
}
else if($_GET['linkvar']=="Export QueryAnalyzer"){
qAnalyzer_results($_GET['dataForms'],$_GET['dataSets'],$_GET['condition'],$_GET['searchValueOne'],$_GET['searchValueTwo'],$_GET['searchValueThree'],$_GET['searchValueFour'],$_GET['offsetLimit'],$_GET['countLimit'],$_GET['oder'],$_GET['dateOne'],$_GET['dateTwo'],$_GET['format']);
}
//end QUERY analyzer

else if($_GET['linkvar']=="Print GROUP REGISTER"){
view_form7($_GET['trader'],$_GET['village_agent'],$_GET['cpma_year'],$_GET['reporting_period'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);

}
else if($_GET['linkvar']=="Export GROUP REGISTER"){
view_form7($_GET['trader'],$_GET['village_agent'],$_GET['cpma_year'],$_GET['reporting_period'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}

//Form 6

else if($_GET['linkvar']=="Print Household Data"){
view_form6($_GET['semi_annual'],$_GET['year'],$_GET['format']);
}
else if($_GET['linkvar']=="Export Household Data"){
view_form6($_GET['semi_annual'],$_GET['year'],$_GET['format']);
}

else if($_GET['linkvar']=="Print Survey Data"){
view_frm6Survey($_GET['dsName'],$_GET['hsName'],$_GET['fromDate'],$_GET['toDate'],$_GET['sPeriod'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}
else if($_GET['linkvar']=="Export Survey Data"){
view_frm6Survey($_GET['dsName'],$_GET['hsName'],$_GET['fromDate'],$_GET['toDate'],$_GET['sPeriod'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}

else if($_GET['linkvar']=="Print Data Fact Sheet"){
view_dataFactSheet($_GET['tYr1'],$_GET['tYr2'],$_GET['tYr3'],$_GET['tYr4'],$_GET['tYr5'],$_GET['tYr6'],$_GET['indicatorId'],$_GET['format']);
}
else if($_GET['linkvar']=="Export Data Fact Sheet"){
view_dataFactSheet($_GET['tYr1'],$_GET['tYr2'],$_GET['tYr3'],$_GET['tYr4'],$_GET['tYr5'],$_GET['tYr6'],$_GET['indicatorId'],$_GET['format']);
}



#---------------------------End of Asiimwe CPM exports_to_excel_word-----------------------



else if($_GET['linkvar']=="Print Training Participants"){

view_TrainingParticipants($_GET['organization'],$_GET['quarter'],$_GET['year'],$_GET['format']);
}

else if($_GET['linkvar']=="Print Organization"){

export_organization($_GET['linkvar'],$_GET['districtName'],$_GET['orgtype'],$_GET['orgName'],$_GET['subcounty'],$_GET['parish'],$_GET['format']);


}

else if($_GET['linkvar']=="Export Organization"){

export_organization($_GET['linkvar'],$_GET['districtName'],$_GET['orgtype'],$_GET['orgName'],$_GET['subcounty'],$_GET['parish'],$_GET['format']);


}

else if($_GET['linkvar']=='print_orgDetails'){

view_allorganizations($_GET['org_code'],$_GET['format']);

}
else if($_GET['linkvar']=="Export User"){
export_user($_GET['linkvar'],$_GET['name'],$_GET['username'],$_GET['usergroup'],$_GET['role'],$_GET['format']);


}
else if($_GET['linkvar']=="Export System Logins"){

export_login($_GET['linkvar'],$_GET['login_id'],$_GET['username'],$_GET['ipaddress'],$_GET['status'],$_GET['format']);

}
else if($_GET['linkvar']=="Export User Comments"){


export_userComments($_GET['linkvar'],$_GET['user'],$_GET['format']);
}

else if($_GET['linkvar']=='Export Zonal Mapping'){

export_zonalMapping($_GET['linkvar'],$_GET['zone'],$_GET['tso'],$_GET['format']);
}
else if($_GET['linkvar']=='Export OVC Per District'){

ovc_per_district_per_category($_GET['linkvar'],$_GET['district'],$_GET['subcounty'],$_GET['parish'],$_GET['format']); 

}
else if($_GET['linkvar']=='Export Narrative Report'){

view_NarrativequalitativeReport($_GET['narrative_id'],$_GET['quarter'],$_GET['org_code'],$_GET['year'],$_GET['format']);

}
else if($_GET['linkvar']=='Print Narrative Report'){

view_NarrativequalitativeReport($_GET['narrative_id'],$_GET['quarter'],$_GET['org_code'],$_GET['year'],$_GET['format']);


}
else if($_GET['linkvar']=="Export Home"){
export_home($_GET['linkvar'],$_GET['head'],$_GET['format']);


}

else if($_GET['linkvar']=='Export District'){

export_district($_GET['linkvar'],$_GET['district'],$_GET['zone'],$_GET['format']);

}
else if($_GET['linkvar']=='Export Subcounty'){

export_subcounty($_GET['linkvar'],$_GET['district'],$_GET['zone'],$_GET['subcounty'],$_GET['format']);
}
else if($_GET['linkvar']=='Export Parish'){

export_parish($_GET['linkvar'],$_GET['district'],$_GET['zone'],$_GET['subcounty'],$_GET['parish'],$_GET['format']);

}

else if($_GET['linkvar']=='Export Annual Actuals'){
view_AnnualResults($_GET['responsible'],$_GET['format']);

}

else if($_GET['linkvar']=='Print Annual Actuals'){
view_AnnualResults($_GET['responsible'],$_GET['format']);

}

else if($_GET['linkvar']=='Export Project'){

 view_project($_GET['linkvar'],$_GET['program'],$_GET['project'],$_GET['organization'],$_GET['status'],$_GET['format']);

}
else if($_GET['linkvar']=='Export CARP PMP Indicator Tracker'){
view_CARPPMPIndicatorTracker($_GET['type_of_indicator'],$_GET['outcome'],$_GET['output'],$_GET['year'],$_GET['format']);


}
else if($_GET['linkvar']=='Print CARP PMP Indicator Tracker'){

view_CARPPMPIndicatorTracker($_GET['type_of_indicator'],$_GET['outcome'],$_GET['output'],$_GET['year'],$_GET['format']);
}

else if($_GET['linkvar']=='Export ParticipatingfarmersbyproducerOrganization'){

view_ParticipatingfarmersbyproducerOrganization($_GET['orgName'],$_GET['orgtype'],$_GET['farmerName'],$_GET['districtName'],$_GET['subcounty'],$_GET['parish'],$_GET['leadfarmer'],$_GET['gender'],$_GET['format']);
}
else if($_GET['linkvar']=='Print ParticipatingfarmersbyproducerOrganization'){

view_ParticipatingfarmersbyproducerOrganization($_GET['orgName'],$_GET['orgtype'],$_GET['farmerName'],$_GET['districtName'],$_GET['subcounty'],$_GET['parish'],$_GET['leadfarmer'],$_GET['gender'],$_GET['format']);
}

else if($_GET['linkvar']=='Export Farmers Production Records Report'){

view_FarmersProductionRecordsReport($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Print Farmers Production Records Report'){

view_FarmersProductionRecordsReport($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}


else if($_GET['linkvar']=='Export FarmersNotBurningCropResidues'){

view_FarmersNotBurningCropResidues($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Print FarmersNotBurningCropResidues'){

view_FarmersNotBurningCropResidues($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Export FarmersUsingHerbicides'){

view_FarmersUsingHerbicides($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Print FarmersUsingHerbicides'){

view_FarmersUsingHerbicides($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Export YieldsPerCrop'){

YieldsPerCrop($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Print YieldsPerCrop'){

YieldsPerCrop($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}


else if($_GET['linkvar']=='Export Number of farmers and area under adoption'){

view_NumberofFarmersandAreaunderAdoption($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Print Number of farmers and area under adoption'){

view_NumberofFarmersandAreaunderAdoption($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}
else if($_GET['linkvar']=='Export Participants per Training Area'){

view_ParticipantsperTrainingArea($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}

else if($_GET['linkvar']=='Print Participants per Training Area'){

view_ParticipantsperTrainingArea($_GET['year'],$_GET['quarter'],$_GET['district'],$_GET['format']);
}


else if($_GET['linkvar']=='Export CFTechnical Training'){

ViewCFTechnicalTrainingActivities($_GET['format']);
}

else if($_GET['linkvar']=='Print CFTechnical Training'){
ViewCFTechnicalTrainingActivities($_GET['format']);

}
else if($_GET['linkvar']=='Export OtherTrainingActivities'){

ViewOtherTrainingActivities($_GET['format']);
}

else if($_GET['linkvar']=='Print OtherTrainingActivities'){
ViewOtherTrainingActivities($_GET['format']);

}
else if($_GET['linkvar']=='Export SemiAnnualPerfomanceReport'){
ViewSemiAnnualPerfomanceReport($_GET['fyear'],$_GET['semiAnnual'],$_GET['format']);


}
else if($_GET['linkvar']=='Print SemiAnnualPerfomanceReport'){
ViewSemiAnnualPerfomanceReport($_GET['fyear'],$_GET['semiAnnual'],$_GET['format']);

}
elseif($_GET['linkvar']=='Export ViewAnnualPerfomanceReport'){
ViewAnnualPerfomanceReport($_GET['fyear'],$_GET['semiAnnual'],$_GET['format']);

}
elseif($_GET['linkvar']=='Print ViewAnnualPerfomanceReport'){
ViewAnnualPerfomanceReport($_GET['fyear'],$_GET['semiAnnual'],$_GET['format']);

}

elseif($_GET['linkvar']=='Export ViewCumulativePerfomanceReport'){
ViewCumulativePerfomanceReport($_GET['format']);

}
elseif($_GET['linkvar']=='Print ViewCumulativePerfomanceReport'){
ViewCumulativePerfomanceReport($_GET['format']);

}
elseif($_GET['linkvar']=='Export AdoptionRates'){
ViewAdoptionRates($_GET['format']);

}
elseif($_GET['linkvar']=='Print AdoptionRates'){
ViewAdoptionRates($_GET['format']);

}

elseif($_GET['linkvar']=='Export FieldDaysandDemonstrations'){
ViewFieldDaysandDemonstrations($_GET['format']);

}
elseif($_GET['linkvar']=='Print FieldDaysandDemonstrations'){
ViewFieldDaysandDemonstrations($_GET['format']);

}
elseif($_GET['linkvar']=='Export Raw Data to Excel'){
exportRawDataToExcel($_GET['dataForm'],$_GET['fromDate'],$_GET['toDate'],$_GET['reportingYear'],$_GET['reportingPeriod'],$_GET['format']);

}
elseif($_GET['linkvar']=='Print Raw Data to Excel'){
exportRawDataToExcel($_GET['dataForm'],$_GET['fromDate'],$_GET['toDate'],$_GET['reportingYear'],$_GET['reportingPeriod'],$_GET['format']);

}

elseif($_GET['linkvar']=='Export MELA Report'){
    exportMelaReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
elseif($_GET['linkvar']=='Print MELA Report'){
    exportMelaReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
elseif($_GET['linkvar']=='Export IPTT Report'){
    exportIPTTReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
elseif($_GET['linkvar']=='Print IPTT Report'){
    exportIPTTReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
elseif($_GET['linkvar']=='Export Data Performance Maps Report'){
    exportPerformanceMapsReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
elseif($_GET['linkvar']=='Print Data Performance Maps Report'){
    exportPerformanceMapsReport($_GET['zone'],$_GET['district'], $_GET['indicator_type'], $_GET['subcomponent'],$_GET['output'],$_GET['year'],$_GET['semiAnnual'], $_GET['indicatorCode'],$_GET['indicator'],$_GET['format']);

}
else if($_GET['linkvar']=="ExportApr2016toSep2016SurveyData"){
view_form6_survey_four($_GET['dsName'],$_GET['hsName'],$_GET['fromDate'],$_GET['toDate'],$_GET['sPeriod'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}
else if($_GET['linkvar']=="PrintApr2016toSep2016SurveyData"){
view_form6_survey_four($_GET['dsName'],$_GET['hsName'],$_GET['fromDate'],$_GET['toDate'],$_GET['sPeriod'],$_GET['cur_page'],$_GET['records_per_page'],$_GET['format']);
}


else{
#echo "The view you selected to export is not a report....";
		
		}
#----------------------Start of asiimwe  Export functions-------------
function view_form6_survey_four($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page,$records_per_page,$format){
$qmobj= new QueryManager('');
$f6obj = new Form6DataValidationManager('');
$n=1;
$inc=1;

$_SESSION['dsName']=$dsName;
$_SESSION['hsName']=$hsName;
$_SESSION['fromDate']=$fromDate;
$_SESSION['toDate']=$toDate;
$_SESSION['speriod']=$speriod;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$dsName=($_SESSION['dsName']<>''?$_SESSION['dsName']:$dsName);
$hsName=($_SESSION['hsName']<>''?$_SESSION['hsName']:$hsName);
$fromDate=($_SESSION['fromDate']<>''?$_SESSION['fromDate']:$fromDate);
$toDate=($_SESSION['toDate']<>''?$_SESSION['toDate']:$toDate);
$speriod=($_SESSION['speriod']<>''?$_SESSION['speriod']:$speriod);



$data.="<table class='data-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";

    $data.="<tr class='evenrow'>
      <th colspan='46' align='left'>Commodity Production And Marketing Activity FORM 6 SURVEY DATA</th>
    </tr>";

    //===================data to be displayed=====================
    $data.="<tr>
      <th class='first-cell-header'  rowspan='3' >#</th>
      <th  rowspan='3' >Region</th>
      <th  rowspan='3' >District</th>
      <th  rowspan='3' >Subcounty</th>
      <th  rowspan='3' >Farmer Code</th>
      <th  rowspan='3' >Sampled Farmer Name</th>
      <th  rowspan='3' >Respondent</th>
      <th  rowspan='3' >Compiled By</th>
      <th  rowspan='3' >Surveyor's Tel</th>
      <th  rowspan='3' >Date Surveyed</th>
      <th  colspan='12' >Maize</th>
      <th  colspan='12' >Beans</th>
      <th  colspan='12' >Coffee</th>
      
    </tr>
      
    <tr>
      <th colspan='2' >Area (Acre)</th>
      <th colspan='2' >Value of inputs (UGX)</th>
      <th colspan='2' >Total yield<br />
       (Kg)</th>
      <th  colspan='2'>Volume sold<br />
       (Kg)</th>
       <th  colspan='2'>Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
      <th  colspan='2'>Area (Acre)
      
      </th>
      <th  colspan='2'>Value of inputs (UGX)</th>
      <th  colspan='2'>Total yield<br />
       (Kg)</th>
      <th colspan='2' >Volume sold<br />
       (Kg)</th>
       <th colspan='2' >Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
      <th colspan='2' >Area (Acre)</th>
      <th  colspan='2'>Value of inputs (UGX)</th>
      <th  colspan='2'>Total yield<br />
       (Kg)</th>
      <th  colspan='2'>Volume sold<br />
       (Kg)</th>
       <th colspan='2' >Common price<br />
       (UGX)</th>
      <th  colspan='2'>Volume lost in PHH<br />
       (Kg)</th>
    </tr>
    <tr >
    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>

    <th >season 1</th>
    <th >Season 2</th>


    </tr>


    ";
      
      
        



    //$query_string_farmers="select tbl_farmersId FROM `tbl_farmers` limit 1,20";

    

    /* $obj->alert($query_string); */


  //  $query_=mysql_query($query_string_farmers)or die(mysql_error());
    /**************
    *paging parameters
    *
    ****/
    //while($row=mysql_fetch_array($query_)){
      $query_string="select p . * ,z.zoneName
      FROM `tbl_form6_survey_data` as `p`
      left  join tbl_zone z on(z.zoneCode = p.ans_23)
      ";

    //$obj->alert($query_string);

    
      
      $new_query=mysql_query($query_string) or die(mysql_error());
      $n=1;
      while($rowh=mysql_fetch_array($new_query)){

      
      $data.="<tr>";
      $data.="<td>".$n.".";
          
        $data.="</td>";
        
         $data.="<td>".$rowh['zoneName']."</td>";
         $data.="<td>".$rowh['ans_24']."</td>";
         $data.="<td>".$rowh['ans_25']."</td>";
         $data.="<td>".$rowh['ans_18']."</td>";
         $data.="<td>".$rowh['ans_17']."</td>";
         $data.="<td>".$rowh['ans_16']."</td>";
         $data.="<td>".$rowh['ans_8']."</td>";
         $data.="<td>".$rowh['ans_7']."</td>";
         $data.="<td>".$rowh['ans_1']."</td>";

        // #maize data.......

         $data.="<td>".$rowh['ans_121']."</td>";
         $data.="<td>".$rowh['ans_129']."</td>";

        $inputseasonA=((intval($rowh['ans_270'])*intval($rowh['ans_281'])) + (intval($rowh['ans_271'])*intval($rowh['ans_282'])) 
          +(intval($rowh['ans_272'])*intval($rowh['ans_283']))+(intval($rowh['ans_273'])*intval($rowh['ans_284']))+(intval($rowh['ans_274']*intval($rowh['ans_285'])))
          +(intval($rowh['ans_275'])*intval($rowh['ans_286']))+(intval($rowh['ans_276'])*intval($rowh['ans_287']))+(intval($rowh['ans_277'])*intval($rowh['ans_288']))
          +(intval($rowh['ans_278'])*intval($rowh['ans_289']))+(intval($rowh['ans_279'])*intval($rowh['ans_290']))
          +(intval($rowh['ans_280'])*intval($rowh['ans_291']))
          );
        $inputseasonB=((intval($rowh['ans_315'])*intval($rowh['ans_326'])) + (intval($rowh['ans_316'])*intval($rowh['ans_327'])) 
          +(intval($rowh['ans_317'])*intval($rowh['ans_328']))+(intval($rowh['ans_318'])*intval($rowh['ans_329']))+(intval($rowh['ans_319']*intval($rowh['ans_330'])))
          +(intval($rowh['ans_320'])*intval($rowh['ans_331']))+(intval($rowh['ans_321'])*intval($rowh['ans_332']))+(intval($rowh['ans_322'])*intval($rowh['ans_333']))+
          (intval($rowh['ans_323'])*intval($rowh['ans_334']))+(intval($rowh['ans_324'])*intval($rowh['ans_335']))
          +(intval($rowh['ans_325'])*intval($rowh['ans_336']))
          );

          $data.="<td>".$inputseasonA."</td>";
          $data.="<td>".$inputseasonB."</td>";

         $data.="<td>".$rowh['ans_124']."</td>";
         $data.="<td>".$rowh['ans_131']."</td>";

         $data.="<td>".$rowh['ans_125']."</td>";
         $data.="<td>".$rowh['ans_132']."</td>";

         $data.="<td>".$rowh['ans_126']."</td>";
         $data.="<td>".$rowh['ans_133']."</td>";

         $data.="<td>".$rowh['ans_410']."</td>";
         $data.="<td>".$rowh['ans_477']."</td>";


        // //beans data........

         $data.="<td>".$rowh['ans_590']."</td>";
         $data.="<td>".$rowh['ans_598']."</td>";

        $inputseasonS1Beans=((intval($rowh['ans_739'])*intval($rowh['ans_750'])) + (intval($rowh['ans_740'])*intval($rowh['ans_751'])) 
          +(intval($rowh['ans_741'])*intval($rowh['ans_752']))+(intval($rowh['ans_742'])*intval($rowh['ans_753']))+(intval($rowh['ans_743']*intval($rowh['ans_754'])))
          +(intval($rowh['ans_744'])*intval($rowh['ans_755']))+(intval($rowh['ans_745'])*intval($rowh['ans_756']))+(intval($rowh['ans_746'])*intval($rowh['ans_757']))+
          (intval($rowh['ans_747'])*intval($rowh['ans_758']))+(intval($rowh['ans_748'])*intval($rowh['ans_759']))
          +(intval($rowh['ans_749'])*intval($rowh['ans_760']))
          );
        $inputseasonS2Beans=((intval($rowh['ans_784'])*intval($rowh['ans_795'])) + (intval($rowh['ans_785'])*intval($rowh['ans_796'])) 
          +(intval($rowh['ans_786'])*intval($rowh['ans_797']))+(intval($rowh['ans_787'])*intval($rowh['ans_798']))+(intval($rowh['ans_788']*intval($rowh['ans_799'])))
          +(intval($rowh['ans_789'])*intval($rowh['ans_800']))+(intval($rowh['ans_790'])*intval($rowh['ans_801']))+(intval($rowh['ans_791'])*intval($rowh['ans_802']))+
          (intval($rowh['ans_792'])*intval($rowh['ans_803']))+(intval($rowh['ans_793'])*intval($rowh['ans_804']))
          +(intval($rowh['ans_794'])*intval($rowh['ans_805']))
          );

          $data.="<td> ".$inputseasonS1Beans."</td>";
          $data.="<td>".$inputseasonS2Beans."</td>";

         $data.="<td>".$rowh['ans_593']."</td>";
         $data.="<td>".$rowh['ans_600']."</td>";

         $data.="<td>".$rowh['ans_594']."</td>";
         $data.="<td>".$rowh['ans_601']."</td>";

         $data.="<td>".$rowh['ans_595']."</td>";
         $data.="<td>".$rowh['ans_602']."</td>";

         $data.="<td>".$rowh['ans_879']."</td>";
         $data.="<td>".$rowh['ans_946']."</td>";



        // //coffee data......

         $data.="<td>".$rowh['ans_1062']."</td>";
         $data.="<td>".$rowh['ans_1070']."</td>";

        $inputseasonS1coffee=((intval($rowh['ans_1211'])*intval($rowh['ans_1222'])) + (intval($rowh['ans_1212'])*intval($rowh['ans_1223'])) 
          +(intval($rowh['ans_1213'])*intval($rowh['ans_1224']))+(intval($rowh['ans_1214'])*intval($rowh['ans_1225']))+(intval($rowh['ans_1215']*intval($rowh['ans_1226'])))
          +(intval($rowh['ans_1216'])*intval($rowh['ans_1227']))+(intval($rowh['ans_1217'])*intval($rowh['ans_1228']))+(intval($rowh['ans_1218'])*intval($rowh['ans_1229']))+
          (intval($rowh['ans_1219'])*intval($rowh['ans_1230']))+(intval($rowh['ans_1220'])*intval($rowh['ans_1231']))
          +(intval($rowh['ans_1232'])*intval($rowh['ans_1160']))
          );


        $inputseasonS2coffee=((intval($rowh['ans_1256'])*intval($rowh['ans_1267'])) + (intval($rowh['ans_1257'])*intval($rowh['ans_1268'])) 
          +(intval($rowh['ans_1258'])*intval($rowh['ans_1269']))+(intval($rowh['ans_1259'])*intval($rowh['ans_1270']))+(intval($rowh['ans_1260']*intval($rowh['ans_1271'])))
          +(intval($rowh['ans_1261'])*intval($rowh['ans_1272']))+(intval($rowh['ans_1262'])*intval($rowh['ans_1273']))+(intval($rowh['ans_1263'])*intval($rowh['ans_1274']))+
          (intval($rowh['ans_1264'])*intval($rowh['ans_1275']))+(intval($rowh['ans_1265'])*intval($rowh['ans_1276']))
          +(intval($rowh['ans_1266'])*intval($rowh['ans_1277']))
          );

         $data.="<td>".$inputseasonS1coffee."</td>";
         $data.="<td>".$inputseasonS2coffee."</td>";

         $data.="<td>".$rowh['ans_1065']."</td>";
         $data.="<td>".$rowh['ans_1072']."</td>";

         $data.="<td>".$rowh['ans_1066']."</td>";
         $data.="<td>".$rowh['ans_1073']."</td>";

         $data.="<td>".$rowh['ans_1067']."</td>";
         $data.="<td>".$rowh['ans_1074']."</td>";

         $data.="<td>".$rowh['ans_1351']."</td>";
         $data.="<td>".$rowh['ans_1418']."</td>";

      $n++;
    }
    

//====================end of displayed data===================
/*
*display pages
*/
$data.="</table>";

export($format,$data);

}


function exportPerformanceMapsReport ($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator,$format)
{
    
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    $umobj = new umemsDataMining('');
    $imobj = new IndDissagDataMining('');
    $tmobj = new IndDissagTargets('');

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

    $data = '';

    $data .= "<table cellspacing='1' cellpadding='1' border='1' id='report' width='100%' >";

    //start of report retrieval
   $data .= "<tr><th rowspan='3' class='first-cell-header dataRow' >#</th>
			 <th rowspan=3 colspan='6' class='largest-cell-header dataRow'>Indicator</th>
		<th colspan='30' class='small-cell-header dataRow' >
		Data Performance Maps on Activity Indicator Tracking Table for the for the Period 2013 - 2018 <em>, LOA=Life of Activity, T=Target,A=Actual, % Achieved=>((A/T)x100)</em>
		</th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2' rowspan='2'  class='small-cell-header dataRow'>type of Indicator</th>
			 	<th  colspan='1' rowspan='2' class='small-cell-header dataRow'>unit of measure</th>
			   <th  class='small-cell-header  dataRow' rowspan='2'>Baseline</th>";
			   $data.="<th colspan='1'  rowspan='2'  class='small-cell-header dataRow'>LOA Targets</th>";
				$data.="<th colspan='1' rowspan='2' class='small-cell-header dataRow'>LOA Actuals</th>";
				$data.="<th colspan='1'   rowspan='2'  class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";

			   
			   
				  
					$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				    $opening_year=$queryHeader['opening_year'];
					$closure_year=$queryHeader['closure_year'];
					$one="background:#F0E68C; color:black;";
					$two="background:#f38fbf; color:black;";
					$three="background:#ccffff; color:black;";
					$four="background:#fde9d9; color:black;";
					$five="background:#ccccff; color:black;";
					$six="background:#98FB98; color:black;";
					
            		$data.="<th width='100' style='".$one."'  class='small-cell-header dataRow' align='right' colspan='3' >
					Apr ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,0)."</th>";
					
					$data.="<th width='100' style='".$two."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,0)." - Sep ".TheFinancialYear($opening_year,$closure_year,1)."</th>";
					
					$data.="<th width='100' style='".$three."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,1)." - Sep ".TheFinancialYear($opening_year,$closure_year,2)."</th>";
					
					$data.="<th width='100' style='".$four."' class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,2)." - Sep ".TheFinancialYear($opening_year,$closure_year,3)."</th>";
					
					$data.="<th width='100' style='".$five."'  class='small-cell-header dataRow' align='right' colspan='4' >
					Oct ".TheFinancialYear($opening_year,$closure_year,3)." - Sep ".TheFinancialYear($opening_year,$closure_year,4)."</th>";
					
					$data.="<th width='100' style='".$six."'  class='small-cell-header dataRow' align='right' colspan='4' >
					 Oct ".TheFinancialYear($opening_year,$closure_year,4)."   - Mar ".TheFinancialYear($opening_year,$closure_year,5)."</th>";
					
					
				   				    
				    $data.="</tr>";

$data.="<tr>";

$data.="<th style='".$one."'  width='100' class='small-cell-header dataRow' align='right'>T</th>";
$data.="<th style='".$one."'  width='100' class='small-cell-header dataRow' align='right'>A</th>";
$data.="<th style='".$one."'  colspan='1' class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";



for($n=0;$n<5;$n++){
	switch ($n){
                                    
                                    
									case 0:
                                    $bgcolor="background:#f38fbf; color:black;";
                                    break;
                                    case 1:
                                    $bgcolor="background:#ccffff; color:black;";
                                    break;
                                    case 2:
                                    $bgcolor="background:#fde9d9; color:black;";
                                    break;
                                    case 3:
                                    $bgcolor="background:#ccccff; color:black;";
                                    break;
                                    case 4:
                                    $bgcolor="background:#98FB98; color:black;"; 
									break;
									default:
									break;
                                        
                                    }
	
            		$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>T</th>";
					$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>A</th>";
					$data.="<th style='".$bgcolor."' width='100' class='small-cell-header dataRow' align='right'>Annual</th>";
					$data.="<th style='".$bgcolor."' colspan='1' class='small-cell-header dataRow'><strong>% Achieved</strong> </th>";
					
					}
$data.="</tr>
</thead>
<tbody>";					
$inc=1;

			$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http(__line__));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr style='background-color:#DCDCDC;'>
<td><strong>".$rowoutput['output_code']."</strong></td>
<td colspan='36'><strong>".$rowoutput['output_name']."</strong></td>
</tr>";


$x=$qmobj->ViewIndicatorAnnualTargets($rowoutput['output_id']);
//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http(__line__));
	if(@mysql_num_rows($query)>0)
		while($row=@mysql_fetch_array($query)){
			$div='Mapping'.$row['indicator_id'];
			$baseline=$row['baseline'];
			$base=$baseline>0?$baseline:"-";
			


			$y=$qmobj->ViewIndicatorAnnualTargetsReports($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year']);
			$qResults=Execute($y) or die(http(__line__));
			$rowWP=FetchRecords($qResults);
			$tYr1 = $rowWP['fy1'];
			$tYr2 = $rowWP['fy2'];
			$tYr3 = $rowWP['fy3'];
			$tYr4 = $rowWP['fy4'];
			$tYr5 = $rowWP['fy5'];
			$tYr6 = $rowWP['fy6'];
			
	

			$l="align=right";
		  
		 
 							$data.="<tr>
 									<td align=left>
 									
									
 									<input type='checkbox' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><input type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".retrieve_info_withSpecialCharactersNowordLimit($row['indicator_name'])."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='1'>".$row['unitofmeasure']."</td>
								
									<td align=right >".number_format($base)."</td>";
									
										
										$ActualYr1=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr1');
										$ActualYr2=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr2');
										$ActualYr3=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr3');
										$ActualYr4=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr4');
										$ActualYr5=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr5');
										$ActualYr6=$dmobj->MiningIndicator15($row['indicator_id'],$queryHeader['opening_year'],$queryHeader['closure_year'],'notrainedYr6');
															
										//$obj->alert($ActualYr1."-".$ActualYr2."-".$ActualYr3."-".$ActualYr4."-".$ActualYr5."-".$ActualYr6);
								
									
									
									
									$one="background:#F0E68C;";
									$two="background:#f38fbf;";
									$three="background:#ccffff;";
									$four="background:#fde9d9;";
									$five="background:#ccccff;";
									$six="background:#98FB98;";
									
									$percentageAcyR1=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy1'],$ActualYr1),1,1,$one);
									$percentageAcyR2=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy2'],$ActualYr2),1,1,$two);
									$percentageAcyR3=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy3'],$ActualYr3),1,1,$three);
									$percentageAcyR4=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy4'],$ActualYr4),1,1,$four);
									$percentageAcyR5=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy5'],$ActualYr5),1,1,$five);
									$percentageAcyR6=ColorCodingDataMapsBackgroud(calc_Percentage($rowWP['fy6'],$ActualYr6),1,1,$six); 
									
									
									
					$data.="<td valign='' align='right'><strong>".checkExistance($LOAT,0,'ExistsInteger')."</strong></td>
									<td align='right' >".checkExistance($LOAA,0,'ExistsInteger')."</td>";
									//$obj->alert($LOAT."-".$LOAA);
									$percentageAc=ColorCoding(calc_Percentage($LOAT,$LOAA),1);
									$data.=$percentageAc;
					
							$data.="<td align='right' style='".$one."' >";
								$data.="<input type='hidden' name='workplan_id[]' id='workplan_id' value='".$rowWP['workplan_id']."' >";
								$data.="<input type='hidden' name='region[]'   id='region' value='".$rowWP['region']."' >";
								$data.="<input type='hidden' name='curr_year[]'   id='curr_year ' value='".$rowWP['curr_year']."' >";
							$data.="".checkExistance($rowWP['fy1'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$one."' >".checkExistance($ActualYr1,0,'ExistsInteger')."</td>";
							$data.=$percentageAcyR1;
									
							$data.="<td align='right' style='".$two."' >".checkExistance($rowWP['fy2'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$two."' >".checkExistance($ActualYr2,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$two."' >-</td>";
							$data.=$percentageAcyR2;
							
							$data.="<td align='right' style='".$three."' >".checkExistance($rowWP['fy3'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$three."' >".checkExistance($ActualYr3,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$three."' >-</td>";
							$data.=$percentageAcyR3;
									
							$data.="<td align='right' style='".$four."' colspan='1'>".checkExistance($rowWP['fy4'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$four."' >".checkExistance($ActualYr4,0,'ExistsInteger')."</td>";					
							$data.="<td align='right' style='".$four."' >-</td>";
							$data.=$percentageAcyR4;
							
							$data.="<td align='right' style='".$five."' colspan='1' >".checkExistance($rowWP['fy5'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$five."' >".checkExistance($ActualYr5,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$five."' >-</td>";
							$data.=$percentageAcyR5;
									
							$data.="<td align='right' style='".$six."' colspan='1' >".checkExistance($rowWP['fy6'],0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$six."' >".checkExistance($ActualYr6,0,'ExistsInteger')."</td>";
							$data.="<td align='right' style='".$six."' >-</td>";
							$data.=$percentageAcyR6;
									
									
							$data.="</tr>";
							
							$data.="<tr>
							<td colspan='37'>
							<div id='".$div."'>".dashboard($tYr1,$tYr2,$tYr3,$tYr4,$tYr5,$tYr6,$row['indicator_id'],$div)."</div>
							</td>
							</tr>";

$inc++;
}


		  			}
		
		
			$data.="".noRecordsFound($query,10)."";
		 
     
$data.="</tbody>
</table>";

    export($format,$data);
}

function dashboard($tYr1,$tYr2,$tYr3,$tYr4,$tYr5,$tYr6,$indicatorId,$div){
$qmobj= new QueryManager('');
$pmobj= new PerfMapsDataMining('');
$title=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'indicator_name');
$unit=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'unitofmeasure');
$inc=1;
$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
$opening_year=$queryHeader['opening_year'];
$closure_year=$queryHeader['closure_year'];

$data.="<table width='100%' border='1' callpadding='1' cellspacing='1'>
<tr>
<td colspan='19' height='550px'>
<table standard-report-grid width='55%' height='550px' style='margin: 1 0 1 0;' border='1' cellspacing='1' cellpadding='1'>
<tr>
	<th colspan='19'><strong>DATA FACT SHEET ON:".$title."</strong></th>
</tr>
<tr>
	<th colspan='2' rowspan='2' class='small-cell-header dataRow'></th>
	<th colspan='2' class='small-cell-header dataRow'>2013</th>
	<th colspan='2' class='small-cell-header dataRow'>2014</th>
	<th colspan='2' class='small-cell-header dataRow'>2015</th>
	<th colspan='2' class='small-cell-header dataRow'>2016</th>
	<th colspan='2' class='small-cell-header dataRow'>2017</th>
	<th colspan='2' class='small-cell-header dataRow'>2018</th>
	<th rowspan='2' class='small-cell-header dataRow'>Target</th>
	<th rowspan='2' class='small-cell-header dataRow'>Actual</th>
	<th rowspan='2' class='small-cell-header dataRow'>% Achievement</th>
</tr>
<tr>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
	<th class='small-cell-header dataRow'>T</th>
	<th class='small-cell-header dataRow'>A</th>
</tr>";
//$obj->alert($indicatorId);

switch ($indicatorId) {
//The start of indicator:13
	default:
		for($i=1; $i<=12; $i++ ){
		$arrayNewIndicator= array("".$indicatorId.".".$i."",);
			foreach ($arrayNewIndicator as  $newIndicatorId){
				switch ($newIndicatorId) {
				case "".$indicatorId.".1":
					//North-coffee
					$NC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".2":
					//North-maize
					$NM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".3":
					//North-beans
					$NB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$NB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$NB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$NB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$NB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$NB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".4":
				//West-coffee
					$WC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".5":
				//West-maize
					$WM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".6":
				//West-beans
					$WB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$WB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$WB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$WB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$WB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$WB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".7":
				//East-coffee
					$EC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".8":
				//East-maize
					$EM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".9":
				//East-beans
					$EB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$EB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$EB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$EB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$EB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$EB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;

				case "".$indicatorId.".10":
				//Central-coffee
					$CC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".11":
				//Central-maize
					$CM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

				break;

				case "".$indicatorId.".12":
				//Central-beans
					$CB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
					$CB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
					$CB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
					$CB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
					$CB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
					$CB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
				break;



				default:
				break;
				}
			}

		}
	break;
	//The end of indicator:13	
}

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>North</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr1))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr2))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr3))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr4))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr5))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr6))."</td>";
$data.="<td align='right'>".number_format($NC_ActualYr6,2)."</td>";

$NC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeNorth($tYr1), targetsCoffeeNorth($tYr2), targetsCoffeeNorth($tYr3), targetsCoffeeNorth($tYr4), targetsCoffeeNorth($tYr5), targetsCoffeeNorth($tYr6), $yr7 = 0);
$NC_LOAA = $qmobj->dataMapsActual($NC_ActualYr1, $NC_ActualYr2, $NC_ActualYr3, $NC_ActualYr4, $NC_ActualYr5, $NC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NC_LOAA, 0, 'ExistsInteger') . "</td>";
$NC_percentageAc = ColorCoding(calc_Percentage($NC_LOAT, $NC_LOAA), 1);
$data .= $NC_percentageAc;

$data.="</tr>";



$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeNorth($tYr1))."</td>
<td align='right'>".number_format($NM_ActualYr1,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr2))."</td>
<td align='right'>".number_format($NM_ActualYr2,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr3))."</td>
<td align='right'>".number_format($NM_ActualYr3,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr4))."</td>
<td align='right'>".number_format($NM_ActualYr4,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr5))."</td>
<td align='right'>".number_format($NM_ActualYr5,2)."</td>
<td align='right'>".number_format(targetsMaizeNorth($tYr6))."</td>
<td align='right'>".number_format($NM_ActualYr6,2)."</td>";

$NM_LOAT = $qmobj->dataMapsTargets(targetsMaizeNorth($tYr1), targetsMaizeNorth($tYr2), targetsMaizeNorth($tYr3), targetsMaizeNorth($tYr4), targetsMaizeNorth($tYr5), targetsMaizeNorth($tYr6), $yr7 = 0);
$NM_LOAA = $qmobj->dataMapsActual($NM_ActualYr1, $NM_ActualYr2, $NM_ActualYr3, $NM_ActualYr4, $NM_ActualYr5, $NM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NM_LOAA, 0, 'ExistsInteger') . "</td>";
$NM_percentageAc = ColorCoding(calc_Percentage($NM_LOAT, $NM_LOAA), 1);
$data .= $NM_percentageAc;	

$data.="</tr>";

$data.="<tr >";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansNorth($tYr1))."</td>
<td align='right'>".number_format($NB_ActualYr1,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr2))."</td>
<td align='right'>".number_format($NB_ActualYr2,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr3))."</td>
<td align='right'>".number_format($NB_ActualYr3,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr4))."</td>
<td align='right'>".number_format($NB_ActualYr4,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr5))."</td>
<td align='right'>".number_format($NB_ActualYr5,2)."</td>
<td align='right'>".number_format(targetsBeansNorth($tYr6))."</td>
<td align='right'>".number_format($NB_ActualYr6,2)."</td>";

$NB_LOAT = $qmobj->dataMapsTargets(targetsBeansNorth($tYr1), targetsBeansNorth($tYr2), targetsBeansNorth($tYr3), targetsBeansNorth($tYr4), targetsBeansNorth($tYr5), targetsBeansNorth($tYr6), $yr7 = 0);
$NB_LOAA = $qmobj->dataMapsActual($NB_ActualYr1, $NB_ActualYr2, $NB_ActualYr3, $NB_ActualYr4, $NB_ActualYr5, $NB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($NB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($NB_LOAA, 0, 'ExistsInteger') . "</td>";
$NB_percentageAc = ColorCoding(calc_Percentage($NB_LOAT, $NB_LOAA), 1);
$data .= $NB_percentageAc;	

$data.="</tr>";

//Start West
$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>West</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WC_ActualYr6,2)."</td>";

$WC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeWest($tYr1), targetsCoffeeWest($tYr2), targetsCoffeeWest($tYr3), targetsCoffeeWest($tYr4), targetsCoffeeWest($tYr5), targetsCoffeeWest($tYr6), $yr7 = 0);
$WC_LOAA = $qmobj->dataMapsActual($WC_ActualYr1, $WC_ActualYr2, $WC_ActualYr3, $WC_ActualYr4, $WC_ActualYr5, $WC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WC_LOAA, 0, 'ExistsInteger') . "</td>";
$WC_percentageAc = ColorCoding(calc_Percentage($WC_LOAT, $WC_LOAA), 1);
$data .= $WC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WM_ActualYr6,2)."</td>";

$WM_LOAT = $qmobj->dataMapsTargets(targetsMaizeWest($tYr1), targetsMaizeWest($tYr2), targetsMaizeWest($tYr3), targetsMaizeWest($tYr4), targetsMaizeWest($tYr5), targetsMaizeWest($tYr6), $yr7 = 0);
$WM_LOAA = $qmobj->dataMapsActual($WM_ActualYr1, $WM_ActualYr2, $WM_ActualYr3, $WM_ActualYr4, $WM_ActualYr5, $WM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WM_LOAA, 0, 'ExistsInteger') . "</td>";
$WM_percentageAc = ColorCoding(calc_Percentage($WM_LOAT, $WM_LOAA), 1);
$data .= $WM_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansWest($tYr1))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr2))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr3))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr4))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr5))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansWest($tYr6))."</td>";
$data.="<td align='right'>".number_format($WB_ActualYr6,2)."</td>";

$WB_LOAT = $qmobj->dataMapsTargets(targetsBeansWest($tYr1), targetsBeansWest($tYr2), targetsBeansWest($tYr3), targetsBeansWest($tYr4), targetsBeansWest($tYr5), targetsBeansWest($tYr6), $yr7 = 0);
$WB_LOAA = $qmobj->dataMapsActual($WB_ActualYr1, $WB_ActualYr2, $WB_ActualYr3, $WB_ActualYr4, $WB_ActualYr5, $WB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($WB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($WB_LOAA, 0, 'ExistsInteger') . "</td>";
$WB_percentageAc = ColorCoding(calc_Percentage($WB_LOAT, $WB_LOAA), 1);
$data .= $WB_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>East</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EC_ActualYr6,2)."</td>";

$EC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeEast($tYr1), targetsCoffeeEast($tYr2), targetsCoffeeEast($tYr3), targetsCoffeeEast($tYr4), targetsCoffeeEast($tYr5), targetsCoffeeEast($tYr6), $yr7 = 0);
$EC_LOAA = $qmobj->dataMapsActual($EC_ActualYr1, $EC_ActualYr2, $EC_ActualYr3, $EC_ActualYr4, $EC_ActualYr5, $EC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EC_LOAA, 0, 'ExistsInteger') . "</td>";
$EC_percentageAc = ColorCoding(calc_Percentage($EC_LOAT, $EC_LOAA), 1);
$data .= $EC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EM_ActualYr6,2)."</td>";

$EM_LOAT = $qmobj->dataMapsTargets(targetsMaizeEast($tYr1), targetsMaizeEast($tYr2), targetsMaizeEast($tYr3), targetsMaizeEast($tYr4), targetsMaizeEast($tYr5), targetsMaizeEast($tYr6), $yr7 = 0);
$EM_LOAA = $qmobj->dataMapsActual($EM_ActualYr1, $EM_ActualYr2, $EM_ActualYr3, $EM_ActualYr4, $EM_ActualYr5, $EM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EM_LOAA, 0, 'ExistsInteger') . "</td>";
$EM_percentageAc = ColorCoding(calc_Percentage($EM_LOAT, $EM_LOAA), 1);
$data .= $EM_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";

$data.="<td align='right'>".number_format(targetsBeansEast($tYr1))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr2))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr3))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr4))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr5))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansEast($tYr6))."</td>";
$data.="<td align='right'>".number_format($EB_ActualYr6,2)."</td>";

$EB_LOAT = $qmobj->dataMapsTargets(targetsBeansEast($tYr1), targetsBeansEast($tYr2), targetsBeansEast($tYr3), targetsBeansEast($tYr4), targetsBeansEast($tYr5), targetsBeansEast($tYr6), $yr7 = 0);
$EB_LOAA = $qmobj->dataMapsActual($EB_ActualYr1, $EB_ActualYr2, $EB_ActualYr3, $EB_ActualYr4, $EB_ActualYr5, $EB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($EB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($EB_LOAA, 0, 'ExistsInteger') . "</td>";
$EB_percentageAc = ColorCoding(calc_Percentage($EB_LOAT, $EB_LOAA), 1);
$data .= $EB_percentageAc;	

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan='' rowspan='3'><strong>Central</strong></td>";
$data.="<td><strong>Coffee</strong></td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CC_ActualYr6,2)."</td>";

$CC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeCentral($tYr1), targetsCoffeeCentral($tYr2), targetsCoffeeCentral($tYr3), targetsCoffeeCentral($tYr4), targetsCoffeeCentral($tYr5), targetsCoffeeCentral($tYr6), $yr7 = 0);
$CC_LOAA = $qmobj->dataMapsActual($CC_ActualYr1, $CC_ActualYr2, $CC_ActualYr3, $CC_ActualYr4, $CC_ActualYr5, $CC_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CC_LOAA, 0, 'ExistsInteger') . "</td>";
$CC_percentageAc = ColorCoding(calc_Percentage($CC_LOAT, $CC_LOAA), 1);
$data .= $CC_percentageAc;

$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Maize</strong></td>";

$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CM_ActualYr6,2)."</td>";

$CM_LOAT = $qmobj->dataMapsTargets(targetsMaizeCentral($tYr1), targetsMaizeCentral($tYr2), targetsMaizeCentral($tYr3), targetsMaizeCentral($tYr4), targetsMaizeCentral($tYr5), targetsMaizeCentral($tYr6), $yr7 = 0);
$CM_LOAA = $qmobj->dataMapsActual($CM_ActualYr1, $CM_ActualYr2, $CM_ActualYr3, $CM_ActualYr4, $CM_ActualYr5, $CM_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CM_LOAA, 0, 'ExistsInteger') . "</td>";
$CM_percentageAc = ColorCoding(calc_Percentage($CM_LOAT, $CM_LOAA), 1);
$data .= $CM_percentageAc;											
$data.="</tr>";

$data.="<tr>";
$data.="<td colspan=''><strong>Beans</strong></td>";										
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr1))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr1,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr2))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr2,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr3))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr3,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr4))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr4,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr5))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr5,2)."</td>";
$data.="<td align='right'>".number_format(targetsBeansCentral($tYr6))."</td>";
$data.="<td align='right'>".number_format($CB_ActualYr6,2)."</td>";

$CB_LOAT = $qmobj->dataMapsTargets(targetsBeansCentral($tYr1), targetsBeansCentral($tYr2), targetsBeansCentral($tYr3), targetsBeansCentral($tYr4), targetsBeansCentral($tYr5), targetsBeansCentral($tYr6), $yr7 = 0);
$CB_LOAA = $qmobj->dataMapsActual($CB_ActualYr1, $CB_ActualYr2, $CB_ActualYr3, $CB_ActualYr4, $CB_ActualYr5, $CB_ActualYr6, $yr7 = 0);
$data .= "<td align='right'><strong>" . checkExistance($CB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
$data .= "<td align='right' >" . checkExistance($CB_LOAA, 0, 'ExistsInteger') . "</td>";
$CB_percentageAc = ColorCoding(calc_Percentage($CB_LOAT, $CB_LOAA), 1);
$data .= $CB_percentageAc;	

$data.="</tr>";

$data.="</table>
</td>";

/* the data performance Map */
$data.="<td colspan='18'>
	<table width='100%' style='margin: 0 1200px 0 0;' border='1' cellspacing='1' cellpadding='1'>
		<tr>
			<td colspan='18'>#Data Performance Map Graph</td>
		</tr>
	</table>
</td>";

$data.="</tr>
</table>";
return $data;
}

function exportIPTTReport ($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator,$format)
{
    
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    $umobj = new umemsDataMining('');
    $imobj = new IndDissagDataMining('');
    $tmobj = new IndDissagTargets('');

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

    $data = '';

    $data .= "<table cellspacing='1' cellpadding='1' border='1' id='report' width='100%' >";

    //start of report retrieval
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
			
			$data .= "<tr>
				<td><strong>" . $rowoutput['output_code'] . "</strong></td>
				<td colspan='20'><strong>" . $rowoutput['output_name'] . "</strong></td>
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
				<td align='left'>" . $inc . "</td>
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

					$data .= "<td style='" . $one . "' rowspan='" . $rowspan . "' align='right' ><input type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >";
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
					$data .= "<td valign='' align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>
					<td align='right' >" . checkExistance($LOAA, 0, 'ExistsInteger') . "</td>";
					$percentageAc = ColorCoding(calc_Percentage($LOAT, $LOAA), 1);
					$data .= $percentageAc;
					$data .= "</tr>";
					
					$startYear = $queryHeader['opening_year'];
					$closeYear = $queryHeader['closure_year'];
					$cells = 6;
					$colorArray = array($one, $two, $three, $four, $five, $six);
						switch ($inc) {
						//Indicator 1
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
									<td colspan='6'></td>
									<td colspan=''><div align='right'><strong>" . $rowCpm['otherMeasures'] . "</strong></td>
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
									<td colspan='6'></td>
									<td colspan=''><div align='right'><strong>" . $rowCpm['otherMeasures'] . "</strong></td>
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
									$data .= "<td valign='' align='right'><strong>" . checkExistance($LOAT, 0, 'ExistsInteger') . "</strong></td>";
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
					$data.="</tbody>";
					$inc++;
					}
		}
	$data .= "" . noRecordsFound($qResults, 10) . "";
	$data .= "<tbody>
	</table>";

    export($format,$data);
}

function exportMelaReport ($zone, $district, $indicator_type, $subcomponent, $output, $year, $semiAnnual, $indicatorCode, $indicator,$format)
{
    
    $qmobj = new QueryManager('');
    $dmobj = new DataMining('');
    $umobj = new umemsDataMining('');
    $umemsRepL2Obj = new umemsDataMiningLevelOne('');


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

    $data .= "<table cellspacing='1' cellpadding='1' border='1' id='report' width='100%' >";

    //start of report retrieval
    $data .= "<tr>
				<th rowspan='3' class='dataRow' >NO/SELECT</th>
				<th rowspan=3 colspan='6' class='dataRow largest-cell-header'>Indicator/Disaggregation</th>
				<th colspan='23' class='dataRow' ><center>MELA Report for the for the Period 2013 - 2018 <em>, T=Target,A=Actual</em></center></th>
            </tr>

			<tr>
				<th class='dataRow' rowspan='2' colspan='2'>type of Indicator</th>
				<th class='dataRow' rowspan='2'>unit of measure</th>
				<th class='dataRow' rowspan='2'>Baseline Year</th>
				<th class='dataRow' rowspan='2'>Baseline Value</th>";
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

        $data .= "<th width='100' class='" . $class . "'  align='right' colspan='3' >FY " . $n . "</th>";

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


        $data .= "<th class='" . $class . "' width='100'  align='right'>T</th>";
        $data .= "<th class='" . $class . "'  width='100'  align='right'>A</th>";
        $data .= "<th class='" . $class . "'  width='100'  align='right'>%</th>";

    }
    $data .= "</tr>";
    $data .= "<tr>
				<td colspan='26' align='center'><strong>Commodity Production and Marketing (CPM)</strong></td>
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
                $color = "evenrow";
                $events2 = "onmouseover=\"this.style.backgroundColor='#666666';\" onmouseout=\"this.style.backgroundColor='';\"";
                $l = "align=right";

                /*start of main indicators frame*/
                $data .= "<tr class='" . $color . "'>";
                $data .= "<td align=left>" . $inc . "</td>";
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

                $data .= "<td align='right' class='yearOne'><INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='" . $rowWP['workplan_id'] . "' >";
                $data .= "<INPUT type='hidden' name='region[]'   id='region' value='" . $rowWP['region'] . "' >";
                $data .= "<INPUT type='hidden' name='curr_year[]'   id='curr_year ' value='" . $rowWP['curr_year'] . "' >";
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
                $qCpmonly = @Execute($cpmonly) or die(http(__line__));
                while ($rowCpm = @FetchRecords($qCpmonly)) {
                    $data .= "<tr class='umemsRpLevelOne' >";
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
                        $data .= "<tr class='umemsRpLevelTwo' >";
                        $data .= "<td align='right'>" . $inc . "." . $i . "." . $j . ".</td>";
                        $data .= "<td colspan='6'>" . $rowCpmlevel_two['dissagregate_name'] . "</td>";
                        $data .= "<td align='left' colspan='2'>" . checkExistance($row['indicator_type'], '', 'ExistsString') . "</td>";
                        $data .= "<td align='left'>" . $row['unitofmeasure'] . "</td>";
                        $data .= "<td align='left'></td>";
                        $data .= "<td align='right' align='right'></td>";

                        

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


    $data .= "</table>";

    export($format,$data);
}

function exportRawDataToExcel($dataForm,$fromDate,$toDate,$reportingYear,$reportingPeriod,$format){
$qmobj = new QueryManager('');
$f6obj = new Form6DataValidationManager('');

$append_period=($reportingPeriod !='' )?$reportingPeriod:"From: ".$fromDate." To: ".$toDate."";
$period=($append_period !='')?$append_period:$reportingYear;
$title=strtoupper("".$dataForm." data for period ".$period." ");

			
				switch($dataForm){
					
					case 'Form 1':
					
					/* start form1 retrieval */
						$sql = $qmobj->form1RawDataToExcelAll($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['zoneName']."</td>";
								$data.="<td align='left'>".$row['districtName']."</td>";
								$data.="<td align='left'>".$row['subcountyName']."</td>";
								$data.="<td align='left'>".$row['ParishName']."</td>";
								$data.="<td align='left'>".$row['trainingVillage']."</td>";
								$data.="<td align='right'>".$row['trainingDate']."</td>";
								$data.="<td align='left'>".$row['main Value Chain']."</td>";
								$data.="<td align='left'>".$row['training Focus']."</td>";
								$data.="<td align='left'>".$row['Target Audience']."</td>";
								$data.="<td align='left'>".$row['Participant Recommendations']."</td>";
								$data.="<td align='left'>".$row['Participant Name']."</td>";
								$data.="<td align='left'>".$row['Participant Age']."</td>";
								$data.="<td align='right'>".$row['Participant Gender']."</td>";
								$data.="<td align='left'>".$row['Participant Status']."</td>";
								$data.="<td align='left'>".$row['Participant Village']."</td>";
								$data.="<td align='left'>".$row['Participant Type of Individual']."</td>";
								$tel=(($row['Participant Tel'])=='+256')?'-':$row['Participant Tel'];
								$data.="<td align='left'>".$tel."</td>";
							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************form 1 break******************************* */
					
					case 'Form 2:Enterprise Technology Adoption form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2EntTechRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['tbl_techadoptionId']."</td>";
								$data.="<td align='left'>".$qmobj->cleanValueChainDisplay($row['valueChain'])."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['businessTraderName']."</td>";
								$data.="<td align='left'>".$row['businessLocation']."</td>";
								$data.="<td align='left'>".$row['durationWithActivity']."</td>";
								$data.="<td align='left'>".$row['nameOfImprovedTech']."</td>";
								$data.="<td align='left'>".$row['techAdoptedInReportingPeriod']."</td>";
								$data.="<td align='left'>".$row['techContinuedFromPast']."</td>";
								$data.="<td align='left'>".$row['amountInvestedInTechAdoption']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalOld']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>";
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['code']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['durationWithOldActivity']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['typeOfBusiness']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagementTj']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolderTj']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolderTj']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJobTj']."</td>";
								$data.="<td align='left'>".$row['tbl_tradersId']."</td>";
								$data.="<td align='left'>".$row['traderCode']."</td>";
								$data.="<td align='left'>".$row['traderName']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Labour Saving Technology form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2LabSavRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['labourSavingTech']."</td>"; 
								$data.="<td align='left'>".$row['labourSavingConcept']."</td>";
								$data.="<td align='left'>".$row['personResponsible']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedMaleNew']."</td>"; 
								$data.="<td align='left'>".$row['jobsCreatedMaleOld']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalNew']."</td>";
								$data.="<td align='left'>".$row['jobsCreatedTotalOld']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['amountInvestedOnTechInvestment']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Media Programs form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2MedProRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['mediaAwarenessMessage']."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['categoryYouthTargeted']."</td>";
								$data.="<td align='left'>".$row['anticipatedResults']."</td>";
								$data.="<td align='left'>".$row['typeOfMedia']."</td>";
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['coverage']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>";
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
																							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Youth Apprenticeship form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2YouAppRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameofBusiness']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['sexBusinessOwner']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedFemaleNew']."</td>"; 
								$data.="<td align='left'>".$row['num_youthAttachedFemaleOld']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedMaleNew']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedMaleOld']."</td>";
								$data.="<td align='left'>".$row['num_youthAttachedTotalNew']."</td>"; 
								$data.="<td align='left'>".$row['num_youthAttachedTotalOld']."</td>"; 
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['anticipatedOutcome']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['apprenticeShip']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['duration']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Business Development Services form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2BusDevRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfPartner']."</td>";
								$data.="<td align='left'>".$row['ValueChain']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['areaOfExpertise']."</td>";
								$data.="<td align='left'>".$row['servicesOffered']."</td>";
								$data.="<td align='left'>".$row['typeOfActorServiced']."</td>";
								$data.="<td align='left'>".$row['actorServedFemale']."</td>"; 
								$data.="<td align='left'>".$row['actorServedMale']."</td>";
								$data.="<td align='left'>".$row['roleOfActivity']."</td>";
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>";
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";
								$data.="<td align='left'>".$row['DateSubmission']."</td>";
								$data.="<td align='left'>".$row['updatedby']."</td>";
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['nameOfMSME']."</td>";
								$data.="<td align='left'>".$row['nameofBusiness']."</td>";
								$data.="<td align='left'>".$row['numOfEmployee']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfMSME']."</td>";
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
								$data.="<td align='left'>".$row['reportingMonth']."</td>";
								$data.="<td align='left'>".$row['msmeType']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>";
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>";
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Bank Loans form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2BanLoaRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['nameMSME']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['cpmAssistance']."</td>";  
								$data.="<td align='left'>".$row['amountLoanAccessed']."</td>";  
								$data.="<td align='left'>".$row['recipientSex']."</td>";  
								$data.="<td align='left'>".$row['bankingInstitution']."</td>";  
								$data.="<td align='left'>".$row['CompiledBy']."</td>";  
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>";  
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['dateOfBirth']."</td>";  
								$data.="<td align='left'>".$row['sexOfMSME']."</td>"; 
								$data.="<td align='left'>".$row['typeOfLoanRecepient']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>";  
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['msmeType']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";  
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Input Sales form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2InpSalRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfMiddleValueChainActor']."</td>"; 
								$data.="<td align='left'>".$row['dateOfStartOfinputsSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['amountInvestedInSettingUpInputSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['compiledBy']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['dateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByChemicals']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByFarmImplements']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByFertilizers']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByHerbicides']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldByOthers']."</td>"; 
								$data.="<td align='left'>".$row['inputsSoldBySeeds']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingFemale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingMale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfFarmersBenefitingTotal']."</td>"; 
								$data.="<td align='left'>".$row['numberOfMessengersFemale']."</td>"; 
								$data.="<td align='left'>".$row['numberOfMessengersMale']."</td>";  
								$data.="<td align='left'>".$row['numberOfMessengersTOtal']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['reviewedBy']."</td>";  
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>";  
								$data.="<td align='left'>".$row['submittedBy']."</td>";  
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:PHH form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2PHHRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['nameOfMiddleValueChainActor']."</td>";  
								$data.="<td align='left'>".$row['dateOfStartOfinputsSalesBusiness']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$qmobj->cleanValueChainDisplay($row['valueChain'])."</td>";
								$data.="<td align='left'>".$row['amountInvestedInRefurbishing']."</td>"; 
								$data.="<td align='left'>".$row['assistanceRenderedByActivity']."</td>";  
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['dateSubmission']."</td>";  
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>";  
								$data.="<td align='left'>".$row['sizeOfStoreRefurbished']."</td>"; 
								$data.="<td align='left'>".$row['storageTypeForColdChain']."</td>"; 
								$data.="<td align='left'>".$row['storageTypeForDryGoods']."</td>";  
								$data.="<td align='left'>".$row['submittedBy']."</td>";  
								$data.="<td align='left'>".$row['compiledBy']."</td>"; 
								$data.="<td align='left'>".$row['reviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					case 'Form 2:Public Private Partnership form':
					
					/* start form1 retrieval */
						$sql = $qmobj->form2PubPriRawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['namePartner']."</td>"; 
								$data.="<td align='left'>".$row['ValueChain']."</td>"; 
								$data.="<td align='left'>".$row['reportingPeriod']."</td>"; 
								$data.="<td align='left'>".$row['partnershipFocus']."</td>"; 
								$data.="<td align='left'>".$row['valueActivity']."</td>"; 
								$data.="<td align='left'>".$row['valuePartner']."</td>"; 
								$data.="<td align='left'>".$row['valueTotal']."</td>"; 
								$data.="<td align='left'>".$row['CompiledBy']."</td>"; 
								$data.="<td align='left'>".$row['ReviewedBy']."</td>"; 
								$data.="<td align='left'>".$row['SubmittedBy']."</td>"; 
								$data.="<td align='left'>".$row['updatedby']."</td>"; 
								$data.="<td align='left'>".$row['DateSubmission']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>"; 
								$data.="<td align='left'>".$row['reportingMonth']."</td>"; 
								$data.="<td align='left'>".$row['dateOfEngagement']."</td>"; 
								$data.="<td align='left'>".$row['nameOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['sexOfJobHolder']."</td>"; 
								$data.="<td align='left'>".$row['timeSpentOnJob']."</td>"; 
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 2:Enterprise Technology Adoption form******************************* */
					
					
					
					case 'Form 3':
					
					/* start form3 retrieval */
						$sql = $qmobj->form3RawDataToExcel($reportingYear,$reportingPeriod);
						//$obj->alert($sql);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=0 cellspacing=1 cellpadding=1><tr style='background-color:#5AC5CE;'>";

					    $data.="<th>#</th>";
						$data.="<th>Ex_Name</th>";
						$data.="<th>Ex_DOB </th>";
						$data.="<th>'Ex_Code </th>";
						$data.="<th>Ex_Gender </th>";
						$data.="<th>Ex_District </th>";
						$data.="<th>Ex_Subcounty </th>";
						$data.="<th>Ex_Village </th>";
						$data.="<th>Ex_Tel </th>";
						$data.="<th>Ex_Crop_Beans </th>";
						$data.="<th>Ex_Crop_Coffee </th>";
						$data.="<th>Ex_Crop_Maize </th>";
						$data.="<th>reportingPeriod </th>";
						$data.="<th>year </th>";
						$data.="</tr>";

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"background-color:#F8F5EC;":"background-color:#70BAD9;";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['Ex_Name']."</td>";
								$data.="<td align='left'>".$row['Ex_DOB']."</td>";
								$data.="<td align='left'>".$row['Ex_Code']."</td>";
								$data.="<td align='left'>".$row['Ex_Gender']."</td>"; 
								$data.="<td align='left'>".$row['Ex_District']."</td>"; 
								$data.="<td align='left'>".$row['Ex_Subcounty']."</td>"; 
								$data.="<td align='left'>".$row['Ex_Village']."</td>";
								$data.="<td align='left'>".$row['Ex_Tel']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Beans']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Coffee']."</td>";
								$data.="<td align='left'>".$row['Ex_Crop_Maize']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="</tr>";

								$data.="<tr><td colspan='20'><div id='form3Ihoo'>". view_frm3ExDisaggregationAll($row)
    							."</div></td></tr>";
								

								
										
							
							$count ++;
						}

						$data.="</table>";
						
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 3:******************************* */
					
					
					case 'Form 4':
					
					/* start form1 retrieval */
						$sql = $qmobj->form4RawDataToExcel($fromDate,$toDate,$reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['Tr_Name']."</td>";
								$data.="<td align='left'>".$row['Tr_DOB']."</td>";
								$data.="<td align='left'>&nbsp;".$row['Tr_Code']."</td>";
								$data.="<td align='left'>".$row['Tr_Gender']."</td>"; 
								$data.="<td align='left'>".$row['Tr_District']."</td>"; 
								$data.="<td align='left'>".$row['Tr_Subcounty']."</td>"; 
								$data.="<td align='left'>".$row['Tr_Village']."</td>";
								$data.="<td align='left'>&nbsp;".$row['Tr_Tel']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Beans']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Coffee']."</td>";
								$data.="<td align='left'>".$row['Tr_Crop_Maize']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['year']."</td>";
								$data.="<td align='left'>".$row['epayMade-Oct']."</td>";
								$data.="<td align='left'>".$row['epayMade-Nov']."</td>";
								$data.="<td align='left'>".$row['epayMade-Dec']."</td>";
								$data.="<td align='left'>".$row['epayMade-Jan']."</td>";
								$data.="<td align='left'>".$row['epayMade-Feb']."</td>";
								$data.="<td align='left'>".$row['epayMade-Mar']."</td>";
								$data.="<td align='left'>".$row['epayMade_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Oct']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Nov']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Dec']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Jan']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Feb']."</td>";
								$data.="<td align='left'>".$row['epayRecieved-Mar']."</td>";
								$data.="<td align='left'>".$row['epayRecieved_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['VAsInSupplyChain_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Oct']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Nov']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Dec']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Jan']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Feb']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain-Mar']."</td>";
								$data.="<td align='left'>".$row['CBOsInSupplyChain_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Beans_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Beans_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Beans_Exporter-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Coffee_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Coffee_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Coffee_Exporter-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Maize_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Amount_UGX_Maize_Exported_Details_Oct-Mar']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Oct']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Nov']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Dec']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Jan']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Feb']."</td>";
								$data.="<td align='left'>".$row['vol_Purchased_Maize_Exporter-Mar']."</td>";
															
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					/* ***************************************************Form 4******************************* */

					
					/* start form 6 */
						case 'Form6 Survey':

					/* start form6 retrieval */
						$data.="<table border='1' cellspacing='1' cellpadding='1'>";
		$data.="<tr class='evenrow'>
			<th colspan='29' align='left'>
				Commodity Production And Marketing Activity FORM 6 SURVEY DATA 
			</th>
		</tr>

		<tr>
		<th class='first-cell-header'>#</th>";
		$q=$qmobj->fetchForm6AprToSep2016Fields('');
		$query=mysql_query($q)or die(mysql_error().__line__);
		$num_rows = mysql_num_rows($query);
    $data_header = array();
		while($row=mysql_fetch_array($query)){				
		$data.="<th>".$row['field']."</th>";
    $data_header[] = $row['answer'];
		}
		$data.="</tr>
		</thead>
		<tbody>";

		
$query_string=$qmobj->fetchForm6AprToSep2016Data('');

/* $reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode; */

$query_string.=" order by `Id` DESC";

 //$obj->alert($query_string); 

  
  $x=1;
	$query_=mysql_query($query_string)or die(mysql_error().__line__);
	 /**************
	 *paging parameters
	 *
	 ****/
	$max_records = mysql_num_rows($query_);
	 $new_query=mysql_query($query_string) or die(mysql_error().__line__);
	
  
  while($row=mysql_fetch_array($new_query)){
	  $ans_var=1;
	  
			$data.="<tr>";
			$data.="<td>".$x.".</td>";				
			/* pick all data for each data cell 
			and all data values for each cell */
			foreach ($data_header as $fieldName) {
       //$obj->alert($data_header);
				$field_name=$fieldName;
				$columnValue=$row[''.$fieldName.''];
				
				
				 /* start Validation of values returned */
				 switch($field_name){
          //from the db, add 1 + (ans_var)
          //validate Interview_Date
          case 'ans_15':
          $date_var=$f6obj->formatDateString($columnValue);
          $data.=$f6obj->validateDateRange($date_var,'2015-10-01','2016-09-30');
          break;   

          case 'ans_23':
          $data.=$f6obj->validateRegion($columnValue);
          break;

          #HH head........

          case 'ans_41':
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_42':
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_44':
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_45':
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_46':
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          #HH hold1........

          case 'ans_47':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_48':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_50':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_51':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_52':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                    #HH hold2........

          case 'ans_53':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_54':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_56':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_57':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_58':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold3........

          case 'ans_59':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_60':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_62':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_63':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_64':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;



          #HH hold4........

          case 'ans_65':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_66':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_68':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_69':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_70':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


            #HH hold4........

          case 'ans_71':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_72':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_74':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_75':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_76':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;




                      #HH hold4........

          case 'ans_77':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_78':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_80':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_81':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_82':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;

                      #HH hold4........

          case 'ans_83':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_84':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_86':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_87':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_88':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_89':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_90':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_92':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_93':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_94':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_95':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_96':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_98':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_99':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_100':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                      #HH hold4........

          case 'ans_101':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_102':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_104':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_105':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_106':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


                                #HH hold4........

          case 'ans_107':
          #gender
          $data.=$f6obj->validateHH_Gender($columnValue);
          break;

          case 'ans_108':
          #Relationship to head
          $data.=$f6obj->validateRelationship($columnValue);
          break;

          case 'ans_110':
          #Marital_Status
          $data.=$f6obj->validateMarital_Status($columnValue);
          break;


          case 'ans_111':
          #Attended_School
          $data.=$f6obj->validateAttended_School($columnValue);
          break;

          case 'ans_112':
          #Education_Complete..
          $data.=$f6obj->validateEducation_Complete($columnValue);
          break;


          case 'ans_114':
          #Produced_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_116':
          #Produced_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_115':
          #Produced_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;




          case 'ans_118':
          #Produced_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_120':
          #Produced_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_119':
          #Produced_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_123':
          #Harvested_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_592':
          #Harvested_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1064':
          #Harvested_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


        
          
          //validate farmer_code
          case 'ans_18':
          $data.=$f6obj->validateFarmerCode($columnValue);
          break;
          
          //validate farmer_gender
          case 'ans_20':
          $data.=$f6obj->validateGender($columnValue);
          break;
          
          //validate farmer_dob
          case 'ans_21':
          $data.="<td>".$f6obj->formatDateString($columnValue)."</td>";
          break;


          //validate farmer_district
          case 'ans_24':
          $data.=$f6obj->validateDistrict($columnValue);
          break;

           //validate farmer_subcounty
          case 'ans_25':
          $data.=$f6obj->validateSubCountry($columnValue);
          break;
          
          
          /* start Shaffic Cases */         
          case 'ans_1575':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1574':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1573':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen10($columnValue);
          break;
          
          case 'ans_1572':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1571':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen12($columnValue);
          break;
          
          case 'ans_1560':
          # code...
          $data.=$f6obj->ApplyDataCleanUpGen07($columnValue);
          break;

          case 'ans_1559':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1558':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1557':
          # code...
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1550':
          # code...ProtectCounterfeit
          $data.=$f6obj->validateProtectCounterfeit($columnValue);
          break;

          case 'ans_1543':
          # code...FakeFertilizer
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1544':
          # code...ReasonFakeFertilizer
          $data.=$f6obj->validateReasonFakeFertilizer($columnValue);
          break;

          case 'ans_1542':
          # code...FakeAgroInputs
          $data.=$f6obj->validateFakeAgroInputs($columnValue);
          break;

          case 'ans_1535':
          # code...ImprovedClimate
          $data.=$f6obj->validateImprovedClimate($columnValue);
          break;

          case 'ans_1534':
          # code...Climate Awareness
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1531':
          # code...Loan accessed
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

        #coffee_data................



          case 'ans_1530':
          # code...Aware_Quality_Standards_Coffee
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1524':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1496':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1495':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1482':
          # code...ICT_Technology_Help_Coffee
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1473':
          # code...ICT_technologies_Used_Coffee
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_1461':
          # code...Reasons_Not_Using_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_1453':
          # code...Type_Of_Irrigation_Coffee
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_1451':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1437':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1423':
          # code...Coffee_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1416':
          # code...Coffee_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1402':
          # code...Coffee_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1394':
          # code...Coffee_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1381':
          # code...PHH_Technology_Used_Coffee_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1380':
          # code...Apply_PHH_Technology_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1368':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1356':
          # code...Store_Coffee_Produce_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_1349':
          # code...Coffee_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_1335':
          # code...Coffee_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_1327':
          # code...Coffee_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_1314':
          # code...PHH_Technology_Used_Coffee_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_1313':
          # code...Apply_PHH_Technology_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1301':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_1289':
          # code...Store_Coffee_Produce_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_1278':
          # code...Coffee_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_1255':
          # code...Coffee_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1254':
          # code...Coffee_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1253':
          # code...Coffee_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1252':
          # code...Coffee_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1251':
          # code...Coffee_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1250':
          # code...Coffee_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1249':
          # code...Coffee_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1248':
          # code...Coffee_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1247':
          # code...Coffee_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1246':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1245':
          # code...Coffee_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1233':
          # code...Coffee_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_1210':
          # Coffee_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1209':
          # code...Coffee_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1208':
          # code...Coffee_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1207':
          # code...Coffee_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1206':
          # code...Coffee_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1205':
          # code...Coffee_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1204':
          # code...Coffee_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1203':
          # code...Coffee_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1202':
          # code...Coffee_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1201':
          # code...Coffee_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1200':
          # code...Coffee_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1192':
          # code...Coffee_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1182':
          # code...Coffee_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_1181':
          # code...Coffee_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1179':
          # code...Coffee_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1166':
          # code...Coffee_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_1153':
          # code...Coffee_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1152':
          # code...Coffee_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1151':
          # code...Coffee_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1150':
          # code...Coffee_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1149':
          # code...Coffee_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1148':
          # code...Coffee_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1147':
          # code...Coffee_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1146':
          # code...Coffee_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1145':
          # code...Coffee_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1144':
          # code...Coffee_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1143':
          # code...Coffee_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1142':
          # code...Coffee_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1141':
          # code...Coffee_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1140':
          # code...Coffee_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1138':
          # code...Type_Seeds_Coffee_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1131':
          # code...Coffee_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_1121':
          # code...Coffee_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_1120':
          # code...Coffee_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1118':
          # code...Coffee_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_1105':
          # code...Coffee_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_1092':
          # code...Coffee_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1091':
          # code...Coffee_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1090':
          # code...Coffee_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1089':
          # code...Coffee_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1088':
          # code...Coffee_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1087':
          # code...Coffee_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1086':
          # code...Coffee_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1085':
          # code...Coffee_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1084':
          # code...Coffee_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1083':
          # code...Coffee_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1082':
          # code...Coffee_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1081':
          # code...Coffee_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1080':
          # code...Coffee_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1079':
          # code...Coffee_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1077':
          # code...Type_Seeds_Coffee_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_1075':
          # code...Coffee_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1071':
          # code...Land_Mapped_Coffee_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_1068':
          # code...Coffee_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_1063':
          # code...Land_Mapped_Coffee_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_1059':
          # code...Type_Coffee_Grown
          $data.=$f6obj->validateTypeCoffee($columnValue);
          break;


          #Beans data..................

          case 'ans_1058':
          # code...Aware_Quality_Standards_Beans
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_1052':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;

          case 'ans_1024':
          # code...Good_Agricultural_Practices_Trained
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_1023':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_1010':
          # code...ICT_Technology_Help_Beans
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_1001':
          # code...ICT_technologies_Used_Beans
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_989':
          # code...Reasons_Not_Using_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_988':
          # code...Type_Of_Irrigation_Beans
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_979':
          # code...Beans_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_965':
          # code...Use_Paid_Labour_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_951':
          # code...Use_Paid_Labour_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_944':
          # code...Beans_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_930':
          # code...Beans_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_922':
          # code...Beans_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_909':
          # code...PHH_Technology_Used_Beans_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_908':
          # code...Apply_PHH_Technology_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_896':
          # code...Store_Beans_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_884':
          # code...Dry_Beans_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_877':
          # code...Beans_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_863':
          # code...Beans_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_855':
          # code...Beans_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_842':
          # code...PHH_Technology_Used_Beans_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_841':
          # code...Apply_PHH_Technology_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_829':
          # code...Store_Beans_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_817':
          # code...Dry_Beans_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_806':
          # code...Beans_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_783':
          # code...Beans_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_782':
          # code...Beans_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_781':
          # code...Beans_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_780':
          # code...Beans_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_779':
          # code...Beans_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_778':
          # code...Beans_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_777':
          # code...Beans_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_776':
          # code...Beans_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_775':
          # code...Beans_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_774':
          # code...Beans_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_773':
          # code...Beans_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_761':
          # code...Beans_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_738':
          # Beans_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_737':
          # code...Beans_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_736':
          # code...Beans_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_735':
          # code...Beans_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_734':
          # code...Beans_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_733':
          # code...Beans_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_732':
          # code...Beans_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_731':
          # code...Beans_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_730':
          # code...Beans_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_729':
          # code...Beans_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_728':
          # code...Beans_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_720':
          # code...Beans_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_710':
          # code...Beans_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_709':
          # code...Beans_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_707':
          # code...Beans_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_694':
          # code...Beans_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_681':
          # code...Beans_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_680':
          # code...Beans_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_679':
          # code...Beans_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_678':
          # code...Beans_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_677':
          # code...Beans_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_676':
          # code...Beans_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_675':
          # code...Beans_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_674':
          # code...Beans_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_673':
          # code...Beans_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_672':
          # code...Beans_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_671':
          # code...Beans_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_670':
          # code...Beans_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_669':
          # code...Beans_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_668':
          # code...Beans_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_666':
          # code...Type_Seeds_Beans_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_659':
          # code...Beans_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_649':
          # code...Beans_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_648':
          # code...Beans_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_646':
          # code...Beans_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_633':
          # code...Beans_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_620':
          # code...Beans_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_619':
          # code...Beans_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_618':
          # code...Beans_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_617':
          # code...Beans_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_616':
          # code...Beans_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_615':
          # code...Beans_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_614':
          # code...Beans_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_613':
          # code...Beans_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_612':
          # code...Beans_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_611':
          # code...Beans_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_610':
          # code...Beans_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_609':
          # code...Beans_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_608':
          # code...Beans_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_605':
          # code...Type_Seeds_Beans_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_603':
          # code...Beans_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_599':
          # code...Land_Mapped_Beans_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_596':
          # code...Beans_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_591':
          # code...Land_Mapped_Beans_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          #Maize.... data.............


          case 'ans_589':
          # code...Aware_Quality_Standards_Maize
          $data.=$f6obj->ApplyDataCleanUpAwareness($columnValue);
          break;

          case 'ans_583':
          # code...Who_Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataCleanUpTrained($columnValue);
          break;


          case 'ans_555':
          # code...Good_Agricultural_Practices_Trained_Maize
          $data.=$f6obj->validateGoodPratcicesTrained($columnValue);
          break;

          case 'ans_554':
          # code...Trained_Good_Agricultural_Practices
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;
          
          case 'ans_541':
          # code...ICT_Technology_Help_Maize
          $data.=$f6obj->ApplyDataICT($columnValue);
          break;

          case 'ans_532':
          # code...ICT_technologies_Used_Maize
          $data.=$f6obj->ApplyDataICTUsed($columnValue);
          break;


          case 'ans_520':
          # code...Reasons_Not_Using_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigation($columnValue);
          break;

           case 'ans_512':
          # code...Type_Of_Irrigation_Maize
          $data.=$f6obj->ApplyDataIrrigationUsed($columnValue);
          break;

           case 'ans_510':
          # code...Maize_Under_Irrigation
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_496':
          # code...Use_Paid_Labour_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_482':
          # code...Use_Paid_Labour_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_475':
          # code...Maize_PHH_MainChallenges_Season2
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_461':
          # code...Maize_PHH_Challenges_Season2
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_453':
          # code...Maize_PHH_Equipment_Season2
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_440':
          # code...PHH_Technology_Used_Maize_Season2
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_439':
          # code...Apply_PHH_Technology_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_427':
          # code...Store_Maize_Produce_Season2
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_415':
          # code...Dry_Maize_Season2
          $data.=$f6obj->validateDryProduce($columnValue);
          break;



          case 'ans_408':
          # code...Maize_PHH_MainChallenges_Season1
          $data.=$f6obj->validateMainPHHChallege($columnValue);
          break;


          case 'ans_394':
          # code...Maize_PHH_Challenges_Season1
          $data.=$f6obj->validatePHHChallege($columnValue);
          break;


          case 'ans_386':
          # code...Maize_PHH_Equipment_Season1
          $data.=$f6obj->validatePHHEquipment($columnValue);
          break;


          case 'ans_373':
          # code...PHH_Technology_Used_Maize_Season1
          $data.=$f6obj->validatePHHTechonology($columnValue);
          break;

          case 'ans_372':
          # code...Apply_PHH_Technology_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_360':
          # code...Store_Maize_Produce_Season1
          $data.=$f6obj->validateStoreProduce($columnValue);
          break;

          case 'ans_348':
          # code...Dry_Maize_Season1
          $data.=$f6obj->validateDryProduce($columnValue);
          break;


          case 'ans_337':
          # code...Maize_Purchased_Source_AgroInputs_Season2
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;


          case 'ans_314':
          # code...Maize_Purchased_Oxen_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_313':
          # code...Maize_Purchased_Axes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_312':
          # code...Maize_Purchased_Ploughs_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_311':
          # code...Maize_Purchased_Pangas_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_310':
          # code...Maize_Purchased_Hoes_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_309':
          # code...Maize_Purchased_Manure_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_308':
          # code...Maize_Purchased_Fungicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_307':
          # code...Maize_Purchased_Herbicides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_306':
          # code...Maize_Purchased_Pesticides_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_305':
          # code...Maize_Purchased_Chemical_Fertilizers_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_304':
          # code...Maize_Purchased_Improved_Seeds_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_292':
          # code...Maize_Purchased_Source_AgroInputs_Season1
          $data.=$f6obj->validatePurchasedAgroInputs($columnValue);
          break;



          case 'ans_269':
          # Maize_Purchased_Oxen_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_268':
          # code...Maize_Purchased_Axes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_267':
          # code...Maize_Purchased_Ploughs_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_266':
          # code...Maize_Purchased_Pangas_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_265':
          # code...Maize_Purchased_Hoes_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_264':
          # code...Maize_Purchased_Manure_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_263':
          # code...Maize_Purchased_Fungicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_262':
          # code...Maize_Purchased_Herbicides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_261':
          # code...Maize_Purchased_Pesticides_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_260':
          # code...Maize_Purchased_Chemical_Fertilizers_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_259':
          # code...Maize_Purchased_Improved seeds and seedlings_season1 
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_251':
          # code...Maize_Reason_Not_Agro_Practices_Season2
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_241':
          # code...Maize_Benefits__Agro_Farming_Season2
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;


          case 'ans_240':
          # code...Maize_Used_Agro_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_238':
          # code...Maize_Source_Mechanization_Season2
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_225':
          # code...Maize_Mechanization_Used_Season2
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;


          case 'ans_212':
          # code...Maize_Others_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_211':
          # code...Maize_Record_Keeping_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_210':
          # code...Maize_Farm_Planning_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_209':
          # code...Maize_Post_Harvest_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_208':
          # code...Maize_Construction_Bands_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_207':
          # code...Maize_Water_Harvesting_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_206':
          # code...Maize_Seed_Control_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_205':
          # code...Maize_Crop_Rotation_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_204':
          # code...Maize_Mulching_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_203':
          # code...Maize_Disease_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_202':
          # code...Maize_Weed_Management_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_201':
          # code...Maize_Organic_Farming_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_200':
          # code...Maize_Inorganic_Fertilizer_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_199':
          # code...Maize_Improved_Seed_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_197':
          # code...Type_Seeds_Maize_Season2
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_190':
          # code...Maize_Reason_Not_Agro_Practices_Season1
          $data.=$f6obj->validateReasonNotAgroPractices($columnValue);
          break;

          case 'ans_180':
          # code...Maize_Benefits__Agro_Farming_Season1
          $data.=$f6obj->validateBenefitsAgroPractices($columnValue);
          break;

          case 'ans_179':
          # code...Maize_Used_Agro_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_177':
          # code...Maize_Source_Mechanization_Season1
          $data.=$f6obj->validateSourceMechanization($columnValue);
          break;

          case 'ans_164':
          # code...Maize_Mechanization_Used_Season1
          $data.=$f6obj->validateUsedMechanization($columnValue);
          break;

          case 'ans_151':
          # code...Maize_Others_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_150':
          # code...Maize_Record_Keeping_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_149':
          # code...Maize_Farm_Planning_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_148':
          # code...Maize_Post_Harvest_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_147':
          # code...Maize_Construction_Bands_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_146':
          # code...Maize_Water_Harvesting_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_145':
          # code...Maize_Seed_Control_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_144':
          # code...Maize_Crop_Rotation_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_143':
          # code...Maize_Mulching_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_142':
          # code...Maize_Disease_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_141':
          # code...Maize_Weed_Management_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_140':
          # code...Maize_Organic_Farming_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_139':
          # code...Maize_Inorganic_Fertilizer_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_138':
          # code...Maize_Improved_Seed_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

          case 'ans_136':
          # code...Type_Seeds_Maize_Season1
          $data.=$f6obj->validateTypeOfSeeds($columnValue);
          break;

          case 'ans_134':
          # code...Maize_Cropping_System_Season2
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_130':
          # code...Land_Mapped_Maize_Season2
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;


          case 'ans_127':
          # code...Maize_Cropping_System_Season1
          $data.=$f6obj->validateCroppingsystem($columnValue);
          break;

          case 'ans_122':
          # code...Land_Mapped_Maize_Season1
          $data.=$f6obj->ApplyDataBoolen($columnValue);
          break;

         

        
          
          
          /* end Shaffic Cases */
          
          
          default:
          $data.="<td>".$columnValue."</td>";
          break;          
         }
        /* end of validation series */
				
				
				
				
				
						
			}
			
			
			$data.="</tr>";
			$x++;
			$n++;
	}

						$data.="</table>";
				
				
				
					/* end form6 retrieval */
					break;
					/* end form6 */
					
					
					case 'Form 7':
					
					/* start form1 retrieval */
						$sql = $qmobj->form7RawDataToExcelAll($reportingYear,$reportingPeriod);
						$result = @Execute($sql) or die(http(__line__));
						$data.="<table border=1 cellspacing=1 cellpadding=1><tr>";
						for($i = 0; $i < mysql_num_fields($result); $i++) {
							$field_info = mysql_fetch_field($result, $i);
							$data.="<th>{$field_info->name}</th>";
						}

						// Print the data
						$count=1;
						while($row = @FetchRecords($result)) {
							$color=$count%2==1?"evenrow3":"evenrow";
							$data.="<tr class=".$color.">";
							
								$data.="<td align='right'>".$count."</td>";
								$data.="<td align='left'>".$row['tbl_farmersId']."</td>";
								$data.="<td align='left'>".$row['reportingPeriod']."</td>";
								$data.="<td align='left'>".$row['groupName']."</td>";
								$data.="<td align='left'>".$row['zoneName']."</td>";
								$data.="<td align='left'>".$row['districtName']."</td>";
								$data.="<td align='left'>".$row['subcountyName']."</td>";
								$data.="<td align='left'>".$row['farmersVillage']."</td>";
								$data.="<td align='left'>".$row['farmersName']."</td>";
								$data.="<td align='left'>".$row['memberDstart']."</td>";
								$data.="<td align='left'>".$row['memberStatus']."</td>";
								$data.="<td align='left'>".$row['FarmerAge']."</td>";
								$data.="<td align='left'>".$row['farmersSex']."</td>";
								$data.="<td align='left'>".$row['farmersTel']."</td>";
								$data.="<td align='left'>".$row['hhName']."</td>";
								$data.="<td align='left'>".$row['hhAge']."</td>";
								$data.="<td align='left'>".$row['hhSex']."</td>";
								$data.="<td align='left'>".$row['hhHeadDStart']."</td>";
								$data.="<td align='left'>".$row['hhArea']."</td>";
								$data.="<td align='left'>".$row['hsComposition']."</td>";
								
								
							
							$data.="</tr>";
							$count ++;
						}

						$data.="</table>";
				
					/* end form1 retrieval */
					break;
					
					
					default:
					break;
				}
				
				
				
				

export($format,$data);
}

function view_frm3ExDisaggregationAll($row){

	$data.="<table style='background-color:#EBEBEB;' border='0' cellspacing='1' cellpadding='0' width='100%'>";

	$data.="<tr style='background-color:#70BAD9;'>
    <th colspan='2' rowspan='2'>Performance Indicators </th>
    <th colspan='13' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";



  $monthsArray=array('10','11','12','1','2','3');
  foreach ($monthsArray as $key) {
  $month= __month__coverter($key); 
  $result = substr($month, 0, 3); 
  $data.="<th >".$result."</th>"; 
  }
  $data.="<th >Total</th>";
  

  $data.=data_form3($row);

	

$data.="</table>";
					
return $data;			
}
//view_enterpriseTechAdoption
function view_enterpriseTechAdoption($region,$reporting_period,$cpma_year,$trName,$trCode,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1; 
$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['trName']=$trName;
$_SESSION['trCode']=$trCode;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$trName=($_SESSION['trName']<>''?$_SESSION['trName']:$trName);
$trCode=($_SESSION['trCode']<>''?$_SESSION['trCode']:$trCode);

$data.="<table width='100%' border='1' cellpadding=1 cellspacing=1 id='report'>";

$data.="<tr class='evenrow'>
<th colspan='8' ><center>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Enterprise Technology Adoption</center></th>
</tr>";

//===================data to be displayed=====================
$data.="<tr class=''>
  <td colspan=8>";
$data.="<table border='1' cellpadding=1 cellspacing=1 width='100%'>";
$data.="<tr>
    <th rowspan='2'>#</th>
    <th rowspan='2'>Name of BUSINESS</th>
    <th rowspan='2'>Code</th>
    <th rowspan='2'>Value Chain /Tech Area</th>
	<th rowspan='2'>Reporting Period</th>
    <th rowspan='2'>Type of Business (Trader, Exporter, Processor, Input dealer, others), Trade and business association or CBOs</th>
    <th rowspan='2'>Location (Urban/ Rural)</th>
    <th rowspan='2'>Duration with the Activity</th>
    <th rowspan='2'>Name of improved technology or management practice exposed to</th>
    <th rowspan='2'>Name of NEW improved technology or management practice adopted within the reporting period</th>
    <th rowspan='2'>Name of technology or management practices continued with from past reporting periods</th>
    <th rowspan='2'>Amount invested in Technology adoption (UGX)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr>
    <th>Name of Job holder</th>
    <th>Sex</th>
    <th>Date of engagement</th>
    <th>Time spent on job (Months)</th>
  </tr>";
  
  
  switch($cpma_year){
			case'CPMA Year One':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2012-10-01') and ('2013-09-30')
			and `t`.`year` in (2012,2013)";
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
			and `t`.`year` in (2013,2014)";
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `t`.`year` in (2014,2015)";
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `t`.`year` in (2015,2016)";
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `t`.`year` in (2016,2017)";
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod="and `t`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `t`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `t`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch($reporting_period){
			case'Oct 2012 - Mar 2013':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2012-10-01') and ('2013-03-31')
			and `t`.`year` in (2012,2013)
			";
			break;
			
			case'Apr 2013 - Sep 2013':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `t`.`year` in (2013)
			";
			break;
			
			case'Oct 2013 - Mar 2014':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `t`.`year` in (2013,2014)
			";
			break;
			
			case'Apr 2014 - Sep 2014':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `t`.`year` in (2014)
			";
			break;
			
			case'Oct 2014 - Mar 2015':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `t`.`year` in (2014,2015)
			";
			break;
			
			case'Apr 2015 - Sep 2015':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `t`.`year` in (2015)
			";
			break;
			
			case'Oct 2015 - Mar 2016':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `t`.`year` in (2015,2016)
			";
			break;
			
			case'Apr 2016 - Sep 2016':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `t`.`year` in (2016)
			";
			break;
			
			case'Oct 2016 - Mar 2017':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `t`.`year` in (2016,2017)
			";
			break;
			
			case'Apr 2017 - Sep 2017':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `t`.`year` in (2017)
			";
			break;
			
			case'Oct 2017 - Mar 2018':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Oct - Mar' 
			and `t`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `t`.`year` in (2017,2018)
			";
			break;
			
			case'Apr 2018 - Sep 2018':
			$reportingYearToPeriodCleaned="
			and `t`.`reportingPeriod` = 'Apr - Sep' 
			and `t`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `t`.`year` in (2018)
			";
			break;
			
			
			break;
			
			default:
			break;
		}
  
$query_string="SELECT 
t.*,
case
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2012-10-01') and ('2013-03-31') 
	and `t`.`year` in (2012,2013) 
	then 'Oct 2012 - Mar 2013'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2013-04-01') and ('2013-09-30') 
	and `t`.`year` in (2013) 
	then 'Apr 2013 - Sep 2013'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2013-10-01') and ('2014-03-31') 
	and `t`.`year` in (2013,2014) 
	then 'Oct 2013 - Mar 2014'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2014-04-01') and ('2014-09-30') 
	and `t`.`year` in (2014) 
	then 'Apr 2014 - Sep 2014'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2014-10-01') and ('2015-03-31') 
	and `t`.`year` in (2014,2015) 
	then 'Oct 2014 - Mar 2015'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2015-04-01') and ('2015-09-30') 
	and `t`.`year` in (2015) 
	then 'Apr 2015 - Sep 2015'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2015-10-01') and ('2016-03-31') 
	and `t`.`year` in (2015,2016) 
	then 'Oct 2015 - Mar 2016'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2016-04-01') and ('2016-09-30') 
	and `t`.`year` in (2016) 
	then 'Apr 2016 - Sep 2016'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2016-10-01') and ('2017-03-31') 
	and `t`.`year` in (2016,2017) 
	then 'Oct 2016 - Mar 2017'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2017-04-01') and ('2017-09-30') 
	and `t`.`year` in (2017) 
	then 'Apr 2017 - Sep 2017'
	
	when `t`.`reportingPeriod` = 'Oct - Mar' 
	and `t`.`reportingMonth` 
	between ('2017-10-01') and ('2018-03-31') 
	and `t`.`year` in (2017,2018) 
	then 'Oct 2017 - Mar 2018'
	
	when `t`.`reportingPeriod` = 'Apr - Sep' 
	and `t`.`reportingMonth` 
	between ('2018-04-01') and ('2018-09-30') 
	and `t`.`year` in (2017) 
	then 'Apr 2018 - Sep 2018'
	
else `t`.`reportingPeriod`
end 
as  `reportingPeriod_cleaned`,
tj.`dateOfEngagement` as `dateOfEngagementTj`,
tj.`nameOfJobHolder` as `nameOfJobHolderTj`,
tj.`sexOfJobHolder` as `sexOfJobHolderTj`, 
tj.`timeSpentOnJob` as `timeSpentOnJobTj`,
x.`tbl_tradersId`,
x.traderCode,
x.`traderName` 
FROM `tbl_techadoption` t join  `tbl_tech_adoption_jobHolder` tj
		 on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`),
		 `tbl_traders` x

WHERE x.`tbl_tradersId`=t.`businessTraderName`";
$reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$region=(!empty($region))?" AND x.`exporterRegion` = '%".$region."%' ":"";
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$trName=(!empty($trName))?" AND x.`tbl_tradersId` = '".$trName."' ":"";
$trCode=(!empty($trCode))?" AND x.`traderCode` LIKE '%".$trCode."%' ":"";
$query_string.=$region.$reporting_period.$cpma_year.$trName.$trCode;
					
$query_string.=" order by t.`tbl_techadoptionId` DESC";

  
  $x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $x=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
  
  while($row=mysql_fetch_array($new_query)){
			$data.="<tr class='alternating_rows'>";
			$data.="<td>".$x.".</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderName'])."</td>";
			$data.="<td>&nbsp;".retrieve_info_withSpecialCharactersNowordLimit($row['traderCode'])."</td>";
			$data.="<td>".$qmobj->cleanValueChainDisplay($row['valueChain'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['reportingPeriod_cleaned'])."</td>";			
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['typeOfBusiness'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['businessLocation'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['durationWithOldActivity'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['nameOfImprovedTech'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['techAdoptedInReportingPeriod'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['techContinuedFromPast'])."</td>";
			$data.="<td align='right'>".retrieve_info_withSpecialCharactersNowordLimit(number_format($row['amountInvestedInTechAdoption']))."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['nameOfJobHolderTj'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['sexOfJobHolderTj'])."</td>";
			$dateOfEngagement = sanitizeForm2DirtyDate(substr(retrieve_info_withSpecialCharactersNowordLimit($row['dateOfEngagementTj']), 0, 10));
			$data.="<td>".$dateOfEngagement."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['timeSpentOnJobTj'])."</td>";
			$data.="</tr>";
			$x++;
			$n++;
	}

$data.="".noRecordsFound($new_query,10)."";
$data.="</table></td></tr>";
//====================end of displayed data===================

export($format,$data);

}

//view_labourSavingTech
function view_labourSavingTech($reporting_period,$cpma_year,$valueChain,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1; 
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);


$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";
$data.="
			<tr>
				<th colspan='11'>
				Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Labour Saving Technology
				</th>
			</tr>
		";			

						//===================data to be displayed=====================
		$data.="
			<tr>
				<th rowspan='2' class='first-cell-header'>#</th>
				<th rowspan='2' >Name of Labour Saving technology</th>
				<th rowspan='2' class='small-cell-header'>Value Chain</th>
				<th rowspan='2' >Reporting Period</th>
				<th rowspan='2' >Labour saving concept</th>
				<th rowspan='2' >Person/Partner responsible for promoting adoption</th>
				<th rowspan='2' class='small-cell-header'>Amount invested in Technology adoption (UGX)</th>
				<th colspan='4' class='small-cell-header'>Jobs Created</th>
			</tr>
			<tr>
				<th >Name of Job holder</th>
				<th class='small-cell-header'>Sex</th>
				<th >Date of engagement</th>
				<th class='small-cell-header'>Time spent on job (Months)</th>
			</tr>
	</thead>
	<tbody>
		";
  
	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Apr - Sep') 
			and `l`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `l`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `l`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `l`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `l`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `l`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `l`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `l`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `l`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `l`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `l`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `l`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `l`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `l`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `l`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `l`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `l`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `l`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `l`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `l`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Oct - Mar' 
			and `l`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `l`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `l`.`reportingPeriod` = 'Apr - Sep' 
			and `l`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `l`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `l`.*,
		case
		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `l`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `l`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `l`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `l`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `l`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `l`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `l`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `l`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `l`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `l`.`reportingPeriod` = 'Oct - Mar' 
		and `l`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `l`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `l`.`reportingPeriod` = 'Apr - Sep' 
		and `l`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `l`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `l`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
		`v`.*
		from `tbl_laboursavingtech` as `l`, 
		tbl_mainvaluechain as `v`
		where `l`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%') ";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
		$query_string.=$reporting_period.$cpma_year.$valueChain;
		$query_string.=" order by `l`.`tbl_laboursavingtechId` desc";
		
		

	$n=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
  
	while($row_parent=mysql_fetch_array($new_query)){
		
		//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_labourSavingTech_jobHolder` WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				
		$data.="<tr>
					<td ".$row_span.">".$n.".</td>
					<td ".$row_span.">".$row_parent['labourSavingTech']."</td>
					<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>
					<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>
					<td ".$row_span.">".$row_parent['labourSavingConcept']."</td>
					<td ".$row_span.">".$row_parent['personResponsible']."</td>
					<td ".$row_span." align='right'>".number_format(($row_parent['amountInvestedOnTechInvestment']),2)."</td>";
					
				
				
				//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_labourSavingTech_jobHolder` 
					WHERE `labour_saving_tech_id`=".$row_parent['tbl_laboursavingtechId']." limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	
$data.="</table>";
//====================end of displayed data===================

export($format,$data);
}

//view_mediaPrograms
function view_mediaPrograms($reporting_period,$cpma_year,$valueChain,$mediaType,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1; 
$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];
$reportingPeriod=$_SESSION['reportingPeriod'];
$financialYear=$_SESSION['financialYear'];
$valueChain=$_SESSION['valueChain'];
$mediaType=$_SESSION['mediaType'];


$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";
				$data.="<tr>
					<th colspan='13'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/Media Programs
					</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
					<th rowspan='2' class='first-cell-header'>#</th>
					<th rowspan='2'>Awareness message designed</th>
					<th rowspan='2' class='small-cell-header'>Value Chain</th>
					<th rowspan='2'>Reporting Period</th>
					<th rowspan='2'>Category of Youth targeted</th>
					<th rowspan='2'>Anticipated results</th>
					<th rowspan='2'>Type of Media utilised</th>
					<th rowspan='2'>Broadcast contract period</th>
					<th rowspan='2'>Districts Covered</th>
					<th colspan='4' class='small-cell-header'>Jobs Created</th>
				</tr>

				<tr>
					<th class='small-cell-header'>Name of Job holder</th>
					<th class='small-cell-header'>Sex</th>
					<th class='small-cell-header'>Date of engagement</th>
					<th class='small-cell-header'>Time spent on job (Months)</th>
				</tr>
			</thead>
		<tbody>";
		
		switch(trim($cpma_year)){
			case trim('Project start up'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Apr - Sep') 
			and `m`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2013-10-01') and ('2014-09-30')
			and `m`.`year` in (2013,2014)";
			break;

			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `m`.`year` in (2014,2015)";
			break;

			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `m`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `m`.`year` in (2015,2016)";
			break;

			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `m`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `m`.`year` in (2016,2017)";
			break;

			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `m`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `m`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `m`.`year` in (2017,2018)";
			break;

			default:
			break;
			}

			switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `m`.`year` in (2013)
			";
			break;

			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `m`.`year` in (2013,2014)
			";
			break;

			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `m`.`year` in (2014)
			";
			break;

			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `m`.`year` in (2014,2015)
			";
			break;

			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `m`.`year` in (2015)
			";
			break;

			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `m`.`year` in (2015,2016)
			";
			break;

			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `m`.`year` in (2016)
			";
			break;

			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `m`.`year` in (2016,2017)
			";
			break;

			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `m`.`year` in (2017)
			";
			break;

			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Oct - Mar' 
			and `m`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `m`.`year` in (2017,2018)
			";
			break;

			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `m`.`reportingPeriod` = 'Apr - Sep' 
			and `m`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `m`.`year` in (2018)
			";
			break;

			default:
			break;
			}
		
		//Pick parent records		
		$query_string="
			select  `m`.*,
					case
					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2013-04-01') and ('2013-09-30') 
					and `m`.`year` in (2013) 
					then 'Apr 2012 - Sep 2013'
					
					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2013-10-01') and ('2014-03-31') 
					and `m`.`year` in (2013,2014) 
					then 'Oct 2013 - Mar 2014'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2014-04-01') and ('2014-09-30') 
					and `m`.`year` in (2014) 
					then 'Apr 2014 - Sep 2014'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2014-10-01') and ('2015-03-31') 
					and `m`.`year` in (2014,2015) 
					then 'Oct 2014 - Mar 2015'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2015-04-01') and ('2015-09-30') 
					and `m`.`year` in (2015) 
					then 'Apr 2015 - Sep 2015'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2015-10-01') and ('2016-03-31') 
					and `m`.`year` in (2015,2016) 
					then 'Oct 2015 - Mar 2016'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2016-04-01') and ('2016-09-30') 
					and `m`.`year` in (2016) 
					then 'Apr 2016 - Sep 2016'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2016-10-01') and ('2017-03-31') 
					and `m`.`year` in (2016,2017) 
					then 'Oct 2016 - Mar 2017'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2017-04-01') and ('2017-09-30') 
					and `m`.`year` in (2017) 
					then 'Apr 2017 - Sep 2017'

					when `m`.`reportingPeriod` = 'Oct - Mar' 
					and `m`.`reportingMonth` 
					between ('2017-10-01') and ('2018-03-31') 
					and `m`.`year` in (2017,2018) 
					then 'Oct 2017 - Mar 2018'

					when `m`.`reportingPeriod` = 'Apr - Sep' 
					and `m`.`reportingMonth` 
					between ('2018-04-01') and ('2018-09-30') 
					and `m`.`year` in (2018) 
					then 'Apr 2018 - May 2018'
					
				else `m`.`reportingPeriod`
				end 
				as  `reportingPeriod_cleaned`,
				`v`.*,
				DATEDIFF( `m`.`toDate` , `m`.`fromDate` ) AS `duration`
				from `tbl_mediaprograms` AS `m`,
				tbl_mainvaluechain as `v`
				where `m`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')";
				
				$reporting_period=(!empty($cpma_year))?'':$reporting_period;
				$cpma_year=(!empty($reporting_period))?'':$cpma_year;
				$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
				$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
				$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
				$mediaType=(!empty($mediaType))?" AND `m`.`typeOfMedia` LIKE  '%".$mediaType."%' ":"";
				$query_string.=$reporting_period.$cpma_year.$valueChain.$mediaType;
				$query_string.=" order by `m`.`tbl_mediaprogramsId` desc";

				$n=1;
				$query_=mysql_query($query_string)or die(http(__line__));
				/**************
				*paging parameters
				*
				****/
				$max_records = mysql_num_rows($query_);
				$num_pages=ceil($max_records/$records_per_page);
				$offset = ($cur_page-1)*$records_per_page;
				$n=$offset+1;
				$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
		
		while($row_parent=mysql_fetch_array($new_query)){
			//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_mediaprogram_jobholder` WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
				$data.="
				<tr>
					<td ".$row_span.">".$n.".</td>
					<td ".$row_span.">".$row_parent['mediaAwarenessMessage']."</td>
					<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>
					<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>
					<td ".$row_span.">".$row_parent['categoryYouthTargeted']."</td>";					
					$data.="<td ".$row_span.">".$row_parent['anticipatedResults']."</td>";
					$typeOfMedia=$row_parent['typeOfMedia'];
					$data.="<td ".$row_span.">
					<ul>";
					$a = mysql_query("SELECT l . * FROM `tbl_lookup` l 
					WHERE l.`classCode`='33' 
					AND l.`status` = 'Yes' 
					ORDER BY l.`code` ASC")or die(http(__line__));
					while($b = mysql_fetch_array($a)){
					$display=(strpos($typeOfMedia, $b['codeName']) !==false)?"".$b['codeName']."":"";
					if($display<>'') {
					$data.="<li>".$display."</li>";
					}
					else{
					$data.="";   
					}
					}
					@mysql_free_result($a); 
					$data.="</ul>
					</td>";
					$duration=((strpos($row_parent['duration'], '-'))=== false)?$row_parent['duration']:str_replace("-","","".$row_parent['duration']."");
					$data.="<td ".$row_span.">".$duration." days</td>
					<td ".$row_span.">".$row_parent['coverage']."</td>";
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_mediaprogram_jobholder` 
					WHERE `media_program_id`=".$row_parent['tbl_mediaprogramsId']." limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,13)."";	
$data.="</tbody>
	</table>";
//====================end of displayed data===================


export($format,$data);

}
//view_partnerships

function view_partnerships($reporting_period,$cpma_year,$valueChain,$partnerType,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['partnerType']=$partnerType;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data.="<table class='standard-report-grid' width='100%' border='0' cellspacing='1' cellpadding='1'>";

$data.="<tr>
	<th colspan='12'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/PUBLIC PRIVATE PARTNERSHIPS</th>
</tr>";			

//===================data to be displayed=====================
$data.="<tr>
    <th rowspan='2' class='first-cell-header'>#</th>
    <th rowspan='2'>Name of partner/Business / Grantee</th>
	<th rowspan='2'>Reporting Period</th>
    <th rowspan='2' class='small-cell-header'>Value chain</th>
    <th rowspan='2'>Partnership Focus (USE Agricultural production, Agricultural PH transformation, Multi-focus, others)</th>
    <th colspan='3'>Value of Partnership (Ushs)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Activity</th>
    <th class='small-cell-header'>Partner</th>
    <th class='small-cell-header'>Total</th>
    <th>Name of Job holder</th>
    <th class='small-cell-header'>Sex</th>
    <th class='small-cell-header'>Date of engagement</th>
    <th class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  </thead>
  <tbody>";
  
	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Apr - Sep') 
			and `p`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `p`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `p`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `p`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `p`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `p`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `p`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `p`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `p`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `p`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `p`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `p`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `p`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `p`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `p`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `p`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `p`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `p`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Oct - Mar' 
			and `p`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `p`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `p`.`reportingPeriod` = 'Apr - Sep' 
			and `p`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `p`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `p`.*,
		case
		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `p`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `p`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `p`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `p`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `p`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `p`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `p`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `p`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `p`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `p`.`reportingPeriod` = 'Oct - Mar' 
		and `p`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `p`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `p`.`reportingPeriod` = 'Apr - Sep' 
		and `p`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `p`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `p`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
		`v`.* 
		from `tbl_public_private_partnership` as `p`,
		tbl_mainvaluechain as `v`
		where `p`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%') "; 
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year.$valueChain;
		$query_string.=" group by `p`.`tbl_partnershipId`,`p`.`reportingPeriod`,`p`.`year` ";
		$query_string.=" order by `p`.`tbl_partnershipId` desc";

 $n=1;
	$query_=mysql_query($query_string)or die(mysql_error());
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(mysql_error());
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_partnership_jobHolder` WHERE `partnership_id`=".$row_parent['tbl_partnershipId']."";
			$q_child=Execute($s_child) or die(mysql_error());			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
			$data.="<tr>";
			$data.="<td>".$n.". </td>";
			$data.="<td>".($row_parent['namePartner'])."</td>";
			$data.="<td>".($row_parent['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td>".($row_parent['partnershipFocus'])."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valueActivity']))."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valuePartner']))."</td>";
			$data.="<td align='right'>".number_format(($row_parent['valueTotal']))."</td>";
			
			
			//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_partnership_jobHolder` 
					WHERE `partnership_id`=".$row_parent['tbl_partnershipId']." limit 0,1")or die(mysql_error());
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_partnership_jobHolder` 
					WHERE `partnership_id`=".$row_parent['tbl_partnershipId']." limit 1,100000")or die(mysql_error());
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,11)."";


  
$data.="</tbobdy>
</table>";

export($format,$data);

}

//view_bankLoans
function view_bankLoans($reporting_period,$cpma_year,$valueChain,$partnerType,$cur_page,$records_per_page,$format){

$qmobj = new QueryManager('');

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['partnerType']=$partnerType;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);



$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";

$data.="<tr>
					<th colspan='19'>Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/BANK LOANS</th>
				</tr>";			

				//===================data to be displayed=====================
				$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of MSME (Include Individual farmers and VAs as applicable)</th>
	<th rowspan='3' class='small-cell-header'>Value Chain</th>
	<th rowspan='3' class='small-cell-header'>Partner Type</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>No. of Full time Employees</th>
    <th rowspan='3' class='small-cell-header'>Sex of MSME (F/M)</th>
    <th rowspan='3'>Date of Birth</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3' class='small-cell-header'>Amount of Loan Accessed (UGX)</th>
    <th rowspan='3'>Type of Loan Receipient (Farmer, Local trader, Processors, Exporter etc)</th>
    <th colspan='3' rowspan='2'>Sex of recipient (Female, Male,Joint)</th>
    <th rowspan='3'>Banking Institution(s)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr height='28'>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Joint</th>
  </tr>
  </thead>
  <tbody>";
  
  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Apr - Sep') 
			and `b`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `b`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `b`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `b`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `b`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `b`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `b`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `b`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `b`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `b`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `b`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `b`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `b`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `b`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `b`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `b`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `b`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `b`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `b`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `b`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Oct - Mar' 
			and `b`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `b`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `b`.`reportingPeriod` = 'Apr - Sep' 
			and `b`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `b`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select 1,  `b`.*,
		case
		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `b`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `b`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `b`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `b`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `b`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `b`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `b`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `b`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `b`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `b`.`reportingPeriod` = 'Oct - Mar' 
		and `b`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `b`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `b`.`reportingPeriod` = 'Apr - Sep' 
		and `b`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `b`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `b`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
from `tbl_bankloans` as `b` 
where 1=1 "; 
$reporting_period=(!empty($cpma_year))?'':$reporting_period;
$cpma_year=(!empty($reporting_period))?'':$cpma_year;
$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
$valueChain=(!empty($valueChain))?" AND `b`.`valueChain` = '".$valueChain."' ":"";
$partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `b`.`msmeType` = '".$partnerType."' ":"";
$query_string.=$reporting_period.$cpma_year.$valueChain.$partnerType;
$query_string.=" order by `b`.`tbl_bankLoanId` desc";



	$x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
	/* $obj->alert(($query_string." limit ".$offset.",".$records_per_page)); */
  
  while($row_parent=mysql_fetch_array($new_query)){
	  //determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bank_loans_jobHolder` WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
	  
	  
			$data.="<tr>";
			$data.="<td>".$n.".</td>";
			$data.="<td>".($row_parent['nameMSME'])."</td>";
			$data.="<td>".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td>".($row_parent['msmeType'])."</td>";
			$data.="<td>".($row_parent['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".($row_parent['numberOfFullTimeEmployees'])."</td>";
			$data.="<td>".($row_parent['sexOfMSME'])."</td>";
			$data.="<td>".substr(($row_parent['dateOfBirth']), 0, 10)."</td>";
			$data.="<td>".($row_parent['cpmAssistance'])."</td>";
			$data.="<td align='right'>".number_format(($row_parent['amountLoanAccessed']))."</td>";
			$data.="<td>".($row_parent['typeOfLoanRecepient'])."</td>";
			$recipientSex=$row_parent['recipientSex'];
			$wrong=''.'<font color=\'red\'>&#10060;</font>'.'';
			$tick=''.'<font color=\'green\'>&#10004;</font>'.'';
			$data.="<td>".($recipientSex=='M'?$tick:$wrong)."</td>";
			$data.="<td>".($recipientSex=='F'?$tick:$wrong)."</td>";
			$data.="<td>".($recipientSex=='Joint'?$tick:$wrong)."</td>";
			$data.="<td>".($row_parent['bankingInstitution'])."</td>";
			
			
		//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_bank_loans_jobHolder` 
					WHERE `bankLoan_id`=".$row_parent['tbl_bankLoanId']." limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,18)."";	



  
$data.="</tbody>
</table>";

export($format,$data);

}

//view_inputSales
function view_inputSales($reporting_period,$cpma_year,$partnerType,$cur_page,$records_per_page,$format){

$qmobj = new QueryManager('');


$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['partnerType']=$partnerType;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);



$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";

$data.="<tr>
	<th colspan='22'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/INPUT SALES</th>
</tr>";			

//===================data to be displayed=====================
$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Middle Value Chain Actor (Trader, Exporter, Processor, Input dealer), Trade and business association or CBOs - (Include Vas giving independent service</th>
	<th rowspan='3'>Date of Start of Inputs Sales Business</th>
	<th rowspan='3' class='large-cell-header'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
    <th colspan='3' rowspan='2' class='small-cell-header'>Number of VA/Messengers assisting in Promoting Input Access to farmers</th>
    <th colspan='3' rowspan='2' class='small-cell-header'>Number of Farmers Benefiting</th>
    <th colspan='6' rowspan='2' class='small-cell-header'>Value of Inputs Sold by Input type</th>
    <th rowspan='3' class='small-cell-header'>Amount invested in Setting up Input Sales Business (UGX)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2' class='small-cell-header'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Total</th>
    <th class='small-cell-header'>Male</th>
    <th class='small-cell-header'>Female</th>
    <th class='small-cell-header'>Total</th>
    <th class='small-cell-header'>Seeds/ Seedling</th>
    <th class='small-cell-header'>Chemicals</th>
    <th class='small-cell-header'>Fertilizers</th>
    <th class='small-cell-header'>Herbicides</th>
    <th class='small-cell-header'>Farm Implements</th>
    <th class='small-cell-header'>Others</th>
  </tr>
  </thead>
  <tbody>";

	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Apr - Sep') 
			and `sm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `sm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `sm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `sm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `sm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `sm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `sm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `sm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `sm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `sm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `sm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `sm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `sm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `sm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `sm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}		
  
		$query_string="select
		`s`.`id`,  
		`s`.`dateOfStartOfinputsSalesBusiness`,
		`s`.`nameOfMiddleValueChainActor`,
		`sm`.`dateSubmission`,
		`sm`.`reportingPeriod`,
		`sm`.`year`, 
		`sm`.`reportingMonth`
		from `tbl_input_sales` as `s`
		join `inputsales_metadata` as `sr` on (`sr`.`sales_id` = `s`.`id`)
		join `tbl_input_sales_meta_data` as `sm` on (`sm`.`id` = `sr`.`metadata_id`)
		where `sm`.`input_sales_id`	is not null ";
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year;	
		$query_string.=" group by `s`.`id` ";
		$query_string.=" order by `s`.`id` desc";
	
	//$obj->alert($query_string);



	$x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
	  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Apr - Sep') 
			and `sm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `sm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `sm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `sm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `sm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `sm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `sm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `sm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `sm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `sm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `sm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `sm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `sm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `sm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `sm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `sm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Oct - Mar' 
			and `sm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `sm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `sm`.`reportingPeriod` = 'Apr - Sep' 
			and `sm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `sm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$s_child="select  `sm`.*,
		case
		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `sm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `sm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `sm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `sm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `sm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `sm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `sm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `sm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `sm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `sm`.`reportingPeriod` = 'Oct - Mar' 
		and `sm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `sm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `sm`.`reportingPeriod` = 'Apr - Sep' 
		and `sm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `sm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `sm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
		FROM `tbl_input_sales_meta_data` as `sm`
		WHERE `sm`.`input_sales_id`='".$row_parent['id']."'";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$s_child.=$reporting_period.$cpma_year;	

		$s_child.=" order by `sm`.`input_sales_id` ";

		//$q_child=Execute($s_child) or die(http(__line__));		
		$q_child=Execute($s_child) or die(mysql_error()).' on line '.__LINE__;			
		$num_child_records=mysql_num_rows($q_child);	
		//$obj->alert($num_child_records);			
		$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
		$col_span=($num_child_records>1)?"colspan='2'":"";
		$v=$n+$num_child_records;

	  
		$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".</td>";
		$data.="<td ".$row_span.">".($row_parent['nameOfMiddleValueChainActor'])."</td>";		
		$data.="<td ".$row_span.">".$qmobj->cleanDirtyDates($row_parent['dateOfStartOfinputsSalesBusiness'])."</td>";
		//return first row of child records
		$s_first_child = mysql_query("SELECT `sm`.*,
								case
								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2013-04-01') and ('2013-09-30') 
								and `sm`.`year` in (2013) 
								then 'Apr 2012 - Sep 2013'
								
								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2013-10-01') and ('2014-03-31') 
								and `sm`.`year` in (2013,2014) 
								then 'Oct 2013 - Mar 2014'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2014-04-01') and ('2014-09-30') 
								and `sm`.`year` in (2014) 
								then 'Apr 2014 - Sep 2014'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2014-10-01') and ('2015-03-31') 
								and `sm`.`year` in (2014,2015) 
								then 'Oct 2014 - Mar 2015'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2015-04-01') and ('2015-09-30') 
								and `sm`.`year` in (2015) 
								then 'Apr 2015 - Sep 2015'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2015-10-01') and ('2016-03-31') 
								and `sm`.`year` in (2015,2016) 
								then 'Oct 2015 - Mar 2016'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2016-04-01') and ('2016-09-30') 
								and `sm`.`year` in (2016) 
								then 'Apr 2016 - Sep 2016'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2016-10-01') and ('2017-03-31') 
								and `sm`.`year` in (2016,2017) 
								then 'Oct 2016 - Mar 2017'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2017-04-01') and ('2017-09-30') 
								and `sm`.`year` in (2017) 
								then 'Apr 2017 - Sep 2017'

								when `sm`.`reportingPeriod` = 'Oct - Mar' 
								and `sm`.`reportingMonth` 
								between ('2017-10-01') and ('2018-03-31') 
								and `sm`.`year` in (2017,2018) 
								then 'Oct 2017 - Mar 2018'

								when `sm`.`reportingPeriod` = 'Apr - Sep' 
								and `sm`.`reportingMonth` 
								between ('2018-04-01') and ('2018-09-30') 
								and `sm`.`year` in (2018) 
								then 'Apr 2018 - May 2018'
								
							else `sm`.`reportingPeriod`
							end 
							as  `reportingPeriod_cleaned`
		FROM `tbl_input_sales_meta_data` as `sm`
		WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 0,1")or die(http(__line__));
		$first_child_row = mysql_fetch_array($s_first_child );	
					
					$data.="<td>".($first_child_row['reportingPeriod_cleaned'])."</td>";					
					$data.="<td>".($first_child_row['valueChain'])."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfMessengersMale'])+($first_child_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingFemale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['numberOfFarmersBenefitingFemale'])+($first_child_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldBySeeds']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByChemicals']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByFertilizers']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByHerbicides']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByFarmImplements']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['inputsSoldByOthers']))."</td>";
					$data.="<td align='right'>".number_format(($first_child_row['amountInvestedInSettingUpInputSalesBusiness']))."</td>";
					$data.="<td>".($first_child_row['nameOfJobHolder'])."</td>";
					$data.="<td>".($first_child_row['sexOfJobHolder'])."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>";
					$data.="<td>".($first_child_row['timeSpentOnJob'])."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT `sm`.*,
						case
							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2013-04-01') and ('2013-09-30') 
							and `sm`.`year` in (2013) 
							then 'Apr 2012 - Sep 2013'
							
							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2013-10-01') and ('2014-03-31') 
							and `sm`.`year` in (2013,2014) 
							then 'Oct 2013 - Mar 2014'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2014-04-01') and ('2014-09-30') 
							and `sm`.`year` in (2014) 
							then 'Apr 2014 - Sep 2014'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2014-10-01') and ('2015-03-31') 
							and `sm`.`year` in (2014,2015) 
							then 'Oct 2014 - Mar 2015'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2015-04-01') and ('2015-09-30') 
							and `sm`.`year` in (2015) 
							then 'Apr 2015 - Sep 2015'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2015-10-01') and ('2016-03-31') 
							and `sm`.`year` in (2015,2016) 
							then 'Oct 2015 - Mar 2016'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2016-04-01') and ('2016-09-30') 
							and `sm`.`year` in (2016) 
							then 'Apr 2016 - Sep 2016'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2016-10-01') and ('2017-03-31') 
							and `sm`.`year` in (2016,2017) 
							then 'Oct 2016 - Mar 2017'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2017-04-01') and ('2017-09-30') 
							and `sm`.`year` in (2017) 
							then 'Apr 2017 - Sep 2017'

							when `sm`.`reportingPeriod` = 'Oct - Mar' 
							and `sm`.`reportingMonth` 
							between ('2017-10-01') and ('2018-03-31') 
							and `sm`.`year` in (2017,2018) 
							then 'Oct 2017 - Mar 2018'

							when `sm`.`reportingPeriod` = 'Apr - Sep' 
							and `sm`.`reportingMonth` 
							between ('2018-04-01') and ('2018-09-30') 
							and `sm`.`year` in (2018) 
							then 'Apr 2018 - May 2018'
							
						else `sm`.`reportingPeriod`
						end 
						as  `reportingPeriod_cleaned`
						FROM `tbl_input_sales_meta_data` as `sm`
						WHERE `sm`.`input_sales_id`='".$row_parent['id']."' limit 1,100000")or die(mysql_error().' on line '.__LINE__);
					while($other_children_row = mysql_fetch_array($s_other_children )){
						$data.="<tr>";					
						$data.="<td>".($other_children_row['reportingPeriod_cleaned'])."</td>";						
						$data.="<td>".($other_children_row['valueChain'])."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfMessengersMale'])+($other_children_row['numberOfMessengersFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingFemale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['numberOfFarmersBenefitingFemale'])+($other_children_row['numberOfFarmersBenefitingMale']))."</td>";
					$data.="<td align='right'>".number_format(($other_children_row['inputsSoldBySeeds']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByChemicals']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByFertilizers']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByHerbicides']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByFarmImplements']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['inputsSoldByOthers']))."</td>";
						$data.="<td align='right'>".number_format(($other_children_row['amountInvestedInSettingUpInputSalesBusiness']))."</td>";
						$data.="<td>".($other_children_row['nameOfJobHolder'])."</td>";
						$data.="<td>".($other_children_row['sexOfJobHolder'])."</td>";
						$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
						$data.="<td>".$dateOfEngagement."</td>";
						$data.="<td>".($other_children_row['timeSpentOnJob'])."</td>";					
						$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";
$data.="</tbody>
</table>";

export($format,$data);
}

//view_phh
function view_phh($reporting_period,$cpma_year,$partnerType,$cur_page,$records_per_page,$format){

$qmobj = new QueryManager('');

$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['partnerType']=$partnerType;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$partnerType=($_SESSION['partnerType']<>''?$_SESSION['partnerType']:$partnerType);


$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";

$data.="<tr>
	<th colspan='14'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/PHH</th>
</tr>";			

//===================data to be displayed=====================
$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Middle Value Chain Actor</th>    
	<th rowspan='3' class='small-cell-header'>Date Store was refurbished or Newly constructed/hired</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
    <th rowspan='3'>Assistance rendered by the Activity</th>
    <th rowspan='3' class='small-cell-header'>Size of Store Refurbished or Installed Use Formulae (L*W*H) in M3</th>
    <th colspan='2' rowspan='2'>Storage Type (Indicate M3 for each type)</th>
    <th rowspan='3' class='small-cell-header'>Amount invested in refurbishing or Installing a store (UGX)</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2' class='small-cell-header'>Date of engagement</th>
    <th rowspan='2' class='small-cell-header'>Time spent on job (Months)</th>
  </tr>
  <tr>
    <th class='small-cell-header'>Dry Goods</th>
    <th class='small-cell-header'>Cold Chain Storage</th>
  </tr>
  </thead>
  <tbody>";
  
		switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Apr - Sep') 
			and `pm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `pm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `pm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `pm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `pm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `pm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `pm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `pm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `pm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `pm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `pm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `pm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `pm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `pm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `pm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}		
  
		$query_string="select
		`p`.`id`,  
		`p`.`dateOfStartOfinputsSalesBusiness`,
		`p`.`nameOfMiddleValueChainActor`,
		`pm`.`dateSubmission`,
		`pm`.`reportingPeriod`,
		`pm`.`year`, 
		`pm`.`reportingMonth`
		from `tbl_phh` as `p`
		join `phh_metadata` as `pr` on (`pr`.`phh_id` = `p`.`id`)
		join `tbl_phh_meta_data` as `pm` on (`pm`.`id` = `pr`.`metadata_id`)
		where `pm`.`phh_id`	is not null ";
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `p`.`msmeType` = '".$partnerType."' ":""; */
		$query_string.=$reporting_period.$cpma_year;	
		$query_string.=" group by `p`.`id` ";
		$query_string.=" order by `p`.`id` desc";
	
	
	
	
	//$obj->alert($query_string);



	$x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
	  switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Apr - Sep') 
			and `pm`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `pm`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `pm`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `pm`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `pm`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `pm`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `pm`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `pm`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `pm`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `pm`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `pm`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `pm`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `pm`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `pm`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `pm`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `pm`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Oct - Mar' 
			and `pm`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `pm`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `pm`.`reportingPeriod` = 'Apr - Sep' 
			and `pm`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `pm`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
  
	$s_child="select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		WHERE `pm`.`phh_id`='".$row_parent['id']."'";
		
		$reporting_period=(!empty($cpma_year))?'':$reporting_period;
		$cpma_year=(!empty($reporting_period))?'':$cpma_year;
		$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
		$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
		/* $partnerType=(!empty($partnerType) and ($partnerType !=1))?" AND `s`.`msmeType` = '".$partnerType."' ":""; */
		$s_child.=$reporting_period.$cpma_year;	

		$s_child.=" order by `pm`.`phh_id` ";

		//$q_child=Execute($s_child) or die(http(__line__));		
		$q_child=Execute($s_child) or die(mysql_error());			
		$num_child_records=mysql_num_rows($q_child);	
		//$obj->alert($num_child_records);			
		$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
		$col_span=($num_child_records>1)?"colspan='2'":"";
		$v=$n+$num_child_records;

	  
		$data.="<tr>";
		$data.="<td ".$row_span.">".$n.".</td>";
		$data.="<td ".$row_span.">".($row_parent['nameOfMiddleValueChainActor'])."</td>";		
		$data.="<td ".$row_span.">".$qmobj->cleanDirtyDates($row_parent['dateOfStartOfinputsSalesBusiness'])."</td>";
		//return first row of child records
		$s_first_child = mysql_query("select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		where `pm`.`phh_id`='".$row_parent['id']."' limit 0,1")or die(http(__line__));
		$first_child_row = mysql_fetch_array($s_first_child );	
					
					$data.="<td>".($first_child_row['reportingPeriod_cleaned'])."</td>";				
							$data.="<td>".($first_child_row['valueChain'])."</td>";
							$data.="<td align='right'>".$first_child_row['assistanceRenderedByActivity']."</td>";
							$data.="<td align='right'>".number_format(($first_child_row['sizeOfStoreRefurbished']))."</td>";
							$data.="<td align='right'>".$first_child_row['storageTypeForDryGoods']."</td>";
							$data.="<td align='right'>".$first_child_row['storageTypeForColdChain']."</td>";
							$data.="<td align='right'>".number_format(($first_child_row['amountInvestedInRefurbishing']))."</td>";
							$data.="<td>".($first_child_row['nameOfJobHolder'])."</td>";
							$data.="<td>".($first_child_row['sexOfJobHolder'])."</td>";
							$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
							$data.="<td>".$dateOfEngagement."</td>";
							$data.="<td>".($first_child_row['timeSpentOnJob'])."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("select 
	case
		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `pm`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `pm`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `pm`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `pm`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `pm`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `pm`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `pm`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `pm`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `pm`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `pm`.`reportingPeriod` = 'Oct - Mar' 
		and `pm`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `pm`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `pm`.`reportingPeriod` = 'Apr - Sep' 
		and `pm`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `pm`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `pm`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
	 `pm`.* 
	from `tbl_phh_meta_data` as `pm`
		where `pm`.`phh_id`='".$row_parent['id']."' limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
						$data.="<tr>";					
							$data.="<td>".($other_children_row['reportingPeriod_cleaned'])."</td>";				
							$data.="<td>".($other_children_row['valueChain'])."</td>";
							$data.="<td align='right'>".$other_children_row['assistanceRenderedByActivity']."</td>";
							$data.="<td align='right'>".number_format(($other_children_row['sizeOfStoreRefurbished']))."</td>";
							$data.="<td align='right'>".$other_children_row['storageTypeForDryGoods']."</td>";
							$data.="<td align='right'>".$other_children_row['storageTypeForColdChain']."</td>";
							$data.="<td align='right'>".number_format(($other_children_row['amountInvestedInRefurbishing']))."</td>";
							$data.="<td>".($other_children_row['nameOfJobHolder'])."</td>";
							$data.="<td>".($other_children_row['sexOfJobHolder'])."</td>";
							$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
							$data.="<td>".$dateOfEngagement."</td>";
							$data.="<td>".($other_children_row['timeSpentOnJob'])."</td>";				
						$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,14)."";	  
$data.="</tbody>
</table>";

export($format,$data);

}

//view_youthApprentice
function view_youthApprentice($reporting_period,$cpma_year,$valueChain,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);



$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";
	
		$data.="<tr>
		<th colspan='17'>
					Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/YOUTH APPRENTICESHIPS
					</th>
		</tr>";

		//===================data to be displayed=====================
		$data.="<tr>
			<th rowspan='4' class='first-cell-header'>#</th>
			<th rowspan='4'>Name of Business incorporating the youth apprenticeship</th>
			<th rowspan='4' class='small-cell-header'>Sex of Owner</th>
			<th rowspan='4' class='small-cell-header'>Value chain</th>
			<th rowspan='4'>Reporting Period</th>
			<th colspan='6' rowspan='2' class='small-cell-header'>Number of Youth attached</th>
			<th rowspan='4'>Apprenticeship period in the Agreement</th>
			<th rowspan='4' >Anticipated outcomes from the apprenticeship program</th>
			<th colspan='4' class='small-cell-header'>Jobs Created</th>
		</tr>
		<tr>
			<th rowspan='3' class='large-cell-header'>Name of Job holder</th>
			<th rowspan='3' class='small-cell-header'>Sex</th>
			<th rowspan='3'>Date of engagement</th>
			<th rowspan='3' class='small-cell-header'>Time spent on job (Months)</th>
		</tr>
		<tr>
			<th colspan='2'>Female</th>
			<th colspan='2'>Male</th>
			<th colspan='2'>Total</th>
		</tr>
		<tr>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
			<th class='small-cell-header'>New</th>
			<th class='small-cell-header'>Old</th>
		</tr>
	</thead>
	<tbody>";
	
			switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Apr - Sep') 
			and `y`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `y`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `y`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `y`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `y`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `y`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `y`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `y`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `y`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `y`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `y`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `y`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `y`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `y`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `y`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `y`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `y`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `y`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `y`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `y`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Oct - Mar' 
			and `y`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `y`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `y`.`reportingPeriod` = 'Apr - Sep' 
			and `y`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `y`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `y`.*,
		case
		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `y`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `y`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `y`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `y`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `y`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `y`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `y`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `y`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `y`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `y`.`reportingPeriod` = 'Oct - Mar' 
		and `y`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `y`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `y`.`reportingPeriod` = 'Apr - Sep' 
		and `y`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `y`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `y`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`,
  DATEDIFF( `y`.`fromDate`,`y`.`toDate`) AS `duration`,
  `v`.*	
  from `tbl_youthapprentice` as `y`,
  tbl_mainvaluechain as `v`
  where `y`.valueChain LIKE CONCAT('%', SUBSTRING(`v`.`name`, 3, 20) ,'%')  ";
				
	$reporting_period=(!empty($cpma_year))?'':$reporting_period;
	$cpma_year=(!empty($reporting_period))?'':$cpma_year;
	$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
	$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
	$valueChain=(!empty($valueChain))?" AND `v`.`tbl_chainId` = '".$valueChain."' ":"";
	$query_string.=$reporting_period.$cpma_year.$valueChain;
	$query_string.=" group BY `y`.`tbl_youthapprenticeId` ";
	$query_string.=" order BY `y`.`tbl_youthapprenticeId` desc";

			$n=1;
			$query_=mysql_query($query_string)or die(http(__line__));
			 /**************
			 *paging parameters
			 *
			 ****/
			 $max_records = mysql_num_rows($query_);
			 $num_pages=ceil($max_records/$records_per_page);
			 $offset = ($cur_page-1)*$records_per_page;
			 $n=$offset+1;
			 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
			
		  
		  while($row_parent=mysql_fetch_array($new_query)){
			  
			  //determining the number of child records for each row
				$s_child="SELECT * FROM `tbl_apprenticeship_jobholder` WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']."";
				$q_child=Execute($s_child) or die(http(__line__));			
				$num_child_records=mysql_num_rows($q_child);	
				//$obj->alert($num_child_records);			
				$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
				$col_span=($num_child_records>1)?"colspan='2'":"";
				$v=$n+$num_child_records;
				
					$data.="<tr>";
					$data.="<td ".$row_span.">".$n.".</td>";
					$data.="<td ".$row_span.">".($row_parent['nameofBusiness'])."</td>";
					$data.="<td ".$row_span.">".($row_parent['sexBusinessOwner'])."</td>";
					$data.="<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
					$data.="<td ".$row_span.">".($row_parent['reportingPeriod_cleaned'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedFemaleNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedFemaleOld'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedMaleNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedMaleOld'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedTotalNew'])."</td>";
					$data.="<td ".$row_span." align='right'>".($row_parent['num_youthAttachedTotalOld'])."</td>";
					$duration=((strpos($row_parent['duration'], '-'))=== false)?$row_parent['duration']:str_replace("-","","".$row_parent['duration']."");
					$data.="<td  ".$row_span." align='right'>".$duration." days</td>";
					$data.="<td ".$row_span.">".($row_parent['anticipatedOutcome'])."</td>";
					
					
					//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_apprenticeship_jobholder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_apprenticeship_jobholder` 
					WHERE `apprenticeship_id`=".$row_parent['tbl_youthapprenticeId']." limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,17)."";	


  
$data.="</tbody>
	</table>";

export($format,$data);

}

function view_bds($reporting_period,$cpma_year,$valueChain,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1;
$inc=1;

$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['valueChain']=$valueChain;
$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$valueChain=($_SESSION['valueChain']<>''?$_SESSION['valueChain']:$valueChain);

$data.="<table class='standard-report-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>";

$data.="<tr>
	<th colspan='17'>
	Commodity Production and Marketing Activity VALUE CHAIN DATA COLLECTION FORM/BUSINESS DEVELOPMENT SERVICES</th>
	</tr>";			

	//===================data to be displayed=====================
	$data.="<tr>
    <th rowspan='3' class='first-cell-header'>#</th>
    <th rowspan='3'>Name of Business Development Service Provider</th>
    <th rowspan='3' class='small-cell-header'>Value Chain</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3'>Areas of Expertize</th>
    <th rowspan='3'>Service(s) Offered in the reporting period</th>
    <th colspan='6'>Details of Actor(s) served</th>
    <th rowspan='3'>Role of the Activity in Service delivery</th>
    <th colspan='4'>Jobs Created</th>
  </tr>
  <tr>
    <th rowspan='2'>Name of MSME receving BDS service</th>
    <th rowspan='2' class='small-cell-header'>No. of Employees</th>
    <th rowspan='2' class='small-cell-header'>Sex of MSME</th>
    <th rowspan='2'>Type of Actor served</th>
    <th colspan='2' class='small-cell-header'>Number</th>
    <th rowspan='2'>Name of Job holder</th>
    <th rowspan='2' class='small-cell-header'>Sex</th>
    <th rowspan='2'>Date of engagement</th>
    <th rowspan='2'>Time spent on job (Months)</th>	
  </tr>
  <tr>
    <th class='small-cell-header'>F</th>
    <th class='small-cell-header'>M</th>
  </tr>
  </thead>
  <tbody>";

	switch(trim($cpma_year)){

			case trim('Project start up'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Apr - Sep') 
			and `v`.`year` in (2013)";
			break;

			case trim('CPMA Year One'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep')
			and `v`.`reportingMonth` between ('2013-10-01') and ('2014-09-30') 
			and `v`.`year` in (2013,2014)";
			break;
			
			case trim('CPMA Year Two'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2014-10-01') and ('2015-09-30')
			and `v`.`year` in (2014,2015)";
			break;
			
			case trim('CPMA Year Three'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2015-10-01') and ('2016-09-30')
			and `v`.`DateSubmission` between ('2015-10-01') and ('2016-09-30')
			and `v`.`year` in (2015,2016)";
			break;
			
			case trim('CPMA Year Four'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2016-10-01') and ('2017-09-30')
			and `v`.`DateSubmission` between ('2016-10-01') and ('2017-09-30')
			and `v`.`year` in (2016,2017)";
			break;
			
			case trim('CPMA Year Five(Activity close out)'):
			$reportingYearToPeriod="and `v`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
			and `v`.`reportingMonth` between ('2017-10-01') and ('2018-09-30')
			and `v`.`year` in (2017,2018)";
			break;
			
			default:
			break;
		}
		
		switch(trim($reporting_period)){
			case trim('Project start up'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2013-04-01') and ('2013-09-30')
			and `v`.`year` in (2013)
			";
			break;
			
			case trim('Oct 2013 - Mar 2014'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2013-10-01') and ('2014-03-31')
			and `v`.`year` in (2013,2014)
			";
			break;
			
			case trim('Apr 2014 - Sep 2014'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2014-04-01') and ('2014-09-30')
			and `v`.`year` in (2014)
			";
			break;
			
			case trim('Oct 2014 - Mar 2015'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2014-10-01') and ('2015-03-31')
			and `v`.`year` in (2014,2015)
			";
			break;
			
			case trim('Apr 2015 - Sep 2015'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2015-04-01') and ('2015-09-30')
			and `v`.`year` in (2015)
			";
			break;
			
			case trim('Oct 2015 - Mar 2016'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2015-10-01') and ('2016-03-31')
			and `v`.`year` in (2015,2016)
			";
			break;
			
			case trim('Apr 2016 - Sep 2016'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2016-04-01') and ('2016-09-30')
			and `v`.`year` in (2016)
			";
			break;
			
			case trim('Oct 2016 - Mar 2017'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2016-10-01') and ('2017-03-31')
			and `v`.`year` in (2016,2017)
			";
			break;
			
			case trim('Apr 2017 - Sep 2017'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2017-04-01') and ('2017-09-30')
			and `v`.`year` in (2017)
			";
			break;
			
			case trim('Oct 2017 – Mar 2018'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Oct - Mar' 
			and `v`.`reportingMonth` between ('2017-10-01') and ('2018-03-31')
			and `v`.`year` in (2017,2018)
			";
			break;
			
			case trim('Apr 2018 – May 2018'):
			$reportingYearToPeriodCleaned="
			and `v`.`reportingPeriod` = 'Apr - Sep' 
			and `v`.`reportingMonth` between ('2018-04-01') and ('2018-09-30')
			and `v`.`year` in (2018)
			";
			break;
			
			default:
			break;
		}
		
		$query_string="select  `v`.*,
		case
		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2013-04-01') and ('2013-09-30') 
		and `v`.`year` in (2013) 
		then 'Apr 2012 - Sep 2013'
		
		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2013-10-01') and ('2014-03-31') 
		and `v`.`year` in (2013,2014) 
		then 'Oct 2013 - Mar 2014'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2014-04-01') and ('2014-09-30') 
		and `v`.`year` in (2014) 
		then 'Apr 2014 - Sep 2014'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2014-10-01') and ('2015-03-31') 
		and `v`.`year` in (2014,2015) 
		then 'Oct 2014 - Mar 2015'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2015-04-01') and ('2015-09-30') 
		and `v`.`year` in (2015) 
		then 'Apr 2015 - Sep 2015'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2015-10-01') and ('2016-03-31') 
		and `v`.`year` in (2015,2016) 
		then 'Oct 2015 - Mar 2016'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2016-04-01') and ('2016-09-30') 
		and `v`.`year` in (2016) 
		then 'Apr 2016 - Sep 2016'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2016-10-01') and ('2017-03-31') 
		and `v`.`year` in (2016,2017) 
		then 'Oct 2016 - Mar 2017'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2017-04-01') and ('2017-09-30') 
		and `v`.`year` in (2017) 
		then 'Apr 2017 - Sep 2017'

		when `v`.`reportingPeriod` = 'Oct - Mar' 
		and `v`.`reportingMonth` 
		between ('2017-10-01') and ('2018-03-31') 
		and `v`.`year` in (2017,2018) 
		then 'Oct 2017 - Mar 2018'

		when `v`.`reportingPeriod` = 'Apr - Sep' 
		and `v`.`reportingMonth` 
		between ('2018-04-01') and ('2018-09-30') 
		and `v`.`year` in (2018) 
		then 'Apr 2018 - May 2018'
		
	else `v`.`reportingPeriod`
	end 
	as  `reportingPeriod_cleaned`
	from `tbl_businessdev` as `v`
	where 1=1  ";  
	
	$reporting_period=(!empty($cpma_year))?'':$reporting_period;
	$cpma_year=(!empty($reporting_period))?'':$cpma_year;
	$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
	$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
	$valueChain=(!empty($valueChain))?" AND `mv`.`tbl_chainId` = '".$valueChain."' ":"";
	$query_string.=$reporting_period.$cpma_year.$valueChain;
	$query_string.=" order by `v`.`tbl_businessdevId` desc";
	
	//$obj->alert($query_string);

	 $n=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $n=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
  
  while($row_parent=mysql_fetch_array($new_query)){
	  
	  
		
		//determining the number of child records for each row
			$s_child="SELECT * FROM `tbl_bds_jobHolder` WHERE `bds_id`=".$row_parent['tbl_businessdevId']."";
			$q_child=Execute($s_child) or die(http(__line__));			
			$num_child_records=mysql_num_rows($q_child);	
			//$obj->alert($num_child_records);			
			$row_span=($num_child_records>1)?"rowspan='".$num_child_records."'":"";
			$col_span=($num_child_records>1)?"colspan='2'":"";
			$v=$n+$num_child_records;
			
			$data.="<tr>";
			$data.="<td ".$row_span.">".$n.".</td>";
			$data.="<td ".$row_span.">".$row_parent['nameofBusiness']."</td>";
			$data.="<td ".$row_span.">".$qmobj->cleanValueChainDisplay($row_parent['valueChain'])."</td>";
			$data.="<td ".$row_span.">".$row_parent['reportingPeriod_cleaned']."</td>";
			$data.="<td ".$row_span.">".$row_parent['areaOfExpertise']."</td>";
			$data.="<td ".$row_span.">".$row_parent['servicesOffered']."</td>";
			$data.="<td ".$row_span.">".$row_parent['nameOfMSME']."</td>";
			$data.="<td ".$row_span.">".$row_parent['numOfEmployee']."</td>";
			$data.="<td ".$row_span.">".$row_parent['sexOfMSME']."</td>";

			$actorServiced=$row_parent['typeOfActorServiced'];
			$data.="<td ".$row_span.">";
			$data.="<div>";
			$a = mysql_query("SELECT l . * FROM `tbl_lookup` l WHERE l.`classCode`='31' AND l.`status` = 'Yes' ORDER BY l.`code` ASC")or die(http(__line__));

			while($b = mysql_fetch_array($a)){
			$display=(strpos($actorServiced, $b['codeName']) !==false)?"".$b['codeName']."":"";
			if($display<>'') {
			$data.="".$display."";
			}
			else{
			 $data.="";   
			}
			}
			@mysql_free_result($a); 
			$data.="</div>";
			$data.="</td>";
			$data.="<td ".$row_span.">".$row_parent['actorServedFemale']."</td>";
			$data.="<td ".$row_span.">".$row_parent['actorServedMale']."</td>";
			$data.="<td ".$row_span.">".$row_parent['roleOfActivity']."</td>";
			
			
				//return first row of child records
					$s_first_child = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 0,1")or die(http(__line__));
					$first_child_row = mysql_fetch_array($s_first_child );
					$data.="<td>".$first_child_row['nameOfJobHolder']."</td>
					<td>".$first_child_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($first_child_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$first_child_row['timeSpentOnJob']."</td>";
				$data.="</tr>";
				
				switch(true){
					case $num_child_records>1:
					//loop thru kid records -1
					$s_other_children = mysql_query("SELECT * FROM `tbl_bds_jobHolder` 
					WHERE `bds_id`=".$row_parent['tbl_businessdevId']." limit 1,100000")or die(http(__line__));
					while($other_children_row = mysql_fetch_array($s_other_children )){
					$data.="<tr>";
						$data.="<td>".$other_children_row['nameOfJobHolder']."</td>
					<td>".$other_children_row['sexOfJobHolder']."</td>";
					$dateOfEngagement = sanitizeForm2DirtyDate(substr(($other_children_row['dateOfEngagement']), 0, 10));
					$data.="<td>".$dateOfEngagement."</td>
					<td>".$other_children_row['timeSpentOnJob']."</td>";
					$data.="</tr>";
					}
					
					break;
					
					default:
					$data.="";
					break;
				}
			$n++;
		}
		$data.="".noRecordsFound($new_query,17)."";	


  
$data.="</tbody>
</table>";

export($format,$data);

}

//view_form3
function view_form3($region,$reporting_period,$cpma_year,$exName,$exCode,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');

$n=1;
$inc=1;

$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['exName']=$exName;
$_SESSION['exCode']=$exCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$exName=($_SESSION['exName']<>''?$_SESSION['exName']:$exName);
$exCode=($_SESSION['exCode']<>''?$_SESSION['exCode']:$exCode);


$data="<form action=\"".$PHP_SELF."\" name='form3' id='form3' method='post'>";
$data.="<table width='800' id='report' border='1' cellspacing='1'>";

$data.="<tr style='background-color:#4E9AB9'>
<th colspan='21'><center>EXPORTER AND PROCESSOR DATA DETAILS</center></th>
</tr>";


$data.="
  <tr style='background-color:#4E9AB9'>
  	<th rowspan='3'>#</th>
    <th rowspan='3'>Name of Business/Exporter</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3'>Exporter Gender</th>
    <th rowspan='3'>Exporter Code</th>
    <th rowspan='3'>Exporter Age</th>
    <th rowspan='3'>Exporter District</th>
    <th rowspan='3'>Exporter Sub-county</th>
    <th rowspan='3'>Exporter Village</th>
	<th rowspan='3'>Exporter Contact</th>
	<th rowspan='3'>Exporter Crop Beans</th>
	<th rowspan='3'>Exporter Crop Coffee</th>
	<th rowspan='3'>Exporter Crop Maize</th>
	
    <th colspan='13'><center>Performance Indicator</center></th>
    <th colspan='8' rowspan='3'><center>Disaggregation</center></th>
  </tr>
  <tr style='background-color:#4E9AB9'>
    <th rowspan='2' >Number of Traders/ DC in  the supply chain </th>
    <th rowspan='2' >Number of CBOs/unions/societies  in the supply Chain</th>
    <th colspan='3' >Volume of produce purchased (Kgs)</th>
    <th colspan='2' >Maize Exports: Volumes and Values</th>
    <th colspan='2' >Coffee Exports: Volumes and Values</th>
    <th colspan='2' >Bean Exports: <br/> volumes and values</th>
    <th rowspan='2' >Number of e-payments received</th>
    <th rowspan='2' >Number of e-payments made</th>
  </tr>
  <tr style='background-color:#4E9AB9'>
    <th >Maize</th>
    <th >Coffee</th>
    <th >Beans</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
  </tr>";

 
 switch(trim($cpma_year)){
      case trim('Project start up'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Apr - Sep') 
      and `w`.`year` in (2013)";
      break;
	  
	  case trim('CPMA Year One'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2013,2014)";
      break;
      
      case trim('CPMA Year Two'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2014,2015)";
      break;
      
      case trim('CPMA Year Three'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2015,2016)";
      break;
      
      case trim('CPMA Year Four'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2016,2017)";
      break;      
      
      case trim('CPMA Year Five(Activity close out)'):
      $reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
      and `w`.`year` in (2017,2018)";
      break;
      
      default:
      break;
    }
    
    switch(trim($reporting_period)){
      
	  case trim('Project start up'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2013)
      ";
      break;
      
      case trim('Oct 2013 - Mar 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2013,2014)
      ";
      break;
      
      case trim('Apr 2014 - Sep 2014'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2014)
      ";
      break;
      
      case trim('Oct 2014 - Mar 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2014,2015)
      ";
      break;
      
      case trim('Apr 2015 - Sep 2015'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2015)
      ";
      break;
      
      case trim('Oct 2015 - Mar 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2015,2016)
      ";
      break;
      
      case trim('Apr 2016 - Sep 2016'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2016)
      ";
      break;
      
      case trim('Oct 2016 - Mar 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2016,2017)
      ";
      break;
      
      case trim('Apr 2017 - Sep 2017'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2017)
      ";
      break;
      
      case trim('Oct 2017 – Mar 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Oct - Mar' 
      and `w`.`year` in (2017,2018)
      ";
      break;
      
      case trim('Apr 2018 – May 2018'):
      $reportingYearToPeriodCleaned="
      and `w`.`reportingPeriod` = 'Apr - Sep' 
      and `w`.`year` in (2018)
      ";
      break;
      
      default:
      break;
    }

 
//Mysql query to return Results from uploaded Excel sheet
  $query_string="SELECT `w` . * ,
  case
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2013) 
  then 'Apr 2013 - Sep 2013'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2013,2014) 
  then 'Oct 2013 - Mar 2014'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2014) 
  then 'Apr 2014 - Sep 2014'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2014,2015) 
  then 'Oct 2014 - Mar 2015'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2015) 
  then 'Apr 2015 - Sep 2015'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2015,2016) 
  then 'Oct 2015 - Mar 2016'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2016) 
  then 'Apr 2016 - Sep 2016'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2016,2017) 
  then 'Oct 2016 - Mar 2017'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2017) 
  then 'Apr 2017 - Sep 2017'
  
  when `w`.`reportingPeriod` = 'Oct - Mar' 
  and `w`.`year` in (2017,2018) 
  then 'Oct 2017 - Mar 2018'
  
  when `w`.`reportingPeriod` = 'Apr - Sep' 
  and `w`.`year` in (2018) 
  then 'Apr 2018 - May 2018'
  
  else `w`.`reportingPeriod`
  end 
  as  `reportingPeriod_cleaned`,
    `x`.`exporterName`,
  `x`.`exporterDob`, 
  `x`.`exporterCode`,
  `x`.`exporterSex`, 
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
  `s`.`subcountyName`
  FROM 
  `tbl_form3_exporters` as `w`,
  `tbl_exporters` as `x`,
  `tbl_district` as `d`,
  `tbl_subcounty` as `s`
  WHERE `w`.`tbl_exporterId` = `x`.`tbl_exportersId`
  AND `d`.`districtCode`=`x`.`exporterDistrict`
  AND `d`.`Display`='Yes' 
  AND `d`.`districtCode`=`s`.`districtCode`
  AND `s`.`subcountyCode`=`x`.`exporterSubcounty`
  AND `s`.`Display`='Yes' 
  AND `w`.`display`='Yes' ";
  
  //$reporting_period=(!empty($cpma_year))?'':$reporting_period;
  //$cpma_year=(!empty($reporting_period))?'':$cpma_year;
  $region=(!empty($region))?" AND x.`exporterRegion` LIKE '%".$region."%' ":"";
  $reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
  $cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
  $exName=(!empty($exName))?" AND x.`tbl_exportersId` = '".$exName."' ":"";
  $exCode=(!empty($exCode))?" AND x.`exporterCode` LIKE '%".$exCode."%' ":"";
  $query_string.=$region.$reporting_period.$cpma_year.$exName.$exCode;
  $query_string.=" ORDER BY w.`tbl_form3_exportersId` DESC";
	
	//$obj->alert($query_string);
	$x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $x=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	//$obj->alert($new_query);
	while($row=mysql_fetch_array($new_query)){
		$divVwDisaggregation="vwDisaggregation".$row['tbl_form3_exportersId'];
		//$color=$x%2==1?"evenrow3":"evenrow";
		$color=$x%2==1?"background-color:#F8F5EC;":"background-color:#70BAD9;";
		$data.="<tr style='".$color."'>";
			$data.="<td  width='5px'>".$x.".</td>";
			$data.="<td>".($row['exporterName'])."</td>";
			$data.="<td>".($row['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".($row['exporterSex'])."</td>";
			$data.="<td>".($row['exporterCode'])."</td>";
			$returnedDate=($row['exporterDob']);
			$date1=date_create("".$returnedDate."");
			$dateNow=date('Y-m-d');
			$date2=date_create("".$dateNow."");
			$diff=date_diff($date1,$date2);
			$years = $diff->y;
			$months = $diff->m;
			$days = $diff->d;
			$ageString= $years." Yrs,".$months." Months and".$days." days";
			$exporterAge=$ageString;
			$data.="<td>".$exporterAge."</td>";
			$data.="<td>".($row['districtName'])."</td>";
			$data.="<td>".($row['subcountyName'])."</td>";
			$data.="<td>".($row['exporterVillage'])."</td>";
			$data.="<td>".($row['exporterTel'])."</td>";
			$data.="<td>".($row['exporterCropBeans'])."</td>";
			$data.="<td>".($row['exporterCropCoffee'])."</td>";
			$data.="<td>".($row['exporterCropMaize'])."</td>";
			$data.="<td align='right'>".number_format(($row['exTradersSupplyChain']))."</td>";
			$data.="<td align='right'>".number_format(($row['exUnionSupplyChain']))."</td>";
			$data.="<td align='right'>".number_format(($row['volMaizePurchased']))."</td>";
			$data.="<td align='right'>".number_format(($row['volCoffeePurchased']))."</td>";
			$data.="<td align='right'>".number_format(($row['volBeansPurchased']))."</td>";
			$data.="<td align='right'>".number_format(($row['volMaizeEx']))."</td>";
			$data.="<td align='right'>".number_format(($row['volMaizeExUgx']))."</td>";
			$data.="<td align='right'>".number_format(($row['volCoffeeEx']))."</td>";
			$data.="<td align='right'>".number_format(($row['volCoffeeExUgx']))."</td>";
			$data.="<td align='right'>".number_format(($row['volBeansEx']))."</td>";
			$data.="<td align='right'>".number_format(($row['volBeansExUgx']))."</td>";
			$data.="<td align='right'>".number_format(($row['epayRecieved']))."</td>";
			$data.="<td align='right'>".number_format(($row['epayMade']))."</td>";
			
			$data.="</tr>";

					$data.="<tr><td colspan='20'><div id='".$divVwDisaggregation."'>".
     view_frm3ExDisaggregation($row['tbl_form3_exportersId'],$row['year'],($row['exporterName']),($row['reportingPeriod']),$divVwDisaggregation)
    ."</div><td></tr>";
		
		//$data.="<tr class='".$color."'><td colspan='20'><div id='".$_SESSION['divVwDisaggregationExporters']."'></div><td></tr>";
  
  $x++;
$n++;
}

$data.="".noRecordsFound($new_query,10)."";

$data.="</table>
</form>";

export($format,$data);

$_SESSION['divVwDisaggregationExporters']='';



}

function view_frm3ExDisaggregation($tbl_form3_exportersId,$Year,$exporterName,$reportingPeriod,$divVwDisaggregation){
//$obj=new xajaxResponse();
$rp=$_SESSION['quarter'];
//$reportingPeriod=substr("".$rp."",0,9);
$recordId=$tbl_form3_exportersId;
$nameOfExporter=$exporterName;
//$obj->alert($reportingPeriod);
//41

switch($reportingPeriod){
                case "Apr - Sep":
                $monthsArray=array('4','5','6','7','8','9');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr>
    <th colspan='2' rowspan='2'>Performance Indicators</th>
    <th colspan='7' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr>";
                break;
                
                case "Oct - Mar":
                $monthsArray=array('10','11','12','1','2','3');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr>
    <th colspan='2' rowspan='2'>Performance Indicators </th>
    <th colspan='7' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr>";
                break;
                
                default:
                $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr>
    <th colspan='2' rowspan='2'>Performance Indicators</th>
    <th colspan='13' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr>";
                break;
              }

											
foreach ($monthsArray as $key) {
	$month= __month__coverter($key); 
	$result = substr($month, 0, 3);	
	$data.="<th >".$result."</th>";	
	}
	$data.="<th >Total</th>";
	$data.="</tr>";
	
		$query_string="SELECT 
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
		FROM `tbl_form3_exporters` as `x`
		WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
		and `x`.`reportingPeriod`='".$reportingPeriod."'";


        $query_string1="SELECT 
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
    FROM `tbl_form3_exporters` as `x`
    WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Oct - Mar'";


            $query_string2="SELECT 
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
    FROM `tbl_form3_exporters` as `x`
    WHERE `x`.`tbl_form3_exportersId`='".$recordId."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Apr - Sep'";


    switch($reportingPeriod){
                case "Apr - Sep":
                $query=mysql_query($query_string)or die(http(5827));
                $row=mysql_fetch_array($query);
                $data.=data_form3($row);
                break;
                
                case "Oct - Mar":
                $query=mysql_query($query_string)or die(http(5827));
                $row=mysql_fetch_array($query);
                $data.=data_form3($row);
                break;
                
                default:
                $query1=mysql_query($query_string1)or die(http(5827));
                $query2=mysql_query($query_string2)or die(http(5827));
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form3All($row,$row2);
                break;
              }


  
 $data.="</table></form>"; 
$_SESSION['divVwDisaggregationExporter']=$data;
 
//$obj->assign($divVwDisaggregation,'innerHTML',$data);
return $data;			
}

function data_form3($row){
$data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of Traders/DC in the supply chain</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
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

function data_form3All($row,$row2){
        $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of Traders/DC in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
    $data.="<td>".$row['exTradersSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
    $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']);
    $data.="<td align='right'>".$totUSC."</td>";
    $data.="<td>".$row['exUnionsSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSixthQM'])."</td>";
   $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$row['volMaizeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$row['volCoffeeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSixthQM'])."</td>";
     $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$row['volBeansExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSixthQM'])."</td>";
     $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$row['epayRecievedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
    $data.="<td>".$row['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;
   
}
//view_form4
function view_form4($region,$reporting_period,$cpma_year,$trName,$trCode,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1;
$inc=1;
$_SESSION['region']=$region;
$_SESSION['reporting_period']=$reporting_period;
$_SESSION['cpma_year']=$cpma_year;
$_SESSION['trName']=$trName;
$_SESSION['trCode']=$trCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;

$region=($_SESSION['region']<>''?$_SESSION['region']:$region);
$reporting_period=($_SESSION['reporting_period']<>''?$_SESSION['reporting_period']:$reporting_period);
$cpma_year=($_SESSION['cpma_year']<>''?$_SESSION['cpma_year']:$cpma_year);
$trName=($_SESSION['trName']<>''?$_SESSION['trName']:$trName);
$trCode=($_SESSION['trCode']<>''?$_SESSION['trCode']:$trCode);

$data="<form action=\"".$PHP_SELF."\" name='form4' id='form4' method='post'>";
$data.="<table width='800' id='report' border='1' cellspacing='1'>";



$data.="<tr CLASS='evenrow'>
<th colspan='21'><center><center>TRADER DATA DETAILS</center></th>
</tr>";
$data.="<tr style='background-color:#4E9AB9'>
  	<th rowspan='3'>#</th>
    <th rowspan='3'>Name of Business/Trader</th>
	<th rowspan='3'>Reporting Period</th>
    <th rowspan='3'>Trader Gender</th>
    <th rowspan='3'>Trader Code</th>
    <th rowspan='3'>Trader Age</th>
    
    <th rowspan='3'>Trader District</th>
    <th rowspan='3'>Trader Sub-county</th>
    <th rowspan='3'>Trader Village</th>
    <th colspan='13'><center>Performance Indicator</center></th>
   
  </tr>
  <tr style='background-color:#4E9AB9'>
    <th rowspan='2' >Number of VAs in the supply chain</th>
    <th rowspan='2' >Number of CBOs/unions/societies  in the supply Chain</th>
    <th colspan='3' >Volume of produce purchased (Kgs)</th>
    <th colspan='2' >Maize Exports: Volumes and Values</th>
    <th colspan='2' >Coffee Exports: Volumes and Values</th>
    <th colspan='2' >Bean Exports: <br/> volumes and values</th>
    <th rowspan='2' >Number of e-payments received</th>
    <th rowspan='2' >Number of e-payments made</th>
  </tr>
  <tr style='background-color:#4E9AB9'>
    <th >Maize</th>
    <th >Coffee</th>
    <th >Beans</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
    <th >Volume(Kg)</th>
    <th >Value(UGX)</th>
  </tr>";
  
		switch($cpma_year){
				case'CPMA Year One':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2012,2013)";
				break;
				
				case'CPMA Year Two':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2013,2014)";
				break;
				
				case'CPMA Year Three':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2014,2015)";
				break;
				
				case'CPMA Year Four':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2015,2016)";
				break;
				
				case'CPMA Year Five':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2016,2017)";
				break;
				
				case'CPMA Year Six':
				$reportingYearToPeriod="and `w`.`reportingPeriod` in ('Oct - Mar','Apr - Sep') 
				and `w`.`year` in (2017,2018)";
				break;
				
				default:
				break;
			}
		
		switch($reporting_period){
			case'Oct 2012 - Mar 2013':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2012,2013)
			";
			break;
			
			case'Apr 2013 - Sep 2013':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2013)
			";
			break;
			
			case'Oct 2013 - Mar 2014':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2013,2014)
			";
			break;
			
			case'Apr 2014 - Sep 2014':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2014)
			";
			break;
			
			case'Oct 2014 - Mar 2015':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2014,2015)
			";
			break;
			
			case'Apr 2015 - Sep 2015':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2015)
			";
			break;
			
			case'Oct 2015 - Mar 2016':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2015,2016)
			";
			break;
			
			case'Apr 2016 - Sep 2016':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2016)
			";
			break;
			
			case'Oct 2016 - Mar 2017':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2016,2017)
			";
			break;
			
			case'Apr 2017 - Sep 2017':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2017)
			";
			break;
			
			case'Oct 2017 – Mar 2018':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Oct - Mar' 
			and `w`.`year` in (2017,2018)
			";
			break;
			
			case'Apr 2018 - Sep 2018':
			$reportingYearToPeriodCleaned="
			and `w`.`reportingPeriod` = 'Apr - Sep' 
			and `w`.`year` in (2018)
			";
			break;
			
			
			break;
			
			default:
			break;
		}
		
		
		

 
//Mysql query to return Results from uploaded Excel sheet
					$query_string="SELECT `w` . * ,
					case
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2012,2013) 
					then 'Oct 2012 - Mar 2013'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2013) 
					then 'Apr 2013 - Sep 2013'
					
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2013,2014) 
					then 'Oct 2013 - Mar 2014'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2014) 
					then 'Apr 2014 - Sep 2014'
					
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2014,2015) 
					then 'Oct 2014 - Mar 2015'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2015) 
					then 'Apr 2015 - Sep 2015'
					
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2015,2016) 
					then 'Oct 2015 - Mar 2016'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2016) 
					then 'Apr 2016 - Sep 2016'
					
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2016,2017) 
					then 'Oct 2016 - Mar 2017'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2017) 
					then 'Apr 2017 - Sep 2017'
					
					when `w`.`reportingPeriod` = 'Oct - Mar' 
					and `w`.`year` in (2017,2018) 
					then 'Oct 2017 - Mar 2018'
					
					when `w`.`reportingPeriod` = 'Apr - Sep' 
					and `w`.`year` in (2017) 
					then 'Apr 2018 - Sep 2018'
					
					else `w`.`reportingPeriod`
					end 
					as  `reportingPeriod_cleaned`,
					`x`.`traderName`,
					`x`.`traderDob`, 
					`x`.`traderCode`,
					`x`.`traderSex`, 
					`x`.`traderDistrict`,
					`x`.`traderSubcounty`,
					`x`.`traderVillage`,
					`d`.`districtName`,
					`s`.`districtCode`,
					`s`.`subcountyCode`,
					`s`.`subcountyName`
					FROM 
					`tbl_form4_traders` as `w`,
					`tbl_traders` as `x`,
					`tbl_district` as `d`,
					`tbl_subcounty` as `s`
					WHERE `w`.`tbl_traderId` = `x`.`tbl_tradersId`
					AND `d`.`districtCode`=`x`.`traderDistrict`
					AND `d`.`Display`='Yes' 
					AND `d`.`districtCode`=`s`.`districtCode`
					AND `s`.`subcountyCode`=`x`.`traderSubcounty`
					AND `s`.`Display`='Yes' 
					AND `w`.`display`='Yes' ";
					
					$reporting_period=(!empty($cpma_year))?'':$reporting_period;
					$cpma_year=(!empty($reporting_period))?'':$cpma_year;
					$region=(!empty($region))?" AND x.`traderRegion` LIKE '%".$region."%' ":"";
					$reporting_period=(!empty($reporting_period))?" ".$reportingYearToPeriodCleaned." ":"";
					$cpma_year=(!empty($cpma_year))?" ".$reportingYearToPeriod." ":"";
					$trName=(!empty($trName))?" AND x.`tbl_traderId` = '".$trName."' ":"";
					$trCode=(!empty($exCode))?" AND x.`traderCode` LIKE '%".$exCode."%' ":"";
					$query_string.=$region.$reporting_period.$cpma_year.$trName.$exCode;
					
					
          $query_string.=" GROUP BY w.`tbl_traderId`,`w`.`year`";
          $query_string.=" ORDER BY w.`tbl_form4_tradersId` DESC";
	
	//$obj->alert($query_string);

	$x=1;
	$query_=mysql_query($query_string)or die(http(__line__));
	 /**************
	 *paging parameters
	 *
	 ****/
	 $max_records = mysql_num_rows($query_);
	 $num_pages=ceil($max_records/$records_per_page);
	 $offset = ($cur_page-1)*$records_per_page;
	 $x=$offset+1;
	 $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
	
	while($row=mysql_fetch_array($new_query)){
		$divVwDisaggregation="vwDisaggregation".$row['tbl_form4_tradersId'];
		$color=$n%2==1?"background-color:#F8F5EC;":"background-color:#70BAD9;";
		$data.="<tr style='".$color."'>";
			$data.="<td  width='5px'>".$x.".</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderName'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['reportingPeriod_cleaned'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderSex'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderCode'])."</td>";
			$returnedDate=retrieve_info_withSpecialCharactersNowordLimit($row['traderDob']);
			$date1=date_create("".$returnedDate."");
			$dateNow=date('Y-m-d');
			$date2=date_create("".$dateNow."");
			$diff=date_diff($date1,$date2);
			$years = $diff->y;
			$months = $diff->m;
			$days = $diff->d;
			$ageString= $years." Yrs,".$months." Months and".$days." days";
			$traderAge=$ageString;
			$data.="<td>".$traderAge."</td>";
     
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['districtName'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['subcountyName'])."</td>";
			$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderVillage'])."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['vaSupplyChain']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['numCbo']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volMaizePurchased']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volCoffeePurchased']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volBeansPurchased']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volMaizeEx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volMaizeExUgx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volCoffeeEx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volCoffeeExUgx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volBeansEx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volBeansExUgx']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['epayRecieved']))."</td>";
			$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['epayMade']))."</td>";
			
		$data.="</tr>";
		
		$data.="<tr><td colspan='20'><div id='".$divVwDisaggregation."'>".view_frm4ExDisaggregation($row['tbl_traderId'],$row['year'],$row['tbl_form4_tradersId'],retrieve_info_withSpecialCharactersNowordLimit($row['traderName']),$reporting_period,$divVwDisaggregation)."</div><td></tr>";


  
  $x++;
$n++;
}

$data.="".noRecordsFound($new_query,10)."";



$data.="</table>
</form>";

export($format,$data);
$_SESSION['divVwDisaggregationTraders']='';
}

function view_frm4ExDisaggregation($Id,$Year,$tbl_form4_tradersId,$traderName,$reportingPeriod,$divVwDisaggregation){
/* $obj=new xajaxResponse(); */
/* $rp=$_SESSION['quarter'];
$reportingPeriod=substr("".$rp."",0,9); */
$recordId=$tbl_form4_tradersId;
$nameOfTrader=$traderName;





  switch($reportingPeriod){
								case "Apr - Sep":
								$monthsArray=array('4','5','6','7','8','9');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr style='background-color:#4E9AB9;'>
    <th colspan='2' rowspan='2'>Performance Indicators</th>
    <th colspan='7' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr>";
								break;
								
								case "Oct - Mar":
								$monthsArray=array('10','11','12','1','2','3');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr style='background-color:#4E9AB9;'>
    <th colspan='2' rowspan='2'>Performance Indicators</th>
    <th colspan='7' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr>";
								break;
								
								default:
                $monthsArray=array('10','11','12','1','2','3','4','5','6','7','8','9');
                $data="<form name='disaggregation' id='disaggregation' method = 'post' enctype='multipart/form-data' action='?'>
<table style='background-color:#EBEBEB;' border='1' cellspacing='1' cellpadding='1' width='100%'>
  <tr style='background-color:#4E9AB9;'>
    <th colspan='2' rowspan='2'>Performance Indicators</th>
    <th colspan='13' >Achievements</th>
    <th rowspan='2'>Given details</th>
  </tr>";
  $data.="<tr style='background-color:#4E9AB9;'>";
								break;
							}
											
foreach ($monthsArray as $key) {
	$month= __month__coverter($key); 
	$result = substr($month, 0, 3);	
	$data.="<th >".$result."</th>";	
	}
	$data.="<th >Total</th>";
  
	$data.="</tr>";
	
		$query_string="SELECT 
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
		FROM `tbl_form4_traders` as `x`
		WHERE `x`.`tbl_form4_tradersId`='".$recordId."'
		and `x`.`reportingPeriod`='".$reportingPeriod."'";



    $query_string1="SELECT 
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
    FROM `tbl_form4_traders` as `x`
    WHERE `x`.`tbl_form4_tradersId`='".$recordId."'
    and `x`.`reportingPeriod`='Oct - Mar'";


    $query_string2="SELECT 
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
    FROM `tbl_form4_traders` as `x`
    WHERE `x`.`tbl_traderId`='".$Id."'
    and `x`.`year`='".$Year."'
    and `x`.`reportingPeriod`='Apr - Sep'";



		
		//$obj->alert($query_string);

    switch($reportingPeriod){
                case "Apr - Sep":
                $query=mysql_query($query_string)or die(http(__line__));
                $row=mysql_fetch_array($query);
                $data.=data_form4($row);
                break;
                
                case "Oct - Mar":
                $query=mysql_query($query_string)or die(http(__line__));
                $row=mysql_fetch_array($query);
                $data.=data_form4($row);
                break;
                
                default:
                $query1=mysql_query($query_string1)or die(http(__line__));
                $query2=mysql_query($query_string2)or die(http(__line__));
                $row=mysql_fetch_array($query1);
                $row2=mysql_fetch_array($query2);
                $data.=data_form4All($row,$row2);
                break;
              }
	
	
	//exUSCFirstQM
	
  
 //  $data.="<tr class='evenrow3'>";
 //    $data.="<td colspan='10' align='right'><input name='close' value='Close View' class='formButton2' type='button' onclick=\"xajax_close_form4('','".$divVwDisaggregation."');return false;\"/></td>";
	// $data.="</tr>";
  
 $data.="</table></form>";  
 
 $_SESSION['divVwDisaggregationTraders']=$data;
 
/* $obj->assign($divVwDisaggregation,'innerHTML',$data);  */
return $data;			
}

function data_form4($row){
    $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of VAs in the supply chain</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
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
  $data.="<tr style='background-color: #f8f5ec;'>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
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
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
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
function data_form4All($row,$row2){

    $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of VAs in the supply chain</td>";
    $data.="<td align='right'>".number_format($row['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exTSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exTSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exTSCSixthQM'])."</td>";
  $totTSC=number_format($row['exTSCFirstQM']+$row['exTSCSecondQM']+$row['exTSCThirdQM']+$row['exTSCFourthQM']+$row['exTSCFifthQM']+$row['exTSCSixthQM']+$row2['exTSCFirstQM']+$row2['exTSCSecondQM']+$row2['exTSCThirdQM']+$row2['exTSCFourthQM']+$row2['exTSCFifthQM']+$row2['exTSCSixthQM']);
    $data.="<td align='right'>".$totTSC."</td>";
  $data.="<td>".$row['vaSupplyChainDetails']."\n".$row2['vaSupplyChainDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
     $data.="<td align='right'>".number_format($row['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['exUSCSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['exUSCFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['exUSCSixthQM'])."</td>";
  $totUSC=number_format($row['exUSCFirstQM']+$row['exUSCSecondQM']+$row['exUSCThirdQM']+$row['exUSCFourthQM']+$row['exUSCFifthQM']+$row['exUSCSixthQM']+$row2['exUSCFirstQM']+$row2['exUSCSecondQM']+$row2['exUSCThirdQM']+$row2['exUSCFourthQM']+$row2['exUSCFifthQM']+$row2['exUSCSixthQM']);
   $data.="<td align='right'>".$totUSC."</td>";
  $data.="<td>".$row['numCboDetails']."\n".$row2['numCboDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
    $data.="<td>Maize</td>";
    $data.="<td align='right'>".number_format($row['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMPSixthQM'])."</td>";
    $totVolMP=number_format($row['volMPFirstQM']+$row['volMPSecondQM']+$row['volMPThirdQM']+$row['volMPFourthQM']+$row['volMPFifthQM']+$row['volMPSixthQM']+$row2['volMPFirstQM']+$row2['volMPSecondQM']+$row2['volMPThirdQM']+$row2['volMPFourthQM']+$row2['volMPFifthQM']+$row2['volMPSixthQM']);
    $data.="<td align='right'>".$totVolMP."</td>";
    $data.="<td rowspan='3'>".$row['volMaizePurchasedDetails']."\n".$row2['volMaizePurchasedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Coffee</td>";
    $data.="<td align='right'>".number_format($row['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCPSixthQM'])."</td>";
    $totvolCP=number_format($row['volCPFirstQM']+$row['volCPSecondQM']+$row['volCPThirdQM']+$row['volCPFourthQM']+$row['volCPFifthQM']+$row['volCPSixthQM']+$row2['volCPFirstQM']+$row2['volCPSecondQM']+$row2['volCPThirdQM']+$row2['volCPFourthQM']+$row2['volCPFifthQM']+$row2['volCPSixthQM']);
    $data.="<td align='right'>".$totvolCP."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Beans</td>";
    $data.="<td align='right'>".number_format($row['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBPSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBPFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBPSixthQM'])."</td>";
    $totvolBP=number_format($row['volBPFirstQM']+$row['volBPSecondQM']+$row['volBPThirdQM']+$row['volBPFourthQM']+$row['volBPFifthQM']+$row['volBPSixthQM']+$row2['volBPFirstQM']+$row2['volBPSecondQM']+$row2['volBPThirdQM']+$row2['volBPFourthQM']+$row2['volBPFifthQM']+$row2['volBPSixthQM']);
    $data.="<td align='right'>".$totvolBP."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMESixthQM'])."</td>";
    $totvolME=number_format($row['volMEFirstQM']+$row['volMESecondQM']+$row['volMEThirdQM']+$row['volMEFourthQM']+$row['volMEFifthQM']+$row['volMESixthQM']+$row2['volMEFirstQM']+$row2['volMESecondQM']+$row2['volMEThirdQM']+$row2['volMEFourthQM']+$row2['volMEFifthQM']+$row2['volMESixthQM']);
    $data.="<td align='right'>".$totvolME."</td>";
    $data.="<td rowspan='2'>".$row['volMaizeExDetails']."\n".$row2['volMaizeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volMEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volMEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volMEUgxSixthQM'])."</td>";
    $totvolMEUgx=number_format($row['volMEUgxFirstQM']+$row['volMEUgxSecondQM']+$row['volMEUgxThirdQM']+$row['volMEUgxFourthQM']+$row['volMEUgxFifthQM']+$row['volMEUgxSixthQM']+$row2['volMEUgxFirstQM']+$row2['volMEUgxSecondQM']+$row2['volMEUgxThirdQM']+$row2['volMEUgxFourthQM']+$row2['volMEUgxFifthQM']+$row2['volMEUgxSixthQM']);
    $data.="<td align='right'>".$totvolMEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCESixthQM'])."</td>";
    $totvolCE=number_format($row['volCEFirstQM']+$row['volCESecondQM']+$row['volCEThirdQM']+$row['volCEFourthQM']+$row['volCEFifthQM']+$row['volCESixthQM']+$row2['volCEFirstQM']+$row2['volCESecondQM']+$row2['volCEThirdQM']+$row2['volCEFourthQM']+$row2['volCEFifthQM']+$row2['volCESixthQM']);
    $data.="<td align='right'>".$totvolCE."</td>";
    $data.="<td rowspan='2' >".$row['volCoffeeExDetails']."\n".$row2['volCoffeeExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td>Value (UGX)</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volCEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volCEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volCEUgxSixthQM'])."</td>";
    $totvolCEUgx=number_format($row['volCEUgxFirstQM']+$row['volCEUgxSecondQM']+$row['volCEUgxThirdQM']+$row['volCEUgxFourthQM']+$row['volCEUgxFifthQM']+$row['volCEUgxSixthQM']+$row2['volCEUgxFirstQM']+$row2['volCEUgxSecondQM']+$row2['volCEUgxThirdQM']+$row2['volCEUgxFourthQM']+$row2['volCEUgxFifthQM']+$row2['volCEUgxSixthQM']);
    $data.="<td align='right'>".$totvolCEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
    $data.="<td>Volume (Kg)</td>";
    $data.="<td align='right'>".number_format($row['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBESixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBESixthQM'])."</td>";
    $totvolBE=number_format($row['volBEFirstQM']+$row['volBESecondQM']+$row['volBEThirdQM']+$row['volBEFourthQM']+$row['volBEFifthQM']+$row['volBESixthQM']+$row2['volBEFirstQM']+$row2['volBESecondQM']+$row2['volBEThirdQM']+$row2['volBEFourthQM']+$row2['volBEFifthQM']+$row2['volBESixthQM']);
    $data.="<td align='right'>".$totvolBE."</td>";
    $data.="<td rowspan='2' >".$row['volBeansExDetails']."\n".$row2['volBeansExDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #f8f5ec;'>";
    $data.="<td>Value(UGX)</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['volBEUgxSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['volBEUgxFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['volBEUgxSixthQM'])."</td>";
    $totvolBEUgx=number_format($row['volBEUgxFirstQM']+$row['volBEUgxSecondQM']+$row['volBEUgxThirdQM']+$row['volBEUgxFourthQM']+$row['volBEUgxFifthQM']+$row['volBEUgxSixthQM']+$row2['volBEUgxFirstQM']+$row2['volBEUgxSecondQM']+$row2['volBEUgxThirdQM']+$row2['volBEUgxFourthQM']+$row2['volBEUgxFifthQM']+$row2['volBEUgxSixthQM']);
    $data.="<td align='right'>".$totvolBEUgx."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments received </td>";
    $data.="<td align='right'>".number_format($row['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayRSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayRFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayRSixthQM'])."</td>";
    $totepayR=number_format($row['epayRFirstQM']+$row['epayRSecondQM']+$row['epayRThirdQM']+$row['epayRFourthQM']+$row['epayRFifthQM']+$row['epayRSixthQM']+$row2['epayRFirstQM']+$row2['epayRSecondQM']+$row2['epayRThirdQM']+$row2['epayRFourthQM']+$row2['epayRFifthQM']+$row2['epayRSixthQM']);
    $data.="<td align='right'>".$totepayR."</td>";
    $data.="<td>".$row['epayRecievedDetails']."\n".$row2['epayRecievedDetails']."</td>";
  $data.="</tr>";
  $data.="<tr style='background-color: #F5FFFF;'>";
    $data.="<td colspan='2'>Number of e-payments made</td>";
    $data.="<td align='right'>".number_format($row['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row['epayMSixthQM'])."</td>";

    $data.="<td align='right'>".number_format($row2['epayMFirstQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSecondQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMThirdQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFourthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMFifthQM'])."</td>";
    $data.="<td align='right'>".number_format($row2['epayMSixthQM'])."</td>";
    $totepayM=number_format($row['epayMFirstQM']+$row['epayMSecondQM']+$row['epayMThirdQM']+$row['epayMFourthQM']+$row['epayMFifthQM']+$row['epayMSixthQM']+$row2['epayMFirstQM']+$row2['epayMSecondQM']+$row2['epayMThirdQM']+$row2['epayMFourthQM']+$row2['epayMFifthQM']+$row2['epayMSixthQM']);
    $data.="<td align='right'>".$totepayM."</td>";
  $data.="<td>".$row['epayMadeDetails']."\n".$row2['epayMadeDetails']."</td>";
  $data.="</tr>";

  return $data;
}
//view_form6
function view_form6($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');	
$n=1;

$inc=1;
$dsName=$_SESSION['dsName'];
$hsName=$_SESSION['hsName'];
$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];

$dsName=($_SESSION['dsName']<>''?$_SESSION['dsName']:$dsName);
$hsName=($_SESSION['hsName']<>''?$_SESSION['hsName']:$hsName);

$title=strtoupper('Commodity Production and Marketing Activity Household data');

$data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='19'>
      <div align='center'>".$title."</div>
    </th>
  </tr>";
 
 //===================data to be displayed=====================

 $data.="<tr>
       <th  rowspan='2' >#</th>
       <th  rowspan='2' >District</th>
       <th  rowspan='2' >Household Head</th>
       <th  rowspan='2' >No of    members</th>
       <th  colspan='5' >Maize</th>
       <th  colspan='5' >Beans</th>
       <th  colspan='5' >Coffee</th>
       <!--<th  rowspan='2' >Action</th>-->
     </tr>
     <tr>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
     </tr>";
  $query_string="SELECT d.`districtName` , h . * , COUNT(h.`houseHoldId` ) AS numHouseholds, m.`houseHoldId`,
        
        SUM(m.`hsAreaMaizeMember`) as hsAreaMaizeMember,
        SUM(m.`hsValueInputsMaizeMember`) as hsValueInputsMaizeMember,
        SUM(m.`hsTotalYieldMaizeMember`) as hsTotalYieldMaizeMember,
        SUM(m.`hsVolumeSoldMaizeMember`) as hsVolumeSoldMaizeMember,
        SUM(m.`hsVolumeLostMaizeMember`) as hsVolumeLostMaizeMember,
        
        SUM(m.`hsAreaBeansMember`) as hsAreaBeansMember,
        SUM(m.`hsValueInputsBeansMember`) as hsValueInputsBeansMember,
        SUM(m.`hsTotalYieldBeansMember`) as hsTotalYieldBeansMember,
        SUM(m.`hsVolumeSoldBeansMember`) as hsVolumeSoldBeansMember,
        SUM(m.`hsVolumeLostBeansMember`) as hsVolumeLostBeansMember,
        
        
        SUM(m.`hsAreaCoffeeMember`) as hsAreaCoffeeMember,
        SUM(m.`hsValueInputsCoffeeMember`) as hsValueInputsCoffeeMember,
        SUM(m.`hsTotalYieldCoffeeMember`) as hsTotalYieldCoffeeMember,
        SUM(m.`hsVolumeSoldCoffeeMember`) as hsVolumeSoldCoffeeMember,
        SUM(m.`hsVolumeLostCoffeeMember`) as hsVolumeLostCoffeeMember,
        
        
        COUNT( m.`houseHoldId` ) AS numMembers
                FROM `tbl_household_members` as `m`,
                `tbl_district` d, `tbl_house_hold_details` as `h` ";
            $query_string.="WHERE h.`hsDistrict` = d.`districtCode` ";
            //Filter parameters
            if($dsName<>'' and $hsName<>''){
                    $query_string.="
                                    AND d.`districtName` LIKE '%".$dsName."%'
                                    AND h.`hsHead` LIKE '%".$hsName."%' ";
                    }elseif($dsName<>'' and $hsName==''){
                    $query_string.="AND d.`districtName` LIKE '%".$dsName."%' ";
                    }elseif($dsName=='' and $hsName<>''){
                    $query_string.="AND h.`hsHead` LIKE '%".$hsName."%' ";
                    }
            $query_string.="AND m.`houseHoldId`=h.`houseHoldId` ";
            $query_string.=" GROUP BY m.`houseHoldId` ORDER BY h.`tbl_house_hold_detailsId` DESC";
                
               $query_=mysql_query($query_string)or die(http("Export 1033"));
                /**************
                *paging parameters
                *
                ****/
                $max_records = mysql_num_rows($query_);
                //$records_per_page=5;
                $num_pages=ceil($max_records/$records_per_page);
                //$feedback->addAlert($cur_page);
                $offset = ($cur_page-1)*$records_per_page;
                $n=$offset+1;
                $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http("Export 1044"));
                
                
                
                
                while($rowh=mysql_fetch_array($new_query)){
                $color=$n%2==1?"white1":"evenrow"; 
                
        $data.="<tr class='".$color."'>
        <td>".$n.".</td>
        <td>".$rowh['districtName']."</td>";
        $data.="<td align='left'>".$rowh['hsHead']."</td>";    
       $data.="<td align='right'>".displayValues($rowh['numMembers'])."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsAreaMaizeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsValueInputsMaizeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsValueInputsBeansMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsValueInputsCoffeeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsTotalYieldCoffeeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldCoffeeMember'],2)."</td>";
       $data.="<td align='right'>".displayValues($rowh['hsVolumeLostCoffeeMember'],2)."</td>";
       $data.="</tr>";
 
  $n++;
  }
   //====================end of displayed data===================  
   $data.="</table>
            </td>
        </tr>";

//====================end of displayed data===================

$data.="</table></form>";

export($format,$data);

}

//view_dataFactSheet
function view_dataFactSheet($tYr1,$tYr2,$tYr3,$tYr4,$tYr5,$tYr6,$indicatorId,$format){
$qmobj= new QueryManager('');
$pmobj= new PerfMapsDataMining('');
$title=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'indicator_name');
$unit=$qmobj->RetrieveData($table="tbl_indicator",$condition="indicator_id",$indicatorId,'unitofmeasure');

$inc=1;

$queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
$opening_year=$queryHeader['opening_year'];
$closure_year=$queryHeader['closure_year'];

	


$data.="<table class='evenrowB' width='100%' border='1' callpadding='1' cellspacing='1'>";

	$data.="<tr>";
		/* the data fact sheet */
		$data.="<td width='600px' valign='top'>
			<table style='background-color:white;' width='600px' height='550px' cellspacing='1' border='1' callpadding='1'>
	
										
										
										<tr>
										<td colspan='17'><strong>DATA FACT SHEET ON:".$title."</strong></td>
										</tr>
										
										<tr>
											<th colspan='2' rowspan='2'></th>
											<th class='' colspan='2'>2013</th>
											<th colspan='2'>2014</th>
											<th colspan='2'>2015</th>
											<th colspan='2'>2016</th>
											<th colspan='2'>2017</th>
											<th colspan='2'>2018</th>
											<th rowspan='2'>Target</th>
											<th rowspan='2'>Actual</th>
											<th rowspan='2'>% Achievement</th>
										</tr>
										<tr>
											<th>T</th>
											<th>A</th>
											<th>T</th>
											<th>A</th>
											<th>T</th>
											<th>A</th>
											<th>T</th>
											<th>A</th>
											<th>T</th>
											<th>A</th>
											<th>T</th>
											<th>A</th>
										</tr>";
										//$obj->alert($indicatorId);
										
										switch ($indicatorId) {
										//The start of indicator:13
										default:
											for($i=1; $i<=12; $i++ ){
												$arrayNewIndicator= array("".$indicatorId.".".$i."",);
													foreach ($arrayNewIndicator as  $newIndicatorId){
														switch ($newIndicatorId) {
															case "".$indicatorId.".1":
															//North-coffee
																$NC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$NC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$NC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$NC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$NC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$NC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".2":
															//North-maize
																$NM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$NM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$NM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$NM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$NM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$NM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".3":
															//North-beans
																$NB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$NB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$NB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$NB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$NB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$NB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
															break;
															
															case "".$indicatorId.".4":
															//West-coffee
																$WC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$WC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$WC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$WC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$WC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$WC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".5":
															//West-maize
																$WM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$WM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$WM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$WM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$WM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$WM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".6":
															//West-beans
																$WB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$WB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$WB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$WB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$WB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$WB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
															break;
															
															case "".$indicatorId.".7":
															//East-coffee
																$EC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$EC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$EC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$EC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$EC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$EC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".8":
															//East-maize
																$EM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$EM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$EM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$EM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$EM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$EM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".9":
															//East-beans
																$EB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$EB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$EB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$EB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$EB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$EB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
															break;
															
															case "".$indicatorId.".10":
															//Central-coffee
																$CC_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$CC_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$CC_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$CC_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$CC_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$CC_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".11":
															//Central-maize
																$CM_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$CM_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$CM_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$CM_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$CM_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$CM_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');

															break;

															case "".$indicatorId.".12":
															//Central-beans
																$CB_ActualYr1 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr1');
																$CB_ActualYr2 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr2');
																$CB_ActualYr3 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr3');
																$CB_ActualYr4 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr4');
																$CB_ActualYr5 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr5');
																$CB_ActualYr6 = $pmobj->perfMapsDataMiningIndicator($newIndicatorId, $queryHeader['opening_year'], $queryHeader['closure_year'], 'notrainedYr6');
															break;
															
															

															default:
															break;
													}
													}
												
											}
											break;
										//The end of indicator:13	
										}

										
										$data.="<tr class='North'>";
										$data.="<td colspan='' rowspan='3'>North</td>";
										$data.="<td>Coffee</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr1))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr2))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr3))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr4))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr5))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeNorth($tYr6))."</td>";
										$data.="<td align='right'>".number_format($NC_ActualYr6,2)."</td>";
										
										$NC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeNorth($tYr1), targetsCoffeeNorth($tYr2), targetsCoffeeNorth($tYr3), targetsCoffeeNorth($tYr4), targetsCoffeeNorth($tYr5), targetsCoffeeNorth($tYr6), $yr7 = 0);
                						$NC_LOAA = $qmobj->dataMapsActual($NC_ActualYr1, $NC_ActualYr2, $NC_ActualYr3, $NC_ActualYr4, $NC_ActualYr5, $NC_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($NC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($NC_LOAA, 0, 'ExistsInteger') . "</td>";
										$NC_percentageAc = ColorCoding(calc_Percentage($NC_LOAT, $NC_LOAA), 1);
										$data .= $NC_percentageAc;
										
										$data.="</tr>";
										
										
										
										$data.="<tr class='North'>";
										$data.="<td colspan=''>Maize</td>";
										
										$data.="<td align='right'>".number_format(targetsMaizeNorth($tYr1))."</td>
										<td align='right'>".number_format($NM_ActualYr1,2)."</td>
										<td align='right'>".number_format(targetsMaizeNorth($tYr2))."</td>
										<td align='right'>".number_format($NM_ActualYr2,2)."</td>
										<td align='right'>".number_format(targetsMaizeNorth($tYr3))."</td>
										<td align='right'>".number_format($NM_ActualYr3,2)."</td>
										<td align='right'>".number_format(targetsMaizeNorth($tYr4))."</td>
										<td align='right'>".number_format($NM_ActualYr4,2)."</td>
										<td align='right'>".number_format(targetsMaizeNorth($tYr5))."</td>
										<td align='right'>".number_format($NM_ActualYr5,2)."</td>
										<td align='right'>".number_format(targetsMaizeNorth($tYr6))."</td>
										<td align='right'>".number_format($NM_ActualYr6,2)."</td>";
										
										$NM_LOAT = $qmobj->dataMapsTargets(targetsMaizeNorth($tYr1), targetsMaizeNorth($tYr2), targetsMaizeNorth($tYr3), targetsMaizeNorth($tYr4), targetsMaizeNorth($tYr5), targetsMaizeNorth($tYr6), $yr7 = 0);
                						$NM_LOAA = $qmobj->dataMapsActual($NM_ActualYr1, $NM_ActualYr2, $NM_ActualYr3, $NM_ActualYr4, $NM_ActualYr5, $NM_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($NM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($NM_LOAA, 0, 'ExistsInteger') . "</td>";
										$NM_percentageAc = ColorCoding(calc_Percentage($NM_LOAT, $NM_LOAA), 1);
										$data .= $NM_percentageAc;	
										
										$data.="</tr>";
										
										$data.="<tr class='North'>";
										$data.="<td colspan=''>Beans</td>";
										
										$data.="<td align='right'>".number_format(targetsBeansNorth($tYr1))."</td>
										<td align='right'>".number_format($NB_ActualYr1,2)."</td>
										<td align='right'>".number_format(targetsBeansNorth($tYr2))."</td>
										<td align='right'>".number_format($NB_ActualYr2,2)."</td>
										<td align='right'>".number_format(targetsBeansNorth($tYr3))."</td>
										<td align='right'>".number_format($NB_ActualYr3,2)."</td>
										<td align='right'>".number_format(targetsBeansNorth($tYr4))."</td>
										<td align='right'>".number_format($NB_ActualYr4,2)."</td>
										<td align='right'>".number_format(targetsBeansNorth($tYr5))."</td>
										<td align='right'>".number_format($NB_ActualYr5,2)."</td>
										<td align='right'>".number_format(targetsBeansNorth($tYr6))."</td>
										<td align='right'>".number_format($NB_ActualYr6,2)."</td>";
										
										$NB_LOAT = $qmobj->dataMapsTargets(targetsBeansNorth($tYr1), targetsBeansNorth($tYr2), targetsBeansNorth($tYr3), targetsBeansNorth($tYr4), targetsBeansNorth($tYr5), targetsBeansNorth($tYr6), $yr7 = 0);
                						$NB_LOAA = $qmobj->dataMapsActual($NB_ActualYr1, $NB_ActualYr2, $NB_ActualYr3, $NB_ActualYr4, $NB_ActualYr5, $NB_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($NB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($NB_LOAA, 0, 'ExistsInteger') . "</td>";
										$NB_percentageAc = ColorCoding(calc_Percentage($NB_LOAT, $NB_LOAA), 1);
										$data .= $NB_percentageAc;	
									
										$data.="</tr>";
										
										//End North
										$data.="<tr class='West'>";
										$data.="<td colspan='' rowspan='3'>West</td>";
										$data.="<td>Coffee</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr1))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr2))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr3))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr4))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr5))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeWest($tYr6))."</td>";
										$data.="<td align='right'>".number_format($WC_ActualYr6,2)."</td>";
										
										$WC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeWest($tYr1), targetsCoffeeWest($tYr2), targetsCoffeeWest($tYr3), targetsCoffeeWest($tYr4), targetsCoffeeWest($tYr5), targetsCoffeeWest($tYr6), $yr7 = 0);
                						$WC_LOAA = $qmobj->dataMapsActual($WC_ActualYr1, $WC_ActualYr2, $WC_ActualYr3, $WC_ActualYr4, $WC_ActualYr5, $WC_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($WC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($WC_LOAA, 0, 'ExistsInteger') . "</td>";
										$WC_percentageAc = ColorCoding(calc_Percentage($WC_LOAT, $WC_LOAA), 1);
										$data .= $WC_percentageAc;
										
										$data.="</tr>";
										
										$data.="<tr class='West'>";
										$data.="<td colspan=''>Maize</td>";
										
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr1))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr2))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr3))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr4))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr5))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeWest($tYr6))."</td>";
										$data.="<td align='right'>".number_format($WM_ActualYr6,2)."</td>";
										
										$WM_LOAT = $qmobj->dataMapsTargets(targetsMaizeWest($tYr1), targetsMaizeWest($tYr2), targetsMaizeWest($tYr3), targetsMaizeWest($tYr4), targetsMaizeWest($tYr5), targetsMaizeWest($tYr6), $yr7 = 0);
                						$WM_LOAA = $qmobj->dataMapsActual($WM_ActualYr1, $WM_ActualYr2, $WM_ActualYr3, $WM_ActualYr4, $WM_ActualYr5, $WM_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($WM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($WM_LOAA, 0, 'ExistsInteger') . "</td>";
										$WM_percentageAc = ColorCoding(calc_Percentage($WM_LOAT, $WM_LOAA), 1);
										$data .= $WM_percentageAc;	
										
										$data.="</tr>";
										
										$data.="<tr class='West'>";
										$data.="<td colspan=''>Beans</td>";
										
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr1))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr2))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr3))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr4))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr5))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansWest($tYr6))."</td>";
										$data.="<td align='right'>".number_format($WB_ActualYr6,2)."</td>";
										
										$WB_LOAT = $qmobj->dataMapsTargets(targetsBeansWest($tYr1), targetsBeansWest($tYr2), targetsBeansWest($tYr3), targetsBeansWest($tYr4), targetsBeansWest($tYr5), targetsBeansWest($tYr6), $yr7 = 0);
                						$WB_LOAA = $qmobj->dataMapsActual($WB_ActualYr1, $WB_ActualYr2, $WB_ActualYr3, $WB_ActualYr4, $WB_ActualYr5, $WB_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($WB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($WB_LOAA, 0, 'ExistsInteger') . "</td>";
										$WB_percentageAc = ColorCoding(calc_Percentage($WB_LOAT, $WB_LOAA), 1);
										$data .= $WB_percentageAc;	
									
										$data.="</tr>";
										
										$data.="<tr class='East'>";
										$data.="<td colspan='' rowspan='3'>East</td>";
										$data.="<td>Coffee</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr1))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr2))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr3))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr4))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr5))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeEast($tYr6))."</td>";
										$data.="<td align='right'>".number_format($EC_ActualYr6,2)."</td>";
										
										$EC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeEast($tYr1), targetsCoffeeEast($tYr2), targetsCoffeeEast($tYr3), targetsCoffeeEast($tYr4), targetsCoffeeEast($tYr5), targetsCoffeeEast($tYr6), $yr7 = 0);
                						$EC_LOAA = $qmobj->dataMapsActual($EC_ActualYr1, $EC_ActualYr2, $EC_ActualYr3, $EC_ActualYr4, $EC_ActualYr5, $EC_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($EC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($EC_LOAA, 0, 'ExistsInteger') . "</td>";
										$EC_percentageAc = ColorCoding(calc_Percentage($EC_LOAT, $EC_LOAA), 1);
										$data .= $EC_percentageAc;
										
										$data.="</tr>";
										
										$data.="<tr class='East'>";
										$data.="<td colspan=''>Maize</td>";
										
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr1))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr2))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr3))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr4))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr5))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeEast($tYr6))."</td>";
										$data.="<td align='right'>".number_format($EM_ActualYr6,2)."</td>";
										
										$EM_LOAT = $qmobj->dataMapsTargets(targetsMaizeEast($tYr1), targetsMaizeEast($tYr2), targetsMaizeEast($tYr3), targetsMaizeEast($tYr4), targetsMaizeEast($tYr5), targetsMaizeEast($tYr6), $yr7 = 0);
                						$EM_LOAA = $qmobj->dataMapsActual($EM_ActualYr1, $EM_ActualYr2, $EM_ActualYr3, $EM_ActualYr4, $EM_ActualYr5, $EM_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($EM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($EM_LOAA, 0, 'ExistsInteger') . "</td>";
										$EM_percentageAc = ColorCoding(calc_Percentage($EM_LOAT, $EM_LOAA), 1);
										$data .= $EM_percentageAc;	
										
										$data.="</tr>";
										
										$data.="<tr class='East'>";
										$data.="<td colspan=''>Beans</td>";
										
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr1))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr2))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr3))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr4))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr5))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansEast($tYr6))."</td>";
										$data.="<td align='right'>".number_format($EB_ActualYr6,2)."</td>";
										
										$EB_LOAT = $qmobj->dataMapsTargets(targetsBeansEast($tYr1), targetsBeansEast($tYr2), targetsBeansEast($tYr3), targetsBeansEast($tYr4), targetsBeansEast($tYr5), targetsBeansEast($tYr6), $yr7 = 0);
                						$EB_LOAA = $qmobj->dataMapsActual($EB_ActualYr1, $EB_ActualYr2, $EB_ActualYr3, $EB_ActualYr4, $EB_ActualYr5, $EB_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($EB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($EB_LOAA, 0, 'ExistsInteger') . "</td>";
										$EB_percentageAc = ColorCoding(calc_Percentage($EB_LOAT, $EB_LOAA), 1);
										$data .= $EB_percentageAc;	
									
										$data.="</tr>";
										
										$data.="<tr class='Central'>";
										$data.="<td colspan='' rowspan='3'>Central</td>";
										$data.="<td>Coffee</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr1))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr2))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr3))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr4))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr5))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsCoffeeCentral($tYr6))."</td>";
										$data.="<td align='right'>".number_format($CC_ActualYr6,2)."</td>";
										
										$CC_LOAT = $qmobj->dataMapsTargets(targetsCoffeeCentral($tYr1), targetsCoffeeCentral($tYr2), targetsCoffeeCentral($tYr3), targetsCoffeeCentral($tYr4), targetsCoffeeCentral($tYr5), targetsCoffeeCentral($tYr6), $yr7 = 0);
                						$CC_LOAA = $qmobj->dataMapsActual($CC_ActualYr1, $CC_ActualYr2, $CC_ActualYr3, $CC_ActualYr4, $CC_ActualYr5, $CC_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($CC_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($CC_LOAA, 0, 'ExistsInteger') . "</td>";
										$CC_percentageAc = ColorCoding(calc_Percentage($CC_LOAT, $CC_LOAA), 1);
										$data .= $CC_percentageAc;
										
										$data.="</tr>";
										
										$data.="<tr class='Central'>";
										$data.="<td colspan=''>Maize</td>";
										
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr1))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr2))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr3))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr4))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr5))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsMaizeCentral($tYr6))."</td>";
										$data.="<td align='right'>".number_format($CM_ActualYr6,2)."</td>";
										
										$CM_LOAT = $qmobj->dataMapsTargets(targetsMaizeCentral($tYr1), targetsMaizeCentral($tYr2), targetsMaizeCentral($tYr3), targetsMaizeCentral($tYr4), targetsMaizeCentral($tYr5), targetsMaizeCentral($tYr6), $yr7 = 0);
                						$CM_LOAA = $qmobj->dataMapsActual($CM_ActualYr1, $CM_ActualYr2, $CM_ActualYr3, $CM_ActualYr4, $CM_ActualYr5, $CM_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($CM_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($CM_LOAA, 0, 'ExistsInteger') . "</td>";
										$CM_percentageAc = ColorCoding(calc_Percentage($CM_LOAT, $CM_LOAA), 1);
										$data .= $CM_percentageAc;	
										
										$data.="</tr>";
										
										$data.="<tr class='Central'>";
										$data.="<td colspan=''>Beans</td>";
										
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr1))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr1,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr2))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr2,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr3))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr3,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr4))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr4,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr5))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr5,2)."</td>";
										$data.="<td align='right'>".number_format(targetsBeansCentral($tYr6))."</td>";
										$data.="<td align='right'>".number_format($CB_ActualYr6,2)."</td>";
										
										$CB_LOAT = $qmobj->dataMapsTargets(targetsBeansCentral($tYr1), targetsBeansCentral($tYr2), targetsBeansCentral($tYr3), targetsBeansCentral($tYr4), targetsBeansCentral($tYr5), targetsBeansCentral($tYr6), $yr7 = 0);
                						$CB_LOAA = $qmobj->dataMapsActual($CB_ActualYr1, $CB_ActualYr2, $CB_ActualYr3, $CB_ActualYr4, $CB_ActualYr5, $CB_ActualYr6, $yr7 = 0);
										$data .= "<td align='right'><strong>" . checkExistance($CB_LOAT, 0, 'ExistsInteger') . "</strong></td>";
										$data .= "<td align='right' >" . checkExistance($CB_LOAA, 0, 'ExistsInteger') . "</td>";
										$CB_percentageAc = ColorCoding(calc_Percentage($CB_LOAT, $CB_LOAA), 1);
										$data .= $CB_percentageAc;	
									
										$data.="</tr>";
										
									$data.="</table>
		</td>";

		

	$data.="</tr>";
$data.="</table>";



export($format,$data);
}

//view_frm6Survey
function view_frm6Survey($dsName,$hsName,$fromDate,$toDate,$speriod,$cur_page,$records_per_page,$format){
	$qmobj = new QueryManager('');
$n=1;

$inc=1;
$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];


$title=strtoupper('Commodity Production and Marketing Activity Household data');

$data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='28'>
      <div align='center'>".$title."</div>
    </th>
  </tr>";
 
//===================data to be displayed=====================
            
     $data.="<tr>
       <th  rowspan='2' >#</th>
	   <th  rowspan='2' >Region</th>
       <th  rowspan='2' >District</th>
	   <th  rowspan='2' >Subcounty</th>
	   <th  rowspan='2' >Farmer Code</th>
       <th  rowspan='2' >Sampled Farmer Name</th>
	   <th  rowspan='2' >Respondent</th>
	   <th  rowspan='2' >Compiled By</th>
	   <th  rowspan='2' >Surveyor's Tel</th>
       <th  colspan='6' >Maize</th>
       <th  colspan='6' >Beans</th>
       <th  colspan='6' >Coffee</th>
       <th  rowspan='2' >Date Surveyed</th>
     </tr>
     <tr>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
		 <th  >Common price<br />
         (UGX)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
		 <th  >Common price<br />
         (UGX)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
       <th  >Area (Acre)</th>
       <th  >Value of inputs (UGX)</th>
       <th  >Total yield<br />
         (Kg)</th>
       <th  >Volume sold<br />
         (Kg)</th>
		 <th  >Common price<br />
         (UGX)</th>
       <th  >Volume lost in PHH<br />
         (Kg)</th>
     </tr>";
  
    
        
$query_string="select 
`f`.`tbl_farmersId`,
`f`.`hhName`,
`f`.`farmersName`,
`f`.`farmersDistrict`,
`f`.`farmersSubcounty`,
`z`.`zoneName`,
`d`.`districtName` ,
`s`.`subcountyName`,
`g`.`compiled_by`,
`g`.`telephone`,
`b`.`beans_sold_price`,
`c`.`coffee_sold_price`,
`m`.`maize_sold_price`,
p . * ,
sum( if((`m`.`maize_acreage` <>'') or  (`m`.`maize_acreage`<>null),`m`.`maize_acreage`,0 )) as hsAreaMaizeMember,
sum(if((`m`.`maize_improved_cost` <>'') or  (`m`.`maize_improved_cost`<>null)
or (`m`.`maize_fertilizer_cost` <>'') or  (`m`.`maize_fertilizer_cost`<>null)
or (`m`.`maize_chemical_cost` <>'') or  (`m`.`maize_chemical_cost`<>null)
or (`m`.`maize_cost_ict` <>'') or  (`m`.`maize_cost_ict`<>null)
or (`m`.`maize_machinery_cost`<>'') or  (`m`.`maize_machinery_cost`<>null),
`m`.`maize_improved_cost` + `m`.`maize_fertilizer_cost` + `m`.`maize_chemical_cost` + `m`.`maize_cost_ict`+ `m`.`maize_machinery_cost`,0 ) ) as hsValueInputsMaizeMember,
sum( if((`m`.`maize_harvested` <>'') or  (`m`.`maize_harvested`<>null),`m`.`maize_harvested`,0 )) as hsTotalYieldMaizeMember,
sum( if((`m`.`maize_sold` <>'') or  (`m`.`maize_sold`<>null),`m`.`maize_sold`,0 )) as hsVolumeSoldMaizeMember,
sum( if((`m`.`maize_harvest_loss` <>'') or  (`m`.`maize_harvest_loss`<>null),`m`.`maize_harvest_loss`,0 )) as hsVolumeLostMaizeMember,

sum( if((`b`.`beans_acreage` <>'') or  (`b`.`beans_acreage`<>null),`b`.`beans_acreage`,0 )) as hsAreaBeansMember,
sum(if((`b`.`beans_improved_cost` <>'') or  (`b`.`beans_improved_cost`<>null)
or (`b`.`beans_fertilizer_cost` <>'') or  (`b`.`beans_fertilizer_cost`<>null)
or (`b`.`beans_chemical_cost` <>'') or  (`b`.`beans_chemical_cost`<>null)
or (`b`.`beans_cost_ict` <>'') or  (`b`.`beans_cost_ict`<>null)
or (`b`.`beans_machinery_cost`<>'') or  (`b`.`beans_machinery_cost`<>null),
`b`.`beans_improved_cost` + `b`.`beans_fertilizer_cost` + `b`.`beans_chemical_cost` + `b`.`beans_cost_ict`+ `b`.`beans_machinery_cost`,0 ) ) as hsValueInputsBeansMember,
sum( if((`b`.`beans_harvested` <>'') or  (`b`.`beans_harvested`<>null),`b`.`beans_harvested`,0 )) as hsTotalYieldBeansMember,
sum( if((`b`.`beans_sold` <>'') or  (`b`.`beans_sold`<>null),`b`.`beans_sold`,0 )) as hsVolumeSoldBeansMember,
sum( if((`b`.`beans_harvest_loss` <>'') or  (`b`.`beans_harvest_loss`<>null),`b`.`beans_harvest_loss`,0 )) as hsVolumeLostBeansMember,
 
sum( if((`c`.`coffee_acreage` <>'') or  (`c`.`coffee_acreage`<>null),`c`.`coffee_acreage`,0 )) as hsAreaCoffeeMember,
sum(if((`c`.`coffee_improved_cost` <>'') or  (`c`.`coffee_improved_cost`<>null)
or (`c`.`coffee_fertilizer_cost` <>'') or  (`c`.`coffee_fertilizer_cost`<>null)
or (`c`.`coffee_chemical_cost` <>'') or  (`c`.`coffee_chemical_cost`<>null)
or (`c`.`coffee_cost_ict` <>'') or  (`c`.`coffee_cost_ict`<>null)
or (`c`.`coffee_machinery_cost`<>'') or  (`c`.`coffee_machinery_cost`<>null),
`c`.`coffee_improved_cost` + `c`.`coffee_fertilizer_cost` + `c`.`coffee_chemical_cost` + `c`.`coffee_cost_ict`+ `c`.`coffee_machinery_cost`,0 ) ) as hsValueInputsCoffeeMember,
sum( if((`c`.`coffee_harvested` <>'') or  (`c`.`coffee_harvested`<>null),`c`.`coffee_harvested`,0 )) as hsTotalYieldCoffeeMember,
sum( if((`c`.`coffee_sold` <>'') or  (`c`.`coffee_sold`<>null),`c`.`coffee_sold`,0 )) as hsVolumeSoldCoffeeMember,
sum( if((`c`.`coffee_harvest_loss` <>'') or  (`c`.`coffee_harvest_loss`<>null),`c`.`coffee_harvest_loss`,0 )) as hsVolumeLostCoffeeMember

FROM
`tbl_frm6particulars` as `p`,
`tbl_frm6production_maize` as `m`,
`tbl_frm6production_beans` as `b`,
`tbl_frm6production_coffee` as `c`,
`tbl_frm6gqnsandgps` as `g`, 
`tbl_farmers` as `f`,
`tbl_zone` as `z`,
`tbl_district`as `d`,
`tbl_subcounty` as `s` ";

$query_string.="WHERE `p`.`farmer_code` = `f`.`tbl_farmersId`
AND `c`.`farmer_code` = `p`.`farmer_code`
AND `m`.`farmer_code` = `p`.`farmer_code`
AND `b`.`farmer_code` = `p`.`farmer_code` 
AND `p`.`pk_patId` = `m`.`fk_patId`
AND `p`.`pk_patId` = `m`.`fk_patId`
AND `m`.`fk_patId` = `b`.`fk_patId`
AND `b`.`fk_patId` = `c`.`fk_patId`
AND `c`.`fk_patId` = `g`.`fk_patId`
AND `d`.`zone` = `z`.`zoneCode`
AND `f`.`farmersDistrict` = `d`.`districtCode`
AND `f`.`farmersSubcounty` = `s`.`subcountyCode` ";

$hhString = " and `f`.`tbl_farmersId` like '".$hsName."%' "; 
$hhFilter=(!empty($hsName))?$hhString:" ";
$query_string.=$hhFilter;

$districtString = " and `d`.`districtCode` = '".$dsName."' "; 
$districtFilter=(!empty($dsName))?$districtString:" ";
$query_string.=$districtFilter;

$dateString = " and `p`.`interview_date` between ('".$fromDate."') and ('".$toDate."') "; 
$dateFilter=(!empty($fromDate) && !empty($toDate))?$dateString:" ";
$query_string.=$dateFilter;

$sfrom = substr($speriod, 0, 10);    
$sto = substr($speriod, -10);  

$speriodString = " and `p`.`interview_date` between ('".$sfrom."') and ('".$sto."') "; 
$speriodFilter=(!empty($sfrom) && !empty($sto))?$speriodString:" ";
$query_string.=$speriodFilter;



$query_string.="
group by `p`.`pk_patId`
ORDER BY `p`.`pk_patId` DESC";
//$obj->alert($query_string);
                
               $query_=mysql_query($query_string)or die(http(__line__));
                /**************
                *paging parameters
                *
                ****/
                $max_records = mysql_num_rows($query_);
                $num_pages=ceil($max_records/$records_per_page);
                $offset = ($cur_page-1)*$records_per_page;
                $n=$offset+1;
                $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
                while($rowh=mysql_fetch_array($new_query)){
                $color=$n%2==1?"white1":"evenrow"; 
                
        $data.="<tr class='".$color."'>";
        $data.="<td>".$n."</td>";
		$data.="<td>".$rowh['zoneName']."</td>";
        $data.="<td>".$rowh['districtName']."</td>";
		$data.="<td>".$rowh['subcountyName']."</td>";
		$data.="<td>".$rowh['tbl_farmersId']."</td>";
        $data.="<td align='left'>".$rowh['farmersName']."</td>";
		$data.="<td align='left'>".$rowh['respondent']."</td>";
		$data.="<td align='left'>".$rowh['compiled_by']."</td>";
		$telString=$rowh['telephone'];
		$rest = substr("".$telString."", 0, 1); 
		$allZeroStarters=substr("".$telString."", 1, -1);
		$tel=($rest<>0)?"+256".$telString:"+256".$allZeroStarters;
		$data.="<td align='left'>".$tel."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsAreaMaizeMember'],2)."</td>";
		$hsValueInputsMaizeMember=(($rowh['hsValueInputsMaizeMember'])<=1.0 ?"-":($rowh['hsValueInputsMaizeMember'])-1);
		$data.="<td align='right'>".number_format($hsValueInputsMaizeMember,2)."</td>";
		$data.="<td align='right'>".displayValues($rowh['hsTotalYieldMaizeMember'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldMaizeMember'],2)."</td>";
		$data.="<td align='right'>".displayValues($rowh['maize_sold_price'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeLostMaizeMember'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsAreaBeansMember'],2)."</td>";
		$hsValueInputsBeansMember=(($rowh['hsValueInputsBeansMember'])<=1.0 ?"-":($rowh['hsValueInputsBeansMember'])-1);
		$data.="<td align='right'>".number_format($hsValueInputsBeansMember,2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsTotalYieldBeansMember'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldBeansMember'],2)."</td>";
		$data.="<td align='right'>".displayValues($rowh['beans_sold_price'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeLostBeansMember'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsAreaCoffeeMember'],2)."</td>";
        $hsValueInputsCoffeeMember=(($rowh['hsValueInputsCoffeeMember'])<=1.0 ?"-":($rowh['hsValueInputsCoffeeMember'])-1);
		$data.="<td align='right'>".number_format($hsValueInputsCoffeeMember,2)."</td>";
		$data.="<td align='right'>".displayValues($rowh['hsTotalYieldCoffeeMember'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeSoldCoffeeMember'],2)."</td>";
		$data.="<td align='right'>".displayValues($rowh['coffee_sold_price'],2)."</td>";
        $data.="<td align='right'>".displayValues($rowh['hsVolumeLostCoffeeMember'],2)."</td>";
        $data.="<td align='right'>".$rowh['interview_date']."</td>";
        $data.="</tr>";
 
  $n++;
  }
  $data.="".noRecordsFound($new_query,10).""; 
   //====================end of displayed data===================
   $data.="</table>
            </td>
        </tr>";

//====================end of displayed data===================

$data.="</table></form>";

export($format,$data);

}

//qAnalyzer_results
function qAnalyzer_results($dataForms,$dataSets,$condition,$searchValueOne,$searchValueTwo,$searchValueThree,$searchValueFour,$offsetLimit,$countLimit,$oder,$dateOne,$dateTwo,$format){
$qaobj = new QueryAnalyzer('');
$recordId=$searchValueThree;
$reportingPeriod=$searchValueOne;
$year=$searchValueTwo;
$traderId=$searchValueFour;


						 
							$and=' and ';
						
						
							switch($condition){
							case 13;
								
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 14;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 15;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 16;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$fieldThree="w.tbl_exporterId like'".$searchValueThree."%'";
							$fieldThree=($fieldThree=="''")?"":$fieldThree;
							$dynamicString=$fieldOne.$and.$fieldTwo.$and.$fieldThree;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 17;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$fieldThree="w.tbl_exporterId like'".$searchValueThree."%'";
							$fieldThree=($fieldThree=="''")?"":$fieldThree;
							$dynamicString=$fieldOne.$and.$fieldTwo.$and.$fieldThree;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 18;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$fieldThree="w.tbl_exporterId like'".$searchValueThree."%'";
							$fieldThree=($fieldThree=="''")?"":$fieldThree;
							$dynamicString=$fieldOne.$and.$fieldTwo.$and.$fieldThree;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 19;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 20;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 21;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$dynamicString=$fieldOne.$and.$fieldTwo;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 22;
							$fieldOne="w.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="w.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$fieldFour="w.tbl_traderId like'".$searchValueFour."%'";
							$fieldFour=($fieldFour=="''")?"":$fieldFour;
							$dynamicString=$fieldOne.$and.$fieldTwo.$and.$fieldFour;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							case 46;
							$fieldOne="t.reportingPeriod like '".$searchValueOne."%'";
							$fieldOne=($fieldOne=="''")?"":$fieldOne;
							$fieldTwo="t.year like '".$searchValueTwo."%'";
							$fieldTwo=($fieldTwo=="''")?"":$fieldTwo;
							$fieldFour="x.tbl_tradersId like'".$searchValueFour."%'";
							$fieldFour=($fieldFour=="''")?"":$fieldFour;
							$dynamicString=$fieldOne.$and.$fieldTwo.$and.$fieldFour;
							$lastThreeCharacters=trim(substr("".$dynamicString."", -4));
							$newDynamicString=($lastThreeCharacters=='and')?substr("".$dynamicString."", 0, -4):$dynamicString;
							break;
							
							default:
							break;
							}

						
							$tabUnsanitized=$qaobj->DataTables($dataSets,$condition);
							$tables=substr("".$tabUnsanitized."", 0, -1);
							$fieldsToDisplay=$qaobj->DataFieldsToDisplay($condition);
							$keyCondition=$qaobj->DataPrimaryCondition($condition);
							$secondaryCondition=$qaobj->DataSecondaryCondition($condition);
							$dynamicCondition=($newDynamicString<>'' || $newDynamicString<>null)?$and.$newDynamicString:"";
							$primarySortField=$qaobj->DataOrderingPrimary($condition);
							$secondarySortField=$qaobj->DataOrderingSecondary($condition);
							$dateString=" and ".$secondarySortField." between cast('".$dateOne."' as date) and cast('".$dateTwo."' as date)";
							$dateOption=(($dateOne<>'' && $dateTwo<>'')?"".$dateString."":"");
							$limitString="limit ".$offsetLimit.", ".$countLimit."";
							$limitOption=(($offsetLimit<>'' && $countLimit<>'')?"".$limitString."":"");
							$satisfiedCondition =($df==$dataForms && $ds==$dataSets && $dc==$condition);
						
						  switch ($satisfiedCondition ){
							 default:
									$queryPart=$qaobj->analyzerDynamicQuery($fieldsToDisplay,$tables,$keyCondition,$secondaryCondition,$dynamicCondition,$primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
									break;
									
									} 
									//Queries that are custom made due to MySQL optimization issues
								switch($condition){
								case 25:	
									$queryPart=$qaobj->qAnalyzerForm6MaizeProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 26:
									$queryPart=$qaobj->qAnalyzerForm6MaizeProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 27:
									$queryPart=$qaobj->qAnalyzerForm6MaizeProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								
								case 28:	
									$queryPart=$qaobj->qAnalyzerForm6CoffeeProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 29:
									$queryPart=$qaobj->qAnalyzerForm6CoffeeProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 30:
									$queryPart=$qaobj->qAnalyzerForm6CoffeeProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								
								case 31:	
									$queryPart=$qaobj->qAnalyzerForm6BeansProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 32:
									$queryPart=$qaobj->qAnalyzerForm6BeansProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 33:
									$queryPart=$qaobj->qAnalyzerForm6BeansProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 34:
									$queryPart=$qaobj->qAnalyzerForm6GeneralProductionDateSurveyed($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 35:
									$queryPart=$qaobj->qAnalyzerForm6GeneralProductionLocation($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 36:
									$queryPart=$qaobj->qAnalyzerForm6GeneralProductionGender($primarySortField,$secondarySortField,$dateOption,$oder,$limitOption);
								break;
								case 37:
									$queryPart=$qaobj->qAnalyzerForm7GroupsRegion($primarySortField,$secondarySortField,$oder,$limitOption);
								break;
								
								
								
								default:
								break;
								}	
								
								
								if(empty($queryPart)){
									$data.="<table width='100%'  cellspacing='1' cellpadding='1' border=1 style='background-color:#EBEBEB;' >
										<tr class='evenrow'>
										<td colspan='8' rowspan='2'>".errorMsg("The current Filter Parameters Have no result")."</td>
										</tr>";

								}else{ 
								
										$result=@Execute($queryPart)or die(http("SearchForDataFrm-213"));
							
										// Print the column names as the headers of a table
										$data.="<table border=1 cellspacing=1 cellpadding=1 width='100%'>";
										$colspan=(mysql_num_fields($result)+1);
										
										switch($condition){
											case 16:
												$data.=$qaobj->analyzerExporterDisaggregationData($recordId,$reportingPeriod,$year);
											break;
											case 17:
												$data.=$qaobj->analyzerExporterDisaggregationData($recordId,$reportingPeriod,$year);
											break;
											case 18:
												$data.=$qaobj->analyzerExporterDisaggregationData($recordId,$reportingPeriod,$year);
											break;
											
											case 22:	
												$data.=$qaobj->analyzerTraderDisaggregationData($traderId,$reportingPeriod,$year);
											break;
											
											case 23:	
												$data.=$qaobj->analyzerTraderDisaggregationData($traderId,$reportingPeriod,$year);
											break;
											
											case 24:	
												$data.=$qaobj->analyzerTraderDisaggregationData($traderId,$reportingPeriod,$year);
											break;
											
											case 46:	
												$data.=$qaobj->entTech_view($query=$queryPart);
											break;
												
											default:
												$data.="<tr>";
												$data.="<th>#</th>";
													for($i = 0; $i < mysql_num_fields($result); $i++) {
														$field_info = mysql_fetch_field($result, $i);
														$data.="<th>{$field_info->name}</th>";
													}
												$data.="</tr>";
												//End of column names for headers	
											
												$n=1;
												while($row = mysql_fetch_row($result)) {
														$color=$n%2==1?"evenrow":"evenrow3";
														$data.="<tr class=".$color.">";
														$data.="<td>".$n.". </td>";
														foreach($row as $_column) {
															$data.="";
															$data.="<td>&nbsp;{$_column}</td>";
														}
														$data.="</tr>";
													$n++;
												}
												
												$data.=noRecordsFound($result,$colspan);
											break;
										}
										$data.="</table>";
									}

export($format,$data);

}

//view_form8
function view_form8($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');
$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;


$data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='15'>
      <div align='center'>Commodity Production and Marketing Activity  DEMO  RECORD BOOK DATA</div>
    </th>
  </tr>";
 
 //===================data to be displayed=====================

$data.="
  <tr>
    <th>#</th>
    <th>Host Farmer</th>
    <th>Season</th>
    <th>Crop</th>
    <th>Variety</th>
    <th>Total area (Acres)</th>
    <th colspan='7'>Treatments</th>
	<th>Yield (Kg)</th>
	<th>Report on Demo/response-diseases, pests, plant growth habits etc</th>
    <th>No.of farmers exposed</th>
    <th>Action</th>
  </tr>";

                                        
        /* $stmnt="SELECT d . * , bd . *, f.`tbl_farmersId`,f.`farmersName`, v.`pk_cropVarietiesId`,v.`cropVariety` as nameVariety
FROM `tbl_demo_records_book` d
LEFT JOIN `tbl_demo_book_details` bd ON d.`demoId` = bd.`demoId`
LEFT JOIN `tbl_farmers` f ON f.`tbl_farmersId`=d.`nameHostFarmer`
JOIN `tbl_cropvarieties` v ON v.`pk_cropVarietiesId`=d.`cropVariety`
ORDER BY d.`demoId` DESC"; */

$stmnt="SELECT d . * , bd . *, f.`tbl_farmersId`,f.`farmersName`, v.`pk_cropVarietiesId`,v.`cropVariety` as nameVariety
FROM `tbl_demo_records_book` d
LEFT JOIN `tbl_demo_book_details` bd ON d.`demoId` = bd.`demoId`
LEFT JOIN `tbl_farmers` f ON f.`tbl_farmersId`=d.`nameHostFarmer`
JOIN `tbl_cropvarieties` v ON v.`pk_cropVarietiesId`=d.`cropVariety`
ORDER BY d.`demoId` DESC";
  $qform3=mysql_query($stmnt);
  $x=1;
  while($row=mysql_fetch_array($qform3)){
$color=$n%2==1?"evenrow":"white1";

$data.="<tr class='".$color."'>";
$data.="<td rowspan='4'>".$x.".<input name='loopkey[]' id='loopkey".$x."' type='hidden' value='1'/></td>";
    
    $data.="<td rowspan='4'>".$row['nameHostFarmer']."</td>";
    $data.="<td rowspan='4'>".$row['demoSeason']."</td>";
    
    
    $data.="<td rowspan='4'>".$row['farmerCrop']."</td>";
    $data.="<td rowspan='4'>".$row['nameVariety']."</td>";
    $totArea=($row['sizePlotA']+$row['sizePlotB']+$row['sizePlotC']+$row['sizePlotD']);
    $data.="<td align='right' rowspan='4'>".number_format($totArea,2)."</td>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotA'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotA'])."</td>";
	$data.="<td align='right'>".number_format($row['yieldPlotA'],2)."</td>";
	$data.="<td align='right'>".$row['reportonDemoPlotA']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotA'])."</td>";
    $data.="<td rowspan='4'><input type='button' class='formButton2'TITLE='Edit'  onclick=\"xajax_edit_form8(xajax.getFormValues('form8'));return false;\" value='edit' /></td>";
$data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotB'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotB'])."</td>";
	$data.="<td align='right'>".number_format($row['yieldPlotB'],2)."</td>";
	$data.="<td align='right'>".$row['reportonDemoPlotB']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotB'])."</td>";
  $data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotC'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotC'])."</td>";
	$data.="<td align='right'>".number_format($row['yieldPlotC'],2)."</td>";
	$data.="<td align='right'>".$row['reportonDemoPlotC']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotC'])."</td>";
  $data.="</tr>";
  $data.="</tr>";
  $data.="<tr class='".$color."'>";
    $data.="<td align='right'>".number_format($row['treatmentOnePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentTwoPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentThreePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFourPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentFivePlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSixPlotD'])."</td>";
    $data.="<td align='right'>".number_format($row['treatmentSevenPlotD'])."</td>";
	$data.="<td align='right'>".number_format($row['yieldPlotD'],2)."</td>";
	$data.="<td align='right'>".$row['reportonDemoPlotD']."</td>";
    $data.="<td align='right'>".number_format($row['numTotalPlotD'])."</td>";
  $data.="</tr>";
$x++;
$n++;
}

////====================end of displayed data===================
  
$data.="</table></form>";

export($format,$data);

}

//view_form7
function view_form7($trader,$village_agent,$cpma_year,$reporting_period,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');	
$space="&nbsp;";

$title= strtoupper('Commodity Production and Marketing Activity Register for Farmers (Individuals & Groups)');
$data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='12'>
      <div align='center'>".$title."</div>
    </th>
  </tr>";
 

 //===================data to be displayed=====================

$data.="<tr>
<th rowspan='2'>#</th>
<th rowspan='2'>Trader</th>
<th rowspan='2'>Name of Village Agent</th>
<th rowspan='2'>VA Code</th>
<th rowspan='2'>Total N<u>o</u>. of farmers</th>
<th rowspan='2'>N<u>o</u>. of Groups</th>
<th colspan=3 >N<u>o</u>. of farmers in groups</th>
<th colspan='3'>N<u>o</u>. of individual farmers</th>
</tr>";

$data.="<tr>
<th>Male</th>
<th>Female</th>
<th>Total</th>
<th>Male</th>
<th>Female</th>
<th>Total</th>
</tr>";





//=========================Start of data display=======================
		
	switch($cpma_year){
			case'CPMA Year One':
			$reportingYearToPeriod="'Oct - Mar 2013','Apr - Sep 2013','Oct - Mar2013','Apr - Sep2013'";
			break;
			
			case'CPMA Year Two':
			$reportingYearToPeriod="'Oct - Mar 2014','Apr - Sep 2014','Oct - Mar2014','Apr - Sep2014'";
			break;
			
			case'CPMA Year Three':
			$reportingYearToPeriod="'Oct - Mar 2015','Apr - Sep 2015','Oct - Mar2015','Apr - Sep2015'";
			break;
			
			case'CPMA Year Four':
			$reportingYearToPeriod="'Oct - Mar 2016','Apr - Sep 2016','Oct - Mar2016','Apr - Sep2016'";
			break;
			
			case'CPMA Year Five':
			$reportingYearToPeriod="'Oct - Mar 2017','Apr - Sep 2017','Oct - Mar2017','Apr - Sep2017'";
			break;
			
			case'CPMA Year Six':
			$reportingYearToPeriod="'Oct - Mar 2018','Apr - Sep 2018','Oct - Mar2018','Apr - Sep2018'";
			break;
			
			default:
			break;
		}
		
		switch($reporting_period){
			case'Oct 2012 - Mar 2013':
			$reportingYearToPeriodCleaned="'Oct - Mar 2013','Oct - Mar2013'";
			break;
			
			case'Apr 2013 - Sep 2013':
			$reportingYearToPeriodCleaned="'Apr - Sep 2013','Apr - Sep2013'";
			break;
			
			case'Oct 2013 - Mar 2014':
			$reportingYearToPeriodCleaned="'Oct - Mar 2014','Oct - Mar2014'";
			break;
			
			case'Apr 2014 - Sep 2014':
			$reportingYearToPeriodCleaned="'Apr - Sep 2014','Apr - Sep2014'";
			break;
			
			case'Oct 2014 - Mar 2015':
			$reportingYearToPeriodCleaned="'Oct - Mar 2015','Oct - Mar2015'";
			break;
			
			case'Apr 2015 - Sep 2015':
			$reportingYearToPeriodCleaned="'Apr - Sep 2015','Apr - Sep2015'";
			break;
			
			case'Oct 2015 - Mar 2016':
			$reportingYearToPeriodCleaned="'Oct - Mar 2016','Oct - Mar2016'";
			break;
			
			case'Apr 2016 - Sep 2016':
			$reportingYearToPeriodCleaned="'Apr - Sep 2016','Apr - Sep2016'";
			break;
			
			case'Oct 2016 - Mar 2017':
			$reportingYearToPeriodCleaned="'Oct - Mar 2017','Oct - Mar2017'";
			break;
			
			case'Apr 2017 - Sep 2017':
			$reportingYearToPeriodCleaned="'Apr - Sep 2017','Apr - Sep2017'";
			break;
			
			case'Oct 2017 - Mar 2018':
			$reportingYearToPeriodCleaned="'Oct - Mar 2018','Oct - Mar2018'";
			break;
			
			case'Apr 2018 - Sep 2018':
			$reportingYearToPeriodCleaned="'Apr - Sep 2018','Apr - Sep2018'";
			break;
			
			
			break;
			
			default:
			break;
		}
	$query_string="SELECT 
					`g`.*, 
					`v`.`tbl_villageAgentId`,
					`v`.`vAgentName`,
					`v`.`vAgentCode`,
					`t`.`traderName`
					FROM `tbl_villageagent_groups` as `g`, 
					`tbl_villageagents` as `v`,
					`tbl_traders` as `t`				
					where `v`.`tbl_villageAgentId` = `g`.`tbl_villageAgentId`
					and `g`.`display`='Yes'
					and `t`.`tbl_tradersId` = `g`.`tbl_tradersId`
					and `v`.`display`='Yes' ";

	$filterValue = '';
	//filter parameters
	//$trader,$village_agent,$cpma_year,$reporting_period,
	
	if(!empty($trader)){ $filterValue.="and g.tbl_tradersId='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and g.tbl_villageAgentId='".$village_agent."'  ";}						
	if((!empty($cpma_year))){ $filterValue.="and `g`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `g`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	
	$query_string.=$filterValue;

	$query_string.="group by `v`.`vAgentCode` order by `v`.`vAgentName`"; 



$query_=@Execute($query_string)or die(http(__line__));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
//$feedback->addAlert($cur_page);
$offset = ($cur_page-1)*$records_per_page;
$m=$offset+1;
$new_query=@Execute($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));



$x=1;
while($row=mysql_fetch_array($new_query)){
$color=$m%2==1?"white1":"evenrow";

$data.="<tr class='".$color."'>";
	$data.="<td>".$m.".</td>";
	$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['traderName'])."</td>";
	$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentName'])."</td>";
	$data.="<td>&nbsp;&nbsp;".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentCode'])."</td>";
	/* numFarmers_all  */
	$stAllFarmers="select COUNT(*) as `numAllFarmers` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'"; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stAllFarmers.=$filterValue;
	$stAllFarmers.="and `f`. `display` like 'Yes%'";
	$qAllFarmers=@Execute($stAllFarmers) or die(http(__line__));
	$rAllFarmers=FetchRecords($qAllFarmers);
	$data.="<td align='right'>".number_format($rAllFarmers['numAllFarmers'])."</td>";
	
	/* numberGroups */
	$stNumGroups="select COUNT(distinct(`f`.`groupName`)) as `numGroups` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stNumGroups.=$filterValue;
	$stNumGroups.=" and `f`. `display` like 'Yes%' 
	and `f`.`groupName` <> 'No Group' 
	and `f`.`groupName` <> ''";
	$qNumGroups=@Execute($stNumGroups) or die(http(__line__));
	$rNumGroups=FetchRecords($qNumGroups);
	$data.="<td align='right'>".number_format($rNumGroups['numGroups'])."</td>";
	/* numFarmersGroups_Male */
	$stMale="select COUNT(*) as `numqMalesInGroups` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stMale.=$filterValue;
	$stMale.="and `f`. `display` like 'Yes%' 
	and  `f`.`groupName` <> 'No Group' 
	and `f`.`groupName` <> '' 
	and `f`.`farmersSex` like 'Male%'";
	$qMale=@Execute($stMale) or die(http(__line__));
	$rMale=FetchRecords($qMale);
	$data.="<td align='right'>".number_format($rMale['numqMalesInGroups'])."</td>";
	/* numFarmersGroups_Female */
	$stFemale="select COUNT(*) as `numqFemalesInGroups` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stFemale.=$filterValue;
	$stFemale.="and `f`. `display` like 'Yes%' 
	and `f`.`groupName` <> 'No Group' 
	and `f`.`groupName` <> '' 
	and `f`.`farmersSex` like 'Female%'";
	$qFemale=@Execute($stFemale) or die(http(__line__));
	$rFemale=FetchRecords($qFemale);
	$data.="<td align='right'>".number_format($rFemale['numqFemalesInGroups'])."</td>";
	/* numFarmersGroups_Total */
	$data.="<td align='right'>".number_format((($rFemale['numqFemalesInGroups'])+($rMale['numqMalesInGroups'])))."</td>";
	
	/* numFarmersNoGroups_Male */
	$stNoGrpMale="select COUNT(*) as `numqMalesNoGroupsOne` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stNoGrpMale.=$filterValue;
	$stNoGrpMale.="and `f`. `display` like 'Yes%' 
	and `f`.`groupName` = '' 
	and `f`.`farmersSex` like 'Male%'";
	$qNoGrpMale=@Execute($stNoGrpMale) or die(http(__line__));
	$rNoGrpMale=FetchRecords($qNoGrpMale);
	$NoGrpMaleOne=$rNoGrpMale['numqMalesNoGroupsOne'];
	$stNoGrpMale="select COUNT(*) as `numqMalesNoGroupsTwo` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stNoGrpMale.=$filterValue;
	$stNoGrpMale.="and `f`. `display` like 'Yes%' 
	and `f`.`groupName` = 'No Group'  
	and `f`.`farmersSex` like 'Male%'";
	$qNoGrpMale=@Execute($stNoGrpMale) or die(http(__line__));
	$rNoGrpMale=FetchRecords($qNoGrpMale);
	$NoGrpMaleTwo=$rNoGrpMale['numqMalesNoGroupsTwo'];
	$NoGrpMaleTotal=($NoGrpMaleOne+$NoGrpMaleTwo);
	$data.="<td align='right'>".number_format($NoGrpMaleTotal)."</td>";
	
	/* numFarmersNoGroups_Female */
	$stNoGrpFemale="select COUNT(*) as `numqFemalesNoGroupsOne` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stNoGrpFemale.=$filterValue;
	$stNoGrpFemale.="and `f`. `display` like 'Yes%' 
	and `f`.`groupName` = '' 
	and `f`.`farmersSex` like 'Female%'";
	$qNoGrpFemale=@Execute($stNoGrpFemale) or die(http(__line__));
	$rNoGrpFemale=FetchRecords($qNoGrpFemale);
	$NoGrpFemaleOne=$rNoGrpFemale['numqFemalesNoGroupsOne'];
	$stNoGrpFemale="select COUNT(*) as `numqFemalesNoGroupsTwo` 
	from `tbl_farmers` as `f` 
	where `f`.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."' "; 
	$filterValue = '';
	//filter parameters
	
	if(!empty($trader)){ $filterValue.="and `f`.`tbl_tradersId`='".$trader."'  ";}
	if(!empty($village_agent)){ $filterValue.="and `f`.`tbl_villageAgentId`='".$village_agent."'  ";}
	if((!empty($cpma_year))){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriod.") ";}
	if(!empty($reporting_period)){ $filterValue.="and `f`.`reportingPeriod`  in (".$reportingYearToPeriodCleaned.") ";}
	$stNoGrpFemale.=$filterValue;
	$stNoGrpFemale.="and `f`. `display` like 'Yes%' 
	and `f`.`groupName` = 'No Group'  
	and `f`.`farmersSex` like 'Female%'";
	$qNoGrpFemale=@Execute($stNoGrpFemale) or die(http(__line__));
	$rNoGrpFemale=FetchRecords($qNoGrpFemale);
	$NoGrpFemaleTwo=$rNoGrpFemale['numqFemalesNoGroupsTwo'];
	$NoGrpFemaleTotal=($NoGrpFemaleOne+$NoGrpFemaleTwo);
	$data.="<td align='right'>".number_format($NoGrpFemaleTotal)."</td>";
	
	/* numFarmersNoGroups_Total */
	$data.="<td align='right'>".number_format(($NoGrpFemaleTotal+$NoGrpMaleTotal))."</td>";
	$data.="</tr>";

$x++;
$m++;
}
$data.="".noRecordsFound($new_query,10)."";

//====================end of displayed data===================

$data.="</table></form>";

export($format,$data);

}

function view_training($technicalArea,$trainingFocus,$location,$fromDate,$toDate,$cur_page=1,$records_per_page=20,$format)
{
$qmobj = new QueryManager('');
$n=1; 


$technicalArea=$_SESSION['technicalArea'];
$trainingFocus=$_SESSION['trainingFocus'];
$location=$_SESSION['location'];
$fromDate=$_SESSION['fromDate'];
$toDate=$_SESSION['toDate'];
$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];

$title='Commodity Production and Marketing Activity  Short-term Trainings';

$data="<form action=\"".$PHP_SELF."\" name='training' id='training' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='24'>
      <div align='center'>".$title."</div>
    </th>
  </tr>";
 
 //===================data to be displayed=====================

$data.="<tr>
  	<th rowspan='3'>#</th>
    <th rowspan='3'>Techinical Area Addressed</th>
    <th rowspan='3'>Training Focus</th>
    <th rowspan='3'>Target Audience</th>
    <th rowspan='3'>Date of Training</th>
    <th rowspan='3'>Location</th>
    <th colspan='9'>Total Number of Participants</th>
	<th colspan='9'>Age Categories</th>
  </tr>
  <tr>
    <th colspan='3'>TOTAL</th>
    <th colspan='3'>NEW</th>
    <th colspan='3'>OLD</th>
	
	<th colspan='3'>Children</th>
    <th colspan='3'>Youth</th>
    <th colspan='3'>Adults</th>
	
  </tr>
  <tr>
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
	
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
    <th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
	<th>Male</th>
    <th>Female</th>
    <th>Total</th>
	
  </tr>";

$m=1;


    
    $query_string="SELECT 
					t.tbl_trainingId,
					SUBSTR(c.`name`, 3) as `tAddressed`,
					SUBSTR(f.`focusName`, 3) as `tFocus`,
					SUBSTR(a.`audienceName`, 3) as `tAudience`,
					t.trainingDate,
					t.trainingVillage as village1,
					  
					sum( if( `p`.`sex`='Male', 1, 0 ) ) as `pMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='New', 1, 0 ) ) as `nMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='Old', 1, 0 ) ) as `oMale`,

					sum( if( `p`.`sex`='Male' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yOMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yNMale`,

					sum( if( `p`.`sex`='Male' and `p`.`age`<=18, 1, 0 ) ) as `CMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age`<=18, 1, 0 ) ) as `CNMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age`<=18, 1, 0 ) ) as `COMale`,

					sum( if( `p`.`sex`='Male' and `p`.`age` >35, 1, 0 ) ) as `AMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='New' and `p`.`age` >35, 1, 0 ) ) as `ANMale`,
					sum( if( `p`.`sex`='Male' and `p`.`status`='Old' and `p`.`age` >35, 1, 0 ) ) as `AOMale`,

					sum( if( `p`.`sex`='Female', 1, 0 ) ) as `pFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='New', 1, 0 ) ) as `nFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='Old', 1, 0 ) ) as `oFemale`,

					sum( if( `p`.`sex`='Female' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yOFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age`<=35 AND `p`.`age`>=18, 1, 0 ) ) as `yNFemale`,

					sum( if( `p`.`sex`='Female' and `p`.`age`<=18, 1, 0 ) ) as `CFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age`<=18, 1, 0 ) ) as `CNFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age`<=18, 1, 0 ) ) as `COFemale`,

					sum( if( `p`.`sex`='Female' and `p`.`age` >35, 1, 0 ) ) as `AFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='New' and `p`.`age` >35, 1, 0 ) ) as `ANFemale`,
					sum( if( `p`.`sex`='Female' and `p`.`status`='Old' and `p`.`age` >35, 1, 0 ) ) as `AOFemale`

					 
					FROM `tbl_targetaudience` a, `tbl_trainingfocus` f, `tbl_mainvaluechain` c,`tbl_training` t
					JOIN `tbl_participants` p 
					ON t.`tbl_trainingId`  = p.`trainingId`
					WHERE a.`tbl_audienceId`=t.`targetAudience`
					AND f.`tbl_focusId`=t.`trainingFocus`
					AND p.`display`='Yes'
					AND c.`tbl_chainId`=t.`mainValueChain` ";

$filterValue = '';
//filter parameters
if(!empty($technicalArea)){ $filterValue.="AND c.`tbl_chainId` LIKE '".$technicalArea."%' ";}
if(!empty($trainingFocus)){ $filterValue.="AND f.`tbl_focusId` LIKE '".$trainingFocus."%' ";}
if(!empty($location)){ $filterValue.="AND t.`trainingVillage` LIKE '".$location."%' ";}
if(!empty($fromDate) && !empty($toDate)){ $filterValue.="AND (t.`trainingDate` BETWEEN '".$fromDate."' AND '".$toDate."') ";}

$query_string.=$filterValue;

$query_string.="GROUP BY t.`tbl_trainingId`
ORDER BY t.`tbl_trainingId` DESC";
    
/* $obj->alert($query_string); */
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
$m=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(5107));

while($rowT=mysql_fetch_array($new_query)){
$color=$n%2==1?"evenrow":"evenrow3";
                                    
$data.="<tr class=".$color.">";
$data.="<td>".$m.".
<input name='loopkey[]' id='loopkey".$m."' type='hidden' value='1'/>
</td>";
$data.="<td align='left'>".$rowT['tAddressed']."</td>";
$data.="<td>".$rowT['tFocus']."</td>";
$data.="<td>".$rowT['tAudience']."</td>";
$data.="<td>".$rowT['trainingDate']."</td>";
$data.="<td>".$rowT['village1']."</td>";

$data.="<td align='right'>".$rowT['pMale']."</td>";
$data.="<td align='right'>".$rowT['pFemale']."</td>";
$data.="<td align='right'>".($rowT['pMale']+$rowT['pFemale'])."</td>";

$data.="<td align='right'>".$rowT['nMale']."</td>";
$data.="<td align='right'>".$rowT['nFemale']."</td>";
$data.="<td align='right'>".($rowT['nMale']+$rowT['nFemale'])."</td>";

$data.="<td align='right'>".$rowT['oMale']."</td>";
$data.="<td align='right'>".$rowT['oFemale']."</td>";
$data.="<td align='right'>".($rowT['oMale']+$rowT['oFemale'])."</td>";

//*********determining the Age groups************************* 
$data.="<td align='right'>".$rowT['CMale']."</td>";
$data.="<td align='right'>".$rowT['CFemale']."</td>";
$data.="<td align='right'>".($rowT['CMale']+$rowT['CFemale'])."</td>";

$data.="<td align='right'>".$rowT['yMale']."</td>";
$data.="<td align='right'>".$rowT['yFemale']."</td>";
$data.="<td align='right'>".($rowT['yMale']+$rowT['yFemale'])."</td>";

$data.="<td align='right'>".$rowT['AMale']."</td>";
$data.="<td align='right'>".$rowT['AFemale']."</td>";
$data.="<td align='right'>".($rowT['AMale']+$rowT['AFemale'])."</td>";
    //$data.="<td align='right'>".."</td>";

$data.="</tr>";
$n++;
$m++;


                                }

                                


//====================end of displayed data===================
  
$data.="</table></form>";

export($format,$data);

}

//view_form5
function view_form5($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');
$n=1; 
$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];
$vaName=$_SESSION['vaName'];
$vaCode=$_SESSION['vaCode'];
$title=strtoupper('Commodity Production and Marketing Activity  VILLAGE AGENT DATA COLLECTION');

$data="<form action=\"".$PHP_SELF."\" name='form5' id='form5' method='post'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
$data.="<tr class='evenrow3' height='31'>
    <th colspan='14'>
      <div align='center'>".$title."</div>
    </th>
  </tr>";
 
 //===================data to be displayed=====================

$data.="
<tr>
       <th  rowspan='2' >#</th>
       <th  rowspan='2' >Name of Village Agent</th>
       <th  rowspan='2' >No. of farmers n the supply chain</th>
       <th  rowspan='2' >No. of groups in the supply chain</th>
       <th  colspan='3' >Volume of produce purchased (Kg)</th>
       <th  colspan='3' >Value of inputs sold (UGX)</th>
       <th  rowspan='2' >Value of own resources invested (UGX)</th>
       <th  rowspan='2' >No. of e-payments made</th>
       <th  rowspan='2' >No. of jobs created</th>
       <th  rowspan='2' >Size of<br/> installed/improved <br/>storage capacity</th>
     </tr>
     <tr>
       <th>Maize</th>
       <th>Beans</th>
       <th>Coffee</th>
       <th>Maize</th>
       <th>Beans</th>
       <th>Coffee</th>
     </tr>";

$query_string="SELECT w . * , x.`vAgentName`
FROM `tbl_form5_villageagent` w, `tbl_villageagents` x
WHERE w.`tbl_villageagentsId` = x.`tbl_villageAgentId` ";
    
//Filter parameters
if($trName<>'' and $trCode<>''){
  $query_string.="
                  AND x.`vAgentName` LIKE '%".$vaName."%'
                  AND x.`vAgentCode` LIKE '%".$vaCode."%' ";
  }elseif($vaName<>'' and $vaCode==''){
  $query_string.="AND x.`vAgentName` LIKE '%".$vaName."%' ";
  }elseif($vaName=='' and $vaCode<>''){
  $query_string.="AND x.`vAgentCode` LIKE '%".$vaCode."%' ";
  }
$query_string.=" ORDER BY w.`tbl_form5_villageagentId` desc";                    
    
  
  //$obj->alert($query_string);
$query_=mysql_query($query_string)or die(http(1731));
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
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(4684));

while($row=mysql_fetch_array($new_query)){
$color=$n%2==1?"evenrow":"evenrow3";

$data.="<tr class='".$color."'>";
$data.="<td>".$x.".</td>";
$data.="<td>".retrieve_info_withSpecialCharactersNowordLimit($row['vAgentName'])."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['SC_AchevementsTotal']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['numGroups_SC']))."</td>";

$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volPurchasedMaize']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volPurchasedBeans']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['volPurchasedCoffee']))."</td>";

$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['inputsMaize']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['inputsBeans']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['inputsCoffee']))."</td>";


$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['valueOwnResources']))."</td>";

$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['EpayMade']))."</td>";
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['jobsTotal']))."</td>";
$storage=(($row['sizeStoreNew'])+($row['sizeStoreImproved']));
$data.="<td align='right'>".number_format(retrieve_info_withSpecialCharactersNowordLimit($storage))."</td>";
        
        $data.="</tr>";
$x++;
$n++;
}

//====================end of displayed data===================
  
$data.="</table></form>";

export($format,$data);

}

function view_SampledForm7($tbl_tradersId,$tbl_villageAgentId,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');

$n=1;
$inc=1;

$data="<form action=\"".$PHP_SELF."\" name='viewfarmer' id='viewfarmer' method='post'>
<table width='100%' cellpadding='1' border='1' cellspacing='1'>"; 
$data.="<tr class='evenrow'>
	<th colspan='16'>
	<center>FARMER DETAILS</center>
	</th>
</tr>";

$data.="<tr class='evenrow'>
	<th>#</th>
	<th>Farmer Code</th>
	<th>Farmer Name</th>
	<th>Trader Name</th>
	<th>Trader Code</th>
	<th>Trader Tel</th>
	<th>VA Name</th>
	<th>VA Code</th>
	<th>VA Tel</th>
	<th>Group Name</th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Village</th>
	<th>Farmer Start Date</th>
	<th>Farmer Tel</th>
</tr>";



						$query_string="select `f`.`tbl_farmersId`,`f`.`farmersName`,`f`.`farmersVillage`,`f`.`farmersTel`,
						`t`.`tbl_tradersId`, `t`.`traderName`, `t`.`traderCode`, `t`.`traderTel`,
						`v`.`vAgentName`,`v`.`vAgentCode`, `v`.`vAgentTel`, `g`.`groupName`,`g`.`groupCode`,
						`d`.`districtName`, `s`.`subcountyName`,
						`f`.`memberDstart`, `f`.`memberStatus`
						from `tbl_farmers` as `f`,
						`tbl_traders` as `t`,
						`tbl_villageagents` as `v`, 
						`tbl_villageagent_groups` as `g`,
						`tbl_district` as `d`,
						`tbl_subcounty` as `s` 
						where `t`.`tbl_tradersId`=`v`.`tbl_tradersId` 
						and `v`.`tbl_villageAgentId` = `f`.`tbl_villageAgentId` ";
						
						
						//Filter parameters
						  if($tbl_tradersId<>'' and $tbl_villageAgentId<>''){
							$query_string.="
							and `t`.`tbl_tradersId` = '".$tbl_tradersId."'
							and `v`.`tbl_villageAgentId` = '".$tbl_villageAgentId."' ";
							}elseif($tbl_tradersId<>'' and $tbl_villageAgentId==''){
							$query_string.="and `t`.`tbl_tradersId` = '".$tbl_tradersId."' ";
							}elseif($tbl_tradersId=='' and $tbl_villageAgentId<>''){
							$query_string.="and `v`.`tbl_villageAgentId` = '".$tbl_villageAgentId."' ";
							}
							
						$query_string.="and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
						and `f`.`farmersDistrict`=d.`districtCode`
						and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` ";
						
						$g=1;
						

                           $query_=mysql_query($query_string)or die(http(121));
                            $max_records = mysql_num_rows($query_);
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $g=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(130));
                            
                            $x=1;
							$farmer_array=array();
                            while($rfarmer=mysql_fetch_array($new_query)){
								$color=$g%2==1?"white1":"evenrow";
								$data.="<tr class='".$color."'>";
								$data.="<td>".$g."</td>";
								$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
								$data.="<td>".$rfarmer['farmersName']."</td>";
								$data.="<td>".$rfarmer['traderName']."</td>";
								$data.="<td>&nbsp;&nbsp;".$rfarmer['traderCode']."</td>";
								$trTel=($rfarmer['traderTel']);
								if(($trTel)=='+256' or ($trTel)==''){$telTr='-';}else{$telTr=$trTel;}
								$data.="<td>&nbsp;&nbsp;".$telTr."</td>";
								$data.="<td>".$rfarmer['vAgentName']."</td>";
								$data.="<td>&nbsp;&nbsp;".$rfarmer['vAgentCode']."</td>";
								$vaTel=($rfarmer['vAgentTel']);
								if(($vaTel)=='+256' or ($vaTel)==''){$telVa='-';}else{$telVa=$vaTel;}
								$data.="<td>&nbsp;&nbsp;".$telVa."</td>";
								$data.="<td>".$rfarmer['groupName']."</td>";
								$data.="<td>&nbsp;&nbsp;".$rfarmer['groupCode']."</td>";
								$data.="<td>".$rfarmer['districtName']."</td>";
								$data.="<td>".$rfarmer['subcountyName']."</td>";
								$data.="<td>".$rfarmer['farmersVillage']."</td>";
								$data.="<td>".$rfarmer['memberDstart']."</td>";
								$farmerTel=($rfarmer['farmersTel']);
								if(($farmerTel)=='+256'){$tel='-';}else{$tel=$farmerTel;}
								$data.="<td>&nbsp;&nbsp;".$tel."</td>";
								$data.="</tr>";
								$g++;
								$inc++;
								}
								$data.="".noRecordsFound($new_query,10)."";
								
								
$data.="</table>";
$data.="</form>";

export($format,$data);
}

function view_farmerList($tbl_villageAgentId,$format){
$qmobj = new QueryManager('');

$n=1;
$inc=1;

$data="<form action=\"".$PHP_SELF."\" name='viewfarmer' id='viewfarmer' method='post'>
<table width='100%' cellpadding='1' border='1' cellspacing='1'>"; 
$data.="<tr class='evenrow'>
	<th  colspan='10'>FARMER DETAILS</th>
</tr>";

$st_vAgent="select v.* from`tbl_villageagents` v where v.`tbl_villageAgentId`='".$tbl_villageAgentId."' ";
$sel=mysql_query($st_vAgent)or die(http(2225));
$row_vAgent=mysql_fetch_assoc($sel);

$data.="<tr class='evenrow'>
	<th colspan='10' align='left'>FARMERS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
	</tr>";



$data.="<tr class='evenrow'>
	<th>#</th>
	<th>Farmer Code</th>
	<th>Farmer Name</th>
	<th>Group Name</th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Start Date</th>
	<th>New/Old</th>
	<th>Farmer Tel</th>
</tr>";
$g=1;
$st_groups="select `f`.`tbl_farmersId`,`f`.`farmersName`, `f`.`farmersTel`,
`v`.`vAgentName`, `g`.`groupName`,`g`.`groupCode`,
`d`.`districtName`, `s`.`subcountyName`,
`f`.`memberDstart`, `f`.`memberStatus`
from `tbl_farmers` as `f`,
`tbl_villageagents` as `v`, 
`tbl_villageagent_groups` as `g`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`
where `f`.`tbl_villageAgentId`='".$row_vAgent['tbl_villageAgentId']."'
and `v`.`tbl_villageAgentId` = `f`.`tbl_villageAgentId`
and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
and `f`.`farmersDistrict`=d.`districtCode`
and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` desc";
    
$q_groups=mysql_query($st_groups)or die(http(1526));
while($rfarmer=mysql_fetch_assoc($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".</td>";
		$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
		$data.="<td>".$rfarmer['farmersName']."</td>";
		$data.="<td>".$rfarmer['groupName']."</td>";
		$data.="<td>".$rfarmer['groupCode']."</td>";
		$data.="<td>".$rfarmer['districtName']."</td>";
		$data.="<td>".$rfarmer['subcountyName']."</td>";
		$data.="<td>".$rfarmer['memberDstart']."</td>";
		$data.="<td>".$rfarmer['memberStatus']."</td>";
		$farmerTel=($rfarmer['farmersTel']);
		if(($farmerTel)=='+256'){$tel='-';}else{$tel=$farmerTel;}
		$data.="<td>".$tel."</td>";
        $data.="</tr>";
        $g++;
        }
$data.="</table></form>";

export($format,$data);

}

//setup_farmers
function view_vAfarmer($tbl_villageAgentId,$format){
$qmobj = new QueryManager('');	
$tbl_villageAgentId=$_SESSION['tbl_villageAgentId'];

$n=1;
$inc=1;
$data="<form action=\"".$PHP_SELF."\" name='viewfarmer' id='viewfarmer' method='post'>
<table width='100%' cellpadding='1' border='1' cellspacing='1'>"; 
$data.="<tr class='evenrow'>
	<th colspan='10'>
	<center>FARMER DETAILS</center>
	</th>
</tr>";

$st_vAgent="select v.* from`tbl_villageagents` v where v.`tbl_villageAgentId`='".$tbl_villageAgentId."' ";
$sel=mysql_query($st_vAgent)or die(http(1479));
$row_vAgent=mysql_fetch_assoc($sel);

$data.="<tr class='evenrow'><th colspan='10'>FARMERS UNDER:&nbsp;&nbsp;".$row_vAgent['vAgentName']."</th>
	
</tr>

<tr class='evenrow'>
	<th>#</th>
	<th>Farmer Code</th>
	<th>Farmer Name</th>
	<th>Group Name</th>
	<th>Group Code</th>
	<th>Farmer District</th>
	<th>Farmer Subcounty</th> 
	<th>Farmer Start Date</th>
	<th>Farmer Status</th>
</tr>";
$g=1;
$st_groups="select `f`.`tbl_farmersId`,`f`.`farmersName`, 
`v`.`vAgentName`, `g`.`groupName`,`g`.`groupCode`,
`d`.`districtName`, `s`.`subcountyName`,
`f`.`memberDstart`, `f`.`memberStatus`
from `tbl_farmers` as `f`,
`tbl_villageagents` as `v`, 
`tbl_villageagent_groups` as `g`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`
where `f`.`tbl_villageAgentId`='".$row_vAgent['tbl_villageAgentId']."'
and `v`.`tbl_villageAgentId` = `f`.`tbl_villageAgentId`
and `f`.`tbl_villageagent_groupsId`=`g`.`tbl_villageagent_groupsId`
and `f`.`farmersDistrict`=d.`districtCode`
and `f`.`farmersSubcounty`=s.`subcountyCode` order by `f`.`tbl_farmersId` desc";
    
$q_groups=mysql_query($st_groups)or die(http(1526));
while($rfarmer=mysql_fetch_assoc($q_groups)){
    
    $color=$g%2==1?"white1":"evenrow";
        $data.="<tr class='".$color."'>";
        $data.="<td>".$g.".</td>";
		$data.="<td>".$rfarmer['tbl_farmersId']."</td>";
		$data.="<td>".$rfarmer['farmersName']."</td>";
		$data.="<td>".$rfarmer['groupName']."</td>";
		$data.="<td>".$rfarmer['groupCode']."</td>";
		$data.="<td>".$rfarmer['districtName']."</td>";
		$data.="<td>".$rfarmer['subcountyName']."</td>";
		$data.="<td>".$rfarmer['memberDstart']."</td>";
		$data.="<td>".$rfarmer['memberStatus']."</td>";
        $data.="</tr>";
        $g++;
        }
$data.="</table></form>";

export($format,$data);

}		

function view_faqs($format){
$qmobj = new QueryManager('');
    $n=1;
    $data .= "<table border='1' class='hoverTable' cellspacing='1' cellpadding='1' width='100%'>";
    $data .= "<tr>
                        <th>#</th>
                        <th>QUESTION</th>
                        <th>RESPONSE</th>
                        <th>DATE ASKED</th>
                        <th>WHO ASKED</th>
                        <th>DATE ANSWERED</th>
                        <th>WHO ANSWERED</th>
                        ";

    switch ($_SESSION['role']) {
        Case "Systems Administrator":
            //execute this
            $data .= "<th ALIGN='RIGHT'>ACTION</b></th>";
            break;
        default:
            $data .= "<th ALIGN='RIGHT'></th>";
            break;
    }
    $data .= "</tr>";

    $inc = 1;
    $n = 1;
    $query = mysql_query("SELECT q.*,u.name AS `asker`
                                        FROM tbl_faqs AS q JOIN tbl_user AS u
                                        ON (u.user_id = q.whoAsked)
                                        WHERE q.Display = 'Yes'
                                        ORDER BY dateAsked DESC") or die(http(__line__));

    while ($row = mysql_fetch_array($query)) {
        $data .= "<tr class='".color."$'>";

        $data .= "<td>" . $n . ".";
        $data .= "</td>";

        $data .= "<td > " . $row['question'] . " </td > ";
        $answer = ($row['answer'] == '') ? "<td align='right'><input name='answer' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $row['answer'] . " </td >";
        $data .= $answer;

        $data .= "<td>" . $row['dateAsked'] . " </td >";
        $data .= "<td > " . $row['asker'] . " </td > ";
        $dateAnswered = ($row['dateAnswered'] == '') ? "<td align='right'><input name='dateAnswered' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $row['dateAnswered'] . " </td >";
        $data .= $dateAnswered;
        //pick who answered
        $stA = "SELECT u.name AS `responder` FROM tbl_faqs AS q JOIN tbl_user AS u ON (u.user_id = q.whoAnswered) WHERE q.whoAnswered='" . $row['whoAnswered'] . "'";
        $queryResponse = Execute($stA) or die(http("FAQ-1571"));
        $rowResponse = FetchRecords($queryResponse);

        switch ($_SESSION['role']) {
            Case "Systems Administrator":
                $answerState = ($row['answer'] == '' && $rowResponse['responder'] == '') ? "<td align='right'><input name='responder' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td><td><input name='' class='redhdrs' type='button' value='Answer' onclick=\"xajax_view_faqs('" . $row['id'] . "')\" /></td>" : "<td class='green_field'> " . $rowResponse['responder'] . " </td ><td><input name='answerState' type='button' value='&#x2714; Answered' disabled='disabled' class='green_field'  /></td>";
                $data .= $answerState;
                break;
            default:

                $responder = ($rowResponse['responder'] == '') ? "<td align='right'><input name='responder' type='button' value='&#63; Unresolved' disabled='disabled' class='redhdrs' /></td>" : "<td class='green_field'> " . $rowResponse['responder'] . " </td >";
                $data .= $responder;
                break;
        }

        $data .= "</tr>";

        $n++;
    }
    $data .= "" . noRecordsFound($query, 8) . "";

    $data .= "</table>";




    export($format,$data);

}

function setup_villageAgent($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');
$n=1; 
$_SESSION['semi_annual']='';
$_SESSION['staffyear']=$year;
$_SESSION['reportingPeriod']=$reportingPeriod;

$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];
$vaName=$_SESSION['vaName'];
$vaCode=$_SESSION['vaCode'];


$data.="<form  name='vAgent' id='vAgent' method='post' action='".$PHP_SELF."'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
 
 $data.="<tr class='evenrow'>
                  <th colspan='10'><div align='center'>VILLAGE AGENT DETAILS</div></th>
                  </tr>";
                   $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th colspan='2'>VA Name</th>
                  <th>VA Code</th>
                  <th>Trader Name</th>
                  <th>Trader Code</th>
				  <th>VA Crops</th>
				  <th>Type Of Agent</th>
				  <th>Size of VA store</th>
                  <th>VA Date of recruitment</th>
				  <th>VA Contact</th>
                  <th>VA Region</th>
                  <th>VA District</th>
                  <th>VA Subcounty</th>
                  <th colspan='2'>VA Village</th>
                  </tr>";


    $query_string="SELECT `v`.`tbl_villageAgentId`,
									`v`.`tbl_tradersId`,
									`v`.`vAgentName`, 
									`v`.`vAgentDob`, 
									`v`.`vAgentCode`, 
									IF(left((`v`.`vAgentTel`),8) = '+2560000', '-', (`v`.`vAgentTel`)) as vAgentTel,
									`v`.`vAgentStoreSize`, 
									`v`.`vAgentSex`,
									`v`.`typeOfAgent`, 
									`v`.`vAgentLocation`,
									`v`.`vAgentDateRecruited`,
									`v`.`vAgentRegion`,
									`v`.`vAgentDistrict`,
									`v`.`vAgentSubcounty`,
									`v`.`vAgentVillage`,
									`v`.`vAgentCropBeans`, 
									`v`.`vAgentCropCoffee`,
									`v`.`vAgentCropMaize`,
									`v`.`display`, 
									 t.`traderName`,
									 t.`traderCode`,
									 z.`zoneName` ,
									 d.`districtName` ,
									 s.`subcountyName`
                                    FROM `tbl_villageagents` v, `tbl_zone` z,
                                     `tbl_district` d, `tbl_subcounty` s, `tbl_traders` t
                                    WHERE v.`vAgentRegion` = z.`zoneCode`
                                     AND v.`tbl_tradersId`=t.`tbl_tradersId` ";
                  
                  //Filter parameters
                  if($vaName<>'' and $vaCode<>''){
                    $query_string.="
                                    AND v.`vAgentName` LIKE '%".$vaName."%'
                                    AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
                    }elseif($vaName<>'' and $vaCode==''){
                    $query_string.="AND v.`vAgentName` LIKE '%".$vaName."%' ";
                    }elseif($vaName=='' and $vaCode<>''){
                    $query_string.="AND v.`vAgentCode` LIKE '%".$vaCode."%' ";
                    }
                  $query_string.="AND d.`districtCode` = s.`districtCode`
                                    AND v.`vAgentDistrict` = d.`districtCode`
                                    AND v.`vAgentSubcounty` = s.`subcountyCode`
                                    AND v.`display` = 'Yes'
                                    ORDER BY v.`tbl_villageAgentId` DESC";
                                    
                                   // $obj->alert($query_string);
                                 
                           $count=1;
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
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            $x=1;
                            while($rowVagent=mysql_fetch_array($new_query)){
                                $color=$count%2==1?"evenrow3":"evenrow";
                            $data.="
                            <tr class='".$color."'>";
                            $data.="<td>".$count.".</td>";
                            $data.="<td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentName']))."</td>
                            <td align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentCode']))."</td>
                            <td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['traderName']))."</td>
                            <td align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['traderCode']))."</td>";
							$b=$rowVagent['vAgentCropBeans'];
							$c=$rowVagent['vAgentCropCoffee'];
							$m=$rowVagent['vAgentCropMaize'];
							$sanB=($b=='Yes')?"Beans,":"";
							$sanC=($c=='Yes')?"Coffee,":"";
							$sanM=($m=='Yes')?"Maize,":"";
							
							$cropString="".$sanB."".$sanC."".$sanM."";
							$vaCrops=substr($cropString, 0, -1);
							$data.="<td align='right'>&nbsp;".$vaCrops."</td>";
							$typeOfAgent=$rowVagent['typeOfAgent'];
							$data.="<td align='left'>";
							if ($typeOfAgent<>null or $typeOfAgent<>''){
							$string = explode(",",$typeOfAgent);
							foreach ($string as $str) {
								$data.="".$str."";
								
							}
							}
							$data.="</td>";
							$data.="<td align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentStoreSize']))."</td>
                            <td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentDateRecruited']))."</td>
							<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentTel']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['zoneName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['districtName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['subcountyName']))."</td>
                            <td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowVagent['vAgentVillage']))."</td>";
                            $data.="</tr>";
                 $count++;
                 $inc++;
                                     }
  
$data.="</table></form>";

//export($format,$data);
$data2="";
export($data2);

}		

function tradersVasFarmerCount($tr_id,$tr_code,$va_region,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1; 


$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];
$trName=$_SESSION['trName'];
$trCode=$_SESSION['trCode'];


$data.="<table class='data-grid' width='100%' border='1' cellspacing='1' cellpadding='1'>
	<thead>";
 
 $data.="<tr class='evenrow'>
			<th colspan='5' align='center'>Trader and VA Farmer Counts</th>
		</tr>";

$query_string="select 
t.`tbl_tradersId`,
t.`traderName`,
t.`traderCode`, 
t.`traderRegion`,
v.`tbl_villageAgentId`, 
v.`tbl_tradersId`,
v.`vAgentName`,
v.`vAgentCode`, 
v.`vAgentRegion`,
v.`display` 
from tbl_traders t 
join tbl_villageagents v 
on (t.`tbl_tradersId`=`v`.`tbl_tradersId`)
where v.`display` ='Yes'
and t.`display` ='Yes' ";
//Filter parameters
$tr_id=(!empty($tr_id))?" AND t.`tbl_tradersId`=".$tr_id." ":"";
$tr_code=(!empty($tr_code))?" AND t.`traderCode` LIKE '%".$tr_code."%' ":"";
$va_region=(!empty($va_region))?" AND `v`.`vAgentRegion` = '".$va_region."' ":"";
$query_string.=$tr_id.$tr_code;

$query_string.=" group by t.`tbl_tradersId`
order by t.`tbl_tradersId`, t.`traderRegion` DESC";

//$obj->alert($query_string);
$count=1; 
$query_=mysql_query($query_string)or die(http(__line__));
/**************
*paging parameters
*
****/
$max_records = mysql_num_rows($query_);
//$records_per_page=5;
$num_pages=ceil($max_records/$records_per_page);
$offset = ($cur_page-1)*$records_per_page;
$count=$offset+1;
$new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
$x=1;
while($rowTrader=mysql_fetch_array($new_query)){
	$data.="<tr>
		<td colspan='5'>TRADER:<strong>".$rowTrader['traderName']."</strong></td>
	</tr>
	
	
	<tr>
		<th class='first-cell-header'>#</th>
		<th class='large-cell-header'>VA NAME</th>
		<th class='small-cell-header'>VA CODE</th>
		<th class='small-cell-header'>VA REGION</th>
		<th class='small-cell-header'>FARMER COUNT</th>
	</tr>
</thead>
<tbody>";
	
	
	/* find the vAs */
	$sql="select v.`tbl_villageAgentId`, v.`vAgentName`, v.`vAgentCode`, v.`vAgentRegion`
	from `tbl_villageagents` as `v`
	where v.`tbl_tradersId`='".$rowTrader['tbl_tradersId']."'
	and `v`.`display`='Yes'
	order by v.`vAgentName` asc";
	$query=Execute($sql)or die(http(__line__));
	$n=1;
		while($row=FetchRecords($query)){
			$vAgentRegion='';
			switch($row['vAgentRegion']){
				case 1:
				$vAgentRegion='Central';
				break;
				
				case 2:
				$vAgentRegion='North';
				break;
				
				case 3:
				$vAgentRegion='East';
				break;
				
				case 4:
				$vAgentRegion='West';
				break;
				
				default:
				$vAgentRegion='-';
				break;
			}

			$data.="<tr>
				<td>".$n.".</td>
				<td>".$row['vAgentName']."</td>
				<td>&nbsp;&nbsp;".$row['vAgentCode']."</td>
				<td>".$vAgentRegion."</td>";
				/* Num farmers per Village Agent */
				$sqlF="select count(f.`tbl_farmersId`) as `numFarmers`
				from `tbl_farmers` as `f`
				where f.`tbl_villageAgentId`='".$row['tbl_villageAgentId']."'
				and f.`tbl_tradersId`='".$rowTrader['tbl_tradersId']."'
				and f.`display`='Yes'";
				$queryF=Execute($sqlF)or die(http(__line__));
				$rowf=FetchRecords($queryF);
				$data.="<td>".number_format($rowf['numFarmers'])."</td>
			</tr>";
			$n++;
		}
	$data.="".noRecordsFound($query,5)."";
	$count++;
	$inc++;
}
$data.="".noRecordsFound($new_query,5)."";

//====================end of displayed data===================
 $data.="</tbody>
</table>";

export($format,$data);

}

//xtraFormAnalysis
function xtraFormAnalysis($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');
$n=1; 


$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];

$partner = $_SESSION['partner'];
$region = $_SESSION['region'];
$reportingPeriod = $_SESSION['reportingPeriod'];
$financialYear = $_SESSION['financialYear'];
$report = $_SESSION['report'];



$data.="<form  name='xtraFormAnalysis' id='xtraFormAnalysis' method='post' action='".$PHP_SELF."'>";
$data.="<table width='100%' id='report' BORDER='1' CELLSPACING='1'>";
 
				  switch($partner){
					 case 1:
					 
					   $data.="<tr class='evenrow3'>
					  <td colspan='15'>";
						$data.="<table border='1' width='100%' cellspacing='1' cellpadding='1'  style='background-color:#EBEBEB;'>
							<tr class='evenrow'>
							  <th colspan='15'><div align='center'>Form3 Exporters Extra Analysis</div></th>
							  </tr>";
                  
                  //===================data to be displayed=====================
						$data.="<tr>";
						$data.="<th>#</th>";
						$data.="<th>Region</th>";
						$data.="<th>Partner</th>";
						$data.="<th>Type of report</th>";
						$data.="<th>Reporting Period</th>";
						$data.="<th colspan='2'>Fields</th>";
						$data.="<th colspan='8'>Monthly Disaggregation</th>";

					  $data.="</tr>";
						$query_string="select x. * , ex.*,  z.`zoneName` from `tbl_exporters` x, `tbl_form3_exporters` as `ex`, `tbl_zone` z 
						where x.`exporterRegion` = z.`zoneCode` and `x`.`tbl_exportersId` = `ex`.`tbl_exporterId` and `ex`.`tbl_exporterId`<>'' and x.display='Yes' ";
						if($region<>'') { $query_string.=" and x.`exporterRegion` LIKE '%".$region."%'"; }
						$query_string.=" group by x.`tbl_exportersId` order by x.`tbl_exportersId` desc";
							
							$count=1; 
                            $query_=mysql_query($query_string)or die(http(164));
                           
                            $max_records = mysql_num_rows($query_);
                            /* $records_per_page=5; */
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            $x=1;
							while($row=mysql_fetch_array($new_query)){
                            $color=$count%2==1?"evenrow":"white1";
                            
							$data.="<tr>";
								$data.="<td colspan='15' bgcolor='#8aa94a'><font size='2' color='white'><strong>".$count.".&#x272A; ".strtoupper($row['exporterName'])."</strong></font></td>";
						    $data.="</tr>";
							
								$form3Exporters="select r.* ,`x`.`tbl_form3_exportersId`,
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
												`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM`, ex.* ";
								$form3Exporters.="from `tbl_form3_exporters` as `x` ";
								$form3Exporters.="join `tbl_exporters` as `ex`  ";
								$form3Exporters.="on (`ex`.`tbl_exportersId` = `x`.`tbl_exporterId`), ";
								$form3Exporters.="`tbl_reports` as r ";
								$form3Exporters.="where x.`tbl_exporterId` = '".$row['tbl_exportersId']."' ";
								$form3Exporters.="and r.`reportCode` = '2'";
								
								
								if($report<>'') { $form3Exporters.=" and r.`reportCode` LIKE '%".$report."%'"; } 
								if($reportingPeriod<>'') { $form3Exporters.=" and x.`reportingPeriod` LIKE  '%".$reportingPeriod."%' "; }
								if($financialYear<>'') { $form3Exporters.=" and x.`year` LIKE '%".$financialYear."%' "; }
								
								$form3Exporters.="order by x.`tbl_exporterId` asc ";
								
							  $query=Execute($form3Exporters)or die(http("Xtraform3Analysis 200"));
							  $n=1;
								while($rowForm3Analysis=FetchRecords($query)){
									$color=($n%2==1)?"bluish":"white1";
									
									$data.="<tr class='".$color."'>";
												$data.="<td rowspan='14'>".$n.". </td>";
												$data.="<td rowspan='14'>".$row['zoneName']."</td>";
												$data.="<td rowspan='14'>Exporter</td>";
												$data.="<td rowspan='14'>".$rowForm3Analysis['reportName']."</td>";
												$reportingPeriod=$rowForm3Analysis['reportingPeriod'];
												$year=$rowForm3Analysis['year'];
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
												$reportingPeriodString="".$firstString." - ".$lastString."";
												$data.="<td rowspan='14' width='150'>".$reportingPeriodString."</td>";
												$data.="<td colspan='2'>&nbsp;</td>";
												switch($reportingPeriod){
													case "Apr - Sep":
													$monthsArray=array('4','5','6','7','8','9');
													break;
													
													case "Oct - Mar":
													$monthsArray=array('10','11','12','1','2','3');
													break;
													
													default:
													$monthsArray=array('13','14','15','16','17','18');
													break;
												}
												
												foreach ($monthsArray as $key) {
													$month= __month__coverter($key); 
													$result = substr($month, 0, 3);	
													$data.="<td ><strong>".$result."</strong></td>";	
												}
												$data.="<td><strong>TOTAL</strong></td>";
												$data.="<td width='200'><strong>GIVEN DETAILS</strong></td>";
											$data.="</tr>";
											
											
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of Traders/DC in the supply chain</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exTSCSixthQM'])."</td>";
												$totTSC=number_format($rowForm3Analysis['exTSCFirstQM']+$rowForm3Analysis['exTSCSecondQM']+$rowForm3Analysis['exTSCThirdQM']+$rowForm3Analysis['exTSCFourthQM']+$rowForm3Analysis['exTSCFifthQM']+$rowForm3Analysis['exTSCSixthQM']);
												$data.="<td align='right'>".$totTSC."</td>";
												$data.="<td>".$rowForm3Analysis['exTradersSupplyChainDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of CBOs/unions/societies in the supply Chain</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['exUSCSixthQM'])."</td>";
												$totUSC=number_format($rowForm3Analysis['exUSCFirstQM']+$rowForm3Analysis['exUSCSecondQM']+$rowForm3Analysis['exUSCThirdQM']+$rowForm3Analysis['exUSCFourthQM']+$rowForm3Analysis['exUSCFifthQM']+$rowForm3Analysis['exUSCSixthQM']);
												$data.="<td align='right'>".$totUSC."</td>";
												$data.="<td>".$rowForm3Analysis['exUnionsSupplyChainDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='3' width='200'><strong>Volume of produce purchased (Kgs)</strong></td>";
												$data.="<td><strong>Maize</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMPSixthQM'])."</td>";
												$totVolMP=number_format($rowForm3Analysis['volMPFirstQM']+$rowForm3Analysis['volMPSecondQM']+$rowForm3Analysis['volMPThirdQM']+$rowForm3Analysis['volMPFourthQM']+$rowForm3Analysis['volMPFifthQM']+$rowForm3Analysis['volMPSixthQM']);
												$data.="<td align='right'>".$totVolMP."</td>";
												$data.="<td rowspan='3'>".$rowForm3Analysis['volMaizePurchasedDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Coffee</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCPSixthQM'])."</td>";
												$totvolCP=number_format($rowForm3Analysis['volCPFirstQM']+$rowForm3Analysis['volCPSecondQM']+$rowForm3Analysis['volCPThirdQM']+$rowForm3Analysis['volCPFourthQM']+$rowForm3Analysis['volCPFifthQM']+$rowForm3Analysis['volCPSixthQM']);
												$data.="<td align='right'>".$totvolCP."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Beans</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBPSixthQM'])."</td>";
												$totvolBP=number_format($rowForm3Analysis['volBPFirstQM']+$rowForm3Analysis['volBPSecondQM']+$rowForm3Analysis['volBPThirdQM']+$rowForm3Analysis['volBPFourthQM']+$rowForm3Analysis['volBPFifthQM']+$rowForm3Analysis['volBPSixthQM']);
												$data.="<td align='right'>".$totvolBP."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Maize Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMESixthQM'])."</td>";
												$totvolME=number_format($rowForm3Analysis['volMEFirstQM']+$rowForm3Analysis['volMESecondQM']+$rowForm3Analysis['volMEThirdQM']+$rowForm3Analysis['volMEFourthQM']+$rowForm3Analysis['volMEFifthQM']+$rowForm3Analysis['volMESixthQM']);
												$data.="<td align='right'>".$totvolME."</td>";
												$data.="<td rowspan='2'>".$rowForm3Analysis['volMaizeExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volMEUgxSixthQM'])."</td>";
												$totvolMEUgx=number_format($rowForm3Analysis['volMEUgxFirstQM']+$rowForm3Analysis['volMEUgxSecondQM']+$rowForm3Analysis['volMEUgxThirdQM']+$rowForm3Analysis['volMEUgxFourthQM']+$rowForm3Analysis['volMEUgxFifthQM']+$rowForm3Analysis['volMEUgxSixthQM']);
												$data.="<td align='right'>".$totvolMEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Coffee Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCESixthQM'])."</td>";
												$totvolCE=number_format($rowForm3Analysis['volCEFirstQM']+$rowForm3Analysis['volCESecondQM']+$rowForm3Analysis['volCEThirdQM']+$rowForm3Analysis['volCEFourthQM']+$rowForm3Analysis['volCEFifthQM']+$rowForm3Analysis['volCESixthQM']);
												$data.="<td align='right'>".$totvolCE."</td>";
												$data.="<td rowspan='2' >".$rowForm3Analysis['volCoffeeExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volCEUgxSixthQM'])."</td>";
												$totvolCEUgx=number_format($rowForm3Analysis['volCEUgxFirstQM']+$rowForm3Analysis['volCEUgxSecondQM']+$rowForm3Analysis['volCEUgxThirdQM']+$rowForm3Analysis['volCEUgxFourthQM']+$rowForm3Analysis['volCEUgxFifthQM']+$rowForm3Analysis['volCEUgxSixthQM']);
												$data.="<td align='right'>".$totvolCEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td rowspan='2' width='200'><strong>Beans Exports: Volumes and Values</strong></td>";
												$data.="<td><strong>Volume (Kg)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBESixthQM'])."</td>";
												$totvolBE=number_format($rowForm3Analysis['volBEFirstQM']+$rowForm3Analysis['volBESecondQM']+$rowForm3Analysis['volBEThirdQM']+$rowForm3Analysis['volBEFourthQM']+$rowForm3Analysis['volBEFifthQM']+$rowForm3Analysis['volBESixthQM']);
												$data.="<td align='right'>".$totvolBE."</td>";
												$data.="<td rowspan='2' >".$rowForm3Analysis['volBeansExDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td><strong>Value (Ugx)</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['volBEUgxSixthQM'])."</td>";
												$totvolBEUgx=number_format($rowForm3Analysis['volBEUgxFirstQM']+$rowForm3Analysis['volBEUgxSecondQM']+$rowForm3Analysis['volBEUgxThirdQM']+$rowForm3Analysis['volBEUgxFourthQM']+$rowForm3Analysis['volBEUgxFifthQM']+$rowForm3Analysis['volBEUgxSixthQM']);
												$data.="<td align='right'>".$totvolBEUgx."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of e-payments received </strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayRSixthQM'])."</td>";
												$totepayR=number_format($rowForm3Analysis['epayRFirstQM']+$rowForm3Analysis['epayRSecondQM']+$rowForm3Analysis['epayRThirdQM']+$rowForm3Analysis['epayRFourthQM']+$rowForm3Analysis['epayRFifthQM']+$rowForm3Analysis['epayRSixthQM']);
												$data.="<td align='right'>".$totepayR."</td>";
												$data.="<td>".$rowForm3Analysis['epayRecievedDetails']."</td>";
											$data.="</tr>";
											$data.="<tr class='".$color."'>";
												$data.="<td colspan='2' width='200'><strong>Number of e-payments made</strong></td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowForm3Analysis['epayMSixthQM'])."</td>";
												$totepayM=number_format($rowForm3Analysis['epayMFirstQM']+$rowForm3Analysis['epayMSecondQM']+$rowForm3Analysis['epayMThirdQM']+$rowForm3Analysis['epayMFourthQM']+$rowForm3Analysis['epayMFifthQM']+$rowForm3Analysis['epayMSixthQM']);
												$data.="<td align='right'>".$totepayM."</td>";
												$data.="<td>".$rowForm3Analysis['epayMadeDetails']."</td>";
											$data.="</tr>";
									
									$n++;
							  }
							  $data.="".noRecordsFound($query,10)."";
							  
							
                            $count++;
                            $inc++;
                                     }

							$data.="".noRecordsFound($new_query,10)."";
                                     
                //====================end of displayed data===================
					 break;
					 
					 case 2:
					 
					  $data.="<tr class='evenrow3'><td colspan='12'>";
						$data.="<table border='1' width='100%' cellspacing='1' cellpadding='1'  style='background-color:#EBEBEB;'>
							<tr class='evenrow'>
							  <th colspan='24'><div align='center'>form4 traders Extra Analysis</div></th>
							  </tr>";
                  
                  //===================data to be displayed=====================
						$data.="<tr>";
						$data.="<th>#</th>";
						$data.="<th>Trader Code</th>";
					    $data.="<th>Trader Crops</th>";
					    $data.="<th>Distance in Kilometers(Km)<br/>from CPM offices</th>";
					    $data.="<th>Size of store</th>";
					    $data.="<th>Trader Model</th>";
					    $data.="<th>Date of recruitment</th>";
						$data.="<th>Region</th>";
						$data.="<th>District</th>";
						$data.="<th>Subcounty</th>";
						$data.="<th>Village</th>";
						$data.="<th>Partner</th>";
						$data.="<th>Type of report</th>";
						$data.="<th>Reporting Period</th>";
						$data.="<th colspan='2'>Fields</th>";
						$data.="<th colspan='8'>Monthly Disaggregation</th>";

					  $data.="</tr>";
						$query_string="select x.*, ex.*, 
						z.`zoneName`,
						d.districtName,
						s.subcountyName
						from `tbl_traders` as x,
						`tbl_form4_traders` as `ex` ,
						`tbl_zone` as z,
						`tbl_district` d,
						`tbl_subcounty` s						
						where x.`traderRegion` = z.`zoneCode` 
						and `x`.`tbl_tradersId` = `ex`.`tbl_traderId` 
						and `ex`.`tbl_traderId`<>'' 
						and d.`districtCode`  = s.`districtCode`
						and x.`traderDistrict`  = d.`districtCode`
						and x.`traderSubcounty`  = s.`subcountyCode`
						and x.display='Yes'";
						
						if($region<>'') { $query_string.=" and x.`traderRegion` LIKE '%".$region."%'"; }
						$query_string.=" group by x.`tbl_tradersId` order by x.`tbl_tradersId` desc";
                                    
                                    
                                   
							$count=1; 
                            $query_=mysql_query($query_string)or die(http(164));
                            /**************
                            *paging parameters
                            *
                            ****/
                            $max_records = mysql_num_rows($query_);
                            /* $records_per_page=5; */
                            $num_pages=ceil($max_records/$records_per_page);
                            $offset = ($cur_page-1)*$records_per_page;
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(112));
                            $x=1;
                            while($row=mysql_fetch_array($new_query)){
                            $color=$count%2==1?"evenrow":"white1";
                            
							$data.="<tr>";
								$data.="<td colspan='24' bgcolor='#8aa94a'><font size='2' color='white'><strong>".$count.".&#x272A; ".strtoupper($row['traderName'])."</strong></font></td>";
						    $data.="</tr>";
							
							
							
							$form4Traders="select r.* ,`x`.`tbl_form4_tradersId`,
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
											`x`.`volMaizePurchasedThirdQuarterMonth` as `volMPThirdQM` ";
								$form4Traders.="from `tbl_form4_traders` as `x` ";
								$form4Traders.="join `tbl_traders` as `ex`  ";
								$form4Traders.="on (`ex`.`tbl_tradersId` = `x`.`tbl_traderId`), ";
								$form4Traders.="`tbl_reports` as r ";
								$form4Traders.="where `x`.`tbl_traderId` = '".$row['tbl_tradersId']."' ";
								$form4Traders.="and r.`reportCode` = '2'";
								
								
								if($report<>'') { $form4Traders.=" and r.`reportCode` LIKE '%".$report."%'"; } 
								if($reportingPeriod<>'') { $form4Traders.=" and x.`reportingPeriod` LIKE  '%".$reportingPeriod."%' "; }
								if($financialYear<>'') { $form4Traders.=" and x.`year` LIKE '%".$financialYear."%' "; }
								
								$form4Traders.="order by `x`.`tbl_traderId` asc ";
								
							  $query=Execute($form4Traders)or die(http("Xtraform4Analysis 387"));
							  $n=1;
							  while($rowform4Analysis=FetchRecords($query)){
									$color=($n%2==1)?"bluish":"white1";
									
									$data.="<tr class='".$color."'>";
												$data.="<td rowspan='14'>".$n.". </td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderCode']))."</td>";
												$b=$row['traderCropBeans'];
												$c=$row['traderCropCoffee'];
												$m=$row['traderCropMaize'];
												$sanB=($b=='Yes')?"Beans,":"";
												$sanC=($c=='Yes')?"Coffee,":"";
												$sanM=($m=='Yes')?"Maize,":"";
												$cropString="".$sanB."".$sanC."".$sanM."";
												$trCrops=substr($cropString, 0, -1);
												$data.="<td rowspan='14' align='right'>&nbsp;".$trCrops."</td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['traderRadius']))."</td>";
												$data.="<td rowspan='14' align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($row['traderStoreSize']))."</td>";
												$data.="<td rowspan='14'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderModel']))."</td>";
												$data.="<td rowspan='14' align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderDateRecruited']))."</td>";
												$data.="<td rowspan='14'>".$row['zoneName']."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['districtName']))."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['subcountyName']))."</td>";
												$data.="<td rowspan='14'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($row['traderVillage']))."</td>";
												$data.="<td rowspan='14'>Trader</td>";
												$data.="<td rowspan='14'>".$rowform4Analysis['reportName']."</td>";
												$reportingPeriod=$rowform4Analysis['reportingPeriod'];
												$year=$rowform4Analysis['year'];
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
												$reportingPeriodString="".$firstString." - ".$lastString."";
												$data.="<td rowspan='14' width='150'>".$reportingPeriodString."</td>";
												$data.="<td colspan='2'>&nbsp;</td>";
												
												switch($reportingPeriod){
													case "Apr - Sep":
													$monthsArray=array('4','5','6','7','8','9');
													break;
													
													case "Oct - Mar":
													$monthsArray=array('10','11','12','1','2','3');
													break;
													
													default:
													$monthsArray=array('13','14','15','16','17','18');
													break;
												}
												
												foreach ($monthsArray as $key) {
													$month= __month__coverter($key); 
													$result = substr($month, 0, 3);	
													$data.="<td ><strong>".$result."</strong></td>";	
												}
												
												
												
												$data.="<td><strong>TOTAL</strong></td>";
												$data.="<td width='200'><strong>GIVEN DETAILS</strong></td>";
											$data.="</tr>";
											
											
											$data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of VAs in the supply chain</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exTSCSixthQM'])."</td>";
												$totTSC=number_format($rowform4Analysis['exTSCFirstQM']+$rowform4Analysis['exTSCSecondQM']+$rowform4Analysis['exTSCThirdQM']+$rowform4Analysis['exTSCFourthQM']+$rowform4Analysis['exTSCFifthQM']+$rowform4Analysis['exTSCSixthQM']);
												$data.="<td align='right'>".$totTSC."</td>";
												$data.="<td>".$rowform4Analysis['vaSupplyChainDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of CBOs/unions/societies in the supply Chain</td>";
												 $data.="<td align='right'>".number_format($rowform4Analysis['exUSCFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['exUSCSixthQM'])."</td>";
												$totUSC=number_format($rowform4Analysis['exUSCFirstQM']+$rowform4Analysis['exUSCSecondQM']+$rowform4Analysis['exUSCThirdQM']+$rowform4Analysis['exUSCFourthQM']+$rowform4Analysis['exUSCFifthQM']+$rowform4Analysis['exUSCSixthQM']);
												$data.="<td align='right'>".$totUSC."</td>";
												$data.="<td>".$rowform4Analysis['numCboDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='3'>Volume of produce purchased (Kgs)</td>";
												$data.="<td>Maize</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMPSixthQM'])."</td>";
												$totVolMP=number_format($rowform4Analysis['volMPFirstQM']+$rowform4Analysis['volMPSecondQM']+$rowform4Analysis['volMPThirdQM']+$rowform4Analysis['volMPFourthQM']+$rowform4Analysis['volMPFifthQM']+$rowform4Analysis['volMPSixthQM']);
												$data.="<td align='right'>".$totVolMP."</td>";
												$data.="<td rowspan='3'>".$rowform4Analysis['volMaizePurchasedDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Coffee</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCPSixthQM'])."</td>";
												$totvolCP=number_format($rowform4Analysis['volCPFirstQM']+$rowform4Analysis['volCPSecondQM']+$rowform4Analysis['volCPThirdQM']+$rowform4Analysis['volCPFourthQM']+$rowform4Analysis['volCPFifthQM']+$rowform4Analysis['volCPSixthQM']);
												$data.="<td align='right'>".$totvolCP."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Beans</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBPSixthQM'])."</td>";
												$totvolBP=number_format($rowform4Analysis['volBPFirstQM']+$rowform4Analysis['volBPSecondQM']+$rowform4Analysis['volBPThirdQM']+$rowform4Analysis['volBPFourthQM']+$rowform4Analysis['volBPFifthQM']+$rowform4Analysis['volBPSixthQM']);
												$data.="<td align='right'>".$totvolBP."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Maize Exports: Volumes and Values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMESixthQM'])."</td>";
												$totvolME=number_format($rowform4Analysis['volMEFirstQM']+$rowform4Analysis['volMESecondQM']+$rowform4Analysis['volMEThirdQM']+$rowform4Analysis['volMEFourthQM']+$rowform4Analysis['volMEFifthQM']+$rowform4Analysis['volMESixthQM']);
												$data.="<td align='right'>".$totvolME."</td>";
												$data.="<td rowspan='2'>".$rowform4Analysis['volMaizeExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value (UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volMEUgxSixthQM'])."</td>";
												$totvolMEUgx=number_format($rowform4Analysis['volMEUgxFirstQM']+$rowform4Analysis['volMEUgxSecondQM']+$rowform4Analysis['volMEUgxThirdQM']+$rowform4Analysis['volMEUgxFourthQM']+$rowform4Analysis['volMEUgxFifthQM']+$rowform4Analysis['volMEUgxSixthQM']);
												$data.="<td align='right'>".$totvolMEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Coffee Exports: Volumes and Values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCESixthQM'])."</td>";
												$totvolCE=number_format($rowform4Analysis['volCEFirstQM']+$rowform4Analysis['volCESecondQM']+$rowform4Analysis['volCEThirdQM']+$rowform4Analysis['volCEFourthQM']+$rowform4Analysis['volCEFifthQM']+$rowform4Analysis['volCESixthQM']);
												$data.="<td align='right'>".$totvolCE."</td>";
												$data.="<td rowspan='2' >".$rowform4Analysis['volCoffeeExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value (UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volCEUgxSixthQM'])."</td>";
												$totvolCEUgx=number_format($rowform4Analysis['volCEUgxFirstQM']+$rowform4Analysis['volCEUgxSecondQM']+$rowform4Analysis['volCEUgxThirdQM']+$rowform4Analysis['volCEUgxFourthQM']+$rowform4Analysis['volCEUgxFifthQM']+$rowform4Analysis['volCEUgxSixthQM']);
												$data.="<td align='right'>".$totvolCEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td rowspan='2'>Bean Exports: volumes and values</td>";
												$data.="<td>Volume (Kg)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBESecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBESixthQM'])."</td>";
												$totvolBE=number_format($rowform4Analysis['volBEFirstQM']+$rowform4Analysis['volBESecondQM']+$rowform4Analysis['volBEThirdQM']+$rowform4Analysis['volBEFourthQM']+$rowform4Analysis['volBEFifthQM']+$rowform4Analysis['volBESixthQM']);
												$data.="<td align='right'>".$totvolBE."</td>";
												$data.="<td rowspan='2' >".$rowform4Analysis['volBeansExDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td>Value(UGX)</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['volBEUgxSixthQM'])."</td>";
												$totvolBEUgx=number_format($rowform4Analysis['volBEUgxFirstQM']+$rowform4Analysis['volBEUgxSecondQM']+$rowform4Analysis['volBEUgxThirdQM']+$rowform4Analysis['volBEUgxFourthQM']+$rowform4Analysis['volBEUgxFifthQM']+$rowform4Analysis['volBEUgxSixthQM']);
												$data.="<td align='right'>".$totvolBEUgx."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of e-payments received </td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayRSixthQM'])."</td>";
												$totepayR=number_format($rowform4Analysis['epayRFirstQM']+$rowform4Analysis['epayRSecondQM']+$rowform4Analysis['epayRThirdQM']+$rowform4Analysis['epayRFourthQM']+$rowform4Analysis['epayRFifthQM']+$rowform4Analysis['epayRSixthQM']);
												$data.="<td align='right'>".$totepayR."</td>";
												$data.="<td>".$rowform4Analysis['epayRecievedDetails']."</td>";
											  $data.="</tr>";
											  $data.="<tr class='".$color."''>";
												$data.="<td colspan='2'>Number of e-payments made</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFirstQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMSecondQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMThirdQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFourthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMFifthQM'])."</td>";
												$data.="<td align='right'>".number_format($rowform4Analysis['epayMSixthQM'])."</td>";
												$totepayM=number_format($rowform4Analysis['epayMFirstQM']+$rowform4Analysis['epayMSecondQM']+$rowform4Analysis['epayMThirdQM']+$rowform4Analysis['epayMFourthQM']+$rowform4Analysis['epayMFifthQM']+$rowform4Analysis['epayMSixthQM']);
												$data.="<td align='right'>".$totepayM."</td>";
												$data.="<td>".$rowform4Analysis['epayMadeDetails']."</td>";
											  $data.="</tr>";
									
									$n++;
							  }

							  $data.="".noRecordsFound($query,10)."";
							  
							
                            $count++;
                            $inc++;
                                     }
                                     $data.="".noRecordsFound($new_query,10)."";
                                     
                //====================end of displayed data===================
					 break;
					 
					 default:
					 
					 break;
					 
					  
				  }
                   
                
  
$data.="</table></form>";

export($format,$data);

}

function setup_trader($reportingPeriod,$year,$format){
$qmobj = new QueryManager('');
$n=1; 


$cur_page=$_SESSION['cur_page'];
$records_per_page=$_SESSION['records_per_page'];
$trName=$_SESSION['trName'];
$trCode=$_SESSION['trCode'];


$data.="<form  name='trader' id='trader' method='post' action='".$PHP_SELF."'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
 
 $data.="<tr class='evenrow'>
                  <th colspan='11'><div align='center'>TRADER DETAILS</div></th>
                  </tr>";
                    $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th colspan='2'>Name</th>
                  <th>Trader Code</th>";
				  /* $data.="<th>Beans</th>";
				  $data.="<th>Maize</th>";
				  $data.="<th>Coffee</th>"; */
				  $data.="<th>Trader Crops</th>";
				  $data.="<th>Distance in Kilometers(Km)<br/>from CPM offices</th>
				  <th>Size of store</th>
				  <th>Trader Model</th>
                  <th>Date of recruitment</th>
				  <th>Trader Contact</th>
                  <th>Region</th>
                  <th>District</th>
                  <th>Subcounty</th>
                  <th colspan='2'>Village</th>
                  </tr>";
                  
                  $query_string="SELECT `t`.`tbl_tradersId`, 
										`t`.`traderName`, 
										`t`.`traderDob`, 
										`t`.`traderCode`, 
										`t`.`traderModel`, 
										`t`.`traderRadius`,
										`t`.`traderStoreSize`,
										IF(left((`t`.`traderTel`),8) = '+2560000', '-', (`t`.`traderTel`)) as traderTel,
										`t`.`traderSex`, 
										`t`.`traderLocation`,
										`t`.`traderDateRecruited`, 
										`t`.`traderRegion`,
										`t`.`traderDistrict`,
										`t`.`traderSubcounty`,
										`t`.`traderVillage`,
										`t`.`traderCropBeans`,
										`t`.`traderCropCoffee`,
										`t`.`traderCropMaize`, 
										`t`.`contactPerson`,
										`t`.`traderType`, 
										`t`.`tradermouExpiryDate`,
										`t`.`valueInputStock`,
										`t`.`traderRecordKeepingSystem`,
										`t`.`traderfinancialServices`,
										`t`.`tradersavingsComponent`,
										`t`.`tradernumFarmers`, 
										`t`.`tradernumYouthGroups`, 
										`t`.`tradervolPurchasedYr1`, 
										`t`.`tradervolPurchasedYr2`,
										`t`.`tradervolPurchasedYr3`,
										`t`.`tradervolPurchasedYr4`, 
										`t`.`tradervolPurchasedYr5`,
										`t`.`tradervolPurchasedYr6`, 
										`t`.`keyDecisionMaker1`,
										`t`.`keyDecisionMaker2`,
										`t`.`keyDecisionMaker3`, 
										`t`.`keyDecisionMaker4`,
										`t`.`traderLoan`,
										`t`.`display`,
										`t`.`enteredBy`, 
										`t`.`timeDataEntry`, 
										`t`.`updatedBy`,
										z.`zoneName` , 
									    d.`districtName` , 
									    s.`subcountyName`
                                    FROM `tbl_traders` t, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s
                                    WHERE t.`traderRegion` = z.`zoneCode`
									and t.display='Yes'";
                                    
                                    //Filter parameters
                  if($trName<>'' and $trCode<>''){
                    $query_string.="
                                    AND t.`traderName` LIKE '%".$trName."%'
                                    AND t.`traderCode` LIKE '%".$trCode."%' ";
                    }elseif($trName<>'' and $trCode==''){
                    $query_string.="AND t.`traderName` LIKE '%".$trName."%' ";
                    }elseif($trName=='' and $trCode<>''){
                    $query_string.="AND t.`traderCode` LIKE '%".$trCode."%' ";
                    }
                                    
                                    
                     $query_string.="AND d.`districtCode` = s.`districtCode`
                                    AND t.`traderDistrict` = d.`districtCode`
                                    AND t.`traderSubcounty` = s.`subcountyCode`
                                    ORDER BY t.`tbl_tradersId` DESC";
                                    
                                    
                                   
                           $count=1; 
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
                            $count=$offset+1;
                            $new_query=mysql_query($query_string." limit ".$offset.",".$records_per_page) or die(http(__line__));
                            $x=1;
                            while($rowTrader=mysql_fetch_array($new_query)){
                            $color=$count%2==1?"evenrow":"white1";
                            $data.="
                            <tr class='".$color."'>
                            <td>".$count.".</td>
                            <td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderName']))."</td>
                            <td align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderCode']))."</td>";
							
							
							$b=$rowTrader['traderCropBeans'];
							$c=$rowTrader['traderCropCoffee'];
							$m=$rowTrader['traderCropMaize'];
							$sanB=($b=='Yes')?"Beans,":"";
							$sanC=($c=='Yes')?"Coffee,":"";
							$sanM=($m=='Yes')?"Maize,":"";
							$cropString="".$sanB."".$sanC."".$sanM."";
							$trCrops=substr($cropString, 0, -1);
							$data.="<td align='right'>&nbsp;".$trCrops."</td>";
							$data.="<td align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderRadius']))."</td>
							<td align='right'>&nbsp;".number_format(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderStoreSize']))."</td>
							<td>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderModel']))."</td>
							<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderDateRecruited']))."</td>
                            <td align='right'>".strtoupper(mysql_real_escape_string($rowTrader['traderTel']))."</td>
							<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['zoneName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['districtName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['subcountyName']))."</td>
                            <td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowTrader['traderVillage']))."</td>";
                            $data.="</tr>";
                            $count++;
                            $inc++;
                                     }
                                     $data.="".noRecordsFound($new_query,10)."";
  
$data.="</table></form>";

export($format,$data);

}

function setup_exporter($exName,$exCode,$cur_page,$records_per_page,$format){
$qmobj = new QueryManager('');
$n=1;
$inc=1;

$_SESSION['exName']=$exName;
$_SESSION['exCode']=$exCode;

$_SESSION['cur_page']=$cur_page;
$_SESSION['records_per_page']=$records_per_page;


$exName=($_SESSION['exName']<>''?$_SESSION['exName']:$exName);
$exCode=($_SESSION['exCode']<>''?$_SESSION['exCode']:$exCode);


$data.="<form  name='exporter' id='exporter' method='post' action='".$PHP_SELF."'>";
$data.="<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
 
 $data.="<tr class='evenrow'>
                  <th colspan='10'><div align='center'>EXPORTER DETAILS</div></th>
                  </tr>";
                $data.="<tr class='evenrow'>
                  <th >#</th>
                  <th colspan='2'>Name</th>
                  <th>Exporter Code</th>
				  <th>Exporter Crop</th>
                  <th>Date of recruitment</th>
				  <th>Exporter Contact</th>
                  <th>Region</th>
                  <th>District</th>
                  <th>Subcounty</th>
                  <th colspan='2'>Village</th>
                  </tr>";
                  $query_string="SELECT x . * , z.`zoneName` , d.`districtName` , s.`subcountyName`
                                    FROM `tbl_exporters` x, `tbl_zone` z, `tbl_district` d, `tbl_subcounty` s
                                    WHERE x.`exporterRegion` = z.`zoneCode`";
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
                            <tr class='".$color."'>
                            <td>".$x.".</td>
                            <td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterName']))."</td>
                            <td align='right'>&nbsp;".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterCode']))."</td>";
							$b=$rowEx['exporterCropBeans'];
							$c=$rowEx['exporterCropCoffee'];
							$m=$rowEx['exporterCropMaize'];
							$sanB=($b=='Yes')?"Beans,":"";
							$sanC=($c=='Yes')?"Coffee,":"";
							$sanM=($m=='Yes')?"Maize,":"";
							
							$cropString="".$sanB."".$sanC."".$sanM."";
							$exCrops=substr($cropString, 0, -1);
							$data.="<td align='right'>&nbsp;".$exCrops."</td>";
							
							$data.="<td align='right'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterDateRecruited']))."</td>
							<td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterTel']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['zoneName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['districtName']))."</td>
                            <td>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['subcountyName']))."</td>
                            <td colspan='2'>".strtoupper(retrieve_info_withSpecialCharactersNowordLimit($rowEx['exporterVillage']))."</td>";
                            $data.="</tr>";
                            $x++;
                            $inc++;
                                     }
  
$data.="</table></form>";

export($format,$data);

}
#----------------------End of asiimwe  Export functions-------------		
function ViewFieldDaysandDemonstrations($format){

$qmobj = new QueryManager('');

$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>";
 
 
 $data.="<tr CLASS='evenrow'>
 
    <th colspan='18' ><center>Field days and demonstrations </center></th>
	
  </tr>
	
	
	<tr>
	<th colspan='2' ROWSPAN='3'>No/Select</th>
	<th ROWSPAN='3' colspan='2'>DISTRICT</th>
	<th  colspan='9'><center>Field days conducted<center></th>
	<th colspan='3' rowspan='2'><center>demonstrations</center></th>
	
		</tr>
		
		<tr>
		<th  colspan='3'>District (Major) Field days</th>
		<th  colspan='3'>DC (Regular) Field days</th>
		<th  colspan='3'>PO (Specific) Field days</th>

	
		</tr>
	
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
	<th>Female</th>
	<th>No. of F/days</th>
	<th>Male</th>
		<th>Female</th>
		<th>No. of Demos</th>
		</tr>";  
	
	
	$sql=QueryManager::ViewFieldDaysandDemonstrations($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=Execute($sql)or die(http("PR-866"));
  while($row=FetchRecords($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	".loop_key('training_id',$row['training_id'])."
  <td>".$n."</td>
   
    <td colspan='2'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='fielddayIndicator[]' type='hidden' id='fielddayIndicator' value='".$row['fielddayIndicator']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
 <td align='right'>".$row['MaleDMajor']."</td>
    <td align='right'>".$row['FemaleDMajor']."</td>
	<td align='right'>".$row['numberofDMFieldDays']."</td>
	   <td align='right'>".$row['MaleDRegular']."</td>
	      <td align='right'>".$row['FemaleDRegular']."</td>
		   <td align='right'>".$row['numberofDRFieldDays']."</td>
    <td align='right'>".$row['MalePOSpecific']."</td>
 <td align='right'>".$row['FemalePOSpecific']."</td>
 <td align='right'>".$row['numberofPOFieldDays']."</td>
  <td align='right'>".$row['MaleDemo']."</td>
  <td align='right'>".$row['FemaleDemo']."</td>
  <td align='right'>".$row['numberofDemonstrationsEstablished']."</td>
    </tr>";
    $n++;
  }
  //-------Gerrating Totals
  
  
  	$sqlTotal=QueryManager::ViewFieldDaysandDemonstrationsTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],
	$_SESSION['fyear'],$_SESSION['semiAnnual']);
	
	//$obj->alert($sqlTotal);
  
	$queryTotal=Execute($sqlTotal) or die(http("PR-934"));
		$rowTotal=FetchRecords($queryTotal);
   $data.="<tr class='$color'>
	
    <td colspan='4'>
	<strong>Total</strong></td>
 <td align='right'><strong>".$rowTotal['MaleDMajor']."</strong></td>
    <td align='right'><strong>".$rowTotal['FemaleDMajor']."</strong></td>
	<td align='right'>".$rowTotal['numberofDMFieldDays']."</td>
	   <td align='right'><strong>".$rowTotal['MaleDRegular']."</strong></td>
	      <td align='right'><strong>".$rowTotal['FemaleDRegular']."</strong></td>
		  <td align='right'>".$rowTotal['numberofDRFieldDays']."</td>
    <td align='right'><strong>".$rowTotal['MalePOSpecific']."</strong></td>
 <td align='right'><strong>".$rowTotal['FemalePOSpecific']."</strong></td>
 <td align='right'>".$rowTotal['numberofPOFieldDays']."</td>
  <td align='right'><strong>".$rowTotal['MaleDemo']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleDemo']."</strong></td>
  <td align='right'>".$rowTotal['numberofDemonstrationsEstablished']."</td>
    </tr>";

export($format,$data);
}
		
function ViewAdoptionRates($format){

$qmobj = new QueryManager('');

$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>";

	 
$data.="
 <tr CLASS='evenrow'>
 
    <th colspan='21' ><center>CF/CA Adoption Rates (M=Male,F=Female,CF=Conservation Farming,CA=Conservation Agriculture)</center> </th>
	
  </tr>
	
	
	<tr><th colspan='1' ROWSPAN='3'>No</th>
	
	<th ROWSPAN='3' colspan='2'>DISTRICT</th>
	<th colspan='6'><center>No. of farmers adopting</center></th>
	<th colspan='6'><center>Area under adoption</center></th>
	<th colspan='2' ROWSPAN='2'><center>Area under legumes</center></th>
	<th colspan='2' ROWSPAN='2' ><center>Herbicide use</center></th>
	<th colspan='2' ROWSPAN='2' ><center>Not burning residue</center></th>
	
		</tr>
		
		
		<tr>
	

	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
		</tr>
	<tr>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	<th>M</th>
	<th>F</th>
	
	
	</tr>";  
	
	$querytrainees=mysql_query("select * from tbl_trainees order by code asc")or die(http("PR-432"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
    $data.="<tr class='evenrow'>

  <td colspan='21'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewAdoptionRates($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
  <td>".$n."</td>
   
    <td colspan='2'>
	<input name='loopkey[]' type='hidden' id='loopkey' value='1'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
    <td align='right'>".$row['MaleHoebasin']."</td>
    <td align='right'>".$row['FemaleHoebasin']."</td>
     <td align='right'>".$row['MaleADPRipping']."</td>
     <td align='right'>".$row['FemaleADPRipping']."</td>
 <td align='right'>".$row['MaleMechanizedRipping']."</td>
  <td align='right'>".$row['FemaleMechanizedRipping']."</td>
  <td align='right'>".$row['MaleAreaHoebasin']."</td>
  <td align='right'>".$row['FemaleAreaHoebasin']."</td>
    <td align='right'>".$row['MaleAreaADPRipping']."</td>
  <td align='right'>".$row['FemaleAreaADPRipping']."</td>
   <td align='right'>".$row['MaleAreaMechanizedRipping']."</td>
   <td align='right'>".$row['FemaleAreaMechanizedRipping']."</td>
   <td align='right'>".$row['MaleLegumes']."</td>
  <td align='right'>".$row['FemaleLegumes']."</td>
   <td align='right'>".$row['MaleHerbicide']."</td>
  <td align='right'>".$row['FemaleHerbicide']."</td>
  <td align='right'>".$row['MaleResidues']."</td>
  <td align='right'>".$row['FemaleResidues']."</td>
 
  </tr>";
    $n++;
  }
  
  
	$sqlTotal=QueryManager::ViewAdoptionRatesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
		$queryTotal=Execute($sqlTotal) or die(http("PR-1025"));
		$rowTotal=FetchRecords($queryTotal);
	$data.="<tr class='$color'>
	
  <td colspan=3><strong>Total ".$rowparticipants['Name']."</strong></td>
   <td align='right'><strong>".$rowTotal['MaleHoebasinTotal']."</strong></td>
    <td align='right'><strong>".$rowTotal['FemaleHoebasinTotal']."</strong></td>
     <td align='right'><strong>".$rowTotal['MaleADPRippingTotal']."</strong></td>
     <td align='right'><strong>".$rowTotal['FemaleADPRippingTotal']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleMechanizedRippingTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleMechanizedRippingTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleAreaHoebasinTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleAreaHoebasinTotal']."</strong></td>
    <td align='right'><strong>".$rowTotal['MaleAreaADPRippingTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleAreaADPRippingTotal']."</strong></td>
   <td align='right'><strong>".$rowTotal['MaleAreaMechanizedRippingTotal']."</strong></td>
   <td align='right'><strong>".$rowTotal['FemaleAreaMechanizedRippingTotal']."</strong></td>
   <td align='right'><strong>".$rowTotal['MaleLegumesTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleLegumesTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleHerbicideTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleHerbicideTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleResiduesTotal']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleResiduesTotal']."</strong></td>
  
  </tr>";
 
  
  
  
  
  
  
  		}
		

 $data.="".noRecordsFound($query,21)."";
$data.="</table></form>";
export($format,$data);
}
		
function ViewCumulativePerfomanceReport($format){
		$qmobj = new QueryManager('');
//$obj= new pagination();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']='';
//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'     width='100%' >




            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Cumulative Performance (Achievements) against Project Life Targets</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='3' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Project Life Targets</center></th>
				<th colspan='3' class='dataRow' ><center>achievements todate</center></th>
				<th colspan='3' class='dataRow' ><center>Percentage(%) Achievement</center></th>
			</tr>
			
			
			
			
			<tr>
			
             
			
             <th class='dataRow'>Indicator type</th>
			 <th  class='dataRow'>unit of measure</th>
			 <th class='dataRow'>Disaggregation</th>
				
				  <th class='dataRow'>Male</th>
				  <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
					  <th  class='dataRow'>Male</th>
				  <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
					  <th class='dataRow'>Male</th>
					    <th class='dataRow'>Female</th>
					  <th class='dataRow'>Other</th>
				  
            		
           			</tr>";
$inc=1;



 
 $logicaloutput=@mysql_query("select * from tbl_output order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";




$x=QueryManager::ViewCumulativeLOPTargets($rowoutput['output_id']);
//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
//checkExistance($row['Target'],NULL,'ExistsInteger')
//$obj->alert($row['Target']);
$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left>
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 <INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>";
			
			
			
			$y=QueryManager::view_CumulativeResultsTodate($row['indicator_id']);
			$queryActual=@Execute($y)or die(http("PR-358"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						
									<td align=right ><strong>".checkExistance($row['maleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($row['femaleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($row['otherTarget'],NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance($rowActual['maleActual'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['femaleActual'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['otherActual'],NULL,'ExistsInteger')."</strong></td>
									";
									
									$xTOT=QueryManager::calc_Percentage($row['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="
									";
									
									$xTOTfem=QueryManager::calc_Percentage($row['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
									$data.="
									";
									$xTOTother=QueryManager::calc_Percentage($row['maleTarget'],$rowActual['maleActual']);
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother;
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="</table></form>";
export($format,$data);
}
		
function ViewAnnualPerfomanceReport($year,$semiAnnual,$format){
/* //$obj= new xajaxResponse();
$_SESSION['zoneID']='';
$_SESSION['districtID']='';
$_SESSION['indicator_Type']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
$_SESSION['fyear']='';
$_SESSION['semiAnnual']='';
$_SESSION['indicatorCode']='';
$_SESSION['indicator']=''; */
//----------------------------------------

$qmobj = new QueryManager('');
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report' border='1'    width='100%' >




            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Annual Performance Report for the period  ".$_SESSION['fyear']."</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='4' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Male</center></th>
				<th colspan='3' class='dataRow' ><center>Female</center></th>
				<th colspan='3' class='dataRow' ><center>Other</center></th>
			</tr>
			
			
			
			<tr>
			
             
			
             <th class='dataRow'>Indicator type</th>
			 <th  class='dataRow'>unit of measure</th>
			 <th class='dataRow'>Disaggregation</th>
				  <th  class='dataRow'>Baseline</th>
				  <th class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th class='dataRow'>% Achieved</th>
				    <th class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th class='dataRow'>% Achieved</th>
				     <th class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th class='dataRow'>% Achieved</th>
            		
           			</tr>";
$inc=1;



/*  $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
 where subprog_id='".$rowoutcome['subcomponent_id']."' */
 
 $logicaloutput=@mysql_query("select * from tbl_output order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";



$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
			

	
				$_SESSION['queryExport']=$x;
				$query=@mysql_query($x)or die(http("WRKPlan-202"));
		  
		  		if(@mysql_num_rows($query)>0)
				  while($row=@mysql_fetch_array($query)){
				  $baseline=$row['baseline'];
				  $base=$baseline>0?$baseline:"-";
				  $color=$inc%2==1?"evenrow3":"white1";
				  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
					//checkExistance($row['Target'],NULL,'ExistsInteger')
					//$obj->alert($row['Target']);
						$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
		 				 $l="align=right";
			$data.="<tr class=$color ".$events2.">
				 <td align=left>
				 <INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$row['workplan_id']."' >
				 <INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
				".$inc."</td>
            	<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
				<td colspan='3' width=''>".$row['indicator_name']."</td>";
					$xT=QueryManager::ViewAnnualReportTargets($_SESSION['fyear'],$row['indicator_id']);
					//$obj->alert($xT);
					$queryTarget=@Execute($xT)or die(http("PR-597"));
					$rowTarget=@FetchRecords($queryTarget);			
			
						
			
			$y=QueryManager::view_AnnualResultsHOActuals($_SESSION['fyear'],$row['indicator_id']);
			$queryActual=@Execute($y)or die(http("PR-358"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td align=right ><strong>".$base."</strong></td>
									<td align=right ><strong>".checkExistance($rowTarget['maleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['maleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOT=QueryManager::calc_Percentage($rowTarget['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['femaleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['femaleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOTfem=QueryManager::calc_Percentage($rowTarget['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
							
							$data.="<td align=right ><strong>".checkExistance($rowTarget['otherTarget'],NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance($rowActual['otherActual'],NULL,'ExistsInteger')."</strong></td>";
									
						$xT0Tother=QueryManager::calc_Percentage($rowTarget['otherTarget'],$rowActual['otherActual']);
									
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother; 
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.=noRecordsFound($query,10);
		  $data.="</table></form>";
export($format,$data);
}
		
function ViewSemiAnnualPerfomanceReport($fyear,$semiAnnual,$format){

				/* $_SESSION['zoneID']='';
				$_SESSION['districtID']='';
				$_SESSION['indicator_Type']='';
				$_SESSION['subcomponent_id']='';
				$_SESSION['output']='';
				$_SESSION['fyear']='';
				$_SESSION['semiAnnual']='';
				$_SESSION['indicatorCode']='';
				$_SESSION['indicator']='';*/
				//--------------------------------------------------------------------
				$_SESSION['zoneID']=$zone;
				$_SESSION['districtID']=$district;
				$_SESSION['indicator_Type']=$indicator_type;
				$_SESSION['subcomponent_id']=$subcomponent;
				$_SESSION['output_id']=$output;
				$_SESSION['fyear']=($fyear=='')?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$fyear;
				$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
				$_SESSION['indicatorCode']=$indicatorCode;
				$_SESSION['indicator']=$indicator;  
				//------------------------------------------------------------------------



//$obj->alert($_SESSION['fyear']);

#$_SESSION['fyear']=$year;


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report' border='1'    width='100%' >




            <tr>
              <th class='dataRow' colspan=2>&nbsp;</th>
           <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th width='145' colspan='' class='dataRow' >&nbsp;</th>
              <th colspan='14' class='dataRow' ><center>Semi Annual Report for the period ".$_SESSION['semiAnnual']."  ".$_SESSION['fyear']."</center></th>
															</tr>
            
			
			<tr>
			<th rowspan='2' class='dataRow' >NO/select</th>
			 <th rowspan=2 colspan='4' width='' class='dataRow'>Indicator</th>
			 	<th colspan='4' class='dataRow' ></th>
				<th colspan='3' class='dataRow' ><center>Male</center></th>
				<th colspan='3' class='dataRow' ><center>Female</center></th>
				<th colspan='3' class='dataRow' ><center>Other</center></th>
			</tr>
			
			
			
			<tr>
			
             
			
             <th  class='dataRow'>Indicator type</th>
			 <th  class='dataRow'>unit of measure</th>
			 <th class='dataRow'>Disaggregation</th>
				  <th  class='dataRow'>Baseline</th>
				  <th  class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th  class='dataRow'>% Achieved</th>
				    <th  class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th  class='dataRow'>% Achieved</th>
				     <th  class='dataRow'>Target</th>
				   <th  class='dataRow'>Actual</th>
				      <th class='dataRow'>% Achieved</th>
            		
           			</tr>";
$inc=1;



/*  $logicaloutcome=@mysql_query("select * from tbl_subcomponent order by subcomponent_code asc")or die(http("PR-063"));

while($rowoutcome=@mysql_fetch_array($logicaloutcome)){
$data.="<tr><td><strong>".$rowoutcome['subcomponent_code']."</strong></td><td colspan='13'><strong>".$rowoutcome['subcomponent']."</strong></td></tr>";
 where subprog_id='".$rowoutcome['subcomponent_id']."' */
 
 $logicaloutput=@mysql_query("select * from tbl_output order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";



	$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
			

	
				$_SESSION['queryExport']=$x;
				$query=@Execute($x)or die(http("WRKPlan-202"));
		  
		  		if(@mysql_num_rows($query)>0)
				  while($row=@FetchRecords($query)){
				  $baseline=$row['baseline'];
				  $base=$baseline>0?$baseline:"-";
				  $color=$inc%2==1?"evenrow3":"white1";
				  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
					//checkExistance($row['Target'],NULL,'ExistsInteger')
					//$obj->alert($row['Target']);
						//$total=($row['maleAprSep']+$row['femaleAprSep']+$row['otherAprSep']+$row['maleOctMar']+$row['femaleOctMar']+$row['otherOctMar']);
						
						$xT=QueryManager::ViewSemiAnnualReportTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
						//$obj->alert($xT);
						$queryTarget=@Execute($xT)or die(http("PR-422"));
						$rowTarget=@FetchRecords($queryTarget);
		 				 $l="align=right";
				$data.="<tr class=$color ".$events2.">
				 <td align=left>
				 <INPUT type='hidden' name='workplan_id[]' id='workplan_id' value='".$row['workplan_id']."' >
				 <INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
				".$inc."</td>
            	<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
				<td colspan='3' width=''>".$row['indicator_name']."</td>";
					
			//$obj->alert($x);
				
						
			
			$y=QueryManager::view_SemiAnnualResultsHOActuals($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
			$queryActual=@Execute($y)or die(http("PR-358"));
			$rowActual=@FetchRecords($queryActual);
	
			$data.="<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td align=right ><strong>".$base."</strong></td>
									<td align=right ><strong>".checkExistance($rowTarget['maleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['maleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOT=QueryManager::calc_Percentage($rowTarget['maleTarget'],$rowActual['maleActual']);
 				$percentage=QueryManager::ColorCoding($xTOT,1);
				$data.=$percentage;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['femaleTarget'],NULL,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowActual['femaleActual'],NULL,'ExistsInteger')."</strong></td>";
									
									$xTOTfem=QueryManager::calc_Percentage($rowTarget['femaleTarget'],$rowActual['femaleActual']);
 				$percentagefem=QueryManager::ColorCoding($xTOTfem,1);
				$data.=$percentagefem;
									$data.="<td align=right ><strong>".checkExistance($rowTarget['otherTarget'],NULL,'ExistsInteger')."</strong></td>	
									<td align=right ><strong>".checkExistance($rowActual['otherActual'],NULL,'ExistsInteger')."</strong></td>";
									$xTOTother=QueryManager::calc_Percentage($rowTarget['otherTarget'],$rowActual['otherActual']);
 				$percentageother=QueryManager::ColorCoding($xTOTother,1);
				$data.=$percentageother;
				
        $data.="</tr>";
$inc++;
		  }
		  
		  }
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="</table></form>";
export($format,$data);
}

function ViewOtherTrainingActivities($format){

$n=1; $inc=1;
$_SESSION['zoneID']='';
$_SESSION['semiAnnual']='';
$_SESSION['zoneID']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year;

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report' border='1'>";
 
  	 
$data.="
 <tr CLASS='evenrow'>
 
    <th colspan='21' ><center>Other Famer Training and Tree Seedling Distribution conducted in each district</center></th>
	
  </tr>
	

	
	
	<tr><th colspan='2' ROWSPAN='2'>No/Select</th>
	
	<th ROWSPAN='2' colspan='2'>DISTRICT</th>
	<th colspan='2'><center>Training in IPM</center></th>
	<th colspan='2'><center>Training in Post Harvest Handling </center></th>
	<th colspan='2'><center>Training in Bulk Marketing</center></th>
	<th colspan='2'><center>Seedling beneficiaries</center>
	</th>
	<th colspan='2' rowspan='2'><center>No. of seedlings given out</center></th>
	<th colspan='3'><center>Inputs procured Kg/Litres</center></th>
	<th colspan='4'><center>Kg of produce bulked</center></th>
		</tr>
	<tr>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	

	<th>Seed</th>
	<th>Fertilizer</th>
	<th>Herbicide</th>
	<th>Maize</th>
	<th>Beans</th>
	<th>Sunflower</th>
	<th>SoyaBean</th>
	</tr>";  
	
	
	  
	$sql=QueryManager::ViewOtherTrainingActivities($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['fyear'],$_SESSION['semiAnnual']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	
  <td>".$n."</td>
   
    <td colspan='3'>
	<input name='districtCode[]' type='hidden' id='districtCode' value='".$row['district']."'>
	<input name='region[]' type='hidden' id='region' value='".$row['zone']."'>
	<input name='participants[]' type='hidden' id='participants' value='".$row['typeofparticipants']."'>
		<input name='org_code[]' type='hidden' id='org_code' value='".$row['org_code']."'>
		<input name='semiAnnual[]' type='hidden' id='semiAnnual' value='".$row['semi_annual']."'>
		<input name='year[]' type='hidden' id='year' value='".$row['year']."'>
	".$row['districtName']."</td>
    <td>".$row['MaleTraininginIPM']."</td>
    <td align='right'>".$row['FemaleTraininginIPM']."</td>
     <td align='right'>".$row['MalePostHarvest']."</td>
     <td align='right'>".$row['FemalePostHarvest']."</td>
 <td align='right'>".$row['MaleBulkMrktng']."</td>
  <td align='right'>".$row['FemaleBulkMrktng']."</td>
  <td align='right'>".$row['MaleSeedBen']."</td>
  <td align='right'>".$row['FemaleSeedBen']."</td>
   <td align='right' colspan='2'>".$row['seedlingsgivenout']."</td>
   <td align='right'>".$row['SeedInputProcured']."</td>
 <td align='right'>".$row['FertilizerInputProcured']."</td>
 <td align='right'>".$row['HerbicideInputProcured']."</td>
 
   <td align='right'>".$row['maizeproducebulked']."</td>
   <td align='right'>".$row['beansproducebulked']."</td>
 <td align='right'>".$row['sunflowerproducebulked']."</td>
 <td align='right'>".$row['soyaproducebulked']."</td>
  </tr>";
    $n++;
  }


$sqlTotal=QueryManager::ViewOtherTrainingActivitiesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['fyear'],$_SESSION['semiAnnual']); 
		$queryTotal=Execute($sqlTotal) or die(http("PR-597"));
		$rowTotal=FetchRecords($queryTotal);

 $data.="<tr class='$color'>

  <td colspan='4'><strong>Total</strong></td>
    <td align='right'><strong>".$rowTotal['MaleTraininginIPM']."</strong></td>
    <td align='right'><strong>".$rowTotal['FemaleTraininginIPM']."</strong></td>
     <td align='right'><strong>".$rowTotal['MalePostHarvest']."</strong></td>
     <td align='right'><strong>".$rowTotal['FemalePostHarvest']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleBulkMrktng']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleBulkMrktng']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleSeedBen']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleSeedBen']."</strong></td>
   <td align='right' colspan='2'><strong>".$rowTotal['seedlingsgivenout']."</strong></td>
   <td align='right'><strong>".$rowTotal['SeedInputProcured']."</strong></td>
 <td align='right'><strong>".$rowTotal['FertilizerInputProcured']."</strong></td>
 <td align='right'><strong>".$rowTotal['HerbicideInputProcured']."</strong></td>
 
   <td align='right'><strong>".$rowTotal['maizeproducebulked']."</strong></td>
   <td align='right'><strong>".$rowTotal['beansproducebulked']."</strong></td>
 <td align='right'><strong>".$rowTotal['sunflowerproducebulked']."</strong></td>
 <td align='right'><strong>".$rowTotal['soyaproducebulked']."</strong></td>
  </tr>";




 $data.="".noRecordsFound($query,14)."";
$data.="</table></form>";
export($format,$data);
}

function ViewCFTechnicalTrainingActivities($format){


$n=1; $inc=1;
/* $_SESSION['region']='';
$_SESSION['semiAnnual']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['organization']=$organization;
$_SESSION['districtID']=$district;
$quarter=($quarter==NULL)?$_SESSION['quarter']:$quarter;
$_SESSION['semiAnnual']=$quarter;
$year=($year==NULL)?currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['fyear']=$year; */

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>";
 $data.="<tr CLASS='evenrow'>
 
    <th colspan='13' ><center>TECHNICAL TRAINING ACTIVITIES</center></th>
	
  </tr>
	
	
	<tr><th ROWSPAN='2'>NO</th>
	
	<th ROWSPAN='2' colspan='2'>DISTRICT</th>
	<th colspan='2'><center>CF HOE</center></th>
	<th colspan='2'><center>CF ADP</center></th>
	<th colspan='2'><center>CF Mechanized</center></th>
	<th colspan='2'><center>CF Herbicise Safety and Use</center>
	</th>
	<th colspan='2'><center>Tree Planting</center></th>
		</tr>
	<tr>
	
	
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	<th>Male</th>
	<th>Female</th>
	</tr>";  
	
	$querytrainees=mysql_query("select * from tbl_trainees order by Name asc")or die(http("PR-432"));
  while($rowparticipants=mysql_fetch_array($querytrainees)){
  
    $data.="<tr class='evenrow'>

  <td colspan='13'><strong>".$rowparticipants['Name']."</strong></td></tr>";
	  
	$sql=QueryManager::ViewCFTechnicalTrainingActivities($_SESSION['region'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']);   
	   //$obj->alert($sql);
	   
	 $query=mysql_query($sql)or die(http("PR-432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	
  <td>".$n."</td>
   
    <td colspan='2'>".$row['districtName']."</td>
    <td>".$row['MaleHoebasin']."</td>
    <td align='right'>".$row['FemaleHoebasin']."</td>
     <td align='right'>".$row['MaleADPRipping']."</td>
     <td align='right'>".$row['FemaleADPRipping']."</td>
 <td align='right'>".$row['MaleMechanizedRipping']."</td>
  <td align='right'>".$row['FemaleMechanizedRipping']."</td>
  <td align='right'>".$row['MaleHerbicide']."</td>
  <td align='right'>".$row['FemaleHerbicide']."</td>
   <td align='right'>".$row['MaleTreePlanting']."</td>
   <td align='right'>".$row['FemaleTreePlanting']."</td>
 
  </tr>";
    $n++;
  }
  
  
  
  $sqlTotal=QueryManager::ViewCFTechnicalTrainingActivitiesTotals($_SESSION['zoneID'],$_SESSION['districtID'],$_SESSION['organization'],$_SESSION['fyear'],$_SESSION['semiAnnual'],$rowparticipants['code']); 
  
  $queryTotal=Execute($sqlTotal) or die(http("PR-446"));
		$rowTotal=FetchRecords($queryTotal);
  
   $data.="<tr class='$color'>
    <td colspan='3'><strong>Total ".$rowparticipants['Name']."</strong></td>
    <td><strong>".$rowTotal['MaleHoebasin']."</strong></td>
    <td align='right'><strong>".$rowTotal['FemaleHoebasin']."</strong></td>
     <td align='right'><strong>".$rowTotal['MaleADPRipping']."</strong></td>
     <td align='right'><strong>".$rowTotal['FemaleADPRipping']."</strong></td>
 <td align='right'><strong>".$rowTotal['MaleMechanizedRipping']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleMechanizedRipping']."</strong></td>
  <td align='right'><strong>".$rowTotal['MaleHerbicide']."</strong></td>
  <td align='right'><strong>".$rowTotal['FemaleHerbicide']."</strong></td>
   <td align='right'><strong>".$rowTotal['MaleTreePlanting']."</strong></td>
   <td align='right'><strong>".$rowTotal['FemaleTreePlanting']."</strong></td>
 
  </tr>";
  
  
  
  
  		}


 $data.="".noRecordsFound($query,14);
$data.="</table></form>";
export($format,$data);
}
 
function view_ParticipantsperTrainingArea($organization,$quarter,$year,$format){


$n=1; $inc=1;
$_SESSION['region']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['staffyear']=$year;
$_SESSION['staffQuarter']=$quarter;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report'>";
 
  $data.="
  
  <tr class=''>
          <td colspan=8>
          <div id='status'></div>
         </td>
        </tr>

<tr>
<th colspan='17'><center>TRaining Area</center></th>
  </tr>
  <tr>
    <th colspan='' rowspan='2'>NO</th>
    <th colspan='' rowspan='2'>District</th>
    <th colspan='2'>Hoe Basin</th>
    <th colspan='2'>ADP Ripping</th>
    <th colspan='2'>Mechanized Ripping</th>
    <th colspan='2'>Herbicide Safety and  use</th>
     <th colspan='2'>Tree Planting</th>
    <th colspan='2'>Others</th>
     <th rowspan='2'>% of Females</th>
  </tr>
  <tr>
    <th>Male</th>
    <th>Female</th>
        <th>Male</th>
    <th>Female</th>
        <th>Male</th>
    <th>Female</th>
        <th>Male</th>
    <th>Female</th>
        <th>Male</th>
    <th>Female</th>
        <th>Male</th>
    <th>Female</th>
     </tr>";
 
		
				 $sql="
SELECT t.`training_id` , t.`org_code` , t.`semi_annual` , t.`year` , t.`district` , d.districtName, t.`subcounty` , t.`task` , t.village, t.`training_topic` , c.topic, t.`trainer` , t.`typeofparticipants` , t.`name_oftrainee` , t.`gender` , t.`number_of_times` , t.`organizing_date` , t.`updatedby` , t.`status` , sum( if( c.topic = 'Hoe Basin'
AND t.gender = 'M', 1,0 ) ) AS HomeBasinMale, sum( if( c.topic = 'Hoe Basin'
AND t.gender = 'F', 1,0 ) ) AS HomeBasinFemale, sum( if( c.topic = 'ADP Ripping'
AND t.gender = 'M', 1,0 ) ) AS ADPRippingMale, sum( if( c.topic = 'ADP Ripping'
AND t.gender = 'F', 1,0 ) ) AS ADPRippingFemale, sum( if( c.topic = 'Mechanized ripping'
AND t.gender = 'M', 1,0 ) ) AS MechanizedrippingMale, sum( if( c.topic = 'Mechanized ripping'
AND t.gender = 'F', 1,0 ) ) AS MechanizedrippingFemale, sum( if( c.topic = 'Herbicide safety and use'
AND t.gender = 'M', 1,0) ) AS HerbicidesafetyanduseMale, sum( if( c.topic = 'Herbicide safety and use'
AND t.gender = 'F', 1,0 ) ) AS HerbicidesafetyanduseFemale, sum( if( c.topic = 'Tree Planting'
AND t.gender = 'M', 1,0 ) ) AS TreePlantingMale, sum( if( c.topic = 'Tree Planting'
AND t.gender = 'F', 1,0 ) ) AS TreePlantingFemale, sum( if( c.topic = 'Others'
AND t.gender = 'M', 1,0 ) ) AS OthersMale, sum( if( c.topic = 'Others'
AND t.gender = 'F', 1,0 ) ) AS OthersFemale
,count(t.name_oftrainee) as totalNumberOfTrainees,
sum(if(t.gender='F',1,0)) as totalNumberOfFemales
FROM tbl_training t LEFT JOIN tbl_district d ON ( d.districtCode = t.district )
LEFT JOIN tbl_trainingtopic c ON ( c.code = t.training_topic )
WHERE d.districtName <>''
and t.district like '".$district."%'
and t.year like '".$year."%'
and t.semi_annual like '".$quarter."%'
group by t.district order by d.districtName asc
 ";
	 $query=@mysql_query($sql)or die(http("PR-918"));
	
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>

  <td colspan=''>".$n."</td>

    <td>".$row['districtName']."</td>
    <td align='left' colspan=1>".$row['HomeBasinMale']."</td>
 <td align='left' colspan='1'>".$row['HomeBasinFemale']."</td>
  <td align='left'>".$row['ADPRippingMale']."</td>
  <td align='left'>".$row['ADPRippingFemale']."</td>
  <td align='left'>".$row['MechanizedrippingMale']."</td>
   <td>".$row['MechanizedrippingFemale']."</td>
    <td align='left' colspan=1>".$row['HerbicidesafetyanduseMale']."</td>
 <td align='left' colspan='1'>".$row['HerbicidesafetyanduseFemale']."</td>
  <td align='left'>".$row['TreePlantingMale']."</td>
  <td align='left'>".$row['TreePlantingFemale']."</td>
  <td align='left'>".$row['OthersMale']."</td>
    <td align='left'>".$row['OthersFemale']."</td>
	<td align='left'><strong>".calc_Percentage($row['totalNumberOfTrainees'],$row['totalNumberOfFemales'])."%</strong></td>
  </tr>";
  $n++;
  }


 $data.="<tr class='evenrow'><td colspan='18'>".noRecordsFound($query,17)."</td></tr></table></form>";

export($format,$data);

}

function view_NumberofFarmersandAreaunderAdoption($quarter,$year,$district,$format){


$n=1; $inc=1;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='1000' id='report' border='1' cellspacing='1'>";
 
  $data.="
  <tr><th colspan='1' rowspan='3'>NO</th><th colspan='2' rowspan='3'>District</th>
    
    <th colspan='6'><center>Number of Farmers Adopting CF  <em>(CF=Conservation farming)</em></center></th>
    <th colspan='6'><center>Area under Adoption <em>(Acreage)</em></center></th>
  </tr>
  <tr>
    
    
    <th colspan='2'><center>Hoe CF</center></th>
    <th colspan='2'><center>ADP Ripping CF</center></th>
    <th colspan='2'><center>Mechanized Ripping CF</center></th>
    <th colspan='2'><center>Hoe CF</center></th>
    <th colspan='2'><center>ADP CF</center></th>
    <th colspan='2'><center>Mechanised CF</center></th>
  </tr>
  <tr>
    <th>Male</th>
    <th>Female</th>
    <th>Male</th>
    <th>Female</th>
    <th>Male</th>
    <th>Female</th>
    <th>Male</th>
    <th>Female</th>
    <th>Male</th>
    <th>Female</th>
    <th>Male</th>
    <th>Female</th>
  </tr>
";

$sql=" SELECT f.`fid` , f.`org_code` ,f.year, f.quarter,o.district, d.districtName, f.`FarmerName` ,
 sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderHoebasins <>0, 1, 0 ) ) AS adoptedcfHoeBasinMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderHoebasins <>0, 1, 0 ) ) AS adoptedcfHoeBasinFemale,
   sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderADPripping <>0, 1, 0 ) ) AS adoptedcfAreaunderADPrippingMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderADPripping <>0, 1, 0 ) ) AS adoptedcfAreaunderADPrippingFemale,
 sum( if( f.`doptedCF/CA` =1 AND sex =1 AND f.AreaunderMechanizedripping <>0, 1, 0 ) ) AS adoptedcfAreaunderMechanizedrippingMale,
  sum( if( f.`doptedCF/CA` =1 AND sex =2 AND f.AreaunderMechanizedripping <>0, 1, 0 ) ) AS adoptedcfAreaunderMechanizedrippingFemale,


sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderHoebasins <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptioncfHoeBasinMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderHoebasins <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionHoeBasinFemale,
   sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderADPripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionADPrippingMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderADPripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionADPrippingFemale,
sum( if( f.`AreaunderCF/CA`<>0 AND sex =1 AND f.AreaunderMechanizedripping <>0, f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionMechanizedrippingMale,
  sum( if( f.`AreaunderCF/CA`<>0 AND sex =2 AND f.AreaunderMechanizedripping <>0,f.`AreaunderCF/CA`, 0 ) ) AS AreaunderAdoptionMechanizedrippingFemale
  
    , f.`display` , f.`updatedby` , f.`lastupdated`
FROM `tbl_farmerproductionrecords` f
LEFT JOIN tbl_organization o ON ( o.org_code = f.org_code )
LEFT JOIN tbl_district d ON ( d.districtCode = o.district )
WHERE f.display LIKE 'Yes%' and d.districtName <>''
and o.district like '".$district."%'
and f.year like '".$year."%'
and f.quarter like '".$quarter."%'
GROUP BY o.`district`
ORDER BY d.districtName ASC
";

	   
	 //$obj->alert($sql);
 $query=@mysql_query($sql)or die(http("Project_results-1589"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";

    $data.="<tr class='$color'>
  	<td colspan='1' >".$n."</td>
    <td colspan=2>".$row['districtName']."</td>
    <td colspan=1 align='right'>".$row['adoptedcfHoeBasinMale']."</td>
	<td align='right'>".$row['adoptedcfHoeBasinFemale']."</td>
 	<td colspan='1' align='right'>".$row['adoptedcfAreaunderADPrippingMale']."</td>
	<td align='right'>".$row['adoptedcfAreaunderADPrippingFemale']."</td>
 	<td colspan=1 align='right'>".$row['adoptedcfAreaunderMechanizedrippingMale']."</td>
	<td align='right'>".$row['adoptedcfAreaunderMechanizedrippingFemale']."</td>
	
	<td colspan=1 align='right'>".$row['AreaunderAdoptioncfHoeBasinMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionHoeBasinFemale']."</td>
 	<td colspan='1' align='right'>".$row['AreaunderAdoptionADPrippingMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionADPrippingFemale']."</td>
 	<td colspan=1 align='right'>".$row['AreaunderAdoptionMechanizedrippingMale']."</td>
	<td align='right'>".$row['AreaunderAdoptionMechanizedrippingFemale']."</td>
  	</tr>";
  	$n++;
	//$obj->alert($data1);
		}

  
 $data.="<tr class='evenrow'><td colspan='15'>".noRecordsFound($query,17)."</td></tr></table></form>";

export($format,$data);
}

function YieldsPerCrop($quarter,$year,$district,$format){


$n=1; $inc=1;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report' border='1'>
 
	
<tr>
   
    <th colspan='11'><center>
      Yields Per Crop
    </center></th>
  </tr>
  <tr>
   
    <th colspan='2' rowspan='2'>District</th>
    <th colspan='2' rowspan='2'>Crop</th>
    <th colspan='2'>Hoe Basin</th>
    <th colspan='2'>ADP Ripping;</th>
    <th colspan='2'>Mechanized Ripping</th>
    
  </tr>
  <tr>
    <th width='12%'>Yields (Kgs)</th>
    <th width='9%'>Selling Price</th>
        <th width='15%'>Yields (Kgs)</th>
    <th width='7%'>Selling Price</th>
        <th width='7%'>Yields</th>
    <th width='9%'>Selling Price</th>
       
  </tr>";


$x="SELECT d.districtCode,d.districtName
		FROM `tbl_district` d inner join tbl_organization o on(d.districtCode=o.district)
		inner join `tbl_farmerproductionrecords` f on(f.org_code=o.org_code)
	 	where d.districtName <> ''
	   and d.districtCode like '".$district."%' 
	   and d.entryType like 'District%'
		group by d.districtCode
		order by d.districtName asc";
		  # $obj->addAlert($x);
		     $query1=mysql_query($x)or die(http("PR-0755"));
			 $m=1;
			 //if(mysql_num_rows($query1)>0){
		    while($rowi=mysql_fetch_array($query1)){
		     $m=$rowi['indicator_id'];
			
		  #$color=$inc%2==1?"evenrow":"white1";

$data.="<tr class=$color>
<td colspan=12><strong><input type='hidden' name='cpa_id[]' id='cpa_id' value='".$rowi['districtCode']."' /><strong>".$rowi['districtName']."</strong></td>

    </tr>";


$sql="SELECT `fid`,  f.`org_code`,o.district,d.districtName, f.`FarmerName`, f.`sex`, f.`LeadFarmer`,c.crop_id,c.cropName, f.`Totalareaundercropproduction`, f.`AreaundercropLegumes`,f.AreaunderHoebasins, f.`crophoebasin`, f.`yieldhoebasin`, f.`selling_pricehoebasin`, f.`AreaunderADPripping`, f.`cropadpripping`, f.`yieldcropadpripping`, f.`selling_pricecropadpripping`, f.`AreaunderMechanizedripping`, f.`cropmechanized`, f.`yieldmechanized`, f.`selling_pricemechanized`, f.`doptedCF/CA`, f.`AreaunderCF/CA`, f.`Herbicideuse`, f.`Burntcropresidues`, f.`display`, f.`updatedby`, f.`lastupdated` 
		FROM `tbl_farmerproductionrecords` f
		 left join tbl_crops c on(c.crop_id=f.crophoebasin)
		left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
	 	where d.districtName <> '' and c.cropName <> ''
	   and o.district='".$rowi['districtCode']."' 
	   and f.year like '".$year."%'
	   and f.quarter like '".$quarter."%' 
	    and  f.display like 'Yes%' 
		group by c.cropName
		order by d.districtName,c.cropName asc";
	  //$obj->alert($sql);
 $query=mysql_query($sql)or die(http("2140"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    //".$n."
	
	$data.="<tr class='$color'>

  <td colspan=2 ></td>
<td colspan=2 align='left'>".$row['cropName']."</td>
<td align='right'>".$row['yieldhoebasin']."</td>
<td align='right'>".$row['selling_pricehoebasin']."</td>
<td align='right'>".$row['yieldcropadpripping']."</td>
<td align='right'>".$row['selling_pricecropadpripping']."</td>

    
<td align='right'>".$row['yieldmechanized']."</td>
<td align='right'>".$row['selling_pricemechanized']."</td>

  
  </tr>";
  $n++;
}

}
//<tr class='evenrow'><td colspan='18'>".noResultsFound()."</td></tr>
 $data.="</table></form>";

export($format,$data);

}

function view_FarmersUsingHerbicides($year,$quarter,$district,$format){

$n=1;
$inc=1;



$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>
			  
			  
			  <tr CLASS='evenrow'>
 
    <th colspan='9' ><center>NUmber of Farmers Using Herbicides</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>
    <th># of Farmers Not Using Herbicides</th>
	    <th># of Farmers Using Herbicides</th>
		<th>% of Farmers Using Herbicides</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, 
	   sum(if(f.`Herbicideuse`=0,1,0)) as farmersnotUsingHerbicides,
	  sum(if(f.`Herbicideuse`=1,1,0)) as farmersUsingHerbicides,
	  
	  
	   f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	 // $obj->alert($sql);
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $total=($row['farmersnotUsingHerbicides']+$row['farmersUsingHerbicides']);
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>
	".loop_key('fid',$row['fid'])."
  <td>".$n."</td>
    <td>".$row['districtName']."</td>
    <td align='right'>".$row['farmersnotUsingHerbicides']."</td>
    <td align='right'>".$row['farmersUsingHerbicides']."</td>
      
    <td align='right'>".intval(calc_Percentage($total,$row['farmersUsingHerbicides']))."%</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

export($format,$data);

}

function view_FarmersNotBurningCropResidues($year,$quarter,$district,$format){


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>
			  <tr CLASS='evenrow'>
 
 <th colspan='8' ><center>NUmber of Farmers Not Burning Crop Residues</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>
    
	    <th># of Farmers Burning Crop Residues</th>
		<th># of Farmers Not Burning Crop Residues</th>
		<th>% of Farmers Not Burning Crop Residues</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, f.`Herbicideuse`,
	   sum(if(f.`Burntcropresidues`=0,1,0)) as farmersnotBurningcropresidues,
	  sum(if(f.`Burntcropresidues`=1,1,0)) as farmersBurningcropresidues,
	  
	  
	   f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	  
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $total=($row['farmersBurningcropresidues']+$row['farmersnotBurningcropresidues']);
  $orgdate="org_date".$n;
  #$color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>

  <td colspan='2'>".$n."</td>
    <td>".$row['districtName']."</td>
    
    <td align='right'>".$row['farmersnotBurningcropresidues']."</td>
      <td align='right'>".$row['farmersBurningcropresidues']."</td>
    <td align='right'>".intval(calc_Percentage($total,$row['farmersnotBurningcropresidues']))."%</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

export($format,$data);
}

function view_FarmersProductionRecordsReport($year,$quarter,$district,$format){

$n=1;
$inc=1;

//$_SESSION['quarter1']=($quarter<>'')?$quarter:$_SESSION['quarter'];
//$_SESSION['PMyear']=($year<>'')?$year:$_SESSION['Activeyear'];

#$obj->alert($_SESSION['parishCode']);

$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='100%' id='report' border='1'>
			  <tr CLASS='evenrow'>
 
    <th colspan='9' ><center>Area under Production (Acreage)</center></th>
	
  </tr>
  <tr CLASS='evenrow'>
  <th colspan=2>NO</th>
    <th>District</th>
    
	<th>AREA* UNDER CROP lEGUMES (BEANS,SOYA BEANS)</th>

	<th>AREA* UNDER HOE BASINS</th>
	
	<th>AREA* UNDER adp RIPPING</th>
	
	<th>AREA* UNDER MECHANIZED RIPPING</th>
	
	<th>AREA* UNDER CF/CA</th>
	    <th>tOTAL AREA* UNDER CROP PRODUCTION</th>
	  </tr>";
	  $sql="SELECT f.`fid`, f.`org_code`,o.district,d.districtName, f.`FarmerName`,
	   	f.`sex`, f.`LeadFarmer`, sum(f.`Totalareaundercropproduction`) as Totalareaundercropproduction , sum(f.`AreaundercropLegumes`) as AreaundercropLegumes,
	   	sum(f.AreaunderHoebasins) as AreaunderHoebasins,
	  	f.`selling_pricehoebasin`, sum(f.`AreaunderADPripping`) as AreaunderADPripping , f.`cropadpripping`,
	   	f.`yieldcropadpripping`, f.`selling_pricecropadpripping`, sum(f.`AreaunderMechanizedripping`) as AreaunderMechanizedripping,
	   	f.`cropmechanized`, f.`yieldmechanized`, f.`selling_pricemechanized`, f.`doptedCF/CA`,
	    sum(f.`AreaunderCF/CA`) as AreaunderCF , f.`Herbicideuse`, f.`Burntcropresidues`, f.`display`, f.`updatedby`, f.`lastupdated` 
	  	FROM `tbl_farmerproductionrecords` f 
	  	left join tbl_organization o on(o.org_code=f.org_code)
	  	left join tbl_district d on(d.districtCode=o.district)
		where f.display like 'Yes%' 
		and d.districtName <> '' 
		and o.district like '".$district."%'
		and f.year like '".$year."%'
		and f.quarter like '".$quarter."%'
	 	group by o.district  
	 	order by d.districtName asc";
	   /*   left join tbl_crops c on(c.crop_id=f.cropadpripping)
	  left join tbl_crops c on(c.crop_id=f.cropmechanized) */
	 // $obj->alert($sql);
 $query=@mysql_query($sql)or die(http("2140"));
  while($row=@mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  #$color=($n%2==1)?"evenrow3":"white1";
  $cropNameADP=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropadpripping']."'"));
    $cropNameMechanized=@mysql_fetch_array(mysql_query("select * from tbl_crops where crop_id='".$row['cropmechanized']."'"));
    $data.="<tr class='$color'>

  <td colspan='2'>".$n."</td>
    <td>".$row['districtName']."</td>
    <td align='right'>".$row['AreaundercropLegumes']."</td>
    <td align='right'>".$row['AreaunderHoebasins']."</td>
       <td align='right'>".$row['AreaunderADPripping']."</td>
  <td align='right'>".$row['AreaunderMechanizedripping']."</td>
    <td align='right'>".$row['AreaunderCF']."</td>
    <td align='right'>".$row['Totalareaundercropproduction']."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,27)."</table></form>";

export($format,$data);

}

function view_ParticipatingfarmersbyproducerOrganization($orgname,$orgtype,$farmerName,$district,$subcounty,$parish,$leadfarmer,$gender,$format){
$n=1; $inc=1;
/*$_SESSION['orgname1']='';
$_SESSION['orgtype1']='';
$_SESSION['countryName']='';
$_SESSION['districtName']='';
$_SESSION['subcountyName']='';
$_SESSION['ParishName']='';
$_SESSION['leadfarmer']='';
$_SESSION['gender']='';*/

$_SESSION['orgname1']=$orgname;
$_SESSION['orgtype1']=$orgtype;
$_SESSION['farmerName']=$farmerName;
$_SESSION['districtName']=$district;
$_SESSION['subcountyName']=$subcounty;
$_SESSION['ParishName']=$parish;
$_SESSION['leadfarmer']=$leadfarmer;
$_SESSION['gender']=$gender;



$data.="<form name='organization' id='organization'   action='".$PHP_SELF."' method='post'>";
$data.="<table cellspacing='1'  id='report'     width='100%' border='1'>
		<tr>
        <th colspan='12' ><div align='center' class=''>Participating farmers by producer Organization</div></th>
        </tr>
      
      <tr>
	  <th colspan='2'>SELECT</th>
	  	<th colspan='2'><strong >farmer name</strong></th>
		<th ><strong class=''>GENDER</strong></th>
		<th  width=''><strong class=''>LEad Farmer</strong></th>
	  <th colspan='2' ><strong >ORGANIZATION NAME</strong></th>

        <th width='' '><strong class=''>district</strong></th>
	<th width='' '><strong class=''>subcounty</strong></th>
	<th width='' '><strong class=''>parish</strong></th>
		<th width=''><strong class=''>Village</strong></th></tr>";

$query_string="select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,
o.telephone,o.orgtype,o.email_address,o.village,
o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName,
f.`FarmerName`, f.`sex`, f.`LeadFarmer` from tbl_organization o  
join `tbl_farmerproductionrecords` f on(f.org_code=o.org_code)
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
where o.org_code like '".$_SESSION['orgname1']."%' 
&& o.orgtype like '".$_SESSION['orgtype1']."%' 
and gender like '".$_SESSION['gender']."%' 
and o.district like '".$_SESSION['districtName']."%' 
and lower(s.subcountyName) like '".strtolower($_SESSION['subcountyName'])."%' 
and lower(p.ParishName) like '".strtolower($_SESSION['ParishName'])."%' 
and lower(f.`LeadFarmer`) like '".strtolower($_SESSION['leadfarmer'])."%' 
and lower(f.`FarmerName`) like '%".strtolower($_SESSION['farmerName'])."%' 
OR lower(o.village) like '%".strtolower($_SESSION['farmerName'])."%'
group by f.`FarmerName` order by orgName Asc";
 //$feedback->alert($query_string);

$new_query=@mysql_query($query_string)or die(http("STP-2614"));




	  while($row=mysql_fetch_array($new_query)){
	 // $color=$n%2==1?"#e7d58f":"#ffffff";
	 //$feedback->ainclert($row[21]);
	 $div2="view_projectDetails_".$row['org_code'];
	 $sex=($row['sex']==2)?"<td>Female</td>":(($row['sex']==1)?"<td>Male</td>":"<td>-</td>");
	  $leadfarmer=($row['LeadFarmer']==0)?"<td>No</td>":(($row['LeadFarmer']==1)?"<td>Yes</td>":"<td>-</td>");
	  //$color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#A9753A';\" >

	 <td><input name='org_code12[]' id='org_code12' type='hidden' value='".$row['org_code']."' /></td><td>".$inc++."</td>
	  <td  colspan='2'>".$row['FarmerName']."</td>
	 ".$sex.$leadfarmer."
	 <td colspan='2'>".mysql_real_escape_string($row['orgName'])."</td>
		<td>".checkExistance($row['districtName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['subcountyName'],NULL,'ExistsString')."</td>
	 <td>".checkExistance($row['ParishName'],NULL,'ExistsString')."</td>
	<TD>".checkExistance($row['village'],'','ExistsString')."</TD>
	</tr>";
	    }
    
  $data.="</table></form>";
export($format,$data);

 }

function view_CARPPMPIndicatorTracker($indicator_type,$subcomponent,$output,$year,$format){
#----------------------------------------------
$_SESSION['indicator']='';
$_SESSION['indicator_type']='';
$_SESSION['fyear']='';
$_SESSION['subcomponent_id']='';
$_SESSION['output']='';
#----------------------------------------------
$_SESSION['indicator_type']=$indicator_type;
$_SESSION['indicator']=$indicator;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output']=$output;
$_SESSION['fyear']=($year<>NULL)?$year:$_SESSION['Activeyear'];
#---------------------------------------------

//$_SESSION['fyear']=($year=='')?$_SESSION['Activeyear']:$year;
$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report' border='1'    width='100%' >


            <tr>
           
              <th colspan='13' class='dataRow' ><center>CARP PMP Indicator Tracker</center></th>
															</tr>
            <tr><th class='dataRow' >SELECT</th>
			
              <th colspan='4' width='' class='dataRow'>Indicator</th>
			
             <th class='dataRow'>Indicator type</th>
			 <th class='dataRow'>unit of measure</th>
			 <th class='dataRow'>Disaggregation</th>
				  
				   <th class='dataRow'>Baseline</th>
				   <th class='dataRow'>LOP Targets</th>
				    <th class='dataRow'>Year ".$_SESSION['fyear']." Target</th>
					  <th class='dataRow'>Year ".$_SESSION['fyear']." Progress</th>
					  <th class='dataRow'>Progress Against ".$_SESSION['fyear']." Target </th>
            		
           			</tr>";
$inc=1;

$x="SELECT w.`workplan_id` , i.`indicator_id` ,i.subcomponent_id,i.output_id, i.indicator_code, 
i.indicator_id, i.indicator_name, w.`curr_year` , w.`baseline` , i.`unitofmeasure`,
   w.Target, l.Target as loptarget, r.total,i.`display`,i.typeofDisaggregation,i.`indicator_type`
FROM tbl_indicator i LEFT JOIN  `tbl_workplan` w  ON ( i.indicator_id = w.indicator_id )
 LEFT JOIN  `tbl_loptargets`l  ON ( i.indicator_id = l.indicator_id )
 LEFT JOIN  `tbl_organizationreporting` r  ON ( i.indicator_id = r.indicator_id )


WHERE i.subcomponent_id LIKE '".$_SESSION['subcomponent_id']."%'
 and i.output_id like '".$_SESSION['output_id']."%'
 && i.indicator_type LIKE '".$_SESSION['indicator_type']."%'
 and i.indicator_name like '".$_SESSION['indicator']."%'
 OR w.curr_year like  '".$_SESSION['fyear']."%'

GROUP BY i.indicator_id
HAVING i.display like 'Yes%' 
ORDER BY i.indicator_code,i.indicator_type ASC";
$_SESSION['queryExport']=$x;
$query=@mysql_query($x)or die(http("WRKPlan-0123"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  //$color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type=hidden name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 
".$inc."</td>
            <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='".$row['workplan_id']."' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>
	
			<td align=left>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left >".$row['typeofDisaggregation']."</td>
						<td  align='right'>$base</td>
						
			<td align=right ><strong>".checkExistance($row['loptarget'],NULL,'ExistsInteger')."</strong></td>
			<td align=right ><strong>".checkExistance($row['Target'],NULL,'ExistsInteger')."</strong></td>
			<td align=right ><strong>".checkExistance($row['total'],NULL,'ExistsInteger')."</strong></td>";
			$Target=Mean($row['Target'],$row['unitofmeasure']);
			$Actual=Mean($row['total'],$row['unitofmeasure']);
			//$obj->alert($Target.",----".$Actual);
			$percentage=calc_Percentage($Target,$Actual);
			$displayPercentage=($percentage<>0)?"<td align=right ><strong>".$percentage."%</strong></td>":"<td align='center' ><strong>-</strong></td>";
			$data.=$displayPercentage."</tr>";

$inc++;
		  }
		//} 
		//}
			//$data.="".noRecordsFound($query,10)."";
		  $data.="
</table></form>";

export($format,$data);

}

function exportLOPTargets($linkvar,$indicator_type,$subcomponent,$output,$format){

$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'>
<table cellspacing='1'  id='report'  border='1'   width='100%' >
            <tr>
            <tr>
			<th class='dataRow' rowspan='3' >NO/SELECT</th>
                <th  colspan='4' rowspan='3' class='dataRow'>Indicator</th>
			      <th scope='col' rowspan='3' class='dataRow'>Indicator type</th>
			 		<th scope='col' rowspan='3' class='dataRow'>unit of measure</th>
			 		<th scope='col' rowspan='3'  class='dataRow'>Type of Disaggregation</th>
              		<th scope='col' colspan='13' class='dataRow' ><center>Life of Project Targets</center></th>
															</tr><tr>
														
									
            ";
	
			 $queryHeader=@mysql_fetch_array(@mysql_query("select * from tbl_workplan_setup where status like 'Open%' order by 1 asc"));
				  for($n=intval($queryHeader['opening_year']);$n<intval($queryHeader['closure_year']);$n++){
				 // $nx=$n."/".$n++;
				 // $obj->alert($nx);
				 $zz=$n+1;
            		$data.="<th class='evenrow2' colspan='3' rowspan='1' align='right'><center>".$n."/".$zz."</center></th>";
					
					}
			 
			 
			 $data.="<th  scope='col' rowspan='2' class='dataRow'>Total LOP Target</th>
            </tr>";
		
			 $data.="<tr><th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>
				<th scope='col'  class='dataRow'>M </th>
			   <th scope='col'  class='dataRow'>F</th>
			    <th scope='col' class='dataRow'>O </th>";
		
				  $data.="</tr>";
$inc=1;
				$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";

				
				
				$x=QueryManager::LOPTargets($_SESSION['subcomponent_id'],$rowoutput['output_id'],$_SESSION['indicator_Type'],$_SESSION['indicator']);
//$obj->alert($x);
//$_SESSION['queryExport']=$x;
$query=Execute($x)or die(http("Workplan-0123"));
		  if(mysql_num_rows($query)>0)
		  while($row=FetchRecords($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"0";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
$indicator_type=($row['indicator_type']<>NULL)?$row['indicator_type']:noteMsgDefined("Not Defined");
$MaleYear1=($row['MaleYear1']<>NULL)?$row['MaleYear1']:"-";
$FemaleYear1=($row['FemaleYear1']<>NULL)?$row['FemaleYear1']:"-";
$OthersYear1=($row['OthersYear1']<>NULL)?$row['OthersYear1']:"-";
$MaleYear2=($row['MaleYear2']<>NULL)?$row['MaleYear2']:"-";
$FemaleYear2=($row['FemaleYear2']<>NULL)?$row['FemaleYear2']:"-";
$OthersYear2=($row['OthersYear2']<>NULL)?$row['OthersYear2']:"-";
$MaleYear3=($row['MaleYear3']<>NULL)?$row['MaleYear3']:"-";
$FemaleYear3=($row['FemaleYear3']<>NULL)?$row['FemaleYear3']:"-";
$OthersYear3=($row['OthersYear3']<>NULL)?$row['OthersYear3']:"-";
$MaleYear4=($row['MaleYear4']<>NULL)?$row['MaleYear4']:"-";
$FemaleYear4=($row['FemaleYear4']<>NULL)?$row['FemaleYear4']:"-";
$OthersYear4=($row['OthersYear4']<>NULL)?$row['OthersYear4']:"-";
$TotalTarget=($row['MaleYear1']+$row['FemaleYear1']+$row['OthersYear1']+$row['MaleYear2']+$row['FemaleYear2']+$row['OthersYear2']+$row['MaleYear3']+$row['FemaleYear3']+$row['OthersYear3']+$row['MaleYear4']+$row['FemaleYear4']+$row['OthersYear4']);

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left><INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
".$inc."</td>
             <td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='".$row['indicator_id']."' />".$row['indicator_code']."</td>
			<td colspan='3' width=''>$row[indicator_name]</td>
	
			<td align='left'>".$indicator_type."</td>
			<td align='left'>".$row['unitofmeasure']."</td>
			<td align='left' colspan='' >".$row['typeofDisaggregation']."</td>";
		
		$data.="<td align='right'>".$MaleYear1."</td>
			<td align='right'>".$FemaleYear1."</td>
			<td align='right'>".$OthersYear1."</td>";
		$data.="<td align='right'>".$MaleYear2."</td>
			<td align='right'>".$FemaleYear2."</td>
			<td align='right'>".$OthersYear2."</td>";
			$data.="<td align='right'>".$MaleYear3."</td>
			<td align='right'>".$FemaleYear3."</td>
			<td align='right'>".$OthersYear3."</td>";
			$data.="<td align='right'>".$MaleYear4."</td>
			<td align='right'>".$FemaleYear4."</td>
			<td align='right'>".$OthersYear4."</td>";
	
			$data.="<td align='right' ><strong>".$TotalTarget."</strong></td>

        </tr>";
$inc++;
		  }
		  	}
		
$data.=noRecordsFound($query,19)."</table></form>";
export($format,$data);
}

/******************************export_programme----function ---------------------------------------*/
function view_project($linkvar,$program,$project,$organization,$status,$format){
if($_SESSION['user_id']==''){
$obj->redirect('index.php');
return $obj;
} 
$_SESSION['program']='';
$_SESSION['project']='';
$_SESSION['organization']='';
$_SESSION['status']='';
$_SESSION['project']=$project;
$_SESSION['program']=$program;
$_SESSION['organization']=$organization;
$_SESSION['status']=$status;



		$aa = 1;		//
	
		$data.="<table cellspacing='0'      width='100%' border=1>";
		
		 $que ="select p.`id`, p.programme_id, p.`project_no`, p.`goal`, p.`purpose`,
		 p.`project_code`, p.`title`, p.`background`, p.`projectFundingtype`, p.`countries`, 
		 p.`institutions`, p.`leadInstitution`, p.`duration`, p.`startDate`, p.`EndDate`,
		  p.`NewendingDate`, p.`description`, p.`subcomponent_id`, p.`status`, p.`sourceof_funding`,
		   p.`amount_available`, p.`shortfall`, p.`updatedby`,pr.program_name,o.orgName,s.subcomponent,p.display FROM `tbl_project` p 
left join tbl_programme pr on(p.`programme_id`=pr.`prog_id`)
left join tbl_organization o on(o.`org_code`=p.`leadInstitution`) 
left join tbl_subcomponent s on(s.`subcomponent_id`=p.`subcomponent_id`)  
 
where p.title like '%".$_SESSION['project']."%'
and   p.`status` like '".$_SESSION['status']."%' 
and p.display like 'Yes%'
 order by p.title asc"; 
		$qry = mysql_query($que)or die(http(0066));
		
		$max_records = mysql_num_rows($qry)or die(http(0032));

		$data.="<tr class='evenrow'>
  <td colspan='4' align='left'>&nbsp;<b>Total Number of Projects:&nbsp; $max_records</b>&nbsp;</td>

		
		<tr height='25' >
				<th width='26' colspan='1'>NO</th>
				<td>Program</td>
			<td>project code</td>
			<td>project name</td>
				<td>status</td>
				</tr>";
		
		while($res = mysql_fetch_array($qry)){
			
			$color=($aa%2==0)?"evenrow":"white1";
			$id = $res['id'];						$oid = $res['organisationId'];		$cod = $res['project_code'];		$nam = $res['title'];		
			$des = $res['description'];				$sta = $res['status'];				$std = $res['startDate'];			$end = $res['endDate'];		
			$fin = $res['financialCommitment'];		$are = $res['areaOfOperation'];		$pur = $res['purpose'];				$out= $res['outputs'];		
			$fun = $res['fundingInstrument'];
			$project_code = $res['project_code'];
			
			$div="details".$id;
			$data.="<tr height='25' class='$color'    onmouseup=\"this.style.backgroundColor='#999999';\"  onmouseover=\"xajax_view_details('".$div."');return false;\"  onmouseout=\"xajax_view_details2('".$div."');return false;\" >
			<td>&nbsp;$aa.</td>
			  <td>".$res['program_name']."</td>
			<td>".strtoupper($project_code )."</td>
			<td onmouseover=\"this.style.backgroundColor='#999999';\" onmouseout=\"this.style.backgroundColor='';\"> ".ucfirst(strtolower($nam))."<div id='$div' style='float:right;'></div></td>
			<td>$sta</td>
			</tr>";
			$aa++;
		}
		@mysql_free_result($qry);
		
$data.="</tr></table>";
export($format,$data);
return $obj;
}

function export_ovcCategories($linkvar,$category_name,$type,$district,$subcounty,$parish,$format){




$data="<form action=\"".$PHP_SELF."\" name='community' id='community' method='post'><table cellspacing='0'      width='700' border='1'>

  <tr>
    <th COLSPAN=7>OVC CATEGORIES PER PARISH</th>
   

  </tr>
  <tr>
    <th COLSPAN=2>No</th>
    <th colspan=''>CATEGORY</th>
<th colspan=''>RANKING</th>
    <th>PARISH</td>
    <th>SUBCOUNTY</th>
    <th>DISTRICT</th>

  </tr>";
  $inc=1;
  $n=1;

  $sql="select c.category_id,c.districtCode,c.subcountyCode,c.parishCode,
  c.category_name,c.category_type,c.display,d.districtName,s.subcountyName,
  p.ParishName from tbl_ovc_category c join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) join tbl_district d 
   on(d.districtCode=c.districtCode) where d.districtCode like '".$_SESSION['districtCode']."%' 
and
  s.subcountyCode like '".$subcounty."%' &&
  p.ParishCode like '".$parish."%'
   and c.category_type like '".$type."%'
   && c.category_name like '%".$category_name."%'
   order by c.parishCode asc";
   #$obj->alert($sql);
  $query=mysql_query($sql)or die(http("1896"));
  while($row=mysql_fetch_array($query)){
  $color=($inc%2==1)?"evenrow3":"white1";
  $data.="<tr class='$color'>
  <td COLSPAN=2>".$n++."</td>

    <td colspan=''>$row[category_name]</td>
	 <td colspan=''>$row[category_type]</td>
	<td>$row[ParishName]</td>
	<td>$row[subcountyName]</td>
	<td>".$row['districtName']."</td>
  </tr>";
 $inc++; 
  }
  $data.="<tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 <td>&nbsp;</td>
  </tr>
</table></form>";



export($format,$data);
}
	
function export_ovcCategoriesReport($linkvar,$category_name,$type,$district,$subcounty,$parish,$format){


$_SESSION['districtName']='';
$_SESSION['category_name']='';
$_SESSION['category_type']='';
$_SESSION['subcounty']='';
$_SESSION['parishCode']='';
$_SESSION['category_name']=$category_name;
$_SESSION['category_type']=$type;
$_SESSION['subcountyCode']=$subcounty;
$_SESSION['parishCode']=$parish;
#$_SESSION['districtName']=$district;

$data="<form action=\"".$PHP_SELF."\" name='community' id='community' method='post'><table cellspacing='0'      width='700' border='1'>

  <tr>
    <th COLSPAN=7><center>OVC CATEGORIES PER PARISH</center></th>
   

  </tr>
  <tr>
    <th COLSPAN=2>No</th><th>DISTRICT</th> <th>SUBCOUNTY</th><th>PARISH</td><th colspan=''>CATEGORY</th>
    

   <th colspan=''>NUMBER OF OVC PER CATEGORY</th> 
   
    

  </tr>";
  $inc=1;
  $n=1;
#number of ovc per district

$sql2="select c.category_id,c.districtCode,c.display,d.districtName,s.subcountyCode,p.ParishCode,sum(m.noofchildren) as no_of_OVchildren
  from tbl_ovc_category c 
	join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) 
   join tbl_district d 
  
   on(d.districtCode=c.districtCode)
     join tbl_mapping_register m on(m.category=c.category_id)
   where d.districtCode like '".$_SESSION['districtCode']."%' 
   and  d.districtName like '".$_SESSION['districtName']."%' and 
  s.subcountyCode like '".$_SESSION['subcountyCode']."%' &&
  p.ParishCode like '".$_SESSION['parishCode']."%'
   and c.category_type like '".$_SESSION['category_type']."%'
   && c.category_name like '%".$_SESSION['category_name']."%'
   
    and c.display like 'Yes%'
  group by d.districtCode
   order by d.districtName asc";
 $query2=mysql_query($sql2)or die(http("250"));
 // $obj->alert($sql2);
 
 
  while($row2=mysql_fetch_array($query2)){
   $color=($inc%2==1)?"evenrow3":"white1";
 $data.="<tr class='$color'>
  <td>".$n++."</td>
<td></td>
<td colspan='4'><strong>$row2[districtName]</strong></td>
<td colspan='' align='right'><strong>$row2[no_of_OVchildren]</strong></td>
	 
	
  </tr>";
 $inc++; 
#number of ovc per subcounty
$sql3="select c.category_id,c.districtCode,c.subcountyCode,c.parishCode,
  c.category_name,c.category_type,c.display,d.districtName,s.subcountyName,
  p.ParishName ,sum(m.noofchildren) as no_of_OVchildren
  from tbl_ovc_category c 
	join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) 
   join tbl_district d 
  
   on(d.districtCode=c.districtCode)
     join tbl_mapping_register m on(m.category=c.category_id)
   where d.districtCode like '".$row2['districtCode']."%' 
   and s.subcountyCode like '".$_SESSION['subcountyCode']."%' &&
  p.ParishCode like '".$_SESSION['parishCode']."%'
   and c.category_type like '".$_SESSION['category_type']."%'
   && c.category_name like '%".$_SESSION['category_name']."%'
   
    and c.display like 'Yes%'
  group by d.districtCode,c.subcountyCode
   order by d.districtName,s.subcountyName asc";
   //$obj->alert($sql3);
  $query3=mysql_query($sql3)or die(http("275"));
  while($row3=mysql_fetch_array($query3)){
 $color=($inc%2==1)?"evenrow3":"white1";
 $data.="<tr class='$color'>
  <td>".$n++."</td>
    <td></td>
   
	
	<td></td>
	<td colspan='3' ><strong><font color='blue'>$row3[subcountyName]</font></strong></td>

	
	
	<td colspan='' align='right'><font color='blue'><strong>$row3[no_of_OVchildren]</strong></font></td>
	 
	
  </tr>";
#number of ovc per Parish
  $sql4="select c.category_id,c.districtCode,c.subcountyCode,c.parishCode,
  c.category_name,c.category_type,c.display,d.districtName,s.subcountyName,
  p.ParishName ,sum(m.noofchildren) as no_of_OVchildren
  from tbl_ovc_category c 
	join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) 
   join tbl_district d 
  
   on(d.districtCode=c.districtCode)
     join tbl_mapping_register m on(m.category=c.category_id)
   where d.districtCode like '".$row2['districtCode']."%' and
 
  s.subcountyCode like '".$row3['subcountyCode']."%' AND

  p.ParishCode like '".$row4['parishCode']."%' 

   and c.category_type like '".$_SESSION['category_type']."%'
   && c.category_name like '%".$_SESSION['category_name']."%'
   
    and c.display like 'Yes%'
  group by d.districtCode,c.subcountyCode,p.ParishCode
   order by d.districtName,s.subcountyName,p.ParishName asc";
   #$obj->alert($sql);
  $query4=mysql_query($sql4)or die(http("310"));
  while($row4=mysql_fetch_array($query4)){
  $color=($inc%2==1)?"evenrow3":"white1";
 
  $data.="<tr class='$color'>
  <td>".$n++."</td>
    <td></td>
   
	
	<td colspan='2'></td>
	<td colspan='2'><strong><font color='green'>$row4[ParishName]</font></strong></td> 
	
	
	<td colspan='' align='right'><strong><font color='green'>$row4[no_of_OVchildren]</font></strong></td>
	 
	
  </tr>";
 $inc++;
 #number of ovc per category
  $sql="select c.category_id,c.districtCode,c.subcountyCode,c.parishCode,
  c.category_name,c.category_type,c.display,d.districtName,s.subcountyName,
  p.ParishName ,sum(m.noofchildren) as no_of_OVchildren
  from tbl_ovc_category c 
	join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) 
   join tbl_district d 
  
   on(d.districtCode=c.districtCode)
     join tbl_mapping_register m on(m.category=c.category_id)
    where d.districtCode like '".$row2['districtCode']."%' and
 
  s.subcountyCode like '".$row3['subcountyCode']."%' AND
  p.ParishCode like '".$row4['parishCode']."%' 

   and c.category_type like '".$_SESSION['category_type']."%'
   && c.category_name like '%".$_SESSION['category_name']."%'
   
    and c.display like 'Yes%'
  group by c.category_id
   order by d.districtName,s.subcountyName,p.ParishName,c.category_name
   asc";
   #$obj->alert($sql);
  $query=mysql_query($sql)or die(http("345"));
  
  //paging details

  
  while($row=mysql_fetch_array($query)){
  $color=($inc%2==1)?"evenrow3":"white1";
  
  $data.="<tr class='$color'>
  <td>".$n++."</td>
    <td></td>
   

	<td colspan='3'></td>";
	/* <strong>$row3[subcountyName]</strong></td>
	<td><strong>$row4[ParishName]</strong></td> 
	
	 */
	$data.="<td colspan=''>$row[category_name]</td>
	<td colspan='' align='right'>$row[no_of_OVchildren]</td>
	 
	
  </tr>";
 $inc++; 
  }
   
  }
  
  
  }
  }
  
 

  
  
  //final totals
  $sql_tot="select c.category_id,c.districtCode,c.display,d.districtName,s.subcountyCode,p.ParishCode,sum(m.noofchildren) as no_of_OVchildren
  from tbl_ovc_category c 
	join tbl_parish p on(p.ParishCode=c.parishCode)
   join tbl_subcounty s on(s.subcountyCode=c.subcountyCode) 
   join tbl_district d 
  
   on(d.districtCode=c.districtCode)
     join tbl_mapping_register m on(m.category=c.category_id)
   where d.districtCode like '".$_SESSION['districtCode']."%' 
   and  d.districtName like '".$_SESSION['districtName']."%' and 
  s.subcountyCode like '".$_SESSION['subcountyCode']."%' &&
  p.ParishCode like '".$_SESSION['parishCode']."%'
   and c.category_type like '".$_SESSION['category_type']."%'
   && c.category_name like '%".$_SESSION['category_name']."%'
   
    and c.display like 'Yes%'
  group by d.districtCode
   order by d.districtName asc";
    $query_tot=mysql_query($sql_tot)or die(http("408"));
   //$obj->alert($sql_tot);
   if(mysql_num_rows($query_tot)>0){
$row_tot=mysql_fetch_array($query_tot)or die(http("411"));
  
  
  
  
  $data.=" <tr class='evenrow'>
    <td colspan='6'><strong>Total Number Of OVC</strong></td>
  
    <td align='right'><strong>$row_tot[no_of_OVchildren]</strong></td>

  </tr>";}
  else {
  $data.=" <tr class='evenrow'>
        <td colspan=6>".noResultsFound()."</td>
 <td>&nbsp;</td>
  </tr><tr><td colspan=3></td><td align='right'>";
  }
   $data.="<tr><td colspan=5></td><td colspan=3 align='right'>";
    	
 
$data.="</td></table></form>";


  
  
  
  
$data.="</table></form>";



export($format,$data);
}

###==========================================================================================
function export_organization($linkvar,$districtName,$orgtype,$orgname,$subcounty,$parish,$format){
$n=1; $inc=1;

$data.="<table cellspacing='0'      width='100%' border='1'> 
	  <tr>
        <th colspan='10' ><div align='center' class='black2'><center>INSTITUTION/ORGANIZATIONAL DETAILS</center></div></th>
        </tr>
      
      <tr>
	  <th ><b class=''>NO.</th>

   <th ><strong class=''>ORGANIZATION NAME</strong></th>
     <th ><strong class=''>ACRONYM</strong></th>
		<th ><strong class=''>DISTRICT</strong></th>
		<th ><strong class=''>SUBCOUNTY</strong></th>
			<th ><strong class=''>PARISH</strong></th>
				<th ><strong class=''>VILLAGE</strong></th>
		<th ><strong class=''>CONTACT PERSON</strong></th>
		<th ><strong class=''>GENDER</strong></th>
		<th ><strong class=''>TELEPHONE</strong></th>
	</tr>";
$query_string="select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,o.display,
o.telephone,o.orgtype,o.email_address,o.village,z.countryName ,o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName
from tbl_organization o 
left join tbl_country z on(o.country_id=z.countryCode) 
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
where lower(orgName) like '".strtolower($orgname)."%' 
&& o.district like '".$districtName."%'
&& o.subcounty like '".$subcounty."%'
&& o.parish like '".$parish."%'
and l.classCode='1' 
and o.display like 'Yes%'  
 order by orgName Asc";
$query_=mysql_query($query_string)or die(http(__line__));
while($row=@mysql_fetch_array($query_)){
	  $div2="view_projectDetails_".$row['org_code'];
	 $telno=($row['telephone']!='')?"<td>".$row['telephone']."</td>":"<td></td>";
	  $color=$inc%2==1?"evenrow3":"white1";
     $data.="<tr class='$color' onmouseup=\"this.style.backgroundColor='#A9753A';\" >

	 <td>".$inc++."</td>
	 <td>".mysql_real_escape_string($row['orgName'])."</td>
	 <td>".$row['acronym']."</a></td>
	 <td>".$row['districtName']."</td>
	 <td>".$row['subcountyName']."</td>
	 <td>".$row['ParishName']."</td>
	<TD>".$row['village']."</TD>
	 <td >".$row['contact_person']."</td>
 <td >".$row['gender']."</td>
	  ".$telno."
	 </tr>";
	 //$n++;
	  }

$data.="</table>";
if($linkvar=='Export Organization'){
export($format,$data);
} else {
echo $data;
 }
 }

function export_user($linkvar,$name,$username,$usergroup,$role,$format){
$n=1; $inc=1;
$data="<table cellspacing='0'      border='1'><tr><th colspan='' >NO</th><th>NAME</th><th >USERNAME</th><th>usergroup</th><th COLSPAN='3'>ROLE</th></tr>";
	
$query_string="select u.user_id,u.org_code,u.name,u.username,u.password,u.role,g.group_name from tbl_user u left join tbl_usergroup g on(g.group_id=u.usergroup) where lower(u.name) like '".strtolower($_SESSION['name1'])."%' && lower(u.username) like '".strtolower($_SESSION['user1'])."%' && lower(u.role) like '".strtolower($_SESSION['role1'])."%' && lower(g.group_name) like '".strtolower($_SESSION['usergroup1'])."%'  order by name";
	
	$SELECT=mysql_query($query_string)or die('Sunrise-Error code-00126:'.http(__line__));
	
	while($row=mysql_fetch_array($SELECT)){
	 #$color=$n%2==1?"#f0e5a5":"#ffffff";
		$data.="<tr bgcolor=''>
	
		<td>".$inc++."</td>
		<td >".$row['name']."</td>
		<td>".$row['username']."</td>
		<td>".$row['group_name']."</td>
		<td COLSPAN=3''>".$row['role']."</td>
		</tr>";
$n++;		      
}			


$data.="</table>";

export($format,$data);

}

function export_login($linkvar,$login_id,$username,$ipaddress,$status,$format){
$n=1;
$cur_user=$_SESSION['role'];
$data="<table cellspacing='0'      width='600' border='1' align='left'>
<tr><th  colspan='5' align='center'><div class='greenlinks' align='center'>USERS LOG.</div></th>
<th  colspan=''></th></tr>
<tr class='evenrow' align='left'><th class='black2'>LOG ID</th><th class='black2'>USERNAME</th><th class='black2'><div align='right'>TIME</div></th><th class='black2'><div align='right'>IP ADDRESS</div></th><th class='black2' colspan='' align='center' >STATUS</th><th class='black2' colspan='' align='' ><div align=right>ACTION</div></th></tr>";
	 $p=1;
	 
	 $query_string="select * from view_login where login_id like '".$login_id."%' && lower(username) like '".$username."%' && ip_address like '".$ipaddress."%' && lower(status) like '".$status."%' order by login_id desc limit 1,1000";
	 #$object->addAlert($query_string);
	$SELECT=@mysql_query($query_string)or die("Sunrise-Error code 670:".http(__line__));
	

	
	
	
	while($row=mysql_fetch_array($SELECT)){
	$color=$n%2==1?"#f0e5a5":"#ffffff";
	$class=$row['status']=='Active'?"greenlinks":"redhdrs";
	$data.="<tr bgcolor=''><td><input type ='hidden' name ='".$row['login_id']."' id='".$row['login_id']."'>".$row['login_id']."</td><td>".$row['username']."</td><td align='right'>".$row['time']."</td><td align=right>".$row['ip_address']."</td><TD align='right' width='10' class='$class'>".$row['status']."</TD><td><div align=right><input name='kill' type='button'  id='button' onclick=\"xajax_kill_session('".$row['login_id']."')\" value='Kill' /></div></td></tr>";
$n++;		      
}	
	$data.="<table cellspacing='0'     >";	
export($format,$data);

}

#------------------------user_comments----------------------------------------
function export_userComments($linkvar,$user,$format){

$_SESSION['username1']=$user;
$inc=1;$n=1;
$data="
<table cellspacing='0'      width='650' border='0'>
  <tr class=''>
    <th scope='col'>No.</th>
    <th scope='col'>USER</th>
    <th scope='col'>COMMENT</th>

    
  </tr>";
  $query=mysql_query("select u.username,c.comment,c.snapshot from tbl_comment  c inner join tbl_user u on(u.user_id=c.user_id) where u.username like '".$_SESSION['username1']."%' order by date desc")or die("Could not retrieve comment because ".http(__line__));
  while($row=mysql_fetch_array($query)){
   $color=$n%2==1?"#f0e5a5":"#ffffff";
  $data.="<tr bgcolor=$color>
      <td>".$nc++."</td>
    <td>$row[username]</td>
    <td>$row[comment]</td>
   
   

  </tr>";
  $n++;
  }
  
  $data.="
</table>";


export($format,$data);

}

function export_database($linkvar,$format){

$dbname="db_Sunrise_v1";
$dbuser='root';
$dbpass='craiwrut';

$backupFile = $dbname._. date("Y-m-d-H-i-s");
//$command = "C:/wamp/bin/mysql/mysql5.0.45/bin/mysqldump -u $user -p$dbpass $dbname> c:/$backupFile";
//$backup=system($command);
$data=@system("C:/wamp/bin/mysql/mysql5.0.45/bin/mysqldump -uroot -pcraiwrut db_Sunrise_v1>c:/$backupFile.sql");
export($format,$data);
}

function export_home($linkvar,$head,$format){
$data="<table cellspacing='0'      width='600' border='1'  >

  <tr>
    <th scope='col' colspan=2>NO</th>
    
    <th scope='col'>Title</th>
    <th scope='col'>Body</th>
   
  </tr>";
  $n=1; $inc=1;
  $xx="select * from tbl_home where head like '%".$head."%'  order by home_id asc ";

   $query=mysql_query($xx)or die(http(__line__));
  while($row=mysql_fetch_array($query)){
  
  $data.="<tr bgcolor=$color>
    <td>".$n++."</td>
      <td>$row[head]</td>
	  <td>$row[body]</td>

  </tr>";
  $inc++;}
 
$data.="</table>";

export($format,$data);
}

function export_zonalMapping($linkvar,$zone,$tso,$format){


$data.="<form name='' id='' action='?'><table cellspacing='0'      width='700' border='1'>

  <tr class='evenrow2'>
    
    <td colspan=5 align='center'> TECHNICAL SERVICES ORGANIZATIONS (TSO) ZONAL MAPPING</td>
 
  </tr>
  <tr class='evenrow2'>
    <td>NO</td>

    <td>ZONE</td>
    <td>ORGANIZATION</td>
    <td colspan=2 >DISTRICT IN THE ZONE</td>
  </tr>";
  $n=1;  $inc=1;
  $sql="select z.zoneName,o.orgName,o.org_code,zm.districts_inZone,z.zoneCode from tbl_zonalmapping zm left join tbl_organization o on(o.org_code=zm.orgName) left join tbl_zone z on(z.zoneCode=zm.zone) where z.zoneName like '".$_SESSION['zone']."%' and o.orgName like '".$_SESSION['tso']."%'   order by zoneCode  asc";
  #$obj->addAlert($sql);
  $queryzones=mysql_query($sql)or die(http(2260));
  while($rowzones=mysql_fetch_array($queryzones)){

$color=($inc%2==1)?"evenrow3":"white1";
  $data.="<tr class=$color><td >".$n++."</td>
 
    <td>$rowzones[zoneName]</td>
    <td>$rowzones[orgName]</td>
   <td COLSPAN=2>$rowzones[districts_inZone]</td>
    
  </tr>";
  $inc++;
  }
$data.="</table></div></form>";
export($format,$data);
}




function export_parish($linkvar,$district,$zone,$subcounty,$parish,$format){


$cur_user=$_SESSION['role'];
//$object->addAlert($cur_user);


$data.="
		
<table cellspacing='0'      width='700' border='1'>

<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>PARISH </th>
<th scope='col'>SUBCOUNTY </th>

<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col'>ZONE</th>

</tr>";
	 $inc=1;
 $query_string="select d.districtName,d.acronym,d.zone,z.zoneName,s.subcountyCode,s.subcountyName,p.ParishName,p.ParishCode from tbl_district d inner JOIN TBL_zone z on(z.zoneCode=d.zone) inner join tbl_subcounty s on(s.districtCode=d.districtCode) inner join tbl_parish p on(p.SubcountyCode=s.subcountyCode) where districtName like '".$district."%' and z.zoneName like '".$zone."%' and s.subcountyName like '".$subcounty."%' && p.ParishName like '".$parish."%' group by  ParishName order by districtName,s.subcountyName,ParishName asc ";
	 #$object->addAlert($query_string);
	$query=mysql_query($query_string)or die(http(1604));


while($row=mysql_fetch_array($query)){

	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$inc++."</td>
		<td>".$row['ParishName']."</td>
		<td>".$row['subcountyName']."</td>
		<td>".$row['districtName']."</td>
		<td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		</tr>";
$n++;		      
}			
		
	
$data.="<table cellspacing='0'     ></form>";	
export($format,$data);
}

function export_district($linkvar,$district,$zone,$format){


$data.="
<table cellspacing='0'      width='700' border='1'>

<tr class='evenrow2'><td scope='col' colspan='5' align='center'><b class=''><div style='float:center;'>REGISTERED DISTRICTS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>DISTRICT </th>
<th scope='col'>ACRONYM</th>
<th scope='col'>ZONE</th>

</tr>";
	 $inc=1;
 $query_string="select d.districtCode,d.districtName,d.acronym,d.zone,z.zoneName,count(s.subcountyName) as no_ofsubcounty,count(p.ParishName) as no_ofparishes from tbl_district d left JOIN TBL_zone z on(z.zoneCode=d.zone) inner join tbl_subcounty s on(s.districtCode=d.districtCode) inner join tbl_parish p on(p.subcountyCode=s.subcountyCode) where districtName like '".$_SESSION['districtName']."%' and z.zoneName like '".$_SESSION['zone']."%' group by  districtCode order by districtName asc ";
	 #$object->addAlert($query_string);
	$query=mysql_query($query_string)or die(http(1604));

	while($row=mysql_fetch_array($query)){

	 $color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		<TD><input name='district_code[]' id='district_code' type='hidden' value='".$row['districtCode']."' /></td>
		<td>".$inc++."</td>
		<td>".$row['districtName']."</td><td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
		
		
		</tr>";
$n++;		      
}			





$data.=" 
<table cellspacing='0'     >";	
export($format,$data);
}

function export_subcounty($linkvar,$district,$subcounty,$zone,$format){



$data.="
		
<table cellspacing='0'      width='700' border='1'>

<tr class='evenrow2'><td scope='col' colspan='7' align='center'><b class=''><div style='float:center;'>SUBCOUNTY DETAILS</div></b></td></tr>
<tr class='' align='left'>

<th scope='col' colspan=2>NO</th>
<th scope='col'>SUB-COUNTY</th>
<th scope='col'>DISTRICT </th>

<th scope='col'>ZONE</th>
</tr>";
	 $inc=1;
 $query_string="select d.districtCode,d.districtName,d.acronym,d.zone,z.zoneName,s.subcountyName,s.subcountyCode from tbl_district d left JOIN TBL_zone z on(z.zoneCode=d.zone) inner join tbl_subcounty s on(s.districtCode=d.districtCode) inner join tbl_parish p on(p.SubcountyCode=s.subcountyCode) where districtName like '".$district."%' and z.zoneName like '".$zone."%' and s.subcountyName like '".$subcounty."%'  order by d.districtName asc ";
	 #$object->addAlert($query_string);
	$query=mysql_query($query_string)or die(http(1737));

	while($row=mysql_fetch_array($query)){
$color=$n%2==1?"evenrow3":"white1";
		$data.="<tr class=$color>
		
		<td><input type ='hidden' name ='".$row['districtCode']."' id='".$row['districtCode']."'>".$inc++."</td>
		<td>".$row['subcountyName']."</td>
		<td>".$row['districtName']."</td>
		<td>".$row['acronym']."</td>
		<td>".$row['zoneName']."</td>
	
		</tr>";
$n++;		      
}			

$data.="<table cellspacing='0'     ></form>";	
export($format,$data);

}

function export_Children($linkvar,$childname,$gender,$inschool,$householdname,$fromage,$toage,$need,$format){

$data="<table cellspacing='0'      width='700' border='1' >
						
						
						
						  <tr>
							<th scope='col' colspan=7><strong style='float:center;'>OVC DETAILS</strong></th>
							
							   
						
						  </tr>
						  <tr>
							<th scope='col' colspan=''>NO</th>
							<th scope='col'>CHILD NAME</th>
							<th scope='col'>AGE IN YRS</th>
							  <th scope='col'>GENDER</th>
							  <th scope='col'>in school</th>
							<th scope='col'>house hold name</th>
						   <th scope='col'>NEED</th>
							
						</tr>";
						
						 # '".$row['indicator_id']."'
						 $select="SELECT c.child_id,c.household_id,h.hhheadname,c.status,c.childname,c.age,c.sex,c.inschool,c.display,l.code,l.codeName FROM tbl_ovcdetails c left join tbl_household h on(h.household_id=c.household_id) left join tbl_lookup l on(l.code=c.need) where c.display like 'Yes%' && c.childname like '%".$_SESSION['childname']."%' && c.sex like '".$_SESSION['gender']."%' && c.inschool like '".$_SESSION['inschool']."%' && h.hhheadname like '%".$_SESSION['householdname']."%' and l.codeName like '".$_SESSION['need']."%'   order by c.childname asc ";
						#$obj->alert($select);
						 #and c.age between '".$_SESSION['fromage']."' and '".$_SESSION['fromage']."'
						 #and c.age in('".$_SESSION['fromage']."','".$_SESSION['fromage']."')
						 $query=mysql_query($select)or die(http(__line__));
						
						  while($row=mysql_fetch_array($query)){
						  
						$status=($row['status']=='Assessed')?"<input type='button'  id='button' class='green_field' value=' Child Assessed' disabled >":"<button type='button'  id='button'  name='Child_Assesment'   value='Child Assesment' title='Child Assesment' id='child_assesment' onclick=\"xajax_ChildStatusIndex('".$row['child_id']."','".$row['household_id']."');\">Child Assesment</button>";
						 #$color=$n%2==1?"#E6E6E6":"#ffffff";
						  $data.="<tr bgcolor=$color>
						  
								
							<td>".$inc++."</td>
							<td>$row[childname]</td>
							 <td align='right'>$row[age]</td>
							  <td>$row[sex]</td>
							  <td>$row[inschool]</td>
							   <td>$row[hhheadname]</td>
								<td>$row[codeName]</td>
								   
							
						   
						  </tr>";
						  
						   $n++; } 
						
						 
						 
						 
						$data.="</table>";
						
export($format,$data);
}


 
function ViewAnnualTargets($format){

/* if($_SESSION['semiAnnual']=='Closed'||$_SESSION['fyear']=='Closed'){
$obj->alert("Your Reporting Period id Closed! You will only be able to view Records");
} */



$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Targets for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];


$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report' border='1'   width='100%' >

           <tr><th rowspan='2' class='dataRow' >NO</th>
			 <th rowspan=2 colspan='6' class='dataRow'>Indicator</th>
		
		<th colspan='10' class='dataRow' ><center>".$reportTitle."</center></th>
		
			</tr>
			<tr>
			
     
             	<th  colspan='2'  class='dataRow'>type of Indicator </th>
			 	<th  colspan='2' class='dataRow'>unit of measure</th>
			 	<th colspan='1' class='dataRow'>Type of Disaggregation</th>
				  <th  class='dataRow'>Baseline</th>
				  <th  class='dataRow'>Male</th>
				  <th  class='dataRow'>Female</th>
				   <th colspan='1' class='dataRow'>Other</th>
				      <th colspan='1' class='dataRow'>Total Semi-Annual Target</th>
				    </tr>";
$inc=1;

$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output_id']."%' order by output_code asc")or die(http("PR-338"));

while($rowoutput=@mysql_fetch_array($logicaloutput)){
$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";


$x=QueryManager::ViewIndicatorAnnualTargets($rowoutput['output_id']);
//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@Execute($x)or die(http("WRKPlan-202"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@FetchRecords($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";

	$total=($rowWP['maleAprSep']+$rowWP['femaleAprSep']+$rowWP['otherAprSep']);
		  $l="align=right";
 							$data.="<tr class=$color ".$events2.">
 									<td align=left>
 									<INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 									<INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >".$inc."</td>
           							<td align=left ><INPUT type=hidden name='loopkey[]'  id='loopkey'  value='1' />".$row['indicator_code']."</td>
									<td colspan='5' >".$row['indicator_name']."</td>
									<td align='left' colspan='2'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
									<td align='left' colspan='2'>".$row['unitofmeasure']."</td>
									<td align=left >".$row['disaggregation']."</td>
									<td align=right ><strong>".$base."</strong></td>";
									
										$rowWP=QueryManager::ViewAnnualTargets($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id']);
										
									$data.="<td align='right' ><strong>".checkExistance($rowWP['maleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align='right' ><strong>".checkExistance($rowWP['femaleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align='right' ><strong>".checkExistance($rowWP['otherAprSep'],0,'ExistsInteger')."</strong></td>";
									
									$data.="<td align='right' colspan='1' ><strong>".checkExistance($rowWP['totalAnnualTarget'],0,'ExistsInteger')."</strong></td>";
									$data.="</tr>";
$inc++;
		  }
				}
		
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="
</table></form>";
export($format,$data);
}

function view_allorganizations($org_code){

$query=mysql_query("select o.org_code,o.orgName,o.gender,
o.acronym,o.registered,o.contact_person,
o.telephone,o.orgtype,o.email_address,o.village,z.countryName ,o.district,d.districtName,s.subcountyName,p.ParishName,l.codeName
from tbl_organization o 
left join tbl_country z on(o.country_id=z.countryCode) 
left join tbl_district d on(o.district=d.districtCode) 
left join tbl_subcounty s on(o.subcounty=s.subcountyCode) 
left join tbl_parish p on(o.parish=p.ParishCode) 
left join tbl_lookup l on(o.orgtype=l.code) 
 where o. org_code='".$org_code."'
  order by orgName ASC")or die(http(__line__));
while($row=mysql_fetch_array($query)){
$data="<div id='login'>

<table cellspacing='0'      width='600'><tr><td><legend class='green_field'></legend>
      
      <table cellspacing='0'      width='670' border='0'>
        <tr>
          <td>Reports &raquo; Organizationa Details</td>
        </tr>
        <tr>
          <td><hr size='1' color='orange' align='left'width='640'/></td>
        </tr>
      </table>
      <legend class='green_field'></legend>
      <form name='organization' id='organization'><table cellspacing='0'      width='600' border='0' id='organizational_details'>
              
              <tr>
                <td width='150'>&nbsp;</td>
                <td colspan='2'><span class='green_field'>Organizational Details</span></td>
              </tr>
              <tr>
                <td>Organization:</td>
                <td colspan='2'><input type='hidden' name='org_code12[]' value='".$row['org_code']."'>".mysql_real_escape_string($row['orgName'])."</td>
              </tr>
              <tr>
                <td>Acronym</td>
                <td colspan='2'>".$row['acronym']."</td>
              </tr>
              <tr style='display:none;'>
                <td>Registered?</td>
                <td width='74' colspan='2'>".$row['registered']."</td>
              </tr>
              <tr style='display:none;'>
                <td>Registration Number:</td>
                <td colspan='2'>".$row['regno']."</td>
              </tr>
              <tr >
                <td>District:</td>
                <td colspan='2'>".$row['districtName']."</td>
              </tr>
			   <tr>
                <td>Subcounty:</td>
                <td colspan='2'>".$row['subcountyName']."</td>
              </tr>
			   <tr >
                <td>Parish:</td>
                <td colspan='2'>".$row['ParishName']."</td>
              </tr>
			   <tr >
                <td>Village:</td>
                <td colspan='2'>".$row['village']."</td>
              </tr>
              <tr>
                <td>Type of Organization:</td>
                <td colspan='2'>".$row['organization_type']."</td>
              </tr>
              <tr class='display_none'>
                <td>Vision</td>
                <td colspan='2'>".mysql_real_escape_string($row['vision'])."</td>
            </tr>
             <tr class='display_none'>
                <td>Mission</td>
                <td colspan='2'>".mysql_real_escape_string($row['mission'])."</td>
            </tr>
              <tr class='display_none'>
                <td>Objectives</td>
                <td colspan='2'>".mysql_real_escape_string($row['objectives'])."</td>
              </tr>
			  <tr style='display:none;'>
                <td><span class='green_field'>Sub-component:</span></td>
                <td colspan='2'>".$row['subcomponent']."</td>
            </tr>
              <tr style='display:none;'>
                <td><span class='green_field'>Subsector:</span></td>
                <td colspan='2'>".$row['subsector']."</td>
            </tr>
			
                
  
</table>

<table cellspacing='0'      width='597' border='0' id='contacts'>
     <tr class='display_none'>
             <td width='152'>Website:</td>
      <td width='435'>".$row['webiste']."</td>
    </tr>
           <tr>
             <td>Contact Person :</td>
             <td>".$row['contact_person']."</td>
           </tr>
           <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title']."</td>
    </tr>
           <tr>
             <td>Telephone No.:</td>
      <td>".$row['telephone']."</td>
    </tr>
           <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile']."</td>
    </tr>
	 <tr class='display_none'>
             <td>Contact Person 2:</td>
      <td>".$row['contact_person2']."</td>
    </tr>
        <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
           <tr class='display_none'>
             <td>Telephone No.:</td>
      <td>".$row['telephone2']."</td>
    </tr>
          <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile2']."</td>
    </tr>
	 <tr class='display_none'>
             <td>Contact Person 3:</td>
      <td>".$row['contact_person3']."</td>
    </tr>
           <tr class='display_none'>
             <td>Title:</td>
      <td>".$row['title2']."</td>
    </tr>
          <tr class='display_none'>
             <td>Telephone No.:</td>
      <td>".$row['telephone3']."</td>
    </tr>
          <tr class='display_none'>
             <td>Mobile No.:</td>
      <td>".$row['mobile3']."</td>
    </tr>";
	
	

	
  $data.="</table>
 
         
       </form></td></tr></table>
<p>&nbsp;</p>
</div>";
}
export($format,$data);
}

function view_TrainingParticipants($organization,$quarter,$year,$format){


$n=1; $inc=1;
$_SESSION['region']='';
$_SESSION['staffyear']='';
$_SESSION['staffQuarter']='';
$_SESSION['region']=$region;
$_SESSION['staffyear']=$year;
$_SESSION['staffQuarter']=$quarter;


$data="<form action=\"".$PHP_SELF."\" name='projects' id='projects' method='post'>
<table width='800' id='report' BORDER='1' CELLSPACING='1'>";
 
  $data.="

  
  

 <tr CLASS='evenrow'>
 
    <th colspan='12' ><center>PARTICPANTS TRAINING  RECORDs</center></th>
	
  </tr>
	
	
	<tr>
	<th colspan=2>NO</th>
	<th>organization</th>
	<th>DISTRICT</th>
	<th>subcounty</th>
	<th>parish</th>
	<th>VILLAGE/LOCATION</th>
	<th>training topic</th>
	<th>trainees</th>
	<th>naME</th>
	<th>SEX</th>
	<th>NUMBER OF TIMES<br> TRAINED ON <br>THIS TOPIC</th>
	</tr>";    
	$sql="select t.`training_id`, t.`org_code`,o.orgName, t.`village`, t.`semi_annual`, t.`year`, t.`training_topic`,c.topic, t.`trainer`, 
	 t.`typeofparticipants`, t.`name_oftrainee`,tr.Name as NameofParticipants, t.`gender`, t.`number_of_times`,l.codeName, t.`organizing_date`, t.`updatedby`, t.`status`, t.`district`, d.districtName,
	 t.`subcounty`,s.subcountyName, t.`parish`,p.ParishName, t.`task`,t.village 
	 from tbl_training t left join tbl_trainees tr on(tr.code=t.typeofparticipants)
	 left join tbl_district d on(d.districtCode=t.district)
	 
	 left join tbl_subcounty s on (s.subcountyCode=t.subcounty)
	 left join tbl_parish p on(p.parishCode=t.parish)
	 left join tbl_organization o on(o.org_code=t.org_code)
	 left join tbl_trainingtopic c on(c.code=t.training_topic)
	 left join tbl_trainees e on(e.code=t.typeofparticipants)
	 left join tbl_lookup l on(l.code=t.number_of_times)
	 where t.status like 'Yes%' && t.org_code like '".$organization."%'";
	 $query=mysql_query($sql)or die(http("432"));
  while($row=mysql_fetch_array($query)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	
  <td colspan='2'>".$n."</td>
    <td>".$row['orgName']."</td>
    <td>".$row['districtName']."</td>
    <td>".$row['subcountyName']."</td>
    <td align='left'>".$row['ParishName']."</td>
     <td align='left'>".$row['village']."</td>
     <td align='left'>".$row['topic']."</td>
 <td align='left'>".$row['NameofParticipants']."</td>
  <td align='left'>".$row['name_oftrainee']."</td>
  <td align='left'>".$row['gender']."</td>
  <td align='left'>".$row['codeName']."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($query,18);
$data.="</table></form>";

export($format,$data);

}

function view_NarrativequalitativeReport($narrative_id,$semi_annual,$org_code,$year,$format){

//$narrative_id=1;$project_id=1;$semi_annual='Jan - Jun';$year='2012';

$data="<form   method='post' name='formUploadIndividual' id='formUploadIndividual' action='functions.php' enctype='multipart/form-data'>
<table width='100%' border='0'><TR><td colspan=2><hr ></td></TR>
	  <TR><td colspan=2><div id='status'></div></td></TR>
	  ";
	 # $obj->addAlert(count($formvalues['loopkey']));
//for($i=0;$i<count($narrative_id);$i++){
#$narrative_id=$formvalues['narrative_id'][$i];
$select="select * from tbl_tsoqualitative where narrative_id='".$narrative_id."'";
$queryTSO=mysql_query($select)or die(http(4857));
#$obj->addAlert($select);
while($row=mysql_fetch_array($queryTSO)){
$data.="<tr>
         ";
		  $sql="select * from tbl_organization where org_code='".$org_code."' order by orgName asc";
		  #$obj->addAlert($sql);
		  $query=mysql_query($sql) or die(http(219));
		  $ROW=mysql_fetch_array($query) or die(http(0030));
		
		  $data.="<input name='intervention' id='intervention' value='".$ROW['org_code']."' type='hidden' ><strong>".substr($ROW['orgName'],0,500)."</strong></td>
        </tr>
       <tr>
          <td colspan=2>
          <div align='left'><strong>Executive Summary (1.1	Summary of key training activities including field days and demo plots)</strong><em>[0.5 page]</em></div></td></tr>
          <tr><td colspan=2>".$row['plannedActivities']."</td>
        </tr>
      <tr>
          <td colspan=2>
          <div align='left'><strong>1.1.2	Partners/Government Staff trained.</strong><em>(0.5 page)</em></div></td></tr> 
         <tr> <td colspan=2>".$row['implementation']."</td>
        </tr><tr>
          <td colspan=2>
          <div align='left'><strong>1.2	Summary of other main activities undertaken during the reporting period  </strong><em>(Maximum 3 pages)</em></div></td></tr>
         <tr><td colspan=2>".$row['achievements']."</td>
        </tr>";
         $data.="<tr>
          <td colspan=2>
          <div align='left'><strong>2.1	Progress against Adoption Targets Area and Farmers </strong><em>[Max 3 pages]</em></div></td></tr><tr>
          <td colspan=2>".$row['Deviation']."</td>
        </tr>
		
        <tr>
          <td colspan=2>
          <div align='left'><strong>2.2	Major Reasons for Adoption by Farmers</strong><em>[Max 0.5 page]</em></div></td></tr><tr>
          <td colspan=2>".$row['next_quarter']."</td>
        </tr>
        <tr>
          <td>
          <div align='left'><strong>2.3	Major Reasons for Non-Adoption by Farmers</strong> <em>[Max 0.5 page]</em> </div></td></tr><tr>
          <td>".$row['Challenges']."</td>
        </tr>
       
		<tr><td colspan=2> <div align='left'><strong>8. 2.4	Specific Activities to Increase Adoption (for the next period) [Max 0.5 page]</strong></div></td></tr>
        <tr>
          <td colspan='2'>
        <table cellspacing='0'      width='500' border='0'>";
		  $n=1; $is=10;$inc=1;
  $data.="<tr>
    <th>&nbsp;NO</th>
    <th>&nbsp;Activities planned for next 6 months</th>
    <th>&nbsp;Milestones</th>
    <th>&nbsp;Timeframe</th>
  </tr>";
  $data.="<tr><td>".noResultsFound()."</td></tr></table>
<td></center></tr>";
		
  
 // for($x=0;$x<$is;$x++){
  //$color=$inc%2==1?"evenrow":"white1";
  
  //$SQLM="select * from tbl_projectworkplan where project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'";
  //$obj->alert($SQLM);
   /*$querym=mysql_query($SQLM)or die("0707");
  while($rowm=mysql_fetch_array($querym)){
  $color=($n%2==1)?"evenrow":"white1";
  $data.="<tr class='$color'><td>".$n."</td>
    <td>".$rowm['activity']."</td>
    <td>".$rowm['milestone']."</td>
    <td>".$rowm['semi_annual']."</td></tr>";
	//$inc++;
  $n++;								
  } */
  
  
//".noRecordsFound($querym,11)."
  //}
/* $data.="</table>
<td></center></tr>
		  
		  
		  
		  
		  
		  <tr><td colspan=2><center>
		  <table><tr class='evenrow'>
    
    <td colspan=4 class='black2'><CENTER>ANNEX</CENTER></td></tr>
   <tr class='evenrow'><td colspan=5 class='black2'><center>List of all publications/knowledge products produced</center></td></tr>
	<tr>
<tr CLASS='evenrow'>
  <td colspan='1' class='black2'>NO</td>
    <td class='black2'>Title of Publication <br/>/Knowledge Product</td>
    <td class='black2'>Author & Organization</td>
    <td class='black2'>Date</td>
  </tr>
  <tr CLASS='evenrow'>
  <td colspan='5'><div id='status'></div></td>
 ";
  
 */
  
  
  $n=1;
 /*  $queryp=mysql_query("select * from tbl_publication where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' && year='".$year."'")or die(http("1844"));
  while($rowp=mysql_fetch_assoc($queryp)){
$publication_id=$rowp['publication_id'];
  //$obj->alert($datename);
  $color=($n%2==1)?"evenrow3":"white1";
  $data.="<tr class='$color'><td align='right'>".$n."</td><td>".$rowp['title']."</td>
    <td>".$rowp['organization']."</td>
    <td>".$rowp['dateofpublication']."</td>
   

    

  </tr>";
  $n++;
  }
   

		  
		  
		 $data.="".noRecordsFound($queryp,11)."</table>";
		*/
		
		$data.="</center></TD></tr>
		<tr><td colspan=2><center>
  
  <table> <tr CLASS='evenrow'>
  <td colspan='1' class='black2'>NO</td>
    <td class='black2'>Training course title</td>
    <td class='black2'>Provided by</td>
    <td class='black2'>Type of Participants</th>
    
	<td class='black2'>No. of Male participants</td>
	<td class='black2' >No. of Female participants</td>
<td class='black2'>Total No. of participants</td>
<td class='black2'>Organizing<br/>Date<br/></td>
  </tr>";
 $queryt=mysql_query("select * from tbl_training where status like 'Yes%' and project_id='".$project_id."' and semi_annual='".$semi_annual."' and year='".$year."'")or die(http("2140"));
  while($row=mysql_fetch_array($queryt)){
  $orgdate="org_date".$n;
  $color=($n%2==1)?"evenrow3":"white1";
    $data.="<tr class='$color'>
	
  <td>".$n."</td>
    <td>".$rowt['course']."</td>
    <td>".$rowt['trainer']."</td>
    <td>".$rowt['typeofparticipants']."</td>
    <td align='right'>".$rowt['male']."</td>
     <td align='right'>".$rowt['female']."</td>
     <td align='right'>".$rowt['total']."</td>

  <td align='right'>".$rowt['organizing_date']."</td>
  </tr>";
  $n++;
  }
  


 $data.="".noRecordsFound($queryt,11)."</table></center></td></tr>
		
          ";

		
		}
        $data.="</table></FORM>";

	  
		
		




export($format,$data);

}
 
function view_AnnualResults($reportingType,$format){

//----------------------------------------
$_SESSION['zoneID']=$zone;
$_SESSION['districtID']=$district;
$_SESSION['indicator_Type']=$indicator_type;
$_SESSION['subcomponent_id']=$subcomponent;
$_SESSION['output_id']=$output;
$_SESSION['fyear']=($year=='')?pagination::currFinancialYear($_SESSION['Activeyear'],'YearRange'):$year;
$_SESSION['semiAnnual']=($semiAnnual==NULL)?$_SESSION['quarter']:$semiAnnual;
$_SESSION['indicatorCode']=$indicatorCode;
$_SESSION['indicator']=$indicator;
//-----------------------------------------#$_SESSION['fyear']=$year;
$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];



$reportTitle=($_SESSION['semiAnnual']=='Apr - Sep')?"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".substr($_SESSION['fyear'],5,9):"Semi-Annual Achievements for the Period ".$_SESSION['semiAnnual']." ".$_SESSION['fyear'];




$n=1;

$data.="<form name='annualTarget1' id='annualTarget1' action=\"".$PHP_SELF."\" method='post'><table cellspacing='1'  id='report'  border='1'    width='100%' >


<tr>
             <th rowspan='2' class='dataRow' >NO</th>
			 <th rowspan=2 colspan='5'  class='dataRow'>Indicator</th>
              <th colspan='7' class='dataRow' ><center>".$reportTitle."</center></th>
															<th class='dataRow'  rowspan='2' colspan='3'><center>Total Actual</center></th>
															</tr>
            
			
			<tr>
			
             
			
             	<th colspan='1' class='dataRow'>Indicator type</th>
				 <th  colspan='' width='' class='dataRow'>unit of measure</th>
			 	<th colspan='2' width='' class='dataRow'>Gender Disaggregation</th>
				 <th  class='dataRow'>Male</th>
				<th  class='dataRow'>Female</th>
				<th class='dataRow'>Other</th>
				</tr>";
$inc=1;

		$logicaloutput=@mysql_query("select * from tbl_output where output_id like '".$_SESSION['output']."%' order by output_code asc")or die(http("PR-338"));
		
		while($rowoutput=@mysql_fetch_array($logicaloutput)){
		$data.="<tr><td><strong>".$rowoutput['output_code']."</strong></td><td colspan='20'><strong>".$rowoutput['output_name']."</strong></td></tr>";
		
		
		$x=QueryManager::ViewIndicators($reportingType,$rowoutput['output_id']);

//$obj->alert($x);

	
$_SESSION['queryExport']=$x;
$query=@Execute($x)or die(http("WRKPlan-2138"));
		  if(@mysql_num_rows($query)>0)
		  while($row=@mysql_fetch_array($query)){
		  $baseline=$row['baseline'];
		  $base=$baseline>0?$baseline:"-";
		  $color=$inc%2==1?"evenrow3":"white1";
		  $events2="onmouseup=\"this.style.backgroundColor='#A9753A';\"";
//checkExistance($row['Target'],NULL,'ExistsInteger')
//$obj->alert($row['Target']);

		  $l="align=right";
 $data.="<tr class=$color ".$events2.">
 <td align=left>
 <INPUT type='hidden' name='workplan_id[]'   id='workplan_id' value='".$row['workplan_id']."' >
 <INPUT type='hidden' name='indicator_idAll[]'  id='indicator_idAll' value='".$row['indicator_id']."' >
".$inc."</td>
            <td align=left >".$row['indicator_code']."</td>
			<td colspan='4' >".$row['indicator_name']."</td>
	
			<td align=left colspan='1'>".checkExistance($row['indicator_type'],'','ExistsString')."</td>
			<td align=left>".$row['unitofmeasure']."</td>
			<td align=left colspan='2'>".$row['disaggregation']."</td>";
			$rowHO=QueryManager::view_AnnualResultsHO($_SESSION['fyear'],$_SESSION['semiAnnual'],$row['indicator_id'],$reportingType);
						
									$data.="<td align=right ><strong>".checkExistance($rowHO['maleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowHO['femaleAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right ><strong>".checkExistance($rowHO['otherAprSep'],0,'ExistsInteger')."</strong></td>
									<td align=right  colspan='3'><strong>".checkExistance($rowHO['totalAnnualActual'],0,'ExistsInteger')."</strong></td>
        </tr>";
$inc++;
		  }
				}
		
			$data.="".noRecordsFound($query,10)."";
		  $data.="

</table></form>";
export($format,$data);
}


 



 ?>

