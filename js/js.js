function ConfirmDelete(Keys, Component) {
    var answer = confirm("Do you really want to Delete this record? \n Click 'Ok' to continue otherwise click 'Cancel'");
    if (answer) {
        //alert(answer +"..........."+ Component);
        console.log(Component);

        if (Component == 'Delete_labourSavingTechLookup')xajax_delete_labourSavingTechLookup(Keys, Component);
        if (Component == 'Delete_form8')xajax_delete_form8(Keys, Component);
        if (Component == 'Delete_form7')xajax_delete_farmers(Keys, Component);
        if (Component == 'Clean_form7')xajax_clean_form7_duplicates(Keys, Component);
        if (Component == 'Delete_form6')xajax_delete_form6(Keys, Component);
        if (Component == 'Clean_form6')xajax_clean_form6_duplicates(Keys, Component);
        if (Component == 'Delete_training')xajax_delete_training(Keys, Component);
        if (Component == 'Clean_form1')xajax_clean_form1_duplicates(Keys, Component);
        if (Component == 'Clean_form2_Enterprise')xajax_clean_form2_Enterprise(Keys, Component);
        if (Component == 'Clean_form2LabourSaving')xajax_clean_form2_LabourSaving(Keys, Component);
        if (Component == 'Clean_form2MediaPrograms')xajax_clean_form2_MediaPrograms(Keys, Component);
        if (Component == 'clean_form2_YouthApprenticeship')xajax_clean_form2_YouthApprenticeship(Keys, Component);


        if (Component == 'Delete_exporters_form3')xajax_delete_exporters_form3(Keys, Component);
        if (Component == 'Clean_exporters_form3')xajax_clean_form3_duplicates(Keys, Component);
        if (Component == 'Delete_traders_form4')xajax_delete_traders_form4(Keys, Component);
        if (Component == 'Clean_traders_form4')xajax_clean_form4_duplicates(Keys, Component);
        if (Component == 'Delete_form5')xajax_delete_form5(Keys, Component);

        if (Component == 'Delete_enterpriseTechAdoption')xajax_delete_enterpriseTechAdoption(Keys, Component);
        if (Component == 'Delete_labourSavingTech')xajax_delete_labourSavingTech(Keys, Component);
        if (Component == 'Delete_mediaPrograms')xajax_delete_mediaPrograms(Keys, Component);
        if (Component == 'Delete_youthApprentice')xajax_delete_youthApprentice(Keys, Component);
        if (Component == 'Delete_bds')xajax_delete_bds(Keys, Component);
        if (Component == 'Delete_bankLoans')xajax_delete_bankLoans(Keys, Component);
        if (Component == 'Delete_inputSales')xajax_delete_inputSales(Keys, Component);
        if (Component == 'Delete_phh')xajax_delete_phh(Keys, Component);
        if (Component == 'Delete_privatePartnerships')xajax_delete_partnerships(Keys, Component);


        if (Component == 'Delete_partnerships')xajax_delete_partnerships(Keys, Component);
        if (Component == 'Delete_farmers')xajax_delete_farmers(Keys, Component);
        if (Component == 'Delete_exporter')xajax_delete_exporter(Keys, Component);
        if (Component == 'Delete_trader')xajax_delete_trader(Keys, Component);
        if (Component == 'Delete_vAgent')xajax_delete_vAgent(Keys, Component);

        if (Component == 'Delete_Doc')xajax_delete_documents(Keys, Component);
        if (Component == 'Delete_submenuItem')xajax_delete_submenuItem(Keys, Component);
        if (Component == 'Delete_Allocation')xajax_Delete_Data_TeamAllocation(Keys, Component);
        if (Component == 'delete_users')xajax_delete_user(Keys, Component);
        if (Component == 'Delete_usersGroup')xajax_delete_usergroup(Keys, Component);
    }

}


