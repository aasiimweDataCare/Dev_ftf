<?php
                                                         //Coffee   
                                                        case 181: 
                                                            $x="SELECT 181 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result181`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 181=181
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 182: 
                                                            $x="SELECT 182 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result182`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 182=182
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 183: 
                                                            $x="select 183 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result183` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result183`
                                                                 where 183=183";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 184: 
                                                            $x="select 184 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result184` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result184`
                                                                 where 184=184";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                         //Maize   
                                                        case 185: 
                                                            $x="SELECT 185 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result185`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 185=185
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 186: 
                                                            $x="SELECT 186 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result186`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 186=186
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 187: 
                                                            $x="select 187 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result187` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result187`
                                                                 where 187=187";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 188: 
                                                            $x="select 188 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result188` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result188`
                                                                 where 188=188";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Beans   
                                                                                                                 //Beans   
                                                        case 189: 
                                                            $x="SELECT 189 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result189`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 189=189
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 190: 
                                                            $x="SELECT 190 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result190`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 190=190
                                                                and `d`.`hsRegion`=2
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 191: 
                                                            $x="select 191 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result191` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result191`
                                                                 where 191=191";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 192: 
                                                            $x="select 192 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result192` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=2
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result192`
                                                                 where 192=192";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Coffee   
                                                        case 193: 
                                                            $x="SELECT 193 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result193`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 193=193
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 194: 
                                                            $x="SELECT 194 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result194`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 194=194
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 195: 
                                                            $x="select 195 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result195` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result195`
                                                                 where 195=195";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 196: 
                                                            $x="select 196 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result196` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result196`
                                                                 where 196=196";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                         //Maize   
                                                        case 197: 
                                                            $x="SELECT 197 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result197`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 197=197
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 198: 
                                                            $x="SELECT 198 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result198`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 198=198
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 199: 
                                                            $x="select 199 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result199` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result199`
                                                                 where 199=199";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 200: 
                                                            $x="select 200 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result200` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result200`
                                                                 where 200=200";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Beans   
                                                                                                                 //Beans   
                                                        case 201: 
                                                            $x="SELECT 201 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result201`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 201=201
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 202: 
                                                            $x="SELECT 202 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result202`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 202=202
                                                                and `d`.`hsRegion`=4
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 203: 
                                                            $x="select 203 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result203` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result203`
                                                                 where 203=203";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 204: 
                                                            $x="select 204 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result204` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=4
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result204`
                                                                 where 204=204";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Coffee   
                                                        case 205: 
                                                            $x="SELECT 205 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result205`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 205=205
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 206: 
                                                            $x="SELECT 206 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result206`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 206=206
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 207: 
                                                            $x="select 207 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result207` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result207`
                                                                 where 207=207";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 208: 
                                                            $x="select 208 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result208` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result208`
                                                                 where 208=208";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                         //Maize   
                                                        case 209: 
                                                            $x="SELECT 209 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result209`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 209=209
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 210: 
                                                            $x="SELECT 210 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result210`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 210=210
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 211: 
                                                            $x="select 211 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result211` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result211`
                                                                 where 211=211";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 212: 
                                                            $x="select 212 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result212` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result212`
                                                                 where 212=212";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Beans   
                                                                                                                 //Beans   
                                                        case 213: 
                                                            $x="SELECT 213 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result213`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 213=213
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 214: 
                                                            $x="SELECT 214 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result214`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 214=214
                                                                and `d`.`hsRegion`=3
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 215: 
                                                            $x="select 215 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result215` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result215`
                                                                 where 215=215";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 216: 
                                                            $x="select 216 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result216` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=3
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result216`
                                                                 where 216=216";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        //Coffee   
                                                        case 217: 
                                                            $x="SELECT 217 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result217`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 217=217
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 218: 
                                                            $x="SELECT 218 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaCoffeeMember`),0 ) )
                                                                AS `row5Result218`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 218=218
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 219: 
                                                            $x="select 219 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result219` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result219`
                                                                 where 219=219";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 220: 
                                                            $x="select 220 as `result_id`, sum(`hsAreaCoffeeMember`)as `row5Result220` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result220`
                                                                 where 220=220";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                         //Maize   
                                                        case 221: 
                                                            $x="SELECT 221 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result221`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 221=221
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 222: 
                                                            $x="SELECT 222 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaMaizeMember`),0 ) )
                                                                AS `row5Result222`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 222=222
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 223: 
                                                            $x="select 223 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result223` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result223`
                                                                 where 223=223";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 224: 
                                                            $x="select 224 as `result_id`, sum(`hsAreaMaizeMember`)as `row5Result224` from(
                                                                select
                                                                `m`.`hsAreaMaizeMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result224`
                                                                 where 224=224";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        //Beans   
                                                                                                                 //Beans   
                                                        case 225: 
                                                            $x="SELECT 225 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result225`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 225=225
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='M'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 226: 
                                                            $x="SELECT 226 as `result_id`,
                                                                sum( if( `m`.`year`='".date('Y')."', (`m`.`hsAreaBeansMember`),0 ) )
                                                                AS `row5Result226`
                                                                from  `tbl_household_members` as `m`
                                                                join `tbl_house_hold_details` as `d`
                                                                on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                where 226=226
                                                                and `d`.`hsRegion`=1
                                                                and `m`.`hsSexMember`='F'
                                                                group by `m`.`hsSexMember`";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        
                                                        case 227: 
                                                            $x="select 227 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result227` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='M'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember`
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result227`
                                                                 where 227=227";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        case 228: 
                                                            $x="select 228 as `result_id`, sum(`hsAreaBeansMember`)as `row5Result228` from(
                                                                select
                                                                `m`.`hsAreaBeansMember`,
                                                                `m`.`hsNameMember`,
                                                                `m`.`hsSexMember`,
                                                                `m`.`hsAgeMember`
                                                                 from  `tbl_household_members` as `m` 
                                                                 join `tbl_house_hold_details` as `d`
                                                                 on(`d`.`houseHoldId`=`m`.`houseHoldId`)
                                                                 where`d`.`hsRegion`=1
                                                                 and `m`.`hsSexMember`='F'
                                                                 and `m`.`year`='".date('Y')."'
                                                                 and `m`.`hsAgeMember` 
                                                                 between '18' and '35'
                                                                 group by `m`.`hsSexMember`,
                                                                 `m`.`hsAgeMember`)as `row5Result228`
                                                                 where 228=228";
                                                            $query=@Execute($x) or die(http("FS-0277"));
                                                            $result=FetchRecords($query);
                                                            return $result[$resultValue];
                                                            break;
                                                        
                                                        