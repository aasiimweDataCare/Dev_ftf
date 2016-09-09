select  `f` .`farmersName`,
`f` .`reportingPeriod`,
`f` .`groupName`,

`f` .`farmersDistrict`, 
`f` .`farmersSubcounty`,

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
from tbl_farmers as `f` 
order by `f`.`tbl_farmersId` desc
