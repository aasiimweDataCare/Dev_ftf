SELECT `s`.*,
`sm`.*, 
ROUND((DATEDIFF(CURDATE(), `t`.`traderDob`) / 365.25),1) as traderAge,
concat (SPACE(4),`t`.`traderCode`) as `traderCode`,
`t`.`traderSex`, 
`z`.`zoneName` as `traderRegion`,
`d`.`districtName` as `traderDistrict`,
`sb`.`subcountyName` as `traderSubcounty`,
`t`.`traderVillage`
FROM `tbl_input_sales` as `s` 
join `tbl_traders` as `t` on (t.`traderName`=s.`nameOfMiddleValueChainActor`),
`tbl_input_sales_meta_data` as `sm`,  
`tbl_traders` x,
`tbl_zone` as `z`,
`tbl_district` as `d`,
`tbl_subcounty` as `sb`
where `s`.`id`=`sm`.`input_sales_id`
and `d`.`zone`=`z`.`zoneCode`
and `t`.`traderDistrict` = `d`.`districtCode`
and `t`.`traderSubcounty` = `sb`.`subcountyCode`
and `sb`.`districtCode`=`d`.`districtCode`
group by `s`.`id` order by `s`.`id` desc