function ConfirmDeleteOnSetup(Keys, Component) {
    var answer = confirm("You are about to delete a Setup  value, \n which could affect many related records. \n You can modify this record instead. \n Click 'Ok' to continue otherwise click 'Cancel'");
    if (answer) {

        if (Component == 'Delete_labourSavingTechLookup')xajax_delete_labourSavingTechLookup(Keys, Component);
        if (Component == 'Delete_traderModelsLookup')xajax_delete_traderModelsLookup(Keys, Component);
        if (Component == 'Delete_enterpriseTechnologiesLookup')xajax_delete_enterpriseTechnologiesLookup(Keys, Component);
        if (Component == 'Delete_actorsServedLookup')xajax_delete_actorsServedLookup(Keys, Component);
        if (Component == 'Delete_cropTreatmentsLookup')xajax_delete_cropTreatmentsLookup(Keys, Component);
        if (Component == 'Delete_cropVarieties')xajax_delete_cropVarieties(Keys, Component);
        if (Component == 'Delete_Districts')xajax_delete_myDistricts(Keys, Component);
        if (Component == 'Delete_Subcounties')xajax_delete_Subcounties(Keys, Component);
        if (Component == 'Delete_Parishes')xajax_delete_Parishes(Keys, Component);

        if (Component == 'Delete_menuItem')xajax_delete_menuItem(Keys, Component);


    }

}


function loadingIcon(Keys, Component) {
    $("#myLoader").show(function () {
        if (Component == 'save_vAgent')xajax_save_vAgent(Keys, Component);
        if (Component == 'shift_vAgent')xajax_shift_vAgent(Keys, Component);
        if (Component == 'save_trader')xajax_save_trader(Keys, Component);
        if (Component == 'shift_trader')xajax_shift_trader(Keys, Component);
        if (Component == 'save_exporter')xajax_save_exporter(Keys, Component);
        if (Component == 'save_form7')xajax_save_form7(Keys, Component);
        if (Component == 'search_analyzer')xajax_qAnalyzer_results(Keys, Component);
        if (Component == 'update_form7')xajax_update_form7(Keys, Component);

        if (Component == 'go_to_enterpriseTechAdoption')xajax_view_enterpriseTechAdoption(Keys, Component);
        if (Component == 'update_enterpriseTechAdoption')xajax_update_enterpriseTechAdoption(Keys, Component);
        if (Component == 'update_labourSavingTech')xajax_update_labourSavingTech(Keys, Component);
        if (Component == 'update_bds')xajax_update_bds(Keys, Component);
        if (Component == 'update_bankLoans')xajax_update_bankLoans(Keys, Component);
        if (Component == 'update_inputSales')xajax_update_inputSales(Keys, Component);
        if (Component == 'update_mediaPrograms')xajax_update_mediaPrograms(Keys, Component);
        if (Component == 'update_youthApprentice')xajax_update_youthApprentice(Keys, Component);
        if (Component == 'update_phh')xajax_update_phh(Keys, Component);
        if (Component == 'update_partnerships')xajax_update_partnerships(Keys, Component);

        if (Component == 'save_form3')xajax_save_form3(Keys, Component);
        if (Component == 'save_form4')xajax_save_form4(Keys, Component);
        if (Component == 'save_form5')xajax_save_form5(Keys, Component);
        if (Component == 'save_householdData')xajax_save_householdData(Keys, Component);
        if (Component == 'save_training')xajax_save_training(Keys, Component);
        if (Component == 'save_Newtraining')xajax_save_Newtraining(Keys);
        if (Component == 'save_Xtrapolation')xajax_save_extrapolation(Keys, Component);
        if (Component == 'save_Indicator')xajax_save_indicatorTwentyEight(Keys, Component);
        if (Component == 'save_lTwo')xajax_save_levelTwoIndicators(Keys, Component);
        if (Component == 'save_new_market_price_form')xajax_save_market_price(Keys, Component);



    })


}


function loadingIconPerformanceMaps(Id,Component){
    console.log("Id= "+Id+" Component ="+Component);
    $("#myLoader").show(function () {
        if (Component == 'load_performance_maps_indicator')xajax_DataPerformanceMaps(Id);
    });
}

function loadingIconFormOne(Component) {
    $("#dvLoading").show(function () {
        if (Component == 'go_to_form1_data_forms')xajax_form1_view_both_forms();
        if (Component == 'go_to_form1_legacy_form')xajax_new_training('', '', '', '');
        if (Component == 'go_to_form1_new_form')xajax_form1_newForm_training('', '', '', '', '');
    })
}


