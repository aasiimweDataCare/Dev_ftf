<?php

UPDATE `tbl_phh_meta_data` 
	SET 	
	`amountInvestedInRefurbishing`='".floatval($amountInvestedInRefurbishing_other_children)."',
	`assistanceRenderedByActivity`='".$assistanceRenderedByActivity_other_children."',
	`compiledBy`='".$CompiledBy_other_children."', 
	`dateOfEngagement`='".$qmobj->cleanDirtyDates_Form2Edits($dateOfEngagement_other_children)."',
	`dateSubmission`='".$qmobj->cleanDirtyDates_Form2Edits($end_date_default_other_children)."',
	`nameOfJobHolder`='".$nameOfJobHolder_other_children."', 
	`sizeOfStoreRefurbished`='".$qmobj->validateRequiredNumericInput_Form2Edits($sizeOfStoreRefurbished_other_children)."', 
	`storageTypeForColdChain`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForColdChain_other_children)."',
	`storageTypeForDryGoods`='".$qmobj->validateRequiredNumericInput_Form2Edits($storageTypeForDryGoods_other_children)."', 
	`reportingPeriod`='".$reportinPeriod_other_children."',
	`reviewedBy`='".$CompiledBy_other_children."', 
	`sexOfJobHolder`='".$sexOfJobHolder_other_children."', 
	`submittedBy`='".$CompiledBy_other_children."',
	`timeSpentOnJob`='".$timeSpentOnJob_other_children."', 
	`updatedby`='".$CompiledBy_other_children."', 
	`valueChain`='".$valueChain_other_children."', 
	`year`='".$year_other_children."',
	`phh_id`='".$tbl_phh_id."', 
	`reportingMonth`='".$reportingMonth_other_children."' 

	WHERE `id`='".$tbl_id_first_row."'
	and `phh_id`='".$tbl_phh_id."'
