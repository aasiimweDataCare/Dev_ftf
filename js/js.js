
function ConfirmDelete(Keys,Component) {
var answer= confirm("Do you really want to Delete this record? \n Click 'Ok' to continue otherwise click 'Cancel'");
	if (answer){
	//alert(answer +"..........."+ Component);
	
	if(Component=='Delete_labourSavingTechLookup')xajax_delete_labourSavingTechLookup(Keys,Component);
	if(Component=='Delete_form8')xajax_delete_form8(Keys,Component);
	if(Component=='Delete_form7')xajax_delete_farmers(Keys,Component);
	if(Component=='Clean_form7')xajax_clean_form7_duplicates(Keys,Component);
	if(Component=='Delete_form6')xajax_delete_form6(Keys,Component);
	if(Component=='Clean_form6')xajax_clean_form6_duplicates(Keys,Component);
	if(Component=='Delete_training')xajax_delete_training(Keys,Component);
	if(Component=='Clean_form1')xajax_clean_form1_duplicates(Keys,Component);
	if(Component=='Delete_exporters_form3')xajax_delete_exporters_form3(Keys,Component);
	if(Component=='Clean_exporters_form3')xajax_clean_form3_duplicates(Keys,Component);
    if(Component=='Delete_traders_form4')xajax_delete_traders_form4(Keys,Component);
	if(Component=='Clean_traders_form4')xajax_clean_form4_duplicates(Keys,Component);
	if(Component=='Delete_form5')xajax_delete_form5(Keys,Component);
	
    if(Component=='Delete_enterpriseTechAdoption')xajax_delete_enterpriseTechAdoption(Keys,Component);
    if(Component=='Delete_labourSavingTech')xajax_delete_labourSavingTech(Keys,Component);
	if(Component=='Delete_mediaPrograms')xajax_delete_mediaPrograms(Keys,Component);
	if(Component=='Delete_youthApprentice')xajax_delete_youthApprentice(Keys,Component);
	if(Component=='Delete_bds')xajax_delete_bds(Keys,Component);
	if(Component=='Delete_bankLoans')xajax_delete_bankLoans(Keys,Component);
	if(Component=='Delete_partnerships')xajax_delete_partnerships(Keys,Component);
	if(Component=='Delete_farmers')xajax_delete_farmers(Keys,Component);
	if(Component=='Delete_exporter')xajax_delete_exporter(Keys,Component);
	if(Component=='Delete_trader')xajax_delete_trader(Keys,Component);
	if(Component=='Delete_vAgent')xajax_delete_vAgent(Keys,Component);
	if(Component=='Delete_Doc')xajax_delete_documents(Keys,Component);
	if(Component=='Delete_submenuItem')xajax_delete_submenuItem(Keys,Component);
	if(Component=='Delete_Allocation')xajax_Delete_Data_TeamAllocation(Keys,Component);
	if(Component=='delete_users')xajax_delete_user(Keys,Component);
	if(Component=='Delete_usersGroup')xajax_delete_usergroup(Keys,Component);
	}
	
}




function ConfirmDeleteOnSetup(Keys,Component) {
var answer= confirm("You are about to delete a Setup  value, \n which could affect many related records. \n You can modify this record instead. \n Click 'Ok' to continue otherwise click 'Cancel'");
	if (answer){
	
	if(Component=='Delete_labourSavingTechLookup')xajax_delete_labourSavingTechLookup(Keys,Component);
	if(Component=='Delete_traderModelsLookup')xajax_delete_traderModelsLookup(Keys,Component);
	if(Component=='Delete_enterpriseTechnologiesLookup')xajax_delete_enterpriseTechnologiesLookup(Keys,Component);
	if(Component=='Delete_actorsServedLookup')xajax_delete_actorsServedLookup(Keys,Component);
	if(Component=='Delete_cropTreatmentsLookup')xajax_delete_cropTreatmentsLookup(Keys,Component);
	if(Component=='Delete_cropVarieties')xajax_delete_cropVarieties(Keys,Component);
	if(Component=='Delete_Districts')xajax_delete_myDistricts(Keys,Component);
	if(Component=='Delete_Subcounties')xajax_delete_Subcounties(Keys,Component);
	if(Component=='Delete_Parishes')xajax_delete_Parishes(Keys,Component);
	
	if(Component=='Delete_menuItem')xajax_delete_menuItem(Keys,Component);
	
	
	}
	
}




