<?php

                                                        case 49: 
							$x="select 49 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result49`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 49=49
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0029"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 50: 
							$x="select 50 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result50`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 50=50
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0044"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 51: 
							$x="select 51 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result51`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 51=51
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0058"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 52: 
							$x="select 52 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result52`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 52=52
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0078"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 53: 
							$x="select 53 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result53`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 53=53
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0093"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 54: 
							$x="select 54 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result54`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 54=54
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0108"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 55: 
							$x="select 55 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result55`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 55=55
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0125"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 56: 
							$x="select 56 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result56`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 56=56
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0143"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
                                                        
                                                        
                                                        
                                                        
                                                        case 57: 
							$x="select 57 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result57`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 57=57
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0162"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 58: 
							$x="select 58 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result58`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 58=58
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0177"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 59: 
							$x="select 59 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result59`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 59=59
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0194"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 60: 
							$x="select 60 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result60`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 60=60
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=2
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0212"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 61: 
							$x="select 61 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result61`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 61=61
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 62: 
							$x="select 62 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result62`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 62=62
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 63: 
							$x="select 63 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result63`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 63=63
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 64: 
							$x="select 64 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result64`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 64=64
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                        
                                                        case 65: 
							$x="select 65 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result65`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 65=65
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 66: 
							$x="select 66 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result66`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 66=66
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 67: 
							$x="select 67 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result67`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 67=67
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 68: 
							$x="select 68 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result68`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 68=68
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 69: 
							$x="select 69 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result69`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 69=69
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 70: 
							$x="select 70 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result70`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 70=70
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 71: 
							$x="select 71 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result71`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 71=71
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 72: 
							$x="select 72 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result72`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 72=72
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=4
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    // End of half for row1
                                                    
                                                        case 73: 
							$x="select 1 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result73`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 73=73
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0029"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 74: 
							$x="select 74 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result74`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 74=74
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0044"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 75: 
							$x="select 75 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result75`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 75=75
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0058"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 76: 
							$x="select 76 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result76`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 76=76
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0078"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 77: 
							$x="select 77 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result77`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 77=77
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0093"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 78: 
							$x="select 78 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result78`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 78=78
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0108"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 79: 
							$x="select 79 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result79`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 79=79
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0125"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 80: 
							$x="select 80 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result80`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 80=80
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0143"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
                                                        
                                                        
                                                        
                                                        
                                                        case 81: 
							$x="select 81 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result81`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 81=81
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0557"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 82: 
							$x="select 82 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result82`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 82=82
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0572"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 83: 
							$x="select 83 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result83`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 83=83
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0589"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 84: 
							$x="select 84 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result84`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 84=84
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=3
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0607"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
							
							case 85: 
							$x="select 85 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result85`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 85=85
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0622"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 86: 
							$x="select 86 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result86`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 86=86
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0638"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 87: 
							$x="select 87 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result87`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 87=87
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0654"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 88: 
							$x="select 88 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result88`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 88=88
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropCoffee`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0672"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                        
                                                        case 89: 
							$x="select 89 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result89`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 89=89
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0687"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 90: 
							$x="select 90 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result90`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 90=90
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 91: 
							$x="select 91 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result91`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 91=91
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 92: 
							$x="select 92 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result92`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 92=92
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropMaize`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 93: 
							$x="select 93 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result93`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 93=93
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0227"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 94: 
							$x="select 94 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result94`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 94=94
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'";
								$query=@Execute($x) or die(http("FS-0242"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                        case 95: 
							$x="select 95 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result95`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 95=95
                                                                and `v`.`vAgentSex`='Male'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0259"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;
                                                    
                                                    
                                                        case 96: 
							$x="select 96 as result_id, COUNT(`ft`.`tbl_villageagentsId`) as `row2Result96`  
                                                                from `tbl_villageagents` as `v` 
                                                                left join `tbl_form5_villageagent` as `ft` 
                                                                on(`v`.`tbl_villageAgentId` =`ft`.`tbl_villageagentsId`)
                                                                where 96=96
                                                                and `v`.`vAgentSex`='Female'
                                                                and `v`.`vAgentRegion`=1
                                                                and `v`.`vAgentCropBeans`='Yes'
                                                                and `ft`.`year`='".date('Y')."'
                                                                and (year(curdate())-year(`v`.`vAgentDob`))
                                                                between '18' and '35'";
								$query=@Execute($x) or die(http("FS-0277"));
								$result=FetchRecords($query);
								return $result[$resultValue];
							break;


?>