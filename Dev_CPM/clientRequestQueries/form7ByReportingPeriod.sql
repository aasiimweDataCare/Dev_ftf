SELECT 
`f`.`tbl_farmersId`,
case
	when `f`.`reportingPeriod` = 'Apr - Sep 2015' then 'Apr 2015 - Sep 2015'
else 'null'
end 
as  `reportingPeriod`,
`f`.`groupName`,
`g`.`groupType`,
`g`.`groupCode`,
`g`.`dateGroupStarted` as `DateStartedWorkingWithGroup`,
`g`.`groupStatus`,
`z`.`zoneName`,
`d`.`districtName`,
`s`.`subcountyName`, 
`f`.`farmersVillage`,
`f`.`farmersName`, 
`f`.`memberDstart` as `DateStartedWorkingWithMember`,
`f`.`memberStatus`, 
TIMESTAMPDIFF(YEAR,`f`.`farmersDob`,CURDATE()) AS `FarmerAge`,
`f`.`farmersSex`, 
`f`.`farmersTel`, 
`f`.`hhName` as `NameHouseholdHead`,
TIMESTAMPDIFF(YEAR,`f`.`hhDob`,CURDATE()) AS `houseHoldHeadAge`,
`f`.`hhSex` as `houseHoldHeadSex`, 
`f`.`hhHeadDStart` as `houseHoldHeadDateStartedWorking`, 
`f`.`hhArea` as `TotalAreaAvailableForCropping(Acres)`,
`f`.`hsComposition` as `houseHoldComposition`
FROM 
`tbl_farmers` as `f`,
`tbl_villageagent_groups` as `g`,
`tbl_subcounty` as `s`, 
`tbl_district` as `d`,
`tbl_zone` as `z`
WHERE `f`.`reportingPeriod` like 'Apr - Sep 2015%'
and `g`.`tbl_villageagent_groupsId` = `f`.`tbl_villageagent_groupsId`
and `d`.`zone` = `z`.`zoneCode`
and `f`.`farmersDistrict` = `d`.`districtCode`
and `f`.`farmersSubcounty`= `s`.`subcountyCode` 
and `f`.`display`='Yes'