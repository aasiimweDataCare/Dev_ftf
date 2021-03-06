SELECT 
`x`.`traderName`,
`x`.`traderDob`, 
ROUND((DATEDIFF(CURDATE(), `x`.`traderDob`) / 365.25),1) as traderAge,
concat (SPACE(4),`x`.`traderCode`) as `traderCode`,
`x`.`traderSex`, 
`d`.`districtName`,
`s`.`subcountyName`,
`x`.`traderVillage`, 
`w` .`year`,
`w` .`reportingPeriod`,
`w` .`vaSupplyChain`,
`w` .`vaSupplyChainDetails`,
`w` .`numCbo`,
`w` .`numCboDetails`,
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
`w` .`storageCapImproved`, `storageCapImprovedDetails`,
`w` .`CompiledBy`, 
`w` .`ReviewedBy`, 
`w` .`SubmittedBy`,
`w` .`DateSubmission`, 
`w` .`updatedby`, 
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
`w` .`numCboFifthQuarterMonth`,
`w` .`numCboFirstQuarterMonth`, 
`w` .`numCboFourthQuarterMonth`,
`w` .`numCboSecondQuarterMonth`,
`w` .`numCboSixthQuarterMonth`,
`w` .`numCboThirdQuarterMonth`, 
`w` .`personInterviewed`,
`w` .`telephoneInterviewed`,
`w` .`titleCompiledBy`,
`w` .`titleOfPersonInterviewed`,
`w` .`vaSupplyChainFifthQuarterMonth`,
`w` .`vaSupplyChainFirstQuarterMonth`, 
`w` .`vaSupplyChainFourthQuarterMonth`,
`w` .`vaSupplyChainSecondQuarterMonth`,
`w` .`vaSupplyChainSixthQuarterMonth`,
`w` .`vaSupplyChainThirdQuarterMonth`,
`w` .`volBeansExFifthQuarterMonth`,
`w` .`volBeansExFirstQuarterMonth`,
`w` .`volBeansExFourthQuarterMonth`,
`w` .`volBeansExSecondQuarterMonth`,
`w` .`volBeansExSixthQuarterMonth`,
`w` .`volBeansExThirdQuarterMonth`, 
`w` .`volBeansExUgx`, `volBeansExUgxDetails`,
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
`w` .`volMaizeExFifthQuarterMonth`,
`w` .`volMaizeExFirstQuarterMonth`,
`w` .`volMaizeExFourthQuarterMonth`,
`w` .`volMaizeExSecondQuarterMonth`,
`w` .`volMaizeExSixthQuarterMonth`,
`w` .`volMaizeExThirdQuarterMonth`,
`w` .`volMaizeExUgx`,
`w` . `volMaizeExUgxDetails`, 
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
AND `w`.`display`='Yes'
ORDER BY w.`tbl_form4_tradersId` DESC