function ConfirmDelete(Keys,Component,org_code) {
var answer= confirm("Are you sure you want to Delete? \n Click 'Ok' to continue otherwise click 'Cancel'");
	if (answer){
	//alert(answer +"..........."+ Component);
	//if(Component=='valueChainDevelopment')xajax_delete_ConfirmedComponent(Keys,Component,org_code);
	if(Component=='valueChainDevelopment')xajax_delete_valueChainDevelopment(Keys,org_code);
	if(Component=='LineOfCredit')xajax_delete_lineofcredit(Keys,org_code);
	if(Component=='MOU')xajax_delete_mou(Keys,org_code);
	if(Component=='Grant')xajax_delete_grant(Keys,org_code);
	if(Component=='Branches')xajax_delete_branch(Keys,org_code);
	if(Component=='FinancialActuals108')xajax_delete_financialActuals(Keys,org_code);
	if(Component=='subsector1')xajax_delete_subsector(Keys);
	if(Component=='intervention')xajax_delete_intervention(Keys);
	if(Component=='delete_organization')xajax_delete_organization(Keys);
	if(Component=='delete_users')xajax_delete_user(Keys);
	if(Component=='delete_relatedlink')xajax_delete_relatedlink(Keys);
	if(Component=='delete_abitrust_results')xajax_delete_abiTrustResults(Keys);
	if(Component=='delete_district1')xajax_delete_district(Keys);
		if(Component=='delete_document')xajax_delete_document(Keys);
			if(Component=='Delete_home')xajax_delete_home(Keys);
			if(Component=='Delete_Narrative')xajax_delete_data(Keys,'narrative_id','tbl_narrative');
			if(Component=='Delete_Indicator')xajax_delete_indicator(Keys);
			if(Component=='Delete_DCEDAnnualTarget')xajax_Delete_DCEDAnnualTarget(Keys);
			if(Component=='Delete_DCEDAnnualActual')xajax_Delete_DCEDAnnualActual(Keys);
			if(Component=='Delete_DCEDAnnualActual_Manager')xajax_Delete_DCEDAnnualActual_Manager(Keys);
			
	}
}
