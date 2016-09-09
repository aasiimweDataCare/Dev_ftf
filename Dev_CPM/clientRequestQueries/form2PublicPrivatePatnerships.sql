select `p`.*,
`Pj`.`dateOfEngagement` as `dateOfEngagement_Pj`,
`Pj`.`nameOfJobHolder` as `nameOfJobHolder_Pj`,
`Pj`.`sexOfJobHolder` as `sexOfJobHolder_Pj`, 
`Pj`.`timeSpentOnJob` as `timeSpentOnJob_Pj` 
from `tbl_public_private_partnership` as `p` join tbl_partnership_jobHolder as `Pj`
on (`p`.`tbl_partnershipId` = `Pj`.`partnership_id`) 
order by `p`.`tbl_partnershipId` desc