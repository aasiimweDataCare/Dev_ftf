select `p`.`name` as `participantName`,
`p`.`age` as `Age`,
`p`.`sex` as `Gender`,
`p`.`status`,
`lp`.codeName as `TypeOfIndividualTrained`,
`p`.`telephone`,
`z`.`zoneName`,
`d`.`districtName`,
`s`.`subcountyName`,
`pr`.`ParishName`,
`t`.trainingVillage as `village`,
`t`.`trainingDate`,
substring(c.`name`, 3) as `ValueChain`, 
substring(f.`focusName`, 3) as `Training Focus`, 
substring(a.`audienceName`, 3) as `TargetAudience`,
t.`pat_recommendations` as `Recommendations`
from `tbl_participants` as `p` 
join `tbl_training` as `t` on (t.`tbl_trainingId`  = p.`trainingId`),
`tbl_lookup` as `lp`,
`tbl_mainvaluechain` as `c`,
`tbl_trainingfocus` as `f`,
`tbl_targetaudience` as `a`,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `s`,
`tbl_parish` as `pr`
where `t`.mainValueChain = `c`.`tbl_chainId`
and `t`.`trainingFocus` = `f`.`tbl_focusId`
and `t`.`targetAudience` = `a`.`tbl_audienceId`
and `d`.`zone`=`z`.`zoneCode`
and `t`.`district` = `d`.`districtCode`
and `t`.`subcounty` = `s`.`subcountyCode`
and `s`.`districtCode`=`d`.`districtCode`
and `t`.`parish` = `pr`.`ParishCode`
and `pr`.`SubcountyCode` = `s`.`subcountyCode`
and `lp`.`classCode` = '25'
and `lp`.`code` = `p`.`typeOfIndividual`
order by `t`.`tbl_trainingId` desc