function loadingIconFormTwo(Component) {
    $("#dvLoading").show(function () {
        if (Component == 'go_to_enterpriseTechAdoption')xajax_view_enterpriseTechAdoption('', '', '', '', '', 1, 20);
        if (Component == 'go_to_labourSavingTech')xajax_view_labourSavingTech('', '', '', 1, 20);
        if (Component == 'go_to_mediaPrograms')xajax_view_mediaPrograms('', '', '', '', 1, 20);
        if (Component == 'go_to_youthApprentice')xajax_view_youthApprentice('', '', '', 1, 20);
        if (Component == 'go_to_bds')xajax_view_bds('', '', '', 1, 20);
        if (Component == 'go_to_bankLoans')xajax_view_bankLoans('', '', '', '', 1, 20);
        if (Component == 'go_to_inputSales')xajax_view_inputSales('', '', '', 1, 20);
        if (Component == 'go_to_phh')xajax_view_phh('', '', '', 1, 20);
        if (Component == 'go_to_partnerships')xajax_view_partnerships('', '', '', '', 1, 20);
    })
}


function loadingIconFormSix(Component) {
    $("#dvLoading").show(function () {
        if (Component == 'go_to_form6_web_form')xajax_view_form6_web_form('', '', '', '', 1, 1000);

        if (Component == 'go_to_form6_web_form')xajax_view_form6_web_form('', '', '', '', 1, 1000);
        if (Component == 'go_to_form6_survey_one')xajax_view_form6_survey_one('', '', '2014-10-01', '2015-03-31', '', 1, 1000);
        if (Component == 'go_to_form6_survey_two')xajax_view_form6_survey_two('', '', '2015-04-01', '2015-09-30', '', 1, 1000);
        if (Component == 'go_to_form6_survey_three')xajax_view_form6_survey_three('', '', '2015-10-01', '2016-03-31', '', 1, 1000);
        if (Component == 'go_to_form6_survey_four')xajax_view_form6_survey_four('', '', '2016-04-01', '2016-09-30', '', 1, 1000);
        if (Component == 'go_to_form6_survey_five')xajax_view_form6_survey_five('', '', '2016-10-01', '2017-03-31', '', 1, 1000);
        if (Component == 'go_to_form6_survey_six')xajax_view_form6_survey_six('', '', '2017-04-01', '2017-09-30', '', 1, 1000);
        if (Component == 'go_to_form6_survey_seven')xajax_view_form6_survey_seven('', '', '', '', '', 1, 1000);
        if (Component == 'go_to_frm6Survey2016')xajax_view_frm6Survey2016('', '', '', '', '', 1, 50);
    })
}


function loadingIconSearch(Keys, Component, div) {
    $("#searchLoader").show(function () {
        if (Component == 'search_analyzer')xajax_qAnalyzer_results(Keys, Component, div);
    })
}


function loadingIconDataform(dataForm, rPeriod, Component) {
    $("#dataFormLoader").show(function () {
        if (Component == 'data_form_loader')xajax_view_dataAnalysis(dataForm, rPeriod, Component);
    })
}


function checkform(form) {


    if (form.name.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.name.focus();
        return false;
    }
    else if (form.name2.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.name2.focus();
        return false;
    }
    else if (form.reg_no.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.reg_no.focus();
        return false;
    }
    else if (form.student_no.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.student_no.focus();
        return false;
    }
    else if (form.DOB.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.DOB.focus();
        return false;
    }
    else if (form.faculty.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.faculty.focus();
        return false;
    }
    else if (form.course.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.course.focus();
        return false;
    }
    else if (form.hall.value == "") {
        alert("Please Fill in all the Fields Marked (*).");
        form.hall.focus();
        return false;
    }

    if (!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(form.email.value)) {
        alert("Invalid E-mail Address! Please re-enter.");
        form.email.focus();
        return false;
    }


    //
    return true;
}
var letters = ' ABCÇDEFGHIJKLMNÑOPQRSTUVWXYZabcçdefghijklmnñopqrstuvwxyzàáÀÁéèÈÉíìÍÌïÏóòÓÒúùÚÙüÜ	';
var numbers = '1234567890';
var signs = ',.:;@-\'';
var mathsigns = ' +-=()*/';
var custom = '<>#$%&?¿';
function alpha(e, allow) {
    var k;
    k = document.all ? parseInt(e.keyCode) : parseInt(e.which);
    return (allow.indexOf(String.fromCharCode(k)) != -1);
}


