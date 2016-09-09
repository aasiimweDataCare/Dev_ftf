select 
`p`.`tbl_participantId`,
`p`.`name`,
`p`.`age`,
`p`.`sex`,
`p`.`status`, 
`p`.`village`, 
`l`.`codeName` as `IndividualType`,
`p`.`telephone`
from (`tbl_participants` as `p`, `tbl_training` as `t`, `tbl_lookup`  as `l` )
where `p`.`trainingId`=`t`.`tbl_trainingId`
and `p`.`typeOfIndividual` = `l`.`code`
and `l`.`classCode` = '25'
and  `t`.`trainingDate` >= '2013-10-01'
and  `p`.`display` = 'Yes'
and CHAR_LENGTH(`p`.`telephone`) <= 4 
order by `p`.`name` asc