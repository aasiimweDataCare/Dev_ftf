SELECT 29 as sub_indicatorId,
								sum( if( `year` = '2013' and nameMSME <>'', 1, 0 ) ) AS actualYr1,
								sum( if( `year` = '2014' and nameMSME <>'', 1, 0 ) ) AS actualYr2,
								sum( if( `year` = '2015' and nameMSME <>'', 1, 0 ) ) AS actualYr3,
								sum( if( `year` = '2016' and nameMSME <>'', 1, 0 ) ) AS actualYr4,
								sum( if( `year` = '2017' and nameMSME <>'', 1, 0 ) ) AS actualYr5,
								sum( if( `year` = '2018' and nameMSME <>'', 1, 0 ) ) AS actualYr6
								FROM `tbl_bankloans` 
								where 29=29
								and `numberOfFullTimeEmployees` >= 11