SELECT 
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

`x`.`exUnionSupplyChainFifthQuarterMonth` as `exUSCFifthQM`, 
`x`.`exUnionSupplyChainFirstQuarterMonth` as `exUSCFirstQM`, 
`x`.`exUnionSupplyChainFourthQuarterMonth` as `exUSCFourthQM`, 
`x`.`exUnionSupplyChainSecondQuarterMonth` as `exUSCSecondQM`, 
`x`.`exUnionSupplyChainSixthQuarterMonth` as `exUSCSixthQM`,  
`x`.`exUnionSupplyChainThirdQuarterMonth` as `exUSCThirdQM`,

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

WHERE `x`.`tbl_form3_exportersId`=14
and `x`.`reportingPeriod`<>'' or `x`.`reportingPeriod`<>null