function getElementName(elementName, checkbox_name) {

    var elementToBeActivated = document.getElementsByName(elementName);
    var element = document.getElementsByName(checkbox_name);
    var x;
    for (x = 0; x < element.length; x++) {
        if (element[x].type == "checkbox") {
            if (element[x].checked == true) {
                var i;
                for (i = 0; i < elementToBeActivated.length; i++) {
                    if (elementToBeActivated[i].type == "checkbox") {

                        elementToBeActivated[i].disabled = false;

                    }
                }

                break;
            } else {
                var i;
                for (i = 0; i < elementToBeActivated.length; i++) {
                    if (elementToBeActivated[i].type == "checkbox") {

                        elementToBeActivated[i].disabled = true;

                    }
                }

            }
        }

    }
}


function getElementNameEdit(elementName, checkbox_name) {
    //console.log(elementName);

    var elementToBeActivated = document.getElementsByName(elementName);
    var element = document.getElementsByName(checkbox_name);
    var x;
    for (x = 0; x < element.length; x++) {
        if (element[x].type == "checkbox") {
            if (element[x].checked == true) {
                var i;
                for (i = 0; i < elementToBeActivated.length; i++) {
                    if (elementToBeActivated[i].type == "checkbox") {

                        elementToBeActivated[i].disabled = false;

                    }
                }

                break;
            } else {
                var i;
                for (i = 0; i < elementToBeActivated.length; i++) {
                    if (elementToBeActivated[i].type == "checkbox") {
                        if (elementToBeActivated[i].checked == true) {
                            elementToBeActivated[i].checked = false;
                        } else {
                            elementToBeActivated[i].disabled = true;
                        }


                    }
                }

            }
        }


    }
}


function getElementNameMultiple(elementName, checkbox_name) {


    var elementToBeActivated = document.getElementsByName(elementName);
    var array_elements = ['lp[]', 'mpe[]', 'ep[]', 'sc[]'];
    var y;
    var check = 0;
    outer_loop:
        for (y = 0; y < array_elements.length; y++) {

            var element = document.getElementsByName(array_elements[y]);
            var x;
            for (x = 0; x < element.length; x++) {
                if (element[x].type == "checkbox") {
                    if (element[x].checked == true) {
                        var i;
                        for (i = 0; i < elementToBeActivated.length; i++) {
                            if (elementToBeActivated[i].type == "checkbox") {

                                elementToBeActivated[i].disabled = false;
                                //elementToBeActivated[i].checked = true;
                                //console.log(element);

                            }
                        }
                        check = 0;
                        break outer_loop;
                    } else {
                        check = 1;
                    }
                }


            }
        }
    if (check == 1) {

        var i;
        for (i = 0; i < elementToBeActivated.length; i++) {
            if (elementToBeActivated[i].type == "checkbox") {
                if (elementToBeActivated[i].checked == true) {
                    elementToBeActivated[i].checked = false;
                    elementToBeActivated[i].disabled = true;
                } else {
                    elementToBeActivated[i].disabled = true;
                }


            }
        }


    }

}


function loadEditformone() {
    getElementNameEdit('training_receveid_pva[]', 'pva[]');
    getElementNameEdit('training_receveid_eacmgs[]', 'eacmgs[]');
    getElementNameEdit('training_receveid_eacbgs[]', 'eacbgs[]');
    getElementNameEdit('training_receveid_cpp[]', 'cpp[]');
    getElementNameEdit('training_receveid_ai[]', 'ai[]');
    getElementNameMultiple('training_receveid_lp_mpe_ep_sc[]', 'lp[]');


}



