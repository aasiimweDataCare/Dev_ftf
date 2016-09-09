<?php
SELECT 22 as indicator_id,
									sum( if( `im`.`year` = '2013', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr1,
									sum( if( `im`.`year` = '2014', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr2,
									sum( if( `im`.`year` = '2015', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr3,
									sum( if( `im`.`year` = '2016', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr4,
									sum( if( `im`.`year` = '2017', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr5,
									sum( if( `im`.`year` = '2018', (`im`.`inputsSoldBySeeds` + `im`.`inputsSoldByChemicals` + `im`.`inputsSoldByFertilizers` + `im`.`inputsSoldByHerbicides` + `im`.`inputsSoldByFarmImplements` + `im`.`inputsSoldByOthers`), 0 ) ) AS inputSalesYr6
									FROM `tbl_input_sales_meta_data` as `im`
									join `tbl_input_sales` as `i` 
									on (`im`.`input_sales_id`= `i`.`id`)
									where 22=22


