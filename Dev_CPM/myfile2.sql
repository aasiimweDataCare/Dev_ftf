`b`.`beans_acreage`,
case
	when `b`.`beans_mapped` = '1' then 'Yes'
	when `b`.`beans_mapped` = '0' then 'No'
else 'null'
end 
as `beans_mapped`,
case
	when `b`.`beans_improved_seeds` = '1' then 'Yes'
	when `b`.`beans_improved_seeds` = '0' then 'No'
else 'null'
end 
as `beans_improved_seeds`,
`b`.`beans_improved_acreage`, 
case
	when `b`.`beans_improved_acreage_mapped` = '1' then 'Yes'
	when `b`.`beans_improved_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `beans_improved_acreage_mapped`,
`b`.`beans_improved_cost`,
case
	when `b`.`beans_seed_supplier` = '1' then 'Stockist through VARM'
	when `b`.`beans_seed_supplier` = '2' then 'Village Agents'
	when `b`.`beans_seed_supplier` = '3' then 'Stockist'
	when `b`.`beans_seed_supplier` = '4' then 'Others'
else 'null'
end 
as `beans_seed_supplier`,
`b`.`beans_seed_supplier_other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_benefits`, '1', 'Good yields,')), 
(replace(`b`.`beans_benefits`, '2', 'Reduced costs,')), 
(replace(`b`.`beans_benefits`, '3', 'Labour saving,')), 
(replace(`b`.`beans_benefits`, '4', 'None,')),
(replace(`b`.`beans_benefits`, '5', 'Better quality,')),
(replace(`b`.`beans_benefits`, '6', 'Disease Resistance,')),
(replace(`b`.`beans_benefits`, '7', 'Early Maturity,')),
(replace(`b`.`beans_benefits`, '8', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as  `beans_benefits`,
`b`.`beans_benefits_other`,
`b`.`beans_fetilizer_use`,
case
	when `b`.`beans_acreage_fertilizer` is not null then 'Yes'
else 'No'
end 
as `beans_fetilizer_use`,
`b`.`beans_acreage_fertilizer`,
`b`.`beans_fertilizer_cost`,
case
	when `b`.`beans_fertilizer_supplier` = '1' then 'Stockist through VARM'
	when `b`.`beans_fertilizer_supplier` = '2' then 'Village Agents'
	when `b`.`beans_fertilizer_supplier` = '3' then 'Stockist'
	when `b`.`beans_fertilizer_supplier` = '4' then 'Others'
else 'null'
end 
as `beans_fertilizer_supplier`,
`b`.`beans_fertilizer_supplier_other`, 
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_fertilizer_benefits`, '1', 'Good yields,')), 
(replace(`b`.`beans_fertilizer_benefits`, '2', 'Reduced costs,')), 
(replace(`b`.`beans_fertilizer_benefits`, '3', 'Labour saving,')), 
(replace(`b`.`beans_fertilizer_benefits`, '4', 'None,')),
(replace(`b`.`beans_fertilizer_benefits`, '5', 'Better quality,')),
(replace(`b`.`beans_fertilizer_benefits`, '6', 'Disease Resistance,')),
(replace(`b`.`beans_fertilizer_benefits`, '7', 'Early Maturity,')),
(replace(`b`.`beans_fertilizer_benefits`, '8', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as  `beans_fertilizer_benefits`,
`b`.`beans_fertilizer_benefits_other`,
case
	when `b`.`beans_chemical_use` = '1' then 'Yes'
	when `b`.`beans_chemical_use` = '0' then 'No'
else 'null'
end 
as `beans_chemical_use`,
`b`.`beans_chemical_acreage`,
case
	when `b`.`beans_chemical_acreage_mapped` = '1' then 'Yes'
	when `b`.`beans_chemical_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `beans_chemical_acreage_mapped`,
`b`.`beans_chemical_cost`, 
case
	when `b`.`beans_chemical_supplier` = '1' then 'Stockist through VARM'
	when `b`.`beans_chemical_supplier` = '2' then 'Village Agents'
	when `b`.`beans_chemical_supplier` = '3' then 'Stockist'
	when `b`.`beans_chemical_supplier` = '4' then 'Others'
else 'null'
end 
as `beans_chemical_supplier`,
`b`.`beans_chemical_supplier_other`, 
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_chemical_benefits`, '1', 'Good yields,')), 
(replace(`b`.`beans_chemical_benefits`, '2', 'Reduced costs,')), 
(replace(`b`.`beans_chemical_benefits`, '3', 'Labour saving,')), 
(replace(`b`.`beans_chemical_benefits`, '4', 'None,')),
(replace(`b`.`beans_chemical_benefits`, '5', 'Better quality,')),
(replace(`b`.`beans_chemical_benefits`, '6', 'Disease Resistance,')),
(replace(`b`.`beans_chemical_benefits`, '7', 'Early Maturity,')),
(replace(`b`.`beans_chemical_benefits`, '8', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as  `beans_chemical_benefits`,
`b`.`beans_chemical_benefits_other`,
replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_mgt_practices`, '1', 'Use of improved seed varieties,')), 
(replace(`b`.`beans_mgt_practices`, '2', 'Irrigation,')), 
(replace(`b`.`beans_mgt_practices`, '3', 'Planting early maturing crop varieties,')), 
(replace(`b`.`beans_mgt_practices`, '4', 'Planting drought resistant varieties,')),
(replace(`b`.`beans_mgt_practices`, '5', 'mulching,')),
(replace(`b`.`beans_mgt_practices`, '6', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6','') as  `beans_mgt_practices`,
`b`.`beans_mgt_practices_acreage`,
case
	when `b`.`beans_mgt_practices_acreage_mapped` = '1' then 'Yes'
	when `b`.`beans_mgt_practices_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `beans_mgt_practices_acreage_mapped`,
`b`.`beans_cost_ict`,
case
	when `b`.`beans_ict_supplier` = '1' then 'Stockist through VARM'
	when `b`.`beans_ict_supplier` = '2' then 'Village Agents'
	when `b`.`beans_ict_supplier` = '3' then 'Stockist'
	when `b`.`beans_ict_supplier` = '4' then 'Others'
else 'null'
end 
as `beans_ict_supplier`,
`b`.`beans_ict_supplier_other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_mgt_benefits`, '1', 'Good yields,')), 
(replace(`b`.`beans_mgt_benefits`, '2', 'Reduced costs,')), 
(replace(`b`.`beans_mgt_benefits`, '3', 'Labour saving,')), 
(replace(`b`.`beans_mgt_benefits`, '4', 'None,')),
(replace(`b`.`beans_mgt_benefits`, '5', 'Better quality,')),
(replace(`b`.`beans_mgt_benefits`, '6', 'Disease Resistance,')),
(replace(`b`.`beans_mgt_benefits`, '7', 'Early Maturity,')),
(replace(`b`.`beans_mgt_benefits`, '8', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as  `beans_mgt_benefits`,
`b`.`beans_mgt_benefits_other`,
case
	when `b`.`beans_machinery_acreage` is not null then 'Yes'
else 'No'
end 
as `beans_machinery_use`,
`b`.`beans_machinery_acreage`,
case
	when `b`.`beans_machinery_acreage_mapped` = '1' then 'Yes'
	when `b`.`beans_machinery_acreage_mapped` = '0' then 'No'
else 'null'
end 
as `beans_machinery_acreage_mapped`,
`b`.`beans_machinery_cost`,
case
	when `b`.`beans_machinery_supplier` = '1' then 'Stockist through VARM'
	when `b`.`beans_machinery_supplier` = '2' then 'Village Agents'
	when `b`.`beans_machinery_supplier` = '3' then 'Stockist'
	when `b`.`beans_machinery_supplier` = '4' then 'Others'
else 'null'
end 
as `beans_machinery_supplier`,
`b`.`beans_machinery_supplier_other`,
replace(replace(replace(replace(replace(replace(replace(replace(concat(
(replace(`b`.`beans_machinery_benefits`, '1', 'Good yields,')), 
(replace(`b`.`beans_machinery_benefits`, '2', 'Reduced costs,')), 
(replace(`b`.`beans_machinery_benefits`, '3', 'Labour saving,')), 
(replace(`b`.`beans_machinery_benefits`, '4', 'None,')),
(replace(`b`.`beans_machinery_benefits`, '5', 'Better quality,')),
(replace(`b`.`beans_machinery_benefits`, '6', 'Disease Resistance,')),
(replace(`b`.`beans_machinery_benefits`, '7', 'Early Maturity,')),
(replace(`b`.`beans_machinery_benefits`, '8', 'Others'))
),'1',''),'2',''),'3',''),'4',''),'5',''),'6',''),'7',''),'8','') as  `beans_machinery_benefits`,
`b`.`beans_machinery_benefits_other`,
`b`.`beans_harvested`,
`b`.`beans_sold`, 
`b`.`beans_sold_price`,
`b`.`beans_harvest_loss`,