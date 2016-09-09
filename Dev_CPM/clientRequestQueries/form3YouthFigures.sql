SELECT 
	`x`.`exporterName`,
	`x`.`exporterDob`, 
	ROUND((DATEDIFF(CURDATE(), `x`.`exporterDob`) / 365.25),1) as exporterAge,
	`x`.`exporterCode`,
	`x`.`exporterSex`,
	`d`.`districtName`,
	`s`.`subcountyName`,
	`x`.`exporterVillage`,
	`w` .`reportingPeriod`,
	`w` .`exTradersSupplyChain`,
	`w` .`exTradersSupplyChainDetails`, 
	`w` .`exUnionSupplyChain`,
	`w` .`exUnionsSupplyChainDetails`,
	`w` .`volMaizePurchased`,
	`w` .`volMaizePurchasedDetails`,
	`w` .`volCoffeePurchased`, 
	`w` .`volCoffeePurchasedDetails`, 
	`w` .`volBeansPurchased`, 
	`w` .`volBeansPurchasedDetails`,
	`w` .`volMaizeEx`,
	`w` .`volMaizeExDetails`,
	`w` .`volCoffeeEx`,
	`w` .`volCoffeeExDetails`,
	`w` .`volBeansEx`, 
	`w` .`volBeansExDetails`,
	`w` .`epayRecieved`, 
	`w` .`epayRecievedDetails`,
	`w` .`epayMade`,
	`w` .`epayMadeDetails`,
	`w` .`storageCapNew`,
	`w` .`storageCapNewDetails`,
	`w` .`storageCapImproved`,
	`w` .`storageCapImprovedDetails`,
	`w` .`CompiledBy`,
	`w` .`ReviewedBy`,
	`w` .`SubmittedBy`,
	`w` .`DateSubmission`,
	`w` .`updatedby`,
	`w` .`year`,
	`w` .`dateCompiled`,
	`w` .`epayMadeFifthQuarterMonth`,
	`w` .`epayMadeFirstQuarterMonth`,
	`w` .`epayMadeFourthQuarterMonth`,
	`w` .`epayMadeSecondQuarterMonth`,
	`w` .`epayMadeSixthQuarterMonth`,
	`w` .`epayMadeThirdQuarterMonth`, 
	`w` .`epayRecievedFifthQuarterMonth`,
	`w` .`epayRecievedFirstQuarterMonth`,
	`w` .`epayRecievedFourthQuarterMonth`,
	`w` .`epayRecievedSecondQuarterMonth`,
	`w` .`epayRecievedSixthQuarterMonth`,
	`w` .`epayRecievedThirdQuarterMonth`,
	`w` .`exTradersSupplyChainFifthQuarterMonth`,
	`w` .`exTradersSupplyChainFirstQuarterMonth`,
	`w` .`exTradersSupplyChainFourthQuarterMonth`, 
	`w` .`exTradersSupplyChainSecondQuarterMonth`,
	`w` .`exTradersSupplyChainSixthQuarterMonth`,
	`w` .`exTradersSupplyChainThirdQuarterMonth`, 
	`w` .`exUnionSupplyChainFifthQuarterMonth`,
	`w` .`exUnionSupplyChainFirstQuarterMonth`,
	`w` .`exUnionSupplyChainFourthQuarterMonth`,
	`w` .`exUnionSupplyChainSecondQuarterMonth`,
	`w` .`exUnionSupplyChainSixthQuarterMonth`,
	`w` .`exUnionSupplyChainThirdQuarterMonth`,
	`w` .`personInterviewed`,
	`w` .`telephoneInterviewed`,
	`w` .`titleCompiledBy`, 
	`w` .`titleOfPersonInterviewed`,
	`w` .`volBeansExFifthQuarterMonth`,
	`w` .`volBeansExFirstQuarterMonth`,
	`w` .`volBeansExFourthQuarterMonth`,
	`w` .`volBeansExSecondQuarterMonth`,
	`w` .`volBeansExSixthQuarterMonth`, 
	`w` .`volBeansExThirdQuarterMonth`,
	`w` .`volBeansExUgx`,
	`w` .`volBeansExUgxDetails`, 
	`w` .`volBeansExUgxFifthQuarterMonth`,
	`w` .`volBeansExUgxFirstQuarterMonth`,
	`w` .`volBeansExUgxFourthQuarterMonth`,
	`w` .`volBeansExUgxSecondQuarterMonth`,
	`w` .`volBeansExUgxSixthQuarterMonth`,
	`w` .`volBeansExUgxThirdQuarterMonth`,
	`w` .`volBeansPurchasedFifthQuarterMonth`,
	`w` .`volBeansPurchasedFirstQuarterMonth`,
	`w` .`volBeansPurchasedFourthQuarterMonth`, 
	`w` .`volBeansPurchasedSecondQuarterMonth`,
	`w` .`volBeansPurchasedSixthQuarterMonth`,
	`w` .`volBeansPurchasedThirdQuarterMonth`,
	`w` .`volCoffeeExFifthQuarterMonth`,
	`w` .`volCoffeeExFirstQuarterMonth`,
	`w` .`volCoffeeExFourthQuarterMonth`,
	`w` .`volCoffeeExSecondQuarterMonth`,
	`w` .`volCoffeeExSixthQuarterMonth`,
	`w` .`volCoffeeExThirdQuarterMonth`,
	`w` .`volCoffeeExUgx`, 
	`w` .`volCoffeeExUgxDetails`, 
	`w` .`volCoffeeExUgxFifthQuarterMonth`,
	`w` .`volCoffeeExUgxFirstQuarterMonth`,
	`w` .`volCoffeeExUgxFourthQuarterMonth`,
	`w` .`volCoffeeExUgxSecondQuarterMonth`,
	`w` .`volCoffeeExUgxSixthQuarterMonth`,
	`w` .`volCoffeeExUgxThirdQuarterMonth`,
	`w` .`volCoffeePurchasedFifthQuarterMonth`,
	`w` .`volCoffeePurchasedFirstQuarterMonth`,
	`w` .`volCoffeePurchasedFourthQuarterMonth`,
	`w` .`volCoffeePurchasedSecondQuarterMonth`,
	`w` .`volCoffeePurchasedSixthQuarterMonth`,
	`w` .`volCoffeePurchasedThirdQuarterMonth`, 
	`w` .`volMaizeExFifthQuarterMonth`,
	`w` .`volMaizeExFirstQuarterMonth`, 
	`w` .`volMaizeExFourthQuarterMonth`,
	`w` .`volMaizeExSecondQuarterMonth`, 
	`w` .`volMaizeExSixthQuarterMonth`,
	`w` .`volMaizeExThirdQuarterMonth`,
	`w` .`volMaizeExUgx`,
	`w` .`volMaizeExUgxDetails`, 
	`w` .`volMaizeExUgxFifthQuarterMonth`,
	`w` .`volMaizeExUgxFirstQuarterMonth`, 
	`w` .`volMaizeExUgxFourthQuarterMonth`,
	`w` .`volMaizeExUgxSecondQuarterMonth`,
	`w` .`volMaizeExUgxSixthQuarterMonth`,
	`w` .`volMaizeExUgxThirdQuarterMonth`, 
	`w` .`volMaizePurchasedFifthQuarterMonth`,
	`w` .`volMaizePurchasedFirstQuarterMonth`,
	`w` .`volMaizePurchasedFourthQuarterMonth`,
	`w` .`volMaizePurchasedSecondQuarterMonth`, 
	`w` .`volMaizePurchasedSixthQuarterMonth`,
	`w` .`volMaizePurchasedThirdQuarterMonth`
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
	AND `w`.`display`='Yes'
	ORDER BY w.`tbl_form3_exportersId` DESC