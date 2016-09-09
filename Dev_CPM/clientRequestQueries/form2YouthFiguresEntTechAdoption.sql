SELECT 
`x`.`traderName`,
`x`.`traderDob`, 
ROUND((DATEDIFF(CURDATE(), `x`.`traderDob`) / 365.25),1) as traderAge,
concat (SPACE(4),`x`.`traderCode`) as `traderCode`,
`x`.`traderSex`, 
`z`.`zoneName` as `traderRegion`,
`d`.`districtName` as `traderDistrict`,
`s`.`subcountyName` as `traderSubcounty`,
`x`.`traderVillage`,
substring(`t`.`valueChain`, 3) as `ValueChain`, 
`t`.`reportingPeriod`,
`t`.`businessLocation`,
`t`.`durationWithActivity`,
`t`.`nameOfImprovedTech`, 
`t`.`techAdoptedInReportingPeriod`,
`t`.`techContinuedFromPast`,
`t`.`amountInvestedInTechAdoption`,
`t`.`jobsCreatedFemaleNew`,
`t`.`jobsCreatedFemaleOld`, 
`t`.`jobsCreatedMaleNew`,
`t`.`jobsCreatedMaleOld`,
`t`.`jobsCreatedTotalNew`,
`t`.`jobsCreatedTotalOld`,
`t`.`CompiledBy`,
`t`.`ReviewedBy`,
`t`.`SubmittedBy`,
`t`.`DateSubmission`, 
`t`.`updatedby`,
`t`.`code`, 
`t`.`typeOfBusiness`,
`t`.`year`,
`t`.`reportingMonth`,
tj.`dateOfEngagement` as `dateOfEngagement`,
tj.`nameOfJobHolder` as `nameOfJobHolder`,
tj.`sexOfJobHolder` as `sexOfJobHolder`, 
tj.`timeSpentOnJob` as `timeSpentOnJob`

FROM `tbl_techadoption` t join  `tbl_tech_adoption_jobHolder` tj
on (`t`.`tbl_techadoptionId` = `tj`.`techAdoption_id`),
`tbl_traders` x,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`

WHERE x.`tbl_tradersId`=t.`businessTraderName`
and `d`.`zone`=`z`.`zoneCode`
and `x`.`traderDistrict` = `d`.`districtCode`
and `x`.`traderSubcounty` = `s`.`subcountyCode`
and `s`.`districtCode`=`d`.`districtCode`
order by t.`tbl_techadoptionId` DESC