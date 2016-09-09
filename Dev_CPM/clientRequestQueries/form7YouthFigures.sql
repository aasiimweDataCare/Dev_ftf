select  `f` .`farmersName`,
`f` .`reportingPeriod`,
`f` .`groupName`,
`z`.`zoneName`,
`d`.`districtName`,
`s`.`subcountyName`,
`f` .`memberDstart`, 
`f` .`memberStatus`,
`f` .`farmersDob`, 
ROUND((DATEDIFF(CURDATE(), `f` .`farmersDob`) / 365.25),1) as farmerAge,
`f` .`farmersVillage`,
`f` .`farmersSex`,
`f` .`farmersTel`,
`f` .`hhName`,
`f` .`hhDob`,
ROUND((DATEDIFF(CURDATE(), `f` .`hhDob`) / 365.25),1) as householdheadAge,
`f` .`hhSex`, 
`f` .`hhHeadDStart`, 
`f` .`hhArea`,
`f` .`hsComposition`, 
`f` .`farmers_e_pay`
from tbl_farmers as `f`,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s` 

where `d`.`districtCode`=`f` .`farmersDistrict`
AND `s`.`subcountyCode` = `f` .`farmersSubcounty`
AND `d`.`districtCode` = `s`.`districtCode`
AND `z`.`zoneCode` = `d`.`zone`
AND `s`.`Display`='Yes' 
order by `f`.`tbl_farmersId` desc