function loadingIcon(Keys,Component) {
   //console.log("Here:"+Component);
    $("#myLoader").show(function(){
    if(Component=='save_vAgent')xajax_save_vAgent(Keys,Component);
	if(Component=='shift_vAgent')xajax_shift_vAgent(Keys,Component);
	if(Component=='save_trader')xajax_save_trader(Keys,Component);
	if(Component=='shift_trader')xajax_shift_trader(Keys,Component);
    if(Component=='save_exporter')xajax_save_exporter(Keys,Component);
    if(Component=='save_form7')xajax_save_form7(Keys,Component);
	if(Component=='search_analyzer')xajax_qAnalyzer_results(Keys,Component);
	if(Component=='update_form7')xajax_update_form7(Keys,Component);
	
	if(Component=='update_enterpriseTechAdoption')xajax_update_enterpriseTechAdoption(Keys,Component);
	if(Component=='update_labourSavingTech')xajax_update_labourSavingTech(Keys,Component);
	
    if(Component=='save_form3')xajax_save_form3(Keys,Component);
    if(Component=='save_form4')xajax_save_form4(Keys,Component);
    if(Component=='save_form5')xajax_save_form5(Keys,Component);
    if(Component=='save_householdData')xajax_save_householdData(Keys,Component);
    if(Component=='save_training')xajax_save_training(Keys,Component);
	if(Component=='save_Xtrapolation')xajax_save_extrapolation(Keys,Component);
	if(Component=='save_Indicator')xajax_save_indicatorTwentyEight(Keys,Component);
	if(Component=='save_lTwo')xajax_save_levelTwoIndicators(Keys,Component);
    })
    
	
	
}

function loadingIconSearch(Keys,Component,div) {
   //console.log("Here:"+div);
    $("#searchLoader").show(function(){
    if(Component=='search_analyzer')xajax_qAnalyzer_results(Keys,Component,div);
    })
}

function loadingIconLoadRaw(dataForm,fromDate,toDate,reportingYear,reportingPeriod,div) {
   //console.log("Here:"+div);
    $("#searchLoader").show(function(){
      xajax_view_rawData(dataForm,fromDate,toDate,reportingYear,reportingPeriod,div);
    })
}


function loadingIconDataform(dataForm,rPeriod,Component) {
   console.log("Here:" + Component);
    $("#dataFormLoader").show(function(){
    if(Component=='data_form_loader')xajax_view_dataAnalysis(dataForm,rPeriod,Component);
    })
}








function checkform (form )
{



  if (form.name.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.name.focus();
    return false ;
  }
    else if (form.name2.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.name2.focus();
    return false ;
  }
   else if (form.reg_no.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.reg_no.focus();
    return false ;
  }
   else if (form.student_no.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.student_no.focus();
    return false ;
  }
   else if (form.DOB.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.DOB.focus();
    return false ;
  }
  else if (form.faculty.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.faculty.focus();
    return false ;
  }
  else if (form.course.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.course.focus();
    return false ;
  }
  else if (form.hall.value == "") {
    alert( "Please Fill in all the Fields Marked (*)." );
    form.hall.focus();
    return false ;
  }
    
 if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value))
	{
		alert("Invalid E-mail Address! Please re-enter.");
		form.email.focus();
		return false;
	}
	
	
  //
  return true ;
}
var letters=' ABCÇDEFGHIJKLMNÑOPQRSTUVWXYZabcçdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ	'
var numbers='1234567890'
var signs=',.:;@-\''
var mathsigns=' +-=()*/'
var custom='<>#$%&?¿'
function alpha(e,allow) {
var k;
k=document.all?parseInt(e.keyCode): parseInt(e.which);
return (allow.indexOf(String.fromCharCode(k))!=-1);
}


